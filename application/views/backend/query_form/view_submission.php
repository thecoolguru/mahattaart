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


<?php $query_form_id=$this->uri->segment(3); 
echo $query_form_id;

?>
<body>

<div class="container-full">

 
 
  <table class="table table-bordered">
    <thead>
      <tr class="danger">
        <th>Submission Series</th>
        <th>Query ID</th>
		<th>Submissin Date</th>
        <th>Date Updated By</th>
		<th>Submission File</th>
        <th>file Updated By</th>
        <th>Feadback</th>
        <th>Feadback Updated By</th>
		<th>Edit</th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php ?>
    
    
      <?php
          if(isset($view_data)){
			    $i=1;
			  foreach($view_data as $rowa)
			  {
              
                 if($i%2==0){$value="info";}else{$value="success";}	{			
				 ?>
				 <tr style="font-size:13px" class="<?php echo $value; ?>">
                     <td><?php echo $i; ?></td>
                     <td><?php echo $rowa->query_form_id; ?></td>
                     <td><?php echo $rowa->submission_date; ?></td>
                     <td><?php echo $rowa->date_updated_by; ?></td>
                     <td><?php echo $rowa->submission-files; ?></td>
                     <td><?php echo $rowa->file_updated_by; ?></td>
                     <td><?php echo $rowa->submission_feadback; ?></td>
                     <td><?php echo $rowa->feadback_update_by; ?></td>	
                     
                     <td><a href="<?php echo base_url('index.php/backend/edit_submission/subm_id/form_id/'.$rowa->id.'/'.$rowa->query_form_id);?>">Edit</a></td>
<td><a href="<?php echo base_url('index.php/backend/delete_submission/'.$rowa->id);?>"onClick="return del()" >Delete</a></td>

                 </tr>
				  
				  <?php 
				  $i++;
				 }
			  }
		  }
	  ?>
      <tr>
 <td align="center"><a href="<?php echo base_url('index.php/backend/form_submission/'.$query_form_id); ?>">Add</td>
 </tr>
     
    </tbody>
  </table>
</div>

</body>
</html>
