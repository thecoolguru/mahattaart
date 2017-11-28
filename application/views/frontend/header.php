<?php //echo $action;?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Mahatta Art | Art Prints, Framed Art, and Mahatta Art Collections</title>
 <meta name="description" content="5 Lac+ Artworks from 2500+ artists, Giclee Fine Art Prints &amp; 100+ Framing options at Affordable Prices online. Upload | Photo Printing | Photo frame . Paintings for sale , Canvas painting , Wall painting , Abstract Painting , Modern , Ganesh , Buddha , Landscape , Wall hanging , Buy Living Room &amp; Bed Room Paintings." />
 <meta name="keywords" content="Paintings Online, Art Online, Artworks Online, Painting Online India, Art Online India, Artworks Online India, Wall Paintings Online, Indian Art, Framed Paintings, Original Paintings Online, Canvas Paintings, Oil Paintings, Mahattaart, 
Online Shopping of Paintings, Commissioned Art, Customized Art, Big Large Paintings, Online Art Gallery India, Art for Sale, Indian Artists, Contemporary Art, Wall Art, Living Room Paintings, Bed Room Paintings" />

<!-- header -->
<link rel="stylesheet" href="<?php print base_url();?>assets/css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!--<link rel="stylesheet" href="<?php print base_url();?>assets/css/bootstrap.min.css">-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="icon" href="<?php print base_url();?>assets/favicon.png" sizes="24x24" type="image/png">

<!-- stylesheet css -->
<link rel="stylesheet" href="<?php print base_url();?>assets/css/style.css" type="text/css">
<link href="<?php print base_url();?>assets/css/nav.css" rel="stylesheet" type="text/css" />
<link href="<?php print base_url();?>assets/css/wallsnart2.2.css" rel="stylesheet" type="text/css" />
<link href="<?php print base_url();?>assets/css/slider.css" rel="stylesheet" type="text/css" />
<link href="<?php print base_url();?>assets/css/jquery.bxslider.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php print base_url();?>assets/css/flexslider.css" type="text/css" media="screen" />
<link href="<?php print base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php print base_url();?>assets/css/gallery.css" type="text/css"/>
<link href="<?php print base_url();?>assets/css/responsive-code.css" rel="stylesheet" type="text/css" />

 <!-- jquery -->    
<!-- <script src="<?php //print base_url();?>assets/js/jquery-1.8.0.min.js"></script> -->

<script src="<?php print base_url();?>assets/js/jQuery-3.2.1.min.js"></script>
<script src="<?php print base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php print base_url();?>assets/js/jquery.bxslider.min.js"></script>
<script src="<?php print base_url();?>assets/js/jquery.js"></script>
<script src="<?php print base_url();?>assets/js/thumbnail-slider.js" type="text/javascript"></script>
<script src="<?php print base_url();?>assets/js/custom.js"></script>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107710559-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-107710559-1');
</script>
<?php if($this->session->flashdata('help_message')){//print $this->session->flashdata('help_message'); ?>
<?php } ?>
</head>

<body>
<input type="hidden" id="mail_filename" value="<?=$image_detail[0]['image_filename'];?>">
 <input type="hidden" id="mail_image_id" value="<?=$image_detail[0]['image_id'];?>">
    <div id="wrapper">
        <div class="overlay"></div>
       <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li>
                    <a href="<?php print base_url(); ?>">HOME </a>
                </li>

                <li>
                    <a href="<?php print base_url(); ?>frontend/art_subject"> SUBJECTS  </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>frontend/artists">ARTISTS  </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>frontend/art_styles">ART STYLES  </a>
                </li>
                <li>
                    <a href="<?php print base_url(); ?>frontend/collection">COLLECTIONS </a>
                </li>
                <li>
                    <a href="<?php print base_url(); ?>frontend/rooms">ROOMS </a>
                </li>
                <li>
                    <a href="<?php print base_url(); ?>frontend/places">PLACES </a>
                </li>
                <li>
                    <a href="<?php print base_url(); ?>frontend/themes">THEMES </a>
                </li>
                <li>
                    <a href="<?php print base_url(); ?>frontend/photostoframe" style="color:#ff9800">PHOTOS TO FRAME</a>
                </li>
                <li>
                    <a href="<?php print base_url(); ?>frontend/clearance" style="color:#f1464f"> CLEARANCE </a>
                </li>
                <li> <a href="<?php print base_url(); ?>frontend/promooffer"> PROMOTIONAL OFFER </a></li>
                <!--<li>
                    <a href="#">Frame your art  </a>
                </li>
                <li>
                    <a href="#">Product Page </a>
                </li>-->
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <style>
.nav .open > a, 
.nav .open > a:hover, 
.nav .open > a:focus {background-color: transparent;}

/*-------------------------------*/
/*           Wrappers            */
/*-------------------------------*/

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 220px;
}

#sidebar-wrapper {
    z-index: 2000;
    left: 220px;

    width: 0;
    height: 100%;
    margin-left: -220px;
    overflow-y: auto;
    overflow-x: hidden;
    background: #1a1a1a;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#sidebar-wrapper::-webkit-scrollbar {
  display: none;
}

#wrapper.toggled #sidebar-wrapper {
    width: 220px;
}

#page-content-wrapper {
    width: 100%;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -220px;
    top:0
}

/*-------------------------------*/
/*     Sidebar nav styles        */
/*-------------------------------*/

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 220px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    position: relative; 
    line-height: 20px;
    display: inline-block;
    width: 100%;
}

.sidebar-nav li:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    height: 100%;
    width: 0;
    background-color: #303030;
    -webkit-transition: width .2s ease-in;
	-moz-transition:  width .2s ease-in;
	-ms-transition:  width .2s ease-in;
	transition: width .2s ease-in;

}
.sidebar-nav li:hover:before,
.sidebar-nav li.open:hover:before {
    width: 100%;
    -webkit-transition: width .2s ease-in;
      -moz-transition:  width .2s ease-in;
       -ms-transition:  width .2s ease-in;
            transition: width .2s ease-in;

}

.sidebar-nav li a {
    display: block;
    color: #ddd;
    text-decoration: none;
    padding: 10px 15px 10px 30px;    

}

.sidebar-nav li a:hover,
.sidebar-nav li a:active,
.sidebar-nav li a:focus,
.sidebar-nav li.open a:hover,
.sidebar-nav li.open a:active,
.sidebar-nav li.open a:focus{
    color: #fff;
    text-decoration: none;
    background-color: transparent;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 20px;
    line-height: 44px;
}
.sidebar-nav .dropdown-menu {
    position: relative;
    width: 100%;
    padding: 0;
    margin: 0;
    border-radius: 0;
    border: none;
    background-color: #222;
    box-shadow: none;
}

/*-------------------------------*/
/*       Hamburger-Cross         */
/*-------------------------------*/

.hamburger {
  position: absolute;
  top: 20px;  
  z-index: 999;
  display: block;
  width: 32px;
  height: 32px;
  margin-left: 15px;
  background: transparent;
  border: none;
  display:none;
}
.hamburger:hover,
.hamburger:focus,
.hamburger:active {
  outline: none;
}
.hamburger.is-closed:before {
  content: '';
  display: block;
  width: 100px;
  font-size: 14px;
  color: #fff;
  line-height: 32px;
  text-align: center;
  opacity: 0;
  -webkit-transform: translate3d(0,0,0);
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed:hover:before {
  opacity: 1;
  display: block;
  -webkit-transform: translate3d(-100px,0,0);
  -webkit-transition: all .35s ease-in-out;
}

.hamburger.is-closed .hamb-top,
.hamburger.is-closed .hamb-middle,
.hamburger.is-closed .hamb-bottom,
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-middle,
.hamburger.is-open .hamb-bottom {
  position: absolute;
  left: 0;
  height: 4px;
  width: 100%;
}
.hamburger.is-closed .hamb-top,
.hamburger.is-closed .hamb-middle,
.hamburger.is-closed .hamb-bottom {
  background-color: #fff;
}
.hamburger.is-closed .hamb-top { 
  top: 5px; 
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed .hamb-middle {
  top: 50%;
  margin-top: -2px;
}
.hamburger.is-closed .hamb-bottom {
  bottom: 5px;  
  -webkit-transition: all .35s ease-in-out;
}

.hamburger.is-closed:hover .hamb-top {
  top: 0;
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed:hover .hamb-bottom {
  bottom: 0;
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-middle,
.hamburger.is-open .hamb-bottom {
  background-color: #1a1a1a;
}
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-bottom {
  top: 50%;
  margin-top: -2px;  
}
.hamburger.is-open .hamb-top { 
  -webkit-transform: rotate(45deg);
  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
}
.hamburger.is-open .hamb-middle { display: none; }
.hamburger.is-open .hamb-bottom {
  -webkit-transform: rotate(-45deg);
  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
}
.hamburger.is-open:before {
  content: '';
  display: block;
  width: 100px;
  font-size: 14px;
  color: #fff;
  line-height: 32px;
  text-align: center;
  opacity: 0;
  -webkit-transform: translate3d(0,0,0);
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-open:hover:before {
  opacity: 1;
  display: block;
  -webkit-transform: translate3d(-100px,0,0);
  -webkit-transition: all .35s ease-in-out;
}

/*-------------------------------*/
/*            Overlay            */
/*-------------------------------*/

.overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(250,250,250,.8);
    z-index: 1;
}
	</style>
    
    <script>
	$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;


      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});
	</script>


<header role="banner" class="navbar navbar-default" style="min-height:auto">
<div class="news">
<span class="sicon"> FLAT 20% OFF SITEWIDE</span>
<span class="sicon2"> <a href="#" class="header_link"> <i class="glyphicon glyphicon-earphone"></i> +91-8800639075</a> &nbsp; &nbsp; <a href="mailto:info@mahattaart.com" class="header_link"> <i class="glyphicon glyphicon-envelope"></i> info@mahattaart.com</a> </span>
</div>
</header>
<style>.search-input:focus+button{z-index:3}</style>
<div class="header-content container" onMouseOver="return dropdownout('drop1','drop2','drop3','drop4','drop5','drop6','drop7','drop8','drop9')">
<div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12">
    <a href="<?php  echo base_url();?>">
    <img class="fll img-responsive logo_mg" src="<?php  echo base_url();?>assets/img/one.png" style="margin: 0 auto;" /></a>
   	</div>
    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12">

<div id="imaginary_container"> 
    <div class="input-group stylish-input-group">
        <input type="text" class="form-control" name="searchtext" id="searchtext" placeholder="Search What You Want..." value="<?php if((isset($search_text))&&($search_text!="none")){ if(is_numeric($search_text)==false){ echo str_replace('%20', ' ', $search_text); }} ?>" onKeyDown="return checkSubmit(event)" style="
    border-radius: 0;    height: 30px;    box-shadow: inset 0 1px 1px rgba(0,0,0,0);"/>
        <span class="input-group-addon">
            <button type="submit" onClick="return OnClickSearch()">
                <span class="glyphicon glyphicon-search"></span>
            </button>  
        </span>
    </div>
</div>
            
<style>
	#imaginary_container {
	margin-top: 10px;
	}
	.stylish-input-group .input-group-addon {
	background: white !important;
	border-radius: 0;
	padding: 0 12px;
	}
	.stylish-input-group button {
	border: 0;
	background: transparent;
	}
</style>        

    
    </div>
    <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 help">
    <ul class="nav navbar-nav navbar-right menu-list text-center" style="margin-right:0">
<li> <a href="<?php print base_url(); ?>frontend/contact"> <i class="glyphicon glyphicon-earphone"></i> Help </a> </li>
<li> <a <?php if(!$this->session->userdata('userid')){?> href="javascript:void(0)" onclick="login('')" <?php }else{ ?> href="<?php echo base_url();?>frontend/myUpload" <?php }?>></i> My Upload </a> </li>
<!--<li> <a href="<?php print base_url(); ?>frontend/myUpload"> <i class="glyphicon glyphicon-upload"></i> My Upload </a> </li>-->
<li> <a <?php   if(!$this->session->userdata('userid')){?> href="javascript:void(0)" onclick="login('')" <?php  }else{ ?> href="<?php  echo base_url();?>frontend/lightbox" <?php }?>> <i class="glyphicon glyphicon-user"></i> My Gallery </a> </li>
<?php if($this->session->userdata('userid')){
            $user_id=$this->session->userdata('userid');
            $user_data=$this->user_model->get_user_details($user_id);?>
<li><a href="<?=base_url()?>frontend/logout">Sign Out</a></li>
 <li>
  	<a href="<?=base_url()?>user/profile"> Welcome
		<div style="position:absolute; right:0; bottom:-5px; white-space:nowrap">
			<?php if ($user_data->first_name){
                        echo $user_data->first_name;
                    }else $email=$user_data->email_id;
					echo  substr($email,0,12);?>
        </div>
    </a>
</li>
<?php }else{?>
<li> <a href="#" onClick="return login('')"> <i class="glyphicon glyphicon-lock"></i> Sign up | </a> </li>
<li> <a href="#" onClick="return login('')"> Log in </a> </li>

<?php }
			if($this->session->userdata('userid')){
			?>
<li> <a style="position:relative" href="<?=base_url()?>cart/cart_view"> <i class="glyphicon glyphicon-shopping-cart cart-size"> </i> <span id="HeaderCartCount" class="hdr-cart-count cart_add">
<?php if($this->session->userdata('userid')){
                        $num=$this->cart_model->count_cart_byid($this->session->userdata('userid')); $sum=0;foreach($num as $quant){
                            $sum=$sum + $quant['qty'];
                        } print $sum;
                    }else {
                    echo '0';}?>
</span> </a> </li>
<?php }if(!$this->session->userdata('userid')){?>
<li> <a style="position:relative" href="#" onClick="return login('')"> <i class="glyphicon glyphicon-shopping-cart cart-size"> </i> <span id="HeaderCartCount" class="hdr-cart-count">0</span> </a> </li>
<? }?>
</ul>
  </div>
	   <div id="slide" style="right:-405px;">
              <div id="sidebar1" onClick="close_panel()"><img src="http://beta.mahattaart.com/images/contact.png"></div>
                <div id="heade">
                  <div id="results" style="color:red"></div>
                  <form name="frm_contact" id="contactus_save" style="position:relative; margin:30px 0">
                  <div class="pull-left" style="display:block;width:100%;margin-bottom:10px">
                      <div class="pull-left">
                          <strong>Call us at:</strong><br>
                          <a href="#"> +91-8800639075</a>
                      </div>
                      <div class="pull-left"> OR </div>
                      <div style="margin-left:17px" class="pull-left"> <strong>Mail us at:</strong><br>
                      	<a href="mailto:info@mahattaart.com">info@mahattaart.com</a>
                      </div>
                  </div>
                  <p class="inline_text">Submit the details below and our client executive will get in touch with you.</p>
                  <input class="formtex" type="text" name="dname" placeholder="Your Name *" id="dname">
                  <input class="formtex" type="text" name="demail" placeholder="Your Email *" id="demail">
                  <input class="formtex" type="text" name="dmobile" placeholder="Your Mobile Number" id="dmobile">
                  <input class="formtex" type="text" name="dcompany" placeholder="Your Company" id="dcompany">
                  <input class="formtex" type="text" name="dcity" placeholder="Your City" id="dcity">
                  <textarea class="formtex" placeholder="Your Query" name="dtarea" id="dtarea"></textarea>
                  <button class="center-block" id="dsend">Submit</button>
                  </form>
                </div>
            </div>
</div></div>

<style>
#dsend {
	background: none repeat scroll 0 0 orange;
	border: 0;
	color: #fff;
	/* width: 50%; */
	font-size: 16px;
	/* font-weight: bold; */
	padding: 8px 30px;
	border-radius: 3px;
	cursor: pointer;
	margin-top: 20px;
}
    #slide {
        width: 445px;
        top: 100px;
        z-index: 9;
        top: 0;
        bottom: 0;
        position: fixed
    }
    #heade {
        margin-top: 50px;
        width: 400px;
        height: 530px;
        position: absolute;
        right: 0;
        border: 1px solid #d8d8d8;
        margin-left: 40px;
        padding: 20px 40px;
        border-radius: 3px;
        background: white;
        box-shadow: 0 0 8px gray
    }
    #sideba {
        position: absolute;
        top: 180px;
        left: 0px;
        box-shadow: 0 0 8px gray
    }
    #sideba img {
        cursor: pointer
    }
    #sidebar1 img {
        cursor: pointer
    }
    #sidebar1 {
        position: absolute;
        top: 180px;
        left: 0px;
        box-shadow: 0 0 8px gray
    }
    h3 {
        font-family: 'Roboto Slab', serif
    }
    .formtex {
        margin-top: 10px;
        padding: 6px;
        width: 100%;
        font-size: 15px;
        border-radius: 2px;
        border: 3px solid #98d0f1
    }
    h4 {
        font-size: 15px
    }
</style>
<style>
    .product-up p,
    .product-up2 p {
        text-align: center!important
    }
    p {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        margin: inherit
    }
    div#overlay {
        display: none
    }
    a#toggle {
        position: fixed;
        top: 10px;
        left: 10px;
        width: 40px;
        height: 40px;
        background-color: #444;
        text-align: center;
        color: white;
        display: none;
        transition: all ease-out .3s
    }
    .artist li {
        float: none!important
    }
    .artstyle2 {
        width: 199px!important
    }
    a#toggle i {
        position: relative;
        top: 50%;
        transform: translateY(-50%)
    }
    main#content {
        padding: 10px
    }
    #menu {
        text-align: center;
        transition: all ease-out .3s
    }
    #menu ul {
        margin: 0;
        padding: 0;
        position: relative
    }
    #menu ul li {
        float: left
    }
    .menu2 li {
        float: none!important
    }
    .fistn-layer {
        width: 20%
    }
    #menu .menu2 li a {
        padding: 5px 13px;
    }
    #menu ul li>a>i {
        margin-left: 15px;
        transition: all ease-out .3s;
        -webkit-transition: all ease-out .1s
    }
    .menu2 {
        width: auto!important
    }
    #menu ul li ul {
        /*display: none;*/
        position: absolute;
        top: 16px;
        width: 200px;
        text-align: left;
        margin: auto;
        left: 0;
        width: 100%;
        margin: 0 auto;
        right: 0
    }
    #menu .menu2 {
        position: static!important
    }
    #menu .menu2 li a {
        color: #000!important
    }
    #menu ul li ul li {
        display: block
    }
    #menu ul li ul li a {
        display: block
    }
    #menu li>a:hover {
        color: #ff9800;
        text-decoration: none
    }
    #menu .menu2 li:hover>a {
        color: #e19a28!important
    }
    #menu ul li:hover>a>i {
        transform: rotateZ(90deg);
        text-decoration: none
    }
    #menu ul li:hover ul {
        display: block
    }
    #mouse-over {
        width: 100%;
        background: #fff;
        padding: 12px;
        position: absolute;
        top: 16px;
        left: 0;
        border: 3px solid #e19a28;
        min-height: 470px;
        -webkit-box-shadow: 0 6px 7px #CCC;
        -moz-box-shadow: 0 6px 7px #CCC;
        box-shadow: 0 6px 7px #CCC;
        z-index: 9999
    }
    #sub-pi img {
        float: left
    }
    .n-layer {
        float: left
    }
    .rowour {
        background-color: ##f7f7f7;
        width: 100%
    }
    #menu ul li>a>i {
        display: none
    }
    .collections-one ul {
        line-height: 15px
    }
    .collections-one ul li>a {
        padding: 3px 18px!important;
        color: #000!important
    }
    .collections-one li>a:hover {
        color: #e19a28!important
    }
    .normal-sub {
        left: inherit!important;
        width: 192px!important;
        z-index: 9999;
        top: 34px!important;
        margin: 0 19% 0 0!important
    }
    .collct ul li {
        float: none!important
    }
    .product-our {
        width: 254px
    }
    .normal-sub li a {
        background-color: rgba(0, 0, 0, 0.6)
    }
    .normal-sub li a:hover {
        background-color: rgba(0, 0, 0, 0.8)
    }
    .artist {
        float: left
    }
    @media screen and (max-width: 767px) {
        a#toggle {
            display: block
        }
        #menu ul li>a>i {
            display: block
        }
        .artist {
            float: none;
            width: auto
        }
        main#content {
            margin-top: 65px;
            transition: all ease-out .3s
        }
        .n-layer {
            float: none
        }
        #menu {
            position: fixed;
            width: 250px;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            overflow-y: auto;
            background-color: #444;
            transform: translateX(-250px)
        }
        #menu ul {
            text-align: left;
            background-color: transparent
        }
        #menu ul li {
            display: block
        }
        #menu ul li a {
            display: block
        }
        #menu ul li a>i {
            float: right
        }
        #menu ul li ul {
            display: none;
            position: static;
            width: 100%
        }
        #menu ul li:hover>ul {
            display: none
        }
        #menu ul li:hover>a>i {
            transform: rotateZ(0)
        }
        #menu ul li.open>a {
            background-color: #444
        }
        #menu ul li.open>a>i {
            transform: rotateZ(90deg)
        }
        #menu ul li.open>ul {
            display: block
        }
        div#overlay {
            display: block;
            visibility: hidden;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #444;
            transition: all ease-out .3s;
            z-index: 1;
            opacity: 0
        }
        html.open-menu {
            overflow: hidden
        }
        html.open-menu div#overlay {
            visibility: visible;
            opacity: 1;
            width: calc(-150%);
            left: 250px
        }
        html.open-menu a#toggle,
        html.open-menu main#content {
            transform: translateX(250px)
        }
        html.open-menu nav#menu {
            z-index: 3;
            transform: translateX(0)
        }
        #mouse-over {
            position: static
        }
        .n-layer,
        #mouse-over {
            width: auto
        }
        .nav > li > a:hover,
        .nav > li > a:focus {
            text-decoration: none;
            background-color: transparent;
        }
</style>
<div style="background-color:#999; position:relative">
<div class="offers container">
<nav id="menu">
<ul>
<li> <a href="<?php echo base_url();?>">HOME </a> </li>
<li><a href="" onclick="return false;" id="H2"> SUBJECTS </a>
<ul class="H2" style="display: none">
<div id="mouse-over">
<?php $sub_val=$this->frontend_model->get_header_images(1); ?>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch_cat/1/11/<?=$sub_val[0]->title?>/all"><img src="<?php print base_url();?><?=$sub_val[0]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"> <?php echo ucwords($sub_val[0]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch_cat/1/11/<?=$sub_val[1]->title?>/all"><img src="<?php print base_url();?><?=$sub_val[1]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"> <?php echo ucwords($sub_val[1]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch_cat/1/11/<?=$sub_val[2]->title?>/all"><img src="<?php print base_url();?><?=$sub_val[2]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"> <?php echo ucwords($sub_val[2]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch_cat/1/11/<?=$sub_val[3]->title?>/all"><img src="<?php print base_url();?><?=$sub_val[3]->menu_image?>" border="0" class="img-responsive" /> <span class="dblock1"> <?php echo ucwords($sub_val[3]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch_cat/1/32/<?=$sub_val[4]->title?>/all"><img src="<?php print base_url();?><?=$sub_val[4]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"><?php echo ucwords($sub_val[4]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch_cat/1/32/<?=$sub_val[5]->title?>/all"><img src="<?php print base_url();?><?=$sub_val[5]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"> <?php echo ucwords($sub_val[5]->title)?> </span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="col-md-3 col-sm-3 H2" style="display: none">
<ul class="menu2">
<?php $subjects=$this->search_model->get_subcategory(1);
      for($i=6;$i<=13;$i++){
?>
<li> <a href="<?php print base_url(); ?>search/dosearch_cat/1/32/<?=$sub_val[$i]->title?>/all"><?=$sub_val[$i]->title?></a></li>
<?php } ?>
</ul>
</div>
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php for($i=14;$i<=21;$i++){ ?>
<li> <a href="<?php print base_url(); ?>search/dosearch_cat/1/32/<?=$sub_val[$i]->title?>/all"><?=$sub_val[$i]->title?></a> </li>
<?php } ?>
</ul>
</div>
<div class="col-md-3 col-sm-3">

<ul class="menu2">
<?php for($i=22;$i<=29;$i++){ ?>
<li> <a href="<?php print base_url(); ?>search/dosearch_cat/1/32/<?=$sub_val[$i]->title?>/all"><?=$sub_val[$i]->title?></a> </li>
<?php } ?>
</ul>
</div>
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php for($i=30;$i<=37;$i++){ ?>
<li> <a href="<?php print base_url(); ?>search/dosearch_cat/1/32/<?=$sub_val[$i]->title?>/all"><?=$sub_val[$i]->title?></a> </li>
<?php } ?>
</ul>
</div>
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php for($i=38;$i<=45;$i++){ ?>
<li> <a href="<?php print base_url(); ?>search/dosearch_cat/1/32/<?=$sub_val[$i]->title?>/all"><?=$sub_val[$i]->title?></a> </li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="<?php echo base_url();?>frontend/art_subject"> See all Subjects </a> </a> </div>
</div>
</ul>
</li>
<li>
<a href="" onclick="return false;" id="H3"> ARTISTS </a>
<ul class="H3" style="display: none">
<div id="mouse-over">
<?php $drop2=$this->frontend_model->get_header_images(2);
          //print_r($drop2);
?>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop2[0]->keyword?>/all"><img src="<?php print base_url();?><?=$drop2[0]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"><?php echo ucwords($drop2[0]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop2[1]->keyword?>/all"><img src="<?php print base_url();?><?=$drop2[1]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop2[1]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop2[2]->keyword?>/all"><img src="<?php print base_url();?><?=$drop2[2]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop2[2]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop2[3]->keyword?>/all"><img src="<?php print base_url();?><?=$drop2[3]->menu_image?>" border="0" class="img-responsive"> <span class="dblock1"> <?php echo ucwords($drop2[3]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop2[4]->keyword?>/all"><img src="<?php print base_url();?><?=$drop2[4]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"><?php echo ucwords($drop2[4]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop2[5]->keyword?>/all"><img src="<?php print base_url();?><?=$drop2[5]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop2[5]->title)?> </span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer">
<ul class="menu2">
<div class="col-md-8"  style="margin:8px 0">
<div class="artist row">
<div class="col-md-4 col-sm-4 H3" style="display: none">
<?php $subjects=$this->search_model->get_subcategory(84);
  		for($i=6;$i<=12;$i++){
?>
<li>
<a href="javascript:category_filter('<?php echo $drop2[$i]->keyword ?>')"><?php print ucwords($drop2[$i]->title); ?></a>
</li>
<?php }?>
</div>
<div class="col-md-4 col-sm-4">
<?php for($i=13;$i<=19;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $drop2[$i]->keyword ?>')"><?php print ucwords($drop2[$i]->title); ?></a>
</li>
<?php }?>
</div>
<div class="col-md-4 col-sm-4">
<?php for($i=20;$i<=26;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $drop2[$i]->keyword ?>')"><?php print ucwords($drop2[$i]->title); ?></a>
</li>
<?php }?>
</div>
</div>
</div>

</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center" href="<?php echo base_url();?>frontend/artists"> See all Artists </a> </div>
</div>
</ul>
</li>
<li> <a href="" onclick="return false;" id="H4">ART STYLES </a>
<ul class="H4" style="display: none">
<div id="mouse-over">
<?php $drop3=$this->frontend_model->get_header_images(3);
          //print_r($drop3);
?>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop3[0]->keyword?>/all"><img src="<?php print base_url();?><?=$drop3[0]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"><?php echo ucwords($drop3[0]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop3[1]->keyword?>/all"><img src="<?php print base_url();?><?=$drop3[1]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop3[1]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop3[2]->keyword?>/all"><img src="<?php print base_url();?><?=$drop3[2]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop3[2]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop3[3]->keyword?>/all"><img src="<?php print base_url();?><?=$drop3[3]->menu_image?>" border="0" class="img-responsive"> <span class="dblock1"> <?php echo ucwords($drop3[3]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop3[4]->keyword?>/all"><img src="<?php print base_url();?><?=$drop3[4]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"><?php echo ucwords($drop3[4]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop3[5]->keyword?>/all"><img src="<?php print base_url();?><?=$drop3[5]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop3[5]->title)?> </span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="col-md-3 col-sm-3 H4" style="display: none">
<ul class="menu2">
<?php  $subjects=$this->search_model->get_subcategory(2);
        for($i=0;$i<=3;$i++){
?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')" onClick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php for($i=4;$i<=8;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php for($i=9;$i<=13;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name);?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php for($i=14;$i<=18;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php for($i=19;$i<=25;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="<?php echo base_url();?>frontend/art_styles">See all Art Styles</a> </div>
</div>
</ul>
</li>
<!--<li> <a href="<?php print base_url(); ?>frontend/product_type">PRODUCTS</a>
<ul>
<div id="mouse-over">
<?php 
           $drop5=$this->frontend_model->get_header_images(4);
          //print_r($drop5);
          
            ?>
<div>
<div class="product-up product-our col-md-3"> <p style="padding:5px 0;font-size:18px"> <?php echo ucwords($drop5[0]->title)?> </p> <a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop5[0]->keyword?>/all"><img src="<?php print base_url();?><?=$drop5[0]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> </span></a></div>
<div class="product-up2 product-our col-md-3"><p style="padding:5px 0;font-size:18px"> <?php echo ucwords($drop5[1]->title)?> </p> <a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop5[1]->keyword?>/all"><img src="<?php print base_url();?><?=$drop5[1]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"></span></a></div>
<div class="product-up product-our col-md-3"><p style="padding:5px 0;font-size:18px"> <?php echo ucwords($drop5[2]->title)?> </p><a href="<?php print base_url(); ?>search/search_canvas/none/1/64/<?=$drop5[2]->keyword?>/all"><img src="<?php print base_url();?><?=$drop5[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> </span></a>
</div>
<div class="product-up product-our col-md-3"><p style="padding:5px 0;font-size:18px"> <?php echo ucwords($drop5[3]->title)?> </p><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop5[3]->keyword?>/all"><img src="<?php print base_url();?><?=$drop5[3]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> </span></a>
</div>
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
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
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
</li>-->
<li><a href="" onclick="return false;" id="H5">COLLECTIONS</a>
<ul class="H5" style="display: none">
<div id="mouse-over">
<?php $drop4=$this->frontend_model->get_header_images(5);
          //print_r($drop4);
?>
<div class="collections-one collct col-md-3 col-sm-3">
<p style="padding:5px 0;font-size:18px"> <?=$drop4[0]->title?> </p> 
<a href="<?=base_url()?>search/dosearch/1/64/<?=$drop4[0]->title?>/all"><img src="<?php print base_url();?><?=$drop4[0]->menu_image?>" border="0"  style="padding:0 0 5px 0" class="img-responsive" /></a>
<?php $collection=$this->search_model->get_subcategory(85);
      // print_r($collection);
?>
</div>
<div class="collections-one collct col-md-3 col-sm-3">
<p style="padding:5px 0;font-size:18px"> <?=$drop4[1]->title?> </p> <a href="<?=base_url()?>search/dosearch/1/64/<?=$drop4[1]->title?>/all"><img src="<?php print base_url();?><?=$drop4[1]->menu_image?>" border="0"  style="padding:0 0 5px 0" class="img-responsive" /></a>
</div>
<div class="collections-one collct col-md-3 col-sm-3">
<p style="padding:5px 0;font-size:18px"> <?=$drop4[2]->title?></p> <a href="<?=base_url()?>search/dosearch/1/64/<?=$drop4[2]->title?>/all"><img src="<?php print base_url();?><?=$drop4[2]->menu_image?>" border="0"  style="padding:0 0 5px 0" class="img-responsive" /></a>
</div>
<div class="collections-one collct col-md-3 col-sm-3" style="border:none">
<p style="padding:5px 0;font-size:18px"> <?=$drop4[3]->title?> </p> <a href="<?=base_url()?>search/dosearch/1/64/<?=$drop4[3]->title?>/all"><img src="<?php print base_url();?><?=$drop4[3]->menu_image?>" border="0"  style="padding:0 0 5px 0" class="img-responsive" /></a>
</div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php $api_collections=$this->frontend_model->get_collection();
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
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php // print_r($api_collections);
      foreach($api_collections as $result){ 
        $category= $result['category'];
		    $id= $result['id'];
        if($category==2){
				  echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
				}// end loop
?>
</ul>
</div>
<div class="col-md-3 col-sm-3 H5" style="display: none">
<ul class="menu2">
<?php /// print_r($api_collections);
     foreach($api_collections as $result){ 
    $category= $result['category'];
	  $id= $result['id'];
    if($category==3){
      echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
    }// end loop
?>
</ul>
</div>
<div class="col-md-3 col-sm-3">
<ul class="menu2">
<?php /// print_r($api_collections);
      foreach($api_collections as $result){ 
      $category= $result['category'];
			$id= $result['id'];
      if($category==1){
			  echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
			}// end loop
?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="<?php print base_url(); ?>frontend/collection">See all Collections</a></a> </div>
</div>
</ul>
</li>
<li>
<a href="" onclick="return false;" id="H6">ROOMS</a>
<ul class="H6" style="display: none">
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
        $url0="frontend/themes_view/".$drop6[0]->keyword."";
       }if($spit1[1]=='frontend'){
        $url1=$drop6[1]->keyword;
       }else{
        $url1="frontend/themes_view/".$drop6[1]->keyword."";
       }if($spit2[1]=='frontend'){
        $url2=$drop6[2]->keyword;
       }else{
        $url2="frontend/themes_view/".$drop6[2]->keyword."";
       }if($spit3[1]=='frontend'){
       $url3=$drop6[3]->keyword;
       }else{
       $url3="frontend/themes_view/".$drop6[3]->keyword."";
       }if($spit4[1]=='frontend'){
       $url4=$drop6[4]->keyword;
       }else{
       $url4="frontend/themes_view/".$drop6[4]->keyword."";
       }if($spit5[1]=='frontend'){
       $url5=$drop6[5]->keyword;
       }else{
       $url5="frontend/themes_view/".$drop6[5]->keyword."";
       }
	   	 //echo $url2.'_'.$url;
?>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url0?>"><img src="<?php print base_url();?><?=$drop6[0]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"><?php echo ucwords($drop6[0]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url1?>"><img src="<?php print base_url();?><?=$drop6[1]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"> <?php echo ucwords($drop6[1]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url2?>"><img src="<?php print base_url();?><?=$drop6[2]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"> <?php echo ucwords($drop6[2]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url3?>"><img src="<?php print base_url();?><?=$drop6[3]->menu_image?>" border="0" class="img-responsive" /> <span class="dblock1"> <?php echo ucwords($drop6[3]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url4?>"><img src="<?php print base_url();?><?=$drop6[4]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"><?php echo ucwords($drop6[4]->title)?>
</span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?><?=$url5?>"><img src="<?php print base_url();?><?=$drop6[5]->menu_image?>" border="0" class="img-responsive" /><span class="dblock1"> <?php echo ucwords($drop6[5]->title)?>
</span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer artstyle2">
<ul class="menu2">
<?php $rooms=$this->search_model->get_subcategory(859);
      for($i=0;$i<=5;$i++){
?>
<li> <a href="javascript:category_filter('<?php echo $rooms[$i]->keyword?>')" onClick="return show_subjects('subjects','<?php print ucwords($rooms[$i]->title)?>')"><?php print ucwords($rooms[$i]->title); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=6;$i<=11;$i++){ ?>
<li> <a href="javascript:category_filter('<?php echo $rooms[$i]->keyword ?>')"><?php print ucwords($rooms[$i]->title); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=12;$i<=17;$i++){ ?>
<li> <a href="javascript:category_filter('<?php echo $rooms[$i]->keyword ?>')"><?php print ucwords($rooms[$i]->title); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=18;$i<=22;$i++){ ?>
<li> <a href="javascript:category_filter('<?php echo $rooms[$i]->keyword ?>')"><?php print ucwords($rooms[$i]->title); ?></a> </li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=23;$i<=29;$i++){ ?>
<li> <a href="javascript:category_filter('<?php echo $rooms[$i]->keyword ?>')"><?php print ucwords($rooms[$i]->title); ?></a> </li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="<?php print base_url(); ?>frontend/rooms">See all Rooms</a> </div>
</div>
</ul>
</li>
<li> <a href="" onclick="return false;" id="H7">PLACES</a>
<ul class="H7" style="display: none">
<div id="mouse-over">
<?php $drop7=$this->frontend_model->get_header_images(7);
      //print_r($drop7);
?>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop7[0]->keyword?>/all"><img src="<?php print base_url();?><?=$drop7[0]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"><?php echo ucwords($drop7[0]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop7[1]->keyword?>/all"><img src="<?php print base_url();?><?=$drop7[1]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop7[1]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop7[2]->keyword?>/all"><img src="<?php print base_url();?><?=$drop7[2]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop7[2]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop7[3]->keyword?>/all"><img src="<?php print base_url();?><?=$drop7[3]->menu_image?>" border="0" class="img-responsive"> <span class="dblock1"> <?php echo ucwords($drop7[3]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop7[4]->keyword?>/all"><img src="<?php print base_url();?><?=$drop7[4]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"><?php echo ucwords($drop7[4]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$drop7[5]->keyword?>/all"><img src="<?php print base_url();?><?=$drop7[5]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop7[5]->title)?> </span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer artstyle2">
<ul class="menu2">
<?php $subjects=$this->search_model->get_subcategory();
      for($i=0;$i<=4;$i++){
?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')" onClick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=5;$i<=10;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=11;$i<=15;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name);?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=15;$i<=20;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=21;$i<=25;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=26;$i<=26;$i++){ ?>
<li>
<a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>')"><?php print ucwords($subjects[$i]->name); ?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="<?php print base_url(); ?>frontend/places">See all Places </a></a> </div>
</div>
</ul>
</li>
<li> <a href="" onclick="return false;" id="H8">THEMES</a>
<ul class="H8" style="display: none">
<div id="mouse-over">
<?php $drop8=$this->frontend_model->get_header_images(8);
          //print_r($drop8);
?>
<div id="sub-pic"><a href="<?php print base_url(); ?>frontend/themes_view/<?=$drop8[0]->keyword?>"><img src="<?php print base_url();?><?=$drop8[0]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"><?php echo ucwords($drop8[0]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>frontend/themes_view/<?=$drop8[1]->keyword?>"><img src="<?php print base_url();?><?=$drop8[1]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop8[1]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>frontend/themes_view/<?=$drop8[2]->keyword?>"><img src="<?php print base_url();?><?=$drop8[2]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop8[2]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>frontend/themes_view/<?=$drop8[3]->keyword?>"><img src="<?php print base_url();?><?=$drop8[3]->menu_image?>" border="0" class="img-responsive"> <span class="dblock1"> <?php echo ucwords($drop8[3]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>frontend/themes_view/<?=$drop8[4]->keyword?>"><img src="<?php print base_url();?><?=$drop8[4]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"><?php echo ucwords($drop8[4]->title)?> </span></a></div>
<div id="sub-pic"><a href="<?php print base_url(); ?>frontend/themes_view/<?=$drop8[5]->keyword?>"><img src="<?php print base_url();?><?=$drop8[5]->menu_image?>" border="0" class="img-responsive" ><span class="dblock1"> <?php echo ucwords($drop8[5]->title)?> </span></a></div>
<div style="clear:both"></div>
<div class="sub-hor fist-sub-bar">
<div class="rowour">
<div class="n-layer artstyle2">
<ul class="menu2">
<?php // $subjects=$this->search_model->get_subcategory(880);?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=6;$i<=10;$i++){
			//echo $drop8[$i]->keyword;
?>
<li>
<a href="<?=base_url()?>frontend/themes_view/<?php echo $drop8[$i]->keyword;?>"><?php print ucwords($drop8[$i]->title); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=11;$i<=15;$i++){ ?>
<li>
<a href="<?=base_url()?>frontend/themes_view/<?php echo $drop8[$i]->keyword;?>"><?php print ucwords($drop8[$i]->title);?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=16;$i<=20;$i++){ ?>
<li>
<a href="<?=base_url()?>frontend/themes_view/<?php echo $drop8[$i]->keyword;?>"><?php print ucwords($drop8[$i]->title); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=21;$i<=25;$i++){ ?>
<li>
<a href="<?=base_url()?>frontend/themes_view/<?php echo $drop8[$i]->keyword;?>"><?php print ucwords($drop8[$i]->title); ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="n-layer artstyle2">
<ul class="menu2">
<?php for($i=26;$i<=26;$i++){ ?>
<li>
<a href="<?=base_url()?>frontend/themes_view/<?php echo $drop8[$i]->keyword;?>"><?php print ucwords($drop8[$i]->title); ?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
<div style="clear:both"></div>
</div>
<div class="rowour" style="text-align:center"> <a style="padding:10px;color:#960;font-size:20px;text-align:center"href="<?php print base_url(); ?>frontend/themes">See all Themes </a></a> </div>
</div>
</ul>
</li>
<li> <a href="<?php print base_url(); ?>frontend/photostoframe" style="color:#ff9800">PHOTOS TO FRAME </a> </li>
<li> <a href="<?php print base_url(); ?>frontend/clearance" style="color:#f1464f">CLEARANCE</a></li>
<li> <a href="<?php print base_url(); ?>frontend/promooffer"> PROMOTIONAL OFFER </a></li>
<!--<li> <a href="#">Frame your art </a>
<li> <a href="#">Product Page</a>-->

<!--<li> <a href="#">MAHATTA DESIGNS</a>
<ul class="normal-sub">
<li style="width:150px"> <a style="padding:6px 16px 10px 10px" href="<?php print base_url(); ?>frontend/curators"> Curators </a> </li>
<li style="width:150px"> <a style="padding:6px 16px 10px 10px" href="<?php print base_url(); ?>frontend/curators"> Testimonials </a> </li>
</ul>
</li>-->
</ul>
</nav>
</div>
</div>
<div id="blank" onMouseOver="dropdownout('')">&nbsp;</div>
<div class="offers container">
<div class="col-md- off">
<!--<div id="skinnybanner_stp" class="walbanner">
<div class="bannerText bannerText_single">
<span class="bannerOffer"> BETA VERSION | LAUNCHING SOON </span>
<div id="banner-terms-link" class="bannerExpText"></div>
</div>
</div>-->
</div>
</div>
<input type="hidden" id="fileName" value="" ></input>
<input type="hidden" id="show_ligt_box_name" value="" ></input>
<script>/*<![CDATA[*/(function(c){var b=c('<i class="fa fa-caret-right"></i>');c("nav#menu li:has(ul) > a").append(b);c("nav#menu li:has(ul)").on("click",function(){c(this).toggleClass("open")});c("a#toggle").on("click",function(d){c("html").toggleClass("open-menu");return false});c("div#overlay").on("click",function(){c("html").removeClass("open-menu")})})(jQuery);/*]]>*/</script>

<script>



function refine_shape(events)
{
 <? if($shape=='Horizontal' || $shape=='Vertical' || $shape=='Square' || $shape=='Slim' || $shape=='Panoramic'){?>
	var url="<?php print base_url(); ?>search/<?=$action?>/<?=$page?>/<?=$limit?>/<?=$search_text;?><?php if($category_id<>'none'){ echo '/'.$category_id;}?>/"+events+"<?php if($color<>'%@$#'){ echo '/'.$color;}?>";
<? }else{?>
var url="<?php print base_url(); ?>search/<?=$action?>/<?=$page?>/<?=$limit?>/<?=$search_text;?><?php if($category_id<>'none' || $category_id=='all'){ echo '/'.$category_id;}?><?php if($shape<>'?#!'){ echo '/'.$shape;}?>/"+events+"";
<?php }?>
    location.replace(url);
}


function refine_color(events)
{

<? if($shape=='Horizontal' || $shape=='Vertical' || $shape=='Square' || $shape=='Slim' || $shape=='Panoramic'){?>
    var url="<?php print base_url(); ?>search/<?=$action?>/<?=$page?>/<?=$limit?>/<?=$search_text;?><?php if($category_id<>'none' || $category_id=='all'){ echo '/'.$category_id;}?><?php if($shape<>'?#!'){ echo '/'.$shape;}?>/"+events+"";

<? }elseif($color=='Horizontal' || $color=='Vertical' || $color=='Square' || $color=='Slim' || $color=='Panoramic'){?>
    var url="<?php print base_url(); ?>search/<?=$action?>/<?=$page?>/<?=$limit?>/<?=$search_text;?><?php if($category_id<>'none' || $category_id=='all'){ echo '/'.$category_id;}?>/"+events+"<?php if($color<>'%@$#'){ echo '/'.$color;}?>";
	<? }elseif($shape!='Horizontal' || $shape!='Vertical' || $shape!='Square' || $shape!='Slim' || $shape!='Panoramic'){?>
	var url="<?php print base_url(); ?>search/<?=$action?>/<?=$page?>/<?=$limit?>/<?=$search_text;?><?php if($category_id<>'none' || $category_id=='all'){ echo '/'.$category_id;}?>/"+events;
	<? }else{?>

	
var url="<?php print base_url(); ?>search/<?=$action?>/<?=$page?>/<?=$limit?>/<?=$search_text;?><?php if($category_id<>'none' || $category_id=='all'){ echo '/'.$category_id;}?><?php if($shape<>'?#!'){ echo '/'.$shape;}?>/"+events;	
	<? }?>
	location.replace(url);
}



function refine_undo(){
   
 var url="<?=base_url()?>search/<?=$action?>/<?=$page;?>/<?=$limit; ?>/<?=$search_text?>/all";
    window.location.assign(url);

}


function shape_undo(){
   
 var url="<?=base_url()?>search/<?=$action?>/<?=$page;?>/<?=$limit; ?>/<?=$search_text?>/<?=$category_id?>";
    window.location.assign(url);

}

function color_undo(){
   
 var url="<?=base_url()?>search/<?=$action?>/<?=$page;?>/<?=$limit; ?>/<?=$search_text?>/<?=$category_id?>/<?=$shape?>";
    window.location.assign(url);

}





function call_filter2(id)
{


	  var url='<?=base_url()?>search/dosearch/1/<?=$limit;?>/<?=$search_text?>/'+id+'<? if($shape!='?#!' && $shape!='all'){ echo '/'.$shape;}?><? if($color!='%@$#'  && $color!='all'){ echo '/'.$color;}?>';
	 
    window.location.assign(url);
}








function check_exist_img(a,cat_id)
{
    
    
   
   if(a!=0)
     {
         
         var light_box_name=document.getElementById('show_ligt_box_name').value;
    
	       
			  var fileName=$("#fileName").val();
                  image_id=$("#image_id").val();    
                
        var img_id=$("#img_id").val(); 
        
      	 var k=$("#total_cost").html();
       	 var j=$("#c_sizes").html();
	   	 var l=$("#print_type_for_image").html();
    	 var datastring='gallery_img_id='+image_id+'&lightbox_id='+ a + '&image_id='+img_id+'&price='+ k +'&size='+ j +'&print_type='+l;
    	 $.ajax({
             type: "POST",
	     url: "<?php print base_url() ?>frontend/check_img_exist_status",
             data:datastring,
             success:function(datam)  
             {
			 //alert(datam);
                if(datam==1)
                {
                var r=confirm("Do you want to add this image in this Gallery? " +light_box_name+" ");
                    if(r)
                     { 
					 
                      var str11='imagesfilename='+fileName+'&gallery_img_id='+image_id+'&lightbox_id='+a+'&image_id='+img_id+'&price='+k+'&size='+j+'&print_type='+l+'&cat_id='+cat_id+'&check=1';
                    
                   
            $.ajax({
    		type: "POST",
            url: "<?php print base_url() ?>frontend/check_img_exist_status",
    	    data:str11,
    		success:function(response)  
   			 {			
			// alert(response);
             alert("Image has been successfully added to the Gallery");
        
	               }
                });
              }
		}
     else
                 alert("This image already exists in this "+light_box_name+". Please choose another Gallery.");
             }
           });
		}
  }  
        
	 	


	 
	 
        
        function call_create_lightbox()
{
    
	if($('#lightbox_name').val()=="")
	 {
	 	$("#lightbox_error").html("Enter Gallery Name.");
                return false;
	 }
	 else if($("#lightbox_des").val()=="")
	 {
	   $("#lightbox_error").html("Enter Gallery Description.");
	   return false;
	 }
	 else 
	 {
             
	   $("#lightbox_error").html("");
	    $.ajax({
	             type: "POST",
		      url: "<?php print base_url() ?>frontend/create_lightbox",
		      data: $("#lightbox_submit").serialize(),
		      success: function(response)
		      {    
                              
	                    var data = $.parseJSON(response);
			   var str= toTitleCase(data.data1[0]);
	                    $("#lightbox_des").val("");
	                    $('#lightbox_name').val("");
	                    alert("Gallery has been created.");
			   alert('Please select "'+str+'" from "My Gallery" option mentioned below to add this image');
	                    $("#lightbox_list_dropdown").append('<option value='+data.data2[0]+'>'+data.data1[0]+'</option>');
	          }
	          });
	  }
}




function OnClickSearch()
{
	var searchtext=$('#searchtext').val();
   
           
            var sort=$('#sortby_dropdown').val();
           
             var url='<?=base_url()?>search/dosearch/1/64/'+searchtext+'/all';
			window.location.assign(url);
            return  true;
       
    
}
function call_collection(filter_collection)
{
    //alert(id);
	var url='<?=base_url()?>search/dosearch/1/32/'+filter_collection+'/all';
	
   //var url='<?=base_url()?>search/dosearch/'+filter_collection;  
    window.location.assign(url);
}

function category_filter(category)
{
    //alert(1);
    var url='<?=base_url()?>search/dosearch/1/64/'+category+'/all';
    window.location.assign(url);
}

function checkSubmit(e)
{
	
    if(e && e.keyCode == 13)
    {
        if($('#searchtext').val()=="")
        {
            $('#search_error').html("<br>Enter a search keyword");
            return false;
        }
        else
        {
            $('#search_error').html("");
            var keyword=$('#searchtext').val();
            var sort=$('#sortby_dropdown').val();
             var url='<?php echo base_url();?>search/dosearch/1/64/'+keyword+'/all';
			window.location.assign(url);
            return  true;
        }
    }
}


function refine_filter(events)
{
    var url="<?php print base_url(); ?>search/filter/1/64/<?php print $search_text;?>/"+events;
    location.replace(url);
}


function call_create_lightbox1()
{
	var name_to_image=	$('#name_to_image').val();
	var email_to_image=$('#email_to_image').val();
	var contact_to_image=$('#contact_to_image').val();
	var city_to_image =$('#city_to_image').val();
	var painting_to_image=$('#painting_to_image').val();
	var lightbox_des_of_image=$('#lightbox_des_of_image').val();
	var mail_filename=$('#mail_filename').val();
	var image_id=$('#mail_image_id').val();
	
	
	if($('#name_to_image').val()=="")
	 {
	 	$("#lightbox_error_image").html("Enter Your Name.");
                return false;
	 }
        else if($('#email_to_image').val()=="")
	 {
	 	$("#lightbox_error_image").html("Enter Your Email.");
                return false;
	 }
         else if($('#lightbox_des_of_image').val()=="")
	 {
	 	$("#lightbox_error_image").html("Enter description.");
                return false;
	 }
         else 
	 {
             
	   $("#lightbox_error_image").html("Thank you for contacting us. We will get back to you shortly.");
	    $.ajax({
	             type: "POST",
		      url: "<?php print base_url() ?>frontend/create_image_intrested",
		      data: 'name_to_image='+name_to_image+'&email_to_image='+email_to_image+'&contact_to_image='+contact_to_image+'&city_to_image='+city_to_image+'&painting_to_image='+painting_to_image+'&lightbox_des_of_image='+lightbox_des_of_image+'&mail_filename='+mail_filename+'&images_id='+image_id,
		      success:function(data) {
                    //alert(image_id);
					setTimeout(function(){msgtimeout();},1000);
					<?php if($image_name!=''){?>
					setTimeout(function(){msgtimeout2();},1000);
					<?php }?>
					
                        }
						
	          });
	  }
}





 function get_lightBoxName(img_id)
 {
     
     $.ajax({
	             type: "POST",
		      url: "<?php print base_url() ?>frontend/get_light_boxName",
		      data:"img_id="+img_id,
		      success: function(response)
		      {    
                          //alert(response);
                         $('#show_ligt_box_name').val(response);
	                  
                      }
	    });
     
 }// end function
    
 function msgtimeout()
{
window.location.href="<?php print base_url() ?>search/dosearch/<?=$page?>/<?=$limit?>/<?=$search_text?>/<?=$category_id?>";
}


  function msgtimeout2()
{
window.location.href="<?php print base_url() ?>search/image_detail/<?=$image_name?>/<?=$images_id?>/<?=$collection_id?>";
} 

$(document).on("click","#add_to_cart",function(){var f=$(this).data("image_id");var c=$(this).data("image_filename");var a=$("#user_id").val();var e=$("#image_original_height"+f).val();var d=$("#image_original_width"+f).val();var b=e+"X"+d;$.ajax({type:"post",url:"<?php print base_url() ?>cart/cart_detail_save",data:"image_id="+f+"&image_filename="+c+"&user_id="+a+"&total_size="+b+"&action_method=search",success:function(g){}})});

$(document).on("click","#frame_add_to_cart",function(){
       var total_cost=$('#total_cost').html();
	 // var total_cost=0;
	   if(total_cost==0){
	   return false;
	   }
       var image_id=$('#image_id').val();
       var image_filename=$('#image_filename').val();
        var user_id=$('#user_id').val(); 
        var total_size=$('#sizes').val(); 
         var print_sizes=$('#print_sizes').val();
		 var image_selected_size=$('#image_selected_size').html();
		 //alert(image_selected_size) 
		  var sub_size=image_selected_size.substring('',9);
		  
		  var sub_sub_size=sub_size.replace('"','');
		     var size_with_border=sub_sub_size.replace('"','');
		 // alert(size_with_border)
       
        $.ajax({
           type:'post',
           url:'<?php print base_url() ?>cart/cart_detail_save',
           data:'print_sizes='+print_sizes+'&total_cost='+total_cost+'&image_id='+image_id+'&image_filename='+image_filename+'&size_with_border='+size_with_border+'&user_id='+user_id+'&total_size='+total_size+'&action_method=search',
           success:function(data){
		   
		  //alert(data);
		  // $('#try_check').html(data);
              
			  $('.frame-step-header-container').show();
			  buy_print_addtocart(data);
			  $('html, body').animate({ scrollTop: 0 }, 'fast');
           }
           
			   
			  
       });
       
    });
function frame_it_addtocart(){var i=document.getElementById("glass").value;var l=document.getElementById("glass_coste").value;var b=document.getElementById("total_price").innerHTML;var d=document.getElementById("MountCost").innerHTML;var k=document.getElementById("FrameCost").innerHTML;var j=document.getElementById("print_h_w").value;var h=document.getElementById("print_price").innerHTML;var g=document.getElementById("image_id").value;var c=document.getElementById("imagsTypes").value;var n=document.getElementById("user_id").value;var f=document.getElementById("mount_size").innerHTML;var a=document.getElementById("mat1_color").value;var m=document.getElementById("frame_color").value;var e=document.getElementById("fat_frame").value;$.ajax({type:"POST",url:"<?=base_url()?>frontend/frameit_addtocart",data:"glasses_coste="+l+"&glasses="+i+"&FrameCost="+k+"&MountCost="+d+"&total_price="+b+"&user_id="+n+"&img_id="+g+"&image_type="+c+"&mat_color="+a+"&mat_size="+f+"&frame_color="+m+"&frameSize="+e+"&images_size="+j+"&images_price="+h,success:function(o){if(o!=""){location.reload()}}})};/*]]>*/


$("#dmobile").keyup(function () { 
    var newValue = $(this).val().replace(/[^0-9]/g,'');
	
    $(this).val(newValue);
	 
 });
	function validation_for_forminfo(value){
//alert(value)

document.getElementById(value).style.border = "1px solid #ff0000";
      document.getElementById(value).focus();
	  $('#'+value).keypress(function(){
	  $(this).css('border','');
	  });
	  

}

$('#dsend').click(function(){
		//alert(1);
			if($('#dname').val()=="")
        {
		$('#results').html('Enter Your Name.');
			$( "#dname" ).focus();
			return false;
        }
		if($('#demail').val()=="")
        {
		  $('#results').html('Enter Your Eamil.');
			$( "#demail" ).focus();
			return false;
        }
		if($('#demail').val()){
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if( !emailReg.test(document.getElementById('demail').value) ) {
				$('#results').html('Please enter valid email.').css('color','red');
				validation_for_forminfo('demail');
				//alert('validation')
				return false;
                } 
		}
		if($('#dmobile').val()=="")
        {
			$('#results').html('Enter Your Contact Number.');
			$( "#dmobile" ).focus();
			return false;
        }
		if($('#dmobile').val().length<10){
		validation_for_forminfo('dmobile');
		$('#results').html('Enter valid contact number.');
		
		return false;
		}
		else{
		$.ajax({
			type:"POST",
			url:"<?php print base_url() ?>contact/process",
			data:$("#contactus_save").serialize(),
			success:function(data){
					 $('#results').html(data);
					 //$('#frm_contact')[0].reset();
			}
			//$(".myform")[0].reset();
			
		});
		$('#contactus_save')[0].reset();
		return false;
		}
		
	});
</script>
<script>
    $(document).ready(function(){
      $('.H2,.H3,.H4,.H5,.H6,.H7,.H8').hide();
      
      $('#H2').click(function(){
        $('.H2').toggle();  
        $('.H3,.H4,.H5,.H6,.H7,.H8').hide();
      })
      
      $('#H3').click(function(){
        $('.H3').toggle();  
        $('.H2,.H4,.H5,.H6,.H7,.H8').hide();
      })
      
      $('#H4').click(function(){
        $('.H4').toggle();  
        $('.H2,.H3,.H5,.H6,.H7,.H8').hide();
      })
      
      $('#H5').click(function(){
        $('.H5').toggle();  
        $('.H2,.H3,.H4,.H6,.H7,.H8').hide();
      })
      
      $('#H6').click(function(){
        $('.H6').toggle();  
        $('.H2,.H3,.H4,.H5,.H7,.H8').hide();
      })
      
      $('#H7').click(function(){
        $('.H7').toggle();  
        $('.H2,.H3,.H4,.H5,.H6,.H8').hide();
      })
      
      $('#H8').click(function(){
        $('.H8').toggle();  
        $('.H2,.H3,.H4,.H5,.H6,.H7').hide();
      })
    });
</script>