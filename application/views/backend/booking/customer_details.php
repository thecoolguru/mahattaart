<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
 
</head>
<body>
<center><h2>Slot Customer Details</h2><a href="<?php  echo base_url('customer/view_slot_ordered_list');?>">Back</a></center>

<table style="width:100%">
  <tr>
    <th style="width:30%">Name:</th>
    <td><?php  echo $success[0]->name;?></td>
  </tr>
  <tr>
    <th>Mobile</th>
    <td><?php  echo $success[0]->mobile;?></td>
  </tr>
   <tr>
    <th>Email</th>
    <td><?php  echo $success[0]->email;?></td>
  </tr>
   <tr>
    <th>Gender</th>
    <td><?php  echo $success[0]->gender;?></td>
  </tr>
  <tr>
    <th>D.O.B</th>
    <td><?php  echo $success[0]->dob;?></td>
  </tr>
  <tr>
    <th>Event Place</th>
    <td><?php  echo $success[0]->event_place;?></td>
  </tr>
   
   <tr>
    <th>Slot Date</th>
    <td><?php  echo $success[0]->slot_date;?></td>
  </tr>
   <tr>
    <th>Slot Time</th>
    <td><?php  echo $success[0]->slot_time;?></td>
  </tr>
  <tr>
    <th>Customer Registered</th>
    <td><?php  echo $success[0]->customer_register;?></td>
  </tr>
   <tr>
    <th>Booking Date Time</th>
    <td><?php  echo $success[0]->booking_date;?></td>
  </tr>
 
  
  
</table>



</body>
</html>
