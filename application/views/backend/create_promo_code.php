
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

    <div class="main-hdr-quotation text-center"> Create Promocode</div>

    <style>

.manage-order .creat-ordertable tr td{ padding:8px 1px 8px 1px !important;} .hdrs td:nth-child(2) { width:100px;}

</style>

    <div id="quotationListDiv" class="manage-order" >
   <?php 
   ?>
          <form  name="create_quotation" action="<?=base_url()?>index.php/backend/save_promo_offer/<?=$promo_detials[0]->sr_no?>" method="post"  enctype="multipart/form-data">

        <b  style=" font-size: 14px; color: green;">
	
            <?php if($msg<>'') {?>

            <script>              setTimeout(function(){outtime()},3000);

            function outtime(){                  window.location.href="view_quotations/";              }           </script>

            <?php echo $msg;}?></b><br>

        <br>

		


<div class="viewcplist-inner">

                <div id='TextBoxesGroup_custom'>

                                        <div id="TextBoxDiv1_custom">	  

<table width="100%" align="center" cellpadding="0" cellspacing="0" class="creat-ordertable">

  <tr bgcolor="#388fc4">

    <td><span style="color:#FFF;"> Promo code details</span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td>

  </tr>

  <tr class="darktr">

    <td width="277" class="bold">promo code:</td>

    <td><input type="text" value="<?=$promo_detials[0]->offer_code?>" data-id="0" name="promo_code" id=""   class="printer" >

    </td>

    <td class="bold">Offer(%):</td>

    <td><input type="text" data-id="0" name="offer_precentage" value="<?=$promo_detials[0]->offer_precentage?>"  class="printer">

    </td>

	 <td class="bold">Valid Days:</td>

    <td><!--<textarea data-id="0" name="valid_days"  class="printer" ><?=$promo_detials[0]->valid_days?></textarea>-->
	<select name="valid_days" id="" onChange="fun_offer_days(this.value);">
	<option value="">--Select Days--</option>
	<option <?php if($promo_detials[0]->valid_days==8){ echo "selected='selected'";}?> value="8">All Days</option>
	<option <?php if($promo_detials[0]->valid_days==9){ echo "selected='selected'";}?> value="9">Weekend</option>
	<option <?php if($promo_detials[0]->valid_days==10){ echo "selected='selected'";}?> value="10">Weekdays(M->F)</option>
	<option <?php if($promo_detials[0]->valid_days==1){ echo "selected='selected'";}?> value="1">Monday</option>
	<option <?php if($promo_detials[0]->valid_days==2){ echo "selected='selected'";}?> value="2">Tuesday</option>
	<option <?php if($promo_detials[0]->valid_days==3){ echo "selected='selected'";}?> value="3">Wednesday</option>
	<option <?php if($promo_detials[0]->valid_days==4){ echo "selected='selected'";}?> value="4">Thursday</option>
	<option <?php if($promo_detials[0]->valid_days==5){ echo "selected='selected'";}?> value="5">Friday</option>
	<option <?php if($promo_detials[0]->valid_days==6){ echo "selected='selected'";}?> value="6">Saturday</option>
	<option <?php if($promo_detials[0]->valid_days==7){ echo "selected='selected'";}?> value="7">Sunday</option>
	
	</select>
	
	</td>

    <?php  print_r($promo_detials)?>

  </tr>
 <tr class="darktr">

    <td width="277" class="bold">Active:</td>

    <td><select name="active" id="" onChange="activate_yes_no()">
	<option value="1">Yes</option>
	<option value="0">No</option>
	</select>
    </td>

   
    

  </tr>

 

</table>

			 </div> </div>

		<div style="padding:30px; text-align:left">

              <input type="submit" name="addcpn" id="addcpn" value="<?php if($promo_detials[0]->offer_code!=''){ echo "Update";}else {echo "Save"; }?>" class="btn btn-success pull-right" >

            </div>

      </form>

        </div>

  </div>

      <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>

    </div>

</body>

    </html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
function fun_offer_days(value){
//alert(value)
}

</script>

  



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