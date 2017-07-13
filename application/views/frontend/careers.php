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
            <span> <a href="#">HOME</a> > Mahatta-Art > <span> Career</span> </span>
        </div>    	
        <!-- art style -->
        <div class="art-style">
            <!-- aside -->
            <aside class="left-panel-page">
            <p>Let Us Help</p>
            	<div class="list">
                	<ul>
                    	<li ><a href="<?=base_url()?>index.php/frontend/contact">Contact us</a></li>
                        <li><a href="<?=base_url()?>index.php/frontend/faq">FAQ's</a></li>
                        <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Ordering</a></li>
                        <li><a href="<?php echo base_url()?>index.php/frontend/shipping">Shipping & Delivery</a></li>
                    </ul>
                </div>
<?php if($this->session->userdata('userid')){ ?>
                <p>My Account</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?php print base_url();?>index.php/user/profile">My Profile</a></li>
                        <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Track My Order</a></li>
                        <li><a href="<?php echo base_url()?>index.php/frontend/ordering">Order History</a></li>
                    </ul>
                </div>
                <?php } ?>
                <p>Mahatta-Art</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>index.php/frontend/about">The Company</a></li>
                        
                        <li class="active-cat-link" style="color:#339900; font-size:16px;">Careers</li>
                        <li ><a href="<?=base_url()?>index.php/frontend/Partner">Partners</a></li>
                    </ul>
                </div>
                
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel-page">
            	
                <!--  Art Movements -->
                	<div class="art-movements col-sm-12" style="padding-left:0 !important">
                        <div class="art-inner" style="margin:0 !important">
                            <p>Career</p>
                            <img src="<?php print base_url();?>assets/img/career.jpg" border="0" class="img-responsive" />
                        </div>
                    </div>
                    
                    <div class="career-page col-sm-12" style="padding-left:0 !important">
                        <h2>About Working for MahattaArt</h2>
                        <p>MahattaArt is made up of talented people who are original thinkers and who love a culture where innovation, creativity and results are valued. 
                        Since its inception in 2010, MahattaArt has grown to be a professional development and advancement for our employees. MahattaArt is an ambitious company, 
                        which presents a rare and exciting situation for our employees and job candidates.</p>
                        
                        <p><strong>To know about openings :</strong></p>
                        <span>Contact us at <a href="mailto:info@mahattaart.com">info@mahattaart.com</a>  or  Call us at : 011-41828972  </span>
                        
                        <h2 class="margin-top">Discover your potential</h2>
                        <p>As an innovative and growing company, MahattaArt consistently strives to remain competitive in attracting and retaining employees whose work-hard,
                         play-hard attitude allows them to thrive in achieving both personal and professional goals. Our performance-based culture has been developed around this approach. 
                        You can also expect challenging, rewarding work, competitive salaries, great benefits, and tremendous opportunities for career growth.</p>
                        
                        <h2 class="margin-top">Location</h2>
                        <p>Delhi</p>
                    </div>
                </div>
                <!--  Art Movements -->
 
            </div>
            <!-- right panel -->
            
        </div>