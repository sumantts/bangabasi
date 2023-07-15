<?php
if($_GET["id"]){
$id = $_GET["id"];
$fetch_fotu = "SELECT * FROM gb_members WHERE id = '" .$id. "'";
$res_fotu = mysql_query($fetch_fotu);
$row_fotu = mysql_fetch_array($res_fotu);
}
if(isset($_POST["submit"]))
{
	$stat_body_id = $_POST["stat_body_id"];
	$name = $_POST["name"];
	$designation = $_POST["designation"];
	$pro_pic = $_FILES["pro_pic"]["name"]; 	
	
	$sql = "UPDATE gb_members SET name = '" .$name. "', designation = '" .$designation. "' WHERE id = '" .$id. "'";
	mysql_query($sql);
	if($pro_pic)
	{
		$old_photo_name = "../gb_members/".$row_fotu["profile_picture"];
		if(file_exists($old_photo_name)){unlink($old_photo_name);}
		
		$photoname_end = end(explode(".",$pro_pic));
		$new_name = 'gb_'.date('YmdHis').'.'.$photoname_end;
		move_uploaded_file($_FILES["pro_pic"]["tmp_name"],"../gb_members/".$new_name);
		$upd_photo = "UPDATE gb_members SET profile_picture = '" .$new_name. "' WHERE id = '" .$id. "'";
		mysql_query($upd_photo);
	}
	header("location:?go=edit-gb-body-member&upd=ok&id=$id");
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
            <a href="#">GB Body Member</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["upd"]  == "ok"){?>
<div class="alert alert-info">GB Body Member Updated Successfully.</div>
<?php } ?>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Updated GB Body Member</h2>
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
					<img src="../gb_members/<?php echo $row_fotu["profile_picture"]?>" width="100" height="100" />
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

    