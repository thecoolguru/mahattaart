<link rel="stylesheet" href="<?php print base_url();?>assets/css/light-box-model.css" type="text/css"/>
<link href="<?php print base_url();?>assets/css/zoom-image.css" rel="stylesheet" />
<link href="<?php print base_url();?>assets/css/products/product.css" rel="stylesheet" />
<link href="<?php print base_url();?>assets/css/products/frare_it_slider.css" rel="stylesheet" />
<link href="<?php print base_url();?>assets/css/wallcolor.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert.css" type="text/css" />


<script src="<?php echo base_url();?>assets/js/sweetalert.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/sweetalert-dev.js" type="text/javascript" ></script>
<script src="<?php print base_url();?>assets/js/zoom-image.js"></script>
<?php 
 	if($this->session->userdata('userid')){
	 	$Obj = new Search();
	 	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	 	$splitUrl=split('/', $_SERVER['REQUEST_URI']);
	 	$ipaddress = getenv('HTTP_CLIENT_IP');
	 	$Obj->Search_save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 	}
?>
<script>
   
	
   $(document).ready(function(){
   //alert('gg')
		showTable('Basic');
		$('#4,#5,#6,#7,#8,#9,#10,#12,#19,#22,#frame-it,#slider_explore,#myCanvas,#myCanvas2,#myCanvas3,#review_rating,#Recommended_item,#zoom_image,#canvas3D,#large_img5,#large_img6,#large_img7,.close').hide();		
		$('#museum').prop('checked','true');
		//$('#print_type').val('canvas_only');
		//paper_surface('1');
		$('#sizes').click(function(){
		 	var value = $(this).val();
		 	if(value == 'Own Size')
		 		$('#6').show();	
		 	else
		 		$('#6').hide();
		 });
		$('#gallery').click(function(){
			$('#large_img2,#22').hide();
		});
		
		$('.item_click').click(function(){
			var type = $(this).attr('id');
				$('#paper_type').val(type);
			var image_size=$( "#sizes" ).val();
			var print_sizes=$( "#surfaces").val();
			var quality_rate=$('#quality_rate').val();
			var split = image_size.split('X');
		  	var width=parseInt(split[0]);
		  	var height=parseInt(split[1]);
			var orig_image_size = width + '" X '+ height +'"';
			if(type == '1'){
				paper_surface(1);
				$('#22,#frame_show,#zoom_image,#frame-it,#large_img3,#19,#12,#large_img6,#large_img5,#large_img7,#12').hide();
				$('#large_img2,.wrapped,#11,#15,#20,#canvas_show,#canvas3D').show();
				$("#museum").prop('checked', true);
				$('#18').html('Types Of Wrap');
				$('#print_type').val('canvas_only');
      			$('#type').val('1');
      			$('#print_sizes').html(orig_image_size);
      			get_quality('');
				}else if(type == '2'){
				paper_surface(2);	
				$('#frame-it,#19,#12,#frame_show').show();
				$('#22,#12,#15,#large_img2,#zoom_image,.wrapped,#myCanvas,#myCanvas2,#myCanvas3,#large_img3,#20,#large_img5,#large_img6,#large_img7,#canvas_show,#canvas3D').hide();
				$('#18').html('');
				$('#print_type').val('');
    			$('#type').val('2');
    			$('#print_sizes').html(orig_image_size);
    			get_quality('');
			}else if(type == '3'){
				paper_surface(3);	
				$('#22,#12,#large_img2,#frame-it,.wrapped,#myCanvas,#myCanvas2,#myCanvas3,#12,#15,#19,#20,#large_img5,#large_img6,#large_img7,#canvas_show,#frame_show,#canvas3D').hide();
				$('#18').html('');
				$('#large_img3').show();
				$('#print_type').val('only_print');
				$('#17').html(orig_image_size+'Print Only');
				$('#type').val('3');
				$('#print_sizes').html(orig_image_size);
				get_quality('');
			}
		});
		
		get_quality('');
		$('#f_name').html('Absolute Black');
		$('#check0').prop('checked',true);
		$('#glass_type').val('Regular');
		$('#frame_sized').html('26');
		$('#mount_width').val('1');
		$('#mount_state').val(1);
		$('#sizes').click();
		var k = 0;
		$('.remove-mount').click(function(){
			if($('#mount_state').val() == 1){
				k = $('#mount_sized').val();
				$('#mount_sized').val(k);
				$('#mount_style').val($('#abc').attr('style'));
				$('#mount_style2').val($('#abc2').css('padding'));
				$('#abc').attr('style','');
				$('#abc2').css('padding','0px');
				$('#mount_width').val(0);
				$('#mount_state').val(0);
				$('.mount').hide();
				get_quality('');
			}
		});

		$('#11').click(function(){
			$('#22,#large_img6,#large_img5,#frame-it,#large_img2,#large_img3,#myCanvas,#myCanvas2,#myCanvas3,#large_img7,#canvas3D').hide();
				if( $('#type').val() == 1){
					$('#large_img3,#18,#20').show();
				}else if( $('#type').val() == 2){
					$('#20').hide();
					$('#large_img3').show();
				}
				else if( $('#type').val() == 3){
					$('#15,#20,#19,#12').hide();
					$('#large_img3').show();
				}	
		});

		$('#20').click(function(){
			$('#22,#large_img6,#large_img5,#large_img3,#zoom_image,#frame-it,#large_img3,#19,#12,#large_img7,#myCanvas,#myCanvas2,#myCanvas3').hide();
			$('#large_img2,.wrapped,#11,#15,#20,#canvas3D').show();
		});

		$('#15').click(function(){
			$('#22,#large_img6,#large_img5,#large_img3,#zoom_image,#frame-it,#large_img3,#19,#12,#large_img2,#myCanvas,#myCanvas2,#myCanvas3,#canvas3D').hide();
			$('#large_img7').show();
		});

		$('#13').click(function(){
			$('#large_img6,#large_img3,#large_img7,#zoom_image,#frame-it,#large_img2,#myCanvas,#myCanvas2,#myCanvas3,#canvas3D').hide();
			$('#22,#large_img5').show();	
			if($('#type').val() == '1'){
				$('#canvas_show').show();
				$('.sa,#frame_show,#print').hide();
			}else if($('#type').val() == '2'){
				$('#frame_show').show();
				$('.sa,#canvas_show,#print').hide();
			}else if($('#type').val() == '3'){
				$('#print').show();
				$('.sa,#canvas_show,#frame_show').hide();
			}
		});

		$('#14').click(function(){
			$('#large_img5,#large_img7,#zoom_image,#large_img3,#frame-it,#large_img2,#myCanvas,#myCanvas2,#myCanvas3,#canvas3D').hide();
			if($('#type').val() == '1'){
				$('#canvas_show,#22,#large_img6').show();
				$('.sa,#frame_show,#print').hide();
			}else if($('#type').val() == '2'){
				$('#frame_show,#22,#large_img6').show();
				$('.sa,#canvas_show,#print,').hide();
			}else if($('#type').val() == '3'){
				$('#print,#22,#large_img6').show();
				$('.sa,#canvas_show,#frame_show').hide();
			}
		});
		$('#19').click(function(){
			$('#22,#large_img5,#large_img6,#large_img7,#zoom_image,#large_img3,#large_img2,#myCanvas,#myCanvas2,#myCanvas3,#canvas3D').hide();
			$('#frame-it').show();
		});
	});
</script>
<script>
   $(document).ready(function(){
	   $(window).bind('scroll', function(){
			 if(parseInt($(window).scrollTop()) >= 0 && parseInt($(window).scrollTop()) <= 120){
				$('.product-tabs').css({'position':'absolute','top':'20px','bottom':'auto'});
			  }
			 if (parseInt($(window).scrollTop()) >= 120 && parseInt($(window).scrollTop()) <= 340) {
				 	$('.product-tabs').css({'position':'fixed','top':'0','bottom':'auto'})
			 }
			 if(parseInt($(window).scrollTop()) >= 340 ){
				$('.product-tabs').css({'position':'absolute','top':'200px', 'bottom':'auto'})
			 }
		});
	});
	</script>
<style>
.aafixed {
	width: 403px;
	position: fixed;
	top: 0px;
	bottom: auto;
}
</style>
<script>

function paper_surface(type){
		//var print_type= '';
		//alert('should first')
		if(!type){
		type=$('#paper_type').val()
		}
		var print_type_main=$('#print_type_main').val();
		//alert(print_type_main+','+type)
		
			$.ajax({
	            type: "POST",
	            url: "<?=base_url();?>index.php/frontend/get_surface_tbl_web_price",
	            data:'print_type='+type+'&print_type_main='+print_type_main,
				async:false,
				success: function(data)
	            {
				//alert(data)
				//alert('jjjj')
				$('#surfaces').html(data);
				}
			});
	}
</script>
<?php 
$image_data = '';
$image_type=split('_',$image_name);
if($image_type[0]=='BRID'){
  $bridege_image_id=substr($image_detail[0]['image_filename'],8,-4);
	$add_imgid= $bridege_image_id+3179;
	$reverse_val=strrev($add_imgid);
	$append_zero=$reverse_val.'0';
	$bride_id=$append_zero;
  	$image_path = "http://images2.bridgemanart.com/cgi-bin/bridgemanImage.cgi/600.XIR.".$bride_id.".7055475/".$bridege_image_id.".JPG";
	$image_data = getimagesize($image_path);
	}else{
	$image_path="http://static.mahattaart.com/400x400/media/".$image_detail[0]['image_filename'];
	$image_data = getimagesize($image_path);
}

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
$this->load->model('cart_model');
$userid=$this->session->userdata('userid');
$image_id=$image_detail[0]['image_id'];
$lightbox= $this->frontend_model->get_light_boxName($images_id,$userid); 
$max_w=$image_detail[0]['image_original_width'];
$max_h=$image_detail[0]['image_original_height'];
$s_height=$max_h;
$s_width=$s_height*2;
$v_height=2*$max_w;
if($max_w>$max_h){
  if($max_w<$s_width){
     $f_shape="Horizontal";
  }else{
	 $f_shape="Panoramic";
	}
}else if($max_w<$max_h){
  if($max_h>$v_height){
	 $f_shape="Slim";
	}else{
	 $f_shape="Vertical";
	}
}else if($max_h==$max_w){
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
$size_data = getimagesize($image_path);
$image_alignment="";
$image_width=$size_data[0];
$image_height=$size_data[1];

$size_data1 = getimagesize($image_path);
$image_width1=$size_data1[0];
$image_height1=$size_data1[1];

$image_ratio=$image_width/$image_height;
$size_array=array();
$role_size = 64;
$lower_value = 0;
//print_r($size_data);
if($size_data[0]>=$size_data[1])
{ 
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
    }else if($size_data[0]<=$size_data[1]){ 
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
  $size_array[0]['height'].'*'.$rollSize.'*'.$rate;
}
  $actual_price;
  $size_array[0]['height'];
  $size_array[0]['width'];

function choose_role_size($width,$height){
	if($width>$height){
		$fix_val = $height;	
	}else{
		$fix_val = $width;

	}
      if($fix_val<=17){
           return 17;
        }else
        if($fix_val<=24 && $fix_val>17){
           return 24;
        }else if($fix_val<=44 && $fix_val>24){
           return 44;
        }else if($fix_val<=50 && $fix_val>44){
           return  50;
        }else if($fix_val<=64 && $fix_val>50){
           return  64;
        }
}/// end function

function give_licence_price($pricing_range){
    if($pricing_range=='mid'){
      $tolalLic= $image_width*$image_height*2;  
      return $totalPriceLic=$tolalLic*50/100;
    }elseif($pricing_range=='low'){
      $tolalLic=  $image_width*$image_height*2;  
      return $totalPriceLic=$tolalLic*50/100;
    }elseif($pricing_range=='high'){
      $tolalLic=  $image_width*$image_height*2;  
      return $totalPriceLic=$tolalLic*50/100;
    }
}
// wastage calculation
$lower_value = 12;
$size_with_wastage = $role_size*$lower_value;
$licence_base_price=give_licence_price($collection_id);
if( $size_array[0]['width']> $size_array[0]['height'])
{
    $low_val=round($size_array[0]['height']);
    $high_val=round($size_array[0]['width']);
}else{
    $low_val=round($size_array[0]['width']);
    $high_val=round($size_array[0]['height']);
}
$s=round($size_array[0]['height']).'X'.round($size_array[0]['width']);
$price=(round($size_array[0]['width'])*round($size_array[0]['height'])*2)+$wastage_cost+give_licence_price($pricing_range);
$size_array[$i]['width'];
?>

<?php //$continue_shopping_redirect=$this->session->userdata('continue_shopping');?>
		<div class="frame-step-header-container" style="display:none">
			<div class="container frame-step-header-wrapper">
				<div class="frame-step-header-text"></div>
				<div class="frame-step-button-wrapper">
					<div class="frame-step-continue-shopping-button">
						<a style="color:white" href="<?=base_url()?>">CONTINUE SHOPPING</a>
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
  color: #fff;
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

<script type="text/javascript">
	function get_quality(value){
	    var quality=$('#quality').val();
		var paper = $('#surfaces').val();
		//alert(quality+','+paper);
		$.ajax({
      		type: 'post',
      		url: '<?=base_url()?>frontend/get_web_price_detials',
      		data:'print_paper='+paper+'&quality='+quality,
      		success: function(response){
			//alert(response)
			var obj=JSON.parse(response);
			var res=obj.split(',');
        		$('#quality_rate').val(res[0]);
      	   			throw_price(res[0],res[1]);
           	}
    	});
  	}
    
function throw_price(rate,surface_type){
	var image_size=$( "#sizes option:selected" ).val();
	var split = image_size.split('X');
	var width = parseInt(split[0]);
	var height = parseInt(split[1]);
	var surface = $('#surfaces').val();
	var ratesof = rate;
	if(surface_type=='1'){
	//alert('canvas')
	///$('#test').val('canvas');
    var c_height=parseInt(height)+parseInt(4);
    var c_width=parseInt(width)+parseInt(4);
  	}else{
	//alert('paper')
	//$('#test').val('frame');
  	var c_width=width+parseInt(1);
  	var c_height=height+parseInt(1);
  	} 
  	var role_size;
  if(Number(c_width)<=17 && Number(c_height)<=17){
    var role_size = 17;
	}else if(c_width==c_height){
    if(c_width<=17){
      var role_size = 17;
    }else if(c_width<=24 && c_width>17){
      var role_size = 24;
    }else if(c_width<=44 && c_width>24){
      var role_size = 44;
    }else if(c_width<=64 && c_width>44){
      var role_size = 64;
    }
  }else if((Number(c_width)<=24 && Number(c_width)>17 ) && (Number(c_height) <=24 && Number(c_height) >17)){
		var role_size = 24;
	 }else if((Number(c_width)>17 && Number(c_width)<24 && Number(c_height)>24) || (Number(c_height)>17 && Number(c_height)<24 && Number(c_width)>24)){
		var role_size = 24;
	}else if((Number(c_width)>17 && Number(c_width)<24) || (Number(c_height)>17 && Number(c_height)<24)){
	  var role_size = 17;
	}else if(Number(c_width)<=44 && Number(c_width) >24 && (Number(c_height) >24 && Number(c_height)<=44 ))
        {
    var role_size = 44;
  }else if((Number(c_width)>24 && Number(c_width)<44)|| (Number(c_height)>24 && Number(c_height)<44)){
		 var role_size = 24;
	}else if((Number(c_width)>44 && Number(c_width)<64) || (Number(c_height)>44 && Number(c_height)<64))
   {
    var role_size = 44;
  }
  
  if((Number(c_width) && Number(c_height))<=(role_size)){
		  if(c_width < c_height){
		 // alert(c_width+'*'+role_size+'*'+ratesof)
	     var cost=c_width*role_size*ratesof;
		  }else if(c_width > c_height){
		    var cost=c_height*role_size*ratesof;
		  }
	}
	if(Number(c_width)>Number(role_size)|| Number(c_height)>Number(role_size)){
    if(c_width>role_size){
      var cost=(c_width*parseInt(role_size)*ratesof);
    }else if(c_height>role_size){
    var cost=(c_height*parseInt(role_size)*ratesof);
    }
  }
  if(c_height==c_width){
 // alert(c_height+','+role_size+','+ratesof)
    var cost=(c_height*parseInt(role_size)*ratesof);
  }
	$('#print_price').html('Rs.'+ Math.round(parseInt(cost),2));
	calculate_cost($('#type').val());
}

function calculate_cost(value){
		var image_size=$( "#sizes option:selected" ).val();
 		var print_sizes=$('#surfaces').val();
 		var ratesof=$('#quality_rate').val();
	    var split = image_size.split('X');
  		$('#image_size').val(print_sizes);
    	var role_size,cost;
		var width=parseInt(split[0]);
		var height=parseInt(split[1]); 
		var orig_image_size = width +'" X '+ height +'"';
		var c_height=parseInt(height)+parseInt(4);
		var c_width=parseInt(width)+parseInt(4);	
		var image_size_final=c_width+'" X '+c_height+'"';
		$('#print_sizes').html(orig_image_size);
		var price = $('#print_price').html().split('.');
		var type = value; 
 		if( type == 1){
			if( $("input[id='museum']:checked").val()){
	 			$('#17').html(image_size_final+'Canvas Print without border');
	 		}else if( $("input[id='gallery']:checked").val()){
	 			$('#17').html(image_size_final+' Canvas Print');
			}
		$('#print_h_w').val(c_width+'X'+c_height);
		var newwidth1 = parseInt(width)+(1*2);
		var	newlenght1 = parseInt(height)+(1*2);
		var CanvasFrameCost = parseInt( (parseInt((parseInt(newwidth1)+(1*2))*parseInt(2)) + parseInt((parseInt(newlenght1)+(1*2))*parseInt(2)))*75)/12;
		CanvasFrameCost = Math.round(parseInt(CanvasFrameCost),2);
		var total_cost = CanvasFrameCost + parseInt(price[1]); 
		$('.framing,.print').hide();
		$('.canvas').show();
		$('#print_paper').html($('#surfaces').val());
		$('#frame_type').html('Streched Canvas Gallary Wrap');
		$('#CanvasCost').html('Rs.'+ Math.round(CanvasFrameCost,2));
		$('#sub_total_price').html('Rs.' + Math.round(total_cost,2) );
 		apply_promo_code(Math.round(total_cost));
 		}else if(type == 2){
 		var c_height=parseInt(height)+parseInt(1);
 		var c_width=parseInt(width)+parseInt(1);
 		$('#print_h_w').val(c_width+'X'+c_height);
 		var image_size_final=c_width+'" X '+c_height+'"';
 		$('#17').html(image_size_final+' Giclee Print |'+ orig_image_size +' Giclee Print without border');
 		var mount = $('#mount_width').val();
 		var newmountheight = parseInt(split[0])+ mount * parseInt(2);
    	var newmountwidth = parseInt(split[1])+ mount * parseInt(2);
		var mount_rate = $('#mount_rate').val();
		var m_cost=parseFloat(newmountheight)*parseFloat(newmountwidth)*parseFloat(mount_rate);
		var MountCost=m_cost.toFixed(2);
		var size = $('#frame_size').val();
 		var frame_rate = $('#frame_rate').val();
 		var OrgFrametRuningArea = ((parseFloat(newmountheight)+parseFloat(size)*2)*2) + ((parseFloat(newmountwidth)+ parseFloat(size*2))*2);
 		var OrgFramCost=((OrgFrametRuningArea)/(12)*frame_rate);
 		OrgFramCost = Math.round(OrgFramCost,2);
 		$('#FrameCost').html('Rs.'+OrgFramCost);
 		$('#mount_size').html($('#mount_width').val()+'"');
 		$('#MountCost').html('Rs.'+MountCost);
 		var glass_type = $('#glass_type').val();
	 		$.ajax({
				type:'post',
	            url:'<?=base_url()?>index.php/frontend/get_web_price_detail',
				data: {type: glass_type},
				success:function(data){
				glass_rate = data;
				var glass_cost = newmountheight * newmountwidth * glass_rate;	
					glass_cost = Math.round(glass_cost,2); 
				$('#glass_cost').val(glass_cost);			
				if($('#mount_state').val() == 0){
					MountCost = 0;		
				}
				var total_cost = parseFloat(MountCost) + parseFloat(OrgFramCost) + glass_cost + parseInt(price[1]);
				$('#sub_total_price').html('Rs.' + Math.round(total_cost,2) );
				$('#glass_price').html('Rs.'+ glass_cost);
				apply_promo_code(total_cost);				
				}
			})
		$('.canvas,.print').hide();
		$('.framing').show();
		$('#print_paper').html($('#surfaces').val());
		}else{
 			$('#17').html(orig_image_size+' Print Only');
 			$('.canvas,.framing').hide();
			$('.print').show();
 			$('#print_h_w').val(width+'X'+height);
 			$('#print_paper').html($('#surfaces').val());
 			$('#sub_total_price').html('Rs.' + Math.round(price[1],2) );
 			apply_promo_code(Math.round(price[1],2));
 		}
	}

	function apply_promo_code(total_amount){
		$('#sub_total_price,.old_price').html('Rs.' + total_amount);
		var promo_precentage=$('#promo_precentage').html();
		promo_precentage = promo_precentage.split('%');
		var promo_amount_final=parseFloat(Math.round((total_amount*parseFloat(promo_precentage))/100).toFixed(2));
		$('#promo_amount').html('Rs.' + Math.round(promo_amount_final,2));
		var total_amount_after_gst = parseFloat(total_amount)-parseFloat(promo_amount_final);
		$('.total_cost,.actual_price').html('Rs.'+ Math.round(total_amount_after_gst,2));
	}
	// end function
</script>
<script>
    function price_details(){
	$('#price_detail').show();	
	}
	
	function remove_pricing(){
	$('#price_detail').hide();	
	}
</script>
<!-- pricing Details -->
<div class="lightbox-target" id="price_detail">
    <div id="uploader_popup_goofy_a" style="width:500px;height:480px;margin-left:-250px;margin-top:-240px;left:50%;top:50%"  >
        <div class="uploader_popup_header">
            <h2 class="text-center">Pricing Details</h2>
            <a class="lightbox-close"  href="" onclick="remove_pricing(); return false;"></a>
        </div>
		<div class="frame-it-pricing">
        	<div class="row canvas framing print">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Print Price</strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="print_price" class='canvas framing print'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row canvas framing print">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Print Size: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="print_sizes" class='canvas framing print'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row canvas framing print">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Paper Print: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="print_paper" class='canvas framing print'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Size(mm): </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="frame_sized" class='framing'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row canvas">
            	<div class="frame-it-content ">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Type: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong><span class='canvas' id="frame_type"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Name: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong><span class='framing' id="f_name"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row canvas ">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Cost: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right canvas ">
                    	<strong><img src="" align="absmiddle" /><span id="CanvasCost"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Cost: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right framing">
                    	<strong><img src="" align="absmiddle" /><span id="FrameCost"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing mount">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left mount">
                    	<strong> Mount Size: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right mount">
                    	<strong> <span class='framing' id="mount_size"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="frame-it-content framing mount">
                	<div class="col-md-6 col-sm-6 text-left mount">
                    	<strong> Mount Color: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right mount">
                    	<strong><span class='framing' id="mount_color">Ice White</span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content mount">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Mount Cost: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong><img src="" align="absmiddle"/><span id="MountCost" class='framing mount'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Glass Type: </strong>
                    </div>
                </div>
            </div>  
            <div class="row framing" >
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong id="glass_type"> Regular </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right framing">
                    	<strong> <span id="glass_price"> </span></strong>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong style="color:#d3131b">Discount:</strong>
                    </div>
                </div>
            </div>  
            <div class="row" >
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong style="color:#d3131b">FLAT<span id="promo_precentage" style="color:#d3131b">20%</strong>
                    	<span style="color:#d3131b">Promo Code Applied</span> 	
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="promo_amount" style="color:#d3131b"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row" >
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Sub-Total  </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="sub_total_price"> </span></strong>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="frame-it-content col-md-12">
                <hr/>
                	<div class="row">
                        <div class="col-md-6 col-sm-6 text-left">
                            <strong style="color:#d3131b"> Total Price </strong>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <strong> <span class='actual_price' style="color:#d3131b"></span></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="frame-it-button">
                	<button <?php if(!$this->session->userdata('userid')){?> onclick="remove_pricing(); login('');return false;"<?php }else{?> onclick="remove_pricing();addToCart();return false;"<?php }?> type="button" class="btn social_icon" style="background-color:#d3131b; color:#fff;"> Add to cart </button>
                	<button onclick="remove_pricing(); return false;" type="button" class="btn social_icon" style="background-color:#555; color:#fff; margin-right:10px"> Cancel </button>
                </div>
            </div>            
        </div>
	</div>
</div>	
<!-- end -->


<div class="container">
   <div class="row">
      <div class="col-md-7 col-sm-6">
         <div class="single-product-image">
         	<div class="single-product-image-inner" style="margin-top: 20px">
  <ul class="product-tabs" role="tablist">
               <li role="presentation" id="11"><img src="<?php echo $image_path;?>" class="img-responsive"></li>
               <li role="presentation" id="15">
                   <img src="<?php echo $image_path;?>" style="transform: perspective( 900px ) rotateY( 15deg );  /*!width: 50px;*/padding-left: 5px;padding-right: 5px;" class="img-responsive">
                    <figure style="background: linear-gradient(to right, rgba(227,227,227,0.4) 0%, rgba(255,255,255,1) 100%);position: absolute;height: 10px;width: 40px;transform: skewX(20deg) skewY(-3deg) translate(3px,-1px);bottom: 0;z-index: -1;">
                    </figure>
               </li>
               <li role="presentation" id="19">
               	<style>
					.mainhor {
						-moz-border-bottom-colors: none;
						-moz-border-left-colors: none;
						-moz-border-right-colors: none;
						-moz-border-top-colors: none;
						border-color: transparent;
						border-style: solid;
						border-width: 8px;
						padding: 5px;
					}
					.close {
						position: absolute;
						right: 5px;
						top: 4px;
						width: 32px;
						height: 32px;
						opacity: 1;
					}
										.close::before {
						transform: rotate(45deg);
					}
					.close::before, .close::after {
						position: absolute;
						left: 15px;
						content: ' ';
						height: 33px;
						width: 2px;
						background-color: #333;
					}
					.close::after {
						transform: rotate(-45deg);
					}
					.edit_btn.active, .edit_btn:active {
						-webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,0);
						box-shadow: inset 0 3px 5px rgba(0,0,0,0);
					}
				</style>
                <img src="<?php echo $image_path;?>" class="img-responsive mainhor" style="border-image: url('http://mahattaart.com/images/uploaded_pdf/frames/horizontal/Absolute Black.jpg') 30 30 30 30 round round;background:url('http://mahattaart.com/images/uploaded_pdf/mount/DR 2091.jpg') no-repeat scroll 0 0 / contain;">
               </li>
               <li role="presentation" id="12"><img src="<?= base_url() ?>assets/img/product/frame_left.jpg" class="img-responsive" ></li>
                <li role="presentation" id="20" style="border:0px;">
        			<section class="container3D">
        				<div id="cube" style="<?php if($image_data[0] >= $image_data[1]){?> height:40px;    <?php }else{ ?>height:90px;"<?php } ?> >
	            			<figure class="front">
	  					<img id="large_img4" src="<?php echo $image_path;?>" class="img-responsive">	
							<figure class="right" style="transform: skewY(45deg) translate(7px,-3px);
    					width: 7px;height: 100%;right: 0px;top: 0; position: absolute;"></figure>
	    					<figure class="bottom" style="transform: skewX(45deg) translate(-5px,8px);
    					height: 7px;width: 100%;bottom: 1px; position: absolute;"></figure>
	    					</figure>
						</div>
					</section>
   				 </li>
    		<li role="presentation" id="13"><img src="<?= base_url() ?>assets/img/product/stock1.png" class="img-responsive" style="background-color: rgb(136, 136, 136);"></li>
            <li role="presentation" id="14"><img src="<?= base_url() ?>assets/img/product/stock2.png" class="img-responsive" style="background-color: rgb(136, 136, 136);"></li>
</ul>  
<!-- Tab panes -->
<div  style="padding-left: 10px; margin-left: 90px;">
	<div class="divimg mainhor room_frame" id="frame-it" style="border-image-source: url('http://mahattaart.com/images/uploaded_pdf/frames/horizontal/Absolute Black.jpg'); border-image-slice: 58; border-image-width: initial; border-image-outset: initial; border-image-repeat: round; border-style: solid; border-width: 20px; margin-top: 20px; padding: 0px; width: auto; display:inline-block; position: relative;">

	    <div id="abc" class="room_mount" style="background:url('<?=base_url()?>images/uploaded_pdf/mount/DR 2091.jpg')  0% 0% / cover no-repeat;width:auto;padding:10px; background-attachment:scroll; position: relative; z-index: 1;">
            	<a href="javascript:" id="demo2" class="imglink img_shadow " target="_self" >
               		<img id="large_img"  style="max-height: 400px" src="<?php echo $image_path;?>" style=""/>
				  	<input type="hidden" id="frame_shape" value="<?=$f_shape?>"/>
	        	</a>
		</div>
    </div>
    	<figure class="zoom-image" id="zoom_image">
            <figure style="background-position: -177.954px -226.251px;"></figure>        	    
                </figure>
                <script>
					$( '.zoom-image' ).zoomImage({
					  touch: true
					});
				</script>
	<img id="large_img3"  style="max-height:400px" src="<?php echo $image_path;?>" class="img-responsive">			
	<div id="22" style="position: relative;height: 560px;width: 560px;background-color: #888;">
		<div id="frame_show" style="margin: 0 auto;text-align: center;padding-top: 58px;">
		     <div  class="divimg mainhor2" style="border-image-source: url(&quot;http://mahattaart.com/images/uploaded_pdf/frames/horizontal/Absolute Black.jpg &quot;); border-image-slice: 58; border-image-width: initial; border-image-outset: initial; border-image-repeat: round; border-style: solid; border-width:10px; margin-top:-55px; padding:0px; width:auto; display:inline-block; position:relative;">

		    <div id="abc2" style="background:url('<?= base_url()?>images/uploaded_pdf/mount_new/DR 2091.jpg')  0% 0% / cover no-repeat;width:auto;padding:3px; background-attachment:scroll;position: relative;z-index: 1;">
	            	<a href="javascript:" id="demo2" class="imglink img_shadow" target="_self">
	               		<img id="frame_img" src="<?php echo $image_path;?>" style="">
					</a>
			</div> 
    	</div>
	</div>

		<div id="canvas_show" style=" margin: 0 auto;text-align:center;padding-top:78px; width:120px">
		    <img style="box-shadow: -11px 4px 25px #555;" src="<?php echo $image_path; ?>" class="img-responsive">
		</div>
		<div id="printed" style=" margin:0 auto;text-align:center;padding-top: 78px; width: 120px">
			<img id="print" src="<?php echo $image_path; ?>" class="img-responsive">
		</div>	
		<div id="sa" class="showhidenew" style="display: flex; position: absolute; background-position: 69.87px 168.871px; width: 100%; bottom: 0px; flex-direction: column; z-index: 1">
                <div class="btn btn-default edit_btn color_btn" href="javascript:void(0)" style=" position: absolute; text-align: center; margin: 0px auto;  background-color: rgba(255, 255, 255, 0.65); width: 220px; text-transform: capitalize; color: rgb(68, 68, 68); border: medium none;bottom: 0px; margin-left: -110px; left:50%;" >
                        	Change Wall color
                        	<a href="" onclick="return false;" id="closed" class="close"></a>                        
                </div>
                <div class="color_panel" style="background: rgb(255, 255, 255) none repeat scroll -176.358px -276.909px;  width:100%; overflow-x: auto;opacity:0;white-space: nowrap; padding-top:10px;display:none;" id="light">
                    <table class="bor">
                        <tbody>
                            <tr>
                              <td><a href="javascript:;" Class="color1" id="sas" onclick="javascript:change_wallcolor(this);"></a></td>
                              <td><a href="javascript:;" class="color2" onclick="javascript:change_wallcolor(this);"></a></td>
            	              <td><a href="javascript:;" class="color3" onclick="javascript:change_wallcolor(this);"></a></td>
                              <td><a href="javascript:;" class="color4" onclick="javascript:change_wallcolor(this);"></a></td>
                           </tr>
                        <tr>
	                          <td><a href="javascript:;" class="color5" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color6" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color7" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color8" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color9" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color10" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color11" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color12" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color13" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color14" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color15" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color16" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color17" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color18" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color19" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color20" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color21" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color22" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color23" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color24" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color24" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color26" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color27" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color28" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color29" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color30" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color31" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color32" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color33" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color34" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color35" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color36" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
        		           <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color37" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color38" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color39" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color40" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color41" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color42" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color43" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color44" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color45" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color46" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color47" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color48" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color49" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color50" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color51" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color52" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color53" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color54" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color55" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color56" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color57" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color58" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color59" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color60" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color61" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color62" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color63" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color64" onclick="javascript:change_wallcolor(this);"></a></td>                          
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color65" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color66" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color67" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color68" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color69" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color70" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color71" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color72" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color73" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color74" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color75" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color76" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color77" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color78" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color79" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color80" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color81" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color82" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color83" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color84" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color85" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color86" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color87" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color88" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color89" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color90" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color91" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color92" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color93" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color94" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color95" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color96" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color97" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color98" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color99" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color100" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color101" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color102" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color103" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color104" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color105" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color106" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color107" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color108" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color109" onclick="javascript:change_wallcolor(this);"></a></td>                                 <td><a href="javascript:;" class="color110" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color111" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color112" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color113" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color114" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color115" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color116" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color117" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color118" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color119" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color120" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color121" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color122" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color123" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color124" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color125" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color126" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color127" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color128" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color129" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color130" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color131" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color132" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color133" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color134" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color135" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color136" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color137" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color138" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color139" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color140" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color141" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color142" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color143" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color144" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <table class="bor">
                            <tbody>
                                <tr>
                                  <td><a href="javascript:;" class="color145" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color146" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color147" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color148" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                </tr>
                                <tr>
                                  <td><a href="javascript:;" class="color149" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color150" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color151" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color152" onclick="javascript:change_wallcolor(this);"></a></td>
                                  
                                
                                </tr>
                              <tr>
                                  <td><a href="javascript:;" class="color153" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color154" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color155" onclick="javascript:change_wallcolor(this);"></a></td>
                                  <td><a href="javascript:;" class="color156" onclick="javascript:change_wallcolor(this);"></a></td>
                            </tr>
                          </tbody>
                        </table>
                        
                    </div>
                      </div>
                	<div style="position:absolute;height: 100%;width: 100%;top: 0;">
                		
                    	<img id="large_img6" src="<?= base_url()?>assets/img/product/stock2.png?>">
                    	<img id="large_img5" src="<?= base_url()?>assets/img/product/stock1.png?>">
                    </div>
                </div>
	<div id="large_img7"  class="3dwrap" style="transform: perspective(1001px) rotateY(22deg) translate(65px, 10px); width: 300px; position: relative; display: block;">
		<div class="3dwrap_front" >
			<img src="<?php echo $image_path; ?>" style=" max-height: 400px;" class="img-responsive">
			<div class="3dwrap_left" style="transform: perspective(1001px) rotateY(-40deg) translate(-20px, 0px);width: 40px;left: -20px;position: absolute;height: 100%;top: 0; background-color: #000"></div>
			<div class="3dwrap_shadow" style="transform: perspective(1001px) rotateX(-65deg) translate(-55px, 85px);width: 100%;position: absolute;height: 120px;bottom: 0;z-index: -1; background-color: #ddd; box-shadow: 0 15px 20px rgba(0,0,0,0.3)"></div>
		</div>
	</div>

	<section  id="canvas3D" class="container3D"  style="height: 420px;width:520px; ">
        <div id="cube">
            <figure class="front">
  		<img id="large_img2"  style="max-height: 400px" src="<?php echo $image_path; ?>" class="img-responsive">	
  <canvas id="myCanvas2" height="251px" width="330px" style="width:100%;height:100%;max-height:500px;"></canvas> 
  <script>
      function front(source_width,source_height){ 
	  var canvas2 = document.getElementById('myCanvas2');
      var context2 = canvas2.getContext('2d');
      $('#myCanvas2').attr('width',source_width+'px');
	  $('#myCanvas2').attr('height',source_height+'px');
	  var req_width = source_width;
	  var req_height = source_height; 
	  var imageObj2 = new Image();
      imageObj2.onload = function() {
        var sourceX = 0;
        var sourceY = 0;
        var sourceWidth = req_width;
        var sourceHeight = req_height;
        var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas2.width / 2 - destWidth / 2;
        var destY = canvas2.height / 2 - destHeight / 2;
        context2.drawImage(imageObj2, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
    };
      imageObj2.src = $('#large_img2').attr('src');
    }
    </script>

<figure class="right">
<canvas id="myCanvas" height="251px" width="400px" style="width:111px;height:100%;"></canvas> 
<script>
function right(width,height,x){
	  var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      var imageObj = new Image();
      imageObj.onload = function() {
       var sourceX = x;
        var sourceY = 0;
        var sourceWidth = width;
        var sourceHeight = height;
		var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas.width / 2 - destWidth / 2;
        var destY = canvas.height / 2 - destHeight / 2;

        context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
      };
      imageObj.src = $('#large_img2').attr('src');
    }
</script>
	
</figure>
    <figure class="bottom">
		<canvas id="myCanvas3" height="301px" width="330px" style="width:100%;height:111px;"></canvas> 
	 <script>
     function bottom(width,height,y){ 
	  var canvas1 = document.getElementById('myCanvas3');
      var context1 = canvas1.getContext('2d');
      var imageObj1 = new Image();
		console.log(width,height,y);
      imageObj1.onload = function() {
        var sourceX = 0;
        var sourceY = y;
        var sourceWidth = width;
        var sourceHeight = height;
        var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas1.width / 2 - destWidth / 2;
        var destY = canvas1.height / 2 - destHeight / 2;
        context1.drawImage(imageObj1, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
      };
      imageObj1.src = $('#large_img2').attr('src');
     }
    </script>
		</figure>
            </figure>
				</div>
</section>			
                <style>
   
    .imglink {
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.8) inset;
    display: inline-block;
    position: relative;
	}
	.img_shadow > img {
    position: relative;
    z-index: -1;
	}
    </style>
        </div>
         </div>
         </div>
      </div>
     
      <div class="clearfix visible-xs"></div>
      <div class="col-md-5 col-sm-6">
         <div class="single-product-details">
         	<div class="row">
                <ul class="media-list main-list col-md-9">
                  <li class="media item_click" id="1" onclick="return false;">
                    <span> Canvas</span>
                      <img class="media-object pull-left" src="<?php print base_url();?>images/uploaded_pdf/canvas_img2.jpg" >
                  </li>
                  <li class="media item_click" id="2" onclick="return false;">
                    <span> Framing</span>
                       <img class="media-object pull-left" src="<?php print base_url();?>images/uploaded_pdf/frame_img2.jpg">
                  </li>
                  <li class="media item_click" id="3" onclick="return false;">
                    <span> Art Print</span>
                      <img class="media-object pull-left" src="<?php print base_url();?>images/uploaded_pdf/print_img2.jpg">
                  </li>
                  <li class="media" id="4">
                    <span> Recommended Frames</span>
                    <a class="pull-left" href="" onclick="return false;">
                      <img class="media-object" src="<?php print base_url();?>images/uploaded_pdf/recommendedframes.jpg">
                    </a>
                  </li>
                </ul>
            </div>
            <div class="row" id="accordion2">
			<div class="panel single-accordion col-md-9">
	                <h5><a role="button" class="collapsed collapsed-menu-step" aria-expanded="false" aria-controls="three" data-toggle="collapse" data-parent="#accordion2" href="#three">Select Print Type<span class="fa fa-plus pull-right"></span><span class="accor-close"><i class="icofont icofont-rounded-up"></i></span></a></h5>
	                <div id="three" class="accordion-content collapse" aria-expanded="false">
	                    <select class="form-control input_control" id='print_type_main' onchange="paper_surface();" onclick="get_functions();return false;">
						<?php 
						foreach($papper_type as $results){?>
						<option value="<?=$results->paper_type_name?>"><?=$results->paper_type_name?></option>
						
						<?php
						}
						?>
	                    </select>
	                </div>
                </div>
				
                <div class="panel single-accordion col-md-9">
	                <h5><a role="button" class="collapsed collapsed-menu-step" aria-expanded="false" aria-controls="two" data-toggle="collapse" data-parent="#accordion2" href="#two">Print type<span class="fa fa-plus pull-right"></span><span class="accor-close"><i class="icofont icofont-rounded-up"></i></span></a></h5>
	                <div id="two" class="accordion-content collapse" aria-expanded="false">
	                    <select class="form-control input_control" id='surfaces' onclick="   get_functions();return false;">
						<?php
						foreach($display_p_name as $d_p_name){
	echo "<option value='".$d_p_name->paper."'>".$d_p_name->display_p_name."</option>";
	//print_r($res->paper);
	}
						
						?>
	                    </select>
	                </div>
                </div>
    
                <div class="panel single-accordion col-md-9">
                  <h5><a role="button" class="collapsed collapsed-menu-step" aria-expanded="false" aria-controls="one" data-toggle="collapse" data-parent="#accordion2" href="#one">Size<span class="menu-selection-text">(In Inches)</span><span class="fa fa-plus pull-right"></span><span class="accor-close"><i class="icofont icofont-rounded-up"></i></span></a></h5>
                  <div id="one" class="accordion-content collapse" aria-expanded="false" style="">
                   <select name="print_sizes" id="sizes" class="form-control input_control" onclick=" get_quality('');return false;">
                    <?php for($i=0;$i<=count($size_array)-1;$i++){
              			if($size_array[$i]['width']<=round($max_width_allowed) && $size_array[$i]['height']<= round($max_height_allowed)){ ?>
          			<option value="<?php print round(number_format($size_array[$i]['width'],1,'.','')).'X'.round(number_format($size_array[$i]['height'],1,'.',''));?>" ><?php print round(number_format($size_array[$i]['width'],1,'.','')).'" X '. round(number_format($size_array[$i]['height'])).'"';?></option>
          			<?php }} ?>
                    <!-- <option value="Own Size">Choose Your Own Size</option> -->
          			</select>
                   <style>
				   	.input_control {
						height: 35px;
						padding: 4px 2px;
						border-radius: 0;
					}
					.media-list_accordion2 .media {
						border: 1px solid #cbcccd;
						cursor: pointer;
						display: inline-block;
						margin-bottom: 10px;
						position: relative;
						text-align: center;
						min-width: 90px;
						margin-top: 5px;
						line-height: 2;
					}
					.carousel-control.left {
						background-image: linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,.0001) 100%);
						left: 20px;
						width:32px
					}
					.carousel-control.right {
						background-image: linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,.0001) 100%);
						right: 20px;
						width:32px
					}
					.old_price {text-decoration:line-through}
				    .new_price{color:#d31d25}
					.old_price,.new_price{
						margin-top: 10px;
						display: inline-block;
					}
					.itemslider-p2 {
						margin-top: 10px;
						display: block;
						text-align:center
					}
					.left.carousel-control img, .right.carousel-control img {
						position: absolute;
						top: 50%;
						margin-top: -32px;
					}
				   </style>
                   <div style="margin:10px auto">
                   	<form class="form-inline" id="6">
                        <div class="form-group">
                          <label for="email">Width</label>
                          <input type="text" class="form-control input_control" id="width" style="width:110px">
                        </div>
                        <div class="form-group" style="float:right">
                          <label for="pwd">Height</label>
                          <input type="text" class="form-control input_control" id="height" style="width:110px">
                        </div>
  					</form>
                   </div>
                  </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-9">
                	<div class="row" id="5">
                        <div class="col-md-6">No. of edition <strong>10 </strong></div>
                        <div class="col-md-6 text-right">Left <strong>10 </strong></div>
                    </div>
                </div>
            </div>
            <div class="row">
            <h4 class="col-md-9" id="18" style="margin-bottom: 0;">Types of Wrap</h4>
            <div class="col-md-9">
            	<form class="form-horizontal">
                    	<div class="row">
                        	<div class="col-md-4 wrapped">
                                <label class="checkbox-inline whiteTxt" onclick="get_quality('');"style="font-size: 14px;padding-left: 0;display: block;">
                                    <input name="canvas_type" type="radio" id="museum"> Museum
                                </label>
                                <img src="<?php print base_url();?>images/uploaded_pdf/canvas_img3.jpg" class="img-responsive" style="margin-top: 5px;">
                            </div>
                        <div class="col-md-4 wrapped">
                        	<label class="checkbox-inline whiteTxt" onclick="get_quality('');"style="font-size: 14px;padding-left: 0;display: block;">
                                <input name="canvas_type" type="radio" id="gallery"> Gallery
                                	<img id="img_hover" class="img-responsive" style="margin-top: 5px;float: right;" src="http://cache1.artprintimages.com/images/photostoart/ART/info_off_v1.png">
                            </label>
	                            <img src="<?php print base_url();?>images/uploaded_pdf/canvas_img2.jpg" class="img-responsive" style="margin-top: 5px;">
                        </div>
                    </div>
				</form>
<style>
a.lightbox-close {
	background: transparent;
	box-sizing: border-box;
	color: black;
	display: block;
	height: 100%;
	position: absolute;
	right: 0;
	text-decoration: none;
	top: 2px;
	width: 30px;
}
a.lightbox-close::before {
	background: black none repeat scroll 0 0;
	content: "";
	display: block;
	height: 25px;
	left: 15px;
	position: absolute;
	top: 0;
	transform: rotate(45deg);
	width: 1px;
}
a.lightbox-close::after {

	background: black none repeat scroll 0 0;
	content: "";
	display: block;
	height: 25px;
	left: 15px;
	position: absolute;
	top: 0;
	transform: rotate(-45deg);
	width: 1px;
}
.frame-it-pricing {
	padding: 10px;
}
.frame-it-content strong {
	margin: 5px 0;
	display: block;
	font-family: inherit;
}
.frame-it-button {
	position: absolute;
	bottom: 0;
	height: 40px;
	right: 5px;
}
.btn.social_icon {
	border-radius: 0;
	box-shadow: none;
	padding: 2px 0;
	position: relative;
	min-width: 110px;
}
.uploader_popup_header{
	background-color: #f1f1f1;
	height: 30px;
	position: relative;
	padding: 0 10px;
}

#uploader_popup_goofy_a {
	background: white none repeat scroll 0 0;
	display: block;
	font-family: Arial;
	left: 314.5px;
	position: absolute;
	top: 134px;
	width: 720px;
	z-index: 10000012;
}
#uploader_popup_goofy_b{
	font-family: Arial;
	position: absolute;
	width: 210px;
	z-index: 10000012;
	background: #fff;
	box-shadow: 3px 1px 5px #888;
	right: -78px;
	top: 10px;
	display: none;
}
.uploader_popup_header > h2 {
	font-size: 22px;
	font-weight: bold;
	text-transform: uppercase;
	margin: 0;
	font-family: 'BebasNeueRegular' !important;
	padding-top: 2px;
}

.uploader_popup_upload-icon > img {
border: medium none;
bottom: 0;
box-shadow: none;
box-sizing: border-box;
left: 0;
margin: 40px 0 10px;
position: relative;
right: 0;
top: 0;
}
.popup-default-message > h2 {
color: #ef9223;
font-size: 20px;
line-height: 18px;
cursor:pointer;
padding-bottom:10px
}
.popup-default-message > p, .popup-default-footer > p {
color: #888;
font-size: 12px;
}
.popup-default-message > p {
cursor:pointer
}

#goofy_a > div {
padding: 10px;
}
.uploader_popup_upload-icon {
	height: 260px;
	margin-top: 10px;
	overflow: auto;
	position: relative;
	margin-bottom: 10px;
}
#imgInp {
background: white none repeat scroll 0 0;
cursor: inherit;
display: block;
font-size: 100px;
height: 100px;
left: 50%;
margin-left: -50px;
margin-top: -50px;
opacity: 0;
position: absolute;
top: 50%;
width: 100px;
}
.dz-upload-image {
display: none;
}
.popup-default-footer {
	display: block;
	height: 40px;
	clear: both;
	margin: 10px;
}
</style>
<script>
$(document).ready(function(){
    $("#img_hover").hover(function(){
        $("#uploader_popup_goofy_b").css("display", "block");
        }, function(){
        $("#uploader_popup_goofy_b").css("display", "none");
    });
});
</script>
                <div id="uploader_popup_goofy_b">
                    <div class="uploader_popup_header">
                    <h2 class="text-center">Types of Wrap</h2>
                    <a class="lightbox-close" href=""></a>
                    </div>
                    <div class="frame-it-pricing" style="padding: 10px;">
                        <div class="row">
                            <div class="frame-it-content col-md-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12" style="color:#888">
                                    	<p>We offer two style of canvas wrap. Museum wrap stops the imahe at the front edge, has hand painted
black sides and is ideal for portraits or when you want to emphasize the photo. Gallery wrap
extends the image around the sides and is more informal Choose the style that suits your decor</p>
										<h4 style="font-size: 11px;font-weight: bold;">Museum Wrap</h4>
										<img src="<?php print base_url();?>images/uploaded_pdf/canvas_img3.jpg" class="img-responsive" style="margin-top: 5px;width: 170px;">
                                        <h4 style="font-size: 11px;font-weight: bold;">Gallery Wrap</h4>
                                        <img src="<?php print base_url();?>images/uploaded_pdf/canvas_img2.jpg" class="img-responsive" style="margin-top: 5px;width: 170px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            	<div class="col-md-9" id="selector-step">
                    <p class="price" style="display: block;"><span class="old_price" style="font-size: 15px;color:Tomato;"></span><span class="total_cost"></span> </p>
                    <p class="bottom-bar-crop" style="display: block;" id="17"></p>
                    <p class="shipping-note">Ships in 1-2 days</p>
                   	<h5><a href='' onclick=" get_functions(''); price_details();return false;">Price Details</a> </h5>
                    <p><input type="button" class="call-to-action-1-button btn btn-default" <?php if(!$this->session->userdata('userid')){?> onclick="remove_pricing(); login('');return false;"<?php }else{?> onclick="remove_pricing();addToCart();return false;"<?php }?> value="ADD TO CART" ></p>
                </div>
                <div id="save-to-gallery-text" class="col-md-9">
                	<span> <i class="fa fa-heart-o" aria-hidden="true"></i>
                		<a <?php   if($this->session->userdata('userid')){?>
href="" onclick="addtogallery('<?=$api_image_id?>','<?=$image_id?>');return false;" id="tgl" style="color:#ef9223;" <?php }
else {?> href="" onclick="login('');return false;" style="color:#ef9223;"<?php }?> >Add to Gallery </a>
                	</span>
                </div>
                
                <div class="col-md-9" id="9">
                  <div class="col-md-6"><a target="_self" class="btn btn-default edit_btn" href="">Edit This Frame</a></div>
                <div class="col-md-6"><a target="_self" class="btn btn-default remove_btn" href="">REMOVE FRAME</a></div>
                </div>
            </div>
         </div>
      </div>
   </div>
   
</div>

<section id="slider_explore" style="background: #f3f3f3;padding-bottom: 20px;">
<!-- Item slider-->
<div class="container">
  <p class="text-center explore-heading">Explore Recommended Frames</p>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="itemslider9">
                        <div class="carousel-inner">
                          <div class="item active">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> <span class="old_price">$10</span> <span class="new_price">$120</span> </p>
                            </div>
                          <div class="col-xs-12 col-sm-6 col-md-3 cloneditem-1">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> <span class="old_price">$10</span> <span class="new_price">$120</span> </p>
                            </div><div class="col-xs-12 col-sm-6 col-md-3 cloneditem-2">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> <span class="old_price">$10</span> <span class="new_price">$120</span> </p>
                            </div><div class="col-xs-12 col-sm-6 col-md-3 cloneditem-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> <span class="old_price">$10</span> <span class="new_price">$120</span> </p>
                            </div></div>
                          <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> <span class="old_price">$10</span> <span class="new_price">$120</span> </p>
                            </div>
                          <div class="col-xs-12 col-sm-6 col-md-3 cloneditem-1">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> <span class="old_price">$10</span> <span class="new_price">$120</span> </p>
                            </div><div class="col-xs-12 col-sm-6 col-md-3 cloneditem-2">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> <span class="old_price">$10</span> <span class="new_price">$120</span> </p>
                            </div><div class="col-xs-12 col-sm-6 col-md-3 cloneditem-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> <span class="old_price">$10</span> <span class="new_price">$120</span> </p>
                            </div></div>
                        </div>
                        <div id="slider-control">
                        <a class="left carousel-control" href="#itemslider9" data-slide="prev" style="width: 32px;"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left"></a>
                        <a class="right carousel-control" href="#itemslider9" data-slide="next" style="width: 32px;"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right"></a>
                      </div>
                      </div>
    </div>
  </div>
</div>
</section>
<div class="container">
	<div class="row" style="background-color:#7f7d7e; margin-top:20px">
        <div class="col-md-10 col-md-offset-2">
          <div class="tabs-section tabs-section1">
            <ul class="nav nav-tabs">
                <li class="active"><a class="nav_hover" id="hover1" href="#tab-1" data-toggle="tab" aria-expanded="false"><img src="<?php print base_url();?>/assets/img/product/frame.jpg" style="margin-right:5px" /></i>Frames</a></li>
                <li class=""><a class="nav_hover" id="hover2" href="#tab-2" data-toggle="tab" aria-expanded="false"><img id="hover2_img" src="<?php print base_url();?>/assets/img/product/mat.jpg" style="margin-right:5px"/>Add Mount</a></li>
                <li class=""><a class="nav_hover remove-mount" id="hover4" href="#tab-6" data-toggle="tab"><img src="<?php print base_url();?>/assets/img/product/removemat.png" style="margin-right:5px"  />Remove Mount</a></li>
                <li class=""><a class="nav_hover" id="hover5" href="#tab-3" data-toggle="tab" aria-expanded="false"><img id="hover5_img" src="<?php print base_url();?>/assets/img/product/glass.jpg" style="margin-right:5px"  />Glass</a></li>
              </ul>
            </div>
        </div>
    </div>
	<div class="row" style="margin-bottom:20px">
    <div class="tab-content">
    <!-- Tab Content 1 -->
      <div class="tab-pane fade active in row" id="tab-1" style="margin-top:5px">
        	<div class="col-md-2">
                <h4 class="choose-colors"> Select frame style</h4>
                <ul class="choose-colors-type">
                <?php 
					foreach($frame_cat as $frame_c){ ?>
					<li><a href="javascript:" onclick=" showTable('<?=$frame_c->frame_category;?>');" class="active"><?=$frame_c->frame_category;?></a></li>
				<?php }	?>
                </ul>
                <h4 class="choose-colors"> Choose by Size(mm) </h4>
                <ul class="choose-colors-type">
                    <?php
					 foreach($frame_sizze as $frame_s){  ?>
                      <li><a href="javascript:" onClick="Frame_Size('<?=$frame_s->frame_size_inch;?>','<?=$frame_s->frame_size;?>');">
					  <?php	 echo  $frame_s->frame_size; ?></a></li>
					  <?php } ?>
                </ul>
                <h4 class="choose-colors"> Choose by Color </h4>
                <ul class="choose-colors-type">
                	<?php foreach($frame_color as $frame_co){ ?>
					<li><a href="javascript:" onclick="get_frame_color('<?=$frame_co->frame_color;?>');"><?=$frame_co->frame_color;?></a>
					</li>
					<?php } ?>
                </ul>
            </div>
        <div id="frame_slider"></div>
    </div>
    <!-- Tab Content 2 -->
    <div class="tab-pane fade row" id="tab-2" style="margin-top:5px">
        <div class="col-md-2">
            <h4 class="choose-colors"> CHOOSE BY COLOR: </h4>
                <ul class="choose-colors-type">
                    <?php foreach($mount_name as $mount_t) { ?>
						<li><a href="javascript:" onclick="return show_mat('<?=$mount_t->mount;?>');">	<?=$mount_t->mount;?></a></li>
						<?php }?>
                </ul>
                        <h4 class="choose-colors"> Select Width: </h4>
                <select id="mount_width"onchange="return change_mount(this.value);" style="padding:5px; width:100%;">
                    <option value="0">--Select--</option>
                    <option value="0.5">0.5"</option>
                    <option value="1">1"</option>
                    <option value="1.5">1.5"</option>
                    <option value="2">2"</option>
                    <option value="2.5">2.5"</option>
                    <option value="3">3"</option>
                    <option value="3.5">3.5"</option>
                    <option value="4">4"</option>
                    <option value="4.5">4.5"</option>
                    <option value="5">5"</option>
                    <option value="5.5">5.5"</option>
                    <option value="6">6"</option>
                </select>
       	</div>
    		<div id="mount_slider"></div>   
   </div>
    <!-- Tab Content 3 -->
             <div class="tab-pane fade row" id="tab-3" style="margin-top:5px">
            <div class="col-md-6">
            <h4 class="choose-colors regul-glass">REGULAR Glass </h4>
            <ul class="choose-colors-type">
            	<li>Protect prints from protects dust and scratches
                 <span class="pull-right"><input id="check0" name="regular" onclick="selectOnlyThis(this.id);" type="checkbox"> </span>
                </li>
                <li>Regular Glass </li>
            </ul>
            <h4 class="choose-colors regul-glass"> Acrylic Glass   </h4>
            <ul class="choose-colors-type">
            	<li> Lightweight, Transparent, Shatter- resistance
                 <span class="pull-right"><input id="check1" name="acrylic" onclick="selectOnlyThis(this.id);" type="checkbox"> </span>
                </li>
                <li>Acrylic Glass  </li>
            </ul>
            </div>
     </div>
         
    </div>
</div>
<input type="hidden" id="frame_name" value="Absolute Black">
<input type="hidden" id="frame_size" value="1">
<input type="hidden" id="frame_rate" value="66">
<input type="hidden" id="mount_name" value="DR 2091">
<input type="hidden" id="mount_sized" value="1">
<input type="hidden" id="mount_rate" value="">
<input type="hidden" id="type" value="1">
<input type="hidden" id="print_h_w" value="">
<input type="hidden" id="print_type" value="canvas_only">
<input type="hidden" id="mount_state" value="">
<input type="hidden" id="mount_style" value="">
<input type="hidden" id="mount_style2" value="3px">


<section>
	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="product-detail-wrapper">
				<div class="tabs-section" id="tabs-section2">
              <!-- Nav Tabs -->
	              <ul class="nav nav-tabs">
	                <li class="active"><a href="#tab-7" data-toggle="tab" aria-expanded="true">About This Piece</a></li>
	              </ul>
              <!-- Tab panels -->
	            <div class="tab-content">
	                <!-- Tab Content 1 -->
	                <div class="tab-pane fade active in" id="tab-7">
	                	<h3>Portrait of&nbsp;<?php echo $image_detail[0]['image_photographer'];?></h3>
	                	<p><strong>Item # :<?php print $image_detail[0]['image_filename'];?></strong></p>
	      				<p><?php print $image_detail[0]['image_description'];?></p>
	     				<!--<h4> KEYWORDS:-</h4>
				     	<p><?php //print $image_detail[0]['image_keywords'];?></p> -->
	                </div>
	            </div>
              <!-- End Tab Panels -->
        	</div>
    	</div>
	</div>
        	
        	<div class="col-md-6">
            	<div class="product-detail-wrapper">
				<div class="tabs-section" id="tabs-section3">

              <!-- Nav Tabs -->
              <ul class="nav nav-tabs">
                <!-- <li class="" style="display: none;"><a href="#tab-9" data-toggle="tab" aria-expanded="true">Details</a></li> -->
                <li class="active"><a href="#tab-10" data-toggle="tab" aria-expanded="true"> Shipping and Delivery </a></li>
				<li class=""><a href="#tab-11" data-toggle="tab" aria-expanded="false">Framing Info</a></li>
             </ul>

              <!-- Tab panels -->
              <div class="tab-content">
                <!-- Tab Content 3 -->
                <!-- <div class="tab-pane fade active in" id="tab-9" >
                  <h3>CLASSIC STYLE BABY CONVERSE CHUCK TAYLOR</h3>
                  <p>An illustration from Kate Schelter's first book "Classic Style." A gorgeously illustrated guide to "the classics": the essential clothes, accessories, beauty products, and timeless everyday objects that define your personal style. </p>
                </div> -->
                <!-- Tab Content 4 -->
                <div class="tab-pane active in" id="tab-10">
                  <h3>What type of packaging do you use? </h3>
                  <p>Posters and art prints are rolled with thick paper to protect against dust before being packaged in corrugated triangular shipping containers. Framed items are covered securely and placed in adjustable corrugated inserts that lock the frame in position.</p>
                  <h3>When will my art arrive? </h3>
                  <p>You can estimate your art arrival within 5-7 business days.</p>
                  <h3>How should I track my order?  </h3>
                  <p>A confirmation email that includes a tracking number will be provided to you to check .</p>
                </div>
                <!-- Tab Content 5 -->
                <div class="tab-pane fade" id="tab-11">
                  <p>Each frame is handcrafted by a master framer with over 30 years of experience, and ships right to your door guaranteed to fit and preserve your artwork. All the necessary instructions and hardware for hanging will be included; you'll just need a hammer and the right spot on your wall. Contact us if you prefer to send in your artwork for framing, or have an oversize or unusual item to frame.</p>
                </div>
                <!-- Tab Content 3 -->
              </div>
              <!-- End Tab Panels -->

            </div>
                </div>
                <!--<div id="product-detail-wrapper">
	            	<h2 class="product-detail">100% Satisfaction Guarantee</h2>
                    <div class="product-detail-content">
                        <p> Expertly stretched around 1.5 wooden bars with hand-painted edges for a beautiful finish. All pieces are made of artist-grade 100 cotton canvas.</p>
                    </div>
                </div>-->
            </div>
        </div>
        <div class="row" id="review_rating">
        	<div class="col-md-6">
            	<div class="product-detail-wrapper" style="border-top: solid 1px #000;">
	            	<h2 class="product-detail">Ratings & Reviews</h2>
                    <div class="product-detail-content">
                        <p> Expertly stretched around 1.5 wooden bars with hand-painted edges for a beautiful finish. All pieces are made of artist-grade 100 cotton canvas.</p>
                    </div>
                </div>
                <div class="review-engine">
                	<div class="pr-review-head">
                    	<p>Average Customer Rating</p>
                    </div>
                    <div class="pr-review-body">
                    	<div class="star-review">
                        	<i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="pr-review-rounded-average">
                        	4.5 <span>(based on 19 reviews) </span>
                        </div>
                    </div>
                </div>
                <div class="pr-contents-wrapper">
                	<p>89% of respondents would recommend this to a friend.</p>
                    <p>Displaying reviews <strong>1-5</strong> <span><a href="#"> Back to top</a> </span></p>
                </div>
                <div class="pr-review-wrap row">
                	<div class="col-md-3">
                    	<p> <span> Posted on: 5/9/2017 </span> </p>
                    	<p><span>By</span> <strong>Steeler Chick</strong></p>
                        <p><span>from</span> <strong>Des Moines, IA</strong></p>
                        <p><span>About Me</span> <strong>Midrange Shopper</strong></p>
                        <p><span>Verified Buyer</span></p>
                    </div>
                    <div class="col-md-9">
                      <div class="star-review">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <p><strong>Great piece!</strong></p>
                      </div>
                      <div class="pr-value-list">
                      	<ul>
                        	<li> Pros </li>
                            <li> Appealing </li>
                        	<li> Pros </li>
                            <li> Appealing </li>
                        </ul>
                      </div>
                      <div>
                      	<h6>COMMENTS:</h6>
                        <p>Great piece. When it was delivered with a whole in the box and a dent in the frame, Art.com responded immediately for a refund. Great customer service! Will use them for more artwork in the future!</p>
                      </div>
                      <div class="pr-other-attribute-tag-group">
                      	<ul class="pr-other-attributes-list">
                        	<li class="pr-other-attribute-label"> Age <span> 40 – 44 </span></li>
                        	<li class="pr-other-attribute-label"> Gender <span> Male </span></li>
                        	<li class="pr-other-attribute-label"> Bottom Line  <span style="color:#ef9223"> Yes, I would recommend this to a friend </span></li>
                        </ul>
                      </div>
                      <div class="pr-review-helpful-text">
                      <p>Was this review helpful? <a href="#">Yes</a> / <a href="#">No</a> - You may also <a href="">flag this review</a></p>
                      </div>
                    </div>
                </div>
            </div>
        	<div class="col-md-6" id="Recommended_item">
                <div class="product-detail-wrapper" style="border-top: solid 1px #000;">
	            	<h2 class="product-detail">Recommended Items</h2>
                    <div class="product-detail-content">
                    <div class="carousel carousel-showmanymoveone slide" id="itemslider8">
                        <div class="carousel-inner">
                          <div class="item active">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> Name </p>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> Name </p>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> Name </p>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> Name </p>
                            </div>
                          </div>
                          <div class="item">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> Name </p>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> Name </p>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> Name </p>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                              <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                              <p class="text-center itemslider-p2"> Name </p>
                            </div>
                          </div>
                          
                        </div>
                        <div id="slider-control">
                        <a class="left carousel-control" href="#itemslider8" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left"></a>
                        <a class="right carousel-control" href="#itemslider8" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right"></a>
                      </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</section>
<!--zooom in image-->
<style>
.zoom-image,  .zoom-image > figure { background-image: url(<?php echo $image_path;?>);}
.zoom-image {
  width: 500px;
  height: 450px;
}
</style>
<style>
.container3D {
position: relative;
}

#cube {
width: 100%;
height: 100%;
-webkit-transform-style: preserve-3d;
-moz-transform-style: preserve-3d;
-o-transform-style: preserve-3d;
transform-style: preserve-3d;
-webkit-transform: translateZ( -100px );
-moz-transform: translateZ( -100px );
-o-transform: translateZ( -100px );
transform: translateZ( -100px );
}
#cube .front {
-webkit-transform: translateZ( 100px );
-moz-transform: translateZ( 100px );
-o-transform: translateZ( 100px );
transform: translateZ( 100px );
}
#cube .front {
/*background: hsla( 0, 100%, 50%, 0.7 );*/
}
#cube figure {
display: block;
height: auto;
width: auto;
position: absolute;
}

figure {
margin: 0;
}

#cube .right {
-webkit-transform: rotateY( 90deg ) translateZ( 100px );
-moz-transform: rotateY( 90deg ) translateZ( 100px );
-o-transform: rotateY( 90deg ) translateZ( 100px );
transform: skewY(45deg) translate(20px,-10px);
width: 20px;
height: 100%;
right: 0px;
top: 0;
position: absolute;
}

#cube .right {
background: #000;
}
#cube .bottom {
-webkit-transform: rotateX( -90deg ) translateZ( 100px );
-moz-transform: rotateX( -90deg ) translateZ( 100px );
-o-transform: rotateX( -90deg ) translateZ( 100px );
transform: skewX(45deg) translate(-11px,21px);
height: 20px;
width: 100%;
bottom: 1px;
position: absolute;
}
#cube .bottom {
background: #ddd;
}

.carousel-control{width:10px; top:40px;}
.carousel-control.left{background-image:linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,.0001) 100%); left:20px;}
.carousel-control.right{background-image:linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,.0001) 100%); right:20px;}
</style>
</div>
<?php $this->session->unset_userdata('page');?>

<script type="text/javascript">
	$('html').keyup(function(e){
		var width = $('#width').val();
		var height= $('#height').val();
		if(e.keyCode == 8){
			if(width == 0 || height == 0){
				$('.actual_price').html('Rs.0');				
			}
		}
	})
	$(document).ready(function(){		
		var i=true;
		$(".color_btn").click(function(){
			if(i){
			$(".showhidenew,.color_btn").css('bottom','0px');
			$(".color_btn").css('bottom','147px');
			$(".color_panel").css('opacity','1');
			$(".color_panel,#closed").show();
			i = false;
			}else{
				$(".showhidenew").css('bottom','-147px');
				$(".color_panel").css('opacity','0');
				$(".color_panel,#closed").hide();
				i= true;
			}
		});
		
	$('#museum').click(function(){
		$('#22,#myCanvas,#myCanvas2,#myCanvas3,#large_img5,#large_img6,#large_img7,#large_img3').hide();
		$('.container3D').show();	
		$('#museum').prop("checked", true);
		$('#large_img2').show();
	});
	$('#gallery').click(function(){
		$('#myCanvas,#canvas3D,#myCanvas2,#myCanvas3').show();
		$('#gallery').prop("checked", true);
		$('#large_img2,#large_img5,#large_img6,#22,#large_img7,#large_img3').hide();
	});	
	
	$('#sizes').click(function(){
		var img_width  = '<?= $image_width1 ?>';
		var img_height = '<?= $image_height1 ?>'
		var size = $('#sizes').val();
		var dimen = size.split('X');
		if(img_width > img_height ){
			if( parseInt(dimen[0]) > 32){
			var change_width = 325;
			$('#canvas_show,#frame_img,#printed').css('width', change_width+'px');
			}else{
			var change_width = parseInt(dimen[0]) * 10;
			$('#canvas_show,#frame_img,#printed').css('width', change_width+'px');	
			}
		}else{
			if( parseInt(dimen[1]) > 25){
			var change_width = 165;
			$('#canvas_show,#frame_img,#printed').css('width', change_width+'px');
			}else{
			var change_width = parseInt(dimen[0]) * 10;
			$('#canvas_show,#frame_img,#printed').css('width', change_width+'px');	
			}
		}
	});

	$('#mount_rate').val('0.75');
	var width  = '<?= $image_width1 ?>'; 
	var height = '<?= $image_height1?>';
		if(width >= height){
			var front_width = Math.round(width*0.825);
			var front_height = Math.round(height*0.83388); 	
			front(front_width,front_height); 
			var right_sourceX = Math.round(width*0.825);
			var right_height = Math.round(height*0.83388);
			var right_width = width;
			right(right_width,right_height,right_sourceX);
			$('#myCanvas').attr('height',right_height+'px');
			$('#myCanvas').attr('width',right_width+'px');
			$('#myCanvas').css('width','111px');
			$('#myCanvas').css('height','100%');
			var bottom_width = Math.round(width*0.825);
			var bottom_height = height;
			var sourceY = Math.round(height*0.83388);
			bottom(bottom_width,bottom_height,sourceY); 
			$('#myCanvas3').attr('width',bottom_width+'px');
			$('#myCanvas3').attr('height',bottom_height+'px');

			$('#myCanvas3').css('height','111px');
		} else {
			var front_width = Math.round(width*0.79381);
			var front_height = Math.round(height*0.77220); 	
			front(front_width,front_height);  
			var right_sourceX = Math.round(width*0.79381);
			var right_height = Math.round(height*0.77220);
			var right_width = width*0.20618;
			right(right_width,right_height,right_sourceX);
			$('#myCanvas').attr('height',right_height+'px');
			$('#myCanvas').attr('width',right_width+'px');
			$('#myCanvas').css('width','20px');
			var bottom_width = Math.round(width*0.79381);
			var bottom_height = height*0.22779;
			var sourceY = Math.round(height*0.77220);
			bottom(bottom_width,bottom_height,sourceY); 
			$('#myCanvas3').attr('width',bottom_width+'px');
			$('#myCanvas3').attr('height',bottom_height+'px'); 
			$('#myCanvas3').css('height','20px');
		}
	});	
</script>

<input type="hidden" name="image_id" id="image_id" value="<?=$image_id?>">
<input type="hidden" name="image_filename" id="image_filename" value="<?=$image_detail[0]['image_filename']?>">
<input type="hidden" name="user_id" id="user_id" value="<?=$userid?>">
<input type="hidden" name="api_image_id" id="api_image_id" >
<input type="hidden" name="quality_rate" id="quality_rate" value="">
<input type="hidden" name="image_size" id="image_size" value="">
<input type="hidden" name="quality" id="quality" value="<?=$collection_range;?>">
<input type="hidden" name="img_id" id="img_id" value="<?php echo $images_id;?>" />
<input type="hidden" name="img_id" id="gallery_img_id" value="<?=$image_detail[0]['images_id'];?>" />
<input type="hiden" name="paper_type" id="paper_type" value="1">

<script type="text/javascript">
		function showTable(frame_cat){
			$.ajax({
	            type: "POST",
	            url: "<?=base_url();?>index.php/frontend/get_frame_code_web_price",
	            data:'frame_cat='+frame_cat,
				beforeSend: function(){
				},
				success: function(data)
	            {
				var obj=JSON.parse(data);
				var total_items = obj.length; 
				var i,j,toal_slide,total_s,rem_slide,req_slide,td_inner="";
				total_s = (obj.length/6);
				rem_slide = (obj.length%6);
				total_s = Math.round(total_s);			
				if(rem_slide){
				req_slide = total_s +1;	
				}else{
				req_slide = total_s;	
				}
				var image = 0;	
				td_inner += '<div class="product-detail-content col-md-10">';
	            td_inner += '<div class="carousel carousel-showmanymoveone slide" id="itemslider1">';
	            td_inner += '<div class="carousel-inner">'; 
				for(j=0;j<=req_slide-1;j++){
					if(j==0){
						td_inner += '<div class="item active">';
					}else{
						td_inner += '<div class="item">';
					}
					for(i=0;i<=5;i++){
				if(image < total_items){
				var val=obj[image];
				var explode=val.split(',');
				var f_code=explode[0];
				var explode1=explode[1];
				var f_name="'"+explode1+"'";
				var explode2=explode[2];
				var f_size="'"+explode2+"'";
				var explode3=explode[3];
				var f_color="'"+explode3+"'";
				var explode4=explode[4];
				var f_rate="'"+explode4+"'";
				var explode5=explode[5];
				var f_name="'"+explode5+"'";
				var explode6=explode[6];
				var f_name_mm="'"+explode6+"'";
				if(explode[7]=='0'){
				mount_avail='Out of stock';
				}else{
				mount_avail='';
				}
				var f_shape=$('#frame_shape').val();
				var frame_shape="'"+f_shape+"'";
				td_inner += '<div class="col-xs-12 col-sm-6 col-md-2 frame" id="frame'+image+'" onclick=" myfun('+f_color+','+f_size+','+frame_shape+','+f_name+','+f_rate+','+f_name_mm+');"><a><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+f_code+'.jpg" class="img-responsive center-block img3"></a><h5 class="text-center">'+explode[5]+'</h5><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></div>';
					image++;
				}
				} td_inner +='</div>';
			    }
				if(total_items>4){
				td_inner += '<div id="slider-control">';
		        td_inner += '<a class="left carousel-control arrowclick" id="frame_left" href="#itemslider1" data-slide="prev">';
		        td_inner += '<i class="fa fa-angle-left" style="font-size:3em"></i></a>';
		        td_inner += '<a class="right carousel-control arrowclick" id="frame_right" href="#itemslider1" data-slide="next">';
		        td_inner += '<i class="fa fa-angle-right" style="font-size:3em"></i></a>';
		        td_inner += '</div>';
				}
				td_inner += '</div></div></div>';	
				$('#frame_slider').html(td_inner);
				}
			});
    	}

    	function show_mat(obj){
			$.ajax({
			    type:"post",
				url:"<?=base_url()?>index.php/frontend/get_all_mount_for_slide",
				data:'mount='+obj,
				beforeSend: function(){
				},
				success: function(success){
				var array=JSON.parse(success);
				var total_s,total_slide="";
				total_s=(array.length)/6;
				rem_slide = (array.length)%6;
				total_slide=Math.round(total_s);
				if(rem_slide){
					total_slide = total_slide+1; 
				}else{
				total_slide = total_slide;
				}
				var breaks,mount_code,mount_rate,mount_name,mount_avail,td_inner='';
				var image=0;	
				td_inner += '<div class="product-detail-content col-md-10">';
		        td_inner += '<div class="carousel carousel-showmanymoveone slide" id="itemslider4">';
		        td_inner += '<div class="carousel-inner">';
				for(var i=0;i<total_slide;i++){
					if(i==0){
							td_inner += '<div class="item active">';
						}else{
							td_inner += '<div class="item">';
						}
				for(var j=0;j<=5;j++){
					if(image<array.length){
				breaks=array[image].split(',');
				mount_rate="'"+breaks[1]+"'";
				mount_code="'"+breaks[0]+"'";
				mount_name="'"+breaks[2]+"'";
				if(breaks[3]=='0'){
				mount_avail='Out of stock';
				}else{
				mount_avail='';
				}
				td_inner +='<div class="col-xs-12 col-sm-6 col-md-2 mount_data" id="mount'+image+'" onclick=" state_change(); return mount_select('+mount_rate+','+mount_code+','+mount_name+');"><a><img src="<?php echo base_url()?>images/uploaded_pdf/mount_new/'+breaks[0]+'.jpg" class="img-responsive center-block"></a><h5 class="text-center">'+breaks[2]+'</h5><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></div>'
				image++;
					}
						}td_inner +='</div>';
					}	
				td_inner += '<div id="slider-control">';
		        td_inner += '<a class="left carousel-control arrowclick"  href="#itemslider4" data-slide="prev">';
		        td_inner += '<i class="fa fa-angle-left" style="font-size:3em"></i></a>';
		        td_inner += '<a class="right carousel-control arrowclick"  href="#itemslider4" data-slide="next">';
		        td_inner += '<i class="fa fa-angle-right" style="font-size:3em"></i></a>';
		        td_inner += '</div>';
				td_inner += '</div></div></div>';	
				$('#mount_slider').html(td_inner);
				}
			});
   		}

   		function state_change(){
   			$('#mount_state').val(1);
   			var mount = $('#mount_sized').val();  
   			$('#mount_width').val(mount);
   			var change_mount = mount*10;
			$('#abc').css({'width':'auto','padding':change_mount,'background-attachment':'scroll','position': 'relative','z-index':'1'});
   			$('#mount_state').val(1);
   			$('.mount').show();
   		}

   		function Frame_Size(FrameSize,frame_size_mm){
			$.ajax({
		      type:'post',
			  url:'<?=base_url()?>index.php/frontend/get_frame_by_frame_color',
			  data:'FrameSize='+frame_size_mm,
			  beforeSend: function(){
				$('#load_buffer').show();
				},
			  success:function(response){
			  var array= JSON.parse(response);
			  var td_inner = '';
			  var total_s,total_slide="";
			  total_s=(array.length)/4;
			  rem_slide = (array.length)%4;
			  total_slide=Math.round(total_s);
			if(rem_slide){
				total_slide = total_slide+1; 
			}else{
			total_slide = total_slide;
			}
			var breaks,mount_code,mount_rate,mount_name,mount_avail,td_inner='';
			var image=0;	
			td_inner += '<div class="product-detail-content col-md-10">';
	        td_inner += '<div class="carousel carousel-showmanymoveone slide" id="itemslider6">';
	        td_inner += '<div class="carousel-inner">';
			 	for(var j=0;j<total_slide;j++){
					if(j==0){
						td_inner += '<div class="item active">';
					}else{
						td_inner += '<div class="item">';
					}
			    for(var i=0;i<=3;i++){
				if(image<array.length){
					var val = array[image];
					var explode = val.split(',');
					var f_code=explode[0];
					var explode1=explode[1];
					var f_name="'"+explode1+"'";
					var explode2=explode[2];
					var f_size="'"+explode2+"'";
					var explode3=explode[3];
					var f_color="'"+explode3+"'";
					var explode4=explode[4];
					var f_rate="'"+explode4+"'";
					var explode5=explode[5];
					var f_name="'"+explode5+"'";
					var explode6=explode[6];
					var f_name_mm="'"+explode6+"'";
						if(explode[7]=='0'){
						mount_avail='Out of stock';
						}else{
						mount_avail='';
						}
						var f_shape=$('#frame_shape').val();
						var frame_shape="'"+f_shape+"'";	
				td_inner += '<div class="col-xs-12 col-sm-6 col-md-2 frame" id="frame'+image+'" onClick=" myfun('+f_color+','+f_size+','+frame_shape+','+f_name+','+f_rate+','+f_name_mm+');"><a><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+f_code+'.jpg" class="img-responsive center-block"></a><h5 class="text-center">'+explode[5]+'</h5><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></div>';
				}
					image++;
					}td_inner +='</div>';
				}	
				if(array.length>4){
			td_inner += '<div id="slider-control">';
	        td_inner += '<a class="left carousel-control arrowclick"  href="#itemslider2" data-slide="prev">';
	        td_inner += '<i class="fa fa-angle-left" style="font-size:3em"></i></a>';
	        td_inner += '<a class="right carousel-control arrowclick"  href="#itemslider2" data-slide="next">';
	        td_inner += '<i class="fa fa-angle-right" style="font-size:3em"></i></a>';
	        td_inner += '</div>';
			}
			td_inner += '</div></div></div>';	
			$('#frame_slider').html(td_inner);
				    $('#load_buffer').hide();
	 			}
			});
		}	
		
		function get_frame_color(frame_color){
			var total_slide,total_s="";
			$.ajax({
            type:"post",
			url:"<?=base_url()?>index.php/frontend/get_frame_by_frame_color",
			data:'frame_color='+frame_color,
			beforeSend: function(){
			$('#load_buffer').show();
			},
			success: function(response){
			var array= JSON.parse(response);
		  	var td_inner = '';
		  	var total_s,total_slide="";
		  	total_s=(array.length)/4;
		  	rem_slide = (array.length)%4;
		  	total_slide=Math.round(total_s);
		  	if(rem_slide){
			total_slide = total_slide+1; 
		  	}else{
		  	total_slide = total_slide;
		  	}
		  	var breaks,mount_code,mount_rate,mount_name,mount_avail,td_inner='';
		 	 var image=0;	
			td_inner += '<div class="product-detail-content col-md-10">';
            td_inner += '<div class="carousel carousel-showmanymoveone slide" id="itemslider5">';
            td_inner += '<div class="carousel-inner">';
		    for(var j=0;j<total_slide;j++){
				if(j==0){
					td_inner += '<div class="item active">';
				}else{
					td_inner += '<div class="item">';
				}
		  	for(var i=0;i<=3;i++){
				if(image<array.length){
				var val = array[image];
				var explode = val.split(',');
				var f_code=explode[0];
				var explode1=explode[1];
				var f_name="'"+explode1+"'";
				var explode2=explode[2];
				var f_size="'"+explode2+"'";
				var explode3=explode[3];
				var f_color="'"+explode3+"'";
				var explode4=explode[4];
				var f_rate="'"+explode4+"'";
				var explode5=explode[5];
				var f_name="'"+explode5+"'";
				var explode6=explode[6];
				var f_name_mm="'"+explode6+"'";
					if(explode[7]=='0'){
					mount_avail='Out of stock';
					}else{
					mount_avail='';
					}
				var f_shape=$('#frame_shape').val();
				var frame_shape="'"+f_shape+"'";	
				td_inner += '<div class="col-xs-12 col-sm-6 col-md-2 frame" id="frame'+image+'" onClick="myfun('+f_color+','+f_size+','+frame_shape+','+f_name+','+f_rate+','+f_name_mm+');"><a><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+f_code+'.jpg" class="img-responsive center-block"></a><h5 class="text-center">'+explode[5]+'</h5><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></div>';
				}
					image++;
				}td_inner +='</div>';
			}	
			if(array.length>4){
				td_inner += '<div id="slider-control">';
        		td_inner += '<a class="left carousel-control arrowclick"  href="#itemslider3" data-slide="prev">';
        		td_inner += '<i class="fa fa-angle-left" style="font-size:3em"></i></a>';
        		td_inner += '<a class="right carousel-control arrowclick"  href="#itemslider3" data-slide="next">';
        		td_inner += '<i class="fa fa-angle-right" style="font-size:3em"></i></a>';
        		td_inner += '</div>';
			}
				td_inner += '</div></div></div>';	
				$('#frame_slider').html(td_inner);
				    $('#load_buffer').hide();
 				}
			});
		}

		function myfun(color,size,shape,f_code,f_rate,f_size_mm){
			$('#frame_name').val(f_code);
			$('#frame_size').val(size);
			$('#frame_rate').val(f_rate);
			$('#frame_sized').html(f_size_mm);
			$('#f_name').html(f_code);

			if(f_code){
		       var dert= "<?php echo base_url()?>images/uploaded_pdf/frames/horizontal/";
			   var border_width="";
			   var border_width2="";
			   if(f_size_mm<=40){
			   border_width=20;
			   border_width2=10;
			   }else if(f_size_mm>40 && f_size_mm<=50){
			   border_width=30;
			   border_width2=15;
			   }else if(f_size_mm>50 && f_size_mm<=66){
			   border_width=40;
			   border_width2=20;
			   }else if(f_size_mm>66){
			   border_width=55;
			   border_width2=25;
			   }
			   $('div.mainhor').css({'border-image':'url("'+dert+f_code+'.jpg") 58 58 58 58 round round','border-style':'solid','border-width':''+ border_width+'px'});
			   $('div.mainhor2').css({'border-image':'url("'+dert+f_code+'.jpg") 58 58 58 58 round round','border-style':'solid','border-width':''+ border_width2+'px'});
			   $('#frame_name').val(f_code);
			}
			get_quality('');
		}
	$(document).ready(function(){
		$('#hover2').click(function(){
			show_mat('');			
		});
	})

	function mount_select(mount_rate,mount_code,mount_name){
		$('#mount_rate').val(mount_rate);
		$('#mount_name').val(mount_code);
		$('#mount_color').val(mount_name);
		$('#mount_color').html(mount_name);
		if(mount_code){
		var dest= "<?php echo base_url()?>images/uploaded_pdf/mount/";
        $('div#abc,div#abc2').css('background','url("'+dest+mount_code+'.jpg")');
		var padding = $("#mount_width").val();	
		padding = padding * 6
		$('#abc2').css('padding', padding+'px');
		}
		get_quality('');	
	}

	function change_mount(mount){
   		var change_mount  = mount*10;
   		var change_mount2 = mount*6;
   		$('.mount').show();
   		$('#mount_sized').val(mount);
		$("#abc").css('padding',change_mount);
    	$("#abc2").css('padding',change_mount2);
    	$('#mount_size').val(mount);
    	get_quality('');
    }


    function selectOnlyThis(id) {
	    for (var i = 0;i <=1 ; i++)
	    {
	        document.getElementById('check'+i).checked = false;
	    }
	    var selected_type = document.getElementById(id) ;
		if(id == 'check1')
		$('#glass_type').html('Acrylic');
		else 
		$('#glass_type').html('Regular');	
		selected_type.checked = true;
	    get_quality('');
	}
    
        
function addToCart()
{  
  var paper_surface = $('#surfaces').val();
  var framed_art = $('#sizes').val();
  var print = framed_art.split('X'); 
  var print_width = print[0];
  var print_height = print[1]; 
  var final_frame_size = framed_art;
  var only_print = $('#print_type').val();
  var frame_name = '';
  if(only_print == ''){
  	frame_name = $('#frame_name').val();
  }else{
  	frame_name = 'Streched Canvas Gallary Wrap';	
  }
  var mount_name,mount_color,mat1_size;
  if($('#mount_state').val() == 0 ){
   	mount_name = 0;
    mount_color= 0;
    mat1_size  = 0;
  }else{ 	
  	 mount_name=$('#mount_name').val();
  	mount_color=$('#mount_color').html();
  	  mat1_size=$('#mount_width').val()+'"';
  }
  var glasses= $('#glass_type').html();
  var glasses_coste= $('#glass_price').html();
      glasses_coste = glasses_coste.split('.');		
      glasses_coste = glasses_coste[1];
  var total_price=$('.total_cost').html();
      total_price = total_price.split('.');
  	  total_price = total_price[1];	
  var MountCost=$('#MountCost').html();
      MountCost = MountCost.split('.');
  	  MountCost = MountCost[1];
  var FrameCost=$('#FrameCost').html();
  	  FrameCost = FrameCost.split('.');		
  	  FrameCost = FrameCost[1];
  var price=$('#print_price').html();
      price = price.split('.');
  	  price = price[1];
  var print_size=$('#print_h_w').val();
  var image_id=$('#image_id').val();
  var image_type= $('#surfaces').val();
  var user_id=$('#user_id').val();
  var mat1_color=$('#mount_color').html();
  var image_namee=$('#image_filename').val();
  var frameSize=$('#frame_sized').html();
  //alert(paper_surface+','+framed_art+','+print_width+','+print_height+','+final_frame_size+','+only_print+','+frame_name+','+mount_name+','+mount_color+','+glasses+','+glasses_coste+','+total_price+','+MountCost+','+FrameCost+','+price+','+image_id+','+user_id+','+mat1_size+','+mat1_color+','+image_namee+','+frameSize+','+image_type+','+print_size);
    $.ajax({
        type: "POST",
	    url: "<?=base_url()?>frontend/frameit_addtocart",
        data: "glasses_coste="+glasses_coste+"&glasses="+glasses+"&FrameCost="+FrameCost+"&MountCost="+MountCost+"&total_price="+total_price+"&user_id="+user_id+"&img_id="+image_id+"&image_type="+image_type+"&mat_color="+mount_name+"&mount_color="+mount_color+"&mat_size="+mat1_size+"&frame_color="+frame_name+"&frameSize="+frameSize+"&images_size="+print_size+"&images_price="+price+"&paper_surface="+paper_surface+"&final_frame_size="+final_frame_size+"&image_namee="+image_namee+'&print_v='+only_print,
		success:function(data)  
    	{   
    		swal({
				  title: 'CART STATUS',
				  text: 'Item Added Successfully',
				  timer: 1000
				})
			setTimeout(function(){
			 $('.frame-step-header-container').show();
			 feedback_of_addtocart(data);
			 $('html, body').animate({ scrollTop: 0 }, 'fast');
		  },1000); 
      var cartItem = parseInt($('.cart_add').html());
      cartItem++;
      $('.cart_add').html(cartItem);
    }
  });
}
	function feedback_of_addtocart(a){
		$('.frame-step-header-text').html('<span class="glyphicon glyphicon-ok" style="margin-right:10px;"></span>Item Added To Cart.');
	}

	function change_wallcolor(class_get){
		var get_class = $(class_get).attr('class');
		var attribute = $('.'+get_class).css('background-color');	
		$('#22').css('background-color',attribute);
	}

	function get_functions(){
		get_quality('');
	}
</script>