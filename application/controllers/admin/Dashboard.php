<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Dashboard_model'); //---------------load model for sql operation
        //start session		
        $admin_name = $this->session->userdata('admin_name'); //-----------session variable

        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
    }

    // main index function
    public function index() {
        $data['hospitals'] = Dashboard::getAllHospital_Count(); //------------fun for get all Hospitals
        $data['doctors'] = Dashboard::getAllDoctors_Count(); //------------fun for get all doctors
        $data['blood'] = Dashboard::getAllBlood_Count(); //-------------fun for get all blood
        $data['organs'] = Dashboard::getAllOrgans_Count(); //-------------fun for get all organs
        $data['ambulance'] = Dashboard::getAllAmbulance_Count(); //------------fun for get all ambulance
        $this->load->view('includes/header');
        $this->load->view('pages/admin/dashboard'); //---------load view
        $this->load->view('includes/footer');
    }

    //-----------------------fun for get all hospial Count------------------------------------//

    public function getAllHospital_Count() {
        $result = $this->Dashboard_model->getAllHospital_Count();
        return $result;
    }

//-----------------------fun for get all hospial Count------------------------------------//
//-----------------------fun for get all doctors Count------------------------------------//
    public function getAllDoctors_Count() {
        //print_r($hosp_id);die();
        $result = $this->Dashboard_model->getAllDoctors_Count();
        return $result;
    }

//-----------------------fun for get all doctors Count------------------------------------//
//-----------------------fun for get all blood Count------------------------------------//

    public function getAllBlood_Count() {
        $result = $this->Dashboard_model->getAllBlood_Count();
        return $result;
    }

//-----------------------fun for get all blood Count------------------------------------//
//-----------------------fun for get all organs Count------------------------------------//

    public function getAllOrgans_Count() {
        $result = $this->Dashboard_model->getAllOrgans_Count();
        return $result;
    }

//-----------------------fun for get all organs Count------------------------------------//
//-----------------------fun for get all ambulance Count------------------------------------//

    public function getAllAmbulance_Count() {
        $result = $this->Dashboard_model->getAllAmbulance_Count();
        return $result;
    }

//-----------------------fun for get all ambulance Count------------------------------------//
}
