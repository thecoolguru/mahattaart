<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
			
		$("#add_master_form").submit(function(){
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
<div class="main-hdr"> Add New Surface</div>

<div class="add-newcp"><div><?php echo $msg; ?></div>
<form action="<?=base_url()?>index.php/backend/add_master_surface" id="add_master_form" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#e5e5e5">
    <td>Surface Information</td>
    <td>&nbsp;</td>
    </tr>
     <tr class="toptr">
    <td>Surface Type</td>
    <td><select name="surface_type" id="surface_type" class="inputbxs"><option>Select Surface Type</option><option>Fine Art</option><option>Canvas</option><option>Translight</option></select>
    <br /><span id="type_error" style="color:#F00"></span></td>
    </tr>
    <tr class="toptr">
    <td>Surface GSM</td>
    <td><select type="text" name="gsm" id="gsm" class="inputbxs" ><option>Select GSM</option><?php for($i=100;$i<=400;$i++){ echo '<option>'; echo $i; echo '</option>';}?></select>
	<br /><span id="gsm_error" style="color:#F00"></span></td>
    </tr>
	 <tr>
    <td>Recommended</td>
    <td><input type="radio" name="recommended" id="recommended" value="1" checked>Yes</input><br><input type="radio" name="recommended" value="0">No</input>
   
    </td>
    </tr>
     <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="bt-sbt-upload" name="bt_submit" id="bt_submit" value="Add"  /></td>
    </tr>
    </table>

</form>
</div></div></div>