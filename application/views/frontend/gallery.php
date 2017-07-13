<?php 
if($this->session->userdata('userid'))
{
$Obj=new Frontend();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 
?>
<?php $this->load->model('search_model');?>
<link rel="stylesheet" href="<?php print base_url();?>assets/css/gallery.css" type="text/css">
<script type="text/javascript" src="<?php print base_url();?>assets/js/jqueryplugins.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/js/gallerypage.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>

<script>
$(document).ready(function(){
           $("#light_form").submit(function(){
            if($("#gal_input_box").val()=="")
            {
             $('#gal_error').html("please enter the name for lightbox");
              return false;
              }
             else if($("#text_area_gal").val()=="")                   
             {
              $('#gal_error').html("please enter description for lightbox");
                return false;
              }
                            
           });
});
</script>
<script type="text/javascript">
function leftpanel(a)
{   if(a!=0)
     { 
    var dert="http://s3.amazonaws.com/wallsnart/158/";
    
   url="<?php echo base_url();?>index.php/frontend/gallery?selected_lightbox_id="+a;
 $.getJSON(url,
   function(data){
   {   $.each(data,function (i,dat) {
        
         var j=dat.image_filename;
        alert(j);
          $("#gall_to").append('<li><img alt="image" id="store'+i+'" name="store'+i+'"width="100px;"height="100px;"><img class="cross" id="story'+i+'"></li><br/>');
          $("#store"+i).attr("src",""+dert+j+"");  
                 //  i++;   
                                   });
   }
     
   }
   );           
	
   }
   else{alert("hello");}
  }

</script>
<script>
function show_lightbox_form()
{ 
   document.getElementById("gal_input_box").style.display="block";
   document.getElementById("text_area_gal").style.display="block";
   document.getElementById("gall_sub").style.display="block"; 
}
function add_to_lightbox(c,a)
  {    	
  	var lightbox=document.getElementById('lightbox_option').value;
       
       if(lightbox=='0')
	{
		
           alert("please either select the lightbox from dropdown or create new one.");
	}
      else{   
            var datastring='lightbox_id='+ lightbox + '&image_id='+ a +'&check='+ 1;
    		        //alert(datastring);
                  $.ajax({ 
                     type: "POST",
			url: "<?php print base_url();?>index.php/frontend/lightbox_dropdown",
			data: datastring,
			success: function(datam)
			{ 
			if(datam==1)
				{ 
 			         alert("This image already exists in the lightbox.");
				}
                        else{      var dert="http://s3.amazonaws.com/wallsnart/158/";
                                   $("#bulb"+c).css('background-position','bottom');
					url='<?php echo base_url();?>index.php/frontend/lightbox_dropdown?lightbox_id='+lightbox+'&image_id='+a,
   					$.getJSON(url,
   					function(data){
   							{                                                     
                                                     $.each(data,function (i,dat)
                                                      {
         							var j=dat.image_filename;
          							$("ul#gall_to").append('<li><img alt="image" src=""+dert+j+"" id="store'+i+'" name="store'+i+'"width="100px;"height="100px;"><img class="cross" id="story'+i+'"></li><br/>');
         					 		//$("#store"+i).attr("src",""+dert+j+"");  
                   						//i++;   
                                   		      });
   							}
     
   							}
  						 ); 

				} 
                     }
                       });   
		
              
          }
   }
</script>
<div id="middle-page-container">
<div class="breadcrum"><a href="#">Home</a> <a href="default.html">gallery</a>
</div></div>
<!--=======LEFT SIDE PANEL STARTS========--><div class="left-panel-page">
<div class="main-cat-name">
<div class="sub-cat-links">
  <ul>
  <li>
  <ul>
<li><a href="javascript:;" onclick="show_lightbox_form();">Create New LightBox</a></li>
<!--<li><a href="#">Name Of light Boxes</a></li>-->
</ul>
<ul><form name="light_form" id="light_form"method="post" action="<?php echo base_url();?>index.php/frontend/gallery/">
<li><input type="text"name="gal_input_box" id="gal_input_box" placeholder="Name Of lightbox" size="20"style="display:none;"/></li>
<li><textarea name="text_area_gal" id="text_area_gal" placeholder="Description" rows="3" cols="17" style="display:none;"></textarea></li>
<li><input type="submit" value ="Create" id="gall_sub" name="gal_sub" style="background-color:orange; width:70px; height:30px;font-weight=bold;display:none;"/></li>
</form>
</ul>
<ul><li><a href="javascript:;"><span style="color: red" id="gal_error"></a></span>
</li></ul>
<ul><li><select name="lightbox_option" id="lightbox_option" onchange="leftpanel(this.value);">
<option value="0">Select lightbox</option>
<?php if(isset($light)){foreach($light as $box){?>
<option value="<?php echo $box->lightbox_id;?>" ><?php echo $box->lightbox_name;?></option><?php }}?>
</select>
</li>
</ul>
<div id="left_light_panel">
<ul>
<?php if(isset($left_panel)){
foreach($left_panel as $left){
$images=$this->search_model->get_image_data($left->image_id);?>
<li><img src="http://s3.amazonaws.com/wallsnart/158/<?php echo $images->images_filename;?>"  width="100px;" height="100px;"alt="image"/></li><br/><?php }}?>
</ul>
</div>
<ul id="gall_to">
</ul>
</li>
</ul>
</div></div>
<!--=======LEFT SIDE PANEL ENDS========--></div>

<!--=======RIGHT SIDE PANEL STARTS========--><div class="right-panel-page">
<div class="gallery-hdr-wrapper"><span class="gallery-hdr">
Gallery</span></div>

<div class="filteration-bar">
<select name="gallery-sort" style="margin-left:700px;">
<option value="0">Sortby</option>
<option value="1">Name</option>
<option value="2">Date</option>
</select>
</div>
<div id="galleryAjaxContainer">
	<div class="galmin">
<?php if($img){$i=1;
foreach($img as $imgs){
$image=$this->search_model->get_image_data($imgs->image_id);
?>
<div class="galThumbContainer" >
      <!-- Thumbnail and diplay start here-->
<div class="galImageContainer">
	<div class="galImageCell">
	<a href="#"><img class="galImage " src="https://s3.amazonaws.com/wallsnart/158/<?php print $image->images_filename; ?>" alt="<?php print substr($image->images_caption,0,10); ?>" title="<?php print substr($image->images_caption,0,10); ?>"></a>
	</div>
</div>

<div class="galDetailsContainer">
<div class="galTitle"><?php print substr($image->images_caption,0,10); ?></div>
<div class="galArtistProduct">
<a class="gal-artist" href="<?php echo base_url();?>index.php/frontend/artist" title=""><?php  print $image->images_photographer; ?></a>
<a href="javascript:;" onclick="javascript:add_to_lightbox('<?php echo $i;?>','<?php echo $image->images_id;?>');"><div class="bulb" id="bulb<?php echo $i;?>"></div></a><br/>
<div class="gal-type-size"><span class="gal-product-size-multi"><?php $sizes=$this->search_model->get_sizes_available($image->images_filename);
if($sizes){
$width=round($sizes->width_max_dpi);
$height=round($sizes->height_max_dpi);
$num="";
if($width > $height ){
 if($width < 12)
 {  $num=0;
 	print 0;}
 else if($width >= 12 && $width < 16)
 { $num=1;
 	print (1*4)+2;}
 else if($width >= 16 && $width < 24)
 { $num=2;
 	print (2*4)+2;}
 else if($width >= 24 && $width < 32 ) 
 {  $num=3;
 	print (3*4)+2;}
 else if($width >= 32 && $width < 40)
 {  $num=4;
 	print (4*4)+2;} 
 else
 {$num=5;
 	print (5*4)+2;}
}
else
{ 
   if($height < 12)
 {$num=0;
 	print 0;}
 else if($height >= 12 && $height < 16)
 { $num=1;
 	print (1*4)+2;}
 else if($height >= 16 && $height < 24)
 { $num=2;
 	print (2*4)+2;}
 else if($height >= 24 && $height < 32 ) 
 {  $num=3;
 	print (3*4)+2;}
 else if($height >= 32 && $height < 40)
 {  $num=4;
 	print (4*4)+2;} 
 else
 {  $num=5;
 	print (5*4)+2;} 
}} if(isset($num)){
echo "options match your filter";
}?>
 </span></div>
</div>
<div class="galPricing "><span class="galPrice"> 
<?php if(isset($num)){
	$this->load->model('search_model');
	
	$datam=$this->search_model->license_cost($image->images_collectionid);
	if($datam){
	$size_12=$datam['0']['size_12_license_cost'];
	
	$datum=$this->search_model->get_different_sizes($image->images_filename);
	if($datum){    
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

<img src="<?=base_url()?>assets/images/rupee-search-page.gif" alt="rupees" /> <?php echo  $start1; ?></span>
<?php }else{?>

<img src="<?=base_url()?>assets/images/rupee-search-page.gif" alt="rupees" /> <?php echo  $start1; ?> - <?php echo $end1;?></span>
<?php }if($num=='0'){?>
<img src="<?=base_url()?>assets/images/rupee-search-page.gif" alt="rupees" /> <?php echo $image->images_price;?></span>

<?php }}}}?>



</div>
</div>

<div class="galActionsContainer" style="display:none;">
<div class="galActions">
<div class="galAddToCart galButton" >Add to Cart</div>
<div class="galFrameIt galButton ">Frame It</div>
</div></div></div>

<?php $i++; } }else {?>
	<div style="margin-top:150px;margin-left:300px;color:red;"> No Images added in gallery.</div><?php }?>
<!--GalleryThumbnails Starts-->

<!-- rollover part-->
<div id="ctl00_ctl00_mc_mc_rc_trackingJScript"><script type="text/javascript">
var isCriteoLoaded = false;
$(document).ready(function(){$(document).mousemove(function(event) {if(!isCriteoLoaded){lazyLoadCriteo("http://dis.criteo.com/dis/dis.aspx?p1="+escape("v=2&wi=7710849&pt1=3&i1=12548163A&i2=12210187A&i3=10349756A&i4=10382135A") +"&t1=sendevent&p=1704&c=2&cb="+ Math.floor(Math.random()*99999999999));}});});function lazyLoadCriteo(theURL){isCriteoLoaded = true;criteoHTML = '<div id="cto_mg_div" style="display:none;"></div>';criteoHTML = criteoHTML + '<iframe src="'+theURL+'" height="1" width="1" style="display:none;"></iframe>';$('body').append(criteoHTML);}</script></div><div id="ctl00_ctl00_mc_mc_rc_GAJScript"></div></div>

<div id="gal-zoom" class="shadow hidden"><div id="gal-zoom-inner">
<div class="canvaswrap1" id="wrap1" style="margin-left:8px;"><!--changes done for HDT#66564 -->
<div class="canvaswrap2" id="wrap2">
<div class="canvaswrap3" id="wrap3"><a class="gal-zoom-img-href" href="#"><img alt="" class="gal-zoom-image" src="<?php print base_url();?>assets/images/blank.gif" border="0" /></a></div></div></div><div id="gal-zoom-text-container">
<div class="gal-zoom-details">
<div class="gal-zoom-text"></div> 
<!-- this for sizes-->

  <!--   <div style="margin:10px 0"><select name="sizes" id="sizes" class="size-list-input">
       <option selected="selected">Select Print Type and Size</option>
       <option>12� x 9� PHOTOGRAPHIC PRINT</option>
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


<!--GALLERY AREA ENDS-->


<!--=======FILTRATION BAR bottom========-->


<!--=======RIGHT SIDE PANEL ENDS========--></div>





<!--===MIDDLE PAGE CONTAINER ENDS====--></div>
<!--==========GLOBAL CONTAINERS ENDS===========--></div></div></div>

