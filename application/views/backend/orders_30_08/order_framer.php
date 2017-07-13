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
        
  function reload() {
    location.reload();
}
    </script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
    <div id="middle-container" style="padding: 0px; width: 100%">
    <div class="main-hdr-quotation">Framer Job Sheet</div>
    <?php foreach($order_details as $ord){?>
    <?}?>
    <div id="quotationListDiv" class="manage-order" >
      <form name="update_printer_status" id="update_printer_status" method="post" action="#">
        <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
          <tr  class="darktr">
            <td width="18%" class="bold">Order ID:</td>
            <?php foreach($order_details as $ord){?>
            <?}?>
            <td><?php echo $ord->order_id;?><input type="hidden" id="order_id" value="<?=$ord->order_id;?>"></td>
          </tr>
          
          <tr style="border-bottom:none">
            <td colspan="2" ><div class="viewcplist-inner">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="hdrs">
                    <td width="150">Images Id</td>
                    <td>Name</td>
                    <td>Region</td>
                    <td>Status</td>
                    <td>Time Alloted</td>
                  </tr>
                  <?php foreach($order_details as $ord){
                      
                       $status_framer=$this->backend_model->status_framer($ord->order_id);
                  $data_split= split('/',$ord->image_id);

                    if($data_split[0]=='images')
                    {
                   $fileName=$data_split[2];
                        $image_url=base_url().$ord->image_id;
                    }else {
                         $fileName=$ord->image_id;
                        $image_url="http://www.indiapicture.in/wallsnart/398/".$ord->image_id."";
                    }
                  
?> 
                  <tr>
                    <td><b><?php echo $fileName;?></b><br><span class="thumbtd"><img src="<?php echo $image_url;?>" width="107" height="107" alt="art"/><br />
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
                            $to='framer@wallsnart.com';
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
    <td class="bold"> Company Name</td>
    <td class="bold">Framer</td>
    <td class="bold"> Rate</td>
    <td class="bold"> Mount</td>
    <td class="bold">Glass</td>
    <td class="bold">MGB Name</td>
    <td class="bold"> Glass Name </td>
    <td class="bold"> Frame Size </td>
    <td class="bold"> Mount Size </td>
    <td class="bold"> Glass Size </td>
    <td class="bold"> MGB Size </td>
    <td class="bold"> Total Frame </td>
    <td class="bold"> Deliver Date </td>
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
    <td><?=$result->framer_company_name;?></td>
    <td><?=$result->framer;?></td>
    <td><?=$result->rate;?></td>
    <td><?=$result->mount;?></td>
    <td><?=$result->glass;?></td>
    <td><?=$result->mgb_name;?></td>
    <td><?=$result->glass_name;?></td>
    <td><?=$result->frame_size;?></td>
    <td><?=$result->mount_size;?></td>
    <td><?=$result->glass_size;?></td>
    <td><?=$result->mgb_size;?></td>
    <td><?=$result->total_frame;?></td>
    <td><?=$result->delivery_date;?></td>
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
          <div>
            <tr>
            
            <td colspan="2" style="padding:0;">
            
            <div class="quotation-div"  id="quotation2Div" style="margin-left:25px">
                <!--DETAILS TABLE--><span id="status" style="color: green; font-size:14px; "></span>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr > <td class="bold">Invoice Date</td><td><?=$invoice_date[0]->created_date;?> </td><td></td><td width="486"></td>
</tr>
 <tr class="darktr"> <td ></td><td>OnLine<input <?php if($printer[0]->print_type==1){ echo 'checked';}elseif($printer[0]->print_type==''){ echo 'checked';}?> type="radio" data-id="1" name="type" id="online" class="type" value="1"> &nbsp;Off Line  <input type="radio" data-id="2"  id="offline" name="type" <?php if($printer[0]->print_type==2){ echo 'checked';}?> class="type" value="2"> </td><td></td><td></td></tr>
    
<tr  class="offline">
                  <td class="bold">Framer</td>
                  <td>Row Material
                    <input  onclick="return change_services1('1');" checked type="radio" name="printer1" id="materials2" value="1">
                    &nbsp;Services
                    <input type="radio" onclick="return change_services1('2');"  id="service2" name="printer1" value="2">
                  </td>
                  <td></td>
                  <td></td>
                </tr>
    <tr  class="online">
                  <td class="bold">Framer</td>
                  <td>Row Material
                    <input  onclick="return change_services('material');" checked type="radio" name="printer" id="materials" value="1">
                    &nbsp;Services
                    <input type="radio" onclick="return change_services('services');"  id="service" name="printer" value="2">
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                
                <tr class="darktr online" >
                  <td width="120" class="bold"></td>
                  <td width="250"><select  name="default_printer" id="default_printer">
                      <option value="mahatta multimeda pvt ltd">Mahatta Multimeda
                      Pvt Ptd</option>
                    </select>
                     
                    <select name="display_name" id="printer" onchange="get_printer_name(this.value);">
                      <option value="">---Select Framer---</option>
                      <?php foreach ($framers as $values){?>
                      <option value="<?php echo $values->company_name;?>"><?php echo $values->company_name;?></option>
                      <?}?>
                    </select></td>
                  <td width="120">&nbsp;</td>
                  <td>&nbsp;</td> 
                </tr>
                <tr >
                  <td width="120" class="bold">Framer Name</td>
                  <td width="250">
                      <input value="<?=$printer[0]->framer;?>" type="text" placeholder="Framer Name" name="frame_name" onkeyup="short_framer_rate(this.value);" id="frame_name2" class="offline txtClass">
                      <select class="online" name="frame_name" id="frame_name" onchange="short_framer_rate(this.value);">
                      <option value="">---Select Framer---</option>
                      <?php foreach($framer_name as $name){?>
                      <option value="<?php echo $name->framer_name;?>"><?php echo $name->framer_name;?></option>
                      <?php }?>
                    </select></td>
                 <td width="120" class="bold">
                     <input value="<?=$printer[0]->mgb_name;?>" type="text" placeholder="MGB Name" name="mgb_name" id="mgb_name2" onkeyup="display_mgb_txt(this.value);" class="offline txtClass">
                     <select name="mgb_name" class="online"  id="mgb_name" onchange="display_mgb_txt(this.value);">
                      <option value="">---Select MGB---</option>
                      <?php while($mgb_name=mysql_fetch_object($mgb_name)){?>
                      <option value="<?php echo $mgb_name->framer_name;?>"><?php echo $mgb_name->framer_name;?></option>
                      <?php }?>
                    </select>
                     <input value="<?=$printer[0]->mount_name;?>" type="text" placeholder="Mount Name" name="mount_name" id="mount_name2" onkeyup="display_mount_txt(this.value);" class="offline txtClass">
                     <select name="mount_name" class="online" id="mount_name" onchange="display_mount_txt(this.value);">
                      <option value="">---Select Mount---</option>
                      <?php while($m_name=mysql_fetch_object($mount_name)){?>
                      <option value="<?php echo $m_name->framer_name;?>"><?php echo $m_name->framer_name;?></option>
                      <?php }?>
                    </select></td>
                    <td width="120" class="bold" >
                        <input value="<?=$printer[0]->glass_name;?>" type="text" placeholder="Glass Name" name="glass_name" id="glasses_name2" onkeyup="display_glass_txt(this.value);" class="offline txtClass">
                        <select  class="online" name="glass_name" id="glasses_name" onchange="display_glass_txt(this.value);">
                      <option value="">---Select Glasses---</option>
                      <?php while($g_name=mysql_fetch_object($glass_name)){?>
                      <option value="<?php echo $g_name->framer_name;?>"><?php echo $g_name->framer_name;?></option>
                      <?php }?>
                    </select></td>
                </tr>
                
                <tr class="darktr ">
                <td width="120" class="bold ">Rate</td>
                <td width="250">
                <input value="<?=$printer[0]->rate;?>" type="text" placeholder="Rate" name="rate" id="rate2" class="offline txtClass">
                <select  name="rate" id="rate" class="online" >
                  <option value="">Select Rate</option>
                  </td>
                  
                  <td width="120" >
                  &nbsp;
                  </td>
                  
                  <td>
                  &nbsp;
                  </td>
                  
                  </tr>
                  
                  <?php
                     $mountsize= split('x', $printer[0]->mount_size);
                     $mgbsize= split('x', $printer[0]->mgb_size);
                      $frame_size= split('x', $printer[0]->frame_size);
                      $glasssize= split('x', $printer[0]->glass_size);
                  ?>
                  
                  
                  <tr id="height_width" >
                  
                  <td class="bold">
                  Frame Size
                  </td>
                  
                  <td >
                  Height
                  &nbsp;
                  <input type="text"  name="height"  value="<?=$frame_size[0];?>" placeholder="Frame Height" id="height" class="txtClass">
                  </td>
                  
                  <td class="offline">
                  Width
                  &nbsp;
                  
                  <input type="text"  name="width"  value="<?=$frame_size[1];?>" placeholder="Frame Width" id="width" class="txtClass">
                  </td>
                  
                  <td>
                  &nbsp;
                  </td>
                  
                  </tr>
                  <tr  class="darktr" id="m_height_width">
                  
                  <td class="bold">
                  Mount Size
                  </td>
                  
                  <td >
                  Height
                  &nbsp;
                  <input type="text"   value="<?=$mountsize[0];?>" placeholder="Mount Height" name="m_height" id="m_height" class="txtClass">
                  </td>
                  
                  <td>
                  Width
                  &nbsp;
                  
                  <input type="text" value="<?=$mountsize[1];?>" placeholder="Mount Width"  name="m_width" id="m_width" class="txtClass">
                  </td>
                  
                  <td>
                  &nbsp;
                  </td>
                  
                  </tr>
                  
                   <tr id="g_height_width">
                  
                  <td class="bold">
                  Glass Size
                  </td>
                  
                  <td >
                  Height
                  &nbsp;
                  <input type="text" value="<?=$glasssize[1];?>"  placeholder="Glass Height" name="g_height" id="g_height" class="txtClass">
                  </td>
                  
                  <td>
                  Width
                  &nbsp;
                  
                  <input type="text" value="<?=$glasssize[1];?>" placeholder="Glass Width"  name="g_width" id="g_width" class="txtClass">
                  </td>
                  
                  <td>
                  &nbsp;
                  </td>
                  
                  </tr>
                   <tr id="mgb_height_width">
                  
                  <td class="bold">
                  MGB Size
                  </td>
                  
                  <td >
                  Height
                  &nbsp;
                  <input type="text" value="<?=$mgbsize[0]?>"  placeholder="MGB Height" name="mgb_height" id="mgb_height" class="txtClass">
                  </td>
                  
                  <td>
                  Width
                  &nbsp;
                  
                  <input type="text" value="<?=$mgbsize[1]?>" placeholder="MGB Width"  name="mgb_width" id="mgb_width" class="txtClass">
                  </td>
                  
                  <td>
                  &nbsp;
                  </td>
                  
                  </tr>
                  
                  <tr class="darktr">
                  
                  <td class="bold">
                  Total Frames
                  </td>
                  
                  <td >
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  <input type="text" value="<?=$printer[0]->total_frame?>" class="txtClass"  name="total_print" id="total_print">
                  </td>
                  
                  <td>
                  &nbsp;
                  </td>
                  
                  <td>
                  &nbsp;
                  </td>
                  
                  </tr>
                  
                  
                  
                 <tr class="darktr">

                        <td class="bold">Date</td>

                        <td><?=date('Y-m-d h:t')?></td>

                        <td class="bold">Completion Date</td>

                        <td><input <?php if($printer[0]->completion_date==''){?> type="date"<?php }?> value="<?=$printer[0]->completion_date?>"  name="completion_date" id="completion_date"></td>

                    </tr>


                    <tr class="darktr">

                        <td class="bold">QC</td>

                        <td><select name="quality_check" id="quality_check" class="inputs">

                                <option value="1" <?php if($printer[0]->quality_check==1){ echo 'selected';}?> >Yes</option>

                                <option value="0" <?php if($printer[0]->quality_check==0){ echo 'selected';}?>>No</option>

                            </select></td>

                        <td class="bold">QC done by</td>

                        <td><input id="quality_checker_name" value="<?=$printer[0]->quality_checker_name?>" type="text" name="quality_checker_name" /></td>

                    </tr>

                    <tr>

                        <td class="bold">Person Incharge</td>

                        <td><input type="text" id="person_incharge" value="<?=$printer[0]->person_incharge?>" name="person_incharge" > </td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                    </tr>

          </div>
        </table>
         
          
          
        <div style="padding:30px; ">
            
            <?php if($printer[0]->quality_check==''){?>
    <input type="button" onclick="return save_framer_details();" name="addcpn" id="addcpn" value="Save" class="bt-add" />
    <?php }elseif($printer[0]->quality_check<>''){?>
    <input type="hidden" name="edit_id" id="edit_id" value="<?=$printer[0]->order_framer_status_id?>">
    <input type="button" onclick="return update_framer_details();" name="addcpn" id="addcpn" value="Update" class="bt-add" />
    <?php }?>
           
          <input type="submit" name="addcpn2" id="addcpn2" value="Print" class="bt-add" onclick="PrintElem('.viewcplist-inner')"/>
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