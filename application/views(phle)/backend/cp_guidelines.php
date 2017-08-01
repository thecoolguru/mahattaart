<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Guidelines for Capitioning of Images</title>
<link href="<?php echo base_url(); ?>assets/css/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/wallsnart1.0.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/anylinkmenu.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/anylinkmenu.js">
/***********************************************
* AnyLink JS Drop Down Menu v2.0- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Project Page at http://www.dynamicdrive.com/dynamicindex1/dropmenuindex.htm for full source code
***********************************************/
</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>


<script type="text/javascript" language="javascript">// <![CDATA[
function PhotographersList() {
    var ele = document.getElementById("PhotographersListDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}

function PhotographersSalesList() {
    var ele = document.getElementById("PhotographersSalesListDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}
// ]]></script>
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#photographers').change(function() {
            $('div.pgraphers').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});

$(function() {
      $('#sales-detail').change(function() {
            $('div.acdetail').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});

</script>
<script type="text/javascript" language="javascript">// <![CDATA[
function salesoption() {
    var ele = document.getElementById("salesoptionDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}
// ]]></script>

<!--TOP MENU SCRIPT-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/top-menu-script.js"></script>
</head>

<body>
<div id="login-page-wrapper">
<div id="login-page-container">
<div id="global-header"><img src="<?php echo base_url(); ?>assets/images/logo.png" class="logo"  /> 
<div class="header-links"> 
<ul>
  <li class="loggedin">Welcome&nbsp;<?php $name=$this->backend_model->get_admin_name($this->session->userdata('id')); print $name->first_name." ".$name->last_name;?></li>  <li><a href="<?php echo base_url(); ?>index.php/channel_partners/dashboard">Dashboard</a></li> <li><a href="<?php echo base_url(); ?>index.php/backend/logout" class="logout-top">Logout</a></li></ul>
</div> 
</div>
</div>

<div id="nav-wrapper">
<!--MAIN NAVIGATION STARTS--><div id="nav-container">
<ul class="menu" id="menu">
   <li class="fst"><a href="cp-sales.html">View  Sales</a></li>
   <li class="subtop"><a href="#" >Manage Images</a>
	  <ul>
        <li> <a href="cp-active-images.html">My Active Images</a></li>
<li> <a href="cp-inactive-images.html">My Inactive Images</a></li>
<li> <a href="cp-waiting-images.html">Waiting Images</a></li>
<li> <a href="cp-image-status.html">Image Status</a></li>
<li> <a href="cp-upload-images.html">Upload Images</a></li>
<li> <a href="cp-track-uploads.html">Track Your Uploads</a></li>
		</ul>
	</li>
 
     <li class="subtop"><a href="#">Performance of Images</a>
     <ul>
        <li> <a href="#">View by search results </a></li>	
<li><a href="#">View by Images clicked to enlarge</a></li>
<li> <a href="#">Searches converted to sales</a></li> 
  	</ul>
    </li>
<li><a href="<?php echo base_url(); ?>index.php/channel_partners/guidelines">Guidelines</a></li>
	   <li class="subtop"><a href="#">Profile</a>
      <ul>
        <li> <a href="<?php echo base_url(); ?>index.php/channel_partners/editcp">Edit Profile</a></li>
        <li> <a href="<?php echo base_url(); ?>index.php/channel_partners/changepwd">Change Password</a></li>
       
  	</ul>
</li>
</ul>
  

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/top-m.js"></script>
<!--MAIN NAVIGATION ENDS--></div>

</div>

</div>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> Guidelines</div>
<form>
</form>
<div id="PhotographersListDiv">
  <div class="view-cp-list">
    
    <h3>Photographer's Contract	</h3>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
    <p>&nbsp;</p>
    <h3>Photographer's FAQ's	</h3>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
    <p>&nbsp;</p>
    <h3>Submission Guidelines</h3>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
    <p>&nbsp;</p>
    <h3>Caption the Images	</h3>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
<p>&nbsp;</p>
    <h3>Register Photographer </h3>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
</div>
</div>


<a href="javascript:window.history.back()" class="bt-back"> Back </a>

</div>
</div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


