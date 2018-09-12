<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloods extends CI_Controller {

	public function index()
	{
		//start session		
		$user_session=$this->session->userdata('user_session');

		//check session variable set or not, otherwise logout
		if((!isset($user_session)) || ($user_session=='')){
			redirect('/');
		}
		
		// get all hospital details
		$this->load->model('admin/blood_model');
		$data['all_bloods'] = $this->blood_model->getAllBlood();

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/bloods',$data);
	}
}
