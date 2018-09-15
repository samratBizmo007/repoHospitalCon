
<title>Hospital Connectivity | Show Hospital Details</title>
<!-- page content -->
<!--  -->
<div class="right_col" role="main">
    <!-- Main Div Starts Here-->
    <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
        <div class="row x_title">
            <div class="w3-padding"><h3><i class="fa fa-plus"></i> Hospital Details</h3>
            </div>
        </div>
        <div id="message"></div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Div for Doctors-->

            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <?php
                if ($hospitals == '') {
                    // echo 'No Doctors Found';
                } else {
                   // print_r($doctors);
                    foreach ($hospitals as $key) {            
                ?>
                    <h2><b><?php echo $key['hosp_name']; ?></b></h2>
                    <h4><b><i class="fa fa-map-marker" aria-hidden="true"> <?php echo $key['hosp_location']; ?></i></b></h4>
                    <h4><b><i class="fa fa-address-book" aria-hidden="true"> <?php echo $key['hosp_addr']; ?></i></b></h4>
                    <h4><b><i class="fa fa-phone" aria-hidden="true"> <?php echo $key['hosp_number']; ?></i></b></h4>
                    <h4><b><i class="fa fa-envelope" aria-hidden="true"> <?php echo $key['hosp_email']; ?></i></b></h4>
                 <?php
                }
            }
                ?>
            </div><!-- Div for Doctors-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Div for Blood-->
            <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                 <?php
                if ($blood == '') {
                    // echo 'No Blood Found';
                } else {
                    //print_r($blood);
                }
                ?> 
                <h3>Doctors List</h3>
                 <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="w3-center">Name</th>
              <th class="w3-center">Action</th>
              
            </tr>
          </thead>
          <tbody>
            <?php 
            if($doctors!=''){
              $count=1;
              foreach ($doctors as $key) {            
                ?>
                <tr>
                
                  <td><?php echo $key['doc_name']; ?></td>
                 <td><a class="btn" style="padding:0 " href="<?php echo base_url(); ?>user/doctors_details?doc=<?php echo $key['doc_id']; ?>"><i class="fa fa-eye"></i> view</a></td>
                 
                </tr>
                <?php 
                $count++;
              }
            }
            else{
              ?>
              <tr>
                <td colspan="8" class="w3-center">
                  <span> No Blood Group Found </span>
                </td>              
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
            </div><!-- Div for Blood-->
            
            <!-- Div for Organs-->
            <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                <?php
                if ($organs == '') {
                    // echo 'No Organ Found';
                } else {
                  //  print_r($organs);
                }
                ?>
                <h3>Blood Available</h3>
                 <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="w3-center">Group</th>
              <th class="w3-center">Quantity</th>
              
            </tr>
          </thead>
          <tbody>
            <?php 
            if($blood!=''){
              $count=1;
              foreach ($blood as $key) {            
                ?>
                <tr>
                  <td><?php echo $key['blood_group']; ?></td>
                  <td><?php echo $key['blood_quantity']; ?></td>
                </tr>
                <?php 
                $count++;
              }
            }
            else{
              ?>
              <tr>
                <td colspan="8" class="w3-center">
                  <span> No Blood Group Found </span>
                </td>              
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
            </div><!-- Div for Organs-->
            
            <!-- Div for Ambulance-->
            <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                <?php
                if ($organs == '') {
                    // echo 'No Organs Found';
                } else {
                    // print_r($ambulance);
                }
                ?>      <h3>Organs</h3>
                 <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="w3-center">Origin</th>
              <th class="w3-center">Quantity</th>
              
            </tr>
          </thead>
          <tbody>
            <?php 
            if($organs!=''){
              $count=1;
              foreach ($organs as $key) {            
                ?>
                <tr>
                  <td><?php echo $key['organ_name']; ?></td>
                  <td><?php echo $key['organ_quantity']; ?></td>
                </tr>
                <?php 
                $count++;
              }
            }
            else{
              ?>
              <tr>
                <td colspan="8" class="w3-center">
                  <span> No Blood Group Found </span>
                </td>              
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
            </div><!-- Div for Ambulance-->
            </div>
        </div>
    </div>
    <!-- Main Div Ends Here-->
</div>