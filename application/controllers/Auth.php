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
        $this->load->model('authentication');
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

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $data = $this->input->post(); // this is an array with username & pass
            $result = $this->authentication->checkLoginData($data);
            if ($result == TRUE) {
                $session_data = array(
                    'username' => $data['username']
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
    public function userLogout() {
        $this->session->unset_userdata('logged_in');
        redirect(base_url());
    }
}