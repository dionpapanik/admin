<?php

/**
 * Author: Dionisis Papanikolaou
 * Date: 19/8/2017
 */
class Authmodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param $email
     * @param $password
     * @return array|bool
     */
    public function checkLoginData($email, $password)
    {
        $data = array();
        $checkEmail = $this->db->get_where('users', array('email' => $email));
        if ($checkEmail->num_rows() == 1) { // user exists
            foreach ($checkEmail->result() as $userData) {
                $checkPassword = password_verify($password, $userData->password);
                // log_message('debug', 'checkPassword: ' . $checkPassword);
                if ($checkPassword == 1) {
                    $this->_updateLoginData($email);
                    $data['id'] = $userData->id;
                    $data['username'] = $userData->username;
                    return $data;
                }
            }
        }
        return false;
    }

    /**
     * @param $email
     */
    private function _updateLoginData($email)
    {
        $loginTime = new DateTime();
        $loginTime->setTimezone(new DateTimezone('Europe/Athens'));

        $this->db->where('email', $email);
        $this->db->update(
            'users', array(
                'last_login' => $loginTime->format('d-m-Y H:i'),
                'remote_addr' => $this->input->ip_address()
            )
        );
        return;
    }


    /**
     * checks if the provided email exists in database
     * @param $email
     * @return bool
     */

    public function isDuplicateMail($email)
    {
        return $this->db->limit(1)->get_where('users', array('email' => $email))->num_rows() === 1
            ? true
            : false;
    }

    public function registerNewUser($name, $email, $pass)
    {
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        $userData = array(
            'username' => $name,
            'email' => $email,
            'password' => $hashedPass,
        );

        $this->db->insert('users', $userData);
        return ($this->db->affected_rows() !== 1)
            ? false
            : true;
    }

}