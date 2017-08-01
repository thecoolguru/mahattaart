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

<div class="container"><div class="row">

<!-- art style -->
<div class="art-style col-md-12">
<div class="pagination" style="margin:0"> <span> <a href="#">HOME</a> > Mahatta-Art > <span> FAQ's</span> </span> </div><div class="row">

<!-- aside -->
<aside class="left-panel-page col-md-2 col-xs-3">

  <p>Let Us Help</p>
  <div class="list">
    <ul>
      <li ><a href="<?=base_url()?>index.php/frontend/contact">Contact us</a></li>
      <li class="active-cat-link" style="color:#339900; font-size:16px;">FAQ's</li>
      <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Ordering</a></li>
        <li><a href="<?php echo base_url()?>index.php/frontend/shipping">Shipping & Delivery</a></li>
    </ul>
  </div>
  <p>My Account</p>
  <div class="list">
    <ul>
      <li><a href="<?php print base_url();?>index.php/user/profile">My Profile</a></li>
      <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Track My Order</a></li>
      <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Order History</a></li>
    </ul>
  </div>
  <p>Mahatta-Art</p>
  <div class="list">
    <ul>
      <li><a href="<?=base_url()?>index.php/frontend/about">The Company</a></li>
      <li><a href="<?=base_url()?>index.php/frontend/media_center">Media Center</a></li>
      <li><a href="<?=base_url()?>index.php/frontend/career">Careers</a></li>
      <li ><a href="<?=base_url()?>index.php/frontend/Partner">Partners</a></li>
    </ul>
  </div>
</aside>
<!-- aside --> 

<!-- right panel -->
<div class="right-panel-page col-md-10 col-xs-9">

<!--  Art Movements -->
<div class="art-movements">
  <div class="art-inner"> <img src="<?php print base_url();?>assets/img/faq.jpg" border="0" class="img-responsive"> </div>
</div>



     <div class="career-page"> 
    <p style="margin:0px;"> Looking for a quick answer? You've come to the right place. </p>
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



 


<h3> Ordering </h3>

<div class="faqquestion">
<p><strong> How do I place an order? </strong></p>

<div class="faq-content">
<p>Add the product(s) you wish to order in your shopping cart by clicking on the "Add to Cart" button located next to the product image. When you're ready to complete your order, click "Checkout" from within your cart and follow the instructions. You may also complete your order by calling us at 011-41828972.</p>
</div>
</div>



<div class="faqquestion">
<p><strong>  What payment options do you accept? </strong></p>

<div class="faq-content">
<p>We accept all Credit card, debit card orders.</p>
</div>
</div>


<div class="faqquestion">
<p><strong>  Can I cancel my order?  </strong></p>


<div class="faq-content">
<p>To cancel an order that has not yet shipped, have your order number available and contact our Customer Support Team at 011-41828972or by  emailing <a href="mailto:"> info@mahattaart.com. </a> We are unable to process cancellations for items that have already shipped. Please visit our returns page or contact us for alternate options.</p>
</div>
</div>





<div class="faqquestion">
<div class="faq-content">
<p>We are unable to add additional items to existing orders or substitute individual items. You will need to cancel your existing order and place a new one.</p>
</div>
</div>




<div class="faqquestion">
<p><strong>  How do I find a specific item from your catalog?   </strong></p>


<div class="faq-content">
<p> Enter the exact name of the artwork/ artist name or the SKU ID into the search box that appears at the top of each page. Or you can contact our Customer Support Team at 011-41828972 or by emailing  <a href="info@mahattaart.com">info@mahattaart.com</a>.</p>
</div>
</div>



<div class="faqquestion">
<p><strong> Does the image on your site accurately represent what I will be sent?   </strong></p>


<div class="faq-content">
<p>We strive for a high degree of image accuracy. However, in some cases, the color of prints may vary. If you are not satisfied with the product you receive, you may return it within 7 days for a refund.</p>
</div>
</div>




<div class="faqquestion">
<p><strong> How accurate are the item dimensions listed on your web pages?  </strong></p>


<div class="faq-content">
<p>We verifies the dimensions of all images on our site, but due to industry standards sizes can vary slightly up to (1½"). If you are not satisfied with the product you receive, you may return it within 7 days for a refund.</p>
</div>
</div>



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

<p> Please send us a request of return with a brief description of the reason for the return at 011-41828972 or by emailing <a href="mailto:info@mahattaart.com">info@mahattaart.com </a> </p>
<p>
After receiving the request, we will arrange a pick up from the shipping address.Please return the package in the original packing including invoice, price tags, labels, original packing, freebies and accessories.</p>

<p>

Once a return request is authorized from our end, refund will be processed within 7-10 business days of receipt of the returned product, provided goods are received in an acceptable condition. The mode of refund will be the same as the mode of payment chosen when placing the order.  </p>
     
    <p>&nbsp;</p> 

</div>


</div>
<!--  Art Movements -->

</div></div>
<!-- right panel -->

</div></div>

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