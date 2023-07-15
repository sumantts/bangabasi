<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
                <?php include("includes/left-menu.php"); ?>

        <!-- left menu ends -->

        

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="?go=home">Home</a>
            </li>
			<li>
                <a href="#"> Bill Summary</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
	
	
	
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Bill Summary</h2>

        <div class="box-icon">
            
        </div>
    </div>
    <div class="box-content">
    <?php if($_GET["d"] == "1"){?><div class="alert alert-info"> Bill Deleted Successfully</div><?php } ?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Sl#</th>
        <th>Transaction Id</th>
		<th>Table Name/No</th>
		<th>Created By</th>
		<th style="text-align:center">Net Amount</th>
		<th style="text-align:center">Discount(in %)</th>
		<th style="text-align:center">CGST<br />(2.5%)</th>
		<th style="text-align:center">SGST<br />(2.5%)</th>
		<th style="text-align:center">Net Payable</th>
		<th>Created On</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php
	if($created_by == 3)
	{
		$sql = "SELECT * FROM billing_summary WHERE created_by = '" .$created_by. "' ORDER BY created_on DESC";
	}
	else
	{
		$sql = "SELECT * FROM billing_summary ORDER BY created_on DESC";
	}
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res))
	{
	$i++;
	
	?>
    <tr>
        <td><?=$i?></td>
		<td> <?=$row["tran_id"]?> </td>
		<td> <?=$row["table_no"]?> </td>
		<td>
		<?php
		$created_by1 = $row["created_by"];
		if($created_by1 == 3){?>Frontend <?php }else{?>Backend <?php } ?>User
		</td>
		<td style="text-align:right"> <?=$row["net_payable"]?></td>
		<td style="text-align:right"> <?=$row["discount_percent"]?> % = <?php echo ($row["net_payable"] - $row["amount_after_discount"]);?></td>
		<td style="text-align:right"><?php echo $cgstval = $row["cgst_val"]; ?></td>
		<td style="text-align:right"><?php echo $sgstval = $row["sgst_val"]; ?></td>
		<td style="text-align:right"> <?php echo ($row["amount_after_discount"] + $cgstval + $sgstval); ?></td>
		<td style="text-align:right"> <?=date('d-M-Y H:i:s A', strtotime($row["created_on"]))?></td>
		<td class="center">
           
			<a class="" target="_blank" href="/pob/print_bill.php?tran_id=<?=$row["tran_id"]?>">
                <i class="glyphicon glyphicon-print icon-white"></i></a>

                        <a class="" href="javascript:void(0);" onclick="if(confirm('Are you sure to delete?')){window.location.href='?go=bill-summary&del_tran_id=<?=$row["tran_id"]?>'}">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            </a>
        </td>
    </tr>
	<?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->


    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    
    <!-- Ad ends -->
<?php
if(isset($_GET["del_tran_id"])){
	$del_tran_id = $_GET["del_tran_id"];
	$sql = "DELETE FROM billing_summary WHERE tran_id = '" .$del_tran_id. "'";
	mysql_query($sql);
	?>
	<script type="text/javascript">
		window.location.href='?go=bill-summary'
	</script>
	<?php
}
?>	
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>