<?php

if($_GET["id"])
{
	$id = $_GET["id"];
	$fetch_fotu1 = "SELECT * FROM products WHERE id = '" .$id. "'";
	$res_fotu1 = mysql_query($fetch_fotu1);
	$row_fotu1 = mysql_fetch_array($res_fotu1);
	$old_file1 = "product_img/".$row_fotu1["img_name"];
	if(file_exists($old_file1)){unlink($old_file1);}	
	mysql_query("DELETE FROM products WHERE id =".$id);
	header("location:?go=products&del=ok");
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
                <a href="#"> Products</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
	
	<a href="?go=add-products"><button class="btn btn-default dropdown-toggle align-right">
	<span class="glyphicon glyphicon-user"> Add Products</span>			
	<span class="caret"></span>
	</button></a>
	
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Products</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
			<a href="?go=add-banner" class="btn btn-setting btn-round btn-default" style="margin-right: 80px;"><i class="glyphicon glyphicon-cog">Add Banner</i></a>-->
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["del"] == "ok"){?><div class="alert alert-info"> Products Deleted Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>Title</th>
		<th>Description</th>
		<th>Image/Icon</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$fetch_fotu = "SELECT * FROM products";
	$res_fotu = mysql_query($fetch_fotu);
	while($row_fotu = mysql_fetch_array($res_fotu))
	{
	$i++;
	
	?>
    <tr>
        <td><?=$i?></td>
		<td> <?=$row_fotu["b_title"]?> </td>
		<td> <?=$row_fotu["b_desc"]?></td>
		<td><img src="product_img/<?php if($row_fotu["img_name"]){echo $row_fotu["img_name"];}?>" width="30px;" height="25px;" /></td>
		<td class="center">
           <a class="" href="?go=edit-products&id=<?=$row_fotu["id"]?>">
                <i class="glyphicon glyphicon-edit icon-white"></i> Edit
            </a>
			|
            <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=products&id=<?=$row_fotu["id"]?>'}else{}">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
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