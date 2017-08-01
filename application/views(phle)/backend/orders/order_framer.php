<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>assets/js2/jquery-1.6.1.min.js"></script>
<?php //print_r($order_details);?>
<script type="text/javascript">



        function get_printer_name(id)

        {

            if(id)

            {

                var datastring='id=' +id;

               

                $.ajax({

                    url:"<?=base_url()?>index.php/orders/get_printer",

                    type: "POST",

                    data:datastring,

                    success: function(data)

                    {

                        $('#printer_name').html(data);

                    }

                });

            }

        }
        
        
        
   $(document).ready(function(){
   $('#default_printer').show();
   $('#printer').hide();
   });
        
 function change_services(values)
 {
     if(values=='material')
     {
      $('#glasses_name').show();
      $('#mount_name').show();
      $('#default_printer').show();
      $('#printer').hide();   
      $('#mgb_name').hide();
      $('#mgb_height_width').hide();
      
      
     }else if(values=='services')
     {
      $('#mgb_name').show();
      $('#default_printer').hide();
      $('#glasses_name').hide();
      $('#mount_name').hide();
      $('#default_printer').hide();
      $('#printer').show();  
      
      
      
      
      $('#height_width').hide();
       $('#m_height_width').hide();
        $('#g_height_width').hide();
        $('#width').hide();
        
     }
 }
 
 
 
 
 function change_services1(values)
 {
     if(values=='1')
     {
      $('#glasses_name2').show();
      $('#mount_name2').show();
      
      $('#printer2').hide();   
      $('#mgb_name2').hide();
      $('#mgb_height_width2').hide();
      $('#framer_td').hide();
      
      
     }else if(values=='2')
     {
      $('#mgb_name2').show();
     
      $('#glasses_name2').hide();
      $('#mount_name2').hide();
     
      $('#printer2').show();  
      
      
      
      
      $('#height_width').hide();
       $('#m_height_width').hide();
        $('#g_height_width').hide();
        $('#width').hide();
        
     }
 }
 

$(document).ready(function(){
    
       $('#height_width').hide();
       $('#m_height_width').hide();
        $('#g_height_width').hide();
        $('#width').hide();
        $('#mgb_name').hide();
        $('#mgb_height_width').hide();
});


function display_mount_txt(values)
{
    if(values!='')
    {
         $('#m_height_width').show();
    }else if(values=='')
    {
         $('#m_height_width').hide();
    }
}


function display_glass_txt(values)
{
    if(values!='')
    {
         $('#g_height_width').show();
    }else if(values=='')
    {
         $('#g_height_width').hide();
    }
}

function display_mgb_txt(values)
{
    if(values!='')
    {
         $('#mgb_height_width').show();
    }else if(values=='')
    {
         $('#mgb_height_width').hide();
    }
}

function short_framer_rate(framer_name)
{
    if(framer_name!='')
    {
        $('#height_width').show();
        $('#width').show();
    }else  if(framer_name==''){
        $('#height_width').hide();
        $('#width').hide();
    }
    $.ajax({
        type:'post',
        url:'short_framer_rate',
        data:'framer_name='+framer_name,
        success:function(response)
        { $('#rate').html(response);
        
       
        }
    });
}





 function update_framer_details()

        {
            
  var order_id=$('#order_id').val();
  var edit_id=$('#edit_id').val();
  var rate=$('#rate').val();
   if(rate=='')
   {
      var rate=$('#rate2').val();   
   }else{
       
      var rate=$('#rate').val();     
   }
  if($('#default_printer').val()!=''){
  var default_printer=$('#default_printer').val();
  }

        
   if($('#printer').val()!=''){
  var printer=$('#printer').val();
  }else{
        printer=$('#printer2').val();
  }     
     
  var service=$('#service').val();
   var materials=$('#materials').val();
   
   if(service!='')
   {
       var framer_services=service
   }else if(materials!='')
   {
       framer_services=materials
   }
  var frame_name=$('#frame_name').val();
  
 if(frame_name!=''){
  var frame_name=$('#frame_name').val();
  }else{
        frame_name=$('#frame_name2').val();
  }    
  
  
  if($('#glasses_name').val()!=''){
  var glasses_name=$('#glasses_name').val();
  }else{
        glasses_name=$('#glasses_name2').val();
  }
  
  if($('#mgb_name').val()!=''){
  var mgb_name=$('#mgb_name').val();
  }else{
        mgb_name=$('#mgb_name2').val();
  } 
   if($('#mount_name').val()!=''){
  var mount_name=$('#mount_name').val();
  }else{
        mount_name=$('#mount_name2').val();
  } 
  
  
  if(frame_name!='')
  {
     var height=$('#height').val();
     var width=$('#width').val();
  }
  if(mount_name!='')
  {
     var m_height=$('#m_height').val();
     var m_width=$('#m_width').val();
  }
  if(glasses_name!='')
  {
     var g_height=$('#g_height').val();
     var g_width=$('#g_width').val();
  }
  if(mgb_name!='')
  {
     var mgb_height=$('#mgb_height').val();
     if(mgb_height=='undefined'){
         mgb_height='0';
     }
     var mgb_width=$('#mgb_width').val();
     if(mgb_width=='undefined'){
         mgb_width='0';
     }
  }else {
      
       var mgb_height=$('#mgb_height').val();
     if(mgb_height=='undefined'){
         mgb_height='0';
     }
     var mgb_width=$('#mgb_width').val();
     if(mgb_width=='undefined'){
         mgb_width='0';
     }
  }
  
   if ($("#online").is(":checked")) {
         var type=document.getElementsByName('type')[0].value;
     }

     if ($("#offline").is(":checked")) {
        var type=document.getElementsByName('type')[1].value;
     }

  var total_print=$('#total_print').val();
    var name=$('#name').val();
     var completion_date=$('#completion_date').val();
      var quality_check=$('#quality_check').val();
      var quality_checker_name=$('#quality_checker_name').val();
      var person_incharge=$('#person_incharge').val();
  
   
   if(service!='')
   {
       var printer_services=service;
   }else if(materials!='')
   {
        printer_services=materials;
   }
   
    if(document.getElementById('materials').checked==true)
         {
             var framer_company=$('#default_printer').val();
         }else if(document.getElementById('service').checked==true)
         {
               framer_company=$('#printer').val();
         }
        

var datastring='edit_id='+edit_id+'&type='+type+'&rate='+rate+'&order_id='+order_id+'&framer_services='+framer_services+'&frame_name='+frame_name+'&mount_name='+mount_name+'&glasses_name='+glasses_name+'&height='+height+'&width='+width+'&m_height='+m_height+'&m_width='+m_width+'&g_height='+g_height+'&g_width='+g_width+'&rate='+rate+'&total_print='+total_print+'&name='+name+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&framer_company='+framer_company+'&mgb_name='+mgb_name+'&mgb_height='+mgb_height+'&mgb_width='+mgb_width;
                $.ajax({

                    url:"<?=base_url()?>index.php/backend/update_framer_order_details",

                    type: "POST",

                    data:datastring,

                    success: function(response)

                    {
                       
                     $('#status').html(response);
                      setTimeout(function(){ reload();}, 3000);

                    }

                });


        }
        



 function save_framer_details()

        {
            
		//	alert('jii save')
  var order_id=$('#order_id').val();
  var rate=$('#rate').val();
   if(rate=='')
   {
      var rate=$('#rate2').val();   
   }else{
       
      var rate=$('#rate').val();     
   }
  if($('#default_printer').val()!=''){
  var default_printer=$('#default_printer').val();
  }

        
   if($('#printer').val()!=''){
  var printer=$('#printer').val();
  }else{
        printer=$('#printer2').val();
  }     
     
  var service=$('#service').val();
   var materials=$('#materials').val();
   
   if(service!='')
   {
       var framer_services=service
   }else if(materials!='')
   {
       framer_services=materials
   }
  var frame_name=$('#frame_name').val();
  
 if(frame_name!=''){
  var frame_name=$('#frame_name').val();
  }else{
        frame_name=$('#frame_name2').val();
  }    
  
  
  if($('#glasses_name').val()!=''){
  var glasses_name=$('#glasses_name').val();
  }else{
        glasses_name=$('#glasses_name2').val();
  }
  
  if($('#mgb_name').val()!=''){
  var mgb_name=$('#mgb_name').val();
  }else{
        mgb_name=$('#mgb_name2').val();
  } 
   if($('#mount_name').val()!=''){
  var mount_name=$('#mount_name').val();
  }else{
        mount_name=$('#mount_name2').val();
  } 
  
  
  if(frame_name!='')
  {
     var height=$('#height').val();
     var width=$('#width').val();
  }
  if(mount_name!='')
  {
     var m_height=$('#m_height').val();
     var m_width=$('#m_width').val();
  }
  if(glasses_name!='')
  {
     var g_height=$('#g_height').val();
     var g_width=$('#g_width').val();
  }
  if(mgb_name!='')
  {
     var mgb_height=$('#mgb_height').val();
     if(mgb_height=='undefined'){
         mgb_height='0';
     }
     var mgb_width=$('#mgb_width').val();
     if(mgb_width=='undefined'){
         mgb_width='0';
     }
  }else {
      
       var mgb_height=$('#mgb_height').val();
     if(mgb_height=='undefined'){
         mgb_height='0';
     }
     var mgb_width=$('#mgb_width').val();
     if(mgb_width=='undefined'){
         mgb_width='0';
     }
  }
  
   if ($("#online").is(":checked")) {
         var type=document.getElementsByName('type')[0].value;
     }

     if ($("#offline").is(":checked")) {
        var type=document.getElementsByName('type')[1].value;
     }

  var total_print=$('#total_print').val();
    var name=$('#name').val();
     var completion_date=$('#completion_date').val();
      var quality_check=$('#quality_check').val();
      var quality_checker_name=$('#quality_checker_name').val();
      var person_incharge=$('#person_incharge').val();
  
   
   if(service!='')
   {
       var printer_services=service;
   }else if(materials!='')
   {
        printer_services=materials;
   }
   
    if(document.getElementById('materials').checked==true)
         {
             var framer_company=$('#default_printer').val();
         }else if(document.getElementById('service').checked==true)
         {
               framer_company=$('#printer').val();
         }
        

var datastring='type='+type+'&rate='+rate+'&order_id='+order_id+'&framer_services='+framer_services+'&frame_name='+frame_name+'&mount_name='+mount_name+'&glasses_name='+glasses_name+'&height='+height+'&width='+width+'&m_height='+m_height+'&m_width='+m_width+'&g_height='+g_height+'&g_width='+g_width+'&rate='+rate+'&total_print='+total_print+'&name='+name+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&framer_company='+framer_company+'&mgb_name='+mgb_name+'&mgb_height='+mgb_height+'&mgb_width='+mgb_width;
                $.ajax({

                    url:"<?=base_url()?>index.php/backend/save_framer_order_details",

                    type: "POST",

                    data:datastring,

                    success: function(response)

                    {
                       
                     $('#status').html(response);
                      setTimeout(function(){ reload();}, 3000);

                    }

                });


        }
        
  function reload(){
    location.reload();
}
    </script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container" style="padding: 0px; width: 100%">
    <div class="main-hdr-quotation">Framer Job Sheet</div>
	<br>
   <a href="<?=base_url()?>index.php/backend/online_order"><button  class="bt-add">Close</button></a>  
	 <br>
    <div id="quotationListDiv" class="manage-order" >
	 
      <form name="update_printer_status" id="update_printer_status" method="post" action="<?=base_url()?>index.php/backend/save_framer_order_details">
         
          <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
        <tr  class="darktr">
          <td width="18%" class="bold">Order ID:</td>
          <?php foreach($order_details as $ord){?>
          <?}?>
          <td><?php echo $ord->order_id;?>
              <input type="hidden" name="order_id" id="order_id" value="<?=$ord->order_id;?>"></td>
        </tr>
        <tr style="border-bottom:none">
          <td colspan="2" >
          <div class="viewcplist-inner">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="hdrs">
                <td width="150">Images Id</td>
                <td>Name</td>
                <td>Region</td>
                <td>Status</td>
                <td>Time Alloted</td>
              </tr>
              <?php
              foreach($order_details as $ord){
                      
                       $status_framer=$this->backend_model->status_framer($ord->order_id);
                  $data_split= split('/',$ord->image_id);

                    if($data_split[0]=='images')
                    {
                   $fileName=$data_split[2];
                        $image_url=base_url().$ord->image_id;
                    }else {
                         $fileName=$ord->image_id;
                        $image_url="http://static.mahattaart.com/398/".$ord->image_id."";
                    }
                  
?>
              <tr>
                <td><b><?php echo $fileName;?></b><br>
                  <span class="thumbtd"><img src="<?php echo $image_url;?>" width="107" height="107" alt="art"/><br />
                  </span></td>
                <td><?php echo ucwords($ord->first_name).' '.ucwords($ord->last_name);?></td>
                <td><?php echo $ord->region;?></td>
                <td><?php if($status_framer==0){ echo 'Pending';}elseif($status_framer!=0){ echo 'Finished';}?></td>
                <td><?php 
                    
                   $time_allow= $this->backend_model->get_printer_allowed_time($_REQUEST['order_id']);
                   //print_r($time_allow);
                    
                   $db_split=split(' ',$time_allow[0]->completion_date);
                                 $date=split('-',$db_split[0]);
                                   $time= $date[2]+1;
                             echo   $date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];
                             $alloweted_date=$date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];
                             $system_date=date('Y-m-d h:t');
                            $time_allow= strtotime($alloweted_date);
                            $time_system= strtotime($system_date);
                            $to='framing@mahattaart.com';
                             if($time_allow<=$time_system && $status_framer==0)
                             {
                               $this->backend_model->sendmail('Framer',$to);  
                             }
                    ?></td>
              </tr>
              <?}?>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <table style="width:100%">
              <tr>
                <td class="bold">Order Id </td>
              
                <td class="bold">Frame</td>
                <td class="bold">Frame Color</td>
                <td class="bold"> Glass Name </td>
               <td class="bold"> Mount Color </td>
                <td class="bold"> Mount Size </td>
                <td class="bold"> Total Frame </td>
                <td class="bold"> Completion Date </td>
                <td class="bold"> Quality Check Status </td>
                <td class="bold"> Quality Checker Name </td>
                <td class="bold"> Person Incharge</td>
              </tr>
              <?php
            
            $printer=$this->backend_model->get_framer_jobsheet_details($_REQUEST['order_id']);
              
            foreach($printer as $result):
               
                ?>
              <tr>
                <td><?=$result->order_id;?>
                </td>
              
                <td><?=$result->framer;?></td>
                 <td><?=$result->frame_color;?></td>
              
                <td><?=$result->glass_name;?></td>
                
                <td><?=$result->mount_color;?></td>
                <td><?=$result->mount_size;?></td>
              
               
                <td><?=$result->total_frame;?></td>
                <td><?=$result->completion_date;?>
                </td>
                <td><?php if($result->quality_check=='1'){echo 'Yes';}elseif($result->quality_check=='0'){ echo 'No';} ?></td>
                <td><?=$result->quality_checker_name;?>
                </td>
                <td><?=$result->person_incharge   ;?></td>
              </tr>
              <?php endforeach;?>
            </table>
          </div>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="padding:0;"><div class="quotation-div"  id="quotation2Div" style="margin-left:25px">
            <!--DETAILS TABLE-->
            <span id="status" style="color: green; font-size:14px; "></span>
          
		  <?php 
                     $status_printer=$this->backend_model->status_printer($_REQUEST['order_id']);
                     if($status_printer>0){
                     ?>
		  
		    <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr >
                <td >Invoice Date</td>
                <td><?=$order_details[0]->created_date;?>
                </td>
                <td></td>
                <td width="541"></td>
              </tr>
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
              <?php $index=0; $j=1; foreach($order_details as $ord){
			  
			     $framer_order=$this->backend_model->get_framer_jobsheet_details($ord->order_id);
				 
			  if($j%2==0){  $classColor='#FF9966';}else{    $classColor='#66CC00';}
			  ?>
              <tr >
                <td width="140" >Frame Name</td>
                <td width="400"><input  value="<?php if($ord->print_type==1){  echo 'N/A'; } else echo $framer_order[$index]->framer?>" type="text" placeholder="Frame Name"  name="frame_name[]"   class="txtClass">
                </td>
				<td width="258" ></td>
				<td width="258" ><input type="hidden" value="<?php echo $ord->print_type;  ?>" name="order_print_type[]"></td>
              </tr>
              <tr >
                <td width="140" >Mount Size</td>
                <td width="345" > 
                    <input value="<?=$ord->mount_size_width;?>" type="text" readonly=""  name="mount_size[]" class=" txtClass">
                </td>
                <td width="258" > 
                
                </td>
				<td width="258" ></td>
              </tr>
              <?php if($ord->glass_name<>''){?>
              <tr >
                <td width="140" >Glass Type</td>
                <td width="345" ><input value="<?=$ord->glass_name;?>" readonly=""   type="text"  name="glass_name[]" class=" txtClass">
                </td>
                <td width="258" ></td>
				<td width="258" ></td>
              </tr>
              <?php }?>
              <tr style="background-color:<?=$classColor;?>">
                <td width="270" >Frame Color</td>
                <td width="255" ><input value="<?php if($ord->frame_color<>''){echo $ord->frame_color;}else echo $ord->frame_code;?>"  readonly=""  type="text"  name="frame_color[]" class=" txtClass">
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
					
                <td width="270" >Mount Color&nbsp;</td>
                <td width="251" ><input value="<?php if($ord->mount_color<>''){echo $ord->mount_color;}else echo $ord->mount_code;?>" readonly=""   type="text"  name="mount_color[]" class=" txtClass">
				
				<span class="thumbtd"><img src="<?php echo $image_url;?>" width="80" height="107" alt="art"/>
                      </span>SKU Id=&nbsp;<?=$ord->sku_id;?>
				</td>
				
					
					  
				
              </tr>
              <?php $j++;$index++; }?>
              <tr >
                <td class="bold"> Total Frames </td>
                <td >&nbsp;
                  <input type="text" readonly="" value="<?php echo count($order_details);?>" class="txtClass"  name="total_print" id="total_print">
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;&nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr class="darktr">
                <td class="bold">Date</td>
                <td><?php
				date_default_timezone_set('Asia/Kolkata');
		echo  $date=date('Y-m-d H:i:s');
				?></td>
                <td class="bold">Completion Date</td>
                <td>
                    
                   
                    <div id="datetimepicker" class="input-append date">
                        <input style="height:30px;" value="<?=$printer[0]->completion_date?>" <?php if($printer[0]->completion_date<>''){ echo 'readonly';}?> type="text" name="completion_date"></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div>
                  </td>
              </tr>
              <tr >
                <td class="bold">QC</td>
                <td><select name="quality_check" id="quality_check" class="inputs">
                    <option value="1" <?php if($printer[0]->quality_check==1){ echo 'selected';}?> >Yes</option>
                    <option value="0" <?php if($printer[0]->quality_check==0){ echo 'selected';}?>>No</option>
                  </select></td>
                <td class="bold">QC done by</td>
                <td><input id="quality_checker_name" <?php if($printer[0]->quality_checker_name<>''){ echo 'readonly';}?> value="<?=$printer[0]->quality_checker_name?>" type="text" name="quality_checker_name" /></td>
              </tr>
              <tr class="darktr">
                <td class="bold">Person Incharge</td>
                <td><input type="text" <?php if($printer[0]->person_incharge<>''){ echo 'readonly';}?> id="person_incharge" value="<?=$printer[0]->person_incharge?>" name="person_incharge" >
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              </div>
              
            </table>
			
			
			<?php }elseif($status_printer==0){
						    echo '<span style="color:red; font-size:14px;">Pending with Printer Not allow</span>';
						?>
						
						<?php }?>
            <div style="padding:30px; ">
              <?php if($printer[0]->quality_check==''){?>
                <input type="submit" onClick="return save_framer_details();" name="addcpn" id="addcpn" value="Save" class="bt-add" />
              <?php }if($this->session->userdata('userid')=='admin@mahattaart.com'){?>
              <input type="hidden" name="edit_id" id="edit_id" value="<?=$printer[0]->order_framer_status_id?>">
              <input type="submit" onClick="return update_framer_details();" name="addcpn" id="addcpn" value="Update" class="bt-add" />
              <?php }?>
              <input type="submit" name="addcpn2" id="addcpn2" value="Print" class="bt-add" onClick="PrintElem('.viewcplist-inner')"/>
            </div>
      </form>
      <form name="download_pdf" action="<?=base_url()?>index.php/backend/dowload_framer_xsl" method="post">
        <input type="hidden" name="order_id" id="order_id" value="<?php echo $_REQUEST['order_id']?>">
        <input type="submit"  name="addcpn"  value="Download" class="bt-add" />
      </form>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
<!--MIDDLE PAGE WRAPPER ENDS-->
<style>
    .txtClass{
        width: 90px;
        height: 30px;
    } 
    
</style>
<script type="text/javascript" src="<?=base_url()?>assets/js2/jquery-1.6.1.min.js"></script>
<script>
$(document).ready(function(){
    
     <?php if($printer[0]->print_type==1){?>
         $('.Online').show();
      $('.offline').hide();
      $('#printer').hide();
    <?php }if($printer[0]->print_type==2){ ?>
         $('.offline').show();
      $('.Online').hide();
    <?php }else{?>
   $('.Online').show();
      $('.offline').hide();
$('#mgb_name2').hide();
$('#mgb_name').hide();
$('#printer').hide();
    <?php }?>
    
    
   
});
$(document).on('click','.type',function(){
    
    if(document.getElementById('service2').checked=true){
        $('#mgb_name2').hide(); 
    }else{
       $('#mgb_name2').show(); 
    }
var val=$(this).data('id');
   if(val=='1'){
     $('.online').show();
      $('.offline').hide();
      $('#printer').hide();
   }else if(val=='2'){
     $('.offline').show();
      $('.online').hide();
      
   }
});



     function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'viewcplist-inner', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Order Print</title>');
       
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); 
        mywindow.focus();

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
 
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
    </script>
