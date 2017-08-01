<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#user-type').change(function() {
            $('div.number').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
	  
	  $('#user-list').change(function() {
            $('div.number').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
	  
	  $('#user-rights').change(function() {
            $('div.number').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});
</script>
<div id="middle-wrapper">
<div id="middle-container">
  <div class="main-hdr"> Assign Roles</div>
 <form>
 <div class="view-cp">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td width="180">Please select User type</td>
       <td width="200"><select name="user-type" id="user-type" class="inputs">
         <option selected="selected">Select</option>
         <option value="cp">Channel Partner</option>
         <option value="cp">Photographer</option>
         <option value="cp">Accounts</option>
         <option value="cp">Sales</option>
         <option value="cp">Client Service</option>
         <option value="cp">HR</option>
       </select></td>
       <td width="220"><div id="number-cp" class="number"> <select name="user-list" id="user-list" class="inputs">
         <option selected="selected">Select</option>
         <option value="ng">National Geographic</option>
         <option value="ng">istock</option>
       </select></div></td>
       <td><div id="number-ng" class="number"> <select name="user-rights" id="user-rights" class="inputs">
         <option selected="selected">Select</option>
         <option value="DP">Deepak Pathak</option>
         <option value="DP">Suresh Aggarwal</option>
       </select></div></td>
     </tr>
  </table>
</div>
<div>

</div>

<div id="number-DP" class="number">
<div class="roles-navs">
<ul>
<li>
  <label>
    <input type="checkbox" name="VON" id="VON" />   VIEW ONLINE SALES</label>
</li>
<li>
  <label>Channel Partners</label> 
<ul>
<li>    <label>   <input type="checkbox" name="CP-A" id="CP-A" />    ADD NEW</label></li>
<li>   <label>    <input type="checkbox" name="cpad2" id="cpad2" />    VIEW</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" />    SEND MAIL</label></li>

</ul>
</li>
<li>
  <label>  CUSTOMERS</label>
  <ul>
  <li>  
  <label>    <input type="checkbox" name="CP-A" id="CP-A" />    ADD NEW</label>
</li>
<li> 
  <label>    <input type="checkbox" name="cpad2" id="cpad2" />    VIEW</label>
</li>
<li>
  <label>    <input type="checkbox" name="checkbox" id="checkbox" />    SEND MAIL</label>
</li>
</ul>
</li>
<li>   <label>    Photographers</label>
  <ul>
    <li>  
    <label>
      <input type="checkbox" name="CP-A" id="CP-A" />    ADD NEW</label>
  </li>
  <li> 
    <label>
      <input type="checkbox" name="cpad2" id="cpad2" />    VIEW</label>
  </li>
  <li>
    <label>
      <input type="checkbox" name="checkbox" id="checkbox" />
      SEND MAIL</label>
  </li>
</ul>
</li>
</ul>
</div>

<div class="roles-navs" style="height:450px">
<ul>
<li>
  <label>
    <input type="checkbox" name="checkbox2" id="checkbox2" />    Manage Search keywords</label>
</li>
<li> Manage Images
<ul>
<li>    <label>   <input type="checkbox" name="CP-A" id="CP-A" /> 
Multi View Images</label></li>
<li>   <label>    <input type="checkbox" name="cpad2" id="cpad2" />    Waiting Images</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" /> Change Images on Website</label></li>

</ul>
</li>
<li> Manage Orders
<ul>
<li>    <label>   <input type="checkbox" name="CP-A" id="CP-A" /> Create Quotation</label></li>
<li>   <label>    <input type="checkbox" name="cpad2" id="cpad2" />  View /Convert Quotation</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" /> View Invoice</label></li>


</ul>
</li>

</ul>
</div>

<div class="roles-navs" style="margin:25px 0 25px 0; padding:0 ; border:none">
<ul>

<li> Manage Vendors
<ul>
<li>  Printers
<ul>
<li>    <label>   <input type="checkbox" name="CP-A" id="CP-A" /> ADD NEW</label></li>
<li>   <label>    <input type="checkbox" name="cpad2" id="cpad2" /> 
View Orders</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" />    
SEND MAIL</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" /> 
Active/Inactive</label></li>


</ul>
</li>
<li>  Framers
<ul>
<li>    <label>   <input type="checkbox" name="CP-A" id="CP-A" />    ADD NEW</label></li>
<li>   <label>    <input type="checkbox" name="cpad2" id="cpad2" /> 
View Orders</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" />    SEND MAIL</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" /> 
Active/Inactive</label></li>
</ul>
</li>
<li>  Packaging
<ul>
<li>    <label>   <input type="checkbox" name="CP-A" id="CP-A" />    ADD NEW</label></li>
<li>   <label>    <input type="checkbox" name="cpad2" id="cpad2" /> 
View Orders</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" />    SEND MAIL</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" /> 
Active/Inactive</label></li>
</ul>
</li>
<li>  Courier
<ul>
<li>    <label>   <input type="checkbox" name="CP-A" id="CP-A" />    ADD NEW</label></li>
<li>   <label>    <input type="checkbox" name="cpad2" id="cpad2" /> 
View Orders</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" />    SEND MAIL</label></li>
<li>  <label>    <input type="checkbox" name="checkbox" id="checkbox" /> 
Active/Inactive</label></li>
</ul></li>
</ul>
</li>

</ul>
</div>
<div style="float:left; width:80%; display:block; margin:25px 0; padding-left:40px">
<input type="submit" name="upload images" id="upload images" value="Submit" class="bt-sbt-upload" /></div>
</div>
 </form> 
</div>
</div>

</div>
