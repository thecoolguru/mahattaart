<?php 
if($this->session->userdata('userid'))
{
$Obj=new Frontend();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 
?>
<?php $name=$this->frontend_model->get_lightbox_name($id);?>
<script>
/*function remove_button(a)
{
 var r=confirm('Do you really want to delete the image?');
   if(r==true){
 var url='<?php echo base_url();?>frontend/lightbox_view/<?php echo $id;?>/'+a;
  window.location.assign(url);}
}*/
</script>
<div style="margin-top:100px; font-weight:bold;">
<?php echo strtoupper($name->lightbox_name);?>
<hr/>
</div>
<div>
<?php if(isset($image)){ $i=0;
foreach($image as $images){
 $result=$this->search_model->get_image_data($images->image_id);

 $data=$this->search_model->get_different_sizes($result->images_filename);
       $datam=$this->search_model->license_cost($result->images_collectionid);
        $wid=$data['0']['size_12'];  
 	 $ht=round($data['0']['actual_size_12']);
 	 $prin=$wid*$ht*1.75;
 	 $lic=$datam['0']['size_12_license_cost'];
 	 $tot=$prin+$lic;?>

<br/>

<div style="overflow:hidden; position:relative;">
<!--<div style="margin-right:30px; float:right; font-weight:bold;">Quantity Ordered &nbsp;&nbsp;<div style="margin-right:40px;float:right; font-weight:bold;">Total Amount</div>&nbsp;&nbsp;<div style="margin-right:20px;float:right; font-weight:bold;">Discount</div>
</div>-->

<img src="http://www.indiapicture.in/wallsnart/158/<?php echo $result->images_filename;?>" width="100" height="100" alt="image" align="left"/>

<!--<img class="cross1" id="story'+i+'" onclick="remove_button('<?php echo $images->image_id?>');">-->

<div style="margin-left:10px; margin-top:30px;float:left;"> Collection Name:&nbsp;&nbsp;<?php echo $result->images_photographer;?>&nbsp;|&nbsp;&nbsp;Image Id:&nbsp;&nbsp;<?php echo $result->images_id;?>
<?php if($data){?>&nbsp;&nbsp;|&nbsp;&nbsp;Image Size:&nbsp;&nbsp;
<?php echo $data['0']['size_12'];?>&quot; x<?php echo round($data['0']['actual_size_12']);?>&quot;<?php }?>

<div style="margin-top:10px;float:left;">&nbsp;&nbsp;Printing  Surface Type:&nbsp; Photographic Print&nbsp;&nbsp;|&nbsp;&nbsp;Total:&nbsp;&nbsp;
<img src="http://ec2-50-16-86-162.compute-1.amazonaws.com/wallsnart/assets/images/rupee-search-page.gif" alt="rupees"><?php echo $tot;?></div>
</div>
<div style="margin-top:10px;float:left;margin-left:10px;">&nbsp;&nbsp;Frame Type:&nbsp; -----&nbsp;&nbsp;|&nbsp;&nbsp;Mount Type:&nbsp;&nbsp;-----</div>
</div>
<br/>
<hr/>
<?php $i++;}}?>
</div>
<div style="min-height:200px;">
</div>