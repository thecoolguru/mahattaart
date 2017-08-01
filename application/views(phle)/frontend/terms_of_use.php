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
            <span> <a href="<?=base_url()?>frontend/index"> HOME </a> > Terms & Policies > <span> Terms of Use </span> </span>
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
                <?php } ?>
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
                            <p>Terms of Use</p>
                            <img src="<?php print base_url();?>assets/img/terms.jpg" width="100%" border="0" />
                        </div>
                    </div>
                    
                    <div class="career-page">
                        
                        <p>Please read these terms of use carefully. By accessing or using any mahattaart website or mobile application (or any content,
                         product, service, or feature available through the website or mobile application, including the embedded viewer) (collectively, the "website"),
                          you agree to abide by and be bound by the terms described herein and by all terms, policies and guidelines incorporated by reference, 
                          as well as any additional terms and restrictions presented in relation to specific content or a specific product, 
                          service or feature (collectively, the "website terms").
                         If you do not agree to all of these terms, do not use the site.</p>
                        
                        <p>
                        	MahattaArt may revise and update these terms of use at anytime and without notice. 
                            You are cautioned to review the terms of use posted on the web site periodically.
                             Your continued access or use of this web site after any such changes are posted will constitute your acceptance of these changes.
                              However it is hereby clarified that the website terms written at the time of purchasing/downloading/accessing any content 
                              from the website shall be applicable for the said content and the said purchaser is not required to be complied with 
                              any amendements in the website terms happening after purchase/access/download and will be continued to be governed by
                               the website terms applicable at the time of download/access/purchase.
                        </p>
                        
                        <h2 class="margin-top">Ownership of the website and its Contents</h2>
                        <p>The Website is owned by MahattaArt. Unless otherwise indicated, all of the content featured 
                        or displayed on the Website, including, but not limited to, text,
                         graphics, data, photographic images, moving images, sound,
                          illustrations, software and the selection and arrangement 
                          thereof ("MahattaArt Content"), is owned by MahattaArt
                           its licensors or its third-party image partners. 
                           All elements of the Website, including the MahattaArt Content, 
                           are protected by copyright, trade dress, moral rights,
                            trademark and other laws relating to the protection of intellectual property.</p>
                        
                        <h2 class="margin-top">Use of the Site</h2>
                        <p>The Website and the MahattaArt Content are intended for customers of MahattaArt. You may not use the Website or the MahattaArt Content for any purpose not related to your business with MahattaArt. You are specifically prohibited from: (a) downloading, copying or re-transmitting any or all of the Website or the MahattaArt Content without, or in violation of, a written licence or agreement with MahattaArt; (b) using any data mining, robots or similar data gathering or extraction methods; (c) manipulating or otherwise displaying the Website or the MahattaArt Content by using framing or similar navigational technology; (d) registering, subscribing, unsubscribing or attempting to register, subscribe or unsubscribe any party for any MahattaArt product or service if you are not expressly authorised by such party to do so; (e) reverse engineering, altering or modifying any part of the Website or the MahattaArt Content; (f) circumventing, disabling or otherwise interfering with security-related features of the MahattaArt or any system resources, services or networks connected to or accessible through the MahattaArt; (g) selling, licensing, leasing or in any way commercialising the Website or the MahattaArt Content without specific written authorisation from MahattaArt; and (h) using the Website or the MahattaArt Content other than for its intended purpose. Such unauthorised use may also violate applicable laws including without limitation copyright and trademark laws, the laws of privacy and publicity, and applicable communications regulations and statutes. You represent and warrant that you will comply with all applicable laws and regulations, including, without limitation, those relating to the Internet, data, e-mail, privacy, and the transmission of technical data exported from the India or the country in which you reside.</p>
                        
                        <h2 class="margin-top">Copyright Infringement Policy</h2>
                        <p>MahattaArt has adopted a policy of terminating, in appropriate circumstances and at MahattaArt's sole discretion, account holders who infringe the intellectual property rights of MahattaArt or any third party.</p>
                        
                        
                        <h2 class="margin-top">Indemnification</h2>
                        <p>You agree to defend, indemnify and hold harmless MahattaArt, its subsidiaries, affiliates, licensers, employees, agents, third party information providers and independent contractors against any claims, damages, costs, liabilities and expenses (including, but not limited to, reasonable attorneys' fees) arising out of or related to any User Content that you post, store or otherwise transmit on or through the Website, your conduct, your use or inability to use the Website, your breach or alleged breach of the Website Terms or of any representation or warranty contained herein, your unauthorised use of the MahattaArt Content, or your violation of any rights of another.</p>
                        
                        <h2 class="margin-top">Dislaimer</h2>
                        <p>
                        	This website, including without limitation its content, are provided "as is" and mahattaart and its its directors, employees, content providers, agents and affiliates exclude to the fullest extent permitted by applicable law any warranty, express or implied, including, without limitation, any implied warranties of merchantability, satisfactory quality or fitness for a particular purpose mahattaart will not be liable for any damages of any kind arising from the use of the web site or the mahattaart content, or the unavailability of the same, including, but not limited to lost profits, and direct, indirect, incidental, punitive and consequential damages. The functions embodied on, or in the materials of this website are not warranted to be uninterrupted or without error. You,  not mahattaart, assume the entire cost of all necessary servicing, repair or correction due to your use of this website or the mahattaart content  we make no warranty that the site or the mahattaart content is free from infection by viruses or anything else that has contaminating or destructive properties.
                        </p>
                        
                        <p>
                        	MahattaArt uses reasonable efforts to ensure the accuracy, correctness and reliability of the mahattaart content, but we make no representations or warranties as to the mahattaart content's accuracy, correctness or reliability.mahattaart has obtained all rights to license pertaining to each image from its source and the rights are expressed in the eula and on the website. MahattaArt will ensure to safeguard the interest of each of its clients as long as it comes under the perview of the eula and also within the contracts as signed with its partners. Eg. : if the image in questions is not model release and the client  uses it for a commercial purpose then mahattaart is not responsible.
                        </p>
                        
                        <p>
                        	MahattaArt makes no claim or representation regarding, and accepts no responsibility for, directly or indirectly, the quality, content, nature or reliability of third-party websites accessible by hyperlink from the website, or websites linking to the website. Such sites are not under the control of mahattaart and mahattaart is not responsible for the contents of any linked site or any link contained in a linked site, or any review, changes or updates to such sites. MahattaArt provides these links to you only as a convenience, and the inclusion of any link does not imply affiliation, endorsement or adoption by mahattaart of any site or any information contained therein. When you leave the website, you should be aware that our terms and policies no longer govern. You should review the applicable terms and policies, including privacy and data gathering practices, of any site to which you navigate from the website.
                        </p>
                        
                         <h2 class="margin-top">Limitation of Liability</h2>
                         <p>In no event shall mahattaart, its directors, members, employees or agents be liable for any direct, special, indirect or consequential damages, or any other damages of any kind, including but not limited to loss of use, loss of profits or loss of data, whether in an action in contract, tort (including but not limited to negligence) or otherwise, arising out of or in any way connected with the use of the website, the services, the mahattaart content or the materials contained in or accessed through the site, including without limitation any damages caused by or resulting from reliance by user on any information obtained from mahattaart, or that result from mistakes, omissions, interruptions, deletion of files or email, errors, defects, viruses, delays in operation or transmission or any failure of performance, whether or not resulting from acts of god, communications failure, theft, destruction or unauthorised access to mahattaarts' records, programmes or services. In no event shall the aggregate liability of mahattaart, whether in contract, warranty, tort (including negligence, whether active, passive or imputed), product liability, strict liability or other theory, arising out of or relating to the use of the website exceed any compensation you pay, if any, to mahattaart for access to or use of the site.</p>
                        
                        
                        <h2 class="margin-top">Governing Law and Venue</h2>
                        <p>
                        	This Agreement shall be interpreted, construed and governed by the laws of India without reference to its laws relating to conflicts of law and not including the provisions of the 1980 United Nations Convention on Contracts for the International Sale of Goods. Venue for all disputes arising under this Agreement shall lie exclusively in the jurisdiction of the courts of New Delhi and each party agrees not to contest the personal jurisdiction of these courts. Notwithstanding the foregoing, however,(MahattaArt shall have the right to commence and prosecute any legal or equitable action or proceeding before any non-indian court of competent jurisdiction to obtain injunctive or other relief in the event that, in the opinion of MahattaArt, such action is necessary or desirable. action of MahattaArt,other than an express written waiver or amendment, may be construed as a waiver or amendment of any of these Terms and Conditions of Use or Privacy Policy. Should any clause of these Terms and Conditions of Use or Privacy Policy be found unenforceable, wherever possible this will not affect any other clause and each will remain in full force and effect We reserve the right to change these Terms and Conditions of Use, the Privacy Policy, prices, information and available contractual license terms featured on this website without notice.
                        </p>
                        
                        <h2 class="margin-top">Termination</h2>
                        <p>Notwithstanding any of these Website Terms, MahattaArt reserves the right, without notice and in its sole discretion, to terminate your account and/or to block your use of the Website.</p>
                        
                        <h2 class="margin-top">Miscellaneous Provisions </h2>
                        <p>Any waiver of any provision of the Website Terms will be effective only if in writing and signed by MahattaArt. If any clause in these Website Terms is found to be unenforceable, wherever possible this will not affect any other clause and each will remain in full force and effect. Any rights not expressly granted herein are reserved.</p>
                        
                    </div>
                </div>
                <!--  Art Movements -->
 
            </div>
            <!-- right panel -->
            
        </div>