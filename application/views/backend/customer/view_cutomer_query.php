<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/bootstrap-quirk.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />

  <script>
    
  </script>
  
<script>
function del()
  {
 var r=confirm("Are You Sure to Delete");
  if(r==true)
     {
	  return true;
	 }	
	 else
	  {
	  return false;
	  }
 }
  </script>

</head>
<body>
<?php  $this->load->view('backend/dashboard_header'); ?>
<div class="container-full">
  <table class="table" style="background:white">
    <thead>
      
	  <tr>  <td><a href="<?php echo base_url('customer/add_customer_query'); ?>">Add New</a></td> </tr>
	  
	  <tr>
        <th>Sno</th>
        <th>Cutomer Name</th>
        <th>Customer Email</th>
		<th>Mobile Number</th>
		<th>Vendor Type</th>
        <th>Vendor Location</th>
        <th>Location ID</th>
		<th>Interested in Product</th>
        <th>Bill No</th>
		<th>Feadback</th>
		<th>Edit</th>
		<th>Delete</th>
		<!----
		<th><input type="button" onClick="dele()" name"delete_permission" id="delete_permission" value="Delete"></th>
		-->
      </tr>
	  
    </thead>
    <tbody>
	
	<?php 
	  $i=1;
	  foreach($sucess as $rows)
	  {
	?>
      <tr style="font-size:13px" >
	    <td><?php echo $i;?></td>
        <td><?php echo $rows->customer_name;?></td>
        <td><?php echo $rows->customer_email;?></td>
		<td><?php echo $rows->customer_mobile;?></td>
		<td><?php echo $rows->vendor_types;?></td>
        <td><?php echo $rows->location;?></td>
        <td><?php echo $rows->vendor_location_key_id;?></td>
		<td><?php echo $rows->cutomer_interest;?></td>
        <td><?php echo $rows->bill_no;?></td>
		<td><?php echo $rows->cutomer_feadback;?></td>
		<th><a href="<?php  echo base_url('index.php/customer/add_customer_query/'.$rows->id);?>/experience/<?php echo $rows->experience;?>">Edit</a></th>
		<th><a href="<?php echo base_url('index.php/customer/delete_cutomer_query/'.$rows->id);?>"  onClick="return del()">Delete</a></th>
      </tr>
	  <?php
	  $i++;
	  }?>
    </tbody>
	<tr>
          
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
  </table>
</div>

</body>
<?php  $this->load->view('backend/footer');?>
</html>
