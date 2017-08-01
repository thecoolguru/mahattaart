<?php $surface=$this->backend_model->get_surface(); 
$printer=$this->backend_model->get_printer();?>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
function get_surface_values(id)
{
	var datastring='surface_id=' + id ;
				$.ajax({
					    type: "POST",
					    url: "<?php print base_url() ?>index.php/backend/get_master_surface",
					   data: datastring,
						success: function(data)
					     {
							//alert(data);
							var value=data.split("/");
							//alert(value['0']);
							$('#surface_creation_date').val(value['0']);
							$('#surface_gsm').val(value['1']);
														
						 }
													 });
}
</script>
<script type = "text/javascript">
$(document).ready(function(){
			
		$("#confirm_form").submit(function(){
		
			
			
				if(	$('#printer').val()=="")
				{
					
					$('#printer_error').html("Please Select Printer");
					return false;
				}
				
				else if(	$('#printing_surface').val()=="")
				{
					$('#printer_error').html("");
					$('#printing_surface_error').html("Please Select Printing_surface");
					return false;
				}
				else if(	$('#cost').val()=="")
				{
					$('#printer_error').html("");
					$('#printing_surface_error').html("");
					$('#cost_error').html("Please Select Cost");
					return false;
				}
				
				else if(	$('#stock').val()=="")
				{
					$('#printer_error').html("");
					$('#printing_surface_error').html("");
					$('#cost_error').html("");
					$('#printing_error').html("");
					$('#stock_error').html("Please Select Stock Availability");
					return false;
				}
		});
		});
</script>
<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add Surface Details</div>

<div class="add-newcp">
  <div style="margin:25px 0; padding:25px; background:#f7f7f7">Add Surface Details:</div><span style="color:#F00"><?=$msg;?></span>
  <form action="<?=base_url()?>index.php/backend/add_printer_confirm/<?=$printer_id;?>/<?=$printer_code;?>" method="post" id="confirm_form">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
     
    <tr style="background:#e5e5e5">
    <td>Job Details</td>
    <td>&nbsp;</td>
    </tr>
    <?php if(!$printer_id)
	{?> <tr>
    <td>Printer Company Name*</td>
    <td><select name="printer" id="printer" class="inputbxs" style="width: 243px;height: 35px;"/>
    <option selected="selected" value="">Select Printer</option>
   <?php  foreach($printer as $printer_detail)
   {?>
    <option value="<?php print $printer_detail['vender_id']."/".$printer_detail['vender_code'];?>"><?php print $printer_detail['vender_company_name'];?></option>
    <?php }  ?>
   </select><br /><span id="printer_error" style="color:#F00"></span>
   </td>
    </tr>
   <?php } ?> 
    
  <tr>
    <td>Printing Surface Type*</td>
    <td><select name="printing_surface" id="printing_surface" class="inputbxs" style="width: 243px;height: 35px;" onchange="get_surface_values(this.value)">
  <option selected="selected" value="">Select Surface Type</option>
   <?php  foreach($surface as $surface_detail)
   {?>
    <option value="<?php print $surface_detail['surface_id'];?>"><?php print $surface_detail['surface_type'];?></option>
    <?php }  ?>
   </select><br /><span id="printing_surface_error" style="color:#F00"></span>
   </td>
    </tr>
  <tr>
    <td>Cost Per Sq. Inch*</td>
    <td><input type="text" name="cost_per_sqinch" id="cost" class="inputbxs" placeholder="Enter Only Number"  /><br /><span id="cost_error" style="color:#F00"></span></td>
    </tr>
     <tr>
    <td>Printing Machine Details</td>
    <td><input type="text" name="printing" id="printing" class="inputbxs" /><span id="printing_error" style="color:#F00"></span></td>
    </tr>
   <!-- <tr>
    <td>Stock Availability Status*</td>
    <td><input type="radio" name="stock" id="stock" value="1" checked="checked">Yes</input><br><input type="radio" name="stock" value="0">No</input>
<span id="stock_error" style="color:#F00"></span></td>
    </tr>-->
    <tr>
    <td>Status</td>
    <td><input type="radio" name="status"  value="1" checked="checked">Active</input><br><input type="radio" name="status"  value="0">Inactive</input>
</td>
    </tr>
 <!--  <tr>
    <td>Saling Price</td>
    <td><input type="text" name="saling_price" id="saling_price" class="inputbxs" placeholder="Enter Only Number" /></td>
  </tr>-->
  
  <tr>
    <td>Surface Creation Date</td>
    <td><input type="text" name="surface_creation_date" id="surface_creation_date" class="inputbxs" readonly="readonly" /></td>
  </tr>
  <tr>
    <td>Surface GSM</td>
    <td><input type="text" name="surface_gsm" id="surface_gsm" class="inputbxs" readonly="readonly" /></td>
  </tr>
 
    <tr>
    <td>Surface Recommended</td>
    <td><input type="radio" name="recommend" id="recommend" value="1" checked="checked">Yes</input><br><input type="radio" name="recommend" value="0">No</input>
<span id="stock_error" style="color:#F00"></span></td>
    </tr>
    <td>&nbsp;</td>
    </tr> 
    <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="upload images" id="upload images" value="Add"  /></td>
    </tr>
</table>

</form>
</div>
</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


