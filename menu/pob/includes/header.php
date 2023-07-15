<?php include("dbconfig.php");include("function.php"); ob_start(); session_start();if(!$_SESSION["log_id"]){header("location:index.php");}?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title><?=$sitename?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>
	
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="">
<!--<link rel="stylesheet" type="text/css" media="all" href="callender/css/jsDatePick_ltr.min.css" />-->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>

<script src="tinymce/tinymce.min.js"></script>

<link rel="stylesheet" type="text/css" href="calendar/tcal.css" />
<script type="text/javascript" src="calendar/tcal.js"></script>

<link rel="stylesheet" href="css/select2.min.css">
<script type="text/javascript" src="js/select2.min.js"></script>

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?go=home"><span> <?=$sitename?></span></a>
			<!-- <div class="btn-group pull-left" style="color: #fff;">Your Subscription pack has been expired on 31st March 2019. Now you are on Extention mode. It will expire on 30th April 2019. Thank You</div> -->
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" onClick="$('.dropdown-menu').toggle();">
				<i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> Welcome <?=$profile_name?></span>			
				<span class="caret"></span>
				</button>
               <ul class="dropdown-menu">
                    <li><a href="?go=change-password">Settings</a></li>
					<li><a href="index.php?logout=yes">Logout</a></li>
                </ul>
            </div>
			
			 </div>
    </div>
    <!-- topbar ends -->
<?php $created_by = $_SESSION["log_id"]; ?>	
