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
        $checkUsername = $this->db->get_where('users', array('email' => $email));
        if ($checkUsername->num_rows() == 1) { // user exists
            foreach ($checkUsername->result() as $userData) {
                $checkPassword = password_verify($password, $userData->password);
                // log_message('debug', 'checkPassword: ' . $checkPassword);
                if ($checkPassword == 1) {
                    $this->_updateLoginTime($email);
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

    public function isDuplicateMail($email)
    {
        $checkDuplicateMail = $this->db->get_where('users', array('email' => $email));
        if ($checkDuplicateMail->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}