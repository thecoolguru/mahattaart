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
    	
        <div class="pagination" style="margin:0px;">
        	<span> <a href="<?=base_url()?>frontend/index">HOME</a> > <span> Artists</span> </span>
        </div>
        
        <!-- art style -->
        <div class="art-style">
        	
            <!-- aside -->
            <aside class="left-panel-page">
            	<p>International</p>
            	<div class="list">
                	<ul>
					<?php
                        foreach($sub_val as $values){
                            ?>
                    	<li>
                                <a href="<?php print base_url(); ?>search/dosearch/1/32/<?php echo $values->keyword;?>/all"><?php print ucwords($values->title); ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

              

            </aside>
            <!-- aside -->
            
            <!-- right panel -->
           <div class="right-panel-page" style="width:86%; margin-top:0px;">	
           
             
           
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
	font-weight: normal;
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
           
         <span style="margin-left:40%"><?php   echo $this->pagination->create_links(); ?></span><br> 
                
                       <?php 
           //$sub_val=$this->frontend_model->get_header_images(3);
		    foreach($sub_val as $values){
         ?>
           	   
				      <div class="art-inner1 col-lg-6 col-md-12 col-sm-12">
            
                <h2><?=$values->title?></h2>
                
                <div class="row">
				
<a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all" ><img src="<?php print base_url();?><?=$values->image?>" style="float: left; border: none; box-shadow: 2px 2px 5px <?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all" class="col-md-4 col-lg-6 col-sm-6"></a>

<a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all"><img src="<?php print base_url();?><?=$values->image2?>" style=" margin-bottom:10px; padding-left:0;<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all" class="col-md-2 col-lg-3 col-sm-3"></a>



<a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all"><img src="<?php print base_url();?><?=$values->image3;?>" style=" margin-bottom:10px ;padding-left:0;<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all" class="col-md-2 col-lg-3 col-sm-3"></a>

<a href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all"><img src="<?php print base_url();?><?=$values->image4;?>" style=" margin-bottom:10px; padding-left:0;<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all" class="col-md-2 col-lg-3 col-sm-3"></a>

<a style="position:relative;"href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all"><img src="<?php print base_url();?><?=$values->image5;?>" style=" margin-bottom:10px; padding-left:0; <?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all" class="col-md-2 col-lg-3 col-sm-3"></a>


<div style="display: inline-block; width: 100%; height: 0px; overflow: hidden; visibility: hidden;">
&nbsp;
</div>


<div style="position:absolute;margin-left: 283px; text-align:center;"> 
<a style="position:absolute; padding:5px 3px; background: rgba(0, 0, 0, .5); color:<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?> FFF;bottom:8px; width:62px; font-size:14px; color:#FFF;" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$values->keyword?>/all"> + more </a> </div> 

</div>
                </div>
				<?php }?>
				
		<!--div--->		   
		               
                    
                </div>
               <span style="margin-left:50%"><?php   echo $this->pagination->create_links(); ?></span><br>      
                
          </div>
            <!-- right panel -->
            
        </div>
        <!-- art style -->
        
    </div>