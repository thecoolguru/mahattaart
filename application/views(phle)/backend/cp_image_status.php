
<script type="text/javascript"src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
function get_perpage(page)
{	
	var url="<?=base_url()?>index.php/channel_partners/cp_image_status/"+ page;
	window.location.assign(url);
		

		
}
</script>
<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Image Status</div>

<form>
  <div>
    <div class="multi-view-images-paging">
     <?php if($images){?>   Total Images: <?= $total_images;?>
    <table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>Display Images</td>
      <td width="60"><select name="paging" id="paging" onchange="get_perpage(this.value)">
        <option <?php if($per_page=='10'){?> selected="selected"<?php } ?>>10</option>
        <option <?php if($per_page=='20'){?> selected="selected"<?php } ?> >20</option>
        <option <?php if($per_page=='50'){?> selected="selected"<?php } ?> >50</option>
      </select></td>
      <td><?php if($links){ print $links;}?></td>
      </tr>
  </table>
  <a href="#"></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mult-view-images-table">
        <tr class="hdrtr">
          <td width="150">&nbsp;</td>
          <td width="200">Image Name</td>
          <td width="70">            Date</td>
          <td width="150">Caption</td>
          <td>Keywords</td>
           <td width="50">Status</td>
          </tr>
          
         <?php foreach($images as $image){?>
        <tr>
          <td><img src="https://s3.amazonaws.com/wallsnart/70/<?php print $image['images_filename'];?>"  alt="f" /></td>
          <td><?php print $image['images_filename'];?></td>
          <td><?php print $image['images_uploaded_date'];?></td>
          <td><?php print $image['images_caption'];?></td>
          <td style="text-align:justify;"><?php print $image['images_keywords'];?></td>
          <td><?php if($image['images_status']=='1'){ print "Active" ;} else{ print "Inactive" ;}?></td>
          </tr>
           <?php }?>
           </table>
           <?php } else { ?><span style='color:red;'>No Data Found</span> <?php }?>
</div>



</form>
<a href="javascript:window.history.back()" class="bt-back"> Back </a>
</div>

</div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>



<script>
  $(document).ready(function() {
      $("#download_now").tooltip({ effect: 'slide'});
    });
</script>

