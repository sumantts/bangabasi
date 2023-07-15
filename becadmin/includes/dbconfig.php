<?php
/*$conn = mysql_connect("localhost","root","");
mysql_select_db("bangabasimain",$conn) or die('Database Connection Error');

$conn = mysql_connect("127.0.0.1","bangabasi","bangabasi123");
mysql_select_db("bangabasi",$conn) or die('Database Connection Error');*/



//$mysqli = new mysqli("127.0.0.1","bangabasi","bangabasi123","bangabasi"); //server

/******
$mysqli = new mysqli("localhost", "root", "", "bangabasi");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
*******/

$mysqli = new mysqli("localhost", "root", "", "bangabasi");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

session_start();



error_reporting(0);
date_default_timezone_set("Asia/Kolkata"); 
?>