<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller {

	public function index()
	{
		$this->load->view('pages/user/forgotpassword');
	}

	// function to get password of requested emailid 
	public function getPassword(){
		extract($_POST);

		// call model function to verify email id exist or not
		// if exist get password
		$this->load->model('user/user_model');
		$result = $this->user_model->getPassword($user_email);

		if(!$result){
			echo '<div class="alert alert-danger"> Email-Id doesn\'t exist! Register your account. </div>      
			';
		}
		else{
			$sendMail=Forgot_password::sendPassword($result,$user_email);

			if($sendMail){				
				echo '<div class="alert alert-success"> Password sent to your Email-Id.</div>
				<script>
				window.setTimeout(function() {
					$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove(); 
						});
						window.location.href="'.base_url().'";
						}, 1500);
						</script>';
					} 
					else {
						echo '<div class="alert alert-danger"> Password sending failed! Inform Admin to check email configuration.</div>';
					}
				}
			}
	// function ends here

	// function to send password by email
			public function sendPassword($password, $email_id) {

				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'mx1.hostinger.in',
					'smtp_port' => '587',
        	'smtp_user' => 'hospcon@bizmo-tech-admin.com', // change it to yours
        	'smtp_pass' => 'pranavHosp', // change it to yours
        	'mailtype' => 'html',
        	'charset' => 'utf-8',
        	'wordwrap' => TRUE
        );
				$config['smtp_crypto'] = 'tls';

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('hospcon@bizmo-tech-admin.com', "Admin Team");
				$this->email->to($email_id);
				$this->email->subject("Forget Password Request");
				$this->email->message('<html>
					<head>
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					</head>
					<body>
					<div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
					<h3 style="font-size:15px;">Hello '.$email_id.',<br></h3>
					<h3 style="font-size:15px;">As per your request, we are sending your password for Hospital to Hospital Connectivity Portal.</h3>
					<h3 style="font-size:15px;">Following are the user details-</h3>
					<h3>Registered as: '.$email_id.'</h3>
					<h3>Password: '.$password.'</h3>
					<div class="col-lg-12">
					<div class="col-lg-4"></div>
					<div class="col-lg-4">

					</div>
					</body></html>');

				if ($this->email->send()) {
					return true;
				} else {
			// print_r($this->email->print_debugger());die();
					return false;
				}
			}
	// function ends here

		}
