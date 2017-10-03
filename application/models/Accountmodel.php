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
            $data['last_update'] = $userData->last_update;
        }
        return $data;
    }


    public function updateUserData($userId, $username, $address, $phone, $password)
    {
        $newData = array();
        if (!empty($username)) {
            $newData['username'] = $username;
        }
        if (!empty($address)) {
            $newData['address'] = $address;
        }
        if (!empty($phone)) {
            $newData['phone'] = $phone;
        }
        if (!empty($password)) {
            $newData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $newData['last_update'] = getCurrentDateTime('date');
        $this->db->update('users', $newData, array('id' => $userId));
    }
}