<?php $i=1; foreach($upload_dates as $date){$img[$i]=$this->channel_partner_model->get_image_bydate($date['images_uploaded_date']); $i++;} $i--; 
 ?>
 <script type="text/javascript"src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">

function get_perpage(page)
{
	//alert(page);
	
	var url="<?=base_url()?>index.php/channel_partners/cp_track_uploads/" +page
	window.location.assign(url);
		

		
}
</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Track Uploads</div>

<form>
  <div>
    <div class="multi-view-images-paging"> <?php if($upload_dates){?>
    <table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>Display Images</td>
      <td width="60"><select name="paging" id="paging" onchange="get_perpage(this.value)">
         <option <?php if($per_page=='10'){?> selected="selected" <?php } ?>>10</option>
        <option  <?php if($per_page=='20'){?> selected="selected" <?php } ?> >20</option>
        <option  <?php if($per_page=='50'){?> selected="selected" <?php } ?> >50</option>
      </select></td>
      <td><?php if($links){print $links;} ?></td>
    </tr>
  </table>
  <a href="#"></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mult-view-images-table">
        <tr class="hdrtr">
          <td width="100">Sr. No</td>
          <td width="120">Images Upload Date</td>
          <td width="120">Images Activation Date</td>
           <td width="120">Total Active Images</td>
           <td width="120">Total InActive Images</td>
          <td width="150">Total Images</td>
        </tr>
       <?php $i=1;  foreach($upload_dates as $date){
		 $total=$this->channel_partner_model->get_image_bydate($date['images_uploaded_date']);
		 $activeimg=$this->channel_partner_model->get_activeimage_bydate($date['images_uploaded_date']);
		 ?>
	    <tr>
          <td><?=$i;?></td>
          <td><?=$date['images_uploaded_date'];?></td>
          <td><?=$date['images_active_date'];?></td>
          <td><?=$activeimg;?></td>
          <td><?php $inactive= $total-$activeimg; print $inactive;?></td>
          <td><?= $total;?></td>
          
          </tr>
         <?php $i++; } }else{?> <span style="color:#F00;font-size:18px;"><?php print "No Data Found" ;?></span><?php }?>        
      </table>
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
