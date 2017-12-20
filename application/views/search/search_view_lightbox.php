<?php //echo $shape;
 $url_continue_shopping='search/dosearch/1/64/'.$search_text.'/all';
  $this->session->set_userdata('continue_shopping',$url_continue_shopping);

?>
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
        margin: 5px 0;
		padding:0
    }
    .viwepr li {
        display: inline-block;
        padding: 0 2px
    }
    .view_per_page>.link {
        padding: 1px 4px
    }
    .ourpp {
        float: left;
    }
    .pagination li a {
        border: 0;
        color: #666;
        padding: 2px 10px;
        background-color: transparent
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
    .Prev {
        background: url(http://dev.wallsnart.com/uploaded_pdf/Gallery_ImageSprite.png) no-repeat -26px -26px;
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
        margin: auto;
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
    .icon-cart {
        height: 38px;
        overflow: hidden;
        position: relative;
        width: 38px;
    }
    .icon-cart .cart-line-1 {
        border-bottom-left-radius: 35%;
        height: 7%;
        left: 8%;
        position: absolute;
        top: 25%;
        transform: rotate(5deg);
        width: 15%;
    }
    .icon-cart .cart-line-2::before {
        background-color: inherit;
        content: "";
        height: 100%;
        left: 45%;
        position: absolute;
        top: -280%;
        transform: rotate(-80deg);
        width: 120%;
    }
    .icon-cart .cart-line-2::after {
        background-color: inherit;
        border-bottom-left-radius: 25%;
        border-top-left-radius: 50%;
        content: "";
        height: 100%;
        left: 59%;
        position: absolute;
        top: -670%;
        transform: rotate(40deg);
        width: 70%;
    }
    .icon-cart .cart-line-2 {
        height: 7%;
        left: 6%;
        position: absolute;
        top: 40%;
        transform: rotate(80deg);
        width: 35%;
    }
    .icon-cart .cart-line-3::after {
        background-color: inherit;
        content: "";
        height: 100%;
        left: -5%;
        position: absolute;
        top: -150%;
        width: 124%;
    }
    .icon-cart .cart-line-3 {
        height: 7%;
        left: 33%;
        position: absolute;
        top: 45%;
        width: 30%;
    }
    .icon-cart .cart-wheel::after {
        background-color: inherit;
        border-radius: 100%;
        bottom: 0;
        content: "";
        height: 100%;
        left: 200%;
        position: absolute;
        width: 100%;
    }
    .icon-cart .cart-wheel {
        border-radius: 100%;
        bottom: 20%;
        height: 12%;
        left: 28%;
        position: absolute;
        width: 12%;
    }
    .pagination_2 p {
        padding: 10px 0;
    }
</style>
<script type="text/javascript">/*<![CDATA[*/function toTitleCase(a){return a.replace(/\w\S*/g,function(b){return b.charAt(0).toUpperCase()+b.substr(1).toLowerCase()})}function show_status(p,h){var o="<?php echo $this->input->get('txt');?>";var f=$("#total_cost").html();var g=$("#c_sizes").html();var e=$("#print_type_for_image").html();var c=document.getElementById("print_sizes").value;var b=document.getElementById("sizes").value;if(c==1){var d="Canvas"}else{if(c==3){var d="Photographic print"}else{if(c==4){var d="Premium photographic print"}else{if(c==7){var d="Translite"}else{if(c==8){var d="Poster"}}}}}var i="image_id="+p+"&price="+f+"&size="+b+"&print_type="+d;$.ajax({type:"POST",url:"<?php print base_url() ?>cart/check_image_exist_status",data:i,success:function(j){if(j=="2"){alert("This Image has already been added to cart.")}else{var a="<?=base_url()?>cart/cart_view?img_id="+p+"&search_text="+o+"&price="+f+"&size="+b+"&print_type="+d+"&cat_id="+h;window.location.assign(a)}}})};/*]]>*/</script>
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<?php
$resultsPerPage = $limit;
$numberOfRows = $search_data[0]->total;
$totalPages = ceil($numberOfRows / $resultsPerPage);
$prev=$page-1;
$next=$page+1;
$jump=$next+2;
 if($page==1){
   	$prev=1;
 }else{
 $prev=$prev;
 }

if($shape!="?#!" &&  $shape!=""){
	$shapes='/'.$shape;
}if($color!="%@$#" && $color!=""){
	$colors='/'.$color;
} 
?>

<ul class="pagination viwepr pull-right">
<li class=""> <? echo '<a class="page-link Prev"  aria-label="Prev" href="' . base_url() . 'search/'.$action.'/'.$prev.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'">'?> </a> </li>
<?php if($page!=1){?>
<li><? echo '<a href="' . base_url() . 'search/'.$action.'/'.$prev.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'"> '.$prev.' </a>'; ?></li>
<?php }?>
<li ><? echo '<a  href="' . base_url() . 'search/'.$action.'/'.$page.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'" style="color:#000; !important;font-size:16px;"><b > '.$page.'</b> </a>'; ?></li>
<li><? echo '<a href="' . base_url() . 'search/'.$action.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'">'; ?><?=$next;?></a></li>
<li> <? echo '<a class="page-link Next"  aria-label="Next" href="' . base_url() . 'search/'.$action.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'">'?> </a> </li>
</ul>
<ul class="viwepr pull-right" style="margin-right:10px">
<li>View Per Page</li>
<li class="link" <?php if($limit=='16'){?> style="color:#000 !important;font-size:16px;" <?php } ?>> <? echo '<a href="' . base_url() . 'search/'.$action.'/'.$prev.'/16/'.$search_text.'/'.$category_id.$shapes.$colors.'"> 16 </a>'; ?> </li>
<li class="link"> | </li>
<li class="link"  <?php if($limit=='32'){?> style="color:#000 !important; font-size:16px;" <?php } ?>> <? echo '<a href="' . base_url() . 'search/'.$action.'/'.$prev.'/32/'.$search_text.'/'.$category_id.$shapes.$colors.'"> 32 </a>'; ?> </li>
<li class="link"> | </li>
<li class="link" <?php if($limit=='64'){?> style="color:#000 !important;font-size:16px;" <?php } ?>> <? echo '<a href="' . base_url() . 'search/'.$action.'/'.$prev.'/64/'.$search_text.'/'.$category_id.$shapes.$colors.'"> 64 </a>'; ?> </li></ul>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="gallery-img row">
<ul>
<?php 
if(!empty($search_data)){

foreach ($search_data as $item){
	$bride=split('_',$item['image_filename']);
// $item['image_filename'];
if($bride[0]=='BRID'){
	$data= str_split($item['image_filename'],8);
	//print_r($data);
	//$dataa= substr($item['image_filename'],8);
    $bridege_image_id=substr($item['image_filename'],8,-4);
	 //$bridge_id=$data[1];
	 //$data.'ss';
	 
	$add_imgid= $bridege_image_id+3179;
	$reverse_val=strrev($add_imgid);
	//$reverse_val= $this->frontend_model->reverse_number($add_imgid);
	$append_zero=$reverse_val.'0';
	$bride_id=$append_zero;
}
//echo strrev("130");
 //$data[1];
 if($bride[0]=='BRID'){
 $img_src= "http://images2.bridgemanart.com/cgi-bin/bridgemanImage.cgi/150.XIR.".$bride_id.".7055475/".$bridege_image_id.".JPG";
	$image_filename=$item['image_filename'];
	$image_id=$item['image_id'];
	$image_collection_id=$item['image_collection_id'];
	$link='products';
 }else{
	$img_src="http://static.mahattaart.com/130x150/media/".$item['image_filename'];
	$image_filename=$item['image_filename'];
	$image_id=$item['image_id'];
	$image_collection_id=$item['image_collection_id'];
	$link='products';//image_detail
 }

 
      ?>
<li class="col-md-2 col-sm-3 col-xs-6">
<a href="<?=base_url()."search/".$link."/".$image_filename."/".$image_id."/".$image_collection_id;  ?>"> 
<input type="hidden" name="img_id" id="img_id<?php print $images_id; ?>" value="<?php print $images_id ?>" />
<div class="wrap">
<div class="wrap-inner">
	<img src="<?=$img_src;  ?>" class="img-responsive" />
</div>
</a>
<div class="main-title">
<?= substr($item['image_caption'],0,20).".."; ?>
</div>
<!--<div class="products" style="padding:0 0 3px 0"> <a href="#"> <?=$item['image_photographer'];?> </a> </div>-->
<div class="product-details" style="font-size:20px">
    <i class="fa fa-trash-o" > </i>
    <i class="fa fa-heart-o pull-right" style="color:#d31d25;"> </i>
</div>

</div>
</a>
</li>
<?php } }else {?>
<span style="margin-top:150px;margin-left:300px;color:red"> No result found.</span>
<?php }?>
</ul>
</div>

</div>
</div>
<div class="row">

<div class="col-md-12 col-sm-12">

<script>function call_gallery(){$("#tgl-bx").show(400);$("#overlay-bx").show();$("#tgl-bx select option:eq(0)").prop("selected",true);document.getElementById("tgl-bx").style.display="block";document.getElementById("fade").style.display="block"}$("#overlay-bx").click(function(){$("#tgl-bx").hide(400);$("#size_print_type").hide(400);$("#overlay-bx").hide(400)});$("#toggle-btn").click(function(){$("#toggle-data").toggle(400)});</script>

<div class="row pagination_2" style="background-color:#f7f7f7; margin-bottom:10px">
<div class="col-md-4 col-sm-4">
<p>Back To Top</p>
</div>
<?php
$resultsPerPage = $limit;
$numberOfRows = $search_data[0]->total;
$totalPages = ceil($numberOfRows / $resultsPerPage);
$prev=$page-1;
$next=$page+1;
$jump=$next+2;
 if($page==1){
   	$prev=1;
 }else{
 $prev=$prev;
 }

if($shape!="?#!" &&  $shape!=""){
	$shapes='/'.$shape;
}if($color!="%@$#" && $color!=""){
	$colors='/'.$color;
} 
?>
<div class="col-md-8 col-sm-8">
<ul class="pagination viwepr pull-right" style="padding:0; margin-right:-15px">
<li class=""> <? echo '<a class="page-link Prev"  aria-label="Prev" href="' . base_url() . 'search/'.$action.'/'.$prev.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'">'?> </a> </li>
<?php if($page!=1){?>
<li><? echo '<a href="' . base_url() . 'search/'.$action.'/'.$prev.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'"> '.$prev.' </a>'; ?></li>
<?php }?>
<li ><? echo '<a  href="' . base_url() . 'search/'.$action.'/'.$page.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'" style="color:#000; !important;font-size:16px;"><b > '.$page.'</b> </a>'; ?></li>
<li><? echo '<a href="' . base_url() . 'search/'.$action.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'">'; ?><?=$next;?></a></li>
<li> <? echo '<a class="page-link Next"  aria-label="Next" href="' . base_url() . 'search/'.$action.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$category_id.$shapes.$colors.'">'?> </a> </li>
</ul>
<ul class="viwepr pull-right" style="margin-right:10px">
<li>View Per Page</li>
<li class="link" <?php if($limit=='16'){?> style="color:#000 !important;font-size:16px;" <?php } ?>> <? echo '<a href="' . base_url() . 'search/'.$action.'/'.$prev.'/16/'.$search_text.'/'.$category_id.$shapes.$colors.'"> 16 </a>'; ?> </li>
<li class="link"> | </li>
<li class="link"  <?php if($limit=='32'){?> style="color:#000 !important; font-size:16px;" <?php } ?>> <? echo '<a href="' . base_url() . 'search/'.$action.'/'.$prev.'/32/'.$search_text.'/'.$category_id.$shapes.$colors.'"> 32 </a>'; ?> </li>
<li class="link"> | </li>
<li class="link" <?php if($limit=='64'){?> style="color:#000 !important;font-size:16px;" <?php } ?>> <? echo '<a href="' . base_url() . 'search/'.$action.'/'.$prev.'/64/'.$search_text.'/'.$category_id.$shapes.$colors.'"> 64 </a>'; ?> </li></ul>

</div>
</div>

</div>
</div>
</div>
