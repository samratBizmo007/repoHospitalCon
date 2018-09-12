<title>Hospital Connectivity | Add Ambulance</title>
<style type="text/css">
    #addProduct fieldset{
        /*display: none;*/
        margin-bottom: 16px
    }
</style>
<!-- page content -->
<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="page_title">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3><i class="fa fa-plus-circle"></i> Add Ambulance </h3>
                    </div>
                </div>

                <div id="message"></div>
                <form id="addAmbulanceDetails" name="addAmbulanceDetails">
                    <fieldset>
                        <h2>Ambulance Details</h2><br>
                        <div class="w3-col l12">                            
                            <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom">
                                <div class="form-group">
                                    <label for="ambulance_quantity">Ambulance Quantity<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <input type="text" class="form-control" id="ambulance_quantity" name="ambulance_quantity" placeholder="Enter Ambulance Quantity" required>
                                </div>
                            </div>
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
                            <button type="submit" name="submitForm" id="submitForm" class="w3-center w3-hover-text-white btn w3-orange w3-margin-top"> <i class="fa fa-save"></i> Save Ambulance Details </button>
                        </div>
                    </fieldset>
                </form>
            </div>

            <!--Div For show ambulances in table-->
            <div class="page_title">
                <div class="row x_title">
                    <div class="w3-padding">
                        <h3><i class="fa fa-user"></i> All Ambulance</h3>
                    </div>
                </div>
                <div id="messageinfo"></div>

                <div class="row clearfix" style=" margin-top: 5px;">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12"    >
                        <table class="table table-responsive" id="tab_logic">
                            <thead>
                                <tr class="theme_bg">
                                    <th class="text-center">
                                        Sr.No
                                    </th>                              
                                    <th class="text-center">
                                        Organ Quantity
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
                                if ($ambulances != '') {
                                    $i = 1;
                                    $s = 0;
                                    foreach ($ambulances as $val) {
                                        //print_r($val);
                                        ?>
                                        <tr id="rowCount">
                                            <td class="w3-center"><?php echo $i ?></td>
                                            <td class="w3-center"><?php echo $val['ambulance_quantity']; ?></td>
                                            <td class="w3-center"><?php echo $val['hosp_name']; ?> </td>
                                            <td class="w3-center">
                                                <a class="btn w3-padding-small" data-toggle="modal" data-target="#updateAmbulanceModal_<?php echo $val['ambulance_id']; ?>" title="Update Ambulance Details">
                                                    <i class="w3-text-green w3-large fa fa-edit"></i>
                                                </a>                   
                                                <a class="btn w3-padding-small" onclick="deleteAmbulanceDetails(<?php echo $val['ambulance_id']; ?>)" title="Delete organs">
                                                    <i class="w3-text-red w3-large fa fa-trash"></i>
                                                </a>
                                            </td>
                                            <!-- Modal -->
                                    <div id="updateAmbulanceModal_<?php echo $val['ambulance_id']; ?>" class="modal fadeIn" role="dialog">
                                        <form id="updateAmbulanceForm_<?php echo $val['ambulance_id']; ?>" name="updateAmbulanceForm_<?php echo $val['ambulance_id']; ?>">
                                            <div class="modal-dialog modal-lg">
                                                <!----------------------------------- Modal content------------------------------------>
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Update Employee Details</h4>
                                                    </div>
                                                    <!----------------------------------- Modal Body------------------------------------>                                        
                                                    <div class="modal-body">
                                                        <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
                                                            <fieldset>
                                                                <h2>Ambulance Details</h2><br>
                                                                <div class="w3-col l12">                            
                                                                    <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom">
                                                                        <div class="form-group">
                                                                            <label for="ambulance_quantity">Ambulance Quantity<b class="w3-text-red w3-medium"> *</b> :</label>
                                                                            <input type="text" class="form-control" id="ambulance_quantity" name="ambulance_quantity" value="<?php echo $val['ambulance_quantity']; ?>" placeholder="Enter Ambulance Quantity" required>
                                                                            <input type="hidden" class="form-control" id="ambulance_id" name="ambulance_id" value="<?php echo $val['ambulance_id']; ?>" placeholder="Enter Ambulance Quantity" required>
                                                                        </div>
                                                                    </div>
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
                                                                    <button type="submit" name="submitForm" id="submitForm" class="w3-center w3-hover-text-white btn w3-orange w3-margin-top"> <i class="fa fa-save"></i> Update Ambulance Details </button>
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
                                    <script type="text/javascript">
                                        $(function () {
                                            $("#updateAmbulanceForm_<?php echo $val['ambulance_id']; ?>").submit(function (e) {
                                                e.preventDefault();
                                                dataString = $("#updateAmbulanceForm_<?php echo $val['ambulance_id']; ?>").serialize();
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?php echo base_url(); ?>admin/addambulance/updateAmbulanceDetails",
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
                                    <!-------script for update material-->
                                    <script type="text/javascript">
                                        function deleteAmbulanceDetails(ambulance_id) {
                                            $.confirm({
                                                title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to Delete Ambulance Details?</h4>',
                                                content: '',
                                                type: 'red',
                                                buttons: {
                                                    confirm: function () {
                                                        $.ajax({
                                                            url: "<?php echo base_url(); ?>admin/addambulance/deleteAmbulanceDetails",
                                                            type: "POST",
                                                            data: {
                                                                ambulance_id: ambulance_id
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
                    </div>
                </div></div>

        </div>
    </div>
</div>
<script>
    //----------------jquery fun to submit the add Doctor form-----------------------------------//
    $("#addAmbulanceDetails").submit(function () {
        dataString = $("#addAmbulanceDetails").serialize(); //-----------get aall form variables in one variable using serialize function
        //alert(dataString);
        $('#submitForm').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-circle-o-notch fa-spin"></i><b>Saving Organ. Please wait...</b></span>');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/addambulance/saveAmbulaceDetails", //-----send to the admin_login controller
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                //alert(data);
                $('#message').html(data);
                $('#submitForm').html('Save Ambulance Details');
                location.reload();
            }
        });
        return false; //stop the actual form post !important!
    });
    //  -------------------------END -------------------------------//
</script>
