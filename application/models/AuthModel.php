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

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function checkLoginData($email, $password)
    {
        $checkUsername = $this->db->get_where('users', array('email' => $email));
        if ($checkUsername->num_rows() == 1) { // user exists
            foreach ($checkUsername->result() as $userData) {
                $checkPassword = password_verify($password, $userData->password);
                // log_message('debug', 'checkPassword: ' . $checkPassword);
                if ($checkPassword == 1) {
                    $this->_updateLoginTime($email);
                    return $userData->username;
                }
            }
        }
        return false;
    }

    /**
     * @param $email
     */
    private function _updateLoginTime($email)
    {
        $loginTime = new DateTime();
        $loginTime->setTimezone(new DateTimezone('Europe/Athens'));

        $this->db->where('email', $email);
        $this->db->update('users', array('last_login' => $loginTime->format('d-m-Y H:i:s')));
        return;
    }


    /**
     * @param $email
     * @return bool
     */
    private function _isDuplicate($email)
    {
        $this->db->get_where('users', array('email' => $email));
        return $this->db->num_rows() == 1 ? true : false;
    }
}