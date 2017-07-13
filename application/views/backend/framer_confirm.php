<?php  $framer = $this->backend_model->get_frame(); ?>
<?php  $vendor = $this->backend_model->get_vendor(); ?>

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>




  <script type="text/javascript">
function get_frame_values(id)
{	
	var datastring='frame_id=' + id ;
				$.ajax({
					    type: "POST",
					    url: "<?php print base_url() ?>index.php/backend/get_frame_values",
					   data: datastring,
						success: function(data)
					     {
							//alert(data);
							var value=data.split("/");							
							$('#width').val(value['0']);
							$('#color').val(value['1']);
														
						 }
													 });
}
</script>  
<script type="text/javascript">
function validateField(field) {

  var input = document.getElementById(field);
 //alert(input); 
  input.style.borderColor = "";
  input.style.backgroundColor = "";

  if (input.value.trim() == "") {
    
    input.style.borderColor = "#c00";
    input.style.backgroundColor = "#fee";
    return false;
  }
  return true;
}

function validate() {
  var valid = true;
  var fields = ['vendor_company_name' , 'printing_frame'];
  for (var i in fields) {
    valid = validateField(fields[i]) && valid;
  }

  return valid;
}
</script>

 

<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add New Frame Details</div>

<div class="add-newcp"> <span style="color:red"><?= $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form action="<?php echo base_url();?>index.php/backend/show_framer/<?php echo $id?> " method="post" enctype="multipart/form-data" id="add_form" onsubmit="return validate();" >

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td>Status</td>
    <td><input type="radio" name="mstatus" id="mstatus" value="1" checked="checked">Active</input><br><input type="radio" name="mstatus" value="0">Inactive</input></td>
    </tr>
	 
<?php if(!$insert_id){?>
  <!--<tr>
    <td>Company Name*</td>
        <td><select name="vendor_company_name" id="vendor_company_name" class="inputbxs" /><option value="">Select Company Name</option>
   <?php foreach($vendor as $v)
   {?>
    <option  value="<?php print $v['vender_id'];?>"><?php print $v['vender_company_name'];?></option>
    <?php } ?>
   </select> <?php } ?>
   </td>  
    </tr>-->
  <tr>
  

  <tr>
    <td> Type of Frame*</td>
        <td><select name="printing_frame" id="printing_frame" class="inputbxs"  onchange="get_frame_values(this.value)"/><option value="">Select Frame Type</option>
   <?php foreach($framer as $framer_detail)
   {?>
    <option value="<?php print $framer_detail['frame_id'];?>"><?php print $framer_detail['frame_type'];?></option>
    <?php } ?>
   </select>
   </td>  
    </tr>
   
    <tr>
    <td>Print Code</td>
   <td><input type="text" name="print_code" id="print_code" class="inputbxs"/></td> 
   </tr>
   
   <tr>
    <td>Glass/Acrylic/none</td>
   <td><input type="text" name="gl_ac_ne" id="gl_ac_ne" class="inputbxs"/></td> 
   </tr>
   
  <tr>
    <td>Glass Code/Acrylic Code</td>
   <td><input type="text" name="glass_acry_code" id="glass_acry_code" class="inputbxs"/></td> 
   </tr>

  

   <!--<tr>
    <td>Width/Inches of Frame</td>
    <td><input type="text" name="width" id="width" class="inputbxs"  placeholder="min-0.5 inches, max-2 inches" />
      
    </tr>
  <tr>
    <td>Color</td>
    <td><input type="text" name="color" id="color" class="inputbxs" /></td>
    </tr>-->
  <tr>
  
    <td>Cost Per Running Feet Frame</td>
    <td><input type="text" name="costperfeet" id="costperfeet" class="inputbxs"  /></td>
    </tr>
  
     <tr>
  
    <td>Cost Per sq. feet mount</td>
    <td><input type="text" name="cost_mount" id="cost_mount" class="inputbxs"  /></td>
    </tr>
  
   <tr>
  <td>Time/Frame</td>
  <td><input type="text" name="time_frame" id="time_frame" class="inputbxs"/></td>
  </tr>
   
   <tr>
  <td>Max frames/day</td>
  <td><input type="text" name="max_frame" id="max_frame" class="inputbxs"/></td>
  </tr>

   <tr>
  <td>Min Frame/day</td>
  <td><input type="text" name="min_frame" id="min_frame" class="inputbxs"/></td>
  </tr>

    
	 <!--<tr>
    <td>Stock Availability Status</td>
    <td><input type="radio" name="avalstatus" id="avalstatus" value="1" checked>Yes</input><br><input type="radio" name="avalstatus" value="0">No</input></td>
    </tr>
	 <tr>
    <td>Selling Price</td>
    <td><input type="text" name="sPrice" id="sPrice" class="inputbxs" /></td>
    </tr>-->

  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="Add" id="Add" value="Add"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>

</form>
</div>

</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>


