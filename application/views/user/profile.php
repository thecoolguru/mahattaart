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
        <!-- art style -->
        <div class="art-style col-md-12">
        <div class="pagination">
 			<span> <a href="<?php print base_url();?>index.php">HOME</a> > My Account > <span> Profile</span> </span>
        </div>
        <div class="row">
        	
            <!-- aside -->
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
                        <li><a href="<?=base_url()?>user/order_history">Order History</a></li>
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
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel-page col-md-10 col-xs-9">
            	
                <!--  Art Movements -->
                	<div class="art-movements">
                        <div class="art-inner">
                            <p>My Profile</p>
                        </div>
                      <img src="<?php print base_url();?>assets/img/profile.jpg" class="img-responsive">
                    </div>
					
                   
                    <div class="profile">
                    	<div class="row">
                        	<div class="col-md-6 col-sm-6 col-xs-12 col-md-push-3 col-sm-push-3">
<!--<form method="post"action="<?php echo base_url();?>user/profile"name="form1"id="form1">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td>Email ID</td>
<td><input name="email" type="text" id="email" class="email"value="<?php echo $detail->email_id;?>" readonly/></td>
</tr>
<tr>
<td><label for="lname">Password</label></td>
<td><input type="text" name="pwd" id="pwd" class="lname" value="<?php echo $detail->password;?>"/>
<br/><span style="color: red" id="pwd_error"></span></td>
</tr>

<tr>
<td>First Name</td>
<td><input type="text" name="fname" id="fname" class="addline2"value="<?php echo $detail->first_name;?>"/>
<br/><span style="color: red" id="fname_error"></span></td>


</tr>
<tr>
<td>Last Name</td>
<td><input type="text" name="lastname" id="name" class="city"value="<?php echo $detail->last_name;?>"  /></td>
</tr>
<tr>
<td>Address</td>
<td><input type="text" name="address" id="address" class="state" value="<?php echo $detail->address;?>"/></td>
</tr>
<tr>
<td>Country</td>
<td><?php $country_list=get_country_name();?>
<select id="country" name="country" class="country">
                          <option value="-1">Select Country</option>
                      
                          <?php foreach($country_list as $key=>$country)	{?>
                          <option value="<?php echo $key;?>" <?php if($detail->country==$key){?> selected="selected" <?php }?>>
                              <?php print $country; ?>
                          </option> 
                          <?php	} ?>
                  </select></td>
</tr>
<tr>
<td>ZIP Code</td>
<td><input type="text" onkeypress="return numbersonly(event) " maxlength="6" name="zip" id="zip" class="zip" value="<?php echo $detail->zip_code;?>"/></td>
</tr>
<tr>
<td>Phone / Contact Number</td>
<td><input type="text" name="phone" onkeypress="return numbersonly(event) " maxlength="12" id="phone" class="phone"value="<?php echo $detail->contact;?>" />
<br/><span style="color: red" id="phone_error"></span></td></tr>
 <tr>
<td>Gender</td>
<td><select name="gender" id="gender" class="country">
<option value="" <?php if($detail->gender==''){?> selected="selected" <?php } ?>>Select gender</option>
<option <?php if($detail->gender=='Male'){?> selected="selected" <?php } ?>>Male</option>
<option <?php if($detail->gender=='Female'){?> selected="selected" <?php } ?>>Female</option>

</select></td>
</tr>
  <tr>
<td>Marital Status</td>
<td><select name="mstatus" id="mstatus" class="country">
   <option value="" <?php if($detail->martial_status==''){?> selected="selected" <?php } ?>>Select Martial Status</option>
<option <?php if($detail->martial_status=='Married'){?> selected="selected" <?php } ?>>Married</option>
<option <?php if($detail->martial_status=='Unmarried'){?> selected="selected" <?php } ?>>Unmarried</option>

 </select></td>
</tr>
<tr>
<td>Company Name</td>
<td><input type="text" name="company_name" id="company_name" class="state" value="<?=$detail->company_name;?>"/></td>
</tr>
</table>
<input type="submit"value="Save" style=" width:120px; height:25px; background-color:#336699; color:#FFFFFF; border-radius: 5px; border:none; margin-top:30px; margin-left:144px;" ></form>-->

<form class="form-horizontal" method="post"action="<?php echo base_url();?>user/profile"name="form1"id="form1">
<div class="form-group">
<label class="col-md-3 control-label">Email ID</label>
<div class="col-md-9">
<input name="email" type="text" id="email" class="email form-control" value="<?php echo $detail->email_id;?>" readonly/>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Password</label>
<div class="col-md-9">
<input type="text" name="pwd" id="pwd" class="lname form-control" value="<?php echo $detail->password;?>"/>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">First Name</label>
<div class="col-md-9">
<input type="text" name="fname" id="fname" class="addline2 form-control"value="<?php echo $detail->first_name;?>"/>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">Last Name</label>
<div class="col-md-9">
<input type="text" name="lastname" id="name" class="city form-control"value="<?php echo $detail->last_name;?>"  />
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Address</label>
<div class="col-md-9">
<input type="text" name="address" id="address" class="state form-control" value="<?php echo $detail->address;?>"/>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">Country</label>
<div class="col-md-9">
<?php $country_list=get_country_name();?>
<select id="country" name="country" class="country form-control">
<?php foreach($country_list as $key=>$country)	{?>
<option value="<?php echo $key;?>" <?php if($detail->country==$key){?> selected="selected" <?php }?>>
<?php print $country; ?>
</option> 
<?php	} ?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">ZIP Code</label>
<div class="col-md-9">
<input type="text" onkeypress="return numbersonly(event) " maxlength="6" name="zip" id="zip" class="zip form-control" value="<?php echo $detail->zip_code;?>"/>
</div>
</div><div class="form-group">
<label class="col-md-3 control-label">Phone / Contact Number</label>
<div class="col-md-9">
<input type="text" name="phone" onkeypress="return numbersonly(event) " maxlength="12" id="phone" class="phone form-control"value="<?php echo $detail->contact;?>" />
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Gender</label>
<div class="col-md-9">
<select name="gender" id="gender" class="country form-control">
<option value="" <?php if($detail->gender==''){?> selected="selected" <?php } ?>>Select gender</option>
<option <?php if($detail->gender=='Male'){?> selected="selected" <?php } ?>>Male</option>
<option <?php if($detail->gender=='Female'){?> selected="selected" <?php } ?>>Female</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">Martial Status</label>
<div class="col-md-9">
<select name="mstatus" id="mstatus" class="country form-control">
<option value="" <?php if($detail->martial_status==''){?> selected="selected" <?php } ?>>Select Martial Status</option>
<option <?php if($detail->martial_status=='Married'){?> selected="selected" <?php } ?>>Married</option>
<option <?php if($detail->martial_status=='Unmarried'){?> selected="selected" <?php } ?>>Unmarried</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Company Name</label>
<div class="col-md-9">
<input type="text" name="company_name" id="company_name" class="state form-control" value="<?=$detail->company_name;?>"/>
</div>
</div>

<div class="form-group">
<div class="col-md-9 col-md-push-3">
<button type="button" class="btn social_icon" style="background-color:#0099cc; color:#fff;"> Save </button>
</div>
</div>
</form>
                    </div>
                    </div>
                    </div>
                </div>
                <!--  Art Movements -->
 
            </div></div>
            <!-- right panel -->
            
        </div>
</div>
