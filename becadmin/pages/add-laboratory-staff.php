<?php
if(isset($_POST["submit"]))
{
	$dept_id = $_POST["dept_id"];
	$name = $_POST["name"];
	$designation = $_POST["designation"];
	$pro_pic = $_FILES["pro_pic"]["name"]; 	
	
	$sql = "INSERT INTO laboratory_staff (dept_id, name, designation) VALUES ('" .$dept_id. "', '" .$name. "', '" .$designation. "')";
	mysqli_query($mysqli, $sql);
	
	$id = mysqli_insert_id($mysqli);
	
	if($pro_pic)
	{
		$photoname_end = end(explode(".",$pro_pic));
		$new_name = 'labstaff_'.date('YmdHis').'.'.$photoname_end;
		move_uploaded_file($_FILES["pro_pic"]["tmp_name"],"../labstaff_photo/".$new_name);
		$upd_photo = "UPDATE laboratory_staff SET pro_pic = '" .$new_name. "' WHERE id = '" .$id. "'";
		mysqli_query($mysqli, $upd_photo);
	}
	
	header("location:?go=add-laboratory-staff&add=ok");
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
            <a href="#">Laboratory Staff</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["add"]  == "ok"){?><div class="alert alert-info">Laboratory Staff Added Successfully.</div><?php } ?>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Laboratory Staff</h2>
				</div>
            <div class="box-content" style="min-height:200px;">
				<form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Department</label>
					<select class="form-control" name="dept_id" id="dept_id">
					<option value="0">Select Department</option>
					<?php
					$tsql = "SELECT * FROM course_category";
					$tres = mysqli_query($mysqli, $tsql);
					while($trow = mysqli_fetch_array($tres))
					{
					?>
						<option value="<?=$trow["cc_id"]?>" <?php if($_POST["dept_id"] == $trow["cc_id"]){?> selected="selected" <?php } ?>><?=$trow["cc_name"]?></option>
					<?php } ?>
					</select>
                </div>
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Member Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $_POST["name"]?>">
                </div> 
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $_POST["designation"]?>">
                </div> 
				
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Profile Picture</label>
                    <input type="file" class="form-control" id="pro_pic" name="pro_pic" value="<?php echo $_POST["pro_pic"]?>">
                </div>
				             
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="submit" id="submit" value="Submit" />
                </div>
				</form>
				<br>   
            </div>
        </div>
	</div>
	
    <!--/span-->

</div><!--/row-->

<!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    