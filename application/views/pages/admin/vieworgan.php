<title>Hospital Connectivity | View Organs</title>

<!-- page content -->
<div class="right_col" role="main">

    <div class="row x_title">
        <div class="w3-padding">
            <h3><i class="fa fa-user"></i> All Organs</h3>
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
                            Organ Name
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
                    if ($organs != '') {
                        $i = 1;
                        $s = 0;
                        foreach ($organs as $val) {
                            //print_r($val);
                            ?>
                            <tr id="rowCount">
                                <td class="w3-center"><?php echo $i ?></td>
                                <td class="w3-center"><?php echo $val['organ_name']; ?></td>
                                <td class="w3-center"><?php echo $val['organ_quantity']; ?></td>
                                <td class="w3-center"><?php echo $val['hosp_name']; ?> </td>
                                <td class="w3-center">
                                    <a class="btn w3-padding-small" data-toggle="modal" data-target="#updateOrgansModal_<?php echo $val['organ_id']; ?>" title="Update Organ Details">
                                        <i class="w3-text-green w3-large fa fa-edit"></i>
                                    </a>                   
                                    <a class="btn w3-padding-small" onclick="deleteOrganDetails(<?php echo $val['organ_id']; ?>)" title="Delete organs">
                                        <i class="w3-text-red w3-large fa fa-trash"></i>
                                    </a>
                                </td>
                                <!-- Modal -->
                        <div id="updateOrgansModal_<?php echo $val['organ_id']; ?>" class="modal fadeIn" role="dialog">
                            <form id="updateOrganForm_<?php echo $val['organ_id']; ?>" name="updateOrganForm_<?php echo $val['organ_id']; ?>">
                                <div class="modal-dialog modal-lg">
                                    <!----------------------------------- Modal content------------------------------------>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Organ Details</h4>
                                        </div>
                                        <!----------------------------------- Modal Body------------------------------------>                                        
                                        <div class="modal-body">
                                            <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
                                                <fieldset>
                                                    <h2>Organ Details</h2><br>
                                                    <div class="w3-col l12">
                                                        <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom">
                                                            <div class="form-group">
                                                                <label for="organ_name">Organ Name<b class="w3-text-red w3-medium"> *</b> :</label>
                                                                <input type="text" class="form-control" id="organ_name" name="organ_name" value="<?php echo $val['organ_name']; ?>" placeholder="Enter Organ Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom">
                                                            <div class="form-group">
                                                                <label for="Organ_quantity">Organ Quantity<b class="w3-text-red w3-medium"> *</b> :</label>
                                                                <input type="text" class="form-control" id="Organ_quantity" name="Organ_quantity" value="<?php echo $val['organ_quantity']; ?>" placeholder="Enter Organ Quantity" required>
                                                                <input type="hidden" class="form-control" id="Organ_id" name="Organ_id" value="<?php echo $val['organ_id']; ?>" placeholder="Enter Organ Quantity" required>
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
                                                        <button type="submit" name="submitForm" id="submitForm" class="w3-center w3-hover-text-white btn w3-orange w3-margin-top"> <i class="fa fa-save"></i> Save Organ </button>
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
                        <!-------script for update organ-->
                        <script type="text/javascript">
                            $(function () {
                                $("#updateOrganForm_<?php echo $val['organ_id']; ?>").submit(function (e) {
                                    e.preventDefault();
                                    dataString = $("#updateOrganForm_<?php echo $val['organ_id']; ?>").serialize();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url(); ?>admin/vieworgans/updateOrganDetails",
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
                        <!-------script for update organ-->
                        <!-------script for Delete organ-->
                        <script type="text/javascript">
                            function deleteOrganDetails(organ_id) {
                                $.confirm({
                                    title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to Delete Organ Details?</h4>',
                                    content: '',
                                    type: 'red',
                                    buttons: {
                                        confirm: function () {
                                            $.ajax({
                                                url: "<?php echo base_url(); ?>admin/vieworgans/deleteOrganDetails",
                                                type: "POST",
                                                data: {
                                                    organ_id: organ_id
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
    </div>
</div>
