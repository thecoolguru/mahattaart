

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
 $customerid="WAL".$str;
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
	   //document.getElementById('mndaty_aptrp').style.display="none";
document.getElementById('Industry_text').style.display="block";
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
      <form action="<?=base_url()?>index.php/customer/add_customer_final" method="post" onSubmit="return validate();" name="form1" id="form1">
          <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customerid;?>" />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40" colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <td width="12%">First Name<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
 <td width="37%"><input type="text" name="fname" id="fname" class="inputbxs" value="<?php echo set_value('fname');?>" /></td>
            <td width="18%">Last Name<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td width="33%"><input type="text" name="lname" id="lname" class="inputbxs" value="<?php echo set_value('lname');?>" /></td>
          </tr>
          
           
          
          
          <tr>
            <td>Customer Type<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="customer_type" id="customer_type" onchange="ChangeCustomerType()"  class="inputbxs">
<option  value="0" >Select</option>
<option value="B2B"<?php if($this->input->post('customer_type')=="B2B"){ echo 'selected'; } ?>>B2B</option>
<option value="ONLINE"<?php if($this->input->post('customer_type')=="ONLINE"){ echo 'selected'; } ?>>ONLINE</option>
<option value="RETAIL"<?php if($this->input->post('customer_type')=="RETAIL"){ echo 'selected'; } ?>>RETAIL</option>
               </select></td>
<td ><span id="Industry_text" style="display:none;">Industry<span class="mndaty_aptrp" style="color:#FF0000;" >*</span></td>
               <td >

                   <select name="occupation" id="occupation"  style="display: none;" onchange="return SelectIndustry();"  class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Architect" <?php if($this->input->post('occupation')=="Architect"){ echo 'selected'; } ?>>Architect</option>
                <option value="Art_Consultant" <?php if($this->input->post('occupation')=="Art Consultant"){ echo 'selected'; } ?>>Art Consultant</option>
                <option value="Business" <?php if($this->input->post('occupation')=="Business"){ echo 'selected'; } ?>>Business</option>
                <option value="Furnishing"<?php if($this->input->post('occupation')=="Furnishing"){ echo 'selected'; } ?>>Furnishing</option>
                <option value="Hospitality"<?php if($this->input->post('occupation')=="Hospitality"){ echo 'selected'; } ?>>Hospitality</option>
                <option value="Hotel"<?php if($this->input->post('occupation')=="Hotel"){ echo 'selected'; } ?>>Hotel </option>
                <option value="Interior_Architect"<?php if($this->input->post('occupation')=="Interior/ Architect"){ echo 'selected'; } ?>>Interior/ Architect</option> 
                <option value="Restaurant"<?php if($this->input->post('occupation')=="Restaurant"){ echo 'selected'; } ?>>Restaurant</option>
                 <option value="Service"<?php if($this->input->post('occupation')=="Service"){ echo 'selected'; } ?>>Service</option>
                <option value="Other"<?php if($this->input->post('occupation')=="Other"){ echo 'selected'; } ?>>Other</option>
              </select>
               <br>
<input type="text" placeholder="Other Industry" name="otherIndusry" value="<?php if($this->input->post('otherIndusry')){echo $this->input->post('otherIndusry') ;}?>" id="otherIndusry" class="inputbxs" style="display:none;">     
			 
<!--              When customer select B2CP-->
              
              <select name="occupationb2cp" id="occupationb2cp"  style="display: none;" onchange="return SelectIndustryb2cp();"  class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Architect"<?php if($this->input->post('occupationb2cp')=="Architect"){ echo 'selected'; } ?> >Architect</option>
                <option value="Art Consultant"<?php if($this->input->post('occupationb2cp')=="Art Consultant"){ echo 'selected'; } ?>>Art Consultant</option>
                <option value="Interior Designer"<?php if($this->input->post('occupationb2cp')=="Interior Designer"){ echo 'selected'; } ?>>Interior Designer</option> 
                <option value="e commerce" <?php if($this->input->post('occupationb2cp')=="e commerce"){ echo 'selected'; } ?>>e commerce</option>
                 <option value="Service"<?php if($this->input->post('occupationb2cp')=="Service"){ echo 'selected'; } ?>>Service</option>
                <option value="Other_b2cp"<?php if($this->input->post('occupationb2cp')=="Other_b2cp"){ echo 'selected'; } ?>>Other</option>
              </select>
			 
                <br>
                <input type="text" placeholder="Other Industry" name="otherb2cp" id="otherb2cp" value="<?php if($this->input->post('otherb2cp')){echo $this->input->post('otherb2cp') ;}?>" class="inputbxs" style="display:none;">
                   
                   
			  </td>
          </tr>
          
          
          
        
          
          <tr>
            <td>Email ID<span style="color:#FF0000;">*</span></td>
            <td><input type="text" name="email" id="email" class="inputbxs" value="<?php echo set_value('email');?>"/></td>
           
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
<input type="text" style="display:none;" name="relationshipmanage" id="relationshipmanagetxt"class="inputbxs"value="<?php if($this->input->post('relationshipmanage')){echo $this->input->post('relationshipmanage') ;}?>"></td>
              <td ><span id="account_typelbl" style="display:none;" >Account Type<span class="mndaty_aptrp" style="color:#FF0000;">*</span></span></td>
              <td ><select style="display:none;" name="account_type" id="account_type"    class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Key"<?php if($this->input->post('account_type')=="Key"){ echo 'selected'; } ?>>Key</option>
                <option value="Potential"<?php if($this->input->post('account_type')=="Potential"){ echo 'selected'; } ?>>Potential</option>
                <option value="New"<?php if($this->input->post('account_type')=="New"){ echo 'selected'; } ?>>New</option>
                <option value="Dormant"<?php if($this->input->post('account_type')=="Dormant"){ echo 'selected'; } ?>>Dormant</option>
                <option value="Floating"<?php if($this->input->post('account_type')=="Floating"){ echo 'selected'; } ?>>Floating</option>
               </select>
			 
	    </td>
          </tr>
           <tr >
          
               <td ><span id="Registered_fromlbl"  style="display:none;"  >Registered from:<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
               <td ><select  id="Registered_fromtxt" style="display:none;"  name="Registered_from"    class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Web" <?php if($this->input->post('Registered_from')=="Web"){ echo 'selected'; } ?>>Web</option>
                <option value="Backend"<?php if($this->input->post('Registered_from')=="Backend"){ echo 'selected'; } ?>>Backend</option>
                </select>
			 
			  </td>
               
               <td ><span id="vender_contractlbl"  >Vendor contract signed:<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
               <td ><select name="vender_contract" id="vender_contracttxt"     class="inputbxs">
<option  value="0" >Select</option>
<option value="Signed"<?php if($this->input->post('vender_contract')=="Signed"){ echo 'selected'; } ?>>Signed</option>
<option value="Not-Signed" <?php if($this->input->post('vender_contract')=="Not Signed"){ echo 'selected'; } ?>>Not Signed</option>
<option value="Not-required" <?php if($this->input->post('vender_contract')=="Not required"){ echo 'selected'; } ?>>Not required</option>
               </select>
			 
			  </td>
          </tr>  
          
           
          
		  <tr>
		  <td></td> <td></td><td></td><td><input  name="industry" id="industry" class="inputbxs"  placeholder="Other Industry"  style="display:none;"  /></td></tr>
		  <tr>
                      <td>Password:</td> <td><input type="password"  name="password" id="password" class="inputbxs"  placeholder="Password"value="<?php echo set_value('password');?>"   /></td>
                      <td>Re-Type Password:</td><td><input type="password"  name="new_password" id="new_pwd" class="inputbxs"   placeholder="Re-Type Password"
         value="<?php echo set_value('new_password');?>" /></td></tr>
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
                <option value="Male"<?php if($this->input->post('gender')=="Male"){ echo 'selected'; } ?>>Male</option>
                <option value="Female" <?php if($this->input->post('gender')=="Female"){ echo 'selected'; } ?>>Female</option>
              </select></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Address<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td colspan="3"><input type="text" value="<?php echo set_value('address');?>" name="address" id="address"class="inputbxs" style="width:600px" /></td>
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
<option value="Andhra Pradesh"<?php if($this->input->post('state')=="Andhra Pradesh"){ echo 'selected'; } ?>>Andhra Pradesh</option>
<option value="Arunachal Pradesh" <?php if($this->input->post('state')=="Arunachal Pradesh"){ echo 'selected'; } ?>>Arunachal Pradesh</option>
<option value="Assam"<?php if($this->input->post('state')=="Assam"){ echo 'selected'; } ?>>Assam</option>
<option value="Chhattisgarh"<?php if($this->input->post('state')=="Chhattisgarh") { echo 'selected';}?>>Chhattisgarh</option>
<option value="Delhi"<?php if($this->input->post('state')=="Delhi") { echo 'selected';}?>>Delhi</option>
<option value="Goa"<?php if($this->input->post('state')=="Goa"){ echo 'selected'; } ?>>Goa</option>
<option value="Gujarat"<?php if($this->input->post('state')=="Gujarat"){ echo 'selected'; } ?>>Gujarat</option>
<option value="Haryana"<?php if($this->input->post('state')=="Haryana"){ echo 'selected'; } ?>>Haryana</option>
<option value="Himachal Pradesh"<?php if($this->input->post('state')=="Himachal Pradesh"){ echo 'selected'; } ?>>Himachal Pradesh</option>
<option value="Jammu and Kashmir"<?php if($this->input->post('state')=="Jammu and Kashmir"){ echo 'selected'; } ?>>Jammu and Kashmir</option>
<option value="Jharkhand"<?php if($this->input->post('state')=="Jharkhand"){ echo 'selected'; } ?>>Jharkhand</option>
<option value="Karnataka"<?php if($this->input->post('state')=="Karnataka"){ echo 'selected'; } ?>>Karnataka</option>
<option value="Kerala"<?php if($this->input->post('state')=="Kerala"){ echo 'selected'; } ?>>Kerala</option>
<option value="Madhya Pradesh"<?php if($this->input->post('state')=="Madhya Pradesh"){ echo 'selected'; } ?>>Madhya Pradesh</option>
<option value="Maharashtra"<?php if($this->input->post('state')=="Maharashtra"){ echo 'selected'; } ?>>Maharashtra</option>
<option value="Manipur"<?php if($this->input->post('state')=="Manipur"){ echo 'selected'; } ?>>Manipur</option>
<option value="Meghalaya" <?php if($this->input->post('state')=="Meghalaya"){ echo 'selected'; } ?>>Meghalaya</option>
<option value="Mizoram"<?php if($this->input->post('state')=="Mizoram"){ echo 'selected'; } ?>>Mizoram</option>
<option value="Nagaland"<?php if($this->input->post('state')=="Nagaland"){ echo 'selected'; } ?>>Nagaland</option>
<option value="Orissa"<?php if($this->input->post('state')=="Orissa"){ echo 'selected'; } ?>>Orissa</option>
<option value="Punjab"<?php if($this->input->post('state')=="Punjab"){ echo 'selected'; } ?>>Punjab</option>
<option value="Rajasthan"<?php if($this->input->post('state')=="Rajasthan"){ echo 'selected'; } ?>>Rajasthan</option>
<option value="Sikkim"<?php if($this->input->post('state')=="Sikkim"){ echo 'selected'; } ?>>Sikkim</option>
<option value="Tamil Nadu"<?php if($this->input->post('state')=="Tamil Nadu"){ echo 'selected'; } ?>>Tamil Nadu</option>
<option value="Tripura"<?php if($this->input->post('state')=="Tripura"){ echo 'selected'; } ?>>Tripura</option>
<option value="Uttar Pradesh"<?php if($this->input->post('state')=="Uttar Pradesh"){ echo 'selected'; } ?>>Uttar Pradesh</option>
<option value="Uttarakhand"<?php if($this->input->post('state')=="Uttarakhand"){ echo 'selected'; } ?>>Uttarakhand</option>
<option value="West Bengal"<?php if($this->input->post('state')=="West Bengal"){ echo 'selected'; } ?>>West Bengal</option>
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
            <td><input type="text" name="city" value="<?php echo set_value('city');?>" id="city" class="inputbxs" />
            </td>
            <td>Region<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="region" id="region"  class="inputbxs">
                <option value="0" selected="selected">Select</option>
                <option value="East"<?php if($this->input->post('region')=="East"){ echo 'selected'; } ?>>East</option>
                <option value="West"<?php if($this->input->post('region')=="West"){ echo 'selected'; } ?>>West</option>
                <option value="North"<?php if($this->input->post('region')=="North"){ echo 'selected'; } ?>>North</option>
                <option value="South"<?php if($this->input->post('region')=="South	"){ echo 'selected'; } ?>>South</option>
              </select></td>
          </tr>
          <tr>
            <td>Company Name</td>
            <td>
 <input type="text"name="company_name" id="company_name" class="inputbxs" value="<?php if($this->input->post('relationshipmanage')){echo $this->input->post('company_name') ;}?>"/>
           </td>
            <td>Contact Number<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><input type="text" value="<?php  echo set_value('contact');?>" name="contact" id="contact"  maxlength="10" onKeyPress="return numbersonly(event);" class="inputbxs" /></td>
          </tr>
             
          <tr>
            <td>Purpose<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="purpose" id="purpose" onchange="dis_able()"  class="inputbxs">
                <option value="Home"
				<?php if($this->input->post('purpose')=="Home"){ echo 'selected'; } ?>>Home</option>
                <option value="Personal"<?php if($this->input->post('purpose')=="Personal"){ echo 'selected'; } ?>>Personal</option>
                <option value="Official"<?php if($this->input->post('purpose')=="Official"){ echo 'selected'; } ?>>Official</option>
                <option value="Gift"<?php if($this->input->post('purpose')=="Gift"){ echo 'selected'; } ?>>Gift</option>
              </select>
            </td>
            <td>Pin Code<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><input  type="text" name="pincode" value="<?php if($this->input->post('pincode')){echo $this->input->post('pincode') ;}?>" maxlength="6" id="pincode" class="inputbxs" onKeyPress="return numbersonly(event);" /></td>
          </tr>  
		  
		  
		  
		  <tr>
            <td>I'am a <span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><select name="iama" id="iama" onchange=""  class="inputbxs">
                <option value="Hotelier"<?php if($this->input->post('iama')=="Hotelier"){ echo 'selected'; } ?>>Hotelier</option>
                <option value="Interior Designer"<?php if($this->input->post('iama')=="Interior Designer"){ echo 'selected'; } ?>>Interior Designer</option>
                <option value="Architects"<?php if($this->input->post('iama')=="Architects"){ echo 'selected'; } ?>>Architects</option>
                <option value="B2C Customer"<?php if($this->input->post('iama')=="B2C Customer"){ echo 'selected'; } ?>>B2C Customer</option>
				<option value="Corporate"<?php if($this->input->post('iama')=="Corporate"){ echo 'selected'; } ?>>Corporate</option>
				<option value="Design House"<?php if($this->input->post('iama')=="Design House"){ echo 'selected'; } ?>>Design House</option>
				
              </select>
            </td>
            <td>Job Description<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
			<select name="job_description" id="job_description" onchange=""  class="inputbxs">
                <option value="Purchase Manager"<?php if($this->input->post('job_description')=="Purchase Manager"){ echo 'selected'; } ?>>Purchase Manager</option>
                <option value="Owner"<?php if($this->input->post('job_description')=="Owner"){ echo 'selected'; } ?>>Owner</option>
                <option value="CEO"  <?php if($this->input->post('job_description')=="CEO"){ echo 'selected'; } ?>>CEO</option>
                <option value="COO"  <?php if($this->input->post('job_description')=="COO"){ echo 'selected'; } ?>>COO</option>
				<option value="Interior_Designer"<?php if($this->input->post('job_description')=="Interior_Designer"){ echo 'selected'; } ?>>Interior Designer</option>
				<option value="Architects"<?php if($this->input->post('job_description')=="Architects"){ echo 'selected'; } ?>>Architects</option>
				<option value="Art_Buyer"<?php if($this->input->post('job_description')=="Art_Buyer"){ echo 'selected'; } ?>>Art Buyer</option>
				<option value="Art_Collector"<?php if($this->input->post('job_description')=="Art_Collector"){ echo 'selected'; } ?>>Art Collector</option>
				<option value="Vice_President"<?php if($this->input->post('job_description')=="Vice_President"){ echo 'selected'; } ?>>Vice President</option>
				
              </select>
            </td>          
					  
			</tr>  
		  
		  
		  
          
          
          
          <!---Add Extra Filed From Here--->
          
          
          
          <!---Mailing Fields--->
          
        <tr>
         <td><strong>Mainling Information</strong></td>
        </tr>
          
          <tr>     
<td width="12%">Mail Address<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="mailstreetaddress" id="mailstreetaddress" class="inputbxs" value="<?php if($this->input->post('mailstreetaddress')){echo $this->input->post('mailstreetaddress') ;}?>" /></td>
            
            <td>City<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><input  type="text" name="mainlingcity" value="<?php if($this->input->post('mainlingcity')){echo $this->input->post('mainlingcity') ;}?>"  id="mainlingcity" class="inputbxs" /></td>
          </tr>
          <tr>     
<td width="12%">State<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="mailingstate" id="mailingstate" class="inputbxs" value="<?php if($this->input->post('mailingstate')){echo $this->input->post('mailingstate') ;}?>" /></td>
            
            <td>Postal Code<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><input  type="text" name="mailposatcode"  onkeypress='return event.charCode >=48 && event.charCode <=57' value="<?php if($this->input->post('mailposatcode')){echo $this->input->post('mailposatcode') ;}?>"  id="mailposatcode" class="inputbxs" /></td>
          </tr>
          <tr>     
<td width="12%">Country<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="mailingcountry" id="mailingcountry" class="inputbxs" value="<?php if($this->input->post('mailingcountry')){echo $this->input->post('mailingcountry') ;}?>" /></td>
            
            <td>Telephone Number<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><input  type="text" onkeypress='return event.charCode >=48 && event.charCode <=57' name="mailingphone" value="<?php if($this->input->post('mailingphone')){echo $this->input->post('mailingphone') ;}?>"  id="mailingphone" class="inputbxs" /></td>
          </tr>
          
          <tr>     
<td width="12%">Mobile Number<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" onkeypress='return event.charCode >=48 && event.charCode <=57' name="mailingmobile" id="mailingmobile" class="inputbxs" value="<?php if($this->input->post('mailingmobile')){echo $this->input->post('mailingmobile') ;}?>" /></td>
          
          </tr>
            
<!---Mailing Fields--->
        
        
        
        
<!---------Billing Information------>

 <tr>
         <td><strong>Billing Information</strong></td>
        </tr>
          
          <tr>     
<td width="12%">Company Name<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="billingcomname" id="billingcomname" class="inputbxs" value="<?php if($this->input->post('billingcomname')){echo $this->input->post('billingcomname') ;}?>" /></td>
            
            <td>Region<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
            <select name="billingregion" id="billingregion" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
                <option value="North"<?php if($this->input->post('billingregion')=="North"){ echo 'selected'; } ?>>North</option>
                
                <option value="West"<?php if($this->input->post('billingregion')=="West"){ echo 'selected'; } ?>>West</option>
                <option value="South"<?php if($this->input->post('billingregion')=="South"){ echo 'selected'; } ?>>South</option>
                <option value="East"<?php if($this->input->post('billingregion')=="East"){ echo 'selected'; } ?>>East</option>
              
                
                </select>
            
            </td>
          </tr>
		  
		  <tr>     
<td width="12%">Billing City<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="billingcity" id="billingcity" class="inputbxs" value="<?php if($this->input->post('billingcity')){echo $this->input->post('billingcity') ;}?>" /></td>
            
                      </tr>
		  
            
   <!--         
            <tr>     
<td width="12%">Cutomer Acount Type<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%">
<select name="bactype" id="bactype" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
                <option value="Key"<?php if($this->input->post('bactype')=="Key"){ echo 'selected'; } ?>>Key</option>
                <option value="Potencial"<?php if($this->input->post('Potencial')=="Potencial"){ echo 'selected'; } ?>>Potencial</option>
                <option value="Normal"<?php if($this->input->post('Normal')=="Normal"){ echo 'selected'; } ?>>Normal</option>               
                </select>


</td>
            
            <td>Customer Business Type<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
               <select name="cbtype" id="cbtype" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
                <option value="B2B"<?php if($this->input->post('cbtype')=="B2B"){ echo 'selected'; } ?>>B2B</option>
                
               <option value="Online"<?php if($this->input->post('Online')=="Online"){ echo 'selected'; } ?>>Online</option>
               <option value="Retail"<?php if($this->input->post('Retail')=="Reatil"){ echo 'selected'; } ?>>Retail</option>

                
                </select>
           
            
            </td>
          </tr>
          --->
          <tr>     
<td width="12%">Contact Person<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="billing_con_person" id="billing_con_person" class="inputbxs" value="<?php if($this->input->post('billing_con_person')){echo $this->input->post('billing_con_person') ;}?>" /></td>
            
            <td>Company Address<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><input  type="text" name="billing_comp_address" value="<?php if($this->input->post('billing_comp_address')){echo $this->input->post('billing_comp_address') ;}?>"  id="compaddress" class="inputbxs" /></td>
          </tr>


            </tr>
          
          <tr>     
<td width="12%">Account Sales Person<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="billing_sale_person" id="billing_sale_person" class="inputbxs" value="<?php if($this->input->post('billing_sale_person')){echo $this->input->post('billing_sale_person') ;}?>" /></td>
            
            <td>Customer GSTIN Number<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td><input  type="text" name="billing_gst_number" value="<?php if($this->input->post('billing_gst_number')){echo $this->input->post('billing_gst_number') ;}?>"  id="billing_gst_number" class="inputbxs" /></td>
          </tr>
            <tr>     
<td width="12%">Pan Number<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="billing_pan_number" id="billing_pan_number" class="inputbxs" value="<?php if($this->input->post('billing_pan_number')){echo $this->input->post('billing_pan_number') ;}?>" /></td>
            
            <td>Place Of Supply<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
            <input  type="text" name="billing_place_supply" value="<?php if($this->input->post('billing_place_supply')){echo $this->input->post('billing_place_supply') ;}?>"  id="billing_place_supply" class="inputbxs" /></td>
          </tr>
            
                   

<!--------End Billling Information----> 


<!---------Start Shipping --------> 


<tr>
         <td><strong>Shipping Information</strong></td>
        </tr>
          
          <tr>     
<td width="12%">Company Name<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="shipping_comp_name" id="shipping_comp_name" class="inputbxs" value="<?php if($this->input->post('shipping_comp_name')){echo $this->input->post('shipping_comp_name') ;}?>" /></td>
            
            <td>Region<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
            <select name="shipping_comp_region" id="shipping_comp_region" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
                <option value="North"<?php if($this->input->post('shipping_comp_region')=="North"){ echo 'selected'; } ?>>North</option>
                
                <option value="West"<?php if($this->input->post('shipping_comp_region')=="West"){ echo 'selected'; } ?>>West</option>
                <option value="South"<?php if($this->input->post('shipping_comp_region')=="South"){ echo 'selected'; } ?>>South</option>
                <option value="East"<?php if($this->input->post('shipping_comp_region')=="East"){ echo 'selected'; } ?>>East</option>
              
                
                </select>
            
            </td>
          </tr>
           
           
        

		
           <tr>     
<td width="12%">City<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%"><input type="text" name="shipping_city" id="shipping_city" class="inputbxs" value="<?php if($this->input->post('shipping_city')){echo $this->input->post('shipping_city') ;}?>" /></td>
            <!--
            <td>Customer Account Type<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
            <select name="shipping_cus_ac_type" id="shipping_cus_ac_type" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
                <option value="Key"<?php if($this->input->post('shipping_cus_ac_type')=="Key"){ echo 'selected'; } ?>>Key</option>
                <option value="Potencial"<?php if($this->input->post('shipping_cus_ac_type')=="Potencial"){ echo 'selected'; } ?>>Potencial</option>
                <option value="Normal"<?php if($this->input->post('shipping_cus_ac_type')=="Normal"){ echo 'selected'; } ?>>Normal</option>               
                </select>

            
            </td>
			
			--->
          </tr>
          
          
          <tr> 
<!--- 		  
<td width="12%">Customer Business Type<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%">
<select name="shipping_cus_busi_type" id="shipping_cus_busi_type" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
               <option value="B2B"<?php if($this->input->post('shipping_cus_busi_type')=="B2B"){ echo 'selected'; } ?>>B2B</option>
               <option value="Online"<?php if($this->input->post('shipping_cus_busi_type')=="Online"){ echo 'selected'; } ?>>Online</option>
               <option value="Retail"<?php if($this->input->post('shipping_cus_busi_type')=="Retail"){ echo 'selected'; } ?>>Retail</option>

                
                </select>

</td>
  -->          
            <td>Contact Person<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
             <input  type="text" name="shipping_com_con_person" value="<?php if($this->input->post('shipping_com_con_person')){echo $this->input->post('shipping_com_con_person') ;}?>"  id="shipping_com_con_person" class="inputbxs" />
            
            </td>
          </tr>
           
           <tr>     
<td width="12%">Company Address<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%">
<input  type="text" name="shipping_comp_address" value="<?php if($this->input->post('shipping_comp_address')){echo $this->input->post('shipping_comp_address') ;}?>"  id="shipping_comp_address" class="inputbxs" />
</td>
            
            <td>Account Sales Person<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
             <input  type="text" name="shipping_ac_sales_person" value="<?php if($this->input->post('shipping_ac_sales_person')){echo $this->input->post('shipping_ac_sales_person') ;}?>"  id="shipping_ac_sales_person" class="inputbxs" />
            
            </td>
          </tr>
          
          
          <tr>     
<td width="12%">Customer GSTIN Number<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%">
<input  type="text" name="shipping_gst_num" value="<?php if($this->input->post('shipping_gst_num')){echo $this->input->post('shipping_gst_num') ;}?>"  id="shipping_gst_num" class="inputbxs" />
</td>
            
            <td>PAN Number<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
            <td>
             <input  type="text" name="shipping_pan_num" value="<?php if($this->input->post('shipping_pan_num')){echo $this->input->post('shipping_pan_num') ;}?>"  id="supplyplace" class="inputbxs" />
            
            </td>
          </tr>
          
          <tr>     
<td width="12%">Place Off Supply<span class="mndaty_aptrp" style="color:#FF0000;">*</span></td>
<td width="37%">
<input  type="text" name="shipping_place_supply" value="<?php if($this->input->post('shipping_place_supply')){echo $this->input->post('shipping_place_supply') ;}?>"  id="shipping_place_supply" class="inputbxs" />
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
		  
				alert(occupationb2cp);
				 if(occupationb2cp=='Other'){
						 $("#otherb2cp").css("display", "block");
					 }else{
						 $("#otherb2cp").css("display", "none");
						 
						 }
				
				
				
    });
});
</script>



