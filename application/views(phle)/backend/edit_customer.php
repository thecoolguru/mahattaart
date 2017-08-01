
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
</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Edit Customer</div>

<div class="add-newcp"> <span style="color:red"><?= $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form action="<?=base_url()?>index.php/backend/edit_customer/<?= $customer->customer_id;?>" method="post" onsubmit="return validate();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
  <td width="260"> <strong> Business Type </strong></td>
  <td><select name="business_type" id="business_type">
              <option value="" <?php if($customer->customer_business_type==''){?> selected="selected" <?php } ?>>Select Business Type</option>
              <option <?php if($customer->customer_business_type=='B2B'){?> selected="selected" <?php } ?>>B2B</option>
              <option  <?php if($customer->customer_business_type=='B2C'){?> selected="selected" <?php } ?>>B2C</option>
       
            </select></td>
   
  <td width="260"> <strong> Region </strong></td>
  <td><select name="region" id="region">
              <option value="" <?php if($customer->customers_region==''){?> selected="selected" <?php } ?>>Select Region</option>
              <option <?php if($customer->customers_region=='East'){?> selected="selected" <?php } ?>>East</option>
              <option <?php if($customer->customers_region=='West'){?> selected="selected" <?php } ?>>West</option>
               <option <?php if($customer->customers_region=='North'){?> selected="selected" <?php } ?>>North</option>
                <option <?php if($customer->customers_region=='South'){?> selected="selected" <?php } ?>>South</option>
       
            </select></td>
  </tr>
  <tr>

   
  <td width="260"> <strong> Account Type </strong></td>
  <td><select name="account_type" id="account_type">
              <option value="" <?php if($customer->customers_account_type==''){?> selected="selected" <?php } ?>>Select Account Type</option>
              <option <?php if($customer->customers_account_type=='Focus'){?> selected="selected" <?php } ?>>Focus</option>
              <option <?php if($customer->customers_account_type=='Not Focus'){?> selected="selected" <?php } ?>>Not Focus</option>
        </select></td>
 
  </tr>
<br />
<tr>
</tr>
  <tr style="background:#e5e5e5">
    <td>Sign In Information</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td>Email Address*</td>
    <td><input type="text" name="email" id="email" class="inputbxs" value="<?= $customer->email_id;?>"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td>Password*</td>
    <td><input type="password" name="password" id="password"  class="inputbxs" value="<?= $customer->password;?>"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
 
  <tr style="background:#e5e5e5">
    <td>Personal Details</td>
    <td>&nbsp;</td>
    <td>Mailing Information</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>First Name*</td>
    <td><input type="text" name="fname" id="fname" class="inputbxs" value="<?= $customer->first_name;?>"/></td>
    <td>Address Line *</td>
    <td><input type="text" name="address" id="address" class="inputbxs" value="<?= $customer->address;?>"/></td>
  </tr>
  <tr>
    <td>Last Name*</td>
    <td><input type="text" name="lname" id="lname" class="inputbxs" value="<?= $customer->last_name;?>"/></td>
    <td>City*</td>
    <td><input type="text" name="city" id="city" class="inputbxs" value="<?= $customer->city;?>"/></td>
    </tr>
  <tr>
    <td>Company Name *</td>
    <td><input type="text" name="company_name" id="company_name" class="inputbxs"  value="<?= $customer->company_name;?>"  readonly /></td>
    <td>State*</td>
    <td><input type="text" name="state" id="state" class="inputbxs" value="<?= $customer->state;?>" /></td>
  </tr>
  <tr>
    <td>Company Type</td>
    <td><input type="text" name="company_type" id="company_type"class="inputbxs" value="<?= $customer->company_type;?>" readonly /></td>
    
    <td>Postcode</td>
    <td><input type="text" name="pincode" id="pincode" class="inputbxs" value="<?= $customer->zip_code;?>"/></td>
  </tr>
  <tr>
    <td>Job Description</td>
    <td><input type="text" name="job" id="job" class="inputbxs" value="<?= $customer->job;?>"/></td>
    <td>Country*</td>
    <td><input type="text" name="country" id="country" class="inputbxs" value="<?= $customer->country;?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Contact Number*</td>
    <td><input type="text" name="contact" id="contact" class="inputbxs" value="<?= $customer->contact?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="upload images" id="upload images" value="EDIT"  /></td>
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


