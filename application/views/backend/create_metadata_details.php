<style>

textarea {
    padding: 6px;
    font-size: 15px;
    border-radius: 2px;
    border: 1px solid ;
    margin-top: 10px;
    height: 80px;
   
}

</style>

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> Add Metadata details</div>
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
	
	
     <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_frames"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      <form action="<?=base_url()?>index.php/backend/export_full_details_meta_data"  method="post" enctype="multipart/form-data">
          <input type="hidden" name="package_code" value="<?=$package_code?>">
          
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <!-- starts by sajid-->
		 <tr>
		
            <p style="color:red;" id="names"></p>
             <td>Customer Type<span style="color:#FF0000;">*</span></td>
            <td><select name="customer_type" id="customer_type"  onchange="return change_customer_type(this.value);" class="inputbxs">
                <option  value="" >Select</option>
                <option value="B2B">B2B</option>
                <option value="B2C">B2C</option>
                <option value="B2CP">B2CP</option>
               </select></td>
          </tr>
		 
		 <tr>
            
             <td>Company Name<span style="color:#FF0000;">*</span></td>
            <td><select name="company_name" id="company_name"  class="inputbxs">
                <option  value="" >--Select--</option>
                
               </select></td>
          </tr>
		   <tr>
            
             <td>Created By(Email Id)<span style="color:#FF0000;">*</span></td>
            <td><input type="text" name="email_id" id="email_id" class="inputbxs" /></td>
          </tr>
		  <tr>
            
             <td>Discount<span style="color:#FF0000;">*</span></td>
           
          </tr>
		  <tr>
            
             <td>print<span style="color:#FF0000;">*</span></td>
			  <td><input type="text" name="print_id" id="print_id" class="inputbxs" />&nbsp;Max Discount<span style="color:#FF0000;">&nbsp;(20)</span></td>
           
          </tr>
		  <tr id="request_discount" style="display:none">
            
             <td><p class="send_message" style="color:red">Exceeds Discount Limit</p></td>
			  <td ><label><input type="checkbox" id="send_request_for_print" class="send_request" value="send_request_for_print"> Send Request</label></td>
           <!-- saaj -->
          </tr>
		   <tr>
            
             <td>Frame<span style="color:#FF0000;">*</span></td>
			  <td><input type="text" name="frame_id" id="frame_id" class="inputbxs" />&nbsp;Max Discount<span style="color:#FF0000;">&nbsp;(40)</span></td>
           
          </tr>
		  <tr id="request_discount_frame_div" style="display:none">
            
             <td><p class="send_message" style="color:red">Exceeds Discount Limit</p></td>
			  <td ><label><input type="checkbox" id="send_request_for_frame" class="send_request" value="send_request_for_frame"> Send Request</label></td>
           <!-- saaj -->
          </tr>
		  <tr>
            
             <td>Mount & Glass<span style="color:#FF0000;">*</span></td>
			  <td><input type="text" name="m_g_id" id="m_g_id" class="inputbxs" />&nbsp;Max Discount<span style="color:#FF0000;">&nbsp;(40)</span></td>
           
          </tr>
		  <tr id="request_discount_m_g_id_div" style="display:none">
            
             <td><p class="send_message" style="color:red">Exceeds Discount Limit</p></td>
			  <td ><label><input type="checkbox" id="send_request_for_frame" class="send_request" value="send_request_for_mount_glass"> Send Request</label></td>
           <!-- saaj -->
          </tr>
		   <tr>
            
             <td>Packeging<span style="color:#FF0000;">*</span></td>
			  <td><input type="text" name="packeging_id" id="packeging_id" class="inputbxs" />&nbsp;Max Discount<span style="color:#FF0000;">&nbsp;(40)</span></td>
           
          </tr>
		  <tr id="request_discount_packeging_div" style="display:none">
            
             <td><p class="send_message" style="color:red">Exceeds Discount Limit</p></td>
			  <td ><label><input type="checkbox" id="send_request_for_frame" class="send_request" value="send_request_for_packeging"> Send Request</label></td>
           <!-- saaj -->
          </tr>
		  <tr>
            
             <td>Shipping<span style="color:#FF0000;">*</span></td>
			  <td><input type="text" name="shipping_id" id="shipping_id" class="inputbxs" />&nbsp;Max Discount<span style="color:#FF0000;">&nbsp;(40)</span></td>
           
          </tr>
		  <tr id="request_discount_shipping_div" style="display:none">
            
             <td><p class="send_message" style="color:red">Exceeds Discount Limit</p></td>
			  <td ><label><input type="checkbox" id="send_request_for_frame" class="send_request" value="send_request_for_shipping"> Send Request</label></td>
           <!-- saaj -->
          </tr>
		  <tr>
            
             <td>Gallary Name<span style="color:#FF0000;">*</span></td>
			  <td><select name="gallary_name[]" multiple id="gallary_name"  size="10" onchange="return change_gallary_name(this.value);" class="inputbxs form-control">
                <option  value="" >--Select--</option>
                 <?php 
				
		   $images_name=$this->backend_model->get_all_lightboxes();
		 
		       //print_r($images_name); 
				 foreach ($images_name as $values):
				
				 ?>
                              <option value="<?=$values->lightbox_id;?>"><?=$values->lightbox_name;?></option>
                              <?php endforeach;?>
               </select>
			  
			   </td>
           
          </tr>
		  <tr>
            
             <td>Generated Image Id</a></td>
			  
		<!----------------------------------Sign up---------------------------------->
		      
						<td class="inputbxs" >
						
						<textarea rows="8" cols="27" required id="show_images_id" name="message" ></textarea>
						
						<input type="hidden" id="lightbox_id" name="lightbox_id">
						
						
						
						</td>
					
				
           
          </tr>
		   <tr>
            
            <td>Product Width<span style="color:#FF0000;">*</span></td>
            <td><select name="product_size" id="product_size"  onchange="return change_product_size(this.value);" class="inputbxs">
                <option  value="" >Select</option>
                <option value="10">10</option>
                <option value="12">12</option>
                <option value="18">18</option>
				 <option value="24">24</option>
               </select></td>
           
          </tr>
		   <tr>
            
            <td>Product Type<span style="color:#FF0000;">*</span></td>
            <td><select name="product_type" onchange="return change_product_type(this.value);" id="product_name"  class="inputbxs">
                <option  value="" >Select</option>
                <option value="1">Framed with Glass</option>
                <option value="2">Framed without Glass</option>
                <option value="3">Canvas Gallery wrap</option>
               </select></td>
          </tr>
		  
		 <!--  <tr id="depend_glass" style="display:none">
            <td width="44%">Category Type</td>
            <td width="56%"><select name="category_with_glass" id="category" onchange="return change_values(this.value);" style="width:243px; height:33px;" class="inputbxs">
            <option value="">--Select--</option>
            <option value="1">Printing paper type</option>
                <option value="2">Frame</option>
                <option value="3">Glass</option>
                <option value="4">Mount</option>
              </select>
            </td>
          </tr>-->
		  <tr id="cat_typ_print_div" style="display:none">
            <td width="44%">Category Name</td>
            <td><input type="text" value="Printing" name="cat_typ_print" readonly id="cat_typ_print" class="inputbxs" />
          </tr>
		  <tr style="display:none" id="print_paper_name_div">
            <td><span id="lbl_name">Paper Name</span></td>
                    <td><select name="print_paper_name" id="print_paper_name" onchange="return change_paper_name(this.value);" class="inputbxs">
                            <option value="">--Select--</option>
							<?php 
							foreach ($paper_name as $value):?>
                              <option value="<?=$value->print_paper;?>"><?=$value->print_paper;?></option>
                              <?php endforeach;?>
                        </select> 
                       </td>
          </tr>
          <tr style="display:none" class="toptr print_paper">
              <td><span >Quality</span></td>
                      
			
			 <td > <select name="quality" id="quality" onchange="return get_quality_change(this.value);" class="inputbxs" >
                               
                              <?php foreach ($dis_quality as $values):?>
                              <option value="<?=$values->quality;?>"><?=$values->quality;?></option>
                              <?php endforeach;?>
                  </select></td>
          </tr>
		  <tr id="cat_typ_rate_div" style="display:none" class="toptr">
              <td><span id="">Printing papper Rate</span></td>
            <td><input type="text" name="print_typ_rate" id="print_typ_rate" class="inputbxs" />
             </td>
          </tr>
		  <tr id="cat_typ_farme_div"style="display:none">
            <td width="44%">Category Name</td>
            <td><input type="text" value="Frame Type" name="cat_typ_farme" readonly id="cat_typ_farme" class="inputbxs" />
          </tr>
          <tr class="frame_type_div" style="display:none">
        <td > Frame Type:</td>
        <td><select name="frame" id="frame" class="inputbxs"  onchange="return get_frame_category(this.value);">
                        <option value="">--Select--</option>
                        <option value="1">Synthetic frames</option>
                         <option value="1">Wooden frames</option>
                          <option value="3">Streched Canvas Gallery Wrap</option>
            </select></td>
      </tr>
<tr style="display:none" class="frame_cat_div"><td><span >Frame Category</span></td>
              <td><select name="frame_category" id="frame_category" class="inputbxs" onchange="return get_frame_name(this.value);">
                      <option value="">--Select--</option>
                  </select> </td></tr>
      
         

             
          
          
         <!-- <tr class="toptr ">
              <td><span >Roll Size</span></td>
                      <td><select name="roll" id="roll" class="inputbxs" >
                               <option value="">---Select Roll Size---</option>
                              <?php foreach ($roll as $values):?>
                              <option value="<?=$values->roll;?>"><?=$values->roll;?></option>
                              <?php endforeach;?>
                  </select>
                          <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/add_details?action=roll');" >Add Roll</a>
             </td>
          </tr>  
          
        -->  
         
          
          
          
          
          
          <tr style="display:none" class="frame_name_div">
              <td><span >Frame Name</span></td>
            <td>
                <select name="frame_name" id="frame_name" onchange="return get_frame_name_change(this.value);" class="inputbxs" >
                               <option value="">---Frame Name---</option>
                              
                  </select>
                 
             </td>
          </tr>
           
          
          <tr style="display:none" id="frame_rate_div" class="toptr">
              <td><span id="">Frame Rate</span></td>
            <td><input type="text" name="frame_rate" id="frame_rate" class="inputbxs" />
             </td>
          </tr>
		  <tr align="left" style="display:none" id="cat_typ_glass_div">
            <td width="44%">Category Name</td>
            <td><input type="text" value="Glass" name="cat_typ_glass_name" readonly id="cat_typ_glass_name" class="inputbxs" />
          </tr>
          <tr align="left" style="display:none" id="glass_name_div">
            <td width="44%">Glass Name</td>
            <td><select name="glass_name" id="glass_name" onchange="return get_glass_name_change(this.value);" class="inputbxs">
			<option value="">--Select--</option>
			 <?php foreach ($glass_name as $values):?>
                              <option value="<?=$values->glass;?>"><?=$values->glass;?></option>
                              <?php endforeach;?>
			</select>
			</td>
          </tr>
		  <tr style="display:none" id="glass_rate_div" class="toptr">
              <td><span >Glass Rate</span></td>
            <td><input type="text" name="glass_rate" id="glass_rate" class="inputbxs" />
             </td>
          </tr>
		  <tr style="display:none" align="left" id="cat_typ_mount_div">
            <td width="44%">Category Name</td>
            <td><input type="text" value="Mount" name="cat_typ_mount_name" readonly id="cat_typ_mount_name" class="inputbxs" />
          </tr>
		  <tr style="display:none"align="left" id="mount_name_div">
            <td width="44%">Mount Name</td>
            <td><select name="mount_name" id="mount_name" onchange="return get_mount_name_change(this.value);" class="inputbxs">
			<option value="">--Select--</option>
			 <?php foreach ($mounr_name as $values):?>
                              <option value="<?=$values->mount;?>"><?=$values->mount;?></option>
                              <?php endforeach;?>
			
			</select>
			</td>
          </tr>
		  <tr  style="display:none"id="mount_size_div"  class="toptr">
              <td><span>Mount Size</span></td>
            <td><input type="text" name="mount_size" id="mount_size" class="inputbxs" />
             </td>
          </tr>
		  <tr  style="display:none" id="mount_rate_div" class="toptr">
              <td><span >Mount Rate</span></td>
            <td><input type="text" name="mount_rate" id="mount_rate" class="inputbxs" />
             </td>
          </tr>
          <tr class="toptr">
              <td></td>
              <td><button class="bt-sbt-upload" />SAVE<button>
             </td>
          </tr>
        
       </table>      
        </form>
       
          
           
          <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
<!--MIDDLE PAGE WRAPPER ENDS-->

<script>
function change_product_type(values){
       //alert(values); 
	   if(values=='2' || values=='3' ){
$('#glass_rate_div').show();
 $('#print_paper_name_div').show();
 $('.print_paper').show();
 $('#cat_typ_rate_div').show();
 $('#cat_typ_farme_div').show();
	$('.frame_type_div').show();
	$('.frame_cat_div').show();
 $('#print_papper').show();
	 $('.frame_name_div').show();
	$('#frame_rate_div').show();
	$('#cat_typ_print_div').show();
	$('#cat_typ_glass_div').show();
 $('#glass_name_div').show();
 $('#glass_rate_div').show();
 $('#cat_typ_mount_div').show();
 $('#mount_name_div').show();
 $('#mount_size_div').show();
 $('#mount_rate_div').show();



 $('#cat_typ_glass_div').hide();
 $('#glass_name_div').hide();
 $('#glass_rate_div').hide();
 $('#cat_typ_mount_div').hide();
 $('#mount_name_div').hide();
 $('#mount_size_div').hide();
 $('#mount_rate_div').hide();
 
 
  $('#cat_typ_print_div').show();
 $('#mount_name_div').hide();
 $('#mount_size_div').hide();
 $('#mount_rate_div').hide();
 
	}
	//saaj
	else if(values=='1'){ 
	$('#glass_rate_div').show();
 $('#print_paper_name_div').show();
 $('.print_paper').show();
 $('#cat_typ_rate_div').show();
 $('#cat_typ_farme_div').show();
	$('.frame_type_div').show();
	$('.frame_cat_div').show();
 $('#print_papper').show();
	 $('.frame_name_div').show();
	$('#frame_rate_div').show();
	$('#cat_typ_print_div').show();
	$('#cat_typ_glass_div').show();
 $('#glass_name_div').show();
 $('#glass_rate_div').show();
 $('#cat_typ_mount_div').show();
 $('#mount_name_div').show();
 $('#mount_size_div').show();
 $('#mount_rate_div').show();
	
	}

        
    }

     function change_allary_name(lightbox_id)
{

var str='';
for (i=0;i<gallary_name.length;i++) { 
if(gallary_name[i].selected){
str +="'"+gallary_name[i].value +"',"; 
}
} 
document.getElementById("show_images_id").innerHTML=str;

} 
function get_glass_name_change(values){
         //alert(values);
        $.ajax({
           type:'post',
           url: 'get_glass_name_change',
           data:'values='+values,
           success:function(response){
		   //alert(response);
              $('#glass_rate').val(response);
               
           }
           
       });
        
    }
	function get_mount_name_change(values){
         //alert(values);
        $.ajax({
           type:'post',
           url: 'get_mount_rate',
           data:'values='+values,
           success:function(response){
		   //alert(response);
              $('#mount_rate').val(response);
               
           }
           
       });
        
    }
function get_frame_name(values){
         
        $.ajax({
           type:'post',
           url: 'get_frame_name_details',
           data:'values='+values,
           success:function(response){
              $('#frame_name').html(response);
               
           }
           
       });
        
    }
	function change_paper_name(values){
	var quality=$('#quality').val();
        // alert(values);
		// alert(quality);
		 //alert(frame_category);
        $.ajax({
           type:'post',
           url: 'get_tbl_customer_rate',
           data:'values='+values+'&quality='+quality,
           success:function(response){
		  // alert(response);
              $('#print_typ_rate').val(response);
               
           }
           
       });
	   }
	   function get_quality_change(values){
var quality=$('#print_paper_name').val();
//alert(get_tbl_customer_ratequality_name_val);
       //alert(values); 
        
        
        
        $.ajax({
           type:'post',
           url: 'get_tbl_customer_rate',
           data:'quality='+values+'&values='+quality,
           success:function(response){
		  // alert(response);
              $('#print_typ_rate').val(response);
               
           }
           
       });
        
        
        
        
    }
	function get_frame_name_change(values){
	var frame_category=$('#frame_category').val();
       //  alert(values);
		 //alert(frame_category);
        $.ajax({
           type:'post',
           url: 'get_frame_cost_detials',
           data:'values='+values+'&frame_category='+frame_category,
           success:function(response){
		  // alert(response);
              $('#frame_rate').val(response);
               
           }
           
       });
	   }
function get_frame_category(values){
         
        $.ajax({
           type:'post',
           url: 'get_frame_category_details',
           data:'values='+values,
           success:function(response){
		   //alert(response);
              $('#frame_category').html(response);
               
           }
           
       });
        
    }

function get_lbl_name(values){
var quality_val=$('#quality').val();
var name_val=$('#name').val();
var category=$('#category').val();
//alert(name_val);
       //alert(category); 
	   //
        
        //alert(values);
        
        $.ajax({
           type:'post',
           url: 'get_tbl_customer_rate',
           data:'quality_val='+quality_val+'&values='+values+'&name_val='+name_val+'&category='+category,
           success:function(response){
		  // alert(response);
              $('#rate').val(response);
               
           }
           
       });
    
        
    }


        
        function change_gallary_name(lightbox_id)
{
 // alert(lightbox_id);
var str='';
for (i=0;i<gallary_name.length;i++) { 
if(gallary_name[i].selected){
str +="'"+gallary_name[i].value +"',"; 
}

}
// alert(str);

// var fileName_id=document.getElementsName('gallary_name');
  
      // alert(str);
  $.ajax({
             type:"POST",
	     url:"<?php echo base_url();?>index.php/backend/Get_metadata_generate_details",
             data:"light_box_id="+str,
             success:function(data)  
             {    
                // alert(data);
                 
                 document.getElementById('show_images_id').value=data;
                  //$('#show_images_id').append(data);
              }
          });
          
       
	}

     /* function change_values(values){
       //alert(values);
       if(values='1'){
           $('#lbl_name').html('Printing papper Name'); 
           $('#lbl_rate').html('Printing papper Rate'); 
           $('.print_paper').show();
           $('.frame_category').hide();
		   $('#mount_size_div').hide();
           //$('#lbl').html('Add Print Paper');
           
        }
        
        if(values=='2'){
          // $('#lbl').html('Add Frame');
           $('#lbl_name').html('Frame Type'); 
           $('#lbl_rate').html('Frame Rate'); 
           $('.print_paper').hide();
           $('.frame_category').show();
           $('#print_papper').hide();
		   $('#mount_size_div').hide();
        }
        if(values=='3'){
		//alert(values);
            //$('#lbl').html('Add Glass');
           $('#lbl_name').html('Glass Name'); 
           $('#lbl_rate').html('Glass Rate'); 
           $('.print_paper').hide();
		   $('#print_papper').show();
            $('.frame_category').hide();
			$('#mount_size_div').hide();
        }
		if(values=='4'){
		//alert(values);
           // $('#lbl').html('Add Mount');
           $('#lbl_name').html('Mount Name'); 
           $('#lbl_rate').html('Mount Rate'); 
           $('.print_paper').hide();
		   $('#print_papper').show();
		    $('#mount_size_div').show();
           $('.frame_category').hide();
        }
        
        
        
        $.ajax({
           type:'post',
           url: 'get_metadata_details',
           data:'values='+values,
           success:function(response){
		   alert(response);
              $('#name').html(response);
               
           }
           
       });
        
        
        
        
    }  
        
     */   
   

//$(document).ready(function(){saaj
$('#print_id').keyup(function(){
 
  var print_id_val=$('#print_id').val();
   // alert(print_id_val);
   if(print_id_val>20){
   $('#request_discount').show();
   //alert('this is greater'); 
   
   }
   
	});
	$('#frame_id').keyup(function(){
 
  var frame_id_val=$('#frame_id').val();
    //alert(frame_id_val);
   if(frame_id_val>40){
   $('#request_discount_frame_div').show();
   //alert('this is greater'); 
   
   }
   
	});
	$('#m_g_id').keyup(function(){
 
  var m_g_id_val=$('#m_g_id').val();
   // alert(m_g_id_val);
   if(m_g_id_val>40){
   $('#request_discount_m_g_id_div').show();
   //alert('this is greater'); 
   
   }
   
	});
	$('#packeging_id').keyup(function(){
 
  var frame_id_val=$('#packeging_id').val();
    //alert(frame_id_val);
   if(frame_id_val>40){
   $('#request_discount_packeging_div').show();
   //alert('this is greater'); 
   
   }
   
	});
	$('#shipping_id').keyup(function(){
 
  var frame_id_val=$('#shipping_id').val();
    //alert(frame_id_val);
   if(frame_id_val>40){
   $('#request_discount_shipping_div').show();
   //alert('this is greater'); 
   
   }
   
	});
	
	
	$(document).on('click','.send_request',function(){
	
	$("input:checkbox[class=send_request]:checked").each(function () {

    var discount=($(this).val());
	//var send_request_for_print=$('.send_request').val();
	
	var request_email_id=$('#email_id').val();
	var request_print_max=$('#print_id').val();
	
	$.ajax({
           type:'post',
           url: 'send_request_to_admin',
           data:'request_email_id='+request_email_id+'&print_max='+request_print_max+'&print_type_value='+discount,
           success:function(response){
			   
			  // $('#name').html(response);
			  //alert(response);
			  if(response=='send_request_for_print'){
            $("#request_discount").children().eq(1).css({"color": "red"}).html('Request Sent for Print Successfully');
						   $('.send_request').prop('checked', false);
			   }
			   if(response=='send_request_for_frame'){
			  $('#request_discount_frame_div').show();
            $("#request_discount_frame_div").children().eq(1).css({"color": "red"}).html('Request Sent For Frame Successfully');
			   $('.send_request').prop('checked', false);
			   }
			   if(response=='send_request_for_mount_glass'){
            $("#request_discount_m_g_id_div").children().eq(1).css({"color": "red"}).html('Request Sent For M & G Successfully');
			   $('.send_request').prop('checked', false);
			   }
			   
			   if(response=='send_request_for_packeging'){
            $("#request_discount_packeging_div").children().eq(1).css({"color": "red"}).html('Request Sent for Packeging Successfully');
			   $('.send_request').prop('checked', false);
			   }
			   if(response=='send_request_for_shipping'){
            $("#request_discount_shipping_div").children().eq(1).css({"color": "red"}).html('Request Sent For shipping Successfully');
			   $('.send_request').prop('checked', false);
			   }
           }
		              
       });
	});

});
	
function change_customer_type(values){
       //alert(values);change_product_type 
        
        
        
        $.ajax({
           type:'post',
           url: 'get_tbl_customer_by_type',
           data:'values='+values,
           success:function(response){
              $('#company_name').html(response);
               
           }
           
       });
        
        
        
        
    }


    </script>
    
    
