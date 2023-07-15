<?php
include("../includes/dbconfig.php");
if(isset($_REQUEST["id"])){
	$id = $_REQUEST["id"];
	$priority = $_REQUEST["priority"];	
	$upd_prio = "UPDATE faculty SET order_by_priority = '" .$priority. "' WHERE id = '" .$id. "'";
	mysqli_query($mysqli, $upd_prio);
}
?>