<?php
if(isset($_GET["id"])){
$id = $_GET["id"];
$sql = "DELETE FROM category_details WHERE category_id = '" .$id. "'";
mysql_query($sql);
header("location:?go=category&d=1");
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
            <li>
                <a href="?go=home">Home</a>
            </li>
			<li>
                <a href="#"> Menu</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
	
	<a href="?go=add-category"><button class="btn btn-default dropdown-toggle align-right">
	<span class="glyphicon glyphicon-user"> Add Menu</span>			
	<span class="caret"></span>
	</button></a>
	
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Menu</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
			<a href="?go=add-banner" class="btn btn-setting btn-round btn-default" style="margin-right: 80px;"><i class="glyphicon glyphicon-cog">Add Banner</i></a>-->
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["d"] == "1"){?><div class="alert alert-info"> Menu Deleted Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>Menu</th>
		<th>Sub Menu</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sql = "SELECT * FROM category_details WHERE parent_id = '0' ORDER BY category_name ASC";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res))
	{
	$i++;
	$category_id = $row["category_id"];
	$food_liquid = $row["food_liquid"];
	if($food_liquid == "0"){$food_liquid = "Food";}
	if($food_liquid == "1"){$food_liquid = "Liquid";}
	$category_name = $row["category_name"];
	$main_id = $row["category_id"];
	?>
    <tr>
        <td><?php echo $i; ?></td>
		<td> <?php echo $category_name; ?></td>
		<td>
		<?php
		$sub_sql = "SELECT * FROM category_details WHERE parent_id = '" .$main_id. "' ORDER BY category_name ASC";
		$sub_res = mysql_query($sub_sql);
		if(mysql_num_rows($sub_res) > 0){
		?>
		<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
		  <tbody>
		  <tr>
			<th scope="col">Sl#</th>
			<th scope="col">Menu Name</th>
			<th scope="col">Quantity</th>
			<th scope="col">Price</th>
			<th scope="col">Action</th>
		  </tr>
		<?php
$k = 0;
		while($sub_row = mysql_fetch_array($sub_res))
		{$k++;
		$sub_cat_name = $sub_row["category_name"];
		$sub_id = $sub_row["category_id"];
		$quantity = $sub_row["quantity"];
		$peice = $sub_row["peice"];
		?>
		  <tr>
			<td><?=$k?></td>
			<td><?=$sub_cat_name?></td>
			<td style="text-align:right"><?=$quantity?></td>
			<td style="text-align:right"><?=$peice?></td>
			<td>
			<a class="" href="?go=edit-category&id=<?php echo $sub_id; ?>"> <i class="glyphicon glyphicon-edit icon-white"></i></a> | <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=category&id=<?=$sub_id?>'}else{}"> <i class="glyphicon glyphicon-trash icon-white"></i> </a>
			</td>
		  </tr>
		  <?php 
		  }//end while
		  ?>
		  </tbody>
		</table>
		<?php
		}//end num rows
		?>
		</td>
        <td class="center">
           <a class="" href="?go=edit-category&id=<?php echo $main_id; ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i> Edit
            </a>
			<?php if(mysql_num_rows($sub_res) > 0){?>
			
			<?php }else{ ?>
			|
            <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=category&id=<?=$main_id?>'}else{}">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
			<?php } ?>
        </td>
    </tr>
	<?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->


    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    
    <!-- Ad ends -->

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>