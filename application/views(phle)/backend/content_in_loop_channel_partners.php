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
</script>



<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"  style="width:96%"> 
<div class="main-hdr">Content In Loop</div>
<br/><br/>




  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td>Channel Partner Name</td>
          <td>Contract Status</td>
          <td>Contract Date</td>
          <td>Commission</td>
          <td>Submission Status </td>
          <td>No. of Live Images</td>
          <td>Submission Updates 2</td>
          <td>No. of Images</td>
          <td>Resize Status</td>
          <td>Upload Status</td>
          <!--<td>Contact No</td>
          <td>Area of Interests</td>
          <td>Sales</td>
          <td>Contract</td>
          <td>Tools</td>-->
          </tr>
        <tbody id="new_partner">
       <?php foreach($details as $detail){
        $row=$this->channel_partner_model->channelpartner($detail['channel_partner_id']);
        $com=$this->channel_partner_model->get_commission_details($detail['serial_no']);
        ?>
        <tr>
          <td><?php echo $row->channel_partner_name;?></td>
          <td><?php if($detail['contract_status']=='1')echo "waiting"; else{echo "signed";}?></td>
          <td><?= $detail['contract_date'];?></td>
          <td><?= $com->commission_type;?></td>
           <td><?php echo $detail['serial_no'];?></td>
           <td><?php echo $detail['no_of_images_live']?></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td><?php if($detail['expected_working_date_resize_status']!="0000-00-00")echo "pending";
                     elseif($detail['expected_completion_date_resize_status']!="0000-00-00")echo "working";
                     elseif($detail['completion_date_resize_status']!="0000-00-00")echo "completed";?></td>
           <td><?php if($detail['expected_working_date_upload_status']!="0000-00-00")echo "pending"; elseif($detail['expected_completion_date_upload_status']!="0000-00-00") echo "working"; elseif($detail['completion_date_upload_status']!="0000-00-00")echo "completed";?></td>
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





