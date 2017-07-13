<script type="text/javascript">
			$(document).ready(function() {

				//syntax highlighter
				hljs.tabReplace = '    ';
				hljs.initHighlightingOnLoad();

				//accordion
				$('h3.accordion').accordion({
					defaultOpen: 'body-section1',
					cookieName: 'accordion_nav',
					speed: 'slow',
					animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
						elem.next().slideFadeToggle(opts.speed);
					},
					animateClose: function (elem, opts) { //replace the standard slideDown with custom function	
						elem.next().slideFadeToggle(opts.speed);
					}
				});
	

				//custom animation for open/close
				$.fn.slideFadeToggle = function(speed, easing, callback) {
					return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
				};

			});
		</script>

    <script>
		$(document).ready(function(){

		$("#form1").submit(function(){	
		var passw=$('#pwd').val();
		var repassw=$('#conpwd').val();
		if($('#pwd').val()=="")
		{
			$('#pwd_error').html("Please Enter The Password");
			return false;
		}
		else if($('#conpwd').val()=="")
		{   
			$('#pwd_error').html("");
		    $('#conpwd_error').html("Please Re Enter The Password");
		return false;
	     }
		else if(passw!=repassw)
	     {    $('#pwd_error').html("");
	          $('#conpwd_error').html("");
	           $('#conpwd_error').html("Please Re Enter The Same Password");
	            return false;
		}
		else if($('#fname').val()=="")
		{ 
			    $('#pwd_error').html(""); 
				$('#conpwd_error').html("");
			    $('#fname_error').html("Please Enter The First Name");
			            return false;
				}
		      else if($('#phone').val().length<'10')
				{
					$('#pwd_error').html(""); 
					$('#conpwd_error').html("");
				    $('#fname_error').html("");
				    $('#phone_error').html("Please Enter 10 digit Mobile No.");
				    return false;
				}
		
	});

		
	
			//Examples of how to assign the ColorBox event to elements
			
			$(".loginlogout").colorbox({width:"308px", height:"380px", iframe:true});

			
		});
                
                
           function numbersonly(e){
		var unicode=e.charCode? e.charCode : e.keyCode
		if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
		if (unicode<48||unicode>57) //if not a number
		return false //disable key press
		}
	}		
	     
</script>
<div class="main-container">
    	
        <div class="pagination">
 <span> <a href="<?php print base_url();?>index.php">HOME</a> > My Account > <span> Profile</span> </span>
        </div>
        
        <!-- art style -->
        <div class="art-style">
        	
            <!-- aside -->
            <aside style="width: 150px;">
            	<p>Let Us Help</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>index.php/frontend/contact">Contact us</a></li>
                        <li><a href="<?=base_url()?>index.php/frontend/faq">FAQ's</a></li>
                        <li><a href="#">Ordering</a></li>
                        <li><a href="#">Shipping & Delivery</a></li>
                    </ul>
                </div>

                <p>My Account</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>index.php/frontend/contact">My Profile</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="<?=base_url()?>index.php/user/order_history">Order History</a></li>
                    </ul>
                </div>
                
                <p>Mahatta Art</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>index.php/frontend/about">The Company</a></li>
<!--                        <li><a href="<?=base_url()?>index.php/frontend/media_center">Media Center</a></li>-->
                        <li><a href="<?=base_url()?>index.php/frontend/career">Careers</a></li>
                        <li><a href="<?=base_url()?>index.php/frontend/partner">Partners</a></li>
                    </ul>
                </div>
                
            </aside>
            <!-- aside -->
            <?php 
			if($response=='Success'){
			$massage='Success your order and Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail';
			}
			else if($response=='Aborted'){
			$massage='';
			}
			else if($response=='Failure'){
			$massage='';
			}
			else if($response=='Illegal'){
			$massage='Security Error. Illegal access detected';
			}
			
			?>
			
            <div class="right-panel">
            	<div style="color:red;" class=""><?=$massage;?></div>
                <!--  Art Movements -->
                	<div class="art-movements">
                        <div class="art-inner" style="position:absolute;">
                            <p>My Profile</p>
                            <img src="<?php print base_url();?>assets/img/profile.jpg" width="710" height="210" border="0">
                        </div>
                    </div>
					
            
            <!-- right panel -->
            <div class="right-panel">
            	
                <!--  Art Movements -->
                	<div class="art-movements">
                        <div class="art-inner">
                            <p>Order History</p>
                            <img src="img/oderhistry.jpg" width="697" height="210" border="0">
                        </div>
                    </div>
                    
                    <div class="orderhistroywrap">
                        <div class="orderhistroy">
                            <ul>
                                <li>Order ID</li>
                                <li>Order Dated</li>
                                <li>Delivery Date</li>
                                <li>Total Amount</li>
                                <li>Status</li>
								 <li>AWB No./Courier Partner(Useful for tracking.)</li>
								 <li></li>
                            </ul>        
                        </div>
                 <?php 
				 $orders=$this->frontend_model->get_tbl_order_details();
				// print_r($orders);
				 foreach($orders as $order_details){
				// print_r($order_details);
				 ?>
                        <div class="odd">
                            <ul>
                                <li><?=$order_details->inv_order_id;?></li>
                                <li><?=$order_details->order_date;?></li>
                                <li></li>
                                <li><?=$order_details->order_amount;?></li>
                                <li></li>
								 <li></li>
                                <li class="last-child"><a href="<?=base_url()?>index.php/user/order_details_of_history/<?=$order_details->inv_order_id;?>">view details</a></li>
                            </ul>        
                        </div>
               <?php
			   }
			   ?>
                        
                    </div>
                </div>
                <!--  Art Movements -->
 
            </div>
            <!-- right panel -->
            
        </div>
        <!-- art style -->
        
    </div>
    <!-- container -->
    
    
    <!-- footer -->
  