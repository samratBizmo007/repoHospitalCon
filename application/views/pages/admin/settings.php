<title>Hospital Connectivity | Dashboard</title>
<!-- page content -->
<!--  -->
<div class="right_col" role="main">
    <!-- Main Div  -->
    <div class="row" style="padding-left:10px;">
        <!-- Div for update email-->
        <div id="message"></div>
        <fieldset>
            <div class="col-md-6 col-sm-12 col-xs-12 w3-margin">
                <label><i class="fa fa-envelope"></i> SetUp Email-ID</label><br>
                <form id="updateEmail">
                    <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                        <input type="email" name="admin_email" value="<?php echo $adminDetails['status_message'][2]['value']; ?>" placeholder="Enter Email-ID here..." id="admin_email" class="w3-input" required>
                    </div>
                    <div class="w3-col l4">
                        <button type="submit" class="w3-button" style=" background-color: #FFAF00;">Update Email-ID</button>
                    </div>
                </form>
            </div>
        </fieldset>
        <!-- Div for update email-->
        <!-- Div for update password-->
        <div class="clearfix" style="margin-top: 2px; margin-bottom: 2px;"></div>
        <fieldset>
            <div class="col-md-6 col-sm-12 col-xs-12 w3-margin">
                <label><i class="fa fa-key"></i> Update Password</label><br>
                <form id="updatePass">
                    <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                        <input type="text" name="admin_pass" value="<?php echo $adminDetails['status_message'][1]['value']; ?>" placeholder="Enter Password here..." id="admin_pass" class="w3-input" required>
                    </div>
                    <div class="w3-col l4">
                        <button type="submit" class="w3-button" style=" background-color: #FFAF00;">Update Password</button>
                    </div>
                </form>
            </div>
        </fieldset>
        <!-- Div for update password-->
    </div>
</div>

<!-- script for category -->
<!--  script to update email id   -->
<script>
    $(function () {
        $("#updateEmail").submit(function () {
            dataString = $("#updateEmail").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/settings/updateEmail",
                data: dataString,
                return: false, //stop the actual form post !important!

                success: function (data)
                {
                    $('#message').html(data);
                }
            });
            return false; //stop the actual form post !important!
        });
    });</script>
<!-- script ends here -->
<!--  script to update Password   -->
<script>
    $(function () {
        $("#updatePass").submit(function () {
            dataString = $("#updatePass").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/settings/updatePass",
                data: dataString,
                return: false, //stop the actual form post !important!

                success: function (data)
                {
                    $('#message').html(data);
                }

            });
            return false; //stop the actual form post !important!

        });
    });
</script>
<!-- script ends here -->