<!DOCTYPE html>
<html>
  <head>  
    <title>Map View</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="ftslinux.info">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="css/custom-admin.css" rel="stylesheet" type="text/css" />
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/maps.js"></script>
    <script src="js/leaflet-0.7.5/leaflet.js"></script>
    <script src="js/leaflet-plugins/google.js"></script>
    <script src="js/leaflet-plugins/bing.js"></script>
    <link rel="stylesheet" href="js/leaflet-0.7.5/leaflet.css">    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX0tSdEGQz8TGe_nmEl9JBF2Mrna3Pkgs"></script>

    <style type="text/css">
        .error{
            color:red;
        }
    </style>

</head>
 <body class="skin-blue" >
<!-- header logo: style can be found in header.less -->


<header class="header">
    <a  class="logo" href="my_taxi.bmp" >
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <img src=""  width="40" height="40"> WWW.gaddy.in </a>
</header>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
            </ul>
        </div>
    </nav>


<div ui-view>
	<div style="position:relative;left:225px;top:2px">
    <div class="box-body" >
        <div class="row">
            <div class="col-sm-4" id="toplogo">
                <img id="halimage" src="images/gpstracker-man-blue-37.png">Tacker by Intime Information systems
            </div>
            <div class="col-sm-8" id="messages"></div>
        </div>
        <div class="row">
            <div class="col-sm-10" id="mapdiv">
                <div id="map-canvas"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10" id="selectdiv">
                <select id="routeSelect" tabindex="1"></select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 deletediv">
                <input type="button" id="delete" value="Delete" tabindex="2" class="btn btn-primary">
            </div>
            <div class="col-sm-2 autorefreshdiv">
                <input type="button" id="autorefresh" value="Auto Refresh Off" tabindex="3" class="btn btn-primary">
            </div>
            <div class="col-sm-2 refreshdiv">
                <input type="button" id="refresh" value="Refresh" tabindex="4" class="btn btn-primary">
            </div>
            <div class="col-sm-2 viewalldiv">
                <input type="button" id="viewall" value="View All" tabindex="5" class="btn btn-primary">
            </div>
        </div>
    </div>       
    </div>       
</div>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li id="dashboard" title="Dashboard">
                    <a href="control_panel_page.html"><i class="fa fa-dashboard"></i> <span>Main Report DashBoard</span></a>
                </li>

                <li id="map-view" title="Map View">
                    <a href="http://gaddy.in//control_panel/mapview/displaymap.php"><i class="fa fa-map-marker"></i> <span>Map View</span></a>
                </li>

                <li id="walkers" title="Providers" >
                    <a ui-sref="provider" ui-sref-active="active"><i class="fa fa-users"></i> <span>Providers</span></a>
                </li>
                <li id="walks" title="Requests">
                    <a ui-sref="request" ui-sref-active="active"><i class="fa fa-location-arrow"></i> <span>Requests</span></a>
                </li>
                <li id="schedule" title="Schedule">
                    <a href="schedule.html"><i class="fa fa-calendar"></i> <span>Schedules</span></a>
                </li>
                <li id="owners" title="Users">
                    <a ui-sref="user"  ui-sref-active="active"><i class="fa fa-users"></i> <span>Customers</span></a>
                </li>
                <li id="reviews" title="Reviews">
                    <a href="reviews.html"><i class="fa fa-thumbs-o-up"></i> <span>Reviews</span></a>
                </li>
                <li id="information" title="Information">
                    <a href="informations.html"><i class="fa fa-info-circle"></i> <span>Information</span></a>
                </li>
                <li id="provider-type" title="Provider Types">
                    <a href="provider-types.html"><i class="fa fa-tags"></i> <span>Types</span></a>
                </li>
                <li id="document-type" title="Provider Types">
                    <a href="document-types.html"><i class="fa fa-file-text-o"></i> <span>Documents</span></a>
                </li>
                <li id="promo_code" title="Promo Code">
                    <a href="promo_code.html"><i class="fa fa-gift"></i> <span>Promotions</span></a>
                </li>
                <li id="keywords" title="Kewords">
                    <a href="edit_keywords.html"><i class="fa fa-pencil-square"></i> <span>Customize</span></a>
                </li>
                <li id="payments" title="Payment Details">
                    <a href="details_payment.html"><i class="fa fa-money"></i> <span>Payment Details</span></a>
                </li>
                <li id="week_statement" title="Weekly Payment.">
                    <a href="requests_payment.html"><i class="fa fa-bar-chart-o"></i> <span>Weekly Statement</span></a>
                </li>
                <li id="settings" title="Setings">
                    <a href="settings.html"><i class="fa fa-cogs"></i> <span>Settings</span></a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
</div>
    <!-- Right side column. Contains the navbar and content of the page -->


</body>
</html>