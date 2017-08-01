<?php //echo $printer_rows;

$curr =  date('d-m-Y');
$str = explode("-",$curr);
$year =  substr($str[2], 2, 3);
$order = rand();
$filename = sprintf('%04d', $order);
$printer_code= 'PTR'.$str[0].$str[1].$year.$filename; 


$curr =  date('d-m-Y');
$str = explode("-",$curr);
$year =  substr($str[2], 2, 3);
$order = rand();
$filename = sprintf('%04d', $order);
$other_code= 'OTH'.$str[0].$str[1].$year.$filename; 

?>

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> Add New Printer</div>
            <div class="add-newcp"><span style="color:#F00;font-size:16px">
        <?php
    if($msg<>'')
    {
        ?><script>setTimeout(function(){timeOut();},2000); function timeOut(){window.location.href="add_printer/<?=$edit_id?>"}</script><?php
    }
    print $msg;?>
                    
        </span>
       <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_printer_details"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      <form action="<?=base_url()?>index.php/backend/add_printer_details" id="add_printer_form" method="post" enctype="multipart/form-data">
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
          <tr>
            <td>Labor Charge</td>
            <td><input type="text"name="labor_charge" id="labor_charge" class="inputbxs" placeholder="Labor Charge"/></td>
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
            
             <input type="hidden" name="printer_code[]" value="<?=$printer_code?>">
              <input type="hidden" name="product_code[]" id="product_code_gen" >
            
            
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Surface</td> <td>Cost</td><td>Unit</td><td>No of Pieces</td><td>QTY</td><td>GSM</td><td>Height</td><td>Width</td><td>Display Name </td> <td>Description</td><td></td></tr>  
    
   <tr>
       <td><input type="text"name="surface[]" onblur="return get_product_code();"  style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="surface"/></td>
    <td><input type="text"name="cost[]" id="cost1" class="inputbxs1" placeholder="Cost"/></td>
    <td><input type="text"name="unit[]" id="unit1" class="inputbxs1" placeholder="Unit"/></td>
    <td><select name="noofpices" style="height: 29px; padding-left: 20px;
    margin-left: 9px;
    width: 80px;"><option value="roll">Roll</option><option value="cut_sheet">Cut Sheet</option></select></td>
    <td><input type="text" name="qty[]" id="qty" class="inputbxs1"  placeholder="Quantity"> </td>
    <td><input type="text"name="gsm[]" id="gsm1" class="inputbxs1" placeholder="GSM"/></td>
    <td><input type="text"name="height[]" id="height" class="inputbxs1" placeholder="Height"/></td>
    <td><input type="text"name="width[]" id="width" class="inputbxs1" placeholder="Width"/></td>
    <td id="show_selectpicker">
        <a onclick="return show_newTextBox1(); " style="margin-left:25px;" id="new_display_name">New Display Name</a><a onclick="return show_oldTextBox1(); " style="margin-left:25px; display:none;"  id="list_display_name" >Old Display Name</a><br>
        
        <select name="display_name_list[]" id="display_name_list"  class="inputbxs1" style="height: 29px; padding-left:0px;
    margin-left: 0px;
    width: 92px;">
            <option value="">---Select---</option>
            <?php foreach($printer_rows as $values){?>
            <option  value="<?=$values->display_name;?>"><?php echo $values->display_name;?></option>
            <?php }?>
        </select>
       
       <input  type="text"  name="display_name[]" id="display_name<?php echo $data_values->printer_id;?>"  style="display:none; width: 92px; height: 28px;    margin-left: 12px;"  >
        <?php //}?>
    </td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
       
       </table> 
            
                 
            
            
            
          </div></div>
          <br>
          
          <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton6' >Add Row</a> <a href="#!" class="subtractwcp" id='removeButton6'>Remove Row</a></div>
       <br>
       
        <div id='TextBoxesGroup6'>
	<div id="TextBoxDiv6">  
            <input type="hidden" name="product_code[]" id="product_code_geno" value="" >
            <input type="hidden" name="printer_code[]" value="<?=$other_code?>">
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Other Name</td> <td>Amount</td><td>Qty</td><td>Unit</td></tr>  
    
                <tr id="get_data">
       <td id="td10"><input type="text"name="surface[]" onblur="return get_product_codeo();"  style="margin-right: 0px;" id="othername" class="inputbxs10" placeholder="Other Name"/></td>
    <td id="td10"><input type="text"name="cost[]" id="cost1" class="inputbxs10" placeholder="Amount"/></td>
    <td id="td10"><input type="text"name="qty[]" id="qty1" class="inputbxs10" placeholder="Quantity"/></td>
    <td id="td10"><input type="text"name="unit[]" id="unit1" class="inputbxs10" placeholder="Unit"/></td>
    </tr>
     
       
       </table> 
          </div></div>
       
       
          
          
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
     .inputbxs2{ width: 63px; height:27px;}
     .inputbxs10{ width: 160px; height:27px;}
       .inputbxs11{ width: 158px; height:27px;}
      #td10{padding: 10px 11px 6px 84px}
     #td11{padding: 10px 11px 6px 67px}
     #td{padding: 15px 0px 0px 26px;padding: 8px;}
     #tr{ border-bottom: solid 2px; border-bottom-color:#faa21b;}
    </style>
    <?php
$curr =  date('d-m-Y');
$str = explode("-",$curr);
$year =  substr($str[2], 2, 3);
 $code=$str[0].$str[1].$year;
    ?>
<script type="text/javascript">
    
    
    
    function get_product_code(){ 
    var int = parseInt((Math.random() * 100), 10);
   var code_gen='PTR'+<?=$code?>+int;
      //alert(code_gen);
    document.getElementById('product_code_gen').value=code_gen;   
     
   }// end function  
    
   
  function get_product_codeo(){ 
    var int = parseInt((Math.random() * 100), 10);
   var code_gen='PTR'+<?=$code?>+int;
      //alert(code_gen);
    document.getElementById('product_code_geno').value=code_gen;   
     
   }// end function  
    
  



$(document).ready(function(){ 
    $(document).on("click", ".inputbxs2", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10);
      var code_gen='PTR'+<?=$code?>+int;
      //alert(code_gen);
      document.getElementById('product_code_gen'+myBookId).value=code_gen;  
    });
    });
 
    
 
$(document).ready(function(){ 
    $(document).on("click", ".inputbxs11", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10);
      var code_gen='PTR'+<?=$code?>+int;
      //alert(code_gen);
      document.getElementById('product_code_geno'+myBookId).value=code_gen;  
    });
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

$('#display_name_list').show();
$('#list_display_name').hide();
 $('#new_display_name').show();

    var counter = 2;
		
    $("#addButton").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv' + counter);
    var target = document.getElementById('display_name_list');
    var wrap = document.createElement('td');
    wrap.appendChild(target.cloneNode(true));
    var display_name_list=  wrap.innerHTML;
    
    newTextBoxDiv.after().html(
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr style="padding: 11px 17px 13px 25px;"><td id="td"><input type="hidden" name="product_code[]" id="product_code_gen'+counter+'" ><input type="hidden" name="printer_code[]" value="<?=$printer_code?>"><input type="text"name="surface[]" id="surface'+counter+'"  data-toggle="modal" data-id="'+counter+'" class="inputbxs2" style="margin-left: 17px;" placeholder="surface"/></td> <td id="td"><input type="text"name="cost[]" id="cost'+counter+'" class="inputbxs2" placeholder="Cost"/></td><td id="td"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs2" placeholder="Unit"/></td><td><select name="noofpices" style="height: 29px; padding-left: 20px;margin-left: 9px;width: 80px;"><option value="roll">Roll</option><option value="cut_sheet">Cut Sheet</option></select></td><td id="td"><input type="text"name="qty[]" id="qty'+counter+'" class="inputbxs2" placeholder="Quantity"/></td><td id="td"><input type="text"name="gsm[]" id="gsm'+counter+'" class="inputbxs2" placeholder="GSM"/></td><td><input type="text"name="height[]" id="height" class="inputbxs1" placeholder="Height"/></td><td><input type="text"name="width[]" id="width" class="inputbxs1" placeholder="Width"/></td><td id="text_box'+counter+'"><a  href="" id="new_textBox'+counter+'" class="newClass" style="margin-left:5px" data-toggle="modal" data-id="'+counter+'" data-action="new_list">New Display Name</a><a data-toggle="modal" data-id="'+counter+'" data-action="old_list" class="newClass" style="margin-left:25px; display:none; "  id="list_display_name'+counter+'" >Old Display Name</a><br>'+display_name_list+'</td><td id="td"><textarea name="desc[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');
       newTextBoxDiv.appendTo("#TextBoxesGroup");
       newTextBoxDiv.appendTo("#display_name"+counter);
	counter++;
      //show_newTextBox(counter)
     });

     $("#removeButton").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          ;
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv" + counter).remove();
      
     });
		
     $("#getButtonValue").click(function () {
		
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
  });
  
  
  
   $(document).ready(function(){

$('#display_name_list').show();
$('#list_display_name').hide();
 $('#new_display_name').show();

    var counter = 2;
		
    $("#addButton6").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv6' + counter);
    var target = document.getElementById('display_name_list');
    var wrap = document.createElement('td');
    wrap.appendChild(target.cloneNode(true));
    var display_name_list=  wrap.innerHTML;
    
    newTextBoxDiv.after().html(
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td11"> <input type="hidden" name="product_code[]" id="product_code_geno'+counter+'" ><input type="hidden" name="printer_code[]" value="<?=$other_code?>"><input type="text"name="surface[]"  data-toggle="modal" data-id="'+counter+'" id="othername'+counter+'" class="inputbxs11" style="margin-left: 17px;" placeholder="Other Name"/></td> <td id="td11"><input type="text"name="cost[]" id="cost'+counter+'" class="inputbxs11" placeholder="Amount"/></td><td id="td11"><input type="text"name="qty[]" id="rate'+counter+'" class="inputbxs11" placeholder="Quantity"/></td><td id="td11"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs11" placeholder="Unit"/></td></tr></table>');
       newTextBoxDiv.appendTo("#TextBoxesGroup6");
       newTextBoxDiv.appendTo("#display_name"+counter);
	counter++;
      //show_newTextBox(counter)
     });

     $("#removeButton6").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          ;
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv6" + counter).remove();
      
     });
		
     $("#getButtonValue").click(function () {
		
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
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
  