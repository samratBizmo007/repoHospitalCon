<?php

class Organ_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveOrganDetails($data) {
        extract($data);
        //print_r($data);die();
        $sql = "INSERT INTO organ_tab(organ_name,organ_quantity,hosp_id,status)"
                . "VALUES ('$organ_name','$Organ_quantity','$Hospital_name','1')";
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

    public function getAllorgans(){
        $sql = "SELECT * FROM organ_tab as o JOIN hospital_tab as t on (o.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }
    
    public function updateOrganDetails($data) {
        extract($data);
        $sql = "UPDATE organ_tab SET hosp_id = '$Hospital_name',organ_name = '$organ_name',"
                . "organ_quantity = '$Organ_quantity',status = '1' WHERE organ_id = '$Organ_id'";
        //echo $sql; die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

    public function deleteOrganDetails($Organ_id) {
        $sql = "DELETE FROM organ_tab WHERE organ_id = '$Organ_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }
    
}
