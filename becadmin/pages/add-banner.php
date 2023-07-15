<?php
if(isset($_POST["submit"]))
{
	
	$b_title =	$_POST["b_title"];
	$b_desc =	$_POST["b_desc"];
		
	$pro_pic = $_FILES["pro_pic"]["name"]; 	
	
	$sql = "INSERT INTO banner_images (b_title, b_desc, banner_name) VALUES ('" .$b_title. "', '" .$b_desc. "', '')";
	mysqli_query($mysqli, $sql);
	
	$id = $mysqli->insert_id;
	
	if($pro_pic)
	{
		$photoname_end = end(explode(".",$pro_pic));
		$new_name = 'banner'.$id.'.'.$photoname_end;
	
		move_uploaded_file($_FILES["pro_pic"]["tmp_name"],"../images/".$new_name);
		$upd_photo = "UPDATE banner_images SET banner_name = '" .$new_name. "' WHERE id = '" .$id. "'";
		mysqli_query($mysqli, $upd_photo);
	}
	
	header("location:?go=add-banner&add=ok");
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
        <li> <a href="#">Home</a> </li>
        <li> <a href="#">Banner Description</a> </li>
      </ul>
    </div>
    <div class="row">
      <?php if($_GET["add"]  == "ok"){?>
      <div class="alert alert-info">Banner Details Added Successfully.</div>
      <?php } ?>
      <div class="box col-md-12">
        <div class="box-inner">
          <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-edit"></i> Add Banner Description</h2>
          </div>
		  <div class="box-content" style="min-height:250px;">
            <form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
          <div class="form-group has-success col-md-4">
            <label class="control-label" for="inputSuccess1">Title</label>
            <input type="text" class="form-control" id="b_title" name="b_title" value="<?php echo $_POST["b_title"]?>">
          </div>
          
              <div class="form-group has-success col-md-4">
                <label class="control-label" for="inputSuccess1">Description</label>
                <textarea class="form-control" name="b_desc" id="b_desc"><?=$_POST["b_desc"]?></textarea>
              </div>
			  
              <div class="form-group has-success col-md-4">
                <label class="control-label" for="inputSuccess1">Banner Image</label>
                <input type="file" class="form-control" id="pro_pic" name="pro_pic" value="<?php echo $_POST["pro_pic"]?>"  accept=".jpg,.jpeg,.png,">
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
    </div>
    <!--/row-->
    <!--/row-->
    <!-- content ends -->
  </div>
  <!--/#content.col-md-0-->
</div>
<!--/fluid-row-->
