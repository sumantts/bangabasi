<?php
if($_GET["id"])
{
	$cc_id = $_GET["id"];
	mysqli_query($mysqli, "DELETE FROM course_category WHERE cc_id =".$cc_id);
	header("location:?go=departments&del=ok");
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
                <a href="#">Departments</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Departments</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
			<a href="?go=add-departments" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog">Add</i></a>
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["del"] == "ok"){?><div class="alert alert-info">Department Delete Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
		<th>Department</th>
        <th>Sub Department</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$tsql = "SELECT * FROM course_category ORDER BY cc_name ASC";
	$tres = mysqli_query($mysqli, $tsql);
	while($trow = mysqli_fetch_array($tres))
	{
		
	?>
    <tr>
	
	<td class="center">
		<?php
		if($trow["parent_cc_id"] == 0){echo $trow["cc_name"];}else{
		$sql_cc = "SELECT cc_name FROM course_category WHERE cc_id =".$trow["parent_cc_id"];
		$res_cc = mysqli_query($mysqli, $sql_cc);
		$row_cc = mysqli_fetch_array($res_cc);
		echo $row_cc["cc_name"];
		}
		?>		
		</td>
		
        <td>
		<?php
		if($trow["parent_cc_id"] != 0){
		echo $trow["cc_name"];
		}
		?>
		</td>
		
        
        <td class="center">
           <a class="" href="?go=edit-departments&id=<?=$trow["cc_id"]?>">
                <i class="glyphicon glyphicon-edit icon-white"></i> Edit
            </a>
            <a class="" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=departments&id=<?=$trow["cc_id"]?>'}else{}">
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

