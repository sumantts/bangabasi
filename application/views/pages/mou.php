 <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1> MOU </h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                  Home
                </a>
              </li>
              
              <li class="active">
                MOU
              </li>
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
          
		  
          <h2>MOU</h2>
		  <?php
		  if($downloads != NULL){
		  $k = 0;
		  	foreach($downloads as $download){
			$k++;
		  ?>
		  <a href="<?php echo base_url(); ?>forms/<?php echo $download->file_name;?>" target="_blank"><h3><?php echo $k.'. '.$download->form_name; ?></h3></h3>
		  <?php
		  	}//end foreach 
		  }//end !NULL
		  ?>
        </div>
      </div>
      		
	  		
	<!--Lab Assistant-->  
    </div>
  </body>
</html>