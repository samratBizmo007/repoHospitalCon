
<?php 
$user_session=$this->session->userdata('user_session');
$arr=explode('|', $user_session);
$usermail=$arr[2];
?>
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
        <form method="GET" action="#hospital_tab">
        <!-- seacrh input -->
        <input type="hidden" name="valid" value="true">
        <div class = "input-group">
          <input type="text" name="search_hospital" class="form-control" placeholder="search by name, area, etc." value="<?php if(isset($_GET['search_hospital']) && $_GET['search_hospital']!=''){ echo $_GET['search_hospital'];} ?>">
         <span class = "input-group-btn">
          <button class = "btn btn-primary" type="submit">
           <i class="fa fa-search"></i> Search
         </button>
       </span>       
     </div>
   </form>
   </div>
   <div class="w3-col l12" id="hospital_tab">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th class="w3-center">Sr No.</th>
          <th class="w3-center">Hospital Name</th>
          <th class="w3-center">Area</th>
          <th class="w3-center">Address</th>
          <th class="w3-center">Contact No.</th>
          <th class="w3-center">Email</th>
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
              <td class="w3-center"><?php echo $count; ?></td>
              <td class="w3-center"><?php echo $key['hosp_name']; ?></td>
              <td class="w3-center"><?php echo strtoupper($key['hosp_location']); ?></td>
              <td class="w3-center"><?php echo $key['hosp_addr']; ?></td>
              <td class="w3-center"><?php echo $key['hosp_number']; ?></td>
              <td class="w3-center"><?php echo $key['hosp_email']; ?></td>
              <td class="w3-center">
                <a class="btn w3-blue" style="padding:3px 5px" href="<?php echo base_url(); ?>user/hospitals?hospital=<?php echo $key['hosp_id']; ?>"><i class="fa fa-view"></i> view</a>
              </td>
            </tr>
            <?php 
            $count++;
          }
        }
        else{
          ?>
          <tr>
            <td colspan="7" class="w3-center">
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
