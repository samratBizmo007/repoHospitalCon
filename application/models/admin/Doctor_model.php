<?php

class Doctor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveDoctorDetails($data) {
        extract($data);
        //print_r($data);die();
        $sql = "INSERT INTO doctor_tab(hosp_id,doc_name,doc_degree,doc_email,doc_gender,status)"
                . "VALUES ('$Hospital_name','$doctor_name','$Doc_degree','$Doc_email','$Doc_gender','1')";
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

}
