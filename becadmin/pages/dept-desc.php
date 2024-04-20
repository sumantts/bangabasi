<?php

if($_GET["id"])
{
	$id = $_GET["id"];
	$getsql = "SELECT dept_id FROM dept_desc WHERE id = '" .$id. "'";
	$getres = mysqli_query($mysqli, $getsql);
	$getrow = mysqli_fetch_array($getres);
	$dept_id = $getrow["dept_id"];
	$dept_id1 = str_replace(" ","_",$dept_id);
	$delpath = "dept_images/".$dept_id1;
	$files = glob($delpath.'/*');
	foreach($files as $file){
		if(is_file($file)){
			unlink($file);
		}
	}
	
	rmdir("dept_images/".$dept_id1);
	
	mysqli_query($mysqli, "DELETE FROM dept_desc WHERE id =".$id);
	header("location:?go=dept-desc&del=ok");
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
                <a href="#">Home</a>
            </li>
			<li>
                <a href="#">Department description & Photos</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Department description & Photos</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
			<a href="?go=add-dept-desc" class="btn btn-setting btn-round btn-default" style="margin-right: 80px;"><i class="glyphicon glyphicon-cog">Add Dept. Desc.</i></a>
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["del"] == "ok"){?><div class="alert alert-info">Gallery Delete Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Sl. No</th>
		<th>Dept. Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$fetch_fotu = "SELECT * FROM dept_desc";
	$res_fotu = mysqli_query($mysqli, $fetch_fotu);
	while($row_fotu = mysqli_fetch_object($res_fotu))
	{
	$i++;
	
	?>
    <tr>
        <td><?=$i?></td>
		<td class="center">
		<?php
		$dept_id = $row_fotu->dept_id;
		$res_depname = mysqli_query($mysqli, "SELECT cc_name FROM course_category WHERE cc_id = '" .$dept_id. "'");
		$row_depname =  mysqli_fetch_array($res_depname);
		echo $row_depname["cc_name"];
		?>
		</td>
		<td class="center"><div style="width:100%; overflow:scroll;"><?=$row_fotu->dept_description?></div></td>
        <!-- <td class="center">
		<div style="margin-top:3px;">
		<?php
		
		// $photo_image = explode('|',$row_fotu->photo_name);
		// $count = sizeof($photo_image);
		// foreach($photo_image as $key => $value)
		// {
		
		?>
			<div style="background:#000; width:50px; height:50px; text-align:center; float:left; margin-right:5px;">
			<img src="dept_images/<?=$row_fotu->dept_id?>/<?php echo $value; ?>" width="50px;" height="50px;" style="padding:5px;" />
			</div>
			
		<?php 
		//} 
		?>
		</div>
		<div style="clear:both;"></div>
		</td> -->
		
		
        <td class="center">
           <a class="" href="?go=edit-dept-desc&id=<?=$row_fotu->id?>">
                <i class="glyphicon glyphicon-edit icon-white"></i> Edit
            </a>
			|
            <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=dept-desc&id=<?=$row_fotu->id?>'}else{}">
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

