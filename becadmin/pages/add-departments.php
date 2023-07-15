<?php
if(isset($_POST["submit"]))
{
	$cc_name = $_POST["cc_name"];	
	$add_sql = "INSERT INTO course_category (cc_name,parent_cc_id) VALUES ('" .$cc_name. "','0')";
	mysqli_query($mysqli, $add_sql);
	header("location:?go=add-departments&cat-add=ok");
}

if(isset($_POST["ccsubmit"]))
{
	$cc_name = $_POST["sub_cc_name"];
	$parent_cc_id = $_POST["parent_name"];	
	$add_sql = "INSERT INTO course_category (cc_name,parent_cc_id) VALUES ('" .$cc_name. "','" .$parent_cc_id. "')";
	mysqli_query($mysqli, $add_sql);
	header("location:?go=add-departments&subcat-add=ok");
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
            <a href="#">Departments</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["subcat-add"]  == "ok"){?><div class="alert alert-info">Sub Department Added Successfully.</div><?php } ?>
<?php if($_GET["cat-add"]  == "ok"){?><div class="alert alert-info">Department Added Successfully.</div><?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Department</h2>
				</div>
            <div class="box-content" style="height:120px;">
				<form name="teacher" id="teacher" action="" method="post">
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Department</label>
                    <input type="text" class="form-control" id="cc_name" name="cc_name" value="<?php echo $_POST["cc_name"]?>" required="required">
                </div>                
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="submit" id="submit" value="Submit" />
                </div>
				</form>
				<br>   
            </div>
        </div>
	</div>
	<div class="box col-md-12">
		<div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Department Name</h2>
				</div>
            <div class="box-content" style="height:120px;">
				<form name="subcat" id="subcat" action="" method="post">
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Department</label>
					<select class="form-control" name="parent_name" id="parent_name">
					<option value="0">Select Department</option>
					<?php
					$tsql = "SELECT * FROM course_category WHERE parent_cc_id = '0'";
					$tres = mysqli_query($mysqli, $tsql);
					while($trow = mysqli_fetch_array($tres))
					{
					?>
						<option value="<?=$trow["cc_id"]?>"><?=$trow["cc_name"]?></option>
					<?php } ?>
					</select>
                </div>
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Sub Departments</label>
                    <input type="text" class="form-control" id="sub_cc_name" name="sub_cc_name" value="<?php echo $_POST["sub_cc_name"]?>" required="required">
                </div>
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="ccsubmit" id="ccsubmit" value="Submit" />
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

    