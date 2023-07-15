<script type="text/javascript">
function get_submenu(fieldid,fieldval){
	$.ajax({
		type:'GET',
		url:'pages/ajax_submenu.php',
		data:'parent_id='+fieldval,
		success: function(res){
			$('#category_id_'+fieldid).html(res);
		}
	});
}

function get_menu_price(field_id,field_val){
	$.ajax({
		type:'GET',
		url:'pages/ajax_price.php',
		data:'category_id='+field_val,
		success: function(res){
			$('#price_'+field_id).val(res);
		}
	});
}
</script>
<?php
$tran_id = $_GET["tran_id"];
$get_sql = "SELECT * FROM billing_details WHERE tran_id = '" .$tran_id. "'";
$get_res = mysql_query($get_sql);

$get_tbl_sql = "SELECT table_no FROM billing_summary WHERE tran_id = '" .$tran_id. "'";
$get_tbl_res = mysql_query($get_tbl_sql);
$get_tbl_row = mysql_fetch_array($get_tbl_res);
$table_no = $get_tbl_row["table_no"];
?>
<div class="ch-container">
<div class="row">
  <!-- left menu starts -->
  <?php include("includes/left-menu.php"); ?>
  <!-- left menu ends -->
  <div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
      <ul class="breadcrumb">
        <li> <a href="?go=home">Home</a> </li>
        <li> <a href="?go=bill-summary"> Update Summary</a> </li>
		<li> <a href="#"> Update Bill</a> </li>
      </ul>
    </div>
    
	  <div class="row">
	  <?php if(isset($cat_msg_b)){ ?>
	  <div class="alert alert-info"><?php echo $cat_msg_b; ?></div>
      <?php }else{ ?>
	  <?php if(isset($a)){?>
      <div class="alert alert-info">Success! Bill updated successfully.</div>
      <?php } }?>
	  
	  <div class="box col-md-12">
        <div class="box-inner">
          <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-edit"></i> Update Bill</h2>
			<!--<input type="button" style="float:right" name="add_row" id="add_row" value="Add+" onClick="return add_new_row();" />
			<input type="button" style="float:right" name="remove_row" id="remove_row" onClick="return remove_all_rows();" value="Remove All">-->
          </div>
		  <div class="box-content" >
            <form name="form2" id="form2" action="" method="post" enctype="multipart/form-data">
			<div class="form-group has-success col-md-12">
			<label class="control-label" for="inputSuccess1">Table Name/No </label>
			<input type="text" class="form-control" name="table_no" id="table_no" value="<?=$table_no?>" required="required" />
			<div>
			</div>
			  </div>
			<?php
			while($get_row = mysql_fetch_array($get_res)){
			$id = $get_row["id"];
			$tran_id = $get_row["tran_id"];
			$main_menu = $get_row["main_menu"];
			$categoryid = $get_row["category_id"];
			$unit_price = $get_row["unit_price"];
			$quantity = $get_row["quantity"];
			$price = $get_row["price"];
			?> 
			<div class="row" id="div_<?=$id?>">
			<input type="hidden" name="id[]" id="id_<?=$id?>" value="<?=$id?>" />
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Main Menu</label>
			<select class="form-control" id="parent_id_<?=$id?>" name="parent_id[]" required="required" onchange="get_submenu(<?=$id?>,this.value);">
			<?php
			$sql = "SELECT * FROM category_details WHERE parent_id = '0' ORDER BY category_name ASC";
			$res = mysql_query($sql);
			while($row = mysql_fetch_array($res))
			{
			$category_id = $row["category_id"];
			$category_name = $row["category_name"];
			?>
			<option value="<?php echo $category_id; ?>" <?php if($main_menu == $category_id){?> selected="selected" <?php } ?>><?php echo $category_name; ?></option>
			<?php } ?>			
			</select>
			</div>
			
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Sub Menu</label>
			<select class="form-control" id="category_id_<?=$id?>" name="category_id[]" required="required" onchange="get_menu_price(<?=$id?>,this.value)">
			<?php
			$sql_sub = "SELECT * FROM category_details WHERE parent_id = '" .$main_menu. "' ORDER BY category_name ASC";
			$res_sub = mysql_query($sql_sub);
			while($row_sub = mysql_fetch_array($res_sub))
			{
			$category_id_sub = $row_sub["category_id"];
			$category_name_sub = $row_sub["category_name"];
			?>
			<option value="<?php echo $category_id_sub; ?>" <?php if($categoryid == $category_id_sub){?> selected="selected" <?php } ?>><?php echo $category_name_sub; ?></option>
			<?php } ?>
			</select>
			</div>
			
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Quantity</label>
			<input type="hidden" name="price[]" id="price_<?=$id?>" value="<?=$unit_price?>" />
			<input type="text" class="form-control" id="quantity_<?=$id?>" name="quantity[]" value="<?php echo $quantity; ?>" required="required">
			</div>
									
			</div>
			<?php }//enf while ?><br />

			<div class="form-group has-error col-md-4">
                <input class="btn btn-default" type="submit" name="sub_bill" id="sub_bill" value="Update Bill" />
              </div>
          </div>
		  
		  
			  </form>
        </div>
      </div>
	  </div>
      <!--/span-->
    </div>
    <!--/row-->
    <!--/row-->
    <!-- content ends -->
  </div>
  <!--/#content.col-md-0-->
</div>
<!--/fluid-row-->
<?php
if(isset($_POST["sub_bill"])){
//$tran_id = date('YmdHis');
//$created_on = date('Y-m-d H:i:s'); 
$table_no = $_POST["table_no"];
$id = $_POST["id"];
$parent_id = $_POST["parent_id"];
$category_id = $_POST["category_id"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$n = sizeof($category_id);
$total_rate = 0;
for($i = 0; $i < $n; $i++){
	$gross_rate = 0;
	$id1 = $id[$i];
	$parent_id1 = $parent_id[$i];
	$category_id1 = $category_id[$i];
	$price1 = $price[$i];
	$quantity1 = $quantity[$i];
	
	$gross_rate = ($price1 * $quantity1);
	$total_rate = ($total_rate + $gross_rate);
	$sql_update = "UPDATE billing_details SET main_menu = '" .$parent_id1. "', category_id = '" .$category_id1. "', unit_price = '" .$price1. "', quantity = '" .$quantity1. "', price = '" .$gross_rate. "' WHERE id = '" .$id1. "'";
	mysql_query($sql_update);
	}
	
	$vat_price = (($total_rate*14.5)/100);
	$ser_charg = (($total_rate*6)/100);
	$net_payable = round($total_rate + $vat_price + $ser_charg);
	$summery_sql = "UPDATE billing_summary SET table_no = '" .$table_no. "', total_price = '" .$total_rate. "', vat_price = '" .$vat_price. "', ser_charg = '" .$ser_charg. "', net_payable = '" .$net_payable. "' WHERE tran_id = '" .$tran_id. "'";
	mysql_query($summery_sql);
	header("location:?go=edit-bill&tran_id=$tran_id&a=1");
}
?>