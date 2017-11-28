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

	<script type="text/javascript">
		$('html').keyup(function(e){
			var width = $('#width').val();
			var height= $('#height').val();
			if(e.keyCode == 8){
				if(width == 0 || height == 0){
					$('.actual_price').html('Rs.0');				
				}
			}
		})
		$(document).ready(function(){		
				$('#width').keyup(function(){
						var real_value = $(this).val().replace(/[^0-9]/g,'');
						$(this).val(real_value);
						var real_width = $('#w_value').val();
						var real_height = $('#h_value').val();
						if($('#type').html() == 'horizontal')
						var ratio = real_height/real_width;
						if($('#type').html() == 'vertical')
						var ratio = real_width/real_height;
						var max_width = real_width/150;
					    var max_height = real_height/150;
						var id = $(this).attr('id');
						var value = $(this).val();	
						if(id == 'width'){
							if(value == ''){
							$('.actual_price').val('Rs.0');
							$('#height').val('');	
							}
						 }	
							if( (value <= max_width) && (value != 0) && (value != '') ){
							var input_height = ratio*value;
							$('#height').val(Math.round(input_height));
							setTimeout(function(){
							calculate_cost('Customize Size');
							},200);
						}else{
						 $('#height').val('');
						 $('#finished_size').html('<p style="color:red;">Choose Some Minimum Size </p>');		
						}
				});
				
				$('#height').keyup(function(){
						var real_value = $(this).val().replace(/[^0-9]/g,'');
						$(this).val(real_value);
						var real_width = $('#w_value').val();
						var real_height = $('#h_value').val();
						if($('#type').html() == 'horizontal')
						var ratio = real_height/real_width;
						if($('#type').html() == 'vertical')
						var ratio = real_width/real_height;
						var max_width = real_width/150;
					    var max_height = real_height/150;
						var id = $(this).attr('id');
						var value = $(this).val();	
						 if(id == 'height'){
							if(value == ''){
							$('.actual_price').val('Rs.0');
							$('#width').val('');	
							}
						 }
						    if( (value <= max_height) && (value != 0) && (value != '') ){
								var input_width = ratio*value; 	
								$('#width').val(Math.round(input_width));
								setTimeout(function(){
								calculate_cost('Customize Size');
								},200);
							}else{
							$('#width').val('');
							$('#finished_size').html('<p style="color:red;">Choose Some Minimum Size </p>');	
							}
						});
					})	
			</script>
<?php 
 if($this->session->userdata('userid')){
		$Obj=new Frontend();
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$splitUrl=split('/', $_SERVER['REQUEST_URI']);
		$ipaddress = getenv('HTTP_CLIENT_IP');
		$Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
?>
<?php echo $_POST['category'];?>
<script>
    $(window).on('load',function() {
        var options =
        {
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: 'avatar.png'
        }
        var cropper;
        $('#file1').on('click', function(){
         options.imgSrc = $('#get_img').val();
		 cropper = $('.imageBox').cropbox(options);  
		})
        $('#btnCrop').on('click', function(){
            var img = cropper.getDataURL()
            $('#large_img2').attr('src',img);
            $('#crop_image').hide();
            
        })
	});
	$(window).on('load',function(){
		$(document).on('click', '.panel-heading span.clickable', function(e){
			var $this = $(this);
				if(!$this.hasClass('panel-collapsed')) {
					$this.parents('.panel').find('.panel-body').slideUp();
					$this.addClass('panel-collapsed');
					$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
				} else {
					$this.parents('.panel').find('.panel-body').slideDown();
					$this.removeClass('panel-collapsed');
					$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
				}
		})
	});
</script>
	<script>
		function feedback_of_addtocart(a){
		$('.frame-step-header-text').html('<span class="glyphicon glyphicon-ok" style="margin-right:10px;"></span>Item Added To Cart.');
		}
	</script>
	<?php //$continue_shopping_redirect = $_SESSION['user_info'];?>
<div class="frame-step-header-container" style="display:none">
    <div class="container frame-step-header-wrapper">
        <div class="frame-step-header-text"></div>
			<div class="frame-step-button-wrapper">
				<div class="frame-step-continue-shopping-button">
					<a style="color:white" href="<?=base_url()?>">CONTINUE SHOPPING</a>
				</div>
            <div class="frame-step-proceed-to-cart-button">
              <a style="color:white" href="<?=base_url().'cart/cart_view'?>"> PROCEED TO CART</a>
            </div>
        </div>
    </div>
</div>
<style>
	.frame-step-header-container{background-color:#ececec;width:100%;padding:10px 0}.frame-step-header-text{color:#6abb4c;float:left;font-family:BebasNeueRegular,Helvetica,Arial,sans-serif;font-size:42px;letter-spacing:-.5px;position:relative}.frame-step-continue-shopping-button,.frame-step-proceed-to-cart-button{color:#fff;cursor:pointer;font-size:15px;font-weight:700;position:relative;text-align:center}.frame-step-button-wrapper{float:right;padding:6px 0;position:relative}.frame-step-continue-shopping-button{background-color:#888;float:left;margin-right:14px;min-width:100px;padding:13px 16px}.frame-step-proceed-to-cart-button{background-color:#ed9134;float:right;min-width:180px;padding:12px}.container.frame-step-header-wrapper{border:none;margin:0 auto}
</style>

<script>
    function price_details(){
		$('#price_detail').show();	
	}
	
	function remove_pricing(){
	$('#price_detail').hide();	
	}
	
    function buffer_show(){
    $('#load_buffer').show();    
    }
    function buffer_hide(){
    $('#load_buffer').hide();    
    }
</script>
<script>
var _0xd968=["\x6D\x79\x44\x72\x6F\x70\x7A\x6F\x6E\x65","\x6F\x70\x74\x69\x6F\x6E\x73","\x23\x73\x75\x62\x6D\x69\x74\x2D\x61\x6C\x6C","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x63\x6C\x69\x63\x6B","\x70\x72\x6F\x63\x65\x73\x73\x51\x75\x65\x75\x65","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x71\x75\x65\x75\x65\x63\x6F\x6D\x70\x6C\x65\x74\x65","\x73\x68\x6F\x77","\x23\x6C\x6F\x61\x64\x5F\x62\x75\x66\x66\x65\x72","\x68\x69\x64\x65","\x23\x64\x72\x6F\x70\x7A\x6F\x6E\x65\x5F\x69\x6D\x61\x67\x65\x73","\x72\x65\x6D\x6F\x76\x65\x41\x6C\x6C\x46\x69\x6C\x65\x73","\x23\x6D\x79\x2D\x64\x72\x6F\x70\x7A\x6F\x6E\x65","\x66\x6F\x72\x45\x6C\x65\x6D\x65\x6E\x74","\x23\x73\x65\x73\x73\x69\x6F\x6E\x5F\x69\x6D\x61\x67\x65\x73","\x6C\x6F\x61\x64","\x6F\x6E","\x72\x65\x6D\x6F\x76\x65\x64\x66\x69\x6C\x65","\x6C\x65\x6E\x67\x74\x68","\x66\x69\x6C\x65\x73","\x23\x6D\x73\x67","\x61\x64\x64\x65\x64\x66\x69\x6C\x65","\x73\x69\x7A\x65","\x72\x65\x6D\x6F\x76\x65\x46\x69\x6C\x65","","\x50\x6C\x65\x61\x73\x65\x20\x55\x70\x6C\x6F\x61\x64\x20\x49\x6D\x61\x67\x65\x73\x20\x47\x72\x65\x61\x74\x65\x72\x20\x54\x68\x61\x6E\x20\x35\x30\x30\x6B\x42","\x65\x72\x72\x6F\x72"];Dropzone[_0xd968[1]][_0xd968[0]]= {autoProcessQueue:false,init:function(){var _0x9521x1=document[_0xd968[3]](_0xd968[2]);myDropzone= this;_0x9521x1[_0xd968[6]](_0xd968[4],function(){myDropzone[_0xd968[5]]()});this[_0xd968[17]](_0xd968[7],function(_0x9521x2){$(_0xd968[9])[_0xd968[8]]();$(_0xd968[11])[_0xd968[10]]();Dropzone[_0xd968[14]](_0xd968[13])[_0xd968[12]](true);$(_0xd968[15])[_0xd968[16]](_0xd968[15]);buffer_show();setTimeout(function(){$(_0xd968[9])[_0xd968[10]]()},3000)});this[_0xd968[17]](_0xd968[18],function(_0x9521x2){if((myDropzone[_0xd968[20]][_0xd968[19]])== 0){$(_0xd968[21])[_0xd968[8]]()}});this[_0xd968[17]](_0xd968[22],function(_0x9521x2){if((myDropzone[_0xd968[20]][_0xd968[19]]+ 1)> 0){$(_0xd968[21])[_0xd968[10]]()};if(_0x9521x2[_0xd968[23]]< 500000){$(_0xd968[11])[_0xd968[10]]();this[_0xd968[24]](_0x9521x2);swal({title:_0xd968[25],text:_0xd968[26],type:_0xd968[27],timer:1000});setTimeout(function(){dropzone_call()},1000)}})}}
</script>
<script type="text/javascript">


	function addTomyupload()	{
		var paper_surface = $('#paper_surface').val();
		var final_frame_size  = '';
		if($('#click').html() == 'canvas_click')
		{
			var framed = $('#finished_size').html();
			framed = framed.split('"');
			frameheight = framed[1].split('X');
			final_frame_size  = ''+framed[0]+'X'+frameheight[1]; 
		}
		else
		{
			var framed = $('#finished_size').html();
			framed = framed.split('"');
			frameheight = framed[1].split('X');
			final_frame_size = ''+framed[0]+'X'+frameheight[1];
		}
		var mount_color = $('#mount_color').html();
		var data = '';
		if($('#click').html() == 'print_only')
		{
			data = 'only_print';   
		}
		else if($('#click').html() == 'canvas_click')
		{
			data = 'canvas_only';
		}
		else
		{
			data = '';
		}
		var only_print = data;
		var glasses = $('#glass_type').html();
		var glasses_coste = $('#glass_price').html();	  
		glasses_coste = glasses_coste.split('.');
		glasses_coste = glasses_coste[1];
		var gettotal = $('.actual_price').html();
		gettotal = gettotal.split('.');
		var total_price = gettotal[1];
		var MountCost = $('#MountCost').html();
		MountCost = MountCost.split('.');
		MountCost = MountCost[1];
		var FrameCost = '';
		if($('#click').html() == 'canvas_click')
		{
			FrameCost = $('#CanvasCost').html();
		}
		else if($('#click').html() == 'frame_click')
		{
			FrameCost = $('#FrameCost').html();
		}
		FrameCost = FrameCost.split('.'); 
		FrameCost = FrameCost[1];
		var print_size = '';
		var size = $('#sizes').val();
		if( size == 'Customize Size')
		{
			if( ($('#width').val() == 0) && ($('#height').val() == 0) )
			{
				print_size = '0X0';	
			}
			else
			{ 
				print_size = $('#width').val()+'X'+ $('#height').val();
			}	
		}
		else
		{
			print_size = $('#sizes').val();
		}
		var price = $('#print_price').html();
		var id = $('#get_img').val();
		id = id.split('image');
		var new_id = id[2].split('.');
		var image_id = new_id[0];
		var image_type = new_id[1];
		var user_id = '<?= $this->session->userdata('userid')?>';
		var mat1_size = $('#mount_size').html();
		var mat1_color = $('#mount_color').html();
		var frame_color = $('#frame_color').val();
		if( $('#click').html()=='canvas_click')
		{
			frame_color = 'Streched Canvas Gallary Wrap';	
		}
		else
		{
			frame_color = frame_color; 
		}
		var mount_name = $('#mount_code').val();
		var frameSize = $('#frame_size').html();
		var img_name = $('#get_img').val();
		img_name = img_name.split('/');
		var image_namee = img_name[7];//.split('.');
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>index.php/frontend/frameit_myupload",
			data: "glasses_coste="+glasses_coste+"&glasses="+glasses+"&FrameCost="+FrameCost+"&MountCost="+MountCost+"&total_price="+total_price+"&user_id="+user_id+"&img_id="+image_id+"&image_type="+image_type+"&mat_color="+mount_name+"&mount_color="+mount_color+"&mat_size="+mat1_size+"&frame_color="+frame_color+"&frameSize="+frameSize+"&images_size="+print_size+"&images_price="+price+"&paper_surface="+paper_surface+"&final_frame_size="+final_frame_size+"&image_namee="+image_namee+'&print_v='+only_print,
			alert(data);
			success:function(data)  
			{    
			swal({
			title: 'CART STATUS',
			text: 'Item Added Successfully',
			timer: 1000
			})
			setTimeout(function()	{
				$('.frame-step-header-container').show();
				feedback_of_addtocart(data);
				$('html, body').animate({ scrollTop: 0 }, 'fast');
			},1000);
			var cartItem = parseInt($('.cart_add').html());
			cartItem++;
			$('.cart_add').html(cartItem);
			}
		}); 
	}   // end function addTomyupload



    function addToCart(){
	var paper_surface = $('#paper_surface').val();
	var final_frame_size  = '';
	if($('#click').html() == 'canvas_click'){
		var framed = $('#finished_size').html();
		framed = framed.split('"');
		frameheight = framed[1].split('X');
		final_frame_size  = ''+framed[0]+'X'+frameheight[1]; 
	}else{
		var framed = $('#finished_size').html();
		framed = framed.split('"');
		frameheight = framed[1].split('X');
		final_frame_size = ''+framed[0]+'X'+frameheight[1];
	}
	  var mount_color = $('#mount_color').html();
	  var data = '';
	  if($('#click').html() == 'print_only'){
		data = 'only_print';   
	  }else if($('#click').html() == 'canvas_click'){
		  data = 'canvas_only';
	  }else{
		  data = '';
	  }
	  var only_print = data;
	  var glasses = $('#glass_type').html();
	  var glasses_coste = $('#glass_price').html();	  
	  glasses_coste = glasses_coste.split('.');
	  glasses_coste = glasses_coste[1];
	  var gettotal = $('.actual_price').html();
	  gettotal = gettotal.split('.');
	  var total_price = gettotal[1];
	  var MountCost = $('#MountCost').html();
	  MountCost = MountCost.split('.');
	  MountCost = MountCost[1];
	  var FrameCost = '';
	  if($('#click').html() == 'canvas_click'){
	  FrameCost = $('#CanvasCost').html();
	  }else if($('#click').html() == 'frame_click'){
	  FrameCost = $('#FrameCost').html();
	  }
	  FrameCost = FrameCost.split('.'); 
	  FrameCost = FrameCost[1];
	  var print_size = '';
	  var size = $('#sizes').val();
	 if( size == 'Customize Size'){
		if( ($('#width').val() == 0) && ($('#height').val() == 0) ){
			print_size = '0X0';	
		}else { 
		print_size = $('#width').val()+'X'+ $('#height').val();
		}	
		}else{
		 print_size = $('#sizes').val();
		}
			var price = $('#print_price').html();
			var id = $('#get_img').val();
		    id = id.split('image');
			var new_id = id[2].split('.');
			var image_id = new_id[0];
			var image_type = new_id[1];
			var user_id = '<?= $this->session->userdata('userid')?>';
			var mat1_size = $('#mount_size').html();
			var mat1_color = $('#mount_color').html();
		    var frame_color = $('#frame_color').val();
			  if( $('#click').html()=='canvas_click'){
				frame_color = 'Streched Canvas Gallary Wrap';	
			  }else{
				frame_color = frame_color; 
			  }
			var mount_name = $('#mount_code').val();
			var frameSize = $('#frame_size').html();
			var img_name = $('#get_img').val();
			img_name = img_name.split('/');
			var image_namee = img_name[7];//.split('.');
			//alert(paper_surface+','+final_frame_size+','+mount_color+','+only_print+','+glasses+','+glasses_coste+','+total_price+','+MountCost+','+FrameCost+','+print_size+','+image_id+','+image_type+','+user_id+','+mat1_size+','+mat1_color+','+frame_color+','+frame_name+','+mount_name+','+frameSize+','+image_namee);
			$.ajax({
				 type: "POST",
				 url: "<?=base_url()?>index.php/frontend/frameit_addtocart",
				 data: "glasses_coste="+glasses_coste+"&glasses="+glasses+"&FrameCost="+FrameCost+"&MountCost="+MountCost+"&total_price="+total_price+"&user_id="+user_id+"&img_id="+image_id+"&image_type="+image_type+"&mat_color="+mount_name+"&mount_color="+mount_color+"&mat_size="+mat1_size+"&frame_color="+frame_color+"&frameSize="+frameSize+"&images_size="+print_size+"&images_price="+price+"&paper_surface="+paper_surface+"&final_frame_size="+final_frame_size+"&image_namee="+image_namee+'&print_v='+only_print,
				 success:function(data)  
				 {    
					swal({
						  title: 'CART STATUS',
						  text: 'Item Added Successfully',
						  timer: 1000
						})
					setTimeout(function(){
					$('.frame-step-header-container').show();
					 feedback_of_addtocart(data);
					 $('html, body').animate({ scrollTop: 0 }, 'fast');
					},1000);
					var cartItem = parseInt($('.cart_add').html());
					cartItem++;
					$('.cart_add').html(cartItem);
				 }
			}); 
		}   // end function
 
	  		
	function paper_surface(id){
		var td = '';
		$('#paper_surface').html(td);
		if(id=='framing'){
			td = '<option value="Enhanced Matt">Enhanced Matt</option>';
			td += '<option value="Photography Paper Glossy">Photography Paper Glossy</option>';
			td += '<option value="Photographic Luster">Photographic Luster</option>';
			td += '<option value="Fine Art Luster">Fine Art Luster</option>';
			td += '<option value="Matt Fine Art">Matt Fine Art</option>';
			td += '<option value="Glossy Fine Art">Glossy Fine Art</option>';
			td += '<option value="Photo Luster">Photo Luster</option>';
			td += '<option value="Photo Matt">Photo Matt</option>';
			td += '<option value="Vinyl">Vinyl</option>';
		}else if(id=='print_only'){
			td = '<option value="Enhanced Matt">Enhanced Matt</option>';
			td += '<option value="Photography Paper Glossy">Photography Paper Glossy</option>';
			td += '<option value="Photographic Luster">Photographic Luster</option>';
			td += '<option value="Fine Art Luster">Fine Art Luster</option>';
			td += '<option value="Matt Fine Art">Matt Fine Art</option>';
			td += '<option value="Glossy Fine Art">Glossy Fine Art</option>';
			td += '<option value="Photo Luster">Photo Luster</option>';
			td += '<option value="Photo Matt">Photo Matt</option>';
			td += '<option value="Vinyl">Vinyl</option>';
			td += '<option value="Photo Canvas">Photo canvas</option>';
			td += '<option value="Canvas">Canvas</option>';
			td += '<option value="Daguerre Canvas">Daguerre Canvas</option>';
		}else{
			td  = '<option value="Canvas">Canvas</option>';
			td += '<option value="Photo Canvas">Photo canvas</option>';
			td += '<option value="Daguerre Canvas">Daguerre Canvas</option>';
		}
	    $('#paper_surface').html(td);
	}

	function calculate_cost(value){
		$(document).ready(function(){
		if(value == 'Customize Size'){
			$('.dimention').show();
			 if( $('#width').val() != 0 && $('#height').val() != 0){
				$('#price_details').attr('onclick','price_details();return false;');
			} 
		}else{
			$('.dimention').hide();
			$('#price_details').attr('onclick','price_details();return false;');
		}
		if($('#sizes').val() == 'Customize Size'){
			$('.dimention').show();
			 if( $('#width').val() != 0 && $('#height').val() != 0){
				$('#price_details').attr('onclick','price_details();return false;');
			} 
		}	
			
			var size = ''+$('#sizes').val();
			var width = $('#width').val();
			var height = $('#height').val();
			var select = '';
			var dimen = size.split('X');
			 if($('#sizes').val() != 'Customize Size'){
			 dimen[0] = parseInt(dimen[0]);
			 dimen[1] = parseInt(dimen[1]);
			 }else if($('#sizes').val() == 'Customize Size'){
			 dimen[0] = width;
			 dimen[1] = height;
			 }
			 dimen[2] = parseInt(dimen[0]) + parseInt(4);
			 dimen[3] = parseInt(dimen[1]) + parseInt(4);
 			if( $("#museum").prop("checked")== true){
				select = 'museum';	
			}else{
				select = 'gallery';
			}
		    var paper = $('#paper_surface').val();
			$('#print_paper').html(paper);
			var role_size = '';
			var rates = '';
			
			if(paper == 'Enhanced Matt'){
				rates = 1.2;
			}else if(paper == 'Photography Paper Glossy'){
				rates = 1;
			}else if(paper == 'Photographic Luster'){
				rates = 0.7;
			}else if(paper == 'Fine Art Luster'){
				rates = 1.6;
			}else if(paper == 'Matt Fine Art'){
				rates = 1;
			}else if(paper == 'Glossy Fine Art'){
				rates = 2.25;
			}else if(paper == 'Photo Matt'){
				rates = 1.5;
			}else if(paper == 'Photo Luster'){
				rates = 1.5;
			}else if(paper == 'Vinyl'){
				rates = 1;
			}else if(paper == 'Canvas'){
				rates = 1.25;
			}else if(paper == 'Photo Canvas'){
				rates = 2.5;
			}else if(paper == 'Daguerre Canvas'){
				rates = 3.5;
			} 
			var glass_type='';
			if( $('#check1').prop('checked') ){
				glass_type = 'Acrylic';
			}else{
				glass_type = 'Regular';
			}
			$('#glass_type').html(glass_type);
			var mount = $('#mount_width').val();
			$.ajax({
			  type:'post',
              url:'<?=base_url()?>index.php/frontend/get_web_price_detail',
			  data: {paper_type: paper,type: glass_type},
			  success:function(data){
			  $('#glass_rate').val(data);
			 c_width = parseInt(dimen[2]);
			c_height = parseInt(dimen[3]);
			
			if($('#click').html() == 'canvas_click' ){
			c_width = parseInt(dimen[0]) + parseInt(4);
			c_height = parseInt(dimen[1]) + parseInt(4);
			}else if($('#click').html() == 'frame_click'){
			c_width = parseInt(dimen[0]) + parseInt(1);
			c_height = parseInt(dimen[1]) + parseInt(1);	
			}else{
			c_width = parseInt(dimen[0]);
			c_height = parseInt(dimen[1]);
			}
			 
	         var cost = '';
			 if(Number(c_width)<=17 && Number(c_height)<=17){
				   role_size = 17;
			 }else if(c_width==c_height){
			 if(c_width<=17){
			   role_size = 17;
			 }
			  else if(c_width<=24 && c_width>17){
			   role_size = 24;
			}
			else if(c_width<=44 && c_width>24){
			 role_size = 44;
			}
			else if(c_width<=64 && c_width>44){
			 role_size = 64;
			}
		 }
		else if((Number(c_width)<=24 && Number(c_width)>17 ) && (Number(c_height) <=24 && Number(c_height) >17)){
		  role_size = 24;
       }
        else if((Number(c_width)>17 && Number(c_width)<24 && Number(c_height)>24) || (Number(c_height)>17 && Number(c_height)<24 && Number(c_width)>24)){
		   role_size = 24;
		}else if((Number(c_width)>17 && Number(c_width)<24) || (Number(c_height)>17 && Number(c_height)<24)){
			  role_size = 17;
		}else if(Number(c_width)<=44 && Number(c_width) >24 && (Number(c_height) >24 && Number(c_height)<=44 )){
             role_size = 44;
        }else if((Number(c_width)>24 && Number(c_width)<44)|| (Number(c_height)>24 && Number(c_height)<44)){
		  role_size = 24;
		}else if((Number(c_width)>44 && Number(c_width)<64) || (Number(c_height)>44 && Number(c_height)<64)){
            role_size = 44;
        }else if( (Number(c_width)== 17 && Number(c_height) == 24) || (Number(c_width) == 24 && Number(c_height) == 17) ){
			role_size = 17;
		}else if( (Number(c_width)== 24 && Number(c_height) == 36) || (Number(c_width) == 36 && Number(c_height) == 24) ){
			role_size = 24;
		}else if( (Number(c_width)== 36 && Number(c_height) == 44) || (Number(c_width) == 44 && Number(c_height) == 36) ){
			role_size = 36;
		}else if( (Number(c_width)== 44 && Number(c_height) == 64) || (Number(c_width) == 64 && Number(c_height) == 44) ){
			role_size = 44;
		}else if( (Number(c_width)>= 60 && Number(c_height) == 60) ){
			role_size = 60;
		}
		if((Number(c_width) && Number(c_height))<=(role_size)){
		  if(c_width < c_height){
		   cost = c_width*role_size*rates;
		  }else if(c_width > c_height){
		   cost = c_height*role_size*rates;
		  }
		}
	 if(Number(c_width)>Number(role_size)|| Number(c_height)>Number(role_size)){
		if(c_width>role_size){
		 cost = (c_width*parseInt(role_size)*rates);
		}else if(c_height>role_size){
		 cost = (c_height*parseInt(role_size)*rates);
		}
	}
	if(c_height==c_width){
	  cost = (c_height*parseInt(role_size)*rates);
    }
		$('#print_price').html(Math.round(cost,2));
		$('#print_sizes').html(dimen[0]+'"X'+dimen[1]+'"');
		$('#frame_type').html('Streched Canvas Gallary Wrap');
		var newwidth1 = parseInt(c_width)+(1*2);
		var	newlenght1 = parseInt(c_height)+(1*2);
		var CanvasFrameCost = parseInt((parseInt(parseInt(newwidth1)*parseInt(2)) + parseInt(parseInt(newlenght1)*parseInt(2)))*75)/12;
		CanvasFrameCost = Math.round(parseInt(CanvasFrameCost),2);
		$('#CanvasCost').html("Rs."+ CanvasFrameCost);	
			
		if(paper == 'Photographic Luster'){
				c_width = parseInt(dimen[0]) + 0.5;
				c_height = parseInt(dimen[1]) + 0.5;
				 roll_size = 8;
				 if(c_width >= c_height){
				 	if(c_height <=8){
						if(c_width<=39){
							cost = roll_size * c_width * rates; 
							$('#print_price').html(Math.round(cost,2));
						
						}else{
							cost = 0;
							$('#finished_size').html('Please Select Some Other Sizes');
						}	
					}else{
						cost = 0;
						$('#finished_size').html('Please Select Some Other Sizes');
						$('.actual_price').html('Rs.0');
					}
				 }else{
					 if(c_width <= 8){
						 if(c_height <=39){
							cost = roll_size * c_height * rates;
							$('#print_price').html(Math.round(cost,2));
						 }else{
						cost = 0;
						$('#finished_size').html('Please Select Some Other Sizes');
						$('.actual_price').html('Rs.0');
						}
					}else{
					cost = 0;	
					$('#finished_size').html('Please Select Some Other Sizes');
					$('.actual_price').html('Rs.0');	
				}
			}
		}
		
		if($('#click').html() == 'print_only' ){
			if($('#sizes').val() == 'Customize Size'){
				if( ($('#width').val() == 0) && ($('#height').val()== 0) ){
					$('.actual_price').html('Rs.0');
					$('#finished_size').html('Choose Other Size');
					$('#price_details').attr('onclick','');
					$('#price_details').attr('href','JavaScript:void(0);');
				}else{
					$('#finished_size').html(Math.round(dimen[0],2)+'"X'+Math.round(dimen[1],2)+'" Print Only ');
				}
			}else{ 
			$('#finished_size').html(Math.round(dimen[0],2)+'"X'+Math.round(dimen[1],2)+'" Print Only ');
			}
			$('.actual_price').html('Rs.'+Math.round(cost,2));
		}else if($('#click').html() == 'canvas_click' ){
			if($('#sizes').val() == 'Customize Size'){
				if( ($('#width').val() == 0) && ($('#height').val()== 0) ){
					$('.actual_price').html('Rs.0');
					$('#finished_size').html('Choose Other Size');
					$('#price_details').attr('onclick','');
					$('#price_details').attr('href','JavaScript:void(0);');
				}else{
					$('#finished_size').html(Math.round(dimen[2],2)+'"X'+Math.round(dimen[3],2)+'" Canvas Print | '+Math.round(dimen[0],2)+'"X'+Math.round(dimen[1],2)+'" Canvas Print without border');
					var actual_price = cost + CanvasFrameCost;
					$('.actual_price').html("Rs."+ Math.round(actual_price,2));
				}
			}else{ 
				$('#finished_size').html(Math.round(dimen[2],2)+'"X'+Math.round(dimen[3],2)+'" Canvas Print | '+Math.round(dimen[0],2)+'"X'+Math.round(dimen[1],2)+'" Canvas Print without border');
				var actual_price = cost + CanvasFrameCost;
				$('.actual_price').html("Rs."+ Math.round(actual_price,2));
			}
			
    	}else if($('#click').html() == 'frame_click'){
			frame_pricing('');
			setTimeout(function(){
			if($('#sizes').val() == 'Customize Size'){
				if( $('#width').val() == 0 && $('#height').val() == 0){
						$('.actual_price').html('Rs.0');
						$('#finished_size').html('Choose Other Size');
						$('#price_details').attr('onclick','');
						$('#price_details').attr('href','JavaScript:void(0);');
				}
			}
		  },100);	
		}else{
			setTimeout(function(){
			$('#finished_size').html('Choose Other Size');
			},100);
		}
	  }
	});
  });
}

	function frame_pricing(){
	    var size = ''+$('#sizes').val();
			var width = $('#width').val();
			var height = $('#height').val();
			var select = '';
			var dimen = size.split('X');
			dimen[0] = parseInt(dimen[0]);
			dimen[1] = parseInt(dimen[1]);
	        if( $('#width').val() == 0 && $('#height').val() == 0 ){
				$('.actual_price').html('Rs.0');
			}
			if($('#sizes').val() == 'Customize Size'){
			 dimen[0] = $('#width').val();
			 dimen[1] = $('#height').val();
			}		
			var frame_size = Math.round(parseInt($('#frame_size').html())/25);
			var frame_rate  = $('#frame_rate').val();
			var mount = $('#mount_width').val();
			$('#mount_size').html($('#mount_width').val() + '"');
			var glass_rate = $('#glass_rate').val();
			var mount_rate = $('#mount_rate').val();
			if(frame_size>=1){
			var framewidth = parseInt(dimen[0])+ parseInt(2) * (parseInt(mount) + frame_size);
			var frameheight = parseInt(dimen[1])+ parseInt(2)* (parseInt(mount) + frame_size);
			var frame_perimeter =  parseInt(2)*(framewidth) + parseInt(2)*(frameheight); 
			var framing_cost = parseInt(parseInt(frame_perimeter) * $('#frame_rate').val()/parseInt(12)); 
			$('#FrameCost').html("Rs."+framing_cost);
			var glass_cost = parseInt(framewidth) * parseInt(frameheight) * glass_rate;
			glass_cost = Math.round(parseInt(glass_cost),2);
			$('#glass_price').html("Rs."+glass_cost);
			var mountwidth = parseInt(mount) + parseInt(dimen[0]);  
			var mountheight = parseInt(mount) + parseInt(dimen[1]);
			var mount_cost = mountwidth * mountheight * mount_rate; 
			$('#MountCost').html("Rs."+ Math.round(mount_cost));
				if($('#sizes').val() == 'Customize Size'){
					if( ($('#width').val() == 0) && ($('#height').val()== 0) ){
						$('.actual_price').html('Rs.0');
						$('#finished_size').html('Choose Other Size');
					}else{
						$('#finished_size').html(Math.round(framewidth,2)+'"X'+Math.round(frameheight,2)+'" Framed Print');
					}
				}else{ 
				$('#finished_size').html(Math.round(framewidth,2)+'"X'+Math.round(frameheight,2)+'" Framed Print');
				}
				var print_price = $('#print_price').html();
				if($('#remove-mount').prop('checked') == 'true'){
						var actual_price = parseInt(print_price) + parseInt(framing_cost) + parseInt(glass_cost);
						$('.actual_price').html("Rs."+Math.round(actual_price));
				}else{
					var actual_price = parseInt(print_price) + parseInt(framing_cost) + parseInt(glass_cost) + parseInt(mount_cost);
					setTimeout(function(){
						$('.actual_price').html("Rs."+ Math.round(actual_price));
						},100);    
				}
    		}else{
			var framewidth = parseInt(dimen[0])+  parseInt(2) * $('#frame_inches').val();
			var frameheight = parseInt(dimen[1])+ parseInt(2) * $('#frame_inches').val();
			var frame_perimeter =  2*(framewidth) + 2*(frameheight); 
			var framing_cost = (frame_perimeter * parseInt($('#frame_rate').html()))/12; 
			$('#MountCost').hide();
			var glass_cost = parseInt(framewidth) * parseInt(frameheight)* parseInt(glass_rate);
			glass_cost = Math.round(parseInt(glass_cost),2);
			$('#glass_price').html(glass_cost);
			$('#finished_size').html(framewidth+'"X'+frameheight+'" Framed Print');
            var actual_price = parseInt(framing_cost) + parseInt(glass_cost);
			$('.actual_price').html('Rs.'+actual_price);			
			}
	}
	
	
	function frame_details(rate,size,frame_name,color){
		$('#frame_size').html(size);
		$('#f_name').html(frame_name);
		$('#frame_rate').val(rate);
		$('#frame_inches').val( Math.round(parseInt(size)/25));
		$('#frame_color').val(frame_name);
		calculate_cost('');
	    frame_pricing();
	}
	
	function mount_details(rate,mount_color,code){
		$('#mount_color').html(mount_color);
		$('#mount_rate').val(rate);
		$('#mount_code').val(code);
		calculate_cost('');
	    frame_pricing();
	}
	function change_image(src){
		$('#get_img').val(src);
		var k  =  src.split('/');       
		var path = '';
		for(var p=0; p<=6; p++){
		   path += k[p]+'/';
		}
		path +='original/'+k[7];
		var source = src;
		$(document).ready(function(){
		$('#large_img').attr("src", src);
		$('#large_img2').attr("src", src);
		$.ajax({
			  type:'post',
              url:'<?=base_url()?>index.php/frontend/result',
			  data: {src : path, newpath : source},
			  success:function(data) {
                var obj = JSON.parse(data);
				console.log(obj);
				var str = ''+obj;
				var res = str.split(",");
				var td ='';
				for(var i=0;i<res.length-2;i++){
				var str1 = res[i]; 
				var dim = str1.split('X');
				var width = dim[0];
				var height = dim[1];
				td += '<option value="'+width+'X'+height+'">'+width+'"X'+height+'"</option>';
				}
				td += '<option value="Customize Size">Customize Size</option>';
				$('#sizes').html(td);
				calculate_cost('');
				var dimention = obj[obj.length-2];  
				console.log(obj);
				var dimentions = dimention.split('X');
				if(dimentions[0] >= dimentions[1]){
				$('#horizonal_height').html(dimentions[1]);
				var front_width = Math.round(dimentions[0]*0.825);
				var front_height = Math.round(dimentions[1]*0.83388); 	
				front(front_width,front_height); 
				var right_sourceX = Math.round(dimentions[0]*0.825);
				var right_height = Math.round(dimentions[1]*0.83388);
				var right_width = dimentions[0];
				right(right_width,right_height,right_sourceX);
				$('#myCanvas').attr('height',right_height+'px');
				$('#myCanvas').attr('width',right_width+'px');
				$('#myCanvas').css('width','111px');
				$('#myCanvas').css('height','100%');
				var bottom_width = Math.round(dimentions[0]*0.825);
				var bottom_height = dimentions[1];
				var sourceY = Math.round(dimentions[1]*0.83388);
				bottom(bottom_width,bottom_height,sourceY); 
				$('#myCanvas3').attr('width',bottom_width+'px');
				$('#myCanvas3').attr('height',bottom_height+'px');
				$('#myCanvas3').css('height','111px');
				$('#type').html('horizontal');
				} else {
				$('#vertical_width').html(dimentions[0]);
				var front_width = Math.round(dimentions[0]*0.79381);
				var front_height = Math.round(dimentions[1]*0.77220); 	
				front(front_width,front_height);  
				var right_sourceX = Math.round(dimentions[0]*0.79381);
				var right_height = Math.round(dimentions[1]*0.77220);
				var right_width = dimentions[0]*0.20618;
				right(right_width,right_height,right_sourceX);
				$('#myCanvas').attr('height',right_height+'px');
				$('#myCanvas').attr('width',right_width+'px');
				$('#myCanvas').css('width','20px');
				var bottom_width = Math.round(dimentions[0]*0.79381);
				var bottom_height = dimentions[1]*0.22779;
				var sourceY = Math.round(dimentions[1]*0.77220);
				bottom(bottom_width,bottom_height,sourceY); 
				$('#myCanvas3').attr('width',bottom_width+'px');
				$('#myCanvas3').attr('height',bottom_height+'px'); 
				$('#myCanvas3').css('height','20px');
				$('#type').html('vertical');
				}
				$('.dimention').hide();
			  }
			});
		});
	}
	function remove_image(name){
		$(document).ready(function(){
		var td_inner='';
		$.ajax({
			type:"post",
			url:'<?=base_url()?>index.php/frontend/image_delete',
			data:{name : name},
			beforeSend: function(){
			$('#load_buffer').show();
			},
			success: function(data){
			var data = JSON.parse(data);
			swal(
			  	'',
			  	data,
			  	'success',
			)
			var length = data.length-1;
			},
			complete: function(){
				var status = get_session_image();
					if(status == true){
					$('#crop_image').hide();
					setTimeout(
                    function(){
                    $('#load_buffer').hide();
					 }, 1000); 
					}
				}
			});
		});
	}
	
	function crop_wrap(){
	   var width; 
	   var height;
	    if($('#type').html == 'vertical'){
	    width = 308;
	    height = 400;
	    }else{
	    width  = 300;
	    height = 260;   
	    }
	    if(width >= dimentions[1]){
				var front_width = Math.round(width*0.825);
				var front_height = Math.round(height*0.83388); 	
				front(front_width,front_height); 
				var right_sourceX = Math.round(width*0.825);
				var right_height = Math.round(height*0.83388);
				var right_width = width;
				right(right_width,right_height,right_sourceX);
				$('#myCanvas').attr('height',right_height+'px');
				$('#myCanvas').attr('width',right_width+'px');
				$('#myCanvas').css('width','111px');
				$('#myCanvas').css('height','100%');
				var bottom_width = Math.round(width*0.825);
				var bottom_height = height;
				var sourceY = Math.round(height*0.83388);
				bottom(bottom_width,bottom_height,sourceY); 
				$('#myCanvas3').attr('width',bottom_width+'px');
				$('#myCanvas3').attr('height',bottom_height+'px');
				$('#myCanvas3').css('height','111px');
				$('#type').html('horizontal');
				} else {
				var front_width = Math.round(width*0.79381);
				var front_height = Math.round(height*0.77220); 	
				front(front_width,front_height);  
				
				var right_sourceX = Math.round(width*0.79381);
				var right_height = Math.round(height*0.77220);
				var right_width = width*0.20618;
				right(right_width,right_height,right_sourceX);
				$('#myCanvas').attr('height',right_height+'px');
				$('#myCanvas').attr('width',right_width+'px');
				$('#myCanvas').css('width','20px');
				var bottom_width = Math.round(width*0.79381);
				var bottom_height = height*0.22779;
				var sourceY = Math.round(height*0.77220);
				bottom(bottom_width,bottom_height,sourceY); 
				$('#myCanvas3').attr('width',bottom_width+'px');
				$('#myCanvas3').attr('height',bottom_height+'px'); 
				$('#myCanvas3').css('height','20px');
				$('#type').html('vertical');
				}
	    
	}
	
	function get_session_image(){
		$(document).ready(function(){
	 var img = 0;
	 var session_id = '<?php echo $_SESSION['user_info'];?>';
	 var status = '';
	 var url = "<?php echo base_url().'application/views/frontend/upload_images/';?>";		
			$.ajax({
            type:"post",
			url:'<?=base_url()?>index.php/frontend/image_size',
			data:{url,session_id}, 
			beforeSend: function(){
				$('#load_buffer').show();
			},
			success: function(data){
				var imagedata = JSON.parse(data);
				imagedata = ''+imagedata; 
				   if(imagedata == 'null' ){
				       window.location.href = 'photostoframe';
				   }
				var image = imagedata.split(',');		
				var total_image = image.length; 
				var total_slide = total_image/4; 	
				var rem_slide = total_image%4;
					if(total_image<=4){
						total_slide = 1; 
					}else{
						if(rem_slide){
							total_slide = Math.floor(total_slide)+1;		
						}else{
							total_slide = Math.floor(total_slide);	
						}
					}
				var slides,i=0;
				var value = 0;
				var td_inner=''; 	
				td_inner += '<div class="product-detail-content ">';
 				td_inner += '<div class="carousel carousel-showmanymoveone slide" id="itemslider1">';
 				td_inner += '<div class="carousel-inner">';	
					for(var slides=0;slides<=total_slide-1;slides++){
					if(slides ==0){
						td_inner += '<div class="item active">';
					}else{
						td_inner += '<div class="item">';
					}
					for(i=0;i<4;i++){
						if(value<total_image){
							var k = image[value].split('*');
							var get_data = k[1].split('x');
							var get_data_width  = get_data[0];
							var get_data_height = get_data[1];
							if(get_data_width > get_data_height){
								aspect_ratio = get_data_height/get_data_width;
								new_width = 130;
								new_height = Math.round(aspect_ratio*130);
							}else if(get_data_height > get_data_width ){
								aspect_ratio = get_data_width/get_data_height;
								new_height = 130;
								new_width = Math.round(aspect_ratio*130);
							}else{
								new_height = 130;
								new_width = 130;
							} 
				var img_src = "<?php echo base_url().'application/views/frontend/upload_images/';?>"+k[0];
	 			td_inner += '<div class="col-xs-12 col-sm-6 col-md-3 thumb_img" id="div_img'+value+'"> <div class="thumb_bg"><img src="<?php echo base_url();?>application/views/frontend/upload_images/'+k[0]+'" class="img1" id="img'+value+'" width="'+new_width+'px" height="'+new_height+'px"onclick="change_image(this.src);"/></div><div class="thumb_toolboox"><div class="thumb_icon"><a><i class="glyphicon glyphicon-zoom-in"></i></a> <a class="remove_image" id="'+k[0]+'" onclick="remove_image(this.id );"><i class="glyphicon glyphicon-remove"></i></a></div></div></div>';			}
				value++;
				}
				td_inner += '</div>';
			}
			if(total_image>4){
				td_inner += '<div id="slider-control">';
       			td_inner += '<a class="left carousel-control arrowclick" id="frame_left" href="#itemslider1" data-slide="prev">';
        		td_inner += '<i class="fa fa-angle-left" style="font-size:3em"></i></a>';
        		td_inner += '<a class="right carousel-control arrowclick" id="frame_right" href="#itemslider1" data-slide="next">';
        		td_inner += '<i class="fa fa-angle-right" style="font-size:3em"></i></a>';
        		td_inner += '</div>';
			}
				td_inner += '</div></div></div>';	
				$('#session_images').html(td_inner); 
				setTimeout(
                    function(){
                    $('#load_buffer').hide();
					var img_src1 = $('#img0').attr('src');
	                change_image(img_src1);
                    }, 3000);	
				} 
			});
		});	
	return status;	
}

    function dropzone_call(){
	    $(document).ready(function(){
	    $('#dropzone_images').show();
	    });
	}	
 
    function remove_box(){
		Dropzone.forElement("#my-dropzone").removeAllFiles(true);
		$('#dropzone_images').hide();
	    $('#crop_image').hide();
        $('#session_images').load('#session_images');
        $('#load_buffer').hide();
    }
	
  function mount_select(mount_rate,mount_code,mount_name){
		mount_details(mount_rate,mount_name,mount_code);
		if(mount_code){
		var dert= "<?php echo base_url()?>images/uploaded_pdf/mount/";
            +$('div#abc').css('background','url("'+dert+mount_code+'.jpg")');
		}
	    $('#mount_code').val(mount_code);
		frame_pricing();
	}

 function change_mount(mount)
   {
   var change_mount = mount*10;
	$("#abc").css('padding',change_mount);
    frame_pricing();
   }// end function
 
  
    function myfun(color,size,shape,f_code,f_rate,f_size_mm){
	frame_details(f_rate,f_size_mm,f_code,color);
	if(f_code){
       var dert= "<?php echo base_url()?>images/uploaded_pdf/frames/horizontal/";
	   //alert(f_code)
	   var border_width="";
	   if(f_size_mm<=40){
	   border_width=20;
	   }else if(f_size_mm>40 && f_size_mm<=50){
	   border_width=30;
	   }else if(f_size_mm>50 && f_size_mm<=66){
	   border_width=40;
	   }else if(f_size_mm>66){
	   border_width=55;
	   }
	   +$('div.mainhor').css({'border-image':'url("'+dert+f_code+'.jpg") 58 58 58 58 round round','border-style':'solid','border-width':''+ border_width+'px'});
	   +$('#frame_name').val(f_code);
	   }
    } 
 
 function selectOnlyThis(id) {
    for (var i = 0;i <=1 ; i++)
    {
        document.getElementById('check'+i).checked = false;
    }
      var selected_type = document.getElementById(id) ;
	  selected_type.checked = true;
      calculate_cost('');  
 }
 
	function id_store(id){
	   $('#frame_data').val(id); 
    }
    
    function mount_store(id){
        $('#mount_data').val(id);
    }
    
	
	function get_frame_color(frame_color){
			var total_slide,total_s="";
			$.ajax({
            type:"post",
			url:"<?=base_url()?>index.php/frontend/get_frame_by_frame_color",
			data:'frame_color='+frame_color,
			beforeSend: function(){
			$('#load_buffer').show();
			},
			success: function(response){
			var array= JSON.parse(response);
		  var td_inner = '';
		  var total_s,total_slide="";
		total_s=(array.length)/4;
		rem_slide = (array.length)%4;
		total_slide=Math.round(total_s);
		if(rem_slide){
			total_slide = total_slide+1; 
		}else{
		total_slide = total_slide;
		}
		var breaks,mount_code,mount_rate,mount_name,mount_avail,td_inner='';
		var image=0;	
			td_inner += '<div class="product-detail-content col-md-10">';
            td_inner += '<div class="carousel carousel-showmanymoveone slide" id="itemslider5">';
            td_inner += '<div class="carousel-inner">';
		  
		 	for(var j=0;j<total_slide;j++){
				if(j==0){
					td_inner += '<div class="item active">';
				}else{
					td_inner += '<div class="item">';
				}
		for(var i=0;i<=3;i++){
			if(image<array.length){
				var val = array[image];
				var explode = val.split(',');
				var f_code=explode[0];
				var explode1=explode[1];
				var f_name="'"+explode1+"'";
				var explode2=explode[2];
				var f_size="'"+explode2+"'";
				var explode3=explode[3];
				var f_color="'"+explode3+"'";
				var explode4=explode[4];
				var f_rate="'"+explode4+"'";
				var explode5=explode[5];
				var f_name="'"+explode5+"'";
				var explode6=explode[6];
				var f_name_mm="'"+explode6+"'";
					if(explode[7]=='0'){
					mount_avail='Out of stock';
					}else{
					mount_avail='';
					}
				var f_shape=$('#frame_shape').val();
				var frame_shape="'"+f_shape+"'";	
				td_inner += '<div class="col-xs-12 col-sm-6 col-md-3 frame" id="frame'+image+'" onClick="id_store(this.id); myfun('+f_color+','+f_size+','+frame_shape+','+f_name+','+f_rate+','+f_name_mm+');"><a><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+f_code+'.jpg" class="img-responsive center-block"></a><h5 class="text-center">'+explode[5]+'</h5><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></div>';
				}
					image++;
				}td_inner +='</div>';
			}	
			if(array.length>4){
				td_inner += '<div id="slider-control">';
        		td_inner += '<a class="left carousel-control arrowclick"  href="#itemslider5" data-slide="prev">';
        		td_inner += '<i class="fa fa-angle-left" style="font-size:3em"></i></a>';
        		td_inner += '<a class="right carousel-control arrowclick"  href="#itemslider5" data-slide="next">';
        		td_inner += '<i class="fa fa-angle-right" style="font-size:3em"></i></a>';
        		td_inner += '</div>';
			}
				td_inner += '</div></div></div>';	
				$('#frameimages0').html(td_inner);
				setTimeout(
                    function(){
                    $('#load_buffer').hide();
 					}, 1000);
				}
			});
		}
	
 	function Frame_Size(FrameSize,frame_size_mm){
		$.ajax({
	      type:'post',
		  url:'<?=base_url()?>index.php/frontend/get_frame_by_frame_color',
		  data:'FrameSize='+frame_size_mm,
		  beforeSend: function(){
			$('#load_buffer').show();
			},
		  success:function(response){
		  var array= JSON.parse(response);
		  var td_inner = '';
		  var total_s,total_slide="";
		total_s=(array.length)/4;
		rem_slide = (array.length)%4;
		total_slide=Math.round(total_s);
		if(rem_slide){
			total_slide = total_slide+1; 
		}else{
		total_slide = total_slide;
		}
		var breaks,mount_code,mount_rate,mount_name,mount_avail,td_inner='';
		var image=0;	
			td_inner += '<div class="product-detail-content col-md-10">';
            td_inner += '<div class="carousel carousel-showmanymoveone slide" id="itemslider6">';
            td_inner += '<div class="carousel-inner">';
		  
		 	for(var j=0;j<total_slide;j++){
				if(j==0){
					td_inner += '<div class="item active">';
				}else{
					td_inner += '<div class="item">';
				}
		    for(var i=0;i<=3;i++){
			if(image<array.length){
				var val = array[image];
				var explode = val.split(',');
				var f_code=explode[0];
				var explode1=explode[1];
				var f_name="'"+explode1+"'";
				var explode2=explode[2];
				var f_size="'"+explode2+"'";
				var explode3=explode[3];
				var f_color="'"+explode3+"'";
				var explode4=explode[4];
				var f_rate="'"+explode4+"'";
				var explode5=explode[5];
				var f_name="'"+explode5+"'";
				var explode6=explode[6];
				var f_name_mm="'"+explode6+"'";
					if(explode[7]=='0'){
					mount_avail='Out of stock';
					}else{
					mount_avail='';
					}
					var f_shape=$('#frame_shape').val();
					var frame_shape="'"+f_shape+"'";	
			td_inner += '<div class="col-xs-12 col-sm-6 col-md-3 frame" id="frame'+image+'" onClick=" id_store(this.id); myfun('+f_color+','+f_size+','+frame_shape+','+f_name+','+f_rate+','+f_name_mm+');"><a><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+f_code+'.jpg" class="img-responsive center-block"></a><h5 class="text-center">'+explode[5]+'</h5><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></div>';
					}
					image++;
				}td_inner +='</div>';
			}	
			if(array.length>4){
		td_inner += '<div id="slider-control">';
        td_inner += '<a class="left carousel-control arrowclick"  href="#itemslider6" data-slide="prev">';
        td_inner += '<i class="fa fa-angle-left" style="font-size:3em"></i></a>';
        td_inner += '<a class="right carousel-control arrowclick"  href="#itemslider6" data-slide="next">';
        td_inner += '<i class="fa fa-angle-right" style="font-size:3em"></i></a>';
        td_inner += '</div>';
			}
		td_inner += '</div></div></div>';	
		$('#frameimages0').html(td_inner);
			setTimeout(
                     function(){
                     $('#load_buffer').hide();
 					 }, 1000);
        	  }
		});
	}
	
	function show_mat(obj){
	$.ajax({
	    type:"post",
		url:"<?=base_url()?>index.php/frontend/get_all_mount_for_slide",
		data:'mount='+obj,
		beforeSend: function(){
		$('#load_buffer').show();
			},
		success: function(success){
		var array=JSON.parse(success);
		var total_s,total_slide="";
		total_s=(array.length)/4;
		rem_slide = (array.length)%4;
		total_slide=Math.round(total_s);
		if(rem_slide){
			total_slide = total_slide+1; 
		}else{
		total_slide = total_slide;
		}
		var breaks,mount_code,mount_rate,mount_name,mount_avail,td_inner='';
		var image=0;	
			td_inner += '<div class="product-detail-content col-md-10">';
            td_inner += '<div class="carousel carousel-showmanymoveone slide" id="itemslider2">';
            td_inner += '<div class="carousel-inner">';
		for(var i=0;i<total_slide;i++){
			if(i==0){
					td_inner += '<div class="item active">';
				}else{
					td_inner += '<div class="item">';
				}
		for(var j=0;j<=3;j++){
			if(image<array.length){
		breaks=array[image].split(',');
		mount_rate="'"+breaks[1]+"'";
		mount_code="'"+breaks[0]+"'";
		mount_name="'"+breaks[2]+"'";
		if(breaks[3]=='0'){
		mount_avail='Out of stock';
		}else{
		mount_avail='';
		}
		td_inner +='<div class="col-xs-12 col-sm-6 col-md-3 mount_data" id="mount'+image+'" onclick="mount_store(this.id);return mount_select('+mount_rate+','+mount_code+','+mount_name+');"><a><img src="<?php echo base_url()?>images/uploaded_pdf/mount_new/'+breaks[0]+'.jpg" class="img-responsive center-block"></a><h5 class="text-center">'+breaks[2]+'</h5><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></div>'
		image++;
			}
				}td_inner +='</div>';
			}	
		td_inner += '<div id="slider-control">';
        td_inner += '<a class="left carousel-control arrowclick"  href="#itemslider2" data-slide="prev">';
        td_inner += '<i class="fa fa-angle-left" style="font-size:3em"></i></a>';
        td_inner += '<a class="right carousel-control arrowclick"  href="#itemslider2" data-slide="next">';
        td_inner += '<i class="fa fa-angle-right" style="font-size:3em"></i></a>';
        td_inner += '</div>';
		td_inner += '</div></div></div>';	
		$('#mount_div0').html(td_inner);
		$('#load_buffer').hide();
		}
	 });
   }
	function cropImage(){
	$(document).ready(function(){
 		if($('#type').html() == 'vertical'){
		var vert_width = $('#vertical_width').html();	
		vert_width = parseInt(vert_width);
		var margin_left = parseInt(-(vert_width/2)); 
		$('.uploader_popup_goofy_a').css({'width': vert_width,'height':'634px','margin-left': margin_left,'margin-top':'-317px','left':'50%','top':'50%'})//a
		$('.imageBox').css({'width':'100%','height':'550px','border':'none'});    
		$('.thumbBox').css({'width':'100%', 'height':'400px', 'margin-top':'-200px', 'margin-left':'-50%', 'border':'none'});
	    $('#crop_image').show(); 
		} else{
		var horizon_height = $('#horizonal_height').html();	
		var horizon_height1 = parseInt(horizon_height);
		var margin_top = parseInt(-(horizon_height/2));	
		horizon_height = parseInt(horizon_height)+parseInt(75);
		$('.uploader_popup_goofy_a').css({'top':'50%','width':'417px','margin-left':'-208px','height': horizon_height,'margin-top':margin_top,'left':'50%'})//a
		$('.imageBox').css({'height':horizon_height1,'width':'100%','border':'none'});    
		$('.thumbBox').css({'border': 'none','top':'50%','left':'50%','width':'300px','height':horizon_height1,'margin-top':margin_top,'margin-left':'-150px'});
	     $('#crop_image').show();
		} 
	});
}
		
	function showTable(frame_cat){
	$('.active').show();
		$.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/frontend/get_frame_code_web_price",
            data:'frame_cat='+frame_cat,
			beforeSend: function(){
			$('#load_buffer').show();
			},
			success: function(data)
            {
			var obj=JSON.parse(data);
			var total_items = obj.length; 
			var i,j,toal_slide,total_s,rem_slide,req_slide,td_inner="";
			total_s = (obj.length/4);
			rem_slide = (obj.length%4);
			total_s = Math.round(total_s);			
			if(rem_slide){
			req_slide = total_s +1;	
			}else{
			req_slide = total_s;	
			}
			var image = 0;	
			td_inner += '<div class="product-detail-content col-md-10">';
            td_inner += '<div class="carousel carousel-showmanymoveone slide" id="itemslider3">';
            td_inner += '<div class="carousel-inner">'; 
			for(j=0;j<=req_slide-1;j++){
				if(j==0){
					td_inner += '<div class="item active">';
				}else{
					td_inner += '<div class="item">';
				}
				for(i=1;i<=4;i++){
			if(image < total_items){
			var val=obj[image];
			//alert(val);
			var explode=val.split(',');
			//alert(explode+" "+" image"+ image);
			var f_code=explode[0];
			//alert(f_code)
			//var add_quote_f_code="'"+f_code+"'";
			var explode1=explode[1];
			//alert(explode1);//color,size,shape,f_code
			var f_name="'"+explode1+"'";
			var explode2=explode[2];
			var f_size="'"+explode2+"'";
			var explode3=explode[3];
			var f_color="'"+explode3+"'";
			var explode4=explode[4];
			var f_rate="'"+explode4+"'";
			var explode5=explode[5];
			var f_name="'"+explode5+"'";
			var explode6=explode[6];
			var f_name_mm="'"+explode6+"'";
			if(explode[7]=='0'){
		mount_avail='Out of stock';
		}else{
		mount_avail='';
		}
			var f_shape=$('#frame_shape').val();
			var frame_shape="'"+f_shape+"'";
			td_inner += '<div class="col-xs-12 col-sm-6 col-md-3 frame" id="frame'+image+'" onclick="id_store(this.id); myfun('+f_color+','+f_size+','+frame_shape+','+f_name+','+f_rate+','+f_name_mm+');"><a><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+f_code+'.jpg" class="img-responsive center-block img3"></a><h5 class="text-center">'+explode[5]+'</h5><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></div>';
			image++;
		}
		 } td_inner +='</div>';
	    }
		if(total_items>4){
		td_inner += '<div id="slider-control">';
        td_inner += '<a class="left carousel-control arrowclick" id="frame_left" href="#itemslider3" data-slide="prev">';
        td_inner += '<i class="fa fa-angle-left" style="font-size:3em"></i></a>';
        td_inner += '<a class="right carousel-control arrowclick" id="frame_right" href="#itemslider3" data-slide="next">';
        td_inner += '<i class="fa fa-angle-right" style="font-size:3em"></i></a>';
        td_inner += '</div>';
		}
		td_inner += '</div></div></div>';	
		$('#frameimages0').html(td_inner);
		$('#load_buffer').hide();
        }
	  });
    }
</script>
<script>
 $(document).ready(function(){
 	var width,height;
	get_session_image();
	setTimeout(
    function(){
        var large_img2 = $('#img0').attr('src');
		$('#large_img').attr("src", large_img2);
		$('#large_img2').attr("src", large_img2);
 	}, 500);
	$('#framingdiv1,#framingdiv2').hide();
	var large_src = $("#large_img").attr("src"); 	
	var style1 = $('#abc').attr('style');   	
	var style2 = $('#frame-it').attr('style');
	$('#abc').attr('style','');
	$('#canvas_details').show();
	$('#frame-it').attr('style','');
	$("#check0").prop("checked", true);
	$('#large_img').hide();
	$('#museum').prop("checked", true);
	$('#myCanvas').hide();
	$('#myCanvas2').hide();
	$('#myCanvas3').hide();
	$('.dimention').hide();
	$('#glass_price').html("Rs.41");
	var category = '<?php echo $_SESSION['type'];?>'; 
	if( category == 'canvas'){
		setTimeout(
        function(){
      	$('#canvas').click();
		}, 500);
	}else if( category == 'framing'){
		setTimeout(
        function(){
      	$('#framing').click();
		}, 500);
	}else if( category == 'print_only'){
		setTimeout(
        function(){
      	$('#print_only').click();
		}, 500);
	}else{
		setTimeout(
        function(){
      	$('#canvas').click();
		}, 500);
	}
	paper_surface('canvas');
	$('#cropbox').show();
	$('#museum').click(function(){
		$('#myCanvas').hide();
		$('#myCanvas2').hide();
		$('#myCanvas3').hide();
	    $('.container3D').show();	
		$('#museum').prop("checked", true);
		$('#large_img2').show();
	    calculate_cost('');
	});
	$('#gallery').click(function(){
		$('#myCanvas').show();
		$('#myCanvas2').show();
		$('#myCanvas3').show();
		calculate_cost('');
	});
	$('source').hide();
	$('source2').hide();
	$('#mount_width').val('1');
	$.ajax({
			  type:'post',
              url:'<?=base_url()?>index.php/frontend/result',
			  data: {src : large_src},
			  success:function(data){
               	var obj = JSON.parse(data);
				var str = ''+obj;
				var res = str.split(",");
				console.log(res);
				console.log(res.length-2);
				var td ='';
				for(var i=0;i<res.length-2;i++){
				var str1 = res[i]; 
				var dim = str1.split('X');
				var width = dim[0];
				var height = dim[1];
				td += '<option value="'+width+'X'+height+'">'+width+'"X'+height+'"</option>';
				}
				$('#sizes').html(td);
			}
		});
	var default_frame = 'ML-215-BK';
	var default_mount = 'DR 2091';
	$.ajax({
			 type:'post',
             url:'<?=base_url()?>index.php/frontend/get_default',
			 data: {frame : default_frame, mount : default_mount},
			 success:function(data){	
		     var values = ''+JSON.parse(data);
			 var  datas = values.split(',');
			      var frame = datas[0];
			 var frame_rate = datas[1];
			 var frame_size = datas[2];
			 var mount_name = datas[3];
			 var mount_rate = datas[4];
		     $('#f_name').html(frame);
			 $('#frame_size').html(frame_size);
			 $('#frame_rate').val(frame_rate);    
			 var mount_size = $('#mount_width').val();
			 $('#mount_size').html(mount_size+'"');    
			 $('#mount_color').html(mount_name);
			 $('#mount_rate').val(mount_rate);    
			 }
	    });  
	$('.framing').hide();    
	$('.canvas').show();
	var src1 = $('#source').attr('src');
	var src2 = $('#source2').attr('src');
	$('#museum').click(function(){
		$('#source').attr('src','');
		$('#source2').attr('src','');
		$('#museum').css('display','');
	});
	$('#gallery').click(function(){
		$('#large_img2').css('display','none');
		$('#source').attr('src',src1);
		$('#source2').attr('src',src2);
	});

	$('.img1').click(function(){
    var src = $(this).attr('src');  
	var id = $(this).attr('id');
	var result = id.split("_");
	$('#div_img'+result[1]).hide();
	$('#large_img').attr('src', src);     
	$.ajax({
			  type:'post',
              url:'<?=base_url()?>index.php/frontend/result',
			  data: {src : src},
			  success:function(data) {
                var obj = JSON.parse(data);
				var str = "'"+ obj +"'";
				var res = str.split(",");
				for(var i=0; i<=obj.length-1; i++){
					console.log(res[i]);
				}
				var width = res[0];
				var height= res[1]; 
			    $('#w_value').attr('value', width);
				$('#h_value').attr('value', height);
					
			}
        });  
	});

	$('.inputs').click(function(){
		if( $('#width').val() == ''){
			$('#finished_size').html('Choose Other Size');
		}
		if( $('#height').val() == ''){
			$('#finished_size').html('Choose Other Size');
		}
		var src = $('#get_img').val();
		var k  =  src.split('/');       
		var path = '';
		for(var p=0; p<=6; p++){
		   path += k[p]+'/';
		}
		path +='original/'+k[7];
		var source = path;
	$.ajax({
			  type:'post',
              url:'<?=base_url()?>index.php/frontend/get_input_dimention',
			  data: {newpath : source},
			  success:function(data) {
				var obj = JSON.parse(data);
				var dimention = ''+obj;  
				var dimentions = dimention.split('X');
				$('#w_value').val(dimentions[0]);
				$('#h_value').val(dimentions[1]);
			}
        });  
	});
		
	$('#btnCrop').click(function(){
        setTimeout(function(){
        var	crop_src = $('#large_img2').attr('src');    
	    $('#crop_src').val(crop_src);
	    },100);
	    setTimeout(function(){
        crop_wrap();
	    },100);
    });
	
   $('.img2').click(function(){
    var id = $(this).attr("id");  
		if(id == 'framing'){
			$('#framingdiv1,#framingdiv2').show();	
			showTable('Basic');
			$('#canvas_details').hide();
		    $('#abc').attr('style',style1);
			$('#frame-it').attr('style',style2);
			$('.imglink').addClass('img_shadow');
			$('#remove-mount').prop('checked', false);
			$('#large_img').show();
			$('.container3D').hide();
		    $('#canvas_opt').hide();
		    $('#options').hide();
		    $('#price_show').show();
			$('#width').val('');
			$('#height').val('');
			$('#frame_color').val('Absolute Black');
			$('#mount_code').val('DR 2091');
			$('#mount_width').val('1');
			paper_surface('framing');
			if( $('#frame_ data').val() == ''){
		    console.log('nothing');
            }else{
		    var k = $('#frame_data').val();    
    		setTimeout(function(){
          	$("#"+ $('#frame_data').val() + "").click();    
    		},100);
		    }
		    if( $('#mount_data').val() == ''){
		    console.log('nothing');
            }else{
		    var k = $('#mount_data').val();    
    		setTimeout(function(){
          	$("#"+ $('#mount_data').val() + "").click();    
    		},100);
		    }
			calculate_cost('');
 			frame_pricing();
 			$('#click').html('frame_click');
 			$('.canvas').hide();
 			$('.framing').show();
        }else if(id == 'canvas'){
			$('#canvas_details').show();
			$('#framingdiv1,#framingdiv2').hide();	 
			$('#abc').attr('style','');
			$('#frame-it').attr('style','');
			$('.imglink').removeClass('img_shadow');
			$('.container3D').show();	
			$('#large_img2').show();
			$('#large_img').hide();
	    	$('#museum').prop("checked", true);
 		    $('.framing').hide();
 			$('.canvas').show();
			//$('#frame_rate').html(75);
			$('#myCanvas').hide();
		    $('#myCanvas2').hide();
		    $('#myCanvas3').hide(); 
		    $('#canvas_opt').show();
	   	    $('#options').show();
	   	    $('#price_show').hide();
	   	    $('#width').val('');
			$('#height').val('');
			$('#frame_color').val('');
			$('#mount_code').val('');
			paper_surface('canvas');
 			$('#frame_click').html('canvas_click');
			calculate_cost('');
 			$('#click').html('canvas_click');
 			}else if(id == 'print_only'){
			$('#canvas_details').hide();
			$('#framingdiv1,#framingdiv2').hide();
			$('#abc').attr('style','');
			$('#frame-it').attr('style','');
			$('.imglink').removeClass('img_shadow');
			$('#large_img').show();
			$('.container3D').hide();	
	        $('#canvas_opt').hide();
		    $('#options').hide();
		    $('#price_show').hide();
		    $('#width').val('');
			$('#height').val('');
			$('#frame_color').val('');
			$('#mount_code').val('');
			paper_surface('print_only');
			calculate_cost('');
			var size = ''+$('#sizes').val();
		    var dimen = size.split('X');
			dimen[0] = parseInt(dimen[0]);
			dimen[1] = parseInt(dimen[1]);
		    $('#finished_size').html(dimen[0]+'"X'+dimen[1]+'" Print Only');
			$('.canvas').hide();
			$('.framing').hide();
			$('.print').show();
		    setTimeout(function(){
		      $('.actual_price').html('Rs.'+$('#print_price').html());
		    },200);
		    $('#click').html('print_only');
		  }else{
			console.log('nothing');
		}
	});

    $('.thumb_bg_hover').click(function(){
	  	$('.thumb_bg_hover').attr('style','');
		$(this).css({'background-color':'#f1f1f1','border-left':'1px solid #d6d6d6',
			'border-right':'1px solid #d6d6d6'});
   	});
	
	$('#RemoveAll').click(function(){
        Dropzone.forElement("#my-dropzone").removeAllFiles(true);
    });
	$('#mount_width').click(function(){
    	  if(this.val() >=1){
    	      $('#remove-mount').prop('checked','true');
    	  }  
	});
	var p;
	$('#remove-mount').click(function(){
	        if($(this).prop("checked") == true){
     			k = $('#abc').attr('style');
				p = $('#mount_width').val();
				$('#abc').attr('style','');
			    $('#mount_width').val(0);
        	    calculate_cost('');
        	    frame_pricing();
        	    $('.mount').hide();
        	}
            else if($(this).prop("checked") == false){
                $('#abc').attr('style', k);
		        $('#mount_width').val(p);
		        calculate_cost('');
        	    frame_pricing();
        	    $('.mount').show();
            }
        });	

		if($("#check0").prop('checked')== true)
		{
			var selected = 'glass_selected';
		}
		if($("#check1").prop('checked')== true){
			var selected = 'acrylic_selected'; ;
		}	
});  
	    
</script>
<!-- div for dynamic variable storage style='display:none'-->
	<input id='frame_rate' style="display:none;">
	<input id='mount_rate' value='' style="display:none;">
    <input id='frame_inches' value='' style="display:none;">
	<input id='frame_color' value='' style="display:none;">
    <input id='glass_rate' value='' style="display:none;">
    <input id='frame_data' value='' style="display:none;">
    <input id='mount_data' value='' style="display:none;">
    <input id='get_img' value='' style="display:none;">
    <div id='type' style="display:none"></div>
    <input id='crop_src' style='display:none'>
    <input id='data' style='display:none'>
	<input id='w_value' style='display:none'>
    <input id='h_value' style='display:none'>
    <div id='click' style='display:none'></div>
	<div id='vertical_width' style='display:none'></div>
	<div id='horizonal_height' style='display:none'></div>
	<input id='w_value' style='display:none'>
	<input id='h_value' style='display:none'>
	<input id='mount_code' value='' style='display:none'>
	<!--<input id='mount_name' style='display:none'> -->
	
<!-- end -->
<!-- pricing Details -->
 <div class="lightbox-target" id="price_detail">
    <div id="uploader_popup_goofy_a" style="width:500px;height:400px;margin-left:-250px;margin-top:-200px;left:50%;top:50%"  >
        <div class="uploader_popup_header">
            <h2 class="text-center">Pricing Details</h2>
            <a class="lightbox-close"  href="" onclick="remove_pricing(); return false;"></a>
        </div>
		<div class="frame-it-pricing">
        	<div class="row canvas framing print">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Print only </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="print_price" class='canvas framing print'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row canvas framing print">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Print Size: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="print_sizes" class='canvas framing print'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row canvas framing print">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Paper Print: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="print_paper" class='canvas framing print'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Size(mm): </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong> <span id="frame_size" class='framing'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row canvas">
            	<div class="frame-it-content ">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Type: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong><span class='canvas' id="frame_type"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Name: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong><span class='framing' id="f_name"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row canvas ">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Cost: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right canvas ">
                    	<strong><img src="" align="absmiddle" /><span id="CanvasCost"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Frame Cost: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right framing">
                    	<strong><img src="" align="absmiddle" /><span id="FrameCost"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing mount">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Mount Size: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right mount">
                    	<strong> <span class='framing' id="mount_size"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="frame-it-content framing mount">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Mount Color: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right mount">
                    	<strong><span class='framing' id="mount_color"></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content mount">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Mount Cost: </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right">
                    	<strong><img src="" align="absmiddle"/><span id="MountCost" class='framing mount'></span></strong>
                    </div>
                </div>
            </div>
            <div class="row framing">
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong> Glass Type: </strong>
                    </div>
                </div>
            </div>  
            <div class="row framing" >
            	<div class="frame-it-content">
                	<div class="col-md-6 col-sm-6 text-left">
                    	<strong id="glass_type"> Regular </strong>
                    </div>
                	<div class="col-md-6 col-sm-6 text-right framing">
                    	<strong> <span id="glass_price"> </span></strong>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="frame-it-content col-md-12">
                <hr/>
                	<div class="row">
                        <div class="col-md-6 col-sm-6 text-left">
                            <strong> Total Price </strong>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <strong> <span class='actual_price'></span></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="frame-it-button">
                	<button <?php if(!$this->session->userdata('userid')){?> onclick="remove_pricing(); login('');return false;"<?php }else{?> onclick="remove_pricing();addToCart();return false;"<?php }?> type="button" class="btn social_icon" style="background-color:#d3131b; color:#fff;"> Add to cart </button>
                	<button onclick="remove_pricing(); return false;" type="button" class="btn social_icon" style="background-color:#555; color:#fff; margin-right:10px"> Cancel </button>
                </div>
            </div>
        </div>

               
	</div>
</div>	
<!-- end -->
<!-- Crop Image-->
<div class="lightbox-target" id="crop_image">
        <div id="uploader_popup_goofy_a" class="uploader_popup_goofy_a" style=""> 
        <!--style="width:330px;height:580px;margin-left:-165px;margin-top:-290px;left:50%;top:50%"-->
        <div class="uploader_popup_header">
            <h2 class="text-center">Select Print Area</h2>
            <a class="lightbox-close"  href="" onclick="$('#crop_image').hide();return false;"></a>
        </div>
            <div id='content'>
                <div class="imageBox" style=""> <!-- style="width:100%;height:500px;border:none" -->
                    <div class="thumbBox" style=""></div> <!-- style="width:100%; height:460px; margin-top:-230px; margin-left:-50%;border:none" -->
                </div>
                <div class="action">
                <style>
				.crop_btn {
					background: url(http://cache1.artprintimages.com/images/pub/productPage/secondaryBTN_large.png) repeat scroll 0 0 transparent !important;
					border: 1px solid silver;
					color: #000;
					font-size: 20px;
					font-weight: bold;
				}
				.crop_btn:hover {
					background: url(http://cache1.artprintimages.com/images/pub/productPage/primaryBTN_large_hover.png) repeat scroll 0 0 transparent !important;
					color: #fff;
				}
				</style>
                    <button id="btnCrop" type="button" class="btn social_icon crop_btn" > APPLY </button>
            </div>
            </div>
     </div>       
</div>

<!--load_buffer-->
<div class="lightbox-target" id="load_buffer">
    <div id="uploader_popup_goofy_a" style="height:180;width:80px;background-color:transparent;border:none;box-shadow:none;margin-left:-40px;margin-top:-90px;left:50%;top:50%">
        <!--<div class="uploader_popup_header">-->
        <!--    <img src="<?php echo base_url();?>/application/views/frontend/img/loading.gif">-->
        <!--</div>-->
             <div class="panel panel-default" style="background-color: transparent;width:200px;margin:0 auto;box-shadow:none;border: none;">
                <div class="adjust">
                   <div class="loader2"></div>
                </div>
             </div>
            
     </div>       
</div>

<!-- dropzone_images-->
<div class="lightbox-target" id="dropzone_images">
<div id="uploader_popup_goofy_a">
    <div class="uploader_popup_header">
        <h2 class="text-left">  Upload Photos </h2>
        <a class="lightbox-close" href="" onclick="$('#dropzone_images').hide(); return false;"></a>
    </div>
    <div class="uploader_popup_upload-icon">
    <form action="<?=base_url()?>index.php/frontend/dropzone" class="dropzone" id="my-dropzone">
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
        <p class="text-left pull-left">By uploading, I agree to the <span> <a href="#" id="termsofuselink" style="cursor: default; color: #ef9223">Terms of use</a> </span> </p>
        <div class="popup-default-button pull-right">
            <input id="submit-all" value="Upload" type="button" class="popup-button">

            <!-- <a id="submit-all" class="popup-button" href="#" style="color:#337ab7"> UPLOAD</a> -->
        </div>
    </div>
</div>       
</div>

<div class="container">
	<div class="row">
      <div class="col-md-9 col-sm-9">
      <div class="panel panel-primary h2a_ms_selector">
          <div class="panel-heading h2a_ms_photos">
          <h3 class="panel-title"> <i>  1 </i> Panel 1 </h3>
          <span class="pull-right add_photo"><a href="" onclick="dropzone_call(); return false;"> + Add More Photos </a></span>
          <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
          </div>

          <div class="panel-body" style="display: block; padding:0" id="session_images"></div>
    </div>
		<div class="panel panel-primary h2a_ms_selector" style="margin-bottom:10px">
              <div class="panel-heading h2a_ms_photos">
              	<h3 class="panel-title"> <i>2</i>Choose Your Options</h3>
              </div>
              <div style="display: block;">
                  <div class="product-detail-content">
                      <div class="carousel carousel-showmanymoveone slide" id="itemslider7">
                          <div class="carousel-inner">
                              <div class="item active">
                                  <div class="col-xs-12 col-sm-6 col-md-2">
                                  	<div class="thumb_bg_hover">
                                      <a href="JavaScript:void(0);">
                                      <img id="canvas" src="<?php echo $path2 = base_url()."images/uploaded_pdf/canvas_img.jpg";?>" class="img2 img-responsive center-block"></a>
                                      <h5 class="text-center">Canvas</h5>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-1">
                                  	<div class="thumb_bg_hover" >
                                      <a href="JavaScript:void(0);">
                                      <img id="framing" src="<?php echo $path1 = base_url()."images/uploaded_pdf/frame_img.jpg";?>" class="img2 img-responsive center-block"></a>
                                      <h5 class="text-center">Framing</h5>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-4">
                                  	<div class="thumb_bg_hover" >
                                      <a href="JavaScript:void(0);">
                                      <img id="print_only" src="<?php echo $path3 = base_url()."images/uploaded_pdf/print_img.jpg";?>" class="img2 img-responsive center-block"></a>
                                      <h5 class="text-center">Print Only</h5>
                                    </div>
                                  </div>
                             </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row" style="margin-bottom:20px">
        <div class="col-md-7 col-sm-7">
         <div class="divimg mainhor" id="frame-it" style="border-image-source: url('http://mahattaart.com/images/uploaded_pdf/frames/horizontal/Absolute Black.jpg'); border-image-slice: 58; border-image-width: initial; border-image-outset: initial; border-image-repeat: round; border-style: solid; border-width: 40px; margin-top: 20px; padding: 0px; width: auto; display:inline-block; position: relative;">

           <div id="abc" style="background:url('<?=base_url()?>images/uploaded_pdf/mount/DR 2091.jpg')  0% 0% / cover no-repeat;width:auto;padding:10px; background-attachment:scroll; position: relative; z-index: 1;">
             <a href="javascript:" id="demo2" class="imglink img_shadow" target="_self" >
               <img id="large_img" src="http://static.mahattaart.com/398/FLPT_RE_0088.JPG" class="img-responsive" style="max-width:260px;"/>
				  <input type="hidden" id="frame_shape" value="<?=$f_shape?>"/>
             </a>
						
	
<section class="container3D"  style="perspective: 1000px; perspective-origin: 0% 0%;">
        <div id="cube">
            <figure class="front">
		    <img id="large_img2"  style="max-height:500px;" src="" class="img-responsive">
   <canvas id="myCanvas2" height="251px" width="330px" style="width:100%;height:100%;max-height:500px;"></canvas> 
  <script>
      function front(source_width,source_height){ 
	  var canvas2 = document.getElementById('myCanvas2');
      var context2 = canvas2.getContext('2d');
      $('#myCanvas2').attr('width',source_width+'px');
	  $('#myCanvas2').attr('height',source_height+'px');
	  var req_width = source_width;
	  var req_height = source_height; 
	  var imageObj2 = new Image();
      imageObj2.onload = function() {
        // draw cropped image
        var sourceX = 0;
        var sourceY = 0;
        var sourceWidth = req_width;
        var sourceHeight = req_height;
        var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas2.width / 2 - destWidth / 2;
        var destY = canvas2.height / 2 - destHeight / 2;
        context2.drawImage(imageObj2, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
      };
      imageObj2.src =  $('#large_img2').attr('src');
        
          
      }
    </script>

	<figure class="right">
	<canvas id="myCanvas" height="251px" width="400px" style="width:111px;height:100%;"></canvas> 
	<script>
function right(width,height,x){
	  var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      
      var imageObj = new Image();
      imageObj.onload = function() {
        // draw cropped image
       var sourceX = x;
        var sourceY = 0;
        var sourceWidth = width;
        var sourceHeight = height;
		var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas.width / 2 - destWidth / 2;
        var destY = canvas.height / 2 - destHeight / 2;

        context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
      };
      imageObj.src = $('#large_img2').attr('src');
    }
	</script>
	
		</figure>
            <figure class="bottom">
	<canvas id="myCanvas3" height="301px" width="330px" style="width:100%;height:111px;"></canvas> 
	 <script>
     function bottom(width,height,y){ 
	  var canvas1 = document.getElementById('myCanvas3');
      var context1 = canvas1.getContext('2d');
      var imageObj1 = new Image();
		console.log(width,height,y);
      imageObj1.onload = function() {
        // draw cropped image
        var sourceX = 0;
        var sourceY = y;
        var sourceWidth = width;
        var sourceHeight = height;
        var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas1.width / 2 - destWidth / 2;
        var destY = canvas1.height / 2 - destHeight / 2;

        context1.drawImage(imageObj1, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
      };
      imageObj1.src = $('#large_img2').attr('src');
     }
    </script>
			</figure>
            </figure>
			</div>
    </section>				
	     
				</div>
             </div>
		 <?php echo $f_shape; ?>   
	</div>
	  <div class="col-md-5 col-sm-5">
      <style>
	  	.input_control{
			height: 25px;
			padding: 4px 2px;
			border-radius: 0;
			font-size: 10px;
		}
		.form-modify .control-label {
			font-weight: normal;
			color: #888;
			text-transform: ;
		}
		#finished_size {
			color: #888;
		}
		.form-modify label.radio-inline{color:#888}
	  </style>
      <form class="form-horizontal form-modify" role="form">
          <div class="form-group">
          <label for="country" class="col-sm-7 control-label">Select size:</label>
           <div class="col-sm-5">
          <select name="sizes" id="sizes" class="form-control input_control" onchange="calculate_cost(this.value)">
          </select>
            </div>
           </div>
          <div class="form-group dimention">
          <label for="country" class="col-sm-7 control-label dimention"> Width (Inch.):</label>
          <div class="col-sm-5">
          <input id="width" maxlength="2" class="form-control by_keyup_update dimention input_control inputs" type="text">
          </div>
          </div>
          <div class="form-group dimention">
          <label for="country" class="col-sm-7 control-label dimention" > Height (Inch.):</label>
          <div class="col-sm-5">
          <input id="height" maxlength="2" class="form-control by_keyup_update dimention input_control inputs" type="text">
          </div>
          </div> <!-- /.form-group -->
          <div class="form-group">
          <label for="country" class="col-sm-7 control-label">Paper Printing Surface:</label>
          <div class="col-sm-5">
          <select id='paper_surface' class="form-control input_control input" onclick="calculate_cost('')"> 
    	  </select>
    	  </div>
    	  </div>
    	  <div class="form-group">
		  <label class="control-label col-sm-7">Finished Size:</label>
          <div class="col-sm-5">
          <div id='finished_size'style='padding-top:8px;'></div>
          </div> 
		  </div>
    	  <div class="form-group" id="canvas_opt" style="display: none;">
          <label for="country" class="control-label col-sm-7">Canvas Wrap:</label>
          <div class="col-sm-5">
          <label class="radio-inline">
          <input id="museum" value="museum" name="canvas_radio" type="radio">Museum
          </label>
          <label class="radio-inline">
          <input id="gallery" value="gallery" name="canvas_radio" type="radio">Gallery
          </label>
         </div>
         </div> 
          <div class="form-group" id="options" >
              <label class="control-label col-sm-7">Options:</label>
              <div class="col-sm-5">
                  <button id="file1" onclick="cropImage();" type="button" class="btn social_icon crop"> Crop Image</button>
              </div>
	      </div>
          
          </form>
	  <!--Image Div --> 
	  <div id="imageDiv">
	  </div>
	  <!--Image End Div -->
	  <div class="addtocartcontainer_page text-center" style="float:right; width:340px;height: 200px;">
      <div class="page_price_label">
      <p>Your Price: <span class='actual_price'> </span></p>
      </div>
	  <div class="page_price_label addtocartcontainer_popup_details" style="margin:10px auto;">
      <a id='price_details' href='' onclick='price_details();return false;'>Price Details</a>
      </div>
      <div class="text-center addtocartcontainer_popup-button" style="margin-top: 20px;">
      <button <?php if(!$this->session->userdata('userid')){?> onclick="login('');return false;"<?php }else{?> onclick="addToCart();return false;"<?php }?> type="button" class="popup-button2"> Add To Cart</button>
	  </div>
	  <div <?php if(!$this->session->userdata('userid')){?> onclick="login('');return false;"<?php }else{?> onclick="addTomyupload();return false;"<?php }?> class="text-center addtocartcontainer_popup-button" style="margin-top: 20px;">
      	<button type="button" class="popup-button2"> Add To My Uploads</button>
	  </div>
      <div class="addtocartcontainer_popup_details" style="margin-top: 20px;">
      <a href="#">Usually ships in 2-3 days</a>
      </div>
      </div>
      <div class="addtocartcontainer_page2" id="canvas_details" style="display: none; margin-bottom:40px; width:340px; float:right">
      <div class="addtocartcontainer_heading">
      <h2>About Canvas</h2>
      </div>
      <div class="col-md-12 addtocartcontainer_header_img">
      	<img src="<?php echo base_url().'images/uploaded_pdf/canvas.png'; ?>" class="img-responsive" />
      </div>
      <div class="addtocartcontainer_header">
      <p>Create an artistic look with depth and texture by printing your photos on canvas</p>
      </div>
      <ul>
      <li> Giclee printed on artist-grade cotton canvas</li>
      </ul>
      <div class="addtocartcontainer_footer">
      </div>
      </div>
      </div>
	  </div>
            <div class="row">
            <div style="background-color: rgb(127, 125, 126); margin-top: 20px; display: block;min-height: 41px;" id="framingdiv1">
        <div class="col-md-12 col-md-push-2">
          <div class="tabs-section">
              <!-- Nav Tabs -->
              <ul class="nav nav-tabs" id="tabs">
          <li class="active"><a href="#tab-1" data-toggle="tab" aria-expanded="false" onclick="showTable('Basic');"><i class=""></i>Frames</a></li>
          <li class=""><a href="#tab-2" data-toggle="tab" aria-expanded="false" onclick="show_mat('');" name="tab8"><i class=""></i>Mount</a></li>
          <li class=""><a href="#tab-3" data-toggle="tab" aria-expanded="false"><i class=""></i>Glass</a></li>
         <!--<li class=""><a href="#tab-4" data-toggle="tab" aria-expanded="false"><i class=""></i>Wall Color frames </a></li>
             <li class=""><a href="#tab-5" data-toggle="tab" aria-expanded="true"><i class=""></i>Glass</a></li> 
             <li class=""><a href="#tab-6" data-toggle="tab"><i class=""></i>Remove Mount</a></li> -->
              </ul>

              <!-- Tab panels -->
              
              <!-- End Tab Panels -->
            </div>
        </div>
    </div></div>
    
<div class="row" style="margin-bottom: 20px; display: block;" id="framingdiv2">
    <div class="tab-content">
    <!-- Tab Content 1 -->
        <div class="tab-pane fade active in row" style="margin-top: 5px;" id="tab-1">
        	<div class="col-md-2">
                <h4 class="choose-colors"> Select frame style</h4>
                <ul class="choose-colors-type">
                  	<?php 
					foreach($frame_cat as $frame_c){ ?>
					<li><a href="javascript:" onclick=" showTable('<?=$frame_c->frame_category;?>');" class="active"><?=$frame_c->frame_category;?></a></li>
						<?php }	?>
					  
				</ul>
                <h4 class="choose-colors"> Choose by Size(mm) </h4>
                <ul class="choose-colors-type">
                    <?php
					 foreach($frame_sizze as $frame_s){  ?>
                      <li><a href="javascript:" onClick="Frame_Size('<?=$frame_s->frame_size_inch;?>','<?=$frame_s->frame_size;?>');">
					  <?php	 echo  $frame_s->frame_size; ?></a></li>
					  <?php } ?>
                </ul>
                <h4 class="choose-colors"> Choose by Color </h4>
                <ul class="choose-colors-type">
                	<?php 
					foreach($frame_color as $frame_co){
					//print_r($frame_c);
					?>
					<li>
					<a href="javascript:" onclick="get_frame_color('<?=$frame_co->frame_color;?>');"><?=$frame_co->frame_color;?></a>
					</li>
					<?php
					}
					?>
                </ul>
            </div>
            <div id="frameimages0"></div>
        </div>
    <!-- Tab Content 2 -->
    <div class="tab-pane fade row" id="tab-2" style="margin-top:5px">
                    <div class="col-md-2">
                        <h4 class="choose-colors"> Remove Mount <input id="remove-mount" name="remove-mount" type="checkbox"> </h4>
                        <h4 class="choose-colors"> CHOOSE BY COLOR: </h4>
                        <ul class="choose-colors-type">
                     <?php 
						foreach($mount_name as $mount_t)
						{ ?>
						<li><a href="javascript:" onclick="return show_mat('<?=$mount_t->mount;?>');"><?=$mount_t->mount;?></a>
                        </li>
							<?php }?>
                        </ul>
                        <h4 class="choose-colors"> Select Width: </h4>
                        <select id="mount_width" onchange="calculate_cost('');frame_pricing(); return change_mount(this.value);" style="padding:5px; width:100%;">
                           <option value="0">--Select--</option>
							<? for($i=0.50;$i<=6.00;$i=$i+0.50){ ?>
								<option value="<?=$i?>"><b><?=$i.'"'?></b>
							</option>
							<? }?>
                        </select>
                        
                    </div>
                
                
								<div id="mount_div0"></div>
				           
                
                </div>
            <!-- Tab Content 3 -->
            <div class="tab-pane fade row" id="tab-3" style="margin-top:5px">
            <div class="col-md-6">
            <h4 class="choose-colors regul-glass">  REGULAR Glass </h4>
            <ul class="choose-colors-type">
            	<li>Protect prints from protects dust and scratches
                	<span class="pull-right"><input id="check0" name="re-mount" type="checkbox" onclick="selectOnlyThis(this.id);frame_pricing();"> </span>
                </li>
                <li>Regular Glass </li>
            </ul>
            <h4 class="choose-colors regul-glass"> Acrylic Glass   </h4>
            <ul class="choose-colors-type">
            	<li> Lightweight, Transparent, Shatter- resistance
                  <span class="pull-right"><input id="check1" name="re-mount" type="checkbox" onclick="selectOnlyThis(this.id);frame_pricing();"> </span>
                </li>
                <li>Acrylic Glass  </li>
            </ul>
            </div>
            
                            </div>
            
            <div class="tab-pane fade" id="tab-5" style="margin-top:5px">
            <div class="product-detail-content col-md-12">
            <div class="carousel carousel-showmanymoveone slide" id="itemslider4">
            <div class="carousel-inner">
            <div class="item active">
            <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="remove-mat row">
            <div class="col-md-3">
            <a href="#"><img src="https://s12.postimg.org/655583bx9/item_1_180x200.png" class="img-responsive"></a>
            </div>
            <div clas="rmove-mat-details col-md-9">
            <h5 style="margin:0 0 2px 0"> demo </h5>
            <p class="rmve-p2">sdsds</p>
            </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 cloneditem-1">
            <div class="remove-mat row">
            <div class="col-md-3">
            <a href="#"><img src="https://s12.postimg.org/655583bx9/item_1_180x200.png" class="img-responsive"></a>
            </div>
            <div clas="rmove-mat-details col-md-9">
            <h5 style="margin:0 0 2px 0"> demo </h5>
            <p class="rmve-p2">sdsds</p>
            </div>
            </div>
            </div></div>
            <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="remove-mat row">
            <div class="col-md-3">
            <a href="#"><img src="https://s12.postimg.org/655583bx9/item_1_180x200.png" class="img-responsive"></a>
            </div>
            <div clas="rmove-mat-details col-md-9">
            <h5 style="margin:0 0 2px 0"> demo </h5>
            <p class="rmve-p2">sdsds</p>
            </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 cloneditem-1">
            <div class="remove-mat row">
            <div class="col-md-3">
            <a href="#"><img src="https://s12.postimg.org/655583bx9/item_1_180x200.png" class="img-responsive"></a>
            </div>
            <div clas="rmove-mat-details col-md-9">
            <h5 style="margin:0 0 2px 0"> demo </h5>
            <p class="rmve-p2">sdsds</p>
            </div>
            </div>
            </div>
            </div>
            </div>
            <div id="slider-control">
            <a class="left carousel-control" href="#itemslider4" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a>
            <a class="right carousel-control" href="#itemslider4" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a>
            </div>
            </div>
            </div>
            </div>
            
            <div class="tab-pane fade" id="tab-6" style="margin-top:5px">
            <div class="remove-mount-selector text-center">
              <span style="color: rgb(136, 136, 136); font-size: 12px;">Mat Width: </span>
              <select id="country" class="">
                  <option>10" x 15"</option>
                  <option>10" x 15"</option>
                  <option>10" x 15"</option>
                  <option>10" x 15"</option>
                  <option>10" x 15"</option>
                  <option>10" x 15"</option>
                  <option>10" x 15"</option>
                  </select>
            </div>
            <div class="product-detail-content col-md-12">
            <div class="carousel carousel-showmanymoveone slide" id="itemslider6">
              <div class="carousel-inner">
              <div class="item active">
                  <div class="col-xs-12 col-sm-6 col-md-2">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Canvas</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-1">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Framing</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-2">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <span class="badge">10%</span>
                  <h5 class="text-center">Wood Mounting</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-3">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Art on Metal</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-4">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Print Only</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-5">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">4000,00 RSD</h5>
                  </div>
              </div>
              <div class="item">
                  <div class="col-xs-12 col-sm-6 col-md-2">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Canvas</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-1">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Framing</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-2">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <span class="badge">10%</span>
                  <h5 class="text-center">Wood Mounting</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-3">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Art on Metal</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-4">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Print Only</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-5">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">4000,00 RSD</h5>
                  </div>
              </div><div class="item">
                  <div class="col-xs-12 col-sm-6 col-md-2">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Canvas</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-1">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Framing</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-2">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <span class="badge">10%</span>
                  <h5 class="text-center">Wood Mounting</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-3">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Art on Metal</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-4">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">Print Only</h5>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-5">
                  <a href="#"><img src="http://cdn.indiapicture.in/media1/398/AGOS_11002462.JPG" class="img-responsive center-block"></a>
                  <h5 class="text-center">4000,00 RSD</h5>
                  </div>
              </div>
              </div>
              <div id="slider-control">
              <a class="left carousel-control" href="#itemslider6" data-slide="prev">
              <i class="fa fa-angle-left" style="font-size:3em"></i></a>
              <a class="right carousel-control" href="#itemslider6" data-slide="next">
              <i class="fa fa-angle-right" style="font-size:3em"></i></a>
              </div>
              </div>
            </div>
            </div>
            </div>
    </div>


    <!-- Tab Content 3 -->
       
    </div>
    <div class="col-md-3 col-sm-3">
      	<div class="addtocartcontainer_page2">
        	<div class="addtocartcontainer_heading">
	        	<h2>Sign In</h2>
            </div>
            <div class="addtocartcontainer_header">
              <a target="_self" class="popup-button3" href="#" onclick="return login('')"> Create New Account </a>
            </div>
            <!--<style>
			ul.checklist li::before {
				font-family: FontAwesome;
				font-style: normal;
				font-weight: normal;
				text-transform: none !important;
			}
			ul.checklist li::before {
				content: "";
				margin-right: 0.75em;
			}
			</style>-->
            <ul class="checklist">
            	<li style="background:url(http://cache1.artprintimages.com/images/photostoart/ART/checkmark.gif) no-repeat left center"> Access your photos from anywhere </li>
            	<li style="background:url(http://cache1.artprintimages.com/images/photostoart/ART/checkmark.gif) no-repeat left center"> Receive discounts </li>
            </ul>
            <div class="addtocartcontainer_footer">
	            <p>Already have an account?</p>
                <p><a href="" onclick="login('');return false;">Login here</a></p>
                <p class="text-center">or</p>
            </div>
            <p class="text-center"><a href="#"><img src="../../../assets/img/photostoart_inner/facbook.jpg" style="margin-bottom:10px"></a></p>
        </div>
        
        <div class="addtocartcontainer_page2">
        	<div class="addtocartcontainer_heading">
	        	<h2>our guarantee</h2>
            </div>
            <div class="addtocartcontainer_footer">
	            <p>Create an artistic look with depth and texture by printing your photos on canvas. Create an artistic look with depth and texture by printing your photos on canvas</p>
            </div>
        </div>
        <div class="addtocartcontainer_page2" style="border:none">
            <p class="text-center" style="font-size:13px; color:#888; margin-top:6px">Other ways to order:</p>
            <p class="text-center" style="font-size:11px; color:#888; margin-top:6px">  +91-8800639075 </p>
        </div>
      </div>
</div>
      </div>
<script>
// $(window).on('load',function(){
// $(document).on('click', '.panel-heading span.clickable', function(e){
//     var $this = $(this);
// 		if(!$this.hasClass('panel-collapsed')) {
// 			$this.parents('.panel').find('.panel-body').slideUp();
// 			$this.addClass('panel-collapsed');
// 			$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
// 		} else {
// 			$this.parents('.panel').find('.panel-body').slideDown();
// 			$this.removeClass('panel-collapsed');
// 			$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
// 		}
// 	})
// });
</script>
<script>
$(".dz-upload-icon").click(function() {
    $(".dz-upload-icon").addClass("col-md-12 col-md-3");
	$(".popup-default-message").css("display", "none");
	$(".dz-upload-image").css("display", "block");	
});
</script>


<style>
.remove-mat {
  border: 1px solid #888;
  margin: 0 auto;
  max-width: 500px;
  padding: 10px;
  width: 100%;
}
.remove-mat.row > div {
  float: left;
}
p.rmve-p2 {
  color: #888;
  font-size: 11px;
}
  ul.icons-list {
    height: auto;
    max-height: 100px;
    overflow-x: hidden;
}
.tabs-section > ul a{color:#fff}

.tabs-section .nav-tabs > li > a {
  border-left: 1px solid #6d6e6c;
  border-radius: 0;
  border-right: medium none transparent;
  border-top: medium none transparent;
  font-family: "Helvetica Neue Regular",Helvetica,Arial,sans-serif;
  font-size: 14px;
}
.tabs-section .nav-tabs > li:last-child > a {
  border-right: 1px solid #6d6e6c;
}

.frame-it-main {
	float:left; 
	width:645px; 
	height:auto; 
	z-index:9; 
	text-align:center; 
	position:relative; 
	max-height:500px;
}

.tabs-section .nav > li > a:hover, .tabs-section .nav > li > a:focus {
  background-color: #7f7d7e;
  border-left: 1px solid #6d6e6c;
  border-radius: 0;
  border-right: medium none transparent;
  border-top: medium none transparent;
}
.choose-colors {
  border-bottom: 1px solid #cecece;
  border-top: 1px solid #cecece;
  display: block;
  font-family: "MyriadProSemiBold";
  font-size: 12px;
  margin: 10px 0;
  padding: 3px;
  text-transform: uppercase;
  width: 100%;
}
.choose-colors.regul-glass {
  width: 105px;
}
ul.choose-colors-type {
  height: auto;
  max-height: 100px;
  overflow-x: hidden;
}
.choose-colors-type li a, .choose-colors-type-mount li a, .choose-colors-type > li {
  color: #888;
  display: block;
  font-size: 12px;
  padding: 2px 6px;
}
.addtocartcontainer_header_img {
  margin: 10px 0;
}
.remove-mount-selector.text-center {
  margin: 4px 0 7px;
}

.imglink {
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.8) inset;
    display: inline-block;
    position: relative;
}
.img_shadow > img {
    position: relative;
    z-index: -1;
}
</style>
<style>
.clickable{
cursor: pointer;   
}

.panel-heading span {
margin-top: -20px;
}

.panel-heading.h2a_ms_photos {
background: #f1f1f1 none repeat scroll 0 0;
border-bottom: 1px solid #d6d6d6;
color:#000
}

.h2a_ms_photos > h3 {
color: #000;
font-family: "BebasNeueRegular";
font-size: 18px;
font-weight: bold;
letter-spacing: 1px;
text-transform: uppercase;
}

.panel-title > i {
	background: #f7f7f7 none repeat scroll 0 0;
	border: 1px solid #000;
	border-radius: 50%;
	color: #888;
	display: block;
	float: left;
	height: 20px;
	margin-right: 8px;
	padding: 4px 7px;
	position: relative;
	width: 20px;
	line-height: 1;
	font-size: 12px;
	font-weight: normal;
	font-style: normal;
}

.panel.panel-primary.h2a_ms_selector {
border: 1px solid #d6d6d6;
border-radius: 0;
margin-bottom: 0;
margin-top: 10px;
}
.pull-right.add_photo {
margin-right: 400px;
margin-top: -15px;
}
.pull-right.add_photo > a {
color: #888;
font-size: 12px;
text-decoration: underline;
}
#itemslider3 h5 {
font-size: 9px;
font-weight: bold;
text-transform: uppercase;
}
.addtocartcontainer_page {
background: #f1f1f1 none repeat scroll 0 0;
border: 1px solid #d6d6d6;
float: left;
margin-top: 20px;
padding: 10px;
width: 100%;
}
.page_price_label > p {
color: #888;
font-size: 13px;
}
.page_price_label span {
color: #000;
font-weight: bold;
padding-left: 10px;
}
.popup-button,.popup-button2 {
    background: linear-gradient(#ef9223, #f26522);
    background: -webkit-linear-gradient(#ef9223, #f26522);
    background: -o-linear-gradient(#ef9223, #f26522);
    background: -moz-linear-gradient(#ef9223, #f26522);
    background: linear-gradient(#ef9223, #f26522);
}

.popup-button,.popup-button2,#file1 {
  border: 1px solid #f26522;
  color: white;
  cursor: pointer;
  display: inline-block;
  font-size: 14px;
  font-weight: bold;
  line-height: 1;
  padding: 7px 14px;
  text-transform: uppercase;
}
.popup-button:hover,.popup-button2:hover {
    background: linear-gradient(#fff, #fff);
    background: -webkit-linear-gradient(#fff, #fff);
    background: -o-linear-gradient(#fff, #fff));
    background: -moz-linear-gradient(#fff, #fff);
    background: linear-gradient(#fff, #fff);
	color:#000;
	border:1px solid #d6d6d6;
}
#file1:hover {
    background: linear-gradient(#000, #000);
    background: -webkit-linear-gradient(#000, #000);
    background: -o-linear-gradient(#000, #000);
    background: -moz-linear-gradient(#000, #000);
    background: linear-gradient(#000, #000);
	color:#fff;
	border:1px solid #d6d6d6;
}
#file1 {
    background: linear-gradient(#fff, #fff);
    background: -webkit-linear-gradient(#fff, #fff);
    background: -o-linear-gradient(#fff, #fff);
    background: -moz-linear-gradient(#fff, #fff);
    background: linear-gradient(#fff, #fff);
	color:#000;
	border:1px solid #d6d6d6;
}

.addtocartcontainer_popup_details > a {
color: #888;
font-size: 12px;
text-decoration: underline;
}
.addtocartcontainer_popup_details > a:hover{
color: #ef9223;
text-decoration:underline !important;
}
.addtocartcontainer_popup_details {
margin: 20px 0 0;
}
.addtocartcontainer_page2 > h2 {
font-size: 14px;
font-weight: bold;
text-transform: uppercase;
}
.addtocartcontainer_page2 {
	border: 1px solid #d6d6d6;
	float: left;
	margin-top: 10px;
	width: 200px;
}
.addtocartcontainer_heading {
	background: #f1f1f1 none repeat scroll 0 0;
	padding: 10px 15px;
}
.addtocartcontainer_header, .addtocartcontainer_footer {
	color: #888;
	font-size: 12px;
	padding: 10px 15px;
	padding-bottom: 0;
}
.addtocartcontainer_footer {
margin-bottom: 20px;
}
.addtocartcontainer_page2 > ul {
	padding: 10px 15px;
}
.addtocartcontainer_page2 > ul li {
	color: #888;
	font-size: 13px;
	line-height: 1;
	padding-bottom: 5px;
	padding-left: 20px;
	padding-top: 10px;
}
.popup-button3 {
background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #fff 0px, #fff 100%) repeat scroll 0 0;
border: 1px solid #d6d6d6;
color: #000;
cursor: pointer;
display: inline-block;
font-size: 11px;
line-height: 1;
margin: 0 0 5px;
padding: 10px 15px;
text-transform: uppercase;
}

.popup-button3:hover {
background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #000 0px, #000 100%) repeat scroll 0 0;
border: 1px solid #000;
color: #fff;
}
.addtocartcontainer_footer a {
color: #888;
text-decoration: underline;
}
.addtocartcontainer_heading > h2 {
font-family: "BebasNeueRegular";
font-size: 18px;
font-weight: bold;
letter-spacing: 1px;
text-transform: uppercase;
margin:0
}
.tabs-section .nav-tabs {
border-bottom: medium none;
}
.bor tr td a {
border: 1px solid #eee;
float: left;
height: 18px;
margin: 1px;
width: 12px;
}
.btn.social_icon {
	border-radius: 0;
	box-shadow: none;
	padding: 2px 0;
	position: relative;
	min-width: 110px;
}
.frame-it-content strong {
	margin: 5px 0;
	display: block;
	font-family: inherit;
}
.frame-it-button {
	position: absolute;
	bottom: 0;
	height: 40px;
	right: 5px;
}
a.lightbox-close {
	background: transparent;
	box-sizing: border-box;
	color: black;
	display: block;
	height: 100%;
	position: absolute;
	right: 0;
	text-decoration: none;
	top: 2px;
	width: 30px;
}
a.lightbox-close::before {
	background: black none repeat scroll 0 0;
	content: "";
	display: block;
	height: 25px;
	left: 15px;
	position: absolute;
	top: 0;
	transform: rotate(45deg);
	width: 1px;
}
a.lightbox-close::after {
	background: black none repeat scroll 0 0;
	content: "";
	display: block;
	height: 25px;
	left: 15px;
	position: absolute;
	top: 0;
	transform: rotate(-45deg);
	width: 1px;
}
.frame-it-pricing {
	padding: 10px;
}
</style>

<style>
.black_overlay{
display: none;
position: fixed;
top: 0%;
left: 0%;
width: 100%;
height: 100%;
background-color: black;
z-index:1001;
-moz-opacity: 0.8;
opacity:.80;
filter: alpha(opacity=80);
}
.white_content {
background-color: #fff;
height: 400px;
left: 50%;
margin: -200px auto auto -200px;
opacity: 1;
padding: 16px;
position: absolute;
top: 50%;
width: 400px;
display:none;
}
#light > a {
position: absolute;
right: 0;
top: 0;
}

</style>
<style>
.uploader_popup_header{
	background-color: #f1f1f1;
	height: 30px;
	position: relative;
	padding: 0 10px;
}

#uploader_popup_goofy_a {
	background: white none repeat scroll 0 0;
	display: block;
	font-family: Arial;
	left: 314.5px;
	position: absolute;
	top: 134px;
	width: 720px;
	z-index: 10000012;
}

.uploader_popup_header > h2 {
	font-size: 22px;
	font-weight: bold;
	text-transform: uppercase;
	margin: 0;
	font-family: 'BebasNeueRegular' !important;
	padding-top: 2px;
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
.popup-default-footer {
	display: block;
	height: 40px;
	clear: both;
	margin: 10px;
}
</style>
<style>

.action {
	width: 100%;
	margin: 10px 0;
	position: absolute;
	bottom: 0;
}
.cropped>img
{
margin-right: 10px;
}
</style>
<style>
.container3D {
height: 200px;
position: relative;
-webkit-perspective: 1200px;
-moz-perspective: 1200px;
-o-perspective: 1200px;
perspective: 1200px;
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
#cube .front {
/*background: hsla( 0, 100%, 50%, 0.7 );*/
}
#cube figure {
display: block;
position: absolute;
height: auto;
width: auto;
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

.carousel-control{width:10px; top:40px;}
.carousel-control.left{background-image:linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,.0001) 100%); left:20px;}
.carousel-control.right{background-image:linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,.0001) 100%); right:20px;}
</style>
<style>
.thumb_img {
	text-align: center;
	width: 187px;
	height: 180px;
	padding: 0;
		border-left: 1px solid #d6d6d6;
	border-right: 1px solid #d6d6d6;

}
.thumb_img:hover > .thumb_bg{ background-color:#f1f1f1}
.thumb_img:hover .thumb_toolboox{ display:block}

.thumb_bg {
	text-align: center;
	width: 187px;
	height: 150px;
	position: relative;
	vertical-align: middle;
	display: table-cell;
}
.thumb_toolboox {
	background-color: #c1c1c1;
	height: 30px;
	line-height: 2;
	display: none;
}

.thumb_icon {
	position: absolute;
	bottom: 0;
	width: 100%;
}
.thumb_icon > a {
	color: #2a2a2a;
	font-size: 15px;
	margin: 0 4px;
}
.thumb_bg_hover {
	padding-top: 10px;
	height: 120px;
}
.thumb_bg_hover:hover {
	border-left: 1px solid #d6d6d6;
	border-right: 1px solid #d6d6d6;
	background: #f1f1f1;
}
</style>