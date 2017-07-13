
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
function validateField(field) {

  var input = document.getElementById(field);
 //alert(input); 
  input.style.borderColor = "";
  input.style.backgroundColor = "";

  if (input.value.trim() == "" || (field == "email" && input.value.match(/[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/) == null)|| field == "contact" && input.value.length<'10' ) {
    
    input.style.borderColor = "#c00";
    input.style.backgroundColor = "#fee";
    return false;
  }
  return true;
}

function validate() {
  var valid = true;
  var fields = ['email', 'password' , 'fname', 'lname' ,  'address' , 'city' , 'state' , 'country' , 'contact'];
  for (var i in fields) {
    valid = validateField(fields[i]) && valid;
  }

  return valid;
}


	function enable_Industry()

    {
	var Industry=document.getElementById("occupation").value;
  //alert(Industry);
	  if(Industry=='Other')
	   	{
		document.getElementById('industry').style.display="block";
		}else if(Industry!='Other'){
		document.getElementById('industry').style.display="none";
		}
    }// end function
	

</script>

<!--MIDDLE PAGE WRAPPER STARTS-->

<!--MIDDLE PAGE WRAPPER ENDS-->
</div>


<div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Edit Customer</div>

<div class="add-newcp"> <span style="color:red"><?= $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
    <div> <?php echo validation_errors();?></div>
<form action="<?=base_url()?>index.php/customer/edit_customer/<?= $customer->id;?>" method="post" onsubmit="return validate();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>First Name*</td>
    <td><input type="text" name="fname" id="fname" class="inputbxs" value="<?= $customer->first_name;?>" /></td>
    <td>Last Name*</td>
    <td><input type="text" name="lname" id="lname" class="inputbxs" value="<?= $customer->last_name;?>"/></td>
  </tr>
  <tr>
    <td>Email ID*</td>
    <td><input type="text" name="email" id="email" class="inputbxs" value="<?= $customer->email_id;?>"/></td>
    <td>Industry*</td>
    <td><select name="occupation" id="occupation" class="inputbxs" onchange="enable_Industry()">
        <option value=""<?php if($customer->industry==''){?> selected="selected" <?php } ?>>Select</option>
        <option <?php if($customer->industry=='Architect'){?> selected="selected" <?php } ?>>Architect</option>
		<option <?php if($customer->industry=='Business'){?> selected="selected" <?php } ?>>Business</option>
		<option <?php if($customer->industry=='Furnishing'){?> selected="selected" <?php } ?>>Furnishing</option>
		 <option <?php if($customer->industry=='Hospitality'){?> selected="selected" <?php } ?>>Hospitality</option>
		 <option <?php if($customer->industry=='Interior_Architect'){?> selected="selected" <?php } ?>>Interior/Architect</option>
		<option <?php if($customer->industry=='Service'){?> selected="selected" <?php } ?>>Service</option>
		<option <?php if($customer->industry=='Other'){?> selected="selected" <?php } ?>>Other</option>
      
        </select></td>
  </tr>
 <tr>
		  <td></td> <td></td><td></td><td><input  name="industry" id="industry" class="inputbxs"  placeholder="Other Industry"  style="display:none;"  /></td></tr>
		  <tr>
  <tr>
    <td>Gender*</td>
    <td><select name="gender" id="gender" class="inputbxs">
              <option value="" <?php if($customer->gender==''){?> selected="selected" <?php } ?>>Select gender</option>
              <option <?php if($customer->gender=='Male'){?> selected="selected" <?php } ?>>Male</option>
              <option <?php if($customer->gender=='Female'){?> selected="selected" <?php } ?>>Female</option>
              
            </select></td>
    <td><!--Marital Status*--></td>
    <td><!--<select name="mstatus" id="mstatus">
              <option value="" <?php if($customer->martial_status==''){?> selected="selected" <?php } ?>>Select Martial Status</option>
              <option <?php if($customer->martial_status=='Married'){?> selected="selected" <?php } ?>>Married</option>
              <option <?php if($customer->martial_status=='Unmarried'){?> selected="selected" <?php } ?>>Unmarried</option>
              
            </select>--></td>
    </tr>
  <tr>
    <td>Address*</td>
    <td colspan="3"><input type="text" name="address" id="address" class="inputbxs" style="width:600px" value="<?= $customer->address;?>" /></td>
    </tr>
  <tr>
    <td>Country*</td>
    <td><input type="text" name="country" id="country" class="inputbxs" value="<?= $customer->country;?>"/></td>
    <td>State*</td>
    <td><select name="state" id="state" class="inputbxs">
              <option value="" <?php if($customer->state==''){?> selected="selected" <?php } ?>>Select State</option>
              <option <?php if($customer->state=='Andhra Pradesh'){?> selected="selected" <?php } ?>>Andhra Pradesh</option>
              <option  <?php if($customer->state=='Arunachal Pradesh'){?> selected="selected" <?php } ?>>Arunachal Pradesh</option>
              <option  <?php if($customer->state=='Assam'){?> selected="selected" <?php } ?>>Assam</option>
              <option  <?php if($customer->state=='Bihar'){?> selected="selected" <?php } ?>>Bihar</option>
              <option  <?php if($customer->state=='Chhattisgarh'){?> selected="selected" <?php } ?>>Chhattisgarh</option>
              <option  <?php if($customer->state=='Goa'){?> selected="selected" <?php } ?>>Goa</option>
              <option  <?php if($customer->state=='Gujrat'){?> selected="selected" <?php } ?>>Gujrat</option>
              <option  <?php if($customer->state=='Haryana'){?> selected="selected" <?php } ?>>Haryana</option>
              <option  <?php if($customer->state=='Himachal Pradesh'){?> selected="selected" <?php } ?>>Himachal Pradesh</option>
              <option  <?php if($customer->state=='Jammu and Kashmir'){?> selected="selected" <?php } ?>>Jammu and Kashmir</option>
              <option  <?php if($customer->state=='Jharkhand'){?> selected="selected" <?php } ?>>Jharkhand</option>
              <option  <?php if($customer->state=='Karnataka'){?> selected="selected" <?php } ?>>Karnataka</option>
              <option  <?php if($customer->state=='Kerala'){?> selected="selected" <?php } ?>>Kerala</option>
              <option  <?php if($customer->state=='Madhya Pradesh'){?> selected="selected" <?php } ?>>Madhya Pradesh</option>
              <option  <?php if($customer->state=='Maharashtra'){?> selected="selected" <?php } ?>>Maharashtra</option>
              <option  <?php if($customer->state=='Manipur'){?> selected="selected" <?php } ?>>Manipur</option>
              <option  <?php if($customer->state=='Meghalaya'){?> selected="selected" <?php } ?>>Meghalaya</option>
              <option  <?php if($customer->state=='Mizoram'){?> selected="selected" <?php } ?>>Mizoram</option>
              <option  <?php if($customer->state=='Nagaland'){?> selected="selected" <?php } ?>>Nagaland</option>
              <option  <?php if($customer->state=='Orissa'){?> selected="selected" <?php } ?>>Orissa</option>
              <option  <?php if($customer->state=='Punjab'){?> selected="selected" <?php } ?>>Punjab</option>
              <option  <?php if($customer->state=='Rajasthan'){?> selected="selected" <?php } ?>>Rajasthan</option>
              <option  <?php if($customer->state=='Sikkim'){?> selected="selected" <?php } ?>>Sikkim</option>
              <option  <?php if($customer->state=='Tamil Nadu'){?> selected="selected" <?php } ?>>Tamil Nadu</option>
              <option  <?php if($customer->state=='Tripura'){?> selected="selected" <?php } ?>>Tripura</option>
              <option  <?php if($customer->state=='Uttar Pradesh'){?> selected="selected" <?php } ?>>Uttar Pradesh</option>
              <option  <?php if($customer->state=='Uttarakhand'){?> selected="selected" <?php } ?>>Uttarakhand</option>
              <option  <?php if($customer->state=='West Bengal'){?> selected="selected" <?php } ?>>West Bengal</option>
                     
            </select></td>
  </tr>
  <tr>
    <td>City*</td>
    <td><input type="text" name="city" id="city" class="inputbxs" value="<?= $customer->city;?>"/>  </td>
    <td>Region*</td>
    <td><select name="region" id="region" class="inputbxs">
      <option value="" >Select Region</option>
      <option <?php if($customer->region=='East'){?> selected="selected" <?php } ?>>East</option>
      <option <?php if($customer->region=='West'){?> selected="selected" <?php } ?>>West</option>
        <option <?php if($customer->region=='North'){?> selected="selected" <?php } ?>>North</option>
        <option <?php if($customer->region=='South'){?> selected="selected" <?php } ?>>South</option>
    </select></td>
  </tr>
  <tr>
    <td>Company Name</td>
    <td><input type="text" name="company_name" id="company_name" class="inputbxs" value="<?= $customer->company_name;?>"/></td>
    <td>Contact Number*</td>
    <td><input type="text" name="contact" id="contact" class="inputbxs" value="<?= $customer->contact?>" /></td>
  </tr>
  <tr>
    <td>Purpose*</td>
    <td><select name="purpose" id="purpose">
      <option value="" <?php if($customer->purpose==''){?> selected="selected" <?php } ?>>Select purpose</option>
      <option <?php if($customer->purpose=='Home'){?> selected="selected" <?php } ?>>Home</option>
      <option <?php if($customer->purpose=='Personal'){?> selected="selected" <?php } ?>>Personal</option>
      <option <?php if($customer->purpose=='Official'){?> selected="selected" <?php } ?>>Official</option>
      <option <?php if($customer->purpose=='Gift'){?> selected="selected" <?php } ?>> Gift</option>
    </select></td>
    <td>Pin Code*</td>
    <td><input  type="text" name="pincode" id="pincode" class="inputbxs" value="<?= $customer->zip_code;?>" /></td>
  </tr>
  
  <tr>
    <td><input type="submit" class="bt-sbt-upload" name="upload images" id="upload images" value="Save"  /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
</form>
</div>




</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>

