<?php

print_r($imges_details);
 /*echo $collection_name;
  $this->load->library('multipledb'); // loading library.

// Loading second db and running query.
$CI = &get_instance();
//setting the second parameter to TRUE (Boolean) the function will return the database object.
$this->indiapicture = $CI->load->database('indiapicture', TRUE);

   $sql_query="SELECT collection_range FROM tbl_category where portal='2' and collections like '%".$collection_name."%'";
$qry = $this->indiapicture->query($sql_query);
$collection=$qry->result();
//echo $collection[0]->collection_range;
if($collection[0]->collection_range=='A+'){
$quality='1';
}elseif($collection[0]->collection_range=='A'){
$quality='2';
}elseif($collection[0]->collection_range=='B'){
$quality='3';
}elseif($collection[0]->collection_range=='C'){
$quality='4';
}elseif($collection[0]->collection_range=='D'){
$quality='5';
}elseif($collection[0]->collection_range=='E'){
$quality='6';
}elseif($collection[0]->collection_range=='F'){
$quality='7';
}
 $collection[0]->collection_range;
$result_rate=$this->frontend_model->get_web_price($collection[0]->collection_range);
 $rate= $result_rate[0]->rate;
  $rate.'<br>';*/

$quality='7';
$this->load->model('cart_model');
$userid=$this->session->userdata('userid');


 $click_to_enlarge = "http://api.indiapicture.in/wallsnart/function.php?param=click_to_enlarge&images_id=$api_image_id";

$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);
$search_data_raw = file_get_contents($click_to_enlarge, false, $context);
$search_data = json_decode($search_data_raw,TRUE);


$collection_id=$this->search_model->get_image_collection($images_id);
$pricing_ran=$this->search_model->get_range($images_id);
$pricing_range=$pricing_ran->pricing_range;
$max_size=$this->search_model->get_max_size($images_id);

 $max_width_allowed=$max_size->image_original_width/150;
$max_height_allowed=$max_size->image_original_height/150;


$bride=split('_',$image_name);

  if($bride[0]=='BRID'){
$data= str_split($image_name,8);
  $bridge_id=$data[1];
 $add_imgid= $bridge_id+3179;
 $reverse_val= $this->frontend_model->reverse_number($add_imgid);
$append_zero=$reverse_val.'0';
$bride_id=$append_zero; 
 $img_src= "http://images2.bridgemanart.com/cgi-bin/bridgemanImage.cgi/400.XIR.".$bride_id.".7055475/".$data[1].".JPG";

  }


// calcuulate image ratio
$size_data = getimagesize("http://images2.bridgemanart.com/cgi-bin/bridgemanImage.cgi/400.XIR.".$bride_id.".7055475/".$data[1].".JPG");
$image_alignment="";
// Step 1: detect image is horizontal, vertical or square 
//  0=>width and 1=>height :::: 4:3->1.3333 and 2:3->0.667 :::: 12,16,24,32,40,44
   $image_width=$size_data[0];
 $image_height=$size_data[1];

  $image_ratio=$image_width/$image_height;
$size_array=array();
 $role_size = 24;
$lower_value = 0;
//echo $pricing_range;

/// width >=height
if($size_data[0]>=$size_data[1])
{ // echo round($max_width_allowed);
	
        $size_array[0]['height']=10/$image_ratio;
        $size_array[0]['width']=10;
        $size_array[1]['height']=12/$image_ratio;
        $size_array[1]['width']=12;
        $size_array[2]['height']=18/$image_ratio;
        $size_array[2]['width']=18;
        $size_array[3]['height']=24/$image_ratio;
        $size_array[3]['width']=24;
        $size_array[4]['height']=30/$image_ratio;
        $size_array[4]['width']=30;
        $size_array[5]['height']=36/$image_ratio;
        $size_array[5]['width']=36;
        $size_array[6]['height']=44/$image_ratio;
        $size_array[6]['width']=44;
        $size_array[7]['height']=48/$image_ratio;
        $size_array[7]['width']=48;
        $size_array[8]['height']=50/$image_ratio;
        $size_array[8]['width']=50;
        $size_array[9]['height']=56/$image_ratio;
        $size_array[9]['width']=56;
        $size_array[10]['height']=60/$image_ratio;
        $size_array[10]['width']=60;
		$size_array[11]['height']=round($max_width_allowed/$image_ratio);
        $size_array[11]['width']=$max_width_allowed;


   $rollSize= choose_role_size($size_array[0]['width'],$size_array[0]['height']);
    $actual_price=$size_array[0]['width']*$rollSize*$rate;
     $size_array[0]['width'].'_'.$rollSize.'_'.$rate;
    }else if($size_data[0]<=$size_data[1])
{ // echo $max_height_allowed;
	
        $size_array[0]['width']=10/$image_ratio;
        $size_array[0]['height']=10;
        $size_array[1]['width']=12/$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=18/$image_ratio;
        $size_array[2]['height']=18;
        $size_array[3]['width']=24/$image_ratio;
        $size_array[3]['height']=24;
        $size_array[4]['width']=30/$image_ratio;
        $size_array[4]['height']=30;
        $size_array[5]['width']=36/$image_ratio;
        $size_array[5]['height']=36;
        $size_array[6]['width']=44/$image_ratio;
        $size_array[6]['height']=44;
        $size_array[7]['width']=48*$image_ratio;
        $size_array[7]['height']=48;
        $size_array[8]['width']=50/$image_ratio;
        $size_array[8]['height']=50;
        $size_array[9]['width']=56/$image_ratio;
        $size_array[9]['height']=56;
        $size_array[10]['width']=60/$image_ratio;
        $size_array[10]['height']=60;
		 $size_array[11]['width']=round($max_height_allowed/$image_ratio);
        $size_array[11]['height']=$max_height_allowed;
		

   $rollSize= choose_role_size($size_array[0]['width'],$size_array[0]['height']);
     
   
  // $actual_price=$size_array[0]['height']*$rollSize*$rate;
  $size_array[0]['height'].'*'.$rollSize.'*'.$rate;
   
}
 $actual_price;
  // echo $rate; 
       $size_array[0]['height'].'<br>';
        $size_array[0]['width'].'<br>';


 

function choose_role_size($width,$height)
{
	if($width>$height)
	{
		$fix_val = $height;	
	}
	else
	{
		$fix_val = $width;
	}

	//echo $fix_val;
	       
                        if($fix_val<=17)
                        {
                           return 17;
                        }else
                        if($fix_val<=24 && $fix_val>17)
                        {
                           return 24;
                        }
                        else if($fix_val<=44 && $fix_val>24)
                        {
                           return 44;
                        }
                        else if($fix_val<=50 && $fix_val>44)
                        {
                           return  50;
                        }else if($fix_val<=64 && $fix_val>50)
                        {
                           return  64;
                        }
      	
}/// end function



function give_licence_price($pricing_range)
{
    if($pricing_range=='mid')
{

  $tolalLic=  $image_width*$image_height*2;  
 return $totalPriceLic=$tolalLic*50/100;
 
//return 1800;
}
elseif($pricing_range=='low')
{
    //return 600;
    $tolalLic=  $image_width*$image_height*2;  
 return $totalPriceLic=$tolalLic*50/100;
}elseif($pricing_range=='high')
{
    //return 600;
    $tolalLic=  $image_width*$image_height*2;  
 return $totalPriceLic=$tolalLic*50/100;
}


}

// wastage calculation
$lower_value = 12;
$size_with_wastage = $role_size*$lower_value;

//echo $surfaceRate;
//image licencing cost
$licence_base_price=give_licence_price($collection_id);
  
 
if( $size_array[0]['width']> $size_array[0]['height'])
{
    $low_val=round($size_array[0]['height']);
    $high_val=round($size_array[0]['width']);

}
else
{
    $low_val=round($size_array[0]['width']);
    $high_val=round($size_array[0]['height']);
}

 

$s=round($size_array[0]['height']).'X'.round($size_array[0]['width']);
//print_r($size_array[0]['width']);
//print '<br/>';
//print_r($size_array[0]['height']);
//print '<br/>';
//print($wastage_cost).'<br/>';
//$a=give_licence_price($pricing_range).'<br/>';
  //  print($a);
$price=(round($size_array[0]['width'])*round($size_array[0]['height'])*2)+$wastage_cost+give_licence_price($pricing_range);


 $size_array[$i]['width'];
$papper=$this->frontend_model->get_add_details('1');





?>

<link href="<?php print base_url();?>assets/css1/portBox.css" rel="stylesheet" type="text/css"/>
<script>/*<![CDATA[*/$(document).ready(function(){var d=$("#quality").val();var b=$("#sizes option:selected").val();var a=$("#print_sizes option:selected").val();var c=$("#quality_rate").val();$("#surface_printer").html(a);$("#image_selected_size").html(b);$.ajax({type:"post",url:"<?=base_url()?>index.php/frontend/get_web_price_detials",data:"print_paper="+a+"&quality="+d,success:function(e){throw_price(e,a);$("#quality_rate").val(e)}})});function call_set_sizes(a,b){window.location="<?php print base_url(); ?>index.php/search/image_detail/<?php print $image_detail->images_filename; ?>/"+b+"/"+a}function calculate_cost(m){var g=$("#sizes option:selected").val();var e=$("#print_sizes").val();var c=$("#quality_rate").val();var h=m.split("X");$("#image_size").val(m);var j;var b=parseInt(h[0]);var l=parseInt(h[1]);if(e=="Photo canvas"||e=="Hahnemuhle Photo Canvas"||e=="Hahnemuhle Daguerre canvas"){var i=parseInt(l)+parseInt(4);var a=parseInt(b)+parseInt(4)}else{i=l;a=b}if(a>=i){var f=a}else{if(a<=i){f=i}}var j;if(Number(f)<=17){var j=17}else{if(Number(f)<=24&&Number(f)>17){var j=24}else{if(Number(f)<=44&&Number(f)>24){var j=44}else{if(Number(f)<=60&&Number(f)>44){var j=64}}}}if(a<=i){var d=(a*parseInt(j)*c);var k=a}else{if(b>=i){k=i;var d=(i*parseInt(j)*c)}}$("#total_cost").html(Math.round(d.toFixed(2)))}/*]]>*/

function frame_it_price(a,c)
{  
    var m= document.getElementById('sizes').value;
    var cost=document.getElementById('total_cost').innerHTML;
    var size=document.getElementById('sizes').value;
	//alert(m); return false;
   var url='<?=base_url()?>index.php/frontend/frame_it/'+c+'/'+a+'/'+cost+'/'+<?=$quality?>+'/'+size;
   window.location.assign(url);
}


</script>

<style>/*<![CDATA[*/.newid{display:none;position:absolute;top:11px;left:121px;padding:15px;border:3px solid #ff7949;border-radius:10px;background-color:white;z-index:10000001;overflow:auto}.newid1{display:none;position:absolute;top:73px;left:279px;padding:15px;border:3px solid #ff7949;border-radius:10px;background-color:white;z-index:10000001;overflow:auto}.main{margin:0 auto;max-width:500px;padding:15px;background-image:url(<?=           base_url()?>assets/images/bot_left.png),url(<?=           base_url()?>assets/images/bot_rig.png),url(<?=           base_url()?>assets/images/top_righ.png),url(<?=           base_url()?>assets/images/top_lef.png),url(<?=           base_url()?>assets/images/ver_left.png),url(<?=           base_url()?>assets/images/ver_righ.png),url(<?=           base_url()?>assets/images/hor_bot.png),url(<?=           base_url()?>assets/images/hor_top.png);background-position:bottom left,bottom right,top right,top left,left,right,bottom,top;background-repeat:no-repeat,no-repeat,no-repeat,no-repeat,repeat-y,repeat-y,repeat-x,repeat-x}.main img{width:100%;height:auto}/*]]>*/</style>
<div class="main-container" style="width:78%">
<div class="pagination"> <span><a href="<?php print base_url();?>">Home</a> <a href="javascript:history.back()">Search Result</a> Image Detail </span> </span> </div>
<div class="decorative">
<div class="decorative-l-c"> <img src="<?=$img_src?>" /> <br>
<br>
View: <a href="javascript:" onClick="get_room()">View in room</a> | <a href="#" onClick="get_win()">Enlarge image</a> </div>
<div class="decorative-r-c" style="margin-left:11%">
<h1>Portrait of&nbsp;<?=$image_detail[0]['image_photographer'];?> </h1>
<p><?=substr($image_detail[0]['image_caption'],0,30); ?></p>
<p><strong>Item # :<?=$image_name.'.JPG';?></strong></p>
<p><?=$image_detail[0]['image_description'];?></p>
KEYWORDS:-
<p><?php print $image_detail[0]['image_keywords']; ?></p>
<input type="hidden" name="img_id" id="img_id" value="<?=$image_detail[0]['images_id'];?>" />
<h2>SELECT SIZE: <?php // echo $max_width_allowed; ?></h2>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" value="<?php echo $image_detail[0]['image_collectionid'];?>" name="collection" id="collection" />
<select name="sizes" id="sizes" class="size-list-input" onChange="calculate_cost(this.value)">
<?php 
                                 for($i=0;$i<=11;$i++)
                                 {
                                     if($size_array[$i]['width']<=$max_width_allowed&&$size_array[$i]['height']<=$max_height_allowed)
                                     {?>
<option value="<?php print round(number_format($size_array[$i]['width'],1,'.','')).'X'.round(number_format($size_array[$i]['height'],1,'.',''));?>"><?php print round(number_format($size_array[$i]['width'],1,'.','')).'" X '. round(number_format($size_array[$i]['height'])).'"';?></option>
<?php
                                 }}?>
</select>
</form>
<h2> SELECT PRINTING SURFACE </h2>
<select name="print_sizes" id="print_sizes" class="size-list-input" onChange="return get_quality(this.value)">
<?php foreach($papper as $result){?>
<option value="<?=$result->print_paper;?>">
<?=$result->print_paper;?>
</option>
<?php }?>
</select>
<div>
<div style="padding-left:60px"> <img src="<?=base_url()?>assets/images/rupee-img-price.gif" width="8" height="15" alt="rupee" /> <b id="total_cost" style="font-size:20px;color:#F00">
<?=round($actual_price,0);?>
</b> </span></div>
</div>
<div style="margin:10px 0">
<div class="col-md-2" id="image_selected_size">
<p> 24" x 16" &nbsp;&nbsp;&nbsp;&nbsp; | </p>
</div>
<div class="col-md-3" id="surface_printer">
<p> Canvas Prints</p>
</div>
<div style="clear:both"></div>
</div>
<p> <a href="#"> BUY PRINT </a> &nbsp; <a href="javascript:"> Add Frame </a> &nbsp; <a <?php   if($this->session->userdata('userid')) {?> href="javascript:" onclick="addtogallery('<?=$image_detail[0]['image_id'];?>')" id="tgl" <?php }
else {?> href="javascript:void(0)" onclick="login('')" <?php }?>>Add to Gallery </a> &nbsp; <a <?php  if(!$this->session->userdata('userid')) {?> href="javascript:void(0)" onclick="login('')" <?php }else{?> href="#!" id="#" <?php  }?>>Add to Cart</a> </p>
</div>
</div>
<div class="decorative">
<div class="backblack" id="back" onClick="allclose('')" style="display:none">&nbsp;</div>
<div class="frameit" id="frameitpop" style="display:none">
<div style="float:right"><a href="#" onClick="allclose('')">X</a></div>
<p style="overflow:hidden">"This section is under maintenance. Kindly contact us</br>
at <b style="color:red">011- 41828972</b> or mail us at <a href="#" style="color:red">info@wallsnart.com</a> </br>
to complete the purchase oder."</p>
</div>
<div class="make-dt"></div>
</div>
<input type="hidden" value="<?php echo $pricing_range;?>" id="pricing_ran" name="pricing_ran"/>
</div>
<div id="new" class="newid">
<div align="right"> <a href="javascript:void(0)" onClick="document.getElementById('new').style.display='none';document.getElementById('fade').style.display='none'">Close</a> </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> </tr>
<tr> <img src="<?=$img_src?>" /> </tr>
</table>
</div>
<div id="new1" class="newid1">
<div align="right"> <a href="javascript:void(0)" onClick="document.getElementById('new1').style.display='none';document.getElementById('fade').style.display='none'">Close</a> </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> </tr>
<tr>
<div id="w" style="background:url(<?php echo base_url();?>assets/images/room-view.jpg) no-repeat top center;width:725px;height:500px;border:1px solid black">
<div id="icons" style="display:block;padding-top:30px;text-align:center">
<?php  $wid=$size_array[0]['width']/6 * 720/10;
                                                   $hig=$size_array[0]['height']/6*720/10;
                                          ?>
<img src="<?="http://images2.bridgemanart.com/cgi-bin/bridgemanImage.cgi/75.XIR.".$bride_id.".7055475/".$data[1].".JPG";?>"class="drag-image" id="draggable" height="<?=$hig?>" width="<?=$wid?>" style="border-radius:5px;border:solid 2px;border-color:#b57424" /> </div>
</div>
</tr>
</table>
</div>
<input type="hidden" name="image_id" id="image_id" value="<?=$image_id?>">
<input type="hidden" name="image_filename" id="image_filename" value="<?=$image_detail[0]['image_filename']?>">
<input type="hidden" name="user_id" value="<?=$userid?>">
<input type="hidden" name="api_image_id" id="api_image_id">
<input type="hidden" name="quality_rate" id="quality_rate" value="">
<input type="hidden" name="image_size" id="image_size" value="">
<input type="hidden" name="quality" id="quality" value="<?=$quality;?>">
<script>/*<![CDATA[*/function get_quality(b){var a=$("#sizes option:selected").val();var c=$("#quality_rate").val();var d=$("#quality").val();$("#image_selected_size").html(a);$("#surface_printer").html(b);$.ajax({type:"post",url:"<?=base_url()?>index.php/frontend/get_web_price_detials",data:"print_paper="+b+"&quality="+d,success:function(e){throw_price(e,b);$("#quality_rate").val(e)}})}function throw_price(g,c){var f=$("#sizes option:selected").val();var h=f.split("X");var b=parseInt(h[0]);var l=parseInt(h[1]);if(c=="Photo canvas"){var j=parseInt(l)+parseInt(4);var a=parseInt(b)+parseInt(4)}else{j=l;a=b}if(a>=j){var e=a}else{if(a<=j){e=j}}var i;if(Number(e)<=17){i=17}else{if(Number(e)<=24&&Number(e)>12){i=24}else{if(Number(e)<=44&&Number(e)>24){i=44}else{if(Number(e)<=60&&Number(e)>44){i=64}}}}if(a<=j){var d=(a*parseInt(i)*g);var k=b}else{if(a>=j){k=j;d=(j*parseInt(i)*g)}}$("#total_cost").html(Math.round(d))};/*]]>*/


function get_win()
{
	document.getElementById('new').style.display='block';
	document.getElementById('fade').style.display='block';
}
function get_room()
{
    document.getElementById('new1').style.display='block';
    document.getElementById('fade').style.display='block';
}


function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}


</script>
<style>
.newid {
	display: none;
	position: absolute;
	top: 11px;
         left: 121px;
	padding: 15px;
	border: 3px solid #FF7949;
	border-radius: 10px;
	background-color: white;
	z-index: 10000001;
	overflow: auto;
}
.newid1 {
    display: none;
    position: absolute;
    top: 73px;
    left: 279px;
    padding: 15px;
    border: 3px solid #FF7949;
    border-radius: 10px;
    background-color: white;
    z-index: 10000001;
    overflow: auto;
}

.main {
	margin: 0 auto;
	max-width: 500px;
	padding: 15px;
	background-image: url(<?=           base_url()?>assets/images/bot_left.png
		), url(<?=           base_url()?>assets/images/bot_rig.png ),
		url(<?=           base_url()?>assets/images/top_righ.png ),
		url(<?=           base_url()?>assets/images/top_lef.png ),
		url(<?=           base_url()?>assets/images/ver_left.png ),
		url(<?=           base_url()?>assets/images/ver_righ.png ),
		url(<?=           base_url()?>assets/images/hor_bot.png ),
		url(<?=           base_url()?>assets/images/hor_top.png );
	background-position: bottom left, bottom right, top right, top left,
		left, right, bottom, top;
	background-repeat: no-repeat, no-repeat, no-repeat, no-repeat, repeat-y,
		repeat-y, repeat-x, repeat-x;
}

.main  img {
	width: 100%;
	height: auto;
}
</style>
