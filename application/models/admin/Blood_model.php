<?php

class Blood_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveBloodDetails($data) {
        extract($data);
        //print_r($data);die();
        $sql = "INSERT INTO blood_tab(blood_group,blood_quantity,hosp_id,status)"
                . "VALUES ('$blood_group','$blood_quantity','$Hospital_name','1')";
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

    public function getAllBlood() {
        $sql = "SELECT * FROM blood_tab as o JOIN hospital_tab as t on (o.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function updateBloodDetails($data) {
        extract($data);
        $sql = "UPDATE blood_tab SET hosp_id = '$Hospital_name',"
                . "blood_group = '$blood_group', blood_quantity='$blood_quantity' WHERE blood_id = '$blood_id'";
        //echo $sql; die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

    public function deleteBloodDetails($blood_id) {
        $sql = "DELETE FROM blood_tab WHERE blood_id = '$blood_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

}
