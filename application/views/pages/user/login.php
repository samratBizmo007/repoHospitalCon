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
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>assets/fa/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/build/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/build/css/w3.css" rel="stylesheet">
  <!-- angular-->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/const.js"></script>

</head>

<body class="login" style="background-image: url('<?php echo base_url(); ?>assets/imgs/userhosp1.jpg');">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <a class="hiddenanchor" id="forgotpasswd"></a>

    <div class="login_wrapper ">
      <div class="animate form login_form w3-padding">
        <section class="login_content w3-padding w3-white w3-text-grey w3-card-2">
          <form method="POST" id="login_form">
            <h1>Login Form</h1>

            <div id="message"></div>

            <div>
              <input name="user_email" type="text" class="form-control w3-small" placeholder="Enter your email-ID here..." required>
            </div>
            <div>
              <input name="user_passwd" type="password" class="form-control w3-small" placeholder="Enter password here..." required>
            </div>
            <div>
              <button class="btn btn-primary btn-block" type="submit" id="loginBtn"><i class="fa fa-sign-in"></i> Login to Account</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Don't have an account ?
                <a href="#signup" class="to_register"> Register here. </a>
              </p>
              <p class="change_link">
               <a href="<?php echo base_url(); ?>forgot_password" class="to_register" >Lost your password?</a>
             </p>

             <div class="clearfix"></div>
             <br />
<!-- 
              <div>
                <h1><i class="fa fa-circle-o w3-orange w3-padding-tiny w3-text-white" style="text-shadow: 2px 2px #ff0000;"></i> Swan Industries</h1>
              </div> -->
            </div>
          </form>
        </section>
      </div>

      <div id="userRegistration" class="animate form registration_form w3-padding">
        <section class="login_content w3-padding w3-white w3-text-grey w3-card-2">
          <form id="registration_form">
            <h1> Register </h1>
            <h6>Get registered to access all the benefits of Hospital Connect Project!</h6>
            <div id="register_message"></div>
            <div>
              <input type="text" name="user_name" class="form-control" placeholder="Enter Full name here..." required>
            </div>
            <div>
              <input type="number" name="user_number" class="form-control" placeholder="Enter contact number here..." required>
            </div>
            <div>
              <textarea class="form-control" placeholder="Enter address here..." name="user_addr" required></textarea>
            </div>
            <div>
              <input type="email" name="reg_mail" class="form-control" placeholder="Enter email-ID here..." required>
            </div>
            <div>
              <input type="password" name="reg_passwd" minlength="8" class="form-control" placeholder="Enter password here..." required>
            </div>              
            <div>
              <button class="btn btn-primary btn-block" id="registerBtn" type="submit"><i class="fa fa-download"></i> Register Here</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already have an account ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>
              <div class="clearfix"></div>
              <br />
            </div>
          </form>
        </section>
      </div>

    </div>
  </div>

  <!-- Authenticate user script  -->
  <script>
    $("#login_form").on('submit', function(e) {
     e.preventDefault(); 
     dataString = $("#login_form").serialize();

     $.ajax({
      url: BASE_URL+"login/verifyUser", 
      type: "POST",
      data: dataString,
      return: false, //stop the actual form post !important!
      beforeSend: function(){
        $('#loginBtn').html('<span><i class="fa fa-circle-o-notch fa-spin"></i> Authenticating user. Please wait...</span>');
      },
      success: function(data){
        $('#message').html(data);
        $('#loginBtn').html('<i class="fa fa-sign-in"></i> Login to Account');
      },
      error:function(data){
       $('#message').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
       $('#loginBtn').html('<i class="fa fa-sign-in"></i> Login to Account');
       window.setTimeout(function() {
         $(".alert").fadeTo(500, 0).slideUp(500, function(){
           $(this).remove(); 
         });
       }, 5000);
     }
   });
return false;  //stop the actual form post !important!
});
</script>

<!-- Register user script -->
<script>
    // add new user
    $("#registration_form").on('submit', function(e) {
     e.preventDefault(); 
     dataString = $("#registration_form").serialize();

     $.ajax({
      url: BASE_URL+"login/registerUser", 
      type: "POST",
      data: dataString,
      return: false, //stop the actual form post !important!
      beforeSend: function(){
        $('#registerBtn').html('<span><i class="fa fa-circle-o-notch fa-spin"></i> Registering user...</span>');
      },
      success: function(data){
        $('#register_message').html(data);
        $('#registerBtn').html('<i class="fa fa-download"></i> Register Here');
      },
      error:function(data){
       $('#register_message').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
       $('#registerBtn').html('<i class="fa fa-sign-in"></i> Register Here');
       window.setTimeout(function() {
         $(".alert").fadeTo(500, 0).slideUp(500, function(){
           $(this).remove(); 
         });
       }, 5000);
     }
   });
return false;  //stop the actual form post !important!
});
</script>
<!-- Register user script ends -->
</body>
</html>
