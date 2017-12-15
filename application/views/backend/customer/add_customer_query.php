<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Backend Form</title>

<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/bootstrap-quirk.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />

<?php  



?>
<style>
body{background-color:#fff}
#login-page-wrapper {
    width: 100%;
    background: #2c2c2c;
    border-top: 15px solid #000;
    display: inline-block;
}
</style>

<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

<style>
.btn-group, .btn-group-vertical {
    margin: 0 2px 5px 0;
}
</style>
</head>
<body> 
<?php
//print_r($customer_details);
?>
<div class="container" style="margin-top:40px;">
<center>
     
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 <h4 style="color:green"><?php if(isset($add_success)) echo $add_success; ?></h4>
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 
</center>
<?php //echo form_oepn('index.php/customer/add_customer_query');  ?>
<form action="<?php  echo base_url('index.php/customer/add_customer_query');?>/<?=$customer_details[0]->id;?>" method="post" class="form-horizontal" novalidate >
    <div class="form-group">
      <label class="col-sm-3 control-label">Name<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="name" value="<?php if(isset($customer_details[0]->customer_name)){echo $customer_details[0]->customer_name;} else {echo set_value('name');} ?>"  class="form-control" required aria-required="true">
      <em style="color:red"><?php echo form_error('name'); ?></em>
	  </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Email ID <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="email" name="email" value="<?php if(isset($customer_details[0]->customer_name)){echo $customer_details[0]->customer_email;} else {echo set_value('email');} ?>" class="form-control" required aria-required="true">
        <em style="color:red"><?php echo form_error('email'); ?></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Mobile Number<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="mobile" value="<?php if(isset($customer_details[0]->customer_name)){echo $customer_details[0]->customer_mobile;} else {echo set_value('mobile');} ?>" class="form-control" required aria-required="true">
		<em style="color:red"><?php echo form_error('mobile'); ?></em>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Gender<span class="text-danger">*</span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
            <select  name="gender"class="form-control">
                <option value="" selected>Select</option>
                <option value="Male" <?php if($customer_details[0]->gender=="Male"){ echo 'selected'; } else{  if($this->input->post('gender')=="Male"){ echo 'selected'; } } ?>>Male</option>
                <option value="Female" <?php if($customer_details[0]->gender=="Female"){ echo 'selected'; }else{ if($this->input->post('gender')=="Female"){ echo 'selected'; }  } ?>>Female</option>
            </select>
        </div>
		<em style="color:red"><?php echo form_error('gender'); ?></em>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Product interested <span class="text-danger">*</span></label>
      <div class="col-sm-9">
      	<div class="btn-group">
            <select name="pinterest"class="form-control" required="required">
                <option  value="" selected>Select</option>
                <option value="Photos To Frame"<?php if($customer_details[0]->cutomer_interest=="Photos To Frame"){ echo 'selected'; } else {  if($this->input->post('pinterest')=="Photos To Frame"){ echo 'selected'; }    }?>>Photos To Frame</option>
                <option value="Wall Art" <?php if($customer_details[0]->cutomer_interest=="Wall Art"){ echo 'selected'; } else{  if($this->input->post('pinterest')=="Wall Art"){ echo 'selected'; }     } ?>>Wall Art</option>
            </select>
        </div>
		<em style="color:red"><?php echo form_error('pinterest'); ?></em>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Add location<span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="added_locaion" value="<?php if(isset($customer_details[0]->customer_name)){echo $customer_details[0]->cutomer_location;} else {echo set_value('added_locaion');} ?>" class="form-control">
        <em style="color:red"><?php echo form_error('added_locaion'); ?></em>
	  </div>
    </div>
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Any Feedback <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="feadback" value="<?php if(isset($customer_details[0]->cutomer_feadback)){echo $customer_details[0]->cutomer_feadback;} else {echo set_value('feadback');} ?>" class="form-control"> 
        <em style="color:red"><?php echo form_error('feadback'); ?></em>
	  </div>
    </div>

    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
          <button class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
        </div>
    </div>
</form>

<p>To Display Customer Wuer<a href="<?php  echo base_url('index.php/customer/view_cutomer_query');?>">Click Here</a></p>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
