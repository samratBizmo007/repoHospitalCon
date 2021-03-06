<?php

class Doctor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

//-------------------fun for save doctor details -----------------------------------//
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

//-------------------fun for save doctor details -----------------------------------//
//-------------------fun for get all hospital details -----------------------------------//

    public function getAllHospitals() {
        $sql = "SELECT * FROM hospital_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

//-------------------fun for get all hospital details -----------------------------------//
//-------------------fun for get all Doctor details -----------------------------------//

    public function getAllDoctors() {
        $sql = "SELECT * FROM doctor_tab as d JOIN hospital_tab as t on (d.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

//-------------------fun for get all Doctor details -----------------------------------//
//-------------------fun for update doctor details -----------------------------------//

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

//-------------------fun for update doctor details -----------------------------------//
//-------------------fun for Delete doctor details -----------------------------------//

    public function deleteDoctorDetails($doc_id) {
        $sql = "DELETE FROM doctor_tab WHERE doc_id = '$doc_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

//-------------------fun for Delete doctor details -----------------------------------//

    // get doctors records on filter
    public function filterDoctor($query_string){
        $sql="SELECT * FROM doctor_tab as doc JOIN hospital_tab as hosp on (doc.hosp_id = hosp.hosp_id) WHERE hosp.hosp_location LIKE '$query_string%' OR doc.doc_name LIKE '$query_string%' OR doc.doc_degree LIKE '$query_string%' OR doc.doc_gender LIKE '$query_string%'";
        $result = $this->db->query($sql);
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

    // get all doctor for home
    public function getAllDoctorsHome() {
        $sql = "SELECT * FROM doctor_tab as d JOIN hospital_tab as t on (d.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
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
//--------------fun for get doctor details to csv
    public function getAllDoctorsData(){
        $sql = "SELECT d.doc_name,d.doc_email,d.doc_degree,d.doc_gender,t.hosp_name FROM doctor_tab as d JOIN hospital_tab as t on (d.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }
    
}
