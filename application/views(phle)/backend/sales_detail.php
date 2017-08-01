<script type="text/javascript" src="<?=base_url()?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/anylinkmenu.js">

/***********************************************
* AnyLink JS Drop Down Menu v2.0- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Project Page at http://www.dynamicdrive.com/dynamicindex1/dropmenuindex.htm for full source code
***********************************************/
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
</script>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/anylinkmenu.css" />

<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Sales Detail</div>
<div class="page-hdr">Balance of Online Sales Account</div>
<form>
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
<br />
<br />
<br />
</form>

<div id="PhotographersListDiv"  style="display:none">
<form>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:25px 0; background:#f2f2f2; border-bottom:1px solid #dfdfdf; height:40px;">
  <tr>
    <td width="25">&nbsp;</td>
    <td>Please choose and option to view sales detail 
      <select  name="sales-detail" id="sales-detail" class="inputsize">
        <option selected="selected">Select</option>
    <option value="tsamt">Total Sales Amount</option>
    <option value="tdamt">Total Due Amount</option>
    <option value="tpmade">Total Payment Made</option>
    <option value="vpsl">View Partner Sale</option>
      </select></td>
    <td width="120">Export 
      <select name="pg3" id="pg3" class="inputsize">
        <option>CSV</option>
        <option selected="selected">Excel</option>
        <option>PDF</option>
      </select></td>
    <td width="80"> <a href="javascript:window.print()" class="print">Print</a></td>
  </tr>
</table>


<div id="number-tsamt" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="hdrs">
            <td>Total Sales</td>
            <td>Total Commission</td>
            <td>Total Payment</td>
            <td>Net Earning</td>
          </tr>
          <tr>
            <td>Rs. 0.00/-</td>
            <td>Rs 0.00/-</td>
            <td>Rs 0.00/-</td>
            <td>Rs 0.00/-</td>
          </tr>
        </table>
        <br />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Expected Delivery Date</td>
          <td width="100">Image <br />
            ID /Quot. ID</td>
          <td>Description</td>
          <td width="80">Image  Print Size	</td>
          <td width="80">Image  Print Surface</td>
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
          <td>xx/xx/xxx</td>
          <td>GWEL_GWL<br />
            72712874.jpg/124 </td>
          <td>PORTRAIT OF A WOMAN SMILING  </td>
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
      <td><div class="viewcplist-inner">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="hdrs">
            <td>Total Sales</td>
            <td>Total Commission</td>
            <td>Total Payment</td>
            <td>Net Earning</td>
          </tr>
          <tr>
            <td>Rs. 0.00/-</td>
            <td>Rs 0.00/-</td>
            <td>Rs 0.00/-</td>
            <td>Rs 0.00/-</td>
          </tr>
        </table>
        <br />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Expected Delivery Date</td>
          <td width="100">Image <br />
            ID /Quot. ID</td>
          <td>Description</td>
          <td width="80">Image  Print Size </td>
          <td width="80">Image  Print Surface</td>
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
          <td width="120">&nbsp;</td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/xxx</td>
          <td>GWEL_GWL<br />
            72712874.jpg/123 </td>
          <td>PORTRAIT OF A WOMAN CRYING  </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="#" class="menuanchorclass" rel="printersales">Make Payment</a></td>
          </tr>
    </table>
      </div></td>
      </tr>
  </table></div>
  

<div id="number-vpsl" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="hdrs">
            <td>Total Sales</td>
            <td>Total Commission</td>
            <td>Total Payment</td>
            <td>Net Earning</td>
          </tr>
          <tr>
            <td>Rs. 0.00/-</td>
            <td>Rs 0.00/-</td>
            <td>Rs 0.00/-</td>
            <td>Rs 0.00/-</td>
          </tr>
        </table>
        <br />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td>Date of Sale</td>
     	   <td>Invoice Date</td>
	   <td>Payment Due Date</td>
	   <td>Payment Rec.Dt.</td>
	   <td>Expected Delivery Date</td>
	   <td>Quot. ID </td>
	   <td>Invoice ID</td>
	   <td>Contact Person</td>
	   <td>Company Name</td>
	   <td>Location</td>
	   <td>Region</td>
	   <td>Sales person</td>
          <td>Asst. Sales person</td>
	   <td>Image ID.</td>
	   <td>Description</td>
	   <td>Image Print Size</td>
	   <td>Image Print Surface</td>
	   <td>Qty.</td>
	   <td>Collection</td>
	   <td>Photo Code</td>
	   <td>Photo Comm.(%)</td>
	   <td>Image Price(Lisence Fee)</td>
	   <td>*CP Comm.</td>
          <td>*W&A Comm.</td>
         <td>Disc Given</td>
	  <td>Payment Status</td>	
	   <td>Payment Rec. Dt.</td>

          
          </tr>
        <tr>
          <td>xxxxxx</td>
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
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>like EVRM,UNRM</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>In Amount</td>
          <td>Pending/Paid/Part-Payment</td>
          <td>&nbsp;</td>
          </tr>
      </table>
      </div></td>
      </tr>
  </table></div>

  
  <div id="number-tpmade" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="hdrs">
            <td>Total Sales</td>
            <td>Total Commission</td>
            <td>Total Payment</td>
            <td>Net Earning</td>
          </tr>
          <tr>
            <td>Rs. 0.00/-</td>
            <td>Rs 0.00/-</td>
            <td>Rs 0.00/-</td>
            <td>Rs 0.00/-</td>
          </tr>
        </table>
        <br />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Expected Delivery Date</td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td width="80">Image  Print Size </td>
          <td width="80">Image  Print Surface</td>
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
          <td>xx/xx/xxx</td>
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
          <td>CC</td>
          <td>xx/xx/2013</td>
          <td><a href="#">Upload</a></td>
          </tr>
      </table>
      </div></td>
      </tr>
  </table></div>




</form> </div>
</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


