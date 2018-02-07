<?php $mail=$this->customer_model->get_customers_email();?>
<?php $data=$this->customer_model->get_parent_customers();?>
<?php $companyName=$this->customer_model->get_customers_company();?>
<?php $customer_type=$this->customer_model->get_customers_type();
//print_r($companyName);die;

?>

<?php $status=$this->input->get('status'); if($this->input->get('status')=='' ){$status='';}  $get_mail= $this->input->get('mail');$customer_id=$this->input->get('cust_id');  $region=$this->input->get('region'); $customer_name=$this->input->get('cust_name')?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/anylinkmenu.css" />
<script type="text/javascript" src="<?=base_url()?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/anylinkmenu.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>

  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<script type="text/javascript">    
    function customer()    
    {       
      
    //var customer_id=  document.getElementById('customer_id').value;
    //alert(customer_id);customer_name  customer_type
    var city=$('#city').val();       
      var customer_type=$('#customer_type').val();
	  //alert(customer_type);
    var mail= $('#mail').val();      
    var customer_id=$('#customer_id').val();       
    var region=$('#region').val();     
    var customer_name=$('#cu_name').val();       
    var company=$('#company').val();     
    var start=$('#start_date').val();     
    var end=$('#end_date').val();       
    var url="<?=base_url()?>index.php/customer/view_customers?city="+city +'&mail='+mail+'&customer_type='+customer_type+'&cust_id='+customer_id+'&region='+region+'&cust_name='+customer_name+'&company='+company;   
    window.location.assign(url);   
     }
</script>
<script type="text/javascript">
  anylinkmenu.init("menu_anchors_class") ;
  //Pass in the CSS class of anchor links (that contain a sub menu)    anylinkmenu.init("menuanchorclass")</script>
<!-- FOR SHOW HIDE TABLES-->



<!--MIDDLE PAGE WRAPPER STARTS-->
 
		  
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> View Customers</div>
    <div class="view-cp">
      <div class="searchc" style="width:100%">Search Parameters</div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>Customer ID</td>
          <td>
              <select id="customer_id" name="customer_id" onchange="return customer();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select Customer Id--</option>
</optgroup>

              <?php  foreach($mail as $email){?>
<option value="<?= $email['customer_id'];?>" <?php if($_REQUEST['cust_id']==$email['customer_id']){?> selected=""  <?php } ?>>
              <?= $email['customer_id'];?>
              </option>
              <?php } ?>

</select>     
              
              
              
          </td>
          <td>City</td>
          <td>
              <select id="city" name="city" onchange="return customer();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup >
<option value="">--Select City--</option>
</optgroup>

              <?php  foreach($mail as $email){?>
<option value="<?= $email['city'];?>" <?php if($_REQUEST['city']==$email['city']){?> selected=""  <?php } ?>>
              <?= $email['city'];?>
              </option>
              <?php } ?>

</select>  
		  
          </td>
        </tr>
        <tr>
          <td>Name</td>
          <td>
              
              <select id="cu_name" name="cu_name" onchange="return customer();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup >
<option value="">--Select Name--</option>
</optgroup>

              <?php  foreach($mail as $email){?>
<option  value="<?= $email['first_name'];?>" <?php if($_REQUEST['cust_name']==$email['first_name']){?> selected=""  <?php } ?>>
              <?= $email['first_name'];?>
              </option>
              <?php } ?>

</select>  
              
          </td>
          <td>Email ID</td>
          <td>
              
               <select id="mail" name="mail" onchange="return customer();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup >
<option value="">--Select Email--</option>
</optgroup>

              <?php  foreach($mail as $email){?>
<option value="<?= $email['email_id'];?>" <?php if($_REQUEST['mail']==$email['email_id']){?>selected=""   <?php } ?>>
              <?= $email['email_id'];?>
              </option>
              <?php } ?>

</select>  
              
          </td>
        </tr>
        <tr>
          <td>Region</td>
          <td>
 <select name="region" id="region" onchange="return customer();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup >
    <option value="">--Select Region--</option>
</optgroup>
<option value="East" <?php if($region=='East'){?>  selected="" <?php } ?>>East</option>
              <option value="West" <?php if($region=='West'){?>selected=""  <?php } ?>>West</option>
              <option value="North" <?php if($region=='North'){?> selected=""  <?php } ?>>North</option>
              <option value="South" <?php if($region=='South'){?> selected=""  <?php } ?>>South</option>

</select>  
          
          
</td>
          <td>Company name</td>
          <td style="font-size:12px">
  <select name="company" id="company" onchange="return customer();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup >
    <option value="" selected>--Select Company--</option>
</optgroup>

   <?php  foreach($companyName as $companies){?>
              <option value="<?= $companies['company_name'];?>" <?php if($_REQUEST['company']==$companies['company_name']){?>selected=""  <?php }?>>
              <?= $companies['company_name'];?>
              </option>
              <?php } ?>

</select>  
          </td>
        </tr>
		<tr>
		<td>Customer Type</td>
          <td>
<select id="customer_type" name="customer_type" onchange="return customer();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup>
    <option value="">--Select Customer--</option>
</optgroup>
             <?php 
			$cusnamme=$cusname['customer_type'];
			//echo $cusnamme;die;
			 
			  foreach($customer_type as $cusname){?>
              <option value="<?= $cusname['customer_type'];?>" <?php if($_REQUEST['customer_type']==$cusname['customer_type']){?>selected=""  <?php }?>>
              <?= $cusname['customer_type'];?>
              </option>
              <?php } ?>


</select>  
		  
          </td>
        </tr>
        <tr>
          <td>Email filtering </td>
          <td>Bounced Mail&nbsp;
            <input type="radio" name="bounded" id="bounced" value="bounced">
            &nbsp;&nbsp;              Un-subscribed Mail&nbsp;
            <input type="radio" name="bounded" id="unsubscribed" value="unsubscribed">
          </td>
          <td></td>
          <td style="font-size:12px"></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
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
      <?php
        //customer_type
        if($_REQUEST['city']<>'')
        {
         $query1=" and city like '%".$_REQUEST['city']."%'";   
        }else
        if($_REQUEST['mail'])
        {
         $query2=" and email_id like '%".$_REQUEST['mail']."%'";   
        }
		
		else
        if($_REQUEST['customer_type'])
        {
          $query9=" and customer_type like '%".$_REQUEST['customer_type']."%'";  
        }
		
		elseif($_REQUEST['cust_id'])
        {
          $query3=" and customer_id like '%".$_REQUEST['cust_id']."%'";  
        }
		elseif($_REQUEST['region'])
        {
         $query4=" and  region = '".$_REQUEST['region']."'";   
          
        }
		
	elseif($_REQUEST['cust_name'])
        {
         $query5=" and   first_name like '%".$_REQUEST['cust_name']."%'";   
        }elseif($_REQUEST['company'])
        {
         $query6=" and  company_name like '%".$_REQUEST['company']."%'";   
        }
        
         $Query_1="select * from tbl_customer where status='1' and not region='' $query1 $query2 $query3 $query4 $query5 $query6 $query9 ";
        $selectQuery=  mysql_query($Query_1);
       $numrows=  mysql_num_rows($selectQuery);          
        if($numrows==0) {
          $selectQuery=  $rows_data;
        }else if($numrows>0){ 
             $selectQuery=  $selectQuery;
        }
            ?>
      <div class="customer-list">
        <div class="hdrlist">Customer User List</div>
        Total Customers: <span class="count"><?php print $total_customer;?></span> <a href="<?=base_url()?>index.php/customer/add_customer" class="addnewcp">Add New Customer</a> <a href="<?=base_url()?>index.php/customer/customer_download" class="extractwcp">Extract Customer data</a> </div>
      <div class="view-cp-list">
        <div align="right">
          <?php if($links){ print $links;}?>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div class="viewcplist-inner">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="hdrs">
                    <td width="136">Customer ID</td>
					 <td width="196">Customer Type </td>
                      <td width="136">Vendor Type</td>
                      <td width="136">Location</td>
                      <td width="136">Location ID</td>
                    <td width="196">Name </td>
                    <td width="281">Email ID</td>
                    <td width="193">Password</td>
                    <td width="145">Region</td>
                    <td width="78">Status </td>
                    <td width="178">Registration Date</td>
                    <td width="110">Action</td>
                  </tr>
        <?php while( $customer_data=  mysql_fetch_assoc($selectQuery)){ ?>
                  <tr>
                    <td><?=$customer_data['customer_id'];?></td>
					<td><?=$customer_data['customer_type'];?></td>
                    
                    <td><?=$customer_data['vendor_types'];?></td>
                    <td><?=$customer_data['vendor_location'];?></td>
                     <td><?=$customer_data['vendor_location_key_id'];?></td>
                 
                    
                    
                    <td><?=$customer_data['first_name'];?></td>
                    <td><?=$customer_data['email_id'];?></td>
                    <td><?=$customer_data['password'];?></td>
                    <td><?=$customer_data['region'];?></td>
                    <td><?php if($customer_data['status']=='1'){ print "Active";} else{ print "Inactive";}?></td>
                    <td><?=$customer_data['date_account_create'];?></td>
                    <td><a href="<?=base_url()?>index.php/customer/add_customer/<?=$customer_data['id'];?>">View/Edit</a></td>
                    <!--  <td><a href="#" class="menuanchorclass" rel="anylinkmenu1">More..</a></td> -->
                  </tr>
                  <?php }  ?>
                </table>
              </div></td>
          </tr>
        </table>
      </div>
     
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
<!--MIDDLE PAGE WRAPPER ENDS-->
<script>    
$(document).ready(function() {        
   $("#download_now").tooltip({ effect: 'slide'});    
   });</script>
</body></html>