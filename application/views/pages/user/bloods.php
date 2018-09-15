<?php 
$user_session=$this->session->userdata('user_session');
$arr=explode('|', $user_session);
$usermail=$arr[2];
?>
<!-- All doctors module begins here -->
<div class="container">
  <div class="col-lg-12 w3-margin-top">
    <h3><i class="fa fa-tilt w3-xxlarge"></i> <b>All Blood Groups</b></h3>

    <div class="w3-col l12 w3-margin-top">
      <div class="w3-col l4 w3-margin-bottom">
       <form method="GET" action="#blood_tab">
        <!-- seacrh input -->
        <input type="hidden" name="valid" value="true">
        <div class = "input-group">
          <input type="text" name="search_blood" class="form-control" placeholder="search by group, hospital, area, etc." value="<?php if(isset($_GET['search_blood']) && $_GET['search_blood']!=''){ echo $_GET['search_blood'];} ?>">
          <span class = "input-group-btn">
            <button class = "btn btn-primary" type="submit">
             <i class="fa fa-search"></i> Search
           </button>
         </span>       
       </div>
     </form>     

   </div>
   <div class="w3-col l12" id="blood_tab">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th class="w3-center">Sr No.</th>
          <th class="w3-center">Blood Group</th>
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
        if($all_bloods!='' && $all_bloods['status']=='200'){
          $count=1;
          foreach ($all_bloods['status_message'] as $key) {            
            ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $key['blood_group']; ?></td>
              <td><?php echo $key['hosp_name']; ?></td>
              <td><?php echo strtoupper($key['hosp_location']); ?></td>
              <td><?php echo $key['blood_quantity']; ?></td>
              <td><?php echo $key['hosp_number']; ?></td>
              <td><?php echo $key['hosp_email']; ?></td>
              <td>
                <a class="btn" style="padding:0 " onclick="sendMail('<?php echo $usermail; ?>','blood');"><i class="fa fa-plane"></i> send</a>
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
<script type="text/javascript">
  function sendMail(email,feature){

  }
</script>
</body>
</html>
