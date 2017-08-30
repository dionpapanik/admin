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
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('authmodel');
    }


    /**
     *
     */
    public function index()
    {
        $this->load->view('login');
    }

    /**
     *
     */
    public function userLogin()
    {

        $validation = array(
            array(
                'field' => 'username',
                'label' => 'Username',
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
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            $result = $this->authmodel->checkLoginData($username, $password);
            if ($result == true) {
                $session_data = array(
                    'username' => $username
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