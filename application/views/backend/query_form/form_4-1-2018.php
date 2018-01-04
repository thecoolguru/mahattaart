<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Backend Form</title>

<link href="<?=base_url()?>assets/css2/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/bootstrap-quirk.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

<script>

			
			  $(document).ready(function(e) {
				
				$('#submit').click(function(e) {
				 
				 var name=$('#name').val();
				 var mobile=$('#mobile').val();
				 var landline=$('#landline').val();
				 var email=$('#email').val();
				 var comp_name=$('#comp_name').val();
				 var address=$('#address').val();
				 var state_city=$('#state_city').val();
				 var region=$('#region').val();
				 var relat_manager=$('#relat_manager').val(); 
				 var art_researcher=$('#art_researcher').val();
				 var size_of_wall=$('#size_of_wall').val();
				 var color_of_wall=$('#color_of_wall').val();
				 var size_of_art=$('#size_of_art').val();
				 var display_place=$('#display_place').val();
				 var total_arts=$('#total_arts').val();
				 var orientation=$('#orientation').val();
				 var bud_per_work=$('#bud_per_work').val();
				 var total_budget=$('#total_budget').val();
				 var creative_details=$('#creative_details').val();
				 var general_theme=$('#general_theme').val();
				 var date_of_submission=$('#date_of_submission').val();
				 var feadback_submission=$('#feadback_submission').val();
				 var mode_submission=$('#mode_submission').val();
				 		
				 		 
				 var email_check=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				 var mob_check=/^\d{10}$/;
				 
				 
				 if(name=='')
				 {
					  $(".errorname").show().html("Person Name is required.");
					  return false;
			
				 }else{
					 $(".errorname").hide();
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
					 
                if(landline=='')
				 {
					 $(".errorlandline").show().html("landline Number is required.");
					 return false;
				 }else{
					   $(".errorlandline").hide();
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
					  
				 
				
				 
				 if(comp_name=='')
				 {
					 $(".errorcompany").show().html("Company Name is required.");
					 return false;
				 }else{
					   $(".errorcompany").hide();
					 }
				  
				  if(address=='')
				 {
					 $(".erroraddress").show().html("Message is required.");
					 return false;
				 }else{
					   $(".erroraddress").hide();
					 }
				if(state_city=='')
				 {
					 $(".errorstatecity").show().html("State/city  is required.");
					 return false;
				 }else{
					   $(".errorstatecity").hide();
					 }
				if(region=='')
				 {
					 $(".errorregion").show().html("Region is required.");
					 return false;
				 }else{
					   $(".errorregion").hide();
					 }	 
					 
				if(relat_manager=='')
				 {
					 $(".errorrelatmanager").show().html("Relationship Manager is required.");
					 return false;
				 }else{
					   $(".errorrelatmanager").hide();
					 }	

                if(art_researcher=='')
				 {
					 $(".errorartresearcher").show().html("Art Researcher is required.");
					 return false;
				 }else{
					   $(".errorartresearcher").hide();
					 }	
                if(size_of_wall=='')
				 {
					 $(".errorsizeofwall").show().html("Siz of Wall is required.");
					 return false;
				 }else{
					   $(".errorsizeofwall").hide();
					 }	
               if(color_of_wall=='')
				 {
					 $(".errorcolorofwall").show().html("Color of Wall is required.");
					 return false;
				 }else{
					   $(".errorcolorofwall").hide();
					 }
                if(size_of_art=='')
				 {
					 $(".errorsizeofart").show().html("Size Of Art is required.");
					 return false;
				 }else{
					   $(".errorsizeofart").hide();
					 }		
                if(total_arts=='')
				 {
					 $(".errortotalarts").show().html("Total Art is required.");
					 return false;
				 }else{
					   $(".errortotalarts").hide();
					 }
                if(orientation=='')
				 {
					 $(".errororientation").show().html("Orientation is required.");
					 return false;
				 }else{
					   $(".errororientation").hide();
					 }					 
				 
				if(bud_per_work=='')
				 {
					 $(".errorbudperwork").show().html("Budget Per Work is required.");
					 return false;
				 }else{
					   $(".errorbudperwork").hide();
					 }	
                 if(total_budget=='')
				 {
					 $(".errortotalbudget").show().html("Total Budget is required.");
					 return false;
				 }else{
					   $(".errortotalbudget").hide();
					 }	
                if(creative_details=='')
				 {
					 $(".errorcreativedetails").show().html("Creative Details is required.");
					 return false;
				 }else{
					   $(".errorcreativedetails").hide();
					 }						 
				if(general_theme=='')
				 {
					 $(".errorgeneraltheme").show().html("General Theme is required.");
					 return false;
				 }else{
					   $(".errorgeneraltheme").hide();
					 }
                if(date_of_submission=='')
				 {
					 $(".errordateofsubmission").show().html("Date Submission is required.");
					 return false;
				 }else{
					   $(".errordateofsubmission").hide();
					 }	
              if(feadback_submission=='')
				 {
					 $(".errorfeadbacksubmission").show().html("Feedback Submission is required.");
					 return false;
				 }else{
					   $(".errorfeadbacksubmission").hide();
					 }	
             if(mode_submission=='')
				 {
					 $(".errormodesubmission").show().html("Mode Submission  is required.");
					 return false;
				 }else{
					   $(".errormodesubmission").hide();
					 }						 
 
				 
				
			 
				 
				
				});
				
				});
			

         </script>
		 
		 
		 

<script>
$(document).ready(function()
{
    $("#hotal").click(function()
	{
       if ($("#hotal").prop('checked')==true)
	        { 
               $("#hotal_drop").css("display","block") ;
	        }
	   if ($("#hotal").prop('checked')==false)
	        {
		       $("#hotal_drop").css("display","none") ;
	        }
	   
	   

    });
	
	
	
	$("#restaurant").click(function()
	{
       if ($("#restaurant").prop('checked')==true)
	        { 
               $("#restaurant_drop").css("display","block") ;
	        }
	   if ($("#restaurant").prop('checked')==false)
	        {
		       $("#restaurant_drop").css("display","none") ;
	        }
	   
	   

    });
	
	
	$("#cafe").click(function()
	{
       if ($("#cafe").prop('checked')==true)
	        { 
               $("#cafe_drop").css("display","block") ;
	        }
	   if ($("#cafe").prop('checked')==false)
	        {
		       $("#cafe_drop").css("display","none") ;
	        }
	   
	   

    });
	
	
$("#house").click(function()
	{
       if ($("#house").prop('checked')==true)
	        { 
               $("#house_drop").css("display","block") ;
	        }
	   if ($("#house").prop('checked')==false)
	        {
		       $("#house_drop").css("display","none") ;
	        }
	   
	   

    });
	
	$("#hospital").click(function()
	{
       if ($("#hospital").prop('checked')==true)
	        { 
               $("#hospital_drop").css("display","block") ;
	        }
	   if ($("#hospital").prop('checked')==false)
	        {
		       $("#hospital_drop").css("display","none") ;
	        }
	   
	   

    });
	
	
	$("#mall").click(function()
	{
       if ($("#mall").prop('checked')==true)
	        { 
               $("#mall_drop").css("display","block") ;
	        }
	   if ($("#mall").prop('checked')==false)
	        {
		       $("#mall_drop").css("display","none") ;
	        }
	   
	   

    });

  $("#office").click(function()
	{
       if ($("#office").prop('checked')==true)
	        { 
               $("#office_drop").css("display","block") ;
	        }
	   if ($("#office").prop('checked')==false)
	        {
		       $("#office_drop").css("display","none") ;
	        }
	   
	   

    });
	
	$("#retail").click(function()
	{
       if ($("#retail").prop('checked')==true)
	        { 
               $("#retail_drop").css("display","block") ;
	        }
	   if ($("#retail").prop('checked')==false)
	        {
		       $("#retail_drop").css("display","none") ;
	        }
	   
	   

    });
	
	$("#club").click(function()
	{
       if ($("#club").prop('checked')==true)
	        { 
               $("#club_drop").css("display","block") ;
	        }
	   if ($("#club").prop('checked')==false)
	        {
		       $("#club_drop").css("display","none") ;
	        }
	   
	   

    });
	
	
	$("#other").click(function()
	{
       if ($("#other").prop('checked')==true)
	        { 
               $("#other_hide").css("display","block") ;
	        }
	   if ($("#other").prop('checked')==false)
	        {
		       $("#other_hide").css("display","none") ;
	        }
	   
	   

    });
	
	

	
});
</script>

<script>
$(document).ready(function(){
	$("#hotal_drop").change(function()
	{
	      var hotal_value=$("#hotal_value").val();
		  
				
				 if(hotal_value=='Other'){
						 $("#hotal_hide").css("display", "block");
					 }else{
						 $("#hotal_hide").css("display", "none");
						 
						 }
				
				
				
    });
	$("#restaurant_drop").change(function(){
		  var resturant_value=$("#interior_value").val();
		  if(resturant_value=='Other'){
						 $("#resturant_hide").css("display", "block");
					 }else{
						 $("#resturant_hide").css("display", "none").hide();
						 
						 }
    });	
	$("#house_drop").change(function(){
		var house_value=$("#house_value").val();
		  
		   if(house_value=='Other'){
						 $("#house_hide").css("display", "block");
					 }else{
						 $("#house_hide").css("display", "none");
						 
						 }
		  
		  
    });	
	$("#hospital_drop").change(function(){
		var hospital_value=$("#hospital_value").val();
	
		  
		  if(hospital_value=='Other'){
						 $("#hospital_hide").css("display", "block");
					 }else{
						 $("#hospital_hide").css("display", "none");
						 
						 }

		  
    });
    $("#mall_drop").change(function(){
		  var mall_value=$("#mall_value").val();
		 
		  if(mall_value=='Other'){
						 $("#mall_hide").css("display", "block");
					 }else{
						 $("#mall_hide").css("display", "none");
						 
						 }

		  
    });
	$("#office_drop").change(function(){
		var office_value=$("#office_value").val();
 
		   if(office_value=='Other'){
						 $("#office_hide").css("display", "block");
					 }else{
						 $("#office_hide").css("display", "none");
						 
						 }

		  
    });
	$("#club_drop").change(function(){
		var club_value=$("#club_value").val();
		  
		   if(club_value=='Other'){
						 $("#club_hide").css("display", "block");
					 }else{
						 $("#club_hide").css("display", "none");
						 
						 }

		  
    });
  $("#retail_drop").change(function(){
		var retail_value=$("#retail_value").val();
		
					  if(retail_value=='Other'){
						 $("#retail_hide").css("display", "block");
					 }else{
						 $("#retail_hide").css("display", "none");
						 
						 }

			  
    });
  $("#add_name").click(function(){
		  //$("#alternate_person").css("display", "block");
		  $("#alternate_person").toggle();
    });
$("#add_mobile").click(function(){
		  //$("#alternate_mobile").css("display", "block");
		  $("#alternate_mobile").toggle();
    });
	$("#add_email").click(function(){
		 // $("#alternate_email").css("display", "block");
		  $("#alternate_email").toggle();
    });
	
	
	
});
</script>










<?php  // print_r($error_date); die(); ?>


<style>
.btn-group, .btn-group-vertical {
    margin: 0 2px 5px 0;
}
</style>
</head>

<body style="background:white"> 
<center><p style="color:green"><?php  if(isset($upload_success)) echo $upload_success;else{ echo $upload_error;}?></p></center> 
<div class="container" style="margin-top:40px">
<form action="<?php echo base_url('backend/add_query_form'); ?>" class="form-horizontal" novalidate enctype="multipart/formdata" method="post" >


<!--All Fields store into this div with class wrapper1 -->
	
	<div class="form-group">
      <label class="col-sm-3 control-label">Contact Person Name <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text"  name="name" id="name" value="<?php if($this->input->post('name')){echo $this->input->post('name') ;}?>"   class="form-control" required aria-required="true"><span><input type="button" value="Add More" id="add_name"></span>
        <em style="color:red;font-size:12px"><?php  echo form_error('name'); ?></em>
		<em class="errorname" style="color:red;font-size:12px"></em>
	  </div>
    </div>
  
  <div class="form-group" style="display:none" id="alternate_person">
      <label class="col-sm-3 control-label">Alternate Contact Person <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text"  name="alternate_name" id="alternate_name" value="<?php if($this->input->post('alternate_name')){echo $this->input->post('alternate_name') ;}?>"   class="form-control" required aria-required="true"></span>
        <em style="color:red;font-size:12px"><?php  echo form_error('alternate_name'); ?></em>
		<em class="errorname" style="color:red;font-size:12px"></em>
	  </div>
    </div>
	
	
	  
    <div class="form-group">
      <label class="col-sm-3 control-label">Contact Number(Mobile)<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="mobile" maxlength="10" id="mobile" value="<?php if($this->input->post('mobile')){echo $this->input->post('mobile') ;}?>" onkeypress='return event.charCode >=48 && event.charCode <=57' class="form-control" required aria-required="true"><span><input type="button" id="add_mobile" value="Add More">
        <em style="color:red;font-size:12px"><?php  echo form_error('mobile'); ?></em> 
	   <em class="errormobile" style="color:red;font-size:12px"></em>
	   </div>
    </div>
	
	<div class="form-group" style="display:none" id="alternate_mobile">
      <label class="col-sm-3 control-label">Alternate Contact<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="alternate_mobile"  maxlength="10" id="mobile" value="<?php if($this->input->post('mobile')){echo $this->input->post('mobile') ;}?>" onkeypress='return event.charCode >=48 && event.charCode <=57' class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('alternate_mobile'); ?></em> 
	   <em class="errormobile" style="color:red;font-size:12px"></em>
	   </div>
    </div>
	
	
   
   
   
    <div class="form-group">
      <label class="col-sm-3 control-label">Contact number(Landline) <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="landline" id="landline" value="<?php if($this->input->post('landline')){echo $this->input->post('landline') ;}?>" class="form-control" required aria-required="true">
       <em style="color:red;font-size:12px"><?php  echo form_error('mobile'); ?></em>
	   <em class="errorlandline" style="color:red;font-size:12px"></em>
	  </div>
    </div>
   
    <div class="form-group">
      <label class="col-sm-3 control-label">Email ID <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="email" name="email"  id="email" value="<?php if($this->input->post('email')){echo $this->input->post('email') ;}?>" class="form-control" required aria-required="true"><span><input type="button" id="add_email" value="Add More" value="Add More"></span>
        <em style="color:red;font-size:12px"><?php  echo form_error('email'); ?></em>
	    <em class="erroremail" style="color:red;font-size:12px"></em>
	  </div>
    </div>
	<div class="form-group" style="display:none" id="alternate_email">
      <label class="col-sm-3 control-label">Alternate Email<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="email" name="alternate_email"  id="alternate_email" value="<?php if($this->input->post('alternate_email')){echo $this->input->post('alternate_email') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('alternate_email'); ?></em>
	    <em class="erroremail" style="color:red;font-size:12px"></em>
	  </div>
    </div>
	
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Company Name<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="comp_name" id="comp_name" value="<?php if($this->input->post('comp_name')){echo $this->input->post('comp_name') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('comp_name'); ?></em>
	    <em class="errorcompany" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label nopaddingtop">Address <span class="text-danger">*</span></label>
      <div class="col-sm-9">
		<textarea rows="5" class="form-control" name="address" id="address">
		<?php if($this->input->post('address')){echo $this->input->post('address') ;}?>
		
		</textarea>
        <em style="color:red;font-size:12px"><?php  echo form_error('address'); ?></em>
		<em class="erroraddress" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">State/city <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="state_city" id="state_city" value="<?php if($this->input->post('state_city')){echo $this->input->post('state_city') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('state_city'); ?></em>
		<em class="errorstatecity" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Region<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="region" id="region" value="<?php if($this->input->post('region')){echo $this->input->post('region') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('region'); ?></em>
		<em class="errorregion" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Relationship Manager<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="relat_manager"id="relat_manager" value="<?php if($this->input->post('relat_manager')){echo $this->input->post('relat_manager') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('relat_manager'); ?></em>
		<em class="errorrelatmanager" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Art Researcher <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="art_researcher" id="art_researcher" value="<?php if($this->input->post('art_researcher')){echo $this->input->post('art_researcher') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('art_researcher'); ?></em>
		<em class="errorartresearcher" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-3 control-label nopaddingtop">Property type <span class="text-danger">*</span></label>
        <div class="col-sm-9">
                <label class="ckbox ckbox-inline mr20">
<input type="checkbox"  value="Hotel"  id="hotal" name="property_type[]"  <?php if($this->input->post('property_type')=='Restaurant'){echo 'checked';}?>>
                    <span>Hotel</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
                    <input type="checkbox"  value="Restaurant"  id="restaurant" name="property_type[]"
                    <?php if($this->input->post('property_type')=='Restaurant'){echo 'checked';}?>
                    >
                    <span>Restaurant</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
                    <input type="checkbox"  value="cafe"  id="cafe" name="property_type[]" >
                    <span>Cafe</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
                    <input type="checkbox" value="House"  id="house" name="property_type[]" >
                    <span>House</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
                    <input type="checkbox"  value="Hospital"  id="hospital" name="property_type[]" >
                    <span>Hospital</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
                    <input type="checkbox" value="Mall"  id="mall" name="property_type[]" >
                    <span>Mall</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
                    <input type="checkbox" value="Office"  id="office" name="property_type[]" >
                    <span>Office</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
                    <input type="checkbox"value="Club" id="club" name="property_type[]" >
                    <span>Club</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
                    <input type="checkbox" value="Retail Outlet"  id="retail" name="property_type[]" >
                    <span>Retail Outlet</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
                    <input type="checkbox" value="Other"  id="other" name="property_type[]" >
                    <span>Other</span>
                </label>
        </div>
    </div> 
    
 <div class="form-group">
<label class="col-sm-3 control-label">Place of display <span class="text-danger">*</span></label>
   <div class="col-sm-9">
      <div class="btn-group" id="hotal_drop" style="display:none" >
        <select name="place_of_display[]" id="hotal_value" class="form-control" required="required">
 <option value="">Select Hotal</option>
  <option value="Bedroom">Bedroom</option>
  <option value="Bath" >Bath</option>
  <option value="Lobby">Lobby</option>
  <option value="Corridor">Corridor</option>
  <option value="Reception">Reception</option>
  <option value="Roof" >Roof</option>
  <option value="Waiting Area" >Waiting Area</option>
  <option value="Other">Other</option>
       

         
         </select>
        </div>
      
        <div class="btn-group" id="restaurant_drop" style="display:none">
            <select  name="place_of_display[]"  id="interior_value" class="form-control" required="required">
                <option value="">Select Resturant</option>
                <option value="Interior" >Interior</option>
                <option value="Exterior" >Exterior</option>
                <option value="Washroom" >Washroom</option>
                <option value="Kitchen" >Kitchen</option>
                <option value="Other">Other</option>
               
            </select>
        </div>
        
        <div class="btn-group" id="cafe_drop" style="display:none">
            <select  name="place_of_display[]" id="cafe_value" class="form-control" required="required"  style="display:none">
                <option value="">Select Cafe</option>
                <option value="Interior">Interior</option>
                <option value="Exterior">Exterior</option>
                <option value="Washroom">Washroom</option>
                <option value="Interior">Kitchen</option>
                <option value="Other">Other</option>
                 
           </select>
        </div>
        
        <div class="btn-group" id="house_drop" style="display:none">
            <select  name="place_of_display[]" id="house_value" class="form-control" required="required">
                <option value="">Select House</option>
                <option value="Bedroom" >Bedroom</option>
                <option value="Bath">Bath</option>
                <option value="Kitchen">Kitchen</option>
                <option value="Drawing">Drawing</option>
                <option value="Other">Other</option>

            </select>
        </div>
        
        <div class="btn-group" id="hospital_drop" style="display:none">
            <select  name="place_of_display[]" id="hospital_value" class="form-control" required="required">
                <option value="" >Select Hosptal</option>

                <option value="Bedroom">Rooms</option>
                <option value="Corridor">Corridor</option>
                <option value="Lift Lobby">Lift Lobby</option>
                <option value="Waiting Area">Waiting Area</option>
                <option value="Reception">Reception</option>
                <option value="Canteen">Canteen</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <div class="btn-group" id="mall_drop" style="display:none">
            <select  name="place_of_display[]" class="form-control" id="mall_value" required="required">
                <option value="">Select Mall</option>
                <option value="Corridor">Corridor</option>
                <option value="Parking">Parking</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <div class="btn-group" id="office_drop" style="display:none">
            <select name="place_of_display[]" class="form-control"  id="office_value"required="required">
                <option value="">Select Room</option>
                <option value="Rooms" >Rooms</option>
                <option value="Waiting Area">Waiting Area</option>
                <option value="Kitchen">Kitchen</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <div class="btn-group" id="club_drop" style="display:none">
            <select name="place_of_display[]" class="form-control" id="club_value" required="required">
                <option value="">Select Club</option>
                <option value="Bar Counter">Bar Counter</option>
                <option value="Pillar">Pillar</option>
                <option value="Interior Walls">Interior Walls</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <div class="btn-group" id="retail_drop" style="display:none">
            <select  name="place_of_display[]" class="form-control"  id="retail_value" required="required">
                <option value="">Select Retail Outlet </option>
                <option value="Interior">Interior</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <!-------------->
        
        <div class="btn-group" id="other_drop" style="display:none">
            <select name="place_of_display[]" class="form-control" required="required">
                <option value="">SELECT</option>
                <option value="Other">Other</option>
                
            </select>
        </div>
      </div>
      
    </div>
    
    
    
    
    
    
    
    
    
    
    

    <div class="form-group" id="hotal_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="hotal_other_value" value="<?php if($this->input->post('hotal_other_value')){echo $this->input->post('hotal_other_value') ;}?>" class="form-control" required aria-required="true" placeholder="Enter Hotal Other Value">
        <em style="color:red;font-size:12px"><?php  echo form_error('hotal_other_value'); ?></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
<div class="form-group" id="resturant_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="resturant_other_value" value="" class="form-control" required aria-required="true" placeholder="Enter Resturant Other Value">
        <em style="color:red;font-size:12px"></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    
    <div class="form-group" id="house_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="resturant_other_value" value="" class="form-control" required aria-required="true" placeholder="Enter House Other Value">
        <em style="color:red;font-size:12px"></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>


 <div class="form-group" id="hospital_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="hospital_other_value" value="" class="form-control" required aria-required="true" placeholder="Enter Hospital Other Value">
        <em style="color:red;font-size:12px"></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    


<div class="form-group" id="mall_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="mall_other_value" value="" class="form-control" required aria-required="true" placeholder="Enter Mall Other Value">
        <em style="color:red;font-size:12px"></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    
    <div class="form-group" id="office_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="office_other_value" value="" class="form-control" required aria-required="true" placeholder="Enter Office Other Value">
        <em style="color:red;font-size:12px"></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    


<div class="form-group" id="club_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="club_other_value" value="" class="form-control" required aria-required="true" placeholder="Enter Club Other Value">
        <em style="color:red;font-size:12px"></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group" id="retail_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="retail_other_value" value="" class="form-control" required aria-required="true" placeholder="Enter Retail Outlet Other Value">
        <em style="color:red;font-size:12px"></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    
    
    <div class="form-group" id="other_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="other_other_value"  class="form-control" required aria-required="true" placeholder="Enter Other Value">
        <em style="color:red;font-size:12px"></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>

    
    
    
    
    
    
    
    
    
    
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Size Of Wall <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="size_of_wall" id="size_of_wall" value="<?php if($this->input->post('size_of_wall')){echo $this->input->post('size_of_wall') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('size_of_wall'); ?></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Color of Wall <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="color_of_wall" id="color_of_wall" value="<?php if($this->input->post('color_of_wall')){echo $this->input->post('color_of_wall') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('color_of_wall'); ?></em>
		<em class="errorcolorofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Size of Art <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="size_of_art" id="size_of_art" value="<?php if($this->input->post('size_of_art')){echo $this->input->post('size_of_art') ;}?>" class="form-control" required aria-required="true">
       <em style="color:red;font-size:12px"><?php  echo form_error('size_of_art'); ?></em>
	   <em class="errorsizeofart" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Number of Place of display <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="display_place" id="display_place" value="<?php if($this->input->post('display_place')){echo $this->input->post('display_place') ;}?>" class="form-control"  required="" aria-required="true">
        <em style="color:red;font-size:12px"><?php // echo form_error('display_place'); ?></em>
		
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Total Number of Art Products <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text"  name="total_arts" id="total_arts" value="<?php if($this->input->post('total_arts')){echo $this->input->post('total_arts') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('total_arts'); ?></em>
		<em class="errortotalarts" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Orientation <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text"  name="orientation"id="orientation" value="<?php if($this->input->post('orientation')){echo $this->input->post('orientation') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('orientation'); ?></em>
		<em class="errororientation" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Budget per artwork <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="bud_per_work" id="bud_per_work" value="<?php if($this->input->post('bud_per_work')){echo $this->input->post('bud_per_work') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('bud_per_work'); ?></em>
		<em class="errorbudperwork" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Total Budget <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text"  name="total_budget" id="total_budget" value="<?php if($this->input->post('total_budget')){echo $this->input->post('total_budget') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('total_budget'); ?></em>
		<em class="errortotalbudget" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Creative Details <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="creative_details" id="creative_details" value="<?php if($this->input->post('creative_details')){echo $this->input->post('creative_details') ;}?>" id="creative_details" class="form-control" required="" aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('creative_details'); ?></em>
		<em class="errorcreativedetails" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">General theme <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="general_theme" id="general_theme" value="<?php if($this->input->post('general_theme')){echo $this->input->post('general_theme') ;}?>" class="form-control" required aria-required="true">
       <em style="color:red;font-size:12px"><?php  echo form_error('general_theme'); ?></em>
	   <em class="errorgeneraltheme" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Source type <span class="text-danger">*</span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
            <select  class="form-control"  name="source_type"  id="source_type"required="required">
                <option valu="">Choose One:</option>
	 <option value="Photography"<?php if($this->input->post('source_type')=="Photography"){ echo 'selected'; } ?>>Photography</option>
	 <option value="Painting"<?php if($this->input->post('source_type')=="Painting"){ echo 'selected'; } ?>>Painting</option>
	 <option value="Illustration"<?php if($this->input->post('source_type')=="Illustration"){ echo 'selected'; } ?>>Illustration</option>
	 <option value="Poster"<?php if($this->input->post('source_type')=="Poster"){ echo 'selected'; } ?>>Poster</option>
	 <option value="Any Other"<?php if($this->input->post('source_type')=="Any Other"){ echo 'selected'; } ?>>Any Other</option>


              </select>
        </div>
        

      </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Date of 1st submission <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="date" name="date_of_submission" id="date_of_submission" value="<?php if($this->input->post('date_of_submission')){echo $this->input->post('date_of_submission') ;}?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('date_of_submission'); ?></em>
        <em style="color:red;font-size:12px"><?php if(isset($error_date)) echo $error_date;?></em>
        

		<em class="errordateofsubmission" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    
    
    
    
    <hr>
    
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
          <button class="btn btn-success btn-quirk btn-wide mr5" name="submit" id="submit">Submit</button>
          <button type="reset" class="btn btn-quirk btn-wide btn-default">Reset</button>
		  <a href="<?php   echo base_url('backend/show_query');?>">View List</a>
		  
        </div>
    </div>
</form>

</div>
</body>
</html>



