<script src="http://beta.mahattaart.com/assets/js/jQuery-3.2.1.min.js"></script>
<link rel="stylesheet" href="<?php print base_url();?>assets/css/light-box-model.css" type="text/css"/>
<link rel="stylesheet" href="<?php print base_url();?>assets/css/wallcolor.css" type="text/css"/>
<link rel="stylesheet" href="<?php print base_url();?>assets/css/loader.css" type="text/css"/>
<link href="<?php print base_url();?>assets/css/dropzone.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/croppie.css" type="text/css" />

<script src="<?php echo base_url();?>assets/js/dropzone.js" type="text/javascript"></script>    
<script src="<?php echo base_url();?>assets/js/croppie.js" type="text/javascript" ></script>

<script>
    $(window).load(function() {
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
</script>

<script>
Dropzone.options.myDropzone = {
  // Prevents Dropzone from uploading dropped files immediately
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
         $('#session_images').load('#session_images');  
     	 buffer_show();
      	 setTimeout(
         function(){
         $('#load_buffer').hide();
 		}, 3000);
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
<script type="text/javascript">
	function paper_surface(id){
		var td = '';
		$('#paper_surface').html(td);
		if(id=='framing'){
			td = '<option value="Enhanced Matt">Enhanced Matt</option>';
			td += '<option value="Photography Paper Glossy">Photography Paper Glossy</option>';
			td += '<option value="Fine Art Luster">Fine Art Luster</option>';
			td += '<option value="Matt Fine Art">Matt Fine Art</option>';
			td += '<option value="Glossy Fine Art">Glossy Fine Art</option>';
			td += '<option value="Photo Luster">Photo Luster</option>';
			td += '<option value="Photo Matt">Photo Matt</option>';
			td += '<option value="Vinyl">Vinyl</option>';
		}else if(id=='print_only'){
			td = '<option value="Enhanced Matt">Enhanced Matt</option>';
			td += '<option value="Photography Paper Glossy">Photography Paper Glossy</option>';
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
		if(value == 'Customize Size'){
			$('.dimention').show();
		}else{
			$('.dimention').hide();
		}			
		var size = ''+$('#sizes').val();
			var width = $('#width').val();
			var height = $('#height').val();
			var select = '';
			var dimen = size.split('X');
			 dimen[0] = parseInt(dimen[0]);
			 dimen[1] = parseInt(dimen[1]);
			 dimen[2] = parseInt(dimen[0]) + parseInt(4);
			 dimen[3] = parseInt(dimen[1]) + parseInt(4);
			$('#finished_size').html(dimen[2]+'"X'+dimen[3]+'" Canvas Print | '+dimen[0]+'"X'+dimen[1]+'" Canvas Print without border');
			if( $("#museum").prop("checked")== true){
				select = 'museum';	
			}else{
				select = 'gallery';
			}
		    var paper = $('#paper_surface').val();
			$('#print_paper').html(paper);
			var role_size;
			var rates;
			if(paper == 'Enhanced Matt'){
				rates = 1.2;
			}else if(paper == 'Photography Paper Glossy'){
				rates = 1;
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
			
			 var role_size='';	
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
		var cost = '';
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
		var actual_price = cost + CanvasFrameCost;
		$('.actual_price').html("Rs."+ Math.round(actual_price,2));
    	if($('#click').html() == 'frame_click'){
    	frame_pricing();
		  }
		}
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
			$('#MountCost').html("Rs."+mount_cost);
			$('#finished_size').html( framewidth+'"X'+ frameheight+'" Framed Print');	
			var print_price = $('#print_price').html();
			if($('#remove-mount').prop('checked') == 'true'){
			var actual_price = parseInt(print_price) + parseInt(framing_cost) + parseInt(glass_cost);
			$('.actual_price').html("Rs."+actual_price);
			}else{
			var actual_price = parseInt(print_price) + parseInt(framing_cost) + parseInt(glass_cost) + parseInt(mount_cost);
			setTimeout(function(){
			    $('.actual_price').html("Rs."+ actual_price)
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
			$('.actual_price').html(actual_price);			
			}
	}
	
	
	function frame_details(rate,size,frame_name){
		$('#frame_size').html(size);
		$('#f_name').html(frame_name);
		$('#frame_rate').val(rate);
		$('#frame_inches').val( Math.round(parseInt(size)/25));
		calculate_cost('');
	    frame_pricing();
	}
	
	function mount_details(rate,mount_name,code){
		$('#mount_color').html(mount_name);
		$('#mount_rate').val(rate);
		calculate_cost('');
	    frame_pricing();
	}
// 	function by_keyup_update(id_val){
// 	$(".by_keyup_update").keyup(function(){ 
// 		var newValue = $('#qty_update'+id_val).val().replace(/[^1-9]/g,'');
// 		if(newValue.length>=1){
// 		var newValue = $('#qty_update'+id_val).val().replace(/[^0-9]/g,'');
// 		}
// 		$('#qty_update'+id_val).val(newValue);
// 	});
//  }

// 	var body = document.getElementsByTagName('body')[0];
// 				var removeLoading = function() {
// 					setTimeout(function() {
// 						body.className = body.className.replace(/loading/, '');
// 					}, 3000);
// 				};
// 	removeLoading();
	function change_image(src){
		$('#get_img').val(src);
		var k  =  src.split('/');       
		var path = '';
		for(var p=0; p<=6; p++){
		   path += k[p]+'/';
		}
		path +='original/'+k[7];
		//alert(path);
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
			alert(data);
			var length = data.length-1;
			// $('#session_images').load('#session_images');
			 //alert(data[length]);
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
				       window.location.href = 'photostoart';
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
						//var length = imagesize.length;
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
	 td_inner += '<div class="col-xs-12 col-sm-6 col-md-3 thumb_img" id="div_img'+value+'"> <div class="thumb_bg"><img src="<?php echo base_url();?>application/views/frontend/upload_images/'+k[0]+'" class="img1" id="img'+value+'" width="'+new_width+'px" height="'+new_height+'px"onclick="change_image(this.src);" /> </div> <div class="thumb_toolboox"><div class="thumb_icon"><a><i class="glyphicon glyphicon-zoom-in"></i></a> <a class="remove_image " id="'+k[0]+'" onclick="remove_image(this.id );"><i class="glyphicon glyphicon-remove"></i></a></div></div> </div>';			
						}
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
//         setTimeout(
//         function(){
        
// 		 }, 1000); 
        
    }
	
  function mount_select(mount_rate,mount_code,mount_name){
		mount_details(mount_rate,mount_name);
		if(mount_code){
		var dert= "<?php echo base_url()?>images/uploaded_pdf/mount/";
            +$('div#abc').css('background','url("'+dert+mount_code+'.jpg")');
		}
	    frame_pricing();
	}

 function change_mount(mount)
   {
   var change_mount = mount*10;
	$("#abc").css('padding',change_mount);
    frame_pricing();
   }// end function
 
  
    function myfun(color,size,shape,f_code,f_rate,f_size_mm){
	frame_details(f_rate,f_size_mm,f_code);
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
    
    function frame_change(){
//         if( $('#frame_data').val() == ''){
// 		console.log('nothing');
//         }else{
// 		var k = $('#frame_data').val();    
//     		alert(k);
//     		setTimeout(function(){
//           	$("#"+ $('#frame_data').val() + "").click();    
//     		},500);
// 		}
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
		td_inner +='<div class="col-xs-12 col-sm-6 col-md-3 mount_data" id="mount'+image+'" onclick="mount_store(this.id);return mount_select('+mount_rate+','+mount_code+','+mount_name+');"><a><img src="<?php echo base_url()?>images/uploaded_pdf/mount/'+breaks[0]+'.jpg" class="img-responsive center-block"></a><h5 class="text-center">'+breaks[2]+'</h5><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></div>'
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
		}else{
		/* var vert_width = $('#horizontal_height').html();	
		vert_width = parseInt(vert_width);
		var margin_left = parseInt(-(vert_width/2)); */	
		$('.uploader_popup_goofy_a').css({'top':'50%','width':'417px','margin-left':'-208px','height':'350px','margin-top':'-175px','left':'50%'})//a
		$('.imageBox').css({'height':'260px','width':'417px','border':'none'});    
		$('.thumbBox').css({'border': 'none','top':'50%','left':'50%','width':'300px','height':'260px','margin-top':'-130px','margin-left':'-150px'});
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
	$('.imglink').removeClass('img_shadow');
	$('#large_img').hide();
	$('#museum').prop("checked", true);
	$('#myCanvas').hide();
	$('#myCanvas2').hide();
	$('#myCanvas3').hide();
	$('.dimention').hide();
	var category = '<?php echo $type;?>'; 
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
		$('#canvas').click();
	}
	paper_surface('canvas');
	$('#canvas_opt').show();
		
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
				//alert(obj.length);
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
	
	$('input').keyup(function(){
				var real_width = $('#w_value').val();
				var real_height = $('#h_value').val();
				var ratio = real_width/real_height;
				//alert(input_height + " " + input_width);
				$('#width,#height').keyup(function(){
				var id = $(this).attr('id');
				var value = $(this).val();	
				if(id == 'height'){
				var input_width = ratio*value; 	
				console.log("id= "+ value +" width= "+input_height);
				}else{
				var input_height = ratio*value; 	
				console.log("id= "+ value +" height= "+input_height);
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
			$('#remove-mount').prop('checked', false);
			$('#large_img').show();
			$('.container3D').hide();
		    $('#canvas_opt').hide();
		    $('#options').hide();
		    $('#price_show').show();
			paper_surface('framing');
			if( $('#frame_data').val() == ''){
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
 			//frame_change();mount_data
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
	   	    paper_surface('canvas');
 			$('#frame_click').html('canvas_click');
			calculate_cost('');
 			}else if(id == 'print_only'){
			$('#canvas_details').hide();
			$('#framingdiv1,#framingdiv2').hide();
			$('#abc').attr('style','');
			$('#frame-it').attr('style','');
			$('#large_img').show();
			$('.container3D').hide();	
	        $('#canvas_opt').hide();
		    $('#options').hide();
		    $('#price_show').hide();
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
		      $('.actual_price').html($('#print_price').html());
		    },200);
		    $('#click').html('print_only');
		  }else{
			console.log('nothing');
		}
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
    <input id='frame_inches' value ='' style="display:none;">
    <input id='glass_rate' value=''style="display:none;">
    <input id='frame_data' value=''style="display:none;">
    <input id='mount_data' value=''style="display:none;">
    <input id='get_img' value='' style="display:none;">
    <div id='type' style="display:none"></div>
    <input id='crop_src' style='display:none'>
    <input id='data' style='display:none'>
    <div id='click' style='display:none'></div>
	<div id='vertical_width' style='display:none'></div>
	<div id='horizonal_height' style='display:none'></div>
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
            	<div class="frame-it-content col-md-12" style="margin-top:20px">
                <hr />
                	<div class="row">
                        <div class="col-md-6 col-sm-6 text-left">
                            <strong> Total Price </strong>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <strong> <span class='actual_price'>3000</span></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="frame-it-button">
                	<button type="button" class="btn social_icon" style="background-color:#d3131b; color:#fff;"> Add to cart </button>
                	<button type="button" class="btn social_icon" style="background-color:#555; color:#fff; margin-right:10px"> Cancel </button>
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
                                      <img id="canvas" src="<?php echo $path2 = base_url()."images/uploaded_pdf/services_icons_canvas.png";?>" class="img2 img-responsive center-block"></a>
                                      <h5 class="text-center">Canvas</h5>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-1">
                                  	<div class="thumb_bg_hover">
                                      <a href="JavaScript:void(0);">
                                      <img id="framing" src="<?php echo $path1 = base_url()."images/uploaded_pdf/services_icons_framing.png";?>" class="img2 img-responsive center-block"></a>
                                      <h5 class="text-center">Framing</h5>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-2 cloneditem-4">
                                  	<div class="thumb_bg_hover">
                                      <a href="JavaScript:void(0);">
                                      <img id="print_only" src="<?php echo $path3 = base_url()."images/uploaded_pdf/metal_icon.png";?>" class="img2 img-responsive center-block"></a>
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
        <div class="col-md-5 col-sm-5">
         <div class="divimg mainhor" id="frame-it" style="border-image-source: url('http://mahattaart.com/images/uploaded_pdf/frames/horizontal/Absolute Black.jpg'); border-image-slice: 58; border-image-width: initial; border-image-outset: initial; border-image-repeat: round; border-style: solid; border-width: 40px; margin-top: 20px; padding: 0px; width: auto; display:inline-block; position: relative;">

           <div id="abc" style="background:url('<?=base_url()?>images/uploaded_pdf/mount/DR 2091.jpg')  0% 0% / cover no-repeat;width:auto;padding:10px; background-attachment:scroll; position: relative; z-index: 1;">
             <a href="javascript:" id="demo2" class="imglink img_shadow" target="_self" >
               <img id="large_img" src="http://static.mahattaart.com/398/FLPT_RE_0088.JPG" class="img-responsive" style="max-height: 400px;max-width:300px;"/>
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
	  <div class="col-md-7 col-sm-7">
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
          <input id="width" class="form-control by_keyup_update dimention input_control" type="text">
          </div>
          </div>
          <div class="form-group dimention">
          <label for="country" class="col-sm-7 control-label dimention" id="height"> Height (Inch.):</label>
          <div class="col-sm-5">
          <input id="height" class="form-control by_keyup_update dimention input_control" type="text">
          </div>
          </div> <!-- /.form-group -->
          <div class="form-group">
          <label for="country" class="col-sm-7 control-label">Paper Printing Surface:</label>
          <div class="col-sm-5">
          <select id='paper_surface' class="form-control input_control" onchange="calculate_cost(this.value)"> 
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
                  <!-- <label class="radio-inline"></label> -->
                  <button id="file1" onclick="cropImage();" type="button" class="btn social_icon crop"> Crop Image</button>
                  <!-- <button href="#upload">Change Print Area</button> -->
              </div>
	      </div>
          
          </form>
	  <!--Image Div --> 
	  <div id="imageDiv">
	  </div>
	  <!--Image End Div -->
	  <div class="addtocartcontainer_page text-center" style="float:right; width:340px;height: 170px;">
      <div class="page_price_label">
      <p>Your Price: <span class='actual_price'> $49.99 </span></p>
      </div>
	  <div class="page_price_label addtocartcontainer_popup_details" style="margin:10px auto;">
      <a href='' onclick='price_details();return false;'>Price Details</a>
      </div>
      <div class="text-center addtocartcontainer_popup-button" style="margin-top: 20px;">
      <a target="_self" class="popup-button2" href="#"> Add To Cart </a>
      </div>
      <div class="addtocartcontainer_popup_details" style="margin-top: 40px;">
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
            <div class="tab-pane fade row" id="tab-4" style="margin-top:5px">
            	<div class="col-md-12">
				<table class="bor" style="width:100%">
                <tbody><tr>
                  <td><a href="javascript:;" class="color1" onclick="javascript:change_wallcolor('#FFFBF8');"></a></td>
                  <td><a href="javascript:;" class="color2" onclick="javascript:change_wallcolor('#FFFCF7');"></a></td>
                  <td><a href="javascript:;" class="color3" onclick="javascript:change_wallcolor('#FFFFFF');"></a></td>
                  <td><a href="javascript:;" class="color4" onclick="javascript:change_wallcolor('#F7FFFF');"></a></td>
                  <td><a href="javascript:;" class="color5" onclick="javascript:change_wallcolor('#F7F4FF');"></a></td>
                  <td><a href="javascript:;" class="color6" onclick="javascript:change_wallcolor('#FEF7FF');"></a></td>
                  <td><a href="javascript:;" class="color7" onclick="javascript:change_wallcolor('#FFF7F6');"></a></td>
                  <td><a href="javascript:;" class="color8" onclick="javascript:change_wallcolor('#FFFBFF');"></a></td>
                  <td><a href="javascript:;" class="color9" onclick="javascript:change_wallcolor('#EDDFF0');"></a></td>
                  <td><a href="javascript:;" class="color10" onclick="javascript:change_wallcolor('#F0DFEF');"></a></td>
                  <td><a href="javascript:;" class="color11" onclick="javascript:change_wallcolor('#FFDAEF');"></a></td>
                  <td><a href="javascript:;" class="color12" onclick="javascript:change_wallcolor('#FFDBE7');"></a></td>
                  <td><a href="javascript:;" class="color13" onclick="javascript:change_wallcolor('#F0DFEF');"></a></td>
                  <td><a href="javascript:;" class="color14" onclick="javascript:change_wallcolor('#FFDAE7');"></a></td>
                  <td><a href="javascript:;" class="color15" onclick="javascript:change_wallcolor('#DCE8F4');"></a></td>
                  <td><a href="javascript:;" class="color16" onclick="javascript:change_wallcolor('#DFE6F8');"></a></td>
                  <td><a href="javascript:;" class="color17" onclick="javascript:change_wallcolor('#BDB76B');"></a></td>
                  <td><a href="javascript:;" class="color18" onclick="javascript:change_wallcolor('#FF8C00');"></a></td>
                  <td><a href="javascript:;" class="color19" onclick="javascript:change_wallcolor('#9932CC');"></a></td>
                  <td><a href="javascript:;" class="color20" onclick="javascript:change_wallcolor('#E9967A');"></a></td>
                  <td><a href="javascript:;" class="color21" onclick="javascript:change_wallcolor('#8FBC8F');"></a></td>
                  <td><a href="javascript:;" class="color22" onclick="javascript:change_wallcolor('#FFD700');"></a></td>
                  <td><a href="javascript:;" class="color23" onclick="javascript:change_wallcolor('#DAA520');"></a></td>
                  <td><a href="javascript:;" class="color24" onclick="javascript:change_wallcolor('#008000');"></a></td>
                  <td><a href="javascript:;" class="color25" onclick="javascript:change_wallcolor('#ADFF2F');"></a></td>
                  <td><a href="javascript:;" class="color26" onclick="javascript:change_wallcolor('#FF69B4');"></a></td>
                  <td><a href="javascript:;" class="color27" onclick="javascript:change_wallcolor('#CD5C5C');"></a></td>
                  <td><a href="javascript:;" class="color28" onclick="javascript:change_wallcolor('#FFFFF0');"></a></td>
                  <td><a href="javascript:;" class="color29" onclick="javascript:change_wallcolor('#F0E68C');"></a></td>
                  <td><a href="javascript:;" class="color30" onclick="javascript:change_wallcolor('#E6E6FA');"></a></td>
                  <td><a href="javascript:;" class="color31" onclick="javascript:change_wallcolor('#FFF0F5');"></a></td>
                  <td><a href="javascript:;" class="color32" onclick="javascript:change_wallcolor('#7CFC00');"></a></td>
                  <td><a href="javascript:;" class="color33" onclick="javascript:change_wallcolor('#FFFACD');"></a></td>
                  <td><a href="javascript:;" class="color34" onclick="javascript:change_wallcolor('#ADD8E6');"></a></td>
                  <td><a href="javascript:;" class="color35" onclick="javascript:change_wallcolor('#F08080');"></a></td>
                  <td><a href="javascript:;" class="color36" onclick="javascript:change_wallcolor('#E0FFFF');"></a></td>
                  <td><a href="javascript:;" class="color37" onclick="javascript:change_wallcolor('#FAFAD2');"></a></td>
                  <td><a href="javascript:;" class="color38" onclick="javascript:change_wallcolor('#D3D3D3');"></a></td>
                  <td><a href="javascript:;" class="color39" onclick="javascript:change_wallcolor('#90EE90');"></a></td>
                  <td><a href="javascript:;" class="color40" onclick="javascript:change_wallcolor('#FFB6C1');"></a></td>
                  <td><a href="javascript:;" class="color41" onclick="javascript:change_wallcolor('#FFA07A');"></a></td>
                  <td><a href="javascript:;" class="color42" onclick="javascript:change_wallcolor('#20B2AA');"></a></td>
                  <td><a href="javascript:;" class="color43" onclick="javascript:change_wallcolor('#87CEFA');"></a></td>
                  <td><a href="javascript:;" class="color44" onclick="javascript:change_wallcolor('#778899');"></a></td>
                  <td><a href="javascript:;" class="color45" onclick="javascript:change_wallcolor('#B0C4DE');"></a></td>
                  <td><a href="javascript:;" class="color46" onclick="javascript:change_wallcolor('#FFFFE0');"></a></td>
                  <td><a href="javascript:;" class="color47" onclick="javascript:change_wallcolor('#00FF00');"></a></td>
                  <td><a href="javascript:;" class="color48" onclick="javascript:change_wallcolor('#32CD32');"></a></td>
                  <td><a href="javascript:;" class="color49" onclick="javascript:change_wallcolor('#FAF0E6');"></a></td>
                  <td><a href="javascript:;" class="color50" onclick="javascript:change_wallcolor('#FF00FF');"></a></td>
                  <td><a href="javascript:;" class="color51" onclick="javascript:change_wallcolor('#66CDAA');"></a></td>
                  <td><a href="javascript:;" class="color52" onclick="javascript:change_wallcolor('#BA55D3');"></a></td>
                  <td><a href="javascript:;" class="color53" onclick="javascript:change_wallcolor('#9370DB');"></a></td>
                </tr>
                <tr>
                  <td><a href="javascript:;" class="color54" onclick="javascript:change_wallcolor('#3CB371');"></a></td>
                  <td><a href="javascript:;" class="color55" onclick="javascript:change_wallcolor('#7B68EE');"></a></td>
                  <td><a href="javascript:;" class="color56" onclick="javascript:change_wallcolor('#00FA9A');"></a></td>
                  <td><a href="javascript:;" class="color57" onclick="javascript:change_wallcolor('#48D1CC');"></a></td>
                  <td><a href="javascript:;" class="color58" onclick="javascript:change_wallcolor('#C71585');"></a></td>
                  <td><a href="javascript:;" class="color59" onclick="javascript:change_wallcolor('#191970');"></a></td>
                  <td><a href="javascript:;" class="color60" onclick="javascript:change_wallcolor('#F5FFFA');"></a></td>
                  <td><a href="javascript:;" class="color61" onclick="javascript:change_wallcolor('#FFE4E1');"></a></td>
                  <td><a href="javascript:;" class="color62" onclick="javascript:change_wallcolor('#FFE4B5');"></a></td>
                  <td><a href="javascript:;" class="color63" onclick="javascript:change_wallcolor('#FFDEAD');"></a></td>
                  <td><a href="javascript:;" class="color64" onclick="javascript:change_wallcolor('#FDF5E6');"></a></td>
                  <td><a href="javascript:;" class="color65" onclick="javascript:change_wallcolor('#808000');"></a></td>
                  <td><a href="javascript:;" class="color66" onclick="javascript:change_wallcolor('#6B8E23');"></a></td>
                  <td><a href="javascript:;" class="color67" onclick="javascript:change_wallcolor('#FFA500');"></a></td>
                  <td><a href="javascript:;" class="color68" onclick="javascript:change_wallcolor('#FF4500');"></a></td>
                  <td><a href="javascript:;" class="color69" onclick="javascript:change_wallcolor('#DA70D6');"></a></td>
                  <td><a href="javascript:;" class="color70" onclick="javascript:change_wallcolor('#EEE8AA');"></a></td>
                  <td><a href="javascript:;" class="color71" onclick="javascript:change_wallcolor('#98FB98');"></a></td>
                  <td><a href="javascript:;" class="color72" onclick="javascript:change_wallcolor('#AFEEEE');"></a></td>
                  <td><a href="javascript:;" class="color73" onclick="javascript:change_wallcolor('#DB7093');"></a></td>
                  <td><a href="javascript:;" class="color74" onclick="javascript:change_wallcolor('#FFEFD5');"></a></td>
                  <td><a href="javascript:;" class="color75" onclick="javascript:change_wallcolor('#FFDAB9');"></a></td>
                  <td><a href="javascript:;" class="color76" onclick="javascript:change_wallcolor('#CD853F');"></a></td>
                  <td><a href="javascript:;" class="color77" onclick="javascript:change_wallcolor('#FFC0CB');"></a></td>
                  <td><a href="javascript:;" class="color78" onclick="javascript:change_wallcolor('#DDA0DD');"></a></td>
                  <td><a href="javascript:;" class="color79" onclick="javascript:change_wallcolor('#B0E0E6');"></a></td>
                  <td><a href="javascript:;" class="color80" onclick="javascript:change_wallcolor('#FF0000');"></a></td>
                  <td><a href="javascript:;" class="color81" onclick="javascript:change_wallcolor('#FFC0CB');"></a></td>
                  <td><a href="javascript:;" class="color82" onclick="javascript:change_wallcolor('#BC8F8F');"></a></td>
                  <td><a href="javascript:;" class="color83" onclick="javascript:change_wallcolor('#4169E1');"></a></td>
                  <td><a href="javascript:;" class="color84" onclick="javascript:change_wallcolor('#8B4513');"></a></td>
                  <td><a href="javascript:;" class="color85" onclick="javascript:change_wallcolor('#FA8072');"></a></td>
                  <td><a href="javascript:;" class="color86" onclick="javascript:change_wallcolor('#F4A460');"></a></td>
                  <td><a href="javascript:;" class="color87" onclick="javascript:change_wallcolor('#2E8B57');"></a></td>
                  <td><a href="javascript:;" class="color88" onclick="javascript:change_wallcolor('#FFF5EE');"></a></td>
                  <td><a href="javascript:;" class="color89" onclick="javascript:change_wallcolor('#A0522D');"></a></td>
                  <td><a href="javascript:;" class="color90" onclick="javascript:change_wallcolor('#C0C0C0');"></a></td>
                  <td><a href="javascript:;" class="color91" onclick="javascript:change_wallcolor('#87CEEB');"></a></td>
                  <td><a href="javascript:;" class="color92" onclick="javascript:change_wallcolor('#6A5ACD');"></a></td>
                  <td><a href="javascript:;" class="color93" onclick="javascript:change_wallcolor('#708090');"></a></td>
                  <td><a href="javascript:;" class="color94" onclick="javascript:change_wallcolor('#00FF7F');"></a></td>
                  <td><a href="javascript:;" class="color95" onclick="javascript:change_wallcolor('#D2B48C');"></a></td>
                  <td><a href="javascript:;" class="color96" onclick="javascript:change_wallcolor('#008080');"></a></td>
                  <td><a href="javascript:;" class="color97" onclick="javascript:change_wallcolor('#D8BFD8');"></a></td>
                  <td><a href="javascript:;" class="color98" onclick="javascript:change_wallcolor('#FF6347');"></a></td>
                  <td><a href="javascript:;" class="color99" onclick="javascript:change_wallcolor('#40E0D0');"></a></td>
                  <td><a href="javascript:;" class="color100" onclick="javascript:change_wallcolor('#EE82EE');"></a></td>
                  <td><a href="javascript:;" class="color101" onclick="javascript:change_wallcolor('#F5DEB3');"></a></td>
                  <td><a href="javascript:;" class="color102" onclick="javascript:change_wallcolor('#FFFFFF');"></a></td>
                  <td><a href="javascript:;" class="color103" onclick="javascript:change_wallcolor('#F5F5F5');"></a></td>
                  <td><a href="javascript:;" class="color104" onclick="javascript:change_wallcolor('#FFFF00');"></a></td>
                  <td><a href="javascript:;" class="color105" onclick="javascript:change_wallcolor('#9ACD32');"></a></td>
                  <td><a href="javascript:;" class="color106" onclick="javascript:change_wallcolor('#B0171F');"></a></td>
                </tr>
                <tr>
                  <td><a href="javascript:;" class="color107" onclick="javascript:change_wallcolor('#DC143C');"></a></td>
                  <td><a href="javascript:;" class="color108" onclick="javascript:change_wallcolor('#FFAEB9');"></a></td>
                  <td><a href="javascript:;" class="color109" onclick="javascript:change_wallcolor('#EEA2AD');"></a></td>
                  <td><a href="javascript:;" class="color110" onclick="javascript:change_wallcolor('#CD8C95');"></a></td>
                  <td><a href="javascript:;" class="color111" onclick="javascript:change_wallcolor('#8B5F65');"></a></td>
                  <td><a href="javascript:;" class="color112" onclick="javascript:change_wallcolor('#FFB5C5');"></a></td>
                  <td><a href="javascript:;" class="color113" onclick="javascript:change_wallcolor('#EEA9B8');"></a></td>
                  <td><a href="javascript:;" class="color114" onclick="javascript:change_wallcolor('#CD919E');"></a></td>
                  <td><a href="javascript:;" class="color115" onclick="javascript:change_wallcolor('#8B636C');"></a></td>
                  <td><a href="javascript:;" class="color116" onclick="javascript:change_wallcolor('#FF82AB');"></a></td>
                  <td><a href="javascript:;" class="color117" onclick="javascript:change_wallcolor('#EE799F');"></a></td>
                  <td><a href="javascript:;" class="color118" onclick="javascript:change_wallcolor('#CD6889');"></a></td>
                  <td><a href="javascript:;" class="color119" onclick="javascript:change_wallcolor('#8B475D');"></a></td>
                  <td><a href="javascript:;" class="color120" onclick="javascript:change_wallcolor('#EEE0E5');"></a></td>
                  <td><a href="javascript:;" class="color121" onclick="javascript:change_wallcolor('#CDC1C5');"></a></td>
                  <td><a href="javascript:;" class="color122" onclick="javascript:change_wallcolor('#8B8386');"></a></td>
                  <td><a href="javascript:;" class="color123" onclick="javascript:change_wallcolor('#FF3E96');"></a></td>
                  <td><a href="javascript:;" class="color124" onclick="javascript:change_wallcolor('#EE3A8C');"></a></td>
                  <td><a href="javascript:;" class="color125" onclick="javascript:change_wallcolor('#CD3278');"></a></td>
                  <td><a href="javascript:;" class="color126" onclick="javascript:change_wallcolor('#8B2252');"></a></td>
                  <td><a href="javascript:;" class="color127" onclick="javascript:change_wallcolor('#FF6EB4');"></a></td>
                  <td><a href="javascript:;" class="color128" onclick="javascript:change_wallcolor('#EE6AA7');"></a></td>
                  <td><a href="javascript:;" class="color129" onclick="javascript:change_wallcolor('#CD6090');"></a></td>
                  <td><a href="javascript:;" class="color130" onclick="javascript:change_wallcolor('#8B3A62');"></a></td>
                  <td><a href="javascript:;" class="color131" onclick="javascript:change_wallcolor('#872657');"></a></td>
                  <td><a href="javascript:;" class="color132" onclick="javascript:change_wallcolor('#FF1493');"></a></td>
                  <td><a href="javascript:;" class="color133" onclick="javascript:change_wallcolor('#EE1289');"></a></td>
                  <td><a href="javascript:;" class="color134" onclick="javascript:change_wallcolor('#CD1076');"></a></td>
                  <td><a href="javascript:;" class="color135" onclick="javascript:change_wallcolor('#8B0A50');"></a></td>
                  <td><a href="javascript:;" class="color136" onclick="javascript:change_wallcolor('#FF34B3');"></a></td>
                  <td><a href="javascript:;" class="color137" onclick="javascript:change_wallcolor('#EE30A7');"></a></td>
                  <td><a href="javascript:;" class="color138" onclick="javascript:change_wallcolor('#CD2990');"></a></td>
                  <td><a href="javascript:;" class="color139" onclick="javascript:change_wallcolor('#8B1C62');"></a></td>
                  <td><a href="javascript:;" class="color140" onclick="javascript:change_wallcolor('#C71585');"></a></td>
                  <td><a href="javascript:;" class="color141" onclick="javascript:change_wallcolor('#D02090');"></a></td>
                  <td><a href="javascript:;" class="color142" onclick="javascript:change_wallcolor('#FF83FA');"></a></td>
                  <td><a href="javascript:;" class="color143" onclick="javascript:change_wallcolor('#EE7AE9');"></a></td>
                  <td><a href="javascript:;" class="color144" onclick="javascript:change_wallcolor('#CD69C9');"></a></td>
                  <td><a href="javascript:;" class="color145" onclick="javascript:change_wallcolor('#8B4789');"></a></td>
                  <td><a href="javascript:;" class="color146" onclick="javascript:change_wallcolor('#FFE1FF');"></a></td>
                  <td><a href="javascript:;" class="color147" onclick="javascript:change_wallcolor('#EED2EE');"></a></td>
                  <td><a href="javascript:;" class="color148" onclick="javascript:change_wallcolor('#CDB5CD');"></a></td>
                  <td><a href="javascript:;" class="color149" onclick="javascript:change_wallcolor('#8B7B8B');"></a></td>
                  <td><a href="javascript:;" class="color150" onclick="javascript:change_wallcolor('#FFBBFF');"></a></td>
                  <td><a href="javascript:;" class="color151" onclick="javascript:change_wallcolor('#EEAEEE');"></a></td>
                  <td><a href="javascript:;" class="color152" onclick="javascript:change_wallcolor('#CD96CD');"></a></td>
                  <td><a href="javascript:;" class="color153" onclick="javascript:change_wallcolor('#8B668B');"></a></td>
                  <td><a href="javascript:;" class="color154" onclick="javascript:change_wallcolor('#EE00EE');"></a></td>
                  <td><a href="javascript:;" class="color155" onclick="javascript:change_wallcolor('#CD00CD');"></a></td>
                  <td><a href="javascript:;" class="color156" onclick="javascript:change_wallcolor('#8B008B');"></a></td>
                  <td><a href="javascript:;" class="color157" onclick="javascript:change_wallcolor('#800080');"></a></td>
                  <td><a href="javascript:;" class="color158" onclick="javascript:change_wallcolor('#E066FF');"></a></td>
                  <td><a href="javascript:;" class="color159" onclick="javascript:change_wallcolor('#D15FEE');"></a></td>
                </tr>
                <tr>
                  <td><a href="javascript:;" class="color160" onclick="javascript:change_wallcolor('#B452CD');"></a></td>
                  <td><a href="javascript:;" class="color161" onclick="javascript:change_wallcolor('#7A378B');"></a></td>
                  <td><a href="javascript:;" class="color162" onclick="javascript:change_wallcolor('#9400D3');"></a></td>
                  <td><a href="javascript:;" class="color163" onclick="javascript:change_wallcolor('#BF3EFF');"></a></td>
                  <td><a href="javascript:;" class="color164" onclick="javascript:change_wallcolor('#B23AEE');"></a></td>
                  <td><a href="javascript:;" class="color165" onclick="javascript:change_wallcolor('#9A32CD');"></a></td>
                  <td><a href="javascript:;" class="color166" onclick="javascript:change_wallcolor('#68228B');"></a></td>
                  <td><a href="javascript:;" class="color167" onclick="javascript:change_wallcolor('#4B0082');"></a></td>
                  <td><a href="javascript:;" class="color168" onclick="javascript:change_wallcolor('#8A2BE2');"></a></td>
                  <td><a href="javascript:;" class="color169" onclick="javascript:change_wallcolor('#9B30FF');"></a></td>
                  <td><a href="javascript:;" class="color170" onclick="javascript:change_wallcolor('#912CEE');"></a></td>
                  <td><a href="javascript:;" class="color171" onclick="javascript:change_wallcolor('#7D26CD');"></a></td>
                  <td><a href="javascript:;" class="color172" onclick="javascript:change_wallcolor('#551A8B');"></a></td>
                  <td><a href="javascript:;" class="color173" onclick="javascript:change_wallcolor('#AB82FF');"></a></td>
                  <td><a href="javascript:;" class="color174" onclick="javascript:change_wallcolor('#9F79EE');"></a></td>
                  <td><a href="javascript:;" class="color175" onclick="javascript:change_wallcolor('#8968CD');"></a></td>
                  <td><a href="javascript:;" class="color176" onclick="javascript:change_wallcolor('#5D478B');"></a></td>
                  <td><a href="javascript:;" class="color177" onclick="javascript:change_wallcolor('#483D8B');"></a></td>
                  <td><a href="javascript:;" class="color178" onclick="javascript:change_wallcolor('#8470FF');"></a></td>
                  <td><a href="javascript:;" class="color179" onclick="javascript:change_wallcolor('#836FFF');"></a></td>
                  <td><a href="javascript:;" class="color180" onclick="javascript:change_wallcolor('#7A67EE');"></a></td>
                  <td><a href="javascript:;" class="color181" onclick="javascript:change_wallcolor('#6959CD');"></a></td>
                  <td><a href="javascript:;" class="color182" onclick="javascript:change_wallcolor('#473C8B');"></a></td>
                  <td><a href="javascript:;" class="color183" onclick="javascript:change_wallcolor('#F8F8FF');"></a></td>
                  <td><a href="javascript:;" class="color184" onclick="javascript:change_wallcolor('#0000FF');"></a></td>
                  <td><a href="javascript:;" class="color185" onclick="javascript:change_wallcolor('#0000EE');"></a></td>
                  <td><a href="javascript:;" class="color186" onclick="javascript:change_wallcolor('#0000CD');"></a></td>
                  <td><a href="javascript:;" class="color187" onclick="javascript:change_wallcolor('#00008B');"></a></td>
                  <td><a href="javascript:;" class="color188" onclick="javascript:change_wallcolor('#000080');"></a></td>
                  <td><a href="javascript:;" class="color189" onclick="javascript:change_wallcolor('#3D59AB');"></a></td>
                  <td><a href="javascript:;" class="color190" onclick="javascript:change_wallcolor('#4876FF');"></a></td>
                  <td><a href="javascript:;" class="color191" onclick="javascript:change_wallcolor('#436EEE');"></a></td>
                  <td><a href="javascript:;" class="color192" onclick="javascript:change_wallcolor('#3A5FCD');"></a></td>
                  <td><a href="javascript:;" class="color193" onclick="javascript:change_wallcolor('#27408B');"></a></td>
                  <td><a href="javascript:;" class="color194" onclick="javascript:change_wallcolor('#6495ED');"></a></td>
                  <td><a href="javascript:;" class="color195" onclick="javascript:change_wallcolor('#CAE1FF');"></a></td>
                  <td><a href="javascript:;" class="color196" onclick="javascript:change_wallcolor('#BCD2EE');"></a></td>
                  <td><a href="javascript:;" class="color197" onclick="javascript:change_wallcolor('#A2B5CD');"></a></td>
                  <td><a href="javascript:;" class="color198" onclick="javascript:change_wallcolor('#6E7B8B');"></a></td>
                  <td><a href="javascript:;" class="color199" onclick="javascript:change_wallcolor('#C6E2FF');"></a></td>
                  <td><a href="javascript:;" class="color200" onclick="javascript:change_wallcolor('#B9D3EE');"></a></td>
                  <td><a href="javascript:;" class="color201" onclick="javascript:change_wallcolor('#9FB6CD');"></a></td>
                  <td><a href="javascript:;" class="color202" onclick="javascript:change_wallcolor('#6C7B8B');"></a></td>
                  <td><a href="javascript:;" class="color203" onclick="javascript:change_wallcolor('#1E90FF');"></a></td>
                  <td><a href="javascript:;" class="color204" onclick="javascript:change_wallcolor('#1C86EE');"></a></td>
                  <td><a href="javascript:;" class="color205" onclick="javascript:change_wallcolor('#1874CD');"></a></td>
                  <td><a href="javascript:;" class="color206" onclick="javascript:change_wallcolor('#104E8B');"></a></td>
                  <td><a href="javascript:;" class="color207" onclick="javascript:change_wallcolor('#F0F8FF');"></a></td>
                  <td><a href="javascript:;" class="color208" onclick="javascript:change_wallcolor('#4682B4');"></a></td>
                  <td><a href="javascript:;" class="color209" onclick="javascript:change_wallcolor('#63B8FF');"></a></td>
                  <td><a href="javascript:;" class="color210" onclick="javascript:change_wallcolor('#5CACEE');"></a></td>
                  <td><a href="javascript:;" class="color211" onclick="javascript:change_wallcolor('#4F94CD');"></a></td>
                  <td><a href="javascript:;" class="color212" onclick="javascript:change_wallcolor('#36648B');"></a></td>
                </tr>
                <tr>
                  <td><a href="javascript:;" class="color213" onclick="javascript:change_wallcolor('#B0E2FF');"></a></td>
                  <td><a href="javascript:;" class="color214" onclick="javascript:change_wallcolor('#A4D3EE');"></a></td>
                  <td><a href="javascript:;" class="color215" onclick="javascript:change_wallcolor(#8DB6CD'');"></a></td>
                  <td><a href="javascript:;" class="color216" onclick="javascript:change_wallcolor('#607B8B');"></a></td>
                  <td><a href="javascript:;" class="color217" onclick="javascript:change_wallcolor('#87CEFF');"></a></td>
                  <td><a href="javascript:;" class="color218" onclick="javascript:change_wallcolor('#7EC0EE');"></a></td>
                  <td><a href="javascript:;" class="color219" onclick="javascript:change_wallcolor('#6CA6CD');"></a></td>
                  <td><a href="javascript:;" class="color220" onclick="javascript:change_wallcolor('#4A708B');"></a></td>
                  <td><a href="javascript:;" class="color221" onclick="javascript:change_wallcolor('#00BFFF');"></a></td>
                  <td><a href="javascript:;" class="color222" onclick="javascript:change_wallcolor('#00B2EE');"></a></td>
                  <td><a href="javascript:;" class="color223" onclick="javascript:change_wallcolor('#009ACD');"></a></td>
                  <td><a href="javascript:;" class="color224" onclick="javascript:change_wallcolor('#33A1C9');"></a></td>
                  <td><a href="javascript:;" class="color225" onclick="javascript:change_wallcolor('#BFEFFF');"></a></td>
                  <td><a href="javascript:;" class="color226" onclick="javascript:change_wallcolor('#B2DFEE');"></a></td>
                  <td><a href="javascript:;" class="color227" onclick="javascript:change_wallcolor('#9AC0CD');"></a></td>
                  <td><a href="javascript:;" class="color228" onclick="javascript:change_wallcolor('#68838B');"></a></td>
                  <td><a href="javascript:;" class="color229" onclick="javascript:change_wallcolor('#98F5FF');"></a></td>
                  <td><a href="javascript:;" class="color230" onclick="javascript:change_wallcolor('#8EE5EE');"></a></td>
                  <td><a href="javascript:;" class="color231" onclick="javascript:change_wallcolor('#7AC5CD');"></a></td>
                  <td><a href="javascript:;" class="color232" onclick="javascript:change_wallcolor('#53868B');"></a></td>
                  <td><a href="javascript:;" class="color233" onclick="javascript:change_wallcolor('#00F5FF');"></a></td>
                  <td><a href="javascript:;" class="color234" onclick="javascript:change_wallcolor('#00E5EE');"></a></td>
                  <td><a href="javascript:;" class="color235" onclick="javascript:change_wallcolor('#00C5CD');"></a></td>
                  <td><a href="javascript:;" class="color236" onclick="javascript:change_wallcolor('#00868B');"></a></td>
                  <td><a href="javascript:;" class="color237" onclick="javascript:change_wallcolor('#5F9EA0');"></a></td>
                  <td><a href="javascript:;" class="color238" onclick="javascript:change_wallcolor('#00CED1');"></a></td>
                  <td><a href="javascript:;" class="color239" onclick="javascript:change_wallcolor('#F0FFFF');"></a></td>
                  <td><a href="javascript:;" class="color240" onclick="javascript:change_wallcolor('#E0EEEE');"></a></td>
                  <td><a href="javascript:;" class="color241" onclick="javascript:change_wallcolor('#C1CDCD');"></a></td>
                  <td><a href="javascript:;" class="color242" onclick="javascript:change_wallcolor('#838B8B');"></a></td>
                  <td><a href="javascript:;" class="color243" onclick="javascript:change_wallcolor('#00688B');"></a></td>
                  <td><a href="javascript:;" class="color244" onclick="javascript:change_wallcolor('#000000');"></a></td>
                  <td><a href="javascript:;" class="color245" onclick="javascript:change_wallcolor('#B4CDCD');"></a></td>
                  <td><a href="javascript:;" class="color246" onclick="javascript:change_wallcolor('#7A8B8B');"></a></td>
                  <td><a href="javascript:;" class="color247" onclick="javascript:change_wallcolor('#BBFFFF');"></a></td>
                  <td><a href="javascript:;" class="color248" onclick="javascript:change_wallcolor('#AEEEEE');"></a></td>
                  <td><a href="javascript:;" class="color249" onclick="javascript:change_wallcolor('#96CDCD');"></a></td>
                  <td><a href="javascript:;" class="color250" onclick="javascript:change_wallcolor('#668B8B');"></a></td>
                  <td><a href="javascript:;" class="color251" onclick="javascript:change_wallcolor('#2F4F4F');"></a></td>
                  <td><a href="javascript:;" class="color252" onclick="javascript:change_wallcolor('#97FFFF');"></a></td>
                  <td><a href="javascript:;" class="color253" onclick="javascript:change_wallcolor('#8DEEEE');"></a></td>
                  <td><a href="javascript:;" class="color254" onclick="javascript:change_wallcolor('#79CDCD');"></a></td>
                  <td><a href="javascript:;" class="color255" onclick="javascript:change_wallcolor('#528B8B');"></a></td>
                  <td><a href="javascript:;" class="color256" onclick="javascript:change_wallcolor('#00FFFF');"></a></td>
                  <td><a href="javascript:;" class="color257" onclick="javascript:change_wallcolor('#00EEEE');"></a></td>
                  <td><a href="javascript:;" class="color258" onclick="javascript:change_wallcolor('#00CDCD');"></a></td>
                  <td><a href="javascript:;" class="color259" onclick="javascript:change_wallcolor('#008B8B');"></a></td>
                  <td><a href="javascript:;" class="color260" onclick="javascript:change_wallcolor('#03A89E');"></a></td>
                  <td><a href="javascript:;" class="color261" onclick="javascript:change_wallcolor('#808A87');"></a></td>
                  <td><a href="javascript:;" class="color262" onclick="javascript:change_wallcolor('#00C78C');"></a></td>
                  <td><a href="javascript:;" class="color263" onclick="javascript:change_wallcolor('#7FFFD4');"></a></td>
                  <td><a href="javascript:;" class="color264" onclick="javascript:change_wallcolor('#76EEC6');"></a></td>
                  <td><a href="javascript:;" class="color265" onclick="javascript:change_wallcolor('#00EE76');"></a></td>
                </tr>
                <tr>
                  <td><a href="javascript:;" class="color266" onclick="javascript:change_wallcolor('#00CD66');"></a></td>
                  <td><a href="javascript:;" class="color267" onclick="javascript:change_wallcolor('#008B45');"></a></td>
                  <td><a href="javascript:;" class="color268" onclick="javascript:change_wallcolor('#54FF9F');"></a></td>
                  <td><a href="javascript:;" class="color269" onclick="javascript:change_wallcolor('#4EEE94');"></a></td>
                  <td><a href="javascript:;" class="color270" onclick="javascript:change_wallcolor('#43CD80');"></a></td>
                  <td><a href="javascript:;" class="color271" onclick="javascript:change_wallcolor('#00C957');"></a></td>
                  <td><a href="javascript:;" class="color272" onclick="javascript:change_wallcolor('#BDFCC9');"></a></td>
                  <td><a href="javascript:;" class="color273" onclick="javascript:change_wallcolor('#3D9140');"></a></td>
                  <td><a href="javascript:;" class="color274" onclick="javascript:change_wallcolor('#F0FFF0');"></a></td>
                  <td><a href="javascript:;" class="color275" onclick="javascript:change_wallcolor('#E0EEE0');"></a></td>
                  <td><a href="javascript:;" class="color276" onclick="javascript:change_wallcolor('#C1CDC1');"></a></td>
                  <td><a href="javascript:;" class="color277" onclick="javascript:change_wallcolor('#838B83');"></a></td>
                  <td><a href="javascript:;" class="color278" onclick="javascript:change_wallcolor('#C1FFC1');"></a></td>
                  <td><a href="javascript:;" class="color279" onclick="javascript:change_wallcolor('#B4EEB4');"></a></td>
                  <td><a href="javascript:;" class="color280" onclick="javascript:change_wallcolor('#9BCD9B');"></a></td>
                  <td><a href="javascript:;" class="color281" onclick="javascript:change_wallcolor('#698B69');"></a></td>
                  <td><a href="javascript:;" class="color282" onclick="javascript:change_wallcolor('#9AFF9A');"></a></td>
                  <td><a href="javascript:;" class="color283" onclick="javascript:change_wallcolor('#7CCD7C');"></a></td>
                  <td><a href="javascript:;" class="color284" onclick="javascript:change_wallcolor('#548B54');"></a></td>
                  <td><a href="javascript:;" class="color285" onclick="javascript:change_wallcolor('#228B22');"></a></td>
                  <td><a href="javascript:;" class="color286" onclick="javascript:change_wallcolor('#00EE00');"></a></td>
                  <td><a href="javascript:;" class="color287" onclick="javascript:change_wallcolor('#00CD00');"></a></td>
                  <td><a href="javascript:;" class="color288" onclick="javascript:change_wallcolor('#008B00');"></a></td>
                  <td><a href="javascript:;" class="color289" onclick="javascript:change_wallcolor('#006400');"></a></td>
                  <td><a href="javascript:;" class="color290" onclick="javascript:change_wallcolor('#308014');"></a></td>
                  <td><a href="javascript:;" class="color291" onclick="javascript:change_wallcolor('#7FFF00');"></a></td>
                  <td><a href="javascript:;" class="color292" onclick="javascript:change_wallcolor('#76EE00');"></a></td>
                  <td><a href="javascript:;" class="color293" onclick="javascript:change_wallcolor('#66CD00');"></a></td>
                  <td><a href="javascript:;" class="color294" onclick="javascript:change_wallcolor('#458B00');"></a></td>
                  <td><a href="javascript:;" class="color295" onclick="javascript:change_wallcolor('#CAFF70');"></a></td>
                  <td><a href="javascript:;" class="color296" onclick="javascript:change_wallcolor('#BCEE68');"></a></td>
                  <td><a href="javascript:;" class="color297" onclick="javascript:change_wallcolor('#A2CD5A');"></a></td>
                  <td><a href="javascript:;" class="color298" onclick="javascript:change_wallcolor('#6E8B3D');"></a></td>
                  <td><a href="javascript:;" class="color299" onclick="javascript:change_wallcolor('#556B2F');"></a></td>
                  <td><a href="javascript:;" class="color300" onclick="javascript:change_wallcolor('#C0FF3E');"></a></td>
                  <td><a href="javascript:;" class="color301" onclick="javascript:change_wallcolor('#B3EE3A');"></a></td>
                  <td><a href="javascript:;" class="color302" onclick="javascript:change_wallcolor('#458B74');"></a></td>
                  <td><a href="javascript:;" class="color303" onclick="javascript:change_wallcolor('#698B22');"></a></td>
                  <td><a href="javascript:;" class="color304" onclick="javascript:change_wallcolor('#EEEEE0');"></a></td>
                  <td><a href="javascript:;" class="color305" onclick="javascript:change_wallcolor('#CDCDC1');"></a></td>
                  <td><a href="javascript:;" class="color306" onclick="javascript:change_wallcolor('#8B8B83');"></a></td>
                  <td><a href="javascript:;" class="color307" onclick="javascript:change_wallcolor('#F5F5DC');"></a></td>
                  <td><a href="javascript:;" class="color308" onclick="javascript:change_wallcolor('#EEEED1');"></a></td>
                  <td><a href="javascript:;" class="color309" onclick="javascript:change_wallcolor('#CDCDB4');"></a></td>
                  <td><a href="javascript:;" class="color310" onclick="javascript:change_wallcolor('#8B8B7A');"></a></td>
                  <td><a href="javascript:;" class="color311" onclick="javascript:change_wallcolor('#EEEE00');"></a></td>
                  <td><a href="javascript:;" class="color312" onclick="javascript:change_wallcolor('#CDCD00');"></a></td>
                  <td><a href="javascript:;" class="color313" onclick="javascript:change_wallcolor('#8B8B00');"></a></td>
                  <td><a href="javascript:;" class="color314" onclick="javascript:change_wallcolor('#808069');"></a></td>
                  <td><a href="javascript:;" class="color315" onclick="javascript:change_wallcolor('#FFF68F');"></a></td>
                  <td><a href="javascript:;" class="color316" onclick="javascript:change_wallcolor('#EEE685');"></a></td>
                  <td><a href="javascript:;" class="color317" onclick="javascript:change_wallcolor('#CDC673');"></a></td>
                  <td><a href="javascript:;" class="color318" onclick="javascript:change_wallcolor('#000000');"></a></td>
                </tr>
              </tbody></table>
                                
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
                <p><a href="#">Login here</a></p>
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
            <p class="text-center" style="font-size:11px; color:#888; margin-top:6px"> 1-800-952-5592 </p>
        </div>
      </div>
</div>
      </div>
<script>
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
	padding: 10px;
	width: 120px;
	height: 120px;
}
.thumb_bg_hover:hover {
	border-left: 1px solid #d6d6d6;
	border-right: 1px solid #d6d6d6;
	background: #f1f1f1;
}
</style>