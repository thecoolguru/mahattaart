
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">
<script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<div id="middle-wrapper">
  <div id="middle-container" style="width:96%">
    <div class="main-hdr"> View
      <?=$q_status?>
      Quotation</div>
    <script>
    function search_by_company(company_name){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/"+company_name;
    }
    function search_by_contact_person(contact_person){
       // alert(contact_person);
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/"+contact_person;
    }
    function search_by_sales_person(sales_person){
      window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/none/"+sales_person;
    }
    function search_by_region(region){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/none/none/"+region;
    }
     
     function search_by_quotation_id(quotation_id){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/none/none/none/"+quotation_id;
    }
    
    function search_by_quotation_status(status){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/none/none/none/none/"+status;
    }
    
    function search_by_date(){
        var from =$('#from').val();
        var to =$('#to').val();
        var search_date=from+'_'+to;
        //alert(search_date);
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/none/none/none/none/none/"+search_date;
    }
    
    
    </script>
    <!--<div class="view-cp">
      <div class="searchc" style="width:100%">Search Parameters</div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="120">Company Name</td>
          <td width="280"><select id="customer_id" name="customer_id" onchange="return search_by_company(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php foreach ($company_name as $c_name):?>
              <option value="<?=$c_name->company_name?>">
              <?=$c_name->company_name?>
              </option>
              <?php endforeach;?>
            </select>
          </td>
          <td width="150">Contact Person</td>
          <td><select id="contact_person" name="contact_person" onchange="return search_by_contact_person(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php foreach ($conact_person as $con_name):?>
              <option value="<?=$con_name->client_servicing?>">
              <?=$con_name->client_servicing?>
              </option>
              <?php endforeach;?>
            </select>
          </td>
          <td width="150">Sales Person</td>
          <td><select id="sales_person" name="sales_person" onchange="return search_by_sales_person(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php foreach ($sales_person as $sale_name):?>
              <option value="<?=$sale_name->sales_person?>">
              <?=$sale_name->sales_person?>
              </option>
              <?php endforeach;?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Region</td>
          <td><select name="region" id="region" class="inputs" onchange="return search_by_region(this.value);">
              <option selected="selected" value=""> Select  Region</option>
              <option>East</option>
              <option>West</option>
              <option>North</option>
              <option>South</option>
            </select></td>
          <td>Quotation Status</td>
          <td><select name="operation2" id="operation2" class="inputs" onchange="return search_by_quotation_status(this.value);">
              <option selected="selected">---Select---</option>
              <option value="0">In progress</option>
              <option value="1">Finished</option>
            </select></td>
          <td>Quotation Id</td>
          <td><select id="order_id" name="order_id" onchange="return search_by_quotation_id(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php foreach ($quotation_id as $q_id):?>
              <option value="<?=$q_id->quotation_id?>">
              <?=$q_id->quotation_id?>
              </option>
              <?php endforeach;?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Statement Period</td>
          <td><input name="from" type="date" id="from" style="width: 120px;"  class="date-range">
            -
            <input name="to" type="date" id="to"  class="date-range" style="width: 120px;" onblur="search_by_date();"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div>-->
    <div id="PhotographersListDiv" >
      <div class="customer-list">
        <div class="hdrlist" style="width:140px">ORDER List </div>
        Total Orders : <span class="count">
       (<?=count($other_details);?>)
        </span> <!--<a href="<?=base_url()?>index.php/quotation/create_quotation" class="addnewcp">Create Quotation</a>--></div>
      <div class="view-cp-list">
        <?php if($msg<>'') {?>
        <script>
              setTimeout(function(){outtime()},3000);
              function outtime(){
                  window.location.href="<?=base_url()?>index.php/backend/view_quotations";
              }
           </script>
        <?php echo $msg;}?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div class="viewcplist-inner">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="hdrs">
				   <td>Customer Name</td>
				    <td>SKU id</td>
                    <td>Company Name </td>
                    <td>Collection</td>
                   
                    <td>Sales Person</td>
                    <td>Client Servicing</td>
                    <td>created by</td>
                    <td>Amount<br />
                      (Rs.)</td>
					<td>Payment Status</td>
                    <td>Order Status</td>
					<td>Action</td>
                    <td>Create Date</td>
					<td>Download</td>
                    <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=800,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
                  </tr><?php //print_r($other_details);?>
                  <?php
                    foreach($other_details as $print){
					 $amount=$print->wna_sp_amount*5/100;
					 $wns_amount=$print->wna_sp_amount+$amount;
                ?>
                  <tr>
                    <td><?php echo $print->customer_name;?></td>
                    <td><?php echo $print->sku_id;?></td>
                    <td><?php echo $print->company_name;?></td>
                    <td><?php echo $print->collection;?></td>
                    <td><?php echo $print->sales_person;?></td>
                    <td><?php echo $print->client_servicing;?></td>
					<td><?php echo $print->createdby;?></td>
					<td><?php echo $wns_amount;?></td>
					<td><? if($print->paid_status==0){  echo "<span style='color:#FF0000' >Unpaid<span>";}elseif($print->paid_status==1){echo "<span style='color:#009900' >Paid<span>";}?></td>
					<td><?php if($print->status==1){echo "Docket Assigned";}elseif($print->status==2){echo "Confirmed";}elseif($print->status==3){echo "Shipped";}elseif($print->status==4){echo "Ready to shipped";}elseif($print->status==5){echo "Delivered";}?></td>
                    <td><a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/view_vendor_quotation_otherdetails/<?=$print->quotation_id;?>');">View </a></td>
                    <td><?php echo $print->order_date;?></td>
					<td> <form  action="<?=base_url()?>index.php/backend/vender_quotation_download/<?=$print->quotation_id;?>" method="post"> <input class="btn btn-success pull-right" type="submit" name="download"  value="Download" style="height:29px;">
					</form>
					</td>
                  </tr>
                  <?php } ?>
                </table>
              </div></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
<script>
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}
</script>