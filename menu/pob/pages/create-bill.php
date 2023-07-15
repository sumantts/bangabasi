<script type="text/javascript">
if(!global_last_id){var global_last_id = 1}

var a = new Array();

function addorRemoveIds(id_no){
//alert(id_no);

if(document.getElementById('ch_'+id_no).checked == true)
{
	a.push(id_no);	
}
else
{
	var positionof = a.indexOf(id_no,a);
	a.splice(positionof,1);
}
//alert(JSON.stringify(a));
}//AddorRemoveIds

function add_new_row(){
	var last_id2 = $('#last_id').val();
	var last_id1 = parseInt(last_id2);
	
	$.ajax({
		type:'GET',
		url:'pages/ajax_addrow.php',
		data:'last_id='+last_id1,
		success: function(res){
		//alert(res);
		$('#div_'+last_id1).after(res);
		}//end of function
	});//end of ajax\

	last_id = last_id1 + 1;
	$('#last_id').val(last_id);
	global_last_id = last_id;
}//end of function

function remove_all_rows(){
	if(a.length < 1){alert('At first click the check box');return;}
	for(n in a){
	//alert(a[n]);
	$('#div_'+a[n]).detach();
	}
	
	var arrLength = a.length;
	a.splice(0,arrLength);	
}//end of function

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


function open_editor(id_run)
{
	$("#parent_id_"+id_run).show();
	$("#category_id_"+id_run).show();
	$("#quantity_"+id_run).show();
	$("#edit_btn_"+id_run).hide();
	$("#update_btn_"+id_run).show();
}

function update_running_menu(id_run)
{
	var parent_id = $("#parent_id_"+id_run).val();
	var category_id = $("#category_id_"+id_run).val();
	var quantity = $("#quantity_"+id_run).val();
	var price = $("#price_"+id_run).val();
	var parent_id_txt = $("#parent_id_"+id_run+" option:selected").text();
	var category_id_txt = $("#category_id_"+id_run+" option:selected").text();
	
	$("#parent_id_"+id_run).hide();
	$("#category_id_"+id_run).hide();
	$("#quantity_"+id_run).hide();
	$("#edit_btn_"+id_run).show();
	$("#update_btn_"+id_run).hide();
	$.ajax({
		type:'GET',
		url:'pages/ajax_edit_run_menu.php',
		data:'parent_id='+parent_id+'&category_id='+category_id+'&quantity='+quantity+'&price='+price+'&id_run='+id_run,
		success: function(res){
			$("#label_main_menu_"+id_run).html(parent_id_txt);
			$("#label_sub_menu_"+id_run).html(category_id_txt);
			$("#label_qty_"+id_run).html(quantity);
		}
	});
}//end function

function delete_this_record(id_run)
{
	if(confirm('Are you Sure to delete the Record'))
	{
		$("#row_id_"+id_run).hide();
		$.ajax({
		type:'GET',
		url:'pages/ajax_del_run_menu.php',
		data:'id='+id_run,
		success: function(res){
			
			}
		});
	}
}//end function

function check_discount_percent()
{
	var disc_percent = $("#disc_percent").val();
	if(confirm('Do you want to give '+disc_percent+'% Discount?'))
	{
		return true;
	}
	else
	{
		return false;
	}
}//end function
</script>
<?php
if($_GET["c"])
{
	$c_t_id = $_GET["c"];
	$c_t_txt = "Cabin ";
	$c_t = 1;//cabin
}
if($_GET["t"])
{
	$c_t_id = $_GET["t"];
	$c_t_txt = "Table ";
	$c_t = 2;//table
}

if($c_t_id != "")
{
	$chk_running_sess = "SELECT * FROM table_running_session WHERE cab_tab = '" .$c_t. "' AND cab_tab_no = '" .$c_t_id. "'";
	$res_running_sess = mysql_query($chk_running_sess);
	if(mysql_num_rows($res_running_sess) > 0)
	{
		$row_running_sess = mysql_fetch_array($res_running_sess);
		$running_session = $row_running_sess["running_session"];
		$inicit_by = $row_running_sess["created_by"];
	}
	else
	{
		$running_session = date('YmdHis');
		$insert_running_sess = "INSERT INTO table_running_session (cab_tab, cab_tab_no, running_session, created_by) VALUES ('" .$c_t. "', '" .$c_t_id. "', '" .$running_session. "', '" .$created_by. "')";
		mysql_query($insert_running_sess);
		$inicit_by = $created_by;
	}
}	

function get_menu_actual_name($id)

{
	$sql = "SELECT category_name FROM category_details WHERE category_id = '" .$id. "'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$category_name = $row["category_name"];
	return $category_name;
}
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
        <li> <a href="#"> Create Bill</a> </li>
		<li> Initiated by: <?php if($inicit_by == 3){?><strong>Frontend <?php }else{?><strong>Backend <?php } ?>User</strong> </li>
      </ul>
    </div>
    
	  <div class="row">
	  <?php if(isset($cat_msg_b)){ ?>
	  <div class="alert alert-info"><?php echo $cat_msg_b; ?></div>
      <?php }else{ ?>
	  <?php if(isset($a)){?>
      <div class="alert alert-info">Success! Bill created successfully.</div>
      <?php } }?>
	  
	  <div class="box col-md-12">
        <div class="box-inner">
          <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-edit"></i> Create Bill of <?php echo $c_t_txt.$c_t_id; ?></h2>
			<!--<input type="button" style="float:right" name="add_row" id="add_row" value="Add+" onClick="return add_new_row();" />
			<input type="button" style="float:right" name="remove_row" id="remove_row" onClick="return remove_all_rows();" value="Remove All">-->
          </div>
		  <div class="box-content" style="min-height:220px;">
		  
		  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
		  <thead>
		  <tr>
			<th scope="col">Sl#</th>
			<th scope="col">Main Menu</th>
			<th scope="col">Sub Menu</th>
			<th scope="col">Quantity</th>
			<th scope="col">Price</th>
			<th scope="col">Action</th>
		  </tr>
		  <?php
		  $get_running_data_sql = "SELECT * FROM temp_billing_details WHERE tran_id = '" .$running_session. "'";
		  $get_running_data_res = mysql_query($get_running_data_sql);
		  $i = 0;
		  $total_temp = 0;
  		  while($get_running_data_row = mysql_fetch_array($get_running_data_res))
		  {
		  $i++;
		  $id_run = $get_running_data_row["id"];
		  $main_menu_run = $get_running_data_row["main_menu"];
		  $category_id_run = $get_running_data_row["category_id"];
		  $unit_price_run = $get_running_data_row["unit_price"];
		  $quantity_run = $get_running_data_row["quantity"];
		  $price_run = $get_running_data_row["price"];
		  $total_temp = ($total_temp + $price_run);
		  $name_main_menu_run = get_menu_actual_name($main_menu_run);
		  $name_category_id_run = get_menu_actual_name($category_id_run);
		  ?>
		  <tr id="row_id_<?php echo $id_run; ?>">
		  	<td><?=$i?></td>
			<td>
			<span id="label_main_menu_<?php echo $id_run; ?>"><?php echo $name_main_menu_run; ?></span>
			<select class="form-control" id="parent_id_<?php echo $id_run; ?>" name="parent_id" onchange="get_submenu(<?php echo $id_run; ?>,this.value);" style="display:none;">
			<option value="" <?php if($parent_id == ""){?> selected="selected" <?php } ?>>Select Main category</option>
			<?php
			$sql = "SELECT * FROM category_details WHERE parent_id = '0' ORDER BY category_name ASC";
			$res = mysql_query($sql);
			while($row = mysql_fetch_array($res))
			{
			$category_id = $row["category_id"];
			$category_name = $row["category_name"];
			?>
			<option value="<?php echo $category_id; ?>" <?php if($main_menu_run == $category_id){?> selected="selected" <?php } ?>><?php echo $category_name; ?></option>
			<?php } ?>			
			</select>
			</td>
			<td>
			<span id="label_sub_menu_<?php echo $id_run; ?>"><?php echo $name_category_id_run; ?></span>
			<select class="form-control" id="category_id_<?php echo $id_run; ?>" name="category_id" onchange="get_menu_price(<?php echo $id_run; ?>,this.value)" style="display:none;">
			<option value="" <?php if($category_id_run == ""){?> selected="selected" <?php } ?>>Select sub menu</option>
			<?php
			$sql_sub_menu = "SELECT * FROM category_details WHERE parent_id = '" .$main_menu_run. "' ORDER BY category_name ASC";
			$res_sub_menu = mysql_query($sql_sub_menu);
			while($row_sub_menu = mysql_fetch_array($res_sub_menu))
			{
			$category_id_sub_menu = $row_sub_menu["category_id"];
			$category_name_sub_menu = $row_sub_menu["category_name"];
			?>
			<option value="<?php echo $category_id_sub_menu; ?>" <?php if($category_id_sub_menu == $category_id_run){?> selected="selected" <?php } ?>><?php echo $category_name_sub_menu; ?></option>
			<?php
			}?>	
					
			</select>
			</td>
			<td>
			<span id="label_qty_<?php echo $id_run; ?>"><?php echo $quantity_run; ?></span>
			<input type="hidden" name="price" id="price_<?php echo $id_run; ?>" value="<?php echo $unit_price_run; ?>" />
			<input type="text" class="form-control" id="quantity_<?php echo $id_run; ?>" name="quantity" value="<?php echo $quantity_run; ?>" style="display:none;">
			</td>
			<td><?=$price_run?></td>
			<td>
			<a id="edit_btn_<?php echo $id_run; ?>" title="Edit" href="javascript:void(0);" onclick="open_editor(<?php echo $id_run; ?>);"> <i class="glyphicon glyphicon-edit icon-white"></i></a>
			<a id="update_btn_<?php echo $id_run; ?>" title="Update" href="javascript:void(0);" onclick="update_running_menu(<?php echo $id_run; ?>);" style="display:none;"> <i class="glyphicon glyphicon-check"></i></a>
			 | <a title="Delete" href="javascript:void(0)" onclick="delete_this_record(<?php echo $id_run; ?>)"> <i class="glyphicon glyphicon-trash icon-white"></i> </a>
			</td>
		  </tr>
		  <?php } ?>
		  <?php if($total_temp > 0){?>
		  <tr><td>&nbsp;</td><td>&nbsp;</td><td>Sub Total</td><td>&nbsp;</td><td><?=$total_temp?></td><td>&nbsp;</td></tr>
		  <?php } ?>
		  </thead>
		  </table>
		  
            <form name="form2" id="form2" action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="running_session" id="running_session" value="<?=$running_session?>" /> 
			<!--<div class="form-group has-success col-md-12">
			<label class="control-label" for="inputSuccess1">Table No: </label>
			<input type="text" class="form-control" name="table_no" id="table_no" value="" />
			</div>-->
			<div class="row" id="div_1">
			 <!--<div class="form-group has-success col-md-1">
			  <input type="checkbox" id="ch_1" name="chs[]" class="" onclick="addorRemoveIds()" /> Check to remove </div>-->
			  
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Main Menu</label>
			<select class="form-control" id="parent_id_0" name="parent_id" onchange="get_submenu(0,this.value);">
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
			<select class="form-control" id="category_id_0" name="category_id" onchange="get_menu_price(0,this.value)">
			<option value="" <?php if($parent_id == ""){?> selected="selected" <?php } ?>>Select sub menu</option>
					
			</select>
			</div>
			
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Quantity</label>
			<input type="hidden" name="price" id="price_0" />
			<input type="text" class="form-control" id="quantity_0" name="quantity" value="">
			</div>
			
			
			<div class="form-group has-success col-md-2">
			<label class="control-label" for="inputSuccess1">Discount Percentage</label>
			<input type="text" class="form-control" id="disc_percent" name="disc_percent" value="0">
			</div>
			</div>
            <br>
			
          </div>
		  
		  <div class="form-group has-error col-md-4">
                <input class="btn btn-default" type="submit" name="sub_bill" id="sub_bill" value="Add to Bill" />
          <input class="btn btn-default" type="submit" name="sub_final_bill" id="sub_final_bill" value="Create Final Bill" onclick="return check_discount_percent()" />
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
$tran_id = $_POST["running_session"];
$created_on = date('Y-m-d H:i:s'); 
$created_by = $_SESSION["log_id"];
$table_no = $c_t_txt.' '.$c_t_id;
$parent_id = $_POST["parent_id"];
$category_id = $_POST["category_id"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$gross_rate = ($quantity * $price);

	$sql_insert = "INSERT INTO temp_billing_details (tran_id, main_menu, category_id, unit_price, quantity, price) VALUES ('" .$tran_id. "', '" .$parent_id. "', '" .$category_id. "', '" .$price. "', '" .$quantity. "', '" .$gross_rate. "')";
	mysql_query($sql_insert);
	
	if($c_t == 1)
	{
		$link = 'c='.$c_t_id;
	}
	if($c_t == 2)
	{
		$link = 't='.$c_t_id;
	}
	header("location:?go=create-bill&$link");
}

if(isset($_POST["sub_final_bill"]))
{
	$net_payable = 0;
	$tran_id = $_POST["running_session"];
	$disc_percent = $_POST["disc_percent"];
	$table_no = $c_t_txt.' '.$c_t_id;
	$created_on = date('Y-m-d H:i:s');
	$created_by = $_SESSION["log_id"];
	
	$get_running_data_sql = "SELECT * FROM temp_billing_details WHERE tran_id = '" .$tran_id. "'";
	$get_running_data_res = mysql_query($get_running_data_sql);
	$grandcgstvalue = 0;
	while($get_running_data_row = mysql_fetch_array($get_running_data_res))
	{
		$cgstvalue = 0;
		$id_run = $get_running_data_row["id"];
		$main_menu_run = $get_running_data_row["main_menu"];
		$category_id_run = $get_running_data_row["category_id"];
		$unit_price_run = $get_running_data_row["unit_price"];
		$quantity_run = $get_running_data_row["quantity"];
		$price_run = $get_running_data_row["price"];
		
		//Watar or moktail gst na ok 259=MOCKTAIL
		if($main_menu_run != 259){
			$cgstvalue = round(($price_run * 0.025),0,2);
			$grandcgstvalue = $grandcgstvalue + $cgstvalue;
		}else{
			//echo 'blk 2';
		}
		$net_payable = $net_payable + $price_run;
				
		$insert_sql = "INSERT INTO billing_details (tran_id, main_menu, category_id, unit_price, quantity, price, cgst_val, sgst_val) VALUES ('" .$tran_id. "', '" .$main_menu_run. "', '" .$category_id_run. "', '" .$unit_price_run. "', '" .$quantity_run. "', '" .$price_run. "', '" .$cgstvalue. "', '" .$cgstvalue. "')";
		mysql_query($insert_sql);		
	}//end while
	
	$disc_percent_amount = (($net_payable * $disc_percent)/100);
	$after_disc_percent_amount = ($net_payable - $disc_percent_amount);
	
	$insert_summery_sql = "INSERT INTO billing_summary(tran_id, table_no, net_payable, discount_percent, amount_after_discount, cgst_val, sgst_val, created_on, created_by) VALUES ('" .$tran_id. "', '" .$table_no. "', '" .$net_payable. "', '" .$disc_percent. "', '" .$after_disc_percent_amount. "', '" .$grandcgstvalue. "', '" .$grandcgstvalue. "', '" .$created_on. "', '" .$created_by. "')";
	mysql_query($insert_summery_sql);
	
	$delete_tmp = "DELETE FROM temp_billing_details WHERE tran_id = '" .$tran_id. "'";
	mysql_query($delete_tmp);
	
	$delete_running_ses = "DELETE FROM table_running_session WHERE running_session = '" .$tran_id. "'";
	mysql_query($delete_running_ses);
		
	header("location:?go=bill-summary");
}
?>


<script type="text/javascript">
/*$("#parent_id_0").select2();
$("#category_id_0").select2();*/
</script>