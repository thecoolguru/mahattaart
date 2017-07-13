
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
			
		$("#edit_master_form").submit(function(){
              if(	$('#surface_type').val()=="")
				{
				  	
					$('#type_error').html("Please Enter Type");
					return false;
				}
				else if($('#gsm').val()=="")
				{
					$('#type_error').html("");
					$('#gsm_error').html("Please Enter Surface GSM");
					return false;
				}
		});
});

</script>
<div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Edit Surface</div>

<div class="add-newcp"><div><?php echo $msg; ?></div>
<form action="<?=base_url()?>index.php/backend/edit_master_surface/<?=$surface->surface_id?>" id="edit_master_form" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#e5e5e5">
    <td>Surface Information</td>
    <td>&nbsp;</td>
    </tr>
     <tr class="toptr">
    <td>Surface Type</td>
    <td><select name="surface_type" id="surface_type" class="inputbxs"><option value="" <?php if($surface->surface_type == ''){?> selected="selected"<?php } ?>>Select Surface Type</option><option value="Fine Art" <?php if($surface->surface_type == 'Fine Art'){?> selected="selected"<?php } ?>>Fine Art</option><option value="Canvas"  <?php if($surface->surface_type == 'Canvas'){?> selected="selected"<?php } ?>>Canvas</option><option value="Translight" <?php if($surface->surface_type == 'Translight'){?> selected="selected"<?php } ?>>Translight</option></select>
    <br /><span id="type_error" style="color:#F00"></span></td>
    </tr>
    <tr class="toptr">
    <td>Surface GSM</td>
    <td><select type="text" name="gsm" id="gsm" class="inputbxs" ><option>Select GSM</option><?php for($i=100;$i<=400;$i++){ ?>
	<option value="<?=$i;?>" <?php if($surface->surface_gsm == $i){?> selected="selected"<?php } ?>> <?php echo $i;?> </option><?php }?></select>
	<br /><span id="gsm_error" style="color:#F00"></span></td>
    </tr>
	 
     <tr>
    <td>Recommended</td>
    <td><input type="radio" name="recommended" id="recommended" value="1" <?php if($surface->surface_recommended=='1'){?>checked="checked"<?php } ?>>Yes</input><br><input type="radio" name="recommended" value="0" <?php if($surface->surface_recommended=='0'){?>checked="checked"<?php } ?>>No</input>
   
    </td>
    </tr>
     <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="bt_submit" id="bt_submit" value="Edit"  /></td>
    </tr>
    </table>

</form>
</div></div></div>