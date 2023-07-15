<?php 
error_reporting(0);
include("includes/header.php"); ?>
<?php
$page = $_GET["go"];
switch($page){
	case "dashboard":
	include("pages/home.php");
	break;
	
	case "departments":
	include("pages/departments.php");
	break;
	
	case "add-departments":
	include("pages/add-departments.php");
	break;
	
	case "edit-departments":
	include("pages/edit-departments.php");
	break;
	
	case "dept-desc":
	include("pages/dept-desc.php");
	break;
	
	case "add-dept-desc":
	include("pages/add-dept-desc.php");
	break;
	
	case "edit-dept-desc":
	include("pages/edit-dept-desc.php");
	break;
	
	case "faculty":
	include("pages/faculty.php");
	break;
	
	case "add-faculty":
	include("pages/add-faculty.php");
	break;
	
	case "edit-faculty":
	include("pages/edit-faculty.php");
	break;
	
	case "stat-body":
	include("pages/stat-body.php");
	break;
	
	case "add-stat-body":
	include("pages/add-stat-body.php");
	break;
	
	case "edit-stat-body":
	include("pages/edit-stat-body.php");
	break;
	
	case "stat-body-member":
	include("pages/stat-body-member.php");
	break;
	
	case "add-stat-body-member":
	include("pages/add-stat-body-member.php");
	break;
	
	case "edit-stat-body-member":
	include("pages/edit-stat-body-member.php");
	break;
        
        case "gb-body-member":
	include("pages/gb-body-member.php");
	break;
	case "add-gb-body-member":
	include("pages/add-gb-body-member.php");
	break;
	case "edit-gb-body-member":
	include("pages/edit-gb-body-member.php");
	break;
	
	case "laboratory-staff":
	include("pages/laboratory-staff.php");
	break;
	
	case "add-laboratory-staff":
	include("pages/add-laboratory-staff.php");
	break;
	
	case "edit-laboratory-staff":
	include("pages/edit-laboratory-staff.php");
	break;
	
	case "office-staff":
	include("pages/office-staff.php");
	break;
	
	case "add-office-staff":
	include("pages/add-office-staff.php");
	break;
	
	case "edit-office-staff":
	include("pages/edit-office-staff.php");
	break;
	
	case "notice-board":
	include("pages/notice-board.php");
	break;
	
	case "add-notice-board":
	include("pages/add-notice-board.php");
	break;
	
	case "edit-notice-board":
	include("pages/edit-notice-board.php");
	break;
	
	case "add-gallery":
	include("pages/add-gallery.php");
	break;
	
	case "download-forms":
	include("pages/download-forms.php");
	break;
	
	case "add-download-forms":
	include("pages/add-download-forms.php");
	break;
	
	case "edit-download-forms":
	include("pages/edit-download-forms.php");
	break;
	
	case "gallery":
	include("pages/gallery.php");
	break;
	
	case "add-gallery":
	include("pages/add-gallery.php");
	break;
	
case "banner":
	include("pages/banner.php");
	break;
	
	case "add-banner":
	include("pages/add-banner.php");
	break;
	
	case "edit-banner":
	include("pages/edit-banner.php");
	break;

	default:
	include("pages/home.php");
	}
?>
<?php include("includes/footer.php"); ?>