<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// get all hospital details
		$this->load->model('admin/hospital_model');
		$data['all_hospitals'] = $this->hospital_model->getHospitalDetails();

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/home',$data);
	}
}
