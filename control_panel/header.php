<?php
//require_once 'classes/Membership.php';

//$membership = New Membership();

//$membership->confirm_Member();

?>

  <head>  
    <title>Dashboard </title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="ftslinux.info">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link href="common/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="common/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="common/css/ionicons.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="common/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="common/css/custom-admin.css" rel="stylesheet" type="text/css" />
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="common/js/leaflet-0.7.5/leaflet.js"></script>
    <script src="common/js/leaflet-plugins/google.js"></script>
    <script src="common/js/leaflet-plugins/bing.js"></script>
    <link rel="stylesheet" href="common/js/leaflet-0.7.5/leaflet.css">    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="common/css/styles.css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuqAclGgQ7h5ezgesIwMD6mjE4KQ7xoFI"></script>
	<script src="common/js/bower_components/angular/angular.min.js"></script>
    <script src="common/js/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>

    <style type="text/css">
        .error{
            color:red;
        }
    </style>

</head>

<body class="skin-blue" >

<header class="header">
    <a  class="logo" href="common/images/my_taxi.png" >

        <img src="common/images/my_taxi.png"  width="40" height="40"> Gaddy.in </a>
</header>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <a href="http://gaddy.in/control_panel/test.php"><b>Control Menu </b></a>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
            <a href="login.php?status=loggedout"><b>Log Out....</b></a>
            <!-- User Account: style can be found in dropdown.less -->
            </ul>
        </div>
    </nav>


