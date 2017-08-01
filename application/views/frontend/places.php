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
<div class="container">
<div class="row">
  <div class="art-style col-md-12">
<div class="pagination" style="margin:0px;"><span><a href="<?=base_url()?>frontend/index">HOME</a> ><span> Places</span></span></div>
  <div class="row">
    <aside class="left-panel-page col-md-2 col-xs-3">
      <p>PLACES</p>
      <div class="list">
        <ul>
          <?php
                       
		                 foreach($sub_val as $values){
                            ?>
          <li><a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all"><?php echo $values->title;?></a></li>
          <?php }?>
        </ul>
      </div>
    </aside>
	<span style="margin-left:40%"><?php   echo $this->pagination->create_links(); ?></span><br>
    <div class="right-panel-page col-md-10 col-xs-9">
      <div class="row">
        <?php
                        
		                 foreach($sub_val as $values){
                            ?>
        <div class="col-md-4 col-sm-6">
        <div class="row">
          <div class="thems-our1 col-xs-6 col-md-6 col-sm-6">
          <a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all">
          	<img src="<?php echo base_url()?><?=$values->image?>" class="img-responsive" /></a>
            <p>
              <?=$values->title?>
            </p>
          </div>
          <div class="thems-our2 col-xs-6 col-md-6 col-sm-6">
          <a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all">
          <img src="<?php echo base_url()?><?=$values->image2?>" class="img-responsive" /></a>
            <p>
            <a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all" class="read_more">
             + more </a>
             </p>
          </div>
        </div></div>
        <?php }?>
      </div>
    </div>
  </div></div>
</div>
</div>
<style>
.thems-our1, .thems-our2 {
	margin-bottom: 20px;
}
</style>
