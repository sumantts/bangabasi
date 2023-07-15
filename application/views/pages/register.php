<?php
if(isset($_POST["sub"])){

$pmode = $_POST["pmode"];

if($pmode == 1)
{
	header("location:PayUMoney_PHP_Module/PayUMoney_form.php");
}
else
{
	header("location:chalan.html");
}

}
?>
<!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Registration</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li class="active">Registration</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">

            <form class="form-signin wow fadeInUp" action="" method="post">
                <h2 class="form-signin-heading">Register now</h2>
                <div class="login-wrap">
                    <p>Your personal details</p>
					<input type="text" class="form-control" placeholder="Application Id" autofocus="">
					<input type="text" class="form-control" placeholder="Fees" value="300" readonly="readonly">
                    <input type="text" class="form-control" placeholder="Full Name" autofocus="">
                    
                    <input type="text" class="form-control" placeholder="Email" autofocus="">
                    <input type="text" class="form-control" placeholder="Phone Number" autofocus="">
                    

                    <p> Enter account details below</p>
                    <input type="text" class="form-control" placeholder="User Name" autofocus="">
                    <input type="password" class="form-control" placeholder="Password">
                    <input type="password" class="form-control" placeholder="Re-type Password">
					<p> Select Payment Mode</p>
					<!--<div class="radios">
                        <label class="label_radio col-lg-6 col-sm-6" for="radio">
                            <input id="radio-01" name="pmode" value="1" type="radio"> Online
                        </label>
                        <label class="label_radio col-lg-6 col-sm-6" for="radio">
                            <input id="radio-02" name="pmode" value="2" type="radio"> Offline
                        </label>
                    </div><br />-->
					
					<select class="form-control" style="padding:0px;" name="pmode" id="pmode" onchange="show_hide_pmode(this.value)">
						<option value="">--Select Pay Mode--</option>
						<option value="1">Online</option>
						<option value="2">Offline</option>					
					</select>
					
                    <label class="checkbox">
                        <input type="checkbox" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
                    </label>
                    <input class="btn btn-lg btn-login btn-block" type="submit" value="Submit" name="sub" />

                    <div class="registration">
                        Already Registered ?
                        <a class="" href="?go=login"> Login</a>
                    </div>
                </div>
            </form>

        </div>
     </div>
    <!--container end-->
      
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
<?php ob_end_flush() ?>