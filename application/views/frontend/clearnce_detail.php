<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Clearnce Details</title>
</head>

<body>
<div class="container">
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
            width: 100%;
            height: 100%;
            right: 0px;
            top: 0;
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
                    background: #ddd;
                    display: block;
                    font-family: Arial;
                    position: absolute;
                    right: 0;
                    width: 300px;
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
                }
                .frame-it-button{ text-align:right}
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
			
			<?php  print_r($prod_details); 
			//$paper_surface=str_replace('%20',' ',$avl_glass);
			$glass=$prod_details[0]->glass;
			if($glass=='yes'){
			$glass_name="Regular";
			
			}else if($glass=='no'){
			$glass_name="Normal";
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
                                <strong> <?=$prod_details[0]->surface?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Frame</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <strong><?=$prod_details[0]->frame_color?></strong>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Frame Size</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <strong> 1 (Inch) </strong>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Mount</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <strong> <?=$prod_details[0]->mount?> </strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Mount Size</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <strong> <?=$prod_details[0]->mount_size?> </strong>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Glass</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <strong><?=$glass_name?> </strong>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="frame-it-content">
                            <div class="col-md-6 col-sm-6">
                                <strong>Final Frame Size</strong>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <strong><?php echo $prod_details[0]->width.'" x '.$prod_details[0]->height.'"'  ?> </strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 frame-it-button">
                            <button type="button" class="btn social_icon" style="background-color:#d3131b; color:#fff;"> Add to cart </button>
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
