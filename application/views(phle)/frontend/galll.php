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

<div class="main-container">


<!-- art style -->
<div class="art-style">




<!-- aside -->
<aside style="width:13%">
<div class="pagination"> <span> <a href="#">HOME</a> > Walls-n-Art > <span> FAQ's</span> </span> </div>

  <p>Let Us Help</p>
  <div class="list">
    <ul>
      <li ><a href="<?=base_url()?>frontend/contact">Contact us</a></li>
      <li class="active-cat-link" style="color:#339900; font-size:16px;">FAQ's</li>
      <li><a href="#">Ordering</a></li>
      <li><a href="#">Shipping & Delivery</a></li>
    </ul>
  </div>
  <p>My Account</p>
  <div class="list">
    <ul>
      <li><a href="<?=base_url()?>frontend/profile">My Profile</a></li>
      <li><a href="#">Track My Order</a></li>
      <li><a href="#">Order History</a></li>
    </ul>
  </div>
  <p>Walls-n-Art</p>
  <div class="list">
    <ul>
      <li><a href="<?=base_url()?>frontend/about">The Company</a></li>
      <li><a href="<?=base_url()?>frontend/media_center">Media Center</a></li>
      <li><a href="<?=base_url()?>frontend/career">Careers</a></li>
      <li ><a href="<?=base_url()?>frontend/Partner">Partners</a></li>
    </ul>
  </div>
</aside>
<!-- aside --> 

<!-- right panel -->
<div class="right-panel">

<!--  Art Movements 
<div class="art-movements">
  <div class="art-inner"> <img src="<?php print base_url();?>assets/img/faq.jpg" width="710" height="210" border="0"> </div>
</div>
-->


     <div class="career-page">
     <!--<h2>Shipping & Delivery</h2>-->
     
<h3> Gallery </h3>



<style>.main-title{cursor: pointer;
    margin-bottom: 2px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #000;
    font-size: 16px;
    margin: 9px 0px 4px 0px;    font-family: "Times New Roman",serif;}
    
.pdc {
    color: #F44349 !important;
    font-family: "Helvetica Neue","HelveticaNeue-Light","Helvetica Neue Light",Helvetica,Arial,"Lucida Grande",sans-serif;
    font-size: 12px;
	padding:0px 15px;
}
.products a{ font-size:12px; text-decoration:underline !important; color:#999;}
.producttype a{font-size:12px;color:#999;}
.lineth{text-decoration: line-through;}
    
    </style>

<div class="gallery-img">
                	<ul>
                    	<li>
                        	<a href="#">
                            	<div class="wrap">
                                	<div class="wrap-inner"><img src="<?php print base_url();?>assets/img/art-1.jpg"></div>
                                    
                                    
                                    <div class="main-title">
                                    Weighlifting Pictogram With Black Wordings 
                                    </div>
                                    
         <div class="products"> <a href="#"> Pierre Brissaud </a>  </div> 
          <div class="producttype"> <a href="#"> Regular Giclee Print </a> </div> 
                       
 <div> <span> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
 
 
  <div>
 <a style=" color:#000; font-size:20px;" href="#"> <i class="glyphicon glyphicon-shopping-cart"> </i> </a>
  <a style=" color:#999; font-size:20px; padding-left:38%" href="#"> <i class="glyphicon glyphicon-remove"> </i>  </a>
  </div>
		
 </div>
 
     
                                   
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                        
                        <li>
                        	<a href="#">
                            	<div class="wrap">
                                	<div class="wrap-inner"><img src="<?php print base_url();?>assets/img/art-1.jpg"></div>
                                    
                                    
                                    <div class="main-title">
                                    Weighlifting Pictogram With Black Wordings 
                                    </div>
                                    
         <div class="products"> <a href="#"> Pierre Brissaud </a>  </div> 
          <div class="producttype"> <a href="#"> Limited Edition </a> </div> 
                       
 <div> <span> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
<div>
 <a style=" color:#000; font-size:20px;" href="#"> <i class="glyphicon glyphicon-shopping-cart"> </i> </a>
  <a style=" color:#999; font-size:20px; padding-left:38%" href="#"> <i class="glyphicon glyphicon-remove"> </i>  </a>
  </div>
 </div>
                                   
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                        
                        <li>
                        	<a href="#">
                            	<div class="wrap">
                                	<div class="wrap-inner"><img src="<?php print base_url();?>assets/img/art-1.jpg"></div>
                                    
                                    
                                    <div class="main-title">
                                    Weighlifting Pictogram With Black Wordings 
                                    </div>
                                    
         <div class="products"> <a href="#"> Pierre Brissaud </a>  </div> 
          <div class="producttype"> <a href="#"> Limited Edition </a> </div> 
                       
 <div> <span> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
 <div>
 <a style=" color:#000; font-size:20px;" href="#"> <i class="glyphicon glyphicon-shopping-cart"> </i> </a>
  <a style=" color:#999; font-size:20px; padding-left:38%" href="#"> <i class="glyphicon glyphicon-remove"> </i>  </a>
  </div>
 </div>
                                   
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                        
                        <li>
                        	<a href="#">
                            	<div class="wrap">
                                	<div class="wrap-inner"><img src="<?php print base_url();?>assets/img/art-1.jpg"></div>
                                    
                                    
                                    <div class="main-title">
                                    Weighlifting Pictogram With Black Wordings 
                                    </div>
                                    
         <div class="products"> <a href="#"> Pierre Brissaud </a>  </div> 
          <div class="producttype"> <a href="#"> Limited Edition </a> </div> 
                       
 <div> <span> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
<div>
 <a style=" color:#000; font-size:20px;" href="#"> <i class="glyphicon glyphicon-shopping-cart"> </i> </a>
  <a style=" color:#999; font-size:20px; padding-left:38%" href="#"> <i class="glyphicon glyphicon-remove"> </i>  </a>
  </div>
 </div>
                                   
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                        
                        <li>
                        	<a href="#">
                            	<div class="wrap">
                                	<div class="wrap-inner"><img src="<?php print base_url();?>assets/img/art-1.jpg"></div>
                                    
                                    
                                    <div class="main-title">
                                    Weighlifting Pictogram With Black Wordings 
                                    </div>
                                    
         <div class="products"> <a href="#"> Pierre Brissaud </a>  </div> 
          <div class="producttype"> <a href="#"> Pierre Brissaud </a> </div> 
                       
 <div> <span> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
 
 <div>
 <a style=" color:#000; font-size:20px;" href="#"> <i class="glyphicon glyphicon-shopping-cart"> </i> </a>
  <a style=" color:#999; font-size:20px; padding-left:38%" href="#"> <i class="glyphicon glyphicon-remove"> </i>  </a>
  </div>
 </div>
                                   
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                        
                        <li>
                        	<a href="#">
                            	<div class="wrap">
                                	<div class="wrap-inner"><img src="<?php print base_url();?>assets/img/art-1.jpg"></div>
                                    
                                    
                                    <div class="main-title">
                                    Weighlifting Pictogram With Black Wordings 
                                    </div>
                                    
         <div class="products"> <a href="#"> Pierre Brissaud </a>  </div> 
          <div class="producttype"> <a href="#"> Pierre Brissaud </a> </div> 
                       
 <div> <span> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
<div>
 <a style=" color:#000; font-size:20px;" href="#"> <i class="glyphicon glyphicon-shopping-cart"> </i> </a>
  <a style=" color:#999; font-size:20px; padding-left:38%" href="#"> <i class="glyphicon glyphicon-remove"> </i>  </a>
  </div>
 </div>
                                   
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                        
                        <li>
                        	<a href="#">
                            	<div class="wrap">
                                	<div class="wrap-inner"><img src="<?php print base_url();?>assets/img/art-1.jpg"></div>
                                    
                                    
                                    <div class="main-title">
                                    Weighlifting Pictogram With Black Wordings 
                                    </div>
                                    
         <div class="products"> <a href="#"> Pierre Brissaud </a>  </div> 
          <div class="producttype"> <a href="#"> Pierre Brissaud </a> </div> 
                       
 <div> <span> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
 <div>
 <a style=" color:#000; font-size:20px;" href="#"> <i class="glyphicon glyphicon-shopping-cart"> </i> </a>
  <a style=" color:#999; font-size:20px; padding-left:38%" href="#"> <i class="glyphicon glyphicon-remove"> </i>  </a>
  </div>
 </div>
                                   
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                        
                        <li>
                        	<a href="#">
                            	<div class="wrap">
                                	<div class="wrap-inner"><img src="<?php print base_url();?>assets/img/art-1.jpg"></div>
                                    
                                    
                                    <div class="main-title">
                                    Weighlifting Pictogram With Black Wordings 
                                    </div>
                                    
         <div class="products"> <a href="#"> Pierre Brissaud </a>  </div> 
          <div class="producttype"> <a href="#"> Pierre Brissaud </a> </div> 
                       
 <div> <span> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
 <div>
 <a style=" color:#000; font-size:20px;" href="#"> <i class="glyphicon glyphicon-shopping-cart"> </i> </a>
  <a style=" color:#999; font-size:20px; padding-left:38%" href="#"> <i class="glyphicon glyphicon-remove"> </i>  </a>
  </div>
 </div>
                                   
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                        
                        <li>
                        	<a href="#">
                            	<div class="wrap">
                                	<div class="wrap-inner"><img src="<?php print base_url();?>assets/img/art-1.jpg"></div>
                                    
                                    
                                    <div class="main-title">
                                    Weighlifting Pictogram With Black Wordings 
                                    </div>
                                    
         <div class="products"> <a href="#"> Pierre Brissaud </a>  </div> 
          <div class="producttype"> <a href="#"> Pierre Brissaud </a> </div> 
                       
 <div> <span> From </span> <span class="lineth"> $95.00 </span>  
 <span class="pdc"> $57.00 </span> 
<div>
 <a style=" color:#000; font-size:20px;" href="#"> <i class="glyphicon glyphicon-shopping-cart"> </i> </a>
  <a style=" color:#999; font-size:20px; padding-left:38%" href="#"> <i class="glyphicon glyphicon-remove"> </i>  </a>
  </div>
 </div>
                                   
                                    
                                    
                              
                                    
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>



     
    <p>&nbsp;</p> 


<p>&nbsp;</p>

</div>


</div>
<!--  Art Movements -->

</div>
<!-- right panel -->

</div>

<style>

.career-page h3 {  font-family: 'BebasNeueRegular',Arial,Helvetica,sans-serif;   font-size: 27px;
    font-weight: normal;
    color: #000;
    margin: 5px 0 5px 0; }

.career-page h4 {  font-size: 14px;
    font-weight: bold;
    color: #000;
	margin: 5px 0 5px 0;
    }


.faqquestion p { padding:0px 0px 2px 0px !important;}
.faqquestion p strong{ /*font-family: "Times New Roman",Times,serif;*/    font-size: 14px;
    font-weight: bold;
    color: #000;
	margin: 0px 0 18px 0;
   }
	
.faq-content p {  padding:0px 0px 18px 0px !important;/*font-family: "Times New Roman",Times,serif;*/}

.career-page ul { margin:4px 13px;}

ul.a {list-style-position:inside;}


</style>