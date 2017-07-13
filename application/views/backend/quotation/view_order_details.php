<?php //print_r($order_details);
$framer_details=$this->backend_model->get_framer_details($order_details[0]->surface);
?>


<div style="width:900px; margin:0px auto;">
  <style>
/*---for table css-- */ .date td { padding:10px 5px; border: 1px solid black;}table { border-collapse: collapse;width: 100%;}/*---for table css-- */ /*---for div css-- */ .rTable{border-right:  1px solid #000;border-bottom: 1px solid #000;border-left:   1px solid  #000;}.rTableRow { width:100%; margin:0px 0px; border-bottom: 1px solid black; clear:both;}.Cell1{  width:40%; float:left; padding:10px; }.Cell2{padding:10px; float:left; width:40%; border-left:solid 1px black; }/*---for div css-- */
</style>
  <!-- comman area-->	
  <div class="rTable">
    <div class="rTableRow">
      <div class="Cell1"> <strong>Date </strong> </div>
      <div class="Cell2">
        <?=$order_details[0]->created_date?>
      </div>
    </div>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Invoice Id </strong> </div>
      <div class="Cell2">
        <?=$order_details[0]->order_id?>
      </div>
    </div>
      <div class="rTableRow">
      <div class="Cell1"> <strong> Channer Partner</strong> </div>
      <div class="Cell2">
        <?php echo ucfirst($order_details[0]->first_name).' '.ucfirst($order_details[0]->last_name);?>
      </div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Nature of sale </strong> </div>
      <div class="Cell2">
        <?=$order_details[0]->nofs;?>
      </div>
    </div>
	
	<?php if($this->session->userdata('userid')=='shalini@wallsnart.com'){
	//print_r($order_details);
	$i=1;
        $index=0;
	 foreach($order_details as $details){
	$details->surface;
	
      $fileName_details=$this->backend_model->get_tbl_search_images_details($details->image_id);
     $rate_details=$this->backend_model->get_rate_details($details->surface);
	 $frame_rate=$this->backend_model->get_rate_details($details->frame_code);
	 $rate_mount=$this->backend_model->get_rate_details($details->mount_code);
     // print_r($rate_details);
      //echo $details->rate;
      $product_height=$details->print_size_height+$details->mount_size_width+$details->frame_size_width;
      $product_width=$details->print_size_width+$details->mount_size_width+$details->frame_size_width;//($details->frame_size_width);

         $printer_rate= $rate_details['printer_rate'];
         $mount_rate= $rate_mount['mount_rate'];
         $framer_rate= $frame_rate['framer_rate'];
         $glass_rate= $rate_details['glass_rate'];

		  $data_split= split('/',$details->image_id);

         if($data_split[0]=='images')
         {
             $image_url=base_url().$details->image_id;
         }else if($data_split[0]!='images'){

             $image_url="http://www.indiapicture.in/wallsnart/398/".$details->image_id."";
         }
     if($data_split[2]<>''){ $fileName= $data_split[2];}else{ $fileName= $details->image_id;}
  
?>


<div class="rTableRow">
      <div class="Cell1"> <strong> Order Id:</strong> </div>
      <div class="Cell2">
        <?=$details->order_id2?>
      </div>
    </div>
<div class="rTableRow">
      <div class="Cell1"> <strong> Image </strong> </div>
      <div class="Cell2"> <img src="<?php echo  $image_url;?>" width="107" height="107" alt="art"/></div>
    </div>
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Image Id </strong> </div>
      <div class="Cell2"> <?=$fileName ?></div>
    </div>
	
	
	
<!-- end comman area-->	
	

	

	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Frame Color </strong> </div>
      <div class="Cell2"> <?php if($details->frame_code<>''){ echo $details->frame_code.'(Inch)';}else{ echo 'N/A;';} ?> </div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Frame Size </strong> </div>
      <div class="Cell2">
        <? if($details->frame_size_width<>'0'){ echo $details->frame_size_width.'(Inch)';}else{ echo 'N/A';}  ?>
      </div>
    </div>
	
	
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount Color </strong> </div>
      <div class="Cell2">
        <? if($details->mount_code<>''){ echo $details->mount_code.'(Inch)';}else{ echo 'N/A';} ?>
      </div>

    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Mount Size </strong> </div>
      <div class="Cell2">
        <? if($details->mount_size_width<>'0'){ echo $details->mount_size_width.'(Inch)';}else{ echo 'N/A';} ?>
      </div>
    </div>
	
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Glass </strong> </div>
      <div class="Cell2">
        <? if($details->glass_name<>''){ echo $details->glass_name;}else{ echo 'N/A';}?>
      </div>
    </div>
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Number of  print quantity </strong> </div>
      <div class="Cell2">
        <?php echo $quantity= $this->backend_model->get_noofproduct_quantity($details->image_id);
 
        ?>
      </div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong>(<?=$i;?>.) Print Size </strong> </div>
      <div class="Cell2"> <?php echo $details->print_size_height.'x'.$details->print_size_width;?> </div>
    </div>
	<?php  $print_r_jobsheet=$this->backend_model->get_printer_jobsheet_details($order_details[0]->order_id);
  //print_r($print_r_jobsheet); 
   ?>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Actual Print Size </strong> </div>
      <div class="Cell2"> <?php echo $print_r_jobsheet[$index]->actual_size;?> </div>
    </div>	
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Border </strong> </div>
      <div class="Cell2"> <?php echo $details->border;?> </div>
    </div>
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Surface </strong> </div>
      <div class="Cell2"> <?php echo $details->surface;?> </div>
    </div>
	
	
	<?php
     $package_details=$this->backend_model->get_packager_details($order_details[0]->order_id);
	$final_product_size=  $package_details[$index]->final_packets_height.' X '.$package_details[$index]->final_packets_weight;
	  
 ?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Size of box use for packaging  </strong> </div>
      <div class="Cell2"><?php if($package_details[$index]->packets_size<>''){ if($package_details[$index]->packets_size==1){ echo 'Small';}elseif($package_details[$index]->packets_size==2){ echo 'Medium';}elseif($package_details[$index]->packets_size==3){ echo 'Large';}elseif($package_details[$index]->packets_size==4){ echo 'Extra Large';}}else{ echo 'N/A';}?></div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Final product size after packaging (Inch) </strong> </div>
      <div class="Cell2"> Height: <?php  if($package_details[$index]->final_packets_height<>''){ echo  $package_details[$index]->final_packets_weight;}else{ echo 'N/A';}  ?> Width: <?php if($package_details[$index]->final_packets_depth<>''){ echo  $package_details[$index]->final_packets_weight;}else{ echo 'N/A';} ?> Depth: <?php if($package_details[$index]->final_packets_depth<>''){ echo  $package_details[$index]->final_packets_weight;}else{ echo 'N/A';}?></div>
    </div>
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Final product weight after packaging (in Kg) </strong> </div>
      <div class="Cell2"> <?php if($package_details[$index]->final_packets_weight<>''){ echo  $package_details[$index]->final_packets_weight;}else{ echo 'N/A';}?></div>
    </div>
	
<?php $index++; $i++;}?>
	
	
	
   
	<? 
	
	 $courier_details=$this->backend_model->get_courier_details($order_details[0]->order_id);
	 if($courier_details[0]->order_detail<>''){?>

	<div class="rTableRow">
      <div class="Cell1"> <strong> Order shipped </strong> </div>
      <div class="Cell2"> <?php if($courier_details[0]->order_detail==1){ echo 'No';}elseif($courier_details[0]->order_detail==2){ echo 'Yes';}?></div>
    </div>

<? } if($courier_details[0]->delivery_mode<>''){?>
<div class="rTableRow">
      <div class="Cell1"> <strong> Delivery Mode  </strong> </div>
      <div class="Cell2"> <?php if($courier_details[0]->delivery_mode==1){ echo 'Own';}elseif($courier_details[0]->delivery_mode==2){ echo 'Channel Partner';}?></div>
    </div>
	<? }?>
	
  <?php }// end admin mail permision?>
  
  
  
  
  <?php 
	//print_r($order_details);
	
	$index=0;
	
	$i=1;
	 foreach($order_details as $details){
	$details->surface;
	
      $fileName_details=$this->backend_model->get_tbl_search_images_details($details->image_id);
     $rate_details=$this->backend_model->get_rate_details($details->surface);
	 $frame_rate=$this->backend_model->get_rate_details($details->frame_code);
	 $rate_mount=$this->backend_model->get_rate_details($details->mount_code);
     // print_r($rate_details);
      //echo $details->rate;
      $product_height=$details->print_size_height+$details->mount_size_width+$details->frame_size_width;
      $product_width=$details->print_size_width+$details->mount_size_width+$details->frame_size_width;//($details->frame_size_width);

         $printer_rate= $rate_details['printer_rate'];
         $mount_rate= $rate_mount['mount_rate'];
         $framer_rate= $frame_rate['framer_rate'];
         $glass_rate= $rate_details['glass_rate'];

		  $data_split= split('/',$details->image_id);

         if($data_split[0]=='images')
         {
             $image_url=base_url().$details->image_id;
         }else if($data_split[0]!='images'){

             $image_url="http://www.indiapicture.in/wallsnart/398/".$details->image_id."";
         }
     if($data_split[2]<>''){ $fileName= $data_split[2];}else{ $fileName= $details->image_id;}
  
  if($this->session->userdata('userid')!='shalini@wallsnart.com'){
?>


<div class="rTableRow">
      <div class="Cell1"> <strong> Order Id:</strong> </div>
      <div class="Cell2">
        <?=$details->order_id2?>
      </div>
    </div>
<div class="rTableRow">
      <div class="Cell1"> <strong> Image </strong> </div>
      <div class="Cell2"> <img src="<?php echo  $image_url;?>" width="107" height="107" alt="art"/></div>
    </div>
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Image Id </strong> </div>
      <div class="Cell2"> <?=$fileName ?></div>
    </div>
	
	
	
<!-- end comman area-->	
	
<?php if($this->session->userdata('userid')=='printing@wallsnart.com'){
$print_r_jobsheet=$this->backend_model->get_printer_jobsheet_details($order_details[0]->order_id);
?>
	
<div class="rTableRow">
      <div class="Cell1"> <strong>(<?=$i;?>.) Print Size </strong> </div>
      <div class="Cell2"> <?php echo $details->print_size_height.'x'.$details->print_size_width;?> </div>
    </div>

	<div class="rTableRow">
      <div class="Cell1"> <strong> Actual Print Size </strong> </div>
      <div class="Cell2"> <?php echo $print_r_jobsheet[$index]->actual_size;?> </div>
    </div>	
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Border </strong> </div>
      <div class="Cell2"> <?php echo $details->border;?> </div>
    </div>
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Surface </strong> </div>
      <div class="Cell2"> <?php echo $details->surface;?> </div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Number of  print quantity </strong> </div>
      <div class="Cell2">
        <?php echo $quantity= $this->backend_model->get_noofproduct_quantity($details->image_id);
 
        ?>
      </div>
    </div>
	
<? } ?>	
	
	
<? if($this->session->userdata('userid')=='framing@wallsnart.com'){?>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Frame Color </strong> </div>
      <div class="Cell2"> <?php if($details->frame_code<>''){ echo $details->frame_code.'(Inch)';}else{ echo 'N/A;';} ?> </div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Frame Size </strong> </div>
      <div class="Cell2">
        <? if($details->frame_size_width<>'0'){ echo $details->frame_size_width.'(Inch)';}else{ echo 'N/A';}  ?>
      </div>
    </div>
	
	
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount Color </strong> </div>
      <div class="Cell2">
        <? if($details->mount_code<>''){ echo $details->mount_code.'(Inch)';}else{ echo 'N/A';} ?>
      </div>

    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Mount Size </strong> </div>
      <div class="Cell2">
        <? if($details->mount_size_width<>'0'){ echo $details->mount_size_width.'(Inch)';}else{ echo 'N/A';} ?>
      </div>
    </div>
	
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Glass </strong> </div>
      <div class="Cell2">
        <? if($details->glass_name<>''){ echo $details->glass_name;}else{ echo 'N/A';}?>
      </div>
    </div>
	<? }?>
	
	
	
	<?php
   if($this->session->userdata('userid')=='packaging@wallsnart.com'){
   
     $package_details=$this->backend_model->get_packager_details($order_details[0]->order_id);
	 
	 
	$final_product_size=  $package_details[$index]->final_packets_height.' X '.$package_details[$index]->final_packets_weight;
	  
 ?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Size of box use for packaging  </strong> </div>
      <div class="Cell2"><?php  if($package_details[$index]->packets_size<>''){ if($package_details[$index]->packets_size==1){ echo 'Small';}elseif($package_details[$index]->packets_size==2){ echo 'Medium';}elseif($package_details[$index]->packets_size==3){ echo 'Large';}elseif($package_details[$index]->packets_size==4){ echo 'Extra Large';}}else{ echo 'N/A';}?></div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Final product size after packaging (Inch) </strong> </div>
      <div class="Cell2"> Height: <?php  if($package_details[$index]->final_packets_height<>''){ echo  $package_details[$index]->final_packets_height;}else{ echo 'N/A';}  ?> Width: <?php if($package_details[$index]->final_packets_width<>''){ echo  $package_details[$index]->final_packets_width;}else{ echo 'N/A';} ?> Depth: <?php if($package_details[$index]->final_packets_depth<>''){ echo  $package_details[$index]->final_packets_depth;}else{ echo 'N/A';}?></div>
    </div>
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Final product weight after packaging (in Kg) </strong> </div>
      <div class="Cell2"> <?php if($package_details[$index]->final_packets_weight<>''){ echo  $package_details[$index]->final_packets_weight;}else{ echo 'N/A';}?></div>
    </div>
	<?
	}// end permision
	?>
	
	

	
<?php $i++;}?>
	
	
		<? 
	 if($this->session->userdata('userid')=='courier@wallsnart.com'){
	 $courier_details=$this->backend_model->get_courier_details($order_details[0]->order_id);
	 if($courier_details[0]->order_detail<>''){?>

	<div class="rTableRow">
      <div class="Cell1"> <strong> Order shipped </strong> </div>
      <div class="Cell2"> <?php if($courier_details[0]->order_detail==1){ echo 'No';}elseif($courier_details[0]->order_detail==2){ echo 'Yes';}?></div>
    </div>

<? } if($courier_details[0]->delivery_mode<>''){?>
<div class="rTableRow">
      <div class="Cell1"> <strong> Delivery Mode  </strong> </div>
      <div class="Cell2"> <?php if($courier_details[0]->delivery_mode==1){ echo 'Own';}elseif($courier_details[0]->delivery_mode==2){ echo 'Channel Partner';}?></div>
    </div>
	<? }?>
	
  <?php }// end courier permision
  
  $index++;}?>
  
  
  
  

	<div class="rTableRow">
      
    </div>
  </div>
  
 
	
	
  
</div>

