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
<div class="row">
     <div class="col-md-12">
        <div id="message"><p><?php  if(isset($delete_success)){echo $delete_success;} ?></p></div>
     </div>
</div>
 
 
  <table class="table table-bordered">
    <thead>
      <tr class="danger">
        <th>Sno</th>
		<th>Name</th>
        <th>Mobile</th>
		<th>Email</th>
        <th>D.O.B</th>
        <th>Time</th>
        <th>Date</th>
        <th>Order Date </th>
        <th>View Details </th>
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
					 <td><?php echo $rowa->name; ?></td>
                     <td><?php echo $rowa->mobile; ?></td>
                     <td><?php echo $rowa->email; ?></td>
                     <td><?php echo $rowa->dob; ?></td>
                     <td><?php echo $rowa->slot_time; ?></td>
                     <td><?php echo $rowa->slot_date; ?></td>
                     <td><?php echo $rowa->booking_date; ?></td>
<td><a href="<?php echo base_url('index.php/customer/view_slot_customer_detals/id/'.$rowa->id);?>">Full Detals</a></td>
<td><a href="<?php echo base_url('index.php/customer/delete_slot_order/ordered_id/'.$rowa->id);?>"onClick="return del()" >Delete</a></td>

                 </tr>
				  
				  <?php 
				  $i++;
				 }
			  }
		  }
	  ?>
      <tr>
          <td align="center"><a href="<?php echo base_url('#'); ?>">Add New</td>
      </tr>
     
    </tbody>
  </table>
</div>

</body>
</html>
