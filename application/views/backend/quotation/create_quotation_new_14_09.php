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
<script type="text/javascript">


$(document).ready(function(){

    $('#packaging_charge').val(30);
    var counter = 1;
    $("#addButton").click(function () {




        if(document.getElementById('old_image').checked==true)
        {
          var status='1';
        }else if(document.getElementById('new_image').checked==true){
            status='2';
        }
         change_div(status);

        if(counter>10){    alert("Only 10 textboxes allow");            return false;	}   			var newTextBoxDiv = $(document.createElement('div'))	     .attr("id", 'TextBoxDiv' + counter);
      newTextBoxDiv.after().html('<tr><td style="width:119px;"><div class="old_class"><input type="text" class="txtbox_f_online" name="imgid[]" data-id="'+counter+'"  id="imgid'+counter+'" /></div><div class="new_class" id="new_image" class="new"><input type="file"  name="file[]"  data-id="'+counter+'" class="file"  id="file'+counter+'" style="width:100px;" /></div></td><td ><div class="image_preview" id="image_preview'+counter+'"><img id="previewing'+counter+'" src="" width="50" height="50"/></div><span id="image_visual'+counter+'" class="image_visual" style="height:80px; width: 80px; border: solid 1px; color:#CCCCCC "></span></td><td><span id="license_cost'+counter+'">0.00</span><br><input type="text" class="txtbox" name="license_cost[]" id="license_cost'+counter+'"  onkeyup="return calculator_show();" /></td><td><a  data-id="'+counter+'" data-name="s_custom" class="s_custom" id="s_custom'+counter+'">Custom</a><a  class="s_list"  data-id="'+counter+'" data-name="s_list" id="s_list'+counter+'">List</a><br><input class="new_surface" type="text" name="surface[]" id="new_surface'+counter+'" style="width:162px; height:18px;"><select class="surface" name="surface[]" id="surface'+counter+'"> <?php $surface=$this->backend_model->get_surface(); foreach($surface as $surf) {  ?><option value="<?php echo $surf['surface']; ?>"><?php echo $surf['surface'] ?></option><?php } ?> </select></td> <td><input type="text" name="print_height[]" id="print_height'+counter+'" onkeyup="return calculator_show();" onBlur="return calculator_show();" class="txtbox"></td> <td><input type="text" name="print_width[]" id="print_width'+counter+'" class="txtbox" onBlur="return calculator_show();" onkeyup="return calculator_show();"></td> <td><input type="tex" readonly="" name="print_cost" id="print_cost'+counter+'" class="txtbox" ></td><td class="mount">  <a  data-id="'+counter+'" data-name="m_custom" class="m_custom" id="m_custom'+counter+'">Custom</a><a  class="m_list"  data-id="'+counter+'" data-name="m_list" id="m_list'+counter+'">List</a><br><input class="new_mount_code" type="text" name="mount_code[]" id="new_mount_code'+counter+'" style="width:98px; height:18px;"><select name="mount_code[]" id="mount_code'+counter+'"><?php foreach ($surface_mount as $mount) {  ?><option value="<?php echo $mount['surface']; ?>"><?php echo $mount['surface'] ?></option><?php } ?> </select> </td><td></td><td class="mount"><input type="text" name="mount_width[]" onkeyup="return calculator_show();" onBlur="return calculator_show();" class="txtbox" id="mount_width'+counter+'"></td><td class="mount"><input type="tex" readonly="" name="mount_cost" id="mount_cost'+counter+'" class="txtbox" ></td><td class="frame"><a  data-id="'+counter+'" data-name="f_custom" class="f_custom" id="f_custom'+counter+'">Custom</a><a  class="f_list"  data-id="'+counter+'" data-name="f_list" id="f_list'+counter+'">List</a><br><input class="new_frame_code" type="text" name="framer_code[]" id="new_frame_code'+counter+'" style="width:124px; height:18px;"><select name="frame_code[]" id="frame_code'+counter+'"><?php foreach ($surface_framer as $framer) {?><option value="<?php echo $framer['surface']; ?>"><?php echo $framer['surface'] ?></option><?php } ?> </select></td><td class="frame"></td><td class="frame"><select name="frame_width[]" id="frame_width'+counter+'" onkeyup="return calculator_show();" onchange="return calculator_show();"><?php foreach ($framer_width as $width) {?><option value="<?php echo $width['width']; ?>"><?php echo $width['width'] ?></option><?php } ?> </select></td><td class="frame"><input type="tex" readonly="" name="frame_cost" id="frame_cost'+counter+'" class="txtbox" ></td><td class="cover"><a  data-id="'+counter+'" data-name="c_custom" class="c_custom" id="c_custom'+counter+'">Custom</a><a  class="c_list"  data-id="'+counter+'" data-name="c_list" id="c_list'+counter+'">List</a><br><input class="new_cover" type="text" name="cover[]" id="new_cover'+counter+'" style="width:69px; height:18px;"><select name="cover[]" id="cover'+counter+'"><?php foreach ($surface_glass as $GLASS) {  ?><option value="<?php echo $GLASS['surface']; ?>"><?php echo $GLASS['surface'] ?></option><?php } ?> </select></td> <td  class="cover"><input type="tex" readonly="" name="glass_cost" id="glass_cost'+counter+'" class="txtbox" ></td><td><input type="text" readonly="" style="background-color:#F7F7F7; text-align: center; font: bold; border: none;" name="Q_total[]" id="total'+counter+'"></td></tr>');

		newTextBoxDiv.appendTo("#TextBoxesGroup");
		counter++;           
            });

		 $("#removeButton").click(function () {
		 if(counter==1){
		 alert("No more textbox to remove");
		 return false;
		 }
		 counter--;

		 var packaging_charge=30*counter;
		 $('#packaging_charge').val(packaging_charge);
		 $("#TextBoxDiv" + counter).remove();});
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
      newTextBoxDiv.after().html('<tr><td><select name="category_off[]" style="width: 86px;height: 28px;"  onchange="validate_print_type_more(this.value,'+counter+')" data-id="'+counter+'"  ><option value="">-Print Type-</option><option value="1">Print</option><option value="2">Print+Mount</option><option value="3">Print + frame</option><option value="4">Print+frame+Mount+Glass</option><option value="5">Print+frame+Mount</option><option value="6">Print+frame+Canvas</option></select></td><td style="width:119px;"><div class="old_class_offline"><input type="text"  name="imgid_off[]" data-id="'+counter+'"  class="txtbox_f_offline" id="imgid_offline'+counter+'" /></div><div class="new_class_offline" id="new_image_offline" class="new_offline"><input type="file"  name="file_off[]"  data-id="'+counter+'" class="file_offline"  class="txtbox2" id="file_offline'+counter+'" style="width:100px;" /></div></td><td class="order_id"><input type="text" placeholder="Order Id" name="order_id_off[]" id="order_id_off'+counter+'" class="txtbox2" ></td><td ><input type="text" placeholder="package Charge" name="packaging_charge_off[]" id="packaging_charge_off'+counter+'" class="txtbox2" ></td><td ><input type="text" name="courier_charge_off[]" id="courier_charge_off'+counter+'" placeholder="Courier Charge" class="txtbox2" ></td><td ><div class="image_preview_offline" id="image_preview_offline'+counter+'" ><img id="previewing_offline'+counter+'" src="" width="50" height="50"/></div><span id="image_visual_offline'+counter+'" class="image_visual_offline" style="height:80px; width: 80px; border: solid 1px; color:#CCCCCC "></span></td><td><input type="text" class="txtbox2" name="license_cost_off[]" id="license_cost_off'+counter+'" placeholder="Licence Cost"  class="txtbox2" onkeyup="return calculator_offline();" /></td><td><input type="text" placeholder="Surface" name="surface_off[]" id="surface_off" class="txtbox2"></td><td><input type="text" name="print_height_off[]" id="print_height_off'+counter+'" placeholder="P.Height" onKeyUp="return calculator_offline();" onBlur="return calculator_offline();" class="txtbox2"></td><td ><input type="text" placeholder="P.Width" name="print_width_off[]" id="print_width_off'+counter+'" class="txtbox2" onBlur="return calculator_offline();" onKeyUp="return calculator_offline();"></td><td><input type="tex" placeholder="P.Rate"  name="print_rate_off[]" onkeyup="return calculator_offline();" onBlur="return calculator_offline();"  id="print_rate_off'+counter+'" class="txtbox2" ></td><td class="printer"><input type="tex" readonly=""  name="print_cost_off" id="print_cost_off'+counter+'" class="txtbox2" ></td><td><input type="tex" placeholder="Border"  name="border_off[]" onkeyup="return calculator_offline();" onBlur="return calculator_offline();"  id="border_off'+counter+'" class="txtbox2" ></td><td class="mount'+counter+'"><input type="text" placeholder="Mount" name="mount_code_off[]" id="mount_code'+counter+'" class="txtbox2"></td><td></td><td  class="mount'+counter+'"><input type="text" placeholder="M.Width" name="mount_width_off[]" onKeyUp="return calculator_offline();" onBlur="return calculator_offline();" class="txtbox2" id="mount_width_off'+counter+'"></td><td  class="mount'+counter+'"><input type="tex" readonly="" name="mount_cost_off" id="mount_cost_off'+counter+'" class="txtbox2" ></td><td  class="frame'+counter+'"><input type="text" placeholder="Frame" name="frame_code_off[]" id="framer_code_off'+counter+'"  class="txtbox2"></td><td></td><td  class="frame'+counter+'"><input type="text" placeholder="F.Width" name="frame_width_off[]" id="frame_width_off'+counter+'" class="txtbox2" onkeyup="return calculator_offline();" onChange="return calculator_offline();"></td><td  class="frame framer_c'+counter+'"><input type="tex" readonly="" name="frame_cost_off" id="frame_cost_off'+counter+'" class="txtbox2" ></td><td class="canvas'+counter+'"><input type="tex" readonly="" name="canvas_cost_off" id="canvas_cost_off'+counter+'" class="txtbox2" ></td><td  class="cover'+counter+'"><input type="text" placeholder="Glass" name="cover_off[]" id="cover_off'+counter+'"  class="txtbox2"></td><td  class="cover'+counter+'"><input type="tex" readonly="" name="glass_cost_off" id="glass_cost_off'+counter+'" class="txtbox2" ></td><td class="cp'+counter+'"><span id="discount_off'+counter+'"></span><br><input type="tex"  name="cp_amount[]" placeholder="CP Amount" id="cp_amount'+counter+'" onkeyup="return reverse_calculate();" onblur="return reverse_calculate();" class="txtbox2" ></td><td><input type="text" readonly="" style="background-color:#F7F7F7; text-align: center; font: bold; border: none;" name="Q_total_off[]" id="total_off'+counter+'"></td></tr>');

		newTextBoxDiv.appendTo("#TextBoxesGroup_offline");
		counter++;           });

		 $("#removeButton_offline").click(function () {
		 if(counter==1){
		 alert("No more textbox to remove");
		 return false;
		 }
		 counter--;
		 var packaging_charge=30*counter;$('#packaging_charge_offline').val(packaging_charge);                $("#TextBoxDiv_offline" + counter).remove();		     });		     $("#getButtonValue_offline").click(function () {			var msg = '';	for(i=1; i<counter; i++){   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();	}    	  alert(msg);     });  });




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
<style>
.txtbox{ width: 61px; height: 30px;}
.txtbox2{ width: 81px; height: 30px;}
</style>

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
</head>
                      <body>

<div id="middle-wrapper">
                        <div id="middle-container" style=" width:100%;">
    <div class="main-hdr-quotation"> Create Quotations</div>
    <style>
.manage-order .creat-ordertable tr td{ padding:8px 1px 8px 1px !important;} .hdrs td:nth-child(2) { width:100px;}
</style>
    <div id="quotationListDiv" class="manage-order" >
                            <form  name="create_quotation" action="save_create_quotation" method="post"  enctype="multipart/form-data">
        <b  style=" font-size: 14px; color: green;">
                              <?php if($msg<>'') {?>
                              <script>              setTimeout(function(){outtime()},3000);
            function outtime(){                  window.location.href="view_quotations/";              }           </script>
                              <?php echo $msg;}?></b><br>
        <br>
        <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
                                <tr  class="darktr">
            <td width="18%" class="bold">Quotation ID:</td>
            <td><?php     $uniqueNo =mt_rand();    $uniqueNo=sprintf('%03d',$uniqueNo);    ECHO $QuotationN0='WNS'.$uniqueNo;        ?>
                                    <input type="hidden" id="selected_customer_id"  name="selected_customer_id">
                                    <input type="hidden" name="quotation_id" id="quotation_id" value="<?=$QuotationN0;?>">
                                  </td>
          </tr>
          
          <tr  class="darktr">
            <td width="18%" class="bold">Nature of Sale:</td>
            <td>
                                     <input type="text" name="nofs"  >
                                  </td>
          </tr>
          
          
          
                                <tr  class="darktr">
            <td class="bold">Company Name</td>
            <td><select name="customer_id" id="customer_id"  onchange="filter_customers(this.value)"  class="selectpicker" data-hide-disabled="true" data-live-search="true">
                <optgroup >
                <option value="">--Select Cumstomer--</option>
                </optgroup>
                <?php $customers=$this->backend_model->get_customers();            foreach($customers as $cust)            {                 if($cust->company_name!='')                {                ?>
                <option value="<?php echo $cust->customer_id; ?>"><?php echo $cust->company_name;?></option>
                <?php }                             }?>
              </select>
                                  </td>
          </tr>
                                <div>
            <tr>
                                    <td colspan="2" style="padding:0;"><div class="quotation-div"  id="quotation2Div" style="margin-left:0px" >
                                        <!--DETAILS TABLE-->
                                        <div style="background:#388fc4; font-size:16px; color:#fff; padding:8px; "> Customer Details</div>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr class="darktr">
                                            <td width="150" class="bold">First Name:</td>
                                            <td><input type="text" id ="firstname" name="firstname" readonly style="background-color: #eee; border: none;"></td>
                                            <td class="bold">Last Name:</td>
                                            <td><input type="text" id ="lastname" name="lastname" readonly style="background-color: #eee; border: none;">
                                            </span></td>
                                          </tr>
                                        <tr>
                                            <td class="bold">Email Id:</td>
                                            <td><input type="text" id ="email" name="email" readonly style="background-color:#F7F7F7; border: none;"></td>
                                            <td class="bold">Occupation</td>
                                            <td><input type="text" id ="occupation" name="occupation" readonly style="background-color: #F7F7F7; border: none;"></td>
                                          </tr>
                                        <tr class="darktr">
                                            <td class="bold">Gender</td>
                                            <td><input type="text" id ="gender" name="gender" readonly style="background-color: #eee; border: none;"></td>
                                            <td class="bold">Marital Status</td>
                                            <td><input type="text" id ="martialstatus" name="martialstatus" readonly style="background-color: #eee; border: none;"></td>
                                          </tr>
                                        <tr>
                                            <td class="bold">Address:</td>
                                            <td><input type="text" id ="address" name="address" readonly style="background-color: #F7F7F7; border: none;"></td>
                                            <td class="bold">Company Name</td>
                                            <td><input type="text" id ="companyname" name="companyname" readonly style="background-color: #F7F7F7; border: none;"></td>
                                          </tr>
                                        <tr class="darktr">
                                            <td class="bold">Country</td>
                                            <td><input type="text" id ="country" name="country" readonly style="background-color: #eee; border: none;"></td>
                                            <td class="bold">State</td>
                                            <td><input type="text" id ="state" name="state" readonly style="background-color: #eee; border: none;"></td>
                                          </tr>
                                        <tr>
                                            <td class="bold">City</td>
                                            <td><input type="text" id ="city" name="city" readonly style="background-color: #F7F7F7; border: none;"></td>
                                            <td  class="bold">Region</td>
                                            <td><input type="text" id ="region" name="region" readonly style="background-color: #F7F7F7; border: none;"></td>
                                          </tr>
                                        <tr class="darktr">
                                            <td class="bold">Pin Code</td>
                                            <td><input type="text" id ="pincode" name="pincode" readonly style="background-color: #eee; border: none;"></td>
                                            <td class="bold">Contact Number</td>
                                            <td><input type="text"  id ="contactnumber" name="contactnumber" readonly style="background-color: #eee; border: none;"></td>
                                          </tr>
                                      </table>
                                        <div style="background:#388fc4; font-size:16px; color:#fff; padding:8px; margin-top:25px "> Order Summary</div>
                                        <!--    <table width="100%" border="0" cellspacing="0" cellpadding="0">      <tr class="darktr">    <td width="150" class="bold">Quotation Date:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">Payment Terms:</td>    <td>xxxxxxxxxxxx</td>  </tr>  <tr>    <td class="bold">Quotation Id:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">Contact Person:</td>    <td>xxxxxxxxxxxx</td>  </tr>  <tr class="darktr">    <td class="bold">Total Images:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">Payment Mode:</td>    <td>xxxxxxxxxxxx</td>  </tr>  <tr>    <td class="bold">Total Prints:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">Tax Type</td>    <td>xxxxxxxxxxxx</td>  </tr>    <tr class="darktr">    <td class="bold">Total Frames:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">PAN Card Number</td>    <td>xxxxxxxxxxxx</td>  </tr>  <tr>    <td class="bold">Total Amount</td>    <td>xxxxxxxxxxxx</td>    <td  class="bold">&nbsp;</td>    <td>&nbsp;</td>  </tr>    </table>-->
                                      </div></td>
                                  </tr>
                                  <tr  class="darktr" >
                                    <td></td>
                                    <td> Add Online&nbsp;
                <input type="radio" name="qutatiion" checked="" id="add_online" value="1" onClick="return change_form_status('1')">
                &nbsp;Add Offline&nbsp;
                <input type="radio" name="qutatiion" id="add_offline" onClick="return change_form_status('2');" value="2">
              </td>
                                  </tr>


                                  


                                  





			<tr style="border-bottom:none" id="online_form" >
                                    <td colspan="2" >
              <div class="customer-list" id="btn_foucs"><a href="#!" class="addnewcp" id='addButton' onClick="return increase_values();">Add New Item</a> <a href="#!" class="subtractwcp"  id='removeButton'>Remove Item</a></div>
                                    <br>
                                    <div>Live Image
                <input type="radio" checked="" onClick="return change_div('1');" name="radio" id="old_image" >
                &nbsp;Upload Image
                <input type="radio"  onclick="return change_div('2');" name="radio" id="new_image" >


                                    </div>
                                    <br>
                                    <div class="viewcplist-inner">
                <div id='TextBoxesGroup'>
                                        <div id="TextBoxDiv1">
                    <table   border="0" cellspacing="0" cellpadding="0" >
                                            <tr class="hdrs">
                                                
                        <td>&nbsp;Image Id&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td >Visual</td>
                        <td>License Cost(%)</td>
                        <td colspan="4">Print</td>
                        <td colspan="3" class="mount">Mount</td>
                        <td colspan="3"  class="frame">Frame</td>
                        <td colspan="2" class="cover">Cover</td>
                        <td><strong>Total</strong></td>
                      </tr>
                      <tr class="hdrs">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Surface</td>
                        <td>Height</td>
                        <td> Width</td>
                        <td>Print Cost</td>
                        <td class="mount">Name</td>
                        <td class="mount">Width</td>
                        <td class="mount">Mount Cost</td>
                        <td class="frame"> Name</td>
                        <td class="frame">Width</td>
                        <td class="frame">Frame Cost</td>
                        <td class="cover">Glass</td>
                        <td class="cover">Glass Cost</td>
                        <td></td>
                      </tr>
                                            <tr>
                        <td><div class="old">
                            <input type="text" class="txtbox" name="imgid[]" id="imgid0"  onBlur="return show_image_visual(this.value);" />
                          </div>
                                                <div class="new"  id="filediv">
                            <input type="file"  name="file[]" style="width:100px;"  id="file" />
                          </div></td>
                        <td ><div id="image_preview" class="image_preview"><img id="previewing" src="" width="50" height="50"/></div>
                                                <span id="image_visual" class="image_visual" ></span></td>
                        <td><span id="license_cost0">0.00</span><br>
                            <input type="text" class="txtbox" name="license_cost[]" onKeyUp="return calculator_show();" onBlur="return calculator_show();" id="license_cost0" placeholder="%"  /></td>
                        <td>
						<a onClick="return new_suerface('1');" id="custom" style="padding-left: 56px;">Custom</a>
						<a onClick="return new_suerface('2');" id="list" style="padding-left: 56px;">List</a><br>

						<input type="text" name="surface[]" id="new_serface" style="width:169px; height:18px;">


						<select name="surface[]" id="surface0">
                            <?php   foreach($surface as $surf) {  ?>
                            <option value="<?php echo $surf['surface']; ?>"><?php echo $surf['surface'] ?></option>
                            <?php } ?>
                          </select></td>
                        <td><input type="text" name="print_height[]" id="print_height0"  onkeyup="return calculator_show();" class="txtbox" onBlur="return calculator_show();"></td>
                        <td><input type="text" name="print_width[]" id="print_width0" onKeyUp="return calculator_show();" onBlur="return calculator_show();" class="txtbox"></td>
                        <td ><input type="tex" readonly="" name="print_cost" id="print_cost0" class="txtbox" ></td>
                        <td class="mount">
						<a onClick="return new_mount('1');" id="m_custom" style="padding-left: 56px;">Custom</a>
						<a onClick="return new_mount('2');" id="m_list" style="padding-left: 56px;">List</a><br>

						<input type="text" name="mount_code[]" id="new_mount_code" style="width:95px; height:18px;">
						<select name="mount_code[]" id="mount_code0">
                            <?php foreach ($surface_mount as $mount) {  ?>
                            <option value="<?php echo $mount['surface']; ?>"><?php echo $mount['surface'] ?></option>
                            <?php } ?>
                          </select></td>
                        <td class="mount"><input type="text" name="mount_width[]" id="mount_width0" onKeyUp="return calculator_show();" onBlur="return calculator_show();" class="txtbox"></td>
                        <td class="mount"><input type="tex" readonly="" name="mount_cost" id="mount_cost0" class="txtbox" ></td>
                        <td class="frame">

						<a onClick="return new_frame('1');" id="f_custom" style="padding-left: 56px;">Custom</a>
						<a onClick="return new_frame('2');" id="f_list" style="padding-left: 56px;">List</a><br>

						<input type="text" name="frame_code[]" id="new_framer_code0" style="width:95px; height:18px;">

						<select name="frame_code[]" id="framer_code0">
                            <?php foreach ($surface_framer as $framer) {?>
                            <option value="<?php echo $framer['surface']; ?>"><?php echo $framer['surface'] ?></option>
                            <?php } ?>
                          </select></td>
                        <td class="frame"><select name="frame_width[]" id="frame_width0" onkeyup="return calculator_show();" onChange="return calculator_show();">
                            <?php foreach ($framer_width as $width) {?>
                            <option value="<?php echo $width['width']; ?>"><?php echo $width['width'] ?></option>
                            <?php } ?>
                          </select>
                                              </td>





                        <td class="frame"><input type="tex" readonly="" name="frame_cost" id="frame_cost0" class="txtbox" ></td>
                        <td class="cover">
						<a onClick="return new_cover('1');" id="c_custom" style="padding-left: 56px;">Custom</a>
						<a onClick="return new_cover('2');" id="c_list" style="padding-left: 56px;">List</a><br>

						<input type="text" name="cover[]" id="new_cover0" style="width:95px; height:18px;">

						<select name="cover[]" id="cover0">
                            <?php foreach ($surface_glass as $GLASS) {  ?>
                            <option value="<?php echo $GLASS['surface']; ?>"><?php echo $GLASS['surface'] ?></option>
                            <?php } ?>
                          </select></td>
                        <td class="cover"><input type="tex" readonly="" name="glass_cost" id="glass_cost0" class="txtbox" ></td>
                      </td>

                                            <td ><input type="text" readonly="" style="background-color:#F7F7F7; text-align: center; font: bold; border: none;" name="Q_total[]" id="total0"></td>
                      </tr>
                                          </table>
                  </div>
                                      </div>
              </div>
                                    <p>&nbsp;</p>
                                    <table width="600" border="0" cellspacing="0" cellpadding="0">
                <tr>
                                        <td class="bold">Packaging Charges:</td>
                                        <td><input type="text" name="packaging_charge" readonly="" id="packaging_charge" value="" class="txtbox">
                  </td>
                                      </tr>
                <tr class="darktr">
                                        <td class="bold">Courier Charges:</td>
                                        <td><input type="text" name="courier_charge"  readonly="" id="courier_charge" value="<?='50'?>"  class="txtbox"></td>
                                      </tr>
                <tr>
                                        <td class="bold">Discount:</td>
                                        <td><input type="text" name="discount"  id="discount" class="txtbox"  onkeyup="return calculator_show();" onBlur="return calculator_show();"></td>
                                      </tr>
                <tr class="darktr">
                                        <td class="bold">Total After Discount:</td>
                                        <td><input type="text" name="after_discount" readonly="" value="" id="after_discount" class="txtbox"></td>
                                      </tr>
                <tr>
                                        <td class="bold">Tax - 5% VAT:</td>
                                        <td><input type="text" readonly="" name="tax" value="<?='5'?>" class="txtbox"></td>
                                      </tr>
                <tr class="darktr">
                                        <td class="bold">Final Amount:</td>
                                        <td class="total-price"><div >
                                            <input type="hidden" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="Total_txt_amount" value="">
                                            <input type="text" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="finalTotal_txt" value="">
                                          </div></td>
                                      </tr>
              </table>
                                    <br />
                                    <br />
                                    <table width="1000" border="0" cellspacing="0" cellpadding="0">
                <tr class="darktr">
                                        <td width="150" class="bold">Sales Person:</td>
                                        <td><input type="text" name="s_name" id="name-" placeholder="Name"/></td>
                                        <td><input type="text" name="s_email" id="name-2" placeholder="Email"/></td>
                                        <td><input type="text" name="s_contact" id="name-3" placeholder="Contact Number"/></td>
                                      </tr>
                <tr>
                                        <td class="bold">Client Servicing:</td>
                                        <td><input type="text" name="c_name" id="name-4" placeholder="Name"/></td>
                                        <td><input type="text" name="c_email" id="name-5" placeholder="Email"/></td>
                                        <td><input type="text" name="c_contact" id="name-6" placeholder="Contact Number"/></td>
                                      </tr>
                <tr class="darktr">
                                        <td class="bold">Created by:</td>
                                        <td><input type="text" name="createdby" id="name-7" placeholder="Name"/></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
              </table>
                                    </td>
            </tr>








<!--  offline_form-->

                    <tr style="border-bottom:none" id="offline_form" >
                                    <td colspan="2" >
              <div class="customer-list" id="btn_foucs"><a href="#!" class="addnewcp" id='addButton_offline' onClick="return increase_values_offline();">Add New Item</a> <a href="#!" class="subtractwcp"  id='removeButton_offline'>Remove Item</a></div>
                                    <br>
                                    <div>Live Image
                <input type="radio" checked="" onClick="return change_div_offline('1');" name="radio" id="old_image_offline" >
                &nbsp;Upload Image
                <input type="radio"  onclick="return change_div_offline('2');" name="radio" id="new_image_offline" >
               &nbsp; Channel Partner <input type="checkbox" name="channel_partner" value="1" onClick="return show_channel_partner();" id="channel_partner" data-id="1">
                                    </div>
                                    <br>
                                    <div class="viewcplist-inner">
                <div id='TextBoxesGroup_offline'>
                     <div id="TextBoxDiv1_offline">
                    <table   border="0" cellspacing="0" cellpadding="0" >
                                            <tr class="hdrs">
                                                <td>Print Type</td>
                        <td>&nbsp;Image Id&nbsp;&nbsp;&nbsp;&nbsp; </td>

                        <td class="order_id">&nbsp;Order Id&nbsp;&nbsp;&nbsp;&nbsp; </td>
						<td >Packaging Charge</td>
						<td >Courier Charge</td>
            <td >Visual</td>
                        <td>License Cost(%)</td>
                        <td colspan="5" id="print_id">Print</td>
                        <td colspan="3" class="mount">Mount</td>
                        <td colspan="3" class="frame" id="canvas_id">Frame</td>
                        <td colspan="2" class="cover">Cover</td>
			<td class="cp"><strong>CP Amount</strong></td>
                        
                        <td><strong>Total</strong></td>
                      </tr>
                      <tr class="hdrs">
                        <td>&nbsp;</td>
                         <td>&nbsp;</td>
		        <td>&nbsp;</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td></td>

                        <td class="order_id">&nbsp;</td>
                        <td>Surface</td>
                        <td>Height</td>
                        <td>Width</td>
                        <td>Print Rate</td>
						<td class="printer">Print Cost</td>
                        <td>Border</td>
                        <td class="mount">Name</td>
                        <td class="mount">Width</td>
                        <td class="mount">Mount Cost</td>
                        <td class="frame"> Name</td>
                        <td class="frame">Width</td>
                        <td class="frame" id="framer_l">Frame Cost</td>
                         <td class="canvas">Canvas Cost</td>
                        <td class="cover">Glass</td>
                        <td class="cover">Glass Cost</td>
		<td class="cp"></span></td>
						
                        <td></td>

                      </tr>
                                            <tr>
                                                <td><select name="category_off[]" style="width: 86px;height: 28px;" onchange="validate_print_type(this.value)" >
		  <option value="">-Print Type-</option>
		   <option value="1">Print</option>
		    <option value="2">Print+Mount</option>
			 <option value="3">Print + frame</option>
			  <option value="4">Print+frame+Mount+Glass</option>
			  <option value="5">Print+frame+Mount</option>
			  <option value="6">Print+frame+Canvas</option>
		  </select> </td>
                        <td><div class="old_offline">
                            <input type="text" class="txtbox2" name="imgid_off[]" id="imgid0"  onBlur="return show_image_visual_offline(this.value);" />
                          </div>
                                                <div class="new_offline"  id="filediv_offline">
                            <input type="file"   name="file_off[]" style="width:100px;"  id="file_offline" />
                          </div></td>
                          <td class="order_id"><input type="text" name="order_id_off[]" id="order_id_off0" class="txtbox2" ></td>
						  <td ><input type="text" name="packaging_charge_off[]" id="packaging_charge_off0" class="txtbox2" ></td>
						  <td ><input type="text" name="courier_charge_off[]" id="courier_charge_off0" class="txtbox2" ></td>
                        <td ><div id="image_preview_offline" class="image_preview_offline"><img id="previewing_offline" src="" width="50" height="50"/></div>
<span id="image_visual_offline" class="image_visual_offline" ></span></td>
                       <td><span id="license_cost_off0">0.00</span><br><input type="text" class="txtbox2" name="license_cost_off[]" onkeyup="return calculator_offline();" onBlur="return calculator_offline();" id="license_cost_off0"  class="txtbox2"/></td>
                        <td><input type="text" name="surface_off[]" id="surface_off0" onKeyUp="return calculator_offline();" class="txtbox2" /></td>
                        <td><input type="text" name="print_height_off[]" id="print_height_off0"  onkeyup="return calculator_offline();" class="txtbox2" onBlur="return calculator_offline();"></td>
                        <td><input type="text" name="print_width_off[]" id="print_width_off0" onKeyUp="return calculator_offline();" onBlur="return calculator_offline();" class="txtbox2"></td>
                        <td>
                            <input type="tex"  name="print_rate_off[]" onKeyUp="return calculator_offline();" onBlur="return calculator_offline();"  id="print_rate_off0" class="txtbox2" ></td>
							<td class="printer"><input type="tex" readonly="" name="print_cost_off" id="print_cost_off0" class="txtbox2" ></td>
                        <td><input type="tex"  name="border_off[]" onKeyUp="return calculator_offline();" onBlur="return calculator_offline();"  id="border_off0" class="txtbox2" ></td>
                        <td class="mount"><input type="text" name="mount_code_off[]" class="txtbox2" id="mount_code0">
                                              </td>
                        <td class="mount"><input type="text" name="mount_width_off[]" id="mount_width0" onKeyUp="return calculator_offline();" onBlur="return calculator_offline();" class="txtbox2"></td>
                        <td class="mount"><input type="tex" readonly="" name="mount_cost_off" id="mount_cost_off0" class="txtbox2" ></td>
                        <td class="frame " ><input type="text" name="frame_code_off[]"  class="txtbox2" id="framer_code_off0">
                                              </td>
                        <td class="frame"><input type="text" name="frame_width_off[]" id="frame_width0" onKeyUp="return calculator_offline();" onChange="return calculator_offline();" class="txtbox2">
                                              </td>
                        <td class="frame framer_c"><input type="tex" readonly="" name="frame_cost_off" id="frame_cost_off0" class="txtbox2" ></td>
                         <td class="canvas"><input type="tex" readonly="" name="canvas_cost_off" id="canvas_cost_off0" class="txtbox2" ></td>
                        <td class="cover"><input type="text" name="cover_off[]" id="surface_off0" class="txtbox2">
                                              </td>
                        
						 <td class="cover"><input type="tex" readonly="" name="glass_cost_off" id="glass_cost_off0" class="txtbox2" ></td>

                                                 <td class="cp"><span id="discount_off0"></span><br><input type="tex"  name="cp_amount[]" id="cp_amount0" onKeyUp="return reverse_calculate();" onBlur="return reverse_calculate();" class="txtbox2" ></td>
                  
                                            <td ><input type="text" readonly="" style="background-color:#F7F7F7; text-align: center; font: bold; border: none;" name="Q_total_off[]" id="total_off0" class="txtbox2"></td>
                      </tr>
                                          </table>
                  </div>
                                      </div>
              </div>
                                    <p>&nbsp;</p>
                                    <table width="600" border="0" cellspacing="0" cellpadding="0">
               
                
                                      <tr >
                                         <td class="bold">Tax -<span id="txt_lbl" class="bold"></span>  5%: </td>
                                                                <td><input type="text" readonly="" name="tax" value="<?='5'?>" class="txtbox2"></td>
                                      </tr>
                                                              

                                        <td class="bold">Tax Amount: (Rs.)</td>
                                        <td><input type="text" readonly="" id="tax_amount" name="tax_amount" value="<?='0.00'?>" class="txtbox2"></td>
                                      </tr>

                                        

                                      <tr class="darktr Channel_p">
                                      <td class="bold">WNA Final Amount: (Rs.)</td>
                                        <td class="total-price"><div >
                                            <input type="hidden" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="Total_txt_amount_off_cp" value="">
                                            <input type="text"  style="color:#000000"  onkeyup="return reverse_calculate();"  name="finalTotal_txt_cp" id="finalTotal_txt_off_cp" value="">
                                          </div></td>
                                      </tr>

                                        <tr class="darktr" id="final_amount">
                                        <td class="bold">Final Amount: (Rs.)</td>
                                        <td class="total-price"><div >
                                            <input type="hidden" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="Total_txt_amount_off" value="">
                                            <input type="text" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="finalTotal_txt_off" value="">
                                          </div></td>
                                      </tr>
              </table>
                                    <br />
                                    <br />
                                    <table width="1000" border="0" cellspacing="0" cellpadding="0">
                <tr class="darktr">
                                        <td width="150" class="bold">Sales Person:</td>
                                        <td><input type="text" name="s_name" id="name-" placeholder="Name"/></td>
                                        <td><input type="text" name="s_email" id="name-2" placeholder="Email"/></td>
                                        <td><input type="text" name="s_contact" id="name-3" placeholder="Contact Number"/></td>
                                      </tr>
                <tr>
                                        <td class="bold">Client Servicing:</td>
                                        <td><input type="text" name="c_name" id="name-4" placeholder="Name"/></td>
                                        <td><input type="text" name="c_email" id="name-5" placeholder="Email"/></td>
                                        <td><input type="text" name="c_contact" id="name-6" placeholder="Contact Number"/></td>
                                      </tr>
                <tr class="darktr">
                                        <td class="bold">Created by:</td>
                                        <td><input type="text" name="createdby" id="name-7" placeholder="Name"/></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
              </table>
                                    </td>
            </tr>

          </div>
                              </table>
        <div style="padding:30px; text-align:left">
                                <input type="submit" name="addcpn" id="addcpn" value="Generate Quotation" class="bt-create-quote" >

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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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



 
  function validate_print_type(print_id)
     {
  
     if(print_id=='1'){
        $('.mount').hide();
            $('.frame').hide();
            $('.cover').hide();
             $('.canvas').hide();
              $('.printer').show();
            calculator_offline('1');

            document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='2'){
        $('.mount').show();
            $('.frame').hide();
            $('.cover').hide();
             $('.canvas').hide();
             
 calculator_offline('2');
              
            document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='3'){
        $('.frame').show();
            $('.mount').hide();
            $('.hide').show();
            $('.canvas').hide();
 
   calculator_offline('3');
            document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='4'){
             $('.mount').show();
            $('.frame').show();
            $('.cover').show();
            $('.canvas').hide();
           
              calculator_offline('4');
            document.getElementById("canvas_id").colSpan='3';

     }else if(print_id=='5'){
             $('.mount').show();
            $('.frame').show();
            $('.cover').hide();
             $('.canvas').hide();
            
               calculator_offline('5');
             document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='6'){

             $('.mount').hide();
            $('.frame').show();
            $('.cover').hide();
            
             $('.canvas').show();
              $('#framer_l').hide();
              $('.framer_c').hide();
 calculator_offline('6');
              
             document.getElementById("canvas_id").colSpan='3';

     }
}


function validate_print_type_more(print_id,id)
     {
   
   
     if(print_id=='1'){
        $('.mount'+id).hide();
            $('.frame'+id).hide();
            $('.cover'+id).hide();
             $('.canvas'+id).hide();
              $('.printer'+id).show();
            calculator_offline('1');

            document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='2'){
        $('.mount'+id).show();
            $('.frame'+id).hide();
            $('.cover'+id).hide();
             $('.canvas'+id).hide();
             
 calculator_offline('2');
              
            document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='3'){
        $('.frame'+id).show();
            $('.mount'+id).hide();
            $('.hide'+id).show();
            $('.canvas'+id).hide();
 
   calculator_offline('3');
            document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='4'){
             $('.mount'+id).show();
            $('.frame'+id).show();
            $('.cover'+id).show();
            $('.canvas'+id).hide();
           
              calculator_offline('4');
            document.getElementById("canvas_id").colSpan='3';

     }else if(print_id=='5'){
             $('.mount'+id).show();
            $('.frame'+id).show();
            $('.cover'+id).hide();
             $('.canvas'+id).hide();
            
               calculator_offline('5');
             document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='6'){

             $('.mount'+id).hide();
            $('.frame'+id).show();
            $('.cover'+id).hide();
            
             $('.canvas'+id).show();
              $('#framer_l'+id).hide();
              $('.framer_c'+id).hide();
 calculator_offline('6');
              
             document.getElementById("canvas_id").colSpan='3';

     }
}



    $(document).on('click','.print_type',function(){
    var print_id=$(this).data('id');

     if(print_id=='1'){
        $('.mount').hide();
            $('.frame').hide();
            $('.cover').hide();
             $('.canvas').hide();
              $('.printer').show();
            

            document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='2'){
        $('.mount').show();
            $('.frame').hide();
            $('.cover').hide();
             $('.canvas').hide();
             

              
            document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='3'){
        $('.frame').show();
            $('.mount').hide();
            $('.hide').show();
            $('.canvas').hide();
 
  
            document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='4'){
             $('.mount').show();
            $('.frame').show();
            $('.cover').show();
            $('.canvas').hide();
           
             
            document.getElementById("canvas_id").colSpan='3';

     }else if(print_id=='5'){
             $('.mount').show();
            $('.frame').show();
            $('.cover').hide();
             $('.canvas').hide();
            
              
             document.getElementById("canvas_id").colSpan='3';
     }else if(print_id=='6'){

             $('.mount').hide();
            $('.frame').show();
            $('.cover').hide();
            
             $('.canvas').show();
              $('#framer_l').hide();
              $('.framer_c').hide();

              
             document.getElementById("canvas_id").colSpan='3';

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
 if(!isNaN(discount_percetage)){
$('#discount_off'+[i]).html(discount_percetage+' %');
 }
$('#discount_off_amt'+[i]).html(cp_discount_amt_fix);
                            }
}


    </script>
