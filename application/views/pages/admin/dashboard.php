
<title>Hospital Connectivity | Dashboard</title>

<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="container" style="margin-top: 60px">
        <div class="col-lg-3">
            <a href="#" class="btn w3-col l12 w3-round-large w3-card-2 w3-margin-bottom" style="height: 210px;">
                <center>
                    <h2><b>Doctor Count</b></h2>
                    <i class="fa fa-user-md" style="font-size: 80px;color: #00FFFF"></i>
                    <h2><b><?php echo $doctors[0]['doctorcount']; ?></b></h2>
                </center>
            </a>    
        </div>
        <div class="col-lg-3">
            <a href="#" class="btn w3-col l12 w3-round-large w3-card-2 w3-margin-bottom" style="height: 210px;">
                <center>
                    <h2><b>Blood Count</b></h2>
                    <i class="fa fa-tint w3-text-red" style="font-size: 80px;color: #A90000"></i>
                    <h2><b><?php echo $blood[0]['bloodcount']; ?></b></h2>
                </center>
            </a>    
        </div>
        <div class="col-lg-3">
            <a href="#" class="btn w3-col l12 w3-round-large w3-card-2 w3-margin-bottom" style="height: 210px;">
                <center>
                    <h2><b>Organ Count</b></h2>
                    <i class="fa fa-wheelchair w3-text-grey" style="font-size: 80px"></i>
                    <h2><b><?php echo $organs[0]['organcount']; ?></b></h2>
                </center>
            </a>    
        </div>
        <div class="col-lg-3">
            <a href="#" class="btn w3-col l12 w3-round-large w3-card-2 w3-margin-bottom" style="height: 210px;">
                <center>
                    <h2><b>Ambulance Count</b></h2>
                    <i class="fa fa-ambulance" style="font-size: 80px;color: #00008B"></i>
                    <h2><b><?php echo $ambulance[0]['ambulancecount']; ?></b></h2>
                </center>
            </a>    
        </div>
        <div class="col-lg-3">
            <a href="#" class="btn w3-col l12 w3-round-large w3-card-2 w3-margin-bottom" style="height: 210px;">
                <center>
                    <h2><b>Hospital Count</b></h2>
                    <i class="fa fa-hospital-o" style="font-size: 80px;color: black"></i>
                    <h2><b><?php echo $hospitals[0]['hospitalcount']; ?></b></h2>
                </center>
            </a>    
        </div>
    </div>


    <!--    <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                <div class="count">2500</div>
                <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
                <div class="count">123.50</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
                <div class="count green">2,500</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
                <div class="count">4,567</div>
                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
                <div class="count">2,315</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                <div class="count">7,325</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
        </div>-->
</div>


