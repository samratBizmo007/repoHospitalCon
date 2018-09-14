<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hospitals extends CI_Controller {

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
        $data['doctors'] = Hospitals::getAllDoctors();
        $this->load->view('includes/header');
        $this->load->view('pages/user/add_hospital', $data);
        $this->load->view('includes/footer');
    }

}
