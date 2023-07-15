<?php
include("../includes/dbconfig.php");
if(isset($_REQUEST["id_run"])){
$parent_id = $_REQUEST["parent_id"]; 
$category_id = $_REQUEST["category_id"]; 
$quantity = $_REQUEST["quantity"]; 
$price = $_REQUEST["price"]; 
$id_run = $_REQUEST["id_run"];
$price = ($quantity * $price);
$sql = "UPDATE temp_billing_details SET main_menu = '" .$parent_id. "', category_id = '" .$category_id. "',  unit_price = '" .$price. "', quantity = '" .$quantity. "', price = '" .$price. "' WHERE id = '" .$id_run. "'";
$res = mysql_query($sql);
}
?>