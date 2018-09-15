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

	// function to send password by email
    public function sendMail() {
    	extract($_POST);
    	$user_session=$this->session->userdata('user_session');
    	$arr=explode('|', $user_session);
    	$usermail=$arr[2];
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
    	$this->email->to($email);
    	$this->email->subject("Request for : ".$module_name."");
    	$this->email->message('<html>
    		<head>
    		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    		</head>
    		<body>
    		<div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
    		<h3 style="font-size:15px;">Hello ,<br></h3>
    		<h3 style="font-size:15px;">We got a request from <b>'.$usermail.'</b> for <u><b>'.$module_name.': '.$request_for.'</b></u>. The Requestee needs your help, so please contact the requestee over :<b>'.$usermail.'</b> </h3><br>
    		<h3 style="font-size:15px;">Regards,</h3>
    		<h3 style="font-size:15px;">Hospital Connectivity Admin,</h3>
    		<div class="col-lg-12">
    		<div class="col-lg-4"></div>
    		<div class="col-lg-4">

    		</div>
    		</body></html>');

    	if ($this->email->send()) {
    		echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Email sent successfully.
    		</div>
    		<script>
    		window.setTimeout(function() {
    			$(".alert").fadeTo(500, 0).slideUp(500, function(){
    				$(this).remove();
    				});
    				}, 2000);
    				</script>';
    			} else {
			// print_r($this->email->print_debugger());die();
    				echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Failure!</strong> Email sending Failed.
    				</div>
    				<script>
    				window.setTimeout(function() {
    					$(".alert").fadeTo(500, 0).slideUp(500, function(){
    						$(this).remove();
    						});
    						}, 5000);
    						</script>';
    					}
    				}
	// function ends here

    			}
