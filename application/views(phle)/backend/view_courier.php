
<?php 
//print_r($courier_detail);
?>
<link rel="stylesheet" type="text/css" href="css/anylinkmenu.css" />
<script type="text/javascript" src="js/menucontents.js"></script>
<script type="text/javascript" src="js/anylinkmenu.js">

</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>

<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#customer-type').change(function() {
            $('div.number').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});
</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> View Courier</div>
<?php if($msg<>''){?>
<script>
    setTimeout(function(){time_out();},3000);
    
    function time_out(){
        window.location.href="<?=base_url()?>index.php/backend/view_courier";
    }
    </script>
<span style="color:red; font-size:14px;"><?=$msg;?></span>
<?php }?>
<form>
<div class="view-cp">
    <script>
        function sort_by_code(code)
        {
          window.location.href="<?=base_url()?>index.php/backend/view_courier/none/"+code;  
        }
        function sort_by_company_name(company_name)
        {
          window.location.href="<?=base_url()?>index.php/backend/view_courier/none/none/"+company_name;  
        }
        function sort_by_date()
        {
            var from_date=$('#from_date').val();
            var to_date=$('#to_date').val();
         window.location.href="<?=base_url()?>index.php/backend/view_courier/none/none/none/"+from_date+'&'+to_date;  
        }
        </script>
<div class="searchc" style="width:100%">Search Parameters</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120">Code</td>
    <td width="275"><select name="code2" id="code2" onchange="return sort_by_code(this.value);" class="inputs">
            <option value="">--Select--</option>
     <?php foreach($code as $code_name):?>
            <option value="<?=$code_name->courier_code?>"><?=$code_name->courier_code?></option>
      <?php endforeach;?>
    </select></td>
    <td width="150">Statement Period</td>
    <td> <input name="from_date"  type="date" id="from_date"   />
          -
          <input name="to_date" type="date" id="to_date"  onblur="return sort_by_date();"  /></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><select name="cp-names3" id="cp-names3" onchange="return sort_by_company_name(this.value);" class="inputs">
       <option value="">--Select--</option>
      <?php foreach($company_name as $name):?>
      <option><?=$name->company_name?></option>
      <?php endforeach;?>
      </select></td>
    <td>&nbsp;</td>
    
  </tr>
  </table>
</div>
<div class="customer-list">
Please choose and option to view Courier detail 
  <select name="sales-detail" id="sales-detail" class="inputs">
    <option selected="selected">Select</option>
    <option value="tsamt">Total Sales Amount</option>
    <option value="tdamt">Total Due Amount</option>
    <option value="tpmade">Total Payment Made</option>
  </select>
</div>
<div style="height:25px;"> </div>
<div id="number-b2b" class="number">
  
  <div class="customer-list">
    <div class="hdrlist">Courier List</div>  
Total Courier:<span class="count"><?=count($courier_detail)?></span>  
<a href="<?=base_url()?>index.php/backend/add_courier" class="addnewcp">Add New Courier</a></div>

<div class="view-cp-list">
<div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="150">Name </td>
          <td>Pin Code</td>
          <td width="150">Email ID</td>
          <td width="60">Status </td>
          <td width="120">Code</td>
          <td>Active / InActive</td>
          <td>&nbsp;</td>
          <td width="120">&nbsp;</td>
           <td width="120">Action</td>
          </tr>
          <?php foreach($courier_detail as $result){?>
        <tr>
          <td><?=$result->company_name;?></td>
          <td><?=$result->pin_code;?></td>
        <td><?=$result->email_id;?></td>
          <td><?php if($result->status==1){ echo 'Active';}else{ echo 'Deactive';}?></td>
         <td><?=$result->courier_code;?></td>
          <td><?php if($result->status==1){ echo 'Active';}else{ echo 'Deactive';}?></td>
          <td><a href="#">View Courier Details</a></td>
          <td><a  class="menuanchorclass" rel="printersales">Payment Details</a></td>
          <td><a href="edit_courier/<?=$result->courier_id;?>" class="menuanchorclass" rel="printersales">Edit</a> / <a href="view_courier/<?=$result->courier_id;?>" class="menuanchorclass" rel="printersales">Delete</a></td>
          </tr>
          <?php }?>
      </table>
      <div class="view-cp-list">
<div class="pgrapher-account"> Account Name : <strong>M/s Fast Forward Courier</strong><br />
Total Sale : <strong>Rs. 45000.00</strong></div>
<div id="number-tsamt" class="acdetail">
  <div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="80">Expected Delivery Date </td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td>Type of Print(Framed or Print Only) </td>
          <td>Size of the Print along with the weight </td>
          <td>Customer Info</td>
          <td>Courier <br />
            Comm. (Rs.)</td>
          <td>WallsnArt<br />
            (Comm)</td>
          <td width="80"> Inv. Status </td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>xx/xx/2013</td>
          <td>GWEL_GWL<br />
            72712874.jpg/124 </td>
          <td>PORTRAIT OF A WOMAN SMILING� </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </table>
      </div></div>
  
  
  
</div>
      </div>
</div>
</div>

</form>





</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>
<script>
  $(document).ready(function() {
      $("#download_now").tooltip({ effect: 'slide'});
    });
</script>

