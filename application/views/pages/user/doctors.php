
<!-- All doctors module begins here -->
<div class="container">
  <div class="col-lg-12 w3-margin-top">
    <h3><i class="fa fa-user-md w3-xxlarge"></i> <b>All Doctors</b></h3>

    <div class="w3-col l12 w3-margin-top">
      <div class="w3-col l4 w3-margin-bottom">
       <form method="GET" action="#doctor_tab">
        <!-- seacrh input -->
        <input type="hidden" name="valid" value="true">
        <div class = "input-group">
          <input type="text" name="search_doctor" class="form-control" placeholder="search by name, area, degree, gender, etc." value="<?php if(isset($_GET['search_doctor']) && $_GET['search_doctor']!=''){ echo $_GET['search_doctor'];} ?>">
          <span class = "input-group-btn">
            <button class = "btn btn-primary" type="submit">
             <i class="fa fa-search"></i> Search
           </button>
         </span>       
       </div>
     </form>        

   </div>
   <div class="w3-col l12" id="doctor_tab">
    <div id="message_div"></div>
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
        if($all_doctors!='' && $all_doctors['status']=='200'){
          $count=1;
          foreach ($all_doctors['status_message'] as $key) {  
            ?>
            <tr>
              <td class="w3-center"><?php echo $count; ?></td>
              <td class="w3-center"><?php echo $key['doc_name']; ?></td>
              <td class="w3-center"><?php echo $key['hosp_name']; ?></td>
              <td class="w3-center"><?php echo strtoupper($key['hosp_location']); ?></td>
              <td class="w3-center"><?php echo $key['doc_degree']; ?></td>
              <td class="w3-center"><?php echo $key['doc_email']; ?></td>
              <td class="w3-center"><?php echo strtoupper($key['doc_gender']); ?></td>
              <td class="w3-center">
                <a class="btn w3-blue" style="padding:3px 5px " href="<?php echo base_url(); ?>user/doctors_details?doc=<?php echo $key['doc_id']; ?>"><i class="fa fa-view"></i> view</a>
                <a class="btn mail w3-red" style="padding:3px 5px " onclick="sendMail('<?php echo $key['doc_email']; ?>','doctor','quick consultancy');">send mail</a>
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
