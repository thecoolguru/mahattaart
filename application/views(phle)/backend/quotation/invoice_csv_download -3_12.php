
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
		  <td>Customer Type </td>
                  <td>Customer city</td>
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
		   <td>Image Id</td>
          <td>Collection</td>
		  <td>Licence Cost</td>
		  <td>Surface</td>
		  
		
		  <td>Print Size Height</td>
		   <td>Print Size Width</td>
		  <td>Print Cost </td>
                  <td>Print Rate</td>
                  <td>Print Discount</td>
		  <td>Actual Print Cost</td>
		   <td>Print Total</td>
		  <td>Final Royality</td>
                  <td>Final wna license share</td>
		  <td>wna Actual License Share</td>
		  <td>Diff. Royality</td>
		  <td>Actual Royality</td>
                  <td>Frame Id</td>
		  <td>Frame Code</td>
		   
          
		  <td>Frame Size Height</td>
		  <td>Frame Size Width</td>
		   <td>Frame Actual Cost</td>
          <td>Frame Rate</td>
		  <td>Frame Discount</td>
		  <td>Frame Total</td>
		  
		 
		  <td>Mount Id</td>
		   <td>Mount Code</td>
		  <td>Mount Size Height </td>
                  <td>Mount Size Width</td>
                  <td>Mount Cost</td>
		  <td>Mount Actual Cost</td>
		   <td>Mount Discount</td>
		  <td>Mount Rate</td>
                  <td>Mount Total</td>
		  <td>Glass Name</td>
		  <td>Glass Id</td>
		  <td>Glass Cost</td>
                  <td>Actual Glass Cost</td>
		  <td>Glass Rate</td>
		   
          
		  <td>Glass Discount</td>
		  <td>Canvas  Cost</td>
		   <td>Actual Canvas Cost</td>
          <td>Canvas Rate</td>
		  <td>Canvas Discount</td>
		  <td>Border</td>
		  
		
		  <td>Status</td>
		   <td>Print Size Width</td>
		  <td>Price</td>
                  <td>C.P Amount</td>
                  <td>S.P Amount</td>
		  <td>WNA SP Amount</td>
		   <td>Seller Amount</td>
		  <td>Total</td>
                  <td>After Discount</td>
		  <td>Discount</td>
		  <td>Tax</td>
		  <td>Tax Type</td>
                  <td>Packing Charge</td>
		  <td>Courier Charge</td>
		   
          
		  <td>Sales Person</td>
		  <td>Sales Email</td>
		   <td>Sales Contact</td>
          <td>Client Servicing</td>
		  <td>Client Email</td>
		  <td>Client Contact</td>
		 
		  <td>Created By</td>
		  <td>Convert To Invoice</td>
		   <td>Quotation Type</td>
          <td>Nature Of Sale</td>
		  <td>Print Type</td>
		  <td>Channel Partner</td>
		  <td>Paid Status</td>
		  <td>Created Date</td>
        </tr></table></th><th>Discount</th><th>Total Cost</th></tr>
<?php  

//print_r($inv_tbl_data);die;
	 // $rate_details=$this->backend_model->get_invoice_tbl_download();
	  foreach($inv_tbl_data as $qtn_tbl){
	  
	$x=$qtn_tbl->invoice_id; 
	//print_r($qtn_tbl);die;
	?>
  <tr>
    <td>
      
	<?php echo  $qtn_tbl->invoice_id; ?>
    </td>
    <td>
	<table width="1300">
       
      
		<?php  
	  $raate_details=$this->backend_model->get_tbl_invoice_details_saj_csv($x);
	  foreach($raate_details as $qtn_dtl){
	//echo $y=$details; 
	//print_r($details);die;
	?>
        <tr>
          <td ><?php echo $qtn_dtl->customer_id; ?></td>
		  <td width="57"><?php echo $qtn_dtl->order_id; ?></td>
          <td><?php echo $qtn_dtl->customer_type; ?></td>
             <td width="67"><?php echo $qtn_dtl->customer_city; ?></td>
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
		   <td width="62"><?php echo $qtn_dtl->print_cost; ?></td>
		   <td width="54"><?php echo $qtn_dtl->print_rate; ?></td>
		   <td width="52"><?php echo $qtn_dtl->print_discount; ?></td>
          <td width="62"><?php echo $qtn_dtl->actual_print_cost; ?></td>
		   <td width="37"><?php echo $qtn_dtl->print_total; ?></td>
		   <td width="46"><?php echo $qtn_dtl->final_royality; ?></td>
		   <td width="63"><?php echo $qtn_dtl->final_wna_license_share; ?></td>
          <td width="65"><?php echo $qtn_dtl->wna_actual_license_share; ?></td>
		   <td width="58"><?php echo $qtn_dtl->diff_royality; ?></td>
		   <td width="61"><?php echo $qtn_dtl->actual_royality; ?></td>
		   
         
		   <td width="55"><?php echo $qtn_dtl->frame_id; ?></td>
		   
		   <td width="53"><?php echo $qtn_dtl->frame_code; ?></td>
		   <td width="55"><?php echo $qtn_dtl->frame_size_height; ?></td>
		   
		   <td width="57"><?php echo $qtn_dtl->frame_size_width; ?></td>
		   <td width="73"><?php echo $qtn_dtl->frame_cost; ?></td>
		   
		   
		   <td width="53"><?php echo $qtn_dtl->frame_actual_cost; ?></td>
		  <td width="57"><?php echo $qtn_dtl->frame_rate; ?></td>
          <td width="67"><?php echo $qtn_dtl->frame_discount; ?></td>
             <td width="67"><?php echo $qtn_dtl->frame_total; ?></td>
		   <td width="62"><?php echo $qtn_dtl->mount_id; ?></td>
		   <td width="54"><?php echo $qtn_dtl->mount_code; ?></td>
		   <td width="52"><?php echo $qtn_dtl->mount_size_height; ?></td>
          <td width="62"><?php echo $qtn_dtl->mount_size_width; ?></td>
		   <td width="37"><?php echo $qtn_dtl->mount_cost; ?></td>
		   <td width="46"><?php echo $qtn_dtl->mount_actual_cost; ?></td>
		   <td width="63"><?php echo $qtn_dtl->mount_discount; ?></td>
          <td width="65"><?php echo $qtn_dtl->mount_rate; ?></td>
		   <td width="58"><?php echo $qtn_dtl->mount_total; ?></td>
		   
		   
		   <td width="61"><?php echo $qtn_dtl->glass_name; ?></td>
		   <td width="55"><?php echo $qtn_dtl->glass_id; ?></td>
		   <td width="53"><?php echo $qtn_dtl->glass_cost; ?></td>
		   <td width="55"><?php echo $qtn_dtl->actual_glass_cost; ?></td>
		   <td width="57"><?php echo $qtn_dtl->glass_rate; ?></td>
		   <td width="73"><?php echo $qtn_dtl->glass_discount; ?></td>
          
		  
		  <td width="53"><?php echo $qtn_dtl->canvas_cost; ?></td>
		  <td width="57"><?php echo $qtn_dtl->actual_canvas_cost; ?></td>
          <td width="67"><?php echo $qtn_dtl->canvas_rate; ?></td>
             <td width="67"><?php echo $qtn_dtl->canvas_discount; ?></td>
		   <td width="62"><?php echo $qtn_dtl->border; ?></td>
		   <td width="54"><?php echo $qtn_dtl->status; ?></td>
		   <td width="52"><?php echo $qtn_dtl->price; ?></td>
          <td width="62"><?php echo $qtn_dtl->cp_amount; ?></td>
		   <td width="37"><?php echo $qtn_dtl->sp_amount; ?></td>
		   <td width="46"><?php echo $qtn_dtl->wna_sp_amount; ?></td>
		   <td width="63"><?php echo $qtn_dtl->seller_amount; ?></td>
          <td width="65"><?php echo $qtn_dtl->total; ?></td>
		   <td width="58"><?php echo $qtn_dtl->after_discount; ?></td>
		   <td width="61"><?php echo $qtn_dtl->discount; ?></td>
		   
         
		   <td width="55"><?php echo $qtn_dtl->tax; ?></td>
		   
		   <td width="53"><?php echo $qtn_dtl->tax_type; ?></td>
		   <td width="55"><?php echo $qtn_dtl->packing_charge; ?></td>
		   <td width="57"><?php echo $qtn_dtl->courier_charge; ?></td>
		   <td width="73"><?php echo $qtn_dtl->sales_person; ?></td>
		   
		  
		   <td width="53"><?php echo $qtn_dtl->sales_emailid; ?></td>
		  <td width="57"><?php echo $qtn_dtl->sales_contact; ?></td>
          <td width="67"><?php echo $qtn_dtl->client_servicing; ?></td>
             <td width="67"><?php echo $qtn_dtl->client_emailid; ?></td>
		   <td width="62"><?php echo $qtn_dtl->client_contact; ?></td>
		   <td width="54"><?php echo $qtn_dtl->createdby; ?></td>
		   <td width="52"><?php echo $qtn_dtl->convert_to_invoice; ?></td>
          <td width="62"><?php echo $qtn_dtl->quotation_type; ?></td>
		   <td width="37"><?php echo $qtn_dtl->nofs; ?></td>
		   <td width="46"><?php echo $qtn_dtl->print_type; ?></td>
		   <td width="63"><?php echo $qtn_dtl->channel_partner; ?></td>
          <td width="65"><?php echo $qtn_dtl->paid_status; ?></td>
		   <td width="58"><?php echo $qtn_dtl->created_date; ?></td>
          
		   
        </tr>
		<?php
  }
  ?>
  
  
      </table>
	 
    </td>
	<td>
	<?php 
	echo  $qtn_tbl->discount;
	//echo $qtn_tbl->discount; ?>
</td>


<td>
	<?php echo $qtn_tbl->cp_amount; ?>
</td>



  </tr>
  <?php
  }
  ?>
</table>


</body>
</html>

