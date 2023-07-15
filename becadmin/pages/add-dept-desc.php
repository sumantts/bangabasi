<?php
if(isset($_POST["sub"]))
{
	$dept_id = $_POST["dept_id"];
	$photonames = $_FILES["photos"]["name"];
	$dept_desc = $_POST["dept_desc"];
	mkdir("dept_images/".$dept_id);
	$newfilepath = "dept_images/$dept_id/";
	$photo_stream = implode('|',$photonames);
	$sql = "INSERT INTO dept_desc (dept_id, photo_name, dept_description) VALUES ('" .$dept_id. "', '" .$photo_stream. "', '" .$dept_desc. "')";
	mysqli_query($mysqli, $sql);
	for($i = 0; $_FILES["photos"]["name"][$i] == true; $i++)
	{
		
		$photoName = $_FILES["photos"]["name"][$i];
		$photoSize = $_FILES["photos"]["size"][$i];	
		$tem_path = $_FILES["photos"]["tmp_name"][$i];
		move_uploaded_file($tem_path,"$newfilepath/$photoName");
	}
	header("location:?go=add-dept-desc&add=ok");
}


?>
<script>
tinymce.init({selector:'textarea'});
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
            <a href="#">Dpartment Description</a>
        </li>
       
        <li>
            <a href="#">Add Dpartment Description</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["add"]  == "ok"){?><div class="alert alert-info">Dpartment Description Added Successfully.</div><?php } ?>
<?php if(isset($error)){?><div class="alert alert-info"><?=$error?></div><?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Dpartment Description</h2>
				</div>
				


			<div class="box-content">
                <form name="form1" method="post" enctype="multipart/form-data">
				<div class="form-group has-success col-md-6">
                    <label class="control-label" for="inputSuccess1">Department</label>
					<select class="form-control" name="dept_id" id="dept_id">
					<option value="0">Select Department</option>
					<?php
					$tsql = "SELECT * FROM course_category ORDER BY cc_name";
					$tres = mysqli_query($mysqli, $tsql);
					while($trow = mysqli_fetch_array($tres))
					{
					?>
						<option value="<?=$trow["cc_id"]?>" <?php if($_POST["dept_id"] == $trow["cc_id"]){?> selected="selected" <?php } ?>><?=$trow["cc_name"]?></option>
					<?php } ?>
					</select>
                </div>
				
                    												
					
					
					<div class="form-group col-md-6">
                        <label for="exampleInputFile">Gallery Images (To upload multiple file press Ctrl)</label>
                        <input type="file" name="photos[]" multiple>
                    </div>
					
					<div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" id="dept_desc" name="dept_desc">
						<?=$_POST["dept_desc"]?></textarea>
                    </div>
					<div class="form-group col-md-12">
					<input type="submit" class="btn btn-default" name="sub" id="submit" value="Submit" style="margin-top:20px;" />
					</div>
					
					</form>

            </div>        
			</div>
    </div>
    <!--/span-->

</div><!--/row-->

<!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    