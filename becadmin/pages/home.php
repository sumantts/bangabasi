<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <?php include("includes/left-menu.php"); ?>
        <!-- left menu ends -->
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
</div>
<div class=" row">
<?php
$students = "SELECT COUNT(user_id) AS totalstudent FROM users WHERE user_status = '3'";
$rs = mysqli_query($mysqli, $students);
$rw = mysqli_fetch_array($rs);
$mysqli -> close();
?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total Students</div>
            <div><?=$rw["totalstudent"]?></div>
            <!--<span class="notification">6</span>-->
        </a>
    </div>
<?php
$students = "SELECT COUNT(user_id) AS totalteacher FROM users WHERE user_status = '2'";
$rs = mysqli_query($mysqli, $students);
$rw = mysqli_fetch_array($rs);
?>
	 <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>
            <div>Total Teachers</div>
            <div><?=$rw["totalteacher"]?></div>
            <!--<span class="notification">6</span>-->
        </a>
    </div>
<?php
$students = "SELECT COUNT(course_id) AS totalcourse FROM courses";
$rs = mysqli_query($mysqli, $students);
$rw = mysqli_fetch_array($rs);
?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-star green"></i>
            <div>Total Courses</div>
            <div><?=$rw["totalcourse"]?></div>
            <!--<span class="notification green">4</span>-->
        </a>
    </div>
<?php
$students = "SELECT COUNT(tv_id) AS totaltv FROM teachers_video";
$rs = mysqli_query($mysqli, $students);
$rw = mysqli_fetch_array($rs);
?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="#">
            <i class="glyphicon glyphicon-film"></i>
            <div>Teachers Video</div>
            <div><?=$rw["totaltv"]?></div>
            <!--<span class="notification yellow">$34</span>-->
        </a>
    </div>
<?php
$students = "SELECT COUNT(assignment_id) AS totaassignment FROM assignment";
$rs = mysqli_query($mysqli, $students);
$rw = mysqli_fetch_array($rs);
?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
            <i class="glyphicon glyphicon-folder-open"></i>
            <div>Assignments</div>
            <div><?=$rw["totaassignment"]?></div>
            <!--<span class="notification red">12</span>-->
        </a>
    </div>
</div>

    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->