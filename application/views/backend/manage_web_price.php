
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<div id="middle-wrapper">
<input type="hidden" name="auto_click"  id="auto_click" value="<?=$auto_click?>"  />
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> View Web Price Details</div>




<div id="PhotographersListDiv" >
<div>
<div class="col-md-2">
Paper:<span style="padding-left:15%"><input type="checkbox" id="paper" onClick="change_catagory('surface');" name="surface" /></span>
</div>
<div class="col-md-2">
Frame:<span style="padding-left:15%"><input type="checkbox" id="frame" onClick="change_catagory('frame');" name="surface" /></span></div>
<div class="col-md-2">
Mount:<span style="padding-left:15%"><input type="checkbox" id="mount"  onClick="change_catagory('mount');" name="surface" /></span>
</div>
<div class="col-md-2">
Glass:<span style="padding-left:15%"><input type="checkbox" id="glass" onClick="change_catagory('glass');" name="surface" /></span></div>
<div class="col-md-2">
Ink:<span style="padding-left:15%"><input type="checkbox" id="ink"  onClick="change_catagory('ink');" name="surface" /></span>
</div>
<div class="col-md-2">
Row mts:<span style="padding-left:15%"><input type="checkbox" id="f_r_meterails" onClick="change_catagory('f_r_meterails');" name="surface" /></span>
</div>

</div>
<div>
<div class="col-md-3">
Bubble Wrap:<span style="padding-left:15%"><input type="checkbox" id="bubble_wrap" onClick="change_catagory('packeging');" name="surface" /></span>
</div>
<div class="col-md-3">
Corrugated 5ply:<span style="padding-left:15%"><input type="checkbox" onClick="change_catagory('corrugated_5ply');" id="corrugated_5ply"  name="surface" /></span>
</div>
<div class="col-md-3">
Corrugated 3ply:<span style="padding-left:15%"><input type="checkbox" onClick="change_catagory('corrugated_3ply');" name="surface" id="corrugated_3ply" /></span>
</div>
<div class="col-md-3">
Brown Tape 5ply:<span style="padding-left:15%"><input type="checkbox" onClick="change_catagory('brown_tape_5ply');" id="brown_tape_5ply" name="surface" /></span>
</div>
</div>
<div class="view-cp-list">
<?php if($msg<>'') {?>
          <script>
              setTimeout(function(){outtime()},3000);
              function outtime(){
                  window.location.href="<?=base_url()?>index.php/backend/online_order";
              }
           </script>
          <?php echo $msg;
		  }?>
          
           
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
	
      <td><div class="viewcplist-inner div_of_surface" style="display:none;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		
		<td>Vendor Id</td>
		<td>Vendor Name</td>
		<td>Vendor Contact</td>
		<td>Vendor Details</td>
		<td>Paper Type</td>
			 
              <td>Paper</td>
			  <td>Display Name</td>
			  <td>Quality</td>
		
			  <td>Rate</td>
	        <td>Unit Price</td>
			<td>Roll width</td>
			<td>Roll Height</td>
		
			<td>Cost/Inch</td>
			<td>Only Print/Inch</td>
			<td>GSM</td>
			<td>Thresold Qty</td>
			<td>Stock in Hand</td>
		
		  <td> Avalibility</td>
		 <td> Update</td>
		 <td>Edit</td>
		  <td> Delete</td>
		  <td>All details</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($web_price_tbl as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->id ;?>">
		<td><?php echo $web_tbl->unique_ven_id ;?></td> 
		<td><?php echo $web_tbl->vendor_name ;?></td> 
		<td><?php echo $web_tbl->vendor_contact ;?></td> 
		<td><?php echo $web_tbl->vendor_dtls ;?></td> 
		
		<td><?php echo $web_tbl->paper_type_name ;?></td> 
   <td><?php echo $web_tbl->paper ;?></td>  
   <td><?php echo $web_tbl->display_p_name ;?></td> 
         <td><?php echo $web_tbl->quality;?></td>
  <td><?php echo $web_tbl->rate;?></td>
  
  <td><?php echo $web_tbl->unit_price ;?></td> 
		<td><?php echo $web_tbl->roll_width ;?></td> 
		<td><?php echo $web_tbl->roll_height_inch ;?></td> 
		<td><?php echo $web_tbl->cost_per_inch ;?></td> 
		<td><?php echo $web_tbl->only_print_price ;?></td> 
		<td><?php echo $web_tbl->gsm ;?></td> 
		<td><?php echo $web_tbl->thresold_qty ;?></td> 
		<td><?php echo $web_tbl->current_qty ;?></td> 
	
		  
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->id;?>/paper/<?php echo $web_tbl->vendor_name ;?>">Update</a>
</td>
<td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->id;?>/paper/<?php echo $web_tbl->vendor_name ;?>/paper_edit">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->id;?>/paper">Delete</a>
</td>
<td>
<a href="<?=base_url()?>index.php/backend/full_web_price_details/<?=$web_tbl->roll_height_inch.'_'.$web_tbl->roll_width.'_'.$web_tbl->paper;?>/paper">Details</a>
</td>

	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  <div class="viewcplist-inner div_of_frame" style="display:none">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		     <td>Inventry Id</td>
		   <td>Vendor Name</td> 
		   <td>Vendor Contact</td>
		   <td>Vendor Details</td> 
		      
	         <td>Frame Catagory</td>
         	<td>Frame </td>
		    <td>Frame Code </td>
			<td>Frame Color</td>
		   <td>Frame Rate</td>
		   <td>Frame Size</td>
           <td>Unit Price</td>
		   <td>Runnng Cost</td>
		   <td>Thresold Qty</td>
		   <td>Used Qty</td>
		   <td>Available Qty</td> 
		
		  <td> Avalibility</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($tbl_frame_details as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_id ;?>">
		
		  <td><?php echo $web_tbl->unique_inv_id;?></td>
          <td><?php echo $web_tbl->vendor_name;?></td>
		   <td><?php echo $web_tbl->vendor_contact;?></td> 
		   <td><?php echo $web_tbl->vendor_dtls;?></td>
		   <td><?php echo $web_tbl->frame_category;?></td> 
		   
		   <td><?php echo $web_tbl->frame ;?></td>
		   <td><?php echo $web_tbl->frame_code ;?></td>
		   <td><?php echo $web_tbl->frame_color ;?></td>
		    <td><?php echo $web_tbl->frame_rate ;?></td>
			 <td><?php echo $web_tbl->frame_size ;?></td>
			  
			  
			  <td><?php echo $web_tbl->unit_price;?></td>
          <td><?php echo $web_tbl->running_cost;?></td>
		   <td><?php echo $web_tbl->thresold_qty;?></td> 
		   <td><?php echo $web_tbl->used_qty;?></td>
		   <td><?php echo $web_tbl->current_qty;?></td> 
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->sr_id;?>/frame/<?php echo $web_tbl->vendor_name;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->sr_id;?>/frame">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  <div class="viewcplist-inner div_of_mount"  style="display:none;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		     <td>Inventry Id</td>
		   <td>Vendor Name</td> 
		   <td>Vendor Contact</td>
		   <td>Vendor Details</td> 
		      
          <td>Mount</td>
		  <td>Mount Code</td>
		  <td>Mount Height</td>
		  <td>Mount Width</td>
		  <td>Mount Rate</td>
		  
		  <td>Unit Price</td>
		   <td>Thresold Qty</td>
		   <td>Used Qty</td>
		   <td>Available Qty</td>
		  <td> Avalibility</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($tbl_mount_details as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_id ;?>">
		
		
		       <td><?php echo $web_tbl->unique_inv_id;?></td>
          <td><?php echo $web_tbl->vendor_name;?></td>
		   <td><?php echo $web_tbl->vendor_contact;?></td> 
		   <td><?php echo $web_tbl->vendor_dtls;?></td>
		   
		   
			    <td><?php echo $web_tbl->mount ;?></td>
				<td><?php echo $web_tbl->mount_code ;?></td>
				<td><?php echo $web_tbl->mount_width ;?></td>
				<td><?php echo $web_tbl->mount_height ;?></td>
				
				 <td><?php echo $web_tbl->mount_rate ;?></td>
				 
				 <td><?php echo $web_tbl->unit_price;?></td>
          <td><?php echo $web_tbl->thresold_qty;?></td>
		   <td><?php echo $web_tbl->used_qty;?></td> 
		   <td><?php echo $web_tbl->current_qty;?></td>
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->sr_id;?>/mount/<?php echo $web_tbl->vendor_name;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->sr_id;?>/mount">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  <div class="viewcplist-inner div_of_glass" style="display:none;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		   <td>Inventry Id</td>
		   <td>Vendor Name</td> 
		   <td>Vendor Contact</td>
		   <td>Vendor Details</td> 
		      
		  <td>Glass</td>
		 
      <td>Glass Rate</td>
		   <td>Unit Price</td> 
		  <td>Thresold Qty</td>
		   <td>Used Qty</td>
		   <td>Reorder Qty</td>  
		   <td>Available Qty</td>
		 
		   <td>Date</td> 
    
		  <td> Avalibility</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($tbl_glass_details as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_id ;?>">
		
		      <td><?php echo $web_tbl->unique_inv_id ;?></td>
			   <td><?php echo $web_tbl->vendor_name ;?></td>
			   <td><?php echo $web_tbl->vendor_contact ;?></td>
			   <td><?php echo $web_tbl->vendor_dtls ;?></td>
			   
			  <td><?php echo $web_tbl->glass ;?></td>
			   <td><?php echo $web_tbl->glass_rate ;?></td>
			   
			   <td><?php echo $web_tbl->unit_price ;?></td>
			   <td><?php echo $web_tbl->thresold_qty ;?></td>
			   <td><?php echo $web_tbl->used_qty ;?></td>
			   <td><?php echo $web_tbl->reorder_qty ;?></td>
			   <td><?php echo $web_tbl->current_qty ;?></td>
			   <td><?php echo $web_tbl->create_date ;?></td>
			    
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->sr_id;?>/glass/<?php echo $web_tbl->vendor_name ;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->sr_id;?>/glass">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  <div class="viewcplist-inner div_of_ink" style="display:none;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		   <td>Inventry Id</td>
		   <td>Vendor Name</td> 
		   <td>Vendor Contact</td>
		   <td>Vendor Details</td> 
		      
		  <td>Ink Name</td>
		 
      <td>Rate</td>
		   <td>Unit Price</td> 
		  <td>Thresold Qty</td>
		   <td>Used Qty</td>
		   <td>Reorder Qty</td>  
		   <td>Available Qty</td>
		 
		   <td>Date</td> 
    
		  <td> Avalibility</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($tbl_ink_details as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_id ;?>">
		
		      <td><?php echo $web_tbl->unique_inv_id ;?></td>
			   <td><?php echo $web_tbl->vendor_name ;?></td>
			   <td><?php echo $web_tbl->vendor_contact ;?></td>
			   <td><?php echo $web_tbl->vendor_dtls ;?></td>
			   
			  <td><?php echo $web_tbl->ink ;?></td>
			   <td><?php echo $web_tbl->ink_rate ;?></td>
			   
			   <td><?php echo $web_tbl->unit_price ;?></td>
			   <td><?php echo $web_tbl->thresold_qty ;?></td>
			   <td><?php echo $web_tbl->used_qty ;?></td>
			   <td><?php echo $web_tbl->reorder_qty ;?></td>
			   <td><?php echo $web_tbl->current_qty ;?></td>
			   <td><?php echo $web_tbl->create_date ;?></td>
			    
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->sr_id;?>/ink/<?php echo $web_tbl->vendor_name ;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->sr_id;?>/ink">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  <div class="viewcplist-inner div_of_f_r_meterails" style="display:none;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		   <td>Inventry Id</td>
		   <td>Vendor Name</td> 
		   <td>Vendor Contact</td>
		   <td>Vendor Details</td> 
		      
		  <td>Meterails Name</td>
		 
      
		   <td>Unit Price</td> 
		  <td>Thresold Qty</td>
		   <td>Used Qty</td>
		   <td>Reorder Qty</td>  
		   <td>Available Qty</td>
		 
		   <td>Date</td> 
    
		  <td> Avalibility</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($tbl_framing_raw_meterails as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_id ;?>">
		
		      <td><?php echo $web_tbl->unique_inv_id ;?></td>
			   <td><?php echo $web_tbl->vendor_name ;?></td>
			   <td><?php echo $web_tbl->vendor_contact ;?></td>
			   <td><?php echo $web_tbl->vendor_dtls ;?></td>
			   
			  <td><?php echo $web_tbl->meterails_name ;?></td>
			  
			   
			   <td><?php echo $web_tbl->unit_price ;?></td>
			   <td><?php echo $web_tbl->thresold_qty ;?></td>
			   <td><?php echo $web_tbl->used_qty ;?></td>
			   <td><?php echo $web_tbl->reorder_qty ;?></td>
			   <td><?php echo $web_tbl->current_qty ;?></td>
			   <td><?php echo $web_tbl->create_date ;?></td>
			    
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->sr_id;?>/row_meterails/<?php echo $web_tbl->vendor_name ;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->sr_id;?>/row_meterails">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  <div class="viewcplist-inner div_of_packeging" style="display:none;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		   <td>Inventry Id</td>
		   <td>Vendor Name</td> 
		   <td>Vendor Contact</td>
		   <td>Vendor Details</td> 
		      
		
		 
      <td>Meterails Name</td>
		   <td>Unit Price</td> 
		   <td>Roll Width</td>
		   <td>Roll Height(m)</td>
		   <td>Roll Height(Inch)</td>
		  <td>Thresold Qty</td>
		   <td>Used Qty</td>
		   <td>Reorder Qty</td>  
		   <td>Available Qty</td>
		 
		   <td>Date</td> 
    
		  <td> Avalibility</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($tbl_packeging_details as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_id ;?>">
		
		      <td><?php echo $web_tbl->unique_inv_id ;?></td>
			   <td><?php echo $web_tbl->vendor_name ;?></td>
			   <td><?php echo $web_tbl->vendor_contact ;?></td>
			   <td><?php echo $web_tbl->vendor_dtls ;?></td>
			   
			  	<td><?php echo $web_tbl->meterails_name ;?></td>
				<td><?php echo $web_tbl->unit_price ;?></td>
				<td><?php echo $web_tbl->roll_width ;?></td>
				<td><?php echo $web_tbl->roll_height_m ;?></td>
				<td><?php echo $web_tbl->roll_height_inch ;?></td>
			   
			   
			   <td><?php echo $web_tbl->thresold_qty ;?></td>
			   <td><?php echo $web_tbl->used_qty ;?></td>
			   <td><?php echo $web_tbl->reorder_qty ;?></td>
			   <td><?php echo $web_tbl->current_qty ;?></td>
			   <td><?php echo $web_tbl->create_date ;?></td>
			    
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->sr_id;?>/packeging/<?php echo $web_tbl->vendor_name ;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->sr_id;?>/packeging">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  <div class="viewcplist-inner div_of_corrugated_5ply" style="display:none;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		   <td>Inventry Id</td>
		   <td>Vendor Name</td> 
		   <td>Vendor Contact</td>
		   <td>Vendor Details</td> 
		      
		
		 
      <td>Box Size</td>
	  <td>Qty</td>
		   <td>Unit Price</td> 
		   
		  <td>Thresold Qty</td>
		   <td>Used Qty</td>
		   <td>Reorder Qty</td>  
		   <td>Available Qty</td>
		 
		   <td>Date</td> 
    
		  <td> Avalibility</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($tbl_corrugated_5ply as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_id ;?>">
		
		      <td><?php echo $web_tbl->unique_inv_id ;?></td>
			   <td><?php echo $web_tbl->vendor_name ;?></td>
			   <td><?php echo $web_tbl->vendor_contact ;?></td>
			   <td><?php echo $web_tbl->vendor_dtls ;?></td>
			   
			  	<td><?php echo $web_tbl->box_size ;?></td>
				<td><?php echo $web_tbl->box_qty ;?></td>
				<td><?php echo $web_tbl->unit_price ;?></td>
				
			   
			   <td><?php echo $web_tbl->thresold_qty ;?></td>
			   <td><?php echo $web_tbl->used_qty ;?></td>
			   <td><?php echo $web_tbl->reorder_qty ;?></td>
			   <td><?php echo $web_tbl->current_qty ;?></td>
			   <td><?php echo $web_tbl->create_date ;?></td>
			    
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->sr_id;?>/corrugated_5ply/<?php echo $web_tbl->vendor_name ;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->sr_id;?>/corrugated_5ply">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  <div class="viewcplist-inner div_of_corrugated_3ply" style="display:none;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		   <td>Inventry Id</td>
		   <td>Vendor Name</td> 
		   <td>Vendor Contact</td>
		   <td>Vendor Details</td> 
		      
		
		 
      <td>Box Size</td>
	  <td>Qty</td>
		   <td>Unit Price</td> 
		   
		  <td>Thresold Qty</td>
		   <td>Used Qty</td>
		   <td>Reorder Qty</td>  
		   <td>Available Qty</td>
		 
		   <td>Date</td> 
    
		  <td> Avalibility</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($tbl_corrugated_3ply as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_id ;?>">
		
		      <td><?php echo $web_tbl->unique_inv_id ;?></td>
			   <td><?php echo $web_tbl->vendor_name ;?></td>
			   <td><?php echo $web_tbl->vendor_contact ;?></td>
			   <td><?php echo $web_tbl->vendor_dtls ;?></td>
			   
			  	<td><?php echo $web_tbl->box_size ;?></td>
				<td><?php echo $web_tbl->box_qty ;?></td>
				<td><?php echo $web_tbl->unit_price ;?></td>
				
			   
			   
			   <td><?php echo $web_tbl->thresold_qty ;?></td>
			   <td><?php echo $web_tbl->used_qty ;?></td>
			   <td><?php echo $web_tbl->reorder_qty ;?></td>
			   <td><?php echo $web_tbl->current_qty ;?></td>
			   <td><?php echo $web_tbl->create_date ;?></td>
			    
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->sr_id;?>/corrugated_3ply/<?php echo $web_tbl->vendor_name ;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->sr_id;?>/corrugated_3ply">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  <div class="viewcplist-inner div_of_brown_tape_5ply" style="display:none;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		   <td>Inventry Id</td>
		   <td>Vendor Name</td> 
		   <td>Vendor Contact</td>
		   <td>Vendor Details</td> 
		      
		
		 
      <td>Box Size</td>
	   <td>Qty</td>
		   <td>Unit Price</td> 
		  
		  <td>Thresold Qty</td>
		   <td>Used Qty</td>
		   <td>Reorder Qty</td>  
		   <td>Available Qty</td>
		 
		   <td>Date</td> 
    
		  <td> Avalibility</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($tbl_brown_tape_5ply as $web_tbl){
   
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_id ;?>">
		
		      <td><?php echo $web_tbl->unique_inv_id ;?></td>
			   <td><?php echo $web_tbl->vendor_name ;?></td>
			   <td><?php echo $web_tbl->vendor_contact ;?></td>
			   <td><?php echo $web_tbl->vendor_dtls ;?></td>
			   
			  	<td><?php echo $web_tbl->box_size ;?></td>
				<td><?php echo $web_tbl->box_qty ;?></td>
				<td><?php echo $web_tbl->unit_price ;?></td>
				
			   
			   <td><?php echo $web_tbl->thresold_qty ;?></td>
			   <td><?php echo $web_tbl->used_qty ;?></td>
			   <td><?php echo $web_tbl->reorder_qty ;?></td>
			   <td><?php echo $web_tbl->current_qty ;?></td>
			   <td><?php echo $web_tbl->create_date ;?></td>
			    
				  <td ><?php $avail=$web_tbl->availablity ;
				   if($avail=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/update_web_price/<?=$web_tbl->sr_id;?>/b_t_5ply/<?php echo $web_tbl->vendor_name ;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_web_price/<?=$web_tbl->sr_id;?>/b_t_5ply">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div>
	  </td>
      </tr>
  </table>
</div>
</div>
<script>
function change_catagory(value){
  $('input[type="checkbox"]').bind('click',function() {
    $('input[type="checkbox"]').not(this).prop("checked", false);
  });
 // alert(value)
  if(value=='surface'){
  $('.viewcplist-inner').hide();
  $('.div_of_surface').show();
  //$('.div_of_frame').hide();
  
  }else if(value=='frame'){
  $('.viewcplist-inner').hide();
  $('.div_of_frame').show();
  }else if(value=='mount'){
  $('.viewcplist-inner').hide();
  $('.div_of_mount').show();
  }else if(value=='glass'){
  $('.viewcplist-inner').hide();
  $('.div_of_glass').show();
  }else if(value=='ink'){
  //alert('link')
  $('.viewcplist-inner').hide();
  $('.div_of_ink').show();
  }else if(value=='f_r_meterails'){
  $('.viewcplist-inner').hide();
  $('.div_of_f_r_meterails').show();
  }else if(value=='packeging'){
  $('.viewcplist-inner').hide();
  $('.div_of_packeging').show();
  }else if(value=='corrugated_5ply'){
  $('.viewcplist-inner').hide();
  $('.div_of_corrugated_5ply').show();
  }else if(value=='corrugated_3ply'){
  $('.viewcplist-inner').hide();
  $('.div_of_corrugated_3ply').show();
  }else if(value=='brown_tape_5ply'){
  $('.viewcplist-inner').hide();
  $('.div_of_brown_tape_5ply').show();
  }
}
</script>



</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>




<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Mail</h4>
        </div>
        <div class="modal-body">
            <br>
             <span style="font-size: 14px; float: left;">If you want to send for multi user Then separate with (,). <br>Example: 
            mail1@gmail.com,mail2@gmail.com
            </span><br>
            <input type="hidden" name="mail" id="mail_send" value="">
             <input type="hidden" name="order_id" id="send_order_id" value="">
             <textarea name="mail_id" id="mail_id" cols="44" rows="6"></textarea>
             <br><span id="error_msg" style="font-size:14px; color:red;"></span>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-default" id="send_mail_btn" >Send</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<style>
    textarea { font-size: 18px; }
    </style>
<script>
$(document).ready(function(){
//alert('auto');
var auto_click=$('#auto_click').val();
//alert(auto_click)
if(!auto_click){
$('#paper').trigger('click');
}
if(auto_click=='updated11'){
$('#paper').trigger('click');
}else if(auto_click=='updated21'){
$('#frame').trigger('click');
}else if(auto_click=='updated31'){
$('#glass').trigger('click');
}else if(auto_click=='updated41'){
$('#mount').trigger('click');
}else if(auto_click=='updated51'){
$('#ink').trigger('click');
}else if(auto_click=='updated61'){
$('#f_r_meterails').trigger('click');
}else if(auto_click=='updateda1'){
$('#bubble_wrap').trigger('click');
}else if(auto_click=='updatedb1'){
$('#corrugated_5ply').trigger('click');
}else if(auto_click=='updatedc1'){
$('#corrugated_3ply').trigger('click');
}else if(auto_click=='updatedd1'){
$('#brown_tape_5ply').trigger('click');
}

});

    $(document).on('click','#send_mail_btn',function(){
         
       var mailsend= $('#mail_send').val();
         var mail_id= $('#mail_id').val();
       var order_id= $('#send_order_id').val();
        if($('#mail_id').val()=='')
        {
            $('#error_msg').html('Please enter mail id');
        }else{
           $('#error_msg').html(''); 
        
        
         $.ajax({
            type:"post",
           url:"<?=base_url()?>index.php/backend/sendmail",
             data:"order_id="+order_id+"&mailsend="+mailsend+"&mail_id="+mail_id,
             success:function(response){
                $('#error_msg').html(response); 
             }
         });
         }
        
    });
    $(document).on('click','.sendmail',function(){
        var mailsend=$(this).data('mail');
        var order_id=$(this).data('id');
        $('#mail_send').val(mailsend);
        $('#send_order_id').val(order_id);
        });
    </script>