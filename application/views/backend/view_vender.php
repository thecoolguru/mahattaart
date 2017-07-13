
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">



/*
function get_vender(id)
{ ///alert(id);
	var datastring='vender_type=' + id ;
				$.ajax({
					    type: "POST",
					    url: "<?php //print base_url() ?>index.php/backend/get_vender_data",
					   data: datastring,
						success: function(data)
					     { // alert(datastring);
							//alert(data);
							$('#vendor_name').html(data);
														
						 }
													 });
}

</script>
<script type="text/javascript">
function show_change(id)
{	

	//alert(id);
	var datastring='vender_id=' + id ;
				$.ajax({
					    type: "POST",
					    url: "<?php// print base_url() ?>index.php/backend/get_vender",
					   data: datastring,
						success: function(data)
					     { // alert(datastring);
							//alert(data);
							$('#vendor_details').html(data);
														
						 }
													 });

}*/
</script>
<script type="application/javascript">
function show_alert(data)
{ 
//alert(data);
if(data=='Printer')
{
var url='<?=base_url()?>index.php/backend/add_printer';
}
else if(data=='Framer')
{
	var url='<?=base_url()?>index.php/backend/add_framer';

}
window.location.assign(url);
	
}
</script>

<div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> View Vendor</div>

<form action="<?=base_url()?>index.php/backend/view_vender" method="POST">

<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120">Vender Type</td>
    <td width="275"><span style="font-size:12px">
      <select name="vender_type" id="vender_type" class="inputs" onChange="get_vender(this.value);" >
      <option selected="selected" value=""> Select Vendor Type</option>
   <option value="1" id="1" <?php if($this->input->post('vender_type')=='1'){?> selected="selected" <?php }?>>Printer</option>
   <option value="2" id="2" <?php if($this->input->post('vender_type')=='2'){?> selected="selected" <?php }?>>Framer</option>
     
      </select>
           </span></td>
           <td width="120">Vender Name</td>
    <td width="275"><span style="font-size:12px">
     <input type="text" name="vender_name" value="<?php print $this->input->post('vender_name');?>">
           </span></td>
		   <td width="120">Vender Code</td>
    <td width="275"><span style="font-size:12px">
     <input type="text" name="vender_code" value="<?php print $this->input->post('vender_code');?>">
           </span></td>		   
		   
    </tr>
	<tr><td width="120"> Region</td>
    <td width="275"><span style="font-size:12px">
      <select name="region" id="region" class="inputs" onChange="get_vender(this.value);" >
      <option selected="selected" value=""> Select Vendor Region</option>
      <option <?php if($this->input->post('region')=='East'){?> selected="selected" <?php } ?>>East</option>
       <option <?php if($this->input->post('region')=='West'){?> selected="selected" <?php } ?>>West</option>
        <option <?php if($this->input->post('region')=='North'){?> selected="selected" <?php } ?>>North</option>
         <option <?php if($this->input->post('region')=='South'){?> selected="selected" <?php } ?>>South</option>
        
      </select>
           </span></td>
		   <td width="120">Status</td>
    <td width="275"><span style="font-size:12px">
      <select name="vender_status" id="customer-type" class="inputs" onChange="get_vender(this.value);" >
      <option selected="selected" <?php if($this->input->post('vender_status')=='-1'){?> selected="selected" <?php }?>  value="-1"> Select Vendor Status</option>
     <option value="active" <?php if($this->input->post('vender_status')=='active'){?> selected="selected" <?php }?>>Active</option>
        <option value="Inactive" <?php if($this->input->post('vender_status')=='Inactive'){?> selected="selected" <?php }?>>In Active</option>
      
     
      </select>
           </span></td>
		   <td width="120">Email</td>
    <td width="275"><span style="font-size:12px">
     <input type="text" name="vender_email" value="<?php print $this->input->post('vender_email');?>">
           </span></td></tr>
		  <tr> <td width="120">Contact Person Name</td>
    <td width="275"><span style="font-size:12px">
     <input type="text" name="contact_name" value="<?php print $this->input->post('contact_name');?>">
           </span></td>
		    <td width="120">Date</td>
    <td width="275"><span style="font-size:12px">
     <input type="date" name="date" value="<?php print $this->input->post('date');?>">
           </span></td><td width="120"></td>
    <td width="275"><span style="font-size:12px">
     <input type="submit" name="search" value="Search">
           </span></td>	
		   </tr>
    </table>
    </div>
    </form>
    <div class="customer-list">
    <div class="hdrlist">Vendor List</div>  
Total Vendor :<span class="count"><?= $total_records;?></span>  

 <span style="margin-left:105px;"> <input type="radio" name="radio" value="Printer" onClick="show_alert(this.value);" /><a style="font-size:16px;font-style:!important"> &nbsp; Add New Printer</a> </span> <span style="margin-left:110px;">
<input type="radio" name="radio" value="Framer"  onClick="show_alert(this.value);"/><a style="font-size:16px;font-style:!important"> &nbsp; Add New Framer</a></span>

</div>

     <div align="right"> <?php if($links){ print $links;}?></div>
    <div style="height:25px;"> </div>
    <div>  
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="hdrs" id="vendor_name">
       
      <td>
      <div>
      <div class="viewcplist-inner">
     
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="150">Code </td>
          <td width="150">Company Name</td>
          <td width="120">Contact Person Name</td>
          <td width="120">Email Id</td>
          <td width="120">City</td>
          <td width="60">Region </td>
          <td width="100">Status</td>
          <td width="80">Services Offered</td>
          <td width="80">Tools</td>
              
          </tr>
          
          <?php  if($vendor) {
  foreach ($vendor as $print) {?>        
 <tbody>   
<tr>
<td><?php echo $print['vender_code'];?></td>
<td><?php echo $print['vender_company_name'];?></td>
<td><?php echo $print['vender_contact_person_name'];?></td>
<td><?php echo $print['vender_email_id'];?></td>
<td><?php echo $print['vender_city'];?></td>
<td><?php echo $print['vender_region'];?></td>
<td><?php if($print['vender_status']=='1'){ print "Active";} else{ print "Inactive";}?></td>
<td><?php echo $print['vender_services_offered'];?></td>
<td><?php if($print['vender_type']=='1'){?><a href="<?=base_url()?>index.php/backend/add_printer_confirm/<?= $print['vender_id']?>/<?= $print['vender_code']?>"><?php } else if($print['vender_type']=='2'){?><a href="<?=base_url()?>index.php/backend/add_mountvendor/<?= $print['vender_id']?>"><?php } ?>Add More Items</a> | <a href="<?=base_url()?>index.php/backend/view_details/<?= $print['vender_id']?>">View Details</a> | <a href="<?=base_url()?>index.php/backend/edit_vendor/<?= $print['vender_id']?>/<?= $print['vender_type']?>">Edit</a> | <a href="<?=base_url()?>index.php/backend/delete_vendor_data/<?= $print['vender_id']?>">Delete</a></td>
</tr>   
    </tbody>
    <?php } } else{?> <td><span style="color:red">No data Found</span></td><?php } ?>
   
          </table>
        </div>
          </div>
   
            
    
    </tr>
     
    </table>
    </div>
  
    
     <div id="vendor_details"></div>
     </div>
    </div>
    
  
