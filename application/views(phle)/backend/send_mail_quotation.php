
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
<div class="main-hdr"> Send Mail for Quotation</div>
<form>
  <div class="send-mail">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
    <td width="150">From</td>
    <td>Walls n Art</td>
    </tr>
  <tr>
  <tr>
    <td width="150">To</td>
    <td  class="totd"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="175"><select name="cp-names" id="cp-names" class="inputs">
          <option>Select Company Name</option>
          <option value="1">Company A</option>
          <option value="2">Company B</option>
        </select></td>
        <td>
        <div id="number1" class="number">
          <select name="ph-names2" id="ph-names2" class="inputs">
            <option selected="selected">All</option>
            <option>Rahul, Manager-Sales</option>
            <option>Chander, Manager-Purchase</option>
          </select>
        </div></td>
      </tr>
    </table></td>
    </tr>
  <tr>
  <tr>
    <td>cc to</td>
    <td><input type="text" name="ccto" id="ccto" class="ccto"/></td>
  </tr>
  <tr>
    <td width="150">Subject</td>
    <td><input type="text" name="sbj" id="sbj" class="subject" /></td>
    </tr>
  <tr>
  <tr>
    <td width="150">Comments</td>
    <td><textarea name="msg-mail" id="msg-mail" cols="45" rows="5" class="message"></textarea></td>
    </tr>
  <tr>
    <td>Attachement</td>
    <td><input type="file" name="somename" size="chars"></td>
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



