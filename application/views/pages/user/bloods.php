
<!-- All doctors module begins here -->
<div class="container">
  <div class="col-lg-12 w3-margin-top">
    <h3><i class="fa fa-tilt w3-xxlarge"></i> <b>All Blood Groups</b></h3>

    <div class="w3-col l12 w3-margin-top">
      <div class="w3-col l4 w3-margin-bottom">
        <input type="text" name="search_blood" class="w3-input w3-border" placeholder="search by group, hospital, area, etc.">
      </div>
      <div class="w-col l12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="w3-center">Sr No.</th>
              <th class="w3-center">Blood Group</th>
              <th class="w3-center">Hospital Name</th>
              <th class="w3-center">Area</th>
              <th class="w3-center">Quantity Available</th>
              <th class="w3-center">Contact</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if($all_bloods!=''){
              $count=1;
              foreach ($all_bloods as $key) {            
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $key['blood_group']; ?></td>
                  <td><?php echo $key['hosp_name']; ?></td>
                  <td><?php echo strtoupper($key['hosp_location']); ?></td>
                  <td><?php echo $key['blood_quantity']; ?></td>
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
                  <span> No Blood Group Found </span>
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
