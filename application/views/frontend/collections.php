<?php 
if($this->session->userdata('userid'))
{
$Obj=new Frontend();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
?>

<div class="container">
<div class="row">
  <div class="pagination" style="margin:0px;"> <span> <a href="<?=base_url()?>frontend/index">HOME</a> > <span> Collections</span> </span> </div>
  <!-- art style -->
  <div class="art-style col-md-12">
  <div class="row">
    <div class="art-style">
      <!-- aside -->
      <aside class="left-panel-page col-md-2 col-xs-3">
        <p>Illustration</p>
        <div class="list">
          <ul>
            <li><a href="<?=base_url()?>search/dosearch/1/32/17/all">Danita Illustration </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/19/all"> Science Photo Library </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/18/all"> Universal Illustration </a></li>
          </ul>
        </div>
        <p>Paintings</p>
        <div class="list">
          <ul>
            <li><a href="<?=base_url()?>search/dosearch/1/32/1/all"> Danita Painting </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/4/all">Shree </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/23/all">Bridgeman</a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/3/all">Universal Painting </a></li>
			 <li><a href="<?=base_url()?>search/dosearch/1/32/25/all">Everett Painting</a></li>
          </ul>
        </div>
        <p>Photography </p>
        <div class="list">
          <ul>
		      <li><a href="<?=base_url()?>search/dosearch/1/32/5/all">Flower Photos </a></li>
			   <li><a href="<?=base_url()?>search/dosearch/1/32/7/all">Universal Images Group Photo </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/8/all">Danita Photography</a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/12/all">Everett Photography</a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/21/all">Tetra </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/22/all">Roop </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/24/all">Food Collection </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/26/all">God </a></li>          
          </ul>
        </div>
        <p>Poster</p>
        <div class="list">
          <ul>
            <li><a href="<?=base_url()?>search/dosearch/1/32/16/all">Danita Poster </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/14/all">Deagostini Poster </a></li>
            <li><a href="<?=base_url()?>search/dosearch/1/32/15/all">Universal Poster </a></li>
          </ul>
        </div>
      </aside>
      <!-- aside -->
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

</style>
              <?php 
		    foreach($sub_val as $values){
			 if($values->title!='Illustration' && $values->title!='Photography' && $values->title!='Poster'&& $values->title!='Painting'){
         ?>
              <div class="artist_Photo col-md-2 col-sm-3 col-xs-6">
                        	<div class="thumbnail">
                                <a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->collection_id?>/all">
                                <img src="<?php print base_url();?><?=$values->image?>" /></a>
								<div class="artist_tag"><?=$values->title?></div>
                            </div>
                        </div>
              <?php }}?>
      </div>
    </div>
    <!-- art style -->
  </div>
  </div>
</div></div>

<style>

@media (min-width: 768px) and (max-width: 991px) {
	.art-movements p {
	  font-size: 22px;
	}
}

@media (min-width: 992px) and (max-width: 1199px) {
	.art-movements p {
	  font-size: 22px;
	}
}

.thumbnail {
	border: 0 none;
	box-shadow: none;
	margin: 0;
	padding: 0;
	position: relative;
}

</style>
