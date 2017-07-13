


<link rel="stylesheet" type="text/css" href="css/anylinkmenu.css" />
<script type="text/javascript" src="js/menucontents.js"></script>
<script type="text/javascript" src="js/anylinkmenu.js">

</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>


<script type="text/javascript" language="javascript">// <![CDATA[
function PhotographersList() {
    var ele = document.getElementById("PhotographersListDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}
// ]]></script>






<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> View Quotation</div>
<form>
<div class="view-cp">

<div class="searchc" style="width:100%">Search Quotation Parameters</div>
<br />
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="130">Company Name</td>
    <td><select name="ph-names2" id="ph-names2" class="inputs">
      <option>Please Select</option>
      <option>Company A</option>
      <option>Company B</option>
    </select></td>
    <td width="145">Contact Person</td>
    <td colspan="2"><select name="ph-names3" id="ph-names3" class="inputs">
      <option selected="selected">Please Select</option>
      <option>Rahul, Manager-Sales</option>
      <option>Chander, Manager-Purchase</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Quotation ID</td>
    <td width="180"><select name="ph-names" id="ph-names" class="inputs">
      <option selected="selected">All</option>
      <option>xxxx52</option>
      <option>xxxx56</option>
      <option>xxxx58</option>
    </select></td>
    <td>Quotation Status</td>
    <td width="190"><select name="operation" id="operation" class="inputs">
      <option selected="selected">Select</option>
      <option>In Progress</option>
      <option>Finalised</option>
    </select></td>
    <td width="125">Statement Period</td>
    <td><input name="textfield3" type="text" id="textfield3" placeholder="from" class="date-range" />
-
<input name="textfield3" type="text" id="textfield4" placeholder="to"  class="date-range" /></td>
    </tr>
  <tr>
    <td>Region</td>
    <td><select name="code" id="code" class="inputs">
      <option selected="selected">Select</option>
      <option>North America</option>
      <option>Asia Pacific</option>
      </select></td>
    <td>Sales Person</td>
    <td width="175"><select name="operation2" id="operation2" class="inputs">
      <option selected="selected">Select</option>
      <option>Mohit Verma</option>
      <option>Devian</option>
      </select></td>
    <td width="125">Client Servicing</td>
    <td><select name="operation3" id="operation3" class="inputs">
      <option selected="selected">Select</option>
      <option>xxxxxxxx</option>
      <option>xxxxxxxxx</option>
      </select>
      <input type="button" class="bt-sbt-global-small" id="Submit" value="Submit" onclick="return PhotographersList();"  /></td>
  </tr>
  </table>
</div>

</form>
<form>
<div id="PhotographersListDiv" >
<div class="customer-list">
  <div class="hdrlist" style="width:140px">Quotation List</div>  
Total Quotation : <span class="count">62</span> 
<a href="create-quotation.html" class="addnewcp">Create Quotation</a></div>
<div class="view-cp-list">

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td>Company Name</td>
          <td>Contact Person</td>
          <td>Discount<br />
            (if any)</td>
          <td>Quotation<br />
            Date</td>
          <td>Quotation  ID</td>
          <td>Status</td>
          <td>Sales Person</td>
          <td>Client Servicing</td>
          <td>Region</td>
          <td>Amount<br />
            (Rs.)</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>10%</td>
          <td>xx/xx/xx</td>
          <td>xxxxxxx56</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="create-quotation.html">Add / Edit </a></td>
          <td><a href="change-to-invoice.html">Change into Invoice</a></td>
          <td><a href="send-mail-quotation.html">Send Mail</a></td>
        </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>10%</td>
          <td>xx/xx/xx</td>
          <td>xxxxxxx56</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="create-quotation.html">Add / Edit </a></td>
          <td><a href="change-to-invoice.html">Change into Invoice</a></td>
          <td><a href="send-mail-quotation.html">Send Mail</a></td>
        </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>10%</td>
          <td>xx/xx/xx</td>
          <td>xxxxxxx56</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="create-quotation.html">Add / Edit </a></td>
          <td><a href="change-to-invoice.html">Change into Invoice</a></td>
          <td><a href="send-mail-quotation.html">Send Mail</a></td>
        </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>10%</td>
          <td>xx/xx/xx</td>
          <td>xxxxxxx56</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="create-quotation.html">Add / Edit </a></td>
          <td><a href="change-to-invoice.html">Change into Invoice</a></td>
          <td><a href="send-mail-quotation.html">Send Mail</a></td>
        </tr>
      </table>
      </div></td>
      </tr>
  </table>
</div>
</div>
</form>



</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS-->



