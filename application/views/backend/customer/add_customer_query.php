<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Backend Form</title>
<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/bootstrap-quirk.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />
<style>
body{background-color:#fff}
#login-page-wrapper {
    width: 100%;
    background: #2c2c2c;
    border-top: 15px solid #000;
    display: inline-block;
}
</style>

<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

<style>
.btn-group, .btn-group-vertical {
    margin: 0 2px 5px 0;
}
</style>
</head>
<body> 
<div class="container" style="margin-top:40px;">
<center>
     
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 <h4 style="color:green"><?php if(isset($message_success)) echo $message_success; ?></h4>
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 
</center>

<?php //echo form_oepn('index.php/customer/add_customer_query');  ?>
<form action="<?php  echo base_url('index.php/customer/add_customer_query');?>/<?=$customer_details[0]->id;?>" method="post" class="form-horizontal" novalidate >
    <div class="form-group">
    <?php $id=$this->uri->segment(3);	 ?>
      <label class="col-sm-3 control-label">Vendor types<span class="text-danger"></span></label>
   
   <!-------------LOAD PROMO CODE WHEN PAGE IS LOADED----------->
   <script type ="text/javascript">
    $(document).ready(function(){
    
	   
	    $('#vendor_location').change(function(){						
       var vendor_location = $('#vendor_location').val();
	   //alert("VENDOR Location="+vendor_location);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/customer/get_query_location_keys'); ?>",
			data:"vendor_location="+vendor_location,
			success:function(response2)
			 {
            //alert(response2)
				$("#vendor_location_id").html(response2);
			 }	 
		    })	
       });
	});
    </script>
   
   
   
   
    <script type ="text/javascript">
    $(document).ready(function(){
        $('#vendor_types').change(function(){						
       var vendor_types= $('#vendor_types').val();
	   //alert("ajax alert="+vendor_types);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/customer/get_query_details'); ?>",
			data:"vendor_types="+vendor_types,
			success:function(response)
			 {
            // alert("Response="+response)
				$("#vendor_location").html(response);
			 }	 
		    })	
       });
	   
	    $('#vendor_location').change(function(){						
       var vendor_location = $('#vendor_location').val();
	  // alert("VENDOR Location="+vendor_location);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/customer/get_query_location_keys'); ?>",
			data:"vendor_location="+vendor_location,
			success:function(response2)
			 {
           // alert(response2)
				 $("#vendor_location_id").val(response2);
			 }	 
		    })	
       });
	});
    </script>
    
    
    
    <script>

			
			  $(document).ready(function(e) {
				
				$('#submit').click(function(e) {
				 
				 var name=$('#name').val();
				 var email=$('#email').val();
				 var mobile=$('#mobile').val();
				 var pinterest=$('#pinterest').val();
				 var added_locaion=$('#added_locaion').val();
			 
				 var email_check=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				 var mob_check=/^\d{10}$/;
				 
				 
				 if(name=='')
				 {
					  $(".errorname").show().html("Name is required.");
					  return false;
			
				 }else{
					 $(".errorname").hide();
					 } 
				 
				 
				 if(email=='')
				 {
					$(".erroremail").show().html("Email is required.");
					return false;
				 }else{
					   $(".erroremail").hide();
					  } 
					  
				  
				 if(!email_check.test(email))
				  {
					  $(".erroremail").show().html("Please input a valid email.");
					  return false;
				  }else{
						 $(".erroremail").hide();                                                                                       
					  }
					  
				 if(mobile=='')
				 {
					 $(".errormobile").show().html("Mobile Number is required.");
					 return false;
				 }else{
					   $(".errormobile").hide();
					 }
				if(!mob_check.test(mobile))
				 {
					 $(".errormobile").show().html('Enter a 10 Digit Mobile Number');
					 return false;
				 }else
				 {
					$(".errormobile").hide(); 
				 }
				   added_locaion
				   
				   
				if(pinterest=='')  				 {
					 $(".errorpinterest").show().html("Product Interest is required.");
					 return false;
				 }else{
					   $(".errorsub").hide();
					 }
				
				
				
				  if(added_locaion=='')  
				 {
					 $(".errorlocation").show().html("Location  is required.");
					 return false;
				 }else{
					   $(".errorlocation").hide();
					 }
				
				});
				
				});
			
         </script>
         <script type ="text/javascript">
 	  $(document).ready(function()
		   {
			   	   
			   
	       $('input[name=experience]').change(function(){
           var value = $( 'input[name=experience]:checked' ).val();
           // alert(value);
			
			 $.ajax({
		     type:"POST",
		     url:"<?php  echo base_url('index.php/customer/get_peromotion_codes'); ?>",
			 data:"value="+value,
			 success:function(response)
			 {
             //alert(response)
				$("#active_coupon").html(response);
			 }	 
		    })	
			
            });
       });
    </script>
      <div class="col-sm-9">
      	<div class="btn-group">
         <select name="vendor_types"class="form-control" required="required" id="vendor_types">
           <option value="">Select</option>
           <?php  foreach($get_vendor as $vtypes){ ?>
<option value="<?php  echo $vtypes->vendor_types; ?>" <?php if($customer_details[0]->vendor_types==$vtypes->vendor_types){ echo 'selected'; } ?>><?php  echo $vtypes->vendor_types ?></option>
           <?php }?>
            
            </select>
                     
        </div>
	
      </div> 
    </div>
    
    <?php  // print_r($kiosk_location); ?>
 
    <div class="form-group">
      <label class="col-sm-3 control-label">Location<span class="text-danger"></span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
        <select name="vendor_location" id="vendor_location" class="form-control">
          <?php  if(!empty($id)){?>
<option  value="<?php echo $customer_details[0]->location;?>"<?php if($customer_details[0]->location==$kiosk_location[0]->location){echo 'selected';} ?>><?php echo $customer_details[0]->location;?> </option>
          
          <?php } else {?>
          <option  value="" selected >Select Location </option>
        
           <?php }?>
            
                
             </select>
        </div>
		
      </div>
    </div>
    
    
<!--<input type="text" name="vendor_location_id" value="<?php  // echo $customer_details[0]->vendor_location_key_id;  ?>">--->
    
    
    
    <!------------Pass Location keys--------------->
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Location ID<span class="text-danger"></span></label>
       <div id="key_id">
          <div class="col-sm-9">
             <input type="text" name="vendor_location_id" id="vendor_location_id"   class="form-control"  value="<?php if(isset($customer_details[0]->vendor_location_key_id)){echo $customer_details[0]->vendor_location_key_id;} else {echo set_value('vendor_location_id');} ?>"  >
          </div>
        </div>  
      
    </div>
    
    
 <!--------------------------->   
    
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Name<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="name" value="<?php if(isset($customer_details[0]->customer_name)){echo $customer_details[0]->customer_name;} else {echo set_value('name');} ?>"  class="form-control" required aria-required="true" id="name">
    <em class="errorname" style="color:red;font-size:red"></em>  
	  </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Email ID <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="email" id="email" value="<?php if(isset($customer_details[0]->customer_name)){echo $customer_details[0]->customer_email;} else {echo set_value('email');} ?>" class="form-control" required aria-required="true">
     <em class="erroremail" style="color:red;font-size:red"></em>   
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Mobile Number<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="mobile" value="<?php if(isset($customer_details[0]->customer_name)){echo $customer_details[0]->customer_mobile;} else {echo set_value('mobile');} ?>" class="form-control" required aria-required="true" id="mobile" onkeypress='return event.charCode >=48 && event.charCode <=57' maxlength="10">
	<em class="errormobile" style="color:red;font-size:red"></em>	
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Gender<span class="text-danger"></span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
            <select  name="gender"class="form-control">
                <option value="" selected>Select</option>
                <option value="Male" <?php if($customer_details[0]->gender=="Male"){ echo 'selected'; } else{  if($this->input->post('gender')=="Male"){ echo 'selected'; } } ?>>Male</option>
                <option value="Female" <?php if($customer_details[0]->gender=="Female"){ echo 'selected'; }else{ if($this->input->post('gender')=="Female"){ echo 'selected'; }  } ?>>Female</option>
            </select>
        </div>
		
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Product interested <span class="text-danger">*</span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
            <select name="pinterest"class="form-control" required="required" id="pinterest">
                <option  value="" selected>Select</option>
                <option value="Photos To Frame"<?php if($customer_details[0]->cutomer_interest=="Photos To Frame"){ echo 'selected'; } else {  if($this->input->post('pinterest')=="Photos To Frame"){ echo 'selected'; }    }?>>Photos To Frame</option>
                <option value="Wall Art" <?php if($customer_details[0]->cutomer_interest=="Wall Art"){ echo 'selected'; } else{  if($this->input->post('pinterest')=="Wall Art"){ echo 'selected'; }     } ?>>Wall Art</option>
            </select>
            <em class="errorpinterest" style="color:red;font-size:red"></em>
            
            
            
        </div>
		
      </div>
      
    </div>
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Any Feedback <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <textarea  class="form-control" rows="10" name="feadback" ><?php if(isset($customer_details[0]->cutomer_feadback)){echo $customer_details[0]->cutomer_feadback;} else {echo $this->input->post('feadback');} ?></textarea>
        
         </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Experience<span class="text-danger">*</span></label>
      <div class="col-sm-9">      
<input type="radio" name="experience"id="experience1"value="home" class="" required aria-required="true"
<?php if($customer_details[0]->experience=='home'){ echo 'checked';}?>>Home

<input type="radio" name="experience"  id="experience2" value="asa_guest" class="" required aria-required="true"
<?php if($customer_details[0]->experience=='asa_guest'){ echo 'checked';}?>>ASA Guest 

<input type="radio" name="experience"  id="experience3" value="create_login" <?php if($customer_details[0]->experience=='create_login'){ echo 'checked';}?> class="" required aria-required="true">Create User Login

<input type="radio" name="experience"  id="experience4" value="only_verval" <?php if($customer_details[0]->experience=='only_verval'){ echo 'checked';}?> class="" required aria-required="true">Only Verbal
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Active Coupon<span class="text-danger"></span></label>
      <div class="col-sm-9">
     
      	<div class="btn-group">      
            <select name="active_coupon"class="form-control" required="required" id="active_coupon">  
             <?php if(!empty($id)){ foreach($promo_codes as $romo){ ?>
             <option value="<?php  echo $romo->promo_name_code;?>" <?php if($customer_details[0]->active_coupon==$romo->promo_name_code){echo 'selected';} ?>  ><?php  echo $romo->promo_name_code;?></option>
             <?php } }else{?>
             <option  value=""selected>Select Coupon Code</option>
             <?php }?>
            </select>
        </div>
	
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Bill No<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input name="bill_no" value="" class="form-control" id="bill_no" type="text">

	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Register Customer<span class="text-danger"></span></label>
      <div class="col-sm-9">
 <input type="radio" name="customer_register" id="n" value="yes" class="" required aria-required="true" 
 <?php if($customer_details[0]->customer_register=='yes'){ echo 'checked';}?>>Yes
     <input type="radio" name="customer_register" id="experience" value="no" class="" required aria-required="true"
     <?php if($customer_details[0]->customer_register=='no'){ echo 'checked';}?>>No
            
	  </div>
    </div>


    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
          <button class="btn btn-success btn-quirk btn-wide mr5" id="submit">Submit</button>
        </div>
    </div>
</form>

<p>To Display Customer Wuer<a href="<?php  echo base_url('index.php/customer/view_cutomer_query');?>">Click Here</a></p>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
