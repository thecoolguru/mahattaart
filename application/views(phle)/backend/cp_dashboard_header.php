<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Channel Partner's Dashboard</title>
<link href="<?php echo base_url();?>assets/css/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/wallsnart1.0.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>


<!--TOP MENU SCRIPT-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/top-menu-script.js"></script>
</head>

<body>
<div id="login-page-wrapper">
<div id="login-page-container">
<div id="global-header"><img src="<?php echo base_url();?>assets/images/logo.png" class="logo"  /> 
<div class="header-links"> 
<ul>
  <li class="loggedin">Welcome&nbsp;<?php $name=$this->backend_model->get_admin_name($this->session->userdata('id')); print $name->first_name." ".$name->last_name;?></li>  <li><a href="<?php echo base_url(); ?>index.php/channel_partners/dashboard">Dashboard</a></li> <li><a href="<?php echo base_url(); ?>index.php/backend/logout" class="logout-top">Logout</a></li></ul>
</div> 
</div>
</div>

<div id="nav-wrapper">
<!--MAIN NAVIGATION STARTS--><div id="nav-container">
<ul class="menu" id="menu">
   <li class="fst"><a href="<?=base_url()?>index.php/channel_partners/cp_sales">View  Sales</a></li>
   <li class="subtop"><a href="#" >Manage Images</a>
	  <ul>
        <li> <a href="<?=base_url();?>index.php/channel_partners/cp_active_images">My Active Images</a></li>
<li> <a href="<?=base_url();?>index.php/channel_partners/cp_inactive_images">My Inactive Images</a></li>
<!-- <li> <a href="<?=base_url();?>index.php/channel_partners/cp_waiting_images">Waiting Images</a></li> -->
<li> <a href="<?=base_url();?>index.php/channel_partners/cp_image_status">Image Status</a></li>
<!-- <li> <a href="<?=base_url();?>index.php/channel_partners/cp_upload_images">Upload Images</a></li> -->
<li> <a href="<?=base_url();?>index.php/channel_partners/cp_track_uploads">Track Your Uploads</a></li>
		</ul>
	</li>
 
     <li class="subtop"><a href="#">Performance of Images</a>
     <ul>
        <li> <a href="<?=base_url();?>index.php/channel_partners/cp_images_view_all">View All </a></li>	
<li> <a href="<?=base_url();?>index.php/channel_partners/cp_images_search">View by search results </a></li>	
<li><a href="<?=base_url();?>index.php/channel_partners/cp_images_clicks">View by Images clicked to enlarge</a></li>
<li> <a href="<?=base_url();?>index.php/channel_partners/cp_images_converted">Searches converted to sales</a></li> 
  	</ul>
    </li>
<li><a href="<?=base_url();?>index.php/channel_partners/cp_caption_guidelines">Guidelines</a></li>
	   <li class="subtop"><a href="<?php echo base_url();?>index.php/channel_partners/editcp">Profile</a>
      <ul>
        <li> <a href="<?php echo base_url();?>index.php/channel_partners/editcp">Edit Profile</a></li>
        <li> <a href="<?php echo base_url();?>index.php/channel_partners/changepwd">Change Password</a></li>
       
  	</ul>
</li>
</ul>
  

<script type="text/javascript" src="<?php echo base_url();?>assets/js/top-m.js"></script>
<!--MAIN NAVIGATION ENDS--></div>

</div>

</div>
</div>