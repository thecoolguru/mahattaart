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

<div class="main-container">


<!-- art style -->
<div class="art-style">




<!-- aside -->
<aside style="width:13%">
<div class="pagination"> <span> <a href="#">HOME</a> > Walls-n-Art > <span> FAQ's</span> </span> </div>

  <p>Let Us Help</p>
  <div class="list">
    <ul>
      <li ><a href="<?=base_url()?>index.php/frontend/contact">Contact us</a></li>
      <li class="active-cat-link" style="color:#339900; font-size:16px;">FAQ's</li>
      <li><a href="#">Ordering</a></li>
      <li><a href="#">Shipping & Delivery</a></li>
    </ul>
  </div>
  <p>My Account</p>
  <div class="list">
    <ul>
      <li><a href="<?=base_url()?>index.php/frontend/profile">My Profile</a></li>
      <li><a href="#">Track My Order</a></li>
      <li><a href="#">Order History</a></li>
    </ul>
  </div>
  <p>Walls-n-Art</p>
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
<div class="right-panel">

<!--  Art Movements -->
<div class="art-movements">
  <div class="art-inner"> <img src="<?php print base_url();?>assets/img/faq.jpg" width="710" height="210" border="0"> </div>
</div>



     <div class="career-page">
     <!--<h2>Shipping & Delivery</h2>-->
     
     
     
     
     
     
     
     
     <h3> Shipping and Delivery </h3>
<h4> What type of packaging do you use? </h4> 
 
   <p> Posters and art prints are rolled with a paper cover to protect against dust before being        packaged in cylindrical shipping containers. Framed items are covered securely with bubble wrap and thermacoland placed in adjustable 5Ply/3Ply corrugated box that locks the frame in position. </p>
   
  
   
<h4> When will my art arrive? </h4>

<p> You can estimate your art arrival within 5-7 business days.  </p>

<h4> How should I track my order?,</h4>
 
<p> A confirmation email that includes a tracking number will be provided to you to check . </p>

<h3> Ordering </h3>

<h4> How do I place an order? </h4>

<p> Add the product(s) you wish to order in your shopping cart by clicking on the "Add to Cart" button located next to the product image. When you're ready to complete your order, click "Checkout" from within your cart and follow the instructions. You may also complete your order by calling us at 011-41828972. </p>

<h4> What payment options do you accept? </h4>

<p> We accept all Credit card, debit card orders. </p>

<h4> Can I cancel my order? </h4>

<p> To cancel an order that has not yet shipped, have your order number available and contact our Customer Support Team at 011-41828972or by emailinginfo@wallsnart.com. We are unable to process cancellations for items that have already shipped. Please visit our returns page or contact us for alternate options.</p>

<p> We are unable to add additional items to existing orders or substitute individual items. You will need to cancel your existing order and place a new one. </p>

<h3> How do I find a specific item from your catalog? </h3>



<p>  Enter the exact name of the artwork/ artist name or the SKU ID into the search box that appears at the top of each page. Or you can contact our Customer Support Team at 011-41828972 or by emailing info@wallsnart.com </p>



<h3> Does the image on your site accurately represent what I will be sent? </h3>

<p> We strive for a high degree of image accuracy. However, in some cases, the color of prints may vary. If you are not satisfied with the product you receive, you may return it within 7 days for a refund. </p>

<h4> How accurate are the item dimensions listed on your web pages? </h4>

<p> We verifies the dimensions of all images on our site, but due to industry standards sizes can vary slightly up to (1½"). If you are not satisfied with the product you receive, you may return it within 7 days for a refund. </p>

<h3> Returns </h3>

<h4> What is your return policy? </h4>

<p>We are committed to quality products and your satisfaction is 100% guaranteed. If for any reason you are not completely satisfied with your purchase, you may return it within 7 days of receipt and receive a free replacement or a full refund for the price of the product.</p> 

<h4> What if I receive damaged product? </h4> 

<p> If your order arrives in less damaged condition we offer a hassle-free Photo Return option to speed replacement. Here's how: </p>
<ul>
<li> 1.	Take a digital photo of your damaged product and the shipping container it arrived in (only if the package is also damaged).</li>
<li>2.	Attach your photos to an email and send them to info@wallsnart.com. Please include your order number, shipping ID or item number, a brief description of the reason for the return, and whether you'd like a replacement or a refund. </li>
<li>3.	You will receive an email within 24-48 hours confirming that your photo return is being processed. </li>
<li>4.	If your photo return is confirmed, you do not need to mail back your order. We will process the refund or replacement based on your photos. </li>
</ul>


<br /> Please note: 

<p>	If the damage or quality issue is not apparent in the photo, you may be required to return the item at your expense before the return can be processed 
</p>


<h4> What if I want to return an order? </h4>

<p> Please send us a request of return with a brief description of the reason for the returnat 011-41828972 or by emailing info@wallsnart.com </p>
<p>
After receiving the request, we will arrange a pick up from the shipping address.Please return the package in the original packing including invoice, price tags, labels, original packing, freebies and accessories.</p>

<p>

Once a return request is authorized from our end, refund will be processed within 7-10 business days of receipt of the returned product, provided goods are received in an acceptable condition. The mode of refund will be the same as the mode of payment chosen when placing the order.  </p>




     
     
     

</div>


</div>
<!--  Art Movements -->

</div>
<!-- right panel -->

</div>

<style>

.career-page h3 { font-size:23px;  font-family: 'BebasNeueRegular',Arial,Helvetica,sans-serif;   font-size: 24px;
    font-weight: normal;
    color: #000;
    margin: 5px 0 5px 0;}

.career-page h4 {  font-size: 14px;
    font-weight: bold;
    color: #000;
	margin: 5px 0 5px 0;
    }

.career-page > ul li {
    list-style-type: square;
	padding:3px 0px;
	
}
.career-page p {margin: 0px 0 18px 0;}

.career-page ul { margin:4px 13px;}


</style>