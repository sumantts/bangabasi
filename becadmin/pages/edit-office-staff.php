<?php
if($_GET["id"]){
    $id = $_GET["id"];
    $fetch_fotu = "SELECT * FROM office_staff WHERE id = '" .$id. "'";
    $res_fotu = mysqli_query($mysqli, $fetch_fotu);
    $row_fotu = mysqli_fetch_array($res_fotu);
}
if(isset($_POST["submit"]))
{
	$name = $_POST["name"];
	$designation = $_POST["designation"];
	$pro_pic = $_FILES["pro_pic"]["name"]; 	
	
	$sql = "UPDATE office_staff SET name = '" .$name. "', designation = '" .$designation. "' WHERE id = '" .$id. "'";
	mysqli_query($mysqli, $sql);
	if($pro_pic)
	{
		$old_photo_name = "../officestaff_photo/".$row_fotu["pro_pic"];
		if(file_exists($old_photo_name)){unlink($old_photo_name);}
		
		$photoname_end = end(explode(".",$pro_pic));
		$new_name = 'officestaff_'.date('YmdHis').'.'.$photoname_end;
		move_uploaded_file($_FILES["pro_pic"]["tmp_name"],"../officestaff_photo/".$new_name);
		$upd_photo = "UPDATE office_staff SET pro_pic = '" .$new_name. "' WHERE id = '" .$id. "'";
		mysqli_query($mysqli, $upd_photo);
	}
	header("location:?go=edit-office-staff&upd=ok&id=$id");
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
            <a href="#">Edit Office Staff</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["upd"]  == "ok"){?>
<div class="alert alert-info">Edit Office Staff Updated Successfully.</div>
<?php } ?>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Updated Office Staff</h2>
				</div>
            <div class="box-content" style="min-height:200px;">
				<form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
				
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Member Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row_fotu["name"]?>">
                </div> 
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $row_fotu["designation"]?>">
                </div> 
				
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Profile Picture</label>
                    <input type="file" class="form-control" id="pro_pic" name="pro_pic" value="<?php echo $_POST["pro_pic"]?>">
                </div>
				             
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="submit" id="submit" value="Update" />
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

    