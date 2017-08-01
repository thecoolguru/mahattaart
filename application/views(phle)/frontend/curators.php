
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
<div  class="inner-main-container">
    	
        <div class="pagination">
        	<span> <a href="<?=base_url()?>frontend/index">HOME</a> > <span> Curators </span> </span>
        </div>
        
        <!-- art style -->
        <div class="art-style curator">
        	
            <!-- aside -->
            <aside style="width:200px;">
            	
                
                <div class="curator_img" style="margin-top:20px;"> <img src="http://dev.wallsnart.com/assets/img/subject-img/item2.jpg" /> </div>
                
                
                
               <!-- <div class="curatorSocial">
                 <ul class="social_menu">
    <li>
        <a title="Share by Twitter" class="social twitter" rel="nofollow" href="#">Twitter</a>
    </li>
    
    <li>
        <a title="Share by Facebook" rel="nofollow" href="http://www.facebook.com/" class="social facebook">curators</a>
    </li>
    
    <li><a title="Share by youtube" rel="nofollow" href="#" class="social youtube">fab device</a></li>
    
    
</ul>
                    </div>-->
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel">
            	
              <div>
              <h2> Furniture Library </h2>
              <p> An ultra luxurious interior design brand with a personality that embodies strength in its bespoke nature of production and high quality iconic furniture pieces, Manjeet Bullar Design is one of the top design companies in the country. It offers a diverse yet complete range of products and services required to build a home from scratch. Each of its designs created himself by the creative designer, Manjeet Bullar are exquisitely hand crafted from the stage of conception to its tangible creation. From state of the art architecture to hand carved dining chairs, the company is a one-stop-shop for clients in need. The company was established in 1989 based out of New Delhi, is known to have catered to the country's crème-de- la-crème clientele. </p>
              
              <br />
              <p style="font-weight:bold;">  <i> "An ultra luxurious interior design brand with a personality that embodies strength in its bespoke nature of production and high quality iconic furniture pieces, Manjeet Bullar Design is one of the top design companies in the country." </i>   </p>
              
               </div>
                

            </div>
            <!-- right panel -->
            
        </div>
        <!-- art style -->
        
        
        
        
        
        
        <!--SLIDER-->
        
        <h5><a onclick="dropdown()" href="#">View All Images </a></h5>
        
        <ul class="scroller"> 

		<li>
			<a onclick="dropdown()" href="#"> 
				<img src="http://www.indiapicture.in/wallsnart/398/UNRM_003734.JPG"> 
			</a>
		</li>

		<li> 
			<a onclick="dropdown()" href="#">
				<img src="http://www.indiapicture.in/wallsnart/398/UNRM_005480.JPG"> 
			</a>
		</li>

		<li> 
			<a onclick="dropdown()" href="#"> 
				<img src="http://www.indiapicture.in/wallsnart/398/UNRM_003734.JPG"> 
			</a>
		</li>

		<li>
			<a onclick="dropdown()" href="#">
				<img src="http://www.indiapicture.in/wallsnart/398/UNRM_005480.JPG"> 
			</a>
		</li>

		<li> 
			<a onclick="dropdown()" href="#">
				<img src="http://www.indiapicture.in/wallsnart/398/UNRM_003734.JPG"> 
			</a>
		</li>

		<li> 
			<a onclick="dropdown()" href="#">
				<img src="http://www.indiapicture.in/wallsnart/398/UNRM_005480.JPG"> 
			</a>
		</li>

	</ul>
        
        <!--slider-->
        
        
        
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css">
	 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    
<script> 
		$(document).ready(function(){
	   $('.scroller').scrollify(); 
		});
		
		
	</script> 
    
    
    <style>
  .jq-scroller-wrapper * {
    box-sizing: border-box;
  }

  .jq-scroller,
  .jq-scroller-wrapper {
   
    display: block;
    margin: 0 auto;
    overflow: hidden;
    white-space: nowrap;
    list-style: none;
    position: relative;
    height: 180px;
	margin:30px 0px;
  }

  .jq-scroller {
    border: 1px solid lightgrey;
    padding-top: 12px;
    border-radius: 6px;
    box-shadow: inset 0px 3px 14px -4px rgba(0, 0, 0, 0.2);
  }

  .jq-scroller-wrapper {
    overflow: visible;
  }

  .jq-scroller-prev,
  .jq-scroller-next {
    position: absolute;
    top: 50%;
    height: 28px;
    margin-top: -10px;
    width: 28px;
    left: -36px;
    z-index: 1;
    font-size: 32px;
    opacity: 0.3;
    cursor: pointer;
  }

  .jq-scroller-next {
    left: auto;
    right: -36px;
  }

  .jq-scroller-prev:hover,
  .jq-scroller-next:hover {
    opacity: 1;
  }

  .jq-scroller-mover {
    position: relative;
    word-spacing: -4px;
    height: 100%;
    list-style: none;
    padding: 0; 
    margin: 0; 
    text-align: center; 
  }

  .jq-scroller-item {
    display: inline-block;
    width: 23%;
    min-width: 140px;
    height: 100%;
    white-space: nowrap;
    border-radius: 6px;
    vertical-align: bottom;
    position: relative;
    padding-left: 1%;
    padding-right: 1%;
    cursor: pointer;
  }

  .jq-scroller-preview {
    width: 100%;
    height: 80%;
    background-size: cover;
    background-position: 50% 50%;
    border: 1px solid darkgrey;
    transition: opacity 0.1s ease-in;
    /*opacity: 0.5;*/
    display: block;
  }
  .jq-scroller-preview img{
    display: none;
  }

  .jq-scroller-preview:hover {
    opacity: 1;
  }

  .jq-scroller-overlay.active {
    z-index: 99;
    opacity: 1;
  }

  .jq-overlay-close {
    position: absolute;
    right: -6px;
    top: -6px;
    cursor: pointer;
    font-size: 24px;
  }

  .jq-scroller-overlay-next:hover,
  .jq-scroller-overlay-prev:hover {
    color: black;
  }</style>
  
  <script>(function ( $ ) {
	$.fn.scrollify = function() {
		

		function visuallyWrap(el){ 
			
			var ul = $(el)
			
			ul.addClass('jq-scroller-mover');
			
			ul.wrap('<div class="jq-scroller-wrapper"><div class="jq-scroller"></div></div>');
			
			var prevNextBtn = '<i class="fa fa-arrow-circle-left jq-scroller-prev"></i><i class="fa fa-arrow-circle-right jq-scroller-next"></i>'
			
			var overlay = '<div class="jq-scroller-overlay"></div></div>';
			
			var wrapper = ul.parents('.jq-scroller-wrapper')
			
			wrapper.append(prevNextBtn)
			
			wrapper.append(overlay)

			$(el).find('li').each(function(index, elem){
				var li = $(elem)
				var a = li.find('a').first(); 
				a.addClass('jq-scroller-preview')
				li.addClass('jq-scroller-item');
				a.attr('style', 'background-image:url('+a.children('img').attr('src')+');')
				//li.append('<div class="jq-scroller-caption">'+a.attr('data-title')+'</div>')
			})
		}

		function attachEventHandlers(el){

			var wrapper = $(el).parents('.jq-scroller-wrapper')
			
			var nextBtn = wrapper.find('.jq-scroller-next')
			
			var prevBtn = wrapper.find('.jq-scroller-prev')
			
			var mover = wrapper.find('.jq-scroller-mover')
			
			var overlay = wrapper.find('.jq-scroller-overlay')
			
			var items = wrapper.find('.jq-scroller-item')
			
			var overlayContent = wrapper.find('.jq-overlay-content')
			
			var overlayN = wrapper.find('.jq-scroller-overlay-next')
			
			//var overlayP = wrapper.find('.jq-scroller-overlay-prev')

			var w = $(items[0]).outerWidth()+"px"; 
			
			var animN = function(){
				var l = $(items).last().offset().left + $(items).last().width(); 
				var m = $(wrapper).offset().left + $(wrapper).width(); 
				if ( l >= m){
					return {left: "-="+w}
				} else {
					return {left: "-="+0}	
				}

			}; 
			
			var animP = function(){
				if ($(mover).position().left == 0){
					return {left: "+="+0}
				} else {
					return {left: "+="+w}	
				}
			}; 
			var animDur = {duration: "medium"}

			var indexOfCurrentItem; 

			$(nextBtn).click( function(){
				mover.animate(animN(),animDur)
				console.log($(mover).position().left); 
			})

			$(prevBtn).click( function(){
				mover.animate(animP(),animDur)
				console.log(); 
			})
			
			$(overlay).click( function(){
				overlay.removeClass('active')
				overlayContent.empty(); 
			});
			
			$(items).click( function(event){
				event.preventDefault(); 
				overlayContent.empty(); 
				indexOfCurrentItem = items.index(this)
				var contentLink =  $(this).children('.jq-scroller-preview')
				var contentImageSrc = contentLink.attr('href')
				var caption = contentLink.attr('data-title')
				var maxHeight = ($(document).height() - 200)+"px"; 

				if (contentLink.attr('data-type') == 'iframe'){
					var content = $('<iframe src="'+contentImageSrc+'"  frameborder="0" allowfullscreen></iframe>');
				} else {
					var content = $('<img src="'+contentImageSrc+'" style="max-height:'+maxHeight+';"/>');
				}
				content.appendTo(overlayContent);
				overlay.addClass('active')
			})


			$(overlayN).click( function(event){
				event.stopPropagation(); 
				$(items[indexOfCurrentItem+1]).trigger('click')
			})

			$(overlayP).click( function(event){
				event.stopPropagation(); 
				$(items[indexOfCurrentItem-1]).trigger('click')
			})


		}
		visuallyWrap(this);

		attachEventHandlers(this)

		return this; 
	}

}( jQuery ));
</script>






<script>
function dropdown()
{        
    document.getElementById("rr").style.display="block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('rr').style.display = "none";
}
</script>


<div style=" clear:both;"></div>
<!--one -click--->

    <script type="text/javascript" src="<?php print base_url();?>application/views/frontend/js/jssor.slider.min.js"></script>
   
<script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 9,
                $SpacingX: 3,
                $SpacingY: 3,
                $Align: 260
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>


    <style>
        
        /* jssor slider arrow navigator skin 02 css */
        /*
        .jssora02l                  (normal)
        .jssora02r                  (normal)
        .jssora02l:hover            (normal mouseover)
        .jssora02r:hover            (normal mouseover)
        .jssora02l.jssora02ldn      (mousedown)
        .jssora02r.jssora02rdn      (mousedown)
        */
        .jssora02l, .jssora02r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 70px;
            height: 70px;
            cursor: pointer;
            background: url('<?php print base_url();?>application/views/frontend/img/a02.png') no-repeat;
            overflow: hidden;
        }
        .jssora02l { background-position: -3px -33px; }
        .jssora02r { background-position: -63px -33px; }
        .jssora02l:hover { background-position: -123px -33px; }
        .jssora02r:hover { background-position: -183px -33px; }
        .jssora02l.jssora02ldn { background-position: -3px -33px; }
        .jssora02r.jssora02rdn { background-position: -63px -33px; }

        /* jssor slider thumbnail navigator skin 03 css */
        /*
        .jssort03 .p            (normal)
        .jssort03 .p:hover      (normal mouseover)
        .jssort03 .pav          (active)
        .jssort03 .pdn          (mousedown)
        */
        
        .jssort03 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 80px;
            height: 50px;
        }
        
        .jssort03 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort03 .w, .jssort03 .pav:hover .w {
            position: absolute;
            width: 80px;
            height: 50px;
            border: white 1px dashed;
            box-sizing: content-box;
        }
        
        .jssort03 .pdn .w, .jssort03 .pav .w {
            border-style: solid;
        }
        
        .jssort03 .c {
            position: absolute;
            top: 0;
            left: 0;
            width: 80px;
            height: 50px;
            background-color: #000;
        
            filter: alpha(opacity=45);
            opacity: .45;
            transition: opacity .6s;
            -moz-transition: opacity .6s;
            -webkit-transition: opacity .6s;
            -o-transition: opacity .6s;
        }
        
        .jssort03 .p:hover .c, .jssort03 .pav .c {
            filter: alpha(opacity=0);
            opacity: 0;
        }
        
        .jssort03 .p:hover .c {
            transition: none;
            -moz-transition: none;
            -webkit-transition: none;
            -o-transition: none;
        }
        
        * html .jssort03 .w {
            width /**/: 80px;
            height /**/: 50px;
        }
        
    </style>
    
    <style>#rr{ display:none;}.hidd{ position: fixed !important;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    top: 0;
    left: 0;
    z-index:9999;
    transition: opacity 0.1s ease-in;
    text-align: center;}
  
</style>
    
   
<div id="rr" class="hidd">



<div style="margin:2% 20%; position:relative;">



<div id="close" onclick ="div_hide()" style="z-index:99;">  <i class="jq-overlay-close fa fa-times-circle" style="z-index:99; color:#FFF;"></i> </div>







    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 350px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        
        
        
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 350px; overflow: hidden;">
            <div data-p="100.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/002.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/thumb-002.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/003.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/thumb-003.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/002.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/thumb-002.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/003.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/thumb-003.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/002.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/thumb-002.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/003.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/thumb-003.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/002.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/002.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/003.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/003.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/002.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/002.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?php print base_url();?>application/views/frontend/img/003.jpg" />
                <img data-u="thumb" src="<?php print base_url();?>application/views/frontend/img/thumb-003.jpg" />
            </div>
        </div>
        <!-- Thumbnail Navigator -->
        <div u="thumbnavigator" class="jssort03" style="position:absolute;left:0px;bottom:0px;width:800px;height:70px;" data-autocenter="1">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: #000; filter:alpha(opacity=30.0); opacity:0.3;"></div>
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides" style="cursor: default;">
                <div u="prototype" class="p">
                    <div class="w">
                        <div u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:50px;height:50px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:50px;height:50px;" data-autocenter="2"></span>
       
    </div>
    <script>
        jssor_1_slider_init();
    </script>






    </div>
</div>






        
        
    </div>
    
    
    