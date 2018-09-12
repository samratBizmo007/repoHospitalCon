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
         $data['locations'] = Add_hospital::getAllHospitalLocation();
        $this->load->view('includes/header');
        $this->load->view('pages/admin/add_hospital',$data);
        $this->load->view('includes/footer');
    }

    // --------function for get hospital location
     public function getAllHospitalLocation() {
        $result = $this->Hospital_model->getAllHospitalLocation();
        return $result;
    }
    //----------this function add hospital details-----------------------------
    public function addHospitalDetails() {
          extract($_POST);
          $data=$_POST;
          //print_r($data);die();
            if ($hospital_location == '0') {
            echo '<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong> Please Select Valid Hospital location.
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
        // print_r($_POST);die();
        // $response = $this->Hospital_model->addHospitalDetails($data);
         // print_r($response);die();
         $result = $this->Hospital_model->addHospitalDetails($data);
        // print_r($result);die();
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Hospital Details Saved SuccessFully.
            </div>
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            });
            window.location.reload();
            }, 1000);
                        
            </script>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong> Hospital Details Not Saved SuccessFully.
            </div>
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
            }, 5000);
            </script>';
        }
        // return $response;
    }


}
