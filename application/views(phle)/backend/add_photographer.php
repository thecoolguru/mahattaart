
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#area-interest').change(function() {
            $('div.number').hide();
            $('#number' + $(this).val()).show();
      }).change(); // Invoke it now
});

$(function(){ 
      $('#pacceptance').change(function() 
	  		{
            $('div.contract').hide();
            $('#number' + $(this).val()).show();

      }).change(); // Invoke it now
});

</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add Photographer</div>

<div class="add-newcp">
<div class="mndry">*Mandatory Fields</div>
<form>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="130">&nbsp;</td>
    <td width="225">&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="toptr">
    <td>Email*</td>
    <td><input type="text" name="fname15" id="fname15" class="inputbxs" /></td>
    <td>Password*</td>
    <td><input type="text" name="fname8" id="fname8" class="inputbxs" /></td>
  </tr>
  <tr class="toptr">
    <td>Access Level*</td>
    <td><input type="text" name="fname16" id="fname16" class="inputbxs" /></td>
    <td>Photographer ID*</td>
    <td><input type="text" name="fname17" id="fname17" class="inputbxs"  /></td>
  </tr>
  <tr class="toptr">
    <td>Individual / Agency *</td>
    <td><input type="text" name="fname4" id="fname4" class="inputbxs" /></td>
    <td>CP ID*</td>
    <td><input type="text" name="fname2" id="fname2" class="inputbxs" /></td>
  </tr>
  <tr>
    <td>First Name*</td>
    <td><input type="text" name="fname3" id="fname3" class="inputbxs" /></td>
    <td>Last Name*</td>
    <td><input type="text" name="fname14" id="fname14" class="inputbxs"  /></td>
  </tr>
  <tr>
    <td>Address Line 1</td>
    <td><input type="text" name="fname" id="fname" class="inputbxs" /></td>
    <td>Address Line 2</td>
    <td><input type="text" name="fname13" id="fname13" class="inputbxs" /></td>
  </tr>
  <tr>
    <td>City*</td>
    <td><input type="text" name="fname5" id="fname5" class="inputbxs" /></td>
    <td>State</td>
    <td><input type="text" name="fname12" id="fname12" class="inputbxs" /></td>
  </tr>
  <tr>
    <td>Country</td>
    <td><input type="text" name="fname6" id="fname6" class="inputbxs" /></td>
    <td>Pincode</td>
    <td><input type="text" name="fname11" id="fname11" class="inputbxs" /></td>
  </tr>
  <tr>
    <td colspan="4">
    <div class="area-wrapper">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="450"> <strong>Area of Interest </strong><br />
      <table width="365" border="0" cellspacing="0" cellpadding="0" style="padding:2px;">
        <tr>
          <td><input type="checkbox" name="ck1" id="ck1" /></td>
          <td>Art</td>
          <td><input type="checkbox" name="ck2" id="ck2" /></td>
          <td>Abstract</td>
          <td><input type="checkbox" name="ck3" id="ck3" /></td>
          <td>Fashion</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="ck4" id="ck4" /></td>
          <td>Food</td>
          <td><input type="checkbox" name="ck5" id="ck5" /></td>
          <td>Lifestyle</td>
          <td><input type="checkbox" name="ck6" id="ck6" /></td>
          <td>Industry</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="ck7" id="ck7" /></td>
          <td>Sports</td>
          <td><input type="checkbox" name="ck8" id="ck8" /></td>
          <td> Travel <br /></td>
          <td><input type="checkbox" name="ck9" id="ck9" /></td>
          <td>Wildlife</td>
        </tr>
        </table>
      <div id="numberothers" class="number">
  <textarea name="interest-other" id="interest-other" cols="38" rows="3" placeholder="Others (please specify here)"></textarea>
</div>
  </td>
        <td> Photographer Acceptance (Contract)
    
          <br />
          <br />
          <select name="pacceptance" id="pacceptance">
        <option value="plsselect" selected="selected">Please Select</option>
        <option value="onlinesigned">Online Signed</option>
        <option value="offlinesigned">Offline Signed</option>
      </select>
          <br />
          <br />
      <div id="numberonlinesigned" class="contract"><a href="#">Retreive the Contract</a></div><br />
      <div id="numberofflinesigned" class="contract">Upload the Contract<br />
        <br />
<input type="file" name="somename" size="chars"></div>
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
    <td><input type="submit" name="addcpn" id="addcpn" value="Add" class="bt-add" /></td>
  </tr>
</table>

</form>
</div>


<a href="javascript:window.history.back()" class="bt-back"> Back </a>

</div>
</div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


