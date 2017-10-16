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

    public function getCarDataPerUser($carId, $userId)
    {
        $data = array();
        $getCar = $this->db->get_where('cars', array(
            'user_id' => $userId,
            'id' => $carId
        ));
        foreach ($getCar->result() as $carData) {
            $data['manufacturer'] = $carData->manufacturer;
            $data['model'] = $carData->model;
            $data['displacement'] = $carData->displacement;
            $data['plate'] = $carData->plate;
            $data['mileage'] = $carData->mileage;
        }
        return $data;
    }

    public function registerNewCar($userId, $manufacturer, $model, $plate, $displacement, $mileage, $registeredDate)
    {
        $carData = array(
            'user_id' => $userId,
            'manufacturer' => $manufacturer,
            'model' => $model,
            'displacement' => $displacement,
            'plate' => $plate,
            'mileage' => $mileage,
            'registered_date' => $registeredDate,
        );

        $this->db->insert('cars', $carData);
        return ($this->db->affected_rows() !== 1)
            ? false
            : true;

    }


}