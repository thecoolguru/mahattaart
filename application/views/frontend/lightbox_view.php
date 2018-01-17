<style>

    #gal-customcombooptions {
        margin: 0;
        border: 0;
        width: 230px;
        _width: 230px;
        display: none;
        border: 1px solid #8a9099;
        border-top: 1px solid transparent;
        cursor: pointer;
        position: relative;
        top: 4px;
        text-align: left;
        left: 0;
        z-index: 1
    }
    .gal-sortby {
        font-size: 36px;
        color: #fff;
        height: 24px;
        padding-bottom: 11px;
        padding-left: 22px
    }
    #gal-hovercombobox {
        x;
        height: 28px;
        width: 200px;
        font-size: 20px;
        padding: 4px 23px 4px 10px;
        color: #000
    }
    .viwepr {
        padding: 2px 0
    }
    .viwepr li {
        display: inline;
        padding: 0 2px
    }
    .view_per_page>.link {
        padding: 1px 4px
    }
    .ourpp {
        float: left;
        width: 169px
    }
    .pagination li a {
        border: 0;
        color: #666;
        padding: 2px 10px
    }
    .pagination li:nth-child(1) {
        font-weight: bold
    }
    .viwepr {
        font-family: "Times New Roman", serif;
        font-size: 13px
    }
    .viwepr li:nth-child(4) {
        font-weight: bold
    }
    .viwepr li:nth-child(1) {
        font-family: "Times New Roman", serif;
        font-size: 13px
    }
    .pagination li:last-child a {
        border-radius: 4px;
        color: #333
    }
    .pagination li a {
        font-family: "Times New Roman", serif;
        font-size: 13px
    }
    .sortours {
        width: 676px;
        float: left
    }
    .main-title {
        cursor: pointer;
        margin-bottom: 2px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #333;
        font-size: 13px;
        margin: 9px 0 4px 0;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif
    }
    .Next {
        background: url(http://dev.wallsnart.com/uploaded_pdf/Gallery_ImageSprite.png) no-repeat -49px -26px;
        width: 18px;
        height: 18px;
        vertical-align: bottom;
        border: 0
    }
    .pdc {
        color: #F44349!important;
        font-family: "Helvetica Neue", "HelveticaNeue-Light", "Helvetica Neue Light", Helvetica, Arial, "Lucida Grande", sans-serif;
        font-size: 12px;
        padding: 0 15px
    }
    .products a {
        font-size: 11px;
        text-decoration: underline!important;
        color: #888;
        font-size: 11px;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif
    }
    .producttype a {
        font-size: 12px;
        color: #999
    }
    .lineth {
        text-decoration: line-through
    }
    .wrap-inner {
        height: 150px
    }
    .wrap-inner img {
        max-width: 100%;
        max-height: 100%;
        margin: auto;
        display: block
    }
    .ourd li {
        float: left;
        padding: 0 4px
    }
    .right {
        float: right;
        border-bottom: dotted 1px #ccc
    }
    .career-page h3 {
        font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
        font-size: 27px;
        font-weight: normal;
        color: #000;
        margin: 5px 0 5px 0
    }
    .career-page h4 {
        font-size: 14px;
        font-weight: bold;
        color: #000;
        margin: 5px 0 5px 0
    }
    .faqquestion p {
        padding: 0 0 2px 0!important
    }
    .faqquestion p strong {
        font-size: 14px;
        font-weight: bold;
        color: #000;
        margin: 0 0 18px 0
    }
    .faq-content p {
        padding: 0 0 18px 0!important
    }
    .career-page ul {
        margin: 4px 13px
    }
    ul.a {
        list-style-position: inside
    }
    .ic-home {
        top: -2px!important
    }
	.pagination_2 p {
	padding: 10px 0;
}
</style>
<script type="text/javascript">/*<![CDATA[*/function toTitleCase(a){return a.replace(/\w\S*/g,function(b){return b.charAt(0).toUpperCase()+b.substr(1).toLowerCase()})}function show_status(p,h){var o="<?php echo $this->input->get('txt');?>";var f=$("#total_cost").html();var g=$("#c_sizes").html();var e=$("#print_type_for_image").html();var c=document.getElementById("print_sizes").value;var b=document.getElementById("sizes").value;if(c==1){var d="Canvas"}else{if(c==3){var d="Photographic print"}else{if(c==4){var d="Premium photographic print"}else{if(c==7){var d="Translite"}else{if(c==8){var d="Poster"}}}}}var i="image_id="+p+"&price="+f+"&size="+b+"&print_type="+d;$.ajax({type:"POST",url:"<?php print base_url() ?>cart/check_image_exist_status",data:i,success:function(j){if(j=="2"){alert("This Image has already been added to cart.")}else{var a="<?=base_url()?>cart/cart_view?img_id="+p+"&search_text="+o+"&price="+f+"&size="+b+"&print_type="+d+"&cat_id="+h;window.location.assign(a)}}})};/*]]>*/

function call_remove_lightBox(imageid,lightbox_id,page_no)
{
	//loalert(lightbox_id);
	var user_input=confirm("Are you sure to delete image "+imageid);
	var url="<?php print base_url();?>frontend/remove_gallery_image/"+imageid+"/"+lightbox_id+"/"+page_no;
	if(user_input==true)	
		window.location=url;
}
</script>
<?php
$resultsPerPage = $limit;
$numberOfRows = $search_data[0]->total;
$totalPages = ceil($numberOfRows / $resultsPerPage);
$prev=$page-1;
$next=$page+1;
$jump=$next+2;
?>
<div class="container" style="margin-top:5px">
<div class="row"><div class="art-style col-md-12">
<div class="row">
<aside class="left-panel-page col-md-2 col-xs-3">
<p>Light Box List</p>
<div class="list">
</div>
</aside>
<div class="right-panel-page col-md-10 col-xs-9">
<div class="">
<?php   echo $this->pagination->create_links(); ?>
<div class="row">
<div class="col-md-4">
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
</div>
<div class="col-md-12"><hr style="margin: 10px 0;" /></div>

</div>
<div class="gallery-img row">
<ul>
<?php 
 $user_id=$this->session->userdata('userid');

if(isset($image)){
 print_r($image);
foreach($image as $images){
	$result=  $this->frontend_model->get_imagesFilename_details($images->images_filename);
      print_r($result);
  ?>

<li class="col-md-2 col-sm-2">
<a href="<?php echo base_url();?>frontend/products/<?=$images->images_filename;?>">
<input type="hiden" name="img_id" id="img_id<?php print $images_id; ?>" value="<?php print $images_id ?>" />
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
<div class="row pagination_2" style="background-color:#f7f7f7; min-height:30px;margin-bottom: 10px;">
<span class="pagination" style="padding:0;margin:0">
<?php   echo $this->pagination->create_links(); ?>
</span>
<div class="col-md-4 col-sm-4">
<p>Back To Top</p>
</div>
</div>
</div>
</div>

</div>
</div></div>
</div>
