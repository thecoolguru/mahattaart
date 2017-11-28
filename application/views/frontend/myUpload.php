<script type="text/javascript">
    $(document).ready(function(){
        var session_id = '<?php echo $_SESSION['user_info'];?>';
        var url = "<?php echo base_url().'application/views/frontend/upload_images/';?>";
        //alert(session_id);
        $.ajax({
            type:"post",
            url:'<?=base_url()?>index.php/frontend/myUpload',
            data:{session_id},
            success: function(data){
            //alert(data);
            }
        });            
        $.ajax({
                type:"post",
                url:'<?=base_url()?>index.php/frontend/image_user_size',
                data:{url,session_id},
                success: function(data){
                var imagedata = JSON.parse(data);
                imagedata = ''+imagedata; 
                   if(imagedata == 'null' ){
                       window.location.href = 'photostoframe';
                   }
                var image = imagedata.split(',');       
                var total_image = image.length; 
                var total_slide = total_image/6;    
                var rem_slide = total_image%6;
                    if(total_image<=6){
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
                
                for(var slides=0;slides<=total_slide-1;slides++){
                    if(slides ==0){
                        td_inner += '<div class="row">';
                    }else{
                        td_inner += '<div class="row">';
                    }
                    for(i=0;i<6;i++){
                        if(value<total_image){
                            var k = image[value].split('*');
                            var get_data = k[1].split('x');
                            var get_data_width  = get_data[0];
                            var get_data_height = get_data[1];
                            if(get_data_width > get_data_height){
                                aspect_ratio = get_data_height/get_data_width;
                                new_width = 200;
                                new_height = Math.round(aspect_ratio*200);
                            }else if(get_data_height > get_data_width ){
                                aspect_ratio = get_data_width/get_data_height;
                                new_height = 200;
                                new_width = Math.round(aspect_ratio*200);
                            }else{
                                new_height = 200;
                                new_width = 200;
                            } 
                var img_src = "<?php echo base_url().'application/views/frontend/upload_images/';?>"+k[0];
                td_inner += '<div class="col-md-2 col-sm-2 col-sx-12"> <div style="margin:5px auto"><a href="<?=base_url()?>frontend/photostoart_inner"> <img src="'+ img_src + '" id="saved_img" width="'+new_width+'" height="'+ new_height+'" class="img-responsive"/> </a> </div></div>';            }
                value++;
                }
                td_inner += '</div>';
            }
           
             $('#session_images').html(td_inner); 
               
            }
        });
    });    
</script>

<div class="container">
    <div class="row">
        <div id="session_images" style="border: 1px solid;margin-top: 10PX;margin-bottom: 10PX;padding: 5px;">

        </div>
    </div>
</div>


