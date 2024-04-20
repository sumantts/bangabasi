<?php
$id = $_GET["id"];
$get_data_sql = "SELECT dept_description FROM dept_desc WHERE id = '" .$id. "'";
$get_data_res = mysqli_query($mysqli, $get_data_sql);
$get_data_row = mysqli_fetch_array($get_data_res);

if(isset($_POST["upd"]))
{	
	$dept_desc = $mysqli->real_escape_string($_POST['dept_desc']);
	mysqli_query($mysqli, "UPDATE dept_desc SET dept_description = '" .$dept_desc. "' WHERE id = '" .$id. "'");
	header("location:?go=edit-dept-desc&upd=ok&id=$id");
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
            <a href="#">Update Dpartment Description</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["add"]  == "ok"){?><div class="alert alert-info">Dpartment Description Updated Successfully.</div><?php } ?>
<?php if(isset($error)){?><div class="alert alert-info"><?=$error?></div><?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Updated Dpartment Description</h2>
				</div>
				


			<div class="box-content">
                <form name="form1" method="post" enctype="multipart/form-data">
				
					
					<div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" id="dept_desc" name="dept_desc">
						<?=$get_data_row["dept_description"]?></textarea>
                    </div>
					<div class="form-group col-md-12">
					<input type="submit" class="btn btn-default" name="upd" id="upd" value="Update" style="margin-top:20px;" />
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

    