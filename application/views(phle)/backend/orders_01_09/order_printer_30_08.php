<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>assets/js2/jquery-1.6.1.min.js"></script>

    <script type="text/javascript">


$(document).on('click','#download_pdf',function(){
var order_id=$('#order_id').val();
var datastring='order_id='+order_id;
           $.ajax({

                    url:"<?=base_url()?>index.php/backend/dowload_printer_pdf",
                    type: "POST",
                    data:datastring,
                    success: function(response)

                    {


                    }

                });
});






function update_print_details()

        {
  var order_id=$('#order_id').val();
   var edit_id=$('#edit_id').val();

     if ($("#online").is(":checked")) {
         var print_type=document.getElementsByName('type')[0].value;
     }

     if ($("#offline").is(":checked")) {
        var print_type=document.getElementsByName('type')[1].value;
     }

  var surface=document.getElementsByName('surface')[0].value;
  var printer=document.getElementsByName('printer')[0].value;
  
  var default_printer=$('#default_printer').val();
  var service=$('#service').val();
   if(service=='undefined'){
     service='';
   }else{
     service=service;
   }
  var materials=$('#materials').val();
 
  var height=$('#height').val();
  var width=$('#width').val();
   var total_print=$('#total_print').val();
    var name=$('#name').val();
     var completion_date=$('#completion_date').val();
      var quality_check=$('#quality_check').val();
      var quality_checker_name=$('#quality_checker_name').val();
      var person_incharge=$('#person_incharge').val();

if(printer==''){
   if(service!='')
   {
       var printer_services=service;
   }else if(materials!='')
   {
        printer_services=materials;
   }
         if(default_printer!='')
         {
             var printer=default_printer;
         }else if(printer!='')
         {
               printer=printer;
         }
}
var datastring='edit_id='+edit_id+'&order_id='+order_id+'&printer_services='+printer_services+'&printer='+printer+'&surface='+surface+'&height='+height+'&width='+width+'&total_print='+total_print+'&name='+name+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&print_type='+print_type;
                $.ajax({

                    url:"<?=base_url()?>index.php/backend/update_printer_order_details",

                    type: "POST",

                    data:datastring,

                    success: function(response)

                    {
//alert(response);
                     $('#status').html(response);
                       setTimeout(function(){ reload();}, 3000);

                    }

                });


        }
        












 function save_print_details()

        {
  var order_id=$('#order_id').val();

     if ($("#online").is(":checked")) {
         var print_type=document.getElementsByName('type')[0].value;
     }

     if ($("#offline").is(":checked")) {
        var print_type=document.getElementsByName('type')[1].value;
     }

  var surface=document.getElementsByName('surface')[0].value;
  var printer=document.getElementsByName('printer')[0].value;
  
  var default_printer=$('#default_printer').val();
  var service=$('#service').val();
   if(service=='undefined'){
     service='';
   }else{
     service=service;
   }
  var materials=$('#materials').val();
 
  var height=$('#height').val();
  var width=$('#width').val();
  var a_height=$('#a_height').val();
  var a_width=$('#a_width').val();
   var total_print=$('#total_print').val();
    var name=$('#name').val();
     var completion_date=$('#completion_date').val();
      var quality_check=$('#quality_check').val();
      var quality_checker_name=$('#quality_checker_name').val();
      var person_incharge=$('#person_incharge').val();
var actual_size=a_height+'X'+a_width;
if(printer==''){
   if(service!='')
   {
       var printer_services=service;
   }else if(materials!='')
   {
        printer_services=materials;
   }
         if(default_printer!='')
         {
             var printer=default_printer;
         }else if(printer!='')
         {
               printer=printer;
         }
}
var datastring='actual_size='+actual_size+'&order_id='+order_id+'&printer_services='+printer_services+'&printer='+printer+'&surface='+surface+'&height='+height+'&width='+width+'&total_print='+total_print+'&name='+name+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&print_type='+print_type;
                $.ajax({

                    url:"<?=base_url()?>index.php/backend/save_printer_order_details",

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
        
        
$(document).ready(function(){
var status=$('#status span').text();

 if(status!='')
 {
   setTimeout(function(){ OutTime();4000});
 }
});

function OutTime(){

}


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


                        $('#name').val(data);

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
      $('#default_printer').show();
      $('#printer').hide();
     }else if(values=='services')
     {
      $('#default_printer').hide();
      $('#printer').show();
     }
 }

    </script>



</head>



<body>





<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">

<div  id="middle-container">

<div class="main-hdr-quotation">Printer Job Sheet</div>

    <?php
	
	 foreach($order_details as $ord){?>

    <?php }?>

<div id="quotationListDiv" class="manage-order" >
<form name="download_pdf" action="<?=base_url()?>index.php/backend/dowload_printer_pdf" method="post">
  <input type="hidden" name="order_id" id="order_id" value="<?php echo $_REQUEST['order_id']?>">
  <input style="float: right; margin-bottom: 10px;" type="submit"  name="addcpn"  value="Download" class="bt-add" />
  </form>
    <br>

     <br><table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">

<tr  class="darktr">

    <td width="18%" class="bold">Order ID:</td>

    <?php 
    foreach($order_details as $ord){?>

    <?php }?>

    <td><?php echo $ord->order_id;?></td>

</tr>

<tr style="border-bottom:none">

    <td colspan="2" >

        <div class="viewcplist-inner">

            <table width="100%" border="0" cellspacing="0" cellpadding="0">

                 <tr class="hdrs">
                    <td width="45">SR NO.</td>
                    <td width="150">Images Id</td>
                    <td>Name</td>
                    <td>Region</td>
                    <td>Status</td>
                    <td>Time Alloted</td>
                  </tr>

                <?php $i=1; foreach($order_details as $ord){
                     $status_printer=$this->backend_model->status_printer($ord->order_id);
                     
                     $data_split= split('/',$ord->image_id);

                    if($data_split[0]=='images')
                    {
                   $fileName=$data_split[2];
                        $image_url=base_url().$ord->image_id;
                    }else {
                         $fileName=$ord->image_id;
                        $image_url="http://www.indiapicture.in/wallsnart/398/".$ord->image_id."";
                    }
      //echo $image_url;

?>

                <tr><td><?=$i.'.';?></td>
                    <td><b><?=$fileName;  ?></b><br><span class="thumbtd"><img src="<?php echo $image_url;?>" width="107" height="107" alt="art"/><br />
                      </span></td>
                      <td><?php echo ucwords($ord->first_name).' '.ucwords($ord->last_name);?></td>
                    <td><?php echo $ord->region;?></td>
                    <td><?php if($status_printer==0){ echo 'Pending';}elseif($status_printer!=0){ echo 'Finish';}?></td>
                    <td><?php $db_split=split(' ',$ord->created_date);
                                 $date=split('-',$db_split[0]);
                                   $time= $date[2]+1;
                             echo   $date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];
                             $alloweted_date=$date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];
                             $system_date=date('Y-m-d h:t');
                            $time_allow= strtotime($alloweted_date);
                            $time_system= strtotime($system_date);
                            $to='printer@wallsnart.com';
                             if($time_allow<=$time_system && $status_printer==0)
                             {
                               $this->backend_model->sendmail('Printer',$to);
                             }
                    ?></td>

                  </tr>



                <?php $i++;}?>

            </table>
<p>&nbsp;</p>
    <p>&nbsp;</p>
    <table style="width:100%">
              <tr><td class="bold">Order Id </td><td class="bold"> Company Name</td><td class="bold">Surface</td><td class="bold"> Print Size</td><td class="bold"> No of Print</td><td class="bold"> Completion Date </td><td class="bold">  Quality Check Status </td><td class="bold"> Quality Checker Name </td><td class="bold"> Person Incharge</td></tr>
            <?php
            
            $printer=$this->backend_model->get_printer_jobsheet_details($_REQUEST['order_id']);
         
            $printer[0]->print_type;
            foreach($printer as $result):
               
                ?>
              <tr><td><?=$result->order_id;?> </td><td> <?=$result->printer_company_name;?></td><td><?=$result->surface;?></td><td> <?=$result->print_size;?></td><td> <?=$result->total_print;?></td><td> <?=$result->completion_date;?> </td><td>   <?php if($result->quality_check=='1'){echo 'Yes';}elseif($result->quality_check=='0'){ echo 'No';} ?></td><td> <?=$result->quality_checker_name;?> </td><td> <?=$result->person_incharge   ;?></td></tr>
<?php endforeach;?>          
</table> 
              
        </div></td>

</tr>



    
<form name="update_printer_status" id="update_printer_status" method="post" action="#">
        <input type="hidden" name="order_id" id="order_id" value="<?php echo $_REQUEST['order_id']?>">

<div>

    <tr>

        <td colspan="2" style="padding:0;">


 <span style="color: green; font-size: 14px;" id="status"></span>
            <div class="quotation-div"  id="quotation2Div" style="margin-left:25px"><!--DETAILS TABLE-->

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
      $('#printer').hide();
    <?php }?>
});
$(document).on('click','.type',function(){
var val=$(this).data('id');
   if(val=='1'){
     $('.Online').show();
      $('.offline').hide();
      $('#printer').hide();
   }else if(val=='2'){
     $('.offline').show();
      $('.Online').hide();
   }
});
</script>

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr > <td class="bold">Invoice Date</td><td><?=$invoice_date[0]->created_date;?> </td><td></td><td></td></tr>
                  <tr class="darktr"> <td ></td><td>OnLine<input <?php if($printer[0]->print_type==1){ echo 'checked';}elseif($printer[0]->print_type==''){ echo 'checked';}?> type="radio" data-id="1" name="type" id="online" class="type" value="1"> &nbsp;Off Line  <input type="radio" data-id="2"  id="offline" name="type" <?php if($printer[0]->print_type==2){ echo 'checked';}?> class="type" value="2"> </td><td></td><td></td></tr>
                  <tr > <td class="bold">Printer</td><td class="offline"><input  value="<?=$printer[0]->printer_company_name?>"  type="text" <?php if($printer[0]->printer_company_name<>''){ echo 'readonly';}?> name="printer"  class="txtClass offline"></td><td class="online">Row Material <input  onclick="return change_services('material');" checked type="radio" name="printer" id="materials" value="1"> &nbsp;Services  <input type="radio" onclick="return change_services('services');"  id="service" name="printer" value="2"> </td><td></td><td></td></tr>
                    <tr class="darktr online" >

                        <td width="120" class="bold"></td>
    <td width="250">


                            <select class="online" name="default_printer" id="default_printer"><option value="mahatta multimeda pvt ltd">Mahatta Multimeda Pvt Ptd</option></select>
                            <select class="online" name="printer" id="printer" onchange="get_printer_name(this.value);">
  <option value="">---Select Printers---</option>
                                <?php foreach($printers as $print){?>

                                <option value="<?php echo $print->company_name;?>"><?php echo $print->company_name;?></option>

                                <?php }?>

                            </select></td>

                        <td width="120">&nbsp;</td>

                        <td>&nbsp;</td>



                    </tr>


                    <tr >



                        <td width="120" class="bold">Surface</td>



                        <td width="250">
<input  type="text" name="surface"  class="txtClass offline" <?php if($printer[0]->surface<>''){ echo 'readonly';}?> value="<?=$printer[0]->surface?>">
                            <select class="online" name="surface" id="surface" onchange="get_printer_name(this.value);">
                                <option value="">---Select Surface---</option>
                                <?php foreach($surface as $surface_val){?>

                                <option value="<?php echo $surface_val->surface;?>"><?php echo $surface_val->surface;?></option>

                                <?}?>

                            </select></td>

                        <td width="120">&nbsp;</td>

                        <td>&nbsp;</td>



                    </tr>


                    <tr>

                        <td class="bold">Print Size</td>
<?php $size= split('x',$printer[0]->print_size);
$a_size= split('X',$printer[0]->actual_size);

?>
                        <td >Height&nbsp;<input type="text" <?php if($size[0]<>''){ echo 'readonly';}?> value="<?=$size[0];?>"  name="height" id="height" class="txtClass"></td>

                        <td>Width&nbsp; <input type="text" <?php if($size[1]<>''){ echo 'readonly';}?> value="<?=$size[1];?>"  name="width" id="width" class="txtClass"></td>

                        <td>&nbsp;</td>

                    </tr>
					
					<tr>

                        <td class="bold">Actual Size</td>
                        <td >Height&nbsp;<input type="text" <?php if($a_size[0]<>''){ echo 'readonly';}?> value="<?=$a_size[0];?>"  name="a_height" id="a_height" class="txtClass"></td>

                        <td>Width&nbsp; <input type="text" <?php if($a_size[1]<>''){ echo 'readonly';}?> value="<?=$a_size[1];?>"  name="a_width" id="a_width" class="txtClass"></td>

                        <td>&nbsp;</td>

                    </tr>
					
                                    <tr class="darktr">

                        <td class="bold">No of Print Quantity</td>

                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo count($order_details);?>" class="txtClass" readonly="" name="total_print" id="total_print"></td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr>

                        <td class="bold">Name</td>

                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" value="<?=$printer[0]->quality_checker_name?>"   <?php if($printer[0]->quality_checker_name<>''){ echo 'readonly';}?> name="name" id="name" class="txtClass" ></td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr class="darktr">

                        <td class="bold">Date</td>

                        <td><?=date('Y-m-d h:t')?></td>

                        <td class="bold">Completion Date</td>

                        <td><input <?php if($printer[0]->completion_date<>''){ echo 'readonly';}?>  <?php if($printer[0]->completion_date==''){?> type="date"<?php }?> value="<?=$printer[0]->completion_date?>"  name="completion_date" <?php if($printer[0]->completion_date==''){?>id="completion_date"<?php }?>></td>

                    </tr>


                    <tr class="darktr">

                        <td class="bold">QC</td>

                        <td><select name="quality_check" id="quality_check" class="inputs">

                                <option value="1" <?php if($printer[0]->quality_check==1){ echo 'selected';}?> >Yes</option>

                                <option value="0" <?php if($printer[0]->quality_check==0){ echo 'selected';}?>>No</option>

                            </select></td>

                        <td class="bold">QC done by</td>

                        <td><input id="quality_checker_name" <?php if($printer[0]->quality_checker_name<>''){ echo 'readonly';}?>  value="<?=$printer[0]->quality_checker_name?>" type="text" name="quality_checker_name" /></td>

                    </tr>

                    <tr>

                        <td class="bold">Person Incharge</td>

                        <td><input type="text" <?php if($printer[0]->person_incharge<>''){ echo 'readonly';}?>  id="person_incharge" value="<?=$printer[0]->person_incharge?>" name="person_incharge" > </td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                    </tr>

                </table>



                
            </div>

<div style="padding:30px; "> 
    <?php if($printer[0]->quality_check==''){?>
    <input type="button" onclick="return save_print_details();" name="addcpn" id="addcpn" value="Save" class="bt-add" />
    <?php }
	if($this->session->userdata('userid')=='shalini@wallsnart.com'){
	?>
    <input type="hidden" name="edit_id" id="edit_id" value="<?=$printer[0]->order_printer_status_id?>">
    <input type="button" onclick="return update_print_details();" name="addcpn" id="addcpn" value="Update" class="bt-add" />
    <?php }?>
    
    </form>

   <input type="submit" name="addcpn2" id="addcpn2" value="Print"  onclick="PrintElem('.viewcplist-inner')"  class="bt-add"/> 
</div>
        </td>

    </tr>

</div>



</table>





</div>

</div>

<style>
    .txtClass{
        width: 90px;
        height: 30px;
    }

</style>

<script type="text/javascript">

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
