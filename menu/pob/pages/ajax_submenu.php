<?php
include("../includes/dbconfig.php");
if(isset($_REQUEST["parent_id"])){
$parent_id = $_REQUEST["parent_id"];
?>
<option value="" <?php if($parent_id == ""){?> selected="selected" <?php } ?>>Select sub menu</option>
	<?php
	$sql = "SELECT * FROM category_details WHERE parent_id = '" .$parent_id. "' ORDER BY category_name ASC";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res))
	{
	$category_id = $row["category_id"];
	$category_name = $row["category_name"];
	?>
	<option value="<?php echo $category_id; ?>" <?php if($parent_id == $category_id){?> selected="selected" <?php } ?>><?php echo $category_name; ?></option>
	<?php
	} 
	}?>	