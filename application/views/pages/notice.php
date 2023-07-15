 <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>Notice</h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                  Home
                </a>
              </li>
              
              <li class="active">Notice</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->
<!--container start-->
    <div class="container mar-b-30">

      <!--Typography start-->
      <div class="row">
        <div class="col-lg-12">
		<?php
		if($allNotices != NULL){
			foreach($allNotices as $allNotice){
		?>
          <div class="blog-item" id="notice_<?php echo $allNotice->id; ?>">
            <div class="row">
              <div class="col-lg-2 col-sm-2">
                <div class="date-wrap">
                  <span class="date"><?php echo date('d', strtotime($allNotice->publish_dt)); ?></span>
				  <span class="month"><?php echo date('F', strtotime($allNotice->publish_dt)); ?></span>
                </div>

              </div>
             <div class="col-lg-10 col-sm-10">
                <h1><?php echo $allNotice->notice_subject;?></h1>
                <p style="font-size:16px; text-align:justify;"><?php echo $allNotice->notice;?></p>
                
              </div>
            </div>
			</div>
		<?php 
		}//end foreach
		}//end !NULL block ?>
		</div>
      </div> 
    </div>
	
  </body>
</html>