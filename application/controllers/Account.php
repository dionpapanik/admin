<?php

/**
 * Author: Dionisis Papanikolaou
 * Date: 27/9/2017
 */
class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('accountmodel');
    }

    public function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $userId = $this->session->userdata['id'];
            $userData = $this->accountmodel->getUserData($userId);
            $this->load->view('account', $userData);
        } else {
            $data['invalid_data'] = 'Πραγματοποιήστε είσοδο πρώτα!';
            $this->load->view('login', $data);
        }
    }

}