<title>Hospital Connectivity | Show Hospital Details</title>
<!-- page content -->
<!--  -->
<div class="right_col" role="main">
    <!-- Main Div Starts Here-->
    <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
        <div class="row x_title">
            
        </div>
        <div id="message"></div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	 <div class="w3-padding"><h3><i class="fa fa-plus"></i> Doctor Details</h3>
        	 	  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <?php
                 if($doctors!=''){
              $count=1;
              foreach ($doctors as $key) {            
                ?>
                     <h2><b>Name : </b><?php echo $key['doc_name']; ?></h2>
                     <h3><b>Hospital Name : </b><?php echo $key['hosp_name']; ?></h3>
                    <h3><b>Area : </b><?php echo $key['hosp_location']; ?></h3>
                    <h3><b>Degree : </b> <?php echo $key['doc_degree']; ?></h3>
                     <h3><b>Email : </b> <?php echo $key['doc_email']; ?></h3>
                    
                 <?php
                }
            }
            else{ 
              
             echo "No Records Found";
       
             }

          
                ?>
            </div>
            </div>
        </div>
    </div>
</div>