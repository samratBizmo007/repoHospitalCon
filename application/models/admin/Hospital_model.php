<?php

class Hospital_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
   
   // --------------function to insert hospital details
    public function addHospitalDetails($data) {
        // print_r($data);
        extract($data);
        $query = "INSERT INTO hospital_tab(hosp_name,hosp_location,hosp_addr,hosp_number)"
                . "VALUES ('$hospital_name','$hospital_location','$hospital_address','$hospital_num')";
        $result = $this->db->query($query);
        if ($result) {
              return true;
            } else {
           return false;
        }
       
    }

      // ---------------------function to show hospital details
    
    public function getHospitalDetails() {
        $query = "SELECT * FROM hospital_tab";
        $result = $this->db->query($query);
        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No data found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }

    // ---------------function to update hospital details
     public function updateHospitalDetails($data) {
        extract($data);
        // print_r($data);
        $sql = "UPDATE hospital_tab SET hosp_name = '$hospital_name',hosp_location = '$hospital_location',"
                . "hosp_addr = '$hospital_address',hosp_number = '$hospital_num' WHERE hosp_id = '$hosp_id'";
         // echo $sql;die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }

    }
// ----------------function to delete hospital details
       public function deleteHospitalDetails($hosp_id) {
        $sql = "DELETE FROM hospital_tab WHERE hosp_id = '$hosp_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


     public function getAllHospitalLocation() {
        $sql = "SELECT * FROM hospital_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }
}