<?php //print_r($search_data);?>


  
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> View Online Orders</div>

<script>
    function search_by_company(company_name){
        window.location.href="<?=base_url()?>index.php/backend/online_order/"+company_name;
    }
    function search_by_contact_person(contact_person){
       // alert(contact_person);
        window.location.href="<?=base_url()?>index.php/backend/online_order/none/"+contact_person;
    }
    function search_by_sales_person(sales_person){
      window.location.href="<?=base_url()?>index.php/backend/online_order/none/none/"+sales_person;
    }
    function search_by_region(region){
        window.location.href="<?=base_url()?>index.php/backend/online_order/none/none/none/"+region;
    }
     
     function search_by_quotation_id(quotation_id){
        window.location.href="<?=base_url()?>index.php/backend/online_order/none/none/none/none/"+quotation_id;
    }
    
    function search_by_quotation_status(status){
        window.location.href="<?=base_url()?>index.php/backend/online_order/none/none/none/none/none/"+status;
    }
    
    function search_by_date(){
        var from =$('#from').val();
        var to =$('#to').val();
        var search_date=from+'_'+to;
        //alert(search_date);
        window.location.href="<?=base_url()?>index.php/backend/online_order/none/none/none/none/none/none/"+search_date;
    }
    
    
    </script>
<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120">Company Name</td>
    <td width="280">
        
        <select id="customer_id" name="customer_id" onchange="return search_by_company(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select--</option>
</optgroup>
<?php foreach ($company_name as $c_name):?>
<option value="<?=$c_name->company_name?>"><?=$c_name->company_name?></option>
         <?php endforeach;?>     
</select>    
    </td>
    <td width="150">Contact Person</td>
    <td><select id="contact_person" name="contact_person" onchange="return search_by_contact_person(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select--</option>
</optgroup>
<?php foreach ($conact_person as $con_name):?>
<option value="<?=$con_name->client_servicing?>"><?=$con_name->client_servicing?></option>
         <?php endforeach;?>     
</select> </td>


<td width="150">Sales Person</td>
    <td><select id="sales_person" name="sales_person" onchange="return search_by_sales_person(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select--</option>
</optgroup>
<?php foreach ($sales_person as $sale_name):?>
<option value="<?=$sale_name->sales_person?>"><?=$sale_name->sales_person?></option>
         <?php endforeach;?>     
</select> </td>


  </tr>
  <tr>
    <td>Region</td>
    <td><select name="region" id="region" class="inputs" onchange="return search_by_region(this.value);">

            <option selected="selected" value=""> Select  Region</option>

            <option>East</option>

            <option>West</option>

            <option>North</option>

            <option>South</option>

      </select></td>
  
      <td>Order Status</td>
    <td><select name="operation2" id="operation2" class="inputs" onchange="return search_by_quotation_status(this.value);">
      <option selected="selected">---Select---</option>
      <option value="0">In progress</option>
      <option value="1">Finished</option>
     </select></td>
    
    <td>Order Id</td>
    
    
    <td><select id="order_id" name="order_id" onchange="return search_by_quotation_id(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select--</option>
</optgroup>
<?php foreach ($order_id as $q_id):?>
<option value="<?=$q_id->order_id?>"><?=$q_id->order_id?></option>
         <?php endforeach;?>     
</select>  </td>
  </tr>
  <tr>
    
    <td>Statement Period</td>
    <td><input name="from" type="date" id="from" style="width: 120px;"   class="date-range">

-

<input name="to" type="date" id="to"  class="date-range" style="width: 120px;" onblur="search_by_date();"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  
    <td>&nbsp;</td>
  </tr>
  </table>
</div>

<div id="PhotographersListDiv" >
<div class="customer-list">
  <div class="hdrlist" style="width:140px">ORDER List</div>  
Total Orders : <span class="count"><?=$totals;?></span> 
<!--<a href="quotation/create_quotation" class="addnewcp">Create Quotation</a>--></div>
<div class="view-cp-list">
<?php if($msg<>'') {?>
          <script>
              setTimeout(function(){outtime()},3000);
              function outtime(){
                  window.location.href="<?=base_url()?>index.php/backend/online_order";
              }
           </script>
          <?php echo $msg;}?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
              <td>Order  ID</td>
          <td>Company Name </td>
             <td>Sales Person</td>
          <td>Client Servicing</td>
          <td>Region</td>
          <td>Status</td>
<!--          <td>Convert Into Invoice</td>-->
          <td>Job Sheet</td>
          <?php 
                         if($this->session->userdata('userid')=='shalini@wallsnart.com')
                               {
                           ?> 
          <td>Order Details</td>
                               <?php }?>
          <td>Order Date</td>
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}
</script>
         
          </tr>
     <?php

      $frame_code= $this->uri->slash_segment(3);
        $framer_code_str= substr($frame_code,0,3);
         $split_code=split('/',$frame_code);
          
     //print_r($search_data);
     if($split_code[0]<>''){
                  $order_distinct=$search_data;
              }else{
                  $order_distinct=$order_distinct;
              }
     $search_datacount=count($search_data);  if($order_count || $search_datacount) {

              
                while($resukt =  mysql_fetch_assoc($order_distinct)){
                    
                     $print=$this->backend_model->get_order_data($resukt['order_id']);
                       $status_courier=$this->backend_model->status_courier($print['order_id']);
                       $status_printer=$this->backend_model->status_printer($print['order_id']);
                        $status_framer=$this->backend_model->status_framer($print['order_id']);
                        $status_packager=$this->backend_model->status_packager($print['order_id']);
                        //echo $status_printer;
                       
                       if($status_printer==0){
                          $status= 'Pending with Printer'; 
                       }if($status_printer>0){
                           $complete='Completed';
                         if($status_framer==0){
                           $status= 'Pending with Framer';
                           
                           }
                       }if($status_framer>0){
                           $complete='Completed';
                            if($status_packager==0){
                            $status= 'Pending with Packager'; 
                           }
                           
                       }if($status_packager>0){
                           $complete='Completed';
                            if($status_courier==0){
                           $status= 'Pending with Courier'; 
                           
                           }
                       }if($status_courier>0){
                           $complete='Completed';
                            
                           }
                       
                       
                       
                       
                ?>
          
          
            
          
		<?php if($this->session->userdata('userid')=='shalini@wallsnart.com'){?>  
		<tr>
   <td><?php echo $print['order_id'];?></td>       
  <td><?php echo $print['company_name'];?></td>
	<td><?php echo $print['sales_person'];?></td>
		  <td><?php echo $print['client_servicing'];?></td>

		   <td><?php echo $print['region'];?></td>
			 <td><?=$status ?></td>
			 <td>
<?php 
                         if($this->session->userdata('userid')=='shalini@wallsnart.com')
                               {
                           ?>  
                        <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/job_sheet/<?=$print['order_id'];?>/printer');">Printer </a>
                        <br>
                        <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/job_sheet/<?=$print['order_id'];?>/framer');">Framer </a>
                       <br>
                        <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/job_sheet/<?=$print['order_id'];?>/packager');">Packager </a>
                        <br>
                        <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/job_sheet/<?=$print['order_id'];?>/courier');">Courier</a>
                        <?php }?>
			 <td><a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/view_orders_details/<?=$print['order_id'];?>');">View </a></td>        
<td><?php echo $print['created_date'];?></td>


	  </tr>
                <?php }elseif($this->session->userdata('userid')=='printing@wallsnart.com'){?>  
		<tr>
   <td><?php echo $print['order_id'];?></td>       
  <td><?php echo $print['company_name'];?></td>
	<td><?php echo $print['sales_person'];?></td>
		  <td><?php echo $print['client_servicing'];?></td>
		   <td><?php echo $print['region'];?></td>
			 <td><?php 
                         if($status_printer==0){ echo $status;}else{ echo $complete;}
                         
                         ?></td>
			 <td>
		  <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/view_orders_details/<?=$print['order_id'];?>');">View </a>   <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/printer?order_id=<?=$print['order_id'];?>');">/ Edit</a>   <a href="#" data-toggle="modal" data-target="#myModal" class="sendmail"  data-mail="printer" data-id="<?=$print['order_id'];?>" >/ Send Mail</a>
<td><?php echo $print['created_date'];?></td>


	  </tr>
	  <?php }elseif($this->session->userdata('userid')=='framing@wallsnart.com'){?>
	  <tr>
   <td><?php echo $print['order_id'];?></td>       
  <td><?php echo $print['company_name'];?></td>
	<td><?php echo $print['sales_person'];?></td>
		  <td><?php echo $print['client_servicing'];?></td>
		   <td><?php echo $print['region'];?></td>
			 <td><?php 
                         if($status_framer==0){ echo $status;}else{ echo $complete;}
                         
                         ?></td>
			 <td>
		  <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/view_orders_details/<?=$print['order_id'];?>');">View </a>  <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/edit_framer_order?order_id=<?=$print['order_id'];?>');">/Edit</a><a href="#" data-toggle="modal" data-target="#myModal" class="sendmail"  data-mail="framer" data-id="<?=$print['order_id'];?>" >/ Send Mail</a>
<td><?php echo $print['created_date'];?></td>


	  </tr>
	  <?php }elseif($this->session->userdata('userid')=='packaging@wallsnart.com'){?>
	  <tr>
   <td><?php echo $print['order_id'];?></td>       
  <td><?php echo $print['company_name'];?></td>
	<td><?php echo $print['sales_person'];?></td>
		  <td><?php echo $print['client_servicing'];?></td>
		   <td><?php echo $print['region'];?></td>
			 <td><?php 
                         if($status_packager==0){ echo $status;}else{ echo $complete;}
                         
                         ?></td>
			 <td>
		 <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/view_orders_details/<?=$print['order_id'];?>');">View </a> <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/edit_packager_order?order_id=<?=$print['order_id'];?>');">/Edit</a><a href="#" data-toggle="modal" data-target="#myModal" class="sendmail"  data-mail="packager" data-id="<?=$print['order_id'];?>" >/ Send Mail</a>
<td><?php echo $print['created_date'];?></td>


	  </tr>
	   <?php }elseif($this->session->userdata('userid')=='courier@wallsnart.com'){?>
	  <tr>
   <td><?php echo $print['order_id'];?></td>       
  <td><?php echo $print['company_name'];?></td>
	<td><?php echo $print['sales_person'];?></td>
		  <td><?php echo $print['client_servicing'];?></td>
		   <td><?php echo $print['region'];?></td>
			 <td><?php 
                         if($status_courier==0){ echo $status;}else{ echo $complete;}
                         
                         ?></td>
			 <td>
                             <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/view_orders_details/<?=$print['order_id'];?>');">View </a> <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/edit_courier_order?order_id=<?=$print['order_id'];?>');">/Edit</a><a href="#" data-toggle="modal" data-target="#myModal" class="sendmail" data-mail="courier" data-id="<?=$print['order_id'];?>" >/ Send Mail</a>
<td><?php echo $print['created_date'];?></td>


	  </tr>
	  <?php }?>
         
                   
          
                  
                  
              
                  <?php } } else{?> <td><span style="color:red">No data Found</span></td><?php } ?>
       
      </table>
               
      </div></td>
      </tr>
  </table>
</div>
</div>




</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>




<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Mail</h4>
        </div>
        <div class="modal-body">
            <br>
             <span style="font-size: 14px; float: left;">If you want to send for multi user Then separate with (,). <br>Example: 
            mail1@gmail.com,mail2@gmail.com
            </span><br>
            <input type="hidden" name="mail" id="mail_send" value="">
             <input type="hidden" name="order_id" id="send_order_id" value="">
             <textarea name="mail_id" id="mail_id" cols="44" rows="6"></textarea>
             <br><span id="error_msg" style="font-size:14px; color:red;"></span>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-default" id="send_mail_btn" >Send</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<style>
    textarea { font-size: 18px; }
    </style>
<script>
    $(document).on('click','#send_mail_btn',function(){
         
       var mailsend= $('#mail_send').val();
         var mail_id= $('#mail_id').val();
       var order_id= $('#send_order_id').val();
        if($('#mail_id').val()=='')
        {
            $('#error_msg').html('Please enter mail id');
        }else{
           $('#error_msg').html(''); 
        
        
         $.ajax({
            type:"post",
           url:"<?=base_url()?>index.php/backend/sendmail",
             data:"order_id="+order_id+"&mailsend="+mailsend+"&mail_id="+mail_id,
             success:function(response){
                $('#error_msg').html(response); 
             }
         });
         }
        
    });
    $(document).on('click','.sendmail',function(){
        var mailsend=$(this).data('mail');
        var order_id=$(this).data('id');
        $('#mail_send').val(mailsend);
        $('#send_order_id').val(order_id);
        });
    </script>