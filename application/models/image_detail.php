<?php 
if($this->session->userdata('userid'))
{
$Obj=new Search();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->Search_save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
?>


<?php $this->load->model('cart_model');
 $image_id=$image_detail->images_id;
$collection_id=$this->search_model->get_image_collection($image_id);
$pricing_ran=$this->search_model->get_range($image_id);
$pricing_range=$pricing_ran->pricing_range;
$max_size=$this->search_model->get_max_size($image_id);
$max_width_allowed=$max_size->image_original_width/150;
$max_height_allowed=$max_size->image_original_height/150;

// calcuulate image ratio
$size_data = getimagesize("http://www.indiapicture.in/wallsnart/398/".$image_detail->images_filename."");
$image_alignment="";
// Step 1: detect image is horizontal, vertical or square 
// 0=>width and 1=>height :::: 4:3->1.3333 and 2:3->0.667 :::: 12,16,24,32,40,44
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
	if($surface==7)//translite
	{
		$size_array[0]['width']=12*$image_ratio;
		$size_array[0]['height']=12;
		$size_array[1]['width']=36*$image_ratio;
		$size_array[1]['height']=36;
	}
	else if($surface==8)//poster
	{
		$size_array[0]['width']=12;
		$size_array[0]['height']=8;

		$role_size = 12;
	}
    else if($surface==1)
    {      $size_array[0]['width']=8*$image_ratio;
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
	else
	{
		/*$size_array[0]['width']=12*$image_ratio;
		$size_array[0]['height']=12;
		$size_array[1]['width']=16*$image_ratio;
		$size_array[1]['height']=16;
		$size_array[2]['width']=20*$image_ratio;
		$size_array[2]['height']=20;
		$size_array[3]['width']=24*$image_ratio;
		$size_array[3]['height']=24;	
		$size_array[4]['width']=36*$image_ratio;
		$size_array[4]['height']=36;
		$size_array[5]['width']=40*$image_ratio;
		$size_array[5]['height']=40;
		$size_array[6]['width']=46*$image_ratio;
		$size_array[6]['height']=46;
		$size_array[7]['width']=58*$image_ratio;
		$size_array[7]['height']=58;*/
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
	if($surface==7)//translite
	{
		$size_array[0]['width']=12;
		$size_array[0]['height']=12*(1/$image_ratio);
		$size_array[1]['width']=36;
		$size_array[1]['height']=36*(1/$image_ratio);		
	}
	else if($surface==8)//poster
	{
		$size_array[0]['width']=8;
		$size_array[0]['height']=12;

		$role_size = 12;
	}
    else if( $surface==1)
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
	{
       /*		$size_array[0]['width']=12;
		$size_array[0]['height']=12*(1/$image_ratio);
		$size_array[1]['width']=16;
		$size_array[1]['height']=16*(1/$image_ratio);
		$size_array[2]['width']=20;
		$size_array[2]['height']=20*(1/$image_ratio);
		$size_array[3]['width']=24;
		$size_array[3]['height']=24*(1/$image_ratio);
		$size_array[4]['width']=36;
		$size_array[4]['height']=36*(1/$image_ratio);
		$size_array[5]['width']=40;
		$size_array[5]['height']=40*(1/$image_ratio);
		$size_array[6]['width']=46;
		$size_array[6]['height']=46*(1/$image_ratio);
		$size_array[7]['width']=58;
		$size_array[7]['height']=58*(1/$image_ratio);*/
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
}

function give_price($surface_no)
{
	if(($surface_no==3)||($surface_no==7)||($surface_no==8))
	{
		return 2;
	}
	else if(($surface_no==4))
	{
		return 4;
	}
	else 
	{
		return 2.5;
	}
}

function choose_role_size($surface,$width,$height)
{
	$high_val = 12;

	if($width>$height)
	{
		$fix_val = $height;	
	}
	else
	{
		$fix_val = $width;
	}

	if(($surface==7))
	{
		if($fix_val<12)
		{
			return 24;
		}
		else
		{
			return 36;
		}
	}
	else 
	{
		if($fix_val<12)
		{
			return 24;
		}
		else if($fix_val<36)
		{
			return 36;
		}
		else if($fix_val<12)
		{
			return 44;
		}
	}	
}

/*function give_licence_price($collection_id)
{
	if(($collection_id==174)||($collection_id==167))
	{
		return 1800;
	}
    else if($collection_id==154||$collection_id==1004||$collection_id==1005)
    {
        return 600;
    }
	else
	{
		return 600;
	}
}

*/
function give_licence_price($pricing_range)
{if($pricing_range=='mid')
{
    return 1800;
}
elseif($pricing_range=='low')
{
    return 600;
}

}
// function choose_role_size($woh)
// {

// }

// wastage calculation
$lower_value = 12;
$size_with_wastage = $role_size*$lower_value;


//image licencing cost
$licence_base_price=give_licence_price($collection_id);
if( $size_array[0]['width']> $size_array[0]['height'])
{
    $low_val=round($size_array[0]['height']);
    $high_val=round($size_array[0]['width']);

}
else
{
    $low_val=round($size_array[0]['width']);
    $high_val=round($size_array[0]['height']);
}
if( $high_val<24)
{
    $wastage_cost= (24 -  $high_val) * $low_val*2 ;
}
else
{
    $wastage_cost= (24 -  $low_val) * $high_val*2 ;
}
$s=round($size_array[0]['height']).'X'.round($size_array[0]['width']);
//print_r($size_array[0]['width']);
//print '<br/>';
//print_r($size_array[0]['height']);
//print '<br/>';
//print($wastage_cost).'<br/>';
//$a=give_licence_price($pricing_range).'<br/>';
  //  print($a);
$price=(round($size_array[0]['width'])*round($size_array[0]['height'])*2)+$wastage_cost+give_licence_price($pricing_range);
//$price=$size_array[0]['width']*$size_array[0]['height']*give_price($surface)+give_licence_price($collection_id);

//$price = $size_with_wastage * give_price($surface) + give_licence_price($collection_id);

//print_r($size_array);
//print $size_data[0]/$size_data[1];
// detect image os horizontal or verticle
//print $image_alignment;
?>

<link href="<?php print base_url();?>assets/css1/portBox.css" rel="stylesheet" type="text/css"/>	
<script type="text/javascript" src="<?php print base_url();?>assets/js1/portBox.slimscroll.min.js"></script>
	<script>

function call_set_sizes(surface,cat_id)
{
	window.location = "<?php print base_url(); ?>index.php/search/image_detail/<?php print $image_detail->images_id; ?>/"+cat_id +'/'+surface;
}
function give_lice_price(pricing_range,size)
{
    var split = size.split('X');
    if(pricing_range=='mid')
    {
        if( split[1]<=8 && split[0]<=13)
        {
            return 1800;
        }
        if( split[0]<=8 && split[1]<=13)
        {
            return 1800;
        }
        else if( split[1]<=12 && split[0]<=18)
        {
            return 3600;
        }
        else if( split[1]<=16 && split[0]<=24)
        {
            return 3600;
        }
        else if( split[1]<=20 && split[0]<=30)
        {
            return 4500;
        }
        else if( split[1]<=24 && split[0]<=37)
        {
            return 4500;
        }
        else if( split[1]<=28 && split[0]<=55)
        {
            return 5400;
        }
        else if( split[1]<=30 && split[0]<=60)
        {
            return 5400;
        }
        else if( split[1]<=32 && split[0]<=70)
        {
            return 5400;
        }
        else if( split[1]<=36 && split[0]<=88)
        {
            return 5400;
        }
        else
        {
            return 5400 ;
        }

    }
    if(pricing_range=='low')
    {
        if( split[1]<=8 && split[0]<=13)
        {
            return 600;
        }
        if( split[0]<=8 && split[1]<=13)
        {
            return 600;
        }
        else if( split[1]<=12 && split[0]<=18)
        {
            return 2400;
        }
        else if( split[1]<=16 && split[0]<=24)
        {
            return 2400;
        }
        else if( split[1]<=20 && split[0]<=30)
        {
            return 3000;
        }
        else if( split[1]<=24 && split[0]<=37)
        {
            return 3000;
        }
        else if( split[1]<=28 && split[0]<=55)
        {
            return 3600;
        }
        else if( split[1]<=30 && split[0]<=60)
        {
            return 3600;
        }
        else if( split[1]<=32 && split[0]<=70)
        {
            return 3600;
        }
        else if( split[1]<=36 && split[0]<=88)
        {
            return 3600;
        }
        else
        {
            return 1800;
        }

    }
    if(pricing_range=='high')
    {
        if( split[1]<=8 && split[0]<=13)
        {
            return 3000;
        }
        if( split[0]<=8 && split[1]<=13)
        {
            return 3000;
        }
        else if( split[1]<=12 && split[0]<=18)
        {
            return 4800;
        }
        else if( split[1]<=16 && split[0]<=24)
        {
            return 4800;
        }
        else if( split[1]<=20 && split[0]<=30)
        {
            return 6000;
        }
        else if( split[1]<=24 && split[0]<=37)
        {
            return 3000;
        }
        else if( split[1]<=28 && split[0]<=55)
        {
            return 7200;
        }
        else if( split[1]<=30 && split[0]<=60)
        {
            return 7200;
        }
        else if( split[1]<=32 && split[0]<=70)
        {
            return 7200;
        }
        else if( split[1]<=36 && split[0]<=88)
        {
            return 7200;
        }
        else
        {
            return 5400 ;
        }

    }



}

function calculate_cost(size)
{
    var split = size.split('X');
    var surface_rate=<?php print give_price($surface); ?>;
    //var licence_cost=<?php print $licence_base_price; ?>;
    var pricing_rane=document.getElementById('pricing_ran').value;
    var licence_cost=  give_lice_price(pricing_rane,size);
    var initwidth='<?php print $size_array[0]['width']; ?>';
    var initheight='<?php print $size_array[0]['height']; ?>';
    var surface = '<?php print $surface; ?>';
    console.log('surface is :'+surface);
    //var role_size=<?php print choose_role_size($surface,$size_array[0]['width'],$size_array[0]['height']); ?>;
    //console.log(role_size);
    //logic for role size
    var low_val = 0;
    var high_val = 0;
    if(Number(split[1]) > Number(split[0]))
    {
        low_val = Number(split[0]);//height
        high_val = Number(split[1]);//width
    }
    else
    {
        low_val = Number(split[1]);//width
        high_val = Number(split[0]);//height
    }

    var role_size = 24;
    if((surface==7)) //translite
    {
        if(high_val<12)
        {
            role_size = 12;
        }
        else
        {
            role_size = 36;
        }
    }
    else if (surface==1)
    {
        if(high_val<=24)
        {
            role_size = 24;
        }
        else if(high_val<=36)
        {
            role_size = 36;
        }
        else if(high_val<=50)
        {
            role_size = 50;
        }
        else if(high_val>50)
        {
            if(low_val<=24)
            {
                role_size=24;
            }
            else if(low_val<=36)
            {
                role_size=36;
            }
            else  if(low_val<=50)
            {
                role_size=50;
            }
        }

    }
    else
    {
        if(high_val<24)
        {
            role_size = 24;
        }
        else if(high_val<36)
        {
            role_size = 36;
        }
        else if(high_val<44)
        {
            role_size = 44;
        }
        else if(high_val>44)
        {
            if(low_val<=24)
            {
                role_size=24;
            }
            else if(low_val<=36)
            {
                role_size=36;
            }
            else  if(low_val<=44)
            {
                role_size=44;
            }
        }

    }
    console.log(role_size);
    console.log(low_val);
    var percent_inc=0;
    var init_sqinch=split[0]*split[1];
    var new_sqinch = Number(initwidth) * Number(initheight);

    percent_inc = ((new_sqinch-init_sqinch)/init_sqinch)*Number(licence_cost);
    var total_licence_cost = Number(licence_cost);
    console.log(surface_rate);
    console.log(total_licence_cost);
    console.log('end');
    if(high_val<role_size)
    {
        var wastage_cost = (role_size - high_val) * low_val * surface_rate;
    }
    else
    {
        var wastage_cost = (role_size - low_val) * high_val * surface_rate;
    }
    //alert(role_size);
    //alert(high_val);
    //alert(low_val);
    //alert(surface_rate);
    //alert(wastage_cost);

    //alert(init_sqinch);
    //alert(Number(licence_cost));
    var cost=(split[0]*split[1]*surface_rate)+wastage_cost+total_licence_cost;
    //alert(role_size);
    //alert(surface);
    //alert(high_val);
    //alert(split[0]);
    //alert(split[1]);
    //alert(surface_rate);
    //alert(wastage_cost);
   //alert(total_licence_cost);
    //var cost = role_size * low_val * surface_rate + total_licence_cost;
    $('#total_cost').html(Math.round(cost));
    var size1= split[0];
    var size2= split[1];
    var h="";
    var w="";
     h=size1/12*720/10;
     w=size2/12*720/10;

    /*if(size1<=8 && size2<=12)
    {
        h=112;
    }
    else if(size1<=12 && size2<=8)
    {
        h=112;
    }
    else if(size1<=18 && size2<=12)
    {
        h=168;
    }
    else if(size1<=12 && size2<=18)
    {
        h=168;
    }
    else if(size1<=24 && size2<=16)
    {
        h=224;
    }
    else if(size1<=16 && size2<=24)
    {
        h=224;
    }
    else if(size1<=31 && size2<=20)
    {
        h=280;
    }
    else if(size1<=20 && size2<=31)
    {
        h=280;
    }*/
    var yourImg = document.getElementById('draggable');

    yourImg.height = h;
    yourImg.width = w;
    
}
function enlarge(size)
{
    var split = size.split('X');
    var size1= split[0];
    var size2= split[1];
    var h="";

    if(size1<=8 && size2<=12)
    {
        h=100;
    }
    else if(size1<=12 && size2<=8)
    {
        h=100;
    }
    else if(size1<=18 && size2<=12)
    {
        h=150;
    }
    else if(size1<=12 && size2<=18)
    {
        h=150;
    }
    else if(size1<=24 && size2<=16)
    {
        h=200;
    }
    else if(size1<=16 && size2<=24)
    {
        h=200;
    }
    else if(size1<=31 && size2<=20)
    {
        h=250;
    }
    else if(size1<=20 && size2<=31)
    {
        h=250;
    }
    var yourImg = document.getElementById('draggable');

    yourImg.height = h;


}
</script>
<script type="text/javascript">
function frame_it_price_send(a,b,c)
{  
    var m= document.getElementById('print_sizes').value;
    if(m==1)
    {
        var print_type='canvas';
    }
    else if(m==3)
    {
        var print_type='Photographic print';
    }
    else if(m==4)
    {
        var print_type='Premium photographic print';
    }
    else if(m==7)
    {
        var print_type='Translite';
    }
    else if(m==8)
    {
        var print_type='Poster';
    }

    var cost=document.getElementById('total_cost').innerHTML;
    var size=document.getElementById('sizes').value;
    var url='<?=base_url()?>index.php/frontend/frame_new/'+a+'/'+print_type+'/'+cost+'/'+size+'/'+c;
    window.location.assign(url);
}

function show_status(a,cat_id)
{  
    var type="<?php echo $this->input->get('txt');?>";
    var k=$("#total_cost").html();
    var j=$("#c_sizes").html();
    var l=$("#print_type_for_image").html();
       var m=document.getElementById('print_sizes').value;
       var n=document.getElementById('sizes').value;
          if(m==1)
          {
              var print_type='Canvas';
          }
          else if(m==3)
          {
              var print_type='Photographic print';
          }
          else if(m==4)
          {
              var print_type='Premium photographic print';
          }
          else if(m==7)
          {
              var print_type='Translite';
          }
         else if(m==8)
          {
              var print_type='Poster';
          }        
         //alert(print_type);
         //alert(n);
   
 var datastring='image_id='+a+'&price='+ k +'&size='+ n+'&print_type='+print_type;
    $.ajax({
             type: "POST",
	      	 url: "<?php print base_url() ?>index.php/cart/check_image_exist_status",
             data:datastring,
             success:function(datam)  
             {    
                if(datam=='2')
                   {
                      alert("This Image has already been added to cart.");
                   }
                else
                   {
                     var url="<?=base_url()?>index.php/cart/cart_view?img_id="+a+"&search_text="+type+"&price="+k+"&size="+n+"&print_type="+print_type+"&cat_id="+cat_id;
                     window.location.assign(url);
                   }
              }
         });
}

function get_win()
{
	document.getElementById('new').style.display='block';
	document.getElementById('fade').style.display='block';
}
function get_room()
{
    document.getElementById('new1').style.display='block';
    document.getElementById('fade').style.display='block';
}

$(function() {
    $("#draggable").draggable( {containment: "#w",
        scroll: false});

});
function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

$(document).ready(function(){
	$("#szpte").click(function(){
		$("#size_print_type").show(400);
		$("#overlay-bx").show();
	});
	
	$("#tgl").click(function(){
	  
	//$("#tgl-bx").show(400);
	//$("#overlay-bx").show();
		document.getElementById('tgl-bx').style.display='block';document.getElementById('fade').style.display='block';
	});
	$("#overlay-bx").click(function(){
	$("#tgl-bx").hide(400);
	$("#size_print_type").hide(400);
	$("#overlay-bx").hide(400);
	
	});
	$("#toggle-btn").click(function(){
	$("#toggle-data").toggle(400);
	});
	
	$("#create_lightbox").click(function()
	{  
		 if($('#lightbox_name').val()=="")
		 {
		 	$("#lightbox_error").html("Enter Gallery Name.");
		  	return false;
		 }
		 else if($("#lightbox_des").val()=="")
		 {
		   $("#lightbox_error").html("Enter Gallery Description.");
		   return false;
		 }
		 else 
		 {
		  	 $("#lightbox_error").html("");
		     $.ajax({
		             type: "POST",
			 	     url: "<?php print base_url() ?>index.php/frontend/create_lightbox",
			    	 data: $("#lightbox_submit").serialize(),
			      	 success: function(response)
		      		 {      
		                    var data = jQuery.parseJSON(response);
							var str= toTitleCase(data.data1[0]);
		                    $("#lightbox_des").val("");
		                    $('#lightbox_name').val("");
							var lightboxnames= $('#lightbox_name').val();
		                    alert("Gallery has been created.");
							alert('Please select "'+str+'"  from "My Gallery" option mentioned below to add this image');
		                    $("#lightbox_list_dropdown").append('<option value='+data.data2[0]+'>'+data.data1[0]+'</option>');
		             }
		          });
		  }
	});
});


</script>
<style>
.newid {
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

.main {
	margin: 0 auto;
	max-width: 500px;
	padding: 15px;
	background-image: url(<?=           base_url()?>assets/images/bot_left.png
		), url(<?=           base_url()?>assets/images/bot_rig.png ),
		url(<?=           base_url()?>assets/images/top_righ.png ),
		url(<?=           base_url()?>assets/images/top_lef.png ),
		url(<?=           base_url()?>assets/images/ver_left.png ),
		url(<?=           base_url()?>assets/images/ver_righ.png ),
		url(<?=           base_url()?>assets/images/hor_bot.png ),
		url(<?=           base_url()?>assets/images/hor_top.png );
	background-position: bottom left, bottom right, top right, top left,
		left, right, bottom, top;
	background-repeat: no-repeat, no-repeat, no-repeat, no-repeat, repeat-y,
		repeat-y, repeat-x, repeat-x;
}

.main  img {
	width: 100%;
	height: auto;
}
</style>
<div class="main-container">
    	
        <div class="pagination">
        	<span><a href="<?php print base_url();?>">Home</a> <a href="javascript:history.back();">Search Result</a> Image Detail</span> </span>
        </div>
        
        <!-- Decortive art -->
        <div class="decorative">
        	<div class="decorative-l-c">
            	<img
								src="  http://www.indiapicture.in/wallsnart/398/<?php print $image_detail->images_filename;?>" height="336px;" width="297px;" />
           
                
                <br><br>
                View: <a href="javascript:" onClick="get_room();">In a Room</a> | <a href="#"
								onClick="get_win();">Larger Image</a>
                </div>
            
                   
            <div class="decorative-r-c">
            	<h1>Portrait of&nbsp;<?php echo $image_detail->images_photographer;?> </h1>
                <p><?php print substr($image_detail->images_caption,0,30); ?></p>
                <p><strong>Item # :<?php print $image_detail->images_filename;?></strong></p>
                <p><?php print $image_detail->images_description;?></p>
                Keywords:-<p><?php print $image_detail->images_keywords; ?></p>
 <input type="hidden" name="img_id" id="img_id" value="<?php echo $image_detail->images_id;?>" />
        <h2>Printing Surface Type</h2>
                <select name="print_sizes" id="print_sizes" class="size-list-input" onChange="call_set_sizes(this.value,'<?php echo $cat_id;?>');">
                                 <option value="3" <?php if($surface==3){?>selected="selected"<?php } ?>>Photographic print</option>

                                 <option value="1" <?php if($surface==1){?>selected="selected"<?php } ?>>Canvas</option>
						       <!--  <option value="2" <?php if($surface==2){?>selected="selected"<?php } ?>>Luster</option>-->
						       <option value="3" <?php if($surface==3){?>selected="selected"<?php } ?>>Photographic print</option>
						       <option value="4" <?php if($surface==4){?>selected="selected"<?php } ?>>Premium photographic print</option>
						       <!--  <option value="5" <?php if($surface==5){?>selected="selected"<?php } ?>>Hanehmule Photo Rag</option>
						       <option value="6" <?php if($surface==6){?>selected="selected"<?php } ?>>Daguerre canvas</option>-->
						       <option value="7" <?php if($surface==7){?>selected="selected"<?php } ?>>Translite</option>
						       <option value="8" <?php if($surface==8){?>selected="selected"<?php } ?>>Poster</option>						       						       						       
						     </select>
							 
							 
							 <h2>Size</h2>

<form id="form1" name="form1" method="post" action="">
						 <input type="hidden" value="<?php echo $image_detail->images_collectionid;?>" name="collection" id="collection" />
					
                             <select name="sizes" id="sizes" class="size-list-input" onChange="calculate_cost(this.value);">
                                 <?php if($surface==1)
                                 {
                                     $j=11;
                                 }elseif($surface==7)
                                 {
                                     $j=1;
                                 }
                                 elseif($surface==8)
                                 {
                                     $j=0;
                                 }
                                 else
                                 {
                                     $j=9;
                                 }

                                 for($i=0;$i<=$j;$i++)
                                 {
                                     if($size_array[$i]['width']<=$max_width_allowed&&$size_array[$i]['height']<=$max_height_allowed)
                                     {?>
                                         <option value="<?php print round( number_format($size_array[$i]['height'],1,'.','')).'X'.round(number_format($size_array[$i]['width'],1,'.',''));?>" ><?php print round(number_format($size_array[$i]['height'],1,'.','')).'" X '. round(number_format($size_array[$i]['width'])).'"';?></option>

                                     <?}
                                 }?>
                             </select>
                            
						 </form>


                <div>
				
				
                <div style="margin-left:100px; width:100px;">
           <span  >  <img src="<?=base_url()?>assets/images/rupee-img-price.gif"
                          width="8" height="15" alt="rupee" /> <b id="total_cost"><?php print round($image_detail->images_min_price);  ?></b>
								</span></div>
                </div>
                
                
                <p>
                	<a href="javascript:void(0)" onclick="frameit('');" >Frame It</a>
                    <a <?php  if(!$this->session->userdata('userid')){?>
								href="javascript:void(0)" onclick="login('');"
<?php }else{?>
								href="javascript:show_status('<?php echo $image_detail->images_id;?>','<?php echo $cat_id?>')"
								<?php  }?> >Add to Cart</a>
     <a <?php   if($this->session->userdata('userid')){?>
								href="javascript:;" onclick="addtogallery('');" id="tgl" <?php }
else {?>
								href="javascript:void(0)" onclick="addtogallery('');"
<?php }?> >Add to Gallery </a>
                </p>
              
                
            </div>
        </div>
        
        
        <div class="decorative">
            	
                <!--<div class="decorative-l-c">
                	
                        <img src="<?=base_url()?>assets/img/frameit.jpg" width="298" height="156" border="0">
                    <p class="btn-centre">
                		<a href="javascript:void(0)" onclick="frameit('');" >Frame It</a>
                    </p>
                </div>-->
          
            
            
              <div class="backblack" id="back" onClick="allclose('')" style="display:none;">&nbsp;</div>
    <div class="frameit" id="frameitpop" style="display:none;" >
        <div style="float: right" ><a href="#" onClick="allclose('')" >X</a></div>
        
        <p style="overflow:hidden;">"This section is under maintenance. Kindly contact us</br> at <b style="color:red;">011- 41828972</b> or mail us at <a href="#" style="color:red;">info@wallsnart.com</a> </br>to complete the purchase oder."</p>
    </div>
            
            
              
							                   
                   

							<div class="make-dt"></div>
<!--                <div class="decorative-r-c">
                	<h1>About the Artist</h1>
                    <h3>ABSOLUTELY GORGEOUS!!</h3>
                    <p>
                    	I've always loved this particular painting and thought it would look perfect in my bedroom.
                         I was so right. The high quality paper showcases the beautiful image so well. 
                         The colors are very vivid and the woman's face seems like it's glowing. 
                         I enjoy looking at it right before I fall asleep.
                         it's so relaxing! I'm so happy I finally purchased it [...] 
                    </p>
                    
                    <p><strong>By Jaime</strong>    from Connecticut   Posted on: 12/10/2014</p>
                    
                    
                    
                    <h3>BEAUTIFUL PRETTY</h3>
                    <p>
                    	I've always loved this particular painting and thought it would look perfect in my bedroom.
                         I was so right. The high quality paper showcases the beautiful image so well. 
                         The colors are very vivid and the woman's face seems like it's glowing. 
                         I enjoy looking at it right before I fall asleep.
                         it's so relaxing! I'm so happy I finally purchased it [...] 
                    </p>
                    
                    <p><strong>By Ricky Ponting</strong>    from Connecticut   Posted on: 12/10/2014</p>
                    
                </div>-->
              </div>
        <!-- Decortive art -->
        
        <input type="hidden"  value="<?php echo $pricing_range;?>" id="pricing_ran" name="pricing_ran"/>
        </div>

<div id="new" class="newid">
							<div align="right">
								<a href="javascript:void(0)"
									onclick="document.getElementById('new').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
							</div>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								</tr>
								<tr>
									<img src="http://www.indiapicture.in/wallsnart/1100/<?php print $image_detail->images_filename;?>" />
								</tr>
							</table>

						</div>

                    <div id="new1" class="newid1">
                        <div align="right">
                            <a href="javascript:void(0)"
                               onclick="document.getElementById('new1').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                            </tr>
                            <tr>
                                <div id="w"  style="background:url(<?php echo base_url();?>assets/images/room-view.jpg) no-repeat top center; width:725px;height:500px;border:1px solid black;">
                                    <div id="icons" style="display: block;padding-top: 30px;text-align: center;">
                                          <?php  $wid=$size_array[0]['width']/12 * 720/10;
                                                   $hig=$size_array[0]['height']/12*720/10;
                                          ?>
                                        <img  src="http://www.indiapicture.in/wallsnart/398/<?php print $image_detail->images_filename;?>"class="drag-image" id="draggable"  height="<?php echo $hig;?>" width="<?php echo $wid;?>" />
                                    </div>
                                </div>

                            </tr>
                        </table>

                    </div>