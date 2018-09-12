<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add_hospital extends CI_Controller {

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
        $this->load->view('includes/header');
        $this->load->view('pages/admin/add_hospital');
        $this->load->view('includes/footer');
    }

    //----------this function add hospital details-----------------------------
    public function addHospitalDetails() {
          extract($_POST);
          $data=$_POST;
          // print_r($_POST);die();
        $response = $this->Hospital_model->addHospitalDetails($data);
        // print_r($response_json);die();
        return $response;
    }


}
