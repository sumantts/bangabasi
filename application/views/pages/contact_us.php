<?php
/*if(isset($_POST["sub"])){
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];

$from = $email;
$to = "info@bangabasievening.edu.in";
$subject = "Mail from contact us";
$headers = "From: $from\r\nReply-To: $from\r\n"."MIME-Version: 1.0\n"."Content-type:text/html;charset=iso-8859-1";
$msg = 'Name: '.$name.'<br />
		Plone No: '.$phone.'<br />
		Message: '.$message;
mail($to,$subject,$msg,$headers);*/
?>
<script type="text/javascript">
//window.open('?go=contact-us&sent=ok','_self');
</script>
<?php
//}
?>
<!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
              Contacts
            </h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                  Home
                </a>
              </li>
              <li class="active">
                Contacts
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->



    <!--container start-->
    <div class="container">


      <div class="row">
        <div class="col-lg-5 col-sm-5 address">
          <section class="contact-infos">
            <h4 class="title custom-font text-black">Bangabasi Evening College</h4>
            <address>
              Address: 19 Rajkumar Chakraborty Sarani<br>
              Kolkata - 700009<br />
	      	  Telephone : 2351 0304 Mobile : +919831476335<br />	
			  Email Id : info@bangabasievening.edu.in
            </address>
          </section>
          <!--<section class="contact-infos">
            <h4 class="title custom-font text-black">
              1st BENGAL BN NCC
            </h4>
            <p>
              157/1 Jodhpur Park
              <br>
              Kolkata - 700 068
              <br>
              Phone : +9133-24730308<br />
			  Email Id : co1bengalbnncc@gmail.com
              <br>
			  <a href="https://www.facebook.com/1bbnncc?__mref=message_bubble" target="_blank">Facebook Page</a>
            </p>
          </section>
          <section class="contact-infos">
            <h4>
              NCC Group HQ (CAL-C)
            </h4>
            <p>
              149G New Alipore<br />
			  Kolkata - 700 053<br />
			
            </p>
			
            </p>

          </section>-->
        </div>
        <div class="col-lg-7 col-sm-7 address">
          <h4>Drop us a line so that we can hear from you</h4>
		  <?php //if($_GET["sent"]){?> <label style="color:#48cfad">Your Email has sent successfully, we will catch you very soon,Thank you. </label> <?php //}?>
		  
          <div class="contact-form">
            <form method="post" action="" name="" id="">
              <div class="form-group">
                <label for="name">
                  Name
                </label>
                <input type="text" placeholder="Name" id="name" name="name" class="form-control" required="required">
              </div>
              <div class="form-group">
                <label for="email">
                  Email
                </label>
                <input type="email" placeholder="Email" id="email" name="email" class="form-control" required="required">
              </div>
              <div class="form-group">
                <label for="phone">
                  Phone
                </label>
                <input type="number" id="phone" name="phone" class="form-control" required="required" maxlength="10">
              </div>
              <div class="form-group">
                <label for="phone">
                  Message
                </label>
                <textarea placeholder="Message" id="message" name="message" rows="5" class="form-control">
                </textarea>
              </div>
              <input class="btn btn-info" type="submit" name="sub" value="Submit">
            </form>

          </div>
        </div>
      </div>

    </div>
    <!--container end-->

    <!--google map start-->
    <div class="contact-map">
      <div id="map-canvas" style="width: 100%; height: 400px">
      </div>
    </div>
  </body>
</html>
