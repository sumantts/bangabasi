<?php
/*----------- Category Add Fun ---------------------*/
if(isset($_POST["submit_category"]))
{
	$category_name = $_POST["category_name"];
	$sql_check = "SELECT category_id FROM category_details WHERE category_name = '" .$category_name. "'";
	$sql_res = mysql_query($sql_check);
	if(mysql_num_rows($sql_res) >0)
	{
		$cat_msg = "Sorry! Category Name already exist";
	}
	else
	{
		$insert_sql = "INSERT INTO category_details (category_name) VALUES ('" .$category_name. "')";
		mysql_query($insert_sql);
		//$cat_msg = "Success! Category added successfully.";
		header("location:?go=add-category&a=1");
	}
}
/*----------- Category Add Fun ---------------------*/

/*------------------ Add sub category -----------------*/
if(isset($_POST["submit_sub_category"])){
$category_name = $_POST["category_name"];
$parent_id = $_POST["parent_id"];
$quantity = $_POST["quantity"];
$peice = $_POST["peice"];

	$sql_check = "SELECT category_id FROM category_details WHERE category_name = '" .$category_name. "' AND parent_id = '" .$parent_id. "'";
	$sql_res = mysql_query($sql_check);
	if(mysql_num_rows($sql_res) >0)
	{
		$cat_msg_b = "Sorry! Sub-Category Name already exist";
	}
	else
	{
		$insert_sql = "INSERT INTO category_details (category_name,parent_id,quantity,peice) VALUES ('" .$category_name. "', '" .$parent_id. "','" .$quantity. "', '" .$peice. "')";
		mysql_query($insert_sql);
		//$cat_msg = "Success! Category added successfully.";
		header("location:?go=add-category&b=1");
	}

}
/*------------------ Add sub category -----------------*/


/*-------------- Update Category ---------------------*/
if(isset($_POST["update_category"])){
	$category_id = $_POST["category_id"];
	$category_name = $_POST["category_name"];
	
	$sql_check = "SELECT category_id FROM category_details WHERE category_name = '" .$category_name. "' AND category_id != '" .$category_id. "'";
	$sql_res = mysql_query($sql_check);
	if(mysql_num_rows($sql_res) >0)
	{
		$cat_msg = "Sorry! Category Name already exist";
	}
	else
	{
		$insert_sql = "UPDATE category_details SET category_name = '" .$category_name. "' WHERE category_id = '" .$category_id. "'";
		mysql_query($insert_sql);
		//$cat_msg = "Success! Category added successfully.";
		header("location:?go=edit-category&e=1&id=$category_id");
	}
}
/*-------------- Update Category ---------------------*/

/*-------------- Update Sub Category ---------------------*/
if(isset($_POST["update_sub_category"])){
	$category_id = $_POST["category_id"];
	$parent_id = $_POST["parent_id"];
	$category_name = $_POST["category_name"];
	$quantity = $_POST["quantity"];
	$peice = $_POST["peice"];
	
	$sql_check = "SELECT category_id FROM category_details WHERE category_name = '" .$category_name. "' AND category_id != '" .$category_id. "'";
	$sql_res = mysql_query($sql_check);
	if(mysql_num_rows($sql_res) >0)
	{
		$cat_msg = "Sorry! Category Name already exist";
	}
	else
	{
		$insert_sql = "UPDATE category_details SET category_name = '" .$category_name. "', parent_id = '" .$parent_id. "', quantity = '" .$quantity. "', peice = '" .$peice. "' WHERE category_id = '" .$category_id. "'";
		mysql_query($insert_sql);
		//$cat_msg = "Success! Category added successfully.";
		header("location:?go=edit-category&b=1&id=$category_id");
	}
}
/*-------------- End Update Sub Category ---------------------*/
?>