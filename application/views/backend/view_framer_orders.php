

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
$(function() {
      $('#sales-detail').change(function() {
            $('div.acdetail').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});
</script>



<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> View Framer Orders</div>

<form>
<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120">Code</td>
    <td width="275"><select name="code2" id="code2" class="inputs">
      <option>AA-00012345</option>
      <option>BB-00012456</option>
      <option>CC-00012324</option>
      <option>DD00123458</option>
    </select></td>
    <td width="150">Statement Period</td>
    <td> <input name="textfield" type="text" id="textfield" placeholder="from" class="date-range" />
          -
          <input name="textfield2" type="text" id="textfield2" placeholder="to"  class="date-range" /></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><select name="cp-names3" id="cp-names3" class="inputs">
      <option selected="selected">Slect</option>
      <option>Alamy</option>
      <option>National Geographic</option>
      </select></td>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-global-small" name="Submit" id="Submit" value="Submit"  /></td>
  </tr>
  </table>
</div>

  
  <div class="customer-list">
    <div class="hdrlist">Framer List</div>  
Total Framer:<span class="count">16</span>  
<a href="add-new-framer.html" class="addnewcp">Add New Framer</a></div>
<div style="height:25px;"> </div>
<div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="150">Name </td>
          <td>Password</td>
          <td width="150">Email ID</td>
          <td width="60">Status </td>
          <td width="120">Code</td>
          <td>Active / InActive</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>***********</td>
          <td>abc@xyz.com</td>
          <td>active</td>
          <td>WNA125684</td>
          <td>Active</td>
          <td><a href="#">View Order Detail</a></td>
          </tr>
      </table></div>
      <div style="height:25px;"> </div>
      
<div class="customer-list">
Please choose and option to view sales detail 
  <select name="sales-detail" id="sales-detail" class="inputs">
    <option selected="selected">Select</option>
    <option value="tsamt">Total Order Amount</option>
    <option value="tdamt">Total Due Amount</option>
    <option value="tpmade">Total Payment Made</option>
  </select>
</div>

<div id="number-b2b" class="number">


<div id="number-tsamt" class="acdetail" >
  <div  style="background:#388fc4; font-size:12px; color:#fff; padding:8px; margin-top:25px;">Data in case of - TOTAL ORDER AMOUNT</div>

  <div class="view-cp-list">
<div class="viewcplist-inner">
  <div class="view-cp-list">
  <div class="pgrapher-account"> Account Name : <strong>M/s Shiva Framing Co.</strong><br />
Total Sale : <strong>Rs. 18000.00</strong></div>

  <div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="80">Expected Delivery Date </td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td>Mount Type with Color and Size	</td>
          <td>Frame Type with Color and Size </td>
          <td>Qty.<br />
            (w.r.t) image </td>
          <td>Total Sale Amt(Rs.)</td>
          <td>Framer <br />
            Comm. (Rs.)</td>
          <td>WallsnArt<br />
            (Comm)</td>
          <td width="80"> Inv. Status </td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2013</td>
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
          </tr>
        </table>
      </div>
 </div></div>
</div>
</div>

<div  id="number-tdamt" class="acdetail">
<div style="background:#388fc4; font-size:12px; color:#fff; padding:8px; margin-top:25px;">Data in case of - TOTAL DUE AMOUNT</div>
  <div class="view-cp-list">
<div class="viewcplist-inner">
  <div class="view-cp-list">
  <div class="pgrapher-account"> Account Name : <strong>M/s Shiva Framing Co.</strong><br />
Total Sale : <strong>Rs. 18000.00</strong></div>

  <div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="80">Expected Delivery Date </td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td>Mount Type with Color and Size	</td>
          <td>Frame Type with Color and Size </td>
          <td>Qty.<br />
            (w.r.t) image </td>
          <td>Total Sale Amt(Rs.)</td>
          <td>Framer <br />
            Comm. (Rs.)</td>
          <td>WallsnArt<br />
            (Comm)</td>
          <td width="80"> Inv. Status </td>
          <td width="120">&nbsp;</td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2013</td>
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
          <td><a href="#" class="menuanchorclass" rel="printersales">Make Payment</a></td>
          </tr>
        </table>
    </div></div>
 </div></div>

</div>

<div   id="number-tpmade" class="acdetail" >
<div style="background:#388fc4; font-size:12px; color:#fff; padding:8px; margin-top:25px;">Data in case of - TOTAL PAYMENT MADE</div>
  <div class="view-cp-list">
<div class="viewcplist-inner">
  <div class="view-cp-list">
  <div class="pgrapher-account"> Account Name : <strong>M/s Shiva Framing Co.</strong><br />
Total Sale : <strong>Rs. 18000.00</strong></div>

  <div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="80">Expected Delivery Date </td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td>Mount Type with Color and Size	</td>
          <td>Frame Type with Color and Size </td>
          <td>Qty.<br />
            (w.r.t) image </td>
          <td>Total Sale Amt(Rs.)</td>
          <td>Framer <br />
            Comm. (Rs.)</td>
          <td>WallsnArt<br />
            (Comm)</td>
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
          <td>xx/xx/2013</td>
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
          <td>CC</td>
          <td>xx/xx/2013</td>
          <td><a href="#">Upload</a></td>
          </tr>
        </table>
    </div></div>
 </div>
</div>
</div>



</div>

</form>





</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS-->
<script>
  $(document).ready(function() {
      $("#download_now").tooltip({ effect: 'slide'});
    });
</script>
</body>
</html>
