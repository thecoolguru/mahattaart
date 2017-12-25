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
<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>


<script type ="text/javascript">
    $(document).ready(function(){
        $('#verdor_types').change(function(){
       var verdor_id = $('#verdor_types').val();
	  // alert(verdor_id);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/customer/get_kiosk_users_details'); ?>",
			data:"verdor_id="+verdor_id,
			success:function(response)
			 {
             ///alert(response)
				$("#location").html(response);
			 }	 
		    })	
       });
    });
    </script>
    
    
    <script type ="text/javascript">
    $(document).ready(function(){
        $('#location').change(function(){
       var verdor_id = $('#location').val();
	  // alert(verdor_id);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/customer/get_kiosk_users_details'); ?>",
			data:"verdor_id="+verdor_id+'&location=location',
			success:function(response)
			 {
             //alert(response)
				$("#verdor_id2").html(response);
			 }	 
		    })	
       });
    });
    </script>
	
	
	
	
	 
    <script type ="text/javascript">
 	  $(document).ready(function()
		   {
			   	   
			   
	       $('input[name=experience]').change(function(){
           var value = $( 'input[name=experience]:checked' ).val();
            //alert(value);
			
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
    
	
    
    
    
 <?php // print_r($get_promo) ;?> 
  
    
    
   





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
	 <h4 style="color:green"><?php if(isset($record_message)){ echo $record_message; }else{ echo $record_failed;}?></h4>
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 
</center>
<?php //echo form_oepn('index.php/customer/add_customer_query');  ?>
<form action="<?php  echo base_url('index.php/customer/add_kiosk_users');?>" method="post" class="form-horizontal" novalidate >
	

    <div class="form-group">
      <label class="col-sm-3 control-label">Vendor types<span class="text-danger">*</span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
           
            <select name="verdor_types"class="form-control" required="required" id="verdor_types">
             <option value="">Select</option>
            <?php foreach($get_vendor as $get){ ?>
       <option value="<?php echo $get->id; ?>" ><?php echo $get->vendor_types; ?></option>
    <?php }?> 
  
            </select>
        </div>
	
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Location<span class="text-danger">*</span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
            <select name="location" id="location" class="form-control">
                <option  value="" selected >Select Location </option>
                <?php foreach($get_location as $re2){ ?>
<option value="<?php echo $re2->id; ?>"><?php echo $re2->location_id; ?></option>
<?php }?>
                
            </select>
        </div>
	<em style="color:red;font-size:11px"><?php echo form_error('location'); ?></em>	
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Location ID<span class="text-danger">*</span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
            <select name="verdor_id2"class="form-control" required="required" id="verdor_id2">
            <option  value="" selected>Select Location Id</option>
            
            </select>
        </div>
		
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Person Name<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="person_name" value="<?php echo set_value('person_name') ?>"  id="person_name" class="form-control" required aria-required="true">
        <em style="color:red;font-size:11px"><?php echo form_error('person_name'); ?></em>    
	  </div>
    </div>

      <div class="form-group">
      <label class="col-sm-3 control-label">Mobile Number<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="person_mobile" id="person_mobile" onkeypress='return event.charCode >=48 && event.charCode <=57' maxlength="10"   value="<?php echo set_value('person_mobile') ?>" class="form-control" required aria-required="true">
		
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Email ID <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="email" name="person_email" id="person_email" value="<?php echo set_value('person_email') ?>" class="form-control" required aria-required="true">
<em style="color:red;font-size:11px"><?php echo form_error('person_email'); ?></em>      
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Sale Person<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="sales_person" id="sales_person" value="<?php echo set_value('sales_person') ?>" class="form-control" required aria-required="true">
        
	  </div>
    </div>
    
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Experience<span class="text-danger">*</span></label>
      <div class="col-sm-9">
         
<input type="radio" name="experience"  id="experience1" value="home" class="" required aria-required="true" checked>Home
<input type="radio" name="experience"  id="experience2" value="asa_guest" class="" required aria-required="true">ASA Guest 
<input type="radio" name="experience"  id="experience3" value="create_login" class="" required aria-required="true">Create User Login
<input type="radio" name="experience"  id="experience4" value="only_verval" class="" required aria-required="true">Only Verbal
	  </div>
      
      <em style="color:red;font-size:11px"><?php echo form_error('experience'); ?></em>
    </div>
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Transact Offiline<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="transact_offline" id="transact_offline" value="<?php echo set_value('transact_offline') ?>" class="form-control" required aria-required="true">
        
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Active Coupon<span class="text-danger">*</span></label>
      <div class="col-sm-9">
      	<div class="btn-group">          
            <select name="active_coupon"class="form-control" required="required" id="active_coupon">
             
			 <option  value=""selected>Select Coupon Code</option>
			
            </select>
        </div>
	
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Register Customer<span class="text-danger">*</span></label>
      <div class="col-sm-9">
         
     <input type="radio" name="register" id="n" value="yes" class="" required aria-required="true" >Yes
     <input type="radio" name="register" id="experience" value="no" class="" required aria-required="true"  checked>No
            
	  </div>
    </div>
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
          <button class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
        </div>
    </div>
</form>

<p>To Display Customer Wuer<a href="<?php  echo base_url('index.php/customer/view_kiosk_users');?>">Click Here</a></p>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>


