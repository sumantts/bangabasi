<?php
$d = 0;
if($_GET["id"])
{
	$id = $_GET["id"];
	$getsql = "SELECT pro_pic FROM faculty WHERE id = '" .$id. "'";
	$getres = mysqli_query($mysqli, $getsql);
	$getrow = mysqli_fetch_array($getres);
	$pro_pic = $getrow["pro_pic"];

	$delpath = "../faculty_photo/".$pro_pic;
	
		if(is_file($delpath)){
			unlink($delpath);
		}
	
	mysqli_query($mysqli, "DELETE FROM faculty WHERE id =".$id);
	header("location:?go=faculty&del=ok");
}
?>

<script type="text/javascript">
	function alter_priority(id){
		//alert(id);
		var priority = $('#order_by_priority_'+id).val();
		$.ajax({
			type : 'GET',
			url : 'pages/ajax_setpriority_faculty.php',
			data : 'id='+id+'&priority='+priority,
			success: function(e){
				alert('Priority Updated Successfully');
			}
		});
	}
</script>

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
                <a href="#">Faculty description</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Faculty description</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
			<a href="?go=add-faculty" class="btn btn-setting btn-round btn-default" style="margin-right: 80px;"><i class="glyphicon glyphicon-cog">Add Faculty Description</i></a>
        </div>
    </div>
    <div class="box-content">
		<div class="form-group has-success col-md-4">
		<label class="control-label" for="inputSuccess1">Department</label>
		<select class="form-control" name="dept_id" id="dept_id" onchange="location.href = '?go=faculty&d='+this.value">
		<option value="0">Select Department</option>
		<?php
		$tsql = "SELECT * FROM course_category";
		$tres = mysqli_query($mysqli, $tsql);
		while($trow = mysqli_fetch_array($tres))
		{
		?>
		<option value="<?=$trow["cc_id"]?>" <?php if($_GET["d"] == $trow["cc_id"]){?> selected="selected" <?php } ?>><?=$trow["cc_name"]?></option>
		<?php } ?>
		</select>
		</div>
    <?php if($_GET["del"] == "ok"){?><div class="alert alert-info"> Faculty Description Deleted Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Sl. No</th>
		<th>Dept. Name</th>
        <th>Name & Qualification</th>
		<th>Designation</th>		
        <th>Email Id & Phone No</th>
		<th>Profile Pic</th>
		<th>Prority</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php
	
	
	$numrow = 0;
	$d = $_GET["d"];
	
	if(isset($_GET["d"]) && $_GET["d"] > 0){
		$d = $_GET["d"];
		$fetch_fotu = "SELECT * FROM faculty WHERE dept_id = '" .$d. "' ORDER BY order_by_priority ASC";
		//$res_fotu_count = mysql_query($fetch_fotu_count);
		//
	}else{
		$fetch_fotu = "SELECT * FROM faculty ORDER BY name_quali ASC";
	}
	//echo $fetch_fotu;
	$res_fotu = mysqli_query($mysqli, $fetch_fotu);
	$numrow = mysqli_num_rows($res_fotu);
	while($row_fotu = mysqli_fetch_array($res_fotu))
	{
		if($d > 0 && $row_fotu["dept_id"] == $d){
		$i++;
	?>
    <tr>
        <td><?=$i?></td>
		<td class="center">
		<?php
		$dept_id = $row_fotu["dept_id"];
		$q1 = "SELECT cc_name FROM course_category WHERE cc_id = '" .$dept_id. "'";
		$res_depname = mysqli_query($mysqli, $q1 );
		$row_depname =  mysqli_fetch_array($res_depname);
		echo $row_depname["cc_name"];
		?>
		</td>
		<td class="center"> <?=$row_fotu["name_quali"]?></td>
		<td class="center"> <?=$row_fotu["designation"]?></td>
		<td class="center">
		<?php
		echo "Email Id: ".$row_fotu["email_id"]."<br>Ph. No.".$row_fotu["contact_no"];
		?>
		</td>		
        <td class="center">
		<img src="../faculty_photo/<?php if($row_fotu["pro_pic"]){echo $row_fotu["pro_pic"];}else{echo "noimage.png";}?>" width="100px;" height="75px;" />
		</td>
		
		<td class="center">
		<?php //echo $row_gb["order_by_priority"]; ?>
		
		<select class="form-control" name="order_by_priority_<?=$row_fotu["id"]?>" id="order_by_priority_<?=$row_fotu["id"]?>" onchange="alter_priority(<?=$row_fotu["id"]?>)">
		<option value="0">Select Priority</option>
		<?php
		for($p = 1; $p <= $numrow; $p++){
		?>
			<option value="<?=$p?>" <?php if($p == $row_fotu["order_by_priority"]){?> selected="selected" <?php } ?>><?=$p?></option>
		<?php } ?>
		</select>
		</td>
        <td class="center">
           <a class="" href="?go=edit-faculty&id=<?=$row_fotu["id"]?>">
                <i class="glyphicon glyphicon-edit icon-white"></i> Edit
            </a>
			|
            <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=faculty&id=<?=$row_fotu["id"]?>'}else{}">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
        </td>
    </tr>
	<?php 
		}//if d > 0
		if($d == "" || $d == 0){		
		$i++;
	?>
    <tr>
        <td><?=$i?></td>
		<td class="center">
		<?php
		$dept_id = $row_fotu["dept_id"];
		$res_depname = mysqli_query($mysqli, "SELECT cc_name FROM course_category WHERE cc_id = '" .$dept_id. "'");
		$row_depname =  mysqli_fetch_array($res_depname);
		echo $row_depname["cc_name"];
		?>
		</td>
		<td class="center"> <?=$row_fotu["name_quali"]?></td>
		<td class="center"> <?=$row_fotu["designation"]?></td>
		<td class="center">
		<?php
		echo "Email Id: ".$row_fotu["email_id"]."<br>Ph. No.".$row_fotu["contact_no"];
		?>
		</td>		
        <td class="center">
		<img src="../faculty_photo/<?php if($row_fotu["pro_pic"]){echo $row_fotu["pro_pic"];}else{echo "noimage.png";}?>" width="100px;" height="75px;" />
		</td>
		<td>&nbsp;</td>
		
        <td class="center">
           <a class="" href="?go=edit-faculty&id=<?=$row_fotu["id"]?>">
                <i class="glyphicon glyphicon-edit icon-white"></i> Edit
            </a>
			|
            <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=faculty&id=<?=$row_fotu["id"]?>'}else{}">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
        </td>
    </tr>
	<?php 
		}//if d > 0
		
	}//end while ?>
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

