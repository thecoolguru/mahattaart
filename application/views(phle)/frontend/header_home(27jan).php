<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mahatta Art | Art Prints, Framed Art, and Mahatta Art Collections</title>
<link rel="stylesheet" href="<?php print base_url();?>assets/css/style.css" type="text/css">
<link href="<?php print base_url();?>assets/css/nav.css" rel="stylesheet" type="text/css" />
<link href="<?php print base_url();?>assets/css/wallsnart2.2.css" rel="stylesheet" type="text/css" />
<link href="<?php print base_url();?>assets/css/slider.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php print base_url();?>assets/css/flexslider.css" type="text/css" media="screen" />
<link rel="icon" href="<?php print base_url();?>assets/favicon.png" sizes="24x24" type="image/png">
<script src="<?php print base_url();?>assets/js/jquery-1.8.0.min.js"></script>
<script src="<?php print base_url();?>assets/js/jquery.js"></script>
<script src="<?php print base_url();?>assets/js/jquery.bxslider.min.js"></script>
<script src="<?php print base_url();?>assets/js/thumbnail-slider.js" type="text/javascript"></script>
<script src="<?php print base_url();?>assets/js/custom.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<header role="banner" class="navbar navbar-default">
<div class="news pull-right">
<p style="float:right"> <a href="#" class="header_link"> <i class="glyphicon glyphicon-earphone"></i> 011-41828972</a> &nbsp; &nbsp; <a href="mailto:info@wallsnart.com" class="header_link"> <i class="glyphicon glyphicon-envelope"></i> info@wallsnart.com</a> </p>
</div>
<a id="toggle" href="#"><i class="fa fa-bars"></i></a>
<div id="overlay"></div>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script>$(document).ready(function(){var e=$("[data-toggle=collapse-side]");var d=e.attr("data-target");var f=e.attr("data-target-2");e.click(function(a){$(d).toggleClass("in");$(f).toggleClass("out")})});</script>
<div class="header-content" onmouseover="return dropdownout('drop1','drop2','drop3','drop4','drop5','drop6','drop7','drop8','drop9')">
<div class="col-md-4" style="padding:3px 0"> <a href="<?php print base_url(); ?>"><img src="<?php print base_url(); ?>assets/img/one.png" border="0" width="auto" height="55px" class="fll"></a> </div>
<div class="col-md-3" style="padding:18px 48px;box-sizing:border-box"> <span class="search-input"> <span class="search-input">
<input name="searchtext" id="searchtext" type="text" placeholder="Search What You Want..." value="<?php if((isset($search_text))&&($search_text!="none")){print str_replace('%20', ' ', $search_text); } ?>" onkeydown="return checkSubmit(event)">
</span>
<button type="submit" class="btn tt" onclick="return OnClickSearch()"><i class="glyphicon glyphicon-search"></i></button>
</span> </div>
<div class="col-md-5 help">
<ul style="margin:0;padding:3px 0">
<li> <a href="<?php print base_url(); ?>frontend/contact"> <i class="glyphicon glyphicon-earphone"></i> Help </a> </li>
<li> <a <?php     if(!$this->session->userdata('userid')){?> href="javascript:void(0)" onclick="login('')" <?php  }else{ ?> href="<?php  echo base_url();?>frontend/lightbox" <?php }?>> <i class="glyphicon glyphicon-user"></i> My Gallery </a> </li>
<?php if($this->session->userdata('userid')){
            $user_id=$this->session->userdata('userid');
            $user_data=$this->user_model->get_user_details($user_id);?>
<a href="<?=base_url()?>frontend/logout">Sign Out</a> <a href="<?=base_url()?>user/profile"> Welcome
<?php if ($user_data->first_name){
                        echo $user_data->first_name;
                    }else echo "User";?>
</a>
<?php }else{?>
<li> <a href="#" onclick="return login('')"> <i class="glyphicon glyphicon-lock"></i> Sign up | </a> </li>
<li> <a href="#" onclick="return login('')"> Log in </a> </li>
<?php }
			if($this->session->userdata('userid')){
			?>
<li> <a style="position:relative" href="<?=base_url()?>cart/cart_view"> <i class="glyphicon glyphicon-shopping-cart cart-size"> </i> <span id="HeaderCartCount" class="hdr-cart-count">
<?php if($this->session->userdata('userid')){
                        $num=$this->cart_model->count_cart_byid($this->session->userdata('userid')); $sum=0;foreach($num as $quant){
                            $sum=$sum + $quant['qty'];
                        } print $sum;
                    }

                    else
                    {
                        
    echo '0';}?>
</span> </a> </li>
<?php }if(!$this->session->userdata('userid')){?>
<li> <a style="position:relative" href="#" onclick="return login('')"> <i class="glyphicon glyphicon-shopping-cart cart-size"> </i> <span id="HeaderCartCount" class="hdr-cart-count">0</span> </a> </li>
<? }?>
</ul>
</div>
<div id="slide" style="right:-400px">
<div id="sideba" onclick="open_panel()"><img src="<?php print base_url(); ?>images/contact.png"></div>
<div id="heade">
<div id="results" style="color:red"></div>
<form name="frm_contact" id="contactus_save">
<div class="pull-left" style="display:block;width:100%;margin-bottom:10px">
<div class="pull-left"> <strong>Call us at:</strong><br>
<a href="#"> +91-11-41828972</a></div>
<div class="pull-left"> OR </div>
<div style="margin-left:17px" class="pull-left"> <strong>Mail us at:</strong><br>
<a href="mailto:info@wallsnart.com">info@wallsnart.com</a></div>
</div>
<p class="inline_text">Submit the details below and our client executive will get in touch with you.</p>
<input class="formtex" type="text" name="dname" placeholder="Your Name *" id="dname">
<input class="formtex" type="text" name="demail" placeholder="Your Email *" id="demail">
<input class="formtex" type="text" name="dmobile" placeholder="Your Mobile Number" id="dmobile">
<input class="formtex" type="text" name="dcompany" placeholder="Your Company" id="dcompany">
<input class="formtex" type="text" name="dcity" placeholder="Your City" id="dcity">
<textarea class="formtex" placeholder="Your Query" name="dtarea" id="dtarea"></textarea>
<button class="center-block" id="dsend">Send Message</button>
</form>
</div>
</div>
</header>
<div style="background-color:#999;height:35px">
<div class="offers">
<nav id="menu">
<ul>
<li> <a href="<?php print base_url(); ?>">HOME </a> </li>
<li><a href="<?php print base_url(); ?>frontend/art_subject"> SUBJECTS </a>
<ul>
<div id="mouse-over">
<?php 
           $sub_val=$this->frontend_model->get_header_images(1);
         
          
            ?>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$sub_val[0]->keyword?>"><img src="<?php print base_url();?><?=$sub_val[0]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($sub_val[0]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$sub_val[1]->keyword?>"><img src="<?php print base_url();?><?=$sub_val[1]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($sub_val[1]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$sub_val[2]->keyword?>"><img src="<?php print base_url();?><?=$sub_val[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($sub_val[2]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$sub_val[3]->keyword?>"><img src="<?php print base_url();?><?=$sub_val[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($sub_val[3]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$sub_val[4]->keyword?>"><img src="<?php print base_url();?><?=$sub_val[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($sub_val[4]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$sub_val[5]->keyword?>"><img src="<?php print base_url();?><?=$sub_val[5]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($sub_val[5]->title)?>
</span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer fistn-layer">
<ul class="menu2">
<?php
                       $subjects=$this->search_model->get_subcategory(1);
                        for($i=0;$i<=7;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer fistn-layer">
<ul class="menu2">
<?php
                        for($i=8;$i<=15;$i++){
						
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer fistn-layer">
<ul class="menu2">
<?php
                        for($i=16;$i<=23;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords?>')"><?php print ucwords($subjects[$i]->name);?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer fistn-layer">
<ul class="menu2">
<?php
                        for($i=24;$i<=30;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer fistn-layer">
<ul class="menu2">
<?php
                        for($i=31;$i<=41;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="#"> See all Subjects </a> </a> </div>
</div>
</ul>
</li>
<li> <a href="<?php echo base_url();?>frontend/artists"> ARTISTS </a>
<ul>
<div id="mouse-over">
<?php  
           $drop2=$this->frontend_model->get_header_images(2);
          //print_r($drop2);
          
            ?>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop2[0]->keyword?>"><img src="<?php print base_url();?><?=$drop2[0]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop2[0]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop2[1]->keyword?>"><img src="<?php print base_url();?><?=$drop2[1]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop2[1]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop2[2]->keyword?>"><img src="<?php print base_url();?><?=$drop2[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop2[2]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/michelangelo/3/none/none/none/<?=$drop2[3]->keyword?>"><img src="<?php print base_url();?><?=$drop2[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop2[3]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop2[4]->keyword?>"><img src="<?php print base_url();?><?=$drop2[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop2[4]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop2[5]->keyword?>"><img src="<?php print base_url();?><?=$drop2[5]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop2[5]->title)?>
</span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer">
<ul class="menu2">
<div class="col-md-8" style="width:724px;border-right:solid 1px #FC0;margin:8px 0">
<div class="artist"> <a style="display:block;padding:8px 0;text-align:center;font-weight:600" href="<?php echo base_url();?>frontend/artists">International Artist </a>
<div style="float:left;width:230px">
<?php
                        $subjects=$this->search_model->get_subcategory(84);
						//print_r($subjects);
                        for($i=0;$i<=7;$i++){
                           $artist= $subjects[$i]->name;
                       if($artist!='Deepali Mundra' && $artist!='Narahari Bhawandla' && $artist!='Prashant Yampure' && $artist!='Shweta Sharma' && $artist!='Subhasish Chakravarty' && $artist!='Vinayak Jarang') {
                           
					 
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php }}?>
</div>
<div style="float:left;width:230px">
<?php 
                       for($i=8;$i<=14;$i++){
                           $artist= $subjects[$i]->name;
                       if($artist!='Deepali Mundra' && $artist!='Narahari Bhawandla' && $artist!='Prashant Yampure' && $artist!='Shweta Sharma' && $artist!='Subhasish Chakravarty' && $artist!='Vinayak Jarang') {
					 
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php }}?>
</div>
<div style="float:left;width:230px">
<?php 
					 for($i=15;$i<=22;$i++){
					  $artist= $subjects[$i]->name;
                      if($artist!='Deepali Mundra' && $artist!='Narahari Bhawandla' && $artist!='Prashant Yampure' && $artist!='Shweta Sharma' && $artist!='Subhasish Chakravarty' && $artist!='Vinayak Jarang') {
                           
					 
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php }}?>
</div>
</div>
</div>
<div class="col-md-2">
<div class="artist">
<div style="float:left;margin:8px 0"> <a style="display:block;padding:8px 0;text-align:center;font-weight:600" href="<?php echo base_url();?>frontend/artists"> Indian Artist </a>
<div style="width:230px;float:left">
<?php 
                       for($i=0;$i<=count($subjects);$i++){
					   
					   $artist= $subjects[$i]->name;
                       if($artist=='Deepali Mundra' || $artist=='Narahari Bhawandla' || $artist=='Prashant Yampure' || $artist=='Shweta Sharma' || $artist=='Subhasish Chakravarty' || $artist=='Vinayak Jarang') {
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php }}?>
</div>
<div style="width:230px;float:left"> </div>
</div>
</div>
</div>
<div class="col-md-1">
<div class="col-sm-2" style="width:230px;float:left">
<div style="width:12px;float:left;margin:8px 0">
<div style="width:170px;float:left;border-left:solid 1px #FC0;margin:8px 0;padding:0 10px"> <a style="display:block;padding:8px 0;text-align:center;font-weight:600" href="<?php echo base_url();?>frontend/artists"> NEW & EXCLUSIVE </a>
<div style="width:160px;float:left"> <a href="#"> <img src="<?php print base_url();?>assets/img/art-style/get.JPG" border="0" width="100%"> </a>
<p>Get to know today's </p>
</div>
</div>
</div>
</div>
</div>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center" href="#"> See all Artists </a> </div>
</div>
</ul>
</li>
<li> <a href="<?php echo base_url();?>frontend/art_styles">ART STYLES </a>
<ul>
<div id="mouse-over">
<?php 
           $drop3=$this->frontend_model->get_header_images(3);
          //print_r($drop3);
          
            ?>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop3[0]->keyword?>"><img src="<?php print base_url();?><?=$drop3[0]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop3[0]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop3[1]->keyword?>"><img src="<?php print base_url();?><?=$drop3[1]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop3[1]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop3[2]->keyword?>"><img src="<?php print base_url();?><?=$drop3[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop3[2]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop3[3]->keyword?>"><img src="<?php print base_url();?><?=$drop3[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop3[3]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop3[4]->keyword?>"><img src="<?php print base_url();?><?=$drop3[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop3[4]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop3[5]->keyword?>"><img src="<?php print base_url();?><?=$drop3[5]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop3[5]->title)?>
</span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        $subjects=$this->search_model->get_subcategory(2);
                        for($i=0;$i<=3;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')" onclick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=4;$i<=8;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=9;$i<=13;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name);?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=14;$i<=18;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=19;$i<=25;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="#">See all Art Styles</a> </div>
</div>
</ul>
</li>
<li> <a href="<?php print base_url(); ?>frontend/product_type">PRODUCTS</a>
<ul>
<div id="mouse-over">
<?php 
           $drop5=$this->frontend_model->get_header_images(4);
          //print_r($drop5);
          
            ?>
<div>
<div class="product-up product-our col-md-3">
<p style="padding:5px 0;font-size:18px"> <?php echo ucwords($drop5[0]->title)?> </p>
<a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop5[0]->keyword?>"><img src="<?php print base_url();?><?=$drop5[0]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1">
</span></a></div>
<div class="product-up2 product-our col-md-3">
<p style="padding:5px 0;font-size:18px"> <?php echo ucwords($drop5[1]->title)?> </p>
<a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop5[1]->keyword?>"><img src="<?php print base_url();?><?=$drop5[1]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1">
</span></a></div>
<div class="product-up product-our col-md-3">
<p style="padding:5px 0;font-size:18px"> <?php echo ucwords($drop5[2]->title)?> </p>
<a href="<?php print base_url(); ?>search/search_canvas/none/1/64/<?=$drop5[2]->keyword?>"><img src="<?php print base_url();?><?=$drop5[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1">
</span></a> </div>
<div class="product-up product-our col-md-3">
<p style="padding:5px 0;font-size:18px"> <?php echo ucwords($drop5[3]->title)?> </p>
<a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop5[3]->keyword?>"><img src="<?php print base_url();?><?=$drop5[3]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1">
</span></a> </div>
</div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer">
<ul class="menu2">
</ul>
</div>
<div class="n-layer">
<ul class="menu2">
</ul>
</div>
<div class="n-layer">
<ul class="menu2">
</ul>
</div>
<div class="n-layer">
<ul class="menu2">
<?php
                        for($i=24;$i<=30;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer">
<ul class="menu2">
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="#">See all Products</a> </div>
</div>
</ul>
</li>
<li><a href="<?php print base_url(); ?>frontend/collection">COLLECTIONS</a>
<ul>
<div id="mouse-over">
<?php 
           $drop4=$this->frontend_model->get_header_images(5);
          //print_r($drop4);
          
            ?>
<div class="collections-one collct ourcol-md-3">
<p style="padding:5px 0;font-size:18px">
<?=$drop4[0]->title?>
</p>
<a href="#"><img src="<?php print base_url();?><?=$drop4[0]->menu_image?>" border="0" width="100%" style="padding:0 0 5px 0" /></a>
<?php   $collection=$this->search_model->get_subcategory(85);
				 
                  // print_r($collection);
                    ?>
<br />
<ul style="padding:36px 0">
<?php 
						   $api_collections=$this->frontend_model->get_collection();
           
                           // print_r($api_collections);
                           foreach($api_collections as $result){ 
                      $category= $result['category'];
					  $id= $result['id'];
                          if($category==4){
					   echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
					   
                       }// end loop
                               
                              
                           ?>
</ul>
</div>
<div class="collections-one collct col-md-3">
<p style="padding:5px 0;font-size:18px">
<?=$drop4[1]->title?>
</p>
<a href="#"><img src="<?php print base_url();?><?=$drop4[1]->menu_image?>" border="0" width="100%" style="padding:0 0 5px 0" /></a> <br />
<ul style="padding:36px 0">
<?php 
                           
                   // print_r($api_collections);
                           foreach($api_collections as $result){ 
                      $category= $result['category'];
					  $id= $result['id'];
                          if($category==2){
					   echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
					   
                       }// end loop
                              
                           ?>
</ul>
</div>
<div class="collections-one collct col-md-3">
<p style="padding:5px 0;font-size:18px">
<?=$drop4[2]->title?>
</p>
<a href="#"><img src="<?php print base_url();?><?=$drop4[2]->menu_image?>" border="0" width="100%" style="padding:0 0 5px 0" /></a> <br />
<ul style="padding:36px 0">
<?php 
                           
                   /// print_r($api_collections);
                           foreach($api_collections as $result){ 
                      $category= $result['category'];
					  $id= $result['id'];
                          if($category==3){
					   echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
					   
                       }// end loop
                              
                           ?>
</ul>
</div>
<div class="collections-one collct col-md-3">
<p style="padding:5px 0;font-size:18px">
<?=$drop4[3]->title?>
</p>
<a href="#"><img src="<?php print base_url();?><?=$drop4[3]->menu_image?>" border="0" width="100%" style="padding:0 0 5px 0" /></a> <br />
<ul class="menu2">
<ul style="padding:36px 0">
<?php 
                           
                   /// print_r($api_collections);
                           foreach($api_collections as $result){ 
                      $category= $result['category'];
					  $id= $result['id'];
                          if($category==1){
					   echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
					   
                       }// end loop
                              
                           ?>
</ul>
</ul>
</div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer">
<ul class="menu2">
</ul>
</div>
<div class="n-layer"> </div>
<div class="n-layer">
<ul class="menu2">
</ul>
</div>
<div class="n-layer"> </div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="#">See all Collections</a></a> </div>
</div>
</ul>
</li>
<li> <a href="<?php print base_url(); ?>frontend/rooms">ROOMS</a>
<ul>
<div id="mouse-over">
<?php 
           $drop6=$this->frontend_model->get_header_images(6);
          //print_r($drop6);
          
		    $spit0= split('/',$drop6[0]->keyword);
			 $spit1= split('/',$drop6[1]->keyword);
			  $spit2= split('/',$drop6[2]->keyword);
			   $spit3= split('/',$drop6[3]->keyword);
			    $spit4= split('/',$drop6[4]->keyword);
				 $spit5= split('/',$drop6[5]->keyword);
				
                                     if($spit0[1]=='frontend'){
                                              $url0=$drop6[0]->keyword;
                                          }else{
                                              $url0="search/dosearch/none/1/64/".$drop6[0]->keyword."";
                                          }if($spit1[1]=='frontend'){
                                              $url1=$drop6[1]->keyword;
                                          }else{
                                              $url1="search/dosearch/none/1/64/".$drop6[1]->keyword."";
                                          }if($spit2[1]=='frontend'){
                                              $url2=$drop6[2]->keyword;
                                          }else{
                                              $url2="search/dosearch/none/1/64/".$drop6[2]->keyword."";
                                          }if($spit3[1]=='frontend'){
                                              $url3=$drop6[3]->keyword;
                                          }else{
                                              $url3="search/dosearch/none/1/64/".$drop6[3]->keyword."";
                                          }if($spit4[1]=='frontend'){
                                              $url4=$drop6[4]->keyword;
                                          }else{
                                              $url4="search/dosearch/none/1/64/".$drop6[4]->keyword."";
                                          }if($spit5[1]=='frontend'){
                                              $url5=$drop6[5]->keyword;
                                          }else{
                                              $url5="search/dosearch/none/1/64/".$drop6[5]->keyword."";
                                          }
										 
		  //echo $url2.'_'.$url;
            ?>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url0?>"><img src="<?php print base_url();?><?=$drop6[0]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop6[0]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url1?>"><img src="<?php print base_url();?><?=$drop6[1]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop6[1]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url2?>"><img src="<?php print base_url();?><?=$drop6[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop6[2]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url3?>"><img src="<?php print base_url();?><?=$drop6[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop6[3]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url4?>"><img src="<?php print base_url();?><?=$drop6[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop6[4]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url5?>"><img src="<?php print base_url();?><?=$drop6[5]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop6[5]->title)?>
</span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        $subjects=$this->search_model->get_subcategory(859);
                        for($i=0;$i<=5;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')" onClick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=6;$i<=11;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=12;$i<=17;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name);?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=18;$i<=22;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=23;$i<=29;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="#">See all Rooms</a> </div>
</div>
</ul>
</li>
<li> <a href="<?php print base_url(); ?>frontend/places">PLACES</a>
<ul>
<div id="mouse-over">
<?php 
           $drop7=$this->frontend_model->get_header_images(7);
          //print_r($drop7);
          
            ?>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop7[0]->keyword?>"><img src="<?php print base_url();?><?=$drop7[0]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop7[0]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop7[1]->keyword?>"><img src="<?php print base_url();?><?=$drop7[1]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop7[1]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop7[2]->keyword?>"><img src="<?php print base_url();?><?=$drop7[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop7[2]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop7[3]->keyword?>"><img src="<?php print base_url();?><?=$drop7[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop7[3]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop7[4]->keyword?>"><img src="<?php print base_url();?><?=$drop7[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop7[4]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop7[5]->keyword?>"><img src="<?php print base_url();?><?=$drop7[5]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop7[5]->title)?>
</span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        $subjects=$this->search_model->get_subcategory(857);
                        for($i=0;$i<=4;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')" onclick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=5;$i<=10;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=11;$i<=15;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name);?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=15;$i<=20;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=21;$i<=25;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=26;$i<=26;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="#">See all Places </a></a> </div>
</div>
</ul>
</li>
<li> <a href="<?php print base_url(); ?>frontend/themes">THEMES</a>
<ul>
<div id="mouse-over">
<?php 
           $drop8=$this->frontend_model->get_header_images(8);
          //print_r($drop8);
          
            ?>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop8[0]->keyword?>"><img src="<?php print base_url();?><?=$drop8[0]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop8[0]->keyword)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop8[1]->keyword?>"><img src="<?php print base_url();?><?=$drop8[1]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop8[1]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop8[2]->keyword?>"><img src="<?php print base_url();?><?=$drop8[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop8[2]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$drop8[3]->keyword?>"><img src="<?php print base_url();?><?=$drop8[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop8[3]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/Jesus%20Christ/3/none/none/none/<?=$drop8[4]->keyword?>"><img src="<?php print base_url();?><?=$drop8[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop8[4]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/none/1/64/sunrise/3/none/none/none/<?=$drop8[5]->keyword?>"><img src="<?php print base_url();?><?=$drop8[5]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop8[5]->title)?>
</span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        $subjects=$this->search_model->get_subcategory(880);
                        for($i=0;$i<=4;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')" onclick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=5;$i<=10;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=11;$i<=15;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name);?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=16;$i<=20;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=21;$i<=25;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php
                        for($i=26;$i<=26;$i++){
                            ?>
<li> <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a> </li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="#">See all Themes </a></a> </div>
</div>
</ul>
</li>
<li> <a href="#">MAHATTA DESIGNS</a>
<ul class="normal-sub">
<li style="width:150px"> <a style="padding:6px 16px 10px 10px" href="<?php print base_url(); ?>frontend/curators"> Curators </a> </li>
<li style="width:150px"> <a style="padding:6px 16px 10px 10px" href="<?php print base_url(); ?>frontend/curators"> Testimonials </a> </li>
</ul>
</li>
</ul>
</nav>
</div>
</div>
<div id="blank" onmouseover="dropdownout('')">&nbsp;</div>

<div class="offers">
<div class="col-md- off">
<div id="skinnybanner_stp" class="walbanner">
<div class="bannerText bannerText_single"> <span class="bannerOffer"> BETA VERSION | LAUNCHING SOON
</span>
<div id="banner-terms-link" class="bannerExpText">
</div>
</div>
</div>
</div>
</div>
<style>/*<![CDATA[*/.slides li{border:2px solid #fff;height:210px;margin:0 5px;width:auto!important}.slides li img{display:block;width:100%;height:auto!important}.botanica .boxcolor{background:yellowgreen none repeat scroll 0 0;padding:6px}.botanica img{box-shadow:0 0 0 rgba(0,0,0,0.5)!important}.botanica a{box-shadow:5px 5px 5px rgba(0,0,0,0.5)}.botanica .boximg{border:10px solid transparent;border-image:url("<?php print base_url(); ?>images/contact.png") 20% round}.gallery1{float:left;width:339px;margin:20px 25px}.gallery2{height:400px;float:left;width:536px;position:relative;padding:20px;margin:0 0 0 30px}.onediv,.twodiv,.threediv,.fourdiv{position:absolute;width:220px;height:165px;overflow:hidden}.onediv{margin:auto;top:0;left:0}.twodiv{margin:auto;top:30px;right:0;margin:10px 0}.threediv{margin:auto;bottom:30px;left:0}.fourdiv{margin:auto;bottom:0;right:0;margin:10px 0}.one-child{position:absolute;bottom:0;background:rgba(0,0,0,.5);width:100%;text-align:center}.gallery2 p,a{color:#000;text-decoration:none;margin:0}.one-child p{padding:5px 0;font-size:15px}.one-child a{padding:0 0 5px 0;display:block;font-size:15px}.one-child a:hover{color:#FFF;font-size:15px}.gallery12{shadow:-webkit-box-shadow:37px 43px 57px -26px rgba(0,0,0,0.5);-moz-box-shadow:37px 43px 57px -26px rgba(0,0,0,0.5);box-shadow:37px 43px 57px -26px rgba(0,0,0,0.5)}[class$="div"]{shadow:-webkit-box-shadow:0 3px 75px -2px rgba(0,0,0,0.75);-moz-box-shadow:0 3px 75px -2px rgba(0,0,0,0.75);box-shadow:0 3px 75px -2px rgba(0,0,0,0.75)}.text-font{display:inline-block;width:100%;font-size:35pt;font-family:Oswald;font-weight:normal;color:#fff;text-shadow:2px 2px 15px #222;letter-spacing:1px;line-height:100%}.text-font2{display:inline-block;width:100%;font-weight:normal;color:#fff;font-size:35pt;font-family:Oswald;letter-spacing:1px;letter-spacing:1px;line-height:100%}.buttonslide span{width:33%;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-weight:normal;display:inline-block}.buttonslide{background-color:rgba(46,52,60,0.50);border:1px solid #fff;padding:14px 0;color:#FFF;font-size:20px;text-align:center;margin:0}.centers{display:inline-block;width:100%;padding-top:5px;font:13pt arial;font-weight:normal;color:#fff;letter-spacing:0}.botanica{float:left;width:20%;margin:0 auto;text-align:center}.first-a img{height:100%;width:100%}.first-a>a{display:inline-block;height:200px;width:210px}.first-b img{height:100%;width:100%}.first-b>a{display:inline-block;height:150px;width:210px}.botanica img{-moz-box-shadow:5px 5px 5px rgba(0,0,0,0.5);-webkit-box-shadow:5px 5px 5px rgba(0,0,0,0.5);box-shadow:5px 5px 5px rgba(0,0,0,0.5)}.modern-b img,.modern-a img{height:100%;width:100%}.modern-a>a{display:inline-block;height:180px;width:205px}.modern-b>a{display:inline-block;height:170px;width:205px}.fiine-a img{height:100%;width:100%}.fiine-a>a{display:inline-block;height:230px;width:180px}.animals-b img{height:100%;width:100%}.animals-b>a{display:inline-block;height:150px;width:210px}.photography img{height:100%;width:100%}.photography>a{display:inline-block;height:190px;width:210px}.photography-b img{height:100%;width:100%}.photography-b>a{display:inline-block;height:200px;width:180px}figcaption{margin:10px 0;text-transform:uppercase;margin:10px 0;text-transform:uppercase;font-size:17px;letter-spacing:.03em;color:#4c4c4c}.margn h4{text-transform:uppercase;font-weight:500;font-family:'BebasNeueRegular'!important;font-size:25px;margin:5px 0}.margn h5{text-transform:uppercase;font-weight:500;font-family:'BebasNeueRegular'!important;font-size:23px;margin:5px 0}.frame-our{position:relative;width:20%;float:left}.frame-our>img:first-child{-webkit-box-shadow:10px 10px 16px -4px rgba(0,0,0,0.75);-moz-box-shadow:10px 10px 16px -4px rgba(0,0,0,0.75);box-shadow:10px 10px 16px -4px rgba(0,0,0,0.75)}.divw{width:210px;height:200px}.divw img{-webkit-box-shadow:10px 10px 16px -4px rgba(0,0,0,0.75);-moz-box-shadow:10px 10px 16px -4px rgba(0,0,0,0.75);box-shadow:10px 10px 16px -4px rgba(0,0,0,0.75)}.caption2{left:-23%;text-align:center;top:9%;text-align:inherit;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif}.caption3{right:0;left:40%;width:100%;top:53%}.welcomee{text-align:center;width:56%;margin:0 auto}.welcomee2{width:49%;margin:0 auto}.welcomee2 a:hover,.welcomee a:hover{color:#F90!important}#dsend{background:none repeat scroll 0 0 orange;border:0;color:#fff;width:60%;font-size:22px;font-weight:bolder;padding:3px;border-radius:3px;cursor:pointer;margin-top:20px}#slide{width:572px;top:100px;z-index:9;top:0;bottom:0;position:fixed}#heade{margin-top:50px;width:400px;height:530px;position:absolute;right:0;border:1px solid #d8d8d8;margin-left:40px;padding:20px 40px;border-radius:3px;background:white;box-shadow:0 0 8px gray}#sideba{position:absolute;top:180px;left:125px;box-shadow:0 0 8px gray}#sideba img{cursor:pointer}#sidebar1 img{cursor:pointer}#sidebar1{position:absolute;top:180px;left:128px;box-shadow:0 0 8px gray}h3{font-family:'Roboto Slab',serif}.formtex{margin-top:10px;padding:6px;width:100%;font-size:15px;border-radius:2px;border:3px solid #98d0f1}h4{font-size:15px}/*]]>*/</style>
<style>.product-up p,.product-up2 p{text-align:center!important}p{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;margin:inherit}div#overlay{display:none}a#toggle{position:fixed;top:10px;left:10px;width:40px;height:40px;background-color:#444;text-align:center;color:white;display:none;transition:all ease-out .3s}.artist li{float:none!important}.artstyle2{width:199px!important}a#toggle i{position:relative;top:50%;transform:translateY(-50%)}main#content{padding:10px}#menu{text-align:center;transition:all ease-out .3s}#menu ul{margin:0;padding:0;position:relative}#menu ul li{float:left}.menu2 li{float:none!important}#menu ul li ul li a{font-size:15px;!important}#menu ul li>a{display:block;color:#FFF;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;padding:11px 16px 10px 0;font:13px/100% HelveticaNeue,"Helvetica Neue",Helvetica,Arial,sans-serif;letter-spacing:1.25px}.fistn-layer{width:20%}#menu .menu2 li a{padding:5px 13px;letter-spacing:inherit!important}#menu ul li>a>i{margin-left:15px;transition:all ease-out .3s;-webkit-transition:all ease-out .1s}.menu2{width:auto!important}#menu ul li ul{display:none;position:absolute;top:16px;width:200px;text-align:left;margin:auto;left:0;width:100%;margin:0 auto;right:0}#menu .menu2{position:static!important}#menu .menu2 li a{color:#000!important}#menu ul li ul li{display:block}#menu ul li ul li a{display:block}#menu li>a:hover{color:#ff9800;text-decoration:none}#menu .menu2 li:hover>a{color:#e19a28!important}#menu ul li:hover>a>i{transform:rotateZ(90deg);text-decoration:none}#menu ul li:hover ul{display:block}#mouse-over{width:100%;background:#fff;padding:12px;position:absolute;top:16px;left:0;border:3px solid #e19a28;min-height:470px;-webkit-box-shadow:0 6px 7px #CCC;-moz-box-shadow:0 6px 7px #CCC;box-shadow:0 6px 7px #CCC;z-index:9999}#sub-pic{width:197px;float:left;height:200px;padding:10px}#sub-pi img{float:left}.n-layer{float:left}.rowour{background-color:##f7f7f7;width:100%}#menu ul li>a>i{display:none}.collections-one ul{margin-top:255px!important}.collections-one ul{line-height:15px}.collections-one ul li>a{padding:3px 18px!important;color:#000!important}.collections-one li>a:hover{color:#e19a28!important}.normal-sub{left:inherit!important;width:192px!important;z-index:9999;top:34px!important;margin:0 19% 0 0!important}.collct{width:294px}.collct ul li{float:none!important}.product-our{width:294px}.normal-sub li a{background-color:rgba(0,0,0,0.6)}.normal-sub li a:hover{background-color:rgba(0,0,0,0.8)}.artist{float:left}@media screen and (max-width:767px){a#toggle{display:block}#menu ul li>a>i{display:block}.artist{float:none;width:auto}main#content{margin-top:65px;transition:all ease-out .3s}.n-layer{float:none}#menu{position:fixed;width:250px;height:100%;top:0;left:0;overflow:hidden;overflow-y:auto;background-color:#444;transform:translateX(-250px)}#menu ul{text-align:left;background-color:transparent}#menu ul li{display:block}#menu ul li a{display:block}#menu ul li a>i{float:right}#menu ul li ul{display:none;position:static;width:100%}#menu ul li:hover>ul{display:none}#menu ul li:hover>a>i{transform:rotateZ(0)}#menu ul li.open>a{background-color:#444}#menu ul li.open>a>i{transform:rotateZ(90deg)}#menu ul li.open>ul{display:block}div#overlay{display:block;visibility:hidden;position:fixed;left:0;top:0;width:100%;height:100%;background-color:#444;transition:all ease-out .3s;z-index:1;opacity:0}html.open-menu{overflow:hidden}html.open-menu div#overlay{visibility:visible;opacity:1;width:calc(-150%);left:250px}html.open-menu a#toggle,html.open-menu main#content{transform:translateX(250px)}html.open-menu nav#menu{z-index:3;transform:translateX(0)}#mouse-over{position:static}.n-layer,#mouse-over{width:auto}</style>
