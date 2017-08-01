
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
			
		$("#add_form").submit(function(){
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			
			
				if(	$('#name').val()=="")
				{

					$('#name_error').html("Please Enter Name");
					return false;
				}
				else if($('#contact').val()=="")
				{
					$('#name_error').html("");
					$('#contact_error').html("Please Enter contact");
					return false;
				}
				else if($('#email').val()=="")
				{
					$('#name_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("Please Enter Email");
					return false;
				}
				else if(!emailReg.test($('#email').val()))
				 	{
					$('#name_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("Please Enter Valid Email");
					return false;
					 	
				 	}	
					else if($('#address').val()=="")
				{
					$('#name_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("Please Enter Address details");
					
					return false;
				}
				else if($('#city').val()=="")
				{
					$('#name_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("Please Enter City");
					
					return false;
				}
				else if($('#state').val()=="")
				{
					$('#name_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("");
					$('#state_error').html("Please Enter state");
					
					return false;
				}
				else if($('#pin_code').val()=="")
				{
					$('#name_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("");
					$('#state_error').html("");
					$('#pin_code_error').html("Please Enter Pin Code");
					
					return false;
				}
				
				else if($('#file1').val()!="")
				{ alert("ojj");
					var pdf = $('#file1').val();
			          var x=pdf.split(".");
				  if((x['1']!='pdf'))
				  {  alert(x['1']);
					$('#name_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("");
					$('#state_error').html("");
					$('#pin_code_error').html("");
					
					$('#pdf_error').html("Please Upload Only Pdf File");
					return false;
				}
				}
				else if($('#frameType').val()=="")
				{
					$('#name_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("");
					$('#state_error').html("");
					$('#pin_code_error').html("");
					$('#pdf_error').html("");
					$('#frameType_error').("Please Select Frame Type");
					
					return false;
				}
				
				
								
		});
		
	});

</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Edit Framer</div>

<div class="add-newcp">
<div class="mndry">*Mandatory Fields</div>
<form action="<?php echo base_url();?>index.php/backend/edit_vendor/<?=$vendor_details['vender_id']?>/<?=$vendor_details['vender_type']?>" method="post" enctype="multipart/form-data" id="add_form" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#e5e5e5">
    <td width="200">Personal / Company Information</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td>Name*</td>
    <td><input type="text" name="name" id="name" class="inputbxs" value="<?php print($vendor_details['vender_contact_person_name']);?>" /><span id="name_error" style="color:#F00"></span></td>
    </tr>
    <tr class="toptr">
        <td>Company Name*</td>
        <td><input type="text" name="company_name" id="company_name" class="inputbxs" value="<?php print($vendor_details['vender_company_name']);?>"/><br /><span id="name_error" style="color:#F00"></span></td>
    </tr>
  <tr class="toptr">
    <td>Contact No*</td>
    <td><input type="text" name="contact" id="contact" class="inputbxs"  value="<?php print($vendor_details['vender_contact_no']);?>" /><span id="contact_error" style="color:#F00"></span></td>
  </tr>
  <tr class="toptr">
    <td>Email Id*</td>
    <td><input type="text" name="email" id="email" class="inputbxs"  value="<?php print($vendor_details['vender_email_id']);?>"/><span id="email_error" style="color:#F00"></span></td>
  </tr>
  <tr class="toptr">
    <td>Address*</td>
    <td><textarea name="address" id="address" class="inputbxs"><?php print($vendor_details['vender_address']);?></textarea><span id="address_error" style="color:#F00"></span></td>
  </tr>
<!--  <tr class="toptr">
    <td>City*</td>
    <td><input type="text" name="city" id="city" class="inputbxs" value="<?php print($vendor_details['vender_city']);?>"/><span id="city_error" style="color:#F00"></span></td>
  </tr>-->
  <tr class="toptr">
    <td>State*</td>
    <td><input type="text" name="state" id="state" class="inputbxs"  value="<?php print($vendor_details['vender_state']);?>"/><span id="state_error" style="color:#F00"></span></td>
  </tr>
  <tr class="toptr">
    <td>Pin Code*</td>
    <td><input type="text" name="pin" id="pin" class="inputbxs" value="<?php print($vendor_details['vender_pin_code']);?>" /><span id="pin_code_error" style="color:#F00"></span></td>
  </tr>
  <tr class="toptr">
    <td>Vendor Status</td>
       <td><select name="vstatus" class="inputbxs">
    <option <?php if($vendor_details['vender_status']=='1'){?> selected="selected" <?php } ?> value="1">Active</option>
                <option <?php if($vendor_details['vender_status']=='0'){?> selected="selected" <?php } ?> value="0">Deactive</option>

      </select></td>
   <!-- <td><input type="radio" name="vstatus" id="vstatus" value="1" <?php if($vendor_details['vender_status']=='1'){?> checked="checked"<?php } ?>>Active</input><br><input type="radio" name="vstatus" value="0" <?php if($vendor_details['vender_status']=='0'){?> checked="checked"<?php } ?>>Inactive</input></td>-->
  </tr>
  
  <!--<tr class="toptr">
    <td>Time Taken to Complete the Process</td>
    <td><input type="text" name="timetaken" id="timetaken" class="inputbxs" value="<?php print($vendor_details['vender_time_taken']);?>"/></td>
  </tr>-->
  <!--<tr class="toptr">
    <td>Services Offered</td>
    <td><select name="services" id="services" class="inputbxs" style="width: 243px;height: 35px;"><option <?php if($vendor_details['vender_services_offered']==''){?> selected="selected" <?php } ?> ></option><option <?php if($vendor_details['vender_services_offered']=='Delivery to Packeger'){?> selected="selected" <?php } ?>>Delivery to Packeger</option><option <?php if($vendor_details['vender_services_offered']=='Delivery to us'){?> selected="selected" <?php } ?>>Delivery to us</option><option <?php if($vendor_details['vender_services_offered']=='Framed on Off days'){?> selected="selected" <?php } ?>>Framed on Off days</option></select></td>
  </tr>
  <tr class="toptr">
    <td>Upload The File(If any changes)</td>
    <td><input type="file" name="file1" id="file1" class="inputbxs"/><span id="pdf_error" style="color:#F00"><?php // echo $msg;?></span></td>
  </tr>-->
    <!--------------------------------------------------packaging_details_start-------------------------------------------------------------------------->
    <tr style="background:#e5e5e5">
        <td>Packaging Details</td>
        <td>&nbsp;</td>
    </tr>

    <tr>
        <td>Packaging cost/ size of print</td>
        <td><input type="text" name="packaging_cost" id="packaging_cost" class="inputbxs" placeholder="Packaging cost/ size of print" value="<?php print($vendor_details['packaging_cost_per_size_of_print']);?>"/></td>
    </tr>

    <tr>
        <td>Packaging time/print</td>
        <td><input type="text" name="packaging_time" id="packaging_time" class="inputbxs" placeholder="Packaging time/print" value="<?php print($vendor_details['packaging_time_per_print']);?>"/></td>
    </tr>

    <tr>
        <td>Packaging material used</td>
        <td><input type="text" name="packaging_material" id="packaging_material" class="inputbxs" placeholder="Packaging material used"value="<?php print($vendor_details['packaging_material_used']);?>"/></td>
    </tr>

    <tr>
        <td>Product branding options</td>
        <td><input type="text" name="packaging_branding" id="packaging_branding" class="inputbxs" placeholder="Product branding options" value="<?php print($vendor_details['product_branding_options']);?>"/></td>

    </tr>

    <!--------------------------------------------------------packaging_details_end/other_details_start-------------------------------------------------------------------------------->
    <tr style="background:#e5e5e5">
        <td>Other Details</td>
        <td>&nbsp;</td>
    </tr>

    <!--<tr>
    <td>Delivery to framer</td>
   <td><input type="radio" name="delivery_to_framer" id="delivery_to_framer" value="1" checked>Yes</input><br/><input type="radio" name="delivery_to_framer" id="delivery_to_framer" value="0">No</input></td>
   </tr>-->

    <tr>
        <td>Delivery to office</td>
        <td>
            <select name="delivery_to_office" class="inputbxs">
                <option <?php if($vendor_details['delivery_to_office']=='1'){?> selected="selected" <?php } ?> value="1">Yes</option>
                <option <?php if($vendor_details['delivery_to_office']=='0'){?> selected="selected" <?php } ?> value="0">No</option>

            </select></td>
    </tr>

    <tr>
        <td>Pick up from office</td>
        <td>
            <select name="pick_office" class="inputbxs">
                <option <?php if($vendor_details['pick_up_from_office']=='1'){?> selected="selected" <?php } ?> value="1">Yes</option>
                <option <?php if($vendor_details['pick_up_from_office']=='0'){?> selected="selected" <?php } ?> value="0">No</option>

            </select></tr>


    <tr>
        <td>Working on off days</td>
        <td>
            <select name="working_days" class="inputbxs">
                <option <?php if($vendor_details['working_on_off_days']=='1'){?> selected="selected" <?php } ?> value="1">Yes</option>
                <option <?php if($vendor_details['working_on_off_days']=='0'){?> selected="selected" <?php } ?> value="0">No</option>

            </select></tr>

    <tr>
        <td>Remarks</td>
        <td><textarea name="remark" id="remark" class="inputbxs" placeholder="Remarks"><?php print($vendor_details['vender_special_remarks']);?> </textarea></td>
    </tr>

    <tr>
        <td>Satisfaction Level</td>
        <td><select name="level" id="level" style="width:243px; height:33px;" class="inputbxs"><option>Select Satisfaction Level</option>
                <option<?php if($vendor_details['vender_satisfaction_level']=='1'){?> selected="selected" <?php } ?> value="1">Excellent</option>
                <option value<?php if($vendor_details['vender_satisfaction_level']=='2'){?> selected="selected" <?php } ?> value="2">Good</option>
                <option value<?php if($vendor_details['vender_satisfaction_level']=='3'){?> selected="selected" <?php } ?> value="3">Fair</option>
                <option value <?php if($vendor_details['vender_satisfaction_level']=='4'){?> selected="selected" <?php } ?> value="4">Average</option>
                <option value<?php if($vendor_details['vender_satisfaction_level']=='5'){?> selected="selected" <?php } ?> value="5">Poor</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Preferred</td>
        <td><select name="preferred" class="inputbxs">
                <option <?php if($vendor_details['vender_preferred']=='1'){?> selected="selected" <?php } ?> value="1">Yes</option>
                <option <?php if($vendor_details['vender_preferred']=='0'){?> selected="selected" <?php } ?> value="0">No</option>

            </select></td>
    </tr>

    <!------------------------------------------------------------other_details_end/payment_details_start---------------------------------------------------------------------------------------------------->

    <tr style="background:#e5e5e5">
        <td>Payment Details</td>
        <td>&nbsp;</td>
    </tr>

    <tr>
    <tr>
        <td>Name on Cheque</td>
        <td><input type="text"name="cheque" id="cheque" class="inputbxs" placeholder="Name on Cheque" value="<?php print($vendor_details['vender_name_on_cheque']);?>"/></td>
    </tr>

    <tr>
        <td>Upload the file (If there is any change)</td>
        <td><input type="file" name="file1" id="file1" size="chars" /><br /><span id="pdf_error" style="color:#F00"></span></td>
    </tr>

  <tr><input type="hidden" name="contract" value="<?=$vendor_details['vender_contract_filename'];?>">
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="Add" id="Add" value="Edit"  /></td>
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


