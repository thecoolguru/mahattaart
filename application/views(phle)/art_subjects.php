
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
<div class="inner-main-container">
    	
        <div class="pagination">
        	<span> <a href="<?= base_url()?>index.php/frontend/index">HOME</a> > <span> Subjects</span> </span>
        </div>
        
        <!-- art style -->
        <div class="art-style">
        	
            <!-- aside -->
            <aside>
            	<p>Subjects</p>
            	<div class="list">
                	<ul>
                    	<?php $result=$this->search_model->get_subcategory(1);
    					foreach($result as $results){?>
						<li><a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo  $results->id ;?>"><?php echo $results->name;?></a></li>
						<?php }?>
                    </ul>
                </div>

                
            </aside>
            <!-- aside -->
            
<div class="right-panel-page">		
		<div class="cat-cont-outer">
			<ul>
				<?php				
				$sorted_arr=$this->search_model->get_subcategory(1);
				$count=count($sorted_arr);
				for($i=0;$i<=$count;$i++){
					if(isset($sorted_arr[$i])){

					if(($sorted_arr[$i]->name=="Abstracts")||($sorted_arr[$i]->name=="Travel ")||($sorted_arr[$i]->name=="still life")||($sorted_arr[$i]->name=="culture")||($sorted_arr[$i]->name=="Archival")||($sorted_arr[$i]->name=="Botanical")||($sorted_arr[$i]->name=="SEASONS")||($sorted_arr[$i]->name=="Poster")||($sorted_arr[$i]->name=="animals")||($sorted_arr[$i]->name=="Architecture")||($sorted_arr[$i]->name=="movie")||($sorted_arr[$i]->name=="Fashion")||($sorted_arr[$i]->name=="CUISINE")||($sorted_arr[$i]->name=="Illustrations")||($sorted_arr[$i]->name=="people")||($sorted_arr[$i]->name=="Illustrations")||($sorted_arr[$i]->name=="Motivational")||($sorted_arr[$i]->name=="culture")||($sorted_arr[$i]->name=="TRANSPORTATION")||($sorted_arr[$i]->name=="politics")||($sorted_arr[$i]->name=="Comics")||($sorted_arr[$i]->name=="Humor")||($sorted_arr[$i]->name=="Maps")||($sorted_arr[$i]->name=="Typography")||($sorted_arr[$i]->name=="Nature")||($sorted_arr[$i]->name=="Performing Arts (Art Style)")||($sorted_arr[$i]->name=="Religion")||($sorted_arr[$i]->name=="Travel")||($sorted_arr[$i]->name=="Animals")){
							

							?>
				<li style="padding-bottom:20px;width:236px"><a href="#" class="main-cat-title" style="border: none;">
							
							
							<div class="galcont" style="width:200px;height:220px">
								<?php if($sorted_arr[$i]->name=="Abstracts"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/abstract_1.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
								<?php if($sorted_arr[$i]->name=="Travel "){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/travel.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
								<?php if($sorted_arr[$i]->name=="still life"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/stilllife.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>

<!--<?php if($sorted_arr[$i]->name=="culture"){?>
								<a href="javascript:call_search('<?php print $sorted_arr[$i]->id ?>');"><img src="<?php print base_url();?>assets/images/subject/culture_1.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>-->
<?php if($sorted_arr[$i]->name=="Archival"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/archival.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Botanical"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/botanical_1.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="SEASONS"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/seasons_1.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Poster"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/poster_1.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="animals"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/animals.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Architecture"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/architecture_1.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="movie"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/movie.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Fashion"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/fashion.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="CUISINE"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/cruisine_1.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Illustrations"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/illustrations_1.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>


<?php if($sorted_arr[$i]->name=="people"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/people.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Motivational"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/motivational.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="culture"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/culture.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="TRANSPORTATION"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/transport.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="politics"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/politics.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Comics"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/comics.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Humor"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/humor.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Maps"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/maps.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Typography"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/typography.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Nature"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/nature.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Performing Arts (Art Style)"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/performingarts.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Religion"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/religion.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Travel"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/travel.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>
<?php if($sorted_arr[$i]->name=="Animals"){?>
								<a href="<?php print base_url(); ?>index.php/search/dosearch/<?php echo $sorted_arr[$i]->id;?>"><img src="<?php print base_url();?>assets/images/subject/animal.jpg" style="width:100%;height:200px" /></a>
								<?php } ?>

							</div>
							<p style="padding-top: 10px"><strong>
								<?php echo strtoupper($sorted_arr[$i]->name);?>
                                                            </strong>
							</p>

					</a>
				</li>
				<?php }
					}
}?>

			</ul>

		</div>

		<!--=======RIGHT SIDE PANEL ENDS========-->
	</div>
    <!-- container -->
	
	  </div>
        <!-- art style -->
        
    </div>
    <!-- container -->