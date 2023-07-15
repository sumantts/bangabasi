<?php 
error_reporting(0);
include("includes/header.php"); ?>
<?php
$page = $_GET["go"];
switch($page){
	case "home":
	include("pages/home.php");
	break;
			
	case "category":
	include("pages/category.php");
	break;
	
	case "add-category":
	include("pages/add-category.php");
	break;
	
	case "edit-category":
	include("pages/edit-category.php");
	break;
	
	case "create-bill":
	include("pages/create-bill.php");
	break;
	
	case "bill-summary":
	include("pages/bill-summary.php");
	break;
	
	case "edit-bill":
	include("pages/edit-bill.php");
	break;
	
	case "change-password":
	include("pages/change-password.php");
	break;
	
	default:
	include("pages/home.php");
	}
?>
<?php include("includes/footer.php"); ?>
