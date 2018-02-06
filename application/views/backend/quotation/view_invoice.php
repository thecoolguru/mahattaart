<?php $q_id= $this->uri->slash_segment(3);  $split=split('/',$q_id);  $search=$split[0];//print_r($company_name).'asdadas';?>
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">
<script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<div id="middle-wrapper">
  <div id="middle-container" style="width:96%">
    <div class="main-hdr"> View Invoice</div>
    <script>    function search_by_company(company_name){        window.location.href="<?=base_url()?>index.php/backend/view_invoices/"+company_name;    }    function search_by_contact_person(contact_person){        alert(contact_person);       
	 window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/"+contact_person;    }    
	 function search_by_sales_person(sales_person){      window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/"+sales_person;    }    
	 function search_by_region(region){   window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/none/"+region;    }          function search_by_quotation_id(quotation_id){        window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/none/none/"+quotation_id;    }        
	 function search_by_quotation_status(status){        window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/none/none/none/"+status;    }   
	 
	 function search_by_customer_type(customer_type){        window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/none/none/none/none/none/"+customer_type;    
	// $('#PhotographersListDiv').show();
	 //alert('unhi')
	// show_customer_type();
	 }      
	
	
	
	 function search_by_date(){        var from =$('#from').val();        var to =$('#to').val();        var search_date=from+'_'+to;        //alert(search_date);        
	 window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/none/none/none/none/"+search_date;    }            </script>
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
          <td>Invoice Status</td>
          <td><select name="operation2" id="operation2" class="inputs" onchange="return search_by_quotation_status(this.value);">
              <option selected="selected">---Select---</option>
              <option value="1">Paid</option>
              <option value="0">Unpaid</option>
            </select></td>
          <td>Invoice Id</td>
          <td><select id="order_id" name="order_id" onchange="return search_by_quotation_id(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php while($q_id=  mysql_fetch_object($invoice_dist)):?>
              <option value="<?=$q_id->invoice_id?>">
              <?=$q_id->invoice_id?>
              </option>
              <?php endwhile;?>
            </select>
          </td>
        </tr>
        <tr>
		
          <td>Statement Period</td>
          <td><input name="from" type="date" id="from" style="width: 120px;"   class="date-range">
            -
            <input name="to" type="date" id="to" class="date-range" style="width: 120px;" onblur="search_by_date();"></td>
			
			<td width="150">Customer Type</td>
          <td><select id="customer_type" name="customer_type" onchange="return search_by_customer_type(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
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
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div>
	<?php
	 echo $mssg.'mssg';
	if  ($mssg!='none'){
	?>
	
    <div id="PhotographersListDiv" >
      <div class="customer-list">
        <div class="hdrlist" style="width:140px">ORDER List</div>
        Total Orders : <span class="count">
        <?=$totals;?>
        </span> </div>
      <div class="view-cp-list">
        <?php if($msg<>'') {?>
        <script>              setTimeout(function(){outtime()},1500);              function outtime(){                  window.location.href="<?=base_url()?>index.php/backend/view_invoices";              }           // Popup window code</script>
        <?php echo $msg;}?>
        <form  action="<?=base_url()?>index.php/backend/invoice_download" method="post">
		
          <input class="btn btn-success pull-right" type="submit" name="download"  value="Download in CSV"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div class="viewcplist-inner">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="hdrs">
                    <td>Company Name </td>
					<?php  
					if($mssg!='B2C'){
					?>
                    <td>C.P Amount<br />
                      </td>
					  <?php
					  }
					  ?>
                    
                    <td>Invoice  ID</td>
					<td>Customer Type</td>
					<?php  
					if($mssg!='B2C'){
					?>
                    <td>Sales Person</td>
                    <td>Client Servicing</td>
					<?php } ?>
                   <td>Customer City</td>
                    <td>Region</td>
					<?php  
					if($mssg!='B2C'){
					?>
                    <td>WNA SP Amount<br />
                      (Rs.)</td>
					 
                    <td>Convert Status </td>
					 <?php
					 }
					  ?>
					  <?php  
					if($mssg=='B2C'){
					?>
					 <td>Amount</td>
					 <?php } ?>
                       <td>Action</td>
                      <td>Order Status</td>
					 <td>Paid Status </td>
					
                    <?php  
					if($mssg!='B2C'){
					?>
                    <td>Create Date</td>
					<?php 
					}else{
					?>
					<td>Order Date</td>
					<td>Updated Date</td>
					<?php } ?>
                  </tr>
                  <script>              function newPopup(url) {	popupWindow = window.open(		url,'popUpWindow','height=800,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')}              </script>
                  <?php                    
				  
				  
				   if($search=='none'){  $invoice_distinct=$search_data;              }elseif($search!='none'){                  $invoice_distinct=$invoice_distinct;              }                if(mysql_num_rows($invoice_distinct)>0)                {  

                    while($result=mysql_fetch_assoc($invoice_distinct)){                                     
					//$result['invoice_id'];
						  $invoice_tbl=$this->backend_model->get_invoice_date($result['invoice_id']);                 // print_r();
					 $print=$this->backend_model->get_invoice_data($result['invoice_id']);   
					  $sku_id_get=$this->backend_model->get_tbl_invoice_details($result['invoice_id']); 
					//print_r($print);die; seller_amount  
					//echo $order_date=date('Y-m-d h:t');
					//print_r($sku_id_get);
					         ?>
							 
                     <input type="hidden" name="inv_id[]" value="<?php echo $print['invoice_id'];?>">
                     </form>
                  <tr>
                    <td><?php echo $print['company_name'];?></td>
					<?php  
					if($mssg!='B2C'){
					?>
					<td><?php $total_amount= $this->backend_model->get_all_invoice($result['invoice_id']);                       
						  $toal_cp_amt=$total_amount[0]->cp_amount;
					//print_r($total_amount);die;
					 echo number_format((float)$toal_cp_amt, 2, '.', '');                         ?></td>
                    <?php
					}
					?>
					
					<td
                   
                   
                    <td><?php echo $print['invoice_id'];?></td>
					<td><?php echo $print['customer_type'];?></td>
					<?php  
					if($mssg!='B2C'){
					?>
                    <td><?php echo $print['sales_person'];?></td>
                    <td><?php echo $print['client_servicing'];?></td>
					
					<?php } ?>
                    <td><?php echo $print['customer_city'];?></td>
                    <td><?php echo $print['region'];?></td>
					<?php  
					$total_amount= $this->backend_model->get_all_invoice($result['invoice_id']);
					if($mssg!='B2C'){
					?>
                    <td><?php //$total_amount= $this->backend_model->get_total_amount_invoice($result['invoice_id']);                        echo number_format((float)$total_amount, 2, '.', '');        
					
					 
					                        
					  $toal_wna_sp_amount=$total_amount[0]->wna_sp_amount;
					  echo number_format((float)$toal_wna_sp_amount, 2, '.', '');
					                 ?></td>
								
                    
					
					<td><?php                              
					if($print['convert_to_order']=='6'){   
					echo "Successfully Converted Into Invoice";
					}     
					else{
					echo "Sorry some Problems Occuring";
					
					}                      
					?>
                     
                    </td>
					 <?php
									 }
									else{
									
									 ?>
									 <td><?php echo $total_amount[0]->total_paid_with_tax;?>	</td>									 
					<?php } ?>
                    <td><a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/invoice_view/<?=$print['invoice_id'];?>');">View Invoice / </a>
                      <?php   echo '<a href="'.base_url().'index.php/backend/delete_invoice_data/'.$print['invoice_id'].'">Delete</a> </td>'; ?>
					  </td>
					  <td>
					 <a href="#" data-toggle="modal" data-target="#change_model" class="change_model"  data-mail="" data-id="<?=$print['invoice_id'];?>" >Change

</a><br>
					  <?php
					  //echo $sku_id_get[0]['sku_id'];
					  foreach($sku_id_get as $sku_id){
					  echo $sku_id->sku_id.' = <span style="color:red">'.$sku_id->updated_status.'</span><br>';
					  } 
					  ?>
					  
					  </td>
					  <td>
					  <?php 
					 if($print['paid_status']=='1'){   
					echo "Paid";
					}     
					else{
					echo "Unpaid";
					
					}            
					  ?>
					  
					  </td>
					  <?php  
					if($mssg!='B2C'){
					?>
                    <td><?php echo $print['created_date'];?></td>
					<?php
					}else{
					?>
					<td><?php echo $print['created_date'];?></td>
					<td>
					<?php
					  //echo $sku_id_get[0]['sku_id'];
					  foreach($sku_id_get as $sku_id){?>
					 	<?php echo $sku_id->updated_date;?><br>
					  <?php
					  } 
					  ?>
					  </td>
				
					<?php } ?>
                  </tr>
                  <?php } }else{?>
                  <td><span style="color:red">No data Found</span></td>
                    <?php }?>
                </table>
              </div></td>
          </tr>
        </table>
      </div>
    </div>
	<?php
	}
	?>
  </div>
  
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>

<script>
$('.change_model').click(function(){
   var id=$(this).data('id');
   //alert(id);
   //$('#change_order_id').val(id);
   
   $.ajax({
           type:'post',
           url: '<?php echo base_url();?>index.php/backend/get_invoice_sku_id',
           data:'values='+id,
		  //dataType : 'json',
           success:function(response){
		   //alert(response)
		   var result="'"+response+"'";
		   alert(result)
			var myJSON = JSON.stringify(response);
             var res=JSON.parse(result);
			alert(res);
			sku_table(res);
			
               
           }
           
       });
  
});

</script>

<div class="modal fade" id="change_model" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
	
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" id="refresh" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Status</h4>
        </div>
        <div class="modal-body">
            <form>
			<span id="saya"></span>
           
			 <div>
			 
			
<p id="demo"></p>


<table id="mytable">

        
		
	
		
<script>
$('#refresh').click(function(){
//alert('refresh')
location.reload();

});
function sku_table(array){
  // alert(array.length);
	//alert(array);
	
	var i;
	var text;
	var rows;
	for ( i = 0; i < array.length; i++) {
	var array_val=array[i];
	//alert(array_val);
	
   // text += "SKU_Id" + array[i]+ "<br>";
	  rows += '<tr style="height:40px"id = "row' + array[i] + '"><td >SKU_ID->'+array[i]+'</td>&nbsp;&nbsp;&nbsp;&nbsp;<td><select name="change_status" id="inputbxs22'+i+'" class="inputbxs22" data-id='+i+' data-sku='+array[i]+'><option  value="" >--Select Status--</option><option value="Delivered">Delivered</option><option value="RTO">RTO</option><option value="Confirmed">Confirmed</option><option value="Docket Assign">Docket Assign</option><option value="Merchant Cancelled">Merchant Cancelled</option><option value="Ready To Ship">Ready To Ship</option><option value="Customer Cancelled">Customer Cancelled</option><option  value="Lost" >Lost</option><option value="Shipped">Shipped</option></select></td><td style="color:red" class="confirmation_msg'+i+'"></td></tr>';
}

document.getElementById("mytable").innerHTML = rows;
    }
	 
$(document).on('change','.inputbxs22',function(){
 var sku_id =$(this).data('sku');
 //alert(sku_id)
 var id =$(this).data('id');
 var change_name=$('#inputbxs22'+id).val();
// alert(SKU_ID);
 //alert(change_name);
 $.ajax({
          type:'post',
		  url:'<?=base_url()?>index.php/backend/get_update_status_invoice',
		  data:'sku_id='+sku_id+'&change_name='+change_name,
		  success:function(response){
		  alert(response);
		  $('.confirmation_msg'+id).html(response);
		 
		  }
 
 
 })
 
});	
	
</script>
			 </table>
			
			 </div>
             </form>
             <br><span id="error_msg" style="font-size:14px; color:red;"></span>
        </div>
       
      </div>
      
    </div>
  </div>