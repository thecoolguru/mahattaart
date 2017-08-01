<?php 


?>
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
<div class="main-container">


<!-- art style -->
<div class="art-style">


    <style>.wrap-inner{ padding:0px 2px 10px 12px; margin: 0px 10px;} .wrap-inner img{-webkit-box-shadow: -6px 3px 13px 0px rgba(0,0,0,0.75);
-moz-box-shadow: -6px 3px 13px 10px rgba(0,0,0,0.75);
box-shadow: -6px 3px 13px 0px rgba(0,0,0,0.75);}</style>	

<!-- aside -->
<aside style="width:13%">
               <p>Refine Filter</p>
            	<div class="list">
				<ul>
            <li><a href="#" class="parnt">All Art Mediums</a></li>
            <li><a <?php if($filter_medium=="Photography"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('Photography');">Photography</a>
			<label><!--<input type="checkbox" checked >--></label></li>
            <!--<li><a <?php if($filter_medium=="Sketching"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('Sketching');">Sketching</a></li>-->
            <!--<li><a <?php if($filter_medium=="Sculptures"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('Sculptures');">Sculptures</a></li>-->
            <li><a <?php if($filter_medium=="Paintings"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('Paintings');">Paintings</a>
			<label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($filter_medium=="Poster"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('Poster');">Poster</a>
			<label><!--<input type="checkbox" checked >--></label></li>
            <li><a <?php if($filter_medium=="Illustration"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('Illustration');">Illustration</a>
			<label><!--<input type="checkbox" checked >--></label></li>
            <!--<li><a <?php if($filter_medium=="Drawings"){print "style='color:orange;margin-left:10px'";} ?> href="javascript:call_filter2('Drawings');">Drawings</a></li>-->
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
                
                <p>COLOR</p>
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
<style>.ic-home{ top: -2px !important;}</style>

<div class="right-panel">

<div class="pagination" style="padding:0px; margin:0px;">
            <span> <a style="color:#888; font-size:11px;" href="<?php print base_url();?>"> <i class="glyphicon glyphicon-home ic-home" style="font-size:14px;"> </i> </a>  </span> >
			 <span style="color:#000000; font-weight:700;"> Search Result </span> > 
			 <span style="color:#000000; font-weight:700;"> <?php if($search_text<>'none'){echo str_replace('%20',' ', $search_text);}?> </span>
                
<script>
function goBack() {
    window.history.back(-1);
}
</script>  

<?php
   $url= $_SERVER['REQUEST_URI'];
  $url_explode=explode('/', $url);
  
   if($url_explode[4]<>'' &&$url_explode[4]<>'none'){
     ?>
  <a href="javascript:goBack();"><img src="<?php echo base_url()?>assets/images/delete.png"  width="10" height="10"/>&nbsp;
<?php 
     echo  ucwords(str_replace('%20',' ',$url_explode[4]));
       
    }
    ?>
</a>



   <?php  
 
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
   
                </span> &nbsp;| &nbsp;<span >Total Result</span>&nbsp; | (<span id="totalnoimages"><?=$total?></span>)		
        </div>

<!--  Art Movements 
<div class="art-movements">
  <div class="art-inner"> <img src="<?php print base_url();?>assets/img/faq.jpg" width="710" height="210" border="0"> </div>
</div>
-->

<br />

     <div class="">
     <!--<h2>Shipping & Delivery</h2>-->
	 
	 
	 <div class="row" style="margin:0px; padding:0px; border-bottom: 1px solid #D6D6D6;">
	 <div class="sortours">
	 
	 <select id="gal-customcombobox">
	 
  <option value="popularity">  SORT BY:  POPULARITY    </option>
  
 
  <option value="Popularity"> Popularity </option>
  
  <option value="Price-h"> Price - High </option>
  
  <option value="Price_Low"> Price - Low </option>
  <option value="Narrow"> Narrow - Width </option>
   <option value="Wide"> Wide - Width </option>
    <option value="Tall"> Tall - Height </option>
  
  
</select>
	 
	 
	 </div>
	 
	 <style>
	 
 
	 #gal-customcombobox {
    overflow: hidden;
	-webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    text-align: left;
    z-index: 2;
    line-height: 1.9;
	background: url('http://dev.wallsnart.com/uploaded_pdf/Gallery_ImageSprite.png') no-repeat -25px -96px;
    padding: 2px 2px 4px 10px;
    width: 233px;
    height: 28px;
	font-family:'BebasNeueRegular',Arial,sans-serif bold;
	border:none;
	font-size:14px;
	font-weight:600;
	color:#888888;
	
	
}

#gal-customcombooptions {
    margin: 0;
    border: 0;
    width: 230px;
    _width: 230px;
    display: none;
    border: 1px solid #8A9099;
    border-top: 1px solid transparent;
    cursor: pointer;
    position: relative;
    top: 4px;
    text-align: left;
    left: 0;
    z-index: 1;
}
.gal-sortby {
    font-size: 36px;
    color: #fff;
    height: 24px;
    padding-bottom: 11px;
    padding-left: 22px;
}

#gal-hovercombobox {
   x;
    height: 28px;
    width: 200px;
    font-size: 20px;
    padding: 4px 23px 4px 10px;
    color: #000;
}

.viwepr{ padding:2px 0px;}
.viwepr li { display:inline; padding:0px 2px;}
.view_per_page > .link{ padding: 1px 4px;}
.ourpp{ float:left; width:169px;}
.pagination li a { border:none; color:#666666; padding: 2px 10px;}
.pagination li:nth-child(1){ font-weight:bold;}
.viwepr{font-family: "Times New Roman",serif; font-size:13px;}
.viwepr li:nth-child(4){font-weight:bold;}
.viwepr li:nth-child(1){ font-family: "Times New Roman",serif; font-size:13px;}

.pagination li:last-child a {
 /* border: solid 1px #CCCCCC;*/
    border-radius: 4px;
	color:#333333;
}
.pagination li a {font-family: "Times New Roman",serif; font-size:13px;}

</style>
	 
	 
	 <!--cdcdc-->
	 
	 <style>.sortours{ width:676px; float:left;}</style>
	
	 
	 <div class="srtours" style="width:339px; float:left;">
	 
	 
	 <div class="ourpp">
	 
<ul class="viwepr">
<li>View Per Page</li>
<li class="link" <?php if($limit=='16'){?> selected="selected"<?php } ?> >  16   </li>
<li class="link" > |  </li>
<li class="link" style="color:#000000;" <?php if($limit=='32'){?> selected="selected"<?php } ?>> 32  </li>
<li class="link" > |  </li>
<li class="link" <?php if($limit=='64'){?> selected="selected"<?php } ?>> 48 </li></ul> 



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
<ul class="pagination" style="padding:0px; margin:0px;">


   <li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$prev.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'"> '.$page.' </a>'; ?></li>
                           
                            
                            <li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">'; ?><?=$next;?></a></li>
                          
   
  <li class="page-item Next"> <? echo '<a class="page-link Next"  aria-label="Next" href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$jump.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">'?> <!--<span aria-hidden="true" style="color:#666666;">  </span> --> </a> </li>

</ul>


</div>
</div>


	 </div>
	 </div>
	 

<style>.main-title{cursor: pointer;
    margin-bottom: 2px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #333;
    font-size: 13px;
    margin: 9px 0px 4px 0px;  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; /*  font-family: "Times New Roman",serif;*/

	}
	
.Next{    background: url(http://dev.wallsnart.com/uploaded_pdf/Gallery_ImageSprite.png) no-repeat -49px -26px;
    width: 18px;
    height: 18px;
    vertical-align: bottom;
    border: 0;}
    
.pdc {
    color: #F44349 !important;
    font-family: "Helvetica Neue","HelveticaNeue-Light","Helvetica Neue Light",Helvetica,Arial,"Lucida Grande",sans-serif;
    font-size: 12px;
	padding:0px 15px;
}
.products a{ font-size:11px; text-decoration:underline !important; color: rgb(136, 136, 136); font-size: 11px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;}
	
.producttype a{font-size:12px;color:#999;}
.lineth{text-decoration: line-through;}
.wrap-inner{ height:159px;}
.wrap-inner img {max-width:100%; .wrap-inner img
  max-height:100%;
  height:150px;
  margin:auto;
  display:block;}
.wrap-inner{ border: none;}
    
    </style>

<div class="gallery-img">
                	<ul>
					
					<?php 
if(!empty($search_data)){
 $input = array_map("unserialize", array_unique(array_map("serialize", $search_data)));
// print_r($input);
 
foreach ($search_data as $item){
      $images_id=$this->search_model->get_image_id_based_on_fileName($item['image_filename']);
     $category_id=  $this->search_model->get_category_id_based_on_image_id($images_id);
       
      ?>
                    	<li>
                        	<a href="<?php print base_url()."index.php/search/image_detail/".$item['image_filename']."/".$category_id."/".$item['image_id']."/".$images_id."/".$item['image_collection_id'];  ?>">
							<input type="hidden" name="img_id" id="img_id<?php print $images_id; ?>" value="<?php print $images_id ?>" />
                            	<div class="wrap">
                                	<div class="wrap-inner"><img  src="<?php print "http://www.indiapicture.in/wallsnart/398/".$item['image_filename'];?>"  title="<?php print substr($item['image_caption'],0,40).".."; ?>"></div>
                                    
                                    
                                    <div class="main-title">
                                     <?php print substr($item['image_caption'],0,20).".."; ?>
                                    </div>
                                    
         <div class="products" style="padding: 0px 0px 3px 0px;"> <a href="#"> <?php echo $item['image_photographer'];?> </a>  </div> 
          <div class="producttype"> <a href="#"> <?php echo $item->artist_name;?> </a> </div> 
                       
 <!--<div> <span style="color: #333; font-size:12px;"> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
 </div>-->

 <div>  <a href="javascript:;" onclick="addtointrestedgallery('<?=$item['image_id']?>','<?=$images_id?>');" style="" href="javascript:;"> <i class="glyphicon glyphicon-envelope"></i> </a>      
        
		
		
		<a style=" color:#999; font-size:20px; padding-left:68%"
								href="javascript:;" <?php  if($this->session->userdata('userid')){?> onclick="addtogallery(<?=$item['image_id']?>,<?=$images_id?>);" <?php }else{?> onclick="login('');" <?php }?> id="tgl" ><i class="gall"> </i> </a><br>Details to buy </div>
    <br>                           
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                        
                        
	<?php } }else {?>
                  
   
    <!-- other images... -->
    
                  
                  
                  
	<span style="margin-top:150px;margin-left:300px;color:red;"> No result found.</span>
<?php }?>					
						
                    </ul>
                </div>


<script type="text/javascript" src="<?php print base_url();?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/js/gallerypage.js"></script>
<script>
function call_gallery()
{	
alert();
	$("#tgl-bx").show(400);
	$("#overlay-bx").show();
	$('#tgl-bx select option:eq(0)').prop('selected', true);
	document.getElementById('tgl-bx').style.display='block';
	document.getElementById('fade').style.display='block';
}
$("#overlay-bx").click(function(){
	$("#tgl-bx").hide(400);
	$("#size_print_type").hide(400);
	$("#overlay-bx").hide(400);

});

$("#toggle-btn").click(function(){
	$("#toggle-data").toggle(400);
});


</script>




<style> .ourd li { float:left; padding:0px 4px} .right{ float:right; border-bottom: dotted 1px #ccc;} </style>

<div class="row" style="background-color:#f7f7f7;">
<div class="col-md-7"> 

<div id="back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" style="padding:5px 0px 0px;">  <span class="glyphicon glyphicon-chevron-up"> </span> <a style="color:#333333;" href="#"> Back To Top  </a>   </div>   </div>

<div class="col-md-5"> 
<div class="ourd">
<ul>
<li> View Per Page </li>
<li class="link" <?php if($limit=='16'){?> selected="selected"<?php } ?> >  16   </li>
<li class="link" > |  </li>
<li class="link" style="color:#000000;" <?php if($limit=='32'){?> selected="selected"<?php } ?>> 32  </li>
<li class="link" > |  </li>
<li class="link" <?php if($limit=='64'){?> selected="selected"<?php } ?>> 48 </li>
</ul> 


						<?php
$resultsPerPage = $limit;
$numberOfRows = $search_data[0]->total;
$totalPages = ceil($numberOfRows / $resultsPerPage);
$prev=$page-1;
$next=$page+1;
$jump=$next+2;
?> 
						


<span class="pagination" style="padding:0px; margin:0px;">
  
  <li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$prev.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'"> '.$page.' </a>'; ?></li>
                           
                            
                            <li><? echo '<a href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">'; ?><?=$next;?></a></li>
                          
   
  <li class="page-item"> <? echo '<a class="page-link Next"  aria-label="Next" href="' . base_url() . 'index.php/search/dosearch/'.$category_id.'/'.$jump.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">'?> <!--<span aria-hidden="true" style="color:#666666;"> &raquo; </span>--> </a> </li>
</span>
</div>
</div>
</div>



<div style="border-bottom:solid 1px #000000;">  &nbsp; </div> 

<div class="sortby">
                    
                </div>
     
    <p>&nbsp;</p> 


<p>&nbsp;</p>

</div>


</div>
<!--  Art Movements -->

</div>
<!-- right panel -->



<style>

.career-page h3 {  font-family: 'BebasNeueRegular',Arial,Helvetica,sans-serif;   font-size: 27px;
    font-weight: normal;
    color: #000;
    margin: 5px 0 5px 0; }

.career-page h4 {  font-size: 14px;
    font-weight: bold;
    color: #000;
	margin: 5px 0 5px 0;
    }


.faqquestion p { padding:0px 0px 2px 0px !important;}
.faqquestion p strong{ /*font-family: "Times New Roman",Times,serif;*/    font-size: 14px;
    font-weight: bold;
    color: #000;
	margin: 0px 0 18px 0;
   }
	
.faq-content p {  padding:0px 0px 18px 0px !important;/*font-family: "Times New Roman",Times,serif;*/}

.career-page ul { margin:4px 13px;}

ul.a {list-style-position:inside;}


</style>