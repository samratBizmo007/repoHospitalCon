
<!-- All doctors module begins here -->
<div class="container">
  <div class="col-lg-12 w3-margin-top">
    <h3><i class="fa fa-ambulance w3-xxlarge"></i> <b>All Ambulances Available</b></h3>

    <div class="w3-col l12 w3-margin-top">
      <div class="w3-col l4 w3-margin-bottom">
       <form method="GET" action="#ambulance_tab">
        <!-- seacrh input -->
        <input type="hidden" name="valid" value="true">
        <div class = "input-group">
          <input type="text" name="search_ambulance" class="form-control" placeholder="search by area, hospital, etc." value="<?php if(isset($_GET['search_ambulance']) && $_GET['search_ambulance']!=''){ echo $_GET['search_ambulance'];} ?>">
          <span class = "input-group-btn">
            <button class = "btn btn-primary" type="submit">
             <i class="fa fa-search"></i> Search
           </button>
         </span>       
       </div>
     </form>     
   </div>
   <div class="w3-col l12" id="ambulance_tab">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th class="w3-center">Sr No.</th>
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
        if($all_ambulances!='' && $all_ambulances['status']=='200'){
          $count=1;
          foreach ($all_ambulances['status_message'] as $key) {            
            ?>
            <tr>
              <td class="w3-center"><?php echo $count; ?></td>
              <td class="w3-center"><?php echo $key['hosp_name']; ?></td>
              <td class="w3-center"><?php echo strtoupper($key['hosp_location']); ?></td>
              <td class="w3-center"><?php echo $key['ambulance_quantity']; ?></td>
              <td class="w3-center"><?php echo $key['hosp_number']; ?></td>
              <td class="w3-center"><?php echo $key['hosp_email']; ?></td>
              <td class="w3-center">
                <a class="btn w3-red" style="padding:3px 5px" onclick="sendMail('<?php echo $key['hosp_email']; ?>','ambulance');">send mail</a>
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
