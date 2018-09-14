<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_details extends CI_Controller {

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
        // print_r($_GET);
        //$hosp_id = $hospital;
        $data['doctors'] = Doctors_details::getDoctorinfo($doc); //------------fun for get all doctors
       
        $this->load->view('includes/user_header');
        $this->load->view('pages/user/doctors_details', $data); //-----------load view hospital details
    }

    //-----------------------fun for get all doctors for the hospital------------------------------------//
    public function getDoctorinfo($doc_id) {
        // print_r($doc_id);
        $result = $this->Hospital_model->getDoctorinfo($doc_id);
        return $result;
    }
}
