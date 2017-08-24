<link rel="stylesheet" href="<?php print base_url();?>assets/css/light-box-model.css" type="text/css"/>
<link rel="stylesheet" href="<?php print base_url();?>assets/css/wallcolor.css" type="text/css"/>
<link href="<?php print base_url();?>assets/css/dropzone.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/croppie.css" type="text/css" />
<link rel="stylesheet" href="<?php print base_url();?>assets/css/light-box-model.css" type="text/css"/>
<script src="<?php echo base_url();?>assets/js/dropzone.js" type="text/javascript"></script>    
<script src="<?php echo base_url();?>assets/js/croppie.js" type="text/javascript" ></script>

<?php 
    if(!isset($_COOKIE['user_info'])){
    $cookie_value = uniqid(rand());
    setcookie('user_info', $cookie_value, time() + (86400 * 30), "/");
    $_SESSION['user_info'] = $cookie_value; 
    }else{
    $_SESSION['user_info'] = $_COOKIE['user_info'];    
    }
?>

<script>
	$(document).ready(function(){
		var session_id = '<?php echo $_COOKIE['user_info'];?>';
		var url = "<?php echo base_url().'application/views/frontend/upload_images/';?>";
		$.ajax({
            type:"post",
			url:'<?=base_url()?>index.php/frontend/image_size',
			data:{id:session_id,url,session_id},
			success: function(data){
			var images = JSON.parse(data);
			if(!images){
				var td_inner = '';
				$('#val').html(td_inner);
				$('.para').html('shop Now');
			}else{
				var length = images.length;
				var td_inner = '<p style="text-align:center; font-size:14px">Welcome back!<br>You have '+length +' photo saved. </p>';
				$('#val').html(td_inner);
				$('.para').html('See My Photos');
			} 
		   }
		});
	
	    $('.category').click(function(){
			var type = $(this).attr('id');
			$.ajax({
				type: 'POST',
				url: '<?=base_url()?>index.php/frontend/photostoart',
				data:{category: type }
    		}); 
		});
	    
	});
</script>

<script>
		$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
		
		$('#RemoveAll').click(function(){
        Dropzone.forElement("#my-dropzone").removeAllFiles(true);
		});
	});
</script>
<script type="text/javascript">
	function dropzone_box(){
		$(document).ready(function(){
		var k = $('#val').html();
			if(k == ''){
			$('#upload').show();
			}else{
			window.location.href='photostoart_inner';
			}
		});
	}
    function remove_box(){
		$(document).ready(function(){
		    $('#upload').hide();
		Dropzone.forElement("#my-dropzone").removeAllFiles(true);
    	});
	}

</script>

<div class="lightbox-target" id="upload">
    	<div id="uploader_popup_goofy_a">
        	<div class="uploader_popup_header">
            	<h2 class="text-left">  Upload Photos </h2>
                <a class="lightbox-close" href="" onclick="remove_box(); return false;"></a>
            </div>
            <div class="uploader_popup_upload-icon">
			<form action="<?=base_url()?>index.php/frontend/dropzone"  class="dropzone" id="my-dropzone">
			     <div class="dz-default dz-message">
                    <img src='<?=base_url()?>/images/upload_icon.svg'width='100px' height='100px'>
                 </div>
			</form>
                <div class="popup-default-message text-center dz-default dz-message" id='msg'>
                    <h2>Drag and drop images here or click to browse</h2>
                    <p>Each image must be a minimum of 500 KB to ensure a high quality print. Up to 10 images are allowed.</p>
                </div>
                 
            </div> 
            <div class="popup-default-footer col-md-12">
            	<p class="text-left pull-left">By uploading, I agree to the <span> <a style="cursor: default; color: #ef9223">Terms of use</a> </span> </p>
                <div class="popup-default-button pull-right">
                	<input id="submit-all" value="Submit all files" type="button" class="popup-button">
                </div>
            </div>
        </div>       
</div>
<div class="container">
	<div class="top_slider_img">
    	<div class="top_slider_content">
            <h1>SAVE your JOYFUL MEMORIES AS ART</h1>
            <p class="p_top-slider">Turn cherished memories and extra-special occasions into something you'll enjoy each day. Upload photos and choose from a variety of customizable looks. Put the moments that define you on display in the perfect place&mdash;your home.</p>
            <div id="val"></div>
			<p target="_self" class="button-slider-upload para" href="" onclick="dropzone_box(); return false;">
			<p class="p_top-slider" style="text-align:center"><a href="#" onclick="return login('')" style="color:#41484c">Login/Register</a></p> 
		</div>
    </div>
</div>
<section id="slider_explore" style="background-color:#fff">
<!-- Item slider-->
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="itemslider">
        <div class="carousel-inner">
          <div class="item active">
            <div class="col-xs-12 col-sm-6 col-md-4 text-center">
              <a href="#"><img src="http://mirror.mahattaart.com/assets/img/slider/canvas mockup.jpg" class="img-responsive center-block"></a>
              <a target="_self" class="button-slider-upload category" onclick="dropzone_box()" id='canvas'>Canvas</a>
              <h5 class="text-center">Starting at Rs.250</h5>
            </div>
			<div class="col-xs-12 col-sm-6 col-md-4 text-center">
              <a href="#"><img src="http://mirror.mahattaart.com/assets/img/slider/Frame Mockup.jpg" class="img-responsive center-block" style="height:262px;"></a>
              <a target="_self" class="button-slider-upload category" onclick="dropzone_box()" id='framing'>Framing</a>
              <h5 class="text-center">Starting at Rs.150</h5>
            </div>
			<div class="col-xs-12 col-sm-6 col-md-4 text-center">
              <a href="#"><img src="http://mirror.mahattaart.com/assets/img/slider/print mockup.jpg" class="img-responsive center-block" style="height:262px;"></a>
              <a target="_self" class="button-slider-upload category" onclick="dropzone_box()" id='print_only'>Print Only</a>
              <h5 class="text-center">Starting at Rs.100</h5>
            </div>
			<!-- <div class="col-xs-12 col-sm-6 col-md-3 text-center">
              <a href="#"><img src="http://cache1.artprintimages.com/images/jump_pages/rebrand2/P2A_resp/stream_4.jpg" class="img-responsive center-block"></a>
              <a target="_self" class="button-slider-upload category" onclick="dropzone_box()" id='others'>Other</a>
              <h5 class="text-center">Starting at $39.99</h5>
            </div> -->
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>
</section>
<div class="container">
    <section>
    	<div class="p2_sclection row">
        	<div class="col-md-4 p2a_content" style="background-color:#e45c45; height:100%">
            	<h2>Decorate with photos you love</h2>
                <p>Photos[to]Art&trade; lets you turn your favorite photos into personalized wall decor. Simply upload your photos and choose from the options like gallery-quality canvas, custom framing, SwitchArt&reg;, wood mounting and more.</p>
                  <p><a target="_self" class="button-slider-upload btn2a-white para"  href="" onclick="dropzone_box(); return false;" style="color:#e45c45">Shop Now</a></p>
            </div>
            <div class="col-md-8 p2a_img">
            	<img src="<?php echo base_url();?>assets/img/photostoart/us-uk.jpg" class="img-responsive" />
            </div>
        </div>
        
        <div class="p3_sclection row">
        	<div class="col-md-6 p3a_content" style="background-color: rgb(108, 187, 154); margin-right:15px">
            	<h2>100% Satisfaction guaranteed</h2>
                <p>If for any reason you are not completely satisfied with your purchase, you may return it within 30 days of receipt and receive a free replacement or a full refund for the price of the product.</p>
                <p> <a href="" class="p2a-textlink"> Learn More </a> </p>
            </div>

            <div class="col-md-6 p3a_content" style="background-color:#43afc7; margin-left:15px">
            	<h2>Still have questions?</h2>
                <p>If you have a question about Photos[to]Art™ visit our FAQ page.</p>
                <p><a target="_self" class="call-to-action-3-button btn btn-default" href="http://beta.mahattaart.com/index.php/frontend/faq" style="font-size:18px">FAQ</a></p>
            </div>
        </div>
        
    </section>
</div>


<style>
.p2a_content {
  color: white;
  font-size: 16px;
  padding: 30px;
}
.call-to-action-1-button.btn.btn-default {
  border: medium none;
  border-radius: 0;
  color: #e45c45;
  font-weight: bolder;
  padding: 8px 30px;
  font-size:16px
}
.call-to-action-3-button.btn.btn-default {
  border: medium none;
  border-radius: 0;
  color: #43afc7;
  font-weight: bolder;
  padding: 8px 30px;
}
.p2a_img{ padding-left:0}
.p2a_content > h2 {
  font-family: "BebasNeueRegular";
  font-size: 32px;
  font-weight: 600;
  letter-spacing: 1px;
  line-height: 1.2em;
  text-transform: uppercase;
}
.p2a_content > p, .p3a_content > p {
  font-size: 14px;
  line-height: 1.4em;
  margin: 1em 0;
}
.p2_sclection.row {
  height: 400px;
  overflow: hidden;
  margin-bottom:30px
}
.p3_sclection.row {
  margin-bottom: 30px;
  overflow: hidden;
}
.col-md-6.p3a_content {
  color: #fff;
  min-height: 200px;
  padding: 15px;
  width: calc(50% - 15px);
}
.p3a_content > h2 {
  font-family: "BebasNeueRegular";
  font-size: 28px;
  font-weight: bold;
  letter-spacing: 1px;
  margin-top: 0;
  text-transform: uppercase;
}
.top_slider_content {
  float: right;
  margin: 0;
  min-height: 400px;
  right: 0;
  top: 0;
}

.top_slider_content {
  max-width: 400px;
  padding: 15px 38px 0;
}

.top_slider_content {
	font-size: 16px;
	position: relative;
	text-align: center;
}

.p2a-section {
  font-family: Helvetica,Arial,sans-serif;
  margin: 0 auto;
  max-width: 1008px;
}

.top_slider_img  {
  background-image: url("<?php echo base_url();?>assets/img/slider/us-uk.jpg");
  background-position: center center;
  background-size: contain;
  font: 14px/1.4 "Helvetica Neue",HelveticaNeue,Helvetica,Arial,sans-serif;
  height: 100%;
  margin: 20px auto 20px;
  min-height: 460px;
  position: relative;
  width: 100%;
}
.top_slider_img {
  background-repeat: no-repeat;
  background-size: cover;
}

.top_slider_content h1 {
  color: #000;
  font-family: "BebasNeueRegular";
  font-size: 48px;
  font-weight: bold;
  letter-spacing: 1px;
  line-height: 45px;
  text-transform: uppercase;
}
.p_top-slider {
	font-size: 14px;
	letter-spacing: 0.015em;
	line-height: 1.4;
	margin: 10px 0;
	padding: 0 20px;
	text-align: left;
}
.button-slider-upload{
  background: #41484c none repeat scroll 0 0;
  border: 1px solid #333;
  color: white;
  cursor: pointer;
  display: inline-block;
  font-size: 18px;
  font-weight: bold;
  line-height: 1;
  padding: 7px 30px;
  text-transform: capitalize;
  vertical-align: middle;
  margin-top:10px
}

.button-slider-upload:hover {
  background: white none repeat scroll 0 0;
  border: 1px solid #333;
  color: #333;
  cursor: pointer;
}
.popup-button {
  background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #ef9223 0px, #f26522 100%) repeat scroll 0 0;
  border: 1px solid #f26522;
  color: white;
  cursor: pointer;
  display: inline-block;
  font-size: 14px;
  font-weight: bold;
  line-height: 1;
  opacity: 0.5;
  padding: 7px 14px;
  text-transform: uppercase;
}


#slider_explore {
  margin: 40px 0;
  position: relative;
}
.btn2a-white {
  background-color: white;
  border:none
}
.btn2a-white:hover {
  background-color: #41484c !important;
  border:none
}
.p2a-textlink {
  color: white;
  padding: 0;
}
.p2a-textlink {
  display: inline-block;
  font-size: 17px;
  font-weight: bold;
  letter-spacing: 0.02em;
  text-align: center;
}
.p2a-textlink:hover {
  color: white;
  text-decoration: underline;
}
</style>
<style>
.popup-button {
background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #ef9223 0px, #f26522 100%) repeat scroll 0 0;
border: 1px solid #f26522;
color: white;
cursor: pointer;
display: inline-block;
font-size: 14px;
font-weight: bold;
line-height: 1;
opacity: 0.5;
padding: 7px 14px;
text-transform: uppercase;
}

#uploader_popup_goofy_a {
	background: white none repeat scroll 0 0;
	border: 1px solid #d6d6d6;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
	display: block;
	font-family: Arial;
	left: 314.5px;
	position: absolute;
	top: 134px;
	width: 720px;
	z-index: 10000012;
	padding: 10px;
}

.uploader_popup_header > h2 {
	font-size: 30px;
	font-weight: bold;
	text-transform: uppercase;
	margin: 0;
	font-family: 'BebasNeueRegular' !important;
}

.uploader_popup_upload-icon > img {
border: medium none;
bottom: 0;
box-shadow: none;
box-sizing: border-box;
left: 0;
margin: 40px 0 10px;
position: relative;
right: 0;
top: 0;
}
.popup-default-message > h2 {
color: #ef9223;
font-size: 20px;
line-height: 18px;
cursor:pointer;
padding-bottom:10px
}
.popup-default-message > p, .popup-default-footer > p {
color: #888;
font-size: 12px;
}
.popup-default-message > p {
cursor:pointer
}

#goofy_a > div {
padding: 10px;
}
.uploader_popup_upload-icon {
	height: 260px;
	margin-top: 10px;
	overflow: auto;
	position: relative;
	margin-bottom: 10px;
}

#imgInp {
background: white none repeat scroll 0 0;
cursor: inherit;
display: block;
font-size: 100px;
height: 100px;
left: 50%;
margin-left: -50px;
margin-top: -50px;
opacity: 0;
position: absolute;
top: 50%;
width: 100px;
}
.dz-upload-image {
display: none;
}
</style>
<script>
    Dropzone.options.myDropzone = {
      autoProcessQueue: false,
     init: function() {
        var submitButton = document.querySelector("#submit-all")
            myDropzone = this; // closure
        submitButton.addEventListener("click", function() {
          myDropzone.processQueue(); // Tell Dropzone to process all queued files.
        });
        this.on("queuecomplete", function (file) {
             $('#load_buffer').show();
             $('#dropzone_images').hide();
             Dropzone.forElement("#my-dropzone").removeAllFiles(true);
         window.location.href = '<?=base_url()?>index.php/frontend/photostoart_inner';
        });
        this.on("addedfile", function(file) {
    	 if( (myDropzone.files.length+1) > 0){
			$('#msg').hide(); 
		}else{
			$('#msg').hide(); 
		}
		 if(file.size<500000){
    	   this.removeFile(file);
    	 alert('please upload image size greater than 500KB');
    	 }
        });
       }
    };
</script>
<style>
#itemslider h5 {
	color: #888;
	font-weight: normal;
}
</style>
 
