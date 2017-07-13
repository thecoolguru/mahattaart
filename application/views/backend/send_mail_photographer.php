
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
<div class="main-hdr"> Send Mail to Photographer</div>
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
        <td width="120">Photographer</td>
        <td width="175"><select name="cp-names" id="cp-names" class="inputs">
          <option selected="selected">All channel partners</option>
          <option value="1">Rahul Gautam</option>
          <option value="2">Deepak Malik</option>
          <option value="3">Rohit Nagpal</option>
          <option value="4">Hitesh</option>
        </select></td>
        <td>
        <div id="number1" class="number"><table><tr>
        <td width="175"><select name="c-groups" id="c-groups" class="inputs">
          <option selected="selected">All Groups</option>
          <option value="5">Group-A</option>
          <option value="6">Group-B</option>
        </select></td>
        <td><textarea name="emails" cols="20" id="emails" class="emaillisting">hemant.chandi@ng.com
rahul.gautam@ng.com
deepak.malik@ng.com
saurav.gupta@ng.com
        </textarea>
             
        </td></tr></table></div></td>
      </tr>
    </table></td>
    </tr>
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



