<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addambulance extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Ambulance_model'); //------------load ambulance model for sql operation
        //start session		
        $admin_name = $this->session->userdata('admin_name'); //----------session vaiable

        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
    }

    // main index function
    public function index() {
        $data['hospitals'] = Addambulance::getAllHospitals(); //-------fun to get all hospital details
        $data['ambulances'] = Addambulance::getAllAmbulances(); //-------fun to get all ambulance details
        $this->load->view('includes/header');
        $this->load->view('pages/admin/addambulance', $data); //---------load view
        $this->load->view('includes/footer');
    }

//-------fun to get all hospital details-------------------------------------------//
    public function getAllHospitals() {
        $result = $this->Ambulance_model->getAllHospitals();
        return $result;
    }

//-------fun to get all hospital details-------------------------------------------//
//-------fun to get all ambulance details-------------------------------------------//

    public function getAllAmbulances() {
        $result = $this->Ambulance_model->getAllAmbulances();
        return $result;
    }

//-------fun to get all ambulance details-------------------------------------------//
//-------fun to save ambulance details-------------------------------------------//

    public function saveAmbulaceDetails() {
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
                        window.location.reload();
			}, 2000);
			</script>';
            die();
        }
        $result = $this->Ambulance_model->saveAmbulaceDetails($data);
        //print_r($result);        die();
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Ambulance Details Saved SuccessFully.
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
			<strong>Warning!</strong> Ambulance Details Not Saved SuccessFully.
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

//-------fun to save ambulance details-------------------------------------------//
//-------fun to update ambulance details-------------------------------------------//

    public function updateAmbulanceDetails() {
        extract($_POST);
        //print_r($_POST);
        //die();
        $data = $_POST;
        if ($Hospital_name == 0) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Please Select Valid Hospital Name.</h4>';
            die();
        }
        $result = $this->Ambulance_model->updateAmbulanceDetails($data);
        //print_r($result);die();
        if ($result == 200) {
            echo '<h4 class="w3-text-black w3-margin"><i class="fa fa-check"></i> Ambulance Details Updated Successfully.</h4>
             <script>
            window.setTimeout(function() {
               location.reload();
               }, 1000);
               </script>';
        } else {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Ambulance Details Not Updated Successfully.</h4>';
        }
    }

//-------fun to update ambulance details-------------------------------------------//
//-------fun to delete ambulance details-------------------------------------------//

    public function deleteAmbulanceDetails() {
        extract($_POST);
        $result = $this->Ambulance_model->deleteAmbulanceDetails($ambulance_id);
        //print_r($result);die();
        if ($result == 200) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Ambulance Details Deleted SuccessFully.
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
			<strong>Warning!</strong> Ambulance Details Not Deleted SuccessFully.
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

//-------fun to delete ambulance details-------------------------------------------//
}
