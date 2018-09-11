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

    public function getAllDoctors() {
        $sql = "SELECT * FROM doctor_tab as d JOIN hospital_tab as t on (d.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    public function updateDoctorDetails($data) {
        extract($data);
        $sql = "UPDATE doctor_tab SET hosp_id = '$Hospital_name',doc_name = '$doctor_name',doc_degree = '$Doc_degree',"
                . "doc_email = '$Doc_email',doc_gender = '$Doc_gender',status = '1' WHERE doc_id = '$Doc_id'";
        //echo $sql; die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

    public function deleteDoctorDetails($doc_id) {
        $sql = "DELETE FROM doctor_tab WHERE doc_id = '$doc_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
