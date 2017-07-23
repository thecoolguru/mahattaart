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
            <span> <a href="#">HOME</a> > Terms & Policies > <span> Privacy Policy</span> </span>
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
                        <li><a href="#">Ordering</a></li>
                        <li><a href="#">Shipping & Delivery</a></li>
                    </ul>
                </div>
<?php if($this->session->userdata('userid')){ ?>
                <p>My Account</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/profile">My Profile</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Order History</a></li>
                    </ul>
                </div>
                <?php }?>
                <p>Mahatta-Art</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/about">The Company</a></li>
                       
                        <li><a href="<?=base_url()?>frontend/career">Careers</a></li>
                        <li ><a href="<?=base_url()?>frontend/Partner">Partners</a></li>
                    </ul>
                </div>
                
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel-page">
            	
                <!--  Art Movements -->
                	<div class="art-movements">
                        <div class="art-inner">
                            <p>Privacy & Policy</p>
                            <img src="<?php print base_url();?>assets/img/privacy.jpg" width="100%" border="0" />
                        </div>
                    </div>
                    
                    <div class="career-page">
                        
                        
                        <h2 class="margin-top">Personal Information</h2>
                        <p>Your privacy is important to us. To better protect your privacy we provide this notice explaining our online information practices and the choices you can make about the way your information is collected and used. This notice applies to all information collected or submitted on this website. We use the information you provide about yourself only for our use. We do not share this information with outside parties. How to contact us - Should you have other questions or concerns about these privacy policies, please contact us at info@mahattaart.com</p>
                        <p>Mahattaart collects certain personal information from users of this site. Guests are required to provide certain personal information in order to access images, and authorized users must provide certain contact and account information in order to access and download images. Mahattaart uses this information for internal purposes (to process your order and any invoices, to maintain or update your Mahattaart account, or to send you updates about special offers, new services, special promotions, and noteworthy news and events). Mahattaartdoes not sell or rent information about its customers to third parties.</p>
                        <p>Your profile information (such as age and gender) in the registration form is used by Mahattaart to create personalized content, services, and advertising on the Mahattaart web site. Mahattaart may also profile your web site activity in order to accurately track your account and provide you with Mahattaart products and services that correspond to your interests. Mahattaart may also compile data in aggregate form so that we may better understand the users that are visiting our site. For example, we may produce reports on the most popular search terms by collecting general search term data based on individual searches. Aggregate data is anonymous and does not contain any personal information that identifies a user.</p>
                        
                        
                        <h2 class="margin-top">Personal Information</h2>
                        <p>Mahattaart offers its members the choice to not receive e-mails or updates about special benefits, promotions, or offers from Mahattaart. If you no longer wish to receive these updates, or you wish to unsubscribe from Mahattaart membership, please complete our Feedback form and let us know in the comments section that you would like to be removed from the mailing list.</p>
                        
                        
                        <h2 class="margin-top">Security</h2>
                        <p>Mahattaart has a number of operational functions in place to protect the confidentiality of personal information. However, perfect security on the Internet does not exist, and Mahattaart does not warrant that its site is impenetrable or invulnerable to hackers.</p>
                        
                        <h2 class="margin-top">Cookies</h2>
                        <p>
                        	www.mahattaart.com uses cookies to track user preferences and in order to achieve a correspondingly optimal website design. Cookies are small files which are deposited temporarily (for 2 years) on your hard drive. This allows easier navigation and a high degree of user-friendliness on a website. Cookies can be used to determine whether a connection has already been made from your computer to our site. These cookies allow your computer to be identified and establish a reference link to the individual user. Most browsers accept cookies automatically. Furthermore, you can delete the www.mahattaart.com cookie from your system folder at any time. If you choose not to accept cookies, it can limit the functions available to you on our site.
                        </p>
                        
                       
                        
                         <h2 class="margin-top">E-mail</h2>
                         <p>Mahattaart does not rent or sell e-mail lists. Mahattaart may send you e-mail to notify you about your recent order; this will be sent to the e-mail address you provide to Mahattaart. If you have questions about Mahattaart's privacy policy or concerns about personal information you have supplied to Mahattaart, please contact us at <a href="mailto:info@mahattaart.com">info@mahattaart.com </a></p>
						 
						 <p></p>
                        
                        
                        
                        
                    </div>
                </div>
                <!--  Art Movements -->
 
            </div>
            <!-- right panel -->
            
        </div>