<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Settings_model'); //-------load the setting model
        //start session		
        $admin_name = $this->session->userdata('admin_name'); //----------admin session variable
        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
    }

    // main index function
    public function index() {
        $data['adminDetails'] = Settings::getAdminDetails(); //------get admin details
        // print_r($data);
        $this->load->view('includes/header');
        $this->load->view('pages/admin/settings', $data);
        $this->load->view('includes/footer');
    }

    //----------this function to get admin details-----------------------------
    public function getAdminDetails() {
        $response = $this->Settings_model->getAdminDetails();
        // print_r($response_json);die();
        return $response;
    }

//-------------------fun ends here-------------------------------------------//
    //----------this function to update admin email-----------------------------//
    public function updateEmail() {
        extract($_POST);
        //$data = $_POST;        
        $response = $this->Settings_model->updateEmail($admin_email);
        if ($response['status'] != 200) {
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Warning!</strong> ' . $response['status_message'] . '
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
			});
			}, 5000);
			</script>';
        } else {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> ' . $response['status_message'] . '
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
			});
			}, 2000);
                        location.reload();
			</script>';
        }
    }

//----------------this fun to update admin email end---------------//
    //----------this function to update Password-----------------------------//
    public function updatePass() {
        extract($_POST);
        //$data = $_POST;       
        $response = $this->Settings_model->updatePass($admin_pass);
        if ($response['status'] != 200) {
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Warning!</strong> ' . $response['status_message'] . '
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
			});
			}, 5000);
			</script>';
        } else {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> ' . $response['status_message'] . '
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
			});
			}, 2000);
                        location.reload();
			</script>';
        }
    }

//----------------this fun to update Password end---------------//
}
