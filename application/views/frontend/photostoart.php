<link rel="stylesheet" href="<?php print base_url();?>assets/css/light-box-model.css" type="text/css"/>
<link rel="stylesheet" href="<?php print base_url();?>assets/css/wallcolor.css" type="text/css"/>
<link rel="stylesheet" href="<?php print base_url();?>assets/css/loader.css" type="text/css"/>
<link href="<?php print base_url();?>assets/css/dropzone.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/croppie.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert.css" type="text/css" />

<script src="<?php echo base_url();?>assets/js/dropzone.js" type="text/javascript"></script>    
<script src="<?php echo base_url();?>assets/js/croppie.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/sweetalert-dev.js" type="text/javascript" ></script>

<?php 
 if($this->session->userdata('userid')){
		$Obj=new Frontend();
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$splitUrl=split('/', $_SERVER['REQUEST_URI']);
		$ipaddress = getenv('HTTP_CLIENT_IP');
		$Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
?>
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
				$('.para').html('Upload Here');
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
            	<h2 class="text-left">  Upload Here </h2>
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
                	<input id="submit-all" value="UPLOAD" type="button" class="popup-button">
                </div>
            </div>
        </div>       
</div>
<div class="container">
	<div class="row">
    	<div class="top_slider_img col-md-12">
        	<img src="<?=base_url()?>/assets/img/slider/us-uk-1.jpg" class="img-responsive" />
    	<div class="top_slider_content">
            <h1  class="text-left">SAVE your JOYFUL MEMORIES AS ART</h1>
            <p class="p_top-slider">Turn cherished memories and extra-special occasions into something you'll enjoy each day. Upload photos and choose from a variety of customizable looks. Put the moments that define you on display in the perfect place&mdash;your home.</p>
            <div id="val"></div>
			<a target="_self" class="button-slider-upload para" href="" onclick="dropzone_box(); return false;"></a>
			<p class="p_top-slider" style="text-align:center"><a href="#" onclick="return login('')" style="color:#41484c">Login/Register</a></p> 
		</div>
    </div>
    </div>
</div>
<section id="slider_explore" style="background-color:#fff">
<!-- Item slider-->
<div class="container">
  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 text-center">
    	<div class="img_center">
      		<a href="#"><img src="http://mirror.mahattaart.com/assets/img/slider/canvas_img.jpg" class="img-responsive"></a>  
        </div>
      
      <a target="_self" class="button-slider-upload category" onclick="dropzone_box()" id='canvas'>Canvas</a>
      <h5 class="text-center">Starting at Rs.250</h5>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 text-center">
      <div class="img_center">
	      <a href="#"><img src="http://mirror.mahattaart.com/assets/img/slider/frame_img.jpg" class="img-responsive"></a>
      </div>
      <a target="_self" class="button-slider-upload category" onclick="dropzone_box()" id='framing'>Framing</a>
      <h5 class="text-center">Starting at Rs.150</h5>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 text-center">
      <div class="img_center">
	      <a href="#"><img src="http://mirror.mahattaart.com/assets/img/slider/print_img.jpg" class="img-responsive"></a>
      </div>
      <a target="_self" class="button-slider-upload category" onclick="dropzone_box()" id='print_only'>Print Only</a>
      <h5 class="text-center">Starting at Rs.100</h5>
    </div>
  </div>
</div>
</section>
<div class="container">
    <section>
	<!-- commented by sajid to add aimage-->
    	<!--<div class="p2_sclection row">
        	<div class="col-md-4 p2a_content" style="background-color:#e45c45; height:100%">
            	<h2>Decorate with photos you love</h2>
                <p>Photos[to]Art&trade; lets you turn your favorite photos into personalized wall decor. Simply upload your photos and choose from the options like gallery-quality canvas, custom framing, SwitchArt&reg;, wood mounting and more.</p>
                  <p><a target="_self" class="button-slider-upload btn2a-white para"  href="" onclick="dropzone_box(); return false;" style="color:#e45c45">Shop Now</a></p>
            </div>
            <div class="col-md-8 p2a_img">
            	<img src="<?php echo base_url();?>assets/img/photostoart/us-uk.jpg" class="img-responsive" />
            </div>
        </div>-->
        
      
        
    </section>
</div>


<style>
  .p2a_content>h2,.p3a_content>h2{font-family:BebasNeueRegular}.p2a_content>h2,.p3a_content>h2,.top_slider_content h1{letter-spacing:1px;text-transform:uppercase}.button-slider-upload,.popup-button{cursor:pointer;display:inline-block}.img_center a>img{margin:0 auto}.p2a_content{color:#fff;font-size:16px;padding:30px}.call-to-action-1-button.btn.btn-default{border:none;border-radius:0;color:#e45c45;font-weight:bolder;padding:8px 30px;font-size:16px}.call-to-action-3-button.btn.btn-default{border:none;border-radius:0;color:#43afc7;font-weight:bolder;padding:8px 30px}.p2a_img{padding-left:0}.p2a_content>h2{font-size:32px;font-weight:600;line-height:1.2em}.p2a_content>p,.p3a_content>p{font-size:14px;line-height:1.4em;margin:1em 0}.p2_sclection.row,.p3_sclection.row{margin-bottom:30px;overflow:hidden}.p2_sclection.row{height:400px}.col-md-6.p3a_content{color:#fff;min-height:200px;padding:15px;width:calc(50% - 15px)}.p3a_content>h2{font-size:28px;font-weight:700;margin-top:0}.top_slider_content{position:absolute;text-align:center;width:340px;right:20px;top:0}.p2a-section{font-family:Helvetica,Arial,sans-serif;margin:0 auto;max-width:1008px}.top_slider_content h1{color:#000;font-family:BebasNeueRegular;font-size:48px;font-weight:700;line-height:45px}.p_top-slider{font-size:14px;letter-spacing:.015em;line-height:1.4;margin:10px 0;text-align:left}.button-slider-upload{background:#41484c;border:1px solid #333;color:#fff;font-size:18px;font-weight:700;line-height:2;text-transform:capitalize;vertical-align:middle;margin-top:10px;width:50%}.button-slider-upload:hover{background:#fff;border:1px solid #333;color:#333;cursor:pointer}.popup-button{background:linear-gradient(#ef9223,#f26522);background:-webkit-linear-gradient(#ef9223,#f26522);background:-o-linear-gradient(#ef9223,#f26522);background:-moz-linear-gradient(#ef9223,#f26522);background:linear-gradient(#ef9223,#f26522);border:1px solid #f26522;color:#fff;font-size:14px;font-weight:700;line-height:1;padding:7px 14px;text-transform:uppercase}.popup-button:hover{background:linear-gradient(#fff,#fff);background:-webkit-linear-gradient(#fff,#fff);background:-o-linear-gradient(#fff,#fff));background:-moz-linear-gradient(#fff,#fff);background:linear-gradient(#fff,#fff);color:#000;border:1px solid #d6d6d6}#slider_explore{margin:40px 0;position:relative}.btn2a-white{background-color:#fff;border:none}.btn2a-white:hover{background-color:#41484c!important;border:none}.p2a-textlink{color:#fff;padding:0;display:inline-block;font-size:17px;font-weight:700;letter-spacing:.02em;text-align:center}.p2a-textlink:hover{color:#fff;text-decoration:underline}
</style>
<style>
  a.lightbox-close{background:0 0;box-sizing:border-box;color:#000;display:block;height:100%;position:absolute;right:0;text-decoration:none;top:2px;width:30px}a.lightbox-close::after,a.lightbox-close::before{background:#000;content:"";height:25px;left:15px;position:absolute;top:0;width:1px;display:block}a.lightbox-close::before{transform:rotate(45deg)}a.lightbox-close::after{transform:rotate(-45deg)}.uploader_popup_header{background-color:#f1f1f1;height:30px;position:relative;padding:0 10px}#uploader_popup_goofy_a{background:#fff;display:block;font-family:Arial;left:50%;position:absolute;top:50%;width:720px;z-index:10000012;transform:translate(-50%,-50%)}.uploader_popup_header>h2{font-size:22px;font-weight:700;text-transform:uppercase;margin:0;font-family:BebasNeueRegular!important;padding-top:2px}.uploader_popup_upload-icon>img{border:none;bottom:0;box-shadow:none;box-sizing:border-box;left:0;margin:40px 0 10px;position:relative;right:0;top:0}.popup-default-message>h2{color:#ef9223;font-size:20px;line-height:18px;cursor:pointer;padding-bottom:10px}.popup-default-footer>p,.popup-default-message>p{color:#888;font-size:12px}.popup-default-message>p{cursor:pointer}#goofy_a>div{padding:10px}.uploader_popup_upload-icon{height:300px;margin-top:10px;overflow:auto;position:relative;margin-bottom:10px}#imgInp{background:#fff;cursor:inherit;display:block;font-size:100px;height:100px;left:50%;margin-left:-50px;margin-top:-50px;opacity:0;position:absolute;top:50%;width:100px}.dz-upload-image{display:none}.popup-default-footer{display:block;clear:both;margin:10px}
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
        
		this.on("removedfile",function(file){
			if( (myDropzone.files.length) == 0){
				$('#msg').show(); 
			}
		});	
			
		this.on("addedfile", function(file) {
    	 if( (myDropzone.files.length+1) > 0){
			$('#msg').hide(); 
		}
		 if(file.size<500000){
    	   $('#upload').hide();
		   this.removeFile(file);
			 swal({
				 title: "",
				 text: "Please Upload Images Greater Than 500kB",
				 type: "error",
				 timer: 1000
				 })
			  setTimeout(function(){
				  dropzone_box();
			  },1000);
			
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
 
