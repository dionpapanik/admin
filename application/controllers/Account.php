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
        $this->load->model('accountmodel');
        if (!isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('auth_error', 'Συνδεθείτε στο λογαριασμό σας!');
            redirect(base_url());
        }
    }

    public function index()
    {
        $userId = $this->session->userdata['id'];
        $userData = $this->accountmodel->getUserData($userId);
        $this->load->view('account', $userData);
    }

    public function edit()
    {
        $validation = array(
            array(
                'field' => 'name',
                'label' => 'Όνομα',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'address',
                'label' => 'Διεύθυνση',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'phone',
                'label' => 'Τηλέφωνο',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'password',
                'label' => 'Κωδικός Πρόσβασης',
                'rules' => 'trim|xss_clean'
            )
        );

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == false) {
            $this->load->view('account');
        } else {
            $userId = $this->session->userdata['id'];
            $username = $this->security->xss_clean($this->input->post('name', true));
            $address = $this->security->xss_clean($this->input->post('address', true));
            $phone = $this->security->xss_clean($this->input->post('phone', true));
            $password = $this->security->xss_clean($this->input->post('password', true));

            $this->accountmodel->updateUserData($userId, $username, $address, $phone, $password);

            $userData = $this->accountmodel->getUserData($userId);
            $this->session->set_flashdata('update_user_data_success', 'Τα στοιχεία σας ενημερώθηκαν επιτυχώς!');
            $this->load->view('account', $userData);
        }
    }
}