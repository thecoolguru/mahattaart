<?php 
//print_r($search_data);die;
$userid=$this->session->userdata('userid');
$credit_period=$this->session->userdata('credit_period');
$vendor_quot= $this->backend_model->get_whole_details_vendor_quotation($userid);

?>
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">
<script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<div id="middle-wrapper">
  <div id="middle-container" style="width:96%">
    <div class="main-hdr"> View Vendor Quotation</div>
    <script>
    function search_by_company(company_name){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/"+company_name;
    }
	 
    function search_by_contact_person(contact_person){
       
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/"+contact_person;
    }
    function search_by_sales_person(sales_person){
      window.location.href="<?=base_url()?>index.php/backend/view_quotations/"+sales_person;
    }
    function search_by_region(region){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/"+region;
    }
     
     function search_by_quotation_id(quotation_id){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/"+quotation_id;
    }
    
    function search_by_quotation_status(status){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/"+status;
    }
	
	
    
    function search_by_date(){
        var from =$('#from').val();
        var to =$('#to').val();
        var search_date=from+'_'+to;
        
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/"+search_date;
    }
    function search_by_customer_type(customer_type){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/"+customer_type;
    }
    
    </script>
    <div class="view-cp">
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
              <option value="1">Paid</option>
              <option value="0">Unpaid</option>
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
          <td width="120">Customer Type</td>
          <?php //print_r($customer_type); ?>
          <td width="280"><select id="customer_type" name="customer_type" onchange="return search_by_customer_type(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php foreach ($customer_type as $c_type):?>
              <option value="<?=$c_type->customer_type?>">
              <?=$c_type->customer_type?>
              </option>
              <?php endforeach;?>
            </select>
          </td>
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
    </div>
    <div id="PhotographersListDiv" >
      <div class="customer-list">
        <div class="hdrlist" style="width:140px">ORDER List</div>
        Total Orders : <span class="count">
        <?=count($vendor_quot);?>
        </span> <a href="<?=base_url()?>index.php/backend/vn_onlineoder" class="addnewcp">Create Quotation</a></div>
      <div class="view-cp-list">
        <?php if($msg<>'') {?>
        <script>
              setTimeout(function(){outtime()},1500);
              function outtime(){
                  window.location.href="<?=base_url()?>index.php/backend/view_vendor_quotations";
              }
           </script>
        <?php echo $msg;}?>
       
        <!--<input class="btn btn-success pull-right" type="submit" name="download"  value="Download in CSV"> -->
        <table width="100%" id="table_id" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div class="viewcplist-inner">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="hdrs">
              <td>Company Name </td>
              <td>Quotation ID</td>
              <td>Sales Person</td>
              <td>Client Servicing</td>
              <td>Customer City</td>
              <td>WNA S.P Amount<br />
                (Rs.)</td>
              <td>Payment Status</td>
              <td>Linked to number of orders</td>
              <td>Order Status</td>
              <td>Update Payment Status</td>
              <td>Action Process</td>
              <td width="100px;">Quotation Date</td>
			   <td >Download</td>
              <script>
 

function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=800,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
            </tr>
            <?php
		 $i=1;
		 foreach($vendor_quot as $print){
		 $vendor_code= $print->vendor_code;
		 $vender_detail= $this->backend_model->get_vendor_by_vender_id_details($vendor_code);
		 $docket_quot= $this->backend_model->get_vendor_docket_quotation($vendor_code,$print->order_id);
		
		 if($print->process_status==1){$message= "Docket Assigned";}elseif($print->process_status==2){$message= "Confirmed";}elseif($print->process_status==3){$message= "Shipped";}elseif($print->process_status==4){$message= "Ready to shipped";}elseif($print->process_status==5){$message= "Delivered";}
		 elseif($print->process_status==6){$message= "RTO";}
		 elseif($print->process_status==7){$message= "Exchange";}
		 elseif($print->process_status==8){$message= "Shipped";}
		 elseif($print->process_status==9){$message= "Mahatta Art Cancelled";}
		  elseif($print->process_status==10){$message= "Customer cancelled";}
		   elseif($print->process_status==11){$message= "Lost";}
		 
		 elseif($print->process_status==0){$message= "Pending";}
		 
		$paid_status= $print->paid_status;
		$link_status= $print->link_status;
		$process_status= $print->process_status;
		 
		?>
            <tr>
              <td><?=$vender_detail['company_name']?></td>
              <td><?=$print->order_id;?></td>
              <td><?=$print->sale_person;?></td>
              <td><?=$print->client_servcing;?></td>
              <td><?=$vender_detail['city']?></td>
              <td><b>&#8377;
                <?=$print->total_amount;?>
                </b></td>
              <td><? if($print->paid_status==0){  echo "<span style='color:#FF0000' >Unpaid<span>";}elseif($print->paid_status==1){echo "<span style='color:#009900' >Paid<span>";}?></td>
              <td>
        <form name="link_order" action="<?=base_url()?>index.php/backend/vender_quotation_linktoorder/<?=$print->order_id;?>/<?=$vendor_code?>" method="post">
          <? if($print->status==0){ 
				echo "Pending";
				}else{ ?>
          <input type="submit" class="btn btn-success pull-right" name="link" value="LINK ORDER " <? if($link_status=='1'){?>  disabled="disabled" <? }?> />
          <span>
          <? }?>
        </form>
        </td>
        <td><a href="<?=base_url()?>index.php/backend/vnddetailsquot/<?=$vendor_code?>/<?=$print->order_id?>/<?=$print->status?>"><?php echo  "$message (".$docket_quot.")";?></a></td>
        <td><span id="payment_status<?=$i;?>" style="    padding-top: 6px;"></span><br>
          <form name="update_cash" action="#" method="post">
            <input type="hidden"  name="quotation_id" id="quotation_id<?=$i;?>" value="<?=$print->order_id;?>"/>
            <input type="hidden" name="userid" id="userid<?=$i;?>" value="<?=$userid;?>"/>
            <input type="checkbox" <? if($paid_status=='1'){?> checked="checked" disabled="disabled" <? }?> style="float:left;" name="update_amount" data-id="<?=$i;?>" id="update_amount<?=$i;?>"  class="update_amount"/>
            <span class="load_cash_class" id="load_cash_class<?=$i?>">
            <select name="update_vendor_amount" <? if($paid_status=='1'){?> disabled="disabled"<? }?> onchange="update_vendor_cash(this.value,'<?=$i;?>')" data-id="<?=$i;?>" style="width: 66px;
    height: 24px;">
              <option value="0" <? if($paid_status=='0'){?>  selected="selected" <? }?>>Unpaid</option>
              <option value="1" <? if($paid_status=='1'){?>  selected="selected" <? }?>>Paid</option>
            </select>
            </span>
          </form></td>
        <td><span id="process_status<?=$i;?>" style="    padding-top: 6px;"></span><br>
          <select name="update_process_status" onchange="update_vendor_process_status(this.value,'<?=$i;?>')" data-id="<?=$i;?>" style="width: 123px;padding-left: 13px;
    height: 24px;">
            <option value="">------Select------</option>
            <option value="1" <? if($process_status=='1'){?>  selected="selected" <? }?>>Docket Assigned</option>
            <option value="2" <? if($process_status=='2'){?>  selected="selected" <? }?>>Confirmed</option>
            <option value="3" <? if($process_status=='3'){?>  selected="selected" <? }?>>Ready to shipped </option>
			<option value="4" <? if($process_status=='4'){?>  selected="selected" <? }?>>Shipped </option>
			<option value="5" <? if($process_status=='5'){?>  selected="selected" <? }?>>Delivered </option>
			<option value="6" <? if($process_status=='6'){?>  selected="selected" <? }?>>RTO </option>
			<option value="7" <? if($process_status=='7'){?>  selected="selected" <? }?>>Exchange </option>
			<option value="8" <? if($process_status=='8'){?>  selected="selected" <? }?>>Shipped </option>
			<option value="9" <? if($process_status=='9'){?>  selected="selected" <? }?>>Mahatta Art Cancelled </option>
            <option value="10" <? if($process_status=='10'){?>  selected="selected" <? }?>>Customer cancelled </option><option value="11" <? if($process_status=='11'){?>  selected="selected" <? }?>>Lost </option>
			
			
          </select>
        </td>
		
		
        <td><?=$print->order_create_date;?></td>
		<td><span id="payment_status<?=$i;?>" style="    padding-top: 6px;"></span><br>
          <form name="update_cash" action="<?=base_url()?>index.php/backend/vender_quotation_download/<?=$print->order_id;?>" method="post">
            <input type="submit" class="btn btn-success pull-right" name="Download" value="Download" />
			 </form></td>
		
        <script>
$(document).ready( function(){
<? if($paid_status=='1'){?>
$('#load_cash_class'+<?=$i;?>).show();
<? }else{?>
$('#load_cash_class'+<?=$i;?>).hide();
<? }?>
});

</script>
        </tr>
        <?php $i++;}?>
        </table>
      </div>
      </td>
      </tr>
      </table>
    </div>
  </div>
  <script>


$(document).on('click','.update_amount',function(){

   var id=$(this).data('id');
	if($('#update_amount'+id).is(":checked")){
	 $('#load_cash_class'+id).show();
	}else{
	 $('#load_cash_class'+id).hide();
	}
});

function update_vendor_cash(status,id){
var quotation_id=$('#quotation_id'+id).val();
var userid=$('#userid'+id).val();
//alert(id+'_'+status+'_'+quotation_id+'_'+userid);
  $.ajax({
  
  		 type: 'post',
		 url:  '<?=base_url()?>index.php/backend/update_vendor_amount_payment_status',
  		 data:'status='+status+'&quotation_id='+quotation_id+'&userid='+userid,
  		    success:function(response){
		//alert(response);
	       $('#payment_status'+id).html(response);
	     
	  }
   
         });

}

function update_vendor_process_status(status,id){
var quotation_id=$('#quotation_id'+id).val();
var userid=$('#userid'+id).val();
//alert(id+'_'+status+'_'+quotation_id+'_'+userid);
  $.ajax({
  
  		 type: 'post',
		 url:  '<?=base_url()?>index.php/backend/update_vendor_process_status',
  		 data:'status='+status+'&quotation_id='+quotation_id+'&userid='+userid,
  		    success:function(response){
		//alert(response);
	       $('#process_status'+id).html(response);
		   window.location.reload();
	 		 }
   
         });

}


</script>
</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
