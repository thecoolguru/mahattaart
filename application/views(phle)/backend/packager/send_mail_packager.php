
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#cp-names').change(function() {
            $('div.number').hide();
            $('#number' + $(this).val()).show();
      }).change(); // Invoke it now
});

</script>


<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Send Mail to Packager</div>
<form>
  <div class="send-mail">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td width="150">Packaging Vendor</td>
    <td  class="totd"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="175"><select name="cp-names" id="cp-names" class="inputs">
          <option>Select Vendor</option>
          <option value="1">XYZ</option>
          <option value="2">ABC</option>
        </select></td>
        <td>
        <div id="number1" class="number"><table><tr>
        <td><textarea name="emails" cols="20" id="emails" class="emaillisting">saurav.gupta@ng.com
rahul.gautam@ng.com
deepak.malik@ng.com</textarea>
          
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
  <tr>
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



