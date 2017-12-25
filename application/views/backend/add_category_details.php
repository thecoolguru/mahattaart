<?php

?>
  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr">Add web price details</div>
    <div class="add-newcp"><span id="success_result" style="color:#F00;font-size:16px"><?php 
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
     <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_price?search=collection"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      <form action="#" id="add_printer_form" method="post" enctype="multipart/form-data"> 
          <input type="hidden" name="package_code" value="<?=$package_code;?>">
		  <input type="hidden" name="" id="tbl_update" value="<?=$tbl;?>">
		  <input type="hidden" name="" id="tbl_edit" value="<?=$edit_table;?>">
		  
		  <input type="hidden" name="" id="row_id_sec" value="<?=$row_id_sec;?>">
		  <input type="hidden" name="" id="vendor_name_to_update" value="<?php
		echo   str_replace('%20',' ',trim($vendor_name));
		  ?>">
          
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
         
          <tr>
            <td width="44%">Category Type</td>
            <td width="56%"><select name="category" id="category" onchange="return change_values(this.value);" style="width:243px; height:33px;" class="inputbxs">
            <option value="">--Select--</option>
            <option  value="1">Printing paper type</option>
                <option value="2">Frame</option>
                <option value="3">Glass</option>
                <option value="4">Mount</option>
				<option value="5">Ink</option>
				<option value="6">Framing raw meterail</option>
				<option value="7">Packeging</option>
              </select>
            </td>
          </tr>
          
          
	  <tr class="pack_category" style="display:none;">
        <td > Metarials Type:</td>
        <td><select name="meterails_type" id="meterails_type" class="inputbxs"  onchange="return change_values(this.value);">
                        <option value="">--Select--</option>
                        <option value="a">Bubble Wrap</option>
                         <option value="b">Corrugated box(5 ply)</option>
                          <option value="c">Corrugated box(3 ply)</option>
						  <option value="d">Brown tape(5 ply)</option>
						  
            </select></td>
      </tr>
 <tr class="toptr select_vendor" style="display:none;">
 
              <td><span >Existing Vendor:</span>
			  <?php    $uniqueNo =mt_rand(10000,99999); 
			    $unique_inv_id='MA_INV_'.$uniqueNo;
			//	$ven_name=$this->backend_model->get_vendor_name_tbl_web_price();
		
			        ?> 
					
					
					<span style="padding-left:55px;"><input type="hidden" name="unique_inv_id" id="unique_inv_id" value="<?=$unique_inv_id;?>">
					 <select name="sel_ven_name" id="sel_ven_name" onchange="change_vendor_name(this.value);">
					
					 <option value="0">----select vendor----</option>
					  <?php foreach($ven_name as $ven_det){  
					 
										 ?>
					 <option value="<?=$ven_det->vendor_name?>"><?=$ven_det->vendor_name?></option>
					 <?php } ?>
					 </select></span></td>
                      <td> Add new vendor:&nbsp;&nbsp;<input type="checkbox" id="add_new_vendor"  value="1" name="add_new_vendor">
</td>

					  </tr>
					 
					  <div class="" >
					  <tr class="darktr print_paper vendor">
  <td width="277" class="bold">Vendor Id :&nbsp;&nbsp;<input type="tex" readonly="" style="border:none;"name="unique_ven_id" id="unique_ven_id" value=""></td>
    <td>Vendor Name :&nbsp;<input type="text" name="vendor_name" placeholder="Enter Vendor Name" id="vendor_name"   class="printer" >
    </td>
          </tr>
		  <tr class="darktr print_paper vendor">
  <td width="277" class="bold">Vendor Contact :&nbsp;<input type="text" placeholder="Enter Vendor Conatact" name="vendor_contact" id="vendor_contact"   class="printer" ><span style="color:blue; cursor:pointer" class="add_more" onClick="add_more('c')">Add more</span></td>
    <td>Vendor Details:&nbsp;&nbsp;<input type="text" name="vendor_dtls" placeholder="Enter Vendor Details" id="vendor_dtls"  class="printer"><span style="color:blue; cursor:pointer" class="add_more" onClick="add_more('d')">Add more</span>
    </td>
          </tr>
		  <tr class="darktr print_paper vendor">
  <td width="277" class="bold vendor_c" style="display:none">Vendor Contact(Optional) :&nbsp;<input type="text" name="vendor_contact_c" placeholder="Enter Alternate Conatact" id="vendor_c"   class="printer" ></td>
    <td class="vendor_d" style="display:none">Vendor Details(Optional):&nbsp;&nbsp;<input type="text" name="vendor_dtls_d" id="vendor_d"  placeholder="Enter Vendor Detail2" class="printer">
    </td>
          </tr>
		  <tr class="darktr print_paper vendor">
  <td width="277" class="bold">Vendor Lead Time (Days):&nbsp;<input type="text" placeholder="Enter Vendor Lead Time" name="vendor_lead_time" id="vendor_lead_time"   class="printer" ></td>
   
          </tr>
		   <tr class="frame_category">
        <td > Frame Type:</td>
        <td><select name="frame" id="frame" class="inputbxs"  onchange="return get_frame_category(this.value);">
                        <option value="">--Select--</option>
                        <option value="1">Synthetic frames</option>
                         <option value="2">Wooden frames</option>
                          <option value="3">Streched Canvas Gallery Wrap</option>
            </select></td>
      </tr>
	  <tr class="toptr print_paper">
              <td><span >Paper</span></td>
                      <td> <select name="" id="paper_type_only"  onchange="" class="inputbxs">
					        <option value="">---Select---</option>
                            <option value="1">Canvas</option>
							<option value="2">Paper</option>
                        </select>
</td>
					  </tr>
      <tr class="toptr print_paper">
              <td><span >Paper Type</span></td>
                      <td> <select name="" id="paper_type"  onchange="return get_paper_name(this.value);" class="inputbxs">
					        <option value="">---Select---</option>
                            <option value="Archival Premium">Archival Premium</option>
							<option value="Archival Standard">Archival Standard</option>
                        </select>
</td>
					  </tr>
					
          <tr id="print_papper">
            <td><span id="lbl_name">Name</span></td>
                    <td class="remove_add checkforexistpaper">
					<select name="name" id="name" class="inputbxs">
                            
                        </select>
                        </td>
						<td style="display:none" class="checkfornewpaper"><input type="text" id="" placeholder="Enter New Paper" class="inputbxs"/>
                        </td>
          </tr>

   

					  <tr class="toptr print_paper">
              <td><span >Display Name :</span></td>
                      <td> <input type="text" name="dis_name" placeholder="Enter Display Paper" id="dis_name" class="inputbxs" >
</td>
					  </tr>

          
		
    </div>
          <tr  class="frame_category">
              <td><span >Frame Name</span></td>
            <td>
                <input type="text" name="frame_name" id="frame_name" class="inputbxs" >
                  
                 
             </td>
          </tr>
		  
		   <tr  class="frame_category">
              <td><span >Frame Code</span></td>
            <td>
                <input type="text" name="frame_code" id="frame_code" class="inputbxs" >
                             
             </td>
          </tr>
		   <tr  class="frame_category">
              <td><span >Frame Color</span></td>
            <td>
                <input type="text" name="frame_color" id="frame_color" class="inputbxs" >
                             
             </td>
          </tr>
		   <tr  class="frame_category">
              <td><span >Frame Size(mm)</span></td>
            <td>
                <input type="text" name="frame_size" id="frame_size" class="inputbxs" >
                             
             </td>
          </tr>
		   <tr  class="mount_category">
              <td><span >Mount Code</span></td>
            <td>
                <input type="text" name="mount_code" id="mount_code" class="inputbxs" >
                             
             </td>
          </tr>
          <tr  class="mount_category">
              <td><span >Mount Height</span></td>
            <td>
                <input type="text" name="mount_height" id="mount_height" class="inputbxs" >
                             
             </td>
          </tr>
          <tr  class="mount_category">
              <td><span >Mount Width</span></td>
            <td>
                <input type="text" name="mount_width" id="mount_width" class="inputbxs" >
                             
             </td>
          </tr>
          
          
          <tr  class="toptr comman row_for_comman" id="row_of_rate">
              <td><span id="lbl_rate">Rate</span></td>
            <td><input type="text" name="rate" id="rate" class="inputbxs" />
             </td>
          </tr>
		  <tr class="toptr print_paper">
			 <td >Roll Purchased(Qty):&nbsp;&nbsp;<input type="text"  id="total_roll" placeholder="Enter Roll Qty" value="" name="total_roll"></td>
			 
          </tr> 
            <tr class="toptr print_paper row_for_comman">
			 <td >Unit Price:&nbsp;&nbsp;<input type="text" id="unit_price"  value="" placeholder="Enter Unit Price" name="unit_price"></td>
			 <td class="div_roll_width"><span class='text_roll_width'>Roll width:&nbsp;&nbsp;<input type="text" id="roll_width"  value="" class="update_disable" placeholder="Enter Roll Width" name="roll_width"></span></td>
          </tr> 
		  
		   <tr class="toptr print_paper" id="div_roll_height">
			 <td >Roll Height(m):&nbsp;&nbsp;<input type="text" id="roll_height"  placeholder="Enter Height in Meter " value="" name="roll_height"></td>
			 <td>Roll Height(Inch):&nbsp;<input type="text" style="border:none;text-align:center" readonly id="roll_height_inch"  value="" name="roll_height"></td>
          </tr>  
		  
		  <tr class="toptr print_paper" id="div_cost_inch">
			 <td class="">Cost/Inch*2:&nbsp;<input type="text" style="border:none;text-align:center" readonly="" id="cost_per_inch"  value="" name="cost_per_inch"></td>
			 <td div class="only_print_inch">Only Print/Inch*2:<input type="text" style="border:none;text-align:center" readonly="" id="only_print_price"  value="" name="only_print_price"></td>
          </tr> 
		  <tr class="toptr print_paper">
		  <td>
		  </td>
		   <td div class="only_print_inch">Web Print Price/Inch*2:<input type="text" style="text-align:center"  id="web_print_price" class="update_disable" value="" name="web_print_price"></td>
          </tr> 
		   <tr class="toptr print_paper">
              <td><span >Quality</span><span class="quality Star" style="padding-left:30px">Star:&nbsp;&nbsp;<input type="text" id="star"  class="update_disable" placeholder="Enter Star Rate" value="" name="star"></span></td>
                 <td><span class="quality Platinum">Platinum:&nbsp;<input type="text" class="update_disable" id="platinum"  placeholder="Enter Platinum Rate"value="" name="platinum"></span></td>     
			</tr>
			<tr class="toptr print_paper">
			 <td ><span class="quality Gold" style="padding-left:70px;" >Gold:&nbsp;&nbsp;<input type="text" id="gold" placeholder="Enter Gold Rate" class="update_disable" value="" name="gold"></span></td>
			 <td><span class="quality Silver">Silver:&nbsp;<input type="text" class="update_disable" id="silver"  placeholder="Enter Silver Rate" value="" name="quality"></span></td>
          </tr> 
		 
    <tr class="toptr print_paper row_for_comman">
			 <td class="div_text_gsm"><span class="text_gsm">GSM:&nbsp; </span><input type="text" placeholder="Enter GSM" value="" name="gsm" class="update_disable" id="gsm"></td>
			 <td ><span class="text_box_comman">Thresold Qty:</span><input type="text" style="border:none;text-align:center;" readonly="" id="thresold_qty"  value="2" name="thresold_qty"></td>
          </tr>
		  <tr class="toptr hide_for_update" style="display:none" >
			 <td class="">Used Qty:&nbsp; <input type="text" value="" name="gsm" id="used_qty"></td>
			<!-- <td ><span class="text_box_comman"></span>Total Qty:<input type="text" value="" name="total_qty" id="total_qty"></td>-->
          </tr>
		   <tr class="toptr hide_for_update" style="display:none">
			 <td class="div_text_gsm"><span class="">Avg Usage:&nbsp; </span><input type="text" value="" name="" id="avg_usage"></td>
			 
          </tr>
		  <tr class="toptr print_paper row_for_comman">
		   <td>Stock Order(Area "):&nbsp;<input type="text" id="stock_order"  value="" name="stock_order"></td>
		   <td > Stock in Hand(Area "):&nbsp;<input type="text" id="current_qty"  value="" name="current_qty"></td>
		 
          </tr> 
		  <tr class="toptr print_paper">
		   <td></td>
		   <td >Total Roll in Hand(Unit):&nbsp;<input type="text" id="total_roll_hand"  value="" name="total_roll_hand"></td>
		 
          </tr> 
		  <tr class="toptr hide_for_update" style="display:none">
		   <td>Reorder Level:<input type="text" id="reorder_level"  value="" name="reorder_level"></td>
			 <td style="display:none" class="date_last_purchased_div" > Date last purchased:&nbsp;<input type="text" id="date_last_purchased"  value="" name="date_last_purchased"></td>
			  
			 
          </tr> 
          <tr class="toptr">
              <td></td>
              <td><input type="button" name="save" id="save" value="Save" class="bt-sbt-upload" />
             </td>
          </tr>
         
       </table>      
       
       
          
           
          <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
<!--MIDDLE PAGE WRAPPER ENDS-->
<script>
function add_more(value){
//alert(value);
$('.vendor_'+value).show();

}
/*
$(document).on('click','#total_roll',function(){

}*/





$(document).on('click','#add_new_vendor',function(){

var check=$('#add_new_vendor:checked').val();

if(check){
$('#vendor_name,#vendor_contact,#vendor_dtls,#vendor_lead_time,#vendor_c,#vendor_d,#vendor_lead_time').val('');
$('#sel_ven_name').val('0').trigger('change');

if(check==1){
$('.print_paper').show();
}else if(check==2){
$('.row_for_comman').addClass('frame_category');
$('.frame_category').show();

}else if(check==3){
$('.row_for_comman').addClass('comman');
$('.comman').show();
$('.vendor').show();

}else if(check==4){
$('.row_for_comman').addClass('mount_category');
$('.mount_category').show();
}else if(check==5){
$('.ink_catagory').show();
$('.vendor').show();

}else if(check==6){
$('.mets_catagory').show();
$('.vendor').show();
}else if(check=='a'){
$('.bubble_cat').show();
$('.vendor').show();
}else if(check=='b' || check=='c' || check=='d'){
$('.corrugated_5ply').show();
$('.vendor').show();
}
var x=1000;
var y=9999;
var rand_val=Math.floor(Math.random() * ((y-x)+1) + x);
$('#unique_ven_id').val('MA_VEN_'+rand_val);				
}else{
$('.print_paper').hide();
}
});
$('#roll_height').blur(function(){
//alert('yes')
var total_roll=$('#total_roll').val();
var unit_price=$('#unit_price').val();
var roll_width=$('#roll_width').val();
///alert(roll_width)
var roll_height=$('#roll_height').val();
//alert(roll_height);
var roll_height_inch=(Math.round(parseFloat(roll_height)*39.37));
$('#roll_height_inch').val(roll_height_inch);
$('#stock_order,#current_qty').val((parseFloat(roll_height_inch)*parseFloat(total_roll)*parseFloat(roll_width)));
var cost_per_inch=(parseFloat(unit_price)/(parseFloat(roll_width)*parseFloat($('#roll_height_inch').val())));
if(isNaN(cost_per_inch)){
cost_per_inch="";
}
$('#cost_per_inch').val(cost_per_inch.toFixed(2));
$('#only_print_price').val((parseFloat(cost_per_inch)+1).toFixed(2));
//$('#web_print_price').val(Math.round(parseFloat(cost_per_inch)+1));
$('#total_roll_hand').val(total_roll);
calculate_used_print_paper(roll_width,total_roll);
});

function calculate_used_print_paper(roll_width,total_roll){
 
// for 7 days multiply with 7
//alert('ss');
//alert(roll_width+','+total_roll)
var roll_height_inch=$('#roll_height_inch').val();

$.ajax({
type:"post",
url:"<?=base_url()?>index.php/backend/get_order_printer_status",
data:"roll_width="+roll_width+"&roll_height_inch="+roll_height_inch,
success:function(response){

//alert(response)
$('#used_qty').val(response);
$('#avg_usage').val((parseFloat(response)/(7)).toFixed(2));
$('#total_qty').val((parseFloat(response) + parseFloat((parseFloat(roll_height_inch)*parseFloat(total_roll)*parseFloat(roll_width)))));
//alert(roll_height_inch)

}






});

}
function change_vendor_name(value){
//alert(value);
var cat_type=$('#add_new_vendor').val();
//alert(cat_type)
if(cat_type==1){
var category_div='print_paper';
var methode='get_vendor_name_details';
}else if(cat_type==2){
var category_div='frame_category';
$('.row_for_comman').addClass(category_div);
var methode='get_vendor_name_of_frame';
}else if(cat_type==3){
$('.print_paper').hide();
var methode='get_vendor_name_of_frame';
var category_div='comman';
//alert('sdkjk')
$('.row_for_comman,.vendor').show();

}else if(cat_type==4){
var methode='get_vendor_name_of_frame';
var category_div='mount_category';
$('.row_for_comman').addClass(category_div);
}else if(cat_type==5){
///$('.ink_catagory').show();
var category_div='ink_catagory';
var methode='get_vendor_name_of_frame';
}else if(cat_type==6){
var category_div='mets_catagory';
var methode='get_vendor_name_of_frame';
}else if(cat_type=='a'){
//alert('pack')
var methode='get_vendor_name_of_frame';
var category_div='bubble_cat';
}else if(cat_type=='b' || cat_type=='c' || cat_type=='d'){
//alert('pack')
var methode='get_vendor_name_of_frame';
var category_div='corrugated_5ply';
}
if(value==''){
//alert('blank')
$('#add_new_vendor').prop('disabled',false);
}else{
//$('#add_new_vendor').prop('disabled',true);
$('.'+category_div).show();
//alert(methode)
$.ajax({
    type:'post',
	url:'<?=base_url()?>index.php/backend/'+methode,
	data:'value='+value+'&cat_type='+cat_type,
	//dataType :'json',

	success:function(response){
//	alert(response)
	var array=$.parseJSON(response);
	//alert(array);
	$('.add_more').trigger('click');
	var string_array='"'+array+'"';
   var explode=string_array.split(",");
	$('#unique_ven_id').val(explode[0].replace(/"/g, "")).css("text-align","center");
	$('#vendor_contact').val(explode[2]);
	$('#vendor_name').val(explode[1]);
	$('#vendor_dtls').val(explode[3]);
	$('#vendor_c').val(explode[4]);
	$('#vendor_d').val(explode[5]);
	$('#vendor_lead_time').val(explode[6].replace(/"/g, ""));
	
	//alert(explode_last)
	
	
	}

});

}
//alert(value)


}


</script>

<script>
    $(document).ready(function(){
	window.tbl_edit=$('#tbl_edit').val();
	//alert('sajid'+tbl_edit)
         $('.collection').hide();
         $('.print_paper').hide();
         $('.frame_category').hide();
         $('#lbl').html('--');
		 $('#show_old_quality').show();
		 $('#quality_show').hide();
		 $('.mount_category').hide();
		 var tbl_update=$('#tbl_update').val();
		// alert(tbl_update)
		 var vendor_name_to_update=$('#vendor_name_to_update').val();
		 if(tbl_update!=''){
		
		// alert('sajid')
		//var val="sajid";
		//$('#add_new_vendor').prop('disabled','false');
		$('.hide_for_update').show();
		if(tbl_update=='paper'){
		 var tbl='tbl_web_price';
		 var catagory_type='1';
		
  //$('.quality').hide();
		}else if(tbl_update=='frame'){
		var catagory_type='2';
		var tbl='tbl_frame_details';
		}else if(tbl_update=='mount'){
		var catagory_type='4';
		var tbl='tbl_mount_details';
		}else if(tbl_update=='glass'){
		var catagory_type='3';
		var tbl='tbl_glass_details';
		}
		else if(tbl_update=='ink'){
		var catagory_type='5';
		var tbl='tbl_ink_details';
		}else if(tbl_update=='row_meterails'){
		var catagory_type='6';
		var tbl='tbl_framing_raw_meterails';
		}else if(tbl_update=='packeging'){
		var catagory_type='7';
		var meterail_type='a';
		var tbl='tbl_packeging_details';
		}else if(tbl_update=='corrugated_5ply'){
		var catagory_type='7';
		var meterail_type='b';
		var tbl='tbl_corrugated_5ply';
		}else if(tbl_update=='corrugated_3ply'){
		var catagory_type='7';
		//alert('co3')
		var meterail_type='c';
		var tbl='tbl_corrugated_3ply';
		}else if(tbl_update=='b_t_5ply'){
		var catagory_type='7';
		var meterail_type='d';
		var tbl='tbl_brown_tape_5ply';
		}
		
		var row_id_sec=$('#row_id_sec').val();
	//	alert(row_id_sec)
	$('#category').val(catagory_type).trigger('change');
	//alert(catagory_type)
	if(tbl=='tbl_packeging_details' || tbl=='tbl_corrugated_5ply' || tbl=='tbl_corrugated_3ply' || tbl=='tbl_brown_tape_5ply'){
	$('#meterails_type').val(meterail_type).trigger('change');
		}
		
		 $.ajax({
		  type:'post',
		 // dataType:'json',
		  url:'<?=base_url()?>index.php/backend/update_paper_of_vendor',
		  data:'vendor_name='+vendor_name_to_update+'&row_id_sec='+row_id_sec+'&tbl_to_update='+tbl,
		  success: function(response){
		alert(response)
		
		$('#sel_ven_name').val(vendor_name_to_update).trigger('change');
		
				  var array=$.parseJSON(response);
		  //alert(array[1]);
		//alert('sss')
		
		  var string_array='"'+array+'"';
		  var explode=string_array.split(",");
		// alert(explode);
		 //alert(explode.length);
		  var first_array=explode[0].replace(/"/g,"");
		  var last_array=explode[explode.length-1].replace(/"/g,"");
		 if(tbl=='tbl_web_price'){
		 
		 // alert(last_array);
		 $('#paper_type').val(first_array).trigger('change');
		 $('#name').val(explode[1]);
		  $('#dis_name').val(explode[2]);
		   var quality1=explode[3];
		   var quality2=explode[4];
		   var quality3=explode[5];
		   var quality4=explode[6];
		   //alert(quality);
		   $('#star').val(quality1);
		   $('#platinum').val(quality2);
		   $('#gold').val(quality3);
		   $('#silver').val(quality4);
		  // $('.'+quality).show();
		  $('#unit_price').val(explode[7]);
		//  var qul_val=quality.toLowerCase();
		//  alert(explode[4])
		    //$('#'+qul_val).val(explode[4]);
			 
			  $('#roll_width').val(explode[8]);
			   $('#roll_height_inch').val(explode[9]);
			 var roll_height_inch=((parseFloat(explode[9]))/(parseFloat('39.37')));
			// alert(roll_height_inch);
			   $('#roll_height').val(roll_height_inch.toFixed(2));
			   
			    $('#cost_per_inch').val(explode[10]);
				 $('#only_print_price').val(explode[11]);
				  $('#gsm').val(explode[12]);
				   $('#current_qty').val(explode[13]);
				   $('#vendor_lead_time').val(explode[14]);
				   $('#total_roll').val(explode[15]);
				   $('#paper_type').val(explode[16]).trigger('change');
				   $('#web_print_price').val('new');
				    $('#paper_type_only').val(explode[19]).trigger('change');;
				  // alert(explode[17])
				  
				   $('#date_last_purchased').val(last_array);
				   $(document).ready(function(){
				  $('#roll_height').focus();
				  if(!tbl_edit){
				  $('.update_disable').prop('disabled','true');
				  $('#check_existing_paper').prop('disabled','true');
				  var total_roll=$('#total_roll').val();
				  }else{
				 // $('#check_existing_paper').prop('disabled','false');
				  var total_roll='0';
				  }
				  $('#name').val(explode[1]).trigger('change');
				  //$('#total_roll').focusout();
				  $('#total_roll').on('focus',function(){
//alert('focus')
//alert('ok')      
                  
                     
					// alert(total_roll)
					
					//alert(tbl_edit)
					 $("#total_roll").change(function(){
					 var total_roll_after_change=$('#total_roll').val();
					// $('#total_roll_hand').val(total_roll_after_change);
					
					 //alert(total_roll_after_change)
					 var grand_total_roll=parseFloat(total_roll)+parseFloat(total_roll_after_change);
					 //alert(grand_total_roll)
					 $('#total_roll_hand').val(grand_total_roll);
					 $('#current_qty').val(Math.round(parseFloat(explode[8])*parseFloat(explode[9])* parseFloat(grand_total_roll)));
					 $('#stock_order').val(Math.round(parseFloat(total_roll_after_change)*parseFloat(explode[9])* parseFloat(explode[8])));
					 
					 
					 });
					

                   });
				  
				  });
				   $('#name').val('new').trigger('change');
				   
				   //$('#date_last_purchased').val(explode[14]);
				  // $('#roll_height').val(last_array);
				   }
				   
				   else if(tbl=='tbl_frame_details'){
				   $('#frame').val(first_array).trigger('change');
				   $('#name').val(explode[1]).trigger('change');
				   $('#frame_name').val(explode[2]);
				   $('#frame_color').val(explode[3]);
				   $('#rate').val(explode[4]);
				   $('#frame_size').val(explode[5]);
				   $('#unit_price').val(explode[6]);
				   $('#gsm').val(explode[7]);
				   $('#used_qty').val(explode[9]);
				   // alert(explode[11]);
				   $('#frame_code').val(explode[11]);
				   $('#date_last_purchased').val(last_array);
				  // alert('yes')
				  	
				  
				   }
				   else if(tbl=='tbl_mount_details'){
				   //alert('tbl_mount_details')
				   
				   $('#name').val(first_array);
				   $('#mount_code').val(explode[1]);
				   $('#mount_height').val(explode[2]);
				   $('#mount_width').val(explode[3]);
				   $('#rate').val(explode[4]);
				   $('#unit_price').val(explode[5]);
				   $('#used_qty').val(explode[6]);
				   $('#current_qty').val(explode[7]);
				   $('#date_last_purchased').val(last_array);
				   
				   
				   }else if(tbl=='tbl_glass_details'){
				  // alert(first_array)
				    $('#name').val(first_array);
					 $('#rate').val(explode[1]);
					  $('#unit_price').val(explode[2]);
				  // $('#mount_width').val(explode[3]);
				   $('#used_qty').val(explode[4]);
				   $('#stock_order').val(explode[5]);
				   $('#current_qty').val(explode[6]);
				  $('#date_last_purchased').val(last_array);
				   
				   
				   }else if(tbl=='tbl_corrugated_5ply'){
				  // alert(first_array)
				//  alert('tbl_corrugated_5ply')
				    $('#name').val(first_array);
					 $('#rate').val(explode[1]);
					  $('#unit_price').val(explode[2]);
				  // $('#mount_width').val(explode[3]);
				   $('#used_qty').val(explode[4]);
				   $('#stock_order').val(explode[5]);
				   $('#current_qty').val(explode[6]);
				  $('#date_last_purchased').val(last_array);
				   
				   
				   }else if(tbl=='tbl_corrugated_3ply'){
				  // alert(first_array)
				    $('#name').val(first_array);
					 $('#rate').val(explode[1]);
					  $('#unit_price').val(explode[2]);
				  // $('#mount_width').val(explode[3]);
				   $('#used_qty').val(explode[4]);
				   $('#stock_order').val(explode[5]);
				   $('#current_qty').val(explode[6]);
				  $('#date_last_purchased').val(last_array);
				   
				   
				   }else if(tbl=='tbl_brown_tape_5ply'){
				  // alert(first_array)
				  //alert('bl_brown_tape_5ply')
				    $('#name').val(first_array);
					 $('#rate').val(explode[1]);
					  $('#unit_price').val(explode[2]);
				  // $('#mount_width').val(explode[3]);
				   $('#used_qty').val(explode[4]);
				   $('#stock_order').val(explode[5]);
				   $('#current_qty').val(explode[6]);
				  $('#date_last_purchased').val(last_array);
				   
				   
				   }
				   
		 $('.date_last_purchased_div').show();
		  
		  
		  }
		 
		 });
		 }
		
		 
    });
    
    function get_frame_category(values){
	  //= $('#dependency').html(values);
         
        $.ajax({
           type:'post',
           url: '<?=base_url()?>index.php/backend/get_frame_category_details',
           data:'values='+values,
           success:function(response){
		  // alert(response)
              $('#name').html(response);
               
           }
           
       });
        
    }
    
    function get_paper_name(values){
       // alert(values); 
        $.ajax({
           type:'post',
           url: '<?=base_url()?>index.php/backend/get_paper_name_details',
           data:'values='+values,
           success:function(response){
		   //alert(response)
              $('#name').html(response);
               
           }
           
       });	
        
    }
    
    function get_frame_name(values){
         
        $.ajax({
           type:'post',
           url: '<?=base_url()?>index.php/backend/get_frame_name_details',
           data:'values='+values,
           success:function(response){
		   //alert(response)
              $('#frame_name').html(response);
               
           }
           
       });	
        
    }
    
    
    function change_rate(values){
        if(values=='2'){
          
           $('#lbl_rate').html('Market Rate'); 
           $('.collection').hide();
          
        }if(values=='1'){
           $('.collection').show();
           $('#lbl_rate').html('Collection Rate'); 
           
        }
        
    }
    function change_values(values){
       // alert(values);
       
	   if(values!=7){
	   $('.pack_category').hide();
	   }
        if(values=='1'){
           $('#lbl_name').html('<span>Existing paper Name: <span><input id="check_existing_paper" type="checkbox"></span></span>'); 
           $('#lbl_rate').html('Printing paper Rate');
		   $('.select_vendor').show();
		   $('#print_papper').addClass('comman print_paper');
		   $('.comman').hide();
          $('.print_paper').hide();
		    $('#lbl').show();
           $('.frame_category').hide();
         //  $('#lbl').html('Add Print Paper');
		  //$('.remove_add').html('<input type="text" name="name" id="name" class="inputbxs">');
		  $('.remove_add').html('<select  id="name" class="inputbxs setinput"> </select>');
           $('.mount_category').hide();
		   
		   $('#check_existing_paper').trigger("click");
		  // $('.print_paper').hide();
        }
        
        if(values=='2'){
	
           //$('#lbl').html('Add Frame Cat. and Name');
		  $('.select_vendor').show();
		 
           $('#lbl_name').html('Frame Catagory'); 
           $('#lbl_rate').html('Frame Rate');
		   $('.text_gsm').html('Running Cost:');
		   $('.div_roll_width').addClass('print_paper');
           $('.print_paper').hide();
		  $('#print_papper').addClass('comman frame_category');
          $('.frame_category').hide();
		   $('.remove_add').html('<select name="name" id="name" onchange="return get_frame_name(this.value);"class="inputbxs setinput"> </select>');
   $('.comman').hide();
   
   $('.vendor').addClass('frame_category');
   
    
   
		 $('.mount_category').hide();
        }
        if(values=='3'){
            $('.select_vendor').show();
           $('#lbl_name').html('Glass Name'); 
           $('#lbl_rate').html('Glass Rate');
		   //$('.comman').addClass(''); 
		   $('.div_roll_width').addClass('print_paper');
		   $('.div_text_gsm').addClass('print_paper');
		   $('#print_papper').addClass('comman');
            $('.frame_category').hide();
			$('#lbl').hide();
			$('.remove_add').html('<input type="text" name="name" id="name" class="inputbxs">');
			$('.mount_category').hide();
			$('.print_paper').hide();
		$('.comman').hide();
        }if(values=='4'){
			$('.select_vendor').show();
			$('.remove_add').html('<input type="text" name="name" id="name" class="inputbxs">');
			
			
           $('#lbl_name').html('Mount Name'); 
           $('#lbl_rate').html('Mount Rate'); 
		   $('.div_roll_width,.div_text_gsm').addClass('print_paper');
		  // $('.div_text_gsm').addClass('print_paper');
		   $('#print_papper').addClass('comman mount_category');
           $('.print_paper,.frame_category').hide();
          // $('.frame_category').hide();
		    $('.comman,.vendor').addClass('mount_category'); 
		//	 $('.vendor').addClass('mount_category');
		   $('.mount_category').hide();
		          }
		if(values=='5'){
		$('.select_vendor').show();
		$('#lbl_name').html('Ink Name'); 
		 $('#lbl_rate').html('Ink Rate'); 
		 $('.div_roll_width,.div_text_gsm').addClass('print_paper');
		$('.remove_add').html('<input type="text" name="name" id="name" class="inputbxs">');
		$('#print_papper,.row_for_comman').addClass('ink_catagory');
		$('.print_paper,.frame_category,.mount_category,.ink_catagory').hide();
        
		 
		
		}
		if(values=='6'){
		$('.select_vendor').show();
		$('#lbl_name').html('Metarial Name');
		$('.remove_add').html('<input type="text" name="name" id="name" class="inputbxs">');
		$('#print_papper,.vendor,.row_for_comman').addClass('mets_catagory');
		$('.div_roll_width,.div_text_gsm').addClass('print_paper');
         $('.comman,.mets_catagory').hide();
		 $('.print_paper,.frame_category,.mount_category,.ink_catagory').hide();
		 $('#row_of_rate').removeClass('mets_catagory');
		}
		if(values=='7'){
		
		$('.remove_add').html('<input type="text" name="name" id="name" class="inputbxs">');
		
		$('#print_papper,.row_for_comman,.select_vendor').hide();
		$('.pack_category').show();
		
        		//alert('2nd 7')
		//$('.pack_category').show();
	   
		
		}
		if(values=='a'){
		$('#lbl_name').html('Metarial Name');
		$('#print_papper,.vendor,.row_for_comman,#div_roll_height,#div_cost_inch,.div_roll_width').addClass('bubble_cat');
		$('#row_of_rate').removeClass('bubble_cat');
		$('.div_text_gsm,.only_print_inch').addClass('print_paper');
		
		$('.pack_category').show();
		$('.print_paper,.frame_category,.mount_category,.ink_catagory').hide();
		$('.select_vendor').show();
		}if(values=='b' || values=='c' || values=='d'){
		$('#lbl_name').html('Box Size:');
		$('#lbl_rate').html('Box Qty:');
		$('#print_papper,.vendor,.row_for_comman,#div_roll_height,#div_cost_inch').removeClass('bubble_cat');
		$('#print_papper,.vendor,.row_for_comman').addClass('corrugated_5ply');
		$('.div_roll_width,.div_text_gsm').addClass('print_paper');
		$('.pack_category').show();
		$('.print_paper,.frame_category,.mount_category,.ink_catagory').hide();
		$('.select_vendor').show();
		}
        $('#add_new_vendor').val(values);
        
		
		$.ajax({
	        type:'post',
			url:'<?=base_url()?>index.php/backend/get_frame_vendor_details',
			data:'value='+values,
			success:function(response){
			//alert(response)
			$('#sel_ven_name').html(response);
			
			}
	});
		
		
        /*
        $.ajax({
           type:'post',
           url: '<?=base_url()?>index.php/backend/get_add_details',
           data:'values='+values,
           success:function(response){
		 //  alert(response)
              $('#name').html(response);
               
           }
           
       });
        
        */
        
        
    }
	
	
	
	
	
    $(document).on('click','#save',function(){
      
        var collection=$('#collection').val();
		 var category=$('#add_new_vendor').val();
        var frame_category=$('#category').val();
        var name=$('#name').val();
       //var roll=$('#roll').val();
	    var roll=$('#roll').val();
       var rate=$('#rate').val();
	   var quality=$('#quality').val();
	   var paper_type=$('#paper_type').val();
	   var dis_name=$('#dis_name').val();
	   
	   var unique_inv_id=$('#unique_inv_id').val();
	   var unique_ven_id=$('#unique_ven_id').val();
	   var vendor_name=$('#vendor_name').val();
	   var vendor_contact=$('#vendor_contact').val();
	   var vendor_dtls=$('#vendor_dtls').val();
	   var paper_type=$('#paper_type').val();
	   var star=$('#star').val();
	   var platinum=$('#platinum').val();
	   var gold=$('#gold').val();
	   var silver=$('#silver').val();
	   var mul_quality_rate=$('#star,#platinum,#gold,#silver').map(function(){
	   return this.value;
	   }).get().join(",");
	  //alert(mul_quality_rate);
	   
	   var unit_price=$('#unit_price').val();
	    var roll_width=$('#roll_width').val();
		var roll_height=$('#roll_height').val();
	   var roll_height_inch=$('#roll_height_inch').val();
	   var cost_per_inch=$('#cost_per_inch').val();
	   var only_print_price=$('#only_print_price').val();
	   var gsm=$('#gsm').val();
	   var thresold_qty=$('#thresold_qty').val();
	   var current_qty=$('#current_qty').val();
	
	   var frame_code=$('#frame_code').val();
	    var frame_color=$('#frame_color').val();
		 var frame_size=$('#frame_size').val();
		 var convert=(frame_size/25.4);
	     var frame_size_inch=Math.round(convert);
       var frame_name=$('#frame_name').val();
	   var frame=$('#frame').val();
	   var mount_code=$('#mount_code').val();
	   var mount_height=$('#mount_height').val();
	   var mount_width=$('#mount_width').val();
	   var tbl_update=$('#tbl_update').val();
	   var row_id_sec=$('#row_id_sec').val();
	   var used_qty=$('#used_qty').val();
	  var total_roll=$('#total_roll').val();
	  var stock_order=$('#stock_order').val();
	  var vendor_lead_time=$('#vendor_lead_time').val();
	  var vendor_c=$('#vendor_c').val();
	  var vendor_d=$('#vendor_d').val();
	  var web_print_price=$('#web_print_price').val();
	  var total_roll_hand=$('#total_roll_hand').val();
	  var paper_type_only=$('#paper_type_only').val();
	  //alert(paper_type_only);
       if(category=='1'){
           var url='collection='+collection+'&quality='+mul_quality_rate+'&category='+category+'&name='+name+'&rate='+mul_quality_rate+'&roll='+roll+'&paper_type='+paper_type+'&dis_name='+dis_name+'&unique_inv_id='+unique_inv_id+'&unique_ven_id='+unique_ven_id+'&vendor_name='+vendor_name+'&vendor_contact='+vendor_contact+'&vendor_dtls='+vendor_dtls+'&quality='+quality+'&unit_price='+unit_price+'&roll_width='+roll_width+'&roll_height_inch='+roll_height_inch+'&cost_per_inch='+cost_per_inch+'&only_print_price='+only_print_price+'&gsm='+gsm+'&thresold_qty='+thresold_qty+'&current_qty='+current_qty+'&tbl_update='+tbl_update+'&row_id_sec='+row_id_sec+'&roll_height='+roll_height+'&total_roll='+total_roll+'&vendor_lead_time='+vendor_lead_time+'&vendor_c='+vendor_c+'&vendor_d='+vendor_d+'&web_print_price='+web_print_price+'&total_roll_hand='+total_roll_hand+'&stock_order='+stock_order+'&tbl_edit='+tbl_edit+'&paper_type_only='+paper_type_only;
		 //  alert(url);
       }else{
        url='unique_inv_id='+unique_inv_id+'&unique_ven_id='+unique_ven_id+'&vendor_name='+vendor_name+'&vendor_contact='+vendor_contact+'&vendor_dtls='+vendor_dtls+'&category='+category+'&vendor_lead_time='+vendor_lead_time+'&vendor_c='+vendor_c+'&vendor_d='+vendor_d+'&name='+name+'&rate='+rate+'&frame_category='+frame_category+'&frame_name='+frame_name+'&frame_code='+frame_code+'&frame_color='+frame_color+'&frame_size='+frame_size+'&frame_size_inch='+frame_size_inch+'&frame='+frame+'&mount_code='+mount_code+'&mount_height='+mount_height+'&mount_width='+mount_width+'&unit_price='+unit_price+'&cost_running_fir='+gsm+'&thresold_qty='+thresold_qty+'&used_qty='+used_qty+'&current_qty='+current_qty+'&tbl_update='+tbl_update+'&row_id_sec='+row_id_sec+'&roll_width='+roll_width+'&roll_height_inch='+roll_height_inch+'&roll_height='+roll_height;
		//alert(frame_size_inch) 
       }
      // alert(url);
       $.ajax({
           type:'post',
           url: '<?=base_url()?>index.php/backend/save_category_details',
           data:url,
           success:function(response){
          if(response=='1'){
                   $('#success_result').html('Info add successfully');
				   location.reload();
               }else if(response=='0'){
                  $('#success_result').html('credential error');
               }else{
			   window.location.replace("<?=base_url()?>index.php/backend/manage_web_price/"+response);
			   }
              
           }
           
       });
       
    });
   
    //calculate the time before calling the function in window.onload
  var popupWindow;
    function newPopup(url) {
	//alert('saya')
	
        var category=$('#category').val();
		var frame=$('#frame').val();
		var f_name=$('#name').val();
		//alert(frame);
        popupWindow = window.open(url+'&category='+category+'&frame='+frame+'&f_name='+f_name,'popUpWindow','height=500,width=450,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    popupWindow.focus();
    }    

function filter_quality(values){
	 $('#show_old_quality').hide();
	 $('#quality_show').show();
	 $.ajax({
           type:'post',
           url:'<?=base_url()?>index.php/backend/get_quality',
           data:'collection='+values,
           success:function(response){
		    if(response!=''){
              
			  
			   $('#quality_show').html(response);
			    
              }
		   }
           
       });
	
	}

$(document).on("click","#check_existing_paper",function(){
if($(this).is(":checked")){
$('.checkforexistpaper').show();
$('.checkfornewpaper').hide();
$('.checkforexistpaper').children().attr('id','name');
$('.checkfornewpaper').children().attr('id','');
}else{
//alert('sorry')
$('.checkforexistpaper').hide();
$('.checkforexistpaper').children().attr('id','');
$('.checkfornewpaper').children().attr('id','name');
//$('#name').focus();
$('.checkfornewpaper').show();
}

});
    </script>
    
    
