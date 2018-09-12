
    <title>Hospital Connectivity | Show Hospitals</title>
<!-- page content -->
<!--  -->
<div class="right_col" role="main">
     <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
        <div class="row x_title">
        	<div class="w3-padding"><h3><i class="fa fa-plus"></i> All Hospitals</h3>
       		 </div>
    </div>
    <div class="row clearfix" style=" margin-top: 5px;">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12"    >
            <table class="table table-responsive" id="tab_logic">
                <thead>
                    <tr class="theme_bg">
                        <th class="text-center">
                            Sr.No
                        </th>
                        <th class="text-center">
                            Hospital Name
                        </th>
                        <th class="text-center">
                           Hospital Number
                        </th>
                        <th class="text-center">
                         	Hospital Location
                        </th>
                        <th class="text-center">
                           Hospital Address
                        </th>
                         <th class="text-center">
                           Action
                        </th>
                    </tr>
                </thead>
                 <tbody>
                    <?php
                    //print_r($HospitalDetails);die();
                    if ($HospitalDetails['status'] == 200) {
                        $i = 1;
                        $s = 0;
                        foreach ($HospitalDetails['status_message'] as $val) {
                            // print_r($val);
                            ?>
                            <tr id="rowCount">
                                <td class="w3-center"><?php echo $i ?></td>
                                <td class="w3-center"><?php echo $val['hosp_name']; ?></td>
                                <td class="w3-center"><?php echo $val['hosp_number']; ?></td>
                                <td class="w3-center"><?php echo $val['hosp_location']; ?></td>
                                <td class="w3-center"><?php echo $val['hosp_addr']; ?></td>
                                </td>
                                <td class="w3-center">
                                    <a class="btn w3-padding-small" data-toggle="modal" data-target="#updateEmployeeModal_<?php echo $val['hosp_id']; ?>" ng-click="getEmployeeSkills(<?php echo $val['hosp_id']; ?>)" title="Update Employee Details">
                                        <i class="w3-text-green w3-large fa fa-edit"></i>
                                    </a>                   
                                    <a class="btn w3-padding-small" onclick="deleteEmployeeDetails(<?php echo $val['hosp_id']; ?>)" title="Delete Employee">
                                        <i class="w3-text-red w3-large fa fa-trash"></i>
                                    </a>
                                </td>
                                <!-- Modal -->
                        <div id="updateEmployeeModal_<?php echo $val['hosp_id']; ?>" class="modal" role="dialog">
                            <form id="updateEmployeeForm_<?php echo $val['hosp_id']; ?>" name="updateEmployeeForm_<?php echo $val['hosp_id']; ?>">
                                <div class="modal-dialog modal-lg">
                                    <!----------------------------------- Modal content------------------------------------>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Hospital Details</h4>
                                        </div>
                                        <!----------------------------------- Modal Body------------------------------------>                                        
                                        <div class="modal-body">
                                            <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
                                                <fieldset>
                                                    <div class="row" style=" margin-top: 5px;">
                                                        <div class="col-lg-1"></div>
                                                        <div class="col-lg-10">
                                                            <div class="w3-col l12 w3-margin-bottom">
                                                                <div class="col-lg-6 col-xs-12 col-sm-12" id="">
                                                                    <label>Hospital Name <b class="w3-text-red w3-medium">*</b></label>
                                                                    <input type="text" name="hospital_name" id="hospital_name" class="form-control" placeholder="Hospital Name" value="<?php echo $val['hosp_name'] ?>" required>
                                                                    <input type="hidden" name="emp_id" id="emp_id" class="form-control" placeholder="Employee Name" value="<?php echo $val['hosp_name'] ?>">
                                                                </div>
                                                                <div class="col-lg-6 col-xs-12 col-sm-12" id="">
                                                                    <label>Hospital Number <b class="w3-text-red w3-medium">*</b></label>
                                                                    <input type="number" name="hospital_num" id="hospital_num" class="form-control" placeholder="Enter Number here" value="<?php echo $val['hosp_number']; ?>" required>
                                                                </div>
                                                            </div>
                                                           <div class="w3-col l12 w3-margin-bottom">
                                                                <div class="col-lg-6 col-xs-12 col-sm-12" id="">
                                                                    <label>Hospital Location <b class="w3-text-red w3-medium">*</b></label>
                                                                    <input type="text" name="hospital_location" id="hospital_location" class="form-control" placeholder="Hospital Name" value="<?php echo $val['hosp_location'] ?>" required>
                                                                    <input type="hidden" name="hosp_id" id="hosp_id" class="form-control" placeholder="Hospital Name" value="<?php echo $val['hosp_location'] ?>">
                                                                </div>
                                                                <div class="col-lg-6 col-xs-12 col-sm-12" id="">
                                                                    <label>Hospital Address <b class="w3-text-red w3-medium">*</b></label>
                                                                    <textarea name="hospital_address" id="hospital_address" class="form-control" placeholder="Enter Number here" value="<?php echo $val['hosp_addr']; ?>" required></textarea>
                                                                     <input type="hidden" name="hosp_id" id="hosp_id" class="form-control" placeholder="Hospital Name" value="<?php echo $val['hosp_addr'] ?>">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="w3-center w3-col l12" style="">
                                                                <button  type="submit" title="add Material" id="btnsubmit" class="w3-medium w3-button theme_bg">Update Details</button>
                                                            </div>

                                                            <div class="" ng-bind-html="message"></div>
                                                            <!--                                                            <div class="" ng-bind="skilJSON"></div>-->
                                                        </div>
                                                        <div class="col-lg-1"></div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <!----------------------------------- Modal Body------------------------------------>                                                                               
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-------script for update material-->
                        <script type="text/javascript">
                            $(function () {
                            $("#updateEmployeeForm_<?php echo $val['hosp_id']; ?>").submit(function (e) {
                            e.preventDefault();
                            var skill_field = $('#skill_field').val();
                            var fromDbSkills = $('#fromDbSkills').val();
                            if (skill_field == '' && fromDbSkills == ''){
                            $.alert('Please Choose atleast one operation');
                            return false;
                            }
                            dataString = $("#updateEmployeeForm_<?php echo $val['hosp_id']; ?>").serialize();
                            $.ajax({
                            type: "POST",
                                    url: "<?php echo base_url(); ?>employee/employee/updateEmployeeDetails",
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
                        <!-------script for update material-->
                        <script type="text/javascript">
                            function deleteEmployeeDetails(hosp_id) {
                            $.confirm({
                            title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to Delete Employee?</h4>',
                                    content: '',
                                    type: 'red',
                                    buttons: {
                                    confirm: function () {
                                    $.ajax({
                                    url: "<?php echo base_url(); ?>employee/employee/deleteEmployeeDetails",
                                            type: "POST",
                                            data: {
                                            emp_id: emp_id
                                            },
                                            cache: false,
                                            success: function (data) {
                                            // alert(data);
                                            $.alert(data);
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
                        <td colspan="8" class="w3-center">No Records Found..!</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>