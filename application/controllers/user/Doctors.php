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
		$data['all_doctors'] = $this->doctor_model->getAllDoctors();

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/doctors',$data);
	}
}
