<?php
 
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Shakti Herbal Clinic Patient Management</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link href="css/bootstrap.min.css" rel="stylesheet" />

	<link href="css/bootstrap.css" rel="stylesheet" />
	
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->

    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
                    Shakti Herbal Clinic
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="insert.php">
                        <i class="pe-7s-user"></i>
                        <p>New Patient Record</p>
                    </a>
                </li>
                <li>
                    <a href="view.php">
                        <i class="pe-7s-note2"></i>
                        <p>View Patient List</p>
                    </a>
                </li>
                <li>
                    <a href="view.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Edit Patients Record</p>
                    </a>
                </li>
                <li>
                    <a href="view.php">
                        <i class="pe-7s-science"></i>
                        <p>Delete Record</p>
                    </a>
                </li>
				<li>
                    <a href="lookup.php">
                        <i class="pe-7s-bell"></i>
                        <p>Lookup Patient</p>
                    </a>
                </li>
				<li>
                    <a href="lookup_by_name.php">
                        <i class="pe-7s-bell"></i>
                        <p>Lookup By Name</p>
                    </a>
                </li>
                <li>
                    <a href="sendsms.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Send SMS to Patient</p>
                    </a>
                </li>
				                <li>
                    <a href="Courier_info.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Enter Courier Info</p>
                    </a>
                </li>
				                <li>
                    <a href="view_courier_info.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>View Courier Info</p>
                    </a>
                </li>
				
              <li>
                    <a href="logout.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Log Out</p>
                    </a>
                </li>
                

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand">Hi <a style="color:red;"><?php echo $_SESSION['username']; ?></a>! Welcome to Shakti Herbal Clinic Patient Management System.</p>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
  
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Maintain your Patients details with this utility</h4>
                                <p class="category" style="color:red;"></p>
                            </div>
                            <div class="content">
                                <div>
								<img class="img-responsive"src="images/fancy.png"  width="610px" height="410px"></img>
								</div>

                            </div>
                        </div>
                    </div>
					<!-- <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Dr Amar Srivastav</h4>
                                <p class="category" style="color:red;"></p>
                            </div>
                            <div class="content">
                                <div >
								<img src="images/vaidya_amar.jpg" width="190px" height="350px"></img>
								</div>

                            </div>
                        </div>
                    </div>-->

                </div>

               <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" align="center">Shakti Herbal Clinic Patient Management System</h4>
                                <p class="category" align="center">Manage your Patients record without any hassle</p>
                            </div>


                        </div>
                    </div>


        </div>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
