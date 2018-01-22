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
    	
        <!-- about content -->
        <div class="art-style col-md-12">
            <div class="pagination">
                <span> <a href="<?=base_url()?>frontend/index">HOME</a> > <span> ABOUT MAHATTA  ART</span> </span>
            </div>
        </div>
       <div class="aboute abuth1 col-md-12">
       
      <h1>History </h1>  
       
        <p class="width02">Mahatta Art is about history, Mehta's family and their lifelong connection to photography and art. Mahatta is into the profession of photography since 1915, when Late Sh. Ram Chand Mehta along with his brothers co-founded Mahatta & Co. (a photography studio). </p>
        
        <p class="width02">

In 2002, Mahatta evolved in to the digital photography by venturing in to the online image licensing business, catering to the image needs of Advertising agencies, Corporates, Marketing & Media professionals, Newspaper & Publications, etc . After the success and nearly 14 years of experience in the image stock industry Mahatta's has introduced Mahatta Art one of the finest art gallery in India in the year 2014. </p>


        </div>

         <div class="aboute para03 col-md-12">
        		<h1>Who are we? </h1>
            <div class="row">
            <div class="col-md-6 about2">
          
<p>Mahatta Art an online art gallery is the latest initiative of Mahatta Group. It is cofounded by two Mehta's brother Hemant Mehta (COO) and Dushyant Mehta (CEO).</p>
<p>
We are a print on demand business model with more than 5.5 Lakh Images including Photography, Paintings, Poster & Illustrations from world renowned Collections and Artists. The content ranges from Abstracts to Nature photography, Legendary to Amateur artists, Heritage to Modern Indian art, Modern to Contemporary art, Humorous quotes to Serious & Hollywood Vintage posters and so on. </p>

<p>We exist to give you an easy access to incredible art images. Because when you find Art you connect, you get inspired more.</p>


</div>
             <div class="col-md-6"> <img src="<?php print base_url();?>assets/img/about-img.jpg" border="0" class="width02 img-responsive" /></div>
            </div>
             
           
        </div>
        <div class="aboute para02 col-md-12">
        	<h1>Our Mission</h1>
            <div class="row">
            <div class="col-md-3 col-sm-6 about-img">
            
            	<img src="<?php print base_url();?>assets/img/our-miss.jpg" width="297" height="169" border="0" class="width01 img-responsive">
                
         

</div>
             <div class="col-md-9 col-sm-6 about2"> 
                
<p>We work with passion to bring you the world's largest art collection. We bring art that inspire you, your décor style every day. Quality reproductions and 100% customer satisfaction guarantee is our top priority.  </p>

<p>
All of our images are printed on the finest archival quality surface suitable for any environment. With our great selection of print surface, frame, & mount we make it easy to custom-frame your print or for you to frame it yourself. </p>

<p>
We empower artists to make use of our platform and processes to sell their artwork across the world.

</p>





             
             </div>
            </div>
             
           
        </div>
        <div class="para03 para05 col-md-12">
        	<h1>Our Vision</h1>
            <div class="row">
            
            <div class="col-md-9 col-sm-7 about-img about2">
          
<p>To aim to bring together the worlds art contributors and buyers at a same platform to inspire and get inspired.</p>



</div>
             <div class="col-md-3 col-sm-5"> <img style="float:right;" src="<?php print base_url();?>assets/img/our-viss.jpg" width="295" height="170" border="0" class="width01 img-responsive"> </div>
            </div>
             
           
        </div>
        <div class="para02 col-md-12">
        	<h1 class="blue">Contact Us</h1>
        	<article>
            	<img src="<?php print base_url();?>assets/img/gra-1.jpg" width="302" height="165" border="0" class="width01 img-responsive">
            	<p class="head-off">
                    <span class="block"><strong>Head office:</strong></span>
                    <span class="block">Building No.17, Street No. 8, Sarvapriya Vihar, New Delhi-110016, India</span>
                    <span class="block">Phone: +011-41828972  </span>
                    <span class="block"> Email: <a href="mailto:info@mahattaart.com">info@mahattaart.com</a> Website: <a href="<?=base_url()?>"> www.mahattaart.com </a> </span>
 				</p>
            </article>
        </div>
        <!-- about content -->
        
    </div></div>
    
    <style>
	.aboute p {
   
    font-size: 13px;
  
    text-align: justify;
    color: #868686;
	margin:10px 0px;
}


.abuth1 h1 { font-family: 'BebasNeueRegular',Arial,Helvetica,sans-serif;
    font-size: 27px;
    font-weight: normal;
    color:#FFF;
    margin: 5px 0 5px 0;
	background-color:#999;
	padding: 4px;
   
	}






.about2{font-size: 13px;
   
    text-align: justify;
    color: #868686;}
	
	.para03 h1 , .para02 h1{font-family: 'BebasNeueRegular',Arial,Helvetica,sans-serif;font-size: 27px;
    font-weight: normal;
   
    margin: 5px 0 5px 0;}
	
	.para05 h1{ont-family: 'BebasNeueRegular',Arial,Helvetica,sans-serif;font-size: 27px; background-color:#FC3;
    font-weight: normal;
    color: #000;
    margin: 5px 0 5px 0;    padding: 4px;text-transform:lowercase;}

</style>