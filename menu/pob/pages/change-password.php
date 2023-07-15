<?php
if(isset($_POST["sub_pwd"]))
{
	$password =	$_POST["password"];
	$sql = "UPDATE login SET password = '" .$password. "' WHERE log_id = '1'";
	mysql_query($sql);
	header("location:?go=change-password&upd=ok");
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
        <li> <a href="#"> Change Password</a> </li>
      </ul>
    </div>
    <div class="row">
	<?php if(isset($err_msg)){echo $err_msg;}?>
      <?php if($_GET["upd"]  == "ok"){?>
      <div class="alert alert-info">Password Change Successfully.</div>
      <?php } ?>
      <div class="box col-md-12">
        <div class="box-inner">
          <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-edit"></i> Change Password</div>
		  <div class="box-content" style="min-height:120px;">
            <form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
						
			<div class="form-group has-success col-md-4">
			<label class="control-label" for="inputSuccess1">New Password</label>
			<input type="password" class="form-control" id="password" name="password" required="required">
			</div>
			
			
			
			                
              <div class="form-group has-error col-md-4">
                <input class="btn btn-default" type="submit" name="sub_pwd" id="sub_pwd" value="Update" />
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
