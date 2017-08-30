<?php

/**
 * Author: Dionisis Papanikolaou
 * Date: 19/8/2017
 */
class AuthModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Read data using username and password
    public function checkLoginData($username, $password)
    {
        $checkUser = $this->db->get_where('users', array('username' => $username));
        if ($checkUser->num_rows() !== 1) {
            return false;
        } else {
            $checkPass = $this->db->select('password')->from('users')->where('username', $username)->get();
            log_message('debug', $checkPass);
            return false;
        }
    }
}