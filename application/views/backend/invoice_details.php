<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link href="<?php print base_url();?>assets/css/responsive-code.css" rel="stylesheet" type="text/css" />

<style>
body {
	font-family: Arial, Helvetica, sans-serif!important;}

ul.hz_menu {
	font-size: 13px;
	list-style-type: none;
	margin-left: 0;
	padding-left: 0;
	color: #7F8C8D;
}
.content_box {
	border: 1px #ddd solid;
	margin-bottom:40px
}

.table > thead.cf > tr > th{vertical-align:text-top}
</style>
</head>
<body>

<div class="container">
	<div class="row">
        <div class="col-md-12">
          <span> <strong>ORIGINAL FOR RECIPIENT</strong> </span>
        </div>
    </div>
    
    <div class="content_box">
        <div class="row">
        	<div class="col-md-12">
            	<h4 class="text-center" style="line-height: 1.6;margin: 0;border-bottom: 1px #ddd solid;">TAX INVOICE</h4>
            </div>
            <div class="col-md-3 col-sm-3">
            	<a href="#" style="display:block; padding: 12px 0 12px 20px;position: relative;"> <img src="<?=base_url()?>assets/img/one.png" class="img-responsive" width="" style="margin:0 auto" /> </a>
            </div>
			<?php  
	
		?>
            <div class="col-md-9 col-sm-9">
                <ul class="hz_menu pull-right" style="padding-right:20px">
                    <li> <strong>Invoice No. :</strong> <span><?=$invoice_details[0]->invoice_id?> </span> </li>
                    <li> <strong>Date :</strong> <span><?=$invoice_details[0]->created_date?> </span> </li>
                    <li> <strong>GSTIN :</strong> <span> <?=$order_details[0]->gst_no?> </span> </li>
                </ul>
            </div>
        </div>
        <div class="row">  
        	<div class="col-md-12">
            	<h4 class="text-center" style="background-color: #ddd;line-height: 1.6;margin: 0;">Customer Details</h4>
            </div>
			<?php //print_r($order_details); ?>
            <div class="col-md-12">
            	<div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="features-table features-table-left">
                            <ul>
                              <h1>Billed To</h1>
                              <li>Customer GST No. : <span class=""><?=$order_details[0]->gst_no?></span></li>
                              <li>Company Name: <span class=""><?=$order_details[0]->company_name?></span></li>
                              <li>Contact Person: <span class=""><?=$order_details[0]->delivery_name?></span></li>
                              <li>Address: <span class=""></span><?=$order_details[0]->delivery_address?></li>
                              <li>Place of Supply : <span class=""><?=$order_details[0]->delivery_state?></span></li>
                              <li style="border-bottom:1px solid #ddd">Contact Details: <span class=""></span></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="features-table features-table-right" style="border-left:1px solid #ddd; min-height:170px">
                            <ul>
                              <h1>Shipped To <span class=""></span></h1>
                              <li>Company Name: <span class=""></span></li>
                              <li>Contact Person: <span class=""><?=$order_details[0]->customer_name?></span></li>
                              <li>Address: <span class=""><?=$order_details[0]->customer_address?></span></li>
                              <li>State: <span class=""><?=$order_details[0]->customer_state?></span></li>
                              <li style="border-bottom:1px solid #ddd">Contact Details: <span class=""><?=$order_details[0]->customer_contact?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <div class="row">
        	<div class="col-md-12">
	            <hr style="margin:0;">
            	<ul class="hz_menu">
                    <li> <strong>Pan No. Is : </strong> <span><?=$order_details[0]->pan_no?></span> </li>
                    <li> <strong>Please do not deduct TDS as there is no liability of TDS deduction on Sale of Goods.</strong></li>
                </ul>
            </div>
            <div class="col-md-12" style="margin-bottom:10px">
            	<div id="no-more-tables">
                    <table class="table table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                            <tr class="ver_top">
                                <th rowspan="2">Sr. No.</th>
                                <th rowspan="2">Description of Product</th>
                                <th rowspan="2">HSN Code</th>
                                <th rowspan="2">Size(Inch)</th>
                                <th rowspan="2">Qty</th>
                                <th rowspan="2">Rate/Per</th>
                                <th rowspan="2">Amount</th>
                                <th rowspan="2">Discount rate(%)</th>
                                <th rowspan="2">Less: Discount</th>
                                <th rowspan="2">Taxable Value</th>
                                <th colspan="2">CGST</th>
                                <th colspan="2">SGST</th>
                                <th colspan="2">IGST</th>
                                <th>Total Amount</th>
                            </tr>
                            <tr>
                                <th>Rate</th>
                                <th>Amount.</th>
                                <th>Rate</th>
                                <th>Amount.</th>
                                <th>Rate</th>
                                <th>Amount.</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						//print_r($order_details);
						//print_r($invoice_details);
						//echo count($invoice_details[0]->invoice_id).'sajid';
						$sr=1;$total_cgst=$total_sgst=$total_igst=$total_price=0;
						foreach($invoice_details as $invoice_d){
						//echo $invoice_d->invoice_id.'ok';
						$total_cgst=$total_cgst+$invoice_d->tax_amt_cgst;
						$total_sgst=$total_sgst+$invoice_d->tax_amt_sgst;
						$total_igst=$total_igst+$invoice_d->tax_amt_igst;
						$total_price=$total_price+$invoice_d->grand_price;
						
						?>
                            <tr>
                                <td data-title="Sr. No"><?=$sr?></td>
                                <td data-title="Description of Product">1</td>
                                <td data-title="HSN Code"><?=$invoice_d->hsn_code?></td>
                                <td data-title="Size(Inch)"><?=$invoice_d->image_size?></td>
                                <td data-title="Qty"><?=$invoice_d->qty?></td>
                                <td data-title="Rate/Per"><?=round($invoice_d->grand_price/$invoice_d->qty,2)?></td>
                                <td data-title="Amount"><?=$invoice_d->price?></td>
                                <td data-title="Discount rate(%)"></td>
                                <td data-title="Less: Discount"></td>
                                <td data-title="Taxable Value"><?=$invoice_d->price?></td>
                                <td data-title="Rate"><?=$invoice_d->tax_cgst?></td>
                                <td data-title="Amount."><?=$invoice_d->tax_amt_cgst?></td>
                                <td data-title="Rate"><?=$invoice_d->tax_sgst?></td>
                                <td data-title="Amount."><?=$invoice_d->tax_amt_sgst?></td>
                                <td data-title="Rate"><?=$invoice_d->tax_igst?></td>
                                <td data-title="Amount."><?=$invoice_d->tax_amt_igst?></td>
                                <td data-title="Total Amount"><?=$invoice_d->grand_price?></td>
                            </tr>
							<?php $sr++;}?>
                        </tbody>
                    </table>
		        </div>
            </div>
			<?php  $total_price_word=$this->backend_model->change_amount_into_word(round($total_price));                       //print_r($total_price_word);
							?>
            <div class="col-md-8 col-sm-8">
            	<span style="border-top:1px #ddd solid; border-right:1px #ddd solid; border-bottom:1px #ddd solid; display:block; min-height:60px"><strong>Total Invoice Amount in words : </strong><br><?php  echo ucwords($total_price_word).' Rupees Only.'; ?> </span>
                <div id="bk_box">
                    <div class="row">
                      <div class="col-sm-4 col-md-4 col-xs-12">
                          <div class="features-table">
                              <ul>
                                  <li style="margin-bottom:20px">Bank Name :<span></span></li>
                                  <li>Bank Account No. :</li>
                                  <li>IFSC Code :</li>
                              </ul>
                          </div>
                      </div>                    
                      <div class="col-sm-8 col-md-8 col-xs-12">
                        <div class="features-table">
                            <ul>
                              <li style="margin-bottom:20px"><strong>HDFC BANK LTD.</strong></li>
                              <li><strong>00322000017670</strong></li>
                              <li><strong>HDFC0004026</strong></li>
                            </ul>
                        </div>
                </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
            	<div>
                    <table class="table table-bordered table-condensed cf" style="margin-bottom:0">
                        <thead>
                            <tr>
                                <th>Total Amount Before Tax</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-title="">Total CGST</td>
                                <td data-title=""><?=round($total_cgst,2)?></td>
                            </tr>
                            <tr>
                                <td data-title="">Total SGST</td>
                                <td data-title=""><?=round($total_sgst,2)?></td>
                            </tr>
                            <tr>
                                <td data-title="">Total IGST</td>
                                <td data-title=""><?=round($total_igst,2)?></td>
                            </tr>
							<?php 
							$decimal_round_price=round($total_price,2);
							$seprate_price=explode('.',$decimal_round_price);
							//print_r($seprate_price);
							
							if($total_price<1000){
							$shipping_charge=100;
							}else{ $shipping_charge=0;   }
							?>
                            <tr>
                                <td data-title="">Shipping Charges</td>
                                <td data-title=""><?=$shipping_charge?></td>
                            </tr>
                            <tr>
                                <td data-title="">Round off(-)</td>
                                <td data-title=""><?=$seprate_price[1]?></td>
                            </tr>
                            <tr>
							
                                <td data-title="">Grand Total</td>
                                <td data-title=""><?=round($total_price)?></td>
                            </tr>
                            <tr style="height: 60px;">
                                <td data-title="" colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
		        </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div style="border-top:1px #ddd solid;min-height:100px;">
                    <div class="row">
                      <div class="col-sm-8 col-8 col-xs-12">
                          <div class="features-table">
                              <ul>
                                  <li>Make all checks payable to <strong>MAHATTA MULTIMEDIA PVT LTD.</strong> </li>
                                  <li>If you have any questions concerning this invoice, contact Deeksha Sharma </li>
                                  <li><a href="#" style="color:#000">deeksha@mahattaart.com, +91-9871030114</a></li>
                              </ul>
                          </div>
                      </div>                    
                      <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="features-table">
                            <ul>
                              <li class="text-center"><strong> For Mahatta Multimedia Pvt. Ltd.</strong></li>
                            </ul>
                        </div>
                </div>
                    </div>
                    <div class="row" style="margin-bottom: 40px;">
                      <div class="col-sm-8 col-8 col-xs-12">
                          <div class="features-table">
                              <ul>
                                  <li><strong><h4 style="font-style:italic">THANK YOU FOR YOUR BUSINESS!</h4></strong></li>
                              </ul>
                          </div>
                      </div>                    
                      <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="features-table">
                            <ul>
                              <li class="text-center"><strong>Authorised Signatory</strong></li>
                              <li class="text-right" style="padding-right:20px">E&OE</li>
                            </ul>
                        </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.features_table h1{
    font-size:25px !important;
	
}
li{
    list-style:none;
    }
.features-table li {
	font-size: 12px;
	padding: 2px 0;
}
.features-table-left li {
	border-top:1px solid #ddd;
	border-right:1px solid #ddd;
}
.features-table-right li {
	border-top:1px solid #ddd;
}

.features-table-free li, .features-table-paid li {
    background: #efefef none repeat scroll 0 0;
    border-bottom: 2px solid #d4d4d4;
	text-align:center;
    padding: 16.4px 21px;
	cursor:pointer;
}
.features-table-free h1, .features-table-paid h1 {
    text-align: center;
}
.features-table-free li:hover, .features-table-paid li:hover {
    background: #dedede none repeat scroll 0 0;
	-webkit-transition: all .35s;
    -moz-transition: all .35s;
    transition: all .35s;
}
.features_table h1 {
    font-size: 14px !important;
}
.features-table h1, .features-table-free h1, .features-table-paid h1 {
	margin: 0;
	font-size:14px
}
.features-table-free li {
    border-right: 2px solid #d4d4d4;
}

.fa.fa-check {
    color: #2cc14f;
}
.fa.fa-times {
    color: #BA5340;
}
.fa{
	font-size:30px;
}
ul{
	padding:0;
	margin-bottom:0;
}
#bk_box {
	border-top: 1px #ddd solid;
	border-right: 1px #ddd solid;
	display: block;
	min-height: 204px;
	margin-top: 15px;
}
</style>


<style>
@media only screen and (max-width: 767px) {
    
    /* Force table to not be like tables anymore */
	#no-more-tables table, 
	#no-more-tables thead, 
	#no-more-tables tbody, 
	#no-more-tables th, 
	#no-more-tables td, 
	#no-more-tables tr { 
		display: block; 
	}
 
	/* Hide table headers (but not display: none;, for accessibility) */
	#no-more-tables thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
 
	#no-more-tables tr { border: 1px solid #ccc; }
 
	#no-more-tables td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
		white-space: normal;
		text-align:left;
	}
 
	#no-more-tables td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		text-align:left;
		font-weight: bold;
	}
 
	/*
	Label the data
	*/
	#no-more-tables td:before { content: attr(data-title); }
}
@media (min-width: 768px) and (max-width: 991px) {
	#no-more-tables {
		overflow-x: scroll;
	}
	#bk_box {
		min-height: 224px;
	}
}
@media (min-width: 992px) and (max-width: 1199px) {
	#no-more-tables {
		overflow-x: scroll;
	}
}
@media (min-width: 1200px) {
	#no-more-tables {
		overflow-x: scroll;
	}
}
</style>
</body>
</html>
