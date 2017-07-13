<?php //print_r($order_details);
$framer_details=$this->backend_model->get_framer_details($order_details[0]->surface);

//print_r($package_details);
if($this->session->userdata('userid')=='courier@wallsnart.com'){
}elseif($this->session->userdata('userid')=='framing@wallsnart.com'){
}elseif($this->session->userdata('userid')=='packaging@wallsnart.com'){
}
elseif($this->session->userdata('userid')=='printing@wallsnart.com'){
}
elseif($this->session->userdata('userid')=='courier@wallsnart.com'){
}


?>


<div style="width:900px; margin:0px auto;">
  <style>
/*---for table css-- */ .date td { padding:10px 5px; border: 1px solid black;}table { border-collapse: collapse;width: 100%;}/*---for table css-- */ /*---for div css-- */ .rTable{border-right:  1px solid #000;border-bottom: 1px solid #000;border-left:   1px solid  #000;}.rTableRow { width:100%; margin:0px 0px; border-bottom: 1px solid black; clear:both;}.Cell1{  width:40%; float:left; padding:10px; }.Cell2{padding:10px; float:left; width:40%; border-left:solid 1px black; }/*---for div css-- */
</style>
  <div class="rTable">
    <div class="rTableRow">
      <div class="Cell1"> <strong>Order Date </strong> </div>
      <div class="Cell2">
        <?=$order_details[0]->created_date?>
      </div>
    </div>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Order ID </strong> </div>
      <div class="Cell2">
        <?=$order_details[0]->order_id?>
      </div>
    </div>
    <?php
	
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



	if($this->session->userdata('userid')=='packaging@wallsnart.com'){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Image ID </strong> </div>
      <div class="Cell2"> <?php if($data_split[2]<>''){ echo $data_split[2];}else{ echo $details->image_id;}?></div>
    </div>
    <div class="rTableRow">
      <div class="Cell1"> <strong>(<?=$i;?>) Image </strong> </div>
      <div class="Cell2"> <img src="<?php echo  $image_url;?>" width="107" height="107" alt="art"/></div>
    </div>
	
	<? }elseif($this->session->userdata('userid')=='courier@wallsnart.com'){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Image ID </strong> </div>
      <div class="Cell2"> <?php if($data_split[2]<>''){ echo $data_split[2];}else{ echo $details->image_id;}?></div>
    </div>
    
	
<div class="rTableRow">
      <div class="Cell1"> <strong> Image </strong> </div>
      <div class="Cell2"> <img src="<?php echo  $image_url;?>" width="107" height="107" alt="art"/></div>
    </div>	
	

	<? }elseif($this->session->userdata('userid')=='printing@wallsnart.com'){?>

    <div class="rTableRow">
      <div class="Cell1"> <strong> Print Size </strong> </div>
      <div class="Cell2"> <?php echo $details->print_size_height;?>*<?php echo $details->print_size_width;?> </div>
    </div>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Print Surface </strong> </div>
      <div class="Cell2"> <?php echo $order_details[0]->surface;?> </div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Border </strong> </div>
      <div class="Cell2"> <?php echo $order_details[0]->border;?> </div>
    </div>
	 <div class="rTableRow">
      <div class="Cell1"> <strong> Image </strong> </div>
      <div class="Cell2"> <img src="<?php echo  $image_url;?>" width="107" height="107" alt="art"/></div>
    </div>
	<? }elseif($this->session->userdata('userid')=='framing@wallsnart.com'){?>
	 <div class="rTableRow">
      <div class="Cell1"> <strong> Image </strong> </div>
      <div class="Cell2"> <img src="<?php echo  $image_url;?>" width="107" height="107" alt="art"/></div>
    </div>
<?php if($details->frame_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Frame material </strong> </div>
      <div class="Cell2"> <?php echo $details->frame_code;?> </div>
    </div>
    <?php }?>
    <?php if($framer_details['color']<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Frame Color </strong> </div>
      <div class="Cell2">
        <?=$framer_details['color']?>
      </div>
    </div>
    <?php }?>
    <?php if($details->frame_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Frame Code </strong> </div>
      <div class="Cell2"> <?php echo $details->frame_code;?> </div>
    </div>
    <?php }?>
    <?php if($details->frame_size_width<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Frame Size </strong> </div>
      <div class="Cell2"> <?php echo $details->frame_size_width;?> </div>
    </div>
      <?php }
       if($details->mount_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount material </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_code;?> </div>
    </div>
    <?php }
     if($details->mount_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount material </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_code;?> </div>
    </div>
    <?php }
     if($details->mount_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount Code </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_code;?> </div>
    </div>
    <?php }
     if($details->mount_size_width<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount Size </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_size_width;?> </div>
    </div>
    <?php }
     if($details->mount_size_width<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount Code </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_size_width;?> </div>
    </div>
    <?php }
     ?>
		<? }elseif($this->session->userdata('userid')=='shalini@wallsnart.com'){?>
      <?php
       if($details->image_id<>'' || $data_split[2]<>''){?>
		<div class="rTableRow">
      <div class="Cell1"> <strong> Image ID </strong> </div>
      <div class="Cell2"> <?php if($data_split[2]<>''){ echo $data_split[2];}else{ echo $details->image_id;}?></div>
    </div>
    <?php }
     ?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Image </strong> </div>
      <div class="Cell2"> <img src="<?php echo  $image_url;?>" width="107" height="107" alt="art"/></div>
    </div>



    <div class="rTableRow">
      <div class="Cell1"> <strong> Print Size </strong> </div>
      <div class="Cell2"> <?php echo $details->print_size_height;?>*<?php echo $details->print_size_width;?> </div>
    </div>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Print Surface </strong> </div>
      <div class="Cell2"> <?php echo $order_details[0]->surface;?> </div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Border </strong> </div>
      <div class="Cell2"> <?php echo $order_details[0]->border;?> </div>
    </div>
    <?php if($details->frame_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Frame material </strong> </div>
      <div class="Cell2"> <?php echo $details->frame_code;?> </div>
    </div>
    <?php }if($framer_details['color']<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Frame Color </strong> </div>
      <div class="Cell2">
        <?=$framer_details['color']?>
      </div>

    </div>
    <?php }if($details->frame_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Frame Code </strong> </div>
      <div class="Cell2"> <?php echo $details->frame_code;?> </div>
    </div>
    <?php }if($details->frame_size_width<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Frame Size </strong> </div>
      <div class="Cell2"> <?php echo $details->frame_size_width;?> </div>
    </div>
    <?php }if($details->mount_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount material </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_code;?> </div>
    </div>
  <?php }if($details->mount_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount material </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_code;?> </div>
    </div>
    <?php }if($details->mount_code<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount Code </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_code;?> </div>
    </div>
    <?php }if($details->mount_size_width<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount Size </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_size_width;?> </div>
    </div>
    <?php }if($details->mount_size_width<>''){?>
    <div class="rTableRow">
      <div class="Cell1"> <strong> Mount Code </strong> </div>
      <div class="Cell2"> <?php echo $details->mount_size_width;?> </div>
    </div>
    <?php }?>
    <div class="rTableRow" style="
    width: 100%;
    margin: 0px 0px;
    border-bottom: 1px solid black;
    clear: both;">
      <div class="Cell1"> <strong> Product Description </strong> </div>
      <div class="Cell2">
        <?=$fileName_details['images_description']?>
      </div>
    </div>
	
	
	
	
	 <?php
  $package_details=$this->backend_model->get_packager_details($order_details[0]->order_id);
	  $j=1;
	  foreach($package_details as $values){
	$final_product_size=  $values->final_packets_height.' X '.$values->final_packets_weight;
	  
 ?>
    <div class="rTableRow">
      <div class="Cell1">(<?=$j;?>) <strong> Size of box use for packaging  </strong> </div>
      <div class="Cell2"><?php if($values->packets_size==1){ echo 'Small';}elseif($values->packets_size==2){ echo 'Medium';}elseif($values->packets_size==3){ echo 'Large';}elseif($values->packets_size==4){ echo 'Extra Large';}?></div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Final product size after packaging (Inch) </strong> </div>
      <div class="Cell2"> Height: <?=$values->final_packets_height; ?> Width: <?=$values->final_packets_width; ?> Depth: <?=$values->final_packets_depth; ?></div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Final product weight after packaging (in Kg) </strong> </div>
      <div class="Cell2"> <?php echo  $values->final_packets_weight;?></div>
    </div>
	<?  $j++; }?>
	
	<?php }?>
    <?php $i++; }?>
	
	
	
	
	 <?php
  $package_details=$this->backend_model->get_packager_details($order_details[0]->order_id);
	  $j=1;
	  foreach($package_details as $values){
	$final_product_size=  $values->final_packets_height.' X '.$values->final_packets_weight;
	  
 if($this->session->userdata('userid')=='packaging@wallsnart.com'){?>
    <div class="rTableRow">
      <div class="Cell1">(<?=$j;?>) <strong> Size of box use for packaging  </strong> </div>
      <div class="Cell2"><?php if($values->packets_size==1){ echo 'Small';}elseif($values->packets_size==2){ echo 'Medium';}elseif($values->packets_size==3){ echo 'Large';}elseif($values->packets_size==4){ echo 'Extra Large';}?></div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Final product size after packaging (Inch) </strong> </div>
      <div class="Cell2"> Height: <?=$values->final_packets_height; ?> Width: <?=$values->final_packets_width; ?> Depth: <?=$values->final_packets_depth; ?></div>
    </div>
	<div class="rTableRow">
      <div class="Cell1"> <strong> Final product weight after packaging (in Kg) </strong> </div>
      <div class="Cell2"> <?php echo  $values->final_packets_weight;?></div>
    </div>
	<? } $j++; }
	
	
	if($this->session->userdata('userid')=='courier@wallsnart.com' || $this->session->userdata('userid')=='shalini@wallsnart.com' ){
	
	 $courier_details=$this->backend_model->get_courier_details($order_details[0]->order_id);
	 //print_r($courier_details);
	 //echo $courier_details[0]->order_detail;
	?>
	
	<div class="rTableRow">
      <div class="Cell1"> <strong> Order shipped </strong> </div>
      <div class="Cell2"> <?php if($courier_details[0]->order_detail==1){ echo 'No';}elseif($courier_details[0]->order_detail==2){ echo 'Yes';}?></div>
    </div>


<div class="rTableRow">
      <div class="Cell1"> <strong> Delivery Mode  </strong> </div>
      <div class="Cell2"> <?php if($courier_details[0]->delivery_mode==1){ echo 'Own';}elseif($courier_details[0]->delivery_mode==2){ echo 'Channel Partner';}?></div>
    </div>
	<? }
	
	?>
	
	
	<div class="rTableRow">
      
    </div>
  </div>
  
 
	
	
  
</div>
