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

 
 
  <p><a href="<?php echo base_url('Form_Controller/form_submit'); ?>">Add New</a></p>            
  <table class="table table-bordered">
    <thead>
      <tr class="danger">
        <th>Sno</th>
		<th>Person</th>
        <th>Mobile</th>
		<th>Email</th>
        <th>Sales Person</th>
        <th>Created Date</th>
		<th>Edit</th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
          if(isset($success)){
			    $i=1;
			  foreach($success as $rowa)
			  {
              
                 if($i%2==0){$value="info";}else{$value="success";}	{			
				 ?>
				 <tr style="font-size:13px" class="<?php echo $value; ?>">
                     <td><?php echo $i; ?></td>
					 <td><?php echo $rowa->person_name; ?></td>
                     <td><?php echo $rowa->person_mobile; ?></td>
                     <td><?php echo $rowa->person_email; ?></td>index.php/customer/update_kiosk_users
					 <td><?php echo $rowa->sales_person; ?></td>
      
                     <td><?php echo $rowa->created_date; ?></td>
<td><a href="<?php echo base_url('index.php/customer/update_kiosk_users/'.$rowa->id);?>">Edit</a></td>
<td><a href="<?php echo base_url('index.php/customer/delete_kiosk_users/'.$rowa->id);?>"onClick="return del()" >Delete</a></td>

                 </tr>
				  
				  <?php 
				  $i++;
				 }
			  }
		  }
	  ?>
      <tr>
 <td align="center"><a href="<?php echo base_url('index.php/customer/add_kiosk_users'); ?>">Add New</td>
 </tr>
     
    </tbody>
  </table>
</div>

</body>
</html>
