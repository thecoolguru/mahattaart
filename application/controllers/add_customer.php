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



  var input = document.getElementById(field);

 //alert(input); 

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


function ChangeCustomerType()
{
    var customer_type =document.getElementById('customer_type').value;
   if(customer_type=='B2B')  
   {
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
document.getElementById('occupationb2cp').style.display="none";
        
    }else if(customer_type=='B2C'){
       // alert(customer_type);
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
document.getElementById('occupationb2cp').style.display="none";

        }else if(customer_type=='B2CP'){
       // alert(customer_type);
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
      <div> <?php echo validation_errors();?></div>
      <form action="<?=base_url()?>index.php/customer/add_customer" method="post" onSubmit="return validate();" name="form1" id="form1">
          <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customerid;?>" />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40" colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <td width="12%">First Name<span style="color:#FF0000;">*</span></td>
            <td width="37%"><input type="text" name="fname" id="fname" class="inputbxs" /></td>
            <td width="18%">Last Name<span style="color:#FF0000;">*</span></td>
            <td width="33%"><input type="text" name="lname" id="lname" class="inputbxs" /></td>
          </tr>
          
           
          
          
          <tr>
            <td>Customer Type<span style="color:#FF0000;">*</span></td>
            <td><select name="customer_type" id="customer_type" onchange="ChangeCustomerType()"  class="inputbxs">
                <option  value="0" >Select</option>
                <option value="B2B">B2B</option>
                <option value="B2C">B2C</option>
                <option value="B2CP">B2CP</option>
               </select></td>
               <td ><span id="Industry_text" style="display: none;">Industry<span style="color:#FF0000;">*</span></td>
               <td >
                   
                   <select name="occupation" id="occupation"  style="display: none;" onchange="return SelectIndustry();"  class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Architect">Architect</option>
                <option value="Art_Consultant">Art Consultant</option>
                <option value="Business">Business</option>
                <option value="Furnishing">Furnishing</option>
                <option value="Hospitality">Hospitality</option>
                <option value="Hotel">Hotel </option>
                <option value="Interior_Architect">Interior/ Architect</option> 
                <option value="Restaurant">Restaurant</option>
                 <option value="Service">Service</option>
                <option value="Other">Other</option>
              </select>
               <br>
                <input type="text" placeholder="Other Industry" name="otherIndusry" id="otherIndusry" class="inputbxs" style="display:none;">     
			 
<!--              When customer select B2CP-->
              
              <select name="occupationb2cp" id="occupationb2cp"  style="display: none;" onchange="return SelectIndustryb2cp();"  class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Architect">Architect</option>
                <option value="Art_Consultant">Art Consultant</option>
                <option value="(Interior_designer">Interior Designer</option> 
                <option value="e commerce">e commerce</option>
                 <option value="Service">Service</option>
                <option value="Other_b2cp">Other</option>
              </select>
			 
                <br>
                <input type="text" placeholder="Other Industry" name="otherb2cp" id="otherb2cp" class="inputbxs" style="display:none;">
                   
                   
			  </td>
          </tr>
          
          
          
        
          
          <tr>
            <td>Email ID<span style="color:#FF0000;">*</span></td>
            <td><input type="text" name="email" id="email" class="inputbxs" /></td>
           
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
              <td><span id="relationshipmanagelbl" style="display:none;">Relationship Manager<span style="color:#FF0000;">*</span></span></td>
              <td><input type="text" style="display:none;" name="relationshipmanage" id="relationshipmanagetxt"   class="inputbxs"></td>
              <td ><span id="account_typelbl" style="display:none;" >Account Type<span style="color:#FF0000;">*</span></span></td>
              <td ><select style="display:none;" name="account_type" id="account_type"    class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Key">Key</option>
                <option value="Potential">Potential</option>
                <option value="New">New</option>
                <option value="Dormant">Dormant</option>
                <option value="Floating">Floating</option>
               </select>
			 
	    </td>
          </tr>
          
          
           <tr >
          
               <td ><span id="Registered_fromlbl"  style="display:none;"  >Registered from:<span style="color:#FF0000;">*</span></td>
               <td ><select  id="Registered_fromtxt" style="display:none;"  name="Registered_from"    class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Web">Web</option>
                <option value="Backend">Backend</option>
                </select>
			 
			  </td>
               
               <td ><span id="vender_contractlbl"  >Vendor contract signed:<span style="color:#FF0000;">*</span></td>
               <td ><select name="vender_contract" id="vender_contracttxt"     class="inputbxs">
                <option  value="0" >Select</option>
                <option value="Signed">Signed</option>
                <option value="Not-Signed">Not Signed</option>
                <option value="Not-required">Not required</option>
               </select>
			 
			  </td>
          </tr>  
          
           
          
		  <tr>
		  <td></td> <td></td><td></td><td><input  name="industry" id="industry" class="inputbxs"  placeholder="Other Industry"  style="display:none;"  /></td></tr>
		  <tr>
                      <td>Password:</td> <td><input type="password"  name="password" id="password" class="inputbxs"  placeholder="Password"   /></td><td>Re-Type Password:</td><td><input type="password"  name="new_password" id="new_pwd" class="inputbxs"   placeholder="Re-Type Password"  /></td></tr>
		  <tr>
		  <td></td> <td></td><td></td><td></td></tr>
		  
          <!--<tr>
            <td></td>
            <td></td>
            <td>Other Occupation:</td>
            <td><input disabled type="text" name="occupation_other" id="occupation_other" class="inputbxs" value="Pls specify"   /></td>
          </tr>-->
          <tr>
            <td>Gender<span style="color:#FF0000;">*</span></td>
            <td><select name="gender" id="gender" class="inputbxs" >
                <option value="0"selected="selected">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Address<span style="color:#FF0000;">*</span></td>
            <td colspan="3"><input type="text" name="address" id="address"class="inputbxs" style="width:600px" /></td>
          </tr>
          <tr>
            <td>Country<span style="color:#FF0000;">*</span></td>
            <td><select name="country" id="country" onchange="enable_other_country()" class="inputbxs" >
<!--                <option value= "0" selected="selected">Select</option>
-->                <option value="India">India</option>
<!--                <option value="other">Other</option>
-->              </select></td>
            <td>State<span style="color:#FF0000;">*</span></td>
            <td><select name="state" id="state" class="inputbxs">
                <option  value="0"selected="selected">Select</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Orissa">Orissa</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
              </select></td>
          </tr>
          <tr>
            <td>Other Country:</td>
            <td><input disabled="disabled" type="text" name="country_other" id="country_other" class="inputbxs" value="Pls Specify" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>City<span style="color:#FF0000;">*</span></td>
            <td><input type="text" name="city" id="city" class="inputbxs" />
            </td>
            <td>Region<span style="color:#FF0000;">*</span></td>
            <td><select name="region" id="region"  class="inputbxs">
                <option value="0" selected="selected">Select</option>
                <option value="East">East</option>
                <option value="West">West</option>
                <option value="North">North</option>
                <option value="South">South</option>
              </select></td>
          </tr>
          <tr>
            <td>Company Name</td>
            <td><input type="text" name="company_name" id="company_name" class="inputbxs" /></td>
            <td>Contact Number<span style="color:#FF0000;">*</span></td>
            <td><input type="text" name="contact" id="contact"  maxlength="10" onKeyPress="return numbersonly(event);" class="inputbxs" /></td>
          </tr>
          <tr>
            <td>Purpose<span style="color:#FF0000;">*</span></td>
            <td><select name="purpose" id="purpose" onchange="dis_able()"  class="inputbxs">
                <option>Home</option>
                <option>Personal</option>
                <option>Official</option>
                <option value="Gift">Gift</option>
              </select>
            </td>
            <td>Pin Code<span style="color:#FF0000;">*</span></td>
            <td><input  type="text" name="pincode" maxlength="6" id="pincode" class="inputbxs" onKeyPress="return numbersonly(event);" /></td>
          </tr>
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
