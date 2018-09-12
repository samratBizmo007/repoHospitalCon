<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
	//start session		
		$user_session=$this->session->userdata('user_session');

	//check session variable set or not, otherwise logout
		if((isset($user_session)) && ($user_session!='')){
			redirect('user/home');
		}
		$this->load->view('pages/user/login');
	}

	// ----------------------User login code starts here-------------------//
	public function verifyUser() {
		extract($_POST);
		$this->load->model('user/user_model');
		$result = $this->user_model->verifyUser($user_email, $user_passwd);

		if ($result) {
        	//----create session array--------//
			$session_data = array(
				'user_session' => "HospitalCon|2018|".$user_email
			);

            //start session of user if login success
			$this->session->set_userdata($session_data);

			echo '<div class="alert alert-success">
			Login Sucess 
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
					Login Credentials are incorrect! 
					</div>      
					';
				}
			}
		// ---------------admin login fucntion ends here--------------------//

	// ----------------------User login code starts here-------------------//
			public function registerUser() {
				$data=$_POST;
				extract($data);

				$this->load->model('user/user_model');

		// check email already exist or not
				$checkEmail = $this->user_model->checkEmail($reg_mail);
				if($checkEmail){
					$result = $this->user_model->registerUser($data);

					if ($result) {

						echo '<div class="alert alert-success">
						Registration Sucessfull. 
						</div>
						<script>
						window.setTimeout(function() {
							$(".alert").fadeTo(500, 0).slideUp(500, function(){
								$(this).remove(); 
								});
								window.location.href="'.base_url().'";
								}, 1000);
								</script>
								';
							} 
							else {
								echo '<div class="alert alert-danger">
								Registration failed! 
								</div>      
								';
							}
						}
						else{
							echo '<div class="alert alert-danger">
							Email-ID already registered! Try Login. 
							</div>      
							';
						}

					}
	// ---------------admin login fucntion ends here--------------------//

		// -------------------admin logout fucntion starts here---------------//
					public function logout() {
						$user_session=$this->session->userdata('user_session');

        //if logout success then destroy session and unset session variables
						$this->session->unset_userdata(array("user_session" => ""));
						$this->session->sess_destroy();

						redirect('/');
					}

    //----------function for admin registerd user------------------//
				}
