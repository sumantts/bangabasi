<?php
if($_GET["id"])
{
	$id = $_GET["id"];
	mysqli_query($mysqli, "DELETE FROM stat_body WHERE id =".$id);
	header("location:?go=stat-body&del=ok");
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
                <a href="dashboard.html">Home</a>
            </li>
			
            <li>
                <a href="#">Satutiory Body / Committee</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Satutiory Body / Committee</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
			<a href="?go=add-stat-body" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog">Add Satu.Body</i></a>
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["del"] == "ok"){?><div class="alert alert-info">Satutiory Body / Committee Delete Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
		<th>Sl No</th>
        <th>Committee Name</th>
		<th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$tsql = "SELECT * FROM stat_body";
	$tres = mysqli_query($mysqli, $tsql);
	$k=0;
	while($trow = mysqli_fetch_array($tres))
	{
		$k++;
	?>
    <tr>
	
	<td class="center"><?=$k?></td>
        <td> <?=$trow["name"]?></td>
		<td> <?=$trow["description"]?></td>
        
        <td class="center">
           <a class="" href="?go=edit-stat-body&id=<?=$trow["id"]?>">
                <i class="glyphicon glyphicon-edit icon-white"></i> Edit
            </a>
            <a class="" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=stat-body&id=<?=$trow["id"]?>'}else{}">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
	<?php }?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->


    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    
    <!-- Ad ends -->

