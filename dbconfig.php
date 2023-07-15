<?php
/*$conn = mysql_connect("localhost","root","");
mysql_select_db("bec_ci",$conn) or die('Database Connection Error');
*/
$conn = mysql_connect("localhost","bec_ci","bec_ci123!@#");
mysql_select_db("bec_ci",$conn) or die('Database Connection Error');

error_reporting(0);
date_default_timezone_set("Asia/Kolkata"); 
?>