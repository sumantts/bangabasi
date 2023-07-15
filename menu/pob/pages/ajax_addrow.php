<?php
include("../includes/dbconfig.php");
if(isset($_REQUEST["last_id"])){
$last_id = $_REQUEST["last_id"] + 1;
?>

			<div class="row" id="div_<?=$last_id?>">
			<div class="form-group has-success col-md-1">
			  <input type="checkbox" id="ch_<?=$last_id?>" name="chs[]" class="" onclick="addorRemoveIds(<?=$last_id?>)" /> Check to remove
			  
			  </div>
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Main Menu</label>
			<select class="form-control" id="parent_id_<?=$last_id?>" name="parent_id[]" required="required" onchange="get_submenu(<?=$last_id?>,this.value);">
			<option value="" <?php if($parent_id == ""){?> selected="selected" <?php } ?>>Select Main category</option>
			<?php
			$sql = "SELECT * FROM category_details WHERE parent_id = '0' ORDER BY category_name ASC";
			$res = mysql_query($sql);
			while($row = mysql_fetch_array($res))
			{
			$category_id = $row["category_id"];
			$category_name = $row["category_name"];
			?>
			<option value="<?php echo $category_id; ?>" <?php if($parent_id == $category_id){?> selected="selected" <?php } ?>><?php echo $category_name; ?></option>
			<?php } ?>			
			</select>
			</div>
			
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Sub Menu</label>
			<select class="form-control" id="category_id_<?=$last_id?>" name="category_id[]" required="required" onchange="get_menu_price(<?=$last_id?>,this.value)">
			<option value="" <?php if($parent_id == ""){?> selected="selected" <?php } ?>>Select sub menu</option>
					
			</select>
			</div>
			
			<div class="form-group has-success col-md-3">
			<label class="control-label" for="inputSuccess1">Quantity</label>
			<input type="hidden" name="price[]" id="price_<?=$last_id?>" />			
			<input type="text" class="form-control" id="quantity_<?=$last_id?>" name="quantity[]" value="<?php echo $quantity; ?>" required="required">
			</div>
			</div>
<?php
}
?>