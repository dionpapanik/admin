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
    }

    public function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->load->view('account');
        } else {
            $data = array(
                'invalid_data' => 'Πραγματοποιήστε είσοδο πρώτα!'
            );
            $this->load->view('login', $data);
        }
    }

}