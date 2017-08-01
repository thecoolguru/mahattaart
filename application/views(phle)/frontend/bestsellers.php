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
<!-- =======================================
MIDDLE SECTION CONTENT
======================================= -->

<!--===MIDDLE PAGE CONTAINER STARTS====-->
<div id="middle-page-container">
	<div class="breadcrum">
		<a href="<?=base_url()?>frontend/index">Home</a> Bestsellers
	</div>

	<!--=======LEFT SIDE PANEL STARTS========-->
	<div class="left-panel-page">
		<!--<div class="main-cat-name"></div>-->
		<div class="sub-cat-links">
			<ul>
				<!--<li>
                  <ul>
                    <li><a href="#" class="parnt">Fine Art</a></li>
                    <li><a href="#">Contemporary</a></li>
                    <li><a href="#">Pop art</a></li>
                    <li><a href="#">Abstract expressionism</a></li>
                    <li><a href="#">Cubism </a></li>
                    <li><a href="#">Art deco</a></li>
                    <li><a href="#">Art nouveau</a></li>
                    <li><a href="#">Post-impressionism</a></li>
                    <li><a href="#">Impressionism</a></li>
                    <li><a href="#">Surrealism</a></li>
                    <li><a href="#">Renaissance</a></li>
                    <li><a href="#">See All...</a></li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><a href="#" class="parnt">Decorative Art</a></li>
                    <li><a href="#">Abstract</a></li>
                    <li><a href="#">Botanical</a></li>
                    <li><a href="#">Scenic</a></li>
                    <li><a href="#">Figurative </a></li>
                    <li><a href="#">World cultures</a></li>
                    <li><a href="#">See All...</a></li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><a href="#" class="parnt">Photography</a></li>
                    <li><a href="#">Black and white photography</a></li>
                    <li><a href="#">Color photography</a></li>
                    <li><a href="#">Sepia photography</a></li>
                    <li><a href="#">Vintage photography </a></li>
                    <li><a href="#">Hand-colored photography</a></li>
                    <li><a href="#">See All</a></li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><a href="#" class="parnt">Vintage Art</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Food & Liquor</a></li>
                    <li><a href="#">Travel</a></li>
                    <li><a href="#">Theatre and Entertainement </a></li>
                    <li><a href="#">Maps</a></li>
                    <li><a href="#">See All...</a></li>
                  </ul>
                </li>-->
				<li>
					<ul>
						<li><a
							href="<?php echo base_url();?>frontend/art_subject"
							class="parnt">SUBJECTS</a></li>
						<?php $result=$this->search_model->get_subjects_section_list();
    					foreach($result as $results){?>
						<li><a
							href="<?php echo base_url();?>search/search_view?searchtext=<?php echo $results['keywords'];?>&page=<?php if(isset($_GET['page'])){echo $_GET['page']; }else echo '1';?>&per_page=<?php if(isset($_GET['per_page'])){echo $_GET['per_page']; }else echo '16';?>&main_category=<?php echo $results['main_category_name'];?>&sub_categ_name=&art_type=&same_fine_art=&same_vintage_art=&same_indian_art=&same_photography=&lot_pl=&artstyles=&product_type=&product_type_id=&collection_main_category=&collection_nm=&top_photographers=&sortby=6"><?php echo $results['main_category_name'];?>
						</a></li>
						<?php }?>
					</ul>
				</li>
				<li>
					<ul>
						<li><a
							href="<?php echo base_url();?>frontend/art_subject"
							class="parnt">ART STYLES</a></li>
						<?php $art_filt1=$this->frontend_model->get_keyword_per_fine_art('Fine Art');
						$art_filt2=$this->frontend_model->get_keyword_per_vintage_art('Vintage Art');
						$art_filt3=$this->frontend_model->get_keyword_per_indian_art('Indian Art');
						$art_filt4=$this->frontend_model->get_keyword_per_photography('Photography');

						?>
						<li><a
							href="<?php echo base_url();?>search/search_view?searchtext=<?php echo $art_filt1->keywords;?>&page=<?php if(isset($_GET['page'])){echo $_GET['page']; }else echo '1';?>&per_page=<?php if(isset($_GET['per_page'])){echo $_GET['per_page']; }else echo '16';?>&main_category=&sub_categ_name=&art_type=&same_fine_art=&same_vintage_art=&same_indian_art=&same_photography=&lot_pl=f1&artstyles=<?php echo $art_filt1->fine_art_type;?>&product_type=&product_type_id=&collection_main_category=&collection_nm=&top_photographers=&sortby=6">Fine
								Art</a></li>
						<li><a
							href="<?php echo base_url();?>search/search_view?searchtext=<?php echo $art_filt2->keywords;?>&page=<?php if(isset($_GET['page'])){echo $_GET['page']; }else echo '1';?>&per_page=<?php if(isset($_GET['per_page'])){echo $_GET['per_page']; }else echo '16';?>&main_category=&sub_categ_name=&art_type=&same_fine_art=&same_vintage_art=&same_indian_art=&same_photography=&lot_pl=v1&artstyles=<?php echo $art_filt2->vintage_art_type;?>&product_type=&product_type_id=&collection_main_category=&collection_nm=&top_photographers=&sortby=6">Vintage
								Art</a></li>
						<li><a
							href="<?php echo base_url();?>search/search_view?searchtext=<?php echo $art_filt3->keywords;?>&page=<?php if(isset($_GET['page'])){echo $_GET['page']; }else echo '1';?>&per_page=<?php if(isset($_GET['per_page'])){echo $_GET['per_page']; }else echo '16';?>&main_category=&sub_categ_name=&art_type=&same_fine_art=&same_vintage_art=&same_indian_art=&same_photography=&lot_pl=i1&artstyles=<?php echo $art_filt3->indian_art_type;?>&product_type=&product_type_id=&collection_main_category=&collection_nm=&top_photographers=&sortby=6">Indian
								Art</a></li>
						<li><a
							href="<?php echo base_url();?>search/search_view?searchtext=<?php echo $art_filt4->keywords;?>&page=<?php if(isset($_GET['page'])){echo $_GET['page']; }else echo '1';?>&per_page=<?php if(isset($_GET['per_page'])){echo $_GET['per_page']; }else echo '16';?>&main_category=&sub_categ_name=&art_type=&same_fine_art=&same_vintage_art=&same_indian_art=&same_photography=&lot_pl=p1&artstyles=<?php echo $art_filt4->photography_type;?>&product_type=&product_type_id=&collection_main_category=&collection_nm=&top_photographers=&sortby=6">photography</a>
						</li>
					</ul>
				</li>
				<li>
					<ul>
						<li><a
							href="<?php echo base_url();?>frontend/product_type"
							class="parnt">Product Types</a></li>
						<li><a
							href="<?php echo base_url();?>search/search_view?searchtext=11or13or23or126or140&page=<?php if(isset($_GET['page'])){echo $_GET['page']; } else echo '1';?>&per_page=<?php if(isset($_GET['per_page'])){echo $_GET['per_page']; }else echo '16';?>&main_category=&sub_categ_name=&art_type=&same_fine_art=&same_vintage_art=&same_indian_art=&same_photography=&lot_pl=&artstyles=&product_type=Prints&product_type_id=1&collection_main_category=&collection_nm=&top_photographers=&sortby=<?php if(isset($_GET['sortby'])){echo $_GET['sortby'];}?>">Art Prints</a>
						</li>
						<li><a
							href="<?php echo base_url();?>search/search_view?searchtext=11or13or23or126or140&page=<?php if(isset($_GET['page'])){echo $_GET['page']; } else echo '1';?>&per_page=<?php if(isset($_GET['per_page'])){echo $_GET['per_page']; }else echo '16';?>&main_category=&sub_categ_name=&art_type=&same_fine_art=&same_vintage_art=&same_indian_art=&same_photography=&lot_pl=&artstyles=&product_type=Posters&product_type_id=3&collection_main_category=&collection_nm=&top_photographers=&sortby=<?php if(isset($_GET['sortby'])){echo $_GET['sortby'];}?>">Posters</a>
						</li>
						<li><a
							href="<?php echo base_url();?>search/search_view?searchtext=11or13or23or126or140&page=<?php if(isset($_GET['page'])){echo $_GET['page']; } else echo '1';?>&per_page=<?php if(isset($_GET['per_page'])){echo $_GET['per_page']; }else echo '16';?>&main_category=&sub_categ_name=&art_type=&same_fine_art=&same_vintage_art=&same_indian_art=&same_photography=&lot_pl=&artstyles=&product_type=Canvas&product_type_id=2&collection_main_category=&collection_nm=&top_photographers=&sortby=<?php if(isset($_GET['sortby'])){echo $_GET['sortby'];}?>">Canvas</a>
						</li>
						
						<li><a
							href="<?php echo base_url();?>search/search_view?searchtext=11or13or23or126or140&page=<?php if(isset($_GET['page'])){echo $_GET['page']; } else echo '1';?>&per_page=<?php if(isset($_GET['per_page'])){echo $_GET['per_page']; }else echo '16';?>&main_category=&sub_categ_name=&art_type=&same_fine_art=&same_vintage_art=&same_indian_art=&same_photography=&lot_pl=&artstyles=&product_type=Framed Art&product_type_id=4&collection_main_category=&collection_nm=&top_photographers=&sortby=<?php if(isset($_GET['sortby'])){echo $_GET['sortby'];}?>">Translight
								</a></li>						
					</ul>
			
			</ul>
			</li>

			</ul>

		</div>
		<div class="bestseller-panel">
			<img src="<?=base_url()?>assets/images/bestsellers-panel-hd.gif" /> <img
				src="<?=base_url()?>assets/images/bestsellers-panel-thumb-a.gif" />
		</div>
		<!--=======LEFT SIDE PANEL ENDS========-->
	</div>

	<!--=======RIGHT SIDE PANEL STARTS========-->
	<div class="right-panel-page">
		<div class="gallery-hdr-wrapper">
			<span class="gallery-hdr">Bestsellers </span>
		</div>

		<!--=======FILTRATION BAR========-->
		<div class="filteration-bar">
			<form>
				<label for="sorting"></label> <select name="sorting" id="sorting">
					<option>Sort by: Popularity</option>
					<option>Popularity</option>
					<option>Newest</option>
					<option>Price-High</option>
					<option>Price-Low</option>
					<option>Width-Narrow</option>
					<option>Width-Wide</option>
					<option>Hight-Short</option>
					<option>Hight-Tall</option>
				</select> <span class="pagelist">Display per page <select
					name="pageno" id="pageno">
						<option>16</option>
						<option>32</option>
						<option>64</option>
				</select> Page 1 of 24 <img
					src="<?=base_url()?>assets/images/next-previous.gif"
					alt="next-previous" width="52" height="21" align="absmiddle" />
				</span>
			</form>
		</div>

		<!--GALLERY AREA STARTS-->

		<!-- This is important for rollover-->
		<div id="Search_String"></div>
		
			<div id="galleryAjaxContainer">
			<div class="galmin">
				<?php     foreach($imagedata as $seller)
                {  ?>
				<!--GalleryThumbnails Starts-->
				<div class="galThumbContainer">
					<!-- Thumbnail and diplay start here-->
					<div class="galImageContainer">
						<div class="galImageCell">
							<a href="#"><img class="galImage"
								src=" https://s3.amazonaws.com/wallsnart/158/<?php echo $seller->images_filename; ?>"
								alt="Portrait of Nur Jahan" title="Portrait of Nur Jahan"
								width="120" height="160" border="0"> </a>
						</div>
					</div>
					<div class="galDetailsContainer">
						<div class="galTitle">
							<?php echo substr($seller->images_caption,0,15); ?>
						</div>
						<div class="galArtistProduct">
							<a class="gal-artist" href="#" title=""><?php echo $seller->images_photographer; ?>
							</a>
							<div class="gal-type-size">
								<span class="gal-product-size-multi"></span>
							</div>
						</div>
						<div class="galPricing ">
							<span class="galPrice"> <!-- <img src="<?=base_url()?>assets/images/rupee-search-page.gif" alt="rupees" />500 - <img src="<?=base_url()?>assets/images/rupee-search-page.gif" alt="rupees" />6500</span>-->
						
						</div>
					</div>
					<div class="galActionsContainer" style="display: none;">
						<div class="galActions">
							<div class="galAddToCart galButton">Add to Cart</div>
							<div class="galFrameIt galButton ">Frame It</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<!--GalleryThumbnails Starts-->

				<!-- rollover part-->
				<div id="ctl00_ctl00_mc_mc_rc_trackingJScript">
					<script type="text/javascript">
var isCriteoLoaded = false;
$(document).ready(function(){$(document).mousemove(function(event) {if(!isCriteoLoaded){lazyLoadCriteo("http://dis.criteo.com/dis/dis.aspx?p1="+escape("v=2&wi=7710849&pt1=3&i1=12548163A&i2=12210187A&i3=10349756A&i4=10382135A") +"&t1=sendevent&p=1704&c=2&cb="+ Math.floor(Math.random()*99999999999));}});});function lazyLoadCriteo(theURL){isCriteoLoaded = true;criteoHTML = '<div id="cto_mg_div" style="display:none;"></div>';criteoHTML = criteoHTML + '<iframe src="'+theURL+'" height="1" width="1" style="display:none;"></iframe>';$('body').append(criteoHTML);}</script>
				</div>
				<div id="ctl00_ctl00_mc_mc_rc_GAJScript"></div>
			</div>
			<div id="gal-zoom" class="shadow hidden">
				<div id="gal-zoom-inner">
					<div class="canvaswrap1" id="wrap1" style="margin-left: 8px;">
						<!--changes done for HDT#66564 -->
						<div class="canvaswrap2" id="wrap2">
							<div class="canvaswrap3" id="wrap3">
								<a class="gal-zoom-img-href" href="#"><img alt=""
									class="gal-zoom-image"
									src="<?=base_url()?>assets/images/blank.gif" border="0" /> </a>
							</div>
						</div>
					</div>
					<div id="gal-zoom-text-container">
						<div class="gal-zoom-details">
							<div class="gal-zoom-text"></div>
							<div class="gal-zoom-actions">
								<div class="gal-button-icon-group">
									<div class="gal-zoom-add-to-cart gal-button">Add to Cart</div>
									<!--<div id="vsfullDetailsAddSelectionGallery" class="gal-find-similar gal-icon-button"><div class="gal-icon"></div>find similar</div>
<div class="clear"></div>-->
								</div>
								<div class="gal-button-icon-group">
									<div class="gal-zoom-frame-it gal-button">Frame It</div>
									<!--<div class="gal-save-to-gallery gal-icon-button"><div class="gal-icon"></div>save to gallery</div>
<div class="clear"></div>-->
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="type-tooltip" class="shadow" style="display: none;">
				<div id="type-tooltip-title"></div>
				<div id="type-tooltip-body">
					<p id="type-tooltip-text"></p>
					<p id="type-tooltip-more" class="link">Learn More</p>
				</div>
				<div id="type-tooltip-arrow"></div>
			</div>
		</div>
	
		<div class="clear"></div>
		<div style="text-align: left;"></div>
<script type="text/javascript" src="<?=base_url()?>assets/js/main.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/gallerypage.js"></script>

		<!--GALLERY AREA ENDS-->

		<!--=======FILTRATION BAR bottom========-->
		<div class="filteration-bar">
			<form>
				<span class="pagelist">Display per page <select name="pageno"
					id="pageno">
						<option>32</option>
				</select> Page 1 of 24 <img
					src="<?=base_url()?>assets/images/next-previous.gif"
					alt="next-previous" width="52" height="21" align="absmiddle" />
				</span>
			</form>
		</div>

		<!--=======RIGHT SIDE PANEL ENDS========-->
	</div>

	<!--===MIDDLE PAGE CONTAINER ENDS====-->
</div>
<!--==========GLOBAL CONTAINERS ENDS===========-->
</div>
</div>
</div>