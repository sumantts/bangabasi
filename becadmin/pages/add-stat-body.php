<?php
if(isset($_POST["submit"]))
{
	$name = $_POST["name"];	
	$description = $_POST["description"];
	$add_sql = "INSERT INTO stat_body (name, description) VALUES ('" .$name. "', '" .$description. "')";
	mysqli_query($mysqli, $add_sql);
	header("location:?go=add-stat-body&add=ok");
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
            <a href="#">Satutiory Body / Committee</a>
        </li>
    </ul>
</div>

<div class="row">

<?php if($_GET["add"]  == "ok"){?><div class="alert alert-info">Satutiory Body / Committee Added Successfully.</div><?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Satutiory Body / Committee</h2>
				</div>
            <div class="box-content" style="height:300px;">
				<form name="teacher" id="teacher" action="" method="post">
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $_POST["name"]?>" required="required">
                </div> 
				<div class="form-group has-success col-md-8">
                    <label class="control-label" for="inputSuccess1">Description</label>
                    <textarea class="form-control" id="description" name="description"><?php echo $_POST["description"]?></textarea>
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

</div><!--/row-->

<!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    