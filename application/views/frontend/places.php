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
<div class="main-container container">
  <div class="pagination" style="margin:0px;"><span><a href="<?=base_url()?>index.php/frontend/index">HOME</a> ><span> Places</span></span></div>
  <div class="art-style">
    <aside class="left-panel-page">
      <p>PLACES</p>
      <div class="list">
        <ul>
          <?php
                       
		                 foreach($sub_val as $values){
                            ?>
          <li><a href="<?php print base_url(); ?>index.php/search/dosearch/1/32/<?=$values->keyword?>/all"><?php echo $values->title;?></a></li>
          <?php }?>
        </ul>
      </div>
    </aside>
	<span style="margin-left:40%"><?php   echo $this->pagination->create_links(); ?></span><br>
    <div class="right-panel" style=" margin-top:0px;">
      <div class="cat-cont-outer">
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
            
            <style>
.sortours{float:left;} .right-panel-page{ margin-top:0px !important;} .art-cate{ margin:12px 0px;} .cat-cont-outer ul li{ width:inherit !important; padding-bottom:inherit !important; } .cat-cont-outer{ padding-bottom:10px;}
</style>
            <div class="srtours pull-right">
              
              <div class="ourpp">
                <div>
                                      
                  
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
        </div>
      </div>
      
      <div class="row">
        <?php
                        
		                 foreach($sub_val as $values){
                            ?>
        <div class="col-md-4 col-sm-6">
          <div class="thems-our1"><a href="<?php print base_url(); ?>index.php/search/dosearch/1/32/<?=$values->keyword?>/all"><img src="<?php echo base_url()?><?=$values->image?>"   width="138px" height="130" border="0"></a>
            <p>
              <?=$values->title?>
            </p>
          </div>
          <div class="thems-our2"><a href="<?php print base_url(); ?>index.php/search/dosearch/1/32/<?=$values->keyword?>/all"><img src="<?php echo base_url()?><?=$values->image2?>"  width="138px" height="130" border="0"></a>
            <p><a href="<?php print base_url(); ?>index.php/search/dosearch/1/32/<?=$values->keyword?>/all"> + more </a></p>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
  <div class="art-style">
    <style>
.cl{ clear:both;}.thems-our{ width:292px; float:left; margin-bottom:20px;} .thems-our1,.thems-our2{ float:left; width:50%;margin-bottom:5px;} .thems-middle{ margin:0px 12px;}.thems-our1 p { font-size:14px;font-family: 'MyriadProRegular',arial; padding:5px 0px;} .thems-our2 p {font-size:14px;font-family: 'MyriadProRegular',arial; padding:5px 22px; float:right;}
</style>
    <div class="right-panel"></div>
  </div>
</div>
