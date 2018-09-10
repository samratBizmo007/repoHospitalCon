<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

    // Login controller
    public function __construct() {
        parent::__construct();

        // load common model
        $this->load->model('admin/Adminlogin_model');
    }

    // main index function
    public function index() {
        // start session		
        $admin_name = $this->session->userdata('admin_name');
        if ($admin_name != '') {
            redirect('admin/dashboard');
        }
        //$this->load->view('includes/header');
        $this->load->view('pages/admin/adminlogin');
        //$this->load->view('includes/footer');
    }

    // check login authentication-----------------------------------------------------------
    public function checkLogin() {
        extract($_POST);
        //print_r($_POST);
       // die();
        $result = $this->Adminlogin_model->authenticate($username, $password);

        // print valid message
        if (!$result) {
            // failure scope
            echo '<p class="w3-red w3-padding-small">Sorry, your credentials are incorrect!</p>';
        } else {
            // success scope
            //----create session array--------//
            $session_data = array(
                'admin_name' => $username,
                'role' => 'administrator'
            );
            //start session of user if login success
            $this->session->set_userdata($session_data);
            //redirect('admin/dashboard');
            echo '200';
        }
    }

    // login fucntion ends here----------------------------------------------------------------------
    // logout function starts here----------------------------------------------------
    public function logoutAdmin() {
        //start session		
        $admin_name = $this->session->userdata('admin_name');
        $role = $this->session->userdata('role');

        //if logout success then destroy session and unset session variables
        $this->session->unset_userdata(array('admin_name', 'role'));
        $this->session->sess_destroy();
        redirect('admin/admin_login');
    }

    // logout function ends here---------------------------------------------------------
}
