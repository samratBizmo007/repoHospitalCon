<title>Hospital Connectivity | Add Blood</title>

<!-- page content -->
<div class="right_col" role="main">
    <!-- main div-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="page_title">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3><i class="fa fa-plus-circle"></i> Add Blood </h3>
                    </div>
                </div>

                <div id="message"></div>
                <form id="addBloodDetails" name="addBloodDetails">
                    <!-- Form for save blood details-->
                    <fieldset>
                        <h2>Blood Details</h2><br>
                        <div class="w3-col l12">                            
                            <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom" >
                                <div class="form-group">
                                    <label for="blood_group">Blood Group<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <input type="text" class="form-control" id="blood_group" name="blood_group" placeholder="Enter Blood Group" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom">
                                <div class="form-group">
                                    <label for="blood_quantity">Blood Quantity<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <input type="number" class="form-control" id="blood_quantity" name="blood_quantity" placeholder="Enter Blood Quantity" required>
                                </div>
                            </div>
                        </div> 
                        <div class="w3-col l12">
                            <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom" >
                                <div class="form-group">
                                    <label for="Hospital_name">Hospital Name<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <select name="Hospital_name" class="form-control w3-small" id="Hospital_name">
                                        <option value="0" class="w3-text-grey w3-light-grey " selected>Please choose Hospital</option>
                                        <?php foreach ($hospitals as $key) { ?>
                                            <option value="<?php echo $key['hosp_id']; ?>"><?php echo $key['hosp_name']; ?></option>  
                                        <?php } ?>
                                    </select>
                                </div>                                
                            </div>
                        </div>
                        <div class="w3-col l12 w3-center">
                            <button type="submit" name="submitForm" id="submitForm" class="w3-center w3-hover-text-white btn w3-margin-top w3-text-black" style=" background-color: #FFAF00;"> <i class="fa fa-save"></i> Save Blood Details </button>
                        </div>
                    </fieldset>
                    <!-- Form for save blood details-->
                </form>
            </div>

            <!--Div For show Blood details in table-->
            <div class="page_title">
                <div class="row x_title">
                    <div class="w3-padding">
                        <h3><i class="fa fa-tint w3-text-red"></i> All Blood</h3>
                    </div>
                </div>
                <div id="messageinfo"></div>
                <div class="row clearfix" style=" margin-top: 5px;">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <!-- blood table starts here-->
                        <table class="table table-responsive" id="tab_logic">
                            <thead>
                                <tr class="theme_bg">
                                    <th class="text-center">
                                        Sr.No
                                    </th> 
                                    <th class="text-center">
                                        Blood Group
                                    </th>
                                    <th class="text-center">
                                        Blood Quantity
                                    </th>                        
                                    <th class="text-center">
                                        Hospital Name
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //print_r($doctors);
                                //die();
                                if ($blood != '') {
                                    $i = 1;
                                    $s = 0;
                                    foreach ($blood as $val) {
                                        //print_r($val);
                                        ?>
                                        <tr id="rowCount">
                                            <td class="w3-center"><?php echo $i ?></td>
                                            <td class="w3-center"><?php echo $val['blood_group'] ?></td>
                                            <td class="w3-center"><?php echo $val['blood_quantity']; ?></td>
                                            <td class="w3-center"><?php echo $val['hosp_name']; ?> </td>
                                            <td class="w3-center">
                                                <a class="btn w3-padding-small" data-toggle="modal" data-target="#updateBloodModal_<?php echo $val['blood_id']; ?>" title="Update Blood Details">
                                                    <i class="w3-text-green w3-large fa fa-edit"></i>
                                                </a>                   
                                                <a class="btn w3-padding-small" onclick="deleteBloodDetails(<?php echo $val['blood_id']; ?>)" title="Delete Blood">
                                                    <i class="w3-text-red w3-large fa fa-trash"></i>
                                                </a>
                                            </td>
                                            <!-- Modal -->
                                    <div id="updateBloodModal_<?php echo $val['blood_id']; ?>" class="modal fadeIn" role="dialog">
                                        <form id="updateBloodForm_<?php echo $val['blood_id']; ?>" name="updateBloodForm_<?php echo $val['blood_id']; ?>">
                                            <div class="modal-dialog modal-lg">
                                                <!----------------------------------- Modal content------------------------------------>
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Update Blood Details</h4>
                                                    </div>
                                                    <!----------------------------------- Modal Body------------------------------------>                                        
                                                    <div class="modal-body">
                                                        <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
                                                            <fieldset>
                                                                <h2>Blood Details</h2><br>
                                                                <div class="w3-col l12">                            
                                                                    <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom" >
                                                                        <div class="form-group">
                                                                            <label for="blood_group">Blood Group<b class="w3-text-red w3-medium"> *</b> :</label>
                                                                            <input type="text" class="form-control" id="blood_group" name="blood_group" value="<?php echo $val['blood_group']; ?>" placeholder="Enter Blood Group" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom">
                                                                        <div class="form-group">
                                                                            <label for="blood_quantity">Blood Quantity<b class="w3-text-red w3-medium"> *</b> :</label>
                                                                            <input type="text" class="form-control" id="blood_quantity" name="blood_quantity" value="<?php echo $val['blood_quantity']; ?>" placeholder="Enter Blood Quantity" required>
                                                                            <input type="hidden" class="form-control" id="blood_id" name="blood_id" value="<?php echo $val['blood_id']; ?>" placeholder="Enter Blood Quantity" required>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <div class="w3-col l12">
                                                                    <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom" >
                                                                        <div class="form-group">
                                                                            <label for="Hospital_name">Hospital Name<b class="w3-text-red w3-medium"> *</b> :</label>
                                                                            <select name="Hospital_name" class="form-control w3-small" id="Hospital_name">
                                                                                <option value="0" class="w3-text-grey w3-light-grey " selected>Please choose Hospital</option>
                                                                                <?php foreach ($hospitals as $key) { ?>
                                                                                    <option value="<?php echo $key['hosp_id']; ?>" <?php if ($key['hosp_id'] == $val['hosp_id']) echo ' selected="selected"'; ?>><?php echo $key['hosp_name']; ?></option>  
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>                                
                                                                    </div>
                                                                </div>
                                                                <div class="w3-col l12 w3-center">
                                                                    <button type="submit" name="submitForm" id="submitForm" class="w3-center w3-hover-text-white btn w3-margin-top w3-text-black" style=" background-color: #FFAF00;"> <i class="fa fa-save"></i> Save Blood Details </button>
                                                                </div>
                                                            </fieldset>
                                                            <div id="message"></div>
                                                        </div>
                                                    </div>
                                                    <!----------------------------------- Modal Body------------------------------------>                                                                               
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-------script for update blood-->
                                    <script type="text/javascript">
                                        $(function () {
                                            $("#updateBloodForm_<?php echo $val['blood_id']; ?>").submit(function (e) {
                                                e.preventDefault();
                                                dataString = $("#updateBloodForm_<?php echo $val['blood_id']; ?>").serialize();
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?php echo base_url(); ?>admin/addblood/updateBloodDetails",
                                                    data: dataString,
                                                    return: false, //stop the actual form post !important!
                                                    success: function (data)
                                                    {
                                                        $.alert(data);
                                                        //$('#message').html(data);
                                                    }
                                                });
                                                return false; //stop the actual form post !important!
                                            });
                                        });
                                    </script>
                                    <!-------script for update blood-->
                                    <!-------script for Delete blood-->
                                    <script type="text/javascript">
                                        function deleteBloodDetails(blood_id) {
                                            $.confirm({
                                                title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to Delete Blood Details?</h4>',
                                                content: '',
                                                type: 'red',
                                                buttons: {
                                                    confirm: function () {
                                                        $.ajax({
                                                            url: "<?php echo base_url(); ?>admin/addblood/deleteBloodDetails",
                                                            type: "POST",
                                                            data: {
                                                                blood_id: blood_id
                                                            },
                                                            cache: false,
                                                            success: function (data) {
                                                                // alert(data);
                                                                //$.alert(data);
                                                                $('#messageinfo').html(data);
                                                            }
                                                        });
                                                    },
                                                    cancel: function () {
                                                    }
                                                }
                                            });
                                        }
                                    </script>
                                    <!-------script for Delete blood-->
                                    <!-- Modal Ends Here-->
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5" class="w3-center">No Records Found..!</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <!-- blood table ends here-->
                    </div>
                </div>
            </div>
            <!--Div For show Blood details in table-->
        </div>
    </div>
</div>
<script>
    //----------------jquery fun to submit the add Doctor form-----------------------------------//
    $("#addBloodDetails").submit(function () {
        dataString = $("#addBloodDetails").serialize(); //-----------get aall form variables in one variable using serialize function
        //alert(dataString);
        $('#submitForm').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-circle-o-notch fa-spin"></i><b>Saving Blood. Please wait...</b></span>');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/addblood/saveBloodDetails", //-----send to the admin_login controller
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                //alert(data);
                $('#message').html(data);
                $('#submitForm').html('Save Blood Details');
                //location.reload();
            }
        });
        return false; //stop the actual form post !important!
    });
    //  -------------------------END -------------------------------//
</script>
