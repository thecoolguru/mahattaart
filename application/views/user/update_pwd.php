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
<div class="container">

	<div class="row">
		<div class="art-style col-md-12">
			<div class="pagination">
				 <span> <a href="<?php print base_url();?>index.php">HOME</a> > My Account > <span> Profile</span> </span>
	        </div>	

	        <div class="row">
	        	 <aside class="left-panel-page col-md-2 col-xs-3">
            	<p>Let Us Help</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/contact">Contact us</a></li>
                        <li><a href="<?=base_url()?>frontend/faq">FAQ's</a></li>
                        <li><a href="#">Ordering</a></li>
                        <li><a href="#">Shipping & Delivery</a></li>
                    </ul>
                </div>

                <p>My Account</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/contact">My Profile</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Order History</a></li>
                    </ul>
                </div>
                
                <p>MAHATTA-ART</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/about">The Company</a></li>
<!--                        <li><a href="<?=base_url()?>frontend/media_center">Media Center</a></li>-->
                        <li><a href="<?=base_url()?>frontend/career">Careers</a></li>
                        <li><a href="<?=base_url()?>frontend/partner">Partners</a></li>
                    </ul>
                </div>
                
            </aside>

            <div class="right-panel-page col-md-10 col-xs-9">
            	<div class="art-movements">
                       
	 <p align="center"><span style="color: red; margin-right: 125px;
    "><?php print $msg;?></span></p><br>
                        <form method="post"action="<?php echo base_url();?>user/update_pwd" name=""id="">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      
                        <tr>
                          <td>Email ID</td>
                          <td><input name="email" type="email" id="email" class="email"value="<?php echo $emailid;?>" readonly/></td>
                        </tr>
                        
                       
                        <tr>
                          <td>Create New Password</td>
                          <td><input type="password" required class="city" name="passwordnew" id="passwordnew" />
                          <br/><span style="color: red" id="fname_error"></span></td>
                          
                        <td><input type="hidden" name="emaill" value ="<?php echo $emailid;?>" id="passwordnew" />
                        </tr>
                        <tr>
                          <td>Confirm Password</td>
                          <td><input type="password" name="passwordconfirm" required  id="passwordconfirm" class="city"/></td>
						  <td id="result_pass"></td>
                        </tr>
                       
                        
                      </table>
                    <input type="submit"  id="submitt" value="Update" style=" width:120px; height:25px; background-color:#336699; color:#FFFFFF; border-radius: 5px; border:none; margin-top:30px; margin-left:144px;" ></form>
                    </div>
					
                   
                    
                </div>
            </div>
	        </div>
		</div>
	</div>
    	
        
        
        <!-- art style -->
        <div class="art-style">
        	
            <!-- aside -->
           


        <!-- starts email by sajid-->
           
       <!-- end email -->


            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel">
            	
                <!--  Art Movements -->
                	
                <!--  Art Movements -->
 
            </div>
            <!-- right panel -->
            
        </div>
		<script>
		var passwordnew=$('#passwordnew').val();
		var passwordconfirm=$('#passwordconfirm').val();
		
		$('#passwordconfirm').keyup(function(){
		//var passwordnew_len=$('#passwordnew').val().length;
	//	alert(passwordnew_len)
		if($('#passwordnew').val().length==$('#passwordconfirm').val().length && $('#passwordnew').val()!=$('#passwordconfirm').val()){
		//alert('wrong password')
		$('#result_pass').html('Sorry password not matched').css("color","red");
		$('#submitt').prop('disabled', true);
		return false;
		
		}if($('#passwordnew').val().length==$('#passwordconfirm').val().length && $('#passwordnew').val()==$('#passwordconfirm').val()){
		$('#result_pass').hide();
		$('#submitt').prop('disabled', false);
		//$('#result_pass').html('Matc').css("color"."red");
		return true;
		}
		
		});
		</script>
		
		
		<br><br><br>
                