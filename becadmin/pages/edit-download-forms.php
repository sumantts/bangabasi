<?php
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
	$sql = "SELECT * FROM form_download WHERE id = '" .$id. "'";
	$res = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($res);
}


if(isset($_POST["sub"]))
{
	$form_name = $_POST["form_name"];  	
	$picture = $_FILES["picture"]["name"]; 	
	$sql = "UPDATE form_download SET form_name = '" .$form_name. "' WHERE id = '" .$id. "'";
	mysqli_query($mysqli, $sql);
			
	if($picture)
	{
		$old_photo_name = "../forms/".$row["file_name"];

		if(file_exists($old_photo_name)){unlink($old_photo_name);}
		
		$photoname_end = end(explode(".",$picture));
		$new_name = date('YmdHis').'.'.$photoname_end;
		move_uploaded_file($_FILES["picture"]["tmp_name"], "../forms/".$new_name);
		
        $upd_photo = "UPDATE form_download SET file_name = '" .$new_name. "' WHERE id = '" .$id. "'";
		mysqli_query($mysqli, $upd_photo);
	}
	
	header("location:?go=edit-download-forms&upd=ok&id=$id");
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
            <a href="#">Forms</a>
        </li>
       
        <li>
            <a href="#">Edit Forms</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["upd"]  == "ok"){?><div class="alert alert-info">Forms Updated Successfully.</div><?php } ?>
<?php if(isset($error)){?><div class="alert alert-info"><?=$error?></div><?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Forms</h2>
				</div>
				


<div class="box-content">
                <form name="form1" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Form Name</label>
                        <input type="text" class="form-control" id="form_name" name="form_name" value="<?=$row["form_name"]?>">
                    </div>	
					
					<div class="form-group col-md-4">
                        <label for="exampleInputFile">Upload forms</label>
                        <input type="file" id="picture" name="picture">
                    </div>
												
                    <input type="submit" class="btn btn-default" name="sub" id="submit" value="Update" style="margin-top:20px;" />
					
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

    