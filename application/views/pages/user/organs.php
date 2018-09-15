
<!-- All doctors module begins here -->
<div class="container">
  <div class="col-lg-12 w3-margin-top">
    <h3><i class="fa fa-wheelchair w3-xxlarge"></i> <b>All Organs Available</b></h3>

    <div class="w3-col l12 w3-margin-top">
      <div class="w3-col l4 w3-margin-bottom">
        <!-- seacrh input -->
        <div class = "input-group">
         <input type="text" name="search_organ" class="form-control" placeholder="search by organ, hospital, area, etc.">
         <span class = "input-group-btn">
          <button class = "btn btn-default" type = "button">
           <i class="fa fa-search"></i> Search
         </button>
       </span>       
     </div>
      </div>
      <div class="w-col l12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="w3-center">Sr No.</th>
              <th class="w3-center">Organ</th>
              <th class="w3-center">Hospital Name</th>
              <th class="w3-center">Area</th>
              <th class="w3-center">Quantity Available</th>
              <th class="w3-center">Contact</th>
              <th class="w3-center">Email</th>
              <th class="w3-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if($all_organs!=''){
              $count=1;
              foreach ($all_organs as $key) {            
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $key['organ_name']; ?></td>
                  <td><?php echo $key['hosp_name']; ?></td>
                  <td><?php echo strtoupper($key['hosp_location']); ?></td>
                  <td><?php echo $key['organ_quantity']; ?></td>
                  <td><?php echo $key['hosp_number']; ?></td>
                  <td><?php echo $key['hosp_email']; ?></td>
                  <td>
                    <a class="btn" style="padding:0 " onclick="sendMail('<?php echo $usermail; ?>','organ');"><i class="fa fa-plane"></i> send</a>
                  </td>
                </tr>
                <?php 
                $count++;
              }
            }
            else{
              ?>
              <tr>
                <td colspan="8" class="w3-center">
                  <span> No Organ Found </span>
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
