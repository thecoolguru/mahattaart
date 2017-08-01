
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
            
             <script type="text/javascript" src="<?=base_url()?>assets/js/jqueryplugins.js"></script>
            <link rel="stylesheet" href="<?=base_url()?>assets/css/gallery.css" type="text/css">
           
       <script type="text/javascript">
       $(document).ready(function(){
          var arr1 =['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    	    var arr2=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
           var data1="<?php echo $txt; ?>";
                    var data2="<?php echo $txts; ?>";
             for(var i=0;i<26;i++)
            {
            if(data1==arr2[i])
            {
             $("#"+arr2[i]).css("font-size","150%");
             }}
            if (typeof  data2!== 'undefined' &&  data2!== null)
            {   for(var i=0;i<26;i++)
               {
                if(data2==(data1+arr1[i]))
                $("#"+data2).css("font-size","150%");
               } 
             
           } 
       });</script>

<!-- =======================================
MIDDLE SECTION CONTENT
======================================= -->

<!--===MIDDLE PAGE CONTAINER STARTS====--><div id="middle-page-container">
<div class="breadcrum"><a href="<?=base_url()?>frontend/index">Home</a> Artists </div>

<!--=======LEFT SIDE PANEL STARTS========--><div class="left-panel-page">
<div class="main-cat-name"> Artists</div>
<?php $alphaa_arr=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');?>
<div class="sub-cat-links">
 <ul> <li> 
<ul class="sub-cat-links-alphabet">
<li class="parnt1">ALPHABETICAL SEARCH</li>
<?php for($i=0;$i<26;$i++){?>
<li><a href="<?php echo base_url();?>frontend/artist_alphabetic_search?search_text=<?php echo $alphaa_arr[$i];?>" id="<?php echo $alphaa_arr[$i];?>"><?php echo $alphaa_arr[$i];?></a></li><?php }?>

</ul>
</li>
<div class="clear"></div>
<li>
<ul><?php  $alpha_arr=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
for($i=0;$i<26;$i++){?>
<li><a href="<?php echo base_url()?>frontend/artist_alphabetic_search?search_txt=<?php echo $txt.$alpha_arr[$i]; ?>" id="<?php echo $txt.$alpha_arr[$i];?>"><?php echo $txt.$alpha_arr[$i];?></a></li><?php }?>
<!--<li><a  href="<?php echo base_url()?>frontend/artist_alphabetic_search?search_text=Az" id="Az">Az</a></li>-->
</ul></li>
</ul>
</div>
<div class="bestseller-panel">
  <img src="<?=base_url()?>assets/images/bestsellers-panel-hd.gif" />
  <img src="<?=base_url()?>assets/images/bestsellers-panel-thumb-a.gif" />
</div>

<!--=======LEFT SIDE PANEL ENDS========--></div>

<!--=======RIGHT SIDE PANEL STARTS========-->
<div class="right-panel-page">
<div class="hdr-orange"><span class="gallery-hdr">Artists</span></div>
<div id="galleryAjaxContainer">
<div class="galmin">
<?php  
if(isset($artist)){
 foreach($artist as $artists)
{
	//echo $artists['artist_name'];
	$data['image']=$this->frontend_model->get_result_for_images($artists['artist_name']);
	?>


<div class="galThumbContainer" >
<div class="galImageContainer">
	<div class="galImageCell">
	<a href="<?php echo base_url();?>search/get_all_images/<?php echo $data['image']['0']['artist_name']; ?>"><img class="galImage  " src="https://s3.amazonaws.com/wallsnart/158/<?php print $data['image']['0']['images_filename'];?>" alt="<?php print $data['image']['0']['images_description'];?>" title="<?php print $data['image']['0']['images_description'];?>"></a>
	</div>
</div>

<div class="galDetailsContainer">
<div class="galTitle"><?php print $data['image']['0']['images_caption']; ?></div>
<div class="galArtistProduct">
<a class="gal-artist" href="<?php echo base_url();?>search/get_all_images/<?php echo $data['image']['0']['artist_name'];?>" title=""><?php echo $data['image']['0']['artist_name'];?></a>
<div class="gal-type-size">
<span class="gal-product-size-multi"><?php $this->load->model('search_model');
$sizes=$this->search_model->get_sizes_available($data['image']['0']['images_filename']);
if($sizes){
$width=round($sizes->width_max_dpi);
$height=round($sizes->height_max_dpi);
$num="";
if($width > $height ){
 if($width < 12)
 {$num=0;
 print $num;
 }
 else if($width >= 12 && $width < 16)
 { $num=1;
 print (1*4)+2;
 }
 else if($width >= 16 && $width < 24)
 { 
 	$num=2;
 	print (2*4)+2;
 }
 else if($width >= 24 && $width < 32 ) 
 {
 	$num=3;
 	print (3*4)+2;
 }
 else if($width >= 32 && $width < 40)
 {$num=4;
 print (4*4)+2;

 } 
 else
 {
 	$num=5;
 	print (5*4)+2;
 }
}
else
{ 
   if($height < 12)
 {
 $num=0;
 print $num;
 }
 else if($height >= 12 && $height < 16)
 { $num=1;
 print (1*4)+2;
 }
 else if($height >= 16 && $height < 24)
 { $num=2;
 print (2*4)+2;
 }
 else if($height >= 24 && $height < 32 ) 
 {$num=3;
 print (3*4)+2;
 }
 else if($height >= 32 && $height < 40)
 {$num=4;
 print (4*4)+2;
 } 
 else
 {$num=5;
 print (4*5)+2;
 } 
} } if(isset($num)){ echo "options match your filter";}
//$data['sizes']=$this->search_model->get_different_sizes($image_detail->images_filename);
//print_r($data['sizes']['0']);
?> </span></div>
</div>
<div class="galPricing "><span class="galPrice">
<?php if(isset($num)){
	
	$datam=$this->search_model->license_cost($data['image']['0']['images_collectionid']);
	$size_12=$datam['0']['size_12_license_cost'];
	
	$datum=$this->search_model->get_different_sizes($data['image']['0']['images_filename']);
	    $wid1=$datum['0']['size_12'];
	   $ht1=round($datum['0']['actual_size_12']);
	   $start=$wid1*$ht1*1.75;
	   $start1=$size_12+$start;
	   
	   if($num=='2')
	   {
	   	$wid=$datum['0']['size_16'];
	   $ht=round($datum['0']['actual_size_16']);
	   $end=$wid*$ht*1.75;
	   	$size_16=$datam['0']['size_16_license_cost'];
	   	$end1=$end+$size_16;
	   }
	   
	   else if($num=='3')
	{
		$wid=$datum['0']['size_24'];
	   $ht=round($datum['0']['actual_size_24']);
	   $end=$wid*$ht*1.75;
	   $size_24=$datam['0']['size_24_license_cost'];
	   $end1=$end+$size_24;
	}
	else if($num=='4')
	{
		$wid=$datum['0']['size_32'];
	   $ht=round($datum['0']['actual_size_32']);
	   $end=$wid*$ht*1.75;
	   $size_32=$datam['0']['size_32_license_cost'];
	   $end1=$end+$size_32;
	}
	else if($num=='5')
	{
		$wid=$datum['0']['size_40'];
		$ht=round($datum['0']['actual_size_40']);
		$end=$wid*$ht*1.75;
		$size_40=$datam['0']['size_40_license_cost'];
	   $end1=$end+$size_40;
	}
 
if($num=='1'){?>
<img src="<?=base_url()?>assets/images/rupee-search-page.gif" alt="rupees" /> <?php echo  $start1; ?></span><?php }else{?>

<img src="<?=base_url()?>assets/images/rupee-search-page.gif" alt="rupees" /> <?php echo  $start1; ?> - <?php echo $end1;?></span><?php }if($num=='0'){?>


<img src="<?=base_url()?>assets/images/rupee-search-page.gif" alt="rupees" /> <?php echo $image->images_price;?></span>

<?php } }?></div>
</div>
</div>
<div class="galActionsContainer" style="display:none;">
<div class="galActions">
<div class="galAddToCart galButton" >Add to Cart</div>
<div class="galFrameIt galButton ">Frame It</div>
</div></div>

	
	<?php  }}else{?>
	<div  style="margin:150px 270px; color:red;font-size:larger;"> No Result Found.</div>
	<?php }?>
	<div id="ctl00_ctl00_mc_mc_rc_trackingJScript"><script type="text/javascript">
var isCriteoLoaded = false;
$(document).ready(function(){$(document).mousemove(function(event) {if(!isCriteoLoaded){lazyLoadCriteo("http://dis.criteo.com/dis/dis.aspx?p1="+escape("v=2&wi=7710849&pt1=3&i1=12548163A&i2=12210187A&i3=10349756A&i4=10382135A") +"&t1=sendevent&p=1704&c=2&cb="+ Math.floor(Math.random()*99999999999));}});});function lazyLoadCriteo(theURL){isCriteoLoaded = true;criteoHTML = '<div id="cto_mg_div" style="display:none;"></div>';criteoHTML = criteoHTML + '<iframe src="'+theURL+'" height="1" width="1" style="display:none;"></iframe>';$('body').append(criteoHTML);}</script></div><div id="ctl00_ctl00_mc_mc_rc_GAJScript"></div></div>

<div id="gal-zoom" class="shadow hidden"><div id="gal-zoom-inner">
<div class="canvaswrap1" id="wrap1" style="margin-left:8px;"><!--changes done for HDT#66564 -->
<div class="canvaswrap2" id="wrap2">
<div class="canvaswrap3" id="wrap3"><a class="gal-zoom-img-href" href="#">
<img alt="" class="gal-zoom-image" src="<?php print base_url();?>assets/images/blank.gif" border="0" /></a></div></div></div><div id="gal-zoom-text-container">
<div class="gal-zoom-details">
<div class="gal-zoom-text"></div> 
<!-- this for sizes-->

  <!--   <div style="margin:10px 0"><select name="sizes" id="sizes" class="size-list-input">
       <option selected="selected">Select Print Type and Size</option>
       <option>12” x 9” PHOTOGRAPHIC PRINT</option>
       <option>32&quot; x 24&quot;	 - Ships in 1-2 days	Rs. 6000</option>
     </select>
    </div>-->

<!--<div>
<select name="sizes" id="sizes" class="size-list-input">
       <option selected="selected">Select Printing Surface</option>
       <option>PRINTING SURFACE TYPE-A</option>
       <option>32&quot; x 24&quot;	 - Ships in 1-2 days	Rs. 6000</option>
     </select>
</div>-->
<div class="gal-zoom-actions">
<div class="gal-button-icon-group"> 
<div class="gal-zoom-add-to-cart gal-button">Add to Cart</div>

</div>
<div class="gal-button-icon-group">
<div class="gal-zoom-frame-it gal-button">Frame It</div>

</div>
<div class="clear">
</div>
</div>
</div></div></div></div><div id="type-tooltip" class="shadow" style="display:none;"><div id="type-tooltip-title"></div><div id="type-tooltip-body"><p id="type-tooltip-text"></p><p id="type-tooltip-more" class="link">Learn More</p></div><div id="type-tooltip-arrow"></div></div>
</div>


<div class="clear"></div>
<div style="text-align:left;">
</div>
	<script type="text/javascript" src="<?php print base_url();?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/js/gallerypage.js"></script>

<!--GALLERY AREA ENDS-->


<!--=======FILTRATION BAR bottom========-->


<!--=======RIGHT SIDE PANEL ENDS========--></div>





<!--===MIDDLE PAGE CONTAINER ENDS====--></div>

<!--==========GLOBAL CONTAINERS ENDS===========-->



