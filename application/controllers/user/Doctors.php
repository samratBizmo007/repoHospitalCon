<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {

	public function index()
	{
		//start session		
		$user_session=$this->session->userdata('user_session');

		//check session variable set or not, otherwise logout
		if((!isset($user_session)) || ($user_session=='')){
			redirect('/');
		}

		// get all hospital details
		$this->load->model('admin/doctor_model');
		if(isset($_GET['search_doctor']) && $_GET['search_doctor']!='' && isset($_GET['valid']) && $_GET['valid']=='true'){
			extract($_GET);
            $data['all_doctors'] = $this->doctor_model->filterDoctor($search_doctor); //------------fun for get all doctors on filter search
        }
        else{
            $data['all_doctors'] = $this->doctor_model->getAllDoctorsHome(); //------------fun for get all doctors
        }
		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/doctors',$data);
	}
}
