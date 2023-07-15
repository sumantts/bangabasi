<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <?php include("includes/left-menu.php"); ?>
        <!-- left menu ends -->

        

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <!--<li>
            <a href="#">Home</a>
        </li>-->
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>
<?php
$menu_sql = "SELECT category_id FROM category_details WHERE parent_id != '0'";
$menu_res = mysql_query($menu_sql);
$total_menu = mysql_num_rows($menu_res);

$dt = date('Y-m-d').' 00:00:00';

if($_SESSION["log_id"] == 3)
{
	$bill_sql = "SELECT id FROM billing_summary WHERE created_on >= '" .$dt. "' AND created_by = '" .$_SESSION["log_id"]. "'";
}
else
{
	$bill_sql = "SELECT id FROM billing_summary WHERE created_on >= '" .$dt. "'";
}
$bill_res = mysql_query($bill_sql);
$total_customer = mysql_num_rows($bill_res);

if($_SESSION["log_id"] == 3)
{
	$bill_amt_sql = "SELECT SUM(amount_after_discount) AS totalbill FROM billing_summary WHERE created_on >= '" .$dt. "' AND created_by = '" .$_SESSION["log_id"]. "'";
}
else
{
	$bill_amt_sql = "SELECT SUM(amount_after_discount) AS totalbill FROM billing_summary WHERE created_on >= '" .$dt. "'";
}
$bill_amt_res = mysql_query($bill_amt_sql);
$bill_amt_row = mysql_fetch_array($bill_amt_res);
$total_bill_amt = $bill_amt_row["totalbill"];
?>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-star green"></i>

            <div>Total menu</div>
            <div><?=$total_menu?></div>
            <!--<span class="notification green">4</span>-->
        </a>
    </div>
	
	<div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Today's Customer</div>
            <div><?=$total_customer?></div>
            <!--<span class="notification">6</span>-->
        </a>
    </div>
   
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

            <div>Today's Sales</div>
            <div><?=$total_bill_amt?></div>
            <!--<span class="notification yellow">$34</span>-->
        </a>
    </div>    
</div>

    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->