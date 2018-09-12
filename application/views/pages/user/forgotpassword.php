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
    <div class="login_wrapper ">
      <div class="animate form login_form w3-padding">
        <section class="login_content w3-padding w3-white w3-text-grey w3-card-2">
          <form id="getpasswordForm">
            <h1>Get Password</h1>
            <h6>Don't remember your password? Please enter valid email-id to get your password!</h6>
            <div id="fpasswd_message"></div>
            <div>
              <input type="email" name="user_email" class="form-control" placeholder="Enter email-ID here..." required>
            </div>              
            <div>
              <button class="btn btn-primary btn-block" type="submit" id="getPasswordBtn"><i class="fa fa-unlock"></i> Submit</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">I have a password ?
                <a href="<?php echo base_url(); ?>" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />
            </div>
          </form>
        </section>
      </div>


    </div>
  </div>

  <!-- send user email to get password  -->
  <script>
    $("#getpasswordForm").on('submit', function(e) {
     e.preventDefault(); 
     dataString = $("#getpasswordForm").serialize();

     $.ajax({
      url: BASE_URL+"forgot_password/getPassword", 
      type: "POST",
      data: dataString,
      return: false, //stop the actual form post !important!
      beforeSend: function(){
        $('#getPasswordBtn').html('<span><i class="fa fa-circle-o-notch fa-spin"></i> Sending password...</span>');
      },
      success: function(data){
        $('#fpasswd_message').html(data);
        $('#getPasswordBtn').html('<i class="fa fa-unlock"></i> Submit');
      },
      error:function(data){
       $('#fpasswd_message').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
       $('#getPasswordBtn').html('<i class="fa fa-unlock"></i> Submit');
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
</body>
</html>
