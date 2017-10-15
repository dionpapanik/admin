<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 15/10/2017
 */

class Cars_menu
{
    private $_ci;

    function __construct()
    {
        $this->_ci =& get_instance();
        $this->_ci->load->database();
    }

    function buildDropdownΜenu($userId)
    {

        $getCar = $this->_ci->db->get_where('cars', array('user_id' => $userId));
        $htmlOutput = array();
        foreach ($getCar->result() as $carData) {

            $url = base_url('car/view/' . $carData->id);
            $htmlOutput[] = '<li>';
            $htmlOutput[] = '<a href="' . $url . '">' . $carData->manufacturer . ' ' . $carData->model . '</a>';
            $htmlOutput[] = '</li>';
        }
        return implode("\n", $htmlOutput);
    }
}