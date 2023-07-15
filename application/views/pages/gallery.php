<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mixitup.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css">


    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Gallery</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Gallery</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


    <div class="container">

        <div class="row">
        <div class="col-md-6">
		<?php
            //echo json_encode($photoes);
            $tag_name_all = '';
            foreach($photoes as $photo){
                $tag_name_n = $photo->tag_name;
                $a = str_replace(" ","_",$tag_name_n);
                $tag_name_all .= $a." ";
                $tag_name_all_n = substr($tag_name_all, 0, -1);
            }

		?>
            <ul id="filters" class="clearfix">
				<li><span class="filter active" data-filter="<?php echo $tag_name_all_n; ?>">All</span></li>
				<?php
                foreach($photoes as $photo){
                    $tag_name = $photo->tag_name;
                    $tag_name1 = str_replace(" ","_",$tag_name);
				?>
                <li><span class="filter active" data-filter="<?php echo $tag_name1;?>"><?php echo $tag_name?></span></li>
                <?php } ?>
            </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mar-b-30">
        <div id="portfoliolist-three">
            <div class="col-md-12">
            <?php
                foreach($photoes as $photo){
                    $tag_name = $photo->tag_name;
                    $tag_name1 = str_replace(" ", "_", $tag_name);
                    $photo_image = explode('|', $photo->photo_name);
                    $count = sizeof($photo_image);
                    
                    foreach($photo_image as $key => $value)
                    {
				?>
			<div class="portfolio <?php echo $tag_name1; ?>" data-cat="<?php echo $tag_name1?>">
                <div class="portfolio-wrapper">
                    <div class="portfolio-hover">
                        <div class="image-caption">
                            <a href="../becadmin/galleryimages/<?php //echo $tag_name1?>/<?php //echo $value?>" class="magnefig label label-info icon" data-toggle="tooltip" data-placement="left" title="Zoom"><i class="fa fa-eye"></i></a> 
                            <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                            <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right" title="Likes"><i class="fa fa-heart"></i></a>

                        </div>
                        <img src="../becadmin/galleryimages/<?php echo $tag_name1?>/<?php echo $value?>" alt="" />

                    </div>
                </div>
            </div>
			<?php }//end of for each
			}//end of foreach 
            ?>


            </div>

        </div>

        </div>
    </div>


    <!--footer start-->
    <?php //include("includes/footer.php");?>
    <!--footer end-->

    <!-- js placed at the end of the document so the pages load faster
    <script src="js/jquery.js"></script> -->
    <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/hover-dropdown.js"></script>
    <script defer src="<?php echo base_url(); ?>js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.parallax-1.1.3.js"></script>
    <script src="<?php echo base_url(); ?>js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/owlcarousel/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>js/mixitup.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>js/link-hover.js"></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>js/common-scripts.js"></script>



    <script src="<?php echo base_url(); ?>js/jquery.magnific-popup.js"></script>

    <script type="text/javascript">
    $('.image-caption a').tooltip();

    $(function () {

        var filterList = {

            init: function () {

                // MixItUp plugin
                // http://mixitup.io
                $('#portfoliolist-three').mixitup({
                    targetSelector: '.portfolio',
                    filterSelector: '.filter',
                    effects: ['fade'],
                    easing: 'snap',
                    // call the hover effect
                    onMixEnd: filterList.hoverEffect()
                });

            },

            hoverEffect: function () {
                $("[rel='tooltip']").tooltip();
                // Simple parallax effect
                $('#portfoliolist-three .portfolio .portfolio-hover').hover(
                function(){
                    $(this).find('.image-caption').slideDown(250); //.fadeIn(250)
                },
                function(){
                    $(this).find('.image-caption').slideUp(250); //.fadeOut(205)
                }
            );
            }

        };

        // Run the show!
        filterList.init();


    });

    $( document ).ready(function() {
       $('.magnefig').each(function(){
            $(this).magnificPopup({
                    type:'image',
                    removalDelay: 300,
                    mainClass: 'mfp-fade'
               })
        });
    });
    </script>

  <script>



      $(document).ready(function() {

        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3],
            stopOnHover : true,

        });

      });

      new WOW().init();


  </script>
 </body>
</html>
