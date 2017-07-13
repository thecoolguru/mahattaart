<style>#gal-customcombobox{overflow:hidden;-webkit-appearance:none;-moz-appearance:none;appearance:none;text-align:left;z-index:2;line-height:1.9;background:url('http://dev.wallsnart.com/uploaded_pdf/Gallery_ImageSprite.png') no-repeat -25px -96px;padding:2px 2px 4px 10px;width:233px;height:28px;font-family:'BebasNeueRegular',Arial,sans-serif bold;border:0;font-size:14px;font-weight:600;color:#888}#gal-customcombooptions{margin:0;border:0;width:230px;_width:230px;display:none;border:1px solid #8a9099;border-top:1px solid transparent;cursor:pointer;position:relative;top:4px;text-align:left;left:0;z-index:1}.gal-sortby{font-size:36px;color:#fff;height:24px;padding-bottom:11px;padding-left:22px}#gal-hovercombobox{x;height:28px;width:200px;font-size:20px;padding:4px 23px 4px 10px;color:#000}.viwepr{padding:2px 0}.viwepr li{display:inline;padding:0 2px}.view_per_page>.link{padding:1px 4px}.ourpp{float:left;width:169px}.pagination li a{border:0;color:#666;padding:2px 10px}.pagination li:nth-child(1){font-weight:bold}.viwepr{font-family:"Times New Roman",serif;font-size:13px}.viwepr li:nth-child(4){font-weight:bold}.viwepr li:nth-child(1){font-family:"Times New Roman",serif;font-size:13px}.pagination li:last-child a{border-radius:4px;color:#333}.pagination li a{font-family:"Times New Roman",serif;font-size:13px}.sortours{width:676px;float:left}.main-title{cursor:pointer;margin-bottom:2px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#333;font-size:13px;margin:9px 0 4px 0;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif}.Next{background:url(http://dev.wallsnart.com/uploaded_pdf/Gallery_ImageSprite.png) no-repeat -49px -26px;width:18px;height:18px;vertical-align:bottom;border:0}.pdc{color:#F44349!important;font-family:"Helvetica Neue","HelveticaNeue-Light","Helvetica Neue Light",Helvetica,Arial,"Lucida Grande",sans-serif;font-size:12px;padding:0 15px}.products a{font-size:11px;text-decoration:underline!important;color:#888;font-size:11px;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif}.producttype a{font-size:12px;color:#999}.lineth{text-decoration:line-through}.wrap-inner{height:150px}.wrap-inner img{max-width:100%;max-height:100%;margin:auto;display:block}.ourd li{float:left;padding:0 4px}.right{float:right;border-bottom:dotted 1px #ccc}.career-page h3{font-family:'BebasNeueRegular',Arial,Helvetica,sans-serif;font-size:27px;font-weight:normal;color:#000;margin:5px 0 5px 0}.career-page h4{font-size:14px;font-weight:bold;color:#000;margin:5px 0 5px 0}.faqquestion p{padding:0 0 2px 0!important}.faqquestion p strong{font-size:14px;font-weight:bold;color:#000;margin:0 0 18px 0}.faq-content p{padding:0 0 18px 0!important}.career-page ul{margin:4px 13px}ul.a{list-style-position:inside}.ic-home{top:-2px!important}</style>
<script type="text/javascript">/*<![CDATA[*/function toTitleCase(a){return a.replace(/\w\S*/g,function(b){return b.charAt(0).toUpperCase()+b.substr(1).toLowerCase()})}function show_status(p,h){var o="<?php echo $this->input->get('txt');?>";var f=$("#total_cost").html();var g=$("#c_sizes").html();var e=$("#print_type_for_image").html();var c=document.getElementById("print_sizes").value;var b=document.getElementById("sizes").value;if(c==1){var d="Canvas"}else{if(c==3){var d="Photographic print"}else{if(c==4){var d="Premium photographic print"}else{if(c==7){var d="Translite"}else{if(c==8){var d="Poster"}}}}}var i="image_id="+p+"&price="+f+"&size="+b+"&print_type="+d;$.ajax({type:"POST",url:"<?php print base_url() ?>index.php/cart/check_image_exist_status",data:i,success:function(j){if(j=="2"){alert("This Image has already been added to cart.")}else{var a="<?=base_url()?>index.php/cart/cart_view?img_id="+p+"&search_text="+o+"&price="+f+"&size="+b+"&print_type="+d+"&cat_id="+h;window.location.assign(a)}}})};/*]]>*/

function call_remove_lightBox(imageid,lightbox_id,page_no)
{
	//loalert(lightbox_id);
	var user_input=confirm("Are you sure to delete image "+imageid);
	var url="<?php print base_url();?>index.php/frontend/remove_gallery_image/"+imageid+"/"+lightbox_id+"/"+page_no;
	if(user_input==true)	
		window.location=url;
}
</script>
<div class="main-container">
<div class="art-style">
<aside style="width:13%">
<p>Light Box List</p>
<div class="list">
</div>
</aside>
<div class="right-panel">
<div class="">
<div class="row" style="margin:0;padding:0;border-bottom:1px solid #d6d6d6">
<div class="sortours">
<select id="gal-customcombobox">
<option value="popularity"> SORT BY: POPULARITY </option>
<option value="Popularity"> Popularity </option>
<option value="Price-h"> Price - High </option>
<option value="Price_Low"> Price - Low </option>
<option value="Narrow"> Narrow - Width </option>
<option value="Wide"> Wide - Width </option>
<option value="Tall"> Tall - Height </option>
</select>
</div>
<div class="srtours" style="width:339px;float:left">
<div class="ourpp">
<!--<ul class="viwepr">
<li>View Per Page</li>
<li class="link" <?php if($limit=='16'){?> selected="selected"<?php } ?>> 16 </li>
<li class="link"> | </li>
<li class="link" style="color:#000000" <?php if($limit=='32'){?> selected="selected"<?php } ?>> 32 </li>
<li class="link"> | </li>
<li class="link" <?php if($limit=='64'){?> selected="selected"<?php } ?>> 48 </li></ul>-->
</div>
<div class="ourpp">
<div>
<?php
$resultsPerPage = $limit;
$numberOfRows = $search_data[0]->total;
$totalPages = ceil($numberOfRows / $resultsPerPage);
$prev=$page-1;
$next=$page+1;
$jump=$next+2;
?>
<ul class="pagination" style="padding:0;margin:0">
<span class="pagination" style="padding:0;margin:0">
<?php   echo $this->pagination->create_links(); ?>
</span>
</ul>
</div>
</div>
</div>
</div>
<div class="gallery-img">
<ul>
<?php 
 $user_id=$this->session->userdata('userid');

if(isset($image)){

foreach($image as $images){
	$result=  $this->frontend_model->get_imagesFilename_details($images->images_filename);
       
  ?>

<li>
<a href="<?php echo base_url();?>index.php/search/image_detail/<?=$images->images_filename;?>">
<input type="hidden" name="img_id" id="img_id<?php print $images_id; ?>" value="<?php print $images_id ?>" />
<div class="wrap">
<div class="wrap-inner"><img class="galImage" src="http://static.mahattaart.com/158/<?=$images->images_filename;?>" alt="<?php print substr($result->images_caption,0,10); ?>" title="<?=substr($result[0]->images_caption,0,10); ?>" border="0"></div>
<div class="main-title">
<?=substr($result[0]->images_caption,0,20); ?>
</div>
<?php if($user_id=='609' || $user_id=='669' || $user_id=='661'){?>
<div class="products" style="padding:0 0 3px 0"> <a href="#" style="margin-left:2px"> <?=$result[0]->images_photographer; ?></a> <a style="margin-left:90px" href='javascript:call_remove_lightBox(<?=$images->image_id; ?>,<?=$lightbox_id; ?>,<?=$page_no; ?>)'>Remove</a></div>
<?php }?>
<div class="producttype"> <a href="#"> <?=$item->artist_name;?> </a>&nbsp; </div>

<div> 
</div>
<br>
</div>
</a>
</li>
<?php } }else {?>
<span style="margin-top:150px;margin-left:300px;color:red"> No result found.</span>
<?php }?>
</ul>
</div>
<script>function call_gallery(){$("#tgl-bx").show(400);$("#overlay-bx").show();$("#tgl-bx select option:eq(0)").prop("selected",true);document.getElementById("tgl-bx").style.display="block";document.getElementById("fade").style.display="block"}$("#overlay-bx").click(function(){$("#tgl-bx").hide(400);$("#size_print_type").hide(400);$("#overlay-bx").hide(400)});$("#toggle-btn").click(function(){$("#toggle-data").toggle(400)});</script>
<div class="row" style="background-color:#f7f7f7">
<div class="col-md-7">
<div id="back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" style="padding:5px 0 0"> <span class="glyphicon glyphicon-chevron-up"> </span> <a style="color:#333333" href="#"> Back To Top </a> </div> </div>
<div class="col-md-5">
<div class="ourd">
<!--<ul>
<li> View Per Page </li>
<li class="link" <?php if($limit=='16'){?> selected="selected"<?php } ?>> 16 </li>
<li class="link"> | </li>
<li class="link" style="color:#000000" <?php if($limit=='32'){?> selected="selected"<?php } ?>> 32 </li>
<li class="link"> | </li>
<li class="link" <?php if($limit=='64'){?> selected="selected"<?php } ?>> 48 </li>
</ul>-->

<span class="pagination" style="padding:0;margin:0">
<?php   echo $this->pagination->create_links(); ?>
</span>
</div>
</div>
</div>
</div>
<div style="border-bottom:solid 1px #000"> &nbsp; </div>
<div class="sortby">
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>
</div>
