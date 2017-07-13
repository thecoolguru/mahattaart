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
        <tr>
           <td> Image Id</td>
		   <td>SKU IDs</td>
		   <td>Collection Name</td>
		  <td>Collection Quality </td>
            <td>Collection Royalty </td>
           <td>Width(Pixels)</td>
		  <td>Height(Pixels)</td>
		   <td>Ratio</td>
		  <td>DPI</td>
             <td>Max. Width(Inches)</td>
		  <td>Max. Height(Inches)</td>
		  <td>Description</td>
		  
		  
		  <td>Print Width(Inches)</td>
          <td>Print Height(Inches)</td>
		  <td>Print cost</td>
		  <td>Royalty before discount</td>
		  <td>Print cost after discount</td>
		  <td>Royalty after discount</td>
		  
		  
		   <td>Mount Size(Inches)</td>
          <td>Mount Width(Inches)</td>
		  <td>Mount Height(Inches)</td>
		  <td>Mount cost</td>
		   <td>Mount cost after discount</td>
		   
		   
		   <td>Frame size(Inches)</td>
		   <td>Frame Width(Inches)</td>
            <td>Frame height(Inches)</td>
             <td>Frame cost</td>
		  <td>Frame cost after discount</td>
		   <td>Glass Type</td>
		  <td>Glass width(Inches)</td>
           <td>Glass height(Inches)</td>
		  <td>Glass cost</td>
		  <td>Glass cost after discount</td>
		  
		  
		 
        </tr>
      <?php
	 $frame_size=$all_web_price['0']->frame_size;
	 /* foreach($all_web_price as $web_data){
	// $frame_size=$web_data['frame_size(inch)'];
	 $frame_size=$web_data->frame_size;
	  }*/
	 //echo $product_size;
	  
	  //echo $category_with_glass;
	if($product_type=='1'){
	 $print_width_w_glass=$product_size-($frame_size*2)-($mount_size*2);
	}
	elseif($product_type=='2'){
	$print_width_w_glass=$product_size-($frame_size*2);
	}
	elseif($product_type=='3'){
	$print_width_w_glass=$product_size;
	}
	
	$sku='SKU_';
	$dpi='150';
	
	
	//echo $rate;
	//echo $print_width_w_glass;
	  //print_r($images_filename);
	//$this->backend_model->get_all_tbl_images_search($newString);
	while($result=mysql_fetch_assoc($images_filename)){
   $file_name=$result['images_filename'];
   $sku_id=$sku.$file_name;
   $image_original_width=$result['image_original_width'];
	$image_original_height=$result['image_original_height'];
	$ratio=$image_original_width/$image_original_height;
	$ratio_of_image=round($ratio, 2);
	$max_w=$image_original_width/$dpi;
	$max_width=round($max_w, 2);
	$max_h=$image_original_height/$dpi;
	$max_height=round($max_h, 2);
	$print_h=$print_width_w_glass/$ratio;
	$print_height=round($print_h, 2);
	$print_cost=($print_height)*($print_width_w_glass)*($print_typ_rate);
	$royality_before_disc=$print_cost*(50/100);
	$printcost_after_d=$print_cost-($print_cost*($print_id/100));
	$printcost_after_disct=round($printcost_after_d, 2);
	$royality_after_d=$royality_before_disc-($royality_before_disc*($print_id/100));
	$royality_after_disc=round($royality_after_d, 2);
	if($mount_size!=""){
	$mount_width=$print_width_w_glass+($mount_size*2);
	$mount_height=$print_height+($mount_size*2);
	}else{
	$mount_width='0';
	$mount_height='0';
	}
	
	$mount_cost=$mount_height*$mount_width*$mount_rate;
	$mount_cost_after_d=$mount_cost-$mount_cost*($m_g_id/100);
	$mount_cost_after_disc=round($mount_cost_after_d, 2);
	$frame_width=$print_width_w_glass+($mount_size*2)+($frame_size*2);
	$frame_height=$print_height+($mount_size*2)+($frame_size*2);
	$frame_c=(($frame_width*2)+($frame_height*2))*($frame_rate/12);
	$frame_cost=round($frame_c, 2);
	$frame_cost_after_d=$frame_cost-$frame_cost*($frame_id/100);
	$frame_cost_after_disct=round($frame_cost_after_d, 2);
	$glass_c=$mount_width*$mount_height*$glass_rate;
	$glass_cost=round($glass_c, 2);
	$glass_cost_after_d=$glass_cost-($glass_cost*($m_g_id/100));
	$glass_cost_after_disc=round($glass_cost_after_d, 2);
	
		 ?>
		
		
        <tr>
          <td ><?php echo $result['images_filename']; ?></td>
		  <td ><?php echo $sku_id; ?></td>
		  <td><?php // echo $sku_id; ?></td>
          <td><?php //echo $qtn_dtl->customer_type; ?></td>
             <td><?php //echo $qtn_dtl->customer_city; ?></td>
		   <td ><?php echo $image_original_width; ?></td>
		   <td><?php echo $image_original_height; ?></td>
		   <td><?php echo $ratio_of_image; ?></td>
          <td><?php echo $dpi; ?></td>
		   <td ><?php echo $max_width; ?></td>
		   <td><?php echo $max_height; ?></td>
		   <td ><?php echo $result['images_description']; ?></td>
          <td ><?php echo $print_width_w_glass; ?></td>
		   <td ><?php echo $print_height; ?></td>
		   <td ><?php echo $print_cost; ?></td>
		   
         
		   <td><?php echo $royality_before_disc; ?></td>
		   
		   <td><?php echo $printcost_after_disct; ?></td>
		   <td><?php echo $royality_after_disc; ?></td>
		   
		   <td><?php echo $mount_size; ?></td>
		   <td><?php echo $mount_width; ?></td>
          
		  
		  <td><?php echo $mount_height; ?></td>
		  <td ><?php echo $mount_cost; ?></td>
          <td><?php echo $mount_cost_after_disc; ?></td>
             <td><?php echo $frame_size; ?></td>
		   <td><?php echo $frame_width; ?></td>
		   <td><?php echo $frame_height; ?></td>
		   <td><?php echo $frame_cost; ?></td>
          <td><?php echo $frame_cost_after_disct; ?></td>
		   <td><?php echo $glass_name; ?></td>
		   <td><?php echo $mount_width; ?></td>
		   <td><?php echo $mount_height; ?></td>
          <td><?php echo $glass_cost; ?></td>
		   <td><?php echo $glass_cost_after_disc; ?></td>
		   
		   
        </tr>
		<?php
		}
		?>
</table>


</body>
</html>

