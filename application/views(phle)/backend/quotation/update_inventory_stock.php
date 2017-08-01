<?php $surface_framer=$this->backend_model->get_framer_surface('FRM');$framer_width=$this->backend_model->get_framer_width('FRM');$surface_mount=$this->backend_model->get_framer_surface('MNT');$surface_glass=$this->backend_model->get_framer_surface('GLS');?>
<html>
    <head>
<title>Create Quotation</title>
<link href="<?php echo base_url()?>assets/css/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?php echo base_url()?>assets/js/common.js"></script>
<style>
.txtbox_f {    width: 61px;    height: 30px;}
.txtbox_f_offline{ width: 61px;    height: 30px;}
.txtbox_f_online{ width: 61px;    height: 30px;}
.s_custom{padding-left: 56px; }
.s_list{padding-left: 56px; }
</style>
<?php if($msg<>'') {?>
          <script>
              setTimeout(function(){outtime()},1500);
              function outtime(){
                  window.location.href="<?=base_url()?>index.php/backend/create_inventory";
              }
           </script>
          <?php echo $msg;}?>


<script type="text/javascript">


$(document).ready(function(){
    
    
    

    $('#packaging_charge').val(30);
    var counter = 1;
    $("#addButton").click(function () {




       

        if(counter>10){    alert("Only 10 textboxes allow");            return false;	}   			var newTextBoxDiv = $(document.createElement('div'))	     .attr("id", 'TextBoxDiv' + counter);
      newTextBoxDiv.after().html('<tr><td style="width:119px;"><div class="old_class"><input type="text" class="txtbox_f_online" name="imgid[]" data-id="'+counter+'"  id="imgid'+counter+'" /></div><div class="new_class" id="new_image" class="new"><input type="file"  name="file[]"  data-id="'+counter+'" class="file"  id="file'+counter+'" style="width:100px;" /></div></td><td ><div class="image_preview" id="image_preview'+counter+'"><img id="previewing'+counter+'" src="" width="50" height="50"/></div><span id="image_visual'+counter+'" class="image_visual" style="height:80px; width: 80px; border: solid 1px; color:#CCCCCC "></span></td><td><span id="license_cost'+counter+'">0.00</span><br><input type="text" class="txtbox" name="license_cost[]" id="license_cost'+counter+'"  onkeyup="return calculator_show();" /></td><td><a  data-id="'+counter+'" data-name="s_custom" class="s_custom" id="s_custom'+counter+'">Custom</a><a  class="s_list"  data-id="'+counter+'" data-name="s_list" id="s_list'+counter+'">List</a><br><input class="new_surface" type="text" name="surface[]" id="new_surface'+counter+'" style="width:162px; height:18px;"><select class="surface" name="surface[]" id="surface'+counter+'"> <?php $surface=$this->backend_model->get_surface(); foreach($surface as $surf) {  ?><option value="<?php echo $surf['surface']; ?>"><?php echo $surf['surface'] ?></option><?php } ?> </select></td> <td><input type="text" name="print_height[]" id="print_height'+counter+'" onkeyup="return calculator_show();" onBlur="return calculator_show();" class="txtbox"></td> <td><input type="text" name="print_width[]" id="print_width'+counter+'" class="txtbox" onBlur="return calculator_show();" onkeyup="return calculator_show();"></td> <td><input type="tex" readonly="" name="print_cost" id="print_cost'+counter+'" class="txtbox" ></td><td class="mount">  <a  data-id="'+counter+'" data-name="m_custom" class="m_custom" id="m_custom'+counter+'">Custom</a><a  class="m_list"  data-id="'+counter+'" data-name="m_list" id="m_list'+counter+'">List</a><br><input class="new_mount_code" type="text" name="mount_code[]" id="new_mount_code'+counter+'" style="width:98px; height:18px;"><select name="mount_code[]" id="mount_code'+counter+'"><?php foreach ($surface_mount as $mount) {  ?><option value="<?php echo $mount['surface']; ?>"><?php echo $mount['surface'] ?></option><?php } ?> </select> </td><td></td><td class="mount"><input type="text" name="mount_width[]" onkeyup="return calculator_show();" onBlur="return calculator_show();" class="txtbox" id="mount_width'+counter+'"></td><td class="mount"><input type="tex" readonly="" name="mount_cost" id="mount_cost'+counter+'" class="txtbox" ></td><td class="frame"><a  data-id="'+counter+'" data-name="f_custom" class="f_custom" id="f_custom'+counter+'">Custom</a><a  class="f_list"  data-id="'+counter+'" data-name="f_list" id="f_list'+counter+'">List</a><br><input class="new_frame_code" type="text" name="framer_code[]" id="new_frame_code'+counter+'" style="width:124px; height:18px;"><select name="frame_code[]" id="frame_code'+counter+'"><?php foreach ($surface_framer as $framer) {?><option value="<?php echo $framer['surface']; ?>"><?php echo $framer['surface'] ?></option><?php } ?> </select></td><td class="frame"></td><td class="frame"><select name="frame_width[]" id="frame_width'+counter+'" onkeyup="return calculator_show();" onchange="return calculator_show();"><?php foreach ($framer_width as $width) {?><option value="<?php echo $width['width']; ?>"><?php echo $width['width'] ?></option><?php } ?> </select></td><td class="frame"><input type="tex" readonly="" name="frame_cost" id="frame_cost'+counter+'" class="txtbox" ></td><td class="cover"><a  data-id="'+counter+'" data-name="c_custom" class="c_custom" id="c_custom'+counter+'">Custom</a><a  class="c_list"  data-id="'+counter+'" data-name="c_list" id="c_list'+counter+'">List</a><br><input class="new_cover" type="text" name="cover[]" id="new_cover'+counter+'" style="width:69px; height:18px;"><select name="cover[]" id="cover'+counter+'"><?php foreach ($surface_glass as $GLASS) {  ?><option value="<?php echo $GLASS['surface']; ?>"><?php echo $GLASS['surface'] ?></option><?php } ?> </select></td> <td  class="cover"><input type="tex" readonly="" name="glass_cost" id="glass_cost'+counter+'" class="txtbox" ></td><td><input type="text" readonly="" style="background-color:#F7F7F7; text-align: center; font: bold; border: none;" name="Q_total[]" id="total'+counter+'"></td></tr>');

		newTextBoxDiv.appendTo("#TextBoxesGroup");
		counter++;           });

		 $("#removeButton").click(function () {
		 if(counter==1){
		 alert("No more textbox to remove");
		 return false;
		 }
		 counter--;

		 var packaging_charge=30*counter;
		 $('#packaging_charge').val(packaging_charge);
		 $("#TextBoxDiv" + counter).remove();
             });
		  $("#getButtonValue").click(function ()
		  {			var msg = '';	for(i=1; i<counter; i++){   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();	}    	  alert(msg);


		     });  });



$(document).ready(function(){

    $('#packaging_charge_offline').val(30);
    var counter = 1;
    $("#addButton_offline").click(function () {

        if(document.getElementById('old_image_offline').checked==true)
        {
          var status='1';
        }else if(document.getElementById('new_image_offline').checked==true){
            status='2';
        }
         change_div_offline(status);

        if(counter>10){    alert("Only 10 textboxes allow");            return false;	}   			var newTextBoxDiv = $(document.createElement('div'))	     .attr("id", 'TextBoxDiv' + counter);
      newTextBoxDiv.after().html('<tr><td style="width:119px;"><div class="old_class_offline"><input type="text"  name="imgid_off[]" data-id="'+counter+'"  class="txtbox_f_offline" id="imgid_offline'+counter+'" /></div><div class="new_class_offline" id="new_image_offline" class="new_offline"><input type="file"  name="file_off[]"  data-id="'+counter+'" class="file_offline"  class="txtbox2" id="file_offline'+counter+'" style="width:100px;" /></div></td><td class="order_id'+counter+'"><input type="text" name="order_id_off[]" id="order_id_off'+counter+'" class="txtbox2" ></td><td ><input type="text" name="packaging_charge_off[]" id="packaging_charge_off'+counter+'" class="txtbox2" ></td><td ><input type="text" name="courier_charge_off[]" id="courier_charge_off'+counter+'" class="txtbox2" ></td><td ><div class="image_preview_offline" id="image_preview_offline'+counter+'" ><img id="previewing_offline'+counter+'" src="" width="50" height="50"/></div><span id="image_visual_offline'+counter+'" class="image_visual_offline" style="height:80px; width: 80px; border: solid 1px; color:#CCCCCC "></span></td><td><input type="text" class="txtbox2" name="license_cost_off[]" id="license_cost_off'+counter+'"  class="txtbox2" onkeyup="return calculator_offline();" /></td><td><input type="text" name="surface_off[]" id="surface_off" class="txtbox2"></td><td><input type="text" name="print_height_off[]" id="print_height_off'+counter+'" onKeyUp="return calculator_offline();" onBlur="return calculator_offline();" class="txtbox2"></td><td ><input type="text" name="print_width_off[]" id="print_width_off'+counter+'" class="txtbox2" onBlur="return calculator_offline();" onKeyUp="return calculator_offline();"></td><td><input type="tex"  name="print_rate_off[]" onkeyup="return calculator_offline();" onBlur="return calculator_offline();"  id="print_rate_off'+counter+'" class="txtbox2" ></td><td class="printer"><input type="tex" readonly="" name="print_cost_off" id="print_cost_off'+counter+'" class="txtbox2" ></td><td><input type="tex"  name="border_off[]" onkeyup="return calculator_offline();" onBlur="return calculator_offline();"  id="border_off'+counter+'" class="txtbox2" ></td><td class="mount"><input type="text" name="mount_code_off[]" id="mount_code'+counter+'" class="txtbox2"></td><td></td><td  class="mount"><input type="text" name="mount_width_off[]" onKeyUp="return calculator_offline();" onBlur="return calculator_offline();" class="txtbox2" id="mount_width_off'+counter+'"></td><td  class="mount"><input type="tex" readonly="" name="mount_cost_off" id="mount_cost_off'+counter+'" class="txtbox2" ></td><td  class="frame"><input type="text" name="frame_code_off[]" id="framer_code_off'+counter+'"  class="txtbox2"></td><td></td><td  class="frame"><input type="text" name="frame_width_off[]" id="frame_width_off'+counter+'" class="txtbox2" onkeyup="return calculator_offline();" onChange="return calculator_offline();"></td><td  class="frame framer_c"><input type="tex" readonly="" name="frame_cost_off" id="frame_cost_off'+counter+'" class="txtbox2" ></td><td class="canvas"><input type="tex" readonly="" name="canvas_cost_off" id="canvas_cost_off'+counter+'" class="txtbox2" ></td><td  class="cover"><input type="text" name="cover_off[]" id="cover_off'+counter+'"  class="txtbox2"></td><td  class="cover"><input type="tex" readonly="" name="glass_cost_off" id="glass_cost_off'+counter+'" class="txtbox2" ></td><td class="cp"><span id="discount_off'+counter+'"></span><br><input type="tex"  name="cp_amount[]" id="cp_amount'+counter+'" onkeyup="return reverse_calculate();" onblur="return reverse_calculate();" class="txtbox2" ></td><td><input type="text" readonly="" style="background-color:#F7F7F7; text-align: center; font: bold; border: none;" name="Q_total_off[]" id="total_off'+counter+'"></td></tr>');

		newTextBoxDiv.appendTo("#TextBoxesGroup_offline");
		counter++;           });

		 $("#removeButton_offline").click(function () {
		 if(counter==1){
		 alert("No more textbox to remove");
		 return false;
		 }
		 counter--;
		 var packaging_charge=30*counter;$('#packaging_charge_offline').val(packaging_charge);                $("#TextBoxDiv_offline" + counter).remove();		     });		     $("#getButtonValue_offline").click(function () {			var msg = '';	for(i=1; i<counter; i++){   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();	}    	  alert(msg);     });  });




$(document).ready(function(){
 var counter = 1;
    $("#addButton_custom").click(function () {
       
     $('.mount'+counter).hide();
     $('.frame'+counter).hide();
     $('.cover'+counter).hide();

      $('.canvas'+counter).hide();
       $('#framer_l'+counter).hide();
       $('.framer_c'+counter).hide();

       
        if(counter>10){    alert("Only 10 textboxes allow");     
            return false;	}   		
        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv1_custom' + counter);
       newTextBoxDiv.after().html('<table width="100%" align="center" cellpadding="0" cellspacing="0" class="creat-ordertable"><tr ><td><span>Print Type </span>&nbsp;<select data-id="'+counter+'" name="category_custom[]" id="category_custom'+counter+'" style="height:25px" class="print_type" ><option value="">-Print Type-</option><option value="1">Print</option><option value="2">Print+Mount</option><option value="3">Print + frame</option><option value="4">Print+frame+Mount+Glass</option><option value="5">Print+frame+Mount</option><option value="6">Print+frame+Canvas</option></select></td><td style="color:#000;"><span style="color:#000; padding:-10px 0px;"> Channel Partner  &nbsp;&nbsp; </span><input type="checkbox" name="channel_partner[]" class="channel_partner"  id="channel_partner_custom'+counter+'" data-id="'+counter+'"></td><td></td><td></td><td></td><td></td></tr><tr class="darktr"><td width="308" class="bold">Images ID :</td><td><input type="file"   name="file_custom[]"   data-id="'+counter+'" id="file_custom'+counter+'" class="file_upload" /></td><td class="bold">Collection Name:</td><td><input type="text"   name="collection_name[]" class="txtbox2" id="collection_name'+counter+'"/></td><td class="bold">Packaging Charge</td><td><input type="text" data-id="'+counter+'" class="txtbox2" name="packaging_charge_custom[]" id="packaging_charge_custom'+counter+'"></td></tr><tr><td class="bold">Image Visual:</td><td><div id="image_preview_custom'+counter+'" class="image_preview_custom"><img id="previewing_custom'+counter+'" src="" width="50" height="50"/></div></td><td class="bold">Courier Charge </td><td><input type="text" data-id="'+counter+'" class="txtbox2" name="courier_charge_custom[]" id="courier_charge_custom'+counter+'"></td><td class="bold">Surface</td><td><input type="text" data-id="'+counter+'" class="txtbox2" name="surface_custom[]" id="surface_custom'+counter+'" /></td></tr><tr class="darktr"><td class="bold">Border</td><td><input type="tex"  class="txtbox2" name="border_custom[]"   id="border_custom'+counter+'"></td><td class="bold ">License Cost(%)</td><td ><span id="license_cost_custom_display'+counter+'">0.00</span><br><input type="text" data-id="'+counter+'" name="license_cost_custom[]"   id="license_cost_custom'+counter+'"  class="printer"/></td><td class="bold order_id'+counter+'">Order Id</td><td class="order_id'+counter+'"><input type="text" name="order_id_custom[]" class="txtbox2" id="order_id_custom'+counter+'"></td></tr><tr bgcolor="#388fc4"><td><span style="color:#fff;"> Other Detalis </span> </td><td></td><td></td><td></td><td></td><td></td></tr><tr class="darktr"><td width="3'+counter+'8" class="bold">Final Royalty :</td><td width="246" class="printer"><input type="tex" readonly=""  name="final_royality[]" id="final_royality'+counter+'" class="txtbox2" ></td><td width="323" class="bold printer"> Final WNA license share</td><td width="164" class="printer"><input type="tex"  readonly="" name="final_wna_license_share[]" id="final_wna_license_share'+counter+'" class="txtbox2" ></td></tr><tr bgcolor="#388fc4"><td><span style="color:#FFF;"> Printing Details </span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td></tr><tr class="darktr"><td width="308" class="bold">Height :</td><td><input type="text" data-id="'+counter+'" name="print_height_custom[]" id="print_height_custom'+counter+'"   class="printer" ></td><td class="bold">Width:</td><td><input type="text" data-id="'+counter+'" name="print_width_custom[]" id="print_width_custom'+counter+'"   class="printer"></td><td class="bold">Minimum Rate:</td><td><input type="tex" data-id="'+counter+'" name="print_rate_custom[]"   id="print_rate_custom'+counter+'"  class="printer" ></td></tr><tr><td class="bold">Print Cost</td><td class="printer"><input type="tex"  data-id="'+counter+'" name="print_cost_custom[]" id="print_cost_custom'+counter+'"   class="print_cost_custom printer" ></td><td class="bold">Discount </td><td class="printer"><input type="tex" data-id="'+counter+'"  name="print_discount_custom[]" id="print_discount_custom'+counter+'" class="printer" ></td><td class="bold">Actual Print Cost</td><td ><input type="text" name="actual_print_cost[]" id="actual_print_cost'+counter+'" class="txtbox2"></td></tr><tr><td class="bold">Actual Rate</td><td class"printer"><input type="text"  data-id="'+counter+'" name="actual_rate[]" id="actual_rate'+counter+'"  readonly=""  class="print_cost_custom printer" ></td><td class="bold"> </td><td class="printer"></td><td class="bold"></td><td ></td></tr><tr bgcolor="#388fc4" class="mount'+counter+'"><td><span style="color:#fff;"> Mount Details </span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td></tr><tr class="darktr mount'+counter+'"><td width="308" class="bold mount'+counter+'"> Name :</td><td class="mount'+counter+'"><input type="text" name="mount_code_custom[]" class="txtbox2" id="mount_code'+counter+'"></td><td class="bold mount'+counter+'"> Mount Width </td><td class="mount'+counter+'"><input type="text" data-id="'+counter+'" name="mount_width_custom[]" id="mount_width_custom'+counter+'"   class="mount_cost_custom"></td><td class="bold mount">Discount : </td><td class="mount'+counter+'"><input type="tex"  readonly="" name="mount_discount_custom[]" id="mount_discount_custom'+counter+'" class="txtbox2" ></td></tr><tr class="mount'+counter+'"><td class="bold mount'+counter+'">Charge Rate:</td><td class="mount'+counter+'"><input type="text" readonly="" name="mount_rate_custom[]" id="mount_rate_custom'+counter+'" class="txtbox2" ></td><td class="bold mount">Actual Cost </td><td class="mount'+counter+'"><input type="text" readonly=""  data-id="'+counter+'" name="mount_actual_cost_custom[]"   id="mount_actual_cost_custom'+counter+'" class="txtbox2" ></td><td class="bold mount'+counter+'">Cost</td><td class="mount'+counter+'"><input type="text"  data-id="'+counter+'" name="mount_cost_custom[]"   id="mount_cost_custom'+counter+'" class="mount_cost_custom" ></td></tr><tr bgcolor="#388fc4" class="frame'+counter+'"><td><span style="color:#fff;"> Frame Details </span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td></tr><tr class="darktr frame"><td width="3'+counter+'8" class="bold frame'+counter+'"> Name :</td><td class="frame'+counter+'" ><input type="text" name="frame_code_custom[]"  class="txtbox2" id="framer_code_custom'+counter+'"></td><td class="bold frame'+counter+'"> Frame Width </td><td class="frame'+counter+'"><input type="text" name="frame_width_custom[]" data-id="'+counter+'" id="frame_width_custom'+counter+'"  class="frame_cost_custom"></td><td class="bold frame'+counter+'">Discount : </td><td class="frame'+counter+'"><input type="text" readonly="" name"frame_discount_custom[]" id="frame_discount_custom'+counter+'" class="txtbox2" ></td></tr><tr class="frame'+counter+'"><td class="bold frame'+counter+'"><span class="bold mount">Charge</span> Rate:</td><td class="frame'+counter+'"><input type="text" readonly="" name="frame_rate_custom[]" id="frame_rate_custom'+counter+'" class="txtbox2" ></td><td class="bold ">Actual Cost </td><td ><input type="text"  readonly="" data-id="'+counter+'" name="frame_actual_cost_custom[]"   id="frame_actual_cost_custom'+counter+'"class="txtbox2" ></td><td class="bold frame'+counter+'">Cost </td><td class="frame'+counter+'"><input type="tex" data-id="'+counter+'"name="frame_cost_custom[]" id="frame_cost_custom'+counter+'" class="frame_cost_custom" ></td></tr><tr bgcolor="#388fc4" class="canvas'+counter+'"><td><span style="color:#fff;"> canvas  Details</span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td></tr><tr class="canvas'+counter+'"><td width="308" class="bold canvas'+counter+'"> Name :</td><td class="canvas'+counter+'"><input type="text" data-id="'+counter+'" name="canvas_custom[]" id="canvas_custom'+counter+'" class="canvas_cost_custom"><td class="bold canvas'+counter+'">Actual Cost </td><td class="canvas'+counter+'"><input type="text"  readonly=""  name="canvas_actual_cost_custom[]" id="canvas_actual_cost_custom'+counter+'" class="txtbox2" ></td><td class="bold canvas'+counter+'"> Cost </td><td class="canvas'+counter+'"><input type="text"  data-id="'+counter+'" name="canvas_cost_custom[]" id="canvas_cost_custom'+counter+'" class="canvas_cost_custom" ></td></tr><tr class="canvas'+counter+'"><td class="bold canvas'+counter+'"><span class="bold ">Charge Rate</span> </td><td class="canvas'+counter+'"><input type="text" name="canvas_rate_custom[]" readonly="" id="canvas_rate_custom'+counter+'" class="txtbox2"><td class="bold canvas">Discount : </td><td class="canvas'+counter+'"><input type="text" name="canvas_discount_custom[]" id="canvas_discount_custom'+counter+'" data-id="'+counter+'" class="canvas_cost_custom" ></td></tr><tr  bgcolor="#388fc4" class="cover'+counter+'"><td><span style="color:#fff;"> Glass Details </span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td></tr><tr class="cover'+counter+'"><td width="308" class="bold cover'+counter+'"> Name:</td><td class="cover'+counter+'"><input type="text" data-id="'+counter+'" name="cover_custom[]" id="cover_custom'+counter+'" class="cover_cost_custom"><td class="bold cover'+counter+'">Actual Cost </td><td class="cover'+counter+'"><input type="text"  readonly="" data-id="'+counter+'" name="cover_actaul_cost_custom[]" id="cover_actaul_cost_custom'+counter+'" class="txtbox2" ></td><td class="bold cover"> Cost </td><td class="cover'+counter+'"><input type="text"  data-id="'+counter+'" name="cover_cost_custom[]" id="cover_cost_custom'+counter+'" class="cover_cost_custom" ></td></tr><tr class="cover'+counter+'"><td class="bold covers'+counter+'"><span class="bold mount">Charge</span> Rate</td><td class="cover'+counter+'"><input type="text" readonly="" name="glass_rate_custom[]" id="glass_rate_custom'+counter+'" class="txtbox2"></td><td class="bold covers'+counter+'">Discount:</td><td class="cover'+counter+'"><input type="tex"  name="cover_discount_custom[]" id="cover_discount_custom'+counter+'" class="txtbox2" ></td></tr><tr bgcolor="#388fc4" ><td><span style="color:#fff;">Order Amount</span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td></tr><tr ><td class="bold order_id'+counter+'"> CP Amount </td><td class="order_id'+counter+'"><input type="tex"   name="cp_amount[]" id="cp_amount_custom'+counter+'" data-id="'+counter+'"  class="cp_amount" ></td><td class="bold order_id'+counter+'">Seller Commision&nbsp;<input type="text"   name="sp_amount[]" id="sp_amount_custom'+counter+'" data-id="'+counter+'"  class="sp_amount" ></td><td class="order_id'+counter+'">&nbsp;Seller Amount&nbsp;<input type="text"  readonly=""  name="seller_amount[]" id="seller_amount'+counter+'" data-id="'+counter+'"  class="sp_amount" ><br><span id="different_amount'+counter+'">0.00</span></td><td width="323" class="bold">WNA SP Price</td><td ><input type="text" readonly="" style="background-color:#F7F7F7; text-align: center; font: bold; border: none;" name="Q_total_custom[]" id="total_custom'+counter+'" data-id="'+counter+'" class="txtbox2"></td></tr></tr></table>');
	newTextBoxDiv.appendTo("#TextBoxesGroup_custom");
		counter++;           });

		 $("#removeButton_custom").click(function () {
		 if(counter==1){
		 alert("No more textbox to remove");
		 return false;
		 }
		 counter--;
		 var packaging_charge=30*counter;$('#packaging_charge_custom').val(packaging_charge);  
                 $("#TextBoxDiv1_custom" + counter).remove();		
             });		
             $("#getButtonValue_custom").click(function () {			var msg = '';	for(i=1; i<counter; i++){   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();	}    	  alert(msg);     });  });




		  var clicks=2;
    function increase_values()  {



     $('.new_surface').hide();
     $('.s_custom').show();
     $('.surface').show();
     $('.s_list').hide();


     $('.new_mount_code').hide();
     $('.m_custom').show();
     $('.mount_code').show();
     $('.m_list').hide();


      $('.new_frame_code').hide();
     $('.f_custom').show();
     $('.frame_code').show();
     $('.f_list').hide();

     $('.new_cover').hide();
     $('.c_custom').show();
     $('.cover').show();
     $('.c_list').hide();



			if(document.getElementById('print').checked==true){
			$('.mount').hide();
			$('.frame').hide();
			$('.cover').hide();
			}else if(document.getElementById('print_mount').checked==true){
			$('.mount').show();
			$('.frame').hide();
			$('.cover').hide();
			}else if(document.getElementById('print_mount_glass').checked==true){
			$('.mount').show();
			$('.frame').hide();
			$('.cover').show();
			}else if(document.getElementById('print_frame_mount_glass').checked==true){
			$('.mount').show();
			$('.frame').show();
			$('.cover').show();
			}

        var packaging_charge=30*clicks;$('#packaging_charge').val(packaging_charge);
        if(clicks>2){    $('#courier_charge').val(0);}else{  $('#courier_charge').val(50);  }
        clicks++;  }
    function increase_values_offline()  {

     $('.new_surface').hide();
     $('.s_custom').show();
     $('.surface').show();
     $('.s_list').hide();


  var value=document.getElementById('channel_partner').value;
    
         if(value=='1'){
             $('.order_id').hide();

         }else if(value=='2'){

              $('.order_id').show();
         }else{
             $('.order_id').hide();

         }

     $('.new_mount_code').hide();
     $('.m_custom').show();
     $('.mount_code').show();
     $('.m_list').hide();


      $('.new_frame_code').hide();
     $('.f_custom').show();
     $('.frame_code').show();
     $('.f_list').hide();

     $('.new_cover').hide();
     $('.c_custom').show();
     $('.cover').show();
     $('.c_list').hide();



        if(document.getElementById('print_off').checked==true){
        $('.mount').hide();
        $('.frame').hide();
        $('.cover').hide();
        $('.canvas').hide();
          $('.printer').show();

        }else if(document.getElementById('print_mount_off').checked==true){
        $('.mount').show();
        $('.frame').hide();
        $('.cover').hide();
         $('.canvas').hide();
        
        }else if(document.getElementById('print_frame_off').checked==true){
              $('.frame').show();
            $('.mount').hide();
            $('.hide').show();
            $('.canvas').hide();
            $('.cover').hide();

         }
        else if(document.getElementById('print_frame_mount_glass_off').checked==true){
        $('.mount').show();
        $('.frame').show();
        $('.cover').show();
        $('.canvas').hide();
       
        }else if(document.getElementById('print_frame_mount_off').checked==true){
        $('.mount').show();
        $('.frame').show();
        $('.cover').hide();
         $('.canvas').hide();
         
        }else if(document.getElementById('print_frame_canvas_off').checked==true){
             $('.mount').hide();
            $('.frame').show();
             $('.framer_c').hide();
             $('.print_id').hide();
            $('.cover').hide();
             $('.canvas').show();
             
         }


        var packaging_charge=30*clicks;$('#packaging_charge_off').val(packaging_charge);
        if(clicks>2){    $('#courier_charge_off').val(0);}else{  $('#courier_charge_off').val(50);  }
        clicks++;


    }






    function calculate_discount()
    {
        var discount=$('#discount').val();
        var finalTotal_txt=$('#Total_txt_amount').val();
        var dis_val=parseFloat(finalTotal_txt*discount/100);
        var after_discount=parseFloat(finalTotal_txt-dis_val);
        $('#after_discount').val(after_discount);  }
    function GetQuotationImg(imgid)    {


        $.ajax({            type: "GET",
            url: "<?=base_url()?>application/controllers/get_quotationimg.php?image_name="+imgid,
            dataType: "html",
            success: function(response){
                $("#responsecontainer").html(response);
            }        });



          }</script>

<script>        function filter_customers(id)        {                  if(id)            {                $('#selected_customer_id').val(id);                var datastring='id='+id;                $.ajax({                    url:"<?=base_url()?>index.php/backend/get_customers",                    type: "POST",                    data:datastring,                    success: function(data)                    {                                               var value=data.split("^");                        $('#firstname').val(value[0]);                        $('#lastname').val(value[1]);                        $('#email').val(value[2]);                        $('#occupation').val(value[3]);                        $('#gender').val(value[4]);                        $('#martialstatus').val(value[5]);                        $('#address').val(value[6]);                        $('#companyname').val(value[7]);                        $('#country').val(value[8]);                        $('#state').val(value[9]);                        $('#pincode').val(value[10]);                        $('#contactnumber').val(value[11]);                        $('#city').val(value[12]);                         $('#region').val(value[13]);

if(value[9]=='delhi' || value[9]=='new delhi' || value[9]=='Delhi' || value[9]=='New delhi'){
      $('.cst').hide();
      $('.vat').show();
	  $('#txt_lbl').html('VAT');
    }else{
      $('.cst').show();
      $('.vat').hide();
	  $('#txt_lbl').html('CST');
    }
       }                });            }



  }        </script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/anylinkmenu.css" />
<script type="text/javascript" src="<?=base_url()?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/anylinkmenu.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>

<script>
<!--<setTimeout(function() {   //calls click event after a certain time
 $('#save_update').submit();
}, 5000);-->
</script>
</head>
    <body>
<div id="middle-wrapper">
      <div id="middle-container" style=" width:100%;">
    <div class="main-hdr-quotation text-center"> Update Inventory</div>
    <style>
.manage-order .creat-ordertable tr td{ padding:8px 1px 8px 1px !important;} .hdrs td:nth-child(2) { width:100px;}
</style>
    <div id="quotationListDiv" class="manage-order" >
          <form id="save_update" name="create_quotation" action="<?=base_url();?>index.php/backend/save_update_inventry_item" method="post"  enctype="multipart/form-data">
        <b  style=" font-size: 14px; color: green;">
            <?php if($msg<>'') {?>
            <script>              setTimeout(function(){outtime()},3000);
            function outtime(){                  window.location.href="view_quotations/";              }           </script>
            <?php echo $msg;}?></b><br>
        <br>
		
		
		
		
        <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
              <tr  class="darktr">
            <td width="40%" class="bold">Product ID:</td>
            <td width="60%"><?php   //  $uniqueNo =mt_rand();    $uniqueNo=sprintf('%03d',$uniqueNo);    ECHO $QuotationN0='WNS'.$uniqueNo;
			//$tblinv=$this->backend_model->update_inventory_modl($itmi);
			//print_r($tblinv);die;
			foreach($tblinv as $row){
			//print_r($row);die;
			//echo $yy=$row->item_name;
			}
			
			
			//print_r($tblinv);die;
			
			        ?>
                  <input type="text" value="<?php  echo $row->item_id;?>" id="product_id" readonly required name="productid">
                  <input type="hidden" name="quotation_id" id="quotation_id" value="<?=$QuotationN0;?>">
                </td>
          </tr>
            
            
          
          
          
            
		  
		 
								   
        </table>  
		
	
		  
<div class="viewcplist-inner">
                <div id='TextBoxesGroup_custom'>
                                        <div id="TextBoxDiv1_custom">	  
<table width="100%" align="center" cellpadding="0" cellspacing="0" class="creat-ordertable">
  
  
  
  
  
  
  <!--<tr>
    <td class="bold printer">Difference in royalty:</td>
    <td class="printer"><input type="tex" readonly="" name="diff_royality[]" id="diff_royality0" class="txtbox2" ></td>
    <td class="bold printer">Actual royalty </td>
    <td class="printer"><input type="tex"  readonly="" name="actual_royality[]" id="actual_royality0" class="txtbox2" ></td>
  </tr>-->
  <tr bgcolor="#388fc4">
    <td><span style="color:#FFF;"> Inventory Item Details </span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td>
  </tr>
  <tr class="darktr">
    <td width="277" class="bold">Item Name :</td>
    <td><input type="text" value="<?php  echo $row->item_name;?>" mrequired data-id="0" name="itemname" id="print_height_custom0"   class="printer" >
    </td>
    <td class="bold">Roll Size (width):</td>
    <td><input type="text" data-id="0" value="<?php echo $row->roll_size_width;?>" name="rollsize" id="print_width_custom0"   class="printer">
    </td>
	 <td class="bold">Roll Qty:</td>
    <td><input type="tex" data-id="0" value="<?php  echo $row->roll_qty;?>" name="rollqty"   id="print_rate_custom0"  class="printer" ></td>
    
  </tr>
  <br></br>
  <tr>
   <td class="bold">Height</td>
    <td class="printer">
      <input type="tex"  data-id="0" value="<?php  echo $row->height;?>" name="height" id="print_cost_custom0"   class="print_cost_custom printer" >
	  <input type="hidden"  data-id="0" value="<?php  echo $row->item_id;?>" name="itemidd" id="print_cost_custom0"   class="print_cost_custom printer" >
	  <input type="hidden"  data-id="0" value="<?php  echo $row->sr_no;?>" name="srnoo" id="print_cost_custom0"   class="print_cost_custom printer" >
	  </td>
    <td class="bold">GSM </td>
    <td class="printer"><input type="tex" data-id="0"  value="<?php  echo $row->gsm;?>" name="gsm" id="print_discount_custom0" class="printer" ></td>
	<td class="bold">Quantity used (height) </td>
    <td class="printer"><input type="tex" data-id="0"  value="<?php  echo $row->used_quantity_height;?>" name="used_height" id="" class="printer" ></td>
	
   <!-- <td class="bold">Qty. Threshold</td>
    <td ><input type="text" name="qtyused" id="actual_print_cost0" class="txtbox2"></td>-->
  </tr>
  <tr>
  <td class="bold">Qty. threshold </td>
    <td class="printer"><input type="tex" data-id="0"  value="<?php  echo $row->threshold_quantity;?>" name="qty_threshold" id="" class="printer" ></td>
  </tr>
  <tr>
   <!--<td class="bold">Quantity Used (Height)</td>
    <td class="printer">
      <input type="tex"  data-id="0" name="qtythreshold" id="print_cost_custom0"   class="print_cost_custom printer" ></td>
    <td class="bold">Update stock </td>
    <td class="printer"><input type="tex" data-id="0"  name="updatestock" id="print_discount_custom0" class="printer" ></td>
    <td class="bold">Current invetory (Height)</td>
    <td ><input type="text" name="currentheight" id="actual_print_cost0" class="txtbox2"></td>
  </tr>-->
  
  
  
  
  
  
  
  
 
  
</table>



 

			 </div> </div>
    
                                    <!--<table width="600" border="0" cellspacing="0" cellpadding="0" class="creat-ordertable">
               
                
                                      <!--<tr >
                                         <td class="bold">Tax -<span id="txt_lbl" class="bold"></span>  5%: </td>
                                                                <td><input type="text" readonly="" name="tax" value="<?='5'?>" class="txtbox2"></td>
                                      </tr>
                                                              

                                        <td class="bold">Tax Amount: (Rs.)</td>
                                        <td><input type="text" readonly="" id="tax_amount" name="tax_amount" value="<?='0.00'?>" class="txtbox2"></td>
                                      </tr>
-->
                                        
<!--
                                      <tr class="darktr">
                                      <td class="bold">Total CP Amount: (Rs.)</td>
                                        <td class="total-price"><div >
                                            <input type="hidden" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="Total_txt_amount_custom_cp" value="">
                                            <input type="text"  style="color:#000000" readonly="" name="finalTotal_txt_cp" id="total_cp_amount" value="">
                                          </div></td>
                                      </tr>

                                        <tr class="darktr">
                                        <td class="bold">WNA Final SP Amount: (Rs.)</td>
                                        <td class="total-price"><div >
                                            <input type="hidden" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="Total_txt_amount_custom" value="">
                                            <input type="text" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="finalTotal_txt_custom_wna" value="">
                                          </div></td>
                                      </tr>
              </table>-->
                                    <br />
                                    <br />
                                    
		
		<div style="padding:30px; text-align:left">
              <input type="submit" name="addcpn" id="addcpn" value="	Update Inventory Item" class="btn btn-success pull-right" >
            </div>
      </form>
        </div>
  </div>
      <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
    </div>
</body>
    </html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#offline_form').hide();

                $('#offline_radio').hide();
                 $('#online_radio').show();

    });
                function change_div_offline(status){

                    if(status=='1')
                    {

		  $('.txtbox_f_offline').show();
                      $('.td_class_offline').show();
                         $('.old_offline').show();
                            $('.image_visual_offline').show();
                              $('.new_offline').hide();
                                $('.image_preview_offline').hide();

                    $('.new_class_offline').hide();
                     $('.old_class_offline').show();
                     $('.td_class_offline').show();
                     }else if(status=='2')
                    {
                     $('.txtbox_f_offline').hide();
                   $('.td_class_offline').hide();
                         $('.old_offline').hide();
                            $('.image_visual_offline').hide();
                              $('.new_offline').show();
                    $('.new_class_offline').show();
                    $('.new_class_offline').show();
                      $('.old_class_offline').hide();
                        $('.image_preview_offline').show();

                     }


                }



		function change_div(status){

                    if(status=='1')
                    {
                    $('.txtbox_f').show();
                      $('.td_class').show();
                         $('.old').show();
                            $('.image_visual').show();
                              $('.new').hide();
                                $('.image_preview').hide();


                    $('.new_class').hide();
                     $('.old_class').show();
                     $('.td_class').show();
                     }else if(status=='2')

                    {
                     $('.txtbox_f').hide();
                   $('.td_class').hide();
                         $('.old').hide();
                            $('.image_visual').hide();
                              $('.new').show();
                    $('.new_class').show();
                      $('.old_class').hide();
                        $('.image_preview').show();

                     }


                }

                $(document).ready(function(){


                         $('.old').show();
                            $('.image_visual').show();
                              $('.new').hide();

                    $('.new_class').hide();
                     $('.old_class').show();
                     $('.td_class').hide();
     $('.txtbox_f').show();
     $('.image_preview').hide();


                });

                </script>
<script type="text/javascript">         function save_item_quotation()
                      {

                          var quotation_id=$('#quotation_id').val();
                          var imgid=$('#imgid').val();
                          var license_cost=$('#license_cost').val();
                          var surface=$('#surface').val();
                          var print_height=$('#print_height').val();
                          var print_width=$('#print_width').val();
                          var frame_code=$('#frame_height').val();
                          if(imgid=='')
                          {
                              alert("Enter Image Id");
                              $('#imgid').focus();
                              return false;
                          }
                          if(license_cost=='')
                          {
                              alert("Enter License Cost");
                              $('#license_cost').focus();

                              return false;
                          }                      if(surface=='')
                          {
                              alert("Select surface");
                              $('#surface').focus();
                              return false;
                          }                                                                                      }




                          function show_image_visual_offline(image_id)
                          {


                              $.ajax({
                              type:'post',
                              url:'show_images_viusal',
                              data:'image_id='+image_id,
                              success:function(response)
                              {
                                  var a = document.createElement("img");
                                  a.src = response;
                                  a.height = 80;
                                  a.width = 80;
                                  $('#image_visual_offline').html(a);
                              }
                          });
                      }
                      $(document).ready(function(){
                          $(document).on("blur", ".txtbox_f_offline", function () {
                              var myBookId = $(this).data('id');
                              var image_id=  document.getElementById('imgid_offline'+myBookId).value;
                              $.ajax({
                                  type:'post',
                                  url:'show_images_viusal',
                                  data:'image_id='+image_id,
                                  success:function(response)
                                  {
                                      var a = document.createElement("img");
                                      a.src = response;
                                      a.height = 80;
                                      a.width = 80;
                                      $('#image_visual_offline'+myBookId).html(a);
                                  }
                              });
                          });
                      });








                          function show_image_visual(image_id)
                          {
                              $.ajax({
                              type:'post',
                              url:'show_images_viusal',
                              data:'image_id='+image_id,
                              success:function(response)
                              {
                                  var a = document.createElement("img");
                                  a.src = response;
                                  a.height = 80;
                                  a.width = 80;
                                  $('#image_visual').html(a);
                              }
                          });
                      }
                      $(document).ready(function(){
                          $(document).on("blur", ".txtbox_f_online", function () {
                              var myBookId = $(this).data('id');
                              var image_id=  document.getElementById('imgid'+myBookId).value;
                              $.ajax({
                                  type:'post',
                                  url:'show_images_viusal',
                                  data:'image_id='+image_id,
                                  success:function(response)
                                  {
                                      var a = document.createElement("img");
                                      a.src = response;
                                      a.height = 80;
                                      a.width = 80;
                                      $('#image_visual'+myBookId).html(a);
                                  }
                              });
                          });
                      });




           $(document).ready(function (e) {

                $(function() {
                    $("#file").change(function() {
                    $("#message").empty();
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
                          $(document).on("blur", ".txtbox_f_online", function () {
                              var myBookId = $(this).data('id');

                                $(function() {
                    $("#file"+myBookId).change(function() {
                    $("#message"+myBookId).empty();
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







           $(document).ready(function (e) {

                $(function() {
                    $("#file_offline").change(function() {
                    $("#message_offline").empty();
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                        $('#previewing_offline').attr('src','noimage.png');

                        return false;
                    }else{
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
             });
              function imageIsLoaded(e) {
                  $("#file_offline").css("color","#FFFFFF");
                  $('#image_preview_offline').css("display", "block");
                  $('#previewing_offline').attr('src', e.target.result);
                  $('#previewing_offline').attr('width', '80px');
                  $('#previewing_offline').attr('height', '80px');
              };
          });



                         $(document).ready(function(){
                          $(document).on("blur", ".file_offline", function () {
                              var myBookId = $(this).data('id');

                                $(function() {
                    $("#file_offline"+myBookId).change(function() {
                    $("#message_offline"+myBookId).empty();
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                        $('#previewing_offline'+myBookId).attr('src','noimage.png');

                        return false;
                    }else{
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
             });
              function imageIsLoaded(e) {
                  $("#file_offline"+myBookId).css("color","#FFFFFF");
                  $('#image_preview_offline'+myBookId).css("display", "block");
                  $('#previewing_offline'+myBookId).attr('src', e.target.result);
                  $('#previewing_offline'+myBookId).attr('width', '80px');
                  $('#previewing_offline'+myBookId).attr('height', '80px');
              };
          });

                            });



        function change_form_status(value){

            if(value=='1'){
                $('#online_form').show();
                $('#offline_form').hide();
                $('#offline_radio').hide();
                 $('#online_radio').show();

            }else if(value=='2'){
                 $('#online_form').hide();
                $('#offline_form').show();
                 $('#offline_radio').show();
                 $('#online_radio').hide();
                 document.getElementById("print_id").colSpan='6';

            }
        }






$(document).ready(function(){
  $('.order_id').hide();
$('.mount').hide();
$('.frame').hide();
$('.cover').hide();
$('.canvas').hide();
$('.Channel_p').hide();
$('.cp').hide();


$('#new_serface').hide();
$('#list').hide();
$('#surface0').show();
$('#custom').show();

$('#new_mount_code').hide();
$('#m_list').hide();
$('#mount_code0').show();
$('#m_custom').show();



$('#new_framer_code0').hide();
$('#f_list').hide();
$('#framer_code0').show();
$('#f_custom').show();


$('#new_cover0').hide();
$('#c_list').hide();
$('#cover0').show();
$('#c_custom').show();


});
function new_suerface(value){

if(value==1){
$('#new_serface').show();
$('#list').show();
$('#surface0').hide();
$('#custom').hide();
}else if(value==2){
$('#new_serface').hide();
$('#list').hide();
$('#surface0').show();
$('#custom').show();
}
}


function new_mount(value){

if(value==1){
$('#new_mount_code').show();
$('#m_list').show();
$('#mount_code0').hide();
$('#m_custom').hide();
}else if(value==2){
$('#new_mount_code').hide();
$('#m_list').hide();
$('#mount_code0').show();
$('#m_custom').show();
}
}

function new_frame(value){

if(value==1){
$('#new_framer_code0').show();
$('#f_list').show();
$('#framer_code0').hide();
$('#f_custom').hide();
}else if(value==2){
$('#new_framer_code0').hide();
$('#f_list').hide();
$('#framer_code0').show();
$('#f_custom').show();
}
}

function new_cover(value){

if(value==1){

$('#new_cover0').show();
$('#c_list').show();
$('#cover0').hide();
$('#c_custom').hide();
}else if(value==2){
$('#new_cover0').hide();
$('#c_list').hide();
$('#cover0').show();
$('#c_custom').show();
}
}


$(document).on('click','.s_custom',function(){
 var model_id=$(this).data('id');
 var name=$(this).data('name');

	$('#new_surface'+model_id).show();
	$('#s_list'+model_id).show();
	$('#surface'+model_id).hide();
	$('#s_custom'+model_id).hide();


});


$(document).on('click','.s_list',function(){
 var model_id=$(this).data('id');
 var name=$(this).data('name');

	$('#new_surface'+model_id).hide();
	$('#s_list'+model_id).hide();
	$('#surface'+model_id).show();
	$('#s_custom'+model_id).show();

});




$(document).on('click','.m_custom',function(){
 var model_id=$(this).data('id');
 var name=$(this).data('name');

	$('#new_mount_code'+model_id).show();
	$('#m_list'+model_id).show();
	$('#mount_code'+model_id).hide();
	$('#m_custom'+model_id).hide();


});


$(document).on('click','.m_list',function(){
 var model_id=$(this).data('id');
 var name=$(this).data('name');

	$('#new_mount_code'+model_id).hide();
	$('#m_list'+model_id).hide();
	$('#mount_code'+model_id).show();
	$('#m_custom'+model_id).show();

});


$(document).on('click','.f_custom',function(){
 var model_id=$(this).data('id');
 var name=$(this).data('name');

	$('#new_frame_code'+model_id).show();
	$('#f_list'+model_id).show();
	$('#frame_code'+model_id).hide();
	$('#f_custom'+model_id).hide();


});


$(document).on('click','.f_list',function(){
 var model_id=$(this).data('id');
 var name=$(this).data('name');

	$('#new_frame_code'+model_id).hide();
	$('#f_list'+model_id).hide();

	$('#frame_code'+model_id).show();
	$('#f_custom'+model_id).show();

});




$(document).on('click','.c_custom',function(){
 var model_id=$(this).data('id');
 var name=$(this).data('name');

	$('#new_cover'+model_id).show();
	$('#c_list'+model_id).show();
	$('#cover'+model_id).hide();
	$('#c_custom'+model_id).hide();


});


$(document).on('click','.c_list',function(){
 var model_id=$(this).data('id');
 var name=$(this).data('name');

	$('#new_cover'+model_id).hide();
	$('#c_list'+model_id).hide();
	$('#cover'+model_id).show();
	$('#c_custom'+model_id).show();

});





    $(document).on('change','.print_type',function(){
    var id=$(this).data('id');
    var category_custom=$('#category_custom'+id).val();
 
     if(category_custom=='1'){
        $('.mount'+id).hide();
            $('.frame'+id).hide();
            $('.cover'+id).hide();
             $('.canvas'+id).hide();
              $('.printer'+id).show();
            

     }else if(category_custom=='2'){
        $('.mount'+id).show();
            $('.frame'+id).hide();
            $('.cover'+id).hide();
             $('.canvas'+id).hide();
             

              
     }else if(category_custom=='3'){
        $('.frame'+id).show();
            $('.mount'+id).hide();
            $('.hide'+id).show();
            $('.canvas'+id).hide();
            $('.cover'+id).hide();
 
  
     }else if(category_custom=='4'){
             $('.mount'+id).show();
            $('.frame'+id).show();
            $('.cover'+id).show();
            $('.canvas'+id).hide();
           
             

     }else if(category_custom=='5'){
             $('.mount'+id).show();
            $('.frame'+id).show();
            $('.cover'+id).hide();
             $('.canvas'+id).hide();
            
              
     }else if(category_custom=='6'){

             $('.mount'+id).hide();
            $('.frame'+id).show();
            $('.cover'+id).hide();
            
             $('.canvas'+id).show();
              $('#framer_l'+id).hide();
              $('.framer_c'+id).hide();

              

     }
    });


   function show_channel_partner(){
        var value=document.getElementById('channel_partner').value;

         if(value=='1'){
             $('.order_id').show();
             $('.Channel_p').show();
               $('#final_amount').hide();
             $('#channel_partner').val(2);
              $('.cp').show();
         }else if(value=='2'){
             $('#channel_partner').val(1);
              $('.order_id').hide();
                $('#final_amount').show();
                  $('.cp').hide();
              $('.Channel_p').hide();
         }

    }


function reverse_calculate(){

var cp_amount = document.getElementsByName('cp_amount[]');
/*var discount = document.getElementsByName('discount[]');*/

 for(var i=0;i<=cp_amount.length;i++)
            {
var finalTotal_txt_off_cp=$('#total_off'+[i]).val();

 var cp_amount_off= cp_amount[i].value;
 						
var basic_final_amt=parseInt(finalTotal_txt_off_cp)*100/105;
var basic_cp_amt=parseInt(cp_amount_off)*100/105;
var cp_discount_amt=parseInt(finalTotal_txt_off_cp-cp_amount_off);
var discount_percetage=parseInt(cp_discount_amt*100/finalTotal_txt_off_cp);
var discount_percetage_fix=discount_percetage.toFixed(2);
var cp_discount_amt_fix=cp_discount_amt.toFixed(2);
$('#discount_off'+[i]).html(discount_percetage+' %');
$('#discount_off_amt'+[i]).html(cp_discount_amt_fix);
                            }
}





   

$(document).on('click','.channel_partner',function(){
 var id=$(this).data('id');
 var category_custom=$('#category_custom'+id).val();
   if(category_custom=='')
      {
	  alert('Please select Print Type');
	  $('#category_custom'+id).focus();
	   return false;
	  }else{
	  return true;}
 
});
$(document).on('click','.print_type',function(){
    var id=$(this).data('id');
     $('.cp_amount').keyup(function(){
    

var cp_amount = $('#cp_amount'+id).val();
 
var finalTotal_txt_off_cp=$('#total_custom'+id).val();
 						
var basic_final_amt=parseInt(finalTotal_txt_off_cp)*100/105;
var basic_cp_amt=parseInt(cp_amount)*100/105;
var cp_discount_amt=parseInt(finalTotal_txt_off_cp-cp_amount);
var discount_percetage=parseInt(cp_discount_amt*100/finalTotal_txt_off_cp);
var discount_percetage_fix=discount_percetage.toFixed(2);
var cp_discount_amt_fix=cp_discount_amt.toFixed(2);
 if(!isNaN(discount_percetage)){
$('#discount_custom'+id).html(discount_percetage+' %');
 }
 
$('#discount_custom_amt'+id).html(cp_discount_amt_fix);
        
     }); 
    
   $('.print_cost_custom').keyup(function(){
  
   
    var license_cost_custom=$('#license_cost_custom'+id).val();
   var packaging_charge_custom=$('#packaging_charge_custom'+id).val();
    var courier_charge_custom=$('#courier_charge_custom'+id).val();
     var actual_print_cost=$('#actual_print_cost'+id).val();
    var print_height_custom=$('#print_height_custom'+id).val();
    var print_width_custom=$('#print_width_custom'+id).val();
    var print_cost_custom=$('#print_cost_custom'+id).val();
     var different_amount=$('#different_amount'+id).html();
   var licence_cost=actual_print_cost*license_cost_custom/100;
    var print_area=parseFloat(print_height_custom)*parseFloat(print_width_custom);
	var actual_rate=parseFloat(print_cost_custom)/print_area;
    var discount_val=parseFloat(actual_print_cost)-parseFloat(print_cost_custom);
    var total=parseFloat(packaging_charge_custom)+parseFloat(courier_charge_custom)+parseFloat(actual_print_cost);
	
    $('#license_cost_custom_display'+id).html(licence_cost);
	 if(!isNaN(actual_rate)){
	 $('#actual_rate'+id).val(actual_rate.toFixed(2));
	  }
     $('#actual_print_cost'+id).html(actual_print_cost);
     
	  if(!isNaN(discount_val)){
      $('#print_discount_custom'+id).val(discount_val.toFixed(2)); 
       }
     if(!isNaN(total)){
      $('#total_custom'+id).val(different_amount);
      
   }
    
   }); 
    
    
 $('.mount_cost_custom').keyup(function(){
   
    
    var packaging_charge_custom=$('#packaging_charge_custom'+id).val();
    var courier_charge_custom=$('#courier_charge_custom'+id).val();
    var print_height_custom=$('#print_height_custom'+id).val();
    var print_width_custom=$('#print_width_custom'+id).val();
    var mount_width_custom=$('#mount_width_custom'+id).val();
    var mount_cost_custom=$('#mount_cost_custom'+id).val();
    var print_cost_custom=$('#print_cost_custom'+id).val();
	var actual_print_cost=$('#actual_print_cost'+id).val();
        var different_amount=$('#different_amount'+id).val();
    var OrgMountHeight = parseFloat(print_height_custom)+parseFloat(mount_width_custom*2) ;
    var OrgMountWidth=    parseFloat(print_width_custom)+parseFloat(mount_width_custom*2);
    var OrgMountArea= OrgMountHeight * OrgMountWidth;
    var actaul_mount_cost =   OrgMountArea *0.75// rate;
    var actual_rate=parseFloat(mount_cost_custom)/OrgMountArea;
    var  discount_mount= parseFloat(actaul_mount_cost)-parseFloat(mount_cost_custom);
        var total=parseFloat(packaging_charge_custom)+parseFloat(courier_charge_custom)+parseFloat(actual_print_cost)+parseFloat(actaul_mount_cost);
   if(!isNaN(discount_mount)){
       $('#mount_discount_custom'+id).val(discount_mount);
   }
        if(!isNaN(actaul_mount_cost)){
        $('#mount_actual_cost_custom'+id).val(actaul_mount_cost);  
    }
   if(!isNaN(actual_rate)){
     
       $('#mount_rate_custom'+id).val(actual_rate.toFixed(2));
   }
    
   }); 
       
    
    
  $('.frame_cost_custom').keyup(function(){
   
    
    var category_custom=  $('#category_custom'+id).val();
   var print_height_custom=$('#print_height_custom'+id).val();
    var frame_width_custom=$('#frame_width_custom'+id).val();
    var frame_cost_custom=$('#frame_cost_custom'+id).val();
    var print_height_custom=$('#print_height_custom'+id).val();
    var print_width_custom=$('#print_width_custom'+id).val();
    var mount_width_custom=$('#mount_width_custom'+id).val();
    var mount_cost_custom=$('#mount_cost_custom'+id).val();
	 var mount_actual_cost_custom=$('#mount_actual_cost_custom'+id).val();
    var packaging_charge_custom=$('#packaging_charge_custom'+id).val();
    var courier_charge_custom=$('#courier_charge_custom'+id).val();
    var print_cost_custom=$('#print_cost_custom'+id).val();
    var frame_actual_cost_custom=$('#frame_actual_cost_custom'+id).val();
    var actual_print_cost=$('#actual_print_cost'+id).val();
     var different_amount=$('#different_amount'+id).val();
        var OrgFrameHeight = parseFloat(print_height_custom)+parseFloat(mount_width_custom*2) ;
    var OrgFrameWidth=    parseFloat(print_width_custom)+parseFloat(mount_width_custom*2);
   var OrgFrametRuningcost = ((parseFloat(OrgFrameHeight)+parseFloat(frame_width_custom)*2)*2) +((parseFloat(OrgFrameWidth)+ parseFloat(frame_width_custom*2))*2);
   var OrgFramCost=parseInt((OrgFrametRuningcost)/(12)*65);//rate 65
      var frame_discount= OrgFramCost-frame_cost_custom;
      
     var actual_rate=parseFloat(frame_cost_custom)/parseFloat(OrgFrameHeight)+parseFloat(OrgFrameWidth);;  
     if(category_custom=='5'){
   var total=parseFloat(packaging_charge_custom)+parseFloat(courier_charge_custom)+parseFloat(actual_print_cost)+parseFloat(frame_actual_cost_custom)+parseFloat(mount_actual_cost_custom);
     }else if(category_custom=='3'){
   var total=parseFloat(packaging_charge_custom)+parseFloat(courier_charge_custom)+parseFloat(actual_print_cost)+parseFloat(frame_actual_cost_custom);
     }
        if(!isNaN(OrgFramCost)){
            $('#frame_actual_cost_custom'+id).val(OrgFramCost);
          }
          if(!isNaN(frame_discount)){
            $('#frame_discount_custom'+id).val(frame_discount);
          }
          
        if(!isNaN(actual_rate)){
       $('#frame_rate_custom'+id).val(actual_rate.toFixed(2));
   }
    
   });   
   
   
   $('.cover_cost_custom').keyup(function(){
   
  var category_custom=  $('#category_custom'+id).val();
      var mount_width_custom=$('#mount_width_custom'+id).val();
   var print_height_custom=$('#print_height_custom'+id).val();
   var print_width_custom=$('#print_width_custom'+id).val();
    var cover_custom=$('#cover_custom'+id).val();
    var cover_cost_custom=$('#cover_cost_custom'+id).val();
   var frame_cost_custom=$('#frame_cost_custom'+id).val();
    var packaging_charge_custom=$('#packaging_charge_custom'+id).val();
    var courier_charge_custom=$('#courier_charge_custom'+id).val();
    var print_cost_custom=$('#print_cost_custom'+id).val();
   var mount_cost_custom=$('#mount_cost_custom'+id).val();
    var mount_actual_cost_custom=$('#mount_actual_cost_custom'+id).val();
     var frame_actual_cost_custom=$('#frame_actual_cost_custom'+id).val();
    var actual_print_cost=$('#actual_print_cost'+id).val();
     var different_amount=$('#different_amount'+id).val();
    var OrgMountHeight = parseFloat(print_height_custom)+parseFloat(mount_width_custom*2) ;
    var OrgMountWidth=    parseFloat(print_width_custom)+parseFloat(mount_width_custom*2);
    var OrgMountArea= OrgMountHeight * OrgMountWidth;
    
    var actual_glass_cost=parseFloat(OrgMountArea)*0.38;
        var total=parseFloat(packaging_charge_custom)+parseFloat(courier_charge_custom)+parseFloat(actual_print_cost)+parseFloat(frame_actual_cost_custom)+parseFloat(mount_actual_cost_custom)+parseFloat(actual_glass_cost);
      var glass_rate=parseFloat(cover_cost_custom)/actual_glass_cost;
     
        var glass_discount=actual_glass_cost-parseFloat(cover_cost_custom);
        if(!isNaN(actual_glass_cost)){
          $('#cover_actaul_cost_custom'+id).val(actual_glass_cost.toFixed(2));
      }
      if(!isNaN(glass_discount)){
       $('#cover_discount_custom'+id).val(glass_discount.toFixed(2));   
          
      }
   if(!isNaN(glass_rate)){
       $('#glass_rate_custom'+id).val(glass_rate.toFixed(2));
   }
    
   });   
   
    
    $('.canvas_cost_custom').keyup(function(){
   
   var print_height_custom=$('#print_height_custom'+id).val();
    var print_width_custom=$('#print_width_custom'+id).val();
    var canvas_cost_custom=$('#canvas_cost_custom'+id).val();
    var frame_cost_custom=$('#frame_cost_custom'+id).val();
    var packaging_charge_custom=$('#packaging_charge_custom'+id).val();
    var courier_charge_custom=$('#courier_charge_custom'+id).val();
    var print_cost_custom=$('#print_cost_custom'+id).val();
	var frame_actual_cost_custom=$('#frame_actual_cost_custom'+id).val();
    var actual_print_cost=$('#actual_print_cost'+id).val();
	  var canvas_actual_cost_custom=$('#canvas_actual_cost_custom'+id).val();
          var different_amount=$('#different_amount'+id).val();
    
	
    var canvas_val=(parseFloat(print_height_custom)*2)+(parseFloat(print_width_custom)*2);
    var canvas_cost=parseFloat(canvas_val*85/12);
    var canvas_rate=  parseFloat(canvas_cost_custom)/canvas_cost;
   var canvas_discount=canvas_cost-parseFloat(canvas_cost_custom);
        var total=parseFloat(packaging_charge_custom)+parseFloat(courier_charge_custom)+parseFloat(actual_print_cost)+parseFloat(frame_actual_cost_custom)+parseFloat(canvas_actual_cost_custom);
      if(!isNaN(canvas_cost)){
          $('#canvas_actual_cost_custom'+id).val(canvas_cost.toFixed(2));
      }
      if(!isNaN(canvas_discount)){
          $('#canvas_discount_custom'+id).val(canvas_discount.toFixed(2));
      }
        if(!isNaN(canvas_rate)){
       $('#canvas_rate_custom'+id).val(canvas_rate.toFixed(2));
   }
    
   }); 
   
   
   
   
 $('#cp_amount_custom'+id).keyup(function(){
    
   
  
 var final_total=0;
var final_cp_total=0;
var final_sp_total=0;
var seller_amount=0;
 for(var i=0;i<=id;i++)
            {
	var total_custom=$('#total_custom'+i).val();
	var cp_amount_custom=$('#cp_amount_custom'+i).val();
	var seller_amount=$('#seller_amount'+i).val();
	var sp_amount_custom=$('#sp_amount_custom'+i).val();
	var Q_total_custom_val= parseFloat(total_custom);
	var cp_amount_custom_val= parseFloat(cp_amount_custom);
		
	var selling_percentage=parseFloat(final_cp_total)*50/parseFloat(final_sp_total);
  var seller_amount=parseFloat(cp_amount_custom_val)*parseFloat(sp_amount_custom)/100;
  final_total += Q_total_custom_val;
  final_cp_total += cp_amount_custom_val;
  final_sp_total += seller_amount;
 var tax_amount=final_total*5/100; 
 var total_wna_amount=final_total+tax_amount;
	
	var sp_amount_custom_val= parseFloat(sp_amount_custom);
	
	var different_amount=parseFloat(cp_amount_custom_val)-parseFloat(seller_amount);

	
 

 if(!isNaN(tax_amount)){
    $('#tax_amount').val(tax_amount.toFixed(2)); 
 }

 if(!isNaN(seller_amount)){
    $('#seller_amount'+id).val(seller_amount.toFixed(2)); 
 }

 if(!isNaN(different_amount)){
$('#different_amount'+id).html(different_amount.toFixed(2));
 }
 if(!isNaN(selling_percentage)){
$('#selling_percentage'+id).html(selling_percentage.toFixed(2));
 }
 if(!isNaN(final_cp_total)){
$('#total_cp_amount').val(indian_money_format(final_cp_total));
 }

        }
        
          

    });
 
 
 $('#sp_amount_custom'+id).keyup(function(){
    
   
  
    
var final_total=0;
var final_cp_total=0;
var final_sp_total=0;
var seller_amount=0;
var total_wna_sp_price=0;
 for(var i=0;i<=id;i++)
            {
	var cp_amount_custom=$('#cp_amount_custom'+i).val();
				 var seller_amount=$('#seller_amount'+i).val();
                var total_custom=$('#total_custom'+i).val();
                 var cp_amount_custom=$('#cp_amount_custom'+i).val();
				   var sp_amount_custom=$('#sp_amount_custom'+i).val();
                var Q_total_custom_val= parseFloat(total_custom);
                 var cp_amount_custom_val= parseFloat(cp_amount_custom);
				   var sp_amount_custom_val= parseFloat(sp_amount_custom);
             
                var seller_amount=parseFloat(cp_amount_custom_val)*parseFloat(sp_amount_custom)/100;

 final_total += Q_total_custom_val;
  final_cp_total += cp_amount_custom_val;
  final_sp_total += seller_amount;
 var tax_amount=final_total*5/100; 
 var total_wna_amount=final_total+tax_amount;
 
 var selling_percentage=parseFloat(final_cp_total)*50/parseFloat(final_sp_total);
 var different_amount=parseFloat(cp_amount_custom_val)-parseFloat(seller_amount);
  total_wna_sp_price +=different_amount;
 if(!isNaN(tax_amount)){
    $('#tax_amount').val(tax_amount.toFixed(2)); 
 }
if(!isNaN(seller_amount)){
    $('#seller_amount'+id).val(seller_amount.toFixed(2)); 
 }

if(!isNaN(different_amount)){
    
    $('#total_custom'+id).val(parseFloat(different_amount.toFixed(2)));
}

 if(!isNaN(different_amount)){
$('#different_amount'+id).html(different_amount.toFixed(2));
 }
 if(!isNaN(total_wna_sp_price)){
$('#finalTotal_txt_custom_wna').val(indian_money_format(total_wna_sp_price));
 }
 if(!isNaN(final_cp_total)){
$('#total_cp_amount').val(indian_money_format(final_cp_total));
 }

        }
        
          

    });
 
 
 
    
    $('.printer').keyup(function(){
  
     var print_height_custom=$('#print_height_custom'+id).val();
    var print_width_custom=$('#print_width_custom'+id).val();
     var print_rate_custom=$('#print_rate_custom'+id).val();
    var print_cost_custom=$('#print_cost_custom'+id).val();
    var license_cost_custom=$('#license_cost_custom'+id).val();
        
     var print_cost_custom=parseFloat(print_cost_custom);
    var final_royality=print_cost_custom*license_cost_custom/100;
    var final_wna_license_share=print_cost_custom-final_royality;
     
        
    var actual_print_cost=parseFloat(print_height_custom)*parseFloat(print_width_custom)*parseFloat(print_rate_custom);
    var actual_royality=parseFloat(print_cost_custom)*license_cost_custom/100;
    var wna_actual_license_share=parseFloat(actual_print_cost)-parseFloat(actual_royality);
    
        var diff_royality= parseFloat(actual_royality)- parseFloat(final_royality);
     if(diff_royality!='0.00'){
         var partner_royality=final_royality+diff_royality;
         var wna_licence_share=final_wna_license_share-diff_royality;
     }else if(diff_royality=='0.00'){
         partner_royality=final_royality;
          wna_licence_share=final_wna_license_share;
     }
     
     if(!isNaN(partner_royality)){
    $('#final_royality'+id).val(actual_royality.toFixed(2));
    } if(!isNaN(diff_royality)){
     $('#diff_royality'+id).val(diff_royality.toFixed(2));
      } if(!isNaN(actual_royality)){
     $('#actual_royality'+id).val(actual_royality.toFixed(2));
      } if(!isNaN(wna_actual_license_share)){
    $('#wna_actual_license_share'+id).val(wna_actual_license_share.toFixed(2));
     } if(!isNaN(wna_licence_share)){
     $('#final_wna_license_share'+id).val(actual_royality.toFixed(2));
 }
 
        if(!isNaN(actual_print_cost)){
        $('#actual_print_cost'+id).val(actual_print_cost.toFixed(2));
            }
    });
    
    
 $(document).on('click','.channel_partner',function(){
   
    if($('#channel_partner_custom'+id).is(':checked'))
    { 
      $('.cp_amount'+id).show();  
       $('.order_id'+id).show();  
    }else{
      $('.cp_amount'+id).hide();  
       $('.order_id'+id).hide(); 
    }
 });   
 
 
 
 
 
 
 
 
 
  $(document).on("blur", ".file_upload", function () {
                              var myBookId = $(this).data('id');

                                $(function() {
                    $("#file_custom"+myBookId).change(function() {
                    $("#message_custom"+myBookId).empty();
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                        $('#previewing_custom'+myBookId).attr('src','noimage.png');

                        return false;
                    }else{
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });

             });
              function imageIsLoaded(e) {
                  $("#file_custom"+myBookId).css("color","#FFFFFF");
                  $('#image_preview_custom'+myBookId).css("display", "block");
                  $('#previewing_custom'+myBookId).attr('src', e.target.result);
                  $('#previewing_custom'+myBookId).attr('width', '80px');
                  $('#previewing_custom'+myBookId).attr('height', '80px');
              };
          });
 
 
 

 
 
 
 
 
   $('.cp_amount0').hide();  
       $('.order_id0').hide();  
       
       
       
});




$(document).ready(function(){
    
     $('.mount0').hide();
     $('.frame0').hide();
     $('.cover0').hide();

      $('.canvas0').hide();
       $('#framer_l0').hide();
       $('.framer_c0').hide();
});


function indian_money_format(after_tax_val)
    {
        if (!isNaN(after_tax_val)){
                            // document.getElementById("Total_txt_amount").value = after_tax_val;
                                var x=after_tax_val;
                                x=x.toString();
                                var lastThree = x.substring(x.length-3);
                                var otherNumbers = x.substring(0,x.length-3);
                                if(otherNumbers != '')
                                lastThree = ',' + lastThree;
                                var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;

                               //alert(res);

                               return res;
                                  }
    }

   
    </script>
    <style>
.txtbox{ width: 61px; height: 30px;}
.txtbox2{ width: 81px; height: 30px;}
.print_cost_custom{width: 81px; height: 30px;}
.mount_cost_custom{width: 81px; height: 30px;}
.frame_cost_custom{width: 81px; height: 30px;}
.canvas_cost_custom{width: 81px; height: 30px;}
.cover_cost_custom{width: 81px; height: 30px;}
.cp_amount{width: 81px; height: 30px;}
.printer{width: 81px; height: 30px;}
.sp_amount{width: 81px; height: 30px;}
</style>