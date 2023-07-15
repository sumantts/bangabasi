<div class="row">
<div class="col-md-1" ></div>
<div class="col-md-8" >
<div id="amazingslider-1" style="display:block;position:relative;margin:16px auto 32px;height:300px;">
	<ul class="amazingslider-slides" style="display:none;">
	<?php
	if($banners != NULL){
	foreach($banners as $banner){
	?>
	<li><img src="images/<?php echo $banner->banner_name; ?>" alt="<?php echo $banner->b_title;?>" data-description="<?php echo $banner->b_desc;?>" /></li>
	
	<?php }
	}
	?>
	</ul>
<ul class="amazingslider-thumbnails" style="display:none;">
	<?php
	if($banners != NULL){
	foreach($banners as $banner_tn){
	?>
	<li><img src="images/<?php echo $banner_tn->banner_name_tn; ?>" /></li>
	<?php }} ?>
</ul>
</div>
</div>
<div class="col-md-2">
<h3 class="text-center">NOTICE</h3>
<div class="width_100 box13"> 

<marquee scrollamount="2" direction="up" style="height:270px;">
<?php
/*$get_notice = "SELECT * FROM noticeboard ORDER BY publish_dt DESC";
$get_notice_res = mysql_query($get_notice);
while($get_notice_row = mysql_fetch_array($get_notice_res))
{*/


		if($allNotices != NULL){
			foreach($allNotices as $allNotice){
		?>

<div class="back-white pad-3 width_100">
<p><img src="img/newpulse_e0.gif" style="height:30px;"><?php echo $allNotice->notice_subject;?></p>
<a href="<?php echo site_url('home/notice'); ?>">Read More</a>
</div>
<?php }} ?>
</marquee>

</div>
<br>
</div>
<div class="col-md-1" ></div>
</div>
