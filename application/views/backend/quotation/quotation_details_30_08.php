<?php //print_r($quotation_details);

$framer_details=$this->backend_model->get_framer_details($invoice_data['surface']);
//print_r($framer_details);
 $framer_details['contact_person_name'];
         ?>
<style>.invoice-wapp{ width:75%; padding:0px 15px 10px 15px; margin:0px auto;-webkit-box-shadow: -2px 22px 59px -20px rgba(0,0,0,0.69);
-moz-box-shadow: -2px 22px 59px -20px rgba(0,0,0,0.69);
box-shadow: -2px 22px 59px -20px rgba(0,0,0,0.69); font-family:Arial, Helvetica, sans-serif; font-size:13px;}
.invoice-logo{ float:left; width:50%}
.invoice-heading{ float:left; width:50%; text-align:right;}
.cl{ clear:both;}
.name{ width:50%; float:left;}
.name p {padding: 5px 0px 5px 10px; margin:0px;}
.name-for{ padding:40px 0px 56px;}
p{font-size: 13px; margin:0px; padding:4px 0px;}
.invoice-logo p , .invoice-logo h2 { margin:0px; padding:0px; line-height: 20px;}
.invoice-logo p { padding-left:10px;}
.invoice-tin{ float:left; width:50%;}
.invoice-heading p{ margin:0px;}
.invoice-no{ padding:10px 0px;}
.invoice-order{ width:100%; border-collapse:collapse;border-spacing:0;}
.invoice-order th { background-color:#CCC; height:20px;}
.invoice-order p{ padding: 3px 7px;  margin: 0px;}
.invoice-addres {  font-size:15px;}
.invoice-for{ color:#F00;}
.addres{ margin-top:13px;}

</style>


<div>

<div class="invoice-wapp">



<div class="invoice-logo">

<h2><img src="<?=base_url()?>assets/images/wall.gif"  width="140px"/></h2>


</div>


<div class="invoice-heading">
<h2>QUOTATION</h2>
</div>



<div class="cl"></div>



<div class="addres">

<div class="invoice-logo">


<p>  Mahatta Media Pvt. Ltd. </br>
 Building No. 17, Street No. 8, </br>
 Sarvapriya Vihar, </br>
 New Delhi </br>
 110016  </p></br>


</div>



<div class="invoice-heading">
<!--<h2>INVOICE</h2>-->
</div>

<div class="cl"></div>

<div class="invoice-logo">


<p> TIN No.: 7936950997 , </p>
<p> PAN No.: AAJCM4673R </p>
<p> Please do not deduct TDS as there is no liability of TDS deduction  <br />
on Sale of Goods </p>



</div>


<div class="invoice-heading">
<p> QUOTATION NO. #[<?=$quotation_details[0]->quotation_id?>] <br /> </p>
<p> DATE: [<?=$quotation_details[0]->created_date?>] </p>
</h2>
</div>

<div class="cl"></div>

<div class="name-for">
<div class="name">
<p> TO: </p>
<p>[<?php echo ucwords($quotation_details[0]->first_name.' '.$quotation_details[0]->last_name)?>] </p>
<p>[<?=$quotation_details[0]->company_name?>] </p>
<p>[<?=$quotation_details[0]->address?>] </p>
<p> [<?=$quotation_details[0]->city?>, <?=$quotation_details[0]->state?> , <?=$quotation_details[0]->pincode?>] </p>
</div>



<div class="for"><p>FOR: </p>
<p> [Project or service description] </p>
<p> P.O. [Number] </p>
</div>
</div>

<div class="cl"></div>

</div>

<div class="cl"></div>



<!--table-->
<div>

  <p>&nbsp;</p>

<table width="100%" border="1" cellpadding="0" cellspacing="0" class="invoice-order">

    <tr>
      <td width="6%"><p align="center"><strong>S.No.</strong></p></td>
      <td width="22%"><p align="center"><strong>Other Details</strong></p></td>
      <td width="12%"><p align="center"><strong>Visual</strong></p></td>
      <td width="8%"><p align="center"><strong>Quantity</strong></p></td>
      <td width="12%"><p><strong>Amount</strong></p></td>
<!--      <td width="7%"><p><strong>Vat(5%)</strong></p></td>
      <td width="13%"><p><strong>Vat Amount</strong></p></td>
      <td width="20%"><p><strong>Total Amount</strong></p></td>-->
    </tr>


	<?php
          // print_r($quotation);
  $i=1; foreach ($quotation as $details):

      $fileName_details=$this->backend_model->get_tbl_search_images_details($details->image_id);
   $frame_details=$this->backend_model->frame_details($details->frame_code,'FRM');
   $mount_details=$this->backend_model->mount_details2($details->mount_code,'MNT');
 $glass_details=$this->backend_model->glass_details($details->glass_code,'GLS');
//print_r($mount_details);
	   $rate_details=$this->backend_model->get_rate_details($details->surface);
	 $frame_rate=$this->backend_model->get_rate_details($details->frame_code);
	 $rate_mount=$this->backend_model->get_rate_details($details->mount_code);
      //print_r($rate_details);
      //echo $details->rate;
      $product_height=$details->print_size_height+$details->mount_size_width+$details->frame_size_width;
      $product_width=$details->print_size_width+$details->mount_size_width+$details->frame_size_width;//($details->frame_size_width);

         $printer_rate= $rate_details['printer_rate'];
         $mount_rate= $rate_mount['mount_rate'];
         $framer_rate= $frame_rate['framer_rate'];
         $glass_rate= $rate_details['glass_rate'];




            $mountarea=$details->print_size_height*($details->print_size_width)*2;
            $glass_price=$OrgMountArea+$mountarea*$printer_rate;// rate 2
           //echo $details->print_type;
          if($details->print_type==1){
              $price=$details->price;

          }elseif($details->print_type==2){
              $price=$details->price;

          }elseif($details->print_type==3){
              $price=$details->price;

          }elseif($details->print_type==4){
              $price=$details->price;

          }elseif($details->print_type==5){
              $price=$details->price;

          }elseif($details->print_type==6){
              $price=$details->price;

          }
         // echo $price;

              $total+=$price;

          $data_split= split('/',$details->image_id);

         if($data_split[0]=='images')
         {
		    $fileName=$data_split[2];
             $image_url=base_url().$details->image_id;
         }else {
              $fileName=$details->image_id;
             $image_url="http://www.indiapicture.in/wallsnart/398/".$details->image_id."";
         }
          ?>
    <tr>
      <td width="6%"><p align="right"><?=$i?></p></td>
      <td width="22%" valign="top"><p><?php echo strtoupper($fileName);?><br />
      Print Details: <?=$details->surface?>&nbsp;<?php echo $details->print_size_height.'X'.$details->print_size_width?>  <br />
      Frame Details: <?=$frame_details['frame_name']?>/&#x20B9;.<?=$frame_details['frame_rate']?>/Material/<?=$frame_details['frame_color']?>/<?=$details->frame_size_width?>/&nbsp;<br />
    Mount Details: <?=$mount_details['mount_name']?>/Material/<?=$mount_details['frame_rate']?>/<?=$mount_details['mount_color']?>/<?=$details->mount_size_width?><br />
      Glass Details: <?=$details->mount_size_width?>/<?=$glass_rate?>/ Final Item <br />
      Size :    <?php echo $details->print_size_height.'X'.$details->print_size_width?>/</p>

      </td>
      <td width="12%" valign="top"><p><?php echo "<img src='".$image_url."' hight='250px;' width='200px;'>"?></p></td>
      <td width="8%"><p><?='1';?></p></td>
      <td width="12%"><p>&#x20B9;.<?php echo number_format((float)$details->price, 2, '.', '')?></p></td>
<!--      <td width="7%" nowrap="nowrap" valign="moddle"><p><?='5';?></p></td>
      <td width="13%"><p>&#x20B9;.<?php  echo number_format((float)$tax, 2, '.', '')?></p></td>
      <td width="20%"><p>&#x20B9;.<?php
      echo number_format((float)$afterTax, 2, '.', '')?></p></td>-->
    </tr>
	<?php  $i++; endforeach;

        $extra_charges=$details->courier_charge+$details->packing_charge;
              $total_price=$extra_charges+$total;

         if($details->discount!=0)
         {
          $discount_val= $total_price*$details->discount/100;
           $final_amount=$total_price-$discount_val;
         }elseif($details->discount==0){
          $final_amount=$total_price;
         }

         $tax_1=$final_amount*5/100;
          $grand_total=$tax_1+$final_amount;

        ?>



    <tr>
        <td nowrap="nowrap" colspan="8" valign="bottom"><p align="right" style="font:bold;">Packaging Charge&nbsp; &#x20B9; <?php  echo  number_format((float)$details->packing_charge, 2, '.', '')?>/-</p></td>
    </tr>
    <tr>
        <td nowrap="nowrap" colspan="8" valign="bottom"><p align="right" style="font:bold;">Courier Charge&nbsp; &#x20B9; <?php  echo  number_format((float)$details->courier_charge, 2, '.', '')?>/-</p></td>
    </tr>

    <tr>
        <td nowrap="nowrap" colspan="8" valign="bottom"><p align="right" style="font:bold;">Total&nbsp; &#x20B9; <?php  echo  number_format((float)$total_price, 2, '.', '')?>/-</p></td>
    </tr>
     <?php   if($details->discount!=0)
         {?>

    <tr>
        <td nowrap="nowrap" colspan="8" valign="bottom"><p align="right" style="font:bold;">Discount&nbsp; &#x20B9; <?php  echo  number_format((float)$discount_val, 2, '.', '')?>/-</p></td>
    </tr>

    <tr>
        <td nowrap="nowrap" colspan="8" valign="bottom"><p align="right" style="font:bold;">After Discount&nbsp; &#x20B9; <?php  echo  number_format((float)$final_amount, 2, '.', '')?>/-</p></td>
    </tr>
    <?php } ?>
      <tr>
        <td nowrap="nowrap" colspan="8" valign="bottom"><p align="right" style="font:bold;">Total Tax&nbsp; &#x20B9; <?php  echo  number_format((float)$tax_1, 2, '.', '')?>/-</p></td>
    </tr>
    <tr>
        <td nowrap="nowrap" colspan="8" valign="bottom"><p align="right" style="font:bold;"><strong>Final TOTAL&nbsp; &#x20B9; <?php  echo number_format((float)$grand_total, 2, '.', '')?>/-</strong></p></td>
    </tr>
  </table>








  <br />
<p>DECLARATION</p>


<p><?=$fileName_details['images_description']?> </p>

<br />

<p>SUPPORT</p>


<p> For any help with your order, feel free to call our customer care at +91 011 41828396 (10.30 AM – 6.30 PM) or email us at  </p>


<p> <a href="mailto:info@wallsnart.com"> info@wallsnart.com. </a>   </p>



<br />

<p> THIS IS A COMPUTER GENERATED INVOICE AND DOES NOT REQUIRE SIGNATURE </p>
<p> Thank you for your business! </p>



</div>
<!--table-->



</div>

<!---invoice-wapp-->

</div>
