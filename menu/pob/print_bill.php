<?php include("includes/dbconfig.php");?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=<charset>" />
<title>Receipt</title>
</head>
<style type="text/css">

    BODY, TD
    {
      background-color: #ffffff;
      color: #000000;
      font-family:Verdana, Arial, Helvetica, sans-serif;
      font-size: 10px;
      line-height:160%;
      
    }

  </style>
<script>print();</script>
<body>
<?php
$tran_id = $_GET["tran_id"];
$bill_detail_sql = "SELECT * FROM billing_details WHERE tran_id = '" .$tran_id. "'";
$bill_detail_res = mysql_query($bill_detail_sql);

$bill_sumry_sql = "SELECT * FROM billing_summary WHERE tran_id = '" .$tran_id. "'";
$bill_sumry_res = mysql_query($bill_sumry_sql);
$bill_sumry_row = mysql_fetch_array($bill_sumry_res);
$net_payable = $bill_sumry_row["net_payable"];
$cgst_val = $bill_sumry_row["cgst_val"];
$sgst_val = $bill_sumry_row["sgst_val"];
$discount_percent = $bill_sumry_row["discount_percent"];
$amount_after_discount = $bill_sumry_row["amount_after_discount"];
$tran_id= $bill_sumry_row["tran_id"];

$created_on = $bill_sumry_row["created_on"];
$table_no = $bill_sumry_row["table_no"];
?>
<table>
  <tr>
    <td><table border="0" width="100%">
        <tr>
          <td align="center"><nobr>
            <?=$sitename?>
            </nobr><br>
            Multi Cuisine Restaurant<br>
            Cum<br>
            Hookha & Moktail Bar<br>
            Address:3+4 Kashinath Chatterjee Lane<br>
            1<sup>st</sup>. Floor,Howrah-711 102 <br>
            Opp. Mandirtala Taxi Stand<br>
            Website:-www.piratesofbengal.in<br>
			GST Reg. No. : 19AAQFG3377C3Z3<br>
            Timing-12-30 P.M to 10-30 P.M<br>
            Call Us:- 9831499915<br>
            Tran Id:
            <?=$tran_id?>
            
            <br>
            Table No:<?=$table_no?>
            <br>
            Date/Time:<?=date('d-m-Y h:i A', strtotime($created_on))?><br>
            <b>Free Home Delivery 250/- Above</b>
            <!--Service Tax No: 0000<br>
			   VAT No: 0000<br>
			   CIN No: 0000<br>
			   TIN: 1234-->
          </td>
        </tr>
        <!-- <tr>
              <td align="center"><nobr><date>08:50pm <time></nobr></td>
            </tr>
            <tr>
              <td align="center"><nobr>Tournament Director: <salesperson></nobr></td>
            </tr>
            <tr>
              <td align="center"><nobr>ticket n. <receiptnumber></nobr></td>
            </tr>
            <tr>
              <td align="center"><nobr><eventname></nobr></td>
            </tr>-->
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <th align="left"><nobr>Product</nobr></th>
          <th align="left"><nobr>Quantity </nobr></th>
          <th align="left"><nobr>Price</nobr></th>
          <th align="right"><nobr>Total</nobr></th>
        </tr>
        <?php
		  while($bill_detail_row = mysql_fetch_array($bill_detail_res)){
		  $category_id = $bill_detail_row["category_id"];
		  $quantity = $bill_detail_row["quantity"];
		  $unit_price = $bill_detail_row["unit_price"];
		  $price = round($bill_detail_row["price"]);
		  
		  $cat_nam_sql = "SELECT category_name FROM category_details WHERE category_id = '" .$category_id. "'";
		  $cat_nam_res = mysql_query($cat_nam_sql);
		  $cat_nam_row = mysql_fetch_array($cat_nam_res);
		  $category_name = $cat_nam_row["category_name"];
		  ?>
        <tr>
<?php if(strlen($category_name) > 30){ ?>
          <td align="left" style="style="width:300px;font-size: 12px;"><nobr style="font-size: smaller;font-size: 12px;word-wrap: break-word;white-space: normal;">
<?php } else{?>
<td align="left" style="style="width:300px;font-size: 12px;"><nobr style="font-size: smaller;font-size: 12px;">
<?php } ?>
<?php //echo strlen($category_name);?>
            <?=$category_name?>
            </nobr></td>
          <td align="right"><?=$quantity?></td>
          <td align="right"><?=$unit_price?></td>
          <td align="right"><?=$price?></td>
        </tr>
        <?php } ?>
        <tr>
          <td align="left" colspan="3" style="border-top:1px dotted #000000"><nobr>Total:</nobr></td>
          <td align="right" style="border-top:1px dotted #000000"><?=$net_payable?></td>
        </tr>
		<tr>
          <td align="left" colspan="3" style="border-top:1px dotted #000000"><nobr>Discount (<?=$discount_percent?>%):</nobr></td>
          <td align="right" style="border-top:1px dotted #000000"><?php echo ($net_payable - $amount_after_discount); ?></td>
        </tr>
        <?php if($cgst_val > 0){ ?>
		<tr>
          <td align="left" colspan="3" style="border-top:1px dotted #000000"><nobr>CGST (2.5%):</nobr></td>
          <td align="right" style="border-top:1px dotted #000000"><?php echo $cgst_val; ?></td>
        </tr>
        <?php } ?>
		<?php if($sgst_val > 0){ ?>
		<tr>
          <td align="left" colspan="3" style="border-top:1px dotted #000000"><nobr>SGST (2.5%):</nobr></td>
          <td align="right" style="border-top:1px dotted #000000"><?php echo $sgst_val; ?></td>
        </tr>
        <?php } ?>
		<tr>
          <td align="left" colspan="3" style="border-top:1px dotted #000000"><nobr>Net Payable<!--(<small>including VAT & Service Tax.</small>)-->:</nobr></td>
          <td align="right" style="border-top:1px dotted #000000"><?php echo ($amount_after_discount + $cgst_val + $sgst_val); ?></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center">Thank You<br>
            Visit Again</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
