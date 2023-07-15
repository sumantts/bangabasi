<?php
if(isset($_GET["id"])){
	$id = $_GET["id"];
	$fetch_fotu = "SELECT * FROM products WHERE id = '" .$id. "'";
	$res_fotu = mysql_query($fetch_fotu);
	$row_fotu = mysql_fetch_array($res_fotu);
	}
	

if(isset($_POST["submit"]))
{
	
	$b_title =	$_POST["b_title"];
	$b_desc =	$_POST["b_desc"];
		
	$pro_pic = $_FILES["pro_pic"]["name"]; 	
	
	$sql = "UPDATE products SET b_title = '" .$b_title. "', b_desc = '" .$b_desc. "' WHERE id = '" .$id. "'";
	mysql_query($sql);
	
	if($pro_pic)
	{
		$old_file1 = "product_img/".$row_fotu["img_name"];
		if(file_exists($old_file1)){unlink($old_file1);}
		
		$photoname_end = end(explode(".",$pro_pic));
		$new_name = date('dmYHis').'.'.$photoname_end;
		
		move_uploaded_file($_FILES["pro_pic"]["tmp_name"],"product_img/".$new_name);
		
		$upd_photo = "UPDATE products SET img_name = '" .$new_name. "' WHERE id = '" .$id. "'";
		mysql_query($upd_photo);
	}
	
	header("location:?go=edit-products&add=ok&id=$id");
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
        <li> <a href="?go=products">Products</a> </li>
		<li> <a href="">Edit Products</a> </li>
      </ul>
    </div>
    <div class="row">
      <?php if($_GET["add"]  == "ok"){?>
      <div class="alert alert-info">Products Updated Successfully.</div>
      <?php } ?>
      <div class="box col-md-12">
        <div class="box-inner">
          <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-edit"></i> Edit Products</h2>
          </div>
		  <div class="box-content" style="min-height:250px;">
            <form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Title</label>
			<input type="text" class="form-control" id="b_title" name="b_title" value="<?php echo $row_fotu["b_title"]?>">
			</div>
			
					  
              <div class="form-group has-success col-md-4">
                <label class="control-label" for="inputSuccess1">Image</label>
                <input type="file" class="form-control" id="pro_pic" name="pro_pic">
              </div>
			  
			  <div class="form-group has-success col-md-4">
			  <img src="product_img/<?=$row_fotu["img_name"].'?'.date('His')?>" width="30" height="25" />
			  </div>
              
			  <div class="form-group has-success col-md-12">
			<label class="control-label" for="inputSuccess1">Description</label>
			<textarea class="form-control" name="b_desc" id="b_desc"><?=$row_fotu["b_desc"]?></textarea>
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
    </div>
    <!--/row-->
    <!--/row-->
    <!-- content ends -->
  </div>
  <!--/#content.col-md-0-->
</div>
<!--/fluid-row-->
