
<!-- All doctors module begins here -->
<div class="container">
  <div class="col-lg-12 w3-margin-top">
    <h3><i class="fa fa-ambulance w3-xxlarge"></i> <b>All Ambulances Available</b></h3>

    <div class="w3-col l12 w3-margin-top">
      <div class="w3-col l4 w3-margin-bottom">
        <input type="text" name="search_ambulance" class="w3-input w3-border" placeholder="search by area, hospital, etc.">
      </div>
      <div class="w-col l12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="w3-center">Sr No.</th>
              <th class="w3-center">Hospital Name</th>
              <th class="w3-center">Area</th>
              <th class="w3-center">Quantity Available</th>
              <th class="w3-center">Contact</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if($all_ambulances!=''){
              $count=1;
              foreach ($all_ambulances as $key) {            
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $key['hosp_name']; ?></td>
                  <td><?php echo strtoupper($key['hosp_location']); ?></td>
                  <td><?php echo $key['ambulance_quantity']; ?></td>
                  <td><?php echo $key['hosp_number']; ?></td>
                </tr>
                <?php 
                $count++;
              }
            }
            else{
              ?>
              <tr>
                <td colspan="8" class="w3-center">
                  <span> No Ambulance Found </span>
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