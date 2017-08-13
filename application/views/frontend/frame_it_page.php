<?php 
//echo $f_shape.$image_name.$size;

 $rep_size=str_replace('%20','',$size);
if($this->session->userdata('userid'))
{
$Obj=new Frontend();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;
//print_r($frame_sizze);
    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 
 $mat_size=2.0;
 $userid=$this->session->userdata('userid');
 
 $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;
 $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $imagsTypes= $splitUrl[5];
 $row=$this->search_model->get_image_data($img_details->images_id); 
 $baseeUrl=base_url();
 // calcuulate image ratio
$size_data = getimagesize($baseeUrl.'/frame_images/'.$img_details->images_filename);
//print_r($size_data);
$image_alignment="";
//echo $img_details->images_id;
// Step 1: detect image is horizontal, vertical or square 
//  0=>width and 1=>height :::: 4:3->1.3333 and 2:3->0.667 :::: 12,16,24,32,40,44
  $image_width=$size_data[0];
$image_height=$size_data[1];
 $image_ratio=$image_width/$image_height;
$size_array=array();
 $role_size = 24;
$lower_value = 0;

if($size_data[0]>$size_data[1])
{
	$image_alignment="horizontal";
	// height fix : w=?

         if($surface==1)// canvas
    {   
        $size_array[0]['width']=8*$image_ratio;
        $size_array[0]['height']=8;
        $size_array[1]['width']=12*$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=16*$image_ratio;
        $size_array[2]['height']=16;
        $size_array[3]['width']=20*$image_ratio;
        $size_array[3]['height']=20;
        $size_array[4]['width']=24*$image_ratio;
        $size_array[4]['height']=24;
        $size_array[5]['width']=28*$image_ratio;
        $size_array[5]['height']=28;
        $size_array[6]['width']=32*$image_ratio;
        $size_array[6]['height']=32;
        $size_array[7]['width']=36*$image_ratio;
        $size_array[7]['height']=36;
        $size_array[8]['width']=40*$image_ratio;
        $size_array[8]['height']=40;
        $size_array[9]['width']=44*$image_ratio;
        $size_array[9]['height']=44;
        $size_array[10]['width']=48*$image_ratio;
        $size_array[10]['height']=48;
        $size_array[11]['width']=50*$image_ratio;
        $size_array[11]['height']=50;


    }
	else ///// surface 4 (premimum photography/fine art) surface 3 photographic(Matte /luster)
	{
		
        $size_array[0]['width']=8*$image_ratio;
        $size_array[0]['height']=8;
        $size_array[1]['width']=12*$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=16*$image_ratio;
        $size_array[2]['height']=16;
        $size_array[3]['width']=20*$image_ratio;
        $size_array[3]['height']=20;
        $size_array[4]['width']=24*$image_ratio;
        $size_array[4]['height']=24;
        $size_array[5]['width']=28*$image_ratio;
        $size_array[5]['height']=28;
        $size_array[6]['width']=32*$image_ratio;
        $size_array[6]['height']=32;
        $size_array[7]['width']=36*$image_ratio;
        $size_array[7]['height']=36;
        $size_array[8]['width']=40*$image_ratio;
        $size_array[8]['height']=40;
        $size_array[9]['width']=44*$image_ratio;
        $size_array[9]['height']=44;

    }

}
else if($size_data[0]<$size_data[1])
{
	
$image_alignment="vertical";
	// width fix : h=?
	
    if( $surface==1)// canvas
    {    $size_array[0]['width']=8;
        $size_array[0]['height']=8*(1/$image_ratio);
        $size_array[1]['width']=12;
        $size_array[1]['height']=12*(1/$image_ratio);
        $size_array[2]['width']=16;
        $size_array[2]['height']=16*(1/$image_ratio);
        $size_array[3]['width']=20;
        $size_array[3]['height']=20*(1/$image_ratio);
        $size_array[4]['width']=24;
        $size_array[4]['height']=24*(1/$image_ratio);
        $size_array[5]['width']=28;
        $size_array[5]['height']=28*(1/$image_ratio);
        $size_array[6]['width']=32;
        $size_array[6]['height']=32*(1/$image_ratio);
        $size_array[7]['width']=36;
        $size_array[7]['height']=36*(1/$image_ratio);
        $size_array[8]['width']=40;
        $size_array[8]['height']=40*(1/$image_ratio);
        $size_array[9]['width']=44;
        $size_array[9]['height']=44*(1/$image_ratio);
        $size_array[10]['width']=48;
        $size_array[10]['height']=48*(1/$image_ratio);
        $size_array[11]['width']=50;
        $size_array[11]['height']=50*(1/$image_ratio);

    }

    else
	{  /////// surface 4 (premimum photography/fine art) surface 3 photographic(Matte /luster)
       
        $size_array[0]['width']=8;
        $size_array[0]['height']=8*(1/$image_ratio);
        $size_array[1]['width']=12;
        $size_array[1]['height']=12*(1/$image_ratio);
        $size_array[2]['width']=16;
        $size_array[2]['height']=16*(1/$image_ratio);
        $size_array[3]['width']=20;
        $size_array[3]['height']=20*(1/$image_ratio);
        $size_array[4]['width']=24;
        $size_array[4]['height']=24*(1/$image_ratio);
        $size_array[5]['width']=28;
        $size_array[5]['height']=28*(1/$image_ratio);
        $size_array[6]['width']=32;
        $size_array[6]['height']=32*(1/$image_ratio);
        $size_array[7]['width']=36;
        $size_array[7]['height']=36*(1/$image_ratio);
        $size_array[8]['width']=40;
        $size_array[8]['height']=40*(1/$image_ratio);
        $size_array[9]['width']=44;
        $size_array[9]['height']=44*(1/$image_ratio);
	}
}
else 
{
	$image_alignment="square";
        

if($surface==1)// canvas
    {   
        $size_array[0]['width']=8*$image_ratio;
        $size_array[0]['height']=8;
        $size_array[1]['width']=12*$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=16*$image_ratio;
        $size_array[2]['height']=16;
        $size_array[3]['width']=20*$image_ratio;
        $size_array[3]['height']=20;
        $size_array[4]['width']=24*$image_ratio;
        $size_array[4]['height']=24;
        $size_array[5]['width']=28*$image_ratio;
        $size_array[5]['height']=28;
        $size_array[6]['width']=32*$image_ratio;
        $size_array[6]['height']=32;
        $size_array[7]['width']=36*$image_ratio;
        $size_array[7]['height']=36;
        $size_array[8]['width']=40*$image_ratio;
        $size_array[8]['height']=40;
        $size_array[9]['width']=44*$image_ratio;
        $size_array[9]['height']=44;
        $size_array[10]['width']=48*$image_ratio;
        $size_array[10]['height']=48;
        $size_array[11]['width']=50*$image_ratio;
        $size_array[11]['height']=50;

    }else{ ///// surface 4 (premimum photography/fine art) surface 3 photographic(Matte /luster)

        $size_array[0]['width']=8*$image_ratio;
        $size_array[0]['height']=8;
        $size_array[1]['width']=12*$image_ratio;
        $size_array[1]['height']=12;
        $size_array[2]['width']=16*$image_ratio;
        $size_array[2]['height']=16;
        $size_array[3]['width']=20*$image_ratio;
        $size_array[3]['height']=20;
        $size_array[4]['width']=24*$image_ratio;
        $size_array[4]['height']=24;
        $size_array[5]['width']=28*$image_ratio;
        $size_array[5]['height']=28;
        $size_array[6]['width']=32*$image_ratio;
        $size_array[6]['height']=32;
        $size_array[7]['width']=36*$image_ratio;
        $size_array[7]['height']=36;
        $size_array[8]['width']=40*$image_ratio;
        $size_array[8]['height']=40;
        $size_array[9]['width']=44*$image_ratio;
        $size_array[9]['height']=44;
    }// end if condition
        
    }
    //echo $image_alignment;
   $fir_width=$size_array[0]['width']/6 * 720/10;
$fir_height=$size_array[0]['height']/6*720/10;

                                                 
?>
<script>
     //window.onload=OnLoad_function('101 Black.jpg','0.75X0.75','40.00','Black','60','0.75','12','8','Horizontal')
   
   
    
    function myfuntest(a,i,j,k,l,m,n,o,d)
{    

//alert(j+','+k+'x'+l+'x'+l)
    document.getElementById('frame_color').value=k;
    
   if(d=="Vertical")
   {
      
    var dert= "<?php echo base_url()?>uploaded_pdf/new vertical/";
    
          +$('div.main').css('background','url("'+dert+a+'")');
       +$('div.main').css('background-size','cover');
       //alert(dert+''+a);
   }else
   if(d=="Slim")
   {
      
    var dert= "<?php echo base_url()?>uploaded_pdf/slim/";
          +$('div.main').css('background','url("'+dert+a+'")');
       +$('div.main').css('background-size','cover');
   }
    else if(d=="Horizontal")
      {
    //  alert('horizontal')
       
       var dert= "<?php echo base_url()?>uploaded_pdf/horizontal/";
       //alert(dert)
          +$('div.mainhor').css({'background':'url("'+dert+a+'") no-repeat','padding:55px'});
       +$('div.mainhor').css('background-size','cover');
   }else if(d=="Square")
      {
     alert('squre')
       
       var dert= "<?php echo base_url()?>uploaded_pdf/square/";
       

          +$('div.mainhor').css('background','url("'+dert+a+'") no-repeat');
       +$('div.mainhor').css('background-size','cover');
   }else if(d=="Panoramic")
      {
     alert('panormic')
      
       var dert= "<?php echo base_url()?>uploaded_pdf/Panoramic/";
       

          +$('div.mainhor').css('background','url("'+dert+a+'") no-repeat');
       +$('div.mainhor').css('background-size','cover');
   }

 

}
function change_color(s,a,b)
{
//alert(b);
var dertt="<?php echo base_url();?>uploaded_pdf/";
//$("#abc").css("padding","0px");
  $('div#abc').css('background-color',''+b+'');
   
document.getElementById('mat1_color').value=b;


}
    
    
    
       
    </script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/jquery.jqzoom.css" />
<!--<link rel="stylesheet" href="<?=base_url()?>assets/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/extrayellow.css">-->
<script src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.jqzoom-core-pack.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.reveal.js"></script>

<script src="<?=base_url()?>assets/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/reveal.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/undo/undomanager.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/undo/demo.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('a#demo2').jqzoom({
            zoomType: 'reverse',
            alwaysOn : false,
            zoomWidth: 480,
            zoomHeight:490,
            title :false,
            xOffset: 30,
            yOffset:0,
            showEffect : 'fadein',
            hideEffect: 'fadeout'
        });
    });

</script>
<link media="screen" rel="stylesheet" href="<?php print base_url();?>assets/css/colorbox.css" />
<script src="<?php print base_url();?>assets/js/colorbox/jquery.colorbox.js"></script>
<script>
    $(document).ready(function(){
        //alert('asdasdsad');
        //Examples of how to assign the ColorBox event to elements
        //$(".loginlogout").colorbox({width:"308px", height:"380px", iframe:true});
        $(".help").colorbox({width:"424px", height:"450px", padding:"0px", iframe:true});

    });
</script>
<script type="text/javascript">
    var current="";
    var curren="";
    var curre="";
    var curr="";
    var cur="";
    var cu="";
    var cuz="";
    var cut="";
    b=0;
    c=9;
    while(b<10){
        eval("var before"+b+"=''");
        eval("var befor"+b+"=''");
        eval("var befo"+b+"=''");
        eval("var bef"+b+"=''");
        eval("var be"+b+"=''");
        eval("var bez"+b+"=''");
        eval("var bet"+b+"=''");
        eval("var ben"+b+"=''");

        b++
    }
    var before1="";
    function dobackup(a,i,j,k,l,m,n,o,p){

        while(c>0){
            d=c-1;
            eval("before"+c+"=before"+d);
            eval("befor"+c+"=befor"+d);
            eval("befo"+c+"=befo"+d);
            eval("bef"+c+"=bef"+d);
            eval("be"+c+"=be"+d);
            eval("bez"+c+"=bez"+d);
            eval("bet"+c+"=bet"+d);
            eval("ben"+c+"=ben"+d);
            c--
        }
        c=9;
        before0=current;
        befor0=curren;
        befo0=curre;
        bef0=curr;
        be0=cur;
        bez0=cu;
        bet0=cuz;
        ben0=cut;
        current=a;
        curren=i;
        curre=j;
        curr=l;
        cur=m;
        cu=n;
        cuz=o;
        cut=p;



    }
    function undoinput(){


        var k="";

        current=before0;
        curren=befor0;
        curre=befo0;
        curr=bef0;
        cur=be0;
        cu=bez0;
        cuz=bet0;
        cut=ben0;
        c=1;
        while(c<9){
            d=c-1;
            eval("before"+c+"=before"+d);
            eval("befor"+c+"=befor"+d);
            eval("befo"+c+"=befo"+d);
            eval("bef"+c+"=bef"+d);
            eval("be"+c+"=be"+d);
            eval("bez"+c+"=bez"+d);
            eval("bet"+c+"=bet"+d);
            eval("ben"+c+"=ben"+d);
            c++
        }
        c=9;

        myfun(before0,befor0,befo0,k,bef0,be0,bez0,bet0,ben0);
    }
    function redo()
    {
        window.location.reload();
    }
</script>

<script type="text/javascript">


    $(window).bind("load", function() {

myfuntest('101 Black.jpg','0.75X0.75','40.00','Black','60','0.75','12','8','<?=$img_shape->shapes?>');
        var print_price=document.getElementById('print_price').innerHTML;
        var frame_price=document.getElementById('frame_price').innerHTML;
        var mat1_price=document.getElementById('mat1_price').innerHTML;
        var acrylic_price=document.getElementById('acrylic_price').innerHTML;
        var fitting_price=document.getElementById('fitting_price').innerHTML;
        var total1=eval(print_price)+eval(frame_price)+eval(mat1_price)+eval(acrylic_price)+eval(fitting_price);
        var total= Math.round(total1)
        document.getElementById('total_price').innerHTML=total;

    });
    function capture(){
	     var paper_surface=$('#paper_surface').val();
            $('.clickbttonforprint').hide();
	         $('.hide_for_frame').hide();
			 $('.edit_this_frame').show();
			 $('#print_h_w').val($('#print_h_w_fixed').val());
			var print_sizes=$('#print_w-o_quot').val();
			var print_sizes_w_h=print_sizes.split('X');
			//alert(print_sizes_w_h)
			//alert(print_sizes_w_h[1]);
			var print_sizes_w=print_sizes_w_h[0];
			var print_sizes_h=print_sizes_w_h[1];
			var frame_size=$('#frame_size').html();
			//alert(frame_size)
			var reframe_size=frame_size.replace(' "','');
			
			var mount_size=$('#mount_size').html();
			var remount_size=mount_size.replace(' "','');
		//	alert(print_sizes_h);
			
			$('.framed_art_prnt').html('Framed Art Print:');
	    
	    
        $('.for_check_printor_frame').val('');
		$('.for_print_hide').show();
		$('.framed_art').show();
		var print_price=$('#print_price').html();
        var FrameCost=$('#FrameCost').html();
         var MountCost=$('#MountCost').html();
		  var glass_price=$('#glass_price').html();
		 
		var total_price= (parseFloat(print_price)+parseFloat(FrameCost)+parseFloat(MountCost)+parseFloat(glass_price));
			 $('#total_price').html(parseFloat(total_price));
		
		if(paper_surface=='Photo canvas' || paper_surface=='Hahnemuhle Photo Canvas' || paper_surface=='Hahnemuhle Daguerre canvas'){
//alert('ss')
$('.showforprintonly').show();
$('.for_print_hide').hide();
$('.showforcanvas').show();
$('#total_price').html(parseFloat($('#print_price').html()) + parseFloat($('#FrameCost').html()));
$('.framed_art').html(print_sizes);
$('.canvas_for_room').show();
}
else{
   $('#frame-it').show();
   var varframed_size=((parseFloat(print_sizes_w)+parseFloat(remount_size)*2 +parseFloat(reframe_size)*2)+'" X '+(parseFloat(print_sizes_h)+parseFloat(remount_size)*2+parseFloat(reframe_size)*2))+'"';
			//alert(varframed_size);
			$('.framed_art').html(varframed_size);
			$('.mainhor_for_room').show();
}
        logging:true;
        html2canvas( [ document.getElementById('frame-it') ], {
            onrendered: function(canvas)
            {var img=canvas.toDataURL()
                $.post("<?php echo base_url()?>frontend/save_frame",
				{data:img},
				function(file)
                {

                    //alert(file);
                    save_value(file)
                    
                });
                //$('#img_val').val(canvas.toDataURL("image/png"));
                //document.getElementById("frame_section").submit();
            }
        });

    }
    function room_view1(){


var img = document.getElementById('frame-it'),
style = img.currentStyle || window.getComputedStyle(img, false),
bi = style.backgroundImage.slice(50, -2);
//alert(bi);

        html2canvas( [ document.getElementById('frame-it') ], {
            onrendered: function(canvas)
            {var img=canvas.toDataURL()
                $.post("<?php echo base_url()?>frontend/save_frame",{data:img},function(file)
                {
                    //alert(file);
                    window.location.href="<?php echo base_url()?>frontend/room_view/<?php echo $size;?>/"+file;

                });
              // $('#img_val').val(canvas.toDataURL("image/png"));
               // document.getElementById("frame_section").submit();
            }
        });

    }
    
    
    
    function large_images()
{
    $('#new1').hide();
    var r_img_width_id=document.getElementById('r_img_width_id').value;
    var r_img_height_id=document.getElementById('r_img_height_id').value;
    var print_mount_size=document.getElementById('print_mount_size').value;
    var mat_color=document.getElementById('mat1_color').value;
    var frame_color=document.getElementById('frame_color').value;
    var fat_frame=document.getElementById('fat_frame').value;
    var mount=print_mount_size*17;
    //alert(fat_frame);
         mount=16;
         
        var paddingtop=8;
        var firMarginLeft=5;
        var firWidth=<?=$fir_width?>;
        var firHeight=<?=$fir_height?>;
        
 // alert(firWidth);
     if(fat_frame!='')
     {
         if(fat_frame=='1')
         {
      var frameSize=2;  
  }else{
      var frameSize=parseInt(fat_frame)*parseInt(5);
  }
//      alert(frameSize);
     }
    //alert(mount);
    var r_new_mat_width=parseInt(r_img_width_id)+parseInt(mount);
    var r_new_mat_height=parseInt(r_img_height_id)+parseInt(mount);
   // alert(r_new_mat_width);
   if(frame_color!='')
   {
    var dert= "http://static.mahattaart.com/398/DANI_US22_SPE0539.JPG";
          +$('div.main_frame').css('background','url("'+dert+frame_color+'")');
      }else{
        var dert= "<?php echo base_url()?>uploaded_pdf/new_frames/split_frame/332x395.jpg";
          +$('div.main_frame').css('background','url("'+dert+'")');  
      }
      //alert(firWidth);
    document.getElementById("fir_room").style.marginLeft=firMarginLeft+'px';
    document.getElementById("fir_room").style.width='910px';
     document.getElementById("fir_room").style.height='607px';
    document.getElementById("abc2").style.width = r_new_mat_width+"px";
    document.getElementById("abc2").style.height = r_new_mat_height+"px";
    document.getElementById("abc2").style.paddingTop=paddingtop+'px';
    document.getElementById("abc2").style.paddingLeft="2px";
    document.getElementById("change_frame").style.padding=frameSize+"px";
    document.getElementById("abc2").style.backgroundColor=mat_color;
    document.getElementById('large_image_dive').style.display='block';
    document.getElementById('fade').style.display='block'; 
    
    
}

    
    
    
    
    function room_view()
{
 $('#large_image_dive').hide();
    var canvas_check=$('#canvas_check').val();
	if(canvas_check==1){
	
	}
    var r_img_width_id=document.getElementById('r_img_width_id').value;
    var r_img_height_id=document.getElementById('r_img_height_id').value;
    var print_mount_size=document.getElementById('print_mount_size').value;
    var mat_color=document.getElementById('mat1_color').value;
    var frame_color=document.getElementById('frame_color').value;
    var fat_frame=document.getElementById('fat_frame').value;
    var mount=print_mount_size*17;
    //alert(fat_frame);
         mount=16;
         
        var paddingtop=8;
        var firMarginLeft=5;
        var firWidth=<?=$fir_width?>;
        var firHeight=<?=$fir_height?>;
        
 // alert(firWidth);
     if(fat_frame!='')
     {
         if(fat_frame=='1')
         {
      var frameSize=2;  
  }else{
      var frameSize=parseInt(fat_frame)*parseInt(5);
  }
//      alert(frameSize);
     }
    //alert(mount);
    var r_new_mat_width=parseInt(r_img_width_id)+parseInt(mount);
    var r_new_mat_height=parseInt(r_img_height_id)+parseInt(mount);
   // alert(r_new_mat_width);
   if(frame_color!='')
   {
    var dert= "<?php echo base_url()?>uploaded_pdf/new_frames/split_frame/";
          +$('div.main_frame').css('background','url("'+dert+frame_color+'")');
      }else{
        var dert= "<?php echo base_url()?>uploaded_pdf/new_frames/split_frame/332x395.jpg";
          +$('div.main_frame').css('background','url("'+dert+'")');  
      }
      //alert(firWidth);
    document.getElementById("fir_room").style.marginLeft=firMarginLeft+'px';
    document.getElementById("fir_room").style.width=firWidth+'px';
     document.getElementById("fir_room").style.height=firHeight+'px';
    document.getElementById("abc2").style.width = r_new_mat_width+"px";
    document.getElementById("abc2").style.height = r_new_mat_height+"px";
    document.getElementById("abc2").style.paddingTop=paddingtop+'px';
    document.getElementById("abc2").style.paddingLeft="2px";
    document.getElementById("change_frame").style.padding=frameSize+"px";
    document.getElementById("abc2").style.backgroundColor=mat_color;
    document.getElementById('new1').style.display='block';
    document.getElementById('fade').style.display='block'; 
	
    
    
}


    
    function frame_detail(id)
    {
        if(id=="")
        {
            id=46
        }
        window.location.href="<?php echo base_url()?>frontend/frame_detail/"+id;
    }
    function larger_image(){

        html2canvas( [ document.getElementById('frame-it') ], {
            onrendered: function(canvas)
            {var img=canvas.toDataURL()
                $.post("<?php echo base_url()?>frontend/save_frame",{data:img},function(file)
                {
                    window.location.href="<?php echo base_url()?>frontend/larger_image/"+file;

                });
                //$('#img_val').val(canvas.toDataURL("image/png"));
                //document.getElementById("frame_section").submit();
            }
        });

    }
	
    function save_value($file)
    {
        var framewidth =document.getElementById("frame_size").innerHTML;
        var frameprice=document.getElementById("frame_price").innerHTML;
        var matprice=document.getElementById("mat1_price").innerHTML;
        var total=document.getElementById("total_price").innerHTML;
        var printprice=document.getElementById("print_price").innerHTML;
        var glass_price=document.getElementById('acrylic_price').innerHTML;
        var fitting_price=document.getElementById('fitting_price').innerHTML;
        var print_size=document.getElementById('print_sizes').innerHTML;
        var imageid=document.getElementById('imag_id').value;
        var frameid=document.getElementById('frame_id').value;
        var type=document.getElementById('type').value;
        var imagename=document.getElementById('imag_name').value;


        var datastring='framewidth=' + framewidth +'&frameprice='+frameprice+'&matprice='+matprice+'&printprice='+printprice+'&total='+total+'&imageid='+imageid+'&image_name='+$file+'&frameid='+frameid+'&glassprice='+glass_price+'&fittingprice='+fitting_price+'&printsize='+print_size+'&type='+type+'&image='+imagename ;
        $.ajax({
            type: "POST",
            url: "<?php print base_url() ?>frontend/save_frame_details",
            data: datastring,
            success: function(data)
            {
               window.location.href="<?php echo base_url()?>frontend/download_frame/"+$file
            }
        });

    }
	
    function save_to_cart()
    
	{
	//alert('jjj');
	$('.showforcanvas').hide();
	$('.hide_for_frame').show();
	$('.showforprintonly').hide();
	$('.clickbttonforprint').show();
	$('#frame-it').hide();
	$('.mainhor_for_room,.edit_this_frame').hide();
	
	$('#print_h_w').val($('#print_w-o_quot').val());
	 var print_size=document.getElementById('print_h_w').value;
	 //alert(print_size)
	 var wo_border_for_size=$('#wo_border_for_size').html();
	// alert(wo_border_for_size)
	 $('.wo_border_for_size').html(wo_border_for_size);
	 var bordered_ac_srface=$('#bordered_ac_srface').val();
	$('.for_print_hide').hide();
	
	//var print_size_with_border=add_quot.split();
	$('.framed_art').html($('.framed_art').html());
	$('.framed_art_prnt').html(bordered_ac_srface);
	 $('.for_check_printor_frame').val('only_print');
	var printprice=document.getElementById("print_price").innerHTML;
	//alert(printprice);
	  $('#total_price').html(printprice);
        var type=document.getElementById('type').value;
       
        var imageid=document.getElementById('imag_id').value;
        var image_name=document.getElementById('imag_name').value;
        var datastring='printprice='+printprice+'&type='+type+'&printsize='+print_size+'&imageid='+imageid+'&imagename='+image_name;
 

    }
    
    
   
</script>
<head>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/image-large/thickbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/image-large/jquery-1.10.1.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/image-large/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/image-large/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/image-large/jquery.mousewheel-3.0.6.pack.js"></script>
    <link href="<?php print base_url();?>assets/css/image-large/jquery.fancybox.css" type="text/css" rel="stylesheet" />-->
<link href="<?php print base_url();?>assets/css/image-large/thickbox.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>assets/css/frame-it-style.css" type="text/css" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link href="<?=base_url()?>assets/css/wallcolor.css" type="text/css"rel="stylesheet"/>
<style type="text/css">
        #black,#gray
        {
            display: none;
        }
		.out_stock.text-center {
    color: #6b6b6b;
  
    font-size: 16px;
}
       .mainhor {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: transparent;
  
}
    </style>
<style>
.showforprintonly > img {
  box-shadow: -20px 5px 5px #000000;
  transform: perspective(600px) rotateY(12deg);
}
    .newid1 {
    display: none;
    position: absolute;
    top: 73px;

    left: 279px;
    padding: 15px;
    border: 3px solid #FF7949;
    border-radius: 10px;
    background-color: white;
    z-index: 10000001;
    overflow: auto;
}

.large_image_dive {
    position: absolute;
    top: 59px;
    left: 208px;
    padding: 15px;
    border: 3px solid #FF7949;
    border-radius: 10px;
    background-color: white;
    z-index: 10000001;
    overflow: auto;
    width: 72%;
    height: 103%;
}


.main{
        margin-top: 20px;
   
    display: inline-block;
    position: relative;
 padding: 7.5px;


	}
        .main_frame{
    margin:auto;
    padding:25px;
    background:url(<?=base_url()?>uploaded_pdf/new_frames/split_frame/332x395.jpg); 
    
    background:repeat;
    -moz-background-size: cover;
    -o-background-size: cover;
    display: block;
    position:absolute;
    padding:8px;
margin-right: 8px;
	}
              
.mainhor{
     margin-top: 20px;
   
    display: inline-block;
    position: relative;
}
	.mainhor_for_room{
     margin-top: 20px;
   
    display: inline-block;
    position: relative;
}
	

    
           #abc2 {
     //border:25px solid white;
           padding-top: 8px;
            padding-left: 8px;
         background-color: white;
           }


#fir_room{padding:2px; background-color:white;
box-shadow:2px 2px 1px black inset;
}
  ul.choose-colors-type-mount {
    height: auto;
    max-height: 110px;
    overflow-x: hidden;
}
.imglink {
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.8) inset;
  display: inline-block;
  position: relative;
}
 
#demo2 > img {
  position: relative;
  z-index: -1;
}
	 </style>
<script type="text/javascript">
$(document).ready(function(){
$('#black').show();
$('#white').show();
var paper_surface=$('#paper_surface').val();
var print_sizes=$('#print_sizes').html();

//alert(paper_surface)
if(paper_surface=='Photo canvas' || paper_surface=='Hahnemuhle Photo Canvas' || paper_surface=='Hahnemuhle Daguerre canvas'){
$('.framed_art').html(print_sizes);
$('.for_print_hide').hide();
$('.showforcanvas').show();

	$('#frame-it').hide();
	$('.showforprintonly').show();
	$('.mainhor_for_room').hide();
	//$('.buyit').hide();
	$('.canvas_for_room').show();
	$('#frame_name').val($('#frame_type').html());
	$('.for_check_printor_frame').val('canvas_only');
	$('.tabs-wrapper').hide();
	$('.edit_this_frame').hide();
$('#total_price').html(parseFloat($('#print_price').html()) + parseFloat($('#FrameCost').html()));

$('#canvas_check').val(1);
}
$('#unchkforacrylic').trigger('click');
});

    function hideAll()
    {
        document.getElementById('popular').style.display = 'none';
        document.getElementById('black').style.display = 'none';
        document.getElementById('gray').style.display = 'none';
        document.getElementById('blue').style.display = 'none';
        document.getElementById('white').style.display = 'none';
        document.getElementById('yellow').style.display = 'none';
        document.getElementById('gold').style.display = 'none';
       // document.getElementById('table3').style.display = 'none';
    }
	function slide_show_hide(){
	//alert('yes')
	$('#myCarousel').hide();
	}
    function showTable(frame_cat)
    {
	//alert(obj)
	$('.active').show();
// alert(frame_cat);
	$('#abc2').css("background-color","red");
	$('#f_color').html(frame_cat);
       // obj.style.display = 'block';
		$('.for_first_slide').click();
		$.ajax({
	  //alert(glass)
            type: "POST",
            url: "<?=base_url();?>frontend/get_frame_code_web_price",
            data:'frame_cat='+frame_cat,
			//dataType :'json',
            success: function(data)
            {
			//alert(data)
			var obj=JSON.parse(data);
		//alert(obj)
		//alert(obj.length)
		
		   
			var i,four,next_four,rows_last,toal_slide,total_s="";
			total_s=(obj.length/4);
			var td_inner='';
			console.log(td_inner);
			total_slide=Math.round(total_s);
		if(obj.length<4){
		  var loop_time=obj.length;
		  }else{
		  var loop_time=4;
		  }
			for(i=0;i<loop_time;i++){
			var val=obj[i];
			//alert(val);
			var explode=val.split(',');
			//alert(explode)
			var f_code=explode[0];
			//alert(f_code)
			//var add_quote_f_code="'"+f_code+"'";
	
			var explode1=explode[1];
			//alert(explode1)color,size,shape,f_code
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
			//  alert(explode5);
			  if(explode[7]=='0'){
		mount_avail='Out of stock';
		}else{
		mount_avail='';
		}
			var f_shape=$('#frame_shape').val();
			var frame_shape="'"+f_shape+"'";
			td_inner += '<span onClick="myfun('+f_color+','+f_size+','+frame_shape+','+f_name+','+f_rate+','+f_name_mm+');" class="col-md-3 col-sm-3 col-xs-6 col-sm-3"><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+f_code+'.jpg" class="img-responsive" /><div class="text-center">'+explode5+'</div><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></span>';
			
			}
			
			
			//alert(td_inner)
			//$('.predefined_cat').hide();
			$('.catagory_selected').html(td_inner);
			$('.first_slide').html(td_inner);
			//$('.catagory_selected').show();
			var images,item_images="";
			 four=4;
			 next_four=0;
			 $('.items').remove();
			// alert(obj.length)
			 if(obj.length>4){
			 
			for(var z=1;z<total_slide;z++){
			
			images='<div class="item items"><span class="after_first_slide'+z+'"></span></div>';
			
			$(images).insertAfter('.actives');
			
	    next_four +=four;
	
	   rows_last =(parseInt(next_four) + parseInt(3));
		       for(var y=next_four;y<=rows_last;y++){
			   //	alert(obj[y])
				var frame_d=obj[y];
				//alert(frame_d)
				var each_f_d=frame_d.split(',');
				var frame_c=each_f_d[0];
				var add_q_f_code="'"+frame_c+"'";
				var explode1=each_f_d[1];
				var frame_n="'"+explode1+"'";
				//alert(frame_n)
				var explode2=each_f_d[2];
				var frame_s="'"+explode2+"'";
				var explode3=each_f_d[3];
				var frame_color="'"+explode3+"'";
				var explode4=each_f_d[4];
				var frame_r="'"+explode4+"'";
				var shape=$('#frame_shape').val();
				var explode5=each_f_d[5];
			var f_name="'"+explode5+"'";
			var explode6=each_f_d[6];
			var f_name_mm="'"+explode6+"'";
			//	alert(shape)
				var frame_shp="'"+shape+"'";
				if(each_f_d[7]=='0'){
		mount_avail='Out of stock';
		}else{
		mount_avail='';
		}
				//color,size,shape,f_code,f_rate
	   item_images='<span onClick="myfun('+frame_color+','+frame_s+','+frame_shp+','+f_name+','+f_rate+','+f_name_mm+');" class="col-md-3 col-sm-3 col-xs-6 col-sm-3"><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+frame_c+'.jpg" alt="second" width="200" height="200"  class="img-responsive" style=""><div class="text-center">'+explode5+'</div><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></span>';
	
	$(".after_first_slide"+z+"").append(item_images);
	
	         }
			 $('#myCarousel').show();
		//	 alert(item_images)
		
			}
			}
			  
			}
			});
		
    }
    function show_mat(obj)
	{
	//alert(obj)
	$('.for_first_slide').click();
	$.ajax({
	    type:"post",
		url:"<?=base_url()?>frontend/get_all_mount_for_slide",
		data:'mount='+obj,
		//dataType: "json",
		success: function(success){
	
		 var array=JSON.parse(success);
		 //alert(array)
		//alert(array.length);
		var total_s,total_slide="";
		var td_inner='';
		console.log(td_inner);
		total_s=(array.length/4);
			
			total_slide=Math.round(total_s);
			 var breaks,mount_code,mount_rate,mount_name,mount_avail="";
			 if(array.length<4){
		  var loop_time=array.length;
		  }else{
		  var loop_time=4;
		  }
		 for(var i=0;i<loop_time;i++){
		 breaks=array[i].split(',');
		//alert(breaks)
		mount_rate="'"+breaks[1]+"'";
		mount_code="'"+breaks[0]+"'";
		mount_name="'"+breaks[2]+"'";
		if(breaks[3]=='0'){
		mount_avail='Out of stock';
		}else{
		mount_avail='';
		}
		
			td_inner +='<span onClick="return myfun('+mount_rate+','+mount_code+','+mount_name+');" class="col-md-3 col-sm-3 col-xs-6"><img src="<?php echo base_url()?>images/uploaded_pdf/mount/'+breaks[0]+'.jpg" style="margin:10px;" class="img-responsive""/><div class="text-center">'+breaks[2]+'</div><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></span>';
			}
		 
		//alert(td_inner)
		$('.first_slide').html(td_inner);
			//$('.catagory_selected').show();
			var images,item_images,four,next_four,images,rows_last="";
			 four=4;
			 next_four=0;
			 $('.items').remove();
			for(var z=1;z<total_slide;z++){
			
			images='<div class="item items"><span class="after_first_slide'+z+'"></span></div>';
			
			$(images).insertAfter('.actives');
			
	    next_four +=four;
	
	   rows_last =(parseInt(next_four) + parseInt(4));
	     
		       for(var y=next_four;y<rows_last;y++){
			   //	alert(obj[y])
			    breaks=array[y].split(',');
				//var frame_d=array[y];
				mount_code="'"+breaks[0]+"'";
				mount_rate="'"+breaks[1]+"'";
				mount_name="'"+breaks[2]+"'";
			    if(breaks[3]=='0'){
		mount_avail='Out of stock';
		}else{
		mount_avail='';
		}
				
				//color,size,shape,f_code,f_rate
	   item_images='<span onClick="myfun('+mount_rate+','+mount_code+','+mount_name+');" class="col-md-3 col-sm-3 col-xs-6 col-sm-3"><img src="<?php echo base_url()?>images/uploaded_pdf/mount/'+breaks[0]+'.jpg" alt="second" style="margin:10px;" class="img-responsive"><div class="text-center">'+breaks[2]+'</div><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></span>';
	//alert(item_images);
	$(".after_first_slide"+z+"").append(item_images);
	
	         }
		
			}
		  }
	  });
	  $('#myCarousel').show();
//	alert('yes for mount')
        obj.style.display = 'block';
		
    }
    function hide()
    {
        document.getElementById('mat1').style.display = 'none';
        document.getElementById('mat2').style.display = 'none';
    }
   
   
   
   function change_mount(mount,FrameSize)
   {
       
    var print_sizes=document.getElementById("print_sizes").innerHTML;
    var mount_size=document.getElementById("print_mount_size").value;
    var frame_size=document.getElementById("print_frame_size").value;
    var print_price=document.getElementById('print_price').innerHTML;
     var mount_rate=$('#mount_rate').val();
    
       
       if(mount=="" || isNaN(mount))
       {
           mount=1;
       }else{
           mount=mount;
       }
       
        if(isNaN(frame_size) || frame_size=="")
        {
            frame_size=1;
        }else{frame_size=frame_size;}
       
      document.getElementById('mat1_size').value=mount;
      document.getElementById('mount_size').innerHTML=mount+'&quot;';
    
    var printsplit=print_sizes.split('X');
    
      // alert(printsplit);
	 //alert(frame_size);
	  //alert(mount);
	  
    var newmountheight=parseFloat(printsplit[0])+parseFloat(mount*2);
     var newmountwidth=parseFloat(printsplit[1])+parseFloat(mount*2);
	//alert(newmountheight);
	// alert(newmountwidth);
     var MountCost=parseFloat(newmountheight)*parseFloat(newmountwidth)*(mount_rate);//mount fixed rate
	// alert(MountCost);
     var MOuntCotsFormat=parseFloat(Math.round(MountCost * 100) / 100).toFixed(2);
    document.getElementById('MountCost').innerHTML=MOuntCotsFormat;

    var OrgFrametRuningArea = ((parseFloat(newmountheight)+parseFloat(frame_size)*2)*2) + ((parseFloat(newmountwidth)+ parseFloat(frame_size*2))*2);
	//alert(OrgFrametRuningArea);
    var OrgFramCost=((OrgFrametRuningArea)/(12)*66);//rate 2
	//alert('frame_cosr')
  // var FrameCotsFormat=parseFloat(Math.round(OrgFramCost * 100) / 100).toFixed(2);
      
	  //alert(OrgFrametRuningArea);
	  var FrameCost=$('#FrameCost').html();
     //  document.getElementById('FrameCost').innerHTML=FrameCotsFormat;
     var glass_price=  document.getElementById('glass_price').innerHTML;
    // alert(glass_price);
var total1=parseFloat(print_price)+parseFloat(FrameCost)+parseFloat(MOuntCotsFormat)+parseFloat(glass_price);
var fram_size_for_t=$('#frame_size').html();
   var  total_size=(parseFloat(newmountheight)+(parseFloat(fram_size_for_t)*2))+' "X'+(newmountwidth+ (parseFloat(fram_size_for_t)*2)+' "');
   $('.framed_art').html(total_size);
  //  alert(total_size);
$('#total_price').html(total1.toFixed(2));
      
      
     document.getElementById('print_mount_size').value=mount;
    
    var print_width=document.getElementById('print_width').value;
    // 1inch =10pixels
    //alert(mount)
        var mount_pixels=parseInt(mount*10);
    
    var print_width_pixels=parseInt(print_width*10);
    var img_mount=print_width_pixels+mount_pixels;
    if(FrameSize!='')
    {
    var main_frame=FrameSize*10;
    }else{
       var main_frame=10;  
    }
            //alert(FrameSize);
    
  //alert(frame_to_size);
  $("#abc").css("padding",''+mount_pixels+'px');
  
   }// end function
   
   
 function Frame_Size(FrameSize,frame_size_mm)
 {
 //alert(FrameSize)
 //alert(frame_size_mm)
     // 1 size =15 squre fit runing area 
	 //$('#frame_size_mm').show();
	 $('.for_first_slide').click();
	 $('#frame_size_mm').html(frame_size_mm);
	// $('#frame_size').hide();
	 $('#frame_size').html(FrameSize);
      document.getElementById('print_frame_size').value=FrameSize;
           document.getElementById('fat_frame').value=FrameSize;
		  
     var mount= document.getElementById('print_mount_size').value;
      change_mount(mount,FrameSize);
	  $.ajax({
	      type:'post',
		  url:'<?=base_url()?>frontend/get_frame_by_frame_color',
		  data:'FrameSize='+frame_size_mm,
		  success:function(response){
		//alert(response)
		  
		  var decode= JSON.parse(response);
		 //alert(decode.length);
		 var i="";
		  var td_inner='';
		  console.log(td_inner);
		  if(decode.length<4){
		  var loop_time=decode.length;
		  }else{
		  var loop_time=4;
		  }
		  for(i=0;i<loop_time;i++){
		  var val=decode[i];
			var explode=val.split(',');
			var f_code=explode[0];
			//alert(f_code)
			var add_quote_f_code="'"+f_code+"'";
			//alert(f_code)
			var explode1=explode[1];
			//alert(explode1)color,size,shape,f_code
			var f_name="'"+explode1+"'";
			var explode2=explode[2];
			var f_size="'"+explode2+"'";
			var explode3=explode[3];
			var f_color="'"+explode3+"'";
			var explode4=explode[4];
			var f_rate="'"+explode4+"'";
			var explode5=explode[5];
			var f_name="'"+explode5+"'";
			var f_name_mm="'"+explode[6]+"'";
			//alert(f_name)
			var f_shape=$('#frame_shape').val();
			var frame_shape="'"+f_shape+"'";
		  if(explode[7]=='0'){
		mount_avail='Out of stock';
		}else{
		mount_avail='';
		}
			//   alert(frame_shape+f_name+f_color+f_size+f_rate+f_code);
			td_inner += '<span onClick="return myfun('+f_color+','+f_size+','+frame_shape+','+f_name+','+f_rate+','+f_name_mm+');" class="col-md-3 col-sm-3 col-xs-6 col-sm-3"><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+f_code+'.jpg" width="200px" height="200px" style="margin-left:20px"; class="img-responsive"/><div class="text-center">'+explode5+'</div><div style="color:red;" class="out_stock text-center">'+mount_avail+'</div></span>';
			
			}
			//alert(td_inner)
		
			//$('.catagory_selected').html(td_inner);
			$('.first_slide').html(td_inner);
			//$('.catagory_selected').show();
			 $('.items').remove();
			 var total_slide,total_s="";
			if(decode.length>4){
			//alert('greate than 4')
			var images,item_images="";
			 four=4;
			 next_four=0;
			total_s=(decode.length/4);
			
			total_slide=Math.round(total_s);
			//alert(total_slide)
			for(var z=1;z<=total_slide;z++){
			
			images='<div class="item items"><span class="after_first_slide'+z+'"></span></div>';
			
			$(images).insertAfter('.actives');
			
	    next_four +=four;
	
	   rows_last =(parseInt(next_four) + parseInt(3));
		       for(var y=next_four;y<=rows_last;y++){
			   //	alert(obj[y])
				var frame_d=obj[y];
				//alert(frame_d)
				var each_f_d=frame_d.split(',');
				var frame_c=each_f_d[0];
				var add_q_f_code="'"+frame_c+"'";
				var explode1=each_f_d[1];
				var frame_n="'"+explode1+"'";
				//alert(frame_n)
				var explode2=each_f_d[2];
				var frame_s="'"+explode2+"'";
				var explode3=each_f_d[3];
				var frame_color="'"+explode3+"'";
				var explode4=each_f_d[4];
				var frame_r="'"+explode4+"'";
				var frame_name_mm="'"+each_f_d[5]+"'";
				var shape=$('#frame_shape').val();
				
			//	alert(shape)
				var frame_shp="'"+shape+"'";
				
				//color,size,shape,f_code,f_rate
	   item_images='<span onClick="myfun('+frame_color+','+frame_s+','+shape+','+frame_n+','+frame_r+','+frame_name_mm+');" class="col-md-3 col-sm-3 col-xs-6 col-sm-3"><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+frame_c+'" alt="second" width="200" height="200" style="margin-left:70px;" class="img-responsive"><div class="text-center">'+explode1+'</div></span>';
	
	$(".after_first_slide"+z+"").append(item_images);
	
	         }
			 
			 $('#myCarousel').show();
		
			}
			}
		  }
	  });
	  
  //alert(FrameSize);
 }// end function
   
    
   
   
   
   
   
   
   
   
function myfun(color,size,shape,f_code,f_rate,f_size_mm)
{
//alert(f_size_mm)
//alert(size)

var mount_size=$('#mount_size').html();
var mount=mount_size.replace('"','');
//alert(mount_size)
var mount_rate=color;
var mount_name=size;//For mount calculation 
var mount_name_ofcode=shape;
//alert(mount_name_ofcode)
//alert(mount_name);

var print_sizes=$('#print_sizes').html();
//alert(print_sizes)
var printsplit=print_sizes.split('X');
//var mount=1;kkk

  var newmountheight=parseFloat(printsplit[0])+parseFloat(mount*2);
     var newmountwidth=parseFloat(printsplit[1])+parseFloat(mount*2);
	 if(!f_code){
	// alert(newmountheight+'x'+newmountwidth)
	 $('#mount_rate').val(mount_rate);
	 var m_cost=parseFloat(newmountheight)*parseFloat(newmountwidth)*parseFloat(mount_rate);
	 var MountCost=m_cost.toFixed(2);
	$('#mount_color').html(mount_name_ofcode);
	 
	 //alert(MountCost)
	 }
	  
	 $('#MountCost').html(MountCost);
    var OrgFrametRuningArea = ((parseFloat(newmountheight)+parseFloat(size)*2)*2) + ((parseFloat(newmountwidth)+ parseFloat(size*2))*2);
	var print_price=$('#print_price').html();
	var mount_cost=$('#MountCost').html();
	//alert(mount_cost)
	var glass_cost=$('#glass_price').html();
	var frame_cost=$('#FrameCost').html();
	//alert(f_rate)
    var OrgFramCost=((OrgFrametRuningArea)/(12)*f_rate);//rate 2
	//alert(f_rate)
   var FrameCotsFormat=parseFloat(Math.round(OrgFramCost * 100) / 100).toFixed(2);
   var canvas_check=$('#canvas_check').val();
     
   
      if(f_code){
	  $('#frame_size').html(size);
	//  $('#f_color').html('sss sayeedi');
      $('#FrameCost').html(FrameCotsFormat);
	 // alert(FrameCotsFormat)
	 document.getElementById('f_color').innerHTML=f_code;
	 var price=parseFloat(print_price)+parseFloat(FrameCotsFormat)+parseFloat(mount_cost)+parseFloat(glass_cost);
	// alert(price)
	  $('#total_price').html(price);
	 // alert(frame_cost)
	 
	 var mount_size_for_size=$('#mount_size').html();
	 var framed_art_size=(parseFloat(printsplit[0])+(parseInt(size))*2)+(parseInt(mount_size_for_size)*2)+'" X '+(parseFloat(printsplit[1])+(parseInt(size)*2)+(parseInt(mount_size_for_size)*2)+'"');
	 $('.framed_art').html(framed_art_size);
	// alert(framed_art_size)
	 
	  }
	   var t_price=parseFloat(print_price)+parseFloat(frame_cost)+parseFloat(MountCost)+parseFloat(glass_cost);    
	    if(!f_code){
	   var total_price_mount=t_price.toFixed(2);
	   
	   
	  // alert(total_price_mount)
	   }
	   
	// alert(total_price_mount)
	 
var mount_it_width= document.getElementById('mount_it_width').value;
 $('#total_price').html(total_price_mount);
 if(canvas_check==1){
 //alert(OrgFramCost)
       if(!f_code){
	   var price_canvas=parseFloat(print_price)+parseFloat(mount_cost);
	   }else{
	  var price_canvas=parseFloat(print_price)+parseFloat(OrgFramCost);
	  }
	  var tot_price_canvas=price_canvas.toFixed(2);
	// alert(tot_price_canvas);
	  $('#total_price').html(tot_price_canvas);
		 }
    if(document.getElementById('mount_it_width').value !="")
    {
        var mount_width=16.0*2;
        //alert(mount_width);
		//alert('mount_it_width')
    }

    
        else
    {
      //alert('else'+shape)
     // alert(mount_it_width);
        
        var mount_width1=document.getElementById('mount_it_width').value;
        //alert(mount_width1);
        var mount_width=parseFloat(mount_width1)*parseInt(2);
    }
	
	document.getElementById('mount_size').value=mount_width;
	
//var dert= "http://ec2-50-16-86-162.compute-1.amazonaws.com/wallsnart/uploaded_pdf/";


document.getElementById('frame_color').value=color;
 if(!f_code){
 //alert('yes for mount')
// alert(mount_name)
  var dert= "<?php echo base_url()?>images/uploaded_pdf/mount/";
    
          +$('div#abc').css('background','url("'+dert+mount_name+'.jpg")');
		  
		   +$('div.mount_for_room').css({'border-image-source':'url("'+dert+mount_name+'.jpg")'});
		  
		  $('#mount_name').val(mount_name);
 
 }
  
	 // alert('got ho')
      //alert(f_name)
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
	   $('#frame_name').val(f_code);
	   +$('div.mainhor_for_room').css({'border-image':'url("'+dert+f_code+'.jpg") 55 55 55 55 round round','border-style':'solid','border-width':'20px'});
	   
	   
	   $('#frame_size_mm').html(f_size_mm);
	   }
    
//alert("http://ec2-50-16-86-162.compute-1.amazonaws.com/wallsnart/uploaded_pdf/"+ a );
//$('div.main').css('padding','30px');
//$('div.main').css('background-image','url("'+dert+a+'"),url(<?=base_url()?>assets/images/bot_rig.png),url(<?=base_url()?>assets/images/top_righ.png),url(<?=base_url()?>assets/images/top_lef.png),url(<?=base_url()?>assets/images/ver_left.png),url(<?=base_url()?>assets/images/ver_righ.png),url(<?=base_url()?>assets/images/hor_bot.png),url(<?=base_url()?>assets/images/hor_top.png)');
    //alert(n+' X'+m);
    //alert(mount);
    var print_price=document.getElementById('print_price').innerHTML;
    var acrylic_price=document.getElementById('acrylic_price').innerHTML;
    var fitting_price=document.getElementById('fitting_price').value;
    var print_sizes=document.getElementById("print_sizes").innerHTML;
    var mount_size=document.getElementById("print_mount_size").value;
    var frame_size=document.getElementById("print_frame_size").value;
    var printsplit=print_sizes.split('X');
    //alert(split[0]);height
      if(isNaN(mount_size) || mount_size=="")
        {
            mount_size=0;
        }else{mount_size=mount_size;}
        
        if(isNaN(frame_size) || frame_size=="")
        {
            frame_size=1.25;
        }else{frame_size=frame_size;}
        
       // alert(mount_size);
    var newmountheight=parseFloat(printsplit[0])+parseFloat(mount_size*2);
     var newmountwidth=parseFloat(printsplit[1])+parseFloat(mount_size*2);
     var MountCost=parseFloat(newmountheight)*parseFloat(newmountwidth)*(0.75);//mount fixed ratechanges
     var MOuntCotsFormat=parseFloat(Math.round(MountCost * 100) / 100).toFixed(2);
    document.getElementById('MountCost').innerHTML=MOuntCotsFormat;
    
//    var newwidth= parseFloat(n)+ parseFloat(m)+ parseFloat(m)+parseFloat(mount_width);
//    var newlenght=parseFloat(o)+ parseFloat(m)+ parseFloat(m)+parseFloat(mount_width);
//    var cost=parseFloat(newwidth)*2+parseFloat(newlenght)*parseFloat(2);
//    var p= parseFloat(cost)*parseFloat(j)/parseInt(12);
//    var price=Math.round(p);
//alert(newmountheight);
  
   var OrgFrametRuningArea = ((parseFloat(newmountheight)+parseFloat(frame_size)*2)*2) + ((parseFloat(newmountwidth)+ parseFloat(frame_size*2))*2);
    var OrgFramCost=(OrgFrametRuningArea)/(12)*65;//rate 2
   var FrameCotsFormat=parseFloat(Math.round(OrgFramCost * 100) / 100).toFixed(2);
    //alert(newmountheight+' '+newmountwidth);
    //alert(frame_size*2);
    //alert(FrameCotsFormat);
    
    document.getElementById('FrameCost').innerHTML=FrameCotsFormat;
    document.getElementById('frame_size').innerHTML=i ;
    document.getElementById('frame_price').innerHTML=price;
    document.getElementById('frame_color').innerHTML="Contemporary";
    document.getElementById('frame_id').value=l;
    document.getElementById('frame_it_price').value=j;
    document.getElementById('frame_it_width').value=m;
   var fitting_price= document.getElementById('fitting_price').value;
    
var total1=eval(print_price)+eval(FrameCotsFormat)+eval(MOuntCotsFormat)+eval(acrylic_price)+eval(fitting_price);
    var total=Math.round(total1);

document.getElementById('total_price').innerHTML=total;
    dobackup(a,i,j,k,l,m,n,o,d);

}
function change_color(s,a,b)
{
//alert(b);
document.getElementById('mount_color').innerHTML=b;
document.getElementById('mat1_color').value=b;
var dertt="<?php echo base_url();?>uploaded_pdf/";
//$("#abc").css("padding","0px");
  $('div#abc').css('background-color',''+b+'');
  
document.getElementById('mat1_color').value=b;


}
    function change_color2(c,width,lenght,d)
    {
        $('input.example1').on('change',function(){
            $('input.example1').not(this).prop('checked',false);
        });
        $('div#abc').css('border',''+c+'px solid '+ document.getElementById('mat1_color').innerHTML+' ');


    //   var result=parseInt(d)+parseInt(d)+parseInt(width)+parseInt(lenght)+parseInt(d)+parseInt(d);
        var newwidth=parseFloat(width)+(d*2); //width of image +width of frame
        var newlenght=parseFloat(lenght)+(d*2);//lenght of image +lenght of frame
        
        var result1=parseFloat(newwidth)*parseFloat(newlenght)*parseFloat(.45);
        var result= Math.round(result1);
        var glasscost1=parseFloat(newwidth)*parseFloat(newlenght)*parseFloat(.55);
        var glasscost= Math.round(glasscost1);
        var glasscost2 =parseFloat(newwidth)*parseFloat(newlenght)*parseFloat(.85);
        var arcylic_glass_cost=Math.round(glasscost2);
        var glasscost3=parseFloat(newwidth)*parseFloat(newlenght)*parseFloat(1.25);
        var nonglare_glass_cost=Math.round(glasscost3);
        if(document.getElementById('frame_it_price').value =="")
        {
            var frameprice=60;
        }
        else
        {
        var frameprice=document.getElementById('frame_it_price').value;
        }
        if(document.getElementById('frame_it_width').value =="")
        {
            var framewidth=.50;
        }
        else
        {
            var framewidth = document.getElementById('frame_it_width').value
        }
        var newwidth1=parseFloat(newwidth)+parseFloat(framewidth)+parseFloat(framewidth);
        var newlenght1=parseFloat(newlenght)+parseFloat(framewidth)+parseFloat(framewidth);

        var costofframe=parseFloat(newwidth1)* parseInt(2)+parseFloat(newlenght1)*parseInt(2)
        var framecost1=parseInt(frameprice)/parseInt(12);
        var framecost=parseFloat(costofframe)*parseFloat(framecost1);
        document.getElementById('frame_price').innerHTML=framecost;
        document.getElementById('arcylic').value=arcylic_glass_cost;
        document.getElementById('arcylic_cost').innerHTML=arcylic_glass_cost;
        document.getElementById('glass').value=glasscost;
        document.getElementById('glass_cost').innerHTML=glasscost;
        document.getElementById('arcylic_2').value=arcylic_glass_cost;
        document.getElementById('arcylic_2_cost').innerHTML=arcylic_glass_cost;
        document.getElementById('glass_2').value=glasscost;
        document.getElementById('glass_2_cost').innerHTML=glasscost;
        document.getElementById('arcylic_3').value=arcylic_glass_cost;
        document.getElementById('arcylic_3_cost').innerHTML=arcylic_glass_cost;
        document.getElementById('glass_3').value=glasscost;
        document.getElementById('glass_3_cost').innerHTML=glasscost;
        document.getElementById('extrawidth').value=result;
        document.getElementById('mat1_price').innerHTML=result;
        document.getElementById('acrylic_price').innerHTML=glasscost;


        var print_price=document.getElementById('print_price').innerHTML;
        var FrameCost=document.getElementById('FrameCost').innerHTML;
        var mat1_price=result;
        
        var MountCost=document.getElementById('MountCost').innerHTML;

        document.getElementById('mount_it_width').value=d;
      //var mat2_price=document.getElementById('mat2_price').innerHTML;
       //var mat3_price=document.getElementById('mat3_price').innerHTML;
        var acrylic_price=document.getElementById('acrylic_price').innerHTML;
        var fitting_price=document.getElementById('fitting_price').value;
        var total=eval(print_price)+eval(FrameCost)+eval(MountCost)+eval(acrylic_price)+eval(fitting_price);
        document.getElementById('total_price').innerHTML=total;

    }
function change_color2d(st,a,b)
{
//alert(st);
var dertr="<?php echo base_url()?>uploaded_pdf/";
//$("#fir1").css("padding","0px");
 $('div#fir1').css('border','solid '+b+'');
//$("#fir1").css('background-image','url("'+dertr+st+'")');
$("#topa1").css('padding','3px');
$("#topa1").css('box-shadow','0px 0px 5px '+b+' inset');
document.getElementById('mat2_price').innerHTML=a;
document.getElementById('mat2_color').innerHTML=b;
var print_price=document.getElementById('print_price').innerHTML;
var frame_price=document.getElementById('frame_price').innerHTML;
var mat1_price=document.getElementById('mat1_price').innerHTML;
//var mat2_price=document.getElementById('mat2_price').innerHTML;
//var mat3_price=document.getElementById('mat3_price').innerHTML;
var acrylic_price=document.getElementById('acrylic_price').innerHTML;
var fitting_price=document.getElementById('fitting_price').value;

var total=eval(print_price)+eval(frame_price)+eval(mat1_price)+eval(acrylic_price)+eval(fitting_price);
document.getElementById('total_price').innerHTML=total;
}
function change_color3d()
{//alert("hello");
 $("#fir2").css("padding","5px");
 $("#fir2").css('background-color','green');
 $("#topa2").css('padding','3px');
 $("#topa2").css('box-shadow','0px 0px 3px black inset');
}

function change_wallcolor(ad)
{ 
$('div.frame-it-main').css("background-color",""+ad+"");
}
function addGlasses(glasses,glasses_coste)
{
//alert(glasses_coste);
   document.getElementById('glass').value= glasses;
   document.getElementById('glass_coste').value= glasses_coste;
}
function addToCart()
{  

  var paper_surface=$('#paper_surface').val();
  //alert(paper_surface);
  var framed_art=$('.framed_art').html();
  ///alert(framed_art)
  var qtn_frame_size=framed_art.replace('"','');
  var final_frame_size=qtn_frame_size.replace('"','');
  var frame_name=$('#frame_name').val();
// alert(frame_name)
  var mount_name=$('#mount_name').val();
  var mount_color=$('#mount_color').html();
  
  //alert(final_frame_size);
    var only_print=$('.for_check_printor_frame').val();
	
	
   var glasses= $('#glass_type').html();
  var glasses_coste= document.getElementById('glass_coste').value;
    
    var total_price=document.getElementById('total_price').innerHTML;
    var MountCost=document.getElementById('MountCost').innerHTML;
    var FrameCost=document.getElementById('FrameCost').innerHTML;
     var print_size=document.getElementById('print_h_w').value;
    var price=document.getElementById('print_price').innerHTML;
        
        var image_id=document.getElementById('image_id').value;
        var image_type=document.getElementById('imagsTypes').value;
        var user_id=document.getElementById('user_id').value;
        var mat1_size=document.getElementById('mount_size').innerHTML;
		//alert(mat1_size)
        var mat1_color=document.getElementById('mat1_color').value;
      //  var frame_color=document.getElementById('frame_color').value;
       // var frameSize=document.getElementById('frame_size').value;
		var image_namee=$('#image_namee').val();
		//alert(glasses)
		var frameS=$('#frame_size').html();
		     frameSize=frameS.split('"');
		
        $.ajax({
		//final_frame_size
             type: "POST",
	     url: "<?=base_url()?>frontend/frameit_addtocart",
             data: "glasses_coste="+glasses_coste+"&glasses="+glasses+"&FrameCost="+FrameCost+"&MountCost="+MountCost+"&total_price="+total_price+"&user_id="+user_id+"&img_id="+image_id+"&image_type="+image_type+"&mat_color="+mount_name+"&mount_color="+mount_color+"&mat_size="+mat1_size+"&frame_color="+frame_name+"&frameSize="+frameSize+"&images_size="+print_size+"&images_price="+price+"&paper_surface="+paper_surface+"&final_frame_size="+final_frame_size+"&image_namee="+image_namee+'&print_v='+only_print,
			 
             success:function(data)  
             {    
			 //alert(data);
				 $('.frame-step-header-container').show();
				  feedback_of_addtocart(data);
				 $('html, body').animate({ scrollTop: 0 }, 'fast');
				 }
             
         });
}// end function

$(document).ready(function(){
$('#large_image_dive').hide();

});

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript">
        $(function() {
            $("#draggable").draggable();
        });
    </script>
	<script>
	function feedback_of_addtocart(a){
	//alert(a)
	//if(a==1){
	$('.frame-step-header-text').html('<span class="glyphicon glyphicon-ok" style="margin-right:10px;"></span>Item Added To Cart.');
	//}
	
	}

	
	</script>
<?php $continue_shopping_redirect=$this->session->userdata('continue_shopping');?>
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

<?php
			//print_r($type);
			 $paper_surface = str_replace('%20', ' ', $type);
//echo $pricing_range;
if($paper_surface=='Hahnemuhle Photo Canvas' || $paper_surface=='Hahnemuhle Daguerre canvas' || $paper_surface=='Photo canvas'){
//echo 'uescanvas';
$canvas='canvas';


 $bordered_ac_srface='Canvas Print ';

}
else if($paper_surface=='Hahnemuhle Photo Matte Fibre'){
//echo 'yesmatt';
$canvas='without_canvas';
$bordered_ac_srface='Giclee Print ';
}

			?>



<div id="new1" class="newid1" >
  <div align="right"> <a href="javascript:void(0)"
                               onclick="document.getElementById('new1').style.display='none';document.getElementById('fade').style.display='none'">Close</a> </div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> </tr>
    <tr>
      <div id="w"  style="background:url(<?php echo base_url();?>assets/images/room-view.jpg) no-repeat top center; width:725px;height:500px;border:1px solid black;">
        <div id="icons" style="display: block;padding-top: 30px;text-align: center;">
          <?php  $wid=$size_array[0]['width']/6 * 720/10;
                                                   $hig=$size_array[0]['height']/6*720/10;
                                                   $size_array[0]['width'];
                                                   //echo $img_details->images_filename;
                                          
										  ?>
          <input type="hidden" id="r_img_width_id" value="<?=$wid;?>">
          <input type="hidden" id="r_img_height_id" value="<?=$hig;?>">
		 <!-- starts For canvas room print-->
		<div  class="clickbttonforprint canvas_for_room" style="display:none; width:200px;height:200px;text-align: center;
    margin: 10px auto;">
		  <img src="http://static.mahattaart.com/398/<?=$image_name;?>" width="auto" height="90%">
		  </div>
		 <!-- ends for canvas room view   -->
          <div class="divimg mainhor_for_room"  style="border-image-source: url(&quot;<?=base_url();?>images/uploaded_pdf/frames/horizontal/Absolute Black.jpg&quot;); border-image-slice: 55; border-image-width: initial; border-image-outset: initial; border-image-repeat: round; border-style: solid; border-width: 22px;">
            			
            <div class="mount_for_room" style="border-image-source: url('http://mahattaart.com/images/uploaded_pdf/mount/DR 2091.jpg'); border-image-slice: 55; border-image-width: initial; border-image-outset: initial; border-image-repeat: round; border-style: solid; border-width: 12px;">
              
               
                      <div id="topa2" style="width:100px;height:auto"> <a href="javascript:" id="demo3" class="imglink">
                                                <img src="http://static.mahattaart.com/398/<?=$image_name;?>" alt="frame" width="100%" height="auto">
                                                
                       
                        </a> 
                   
              </div>
            </div>
          </div>
        </div>
      </div>
    </tr>
  </table>
</div>
<div id="large_image_dive" style="display:none;" class="large_image_dive" >
  <div align="right"> <a href="javascript:void(0)"
                               onclick="document.getElementById('large_image_dive').style.display='none';document.getElementById('fade').style.display='none'">Close</a> </div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> </tr>
    <tr>
      <div id="w"  >
        <div id="icons" style="width:80%; height: 80%">
          <input type="hidden" id="r_img_width_id" value="700">
          <input type="hidden" id="r_img_height_id" value="800">
          <div class="drag-iage" id="draggable"  >
            <div class="main_frame" id="change_frame">
              <div id="abc2">
                <div id="fir_room" >
                  <div id="fir1">
                    <div id="topa1">
                      <div id="fir2">
                        <div id="topa2"> <img  src="http://static.mahattaart.com/1100/<?=$image_name;?>" class="drag-image" style="height:100%; width: 100%;"  > </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </tr>
  </table>
</div>

<? //$img_shape->shapes?>
<div class="container">
  <!-- Decortive art -->
  <div class="decorative row">
  <div class="pagination" style="margin:0px ;"> <span><a href="<?php print base_url();?>">Home</a> > Frame It </span> </div>
    <div class="frame-it-wrapper col-md-12">
    <div class="row">
      <div class="col-md-7 col-sm-7 col-xs-12">
      <div class="frame-it-main text-center">
   <!--   starts for print only div-->
   		<div  class="clickbttonforprint" style="display:none;">
		  <img src="http://static.mahattaart.com/398/<?=$image_name;?>">
		  </div>
        <?php  
	//	echo $f_shape.'saji';
    //echo $mount_list9->framenmount_colour;
    if ($canvas=='canvas'){ ?>
	<div  class="showforprintonly" style="display:none;">
		  <img  src="http://static.mahattaart.com/398/<?=$image_name;?>" class="img-responsive">
		  </div>
        <div class="divimg mainhor" id="frame-it" style="margin-top:20px">
          <? } else {?>
		  <div class="showforprintonly" style="display:none;">
		  <img src="http://static.mahattaart.com/398/<?=$image_name;?>">
		  </div>
		  
          <div class="divimg mainhor" id="frame-it" style="border-image: url('<?=base_url()?>images/uploaded_pdf/frames/horizontal/Absolute Black.jpg') 57 57 57 57 round round;
  border-style: solid;
  border-width: 20px;
  margin-top: 20px;
  padding: 0;
  width: auto;">
            <?php }?>
			
			
            <div id="abc" style="background:url('<?=base_url()?>images/uploaded_pdf/mount/DR 2091.jpg')  0% 0% / cover no-repeat;width:auto;padding:10px; background-attachment:scroll; position: relative; z-index: 1;">
              <div id="fir">
               
                      <div id="topa2"> <a href="javascript:"
                                    id="demo2" class="imglink">
                        <?php if ($f_shape=='Slim'){?>
                        <img src="http://static.mahattaart.com/398/<?=$image_name;?>" alt="frame" width="140"  height="381" />
                        <?php }elseif ($f_shape=='Horizontal' ){?>
                        <img src="http://static.mahattaart.com/398/<?=$image_name;?>" alt="frame"  width="376" height="250" />
                        <?php }else if ($f_shape=='Vertical' ){?>
                        <img src="http://static.mahattaart.com/398/<?=$image_name;?>" alt="frame"  style="width:100%"  height="380" />
                        <?php }else if ($f_shape=='Square'){?>
                        <img src="http://static.mahattaart.com/398/<?=$image_name;?>" alt="frame"  width="261" height="260" />
                        <?php }else if ($f_shape=='Panoramic' ){?>
                        <img src="http://static.mahattaart.com/398/<?=$image_name;?>" alt="frame"   width="381"  height="140"  />
                        <?php }?>
                        <input type="hidden" value="<?php print $img_details->images_id;?>" id="imag_id"/>
                        <input type="hidden" id="frame_id"/>
						
                        <input type="hidden" name="extrawidth" id="extrawidth">
                        <input type="hidden" name="frame_it_price" id="frame_it_price">
                        <input type="hidden" name="frame_it_width" id="frame_it_width">
                        <input type="hidden" name="mount_it_width" id="mount_it_width">
                        <input type="hidden" name="type" id="type" value="<?php echo urldecode($this->uri->segment(4));?>">
                        <input type="hidden" name="imag_name" id="imag_name" value="<?php echo urldecode($this->uri->segment(7));?>">
                        </a> </div>
                   
              </div>
            </div>
          </div>
       
        
          <div class="otherlinks"> <a id="large" alt="Single Image" href="javascript:;"  onclick="large_images('','','');"> Larger Image</a>| <a href="javascript:;" target="_black" onClick="room_view('','','');">Room View</a>  
		 </div>
        </div>
        
        <!--BOTTOM TABS FOR CONTROL-->
        
        <div>
          <script>
$(document).ready(function() {
    $("#content div").hide(); // Initially hide all content
    $("#tabs li:first").attr("id","current"); // Activate first tab
    $("#content div:first").fadeIn(); // Show first tab content
    
    $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return       
        }
        else{             
        $("#content div").hide(); //Hide all content
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $('#' + $(this).attr('name')).fadeIn(); // Show content for current tab
        }
    });
});

function change_glass(glass){

var print_price=$('#print_price').html();
var FrameCost=$('#FrameCost').html();
var MountCost=$('#MountCost').html();
//alert(print_price);
        document.getElementById('glass_type').innerHTML=glass;
        document.getElementById('glass').value=glass;
		var print_sizes=document.getElementById("print_sizes").innerHTML;
	     var  mounts=$('#mount_size').html();
		 var mount = mounts.replace(/"/g, "");
		//  alert(mount);
		 var printsplit=print_sizes.split('X');
        var newmountheight=parseFloat(printsplit[0])+parseFloat(mount*2);
        var newmountwidth=parseFloat(printsplit[1])+parseFloat(mount*2);
	    
	   
	  $.ajax({
	  //alert(glass)
            type: "POST",
            url: "<?php print base_url() ?>frontend/get_web_glass_rate",
            data:'glass='+glass,
            success: function(data)
            {
			//alert(data);
			var glass_price=newmountheight*newmountwidth*data;
			//alert(glass_price);
              $('#glass_price').html(glass_price);   
			 // alert(glass_price)
			  var total_price= (parseFloat(print_price)+parseFloat(FrameCost)+parseFloat(MountCost)+parseFloat(glass_price));
			 var ppp=(parseFloat(print_price)+parseFloat(FrameCost)+parseFloat(MountCost));
			// alert(glass)
			 if(glass=='Regular'){
if($('#unchkforacrylic').is(':checked')){
//alert('jii')
$('#total_price').html(parseFloat(total_price.toFixed(2)));
$('.for_glass').show();

//alert(parseFloat(print_price)+parseFloat(FrameCost)+parseFloat(MountCost)+parseFloat(glass_price))
//alert('checked')
}
else{
$('#glass_type').html('0');
$('#total_price').html(ppp);
$('.for_glass').hide();

}
$('input:checkbox[name=arcylic]').attr('checked',false);

}
else if(glass=='Acrylic'){
$('input:checkbox[name=normal]').attr('checked',false);
///$('#total_price').html(parseFloat(total_price.toFixed(2)));
if($('#unchkfornormal').is(':checked')){
//alert('jii')
$('#total_price').html(parseFloat(total_price.toFixed(2)));
$('.for_glass').show();

//alert(parseFloat(print_price)+parseFloat(FrameCost)+parseFloat(MountCost)+parseFloat(glass_price))
//alert('checked')
}
else{
$('#glass_type').html('0');
$('#total_price').html(ppp);
$('.for_glass').hide();

}

}
	        }
        });
		
	
		
}

  

function get_frame_color(frame_color){
//alert(frame_color);
$('.for_first_slide').click();
var total_slide,total_s="";
   $.ajax({
            type:"post",
			url:"<?=base_url()?>frontend/get_frame_by_frame_color",
			data:'frame_color='+frame_color,
			success: function(response){
			//alert(response);
			var decode=JSON.parse(response);
			//alert(decode)
			//alert(decode.length)
			total_s=(decode.length/4);
			
			total_slide=Math.round(total_s);
			//alert(total_slide)
			var i,td_inner="";
			if(decode.length<4){
		  var loop_time=decode.length;
		  }else{
		  var loop_time=4;
		  }
			for(i=0;i<loop_time;i++){
			var val=decode[i];
			var explode=val.split(',');
			var f_code=explode[0];
			var add_quote_f_code="'"+f_code+"'";
			//alert(f_code)
			var explode1=explode[1];
			//alert(explode1)color,size,shape,f_code
			var f_name="'"+explode1+"'";
			var explode2=explode[2];
			var f_size="'"+explode2+"'";
			var explode2=explode[3];
			var f_color="'"+explode2+"'";
			var explode4=explode[4];
			var f_rate="'"+explode4+"'";
			var f_name_mm="'"+explode[6]+"'";
			var f_shape=$('#frame_shape').val();
			var frame_shape="'"+f_shape+"'";
			   // alerfffff
			  
			   
			td_inner += '<span onClick="return myfun('+f_color+','+f_size+','+frame_shape+','+f_name+','+f_rate+','+f_name_mm+');" class="col-md-3 col-sm-3 col-xs-6 col-sm-3"><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+f_code+'.jpg" width="200px" height="200px" style="margin-left:30px"; class="img-responsive"/><div class="text-center">'+explode1+'</div></span>';
			}
			//alert(td_inner)
			
			$('.first_slide').html(td_inner);
			//$('.catagory_selected').show();
			var images,item_images="";
			 four=4;
			 next_four=0;
			 $('.items').remove();
			for(var z=1;z<=total_slide;z++){
			
			images='<div class="item items"><span class="after_first_slide'+z+'"></span></div>';
			
			$(images).insertAfter('.actives');
			
	    next_four +=four;
	
	   rows_last =(parseInt(next_four) + parseInt(3));
	  // alert(next_four+'and'+rows_last)
		       for(var y=next_four;y<=rows_last;y++){
			   	//alert([y])
				//alert(y)
				//alert('loop')
				var frame_d=decode[y];
				//alert(frame_d)
				var each_f_d=frame_d.split(',');
				//alert(each_f_d)
				var frame_c=each_f_d[0];
				var add_q_f_code="'"+frame_c+"'";
				var explode1=each_f_d[1];
				var frame_n="'"+explode1+"'";
				//alert(frame_n)
				var explode2=each_f_d[2];
				var frame_s="'"+explode2+"'";
				var explode3=each_f_d[3];
				var frame_color="'"+explode3+"'";
				var explode4=each_f_d[4];
				var frame_r="'"+explode4+"'";
				var frame_n_mm="'"+explode[6]+"'";
				var shape=$('#frame_shape').val();
				
			//	alert(shape)
				var frame_shp="'"+shape+"'";
				
				//color,size,shape,f_code,f_rate
	   item_images ='<span onClick="myfun('+frame_color+','+frame_s+','+frame_shp+','+frame_n+','+frame_r+','+frame_n_mm+');" class="col-md-3 col-sm-3 col-xs-6"><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/'+frame_c+'.jpg" alt="second" width="200" height="200" style="margin-left:30px;" class="img-responsive"><div class="text-center">'+explode1+'</div></span>';
$(".after_first_slide"+z+"").append(item_images);
	
	         }
		$('#myCarousel').show();
			}
			
			}
   
   });

}



</script>
        </div>
      </div>
      <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="frame-it-right-panel">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
			
			 <input type="hidden"  id="frame_name" value="Absolute Black" />
		      <input type="hidden"  id="mount_name" value="DR 2091" />
			<input type="hidden" id="bordered_ac_srface" value="<?php echo $bordered_ac_srface;?>"/>
			<input type="hidden" id="paper_surface" value="<?php echo $paper_surface;?>"/>
			<input type="hidden" id="frame_shape" value="<?=$f_shape?>"/>
			<input type="hidden" id="mount_rate" value="0.75"/>
              <td><strong> Print only </strong></td>
              <td>&nbsp;</td>
              <td align="right"><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><strong><span id="print_price"><?php echo $price;?></span></strong></td>
            </tr>
            <tr>
              <td><strong>Print Size:</strong></td>
              <td>&nbsp;</td>
              <td align="right" id="print_sizes"><?php  
			 // print_r($wo_bodered_size);
			 // $bodered_size;
			  $split= explode("X",$wo_bodered_size);
			  $height = $split[0];
               $width=$split[1];
			 echo  $sizes_in_inch=$height.'" X '.$width.'"';
			  $split_for_wo=explode('X',$wo_bodered_size);
			  
			   ?>
               
              </td>
			  <span style="display:none;" id="wo_border_for_size"><span class="hide_for_frame">[ <?php echo $split_for_wo[0].'" X'.$split_for_wo[1].'"'?> without border ]<br>Ships in 24 Hours</span></span>
			   <input type="hidden" id="print_h_w" value="<?=$rep_size?>">
			   <input type="hidden" id="print_h_w_fixed" value="<?=$rep_size?>">
			   <input type="hidden" id="print_w-o_quot" value="<?=$split_for_wo[0].'X'.$split_for_wo[1]?>">
            </tr>
			 
            <tr class="for_print_hide">
			
              <td><strong>Frame Size(mm):</strong></td>
              <td>&nbsp;</td>
			  <td align="right" style=""  id="frame_size_mm">25</td>
              <td align="right" style="display:none;" id="frame_size">1 &quot;</td>
            </tr>
			
            <input type="hidden" id="print_mount_size" value="" >
            <input type="hidden" id="print_frame_size" value="" >
            <?php 
           if($canvas=='canvas'){
		   $fframm_rate=75;
		   }
		   else{
		   $fframm_rate=66;
		   }
        $newwidth=$width+1+6;
        $newlenght=$height+1+6;
        $newarea=$width+(0.5*2)*$height+(0.5*2);
        $new=$newwidth*2+$newlenght*2;
        $cost=$new*5;
         $newwidth1=$width+(1*2);
         $newlenght1=$height+(1*2);
        $matcost=$newwidth1*$newlenght1*0.75;
        $frameAera = (($newwidth1+(1*2))*2) + (($newlenght1+(1*2))*2);
        $FrameCost=($frameAera)/(12)*($fframm_rate);//rate 2
		 
        $glasscost=$newwidth1*$newlenght1*.38;
     
         $framed_print_art_size=($newlenght1+(1*2)).'"X'.($newwidth1+(1*2)).'"';
       
 
         
       // print_r($images_id); 
      ?>
            
 <input type="hidden" id="glass_coste" value="<?=$frameAera.$newwidth1.$newlenght1?>">
<input type="hidden" id="glass" value="Regular">
<input type="hidden" id="mat1_color" value="White">
<input type="hidden" id="mat1_size" value="<?='1.0';?>">
<input type="hidden" id="frame_color" value="Black">
<input type="hidden" id="fat_frame" value="1">
<input type="hidden" id="image_id" value="<?=$images_id;?>">
<input type="hidden" id="images_price" value="<?=$price;?>">
<input type="hidden" id="imagsTypes" value="<?=$imagsTypes;?>">
<input type="hidden" id="user_id" value="<?=$userid;?>">
<input type="hidden" id="canvas_check" value="">
<input type="hidden" id="image_namee" value="<?=$image_name;?>">

            
            <input type="hidden" id="print_height" value="<?=$height?>">
            <input type="hidden" id="print_width" value="<?=$width?>">
			<input type="hidden" id="removed_mount_size" value="" />
			<input type="hidden" id="removed_mount_code" value="" />
			<input type="hidden" id="removed_mount_color" value="" />
			<input type="hidden" id="removed_framed_art" value="" />
			<tr style="display:none;" class="showforcanvas">
              <td><strong>Frame Type:</strong></td>
              <td>&nbsp;</td>
              <td align="right" ><strong><span id="frame_type">Streched Canvas Gallary Wrap</span></strong></td>
            </tr>
            <tr class="for_print_hide">
              <td><strong>Frame Name:</strong></td>
              <td>&nbsp;</td>
              <td align="right" ><strong><span id="f_color">Absolute Black</span></strong></td>
            </tr>
            <tr class="for_print_hide  showforcanvas">
              <td><strong>Frame Cost:</strong></td>
              <td>&nbsp;</td>
              <td align="right" ><strong><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><span id="FrameCost"><?php echo round($FrameCost,2)?> </span></strong></td>
            </tr>
            <tr class="for_print_hide for_mount_re">
              <td><strong>Mount Size:</strong></td>
              <td>&nbsp;</td>
              <td align="right" id="mount_size">1"</td>
            </tr>
            <tr class="for_print_hide for_mount_re">
              <td><strong>Mount Color:</strong></td>
              <td>&nbsp;</td>
              <td align="right" ><strong><span id="mount_color">Ice White</span></strong></td>
            </tr>
            <tr class="for_print_hide for_mount_re">
              <td><strong>Mount Cost:</strong></td>
              <td>&nbsp;</td>
              <td align="right" ><strong><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><span id="MountCost"><?php echo $matcost?></span></strong></td>
            </tr>
            <tr class="for_print_hide for_glass">
             <td><strong>Glass Type:</strong>
			 <br />
			 <span id="glass_type">Regular</span>
			 </td>
              <!--<td id="glass_type">Normal</td>-->
			  <td>&nbsp;</td>
              <td align="right" ><strong><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><span id="glass_price"><?php echo $glasscost?> </span></strong></td>
            </tr>
            
         
            <?php
      
      ?>
            <input type="hidden" id="fitting_price" value="<?=$filting_price?>">
            <?php 
    $total_price=$price+$matcost+$FrameCost+$glasscost;
    ?>
            
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="color:#d3131b">
              <td colspan="2" style="border-top:1px solid #d3131b"><strong>Total Price</strong></td>
              <td align="right"  style="border-top:1px solid #d3131b" ><strong><img src="<?=base_url()?>assets/images/frameit/rupee.gif" alt="r" align="absmiddle" /><span id="total_price" ><?= round($total_price, 2);?></span></strong></td>
            </tr>
          </table>
		  
          <a href="javascript:;" onclick="capture();"
        class="buyit">Buy It Framed</a>
         
          <a  href="javascript:;"
onclick="save_to_cart();" class="buyprint">Buy Print Only </a>
<a href="#"  class="buyprint edit_this_frame">Edit this frame</a>
          <!-- <input type="submit" value="Buy Print Only" class="buyprint" onclick="save_to_cart();">-->
          <div class="view "> <span class="framed_art_prnt">Framed Art Print:</span><span class="framed_art"><?=$framed_print_art_size;?></span><span class="wo_border_for_size"></span></div>
          <br>
		  <script>

 $('.edit_this_frame').click(function(){
$('html, body').animate({ scrollTop: $('.edit_this_frame').offset().top }, 'slow');    });
	
</script>
          <div class="view"> 
          <a style="width:auto;margin: 0; padding: 6px 8px;background:#d3131b;color: #fff;text-decoration: none !important;" <?php  if(!$this->session->userdata('userid')){?> onclick="login('');"<?php }else{?> href="javascript:addToCart()" <?php  }?> >Add to Cart</a>
          <a style="width: auto;color:white; margin: 0;padding: 6px 8px; background:#d3131b;" href="javascript:;"  onclick="addtogallery('<?=$api_image_id;?>','<?=$image_name;?>');" id="tgl">SAVE TO GALLERY</a> </div>
								<div style="margin-top:10px;margin-left:20px">
		
		</div>
        </div>
        </div>
      </div>
    </div></div>
    
    <div class="row"><div class="col-md-12">
    <div class="tabs-wrapper" <?php if ($img_shape->shapes=='Slim' || $img_shape->shapes=='Vertical'){ ?> style="margin-top: 116px;" <?php }?>>
    <div class="row">
          <ul id="tabs" class="col-md-8" style="margin-bottom:0">
            <li><a href="javascript:" onClick="hide();showTable('Basic');" name="tab7" id="fr1">FRAMES </a></li>
            <li><a href="javascript:onc" onClick="hide();show_mat('');" name="tab8" id="ma1">Mount</a></li>
            <li><a href="#" onClick="slide_show_hide();" name="tab3" id="ac1">Glass</a></li>
            <!-- <li><a href="#" name="tab4" id="cr1">Cropping</a></li>-->
            <li><a href="#" onClick="slide_show_hide();" name="tab5" id="wa1">Wall Color frames </a></li>
          </ul>
          <div class="undo-restore col-md-4">
              <ul id="tabs_icon" class="pull-right" style="margin-bottom:0">
                <li><a href="javascript:;" onclick="undoinput();" id="btnUndo"><img src="<?=base_url()?>assets/images/frameit/undo.gif" class="img-responsive" alt="undo" /></a></li>
                <li><a href="javascript:;" onclick="redo();" id="btnRedo"><img src="<?=base_url()?>assets/images/frameit/restore.gif" class="img-responsive" alt="restore" /></a></li>
              </ul>
          	
          	
          </div>
    </div>
		  <?php
		  
				//$frame=$this->frontend_model->get_all_tbl_web_price();Choose by color 
				
				 ?>
				 <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 20%;
      margin: auto;
  }
  ul.choose-colors-type {
    height: auto;
    max-height: 100px;
    overflow-x: hidden;
}
  .choose-colors-type li a, .choose-colors-type-mount li a {
    color: #6b6b6b;
    font-size: 12px;
    padding: 2px 6px;
    display: block;
}
  </style>
				 
          <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-3"><div id="content">
              
                <div id="tab7" style="display:block;">
                  <table border="0" cellspacing="0" cellpadding="0" class="table">
                    <tr>
                    <td><input type="hidden" value="" class="for_check_printor_frame" /></td>
                      <td><h4 class="choose-colors"> Select frame style</h4>
                        <ul class="choose-colors-type">
                        <?php
                        //print_r($frame_cat);
                        foreach($frame_cat as $frame_c){
                        ?>
                        <li><a href="javascript:" onclick="showTable('<?=$frame_c->frame_category;?>');" class="active"><?=$frame_c->frame_category;?></a></li>
                        <?php
                        }
                        ?>
                          
                        </ul>
                        
                        <h4 class="choose-colors"> Choose by Size(mm) </h4>
                        <ul class="choose-colors-type">
                        
                          <?php
                        // print_r($frame_sizze);
                          foreach($frame_sizze as $frame_s){
                          ?>
                          <li><a href="javascript:" onClick="Frame_Size('<?=$frame_s->frame_size_inch;?>','<?=$frame_s->frame_size;?>'); change_mount(document.getElementById('print_mount_size').value);">
                          <?php
                         echo  $frame_s->frame_size;
                          
                          ?></a></li>
                          <?php
                          }
                          ?>
                       
                        </ul>
                    <h4 class="choose-colors"> Choose by Color </h4>
                        <ul class="choose-colors-type">
                        <?php 
                        foreach($frame_color as $frame_co){
                        //print_r($frame_c);
                        ?>
                        <li>
                        <a href="javascript:" onclick="get_frame_color('<?=$frame_co->frame_color;?>');"><?=$frame_co->frame_color;?> </a>
                        </li>
                        <?php
                        }
                        ?>
                        </ul>
                        </td>
                    </tr>
                  </table>
                  
                </div>
                
      
    
                <style>
            .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.10;
            filter: alpha(opacity=80);
        }
        .white_content {
            display: none;
            position: absolute;
            top: 25%;
            left: 25%;
            width: 62%;
            height: 34%;
            padding: 16px;
            border: 4px solid orange;
            background-color: white;
            z-index:1002;
            overflow: hidden;
            
        }.close{ float: right;
                 padding-bottom: 30px;
            
            
        }
    
            </style>
            
                <div  id="light" class="white_content"> <a href = "javascript:void(0)" class="close" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">X</a>
                  <table class="show_mat_size_box">
                    <?php
    $count=1;
    for($i=0.50;$i<=6.00;$i=$i+0.50)
    { 
        //echo $i;
        if($count==0) 
        {echo '<tr>';}
            
    echo '<td style="width: 27px;">|<a href="javascript:;"  onclick="javascript:change_mount('.$i.')">'.number_format((float)$i, 2, '.', '').'</a>|&nbsp;&nbsp;&nbsp;&nbsp;</td>';
        if($count==26)
        {
            $count=0;
    echo '</tr>';
        }
    $count++;
    
    } // end loop  ?>
                  </table>
                </div>
                <div id="fade" class="black_overlay"></div>
                <div id="tab8" style="display:none;">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mat-types-table">
                   <h4 class="choose-colors"> Remove Mount <input type="checkbox" id="re-mount" name="re-mount" /> </h4>
                    <h4 class="choose-colors"> CHOOSE BY COLOR: </h4>
                    <tr>
                    
                    <td width="240">
                    <table border="0" cellpadding="4" cellspacing="0" style="margin: auto; display: block;" class="bor" id="mat1">
                        <tbody>
                        <ul class="choose-colors-type-mount">
                        <?php 
                        foreach($mount_name as $mount_t)
                        { ?>
                            <li><a href="javascript:" onclick="return show_mat('<?=$mount_t->mount;?>');"><?=$mount_t->mount;?></a>
                            </li>
                          <?php }?>
                          </ul>
                        </tbody>
                      </table>
                      <h4 class="choose-colors"> Select Width: </h4>
                      <select onChange="return change_mount(this.value);" style="padding:10px; width:100%;">
                        <option value="0">--Select--</option>
                        <? for($i=0.50;$i<=6.00;$i=$i+0.50)
        { 
       ?>
                        <option value="<?=$i?>"><b>
                        <?=$i.'"'?>
                        </b></option>
                        <? }?>
                      </select>
                      <!--<h4 class="choose-colors"> Choose by Size </h4>-->
                      <!--  How many mats<br/>
              would you like?  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="">0</a>&nbsp;&nbsp;&nbsp;<a href="javascript:" onclick=" hide();show_mat(document.getElementById('mat1'));">1</a>&nbsp;&nbsp;&nbsp;<!--<a href="javascript:;" onclick="hide(); show_mat(document.getElementById('mat2'));">2</a>
             <img src="<?=base_url()?>assets/images/frameit/mat-details.gif" width="227" height="160" alt="details" />-->
                    </td>
                    <td valign="top">
                    
                    <!-- <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 18px" >
          <tr>
              <td align="center" > Select Your Top Mat </td>
              <td align="center"><a href="#!" class="change-mat-width" onclick ="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Change Width</a>
                </td>
              <td align="center" ><input type="checkbox" name="d" id="d"/>
                View only conservation mats</td>
            </tr>
          </table>-->
                    <table>
                      <tr>
                        <td><a href="javascript:"  class="color256" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list->framenmount_sale_price;?>','<?php echo $mount_list->framenmount_colour;?>');">
                          <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['0'];?>" width="100px" height="100px"/>-->
                          </a></td>
                        <!-- <td ><a href="javascript:"  class="color36" onclick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list1->
                        framenmount_sale_price;?>','<?php echo $mount_list1->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['0'];?>" width="100px" height="100px"/>--</a></td>
                  <td ><a href="javascript:"  class="color36" onclick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list2->
                        framenmount_sale_price;?>','<?php echo $mount_list2->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['0'];?>" width="100px" height="100px"/>--</a></td>-->
                        <td ><a href="javascript:"  class="color3" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list3->framenmount_sale_price;?>','<?php echo $mount_list3->framenmount_colour;?>');">
                          <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['0'];?>" width="100px" height="100px"/>-->
                          </a></td>
                        <td ><a href="javascript:"  class="color318" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list4->framenmount_sale_price;?>','<?php echo $mount_list4->framenmount_colour;?>');">
                          <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['0'];?>" width="100px" height="100px"/>-->
                          </a></td>
                        <td ><a href="javascript:"  class="color80" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list5->framenmount_sale_price;?>','<?php echo $mount_list5->framenmount_colour;?>');">
                          <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['0'];?>" width="100px" height="100px"/>-->
                          </a></td>
                        <td ><a href="javascript:"  class="color112" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list6->framenmount_sale_price;?>','<?php echo $mount_list6->framenmount_colour;?>');">
                          <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['0'];?>" width="100px" height="100px"/>-->
                          </a></td>
                        <td ><a href="javascript:"  class="color24" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list7->framenmount_sale_price;?>','<?php echo $mount_list7->framenmount_colour;?>');">
                          <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['0'];?>" width="100px" height="100px"/>-->
                          </a></td>
                        <td ><a href="javascript:"  class="color106" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list8->framenmount_sale_price;?>','<?php echo $mount_list8->framenmount_colour;?>');"></a></td>
                        <td ><a href="javascript:"  class="color306" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list9->framenmount_sale_price;?>','<?php echo $mount_list9->framenmount_colour;?>');"></a></td>
                        <td ><a href="javascript:"  class="color22" onClick="change_color('<?php echo $comps['0'];?>','<?php echo $mount_list10->framenmount_sale_price;?>','<?php echo $mount_list10->framenmount_colour;?>');"></a></td>
                        <!--  <td><a href="javascript:;" onclick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list->
                        framenmount_sale_price;?>','<?php echo $mount_list->framenmount_colour;?>');"><img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['1'];?>" width="100px" height="100px"/>
                        </a>
                      </td>
                      
                      -->
                      <!--<td><a href="javascript:;" class="color2" onclick="change_color3d('');"></a>3-D</td>
                <td align="center"><img src="<?=base_url()?>assets/images/frameit/mat-shape.gif" width="65" height="90" alt="mat" /></td>-->
                      </tr>
                      
                    </table>
                    <!--   <table>
                  <tr>
                        <td> <input type="checkbox" value="5" name="width1" id="width1" class="example1" onclick="change_color2(5,<?php echo $width;?>,<?php echo $height;?>,0.5)"> O.5</td>
                      <td> <input type="checkbox" value="10" name="width2" id="width2" class="example1" onclick="change_color2(10,<?php echo $width;?>,<?php echo $height;?>,1.0)"> 1.0</td>
    
                      <td> <input type="checkbox" value="15" name="width3" id="width3" class="example1"onclick="change_color2(15,<?php echo $width;?>,<?php echo $height;?>,1.5)"> 1.5</td>
                      </tr>
                  <tr>
                      <td> <input type="checkbox" value="20" name="width4" id="width4" class="example1" onclick="change_color2(20,<?php echo $width;?>,<?php echo $height;?>,2.0)"> 2.0</td>
                      <td> <input type="checkbox" value="25"  name="width5" id="width5" class="example1" onclick="change_color2(25,<?php echo $width;?>,<?php echo $height;?>,2.5)"> 2.5</td>
                      <td> <input type="checkbox" value="30"  name="width6"  id="width6" class="example1" onclick="change_color2(30,<?php echo $width;?>,<?php echo $height;?>,3.0)"> 3.0</td>
                  </tr>
    
              </table>-->
                    <table width="50%" border="0" cellpadding="4" cellspacing="0" class="bor" id="mat2" style="display:none;margin:auto;">
                    
                    <tr>
                      <td><a href="javascript:;" class="color256" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list->framenmount_sale_price;?>','<?php echo $mount_list->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['1'];?>" width="100px" height="100px"/>-->
                        </a></td>
                      <td><a href="javascript:;" class="color36" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list1->framenmount_sale_price;?>','<?php echo $mount_list1->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['1'];?>" width="100px" height="100px"/>-->
                        </a></td>
                      <td><a href="javascript:;" class="color36" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list2->framenmount_sale_price;?>','<?php echo $mount_list2->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['1'];?>" width="100px" height="100px"/>-->
                        </a></td>
                      <td><a href="javascript:;" class="color3" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list3->framenmount_sale_price;?>','<?php echo $mount_list3->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['1'];?>" width="100px" height="100px"/>-->
                        </a></td>
                      <td><a href="javascript:;" class="color318" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list4->framenmount_sale_price;?>','<?php echo $mount_list4->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['1'];?>" width="100px" height="100px"/>-->
                        </a></td>
                      <td><a href="javascript:;" class="color80" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list5->framenmount_sale_price;?>','<?php echo $mount_list5->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['1'];?>" width="100px" height="100px"/>-->
                        </a></td>
                      <td><a href="javascript:;" class="color112" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list6->framenmount_sale_price;?>','<?php echo $mount_list6->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['1'];?>" width="100px" height="100px"/>-->
                        </a></td>
                      <td><a href="javascript:;" class="color24" onClick="change_color2d('<?php echo $comps['1'];?>','<?php echo $mount_list7->framenmount_sale_price;?>','<?php echo $mount_list7->framenmount_colour;?>');">
                        <!--<img src="<?php echo base_url();?>uploaded_pdf/<?php echo $comps['1'];?>" width="100px" height="100px"/>-->
                        </a></td>
                    </tr>
                  </table>
                  </td>
                  </tr>
                  </table>
                </div>
                <div id="tab3" style="display:none;">
                
                  <form>
                  
                  <table width="100%" border="0" cellspacing="0" cellpadding="4" class="acrylic-table">
      <tr>
        <h4 class="choose-colors">  REGULAR Glass </h4>
        
        <ul>
        <li> 
         Protect prints from protects dust and scratches 
        
        
          <span style="padding-left:300px;">   <input name="normal" type="checkbox" id="unchkforacrylic"  onclick="return change_glass(this.value);" value="Regular" class="example"/>
            Regular Glass  </span> 
          
         </li>
        </ul>
         <h4 class="choose-colors"> Acrylic Glass   </h4>
         
        <ul>
        <li> Lightweight, Transparent, Shatter- resistance 
            <span style="padding-left:300px;">   <input name="arcylic" type="checkbox" id="unchkfornormal"  onclick="return change_glass(this.value);" value="Acrylic" class="example"/>Acrylic Glass  </span> 
         </li>
        </ul>
      
      </tr>
      </table>
                  
                <script>
                
                $('input:checkbox[name=re-mount]').click(function(){
                var print_price=$('#print_price').html();
                var FrameCost=$('#FrameCost').html();
                var MountCost=$('#MountCost').html();
                var glass_price=$('#glass_price').html();
                 var framed_art=$('.framed_art').html();
                 var mount_size=$('#mount_size').html();
                  var splt=framed_art.split('X');
                //  var fremed_art_w=(parseFloat(splt[0])+(parseFloat(frame_size))*2);
                 // alert(fremed_art_w)
               // total_price_for_comman(print_price,FrameCost,MountCost,glass_price);
                 if($('#re-mount').is(':checked')){
                // alert('checked')
                  $('#removed_mount_size').val($('#mount_size').html());
                   $('#removed_mount_code').val($('#mount_name').val());
                   $('#removed_mount_color').val($('#mount_color').html());
                    $('#removed_framed_art').val(framed_art);
                 
                   $('.framed_art').html((parseFloat(splt[0])-(parseFloat(mount_size)*2))+'"X'+(parseFloat(splt[1])-(parseFloat(mount_size)*2))+'"');
                   
                   $('#mount_size').html('0');
                   $('#mount_name').val('0');
                   $('#mount_color').html('0');
                  $('#abc').css('padding','');
                  $('.for_mount_re').hide();
                 
                 
                
                $('#total_price').html(parseFloat(print_price)+parseFloat(FrameCost)+parseFloat(glass_price));
                   }
                   else{
                  var removed_framed_art=$('#removed_framed_art').val();
                  $('.framed_art').html(removed_framed_art);
                   $('#abc').css('padding','25px');
                 $('#mount_size').html($('#removed_mount_size').val());
                 $('#mount_name').val($('#removed_mount_code').val());
                 $('#mount_color').html($('#removed_mount_color').val());
                 
                   $('.for_mount_re').show();
                   $('#total_price').html(parseFloat(print_price)+parseFloat(FrameCost)+parseFloat(MountCost)+parseFloat(glass_price));
                   }
                   });
                </script>  
                  </form>
                   
                </div>
                <div id="tab4" style="display:none;">
                  <table width="70%" border="0" align="center" cellpadding="4" cellspacing="0" class="crop-table">
                    <tr>
                      <td height="30" colspan="2" align="center" bgcolor="#f0f0f0">Crop the borders of your print</td>
                      <td bgcolor="#F0F0F0">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="150" align="center"><img src="<?=base_url()?>assets/images/frameit/no-crop.jpg" width="139" height="136" alt="no crop" /></td>
                      <td width="150" align="center"><img src="<?=base_url()?>assets/images/frameit/default-crop.jpg" width="139" height="136" alt="def" /></td>
                      <td>For a more refined look, crop the borders of<br />
                        your print and add a mat.</td>
                    </tr>
                  </table>
                </div>
                
      </div></div>
      <div id="tab5" style="display:none;" class="col-md-12 col-sm-12 col-xs-12">
                  <table class="bor">
                    <tr>
                      <td><a href="javascript:;" class="color1" onClick="javascript:change_wallcolor('#FFFBF8');"></a></td>
                      <td><a href="javascript:;" class="color2" onClick="javascript:change_wallcolor('#FFFCF7');"></a></td>
                      <td><a href="javascript:;" class="color3" onClick="javascript:change_wallcolor('#FFFFFF');"></a></td>
                      <td><a href="javascript:;" class="color4" onClick="javascript:change_wallcolor('#F7FFFF');"></a></td>
                      <td><a href="javascript:;" class="color5" onClick="javascript:change_wallcolor('#F7F4FF');"></a></td>
                      <td><a href="javascript:;" class="color6" onClick="javascript:change_wallcolor('#FEF7FF');"></a></td>
                      <td><a href="javascript:;" class="color7" onClick="javascript:change_wallcolor('#FFF7F6');"></a></td>
                      <td><a href="javascript:;" class="color8" onClick="javascript:change_wallcolor('#FFFBFF');"></a></td>
                      <td><a href="javascript:;" class="color9" onClick="javascript:change_wallcolor('#EDDFF0');"></a></td>
                      <td><a href="javascript:;" class="color10" onClick="javascript:change_wallcolor('#F0DFEF');"></a></td>
                      <td><a href="javascript:;" class="color11" onClick="javascript:change_wallcolor('#FFDAEF');"></a></td>
                      <td><a href="javascript:;" class="color12" onClick="javascript:change_wallcolor('#FFDBE7');"></a></td>
                      <td><a href="javascript:;" class="color13" onClick="javascript:change_wallcolor('#F0DFEF');"></a></td>
                      <td><a href="javascript:;" class="color14" onClick="javascript:change_wallcolor('#FFDAE7');"></a></td>
                      <td><a href="javascript:;" class="color15" onClick="javascript:change_wallcolor('#DCE8F4');"></a></td>
                      <td><a href="javascript:;" class="color16" onClick="javascript:change_wallcolor('#DFE6F8');"></a></td>
                      <td><a href="javascript:;" class="color17" onClick="javascript:change_wallcolor('#BDB76B');"></a></td>
                      <td><a href="javascript:;" class="color18" onClick="javascript:change_wallcolor('#FF8C00');"></a></td>
                      <td><a href="javascript:;" class="color19" onClick="javascript:change_wallcolor('#9932CC');"></a></td>
                      <td><a href="javascript:;" class="color20" onClick="javascript:change_wallcolor('#E9967A');"></a></td>
                      <td><a href="javascript:;" class="color21" onClick="javascript:change_wallcolor('#8FBC8F');"></a></td>
                      <td><a href="javascript:;" class="color22" onClick="javascript:change_wallcolor('#FFD700');"></a></td>
                      <td><a href="javascript:;" class="color23" onClick="javascript:change_wallcolor('#DAA520');"></a></td>
                      <td><a href="javascript:;" class="color24" onClick="javascript:change_wallcolor('#008000');"></a></td>
                      <td><a href="javascript:;" class="color25" onClick="javascript:change_wallcolor('#ADFF2F');"></a></td>
                      <td><a href="javascript:;" class="color26" onClick="javascript:change_wallcolor('#FF69B4');"></a></td>
                      <td><a href="javascript:;" class="color27" onClick="javascript:change_wallcolor('#CD5C5C');"></a></td>
                      <td><a href="javascript:;" class="color28" onClick="javascript:change_wallcolor('#FFFFF0');"></a></td>
                      <td><a href="javascript:;" class="color29" onClick="javascript:change_wallcolor('#F0E68C');"></a></td>
                      <td><a href="javascript:;" class="color30" onClick="javascript:change_wallcolor('#E6E6FA');"></a></td>
                      <td><a href="javascript:;" class="color31" onClick="javascript:change_wallcolor('#FFF0F5');"></a></td>
                      <td><a href="javascript:;" class="color32" onClick="javascript:change_wallcolor('#7CFC00');"></a></td>
                      <td><a href="javascript:;" class="color33" onClick="javascript:change_wallcolor('#FFFACD');"></a></td>
                      <td><a href="javascript:;" class="color34" onClick="javascript:change_wallcolor('#ADD8E6');"></a></td>
                      <td><a href="javascript:;" class="color35" onClick="javascript:change_wallcolor('#F08080');"></a></td>
                      <td><a href="javascript:;" class="color36" onClick="javascript:change_wallcolor('#E0FFFF');"></a></td>
                      <td><a href="javascript:;" class="color37" onClick="javascript:change_wallcolor('#FAFAD2');"></a></td>
                      <td><a href="javascript:;" class="color38" onClick="javascript:change_wallcolor('#D3D3D3');"></a></td>
                      <td><a href="javascript:;" class="color39" onClick="javascript:change_wallcolor('#90EE90');"></a></td>
                      </tr>
                      <tr>
                      <td><a href="javascript:;" class="color40" onClick="javascript:change_wallcolor('#FFB6C1');"></a></td>
                      <td><a href="javascript:;" class="color41" onClick="javascript:change_wallcolor('#FFA07A');"></a></td>
                      <td><a href="javascript:;" class="color42" onClick="javascript:change_wallcolor('#20B2AA');"></a></td>
                      <td><a href="javascript:;" class="color43" onClick="javascript:change_wallcolor('#87CEFA');"></a></td>
                      <td><a href="javascript:;" class="color44" onClick="javascript:change_wallcolor('#778899');"></a></td>
                      <td><a href="javascript:;" class="color45" onClick="javascript:change_wallcolor('#B0C4DE');"></a></td>
                      <td><a href="javascript:;" class="color46" onClick="javascript:change_wallcolor('#FFFFE0');"></a></td>
                      <td><a href="javascript:;" class="color47" onClick="javascript:change_wallcolor('#00FF00');"></a></td>
                      <td><a href="javascript:;" class="color48" onClick="javascript:change_wallcolor('#32CD32');"></a></td>
                      <td><a href="javascript:;" class="color49" onClick="javascript:change_wallcolor('#FAF0E6');"></a></td>
                      <td><a href="javascript:;" class="color50" onClick="javascript:change_wallcolor('#FF00FF');"></a></td>
                      <td><a href="javascript:;" class="color51" onClick="javascript:change_wallcolor('#66CDAA');"></a></td>
                      <td><a href="javascript:;" class="color52" onClick="javascript:change_wallcolor('#BA55D3');"></a></td>
                      <td><a href="javascript:;" class="color53" onClick="javascript:change_wallcolor('#9370DB');"></a></td>
                      <td><a href="javascript:;" class="color54" onClick="javascript:change_wallcolor('#3CB371');"></a></td>
                      <td><a href="javascript:;" class="color55" onClick="javascript:change_wallcolor('#7B68EE');"></a></td>
                      <td><a href="javascript:;"class="color56" onClick="javascript:change_wallcolor('#00FA9A');"></a></td>
                      <td><a href="javascript:;" class="color57" onClick="javascript:change_wallcolor('#48D1CC');"></a></td>
                      <td><a href="javascript:;" class="color58" onClick="javascript:change_wallcolor('#C71585');"></a></td>
                      <td><a href="javascript:;" class="color59" onClick="javascript:change_wallcolor('#191970');"></a></td>
                      <td><a href="javascript:;" class="color60" onClick="javascript:change_wallcolor('#F5FFFA');"></a></td>
                      <td><a href="javascript:;" class="color61" onClick="javascript:change_wallcolor('#FFE4E1');"></a></td>
                      <td><a href="javascript:;" class="color62" onClick="javascript:change_wallcolor('#FFE4B5');"></a></td>
                      <td><a href="javascript:;" class="color63" onClick="javascript:change_wallcolor('#FFDEAD');"></a></td>
                      <td><a href="javascript:;" class="color64" onClick="javascript:change_wallcolor('#FDF5E6');"></a></td>
                      <td><a href="javascript:;" class="color65" onClick="javascript:change_wallcolor('#808000');"></a></td>
                      <td><a href="javascript:;" class="color66" onClick="javascript:change_wallcolor('#6B8E23');"></a></td>
                      <td><a href="javascript:;" class="color67" onClick="javascript:change_wallcolor('#FFA500');"></a></td>
                      <td><a href="javascript:;" class="color68" onClick="javascript:change_wallcolor('#FF4500');"></a></td>
                      <td><a href="javascript:;" class="color69" onClick="javascript:change_wallcolor('#DA70D6');"></a></td>
                      <td><a href="javascript:;" class="color70" onClick="javascript:change_wallcolor('#EEE8AA');"></a></td>
                      <td><a href="javascript:;" class="color71" onClick="javascript:change_wallcolor('#98FB98');"></a></td>
                      <td><a href="javascript:;" class="color72" onClick="javascript:change_wallcolor('#AFEEEE');"></a></td>
                      </tr>
                      </table>
                </div>
      <div id="myCarousel" class="carousel slide col-md-10 col-sm-10 col-xs-9" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active for_first_slide"></li>

      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
	
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active actives">
	 
      <span class="first_slide">  
	   <?php 
  $tbl_web_pricee=$this->frontend_model->get_frame_code_web_price();
  
  //print_r($tbl_web_pricee);
  /*
  foreach($tbl_web_pricee as $fcode){
  $x=$fcode->frame_code;
  print_r($x).'<br>';
  }
  */
//print_r(count($tbl_web_pricee));
$rows=(count($tbl_web_pricee))/4;
$rows_slider=round($rows);
   for($x=0;$x<=3;$x++){
  // print_r()
  //echo $x;
  //color,size,shape,f_code,f_rate,f_name
  ?>	
  
	  <span class="col-md-3 col-sm-3 col-xs-6" onClick="return myfun('<?=$tbl_web_pricee[$x]->frame_color?>','<?=$tbl_web_pricee[$x]->frame_size_inch;?>','<?=$f_shape?>','<?=$tbl_web_pricee[$x]->frame;?>','<?=$tbl_web_pricee[$x]->frame_rate;?>','<?=$tbl_web_pricee[$x]->frame_size;?>');"><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/<?=$tbl_web_pricee[$x]->frame_code.'.jpg'?>" alt="first" class="img-responsive"style="margin:10px;">
      	<div class="text-center">
		<?=$tbl_web_pricee[$x]->frame;?>
        </div>
		<?php  
		if($tbl_web_pricee[$x]->availablity=='0'){
		?>
		<div style="color:red;" class="out_stock text-center">
        	Out of stock
        </div>
		<?php
		}
		?>
      </span> 
	  
	  <?php
	  }
	  ?>
	  </span>
	 
       
      </div>
	 
    <?php
	for($z=1;$z<$rows_slider;$z++){
	//echo $z;
	?>
	
      <div class="item items">
	 
	  <span class="after_first_slide">
	   <?php 
	   $four=4;
	   $next_four +=$four;
	   $rows_last =($next_four + 3);
	  
	   //echo $next_four;
	  //  echo $rows_last;
	   //$perslide=
	 for($y=$next_four;$y<=$rows_last;$y++){
	 ?>
        <span class="col-md-3 col-sm-3 col-xs-6" onClick="return myfun('<?=$tbl_web_pricee[$y]->frame_color?>','<?=$tbl_web_pricee[$y]->frame_size_inch;?>','<?=$f_shape?>','<?=$tbl_web_pricee[$y]->frame;?>','<?=$tbl_web_pricee[$y]->frame_rate;?>','<?=$tbl_web_pricee[$y]->frame_size;?>');"><img src="<?php echo base_url()?>images/uploaded_pdf/frames/frames_angle/<?=$tbl_web_pricee[$y]->frame_code.'.jpg'?>" alt="second" class="img-responsive" style="margin:10px;" / >
            <div class="text-center">
			<?=$tbl_web_pricee[$y]->frame;?>
            </div>
			<?php  
		if($tbl_web_pricee[$y]->availablity=='0'){
		?>
		<div style="color:red;" class="out_stock text-center">
        	Out of stock
        </div>
		<?php
		}
		?>
        </span>
		<?php
		}
		?>
		</span>
        
      </div>
      <?php
	  }
	  ?>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" style="background-image: none" href="#myCarousel" role="button" data-slide="prev">
      <i class="glyphicon glyphicon-chevron-left"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" style="background-image: none" href="#myCarousel" role="button" data-slide="next">
      <i class="glyphicon glyphicon-chevron-right"></i>
      <span class="sr-only">Next</span>
    </a>
  </div>
  		</div>
  
</div>
	</div></div>
	</div>
	</div>
