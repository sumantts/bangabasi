<?php

if($_GET["id"])
{
	$id = $_GET["id"];
	$getsql = "SELECT profile_picture FROM gb_members WHERE id = '" .$id. "'";
	$getres = mysql_query($getsql);
	$getrow = mysql_fetch_array($getres);
	$pro_pic = $getrow["profile_picture"];

	$delpath = "../gb_members/".$pro_pic;
	
		if(is_file($delpath)){
			unlink($delpath);
		}
	
	mysql_query("DELETE FROM gb_members WHERE id =".$id);
	header("location:?go=gb-body-member&del=ok");
}
?>

<script type="text/javascript">
	function alter_priority(id){
		//alert(id);
		var priority = $('#order_by_priority_'+id).val();
		$.ajax({
			type : 'GET',
			url : 'pages/ajax_setpriority.php',
			data : 'id='+id+'&priority='+priority,
			success: function(e){
				alert('Priority Updated Successfully');
			}
		});
	}
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
                <a href="#">Governing Body Member</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Governing Body Member description</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
			<a href="?go=add-gb-body-member" class="btn btn-setting btn-round btn-default" style="margin-right: 80px;"><i class="glyphicon glyphicon-cog">Add GB Member</i></a>
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["del"] == "ok"){?><div class="alert alert-info">Governing Body Member Description Deleted Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Sl. No</th>
		<th>Name</th>
		<th>Designation</th>		
		<th>Profile Pic</th>
		<th>Prority</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$fetch_fotu = "SELECT * FROM gb_members ORDER BY order_by_priority ASC";
	$res_fotu = mysql_query($fetch_fotu);
	$j=0;
	$numrow = mysql_num_rows($res_fotu);
	while($row_gb = mysql_fetch_array($res_fotu))
	{
	$j++;
	
	?>
    <tr>
        <td><?=$j?></td>
		<td class="center">
		<?php echo $row_gb["name"]; ?>
		</td>
		<td class="center"> <?=$row_gb["designation"]?></td>
			
        <td class="center">
		<img src="../gb_members/<?php if($row_gb["profile_picture"]){echo $row_gb["profile_picture"];}else{echo "noimage.png";}?>" width="100px;" height="75px;" />
		</td>
		<td class="center">
		<?php //echo $row_gb["order_by_priority"]; ?>
		
		<select class="form-control" name="order_by_priority_<?=$row_gb["id"]?>" id="order_by_priority_<?=$row_gb["id"]?>" onchange="alter_priority(<?=$row_gb["id"]?>)">
		<option value="0">Select Priority</option>
		<?php
		for($p = 1; $p <= $numrow; $p++){
		?>
			<option value="<?=$p?>" <?php if($p == $row_gb["order_by_priority"]){?> selected="selected" <?php } ?>><?=$p?></option>
		<?php } ?>
		</select>
		</td>
		
        <td class="center">
           <a class="" href="?go=edit-gb-body-member&id=<?=$row_gb["id"]?>">
                <i class="glyphicon glyphicon-edit icon-white"></i> Edit
            </a>
			|
            <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=gb-body-member&id=<?=$row_gb["id"]?>'}else{}">
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
</div>