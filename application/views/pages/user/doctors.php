
<!-- All doctors module begins here -->
<div class="container">
  <div class="col-lg-12 w3-margin-top">
    <h3><i class="fa fa-user-md w3-xxlarge"></i> <b>All Doctors</b></h3>

    <div class="w3-col l12 w3-margin-top">
      <div class="w3-col l4 w3-margin-bottom">
        <input type="text" name="search_doctor" class="w3-input w3-border" placeholder="search by name, area, degree, gender, etc.">
      </div>
      <div class="w-col l12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="w3-center">Sr No.</th>
              <th class="w3-center">Doctor Name</th>
              <th class="w3-center">Hospital Name</th>
              <th class="w3-center">Area</th>
              <th class="w3-center">Degree</th>
              <th class="w3-center">Email</th>
              <th class="w3-center">Gender</th>
              <th class="w3-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if($all_doctors!=''){
              $count=1;
              foreach ($all_doctors as $key) {            
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $key['doc_name']; ?></td>
                  <td><?php echo $key['hosp_name']; ?></td>
                  <td><?php echo strtoupper($key['hosp_location']); ?></td>
                  <td><?php echo $key['doc_degree']; ?></td>
                  <td><?php echo $key['doc_email']; ?></td>
                  <td><?php echo strtoupper($key['doc_gender']); ?></td>
                  <td>
                    <a class="btn" style="padding:0 " href="<?php echo base_url(); ?>user/hospital?hospital=<?php echo $key['hosp_id']; ?>"><i class="fa fa-view"></i> view</a>
                    <a class="btn" style="padding:0 " href="<?php echo base_url(); ?>user/hospital?hospital=<?php echo $key['hosp_id']; ?>"><i class="fa fa-plane"></i> send</a>
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
                  <span> No Doctor Found </span>
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