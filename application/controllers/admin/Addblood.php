<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addblood extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Blood_model');  //-------- load bood model for sql operations
        //start session		
        $admin_name = $this->session->userdata('admin_name');  //-----------session variable

        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
    }

    // main index function
    public function index() {
        $data['hospitals'] = Addblood::getAllHospitals(); //--------------get all hospitals
        $data['blood'] = Addblood::getAllBlood(); //--------------get all blood details
        $this->load->view('includes/header');
        $this->load->view('pages/admin/addblood', $data); //----------------load view
        $this->load->view('includes/footer');
    }
//-------------fun for get all hospital details--------------------------------------//
    public function getAllHospitals() {
        $result = $this->Blood_model->getAllHospitals();
        return $result;
    }
//-------------fun for get all hospital details--------------------------------------//
//-------------fun for get all blood details--------------------------------------//

    public function getAllBlood() {
        $result = $this->Blood_model->getAllBlood();
        return $result;
    }
//-------------fun for get all blood details--------------------------------------//
//-----------------fun for save blood details ------------------------------------//
    public function saveBloodDetails() {
        extract($_POST);
        $data = $_POST;
        //print_r($Hospital_name);die();
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
			}, 2000);
			</script>';
            die();
        }
        $result = $this->Blood_model->saveBloodDetails($data);
        //print_r($result);        die();
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Blood Details Saved SuccessFully.
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
			<strong>Warning!</strong> Blood Details Not Saved SuccessFully.
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
//-----------------fun for save blood details ------------------------------------//
//-----------------fun for Update blood details ------------------------------------//

    public function updateBloodDetails() {
        extract($_POST);
        //print_r($_POST);
        //die();
        $data = $_POST;
        if ($Hospital_name == 0) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Please Select Valid Hospital Name.</h4>';
            die();
        }
        $result = $this->Blood_model->updateBloodDetails($data);
        //print_r($result);die();
        if ($result == 200) {
            echo '<h4 class="w3-text-black w3-margin"><i class="fa fa-check"></i> Blood Details Updated Successfully.</h4>
             <script>
            window.setTimeout(function() {
               location.reload();
               }, 1000);
               </script>';
        } else {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Blood Details Not Updated Successfully.</h4>';
        }
    }
//-----------------fun for Update blood details ------------------------------------//
//-----------------fun for Delete blood details ------------------------------------//

    public function deleteBloodDetails() {
        extract($_POST);
        $result = $this->Blood_model->deleteBloodDetails($blood_id);
        //print_r($result);die();
        if ($result == 200) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Blood Details Deleted SuccessFully.
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
			<strong>Warning!</strong> Blood Details Not Deleted SuccessFully.
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
//-----------------fun for Delete blood details ------------------------------------//

}
