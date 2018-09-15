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
		if(isset($_GET['search_blood']) && $_GET['search_blood']!='' && isset($_GET['valid']) && $_GET['valid']=='true'){
			extract($_GET);
            $data['all_bloods'] = $this->blood_model->filterBlood($search_blood); //------------fun for get all blood on filter search
        }
        else{
            $data['all_bloods'] = $this->blood_model->getAllBloodHome(); //------------fun for get all blood
        }

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/bloods',$data);
	}
}
