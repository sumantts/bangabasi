<?php
$get_sql = "SELECT * FROM menu_list WHERE id = '1'";
$get_res = mysql_query($get_sql);
$get_row = mysql_fetch_array($get_res);

$soc_sql = "SELECT * FROM social_medis_link WHERE id = '1'";
$soc_res = mysql_query($soc_sql);
$soc_row = mysql_fetch_array($soc_res);

if(isset($_POST["menu_submit"]))
{
	$menu_1 = $_POST["menu_1"];
	$menu_2 = $_POST["menu_2"];
	$menu_3 = $_POST["menu_3"];
	$menu_4 = $_POST["menu_4"];
	$menu_5 = $_POST["menu_5"];
	$menu_6 = $_POST["menu_6"];
	$menu_7 = $_POST["menu_7"];
	
	$sql = "UPDATE menu_list SET menu_1 = '" .$menu_1. "', menu_2 = '" .$menu_2. "', menu_3 = '" .$menu_3. "', menu_4 = '" .$menu_4. "', menu_5 = '" .$menu_5. "', menu_6 = '" .$menu_6. "', menu_7 = '" .$menu_7. "' WHERE id = '1'";
	mysql_query($sql);	
	header("location:?go=menu-logo&mupd=ok");
}

if(isset($_POST["logo_submit"]))
{
	$pro_pic = $_FILES["logo"]["name"];
	$site_name = $_POST["site_name"];	
	$head_ph_no = $_POST["head_ph_no"];
	if($pro_pic){
	$photoname_end = end(explode(".",$pro_pic));
	$new_name = date('dmYHis').'.'.$photoname_end;	
	move_uploaded_file($_FILES["logo"]["tmp_name"],"logo_img/".$new_name);	
	$upd_photo = "UPDATE menu_list SET logo = '" .$new_name. "' WHERE id = '1'";
	mysql_query($upd_photo);
	}
	$upd_photo1 = "UPDATE menu_list SET site_name = '" .$site_name. "', head_ph_no = '" .$head_ph_no. "' WHERE id = '1'";
	mysql_query($upd_photo1);	
	
	header("location:?go=menu-logo&lupd=ok");
}

if(isset($_POST["copy_submit"]))
{
	$copy_txt = $_POST["copy_txt"];
	
	$upd_photo = "UPDATE menu_list SET copy_txt = '" .$copy_txt. "' WHERE id = '1'";
	mysql_query($upd_photo);
	
	header("location:?go=menu-logo&cpupd=ok");
}

if(isset($_POST["soc_submit"]))
{

	$gmail = $_POST["gmail"];
	$twitter = $_POST["twitter"];
	$facebook = $_POST["facebook"];
	$gplus = $_POST["gplus"];
	$linkedin = $_POST["linkedin"];
	$skype = $_POST["skype"];
	$ingtagram = $_POST["ingtagram"];
	$youtube = $_POST["youtube"];
	
	$upd_social = "UPDATE social_medis_link SET gmail = '" .$gmail. "', twitter = '" .$twitter. "', facebook = '" .$facebook. "', gplus = '" .$gplus. "', linkedin = '" .$linkedin. "', skype = '" .$skype. "', ingtagram = '" .$ingtagram. "', youtube = '" .$youtube. "' WHERE id = '1'";
	mysql_query($upd_social);


header("location:?go=menu-logo&socupd=ok");
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
            <a href="?go=home">Home</a>
        </li>
		<li>
            <a href="#">Menu & Logo</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if(isset($eror_msg)){?><div class="alert alert-danger">Sorry! <?=$eror_msg?></div><?php }else{if($_GET["mupd"]  == "ok"){?><div class="alert alert-info">Menu Updated Successfully.</div><?php }if($_GET["lupd"]  == "ok"){?><div class="alert alert-info">Logo Updated Successfully.</div><?php }if($_GET["cpupd"]  == "ok"){?><div class="alert alert-info">Copy Right Text Updated Successfully.</div><?php }if($_GET["socupd"]  == "ok"){?><div class="alert alert-info">Social Media Links Updated Successfully.</div><?php } }?>

    <div class="box col-md-12">
        <div class="box-inner" style="min-height:300px;">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Menu </h2>
				</div>
            <div class="box-content">
				<form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
							 
				 
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Menu 1</label>
                    <input type="text" class="form-control" id="menu_1" name="menu_1" value="<?php echo $get_row["menu_1"]?>" required>
                </div> 
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Menu 2</label>
                    <input type="text" class="form-control" id="menu_2" name="menu_2" value="<?php echo $get_row["menu_2"]?>" required>
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Menu 3</label>
                    <input type="text" class="form-control" id="menu_3" name="menu_3" value="<?php echo $get_row["menu_3"]?>" required>
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Menu 4</label>
                    <input type="text" class="form-control" id="menu_4" name="menu_4" value="<?php echo $get_row["menu_4"]?>" required>
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Menu 5</label>
                    <input type="text" class="form-control" id="menu_5" name="menu_5" value="<?php echo $get_row["menu_5"]?>" required>
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Menu 6</label>
                    <input type="text" class="form-control" id="menu_6" name="menu_6" value="<?php echo $get_row["menu_6"]?>" required>
                </div>
				
				<!--<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Menu 7</label>
                    <input type="text" class="form-control" id="menu_7" name="menu_7" value="<?php echo $get_row["menu_7"]?>" required>
                </div>-->	
				             
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="menu_submit" id="menu_submit" value="Update" />
                </div>
				</form>
				<br>   
            </div>
        </div>
	</div>
	
	<div class="box col-md-12">
	<div class="box-inner" style="min-height:150px;">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Logo</h2>
				</div>
            <div class="box-content">
				<form name="form2" id="form2" action="" method="post" enctype="multipart/form-data">
								
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo" value="<?php echo $_POST["logo"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Site Name</label>
                    <input type="text" class="form-control" id="site_name" name="site_name" value="<?php echo $get_row["site_name"]?>" required>
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Phone Number</label>
                    <input type="text" class="form-control" id="head_ph_no" name="head_ph_no" value="<?php echo $get_row["head_ph_no"]?>" required>
                </div>
				
				 <img src="logo_img/<?=$get_row["logo"]?>" width="100" />
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="logo_submit" id="logo_submit" value="Update" / required>
                </div>
				</form>
				<br>   
            </div>
        </div>
	</div>
	
	<div class="box col-md-12">
	<div class="box-inner" style="min-height:150px;">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Footer Copyright text</h2>
				</div>
            <div class="box-content">
				<form name="form3" id="form3" action="" method="post" enctype="multipart/form-data">
								
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1"></label>
                    <input type="text" class="form-control" id="copy_txt" name="copy_txt" value="<?php echo $get_row["copy_txt"]?>" required>
                </div>
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="copy_submit" id="copy_submit" value="Update" />
                </div>
				</form>
				<br>   
            </div>
        </div>
	</div>	
	
	<div class="box col-md-12">
	<div class="box-inner" style="min-height:300px;">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Social Media links</h2>
				</div>
            <div class="box-content">
				<form name="form4" id="form4" action="" method="post" enctype="multipart/form-data">
								
				<!--<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Gmail</label>
                    <input type="url" class="form-control" id="gmail" name="gmail" value="<?php echo $soc_row["gmail"]?>" required>
                </div>-->
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Twitter</label>
                    <input type="url" class="form-control" id="twitter" name="twitter" value="<?php echo $soc_row["twitter"]?>" required>
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Facebook</label>
                    <input type="url" class="form-control" id="facebook" name="facebook" value="<?php echo $soc_row["facebook"]?>" required>
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Google Plus</label>
                    <input type="url" class="form-control" id="gplus" name="gplus" value="<?php echo $soc_row["gplus"]?>" required>
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">LinkedIn</label>
                    <input type="url" class="form-control" id="linkedin" name="linkedin" value="<?php echo $soc_row["linkedin"]?>" required>
                </div>
				
				<!--<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">RSS</label>
                    <input type="url" class="form-control" id="skype" name="skype" value="<?php echo $soc_row["skype"]?>" required>
                </div>-->
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Pinterest</label>
                    <input type="url" class="form-control" id="ingtagram" name="ingtagram" value="<?php echo $soc_row["ingtagram"]?>" required>
                </div>
				
				<!--<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">YouTube</label>
                    <input type="url" class="form-control" id="youtube" name="youtube" value="<?php echo $soc_row["youtube"]?>" required>
                </div>-->
				
				<div class="form-group has-error col-md-4">
				<input class="btn btn-default" type="submit" name="soc_submit" id="soc_submit" value="Update" />
                </div>
				</form>
				<br>   
            </div>
        </div>
	</div>

</div><!--/row-->

<!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    