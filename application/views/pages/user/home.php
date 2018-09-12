
<div class="container" style="margin-top: 60px">
  <div class="col-lg-3">
    <a href="<?php echo base_url(); ?>user/doctors" class="btn w3-col l12 w3-round-large w3-card-2 w3-margin-bottom" style="height: 210px;">
      <center>
        <h2><b>Doctor</b></h2>
        <i class="fa fa-user-md" style="font-size: 80px;color: #00FFFF"></i>
      </center>
    </a>    
  </div>
  <div class="col-lg-3">
    <a href="<?php echo base_url(); ?>user/bloods" class="btn w3-col l12 w3-round-large w3-card-2 w3-margin-bottom" style="height: 210px;">
      <center>
        <h2><b>Blood</b></h2>
        <i class="fa fa-tint w3-text-red" style="font-size: 80px;color: #A90000"></i>
      </center>
    </a>    
  </div>
  <div class="col-lg-3">
    <a href="<?php echo base_url(); ?>user/organs" class="btn w3-col l12 w3-round-large w3-card-2 w3-margin-bottom" style="height: 210px;">
      <center>
        <h2><b>Organ</b></h2>
        <i class="fa fa-wheelchair w3-text-grey" style="font-size: 80px"></i>
      </center>
    </a>    
  </div>
  <div class="col-lg-3">
    <a href="<?php echo base_url(); ?>user/ambulances" class="btn w3-col l12 w3-round-large w3-card-2 w3-margin-bottom" style="height: 210px;">
      <center>
        <h2><b>Ambulance</b></h2>
        <i class="fa fa-ambulance" style="font-size: 80px;color: #00008B"></i>
      </center>
    </a>    
  </div>
</div>

<!-- All hospital module begins here -->
<div class="container">
  <hr>
  <div class="col-lg-12 w3-margin-top">
    <h3><i class="fa fa-hospital-o w3-xxlarge"></i> <b>All Hospitals</b></h3>

    <div class="w3-col l12 w3-margin-top">
      <div class="w3-col l4 w3-margin-bottom">
        <input type="text" name="search_hospital" class="w3-input w3-border" placeholder="search by name, area, etc.">
      </div>
      <div class="w-col l12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="w3-center">Sr No.</th>
              <th class="w3-center">Hospital Name</th>
              <th class="w3-center">Area</th>
              <th class="w3-center">Hospital Address</th>
              <th class="w3-center">Contact No.</th>
              <th class="w3-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if($all_hospitals!='' && $all_hospitals['status']=='200'){
              $count=1;
              foreach ($all_hospitals['status_message'] as $key) {            
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $key['hosp_name']; ?></td>
                  <td><?php echo strtoupper($key['hosp_location']); ?></td>
                  <td><?php echo $key['hosp_addr']; ?></td>
                  <td><?php echo $key['hosp_number']; ?></td>
                  <td>
                    <a class="btn" style="padding:0 " href="<?php echo base_url(); ?>user/hospital?hospital=<?php echo $key['hosp_id']; ?>"><i class="fa fa-view"></i> view</a>
                  </td>
                </tr>
                <?php 
                $count++;
              }
            }
            else{
              ?>
              <tr>
                <td colspan="6" class="w3-center">
                  <span> No Hospital Found </span>
                </td>              
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
</body>
</html>