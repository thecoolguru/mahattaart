<?php
$status_courier=$this->backend_model->status_courier($_REQUEST['order_id']);
?>
<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit / Update Order - Printing</title>
<script type="text/javascript">        function get_printer_name(id)        {            if(id)            {                var datastring='id=' +id;                              $.ajax({                    url:"<?=base_url()?>index.php/orders/get_printer",                    type: "POST",                    data:datastring,                    success: function(data)                    {                        $('#printer_name').html(data);                    }                });            }        }                           $(document).ready(function(){   
$('#default_printer').show();
   
$('#printer').hide();  

   
var print_type=document.getElementsByName('type')[0].value; 
   
  if(print_type=='1'){
  $('#company').hide();
   $('#company2').show();
  }else if(print_type=='2'){
  $('#company').show();
  $('#company2').hide();
  }
  
 });         
function change_services(values) {     if(values=='material')     {      $('#default_printer').show();      $('#printer').hide();        }else if(values=='services')     {      $('#default_printer').hide();      $('#printer').show();        } }function update_courier_details22()        {                
if ($("#online").is(":checked")) {    
var print_type=document.getElementsByName('type')[0].value;    }    if ($("#offline").is(":checked")) {    var print_type=document.getElementsByName('type')[1].value;    }  var edit_id=$('#edit_id').val();  var order_id=$('#order_id').val();     var company=$('#company').val();    if(company=='')    {       var company=$('#company2').val();     }else{        company=$('#company').val();     } 
var delivery_mode=$('#delivery_mode').val();
 var total_courier=$('#total_courier').val();  
 var ship_date=$('#ship_date').val(); 
 var tracking_id=$('#tracking_id').val();  var order_detail=$('#order_detail').val();  var delivery_place=$('#delivery_place').val();     var dispatch_date=$('#dispatch_date').val();     var completion_date=$('#completion_date').val();      var quality_check=$('#quality_check').val();      var quality_checker_name=$('#quality_checker_name').val();      var person_incharge=$('#person_incharge').val();       var datastring='ship_date='+ship_date+'&type='+print_type+'&edit_id='+edit_id+'&order_id='+order_id+'&company='+company+'&total_courier='+total_courier+'&tracking_id='+tracking_id+'&order_detail='+order_detail+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&delivery_place='+delivery_place+'&dispatch_date='+dispatch_date;                $.ajax({                    url:"<?=base_url()?>index.php/backend/update_courier_order_details",                    type: "POST",                    data:datastring,                    success: function(response)                    {                                           $('#status').html(response);                     setTimeout(function(){ reload();}, 3000);                    }                });        }  
     


function sendmail_while_save(){
	  //alert();
   var couriormail=$('#courioursaveem').val(); 
   var tracking_id=$('#tracking_id').val();
      var customer_type=$('#customer_type').val();
//alert(customer_type);
if($('#courioursaveem').val()=='')
        {
            $('#error_msg').html('Please enter mail id');
        }else{
           $('#error_msg').html(''); 
        
        
         $.ajax({
            type:"post",
           url:"<?=base_url()?>index.php/backend/sendmail_while_save",
             data:"couriormail="+couriormail+'&tracking_id='+tracking_id+'&customer_type='+customer_type,
             success:function(response){
                $('#error_msg').html(response); 
             }
         });
         }
	
	}
function save_courier_details()        {  
   if ($("#online").is(":checked")) {  
     var print_type=document.getElementsByName('type')[0].value; 
	    }    if ($("#offline").is(":checked")) {  
		  var print_type=document.getElementsByName('type')[1].value;   
		   }  var order_id=$('#order_id').val();   
		     var company=$('#company').val();  
			   if(company=='')    {   
			       var company=$('#company2').val();  
				      }else{        company=$('#company').val(); 
					      }  var total_courier=$('#total_courier').val();
						    // var tracking_id=$('#tracking_id').val(); 
							 var tracking_id=document.getElementsByName('tracking_id[]').value;
							 var tracking_id = $('input[name="tracking_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
				// var generate_tracking=document.getElementsByName('generate_tracking[]').value;
							 var generate_tracking = $('input[name="generate_tracking[]"]').map(function(){ 
                    return this.value; 
                }).get();
				var sub_sr_trk=$('input[name="sub_sr_trk[]"]').map(function(){ 
                    return this.value; 
                }).get();
				// var generate_tracking = $('input[name="generate_tracking[]"]');
				
							//alert(tracking_id);
							  var order_detail=$('#order_detail').val(); 
							   var ship_date=$('#ship_date').val(); 
 
  var delivery_place=$('#delivery_place').val(); 
  var delivery_mode=$('#delivery_mode').val();
      var dispatch_date=$('#ship_date').val();   
	  //alert(dispatch_date);
	  //var generate_tracking=$('#generate_tracking').val();
	 // alert(generate_tracking)
	    var completion_date=$('#completion_date').val(); 
		    var quality_check=$('#quality_check').val();      var quality_checker_name=$('#quality_checker_name').val();      var person_incharge=$('#person_incharge').val();       
			
			//alert(tracking_id)
			var datastring='ship_date='+ship_date+'&delivery_mode='+delivery_mode+'&delivery_mode='+delivery_mode+'&type='+print_type+'&order_id='+order_id+'&company='+company+'&total_courier='+total_courier+'&tracking_id='+tracking_id+'&order_detail='+order_detail+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&delivery_place='+delivery_place+'&dispatch_date='+dispatch_date+'&generate_tracking='+generate_tracking+'&sub_sr_trk='+sub_sr_trk;                $.ajax({                    url:"<?=base_url()?>index.php/backend/save_courier_order_details",                    type: "POST",                    data:datastring,                    success: function(response)  { 
	  
	  alert(response);
	   $('#status').html(response);                     setTimeout(function(){ reload();}, 3000);                    }                });        }                        function reload() {    location.reload();}    
	  
	  
	  function update_courier_details()        {  
   if ($("#online").is(":checked")) {  
     var print_type=document.getElementsByName('type')[0].value; 
	    }    if ($("#offline").is(":checked")) {  
		  var print_type=document.getElementsByName('type')[1].value;   
		   }  var order_id=$('#order_id').val();   
		     var company=$('#company').val();  
			   if(company=='')    {   
			       var company=$('#company2').val();  
				      }else{        company=$('#company').val(); 
					      }  var total_courier=$('#total_courier').val();
						     var tracking_id=$('#tracking_id').val(); 
							  var order_detail=$('#order_detail').val(); 
							   var ship_date=$('#ship_date').val(); 
							     var rts_date=$('#rts_date').val(); 
 
  var delivery_place=$('#delivery_place').val(); 
  var delivery_mode=$('#delivery_mode').val();
      var dispatch_date=$('#dispatch_date').val();     var completion_date=$('#completion_date').val();      var quality_check=$('#quality_check').val();      var quality_checker_name=$('#quality_checker_name').val();      var person_incharge=$('#person_incharge').val();       var datastring='rts_date='+rts_date+'&ship_date='+ship_date+'&delivery_mode='+delivery_mode+'&delivery_mode='+delivery_mode+'&type='+print_type+'&order_id='+order_id+'&company='+company+'&total_courier='+total_courier+'&tracking_id='+tracking_id+'&order_detail='+order_detail+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&delivery_place='+delivery_place+'&dispatch_date='+dispatch_date;                $.ajax({                    url:"<?=base_url()?>index.php/backend/save_courier_order_details",                    type: "POST",                    data:datastring,                    success: function(response)                    {                                           $('#status').html(response);                     setTimeout(function(){ reload();}, 3000);                    }                });        } 
	  
	  </script>
<style>                
.error{            color: #FB3A3A;    display: inline-block;        padding: 0;    text-align: left;    width: 220px;        }    
</style>
</head>
<body>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr-quotation"> Edit/Update Order</div>
	<br>
	 <a href="<?=base_url()?>index.php/backend/online_order"><button  class="bt-add">Close</button></a>  
    <?php 
	//$status_packager='1';
	 $status_packager=$this->backend_model->status_packager($_REQUEST['order_id']);
                     if($status_packager>0){
	?>
    <div id="quotationListDiv" class="manage-order" >
	
      <form name="update_printer_status"  novalidate="novalidate" id="update_printer_status" method="post" action="<?php echo base_url();?>index.php/orders/update_printer_status/<?php echo $ord->order_id?>">
        <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
          <tr  class="darktr">
            <td width="18%" class="bold">Order ID:</td>
            <?php foreach($order_details as $ord){?>
            <?}?>
            <td><?php echo $ord->order_id;?>
			
			<input type="hidden" id="customer_type" value="<?php echo $ord->customer_type;?>"></td>
              <input type="hidden" id="order_id" value="<?=$ord->order_id?>"></td>
          </tr>
          <tr style="border-bottom:none">
            <td colspan="2" ><div class="viewcplist-inner">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="hdrs">
                    <td>SR No.</td>
                    <td width="150">Images Id</td>
                    <td>Name</td>
					<td>Quantity</td>
                    <td>Region</td>
                    <td>Status</td>
                    <td>Time Alloted</td>
                  </tr>
                  <?php $i=1; foreach($order_details as $ord){                                     $status_courier=$this->backend_model->status_courier($ord->order_id); $data_split= split('/',$ord->image_id);                    if($data_split[0]=='images')                    {                   $fileName=$data_split[2];                        $image_url=base_url().$ord->image_id;                    }else {                         $fileName=$ord->image_id;                        $image_url="http://static.mahattaart.com/398/".$ord->image_id."";  
				                    }                                  
									
							
									?>
				  
                  <tr>
                    <td><?=$i.'.';?></td>
                    <td><b><?php echo $fileName;?></b><br>
                      <span class="thumbtd"><img src="<?php echo $image_url;?>" width="107" height="107" alt="art"/><br />
                      </span></td>
                    <td><?php echo ucwords($ord->first_name).' '.ucwords($ord->last_name);?></td>
					<td><?php echo $ord->quantity;?></td>
                    <td><?php echo $ord->region;?></td>
					                    <td><?php if($status_courier==0){ echo 'Pending';}elseif($status_courier>0){ echo 'Finished';}?></td>
                    <td><?php                      $time_allow= $this->backend_model->get_packager_allowed_time($_REQUEST['order_id']);                   
                    $db_split=split(' ',$time_allow[0]->completion_date);                           
                    $date=split('-',$db_split[0]);                                 
                    $time= $date[2]+1;                           
                    echo   $date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];                                                    
                    $alloweted_date=$date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];                             $system_date=date('Y-m-d h:t');                            $time_allow= strtotime($alloweted_date);                            $time_system= strtotime($system_date);                            $to='courier@mahattaart.com';                             if($time_allow<=$time_system && $status_framer==0)                             {                               $this->backend_model->sendmail('Courier',$to);                               }                                                 ?></td>
                  </tr>
                  <? $i++; }
                  $printer=$this->backend_model->get_courier_jobsheet_details($ord->order_id);
				  
				 // print_r($printer); 
                  ?>
                </table>
                    
                <table style="width:100%">
                  <tr>
                    <td class="bold">Order Id </td>
                    <td class="bold"> Company Name</td>
					
					
					
                    <td class="bold">Tracking Id</td> 
					
					
					
                    <td class="bold">No Of Courier</td>
                    <td class="bold">Order Status</td>
                    <td class="bold">Delivery Mode</td>
                   
                    <td class="bold"> Ready To ship Date</td>
                  
                    <td class="bold">Dispatch Date</td>
                    <td class="bold">Completion Date</td>
                    <td class="bold"> Check Status </td>
                    <td class="bold"> Person Incharge</td>
                  </tr>
                  <?php                           foreach($printer as $result):                               ?>
                  <tr>
                    <td><?=$result->order_id;?>
                    </td>
                    <td><?=$result->courier_company_name;?></td>
                    <td><?=$result->tracking_id;?></td>
                    <td><?=$result->total_courier;?></td>
                    <td><? if($result->order_detail==1){ echo 'Ready To Ship';}else if($result->order_detail==2){ echo 'Shipped';}?></td>
                    <td><? if($result->delivery_mode==1){ echo 'Own';}else if($result->delivery_mode==2){ echo 'Channel Partner';}?></td>
                
                    <td><?php  
                        echo $result->rts_date;
                    ?></td>
                    <td><? if($result->dispatch_date==''){ echo 'N/A';}else{ echo $result->dispatch_date;}?></td>
                    <td><?=$result->create_date;?></td>
                    <td><?php if($result->quality_check=='1'){echo 'Yes';}elseif($result->quality_check=='0'){ echo 'No';} ?></td>
                    
                    <td><?=$result->person_incharge;?></td>
                  </tr>
                  <?php endforeach;?>
                </table>
                    <?php ?>
              </div></td>
          </tr>
          <div>
            <tr>
            
            <td colspan="2" style="padding:0;">
            <div class="quotation-div"  id="quotation2Div" style="margin-left:25px">
              <!--DETAILS TABLE-->
              <span id="status" style="color: green; font-size:14px; "></span>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="darktr">
                  <td ></td>
                  <td>OnLine 
                    <input <?php if($printer[0]->print_type==1){ echo 'checked';}elseif($printer[0]->print_type==''){ echo 'checked';}?> type="radio" data-id="1" name="type" id="online" class="type" value="1">
                    &nbsp;Off Line
                    <input type="radio" data-id="2"  id="offline" name="type" <?php if($printer[0]->print_type==2){ echo 'checked';}?> class="type" value="2">
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="darktr">
                  <td width="120" class="bold">Courier Company</td>
                  <td width="250"><input  type="text"  value="<?=$printer[0]->courier_company_name?>" name="company" <?php if($printer[0]->courier_company_name<>''){ echo 'readonly';}?> id="company2" class="txtClass offline">
                    <select name="company" class="online" id="company"  onchange="get_printer_name(this.value);">
                      <option value="">---Select Courier---</option>
                      <?php foreach($courier as $print){?>
                      <option value="<?php echo $print->company_name;?>"><?php echo $print->company_name;?></option>
                      <?}?>
                    </select></td>
                  <td width="120">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class="darktr">
                  <td class="bold">Total Courier</td>
                  <td ><input type="text"  readonly="" value="<?php echo count($order_details);?>" class="txtClass"  name="total_courier" id="total_courier"></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
				
				<?php 
				
				
				$printer_ord=$this->backend_model->get_courier_jobsheet_details($ord->order_id);
				$index=0;
				$j=1; foreach($order_details as $ord){
				
				//echo $index;
				//echo $j;
     //$printer=$this->backend_model->get_courier_jobsheet_details($_REQUEST['order_id']);
			//	print_r($printer_ord);
 if($j%2==0){  $classColor='#FF9966';}else{    $classColor='#66CC00';}
                  // print_r($ord->quantity);
				  
					for($x=1;$x<=$ord->quantity;$x++){
					//$yy=1;
					$start+=1;
				 	 $sr_id_for_track=$start-1;
					//$sub_sr_no=$
					//print_r($printer);
					?>
                <tr style="background-color:<?=$classColor;?>" >
				<span style=""><?php ?></span>
                  <td class="bold"><span style="margin-right:10px;"><?php echo $ord->sr_id.'.'.$x;?></span>Tracking Id
				  <input type="hidden" value="<?=$ord->sr_id;?>" id="generate_tracking" name="generate_tracking[]"/>
				  <input type="hidden" value="<?=$x;?>" id="sub_sr_trk" name="sub_sr_trk[]"/>
				  </td>
				 
                  <td ><input  value="<?=$printer[$sr_id_for_track]->tracking_id?>" type="text" class="txtClass"  name="tracking_id[]" id="tracking_id"></td>
				  
				  <td>
				  Surface:<?=$ord->surface;?><br>
				  Size:<?= $ord->image_size;?>,Frame Size:<?=$ord->frame_size_height;?><br>
				  Mount Color:<?=$ord->mount_color;?>,Mount Size:<?=$ord->mount_size_height;?><br>
				  Glass:<?=$ord->glass_name;?>
				  					  
				  </td>
                  <?php $data_split= split('/',$ord->image_id);

                    if($data_split[0]=='images')
                    {
                   $fileName=$data_split[2];
                        $image_url=base_url().$ord->image_id;
                    }else {
                         $fileName=$ord->image_id;
                         $image_url="http://static.mahattaart.com/398/".$ord->image_id."";
                    }?>
					
					<td><span class="thumbtd"><img src="<?php echo $image_url;?>" width="80" height="107" alt="art"/><br />
                      </span>
					  <span>SKU Id=&nbsp;<?=$ord->sku_id;?></span>
					  </td>
          
				  
					 
					
                  
                </tr>
				 <?php } 
				 
				 
				 $j++; $index++;}?>
                <tr class="darktr">
                  <td class="bold">Order Status</td>
                  <td ><select name="order_detail" id="order_detail" class="inputs" onChange="shipped_date(this.value);">
                      <option <?php if($printer[0]->order_detail==1){ echo 'selected';} ?> value="1">Ready To Ship</option>
                      <option <?php if($printer[0]->order_detail==2){ echo 'selected';} ?> value="2">Shipped</option>
                    </select></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
               <tr>
                  <td class="bold">Delivery Mode</td>
                  <td ><select name="delivery_mode" id="delivery_mode" class="inputs">
                      <option <?php if($printer[0]->delivery_mode==1){ echo 'selected';} ?> value="1">Own</option>
                      <option <?php if($printer[0]->delivery_mode==2){ echo 'selected';} ?> value="2">Channel Partner</option>
                    </select></td>
                  <input type="hidden" name="rts_date" id="rts_date" value="<?=$printer[0]->rts_date;?>">
                  <td ><span id="datelbl" class="bold">Ship Date</span></td>
                  <td><div id="datetimepicker" class="input-append date">
                         
                          <input style="height:20px;"  type="text" id="ship_date" value="<?=$printer[0]->rts_date;?>" name="ship_date">
                      </input>
                      <span class="add-on"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> </span> </div></td>
                </td>
                </tr>
                
                
                
                <tr class="darktr">
                  <td class="bold">Date</td>
                  <td><?=date('Y-m-d h:t')?></td>
                  <td class="bold">Completion Date</td>
                  <td><div id="datetimepicker2" class="input-append date">
                      <input style="height:20px;" value="<?=$printer[0]->create_date?>" <?php if($printer[0]->create_date<>''){ echo 'readonly';}?> type="text" name="completion_date" id="completion_date">
                      </input>
                      <span class="add-on"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> </span> </div></td>
                  </td>
                </tr>
                <tr class="darktr">
                  <td class="bold">QC</td>
                  <td><select name="quality_check" id="quality_check" class="inputs">
                      <option value="1" <?php if($printer[0]->quality_check==1){ echo 'selected';}?> >Yes</option>
                      <option value="0" <?php if($printer[0]->quality_check==0){ echo 'selected';}?>>No</option>
                    </select></td>
                  <td class="bold">QC done by</td>
                  <td><input id="quality_checker_name" <?php if($printer[0]->quality_checker_name<>''){ echo 'readonly';}?> value="<?=$printer[0]->quality_checker_name?>" type="text" name="quality_checker_name" /></td>
                </tr>
                <tr>
                  <td class="bold">Person Incharge</td>
                  <td><input type="text" id="person_incharge" <?php if($printer[0]->person_incharge<>''){ echo 'readonly';}?> value="<?=$printer[0]->person_incharge?>" name="person_incharge" >
                  </td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>
            </td>
            
            </tr>
            
          </div>
        </table>
        <div style="padding:30px; ">
          <?php if($printer[0]->order_detail==''){?>
         <input type="hidden"   name="addcpn" id="courioursaveem" value="sajid@mahatta.com" class="" />
          <input type="button" onClick="save_courier_details();sendmail_while_save();"  name="addcpn" id="addcpn" value="Save" class="bt-add" />
          
          <?php }if($printer[1]->order_detail=='' && $printer[0]->order_detail==1 || $this->session->userdata('userid')=='admin@mahattaart.com'){?>
          <input type="hidden" name="edit_id" id="edit_id" value="<?=$printer[0]->order_courier_status_id?>">
          <input type="button" onClick="return update_courier_details();" name="addcpn" id="addcpn" value="Update" class="bt-add" />
          <?php }?>
          <input type="button" name="addcpn2" id="addcpn2" value="Print" onClick="PrintElem('.viewcplist-inner')"   class="bt-add"/>
           <input type="hidden"   name="addcpn" id="courioursaveem" value="sajid@mahatta.com" class="" />
      
       
  <span id="error_msg" style="font-size:14px; color:red;"></span>
      
        </div>
      </form>

          
      <form name="download_pdf" action="<?=base_url()?>index.php/backend/dowload_courier_xsl" method="post">
        <input type="hidden" name="order_id" id="order_id" value="<?php echo $_REQUEST['order_id']?>">
        <input type="submit"  name="addcpn"  value="Download" class="bt-add" />
      </form>
    </div>
	
	<?php }elseif($status_packager==0){
						    echo '<span style="color:red; font-size:14px;">Pending with Packager Not allow</span>';
						?>
						
						<?php }?>
	
    <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
  </div>
</div>
<!--MIDDLE PAGE WRAPPER ENDS-->
</div>
</body>
</html><style>    
.txtClass{        width: 90px;        height: 30px;    }     
</style>
<script type="text/javascript" src="<?=base_url()?>assets/js2/jquery-1.6.1.min.js"></script>
<script>

function shipped_date(values)
  {
   if(values=='1'){
   
    $('#ship_date').show();
	$('#dispatch_date').hide();
	$('#datelbl').html('Ship Date');
   }else if(values=='2'){
   
    $('#dispatch_date').hide();
	$('#ship_date').show();
	$('#datelbl').html('Dispatch Date');
   }
  }


$(document).ready(function(){    <?php if($printer[0]->print_type==1){?>          $('.Online').show();      $('.offline').hide();      $('#printer').hide();    <?php }if($printer[0]->print_type==2){ ?>         $('.offline').show();        $('.Online').hide();    <?php }else{?>   $('.Online').show();      $('.offline').hide();      $('#printer').hide();    <?php }?>       });$(document).on('click','.type',function(){var val=$(this).data('id');   if(val=='1'){     $('.online').show();      $('.offline').hide();      $('#printer').hide();   }else if(val=='2'){     $('.offline').show();      $('.online').hide();   }});function PrintElem(elem)    {        Popup($(elem).html());    }    function Popup(data)    {        var mywindow = window.open('', 'viewcplist-inner', 'height=400,width=600');        mywindow.document.write('<html><head><title>Order Print</title>');               mywindow.document.write('</head><body >');        mywindow.document.write(data);        mywindow.document.write('</body></html>');        mywindow.document.close();         mywindow.focus();        mywindow.print();        mywindow.close();        return true;    }</script>
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen"
     href="<?=base_url()?>assets/css/bootstrap-datetimepicker.min.css">
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
<script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR'
      });
      
      $('#datetimepicker2').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR'
      });
      
    </script>
