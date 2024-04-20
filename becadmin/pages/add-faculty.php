<?php
if(isset($_POST["submit"]))
{
	$dept_id = $_POST["dept_id"];
	$name_quali = $_POST["name_quali"];
	$designation = $_POST["designation"];
	$email_id = $_POST["email_id"];
	$contact_no = $_POST["contact_no"];
	$specialization = $_POST["specialization"];
	$interest_area = $_POST["interest_area"];
	$teaching_exp = $_POST["teaching_exp"];
	$paper_publish = $_POST["paper_publish"];
	$book_publish = $_POST["book_publish"];
	$paper_conf = $_POST["paper_conf"];
	$participation_conf = $_POST["participation_conf"];
	$organize_conf = $_POST["organize_conf"];
	$phd_stdn = $_POST["phd_stdn"];
	$medel = $_POST["medel"];
	$hobby = $_POST["hobby"];
	$vidwan_profile = $_POST["vidwan_profile"];
	$pro_pic = $_FILES["pro_pic"]["name"]; 	
	
	$sql = "INSERT INTO faculty (dept_id, name_quali, designation, email_id, contact_no, specialization, interest_area, teaching_exp, paper_publish, book_publish, paper_conf, participation_conf, organize_conf, phd_stdn, medel, hobby, vidwan_profile) VALUES ('" .$dept_id. "', '" .$name_quali. "', '" .$designation. "', '" .$email_id. "', '" .$contact_no. "', '" .$specialization. "', '" .$interest_area. "', '" .$teaching_exp. "', '" .$paper_publish. "', '" .$book_publish. "', '" .$paper_conf. "', '" .$participation_conf. "', '" .$organize_conf. "', '" .$phd_stdn. "', '" .$medel. "', '" .$hobby. "', '" .$vidwan_profile. "')";
	mysqli_query($mysqli, $sql);
	
	$id = mysqli_insert_id($mysqli);
	
	if($pro_pic)
	{
		//echo ' inside block '.$id.'=';
		$photoname_end = end(explode(".",$pro_pic));
		$new_name = 'faculty_'.date('YmdHis').'.'.$photoname_end;
		$new_path = "../faculty_photo/".$new_name;
		
		move_uploaded_file($_FILES["pro_pic"]["tmp_name"], $new_path);
		$upd_photo = "UPDATE faculty SET pro_pic = '" .$new_name. "' WHERE id = '" .$id. "'";
		mysqli_query($mysqli, $upd_photo);
	}
	
	header("location:?go=add-faculty&add=ok");
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
            <a href="#">Faculty Description</a>
        </li>
    </ul>
</div>

<div class="row">
<?php if($_GET["add"]  == "ok"){?><div class="alert alert-info">Faculty Details Added Successfully.</div><?php } ?>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Faculty Description</h2>
				</div>
            <div class="box-content" style="min-height:550px;">
				<form name="teacher" id="teacher" action="" method="post" enctype="multipart/form-data">
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Department</label>
					<select class="form-control" name="dept_id" id="dept_id">
					<option value="0">Select Department</option>
					<?php
					$tsql = "SELECT * FROM course_category ORDER BY cc_name ASC";
					$tres = mysqli_query($mysqli, $tsql);
					while($trow = mysqli_fetch_array($tres))
					{
					?>
						<option value="<?=$trow["cc_id"]?>"><?=$trow["cc_name"]?></option>
					<?php } ?>
					</select>
                </div>
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Name & Qualification</label>
                    <input type="text" class="form-control" id="name_quali" name="name_quali" value="<?php echo $_POST["name_quali"]?>">
                </div> 
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $_POST["designation"]?>">
                </div> 
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Email Id</label>
                    <input type="email" class="form-control" id="email_id" name="email_id" value="<?php echo $_POST["email_id"]?>">
                </div> 
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Contact No</label>
                    <input type="number" class="form-control" id="contact_no" name="contact_no" value="<?php echo $_POST["contact_no"]?>" maxlength="12">
                </div> 
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Specialization</label>
                    <input type="text" class="form-control" id="specialization" name="specialization" value="<?php echo $_POST["specialization"]?>">
                </div> 
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Area of Interest</label>
                    <input type="text" class="form-control" id="interest_area" name="interest_area" value="<?php echo $_POST["interest_area"]?>">
                </div>  
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Teaching Experience</label>
                    <input type="text" class="form-control" id="teaching_exp" name="teaching_exp" value="<?php echo $_POST["teaching_exp"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Research Paper Published</label>
                    <input type="text" class="form-control" id="paper_publish" name="paper_publish" value="<?php echo $_POST["paper_publish"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Book published</label>
                    <input type="text" class="form-control" id="book_publish" name="book_publish" value="<?php echo $_POST["book_publish"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Paper Presented in Conf./Seminar</label>
                    <input type="text" class="form-control" id="paper_conf" name="paper_conf" value="<?php echo $_POST["paper_conf"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Participation Conf./Seminar</label>
                    <input type="text" class="form-control" id="participation_conf" name="participation_conf" value="<?php echo $_POST["participation_conf"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Organized Conf./Seminar</label>
                    <input type="text" class="form-control" id="organize_conf" name="organize_conf" value="<?php echo $_POST["organize_conf"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">No. of Ph.D. Students</label>
                    <input type="number" class="form-control" id="phd_stdn" name="phd_stdn" value="<?php echo $_POST["phd_stdn"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Medel / Award</label>
                    <input type="text" class="form-control" id="medel" name="medel" value="<?php echo $_POST["medel"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Research projects</label>
                    <input type="text" class="form-control" id="hobby" name="hobby" value="<?php echo $_POST["hobby"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Profile Picture</label>
                    <input type="file" class="form-control" id="pro_pic" name="pro_pic" value="<?php echo $_POST["pro_pic"]?>">
                </div>
				
				<div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Vidwan Profile</label>
                    <input type="text" class="form-control" id="vidwan_profile" name="vidwan_profile" value="<?php echo $_POST["vidwan_profile"]?>">
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

    