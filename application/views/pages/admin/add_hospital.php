<title>Hospital Connectivity | Add Hospital</title>
<!-- page content -->
<!--  -->
<div class="right_col" role="main">
     <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
        <div class="row x_title"><div class="w3-padding"><h3><i class="fa fa-plus"></i> Add Hospital</h3></div></div>
        <fieldset>
            <div class="row" style=" margin-top: 5px;">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="" >
                        <!-- form for add hospital  -->
                        <form id="add_hospitalForm" method="post" role="form">
                                 <div id="message"></div>
                            <div class="w3-col l12 w3-margin-bottom">
                                <div class="col-lg-6 col-xs-12 col-sm-12" id="">
                                    <label>Hospital Name <b class="w3-text-red w3-medium">*</b></label>
                                    <input type="text" name="hospital_name"  id="hospital_name" class="form-control" placeholder="Enter Hospital Name" value="" required>
                                </div>
                                <div class="col-lg-6 col-xs-12 col-sm-12" id="">
                                    <label>Hospital Location <b class="w3-text-red w3-medium">*</b></label>
                                   <select name="hospital_location" class="form-control w3-small" id="location_name">
                                        <option value="0" class="w3-text-grey w3-light-grey " selected>Please choose Hospital Location</option>
                                        <?php 
                                        foreach ($locations as $key) {   ?>
                                        <option value="<?php echo $key['location_name']; ?>"><?php echo $key['location_name'];?></option>  
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-margin-bottom">
                                <div class="col-lg-6 col-xs-12 col-sm-12" id="">
                                    <label>Hospital Number <b class="w3-text-red w3-medium">*</b></label>
                                    <input type="number" name="hospital_num"  id="hospital_num" class="form-control" placeholder="Enter Hospital Number Here" value="" required>
                                </div>
                                <div class="col-lg-6 col-xs-12 col-sm-12" id="">
                                    <label>Hospital Address <b class="w3-text-red w3-medium">*</b></label>
                                    <textarea name="hospital_address" id="hospital_address" class="form-control" placeholder="Enter Hospital Address Here" value="" required></textarea>
                                </div>
                            </div>
                           
                            <div class=" w3-center w3-col l12" style="">
                                <button  type="submit" title="add Material" id="btnsubmit" class="w3-medium w3-button theme_bg">Add Hospital</button>
                            </div>
                        </form>
                    <div class="message"></div>
                    </div>                   
                </div>
                <div class="col-lg-1"></div>
            </div>
        </fieldset>
    </div>
</div>

<!-- function for submit hospital form details -->
  <script>
    $(function(){
        $("#add_hospitalForm").submit(function(){
            dataString = $("#add_hospitalForm").serialize();
            // alert(dataString);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/add_hospital/addHospitalDetails",
                data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {
            // alert(data);
             $('#message').html(data);
           }

       });

         return false;  //stop the actual form post !important!

     });
    });
</script>