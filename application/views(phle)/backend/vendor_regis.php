<?php //echo $printer_rows;
$result_code=  $this->backend_model->get_vendor_code_gen();

$order= $result_code[0]->vendor_id;
$curr =  date('d-m-Y');
$str = explode("-",$curr);
$year =  substr($str[2], 2, 3);
$id = sprintf('%04d', $order);
$vendor_code= 'MHTV'.$str[0].$str[1].$year.$id; 

  
?>

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> Add New Vendor</div>
            <div class="add-newcp"><span style="color:#F00;font-size:16px">
        <?php
    if($msg<>'')
    {
        ?><script>//setTimeout(function(){timeOut();},4000); function timeOut(){window.location.href="add_vendor/<?=$edit_id?>"}</script><?php
    }
    print $msg;?>
                    
        </span>
       <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_vendor"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      
	  <?php //echo validation_errors(); ?>
<? //$msg;?>
<?php $attributes = array('id' => 'add_vendor_form','name' => 'add_vendor_form','enctype' => 'multipart/form-data');
echo form_open('backend/save_vendor_details', $attributes);?>
	  
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <input type="hidden" name="vendor_code" value="<?=$vendor_code?>" />
		    <input type="hidden" name="update_id" value="<?=$order?>" />
           <tr style="background:#e5e5e5">
            <td>Personal Details</td>
            <td>&nbsp;</td>
          </tr>
		  <tr class="toptr">
            <td>Name*</td>
            <td><input type="text" name="e_name" id="e_name"  value="<?=$val['customer_name'];?>" class="inputbxs" />
			<span class="form_error"><?php echo form_error('e_name'); ?></span>
              </td>
          </tr>
           <tr class="toptr">
            <td>Email*</td>
            <td><input type="text" name="e_email" id="e_email" value="<?=$val['customer_email'];?>" class="inputbxs" /><span class="form_error"><?php echo form_error('e_email'); ?></span></td>
              </td>
          </tr>
          <tr class="toptr">
            <td>Land line*</td>
            <td><input type="text" name="e_contact" onkeypress="return isNumber(event)"  value="<?=$val['customer_contact'];?>" maxlength="10" id="e_contact" class="inputbxs" placeholder="Enter Only Number"/><span class="form_error"><?php echo form_error('e_contact'); ?></span>
             </td>
          </tr>
          <tr class="toptr">
            <td>Mobile*</td>
            <td><input type="text" name="e_mobile"  value="<?=$val['customer_name'];?>" onkeypress="return isNumber(event)" maxlength="10" id="e_mobile" class="inputbxs" placeholder="Enter Only Number"/><span class="form_error"><?php echo form_error('customer_mobile'); ?></span>
             </td>
          </tr>
          
		 <tr class="toptr">
            <td>Address*</td>
            <td><textarea name="e_address"  id="e_address" class="inputbxs" ><?=$val['customer_name'];?></textarea><span class="form_error"><?php echo form_error('customer_address'); ?></span>
             </td>
          </tr>
         
          <tr class="toptr">
            <td>City*</td>
            <td><input type="text" name="e_city" id="e_city"  value="<?=$val['customer_name'];?>" class="inputbxs" /><span class="form_error"><?php echo form_error('customer_city'); ?></span>
              </td>
          </tr>
		  
		  <tr class="toptr">
            <td>State*</td>
            <td><input type="text" name="e_state" id="e_state"  value="<?=$val['customer_name'];?>" class="inputbxs" /><span class="form_error"><?php echo form_error('customer_state'); ?></span>
             </td>
          </tr>
          <tr class="toptr">
            <td>Pin Code*</td>
            <td><input type="text" name="pin_code"  value="<?=$val['customer_name'];?>" onkeypress="return isNumber(event)" maxlength="6" id="pin_code" class="inputbxs" placeholder="Enter Only Number" /><span class="form_error"><?php echo form_error('customer_pincode'); ?></span>
             </td>
          </tr>
		  
		   <tr style="background:#e5e5e5">
            <td>Company Details </td>
            <td>&nbsp;</td>
          </tr>
          
		  <tr class="toptr">
            <td>Company Name*</td>
            <td><input type="text" name="company_name"  value="<?=$val['company_name'];?>" id="company_name" value="<?=$customer_name;?>" class="inputbxs" />
			<span class="form_error"><?php echo form_error('company_name'); ?></span>
            </td>
          </tr>
		  <tr class="toptr">
            <td>Email*</td>
            <td><input type="text" name="c_email"  value="<?=$val['email'];?>" id="c_email" class="inputbxs" />
			<span class="form_error"><?php echo form_error('c_email'); ?></span>
            </td>
          </tr>
          <tr class="toptr">
            <td>Password*</td>
            <td><input type="text" name="password"  value="<?=$val['password'];?>" id="password" class="inputbxs" />
			<span class="form_error"><?php echo form_error('password'); ?></span>
            </td>
          </tr>
          <tr class="toptr">
            <td>Land line*</td>
            <td><input type="text" name="c_contact"  value="<?=$val['contact'];?>" onkeypress="return isNumber(event)" maxlength="10" id="c_contact" class="inputbxs" placeholder="Enter Only Number"/>
             </td>
          </tr>
          <tr class="toptr">
            <td>Mobile*</td>
            <td><input type="text" name="c_mobile"  value="<?=$val['mobile'];?>" onkeypress="return isNumber(event)" maxlength="10" id="c_mobile" class="inputbxs" placeholder="Enter Only Number"/>
			<span class="form_error"><?php echo form_error('c_mobile'); ?></span>
              </td>
          </tr>
          
		  
		  
          <tr style="background:#e5e5e5">
            <td>Bank Details</td>
            <td>&nbsp;</td>
          </tr>
         
		 
		  <tr>
            <td>Pan Card/VAT Details</td>
            <td><input type="text" name="pan_card"  value="<?=$val['pan_card'];?>" id="pan_card" class="inputbxs" placeholder="Pan Card/VAT Details"><span class="form_error"><?php echo form_error('pan_card'); ?></span>
             </td>
          </tr>
          <tr>
            <td>Address Proof</td>
            <td><input type="file" name="address_proof"  value="<?=$val['address_proof'];?>" id="address_proof"  class="inputbxs"/>
			<span class="form_error"><?php echo form_error('address_proof'); ?></span>
			</td>
          </tr>
          <tr>
            <td>Credit Period</td>
            <td><input type="text" name="credit_period"  value="<?=$val['credit_period'];?>" id="credit_period" class="inputbxs" />
			<span class="form_error"><?php echo form_error('credit_period'); ?></span>
            </td>
          </tr>
          <tr>
            <td>Mahatta Art- Marketing & Sales Material</td>
            <td>Content Presentation&nbsp;<input type="checkbox" name="material[]"  value="Content Presentation"/>
			List of print surfaces with rate chart&nbsp;<input type="checkbox" name="material[]"  value="List of print surfaces with rate chart"/><br>
			List of frames with rate chart&nbsp;<input type="checkbox" name="material[]"  value="List of frames with rate chart"/>
			TV&nbsp;<input type="checkbox" name="material[]"  value="TV"/>
			TAB&nbsp;<input type="checkbox" name="material[]"  value="TAB"/>
			Pen Drive&nbsp;<input type="checkbox" name="material[]"  value="Pen Drive"/><br>
			Other material&nbsp;<input type="checkbox"   id="check_id"  value="1" onclick="change_meterial();"/>
             </td>
          </tr>
		  
		  <tr id="other_meterial">
            <td>Other Material</td>
            <td><input type="text" name="material[]"  class="inputbxs" placeholder="Other material" />
             </td>
          </tr>
		  
          
    </table>
      <br>    <input type="submit" class="bt-sbt-upload" name="upload_images" id="upload images" value="Save" style="float: right;"  onclick="return Validate_printer();" />  
       
      </form>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
<!--MIDDLE PAGE WRAPPER ENDS-->
</div>
<style>
.form_error{ color:#FF0000;}
    .inputbxs1{ width: 51px; height:29px;  }
     .inputbxs2{ width: 63px; height:27px;}
     .inputbxs10{ width: 160px; height:27px;}
       .inputbxs11{ width: 158px; height:27px;}
      #td10{padding: 10px 11px 6px 84px}
     #td11{padding: 10px 11px 6px 67px}
     #td{padding: 15px 0px 0px 26px;padding: 8px;}
     #tr{ border-bottom: solid 2px; border-bottom-color:#faa21b;}
    </style>
<script>
$(document).ready(function(){
 $('#other_meterial').hide();
});
function change_meterial(){


   if($('#check_id').is(":checked"))
		{
		$('#other_meterial').show();
  
      }else{
	  $('#other_meterial').hide();
	  }
}

</script>
  