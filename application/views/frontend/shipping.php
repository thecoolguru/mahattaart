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

<div class="main-container container">
<div class="pagination" style="margin:0"> <span> <a href="#">HOME</a> > Mahatta-Art > <span> FAQ's</span> </span> </div>
<!-- art style -->
<div class="art-style">
<!-- aside -->
<aside class="left-panel-page">
  <p>Let Us Help</p>
  <div class="list">
    <ul>
      <li ><a href="<?=base_url()?>index.php/frontend/contact">Contact us</a></li>
      <li class="active-cat-link" style="color:#339900; font-size:16px;">FAQ's</li>
        <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Ordering</a></li>
        <li><a href="<?php echo base_url()?>index.php/frontend/shipping">Shipping & Delivery</a></li>
    </ul>
  </div>
  <?php if($this->session->userdata('userid')){ ?>
  <p>My Account</p>
  <div class="list">
    <ul>
      <li><a href="<?php print base_url();?>index.php/user/profile">My Profile</a></li>
      <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Track My Order</a></li>
      <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Order History</a></li>
    </ul>
  </div>
  <?php } ?>
  <p>Mahatta-Art</p>
  <div class="list">
    <ul>
      <li><a href="<?=base_url()?>index.php/frontend/about">The Company</a></li>
    
      <li><a href="<?=base_url()?>index.php/frontend/career">Careers</a></li>
      <li ><a href="<?=base_url()?>index.php/frontend/Partner">Partners</a></li>
    </ul>
  </div>
</aside>
<!-- aside --> 

<!-- right panel -->
<div class="right-panel-page">

<!--  Art Movements -->
<div class="art-movements">
  <div class="art-inner"> <img src="<?php print base_url();?>assets/img/shipping.jpg" class="img-responsive" border="0"> </div>
</div>



     <div class="career-page">
     <!--<h2>Shipping & Delivery</h2>-->
     
<h3> Shipping and Delivery </h3>
     
     
     <div class="faqquestion">
<p><strong>What type of packaging do you use? </strong></p>

<div class="faq-content">
<p>Posters and art prints are rolled with thick paper to protect against dust before being packaged in corrugated triangular shipping containers. Framed items are covered securely and placed in adjustable corrugated inserts that lock the frame in position.</p>
</div>
</div>
     
     
     
     
     
     
      <div class="faqquestion">
<p><strong>When will my art arrive? </strong></p>

<div class="faq-content">
<p>You can estimate your art arrival within 5-7 business days.</p>
</div>
</div>
     
      <div class="faqquestion">
<p><strong>How should I track my order? </strong></p>

<div class="faq-content">
<p>A confirmation email that includes a tracking number will be provided to you to check .</p>
</div>
</div>








<p>&nbsp;</p>

</div>


</div>
<!--  Art Movements -->

</div>
<!-- right panel -->

</div>

<style>

.career-page h3 {  font-family: 'BebasNeueRegular',Arial,Helvetica,sans-serif;   font-size: 27px;
    font-weight: normal;
    color: #000;
    margin: 5px 0 5px 0; }

.career-page h4 {  font-size: 14px;
    font-weight: bold;
    color: #000;
	margin: 5px 0 5px 0;
    }


.faqquestion p { padding:0px 0px 2px 0px !important;}
.faqquestion p strong{ /*font-family: "Times New Roman",Times,serif;*/    font-size: 14px;
    font-weight: bold;
    color: #000;
	margin: 0px 0 18px 0;
   }
	
.faq-content p {  padding:0px 0px 18px 0px !important;/*font-family: "Times New Roman",Times,serif;*/}

.career-page ul { margin:4px 13px;}

ul.a {list-style-position:inside;}


</style>