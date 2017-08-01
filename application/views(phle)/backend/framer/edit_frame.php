<?php  if($frame->frame_upload_image_name){$dframe=explode(',',$frame->frame_upload_image_name);  } else{ $dframe='';} ?>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
			
		$("#add_form").submit(function(){
			
			
			
				if(	$('#type').val()=="")
				{
					
					$('#type_error').html("Please Enter Frame Type");
					return false;
				}
				else if($('#width').val()=="" )
				{
					$('#type_error').html("");
					
					$('#width_error').html("Please Enter Width");
					return false;
				}
			
				else if($('#colour').val()=="")
				{
					$('#type_error').html("");
					$('#width_error').html("");
					$('#colour_error').html("Please Enter Colour");
					return false;
				}
				
			/*	else if($('#file2').val()=="" && $('#file3').val()=="" && $('#file4').val()=="" && $('#file5').val()=="" && $('#file6').val()=="" && $('#file7').val()=="" && $('#file8').val()=="" && $('#file9').val()=="")
				{ 
				    $('#type_error').html("");
					$('#colour_error').html("");
					$('#width_error').html("");
					$('#file6_error').html("Choose All Frame Images");
					
					return false;
				}*/
				
			});
		});

</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr">Edit FrameMaster</div>

<div class="add-newcp"><div><?php // echo $msg;?></div>
<div class="mndry">*Mandatory Fields</div>
<form action="<?php echo base_url();?>index.php/backend/edit_frame/<?= $frame->frame_id?>" method="post" enctype="multipart/form-data" id="add_form" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#e5e5e5">
    <td width="200">Personal / Company Information</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td>Frame Type*</td>
    <td><select name="type" id="type" class="inputbxs" ><option value="" <?php if($frame->frame_type==''){?> selected="selected"<?php }?>>Select Frame Type</option><option <?php if($frame->frame_type=='Wooden'){?> selected="selected"<?php }?>>Wooden</option><option <?php if($frame->frame_type=='Synthetic'){?> selected="selected"<?php }?>>Synthetic</option></select><span id="type_error" style="color:#F00"></span></td>
    </tr>
  <tr class="toptr">
    <td>Frame Width*</td>
    <td><select name="width" id="width" class="inputbxs" ><option value="">Select Width</option><?php $width=$this->backend_model->width(); foreach($width as $d){?><option <?php if($frame->frame_width==$d->width){?> selected="selected" <?php  } ?>><?php print $d->width;?></option><?php }?></select><span id="width_error" style="color:#F00"></span></td>
  </tr>
  <tr class="toptr">
    <td>Frame Color*</td>
    <td><select name="colour" id="colour" class="inputbxs" ><option value="">Select Colour</option><?php $color=$this->backend_model->color(); foreach($color as $c){?><option <?php if($frame->frame_colour==$c->color){?> selected="selected" <?php  } ?>> <?php print $c->color;?> </option><?php }?></select><span id="colour_error" style="color:#F00"></span></td>
  </tr>
  <tr>
   <td>Upload the Frame Image*<br>8 Sizes of Frame</td>
    <td><input type="file" name="file2" id="file2" class="inputbxs" /></td>
	<tr> <td></td>
	<td><input type="file" name="file3" id="file3" class="inputbxs" /></td>
	</tr>
	<tr><td></td>
	<td><input type="file" name="file4" id="file4" class="inputbxs" /></td>
	</tr>
	<tr><td></td>
	<td><input type="file" name="file5" id="file5" class="inputbxs" /></td>
	</tr>
	<tr><td></td>
	<td><input type="file" name="file6" id="file6" class="inputbxs" /><span id="file6_error" style="color:#F00"></span></td>
	</tr>
	<tr><td></td>
	<td><input type="file" name="file7" id="file7" class="inputbxs" /></td>
	</tr>
	<tr><td></td>
	<td><input type="file" name="file8" id="file8" class="inputbxs" /></td>
	</tr>
	<tr><td></td>
	<td><input type="file" name="file9" id="file9" class="inputbxs" /></td>
	</tr>
    </tr>
	<tr>
    <td>Recommended</td>
    <td><input type="radio" name="recommended" id="recommended" value="1" <?php if($frame->frame_recommended=='1'){?> checked<?php }?>>Yes</input><br><input type="radio" name="recommended" value="0" <?php if($frame->frame_recommended=='0'){?> checked<?php }?>>No</input>
   
    </td></tr>
    <input type="hidden" name="hid_file2" value=<?php if($dframe){ print $dframe['0'];} ?> />
     <input type="hidden" name="hid_file3" value=<?php if($dframe){ print $dframe['1'];} ?>  />
      <input type="hidden" name="hid_file4" value=<?php if($dframe){ print $dframe['2'];} ?> />
       <input type="hidden" name="hid_file5" value=<?php if($dframe){ print $dframe['3'];} ?> />
        <input type="hidden" name="hid_file6" value=<?php if($dframe){ print $dframe['4'];} ?> />
         <input type="hidden" name="hid_file7" value=<?php if($dframe){ print $dframe['5'];} ?>  />
          <input type="hidden" name="hid_file8" value=<?php if($dframe){ print $dframe['6'];} ?>  />
           <input type="hidden" name="hid_file9" value=<?php if($dframe){ print $dframe['7'];} ?>  />
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="Add" id="Add" value="Edit"  /></td>
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


