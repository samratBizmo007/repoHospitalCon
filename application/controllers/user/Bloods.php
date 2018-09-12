<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloods extends CI_Controller {

	public function index()
	{
		// get all hospital details
		$this->load->model('admin/blood_model');
		$data['all_bloods'] = $this->blood_model->getAllBlood();

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/bloods',$data);
	}
}
