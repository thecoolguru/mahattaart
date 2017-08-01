

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
  <div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
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
      <td><a href="#"><img src="<?=base_url()?>assets/images/previous-button.jpg" width="27" height="21" alt="previous" /></a><a href="#"><img src="<?=base_url()?>assets/images/next-button.jpg" width="25" height="21" alt="next" /></a></td>
    </tr>
  </table></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mult-view-images-table">
        <tr class="hdrtr">
          <td width="150">&nbsp;</td>
          <td width="100">Collection Name</td>
          <td width="100">File Name</td>
          <td width="120">Channel Partner</td>
          <td width="70">Uploaded<br />
            Date</td>
          <td width="60">Lot ID</td>
          <td width="125">Caption</td>
          <td>Description</td>
          <td width="100">Location of the Place</td>
          </tr>
        <tr>
          <td><img src="<?=base_url()?>assets/images/GK7R000Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br /></td>
          <td>xxxxxxxxxx</td>
          </tr>
        <tr>
          <td><img src="<?=base_url()?>assets/images/RUM6100Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br /></td>
          <td>xxxxxxxxxx</td>
          </tr>
        <tr>
          <td><img src="<?=base_url()?>assets/images/YJ9X000Z.jpg" width="90" height="115" alt="g" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br /></td>
          <td>xxxxxxxxxx</td>
          </tr>
        <tr>
          <td><img src="<?=base_url()?>assets/images/GK7R000Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br /></td>
          <td>xxxxxxxxxx</td>
          </tr>
        <tr>
          <td><img src="<?=base_url()?>assets/images/RUM6100Z.jpg" width="115" height="86" alt="f" /></td>
          <td>xxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2012</td>
          <td>xxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxx, xxxxxxxx, xxxxx<br /></td>
          <td>xxxxxxxxxx</td>
          </tr>
      </table>
      <div style="text-align:right; padding-right:50px;"><input type="submit" name="addcpn" id="addcpn" value="Submit" class="bt-add" /> </div>
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
