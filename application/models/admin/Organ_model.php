<?php

class Organ_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

//--------------------fun for save organ details ----------------------------------//
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

//--------------------fun for save organ details ----------------------------------//
//--------------------fun for all hospital details ----------------------------------//

    public function getAllHospitals() {
        $sql = "SELECT * FROM hospital_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

//--------------------fun for all hospital details ----------------------------------//
//--------------------fun for all organ details ----------------------------------//

    public function getAllorgans() {
        $sql = "SELECT * FROM organ_tab as o JOIN hospital_tab as t on (o.hosp_id = t.hosp_id)";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return FALSE;
        } else {
            return $result->result_array();
        }
    }

    //--------------------fun for all organ details ----------------------------------//
//--------------------fun for Update organ details ----------------------------------//

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

//--------------------fun for Update organ details ----------------------------------//
//--------------------fun for delete organ details ----------------------------------//

    public function deleteOrganDetails($Organ_id) {
        $sql = "DELETE FROM organ_tab WHERE organ_id = '$Organ_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

//--------------------fun for delete organ details ----------------------------------//


    // get organ records on filter
    public function filterOrgan($query_string){
        $sql="SELECT * FROM organ_tab as org JOIN hospital_tab as hosp on (org.hosp_id = hosp.hosp_id) WHERE hosp.hosp_location LIKE '$query_string%' OR hosp.hosp_name LIKE '$query_string%' OR org.organ_name LIKE '$query_string%' ";
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

    // get all organ for home
    public function getAllorgansHome() {
        $sql = "SELECT * FROM organ_tab as o JOIN hospital_tab as t on (o.hosp_id = t.hosp_id)";
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
