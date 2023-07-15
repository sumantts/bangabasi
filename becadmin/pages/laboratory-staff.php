<?php

if($_GET["id"])
{
	$id = $_GET["id"];
	$getsql = "SELECT pro_pic FROM laboratory_staff WHERE id = '" .$id. "'";
	$getres = mysqli_query($mysqli, $getsql);
	$getrow = mysqli_fetch_array($getres);
	$pro_pic = $getrow["pro_pic"];

	$delpath = "labstaff_photo/".$pro_pic;
	
		if(is_file($delpath)){
			unlink($delpath);
		}
	
	mysqli_query($mysqli, "DELETE FROM laboratory_staff WHERE id =".$id);
	header("location:?go=laboratory-staff&del=ok");
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
                <a href="#">Laboratory Staff
</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Laboratory Staff description</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
			<a href="?go=add-laboratory-staff" class="btn btn-setting btn-round btn-default" style="margin-right: 80px;"><i class="glyphicon glyphicon-cog">Add Staff</i></a>
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["del"] == "ok"){?><div class="alert alert-info"> Laboratory Staff Description Deleted Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Sl. No</th>
		<th>Department Name</th>
        <th>Staff Name</th>
		<th>Designation</th>		
		<th>Profile Pic</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$fetch_fotu = "SELECT * FROM laboratory_staff ORDER BY name ASC";
	$res_fotu = mysqli_query($mysqli, $fetch_fotu);
	$j=0;
	while($row_fotu = mysqli_fetch_array($res_fotu))
	{
	$j++;
	
	?>
    <tr>
        <td><?=$j?></td>
		<td class="center">
		<?php
		$dept_id = $row_fotu["dept_id"];
		$res_depname = mysqli_query($mysqli, "SELECT cc_name FROM course_category WHERE cc_id = '" .$dept_id. "'");
		$row_depname =  mysqli_fetch_array($res_depname);
		echo $row_depname["cc_name"];
		?>
		</td>
		<td class="center"> <?=$row_fotu["name"]?></td>
		<td class="center"> <?=$row_fotu["designation"]?></td>
			
        <td class="center">
		<img src="../labstaff_photo/<?php if($row_fotu["pro_pic"]){echo $row_fotu["pro_pic"];}else{echo "noimage.png";}?>" width="100px;" height="75px;" />
		</td>
		
		
        <td class="center">
           <a class="" href="?go=edit-laboratory-staff&id=<?=$row_fotu["id"]?>">
                <i class="glyphicon glyphicon-edit icon-white"></i> Edit
            </a>
			|
            <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=laboratory-staff&id=<?=$row_fotu["id"]?>'}else{}">
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

