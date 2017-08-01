 <?php 
 $collection_name;
   $continue_shopping_redirect=$this->session->userdata('continue_shopping');

  $this->load->library('multipledb'); // loading library.

// Loading second db and running query.
$CI = &get_instance();
//setting the second parameter to TRUE (Boolean) the function will return the database object.
$this->indiapicture = $CI->load->database('indiapicture', TRUE);

    $sql_query="SELECT collection_range FROM tbl_category where portal='2' and collections like '%".trim($collection_name)."%'";
$qry = $this->indiapicture->query($sql_query);
$collection=$qry->result();

   $collection_range=$collection[0]->collection_range;
 
 $collection[0]->collection_range;
$result_rate=$this->frontend_model->get_web_price($collection[0]->collection_range);
 $rate= $result_rate[0]->rate;
    // echo  $rate.'<br>';

$this->load->model('cart_model');
  $userid=$this->session->userdata('userid');
 
  $image_id=$image_detail[0]['image_id'];
//print_r($image_id);
//print_r($image_detail);
$lightbox= $this->frontend_model->get_light_boxName($images_id,$userid); 
//print_r($lightbox);
 $max_w=$image_detail[0]['image_original_width'];
  $max_h=$image_detail[0]['image_original_height'];

 $s_height=$max_h;
 $s_width=$s_height*2;
 $v_height=2*$max_w;
if($max_w>$max_h){

   if($max_w<$s_width){
      
    $f_shape="Horizontal";
     }
	 else{
	 $f_shape="Panoramic";
	 }
    }
	else if($max_w<$max_h){
	 
 
    if($max_h>$v_height){
	 $f_shape="Slim";
	}
	else{
	 $f_shape="Vertical";
	}
  
  }
else if($max_h==$max_w){
  $f_shape="Square";
}

 $click_to_enlarge = "http://api.indiapicture.in/wallsnart/function.php?param=click_to_enlarge&images_id=$api_image_id";

$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);
$search_data_raw = file_get_contents($click_to_enlarge, false, $context);
$search_data = json_decode($search_data_raw,TRUE);


$collection_id=$this->search_model->get_image_collection($images_id);
$pricing_ran=$this->search_model->get_range($images_id);
$pricing_range=$pricing_ran->pricing_range;
$max_size=$this->search_model->get_max_size($images_id);

  $max_width_allowed=$max_w/150;
  $max_height_allowed=$max_h/150;

// calcuulate image ratio
$size_data = getimagesize("http://static.mahattaart.com/398/".$image_detail[0]['image_filename']."");
//print_r($size_data);
//echo "sajid";
$image_alignment="";

   $image_width=$size_data[0];
 $image_height=$size_data[1];

  $image_ratio=$image_width/$image_height;
$size_array=array();
 $role_size = 64;
$lower_value = 0;

if($size_data[0]>=$size_data[1])
{ 
//echo $image_ratio;
	
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
		$xx=in_array(round($max_width_allowed), array(10,12,18,24,30,36,44,48,50,56,60));
		if($xx==''){
		$size_array[11]['height']=round($max_width_allowed/$image_ratio);
        $size_array[11]['width']=round($max_width_allowed);
       }

   $rollSize= choose_role_size($size_array[0]['width'],$size_array[0]['height']);
    $actual_price=$size_array[0]['width']*$rollSize*$rate;
     $size_array[0]['width'].'_'.$rollSize.'_'.$rate;
    }else if($size_data[0]<=$size_data[1])
{ // echo $max_height_allowed.$image_ratio;
	
        $size_array[0]['width']=10*$image_ratio;
        $size_array[0]['height']=10;
        $size_array[1]['width']=12*$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=18*$image_ratio;
        $size_array[2]['height']=18;
        $size_array[3]['width']=24*$image_ratio;
        $size_array[3]['height']=24;
        $size_array[4]['width']=30*$image_ratio;
        $size_array[4]['height']=30;
        $size_array[5]['width']=36*$image_ratio;
        $size_array[5]['height']=36;
        $size_array[6]['width']=44*$image_ratio;
        $size_array[6]['height']=44;
        $size_array[7]['width']=48*$image_ratio;
        $size_array[7]['height']=48;
        $size_array[8]['width']=50*$image_ratio;
        $size_array[8]['height']=50;
        $size_array[9]['width']=56*$image_ratio;
        $size_array[9]['height']=56;
        $size_array[10]['width']=60*$image_ratio;
        $size_array[10]['height']=60;
		$yy=in_array(round($max_height_allowed),array(10,12,18,24,30,36,44,48,50,56,60));
		if($yy==''){
		 $size_array[11]['width']=round($max_height_allowed*$image_ratio);
        $size_array[11]['height']=round($max_height_allowed);
		}

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

$price=(round($size_array[0]['width'])*round($size_array[0]['height'])*2)+$wastage_cost+give_licence_price($pricing_range);

//die('sajid');
 $size_array[$i]['width'];

 
?>

<script type="text/javascript" src="<?php print base_url();?>assets/js1/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/js1/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/js1/portBox.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/js/jquery.reveal.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<link href="<?php print base_url();?>assets/css1/portBox.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php print base_url();?>assets/js1/portBox.slimscroll.min.js"></script>
<script>


$(document).ready(function(){

     // var total_cost_zero=$('')
        var quality=$('#quality').val();
	var image_size=$( "#sizes option:selected" ).val();
	var print_sizes=$( "#print_sizes option:selected" ).val();
	var quality_rate=$('#quality_rate').val();
	//alert(image_size);
	
     // $('#surface_printer').html(print_sizes); 
	  
	  var split = image_size.split('X');
    
var width=parseInt(split[0]);
var height=parseInt(split[1]);
 
	  var orig_image_size=width+'" X '+height+'"';
	  if(print_sizes=='Hahnemuhle Photo Matte Fibre'){
    	  //alert('matt')
		  var image_size_final=(width  + parseInt(1))+'" X '+(height + parseInt(1))+'"'; 
        $('#image_selected_size').html(image_size_final+' Giclee  Print &nbsp; ');
		$('#surface_printer').html(orig_image_size+' Giclee Print without border');
	  }
	 else{
	//  alert('canvas')
	  var image_size_final=(width  + parseInt(4))+'" X '+(height + parseInt(4))+'"'; 
        $('#image_selected_size').html(image_size_final+' Canvas  Print &nbsp; ');
		$('#surface_printer').html(orig_image_size+' Canvas Print without border');
	  }
	 
		
		
        $.ajax({
            type: 'post',
             url: '<?=base_url()?>frontend/get_web_price_detials',
            data:'print_paper='+print_sizes+'&quality='+quality,
            success: function(response){
               // alert(response)
                throw_price(response,print_sizes);
               $('#quality_rate').val(response);
                
            }
            
        });
		
	


});


function call_set_sizes(surface,cat_id)
{
    //alert(1);
window.location = "<?php print base_url(); ?>search/image_detail/<?php print $image_detail[0]['image_filename']; ?>/"+cat_id +'/'+surface;
}


function calculate_cost(size)
{
var image_size=$( "#sizes option:selected" ).val();
 var print_sizes=$('#print_sizes').val();
 var ratesof=$('#quality_rate').val();
//alert(size);


    var split = size.split('X');
    
   $('#image_size').val(size);
    var role_size;
   
var width=parseInt(split[0]);

var height=parseInt(split[1]); 
var orig_image_size=width+'" X '+height+'"';
//alert(print_sizes);
var image_size_final=width+'" X '+height+'"';
 $('#image_selected_size').html(image_size_final);
 

if(print_sizes=='Photo canvas' || print_sizes=='Hahnemuhle Photo Canvas' || print_sizes=='Hahnemuhle Daguerre canvas'){
///alert(print_sizes);
var c_height=parseInt(height)+parseInt(4);
//alert(c_height);
var c_width=parseInt(width)+parseInt(4);
var image_size_final=c_width+'" X '+c_height+'"';
 $('#image_selected_size').html(image_size_final+' Canvas Print  ');
 $('#surface_printer').html(orig_image_size+' Canvas	 Print without border');
}
else{
 var c_height=parseInt(height)+parseInt(1);
 var c_width=parseInt(width)+parseInt(1);
 var image_size_final=c_width+'" X '+c_height+'"';
 $('#image_selected_size').html(image_size_final+' Giclee Print         ');
 $('#surface_printer').html(orig_image_size+' Giclee Print without border');
  }
   

    var role_size;
   
        if(Number(c_width)<=17 && Number(c_height)<=17)
        {
            var role_size = 17;
			// alert(role_size);
			
        }
else if(c_width==c_height){
      if(c_width<=17){
              var role_size = 17;
                }
          else if(c_width<=24 && c_width>17){
           var role_size = 24;

        }
else if(c_width<=44 && c_width>24){
  var role_size = 44;
}
else if(c_width<=64 && c_width>44){
var role_size = 64;

}
                   // alert('equall')

                  }
else if((Number(c_width)<=24 && Number(c_width)>17 ) && (Number(c_height) <=24 && Number(c_height) >17))
        {
		 var role_size = 24;
		 // alert(role_size+'bothlesswala');
        }
        else if((Number(c_width)>17 && Number(c_width)<24 && Number(c_height)>24) || (Number(c_height)>17 && Number(c_height)<24 && Number(c_width)>24)){
		 
			 //alert('orgreaterwala17');
			  var role_size = 24;
			// alert(role_size);
			
			
		
		}
		
		else if((Number(c_width)>17 && Number(c_width)<24) || (Number(c_height)>17 && Number(c_height)<24)){
		 
			 //alert('orgreaterwala17');
			  var role_size = 17;
			// alert(role_size);
			
			
		
		}
		
		else if(Number(c_width)<=44 && Number(c_width) >24 && (Number(c_height) >24 && Number(c_height)<=44 ))
        {
            var role_size = 44;
		//	alert(role_size);
        }
		else if((Number(c_width)>24 && Number(c_width)<44)|| (Number(c_height)>24 && Number(c_height)<44)){
		 var role_size = 24;
		 // alert(role_size+'orgreaterwala');
		}
          
        else if((Number(c_width)>44 && Number(c_width)<64) || (Number(c_height)>44 && Number(c_height)<64))
        {
           var role_size = 44;
		    //alert(role_size);
        }
          
      
		if((Number(c_width) && Number(c_height))<=(role_size)){
		//alert('bothless')
		  if(c_width < c_height){
		
		   var cost=c_width*role_size*ratesof;
		  }
		  else if(c_width > c_height){
		  var cost=c_height*role_size*ratesof;
		  
		  }
		
		}
		//alert(Number(c_width)+'x'+Number(c_height)+'x'+Number(role_size)+'x'+Number(ratesof));
	 if(Number(c_width)>Number(role_size)|| Number(c_height)>Number(role_size)){
		//alert('or')

   if(c_width>role_size){
      var cost=(c_width*parseInt(role_size)*ratesof);
   }

else if(c_height>role_size){
  
    var cost=(c_height*parseInt(role_size)*ratesof);
     
   }

   }
 if(c_height==c_width){
   //alert('equall')
    var cost=(c_height*parseInt(role_size)*ratesof);
     
   }
//alert(value+'*'+role_size+'*'+<?=$rate;?>);
  
  // alert(cost)

    $('#total_cost').html(Math.round(cost.toFixed(2)));
    
    
}// end function

</script>
<script type="text/javascript">
function frame_it_price_send(a,b,c)
{  

    var print_type= document.getElementById('print_sizes').value;
  // alert(print_type);
    var cost=document.getElementById('total_cost').innerHTML;
	 var image_selected_size=$('#image_selected_size').html();
		 //alert(image_selected_size) 
		  var sub_size=image_selected_size.substring('',9);
		  
		  var sub_sub_size=sub_size.replace('"','');
		     var sz=sub_sub_size.replace('"','');
			 var sizee=sz.trim();
			// alert('jjjj')
    var wo_bodered_size=document.getElementById('sizes').value;
    var url='<?=base_url()?>frontend/frame_it/<?=$f_shape;?>/'+print_type+'/'+cost+'/'+wo_bodered_size+'/'+sizee+'/'+c+'/'+<?php echo "'".$collection_range."'";?>+'/'+<?=$api_image_id?>+'/'+<?=$images_id?>;
    window.location.assign(url);
}

function show_status(live_id,a,cat_id)
{  
    var type="<?php echo $this->input->get('txt');?>";
    var k=$("#total_cost").html();
    var j=$("#c_sizes").html();
    var l=$("#print_type_for_image").html();
       var m=document.getElementById('print_sizes').value;
       var n=document.getElementById('sizes').value;
          if(m==1)
          {
              var print_type='Canvas';
          }
          else if(m==3)
          {
              var print_type='Photographic print';
          }
          else if(m==4)
          {
              var print_type='Premium photographic print';
          }
          else if(m==7)
          {
              var print_type='Translite';
          }
         else if(m==8)
          {
              var print_type='Poster';
          }        
         //alert(print_type);
         //alert(n);
   
 var datastring='image_id='+a+'&price='+ k +'&size='+ n+'&print_type='+print_type;
    $.ajax({
             type: "POST",
	      	 url: "<?php print base_url() ?>cart/check_image_exist_status",
             data:datastring,
             success:function(datam)  
             {    
                if(datam=='2')
                   {
                      alert("This Image has already been added to cart.");
                   }
                else
                   {
                     var url="<?=base_url()?>cart/cart_view?img_id="+a+"&search_text="+type+"&price="+k+"&size="+n+"&print_type="+print_type+"&cat_id="+cat_id+'&live_id='+live_id;
                     window.location.assign(url);
                   }
              }
         });
}

function get_win()
{
    $('#new1').hide();
	document.getElementById('new').style.display='block';
	document.getElementById('fade').style.display='block';
}
function get_room()
{
     $('#new').hide();
    document.getElementById('new1').style.display='block';
    document.getElementById('fade').style.display='block';
}

$(function() {
    $("#draggable").draggable( {containment: "#w",
        scroll: false});

});

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

<script>
	function buy_print_addtocart(a){
	//alert(a);
	if(a==1){
	$('.frame-step-header-text').html('<span class="glyphicon glyphicon-ok" style="margin-right:10px;"></span>Item Added To Cart.');
	}
	
	}
	</script>

<div class="frame-step-header-container" style="display:none">
    <div class="container frame-step-header-wrapper">
        <div class="frame-step-header-text">
	       
        </div>
        <div class="frame-step-button-wrapper">
            <div class="frame-step-continue-shopping-button">
                <a  style="color:white" href="<?=base_url().''.$continue_shopping_redirect?>">CONTINUE SHOPPING</a>
            </div>
            <div class="frame-step-proceed-to-cart-button">
              <a style="color:white" href="<?=base_url().'cart/cart_view'?>">  PROCEED TO CART</a>
            </div>
        </div>
    </div>
</div>
<style>
.frame-step-header-container {
  background-color: #ececec;
  width: 100%;
  padding: 10px 0;
}

.frame-step-header-text {
  color: #6abb4c;
  float: left;
  font-family: "BebasNeueRegular",Helvetica,Arial,sans-serif;
  font-size: 42px;
  letter-spacing: -0.5px;
  position: relative;
}
.frame-step-button-wrapper {
  float: right;
  padding: 6px 0;
  position: relative;
}

.frame-step-continue-shopping-button {
  background-color: #888;
  color: #fff;
  cursor: pointer;
  float: left;
  font-size: 15px;
  font-weight: bold;
  margin-right: 14px;
  min-width: 100px;
  padding: 13px 16px;
  position: relative;
  text-align: center;
}
.frame-step-proceed-to-cart-button {
  background-color: #ed9134;
  color: white;
  cursor: pointer;
  float: right;
  font-size: 15px;
  font-weight: bold;
  min-width: 180px;
  padding: 12px;
  position: relative;
  text-align: center;
}
.container.frame-step-header-wrapper {
  border: medium none;
  margin: 0 auto;
}
</style>

<div class="container">
<div class="row">
<div class="art-style col-md-12">
  <div class="pagination"> <span><a href="<?php print base_url();?>">Home</a> <a href="javascript:history.back();">Search Result</a> Image Detail </span> </span> </div>
  <!-- Decortive art -->
  
	<?php
	//print_r($image_detail);
	?>							
<div class="decorative">
  <!--<div class="decorative-l-c">
                	
                        <img src="<?=base_url()?>assets/img/frameit.jpg" width="298" height="156" border="0">
                    <p class="btn-centre">
                		<a href="javascript:void(0)" onclick="frameit('');" >Frame It</a>
                    </p>
                </div>-->
  <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
  <div class="frameit" id="frameitpop" style="display:none;" >
    <div style="float: right" ><a href="#" onClick="allclose('')" >X</a></div>
    <p style="overflow:hidden;">"This section is under maintenance. Kindly contact us</br>
      at <b style="color:red;">011- 41828972</b> or mail us at <a href="#" style="color:red;">info@wallsnart.com</a> </br>
      to complete the purchase oder."</p>
  </div>
  <div class="make-dt"></div>
  
</div>
<!-- Decortive art -->
<input type="hidden"  value="<?php echo $pricing_range;?>" id="pricing_ran" name="pricing_ran"/>
</div>
    <div class="decorative-l-c col-md-4 col-sm-4">
    <img src="http://static.mahattaart.com/398/<?php print $image_detail[0]['image_filename'];?>" class="img-responsive"  /> 
      <br>
      View: <a href="javascript:" onClick="get_room();">View in room</a> | <a href="#"
								onClick="get_win();">Enlarge image</a> </div>
								
								
    <div class="decorative-r-c col-md-8 col-sm-8">
	
      <h1>Portrait of&nbsp;<?php  echo $image_detail[0]['image_photographer'];?> </h1>
      <p><?php print substr($image_detail->images_caption,0,30); ?></p>
      <p><strong>Item # :<?php print $image_detail[0]['image_filename'];?></strong></p>
      <p><?php print $image_detail[0]['image_description'];?></p>
      KEYWORDS:-
	 
      <p><?php print $image_detail[0]['image_keywords']; ?></p>
      <input type="hidden" name="img_id" id="img_id" value="<?php echo $images_id;?>" />
      <input type="hidden" name="img_id" id="gallery_img_id" value="<?=$image_detail[0]['images_id'];?>" />
      <h2>SELECT SIZE:</h2>
      <form id="form1" name="form1" method="post" action="">
        <input type="hidden" value="<?php echo $image_detail->images_collectionid;?>" name="collection" id="collection" />
        <select name="sizes" id="sizes" class="size-list-input" onChange="calculate_cost(this.value);">
          <?php 
                                 for($i=0;$i<=count($size_array)-1;$i++)
                                 {
                                     if($size_array[$i]['width']<=round($max_width_allowed) && $size_array[$i]['height']<=round($max_height_allowed))
                                     {?>
          <option value="<?php print round(number_format($size_array[$i]['width'],1,'.','')).'X'.round(number_format($size_array[$i]['height'],1,'.',''));?>" ><?php print round(number_format($size_array[$i]['width'],1,'.','')).'" X '. round(number_format($size_array[$i]['height'])).'"';?></option>
          <?php
                                 }}?>
        </select>
      </form>
      <h2> SELECT PRINTING SURFACE </h2>
      <select name="print_sizes" id="print_sizes" class="size-list-input" onChange="return get_quality(this.value);" >
        <?php foreach($papper as $result){?>
        <option value="<?=$result->paper;?>" >
        <?=$result->paper;?>
        </option>
        <?php }?>
        <!--  <option value="2" <?php if($surface==2){?>selected="selected"<?php } ?>>Luster</option>onChange="call_set_sizes(this.value,'<?php echo $cat_id;?>');"
						       <option value="3" <?php if($surface==3){?>selected="selected"<?php } ?>>Photographic print</option>
						       <option value="4" <?php if($surface==4){?>selected="selected"<?php } ?>>Premium photographic print</option>
						         <option value="5" <?php if($surface==5){?>selected="selected"<?php } ?>>Hanehmule Photo Rag</option>
						       <option value="6" <?php if($surface==6){?>selected="selected"<?php } ?>>Daguerre canvas</option>
<!--						       <option value="7" <?php if($surface==7){?>selected="selected"<?php } ?>>Translite</option>
						       <option value="8" <?php if($surface==8){?>selected="selected"<?php } ?>>Poster</option>						       						       						       -->
      </select>
      <div>
        <!--<h2>Select product type</h2>
				
				
                
                
                <div style="margin:10px 0px">
                 
                 <div class="col-md-2"> <p> <a href="#"> BUY PRINT </a> </p>  </div>
                 
                  <div class="col-md-3"> 
                  <p><a href="javascript:" onclick="frame_it_price_send('<?php print $image_detail->
        images_id;?>','<?php print $type;?>','<?php echo $image_detail->images_filename ;?>');"> Frame It </a>
        </p>
      </div>
      <div style="clear:both;"></div>
    </div>
    -->
    <div style="padding-left:60px;"> <img src="<?=base_url()?>assets/images/rupee-img-price.gif"
                  width="8" height="15" alt="rupee" /> <b id="total_cost" style="font-size:20px; color:#F00;">
      <?=  round($actual_price,0);?>
      </b> </span></div>
  </div>
<div style="margin:10px 0px 0px">
    <div  id="image_selected_size" style="float:left">
     
    </div>
    <div id="surface_printer" style="float:left; padding-left:4px; border-left:1px solid">
     
    </div>
    <div style="clear:both;"></div>
  </div>
  <div class="row">
  <p  class="col-md-4 text-center">Ships in 24 Hours</p></div>
  <div class="row" style="margin-bottom:10px">
  <p> <a <?php if(!$this->session->userdata('userid')){?> href="javascript:void(0)" onclick="login('');"
<?php }else{?> href="#!" id="frame_add_to_cart" <?php  } ?> > BUY PRINT </a> &nbsp; <a href="javascript:" onClick="frame_it_price_send(1,'<?php print $type;?>','<?php echo $image_detail[0]['image_filename'] ;?>');"> Add Frame </a> &nbsp; <a <?php   if($this->session->userdata('userid')){?>
href="javascript:;" onclick="addtogallery('<?=$api_image_id?>','<?=$image_id?>');" id="tgl" <?php }
else {?> href="javascript:void(0)" onclick="login('');" <?php }?> >Add to Gallery </a> &nbsp; <!--<a <?php if(!$this->session->userdata('userid')){?>
href="javascript:void(0)" onclick="login('');" <?php }else{?> href="#!" id="frame_add_to_cart"
<?php  } ?> >Add to Cart</a>--> </p>
                                
                                </div>
</div>
</div>
</div>
<div id="new" class="newid">
  <div align="right"> <a href="javascript:void(0)"
									onclick="document.getElementById('new').style.display='none';document.getElementById('fade').style.display='none'">Close</a> </div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> </tr>
    <tr> <img src="http://static.mahattaart.com/1100/<?php print $image_detail[0]['image_filename'];?>" /> </tr>
  </table>
</div>
<div id="new1" class="newid1">
  <div align="right"> <a href="javascript:void(0)"
                               onclick="document.getElementById('new1').style.display='none';document.getElementById('fade').style.display='none'">Close</a> </div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> </tr>
    <tr>
      <div id="w"  style="background:url(<?php echo base_url();?>assets/images/room-view.jpg) no-repeat top center; width:725px;height:500px;border:1px solid black;">
        <div id="icons" style="display: block;padding-top: 30px;text-align: center;">
          <?php  $wid=$size_array[0]['width']/6 * 720/10;
                                                   $hig=$size_array[0]['height']/6*720/10;
                                          ?>
          <img  src="http://static.mahattaart.com/398/<?php print $image_detail[0]['image_filename'];?>"class="drag-image" id="draggable"  height="<?=$hig?>" width="<?=$wid?>" style="
    border-radius: 5px;
    border: solid 2px;
    border-color: #B57424;" /> </div>
      </div>
    </tr>
  </table>
</div>
<input type="hidden" name="image_id" id="image_id" value="<?=$image_id?>">
<input type="hidden" name="image_filename" id="image_filename" value="<?=$image_detail[0]['image_filename']?>">
<input type="hidden" name="user_id" value="<?=$userid?>">
<input type="hidden" name="api_image_id" id="api_image_id" >
<input type="hidden" name="quality_rate" id="quality_rate" value="">
<input type="hidden" name="image_size" id="image_size" value="">
<input type="hidden" name="quality" id="quality" value="<?=$collection_range;?>">
<script>

    function get_quality(value){
	//alert(value);
	 
		var image_size=$("#sizes option:selected").val();
	var quality_rate=$('#quality_rate').val();
        var quality=$('#quality').val();
		var split = image_size.split('X');
    
var width=parseInt(split[0]);
var height=parseInt(split[1]);

	  var orig_image_size=width+'" X '+height+'"';
	  var image_size_final=(width  + parseInt(1))+'" X '+(height + parseInt(1))+'"';
	   var image_size_for_canvas=(width  + parseInt(4))+'" X '+(height + parseInt(4))+'"';
		
		if(value=='Hahnemuhle Photo Matte Fibre' || value=='Hahnemuhle Photo Luster'){
		$('#image_selected_size').html(image_size_final+' Giclee Print  ');
		$('#surface_printer').html(orig_image_size+' Giclee Print without border');
		}
		else{
		$('#image_selected_size').html(image_size_for_canvas+' Canvas Print  ');
		$('#surface_printer').html(orig_image_size+' Canvas Print without border');
		}
		//alert(image_size);
		//alert(quality_rate);
		//calculate_cost();
	//$('#image_selected_size').html(image_size);
	//$('#surface_printer').html('Canvas Print without border');
       
        
        $.ajax({
            type: 'post',
             url: '<?=base_url()?>frontend/get_web_price_detials',
            data:'print_paper='+value+'&quality='+quality,
            success: function(response){
               // alert(response);
                throw_price(response,value);
               $('#quality_rate').val(response);
                
            }
            
        });
		
	
		
		
    }
    
 function throw_price(rate,surface){
 var image_size=$( "#sizes option:selected" ).val();
 var split = image_size.split('X');
    //alert(rate);
         //split[0]=> width
    //split[1]=>Height
var width=parseInt(split[0]);
var height=parseInt(split[1]);
//alert(height);

if(surface=='Photo canvas' || surface=='Hahnemuhle Photo Canvas' || surface=='Hahnemuhle Daguerre canvas'){
//alert(surface);
var c_height=parseInt(height)+parseInt(4);
var c_width=parseInt(width)+parseInt(4);
//alert(c_height);
//alert(c_width);
}
else{
var c_width=width+parseInt(1);
var c_height=height+parseInt(1);
//alert('matt')
} 
//alert(c_height);
   
        if(Number(c_width)<=17 && Number(c_height)<=17)
        {
//alert('jipahla wala')
            var role_size = 17;
			 //alert(role_size);
			
        }
		else if(Number(c_width)<=24 && Number(c_width)>17  && Number(c_height) <=24 && Number(c_height) >17)
        {
		 var role_size = 24;
//alert(role_size )
        }
		else if((Number(c_width)>17 && Number(c_width)<=24) || (Number(c_height)>17 && Number(c_height)<=24)){
		 
			 //alert('orgreaterwala17');
			  var role_size = 17;
			 //alert(role_size);
			
			
		
		}
		
		else if(Number(c_width)<=44 && Number(c_width) >24 && (Number(c_height) >24 && Number(c_height)<=44 ))
        {
            var role_size = 44;
        }
		else if((Number(c_width)>24 && Number(c_width)<=44)|| (Number(c_height)>24 && Number(c_height)<=44)){
		 var role_size = 24;
		}
		//alert('24')
          
        else if((Number(c_width)>44 && Number(c_width)<=64) || (Number(c_height)>44 && Number(c_height)<=64))
        {
           var role_size = 44;
		    //alert(role_size);
        }
        //alert(width+'<'+height);
		//alert(Number(c_width)+'x'+ Number(c_height)+'x'+(role_size)+'x'+rate)
		//alert(ratesof)
		if((Number(c_width) && Number(c_height))<=(role_size)){
		  if(c_width < c_height){
		
		   var cost=Number(c_width)*Number(role_size)*Number(rate);
		  }
		  else if(c_width > c_height){
		  var cost=Number(c_height)*Number(role_size)*Number(rate);
		  
		  }
                 else if(c_width == c_height){
		  var cost=Number(c_height)*Number(role_size)*Number(rate);
		  
		  }
		
		}
		//alert(Number(c_width)+'x'+Number(c_height)+'x'+Number(role_size)+'x'+Number(rate));
	 if(Number(c_width)>Number(role_size)|| Number(c_height)>Number(role_size)){
   if(c_width>role_size){
      var cost=(parseInt(c_width)*parseInt(role_size)*parseInt(rate));
   }else if(c_height>role_size){
  
    var cost=(parseInt(c_height)*parseInt(role_size)*parseInt(rate));
     
   }
   }
  
  $('#total_cost').html(Math.round(parseInt(cost)));
 
 }   

   
    </script>
<span id="try_check"></span>
