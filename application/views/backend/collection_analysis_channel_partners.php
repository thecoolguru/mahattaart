
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
function filter_partner_byname(id)
{
  if(id)
 {
    var datastring='id=' +id;
	$.ajax({
		
		url:"<?=base_url()?>index.php/channel_partners/get_details_for_view_collection_analysis",
		type: "POST",
		data:datastring,
		success: function(data)
		{     	$('#new_partner').html(data);
                    
		}
		
	});
 }
}

</script>



<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"  style="width:96%"> 
<div class="main-hdr">Collection Analysis</div>
<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<br />
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">Channel Partner Name</td>
    <td colspan="2"><select name="code2" id="code2" class="inputs" onchange="filter_partner_byname(this.value);">
      <option value="0">Select Channel Partner </option>
      <?php foreach($list as $lists){?>
      <option value="<?php print $lists->channel_partner_id;?>"><?php print $lists->channel_partner_name;?></option>
      <?php } ?>
      </select></td>&nbsp;&nbsp;&nbsp;
    <form action=""  method="POST" >
  <td colspan="2">Statement Period
      <input name="textfield" type="text" id="textfield" placeholder="from" class="date-range" style="margin-left:15px;" />
      -
   <input name="textfield2" type="text" id="textfield2" placeholder="to"  class="date-range" style="margin-right:25px" /></td>
    <td><input type="submit" class="bt-sbt-global-small" id="Submit" value="Submit" /></td>
   </form>
  </tr>
  </table>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:25px 0; background:#f2f2f2; border-bottom:1px solid #dfdfdf; height:40px;">
  <tr>
<td width="120">Export 
      <select name="pg3" id="pg3" class="inputs">
        <option selected="selected">Excel</option>
        
      </select></td>
    <td width="80"> <a href="javascript:window.print()" class="print">Print</a></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td>Channel Partner Name(Code / sub collections)</td>
          <td>Total Image Search</td>
          <td>Images clicked to enlarge</td>
          <td>Images Sold for Print Only</td>
          <td>Images Sold with Frame</td>
          </tr>
        <tbody id="new_partner">
       <?php foreach($list as $lists){?>
        <tr>
          <td><?php echo $lists->channel_partner_name." "."("." ".$lists->cp_id." ".")";?></td>
          <td><?= "-";?></td>
          <td><?= "-";?></td>
          <td><?= "-";?></td>
          <td><?= "-";?></td>
          </tr>
          <?php } ?>
</tbody>
        </table>
 
      
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>
<!--MIDDLE PAGE WRAPPER ENDS--></div>





