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

<!--  Art Movements 
<div class="art-movements">
  <div class="art-inner"> <img src="<?php print base_url();?>assets/img/faq.jpg" width="710" height="210" border="0"> </div>
</div>
-->


     <div class="career-page">
     <!--<h2>Shipping & Delivery</h2>-->
     
<h3> Returns </h3>


<div class="faqquestion">
<p><strong>  What is your return policy? </strong></p>


<div class="faq-content">
<p>We are committed to quality products and your satisfaction is 100% guaranteed. If for any reason you are not completely satisfied with your purchase, you may return it within 7 days of receipt and receive a free replacement or a full refund for the price of the product.</p>
</div>
</div>


<div class="faqquestion">
<p><strong>   What if I receive damaged product? </strong></p>


<div class="faq-content">
<p>If your order arrives in less damaged condition we offer a hassle-free Photo Return option to speed replacement. Here's how:.</p>
</div>
</div>



<ul class="a">
<li> <p> 1.	Take a digital photo of your damaged product and the shipping container it arrived in (only if the package is also damaged).</p></li>

<li> <p>2.	Attach your photos to an email and send them to <a href="mailto:info@mahattaart.com">info@mahattaart.com.</a>  Please include your order number, shipping ID or item number, a brief description of the reason for  &nbsp;&nbsp;&nbsp; the  return, and whether you'd like a replacement or a refund. </p> </li>

<li> <p>3.	You will receive an email within 24-48 hours confirming that your photo return is being processed. </p></li>

<li><p> 4.	If your photo return is confirmed, you do not need to mail back your order. We will process the refund or replacement based on your photos.</p> </li>
</ul>


<br /> Please note: 

<p>	If the damage or quality issue is not apparent in the photo, you may be required to return the item at your expense before the return can be processed 
</p>


<h4> What if I want to return an order? </h4>

<p> Please send us a request of return with a brief description of the reason for the returnat 011-41828972 or by emailing <a href="mailto:info@mahattaart.com">info@mahattaart.com </a> </p>
<p>
After receiving the request, we will arrange a pick up from the shipping address.Please return the package in the original packing including invoice, price tags, labels, original packing, freebies and accessories.</p>

<p>

Once a return request is authorized from our end, refund will be processed within 7-10 business days of receipt of the returned product, provided goods are received in an acceptable condition. The mode of refund will be the same as the mode of payment chosen when placing the order.  </p>
     
    <p>&nbsp;</p> 


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