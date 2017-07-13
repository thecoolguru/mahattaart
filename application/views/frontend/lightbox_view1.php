<?php $name=$this->frontend_model->get_lightbox_name($id);
$user_id=$this->session->userdata('userid');?>


<script type="text/javascript">
function choosesize1() {
	$.window({
		title: "CHOOSE YOUR SIZE",
		url: "choose-size.html"
	});
}
function choosesize2() {
	$.window({
		title: "CHOOSE YOUR SIZE",
		url: "choose-size2.html"
	});
}

function call_details(imageid)
{
	var url="<?php print base_url();?>index.php/search/image_detail/"+imageid;
	window.location=url;
}

function frame_it_price_send(a)
{  
	//alert(a);
	var b=''; 
	var cost=0;
    //var cost=document.getElementById('total_cost').innerHTML;
    var url='<?=base_url()?>index.php/frontend/frame_new/'+a;
    window.location=url;
}

function call_remove(imageid,lightbox_id)
{
	//loalert(lightbox_id);
	var user_input=confirm("Are you sure to delete image "+imageid);
	var url="<?php print base_url();?>index.php/frontend/remove_gallery_image/"+imageid+"/"+lightbox_id;
	if(user_input==true)	
		window.location=url;
}

function show_status(a)
{  
    var type="<?php echo $this->input->get('txt');?>";
    var k=$("#total_cost").html();
    var j=$("#c_sizes").html();
    var l=$("#print_type_for_image").html();
    var datastring='image_id='+a+'&price='+ k +'&size='+ j+'&print_type='+l;
    $.ajax({
             type: "POST",
	      url: "<?php print base_url() ?>index.php/cart/check_image_exist_status",
             data:datastring,
             success:function(datam)  
             {    
                if(datam=='2')
                   {
                      alert("This Image has already been added to cart.");
                    }
                  else
                   {
                     var url="<?=base_url()?>index.php/cart/cart_view?img_id="+a+"&search_text="+type+"&price="+k+"&size="+j+"&print_type="+l;
                     window.location.assign(url);

                   }
              }
         });
}

</script>    

<!-- THIS IS FOR ACCORDIAN--><script type="text/javascript" src="<?php echo base_url();?>assets/js/multiple-accordion.js"></script>
<script language="JavaScript">
$(document).ready(function() {
	$(".createmygal").accordion({
		accordion:false,
		speed: 500,
		closedSign: '<img src="<?php echo base_url();?>assets/images/arrow-circular.png"  align="absmiddle" style="margin-left:4px">',
		openedSign: '<img src="<?php echo base_url();?>assets/images/arrow-circular-dwn.png"  align="absmiddle" style="margin-left:4px">'
	});
	$("#crt_btn").click(function(){
	 if($('#fname').val()=="")
	 {
	  $("#fname_error").html("Please Enter Gallery Name");
	  return false;
	 }
	 else
	 {
	  $("#fname_error").html("");
	  var nm=$('#fname').val();
      var de=$('#desc').val();
	  var ck='1';
      var url='<?php echo base_url();?>index.php/frontend/lightbox?check='+ck +'&lt_nm='+ nm +'&lt_des='+de;
	  //alert(url);
      window.location.assign(url);
	 
	 }
	  
	 });
});

</script>


<div class="main-container">
    	
        <div class="pagination">
        	<span><a href="<?php echo base_url();?>index.php/frontend/index">Home</a> My
		Galleries</span> 
        </div>
        
        <!-- art style -->
        <div class="art-style">
        	
            
            <!-- aside -->
            <aside>
            	<p>My Gallies</p>
            	<div class="list">
                	<ul>
                    	<li><a href="#" class="parnt">My Galleries</a></li>
      <?php if(isset($resultant)){ $i=0; foreach($resultant as $resulting){ $rows=$this->frontend_model->count_images_lightbox($resulting->lightbox_id);?>
      <input type="hidden" id="lightbox_id<?php echo $i;?>" name="lightbox_id<?php echo $i;?>"value="<?php echo $resulting->lightbox_id;?>">
      <li><a href="<?php echo base_url();?>index.php/frontend/lightbox_view?lightbox_id=<?php echo $resulting->lightbox_id;?>&page=1&per_page=16"><?php echo $resulting->lightbox_name;?></td>
      <?php }$i++;}?></a></li>
                    </ul>
                </div>

            </aside>
            <!-- aside -->
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel">
            	
                <div class="sortby">
                	<p>
                    	<form>
  	<span class="pagelist">Display per page <select name="pageno" id="pageno">
    <option>16</option>
	<option>32</option>
	<option>64</option>
	</select></span> 
    <?php
    $resultsPerPage = $per_page;
	$numberOfRows = $count;
	$totalPages = ceil($numberOfRows / $resultsPerPage);
	if($page > 1)
		echo '<a href="' . base_url() . 'index.php/frontend/lightbox_view?lightbox_id='.$id.'&page='.($page-1).'&per_page='.$per_page.'">&#9664;</a>&nbsp';
    if ($page < $totalPages)
        echo '<a href="' . base_url() . 'index.php/frontend/lightbox_view?lightbox_id='.$id.'&page='.($page+1).'&per_page='.$per_page.'">&#9654;</a>&nbsp;';
	?>
</form>
                    </p>
                    <?php if(isset($success)){
					echo $success;
}?>

				<?php if($this->session->flashdata('share_message')){print $this->session->flashdata('share_message');}?>
                    
                </div>
                
                <!-- gallery block -->
                <div class="gallery-img">
                
				
<!--GalleryThumbnails Starts-->
<?php if(isset($image)){
foreach($image as $images){
 $result=$this->search_model->get_image_data($images->image_id);
  ?>
<div class="galThumbContainer" >
      <!-- Thumbnail and diplay start here-->
<div class="galImageContainer">
	<div class="galImageCell">
	<a href="<?php echo base_url();?>index.php/search/image_detail/<?php echo $result->images_id;?>"><img class="galImage " src="http://www.indiapicture.in/wallsnart/158/<?php echo $result->images_filename;?>" alt="<?php print substr($result->images_caption,0,10); ?>" title="<?php print substr($result->images_caption,0,10); ?>"  border="0"></a>
	</div>
</div>

<div class="galDetailsContainer">
<div class="galTitle"><?php print substr($result->images_caption,0,20).".."; ?></div>
<div class="galArtistProduct">
<a class="gal-artist" href="javascript:;" title=""><?php print $result->artist_name; ?></a>
<!--  Print Type:<?php if($images->image_print_type){echo $images->image_print_type;}else echo "----";?>
<div class="gal-type-size"><span class="gal-product-size-multi">Image size:&nbsp;<?php if($images->image_size){echo $images->image_size;}else{echo "----";}?>
 </span>
 </div>-->
</div>
<!--  <div class="galPricing "><span class="galPrice"> <?php if($images->price){?>
<img src="<?=base_url()?>assets/images/rupee-search-page.gif" alt="rupees" /> <?php echo $images->price;}?></span>
</div>-->
<!--<a href='javascript:call_remove(<?php print $images->image_id; ?>,<?php print $_REQUEST['lightbox_id']; ?>);'>Remove</a>-->
</div>

<div class="galActionsContainer" style="display:none;">
<div class="galActions">
 <div class="galAddToCart galButton" onclick="javascript:show_status('<?php echo $images->image_id;?>');">Add to Cart</div>
<div class="galFrameIt galButton " onclick="frame_it_price_send('<?php print $images->image_id;?>');">Frame It</div>
</div></div></div>
<?php }}if(!$image){?><div style="margin-top:150px;margin-left:300px;color:red;">There is no image in this gallery.</div><?php }?>
				
				</div>
                <!-- gallery block -->
                
                <div class="sortby margin-bottom">
                	<p>
                    	<span class="sortby-txt">Sort by:</span>
                    	<select name="select" id="select"
						onchange="javascript:sorting_lightbox(this.value);">

							<option value="1" <?php if(isset($option)){if($option=='1'){?>
								selected="selected" <?php }}?>>Gallery Name</option>
							<option value="2" <?php if(isset($option)){if($option=='2'){?>
								selected="selected" <?php }}?>>Date created on</option>
					</select>
                    </p>
                    
                    
                    
                </div>
                
            </div>
            <!-- right panel -->
            
        </div>
        <!-- art style -->
        
    </div>