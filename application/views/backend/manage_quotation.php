<?php 
//print_r($search_data);die;


?>

<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> View Quotation</div>

<script>
    function search_by_company(company_name){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/"+company_name;
    }
	 
    function search_by_contact_person(contact_person){
       
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
        
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/none/none/none/none/none/"+search_date;
    }
    function search_by_customer_type(customer_type){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/none/none/none/none/none/none/"+customer_type;
    }
	function search_by_order_type(order_id){
        window.location.href="<?=base_url()?>index.php/backend/view_quotations/none/none/none/none/none/none/none/none/"+order_id;
    }
    
    </script>
<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120">Company Name</td>
    <td width="280">
        
        <select id="customer_id" name="customer_id" onchange="return search_by_company(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select--</option>
</optgroup>
<?php foreach ($company_name as $c_name):?>
<option value="<?=$c_name->company_name?>"><?=$c_name->company_name?></option>
         <?php endforeach;?>     
</select>    
    </td>
    <td width="150">Contact Person</td>
    <td><select id="contact_person" name="contact_person" onchange="return search_by_contact_person(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select--</option>
</optgroup>
<?php foreach ($conact_person as $con_name):?>
<option value="<?=$con_name->client_servicing?>"><?=$con_name->client_servicing?></option>
         <?php endforeach;?>     
</select> </td>


<td width="150">Sales Person</td>
    <td><select id="sales_person" name="sales_person" onchange="return search_by_sales_person(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select--</option>
</optgroup>
<?php foreach ($sales_person as $sale_name):?>
<option value="<?=$sale_name->sales_person?>"><?=$sale_name->sales_person?></option>
         <?php endforeach;?>     
</select> </td>


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
<option value="<?=$q_id->quotation_id?>"><?=$q_id->quotation_id?></option>
         <?php endforeach;?>     
</select>  </td>
  </tr>
  <tr>
 <td width="120">Customer Type</td>
 <?php //print_r($customer_type); ?>
    <td width="280">
        
        <select id="customer_type" name="customer_type" onchange="return search_by_customer_type(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select--</option>
</optgroup>
<?php foreach ($customer_type as $c_type):?>
<option value="<?=$c_type->customer_type?>"><?=$c_type->customer_type?></option>
         <?php endforeach;?>     
</select>    
    </td>
    
    <td>Statement Period</td>
    <td><input name="from" type="date" id="from" style="width: 120px;"  class="date-range">

-

<input name="to" type="date" id="to"  class="date-range" style="width: 120px;" onblur="search_by_date();"></td>
  <td>Order Id</td>
   
    
    <td><select id="" name="" onchange="return search_by_order_type(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select--</option>
</optgroup>
<?php foreach ($order_id as $c_id):?>
<option value="<?=$c_id->order_id?>"><?=$c_id->order_id?></option>
         <?php endforeach;?>     
</select>  </td>
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
Total Orders : <span class="count"><?=$totals;?></span> 
<a href="<?=base_url()?>index.php/backend/create_quotation" class="addnewcp">Create Quotation</a></div>
<div class="view-cp-list">
<?php if($msg<>'') {?>
          <script>
              setTimeout(function(){outtime()},1500);
              function outtime(){
                  window.location.href="<?=base_url()?>index.php/backend/view_quotations";
              }
           </script>
          <?php echo $msg;}?>
          <form  action="<?=base_url()?>index.php/backend/quotation_download" method="post">
           <input class="btn btn-success pull-right" type="submit" name="download"  value="Download in CSV"> 
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		<td>Quotation ID</td>
		<td>Order Id </td>
          <td>Company Name </td>
          <td>C.P Amount<br />
            (if any)</td>
          
          
		  <td>Customer Type</td>
          <td>Sales Person</td>
          <td>Client Servicing</td>
		  <td>Customer City</td>
          <td>Region</td>
          <td>WNA S.P Amount<br />
            (Rs.)</td>
          <td>Convert Into Invoice</td>
          <td>Action</td>
         <td>Paid Status</td>
		 <td>Change Status</td>
		 <td>Order Date</td>
		 
          <td>Create Date</td>
          <td>Updated Date</td>
          <script>

function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=800,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
         
          </tr>
     <?php
      //print_r($qtn_detail);
      $frame_code= $this->uri->slash_segment(3);
        $framer_code_str= substr($frame_code,0,3);
         $split_code=split('/',$frame_code);
          
     
     if($split_code[0]<>''){
                  $quotation_distinct=$search_data;
              }else{
                  $quotation_distinct=$quotation_distinct;
              }
     $search_datacount=count($search_data);  if($order_count || $search_datacount) {

              
                while($resukt =  mysql_fetch_assoc($quotation_distinct)){

                   
                     $print=$this->backend_model->get_quotation_data($resukt['quotation_id']);
					$print_f=$this->backend_model->get_tbl_quotation_details($print['quotation_id']);
					
					
         //echo $details->total;
         $total=$print['print_price']+$print['frame_price']+$print['mount_price']+$print['glass_price'];
          $total_tax=$print['total']*5/100;
         // $final_price=$total+$total_tax;
          
            $total_values=$print['total']+$total_tax;
         if($print['discount']!=0)
         {
          $discount_val=   $total_values*$print['discount']/100;
          $final_price+=$total_values-$discount_val;
         }else{
          $final_price+=$total+$total_tax;
         }
         
                     
                     ?>
                     <input type="hidden" name="qut_id[]" value="<?php echo $print['quotation_id'];?>">
                     </form>
          <tr>
		           <td><?php echo $print['quotation_id'];?></td>
		            <td><?php echo $print['order_id'];?></td>
                     <td><?php echo $print['company_name'];?></td>
                       <td><?php  $total_cp_amtt= $this->backend_model->get_quotation_tbl($resukt['quotation_id']);
					   //print_r($total_cp_amtt);die;
					   $sellers_dis=$total_cp_amtt[0]->cp_amount;
					  // print_r($sellers_dis);die;
                        echo number_format((float)$sellers_dis, 2, '.', '');
                         ?></td>
                      <!--<td><?php //echo $print['discount'];?></td>-->
                      
					  <td><?php echo $print['customer_type'];?></td>
                     <td><?php echo $print['sales_person'];?></td>
                      <td><?php echo $print['client_servicing'];?></td>
					   <td><?php echo $print['customer_city'];?></td>
                       <td><?php echo $print['region'];?></td>
                         <td><?php $total_amount= $this->backend_model->get_total_amount($resukt['quotation_id']);
                        echo number_format((float)$total_amount, 2, '.', '');
                         ?></td>
                     
                         <td>
                             <?php 
                            //echo $x= $print['convert_to_invoice'];// by sajid starts 
							 if($print['channel_partner']=='1'){
							  $action_value="convert_into_order";
							  $submit_value="Convert into Order";
							  }
                if($print['channel_partner']=='0'){
							   $action_value="convert_into_invoice";
							  $submit_value="Convert into Invoice";
							  }


							 ?>

							 
							
							 <?php
							 //echo $x=$print['convert_to_invoice'];
                             if($print['convert_to_invoice']=='0')
                             { 
                             ?>
                           <form name="convertintoinvoice" action="<?php if($print['convert_to_invoice']!='1'){ ?><?=base_url()?>index.php/backend/<?=$action_value;?><?php }?>" method="post">
                               
                            <input type="submit" name="convetintoinvoice" style="color: blue; background-color: #fff; border: none;" value="<?php echo $submit_value; ?>" >
                  <input type="hidden" name="invoice_id" value="<?php echo $print['quotation_id'];?>">
              </form>  
                             <?php }elseif($print['convert_to_invoice']=='3')
                            { ?> <input type="submit" name="convetintoinvoice" style="color: blue; background-color: #fff; border: none;" value="Quotation Canceled" >
                            
                             <?php }elseif($print['convert_to_invoice']=='1')
                            { ?> <input type="submit" disabled name="convetintoinvoice" style="color: red; background-color: #fff; border: none;" value="Converted into invoice" >
                             <?php
							 }
							elseif($print['convert_to_invoice']=='6')
							 {
							 ?>
							 <input type="submit" disabled name="convetintoorder" style="color: red; background-color: #fff; border: none;" value="Converted into Order" >
							 <?php
							 }
							 ?>
                             
                         </td>
           
                         <td> <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/quotation_view/<?=$print['quotation_id'];?>');">View Quotation</a>
<?php            
//if($print['convert_to_invoice']=='0')
        if($print['convert_to_invoice']!='1')
                            {  
                        echo '<a href="'.base_url().'index.php/backend/edit_all_quotation_details/'.$print['quotation_id'].'">/Edit   
						
						</a> ';
						
                            }?>
                             
                               
                                <?php
								$authentic=$this->session->userdata('userid')=='admin@mahattaart.com';
								if($authentic){
                            echo '<a href="'.base_url().'index.php/backend/delete_quotation_data/'.$print['quotation_id'].'">  /Delete</a> </td>';
                       
                    }  
					?>
					
<td><?php if($print['paid_status']=='1'){ print "Paid";} else{ print "Unpaid";}?></td>
<td><a href="#" data-toggle="modal" data-target="#change_model" class="change_model"  data-mail="" data-id="<?=$print['quotation_id'];?>" >Change

</a>
<br>
<?php 
foreach($print_f as $ppp){

echo $ppp->sku_id.'='.$ppp->updated_status.'<br>'; 

	

}
?>		</td>  
<td><?php echo $print['order_date'];?></td>
<td><?php echo $print['created_date'];?></td>
<td><?php foreach($print_f as $ppp){
echo $ppp->updated_date.'<br>';
}?></td>


                 
                  </tr>
                  <?php } } else{?> <td><span style="color:red">No data Found</span></td><?php } ?>
       
      </table>
               
      </div></td>
      </tr>
  </table>
</div>
</div>

<script>
$('.change_model').click(function(){
   var id=$(this).data('id');
   //alert(id);
   $('#change_order_id').val(id);
   
   $.ajax({
           type:'post',
           url: '<?php echo base_url();?>index.php/backend/get_quotation_change',
           data:'values='+id,
		   dataType : 'json',
           success:function(response){
		//alert(response);
		
             var ff= $('#sku_id').val(response);
			
			sku_table(response);
               
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
	  rows += '<tr style="height:40px"id = "row' + array[i] + '"><td >SKU_ID->'+array[i]+'</td>&nbsp;&nbsp;&nbsp;&nbsp;<td><select name="change_status" id="inputbxs22'+i+'" class="inputbxs22" data-id='+i+' data-sku='+array[i]+'><option  value="" >--Select Status--</option><option value="Delivered">Delivered</option><option value="RTO">RTO</option><option value="Confirmed">Confirmed</option><option value="Docket Assign">Docket Assign</option><option value="Merchant Cancelled">Merchant Cancelled</option><option value="Customer Cancelled">Customer Cancelled</option><option  value="Lost" >Lost</option><option value="Shipped">Shipped</option></select></td><td style="color:red" class="confirmation_msg'+i+'"></td></tr>';
}

document.getElementById("mytable").innerHTML = rows;
    }
	 
$(document).on('change','.inputbxs22',function(){
 var sku_id =$(this).data('sku');
 var id =$(this).data('id');
 var change_name=$('#inputbxs22'+id).val();
// alert(SKU_ID);
 //alert(change_name);
 $.ajax({
          type:'post',
		  url:'<?=base_url()?>index.php/backend/get_update_status_change',
		  data:'sku_id='+sku_id+'&change_name='+change_name,
		  success:function(response){
		 // alert(response);
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
  


                               
                               
               




</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>