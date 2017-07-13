
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
  var fields = ['pwd', 'npwd', 'cpwd'];
  for (var i in fields) {
    valid = validateField(fields[i]) && valid;
  }

  return valid;
}


</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Change Password</div>

<div class="add-newcp"><div><?php echo $msg; ?></div>
<div class="mndry">*Mandatory Fields</div>
<form name="changepwd" action="<?php echo base_url();?>index.php/channel_partners/changepwd" method="post" onsubmit="return validate();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="130">&nbsp;</td>
    <td width="225">&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="toptr">
    
    <td>Old Password*</td>
    <td><input type="password" name="pwd" id="pwd" class="inputbxs" value=""></td>
  </tr>
  <tr class="toptr">
    <td>New Password*</td>
    <td><input name="npwd" type="password" class="inputbxs" id="npwd" /></td>
    
  </tr>
  <tr class="toptr">
    <td>Confirm Password*</td>
    <td><input name="cpwd" type="password" class="inputbxs" id="cpwd" /></td>
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


