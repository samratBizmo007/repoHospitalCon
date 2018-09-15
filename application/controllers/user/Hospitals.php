<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hospitals extends CI_Controller {

    // Hospital Controller
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Hospital_model'); //-----loading the hospital model for sql operations
        //start session	
        //start session		
        $user_session = $this->session->userdata('user_session');

        //check session variable set or not, otherwise logout
        if ((!isset($user_session)) || ($user_session == '')) {
            redirect('/');
        }
    }

    // main index function
    public function index() {
        extract($_GET);
        //print_r($_GET);die();
        //$hosp_id = $hospital;
        $data['hospitals'] = Hospitals::getAllHospital_Details($hospital); //------------fun for get all doctors
        $data['doctors'] = Hospitals::getAllDoctors_Details($hospital); //------------fun for get all doctors
        $data['blood'] = Hospitals::getAllBlood_Details($hospital); //-------------fun for get all blood
        $data['organs'] = Hospitals::getAllOrgans_Details($hospital); //-------------fun for get all organs
        $data['ambulance'] = Hospitals::getAllAmbulance_Details($hospital); //------------fun for get all ambulance
        //$this->load->view('includes/header');
        $this->load->view('includes/user_header', $data);
        $this->load->view('pages/user/hospital_details', $data); //-----------load view hospital details
        //$this->load->view('includes/footer');
    }

//-----------------------fun for get all hospial Details------------------------------------//

    public function getAllHospital_Details($hosp_id) {
        $result = $this->Hospital_model->getAllHospital_Details($hosp_id);
        return $result;
    }

//-----------------------fun for get all hospial Details------------------------------------//
//-----------------------fun for get all doctors for the hospital------------------------------------//
    public function getAllDoctors_Details($hosp_id) {
        //print_r($hosp_id);die();
        $result = $this->Hospital_model->getAllDoctors_Details($hosp_id);
        return $result;
    }

//-----------------------fun for get all doctors for the hospital------------------------------------//
//-----------------------fun for get all blood for the hospital------------------------------------//

    public function getAllBlood_Details($hosp_id) {
        $result = $this->Hospital_model->getAllBlood_Details($hosp_id);
        return $result;
    }

//-----------------------fun for get all blood for the hospital------------------------------------//
//-----------------------fun for get all organs for the hospital------------------------------------//

    public function getAllOrgans_Details($hosp_id) {
        $result = $this->Hospital_model->getAllOrgans_Details($hosp_id);
        return $result;
    }

//-----------------------fun for get all organs for the hospital------------------------------------//
//-----------------------fun for get all ambulance for the hospital------------------------------------//

    public function getAllAmbulance_Details($hosp_id) {
        $result = $this->Hospital_model->getAllAmbulance_Details($hosp_id);
        return $result;
    }

//-----------------------fun for get all ambulance for the hospital------------------------------------//
}
