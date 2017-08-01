<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
function get_mount(id)
{
	var datastring='mount_id=' + id ;
				$.ajax({
					    type: "POST",
					    url: "<?php print base_url() ?>index.php/backend/get_mount",
					    data: datastring,
						success: function(data)
					     {
							
							var value=data.split("/");
							
							$('#mcolor').val(value['0']);
							$('#thickness').val(value['1']);
							
														
						 }
													 });
}
</script>
<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add New Mount Details</div>

<div class="add-newcp"><div><span style="color:red;"><?php echo $msg;?></div>
<div class="mndry">*Mandatory Fields</div>
<form action="<?php echo base_url();?>index.php/backend/add_mountvendor" method="post" enctype="multipart/form-data" id="add_form" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	 <tr style="background:#e5e5e5">
    <td>Mount Details</td>
    <td>&nbsp;</td>
  </tr>
   <?php if(!$id) { ?>
  <tr>

  <td>Company Name</td>
    <td>
	  <select name="vendor" id="vendor" class="inputbxs" style="width: 243px;height: 35px;"><option>Select Company Name</option>
	  <?php foreach($vender as $ven)
   {?>
    <option ><?php print $ven['vender_company_name'];?></option>
    <?php } ?>
	
	  </select>
	</td></tr><?php } ?>
  <tr>
  <td>Mount Type</td>
    <td>
	  <select name="mountType" id="mountType" class="inputbxs" style="width: 243px;height: 35px;" onchange="get_mount(this.value)"><option>Select Mount Type</option>
	   <?php foreach($mounts as $mount)
   {?>
    <option value="<?php print $mount->mount_id;?>"><?php print $mount->mount_type;?></option>
    <?php } ?>
	  </select>
	</td></tr>
	 <tr>
    <td>Color</td>
    <td><input type="text" name="mcolor" id="mcolor" class="inputbxs"  readonly/></td>
    </tr>
	 <tr>
    <td>Thickness</td>
    <td><input type="text" name="thickness" id="thickness" class="inputbxs" placeholder="In Microne" readonly/></td>
    </tr>
	<tr>
    <td>Cost Per Sq. Feet</td>
    <td><input type="text" name="costpersq" id="costpersq" class="inputbxs"  /></td>
    </tr>
	
	 <tr>
    <td>Stock Availability Status</td>
    <td><input type="radio" name="savalstatus"  value="1" checked="checked">Yes</input><br><input type="radio" name="savalstatus"  value="0">No</input>
    </tr>
	 <tr>
    <td>Status</td>
    <td><input type="radio" name="status"  value="1" checked="checked">Active</input><br><input type="radio" name="status"  value="0">Inactive</input>

    </tr>
	 <tr>
    <td>Selling Price</td>
    <td><input type="text" name="msprice" id="msprice" class="inputbxs" /></td>
    </tr>
	<tr>
    <td>Recommended</td>
    <td><input type="radio" name="recommended" id="recommended" value="1" checked>Yes</input><br><input type="radio" name="recommended" value="0">No</input></td>
    </tr>
   
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


