<?php
//echo phpinfo();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<script defer src="<?php echo base_url()?>assets/js/jquery.flexslider.js"></script>   
<script type="text/javascript">
    function ShowHideDiv() {
        var ima = document.getElementById("ima");
        var c_job_dec_detail = document.getElementById("c_job_dec_detail");
        c_job_dec_detail.style.display = ima.value == "other" ? "block" : "none";
    }
</script>
<!-- footer -->
    <footer class="container-fluid">
        <div class="footer-content container">
            <div class="col-xs-6 col-sm-2 col-md-2" style="padding-right:0">
                <h1>Quick  <span>Links</span></h1>
                <ul>
                    <li><a href="<?php echo base_url()?>frontend/about">About Mahatta Art</a></li>
                    <!--                    <li><a href="<?php echo base_url()?>frontend/media_center">Media Center</a></li>-->
                    <li><a href="<?php echo base_url()?>frontend/findart">Find Art</a></li>
                    <li><a href="<?php echo base_url()?>frontend/partner">Partners</a></li>
                    <li><a href="<?php echo base_url()?>frontend/career">Career</a></li>
                    <!-- <li><a href="http://mahatta.com/submission/photographer.php">Become a contributor</a></li>-->
                    <li><a href="http://mahatta.com/submission/">Become a contributor</a></li>
                </ul>
            </div>
                <?php // $forget_emlid;?>
            <div class="col-xs-6 col-sm-2 col-md-2">
                <h1>Let us <span>Help</span></h1>
                <ul>
                    <li><a href="<?php echo base_url()?>frontend/contact">Contact Us</a></li>
                    <li><a href="<?php echo base_url()?>frontend/faq">FAQ's</a></li>
                    <li><a href="<?php echo base_url()?>frontend/ordering">Ordering</a></li>
                    <li><a href="<?php echo base_url()?>frontend/shipping">Shipping & Delivery</a></li>
                    <li><a href="<?php echo base_url()?>return">Returns</a></li>
                </ul>
            </div>
            <?php  if($this->session->userdata('userid')){ ?>
            <div class="col-xs-6 col-sm-2 col-md-2">
                <h1>My  <span>Account</span></h1>
                <ul>
                    <li><a href="<?php print base_url();?>user/profile">My Profile</a></li>
                    <li><a href="javascript:">Track My Order</a></li>
                    <li><a href="<?=base_url()?>user/order_history">Order History</a></li>
                </ul>
            </div>
            <?php }?>
             <div class="col-xs-6 col-sm-2 col-md-2">
                <h1>Term &  <span>Policies </span></h1>
                <ul>
                    <li><a href="<?php echo base_url()?>frontend/terms_of_use">Terms of Use </a></li>
                    <li><a href="<?php echo base_url()?>frontend/privacy_policy">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 pull-right">
                <h1> <a href="https://msg91.com/startups/?utm_source=startup-banner"><img src="https://msg91.com/images/startups/msg91Badge.png" width="120" height="90" title="MSG91 - SMS for Startups" alt="Bulk SMS - MSG91"></a> </h1>
                <h1> <a href="<?php echo base_url()?>frontend/msg91">send msg</a></h1>
            </div>
        </div>
       <p class="copyright"><a href="<?php echo base_url()?>frontend/terms_of_use">Terms  of Use  </a> &nbsp; © Copyright &nbsp;2017 | Mahatta Art</p>
    </footer>
    <!-- footer -->
    <style>
/****** LOGIN MODAL ******/
/*.loginmodal-container {
  padding: 20px;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
  padding-top:0
}*/

.loginmodal-container h1 {
	font-size: 1.6em;
	margin: 0;
	position: relative;
}
.loginmodal-container input[type=submit], .loginmodal-container input[type=button] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password] {
  height: 30px;
  font-size: 12px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.loginmodal-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  padding: 10px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}


.login-help{
  font-size: 12px;
}

.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
	</style>
	
    <!-- login form -->    
    <div class="modal fade" id="myModal_registration" role="dialog">
    	  <div class="modal-dialog">
          	<div class="modal-content" style="border-radius:0">
            	<div class="modal-body">
                    <!-- login form-->
                    <div class="loginmodal-container" id="login-modal" style="display:none">
                      <h1>User Sign In <a class="lightbox-close" data-dismiss="modal"></a> </h1>
                      <br>
                      <p> </p>
                      <div style="color: red;" id="password_login_error"></div>
                      <div style="color: red;" id="email_login_error"></div>
                      <div style="color: red;" id="login_error"></div> 
                      <form action="#" id="login_id" name="login_id" method="post" class="form-horizontal"><input type="hidden" name="wsid" value="04b82a005a3f55b8b5c91c486b740875ef9bb951" />
                            <div class="form-group">
                                <label class="col-sm-2" for="email">Email </label>
                                <div class="col-sm-10">
                                    <input name="email" type="text" id="email_login" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2" for="password">Password </label>
                                <div class="col-sm-10">
                                    <input type="password" id="password_login" name="password_login" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="button" name="login" class="login loginmodal-submit" value="Login" onclick="return login_verification();">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                     <p class="login-help">Don't have an account! <a href="#" style="color:#428bca" id="sign_up_btn2">Sign Up Here</a></p>
                                     <p class="login-help">Forgot Password <a href="#" class="none" id="send_mail_btn2" style="color:#428bca">Click here</a></p>
                                </div>
                            </div>
                      </form>
                      <!--<div class="login-help">
                          <h1>Sign In with</h1>
                          <img src="http://www.mahattaart.com/assets/img/facbook.png">
                          <img src="http://www.mahattaart.com/assets/img/google.png">
                      </div>-->
                    </div>
                    
                    <!-- forget form-->
                    <div class="loginmodal-container" id="login-modal2" style="display:none">
                      <h1>Forget Password <a class="lightbox-close" data-dismiss="modal"></a></h1><br>
                      <p></p>
                      <div id="error_msg" style="color:red;"></div>
                      <form action="#" id="" name="sign_id" method="post" class="form-horizontal"><input type="hidden" name="wsid" value="04b82a005a3f55b8b5c91c486b740875ef9bb951" />
                        <input name="email_regd" type="text" id="email_regd" placeholder="Email Address" value="<?php echo $forget_emlid;?>">
                        <input type="button" name="login" class="login loginmodal-submit" value="Update Password" onclick="updateforpaswd();">
                      </form>
                    </div>
                    
                    <!-- signup form-->
                    <div class="loginmodal-container" id="login-modal3" style="display:none">
                      <h1>User Sign Up <a class="lightbox-close" data-dismiss="modal"></a></h1><br>
                        <p></p>
                        <div style="color: red" id="email_error"></div>
                        <div style="color: red" id="password_error"></div> 
                        <div style="color: red" id="cpassword_error"></div>
                        <div style="color: green" id="success_result"></div>
                      <form action="#" id="signup_form" name="sign_id" method="post" class="form-horizontal"><input type="hidden" name="wsid" value="04b82a005a3f55b8b5c91c486b740875ef9bb951" />
                        <div class="form-group">
                                <label class="col-sm-3" for="first_name">First Name </label>
                                <div class="col-sm-9">
                                    <input type="text" name="first_name" id="first_name" placeholder="First Name">
                                </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-3" for="last_name">Last Name </label>
                                <div class="col-sm-9">
                                    <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                                </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-3" for="email_reg">Email </label>
                                <div class="col-sm-9">
                                    <input type="text" name="email_reg" id="email_reg" placeholder="Email Address">
                                </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-3" for="passwordd">Password </label>
                                <div class="col-sm-9">
                                    <input name="passwordd" type="password" id="password" placeholder="Password">
                                </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-3" for="cpassword">Re-Password </label>
                                <div class="col-sm-9">
                                    <input name="cpassword" type="password" id="cpassword" placeholder="Confirm Password">
                                </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-3" for="password">Comapny Name </label>
                                <div class="col-sm-9">
                                    <input name="company_name" type="text" id="company_name" placeholder="company name">
                                </div>
                            </div>

                        <div class="form-group">
                                <label class="col-sm-3" for="">I'm a</label>
                                <div class="col-sm-9">
                                    <select name="ima" id="ima" onchange = "ShowHideDiv()" class="form-control">
                        <option value="hotelier"> Hotelier </option>
                        <option value="interior designer"> Interior Designer </option>
                        <option value="architects"> Architects </option>
<!--                        <option value="b2c customer"> B2C Customer </option>
-->                        <option value="corporate"> Corporate </option>
                        <option value="design house"> Design House </option>
                        <option value="other"> Other </option>
                    </select>
                                </div>
                            </div>


                        <div class="form-group" style="display: none;" id="c_job_dec_detail">
                                <label class="col-sm-3 optional other" for="">Details </label>
                                <div class="col-sm-9">
                                    <input name="job_dec_detail" type="text" id="job_dec_detail" placeholder="Enter Details">
                                </div>
                            </div>


                        <div class="form-group">
                                <label class="col-sm-3" for="">Job Description </label>
                                <div class="col-sm-9">
                                    <select name="job_dec" id="job_dec" class="form-control">
                                        <option> Select </option>
                                        <option value="purchase manager"> Purchase Manager </option>
                                        <option value="owner"> Owner </option>
                                        <option value="ceo"> CEO </option>
                                        <option value="coo"> COO </option>
                                        <option value="interior designer"> Interior Designer </option>
                                        <option value="architects"> Architects </option>
                                        <option value="art buyer"> Art Buyer </option>
                                        <option value="art collector"> Art Collector </option>
                                        <option value="vice president"> Vice President </option>
                                        <option value="other"> Other </option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group  demo_bx" style="display: none;">
                                <label class="col-sm-3" for="">Vendor Type </label>
                                <div class="col-sm-9">
                                    <select onchange="showlocation(this.value)" name="vendor_type" id="vendor_type" class="form-control">
                                        <option>--Select--</option>
                                    </select>
                                </div>
                            </div>


                        <div class="form-group  demo_bx" style="display: none;">
                                <label class="col-sm-3" for="">Location</label>
                                <div class="col-sm-9">
                                    <select onclick="showlocation_id(this.value)" name="vendor_location" id="vendor_location" class="form-control">
                                        <option>--Select--</option>
                                        <?php
                                            foreach($data as $location) {
                                        ?>
                                        <option value="<?php echo $location["location"]; ?>"><?php echo $location["location"]; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <a href="?wsid=04b82a005a3f55b8b5c91c486b740875ef9bb951" onclick="demo_fn2('');return false;" style="position: absolute;right: 5px;top: 5px;"> <span>x</span></a>
                                </div>
                            </div>

                        <div class="form-group demo_bx" style="display: none;">
                                <label class="col-sm-3" for="">Location ID</label>
                                <div class="col-sm-9">
                                    <select name="vendor_location_id" id="vendor_location_id" class="form-control">
                                        <option>--Select--</option>
                                        <?php
                                            foreach($data as $loc_id) {
                                        ?>
                                        <option value="<?php echo $loc_id["location_id"]; ?>"><?php echo $loc_id["location_id"]; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        <div class="form-group">
                                <label class="col-sm-3" for="" style="visibility:hidden"></label>
                                <div class="col-sm-9">
                                	<input name="sign_id" id="sign_id" class="login loginmodal-submit" value="Signup Now" onclick="checkRegisterValidation();" type="button">
                                </div>
                            </div>
                                
                      </form>
                         <p>
                         	Already have an account?
                         	<a href="#" style="color:#428bca" id="login-link2" class="login-link2"> &nbsp; Login Here</a>
                            <a href="#" class="none" onClick="demo_fn('')" style="color:#F00">Merchant Registration</a>
                         </p>
                      <div class="login-help">
                      </div>
                    </div>
                </div>
            </div>
			</div>
		  </div>

    <!-- Add to gallery -->          
    <div class="modal fade" id="login-modal4" role="dialog">
    	  <div class="modal-dialog"  style="width:400px">
          	<div class="modal-content" style="border-radius:0">
            	<div class="modal-body">
                    <!-- signup form-->
                    <div class="loginmodal-container">
                      <h1>Create a new Gallery <a class="lightbox-close" data-dismiss="modal"></a></h1>
                      <br>
                      <span id="lightbox_error" style="color: red;margin-left: 48px;"></span>
                      <br>
                      <form name="lightbox_submit" id="lightbox_submit"><input type="hidden" name="wsid" value="04b82a005a3f55b8b5c91c486b740875ef9bb951" />
                          <input type="hidden" id="image_id" name="image_id">
                          <div class="form-group">
                            <input type="text" name="lightbox_name" id="lightbox_name" placeholder="Gallery name">
                          </div>
                          <div class="form-group">
                            <textarea name="lightbox_des" id="lightbox_des" rows="5" placeholder="Gallery Description" class="form-control"></textarea>
                          </div>
                          <div class="form-group">
                            <input type="button" name="create_lightbox"  id="create_lightbox" onclick="call_create_lightbox();" value="Create Gallery">
                          </div>
                      </form>
					  <h1 style="margin-bottom:10px">Choose existing Gallery</h1>
                      <form name="lightbox_submit" id="lightbox_submit"><input type="hidden" name="wsid" value="04b82a005a3f55b8b5c91c486b740875ef9bb951" />
                          <div class="form-group">
                            <select id="lightbox_list_dropdown" onchange="check_exist_img(this.value);" class="form-control">
                            <option
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
                          </div>
                      </form>
                    </div>
                </div>
            </div>
			</div>
		  </div>
          
<script>
$(document).ready(function(){
	
	<!-- login btn -->
    $(".login_btn").click(function(){
        $("#login-modal").css("display", "block");
        $("#login-modal2").css("display", "none");
        $("#login-modal3").css("display", "none");
    });

	<!-- signup btn -->
    $(".signup_btn").click(function(){
        $("#login-modal").css("display", "none");
        $("#login-modal2").css("display", "none");
        $("#login-modal3").css("display", "block");
    });
	
	<!-- inside forget btn -->
    $("#send_mail_btn2").click(function(){
        $("#login-modal").css("display", "none");
        $("#login-modal2").css("display", "block");
        $("#login-modal3").css("display", "none");
    });


	<!-- inside signup btn -->
    $("#sign_up_btn2").click(function(){
        $("#login-modal").css("display", "none");
        $("#login-moda2").css("display", "none");
        $("#login-modal3").css("display", "block");
    });
	
	
	<!-- inside login btn -->
    $(".login-link2").click(function(){
        $("#login-modal").css("display", "block");
        $("#login-modal2").css("display", "none");
        $("#login-modal3").css("display", "none");
    });
});
</script>

     <div class="signup gall-w" id="addtointrestedgallery" style="display:none;">
         <div style="position: absolute;right: 10px;top: 0;"><a href="?wsid=04b82a005a3f55b8b5c91c486b740875ef9bb951" onClick="allclose('');return false;" >Close</a></div><br>
        <p>Submit the details below and our client executive will get in touch with you.</p>
        <span id="lightbox_error_image" style="color: red;margin-left: 48px;"></span><br>
         <form name="lightbox_submit" id="intrested_image_submit"><input type="hidden" name="wsid" value="04b82a005a3f55b8b5c91c486b740875ef9bb951" />
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
     <!-- close image details -->
     <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
     
    
     
<script>
    $(document).ready(function(){
        $("#send_mail_btn").click(function(){
            $("#signppp").show();
            $("#loginpop").hide();
            //alert('');
        });
    });
</script>
      <!-- Modal content-->

        <!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'wAZSuUVEkD';var d=document;var w=window;function l(){
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
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
               url:"<?=base_url()?>frontend/login",
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
                     else 
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
           url:"<?=base_url()?>frontend/mail_registration_confirm_front",
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
           url:"<?=base_url()?>frontend/updateforpassword",
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
        if($('#first_name').val()=="")
        {
            $('#email_error').html("Please Enter First Name");
            return false;
        }
        if($('#last_name').val()=="")
        {
            $('#email_error').html("Please Enter Last Name");
            return false;
        }
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
        if($('#ima').val()=="")   {
            $('#email_error').html("Please Enter Select Your Designation");
            return false;
        }
        if($('#job_dec').val()=="")   {
            $('#email_error').html("Please Enter Select Your Job Description");
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
                success: function(response)
                {
					//alert(response)
					if(response=='1')
					{
					//alert(response)
                      $('#cpassword_error').html("Email Already Exist.");
					}
                    var obj=$.parseJSON(response);
                    
                    if(obj.result=='1'){
                        //alert(response);
                        $("#success_result").html("<p> Welcome to Mahattaart!</p>");
                        window.setTimeout(function(){location.reload()},3000)
                        window.location.replace('<?php echo base_url()?>index.php');
                        allclose('');
                    }
                
				
				
				}
            });
            $('#signup_form')[0].reset();
            return false;
        }
}   // end registration function    
    function demo_fn(){
        $(".demo_bx").css("display","block");
        $.ajax({
            url:"<?php print base_url() ?>frontend/vendor_type",
            data:"value='value'",
            success :function(data){
                //alert(data)
                $("#vendor_type").html(data);
            }
        })
    }

    function showlocation(){
        $.ajax({
            type: "POST",
            url:"<?php print base_url() ?>frontend/vendor_location",
            data:"vendor_type="+$("#vendor_type").val(),
            success :function(data){
                //alert(data)
                $("#vendor_location").html(data);
            }

        })
    }

    function showlocation_id(){
        $.ajax({
            type: "POST",
            url:"<?php print base_url() ?>frontend/vendor_location_id",
            data:'vendor_location='+$("#vendor_location").val(),
            success :function(data){
                //alert(data)
                $("#vendor_location_id").html(data);
            }
        })
    }

    $(document).ready(function(){
    $("#send_mail_btn").click(function(){
   $("#signppp").show();
   $("#loginpop").hide();
        //alert('');
    });
});
  </script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111865142-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111865142-1');
</script>

</body>
</html>
