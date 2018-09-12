<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambulances extends CI_Controller {

	public function index()
	{
		//start session		
		$user_session=$this->session->userdata('user_session');

		//check session variable set or not, otherwise logout
		if((!isset($user_session)) || ($user_session=='')){
			redirect('/');
		}
		
		// get all hospital details
		$this->load->model('admin/ambulance_model');
		$data['all_ambulances'] = $this->ambulance_model->getAllAmbulances();

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/ambulances',$data);
	}
}
