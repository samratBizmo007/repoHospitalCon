<title>Hospital Connectivity | Add Organ</title>
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
                        <h3><i class="fa fa-plus-circle"></i> Add Organ </h3>
                    </div>
                </div>

                <div id="message"></div>
                <form id="addOrganDetails" name="addOrganDetails">
                    <fieldset>
                        <h2>Organ Details</h2><br>
                        <div class="w3-col l12">
                            <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom">
                                <div class="form-group">
                                    <label for="organ_name">Organ Name<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <input type="text" class="form-control" id="organ_name" name="organ_name" placeholder="Enter Organ Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 w3-margin-bottom">
                                <div class="form-group">
                                    <label for="Organ_quantity">Organ Quantity<b class="w3-text-red w3-medium"> *</b> :</label>
                                    <input type="text" class="form-control" id="Organ_quantity" name="Organ_quantity" placeholder="Enter Organ Quantity" required>
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
                            <button type="submit" name="submitForm" id="submitForm" class="w3-center w3-hover-text-white btn w3-orange w3-margin-top"> <i class="fa fa-save"></i> Save Organ </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //----------------jquery fun to submit the add Doctor form-----------------------------------//
    $("#addOrganDetails").submit(function () {
        dataString = $("#addOrganDetails").serialize(); //-----------get aall form variables in one variable using serialize function
        //alert(dataString);
        $('#submitForm').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-circle-o-notch fa-spin"></i><b>Saving Organ. Please wait...</b></span>');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/addorgan/saveOrganDetails", //-----send to the admin_login controller
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                //alert(data);
                $('#message').html(data);
                $('#submitForm').html('Save Organ');
                location.reload();
            }
        });
        return false; //stop the actual form post !important!
    });
    //  -------------------------END -------------------------------//
</script>
