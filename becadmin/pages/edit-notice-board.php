<?php
if($_GET["id"]){
$id = $_GET["id"];
$sql = "SELECT * FROM noticeboard WHERE id = '" .$id. "'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($res);
}
if(isset($_POST["update"]))
{
	$notice = mysqli_real_escape_string($mysqli, $_POST["notice"]);
	$publish_dt = $_POST["publish_dt"];	
	$notice_subject = $_POST["notice_subject"];
	$upd_sql = "UPDATE noticeboard SET notice_subject = '" .$notice_subject. "', notice = '" .$notice. "', publish_dt = '" .$publish_dt. "' WHERE id = '" .$id. "'";
	mysqli_query($mysqli, $upd_sql);
	$mysqli -> close();
	
	header("location:?go=edit-notice-board&update=ok&id=$id");
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
            <a href="#">Update Notice</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["update"]  == "ok"){?><div class="alert alert-info">Notice Updated Successfully.</div><?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Update Notice</h2>
				</div>
            <div class="box-content" style="height:400px;">
				<form name="form1" id="form1" action="" method="post">
				<div class="form-group has-success col-md-6">
                    <label class="control-label" for="inputSuccess1">Notice Subject</label>
                    <input type="text" class="form-control" id="notice_subject" name="notice_subject" value="<?=$row["notice_subject"]?>" >
                </div>
				
				<div class="form-group has-success col-md-6">
                    <label class="control-label" for="inputSuccess1">Notice Publish Date</label>
                    <input type="text" class="form-control tcal" id="publish_dt" name="publish_dt" value="<?=$row["publish_dt"]?>" readonly="readonly">
                </div>
				
                <div class="form-group has-success col-md-12">
                    <label class="control-label" for="inputSuccess1">Notice</label>
                    <textarea class="form-control" id="notice" name="notice"><?=$row["notice"]?></textarea>
                </div>
				     
				
				              
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="update" id="update" value="Update" />
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

    