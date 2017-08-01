
  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> Add New Framer</div>
    <div class="add-newcp"><span style="color:#F00;font-size:16px"><?php 
     if($msg<>'')
     {print $msg;
         ?>
            <script>setTimeout(function(){ outTime1()},2500);
                function outTime(){
                   window.location.href="add_framer";
                }
            </script><?php
     }
    ?></span>
     <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_frames"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      <form action="<?=base_url()?>index.php/backend/add_framer_details" id="add_printer_form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="package_code" value="<?=$package_code?>">
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
            <td>Labor Charge</td>
            <td><input type="text"name="labor_charge" id="labor_charge" class="inputbxs" placeholder="Labor Charge"/></td>
          </tr>
          <tr>
            <td>Types of Vender</td>
            <td><input type="radio" name="typesofvender" id="typesofvender1" value="1" onclick="return show_vender_services('services');" checked>
              Services
              </input>
              <br/>
              <input type="radio" name="typesofvender" id="typesofvender2" onclick="return show_vender_services('row_material');"  value="2">
              Row Material
              </input></td>
          </tr>
          
          <tr style="background:#e5e5e5">
              <td><b>Material offered:</b></td>
    <td></td>
    </tr>
    </table>
          <div id="select_services">
          <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton' >Add Row</a> <a href="#!" class="subtractwcp" id='removeButton'>Remove Row</a></div>
       <br>
         <div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">  
            
            
           <?php
          $frame_code=  $this->backend_model->get_frame_code('frame_name');
           ?> 
            <input type="hidden" name="some_code[]" id="some_code" value="<?=$frame_code?>">
            <table style="border-bottom: 0px;  width: 100%">
           
         <tr id="tr"> <td>Frame Name</td> <td>Unit</td><td>Rate</td><td>Width</td><td>Depth</td><td>Color</td><td>Display Name </td> <td>Code Generation</td><td>Description</td></tr>  
    
                <tr id="get_data">
       <td id="td0"><input type="text"name="framename[]" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="Frame Name"/></td>
       <td id="td0"><input type="text"name="unit[]" style="margin-right: -5px;" id="unit" class="inputbxs1" placeholder="Unit"/></td>
    <td id="td0"><input type="text"name="rate[]" id="cost1" class="inputbxs1" placeholder="Rate"/></td>
    <td id="td0"><input type="text"name="width[]" onblur="return get_data_with_height(this);" id="width" class="inputbxs1" placeholder="Width"/></td>
    <td id="td0"><input type="text"name="length[]"  id="length" class="inputbxs1" placeholder="Depth"/></td>
    <td id="td0"><input type="text"name="color[]" onblur="return get_data_with_height(this);" id="color" class="inputbxs1" placeholder="Color"/></td>
    <td id="show_selectpicker">
        <a onclick="return show_newTextBox1(); " style="margin-left:25px;" id="new_display_name">New Display Name</a><a onclick="return show_oldTextBox1(); " style="margin-left:25px; display:none;"  id="list_display_name" >Old Display Name</a><br>
        
        <select name="display_name_list[]" id="display_name_list"  class="inputbxs1" style="height: 29px; padding-left:0px;
    margin-left: 0px;
    width: 92px;">
            <option value="">---Select---</option>
            <?php foreach($package_rows as $values){?>
            <option  value="<?=$values->sur_code;?>"><?php echo $values->sur_code;?></option>
            <?php }?>
        </select>
       
       <input  type="text"  name="display_name[]" id="display_name<?php echo $data_values->printer_id;?>"  style="display:none; width: 92px; height: 28px;    margin-left: 12px;"  >
        <?php //}?>
    </td>
    <td >
         
        <input name="frame_code[]" id="package_code_gen" style="    width: 73px; height: 29px; margin-top: 17px;">
       
       
    </td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       
   </tr>
        </table> 
            </div></div>
         
          <br>
         
          <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton2' >Add New Item</a> <a href="#!" class="subtractwcp" id='removeButton2'>Remove Item</a></div>
       <br>
         <div id='TextBoxesGroup2'>
	<div id="TextBoxDiv2">  
            
            
            
             <?php
          $mgb_name=  $this->backend_model->get_frame_code('mgb_name');
           ?> 
            <input type="hidden" name="some_code[]" id="some_code" value="<?=$mgb_name?>">
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>M+g+b Name</td> <td>Unit</td><td>Rate</td><td>Depth</td><td>Color</td><td>Code Generation</td> <td>Description</td><td></td></tr>  
    
                <tr id="get_data">
       <td id="td3"><input type="text"name="framename[]" style="margin-right: -5px;" id="mgbname" class="inputbxs3" placeholder="M+g+b Name"/></td>
    <td id="td3"><input type="text"name="unit[]" id="unit1" class="inputbxs3" placeholder="Unit"/></td>
       <td id="td3"><input type="text"name="rate[]" id="cost1" class="inputbxs3" placeholder="Rate"/></td>
<!--    <td id="td3"><input type="text"name="Quantity[]" id="rate1" class="inputbxs3" placeholder="Quantity"/></td>
    <td id="td3"><input type="text"name="height[]"  onblur="return get_data_with_height2(this);" id="height2" class="inputbxs3" placeholder="Height"/></td>
    <td id="td3"><input type="text"name="width[]"  onblur="return get_data_with_height2(this);" id="width2" class="inputbxs3" placeholder="Width"/></td>-->
    <td id="td3"><input type="text"name="length[]" id="length" class="inputbxs3" placeholder="Depth"/></td>
    <td id="td3"><input type="text"name="color[]" onblur="return get_data_with_height2(this);" id="color222" class="inputbxs3" placeholder="Color"/></td>
    
    <td>
        <input name="frame_code[]" id="package_code_gen22222" style="    width: 73px; height: 29px; margin-top: 17px;">
    </td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
       
       </table> 
            
                 
            
            
            
          </div></div>
          </div>
          <br>
          
     <!--- end vender services & row material area--->     
          
           
       
       
          
           <div id="row_material">
               
               
               <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton5' >Add Row</a> <a href="#!" class="subtractwcp" id='removeButton5'>Remove Row</a></div>
       <br>
       
        <div id='TextBoxesGroup5'>
	<div id="TextBoxDiv5">  
            <?php
          $hard_code=  $this->backend_model->get_frame_code('hardboard');
           ?> 
<input type="hidden" name="some_code[]" value="<?=$hard_code?>">
            
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Framer  Name</td> <td>Unit</td><td>Rate</td><td>Running in (Inch)</td><td>Width</td><td>Length</td><td>Color</td><td>Code Generation</td> <td>Description</td><td></td></tr>  
    
                <tr id="get_data">
       <td id="td2"><input type="text"name="framename[]" style="margin-right: -5px;" id="hardborad" class="inputbxs9" placeholder="framer Name"/></td>
    <td id="td2"><input type="text"name="unit[]" id="unit1" class="inputbxs9" placeholder="Unit"/></td>
    <td id="td2"><input type="text"name="cost[]" id="cost1" class="inputbxs9" placeholder="Rate"/></td>
    <td id="td2"><input type="text"name="height[]" onblur="return get_data_with_height5(this);" id="height5" class="inputbxs9" placeholder="Running in inch"/></td>
    <td id="td2"><input type="text"name="width[]" onblur="return get_data_with_height5(this);" id="width5" class="inputbxs9" placeholder="Width"/></td>
    <td id="td2"><input type="text"name="length[]"  id="length" class="inputbxs9" placeholder="Length"/></td>
    <td id="td2"><input type="text"name="color[]" onblur="return get_data_with_height5(this);" id="color5" class="inputbxs9" placeholder="Color"/></td>
    <td id="td2"><input name="frame_code[]" id="package_code_gen5" style="    width: 73px; height: 29px; margin-top: 17px;"></td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
       
       </table> 
            
                 
            
            
            
          </div></div>
       
       
               
               
          <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton3' >Add Row</a> <a href="#!" class="subtractwcp" id='removeButton3'>Remove Row</a></div>
       <br>
          <div id='TextBoxesGroup3'>
	<div id="TextBoxDiv3">  
            
            
             <?php
          $mount_code=  $this->backend_model->get_frame_code('mount_name');
           ?> 
<input type="hidden" name="some_code[]" id="some_code" value="<?=$mount_code?>">
            
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Mount Name</td><td>Unit</td> <td>Rate</td><td>QTY</td><td>Height</td><td>Width</td><td>Depth</td><td>Color</td><td>Code Generation</td><td>Description</td></tr>  
    
     <tr id="get_data">
       <td id="td2"><input type="text"name="framename[]" style="margin-right: -5px;" id="mgbname" class="inputbxs05" placeholder="Mount Name"/></td>
    <td id="td2"><input type="text"name="unit[]" id="unit3" class="inputbxs05" placeholder="Unit"/></td>
       <td id="td2"><input type="text"name="cost[]" id="cost3" class="inputbxs05" placeholder="Rate"/></td>
    <td id="td2"><input type="text"name="Quantity[]" id="qty3" class="inputbxs05" placeholder="Quantity"/></td>
    <td id="td2"><input type="text"name="height[]"  onblur="return get_data_with_height3(this);" id="height3" class="inputbxs05" placeholder="Height"/></td>
    <td id="td2"><input type="text"name="width[]"  onblur="return get_data_with_height3(this);" id="width3" class="inputbxs05" placeholder="Width"/></td>
    <td id="td2"><input type="text"name="length[]" id="length3" class="inputbxs05" placeholder="Depth"/></td>
    <td id="td2"><input type="text"name="color[]" onblur="return get_data_with_height3(this);" id="color3" class="inputbxs05" placeholder="Color"/></td>
    
    <td>
        <input name="frame_code[]" id="package_code_gen3" style="    width: 73px; height: 29px; margin-top: 17px;">
    </td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
     

     
       
       </table> 
            
                 
            
            
            
          </div></div>
         
          <br>
         
         <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButtong2' >Add New Item</a> <a href="#!" class="subtractwcp" id='removeButtong2'>Remove Item</a></div>
       <br>
         <div id='TextBoxesGroupg2'>
	<div id="TextBoxDivg2">  
              <?php
          $glass_code=  $this->backend_model->get_frame_code('glass_name');
           ?> 
            <input type="hidden" name="some_code[]" value="<?=$glass_code?>">
            
            
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Glass Name</td> <td>Unit</td><td>Rate</td><td>QTY</td><td>Height</td><td>Width</td><td>Depth</td><td>Color</td><td>Code Generation</td> <td>Description</td><td></td></tr>  
    
                <tr id="get_data">
       <td id="td6"><input type="text"name="framename[]" style="margin-right: 10px;" id="glassname" class="inputbxs8" placeholder="Glass Name"/></td>
	     <td id="td6"><input type="text"name="unit[]" id="unit1" class="inputbxs8" placeholder="Unit"/></td>
    <td id="td6"><input type="text"name="cost[]" id="cost1" class="inputbxs8" placeholder="Amount"/></td>
    <td id="td6"><input type="text"name="Quantity[]" id="Quantity1" class="inputbxs8" placeholder="Quantity"/></td>
   <td id="td6"><input type="text"name="height[]" onblur="return get_data_with_height4(this);" id="height4" class="inputbxs8" placeholder="Height"/></td>
    <td id="td6"><input type="text"name="width[]"  onblur="return get_data_with_height4(this);"id="width4" class="inputbxs8" placeholder="Width"/></td>
    <td id="td6"><input type="text"name="length[]" id="length" class="inputbxs8" placeholder="Depth"/></td>
    <td id="td6"><input type="text"name="color[]" onblur="return get_data_with_height4(this);" id="color4" class="inputbxs8" placeholder="Color"/></td>
     <td id="td6"><input name="frame_code[]" id="package_code_gen4" style="    width: 73px; height: 29px; margin-top: 17px;"></td>
    
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
       
       </table> 
            
                 
            
            
            
          </div></div>
      
       
       
       <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton6' >Add Row</a> <a href="#!" class="subtractwcp" id='removeButton6'>Remove Row</a></div>
       <br>
       
        <div id='TextBoxesGroup6'>
	<div id="TextBoxDiv6">  
            
            
            
            <?php
          $other_code=  $this->backend_model->get_frame_code('other_name');
           ?> 
            <input type="hidden" name="some_code[]" value="<?=$other_code?>">
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Other Name</td> <td>Amount</td><td>Rate</td><td>Unit</td><td>No of Pieces/lot</td></tr>  
    
                <tr id="get_data">
       <td id="td10"><input type="text"name="framename[]" style="margin-right: 0px;" id="othername" class="inputbxs10" placeholder="Other Name"/></td>
    <td id="td10"><input type="text"name="cost[]" id="cost1" class="inputbxs10" placeholder="Amount"/></td>
    <td id="td10"><input type="text"name="rate[]" id="rate1" class="inputbxs10" placeholder="Rate"/></td>
    <td id="td10"><input type="text"name="unit[]" id="unit1" class="inputbxs10" placeholder="Unit"/></td>
    
    <td id="td10"><select name="noofpices[]" style="height: 29px; padding-left: 20px;
    margin-left: 0px;
    width: 80px;"><option value="roll">Roll</option><option value="cut_sheet">Cut Sheet</option></select></td>
   </tr>
     
       
       </table> 
          </div></div>
       
       
          </div>
          
          
          
          <input type="submit" class="bt-sbt-upload" name="upload_images" id="upload images" value="Save" style="float: right;    margin-top: 11px;
    margin-right: 10px;"  onclick="return Validate_printer1();" />  
       
      </form>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
<!--MIDDLE PAGE WRAPPER ENDS-->
</div>
<style>
     .inputbxs1{ width: 69px; height:29px;  }
     .inputbxs2{ width: 63px; height:27px;}
    .inputbxs3{ width: 77px; height:29px;  }
     .inputbxs4{ width: 66px; height:27px;}
     .inputbxs05{ width: 91px; height:29px;  }
     .inputbxs5{ width: 78px; height:29px;  }
     .inputbxs6{ width: 74px; height:27px;}
      .inputbxs06{ width: 70px; height:27px;}
     .inputbxs8{ width: 72px; height:27px;}
     .inputbxs9{ width: 86px; height:27px;}
      .inputbxs10{ width: 160px; height:27px;}
       .inputbxs11{ width: 158px; height:27px;}
      #td0{padding: 10px 11px 0px 9px}
     #td1{padding: 15px 0px 0px 19px;}
     #td2{padding: 14px 0px 8px 10px}
     #td{padding: 10px 8px 9px 0px}
     #td3{padding: 10px 8px 9px 8px}
     #td4{padding: 1px 0px 0px 1px}
     #td5{padding: 10px 11px 0px 0px}
     #td6{padding: 10px 11px 0px 11px}
      #td06{padding: 10px 11px 0px 11px}
     #td7{padding: 10px 11px 0px 0px}
     #td10{padding: 10px 11px 6px 84px}
     #td11{padding: 10px 11px 6px 67px}
     
     #show_selectpicker{padding: 15px 0px 0px 6px;}
     #tr{ border-bottom: solid 2px; border-bottom-color:#faa21b;}
    </style>
<script type="text/javascript">
    function show_vender_services(element)
    {
        if(element=='row_material')
        {
           $('#row_material').show(); 
           $('#select_services').hide(); 
        }else if(element=='services')
        {
           $('#select_services').show(); 
           $('#row_material').hide(); 
        }
    }
    $(document).ready(function(){
        $('#select_services').show();
        $('#row_material').hide();
        
    });
  
   function get_data_with_height(){ 
    var int = parseInt((Math.random() * 100), 10);
    var name=$('#name').val();  
   // var height=$('#height').val();  
    var width=$('#width').val();  
    var color=$('#color').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
   // var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen='FRM'+str_name+color_str+str_width+int;
      //alert(code_gen);
    document.getElementById('package_code_gen').value=code_gen;   
     $.ajax({
         
         type:"post",
         url:"get_framer_code",
         data:'height='+height+'&width='+width+'&color='+color,
         success: function(response){
             //alert(response)
                $('#display_name_list').html(response);   
            
             }
     });
   }// end function
    $(document).on("blur", ".inputbxs2", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
         //alert(myBookId);
    var name=$('#name').val();  
   // var height=$('#height'+myBookId).val();  
    var width=$('#width'+myBookId).val();  
    var color=$('#color'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    //var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen='FRM'+str_name+color_str+str_width+int;
      //alert(code_gen);
      document.getElementById('package_code_gen'+myBookId).value=code_gen;   
     //document.getElementById('package_code'+myBookId).value=code_gen;
     
     
     $.ajax({
         
         type:"post",
         url:"get_framer_code",
         data:'height='+height+'&width='+width+'&color='+color,
         success: function(response){
             //alert(response)
                $('#display_name_list'+myBookId).html(response);   
            
             }
     });
     
    });
    
    
    //////////m g b code /////////////
    
    
    function get_data_with_height2(){ 
        
        //alert('asdas');
   var int = parseInt((Math.random() * 100), 10)
    var name=$('#name').val();  
    //var height=$('#height2').val();  
    //var width=$('#width2').val();  
    var color=$('#color222').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    //var str_height= height.substring(0, 2).toUpperCase();
    //var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen='MGB'+str_name+color_str+int;
      //alert(code_gen);
    document.getElementById('package_code_gen22222').value=code_gen;   
     
   }// end function
     
    $(document).on("blur", ".inputbxs4", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
         //alert(myBookId);
    var name=$('#name').val();  
    //var height=$('#height2'+myBookId).val();  
    //var width=$('#width2'+myBookId).val();  
    var color=$('#color2'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    //var str_height= height.substring(0, 2).toUpperCase();
    //var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen='MGB'+str_name+color_str+int;
      //alert(code_gen);
      document.getElementById('package_code_gen2'+myBookId).value=code_gen;   
     //document.getElementById('package_code'+myBookId).value=code_gen;
    
    });
   
////////code for mount/////////////////////

 function get_data_with_height3(){ 
        var int = parseInt((Math.random() * 100), 10)
    var name=$('#name').val();  
    var height=$('#height3').val();  
    var width=$('#width3').val();  
    var color=$('#color3').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen='MNT'+str_name+color_str+str_height+str_width+int;
      //alert(code_gen);
    document.getElementById('package_code_gen3').value=code_gen;   
     
   }// end function
     
    $(document).on("blur", ".inputbxs5", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
        //alert(myBookId);
    var name=$('#name').val();  
    var height=$('#height3'+myBookId).val();  
    var width=$('#width3'+myBookId).val();  
    var color=$('#color3'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str='MNT'+str_first+lastChar;
    var code_gen=str_name+color_str+str_height+str_width+int;
      //alert(code_gen);
      document.getElementById('package_code_gen3'+myBookId).value=code_gen;   
 
    
    });





////////code for glass name/////////////////////

 function get_data_with_height4(){ 
        var int = parseInt((Math.random() * 100), 10)
    var name=$('#name').val();  
    var height=$('#height4').val();  
    var width=$('#width4').val();  
    var color=$('#color4').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen='GLS'+str_name+color_str+str_height+str_width+int;
      //alert(code_gen);
    document.getElementById('package_code_gen4').value=code_gen;   
     
   }// end function
     
    $(document).on("blur", ".inputbxs6", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
        //alert(myBookId);
    var name=$('#name').val();  
    var height=$('#height4'+myBookId).val();  
    var width=$('#width4'+myBookId).val();  
    var color=$('#color4'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen='GLS'+str_name+color_str+str_height+str_width+int;
      //alert(code_gen);
      document.getElementById('package_code_gen4'+myBookId).value=code_gen;   
 
    
    });


////////code for Hardboard name/////////////////////

 function get_data_with_height5(){ 
        var int = parseInt((Math.random() * 100), 10)
    var name=$('#name').val();  
    var height=$('#height5').val();  
    var width=$('#width5').val();  
    var color=$('#color5').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen='FRM'+str_name+color_str+str_height+str_width+int;
      //alert(code_gen);
    document.getElementById('package_code_gen5').value=code_gen;   
     
   }// end function
     
    $(document).on("blur", ".inputbxs06", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
        //alert(myBookId);
    var name=$('#name').val();  
    var height=$('#height5'+myBookId).val();  
    var width=$('#width5'+myBookId).val();  
    var color=$('#color5'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen='FRM'+str_name+color_str+str_height+str_width+int;
      //alert(code_gen);
      document.getElementById('package_code_gen5'+myBookId).value=code_gen;   
 
    
    });


////////////////////HardBoard Name/////////////////






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
 ////// for frame name/////
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
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td2"><input hidden="text" name="some_code[]" value="<?=$frame_code?>"><input type="text"name="framename[]" id="framename'+counter+'" class="inputbxs2" style="margin-left: 0px;" placeholder="Frame Name"/></td> <td id="td2"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs2" placeholder="Unit"/></td><td id="td2"><input type="text"name="rate[]" id="cost'+counter+'" class="inputbxs2" placeholder="Rate"/></td><td><input type="text"name="width[]" id="width'+counter+'" data-toggle="modal"  data-id="'+counter+'" class="inputbxs2" placeholder="Width"/></td><td id="td2"><input type="text"name="lenght[]" id="lenght'+counter+'" class="inputbxs2" placeholder="Depth"/></td><td id="td2"><input type="text"name="color[]"  data-toggle="modal"  data-id="'+counter+'" id="color'+counter+'" class="inputbxs2" placeholder="Color"/></td><td id="text_box'+counter+'"><a  href="" id="new_textBox'+counter+'" class="newClass" style="margin-left:5px" data-toggle="modal" data-id="'+counter+'" data-action="new_list">New Display Name</a><a data-toggle="modal" data-id="'+counter+'" data-action="old_list" class="newClass" style="margin-left:25px; display:none; "  id="list_display_name'+counter+'" >Old Display Name</a><br><select name="display_name_list[]" id="display_name_list'+counter+'" class="inputbxs2" style="height: 29px; padding-left:0px;margin-left: 0px;width: 92px;"><option value="">---Select---</option><?php foreach($package_rows as $values){?><option  value="<?=$values->sur_code;?>"><?php echo $values->sur_code;?></option><?php }?></select></td><td id="td2"> <input name="frame_code[]" id="package_code_gen'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"> </td><td id="td2"><textarea name="desc[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');
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
  
  
  /// mgb frame name///////
  $(document).ready(function(){

$('#display_name_list').show();
$('#list_display_name').hide();
 $('#new_display_name').show();

    var counter = 2;
		
    $("#addButton2").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv2' + counter);
    var target = document.getElementById('display_name_list');
    var wrap = document.createElement('td');
    wrap.appendChild(target.cloneNode(true));
    var display_name_list=  wrap.innerHTML;
    
    newTextBoxDiv.after().html(
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td4"><input hidden="text" name="some_code[]" value="<?=$mgb_name?>"><input type="text"name="framename[]" id="framename'+counter+'" class="inputbxs4" style="margin-left: 8px;" placeholder="M+g+b Name"/></td> <td id="td4"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs4" placeholder="Unit"/></td><td id="td4"><input type="text"name="rate[]" id="cost'+counter+'" class="inputbxs4" placeholder="Rate"/></td><td id="td4"><input type="text"name="lenght[]" id="lenght2'+counter+'" class="inputbxs4" placeholder="Depth"/></td><td id="td4"><input type="text"name="color[]"  data-toggle="modal"  data-id="'+counter+'" id="color2'+counter+'" class="inputbxs4" placeholder="Color"/></td><td id="td4"> <input name="frame_code[]" id="package_code_gen2'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"> </td><td id="td4"><textarea name="desc[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');


       newTextBoxDiv.appendTo("#TextBoxesGroup2");
       newTextBoxDiv.appendTo("#display_name"+counter);
	counter++;
      //show_newTextBox(counter)
     });

     $("#removeButton2").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          ;
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv2" + counter).remove();
      
     });
		
     $("#getButtonValue").click(function () {
		
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
     
     
  
     
     
  });
  
  ////////////// mount name ///////////
  $(document).ready(function(){

$('#display_name_list').show();
$('#list_display_name').hide();
 $('#new_display_name').show();

    var counter = 2;
		
    $("#addButton3").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv3' + counter);
    var target = document.getElementById('display_name_list');
    var wrap = document.createElement('td');
    wrap.appendChild(target.cloneNode(true));
    var display_name_list=  wrap.innerHTML;
    
    newTextBoxDiv.after().html(
	 
	'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td5"><input type="hidden" name="some_code[]" value="<?=$mount_code?>"><input type="text"name="framename[]" id="framename'+counter+'" class="inputbxs5" style="margin-left:9px;" placeholder="Mount Name"/></td> <td id="td5"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs5" placeholder="Unit"/></td><td id="td5"><input type="text"name="cost[]" id="cost'+counter+'" class="inputbxs5" placeholder="Amount"/></td><td id="td5"><input type="text"name="Quantity[]" id="Quantity'+counter+'" class="inputbxs5" placeholder="Quantity"/></td><td><input type="text"name="height[]" id="height3'+counter+'" class="inputbxs5" data-toggle="modal"  data-id="'+counter+'"  placeholder="Height"/></td><td><input type="text"name="width[]" data-toggle="modal"  data-id="'+counter+'"  id="width3'+counter+'" class="inputbxs5" placeholder="Width"/></td><td><input type="text"name="lenght[]" id="lenght'+counter+'" class="inputbxs5" placeholder="Depth"/></td><td id="td5"><input type="text"name="color[]" data-toggle="modal"  data-id="'+counter+'"   id="color3'+counter+'" class="inputbxs5" placeholder="Color"/></td><td id="td5"><input name="frame_code[]" id="package_code_gen3'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"></td><td id="td5"><textarea name="desc[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');



       newTextBoxDiv.appendTo("#TextBoxesGroup3");
       newTextBoxDiv.appendTo("#display_name"+counter);
	counter++;
      //show_newTextBox(counter)
     });

     $("#removeButton3").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          ;
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv3" + counter).remove();
      
     });
		
     $("#getButtonValue").click(function () {
		
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
     
     
  
     
     
  });
  ////////////////// glass mount name///////////////////
   
 $(document).ready(function(){


    var counter = 2;
		
    $("#addButtong2").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDivg2' + counter);
    
    newTextBoxDiv.after().html(

'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td6"> <input type="hidden" name="some_code[]" value="<?=$glass_code?>"><input type="text"name="framename[]" id="glassname'+counter+'" class="inputbxs6" style="margin-left: 1px;" placeholder="Glass Name"/></td> <td id="td6"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs6" placeholder="Unit"/></td><td id="td6"><input type="text"name="cost[]" id="cost'+counter+'" class="inputbxs6" placeholder="Amount"/></td><td id="td6"><input type="text"name="Quantity[]" id="Quantity'+counter+'" class="inputbxs6" placeholder="Quantity"/></td><td id="td6"><input type="text"name="height[]" id="height4'+counter+'" class="inputbxs6" data-toggle="modal"  data-id="'+counter+'" placeholder="Height"/></td><td id="td6"><input type="text"name="width[]"  data-toggle="modal"  data-id="'+counter+'"id="width4'+counter+'" class="inputbxs6" placeholder="Width"/></td><td id="td6"><input type="text"name="length[]" id="lenght'+counter+'" class="inputbxs6" placeholder="Depth"/></td><td id="td6"><input type="text"name="color[]" data-toggle="modal"  data-id="'+counter+'"  id="color4'+counter+'" class="inputbxs6" placeholder="Color"/></td><td id="td6"><input name="frame_code[]" id="package_code_gen4'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"></td><td id="td6"><textarea name="desc[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');
 newTextBoxDiv.appendTo("#glassmount_groupdiv");


       newTextBoxDiv.appendTo("#TextBoxesGroupg2");
     	counter++;
      //show_newTextBox(counter)
     });

     $("#removeButtong2").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          ;
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDivg2" + counter).remove();
      
     });
		
     $("#getButtonValue").click(function () {
		
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
     
     
  
     
     
  });
  //////////////////hardboard name///////////////////
 
   $(document).ready(function(){

    var counter = 2;
		
    $("#addButton5").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv5' + counter);
    var target = document.getElementById('display_name_list');
    var wrap = document.createElement('td');
    wrap.appendChild(target.cloneNode(true));
    var display_name_list=  wrap.innerHTML;
    
    newTextBoxDiv.after().html(
	 
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td06"><input type="hidden" name="some_code[]" value="<?=$hard_code?>"><input type="text"name="framename[]" id="hardboard'+counter+'" class="inputbxs06" style="margin-left: 0px;" placeholder="Framer Name"/></td><td id="td06"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs06" placeholder="Unit"/></td> <td id="td06"><input type="text"name="cost[]" id="cost'+counter+'" class="inputbxs06" placeholder="Amount"/></td><td id="td06"><input type="text"name="height[]" id="height5'+counter+'" data-toggle="modal"  data-id="'+counter+'" class="inputbxs06" placeholder="Running in Inch"/></td><td id="td06"><input type="text"name="width[]"  data-toggle="modal"  data-id="'+counter+'" id="width5'+counter+'" class="inputbxs06" placeholder="Width"/></td><td id="td06"><input type="text"name="lenght[]" id="lenght'+counter+'" class="inputbxs06" placeholder="Depth"/></td><td id="td06"><input type="text"name="color[]" data-toggle="modal"  data-id="'+counter+'"  id="color5'+counter+'" class="inputbxs06" placeholder="Color"/></td><td id="td06"><input name="frame_code[]" id="package_code_gen5'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"></td><td id="td06"><textarea name="desc[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');


       newTextBoxDiv.appendTo("#TextBoxesGroup5");
    	counter++;
      //show_newTextBox(counter)
     });

     $("#removeButton5").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          ;
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv5" + counter).remove();
      
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
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td11"> <input type="hidden" name="some_code[]" value="<?=$other_code?>"><input type="text"name="framename[]" id="othername'+counter+'" class="inputbxs11" style="margin-left: 17px;" placeholder="Other Name"/></td> <td id="td11"><input type="text"name="cost[]" id="cost'+counter+'" class="inputbxs11" placeholder="Amount"/></td><td id="td11"><input type="text"name="rate[]" id="rate'+counter+'" class="inputbxs11" placeholder="Rate"/></td><td id="td11"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs11" placeholder="Unit"/></td><td id="td2"><select name="noofpices[]" id="noofpices'+counter+'" style="height: 29px; padding-left: 20px;margin-left: 9px;width: 80px;"><option value="roll">Roll</option><option value="cut_sheet">Cut Sheet</option></select></td></tr></table>');
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
  