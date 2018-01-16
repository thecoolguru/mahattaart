<html>
   <head>
<title>Create Quotation</title>
<style>
.txtbox_f {    width: 61px;    height: 30px;}
.txtbox_f_offline{ width: 61px;    height: 30px;}
.txtbox_f_online{ width: 61px;    height: 30px;}
.s_custom{padding-left: 56px; }
.s_list{padding-left: 56px; }
</style>






</head>

<body>
  

<div id="middle-wrapper">

      <div id="middle-container" style=" width:100%;">

    <div class="main-hdr-quotation text-center"> Create Promocode</div>

    <style>

.manage-order .creat-ordertable tr td{ padding:8px 1px 8px 1px !important;} .hdrs td:nth-child(2) { width:100px;}

</style>

    <div id="quotationListDiv" class="manage-order" >
   <?php 
   ?>
          <!--<form  name="create_quotation" action="<?=base_url()?>index.php/backend/save_promo_offer/<?=$promo_detials[0]->sr_no?>" method="post"  enctype="multipart/form-data">
          !--->
          
<form  name="create_quotation" action="<?php echo base_url('backend/create_promo_code/code_id/status/'.$comman[0]->sr_no.'/'.$comman[0]->active);  ?>" method="post"  enctype="multipart/form-data">        

        <b  style=" font-size: 14px; color: green;">
	
            <?php if($msg<>'') {?>

            <script>              setTimeout(function(){outtime()},3000);

            function outtime(){                  window.location.href="view_quotations/";              }           </script>

            <?php echo $msg;}?></b><br>

        <br>
	
    
    
    <script>

$(document).ready(function()
{
   $("#promo_check").click(function(){
        $("#promo_name").toggle();
		$("#new_promo_name").toggle();
    });
	
	
	
	
  
  });


</script>

<script type ="text/javascript">
    $(document).ready(function(){
        $('#vendor_types').change(function(){						
       var vendor_types= $('#vendor_types').val();
	   //alert("ajax alert="+vendor_types);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/customer/get_query_details'); ?>",
			data:"vendor_types="+vendor_types,
			success:function(response)
			 {
            // alert("Response="+response)
				$("#vendor_location").html(response);
			 }	 
		    })	
       });
	   
	    $('#vendor_location').change(function(){						
       var vendor_location = $('#vendor_location').val();
	  // alert("VENDOR Location="+vendor_location);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/customer/get_query_location_keys'); ?>",
			data:"vendor_location="+vendor_location,
			success:function(response2)
			 {
           // alert(response2)
				 $("#vendor_location_id").val(response2);  //
			 }	 
		    })	
       });
	});
    </script>
    
 <script type ="text/javascript">
    $(document).ready(function(){
        $('#promo_for').change(function(){						
       var promo_for= $('#promo_for').val();
	   //alert("ajax alert="+promo_for);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php  echo base_url('index.php/backend/get_location_for'); ?>",
			data:"promo_for="+promo_for,
			success:function(response)
			 {
             //alert("Response="+response)
				$("#location").html(response);
			 }	 
		    })	
       });
	   
	   
	 
	    $('#location').change(function(){						
       var location = $('#location').val();
	  // alert("location="+location);
          	
			$.ajax({
		   type:"POST",
		    url:"<?php echo base_url('index.php/backend/get_location_id_for_promo_code'); ?>",
			data:"location="+location,
			success:function(response2)
			 {
            //alert(response2)
				 $("#location_id").val(response2);  //
			 }	 
		    })	
       });  
	});
    </script>   







<?php // print_r($promo_detials); ?>
<div class="viewcplist-inner">

                <div id='TextBoxesGroup_custom'>

                                        <div id="TextBoxDiv1_custom">	  

<table width="100%" align="center" cellpadding="0" cellspacing="0" class="creat-ordertable">

  <tr bgcolor="#388fc4">

    <td><span style="color:#FFF;">Promo code details</span> &nbsp; </td><td></td><td></td><td></td><td></td><td></td>

  </tr>
 <p style="color:green"> <?php  if(isset($query_message)){echo $query_message;}?></p>
 
 <tr class="darktr">
    <td width="277" class="bold">Promo For:</td>
       <td>
           <select name="promo_for" id="promo_for">
              <option value="">---Select Promo For---</option>
	          <option value="kiosk" <?php if($comman[0]->prom_for=='kiosk'){echo "selected";}?>>Kiosk</option>
              <option value="sis" <?php   if($comman[0]->prom_for=='sis'){echo "selected";}?>>Sis</option>
              <option value="web" <?php   if($comman[0]->prom_for=='web'){echo "selected";}?>>Web</option>
         </select> 
    <em style="color:red"><?php echo form_error('promo_for'); ?></em>     

    </td>
    
    <td width="277" class="bold">Location:</td>
    <td>
           <select name="location" id="location">
            <?php  if(isset($comman[0]->location)){?>
            <option value="<?php echo  $comman[0]->location ?>"><?php echo  $comman[0]->location ?></option>
            <?php }else{?>
            <option value="">Select Location</option>  
          <?php }?>
           </select> 
    </td>
    <td width="277" class="bold">Location ID:</td>
    <td>
       <input type="text"  name="location_id"  class="printer" id="location_id" readonly 
	   value="<?php if(!empty($comman[0]->location_key_id)){ echo $comman[0]->location_key_id;}?>"
          
    </td>
  </tr>
  
  <tr class="darktr">
    <td class="bold">Promo Name:</td>
      <td><input type="checkbox" data-id="0" name="promo_check" value="true"  class="printer" id="promo_check" checked></td>
    <td>
       <select name="promo_name" id="promo_name">
	          <option value="">---Select Promo Name---</option>
              <?php foreach($promo_detials as $promo)
			  { ?>
<option value="<?php echo $promo->promo_name; ?>" <?php if($promo->promo_name==$comman[0]->promo_name){echo 'selected';} ?>>
<?php echo $promo->promo_name; ?></option>
              <?php }?>
	</select>
    </td>
  <td>
   <div id="new_promo_name"  style="display:none">
     <input type="text"  data-id="0" name="new_promo_name" placeholder="Add New Promo Name" class="printer" value="<?php if($this->input->post('new_promo_name')) echo $this->input->post('new_promo_name'); ?>" >
   </div>
  </td>
  
  
  <?php 
  if(isset($comman[0]->active)){
  ?>
  <td class="bold">Promo code Status:</td>
  <td>
    <select name="prom_code_status" id="prom_code_status" onChange="fun_offer_days(this.value);">
    <?php  if(!empty($comman[0]->active)){$value=$comman[0]->active;}else{$value='';} ?>
	<option value="<?php echo $value; ?>"  if  >--Select Status--</option>
	<option  value="1" <?php if($comman[0]->active=='1'){echo "selected";}?>>Active</option>
	<option  value="0" <?php if($comman[0]->active=='0'){echo "selected";}?>>Deactive</option>
    <!--
    <option  value="0" <?php  // if($comman[0]->active=='2'){echo "selected";}?>>Expired</option>
     -->
	</select>
  
  </td>
  
  <?php } ?>
 </tr>
  <tr class="darktr">
    <td width="277" class="bold">Promo code:</td>
    <td>
<input type="text"   data-id="0" name="promo_code" class="printer" value="<?php if(!empty($comman[0]->promo_name_code)){echo $comman[0]->promo_name_code; }else{ echo $this->input->post('promo_code');}  ?>" >
         <em style="color:red"><?php echo form_error('promo_code'); ?></em>
    </td>
    
    <td class="bold">Offer(%):</td>
    <td>
    
 <input type="text" data-id="0" name="offer_precentage"  class="printer" value="<?php if(!empty($comman[0]->offer_precentage)){echo $comman[0]->offer_precentage; }else{ echo $this->input->post('offer_precentage');}  ?>
" >
  
    </td>
	 <td class="bold">Valid Days:</td>
    <td><!--<textarea data-id="0" name="valid_days"  class="printer" ><?=$promo_detials[0]->valid_days?></textarea>-->
	<select name="valid_days" id="" onChange="fun_offer_days(this.value);">
	<option value="">--Select Days--</option>
	<option  value="8" <?php if($comman[0]->valid_days=='8'){echo "selected";}?>>All Days</option>
	<option  value="9" <?php if($comman[0]->valid_days=='9'){echo "selected";}?>>Weekend</option>
	<option  value="10" <?php if($comman[0]->valid_days=='10'){echo "selected";}?>>Weekdays(M->F)</option>
	<option  value="1" <?php if($comman[0]->valid_days=='1'){echo "selected";}?>>Monday</option>
	<option  value="2" <?php if($comman[0]->valid_days=='2'){echo "selected";}?>>Tuesday</option>
	<option  value="3" <?php if($comman[0]->valid_days=='3'){echo "selected";}?>>Wednesday</option>
	<option  value="4" <?php if($comman[0]->valid_days=='4'){echo "selected";}?>>Thursday</option>
	<option  value="5" <?php if($comman[0]->valid_days=='5'){echo "selected";}?>>Friday</option>
	<option  value="6" <?php if($comman[0]->valid_days=='6'){echo "selected";}?>>Saturday</option>
	<option  value="7" <?php if($comman[0]->valid_days=='7'){echo "selected";}?>>Sunday</option>
	</select>
	</td>
  </tr>
  
  <script>
  $( function() {$("#date_from_text" ).datepicker();} );
  </script>
  
  <tr class="darktr">
    <td width="277" class="bold">Valid From:</td>
  <td>
  
  <?php  if(isset($comman[0]->valid_from_date)){ ?>
 <input type="text" data-id="0" name="date_from_text" id="date_from_text"   class="printer" value="<?php  echo $comman[0]->valid_from_date; ?>">
  
  <?php } else{?>
   <input type="date" data-id="0" name="date_from" id="date_from"   class="printer" 
  value="<?php echo $this->input->post('date_from');  ?>">
  <?php } ?>
  
  </td>
     
    <td class="bold">Valid To:</td>
   <td>
   <?php  if(isset($comman[0]->valid_end_date)){ ?>
 <input type="text" data-id="0" name="date_to_text" id="date_to_text"   class="printer" value="<?php  echo $comman[0]->valid_end_date; ?>">
    <?php } else{ ?>
    <input type="date" data-id="0" name="date_to"  class="printer" id="date_to"  value="<?php if(!empty($comman[0]->valid_end_date)){echo $comman[0]->valid_end_date; }else{ echo $this->input->post('date_to');}  ?>">
  <?php } ?> 
   </td>
   
    <td width="444" class="bold">Condition:</td>
    <td>
    <textarea name="promo_condition"  id="promo_condition" rows="10" cols="40">
    <?php if(!empty($comman[0]->promo_condition)){echo $comman[0]->promo_condition; }else{ echo $this->input->post('promo_condition');}  ?>
    </textarea  >
 
    </td>
   
  </tr>
  <tr >
   
  </tr>
 </table>

</div> 
</div>

		<div style="padding:30px; text-align:left">
        <?php  if(isset($comman[0]->sr_no)){$value="Update";}else{$value="Save";}?>
              <input type="submit" name="addcpn" id="addcpn"  value="<?php echo $value; ?>" class="btn btn-success pull-right" >
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
function fun_offer_days(value){
//alert(value)
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

.printer{width: 111px; height: 30px;}

.sp_amount{width: 81px; height: 30px;}

</style>