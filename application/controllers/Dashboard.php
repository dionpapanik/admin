<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->load->view('dashboard');
        } else {
            $data = array(
                'invalid_data' => 'Πραγματοποιήστε είσοδο πρώτα!'
            );
            $this->load->view('login', $data);
        }
    }
}
