<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 8/10/2017
 */

class Car extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('accountmodel');
        if (!isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('auth_error', 'Συνδεθείτε στο λογαριασμό σας!');
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('addcar');
    }

}