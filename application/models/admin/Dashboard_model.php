<?php

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllHospital_Count() {
        $sql = "SELECT count(*) as hospitalcount FROM hospital_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function getAllDoctors_Count() {
        $sql = "SELECT count(*) as doctorcount FROM doctor_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function getAllBlood_Count() {
        $sql = "SELECT count(*) as bloodcount FROM blood_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function getAllOrgans_Count() {
        $sql = "SELECT count(*) as organcount FROM organ_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function getAllAmbulance_Count() {
        $sql = "SELECT count(*) as ambulancecount FROM ambulance_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

}
