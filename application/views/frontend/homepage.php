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
<link rel="stylesheet" href="<?php print base_url();?>assets/css/popular-art-slider.css" type="text/css">
<script src="<?php echo base_url()?>assets/js/jquery.flexslider.js"></script>

<div class="container">
<div class="row">
<div id="myCarousel" class="carousel slide col-md-12" data-ride="carousel" style="margin-top:2px">
<div class="carousel-inner" role="listbox">
    
    <div class="item active">
        <img src="<?php echo base_url();?>assets/img/slider/homepage style n space-02.jpg" border="0" />
        <div class="Map_area">
                <a href="<?=base_url()?>frontend/themes_view/13" id="map_area_03"></a>
                <a href="<?=base_url()?>frontend/themes_view/15" id="map_area_04"></a>
                <a href="<?=base_url()?>search/dosearch/1/32/27/all" id="map_area_05"></a>
                <a href="<?=base_url()?>frontend/themes_view/12	" id="map_area_06"></a>
        </div>
        <style>
                #map_area_03, #map_area_04, #map_area_05, #map_area_06 {
                    position: absolute;
                    bottom:0;
                }
            </style>
    </div>
    <div class="item">
        <a href="<?=base_url()?>frontend/photostoframe"><img src="<?php echo base_url();?>assets/img/slider/unlock_slider4.jpg" border="0" /></a>
    </div>
    <div class="item">
        <a href="<?=base_url()?>frontend/contact"><img src="<?php echo base_url();?>assets/img/slider/unlock_slider6.jpg" border="0" /></a>
    </div>
    <div class="item">
        <img src="<?php echo base_url();?>assets/img/slider/homepage style n space-01.jpg" border="0" />
            <div class="Map_area">
                <a href="<?=base_url()?>frontend/themes_view/22" id="map_area_01"></a>
                <a href="<?=base_url()?>frontend/themes_view/21" id="map_area_02"></a>
            </div>
            <style>
                #map_area_01 {
                    position: absolute;
                    left: 0;
                }
                #map_area_02 {
                    position: absolute;
                    right: 0;
                }
            </style>
    </div>
    <div class="item">
        <a href="<?=base_url()?>frontend/clearance"><img src="<?php echo base_url();?>assets/img/slider/unlock_slider8.jpg" border="0" /></a>
    </div>
</div>
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="width:20px"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="width:20px"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>

<div class="top-cate col-md-12">
<h1 class="ttto"> What's Trending </h1>
</div>

<div id="myCarousel2" class="carousel slide col-md-12" data-ride="carousel" style="margin-top:2px">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
        	<a href="<?=base_url().'frontend/themes_view/25'?>"><img src="<?php echo base_url();?>assets/img/slider/whats trending slider-01.jpg" border="0" /></a>
    	</div>
        <div class="item">
        	<a href="<?=base_url().'frontend/themes_view/23'?>"><img src="<?php echo base_url();?>assets/img/slider/whats trending slider-02.jpg" border="0" /></a>
    	</div>
        <div class="item">
        	<a href="<?=base_url().'frontend/themes_view/24'?>"><img src="<?php echo base_url();?>assets/img/slider/whats trending slider-03.jpg" border="0" /></a>
    	</div>
    </div>
    <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
    <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
</div>

<div style="clear:both"></div>
<!--bottom top area-->
<div class="col-md-12" style="margin-bottom:30px">
<?php
        $bottom_top= $this->frontend_model->get_home_top_category_images('bottom top');
		
        //echo $bottom_top[0]->title_name;

		  $spit0= split('/',$bottom_top[0]->keyword);
			 $spit1= split('/',$bottom_top[1]->keyword);
			  $spit2= split('/',$bottom_top[2]->keyword);
			   $spit3= split('/',$bottom_top[3]->keyword);
			   
			  	
                                     if($spit0[1]=='frontend'){
                                              $url0=$bottom_top[0]->keyword;
                                          }else{
                                              $url0="search/dosearch/1/32/".$bottom_top[0]->keyword."/all";
                                          }if($spit1[1]=='frontend'){
                                              $url1=$bottom_top[1]->keyword;
                                          }else{
                                              $url1="search/dosearch/1/32/".$bottom_top[1]->keyword."/all";
                                          }if($spit2[1]=='frontend'){
                                              $url2=$bottom_top[2]->keyword;
                                          }else{
                                              $url2="search/dosearch/1/32/".$bottom_top[2]->keyword."/all";
                                          }if($spit3[1]=='frontend'){
                                              $url3=$bottom_top[3]->keyword;
                                          }else{
                                              $url3="search/dosearch/1/32/".$bottom_top[3]->keyword."/all";
                                          }
										 
		  
        ?>

<div class="row" style="padding-top:40px">
<div class="col-md-6 col-sm-6 margn box">
<div class="row">
<div class="col-xs-6 col-md-6 col-sm-6  bg">
<a href="<?php print base_url(); ?>frontend/themes_view/13">
<img src="<?php echo base_url();?><?=$bottom_top[0]->image?>" class="img-responsive" width="100%" /> </a>
</div>
<div class="col-xs-6 col-md-6 col-sm-6 bg_content">
<h4>
<?=$bottom_top[0]->field1?>
</h4>
<h5>
<?=$bottom_top[0]->title?>
</h5>
<p>
<?=$bottom_top[0]->description?>
</p>
<div style="text-align:right;padding:5px 0"> <a style="color:#6699FF" href="<?php print base_url(); ?>frontend/themes_view/13"> Read More. </a> </div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 margn box">
<div class="row">
<div class="col-xs-6 col-md-6 col-sm-6  bg"> <a href="<?php echo base_url();?><?=$url1?>"> <img src="<?php echo base_url();?><?=$bottom_top[1]->image?>" class="img-resonsive" width="100%"> </a> </div>
<div class="col-xs-6 col-md-6 col-sm-6 bg_content ">
<h4>
<?=$bottom_top[1]->field1?>
</h4>
<h5>
<?=$bottom_top[1]->title?>
</h5>
<p>
<?=$bottom_top[1]->description?>
</p>
<div style="text-align:right;padding:5px 0"> <a style="color:#6699FF" href="<?php echo base_url();?><?=$url1?>"> Read More. </a> </div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 margn box">
<div class="row">
<div class="col-xs-6 col-md-6 col-sm-6  bg "> <a href="javascript:call_collection(3)"> <img src="<?php echo base_url();?><?=$bottom_top[2]->image?>" class="img-responsive" width="100%"> </a> </div>
<div class="col-xs-6 col-md-6 col-sm-6 bg_content ">
<h4>
<?=$bottom_top[2]->field1?>
</h4>
<h5>
<?=$bottom_top[2]->title?>
</h5>
<p>
<?=ucfirst(strtolower($bottom_top[2]->description))?>
</p>
<div style="text-align:right;"> <a style="color:#6699FF" href="javascript:call_collection(3)"> Read More. </a> </div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 margn box">
<div class="row">
<div class="col-xs-6 col-md-6 col-sm-6  bg"> <a href="<?php print base_url(); ?><?=$url3;?>"> <img src="<?php echo base_url();?><?=$bottom_top[3]->image?>" class="img-responsive" width="100%"></a> </div>
<div class="col-xs-6 col-md-6 col-sm-6 bg_content">
<h4>
<?=$bottom_top[3]->field1?>
</h4>
<h5>
<?=$bottom_top[3]->title?>
</h5>
<p>
<?=$bottom_top[3]->description?>
</p>
<div style="text-align:right;padding:5px 0"> <a style="color:#6699FF" href="<?php print base_url(); ?><?=$url3;?>"> Read More. </a> </div>
</div>
</div>
</div>
</div>
</div>
</div></div>

</div>

<!--bottom slider-->



    

	<script>$(".flexslider").flexslider({animation:"slide",slideshow:false,slideshow:true,});



</script>
<style>
.slides li{border:2px solid #fff;height:210px;margin:0 5px;width:auto!important}
.slides li img{display:block;width:100%;height:auto!important}
.botanica .boxcolor{background:yellowgreen none repeat scroll 0 0;padding:6px}
.botanica img{box-shadow:0 0 0 rgba(0,0,0,0.5)!important}
.botanica a{box-shadow:5px 5px 5px rgba(0,0,0,0.5)}
.botanica .boximg{border:10px solid transparent;border-image:url("http://dev.wallsnart.com/images/contact.png") 20% round}
.onebyone-carosel div > div {
  height: 176px;
  padding-left:0
}

.carousel-inner.onebyone-carosel { margin: auto; width: 90%; }
.onebyone-carosel .active.left { left: -33.33%; }
.onebyone-carosel .active.right { left: 33.33%; }
.onebyone-carosel .next { left: 33.33%; }
.onebyone-carosel .prev { left: -33.33%; }
.carousel-control.left, .carousel-control.right {
  background-image: none;
}

.well {
  background-color: transparent;
  border: medium none;
  box-shadow: none;
  margin-left: 25px;
  margin-right: 10px;
}

#myCarousel2 .left.carousel-control, #myCarousel2 .right.carousel-control {
	width:5%
}

</style>
<script>
$(document).ready(function () {

    $('#addactive').addClass('active');
    $('#myCarousel2').carousel({
        interval: 10000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        if (next.next().next().length > 0) {
            next.next().next().children(':first-child').clone().appendTo($(this));
        }
        if (next.next().next().length > 0) {
            next.next().next().next().children(':first-child').clone().appendTo($(this));
        }
        if (next.next().next().length > 0) {
            next.next().next().next().next().children(':first-child').clone().appendTo($(this));
        }
        else {
			//alert('elss')
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
});
</script>

<style>
.main-container.container {
  padding-bottom: 30px;
}


.carousel.fdi-Carousel.slide {
  background-color: #f5f5f5;
}
.shopTopCategories {
	box-sizing: border-box;
	column-gap: 30px;
	margin: 0 auto -16px;
	max-width: 100%;
	text-align: center;
}
.shopTopCategories .category {
  display: inline-block;
  margin: 0 auto 16px;
}
.shopTopCategories .category a {
	color: #4c4c4c;
	display: block;
	font-family: BebasFamily,BebasNeue,"Bebas Neue",Helvetica,Arial,sans-serif;
	font-size: 17px;
	font-weight: 200;
	letter-spacing: 0.05em;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
}
.shopTopCategories .category {
	display: inline-block;
	margin: 0 auto 16px;
}
.tpl-cb {
  width: 100%;
}
.floatLeft {
  float: left;
}
.white-frame-bg {
	border-color: transparent;
	border-image: url("<?php print base_url(); ?>header_images/white_frame_bg.jpg") 5% round;
	border-style: solid;
	border-width: 10px;
	padding: 5px;
	margin-bottom: 10px;
}

.brown-frame-bg {
  border-color: transparent;
  border-image: url("<?php print base_url(); ?>header_images/brown_frame_bg.jpg") 5% round;
  border-style: solid;
  border-width: 10px;
  padding:5px;
  margin-bottom:10px
}

.black-frame-bg {
  border-color: transparent;
  border-image: url("<?php print base_url(); ?>header_images/black_frame_bg.jpg") 5% round;
  border-style: solid;
  border-width: 10px;
  padding:5px;
  margin-bottom:10px
}

.shopTopCategories .category img {
	height: auto;
	width: 80%;
}
</style>