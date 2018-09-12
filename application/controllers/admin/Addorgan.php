<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addorgan extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Organ_model'); //---------load organ model for sql operation
        //start session		
        $admin_name = $this->session->userdata('admin_name'); //-------------session variable

        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
    }

    // main index function
    public function index() {
        $data['hospitals'] = Addorgan::getAllHospitals(); //-----------fun for get all hospital
        $this->load->view('includes/header');
        $this->load->view('pages/admin/addorgan', $data); //------------load view 
        $this->load->view('includes/footer');
    }

//---------------------fun for get all hospital details ---------------------------------//
    public function getAllHospitals() {
        $result = $this->Organ_model->getAllHospitals();
        return $result;
    }

//---------------------fun for get all hospital details ---------------------------------//
//---------------------fun for save organ details ---------------------------------//

    public function saveOrganDetails() {
        extract($_POST);
        $data = $_POST;
        if ($Hospital_name == 0) {
            echo '<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Warning!</strong> Please Select Valid Hospital Name.
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
			});
			}, 5000);
			</script>';
            die();
        }
        $result = $this->Organ_model->saveOrganDetails($data);
        //print_r($result);        die();
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Doctor Details Saved SuccessFully.
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
			});
                        window.location.reload();                                                
			}, 2000);
			</script>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Warning!</strong> Doctor Details Not Saved SuccessFully.
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
			});
			}, 5000);
			</script>';
        }
    }

//---------------------fun for save organ details ---------------------------------//
}
