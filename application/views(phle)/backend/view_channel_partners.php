<?php $partners=$this->channel_partner_model->get_channel_partner();?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/anylinkmenu.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/anylinkmenu.js">

</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>


<script type="text/javascript" language="javascript">// <![CDATA[
function PhotographersList() {
    var ele = document.getElementById("PhotographersListDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}
function PhotographersSalesList() {
    var ele = document.getElementById("PhotographersSalesListDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}
// ]]></script>
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript">
$(function() {
      $('#photographers').change(function() {
            $('div.pgraphers').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});

$(function() {
      $('#sales-detail').change(function() {
            $('div.acdetail').hide();
            $('#number-' + $(this).val()).show();
      }).change(); // Invoke it now
});

</script>

<script type="text/javascript" language="javascript">// <![CDATA[
function salesoption() {
    var ele = document.getElementById("salesoptionDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}
// ]]></script>

<script type="text/javascript">
function filter_partner_bycompany(id)
{
	if(id)
	{
	var datastring='id=' +id;
	//alert(id);
	$.ajax({
		
		url:"<?=base_url()?>index.php/channel_partners/get_channel",
		type: "POST",
		data:datastring,
		success: function(data)
		{       
			$('#new_partner').html(data);
                     document.getElementById('link').style.display='none';
		}
		
	});
	}
}
</script>

<script type="text/javascript">
function get_search(interest)
{
	var datastring='interest=' + interest;
	//alert(interest);
	$.ajax({
		url:"<?=base_url()?>index.php/channel_partners/get_byinterest",
		type:"POST",
		data:datastring,
		success:function(data)
		{
			$('#new_partner').html(data);
                  document.getElementById('link').style.display='none';
		}
	});
		
	
}
</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"  style="width:96%"> 
<div class="main-hdr"> View Channel Partners</div>


<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<br />
<br />
<form action="<?=base_url();?>index.php/channel_partners/view_channel_partners"  method="POST" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100">Company Name</td>
    <td width="200"><select name="code2" id="code2" class="inputs" onchange="filter_partner_bycompany(this.value);">
     <option value="">Select</option>
      <?php foreach($partners as $partner){?>
      <option value="<?php print $partner['channel_partner_id'];?>"><?php print $partner['channel_partner_name'];?></option>
      <?php } ?>
      
    </select></td>
    <td width="125">Area of Interests</td>
    <td> <select name="operation" id="operation" class="inputs" onchange="get_search(this.value);">
    <option value="">Select</option>
      <option value="art">Art</option>
       <option>Abstract</option>
       <option>Beauty</option>
        <option>Fashion</option>
         <option>Food</option>
          <option>Industry</option>
             <option>Lifestyle</option>
              <option>Sports</option>
               <option>Travel</option>
                <option>Wildlife</option>    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Name</td>
    <td><select name="cp-names" id="cp-names" class="inputs" onchange="filter_partner_bycompany(this.value);">
      <option value="">Select</option>
      <?php foreach($partners as $partner){?>
      <option value="<?php print $partner['channel_partner_id'];?>"><?php print $partner['first_name'];?></option>
      <?php } ?>
    </select></td>
    <td>Email</td><td><input type="text" name="email" value="<?php if(isset($_POST['email'])){ print $_POST['email']; } ?>"></td>
 <!--   <td colspan="2">Statement Period
      <input name="textfield" type="text" id="textfield" placeholder="from" class="date-range" style="margin-left:15px;" />
      -
  <input name="textfield2" type="text" id="textfield2" placeholder="to"  class="date-range" style="margin-right:25px" /></td>-->
    <td><input type="submit" class="bt-sbt-global-small" id="Submit" value="Submit"   onclick="return PhotographersList();"/></td>
  </tr>
  </table>
</form>
</div>


<div id="PhotographersListDiv">
<div class="customer-list">
  <div class="hdrlist" style="width:240px">Channel Partner  List</div>  
Total Channel Partners: <span class="count"><?=$count;?></span>  
<a href="<?=base_url()?>index.php/channel_partners/add_channel_partner" class="addnewcp">Add Channel Partner</a></div>

<div class="view-cp-list" >
  <div align="right" id="link"><?php if($links){ print $links;}?></div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td>Company Name</td>
          <td>Contact Person</td>
          <td>Designation</td>
          <td>Email-ID</td>
          <!--<td>First Name</td>
          <td>Last Name</td>-->
          <td>CP Id</td>
         <!--<td>Password</td>-->
          <td>Status</td>
          <!--<td>Address</td>-->
          <!--<td>Contact No</td>-->
          <td>Product Types</td>
          <td>Product Sources</td>
          <!--<td>Area of Interests</td>-->
         <!-- <td>Commission range</td>-->
          <td>Sales</td>
          <td>Contract</td>
          <td>Tools</td>
          </tr>
        <tbody id="new_partner">
       <?php foreach($channel_partner as $partner){
             $com=$this->channel_partner_model->get_commission_details($partner['channel_partner_id']);
           ?>
        <tr>
          <td><?php echo $partner['channel_partner_name'];?></td>
          <td><?= $partner['contact_person_name'];?></td>
          <td><?= $partner['designation'];?></td>
          <td><?= $partner['email_id'];?></td>
        <!--<td><?= $partner['first_name'];?></td>
          <td><?= $partner['last_name'];?></td>-->
          <td><?= $partner['cp_id'];?></td>
         <!-- <td><?= $partner['password'];?></td>-->
          <td><?php if($partner['status']==1){ print "Active";}else{ print "Inactive";}?></td>
         <!-- <td><?php print $partner['address1'].$partner['address2'].",".$partner['city'].",".$partner['state'].",".$partner['country'].",".$partner['pin_code'];?></td>-->
          <!--<td><?= $partner['contact_no'];?></td>-->
          <td><?php echo $partner['product_types'];?></td>
          <td><?php echo $partner['product_sources'];?></td>
          <!--<td><?= $partner['area_of_interest'];?></td>-->
          <!--<td><?php if(isset($com->commission_type)){echo $com->commission_type;}?></td>-->
         <td><a href="#"  onclick="return PhotographersSalesList();" >view sales</a></td>
          <td><?php if($partner['contract_file_url']){ ?><a href="<?php echo base_url()."uploaded_pdf/".$partner['contract_file_url'];?>" target="_blank">view contract</a><?php }else{ print "not uploaded";}?></a></td>
          <!--<td><a href="#" class="menuanchorclass" rel="anylinkmenu1a">More..</a></td>-->
          <td><a href="<?php echo base_url();?>index.php/channel_partners/edit_channel_partner/<?php echo $partner['channel_partner_id'];?>">Edit</a></td>
          </tr>
          <?php } ?>
</tbody>
        </table>
 <?php if(!$channel_partner){ print "<br> <span style='color:Red;'>No Record Found</span>" ; }?>
      </div>
      
    
      <div class="view-cp-list"   id="PhotographersSalesListDiv"    style="display:none">
      

<div>
<form>
<div class="report sales-tb">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="hdrs">
    <td>Total Sales</td>
    <td>Total Commission</td>
    <td>Total Payment  After Commission </td>
    <td>Total Amount <br />
      (Channel Partner)</td>
    <td>Total Amount<br />
      (Walls n Art)</td>
  </tr>
  <tr>
    <td>Rs. 0.00/-</td>
    <td>Rs 0.00/-</td>
    <td>Rs 0.00/-</td>
    <td>Rs 0.00/-</td>
    <td>Rs 0.00/-</td>
  </tr>
</table>
</div>

<div id="sales-option" class="slaesop">
  <div class="customer-list">
Please choose and option to view sales detail 
  <select name="sales-detail" id="sales-detail" class="inputs">
    <option selected="selected">Select</option>
    <option value="tsamt">Total Sales Amount</option>
    <option value="tdamt">Total Due Amount</option>
    <option value="tpmade">Total Payment Made</option>
  </select>
</div></div>
<div class="view-cp-list">
<div class="pgrapher-account"> Account Name : <strong>National Geographic</strong><br />
Total Sale : <strong>Rs. 287700.00</strong></div>
<div id="number-tsamt" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner">
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td width="80">Inovice ID</td>
          <td width="100">Channel Partner <br />
            Comm. (Rs.)</td>
          <td width="80">WallsnArt<br />
            (Comm)</td>
          <td width="80"> Inv. Status </td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>GWEL_GWL<br />
            72712874.jpg/124 </td>
          <td>PORTRAIT OF A WOMAN SMILING  </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
      </table>
      </div></td>
      </tr>
  </table></div>
  
  
  <div id="number-tdamt" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td width="80">Inovice ID</td>
          <td width="100">Photographer <br />
            Comm. (Rs.)</td>
          <td width="80">WallsnArt<br />
            (Comm)</td>
          <td width="80"> Inv. Status </td>
          <td width="120">&nbsp;</td>
          </tr>
        <tr>
          <td>xxxxxx</td>
          <td>xxxxxxxxxx</td>
          <td>GWEL_GWL<br />
            72712874.jpg/123 </td>
          <td>PORTRAIT OF A WOMAN CRYING  </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="#" class="menuanchorclass" rel="printersales">Make Payment</a></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </div></td>
      </tr>
  </table></div>
  
  
  <div id="number-tpmade" class="acdetail">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="40">S.No.</td>
          <td width="80">Date of Sale</td>
          <td width="100">Image ID /Quot. ID</td>
          <td>Description</td>
          <td width="80">Inovice ID</td>
          <td width="100">Photographer <br />
            Comm. (Rs.)</td>
          <td width="80">WallsnArt<br />
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
          <td>xxxxxxxxxx</td>
          <td>PORTRAIT</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>CC</td>
          <td>xx/xx/2013</td>
          <td><a href="#">Upload</a></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </div></td>
      </tr>
  </table></div>
  
  
</div>


</form>

  
</div>
</div>
      </td>
      </tr>
  </table>
</div>
</div>





</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>



