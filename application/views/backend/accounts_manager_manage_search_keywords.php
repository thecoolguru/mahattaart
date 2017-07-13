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

<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#sales-detail').change(function() {
            $('div.acdetail').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});
<!--FOR SELECTING ACCOUNTS ETC-->
$(function() {
      $('#accounts').change(function() {
            $('div.account-option').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});
<!-- FOR SHOW HIDE TABLES-->
$(function() {
      $('#customer-type').change(function() {
            $('div.number').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});
</script>

<link rel="stylesheet" type="text/css" href="css/anylinkmenu.css" />
<script type="text/javascript" src="js/menucontents.js"></script>
<script type="text/javascript" src="js/anylinkmenu.js">
/***********************************************
* AnyLink JS Drop Down Menu v2.0- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Project Page at http://www.dynamicdrive.com/dynamicindex1/dropmenuindex.htm for full source code
***********************************************/
</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>

<!--TOP MENU SCRIPT-->
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="js/top-menu-script.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Manage Search Keywords</div>
<form> <div class="view-cp">
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="125" align="center">Please Select</td>
    <td width="160" align="center"><select name="accounts" id="accounts">
      <option selected="selected">All</option>
      <option value="ac-cp">Channel Partner</option>
      <option value="ac-photographer">Photographer</option>
      <option value="ac-customer">Customer</option>
    </select></td>
    <td align="center"><div id="number-ac-cp" class="account-option">
      <select name="cp" id="cp">
        <option selected="selected">All</option>
        <option>National Geographic</option>
        <option>Corbis</option>
        <option>Alamy</option>
        <option>iStockphoto</option>
      </select>
    </div>
      <div id="number-ac-photographer" class="account-option">
        <select name="cp" id="cp">
          <option selected="selected">All</option>
          <option>Asim Ghosh</option>
          <option>Rahul Bose</option>
        </select>
      </div>
      <div id="number-ac-customer" class="account-option">
        <select name="cp" id="cp">
          <option selected="selected">All</option>
          <option>B2B</option>
          <option>B2C</option>
        </select>
      </div></td>
  
    <td align="center">Statement Period <input name="textfield" type="text" id="textfield" placeholder="from" class="date-range" /> 
      - 
        <input name="textfield2" type="text" id="textfield2" placeholder="to"  class="date-range" /></td>
    <td><input type="button" class="bt-sbt-global-small" onclick="return PhotographersList();" value="Submit"  /></td>
    
  </tr>
</table>
</div>
</form>

<div id="PhotographersListDiv"  style="display:none">
<form>
<div class="view-cp">

<div class="searchc" style="width:100%; margin-bottom:15px;">Search Parameters</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200">Please select and Option</td>
    <td width="225"><select  name="customer-type" id="customer-type" class="cartwiseopt">
      <option selected="selected">Select</option>
      <option value="both">All</option>
      <option value="login">Login</option>
      <option value="withoutlogin">Without Login</option>
    </select></td>
    <td><input type="button" class="bt-sbt-global-small"  id="Submit" value="Submit"/></td>
  </tr>
</table>
</div>
<div id="number-both" class="number">
  <div class="image-filterDiv">Both (Login and Without Login)</div>

<div class="multi-view-images-paging" style="padding-left:25px">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="150">Narrow Your Search</td>
      <td width="160"><select name="paging" id="paging">
        <option>Keywords in..</option>
        <option>1 Day</option>
        <option>2 Days</option>
        <option>Weekly</option>
        <option>Monthly</option>
        <option>Quarterly</option>
        <option>Half Yearly</option>
        <option>Yearly</option>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="130"><a href="#">Export to Excel</a></td>
      <td width="100"><a href="#">Print</a></td>
    </tr>
  </table>
  <a href="#"></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mult-view-images-table">
        <tr class="hdrtr">
          <td width="180">User Name / IP Address</td>
          <td width="100">Time</td>
          <td>Keywords</td>
          <td width="180">Total Number of Images viewd based on the search</td>
          <td width="120">Number of Images clicked to enlarge</td>
          <td width="120">Searchs Converted <br />
            to Sales</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
          </tr>
      </table>
</div>

<!---Login--->
<div id="number-login" class="number">
  <div class="image-filterDiv">Login Wise</div>

<div class="multi-view-images-paging" style="padding-left:25px">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="150">Narrow Your Search</td>
      <td width="160"><select name="paging" id="paging">
        <option>Keywords in..</option>
        <option>1 Day</option>
        <option>2 Days</option>
        <option>Weekly</option>
        <option>Monthly</option>
        <option>Quarterly</option>
        <option>Half Yearly</option>
        <option>Yearly</option>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="130"><a href="#">Export to Excel</a></td>
      <td width="100"><a href="#">Print</a></td>
    </tr>
  </table>
  <a href="#"></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mult-view-images-table">
        <tr class="hdrtr">
          <td width="180">User Name</td>
          <td width="100">Time</td>
          <td>Keywords</td>
          <td width="180">Total Number of Images viewd based on the search</td>
          <td width="120">Number of Images clicked to enlarge</td>
          <td width="120">Searchs Converted<br />
            to Sales</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
          </tr>
      </table>
</div>

<!-- without login-->

<div id="number-withoutlogin" class="number">
  <div class="image-filterDiv">Without Login Wise</div>

<div class="multi-view-images-paging" style="padding-left:25px">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="150">Narrow Your Search</td>
      <td width="160"><select name="paging" id="paging">
        <option>Keywords in..</option>
        <option>1 Day</option>
        <option>2 Days</option>
        <option>Weekly</option>
        <option>Monthly</option>
        <option>Quarterly</option>
        <option>Half Yearly</option>
        <option>Yearly</option>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="130"><a href="#">Export to Excel</a></td>
      <td width="100"><a href="#">Print</a></td>
    </tr>
  </table>
  <a href="#"></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mult-view-images-table">
        <tr class="hdrtr">
          <td width="180">IP</td>
          <td width="100">Time</td>
          <td>Keywords</td>
          <td width="180">Total Number of Images viewd based on the search</td>
          <td width="120">Number of Images clicked to enlarge</td>
          <td width="120">Searchs Converted<br />
            to Sales</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
        </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
        </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
        </tr>
        <tr>
          <td>xxxxxxxxxxxxx</td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
          <td>xxxxxx</td>
          <td>xxxx</td>
          <td>xxxx</td>
        </tr>
      </table>
</div>
</form> </div>
</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


