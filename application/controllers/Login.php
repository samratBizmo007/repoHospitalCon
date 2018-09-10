<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
	//start session		
		$user_session=$this->session->userdata('user_session');

	//check session variable set or not, otherwise logout
		// if((isset($user_session)) && ($user_session[0]!='')){
		// 	redirect('user/home');
		// }
		$this->load->view('pages/user/login');
	}

	// ----------------------User lof=gin code starts here-------------------//
	public function verifyUser() {
		extract($_POST);

		//print_r($_POST);die();
        //Connection establishment, processing of data and response from REST API   

		$this->load->model('user/user_model');
		$result = $this->user_model->verifyUser($user_email, $user_passwd);
		//print_r($result);die();

		if ($result) {
        	//----create session array--------//
			$session_data = array(
				'user_session' => "HospitalCon|2018|".$user_email
			);

            //start session of user if login success
			$this->session->set_userdata($session_data);

			echo '<div class="alert alert-success">
			<strong>Login Sucess</strong> 
			</div>
			<script>
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
					});
					window.location.href="'.base_url().'user/home";
					}, 500);
					</script>
					';
			} 
			else {
					echo '<div class="alert alert-danger">
					<strong>Login Credentials are incorrect!</strong> 
					</div>      
					';
				}
			}
		// ---------------admin login fucntion ends here--------------------//

		// -------------------admin logout fucntion starts here---------------//
			public function logout() {
				$admin_name=$this->session->userdata('admin_name');

        //if logout success then destroy session and unset session variables
				$this->session->unset_userdata(array("admin_name" => ""));
				$this->session->sess_destroy();

				redirect('admin/mea_admin');
			}

    //----------function for admin registerd user------------------//
		}
