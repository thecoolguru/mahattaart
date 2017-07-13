<?php $surface_framer=$this->backend_model->get_framer_surface('FRM');$framer_width=$this->backend_model->get_framer_width('FRM');$surface_mount=$this->backend_model->get_framer_surface('MNT');$surface_glass=$this->backend_model->get_framer_surface('GLS');?>

<html>

    <head>

<title>Create Quotation</title>

<link href="<?php echo base_url()?>assets/css/jquery-ui-1.10.4.custom.css" rel="stylesheet">

<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>

<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.custom.js"></script>

<script src="<?php echo base_url()?>assets/js/common.js"></script>

<style>

.txtbox_f {    width: 61px;    height: 30px;}

.txtbox_f_offline{ width: 61px;    height: 30px;}

.txtbox_f_online{ width: 61px;    height: 30px;}

.s_custom{padding-left: 56px; }

.s_list{padding-left: 56px; }

</style>







<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/anylinkmenu.css" />

<script type="text/javascript" src="<?=base_url()?>assets/js/menucontents.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/js/anylinkmenu.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>

<script src="<?=base_url()?>assets/js/jquery.min2.js"></script>

<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

<script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>

</head>

    <body>

<div id="middle-wrapper">

      <div id="middle-container" style=" width:100%;">

    <div class="main-hdr-quotation text-center"> Update Web Price</div>

    <style>

.manage-order .creat-ordertable tr td{ padding:8px 1px 8px 1px !important;} .hdrs td:nth-child(2) { width:100px;}

</style>

    <div id="quotationListDiv" class="manage-order" >

          <form  name="create_quotation" action="<?=base_url()?>index.php/backend/save_web_price" method="post"  enctype="multipart/form-data">

        <b  style=" font-size: 14px; color: green;">

            <?php if($msg<>'') {?>

            <script>              setTimeout(function(){outtime()},3000);

            function outtime(){                  window.location.href="view_quotations/";              }           </script>

            <?php echo $msg;}?></b><br>

        <br>

		

		

		

		

        <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">

              <tr  class="darktr"><?php //print_r($row_id);?>

            <td width="40%" class="bold">Paper:<?php //print_r($row_id);?></td>

            <td width="60%"><?php   //  $uniqueNo =mt_rand();    $uniqueNo=sprintf('%03d',$uniqueNo);    ECHO $QuotationN0='WNS'.$uniqueNo;        ?>

                  <input type="text" id="product_id"   name="paper" value="<?=$row_id[0]->paper;?>">

				  <input type="hidden" id="product_id"   name="row_id" value="<?=$row_id[0]->id;?>">

                </td>

          </tr>

            

            

          

          

          

            

		  

		 

								   

        </table>  

		

	

		  

<div class="viewcplist-inner">

                <div id='TextBoxesGroup_custom'>

                                        <div id="TextBoxDiv1_custom">	  

<table width="100%" align="center" cellpadding="0" cellspacing="0" class="creat-ordertable">

  

  

  

  

  

  

  <!--<tr>

    <td class="bold printer">Difference in royalty:</td>

    <td class="printer"><input type="tex" readonly="" name="diff_royality[]" id="diff_royality0" class="txtbox2" ></td>

    <td class="bold printer">Actual royalty </td>

    <td class="printer"><input type="tex"  readonly="" name="actual_royality[]" id="actual_royality0" class="txtbox2" ></td>

  </tr>-->

  <tr bgcolor="#388fc4">

    <td><span style="color:#FFF;"> Web Price Details </span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td>

  </tr>

  <tr class="darktr">

    <td width="277" class="bold">Quality :</td>

    <td><input type="text" value="<?=$row_id[0]->quality;?>" data-id="0" name="quality" id=""   class="printer" >

    </td>

    <td class="bold">Rate:</td>

    <td><input type="text" data-id="0" name="rate" value="<?=$row_id[0]->rate;?>"  class="printer">

    </td>

	 <td class="bold">Frame Type:</td>

    <td><input type="tex" data-id="0" name="frame_type"    value="<?=$row_id[0]->frame_type;?>" class="printer" ></td>

    

  </tr>
  <tr class="darktr">

    <td width="277" class="bold">Paper Type :</td>

    <td><input type="text" value="<?=$row_id[0]->paper_type_name;?>" data-id="0" name="paper_type_name" id=""   class="printer" >

    </td>

    <td class="bold">Display name:</td>

    <td><input type="text" data-id="0" name="display_p_name" value="<?=$row_id[0]->display_p_name;?>"  class="printer">

    </td>

	 <td class="bold"></td>

    <td><input type="hidden" data-id="0" name=""    value="" class="printer" ></td>

    

  </tr>

  <tr class="darktr">

    <td width="277" class="bold">Frame Catagory :</td>

    <td><input type="text"  data-id="0" name="frame_category" id="" value="<?=$row_id[0]->frame_category;?>"  class="printer" >

    </td>

    <td class="bold">Frame:</td>

    <td><input type="text" data-id="0" name="frame"  value="<?=$row_id[0]->frame;?>" class="printer">

    </td>

	

	 <td class="bold">Frame Rate:</td>

    <td><input type="tex" data-id="0" name="frame_rate"      value="<?=$row_id[0]->frame_rate;?>"  class="printer" ></td>

 

  </tr>

  <tr>

  <td class="bold">Frame Code:</td>

    <td><input type="text" data-id="0" name="frame_code"  value="<?=$row_id[0]->frame_code;?>" class="printer">

    </td>

	<td class="bold">Frame Color:</td>

    <td><input type="text" data-id="0" name="frame_color"  value="<?=$row_id[0]->frame_color;?>" class="printer">

    </td>
<td class="bold">Available:</td>

    <td><input type="text" data-id="0" name="availablity"  value="<?=$row_id[0]->availablity;?>" class="printer">

    </td>
  </tr>

  <br></br>

  <tr>

   <td class="bold">Frame Size</td>

    <td class="printer">

      <input type="tex"  data-id="0" name="frame_size"   value="<?=$row_id[0]->frame_size;?>" class="print_cost_custom printer" ></td>

    <td class="bold">Glass </td>

    <td class="printer"><input type="tex" value="<?=$row_id[0]->glass;?>" data-id="0"  name="glass"  class="printer" ></td>

	<td width="277" class="bold">Glass Rate:</td>

    <td><input type="text" required data-id="0" name="glass_rate" id="" value="<?=$row_id[0]->glass_rate;?>"  class="printer" >

    </td>

   <!-- <td class="bold">Qty. Threshold</td>

    <td ><input type="text" name="qtyused" id="actual_print_cost0" class="txtbox2"></td>-->

  </tr>

  <tr class="darktr">

    

    <td class="bold">Mount Name:</td>

    <td><input type="text" data-id="0" name="mount"  value="<?=$row_id[0]->mount;?>" class="printer">

    </td>
	 <td class="bold">Mount Code:</td>

    <td><input type="text" data-id="0" name="mount_code"  value="<?=$row_id[0]->mount_code;?>" class="printer">

    </td>

	 <td class="bold">Mount Rate:</td>

    <td><input type="tex" data-id="0" name="mount_rate"  value="<?=$row_id[0]->mount_rate;?>"   class="printer" ></td>

    

  </tr>

  <tr>

   <!--<td class="bold">Quantity Used (Height)</td>

    <td class="printer">

      <input type="tex"  data-id="0" name="qtythreshold" id="print_cost_custom0"   class="print_cost_custom printer" ></td>

    <td class="bold">Update stock </td>

    <td class="printer"><input type="tex" data-id="0"  name="updatestock" id="print_discount_custom0" class="printer" ></td>

    <td class="bold">Current invetory (Height)</td>

    <td ><input type="text" name="currentheight" id="actual_print_cost0" class="txtbox2"></td>

  </tr>-->

  

  

  

  

  

  

  

  

 

  

</table>







 



			 </div> </div>

    

                                   

                                    

		

		<div style="padding:30px; text-align:left">

              <input type="submit" name="addcpn" id="addcpn" value="Update" class="btn btn-success pull-right" >

            </div>

      </form>

        </div>

  </div>

      <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>

    </div>

</body>

    </html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



  



    <style>

.txtbox{ width: 61px; height: 30px;}

.txtbox2{ width: 81px; height: 30px;}

.print_cost_custom{width: 81px; height: 30px;}

.mount_cost_custom{width: 81px; height: 30px;}

.frame_cost_custom{width: 81px; height: 30px;}

.canvas_cost_custom{width: 81px; height: 30px;}

.cover_cost_custom{width: 81px; height: 30px;}

.cp_amount{width: 81px; height: 30px;}

.printer{width: 81px; height: 30px;}

.sp_amount{width: 81px; height: 30px;}

</style>