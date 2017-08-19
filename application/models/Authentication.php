<?php

/**
 * Author: Dionisis Papanikolaou
 * Date: 19/8/2017
 */
class Authentication extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Read data using username and password
    public function checkLoginData($data)
    {
        $check = array(
            'username' => $data['username'],
            'password' => $data['password']
        );
        $query = $this->db->get_where('users', $check);

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}