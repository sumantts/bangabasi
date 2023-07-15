<?php
$a = $_GET["a"];
$b = $_GET["b"];
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
		<li> <a href="?go=category"> Menu</a> </li>
        <li> <a href="#"> Add Menu</a> </li>
      </ul>
    </div>
    <div class="row">
      <?php if(isset($cat_msg)){ ?>
	  <div class="alert alert-info"><?php echo $cat_msg; ?></div>
      <?php }else{ ?>
	  <?php if(isset($a)){?>
      <div class="alert alert-info">Success! Menu added successfully.</div>
      <?php } }?>
      <div class="box col-md-12">
        <div class="box-inner">
          <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-edit"></i> Add Menu</h2>
          </div>
		  <div class="box-content" style="min-height:100px;">
            <form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
			 
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Menu Name</label>
			<input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category_name; ?>" required="required">
			</div>
			
              <div class="form-group has-error col-md-4">
                <input class="btn btn-default" type="submit" name="submit_category" id="submit_category" value="Submit" />
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
	  </div>
	  <div class="row">
	  <?php if(isset($cat_msg_b)){ ?>
	  <div class="alert alert-info"><?php echo $cat_msg_b; ?></div>
      <?php }else{ ?>
	  <?php if(isset($b)){?>
      <div class="alert alert-info">Success! Sub-Menu added successfully.</div>
      <?php } }?>
	  
	  <div class="box col-md-12">
        <div class="box-inner">
          <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-edit"></i> Add Sub Menu</h2>
          </div>
		  <div class="box-content" style="min-height:170px;">
            <form name="form2" id="form2" action="" method="post" enctype="multipart/form-data">
			 
			
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Main Menu</label>
			<select class="form-control" id="parent_id" name="parent_id" required="required">
			<option value="" <?php if($parent_id == ""){?> selected="selected" <?php } ?>>Select Main category</option>
			<?php
			$sql = "SELECT * FROM category_details WHERE parent_id = '0' ORDER BY category_name ASC";
			$res = mysql_query($sql);
			while($row = mysql_fetch_array($res))
			{
			$category_id = $row["category_id"];
			$category_name = $row["category_name"];
			?>
			<option value="<?php echo $category_id; ?>" <?php if($parent_id == $category_id){?> selected="selected" <?php } ?>><?php echo $category_name; ?></option>
			<?php } ?>			
			</select>
			</div>
			
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Sub Menu Name</label>
			<input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category_name; ?>" required="required">
			</div>
			
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Quantity</label>
			<input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required="required">
			</div>
			
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">Price</label>
			<input type="text" class="form-control" id="peice" name="peice" value="<?php echo $peice; ?>" required="required">
			</div>
			
			
              <div class="form-group has-error col-md-4">
                <input class="btn btn-default" type="submit" name="submit_sub_category" id="submit_sub_category" value="Submit" />
              </div>
            </form>
            <br>
          </div>
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
