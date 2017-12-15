

<?php 
//echo "Sajid"; test for live
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
                <span> <a href="<?=base_url()?>frontend/index"> HOME </a> > Let Us Help > <span> Contact </span> </span>
            </div>
            <div class="row">
                <!-- aside -->
                <aside class="left-panel-page col-md-2 col-xs-3">
                    <p>Let Us Help</p>
                    <div class="list">
                        <ul>
                            <li class="active-cat-link" style="color:#339900; font-size:16px;">Contact us</li>
                            <li><a href="<?=base_url()?>frontend/faq">FAQ's</a></li>
                            <li><a href="<?php echo base_url()?>frontend/ordering">Ordering</a></li>
                            <li><a href="<?php echo base_url()?>frontend/shipping">Shipping & Delivery</a></li>
                        </ul>
                    </div>
              <?php if($this->session->userdata('userid')){?>
                    <p>My Account</p>
                    <div class="list">
                        <ul>
                            <li><a href="<?php print base_url();?>user/profile">My Profile</a></li>
                               <li><a href="<?php echo base_url()?>frontend/ordering">Track My Order</a></li>
                                   <li><a href="<?php echo base_url()?>frontend/ordering">Order History</a></li>
                        </ul>
                    </div>
                    <?php }?>
                    <p>Mahatta-Art</p>
                    <div class="list">
                        <ul>
                            <li><a href="<?=base_url()?>frontend/about">The Company</a></li>
                           
                            <li><a href="<?=base_url()?>frontend/career">Careers</a></li>
                            <li><a href="<?=base_url()?>frontend/partner">Partners</a></li>
                        </ul>
                    </div>
                    
                </aside>
                <!-- aside -->
                
                <!-- right panel -->
                <div class="right-panel-page col-md-10 col-xs-9">
                    
                    <!--  Art Movements -->
                        <div class="art-movements">
                            <div class="art-inner">
                                <p>Contact Us </p>
                                <img src="<?php print base_url();?>assets/img/contact.jpg" border="0" class="img-responsive">
                            </div>
                        </div>
                        
                        <div class="career-page">
                            <h2>Corporate Office</h2>
                            <p>8/17, Ground Floor, Sarvapriya Vihar,  New Delhi -110016</p>
                            
							<h2 class="margin-top">Physical Store:</h2>
                            <p>Visualize art or just pick up or drop your order by visiting our first experience store at Logix Mall Noida, 2nd Floor, behind Hamleys.</p>
							
                            <h2 class="margin-top">Call Us</h2>
                            <p>Tel : 91-11-41828972 &nbsp +91-8800639075</p> 
                            
                            <h2 class="margin-top">Mail Us</h2>
                            <p>Send a note to <a href="mailto:info@mahattaart.com"> info@mahattaart.com </a>  and we'll get back to you as quickly as possible. To make sure you receive our response, be sure to add us to your contact list.</p>
                            
                            <p>&nbsp;  </p> 
                            <p>&nbsp;  </p> 
                            
                        </div>
                    </div>
                    <!--  Art Movements -->
                 </div>
            </div>
            <!-- right panel -->
            
        </div>
</div>