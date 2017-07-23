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
<style type="text/css">
.menu_head {
	padding: 5px 12px;
	cursor: pointer;
	position: relative;
	margin:1px;
    background:url(<?=base_url()?>assets/img/bulet.png) center left no-repeat;
	
}
.menu_body {
	display:none;
}
.menu_body a{
  display:block;
  color:#006699;
  font-size: 14px;
  padding:4px 0px 4px 16px;
  text-decoration:none;
  background: #fff url(<?=base_url()?>assets/img/bulet.png) center left no-repeat;
}

p{padding: 1px 13px; font-weight:inherit; border:none;color: #444; font-weight:bold;} 
</style>
<div class="container">
  <div class="pagination" style="margin:0px;"> <span> <a href="<?=base_url()?>frontend/index">HOME</a> > <span> Artists </span> </span> </div>
  <!-- art style -->
  <div class="art-style">
    <!-- aside -->
    <aside class="left-panel-page">
      <div id="firstpane" class="menu_list">
        <p class="menu_head">Artist</p>
        <div class="list">
          <ul>
            <?php
                        foreach($sub_val as $values){
                            ?>
            <li> <a href="<?php print base_url(); ?>search/dosearch/1/32/<?php echo $values->keyword;?>/all"><?php print ucwords($values->title); ?></a> </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </aside>
    <!-- aside -->
    <div class="right-panel-page">
      <div>
        <style>
		.pagination li { display:inline-block;}
		.cat-cont-outer ul li{ width:auto !important;}
		.main-title{cursor: pointer;
    margin-bottom: 2px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #333;
    font-size: 13px;
    margin: 9px 0px 4px 0px;  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; /*  font-family: "Times New Roman",serif;*/

	}
	
.Next{    background: url(<?php print base_url(); ?>uploaded_pdf/Gallery_ImageSprite.png) no-repeat -49px -26px;
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
        <!--  Art Movements -->
        <div class="art-movements">
          <div class="row">
            <p>Artists</p>
          </div>
          <span style="margin-left:40%">
          <?php   echo $this->pagination->create_links(); ?>
          </span><br>
          <div class="art-cate row">
            <?php 
		    foreach($sub_val as $values){
         ?>
            <div class="artist_Photo">
              <div class="col-md-12 thumbnail"> <a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all"> <img src="<?php print base_url();?><?=$values->image?>"  border="0" class="img-responsive" /> </a>
                <div class="artist_tag">
                  <?=$values->title?>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
        <span style="margin-left:50%">
        <?php   echo $this->pagination->create_links(); ?>
        </span><br>
      </div>
    </div>
    <!--=======RIGHT SIDE PANEL ENDS========-->
  </div>
  <!-- container -->
</div>
<!-- aside -->

</div>
<!-- art style -->
</div>
<script type="text/javascript">
$(document).ready(function()
{
	//slides the element with class "menu_body" when paragraph with class "menu_head" is clicked 
	$("#firstpane p.menu_head").click(function()
    {
		$(this).css({backgroundImage:"url(<?=base_url()?>assets/img/bulet-down.png)"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
       	$(this).siblings().css({backgroundImage:"url(<?=base_url()?>assets/img/bulet.png)"});
	});
	//slides the element with class "menu_body" when mouse is over the paragraph
	$("#secondpane p.menu_head").mouseover(function()
    {
	     $(this).css({backgroundImage:"url(<?=base_url()?>assets/img/bulet-down.png)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
         $(this).siblings().css({backgroundImage:"url(<?=base_url()?>assets/img/bulet.png)"});
	});
});
</script>
<style>
.thumbnail {
  border: 0 none;
  box-shadow: none;
  margin: 0;
  padding: 0;
}

</style>
