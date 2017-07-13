
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

function PhotographersSalesList() {
    var ele = document.getElementById("PhotographersSalesListDiv");
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
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> View Photographers</div>
<form>
<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<br />
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100">Name</td>
    <td width="200"><select name="ph-names" id="ph-names" class="inputs">
      <option selected="selected">All</option>
      <option>Select</option>
      <option>Hemant</option>
      <option>Rahul</option>
    </select></td>
    <td width="380">Statement Period
      <input name="textfield3" type="text" id="textfield3" placeholder="from" class="date-range" />
-
<input name="textfield3" type="text" id="textfield4" placeholder="to"  class="date-range" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Expertiese</td>
    <td><select name="operation" id="operation" class="inputs">
      <option selected="selected">Select</option>
      <option>Wildlife</option>
      <option>Fashion</option>
      <option>Food</option>
      <option>Lifestyle</option>
      <option>Industry</option>
      <option>Sports</option>
      <option>Abstract</option>
      <option>Personality</option>
      <option>Travel</option>
    </select></td>
    <td>Activated Date
      <input name="textfield" type="text" id="textfield" placeholder="from" class="date-range" style="margin-left:15px;" />
-
<input name="textfield2" type="text" id="textfield2" placeholder="to"  class="date-range" style="margin-right:25px" /></td>
    <td><input type="button" class="bt-sbt-global-small" id="Submit" value="Submit" onclick="return PhotographersList();"  /></td>
  </tr>
  <tr>
    <td>Code</td>
    <td><select name="code" id="code" class="inputs">
      <option selected="selected">Select</option>
      <option>AA-00012345</option>
      <option>BB-00012456</option>
      <option>CC-00012324</option>
      <option>DD00123458</option>
      </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
</div>

</form>
<div id="PhotographersListDiv">
<div class="customer-list">
  <div class="hdrlist" style="width:240px">Photographer List</div>  
Total Photographers: <span class="count">800</span>  
<a href="add-photographer.html" class="addnewcp">Add Photographer</a></div>
<div class="view-cp-list">

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner">
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="140">Name</td>
          <td width="140">Email ID</td>
          <td width="80">Password</td>
          <td width="60">Status </td>
          <td width="60">Code</td>
          <td>View by Search Results</td>
          <td>Images Clicked to Enlarge</td>
          <td>Searchs Converted to Sales</td>
          <td width="80">&nbsp;</td>
          <td width="90">&nbsp;</td>
          <td width="60">&nbsp;</td>
          </tr>
        <tr>
          <td>xxxxxxxxxxx</td>
          <td>abc@xyz.com</td>
          <td>***********</td>
          <td>active</td>
          <td>FFxxxx</td>
          <td>800</td>
          <td>600</td>
          <td>200</td>
          <td><a href="#"  onclick="return PhotographersSalesList();" >view sales</a></td>
          <td><a href="view-photographer-contract.html">view contract</a></td>
          <td><a href="#" class="menuanchorclass" rel="anylinkmenu1a">More..</a></td>
          </tr>
      </table>
      
      </div>
       
 

<div class="view-cp-list"   id="PhotographersSalesListDiv" style="display:none">
      

<div>
<form>
<div class="report sales-tb">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="hdrs">
    <td>Total Sales</td>
    <td>Total Commission</td>
    <td>Total Payment  After Commission </td>
    <td>Total Amount <br />
      (Channel Partner)</td>
    <td>Total Amount<br />
      (Walls n Art)</td>
  </tr>
  <tr>
    <td>Rs. 0.00/-</td>
    <td>Rs 0.00/-</td>
    <td>Rs 0.00/-</td>
    <td>Rs 0.00/-</td>
    <td>Rs 0.00/-</td>
  </tr>
</table>
</div>
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
<div class="pgrapher-account"> Account Name : <strong>Rajat Ghosh</strong><br />
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
          <td width="80">&nbsp;</td>
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
          <td><a href="#" class="menuanchorclass" rel="printersales">Make Payment</a></td>
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
          <td>Mode of <br />
            Payment</td>
          <td>Date<br />
            Paid</td>
          <td>Attach <br />
            Scanned Copy</td>
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
          <td>CC</td>
          <td>xx/xx/2013</td>
          <td><a href="#">Upload</a></td>
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
      
      </td>
      </tr>
  </table>
</div>
</div>






</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS-->
