<?php
if(isset($_POST["submit"]))
{
	$name = $_POST["name"];
	$designation = $_POST["designation"];
	$pro_pic = $_FILES["pro_pic"]["name"]; 	
	
	$sql = "INSERT INTO gb_members (name, designation) VALUES ('" .$name. "', '" .$designation. "')";
	mysql_query($sql);
	
	$id = mysql_insert_id();
	
	$fet_num_row_sql = "SELECT * FROM gb_members";
	$fet_num_row_res = mysql_query($fet_num_row_sql);
	$last_priority = mysql_num_rows($fet_num_row_res);
	
	$upd_prio = "UPDATE gb_members SET order_by_priority = '" .$last_priority. "' WHERE id = '" .$id. "'";
	mysql_query($upd_prio);
		
	if($pro_pic)
	{
		$photoname_end = end(explode(".",$pro_pic));
		$new_name = 'gb_'.date('YmdHis').'.'.$photoname_end;
		move_uploaded_file($_FILES["pro_pic"]["tmp_name"],"../gb_members/".$new_name);
		$upd_photo = "UPDATE gb_members SET profile_picture = '" .$new_name. "', order_by_priority = '" .$last_priority. "' WHERE id = '" .$id. "'";
		mysql_query($upd_photo);
	}
	
	header("location:?go=add-gb-body-member&add=ok");
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
<?php if($_GET["add"]  == "ok"){?><div class="alert alert-info">GB Body Member Added Successfully.</div><?php } ?>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add GB Body Member</h2>
				</div>
            <div class="box-content" style="min-height:200px;">
				<form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
				
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Member Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $_POST["name"]?>">
                </div> 
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">designation</label>
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

    