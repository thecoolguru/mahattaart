</script>

<script type="text/javascript">
function get_search(interest)
{
	var datastring='interest=' + interest;
	//alert(interest);
	$.ajax({
		url:"<?=base_url()?>index.php/channel_partners/get_byinterest",
		type:"POST",
		data:datastring,
		success:function(data)
		{
			$('#new_partner').html(data);
                  document.getElementById('link').style.display='none';
		}
	});
		
	
}
function filter_partner_byname(id)
{
  if(id)
 {
    var datastring='id=' +id;
	//alert(id);
	$.ajax({
		
		url:"<?=base_url()?>index.php/channel_partners/get_online_images_for_cp_id",
		type: "POST",
		data:datastring,
		success: function(data)
		{       //alert(data);
			$('#new_partner').html(data);
                    
		}
		
	});
 }
}
</script>



<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"  style="width:96%"> 
<div class="main-hdr"> Image Status</div>
<!---------------------------------------------------------------------------------------------------------------->
<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<br />
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="2">Channel Partner Name</td>
    <td width="2"><select name="code2" id="code2" class="inputs" onchange="filter_partner_byname(this.value);">
     <option value="">Select</option>
      <?php foreach($list as $lists){?>
      <option value="<?php print $lists->channel_partner_id;?>"><?php print $lists->channel_partner_name;?></option>
      <?php } ?>
      </select></td>
      </tr>
    </table>

</div>


<!----------------------------------------------------------------------------------------------------------------->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td>Channel Partner Name</td>
          <td>Channel partner Code</td>
          <td>Online Images</td>
          <td>Total Online Images</td>
          
          </tr>
        <tbody id="new_partner">
       <?php foreach($list as $lists)
                    {
                       
                       $num=$this->channel_partner_model->get_online_images($lists->cp_id);
                      ?>
          <tr>
          <td><?php echo $lists->channel_partner_name;?></td>
          <td><?php echo $lists->cp_id;?></td>
          <td>&nbsp;</td>
           <td><?= $num;?></td>
          </tr>
          <?php } ?>
</tbody>
        </table>
 <?php /*if(!$channel_partner){ print "<br> <span style='color:Red;'>No Record Found</span>" ; }*/?>
      </div>
      </div>
      </div>
      <div class="view-cp-list"   id="PhotographersSalesListDiv"    style="display:none">
      

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
<div class="pgrapher-account"> Account Name : <strong>National Geographic</strong><br />
Total Sale : <strong>Rs. 287700.00</strong></div>
<div id="number-tsamt" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner">
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td width="80">Inovice ID</td>
          <td width="100">Channel Partner <br />
            Comm. (Rs.)</td>
          <td width="80">WallsnArt<br />
            (Comm)</td>
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
          <td width="80">Inovice ID</td>
          <td width="100">Photographer <br />
            Comm. (Rs.)</td>
          <td width="80">WallsnArt<br />
            (Comm)</td>
          <td width="80"> Inv. Status </td>
          <td width="120">&nbsp;</td>
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
          <td width="80">Inovice ID</td>
          <td width="100">Photographer <br />
            Comm. (Rs.)</td>
          <td width="80">WallsnArt<br />
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
          <td>xxxxxxxxxx</td>
          <td>PORTRAIT</td>
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
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


