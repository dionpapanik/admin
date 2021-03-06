<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('auth_error', 'Συνδεθείτε στο λογαριασμό σας!');
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('dashboard');
    }
}
