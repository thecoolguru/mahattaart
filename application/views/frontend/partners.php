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
        <div class="pagination" style="margin:0">
            <span> <a href="#">HOME</a> > Mahatta-Art > <span> Partner</span> </span>
        </div>    	
        <!-- art style -->
        <div class="art-style">
        	
            <!-- aside -->
            <aside class="left-panel-page">
            	<p>Let Us Help</p>
            	<div class="list">
                	<ul>
                    	<li ><a href="<?=base_url()?>frontend/contact">Contact us</a></li>
                        <li><a href="<?=base_url()?>frontend/faq">FAQ's</a></li>
                         <li><a href="<?php echo base_url()?>frontend/ordering">Ordering</a></li>
                          <li><a href="<?php echo base_url()?>frontend/shipping">Shipping & Delivery</a></li>
                    </ul>
                </div>
<?php if($this->session->userdata('userid')){ ?>
                <p>My Account</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?php print base_url();?>user/profile">My Profile</a></li>
                        <li><a href="<?php echo base_url()?>frontend/ordering">Track My Order</a></li>
                        <li><a href="<?php echo base_url()?>frontend/ordering">Order History</a></li>
                    </ul>
                </div>
                <?php } ?>
                <p>Mahatta-Art</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/about">The Company</a></li>
                       
                        <li><a href="<?=base_url()?>frontend/career">Careers</a></li>
                        <li class="active-cat-link" style="color:#339900; font-size:16px;">Partners</li>
                    </ul>
                </div>
                
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel-page">
            	
                <!--  Art Movements -->
                	<div class="art-movements">
                        <div class="art-inner">
                            <p>Partner</p>
                            <img src="<?php print base_url();?>assets/img/partner.jpg" width="100%" height="" border="0">
                        </div>
                    </div>
                    
                    <div class="career-page">
                     	<div class="partner">
                        	<ul>
                            	<li><a href="#"><img src="<?php print base_url();?>assets/img/EClogo.jpg" class="img-responsive" /></a></li>
                            	<li><a href="#"><img src="<?php print base_url();?>assets/img/UIGlogo.jpg" class="img-responsive" /></a></li>
                            	<li><a href="#"><img src="<?php print base_url();?>assets/img/tetralogoandname.jpg" class="img-responsive" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--  Art Movements -->
 
            </div>
            <!-- right panel -->
            
        </div>