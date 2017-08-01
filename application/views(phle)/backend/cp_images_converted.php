

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/anylinkmenu.css" />
<script type="text/javascript" src="<?=base_url()?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/anylinkmenu.js">
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

<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#customer-type').change(function() {
            $('div.number').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});
</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr">Searches Converted to Sales</div>

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
    <td width="100">Date</td>
    <td>Keywords</td>
    <td width="120">Image ID</td>
    <td width="120">&nbsp;</td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/art2.jpg" width="106" height="74" alt="f" /></td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/art3.jpg" alt="" width="106" height="62" /></td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/art.jpg" alt="" width="107" height="107" /></td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/YJ9X000Z.jpg" alt="" width="90" height="115" /></td>
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
    <td width="100">Date</td>
    <td>Keywords</td>
    <td width="120">Image ID</td>
    <td width="120">&nbsp;</td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/art2.jpg" width="106" height="74" alt="f" /></td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/art3.jpg" alt="" width="106" height="62" /></td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/art.jpg" alt="" width="107" height="107" /></td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/YJ9X000Z.jpg" alt="" width="90" height="115" /></td>
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
    <td width="100">Date</td>
    <td>Keywords</td>
    <td width="120">Image ID</td>
    <td width="120">&nbsp;</td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/art2.jpg" width="106" height="74" alt="f" /></td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/art3.jpg" alt="" width="106" height="62" /></td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/art.jpg" alt="" width="107" height="107" /></td>
  </tr>
  <tr>
    <td>xxxxxxxxxxxxx</td>
    <td>xxxxxxxx</td>
    <td>xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxxxxxx</td>
    <td>xxxx</td>
    <td><img src="file:///C|/Users/Administrator/Desktop/BackEnd-Webpages/images/YJ9X000Z.jpg" alt="" width="90" height="115" /></td>
  </tr>
</table>
</div>
</form>
</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>



<script>
  $(document).ready(function() {
      $("#download_now").tooltip({ effect: 'slide'});
    });
</script>
</body>
</html>
