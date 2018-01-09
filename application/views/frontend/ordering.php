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

<div class="container">
<div class="row">

<!-- art style -->
<div class="art-style col-md-12">
<div class="pagination" style="margin:0"> <span> <a href="#">HOME</a> > Mahatta-Art > <span> FAQ's</span> </span> </div>
<div class="row">
<!-- aside -->
<aside class="left-panel-page col-md-2 col-xs-3">
  <p>Let Us Help</p>
  <div class="list">
    <ul>
      <li ><a href="<?=base_url()?>frontend/contact">Contact us</a></li>
      <li class="active-cat-link" style="color:#339900; font-size:16px;">FAQ's</li>
      <li><a href="<?php echo base_url()?>frontend/ordering">Ordering</a></li>
       <li><a href="<?php echo base_url()?>frontend/shipping">Shiping &amp; Delivery </a></li>
    </ul>
  </div>
  <?php if($this->session->userdata('userid')){ ?>
  <p>My Account</p>
  <div class="list">
    <ul>
      <li><a href="<?php print base_url();?>user/profile">My Profile</a></li>
      <li><a href="<?php echo base_url()?>frontend/ordering">Track My Order</a></li>
      <li><a href="<?php echo base_url()?>frontend/ordering">Order History</a></li>
    </ul>
  </div>
  <?php } ?>
  <p>Mahatta-Art</p>
  <div class="list">
    <ul>
      <li><a href="<?=base_url()?>frontend/about">The Company</a></li>
      
      <li><a href="<?=base_url()?>frontend/career">Careers</a></li>
      <li ><a href="<?=base_url()?>frontend/Partner">Partners</a></li>
    </ul>
  </div>
</aside>
<!-- aside --> 

<!-- right panel -->
<div class="right-panel-page col-md-10 col-xs-9">

<!--  Art Movements -->


<div class="art-movements">
  <div class="art-inner"> <img src="<?php print base_url();?>assets/img/ordering.jpg" class="img-responsive" border="0"> </div>
</div>

     <div class="career-page">
     <!--<h2>Shipping & Delivery</h2>-->
     
     
     
     
     
     
     

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
<p>Typically, orders once placed cannot be cancelled. Please contact at the earliest and we will try to do whatever best we can. Your order starts processing within 4 to 6 hours of order placement. Once the order starts processing we are unable to cancel the order.</p>
<p><a href="http://www.mahattaart.com/return">http://www.mahattaart.com/return</a></p>
</div>
</div>

<div class="faqquestion">
<p><strong> What if I want to return an order?  </strong></p>
<div class="faq-content">
<p>If you have received a damaged product, please refer to the process mentioned in above point of <strong>What if I receive damaged product?</strong></p>
<p>If the product is not damaged then,</p>
<p><strong>In case of Art:</strong></p>
<p>Please send us a request of return with a brief description of the reason for the return at +91-8800639075, 011-41828972 or by emailing info@mahattaart.com</p>
<p>After receiving the request, we will arrange a pick up from the shipping address. Please return the package in the original packing including invoice, price tags, labels, original packing, freebies and accessories.</p>
<p>Once a return request is authorized from our end, refund will be processed within 7-10 business days of receipt of the returned product, provided goods are received in an acceptable condition. The mode of refund will be the same as the mode of payment chosen when placing the order.</p>
</div>
</div>

<div class="faqquestion">
<p><strong> In case of Photos To Frame:</strong></p>
<div class="faq-content">
<p>Since it's a customize product as per your specifications. We are really sorry we won't be able to process the return of it. If you're not sure of size, print surface or frame or facing any issue while placing the order you may contact us at  +91-8800639075, 011-41828972 or by emailing info@mahattaart.com our customer support executive will get in touch with you to help you with your order.</p>
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
<p> Enter the exact name of the artwork/ artist name or the SKU ID into the search box that appears at the top of each page. Or you can contact our Customer Support Team at 011-41828972 or by emailing  <a href="mailto:info@mahattaart.com">info@mahattaart.com</a>.</p>
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


.faqquestion p strong{ 
    color: #000;
   }
	

.career-page ul { margin:4px 13px;}

ul.a {list-style-position:inside;}


</style>