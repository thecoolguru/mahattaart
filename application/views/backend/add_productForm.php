
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>


<style>
    .add-newcp table tr td {
    padding: 10px 0px 20px 13px;
    </style>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    
<div id="middle-container"> 
    <?//$_GET['product_type'];?>
<div class="main-hdr"> Add Product Form  <?php print_r($save_data);?></div>
<div class="add-newcp"><span style="color:#F00"><?php  print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form name="content_form" action="#" method="post" id="content_form" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr class="toptr">
    <td></td><td>Select Any of Product Form to Add</td>
    <td><input type="radio" name="productform" id="canvas"  <?php if($_GET['product_type']=='Canvas'){ echo "checked"; ?><?php }?> value="canvas" onclick="check_data_show('canvas');" > Canvas</td>
    <td><input type="radio" name="productform" id="frame_mount" <?php if($_GET['product_type']=='Frame Mount'){  echo "checked"; ?><?php }?> value="Frame+mount" onclick="check_data_show('frame+mount')"> Frame + Mount</td>
    <td><input type="radio" name="productform" id="frame_only" value="Only Frame"  <?php if($_GET['product_type']=='Only Frame'){ echo "checked"; ?><?php }?>onclick="check_data_show('only frame')" > Frame only</td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  </tr>

  
  <tr class="toptr" id="print_rate">
    <td>Add file name</td>
    <td>
        <textarea name="filename" id="filename" rows="10" cols="25" ><?=$_GET['filename']?></textarea>
    </td>
    <td>Category&nbsp;<input type="text" value="<?=$_GET['category']?>" name="category" id="category" ></td>
        <td>Sizes&nbsp;<select name="size" id="size">
         
                <option value="10" <?php if($_GET['size']=='10'){?> selected="selected" <?php }?>>Size1(10)</option>
                      <option value="12" <?php if($_GET['size']=='12'){?> selected="selected" <?php }?>>Size2(12)</option>
                       <option value="18" <?php if($_GET['size']=='18'){?> selected="selected" <?php }?>>Size3(18)</option>
                        <option value="24" <?php if($_GET['size']=='24'){?> selected="selected" <?php }?>>Size4(24)</option>
         </select></td>
  </tr>
  
  
             
  
</table>
    <table style="border-color:#f8f8f8;width: 100%;">
        <tr class="toptr">
           <td>Select Paper</td>
           <td><select name="paper_size" id="paper_size">
                      <option value="" >---Select---</option>
                      <option value="hight" <?php if($_GET['paper_size']=='hight'){?> selected="selected" <?php }?>>Hight</option>
                      <option value="mid" <?php if($_GET['paper_size']=='mid'){?> selected="selected" <?php }?>>Mid</option>
                      <option value="budget"<?php if($_GET['paper_size']=='budget'){?> selected="selected" <?php }?>>Budget</option>
                     
          </select></td> 
            
      <td>Surface</td>
      <td><select name="surface" id="surface" onchange="return change_surface_size();">
                      <option value="">---Select---</option>
                      <option value="Photo_Matt_Fibre_Duo" <?php if($_GET['surface']=='Photo_Matt_Fibre_Duo'){?> selected="selected" <?php }?>>Photo Matt Fiber Duo</option>
                      <option value="Photo_Luster" <?php if($_GET['surface']=='Photo_Luster'){?> selected="selected" <?php }?>>Photo Luster</option>
                      <option value="Photo_Canvas" <?php if($_GET['surface']=='Photo_Canvas'){?> selected="selected" <?php }?>>Photo Canvas</option>
                      <option value="Daguerre_Canvas" <?php if($_GET['surface']=='Daguerre_Canvas'){?> selected="selected" <?php }?>>Daguerre Canvas</option>
                      <option value="Bamboo_Fine_art_Matt_Smooth" <?php if($_GET['surface']=='Bamboo_Fine_art_Matt_Smooth'){?> selected="selected" <?php }?>>Bamboo Fine art Matt- Smooth</option>
          </select></td>
          <td>Surface Size</td>
          <td><select name="surface_size" id="surface_size1" style="display:none;">
                      <option value="">---Select---</option>
                      <option value="a3" <?php if($_GET['surface_size']=='a3'){?> selected="selected" <?php }?>>A3</option>
                      <option value="a4" <?php if($_GET['surface_size']=='a4'){?> selected="selected" <?php }?>>A4</option>
                      <option value="24inch" <?php if($_GET['surface_size']=='24inch'){?> selected="selected" <?php }?>>24(Inch)</option>
                      <option value="44inch" <?php if($_GET['surface_size']=='44inch'){?> selected="selected" <?php }?>>44(Inch)</option>
                      
          </select>
          
          <select name="surface_size" id="surface_size2" style="display:none;">
                      <option value="">---Select---</option>
                     
                       <option value="a4" <?php if($_GET['surface_size']=='a4'){?> selected="selected" <?php }?>>A4</option>
                        <option value="17inch" <?php if($_GET['surface_size']=='17inch'){?> selected="selected" <?php }?>>17(Inch)</option>
                      <option value="24inch" <?php if($_GET['surface_size']=='24inch'){?> selected="selected" <?php }?>>24(Inch)</option>
                      <option value="36inch" <?php if($_GET['surface_size']=='36inch'){?> selected="selected" <?php }?>>36(Inch)</option>
                      <option value="44inch" <?php if($_GET['surface_size']=='44inch'){?> selected="selected" <?php }?>>44(Inch)</option>
                       
          </select>
           <select name="surface_size" id="surface_size3" style="display:none;">
                      <option value="">---Select---</option>
                         <option value="17inch" <?php if($_GET['surface_size']=='17inch'){?> selected="selected" <?php }?>>17(Inch)</option>
                      <option value="24inch" <?php if($_GET['surface_size']=='24inch'){?> selected="selected" <?php }?>>24(Inch)</option>
                      <option value="36inch" <?php if($_GET['surface_size']=='36inch'){?> selected="selected" <?php }?>>36(Inch)</option>
                      <option value="44inch" <?php if($_GET['surface_size']=='44inch'){?> selected="selected" <?php }?>>44(Inch)</option>
                       
                      
                      
          </select>    
           <select name="surface_size" id="surface_size4" style="display:none;">
                      <option value="">---Select---</option>
                     
                      <option value="a4" <?php if($_GET['surface_size']=='a4'){?> selected="selected" <?php }?>>A4</option>
                        <option value="17inch" <?php if($_GET['surface_size']=='17inch'){?> selected="selected" <?php }?>>17(Inch)</option>
                      <option value="24inch" <?php if($_GET['surface_size']=='24inch'){?> selected="selected" <?php }?>>24(Inch)</option>
                       <option value="36inch" <?php if($_GET['surface_size']=='36inch'){?> selected="selected" <?php }?>>36(Inch)</option>
                      <option value="44inch" <?php if($_GET['surface_size']=='44inch'){?> selected="selected" <?php }?>>44(Inch)</option>
                       
          
          </td>
          <td id="td_frame">Frame</td>
          <td><select name="frame" id="frame">
                      <option value="">---Select---</option>
                      <option value="Synthetic" <?php if($_GET['frame']=='Synthetic'){?> selected="selected" <?php }?>>Synthetic</option>
                      <option value="wooden"  <?php if($_GET['frame']=='wooden'){?> selected="selected" <?php }?>>wooden</option>
                      
          </select></td>
          <td id="td_frame_type">Frame Type</td>
           <td><select name="frame_type" id="frame_type" onchange="return show_frame_code();">
                      <option value="">---Select---</option>
                      <option value="simple"  <?php if($_GET['frame_type']=='simple'){?> selected="selected" <?php }?>>simple</option>
                      <option value="fancy"  <?php if($_GET['frame_type']=='fancy'){?> selected="selected" <?php }?>>fancy</option>
                      <option value="Antique"  <?php if($_GET['frame_type']=='Antique'){?> selected="selected" <?php }?>>Antique</option>
                      
          </select></td>
          
      
  </tr>
  <tr>
      <td id="td_frame_code">Frame Code</td>
      <td><select name="simple_code" id="simple_code" style="display:none;">
<option value="">---Select---</option>
<option value="ML-215-BK" <?php if($_GET['frame_code']=='ML-215-BK'){?> selected="selected" <?php }?>> ML-215-BK </option>
<option value="ML-215-DBR"  <?php if($_GET['frame_code']=='ML-215-DBR'){?> selected="selected" <?php }?>> ML-215-DBR </option>
<option value="ML-215-LBR" <?php if($_GET['frame_code']=='ML-215-LBR'){?> selected="selected" <?php }?>> ML-215-LBR </option>
<option value="ML-215-WH" <?php if($_GET['frame_code']=='ML-215-WH'){?> selected="selected" <?php }?>> ML-215-WH </option>
<option value="ML-016 DBRG" <?php if($_GET['frame_code']=='ML-016 DBRG'){?> selected="selected" <?php }?>> ML-016 DBRG </option>


                      
          </select>
          <select name="fancy_code" id="fancy_code" style="display:none;">
              <option value="">---Select---</option>
              <option value="ML-014-SIL (N)" <?php if($_GET['frame_code']=='ML-014-SIL (N)'){?> selected="selected" <?php }?>> ML-014-SIL (N) </option>
<option value="ML-033 BK" <?php if($_GET['frame_code']=='ML-033 BK'){?> selected="selected" <?php }?>> ML-033 BK </option>
<option value="ML-055 GD" <?php if($_GET['frame_code']=='ML-055 GD'){?> selected="selected" <?php }?>> ML-055 GD </option>
<option value="ML-065-SIL" <?php if($_GET['frame_code']=='ML-065-SIL'){?> selected="selected" <?php }?>> ML-065-SIL </option>
<option value="ML-113 IV"> ML-113 IV </option>
<!--<option value="ML 173 CRG"> ML 173 CRG </option>
<option value="ML 181 GD"> ML 181 GD </option>
<option value="ML 181 SIL"> ML 181 SIL </option>
<option value="ML-199 MR"> ML-199 MR </option>
<option value="ML-210 BR"> ML-210 BR </option>
<option value="ML-210 MR"> ML-210 MR </option>
<option value="ML-224 GD"> ML-224 GD </option>
<option value="ML-224 SIL"> ML-224 SIL </option>
<option value="ML-225 AGD"> ML-225 AGD </option>
<option value="ML-225 AGD"> ML-225 AGD </option>
<option value="ML-225 AGD"> ML-225 AGD </option>
<option value="ML-237 BRGD"> ML-237 BRGD </option>
<option value="ML-237 BKGD"> ML-237 BKGD </option>
<option value="ML-244 SIL"> ML-244 SIL </option>
<option value="ML-244 GD"> ML-244 GD </option>
<option value="ML-244 CP"> ML-244 CP </option>
<option value="ML-244 BK"> ML-244 BK </option>
<option value="ML-256 BKSIL"> ML-256 BKSIL </option>
<option value="ML-256 SIL"> ML-256 SIL </option>
<option value="ML-262 SIL"> ML-262 SIL </option>
<option value="ML- 262 GD"> ML- 262 GD </option>
<option value="ML-262 (E) WHG"> ML-262 (E) WHG </option>
<option value="ML-262 (E) GD"> ML-262 (E) GD </option>
<option value="ML-262 CP"> ML-262 CP </option>
<option value="ML-289 CP"> ML-289 CP </option>
<option value="ML-289 BK"> ML-289 BK </option>
<option value="ML-289 WH"> ML-289 WH </option>
<option value="ML-ST-30-SIL"> ML-ST-30-SIL </option>
<option value="ML-ST-30-DBR"> ML-ST-30-DBR </option>
<option value="ML-ST-30-BK"> ML-ST-30-BK </option>-->

          </select>
           <select name="Antique_code" id="Antique_code" style="display:none;">
               <option value="">---Select---</option>
<!--             <option value="ML-014 GD (N)"> ML-014 GD (N) </option>
<option value="ML-068 GD"> ML-068 GD </option>
<option value="ML- 068 MR"> ML- 068 MR </option>
<option value="ML-100 GD"> ML-100 GD </option>
<option value="ML-121 GD-DB"> ML-121 GD-DB </option>
<option value="ML-121-SIL"> ML-121-SIL </option>
<option value="ML- 068 MR"> ML- 068 MR </option>
<option value="ML-115 MR"> ML-115 MR </option>
<option value="ML-115 SIL"> ML-115 SIL </option>
<option value="ML-130 CP"> ML-130 CP </option>
<option value="ML-130 SIL"> ML-130 SIL </option>
<option value="ML-146 GD"> ML-146 GD </option>
<option value="ML-146 SIL"> ML-146 SIL </option>
<option value="ML-160 SIL"> ML-160 SIL </option>
<option value="ML-160 GD"> ML-160 GD </option>
<option value="ML-160 CP"> ML-160 CP </option>
<option value="ML-255 MR"> ML-255 MR </option>
-->
<option value="ML-215 WH" <?php if($_GET['frame_code']=='ML-215 WH'){?> selected="selected" <?php }?>> ML-215 WH </option>
<option value="ML215 SILUK" <?php if($_GET['frame_code']=='ML215 SILUK'){?> selected="selected" <?php }?>> ML215 SILUK </option>
<option value="ML-255 SIL BK" <?php if($_GET['frame_code']=='ML-255 SIL BK'){?> selected="selected" <?php }?>> ML-255 SIL BK </option>

<option value="ML-255 DBR" <?php if($_GET['frame_code']=='ML-255 DBR'){?> selected="selected" <?php }?>> ML-255 DBR </option>
<option value="ML-271 SIL" <?php if($_GET['frame_code']=='ML-271 SIL'){?> selected="selected" <?php }?>> ML-271 SIL </option>
<option value="ML-271 BK" <?php if($_GET['frame_code']=='ML-271 BK'){?> selected="selected" <?php }?>> ML-271 BK </option>


          </select>
      </td>
      
      <td id="td_mount">Mount</td>
      <td><select name="mount" id="mount">
                      <option value="" >---Select---</option>
                      <option value="Antique Ivory Texture" <?php if($_GET['mount']=='Antique Ivory Texture'){?> selected="selected" <?php }?>>Antique Ivory Texture</option>
                      <option value="Antique White"<?php if($_GET['mount']=='Antique White'){?> selected="selected" <?php }?>>Antique White</option>
                      <option value="Snow White" <?php if($_GET['mount']=='Snow White'){?> selected="selected" <?php }?>>Snow White</option>
                      <option value="Poster Black" <?php if($_GET['mount']=='Poster Black'){?> selected="selected" <?php }?>>Poster Black</option>
                      <option value="TINT 10" <?php if($_GET['mount']=='TINT 10'){?> selected="selected" <?php }?>>TINT 10</option>
                      
          </select></td>
          <td id="td_glass">Glass</td>
          <td><select name="glass" id="glass">
                      <option value="">---Select---</option>
                      <option value="Acrylic" <?php if($_GET['glass']=='Acrylic'){?> selected="selected" <?php }?>>Acrylic</option>
                      <option value="Normal" <?php if($_GET['glass']=='Normal'){?> selected="selected" <?php }?>>Normal</option>
                      
                      
                      
          </select></td>
          <td id="td_canvas_wrapped">Canvas wrapped</td>
          <td><select name="canvas_wrapped" id="canvas_wrapped">
                      <option value="" >---Select---</option>
                      <option value="Acrylic" <?php if($_GET['canvas_wrapped']=='Acrylic'){?> selected="selected" <?php }?>>Normal Wood</option>
                      <option value="Seasoned wood" <?php if($_GET['canvas_wrapped']=='Seasoned wood'){?> selected="selected" <?php }?>>Seasoned wood</option>
                      
                      
                      
              </select></td>
              <td id="td_canvas_size">Canvas Size</td><td><select name="canvas_size" id="canvas_size">
                      <option value="">---Select---</option>
                      <option value="1_1.5" <?php if($_GET['canvas_size']=='1_1.5'){?> selected="selected" <?php }?>>Height(1) X Width(1.5)</option>
                      <option value="1_2" <?php if($_GET['canvas_size']=='1_2'){?> selected="selected" <?php }?>>Height(1) X Width(2)</option>
                       <option value="1.5_2" <?php if($_GET['canvas_size']=='1.5_2'){?> selected="selected" <?php }?>>Height(1.5) X Width(2)</option>
                       
                      
                      
                      
              </select></td>
          
          </tr>
    </table>
    <table style="border-color:#f8f8f8;width: 100%;">
        
         <tr class="toptr">
             <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td><input type="button" class="bt-add" onclick="return save_channel_partner();" name="submit" value="VIEW & Save" style="font-size: 16px; float: right;"  ></td><td></td>
  </tr>

    </table>   
    
</form>

<script>
    function show_frame_code()
    {
     if(document.getElementById('frame_type').value=='simple'){
         document.getElementById('simple_code').style.display="block";
         document.getElementById('fancy_code').style.display="none";
         document.getElementById('Antique_code').style.display="none";
          
          
     }else
     if(document.getElementById('frame_type').value=='fancy'){
         document.getElementById('fancy_code').style.display="block";
          document.getElementById('simple_code').style.display="none";
          document.getElementById('Antique_code').style.display="none";
     }else 
 if(document.getElementById('frame_type').value=='Antique'){
         document.getElementById('Antique_code').style.display="block";
          document.getElementById('simple_code').style.display="none";
          document.getElementById('fancy_code').style.display="none";
     }else{
     document.getElementById('simple_code').style.display="block";
     } 
    }
    
   function check_data_show(form)
   {
       //alert(form);
      
       if(form=='canvas')
       {
           
            $('#td_frame').hide(); 
           $('#td_frame_type').hide(); 
           $('#frame').hide(); 
           $('#frame_type').hide();
           $('#td_frame_code').hide();
           $('#td_mount').hide();
           $('#mount').hide();
           $('#td_glass').hide();
           $('#glass').hide();
           $('#td_canvas_wrapped').show();
           $('#canvas_wrapped').show();
           $('#td_canvas_size').show();
           $('#canvas_size').show();
           $('#simple_code').hide();
           $('#fancy_code').hide();
           $('#Antique_code').hide();
           $('#td_frame_code').hide();
            
       }else if(form=='frame+mount' || form=='only frame')
       {   $('#td_frame').show(); 
           $('#td_frame_type').show(); 
           $('#frame').show(); 
           $('#frame_type').show();
           $('#td_frame_code').show();
           $('#td_mount').show();
           $('#mount').show();
           $('#td_glass').show();
           $('#glass').show();
           $('#td_canvas_wrapped').hide();
           $('#canvas_wrapped').hide();
           $('#td_canvas_size').hide();
           $('#canvas_size').hide();
           
            
       }
      
   }
   $(document).ready(function(){
     
       $('#td_frame').hide(); 
           $('#td_frame_type').hide(); 
           $('#frame').hide(); 
           $('#frame_type').hide();
           $('#td_frame_code').hide();
           $('#td_mount').hide();
           $('#mount').hide();
           $('#td_glass').hide();
           $('#glass').hide();
           $('#simple_code').hide();
           $('#fancy_code').hide();
           $('#Antique_code').hide();
           
           $('#td_frame_code').hide();
        
         if (document.getElementById('canvas').checked) {
     var  rate_value = document.getElementById('canvas').value;
       }else  if (document.getElementById('frame_mount').checked) {
     var  rate_value = document.getElementById('frame_mount').value;
       }else  if (document.getElementById('frame_only').checked) {
     var  rate_value = document.getElementById('frame_only').value;
       }
        
        
        if(rate_value=='canvas')  {
            $('#td_frame').hide(); 
           $('#td_frame_type').hide(); 
           $('#frame').hide(); 
           $('#frame_type').hide();
           $('#td_frame_code').hide();
           $('#td_mount').hide();
           $('#mount').hide();
           $('#td_glass').hide();
           $('#glass').hide();
           $('#td_canvas_wrapped').show();
           $('#canvas_wrapped').show();
           $('#td_canvas_size').show();
           $('#canvas_size').show();
           $('#simple_code').hide();
           $('#fancy_code').hide();
           $('#Antique_code').hide();
           $('#td_frame_code').hide();
        }
        //alert(rate_value);
        if(rate_value=='Frame+mount' || rate_value=='Only Frame')  {
            $('#td_frame').show(); 
           $('#td_frame_type').show(); 
           $('#frame').show(); 
           $('#frame_type').show();
           $('#td_frame_code').show();
           $('#td_mount').show();
           $('#mount').show();
           $('#td_glass').show();
           $('#glass').show();
           $('#td_canvas_wrapped').hide();
           $('#canvas_wrapped').hide();
           $('#td_canvas_size').hide();
           $('#canvas_size').hide();
        }
           
           
        var e = document.getElementById("frame_type");
       var frame_type = e.options[e.selectedIndex].value;   
         if(frame_type=='simple') {
             
          document.getElementById('simple_code').style.display="block";
         document.getElementById('fancy_code').style.display="none";
         document.getElementById('Antique_code').style.display="none";
          
         }else if(frame_type=='fancy') {
             
          document.getElementById('fancy_code').style.display="block";
          document.getElementById('simple_code').style.display="none";
          document.getElementById('Antique_code').style.display="none";
          
         }  else if(frame_type=='Antique') {
             
          document.getElementById('Antique_code').style.display="block";
          document.getElementById('simple_code').style.display="none";
          document.getElementById('fancy_code').style.display="none";
          
         }  
           
           
   }); 
   
   function change_surface_size()
   {
      
       var surface_size=$('#surface').val();
       //alert(surface_size);
     if(surface_size=='Photo_Matt_Fibre_Duo' || surface_size=='Photo_Luster')  
     {
        $('#surface_size1').show();
        $('#surface_size2').hide(); 
        $('#surface_size3').hide(); 
        $('#surface_size4').hide(); 
     }else
     if(surface_size=='Photo_Canvas')  
     {
        $('#surface_size1').hide();
        $('#surface_size2').show(); 
        $('#surface_size3').hide(); 
        $('#surface_size4').hide();
     }else
     if(surface_size=='Daguerre_Canvas')  
     {
        $('#surface_size1').hide();
        $('#surface_size2').hide(); 
        $('#surface_size3').show(); 
        $('#surface_size4').hide();
     }
      else
     if(surface_size=='Bamboo_Fine_art_Matt_Smooth')  
     {
        $('#surface_size1').hide();
        $('#surface_size2').hide(); 
        $('#surface_size3').hide(); 
        $('#surface_size4').show();
     } 
   }
   $(document).ready(function(){
       
      $('#surface_size1').show();
        $('#surface_size2').hide(); 
        $('#surface_size3').hide(); 
        $('#surface_size4').hide();  
       
   });
    </script>
    
    
<table width="100%">
    <tr><td id="header">Images</td><td id="header"> Ratio</td><td id="header"> DPI</td><td id="header">Max height</td><td id="header">Max Width</td><td id="header"> Area</td><td id="header">Width</td><td id="header">Height</td><td id="header">New Width</td><td id="header">New Height</td><td id="header">Print Area</td><td id="header">Mount Area</td><td id="header">Glass Area</td><td id="header">Frame Area</td><td id="header"> Price</td></tr>
        
      
                  <?php
                 
               // echo $_REQUEST['productform'];
                 while($result=mysql_fetch_assoc($detail)){
                 //echo $result['ratio']; 
                 if($result['frame_color']=='ML-215-DBR')
                  {
                      $frame_color='#963939';
                  }elseif($result['frame_color']=='ML-215-WH' ||$result['frame_color']=='ML-215 WH')
                  {
                      $frame_color='#ffffff';
                  }elseif($result['frame_color']=='ML-033 BK' || $result['frame_color']=='ML-215-BK' || $result['frame_color']=='ML-271 BK')
                  {
                      $frame_color='#000000';
                  }elseif($result['frame_color']=='ML-215-BK')
                  {
                      $frame_color='#000000';
                  }
                  
                    $size_data = getimagesize('http://www.indiapicture.in/wallsnart/158/'.$result['fileName']);
                   

   $image_width=$size_data[1]+10; 
                   $result['product_type'];
                 ?>
                  
    <tr ><td <?php if($result['product_type']!='Canvas'){?>style="padding: 10px 10px <?=$image_width.'px'?> 10px;" <?php }?>>
                   &nbsp;&nbsp;&nbsp;<?=$result['fileName'];?><br>
          <?php if($result['product_type']=='Canvas'){?>
              <img src="http://www.indiapicture.in/wallsnart/158/<?=$result['fileName'];?>" style="width:<?=$size_data[0].'px'?>; height:<?=$size_data[1].'px'?>;">
              <?php }elseif($result['product_type']=='Frame Mount'){?>
                   <div class="main_frame"  >
          <div id="abc2" >
              <div id="fir_room" >
                <div id="fir1"> 
                    <div id="fir2">
                                            
                          <img src="http://www.indiapicture.in/wallsnart/158/<?=$result['fileName'];?>" style="width:<?=$size_data[0].'px'?>; height:<?=$size_data[1].'px'?>;">
                        </div>
                   
                </div>
            </div>
                                  </div>
          </div>
                  <?php } elseif($result['product_type']=='Only Frame'){?>
              <div class="main_frame"  >
        
              <div id="fir_room" >
                <div id="fir1"> 
                    <div id="fir2">
                                            
                          <img src="http://www.indiapicture.in/wallsnart/158/<?=$result['fileName'];?>" style="width:<?=$size_data[0].'px'?>; height:<?=$size_data[1].'px'?>;">
                        </div>
                   
               
            </div>
                                  </div>
          </div>
              <?php }?>
              
                   <br>
        </td><td style="padding: 0px 0px 0px 73px;">  <?php echo $result['ratio'];?><td> <?php echo '150';?></td><td><?php echo $result['max_height'];?></td><td><?php  echo $result['max_width'] ;?></td><td><?php echo $result['area'];?></td><td><?php echo $result['width'];?></td><td><?php echo $result['height'];?></td><td><?php echo $result['new_width'];?></td><td><?php echo $result['new_height']?></td><td><?php echo $result['print_size']?></td><td><?php echo $result['mount_size'];?></td><td><?php echo $result['glass_size']?></td><td><?php echo $result['frame_size']?></td><td><?php echo $result['coste'];?></td></tr> 
                 
            <?php }//end while loop
                 ?>
    <input type="hidden" id="frame_color" value="<?=$result['frame_color']?>">
    
    
          </table>
    <div>
        <?php if($_GET['filename']<>''){?>
        <input type="button" onclick="return Export_data();" class="bt-add" name="export_chnnelparter" value="EXPORT" style="font-size: 16px; float: right;    margin-top: 11px;
    margin-right: 25px;" >
        <?php }?>
    </div>
<BR>
<style>
   

        .main_frame{
    margin:auto;
    padding:25px;
  
    -moz-background-size: cover;
    -o-background-size: cover;
    display: block;
    position:absolute;
    padding:8px;
background-color:<?=$frame_color;?>;
border:solid 1px;
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
</div>

<script>
    function Export_data()
    {
        
        if(document.getElementById('filename').value=="")
        {
            alert('Please enter filename!');
            document.getElementById('filename').focus();
            return false;
        }
         if(document.getElementById('category').value=="")
        {
            alert('Please enter category!');
            document.getElementById('category').focus();
            return false;
        }
        
        
        var Antique_code= document.getElementById('Antique_code').value;
         var fancy_code= document.getElementById('fancy_code').value;
          var simple_code= document.getElementById('simple_code').value;
           var paper_size= document.getElementById('paper_size').value;
        var surface= document.getElementById('surface').value;
        var surface_size= document.getElementsByName('surface_size').value;
        var frame= document.getElementById('frame').value;
        var frame_type= document.getElementById('frame_type').value;
        var paper_size= document.getElementById('paper_size').value;
        var mount= document.getElementById('mount').value;
         var glass= document.getElementById('glass').value;
          var canvas_wrapped= document.getElementById('canvas_wrapped').value;
          var canvas_size= document.getElementById('canvas_size').value;
         var frame_color=document.getElementById('frame_color').value;
         if(Antique_code!='')
         {
             var frame_color=Antique_code;
         }else if(fancy_code!='')
         {
             var frame_color=fancy_code;
         }else if(simple_code!='')
         {
             var frame_color=simple_code;
         }
                       
     if(document.getElementById('simple_code').value!=''){
        
     var frame_code=document.getElementById('simple_code').value;
     }else if(document.getElementById('fancy_code').value!='')
     {
          var frame_code=document.getElementById('fancy_code').value;
     }else if(document.getElementById('Antique_code').value!='')
     {
          var frame_code=document.getElementById('Antique_code').value;
     }
        
        
        
        var category= document.getElementById('category').value;
        var filename=document.getElementById('filename').value;
        var size=document.getElementById('size').value;
        //alert(size);
          if(document.getElementById('canvas').checked)
          {
            var product_type='Canvas';
          }else if(document.getElementById('frame_mount').checked)
          {
            var product_type='Frame+Mount';
          }else if(document.getElementById('frame_only').checked)
          {
           var product_type='Only Frame';
          }
        
        
         $.ajax({
              
              type: 'post',
              url: '<?=base_url()?>index.php/backend/check_channel_partner',
              data: 'category='+category,
              dateType:'json',
              success: function(response)
              {
                   if(response=='0')
                   {
               window.location.href= "<?=base_url()?>index.php/backend/export_channel_parter?frame_color="+frame_color+"&category="+category+"&filename="+filename+"&product_type="+product_type+"&size="+size+"&paper_size="+paper_size+"&surface="+surface+"&surface_size="+surface_size+"&frame="+frame+"&frame_type="+frame_type+"&frame_code="+frame_code+"&mount="+mount+"&glass="+glass+"&canvas_wrapped="+canvas_wrapped+"&canvas_size="+canvas_size;

              }else if(response>0){
                  alert('This category Already exist!');
                  document.getElementById('category').focus();
                 return false;
              }
              
           }// end function
                
          });
        
        
        
        
           
    
        
       
        
    }// end function
    
     function save_channel_partner()
    {
        if(document.getElementById('canvas').checked==false && document.getElementById('frame_mount').checked==false && document.getElementById('frame_only').checked==false)
        {
            alert('Please select Any of Product Form to Add !');
            document.getElementById('canvas').focus();
            return false;
        }
        if(document.getElementById('filename').value=="")
        {
            alert('Please enter filename!');
            document.getElementById('filename').focus();
            return false;
        }
         if(document.getElementById('category').value=="")
        {
            alert('Please enter category!');
            document.getElementById('category').focus();
            return false;
        }
        
        
        var Antique_code= document.getElementById('Antique_code').value;
         var fancy_code= document.getElementById('fancy_code').value;
          var simple_code= document.getElementById('simple_code').value;
           var paper_size= document.getElementById('paper_size').value;
        var surface= document.getElementById('surface').value;
        var surface_size= document.getElementsByName('surface_size').value;
        var frame= document.getElementById('frame').value;
        var frame_type= document.getElementById('frame_type').value;
        var paper_size= document.getElementById('paper_size').value;
        var mount= document.getElementById('mount').value;
         var glass= document.getElementById('glass').value;
          var canvas_wrapped= document.getElementById('canvas_wrapped').value;
          var canvas_size= document.getElementById('canvas_size').value;
         var frame_color=document.getElementById('frame_color').value;
         if(Antique_code!='')
         {
             var frame_color=Antique_code;
         }else if(fancy_code!='')
         {
             var frame_color=fancy_code;
         }else if(simple_code!='')
         {
             var frame_color=simple_code;
         }
                       
     if(document.getElementById('simple_code').value!=''){
        
     var frame_code=document.getElementById('simple_code').value;
     }else if(document.getElementById('fancy_code').value!='')
     {
          var frame_code=document.getElementById('fancy_code').value;
     }else if(document.getElementById('Antique_code').value!='')
     {
          var frame_code=document.getElementById('Antique_code').value;
     }
        
        
        
        var category= document.getElementById('category').value;
        var filename=document.getElementById('filename').value;
        var size=document.getElementById('size').value;
        //alert(size);
          if(document.getElementById('canvas').checked)
          {
            var product_type='Canvas';
          }else if(document.getElementById('frame_mount').checked)
          {
            var product_type='Frame+Mount';
          }else if(document.getElementById('frame_only').checked)
          {
           var product_type='Only Frame';
          }
        if(document.getElementById('surface_size1').value!="")
          {
            var surface_size=document.getElementById('surface_size1').value
          }else if(document.getElementById('surface_size2').value!="")
          {
            var surface_size=document.getElementById('surface_size2').value
          }else if(document.getElementById('surface_size3').value!="")
          {
            var surface_size=document.getElementById('surface_size3').value
          }else if(document.getElementById('surface_size4').value!="")
          {
            var surface_size=document.getElementById('surface_size4').value
          }
          
          $.ajax({
              
              type: 'post',
              url: '<?=base_url()?>index.php/backend/check_channel_partner',
              data: 'category='+category,
              dateType:'json',
              success: function(response)
              {
                   if(response=='0')
                   {
                var role= "<?=base_url()?>index.php/backend/save_channel_parter?frame_color="+frame_color+"&category="+category+"&filename="+filename+"&product_type="+product_type+"&size="+size+"&paper_size="+paper_size+"&surface="+surface+"&surface_size="+surface_size+"&frame="+frame+"&frame_type="+frame_type+"&frame_code="+frame_code+"&mount="+mount+"&glass="+glass+"&canvas_wrapped="+canvas_wrapped+"&canvas_size="+canvas_size+"&Action=Save_data_channel";
                window.location.href=role;  

              }else if(response>0){
                  alert('This category Already exist!');
                  document.getElementById('category').focus();
                 return false;
              }
              
           }// end function
                
          });
          
         // return false;
   
    //alert(role);
        
     
    }// end  main function
    
function Channge_url()
    {
            var role= "<?=base_url()?>index.php/backend/save_channel_parter?frame_color=<?=$_GET['frame_color']?>&category=<?=$_GET['category']?>&filename=<?=$_GET['filename']?>&product_type=<?=$_GET['product_type']?>&size=<?=$_GET['size']?>&paper_size=<?=$_GET['paper_size']?>&surface=<?=$_GET['surface']?>&surface_size=<?=$_GET['surface_size']?>&frame=<?=$_GET['frame']?>&frame_type=<?=$_GET['frame_type']?>&frame_code=<?=$_GET['frame_code']?>&mount=<?=$_GET['mount']?>&glass=<?=$_GET['glass']?>&canvas_wrapped=<?=$_GET['canvas_wrapped']?>&canvas_size=<?=$_GET['canvas_size']?>";
       window.location.href=role;   
    }
  <?php if($_GET['Action']=='Save_data_channel'){?>  
$(document).ready(function(){
  setTimeout(function(){ Channge_url()}, 000);   
    
});    
  <?php }?>
    </script>


    
</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<style>
    #header{text-align: center;
    color:#000;
    font-size: 14px;
    font-weight: bold;
    }
</style>


<!--MIDDLE PAGE WRAPPER ENDS--></div>


