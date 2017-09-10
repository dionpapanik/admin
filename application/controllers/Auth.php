<?php

/**
 * Author: Dionisis Papanikolaou
 * Date: 17/8/2017
 */
class Auth extends CI_Controller
{

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('authmodel');
    }


    public function testAjax()
    {
        if ($this->input->is_ajax_request()) {
            $email = $this->security->xss_clean($this->input->post('email'));
            $result = $this->authmodel->isDuplicateUser($email);
            log_message('debug', 'result: ' . $result);
        } else {
            exit('No direct script access allowed');
        }
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('register');
    }


    public function userLogin()
    {

        $validation = array(
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|xss_clean',
                'errors' => array(
                    'required' => 'Please Insert %s.',
                ),
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|xss_clean',
                'errors' => array(
                    'required' => 'Please Insert %s.',
                ),
            )
        );

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules($validation);

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $email = $this->security->xss_clean($this->input->post('email', true));
            $password = $this->security->xss_clean($this->input->post('password', true));

            $result = $this->authmodel->checkLoginData($email, $password);
            if ($result !== false) {
                $session_data = array(
                    'username' => $result
                );
                $this->session->set_userdata('logged_in', $session_data);

                redirect('dashboard');
            } else {
                $data = array(
                    'invalid_data' => 'Invalid Username or Password'
                );
                $this->load->view('login', $data);
            }
        }
    }

    /**
     *
     */
    public function userLogout()
    {
        $this->session->unset_userdata('logged_in');
        redirect(base_url());
    }
}