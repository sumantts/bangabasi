<?php
if(isset($_POST["submit"]))
{
	
	$b_title =	$_POST["b_title"];
	$b_desc =	$_POST["b_desc"];
		
	$pro_pic = $_FILES["pro_pic"]["name"]; 	
	
	$sql = "INSERT INTO specialization (b_title, b_desc, img_name) VALUES ('" .$b_title. "', '" .$b_desc. "', '')";
	mysql_query($sql);
	
	$id = mysql_insert_id();	
	if($pro_pic)
	{
		$photoname_end = end(explode(".",$pro_pic));
		$new_name = date('dmYHis').'.'.$photoname_end;
		
		move_uploaded_file($_FILES["pro_pic"]["tmp_name"],"specialize_img/".$new_name);
		
		$upd_photo = "UPDATE specialization SET img_name = '" .$new_name. "' WHERE id = '" .$id. "'";
		mysql_query($upd_photo);
	}
	
	header("location:?go=add-specialize-in&add=ok");
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
        <li> <a href="?go=home">Home</a> </li>
		<li> <a href="?go=specialize-in"> Specialize In</a> </li>
        <li> <a href="#"> Add Specalization</a> </li>
      </ul>
    </div>
    <div class="row">
      <?php if($_GET["add"]  == "ok"){?>
      <div class="alert alert-info">Specalization Added Successfully.</div>
      <?php } ?>
      <div class="box col-md-12">
        <div class="box-inner">
          <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-edit"></i> Add Specalization</h2>
          </div>
		  <div class="box-content" style="min-height:250px;">
            <form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Title</label>
			<input type="text" class="form-control" id="b_title" name="b_title" value="<?php echo $_POST["b_title"]?>">
			</div>
			
			
			
			<div class="form-group has-success col-md-4">
                <label class="control-label" for="inputSuccess1">Image</label>
                <input type="file" class="form-control" id="pro_pic" name="pro_pic" value="<?php echo $_POST["pro_pic"]?>">
              </div>
			  
			  <div class="form-group has-success col-md-12">
			<label class="control-label" for="inputSuccess1">Description</label>
			<textarea class="form-control" name="b_desc" id="b_desc"><?=$_POST["b_desc"]?></textarea>
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
