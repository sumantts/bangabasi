<?php

/*$conn = mysql_connect("localhost","piratesbengal","piratesbengal123!@#") or die("con err");
mysql_select_db("piratesbengal",$conn) or die('Database Connection Error');*/

/*$conn = mysql_connect("localhost","root","") or die("con err");
mysql_select_db("ullashbar",$conn) or die('Database Connection Error');*/

$conn = mysql_connect("127.0.0.1","bangabasi","bangabasi123");
mysql_select_db("bangabasi",$conn) or die('Database Connection Error');

error_reporting(0);
date_default_timezone_set("Asia/Kolkata"); 
session_start();

$sitename = "Pirates of Bengal";
?>