<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organs extends CI_Controller {

	public function index()
	{
		//start session		
		$user_session=$this->session->userdata('user_session');

		//check session variable set or not, otherwise logout
		if((!isset($user_session)) || ($user_session=='')){
			redirect('/');
		}

		// get all hospital details
		$this->load->model('admin/organ_model');
		$data['all_organs'] = $this->organ_model->getAllorgans();
		if(isset($_GET['search_organ']) && $_GET['search_organ']!='' && isset($_GET['valid']) && $_GET['valid']=='true'){
			extract($_GET);
            $data['all_organs'] = $this->organ_model->filterOrgan($search_organ); //------------fun for get all ambulances on filter search
        }
        else{
            $data['all_organs'] = $this->organ_model->getAllorgansHome(); //------------fun for get all ambulances
        }

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/organs',$data);
	}
}
