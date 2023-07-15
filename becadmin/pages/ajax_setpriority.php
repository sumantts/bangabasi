<?php
include("../includes/dbconfig.php");
if(isset($_REQUEST["id"])){
	$id = $_REQUEST["id"];
	$priority = $_REQUEST["priority"];	
	$upd_prio = "UPDATE gb_members SET order_by_priority = '" .$priority. "' WHERE id = '" .$id. "'";
	mysql_query($upd_prio);
}
?>