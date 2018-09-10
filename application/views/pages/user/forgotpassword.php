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

<body class="login" style="background-position: center;">
  <div>
    <div class="login_wrapper ">
      <div class="animate form login_form w3-padding">
        <section class="login_content w3-padding w3-white w3-text-grey w3-card-2">
          <form >
            <h1>Get Password</h1>
            <h6>Don't remember your password? Please enter valid email-id to get your password!</h6>
            <div>
              <input type="email" class="form-control" placeholder="Enter email-ID here..." required>
            </div>              
            <div>
              <button class="btn btn-primary btn-block" type="submit">Submit</button>
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

  <!-- Authenticate user script  -->
  <script>
 
</script>
</body>
</html>
