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
				{
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
				else if($('#services').val()=="")
				{
					$('#name_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("");
					$('#state_error').html("");
					$('#pin_code_error').html("");
					$('#pdf_error').html("");
					$('#services_error').html("Please Select Services");
					
					return false;
				}
				
				
								
		});
		
	});

</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add New Framer</div>

<div class="add-newcp"><span style="color:#F00;font-size:16px"><?php print $msgg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form action="<?php echo base_url();?>index.php/backend/add_framer" method="post" enctype="multipart/form-data" id="add_form" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#e5e5e5">
    <td width="200">Personal / Company Information</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td>Company Name*</td>
    <td><input type="text" name="name" id="name" class="inputbxs" /><span id="name_error" style="color:#F00"></span></td>
    </tr>
	<tr class="toptr">
    <td>Contact Person Name*</td>
    <td><input type="text" name="contactname" id="contactname" class="inputbxs" /><br /><span id="contactname_error" style="color:#F00"></span></td>
    </tr>
  <tr class="toptr">
    <td>Contact Number*</td>
    <td><input type="text" name="contact" id="contact" class="inputbxs" /><span id="contact_error" style="color:#F00"></td>
  </tr>
  <tr class="toptr">
    <td>Mobile Number*</td>
    <td><input type="text" name="mobile" id="mobile" class="inputbxs" placeholder="Enter Only Number"/><br /><span id="mobile_error" style="color:#F00"></span></td>
    </tr>
  <tr class="toptr">
    <td>Email*</td>
    <td><input type="text" name="email" id="email" class="inputbxs" /><span id="email_error" style="color:#F00"></td>
  </tr>
  <tr class="toptr">
    <td>Address*</td>
    <td><textarea name="address " id="address" class="inputbxs"></textarea><span id="address_error" style="color:#F00"></td>
  </tr>
  <!--<tr class="toptr">
    <td>City*</td>
    <td><input type="text" name="city" id="city" class="inputbxs" /><span id="city_error" style="color:#F00"></td>
  </tr>-->

  <tr class="toptr">
    <td>State*</td>
    <td><input type="text" name="state" id="state" class="inputbxs" /><span id="state_error" style="color:#F00"></td>
  </tr>
  <tr class="toptr">
    <td>Pin Code*</td>
    <td><input type="text" name="pin" id="pin" class="inputbxs" /><span id="pin_code_error" style="color:#F00"></td>
  </tr>
  <tr class="toptr">
      <td>Status*</td>
      <td><Select  name="status" id="status" class="inputbxs" />
          <option value="0" >Select Status</option>
          <option value="1" >Active</option>
          <option value="0" >Inactive</option>
      </td>
  </tr>

  <!---
<tr style="background:#e5e5e5">
    <td width="200">Framing Details</td>
    <td>&nbsp;</td>
    </tr>

  <tr class="toptr">
    <td>Status</td>
    <td><input type="radio" name="vstatus" id="vstatus" value="1" checked>Active</input><br><input type="radio" name="vstatus" value="0">Inactive</input></td>
  </tr>

  <tr class="toptr">
    <td>Type of frame</td>
    <td><select name="printing_frame" id="printing_frame" class="inputbxs"  onchange="get_frame_values(this.value)"/>
        <option value="">Select Frame Type</option>
        </select></td>
  </tr>
  
 <tr>
    <td>Print Code</td>
   <td><input type="text" name="print_code" id="print_code" class="inputbxs"/></td> 
   </tr>
   
   <tr>
    <td>Glass/Acrylic/none</td>
   <td><input type="text" name="gl_ac_ne" id="gl_ac_ne" class="inputbxs"/></td> 
   </tr>
   
  <tr>
    <td>Glass Code/Acrylic Code</td>
   <td><input type="text" name="glass_acry_code" id="glass_acry_code" class="inputbxs"/></td> 
   </tr>

 <tr>
    <td>Mount Type</td>
   <td><input type="text" name="mount_type" id="mount_type" class="inputbxs"/></td> 
   </tr>

<tr>
    <td>Mount Code</td>
   <td><input type="text" name="mount_code" id="mount_code" class="inputbxs"/></td> 
   </tr>

  <td>Cost Per Running Feet Frame</td>
    <td><input type="text" name="costperfeet" id="costperfeet" class="inputbxs"  /></td>
    </tr>
  
     <tr>
  
    <td>Cost Per sq. feet mount</td>
    <td><input type="text" name="cost_mount" id="cost_mount" class="inputbxs"  /></td>
    </tr>

   <tr>
  <td>Time/Frame</td>
  <td><input type="text" name="time_frame" id="time_frame" class="inputbxs"/></td>
  </tr>
-->
<!---------------------------packaging details start------------------------------------------------------------>

<tr style="background:#e5e5e5">
    <td width="200">Packaging Details</td>
    <td>&nbsp;</td>
    </tr>

  
 
  <tr class="toptr">
    <td>Packaging cost/size of print</td>
    <td><input type="text" name="print_cost" id="print_cost" placeholder="Packaging cost/size of print" class="inputbxs"></td>
    </tr>
  
 
  
<tr class="toptr">
    <td>Packaging time/print</td>
    <td><input type="text" name="print_time" id="print_time" placeholder="Packaging time/print" class="inputbxs"></td>
    </tr>

  
<tr class="toptr">
    <td>Packaging material used</td>
    <td><input type="text" name="material" id="material" placeholder="Packaging material used" class="inputbxs"></td>
    </tr>

 <tr class="toptr">
    <td>Product branding options</td>
    <td><input type="text" name="branding" id="branding" placeholder="Product branding options" class="inputbxs"></td>
    </tr>
<!--------------------------------------------other details start------------------------>
<tr style="background:#e5e5e5">
    <td width="200">Other details</td>
    <td>&nbsp;</td>
    </tr>

  
  <tr class="toptr">
    <td>Delivery to office</td>
    <td><input type="radio" name="del_to_framer" id="del_to_framer" value="1" checked>Yes</input><br/><input type="radio" name="del_to_framer" id="del_to_framer" value="0">No</input></td>
    </tr>
 <tr class="toptr">
    <td>Pick up from office</td>
    <td><input type="radio" name="pick_office" id="pick_office" value="1" checked>Yes</input><br/><input type="radio" name="pick_office" id="pick_office" value="0">No</input></td>
    </tr>
   <tr class="toptr">
    <td>Working on off days</td>
    <td><input type="radio" name="working_off" id="working_off" value="1" checked>Yes</input><br/><input type="radio" name="working_off" id="working_off" value="0">No</input></td>
    </tr>
<!--
  <tr>
      <td>Max frames/day</td>
      <td><input type="text" name="max_frame" id="max_frame" class="inputbxs"/></td>
  </tr>

  <tr>
      <td>Min Frame/day</td>
      <td><input type="text" name="min_frame" id="min_frame" class="inputbxs"/></td>
  </tr>-->
  
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
   <!--
   <tr>
    <td>Preferred Surface</td>
    <td><input type="radio" name="preferred" id="preferred" value="1" checked>Yes</input><br><input type="radio" name="preferred" value="0">No</input>
   
   </td>
    </tr>
-->
  <!-------------------------------------------payment details start------------------------------------->
  <tr style="background:#e5e5e5">
    <td width="200">Payment Details</td>
    <td>&nbsp;</td>
    </tr>
    
    <tr>
   <td>Name on Cheque</td>
    <td><input type="text" name="cheque" id="cheque" class="inputbxs" placeholder="Name on cheque"/></td>
    </tr>
	 
    <tr class="toptr">
    <td>Upload The Contract Form</td>
    <td><input type="file" name="file1" id="file1" class="inputbxs"/><span id="pdf_error" style="color:#F00"><?php echo $msg;?></span></td>
  </tr>
<!--<tr class="toptr">
    <td>Services Offered*</td>
    <td><select name="services[]" id="services" class="inputbxs" style="width: 243px;" multiple>
	<option>Delivery to Packeger</option>
	<option>Delivery to us</option>
	<option>Framed on Off days</option></select><span id="services_error" style="color:#F00"></span></td>
  </tr>
  <tr>
    <td>Special Comments</td>
    <td><textarea name="comment" id="comment" class="inputbxs"></textarea></td>
    </tr>	
   
	<tr>
    <td>Special Remark</td>
    <td><textarea name="remark" id="remark" class="inputbxs"></textarea></td>
    </tr>
	 
  <tr class="toptr">
    <td>Time Taken to Complete the Process</td>
    <td><input type="text" name="timetaken" id="timetaken" class="inputbxs" /></td>
  </tr>-->

  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="Add" id="Add" value="Add"  /></td>
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


