<?php

class Blood_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

//-----------------------fun for save blood details--------------------------------//
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

//-----------------------fun for save blood details--------------------------------//
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
//-----------------------fun for get all blood details--------------------------------//

    public function getAllBlood() {
        $sql = "SELECT * FROM blood_tab as o JOIN hospital_tab as t on (o.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

//-----------------------fun for get all blood details--------------------------------//
//-----------------------fun for update blood details--------------------------------//

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

//-----------------------fun for update blood details--------------------------------//
//-----------------------fun for Delete blood details--------------------------------//

    public function deleteBloodDetails($blood_id) {
        $sql = "DELETE FROM blood_tab WHERE blood_id = '$blood_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

//-----------------------fun for Delete blood details--------------------------------//

    // get blood records on filter
    public function filterBlood($query_string){
        $sql="SELECT * FROM hospital_tab, blood_tab WHERE blood_tab.hosp_id=hospital_tab.hosp_id AND hospital_tab.hosp_location LIKE '$query_string%' OR hospital_tab.hosp_name LIKE '$query_string%' OR blood_tab.blood_group LIKE '$query_string%' ";
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

    // get all blood for home
    public function getAllBloodHome() {
        $sql = "SELECT * FROM blood_tab as o JOIN hospital_tab as t on (o.hosp_id = t.hosp_id)";
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
