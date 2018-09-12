<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vieworgans extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Organ_model');
        //start session		
        $admin_name = $this->session->userdata('admin_name');

        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
    }

    // main index function
    public function index() {
        $data['organs'] = Vieworgans::getAllorgans();
        $data['hospitals'] = Vieworgans::getAllHospitals();
        $this->load->view('includes/header');
        $this->load->view('pages/admin/vieworgan', $data);
        $this->load->view('includes/footer');
    }

    public function getAllorgans() {
        $result = $this->Organ_model->getAllorgans();
        return $result;
    }

    public function getAllHospitals() {
        $result = $this->Organ_model->getAllHospitals();
        return $result;
    }

    public function updateOrganDetails() {
        extract($_POST);
        //print_r($_POST);
        //die();
        $data = $_POST;
        if ($Hospital_name == 0) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Please Select Valid Hospital Name.</h4>';
            die();
        }
        $result = $this->Organ_model->updateOrganDetails($data);
        //print_r($result);die();
        if ($result == 200) {
            echo '<h4 class="w3-text-black w3-margin"><i class="fa fa-check"></i> Organ Details Updated Successfully.</h4>
             <script>
            window.setTimeout(function() {
               location.reload();
               }, 1000);
               </script>';
        } else {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Organ Details Not Updated Successfully.</h4>';
        }
    }

    public function deleteOrganDetails() {
        extract($_POST);
        $result = $this->Organ_model->deleteOrganDetails($organ_id);
        //print_r($result);die();
        if ($result == 200) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Organ Details Deleted SuccessFully.
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
			<strong>Warning!</strong> Organ Details Not Deleted SuccessFully.
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

}
