<?php

if(isset($_POST["sub"]))
{
	$notice = mysqli_real_escape_string($mysqli, $_POST["notice"]);
	$publish_dt = $_POST["publish_dt"];	
	$notice_subject = $_POST["notice_subject"];
	$upd_sql = "INSERT INTO noticeboard (notice_subject, notice, publish_dt) VALUES ('" .$notice_subject. "', '" .$notice. "', '" .$publish_dt. "')";
	mysqli_query($mysqli, $upd_sql);
	$mysqli -> close();
	
	header("location:?go=add-notice-board&add=ok");
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
            <a href="#">Add Notice</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["add"]  == "ok"){?><div class="alert alert-info">Notice Added Successfully.</div><?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Notice</h2>
				</div>
            <div class="box-content" style="height:400px;">
				<form name="form1" id="form1" action="" method="post">
				<div class="form-group has-success col-md-6">
                    <label class="control-label" for="inputSuccess1">Notice Subject</label>
                    <input type="text" class="form-control" id="notice_subject" name="notice_subject" value="<?=$_POST["notice_subject"]?>" >
                </div>
				
				<div class="form-group has-success col-md-6">
                    <label class="control-label" for="inputSuccess1">Notice Publish Date</label>
                    <input type="text" class="form-control tcal" id="publish_dt" name="publish_dt" value="<?=$_POST["publish_dt"]?>" readonly="readonly">
                </div>
				
                <div class="form-group has-success col-md-12">
                    <label class="control-label" for="inputSuccess1">Notice</label>
                    <textarea class="form-control" id="notice" name="notice"><?=$_POST["notice"]?></textarea>
                </div>
				     
				
				              
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="sub" id="sub" value="Submit" />
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

    