 <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1> Governing Body </h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li> <a href="#"> Home </a> </li> 
			  <li class="active"> Governing Body </li>
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
          if($stat_body != NULL){
            foreach($stat_body as $statbody){
          ?>
                <div class="blog-item" id="notice_<?php echo $statbody->id; ?>">
                  <div class="row">
                    <div class="col-lg-2 col-sm-2">

                    </div>
                  <div class="col-lg-12 col-sm-12">
                      <h1><?php echo $statbody->name;?></h1>
                      <p style="font-size:16px; text-align:justify;"><?php echo $statbody->description;?></p>
                      
                    </div>
                  </div>
            </div>
          <?php 
          }//end foreach
          }//end !NULL block ?>
		</div>
	</div> 
      
      <!--Typography end-->
      <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th> Sl.No </th>
            <th> Name </th>
            <th> Designation </th>
            <th> Profile Picture </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $k = 0;
          if($stat_body_mem != NULL){
          foreach($stat_body_mem as $data){
          $k++;
          ?>
          <tr>
            <td><?php echo $k; ?></td>
            <td><?php echo $data->name; ?></td>
            <td><?php echo $data->designation; ?></td>
            <td align="center"><img src="<?php echo base_url(); ?>bodymem_photo/<?php if($data->pro_pic){echo $data->pro_pic;}else{echo "noimage.png";} ?>" height="120" width="90"></td>
          </tr>
          <?php
          }//end for each
          }//end null
          ?> 			  
        </tbody>
      </table>
    </div>

	  
	  <!-- <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th> Sl.No </th>
            <th> Name </th>
            <th> Designation </th>
            <th> Profile Picture </th>
          </tr>
        </thead>
        <tbody>
          <?php
          /*$k = 0;
          if($allgb != NULL){
          foreach($allgb as $data){
          $k++;*/
          ?>
          <tr>
            <td><?php //echo $k; ?></td>
            <td><?php //echo $data->name; ?></td>
            <td><?php //echo $data->designation; ?></td>
            <td align="center"><img src="<?php //echo base_url(); ?>gb_members/<?php //if($data->profile_picture){echo $data->profile_picture;}else{echo "noimage.png";} ?>" height="120" width="90"></td>
          </tr>
          <?php
          //}//end for each
          //}//end null
          ?> 			  
        </tbody>
      </table>
    </div> -->

	<!--Lab Assistant-->
	  		
	<!--Lab Assistant-->  
    </div>
    <!--container end-->
  </body>
</html>