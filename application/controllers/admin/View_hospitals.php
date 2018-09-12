<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_hospitals extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Hospital_model');
        //start session		
        $admin_name = $this->session->userdata('admin_name');

        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
    }
      // main index function
    public function index() {
        $data['HospitalDetails'] = View_hospitals::getHospitalDetails();
        $this->load->view('includes/header');
        $this->load->view('pages/admin/view_hospitals',$data);
        $this->load->view('includes/footer');
    }

     //----------this function to get Hospital details-----------------------------
    public function getHospitalDetails() {
        $response = $this->Hospital_model->getHospitalDetails();
        // print_r($response_json);die();
        return $response;
    }
}