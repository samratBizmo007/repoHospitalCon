<title>Hospital Connectivity | Add Doctor</title>
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
                        <h3><i class="fa fa-plus-circle"></i> Add Doctor </h3>
                    </div>
                </div>
                <?php
                //print_r($hospitals);
                
                ?>
                <div id="message"></div>
                <form id="addDoctorDetails" name="addDoctorDetails">
                    <fieldset>
                        <h2>Doctor Details</h2><br>
                        <div class="w3-col l12">
                            <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom">
                                <div class="form-group">
                                    <label for="doctor_name">Doctor Name<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <input type="text" class="form-control" id="doctor_name" name="doctor_name" placeholder="Enter Doctor Name" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom">
                                <div class="form-group">
                                    <label for="Doc_degree">Doctor Degree / specialization<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <input type="text" class="form-control" id="Doc_degree" name="Doc_degree" placeholder="Enter Degree Specialization" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom" >
                                <div class="form-group">
                                    <label for="Hospital_name">Hospital Name<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <select name="Hospital_name" class="form-control w3-small" id="Hospital_name">
                                        <option value="0" class="w3-text-grey w3-light-grey " selected>Please choose Hospital</option>
                                        <?php foreach ($hospitals as $key) {   ?>
                                        <option value="<?php echo $key['hosp_id']; ?>"><?php echo $key['hosp_name'];?></option>  
                                        <?php } ?>
                                    </select>
                                </div>                                
                            </div>
                        </div>

                        <div class="w3-col l12">
                            <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom">
                                <div class="form-group">
                                    <label for="product_name">Doctor Email<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <input type="text" class="form-control" id="Doc_email" name="Doc_email" placeholder="Enter product name" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 w3-margin-bottom">
                                <div class="form-group">
                                    <label for="doc_gender">Gender<b class="w3-text-red w3-medium"> *</b> :</label><br>
                                    <input type="radio" name="Doc_gender" id="gender" value="Male"> Male &nbsp;&nbsp;
                                    <input type="radio" name="Doc_gender" id="gender" value="Female"> Female
                                </div>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-center">
                            <button type="submit" name="submitForm" id="submitForm" class="w3-center w3-hover-text-white btn w3-orange w3-margin-top"> <i class="fa fa-save"></i> Save Doctor </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //----------------jquery fun to submit the add Doctor form-----------------------------------//
    $("#addDoctorDetails").submit(function () {
        dataString = $("#addDoctorDetails").serialize(); //-----------get aall form variables in one variable using serialize function
        //alert(dataString);
        $('#submitForm').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-circle-o-notch fa-spin"></i><b>Saving Doctor. Please wait...</b></span>');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/adddoctor/saveDoctorDetails", //-----send to the admin_login controller
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                //alert(data);
                $('#message').html(data);
                $('#submitForm').html('Save Doctor');
                location.reload();
            }
        });
        return false; //stop the actual form post !important!
    });
    //  -------------------------END -------------------------------//
</script>
