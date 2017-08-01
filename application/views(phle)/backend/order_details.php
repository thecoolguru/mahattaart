<?php //print_r($invoice_details);

$framer_details=$this->backend_model->get_framer_details($order_data['surface']);        
//print_r($framer_details);
 $framer_details['contact_person_name'];
         ?>

<div>

<div class="invoice-wapp">



<div class="invoice-logo">

<h2><img src="<?=base_url()?>assets/images/wall.gif"  width="140px"/></h2>
<p><i> Framed Art Prints </i></p>

</div>


<div class="invoice-heading">
<!--<h2>INVOICE</h2>-->
</div>



<div class="cl"></div>



<div class="addres">

<div class="invoice-logo">

<p>  Mahatta Media Pvt. Ltd. </br>
 Building No. 17, Street No. 8, </br>
 SarvapriyaVihar, </br>
 New Delhi </br>
 110016  </p>
 

</div>


<div class="invoice-heading">
<p> TIN No :  7936950980   </br>
PAN No.:  AAJCM4673R  </br>
Please do not deduct TDS as there is no liability of TDS  </br>
deduction on Sale of Goods </p>



<p class="invoice-no"> ORDER NO. #[<?=$order_data['order_id']?>] <br />
DATE: [<?=$order_data['created_date']?>]
</p>


</div>

</div>

<div class="cl"></div>





 
 <div class="invoice-tin">

<p> TO: <br /> 
    [<?php echo ucwords($order_data['first_name'].' '.$order_data['last_name'])?>] <br /> 
[<?=$order_data['company_name']?>] <br /> 
[<?=$order_data['address']?>] <br /> 
[<?=$order_data['city']?>, <?=$order_data['state']?> , <?=$order_data['pincode']?>]
</p>

</div>


<div class="invoice-for">
<p> FOR: <br /> 
[Project or service description] <br />
P.O. [Number]
</p>
</div>






<!--table-->
<div>


<table border="1" cellspacing="0" cellpadding="0" class="invoice-order">
  <tr>
    <th width="30"><p>S.No.</p></th>
     <th width="150"><p>Image</p></th>
    <th width="200" colspan="2"><p>Order Details</p></th>
   
    <th width="80" valign="top"><p>Costing/per sq. inch</p></th>
    <th width="94" valign="top"><p align="left">Amount</p></th>
  </tr>
  
  
  <?php
           //print_r($quotation_details);
  $i=1; foreach ($order_details as $details):
      
      $fileName_details=$this->backend_model->get_tbl_search_images_details($details->image_id);
     $rate_details=$this->backend_model->get_rate_details($details->surface);
      //print_r($rate_details);
      //echo $details->rate;
      $product_height=$details->print_size_height+$details->mount_size_width+$details->frame_size_width;
      $product_width=$details->print_size_width+$details->mount_size_width+$details->frame_size_width;//($details->frame_size_width);
      
         $printer_rate= $rate_details['printer_rate'];
         $mount_rate= $rate_details['mount_rate'];
         $framer_rate= $rate_details['framer_rate'];
         $glass_rate= $rate_details['glass_rate'];
         
            $print_price=4+($details->print_size_height*$details->print_size_width)*2;
            $OrgMountHeight = ($details->print_size_height)+($details->mount_size_width)*2 ;
            $OrgMountWidth=   ($details->print_size_width)+($details->mount_size_width)*2 ;
            $OrgMountArea= $OrgMountHeight * $OrgMountWidth;
            $mount_price =   $OrgMountArea * $mount_rate;// rate;
           $OrgFrametRuningArea = $OrgMountHeight+($details->frame_size_width)*2 * $OrgMountWidth+ ($details->frame_size_width*2);
           $frame_price=($OrgFrametRuningArea)/(12)*$framer_rate;//rate 2
       
           
            $mountarea=$details->print_size_height*($details->print_size_width)*2;
            $glass_price=$OrgMountArea+$mountarea*$printer_rate;// rate 2
           
            
         //$print_price=($details->print_size_height*$details->print_size_width)*$printer_rate;
         //$frame_price=$details->frame_size_width*$framer_rate;
         //$mount_price=$OrgMountArea*$mount_rate;
         //$glass_price=$details->mount_size_width*$glass_rate;
         $total+=$print_price+$frame_price+$mount_price+$glass_price;
          $total_tax+=$total*5/100;
          $final_price=$total+$total_tax;
          ?>
  
  <img src="">
  <tr>
    <td width="30" rowspan="16"><p align="center"><?=$i?>.</p></td>
    <td width="150" rowspan="16"><p align="center"><?php echo "<img src='http://www.indiapicture.in/wallsnart/398/".$details->image_id."' hight='250px;' width='200px;'>"?> </p></td>
    
    <td width="100"><p>Image ID</p></td>
    <td width="130" valign="top"><?=$details->image_id?></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
    <td width="94" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="100"><p>Print surface</p></td>
    <td width="130" valign="top"><p><?=$details->surface?></p></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
    <td width="94" rowspan="2" valign="top"><p>&nbsp;</p><p>&#x20B9;.<?php echo number_format((float)$print_price, 2, '.', '')?></p></td>
  </tr>
  <tr>
    <td width="100"><p>Print size</p></td>
    <td width="130" valign="top"><p><?php echo $details->print_size_height.'X'.$details->print_size_width?></p></p></td>
    <td width="80" valign="top"><p><?=$printer_rate?></p></td>
    
  </tr>
  <tr>
    <td width="100"><p>Frame material</p></td>
    <td width="130" valign="top"><p><?=$details->frame_code?></p></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
    <td width="94" rowspan="4" valign="top"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&#x20B9;.<?php echo number_format((float)$frame_price, 2, '.', '')?></p></td>
  </tr>
  <tr>
    <td width="100"><p>Frame color</p></td>
    <td width="130" valign="top"><p><?=$framer_details['color']?></p></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="100"><p>Frame Code</p></td>
    <td width="130" valign="top"><p><?=$details->frame_code?></p></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="100"><p>Frame Size</p></td>
    <td width="130" valign="top"><p><?=$details->frame_size_width?></p></td>
    <td width="80" valign="top"><p><?=$framer_rate?></p></td>
    
  </tr>
  <tr>
    <td width="100"><p>Mount material</p></td>
    <td width="130" valign="top"><p><?=$details->mount_code?></p></td>
    <td width="80" valign="top"><p></p></td>
    <td width="94" rowspan="4" valign="top"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&#x20B9;.<?php echo number_format((float)$mount_price, 2, '.', '')?></p></td>
  </tr>
  <tr>
    <td width="100"><p>Mount code</p></td>
    <td width="130" valign="top"><p><?=$details->mount_code?></p></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="100"><p><?=$details->mount_code?></p></td>
    <td width="130" valign="top"><p>&nbsp;</p></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="100"><p>Mount Size</p></td>
    <td width="130" valign="top"><p><?=$details->mount_size_width?></p></td>
    <td width="80" valign="top"><p><?=$mount_rate;?></p></td>
  </tr>
  <tr>
    <td width="100"><p>Glass Type</p></td>
    <td width="130" valign="top"><p>Write glass type</p></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
    <td width="94" rowspan="2" valign="top"><p>&nbsp;</p><p>&#x20B9;.<?php echo number_format((float)$glass_price, 2, '.', '')?></p></td>
  </tr>
  <tr>
    <td width="100"><p>Glass Size</p></td>
    <td width="130" valign="top"><p><?=$details->mount_size_width?></p></td>
    <td width="80" valign="top"><p><?=$glass_rate?></p></td>
  </tr>
  <tr>
    <td width="100"><p>Product Description</p></td>
    <td width="130" valign="top"><p><?=$fileName_details['images_description']?></p></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
    <td width="94" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="100"><p>Product Size</p></td>
    <td width="130" valign="top"><p><?php echo $product_height.'X'.$product_width;?></p></td>
    <td width="80" valign="top"><p>&nbsp;</p></td>
    <td width="94" valign="top"><p>&nbsp;</p></td>
  </tr>
  
  
  <tr>
  
    <td width="100"><p>No. of items</p></td>
    <td width="292" colspan="3" valign="top"><p><?=count($order_details)?></p></td>
  </tr>
  <?php $i++; endforeach;?>
  <tr>
  
   <td width="30">&nbsp; </td>
   <td width="150">&nbsp; </td>
    <td width="100"><p align="center"><strong>Amount</strong></p></td>
    <td width="209" colspan="2" rowspan="3" valign="top"><p>&nbsp;</p></td>
    <td width="84" valign="top"><p>&#x20B9;.<?php echo number_format((float)$total, 2, '.', '')?></p></td>
  </tr>
  
  
  <tr>
  <td width="30">&nbsp; </td>
   <td width="150">&nbsp; </td>
    <td width="100"><p align="center"><strong>CST/ VAT 5%</strong></p></td>
    <td width="94" valign="top"><p>&#x20B9;.<?php echo number_format((float)$total_tax, 2, '.', '')?></p></td>
  </tr>
  
  <tr>
  <td width="30">&nbsp; </td>
   <td width="150">&nbsp; </td>
    <td width="100"><p align="center"><strong>Final Amount</strong></p></td>
    <td width="84" valign="top"><p><strong>&#x20B9;.<?php echo number_format((float)$final_price, 2, '.', '')?></strong></p></td>
  </tr>




  <tr>
    <td width="500px" colspan="3" valign="top"><p> <strong> Receiver's Authorized Signatory </strong> </p></td>
   <td width="500px" colspan="3" valign="top"><p> <strong> Mahatta Media Pvt. Ltd. Authorized Signatory </strong> </p></td>
  </tr>
  
   <tr rowspan="3">
    <td width="500px" colspan="3" valign="top"><p>&nbsp; <br />&nbsp; </p></td>
   <td width="500px" colspan="3" valign="top"><p>&nbsp; <br /> &nbsp; </p></td> 
    
  </tr>
 
  
  
  
  
  
</table>


<p> Make all checks payable to WallsnArt </p> 
<p> Total due in 15 days. Overdue accounts subject to a service charge of 1% per month. </p> 

<p style="text-align:center; font-weight:bold;">Thank you for your business!</p>


</div>
<!--table-->



</div>

<!---invoice-wapp-->

</div>
<style>.invoice-wapp{ width:70%; padding:0px 15px 10px 15px; margin:0px auto;-webkit-box-shadow: -2px 22px 59px -20px rgba(0,0,0,0.69);
-moz-box-shadow: -2px 22px 59px -20px rgba(0,0,0,0.69);
box-shadow: -2px 22px 59px -20px rgba(0,0,0,0.69); font-family:Arial, Helvetica, sans-serif; font-size:13px;}
.invoice-logo{ float:left; width:50%}
.invoice-heading{ float:left; width:50%; text-align:right;}
.cl{ clear:both;}
.invoice-addres p{ line-height:20px;}
.invoice-logo p , .invoice-logo h2 { margin:0px; padding:0px;}
.invoice-logo p { padding-left:10px;}
.invoice-tin{ float:left; width:50%;}
.invoice-heading p{ margin:0px;}
.invoice-no{ padding:10px 0px;}

.invoice-order{ width:100%; border-collapse:collapse;border-spacing:0;}
.invoice-order th { background-color:#CCC; height:20px;}
.invoice-order p{ padding: 3px 7px;  margin: 0px;}
.invoice-addres {  font-size:15px;}
.invoice-for{ color:#F00;}
.addres{ margin-top:15px;}

</style>