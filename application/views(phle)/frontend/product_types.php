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





<div class="main-container">
    	
        <div class="pagination" style="margin:0px;">
        
        	<span> <a href="<?=base_url()?>frontend/index"> HOME </a> > <span> Products </span> </span>
        </div>
        
        <!-- art style -->
        <div class="art-style">
        	
            <!-- aside -->
            <aside style="width: 14%;">
            <?php 
           $sub_val=$this->frontend_model->get_header_images(4);
		    foreach($sub_val as $values){
         ?>
			
			
				<p><a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$values->keyword?>" class="parnt"><?=$values->title?></a></p>
                <?php } ?>
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
          <div class="right-panel-page" style="width:auto; margin-top:0px;">		
		<div class="cat-cont-outer">
			
                <!--  Art Movements -->
                <div class="art-movements">
                	
                    
                    
                    
                    
                    
                    
                    
                      
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
.viwepr li { display:inline; padding:0px 2px; width:auto !important; margin-right:inherit; float:none;  margin-right:inherit !important;}
.view_per_page > .link{ padding: 1px 4px;}
.ourpp{ float:left; }
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
	 
	 
	 
	 
	 <!--cdcdc-->
	 
	 <style>.sortours{ width:676px; float:left;} .right-panel-page{ margin-top:0px !important;} .art-cate{ margin:12px 0px;} .cat-cont-outer ul li{ width:inherit !important; padding-bottom:inherit !important; } .artist_Photo a p{ margin-top:35px !important;}</style>
	
	 
	 <div class="srtours" style="width:339px; float:left;">
	 
	 
	 <div class="ourpp">
	 
<ul class="viwepr">
<li>View Per Page</li>
<li class="link" <?php if($limit=='16'){?> selected="selected"<?php } ?> >  1   </li>
<li class="link" > |  </li>
<li class="link" style="color:#000000;" <?php if($limit=='32'){?> selected="selected"<?php } ?>> 2  </li>
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


 <li><? echo '<a href="' . base_url() . 'search/dosearch/'.$category_id.'/'.$prev.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'"> '.$page.' </a>'; ?></li>
                           
                            
                            <li><? echo '<a href="' . base_url() . 'search/dosearch/'.$category_id.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">'; ?><?=$next;?></a></li>
                          
   
  <li class="page-item Next"> <? echo '<a class="page-link Next"  aria-label="Next" href="' . base_url() . 'search/dosearch/'.$category_id.'/'.$next.'/'.$limit.'/'.$search_text.'/'.$sort_by.'/'.$filter_product_type.'/'.$filter_collection.'/'.$filter_medium.'/'.$size.'/'.$price_slab.'/'.$shape.'/'.$filterColor.'">'?> <!--<span aria-hidden="true" style="color:#666666;">  </span> --> </a> </li>

</ul>


</div>
</div>


	 </div>
     <style>
		
		
		.main-title{cursor: pointer;
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
.wrap-inner{ height:150px;}
.wrap-inner img {max-width:100%; 
  max-height:100%;
  margin:auto;
  display:block;}
    
    </style>
	 </div> 
        
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="art-cate">
					
					<?php 
           $sub_val=$this->frontend_model->get_header_images(4);
		    foreach($sub_val as $values){
         ?>
           	   
                    	<div class="artist_Photo">
                        <a href="<?php print base_url(); ?>search/dosearch/none/1/64/<?=$values->keyword?>/none/none/none/none">
                        	<img src="<?php print base_url();?><?=$values->image?>" width="163" height="163" border="0">
                            
                                <p><?=$values->title?></p>
                                </a>
                            
                        </div>
                    <?php }?>
                        
                        
                        
                    </div>
                </div>
                <!--  Art Movements -->
                
                
                 <!--  Trending Art -->
                
                <!--  Trending Art -->
                
                <!--  Photography  -->
                
                <!--  Photography -->
                
                
            </div>

		</div>
             
            </div>
            <!-- right panel -->
            
        </div>