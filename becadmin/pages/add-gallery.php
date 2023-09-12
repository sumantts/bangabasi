<?php
if(isset($_POST["sub"]))
{
	$photonames = $_FILES["photos"]["name"];
	$tag_name = $_POST["tag_name"];
	$tag_name1 = str_replace(" ","_",$tag_name);
	mkdir("galleryimages/".$tag_name1);
	$newfilepath = "galleryimages/$tag_name1/";
	$photo_stream = implode('|',$photonames);
	$sql = "INSERT INTO photo_gallery (photo_name, tag_name) VALUES ('" .$photo_stream. "', '" .$tag_name. "')";
	mysqli_query($mysqli, $sql);
	for($i = 0; $_FILES["photos"]["name"][$i] == true; $i++)
	{
		
		$photoName = $_FILES["photos"]["name"][$i];
		$photoSize = $_FILES["photos"]["size"][$i];	
		$tem_path = $_FILES["photos"]["tmp_name"][$i];
		move_uploaded_file($tem_path,"$newfilepath/$photoName");
	}
	header("location:?go=add-gallery&add=ok");
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
            <a href="#">Gallery</a>
        </li>
       
        <li>
            <a href="#">Add Gallery</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["add"]  == "ok"){?><div class="alert alert-info">Gallery Added Successfully.</div><?php } ?>
<?php if(isset($error)){?><div class="alert alert-info"><?=$error?></div><?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Gallery</h2>
				</div>
				


			<div class="box-content">
                <form name="form1" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Tag Name</label>
                        <input type="text" class="form-control" id="tag_name" name="tag_name" value="<?=$_POST["tag_name"]?>">
                    </div>													
					
					
					<div class="form-group col-md-4">
                        <label for="exampleInputFile">Gallery Images (To upload multiple file press Ctrl)</label>
                        <input type="file" name="photos[]" multiple>
                    </div>
					
					<input type="submit" class="btn btn-default" name="sub" id="submit" value="Submit" style="margin-top:20px;" />
					
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

    