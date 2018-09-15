<?php

class Ambulance_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

//-----------------------fun for save ambulance details--------------------------------//

    public function saveAmbulaceDetails($data) {
        extract($data);
        //print_r($data);die();
        $sql = "INSERT INTO ambulance_tab(ambulance_quantity,hosp_id,status)"
                . "VALUES ('$ambulance_quantity','$Hospital_name','1')";
        if ($this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//-----------------------fun for save ambulance details--------------------------------//
//-----------------------fun for get all hospital details--------------------------------//

    public function getAllHospitals() {
        $sql = "SELECT * FROM hospital_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

//-----------------------fun for get all hospital details--------------------------------//
//-----------------------fun for get all ambulance details--------------------------------//

    public function getAllAmbulances() {
        $sql = "SELECT * FROM ambulance_tab as o JOIN hospital_tab as t on (o.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

//-----------------------fun for get all ambulance details--------------------------------//
//-----------------------fun for update ambulance details--------------------------------//

    public function updateAmbulanceDetails($data) {
        extract($data);
        $sql = "UPDATE ambulance_tab SET hosp_id = '$Hospital_name',"
                . "ambulance_quantity = '$ambulance_quantity' WHERE ambulance_id = '$ambulance_id'";
        //echo $sql; die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

//-----------------------fun for update ambulance details--------------------------------//
//-----------------------fun for delete ambulance details--------------------------------//

    public function deleteAmbulanceDetails($ambulance_id) {
        $sql = "DELETE FROM ambulance_tab WHERE ambulance_id = '$ambulance_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

//-----------------------fun for delete ambulance details--------------------------------//

    // get ambulance records on filter
    public function filterAmbulance($query_string){
        $sql="SELECT * FROM hospital_tab, ambulance_tab WHERE ambulance_tab.hosp_id=hospital_tab.hosp_id AND hospital_tab.hosp_location LIKE '$query_string%' OR hospital_tab.hosp_name LIKE '$query_string%' ";
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

    // get all ambulances for home
    public function getAllAmbulancesHome() {
        $sql = "SELECT * FROM ambulance_tab as o JOIN hospital_tab as t on (o.hosp_id = t.hosp_id)";
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
