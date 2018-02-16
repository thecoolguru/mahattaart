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
<center><h2>User Contact Detals</h2><a href="<?php  echo base_url('backend/show_query');?>">Back</a></center>

<table style="width:100%">
  <tr>
    <th style="width:30%">Contact Name:</th>
    <td><?php  echo $details[0]->contact_person;?></td>
  </tr>
  <tr>
    <th>Contact Number</th>
    <td><?php  echo $details[0]->contact_number;?></td>
  </tr>
  <tr>
    <th>landline Number</th>
    <td><?php  echo $details[0]->landline_number;?></td>
  </tr>
   <tr>
    <th>Email</th>
    <td><?php  echo $details[0]->email;?></td>
  </tr>
   <tr>
    <th>Company Name</th>
    <td><?php  echo $details[0]->company_name;?></td>
  </tr>
   <tr>
    <th>Address</th>
    <td><?php  echo $details[0]->address;?></td>
  </tr>
   <tr>
    <th>State/City</th>
    <td><?php  echo $details[0]->state_city;?></td>
  </tr>
   <tr>
    <th>Region</th>
    <td><?php  echo $details[0]->region;?></td>
  </tr>
   <tr>
    <th>Art Researcher</th>
    <td><?php  echo $details[0]->art_researcher;?></td>
  </tr>
  <tr>
    <th>Property Types</th>
    <td><?php  echo $details[0]->Property_types;?></td>
  </tr>
  <tr>
    <th>All Other Values</th>
    <td><?php  echo $details[0]->all_other_value;?></td>
  </tr>
   <tr>
    <th>place Of Display</th>
    <td><?php  echo $details[0]->place_of_display;?></td>
  </tr>
   <tr>
    <th>wall Size</th>
    <td><?php  echo $details[0]->wall_size;?></td>
  </tr>
  <tr>
    <th>Wall Color</th>
    <td><?php  echo $details[0]->wall_color;?></td>
  </tr>
  <tr>
    <th>Art Size</th>
    <td><?php  echo $details[0]->art_size;?></td>
  </tr>
  <tr>
    <th>Total Art Products</th>
    <td><?php  echo $details[0]->total_art;?></td>
  </tr>
  <tr>
    <th>Orientation</th>
    <td><?php  echo $details[0]->orientation;?></td>
  </tr>
   <tr>
    <th>Budget Per Work</th>
    <td><?php  echo $details[0]->budget_per_work;?></td>
  </tr>
   <tr>
    <th>Total Budget</th>
    <td><?php  echo $details[0]->total_budget;?></td>
  </tr>
   <tr>
    <th>Creative Details</th>
    <td><?php  echo $details[0]->creative_details;?></td>
  </tr>
   <tr>
    <th>General Theme</th>
    <td><?php  echo $details[0]->general_theme;?></td>
  </tr>
   <tr>
    <th>Source Types</th>
    <td><?php  echo $details[0]->source_types;?></td>
  </tr>
  
  <tr>
    <th>Create Date</th>
    <td><?php  echo $details[0]->added_date;?></td>
  </tr>
</table>



</body>
</html>
