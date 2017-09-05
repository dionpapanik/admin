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
        $authenticate = false;

        $checkUsername = $this->db->get_where('users', array('username' => $username));
        if ($checkUsername->num_rows() == 1) { // user exists
            foreach ($checkUsername->result() as $row) {
                $checkPassword = password_verify($password, $row->password);
                // log_message('debug', 'checkPassword: ' . $checkPassword);
                if ($checkPassword == 1) {
                    $authenticate = true;
                }
            }
        }

        return $authenticate;
    }
}