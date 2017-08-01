<script type="text/javascript">
function update(i)
{  //alert(i);
     var row_id=$('#hidid' +i).val();
	  var price=$('#hidprice' +i).val();
	 var qty=$('#f' +i).val();
	 var url= '<?=base_url()?>index.php/cart/update_cart/' +qty + '/' +row_id +'/' +price;
    //alert(url);
	window.location.assign(url);
}
</script>
<script type="text/javascript">
function back()
{
	
   window.history.go(-2);	
}
</script>

<script type="text/javascript">
function unhide(divID) {
    var item = document.getElementById(divID);
    if (item) {
        item.className=(item.className=='hidden')?'unhidden':'hidden';
    }
}
function close()
{	
	location.replace('<?=  $_SERVER['PHP_SELF'];?>');
}
function changeview(id)
{
	
	if(id==1)
	{
		$('#tab2').hide();
		$('#tab1').show();
	}
	else if(id==2)
	{
		$('#tab2').show();
		$('#tab1').hide();
		
	}
	else
	{
		$('#tab1').hide();
		$('#tab2').hide();
		$('#retrievepw').show();
	}
	
}
</script>
<style>
.black_overlay {
	display: none;
	position: fixed;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 200%;
	background-color: black;
	z-index: 1000;
	-moz-opacity: 0.5;
	opacity: .50;
	filter: alpha(opacity =     80);
}

</style>
<div id="fade" class="black_overlay" onClick="document.getElementById('mailid').style.display='none';document.getElementById('fade').style.display='none'"></div>

	<div id="mailid" class="mailid">
		<ul class='tabs'>
			<li><a href='javascript:changeview(1);'>Login</a></li>
			<li><a href='javascript:changeview(2);'>Join</a></li>
			<li><a href="javascript:close();">Close</a>
			</li>
		</ul>

		<form name="login_form" id="login_form" >
			<div class="signup" id='tab1'> <br />
				<p>
					<img src="<?= base_url();?>assets/images/facebooklogin.jpg"
						width="156" height="26" alt="facebook">				
				</p> <span id="login_error" style="color: red"></span>
				<h3>Login with your WallnArt Account</h3>

				<label for="email"></label> <input name="email" type="text"
					id="email_login" placeholder="Email Address" class="inptbx"> <span
					style="color: red" id="email_login_error"></span><br> <input
						name="password_login" type="password" id="password_login"
						placeholder="Password" class="inptbx"><span style="color: red"
							id="password_login_error"></span>
							<p>
								<a href="javascript:changeview(3);" class="forgot-pw">Forgot
									Your Password?</a>
							</p>
							<p>
								<!--  <a href="#" class="signup-bt">LOGIN</a><br>-->
								<input type="button" id="login" value="LOGIN" class="signup-bt"
									style="border: none; width: 113px; padding: 10px 35px 8px 15px; margin: 15px 0 0 0; display: block">
							
							</p>
			
			</div>
		</form>
        <form name="retrievepw_form" id="retrievepw_form">
		<div id="retrievepw" class="hidden"
			style="margin-top: 25px; height: 200px;  overflow: hidden; background-color: #fff">
			<h3>Retrieve Your Password</h3><br /><span style="color: red" id="retrieve_pass_error"></span>
			<br></br>
            
			<input name="email_forgot" type="text" id="email_forgot" value="Email Address"
				class="inptbx"><br /><span
					style="color: red" id="email_forgot_error"></span> <br>
				<p>
					<a href="javascript:unhide('retrievepw');" class="signup-back">BACK</a>
					<a href="#" class="signup-bt" id="forgot_password_bt">SUBMIT</a>
				</p>
		
		</div>
        </form>
        <div id="retrievepwconfirm" class="hidden"
			style="top: 50px; height: 200px; position: absolute; overflow: hidden; background-color: #fff">

			<div style="width:220px; margin-top:40px; padding:80px 10px 0 10px; font-size:14px; background:url(<?= base_url();?>assets/images/checked.png) 15px 15px no-repeat">
				Your Password has been sent on your Registered Email ID.</div>
		</div>



		<form name="signup_form" id="signup_form">
			<div class="signup" id='tab2'>
				Signup using your facebook ID
				<p>
					<img src="<?= base_url();?>assets/images/facebooklogin.jpg"
						width="156" height="26" alt="facebook">
				
				</p>
				<h3>Sign up with your Email Address</h3>

				<label for="email"></label> <input name="email_reg" type="text"
					id="email_reg" placeholder="Email Address" class="inptbx"><span
					style="color: red" id="email_error"></span> <br> <input
						name="password" type="password" id="password"
						placeholder="Password" class="inptbx"><span style="color: red"
							id="password_error"></span> <input name="cpassword"
							type="password" id="cpassword" placeholder="Confirm Password"
							class="inptbx"><span style="color: red" id="cpassword_error"></span>
								<p>
									<a href="#" class="signup-bt" id="sign_up_submit">SIGN UP</a>
									<!--<input type="submit" name="SIGN UP" id="SIGN UP" value="SIGN UP" class="signup-bt">-->
								</p>
			
			</div>
		</form>
	</div>
	</div>


<!-- =======================================
MIDDLE SECTION CONTENT
======================================= -->

<!--===MIDDLE PAGE CONTAINER STARTS====--><div id="middle-page-container">
<div class="breadcrum"><a href="<?=base_url()?>index.php/frontend/index">Home</a> Collections</div>


<!--=======Shopping Cart========-->
<div class="shopping-hdr"> Shopping Cart</div><a <?php if(!$this->session->userdata('userid')){ ?>href="javascript:changeview(1);"
									onclick="document.getElementById('mailid').style.display='block';document.getElementById('fade').style.display='block'" <?php } else{ ?> href="#" <?php } ?>class="checkout-bt"> Checkout</a>
<ul class="shop-cat-hdr-holder">
<li class="shop-itm shop-cat-hdr"> Item</li>
<li class="shop-opt shop-cat-hdr"> Options</li>
<li class="shop-qty shop-cat-hdr"> Quantity</li>
<li class="shop-price shop-cat-hdr"> Price</li>
</ul>
<?php if($this->session->userdata('userid')){ $data=$this->cart_model->get_usercart($this->session->userdata('userid')); $subtotal=0; $i=1;foreach($data as $image){
	 ?>
     
<ul class="shop-detail-holder">
<li class="shop-itm">
<a href="#"><img src="https://s3.amazonaws.com/wallsnart/158/<?= $image['image_name'];?>" /></a>
<div class="shop-itm-detail"><h4><strong>MIRANDA, THE TEMPEST, 1916</strong></h4>
By John William Waterhouse | Giclee Print | 24 x 18 in | Item #: 11787261A
<a href="#" class="shop-frameit-bt">Frame It</a>
</div>
</li>
<li class="shop-opt"> <a href="#" class="shoplnks">Frame It</a> <a href="#" class="shoplnks">Mount</a></li>
<li class="shop-qty"><input name="f" type="text" id="f<?= $i?>" value="<?= $image['cart_quantity'];?>"/> <input type="hidden" id="hidid<?=$i?>"  value="<?= $image['cart_id'];?>" /><input type="hidden" id="hidprice<?=$i?>"  value="<?= $image['price'];?>" />
  <a href="#" class="shoplnks" onclick="update('<?=$i?>');">Update</a> <a href="<?=base_url()?>index.php/cart/remove_cart/<?= $image['cart_id'];?>" class="shoplnks">Remove</a></li>
<li class="shop-price"><img src="<?=base_url()?>assets/images/rupee-img-price.gif" /><?= $image['price'];?></li>
</ul>
<?php $i++; $subtotal=$subtotal+$image['price']; }} else{ 

 $subtotal=0; $i=1;foreach($this->cart->contents() as $image){
	 ?>
     
<ul class="shop-detail-holder">
<li class="shop-itm">
<a href="#"><img src="https://s3.amazonaws.com/wallsnart/158/<?= $image['name'];?>" /></a>
<div class="shop-itm-detail"><h4><strong>MIRANDA, THE TEMPEST, 1916</strong></h4>
By John William Waterhouse | Giclee Print | 24 x 18 in | Item #: 11787261A
<a href="#" class="shop-frameit-bt">Frame It</a>
</div>
</li>
<li class="shop-opt"> <a href="#" class="shoplnks">Frame It</a> <a href="#" class="shoplnks">Mount</a></li>
<li class="shop-qty"><input name="f" type="text" id="f<?= $i?>" value="<?= $image['qty'];?>"/> <input type="hidden" id="hidid<?=$i?>"  value="<?= $image['rowid'];?>" /><input type="hidden" id="hidprice<?=$i?>"  value="<?= $image['price'];?>" />
  <a href="#" class="shoplnks" onclick="update('<?=$i?>');">Update</a> <a href="<?=base_url()?>index.php/cart/remove_cart/<?= $image['rowid'];?>" class="shoplnks">Remove</a></li>
<li class="shop-price"><img src="<?=base_url()?>assets/images/rupee-img-price.gif" /><?= $image['subtotal'];?></li>
</ul>
<?php $i++; $subtotal=$subtotal+$image['subtotal']; }} ?>
<ul>
<li class="shop-itm shop-cat-hdr">&nbsp;</li>
<li class="shop-opt shop-cat-hdr">&nbsp;</li>
<li class="shop-qty shop-cat-hdr">Sub Total</li>
<li class="shop-price shop-cat-hdr"> <img src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $subtotal;?></li>
</ul>

<div class="shop-bt-holders-bottom"><a href="javascript:;" class="cont-shop-bt" style="width:255px;" onclick="back();"> Continue Shopping</a> <?php if(!$this->session->userdata('userid')){ ?><a href="javascript:changeview(1);"
									onclick="document.getElementById('mailid').style.display='block';document.getElementById('fade').style.display='block'"  class="checkout-bt"> Checkout</a> <?php }else{?> <a href="#" class="checkout-bt">Checkout </a><?php } ?></div>
<?php if(!$this->session->userdata('userid')){?>
<form action="<?=base_url()?>index.php/cart/save_cart" method="post"><div style="margin-left:472px;">Save Your Cart :&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" placeholder="example@example.com" style="height:25px; width:250px;"/>&nbsp;&nbsp;&nbsp;<input type="submit" value="Save" >
 <br /> 
   
           <p align="center">    <a href="<?= base_url()?>index.php/cart/retrieve_cart">Retrieve Your Cart</a>          </p>
    
       </div></form>
<?php } ?>

<!--===MIDDLE PAGE CONTAINER ENDS====--></div>
<!--==========GLOBAL CONTAINERS ENDS===========--></div></div></div>



