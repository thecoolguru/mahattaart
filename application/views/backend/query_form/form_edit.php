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
$(document).ready(function()
{
    $("#hotal").click(function(){
        $("#hotal_drop").toggle();
    });
  
  $("#restaurant").click(function(){
        $("#restaurant_drop").toggle();
    });
	
	$("#cafe").click(function(){
        $("#cafe_drop").toggle();
    });
	
	
	$("#house").click(function(){
        $("#house_drop").toggle();
    });
	$("#hospital").click(function(){
        $("#hospital_drop").toggle();
    });
	$("#mall").click(function(){
        $("#mall_drop").toggle();
    });
	
	$("#office").click(function(){
        $("#office_drop").toggle();
    });
	
	$("#retail").click(function(){
        $("#retail_drop").toggle();
    });
	
	$("#club").click(function(){
        $("#club_drop").toggle();
    });
	$("#other").click(function(){
        $("#other_hide").toggle();
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
	
	$("#cafe_drop").change(function(){
		  var cafe_value=$("#cafe_value").val();
		  if(cafe_value=='Other'){
						 $("#cafe_hide").css("display", "block");
					 }else{
						 $("#cafe_hide").css("display", "none").hide();
						 
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
		  $("#alternate_person").css("display", "block");
    });
$("#add_mobile").click(function(){
		  $("#alternate_mobile").css("display", "block");
    });
	$("#add_email").click(function(){
		  $("#alternate_email").css("display", "block");
    });
});
</script>



<script>

$(document).ready(function(){
    
    if ($("#hotal").prop('checked')==true)
	{ 
      $("#hotal_drop").css("display", "block") ;
	}
	if ($("#restaurant").prop('checked')==true)
	{ 
      $("#restaurant_drop").css("display", "block") ;
	}
	
	if ($("#cafe").prop('checked')==true)
	{ 
      $("#cafe_drop").css("display", "block") ;
	}
	
	if ($("#house").prop('checked')==true)
	{ 
      $("#house_drop").css("display", "block") ;
	}
	if ($("#mall").prop('checked')==true)
	{ 
      $("#mall_drop").css("display", "block") ;
	}
	
	if ($("#office").prop('checked')==true)
	{ 
      $("#office_drop").css("display", "block") ;
	}
	if ($("#club").prop('checked')==true)
	{ 
      $("#club_drop").css("display", "block") ;
	}
	
	if ($("#retail").prop('checked')==true)
	{ 
      $("#retail_drop").css("display", "block") ;
	}
	if ($("#hospital").prop('checked')==true)
	{ 
      $("#hospital_drop").css("display", "block") ;
	}
    if ($("#cafe").prop('checked')==true)
	{ 
      $("#cafe_drop").css("display", "block") ;
	}
	
	if ($("#other").prop('checked')==true)
	{ 
      $("#other_hide").css("display", "block") ;
	}
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
<form action="<?php echo base_url('backend/edit_record/'.$result[0]->id); ?>" class="form-horizontal" novalidate enctype="multipart/formdata" method="post" >


<!--All Fields store into this div with class wrapper1 -->
	
   
    
    <div class="form-group"  id="alternate_person">
      <label class="col-sm-3 control-label">Name <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text"  name="name" id="name" value="<?php echo $result[0]->contact_person;?>"   class="form-control" required aria-required="true"></span>
        	  </div>
    </div>
	
  
  <div class="form-group"  id="alternate_person">
      <label class="col-sm-3 control-label">Alternate Contact Person <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text"  name="alternate_name" id="alternate_name" value="<?php echo $result[0]->alternate_name;?>"   class="form-control" required aria-required="true"></span>
        	  </div>
    </div>
	
	
	  
    <div class="form-group">
      <label class="col-sm-3 control-label">Contact Number(Mobile)<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="mobile" id="mobile" value="<?php echo $result[0]->contact_number;?>" onkeypress='return event.charCode >=48 && event.charCode <=57' class="form-control" maxlength="10"  required aria-required="true">     
       <em style="color:red;font-size:12px"><?php  echo form_error('mobile'); ?></em> 
	   <em class="errormobile" style="color:red;font-size:12px"></em>
	   </div>
    </div>
	
	<div class="form-group"  id="alternate_mobile">
      <label class="col-sm-3 control-label">Alternate Contact<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="alternate_mobile"  id="mobile" value="<?php echo $result[0]->alternate_contact;?>" onkeypress='return event.charCode >=48 && event.charCode <=57' class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('alternate_mobile'); ?></em> 
	   <em class="errormobile" style="color:red;font-size:12px"></em>
	   </div>
    </div>
	
	
   
   
   
    <div class="form-group">
      <label class="col-sm-3 control-label">Contact Number(Landline) <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text"  name="landline" id="landline" value="<?php echo $result[0]->landline_number;?>" onkeypress='return event.charCode >=48 && event.charCode <=57' class="form-control" required aria-required="true" maxlength="10">
       <em style="color:red;font-size:12px"><?php  echo form_error('mobile'); ?></em>
	   <em class="errorlandline" style="color:red;font-size:12px"></em>
	  </div>
    </div>
   
    <div class="form-group">
      <label class="col-sm-3 control-label">Email ID <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="email" name="email"  id="email" value="<?php echo $result[0]->	email;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('email'); ?></em>
	    <em class="erroremail" style="color:red;font-size:12px"></em>
	  </div>
    </div>
	<div class="form-group" id="alternate_email">
      <label class="col-sm-3 control-label">Alternate Email<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="email" name="alternate_email"  id="alternate_email" value="<?php echo $result[0]->alternate_email;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('alternate_email'); ?></em>
	    <em class="erroremail" style="color:red;font-size:12px"></em>
	  </div>
    </div>
	
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Company Name<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="comp_name" id="comp_name" value="<?php echo $result[0]->company_name;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('comp_name'); ?></em>
	    <em class="errorcompany" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label nopaddingtop">Address <span class="text-danger"></span></label>
      <div class="col-sm-9">
		<textarea rows="5" class="form-control" name="address" id="address"  required="" style="resize:none" aria-required="true">
		<?php echo $result[0]->address;?>
		
		</textarea>
        <em style="color:red;font-size:12px"><?php  echo form_error('address'); ?></em>
		<em class="erroraddress" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">State/city <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="state_city" id="state_city" value="<?php echo $result[0]->state_city;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('state_city'); ?></em>
		<em class="errorstatecity" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Region<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="region" id="region" value="<?php echo $result[0]->region;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('region'); ?></em>
		<em class="errorregion" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Relationship Manager<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="relat_manager"id="relat_manager" value="<?php echo $result[0]->relationship_manager;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('relat_manager'); ?></em>
		<em class="errorrelatmanager" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Client Servicing <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="art_researcher" id="art_researcher" value="<?php echo $result[0]->art_researcher;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('art_researcher'); ?></em>
		<em class="errorartresearcher" style="color:red;font-size:12px"></em>
	  </div>
    </div>
     <?php 
	  
	  $val=explode(',',$result[0]->Property_types);
	  $val2=explode(',',$result[0]->place_of_display);
	  $properties = array();
	  if(count($val) == count($val2)) {
		  for($i = 0; $i < count($val); $i++) {
			  $properties[$val[$i]] = $val2[$i];		  	
		  }
	  }

	 
	  for($i=0;$i<count($val);$i++)
	  {
		   if($val[$i]=='Hotel')  
	          {
	              $ds='Hotel';
	          }	 
	
	  
	  }
	  
	 if(array_search('Restaurant',$val))
	     {
		  $Restaurant="Restaurant";
		 
      }
	  if(array_search('Cafe',$val)){
		  $Cafe="Cafe";
	  }
	   if(array_search('House',$val)){
		  $House="House";
	  }
	   if(array_search('Hospital',$val)){ 
		  $Hospital="Hospital";
		 

	  }	  
	 if(array_search('Mall',$val)){
		  $Mall="Mall";
	  }
	     if(array_search('Office',$val)){
		  $Office="Office";
	  }
	     if(array_search('Club',$val)){
		  $Club="Club";
	  }
	   if(array_search('Retail Outlet',$val)){
		  $Retail_Outlet="Retail Outlet";
	  }
	   if(array_search('Other',$val)){
		  $Other="Other";
	  }
	?>
    
    <div class="form-group">
        <label class="col-sm-3 control-label nopaddingtop">Property type <span class="text-danger"></span></label>
        
       
         <div class="col-sm-9">
                <label class="ckbox ckbox-inline mr20">
<input type="checkbox"  value="Hotel" id="hotal" name="property_type[]"<?php if($ds=='Hotel'){echo 'checked';}?>>
                    <span>Hotel</span>
                </label>
                  <label class="ckbox ckbox-inline mr20">
<input type="checkbox"  value="Restaurant" id="restaurant" name="property_type[]"<?php if($Restaurant=='Restaurant'){echo 'checked';}?>>
                    <span>Restaurant</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
<input type="checkbox"  value="Cafe"  id="cafe" name="property_type[]"<?php if($Cafe=='Cafe'){echo 'checked';}?>>
                    <span>Cafe</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
<input type="checkbox" value="House" id="house" name="property_type[]"<?php if($House=='House'){echo 'checked';}?>>
                    <span>House</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
<input type="checkbox"  value="Hospital" id="hospital" name="property_type[]"<?php if($Hospital=='Hospital'){echo 'checked';}?>>
                    <span>Hospital</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
<input type="checkbox" value="Mall"  id="mall" name="property_type[]"<?php if($Mall=='Mall'){echo 'checked';}?>>
                    <span>Mall</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
<input type="checkbox" value="Office"  id="office" name="property_type[]"<?php if($Office=='Office'){echo 'checked';}?>>
                    <span>Office</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
<input type="checkbox"value="Club"  id="club" name="property_type[]"<?php if($Club=='Club'){echo 'checked';}?>>
                    <span>Club</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
<input type="checkbox" value="Retail Outlet" id="retail" name="property_type[]"<?php if($Retail_Outlet=='Retail Outlet'){echo 'checked';}?>>
                    <span>Retail Outlet</span>
                </label>
                <label class="ckbox ckbox-inline mr20">
 <input type="checkbox" value="Other"	 id="other" name="property_type[]"<?php if($Other=='Other'){echo 'checked';}?>>
                    <span>Other</span>
                </label>
        </div>
     </div> 

     
  <div class="form-group">
<label class="col-sm-3 control-label">Place of display <span class="text-danger"></span></label>
   <div class="col-sm-9">

      <div class="btn-group" id="hotal_drop" style="display:none" >
      <?php
 		//var_dump($properties);
	  ?>
 

      
        <select name="place_of_display[]" id="hotal_value" class="form-control" required="required">
  <option value="" >Select Hotal</option>
  <option value="Bedroom" <?php  if(isset($properties['Hotel']) && $properties['Hotel'] == "Bedroom") echo "selected"; ?>>Bedroom</option>
  <option value="Bath" <?php  if(isset($properties['Hotel']) && $properties['Hotel'] == "Bath") echo "selected"; ?>>Bath</option>
  <option value="Lobby" <?php  if(isset($properties['Hotel']) && $properties['Hotel'] == "Lobby") echo "selected"; ?>>Lobby</option>
  <option value="Corridor"<?php  if(isset($properties['Hotel']) && $properties['Hotel'] == "Corridor") echo "selected"; ?>>Corridor</option>
  <option value="Reception"<?php  if(isset($properties['Hotel']) && $properties['Hotel'] == "Reception") echo "selected"; ?>>Reception</option>
  <option value="Roof" <?php  if(isset($properties['Hotel']) && $properties['Hotel'] == "Roof") echo "selected"; ?> >Roof</option>
  <option value="Waiting_Area"<?php  if(isset($properties['Hotel']) && $properties['Hotel'] == "Waiting Area") echo "selected"; ?>>Waiting Area</option>
  <option value="Other"<?php  if(isset($properties['Hotel']) && $properties['Hotel'] == "Other") echo "selected"; ?>>Other</option>
       

         
         </select>
        </div>
      
        <div class="btn-group" id="restaurant_drop" style="display:none">
            <select  name="place_of_display[]"  id="interior_value" class="form-control" required="required">
                <option value="">Select Resturant</option>
                <option value="Interior" <?php  if(isset($properties['Restaurant']) && $properties['Restaurant'] == "Interior") echo "selected"; ?>>Interior</option>
                <option value="Exterior" <?php  if(isset($properties['Restaurant']) && $properties['Restaurant'] == "Exterior") echo "selected"; ?>>Exterior</option>
                <option value="Washroom" <?php  if(isset($properties['Restaurant']) && $properties['Restaurant'] == "Washroom") echo "selected"; ?>>Washroom</option>
                <option value="Kitchen" <?php  if(isset($properties['Restaurant']) && $properties['Restaurant'] == "Kitchen") echo "selected"; ?>>Kitchen</option>
                <option value="Other" <?php  if(isset($properties['Restaurant']) && $properties['Restaurant'] == "Other") echo "selected"; ?>>Other</option>
               
            </select>
        </div>
        
        <div class="btn-group" id="cafe_drop" style="display:none">
            <select  name="place_of_display[]" id="cafe_value" class="form-control" required="required">
                <option value="">Select Cafe</option>
                <option value="Interior" <?php  if(isset($properties['Cafe']) && $properties['Cafe'] == "Interior") echo "selected"; ?>>Interior</option>
                <option value="Exterior" <?php  if(isset($properties['Cafe']) && $properties['Cafe'] == "Exterior") echo "selected"; ?>>Exterior</option>
                <option value="Washroom" <?php  if(isset($properties['Cafe']) && $properties['Cafe'] == "Washroom") echo "selected"; ?>>Washroom</option>
                <option value="Interior" <?php  if(isset($properties['Cafe']) && $properties['Cafe'] == "Kitchen") echo "selected"; ?>>Kitchen</option>
                <option value="Other" <?php  if(isset($properties['Cafe']) && $properties['Cafe'] == "Other") echo "selected"; ?>>Other</option>
                 
           </select>
        </div>
        
        <div class="btn-group" id="house_drop" style="display:none">
            <select  name="place_of_display[]" id="house_value" class="form-control" required="required">
                <option value="">Select House</option>
                <option value="Bedroom" <?php  if(isset($properties['House']) && $properties['House'] == "Bedroom") echo "selected"; ?>>Bedroom</option>
                <option value="Bath" <?php  if(isset($properties['House']) && $properties['House'] == "Bath") echo "selected"; ?>>Bath</option>
                <option value="Kitchen" <?php  if(isset($properties['House']) && $properties['House'] == "Kitchen") echo "selected"; ?>>Kitchen</option>
                <option value="Drawing" <?php  if(isset($properties['House']) && $properties['House'] == "Drawing") echo "selected"; ?>>Drawing</option>
                <option value="Other" <?php  if(isset($properties['House']) && $properties['House'] == "Other") echo "selected"; ?>>Other</option>

            </select>
        </div>
        
        <div class="btn-group" id="hospital_drop" style="display:none">
            <select  name="place_of_display[]" id="hospital_value" class="form-control" required="required">
                <option value="" >Select Hosptal</option>

                <option value="Bedroom" <?php  if(isset($properties['Hospital']) && $properties['Hospital'] == "Rooms") echo "selected"; ?>>Rooms</option>
                <option value="Corridor" <?php  if(isset($properties['Hospital']) && $properties['Hospital'] == "Corridor") echo "selected"; ?>>Corridor</option>
                <option value="Lift Lobby" <?php  if(isset($properties['Hospital']) && $properties['Hospital'] == "Lift Lobby") echo "selected"; ?>>Lift Lobby</option>
                <option value="Waiting Area" <?php  if(isset($properties['Hospital']) && $properties['Hospital'] == "Waiting Area") echo "selected"; ?>>Waiting Area</option>
                <option value="Reception" <?php  if(isset($properties['Hospital']) && $properties['Hospital'] == "Reception") echo "selected"; ?>>Reception</option>
                <option value="Canteen" <?php  if(isset($properties['Hospital']) && $properties['Hospital'] == "Canteen") echo "selected"; ?>>Canteen</option>
                <option value="Other" <?php  if(isset($properties['Hospital']) && $properties['Hospital'] == "Other") echo "selected"; ?>>Other</option>
            </select>
        </div>
        
        <div class="btn-group" id="mall_drop" style="display:none">
            <select  name="place_of_display[]" class="form-control" id="mall_value" required="required">
                <option value="">Select Mall</option>
                <option value="Corridor" <?php  if(isset($properties['Mall']) && $properties['Mall'] == "Corridor") echo "selected"; ?>>Corridor</option>
                <option value="Parking" <?php  if(isset($properties['Mall']) && $properties['Mall'] == "Parking") echo "selected"; ?>>Parking</option>
                <option value="Other" <?php  if(isset($properties['Mall']) && $properties['Mall'] == "Other") echo "selected"; ?>>Other</option>
            </select>
        </div>
        
        <div class="btn-group" id="office_drop" style="display:none">
            <select name="place_of_display[]" class="form-control"  id="office_value"required="required">
                <option value="">Select Office</option>
                <option value="Rooms" <?php  if(isset($properties['Office']) && $properties['Office'] == "Rooms") echo "selected"; ?>>Rooms</option>
                <option value="Waiting Area" <?php  if(isset($properties['Office']) && $properties['Office'] == "Waiting Area") echo "selected"; ?>>Waiting Area</option>
                <option value="Kitchen" <?php  if(isset($properties['Office']) && $properties['Office'] == "Kitchen") echo "selected"; ?>>Kitchen</option>
                <option value="Other" <?php  if(isset($properties['Office']) && $properties['Office'] == "Other") echo "selected"; ?>>Other</option>
            </select>
        </div>
        
        <div class="btn-group" id="club_drop" style="display:none">
            <select name="place_of_display[]" class="form-control" id="club_value" required="required">
                <option value="">Select Club</option>
                <option value="Bar Counter" <?php  if(isset($properties['Club']) && $properties['Club'] == "Bar Counter") echo "selected"; ?>>Bar Counter</option>
                <option value="Pillar" <?php  if(isset($properties['Club']) && $properties['Club'] == "Pillar") echo "selected"; ?>>Pillar</option>
                <option value="Interior Walls" <?php  if(isset($properties['Club']) && $properties['Club'] == "Interior Walls") echo "selected"; ?>>Interior Walls</option>
                <option value="Other" <?php  if(isset($properties['Club']) && $properties['Club'] == "Other") echo "selected"; ?>>Other</option>
            </select>
        </div>
        
        <div class="btn-group" id="retail_drop" style="display:none">
            <select  name="place_of_display[]" class="form-control"  id="retail_value" required="required">
                <option value="">Select Retail Outlet </option>
                <option value="Interior" <?php  if(isset($properties['Retail Outlet']) && $properties['Retail Outlet'] == "Interior") echo "selected"; ?>>Interior</option>
                <option value="Other" <?php  if(isset($properties['Retail Outlet']) && $properties['Retail Outlet'] == "Other") echo "selected"; ?>>Other</option>
            </select>
        </div>
        
        <!-------------->
        
        <div class="btn-group" id="other_drop" style="display:none">
            <select name="place_of_display[]" class="form-control" required="required">
                <option value="">SELECT</option>
                <option value="Other" <?php  if(isset($properties['Other']) && $properties['Other'] == "Other") echo "selected"; ?>>Other</option>                
            </select>
        </div>
      </div>
      
    </div>
    
        <div class="form-group" id="hotal_hide" style="display:none;">
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
    
    <div class="form-group" id="cafe_hide" style="display:none">
      <label class="col-sm-3 control-label"><span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="other_value[]" id="cafe_other_value"  class="form-control" placeholder="Enter Cafe Other Value">
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
    

<!-----------------------Hided Section----------------------->
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
        <input type="text" name="other_value[]" id="other_other_value" value="" class="form-control" required aria-required="true" placeholder="Enter Other Other Value">
        <em style="color:red;font-size:12px"></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>

    
    
    
    
    
    
    
    
    
    
   
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Size Of Wall <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="size_of_wall" id="size_of_wall" value="<?php echo $result[0]->wall_size;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('size_of_wall'); ?></em>
		<em class="errorsizeofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Color of Wall <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="color_of_wall" id="color_of_wall" value="<?php echo $result[0]->wall_color;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('color_of_wall'); ?></em>
		<em class="errorcolorofwall" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Size of Art <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="size_of_art" id="size_of_art" value="<?php echo $result[0]->art_size;?>" class="form-control" required aria-required="true">
       <em style="color:red;font-size:12px"><?php  echo form_error('size_of_art'); ?></em>
	   <em class="errorsizeofart" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Number of Place of display <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="display_place" id="display_place" value="<?php echo $result[0]->state_city;?>" class="form-control"  required="" aria-required="true">
        <em style="color:red;font-size:12px"><?php // echo form_error('display_place'); ?></em>
		
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Total Number of Art Products <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text"  name="total_arts" id="total_arts" value="<?php echo $result[0]->total_art_products;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('total_arts'); ?></em>
		<em class="errortotalarts" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Orientation <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text"  name="orientation"id="orientation" value="<?php echo $result[0]->orientation;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('orientation'); ?></em>
		<em class="errororientation" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Budget per artwork <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="bud_per_work" id="bud_per_work" value="<?php echo $result[0]->budget_per_work;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('bud_per_work'); ?></em>
		<em class="errorbudperwork" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Total Budget <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text"  name="total_budget" id="total_budget" value="<?php echo $result[0]->total_budget;?>" class="form-control" required aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('total_budget'); ?></em>
		<em class="errortotalbudget" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Creative Details <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="creative_details" id="creative_details" value="<?php echo $result[0]->creative_details;?>" id="creative_details" class="form-control" required="" aria-required="true">
        <em style="color:red;font-size:12px"><?php  echo form_error('creative_details'); ?></em>
		<em class="errorcreativedetails" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">General theme <span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="general_theme" id="general_theme" value="<?php echo $result[0]->general_theme;?>" class="form-control" required aria-required="true">
       <em style="color:red;font-size:12px"><?php  echo form_error('general_theme'); ?></em>
	   <em class="errorgeneraltheme" style="color:red;font-size:12px"></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Any Specific for general theme <span class="text-danger"></span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
  <select  class="form-control"  name="any_specific"  id="any_specific"required="required">
       <option valu="">Choose One:</option>
       <option value="Futurism"<?php if($result[0]->any_specific=='Futurism'){echo 'selected';} ?>>Futurism</option>
       <option value="Art_Nouveau"<?php if($result[0]->any_specific=='Art_Nouveau'){echo 'selected';} ?>>Art Nouveau</option>
       <option value="classicism"<?php if($result[0]->any_specific=='Art_Nouveau'){echo 'selected';} ?>>classicism</option> 
       <option value="cubism"<?php if($result[0]->any_specific=='cubism'){echo 'selected';} ?>>cubism</option>
       <option value="Expressionism"<?php if($result[0]->any_specific=='Expressionism'){echo 'selected';} ?>>Expressionism</option>
       <option value="Renaissance"<?php if($result[0]->any_specific=='Renaissance'){echo 'selected';} ?>>Renaissance</option>
       <option value="Baroque"<?php if($result[0]->any_specific=='Baroque'){echo 'selected';} ?>>Baroque</option>
       <option value="Beaux_Arts"<?php if($result[0]->any_specific=='Painting'){echo 'selected';} ?>>Beaux  Arts</option>
       <option value="Naturalism"<?php if($result[0]->any_specific=='Beaux_Arts'){echo 'selected';} ?>>Naturalism</option>
	   <option value="Mannerism"<?php if($result[0]->any_specific=='Mannerism'){echo 'selected';} ?>>Mannerism</option>
       <option value="Realism"<?php if($result[0]->any_specific=='Realism'){echo 'selected';} ?>>Realism</option>
       <option value="Rococo"<?php if($result[0]->any_specific=='Rococo'){echo 'selected';} ?>>Rococo</option>
       <option value="Symbolism"<?php if($result[0]->any_specific=='Symbolism'){echo 'selected';} ?>>Symbolism</option>
       <option value="Verism"<?php if($result[0]->any_specific=='Verism'){echo 'selected';} ?>>Verism</option>
       <option value="Romanticism"<?php if($result[0]->any_specific=='Romanticism'){echo 'selected';} ?>>Romanticism</option>
       <option value="Avant_Garde"<?php if($result[0]->any_specific=='Avant_Garde'){echo 'selected';} ?>>Avant Garde</option>


              </select>
        </div>
        

      </div>
    </div>
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Art Form<span class="text-danger"></span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
  <select  class="form-control"  name="art_form"  id="art_form"required="required">
  <option value="">Choose One:</option>
  <option value="Florals"<?php if($result[0]->art_form=='Florals'){echo 'selected';} ?>>Florals</option>
  <option value="Birds"<?php if($result[0]->art_form=='Birds'){echo 'selected';} ?>>Birds</option>
  <option value="Birds"<?php if($result[0]->art_form=='Scenic'){echo 'selected';} ?>>Scenic</option>
  <option value="Mannerism"<?php if($result[0]->art_form=='Nature'){echo 'selected';} ?>>Nature</option>
  <option value="Botanical"<?php if($result[0]->art_form=='Botanical'){echo 'selected';} ?>>Botanical</option>
  <option value="Ocean"<?php if($result[0]->art_form=='Ocean'){echo 'selected';} ?>>Ocean</option>
  <option value="Any"<?php if($result[0]->art_form=='Any'){echo 'selected';} ?>>Any</option>
     

              </select>
        </div>
        

      </div>
    </div>
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Artist<span class="text-danger"></span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
  <select  class="form-control"  name="artts"  id="artts"required="required">
  <option value="">Choose One:</option>
  <option value="Photographer" <?php if($result[0]->artitst=='Photographer'){echo 'selected';} ?>>Photographer</option>
  <option value="color" <?php if($result[0]->artitst=='color'){echo 'selected';} ?>>color</option>
  <option value="Other" <?php if($result[0]->artitst=='Other'){echo 'selected';} ?>>Other</option>
       </select>
        </div>
        

      </div>
    </div>
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Source type <span class="text-danger"></span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
            <select  class="form-control"  name="source_type"  id="source_type"required="required">
                <option value="">Choose One:</option>
	 <option value="Photography"<?php if($result[0]->source_types=='Photography'){echo 'selected';} ?>>Photography</option>
	 <option value="Painting"<?php if($result[0]->source_types=='Painting'){echo 'selected';} ?>>Painting</option>
	 <option value="Illustration"<?php if($result[0]->source_types=='Illustration'){echo 'selected';} ?>>Illustration</option>
	 <option value="Poster"<?php if($result[0]->source_types=='Poster'){echo 'selected';} ?>>Poster</option>
	 <option value="Any Other"<?php if($result[0]->source_types=='Any Other'){echo 'selected';} ?>>Any Other</option>


              </select>
        </div>
        

      </div>
    </div>
    
      
    


    
     
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
          <button class="btn btn-success btn-quirk btn-wide mr5" name="submit" id="submit">Submit</button>
          
		  <a href="<?php   echo base_url('backend/show_record');?>">View List</a>
		  
        </div>
    </div>
</form>

</div>
</body>
</html>



