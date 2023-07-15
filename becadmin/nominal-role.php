<?php
	include("includes/dbconfig.php");
	$yr = $_GET["yr"];
	$academic_yr = $_GET["academic_yr"];
	
	$admition_year = (($academic_yr - $yr) + 1);
	
	$csv_fileName = 'nominal_role_'.date('Y-m-d').'.csv';
	$csv_export = '';
	$csv_export .= "Sl. No.," ;
	$csv_export .= "REGT. NO," ;
	$csv_export .= "NAME," ;
	$csv_export .= "FATHER NAME,";
	$csv_export .= "CONTACT NO,";
	
	$csv_export .= "\n";
	
	$sql = "SELECT * FROM ncc_student WHERE admition_year = '" .$admition_year. "' AND active_status = '1'";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res))
	{
		$i++;
		$regimental_no = $row["regimental_no"];
		$student_name = $row["student_name"];
		$guardian_name = $row["guardian_name"];
		$contact_no_self = $row["contact_no_self"];
				
		$csv_export1 .= "$i,";
		$csv_export1 .= "$regimental_no,";
		$csv_export1 .= "$student_name,";
		$csv_export1 .= "$guardian_name,";
		$csv_export1 .= "$contact_no_self,";
		$csv_export1 .= "\n";
	}
	$csv_export .= $csv_export1;
	header("Content-type: text/x-csv");
	header("Content-Disposition: attachment; filename=".$csv_fileName."");
	echo($csv_export);
?>
