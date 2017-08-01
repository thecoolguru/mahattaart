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
        <!-- art style -->
        <div class="art-style col-md-12">
          <div class="pagination" style="margin:0">
              <span> <a href="#">HOME</a> > Mahatta-Art > <span> Partner</span> </span>
          </div>
        	<div class="row">
                <!-- aside -->
                <aside class="left-panel-page col-md-2 col-xs-3">
                    <p>Let Us Help</p>
                    <div class="list">
                        <ul>
                            <li ><a href="<?=base_url()?>index.php/frontend/contact">Contact us</a></li>
                            <li><a href="<?=base_url()?>index.php/frontend/faq">FAQ's</a></li>
                             <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Ordering</a></li>
                              <li><a href="<?php echo base_url()?>index.php/frontend/shipping">Shipping & Delivery</a></li>
                        </ul>
                    </div>
    
                    <p>My Account</p>
                    <div class="list">
                        <ul>
                            <li><a href="<?php print base_url();?>index.php/user/profile">My Profile</a></li>
                            <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Track My Order</a></li>
                            <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Order History</a></li>
                        </ul>
                    </div>
                    
                    <p>Mahatta-Art</p>
                    <div class="list">
                        <ul>
                            <li><a href="<?=base_url()?>index.php/frontend/about">The Company</a></li>
                            <li><a href="<?=base_url()?>index.php/frontend/media_center">Media Center</a></li>
                            <li><a href="<?=base_url()?>index.php/frontend/career">Careers</a></li>
                            <li class="active-cat-link" style="color:#339900; font-size:16px;word-break: break-all;">Partners</li>
                        </ul>
                    </div>
                    
                </aside>
                <!-- aside -->
                
                <!-- right panel -->
                <div class="right-panel-page col-md-10 col-xs-9">
                    
                    <!--  Art Movements -->
                        <div class="art-movements">
                            <div class="art-inner">
                                <p>Partner</p>
                                <img src="<?php print base_url();?>assets/img/partner.jpg" width="100%" height="" border="0">
                            </div>
                        </div>
                        
                        
                        <div class="row partner">
                        	<div class="col-xs-12 col-sm-4 col-md-4">
                            	<img src="<?php print base_url();?>assets/img/EClogo.jpg" class="img-responsive" />
                            </div>
                        	<div class="col-xs-12 col-sm-4 col-md-4">
                            	<img src="<?php print base_url();?>assets/img/UIGlogo.jpg" class="img-responsive" />
                            </div>
                        	<div class="col-xs-12 col-sm-4 col-md-4">
                            	<img src="<?php print base_url();?>assets/img/tetralogoandname.jpg" class="img-responsive" />
                            </div>
                        </div>
                    </div>
                    <!--  Art Movements -->
            </div>
            </div>
            <!-- right panel -->
        </div></div>