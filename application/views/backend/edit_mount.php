<?php $mount=explode(',',$details->mount_upload_image_name); 
?>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
			
		$("#add_form").submit(function(){
			
			
			
				if(	$('#type').val()=="")
				{
					
					$('#type_error').html("Please Enter Frame Type");
					return false;
				}
				else if($('#colour').val()=="")
				{
					$('#type_error').html("");
					$('#colour_error').html("Please Enter Colour");
					return false;
				}
				else if($('#thickness').val()=="" )
				{
					$('#type_error').html("");
					$('#colour_error').html("");
					$('#thickness_error').html("Please Enter Thickness");
					return false;
				}
			
				
			});
		});

</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add New Mount</div>

<div class="add-newcp"><div><?php echo $msg;?></div>
<div class="mndry">*Mandatory Fields</div>
<form action="<?php echo base_url();?>index.php/backend/edit_mount/<?php echo $details->mount_id;?>" method="post" enctype="multipart/form-data" id="add_form" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#e5e5e5">
    <td width="200">Personal / Company Information</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
  <td>Mount Type*</td>
    
	 <td><select name="type" id="type" class="inputbxs" style="width:243px;" ><option <?php if($details->mount_type=='Acid Free'){?> selected="selected"<?php }?>>Acid Free</option><option <?php if($details->mount_type=='Archival'){?> selected="selected"<?php }?>>Archival</option></select><span id="type_error" style="color:#F00"></span></td>
	</tr>
	 <tr>
  <tr class="toptr">
    <td>Color*</td>
    <td><select name="colour" id="colour" class="inputbxs" style="width:243px;"><?php $color=$this->backend_model->color(); foreach($color as $c){?><option <?php print $col=$c->color;print $det=$details->mount_colour;if($col==$det){?> selected="selected" <?php } ?>><?php print $c->color;?></option><?php } ?></select><span id="colour_error" style="color:#F00"></span></td>
  </tr>
  <tr>
 <td>Thickness*</td>
    <td><select name="thickness" id="thickness" class="inputbxs" placeholder="In Microne" style="width:243px;"><?php for($i=1000;$i<=3000;$i++){?><option <?php if($details->mount_thickness==$i){?> selected="selected"<?php } ?>><?php  echo $i; ?></option><?php  } ?></select><span id="thickness_error" style="color:#F00"></span></td>
    </tr>
 <tr>
	 <td>Upload the Mount Image</td>
    <td><input type="file" name="file10" id="file10" class="inputbxs" /><span id="file10_error" style="color:#F00"></td>
	<tr>
	     <td></td>
		 <td><input type="file" name="file11" id="file11" class="inputbxs" /><span id="file11_error" style="color:#F00"></td>
	</tr>
    </tr>
	<tr>
    <td>Recommended</td>
    <td><input type="radio" name="recommended" id="recommended" value="1" <?php if($details->mount_recommended=='1'){?> checked<?php }?>>Yes</input><br><input type="radio" name="recommended" value="0" <?php if($details->mount_recommended=='0'){?> checked<?php }?>>No</input>
   
    </td></tr>
	<input type="hidden" name="hid_file10" value=<?= $mount['0']; ?> />
     <input type="hidden" name="hid_file11" value=<?= $mount['1']; ?> />
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


