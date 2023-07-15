<?php

if($_GET["id"])
{
	$id = $_GET["id"];
	$getsql = "SELECT tag_name FROM photo_gallery WHERE id = '" .$id. "'";
	$getres = mysqli_query($mysqli, $getsql);
	$getrow = mysqli_fetch_array($getres);
	$tag_name = $getrow["tag_name"];
	$tag_name1 = str_replace(" ","_",$tag_name);
	$delpath = "galleryimages/".$tag_name1;
	$files = glob($delpath.'/*');
	foreach($files as $file){
		if(is_file($file)){
			unlink($file);
		}
	}
	
	rmdir("galleryimages/".$tag_name1);
	
	mysqli_query($mysqli, "DELETE FROM photo_gallery WHERE id =".$id);
	header("location:?go=gallery&del=ok");
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
                <a href="#">Gallery</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Gallery</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
			<a href="?go=add-gallery" class="btn btn-setting btn-round btn-default" style="margin-right: 80px;"><i class="glyphicon glyphicon-cog">Add Gallery</i></a>
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["del"] == "ok"){?><div class="alert alert-info">Gallery Delete Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Sl. No
        <th>Tag Name</th>
		<th>Photo</th>		
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$fetch_fotu = "SELECT * FROM photo_gallery";
	$res_fotu = mysqli_query($mysqli, $fetch_fotu);
	while($row_fotu = mysqli_fetch_object($res_fotu))
	{
	$i++;
	
	?>
    <tr>
        <td><?=$i?></td>
		<td class="center"><?=$row_fotu->tag_name?></td>
        <td class="center">
		<div style="margin-top:3px;">
		<?php
		$tag_name1 = str_replace(" ","_",$row_fotu->tag_name);
		$photo_image = explode('|',$row_fotu->photo_name);
		$count = sizeof($photo_image);
		foreach($photo_image as $key => $value)
		{
		
		?>
			<div style="background:#000; width:50px; height:50px; text-align:center; float:left; margin-right:5px;">
			<img src="galleryimages/<?=$tag_name1?>/<?php echo $value; ?>" width="50px;" height="50px;" style="padding:5px;" />
			</div>
			
		<?php 
		} 
		?>
		</div>
		<div style="clear:both;"></div>
		</td>
		
		
        <td class="center">
           
            <a title="Delete" href="javascript:void(0)" onclick="if(confirm('Are you Sure to delete the Record')){window.location.href='?go=gallery&id=<?=$row_fotu->id?>'}">
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

    <!-- Ad, you can remove it -->
    
    <!-- Ad ends -->

