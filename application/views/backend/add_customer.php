<?php $data=$this->backend_model->get_parent_customers();?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
function validateField(field) {

  var input = document.getElementById(field);
 //alert(input); 
  input.style.borderColor = "";
  input.style.backgroundColor = "";

  if (input.value.trim() == "" || (field == "email" && input.value.match(/[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/) == null) || field == "contact" && input.value.length<'10' ) {
    
    input.style.borderColor = "#c00";
    input.style.backgroundColor = "#fee";
    return false;
  }
  return true;
}

function validate() {
  var valid = true;
  var fields = ['email', 'password' , 'cfmpassword' , 'fname', 'lname' , 'company_name' , 'address' , 'city' , 'state' , 'country' , 'contact'];
  for (var i in fields) {
    valid = validateField(fields[i]) && valid;
  }

  return valid;
}
</script>

<script type = "text/javascript">
function showMessage(which) {
if (which == 1) {
document.getElementById("fine").style.display = "block";
document.getElementById("fill").style.display = "none";
}
else {
document.getElementById("fine").style.display = "none";
document.getElementById("fill").style.display = "block";
}
}
</script>

<script type="text/javascript">
function get_customer_data(id)
{
	var datastring='customer_id=' + id ;
				$.ajax({
					    type: "POST",
					    url: "<?php print base_url() ?>index.php/backend/get_parent_customer_detail",
					    data: datastring,
						 success: function(data)
					   {
						 var a = data.split('/');
						var b=a['0'];
						 var c=a['1'];
					     var d=b.killWhiteSpace();
						 var e=c.killWhiteSpace();
			  $('#company_name').val(d);
			  $('#company_name').attr('readonly', true);
              $('#company_type').val(e);
						$('#company_type').attr('readonly', true);
							}
						});
}

String.prototype.killWhiteSpace = function() {
    return this.replace(/\s/g, '');
};</script>


<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add New Customer</div>

<div class="add-newcp"> <span style="color:red"><?= $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form action="<?=base_url()?>index.php/backend/add_customer" method="post" onsubmit="return validate();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:none; padding:2px">
      <tr>
        <td width="220"><input name="radio" type="radio" id="addnco" value="addnco" checked="checked"  onclick = "showMessage(2)" />
          <strong> ADD NEW CUSTOMER</strong></td>
        <td width="260"><strong>
          <input type="radio" name="radio" id="addtoco" value="addtoco"  onclick = "showMessage(1)" style="margin-left:25px;" />
ADD TO EXISTING COMPANY</strong>
          </td>
        <td><div id="fine" style="display:none">
            <select name="companies" id="companies" onchange="get_customer_data(this.value)">
            <option value="">Select a Company</option>
            <?php foreach($data as $company){?>
              <option value="<?= $company['customer_id'];?>"><?= $company['company_name'];?></option>
            <?php } ?>
            </select>
          </div></td>
      </tr>
    </table></td>
  </tr>

  <tr> 
  <td width="260">Add Business Type</td>
  <td><select name="business_type" id="business_type">
              <option value="">Select Business Type</option>
              <option>B2B</option>
              <option>B2C</option>
       
            </select></td>
   
  <td width="260">Region</td>
  <td><select name="region" id="region">
              <option value="">Select Region</option>
              <option>East</option>
              <option>West</option>
               <option>North</option>
                <option>South</option>
       
            </select></td>
  </tr>
  <tr>
   
  <td width="260">Account Type</td>
  <td><select name="account_type" id="account_type">
              <option value="">Select Account Type</option>
              <option>Focus</option>
              <option>Not Focus</option>
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
    <td><input type="text" name="email" id="email" class="inputbxs" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td>Password*</td>
    <td><input type="password" name="password" id="password" placeholder="(Your password should be 4-10 characters)" class="inputbxs" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td>Confirm Password</td>
    <td><input type="password" name="cfmpassword" id="cfmpassword" class="inputbxs" /></td>
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
    <td><input type="text" name="fname" id="fname" class="inputbxs" /></td>
    <td>Address Line *</td>
    <td><input type="text" name="address" id="address" class="inputbxs" /></td>
  </tr>
  <tr>
    <td>Last Name*</td>
    <td><input type="text" name="lname" id="lname" class="inputbxs" /></td>
    <td>City*</td>
    <td><input type="text" name="city" id="city" class="inputbxs" /></td>
    </tr>
  <tr>
    <td>Company Name *</td>
    <td><input type="text" name="company_name" id="company_name" class="inputbxs" /></td>
    <td>State*</td>
    <td><input type="text" name="state" id="state" class="inputbxs" /></td>
  </tr>
  <tr>
    <td>Company Type</td>
    <td><input type="text" name="company_type" id="company_type"class="inputbxs" value="" /></td>
    
    <td>Postcode</td>
    <td><input type="text" name="pincode" id="pincode" class="inputbxs" /></td>
  </tr>
  <tr>
    <td>Job Description</td>
    <td><input type="text" name="job" id="job" class="inputbxs" /></td>
    <td>Country*</td>
    <td><input type="text" name="country" id="country" class="inputbxs" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Contact Number*</td>
    <td><input type="text" name="contact" id="contact" class="inputbxs" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="upload images" id="upload images" value="Add"  /></td>
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


