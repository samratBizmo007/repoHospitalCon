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
		if(isset($_GET['search_ambulance']) && $_GET['search_ambulance']!='' && isset($_GET['valid']) && $_GET['valid']=='true'){
			extract($_GET);
            $data['all_ambulances'] = $this->ambulance_model->filterAmbulance($search_ambulance); //------------fun for get all ambulances on filter search
        }
        else{
            $data['all_ambulances'] = $this->ambulance_model->getAllAmbulancesHome(); //------------fun for get all ambulances
        }

		$this->load->view('includes/user_header',$data);
		$this->load->view('pages/user/ambulances',$data);
	}
}
