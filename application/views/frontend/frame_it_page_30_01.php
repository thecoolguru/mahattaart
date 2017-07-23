<?php 
//print_r($img_details);
if($quality=='1'){
$quality='A+';
}elseif($quality=='2'){
$quality='A';
}elseif($quality=='3'){
$quality='B';
}elseif($quality=='4'){
$quality='C';
}elseif($quality=='5'){
$quality='D';
}elseif($quality=='6'){
$quality='E';
}elseif($quality=='7'){
$quality='F';
}

$mount_rate=$this->frontend_model->get_web_mount_rate('White');
$frame_rate=$this->frontend_model->get_web_frame_rate('Absolute');
$glass_rate=$this->frontend_model->get_web_glass_rate('Normal');


if($this->session->userdata('userid'))
{
$Obj=new Frontend();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 
 $mat_size=2.0;
 $userid=$this->session->userdata('userid');
 
 $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;
 $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $imagsTypes= $splitUrl[5];
 $baseeUrl=base_url();
 // calcuulate image ratio
 //echo 'http://www.indiapicture.in/wallsnart/398/'.$img_details[0]['image_filename'];
$size_data = getimagesize('http://www.indiapicture.in/wallsnart/398/'.$img_details[0]['image_filename']);
//print_r($size_data);
$image_alignment="";
//echo $img_details->images_id;
// Step 1: detect image is horizontal, vertical or square 
//  0=>width and 1=>height :::: 4:3->1.3333 and 2:3->0.667 :::: 12,16,24,32,40,44
  $image_width=$size_data[0];
$image_height=$size_data[1];
 $image_ratio=$image_width/$image_height;
$size_array=array();
 $role_size = 24;
$lower_value = 0;

//echo $pricing_range;
if($size_data[0]>$size_data[1])
{
	$image_alignment="horizontal";
	// height fix : w=?

         if($surface==1)// canvas
    {   
        $size_array[0]['width']=8*$image_ratio;
        $size_array[0]['height']=8;
        $size_array[1]['width']=12*$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=16*$image_ratio;
        $size_array[2]['height']=16;
        $size_array[3]['width']=20*$image_ratio;
        $size_array[3]['height']=20;
        $size_array[4]['width']=24*$image_ratio;
        $size_array[4]['height']=24;
        $size_array[5]['width']=28*$image_ratio;
        $size_array[5]['height']=28;
        $size_array[6]['width']=32*$image_ratio;
        $size_array[6]['height']=32;
        $size_array[7]['width']=36*$image_ratio;
        $size_array[7]['height']=36;
        $size_array[8]['width']=40*$image_ratio;
        $size_array[8]['height']=40;
        $size_array[9]['width']=44*$image_ratio;
        $size_array[9]['height']=44;
        $size_array[10]['width']=48*$image_ratio;
        $size_array[10]['height']=48;
        $size_array[11]['width']=50*$image_ratio;
        $size_array[11]['height']=50;


    }
	else ///// surface 4 (premimum photography/fine art) surface 3 photographic(Matte /luster)
	{
		
        $size_array[0]['width']=8*$image_ratio;
        $size_array[0]['height']=8;
        $size_array[1]['width']=12*$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=16*$image_ratio;
        $size_array[2]['height']=16;
        $size_array[3]['width']=20*$image_ratio;
        $size_array[3]['height']=20;
        $size_array[4]['width']=24*$image_ratio;
        $size_array[4]['height']=24;
        $size_array[5]['width']=28*$image_ratio;
        $size_array[5]['height']=28;
        $size_array[6]['width']=32*$image_ratio;
        $size_array[6]['height']=32;
        $size_array[7]['width']=36*$image_ratio;
        $size_array[7]['height']=36;
        $size_array[8]['width']=40*$image_ratio;
        $size_array[8]['height']=40;
        $size_array[9]['width']=44*$image_ratio;
        $size_array[9]['height']=44;

    }

}
else if($size_data[0]<$size_data[1])
{
	
$image_alignment="vertical";
	// width fix : h=?
	
    if( $surface==1)// canvas
    {    $size_array[0]['width']=8;
        $size_array[0]['height']=8*(1/$image_ratio);
        $size_array[1]['width']=12;
        $size_array[1]['height']=12*(1/$image_ratio);
        $size_array[2]['width']=16;
        $size_array[2]['height']=16*(1/$image_ratio);
        $size_array[3]['width']=20;
        $size_array[3]['height']=20*(1/$image_ratio);
        $size_array[4]['width']=24;
        $size_array[4]['height']=24*(1/$image_ratio);
        $size_array[5]['width']=28;
        $size_array[5]['height']=28*(1/$image_ratio);
        $size_array[6]['width']=32;
        $size_array[6]['height']=32*(1/$image_ratio);
        $size_array[7]['width']=36;
        $size_array[7]['height']=36*(1/$image_ratio);
        $size_array[8]['width']=40;
        $size_array[8]['height']=40*(1/$image_ratio);
        $size_array[9]['width']=44;
        $size_array[9]['height']=44*(1/$image_ratio);
        $size_array[10]['width']=48;
        $size_array[10]['height']=48*(1/$image_ratio);
        $size_array[11]['width']=50;
        $size_array[11]['height']=50*(1/$image_ratio);

    }

    else
	{  /////// surface 4 (premimum photography/fine art) surface 3 photographic(Matte /luster)
       
        $size_array[0]['width']=8;
        $size_array[0]['height']=8*(1/$image_ratio);
        $size_array[1]['width']=12;
        $size_array[1]['height']=12*(1/$image_ratio);
        $size_array[2]['width']=16;
        $size_array[2]['height']=16*(1/$image_ratio);
        $size_array[3]['width']=20;
        $size_array[3]['height']=20*(1/$image_ratio);
        $size_array[4]['width']=24;
        $size_array[4]['height']=24*(1/$image_ratio);
        $size_array[5]['width']=28;
        $size_array[5]['height']=28*(1/$image_ratio);
        $size_array[6]['width']=32;
        $size_array[6]['height']=32*(1/$image_ratio);
        $size_array[7]['width']=36;
        $size_array[7]['height']=36*(1/$image_ratio);
        $size_array[8]['width']=40;
        $size_array[8]['height']=40*(1/$image_ratio);
        $size_array[9]['width']=44;
        $size_array[9]['height']=44*(1/$image_ratio);
	}
}
else 
{
	$image_alignment="square";
        

if($surface==1)// canvas
    {   
        $size_array[0]['width']=8*$image_ratio;
        $size_array[0]['height']=8;
        $size_array[1]['width']=12*$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=16*$image_ratio;
        $size_array[2]['height']=16;
        $size_array[3]['width']=20*$image_ratio;
        $size_array[3]['height']=20;
        $size_array[4]['width']=24*$image_ratio;
        $size_array[4]['height']=24;
        $size_array[5]['width']=28*$image_ratio;
        $size_array[5]['height']=28;
        $size_array[6]['width']=32*$image_ratio;
        $size_array[6]['height']=32;
        $size_array[7]['width']=36*$image_ratio;
        $size_array[7]['height']=36;
        $size_array[8]['width']=40*$image_ratio;
        $size_array[8]['height']=40;
        $size_array[9]['width']=44*$image_ratio;
        $size_array[9]['height']=44;
        $size_array[10]['width']=48*$image_ratio;
        $size_array[10]['height']=48;
        $size_array[11]['width']=50*$image_ratio;
        $size_array[11]['height']=50;

    }else{ ///// surface 4 (premimum photography/fine art) surface 3 photographic(Matte /luster)

        $size_array[0]['width']=8*$image_ratio;
        $size_array[0]['height']=8;
        $size_array[1]['width']=12*$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=16*$image_ratio;
        $size_array[2]['height']=16;
        $size_array[3]['width']=20*$image_ratio;
        $size_array[3]['height']=20;
        $size_array[4]['width']=24*$image_ratio;
        $size_array[4]['height']=24;
        $size_array[5]['width']=28*$image_ratio;
        $size_array[5]['height']=28;
        $size_array[6]['width']=32*$image_ratio;
        $size_array[6]['height']=32;
        $size_array[7]['width']=36*$image_ratio;
        $size_array[7]['height']=36;
        $size_array[8]['width']=40*$image_ratio;
        $size_array[8]['height']=40;




        $size_array[9]['width']=44*$image_ratio;
        $size_array[9]['height']=44;
    }// end if condition
        
    }
    //echo $image_alignment;
 $fir_width=$size_array[0]['width']/6 * 720/10;
 $fir_height=$size_array[0]['height']/6*720/10;

  // echo $image_alignment;                                              
?>
<script>/*<![CDATA[*/function myfuntest(s,q,p,h,g,f,e,c,r){document.getElementById("frame_color").value=h;if(r=="Vertical"){var b="<?php echo base_url()?>uploaded_pdf/new vertical/";+$("div.main").css("background",'url("'+b+s+'")');+$("div.main").css("background-size","cover")}else{if(r=="Slim"){var b="<?php echo base_url()?>uploaded_pdf/slim/";+$("div.main").css("background",'url("'+b+s+'")');+$("div.main").css("background-size","cover")}else{if(r=="Horizontal"){var b="<?php echo base_url()?>uploaded_pdf/horizontal/";+$("div.mainhor").css("background",'url("'+b+s+'") no-repeat');+$("div.mainhor").css("background-size","cover")}else{if(r=="Square"){var b="<?php echo base_url()?>uploaded_pdf/square/";+$("div.mainhor").css("background",'url("'+b+s+'") no-repeat');+$("div.mainhor").css("background-size","cover")}else{if(r=="Panoramic"){var b="<?php echo base_url()?>uploaded_pdf/Panoramic/";+$("div.mainhor").css("background",'url("'+b+s+'") no-repeat');+$("div.mainhor").css("background-size","cover")}}}}}}function change_color(f,e,d){var c="<?php echo base_url();?>uploaded_pdf/";$("div#abc").css("background-color",""+d+"");$("#fir").css("padding","2px");$("#fir").css("box-shadow","2px 2px 1px black inset");document.getElementById("mat1_color").value=d}/*]]>*/</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/jquery.jqzoom.css" />
<script src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.jqzoom-core-pack.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/reveal.css" type="text/css">
<script type="text/javascript">jQuery(document).ready(function(){jQuery("a#demo2").jqzoom({zoomType:"reverse",alwaysOn:false,zoomWidth:480,zoomHeight:490,title:false,xOffset:30,yOffset:0,showEffect:"fadein",hideEffect:"fadeout"})});</script>
<link media="screen" rel="stylesheet" href="<?php print base_url();?>assets/css/colorbox.css" />
<script src="<?php print base_url();?>assets/js/colorbox/jquery.colorbox.js"></script>
<script>$(document).ready(function(){$(".help").colorbox({width:"424px",height:"450px",padding:"0px",iframe:true})});</script>
<script type="text/javascript">/*<![CDATA[*/var current="";var curren="";var curre="";var curr="";var cur="";var cu="";var cuz="";var cut="";b=0;c=9;while(b<10){eval("var before"+b+"=''");eval("var befor"+b+"=''");eval("var befo"+b+"=''");eval("var bef"+b+"=''");eval("var be"+b+"=''");eval("var bez"+b+"=''");eval("var bet"+b+"=''");eval("var ben"+b+"=''");b++}var before1="";function dobackup(a,i,j,k,l,m,n,o,p){while(c>0){d=c-1;eval("before"+c+"=before"+d);eval("befor"+c+"=befor"+d);eval("befo"+c+"=befo"+d);eval("bef"+c+"=bef"+d);eval("be"+c+"=be"+d);eval("bez"+c+"=bez"+d);eval("bet"+c+"=bet"+d);eval("ben"+c+"=ben"+d);c--}c=9;before0=current;befor0=curren;befo0=curre;bef0=curr;be0=cur;bez0=cu;bet0=cuz;ben0=cut;current=a;curren=i;curre=j;curr=l;cur=m;cu=n;cuz=o;cut=p}function undoinput(){var k="";current=before0;curren=befor0;curre=befo0;curr=bef0;cur=be0;cu=bez0;cuz=bet0;cut=ben0;c=1;while(c<9){d=c-1;eval("before"+c+"=before"+d);eval("befor"+c+"=befor"+d);eval("befo"+c+"=befo"+d);eval("bef"+c+"=bef"+d);eval("be"+c+"=be"+d);eval("bez"+c+"=bez"+d);eval("bet"+c+"=bet"+d);eval("ben"+c+"=ben"+d);c++}c=9;myfun(before0,befor0,befo0,k,bef0,be0,bez0,bet0,ben0)}function redo(){window.location.reload()};/*]]>*/</script>
<script type="text/javascript">/*<![CDATA[*/$(window).bind("load",function(){myfuntest("101 Black.jpg","0.75X0.75","40.00","Black","60","0.75","12","8","<?=$img_shape->shapes?>");var print_price=document.getElementById("print_price").innerHTML;var frame_price=document.getElementById("frame_price").innerHTML;var mat1_price=document.getElementById("mat1_price").innerHTML;var acrylic_price=document.getElementById("acrylic_price").innerHTML;var fitting_price=document.getElementById("fitting_price").innerHTML;var total1=eval(print_price)+eval(frame_price)+eval(mat1_price)+eval(acrylic_price)+eval(fitting_price);var total=Math.round(total1);document.getElementById("total_price").innerHTML=total});function capture(){logging:true;html2canvas([document.getElementById("frame-it")],{onrendered:function(b){var a=b.toDataURL();$.post("<?php echo base_url()?>frontend/save_frame",{data:a},function(c){save_value(c)})}})}function room_view1(){var b=document.getElementById("frame-it"),c=b.currentStyle||window.getComputedStyle(b,false),a=c.backgroundImage.slice(50,-2);html2canvas([document.getElementById("frame-it")],{onrendered:function(e){var d=e.toDataURL();$.post("<?php echo base_url()?>frontend/save_frame",{data:d},function(f){window.location.href="<?php echo base_url()?>frontend/room_view/<?php echo $size;?>/"+f})}})}function large_images(){var q=document.getElementById("r_img_width_id").value;var f=document.getElementById("r_img_height_id").value;var h=document.getElementById("print_mount_size").value;var e=document.getElementById("mat1_color").value;var o=document.getElementById("frame_color").value;var a=document.getElementById("fat_frame").value;var m=h*17;m=16;var n=8;var i=5;var j=<?=$fir_width?>;var d=<?=$fir_height?>;if(a!=""){if(a=="0.75"){var g=2}else{var g=parseInt(a)*parseInt(5)}}var b=parseInt(q)+parseInt(m);var k=parseInt(f)+parseInt(m);if(o!=""){var c="<?php echo base_url()?>uploaded_pdf/new_frames/split_frame/";+$("div.main_frame").css("background",'url("'+c+o+'")')}else{var c="<?php echo base_url()?>uploaded_pdf/new_frames/split_frame/332x395.jpg";+$("div.main_frame").css("background",'url("'+c+'")')}document.getElementById("fir_room").style.marginLeft=i+"px";document.getElementById("fir_room").style.width=j+"px";document.getElementById("fir_room").style.height=d+"px";document.getElementById("abc2").style.width=b+"px";document.getElementById("abc2").style.height=k+"px";document.getElementById("abc2").style.paddingTop=n+"px";document.getElementById("abc2").style.paddingLeft="2px";document.getElementById("change_frame").style.padding=g+"px";document.getElementById("abc2").style.backgroundColor=e;document.getElementById("large_image_dive").style.display="block";document.getElementById("fade").style.display="block"}function room_view(){var q=document.getElementById("r_img_width_id").value;var f=document.getElementById("r_img_height_id").value;var h=document.getElementById("print_mount_size").value;var e=document.getElementById("mat1_color").value;var p=document.getElementById("frame_color").value;var a=document.getElementById("fat_frame").value;var m=h*17;m=16;var o=8;var i=5;var j=<?=$fir_width?>;var d=<?=$fir_height?>;if(a!=""){if(a=="0.75"){var g=2}else{var g=parseInt(a)*parseInt(5)}}var b=parseInt(q)+parseInt(m);var k=parseInt(f)+parseInt(m);if(p!=""){var c="<?php echo base_url()?>uploaded_pdf/new_frames/split_frame/";+$("div.main_frame").css("background",'url("'+c+p+'")')}else{var c="<?php echo base_url()?>uploaded_pdf/new_frames/split_frame/332x395.jpg";+$("div.main_frame").css("background",'url("'+c+'")')}document.getElementById("fir_room").style.marginLeft=i+"px";document.getElementById("fir_room").style.width=j+"px";document.getElementById("fir_room").style.height=d+"px";document.getElementById("abc2").style.width=b+"px";document.getElementById("abc2").style.height=k+"px";document.getElementById("abc2").style.paddingTop=o+"px";document.getElementById("abc2").style.paddingLeft="2px";document.getElementById("change_frame").style.padding=g+"px";document.getElementById("abc2").style.backgroundColor=e;document.getElementById("new1").style.display="block";document.getElementById("fade").style.display="block"}function frame_detail(a){if(a==""){a=46}window.location.href="<?php echo base_url()?>frontend/frame_detail/"+a}function larger_image(){html2canvas([document.getElementById("frame-it")],{onrendered:function(b){var a=b.toDataURL();$.post("<?php echo base_url()?>frontend/save_frame",{data:a},function(c){window.location.href="<?php echo base_url()?>frontend/larger_image/"+c})}})}function save_value(b){var n=document.getElementById("frame_size").innerHTML;var e=document.getElementById("frame_price").innerHTML;var c=document.getElementById("mat1_price").innerHTML;var l=document.getElementById("total_price").innerHTML;var f=document.getElementById("print_price").innerHTML;var m=document.getElementById("acrylic_price").innerHTML;var j=document.getElementById("fitting_price").innerHTML;var i=document.getElementById("print_sizes").innerHTML;var a=document.getElementById("imag_id").value;var g=document.getElementById("frame_id").value;var k=document.getElementById("type").value;var d=document.getElementById("imag_name").value;var h="framewidth="+n+"&frameprice="+e+"&matprice="+c+"&printprice="+f+"&total="+l+"&imageid="+a+"&image_name="+b+"&frameid="+g+"&glassprice="+m+"&fittingprice="+j+"&printsize="+i+"&type="+k+"&image="+d;$.ajax({type:"POST",url:"<?php print base_url() ?>frontend/save_frame_details",data:h,success:function(o){window.location.href="<?php echo base_url()?>frontend/download_frame/"+b}})}function save_to_cart(){var b=document.getElementById("print_price").innerHTML;var d=document.getElementById("type").value;var f=document.getElementById("print_sizes").innerHTML;var a=document.getElementById("imag_id").value;var c=document.getElementById("imag_name").value;var e="printprice="+b+"&type="+d+"&printsize="+f+"&imageid="+a+"&imagename="+c;$.ajax({type:"POST",url:"<?php print base_url() ?>frontend/save_cart_details",data:e,success:function(g){window.location.href="<?php echo base_url()?>cart/cart_view"}})}/*]]>*/</script>
<head>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/image-large/jquery-1.10.1.min.js"></script>
<link href="<?=base_url()?>assets/css/frame-it-style.css" type="text/css" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link href="<?=base_url()?>assets/css/wallcolor.css" type="text/css"rel="stylesheet"/>
<input type="hidden" id="frame_rate">
<input type="hidden" id="mount_rate">
<input type="hidden" id="glass_rate">
<?php //echo $image_alignment;?>
<div id="new1" class="newid1">
<div align="right"> <a href="javascript:void(0)" onclick="document.getElementById('new1').style.display='none';document.getElementById('fade').style.display='none'">Close</a> </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> </tr>
<tr>
<div id="w" style="background:url(<?php echo base_url();?>assets/images/room-view.jpg) no-repeat top center;width:725px;height:500px;border:1px solid black">
<div id="icons" style="display:block;padding-top:30px;text-align:center">
<?php  $wid=$size_array[0]['width']/6 * 720/10;
                                                   $hig=$size_array[0]['height']/6*720/10;
                                                   $size_array[0]['width'];
                                                   //echo $img_details->images_filename;
                                          ?>
<input type="hidden" id="r_img_width_id" value="<?=$wid;?>">
<input type="hidden" id="r_img_height_id" value="<?=$hig;?>">
<div class="drag-iage" id="draggable">
<div class="main_frame" id="change_frame" style="margin-left:39%">
<div id="abc2">
<div id="fir_room">
<div id="fir1">
<div id="topa1">
<div id="fir2">
<div id="topa2"> <img src="<?='http://www.indiapicture.in/wallsnart/398/'.$img_details[0]['image_filename'];?>" class="drag-image" style="height:<?=$hig.'px';?>;width:<?=$wid.'px';?>"> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</tr>
</table>
</div>
<div id="large_image_dive" class="large_image_dive">
<div align="right"> <a href="javascript:void(0)" onclick="document.getElementById('large_image_dive').style.display='none';document.getElementById('fade').style.display='none'">Close</a> </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> </tr>
<tr>
<div id="w">
<div id="icons" style="width:80%;height:80%">
<input type="hidden" id="r_img_width_id" value="<?=$wid;?>">
<input type="hidden" id="r_img_height_id" value="<?=$hig;?>">
<div class="drag-iage" id="draggable">
<div class="main_frame" id="change_frame">
<div id="abc2">
<div id="fir_room">
<div id="fir1">
<div id="topa1">
<div id="fir2">
<div id="topa2"> <img src="http://indiapicture.in/wallsnart/1100/<?=$img_details[0]['image_filename'];?>" class="drag-image" style="height:100%;width:100%"> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</tr>
</table>
</div>
<? //$img_shape->shapes?>
<div class="main-container">
<div class="pagination" style="margin:0"> <span><a href="<?php print base_url();?>">Home</a> > Frame It </span> </div>
<div class="decorative">
<div class="frame-it-wrapper" style="width:auto">
<div class="frame-it-main" style="max-height:590px;width:820px" <?php if ($img_shape->shapes=='Slim'){ ?> <?php }?>>
<?php  
    //echo $mount_list9->framenmount_colour;
    if ($img_shape->shapes=='Vertical' or $img_shape->shapes=='Slim'){ ?>
<div class="divimg main" id="frame-it" style="margin-top:20px">
<? } else {?>
<div class="divimg mainhor" id="frame-it" style="margin-top:20px">
<?php }?>
<div id="abc">
<div id="fir">
<div id="fir1">
<div id="topa1">
<div id="fir2">
<div id="topa2"> <a href="http://www.indiapicture.in/wallsnart/1100/<?php print $img_details[0]['image_filename'];?>" id="demo2" class="imglink">
<?php if ($img_shape->shapes=='Slim'){?>
<img src="<?='http://www.indiapicture.in/wallsnart/398/'.$img_details[0]['image_filename'];?>" alt="frame" width="140" height="381" />
<?php }elseif ($img_shape->shapes=='Horizontal' ){?>
<img src="<?='http://www.indiapicture.in/wallsnart/398/'.$img_details[0]['image_filename'];?>" alt="frame" width="376" height="250" />
<?php }else if ($img_shape->shapes=='Vertical' ){?>
<img src="<?='http://www.indiapicture.in/wallsnart/398/'.$img_details[0]['image_filename'];?>" alt="frame" style="width:100%" height="380" />
<?php }else if ($img_shape->shapes=='Square'){?>
<img src="<?='http://www.indiapicture.in/wallsnart/398/'.$img_details[0]['image_filename'];?>" alt="frame" width="261" height="260" />
<?php }else if ($img_shape->shapes=='Panoramic' ){?>
<img src="<?='http://www.indiapicture.in/wallsnart/398/'.$img_details[0]['image_filename'];?>" alt="frame" width="381" height="140" />
<?php }?>
<input type="hidden" value="<?php print $img_details[0]['image_id'];?>" id="imag_id"/>
<input type="hidden" id="frame_id"/>
<input type="hidden" name="extrawidth" id="extrawidth">
<input type="hidden" name="frame_it_price" id="frame_it_price">
<input type="hidden" name="frame_it_width" id="frame_it_width">
<input type="hidden" name="mount_it_width" id="mount_it_width">
<input type="hidden" name="type" id="type" value="<?php echo urldecode($this->uri->segment(4));?>">
<input type="hidden" name="imag_name" id="imag_name" value="<?php echo urldecode($this->uri->segment(7));?>">
</a> </div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="otherlinks"> <a id="large" alt="Single Image" href="javascript:" onclick="large_images('<?php echo $comps['0'];?>','<?php echo $mount_list9->framenmount_sale_price;?>','<?php echo $mount_list9->framenmount_colour;?>')"> Larger Image</a>| <a href="javascript:" target="_black" onClick="room_view('<?php echo $comps['0'];?>','<?php echo $mount_list9->framenmount_sale_price;?>','<?php echo $mount_list9->framenmount_colour;?>')">Room View</a>
</div>
</div>
<div class="frame-it-right-panel" style="width:auto">
<div class="hdr"><?php echo substr($img_details->images_caption,0,19)." "?> </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><strong> Print only </strong></td>
<td>&nbsp;</td>
<td align="right"><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><strong><span id="print_price"><?php echo $price;?></span></strong></td>
</tr>
<tr>
<td><strong>Print Size:</strong></td>
<td>&nbsp;</td>
<td align="right" id="print_sizes"><?php echo $size; ?>
<input type="hidden" id="print_h_w" value="<?=$size?>">
</td>
</tr>
<tr>
<td><strong>Frame Size:</strong></td>
<td>&nbsp;</td>
<td align="right" id="frame_size">.75 &quot;</td>
</tr>
<input type="hidden" id="print_mount_size" value="">
<input type="hidden" id="print_frame_size" value="">
<?php 
            
        $split= explode("X",$size);
        $height = $split[0];
        $width=$split[1];
        $newwidth=$width+1+6;
        $newlenght=$height+1+6;
        $newarea=$width+(0.5*2)*$height+(0.5*2);
        $new=$newwidth*2+$newlenght*2;
        $cost=$new*5;
          //echo $glass_rate; 
        $newwidth1=$width+(1.5*2);
        $newlenght1=$height+(1.5 *2);
        $matcost=$newwidth1*$newlenght1*$mount_rate;
         $mountArea=$newwidth1*$newlenght1;
        $frameAera = ($newwidth1+.75*2) * ($newlenght1+(.75*2));
        $FrameCost=($frameAera)/(12)*$frame_rate;//rate 2
        $glasscost=$newwidth1*$newlenght1*$glass_rate;
       
          $glasscost;
       

         
         
      ?>
<input type="hidden" id="glass_coste" value="<?=$glasscost?>">
<input type="hidden" id="glass" value="Normal">
<input type="hidden" id="mat1_color" value="Gray">
<input type="hidden" id="mat1_size" value="<?='1.5';?>">
<input type="hidden" id="frame_color" value="Black">
<input type="hidden" id="fat_frame" value=".75">
<input type="hidden" id="image_id" value="<?=$img_details->images_id;?>">
<input type="hidden" id="images_price" value="<?=$price;?>">
<input type="hidden" id="imagsTypes" value="<?=$imagsTypes;?>">
<input type="hidden" id="user_id" value="<?=$userid;?>">
<input type="hidden" id="print_height" value="<?=$height?>">
<input type="hidden" id="print_width" value="<?=$width?>">
<tr>
<td><strong>Frame Color:</strong></td>
<td>&nbsp;</td>
<td align="right"><strong><span id="f_color">Black</span></strong></td>
</tr>
<tr>
<td><strong>Frame Cost:</strong></td>
<td>&nbsp;</td>
<td align="right"><strong><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><span id="FrameCost"><?php echo round($FrameCost,2)?> </span></strong></td>
</tr>
<tr>
<td><strong>Mount Size:</strong></td>
<td>&nbsp;</td>
<td align="right" id="mount_size">1.5&quot;</td>
</tr>
<tr>
<td><strong>Mount Color:</strong></td>
<td>&nbsp;</td>
<td align="right"><strong><span id="mount_color">Gray</span></strong></td>
</tr>
<tr>
<td><strong>Mount Cost:</strong></td>
<td>&nbsp;</td>
<td align="right"><strong><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><span id="MountCost"><?php echo $matcost?></span></strong></td>
</tr>
<tr>
<td><strong>Glass Type:</strong>
<br />
<span id="glass_type">Normal</span>
</td>
<td>&nbsp;</td>
<td align="right"><strong><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><span id="glass_price"><?php echo $glasscost?> </span></strong></td>
</tr>
<?php
      
      ?>
<input type="hidden" id="fitting_price" value="<?=$filting_price?>">
<?php 
    $total_price=$price+$matcost+$FrameCost+$glasscost;
    ?>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr style="color:#d3131b">
<td colspan="2" style="border-top:1px solid #d3131b"><strong>Total Price</strong></td>
<td align="right" style="border-top:1px solid #d3131b"><strong><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><span id="total_price"><?= round($total_price, 2);?></span></strong></td>
</tr>
</table>
<a <?php if(!$this->session->userdata('userid')){ ?> href="javascript:changeview(1)" onclick="document.getElementById('mailid').style.display='block';document.getElementById('fade').style.display='block'" <?php }else{?>href="javascript:;" onclick="capture()" <?php }?>class="buyit">Buy It Framed</a>
<form id="frame_section" name="frame_section" action="<?php echo base_url()?>frontend/frame_section" method="POST" enctype="multipart/form-data">
<input type="hidden" name="img_val" id="img_val" value="" />
</form>
<a <?php if(!$this->session->userdata('userid')){ ?> href="javascript:changeview(1)" onclick="document.getElementById('mailid').style.display='block';document.getElementById('fade').style.display='block'" <?php }else{?>href="javascript:;" onclick="save_to_cart()" <?php }?>class="buyprint">Buy Print Only</a>
<div class="view"> Views Saved: 0</div>
<br>
<div class="view"> <a style="width:auto;margin:0;padding:6px 8px;background:#d3131b;color:#fff;text-decoration:none!important" <?php   if(!$this->session->userdata('userid')){?> href="javascript:void(0)" onclick="login('')" <?php }else{?> href="!#" onclick="return frame_it_addtocart()" <?php  }?>>Add to Cart</a> <span class="view"><a style="width:auto;margin:0;padding:6px 8px;background:#d3131b;color:#fff;text-decoration:none!important">SAVE TO GALLERY</a></span> </div>
</div>
<br/>
<br/>
<br/>
<br/>
<div class="tabs-wrapper" <?php if ($img_shape->shapes=='Slim' || $img_shape->shapes=='Vertical'){ ?> style="margin-top:116px" <?php }?>>
<div class="undo-restore"><a href="javascript:" onclick="undoinput()" id="btnUndo"><img src="<?=base_url()?>assets/images/frameit/undo.gif" width="67" height="19" alt="undo" /></a><a href="javascript:" onclick="redo()" id="btnRedo"><img src="<?=base_url()?>assets/images/frameit/restore.gif" width="119" height="19" alt="restore" /></a></div>
<ul id="tabs">
<li><a href="#" name="tab7" id="fr1">FRAMES </a></li>
<li><a href="javascript:onc" onClick="hide();show_mat(document.getElementById('mat1'))" name="tab8" id="ma1">Mount</a></li>
<li><a href="#" name="tab3" id="ac1">Glass</a></li>
<li><a href="#" name="tab5" id="wa1">Wall Color frames </a></li>
</ul>
<div id="content">
<div id="tab7" style="display:block">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="180"><h4 class="choose-colors"> Choose by color </h4>
<ul class="choose-colors-type">
<li><a href="javascript:" onClick="hideAll();showTable(document.getElementById('black'));get_frame_rate('Absolute')">Black</a></li>
<li><a href="javascript:"onclick="hideAll();showTable(document.getElementById('white'));get_frame_rate('Frosty')">White</a></li>
<li><a href="javascript:" onClick="hideAll();showTable(document.getElementById('popular'));get_frame_rate('Teak')">Brown</a></li>
</ul>
<h4 class="choose-colors"> Choose by Size </h4>
<ul class="choose-colors-type">
<li><a href="javascript:" onClick="Frame_Size(.75);change_mount(document.getElementById('print_mount_size').value)">Size&nbsp;(0.75")</a></li>
</ul></td>
<td><table border="0" cellspacing="0" cellpadding="4" class="frametype-table" id="popular">
<tr>
<?php
		     $this->load->model('frontend_model');
		     $d1=$this->frontend_model->get_frames_compo();
                $frame_id=$d1->frame_id;
                   $did=count($d1);
		        for($i=0;$i<$did;$i++){
                     $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                    $coms=explode(",",$d1[$i]->frame_upload_image_name);

                   // $area=$width+$width+$height+$height;
                    //$price1=$area*$price->framenmount_sale_price;
                    //$pricetotal=round($price1/12);
		if($price->framenmount_colour=='Dark Brown')
                {
                    ?>
<td><a href="javascript:" id="deemed<?php echo $i;?>" onClick="myfun('<?php echo $coms[0];?>','<?php echo $d1[$i]->frame_width .' X '.$d1[$i]->frame_thickness ;?>','<?php echo $price->framenmount_sale_price;?>','<?php echo $price->framenmount_colour?>','<?php echo $d1[$i]->frame_id?>','<?php echo $d1[$i]->frame_width?>','<?php echo $width ?>','<?php echo $height;?>','<?php echo $img_shape->shapes;?>')"><img src="<?php echo base_url()?>uploaded_pdf/new_frames/_frames/<?php echo $coms[0];?>" width="100px" height="100px"/></a> </td>
<?php }}?>
</tr>
<tr>
<?php
                $this->load->model('frontend_model');
                $d1=$this->frontend_model->get_frames_compo();
                $frame_id4=$d1->frame_id;
                $did=count($d1);
                for($i=0;$i<$did;$i++){
                    $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                    $coms=explode(",",$d1[$i]->frame_upload_image_name);
                if($price->framenmount_colour=='Dark Brown')
                {
                    ?>
<td><a href="<?php echo base_url();?>frontend/frame_detail/<?php echo $d1[$i]->frame_id;?>" class="help"><?php echo $price->framenmount_colour?></a></td>
<?}}?>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="4" class="frametype-table" id="black" style="display:none">
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_black_compo();
                    $frame_id1=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);
                        $area=$width+$width+$height+$height;
                        $price1=$area*$price->framenmount_sale_price;
                        $pricetotal=round($price1/12);
                        ?>
<td><a href="javascript:" id="deemed<?php echo $i;?>" onClick="myfun('<?php echo $coms[0];?>','<?php echo $d1[$i]->frame_width.'X'.$d1[$i]->frame_thickness ;?>','<?php echo  $price->framenmount_sale_price;?>','<?php echo $price->framenmount_colour?>','<?php echo $d1[$i]->frame_id?>','<?php echo $d1[$i]->frame_width?>','<?php echo $width ;?>','<?php echo $height;?>','<?php echo $img_shape->shapes;?>')"><img src="<?php echo base_url()?>uploaded_pdf/new_frames/_frames/<?php echo $coms[0];?>" width="100px" height="100px"/></a></td>
<?php   }?>
</tr>
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_black_compo();
                    $frame_id4=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);

                        ?>
<td><a href="<?php echo base_url();?>frontend/frame_detail/<?php echo $d1[$i]->frame_id;?>"><?php echo $price->framenmount_colour?></a></td>
<?}?>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="4" class="frametype-table" id="gray" style="display:none">
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_gray_compo();
                    $frame_id2=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);

                        $area=$width+$width+$lenght+$lenght;
                        $price1=$area*$price->framenmount_sale_price;
                        $pricetotal=round($price1/12);
                     ?>
<td><a href="javascript:" id="deemed<?php echo $i;?>" onClick="myfun('<?php echo $coms[0];?>','<?php echo $d1[$i]->frame_width.'X'.$d1[$i]->frame_thickness ;?>','<?php echo $price->framenmount_sale_price;?>','<?php echo $price->framenmount_colour?>','<?php echo $d1[$i]->frame_id?>','<?php echo $d1[$i]->frame_width?>','<?php echo $width ?>','<?php echo $height;?>','<?php echo $img_shape->shapes;?>')"><img src="<?php echo base_url()?>uploaded_pdf/<?php echo $coms[8];?>" width="100px" height="100px"/></a></td>
<?php   }?>
</tr>
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_gray_compo();
                    $frame_id4=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);

                        ?>
<td><a href="<?php echo base_url();?>frontend/frame_detail/<?php echo $coms[0];?>/<?php echo $price->framenmount_colour?>/"><?php echo $price->framenmount_colour?></a></td>
<?}?>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="4" class="frametype-table" id="blue" style="display:none">
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_blue_compo();
                    $frame_id3=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);
                        ?>
<td><a href="javascript:" id="deemed<?php echo $i;?>" onClick="myfun('<?php echo $coms[0];?>','<?php echo $d1[$i]->frame_width .'X'.$d1[$i]->frame_thickness ;?>','<?php echo $price->framenmount_sale_price;?>','<?php echo $price->framenmount_colour?>','<?php echo $d1[$i]->frame_id?>','<?php echo $d1[$i]->frame_width?>','<?php echo $width ?>','<?php echo $height?>','<?php echo $img_shape->shapes;?>')"><img src="<?php echo base_url()?>uploaded_pdf/new_frames/_frames/<?php echo $coms[0];?>" width="100px" height="100px"/></a></td>
<?php   }?>
</tr>
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_blue_compo();
                    $frame_id4=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);

                        ?>
<td><a href="<?php echo base_url();?>frontend/frame_detail/<?php echo $d1[$i]->frame_id;?>"><?php echo $price->framenmount_colour?></a></td>
<?}?>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="4" class="frametype-table" id="white" style="display:none">
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_white_compo();
                    $frame_id4=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);

                        $area=$width+$width+$lenght+$lenght;
                        $price1=$area*$price->framenmount_sale_price;
                        $pricetotal=round($price1/12);
                        ?>
<td><a href="javascript:" id="deemed<?php echo $i;?>" onClick="myfun('<?php echo $coms[0];?>','<?php echo $d1[$i]->frame_width .'X'.$d1[$i]->frame_thickness ;?>','<?php echo $price->framenmount_sale_price;?>','<?php echo $price->framenmount_colour?>','<?php echo $d1[$i]->frame_id?>','<?php echo $d1[$i]->frame_width?>','<?php echo $width ?>','<?php echo $height;?>','<?php echo $img_shape->shapes;?>')"><img src="<?php echo base_url()?>uploaded_pdf/new_frames/_frames/<?php echo $coms[0];?>" width="100px" height="100px"/></a></td>
<?php  }?>
</tr>
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_white_compo();
                    $frame_id4=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);
                    ?>
<td><a href="<?php echo base_url();?>frontend/frame_detail/<?php echo $d1[$i]->frame_id;?>"><?php echo $price->framenmount_colour?></a></td>
<?}?>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="4" class="frametype-table" id="yellow" style="display:none">
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_yellow_compo();
                    $frame_id5=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);

                        $area=$width+$width+$lenght+$lenght;
                        $price1=$area*$price->framenmount_sale_price;
                        $pricetotal=round($price1/12);
                        ?>
<td><a href="javascript:" id="deemed<?php echo $i;?>" onClick="myfun('<?php echo $coms[0];?>','<?php echo $d1[$i]->frame_width .'X'.$d1[$i]->frame_thickness ;?>','<?php echo $price->framenmount_sale_price;?>','<?php echo $price->framenmount_colour?>','<?php echo $d1[$i]->frame_id?>','<?php echo $d1[$i]->frame_width?>','<?php echo $width ?>','<?php echo $height;?>','<?php echo $img_shape->shapes;?>')"><img src="<?php echo base_url()?>uploaded_pdf/new_frames/_frames/<?php echo $coms[0];?>" width="100px" height="100px"/></a></td>
<?php  }?>
</tr>
<tr>
<?php
                    $this->load->model('frontend_model');
                    $d1=$this->frontend_model->get_frames_yellow_compo();
                    $frame_id4=$d1->frame_id;
                    $did=count($d1);
                    for($i=0;$i<$did;$i++){
                        $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                        $coms=explode(",",$d1[$i]->frame_upload_image_name);
                        ?>
<td><a href="<?php echo base_url();?>frontend/frame_detail/<?php echo $d1[$i]->frame_id;?>"><?php echo $price->framenmount_colour?></a></td>
<?}?>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="4" class="frametype-table" id="gold" style="display:none">
<tr>
<?php
                  $this->load->model('frontend_model');
                  $d1=$this->frontend_model->get_frames_gold_compo();
                  $frame_id5=$d1->frame_id;
                  $did=count($d1);
                  for($i=0;$i<$did;$i++){
                      $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                      $coms=explode(",",$d1[$i]->frame_upload_image_name);

                      $area=$width+$width+$lenght+$lenght;
                      $price1=$area*$price->framenmount_sale_price;
                      $pricetotal=round($price1/12);
                      ?>
<td><a href="javascript:" id="deemed<?php echo $i;?>" onClick="myfun('<?php echo $coms[0];?>','<?php echo $d1[$i]->frame_width .'X'.$d1[$i]->frame_thickness ;?>','<?php echo $price->framenmount_sale_price;?>','<?php echo $price->framenmount_colour?>','<?php echo $d1[$i]->frame_id?>','<?php echo $d1[$i]->frame_width?>','<?php echo $width ?>','<?php echo $height;?>','<?php echo $img_shape->shapes;?>')"><img src="<?php echo base_url()?>uploaded_pdf/new_frames/_frames/<?php echo $coms[0];?>" width="100px" height="100px"/></a></td>
<?php  }?>
</tr>
<tr>
<?php
                  $this->load->model('frontend_model');
                  $d1=$this->frontend_model->get_frames_gold_compo();
                  $frame_id4=$d1->frame_id;
                  $did=count($d1);
                  for($i=0;$i<$did;$i++){
                      $price=$this->frontend_model->get_framenmount_price($d1[$i]->frame_code);
                      $coms=explode(",",$d1[$i]->frame_upload_image_name);
                      ?>
<td><a href="<?php echo base_url();?>frontend/frame_detail/<?php echo $d1[$i]->frame_id;?>"><?php echo $price->framenmount_colour?></a></td>
<?}?>
</tr>
</table></td>
<td>
</td>
</tr>
</table>
</div>
<style>.black_overlay{display:none;position:absolute;top:0;left:0;width:100%;height:100%;background-color:black;z-index:1001;-moz-opacity:.8;opacity:.10;filter:alpha(opacity=80)}.white_content{display:none;position:absolute;top:25%;left:25%;width:62%;height:34%;padding:16px;border:4px solid orange;background-color:white;z-index:1002;overflow:hidden}.close{float:right;padding-bottom:30px}</style>
<div id="light" class="white_content"> <a href="javascript:void(0)" class="close" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">X</a>
<table class="show_mat_size_box">
<?php
$count=1;
for($i=0.50;$i<=6.00;$i=$i+0.50)
{ 
    //echo $i;
    if($count==0) 
    {echo '<tr>';}
        
echo '<td style="width: 27px;">|<a href="javascript:;"  onclick="javascript:change_mount('.$i.')">'.number_format((float)$i, 2, '.', '').'</a>|&nbsp;&nbsp;&nbsp;&nbsp;</td>';
    if($count==26)
    {
        $count=0;
echo '</tr>';
    }
$count++;

} // end loop  ?>
</table>
</div>
<div id="fade" class="black_overlay"></div>
<div id="tab8" style="display:none">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mat-types-table">
<h4 class="choose-colors"> CHOOSE BY COLOR: </h4>
<tr>
<td width="240"><table border="0" cellpadding="4" cellspacing="0" style="margin:auto;display:block" class="bor" id="mat1">
<tbody>
<tr>
<td><a href="javascript:" class="color256" onClick="change_color('1366698318_MG_7535.png','0.00',' Aqua ')">
</a></td>
<td><a href="javascript:" class="color3" onClick="change_color('1366698318_MG_7535.png','160.00','White ')">
</a></td>
<td><a href="javascript:" class="color318" onClick="change_color('1366698318_MG_7535.png','160.00','Black ')">
</a></td>
<td><a href="javascript:" class="color80" onClick="change_color('1366698318_MG_7535.png','160.00','Red ')">
</a></td>
<td><a href="javascript:" class="color112" onClick="change_color('1366698318_MG_7535.png','160.00','Pink ')">
</a></td>
<td><a href="javascript:" class="color24" onClick="change_color('1366698318_MG_7535.png','160.00','DarkGreen ')">
</a></td>
<td><a href="javascript:" class="color106" onClick="change_color('1366698318_MG_7535.png','160.00','Brown ')"></a></td>
<td><a href="javascript:" class="color306" onClick="change_color('1366698318_MG_7535.png','160.00','Gray ')"></a></td>
<td><a href="javascript:" class="color22" onClick="change_color('1366698318_MG_7535.png','160.00','Gold ')"></a></td>
</tr>
</tbody>
</table>
<h4 class="choose-colors"> Select Width: </h4>
<select onChange="return change_mount(this.value)" style="padding:10px;width:200px">
<option value="0">--Select--</option>
<? for($i=0.50;$i<=6.00;$i=$i+0.50)
	{ 
   ?>
<option value="<?=$i?>"><b>
<?=$i?>
"</b></option>
<? }?>
</select>
<table>
<tr>
<td><a href="javascript:" class="color256" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list->framenmount_sale_price;?>','<?php echo $mount_list->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color3" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list3->framenmount_sale_price;?>','<?php echo $mount_list3->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color318" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list4->framenmount_sale_price;?>','<?php echo $mount_list4->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color80" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list5->framenmount_sale_price;?>','<?php echo $mount_list5->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color112" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list6->framenmount_sale_price;?>','<?php echo $mount_list6->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color24" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list7->framenmount_sale_price;?>','<?php echo $mount_list7->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color106" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list8->framenmount_sale_price;?>','<?php echo $mount_list8->framenmount_colour;?>')"></a></td>
<td><a href="javascript:" class="color306" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list9->framenmount_sale_price;?>','<?php echo $mount_list9->framenmount_colour;?>')"></a></td>
<td><a href="javascript:" class="color22" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list10->framenmount_sale_price;?>','<?php echo $mount_list10->framenmount_colour;?>')"></a></td>
</tr>
</table>
<table width="50%" border="0" cellpadding="4" cellspacing="0" style="margin:auto" class="bor" id="mat2" style="display:none;">
<tr>
<td><a href="javascript:" class="color256" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list->framenmount_sale_price;?>','<?php echo $mount_list->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color36" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list1->framenmount_sale_price;?>','<?php echo $mount_list1->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color36" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list2->framenmount_sale_price;?>','<?php echo $mount_list2->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color3" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list3->framenmount_sale_price;?>','<?php echo $mount_list3->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color318" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list4->framenmount_sale_price;?>','<?php echo $mount_list4->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color80" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list5->framenmount_sale_price;?>','<?php echo $mount_list5->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color112" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list6->framenmount_sale_price;?>','<?php echo $mount_list6->framenmount_colour;?>')">
</a></td>
<td><a href="javascript:" class="color24" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list7->framenmount_sale_price;?>','<?php echo $mount_list7->framenmount_colour;?>')">
</a></td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<div id="tab3" style="display:none">
<form>
<table width="100%" border="0" cellspacing="0" cellpadding="4" class="acrylic-table">
<tr>
<h4 class="choose-colors"> Normal Glass </h4>
<ul>
<li>
Protect prints from protects dust and scratches
<span style="padding-left:100px"> <input name="glass" type="radio" id="arcylic" checked="" data-name="Normal" class="glass"/>
Normal Glass </span>
</li>
</ul>
<h4 class="choose-colors"> Acrylic Glass </h4>
<ul>
<li> Lightweight, Transparent, Shatter- resistance
<span style="padding-left:110px"> <input name="glass" type="radio" data-name="Acrylic" value="Acrylic" class="glass"/>Acrylic Glass </span>
</li>
</ul>
</tr>
</table>
<tr>
<td>&nbsp;</td>
<td align="center">&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</div>
<div id="tab4" style="display:none">
<table width="70%" border="0" align="center" cellpadding="4" cellspacing="0" class="crop-table">
<tr>
<td height="30" colspan="2" align="center" bgcolor="#f0f0f0">Crop the borders of your print</td>
<td bgcolor="#F0F0F0">&nbsp;</td>
</tr>
<tr>
<td width="150" align="center"><img src="<?=base_url()?>assets/images/frameit/no-crop.jpg" width="139" height="136" alt="no crop" /></td>
<td width="150" align="center"><img src="<?=base_url()?>assets/images/frameit/default-crop.jpg" width="139" height="136" alt="def" /></td>
<td>For a more refined look, crop the borders of<br />
your print and add a mat.</td>
</tr>
</table>
</div>
<div id="tab5" style="display:none">
<table class="bor">
<tr>
<td><a href="javascript:" class="color1" onClick="javascript:change_wallcolor('#FFFBF8')"></a></td>
<td><a href="javascript:" class="color2" onClick="javascript:change_wallcolor('#FFFCF7')"></a></td>
<td><a href="javascript:" class="color3" onClick="javascript:change_wallcolor('#FFFFFF')"></a></td>
<td><a href="javascript:" class="color4" onClick="javascript:change_wallcolor('#F7FFFF')"></a></td>
<td><a href="javascript:" class="color5" onClick="javascript:change_wallcolor('#F7F4FF')"></a></td>
<td><a href="javascript:" class="color6" onClick="javascript:change_wallcolor('#FEF7FF')"></a></td>
<td><a href="javascript:" class="color7" onClick="javascript:change_wallcolor('#FFF7F6')"></a></td>
<td><a href="javascript:" class="color8" onClick="javascript:change_wallcolor('#FFFBFF')"></a></td>
<td><a href="javascript:" class="color9" onClick="javascript:change_wallcolor('#EDDFF0')"></a></td>
<td><a href="javascript:" class="color10" onClick="javascript:change_wallcolor('#F0DFEF')"></a></td>
<td><a href="javascript:" class="color11" onClick="javascript:change_wallcolor('#FFDAEF')"></a></td>
<td><a href="javascript:" class="color12" onClick="javascript:change_wallcolor('#FFDBE7')"></a></td>
<td><a href="javascript:" class="color13" onClick="javascript:change_wallcolor('#F0DFEF')"></a></td>
<td><a href="javascript:" class="color14" onClick="javascript:change_wallcolor('#FFDAE7')"></a></td>
<td><a href="javascript:" class="color15" onClick="javascript:change_wallcolor('#DCE8F4')"></a></td>
<td><a href="javascript:" class="color16" onClick="javascript:change_wallcolor('#DFE6F8')"></a></td>
<td><a href="javascript:" class="color17" onClick="javascript:change_wallcolor('#BDB76B')"></a></td>
<td><a href="javascript:" class="color18" onClick="javascript:change_wallcolor('#FF8C00')"></a></td>
<td><a href="javascript:" class="color19" onClick="javascript:change_wallcolor('#9932CC')"></a></td>
<td><a href="javascript:" class="color20" onClick="javascript:change_wallcolor('#E9967A')"></a></td>
<td><a href="javascript:" class="color21" onClick="javascript:change_wallcolor('#8FBC8F')"></a></td>
<td><a href="javascript:" class="color22" onClick="javascript:change_wallcolor('#FFD700')"></a></td>
<td><a href="javascript:" class="color23" onClick="javascript:change_wallcolor('#DAA520')"></a></td>
<td><a href="javascript:" class="color24" onClick="javascript:change_wallcolor('#008000')"></a></td>
<td><a href="javascript:" class="color25" onClick="javascript:change_wallcolor('#ADFF2F')"></a></td>
<td><a href="javascript:" class="color26" onClick="javascript:change_wallcolor('#FF69B4')"></a></td>
<td><a href="javascript:" class="color27" onClick="javascript:change_wallcolor('#CD5C5C')"></a></td>
<td><a href="javascript:" class="color28" onClick="javascript:change_wallcolor('#FFFFF0')"></a></td>
<td><a href="javascript:" class="color29" onClick="javascript:change_wallcolor('#F0E68C')"></a></td>
<td><a href="javascript:" class="color30" onClick="javascript:change_wallcolor('#E6E6FA')"></a></td>
<td><a href="javascript:" class="color31" onClick="javascript:change_wallcolor('#FFF0F5')"></a></td>
<td><a href="javascript:" class="color32" onClick="javascript:change_wallcolor('#7CFC00')"></a></td>
<td><a href="javascript:" class="color33" onClick="javascript:change_wallcolor('#FFFACD')"></a></td>
<td><a href="javascript:" class="color34" onClick="javascript:change_wallcolor('#ADD8E6')"></a></td>
<td><a href="javascript:" class="color35" onClick="javascript:change_wallcolor('#F08080')"></a></td>
<td><a href="javascript:" class="color36" onClick="javascript:change_wallcolor('#E0FFFF')"></a></td>
<td><a href="javascript:" class="color37" onClick="javascript:change_wallcolor('#FAFAD2')"></a></td>
<td><a href="javascript:" class="color38" onClick="javascript:change_wallcolor('#D3D3D3')"></a></td>
<td><a href="javascript:" class="color39" onClick="javascript:change_wallcolor('#90EE90')"></a></td>
<td><a href="javascript:" class="color40" onClick="javascript:change_wallcolor('#FFB6C1')"></a></td>
<td><a href="javascript:" class="color41" onClick="javascript:change_wallcolor('#FFA07A')"></a></td>
<td><a href="javascript:" class="color42" onClick="javascript:change_wallcolor('#20B2AA')"></a></td>
<td><a href="javascript:" class="color43" onClick="javascript:change_wallcolor('#87CEFA')"></a></td>
<td><a href="javascript:" class="color44" onClick="javascript:change_wallcolor('#778899')"></a></td>
<td><a href="javascript:" class="color45" onClick="javascript:change_wallcolor('#B0C4DE')"></a></td>
<td><a href="javascript:" class="color46" onClick="javascript:change_wallcolor('#FFFFE0')"></a></td>
<td><a href="javascript:" class="color47" onClick="javascript:change_wallcolor('#00FF00')"></a></td>
<td><a href="javascript:" class="color48" onClick="javascript:change_wallcolor('#32CD32')"></a></td>
<td><a href="javascript:" class="color49" onClick="javascript:change_wallcolor('#FAF0E6')"></a></td>
<td><a href="javascript:" class="color50" onClick="javascript:change_wallcolor('#FF00FF')"></a></td>
<td><a href="javascript:" class="color51" onClick="javascript:change_wallcolor('#66CDAA')"></a></td>
<td><a href="javascript:" class="color52" onClick="javascript:change_wallcolor('#BA55D3')"></a></td>
<td><a href="javascript:" class="color53" onClick="javascript:change_wallcolor('#9370DB')"></a></td>
</tr>
<tr>
<td><a href="javascript:" class="color54" onClick="javascript:change_wallcolor('#3CB371')"></a></td>
<td><a href="javascript:" class="color55" onClick="javascript:change_wallcolor('#7B68EE')"></a></td>
<td><a href="javascript:"class="color56" onClick="javascript:change_wallcolor('#00FA9A')"></a></td>
<td><a href="javascript:" class="color57" onClick="javascript:change_wallcolor('#48D1CC')"></a></td>
<td><a href="javascript:" class="color58" onClick="javascript:change_wallcolor('#C71585')"></a></td>
<td><a href="javascript:" class="color59" onClick="javascript:change_wallcolor('#191970')"></a></td>
<td><a href="javascript:" class="color60" onClick="javascript:change_wallcolor('#F5FFFA')"></a></td>
<td><a href="javascript:" class="color61" onClick="javascript:change_wallcolor('#FFE4E1')"></a></td>
<td><a href="javascript:" class="color62" onClick="javascript:change_wallcolor('#FFE4B5')"></a></td>
<td><a href="javascript:" class="color63" onClick="javascript:change_wallcolor('#FFDEAD')"></a></td>
<td><a href="javascript:" class="color64" onClick="javascript:change_wallcolor('#FDF5E6')"></a></td>
<td><a href="javascript:" class="color65" onClick="javascript:change_wallcolor('#808000')"></a></td>
<td><a href="javascript:" class="color66" onClick="javascript:change_wallcolor('#6B8E23')"></a></td>
<td><a href="javascript:" class="color67" onClick="javascript:change_wallcolor('#FFA500')"></a></td>
<td><a href="javascript:" class="color68" onClick="javascript:change_wallcolor('#FF4500')"></a></td>
<td><a href="javascript:" class="color69" onClick="javascript:change_wallcolor('#DA70D6')"></a></td>
<td><a href="javascript:" class="color70" onClick="javascript:change_wallcolor('#EEE8AA')"></a></td>
<td><a href="javascript:" class="color71" onClick="javascript:change_wallcolor('#98FB98')"></a></td>
<td><a href="javascript:" class="color72" onClick="javascript:change_wallcolor('#AFEEEE')"></a></td>
<td><a href="javascript:" class="color73" onClick="javascript:change_wallcolor('#DB7093')"></a></td>
<td><a href="javascript:" class="color74" onClick="javascript:change_wallcolor('#FFEFD5')"></a></td>
<td><a href="javascript:" class="color75" onClick="javascript:change_wallcolor('#FFDAB9')"></a></td>
<td><a href="javascript:" class="color76" onClick="javascript:change_wallcolor('#CD853F')"></a></td>
<td><a href="javascript:" class="color77" onClick="javascript:change_wallcolor('#FFC0CB')"></a></td>
<td><a href="javascript:" class="color78" onClick="javascript:change_wallcolor('#DDA0DD')"></a></td>
<td><a href="javascript:" class="color79" onClick="javascript:change_wallcolor('#B0E0E6')"></a></td>
<td><a href="javascript:" class="color80" onClick="javascript:change_wallcolor('#FF0000')"></a></td>
<td><a href="javascript:" class="color81" onClick="javascript:change_wallcolor('#FFC0CB')"></a></td>
<td><a href="javascript:" class="color82" onClick="javascript:change_wallcolor('#BC8F8F')"></a></td>
<td><a href="javascript:" class="color83" onClick="javascript:change_wallcolor('#4169E1')"></a></td>
<td><a href="javascript:" class="color84" onClick="javascript:change_wallcolor('#8B4513')"></a></td>
<td><a href="javascript:" class="color85" onClick="javascript:change_wallcolor('#FA8072')"></a></td>
<td><a href="javascript:" class="color86" onClick="javascript:change_wallcolor('#F4A460')"></a></td>
<td><a href="javascript:" class="color87" onClick="javascript:change_wallcolor('#2E8B57')"></a></td>
<td><a href="javascript:" class="color88" onClick="javascript:change_wallcolor('#FFF5EE')"></a></td>
<td><a href="javascript:" class="color89" onClick="javascript:change_wallcolor('#A0522D')"></a></td>
<td><a href="javascript:" class="color90" onClick="javascript:change_wallcolor('#C0C0C0')"></a></td>
<td><a href="javascript:" class="color91" onClick="javascript:change_wallcolor('#87CEEB')"></a></td>
<td><a href="javascript:" class="color92" onClick="javascript:change_wallcolor('#6A5ACD')"></a></td>
<td><a href="javascript:" class="color93" onClick="javascript:change_wallcolor('#708090')"></a></td>
<td><a href="javascript:" class="color94" onClick="javascript:change_wallcolor('#00FF7F')"></a></td>
<td><a href="javascript:" class="color95" onClick="javascript:change_wallcolor('#D2B48C')"></a></td>
<td><a href="javascript:" class="color96" onClick="javascript:change_wallcolor('#008080')"></a></td>
<td><a href="javascript:" class="color97" onClick="javascript:change_wallcolor('#D8BFD8')"></a></td>
<td><a href="javascript:" class="color98" onClick="javascript:change_wallcolor('#FF6347')"></a></td>
<td><a href="javascript:" class="color99" onClick="javascript:change_wallcolor('#40E0D0')"></a></td>
<td><a href="javascript:" class="color100" onClick="javascript:change_wallcolor('#EE82EE')"></a></td>
<td><a href="javascript:" class="color101" onClick="javascript:change_wallcolor('#F5DEB3')"></a></td>
<td><a href="javascript:" class="color102" onClick="javascript:change_wallcolor('#FFFFFF')"></a></td>
<td><a href="javascript:" class="color103" onClick="javascript:change_wallcolor('#F5F5F5')"></a></td>
<td><a href="javascript:" class="color104" onClick="javascript:change_wallcolor('#FFFF00')"></a></td>
<td><a href="javascript:" class="color105" onClick="javascript:change_wallcolor('#9ACD32')"></a></td>
<td><a href="javascript:" class="color106" onClick="javascript:change_wallcolor('#B0171F')"></a></td>
</tr>
<tr>
<td><a href="javascript:" class="color107" onClick="javascript:change_wallcolor('#DC143C')"></a></td>
<td><a href="javascript:" class="color108" onClick="javascript:change_wallcolor('#FFAEB9')"></a></td>
<td><a href="javascript:" class="color109" onClick="javascript:change_wallcolor('#EEA2AD')"></a></td>
<td><a href="javascript:" class="color110" onClick="javascript:change_wallcolor('#CD8C95')"></a></td>
<td><a href="javascript:" class="color111" onClick="javascript:change_wallcolor('#8B5F65')"></a></td>
<td><a href="javascript:" class="color112" onClick="javascript:change_wallcolor('#FFB5C5')"></a></td>
<td><a href="javascript:" class="color113" onClick="javascript:change_wallcolor('#EEA9B8')"></a></td>
<td><a href="javascript:" class="color114" onClick="javascript:change_wallcolor('#CD919E')"></a></td>
<td><a href="javascript:" class="color115" onClick="javascript:change_wallcolor('#8B636C')"></a></td>
<td><a href="javascript:" class="color116" onClick="javascript:change_wallcolor('#FF82AB')"></a></td>
<td><a href="javascript:" class="color117" onClick="javascript:change_wallcolor('#EE799F')"></a></td>
<td><a href="javascript:" class="color118" onClick="javascript:change_wallcolor('#CD6889')"></a></td>
<td><a href="javascript:" class="color119" onClick="javascript:change_wallcolor('#8B475D')"></a></td>
<td><a href="javascript:" class="color120" onClick="javascript:change_wallcolor('#EEE0E5')"></a></td>
<td><a href="javascript:" class="color121" onClick="javascript:change_wallcolor('#CDC1C5')"></a></td>
<td><a href="javascript:" class="color122" onClick="javascript:change_wallcolor('#8B8386')"></a></td>
<td><a href="javascript:" class="color123" onClick="javascript:change_wallcolor('#FF3E96')"></a></td>
<td><a href="javascript:" class="color124" onClick="javascript:change_wallcolor('#EE3A8C')"></a></td>
<td><a href="javascript:" class="color125" onClick="javascript:change_wallcolor('#CD3278')"></a></td>
<td><a href="javascript:" class="color126" onClick="javascript:change_wallcolor('#8B2252')"></a></td>
<td><a href="javascript:" class="color127" onClick="javascript:change_wallcolor('#FF6EB4')"></a></td>
<td><a href="javascript:" class="color128" onClick="javascript:change_wallcolor('#EE6AA7')"></a></td>
<td><a href="javascript:" class="color129" onClick="javascript:change_wallcolor('#CD6090')"></a></td>
<td><a href="javascript:" class="color130" onClick="javascript:change_wallcolor('#8B3A62')"></a></td>
<td><a href="javascript:" class="color131" onClick="javascript:change_wallcolor('#872657')"></a></td>
<td><a href="javascript:" class="color132" onClick="javascript:change_wallcolor('#FF1493')"></a></td>
<td><a href="javascript:" class="color133" onClick="javascript:change_wallcolor('#EE1289')"></a></td>
<td><a href="javascript:" class="color134" onClick="javascript:change_wallcolor('#CD1076')"></a></td>
<td><a href="javascript:" class="color135" onClick="javascript:change_wallcolor('#8B0A50')"></a></td>
<td><a href="javascript:" class="color136" onClick="javascript:change_wallcolor('#FF34B3')"></a></td>
<td><a href="javascript:" class="color137" onClick="javascript:change_wallcolor('#EE30A7')"></a></td>
<td><a href="javascript:" class="color138" onClick="javascript:change_wallcolor('#CD2990')"></a></td>
<td><a href="javascript:" class="color139" onClick="javascript:change_wallcolor('#8B1C62')"></a></td>
<td><a href="javascript:" class="color140" onClick="javascript:change_wallcolor('#C71585')"></a></td>
<td><a href="javascript:" class="color141" onClick="javascript:change_wallcolor('#D02090')"></a></td>
<td><a href="javascript:" class="color142" onClick="javascript:change_wallcolor('#FF83FA')"></a></td>
<td><a href="javascript:" class="color143" onClick="javascript:change_wallcolor('#EE7AE9')"></a></td>
<td><a href="javascript:" class="color144" onClick="javascript:change_wallcolor('#CD69C9')"></a></td>
<td><a href="javascript:" class="color145" onClick="javascript:change_wallcolor('#8B4789')"></a></td>
<td><a href="javascript:" class="color146" onClick="javascript:change_wallcolor('#FFE1FF')"></a></td>
<td><a href="javascript:" class="color147" onClick="javascript:change_wallcolor('#EED2EE')"></a></td>
<td><a href="javascript:" class="color148" onClick="javascript:change_wallcolor('#CDB5CD')"></a></td>
<td><a href="javascript:" class="color149" onClick="javascript:change_wallcolor('#8B7B8B')"></a></td>
<td><a href="javascript:" class="color150" onClick="javascript:change_wallcolor('#FFBBFF')"></a></td>
<td><a href="javascript:" class="color151" onClick="javascript:change_wallcolor('#EEAEEE')"></a></td>
<td><a href="javascript:" class="color152" onClick="javascript:change_wallcolor('#CD96CD')"></a></td>
<td><a href="javascript:" class="color153" onClick="javascript:change_wallcolor('#8B668B')"></a></td>
<td><a href="javascript:" class="color154" onClick="javascript:change_wallcolor('#EE00EE')"></a></td>
<td><a href="javascript:" class="color155" onClick="javascript:change_wallcolor('#CD00CD')"></a></td>
<td><a href="javascript:" class="color156" onClick="javascript:change_wallcolor('#8B008B')"></a></td>
<td><a href="javascript:" class="color157" onClick="javascript:change_wallcolor('#800080')"></a></td>
<td><a href="javascript:" class="color158" onClick="javascript:change_wallcolor('#E066FF')"></a></td>
<td><a href="javascript:" class="color159" onClick="javascript:change_wallcolor('#D15FEE')"></a></td>
</tr>
<tr>
<td><a href="javascript:" class="color160" onClick="javascript:change_wallcolor('#B452CD')"></a></td>
<td><a href="javascript:" class="color161" onClick="javascript:change_wallcolor('#7A378B')"></a></td>
<td><a href="javascript:" class="color162" onClick="javascript:change_wallcolor('#9400D3')"></a></td>
<td><a href="javascript:" class="color163" onClick="javascript:change_wallcolor('#BF3EFF')"></a></td>
<td><a href="javascript:" class="color164" onClick="javascript:change_wallcolor('#B23AEE')"></a></td>
<td><a href="javascript:" class="color165" onClick="javascript:change_wallcolor('#9A32CD')"></a></td>
<td><a href="javascript:" class="color166" onClick="javascript:change_wallcolor('#68228B')"></a></td>
<td><a href="javascript:" class="color167" onClick="javascript:change_wallcolor('#4B0082')"></a></td>
<td><a href="javascript:" class="color168" onClick="javascript:change_wallcolor('#8A2BE2')"></a></td>
<td><a href="javascript:" class="color169" onClick="javascript:change_wallcolor('#9B30FF')"></a></td>
<td><a href="javascript:" class="color170" onClick="javascript:change_wallcolor('#912CEE')"></a></td>
<td><a href="javascript:" class="color171" onClick="javascript:change_wallcolor('#7D26CD')"></a></td>
<td><a href="javascript:" class="color172" onClick="javascript:change_wallcolor('#551A8B')"></a></td>
<td><a href="javascript:" class="color173" onClick="javascript:change_wallcolor('#AB82FF')"></a></td>
<td><a href="javascript:" class="color174" onClick="javascript:change_wallcolor('#9F79EE')"></a></td>
<td><a href="javascript:" class="color175" onClick="javascript:change_wallcolor('#8968CD')"></a></td>
<td><a href="javascript:" class="color176" onClick="javascript:change_wallcolor('#5D478B')"></a></td>
<td><a href="javascript:" class="color177" onClick="javascript:change_wallcolor('#483D8B')"></a></td>
<td><a href="javascript:" class="color178" onClick="javascript:change_wallcolor('#8470FF')"></a></td>
<td><a href="javascript:" class="color179" onClick="javascript:change_wallcolor('#836FFF')"></a></td>
<td><a href="javascript:" class="color180" onClick="javascript:change_wallcolor('#7A67EE')"></a></td>
<td><a href="javascript:" class="color181" onClick="javascript:change_wallcolor('#6959CD')"></a></td>
<td><a href="javascript:" class="color182" onClick="javascript:change_wallcolor('#473C8B')"></a></td>
<td><a href="javascript:" class="color183" onClick="javascript:change_wallcolor('#F8F8FF')"></a></td>
<td><a href="javascript:" class="color184" onClick="javascript:change_wallcolor('#0000FF')"></a></td>
<td><a href="javascript:" class="color185" onClick="javascript:change_wallcolor('#0000EE')"></a></td>
<td><a href="javascript:" class="color186" onClick="javascript:change_wallcolor('#0000CD')"></a></td>
<td><a href="javascript:" class="color187" onClick="javascript:change_wallcolor('#00008B')"></a></td>
<td><a href="javascript:" class="color188" onClick="javascript:change_wallcolor('#000080')"></a></td>
<td><a href="javascript:" class="color189" onClick="javascript:change_wallcolor('#3D59AB')"></a></td>
<td><a href="javascript:" class="color190" onClick="javascript:change_wallcolor('#4876FF')"></a></td>
<td><a href="javascript:" class="color191" onClick="javascript:change_wallcolor('#436EEE')"></a></td>
<td><a href="javascript:" class="color192" onClick="javascript:change_wallcolor('#3A5FCD')"></a></td>
<td><a href="javascript:" class="color193" onClick="javascript:change_wallcolor('#27408B')"></a></td>
<td><a href="javascript:" class="color194" onClick="javascript:change_wallcolor('#6495ED')"></a></td>
<td><a href="javascript:" class="color195" onClick="javascript:change_wallcolor('#CAE1FF')"></a></td>
<td><a href="javascript:" class="color196" onClick="javascript:change_wallcolor('#BCD2EE')"></a></td>
<td><a href="javascript:" class="color197" onClick="javascript:change_wallcolor('#A2B5CD')"></a></td>
<td><a href="javascript:" class="color198" onClick="javascript:change_wallcolor('#6E7B8B')"></a></td>
<td><a href="javascript:" class="color199" onClick="javascript:change_wallcolor('#C6E2FF')"></a></td>
<td><a href="javascript:" class="color200" onClick="javascript:change_wallcolor('#B9D3EE')"></a></td>
<td><a href="javascript:" class="color201" onClick="javascript:change_wallcolor('#9FB6CD')"></a></td>
<td><a href="javascript:" class="color202" onClick="javascript:change_wallcolor('#6C7B8B')"></a></td>
<td><a href="javascript:" class="color203" onClick="javascript:change_wallcolor('#1E90FF')"></a></td>
<td><a href="javascript:" class="color204" onClick="javascript:change_wallcolor('#1C86EE')"></a></td>
<td><a href="javascript:" class="color205" onClick="javascript:change_wallcolor('#1874CD')"></a></td>
<td><a href="javascript:" class="color206" onClick="javascript:change_wallcolor('#104E8B')"></a></td>
<td><a href="javascript:" class="color207" onClick="javascript:change_wallcolor('#F0F8FF')"></a></td>
<td><a href="javascript:" class="color208" onClick="javascript:change_wallcolor('#4682B4')"></a></td>
<td><a href="javascript:" class="color209" onClick="javascript:change_wallcolor('#63B8FF')"></a></td>
<td><a href="javascript:" class="color210" onClick="javascript:change_wallcolor('#5CACEE')"></a></td>
<td><a href="javascript:" class="color211" onClick="javascript:change_wallcolor('#4F94CD')"></a></td>
<td><a href="javascript:" class="color212" onClick="javascript:change_wallcolor('#36648B')"></a></td>
</tr>
<tr>
<td><a href="javascript:" class="color213" onClick="javascript:change_wallcolor('#B0E2FF')"></a></td>
<td><a href="javascript:" class="color214" onClick="javascript:change_wallcolor('#A4D3EE')"></a></td>
<td><a href="javascript:" class="color215" onClick="javascript:change_wallcolor(#8DB6CD'')"></a></td>
<td><a href="javascript:" class="color216" onClick="javascript:change_wallcolor('#607B8B')"></a></td>
<td><a href="javascript:" class="color217" onClick="javascript:change_wallcolor('#87CEFF')"></a></td>
<td><a href="javascript:" class="color218" onClick="javascript:change_wallcolor('#7EC0EE')"></a></td>
<td><a href="javascript:" class="color219" onClick="javascript:change_wallcolor('#6CA6CD')"></a></td>
<td><a href="javascript:" class="color220" onClick="javascript:change_wallcolor('#4A708B')"></a></td>
<td><a href="javascript:" class="color221" onClick="javascript:change_wallcolor('#00BFFF')"></a></td>
<td><a href="javascript:" class="color222" onClick="javascript:change_wallcolor('#00B2EE')"></a></td>
<td><a href="javascript:" class="color223" onClick="javascript:change_wallcolor('#009ACD')"></a></td>
<td><a href="javascript:" class="color224" onClick="javascript:change_wallcolor('#33A1C9')"></a></td>
<td><a href="javascript:" class="color225" onClick="javascript:change_wallcolor('#BFEFFF')"></a></td>
<td><a href="javascript:" class="color226" onClick="javascript:change_wallcolor('#B2DFEE')"></a></td>
<td><a href="javascript:" class="color227" onClick="javascript:change_wallcolor('#9AC0CD')"></a></td>
<td><a href="javascript:" class="color228" onClick="javascript:change_wallcolor('#68838B')"></a></td>
<td><a href="javascript:" class="color229" onClick="javascript:change_wallcolor('#98F5FF')"></a></td>
<td><a href="javascript:" class="color230" onClick="javascript:change_wallcolor('#8EE5EE')"></a></td>
<td><a href="javascript:" class="color231" onClick="javascript:change_wallcolor('#7AC5CD')"></a></td>
<td><a href="javascript:" class="color232" onClick="javascript:change_wallcolor('#53868B')"></a></td>
<td><a href="javascript:" class="color233" onClick="javascript:change_wallcolor('#00F5FF')"></a></td>
<td><a href="javascript:" class="color234" onClick="javascript:change_wallcolor('#00E5EE')"></a></td>
<td><a href="javascript:" class="color235" onClick="javascript:change_wallcolor('#00C5CD')"></a></td>
<td><a href="javascript:" class="color236" onClick="javascript:change_wallcolor('#00868B')"></a></td>
<td><a href="javascript:" class="color237" onClick="javascript:change_wallcolor('#5F9EA0')"></a></td>
<td><a href="javascript:" class="color238" onClick="javascript:change_wallcolor('#00CED1')"></a></td>
<td><a href="javascript:" class="color239" onClick="javascript:change_wallcolor('#F0FFFF')"></a></td>
<td><a href="javascript:" class="color240" onClick="javascript:change_wallcolor('#E0EEEE')"></a></td>
<td><a href="javascript:" class="color241" onClick="javascript:change_wallcolor('#C1CDCD')"></a></td>
<td><a href="javascript:" class="color242" onClick="javascript:change_wallcolor('#838B8B')"></a></td>
<td><a href="javascript:" class="color243" onClick="javascript:change_wallcolor('#00688B')"></a></td>
<td><a href="javascript:" class="color244" onClick="javascript:change_wallcolor('#000000')"></a></td>
<td><a href="javascript:" class="color245" onClick="javascript:change_wallcolor('#B4CDCD')"></a></td>
<td><a href="javascript:" class="color246" onClick="javascript:change_wallcolor('#7A8B8B')"></a></td>
<td><a href="javascript:" class="color247" onClick="javascript:change_wallcolor('#BBFFFF')"></a></td>
<td><a href="javascript:" class="color248" onClick="javascript:change_wallcolor('#AEEEEE')"></a></td>
<td><a href="javascript:" class="color249" onClick="javascript:change_wallcolor('#96CDCD')"></a></td>
<td><a href="javascript:" class="color250" onClick="javascript:change_wallcolor('#668B8B')"></a></td>
<td><a href="javascript:" class="color251" onClick="javascript:change_wallcolor('#2F4F4F')"></a></td>
<td><a href="javascript:" class="color252" onClick="javascript:change_wallcolor('#97FFFF')"></a></td>
<td><a href="javascript:" class="color253" onClick="javascript:change_wallcolor('#8DEEEE')"></a></td>
<td><a href="javascript:" class="color254" onClick="javascript:change_wallcolor('#79CDCD')"></a></td>
<td><a href="javascript:" class="color255" onClick="javascript:change_wallcolor('#528B8B')"></a></td>
<td><a href="javascript:" class="color256" onClick="javascript:change_wallcolor('#00FFFF')"></a></td>
<td><a href="javascript:" class="color257" onClick="javascript:change_wallcolor('#00EEEE')"></a></td>
<td><a href="javascript:" class="color258" onClick="javascript:change_wallcolor('#00CDCD')"></a></td>
<td><a href="javascript:" class="color259" onClick="javascript:change_wallcolor('#008B8B')"></a></td>
<td><a href="javascript:" class="color260" onClick="javascript:change_wallcolor('#03A89E')"></a></td>
<td><a href="javascript:" class="color261" onClick="javascript:change_wallcolor('#808A87')"></a></td>
<td><a href="javascript:" class="color262" onClick="javascript:change_wallcolor('#00C78C')"></a></td>
<td><a href="javascript:" class="color263" onClick="javascript:change_wallcolor('#7FFFD4')"></a></td>
<td><a href="javascript:" class="color264" onClick="javascript:change_wallcolor('#76EEC6')"></a></td>
<td><a href="javascript:" class="color265" onClick="javascript:change_wallcolor('#00EE76')"></a></td>
</tr>
<tr>
<td><a href="javascript:" class="color266" onClick="javascript:change_wallcolor('#00CD66')"></a></td>
<td><a href="javascript:" class="color267" onClick="javascript:change_wallcolor('#008B45')"></a></td>
<td><a href="javascript:" class="color268" onClick="javascript:change_wallcolor('#54FF9F')"></a></td>
<td><a href="javascript:" class="color269" onClick="javascript:change_wallcolor('#4EEE94')"></a></td>
<td><a href="javascript:" class="color270" onClick="javascript:change_wallcolor('#43CD80')"></a></td>
<td><a href="javascript:" class="color271" onClick="javascript:change_wallcolor('#00C957')"></a></td>
<td><a href="javascript:" class="color272" onClick="javascript:change_wallcolor('#BDFCC9')"></a></td>
<td><a href="javascript:" class="color273" onClick="javascript:change_wallcolor('#3D9140')"></a></td>
<td><a href="javascript:" class="color274" onClick="javascript:change_wallcolor('#F0FFF0')"></a></td>
<td><a href="javascript:" class="color275" onClick="javascript:change_wallcolor('#E0EEE0')"></a></td>
<td><a href="javascript:" class="color276" onClick="javascript:change_wallcolor('#C1CDC1')"></a></td>
<td><a href="javascript:" class="color277" onClick="javascript:change_wallcolor('#838B83')"></a></td>
<td><a href="javascript:" class="color278" onClick="javascript:change_wallcolor('#C1FFC1')"></a></td>
<td><a href="javascript:" class="color279" onClick="javascript:change_wallcolor('#B4EEB4')"></a></td>
<td><a href="javascript:" class="color280" onClick="javascript:change_wallcolor('#9BCD9B')"></a></td>
<td><a href="javascript:" class="color281" onClick="javascript:change_wallcolor('#698B69')"></a></td>
<td><a href="javascript:" class="color282" onClick="javascript:change_wallcolor('#9AFF9A')"></a></td>
<td><a href="javascript:" class="color283" onClick="javascript:change_wallcolor('#7CCD7C')"></a></td>
<td><a href="javascript:" class="color284" onClick="javascript:change_wallcolor('#548B54')"></a></td>
<td><a href="javascript:" class="color285" onClick="javascript:change_wallcolor('#228B22')"></a></td>
<td><a href="javascript:" class="color286" onClick="javascript:change_wallcolor('#00EE00')"></a></td>
<td><a href="javascript:" class="color287" onClick="javascript:change_wallcolor('#00CD00')"></a></td>
<td><a href="javascript:" class="color288" onClick="javascript:change_wallcolor('#008B00')"></a></td>
<td><a href="javascript:" class="color289" onClick="javascript:change_wallcolor('#006400')"></a></td>
<td><a href="javascript:" class="color290" onClick="javascript:change_wallcolor('#308014')"></a></td>
<td><a href="javascript:" class="color291" onClick="javascript:change_wallcolor('#7FFF00')"></a></td>
<td><a href="javascript:" class="color292" onClick="javascript:change_wallcolor('#76EE00')"></a></td>
<td><a href="javascript:" class="color293" onClick="javascript:change_wallcolor('#66CD00')"></a></td>
<td><a href="javascript:" class="color294" onClick="javascript:change_wallcolor('#458B00')"></a></td>
<td><a href="javascript:" class="color295" onClick="javascript:change_wallcolor('#CAFF70')"></a></td>
<td><a href="javascript:" class="color296" onClick="javascript:change_wallcolor('#BCEE68')"></a></td>
<td><a href="javascript:" class="color297" onClick="javascript:change_wallcolor('#A2CD5A')"></a></td>
<td><a href="javascript:" class="color298" onClick="javascript:change_wallcolor('#6E8B3D')"></a></td>
<td><a href="javascript:" class="color299" onClick="javascript:change_wallcolor('#556B2F')"></a></td>
<td><a href="javascript:" class="color300" onClick="javascript:change_wallcolor('#C0FF3E')"></a></td>
<td><a href="javascript:" class="color301" onClick="javascript:change_wallcolor('#B3EE3A')"></a></td>
<td><a href="javascript:" class="color302" onClick="javascript:change_wallcolor('#458B74')"></a></td>
<td><a href="javascript:" class="color303" onClick="javascript:change_wallcolor('#698B22')"></a></td>
<td><a href="javascript:" class="color304" onClick="javascript:change_wallcolor('#EEEEE0')"></a></td>
<td><a href="javascript:" class="color305" onClick="javascript:change_wallcolor('#CDCDC1')"></a></td>
<td><a href="javascript:" class="color306" onClick="javascript:change_wallcolor('#8B8B83')"></a></td>
<td><a href="javascript:" class="color307" onClick="javascript:change_wallcolor('#F5F5DC')"></a></td>
<td><a href="javascript:" class="color308" onClick="javascript:change_wallcolor('#EEEED1')"></a></td>
<td><a href="javascript:" class="color309" onClick="javascript:change_wallcolor('#CDCDB4')"></a></td>
<td><a href="javascript:" class="color310" onClick="javascript:change_wallcolor('#8B8B7A')"></a></td>
<td><a href="javascript:" class="color311" onClick="javascript:change_wallcolor('#EEEE00')"></a></td>
<td><a href="javascript:" class="color312" onClick="javascript:change_wallcolor('#CDCD00')"></a></td>
<td><a href="javascript:" class="color313" onClick="javascript:change_wallcolor('#8B8B00')"></a></td>
<td><a href="javascript:" class="color314" onClick="javascript:change_wallcolor('#808069')"></a></td>
<td><a href="javascript:" class="color315" onClick="javascript:change_wallcolor('#FFF68F')"></a></td>
<td><a href="javascript:" class="color316" onClick="javascript:change_wallcolor('#EEE685')"></a></td>
<td><a href="javascript:" class="color317" onClick="javascript:change_wallcolor('#CDC673')"></a></td>
<td><a href="javascript:" class="color318" onClick="javascript:change_wallcolor('#000000')"></a></td>
</tr>
</table>
</div>
<div id="tab10">
<table class="bormount">
<?php
$count=1;
for($i=0.50;$i<=6.00;$i=$i+0.50)
{ 
    //echo $i;
    if($count==0) 
    {echo '<tr>';}
        
echo '<td style="width: 27px;"><a href="javascript:;"  onclick="javascript:change_mount('.$i.')">'.number_format((float)$i, 2, '.', '').'</a></td>';
    if($count==26)
    {
        $count=0;
echo '</tr>';
    }
$count++;

} // end loop  ?>
</table>
</div>
</div>
</div>
<div><script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
</div>
</div>
</div>
</div>
</div>
<script>/*<![CDATA[*/$(document).ready(function(){$("#content div").hide();$("#tabs li:first").attr("id","current");$("#content div:first").fadeIn();$("#tabs a").click(function(a){a.preventDefault();if($(this).closest("li").attr("id")=="current"){return}else{$("#content div").hide();$("#tabs li").attr("id","");$(this).parent().attr("id","current");$("#"+$(this).attr("name")).fadeIn()}})});$(document).ready(function(){$.ajax({type:"post",url:"<?=base_url()?>frontend/get_web_glass_rate",data:"glass=Normal",success:function(a){$("#glass_rate").val(a)}})});$(document).on("click",".glass",function(){var a=$(this).data("name");$.ajax({type:"post",url:"<?=base_url()?>frontend/get_web_glass_rate",data:"glass="+a,success:function(b){$("#glass_rate").val(b)}});glass_price();setTimeout(function(){glass_price()},100)});function glass_price(){var C=$("#frame_rate").val();var r=$("#mount_rate").val();var e=$("#glass_rate").val();var b=<?=$frame_rate;?>;var c=<?=$mount_rate;?>;var A=<?=$glass_rate;?>;if(C!=""&&!isNaN(C)){var k=C}else{k=b}if(r!=""&&!isNaN(r)){var s=r}else{s=c}if(e!=""&&!isNaN(e)){var g=e}else{g=A}var a=document.getElementById("print_frame_size").value;var h=document.getElementById("print_price").innerHTML;var q=document.getElementById("print_sizes").innerHTML;var f=$("#mount_size").html();var n=f.split('"');var m=n[0];var y=q.split("X");var p=parseFloat(y[0]);var x=parseFloat(y[1]);var v=p+parseFloat(m*2);var u=x+parseFloat(m*2);var d=v*u;var B=d*g;$("#glass_price").html(B);if(n==""||isNaN(n)){n=1.5}else{n=n}if(isNaN(a)||a==""){a=0.75}else{a=a}document.getElementById("mat1_size").value=n;document.getElementById("mount_size").innerHTML=n+"&quot;";var y=q.split("X");var p=parseFloat(y[0]);var x=parseFloat(y[1]);var v=p+parseFloat(n*2);var u=x+parseFloat(n*2);var d=v*u;var D=d*s;document.getElementById("MountCost").innerHTML=D;var l=(parseFloat(v)+parseFloat(a)*2)*(parseFloat(u)+parseFloat(a*2));var w=(l)/(12)*parseInt(k);var t=parseFloat(Math.round(w*100)/100).toFixed(2);document.getElementById("FrameCost").innerHTML=t;var i=parseFloat(h)+parseFloat(t)+parseFloat(D)+parseFloat(B);$("#total_price").html(i.toFixed(2))}/*]]>*/</script>
<style type="text/css">#black,#gray{display:none}</style>
<style>/*<![CDATA[*/.newid1{display:none;position:absolute;top:73px;left:279px;padding:15px;border:3px solid #ff7949;border-radius:10px;background-color:white;z-index:10000001;overflow:auto}.large_image_dive{position:absolute;top:59px;left:208px;padding:15px;border:3px solid #ff7949;border-radius:10px;background-color:white;z-index:10000001;overflow:auto;width:72%;height:103%}.main{margin-top:20px;display:inline-block;position:relative;padding:7.5px}.main_frame{margin:auto;padding:25px;background:url(<?=base_url()?>uploaded_pdf/new_frames/split_frame/332x395.jpg);background:repeat;-moz-background-size:cover;-o-background-size:cover;display:block;position:absolute;padding:8px;margin-right:8px}.mainhor{margin-top:20px;display:inline-block;position:relative;padding:7.5px}#abc{//border:25px solid white;padding:15px;background-color:rgba(251,245,245,1)}#abc2{//border:25px solid white;padding-top:8px;padding-left:8px;background-color:white}#fir{padding:2px;background-color:white;box-shadow:2px 2px 1px black inset}#fir_room{padding:2px;background-color:white;box-shadow:2px 2px 1px black inset}/*]]>*/</style>
<script type="text/javascript">/*<![CDATA[*/function hideAll(){document.getElementById("popular").style.display="none";document.getElementById("black").style.display="none";document.getElementById("gray").style.display="none";document.getElementById("blue").style.display="none";document.getElementById("white").style.display="none";document.getElementById("yellow").style.display="none";document.getElementById("gold").style.display="none"}function showTable(a){a.style.display="block"}function show_mat(a){a.style.display="block"}function hide(){document.getElementById("mat1").style.display="none";document.getElementById("mat2").style.display="none"}function change_mount(m,u){var k=$("#frame_rate").val();var p=$("#mount_rate").val();var g=$("#glass_rate").val();var n=document.getElementById("print_sizes").innerHTML;var f=document.getElementById("print_mount_size").value;var a=document.getElementById("print_frame_size").value;var h=document.getElementById("print_price").innerHTML;if(m==""||isNaN(m)){m=1.5}else{m=m}if(isNaN(a)||a==""){a=0.75}else{a=a}document.getElementById("mat1_size").value=m;document.getElementById("mount_size").innerHTML=m+"&quot;";var x=n.split("X");var o=parseFloat(x[0]);var w=parseFloat(x[1]);var t=o+parseFloat(m*2);var r=w+parseFloat(m*2);var d=t*r;var z=d*p;var y=d*g;document.getElementById("MountCost").innerHTML=z;var l=(parseFloat(t)+parseFloat(a)*2)*(parseFloat(r)+parseFloat(a*2));var v=(l)/(12)*parseInt(k);var q=parseFloat(Math.round(v*100)/100).toFixed(2);$("#glass_price").html(y);document.getElementById("FrameCost").innerHTML=q;var j=parseFloat(h)+parseFloat(q)+parseFloat(z)+parseFloat(y);$("#total_price").html(j.toFixed(2));document.getElementById("print_mount_size").value=m;var e=document.getElementById("print_width").value;var b=parseInt(m*10);var s=parseInt(e*10);var i=s+b;if(u!=""){var c=u*10}else{var c=10}$("#abc").css("padding",""+b+"px");$("#frame-it").css("padding",""+c+"px");$("#fir").css("padding","2px");$("#fir").css("box-shadow","2px 2px 1px black inset")}function Frame_Size(b){var e=$("#f_color").html();if(e=="Black"){var d="Absolute"}else{if(e=="White"){d="Frosty"}else{if(e=="Brown"){d="Teak"}}}var c=document.getElementById("print_mount_size").value;change_mount(c,b);document.getElementById("print_frame_size").value=b;document.getElementById("fat_frame").value=b;var a=document.getElementById("print_mount_size").value;change_mount(a,b);get_frame_rate(d)}function myfun(a,i,j,k,l,m,n,o,d){var mount_it_width=document.getElementById("mount_it_width").value;if(document.getElementById("mount_it_width").value==""){var mount_width=16*2}else{var mount_width1=document.getElementById("mount_it_width").value;var mount_width=parseFloat(mount_width1)*parseInt(2)}document.getElementById("mount_size").value=mount_width;document.getElementById("f_color").innerHTML=k;document.getElementById("frame_color").value=k;if(d=="Vertical"){var dert="<?php echo base_url()?>uploaded_pdf/new vertical/";+$("div.main").css("background",'url("'+dert+a+'")');+$("div.main").css("background-size","cover")}else{if(d=="Slim"){var dert="<?php echo base_url()?>uploaded_pdf/slim/";+$("div.main").css("background",'url("'+dert+a+'")');+$("div.main").css("background-size","cover")}else{if(d=="Horizontal"){var dert="<?php echo base_url()?>uploaded_pdf/horizontal/";+$("div.mainhor").css("background",'url("'+dert+a+'") no-repeat');+$("div.mainhor").css("background-size","cover")}else{if(d=="Square"){var dert="<?php echo base_url()?>uploaded_pdf/square/";+$("div.mainhor").css("background",'url("'+dert+a+'") no-repeat');+$("div.mainhor").css("background-size","cover")}else{if(d=="Panoramic"){var dert="<?php echo base_url()?>uploaded_pdf/Panoramic/";+$("div.mainhor").css("background",'url("'+dert+a+'") no-repeat');+$("div.mainhor").css("background-size","cover")}}}}}var mount_rate=$("#mount_rate").val();var print_price=document.getElementById("print_price").innerHTML;var acrylic_price=document.getElementById("acrylic_price").innerHTML;var fitting_price=document.getElementById("fitting_price").value;var print_sizes=document.getElementById("print_sizes").innerHTML;var mount_size=document.getElementById("print_mount_size").value;var frame_size=document.getElementById("print_frame_size").value;var printsplit=print_sizes.split("X");if(isNaN(mount_size)||mount_size==""){mount_size=0}else{mount_size=mount_size}if(isNaN(frame_size)||frame_size==""){frame_size=1.25}else{frame_size=frame_size}var newmountheight=parseFloat(printsplit[0])+parseFloat(mount_size*2);var newmountwidth=parseFloat(printsplit[1])+parseFloat(mount_size*2);var MountCost=parseFloat(newmountheight)*parseFloat(newmountwidth)*(parseInt(mount_rate));var MOuntCotsFormat=parseFloat(Math.round(MountCost*100)/100).toFixed(2);document.getElementById("MountCost").innerHTML=MOuntCotsFormat;var OrgFrametRuningArea=(parseFloat(newmountheight)+parseFloat(frame_size)*2)*(parseFloat(newmountwidth)+parseFloat(frame_size*2));var OrgFramCost=(OrgFrametRuningArea)/(12)*40;var FrameCotsFormat=parseFloat(Math.round(OrgFramCost*100)/100).toFixed(2);document.getElementById("FrameCost").innerHTML=FrameCotsFormat;document.getElementById("frame_size").innerHTML=i;document.getElementById("frame_price").innerHTML=price;document.getElementById("frame_color").innerHTML="Contemporary";document.getElementById("frame_id").value=l;document.getElementById("frame_it_price").value=j;document.getElementById("frame_it_width").value=m;var fitting_price=document.getElementById("fitting_price").value;var total1=eval(print_price)+eval(FrameCotsFormat)+eval(MOuntCotsFormat)+eval(acrylic_price)+eval(fitting_price);var total=Math.round(total1);document.getElementById("total_price").innerHTML=total;dobackup(a,i,j,k,l,m,n,o,d)}function change_color(f,e,d){document.getElementById("mount_color").innerHTML=d;document.getElementById("mat1_color").value=d;var c="<?php echo base_url();?>uploaded_pdf/";$("div#abc").css("background-color",""+d+"");$("#fir").css("padding","2px");$("#fir").css("box-shadow","2px 2px 1px black inset");document.getElementById("mat1_color").value=d;$.ajax({type:"post",url:"<?=base_url()?>frontend/get_web_mount_rate",data:"mount="+d,success:function(a){$("#mount_rate").val(a)}})}function change_color2(c,width,lenght,d){$("input.example1").on("change",function(){$("input.example1").not(this).prop("checked",false)});$("div#abc").css("border",""+c+"px solid "+document.getElementById("mat1_color").innerHTML+" ");var glass_rate=$("#glass_rate").val();var newwidth=parseFloat(width)+(d*2);var newlenght=parseFloat(lenght)+(d*2);var result1=parseFloat(newwidth)*parseFloat(newlenght)*parseFloat(glass_rate);var result=Math.round(result1);var glasscost1=parseFloat(newwidth)*parseFloat(newlenght)*parseFloat(glass_rate);var glasscost=Math.round(glasscost1);var glasscost2=parseFloat(newwidth)*parseFloat(newlenght)*parseFloat(glass_rate);var arcylic_glass_cost=Math.round(glasscost2);var glasscost3=parseFloat(newwidth)*parseFloat(newlenght)*parseFloat(glass_rate);var nonglare_glass_cost=Math.round(glasscost3);if(document.getElementById("frame_it_price").value==""){var frameprice=60}else{var frameprice=document.getElementById("frame_it_price").value}if(document.getElementById("frame_it_width").value==""){var framewidth=0.5}else{var framewidth=document.getElementById("frame_it_width").value}var newwidth1=parseFloat(newwidth)+parseFloat(framewidth)+parseFloat(framewidth);var newlenght1=parseFloat(newlenght)+parseFloat(framewidth)+parseFloat(framewidth);var costofframe=parseFloat(newwidth1)*parseInt(2)+parseFloat(newlenght1)*parseInt(2);var framecost1=parseInt(frameprice)/parseInt(12);var framecost=parseFloat(costofframe)*parseFloat(framecost1);document.getElementById("frame_price").innerHTML=framecost;document.getElementById("arcylic").value=arcylic_glass_cost;document.getElementById("arcylic_cost").innerHTML=arcylic_glass_cost;document.getElementById("glass").value=glasscost;document.getElementById("glass_cost").innerHTML=glasscost;document.getElementById("arcylic_2").value=arcylic_glass_cost;document.getElementById("arcylic_2_cost").innerHTML=arcylic_glass_cost;document.getElementById("glass_2").value=glasscost;document.getElementById("glass_2_cost").innerHTML=glasscost;document.getElementById("arcylic_3").value=arcylic_glass_cost;document.getElementById("arcylic_3_cost").innerHTML=arcylic_glass_cost;document.getElementById("glass_3").value=glasscost;document.getElementById("glass_3_cost").innerHTML=glasscost;document.getElementById("extrawidth").value=result;document.getElementById("mat1_price").innerHTML=result;document.getElementById("acrylic_price").innerHTML=glasscost;var print_price=document.getElementById("print_price").innerHTML;var FrameCost=document.getElementById("FrameCost").innerHTML;var mat1_price=result;var MountCost=document.getElementById("MountCost").innerHTML;document.getElementById("mount_it_width").value=d;var acrylic_price=document.getElementById("acrylic_price").innerHTML;var fitting_price=document.getElementById("fitting_price").value;var total=eval(print_price)+eval(FrameCost)+eval(MountCost)+eval(acrylic_price)+eval(fitting_price);document.getElementById("total_price").innerHTML=total}function change_color2d(st,a,b){var dertr="<?php echo base_url()?>uploaded_pdf/";$("div#fir1").css("border","solid "+b+"");$("#topa1").css("padding","3px");$("#topa1").css("box-shadow","0px 0px 5px "+b+" inset");document.getElementById("mat2_price").innerHTML=a;document.getElementById("mat2_color").innerHTML=b;var print_price=document.getElementById("print_price").innerHTML;var frame_price=document.getElementById("frame_price").innerHTML;var mat1_price=document.getElementById("mat1_price").innerHTML;var acrylic_price=document.getElementById("acrylic_price").innerHTML;var fitting_price=document.getElementById("fitting_price").value;var total=eval(print_price)+eval(frame_price)+eval(mat1_price)+eval(acrylic_price)+eval(fitting_price);document.getElementById("total_price").innerHTML=total}function change_color3d(){$("#fir2").css("padding","5px");$("#fir2").css("background-color","green");$("#topa2").css("padding","3px");$("#topa2").css("box-shadow","0px 0px 3px black inset")}function change_wallcolor(a){$("div.frame-it-main").css("background-color",""+a+"")}function addGlasses(b,a){document.getElementById("glass").value=b;document.getElementById("glass_coste").value=a}$(document).ready(function(){$("#large_image_dive").hide();get_frame_rate("Absolute");get_mount_rate("White")});function get_mount_rate(a){$.ajax({type:"post",url:"<?=base_url()?>frontend/get_web_mount_rate",data:"mount="+a,success:function(b){$("#mount_rate").val(b)}})}function get_frame_rate(a){$.ajax({type:"post",url:"<?=base_url()?>frontend/get_web_frame_rate",data:"frame="+a,success:function(b){$("#frame_rate").val(b)}})};/*]]>*/</script>