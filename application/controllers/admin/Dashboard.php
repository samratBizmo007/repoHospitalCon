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
        $this->load->view('includes/header');
        $this->load->view('pages/admin/dashboard'); //---------load view
        $this->load->view('includes/footer');
    }

}
