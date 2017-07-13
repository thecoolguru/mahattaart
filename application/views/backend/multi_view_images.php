<?php  $status1=$this->input->get('status'); if($this->input->get('status')==''){ $status1='';} $per_page= $this->input->get('page'); if(!$per_page){ $per_page='10';} $partner=$this->input->get('partner'); $file_name=$this->input->get('file'); $start_date=$this->input->get('start'); $end=$this->input->get('end'); $pagination=$this->input->get('per_page'); ?>
<script type="text/javascript"src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
			$(document).ready(function() {
				//alert("hello");
				var i=document.URL;
				var spl_url=i.split('?');
				var status= spl_url['1'].split('=');
				//alert(status);
				if(status)
				{
					$('#hid_status').val(status['1']);
						
		 var ele = document.getElementById("quotationListDiv");
       
        ele.style.display = "block";
				}
				//alert(spl_url['8']);
				//alert(document.URL);
			
			});
			
			
</script>
<script type="text/javascript">
function get_perpage(page)
{
	//alert(page);
	var status=$('#hid_status').val();
	var partner=$('#hid_partner').val();
	var file=$('#hid_file').val();
	var start=$('#hid_start').val();
	var end=$('#hid_end').val();
	var url="<?=base_url()?>index.php/backend/multi_view_images?status=" +status+ '&page=' +page + '&partner=' +partner + '&file=' +file + '&start=' +start+ '&end='+end;
	window.location.assign(url);
		

		
}
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/anylinkmenu.css" />
<script type="text/javascript" src="<?=base_url()?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/anylinkmenu.js">
/***********************************************
* AnyLink JS Drop Down Menu v2.0- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Project Page at http://www.dynamicdrive.com/dynamicindex1/dropmenuindex.htm for full source code
***********************************************/
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

<script type="text/javascript" language="javascript">// <![CDATA[
function quotationList() {
	//alert("hello");
	var status=$('#quotedetail').val();
	var url='<?=base_url()?>index.php/backend/multi_view_images?status=' +status;
	 if($('#quotedetail').val()=='')
				{
					$('#partner_error').html('choose Status');
					return false;
				}
				else
				{
	window.location.assign(url);
				}
}
</script>

<script type="text/javascript" language="javascript">// <![CDATA[
/*function quotationList() {
	var status=$('#quotedetail').val();
	//alert(status);
    var datastring='status=' +status;	
	
	$.ajax({
		url:"<?=base_url()?>index.php/backend/get_images",
		type:"POST",
		data:datastring,
		success:function(data)
		{
			//alert(datastring);
			//alert(data);
			
		 var ele = document.getElementById("quotationListDiv");
       
        ele.style.display = "block";
  
	$('#image_bystatus').html(data);
		}
		
	});
	
   
}*/
// ]]></script>
<script type="text/javascript">
function get_win(i)
{
//alert(i);
var datastring='id=' +i ;
$.ajax({
		url:"<?=base_url()?>index.php/backend/get_image_byid",
		type:"POST",
		data:datastring,
		success:function(data)
		{
			//alert(datastring);
			var img=data.split('/');
			$('#caption').val(img['0']);
			$('#description').val(img['1']);
			$('#keywords').val(img['2']);
			$('#hid_id').val(i);
		 document.getElementById('new').style.display='block';
document.getElementById('fade').style.display='block';
		}
		
	});
//alert(caption);

}
</script>
<script type="text/javascript">
function narrow_search()
{
	var partner=$('#partner').val();
	var status=$('#hid_status').val();
	var file=$('#file').val();
	var start=$('#start').val();
	var end=$('#end').val();
	//alert(status);
	var url="<?=base_url()?>index.php/backend/multi_view_images?status=" + status + '&partner=' +partner + '&file='+file + '&start=' +start + '&end=' +end;
	window.location.assign(url);
}
</script>

<style>
  
   .newid {
	display: none;
	position: absolute;
	top: 250px;
	left: 250px;
	width:50%;
	height:500px;
	padding: 15px;
	border: 3px solid #FF7949;
	border-radius: 10px;
	background-color: white;
	z-index: 10000001;
	overflow: auto;
}

.black_overlay {
	display: none;
	position: fixed;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 200%;
	background-color: black;
	z-index: 100001;
	-moz-opacity: 0.5;
	opacity: .50;
	filter: alpha(opacity =     80);
}
</style>


<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="new" class="newid"> 
<div align="right"><a
href="javascript:void(0)"
onclick="document.getElementById('new').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>
<form action="<?=base_url()?>index.php/backend/edit_image" method="POST">
<table width="100%" height="400px" border="0" cellspacing="2" cellpadding="0">
    <tr></tr>
             <tr>
             <td> Caption</td>
             <td><input type="text" name="caption" id="caption" class="inputbxs" style="height:30px; width:300px;"></td>
              </tr><br />
              <tr>
             <td> Keywords</td>
             <td><textarea name="keywords" id="keywords" class="inputbxs" rows="5" cols="25" style="width:300px;"></textarea></td>
              </tr><br/>
              <tr>
             <td>Description</td>
             <td><input type="text" name="description" id="description" class="inputbxs" style="height:30px; width:300px;" ></td>
              </tr>
             <br />
             <tr><td></td><td><input type="submit" value="Edit" class="bt-sbt-global-small" /></td></tr>
			  <input type="hidden" name="hid_page" id="hid_page" value="<?=$per_page;?>"/>		
</table>
 <input type="hidden" name="hid_id" id="hid_id" value=""/>
 <input type="hidden" name="hid_status" id="hid_status" value="<?=$status1;?>"/>
  <input type="hidden" name="hid_partner" id="hid_partner" value="<?=$partner;?>"/>
    <input type="hidden" name="hid_file" id="hid_file" value="<?=$file_name;?>"/>
      <input type="hidden" name="hid_start" id="hid_start" value="<?=$start_date;?>"/>
        <input type="hidden" name="hid_end" id="hid_end" value="<?=$end;?>"/>
          <input type="hidden" name="hid_pagination" id="hid_pagination" value="<?=$pagination;?>"/>
          
  


</form>

</div>
<div id="fade" class="black_overlay" onClick="document.getElementById('new').style.display='none';document.getElementById('fade').style.display='none'"></div>
<div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Multi View Images</div>

<div class="view-cp">

<div class="searchc" style="width:100%; margin-bottom:15px;">Search Parameters</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   
    <td width="200">Channel Partner Status Wise</td>
   <!-- <td width="40" align="center"><input name="radio" type="radio" id="self" value="self" checked="checked" /></td>
    <td width="200">Photographer Wise</td> -->
    <td width="225"><select name="status" id="quotedetail" class="cartwiseopt">
      <option value="" <?php if($status1==''){?> selected="selected"<?php } ?>>Select Status</option>
     <option value="-1" <?php if($status1=='-1'){?> selected="selected" <?php } ?>>All</option>
      <option value="1" <?php if($status1=='1'){?> selected="selected" <?php } ?>>Active</option>
      <option value="0" <?php if($status1=='0'){?> selected="selected" <?php } ?>>InActive</option>
    </select></td>
    <td><input type="button" class="bt-sbt-global-small"  id="Submit" value="Submit" onclick="return quotationList();" /></td>
  </tr>
</table>
<br />
<span id="partner_error" style="color:red;"></span>

</div>

<div  id="quotationListDiv"  style="display:none">
  <div class="image-filterDiv"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="250">Total Images: <?php print $total_rows; ?> <span class="count">
</span>  </td>
    <td><div class="hdr">Narrow Your Search</div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
         <td width="90">Channel Partner:</td>
        <td><select name="partnerwise" id="partner"><option value="">Select Partner</option>
        <?php foreach($channel_partner as $partner1){?>
        <option <?php if($partner1['cp_id']== $partner){?> selected="selected"<?php }?>><?=$partner1['cp_id'];?></option><?php } ?></select></td>
          <td width="90">File Name:</td>
          <td width="180"><label for="phtoname"></label>
            <input type="text" name="phtoname" id="file" value="<?=$file_name;?>" /></td>
          <td width="100">Date Range</td>
          <td><input name="textfield3" type="text" id="start" placeholder="from(yyyy-mm-dd)" class="date-range" value="<?=$start_date?>" />
-
<input name="textfield3" type="text" id="end" placeholder="to(yyyy-mm-dd)"  class="date-range" value="<?=$end;?>" /></td>
        </tr>
        <tr>
         
          <td><input type="submit" class="bt-sbt-global-small" name="Submit2" id="Submit2" value="Submit" onclick="narrow_search();" /></td>
          <td>&nbsp;</td>
        </tr>
        </table></td>
  </tr>
</table>
</div>

<div class="multi-view-images-paging" id="image_bystatus">
 <?php if($images){?>
 <table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>Display Images</td>
      <td width="60"><select name="paging" id="paging" onchange="get_perpage(this.value)">
      
        <option <?php if($per_page=='10'){?> selected="selected" <?php } ?>>10</option>
        <option  <?php if($per_page=='20'){?> selected="selected" <?php } ?> >20</option>
        <option  <?php if($per_page=='50'){?> selected="selected" <?php } ?> >50</option>
      </select></td>
      <td><?php if($links){print $links;}?></td>
    </tr>
  </table>
  <a href="#"></a></div>
 
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mult-view-images-table">
        <tr class="hdrtr">
          <td width="150">Image </td>
          <td width="100">Collection Name</td>
          <td width="120">Photographer /<br />
            Channel Partner</td>
          <td width="70">Uploaded<br />
            Date</td>
        
          <td width="125">Caption</td>
          <td>Keywords</td>
          <td width="125">Product Types</td>
          <td>Product Source</td>
          <td>Image Status</td>
          <td width="80">&nbsp;</td>
          <td width="60">&nbsp;</td>  
          </tr>
       <tbody name="abc"> 
            
       
<?php foreach( $images as $img){?>
<tr>
       
          <td><img src=" https://s3.amazonaws.com/wallsnart/70/<?= $img['images_filename'];?>" alt="f" /></td>
          <td><?=$img['images_collectionid'];?></td>
          <td><?=$img['images_photographer'];?></td>
          <td><?=$img['images_uploaded_date'];?></td>
          <td><?=$img['images_caption'];?></td>
          <td style="text-align:justify;"><?=$img['images_keywords'];?></td>
	   <td>&nbsp;&nbsp;&nbsp;&nbsp;<?=$img['images_producttypes'];?></td>
          <td><?=$img['images_productsources'];?></td>
	   <td><?php if($img['images_status']=='1'){ print "Active";}else {print "Inactive"; }?></td>
         <td><?php if($img['images_status']=='1'){?> <a href="<?=base_url()?>index.php/backend/change_status?id=<?= $img['images_id'];?>&img_status=<?=$img['images_status'];?>&url_status=<?=$status1;?>&partner=<?=$partner;?>&file=<?=$file_name;?>&start=<?= $start_date;?>&end=<?=$end;?>&per_page=<?=$pagination;?>&page=<?=$per_page;?>">De-Active</a><?php } else {?> <a href="<?=base_url()?>index.php/backend/change_status?id=<?= $img['images_id'];?>&img_status=<?=$img['images_status'];?>&url_status=<?=$status1;?>&partner=<?=$partner;?>&file=<?=$file_name;?>&start=<?= $start_date;?>&end=<?=$end;?>&per_page=<?=$pagination;?>&page=<?=$per_page;?>">Active</a> <?php }?></td><td><a href="#" onclick="get_win(<?= $img['images_id'];?>);">Edit</a></td>
          
       
</tr>
        <?php }} else{?> <span style="color:#F00;font-size:18px;"><?php print "No Data Found" ;?></span><?php }?> 		 </tbody>
      </table>
</div>


<!--B2C DIV-->
<div id="number-b2c" class="number">
  <div class="view-cp-list">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      
     
      </tr>
  </table>
</div>
</div>

</form>
<input type="hidden" id="hid_status" value=""/>
</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>

