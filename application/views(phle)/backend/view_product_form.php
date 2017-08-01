<?php $partners=$this->channel_partner_model->get_channel_partner();?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/anylinkmenu.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/anylinkmenu.js">

</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>


<script type="text/javascript" language="javascript">

$(function() {
      $('#code2').change(function() {
            
            $('div.viewcplist-inner').hide();
            $('#number-' + $(this).val()).show();
      });
});
</script>



<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"  style="width:96%"> 
<div class="main-hdr"> View Product Forms</div>

<?php //print_r($get_details);?>
<div class="view-cp">

<div class="searchc" style="width:100%">Search Parameters</div>
<br />
<br />
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Select Partner</td>
    <td>&nbsp;&nbsp;
        <select name="code2" id="code2" class="inputs" onchange="return show_data_channel_partner(); ">
            <option value="">---Select---</option>
          <?php foreach ($details as $values){ ?>
          <option value="<?=$values->chanel_partner?>" <?php if($_GET['channel_id']==$values->chanel_partner){?> selected="selected"<?php }?>><?=$values->chanel_partner?></option>
          <?php }?>
      </select></td>    
      </tr>
  

<script>
 function show_data_channel_partner()
 {
     var code2= $('#code2').val();
   
     window.location.href= "<?=base_url()?>index.php/backend/show_channel_parter?channel_id="+code2
 }// end function
 
 
 function b64EncodeUnicode(str) {
    return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function(match, p1) {
        return String.fromCharCode('0x' + p1);
    }));
}
    </script>
<div id="PhotographersListDiv">


<div class="view-cp-list" >
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
          
      
    
  <!----------------------------------------frame_start------------------------------------------------------------>
  
      <td><div class="viewcplist-inner"id="number-frame" >
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr><td>S.R.NO</td><td id="header">Images</td> <td id="header"> Ratio</td><td id="header"> DPI</td><td id="header">Max height</td><td id="header">Max Width</td><td id="header"> Area</td><td id="header">Width</td><td id="header">Height</td><td id="header">New Width</td><td id="header">New Height</td><td id="header">Print Area</td><td id="header">Mount Area</td><td id="header">Glass Area</td><td id="header">Frame Area</td><td id="header"> Price</td></tr>
        <tbody id="new_partner">
         <?php $i=1; foreach($get_details as $detail){
             if($i%2==0)
             {
                 $color='#EEEEEE';
             }else if($i%2!=0){
                  $color='#fff';
             }
              $detail->frame_color;
             if($detail->frame_color=='ML-215-BK')
                   {  $framecolor='#000';
                   }elseif ($detail->frame_color=='ML-215-WH') 
                       { $framecolor='#fff';}
                       elseif($detail->frame_color=='ML-215-BK' || $detail->frame_color=='ML-033 BK')
                   {  $framecolor='#000';
                   }elseif ($detail->frame_color=='ML-215-DBR') 
                       { $framecolor='#810404';}
                       
                       
                       $size_data = getimagesize('http://www.indiapicture.in/wallsnart/158/'.$detail->fileName);
                     
             ?>
                  
            <tr style="background-color: <?=$color;?>" > <td><?=$i?></td><td style="padding: 10px 9px <?php  $height_px= 150+$detail->max_height;echo $height_px.'px'?> 10px" >
                   &nbsp;&nbsp;&nbsp;<?=$detail->fileName; ?><br>
        
             <?php if($detail->product_type=='Canvas'){?>  
                   <div class="main_frame">
          
              <div  >
                <div id="fir1"> 
                    <div id="fir2">
                                            
                          <img src="http://www.indiapicture.in/wallsnart/158/<?=$detail->fileName;?>" style="width:<?php echo $size_data[0].'px';?>; height:<?php echo $size_data[1].'px';?>">
                        </div>
                   
                </div>
            </div>
                                  </div>
          </div>
             <?php }elseif($detail->product_type=='Frame Mount'){?>
                   
                   <div class="main_frame"  style="background-color:<?=$framecolor;?>;" >
          <div id="abc2" >
              <div id="fir_room" >
                <div id="fir1"> 
                    <div id="fir2">
                                            
                          <img src="http://www.indiapicture.in/wallsnart/158/<?=$detail->fileName;?>" style="width:<?php echo $size_data[0].'px';?>; height:<?php echo $size_data[1].'px';?>">
                        </div>
                   
                </div>
            </div>
                                  </div>
          </div>
                   
             <?php }elseif($detail->product_type=='Only Frame'){?>
                   <div class="main_frame"  style="background-color:<?=$framecolor;?>;" >
          
              <div id="fir_room" >
                <div id="fir1"> 
                    <div id="fir2">
                                            
                          <img src="http://www.indiapicture.in/wallsnart/158/<?=$detail->fileName;?>" style="width:<?php echo $size_data[0].'px';?>; height:<?php echo $size_data[1].'px';?>">
                        </div>
                   
                </div>
            </div>
                                 
          </div>
             <?php }?>
                   <br>
                 
                   <style>
   
#header{text-align: center;
    color:#000;
    font-size: 14px;
    font-weight: bold;
padding: 14px;}
        .main_frame{
    margin:auto;
    
  position:absolute;
    -moz-background-size: cover;
    -o-background-size: cover;
    display: block;
     <?php if($detail->product_type!='Canvas'){?> 
    padding:25px;
    padding:8px;
    border:solid 1px;
     <?php }?>

	}

	
           #abc2 {
     //border:25px solid white;
          padding: 5px 5px 5px 5px;
         background-color: white;
           }


#fir_room{padding:2px; background-color:white;
box-shadow:2px 2px 1px black inset;
}
  /*  #fir
    {
       padding:3px;
       box-shadow:0px 0px 3px black inset;
    }*/
	 </style>
        </td><td style="padding: 0px 0px 0px <?php  $height_px= 30+$detail->max_width;echo $height_px.'px'?>;"> <?=$detail->ratio?><td> <?=$detail->dpi?></td><td><?=$detail->max_height?></td><td><?=$detail->max_width?></td><td><?=$detail->max_width?></td><td><?=$detail->width;?></td><td><?php echo $detail->height;?></td><td><?php echo $detail->new_width;?></td><td><?php echo $detail->new_height?></td><td><?php echo $detail->print_size?></td><td><?php echo $detail->mount_size;?></td><td><?php echo $detail->glass_size?></td><td><?php echo $detail->frame_size?></td><td><?php echo $detail->coste;?></td></tr> 
                 
            <?php $i++;}//end foreach 
                 ?>
              
              
          </tbody>
        </table>
 
      </div>

      </tr>  </table>
</div>
</div>





</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>



