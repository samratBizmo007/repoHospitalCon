
<title>Hospital Connectivity | Show Hospital Details</title>
<!-- page content -->
<!--  -->
<div class="right_col" role="main">
    <!-- Main Div Starts Here-->
    <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
        <div class="row x_title">
            <div class="w3-padding"><h3><i class="fa fa-plus"></i> Hospital Details</h3>
            </div>
        </div>
        <div id="message"></div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Div for Doctors-->
            <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                <?php
                if ($doctors == '') {
                    echo 'No Doctors Found';
                } else {
                    print_r($doctors);
                }
                ?>
            </div><!-- Div for Doctors-->

            <!-- Div for Blood-->
            <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                <?php
                if ($blood == '') {
                    echo 'No Blood Found';
                } else {
                    print_r($blood);
                }
                ?>
            </div><!-- Div for Blood-->
            
            <!-- Div for Organs-->
            <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                <?php
                if ($organs == '') {
                    echo 'No Organ Found';
                } else {
                    print_r($organs);
                }
                ?>
            </div><!-- Div for Organs-->
            
            <!-- Div for Ambulance-->
            <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                <?php
                if ($ambulance == '') {
                    echo 'No Ambulance Found';
                } else {
                    print_r($ambulance);
                }
                ?>
            </div><!-- Div for Ambulance-->
            
        </div>
    </div>
    <!-- Main Div Ends Here-->
</div>