<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_hospitals extends CI_Controller {

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
        $data['HospitalDetails'] = View_hospitals::getHospitalDetails();
        $data['locations'] = View_hospitals::getAllHospitalLocation();
        $this->load->view('includes/header');
        $this->load->view('pages/admin/view_hospitals', $data);
        $this->load->view('includes/footer');
    }

    //----------this function to get Hospital details-----------------------------
    public function getHospitalDetails() {
        $response = $this->Hospital_model->getHospitalDetails();
        // print_r($response_json);die();
        return $response;
    }

    // --------function for get hospital location
    public function getAllHospitalLocation() {
        $result = $this->Hospital_model->getAllHospitalLocation();
        return $result;
    }

//--------function for update hospital details
    public function updateHospitalDetails() {
        extract($_POST);
        if ($hospital_location == '0') {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Please Select Valid Hospital Location.</h4>';
            die();
        }
        $data = $_POST;
        $result = $this->Hospital_model->updateHospitalDetails($data);
        // print_r($result);die();
        if ($result) {
            echo '<h4 class="w3-text-black w3-margin"><i class="fa fa-check"></i> Hospital Details Updated Successfully.</h4>
             <script>
            window.setTimeout(function() {
               location.reload();
               }, 1000);
               </script>';
        } else {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Hospital Details Not Updated Successfully.</h4>';
        }
    }

    public function deleteHospitalDetails() {
        extract($_POST);
        $result = $this->Hospital_model->deleteHospitalDetails($hosp_id);
        //print_r($result);die();
        if ($result == 200) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Hospital Details Deleted SuccessFully.
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
            <strong>Warning!</strong> Hospital Details Not Deleted SuccessFully.
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
