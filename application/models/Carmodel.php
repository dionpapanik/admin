<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 8/10/2017
 */

class Carmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getCarDataPerUser($userId)
    {
        $data = array();
        $getCar = $this->db->get_where('cars', array('user_id' => $userId));
        foreach ($getCar->result() as $carData) {
            $data['manufacturer'] = $carData->manufacturer;
            $data['model'] = $carData->model;
            $data['displacement'] = $carData->displacement;
            $data['plate'] = $carData->plate;
            $data['mileage'] = $carData->mileage;
        }
        return $data;
    }


    public function getCarMenuPerUser($userId)
    {
        $data = array();
        $getCar = $this->db->get_where('cars', array('user_id' => $userId));
        foreach ($getCar->result() as $carData) {
            $data[] = $carData->manufacturer . ' ' . $carData->model;
        }
        return $data;
    }

}