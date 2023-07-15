<?php
include("../includes/dbconfig.php");
if(isset($_REQUEST["category_id"])){
$category_id = $_REQUEST["category_id"];
$sql = "SELECT peice FROM category_details WHERE category_id = '" .$category_id. "'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$price = $row["peice"];
echo $price;
}
?>