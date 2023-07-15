<?php
if(isset($_GET["id"]))
{
	$cc_id = $_GET["id"];	
	$get_cc = "SELECT * FROM course_category WHERE cc_id = '" .$cc_id. "'";
	$res_cc = mysqli_query($mysqli, $get_cc);
	$row_cc = mysqli_fetch_array($res_cc);
	$parentcc_name = $row_cc["cc_name"];
	
	if($row_cc["parent_cc_id"] != 0){
	$sub_deptname = $row_cc["cc_name"];
	$get_cc_parent = "SELECT cc_name FROM course_category WHERE cc_id = '" .$row_cc["parent_cc_id"]. "'";
	$res_cc_parent = mysqli_query($mysqli, $get_cc_parent);
	$row_cc_parent = mysqli_fetch_array($res_cc_parent);
	$parentcc_name = $row_cc_parent["cc_name"];
	
	}
}
if(isset($_POST["submit"]))
{
	$cc_name = $_POST["cc_name"];	
	$add_sql = "UPDATE course_category SET cc_name = '" .$cc_name. "' WHERE cc_id = '" .$cc_id. "'";
	mysqli_query($mysqli, $add_sql);
	header("location:?go=edit-departments&cat-update=ok&id=$cc_id");
}

if(isset($_POST["ccsubmit"]))
{
	$cc_name = $_POST["sub_cc_name"];
	$parent_cc_id = $_POST["parent_name"];	
	$add_sql = "UPDATE course_category SET cc_name = '" .$cc_name. "', parent_cc_id = '" .$parent_cc_id. "' WHERE cc_id = '" .$cc_id. "'";
	mysqli_query($mysqli, $add_sql);
	header("location:?go=edit-departments&sub-cat-update=ok&id=$cc_id");
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
            <a href="#">Edit department</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["sub-cat-update"]  == "ok"){?><div class="alert alert-info">Sub department Updated Successfully.</div><?php } ?>
<?php if($_GET["cat-update"]  == "ok"){?><div class="alert alert-info">Department Updated Successfully.</div>
<?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit department</h2>
		  </div>
            <div class="box-content" style="height:120px;">
				<form name="teacher" id="teacher" action="" method="post">
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Department</label>
                    <input type="text" class="form-control" id="cc_name" name="cc_name" value="<?=$parentcc_name?>" required="required">
                </div>
                
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="submit" id="submit" value="Update" />
                </div>
				</form>
				<br>   
            </div>
        </div>
		
		<div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Sub departments</h2>
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
						<option value="<?=$trow["cc_id"]?>" <?php if($row_cc["parent_cc_id"] == $trow["cc_id"]){?> selected="selected" <?php } ?>><?=$trow["cc_name"]?></option>
					<?php } ?>
					</select>
                </div>
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Sub Department</label>
                    <input type="text" class="form-control" id="sub_cc_name" name="sub_cc_name" value="<?=$sub_deptname?>" required="required">
                </div>
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="ccsubmit" id="ccsubmit" value="Update" />
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

    