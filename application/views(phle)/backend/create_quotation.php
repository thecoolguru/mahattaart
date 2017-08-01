

<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#quotedetail').change(function() {
            $('div.pgraphers').hide();
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

function quotation2() {
    var ele = document.getElementById("quotation2Div");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}

// ]]></script>

<script type="text/javascript">
function filter_customers(id)
{
   
	if(id)
	{
	var datastring='id=' +id;
	//alert(id);
	$.ajax({
		
		url:"<?=base_url()?>index.php/backend/get_customers",
		type: "POST",
		data:datastring,
		success: function(data)
		{       
			$('#new_partner').html(data);
                     
		}
		
	});
	}
}

function view()
{
  $('#customer_table').show();
}
function hide()
{
  $('#customer_table').hide();
}
</script>




<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr-quotation"> Create / Edit Quotation</div>
<form>
<div class="view-qt">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120" class="bold">Quotation <a href="#">Terms & Conditions</a></td>
    <td width="110" class="bold">Customer Name</td>
    <td width="180">
      <select name="ph-names2" id="ph-names2" class="inputs" onchange="filter_customers(this.value)">
      <option value="">Please Select to See Details</option>
      <?php $customers=$this->backend_model->get_customers();
            foreach($customers as $cust)
            { ?>
      <option value="<?php echo $cust->customer_id; ?>"><?php echo $cust->first_name." ".$cust->last_name; ?></option>
       <?php } ?>
      </select>
  <input type="radio" name="customerdetails" onclick="view()">View Customer Details
  <input type="radio" name="customerdetails" onclick="hide()">Hide Customer Details</td>
   
  </tr>
  </table>
</div>

<div class="viewcplist-inner" id="customer_table" style="display:none;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td>First Name</td>
          <td>Last Name</td>
          <td>Email</td>
          <td>Address</td>
          <td>City</td>
          <td>State</td>
          <td>PostCode</td>
          <td>Country</td>
          <td>Contact Number</td>
          <td>Password</td>
          <td>Occupation</td>
          <td>Company</td>
          <td>Payments Terms</td>
         </tr>
        <tbody id="new_partner">
               
       
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          </tr>
         
</tbody>
        </table>
</div>

<div id="quotationListDiv" class="manage-order" >
 
  <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
  <!--
  <tr  class="darktr">
    <td width="18%" class="bold">Company Name:</td>
    <td width="32%">AXXXXXXX5</td>
    <td width="18%" class="bold">Contact Person:</td>
    <td width="32%">Anurag Basu, Manager-Procurement</td>
  </tr>
  <tr>
    <td class="bold">Quotation Detail:</td>
    <td colspan="3">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="quotation-table">
        <tr>
          <td width="10"><input type="radio" name="radio" id="customeropt" value="customeropt" /></td>
          <td width="100">Customer</td>
          <td width="10"><input type="radio" name="radio" id="self" value="self" /></td>
          <td width="110">Self</td>
          <td><select name="quotedetail" id="quotedetail" class="cartwiseopt">
            <option selected="selected">Please Select an Option</option>
            <option value="cartwise">Cart Wise</option>
            <option value="lightbox">Lightbox Wise</option>
            <option value="single">Single Image</option>
          </select> </td>
          </tr>
        </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="quotation-table">
        <tr>
          <td width="265">&nbsp;</td>
          <td height="30"><input type="radio" name="radio" id="imgid" value="imgid" /></td>
          <td><input type="text" name="imageid" id="imageid" placeholder="Image ID" class="imgidbox" /></td>
          </tr>
        <tr>
          <td width="190"><label for="imageid"></label></td>
          <td width="10" height="30"><input type="radio" name="radio" id="keyword" value="keyword" />
            </td>
          <td><input type="text" name="imageid2" id="imageid2" placeholder="Keyword" class="imgidbox" /></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="40">&nbsp;</td>
          <td><input type="button" class="bt-sbt-global-small" id="Submit2" value="Submit" onclick="return quotationList();"  /></td>
          </tr>
      </table></td>
    </tr>-->
  <div>
  <tr>
    <td colspan="4" style="padding:0;">
     
  
 <div class="quotation-div"  id="quotation2Div">
 <div>
      <label style="font-weight:bold;color:orange;">Order Summary</label>
 
    </div>
    <!--DETAILS TABLE-->
    <div style="margin:30px 0 0 0; border-top:5px solid #faa21b; height:0;"></div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="darktr">
    <td class="bold">Quotation Date:</td>
    <td><input type="text" name="qdate"></td>
    <td class="bold">Quotation ID:</td>
    <td><input type="text" name="qnumber"></td>
  </tr>
  <tr>
    <td class="bold">Total Images:</td>
    <td ><input type="text" name="qdate"></td>
    <td class="bold">Total Prints;</td>
    <td><input type="text" name="qdate"></td>
  </tr>
  <tr class="darktr">
    <td class="bold">Total Frames</td>
    <td><input type="text" name="qdate"></td>
    <td class="bold">Total Amount:</td>
    <td><input type="text" name="qdate"></td>
  </tr>
  <tr>
    <td class="bold">Sales Tax No:</td>
    <td><input type="text" name="qdate"></td>
    <td class="bold">Sales person:</td>
    <td><input type="text" name="qdate"></td>
  </tr>
   <tr>
    <td class="bold">Contact Number:</td>
    <td><input type="text" name="qdate"></td>
    <td class="bold">Email:</td>
    <td><input type="text" name="qdate"></td>
  </tr>

      </table>
 <table class="quotation-tbl">
      <tr>
        <td class="thumbtd">Image Id:<input type="text"></td>
        <td><table class="detailtble">
          <tr>
            <td class="qtd">Print cost including cp cost:</td>
            <td class="answertd-odd"><input type="text"></td>
          </tr>
          <tr>
            <td class="qtd">Commision %:</td>
            <td class="answertd-even"><input type="text"></td>
          </tr>
          <tr>
            <td class="qtd">CP Share:</td>
            <td class="answertd-odd"><input type="text"></td>
          </tr>
          <tr>
            <td class="qtd">WNS Share:</td>
            <td class="answertd-even"><input type="text"></td>
          </tr>
          <tr>
            <td class="qtd">Frame:</td>
            <td class="answertd-odd"><input type="text" placeholder="name & code"></td>
          </tr>
          <tr>
            <td class="qtd">Mount:</td>
            <td class="answertd-even"><input type="text" placeholder="name & code"></td>
          </tr>
          <tr>
            <td class="qtd">Glass/Acrylic:</td>
            <td class="answertd-odd"><input type="text" placeholder="name & code"></td>
          </tr>
          <tr>
            <td class="qtd">Packaging:</td>
            <td class="answertd-even"><input type="text" placeholder="name & code"></td>
          </tr>
          <tr>
            <td class="qtd">Courier:</td>
            <td class="answertd-even"><input type="text" placeholder="name & code"></td>
          </tr>
        </table></td>
        <td align="center"><table class="detailtble">
          <tr>
            <td class="qtd">Price:</td>
            <td class="discount"><input type="text" placeholder=""></td>
          </tr>
          <tr>
            <td class="qtd">Discount:</td>
            <td class="discount"><input type="text" placeholder=""></td>
          </tr>
          <tr>
            <td class="qtd">After Discount:</td>
            <td class="tprice"><input type="text" placeholder=""></td>
          </tr>
          <tr>
            <td class="qtd">Tax:</td>
            <td class="tprice"><input type="text" placeholder=""></td>
          </tr>

          <tr>
            <td class="qtd">Total Amount:</td>
            <td class="tprice"><input type="text" placeholder=""></td>
          </tr>
        </table>
          </td>
      </tr>
    </table>
    </div>


    </td>
    </tr>
    </div>
<!--
  <tr class="bottomtr">
    <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0; border:0;">
      <tr style=" border:0;">
        <td width="180" height="40" style="padding:0;"><select name="ph-names3" id="ph-names3" class="inputs">
          <option selected="selected">Active</option>
          <option>In-Active</option>
        </select></td>
        <td width="100"><a href="#"><img src="<?=base_url()?>assets/images/printer.png" alt="print" width="16" height="16" border="0" align="absmiddle" /> Print</a></td>
        <td width="150"><a href="../../../../../../Users/Administrator/Desktop/BackEnd-Webpages/change-to-invoice.html"><img src="<?=base_url()?>assets/images/invoice.png" alt="invoice" width="13" height="19" align="absmiddle" /> Change to Invoice</a></td>
        <td width="140"><a href="#"><img src="<?=base_url()?>assets/images/excel.png" alt="excel" width="17" height="16" align="absmiddle" /> Export to Excel</a></td>
        <td><a href="#"><img src="<?=base_url()?>assets/images/mail.png" alt="email" width="21" height="15" align="absmiddle" /> Send Mail</a></td>
      </tr>-->
    </table></td>
    </tr>
  
</table>
<div style="padding:30px; text-align:right"> <input type="submit" name="addcpn" id="addcpn" value="Create" class="bt-add" /></div>
</form>
</div>
</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>

