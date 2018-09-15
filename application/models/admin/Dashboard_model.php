<?php

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllHospital_Count() {
        $sql = "SELECT count(*) FROM hospital_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function getAllDoctors_Count() {
        $sql = "SELECT count(*) FROM doctor_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function getAllBlood_Count() {
        $sql = "SELECT count(*) FROM blood_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function getAllOrgans_Count() {
        $sql = "SELECT count(*) FROM organs_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function getAllAmbulance_Count() {
        $sql = "SELECT count(*) FROM ambulance_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

}
