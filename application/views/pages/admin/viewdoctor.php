<title>Hospital Connectivity | View Doctors</title>
<!-- page content -->
<div class="right_col" role="main">
    <!-- Main Div -->
    <div class="row x_title">
        <div class="w3-padding">
            <h3><i class="fa fa-user-md"></i> All Doctors</h3>
        </div>
    </div>
    <div id="messageinfo"></div>
    <!-- doctor table starts here-->
    <div class="row clearfix" style=" margin-top: 5px;">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <!-- Table div starts here-->
            <table class="table table-responsive" id="tab_logic">
                <thead>
                    <tr class="theme_bg">
                        <th class="text-center">
                            Sr.No
                        </th>
                        <th class="text-center">
                            Doctor Name
                        </th>
                        <th class="text-center">
                            Doctor Email
                        </th>
                        <th class="text-center">
                            Doctor Degree
                        </th>
                        <th class="text-center">
                            Doc Gender
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
                    if ($doctors != '') {
                        $i = 1;
                        $s = 0;
                        foreach ($doctors as $val) {
                            ?>
                            <tr id="rowCount">
                                <td class="w3-center"><?php echo $i ?></td>
                                <td class="w3-center"><?php echo $val['doc_name']; ?></td>
                                <td class="w3-center"><?php echo $val['doc_email']; ?></td>
                                <td class="w3-center"><?php echo $val['doc_degree']; ?></td>
                                <td class="w3-center"><?php echo $val['doc_gender']; ?></td>
                                <td class="w3-center"><?php echo $val['hosp_name']; ?>
                                </td>
                                <td class="w3-center">
                                    <a class="btn w3-padding-small" data-toggle="modal" data-target="#updateDoctorsModal_<?php echo $val['doc_id']; ?>" title="Update Doctor Details">
                                        <i class="w3-text-green w3-large fa fa-edit"></i>
                                    </a>                   
                                    <a class="btn w3-padding-small" onclick="deleteDoctorDetails(<?php echo $val['doc_id']; ?>)" title="Delete Doctors">
                                        <i class="w3-text-red w3-large fa fa-trash"></i>
                                    </a>
                                </td>
                                <!-- Modal -->
                        <div id="updateDoctorsModal_<?php echo $val['doc_id']; ?>" class="modal fadeIn" role="dialog">
                            <form id="updateDoctorsForm_<?php echo $val['doc_id']; ?>" name="updateDoctorsForm_<?php echo $val['doc_id']; ?>">
                                <div class="modal-dialog modal-lg">
                                    <!----------------------------------- Modal content------------------------------------>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Doctor Details</h4>
                                        </div>
                                        <!----------------------------------- Modal Body------------------------------------>                                        
                                        <div class="modal-body">
                                            <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
                                                <fieldset>
                                                    <h2>Doctor Details</h2><br>
                                                    <div class="w3-col l12">
                                                        <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom">
                                                            <div class="form-group">
                                                                <label for="doctor_name">Doctor Name<b class="w3-text-red w3-medium"> *</b> :</label>
                                                                <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php echo $val['doc_name']; ?>" placeholder="Enter Doctor Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom">
                                                            <div class="form-group">
                                                                <label for="Doc_degree">Doctor Degree / specialization<b class="w3-text-red w3-medium"> *</b> :</label>
                                                                <input type="text" class="form-control" id="Doc_degree" name="Doc_degree" value="<?php echo $val['doc_degree']; ?>" placeholder="Enter Degree Specialization" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom" >
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

                                                    <div class="w3-col l12">
                                                        <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom">
                                                            <div class="form-group">
                                                                <label for="product_name">Doctor Email<b class="w3-text-red w3-medium"> *</b> :</label>
                                                                <input type="text" class="form-control" id="Doc_email" name="Doc_email" value="<?php echo $val['doc_email']; ?>" placeholder="Enter product name" required>
                                                                <input type="hidden" class="form-control" id="Doc_id" name="Doc_id" value="<?php echo $val['doc_id']; ?>" placeholder="Enter product name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom">
                                                            <div class="form-group">
                                                                <label for="doc_gender">Gender<b class="w3-text-red w3-medium"> *</b> :</label><br>
                                                                <input type="radio" name="Doc_gender" id="gender" value="Male" <?php
                                                                if ($val['doc_gender'] == 'Male') {
                                                                    echo ' checked ';
                                                                }
                                                                ?> > Male &nbsp;&nbsp;
                                                                <input type="radio" name="Doc_gender" id="gender" value="Female" <?php
                                                                if ($val['doc_gender'] == 'Female') {
                                                                    echo ' checked ';
                                                                }
                                                                ?> > Female
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w3-col l12 w3-center">
                                                        <button type="submit" name="submitForm" id="submitForm" class="w3-center w3-hover-text-white btn w3-margin-top w3-text-black" style=" background-color: #FFAF00;"> <i class="fa fa-save"></i> Update Doctor </button>
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
                        <!-------script for update doctor-->
                        <script type="text/javascript">
                            $(function () {
                                $("#updateDoctorsForm_<?php echo $val['doc_id']; ?>").submit(function (e) {
                                    e.preventDefault();
                                    dataString = $("#updateDoctorsForm_<?php echo $val['doc_id']; ?>").serialize();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url(); ?>admin/viewdoctors/updateDoctorDetails",
                                        data: dataString,
                                        return: false, //stop the actual form post !important!
                                        success: function (data)
                                        {
                                            $.alert(data);
                                        }
                                    });
                                    return false; //stop the actual form post !important!
                                });
                            });
                        </script>
                        <!-------script for update Doctor-->
                        <!-------script for delete doctor-->
                        <script type="text/javascript">
                            function deleteDoctorDetails(doc_id) {
                                $.confirm({
                                    title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to Delete Doctor Details?</h4>',
                                    content: '',
                                    type: 'red',
                                    buttons: {
                                        confirm: function () {
                                            $.ajax({
                                                url: "<?php echo base_url(); ?>admin/viewdoctors/deleteDoctorDetails",
                                                type: "POST",
                                                data: {
                                                    doc_id: doc_id
                                                },
                                                cache: false,
                                                success: function (data) {
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
                        <!-------script for delete doctor-->
                        <!-- Modal Ends Here-->
                        </tr>
                        <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7" class="w3-center">No Records Found..!</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <!-- Table div ends here-->
        </div>
    </div>
    <!-- doctor table starts here-->
</div>
<!-- Main Div Ends Here-->

