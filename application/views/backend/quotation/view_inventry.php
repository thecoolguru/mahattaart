<?php //print_r($search_data);?>

<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> Inventory Details</div>
<?php if($msg<>'') {?>

          <script>
              setTimeout(function(){outtime()},1500);
              function outtime(){
                  window.location.href="<?=base_url()?>index.php/backend/create_inventory";
              }
           </script>
          <?php echo $msg;}?>
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
    
    
    </script>


<div id="PhotographersListDiv" >
<div class="customer-list">
Total Items : <span class="count"><?=$totals;?></span>
<a href="<?=base_url()?>index.php/backend/add_new_stock" class="addnewcp">Add New Stock</a></div>
<div class="view-cp-list">

          <form  action="<?=base_url()?>index.php/backend/quotation_downloa" method="post">
           
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td>Item Name </td>
          <td>Roll Size (width)<br />
            </td>
          <td>Roll Quantity<br />
            </td>
          <td>Height</td>
          <td>GSM</td>
          <td>Quantity Used (Height)</td>
          <td>Quantity threshold</td>
          <td>Current Invetory (Height)<br />
            </td>
          <td>Date  Last Purcahsed</td>
          <td>Update Stock</td>
          
          
          <script>

function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=800,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
         
          </tr>
     <?php
     
	 //print_r($invdts);die;
	 
      
               
					 // starts by sajid for convert
					//echo $print['channel_partner'];
					 //print_r($print);
					 //end by sajid
	
                  
                                
//print_r($print);
         //echo $details->total;
		  $submt=$this->backend_model->get_submitt_inventory($itmi);
        
		//print_r($submt);die;
		$invt=1;
		
                     ?>
                     <input type="hidden" name="qut_id[]" value="<?php echo $print['quotation_id'];?>">
                     </form>
					 
					
				  <?php 
				  $invno=$this->backend_model->get_all_inventory_details($itmi);
				 // print_r($invno);
				  foreach($invno as $invnosb){
				   $item_id_old=$invnosb->item_id;
				   $srno=$invnosb->sr_no;
				  
								
								?>
								<tr>
                     <td><?php echo $invnosb->item_name;?></td>
                       <td><?php echo $invnosb->roll_size_width;?>
                      <td><?php echo $invnosb->roll_qty;?></td>
                      <td><?php echo $invnosb->height;?></td>
                     <td><?php echo $invnosb->gsm;?></td>
                      <td><?php echo $invnosb->used_quantity_height;?></td>
                       <td><?php echo $invnosb->threshold_quantity;?></td>
					   <td><?php echo $invnosb->available_inventory_height;?></td>
                         <td><?php echo $invnosb->date_last_purchesed;?></td>
                         
                         <td> 
			
		
						 <a href="<?=base_url()?>index.php/backend/update_inventory/<?php echo $item_id_old;?>/<?php echo $srno;?>"> <button type="button" class="btn btn-success">Update</button></a>
						 
						 
						 
                                </td> 
                       
                 
                  </tr>
				  <tr>
				  <?php 
				  $inv=$this->backend_model->get_tbl_inventory($item_id_old);
				 
				  foreach($inv as $tblinvnttt){
				   $item_id_new=$tblinvnttt->item_id;
				   $srnonew=$tblinvnttt->sr_no;
				 
								
								?>
				  
				  <td><?php echo $tblinvnttt->item_name;?></td>
                       <td><?php echo $tblinvnttt->roll_size_width;?>
                      <td><?php echo $tblinvnttt->roll_qty;?></td>
                      <td><?php echo $tblinvnttt->height;?></td>
                     <td><?php echo $tblinvnttt->gsm;?></td>
                      <td><?php echo $tblinvnttt->used_quantity_height;?></td>
                       <td><?php echo $tblinvnttt->threshold_quantity;?></td>
					   <td><?php echo $tblinvnttt->available_inventory_height;?></td>
                         <td><?php echo $tblinvnttt->date_last_purchesed;?></td>
                         
                         <td> 
			
						 
						 
                                </td> 
				  
				  </tr>
				  
				  
                  <?php }}  ?>
    
  </table>
</div>
</div>



                               
                               
               




</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>