<?php
if($_GET["id"])
{
	$id = $_GET["id"];
	$sql = "DELETE FROM noticeboard WHERE id =".$id;
	mysqli_query($mysqli, $sql);
	header("location:?go=notice-board&del=ok");
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
                <a href="#">Notice Board</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Notice Board</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
			<a href="?go=add-notice-board" class="btn btn-setting btn-round btn-default" style="margin-right: 80px;"><i class="glyphicon glyphicon-cog">Add Notice</i></a>
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["del"] == "ok"){?><div class="alert alert-info">Notice Delete Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Sl. No
        <th>Notice Subject</th>
		<th>Notice Body</th>
		<th>Publish Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sql = "SELECT * FROM noticeboard ORDER BY publish_dt DESC";
	$res = mysqli_query($mysqli, $sql);
	while($row = mysqli_fetch_array($res)){$i++;
	?>
    <tr>
        <td><?=$i?></td>
		<td><?=$row["notice_subject"]?></td>
		<td><?=$row["notice"]?></td>
		<td><?=date('d-F-Y', strtotime($row["publish_dt"]))?></td>
        <td class="center">
           <a title="Edit" href="?go=edit-notice-board&id=<?=$row["id"]?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
            </a>
			|
            <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=notice-board&id=<?=$row["id"]?>'}else{}">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
        </td>
    </tr>
	<?php } ?>
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

