 <!-- footer -->
    <footer>
    	<div class="footer-content">
        	<div>
            	<h1>Quick  <span>Links</span></h1>
                <ul>
                	<li><a href="<?=base_url()?>frontend/about">About WallsnArt</a></li>
                    <li><a href="<?=base_url()?>frontend/media_center">Media Center</a></li>
                    <li><a href="#">Find Art</a></li>
                    <li><a href="<?=base_url()?>frontend/partner">Partners</a></li>
                    <li><a href="<?=base_url()?>frontend/career">Career</a></li>
                </ul>
            </div>
            
            
            <div>
            	<h1>Let us <span>Help</span></h1>
                <ul>
                	<li><a href="<?=base_url()?>frontend/contact">Contact Us</a></li>
                    <li><a href="<?=base_url()?>frontend/faq">FAQ's</a></li>
                    <li><a href="#">Ordering</a></li>
                    <li><a href="#">shipping & Delivery</a></li>
                </ul>
            </div>
            <?php if($this->session->userdata('userid')){ ?>
             <div>
            	<h1>My  <span>Account</span></h1>
                <ul>
                	<li>
					
                  	<a href="<?php print base_url();?>user/profile">My Profile My Profile</a></li>
                        
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Order History</a></li>
                </ul>
            </div>
            <?php }?>
             <div>
            	<h1>Term &  <span>Policies</span></h1>
                <ul>
                	<li><a href="<?=base_url()?>frontend/terms_of_use">Terms of Use</a></li>
                    <li><a href="<?=base_url()?>frontend/privacy_policy">Privacy Policy</a></li>
                </ul>
            </div>
            
            <div>
            	<h1>Newsletter <span>WallnArt</span></h1>
                <span>
				
                    <form name="newsletter" id="other" method="post" action="<?php echo base_url()?>frontend/submit_email">
                    <input name="email_newsletter" type="text"  class="news-input" id="email_newsletter" value="Your Email Address"  onFocus="if(this.value == 'Your Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Email Address';}"/>
					<div class="clear"></div>
					<span id="err"></span>
                                        <input type="submit" name="s" onclick="return checjNewsletter();" id="s" value="Subscribe" class="news-input">
                                       
                                        
                  </form>
                    <span class="speaker"><img src="<?php echo base_url()?>assets/img/news.png" width="52" height="31" border="0"></span>
                </span>
            </div>
            
        </div>
       
       <p class="copyright"><a href="<?=base_url()?>frontend/terms_of_use">Terms  of Use</a>© Copyright 2010-2014 | WallnArt</p>
       
    </footer>
    <!-- footer -->
    
    
    <!-- signup -->
     <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
    <div class="signup" id="signpop" style="display:none;" >
        <div style="float: right" ><a href="#" onClick="allclose('')" >Close</a></div>
        
        <h1>New User? Sign Up</h1>
		<p>
		<span></span><span></span>
		 <b style="color: red" id="email_error"></b>
		<b style="color: red" id="password_error"></b> 
		<b style="color: red" id="cpassword_error"></b>
                <b style="color: green" id="success_result"></b>
		</p>
        <div class="signup-l-c">
            <form action="#" id="signup_form" name="sign_id" method="post">
            	<p>
                	<span>Email Address</span>
                    <input type="text" name="email_reg" 
					id="email_reg" placeholder="Email Address" >
                </p>
                
                <p>
                	<span>Password</span>
                    <input  name="password" type="password" id="password"
					placeholder="Password">
                </p>
                
                <p>
                	<span>Repeat</span>
                    <input name="cpassword" type="password"
					id="cpassword" placeholder="Confirm Password">
                </p>
                
                <p class="tar">
                    
                    <input style="background: #0C6;
    padding: 6px 12px;
    font-size: 14px;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 2px; width: 120px; margin-right: 20px;
" type="button" name="sign_id" onclick="return checkRegisterValidation()" id="sign_id" value="SIGNUP NOW">
                    
                <div> Already have an account?<a href="#" class="none" onClick="login('')">Login!</a></div>
            </form>
        </div>
        <div class="signup-r-c">
        	<h2> Sign in with </h2>
            <div class="fb">
            	<span><a href="#"><i class="fb-i"></i></a></span>
                <span><a href="#"><i class="goo-i"></i></a></span>
            </div>
        </div>
    </div>
    
    
    <!-- login -->
    <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
    <div class="signup" id="loginpop" style="display:none;">
        <div style="float: right" ><a href="#" onClick="allclose('')" >Close</a></div>
	     <h1>Login</h1>
        <div class="signup-l-c">
		
		<p> <span></span><b style="color: red; " id="password_login_error"></b>
		 <b style="color: red;  " id="email_login_error"></b>
		 <b style="color: red;  " id="login_error"></b> </p>
                <form action="#" id="login_id" name="login_id" method="post">
			
            	<p>
                	<span>Email Address</span>
                   <input name="email" type="text" id="email_login" placeholder="Email Address"  /><br>
				  
                </p>
                
                <p>
                	<span>Password</span>
                    <input type="text" id="password_login" name="password_login" placeholder="Password"><br>
					
                </p>

                <p class="tar">
                    
                     <input style="background: #0C6;
    padding: 6px 12px;
    font-size: 14px;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 2px; width: 80px; margin-right: 20px;
" type="button" name="login" onclick="return checkLoginValidation()" id="login_id" value="Login">
                 
                     </p>
                <div> <a href="#" class="none"  onClick="signup('')">SignUp!</a></div>
            </form>
        </div>
        <div class="signup-r-c">
        	<h2> Sign in with </h2>
            <div class="fb">
            	<span><a href="#"><i class="fb-i"></i></a></span>
                <span><a href="#"><i class="goo-i"></i></a></span>
            </div>
        </div>
    </div>
   
     <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
    <div class="signup gall-w" id="addtogallery" style="display:none;">
         <div style="float: right" ><a href="#" onClick="allclose('')" >Close</a></div>
        <h2>Create a new Gallery</h2>
        <span id="lightbox_error" style="color: red;margin-left: 48px;"></span><br>
         <form name="lightbox_submit" id="lightbox_submit">
        <p><input type="text" name="lightbox_name" id="lightbox_name" placeholder="Gallery name"></p>
        
        <p><textarea name="lightbox_des" id="lightbox_des" rows="5" cols="34" style="border-radius: 15px;" placeholder="Gallery Description"></textarea></p>
        <p> <input type="button" name="create_lightbox"  id="create_lightbox" onclick="call_create_lightbox();" value="Create Gallery"> </p>
        </form>
        <h2>Choose existing Gallery</h2>
        
        <p>
        	<select id="lightbox_list_dropdown"
									style="width: 140px;" onchange="check_exist_img(this.value);"><option
										value="0" selected="selected">Select Gallery</option>
									<?php 
									$user_id=$this->session->userdata('userid');
$result=$this->frontend_model->get_all_lightboxes($user_id); foreach($result as $results){?>
									<option value="<?php echo $results->lightbox_id;?>">
										<?php echo $results->lightbox_name;?>
									</option>
									<?php }?>
								</select>	
        </p>
        
    </div>
    
<script defer src="<?php echo base_url()?>assets/js/jquery.flexslider.js"></script>   
</body>
</html>
<script type="text/javascript">
  $("#login_id").keyup(function(event){
    if(event.keyCode == 13){
        $("#login_id").click();
        checkLoginValidation();
    }
});

  $("#signup_form").keyup(function(event){
    if(event.keyCode == 13){
        $("#sign_id").click();
        checkRegisterValidation();
    }
});
    
    function checkLoginValidation(){
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if($('#email_login').val()=="")
        {
            $('#email_login_error').html("Please Enter Email");
            return false;
        }
        else if(!emailReg.test($('#email_login').val()))
        {
            $('#email_login_error').html("Enter a valid email");
            return false;
        }
        else if($('#password_login').val()=="")
        {
            $('#email_login_error').html("");
            $('#password_login_error').html("Enter a Password");
            return false;
        }
        else
        {
		$('#email_login_error').html("");
		$('#password_login_error').html("");
            var email = $('#email_login').val();

            var password= $('#password_login').val();
            var datastring='email=' + email  +  '&password=' + password ;
			//alert(datastring);
            $.ajax({
                type: "POST",
                url: "<?php print base_url() ?>frontend/login",
                data: datastring,
                success: function(data)
                {
 
                    if(data=="successful")
                    {
                        
                        //window.location.assign('<?=base_url()?>user/index');
                        location.replace('<?=base_url()?>index.php');
                        allclose('');
                    }
                    else
                    {
                        $('#login_error').html("<br>Invalid Email or Password");
                    }
                }
            });
            return false;
        }

    }// end login function


	function checjNewsletter(){
		$("#other").submit(function(){
			var email = $('#email_newsletter').val();
			var email_check = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
			
			if(email=='' || email=='Your Email Address'){
				$('#err').text('Please enter emailid');
				$('#err').css({'color':'red'});
				$('#email_newsletter').focus();
				return false;
			}
			else if(email_check.test(email)==''){
				$('#err').text('Please enter valid email');
				$('#email_newsletter').focus();
				return false;
			}
			else{
				return;
			}
		});
	}// end function
	
	
	
function checkRegisterValidation(){
// jquery written by kunal saxena

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if($('#email_reg').val()=="")
        {
            $('#email_error').html("Please Enter Email");
            return false;
        }
        if(!emailReg.test($('#email_reg').val()))
        {
            $('#email_error').html("Enter a valid email");
            return false;
        }
        else if($('#password').val()=="")
        {
            $('#email_error').html("");
            $('#password_error').html("Enter a Password");
            return false;
        }
        else if($('#cpassword').val()=="")
        {
            $('#password_error').html("");
            $('#cpassword_error').html("Enter confirm Password");
            return false;
        }
        else if($('#cpassword').val()!=$('#password').val())
        {
            $('#password_error').html("");
            $('#cpassword_error').html("Password and confirm password do not match");
            return false;
        }
        else
        {      
		$('#email_error').html("");
		$('#cpassword_error').html("");
		$('#email_error').html("");
            $('#cpassword_error').html("");
            $.ajax({
                type: "POST",
                url: "<?php print base_url() ?>frontend/register",
                data: $("#signup_form").serialize(),
                success: function(data)
                {
                   
                    if(data=='successful')
                    {
                         //alert(data);
		     $("#success_result").html("<center><span style='color:red; font-size:18px;'>Thank You For Registering!</span></center>");
                       // location.replace('<?php print base_url() ?>frontend/register_success');
                    allclose('');
                    }
                    else
                    {
                        $('#cpassword_error').html(data);
                    }
                }
            });
			$('#signup_form')[0].reset();
            return false;
        }
}	// end registration function	

</script>
