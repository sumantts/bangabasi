 <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1> statutory Body </h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                  Home
                </a>
              </li>
              
              <li class="active">
                statutory Body 
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
$id = $_GET["id"];
$sql = "SELECT * FROM stat_body WHERE id = '" .$id. "'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);

?>
      <!--Typography start-->
      <div class="row">
        <div class="col-lg-12">
          <h3>About <?=$row["name"]?></h3>
		  <?php if($row["description"] != ""){?>
          <p><?=$row["description"]?></p>
			<?php } ?>
        </div>
      </div>
      <!--Typography end-->
	  <?php
		$sql3 = "SELECT * FROM stat_body_members WHERE stat_body_id = '" .$id. "'";
		$res3 = mysql_query($sql3);
		if(mysql_num_rows($res3) > 0){
	?>
	  <h3>Members</h3>
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
				$m=0;
				while($row3 = mysql_fetch_array($res3)){
				$m++
				?>
                  <tr>
                    <td>
                      <?=$m?>
                    </td>
                    <td><?=$row3["name"]?></td>
                    <td><?=$row3["designation"]?></td>
                    <td align="center">
					<img src="admin/bodymem_photo/<?php if($row3["pro_pic"]){echo $row3["pro_pic"];}else{echo "noimage.png";}?>" height="120" width="90">                    
					 </td>
                  </tr>
				<?php }//end of while ?>  
				 			  
                </tbody>
              </table>
            </div>
	<?php } //end of num rows?> 		
	  		
	  
    </div>
    <!--container end-->
	
<?php include("includes/footer.php");?>	
	<!-- js placed at the end of the document so the pages load faster
<script src="js/jquery.js">
</script>
-->
    <script src="js/jquery-1.8.3.min.js">
    </script>
    <script src="js/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="js/hover-dropdown.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js">
    </script>

    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js">
    </script>
    <script src="js/wow.min.js">
    </script>
    <script src="assets/owlcarousel/owl.carousel.js">
    </script>

    <script src="js/jquery.easing.min.js">
    </script>
    <script src="js/link-hover.js">
    </script>
    <script src="js/superfish.js">
    </script>
    <script type="text/javascript" src="js/parallax-slider/jquery.cslider.js">
    </script>
    <script type="text/javascript">
      $(function() {

        $('#da-slider').cslider({
          autoplay    : true,
          bgincrement : 100
        });

      });
    </script>



    <!--common script for all pages-->
    <script src="js/common-scripts.js">
    </script>

    <script type="text/javascript">
      jQuery(document).ready(function() {


        $('.bxslider1').bxSlider({
          minSlides: 5,
          maxSlides: 6,
          slideWidth: 360,
          slideMargin: 2,
          moveSlides: 1,
          responsive: true,
          nextSelector: '#slider-next',
          prevSelector: '#slider-prev',
          nextText: 'Onward ?',
          prevText: '? Go back'
        });

      });


    </script>


    <script>
      $('a.info').tooltip();

      $(window).load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          start: function(slider) {
            $('body').removeClass('loading');
          }
        });
      });

      $(document).ready(function() {

        $("#owl-demo").owlCarousel({

          items : 4

        });

      });

      jQuery(document).ready(function(){
        jQuery('ul.superfish').superfish();
      });

      new WOW().init();


    </script>
  </body>
</html>