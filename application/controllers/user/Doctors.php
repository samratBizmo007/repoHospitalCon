<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {

	public function index()
	{
		// get all hospital details
		$this->load->model('admin/doctor_model');
		$data['all_doctors'] = $this->doctor_model->getAllDoctors();

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/doctors',$data);
	}
}
