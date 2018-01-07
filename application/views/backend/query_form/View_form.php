<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <link href="<?=base_url()?>assets/css2/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/bootstrap-quirk.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script></head>

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



<body>

<div class="container-full">
 
  <table class="table table-bordered">
    <tr>
   <td><a href="<?php echo base_url('backend/add_query_form'); ?>">Add New</a></td>  
   
    </tr>
    
    <thead>
      <tr class="danger">
        <th>Sno</th>
		<th>Name</th>
        <th>Mobile</th>
        <th>Landline</th>
		<th>Email</th>
		<th>Edit</th>
		<th>Delete</th>
        <th>Add Submission</th>
		<th>More Details</th>
      </tr>
    </thead>
    <tbody>
      <?php
          if(isset($get_data)){
			    $i=1;
			  foreach($get_data as $rowa)
			  {
              
                 if($i%2==0){$value="info";}else{$value="success";}	{			
				 ?>
				 <tr class="<?php echo $value; ?>">
                     <td><?php echo $i; ?></td>
					 <td><?php echo $rowa->contact_person; ?></td>
                     <td><?php echo $rowa->contact_number; ?></td>
                     <td><?php echo $rowa->landline_number; ?></td>
					 <td><?php echo $rowa->email; ?></td>
<td><a href="<?php echo base_url('backend/edit/'.$rowa->id); ?>">Edit</a></td>
<td><a href="<?php echo base_url('backend/delete_record/'.$rowa->id);?>"   onClick="return del()" >Delete</a></td>
<td><a href="<?php echo base_url('backend/view_submissions/'.$rowa->id);?>">Add Submission</a></td>

<td><a href="<?php echo base_url('backend/view_form_query_details/'.$rowa->id); ?>">View Details</a></td>
                 </tr>
				  
				  <?php
				  $i++;
				 }
			  }
		  }
	  ?>
     
    </tbody>
  </table>
</div>

</body>
</html>
