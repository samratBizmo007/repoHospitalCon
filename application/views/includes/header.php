<?php
//start session     
$admin_name = $this->session->userdata('admin_name');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>assets/fa/css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/build/css/w3.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/build/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/build/css/dhtmlxcalendar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/alert/jquery-confirm.css" rel="stylesheet">
        <!-- angular-->
        <script src="<?php echo base_url(); ?>assets/js/angular.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/angular-sanitize.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/const.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dhtmlxcalendar.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dhtmlxcalendar_deprecated.js"></script>
    </head>
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;background-color:#FFAF00 ">
                        <a href="<?php echo base_url(); ?>admin/dashboard" class="site_title" style="padding-left: 15px">
                            <i class="fa fa-plus-circle w3-text-red"></i> Hospital Dash
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a href="<?php echo base_url(); ?>admin/dashboard" class="w3-text-black"><i class="fa fa-dashboard"></i> Dashboard </a></li>

                                <li><a class="w3-text-black"><i class="fa fa-h-square"></i> Hospital Section <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo base_url(); ?>admin/Add_hospital" class="w3-text-black"><i class="fa fa-h-square"></i> Add Hospital </a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/View_hospitals" class="w3-text-black"><i class="fa fa-h-square"></i>View Hospitals</a></li>
                                    </ul>
                                </li>                              
                                <li><a class="w3-text-black"><i class="fa fa-user-md"></i> Doctor Section <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo base_url(); ?>admin/adddoctor" class="w3-text-black"><i class="fa fa-user-md"></i> Add Doctor</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/viewdoctors" class="w3-text-black"><i class="fa fa-user-md"></i> View Doctors</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url(); ?>admin/addblood" class="w3-text-black"><i class="fa fa-tint"></i> Blood Section </a></li>
                                <li><a class="w3-text-black"><i class="fa fa-wheelchair"></i> Organ Section <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo base_url(); ?>admin/addorgan" class="w3-text-black"><i class="fa fa-wheelchair"></i> Add Organ Details</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/vieworgans" class="w3-text-black"><i class="fa fa-wheelchair"></i>View All Organs</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url(); ?>admin/addambulance" class="w3-text-black"><i class="fa fa-ambulance"></i> Ambulance Section </a></li>

                            </ul>
                        </div>
                        <div class="menu_section">
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Welcome <b><?php echo $admin_name; ?> </b>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="<?php echo base_url(); ?>admin/settings">
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>admin/admin_login/logoutAdmin"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

