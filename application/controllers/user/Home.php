<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		//start session		
		$user_session=$this->session->userdata('user_session');

		//check session variable set or not, otherwise logout
		if((!isset($user_session)) || ($user_session=='')){
			redirect('/');
		}
		// get all hospital details
		$this->load->model('admin/hospital_model');
		if(isset($_GET['search_hospital']) && $_GET['search_hospital']!='' && isset($_GET['valid']) && $_GET['valid']=='true'){
			extract($_GET);
            $data['all_hospitals'] = $this->hospital_model->filterHospital($search_hospital); //------------fun for get all hospital on filter search
        }
        else{
            $data['all_hospitals'] = $this->hospital_model->getHospitalDetails(); //------------fun for get all hospitals
        }
		

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/home',$data);
	}
}
