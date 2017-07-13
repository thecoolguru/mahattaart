<?php
 $userid=$this->session->userdata('userid');
$surface_framer=$this->backend_model->get_framer_surface('FRM');$framer_width=$this->backend_model->get_framer_width('FRM');$surface_mount=$this->backend_model->get_framer_surface('MNT');$surface_glass=$this->backend_model->get_framer_surface('GLS');
//$vendor_result=$this->backend_model->get_vendor_by_company();
$result_code=  $this->backend_model->get_vendor_subuser_code_gen();
$ven_orid=  $this->backend_model->get_order_id_gen();
$orid= $ven_orid[0]->order_id;
$order= $result_code[0]->subuser_id;
$curr =  date('d-m-Y');
$str = explode("-",$curr);
$year =  substr($str[2], 2, 3);
$id = sprintf('%04d', $order);
$subuser_code= 'MHTSUB'.$str[0].$str[1].$year.$id; 

$order= rand();
$genid=$order.$orid;
$curr =  date('d-m-Y');
$str = explode("-",$curr);
$year =  substr($str[2], 2, 3);
$id = sprintf('%04d', $genid);
 $order_idorg= $str[0].$str[1].$year.$id; 
		
?>
<html>
    <head>
<title>Create Quotation</title>
<link href="<?php echo base_url()?>assets/css/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?php echo base_url()?>assets/js/common.js"></script>



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
<script>
$(document).ready(function(){
 <? if($status=='0'){?>
 alert("Previous Quotation is pending , You can't create New Quoation");
<? }?>
});
</script>
 <style>
.txtbox{ width: 195px; height: 30px;}
.form_error{ color:#FF0000;}

</style>
    <body>
<div id="middle-wrapper">
      <div id="middle-container" style=" width:100%;">
    <div class="main-hdr-quotation"> Vendor-Online Order</div>
    
    <div id="quotationListDiv" class="manage-order">
	<?php echo validation_errors(); ?>
	<?php $attributes = array('id' => 'create_vendor_quotation','name' => 'create_vendor_quotation','enctype' => 'multipart/form-data');
echo form_open('backend/save_vendor_quotation', $attributes);?>
order_id
          
		  <input type="hidden" name="subuser_id" value="<?=$subuser_code?>">
		  <input type="hidden" name="vendor_id" value="<?=$userid?>">
		  <input type="hidden" name="update_id" value="<?=$order?>">
		  <input type="hidden" name="order_id" value="<?=$order_idorg?>">
		  <?php if($order_id<>''){?>
		  <input type="hidden1" name="update_id" value="<?=$order_id?>">
		  <?php }?>
        <b  style=" font-size: 14px; color: green;">
            <?php if($msg<>'') {?>
            <script>              setTimeout(function(){outtime()},3000);
            function outtime(){                  window.location.href="view_quotations/";              }           </script>
            <?php echo $msg;}?></b><br>
        <br>
		
        <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
          <!--<tr  class="darktr" >
            <td class="bold" width="30%"></td>
            <td width="70%"><b>Company Name</b>&nbsp;&nbsp;<select name="customer_id" id="customer_id"  onchange="filter_customers(this.value)"  class="selectpicker" data-hide-disabled="true" data-live-search="true">
                <optgroup >
                <option value="">--Select Customer--</option>
                </optgroup>
                <?php 
				 
				    foreach($vendor_result as $cust)            
					{                
					if($cust->company_name!='')               
					 {                
					 ?>
                <option value="<?php echo $cust->vendor_code; ?>"><?php echo $cust->company_name;?></option>
                <?php }                             }?>
              </select>
                                  </td>
          </tr>-->
            <tr>
                  <td colspan="2" style="padding:0;">
				  <div class="quotation-div"   >
                      <!--DETAILS TABLE-->
                      <div style="background:#388fc4; font-size:16px; color:#fff; padding:8px; ">Billing Address</div>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr class="darktr">
                          <td width="150" class="bold">Name:</td>
                          <td><input type="text" id ="b_name" name="b_name" value="<?=$billing_name?>" class="txtbox"  >
						  <span class="form_error"><?php echo form_error('b_name'); ?></span>
						  </td>
                          <td class="bold">Email Id:</td>
                          <td><input type="text" id ="b_email" name="b_email"  value="<?=$billing_email?>" class="txtbox">
						  <span class="form_error"><?php echo form_error('b_email'); ?></span>
                          </td>
                        </tr>
                      <tr class="darktr">
                          <td class="bold">Pin Code</td>
                          <td><input type="text" id ="b_pincode" name="b_pincode" value="<?=$billing_pincode?>"  class="txtbox">
						  <span class="form_error"><?php echo form_error('b_pincode'); ?></span>
						  </td>

                          <td class="bold">Contact Number</td>
                          <td><input type="text"  id ="b_contactnumber" name="b_contactnumber"  value="<?=$billing_name?>" class="txtbox">
						  <span class="form_error"><?php echo form_error('billing_mobile'); ?></span></td>
                        </tr>
						<tr>
                          <td class="bold">Address(Area and Street):</td>
                          <td><input type="text" id ="b_address" name="b_address"  value="<?=$billing_address?>" class="txtbox">
						  <span class="form_error"><?php echo form_error('b_address'); ?></span></td>
                          <td class="bold">Landmark(option)</td>
                          <td><input type="text" id ="b_landmark" name="b_landmark" value="<?=$billing_landmark?>"  class="txtbox">
						  <span class="form_error"><?php echo form_error('b_landmark'); ?></span></td>
                        </tr>
                      <tr>
                          <td class="bold">City</td>
                          <td><input type="text" id ="b_city" name="b_city" value="<?=$billing_city?>"  class="txtbox">
						   <span class="form_error"><?php echo form_error('b_city'); ?></span> 
						  </td>
                          <td class="bold">State</td>
                          <td><select name="b_state" id="b_state" class="txtbox">
                                <option value="">------------Select State------------</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                                <option value="West Bengal"></option>
                              </select>
							 <span class="form_error"><?php echo form_error('b_state'); ?></span> 
							  </td>
                        </tr>
                      
                    </table>
					
					
                     </td>
          </tr>
		   <tr>
                  <td colspan="2" style="padding:0;">
				  <div class="quotation-div"   >
                      <!--DETAILS TABLE-->
                      <div style="background:#388fc4; font-size:16px; color:#fff; padding:8px; ">Shipping Address&nbsp;<input type="checkbox" id="same_shipping_address"  name="same_shipping_address" value="1"  onClick="copy_address()" style="margin-left:5%" > Same Above</div>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr class="darktr">
                          <td width="150" class="bold">Name:</td>
                          <td><input type="text" id ="s_name" name="s_name" class="txtbox"  ></td>
                          <td class="bold">Email Id:</td>
                          <td><input type="text" id ="s_email" name="s_email"  class="txtbox">
                          </span></td>
                        </tr>
                      <tr class="darktr">
                          <td class="bold">Pin Code</td>
                          <td><input type="text" id ="s_pincode" name="s_pincode"  class="txtbox"></td>

                          <td class="bold">Contact Number</td>
                          <td><input type="text"  id ="s_contactnumber" name="s_contactnumber"  class="txtbox"></td>
                        </tr>
						<tr>
                          <td class="bold">Address(Area and Street):</td>
                          <td><input type="text" id ="s_address" name="s_address"  class="txtbox"></td>
                          <td class="bold">Landmark(option)</td>
                          <td><input type="text" id ="s_landmark" name="s_landmark"  class="txtbox"></td>
                        </tr>
                      <tr>
                          <td class="bold">City</td>
                          <td><input type="text" id ="s_city" name="s_city"  class="txtbox"></td>
                          <td class="bold">State</td>
                          <td><select name="s_state" id="s_state" class="txtbox">
                                <option value="">------------Select State------------</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                                <option value="West Bengal"></option>
                              </select></td>
                        </tr>
                      
                    </table>
					
					
                     </td>
          </tr>
		  
		  
		  
	<tr  class="darktr" >
                                    <td></td>
                                    <td>
               
               <div style="padding:0px; text-align:left; margin-left: 20%;">
              <input type="submit" <? if($status=='0'){?> disabled="disabled" <? }?> name="addcpn" id="addcpn" value="SAVE & CONTINUE" class="bt-create-quote" >
            </div>
              </td>
                                  </tr>	 
								   
        </table>  
		
	
</form>
  </div>
      <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
    </div>
</body>
    </html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
function copy_address(){


   if($('#same_shipping_address').is(":checked"))
		{
		var b_name =$('#b_name').val();
		var b_email =$('#b_email').val();
		var b_pincode =$('#b_pincode').val();
		var b_address =$('#b_address').val();
		var b_landmark =$('#b_landmark').val();
		var b_city =$('#b_city').val();
		var b_state =$('#b_state').val();
		var b_contactnumber =$('#b_contactnumber').val();
		
		$('#s_name').val(b_name);
		$('#s_email').val(b_email);
		$('#s_pincode').val(b_pincode);
		$('#s_address').val(b_address);
		$('#s_landmark').val(b_landmark);
		$('#s_city').val(b_city);
		$('#s_state').val(b_state);
		$('#s_contactnumber').val(b_contactnumber);
  
      }else{
	    $('#s_name').val('');
		$('#s_email').val('');
		$('#s_pincode').val('');
		$('#s_address').val('');
		$('#s_landmark').val('');
		$('#s_city').val('');
		$('#s_state').val('');
		$('#s_contactnumber').val('');
	  }
}
</script>
   