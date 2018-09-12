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

}