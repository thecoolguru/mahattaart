

<link rel="stylesheet" type="text/css" href="css/anylinkmenu.css" />
<script type="text/javascript" src="js/menucontents.js"></script>
<script type="text/javascript" src="js/anylinkmenu.js">

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

<script type="text/javascript" language="javascript">// <![CDATA[
function quotationList() {
    var ele = document.getElementById("quotationListDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}
// ]]></script>


<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Waiting Images</div>

<form>
<div class="view-cp">

<div class="searchc" style="width:100%; margin-bottom:15px;">Search Parameters</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40" align="center"><input type="radio" name="radio" id="customeropt" value="customeropt" /></td>
    <td width="200">Channel Partner Wise</td>
    <td width="40" align="center"><input name="radio" type="radio" id="self" value="self" checked="checked" /></td>
    <td width="200">Photographer Wise</td>
    <td width="225"><select name="quotedetail" id="quotedetail" class="cartwiseopt">
      <option>Please Select Status</option>
      <option value="all" selected="selected">All</option>
      <option value="active">Active</option>
      <option value="inactive">InActive</option>
    </select></td>
    <td><input type="button" class="bt-sbt-global-small"  id="Submit" value="Submit" onclick="return quotationList();" /></td>
  </tr>
</table>
</div>
<div  id="quotationListDiv"  style="display:none">
  <div class="image-filterDiv"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="250">Total Images: <span class="count">6264
</span>  </td>
    <td><div class="hdr">Narrow Your Search</div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="90">File Name:</td>
          <td width="180"><label for="phtoname"></label>
            <input type="text" name="phtoname" id="phtoname" /></td>
          <td width="100">Date Range</td>
          <td colspan="2"><input name="textfield3" type="text" id="textfield3" placeholder="from" class="date-range" />
-
<input name="textfield3" type="text" id="textfield4" placeholder="to"  class="date-range" /></td>
        </tr>
        <tr>
          <td>Lot</td>
          <td><input type="text" name="phtoname2" id="phtoname2" /></td>
          <td>Activate</td>
          <td><select name="image-activate" id="image-activate">
            <option>All</option>
            <option>Image-1</option>
            <option>Image-2</option>
            <option>Image-3</option>
            <option>Image-4</option>
          </select></td>
          <td width="150"><input type="submit" class="bt-sbt-global-small" name="Submit2" id="Submit2" value="Submit"  /></td>
        </tr>
        </table></td>
  </tr>
</table>
</div>

<div class="multi-view-images-paging">
  <table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>Display Images</td>
      <td width="60"><select name="paging" id="paging">
        <option>10</option>
        <option>15</option>
        <option>20</option>
      </select></td>
      <td><a href="#"><img src="images/next-previous.gif" alt="nxt" width="52" height="21" /></a></td>
    </tr>
  </table>
  <a href="#"></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mult-view-images-table">
        <tr class="hdrtr">
          <td width="150">Image </td>
          <td width="100">Collection Name</td>
          <td width="120">Photographer /<br />
            Channel Partner</td>
          <td width="70">Uploaded<br />
            Date</td>
          <td width="60">Lot ID</td>
          <td width="70">Modified<br />
            Date</td>
          <td width="125">Caption</td>
          <td>Keywords</td>
          <td width="100">&nbsp;</td>
          <td width="60">&nbsp;</td>
          </tr>
        <tr>
          <td><img src="GK7R000Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
        <tr>
          <td><img src="RUM6100Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
        <tr>
          <td><img src="YJ9X000Z.jpg" width="90" height="115" alt="g" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
        <tr>
          <td><img src="GK7R000Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
        <tr>
          <td><img src="RUM6100Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
        <tr>
          <td><img src="YJ9X000Z.jpg" width="90" height="115" alt="g" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
        <tr>
          <td><img src="GK7R000Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
        <tr>
          <td><img src="RUM6100Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
        <tr>
          <td><img src="YJ9X000Z.jpg" width="90" height="115" alt="g" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
        <tr>
          <td><img src="GK7R000Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br />
            xxxxxxxxxxxxx<br />
            xxxxxx, xxxxx</td>
          <td><a href="#">Active / Reject</a></td>
          <td><a href="#">View/Edit</a></td>
        </tr>
      </table>
</div>


<!--B2C DIV-->
<div id="number-b2c" class="number">
  <div class="view-cp-list">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      
     
      </tr>
  </table>
</div>
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


