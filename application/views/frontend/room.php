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
<div  class="main-container container">
    	
         <div class="pagination" style="margin:0px;">
        	<span> <a href="<?=base_url()?>index.php/frontend/index">HOME</a> > <span> Room</span> </span>
        </div>
        
        <!-- art style -->
        <div class="art-style" >
        	
            <!-- aside -->
             <aside class="left-panel-page">
            	<p>Popular Rooms</p>
            	<div class="list">
				
                	<ul>
					
					
                    	 <?php
  
		                 foreach($sub_val as $values){
						   $spit= split('/',$values->keyword);
					 //echo $spit[1];	   
                                            //print_r($spit);
                                          if($spit[1]=='frontend'){
                                              $url=$values->keyword;
                                          }else{
                                              $url="index.php/search/dosearch/1/32/".$values->keyword."/all";
                                          }
						    
                            ?>
				
						<li><a href="<?php print base_url(); ?><?=$url;?>"><?php echo $values->title;?></a></li>
						<?php }?>
                       
                        
                        
                    </ul>
                </div>
                
                
                
              
                
                
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
        
            
            
            
            
              <div class="right-panel-page">	
              
              
              
              
              
              
              
              
                        
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
           
              <!--  Art Movements -->
                <div class="art-movements">
                
                <span style="margin-left:40%"><?php   echo $this->pagination->create_links(); ?></span><br>
                <div class="art-inner" style="margin:0px; padding:0px;">
                
                <?php
                        
					foreach($sub_val as $values){
					$spit= split('/',$values->keyword);
					if($spit[1]=='frontend'){
					$url=$values->keyword;
					}else{
					$url="index.php/search/dosearch/1/64/".$values->keyword."/all";
					}
                            ?>
				
				<div class="our-room col-md-6 col-sm-6">
                
                <h2 style="margin:0px;"><?=ucwords($values->title);?></h2>
                
                <div class="ourr-room" style="display: inline-block; width: 100%; padding-top: 10px; text-align: justify; position:relative;">
                
<a href="<?php print base_url(); ?><?=$url?>" class="col-sm-4 col-md-4" style="padding-left:0; margin-bottom:5px"><img src="<?php print base_url(); ?><?=$values->image?>" class="img-responsive" /></a>

<a href="<?php print base_url(); ?><?=$url?>" class="col-sm-4 col-md-4" style="padding-left:0; margin-bottom:5px"><img src="<?php print base_url(); ?><?=$values->image2?>" class="img-responsive" /></a>


<a href="<?php print base_url(); ?><?=$url?>" class="col-sm-4 col-md-4" style="padding-left:0; margin-bottom:5px"><img src="<?php print base_url(); ?><?=$values->image3?>" class="img-responsive" /></a>


<div style="display: inline-block; width: 100%; height: 0px; overflow: hidden; visibility: hidden;">
&nbsp;
</div>
<div style=""> 
<a href="<?php print base_url(); ?><?=$url?>"> + more </a> </div> 

</div></div>

<?php }?>


<!--div--->

                </div>
                
                
                
                    
                    
                    
                </div>

                
                
            </div>
            <!-- right panel -->
            
                
        </div>
        <!-- art style -->
        <span style="margin-left:50%"><?php   echo $this->pagination->create_links(); ?></span><br>
    </div>
    
    <style>

@media (min-width: 768px) and (max-width: 991px) {
.ourr-room div > a {
  background: rgba(0, 0, 0, 0.5) none repeat scroll 0 0;
  color: #fff;
  font-size: 14px;
  padding: 5px 3px;
  position: absolute;
  width: 119px;
}
	.ourr-room > div {
	  left: 0;
	  position: absolute;
	  text-align: center;
	  bottom:5px
	}
}

@media (min-width: 992px) and (max-width: 1199px) {
	.ourr-room div > a {
  background: rgba(0, 0, 0, 0.5) none repeat scroll 0 0;
  color: #fff;
  font-size: 14px;
  padding: 5px 3px;
  position: absolute;
  width: 105px;
}
	.ourr-room > div {
	  left: 0;
	  position: absolute;
	  text-align: center;
	  bottom:5px;
	  right:-122px
	}
}



@media (min-width: 1200px){
	.ourr-room div > a {
  background: rgba(0, 0, 0, 0.5) none repeat scroll 0 0;
  color: #fff;
  font-size: 14px;
  padding: 5px 3px;
  position: absolute;
  width: 130px;
}
	.ourr-room > div {
	  left: 0;
	  position: absolute;
	  text-align: center;
	  bottom:5px;
	  right:-149px
	}
}


</style>