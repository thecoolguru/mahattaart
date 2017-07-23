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
</head>

<!--HERO SLIDER ASSETS-->
<div id="slider-wrapper">
	<div id="slider-wrapper main-slider">
		<!-- =======================================
THE ACTUAL ORBIT SLIDER CONTENT 
======================================= -->
		<div id="featured">
			<a href="<?php print base_url();?>frontend/art_subject"><img src="<?php echo base_url();?>assets/images/home1.jpg" width="990" border="0" /> </a> 
			<a href="<?php print base_url();?>frontend/product_type"><img src="<?php echo base_url();?>assets/images/home2.jpg" width="990" border="0" /> </a>
			<a href="<?php print base_url()?>frontend/collection"><img src="<?php echo base_url();?>assets/images/home3.jpg" width="990" border="0" /> </a>
		</div>


		<!--main slider ends-->
	</div>
</div>

<!-- =======================================
HOME PAGE MIDDLE SECTION CONTENT
======================================= -->
<div id="home-middle-container">
	<div class="promos">
		
	 " Thank You for registering with WallsnArt!"

	</div>
	<!--==========GLOBAL CONTAINER ENDS===========-->
</div>
<!--global wrapper ends-->
</div>
</div>
</div>
