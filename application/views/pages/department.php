 <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1> Department </h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                  Home
                </a>
              </li>
              
              <li class="active">
                Department
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->
<!--container start-->
    <div class="container mar-b-30">
<?php
/*$dept_id = $_GET["dept_id"];
$sql = "SELECT * FROM dept_desc WHERE dept_id = '" .$dept_id. "'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);

$sql2 = "SELECT cc_name FROM course_category WHERE cc_id = '" .$dept_id. "'";
$res2 = mysql_query($sql2);
$row2 = mysql_fetch_array($res2);*/
if($dept_des != NULL){
foreach($dept_des as $row){}
}


?>
      <!--Typography start-->
      <div class="row">
        <div class="col-lg-12">
          <h3>About <?php echo $category_des; ?> Department</h3>
          <p><?php if($dept_des != NULL){echo $row->dept_description;} ?></p>
        </div>
      </div>
      <!--Typography end-->
	  <?php
	  if($faculties != NULL){
			$n=0;
	?>
	  <h3>Faculty</h3>
	  <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      No
                    </th>
                    <th>
                      Name & Designation
                    </th>
					 <th>
                      Contact Information
                    </th>
                    <th>
                      Designation
                    </th>
                    <th>
                      Specialization achievements Interest areas & Other related information
                    </th>
                    
                  </tr>
                </thead>
                <tbody>
				<?php
				foreach($faculties as $faculty){
				$n++;
				?>
                  <tr>
                    <td>
                      <?php echo $n?>
                    </td>
                    <td align="center">
					<img src="<?php echo base_url(); ?>faculty_photo/<?php if($faculty->pro_pic){echo $faculty->pro_pic;}else{echo "noimage.png";}?>" height="120" width="90">
                    <h5><?php echo $faculty->name_quali; ?></h5>
					 </td>
					<td>
					<?php
					if($faculty->email_id){echo 'Email Id : '.$faculty->email_id;}
					if($faculty->contact_no){echo '<br>Contact No : '.$faculty->contact_no;}					
					?>
					</td>
                    <td><?php echo $faculty->designation; ?></td>
                    <td>
					<ol>
					<?php if($faculty->specialization){?>
					<li><strong>Specialization</strong> :  <?php echo $faculty->specialization; ?></li>
					<?php } ?>
					
					<?php if($faculty->interest_area){?>
					<li><strong>Area of Interest</strong> :  <?php echo $faculty->interest_area; ?></li>
					<?php } ?>
					
					<?php if($faculty->teaching_exp){?>
					<li><strong>Teaching Experience</strong> :  <?php echo $faculty->teaching_exp; ?></li>
					<?php } ?>
					
					<?php if($faculty->paper_publish){?>
					<li><strong>Research Paper Published</strong> :  <?php echo $faculty->paper_publish; ?></li>
					<?php } ?>
					
					<?php if($faculty->book_publish){?>
					<li><strong>Book published</strong> :  <?php echo $faculty->book_publish; ?></li>
					<?php } ?>
					
					<?php if($faculty->paper_conf){?>
					<li><strong>Paper Presented in Conf./Seminar</strong> :  <?php echo $faculty->paper_conf; ?></li>
					<?php } ?>
					
					<?php if($faculty->participation_conf){?>
					<li><strong>Participation Conf./Seminar</strong> :  <?php echo $faculty->participation_conf;?></li>
					<?php } ?>
					
					<?php if($faculty->organize_conf){?>
					<li><strong>Organized Conf./Seminar</strong> :  <?php echo $faculty->organize_conf; ?></li>
					<?php } ?>
					
					<?php if($faculty->phd_stdn){?>
					<li><strong>No. of Ph.D. Students</strong> :  <?php echo $faculty->phd_stdn; ?></li>
					<?php } ?>
					
					<?php if($faculty->medel){?>
					<li><strong>Medal / Award</strong> :  <?php echo $faculty->medel; ?></li>
					<?php } ?>
					
					<?php if($faculty->hobby){?>
					<li><strong>Research projects</strong> :  <?php echo $faculty->hobby; ?></li>
					<?php } ?>
					
					</ol>  
                    </td>
                  </tr>
				<?php }//end of foreach ?>  
				 			  
                </tbody>
              </table>
            </div>
	<?php 
	} //end of !NULL
	?> 	
	
	
	
	<!--Lab Assistant-->
	
	
	
	<?php
		/*$sql4 = "SELECT * FROM laboratory_staff WHERE dept_id = '" .$dept_id. "'";
		$res4 = mysql_query($sql4);
		if(mysql_num_rows($res4) > 0){*/
		if($lab_staff != NULL){
	?>
	  <h3>Lab Assistant/Attendant</h3>
	  <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      No
                    </th>
                    <th>
                      Member Name
                    </th>
					 <th>
                      Designation
                    </th>
                    <th>
                      Profile Picture
                    </th>                    
                  </tr>
                </thead>
                <tbody>
				<?php
				$n=0;
				foreach($lab_staff as $lab_staf){				
				$n++;
				?>
                  <tr>
                    <td>
                      <?php echo $n; ?>
                    </td>
                    <td><?php echo $lab_staf->name; ?></td>
					 
					 <td><?php echo $lab_staf->designation; ?></td>
					<td align="center"><img src="<?php echo base_url(); ?>labstaff_photo/<?php if($lab_staf->pro_pic){echo $lab_staf->pro_pic;}else{echo "noimage.png";}?>" height="120" width="90">  </td>
                    
                    
                  </tr>
				<?php }//end of foreach ?>  
				 			  
                </tbody>
              </table>
            </div>
	<?php } //end of num rows?> 		
	  		
	<!--Lab Assistant-->  
    </div>
    <!--container end-->


  </body>
</html>