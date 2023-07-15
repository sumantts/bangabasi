 <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>Office Staff</h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                  Home
                </a>
              </li>
              
              <li class="active">
                Office Staff
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
		/*$sql3 = "SELECT * FROM office_staff";
		$res3 = mysql_query($sql3);
		if(mysql_num_rows($res3) > 0){*/
		if($allstaffs != NULL){
	  ?>
	  <h3>Office Staff</h3>
	  <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      No
                    </th>
					 <th>
                      Staff Name
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
				$m=0;
				foreach($allstaffs as $allstaff){
				$m++;
				?>
                  <tr>
                    <td>
                      <?php echo $m; ?>
                    </td>
                    <td><?php echo $allstaff->name; ?></td>
                    <td><?php echo $allstaff->designation; ?></td>
                    <td align="center">
					<img src="<?php echo base_url(); ?>officestaff_photo/<?php if($allstaff->pro_pic){echo $allstaff->pro_pic;}else{echo "noimage.png";}?>" height="120" width="90">                    
					 </td>
                  </tr>
				<?php }//end of while ?>  
				 			  
                </tbody>
              </table>
            </div>
	<?php } //end of num rows?> 		
	  		
	  
    </div>
    <!--container end-->
	
  </body>
</html>