<script language="javascript">
function pagination_page() {
	var pagination_page = $("#pagination_page").val();
	if(pagination_page ==1) {
	var url = '<?= base_url() ?>index.php/backend/view_surface/';
	}
	else {
	var url = '<?= base_url() ?>index.php/backend/view_surface/'+pagination_page;
	}
	location.replace(url);
}
</script>
<div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> View Surface</div>


<div class="view-cp">
<div class="searchc" style="width:100%">Search Parameters</div>

<form action="<?=base_url()?>index.php/backend/view_surfaces" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>&nbsp;</tr>

<tr>&nbsp;</tr>


<tr>
        <td width="13%">Search Filter</td>

        <td width="20%">
                    Type : &nbsp; 
                      <select name="code2" id="code2" class="inputs">
                      <option value=''>Select Surface Type</option>
                      <option <?php if($this->input->post('code2')=='Fine Art'){?> selected="selected"<?php }?>>Fine Art</option>
                       <option <?php if($this->input->post('code2')=='Canvas'){?> selected="selected"<?php }?>>Canvas</option>
                         <option <?php if($this->input->post('code2')=='Translight'){?> selected="selected"<?php }?>>Translight</option>
                      
                </select>
        </td>

      <!--  <td width="20%">
                    Width : &nbsp;<input type="text" name="width" value="" />
        </td> -->


        <td width="23%">
                    Date : &nbsp;
                    <input type="date" name="date" value="<?php print $this->input->post('date');?>" />
        </td>


     <!--   <td width="40%">
                    Color : &nbsp;<input type="text" name="color" value="" />
        </td> -->
<td width="40%">
                     <input type="submit" name="search" value="Search" />
        </td>

        </tr>
          
	</table>


    </td>
</tr>
  </table>
  </form>
</div>


<div class="customer-list">
    <div class="hdrlist">Surface List</div>  
		Total Surface: &nbsp;<span class="count"><?php print $total_surface;?></span>  
<a href="<?=base_url()?>index.php/backend/add_master_surface" class="addnewcp">Add New Surface</a></div>  



  <div class="view-cp-list">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
      <div class="viewcplist-inner">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="52">S.No</td>
          <td width="106">Surface Code</td>
          <td width="119">Surface Type</td>
          <td width="119">Surface Created date</td>
          <td width="174">Surface  GSM</td>
          <td width="184">Tools</td>            
          </tr>
          
 <tbody>  
 <?php if($get_surface){$i=1; foreach($get_surface as $key=>$surface) { if($surface['surface_status']=='1'){?> 
<tr>
            <td><?= $i ?></td>
            <td><?= $surface['surface_item_code'] ?></td>
            <td><?= $surface['surface_type'] ?></td>
            <td><?= $surface['surface_created_date'] ?></td>
           <?php $dat=explode("_",$surface['surface_item_code']);?>
            <td><?= $dat['2']?></td>
            <td><a href="<?=base_url()?>index.php/backend/edit_master_surface/<?= $surface['surface_detail_id'] ?>">Edit</td>

</tr>   
<?php  $i++; }} ?><?php }else { ?><td><span style="color:red;">No data Found</span></td><?php } ?>
    </tbody>
          </table>



            <div style="float:right;">
        <select name="pagination_page" id="pagination_page" onChange="pagination_page()">
	<?php  	
		print $total_pages = ceil($total_surface/10);
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