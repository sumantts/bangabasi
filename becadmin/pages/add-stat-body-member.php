<?php
if(isset($_POST["submit"]))
{
	$stat_body_id = $_POST["stat_body_id"];
	$name = $_POST["name"];
	$designation = $_POST["designation"];
	$pro_pic = $_FILES["pro_pic"]["name"]; 	
	
	$sql = "INSERT INTO stat_body_members (stat_body_id, name, designation) VALUES ('" .$stat_body_id. "', '" .$name. "', '" .$designation. "')";
	$res = mysqli_query($mysqli, $sql);
	
	$id = mysqli_insert_id($mysqli);
	
	if($pro_pic)
	{
		$photoname_end = end(explode(".",$pro_pic));
		$new_name = 'bodymem_'.date('YmdHis').'.'.$photoname_end;
		move_uploaded_file($_FILES["pro_pic"]["tmp_name"],"../bodymem_photo/".$new_name);
		$upd_photo = "UPDATE stat_body_members SET pro_pic = '" .$new_name. "' WHERE id = '" .$id. "'";
		mysqli_query($mysqli, $upd_photo);
	}
	
	header("location:?go=add-stat-body-member&add=ok");
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
            <a href="#">Satutiory Body Member</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["add"]  == "ok"){?><div class="alert alert-info">Satutiory Body Member Added Successfully.</div><?php } ?>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Satutiory Body Member</h2>
				</div>
            <div class="box-content" style="min-height:200px;">
				<form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Committee Name</label>
					<select class="form-control" name="stat_body_id" id="stat_body_id">
					<option value="0">Select Committee</option>
					<?php
					$tsql = "SELECT * FROM stat_body";
					$tres = mysqli_query($mysqli, $tsql);
					while($trow = mysqli_fetch_array($tres))
					{
					?>
						<option value="<?=$trow["id"]?>"><?=$trow["name"]?></option>
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

    