<script language="javascript">
function pagination_page() {
	var pagination_page = $("#pagination_page").val();
	if(pagination_page ==1) {
	var url = '<?= base_url() ?>index.php/backend/view_mount/';
	}
	else {
	var url = '<?= base_url() ?>index.php/backend/view_mount/'+pagination_page;
	}
	location.replace(url);
}
</script>
<div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> View Mount</div>


<div class="view-cp">
<div class="searchc" style="width:100%">Search Parameters</div>
<form action="<?=base_url()?>index.php/backend/view_mount" method="post" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>&nbsp;</tr>
<tr>

</tr>
<tr>&nbsp;</tr>


<tr>
        <td width="17%">Search Filter</td>

        <td width="17%">
                    type:&nbsp;<select name="code2" id="code2" class="inputs">
                      <option value=''>Select Mount Type</option>
                      <option <?php if($this->input->post('code2')=='Acid Free'){?> selected="selected"<?php } ?>>Acid Free</option>
                      <option <?php if($this->input->post('code2')=='Archival'){?> selected="selected"<?php } ?>>Archival</option>
                                      </select>
        </td>

        <td width="20%">
                    Thickness:&nbsp;<input type="text" name="width" value="<?php print $this->input->post('width');?>" />
        </td>


        <td width="23%">
                    Date:&nbsp;
                    <input type="date" name="date" value="<?php print $this->input->post('date');?>" />
        </td>


        <td width="40%">
                    Color:&nbsp;<input type="text" name="color" value="<?php print $this->input->post('color');?>" />
        </td>
<td width="40%">
                    <input type="submit"  name="search" value="Search" />
        </td>

        </tr>
	</table>


    </td>
</tr>
  </table>

</form>

</div>


<div class="customer-list">
    <div class="hdrlist">Mount List</div>  
		Total Mount:<span class="count"><?php echo $total_mount;?></span>  
<a href="<?php echo base_url();?>index.php/backend/mountMaster" class="addnewcp">Add New Mount</a></div>  



  <div class="view-cp-list">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
      <div class="viewcplist-inner">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
                <td width="52">S.No</td>
                <td width="106">Mount Code</td>
                <td width="119">Mount Type</td>
                <td width="119">Thickness</td>
                <td width="174">Color</td>
                <td width="184">Recommended</td> 
                <td width="184">Upload Images </td> 
                <td width="184">Created Date</td> 
                <td width="184">Tools</td> 
          </tr>
          
 <tbody>  
 <?php if($get_mount){ $i=1; foreach($get_mount as $key=>$mount) {  ?> 
<tr>
            <td><?= $i ?></td>
            <td><?= $mount['mount_code'] ?></td>
            <td><?= $mount['mount_type'] ?></td>
            <td><?= $mount['mount_thickness'] ?></td>
            <td><?= $mount['mount_colour'] ?></td>
            <td><?php if($mount['mount_recommended']==1){print "Yes";}else{print "No";} ?></td>
			<td><?= $mount['mount_upload_image_name'] ?></td>
            <td><?= $mount['mount_created_date'] ?></td>
           
            <td><a href="<?php echo base_url();?>index.php/backend/edit_mount/<?php echo $mount['mount_id'];?>">Edit</a></td>

</tr>   
<?php  $i++; } ?>
    </tbody>
    <?php   } else { ?> <td></td><td> <span style="color:red;">No data Found</span> </td><?php }?>
          </table>



            <div style="float:right;">
        <select name="pagination_page" id="pagination_page" onChange="pagination_page()">
	<?php  	
		print $total_pages = ceil($total_mount/10);
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


</div></div>