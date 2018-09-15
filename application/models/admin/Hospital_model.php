<?php

class Hospital_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // --------------function to insert hospital details
    public function addHospitalDetails($data) {
        // print_r($data);
        extract($data);
        $query = "INSERT INTO hospital_tab(hosp_name,hosp_location,hosp_addr,hosp_number,hosp_email)"
                . "VALUES ('$hospital_name','$hospital_location','$hospital_address','$hospital_num','$hosp_email')";
        // echo $query;die();
        // $result = $this->db->query($query);
        if ($this->db->query($query)) {
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
        $sql = "UPDATE hospital_tab SET hosp_name = '$hospital_name',hosp_email = '$hosp_email',hosp_location = '$hospital_location',"
                . "hosp_addr = '$hospital_address',hosp_number = '$hospital_num' WHERE hosp_id = '$hosp_id'";
        // echo $sql;die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

// ----------------function to delete hospital details---------------------------//
    public function deleteHospitalDetails($hosp_id) {
        $sql = "DELETE FROM hospital_tab WHERE hosp_id = '$hosp_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

// ----------------function to delete hospital details---------------------------//
// ----------------function to get all hospital location details---------------------------//

    public function getAllHospitalLocation() {
        $sql = "SELECT * FROM location_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

// ----------------function to get all hospital location details---------------------------//
    // ----function for doctors detail page
    public function getDoctorinfo($doc_id) {
        $sql = "SELECT * FROM doctor_tab as d JOIN hospital_tab as h on (d.hosp_id = h.hosp_id) WHERE d.doc_id = '$doc_id'";
        // print_r($sql); die();
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    // ---------function end
// ----------------function to get all Doctor details by hospital---------------------------//

    public function getAllDoctors_Details($hosp_id) {
        $sql = "SELECT * FROM doctor_tab as d JOIN hospital_tab as h on (d.hosp_id = h.hosp_id) WHERE h.hosp_id = '$hosp_id'";
        //print_r($sql); die();
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

// ----------------function to get all Doctor details by hospital---------------------------//
// ----------------function to get all Blood details by hospital---------------------------//

    public function getAllBlood_Details($hosp_id) {
        $sql = "SELECT * FROM blood_tab as b JOIN hospital_tab as h on (b.hosp_id = h.hosp_id) WHERE h.hosp_id = '$hosp_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

// ----------------function to get all Blood details by hospital---------------------------//
// ----------------function to get all Organ details by hospital---------------------------//

    public function getAllOrgans_Details($hosp_id) {
        $sql = "SELECT * FROM organ_tab as o JOIN hospital_tab as h on (o.hosp_id = h.hosp_id) WHERE h.hosp_id = '$hosp_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

// ----------------function to get all Organ details by hospital---------------------------//
// ----------------function to get all Ambulance details by hospital---------------------------//

    public function getAllAmbulance_Details($hosp_id) {
        $sql = "SELECT * FROM ambulance_tab as a JOIN hospital_tab as h on (a.hosp_id = h.hosp_id) WHERE h.hosp_id = '$hosp_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

// ----------------function to get all Ambulance details by hospital---------------------------//
    public function getAllHospital_Details($hosp_id) {
        $sql = "SELECT * FROM hospital_tab WHERE hosp_id = '$hosp_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }
// ----------------function to get all Ambulance details by hospital---------------------------//

    // get hospital records on filter
    public function filterHospital($query_string){
        $sql = "SELECT * FROM hospital_tab WHERE hosp_location LIKE '$query_string%' OR hosp_name LIKE '$query_string%' ";
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
}
