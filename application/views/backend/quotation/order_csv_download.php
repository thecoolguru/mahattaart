<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	
}
th, td {
    padding: 5px;
	
}
</style>
</head>
<body> 

	
<table>
<tr><th>Quotation</th><th>Quotation Details<table>
        <tr>
           <td> Customer Id</td>
		   <td>Order Id</td>
		   <td>Order Date</td>
		   <td>SKU Id</td>
		  <td>Customer Type </td>
		  <td>Customer Name</td>
          
           <td>Customer city</td>
		    <td>Customer Phone</td>
		  <td> Customer Email Id</td>
		   <td>Customer Address</td>
		   
		   
           <td>First name</td>
		  <td>Last Name</td>
		   <td>Email Id</td>
		  <td>Gender</td>
                  <td>Marries Status</td>
		  <td>Address</td>
		  <td>Company Name</td>
		  <td>Country</td>
                  <td>State</td>
		  <td>City</td>
		   
          
		  <td>Region</td>
		  <td>Pincode</td>
		  <td>Contact</td>
		  <td>Image Id</td>
          <td>Collection</td>
		  <td>Licence Cost</td>
		  <td>Surface</td>
		  
		
		  <td>Print Size Height</td>
		   <td>Print Size Width</td>
		   <td>Actual Print  Height</td>
		   <td>Actual Print  Width</td>
		   
		  <td>Print Cost </td>
                  <td>Print Rate</td>
                  <td>Print Discount</td>
		  <td>Actual Print Cost</td>
		  
		  <td>Final Royality</td>
                  <td>Final wna license share</td>
                 
		  <td>Frame Name</td>
		   
          
		  <td>Frame Size Width</td>
		   <td>Frame Actual Cost</td>
          <td>Frame Rate</td>
		  <td>Frame Discount</td>
		  <td>Frame Total</td>
		  
		 
		   <td>Mount Name</td>
                  <td>Mount Size Width</td>
                  <td>Mount Cost</td>
		  <td>Mount Actual Cost</td>
		   <td>Mount Discount</td>
		  <td>Mount Rate</td>
		  <td>Glass Name</td>
		  <td>Glass Cost</td>
                  <td>Actual Glass Cost</td>
		  <td>Glass Rate</td>
		   
          
		  <td>Glass Discount</td>
		  <td>Canvas  Cost</td>
		   <td>Actual Canvas Cost</td>
          <td>Canvas Rate</td>
		  <td>Canvas Discount</td>
		  <td>Border</td>
		  
		
                  <td>C.P Amount</td>
                  <td>Seller's Commision </td>
		  
		   <td>Seller Amount</td>
		   <td>WNA SP Amount</td>
		  <td>Tax</td>
		  <td>Tax Type</td>
          <td>Packing Charge</td>
		  <td>Courier Charge</td>
		  
		    <td>Final Packets Height</td>
		  <td>Final Packets Width</td>
		   <td>Final Packets Depth</td>
		  <td>Final product weight (in Kg)</td>
          <td>Size of box use For Packaging</td>
		  <td>Tracking Id</td>
		  
		  <td>Sales Person</td>
		  <td>Sales Email</td>
		   <td>Sales Contact</td>
          <td>Client Servicing</td>
		  <td>Client Email</td>
		  <td>Client Contact</td>
		 
		  <td>Created By</td>
          <td>Nature Of Sale</td>
		  <td>Paid Status</td>
		  <td>Created Date</td>
        </tr></table></th><th>Total CP Amount: (Rs.)</th><th>WNA Final SP Amount: (Rs.)	
</th></tr>
<?php  

 
 
		  foreach($data_tbl_order as $qtn_tbl){
	//echo $xx=$qtn_tbl->quotation_id;
	
	$x=$qtn_tbl->order_id2;
	  
	//print_r($x);
	?>
  <tr>
    <td>
      
	<?php echo  $qtn_tbl->order_id2; ?>
    </td>
    <td>
	<table>
       
      
		<?php  
		//print_r($qtn_dtls_data);die;
		//$index
		 
	  //print_r($printer);
	  
	  $raate_details=$this->backend_model->get_tbl_quotation_details_saj_csv($x);
	 // print_r($raate_details);
	  $index2=0;
	   $raate_details=$this->backend_model->get_tbl_order_details_saj_csv($x);
	  foreach($raate_details as $qtn_dtl){
	//echo $y=$details; 
	  $printer=$this->backend_model->get_printer_jobsheet_details($qtn_dtl->order_id);
	  $print_actual_height= split('x',$printer[$index2]->actual_size);
	// print_r($print_actual_height[0]);
	// print_r($print_actual_width[1]);
	$courior=$this->backend_model->get_packager_jobsheet_details($qtn_dtl->order_id);
	
	 $final_packets_height=$courior[$index2]->final_packets_height;
	  $final_packets_width=$courior[$index2]->final_packets_width;
	  
	  $final_packets_depth=$courior[$index2]->final_packets_depth;
	  $final_packets_weight=$courior[$index2]->final_packets_weight;
	  $packets_size=$courior[$index2]->packets_size;
	  
	  $track=$this->backend_model->get_courier_jobsheet_details($qtn_dtl->order_id);
	  $tracking_id=$track[$index2]->tracking_id;
	  
	  $paid_status=$qtn_dtl->paid_status;
	  if($paid_status=='1'){
	   $paid_value="Paid";
	  }
	  else{
	   $paid_value="Unpaid";
	  }
	  $ch_p=$qtn_dtl->channel_partner;
	  if($ch_p=='1'){
	  $hannel_partner="Yes";
	  
	  }
	  else{
	  $hannel_partner="No";
	  }
	
	?>
        <tr>
          <td ><?php echo $qtn_dtl->customer_id; ?></td>
		  <td width="57"><?php echo $qtn_dtl->order_id; ?></td>
		  <td width="58"><?php echo $qtn_dtl->created_date; ?></td>
		  <td width="57"><?php echo $qtn_dtl->sku_id; ?></td>
          <td><?php echo $qtn_dtl->customer_type; ?></td>
		  <td><?php echo $qtn_dtl->customer_name; ?></td>
             <td width="67"><?php echo $qtn_dtl->customer_city; ?></td>
			 <td width="62"><?php echo $qtn_dtl->customer_phone; ?></td>
		   <td width="54"><?php echo $qtn_dtl->customer_email; ?></td>
		   <td width="52"><?php echo $qtn_dtl->customer_address; ?></td>
		   
		   <td width="62"><?php echo $qtn_dtl->first_name; ?></td>
		   <td width="54"><?php echo $qtn_dtl->last_name; ?></td>
		   <td width="52"><?php echo $qtn_dtl->email_id; ?></td>
          <td width="62"><?php echo $qtn_dtl->gander; ?></td>
		   <td width="37"><?php echo $qtn_dtl->marries_statue; ?></td>
		   <td width="46"><?php echo $qtn_dtl->address; ?></td>
		   <td width="63"><?php echo $qtn_dtl->company_name; ?></td>
          <td width="65"><?php echo $qtn_dtl->country; ?></td>
		   <td width="58"><?php echo $qtn_dtl->state; ?></td>
		   <td width="61"><?php echo $qtn_dtl->city; ?></td>
		   
         
		   <td width="55"><?php echo $qtn_dtl->region; ?></td>
		   
		   <td width="53"><?php echo $qtn_dtl->pincode; ?></td>
		   <td width="55"><?php echo $qtn_dtl->contact; ?></td>
		   
		   <td width="57"><?php echo $qtn_dtl->image_id; ?></td>
		   <td width="73"><?php echo $qtn_dtl->collection; ?></td>
          
		  
		  <td width="53"><?php echo $qtn_dtl->licence_cost; ?></td>
		  <td width="57"><?php echo $qtn_dtl->surface; ?></td>
          <td width="67"><?php echo $qtn_dtl->print_size_height; ?></td>
             <td width="67"><?php echo $qtn_dtl->print_size_width; ?></td>
			 <td><?php echo $print_actual_height[0]; ?></td>
			  <td><?php  echo $print_actual_height[1];?></td>
		   <td width="62"><?php echo $qtn_dtl->print_cost; ?></td>
		   <td width="54"><?php echo $qtn_dtl->print_rate; ?></td>
		   <td width="52"><?php echo $qtn_dtl->print_discount; ?></td>
          <td width="62"><?php echo $qtn_dtl->actual_print_cost; ?></td>
		   <td width="46"><?php echo $qtn_dtl->final_royality; ?></td>
		   <td width="63"><?php echo $qtn_dtl->final_wna_license_share; ?></td>
		   
         
		   
		   <td width="53"><?php echo $qtn_dtl->frame_code; ?></td>
		   
		   <td width="57"><?php echo $qtn_dtl->frame_size_width; ?></td>
		   <td width="73"><?php echo $qtn_dtl->frame_cost; ?></td>
		   
		   
		   <td width="53"><?php echo $qtn_dtl->frame_actual_cost; ?></td>
		  <td width="57"><?php echo $qtn_dtl->frame_rate; ?></td>
          <td width="67"><?php echo $qtn_dtl->frame_discount; ?></td>
		   <td width="54"><?php echo $qtn_dtl->mount_code; ?></td>
          <td width="62"><?php echo $qtn_dtl->mount_size_width; ?></td>
		   <td width="37"><?php echo $qtn_dtl->mount_cost; ?></td>
		   <td width="46"><?php echo $qtn_dtl->mount_actual_cost; ?></td>
		   <td width="63"><?php echo $qtn_dtl->mount_discount; ?></td>
          <td width="65"><?php echo $qtn_dtl->mount_rate; ?></td>
		   
		   
		   <td width="61"><?php echo $qtn_dtl->glass_name; ?></td>
		   <td width="53"><?php echo $qtn_dtl->glass_cost; ?></td>
		   <td width="55"><?php echo $qtn_dtl->actual_glass_cost; ?></td>
		   <td width="57"><?php echo $qtn_dtl->glass_rate; ?></td>
		   <td width="73"><?php echo $qtn_dtl->glass_discount; ?></td>
          
		  
		  <td width="53"><?php echo $qtn_dtl->canvas_cost; ?></td>
		  <td width="57"><?php echo $qtn_dtl->actual_canvas_cost; ?></td>
          <td width="67"><?php echo $qtn_dtl->canvas_rate; ?></td>
             <td width="67"><?php echo $qtn_dtl->canvas_discount; ?></td>
		   <td width="62"><?php echo $qtn_dtl->border; ?></td>
          <td width="62"><?php echo $qtn_dtl->cp_amount; ?></td>
		   <td width="37"><?php echo $qtn_dtl->sp_amount; ?></td>
		   <td width="63"><?php echo $qtn_dtl->seller_amount; ?></td>
		   <td width="46"><?php echo $qtn_dtl->wna_sp_amount; ?></td>
		   
		   
         
		   <td width="55"><?php echo $qtn_dtl->tax; ?></td>
		   
		   <td width="53"><?php echo $qtn_dtl->tax_type; ?></td>
		   <td width="55"><?php echo $qtn_dtl->packing_charge; ?></td>
		   <td width="57"><?php echo $qtn_dtl->courier_charge; ?></td>
		   
		   <td width="52"><?php echo $final_packets_height; ?></td>
          <td width="62"><?php echo $final_packets_width; ?></td>
		   <td width="37"><?php echo $final_packets_depth; ?></td>
		   <td width="63"><?php echo $final_packets_weight; ?></td>
		   <td width="46"><?php echo $packets_size; ?></td>
		   <td width="46"><?php echo $tracking_id; ?></td>
		   
		   <td width="73"><?php echo $qtn_dtl->sales_person; ?></td>
		   
		  
		   <td width="53"><?php echo $qtn_dtl->sales_emailid; ?></td>
		  <td width="57"><?php echo $qtn_dtl->sales_contact; ?></td>
          <td width="67"><?php echo $qtn_dtl->client_servicing; ?></td>
             <td width="67"><?php echo $qtn_dtl->client_emailid; ?></td>
		   <td width="62"><?php echo $qtn_dtl->client_contact; ?></td>
		   <td width="54"><?php echo $qtn_dtl->createdby; ?></td>
		   <td width="37"><?php echo $qtn_dtl->nofs; ?></td>
          <td width="65"><?php echo $paid_value; ?></td>
		   <td width="58"><?php echo $qtn_dtl->created_date; ?></td>
        </tr>
		<?php
  $index2++;}
  ?>
      </table>
	 
    </td>
	


<td>
	<?php echo $qtn_tbl->cp_amount;
	
	 //$qtn_tbl->cp_amount; ?>
</td>
<td>
	<?php echo $qtn_tbl->wna_sp_amount;
	
	 //$qtn_tbl->cp_amount; ?>
</td>

  </tr>
  <?php
 }
  ?>
</table>


</body>
</html>

