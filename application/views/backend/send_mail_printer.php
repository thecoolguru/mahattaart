<?php $printers=$this->backend_model->get_printer();?>

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
function get_email(printer)
{
	if(printer)
	{
	document.getElementById('number1').style.display="block";
	}
	else
	{
		document.getElementById('number1').style.display="none";
	}
	
	var datastring='vender_id=' +printer;
	$.ajax({ 
	
	type: "POST",
	url: "<?=base_url();?>index.php/backend/get_printer_mails",
	data: datastring,
	success:function(data)
	{
		 var d=data.killWhiteSpace();
		$('#emails').val(d);
	}
	
	});
}

String.prototype.killWhiteSpace = function() {
    return this.replace(/\s/g, '');
};
</script>
<script type="text/javascript">
$(document).ready(function(){
			
		$("#send_mail_printer").submit(function(){
			
			if($('#cp-names').val()=='')
			{
				$('#name_error').html("Choose Printer Name");
				return false;
			}
			else if($('#msg-mail').val()=='')
			{
				$('#name_error').html("");
				$('#msg_error').html("Give Some Message");
				return false;
				
			}
		});
});
</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container">  <span style="color:red;"> <?= $msg;?> </span>
<div class="main-hdr"> Send Mail to Printers</div>
<form id="send_mail_printer"  action="<?=base_url()?>index.php/backend/send_mail_printer" method="post">
  <div class="send-mail">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td width="150">Printers</td>
    <td  class="totd"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="175"><select name="cp-names" id="cp-names" class="inputs" onchange="get_email(this.value);">
          <option value="">Select Printer</option>
          <?php foreach($printers as $printer){?>
          <option value="<?=$printer['vender_id'];?>"><?=$printer['vender_company_name'];?></option>
          <?php } ?>
        </select></td><span style="color:red;" id="name_error"></span>
        <td>
        <div id="number1" class="number" style="display:none"><table><tr>
        <td><textarea name="emails" cols="20" id="emails" class="emaillisting" ></textarea>
          
        </td></tr></table></div></td>
      </tr>
    </table></td>
    </tr>
      <tr>
    <td width="150">From</td>
    <td>Walls n Art</td>
    </tr>
  <tr>
  
  <tr>
  <tr>
    <td width="150">Subject</td>
    <td><input type="text" name="sbj" id="sbj" class="subject" /></td>
    </tr>
  <tr>
  <tr>
    <td width="150">Message</td>
    <td><textarea name="msg-mail" id="msg-mail" cols="45" rows="5" class="message"></textarea></td>
    </tr>
  <tr><br /><span style="color:red" id="msg_error"></span>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="upload images" id="upload images" value="Send" class="bt-sbt-upload" /></td>
  </tr>
</table>
  </div>
</form>


</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


