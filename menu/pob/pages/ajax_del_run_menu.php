<?php
include("../includes/dbconfig.php");
if(isset($_REQUEST["id"])){
$id = $_REQUEST["id"];
$sql = "DELETE FROM temp_billing_details WHERE id = '" .$id. "'";
$res = mysql_query($sql);
}
?>