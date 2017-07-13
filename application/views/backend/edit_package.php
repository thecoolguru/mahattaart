<?php print_r($edit_id);
//echo $edit_details[0]->typesofvender;
//echo $package_rows;

  
?>

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> Edit Package Details</div>
            <div class="add-newcp"><span style="color:#F00;font-size:16px">
        <?php
    if($msg<>'')
    {
        ?><script>setTimeout(function(){timeOut();},2000); function timeOut(){window.location.href="edit_package/<?=$edit_id?>"}</script><?php
    }
    print $msg;?>
        </span>
       <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_packaging"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      <form action="<?=base_url()?>index.php/backend/edit_package_details" id="add_printer_form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="package_code" value="<?=$package_code?>">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr style="background:#e5e5e5">
            <td>Personal / Company Information </td>
            <td>&nbsp;</td>
          </tr>
          <tr class="toptr">
            <td>Company Name*</td>
            <td><input type="text" name="name" readonly="" id="name" class="inputbxs" value="<?=$edit_details[0]->company_name;?>" />
              <br />
              <span id="name_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Contact Person Name*</td>
            <td><input value="<?=$edit_details[0]->contact_person_name;?>"  type="text" name="contactname" id="contactname" class="inputbxs"  />
              <br />
              <span  id="contactname_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Contact Number*</td>
            <td><input value="<?=$edit_details[0]->contact_number;?>"  type="text" name="contact" onkeypress="return isNumber(event)" maxlength="10" id="contact" class="inputbxs" placeholder="Enter Only Number"/>
              <br />
              <span id="contact_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Mobile Number*</td>
            <td><input value="<?=$edit_details[0]->mobile_number;?>"  type="text" name="mobile" onkeypress="return isNumber(event)" maxlength="10" id="mobile" class="inputbxs" placeholder="Enter Only Number"/>
              <br />
              <span id="mobile_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Email*</td>
            <td><input value="<?=$edit_details[0]->email_id;?>"  type="text" name="email" id="email" class="inputbxs" />
              <br />
              <span id="email_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Address*</td>
            <td><textarea name="address" id="address" class="inputbxs" ><?=$edit_details[0]->address;?></textarea>
              <br />
              <span id="address_error" style="color:#F00"></span></td>
          </tr>
          <!--  <tr class="toptr">    <td>City*</td>    <td><input type="text" name="city" id="city" class="inputbxs" /><br /><span id="city_error" style="color:#F00"></span></td>    </tr>-->
          <tr class="toptr">
            <td>State*</td>
            <td><input value="<?=$edit_details[0]->state;?>"  type="text" name="state" id="state" class="inputbxs" />
              <br />
              <span id="state_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Pin Code*</td>
            <td><input value="<?=$edit_details[0]->pin_code;?>"  type="text" name="pin_code" onkeypress="return isNumber(event)" maxlength="6" id="pin_code" class="inputbxs" placeholder="Enter Only Number" />
              <br />
              <span id="pin_code_error" style="color:#F00"></span></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><select name="vender_status" id="vender_status" class="inputbxs">
                    <option  <?php if($edit_details[0]->status==1){?> selected=""<?php }?> value="1">Active</option>
                <option <?php if($edit_details[0]->status==0){?> selected=""<?php }?>  value="0">Inactive</option>
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
            <td><input type="radio"  <?php if($edit_details[0]->delivery_to_office==1){?> checked="checked" <?php }?> name="delivery_to_office" id="delivery_to_office" value="1" checked>
              Yes
              </input>
              <br/>
              <input type="radio" <?php if($edit_details[0]->delivery_to_office==0){?> checked="checked" <?php }?> name="delivery_to_office" id="delivery_to_office" value="0">
              No
              </input></td>
          </tr>
          <tr>
            <td>Pick up from office</td>
            <td><input type="radio" <?php if($edit_details[0]->pick_office==1){?> checked="checked" <?php }?> name="pick_office" id="pick_office" value="1" checked>
              Yes
              </input>
              <br/>
              <input type="radio" <?php if($edit_details[0]->pick_office==0){?> checked="checked" <?php }?> name="pick_office" id="pick_office" value="0">
              No
              </input></td>
          </tr>
          <tr>
            <td>Working on off days</td>
            <td><input type="radio" <?php if($edit_details[0]->working_days==1){?> checked="checked" <?php }?> name="working_days" id="working_days" value="1" checked>
              Yes
              </input>
              <br/>
              <input type="radio" <?php if($edit_details[0]->working_days==0){?> checked="checked" <?php }?> name="working_days" id="working_days" value="0">
              No
              </input></td>
          </tr>
          <tr>
            <td>Remarks</td>
            <td><textarea name="remark"  id="remark" class="inputbxs" placeholder="Remarks"><?=$edit_details[0]->remarks?></textarea></td>
          </tr>
          <tr>
            <td>Satisfaction Level</td>
            <td><select name="level" id="level" style="width:243px; height:33px;" class="inputbxs">
                <option>Select Satisfaction Level</option>
                <option <?php if($edit_details[0]->satisfaction_level==1){?> selected="" <?php }?>  value="1">Excellent</option>
                <option <?php if($edit_details[0]->satisfaction_level==2){?> selected="" <?php }?> value="2">Good</option>
                <option <?php if($edit_details[0]->satisfaction_level==3){?> selected="" <?php }?> value="3">Fair</option>
                <option <?php if($edit_details[0]->satisfaction_level==4){?> selected="" <?php }?> value="4">Average</option>
                <option  <?php if($edit_details[0]->satisfaction_level==5){?> selected="" <?php }?> value="5">Poor</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Preferred</td>
            <td><input type="radio" <?php if($edit_details[0]->preferred_surface==1){?> checked="checked" <?php }?> name="preferred" id="preferred" value="1" checked>
              Yes
              </input>
              <br>
              <input type="radio" <?php if($edit_details[0]->preferred_surface==0){?> checked="checked" <?php }?> name="preferred"  value="0">
              No
              </input>
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
            <td><input value="<?=$edit_details[0]->name_on_cheque;?>" type="text"name="cheque" id="cheque" class="inputbxs" placeholder="Name on Cheque"/></td>
          </tr>
          <tr>
            <td>Upload the file (If there is any change)</td>
            <td><input type="file" name="pdf_file" id="pdf_file" size="chars" />
              <br />
              <span id="pdf_error" style="color:#F00"></span></td>
          </tr>
          
          <tr>
            <td>Types of Vender</td>
            <td><input type="radio" <?php if($edit_details[0]->typesofvender==1){ ?>  checked=""<?php }?> name="typesofvender" id="typesofvender" value="1" >
              Services
              </input>
              <br/>
              <input type="radio" name="typesofvender" <?php if($edit_details[0]->typesofvender==2){ ?>  checked=""<?php }?> id="typesofvender" value="2">
              Row Material
              </input></td>
          </tr>
          
          
          <tr style="background:#e5e5e5">
              <td><b>Material offered</b></td>
    <td></td>
    </tr>
    </table>
          <!--<div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton' >Add New Item</a> <a href="#!" class="subtractwcp" id='removeButton'>Remove Item</a></div>-->
       <br>
         <div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">  
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Surface</td> <td>Amount</td><td>Qty</td><td>Unit</td><td>Height</td><td>Width</td><td>Color</td><td>Depth</td><td>Description</td><td></td></tr>  
    <?php foreach($edit_details as $data_values){?>
      <tr>
       <td id="td"><input value="<?php echo $data_values->surface;?>" type="text"name="surface[]" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="surface"/></td>
         <td id="td"><input type="text"name="cost[]" id="cost1" value="<?php echo $data_values->cost_per_sq_inch;?>"  class="inputbxs1" placeholder="Cost"/></td>
       <td id="td"><input type="text"name="qty[]" value="<?php echo $data_values->qty;?>" id="qty1" class="inputbxs1" placeholder="Quantity"/></td>
   <td id="td"><input type="text"name="unit[]" value="<?php echo $data_values->unit;?>"  id="unit1" class="inputbxs1" placeholder="Unit"/></td>
        <td id="td"><input type="text"name="height[]" value="<?php echo $data_values->height;?>"  id="height" class="inputbxs1" placeholder="Height"/></td>
    <td id="td"><input type="text"name="width[]"  value="<?php echo $data_values->width;?>"  id="width" class="inputbxs1" placeholder="Width"/></td>
    <td id="td"><input type="text"name="color[]" value="<?php echo $data_values->color;?>"  id="color" class="inputbxs1" placeholder="Color"/></td> <td id="td"><input value="<?php echo $data_values->lenght;?>" type="text"name="depth[]" id="depth1" class="inputbxs1" placeholder="Depth"/></td>
    
    <td id="td"><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"><?php echo $data_values->sur_desc;?></textarea></td>
       <td></td> 
   </tr>
   
   <input type="hidden" name="edit_id" value="<?php echo $data_values->package_id;?>">
   
   
   <script>
         function show_newTextBox<?php echo $data_values->package_id;?>()
 {
     document.getElementById('display_name<?php echo $data_values->package_id;?>').style.display="block";
      document.getElementById('display_name_list<?php echo $data_values->package_id;?>').style.display="none";
      document.getElementById('new_display_name<?php echo $data_values->package_id;?>').style.display="none";
      document.getElementById('list_display_name<?php echo $data_values->package_id;?>').style.display="block";
   
 }
 
function get_data_with_height<?php echo $data_values->package_id;?>()
   {
     var height=$('#height').val();  
     var width=$('#width').val();  
     var color=$('#color').val(); 
     $.ajax({
         
         type:"post",
         url:"get_code_color",
         data:'height='+height+'&width='+width+'&color='+color,
         success: function(response){
             alert(response);
             //$('#display_name_list<?php echo $data_values->package_id;?>').html(response);
         }
     });
   }
 function show_oldTextBox<?php echo $data_values->package_id;?>()
 {
    $('#display_name<?php echo $data_values->package_id;?>').hide();
    $('#new_display_name<?php echo $data_values->package_id;?>').show();
    $('#display_name_list<?php echo $data_values->package_id;?>').show();
    $('#list_display_name<?php echo $data_values->package_id;?>').hide();
    }
       </script>
    <?php }?>
       
       </table> 
          </div></div>
          <br>
          <input type="submit" class="bt-sbt-upload" name="upload_images" id="upload images" value="Edit" style="float: right;"  onclick="return 1Validate_printer();" />  
       
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
     #td{padding: 15px 0px 0px 29px;}
     #tr{ border-bottom: solid 2px; border-bottom-color:#faa21b;}
    </style>
