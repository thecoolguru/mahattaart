<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add New Courier</div>
<a style="float: right;"  href="<?=base_url()?>index.php/backend/view_courier"><input type="button" value="View Details" class="bt-sbt-upload"></a>
<div class="add-newcp">
<div class="mndry">*Mandatory Fields</div>
<?php if($msg<>''){?>
<script>
    setTimeout(function(){time_out();},3000);
    
    function time_out(){
        window.location.href="<?=base_url()?>index.php/backend/add_courier";
    }
    </script>
<span style="color:green; font-size:14px;"><?=$msg;?></span>
<?php }?>
<form name="courier" method="post" action="<?=base_url()?>index.php/backend/save_courier_details" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#e5e5e5">
    <td>Personal Details</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td width="280">Contact Person Name*</td>
    <td><input type="text" name="contact_person" id="contact_person" class="inputbxs" /></td>
    </tr>
    
 <tr class="toptr">
    <td width="280">Name*</td>
    <td><input type="text" name="com_name" id="com_name" class="inputbxs" /></td>
    </tr>

 <tr class="toptr">
    <td width="280">Address</td>
    <td><input type="text" name="address" id="address" class="inputbxs" /></td>
    </tr>

  <tr class="toptr">
    <td>Contact Land-line*</td>
    <td><input type="text" name="contact_lan" id="contact_lan" class="inputbxs" /></td>
  </tr>

   <tr class="toptr">
    <td width="280">Contact Email</td>
    <td><input type="text" name="email_id" id="email_id" class="inputbxs" /></td>
    </tr>

<tr class="toptr">
    <td width="280">Contact Mobile</td>
    <td><input type="text" name="mob_no" id="mob_no" class="inputbxs" /></td>
    </tr>
<tr class="toptr">
    <td width="280">State</td>
    <td><input type="text" name="state" id="state" class="inputbxs" /></td>
    </tr>
<tr class="toptr">
    <td width="280">Pin Code</td>
    <td><input type="text" name="pin_code" id="pin_code" class="inputbxs" /></td>
    </tr>

  <tr style="background:#e5e5e5">
    <td>Courier Details</td>
    <td>&nbsp;</td>
  </tr>
 
 <tr class="toptr">
    <td width="280">Status</td>
    <td><input type="text" name="status" id="status" class="inputbxs" /></td>
    </tr>

<tr class="toptr">
    <td width="280">Courier Code</td>
    <td><input type="text" name="courier_code" id="courier_code" class="inputbxs" /></td>
    </tr>

<tr class="toptr">
    <td width="280">Cost as per weight</td>
    <td><input type="text" name="cost_per_weight" id="cost_per_weight" class="inputbxs" /></td>
    </tr>

<tr class="toptr">
    <td width="280">Cash on Delivery</td>
    <td><input type="text" name="cash_del" id="cash_del" class="inputbxs" /></td>
    </tr>

<tr class="toptr">
    <td width="280">Tracking system(customer/backend)</td>
    <td><input type="text" name="track_sys" id="track_sys" class="inputbxs" /></td>
    </tr>

<tr class="toptr">
    <td width="280">Shipping charges</td>
    <td><input type="text" name="ship_charge" id="ship_charge" class="inputbxs" /></td>
    </tr>

<tr class="toptr">
    <td width="280">Cost/area</td>
    <td><input type="text" name="cost_area" id="cost_area" class="inputbxs" /></td>
    </tr>

<tr class="toptr">
    <td width="280">Delivery time/area wise</td>
    <td><input type="text" name="del_time_area" id="del_time_area" class="inputbxs" /></td>
    </tr>
 
 <tr class="toptr">
    <td width="280">Pick up from office</td>
    <td><input type="text" name="pick_up_office" id="pick_up_office" class="inputbxs" /></td>
    </tr>

 <tr style="background:#e5e5e5">
    <td>Other Details</td>
    <td>&nbsp;</td>
  </tr>

<tr class="toptr">
    <td width="280">Pick up from framer</td>
    <td><input type="radio" name="pick_frame" id="pick_frame" value="1" checked>Yes</input><br/><input type="radio" name="pick_frame" id="pick_frame" value="0">No</input></td>
    </tr>

<tr class="toptr">
    <td width="280">Delivery to office</td>
    <td><input type="radio" name="del_office" id="del_office" value="1" checked>Yes</input><br/><input type="radio" name="del_office" id="del_office" value="0">No</input></td>
    </tr>

<tr class="toptr">
    <td width="280">Pick up from Printer</td>
    <td><input type="radio" name="pick_printer" id="pick_printer" value="1" checked>Yes</input><br/><input type="radio" name="pick_printer" id="pick_printer" value="0">No</input></td>
    </tr>

<tr class="toptr">
    <td width="280">Pick up from office</td>
    <td><input type="radio" name="pick_office" id="pick_office" value="1" checked>Yes</input><br/><input type="radio" name="pick_office" id="pick_office" value="0">No</input></td>
    </tr>

<tr class="toptr">
    <td width="280">Working on off days</td>
    <td><input type="radio" name="working_off" id="working_off" value="1" checked>Yes</input><br/><input type="radio" name="working_off" id="working_off" value="0">No</input></td>
    </tr>

<tr class="toptr">
    <td>Remarks</td>
    <td><textarea name="remarks" id="remarks" class="inputbxs"></textarea></td>
    </tr>

<tr>
    <td>Satisfaction Level</td>
    <td><select name="level" id="level" style="width:243px; height:33px;" class="inputbxs"><option>Select Satisfaction Level</option>
    <option value="1">Excellent</option>
    <option value="2">Good</option>
    <option value="3">Fair</option>
    <option value="4">Average</option>
    <option value="5">Poor</option>
    </select>
    </td>
    </tr>
   
   <tr>
    <td>Preferred Surface</td>
    <td><input type="radio" name="preferred" id="preferred" value="1" checked>Yes</input><br><input type="radio" name="preferred" value="0">No</input>
   
   </td>
    </tr>

<tr style="background:#e5e5e5">
    <td>Payment Details</td>
    <td>&nbsp;</td>
  </tr>
<tr class="toptr">
    <td width="280">Name on cheque</td>
    <td><input type="text" name="name_on_cheque" id="name_on_cheque" class="inputbxs" /></td>
    </tr>

<tr class="toptr">
    <td width="280">Upload the contract form</td>
    <td><input type="file" name="upload_contract" id="upload_contract" class="inputbxs" /></td>
    </tr>


  <!--<tr style="background:#e5e5e5">
    <td>Job Details</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e2e2e2; margin-top:15px;">
      <tr style="background-color:#eee">
        <td align="center" style="border-right:1px solid #e2e2e2;">Time Taken</td>
        <td align="center" style="border-right:1px solid #e2e2e2;">Weight of the Order</td>
        <td align="center" style="border-right:1px solid #e2e2e2;">Area of Distribution</td>
        <td align="center">Price</td>
      </tr>
      <tr>
        <td style="border-right:1px solid #e2e2e2;"><input type="text" name="fname" id="fname" class="inputbxs" style="width:120px" /></td>
        <td style="border-right:1px solid #e2e2e2;"><input type="text" name="fname2" id="fname2" class="inputbxs" style="width:120px" /></td>
        <td style="border-right:1px solid #e2e2e2;"><input type="text" name="fname3" id="fname3" class="inputbxs" /></td>
        <td><input type="text" name="fname4" id="fname4" class="inputbxs" style="width:120px" /></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td>Holidays and Other Non-Working Days</td>
    <td><input type="text" name="fname7" id="fname7" class="inputbxs" /></td>
  </tr>-->
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="upload images" id="upload images" value="Add"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>

</form>
</div>
</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


