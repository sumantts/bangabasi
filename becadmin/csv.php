<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>csv upload</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif;">

<?php
//$conn = mysql_connect("localhost","root","");
//mysql_select_db("csv_upload",$conn) or die ('Connection Error');
if(isset($_POST["sub"]))
{
	$filename = $_FILES["csv_file"]["name"];	
	move_uploaded_file($_FILES["csv_file"]["tmp_name"],"upload/".$filename);
	
$importer = new CsvImporter("small.txt",true);
$data_s = $importer->get();
print_r($data_s);

	function readCSV($csvFile)
	{
		$file_handle = fopen($csvFile, 'r');
		while (!feof($file_handle)) 
		{
			$line_of_text[] = fgetcsv($file_handle, 10000);
		}
		fclose($file_handle);
		return $line_of_text;
	}


// Set path to CSV file
$csvFile = "upload/".$filename;

$csv = readCSV($csvFile);
print_r($csv);

$csv = array_map("utf8_encode", $csv); //added
print_r($csv);
$toral_row = count($csv);
$i = 1;
while($i <= $toral_row)
{
	$description = $csv[$i][0];
	$price = $csv[$i][2];
	$category = $csv[$i][3];
	$name = $csv[$i][4];
	//echo 'Product name :'.mb_detect_encoding($name,'UTF-8'); 
	//echo $data = array_map("utf8_encode", $name); //added
	//echo "<br>";
	$sql = "INSERT INTO dishes (description, price, category, name) VALUES ('" .$description. "', '" .$price. "', '" .$category. "', '" .$name. "')";
	mysql_query($sql);
	
	$sql1 = "INSERT INTO products (productname) VALUES ('" .$name. "')";
	mysql_query($sql1);
	$i++;
}

}

//echo "Ä¡Å²±½º / chicen kass";
?>

<form name="form1" id="form1" method="post" enctype="multipart/form-data">
<input type="file" name="csv_file" id="csv_file" />
<input type="submit" name="sub" value="Upload" />
</form>






</body>
</html>