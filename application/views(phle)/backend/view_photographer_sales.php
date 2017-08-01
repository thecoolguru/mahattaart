
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
      $('#photographers').change(function() {
            $('div.pgraphers').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});

$(function() {
      $('#sales-detail').change(function() {
            $('div.acdetail').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});

</script>

<script type="text/javascript" language="javascript">// <![CDATA[
function salesoption() {
    var ele = document.getElementById("salesoptionDiv");
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
<div class="main-hdr"> View Photographer's Sales</div>
<form>
<div class="view-cp">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="350">Please choose an Option
        <select name="photographers" id="photographers" class="inputs">
        <option selected="selected">Select</option>
        <option value="pwise">Photographer-Wise</option>
        <option value="dwise">Date-Wise</option>
        </select></td>
      <td>
      <div id="number-pwise" class="pgraphers">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="200"><select name="operation" id="operation" class="inputs">
            <option selected="selected">Select</option>
            <option>Rahul Gautam</option>
            <option>Deepka Malik</option>
            <option>Manoj A</option>
          </select></td>
          <td><input type="button" class="bt-sbt-global-small" id="Submit" value="Submit"  onclick="return salesoption();"/></td>
        </tr>
      </table>
      </div>
      
      <div id="number-dwise" class="pgraphers">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="300"><input name="textfield" type="text" id="textfield" placeholder="from" class="date-range" style="margin-left:15px;" />
          -
          <input name="textfield2" type="text" id="textfield2" placeholder="to"  class="date-range" /></td>
          <td><input type="button" class="bt-sbt-global-small" id="Submit" value="Submit"  onclick="return salesoption();"/></td>
        </tr>
      </table>
      </div>
      
      
      </td>
    </tr>
    </table>
</div>
</form>
<div id="salesoptionDiv" style="display:none">
<form>
<div id="sales-option" class="slaesop">
<div class="customer-list">
Please choose and option to view sales detail 
  <select name="sales-detail" id="sales-detail" class="inputs">
    <option selected="selected">Select</option>
    <option value="tsamt">Total Sales Amount</option>
    <option value="tdamt">Total Due Amount</option>
    <option value="tpmade">Total Payment Made</option>
  </select>
</div></div>
<div class="view-cp-list">
<div class="pgrapher-account"> Account Name : <strong>Hemant Chandi</strong><br />
Total Sale : <strong>Rs. 19700.00</strong></div>
<div id="number-tsamt" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td width="50">Qty. </td>
          <td width="80">Total Sale <br />
            Amt (Rs.)</td>
          <td width="100">Photographer <br />
            Comm. (Rs.)</td>
          <td width="80">WallsnArt<br />
            (Comm)</td>
          <td width="80">Discount <br />
            Amt.</td>
          <td width="80"> Inv. Status </td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>GWEL_GWL<br />
            72712874.jpg/124 </td>
          <td>PORTRAIT OF A WOMAN SMILING  </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </div></td>
      </tr>
  </table></div>
  
  
  <div id="number-tdamt" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td width="50">Qty. </td>
          <td width="80">Total Sale <br />
            Amt (Rs.)</td>
          <td width="100">Photographer <br />
            Comm. (Rs.)</td>
          <td width="80">WallsnArt<br />
            (Comm)</td>
          <td width="80">Discount <br />
            Amt.</td>
          <td width="80"> Inv. Status </td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>GWEL_GWL<br />
            72712874.jpg/123 </td>
          <td>PORTRAIT OF A WOMAN CRYING  </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </div></td>
      </tr>
  </table></div>
  
  
  <div id="number-tpmade" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td width="50">Qty. </td>
          <td width="80">Total Sale <br />
            Amt (Rs.)</td>
          <td width="100">Photographer <br />
            Comm. (Rs.)</td>
          <td width="80">WallsnArt<br />
            (Comm)</td>
          <td width="80">Discount <br />
            Amt.</td>
          <td width="80"> Inv. Status </td>
          <td width="80">Mode of <br />
            Payment</td>
          <td width="80">Date<br />
            Paid</td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>PORTRAIT</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </div></td>
      </tr>
  </table></div>
  
  
</div>


</form>
</div>




</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS-->