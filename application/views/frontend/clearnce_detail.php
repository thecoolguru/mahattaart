<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Clearnce Details</title>
</head>

<body>
<style>
.frame-step-header-container {
  background-color: #ececec;
  width: 100%;
  padding: 10px 0;
}

.frame-step-header-text {
  color: #6abb4c;
  float: left;
  font-family: "BebasNeueRegular",Helvetica,Arial,sans-serif;
  font-size: 42px;
  letter-spacing: -0.5px;
  position: relative;
}
.frame-step-button-wrapper {
  float: right;
  padding: 6px 0;
  position: relative;
}

.frame-step-continue-shopping-button {
  background-color: #888;
  color: #fff;
  cursor: pointer;
  float: left;
  font-size: 15px;
  font-weight: bold;
  margin-right: 14px;
  min-width: 100px;
  padding: 13px 16px;
  position: relative;
  text-align: center;
}
.frame-step-proceed-to-cart-button {
  background-color: #ed9134;
  color: #fff;
  cursor: pointer;
  float: right;

  font-size: 15px;
  font-weight: bold;
  min-width: 180px;
  padding: 12px;
  position: relative;
  text-align: center;
}
.container.frame-step-header-wrapper {
  border: medium none;
  margin: 0 auto;
}
</style>
<div class="container">
<div class="frame-step-header-container" style="display:none">
    <div class="container frame-step-header-wrapper">
        <div class="frame-step-header-text">
	       
        </div>
        <div class="frame-step-button-wrapper">
            <div class="frame-step-continue-shopping-button">
                <a style="color:white" href="<?=base_url().''.$continue_shopping_redirect?>">CONTINUE SHOPPING</a>
            </div>
            <div class="frame-step-proceed-to-cart-button">
              <a style="color:white" href="<?=base_url().'cart/cart_view'?>">  PROCEED TO CART</a>
            </div>
        </div>
    </div>
</div>
	<div class="row" style="margin-top:20px; margin-bottom:20px">
    	<div class="col-md-6">
		<style>
            /*container3D*/
		
            .container3D {
            min-height: 440px;
            position: relative;
            }
            
            #cube {
            width: 100%;
            height: 100%;
            position: absolute;
            -webkit-transform-style: preserve-3d;
            -moz-transform-style: preserve-3d;
            -o-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-transform: translateZ( -100px );
            -moz-transform: translateZ( -100px );
            -o-transform: translateZ( -100px );
            transform: translateZ( -100px );
            }
            #cube .front {
            -webkit-transform: translateZ( 100px );
            -moz-transform: translateZ( 100px );
            -o-transform: translateZ( 100px );
            transform: translateZ( 100px );
            }
            #cube figure {
            display: block;
            position: absolute;
            }
            
            figure {
            margin: 0;
            }
            
        #cube .right {
        -webkit-transform: rotateY( 90deg ) translateZ( 100px );
        -moz-transform: rotateY( 90deg ) translateZ( 100px );
        -o-transform: rotateY( 90deg ) translateZ( 100px );
        transform: skewY(45deg) translate(20px,-10px);
        width: 20px;
        height: 100%;
        right: 0px;
        top: 0;
        }
        
        #cube .right {
        background: #000;
        }
            
            #cube .bottom {
            -webkit-transform: rotateX( -90deg ) translateZ( 100px );
            -moz-transform: rotateX( -90deg ) translateZ( 100px );
            -o-transform: rotateX( -90deg ) translateZ( 100px );
            transform: skewX(45deg) translate(-11px,21px);
            height: 20px;
            width: 100%;
            bottom: 1px;
            }
            #cube .bottom {
            background: #ddd;
            }
            
				.mainhor {
					-moz-border-bottom-colors: none;
					-moz-border-left-colors: none;
					-moz-border-right-colors: none;
					-moz-border-top-colors: none;
					border-color: transparent;
					border-style: solid;
					border-width: 10px;
					padding: 8px;
					position:relative;
					z-index:1;
					display:inline-block;
				}
				img.wrap_img {
					z-index: -1;
					position: relative;
				}
				#uploader_popup_goofy_a {
					background: #fff;
					display: block;
					font-family: Arial;
					position: relative;
					right: 0;
					width: 300px;
					height: 400px;
					float: right;
					box-shadow: 0 2px 12px #888;
				}    
                .frame-it-pricing {
                    padding: 10px;
                }
                .frame-it-content strong {
                    margin: 5px 0;
                    display: block;
                    font-family: inherit;
                }
                .btn.social_icon {
                    border-radius: 0;
                    box-shadow: none;
                    padding: 2px 0;
                    position: relative;
                    min-width: 110px;
                    text-align:center;
                    border:none;
					line-height:2;
                }
                .frame-it-button{ text-align:center; margin:40px 0}
                .frame-it-button button{color:#FFF;}
				
            </style>
			<?php
			 $frame_color=$prod_details[0]->frame_color;
			?>
			
			<?php if($frame_color!='Canvas'){?>
            <div class="wrap_box mainhor" style="border-image: url('<?=base_url()?>images/uploaded_pdf/frames/horizontal/Absolute Black.jpg') 30 30 30 30 round round;background:url('<?=base_url()?>images/uploaded_pdf/mount/DR 2091.jpg') no-repeat scroll 0 0 / cover;">
                <a href="#" style="box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.8) inset;display: inline-block;/*! z-index: 12; ">
                    <img src="http://static.mahattaart.com/398/<?=$prod_details[0]->image_id?>.JPG" class="img-responsive wrap_img" /> 
                </a>
            </div>
			<?php }else if($frame_color=='Canvas'){?>
	
            <section class="container3D">
                <div id="cube" class="">
                    <figure class="front">
                        <img  src="http://static.mahattaart.com/398/<?=$prod_details[0]->image_id?>.JPG" class="img-responsive">
                        <figure class="right"></figure>
                        <figure class="bottom"></figure>
                    </figure>
                </div>
            </section>
			<?php } ?>

        </div>
  
        <div class="col-md-6">
			
			<?php // print_r($prod_details); 
			//$paper_surface=str_replace('%20',' ',$avl_glass);
			$glass=$prod_details[0]->glass;
			if($glass=='yes'){
			$glass_name="Regular";
			
			}else if($glass=='no'){
			$glass_name="Normal";
			}
			 if($prod_details[0]->frame_color!=Canvas){
			 $frame_name=$prod_details[0]->frame_color;
			 
			 }else{
			 $frame_name="Canvas Gallary Wrap";
			 
			 
			 }
			?>
            <div id="uploader_popup_goofy_a">
                <div class="frame-it-pricing">
                    <div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong> Paper Surface: </strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <div id="surface"> <?=$prod_details[0]->surface?></div>
                            </div>
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Frame Type</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
							    
                                <div id="frame_name"><?=$frame_name?></div>
								
							
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Frame Size</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <div id="frame_size"> 1 </div>"
                            </div>
                        </div>
                    </div>
					<input type="hidden" id='total_price' value="<?=$prod_details[0]->s_p?>">
					<input type="hidden" id='userid' value="<?=$this->session->userdata('userid')?>">
					<input type="hidden" id='image_id' value="<?php print_r($image_id);?>">
					<input type="hidden" id='filename' value="<?php echo $prod_details[0]->image_id;?>">
					<input type="hidden" id='final_frame_size' value="<?php echo $prod_details[0]->width.'X'.$prod_details[0]->height ?>">
					
					
					<?php if($prod_details[0]->mount!=''){?>
					<div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Mount</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <div id="mount_name"> <?=$prod_details[0]->mount?> </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Mount Size</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <div id="mount_size"> <?=$prod_details[0]->mount_size?> </div>
                            </div>
                        </div>
                    </div>
					 <?php } if($prod_details[0]->frame_color!=Canvas){?>
					 
					<div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Glass</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <div id="glass_name"><?=$glass_name?> </div>
                            </div>
                        </div>
                    </div>
				<?php } ?>
					<div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Final Frame Size</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <div><?php echo $prod_details[0]->width.'" x '.$prod_details[0]->height.'"'  ?> </div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                    	<div class="col-md-12">
                        	<style>
	.old_price {text-decoration:line-through}
	.old_price,.new_price{font-size:14px}
	.new_price {margin-left: 20px;}
</style>
							<div class="main-title">
<div>
	<h4 style="font-weight:700">Save (<?php echo $dis=round((((($prod_details[0]->mrp)-($prod_details[0]->s_p))/($prod_details[0]->mrp))*100)); ?>%)</h4>
    <div>
		<span class="old_price" id="old_price"><?=$prod_details[0]->mrp?> </span>
        <span id="selling_price" class="new_price" style="color:#d31d25"><?=$prod_details[0]->s_p?></span>
     </div>
</div>
</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 frame-it-button">
                            <button type="button" class="btn social_icon" <?php  if(!$this->session->userdata('userid')){?> onclick="login('');"<?php }else{?>  onclick="addToCart()" <?php  }?> style="background-color:#d3131b; color:#fff;"> Add to cart </button>
                            <button type="button" class="btn social_icon" style="background-color:#555; color:#fff;"> Add to gallery </button>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
function addToCart(){

//alert('sss');
var glasses_coste=FrameCost=MountCost=image_type='';
var glasses=$('#glass_name').html();
var total_price=$('#selling_price').html();
var user_id=$('#userid').val();
var image_id=$('#image_id').val();
var mount_name=$('#mount_name').html();
var mount_color='DR 2091';
var mat1_size=$('#mount_size').html();
var frame_name=$('#frame_name').html();
var frameSize=$('#frame_size').html();
var print_size=final_frame_size=$('#final_frame_size').val();
var price=$('#total_price').val();
var paper_surface=$('#surface').html();
var image_namee=$('#filename').val()+'.JPG';
//alert(frame_name+','+final_frame_size);
var only_print='';
//alert(image_namee);
var url="glasses_coste"+glasses_coste+"&glasses="+glasses+"&FrameCost="+FrameCost+"&MountCost="+MountCost+"&total_price="+total_price+"&user_id="+user_id+"&img_id="+image_id+"&image_type="+image_type+"&mat_color="+mount_color+"&mount_color="+mount_name+"&mat_size="+mat1_size+"&frame_color="+frame_name+"&frameSize="+frameSize+"&images_size="+print_size+"&images_price="+price+"&paper_surface="+paper_surface+"&final_frame_size="+final_frame_size+"&image_namee="+image_namee+'&print_v='+only_print;
//alert(url)
 $.ajax({
		//final_frame_size
             type: "POST",
	     url: "<?=base_url()?>frontend/frameit_addtocart",
             data: url,
			 
             success:function(data)  
             {    
			// alert(data);
				 $('.frame-step-header-container').show();
				  feedback_of_addtocart(data);
				 $('html, body').animate({ scrollTop: 0 }, 'fast');
				 }
             
         });
}

</script>
<script>
	function feedback_of_addtocart(a){
	//alert(a)
	//if(a==1){
	$('.frame-step-header-text').html('<span class="glyphicon glyphicon-ok" style="margin-right:10px;"></span>Item Added To Cart.');
	//}
	
	}

	
	</script>