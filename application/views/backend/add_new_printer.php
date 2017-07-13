
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
			
		$("#add_printer_form").submit(function(){
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
			
				if(	$('#name').val()=="")
				{
					
					$('#name_error').html("Please Enter Name");
					return false;
				}
				else if(	$('#contactname').val()=="")
				{
					$('#name_error').html("");
					$('#contactname_error').html("Please Enter Contact Person Name");
					return false;
				}
				
				else if($('#contact').val()=="")
				{
					$('#name_error').html("");
					$('#contactname_error').html("");
					$('#contact_error').html("Please Enter contact");
					return false;
				}
				else if($('#email').val()=="")
				{
					$('#name_error').html("");
					$('#contactname_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("Please Enter Email");
					return false;
				}
				else if(!emailReg.test($('#email').val()))
				 	{
					$('#name_error').html("");
					$('#contactname_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("Please Enter Valid Email");
					return false;
					 	
				 	}	
					else if($('#address').val()=="")
				{
					$('#name_error').html("");
					$('#contactname_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("Please Enter Address details");
					
					return false;
				}
				else if($('#city').val()=="")
				{
					$('#name_error').html("");
					$('#contactname_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("Please Enter City");
					
					return false;
				}
				else if($('#state').val()=="")
				{
					$('#name_error').html("");
					$('#contactname_error').html("");
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
					$('#contactname_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("");
					$('#state_error').html("");
					$('#pin_code_error').html("Please Enter Pin Code");
					
					return false;
				}
				else if($('#service').val()=="")
				{
					$('#name_error').html("");
					$('#contactname_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("");
					$('#state_error').html("");
					$('#pin_code_error').html("");
					$('#service_error').html("Please Enter Services offered");
					
					
					return false;
				}
				
				else if($('#mobile').val().length<'10')
				{
					$('#name_error').html("");
					$('#contactname_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("");
					$('#state_error').html("");
					$('#pin_code_error').html("");
					$('#service_error').html("");
					$('#mobile_error').html("Please Enter 10 digit Mobile No");
					
					return false;
				}
				else if($('#pdf_file').val()!="")
				{
					var pdf = $('#pdf_file').val();
			          var x=pdf.split(".");
				  if((x['1']!='pdf'))
				{ // alert(x['1']);
					$('#name_error').html("");
					$('#contactname_error').html("");
					$('#contact_error').html("");
					$('#email_error').html("");
					$('#address_error').html("");
					$('#city_error').html("");
					$('#state_error').html("");
					$('#pin_code_error').html("");
					$('#service_error').html("");
					$('#mobile_error').html("");
					$('#pdf_error').html("Please Upload Only Pdf File");
					return false;
				}
				}
				
				
								
		});
		
	});

</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add New Printer</div>

<div class="add-newcp"><span style="color:#F00;font-size:16px"><?php print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form action="<?=base_url()?>index.php/backend/add_printer" id="add_printer_form" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#e5e5e5">
    <td>Personal / Company Information</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td>Company Name*</td>
    <td><input type="text" name="name" id="name" class="inputbxs" /><br /><span id="name_error" style="color:#F00"></span></td>
    </tr>
	 <tr class="toptr">
    <td>Contact Person Name*</td>
    <td><input type="text" name="contactname" id="contactname" class="inputbxs" /><br /><span id="contactname_error" style="color:#F00"></span></td>
    </tr>
      <tr class="toptr">
    <td>Contact Number*</td>
    <td><input type="text" name="contact" id="contact" class="inputbxs" placeholder="Enter Only Number"/><br /><span id="contact_error" style="color:#F00"></span></td>
    </tr>
	<tr class="toptr">
    <td>Mobile Number*</td>
    <td><input type="text" name="mobile" id="mobile" class="inputbxs" placeholder="Enter Only Number"/><br /><span id="mobile_error" style="color:#F00"></span></td>
    </tr>
     <tr class="toptr">
    <td>Email*</td>
    <td><input type="text" name="email" id="email" class="inputbxs" /><br /><span id="email_error" style="color:#F00"></span></td>
    </tr>
    <tr class="toptr">
    <td>Address*</td>
    <td><textarea name="address" id="address" class="inputbxs" ></textarea><br /><span id="address_error" style="color:#F00"></span></td>
    </tr>
     
        <tr class="toptr">
    <td>City*</td>
    <td><input type="text" name="city" id="city" class="inputbxs" /><br /><span id="city_error" style="color:#F00"></span></td>
    </tr>
    <tr class="toptr">
    <td>State*</td>
    <td><input type="text" name="state" id="state" class="inputbxs" /><br /><span id="state_error" style="color:#F00"></span></td>
    </tr><tr class="toptr">
    <td>Pin Code*</td>
    <td><input type="text" name="pin_code" id="pin_code" class="inputbxs" placeholder="Enter Only Number" /><br /><span id="pin_code_error" style="color:#F00"></span></td>
    </tr>
    <!--<tr class="toptr">
    <td>Region</td>
    <td><select name="region" id="region" class="inputbxs" style="width:243px;"><option>Select Region</option><option>North</option><option>South</option><option>East</option><option>West</option></select></td>
    </tr>-->
      <!---------------------------------------printing_details--------------------------------------------------------------------------------------------->
     <tr style="background:#e5e5e5">
    <td>Printing Details</td>
    <td>&nbsp;</td>
    </tr>
 
   <tr>
    <td>Status</td>
    <td><input type="radio" name="vender_status" id="vender_status" value="1" checked>Yes</input><br><input type="radio" name="vender_status" value="0">No</input>
   
    <span id="vender_status_error" style="color:#F00"></span></td>
    </tr>  
    <tr>
    <td>Type of Surface</td>
    <td>Surface Code</td>
    <td>Cost/sq. inch</td>
    <td>Time/print</td>
     </tr>

   <tr>
    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>
    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>
    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>
     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>
    </tr>
   
   <tr>
    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>
    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>
    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>
     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>
    </tr>

    <tr>
    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>
    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>
    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>
     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>
    </tr>

<tr>
    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>
    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>
    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>
     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>
    </tr>

<tr>
    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>
    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>
    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>
     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>
    </tr>

     <tr>
    <td>Max prints/day</td>
    <td><input type="text"name="max_prints" id="max_prints" class="inputbxs" placeholder="Max prints/day"/></td>
    </tr>
   
     <tr>
    <td>Min prints/day</td>
    <td><input type="text"name="min_prints" id="min_prints" class="inputbxs" placeholder="Min prints/day"/></td>
    </tr>
    
     <tr>
    <td>GSM of Surface</td>
    <td><input type="text"name="gsm_sur" id="gsm_sur" class="inputbxs" placeholder="GSM of Surface"/></td>
    </tr>

    <tr>
    <td>Printing machine-width(max size 40)</td>
    <td><input type="text"name="print_mac" id="print_mac" class="inputbxs" placeholder="Printing machine-width"/></td>
    </tr>
    
      <tr>
    <td>Off Days</td>
    <td><input type="text"name="off_days" id="off_days" class="inputbxs" placeholder="Off Days"/></td>
    </tr>
      <!--------------------------------------------------packaging_details_start-------------------------------------------------------------------------->
      <tr style="background:#e5e5e5">
    <td>Packaging Details</td>
    <td>&nbsp;</td>
    </tr>
     
    <tr>
    <td>Packaging cost/ size of print</td>
    <td><input type="text" name="packaging_cost" id="packaging_cost" class="inputbxs" placeholder="Packaging cost/ size of print"/></td>
    </tr>
    
    <tr>
     <td>Packaging time/print</td>
     <td><input type="text" name="packaging_time" id="packaging_time" class="inputbxs" placeholder="Packaging time/print"/></td>
    </tr>
    
    <tr>
    <td>Packaging material used</td>
    <td><input type="text" name="packaging_material" id="packaging_material" class="inputbxs" placeholder="Packaging material used"/></td>
    </tr>

    <tr>
    <td>Product branding options</td>
    <td><input type="text" name="packaging_branding" id="packaging_branding" class="inputbxs" placeholder="Product branding options"/></td>
    </tr>
    
    <!--------------------------------------------------------packaging_details_end/other_details_start-------------------------------------------------------------------------------->
    <tr style="background:#e5e5e5">
    <td>Other Details</td>
    <td>&nbsp;</td>
    </tr>

   <tr>
   <td>Delivery to framer</td>
  <td><input type="radio" name="delivery_to_framer" id="delivery_to_framer" value="1" checked>Yes</input><br/><input type="radio" name="delivery_to_framer" id="delivery_to_framer" value="0">No</input></td>
  </tr>
   
   <tr>
   <td>Delivery to office</td>
  <td><input type="radio" name="delivery_to_office" id="delivery_to_office" value="1" checked>Yes</input><br/><input type="radio" name="delivery_to_office" id="delivery_to_office" value="0">
No</input></td>
  </tr>
  
   <tr>
   <td>Pick up from office</td>
  <td><input type="radio" name="pick_office" id="pick_office" value="1" checked>Yes</input><br/><input type="radio" name="pick_office" id="pick_office" value="0">No</input></td>
  </tr>


  <tr>
   <td>Working on off days</td>
  <td><input type="radio" name="working_days" id="working_days" value="1" checked>Yes</input><br/><input type="radio" name="working_days" id="working_days" value="0">No</input></td>
  </tr>
  
   <tr>
    <td>Remarks</td>
    <td><textarea name="remark" id="remark" class="inputbxs" placeholder="Remarks"></textarea></td>
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
    <td>Preferred</td>
    <td><input type="radio" name="preferred" id="preferred" value="1" checked>Yes</input><br><input type="radio" name="preferred" value="0">No</input>
    </td>
    </tr>

   <!------------------------------------------------------------other_details_end/payment_details_start---------------------------------------------------------------------------------------------------->
    
 <tr style="background:#e5e5e5">
    <td>Payment Details</td>
    <td>&nbsp;</td>
    </tr>

   <tr>
   <tr>
    <td>Name on Cheque</td>
    <td><input type="text"name="cheque" id="cheque" class="inputbxs" placeholder="Name on Cheque"/></td>
    </tr>
   
   <tr>
    <td>Upload the file (If there is any change)</td>
    <td><input type="file" name="pdf_file" id="pdf_file" size="chars" /><br /><span id="pdf_error" style="color:#F00"></span></td>
    </tr>
<!---------------------------------------------------------payment_details_end------------------------------------------------------------------------------------------>
  
    <!--<tr>
    <td>Services Offered*</td>
    <td><select name="service[]" id="service" style="width:243px;" class="inputbxs" multiple>
    <option value="Delivery to Framer">Delivery to Framer</option>
    <option value="Delivery to us">Delivery to us</option>
    <option value="Print on Off days">Print on Off days</option>
    <option value="Delivery to Packager">Delivery to Packager</option>
    <option value="Delivery to Dispatcher">Delivery to Dispatcher</option>
    </select>
    <br /><span id="service_error" style="color:#F00"></span>
    </td>
    </tr>
	<tr>
    <td>Special Comments</td>
    <td><textarea name="comment" id="comment" class="inputbxs"></textarea></td>
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
    <td>Special Remark</td>
    <td><textarea name="remark" id="remark" class="inputbxs"></textarea></td>
    </tr>
	 <tr>
    <td>Preferred</td>
    <td><input type="radio" name="preferred" id="preferred" value="1" checked>Yes</input><br><input type="radio" name="preferred" value="0">No</input>
   

    </td>
    </tr>
    <tr>
    <td>Time Taken to Complete the Process</td>
    <td><input type="text" name="total_time" id="total_time"class="inputbxs"  /></td>
    </tr>
     <tr>
    <td>Upload the file (If there is any change)</td>
    <td><input type="file" name="pdf_file" id="pdf_file" size="chars" /><br /><span id="pdf_error" style="color:#F00"></span></td>
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


