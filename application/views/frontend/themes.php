<div class="container">
	<div class="row">
  
  <!-- art style -->
  <div class="art-style col-md-12">
  <div class="pagination" style="margin:0PX;"> <span> <a href="<?=base_url()?>frontend/index">HOME</a> > <span> Themes</span> </span> </div>
  <div class="row">
    <!-- aside -->
    <aside class="left-panel-page col-md-2 col-xs-3">
      <p>THEMES</p>
      <div class="list">
        <ul>
          <?php  
  
		    foreach($sub_val as $values){
			if($values->keyword=='27'){
			$link='themes_lightbox/';
			}else{
			$link='themes_view/';
			}
			?>
          <li><a href="<?php print base_url(); ?>frontend/<?=$link?><?php echo  $values->keyword ;?>"><?php echo $values->title;?></a></li>
          <?php }?>
        </ul>
      </div>
    </aside>
    <!-- aside -->
    <style>
.cl{ clear:both;}.thems-our{ width:290px; float:left; margin-bottom:20px;} .thems-our1{ float:left; width:145px;margin-bottom:5px;} .thems-middle{ margin:0px 12px;}.thems-our1 p { font-size:14px;font-family: 'MyriadProRegular',arial; padding:5px 0px;} .thems-our2 p {font-size:14px;font-family: 'MyriadProRegular',arial; padding:5px 3px; float:right;} 
</style>
    <div class="right-panel-page col-md-10 col-xs-9">
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

.thumbnail {
  border: 0 none;
  box-shadow: none;
  margin: 0;
  padding: 0;
  position:relative
}

</style>
        <div class="art-movements">
			<span style="margin-left:40%"><?php   echo $this->pagination->create_links(); ?></span>          
        </div>
    <div class="row">
            <?php 
		    foreach($sub_val as $values){
			//print_r($values);
			if($values->keyword=='27'){
			$link='themes_lightbox/';
			}else{
			$link='themes_view/';
			}
         ?>
            <div class="artist_Photo col-md-2 col-sm-3 col-xs-6">
              <div class="thumbnail"> <a href="<?php print base_url(); ?>frontend/<?=$link?><?=$values->keyword?>"> <img src="<?php print base_url();?><?=$values->image?>" class="img-responsive" /> </a>
                <div class="artist_tag">
                  <?=$values->title?>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
        <div class="art-movements">
			<span style="margin-left:40%"><?php   echo $this->pagination->create_links(); ?></span>          
        </div>
    </div>
    <!-- right panel -->
    <!-- right panel -->
  </div></div>
  <!-- art style -->
</div>
</div>
