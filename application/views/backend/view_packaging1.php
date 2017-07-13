<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.dataTables.min.css">




  
<?php //print_r($rows);

?>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<div class="main-hdr"> View Packaging Orders</div>

<form>
<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120">Vendor name </td>
    <td width="275">
          <select id="vender_name" name="vender_name" onchange="return search_by_vender_name();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select Vendor name--</option>
</optgroup>
<?php foreach($company_name  as $result_company){ ?>
<option value="<?=$result_company->company_name;?>" ><?=$result_company->company_name?></option>
<?php }?>
          </select> 
        
        
        </td>
    <td width="150">vender Code</td>
    <td> <select id="vender_code" name="vender_code" onchange="return search_by_vender_code();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select Vendor Code--</option>
</optgroup>
<?php foreach($vender_code as $sur_code ){ 
    ?>
<option value="<?=$sur_code->sur_code;?>" ><?=$sur_code->sur_code;?></option>
<?php }?>
          </select> </td>
  </tr>
  <tr>
    <td>Vender Email Id</td>
    <td><select id="email_id" name="email_id" onchange="return search_by_vender_emailid();" class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select Email Id--</option>
</optgroup>
<?php foreach($email_id  as $user_email){ 
    ?>
<option value="<?=$user_email->email_id;?>" ><?=$user_email->email_id;?></option>
<?php }?>
          </select> </td>
    <td>&nbsp;</td>
  <td><!--  <input type="submit" class="bt-sbt-global-small" name="Submit" id="Submit" value="Submit"  /></td>-->
  </tr>
  </table>
</div>
<div class="customer-list">
    <div class="hdrlist">Printer List</div>  
    Total Printer:<span class="count">&nbsp;<?=  mysql_num_rows($rows);?></span>  
<a href="<?=base_url()?>index.php/backend/add_packaging" class="addnewcp">Add New Packaging</a></div>
<div style="height:25px;"> </div>
<div class="viewcplist-inner">
    <table width="100%" border="0" id="printer_details" class="display" cellspacing="0" cellpadding="0">
        <thead>
        <tr class="hdrs">
          <td width="150">Vendor code  </td>
          <td width="150">Surface Name </td>
          <td>Area</td>
          <td width="60">Rate</td>
          <td width="120">Amount</td>
          <td width="120">Unit</td>
          <td width="120">Status</td>
          <td>Action</td>
          <td>&nbsp;</td>
          </tr>
        </thead>
          
          <?php 
         
          while($data = mysql_fetch_object($venders)){
              //echo $data->contact_person_name;
              ?>
         <tbody>
          <tr>
          <td><?=$data->contact_person_name;?></td>
          <td><?=$data->surface;?></td>
           <td><?=$data->area;?></td>
           <td><?=$data->rate;?></td>
          <td><?=$data->cost_per_sq_inch;?></td>
           <td><?=$data->unit;?></td>
          <td><?php if($data->status==1){ echo 'Active';}elseif($data->status==0){  echo 'Inactive'; }?></td>
          <td><a href="<?=base_url()?>index.php/backend/edit_package/<?php echo  $data->package_id?>">Edit Details</a></td>
          </tr>
         </tbody>
          <?php }?>
      </table>
      </div>


      <div style="height:25px;"> </div>
<!--<div class="customer-list">
Please choose and option to view sales detail 
  <select name="sales-detail" id="sales-detail" class="inputs">
    <option selected="selected">Select</option>
    <option value="tsamt">Total Order Amount</option>
    <option value="tdamt">Total Due Amount</option>
    <option value="tpmade">Total Payment Made</option>
  </select>
</div>-->

<div id="number-b2b" class="number">
  
  











<!-- <div id="number-tpmade" class="acdetail">
<div style="background:#388fc4; font-size:12px; color:#fff; padding:8px; margin-top:25px;">Data in case of - TOTAL PAYMENT MADE</div>

  
<div class="view-cp-list">
<div class="pgrapher-account"> Account Name : <strong>M/s Vee Kay Graphics</strong><br />
Total Sale : <strong>Rs. 19700.00</strong></div>
<div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="80">Expected Delivery Date </td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td>Image <br />
            Print Size </td>
          <td>Image <br />
            Print Surface</td>
          <td>Qty.<br />
            (w.r.t) image </td>
          <td>Total Sale Amt(Rs.)</td>
          <td>Printer <br />
            Comm. (Rs.)</td>
          <td>WallsnArt<br />
            (Comm)</td>
          <td width="80"> Inv. Status </td>
          <td>Mode of <br />
            Payment</td>
          <td>Date<br />
            Paid</td>
          <td>Attach <br />
            Scanned Copy</td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>GWEL_GWL<br />
            72712874.jpg/124 </td>
          <td>PORTRAIT OF A WOMAN SMILING  </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>CC</td>
          <td>xx/xx/2013</td>
          <td><a href="#">Upload</a></td>
          </tr>
        </table>
      </div></div> 
      </div>-->


</div></form>





</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>


</body>
</html>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#printer_details').DataTable();
} );
</script>


<script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#customer-type').change(function() {
            $('div.number').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});
$(function() {
      $('#sales-detail').change(function() {
            $('div.acdetail').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});
function search_by_vender_name()
{
    var vender_name=$('#vender_name').val();
var url="<?=base_url()?>index.php/backend/view_packaging?vender_name="+vender_name;   
window.location.href=url;
    
}// end functio n



function search_by_vender_emailid()
{
    var email_id=$('#email_id').val();
var url="<?=base_url()?>index.php/backend/view_packaging?email_id="+email_id;   
window.location.href=url;
    
}// end functio n


function search_by_vender_code()
{
    var vender_code=$('#vender_code').val();
var url="<?=base_url()?>index.php/backend/view_packaging?vender_code="+vender_code;   
window.location.href=url;
    
}// end functio n


</script>

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>