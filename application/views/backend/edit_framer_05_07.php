  <?php
  $frame_code= $this->uri->slash_segment(3);
//echo $_REQUEST['id'];
 $framer_code_str= substr($frame_code,0,3);
 //print_r($edit_id);
 
 
 //echo $edit_id->
 $split_code=split('/',$frame_code);
             ?>
<input type="hidden" id="frame" value="<?=$framer_code_str?>">
  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
    <form action="<?=base_url()?>index.php/backend/edit_framer_details" id="add_printer_form" method="post" enctype="multipart/form-data">
  <div id="middle-container">
    <div class="main-hdr"> Edit Framer Details</div>
            <div class="add-newcp"><span style="color:#F00;font-size:16px">
        <?php
    if($msg<>'')
    {
        ?><script>setTimeout(function(){timeOut();},2000); function timeOut(){window.location.href="edit_framer/<?=$framer_code?>/<?=$edit_id[0]?>"}</script><?php
    }
    print $msg;?>
        </span>
                <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_frames"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      
          <input type="hidden" name="framer_code" value="<?=$split_code[0];?>">
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
            <td>Labor Charge</td>
            <td><input type="text"name="labor_charge"  value="<?=$edit_details[0]->labor_charge?>"id="labor_charge" class="inputbxs" placeholder="Labor Charge"/></td>
          </tr>
<!--          <tr>
            <td>Types of Vender</td>
            <td><input type="radio" <?php if($edit_details[0]->typesofvender==1){ ?>  checked=""<?php }?> name="typesofvender" id="typesofvender" value="1" >
              Services
              </input>
              <br/>
              <input type="radio" name="typesofvender" <?php if($edit_details[0]->typesofvender==2){ ?>  checked=""<?php }?> id="typesofvender" value="2">
              Row Material
              </input></td>
          </tr>-->
          
          
          <tr style="background:#e5e5e5">
              <td><b>Material offered</b></td>
    <td></td>
    </tr>
    </table>
          <!--<div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton' >Add New Item</a> <a href="#!" class="subtractwcp" id='removeButton'>Remove Item</a></div>-->
       <br>
         
            <?php
           if($framer_code_str=='FRM')
           {
              $data=$this->backend_model->Get_to_Update_All_framer_details($frame_code);
              $i=1;  
              while($values= mysql_fetch_object($data)){
                 //echo $values->framer_name;
            ?>
            
            <table style="border-bottom: 0px;  width: 100%">
            <input type="hidden" name="edit_id[]" value="<?=$values->framer_id;?>">
            <input type="hidden" name="id" value="<?=$values->framer_id;?>">
         <tr id="tr"> <td>Frame Name</td><td>Frame</td><td>Visual</td><td>Unit</td> <td>Rate</td><td>Width</td><td>Depth</td><td>Color</td><td>Display Name </td><td>Code Generation </td> <td>Description</td></tr>  
    
                <tr id="get_data">
                    <td id="td0"><input type="text"name="framename[]"   value="<?=$values->framer_name;?>"  id="surface1" class="inputbxs1" placeholder="Frame Name"/></td>
    <td id="td0"><div><input type="file"  name="file[]" style="width:100px;"  id="file<?=$i?>" /> 
            <input type="hidden" name="frame_image[]" value="<?=$values->frame_visual;?>" > 
        </div></td>
       <td id="td0"><div id="image_preview<?=$i?>" class="image_preview"><img id="previewing<?=$i?>" src="<?=base_url()?><?=$values->frame_visual;?>" width="50" height="50"/></div></div></td>
                    <td id="td0"><input type="text"name="unit[]" value="<?=$values->unit;?>" id="unit1" class="inputbxs1" placeholder="Unit"/></td>
       <td id="td0"><input type="text"name="rate[]" value="<?=$values->rate;?>" id="cost1" class="inputbxs1" placeholder="Rate"/></td>
<!--    <td id="td0"><input type="text"name="Quantity[]" value="<?=$values->rate;?>"  id="Quantity" class="inputbxs1" placeholder="Quantity"/></td>-->
    
<!--    <td id="td0"><input type="text"name="height[]" value="<?=$values->height;?>" onblur="return get_data_with_height(this);" id="height" class="inputbxs1" placeholder="Height"/></td>-->
       <td id="td0"><input type="text"name="width[]" value="<?=$values->width;?>"  onblur="return get_data_with_height<?=$i?>();"  id="width<?=$i?>"  class="inputbxs1" placeholder="Width"/></td>
    <td id="td0"><input type="text"name="length[]" value="<?=$values->length;?>"  id="length" class="inputbxs1" placeholder="Depth"/></td>
    <td id="td0"><input type="text"name="color[]" value="<?=$values->color;?>"  onblur="return get_data_with_height<?=$i?>();"  id="color<?=$i?>" class="inputbxs1" placeholder="Color"/></td>
    <td id="show_selectpicker">
        <a onclick="return show_newTextBox1<?=$i?>(); " style="margin-left:25px;" id="new_display_name<?=$i?>">New Display Name</a><a onclick="return show_oldTextBox1<?=$i?>(); " style="margin-left:25px; display:none;"  id="list_display_name<?=$i?>" >Old Display Name</a><br>
        
        <select name="display_name_list[]" id="display_name_list<?=$i?>"  class="inputbxs1" style="height: 29px; padding-left:0px;
    margin-left: 0px;
    width: 92px;">
            <option value="">---Select---</option>
            <?php foreach($package_rows as $values_des){?>
            <option  value="<?=$values_des->display_name;?>" <?php if($values_des->display_name==$values->display_name){?> selected="" <?php }?>><?php echo $values_des->display_name;?></option>
            <?php  }?>
        </select>
       
       <input  type="text"  name="display_name[]" id="display_name<?=$i?>"  style="display:none; width: 92px; height: 28px;    margin-left: 12px;"  >
        <?php //}?>
    </td>
    <td >
         
        <input name="frame_code[]" id="edit_package_code_gen<?=$i?>"   value="<?=$values->generate_code;?>" style="    width: 89px; height: 29px; margin-top: 17px;">
       
       
    </td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"><?=$values->sur_desc;?></textarea></td>
       
   </tr>
        </table> 
       
       <script>
           
  function show_newTextBox1<?=$i?>()
 {
     document.getElementById('display_name<?=$i?>').style.display="block";
      document.getElementById('display_name_list<?=$i?>').style.display="none";
      document.getElementById('new_display_name<?=$i?>').style.display="none";
      document.getElementById('list_display_name<?=$i?>').style.display="block";
   
 }
 
$(document).ready(function (e) {        
                   // Function to preview image after validation
                $(function() {
                    $("#file<?=$i?>").change(function() {
                    $("#message<?=$i?>").empty(); // To remove the previous error message
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                        $('#previewing<?=$i?>').attr('src','noimage.png');
                        
                        return false;
                    }else{
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
             });
              function imageIsLoaded(e) {
                  $("#file<?=$i?>").css("color","#FFFFFF");
                  $('#image_preview<?=$i?>').css("display", "block");
                  $('#previewing<?=$i?>').attr('src', e.target.result);
                  $('#previewing<?=$i?>').attr('width', '80px');
                  $('#previewing<?=$i?>').attr('height', '80px');
              };
          });
                   
                   

 function show_oldTextBox1<?=$i?>()
 {
    $('#display_name<?=$i?>').hide();
    $('#new_display_name<?=$i?>').show();
    $('#display_name_list<?=$i?>').show();
    $('#list_display_name<?=$i?>').hide();
    }
    
           function get_data_with_height<?=$i?>(){
               
             
    var frame=$('#frame').val();     
    var int = parseInt((Math.random() * 100), 10);
    var name=$('#name').val();  
   // var height=$('#height').val();  
    var width=$('#width<?=$i?>').val();  
    var color=$('#color<?=$i?>').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
   // var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+str_width+int;
      //alert(code_gen);
    document.getElementById('edit_package_code_gen<?=$i?>').value=code_gen;   
     
   }// end function
           </script>
       
                 <?php $i++; } ?>
       <input type="submit" class="bt-sbt-upload" name="edit" id="upload images" value="Update" style="float: right;"   />     
               <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton' >Add Row</a> <a href="#!" class="subtractwcp" id='removeButton'>Remove Row</a></div>
       <br>
         <div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">  
            
            
           <?php
          $frame_code=  $this->backend_model->get_frame_code('frame_name');
           ?> 
            <input type="hidden" name="id" value="<?=$values->framer_id;?>">
            <input type="hidden" name="some_code[]" id="some_code" value="<?=$frame_code?>">
          <table style="border-bottom: 0px;  width: 100%">
           
         <tr id="tr"> <td>Frame Name</td> <td>Frame</td><td>Visual</td><td>Unit</td><td>Rate</td><td>Width</td><td>Depth</td><td>Color</td><td>Display Name </td> <td>Code Generation</td><td>Description</td></tr>  
    
                <tr id="get_data">
       <td id="td0"><input type="text"name="framenamen[]" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="Frame Name"/></td>
       <td id="td0"><div><input type="file"  name="file[]" style="width:100px;"  id="file" />  </div></td>
       <td id="td0"><div id="image_preview" class="image_preview"><img id="previewing" src="" width="50" height="50"/></div></div></td>
       <td id="td0"><input type="text"name="unitn[]" style="margin-right: -5px;" id="unit" class="inputbxs1" placeholder="Unit"/></td>
    <td id="td0"><input type="text"name="raten[]" id="cost1" class="inputbxs1" placeholder="Rate"/></td>
    <td id="td0"><input type="text"name="widthn[]"  onblur="return get_data_with_height(this);" id="width" class="inputbxs1" placeholder="Width"/></td>
    <td id="td0"><input type="text"name="lengthn[]"  id="length" class="inputbxs1" placeholder="Depth"/></td>
    <td id="td0"><input type="text"name="colorn[]" onblur="return get_data_with_height(this);" id="color" class="inputbxs1" placeholder="Color"/></td>
    <td id="show_selectpicker">
        <a onclick="return show_newTextBox2(); " style="margin-left:25px;" id="new_display_namen2">New Display Name</a><a onclick="return show_oldTextBox2(); " style="margin-left:25px; display:none;"  id="list_display_namen2" >Old Display Name</a><br>
        
        <select name="display_name_listn[]" id="display_name_listn2"  class="inputbxs1" style="height: 29px; padding-left:0px;
    margin-left: 0px;
    width: 92px;">
            <option value="">---Select---</option>
            <?php foreach($package_rows as $values_des){?>
           <option  value="<?=$values_des->display_name;?>" ><?php echo $values_des->display_name;?></option>
            <?php }?>
        </select>
       
       <input  type="text"  name="display_namen[]" id="display_namen2"  style="display:none; width: 92px; height: 28px;    margin-left: 12px;"  >
        <?php //}?>
    </td>
    <td >
         
        <input name="frame_coden[]" id="package_code_gen" onblur="return get_data_with_height();"  style="    width: 73px; height: 29px; margin-top: 17px;">
       
       
    </td>
    <td><textarea name="descn[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       
   </tr>
        </table> 
            </div></div>
         
          <br>
       
               <?php }elseif($framer_code_str=='MGB')
              {  $data=$this->backend_model->Get_to_Update_All_framer_details($frame_code);
              ?>
            <table style="border-bottom: 0px;  width: 100%">
                <input type="hidden" name="id" value="<?=$values->framer_id;?>">
                <input type="hidden" name="edit_id[]" value="<?=$values->framer_id;?>">
                <tr id="tr"> <td>M+G+B Name</td> <td>Unit</td><td>Rate</td><td>Depth</td><td>Color</td> <td>Code Generate</td><td>Description</td></tr>  
    <?php $i=1;  
              while($values= mysql_fetch_object($data)){?>
                <tr id="get_data">
       <td id="td0"><input type="text"name="framename[]" value="<?=$values->framer_name;?>" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="M+G+B Name"/></td>
    <td id="td0"><input type="text"name="unit[]" value="<?=$values->unit;?>" id="unit1" class="inputbxs1" placeholder="Unit"/></td>
       <td id="td0"><input type="text"name="rate[]" value="<?=$values->rate;?>" id="cost1" class="inputbxs1" placeholder="Rate"/></td>
<!--    <td id="td0"><input type="text"name="Quantity[]" value="<?=$values->qty;?>"  id="Quantity" class="inputbxs1" placeholder="Quantity"/></td>
    
    <td id="td0"><input type="text"name="height[]" value="<?=$values->height;?>" onblur="return get_data_with_height(this);" id="height" class="inputbxs1" placeholder="Height"/></td>
    <td id="td0"><input type="text"name="width[]" value="<?=$values->width;?>" onblur="return get_data_with_height(this);" id="width" class="inputbxs1" placeholder="Width"/></td>-->
    <td id="td0"><input type="text"name="length[]" value="<?=$values->length;?>"  id="length" class="inputbxs1" placeholder="Depth"/></td>
    <td id="td0"><input type="text"name="color[]" value="<?=$values->color;?>" id="color<?=$i?>" onblur="return get_data_with_height<?=$i?>(this);" id="color" class="inputbxs1" placeholder="Color"/></td>
    <td>
        <input name="frame_code[]" value="<?=$values->generate_code;?>" id="mgbedit_package_code_gen<?=$i?>" style="    width: 73px; height: 29px; margin-top: 17px;">
    </td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"><?=$values->sur_desc;?></textarea></td>
       
   </tr>
      <script>
           
  function show_newTextBox1<?=$i?>()
 {
     document.getElementById('display_name<?=$i?>').style.display="block";
      document.getElementById('display_name_list<?=$i?>').style.display="none";
      document.getElementById('new_display_name<?=$i?>').style.display="none";
      document.getElementById('list_display_name<?=$i?>').style.display="block";
   
 }
 


 function show_oldTextBox1<?=$i?>()
 {
    $('#display_name<?=$i?>').hide();
    $('#new_display_name<?=$i?>').show();
    $('#display_name_list<?=$i?>').show();
    $('#list_display_name<?=$i?>').hide();
    }
    
           function get_data_with_height<?=$i?>(){
            
    var frame=$('#frame').val();     
    var int = parseInt((Math.random() * 100), 10);
    var name=$('#name').val();  
   // var height=$('#height').val();  
    //var width=$('#width<?=$i?>').val();  
    var color=$('#color<?=$i?>').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
   // var str_height= height.substring(0, 2).toUpperCase();
   // var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+int;
      //alert(code_gen);
    document.getElementById('mgbedit_package_code_gen<?=$i?>').value=code_gen;   
     
   }// end function
           </script>
       <?php };?>
       </table> 
          
              
          <input type="submit" class="bt-sbt-upload" name="edit" id="upload images" value="Update" style="float: right;"   />     
           <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton2' >Add New Item</a> <a href="#!" class="subtractwcp" id='removeButton2'>Remove Item</a></div>
       <br>
         <div id='TextBoxesGroup2'>
	<div id="TextBoxDiv2">  
            
            
            
             <?php
          $mgb_name=  $this->backend_model->get_frame_code('mgb_name');
           ?> 
            <input type="hidden" name="id" value="<?=$values->framer_id;?>">
            <input type="hidden" name="some_code[]" id="some_code" value="<?=$mgb_name?>">
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>M+g+b Name</td> <td>Unit</td><td>Rate</td><td>Depth</td><td>Color</td><td>Code Generation</td> <td>Description</td><td></td></tr>  
    
                <tr id="get_data">
       <td id="td3"><input type="text"name="framenamen[]" style="margin-right: -5px;" id="mgbname" class="inputbxs3" placeholder="M+g+b Name"/></td>
    <td id="td3"><input type="text"name="unitn[]" id="unit1" class="inputbxs3" placeholder="Unit"/></td>
       <td id="td3"><input type="text"name="raten[]" id="cost1" class="inputbxs3" placeholder="Rate"/></td>
<!--    <td id="td3"><input type="text"name="Quantity[]" id="rate1" class="inputbxs3" placeholder="Quantity"/></td>
    <td id="td3"><input type="text"name="height[]"  onblur="return get_data_with_height2(this);" id="height2" class="inputbxs3" placeholder="Height"/></td>
    <td id="td3"><input type="text"name="width[]"  onblur="return get_data_with_height2(this);" id="width2" class="inputbxs3" placeholder="Width"/></td>-->
    <td id="td3"><input type="text"name="lengthn[]" id="length" class="inputbxs3" placeholder="Depth"/></td>
    <td id="td3"><input type="text"name="colorn[]" onblur="return get_data_with_heightmgb();" id="colormgb" class="inputbxs3" placeholder="Color"/></td>
    
    <td>
        <input name="frame_coden[]" id="mgbpackage_code_gen" style="width: 73px; height: 29px; margin-top: 17px;">
    </td>
    <td><textarea name="descn[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
       
       </table> 
            
                 
            
            
            
          </div></div>
          </div>
          <br>
                <?php }elseif($framer_code_str=='MNT')
           {   ?>
            <table style="border-bottom: 0px;  width: 100%">
            
               <tr id="tr"> <td>Mount Name</td> <td>Unit</td><td>Rate</td><td>QTY</td><td>Height</td><td>Width</td><td>Depth</td><td>Color</td> <td>Code Generate</td><td>Description</td></tr>  
    <?php $data=$this->backend_model->Get_to_Update_All_framer_details($frame_code);
              $i=1;  
              while($values= mysql_fetch_object($data)){?>
               <input type="hidden" name="id" value="<?=$values->framer_id;?>">
               <input type="hidden" name="edit_id[]" value="<?=$values->framer_id;?>">
                <tr id="get_data">
       <td id="td0"><input type="text"name="framename[]" value="<?=$values->framer_name;?>" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="Mount Name"/></td>
    <td id="td0"><input type="text"name="unit[]" value="<?=$values->unit;?>" id="unit1" class="inputbxs1" placeholder="Unit"/></td>
       <td id="td0"><input type="text"name="rate[]" value="<?=$values->rate;?>" id="cost1" class="inputbxs1" placeholder="Rate"/></td>
    <td id="td0"><input type="text"name="Quantity[]" value="<?=$values->qty;?>"  id="Quantity" class="inputbxs1" placeholder="Quantity"/></td>
    
    <td id="td0"><input type="text"name="height[]" value="<?=$values->height;?>" onblur="return get_data_with_heightmnt<?=$i?>(this);" id="height<?=$i?>" class="inputbxs1" placeholder="Height"/></td>
    <td id="td0"><input type="text"name="width[]" value="<?=$values->width;?>" onblur="return get_data_with_heightmnt<?=$i?>(this);" id="width<?=$i?>" class="inputbxs1" placeholder="Width"/></td>
    <td id="td0"><input type="text"name="length[]" value="<?=$values->length;?>"  id="length" class="inputbxs1" placeholder="Depth"/></td>
    <td id="td0"><input type="text"name="color[]" value="<?=$values->color;?>" onblur="return get_data_with_heightmnt<?=$i?>();" id="color<?=$i?>" class="inputbxs1" placeholder="Color"/></td>
    <td>
        <input name="frame_code[]"  value="<?=$values->generate_code;?>" id="mntpackage_code_gen<?=$i?>" style="width: 73px; height: 29px; margin-top: 17px;">
    </td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"><?=$values->sur_desc;?></textarea></td>
       
   </tr>
     <script>
           
  
           function get_data_with_heightmnt<?=$i?>(){
            
    var frame=$('#frame').val();     
    var int = parseInt((Math.random() * 100), 10);
    var name=$('#name').val();  
    var height=$('#height<?=$i?>').val();  
    var width=$('#width<?=$i?>').val();  
    var color=$('#color<?=$i?>').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+str_width+str_height+int;
      //alert(code_gen);
    document.getElementById('mntpackage_code_gen<?=$i?>').value=code_gen;   
     
   }// end function
           </script>
              <?php $i++; }?>
       </table>
          
       <input type="submit" class="bt-sbt-upload" name="edit" id="upload images" value="Update" style="float: right;"   />     
       
        <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton3' >Add Row</a> <a href="#!" class="subtractwcp" id='removeButton3'>Remove Row</a></div>
       <br>
          <div id='TextBoxesGroup3'>
	<div id="TextBoxDiv3">  
            
            
             <?php
          $mount_code=  $this->backend_model->get_frame_code('mount_name');
           ?> 
<input type="hidden" name="some_code[]" id="some_code" value="<?=$mount_code?>">
            
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Mount Name</td><td>Unit</td> <td>Rate</td><td>QTY</td><td>Height</td><td>Width</td><td>Depth</td><td>Color</td><td>Code Generation</td><td>Description</td><td></td></tr>  
    
     <tr id="get_data">
       <td id="td2"><input type="text"name="framenamen[]" style="margin-right: -5px;" id="mgbname" class="inputbxs05" placeholder="Mount Name"/></td>
    <td id="td2"><input type="text"name="unitn[]" id="unit3" class="inputbxs05" placeholder="Unit"/></td>
       <td id="td2"><input type="text"name="raten[]" id="cost3" class="inputbxs05" placeholder="Rate"/></td>
    <td id="td2"><input type="text"name="Quantityn[]" id="qty3" class="inputbxs05" placeholder="Quantity"/></td>
    <td id="td2"><input type="text"name="heightn[]"  onblur="return get_data_with_heightmnt(this);" id="heightmnt" class="inputbxs05" placeholder="Height"/></td>
    <td id="td2"><input type="text"name="widthn[]"  onblur="return get_data_with_heightmnt(this);" id="widthmnt" class="inputbxs05" placeholder="Width"/></td>
    <td id="td2"><input type="text"name="lengthn[]" id="length3" class="inputbxs05" placeholder="Depth"/></td>
    <td id="td2"><input type="text"name="colorn[]" onblur="return get_data_with_heightmnt(this);" id="colormnt" class="inputbxs05" placeholder="Color"/></td>
    
    <td>
        <input name="frame_coden[]" id="mntpackage_code_gen" style="    width: 73px; height: 29px; margin-top: 17px;">
    </td>
    <td><textarea name="descn[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
     

     
       
       </table> 
            
                 
            
            
            
          </div></div>
         
          <br>
       
       
            <?php }elseif($framer_code_str=='GLS')
           { ?><table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Glass Name</td> <td>Unit</td><td>Rate</td><td>QTY</td><td>Height</td><td>Width</td><td>Depth</td><td>Color</td> <td>Code Generate</td> <td>Description</td><td></td></tr>  
     <?php $data=$this->backend_model->Get_to_Update_All_framer_details($frame_code);
              $i=1;  
              while($values= mysql_fetch_object($data)){?>
                <input type="hidden" name="id" value="<?=$values->framer_id;?>">
                <input type="hidden" name="edit_id[]" value="<?=$values->framer_id;?>">
                <tr id="get_data">
       <td id="td0"><input type="text"name="framename[]" value="<?=$values->framer_name;?>" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="Frame Name"/></td>
    <td id="td0"><input type="text"name="unit[]" value="<?=$values->unit;?>" id="unit1" class="inputbxs1" placeholder="Unit"/></td>
       <td id="td0"><input type="text"name="cost[]" value="<?=$values->cost_per_sq_inch;?>" id="cost1" class="inputbxs1" placeholder="Rate"/></td>
    <td id="td0"><input type="text"name="Quantity[]" value="<?=$values->qty;?>"  id="Quantity" class="inputbxs1" placeholder="Quantity"/></td>
    
    <td id="td0"><input type="text"name="height[]" value="<?=$values->height;?>" onblur="return get_data_with_heightglsupdate<?=$i?>(this);" id="heightg<?=$i?>" class="inputbxs1" placeholder="Height"/></td>
    <td id="td0"><input type="text"name="width[]" value="<?=$values->width;?>" onblur="return get_data_with_heightglsupdate<?=$i?>(this);" id="widthg<?=$i?>" class="inputbxs1" placeholder="Width"/></td>
    <td id="td0"><input type="text"name="length[]" value="<?=$values->length;?>"  id="length" class="inputbxs1" placeholder="Depth"/></td>
    <td id="td0"><input type="text"name="color[]" value="<?=$values->color;?>" onblur="return get_data_with_heightglsupdate<?=$i?>(this);" id="colorg<?=$i?>" class="inputbxs1" placeholder="Color"/></td>
    <td id="td6"><input name="frame_code[]" value="<?=$values->generate_code;?>"  id="glspackage_code_gen<?=$i?>" style="    width: 73px; height: 29px; margin-top: 17px;"></td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"><?=$values->sur_desc;?></textarea></td>
       
   </tr>
             
       
     
            
         
         
 <script>
           
  
           function get_data_with_heightglsupdate<?=$i?>(){
            
    var frame=$('#frame').val();     
    var int = parseInt((Math.random() * 100), 10);
    var name=$('#name').val();  
    var height=$('#heightg<?=$i?>').val();  
    var width=$('#widthg<?=$i?>').val();  
    var color=$('#colorg<?=$i?>').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+str_width+str_height+int;
      //alert(code_gen);
    document.getElementById('glspackage_code_gen<?=$i?>').value=code_gen;   
     
   }// end function
           </script>


   <?php $i++; }?>
  
           </table>
         <input type="submit" class="bt-sbt-upload" name="edit" id="upload images" value="Update" style="float: right;"   />         
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
       <td id="td6"><input type="text"name="framenamen[]" style="margin-right: 10px;" id="glassname" class="inputbxs8" placeholder="Glass Name"/></td>
	     <td id="td6"><input type="text"name="unitn[]" id="unit1" class="inputbxs8" placeholder="Unit"/></td>
    <td id="td6"><input type="text"name="costn[]" id="cost1" class="inputbxs8" placeholder="Rate"/></td>
    <td id="td6"><input type="text"name="Quantityn[]" id="Quantity1" class="inputbxs8" placeholder="Quantity"/></td>
   <td id="td6"><input type="text"name="heightn[]" onblur="return get_data_with_heightgls(this);" id="heightgls" class="inputbxs8" placeholder="Height"/></td>
    <td id="td6"><input type="text"name="widthn[]"  onblur="return get_data_with_heightgls(this);"id="widthgls" class="inputbxs8" placeholder="Width"/></td>
    <td id="td6"><input type="text"name="lengthn[]" id="length" class="inputbxs8" placeholder="Depth"/></td>
    <td id="td6"><input type="text"name="colorn[]" onblur="return get_data_with_heightgls(this);" id="colorgls" class="inputbxs8" placeholder="Color"/></td>
     <td id="td6"><input name="frame_coden[]" id="addglspackage_code_gen" style="    width: 73px; height: 29px; margin-top: 17px;"></td>
    
    <td><textarea name="descn[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
       
       </table> 
            
                 
            
            
            
          </div></div>
       <?php }elseif($framer_code_str=='HRD')
           {?><table style="border-bottom: 0px;  width: 100%">
            <input type="hidden" name="edit_id[]" value="<?=$values->framer_id;?>">
            <input type="hidden" name="id" value="<?=$values->framer_id;?>">
                <tr id="tr"> <td>Hardboard Name</td> <td>Unit</td><td>Cost</td><td>QTY</td><td>Height</td><td>Width</td><td>Depth</td><td>Color</td> <td>Description</td><td></td></tr>  
    
                <tr id="get_data">
       <td id="td0"><input type="text"name="framename[]" value="<?=$values->framer_name;?>" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="Hard board Name"/></td>
    <td id="td0"><input type="text"name="unit[]" value="<?=$values->unit;?>" id="unit1" class="inputbxs1" placeholder="Unit"/></td>
       <td id="td0"><input type="text"name="cost[]" value="<?=$values->cost_per_sq_inch;?>" id="cost1" class="inputbxs1" placeholder="Amount"/></td>
    <td id="td0"><input type="text"name="Quantity[]" value="<?=$values->qty;?>"  id="Quantity" class="inputbxs1" placeholder="Quantity"/></td>
    
    <td id="td0"><input type="text"name="height[]" value="<?=$values->height;?>" onblur="return get_data_with_height(this);" id="height" class="inputbxs1" placeholder="Height"/></td>
    <td id="td0"><input type="text"name="width[]" value="<?=$values->width;?>" onblur="return get_data_with_height(this);" id="width" class="inputbxs1" placeholder="Width"/></td>
    <td id="td0"><input type="text"name="length[]" value="<?=$values->length;?>"  id="length" class="inputbxs1" placeholder="Depth"/></td>
    <td id="td0"><input type="text"name="color[]" value="<?=$values->color;?>" onblur="return get_data_with_height(this);" id="color" class="inputbxs1" placeholder="Color"/></td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"><?=$values->sur_desc;?></textarea></td>
       
   </tr>
     
       
       </table> 
          <input type="submit" class="bt-sbt-upload" name="edit" id="upload images" value="Update" style="float: right;"   />     

          <br>
       
        <div id='TextBoxesGroup5'>
	<div id="TextBoxDiv5">  
            <?php
          $hard_code=  $this->backend_model->get_frame_code('hardboard');
           ?> 
<input type="hidden" name="some_code[]" value="<?=$hard_code?>">
            
            <table style="border-bottom: 0px;  width: 95%">
           
                <tr id="tr"> <td>HardBoard  Name</td> <td>Unit</td><td>Amount</td><td>QTY</td><td>Height</td><td>Width</td><td>Length</td><td>Color</td><td>Code Generation</td> <td>Description</td><td></td></tr>  
    
      <tr id="get_data">
       <td id="td2"><input type="text"name="framenamen[]" style="margin-right: -5px;" id="hardborad" class="inputbxs9" placeholder="Hard Borad"/></td>
    <td id="td2"><input type="text"name="unitn[]" id="unit1" class="inputbxs9" placeholder="Unit"/></td>
    <td id="td2"><input type="text"name="costn[]" id="cost1" class="inputbxs9" placeholder="Amount"/></td>
    <td id="td2"><input type="text"name="Quantityn[]" id="Quantity1" class="inputbxs9" placeholder="Quantity"/></td>
    <td id="td2"><input type="text"name="heightn[]" onblur="return get_data_with_height5(this);" id="height5" class="inputbxs9" placeholder="Height"/></td>
    <td id="td2"><input type="text"name="widthn[]" onblur="return get_data_with_height5(this);" id="width5" class="inputbxs9" placeholder="Width"/></td>
    <td id="td2"><input type="text"name="lengthn[]"  id="length" class="inputbxs9" placeholder="Length"/></td>
    <td id="td2"><input type="text"name="colorn[]" onblur="return get_data_with_height5(this);" id="color5" class="inputbxs9" placeholder="Color"/></td>
    <td id="td2"><input name="frame_coden[]" id="package_code_gen5" style="    width: 73px; height: 29px; margin-top: 17px;"></td>
    <td><textarea name="descn[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
       
       </table> 
            
                 
            
            
            
          </div></div>
       
       


 <?php }elseif($framer_code_str=='OTH')
           {  foreach ($edit_details as $values):?> <table style="border-bottom: 0px;  width: 100%">
               <input type="hidden" name="edit_id[]" value="<?=$values->framer_id;?>">
               <input type="hidden" name="id" value="<?=$values->framer_id;?>">
                <tr id="tr"> <td>Other Name</td> <td>Cost</td><td>Rate</td><td>Unit</td><td>No of Pieces/lot</td></tr>  
    
                <tr id="get_data">
       <td id="td10"><input type="text"name="framename[]" value="<?=$values->framer_name;?>" style="margin-right: 0px;" id="othername" class="inputbxs10" placeholder="Other Name"/></td>
    <td id="td10"><input type="text"name="cost[]" value="<?=$values->cost_per_sq_inch;?>" id="cost1" class="inputbxs10" placeholder="Cost"/></td>
    <td id="td10"><input type="text"name="rate[]" value="<?=$values->rate;?>" id="rate1" class="inputbxs10" placeholder="Rate"/></td>
    <td id="td10"><input type="text"name="unit[]" value="<?=$values->cost_per_sq_inch;?>" id="unit1" class="inputbxs10" placeholder="Unit"/></td>
    
    <td id="td10"><select name="noofpices[]" style="height: 29px; padding-left: 20px;
    margin-left: 0px;
    width: 80px;"><option value="roll">Roll</option><option value="cut_sheet">Cut Sheet</option></select></td>
   </tr>
     
       
       </table>
          <input type="submit" class="bt-sbt-upload" name="edit" id="upload images" value="Update" style="float: right;"   />     
           <?php endforeach;?>
               
                 <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton6' >Add Row</a> <a href="#!" class="subtractwcp" id='removeButton6'>Remove Row</a></div>
       <br>
       
        <div id='TextBoxesGroup6'>
	<div id="TextBoxDiv6">  
            
            
            
            <?php
          $other_code=  $this->backend_model->get_frame_code('other_name');
           ?> 
            <input type="hidden" name="some_code[]" value="<?=$other_code?>">
            <table style="border-bottom: 0px;  width: 95%">
           
                <tr id="tr"> <td>Other Name</td> <td>Amount</td><td>Rate</td><td>Unit</td><td>No of Pieces/lot</td></tr>  
    
                <tr id="get_data">
       <td id="td10"><input type="text"name="framenamen[]" style="margin-right: 0px;" id="othername" class="inputbxs10" placeholder="Other Name"/></td>
    <td id="td10"><input type="text"name="costn[]" id="cost1" class="inputbxs10" placeholder="Amount"/></td>
    <td id="td10"><input type="text"name="raten[]" id="rate1" class="inputbxs10" placeholder="Rate"/></td>
    <td id="td10"><input type="text"name="unitn[]" id="unit1" class="inputbxs10" placeholder="Unit"/></td>
    
    <td id="td10"><select name="noofpicesn[]" style="height: 29px; padding-left: 20px;
    margin-left: 0px;
    width: 80px;"><option value="roll">Roll</option><option value="cut_sheet">Cut Sheet</option></select></td>
   </tr>
     
       
       </table> 
          </div></div>
       
               <?php }?>
             </div>
           <input type="submit" class="bt-sbt-upload" name="save" id="upload images" value="Add" style="float: right;margin-right: 5%; "  />  
        
    </form>
    <div style="margin:16px 0 18px 5px;"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
          </div>
     
       
            
         
<style>
     .inputbxs1{ width: 69px; height:29px;  }
     .inputbxs2{ width: 63px; height:27px;}
    .inputbxs3{ width: 77px; height:29px;  }
     .inputbxs4{ width: 77px; height:27px;}
     .inputbxs05{ width: 91px; height:29px;  }
     .inputbxs5{ width: 78px; height:29px;  }
     .inputbxs6{ width: 63px; height:27px;}
      .inputbxs06{ width: 63px; height:27px;}
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
    <script>
        ////// code for MGB FRAME//////
     function get_data_with_heightmgb(){ 
    var frame=$('#frame').val();     
    var int = parseInt((Math.random() * 100), 10);
    var name=$('#name').val();  
   // var height=$('#height').val();  
   // var width=$('#widthmgb').val();  
    var color=$('#colormgb').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
   // var str_height= height.substring(0, 2).toUpperCase();
    //var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+int;
      //alert(code_gen);
    document.getElementById('mgbpackage_code_gen').value=code_gen;   
     
   }// end function
   ////// code for MGB //////
    $(document).on("blur", ".inputbxs4", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
     var frame=$('#frame').val();        //alert(myBookId);
    var name=$('#name').val();  
   // var height=$('#height'+myBookId).val();  
   // var width=$('#width'+myBookId).val();  
    var color=$('#colormgb'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    //var str_height= height.substring(0, 2).toUpperCase();
    //var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+int;
      //alert(code_gen);
      document.getElementById('mgbpackage_code_genn'+myBookId).value=code_gen;   
     //document.getElementById('package_code'+myBookId).value=code_gen;
     
     
    
    });
   
   
   
    ////// code for MNT FRAME//////
     function get_data_with_heightmnt(){ 
    var frame=$('#frame').val();     
    var int = parseInt((Math.random() * 100), 10);
    var name=$('#name').val();  
    var height=$('#heightmnt').val();  
    var width=$('#widthmnt').val();  
    var color=$('#colormnt').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+str_width+str_height+int;
      //alert(code_gen);
    document.getElementById('mntpackage_code_gen').value=code_gen;   
     
   }// end function
 
 ////// code for MNT //////
    $(document).on("blur", ".inputbxs5", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
     var frame=$('#frame').val();        //alert(myBookId);
    var name=$('#name').val();  
    var height=$('#height3'+myBookId).val();  
   var width=$('#width3'+myBookId).val();  
    var color=$('#color3'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
   var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+str_height+str_width+int;
      //alert(code_gen);
      document.getElementById('package_code_gen3'+myBookId).value=code_gen;   
     //document.getElementById('package_code'+myBookId).value=code_gen;
     
     
    
    });
   
   
 
   ////// code for MGB //////
    $(document).on("blur", ".inputbxs4", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
     var frame=$('#frame').val();        //alert(myBookId);
    var name=$('#name').val();  
   // var height=$('#height'+myBookId).val();  
   // var width=$('#width'+myBookId).val();  
    var color=$('#colormgb'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    //var str_height= height.substring(0, 2).toUpperCase();
    //var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+int;
      //alert(code_gen);
      document.getElementById('mgbpackage_code_genn'+myBookId).value=code_gen;   
     //document.getElementById('package_code'+myBookId).value=code_gen;
     
     
    
    });
   
   ////////////// CODE FOR GLS////////////////
    function get_data_with_heightgls(){ 
    var frame=$('#frame').val();     
    var int = parseInt((Math.random() * 100), 10);
    var name=$('#name').val();  
   var height=$('#heightgls').val();  
    var width=$('#widthgls').val();  
    var color=$('#colorgls').val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+str_height+str_width+str_first+int;
      //alert(code_gen);
    document.getElementById('addglspackage_code_gen').value=code_gen;   
     
   }// end function
   
   
   ////// code for GLS //////
    $(document).on("blur", ".inputbxs6", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
     var frame=$('#frame').val();        //alert(myBookId);
    var name=$('#name').val();  
    var height=$('#heightgls'+myBookId).val();  
   var width=$('#widthgls'+myBookId).val();  
    var color=$('#colorgls'+myBookId).val(); 
    var str_name= name.substring(0, 2).toUpperCase();
    var str_height= height.substring(0, 2).toUpperCase();
    var str_width= width.substring(0, 2).toUpperCase();
    var str_first= color.substring(0, 1).toUpperCase();
    var lastChar=color.substr(color.length - 1).toUpperCase();
    var color_str=str_first+lastChar;
    var code_gen=frame+str_name+color_str+str_height+str_width+str_first+int;
      //alert(code_gen);
      document.getElementById('glspackage_code_genn'+myBookId).value=code_gen;   
     
    });
   
   
   
   
   
   ////// code for FRAMEr//////
    $(document).on("blur", ".inputbxs2", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10)
     var frame=$('#frame').val();        //alert(myBookId);
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
    var code_gen=frame+str_name+color_str+str_width+int;
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
    
  //////////////////////  code for framer//////////////////  
   function get_data_with_height(){ 
    var frame=$('#frame').val();     
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
    var code_gen=frame+str_name+color_str+str_width+int;
      //alert(code_gen);
    document.getElementById('package_code_gen').value=code_gen;   
      }// end function  
     
     
       
     //////////////////////  code for framer//////////////////     
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
    
           function show_newTextBox2()
 {
     document.getElementById('display_namen2').style.display="block";
      document.getElementById('display_name_listn2').style.display="none";
      document.getElementById('new_display_namen2').style.display="none";
      document.getElementById('list_display_namen2').style.display="block";
   
 }
 


 function show_oldTextBox2()
 {
    $('#display_namen2').hide();
    $('#new_display_namen2').show();
    $('#display_name_listn2').show();
    $('#list_display_namen2').hide();
    }
    
    
 $(document).ready(function(){ 
    $(document).on("click", ".newClass", function () {
     var myBookId = $(this).data('id');
     var action = $(this).data('action');
      //alert(action);
      var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv' + myBookId);
    var target = document.getElementById('display_name_listn2');
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

$('#display_name_listn2').show();
$('#list_display_namen2').hide();
 $('#new_display_namen2').show();

    var counter = 3;
		
    $("#addButton").click(function () {
		//alert(counter);		
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   //alert(counter);
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv' + counter);
    var target = document.getElementById('display_name_listn2');
    var wrap = document.createElement('td');
    wrap.appendChild(target.cloneNode(true));
    var display_name_list=  wrap.innerHTML;
    
    newTextBoxDiv.after().html(
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td2"><input hidden="text" name="some_coden[]" value="<?=$frame_code?>"><input type="text"name="framenamen[]" id="framename'+counter+'" class="inputbxs2" style="margin-left: 0px;" placeholder="Frame Name"/></td> <td><div class="new_class" id="new_image" class="new"><input type="file"  name="file[]"  data-id="'+counter+'" class="file"  id="file'+counter+'" style="width:100px;" /></div></td><td id="td2"><div class="image_preview" id="image_preview'+counter+'"><img id="previewing'+counter+'" src="" width="50" height="50"/></div></td><td id="td2"><input type="text"name="unitn[]" id="unit'+counter+'" class="inputbxs2" placeholder="Unit"/></td><td id="td2"><input type="text"name="rate[]" id="cost'+counter+'" class="inputbxs2" placeholder="Rate"/></td><td><input type="text"name="widthn[]" id="width'+counter+'" data-toggle="modal"  data-id="'+counter+'" class="inputbxs2" placeholder="Width"/></td><td id="td2"><input type="text"name="lenghtn[]" id="lenght'+counter+'" class="inputbxs2" placeholder="Depth"/></td><td id="td2"><input type="text"name="colorn[]"  data-toggle="modal"  data-id="'+counter+'" id="color'+counter+'" class="inputbxs2" placeholder="Color"/></td><td id="text_box'+counter+'"><a  href="" id="new_textBox'+counter+'" class="newClass" style="margin-left:5px" data-toggle="modal" data-id="'+counter+'" data-action="new_list">New Display Name</a><a data-toggle="modal" data-id="'+counter+'" data-action="old_list" class="newClass" style="margin-left:25px; display:none; "  id="list_display_namen'+counter+'" >Old Display Name</a><br><select name="display_name_listn[]" id="display_name_list'+counter+'" class="inputbxs2" style="height: 29px; padding-left:0px;margin-left: 0px;width: 92px;"><option value="">---Select---</option><?php foreach($package_rows as $values){?><option  value="<?=$values->sur_code;?>"><?php echo $values->sur_code;?></option><?php }?></select></td><td id="td2"> <input name="frame_coden[]" id="package_code_gen'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"> </td><td id="td2"><textarea name="descn[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');
       newTextBoxDiv.appendTo("#TextBoxesGroup");
       newTextBoxDiv.appendTo("#display_namen2"+counter);
	counter++;
      //show_newTextBox(counter)
     });

     $("#removeButton").click(function () {
	if(counter==3){
          alert("No more textbox to remove");
          
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
    	  //alert(msg);
     });
     
     
  
     
     
  });
  
  
  /// mgb frame name///////
  $(document).ready(function(){


    var counter = 2;
		
    $("#addButton2").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv2' + counter);
    
    newTextBoxDiv.after().html(
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td4"><input hidden="text" name="some_code[]" value="<?=$mgb_name?>"><input type="text"name="framename[]" id="framename'+counter+'" class="inputbxs4" style="margin-left: 8px;" placeholder="M+g+b Name"/></td> <td id="td4"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs4" placeholder="Unit"/></td><td id="td4"><input type="text"name="rate[]" id="cost'+counter+'" class="inputbxs4" placeholder="Amount"/></td><td id="td4"><input type="text"name="lenght[]" id="lenght2'+counter+'" class="inputbxs4" placeholder="Depth"/></td><td id="td4"><input type="text"name="color[]"  data-toggle="modal"  data-id="'+counter+'" id="colormgb'+counter+'" class="inputbxs4" placeholder="Color"/></td><td id="td4"> <input name="frame_coden[]" id="mgbpackage_code_genn'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"> </td><td id="td4"><textarea name="desc[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');


       newTextBoxDiv.appendTo("#TextBoxesGroup2");
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
  
  ////////////// mount name done ///////////
  $(document).ready(function(){

    var counter = 2;
		
    $("#addButton3").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv3' + counter);
   
    
    newTextBoxDiv.after().html(
	 
	'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td5"><input type="hidden" name="some_coden[]" value="<?=$mount_code?>"><input type="text"name="framenamen[]" id="framename'+counter+'" class="inputbxs5" style="margin-left:9px;" placeholder="Mount Name"/></td> <td id="td5"><input type="text"name="unitn[]" id="unit'+counter+'" class="inputbxs5" placeholder="Unit"/></td><td id="td5"><input type="text"name="raten[]" id="cost'+counter+'" class="inputbxs5" placeholder="Rate"/></td><td id="td5"><input type="text"name="Quantityn[]" id="Quantity'+counter+'" class="inputbxs5" placeholder="Quantity"/></td><td><input type="text"name="heightn[]" id="height3'+counter+'" class="inputbxs5" data-toggle="modal"  data-id="'+counter+'"  placeholder="Height"/></td><td><input type="text"name="widthn[]" data-toggle="modal"  data-id="'+counter+'"  id="width3'+counter+'" class="inputbxs5" placeholder="Width"/></td><td><input type="text"name="lenghtn[]" id="lenght'+counter+'" class="inputbxs5" placeholder="Depth"/></td><td id="td5"><input type="text"name="colorn[]" data-toggle="modal"  data-id="'+counter+'"   id="color3'+counter+'" class="inputbxs5" placeholder="Color"/></td><td id="td5"><input name="frame_coden[]" id="package_code_gen3'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"></td><td id="td5"><textarea name="descn[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');

       newTextBoxDiv.appendTo("#TextBoxesGroup3");
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
			
        $("#glassmount_div" + counter).remove();
      
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

'<table style="border-top: 0px; border-bottom: 0px; width:95%;"><tr><td id="td6"> <input type="hidden" name="some_code[]" value="<?=$glass_code?>"><input type="text"name="framename[]" id="glassname'+counter+'" class="inputbxs6" style="margin-left: 1px;" placeholder="Glass Name"/></td> <td id="td6"><input type="text"name="unit[]" id="unit'+counter+'" class="inputbxs6" placeholder="Unit"/></td><td id="td6"><input type="text"name="cost[]" id="cost'+counter+'" class="inputbxs6" placeholder="Amount"/></td><td id="td6"><input type="text"name="Quantity[]" id="Quantity'+counter+'" class="inputbxs6" placeholder="Quantity"/></td><td id="td6"><input type="text"name="height[]" id="height4'+counter+'" class="inputbxs6" data-toggle="modal"  data-id="'+counter+'" placeholder="Height"/></td><td id="td6"><input type="text"name="width[]"  data-toggle="modal"  data-id="'+counter+'"id="width4'+counter+'" class="inputbxs6" placeholder="Width"/></td><td id="td6"><input type="text"name="length[]" id="lenght'+counter+'" class="inputbxs6" placeholder="Depth"/></td><td id="td6"><input type="text"name="color[]" data-toggle="modal"  data-id="'+counter+'"  id="color4'+counter+'" class="inputbxs6" placeholder="Color"/></td><td id="td6"><input name="frame_code[]" id="package_code_gen4'+counter+'" style="    width: 73px; height: 29px; margin-top: 17px;"></td><td id="td6"><textarea name="desc[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');
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
  
  
          
           $(document).ready(function (e) {        
                   // Function to preview image after validation
                $(function() {
                    $("#file").change(function() {
                    $("#message").empty(); // To remove the previous error message
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                        $('#previewing').attr('src','noimage.png');
                        
                        return false;
                    }else{
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
             });
              function imageIsLoaded(e) {
                  $("#file").css("color","#FFFFFF");
                  $('#image_preview').css("display", "block");
                  $('#previewing').attr('src', e.target.result);
                  $('#previewing').attr('width', '80px');
                  $('#previewing').attr('height', '80px');
              };
          });
                   
                   
                   
                         $(document).ready(function(){                                        
                          $(document).on("blur", ".file", function () {                    
                              var myBookId = $(this).data('id');                  
                              
                                $(function() {
                    $("#file"+myBookId).change(function() {
                    $("#message"+myBookId).empty(); // To remove the previous error message
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                        $('#previewing'+myBookId).attr('src','noimage.png');
                        
                        return false;
                    }else{
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
             });
              function imageIsLoaded(e) {
                  $("#file"+myBookId).css("color","#FFFFFF");
                  $('#image_preview'+myBookId).css("display", "block");
                  $('#previewing'+myBookId).attr('src', e.target.result);
                  $('#previewing'+myBookId).attr('width', '80px');
                  $('#previewing'+myBookId).attr('height', '80px');
              };
          });
                
                            });
                         
                          
        </script>