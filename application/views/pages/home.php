<!-- Sequence Modern Slider -->
<!-- Insert to your webpage where you want to display the slider -->
<!-- End of body section HTML codes -->
<div class="container">
  <div class="row mar-b-50">
    <div class="col-md-12">
      <!-- service start -->
      <div id="home-services">
        <div class="container">
          <div class="row">
           <div class="col-md-12"> <!--<h2> </h2>--></div><br /><br />

            <div class="col-md-3">
              <div class="h-service" style="height: 400px;">
                <div class="icon-wrap ico-bg round-fifty wow fadeInDown">
                  <!--<i class="fa fa-question"></i>-->
                  <img src="img/__principal_pic.jpg" alt="" width="100" height="100" class="img-circle" style="width: 100px;height: 100px;margin-left: -20px;"> </div>
                <div class="h-service-content wow fadeInUp">
                  <h3> From Principal's Desk</h3>
                  <p style="text-align:justify;"> Welcome to our glorious institution Bangabasi Evening College, 19, Rajkumar ChakrabortySarani, Kolkata - 700009, accredited by National Assessment and Accreditation Council (NAAC) in 2016.
                    This college was established in 1965 under the purview of affiliation to the University of Calcutta as a .....<a href="<?php echo site_url('home/principal_desk'); ?>"> More>></a> </p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="h-service" style="height: 400px;">
                <div class="icon-wrap ico-bg round-fifty wow fadeInDown"> 
				<!--<i class=""> </i>--> 
				<img src="img/bod_icon.png" alt="" width="100" height="100" class="img-circle" style="width: 100px;height: 100px;margin-left: -20px;">
				</div>
                <div class="h-service-content wow fadeInUp">
                  <h3> Statutory Body/Sub Committee</h3>
                  <div class="row" style="text-align:left; padding-left:20px;padding-bottom: 20px;font-size: 15px;">
                    <?php
				/*$sql_stb = "SELECT * FROM stat_body";
				$res_stb = mysql_query($sql_stb);
				while($row_stb = mysql_fetch_array($res_stb)){*/
				?>
                    <div class="col-md-12"><a href="?go=stat-body-mem&id=<?php //echo $row_stb["id"]; ?>">
                      <?php //echo $row_stb["name"]; ?>
                      </a></div>
                    <?php //} ?>
					<div class="col-md-12"><a href="img/grievance_redressal.pdf" target="_blank">Grievance Redressal Sub-Committee</a></div>
<div class="col-md-12"><a href="<?php echo site_url('home/governing_body'); ?>">Governing Body</a></div>
</div>
				  
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="h-service" style="height: 400px;">
                <div class="icon-wrap ico-bg round-fifty wow fadeInDown"> 
				<!--<i class=""> </i>--> 
				<img src="img/learn-icon_orig.png" alt="" width="100" height="100" class="img-circle" style="width: 100px;height: 100px;margin-left: -20px;">
				</div>
                <div class="h-service-content wow fadeInUp">
                  <h3> Students' Corner</h3>
                  <div class="row" style="text-align:left; padding-left:20px;padding-bottom: 20px;font-size: 15px;">
                    <div class="col-md-12"><a href="http://www.bangabasievening.edu.in/assets/pdf/NCC.pdf" target="_blank">NCC</a></div>
                    <div class="col-md-12"><a href="<?php echo site_url('home/nss'); ?>">NSS</a></div>
                    <div class="col-md-12"><a href="img/sexual_harassment_cell.pdf" target="_blank">Gender Sensitization Cell</a></div>
                    <div class="col-md-12"><a href="<?php echo site_url('home/anti_ragging_cell'); ?>">Anti Ragging Cell</a></div>
                     <div class="col-md-12"><a href="http://antiragging.in/" target="_blank">Anti Ragging Cell-UGC</a></div>
                    <div class="col-md-12"><a href="img/Kanyashree_Prakapa_Status.pdf" target="_blank">Kanyashree Prakalpa</a></div>
                    <div class="col-md-12"><a href="img/student_activity.pdf" target="_blank">Student Activities</a></div>
                    <div class="col-md-12"><a href="http://bangabasieveningcollege.in/spm/" target="_blank">Profile Mapping</a></div>
                    <div class="col-md-12"><a href="img/medal_award_statement.pdf" target="_blank">Medals & Awards</a></div>
	            <div class="col-md-12"><a href="img/Students_Aid_Fund.pdf" target="_blank">Scholarship/Concession</a></div>
                    <div class="col-md-12"><a href="http://e-exammantra.com/bec" target="_blank">Practice for Online Competitive Exam</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="h-service" style="height: 400px;">
                <div class="icon-wrap ico-bg round-fifty wow fadeInDown"> 
				<!--<i class=""> </i>--> 
				<img src="img/akademik.png" alt="" width="100" height="100" class="img-circle" style="width: 100px;height: 100px;margin-left: -20px;">
				</div>
                <div class="h-service-content wow fadeInUp">
                  <h3>UG Application Online</h3>
<div class="col-md-12 blink_me"><a href="https://admissionug.in/BangabasiEveningCollege-Admission/" target="_blank">Apply Online for UG Courses</a></div>
                  <div class="row" style="text-align:left; padding-left:20px;padding-bottom: 20px;font-size: 15px;">
                    
                    <div class="col-md-12"><a href="http://beckolkata.org/deptofmath/" target="_blank">Post Graduate</a></div>
                             <div class="col-md-12"><a href="<?php echo site_url('home/subject_code'); ?>">Subject Code</a></div>
                                        
                    <div class="col-md-12"><a href="<?php echo site_url('home/career_oriented_course'); ?>">Career Oriented Course</a></div>
                    <!--<div class="col-md-12">College Fees and Charges</div>
				<div class="col-md-c12">Course Combination</div>-->
				 <div class="col-md-12"><a href="img/support_staff.pdf" target="_blank">Support Staff</a></div>
                   
                                     				
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- service end -->
      <!--feature end-->
    </div>
  </div>
</div>
<div class="hr"> <span class="hr-inner"></span> </div>
