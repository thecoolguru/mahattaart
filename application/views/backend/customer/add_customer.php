<?php // echo $customer[0]->first_name; die;?>


<?php //print_r($customer) ;	die();?>
<?php 
$data=$this->customer_model->get_parent_customers();

//$userid=rand();
$userid=rand();
$number=1;
$query = mysql_query("select max(id) from tbl_customer "); 
$rows = mysql_fetch_assoc($query);

     if($rows['max(id)']!='')
   		{
			$number=$number+$rows['max(id)'];
		}else{
		 	$number=1;
		}
 $str=str_pad($number, 5, "0", STR_PAD_LEFT);  //00002
 $customerid="MA".$str;
 //echo $customerid; die();
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">

function validateField(field) {

//alert(field);

  var input = document.getElementById(field);

 ///alert(input); 

  input.style.borderColor = "";

  input.style.backgroundColor = "";

//alert(input.value.trim());

  if (input.value.trim() == "" || (field == "email" && input.value.match(/[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/) == null) || field == "contact" && input.value.length<'10' || field == "password" && input.value!=field == "new_pwd" && input.value) {

    

    input.style.borderColor = "#c00";

    input.style.backgroundColor = "#fee";

    return true;

  }

  return true;

}



function validate() {

  var valid = true;

  var fields = ['email',  'fname', 'lname' , 'company_name' , 'address' , 'city' , 'state' , 'country' , 'contact','region','pincode','gender','purpose','old_pwd','new_pwd','industry'];

  for (var i in fields) {

    valid = validateField(fields[i]) && valid;
//alert(valid);
  }



  return valid;

}

</script>
<script type = "text/javascript">

function showMessage(which) {

if (which == 1) {

document.getElementById("fine").style.display = "block";

document.getElementById("fill").style.display = "none";

}

else {

document.getElementById("fine").style.display = "none";

document.getElementById("fill").style.display = "block";

}

}

</script>
<script type="text/javascript">

    function dis_able()

    {



        if(document.form1.purpose.value!='Gift')

          document.form1.giftaddress.disabled=1;

        else

        document.form1.giftaddress.disabled= 0;





    }

    

	function enable_Industry()

    {
	var Industry=document.getElementById("occupation").value;
  //alert(Industry);
	  if(Industry=='Other')
	   	{
		document.getElementById('industry').style.display="block";
		}else if(Industry!='Other'){
		document.getElementById('industry').style.display="none";
		}
    }// end function
	
	

	

    function fill_address(f)

    {

      if(document.form1.gift_address_check.checked == true)

      {

	    document.form1.giftaddress.value = document.form1.address.value;

       }

    }

	

	function enable_other_country()

	{

		if(document.form1.country.value!='other')

		  document.form1.country_other.disabled=1;

        else

            document.form1.country_other.disabled= 0;

			

	}


function numbersonly(e){
		var unicode=e.charCode? e.charCode : e.keyCode
		if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
		if (unicode<48||unicode>57) //if not a number
		return false //disable key press
		}
	}	

<!----------->

$(document).ready(function(e) {
    ChangeCustomerType();
	
});




function ChangeCustomerType()
{
    var customer_type =document.getElementById('customer_type').value;
	//alert(customer_type)
   if(customer_type=='B2B')  
   {
    $(".mndaty_aptrp").show();
	$('#occupationb2cp').hide();
	$('.retails_kiosk').hide();
document.getElementById('Industry_text').style.display="block";
document.getElementById('occupation').style.display="block";
document.getElementById('relationshipmanagelbl').style.display="block";
document.getElementById('relationshipmanagetxt').style.display="block";
document.getElementById('account_typelbl').style.display="block";
document.getElementById('account_type').style.display="block";
document.getElementById('Registered_fromlbl').style.display="block";
document.getElementById('Registered_fromtxt').style.display="block";
document.getElementById('vender_contractlbl').style.display="block";
document.getElementById('vender_contracttxt').style.display="block";
        
    }else if(customer_type=='ONLINE'){
       // alert(customer_type);
	    $(".mndaty_aptrp").show();
		 $('.retails_kiosk').hide();
document.getElementById('Industry_text').style.display="none";
document.getElementById('occupation').style.display="none";
document.getElementById('relationshipmanagelbl').style.display="none";
 document.getElementById('relationshipmanagetxt').style.display="none";
document.getElementById('account_typelbl').style.display="none";
document.getElementById('account_type').style.display="none";
document.getElementById('Registered_fromlbl').style.display="none";
document.getElementById('Registered_fromtxt').style.display="none";
document.getElementById('vender_contractlbl').style.display="none";
document.getElementById('vender_contracttxt').style.display="none";
document.getElementById('b2b_choice_hotel').style.display="none";
document.getElementById('b2b_choice').style.display="none";
document.getElementById('b2b_choice_Restaurant').style.display="none";

        }else if(customer_type=='RETAIL'){
       // alert(customer_type); 
	   $(".mndaty_aptrp").hide();
	   $('.retails_kiosk').show();
	   //document.getElementById('mndaty_aptrp').style.display="none";
document.getElementById('Industry_text').style.display="block";

//document.getElementById('vendotrer').style.display="block";

document.getElementById('occupationb2cp').style.display="block";
document.getElementById('occupation').style.display="none";
document.getElementById('relationshipmanagelbl').style.display="block";
document.getElementById('relationshipmanagetxt').style.display="block";
document.getElementById('account_typelbl').style.display="block";
document.getElementById('account_type').style.display="block";
document.getElementById('Registered_fromlbl').style.display="none";
document.getElementById('Registered_fromtxt').style.display="none";
document.getElementById('vender_contractlbl').style.display="block";
document.getElementById('vender_contracttxt').style.display="block";
document.getElementById('b2b_choice_hotel').style.display="none";
document.getElementById('b2b_choice').style.display="none";
document.getElementById('b2b_choice_Restaurant').style.display="none";


        }else if(customer_type==0){
document.getElementById('occupationb2cp').style.display="none";
document.getElementById('Industry_text').style.display="none";
document.getElementById('occupation').style.display="none";
document.getElementById('relationshipmanagelbl').style.display="none";
document.getElementById('relationshipmanagetxt').style.display="none";
document.getElementById('account_typelbl').style.display="none";
document.getElementById('account_type').style.display="none";
document.getElementById('Registered_fromlbl').style.display="none";
document.getElementById('Registered_fromtxt').style.display="none";
document.getElementById('vender_contractlbl').style.display="none";
document.getElementById('vender_contracttxt').style.display="none";
document.getElementById('b2b_choice_hotel').style.display="none";
document.getElementById('b2b_choice').style.display="none";
//document.getElementById('b2b_choice_Restaurant').style.display="none";

        }
        
        

  
  
}// end function



function SelectIndustry()
  {
      //document.getElementById('content_type').innerHTML="";
      var industry =document.getElementById('occupation').value;
      
    //alert(industry);
       if(industry=='Hospitality')
       {
           //alert(industry);
           document.getElementById('content_type').innerHTML="Property Type";
           document.getElementById('b2b_choice').style.display="block";
           document.getElementById('b2b_choice_hotel').style.display="none";
           document.getElementById('b2b_choice_Restaurant').style.display="none"; 
              document.getElementById('otherIndusry').style.display="none";
           }else{
           document.getElementById('b2b_choice').style.display="none";
           document.getElementById('content_type').innerHTML="";
          }
       if(industry=='Hotel')
       {
           document.getElementById('content_type').innerHTML="Star Type";
            document.getElementById('b2b_choice').style.display="none";
           document.getElementById('b2b_choice_hotel').style.display="block";
             document.getElementById('otherIndusry').style.display="none";
       }else{
           document.getElementById('b2b_choice_hotel').style.display="none";
           document.getElementById('content_type').innerHTML="";
       }
       if(industry=='Restaurant')
       {
            document.getElementById('b2b_choice_hotel').style.display="none";
           document.getElementById('content_type').innerHTML="Restaurant type";
           document.getElementById('b2b_choice_Restaurant').style.display="block";
             document.getElementById('otherIndusry').style.display="none";
       }else{
           
          document.getElementById('content_type').innerHTML="";
           document.getElementById('b2b_choice_Restaurant').style.display="none"; 
           
       } 
       
        if(industry=='Other'){
            document.getElementById('otherIndusry').style.display="block";
         }
      
       
  }// end function
  
  
  
  function SelectIndustryb2cp()
  {
      document.getElementById('content_type').innerHTML="";
      var industry =document.getElementById('occupationb2cp').value;
      
    //alert(industry);
       if(industry=='Other_b2cp')
       { document.getElementById('otherb2cp').style.display="block";
        }else{
            
       document.getElementById('otherb2cp').style.display="none";     
        } 
      
       
  }// end function
  
  
  
 function otherIndustry()
 {
    var Other_industry =document.getElementById('Other_industry').checked;
    //alert(Other_industry);
    if(Other_industry==true)
       {
           document.getElementById('choice_another_instutry').style.display="block";
       } else if(Other_industry==false){
           document.getElementById('choice_another_instutry').style.display="none";
       }
      
     
 }// end function
    
function SelectOtherStar()
{
    var Other_star =document.getElementById('Other_star').checked;
    //alert(Other_industry);
    if(Other_star==true)
       {
           document.getElementById('choice_other_option').style.display="block";
       } else if(Other_star==false){
           document.getElementById('choice_other_option').style.display="none";
       }
}// end function

/*function get_customer_data(id)

{

	var datastring='customer_id=' + id ;

				$.ajax({

					    type: "POST",

					    url: "<?php print base_url() ?>index.php/backend/get_parent_customer_detail",

					    data: datastring,

						 success: function(data)

					   {

						 var a = data.split('/');

						var b=a['0'];

						 var c=a['1'];

					     var d=b.killWhiteSpace();

						 var e=c.killWhiteSpace();

			  $('#company_name').val(d);

			  $('#company_name').attr('readonly', true);

              $('#company_type').val(e);

						$('#company_type').attr('readonly', true);

							}

						});

}



String.prototype.killWhiteSpace = function() {

    return this.replace(/\s/g, '');

}; */</script>


<!--MIDDLE PAGE WRAPPER STARTS-->

<?php  //echo $customer[0]->id; die(); ?>


<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> Add New Customer</div>
    <div class="add-newcp"> <span style="color:red">
      <?= $msg;?>
      </span>
      <div class="mndry">*Mandatory Fields</div>
      <div> <?php 
	  //echo $msg_for_b2cp;
	  if($msg_for_b2cp=='b2cp'){
	  echo "";
	  }else{
	  echo validation_errors();
	  }
	  ?></div>
      <form action="<?php echo base_url('index.php/customer/add_customer_final/'.$customer[0]->id)?>" method="post" onSubmit="return validate();" name="form1" id="form1">
          <input type="hidden" name="customer_id" id="customer_id" value="<?php  echo $customerid;?>" />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40" colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <td width="12%">First Name<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
       <td width="37%"><input type="text" name="fname" id="fname" class="inputbxs" value="<?php  if(isset($customer[0]->first_name)){echo $customer[0]->first_name;}else{echo $this->input->post('fname');};?>" />
       
       
       
       </td>
            <td width="18%">Last Name<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td width="33%"><input type="text" name="lname" id="lname" class="inputbxs" value="<?php  if(isset($customer[0]->last_name)){echo $customer[0]->last_name;}else{echo $this->input->post('lname');};?>" /></td>
          </tr>
          <tr>
            <td>Customer Type<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="customer_type" id="customer_type" onchange="ChangeCustomerType()"  class="inputbxs">
<option  value="0" >Select</option>
<option value="B2B"<?php  if($customer[0]->customer_type=='B2B'){echo 'selected';}else{if($this->input->post('customer_type')=="B2B"){echo'selected';};} ?>>B2B</option>
<option value="ONLINE" <?php  if($customer[0]->customer_type=='ONLINE'){echo 'selected';}else{if($this->input->post('customer_type')=="ONLINE"){echo'selected';};} ?> >ONLINE</option>
<option value="RETAIL" <?php  if($customer[0]->customer_type=='RETAIL'){echo 'selected';}else{if($this->input->post('customer_type')=="RETAIL"){echo'selected';};} ?>>RETAIL</option>
               </select></td>
<td ><span id="Industry_text" style="display:none;">Industry<span class="mndaty_aptrp" style="color:#FF0000;" >*</span></td>
               <td >

                   <select name="occupation" id="occupation"  style="display: none;" onchange="return SelectIndustry();"  class="inputbxs">
<option  value="0" >Select</option>
<option value="Architect" <?php  if($customer[0]->b2b_industry=='Architect'){echo 'selected';}else{if($this->input->post('occupation')=="Architect"){ echo 'selected';}}?>>Architect</option>
<option value="Art_Consultant"<?php  if($customer[0]->b2b_industry=='Art_Consultant'){echo 'selected';}else{if($this->input->post('occupation')=="Art_Consultant"){ echo 'selected';}}?>>Art Consultant</option>
                <option value="Business" <?php  if($customer[0]->b2b_industry=='Business'){echo 'selected';}else{if($this->input->post('occupation')=="Business"){ echo 'selected';}}?>>Business</option>
                <option value="Furnishing" <?php  if($customer[0]->b2b_industry=='Furnishing'){echo 'selected';}else{if($this->input->post('occupation')=="Furnishing"){ echo 'selected';}}?>>Furnishing</option>
                <option value="Hospitality"<?php  if($customer[0]->b2b_industry=='Hospitality'){echo 'selected';}else{if($this->input->post('occupation')=="Hospitality"){ echo 'selected';}}?>>Hospitality</option>
                <option value="Hotel" <?php  if($customer[0]->b2b_industry=='Hotel'){echo 'selected';}else{if($this->input->post('occupation')=="Hotel"){ echo 'selected';}}?>>Hotel </option>
                <option value="Interior_Architect"  <?php  if($customer[0]->industry=='Interior_Architect'){echo 'selected';}else{if($this->input->post('occupation')=="Interior_Architect"){ echo 'selected';}}?>>Interior/ Architect</option> 
                <option value="Restaurant"<?php  if($customer[0]->b2b_industry=='Restaurant'){echo 'selected';}else{if($this->input->post('occupation')=="Restaurant"){ echo 'selected';}}?>>Restaurant</option>
                 <option value="Service"<?php  if($customer[0]->b2b_industry=='Service'){echo 'selected';}else{if($this->input->post('occupation')=="Service"){ echo 'selected';}}?>>Service</option>
                <option value="Other" <?php  if($customer[0]->b2b_industry=='Other'){echo 'selected';}else{if($this->input->post('occupation')=="Other"){ echo 'selected';}}?>>Other</option>
              </select>
               <br>
<input type="text" placeholder="Other Industry" name="otherIndusry" value="<?php if($this->input->post('otherIndusry')){echo $this->input->post('otherIndusry') ;}?>" id="otherIndusry" class="inputbxs" style="display:none;">     
			 
<!--              When customer select B2CP-->
              
              <select name="occupationb2cp" id="occupationb2cp"  style="display: none;" onchange="return SelectIndustryb2cp();"  class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Architect"<?php if($customer[0]->retail_industry=='Architect'){echo 'selected';}else{if($this->input->post('occupationb2cp')=="Architect"){ echo 'selected';};} ?> >Architect</option>
     <option value="Art Consultant"<?php if($customer[0]->retail_industry=='Art Consultant'){echo 'selected';}else{if($this->input->post('occupationb2cp')=="Art Consultant"){ echo 'selected';};} ?>>Art Consultant</option>
                <option value="Interior_Designer"<?php if($customer[0]->retail_industry=='Interior_Designer'){echo 'selected';}else{if($this->input->post('occupationb2cp')=="Interior_Designer"){ echo 'selected';};} ?>>Interior Designer</option> 
                <option value="e commerce" <?php if($customer[0]->retail_industry=='e commerce'){echo 'selected';}else{if($this->input->post('occupationb2cp')=="e commerce"){ echo 'selected';};} ?>>e commerce</option>
                 <option value="Service"<?php if($customer[0]->retail_industry=='Service'){echo 'selected';}else{if($this->input->post('occupationb2cp')=="Service"){ echo 'selected';};} ?>>Service</option>
                <option value="Other_b2cp"<?php if($customer[0]->retail_industry=='Other_b2cp'){echo 'selected';}else{if($this->input->post('occupationb2cp')=="Other_b2cp"){ echo 'selected';};} ?>>Other</option>
              </select>
			 
                <br>
                <input type="text" placeholder="Other Industry" name="otherb2cp" id="otherb2cp" value="<?php if($this->input->post('otherb2cp')){echo $this->input->post('otherb2cp') ;}?>" class="inputbxs" style="display:none;">
                   
                   
			  </td>
          </tr>
     
     
  <!---------------------------26-12-2017----------------------->   
     
  
  <script type ="text/javascript">
    $(document).ready(function(){
        $('#vendor_types').change(function(){
       var vendor_types = $('#vendor_types').val();
	  //alert(vendor_types);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/customer/get_query_details'); ?>",
			data:"vendor_types="+vendor_types,
			success:function(response)
			 {
            //alert(response)
				$("#location").html(response);
			 }	 
		    })	
       });
    });
    </script>
    
    
    <script type ="text/javascript">
    $(document).ready(function(){
        $('#location').change(function(){
       var vendor_location = $('#location').val();
	  //alert(vendor_location);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/customer/get_query_location_keys'); ?>",
			data:"vendor_location="+vendor_location,
			success:function(response)
			 {
             //alert(response)
				$("#location_key_id").val(response);
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
 <div class="" >

<tr   style="display:none" class="retails_kiosk" >
 <td width="12%">Vendor Types<span class="" style="color:#FF0000;"></span></td>
 <td width="37%">
 <div class="form-group">
    <?php $id=$this->uri->segment(3); ?>
      <div class="col-sm-9">
      	<div class="btn-group">
         <select name="vendor_types"class="inputbxs"id="vendor_types">
           <option value="">Select</option>
                      
 		<?php	foreach($get_vendor as $get){ ?>
<option value="<?php echo $get->vendor_types; ?>" <?php if($customer[0]->vendor_types==$get->vendor_types){echo 'selected';} ?> ><?php echo $get->vendor_types; ?></option>
        <?php }?> 
  
            </select>
        </div>
	
      </div>
    </div>
 
 </td>
 
 
 <td width="18%">Vendor Location<span class="" style="color:#FF0000;"></span></td>
 <td width="33%">
   <div class="form-group">
      <div class="col-sm-9">
      	<div class="btn-group">
            <select name="location" id="location" class="inputbxs">
            
                 <?php  if(isset($customer[0]->vendor_location)){  ?>
<option  value="<?php echo $customer[0]->vendor_location; ?>" <?php if(!empty($customer[0]->vendor_locaation)){ echo 'selected'; } ?>  ><?php echo $customer[0]->vendor_location;  ?></option>
                <?php }?>
                
                
<option  value="" >Select Location </option>                 
                
                <?php  if(!empty($id)){
					foreach($vlocation as $locations){
						?>
                        
<option value="<?php echo $locations->vendor_id; ?>" <?php if($get_details[0]->location_name_id==$location->id){echo 'selected';}?> >
<?php echo $locations->location_name; ?></option>    
                        <?php
						
			}
					
					}else{
						
						foreach($get_location as $re2){ ?>
                     <option value="<?php echo $re2->id; ?>"><?php echo $re2->location_id; ?></option>


<?php }}?>		 
					 
					 
				
				
                
            </select>
        </div>
		
      </div>
    </div>
 </td>
</tr>





<tr style="display:none" class="retails_kiosk" >

<td>Location Id<span style="color:#FF0000;"></span></td>
<td><input type="text" name="location_key_id" id="location_key_id"  value="<?php if(isset($customer[0]->vendor_location_key_id)){echo $customer[0]->	vendor_location_key_id;}else{echo $this->input->post('location_key_id');}; ?>"    readonly class="inputbxs"/></td>
           


<!-----
 <td>
 <div class="form-group">
      <div class="col-sm-9">
      	<div class="btn-group" id="verdor_id2"  >
        
        
        </div>
		
      </div>
    </div>
 </td>
 --->

 
</tr>


</div>  
  
  
         

      
          
<!------------------------------End 26-12-------------------------------->          
          <tr>
            <td>Email ID<span style="color:#FF0000;">*</span></td>
            
            <td><input type="text" name="email" id="email" class="inputbxs" value="<?php  if(isset($customer[0]->email_id)){echo $customer[0]->email_id;}else{echo $this->input->post('email');}; ?>"/></td>
           
            <td id="content_type"></td>
            <td>
                   <div id="b2b_choice" style="display: none;"> <span>Hotel</span> &nbsp;<input type="checkbox" name="Hotel" id="Hotel"> 
                       <span>Restaurant</span> &nbsp;<input type="checkbox" name="hospitality[]" id="Restaurant" value="Restaurant"> 
                       <span>Cafe</span>&nbsp;<input type="checkbox" name="hospitality[]" id="Cafe" value="Cafe"> 
                       <span>Hospital</span> &nbsp;<input type="checkbox" name="hospitality[]" id="Hospital" value="Hospital"> <br>
                       <span>Office</span> &nbsp; <input type="checkbox" name="hospitality[]" id="Office" value="Office"> 
                       <span>Mall</span> &nbsp; <input type="checkbox" name="hospitality[]" id="Mall" value="Mall"> 
                       <span>Retail</span> &nbsp; <input type="checkbox" name="hospitality[]" id="Retail"  value="Retail"> <br>
                       <span>Residential Building</span>&nbsp;  <input type="checkbox" name="hospitality[]" id="Residential Building " value="Residential Building"> 
                       <span>Spa & Salon </span> &nbsp; <input type="checkbox" name="hospitality[]" id="Spa_Salon" value="Spa Salon"> <br>
         <span>Other Industry</span> &nbsp; <input type="checkbox" value="Other_industry" name="Other_industry" id="Other_industry" onchange="otherIndustry();"> 
         <br> <br> <div  id="choice_another_instutry" style=" display: none;">
             <span>Other Industry</span> &nbsp; <input type="text" class="inputbxs" placeholder="Type Another Industry" name="type_industry" id="type_industry"  >   </div>   
                   </div>          
                  

                
                
          <!--  On select hotel-->
          
                    <div id="b2b_choice_hotel" style="display: none;">
                <span>1 star </span> &nbsp;<input type="checkbox" name="hotel[] " id="1_star " value="1 star"> 
                <span>2 star </span> &nbsp;<input type="checkbox" name="hotel[]" id="2_star" value="2 star"> 
                  <span>3 star </span>&nbsp;<input type="checkbox" name="hotel[]" id="3_star" value="3 star"> 
                  <span>Luxury </span> &nbsp;<input type="checkbox" name="hotel[]" id="Luxury" value="Luxury"> <br>
                  <span>Heritage</span> &nbsp; <input type="checkbox" name="hotel[]" id="Heritage" value="Heritage"> 
                  <span>Bed and Breakfast</span> &nbsp; <input type="checkbox" name="hotel[]" id="Bed_and_Breakfast" value="Bed and Breakfast"> 
                  <span>Home Stay</span> &nbsp; <input type="checkbox" name="hotel[]" id="Homestay" value="Homestay"> <br>
                <br>
         <span>Other</span> &nbsp; <input type="checkbox" value="Other_star" name="Other_star" id="Other_star" onchange="SelectOtherStar();"> 
         <br> <br> <div  id="choice_other_option" style=" display: none;"> <span>Other Option</span> &nbsp; <input type="text" class="inputbxs" placeholder="Other Option" name="other_starotoption" id="other_option"  >   </div>   
                </div>
          
          
           <!--  On select Restaurant type-->
          
                    <div id="b2b_choice_Restaurant" style="display: none;">
                <span>Fine Dining </span> &nbsp;<input type="checkbox" name="Restaurant[] " id="Fine_Dining " value="Fine Dining"> 
                <span>Casual dining </span> &nbsp;<input type="checkbox" name="Restaurant[]" id="Casual_dining" value="Casual dining"> 
                  <br>  <span>Resto Bar </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Restaurant[]" id="Resto_Bar" value="Resto Bar"> 
               &nbsp;&nbsp;&nbsp;&nbsp; <span>Fast Food </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Restaurant[]" id="Fast_Food" value="Fast Food"> <br>
                  <span>Ethnic</span> &nbsp; <input type="checkbox" name="Restaurant[]" id="Ethnic" value="Ethnic"> 
                 
                </div>
          
           </td>
           
            
            
          </tr>

          <tr  >
              <td><span id="relationshipmanagelbl" style="display:none;">Relationship Manager<span class="mndaty_aptrp" style="color:#FF0000;">*</span></span></td>
              <td>
              
<input type="text" style="display:none;" name="relationshipmanage" id="relationshipmanagetxt"class="inputbxs"value="<?php if(isset($customer[0]->relation_manager)){echo $customer[0]->relation_manager;}else{echo $this->input->post('relationshipmanage');};?>"></td>

              <td ><span id="account_typelbl" style="display:none;" >Account Type<span class="mndaty_aptrp" style="color:#FF0000;">*</span></span></td>
              <td ><select style="display:none;" name="account_type" id="account_type"    class="inputbxs">
<option  value="0" >Select</option>
     <option value="Key"<?php if($customer[0]->account_type=='Key'){echo 'selected';}else{ if($this->input->post('account_type')=="Key"){ echo 'selected'; }}  ?>>Key</option>
                <option value="Potential"<?php if($customer[0]->account_type=='Potential'){echo 'selected';}else{ if($this->input->post('account_type')=="Key"){ echo 'selected'; }} ?>>Potential</option>
                <option value="New"<?php  if($customer[0]->account_type=='New'){echo 'selected';}else{ if($this->input->post('account_type')=="Key"){ echo 'selected'; }} ?>>New</option>
                <option value="Dormant"<?php  if($customer[0]->account_type=='Dormant'){echo 'selected';}else{ if($this->input->post('account_type')=="Key"){ echo 'selected'; }} ?>>Dormant</option>
                <option value="Floating"<?php if($customer[0]->account_type=='Floating'){echo 'selected';}else{ if($this->input->post('account_type')=="Key"){ echo 'selected'; }} ?>>Floating</option>
               </select>
			 
	    </td>
          </tr>
           <tr >
          
               <td ><span id="Registered_fromlbl"  style="display:none;"  >Registered from:<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
               <td ><select  id="Registered_fromtxt" style="display:none;"  name="Registered_from" class="inputbxs">
                <option  value="0" >Select</option>
  <option value="Web" <?php if($customer[0]->registered_from=='Web'){echo 'selected';}else{ if($this->input->post('Registered_from')=="Web"){ echo 'selected'; }} ?>>Web</option>
  <option value="Backend"<?php if($customer[0]->registered_from=='Backend'){echo 'selected';}else{ if($this->input->post('Registered_from')=="Backend"){ echo 'selected'; }} ?>>Backend</option>
                </select>
			 
			  </td>
               
               <td ><span id="vender_contractlbl"  >Vendor contract signed:<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
               <td ><select name="vender_contract" id="vender_contracttxt"     class="inputbxs">
<option  value="0" >Select</option>
<option value="Signed"<?php  if($customer[0]->vender_contract=='Signed'){echo 'selected';}else{ if($this->input->post('vender_contract')=="Signed"){ echo 'selected'; }} ?>>Signed</option>
<option value="Not-Signed" <?php if($customer[0]->vender_contract=='Not-Signed'){echo 'selected';}else{ if($this->input->post('vender_contract')=="Not-Signed"){ echo 'selected'; }} ?>>Not Signed</option>
<option value="Not-required" <?php if($customer[0]->vender_contract=='Not-required'){echo 'selected';}else{ if($this->input->post('vender_contract')=="Not-required"){ echo 'selected'; }} ?>>Not required</option>
               </select>
			 
			  </td>
          </tr>  
          
  <?php // echo "You Password=".$customer[0]->password; die();   ?>      
          
		  <tr>
		  <td></td> <td></td><td></td><td><input  name="industry" id="industry" class="inputbxs"  placeholder="Other Industry"  style="display:none;"  /></td></tr>
		  <tr>
                      <td>Password:</td> 
                      <td>
                     <?php  if(isset($customer[0]->password)){ ?>
 <input type="password"  name="password" id="password" class="inputbxs"  placeholder="Password"value="<?php echo $customer[0]->password;?>"   />   
 <?php }else{ ?>                 
                     
 <input type="password"  name="password" id="password" class="inputbxs"  placeholder="Password"value="<?php echo set_value('password');?>"   /> 
 <?php }?>     
  </td> 
  
                      <td>Re-Type Password:</td>
                      <td>
                       <?php  if(isset($customer[0]->password)){ ?>
<input type="password"  name="new_password" id="new_pwd" class="inputbxs"   placeholder="Re-Type Password"value="<?php echo $customer[0]->password;?>")" />
<?php } else {?>
<input type="password"  name="new_password" id="new_pwd" class="inputbxs"   placeholder="Re-Type Password"value="<?php echo set_value('new_password');?>" />
<?php }?>
</td></tr>
		  <tr>
		  <td></td> <td></td><td></td><td></td></tr>
		  
          <!--<tr>
            <td></td>
            <td></td>
            <td>Other Occupation:</td>
            <td><input disabled type="text" name="occupation_other" id="occupation_other" class="inputbxs" value="Pls specify"   /></td>
          </tr>-->
          <tr>
            <td>Gender<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="gender" id="gender" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
                <option value="Male"<?php if($customer[0]->gender=='Male'){echo 'selected';}else{ if($this->input->post('gender')=="Male"){ echo 'selected'; }}
 ?>>Male</option>
                <option value="Female" <?php if($customer[0]->gender=='Female'){echo 'selected';}else{ if($this->input->post('gender')=="Female"){ echo 'selected'; }}
 ?>>Female</option>
              </select></td>
            </td>
           <td>Client Service:</td> <td><input type="text"  name="client_service" id="client_service" class="inputbxs"  placeholder="Client Service"value="<?php if(isset($customer[0]->client_service)){echo $customer[0]->client_service;}else{echo $this->input->post('client_service');}?>" /></td>
          </tr>
          <tr>
            <td>Address<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td colspan="3"><input type="text" value="<?php  if(isset($customer[0]->address)){echo $customer[0]->address;}else{echo $this->input->post('address');} ?>" name="address" id="address"class="inputbxs" style="width:600px" /></td>
          </tr>
          <tr>
            <td>Country<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="country" id="country" onchange="enable_other_country()" class="inputbxs" >
<!--                <option value= "0" selected="selected">Select</option>
-->                <option value="India">India</option>
<!--                <option value="other">Other</option>
-->              </select></td>
            <td>State<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="state" id="state" class="inputbxs">
<option  value="0"selected="selected">Select</option>
<option value="Andhra Pradesh"<?php if($customer[0]->state=='Andhra Pradesh'){echo 'selected';}else{if($this->input->post('state')=="Andhra Pradesh"){echo'selected';};}
 ?>>Andhra Pradesh</option>
<option value="Arunachal Pradesh" <?php if($customer[0]->state=='Arunachal Pradesh'){echo 'selected';}else{if($this->input->post('state')=="Arunachal Pradesh"){echo'selected';};}
 ?>>Arunachal Pradesh</option>
<option value="Assam"<?php if($customer[0]->state=='Assam'){echo 'selected';}else{if($this->input->post('state')=="Assam"){echo'selected';};}
?>>Assam</option>
<option value="Chhattisgarh"<?php if($customer[0]->state=='Chhattisgarh'){echo 'selected';}else{if($this->input->post('state')=="Chhattisgarh"){echo'selected';};}
?>>Chhattisgarh</option>
<option value="Delhi"<?php if($customer[0]->state=='Andhra Pradesh'){echo 'selected';}else{if($this->input->post('state')=="Delhi"){echo'selected';};}
?>>Delhi</option>
<option value="Goa"<?php if($customer[0]->state=='Goa'){echo 'selected';}else{if($this->input->post('state')=="Goa"){echo'selected';};}
 ?>>Goa</option>
<option value="Gujarat"<?php if($customer[0]->state=='Gujarat'){echo 'selected';}else{if($this->input->post('state')=="Gujarat"){echo'selected';};}
 ?>>Gujarat</option>
<option value="Haryana"<?php if($customer[0]->state=='Haryana'){echo 'selected';}else{if($this->input->post('state')=="Haryana"){echo'selected';};}
 ?>>Haryana</option>
<option value="Himachal Pradesh"<?php if($customer[0]->state=='Himachal Pradesh'){echo 'selected';}else{if($this->input->post('state')=="Himachal Pradesh"){echo'selected';};}
 ?>>Himachal Pradesh</option>
<option value="Jammu and Kashmir"<?php if($customer[0]->state=='Jammu and Kashmir'){echo 'selected';}else{if($this->input->post('state')=="Jammu and Kashmir"){echo'selected';};}
 ?>>Jammu and Kashmir</option>
<option value="Jharkhand"<?php if($customer[0]->state=='Jharkhand'){echo 'selected';}else{if($this->input->post('state')=="Jharkhand"){echo'selected';};}
 ?>>Jharkhand</option>
<option value="Karnataka"<?php if($customer[0]->state=='Karnataka'){echo 'selected';}else{if($this->input->post('state')=="Karnataka"){echo'selected';};}
 ?>>Karnataka</option>
<option value="Kerala"<?php if($customer[0]->state=='Kerala'){echo 'selected';}else{if($this->input->post('state')=="Kerala"){echo'selected';};}
 ?>>Kerala</option>
<option value="Madhya Pradesh"<?php if($customer[0]->state=='Madhya Pradesh'){echo 'selected';}else{if($this->input->post('state')=="Madhya Pradesh"){echo'selected';};}
 ?>>Madhya Pradesh</option>
<option value="Maharashtra"<?php if($customer[0]->state=='Maharashtra'){echo 'selected';}else{if($this->input->post('state')=="Maharashtra"){echo'selected';};}
 ?>>Maharashtra</option>
<option value="Manipur"<?php if($customer[0]->state=='Manipur'){echo 'selected';}else{if($this->input->post('state')=="Manipur"){echo'selected';};}
 ?>>Manipur</option>
<option value="Meghalaya" <?php if($customer[0]->state=='Meghalaya'){echo 'selected';}else{if($this->input->post('state')=="Meghalaya"){echo'selected';};}
?>>Meghalaya</option>
<option value="Mizoram"<?php if($customer[0]->state=='Mizoram'){echo 'selected';}else{if($this->input->post('state')=="Mizoram"){echo'selected';};}
?>>Mizoram</option>
<option value="Nagaland"<?php if($customer[0]->state=='Nagaland'){echo 'selected';}else{if($this->input->post('state')=="Nagaland"){echo'selected';};}
 ?>>Nagaland</option>
<option value="Orissa"<?php if($customer[0]->state=='Orissa'){echo 'selected';}else{if($this->input->post('state')=="Orissa"){echo'selected';};}
?>>Orissa</option>
<option value="Punjab"<?php if($customer[0]->state=='Punjab'){echo 'selected';}else{if($this->input->post('state')=="Punjab"){echo'selected';};}
 ?>>Punjab</option>
<option value="Rajasthan"<?php if($customer[0]->state=='Rajasthan'){echo 'selected';}else{if($this->input->post('state')=="Rajasthan"){echo'selected';};}
 ?>>Rajasthan</option>
<option value="Sikkim"<?php if($customer[0]->state=='Sikkim'){echo 'selected';}else{if($this->input->post('state')=="Sikkim"){echo'selected';};}
 ?>>Sikkim</option>
<option value="Tamil Nadu"<?php if($customer[0]->state=='Tamil Nadu'){echo 'selected';}else{if($this->input->post('state')=="Tamil Nadu"){echo'selected';};}
 ?>>Tamil Nadu</option>
<option value="Tripura"<?php if($customer[0]->state=='Tripura'){echo 'selected';}else{if($this->input->post('state')=="Tripura"){echo'selected';};}
 ?>>Tripura</option>
<option value="Uttar Pradesh"<?php if($customer[0]->state=='Uttar Pradesh'){echo 'selected';}else{if($this->input->post('state')=="Uttar Pradesh"){echo'selected';};}
 ?>>Uttar Pradesh</option>
<option value="Uttarakhand"<?php if($customer[0]->state=='Uttarakhand'){echo 'selected';}else{if($this->input->post('state')=="Uttarakhand"){echo'selected';};}?>>Uttarakhand</option>
<option value="West Bengal"<?php if($customer[0]->state=='West Bengal'){echo 'selected';}else{if($this->input->post('state')=="West Bengal"){echo'selected';};}
 ?>>West Bengal</option>
              </select></td>
          </tr>
          <tr>
            <td>Other Country:</td>
            <td><input disabled="disabled" type="text" name="country_other" id="country_other" class="inputbxs" value="Pls Specify" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>City<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
           

            <td><input type="text" name="city" value="<?php  if(isset($customer[0]->city)){echo $customer[0]->city;}else{echo $this->input->post('city');};?>" id="city" class="inputbxs" />
            </td>
            <td>Region<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="region" id="region"  class="inputbxs">
                <option value="0" selected="selected">Select</option>
                <option value="East"<?php if($customer[0]->region=='East'){echo 'selected';}else{if($this->input->post('region')=="East"){echo'selected';};}?>>East</option>
                <option value="West"<?php if($customer[0]->region=='West'){echo 'selected';}else{if($this->input->post('region')=="West"){echo'selected';};}?>>West</option>
                <option value="North"<?php if($customer[0]->region=='North'){echo 'selected';}else{if($this->input->post('region')=="North"){echo'selected';};}?>>North</option>
                <option value="South"<?php if($customer[0]->region=='South'){echo 'selected';}else{if($this->input->post('region')=="South"){echo'selected';};}?>>South</option>
              </select></td>
          </tr>
          <tr>
            <td>Company Name</td>
            <td>
            
 <input type="text"name="company_name" id="company_name" class="inputbxs" value="<?php if(isset($customer[0]->company_name)){echo $customer[0]->company_name;}else{echo $this->input->post('company_name');};?>"/>
           </td>
            <td>Contact Number<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            
            <td><input type="text" value="<?php if(isset($customer[0]->contact)){echo $customer[0]->contact;}else{echo $this->input->post('contact');};?>" name="contact" id="contact"  maxlength="10" onKeyPress="return numbersonly(event);" class="inputbxs" /></td>
          </tr>
             
          <tr>
            <td>Purpose<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="purpose" id="purpose" onchange="dis_able()"  class="inputbxs">
            
<option value="Home"<?php if($customer[0]->purpose=='Home'){echo 'selected';}else{if($this->input->post('purpose')=="Home"){echo'selected';};}?>>Home</option>
                <option value="Personal"<?php if($customer[0]->purpose=='Personal'){echo 'selected';}else{if($this->input->post('purpose')=="Personal"){echo'selected';};}?>>Personal</option>
                <option value="Official"<?php if($customer[0]->purpose=='Official'){echo 'selected';}else{if($this->input->post('purpose')=="Official"){echo'selected';};}?>>Official</option>
                <option value="Gift"<?php if($customer[0]->purpose=='Gift'){echo 'selected';}else{if($this->input->post('purpose')=="Gift"){echo'selected';};}?>>Gift</option>
              </select>
            </td>
            <td>Pin Code<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><input  type="text" name="pincode" value="<?php if(isset($customer[0]->zip_code)){echo $customer[0]->zip_code;}else{echo $this->input->post('pincode');};?>" maxlength="6" id="pincode" class="inputbxs" onKeyPress="return numbersonly(event);" /></td>
          </tr>  
		  
		  
		  
		  <tr>
            <td>I'am a <span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="iama" id="iama" onchange=""  class="inputbxs">
                <option value="Hotelier"<?php if($customer[0]->i_am_a=='Hotelier'){echo 'selected';}else{if($this->input->post('iama')=="Hotelier"){echo'selected';};} ?>>Hotelier</option>
                <option value="Interior Designer"<?php if($customer[0]->i_am_a=='Interior Designer'){echo 'selected';}else{if($this->input->post('iama')=="Hotelier"){echo'selected';};} ?>>Interior Designer</option>
                <option value="Architects"<?php if($customer[0]->i_am_a=='Architects'){echo 'selected';}else{if($this->input->post('iama')=="Architects"){echo'selected';};} ?>>Architects</option>
                <option value="B2C Customer"<?php if($customer[0]->i_am_a=='B2C Customer'){echo 'selected';}else{if($this->input->post('iama')=="B2C Customer"){echo'selected';};}?>>B2C Customer</option>
				<option value="Corporate"<?php if($customer[0]->i_am_a=='Corporate'){echo 'selected';}else{if($this->input->post('iama')=="Corporate"){echo'selected';};} ?>>Corporate</option>
				<option value="Design House"<?php if($customer[0]->i_am_a=='Design House'){echo 'selected';}else{if($this->input->post('iama')=="Design House"){echo'selected';};}?>>Design House</option>
				
              </select>
            </td>
            <td>Job Description<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
			<select name="job_description" id="job_description" onchange=""  class="inputbxs">
                <option value="Purchase Manager"  <?php if($customer[0]->job_description=='Purchase Manager'){echo 'selected';}else{if($this->input->post('job_description')=="Purchase Manager"){echo'selected';};}?> >Purchase Manager</option>
                <option value="Owner"  <?php if($customer[0]->job_description=='Owner'){echo 'selected';}else{if($this->input->post('job_description')=="Owner"){echo'selected';};}?>>Owner</option>
                <option value="CEO"   <?php if($customer[0]->job_description=='CEO'){echo 'selected';}else{if($this->input->post('job_description')=="CEO"){echo'selected';};}?>>CEO</option>
                <option value="COO"   <?php if($customer[0]->job_description=='COO'){echo 'selected';}else{if($this->input->post('job_description')=="COO"){echo'selected';};}?>>COO</option>
				<option value="Interior_Designer"  <?php if($customer[0]->job_description=='Interior_Designer'){echo 'selected';}else{if($this->input->post('job_description')=="Interior_Designer"){echo'selected';};}?>>Interior Designer</option>
				<option value="Architects"<?php if($customer[0]->job_description=='Architects'){echo 'selected';}else{if($this->input->post('Architects')=="Architects"){echo'selected';};}?>>Architects</option>
				<option value="Art_Buyer"<?php if($customer[0]->job_description=='Art_Buyer'){echo 'selected';}else{if($this->input->post('Art_Buyer')=="Art_Buyer"){echo'selected';};}?>>Art Buyer</option>
				<option value="Art_Collector" <?php if($customer[0]->job_description=='Art_Collector'){echo 'selected';}else{if($this->input->post('job_description')=="Art_Collector"){echo'selected';};}?>>Art Collector</option>
				<option value="Vice_President" <?php if($customer[0]->job_description=='Vice_President'){echo 'selected';}else{if($this->input->post('Vice_President')=="Vice_President"){echo'selected';};}?>>Vice President</option>
				
              </select>
            </td>          
					  
			</tr>  
		  
		  
		  
          
          
          
          <!---Add Extra Filed From Here--->
          
          
          
          <!---Mailing Fields--->
          
        <tr>
         <td><strong>Mainling Information</strong></td>
        </tr>
          
          <tr>     
<td width="12%">Mail Address<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%"><input type="text" name="mailstreetaddress" id="mailstreetaddress" class="inputbxs" value="<?php if(isset($customer[0]->mailing_street_address)){echo $customer[0]->mailing_street_address;}else{echo $this->input->post('mailstreetaddress');} ?>" /></td>
            
            <td>City<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
            <td><input  type="text" name="mainlingcity" value="<?php if(isset($customer[0]->mailing_city)){echo $customer[0]->mailing_city;}else{echo $this->input->post('mainlingcity');} ?>"  id="mainlingcity" class="inputbxs" /></td>
          </tr>
          <tr>     
<td width="12%">State<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%"><input type="text" name="mailingstate" id="mailingstate" class="inputbxs" value="<?php if(isset($customer[0]->mailing_state)){echo $customer[0]->mailing_state;}else{echo $this->input->post('mailingstate');} ?>" /></td>
            
            <td>Postal Code<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
            <td><input  type="text" name="mailposatcode"  onkeypress='return event.charCode >=48 && event.charCode <=57' maxlength="6" value="<?php if(isset($customer[0]->mailing_postal_code)){echo $customer[0]->mailing_postal_code;}else{echo $this->input->post('mailposatcode');} ?>"  id="mailposatcode" class="inputbxs" /></td>
          </tr>
          <tr>     
<td width="12%">Country<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%"><input type="text" name="mailingcountry" id="mailingcountry" class="inputbxs" value="<?php if(isset($customer[0]->mailing_country)){echo $customer[0]->mailing_country;}else{echo $this->input->post('mailingcountry');} ?>" /></td>
            
            <td>Telephone Number<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
              <td><input  type="text" onkeypress='return event.charCode >=48 && event.charCode <=57' maxlength="10" name="mailingphone" value="<?php if(isset($customer[0]->mailing_telephone)){echo $customer[0]->mailing_telephone;}else{echo $this->input->post('mailingphone');} ?>"  id="mailingphone" class="inputbxs" /></td>
          </tr>
          
          <tr>     
<td width="12%">Mobile Number<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%"><input type="text" onkeypress='return event.charCode >=48 && event.charCode <=57' name="mailingmobile" id="mailingmobile" class="inputbxs"  maxlength="10"     value="<?php if(isset($customer[0]->mailing_mobile)){echo $customer[0]->mailing_mobile;}else{echo $this->input->post('mailingmobile');} ?>
" /></td>
          
          </tr>
            
<!---Mailing Fields--->
        
        
        
        
<!---------Billing Information------>

 <tr>
         <td><strong>Billing Information</strong></td>
        </tr>
          
          <tr>     
<td width="12%">Company Name<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%"><input type="text" name="billingcomname" id="billingcomname" class="inputbxs" value="<?php if(isset($customer[0]->billing_company_name)){echo $customer[0]->billing_company_name;}else{echo $this->input->post('billingcomname');} ?>" /></td>
            
            <td>Region<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
            <td>
            <select name="billingregion" id="billingregion" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
<option value="North"<?php if($customer[0]->billing_region=='North'){echo 'selected';}else{if($this->input->post('billingregion')=="North"){echo'selected';};}
 ?>>North</option>
                
<option value="West"<?php if($customer[0]->billing_region=='West'){echo 'selected';}else{if($this->input->post('billingregion')=="West"){echo'selected';};}
 ?>>West</option>
<option value="South"<?php if($customer[0]->billing_region=='South'){echo 'selected';}else{if($this->input->post('billingregion')=="South"){echo'selected';};}
 ?>>South</option>
 <option value="East"<?php if($customer[0]->billing_region=='East'){echo 'selected';}else{if($this->input->post('billingregion')=="East"){echo'selected';};}
 ?>>East</option>
              
                
                </select>
            
            </td>
          </tr>
		  
		  <tr>     
<td width="12%">Billing City<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%"><input type="text" name="billingcity" id="billingcity" class="inputbxs" value="<?php if(isset($customer[0]->billing_city)){echo $customer[0]->billing_city;}else{echo $this->input->post('billingcity');};
?>" /></td>
            
                      </tr>
		  
            
 
          <tr>     
<td width="12%">Contact Person<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%"><input type="text" name="billing_con_person" id="billing_con_person" class="inputbxs" value="<?php if(isset($customer[0]->billing_contact_person)){echo $customer[0]->billing_contact_person;}else{echo $this->input->post('billing_con_person');};?>
" /></td>
            
            <td>Company Address<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
            <td><input  type="text" name="billing_comp_address" value="<?php if(isset($customer[0]->billing_comp_address)){echo $customer[0]->billing_comp_address;}else{echo $this->input->post('billing_comp_address');};?>"  id="compaddress" class="inputbxs" /></td>
          </tr>


            </tr>
          
          <tr>     
            
            <td>Customer GSTIN Number<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
        
            <td><input  type="text" name="billing_gst_number" value="<?php if(isset($customer[0]->billing_cus_gst_num)){echo $customer[0]->billing_cus_gst_num;}else{echo $this->input->post('billing_gst_number');};?> "  id="billing_gst_number" class="inputbxs" /></td>
          </tr>
            <tr>     
<td width="12%">Pan Number<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%"><input type="text" name="billing_pan_number" id="billing_pan_number" class="inputbxs" value="<?php if(isset($customer[0]->billing_pan_number)){echo $customer[0]->billing_pan_number;}else{echo $this->input->post('billing_pan_number');};?>    
" /></td>
            
            <td>Place Of Supply<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
                        <td>
            <input  type="text" name="billing_place_supply" value="<?php if(isset($customer[0]->billing_place_supply)){echo $customer[0]->billing_place_supply;}else{echo $this->input->post('billing_place_supply');};?> "  id="billing_place_supply" class="inputbxs" /></td>
          </tr>
            
                   

<!--------End Billling Information----> 


<!---------Start Shipping --------> 


<tr>
         <td><strong>Shipping Information</strong></td>
        </tr>
          
          <tr>     
<td width="12%">Company Name<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
 
<td width="37%"><input type="text" name="shipping_comp_name" id="shipping_comp_name" class="inputbxs" value="<?php if(isset($customer[0]->shipping_company_name)){echo $customer[0]->shipping_company_name;}else{echo $this->input->post('shipping_comp_name');};?>" /></td>
            
            <td>Region<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
            <td>
            <select name="shipping_comp_region" id="shipping_comp_region" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
                <option value="North"<?php if($customer[0]->shipping_region=='North'){echo 'selected';}else{if($this->input->post('shipping_comp_region')=="North"){ echo 'selected'; };} ?>>North</option>
                
                <option value="West"<?php if($customer[0]->shipping_region=='West'){echo 'selected';}else{if($this->input->post('shipping_comp_region')=="North"){ echo 'selected'; };} ?>>West</option>
                <option value="South"<?php if($customer[0]->shipping_region=='South'){echo 'selected';}else{if($this->input->post('shipping_comp_region')=="North"){ echo 'selected'; };} ?>>South</option>
                <option value="East"<?php if($customer[0]->shipping_region=='East'){echo 'selected';}else{if($this->input->post('shipping_comp_region')=="North"){ echo 'selected'; };} ?>>East</option>
              
                
                </select>
            
            </td>
          </tr>
           
           
        

		
           <tr>     
<td width="12%">City<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%"><input type="text" name="shipping_city" id="shipping_city" class="inputbxs" value="<?php if(isset($customer[0]->shipping_city)){echo $customer[0]->shipping_city;}else{echo $this->input->post('shipping_city');};?>" /></td>
            
          
          
          <tr> 
      
            <td>Contact Person<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
            
            <td>
             <input  type="text" name="shipping_com_con_person" value="<?php if(isset($customer[0]->shipping_contact_person)){echo $customer[0]->shipping_contact_person;}else{echo $this->input->post('shipping_com_con_person');};?>
"  id="shipping_com_con_person" class="inputbxs" />
            
            </td>
          </tr>
           
           <tr>     
<td width="12%">Company Address<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%">

<input  type="text" name="shipping_comp_address" value="<?php if(isset($customer[0]->shipping_com_address)){echo $customer[0]->shipping_com_address;}else{echo $this->input->post('shipping_comp_address');};?>"  id="shipping_comp_address" class="inputbxs" />
</td>
            
            
            
          </tr>
          
          
          <tr>     
<td width="12%">Customer GSTIN Number<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>

<td width="37%">
<input  type="text" name="shipping_gst_num" value="<?php if(isset($customer[0]->shipping_gst_number)){echo $customer[0]->shipping_gst_number;}else{echo $this->input->post('shipping_gst_num');};?>
"  id="shipping_gst_num" class="inputbxs" />
</td>
            
            <td>PAN Number<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
            <td>
             <input  type="text" name="shipping_pan_num" value=" <?php if(isset($customer[0]->shipping_pan_number)){echo $customer[0]->shipping_pan_number;}else{echo $this->input->post('shipping_pan_num');};?>
"  id="supplyplace" class="inputbxs" />
            
            </td>
          </tr>
          
          <tr>     
<td width="12%">Place Off Supply<span class="mndaty_aptrp" style="color:#FF0000;"></span></td>
<td width="37%">
 

<input  type="text" name="shipping_place_supply" value="<?php if(isset($customer[0]->shipping_place_supply)){echo $customer[0]->shipping_place_supply;}else{echo $this->input->post('shipping_place_supply');};?>"  id="shipping_place_supply" class="inputbxs" />
</td>
        <!---
		<td>Purpose of Purchase<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="shipping_purpose" id="shipping_purpose" onchange="dis_able()"  class="inputbxs">
                <option value="Home"
				<?php // if($this->input->post('shipping_purpose')=="Home"){ echo 'selected'; } ?>>Home</option>
                <option value="Personal"<?php // if($this->input->post('shipping_purpose')=="Personal"){ echo 'selected'; } ?>>Personal</option>
                <option value="Official"<?php // if($this->input->post('shipping_purpose')=="Official"){ echo 'selected'; } ?>>Official</option>
                <option value="Gift"<?php // if($this->input->post('shipping_purpose')=="Gift"){ echo 'selected'; } ?>>Gift</option>
              </select>
            </td>   
           -----> 
          </tr>



       



<!---------End Shipping----------->     
        
          
          
          
          
 <!---End Extra Filed From Here--->         
          
          

         <!-- <tr>
            <td>Gift Address:</td>
            <td><input disabled type="text" name="giftaddress" id="giftaddress" class="inputbxs" value="Pls specify" />
              <br/>
              <br/>
              <input name="gift_address_check" type="checkbox"  onclick="fill_address()" />
              Same as Above</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>-->
          <tr>
            <td><input type="submit" class="bt-sbt-upload" name="upload images" id="upload images" value="Add"  /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
<!--MIDDLE PAGE WRAPPER ENDS-->
</div>


<script>
$(document).ready(function(){
	$("#occupationb2cp").change(function()
	{
	      var occupationb2cp=$("#occupationb2cp").val();
		  
				//alert(occupationb2cp);
				 if(occupationb2cp=='Other'){
						 $("#otherb2cp").css("display", "block");
					 }else{
						 $("#otherb2cp").css("display", "none");
						 
						 }
				
				
				
    });
});
</script>



