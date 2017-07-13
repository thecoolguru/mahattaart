<?php
$rows=$this->frontend_model->count_images_lightbox($lt_id);
?>
<td>
	<img src="http://www.indiapicture.in/wallsnart/158/<?php print $filename;?>" />
</td>
<form name="form1" method="get" id="form1" action="<?php echo base_url();?>index.php/frontend/lightbox">
	<td><input name="lt_nm" type="text" id="lt_nm" value="<?php echo $lt_nm;?>" class="galname-edit" />
	</td>
	<td>
		<label for="textarea"></label> 
		<textarea name="lt_des" id="lt_des" cols="16" rows="2" class="galdesc-edit1"><?php if($result->lightbox_description){echo $result->lightbox_description;}else {echo "--";}?>
		</textarea>
	</td> 
		<input type="hidden" id="check" name="check" value="<?php echo '2';?>" />
		<input type="hidden" id="lightbox" name="lightbox" value="<?php echo $lt_id;?>" />
	</td>
	<td><?php if($rows)echo $rows; else echo '0';?></td>
	<td><?php echo $result->creation_date;?></td>
	<td><input type="submit" name="save" id="save" value="Save" style="background-color:#d0d0d0;width: 80px;height: 30px;border: none;" /></td>
</form>
