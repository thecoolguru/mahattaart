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
<!-- =======================================
MIDDLE SECTION CONTENT
======================================= -->

<!--===MIDDLE PAGE CONTAINER STARTS====--><div id="middle-page-container">
<div class="breadcrum"><a href="<?=base_url()?>frontend/index">Home</a> <a href="<?=base_url()?>frontend/contact">Customer Service</a> FAQs </div>

<!--=======LEFT SIDE PANEL STARTS========--><div class="left-panel-page">
<div class="main-cat-name"> Let us Help</div>
<div class="sub-cat-links">
  <ul>
  <li>
 <ul>
    <li><a href="#" class="parnt">Customer Service</a></li>
    <li><a href="#">Contact Us</a></li>
    <li><a href="#">Faqs</a></li>
    <li><a href="#"> Ordering</a></li>
    <li class="active-cat-link">Shiping &amp; Delivery</li>
    
    </ul>
    </li>
 <li>
    <ul>
    <li><a href="#" class="parnt">My Account</a></li>
    <li><a href="#">My Profile</a></li>
    <li><a href="#">Track My Order</a></li>
    <li><a href="#">Order History</a></li>
    <li><a href="#">My Cart </a></li>
    
    </ul>
    </li>
 <li>
    <ul>
    <li><a href="#" class="parnt">Walls-n-art</a></li>
    <li><a href="#">The Company</a></li>
    <li><a href="#">Media Centre</a></li>
    <li><a href="#">Careers</a></li>
    <li><a href="#">Partners</a></li>
   
    </ul>
</li>
 <li>    
    <ul>
    <li><a href="#" class="parnt">Terms & Policies</a></li>
    <li><a href="#">Terms of Use</a></li>
    <li><a href="#">Privacy Policy</a></li>
   </ul>
  <li>
 </ul>
</div>
<!--=======LEFT SIDE PANEL ENDS========--></div>

<!--=======RIGHT SIDE PANEL STARTS========--><div class="right-panel-page">
<div class="hdr-orange"> Shipping &amp; Delivery</div>
<br><br><br><br><br>
<div class="helptxt">
<p>Whether you're a longtime fan or making your first purchase, we think you'll find shopping with Art.com to be fun, fast and convenient.</p>
<p>&nbsp;</p>
  <span class="subhdr">How to Place an Order?</span>
    <p> Place the product(s) you wish to order in your shopping cart by clicking on the &quot;Add to Cart&quot; button located next to the product image. When you're ready to complete your order, click &quot;Checkout&quot; from within your cart and follow the instructions. You may also complete your order by calling us at 91-11-41828395/96.<br />
    </p>
  <p>&nbsp;</p>
  <span class="subhdr">Payment Options </span>
    <p>We accept all major credit cards, including Visa, Mastercard and American Express. We also accept  checks and money orders.</p> 
    <br />
    <span class="subhdr">Order Cancellations &amp; Modifications </span>
    <p>To cancel an order that has not yet shipped, have your order number available and contact our Customer Support Team. We are unable to process cancellations for items that have already shipped. Please visit our Returns page or contact us for alternate options. </p>
    <p>&nbsp;</p>
    <p>Sorry, we're unable to add additional items to existing orders or substitute individual components. To make these adjustments, you will need to cancel your existing order and place a new one.</p>
    <p>&nbsp;</p>
    <p><span class="subhdr">Product Information</span> </p>
    <p>  Learn more about our Product Types and Framing and Other Services to find the art that best suits your style and budget. If you'd like help deciding on an item, our Customer Support Team is standing by to help. They're trained experts, and would love to hear from you!</p>
    <p>&nbsp;</p>
    <span class="subhdr">Privacy Policy? </span>
    <p> We are committed to protecting your privacy. When you enter your credit card number on our order forms, we encrypt that information using secure socket layer technology (SSL) and we store your credit card number in encrypted form for a limited amount of time, and our employees do not have access to this information. We do not store PIN data or security codes. </p>
    <p>&nbsp;</p>
    <p>Under no circumstances do we rent, trade or share your email address with any other company for their marketing purposes without your consent. We use your personal information for internal purposes such as processing and keeping you informed of your order. You may receive information from us about new features, new services and special offers we think you'll find valuable. If you take advantage of special offers made by our marketing partners, we may transfer your personal information to them. Also, we make our customer's mailing addresses available to carefully screened companies whose products or services might interest you. For more information, please see our Privacy Policy.</p>
</div>

<!--=======RIGHT SIDE PANEL ENDS========--></div>
<!--===MIDDLE PAGE CONTAINER ENDS====--></div>
<!--==========GLOBAL CONTAINERS ENDS===========--></div></div></div>