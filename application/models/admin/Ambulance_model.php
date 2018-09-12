<?php

class Ambulance_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveAmbulaceDetails($data) {
        extract($data);
        //print_r($data);die();
        $sql = "INSERT INTO ambulance_tab(ambulance_quantity,hosp_id,status)"
                . "VALUES ('$ambulance_quantity','$Hospital_name','1')";
        if ($this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAllHospitals() {
        $sql = "SELECT * FROM hospital_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function getAllAmbulances() {
        $sql = "SELECT * FROM ambulance_tab as o JOIN hospital_tab as t on (o.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

}
