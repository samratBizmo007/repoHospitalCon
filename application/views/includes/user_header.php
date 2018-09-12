<?php 
$user_session=$this->session->userdata('user_session');
$arr=explode('|', $user_session);
$usermail=$arr[2];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Hospital Connectivity | Login</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>assets/fa/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/build/css/w3.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/alert/jquery-confirm.css" rel="stylesheet">
  <!-- js-->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/const.js"></script>
  <script src="<?php echo base_url(); ?>assets/alert/jquery-confirm.js"></script>
  <style type="text/css">  
  .box_shadow{
    background-color: #FFAF00;
    -webkit-box-shadow: 0 8px 6px -6px black;
    -moz-box-shadow: 0 8px 6px -6px black;
    box-shadow: 0 8px 6px -6px black;
  }
  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
  }

  li {
    float: left;
  }

  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
  }

  li a:hover {
    background-color: #E89800;
  }
  .selected{
    background-color: #E89800;
  }
</style>
</head>
<body>
  <?php 
  $page=$this->uri->segment(2);
  ?>
  <div class="container box_shadow w3-text-white">
    <div class="w3-col l10 w3-padding">
      <a href="#">
       <span class="w3-xlarge"><b><i class="fa fa-heartbeat w3-xxxlarge w3-hide-small" style="color: #8B0000"></i> Hospital Connectivity</b></span>
     </a>
   </div>
 </div>
 <div class="container box_shadow w3-text-white">
  <div class="col-lg-12">
    <div class="w3-col l10">
      <ul class="w3-hide-small" style="padding-bottom: 5px">
        <li><a class="btn w3-text-white <?php if($page=='home'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/home"><b> Home</b></a></li>
        <li><a class="btn w3-text-white <?php if($page=='doctors'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/doctors"><b> Doctor</b></a></li>
        <li><a class="btn w3-text-white <?php if($page=='bloods'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/bloods"><b> Blood</b></a></li>
        <li><a class="btn w3-text-white <?php if($page=='organs'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/organs"><b> Organ</b></a></li>
        <li><a class="btn w3-text-white <?php if($page=='ambulances'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/ambulances"><b> Ambulance</b></a></li>
      </ul>
      <ul class="w3-hide-large w3-hide-medium">
        <li><a class="btn w3-text-white <?php if($page=='home'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/home"><i class="fa fa-home w3-xlarge"></i></a></li>
        <li><a class="btn w3-text-white <?php if($page=='doctors'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/doctors"><i class="fa fa-user-md w3-xlarge"></i></a></li>
        <li><a class="btn w3-text-white <?php if($page=='bloods'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/bloods"><i class="fa fa-heart w3-xlarge"></i></a></li>
        <li><a class="btn w3-text-white <?php if($page=='organs'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/organs"><i class="fa fa-wheelchair w3-xlarge"></i></a></li>
        <li><a class="btn w3-text-white <?php if($page=='ambulances'){echo 'selected';} ?>" href="<?php echo base_url(); ?>user/ambulances"><i class="fa fa-ambulance w3-xlarge"></i></a></li>
      </ul>
    </div>
    <div class="w3-col l2 w3-hide-small w3-hide-medium">
      <a class="w3-right btn" style="padding: 0"><span class="fa fa-user"></span> Welcome <b><?php echo $usermail; ?></b></a> 
      <a href="<?php echo base_url(); ?>login/logout" class="w3-right btn" style="padding: 3px 5px"><span class="fa fa-sign-out"></span><b>Logout</b></a>   
    </div>
    <div class="w3-col l2 w3-hide-large w3-margin-top">
      <a class="w3-left btn" style="padding: 0"><span class="fa fa-user"></span> Welcome <b><?php echo $usermail; ?></b></a> 
      <a href="<?php echo base_url(); ?>login/logout" class="w3-right btn" style="padding:0"><span class="fa fa-sign-out"></span><b>Logout</b></a>   
    </div>
    
  </div>
</div>
