<?php $mail=$this->backend_model->get_customers_email();?>
<?php $data=$this->backend_model->get_parent_customers();?>
<?php $url1= $this->input->get('cust_type'); if($url1){ $type=$url1; } else{ $type="";}
 $status=$this->input->get('status'); if($this->input->get('status')=='' ){$status='';}
 $company1= $this->input->get('company');   $get_mail= $this->input->get('mail');
 $customer_id=$this->input->get('cust_id');  $region=$this->input->get('region');
 $focus= $this->input->get('acc_type'); $customer_name=$this->input->get('cust_name')?>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/anylinkmenu.css" />
<script type="text/javascript" src="<?=base_url()?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/anylinkmenu.js">
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>

<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
function customer()
{   var customer_type= $('#customer-type').val();
    var status=$('#status').val(); 
	var company=$('#company').val();
	var mail= $('#mail').val();
	var city=$('#city').val();
	var customer_id=$('#customer_id').val();
	if($('#radio:checked').val()){
	var acc_type=$('#radio:checked').val();
	}
	else
	{
		var acc_type='';
	}
	var region=$('#region').val();
	var customer_name=$('#cu_name').val();
	var start=$('#start_date').val();
	var end=$('#end_date').val();
	var url="<?=base_url()?>index.php/backend/view_customers?cust_type=" + customer_type + '&status=' +status + '&company=' +company + '&mail=' +mail + '&city=' +city + '&cust_id=' +customer_id + '&acc_type=' +acc_type + '&region=' +region + '&cust_name=' +customer_name + '&start=' +start + '&end=' +end;
	window.location.assign(url);
}
</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> View Customers</div>


<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120">Customers</td>
    <td width="275"><span style="font-size:12px">
      <select name="customer-type" id="customer-type" class="inputs">
        <option value='' <?php if($type==''){?> selected="selected" <?php } ?>>Select</option>
        <option <?php if($type=='B2B'){?> selected="selected" <?php } ?>>B2B</option>
        <option <?php if($type=='B2C'){?> selected="selected" <?php } ?>>B2C</option>
      </select>
    </span></td>
    <td width="150">Statement Period</td>
    <td> <input name="textfield" type="text" id="start_date" placeholder="from(yy-mm-dd)" value="<?php print $this->input->get('start');?>" class="date-range" />
          -
          <input name="textfield2" type="text" id="end_date" placeholder="to(yy-mm-dd)"   value="<?php print $this->input->get('end');?>"  class="date-range" /></td>
  </tr>
  <tr>
    <td>Company</td>
    <td><select name="company" id="company" class="inputs">
      <option value='' <?php if(!$company1){?> selected="selected"<?php }?>>Select</option>
      <?php foreach($data as $company){?>
      <option <?php if($company1==$company['company_name']){?> selected="selected" <?php } ?>><?=$company['company_name'];?></option>
      <?php } ?>
    </select></td>
    <td>Email ID</td>
    <td><select name="mail" id="mail" class="inputs">
      <option value='' <?php if(!$get_mail){?>selected="selected" <?php } ?>>Select</option>
     <?php foreach($mail as $email){?> <option <?php if($get_mail==$email['email_id']){?> selected="selected"<?php } ?> ><?= $email['email_id'];?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><select name="cu_name" id="cu_name" class="inputs">
      <option value='' <?php if(!$customer_name){?> selected="selected" <?php } ?>>Select</option>
       <?php  foreach($mail as $email){?>
      <option value="<?= $email['customer_id'];?>" <?php if($customer_name==$email['customer_id']){?> selected="selected" <?php }?>><?= $email['first_name'];?></option>
      <?php } ?>
    </select></td>
    <td>Customer ID</td>
    <td><select name="customer_id" id="customer_id" class="inputs">
   <option value="" <?php if(!$customer_id){?> selected="selected" <?php } ?>>Select</option>
    <?php  foreach($mail as $email){?>
      <option <?php if($customer_id==$email['customer_id']){?> selected="selected" <?php } ?>><?= $email['customer_id'];?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td>Region</td>
    <td><select name="region" id="region" class="inputs">
      <option value='' <?php if(!$region){?> selected="selected" <?php } ?> >Select</option>
      <option<?php if($region=='East'){?> selected="selected" <?php } ?>>East</option>
      <option <?php if($region=='West'){?> selected="selected" <?php } ?>>West</option>
      <option <?php if($region=='North'){?> selected="selected" <?php } ?>>North</option>
      <option <?php if($region=='South'){?> selected="selected" <?php } ?>>South</option>
        </select></td>
    <td>Status</td>
    <td style="font-size:12px"><select name="status" id="status" class="inputs" >
      <option value='' <?php if($status){?> selected="selected"<?php } ?>>Select</option>
      <option value='1' <?php if($status=='1'){?> selected="selected"<?php } ?>>Active</option>
      <option value='0' <?php if($status=='0'){?> selected="selected"<?php } ?>>De-Active</option>
    </select></td>
  </tr>
  <tr>
    <td>City</td>
    <td><input type="text" name="city" id="city" class="inputs" value="<?php print $this->input->get('city');?>">
      </td>
    <td>Account Type</td>
    <td><span style="font-size:12px">
      <input type="radio" name="radio" id="radio" value="Focus" <?php if($focus=='Focus'){?> checked="checked"<?php } ?>/>
Focus
<input type="radio" name="radio" id="radio" value="Not Focus"  <?php if($focus=='Not Focus'){?> checked="checked"<?php } ?> />
Not Focus</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="button" class="bt-sbt-global-small" name="Submit" value="Submit"   onclick="customer();"/></td>
  </tr>
  </table>
</div>

<div id="number-b2b" class="number">
  <?php if($customer && $customer!='-1') { ?>
  <div class="customer-list"><div class="hdrlist">Customer User List</div>  
Total Customers: <span class="count"><?php print $total_customer;?></span>  
<a href="<?=base_url()?>index.php/backend/add_customer" class="addnewcp">Add New Customer</a></div>

<div class="view-cp-list"> <div align="right"><?php if($links){ print $links;}?></div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="150">Name </td>
          <td width="150">Email ID</td>
          <td>Date</td>
          <td width="120">Customer ID</td>
          <td>Password</td>
          <td width="60">Status </td>
          <td width="100">Region</td>
          <td width="80">Type</td>
          <td width="80">&nbsp;</td>
          </tr>
          <?php foreach($customer as $customer_data){ ?>
        <tr>
          <td><?=$customer_data['first_name'];?></td>
          <td><?=$customer_data['email_id'];?></td>
          <td><?=$customer_data['date_account_create'];?></td>
          <td><?=$customer_data['customer_id'];?></td>
          <td><?=$customer_data['password'];?></td>
          <td><?php if($customer_data['status']=='1'){ print "Active";} else{ print "Inactive";}?></td>
          <td><?=$customer_data['customers_region'];?></td>
          <td><?=$customer_data['customers_account_type'];?></td>
          <td><a href="<?=base_url()?>index.php/backend/edit_customer/<?=$customer_data['customer_id'];?>">Edit</a></td>
        <!--  <td><a href="#" class="menuanchorclass" rel="anylinkmenu1">More..</a></td> -->
          </tr>
        
       <?php }  ?>
      </table>
      </div></td>
      
     
      </tr>
  </table>
</div>
<?php } else if($customer=='-1'){?><span style="color:red;">No Data Found</span><?php } ?>
</div>









</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS-->
<script>
  $(document).ready(function() {
      $("#download_now").tooltip({ effect: 'slide'});
    });
</script>
</body>
</html>
