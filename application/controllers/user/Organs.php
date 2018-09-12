<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organs extends CI_Controller {

	public function index()
	{
		// get all hospital details
		$this->load->model('admin/organ_model');
		$data['all_organs'] = $this->organ_model->getAllorgans();

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/organs',$data);
	}
}
