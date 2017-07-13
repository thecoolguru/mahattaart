<script language="javascript">
function pagination_page() {
	var pagination_page = $("#pagination_page").val();
	if(pagination_page ==1) {
	var url = '<?= base_url() ?>index.php/backend/view_frames/';
	}
	else {
	var url = '<?= base_url() ?>index.php/backend/view_frames/'+pagination_page;
	}
	location.replace(url);
}
</script>
<div id="middle-wrapper">
<div id="middle-container" style="width:100%"> 

<div class="view-cp">
<div class="searchc" style="width:100%">Search Parameters</div>
<form action="<?=base_url()?>index.php/backend/view_frames" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>&nbsp;</tr>

<tr>&nbsp;</tr>


<tr>
        <td width="17%">Search Filter</td>

        <td width="17%">
                    Type:
                    <select name="code2" id="code2" class="inputs">
                      <option value=''>Select Frame Type</option>
                      <option <?php if($this->input->post('code2')=='Wooden'){?> selected="selected" <?php }?>>Wooden</option>
                      <option <?php if($this->input->post('code2')=='Synthetic'){?> selected="selected" <?php }?>>Synthetic</option>
                                      </select>
        </td>

        <td width="20%">
                    Width:<input type="text" name="width" value="<?php print $this->input->post('width');?>" />
        </td>


        <td width="23%">
                    Date:
                    <input type="date" name="date" value="<?php print $this->input->post('date');?>" />
        </td>


        <td width="40%">
                    Color:<input type="text" name="color" value="<?php print $this->input->post('color');?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search" value="Search" />
        </td>
        </tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
           <tr>
            	<td colspan="4"></td></tr>

	</table>


    </td>
</tr>
  </table>

</form>
</div>

<div class="customer-list">
    <div class="hdrlist">Frame List</div>  
		Total Frame:<span class="count"><?= $total_rows;?></span>  
<a href="<?php echo base_url(); ?>index.php/backend/frameMaster" class="addnewcp">Add New Frame
</a></div>  


<div class="main-hdr"> View Frames</div>
   
  <div class="view-cp-list">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
      <div class="viewcplist-inner">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="52">S.No</td>
          <td width="106">Frame Code</td>
          <td width="119">Frame Type</td>
          <td width="119">Frame Width</td>
          <td width="119">Frame Created date</td>
          <td width="164">Frame Color</td>
          <td width="174">Frame Recommended</td>
          <td width="156">Frame Upload(Images)</td>
          <td width="184">Tools</td>            
          </tr>
          
 <tbody>  
 <?php if($get_frame){ $i=1; foreach($get_frame as $key=>$frames) {  ?> 
<tr>
            <td><?= $i ?></td>
            <td><?= $frames['frame_code'] ?></td>
            <td><?= $frames['frame_type'] ?></td>
            <td><?= $frames['frame_width'] ?></td>
            <td><?= $frames['frame_created_date'] ?></td>
            <td><?= $frames['frame_colour'] ?></td>
            <td><?= $frames['frame_recommended'] ?></td>
            <td><?= $frames['frame_upload_image_name'] ?></td>

            <td><a href="<?=base_url()?>index.php/backend/edit_frame/<?= $frames['frame_id'] ?>">Edit</a></td>

</tr>   
<?php  $i++; } ?>
    </tbody>
 <?php   } else { ?> <td></td><td> <span style="color:red;">No data Found</span> </td><?php }?>
          </table>



            <div style="float:right;">
        <select name="pagination_page" id="pagination_page" onChange="pagination_page()">
	<?php  	
		print $total_pages = ceil($total_rows/10);
		for($i=1; $i<= $total_pages; $i++)
		{
		?>
        
	    <option value="<?= $i ?>" <?php if($page == $total_pages) {?>selected<?php } ?> ><?= $i ?></option>
        <?php	
		}
	 ?>
		</select>		            
            </div>

        </div>
          </td>
          </tr>
 			</table> 
  		  </div>
   
   
</div></div>