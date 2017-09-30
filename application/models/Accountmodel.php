<?php

/**
 * Author: Dionisis Papanikolaou
 * Date: 30/9/2017
 */
class Accountmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUserData($userId)
    {
        $data = array();
        $getUser = $this->db->get_where('users', array('id' => $userId), 1);
        foreach ($getUser->result() as $userData) {
            $data['username'] = $userData->username;
            $data['email'] = $userData->email;
            $data['address'] = $userData->address;
            $data['phone'] = $userData->phone;
            $data['last_login'] = $userData->last_login;
        }
        return $data;
    }
}