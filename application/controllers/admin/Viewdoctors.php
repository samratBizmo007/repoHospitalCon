<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Viewdoctors extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Doctor_model'); //--------------load model for sql operation
        //start session		
        $admin_name = $this->session->userdata('admin_name'); //---------------session variable

        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
    }

    // main index function
    public function index() {
        $data['doctors'] = Viewdoctors::getAllDoctors(); //---------------fun for get all doctors
        $data['hospitals'] = Viewdoctors::getAllHospitals(); //-----------------fun for get all hospitals 

        $this->load->view('includes/header');
        $this->load->view('pages/admin/viewdoctor', $data); //------------load view
        $this->load->view('includes/footer');
    }

//-----------------fun for get all doctors details------------------------------------------//
    public function getAllDoctors() {
        $result = $this->Doctor_model->getAllDoctors();
        return $result;
    }

//-----------------fun for get all doctor details------------------------------------------//
//-----------------fun for get all hospital details------------------------------------------//

    public function getAllHospitals() {
        $result = $this->Doctor_model->getAllHospitals();
        return $result;
    }

//-----------------fun for get all hospital details------------------------------------------//
//-----------------fun for Update Doctor details------------------------------------------//

    public function updateDoctorDetails() {
        extract($_POST);
        //print_r($_POST);
        //die();
        $data = $_POST;
        if ($Hospital_name == 0) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Please Select Valid Hospital Name.</h4>';
            die();
        }
        $result = $this->Doctor_model->updateDoctorDetails($data);
        //print_r($result);die();
        if ($result == 200) {
            echo '<h4 class="w3-text-black w3-margin"><i class="fa fa-check"></i> Doctor Details Updated Successfully.</h4>
             <script>
            window.setTimeout(function() {
               location.reload();
               }, 1000);
               </script>';
        } else {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Doctor Details Not Updated Successfully.</h4>';
        }
    }

//-----------------fun for Update Doctor details------------------------------------------//
//-----------------fun for Delete Doctor details------------------------------------------//

    public function deleteDoctorDetails() {
        extract($_POST);
        $result = $this->Doctor_model->deleteDoctorDetails($doc_id);
        //print_r($result);die();
        if ($result == 200) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Doctor Details Deleted SuccessFully.
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
			});
			}, 5000);
                                                location.reload();

			</script>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Warning!</strong> Doctor Details Not Deleted SuccessFully.
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

//-----------------fun for Delete Doctor details------------------------------------------//
}
