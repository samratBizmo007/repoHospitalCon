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
    <body class="login" style="background-image: url(<?php echo base_url(); ?>assets/images/swanbg.jpg);background-position: center;">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form w3-padding">
                    <section class="login_content w3-padding w3-white w3-card-2">
                        <form id="AdminForm" name="AdminForm" method="post">
                            <center><span><i class="fa fa-user-secret w3-jumbo"></i></span></center>
                            <div id="message"></div>
                            <div>
                                <input type="text" id="username" name="username" class="form-control w3-small" placeholder="Enter username here..." required>
                            </div>
                            <div>
                                <input type="password" id="password" name="password" class="form-control w3-small" placeholder="Enter password here..." required>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block" id="btnSubmit" type="submit">Submit</button>
                            </div>
<!--                            <div class="clearfix"></div>-->
                            <div class="separator">
<!--                                <p class="change_link">
                                    <a href="#signup" class="to_register" >Lost your password?</a>
                                </p>-->
<!--                                <div class="clearfix"></div>-->
                                <br />
                                <div>
                                    <h1><i class="fa fa-plus-circle w3-text-red"> </i> Hospital Connectivity</h1>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
<!--                <div id="forgotpassword" class="animate form registration_form w3-padding">
                    <section class="login_content w3-padding w3-white w3-text-grey w3-card-2">
                        <div class="w3-padding" id="messageinfo"></div>
                        <form >
                            <h1>Get Password</h1>
                            <h6>Don't remember your password? Please enter valid email-id to get your password!</h6>
                            <div>
                                <input type="email" class="form-control" placeholder="Enter email-ID here..." required>
                            </div>              
                            <div>
                                <button class="btn btn-primary btn-block" ng-click="forgetPassword()">Submit</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <p class="change_link">I have a password ?
                                    <a href="#signin" class="to_register"> Log in </a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-circle-o w3-orange w3-padding-tiny w3-text-white" style="text-shadow: 2px 2px #ff0000;"></i> Swan Industries</h1>
                                    <p>©2018 All Rights Reserved | Powered by <a target="_blank" href="https://bizmo-tech.com">Bizmo Technologies</a></p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>-->
            </div>
        </div>

        <!-- Authenticate user script  -->
        <script>
            $("#AdminForm").submit(function () {
                dataString = $("#AdminForm").serialize();
                alert(dataString);
                $('#btnSubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-circle-o-notch fa-spin"></i><b>Authenticating user. Please wait...</b></span>');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/admin_login/checkLogin",
                    data: dataString,
                    return: false, //stop the actual form post !important!
                    success: function (data)
                    {
                        //alert(data);
                        if (data == 200) {
                            $('#message').html('<p class="w3-green w3-padding-small">Login Successfull! Welcome Admin.</p>');
                            $('#btnSubmit').html('<button class="btn btn-primary btn-block" id="btnSubmit" type="submit">Submit</button>');
                        } else {
                            $('#message').html(data);
                        }
                    }
                });
                return false; //stop the actual form post !important!
            });

            //  -------------------------END -------------------------------//


            //            $scope.submit = function ()
            //            {
            //                $scope.message = '';
            //                // spinner on button
            //                $scope.test = "true";
            //                $scope.loginButtonText = "Authenticating user. Please wait...";
            //                // Do login here        
            //                $timeout(function () {
            //                    // POST form data to controller
            //                    $http({
            //                        method: 'POST',
            //                        url: '<?php echo base_url(); ?>login/checkLogin',
            //                        headers: {'Content-Type': 'application/json'},
            //                        data: JSON.stringify({username: $scope.username, password: $scope.password})
            //                    }).then(function (data) {
            //                        if (data.data == '200') {
            //                            //alert('got');
            //                            $scope.message = '<p class="w3-green w3-padding-small">Login Successfull! Welcome Admin.</p>';
            //                            $window.location.href = BASE_URL + 'admin/dashboard';
            //                        } else {
            //                            $scope.message = data.data;
            //                        }
            //
            //                    });
            //                    $scope.loginButtonText = "Log in as Administrator";
            //                }, 2000);
            //            };
            //            $scope.forgetPassword = function () {
            //                //$.alert();
            //                $http({
            //                    method: 'POST',
            //                    url: '<?php echo base_url(); ?>login/forgetPassword',
            //                    headers: {'Content-Type': 'application/json'},
            //                    data: JSON.stringify({email_id: $scope.email_id})
            //                }).then(function (data) {
            //                    //alert(data.data);
            //                    console.log(data.data);
            //                    $scope.messageinfo = '<p class="w3-green w3-padding-small">' + data.data + '</p>';
            //                });
            //            };
        </script>
    </body>
</html>
