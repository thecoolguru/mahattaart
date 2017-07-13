<?php  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
<!-- footer -->
    <footer class="container-fluid">
    	<div class="footer-content container">
        	<div class="col-xs-6 col-sm-3 col-md-3" style="padding-right:0">
            	<h1>Quick  <span>Links</span></h1>
                <ul>
                	<li><a href="<?php echo base_url()?>index.php/frontend/about">About Mahatta Art</a></li>
<!--                    <li><a href="<?php echo base_url()?>index.php/frontend/media_center">Media Center</a></li>-->
                    <li><a href="<?php echo base_url()?>index.php/frontend/findart">Find Art</a></li>
                    <li><a href="<?php echo base_url()?>index.php/frontend/partner">Partners</a></li>
                    <li><a href="<?php echo base_url()?>index.php/frontend/career">Career</a></li>
                   <!-- <li><a href="http://mahatta.com/submission/photographer.php">Become a contributor</a></li>-->
                     <li><a href="http://mahatta.com/submission/">Become a contributor</a></li>
                </ul>
            </div>
            <?php // $forget_emlid;


?>

            
            <div class="col-xs-6 col-sm-3 col-md-3">
            	<h1>Let us <span>Help</span></h1>
                <ul>
                	<li><a href="<?php echo base_url()?>index.php/frontend/contact">Contact Us</a></li>
                    <li><a href="<?php echo base_url()?>index.php/frontend/faq">FAQ's</a></li>
                    <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Ordering</a></li>
                    <li><a href="<?php echo base_url()?>index.php/frontend/shipping">Shipping & Delivery</a></li>
                     <li><a href="<?php echo base_url()?>index.php/return">Returns</a></li>
                </ul>
            </div>
            <?php  if($this->session->userdata('userid')){ ?>
             <div class="col-xs-6 col-sm-3 col-md-3">
            	<h1>My  <span>Account</span></h1>
                <ul>
                	<li>
					
                  	<a href="<?php print base_url();?>index.php/user/profile">My Profile</a></li>
                        
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Order History</a></li>
                </ul>
            </div>
            <?php }?>
             <div class="col-xs-6 col-sm-3 col-md-3">
            	<h1>Term &  <span>Policies </span></h1>
                <ul>
                	<li><a href="<?php echo base_url()?>index.php/frontend/terms_of_use">Terms of Use </a></li>
                    <li><a href="<?php echo base_url()?>index.php/frontend/privacy_policy">Privacy Policy</a></li>
                </ul>
            </div>
            
            <!--<div>
            	<h1>Newsletter <span></span></h1>
                <span>
				
                    <form name="newsletter" id="other" method="post" action="<?php echo base_url()?>index.php/frontend/submit_email()">
                    <input name="email_newsletter" type="text"  class="news-input" id="email_newsletter" value="Your Email Address"  onFocus="if(this.value == 'Your Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Email Address';}"/>
					<div class="clear"></div>
					<span id="err"></span>
                                        <input type="submit" name="s" onclick="return checjNewsletter();" id="s" value="Subscribe" class="news-input">
                                       
                                        
                  </form>
                    <span class="speaker"><img src="<?php echo base_url()?>assets/img/news.png" width="52" height="31" border="0"></span>
                </span>
            </div>-->
            
        </div>
       
       <p class="copyright"><a href="<?php echo base_url()?>index.php/frontend/terms_of_use">Terms  of Use  </a> &nbsp; © Copyright &nbsp;2017 | Mahatta Art</p>
       
    </footer>
    <!-- footer -->







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
                    <input  name="passwordd" type="password" id="password"
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
" type="button" name="sign_id" onclick="checkRegisterValidation();" id="sign_id" value="SIGNUP NOW">

                   
                <div> Already have an account?<a href="#" class="none" onClick="login('')">Login!</a></div>
            </form>
        </div>
        <div class="signup-r-c">
        	<h2> Sign in with </h2>
            <div class="fb">
			
			<span> <a href="#">  <i class="fb-ii"></i></a>  <a href="#">  <i class="goo-ii"></i> </a> </span>
            	<!--<span><a href="#">  <img src="images/" /> <i class="fb-i"></i></a>  </span>
                <span><a href="#"><i class="goo-i"></i></a></span>-->
            </div>
        </div>
    </div>



<div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
    <div class="signup" id="signppp" style="display:none" >
        <div style="float: right" ><a href="#" onClick="allclose('')" >Close</a></div>
        
         <h1>Forget Password ?</h1>
		<p>
               <span id="error_msg" style="font-size:14px; color:red;"></span>
		<span></span><span></span>
		 <b style="color: red" id="email_error"></b>
		<b style="color: red" id="password_error"></b> 
		<b style="color: red" id="cpassword_error"></b>
                <b style="color: green" id="success_result"></b>
		</p>
        <div class="signup-l-c">
            <form action="#" id="" name="sign_id" method="post">
            	<p>
                	<span>Email Address</span>
                    <input type="text" id="email_regd" name="email_regd" 
					value="<?php echo $forget_emlid;?>" >
                </p>
                
                
                
                <p class="tar">
                    
                    <input style="background: #0C6;
    padding: 6px 12px;
    font-size: 14px;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 2px; width: 130px; margin-right: 10px;
" type="button" name="" onclick="updateforpaswd();" value="Update Password">

                   
                
            </form>
        </div>
        <div class="signup-r-c">
        	<h2> Sign in with </h2>
            <div class="fb">
			
			<span> <a href="#">  <i class="fb-ii"></i></a>  <a href="#">  <i class="goo-ii"></i> </a> </span>
            	<!--<span><a href="#">  <img src="images/" /> <i class="fb-i"></i></a>  </span>
                <span><a href="#"><i class="goo-i"></i></a></span>-->
            </div>
        </div>
    </div>

<!--End sign up-->
    
    <!-- login -->
    <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
    <div class="signup" id="loginpop" style="display:none;">
        <div style="float: right" ><a href="#" onClick="allclose('')" >Close</a></div>
	    
        <div class="signup-l-c">
		 <h1>User Sign In </h1>
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
                    <input type="password" id="password_login" name="password_login" placeholder="Password"><br>
					
                </p>
 
                <p class="tar">
         


                     

  

                     <input style="background: #0C6;
    padding: 6px 12px;
    font-size: 14px;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 2px; width: 80px; margin-right: 20px;
" type="button" name="login" onclick="return login_verification();" value="Login">
                 
                     </p>
					 
					 
					  <div>
					 
				
                
        <h2 style="font-size: 18px; margin:inherit; color:#000000;"> Sign In with </h2>
        <br />
            <div class="fb">
			<div style="float:left; width:150px;">
           <!-- <div style="float:left; width:170px;">-->
		   
		    
					 <div>
                <div style="float:left; width:90px;"> 
				<a href="#"> <img style="padding:0px 5px 0px 0px;" src="<?php echo base_url()?>assets/img/facbook.png" /> </a> 
				<a href="#"> <img style="padding:0px 5px 0px 0px;" src="<?php echo base_url()?>assets/img/google.png" /> </a> 
				</div> 
				
				</div>
		   
		   
		   
		   
			
			<!--<span> <a href="#">   <i class="fb-ii"></i></a> <span><a href="#"> <i class="goo-ii"></i> </a></span>  </span>
			
            	<span><a href="#"><i class="fb-i"></i></a></span>-->
                
                </div>
				
                <div style="float:right;">
				
               <!-- <span><a href="#"><i class="goo-i"></i></a></span>-->
                 
                </div>
                
                
            </div>
            
            <div style="clear:both;"></div>
            <br />
           
                    <span> User </span> <a style="color:#23527c;" href="#" class="none"  onClick="signup('')">SignUp!</a>
                 
                 
                 
                 </div>
            </form>
              <span> User </span> <a style="color:#23527c;" href="#" class="none"  id="send_mail_btn">Forget Password!?</a>
        </div>
       
       
        
            
        <div class="signup-r-c">
        
            <h2>Contributor Sign In</h2>
        <div class="signup-l-c" style="border-right:none;">
		
		<p> <span></span><b style="color: red; " id="password_login_error"></b>
		 <b style="color: red;  " id="email_login_error"></b>
		 <b style="color: red;  " id="login_error"></b> </p>
                <form action="#" id="login_id" name="login_id" method="post">
			
            	<p>
                	<span>Email Address</span>
                   <input name="email" type="text" id="email_login" placeholder="Email Address"  /><br>
				  
                </p>
                
                <p>
                	<span> Password </span>
                    <input type="password" id="password_login2" name="password_login2" placeholder="Password"><br>
					
                </p>

                <p class="tar">
                    
                     <input style="background: #0C6;
    padding: 6px 12px;
    font-size: 14px;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 2px; width: 80px; margin-right: 20px;
" type="button" name="login" onclick="return ccccheckLoginValidation()" id="login_id" value="Login">
                 
                     </p>
               
            </form>
        </div>
        
        
        
        <h2> Sign in with </h2>
             <div class="fb">
            <div style="float:left; width:170px;">
			
			
			<div style="float:left; width:90px;"> 
				<a href="#"> <img style="padding:0px 5px 0px 0px;" src="<?php echo base_url()?>assets/img/facbook.png" /> </a> 
				<a href="#"> <img style="padding:0px 5px 0px 0px;" src="<?php echo base_url()?>assets/img/google.png" /> </a> 
				</div> 
			
			
			
			
			
			
            	<!--<span><a href="#"><i class="fb-ii"></i></a></span>-->
                
                </div>
               <!-- <div style="float:right;">
                <span><a href="#"><i class="goo-ii"></i></a></span>
                 
                </div>-->
                
                
            </div>
            
            <div style="clear:both;"></div>
            <br />
           
                   <span> Contributor </span> <a  style="color: #23527c;" href="http://www.mahatta.com/submission"> SignUp! </a>
                 
        	
        </div>
    </div>
   
     <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
    


     <!-- create model of image details for intres by sajid-->

	<!-- <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
    <div class="signup gall-w" id="addtodetail" style="display:none;">
         <div style="float: right" ><a href="#" onClick="allclose('')" >Close</a></div>
        <h2>Please Fill below For gallary to help</h2>
        
         <form name="" id="">
             <input type="hdden" id="image_id_details" name="image_id_details">
        <p><input type="text" name="" id="" placeholder="Email to"></p>
        <p><input type="text" name="" id="" placeholder="Subject"></p>
        <p><textarea name="lightbox_des" id="" rows="5" cols="34" style="border-radius: 15px;" placeholder="Gallery Description"></textarea></p>
        <p> <input type="button" name="create_lightbox"  onclick="" id="" value="Submit"> </p>
        </form>
        
        
    </div>-->

<div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
	 <div class="signup gall-w" id="addtointrestedgallery" style="display:none;">
         <div style="float: right" ><a href="#" onClick="allclose('')" >Close</a></div><br>
        <p>Submit the details below and our client executive will get in touch with you.</p>
        <span id="lightbox_error_image" style="color: red;margin-left: 48px;"></span><br>
         <form name="lightbox_submit" id="intrested_image_submit">
             <input type="hidden" id="image_id_intrested"  name="image_id_intrested">
           
              <input type="hidden" id="" name="api_image_id">
        <p><input type="text" name="name_to_image" id="name_to_image" placeholder="Your  Name *"></p>
        <p><input type="text" name="email_to_image" id="email_to_image" placeholder="Your Email *"></p>
        <p><input type="text" name="contact_to_image" id="contact_to_image" placeholder="Phone No."></p>
        <p><input type="text" name="city_to_image" id="city_to_image" placeholder="City"></p>
        <p><input type="text" name="painting_to_image" id="painting_to_image" placeholder="Painting Size."></p>
        <p><textarea name="lightbox_des_of_image" id="lightbox_des_of_image" rows="3" cols="34" style="border-radius: 15px;" placeholder="Send us details about the print, frame etc. or share your contact number we will get back to you.*"></textarea></p>
        <p> <input type="button" name="create_lightbox"  id="create_lightbox1" onclick="call_create_lightbox1('');" value="Submit"> </p>
        </form>
        
        
         
        
    </div>
	 
	 <!-- close image details--->
     
    
	
	
	


     <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
    <div class="signup gall-w" id="addtogallery" style="display:none;">
         <div style="float: right" ><a href="#" onClick="allclose('')" >Close</a></div>
        <h2>Create a new Gallery</h2>
        <span id="lightbox_error" style="color: red;margin-left: 48px;"></span><br>
         <form name="lightbox_submit" id="lightbox_submit">
             <input type="hidden" id="image_id" name="image_id">
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
$result=$this->frontend_model->get_all_lightboxes2($user_id);

 foreach($result as $results){?>
									<option value="<?php echo $results->lightbox_id;?>">
										<?php echo $results->lightbox_name;?>
									</option>
									<?php  }?>
								</select>	
        </p>
        
    </div>
     


	 
     
      <!-- Modal content-->
      
<script>
     $(document).ready(function(){
    $("#send_mail_btn").click(function(){
   $("#signppp").show();
   $("#loginpop").hide();
        //alert('');
    });
    
});
  </script>
<script defer src="<?php echo base_url()?>assets/js/jquery.flexslider.js"></script>   
</body>
</html>
<script type="text/javascript">
  $("#login_id").keyup(function(event){
    if(event.keyCode == 13){
        $("#login_id").click();
        login_verification();
    }
});

  $("#signup_form").keyup(function(event){
    if(event.keyCode == 13){
        $("#sign_id").click();
        checkRegisterValidation();
    }
});
    

    function login_verification(){
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
            var email= $('#email_login').val();

            var password= $('#password_login').val();
     //alert('yess')
           var datastring='email='+ email + ' &password=' + password;
		
            $.ajax({
               type:"POST",
               url:"<?=base_url()?>index.php/frontend/login",
               data:datastring,
              
                success: function(response)
                { 
				//alert(response)
                var obj=JSON.parse(response);
		
          // alert(obj.result);
            if(obj.result=='1')
                    {
                         //alert(response);
                       // window.location.href('<?php echo base_url()?>index.php');
                       window.location.replace('<?=$actual_link;?>');
                        allclose('');
                   
                    
                    }
                     else (obj.result=='0')
                    {
                        $('#login_error').html("<br>Invalid Email or Password");
                    }
      
                }
             
            });
          
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
	
	
	$('#password').live("keyup", function(event) {
   if(event.keyCode == '13'){
   	checkRegisterValidation();
   }
});
function mail_registration_confirm(){



          
       var email_reg= $('#email_reg').val();
         alert(email_reg);
        if($('#email_reg').val()=='')
        {
            $('#error_msg').html('Please enter mail id');
        }else{
           $('#error_msg').html(''); 
        
        
         $.ajax({
            type:"post",
           url:"<?=base_url()?>index.php/frontend/mail_registration_confirm_front",
             data:"email_reg="+email_reg,
             success:function(response){
                $('#error_msg').html(response); 
             }
         });
         }
        
    

}
	function updateforpaswd(){

      
       var email_regd= $('#email_regd').val();
         //alert(email_regd);
        if($('#email_regd').val()=='')
        {
            $('#error_msg').html('Please enter mail id');
        }else{
           $('#error_msg').html(''); 
        
        
         $.ajax({
            type:"post",
           url:"<?=base_url()?>index.php/frontend/updateforpassword",
             data:"email_regd="+email_regd,
             success:function(response){
			 
                $('#error_msg').html(response); 
             }
         });
         }
    
}


	document.getElementById('password_login').onkeydown = function(event) {
    if (event.keyCode == 13) {
      login_verification();
    }
}


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
                url: "<?php print base_url() ?>index.php/frontend/register",
                data: $("#signup_form").serialize(),
                success: function(response)
                {
        // alert(response);
                  $('#cpassword_error').html(response);
                   
                     var obj=$.parseJSON(response);
            //alert(obj.result);
            if(obj.result=='1')
                    {
                         //alert(response);
                       // window.location.href('<?php echo base_url()?>index.php');
                       window.location.replace('<?php echo base_url()?>index.php');
                        allclose('');
                   
                    
                    }
                    

                        
                    
                }
            });
			$('#signup_form')[0].reset();
            return false;
        }
}	// end registration function	
  








     $(document).ready(function(){
    $("#send_mail_btn").click(function(){
   $("#signppp").show();
   $("#loginpop").hide();
        //alert('');
    });
    
});
  </script>
