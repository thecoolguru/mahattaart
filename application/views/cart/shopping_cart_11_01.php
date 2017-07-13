<?php 
if($this->session->userdata('userid'))
{
$Obj=new Cart();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 
?>
<?php  //echo $key;
if(!$key){
	$key="flower";
}?>
<?php
              $userName=$this->cart_model->get_userDetails($this->session->userdata('userid'));
             ?>
<div class="main-container">
    	
        <div class="pagination">
        	<span> <a href="<?=base_url()?>index.php/frontend/index">HOME</a> > <span> Check Out</span> </span>
        </div>
        
        <!-- checkout -->
        <div class="checkout">
        	<div class="checkout-l-c">
            	<p>Enter Information <a id="select" href="javascript:void(0)" onClick="drop('slidedrop','select')" class="drop"><i class="ci"></i></a></p>
                
                <div style="display:block;" id="slidedrop">
                <div class="checkout-add">
                	<div class="checkout-delivery">
                    	<h4>Hi <?php echo ucwords($userName->first_name.' '.$userName->last_name);?> </h4>
                    	<p><?=$userName->address;?></p>
                    </div>
<!--                    <div class="checkout-edit">
                    	<span>
                        	<a href="#"><i class="del"></i></a>
                            <a href="#"><i class="ed"></i></a>
                        </span>
                        
                        <span><a href="#" class="co-btn">Continue</a></span>
                        
                    </div>-->
                </div>
                
                    <div class="checkout-form" id="">
                        <br>
                        <span id="field_blank" style=" margin-left: 177px;  color: red"></span>
                	<form action="#" method="post">
                    	<p>
                        	<span>Name</span>
                                <input type="text" name="name" id="name" value="<?php echo ucwords($userName->first_name.' '.$userName->last_name);?>">
                        </p>
                        
                      <p>
                        	<span>Pincode</span>
                                <input type="text" name="pincode" id="pincode" maxlength="6" onkeypress="return numbersonly(event)" value="<?=$userName->zip_code;?>">
                        </p>
                        
                        <p>
                        	<span>Address</span>
                                <textarea name="address" id="address"><?=$userName->address;?></textarea>
                        </p>
                        
                       
                        
                        <p>
                        	<span>City</span>
                                <input type="text" name="city" id="city" value="<?=$userName->city;?>">
                        </p>
                        
                        <p>
                        	<span>State</span>
                                <select name="state" id="state">
                                          <option value="">------------Select State------------</option>
                                          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                          <option value="Assam">Assam</option>
                                          <option value="Bihar">Bihar</option>
                                          <option value="Chandigarh">Chandigarh</option>
                                          <option value="Chhattisgarh">Chhattisgarh</option>
                                          <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                          <option <?php if($userName->state=='Daman and Diu'){?> selected=""<?php }?> value="Daman and Diu">Daman and Diu</option>
                                          <option <?php if($userName->state=='delhi'){?> selected=""<?php }?> value="Delhi">Delhi</option>
                                          <option value="Goa">Goa</option>
                                          <option value="Gujarat">Gujarat</option>
                                          <option value="Haryana">Haryana</option>
                                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                                          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                          <option value="Jharkhand">Jharkhand</option>
                                          <option value="Karnataka">Karnataka</option>
                                          <option value="Kerala">Kerala</option>
                                          <option value="Lakshadweep">Lakshadweep</option>
                                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                                          <option value="Maharashtra">Maharashtra</option>
                                          <option value="Manipur">Manipur</option>
                                          <option value="Meghalaya">Meghalaya</option>
                                          <option value="Mizoram">Mizoram</option>
                                          <option value="Nagaland">Nagaland</option>
                                          <option value="Orissa">Orissa</option>
                                          <option value="Pondicherry">Pondicherry</option>
                                          <option value="Punjab">Punjab</option>
                                          <option value="Rajasthan">Rajasthan</option>
                                          <option value="Sikkim">Sikkim</option>
                                          <option value="Tamil Nadu">Tamil Nadu</option>
                                          <option value="Tripura">Tripura</option>
                                          <option value="Uttaranchal">Uttaranchal</option>
                                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                                          <option value="West Bengal">West Bengal</option>
                                          </select>
                        </p>
                        
                        <p>
                        	<span>Phone</span>
                                <input type="text" id="phone" name="phone" maxlength="10" onkeypress="return numbersonly(event)" value="<?=$userName->contact;?>">
                        </p>
                    </form>
                </div>
                
                
                <script type="text/javascript" language="javascript">
				 function BillingAdress()
				 	{
					
						var radios = document.getElementsByName('sameaddress');
						
							for (var i = 0, length = radios.length; i < length; i++) {
							if (radios[i].checked) {
							
							  if(radios[i].value=='yes')
							  	{
								document.getElementById('another_billingaddress').style.display='none';
								}else
								if(radios[i].value=='no')
							  	{
								document.getElementById('another_billingaddress').style.display='block';
								}
								break;
							}
						}// loop
					 
					 
					}// end function
				</script>
                <div class="checkout-billing">
                	<p>
                    	<span class="span">Billing Address </span>
                        <span>Same as Shipping Address</span>
                        <span><input type="radio" name="sameaddress"  id="sameaddress_yes" value="yes" onClick="return BillingAdress();"></span>
                        <span>YES</span>
                        <span><input type="radio" name="sameaddress" id="sameaddress_no" value="no" onClick="return BillingAdress();"></span>
                        <span>NO</span>
<!--                        <span><a href="#" class="btn-c">Continue</a></span>-->
                    </p>
                </div>
                <div class="checkout-form" id="another_billingaddress" style="display:none;">
                        <br>
                        <span id="field_blank" style=" margin-left: 177px;  color: red"></span>
                	<form action="#" method="post">
                    	<p>
                        	<span>Name</span>
                                <input type="text" name="name" id="name" value="<?php echo ucwords($userName->first_name.' '.$userName->last_name);?>">
                        </p>
                        
                      <p>
                        	<span>Pincode</span>
                                <input type="text" name="pincode" id="pincode" maxlength="6" onkeypress="return numbersonly(event)" value="<?=$userName->zip_code;?>">
                        </p>
                        
                        <p>
                        	<span>Address</span>
                            <textarea><?=$userName->address;?></textarea>
                        </p>
                        
                       
                        
                        <p>
                        	<span>City</span>
                                <input type="text" name="city" id="city" value="<?=$userName->city;?>">
                        </p>
                        
                        <p>
                        	<span>State</span>
                                <select name="state" id="state">
                                          <option value="">------------Select State------------</option>
                                          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                          <option value="Assam">Assam</option>
                                          <option value="Bihar">Bihar</option>
                                          <option value="Chandigarh">Chandigarh</option>
                                          <option value="Chhattisgarh">Chhattisgarh</option>
                                          <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                          <option <?php if($userName->state=='Daman and Diu'){?> selected=""<?php }?> value="Daman and Diu">Daman and Diu</option>
                                          <option <?php if($userName->state=='delhi'){?> selected=""<?php }?> value="Delhi">Delhi</option>
                                          <option value="Goa">Goa</option>
                                          <option value="Gujarat">Gujarat</option>
                                          <option value="Haryana">Haryana</option>
                                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                                          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                          <option value="Jharkhand">Jharkhand</option>
                                          <option value="Karnataka">Karnataka</option>
                                          <option value="Kerala">Kerala</option>
                                          <option value="Lakshadweep">Lakshadweep</option>
                                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                                          <option value="Maharashtra">Maharashtra</option>
                                          <option value="Manipur">Manipur</option>
                                          <option value="Meghalaya">Meghalaya</option>
                                          <option value="Mizoram">Mizoram</option>
                                          <option value="Nagaland">Nagaland</option>
                                          <option value="Orissa">Orissa</option>
                                          <option value="Pondicherry">Pondicherry</option>
                                          <option value="Punjab">Punjab</option>
                                          <option value="Rajasthan">Rajasthan</option>
                                          <option value="Sikkim">Sikkim</option>
                                          <option value="Tamil Nadu">Tamil Nadu</option>
                                          <option value="Tripura">Tripura</option>
                                          <option value="Uttaranchal">Uttaranchal</option>
                                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                                          <option value="West Bengal">West Bengal</option>
                                          </select>
                        </p>
                        
                        <p>
                        	<span>Phone</span>
                                <input type="text" id="phone" name="phone" maxlength="10" onkeypress="return numbersonly(event)" value="<?=$userName->contact;?>">
                        </p>
                    </form>
                </div>
                
                <div class="checkout-billing">
                	<p class="tac">
		
			
					<a href="#" class="savencoti-btn" onclick="return checkValidateSelect1()">Save & Continue</a>
		
					</p>
                </div>
                
                </div>
                
                <div class="paymet">
                	<p>Payment <a id="select1" href="javascript:void(0)" onClick="drop('slidedrop1','select1')" class="drop"><i class="ci"></i></a></p>
                    <script type="text/javascript" language="javascript">
					
						window.onload = function() {
  							ChanegTab();
							document.getElementById("select_cash").className = "select";
							};
					
					
					function ChanegTab(payment)
						{
						if(payment=='cash')
							{
							$('#cash').show();
							$('#net').hide();
							$('#credit').hide();
							$('#debit').hide();
							
							document.getElementById("select_net").className = "";
							document.getElementById("select_credit").className = "";
							document.getElementById("select_debit").className = "";
							document.getElementById("select_cash").className = "select";
							}
						
						if(payment=='net')
							{
							$('#cash').hide();
							$('#credit').hide();
							$('#debit').hide();
							$('#net').show();
							document.getElementById("select_cash").className = "";
							document.getElementById("select_credit").className = "";
							document.getElementById("select_debit").className = "";
							document.getElementById("select_net").className = "select";
							}
						if(payment=='credit')
							{
							$('#cash').hide();
							$('#debit').hide();
							$('#net').hide();
							$('#credit').show();
							document.getElementById("select_cash").className = "";
							document.getElementById("select_credit").className = "select";
							document.getElementById("select_debit").className = "";
							document.getElementById("select_net").className = "";
							}
							if(payment=='debit')
							{
							$('#cash').hide();
							$('#net').hide();
							$('#credit').hide();
							$('#debit').show();
							document.getElementById("select_cash").className = "";
							document.getElementById("select_credit").className = "";
							document.getElementById("select_debit").className = "select";
							document.getElementById("select_net").className = "";
							
							}	
						
						
							
						}
						
						 function CashValidation()
						 	{
							var captcha_id=$('#captcha_id').val();
							
							if(captcha_id=='')
								{
								document.getElementById('error_msgcp').innerHTML="Enter captcha code!";
								$('#captcha_id').focus();
								return false;
								}else{
								document.getElementById('error_msgcp').innerHTML="";
								drop('slidedrop2','select');
								}
					
							
							}
						function CheckValidateCreditCard()
								{
							
								var creditcard=$('#creditcard').val();
								var crdatetime=$('#crdatetime').val();
								var cvvno=$('#cvvno').val();
								var cardholder=$('#cardholder').val();
								if(creditcard=='')
									{
									document.getElementById('error_msg').innerHTML="Enter credit card no.";
									$('#creditcard').focus();
									return false;
									}else{
									document.getElementById('error_msg').innerHTML="";
									}
									
									if(crdatetime=='')
									{
									document.getElementById('error_msg').innerHTML="Enter expire date & time on your card!";
									$('#crdatetime').focus();
									return false;
									}else{
									document.getElementById('error_msg').innerHTML="";
									}
									
									if(cvvno=='')
									{
									document.getElementById('error_msg').innerHTML="Enter cvv no. on card back side!";
									$('#cvvno').focus();
									return false;
									}else{
									document.getElementById('error_msg').innerHTML="";
									drop('slidedrop2','select');
									}
									
									if(cardholder=='')
									{
									document.getElementById('error_msg').innerHTML="Enter card holder name!";
									$('#cardholder').focus();
									return false;
									}else{
									document.getElementById('error_msg').innerHTML="";
									drop('slidedrop2','select');
									}
									
								
						
			   }// end  validation function
						
						
						function DebitCardValidation()
							{
							
								var deditcard=$('#deditcard').val();
								var dedatetime=$('#dedatetime').val();
								var decvvno=$('#decvvno').val();
								var decardholder=$('#decardholder').val();
								if(deditcard=='')
									{
									document.getElementById('deerror_msg').innerHTML="Enter Debit card no.";
									$('#deditcard').focus();
									return false;
									}else{
									document.getElementById('deerror_msg').innerHTML="";
									}
									
									if(dedatetime=='')
									{
									document.getElementById('deerror_msg').innerHTML="Enter expire date & time on your card!";
									$('#dedatetime').focus();
									return false;
									}else{
									document.getElementById('deerror_msg').innerHTML="";
									}
									
									if(decvvno=='')
									{
									document.getElementById('deerror_msg').innerHTML="Enter cvv no. on card back side!";
									$('#decvvno').focus();
									return false;
									}else{
									document.getElementById('deerror_msg').innerHTML="";
									}
									
									if(decardholder=='')
									{
									document.getElementById('deerror_msg').innerHTML="Enter card holder name!";
									$('#decardholder').focus();
									return false;
									}else{
									document.getElementById('deerror_msg').innerHTML="";
									drop('slidedrop2','select');
									}
							
							}// end function debit validation
						function netBankingValidate()
							{
							drop('slidedrop2','select');
							} 
						
					function numbersonly(e){
						var unicode=e.charCode? e.charCode : e.keyCode
						if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
						if (unicode<48||unicode>57) //if not a number
						return false //disable key press
						}
					}		
					
			
						
					</script>
                    <div class="paymet01" style="display:none;" id="slidedrop1">
                    	<div class="paymet-inner-l">
                        	<ul>
                            	<li id="select_cash"><a href="#" onClick="ChanegTab('cash')" id="pay1">COD</a></li>
                                <li id="select_net"><a href="#"  onClick="ChanegTab('net')" id="pay2">Net Banking </a></li>
                                <li id="select_credit"><a href="#"  onClick="ChanegTab('credit')" id="pay3">Credit Card</a></li>
                                <li id="select_debit"> <a href="#"  onClick="ChanegTab('debit')" id="pay4">Debit Card</a></li>
                            </ul>
                        </div>
                        
                        <div class="paymet-inner-r pay" id="credit" style="display:none;">
                        	<p><span>Pay using Credit Card. </span> <img src="<?=base_url()?>assets/img/card-img.jpg" border="0"></p>
                            <div class="credit">
							
							<span id="error_msg" style="color:#FF0000;"></span>
                            	<form action="#" method="post">
                                	<span><input type="text" name="creditcard" onKeyPress="return numbersonly(event)" id="creditcard" placeholder="Card Number"></span>
                                    <p>
                                    	<span><input type="text" name="crdatetime" id="crdatetime" class="width1" placeholder="MM/YY"></span>
                                        <span>Expry Date</span>
                                        <span><input type="text"class="width1" name="cvvno" id="cvvno" placeholder="CVV"></span>
                                    </p>
                                    <span><input type="text" name="cardholder" id="cardholder" placeholder="Name on Card"></span>
                                    
                                    
                                </form>
                            </div>
							 <div class="clr"></div>
                        <p class="pay-w1"><a href="#" class="pay-btn" onClick="return CheckValidateCreditCard();">Pay</a></p>
                        </div>
                        
                        
                        <div class="net-bank pay"  id="net" style="display:none;">
                        	<p>Pay using Net Banking</p>
                            <h3>Popular banks</h3>
                            <div>
                            	<span><input type="radio" name="bank" checked="checked" value="axis bank"><span>Axis Bank</span></span>
                                <span><input type="radio" name="bank" value="city bank"><span>city Bank</span></span>
                                <span><input type="radio" name="bank" value="HDFC bank"><span>HDFC Bank</span></span>
                                <span><input type="radio" name="bank" value="ICICI bank"><span>ICICI Bank</span></span>
                                <span><input type="radio" name="bank" value="Kotak bank"><span>Kotak Bank</span></span>
                                <span><input type="radio" name="bank" value="SBI bank"><span>SBI Bank</span></span>
                            </div>
                            
                            <div>
                            	<h3>All banks</h3>
                                <select>
                                	<option value="0">Allahabad Bank</option>
                                    <option value="1">Andhra Bank</option>
                                    <option value="2">AXIS Bank</option>
                                    <option value="3">Bank of Bahrain and Kuwait</option>
                                    <option value="4">Bank of Baroda Corp Accnt</option>
                                    <option value="5">Bank of Baroda Retail Accnt</option>
                                    <option value="6">Bank of India</option>
                                    <option value="7">Bank of Maharashtra</option>
                                    <option value="8">Canara Bank</option>
                                    <option value="9">Catholic Syrian Bank</option>
                                    <option value="10">Central Bank of India</option>
                                    <option value="11">Citibank</option>
                                    <option value="12">City Union Bank</option>
                                    <option value="13">Corporation Bank</option>
                                    <option value="14">Cosmos Bank</option>
                                    <option value="15">Dena Bank</option>
                                    <option value="16">Deutsche Bank</option>
                                    <option value="17">Development Credit Bank</option>
                                    <option value="18">Dhanlaxmi Bank</option>
                                    <option value="19">Federal Bank</option>
                                    <option value="20">HDFC Bank</option>
                                    <option value="21">ICICI Bank</option>
                                    <option value="22">IDBI Bank</option>
                                    <option value="23">Indian bank</option>
                                    <option value="24">Indian Overseas Bank</option>
                                    <option value="25">IndusInd Bank</option>
                                    <option value="26">ING Vysya (now Kotak)</option>
                                    <option value="27">Jammu & Kashmir Bank</option>
                                    <option value="28">Karnataka Bank</option>
                                    <option value="29">Karur Vysya Bank</option>
                                    <option value="30">Kotak Mahindra Bank</option>
                                    <option value="31">Lakshmi Vilas Bank Corporate</option>
                                    <option value="32">Lakshmi Vilas Bank Retail</option>
                                    <option value="33">Oriental Bank of Commerce</option>
                                    <option value="34">Punjab & Maharashtra Cooperative Bank</option>
                                    <option value="35">Punjab & Sind Bank</option>
                                    <option value="36">Punjab National Bank</option>
                                    <option value="37">Punjab National Bank Corp Accnt</option>
                                    <option value="38">Ratnakar Bank</option>
                                    <option value="39">Royal Bank of Scotland</option>
                                    <option value="40">Saraswat Bank</option>
                                    <option value="41">Shamrao Vithal Cooperative Bank Ltd</option>
                                    <option value="42">South Indian Bank</option>
                                    <option value="43">Standard Chartered Bank</option>
                                    <option value="44">State Bank of Bikaner and Jaipur</option>
                                    <option value="45">State Bank of Hyderabad</option>
                                    <option value="46">State Bank of India</option>
                                    <option value="47">State Bank of Mysore</option>
                                    <option value="48">State Bank of Patiala</option>
                                    <option value="49">State Bank of Travancore</option>
                                    <option value="50">Syndicate Bank</option>
                                    <option value="51">Tamilnad Mercantile Bank</option>
                                    <option value="52">TNSC Bank</option>
                                    <option value="53">UCO Bank</option>
                                    <option value="54">Union Bank of India</option>
                                    <option value="55">United Bank of India</option>
                                    <option value="56">Vijaya Bank</option>
                                    <option value="57">YES Bank</option>
                                </select>
                            </div>
							 <div class="clr"></div>
                        <p class="pay-w1"><a href="#" class="pay-btn" onClick="return netBankingValidate();">Pay</a></p>
                        </div>
                        
                        <div class="paymet-inner-r pay" id="debit" style="display:none;">
                        	<p><span>Pay using Debit Card. </span> <img src="<?=base_url()?>assets/img/card-img.jpg" border="0"></p>
                            <div class="credit">
							<span id="deerror_msg" style="color:#FF0000;"></span>
                            	<form action="#" method="post">
                                	<span><input type="text" name="deditcard" onKeyPress="return numbersonly(event)" id="deditcard" placeholder="Card Number"></span>
                                    <p>
                                    	<span><input type="text" name="dedatetime" id="dedatetime" class="width1" placeholder="MM/YY"></span>
                                        <span>Expry Date</span>
                                        <span><input type="text"class="width1" name="decvvno" id="decvvno" placeholder="CVV"></span>
                                    </p>
                                    <span><input type="text" name="decardholder" id="decardholder" placeholder="Name on Card"></span>
                                    
                                    
                                </form>
                            </div>
							 <div class="clr"></div>
                        <p class="pay-w1"><a href="#" class="pay-btn" onClick="return DebitCardValidation();">Pay</a></p>
                        </div>
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                        <div class="net-bank pay" id="cash" style="display:block;">
						
                        	<p>Pay using Cash-on-Delivery</p>
                            <h3>Verify Order</h3>
							<span id="error_msgcp" style="color:#FF0000;"></span>
                            <div>
                            	<input type="text" class="wsize" name="capcha_id" id="captcha_id" placeholder="Enter the characters"> 
                            	<div class="g-recaptcha" data-sitekey="6LewnwwTAAAAAKJS6IlBWVYFrwgfcv6QvcoM0piJ"></div>
                                
                            </div>
                            <span>Type the characters you see in the image on the left. Letters shown are not case-sensitive.</span>
							 <div class="clr"></div>
                        <p class="pay-w1"><a href="#" class="pay-btn" onClick="return CashValidation();">Pay</a></p>
                        </div>
                        
                        <div class="clr"></div>
                     
                        <div class="clr"></div>
                        <p class="border-none"><img src="<?=base_url()?>assets/img/sec.jpg" width="180" height="31" border="0"></p>
                    </div>
                    
                    
                    <p>Review your order <a id="select" href="javascript:void(0)" onClick="drop('slidedrop2','select')" class="drop"><i class="ci"></i></a></p>
                   <div class="paymet01" style="display:none;" id="slidedrop2">
                        
                    	<h1 class="h1">Hii  <?php echo ucwords($userName->first_name.' '.$userName->last_name);?> </h1>
                    	<p class="p1">Your order has been confirmed. You can conveniently track the progress of your order with your order details </p>
							
                            <p class="cartfare">
                            	<span class="fll">Order Number</span>
                        		<span class="flr">4214052</span>
                            </p>
                            
                            <p class="cartfare">
                            	<span class="fll">Order Date :</span>
                        		<span class="flr"><?=date('m/d/Y H:t:s')?></span>
                            </p>
                            
                            <p class="cartfare">
                            	<span class="fll">Payment Mode :</span>
                        		<span class="flr">Casd</span>
                            </p>
                                
                            
<!--                             <p class="cartfare">
                            	<span class="fll">Sent as a gift:</span>
                        		<span class="flr">Yes</span>
                            </p>-->
                            
<!--                            <h1 class="h1">Billing Address:</h1>  
                            <p class="cartfare">
                            	<strong class="fll"><?php echo ucwords($userName->first_name.' '.$userName->last_name);?></strong><br>
                                <span class="fll"><?php echo $userName->address;?>
                                </span>
                            </p>-->
                         	
                            <h1 class="h1">Shipping Address:</h1>  
                           <p class="cartfare">
                            	<strong class="fll"><?php echo ucwords($userName->first_name.' '.$userName->last_name);?></strong><br>
                                <span class="fll"><?php echo $userName->address;?>
                                </span>
                            </p>
                            
                            
                            

                            <div class="clr"></div>
                            <div class="detail">
                            
                            <table width="100%" cellpadding="10px" cellspacing="0px">
                              <tr>
                                <td>Product</td>
                                <td>Unit Price</td>
                                <td>Quantity</td>
                                <td>Total Rs.</td>
                              </tr>
                              <?php if($this->session->userdata('userid')){ 
		$data=$this->cart_model->get_usercart($this->session->userdata('userid')); $subtotal=0; $i=1;foreach($data as $image){?>
                              <tr>
                                  <td>
                                      
                                      <?php if($image['frame_or_print']==1){ ?>
                <img
				src="<?php echo base_url()?>600/<?= $image['frame_name'];?>" width="auto" height="60" />
                                      <?php }else {?>
                 <img src="http://www.indiapicture.in/wallsnart/158/<?= $image['image_name'];?>" width="auto" height="60"/>
            <?php }?>
                                      
                                  </td>
                                <td><?= $image['price'];?></td>
                                <td><?= $image['cart_quantity'];?></td>
                                <td>
                                    <?php if($image['updated_price']){?>
            <img
                src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['updated_price'];?>
                <?php } else{?>
                <img
                    src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['price'];?>
                <?php }?>
                                   
                                    
                                </td>
                              </tr>
                <?php } } ?>
                            </table>
                            
                            </div>
                            
                            <div class="discount">
                            
                            
                            <table width="100%" cellpadding="10px;" cellspacing="0">
<!--                              <tr>
                                <td>Discount</td>
                                <td>33</td>
                              </tr>
                              <tr>
                                <td>Sub Total Rs.2308.00</td>
                                <td>699</td>
                              </tr>
                              <tr>
                                <td>Tax Collected (*)  Rs.xxx</td>
                                <td>15</td>
                              </tr>
                              <tr>
                                <td>Shipping Charges Rs.xxx</td>
                                <td>34</td>
                              </tr>
                              <tr>
                                <td>Gift Wrap Charges Rs.xxx</td>
                                <td>0</td>
                              </tr>-->
                                 <?php
                                 foreach($data as $image){
                                    if($image['cart_quantity']>1)
            {
            $subtotal=$subtotal+$image['updated_price'];
            }
            else
            {
                $subtotal=$subtotal+$image['price'];
            }
                                 }
                                    ?>
                              <tr>
                                <td>Payable Amount</td>
                                <td><img
                    src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $subtotal;?></td>
                              </tr>
                            </table>

                            <p class="cartfare">
                                <span class="dblock">
                                For any queries at <a href="mailto:info@wallsnart.com">info@wallsnart.com</a> or calling us at +91 124 4125000 any day of the week between 09:30 AM to 06:30 PM.<br />
                                </span>
                                
                                <span class="dblock">Indulge!</span>
                                <span class="dblock">Wallsnart.com</span>
                                <span class="dblock">Phone Number: +91 124 4125000</span>
                                <span class="dblock">E-mail: <a href="mailto:info@wallsnart.com" class="span">info@wallsnart.com</a></span>
						</div>
                         
                    </div>
                </div>
                
            </div>
            <div class="checkout-r-c">
            	<p>Your Shipping Cart</p>
                
                <div class="cart-deatils">
                	<ul>
                    	<li class="item">Item</li>
                        <li class="des">Description</li>
                        <li class="qua">Quantity</li>
                        <li class="pri">Price</li>
                    </ul>
                </div>
                
                <div class="cart-deatils bgc-even">
				<?php if($this->session->userdata('userid')){ 
		$data=$this->cart_model->get_usercart($this->session->userdata('userid')); $subtotal=0; $i=1;foreach($data as $image){
		
		
		 $row=$this->search_model->get_image_data($image['image_id']);
             $frame_price = $this->frontend_model->get_frame_data($image['image_id'],$image['user_id']);
      if($image['frame_or_print']==1){ 
	  $price = $frame_price->print_price;}else{$price = $image['price'];}
			?>
                	<ul>
						<li class="item">
						
				<? if($image['frame_or_print']==1){?>
                <img src="<?php echo base_url()?>600/<?= $image['frame_name'];?>" width="auto" height="60" />
            <?  }else {?>
                 <img src="http://www.indiapicture.in/wallsnart/158/<?= $image['image_name'];?>" width="auto" height="30"/>
            <? }?>	
						</li>
						 
                        <li class="des"><?php print substr($row->images_caption,0,15); ?> </li>
						<li class="qua">
			<input name="f" type="text" id="f<?= $i?>" value="<?= $image['cart_quantity'];?>" class="qua-inp" /> 
		<input type="hidden" id="hidid<?=$i?>" value="<?= $image['cart_id'];?>" />
	<input type="hidden" id="hidprice<?=$i?>" value="<?= $image['price'];?>" />
						<a href="#" class="shoplnks" onClick="update('<?=$i?>');">Update</a>
<a href="<?=base_url()?>index.php/cart/remove_cart/<?= $image['cart_id'];?>/<?= $key;?>" class="shoplnks">Remove</a>
						</li>
						
                        <li class="pri"><? if($image['updated_price']){?>
            <img
                src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['updated_price'];?>
                <? } else{?>
                <img
                    src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['price'];?>
                <? }?></li>
                    </ul>
               
                
                <?php $i++;   if($image['cart_quantity']>1)
            {
            $subtotal=$subtotal+$image['updated_price'];
            }
            else
            {
                $subtotal=$subtotal+$image['price'];
            }
		}
	} else{

		$subtotal=0; $i=1;
		
		foreach($this->cart->contents() as $image){
		
		$row=$this->search_model->get_image_data($image['image_id']);
             $frame_price = $this->frontend_model->get_frame_data($image['image_id'],$image['user_id']);
      if($image['frame_or_print']==1){ $price = $frame_price->print_price;}else{$price = $image['price'];}

			?>
			
						<ul>
                    	<li class="item">
						
				<a href="#"><img
				src="http://www.indiapicture.in/wallsnart/158/<?= $image['name'];?>" />
		</a>
						</li>
                        <li class="des"><?php print substr($row->images_caption,0,15); ?> </li>
						<li class="qua">
						<input name="f" type="text" id="f<?= $i?>"
						value="<?= $image['qty'];?>" class="qua-inp" /> <input type="hidden"
						id="hidid<?=$i?>" value="<?= $image['rowid'];?>" /><input
						type="hidden" id="hidprice<?=$i?>" value="<?= $image['price'];?>" />
						<a href="#" class="shoplnks" onClick="update('<?=$i?>');">Update</a>
						<a
						href="<?=base_url()?>index.php/cart/remove_cart/<?= $image['rowid'];?>/<?= $key;?>"
						class="shoplnks">Remove</a></li>
                        <li class="pri"><? if($image['updated_price']){?>
            <img
                src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['updated_price'];?>
                <? } else{?>
                <img
                    src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['price'];?>
                <? }?></li>
                   	 </ul>	
		<?php $i++; $subtotal=$subtotal+$image['subtotal']; 
		}
} ?>	
 </div>		
 
 	
<div class="fareprice">
                	<p class="cartfare">
                    	<span class="fll">Sub Total</span>
                        <span class="flr"><img
			src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $subtotal;?></span>
                    </p>
                   <!-- 
                    <p class="cartfare">
                    	<span class="fll">Shipping Charges</span>
                        <span class="flr">Rs. xxx</span>
                    </p>
                    
                    <p class="cartfare">
                    	<span class="fll">Gift Wrap Charges</span>
                        <span class="flr">Rs. xxx</span>
                    </p>
                    
                    <p class="cartfare">
                    	<span class="fll">Tax Collected (*)</span>
                        <span class="flr">Rs. xxx</span>
                    </p>
                    
                     <p class="cartfare bgc">
                    	<span class="fll"><strong>Payable Amount</strong></span>
                        <span class="flr"><strong>Rs. 20,0000</strong></span>
                    </p>
                    -->
              </div>
                
            </div>
        </div>
        <!-- checkout -->
        
        
        
		</div>


<script type="text/javascript">
function update(i)
{  
     var row_id=$('#hidid' +i).val();
	 var price=$('#hidprice' +i).val();
	 var qty=$('#f' +i).val();
	 var search_txt="<?= $key;?>";
	 var url= '<?=base_url()?>index.php/cart/update_cart/' +qty + '/' +row_id +'/' +price + '/' +search_txt;
	 window.location.assign(url);
}
</script>
<script type="text/javascript">
function back()
{  
javascript:window.history.back();
	//var url="<?=base_url()?>index.php/search/search_view?searchtext=<?= $key;?>&search_submit=Search";
         //var url= "<?=base_url()?>index.php/frontend/index";
	//window.location.assign(url);
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


function checkValidateSelect1()
{
    
//     if($('#name').val()=='' || $('#pincode').val()=='' || $('#address').val()=='' || $('#city').val()=='' || $('#state').val()=='' || $('#phone').val()=='')
//     {
//         document.getElementById('field_blank').innerHTML="Fill the blank field";
//         return false;
//     }else{ 
//    drop('slidedrop1','select1');
//     }
     if(document.getElementById('name').value=='')
     {
      document.getElementById('name').style.border = "1px solid #ff0000";
      document.getElementById('name').focus();
      return false;
     }else
     if(document.getElementById('pincode').value=='')
     {
         
      document.getElementById('pincode').style.border = "1px solid #ff0000";
      document.getElementById('pincode').focus();
      document.getElementById('name').style.border = "";
      return false;
     }else
     if(document.getElementById('address').value=='')
     {
      document.getElementById('address').style.border = "1px solid #ff0000";
      document.getElementById('address').focus();
      document.getElementById('pincode').style.border = "";
      return false;
     }else
         if(document.getElementById('city').value=='')
     {
      document.getElementById('city').style.border = "1px solid #ff0000";
      document.getElementById('city').focus();
       document.getElementById('address').style.border = "";
      return false;
     }else
         if(document.getElementById('state').value=='')
     {
      document.getElementById('state').style.border = "1px solid #ff0000";
      document.getElementById('state').focus();
       document.getElementById('city').style.border = "";
      return false;
     }else
         if(document.getElementById('phone').value=='')
     {
      document.getElementById('phone').style.border = "1px solid #ff0000";
      document.getElementById('phone').focus();
      document.getElementById('state').style.border = "";
      return false;
     }else
     {
         document.getElementById('phone').style.border = "";
        drop('slidedrop1','select1');
         return true;
     }
     
     
}// end function ...

	
	

</script>