<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
        <!--Meta, title, CSS, favicons, etc. -->
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">

        <title>Hospital | Login</title>
        <!--Bootstrap -->
        <link href = "<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--Font Awesome -->
        <link href = "<?php echo base_url(); ?>assets/fa/css/font-awesome.min.css" rel="stylesheet">
        <!--Custom Theme Style -->
        <link href = "<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href = "<?php echo base_url(); ?>assets/build/css/animate.min.css" rel="stylesheet">
        <link href = "<?php echo base_url(); ?>assets/build/css/w3.css" rel="stylesheet">
        <!--angular-->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/const.js"></script>
    </head>
    <body class="login" style="background-image: url(<?php echo base_url(); ?>assets/imgs/docnew.jpg);background-position: center; background-repeat: no-repeat; ">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form w3-padding">
                    <section class="w3-padding w3-white w3-card-2">
                        <!-- admin form starts here-->
                        <form id="AdminForm" name="AdminForm" method="post">
                            <br>
                            <center><span><i class="fa fa-user-secret w3-jumbo"></i></span></center>
                            <br>
                            <div id="message"></div>
                            <div class="w3-padding-small">
                                <input type="text" id="username" name="username" class="form-control w3-small" placeholder="Enter username here..." required>
                            </div>
                            <div class="w3-padding-small">
                                <input type="password" id="password" name="password" class="form-control w3-small" placeholder="Enter password here..." required>
                            </div>
                            <div class="w3-padding-small">
                                <button class="btn btn-primary btn-block" id="btnSubmit" type="submit">Submit</button>
                            </div>
                            <br>
                            <div class="w3-padding-small">
                                <h3><i class="fa fa-plus-circle w3-text-red"></i>&nbsp;Hospital&nbsp;Connectivity</h3>
                            </div>
                        </form>
                        <!-- admin form ends here-->
                    </section>
                </div>
            </div>
        </div>

        <!-- Authenticate user script  -->
        <script>
            //----------------jquery fun to submit the admin login form-----------------------------------//
            $("#AdminForm").submit(function () {
                dataString = $("#AdminForm").serialize(); //-----------get aall form variables in one variable using serialize function
                //alert(dataString);
                $('#btnSubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-circle-o-notch fa-spin"></i><b>Authenticating user. Please wait...</b></span>');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/admin_login/checkLogin", //-----send to the admin_login controller
                    data: dataString,
                    return: false, //stop the actual form post !important!
                    success: function (data)
                    {
                        if (data == 200) {
                            $('#message').html('<p class="w3-green w3-padding-small">Login Successfull! Welcome Admin.</p>');
                            $('#btnSubmit').html('Submit');
                            window.location.href = BASE_URL + 'admin/dashboard';
                        } else {
                            $('#message').html(data);
                            $('#btnSubmit').html('Submit');
                        }
                    }
                });
                return false; //stop the actual form post !important!
            });
            //  -------------------------END -------------------------------//
        </script>
    </body>
</html>
