<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.6.1.min.js"></script>
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
function validateField(field) {

  var input = document.getElementById(field);
  
  input.style.borderColor = "";
  input.style.backgroundColor = "";

  if (input.value.trim() == "") {
    
    input.style.borderColor = "#c00";
    input.style.backgroundColor = "#fee";
    return false;
  }
  return true;
}

function validate() {
  var valid = true;
  var fields = ['email', 'cpid', 'fname','lname'];
  for (var i in fields) {
    valid = validateField(fields[i]) && valid;
  }

  return valid;
}

</script>
<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Edit Profile</div>

<div class="add-newcp">
<div class="mndry">*Mandatory Fields</div>
<form name="editcp" action="<?php echo base_url();?>index.php/channel_partners/editcp" method="post" onsubmit="return validate();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="130">&nbsp;</td>
    <td width="225">&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="toptr">
    <td>Email*</td>
    <td><input name="email" type="text" class="inputbxs" id="email" value="<?php print $details->email_id; ?>" /></td>
    <td>CP ID*</td>
    <td><input name="cpid" type="text" class="inputbxs" id="cpid" value="<?php print $details->cp_id; ?>" readonly/></td>
    
  </tr>
  <tr>
    <td>First Name*</td>
    <td><input name="fname" type="text" class="inputbxs" id="fname" value="<?php print $details->first_name; ?>" /></td>
    <td>Last Name*</td>
    <td><input name="lname" type="text" class="inputbxs" id="lname" value="<?php print $details->last_name; ?>" /></td>
  </tr>
  <tr>
    <td>Address Line 1</td>
    <td><input name="address1" type="text" class="inputbxs" id="address1" value="<?php print $details->address1; ?>" /></td>
    <td>Address Line 2</td>
    <td><input name="address2" type="text" class="inputbxs" id="address2" value="<?php print $details->address2; ?>" /></td>
  </tr>
  <tr>
    <td>City</td>
    <td><input name="city" type="text" class="inputbxs" id="city" value="<?php print $details->city; ?>" /></td>
    <td>State</td>
    <td><input name="state" type="text" class="inputbxs" id="state" value="<?php print $details->state; ?>" /></td>
  </tr>
  <tr>
    <td>Country</td>
    <td><input name="country" type="text" class="inputbxs" id="country" value="<?php print $details->country; ?>" /></td>
    <td>Pincode</td>
    <td><input name="pin" type="text" class="inputbxs" id="pin" value="<?php print $details->pin_code; ?>" /></td>
  </tr>
  <tr>
    <td>Contact Number</td>
    <td><input name="contact" type="text" class="inputbxs" id="contact" value="<?php print $details->contact_no; ?>" /></td>
    <td>Contact Person Name</td>
    <td><input name="contact_person" type="text" class="inputbxs" id="contact_person" value="<?php print $details->contact_person_name; ?>" /></td>
  </tr>
  <tr>
    <td colspan="4">
    <div class="area-wrapper">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr><?php $abc=explode(",",$details->area_of_interest);$newkey=array();$newkey['art']="";$newkey['abstract']="";$newkey['fashion']="";$newkey['food']="";$newkey['travel']="";$newkey['sports']="";$newkey['lifestyle']="";$newkey['industry']="";$newkey['wildlife']="";
        foreach ($abc as $key) {
         $newkey[$key]=$key;
        } ?>
        <td width="365"><strong>Area of Interest </strong><br />
          <table width="90%" border="0" cellspacing="0" cellpadding="0" style="padding:2px;">
            <tr>
              <td><?php if($newkey['art']=="art"){?><input type="checkbox" name="ck1" id="ck1" value="art" checked/><?php }else{ print '<input type="checkbox" name="ck1" value="art" />';} ?></td>
              <td>Art</td>
              <td><?php if($newkey['abstract']=="abstract"){?><input type="checkbox" name="ck2" id="ck2" value="abstract" checked/><?php }else{print '<input type="checkbox" name="ck2" value="abstract"/>';} ?></td>
              <td>Abstract</td>
              <td><?php if($newkey['fashion']=="fashion"){?><input type="checkbox" name="ck3" id="ck3" value="fashion" checked/><?php }else{ print '<input type="checkbox" name="ck3" value="fashion"/>';} ?></td>
              <td>Fashion</td>
              <td><?php if($newkey['food']=="food"){?><input type="checkbox" name="ck4" id="ck4" value="food" checked/><?php }else{ ?><input type="checkbox" name="ck4" value="food"/><?php } ?></td>
              <td>Food</td>
              <td><?php if($newkey['lifestyle']=="lifestyle"){?><input type="checkbox" name="ck5" id="ck5" value="lifestyle" checked/><?php }else{ print '<input type="checkbox" name="ck5" value="lifestyle"/>';} ?></td>
              <td>Lifestyle</td>
              <td><?php if($newkey['industry']=="industry"){?><input type="checkbox" name="ck6" id="ck6" value="industry" checked/><?php }else{ print '<input type="checkbox" name="ck6" value="industry"/>';} ?></td>
              <td>Industry</td>
            </tr>
            <tr>
              <td><?php if($newkey['sports']=="sports"){?><input type="checkbox" name="ck7" id="ck7" value="sports" checked/><?php }else{ print '<input type="checkbox" name="ck7" value="sports"/>';} ?></td>
              <td>Sports</td>
              <td><?php if($newkey['travel']=="travel"){?><input type="checkbox" name="ck8" id="ck8" value="travel" checked/><?php }else{ print '<input type="checkbox" name="ck8" value="travel"/>';} ?></td>
              <td> Travel <br /></td>
              <td><?php if($newkey['wildlife']=="wildlife"){?><input type="checkbox" name="ck9" id="ck9" value="wildlife" checked/><?php }else { print '<input type="checkbox" name="ck9" value="wildlife"/>';} ?></td>
              <td>Wildlife</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
          <br />
          <br />
  <div id="numberothers" class="number">
  <textarea name="interest-other" id="interest-other" cols="35" rows="3" placeholder="Others (please specify here)"><?php print $details->other_interests;?></textarea>
  </div>
        </td>
        </tr>
    </table>

    
    
    </div>
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="addcpn" id="addcpn" value="Update" class="bt-add" /></td>
  </tr>
</table>

</form>
</div>




<a href="javascript:window.history.back()" class="bt-back"> Back </a>



</div>
</div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


