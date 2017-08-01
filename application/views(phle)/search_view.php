<?php
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<?php 
if($this->session->userdata('userid'))
{
$Obj=new Search();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->Search_save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
?>


<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/css/wallnart.css">
<input type="hidden" name="total_cost" id="total_cost" value="<?php print $image_detail->images_filename;?>">
<input type="hidden" name="c_sizes" id="c_sizes" value="<?php print $image_detail->images_filename;?>">
<input type="hidden" name="print_type_for_image" id="print_type_for_image" value="<?php print $image_detail->images_filename;?>">
<input type="hidden" name="print_sizes" id="print_sizes" value="<?php print $image_detail->images_filename;?>">
<input type="hidden" name="sizes" id="sizes" value="<?php print $image_detail->images_filename;?>">

<script type="text/javascript">
function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function show_status(a,cat_id)
{  
    var type="<?php echo $this->input->get('txt');?>";
    var k=$("#total_cost").html();
    var j=$("#c_sizes").html();
    var l=$("#print_type_for_image").html();
       var m=document.getElementById('print_sizes').value;
       var n=document.getElementById('sizes').value;
          if(m==1)
          {
              var print_type='Canvas';
          }
          else if(m==3)
          {
              var print_type='Photographic print';
          }
          else if(m==4)
          {
              var print_type='Premium photographic print';
          }
          else if(m==7)
          {
              var print_type='Translite';
          }
         else if(m==8)
          {
              var print_type='Poster';
          }        
         //alert(print_type);
         //alert(n);
   
 var datastring='image_id='+a+'&price='+ k +'&size='+ n+'&print_type='+print_type;
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
                     var url="<?=base_url()?>index.php/cart/cart_view?img_id="+a+"&search_text="+type+"&price="+k+"&size="+n+"&print_type="+print_type+"&cat_id="+cat_id;
                     window.location.assign(url);
                   }
              }
         });
}

</script>
<div class="inner-search-container">
    
        <div class="pagination">
        	<span> <a href="<?php print base_url();?>">HOME</a> > <span>Search Result</span> > <span id="menus_id"></span>
                
                
			
			
			<script>
function goBack() {
    window.history.back(-1);
}
</script>  

<?php
   $url= $_SERVER['REQUEST_URI'];
  $url_explode=explode('/', $url);
     

    for($i=0;$i<=count($url_explode);$i++)
        {
        
          if($url_explode[$i]=='Photography' || $url_explode[$i]=='Paintings' || $url_explode[$i]=='Poster' || $url_explode[$i]=='Illustration')
            {
   
     ?>
  <a href="javascript:goBack();"><img src="<?php echo base_url()?>assets/images/delete.png"  width="10" height="10"/>&nbsp;
<?php echo $url_explode[$i];?>
</a>
       <?php
            }// end if
            
           if($url_explode[$i]=='Horizontal' || $url_explode[$i]=='Vertical' || $url_explode[$i]=='Square' || $url_explode[$i]=='Slim' || $url_explode[$i]=='Panoramic')
            {
   
     ?>
  <a href="javascript:goBack();"><img src="<?php echo base_url()?>assets/images/delete.png"  width="10" height="10"/>&nbsp;
<?php echo  ucwords($url_explode[$i]);?>
</a>
       <?php
            }// end if shapes
            
            
          if($url_explode[$i]=='red' || $url_explode[$i]=='blue' || $url_explode[$i]=='green' || $url_explode[$i]=='yellow' || $url_explode[$i]=='orange' || $url_explode[$i]=='pink' || $url_explode[$i]=='black' || $url_explode[$i]=='brown' || $url_explode[$i]=='white' || $url_explode[$i]=='grey')
            {
   
     ?>
  <a href="javascript:goBack();"><img src="<?php echo base_url()?>assets/images/delete.png"  width="10" height="10"/>&nbsp;
<?php echo ucwords($url_explode[$i]);?>
</a>
       <?php
            }// end if shapes   
        }?>
   
                </span> &nbsp;| &nbsp;<span >Total Result</span>&nbsp; | (<span id="totalnoimages"></span>)		
        </div>
        
        <!-- art style -->
        <div class="art-style">
        	
            <!-- aside -->
            <aside style="width:10%">
            
<!--                <span class="clear"><a href="#">CLEAR</a></span>-->
                
            	<p>Refine Filter</p>
            	<div class="list">
				<ul>
<li><a href="#" class="parnt">All Art Mediums</a></li>
<li><a <?php if($filter_medium=="Photography"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('2')">Photography</a>
<label></label></li>
<li><a <?php if($filter_medium=="Paintings"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('1')">Paintings</a>
<label></label></li>
<li><a <?php if($filter_medium=="Poster"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('3')">Poster</a>
<label></label></li>
<li><a <?php if($filter_medium=="Illustration"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('4')">Illustration</a>
<label></label></li>
</ul>
			   </div>
                
				<p>SHAPE</p>
            	<div class="list">
                	<ul>
            <li><a href="#" class="parnt">Shapes</a></li>
            <li><a <?php if($shape=="Horizontal"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_shapes('Horizontal');" >Horizontal</a> 
			<label><!--<input type="checkbox" checked >--></label>
			</li>
            <li><a <?php if($shape=="Vertical"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_shapes('Vertical');">Vertical</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($shape=="Square"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_shapes('Square');">Square</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($shape=="Slim"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_shapes('Slim');">Slim</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($shape=="Panoramic"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_shapes('Panoramic');">Panoramic</a><label><!--<input type="checkbox" checked >--></label></li>
        </ul>
                </div>
                
                <p><!--PRICE--></p>
            	<div class="list">
                	
                </div>
                
                <p>COLOR<?=$color_slab.'moha';?></p>
            	<div class="list">
                	<ul>
            <li><a href="#" class="parnt">Color </a></li>
            <li><a <?php if($color_slab=="red"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('red');">Red</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($color_slab=="blue"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('blue');">Blue</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($color_slab=="green"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('green');">Green</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($color_slab=="yellow"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('yellow');">Yellow</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($color_slab=="orange"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('orange');">Orange</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($color_slab=="pink"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('pink');">Pink</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($color_slab=="black"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('black');">Black</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($color_slab=="brown"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('brown');">Brown</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($color_slab=="white"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('white');">White</a><label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($color_slab=="grey"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter_color('grey');">Grey</a><label><!--<input type="checkbox" checked >--></label></li>
        </ul>
                </div>
                
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel" style="width:86%">
            	
                <div class="sortby">
                	<p>
                    	<span class="sortby-txt">Sort by:</span>
				<select name="pageno" id="pageno" onchange="page_view(this.value);">   
				<option <?php if($limit=='16'){?> selected="selected"<?php } ?>>16</option>
				<option <?php if($limit=='32'){?> selected="selected"<?php } ?>>32</option>
				<option <?php if($limit=='64'){?> selected="selected"<?php } ?>>64</option>
				</select>
                    </p>
                    
                    <div class="listing">
                    	<ul>
						
						<?php
                                                
//for($i=0;$i<=count($url_explode);$i++)
//{
//
//    if($url_explode[$i]=='subject' || $url_explode[$i]=='artists' || $url_explode[$i]=='art styles' || $url_explode[$i]=='products' || $url_explode[$i]=='collection' || $url_explode[$i]=='rooms' || $url_explode[$i]=='themes')
//    { 
//        $subject.=$url_explode[$i]; 
//    $page=1;
//    }else{
//
//    $page=$page;
//    }
//   
//}

$resultsPerPage = $limit;
$numberOfRows = $search_data[0]->total;
$totalPages = ceil($numberOfRows / $resultsPerPage);
$prev=$page-1;
$next=$page+1;

?> 
						
						
                        	<li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$prev.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'"> < </a>'; ?></li>
                                <li style=" background-color:#000"><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$page.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'" style="color:#fff;">'; ?><?=$page;?></a></li>
                            <li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">'; ?><b><?=$next;?></</a></li>
                            <li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">></a>'; ?></li>
                        </ul>
                    </div>
                </div>
                <!-- gallery block -->
              
                
                 <div id="grid" class="mosaic_grid clearfix">
          <div id="grid_cells" class="clearfix ">
			<?php 
if(!empty($search_data)){
 $input = array_map("unserialize", array_unique(array_map("serialize", $search_data)));
// print_r($input);
 
foreach ($search_data as $item){
    
    ?>
  <div class="mosaic_cell"  >                      
           
      <!-- Thumbnail and diplay start here-->
<div class="galImageContainer" style="border: none;">
	<div class="galImageCell">
	<a href="<?php print base_url()."index.php/search/image_detail/".$item->images_id."/".$category_id;  ?>" onmouseover="set_id(<?php print $item->images_id; ?>);">
            <input type="hidden" name="img_id" id="img_id<?php print $item->images_id; ?>" value="<?php print $item->images_id; ?>" />
	 <span class="gc_clip" id=""><img  src="<?php print "http://www.indiapicture.in/wallsnart/398/".$item->images_filename;?>" alt="Diane" title="<?php print substr($item->images_caption,0,40).".."; ?>" style="width: auto;height: 280px;;"  border="0"></span></a>
	 <span class="gc_btns">
                                
                                <span style="font-size: 14px; margin-top: 5px;"><?php print substr($item->images_caption,0,40).".."; ?></span><br>
			
                                <b style="float: left; margin-left: 19%; font-size: 14px;">&nbsp;<?php echo $item->images_photographer;?></b>
                        <b style="float: left; margin-left: 18%;font-size: 14px;"><?php echo $item->artist_name;?></b><br>
                       <a <?php  if(!$this->session->userdata('userid')){?>
								href="javascript:void(0)" onclick="login('');"
<?php }else{?>
								href="<?php print base_url()."index.php/search/image_detail/".$item->images_id."/".$category_id;  ?>"
								<?php  }?> ><img src="<?php echo base_url()?>assets/img/addtocart2.png" width="30px;" height="30px;" title="Add to Cart" style=" float: left; margin-left: 21%; "></a>
			
                        &nbsp;  <a <?php    if($this->session->userdata('userid')){?>
								href="javascript:;" onclick="addtogallery(<?php print $item->images_id; ?>);" id="tgl" <?php }
else {?>
								href="javascript:void(0)" onclick="login('');"
<?php }?> ><img src="<?php echo base_url()?>assets/img/gall-icon.gif" title="Add to Gallery" width="30px;" height="30px;" style="float: right; margin-right: 21%;"> </a>
	</div>
</div>


</div>
			<?php } }else {?>
	<span style="margin-top:150px;margin-left:300px;color:red;"> No result found.</span>
<?php }?>
			</div></div>
			
           
        </div>
                
                
                
                
                
            <!-- right panel -->
         <div class="sortby" style="width: 88%; margin: 20px 120px ">
<!--                	<p>
                    	<span class="sortby-txt">Sort by:</span>
				<select name="pageno" id="pageno" onchange="page_view(this.value);">   
				<option <?php if($limit=='16'){?> selected="selected"<?php } ?>>16</option>
				<option <?php if($limit=='32'){?> selected="selected"<?php } ?>>32</option>
				<option <?php if($limit=='64'){?> selected="selected"<?php } ?>>64</option>
				</select>
                    </p>-->
                    
                    <div class="listing">
                    	<ul>
						
						<?php
$resultsPerPage = $limit;
$numberOfRows = $search_data[0]->total;
$totalPages = ceil($numberOfRows / $resultsPerPage);
$prev=$page-1;
$next=$page+1;

?> 
						
						
                        	<li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$prev.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'"> < </a>'; ?></li>
                            <li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$page.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">'; ?><?=$page;?></a></li>
                            
                            <li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">'; ?><?=$next;?></a></li>
                            <li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">></a>'; ?></li>
                        </ul>
                    </div>
                </div>
        </div>
        <!-- art style -->
        
  </div>
        <!-- art style -->
        
    </div>
    <!-- container -->