<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    /**
     * Dashboard constructor.
     */
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function index()
    {
        if ($this->session->userdata['logged_in']) {
            $username = ($this->session->userdata['username']);
            $id = ($this->session->userdata['id']);
            $data = array(
                'username' => $username,
                'id' => $id,
            );
            $this->load->view('dashboard', $data);
        } else {
            redirect(base_url());
        }
    }
}
