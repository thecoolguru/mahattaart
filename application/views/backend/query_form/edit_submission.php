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
<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

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



<div class="container" style="margin-top:40px;">
<center>
     
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 <h4 style="color:green"><?php if(isset($record_message)){ echo $record_message; }else{ echo $record_failed;}?></h4>
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 
</center>
<!---------
<form action="<?php // echo base_url('index.php/customer/add_kiosk_users/'.$get_details[0]->id);?>" method="post" class="form-horizontal" novalidate >
-->
<?php $id=$this->uri->segment(3); ?>	

<center></center>
    
<?php  echo form_open_multipart('backend/edit_submission_record/subm_id/form_id/'.$edit_data[0]->id.'/'.$edit_data[0]->query_form_id)?>    
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Submission Date:<span class="text-danger"></span></label>
      <div class="col-sm-9">
      	<div class="btn-group">       
<input type="text" name="subm_date" id="subm_date" class="form-control" value="<?php echo $edit_data[0]->submission_date;?>">
   <em style="color:red;font-size:12px"><?php echo form_error('subm_date');?></em>

        </div>
	
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Date Updated By:<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="date_updated_by" id="date_updated_by" class="form-control" value="<?php echo $edit_data[0]->date_updated_by;?>">
	  </div>
    </div>

      <div class="form-group">
      <label class="col-sm-3 control-label">Upload Files:<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="file" name="sub_files" id="sub_files" class="form-control" value="<?php echo $edit_data[0]->submission-files;?>" >
		
      </div>
    </div>    
      <div class="form-group">
      <label class="col-sm-3 control-label">Upload Files By:<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="files_upload_by" id="files_upload_by" class="form-control" value="<?php echo $edit_data[0]->file_updated_by;?>">
    
	  </div>
    </div>
      <div class="form-group">
      <label class="col-sm-3 control-label">Feadback:<span class="text-danger"></span></label>
      <div class="col-sm-9">
      <textarea class="form-control" rows="10" name="subm_feadback" id="subm_feadback" ><?php echo $edit_data[0]->submission_feadback;?></textarea>
     
     
	  </div>
    </div>
      <div class="form-group">
      <label class="col-sm-3 control-label">Feadback Updated By:<span class="text-danger"></span></label>
      <div class="col-sm-9">
        <input type="text" name="feadback_update_by"  id="feadback_update_by" class="form-control" value="<?php echo $edit_data[0]->feadback_update_by;?>">
    
	  </div>
    </div>
    
    
 
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
          <button class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
        </div>
    </div>
</form>

<p><a href="<?php  echo base_url('backend/view_submissions/'.$edit_data[0]->query_form_id);?>">view submission</a></p>
</div>

</body>
</html>


