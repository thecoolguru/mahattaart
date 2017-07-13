
<?php //print_r($package_rows);
//
//$curr =  date('d-m-Y');
//$str = explode("-",$curr);
//$year =  substr($str[2], 2, 3);
//$order = rand();
//$filename = sprintf('%04d', $order);
//$package_code= 'PKG'.$str[0].$str[1].$year.$filename; 
//print_r($package_code);
?>
  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> Add New Packaging</div>
    <div class="add-newcp"><span style="color:#F00;font-size:16px"><?php 
     if($msg<>'')
     {print $msg;
         ?>
            <script>setTimeout(function(){ outTime()},2500);
                function outTime(){
                   window.location.href="add_packaging";
                }
            </script><?php
     }
    ?></span>
     <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_packaging"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      <form action="<?=base_url()?>index.php/backend/add_packaging_details" id="add_printer_form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="package_code22" value="<?=$package_code?>">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr style="background:#e5e5e5">
            <td>Personal / Company Information </td>
            <td>&nbsp;</td>
          </tr>
          <tr class="toptr">
            <td>Name*</td>
            <td><input type="text" name="name" id="name" class="inputbxs" />
              <br />
              <span id="name_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Contact Person Name*</td>
            <td><input type="text" name="contactname" id="contactname" class="inputbxs" />
              <br />
              <span id="contactname_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Contact Land line*</td>
            <td><input type="text" name="contact" onkeypress="return isNumber(event)" maxlength="10" id="contact" class="inputbxs" placeholder="Enter Only Number"/>
              <br />
              <span id="contact_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Contact Mobile*</td>
            <td><input type="text" name="mobile" onkeypress="return isNumber(event)" maxlength="10" id="mobile" class="inputbxs" placeholder="Enter Only Number"/>
              <br />
              <span id="mobile_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Contact email*</td>
            <td><input type="text" name="email" id="email" class="inputbxs" />
              <br />
              <span id="email_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Address*</td>
            <td><textarea name="address" id="address" class="inputbxs" ></textarea>
              <br />
              <span id="address_error" style="color:#F00"></span></td>
          </tr>
          <!--  <tr class="toptr">    <td>City*</td>    <td><input type="text" name="city" id="city" class="inputbxs" /><br /><span id="city_error" style="color:#F00"></span></td>    </tr>-->
          <tr class="toptr">
            <td>State*</td>
            <td><input type="text" name="state" id="state" class="inputbxs" />
              <br />
              <span id="state_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Pin Code*</td>
            <td><input type="text" name="pin_code" onkeypress="return isNumber(event)" maxlength="6" id="pin_code" class="inputbxs" placeholder="Enter Only Number" />
              <br />
              <span id="pin_code_error" style="color:#F00"></span></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><select name="vender_status" id="vender_status" class="inputbxs">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
              <span id="vender_status_error" style="color:#F00"></span></td>
          </tr>
          <!--<tr class="toptr">    <td>Region</td>    <td><select name="region" id="region" class="inputbxs" style="width:243px;"><option>Select Region</option><option>North</option><option>South</option><option>East</option><option>West</option></select></td>    </tr>-->
          <!---------------------------------------printing_details--------------------------------------------------------------------------------------------->
          <!-- <tr style="background:#e5e5e5">    <td>Printing Details</td>    <td>&nbsp;</td>    </tr>   <!--    <tr>    <td>Type of Surface</td>    <td>Surface Code</td>    <td>Cost/sq. inch</td>    <td>Time/print</td>     </tr>   <tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr>      <tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr>    <tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr><tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr><tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr>-->
          <!--<tr>    <td>Max prints/day</td>    <td><input type="text"name="max_prints" id="max_prints" class="inputbxs" placeholder="Max prints/day"/></td>    </tr>        <tr>    <td>Min prints/day</td>    <td><input type="text"name="min_prints" id="min_prints" class="inputbxs" placeholder="Min prints/day"/></td>    </tr>         <tr>    <td>GSM of Surface</td>    <td><input type="text"name="gsm_sur" id="gsm_sur" class="inputbxs" placeholder="GSM of Surface"/></td>    </tr>    <tr>    <td>Printing machine-width(max size 40)</td>    <td><input type="text"name="print_mac" id="print_mac" class="inputbxs" placeholder="Printing machine-width"/></td>    </tr>          <tr>    <td>Off Days</td>    <td><input type="text"name="off_days" id="off_days" class="inputbxs" placeholder="Off Days"/></td>    </tr>-->
          <!--------------------------------------------------packaging_details_start-------------------------------------------------------------------------->
          
          <!--------------------------------------------------------packaging_details_end/other_details_start-------------------------------------------------------------------------------->
          <tr style="background:#e5e5e5">
            <td>Other Details</td>
            <td>&nbsp;</td>
          </tr>
          <!--<tr>   <td>Delivery to framer</td>  <td><input type="radio" name="delivery_to_framer" id="delivery_to_framer" value="1" checked>Yes</input><br/><input type="radio" name="delivery_to_framer" id="delivery_to_framer" value="0">No</input></td>  </tr>-->
          <tr>
            <td>Delivery to office</td>
            <td><input type="radio" name="delivery_to_office" id="delivery_to_office" value="1" checked>
              Yes
              </input>
              <br/>
              <input type="radio" name="delivery_to_office" id="delivery_to_office" value="0">
              No
              </input></td>
          </tr>
          <tr>
            <td>Pick up from office</td>
            <td><input type="radio" name="pick_office" id="pick_office" value="1" checked>
              Yes
              </input>
              <br/>
              <input type="radio" name="pick_office" id="pick_office" value="0">
              No
              </input></td>
          </tr>
          <tr>
            <td>Labour charges</td>
            <td><input type="text" name="labour_charge" id="working_days" class="inputbxs" >
             </td>
          </tr>
          <tr>
            <td>Remarks</td>
            <td><textarea name="remark" id="remark" class="inputbxs" placeholder="Remarks"></textarea></td>
          </tr>
          <tr>
            <td>Satisfaction Level</td>
            <td><select name="level" id="level" style="width:243px; height:33px;" class="inputbxs">
                <option>Select Satisfaction Level</option>
                <option value="1">Excellent</option>
                <option value="2">Good</option>
                <option value="3">Fair</option>
                <option value="4">Average</option>
                <option value="5">Poor</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Upload Registration form </td>
            <td><input type="file" id="file_registration_form" name="file_registration_form">
             </td>
          </tr>
          <!------------------------------------------------------------other_details_end/payment_details_start---------------------------------------------------------------------------------------------------->
          <tr style="background:#e5e5e5">
            <td>Payment Details</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
          <tr>
            <td>Name on Cheque</td>
            <td><input type="text"name="cheque" id="cheque" class="inputbxs" placeholder="Name on Cheque"/></td>
          </tr>
          <tr>
            <td>Upload the file (If there is any change)</td>
            <td><input type="file" name="pdf_file" id="pdf_file" size="chars" />
              <br />
              <span id="pdf_error" style="color:#F00"></span></td>
          </tr>
          
          <tr>
            <td>Types of Vender</td>
            <td><input type="radio" name="typesofvender" id="typesofvender" value="1" checked>
              Services
              </input>
              <br/>
              <input type="radio" name="typesofvender" id="typesofvender" value="2">
              Row Material
              </input></td>
          </tr>
          
          <tr style="background:#e5e5e5">
              <td><b>Material offered:</b></td>
    <td></td>
    </tr>
    </table>
          <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton' >Add New Item</a> <a href="#!" class="subtractwcp" id='removeButton'>Remove Item</a></div>
       <br>
         <div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">  
            
            
            
            
            <table style="border-bottom: 0px;  width: 100%">
           
    <tr id="tr"> <td>Surface</td> <td>Amount</td><td>Qty</td><td>Unit</td><td>Height</td><td>Width</td><td>Depth </td><td>Color</td><td>Code</td><td>Description</td><td></td></tr>  
    
      <tr id="get_data">
     <td id="td2"><input type="text"name="surface[]" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="surface"/></td>
    <td id="td2"><input type="text"name="cost[]" id="cost1" class="inputbxs1" placeholder="Amount"/></td>
    <td id="td2"><input type="text"name="qty[]" id="qty1" class="inputbxs1" placeholder="Quantity"/></td>
    <td id="td2"><input type="text"name="unit[]" id="unit1" class="inputbxs1" placeholder="Unit"/></td>
    <td id="td2"><input type="text"name="height[]"  onblur="return get_data_with_height(this);" id="height" class="inputbxs1" placeholder="Height"/></td>
    <td id="td2"><input type="text"name="width[]" onblur="return get_data_with_height(this);" id="width" class="inputbxs1" placeholder="Width"/></td>
    <td id="td2"><input type="text"name="depth[]"  id="depth" class="inputbxs1" placeholder="Depth"/></td>
    <td id="td2"><input type="text"name="color[]" onblur="return get_data_with_height(this);" id="color" class="inputbxs1" placeholder="Color"/></td>
    
    <td > <input name="package_code[]" id="package_code_gen" style="    width: 73px; height: 29px; margin-top: 17px;"> </td>
    
    
    
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
       
       </table> 
            
                 
            
            
            
          </div></div>
          <br>
          
          
          <input type="submit" class="bt-sbt-upload" name="upload_images" id="upload images" value="Save" style="float: right;"  onclick="return Validate_printer();" />  
       
      </form>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
<!--MIDDLE PAGE WRAPPER ENDS-->
</div>
<style>
    .inputbxs1{ width: 51px; height:29px;  }
     .inputbxs2{ width: 49px; height:27px;}
     #td2{padding: 15px 0px 0px 17px;}
     #td{padding: 15px 0px 0px 9px;}
     #show_selectpicker{padding: 15px 0px 0px 6px;}
     #tr{ border-bottom: solid 2px; border-bottom-color:#faa21b;}
    </style>
<script type="text/javascript">
    function get_data_with_height(){ 
        var int = parseInt((Math.random() * 100), 10)
    var name=$('#name').val();  
    var height=$('#height').val();  
    var width=$('#width').val();  
    var color=$('#color').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=str_name+color_str+str_height+str_width+int;
      //alert(code_gen);
    document.getElementById('package_code_gen').value=code_gen;   
     $.ajax({
         
         type:"post",
         url:"get_code_color",
         data:'height='+height+'&width='+width+'&color='+color,
         success: function(response){
             //alert(response)
              
              
               $('#display_name_list').html(response);   
            
             }
     });
   }// end function
    
    $(document).on("blur", ".inputbxs1", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
         //alert(myBookId);
    var name=$('#name').val();  
    var height=$('#height'+myBookId).val();  
    var width=$('#width'+myBookId).val();  
    var color=$('#color'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=str_name+color_str+str_height+str_width+int;
      //alert(code_gen);
      document.getElementById('package_code_gen'+myBookId).value=code_gen;   
     //document.getElementById('package_code'+myBookId).value=code_gen;
     $.ajax({
         
         type:"post",
         url:"get_code_color",
         data:'height='+height+'&width='+width+'&color='+color,
         success: function(response){
           $('#display_name_list'+myBookId).html(response);        
        
        }/// ajax function end 
   });/// onblue function end 
    });
    function show_newTextBox1()
 {
     document.getElementById('display_name').style.display="block";
      document.getElementById('display_name_list').style.display="none";
      document.getElementById('new_display_name').style.display="none";
      document.getElementById('list_display_name').style.display="block";
   
 }
 

 function show_oldTextBox1()
 {
    $('#display_name').hide();
    $('#new_display_name').show();
    $('#display_name_list').show();
    $('#list_display_name').hide();
    }
 $(document).ready(function(){ 
    $(document).on("click", ".newClass", function () {
     var myBookId = $(this).data('id');
     var action = $(this).data('action');
      
      var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv' + myBookId);
    var target = document.getElementById('display_name_list');
    var wrap = document.createElement('td');
    wrap.appendChild(target.cloneNode(true));
    var display_name_list=  wrap.innerHTML;
    
    
    
   //alert(action);
    if(action=='new_list')
    {
        
   var my_new_texBox='<a  href="" id="new_textBox'+myBookId+'" class="newClass" style="margin-left:5px" data-toggle="modal" data-id="'+myBookId+'" data-action="old_list">Old Display Name</a><br><input type="text" name="display_name[]" id="display_name" style="width: 93px; height: 28px;    margin-left: 12px;">';
    document.getElementById('text_box'+myBookId).innerHTML= my_new_texBox;
     document.getElementById('list_display_name'+myBookId).style.display="block";  
      
   }else if(action=='old_list')
    {
       
    var my_new_texBox='<a  href="" id="new_textBox'+myBookId+'" class="newClass" style="margin-left:5px" data-toggle="modal" data-id="'+myBookId+'" data-action="new_list">New Display Name</a><br>'+display_name_list;
     document.getElementById('text_box'+myBookId).innerHTML= my_new_texBox;
      document.getElementById('list_display_name'+myBookId).style.display="none";  
   
    }
});
    
    
});// end fuinction 
 
 $(document).ready(function(){

   var counter = 2;
		
    $("#addButton").click(function () {
        
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
  var newTextBoxDiv = $(document.createElement('div'))
   .attr("id", 'TextBoxDiv1' + counter);
      newTextBoxDiv.after().html(
   '<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr style="padding: 11px 17px 13px 25px;"><td id="td"><input type="text"name="surface[]" id="surface'+counter+'" class="inputbxs2" style="margin-left: 8px;" placeholder="surface"/></td> <td id="td"><input type="text"name="cost[]" id="cost'+counter+'" class="inputbxs2" placeholder="Amount"/></td><td id="td"><input type="text"name="qty[]" id="qty'+counter+'" class="inputbxs2" placeholder="Quantity"/></td><td id="td"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs2" placeholder="Unit"/></td><td id="td"><input type="text"name="gsm[]" id="gsm'+counter+'" class="inputbxs2" placeholder="GSM"/></td><td id="td"><input type="text"name="height[]" id="height'+counter+'" class="inputbxs1"  data-toggle="modal"  data-id="'+counter+'" placeholder="Height"/></td><td id="td"><input type="text"name="width[]"  data-toggle="modal"  data-id="'+counter+'" id="width'+counter+'" class="inputbxs1" placeholder="Width"/></td><td id="td"><input type="text"name="depth[]"  id="depth'+counter+'"  class="inputbxs1" placeholder="Depth"/></td><td id="td"><input type="text"name="color[]"  data-toggle="modal"  data-id="'+counter+'"  id="color'+counter+'"  class="inputbxs1" placeholder="Color"/></td><td id="td"> <input name="package_code[]" id="package_code_gen'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"> </td><td id="td"><textarea name="desc[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');
       newTextBoxDiv.appendTo("#TextBoxesGroup");
      counter++;
      //show_newTextBox(counter)
     });

     $("#removeButton").click(function () {
	if(counter==2){
           
          alert("No more textbox to remove");
          return false;
       }   
         //alert(counter);
	counter--;
	$("#TextBoxDiv1" + counter).remove();
     });
		
    
  });
  
  
   var clicks=0;
   
   function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
   
  function Validate_printer()
  {
      clicks++;
      //alert(clicks)
      
      var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
      var email=$('#email').val();
      
      if($('#name').val()=='')
      {
          alert('Enter company name ');
          //$('#name_error').HTML="Enter company name";
          $('#name').focus()
          return false;
      }
      if($('#contactname').val()=='')
      {
          alert('Enter contact name ');
          $('#contactname').focus()
          return false;
      }if($('#mobile').val()=='')
      {
          alert('Enter mobile no. ');
          $('#mobile').focus()
          return false;
      }
      
        if($('#email').val()=='')
      {
          alert('Enter email id ');
          $('#email').focus()
          return false;
      }
      
      
      if($('#email').val()!='')
      {
          if(reg.test(email)==false)
          {
          alert('Enter valid email id ');
          $('#email').focus()
          return false;
           }
      }
      
      
      
      if($('#address').val()=='')
      {
          alert('Enter address');
          $('#address').focus()
          return false;
      }if($('#state').val()=='')
      {
          alert('Enter state');
          $('#state').focus()
          return false;
      }
      
        if($('#packaging_cost').val()=='')
      {
          alert('Enter packing cost ');
          $('#packaging_cost').focus()
          return false;
      }
        if($('#packaging_time').val()=='')
      {
          alert('Enter packing time');
          $('#packaging_time').focus()
          return false;
      }
        if($('#packaging_material').val()=='')
      {
          alert('Enter packing material');
          $('#packaging_material').focus()
          return false;
      }
        if($('#pin_code').val()=='')
      {
          alert('Enter pin code ');
          $('#pin_code').focus()
          return false;
      }
      
      
      
      
      if($('#surface'+clicks).val()=='')
      {
          alert('Enter surface');
          $('#surface'+clicks).focus()
          return false;
      }
      if($('#rate'+clicks).val()=='')
      {
          alert('Enter rate');
          $('#rate'+clicks).focus()
          return false;
      }
      if($('#per_feet'+clicks).val()=='')
      {
          alert('Enter per feet');
          $('#per_feet'+clicks).focus()
          return false;
      }
      if($('#display_name'+clicks).val()=='')
      {
          alert('Enter Display name');
          $('#display_name'+clicks).focus()
          return false;
      }

     if($('#desc'+clicks).val()=='')
      {
          alert('Enter description');
          $('#desc'+clicks).focus()
          return false;
      }






  }// end function
  
  
  
  
  
  
  
  
  
</script>
  