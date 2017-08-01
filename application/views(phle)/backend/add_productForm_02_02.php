
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>


<style>
    .add-newcp table tr td {
    padding: 10px 0px 20px 13px;
    </style>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    
<div id="middle-container"> 
   
<div class="main-hdr"> Add Product Form  <?php print_r($save_data);?></div>
<div class="add-newcp"><span style="color:#F00"><?php  print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form name="content_form" action="<?php echo base_url();?>index.php/backend/add_productForm" method="post" id="content_form" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr class="toptr">
    <td></td><td>Select Any of Product Form to Add</td>
    <td><input type="radio" name="productform" id="canvas" value="canvas" onclick="check_data_show('canvas');" checked> Canvas</td>
    <td><input type="radio" name="productform" id="frame_mount" value="Frame+mount" onclick="check_data_show('frame+mount')"> Frame + Mount</td>
    <td><input type="radio" name="productform" id="frame_only" value="Only Frame" onclick="check_data_show('only frame')"> Frame only</td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  </tr>

  
  <tr class="toptr" id="print_rate">
    <td>Add file name</td>
    <td>
        <textarea name="filename" id="filename" rows="10" cols="25" ></textarea>
    </td>
        <td>Category&nbsp;<input type="text" name="category" id="category" ></td>
        <td>Sizes&nbsp;<select name="size" id="size">
         
                     <option value="10">Size1(10)</option>
                      <option value="12">Size2(12)</option>
                       <option value="18">Size3(18)</option>
                        <option value="24">Size4(24)</option>
         </select></td>
  </tr>
  
  
             
  
</table>
    <table style="border-color:#f8f8f8;width: 100%;">
        <tr class="toptr">
           <td>Select Paper</td>
           <td><select name="paper_size" id="paper_size">
                      <option value="">---Select---</option>
                      <option value="hight">Hight</option>
                      <option value="mid">Mid</option>
                      <option value="budget">Budget</option>
                     
          </select></td> 
            
      <td>Surface</td>
      <td><select name="surface" id="surface" onchange="return change_surface_size();">
                      <option value="">---Select---</option>
                      <option value="Photo_Matt_Fibre_Duo">Photo Matt Fiber Duo</option>
                      <option value="Photo_Luster">Photo Luster</option>
                      <option value="Photo_Canvas">Photo Canvas</option>
                      <option value="Daguerre_Canvas">Daguerre Canvas</option>
                      <option value="Bamboo_Fine_art_Matt_Smooth">Bamboo Fine art Matt- Smooth</option>
          </select></td>
          <td>Surface Size</td>
          <td><select name="surface_size" id="surface_size1" style="display:none;">
                      <option value="">---Select---</option>
                      <option value="a3">A3</option>
                      <option value="a4">A4</option>
                      <option value="24inch">24(Inch)</option>
                      <option value="44inch">44(Inch)</option>
                      
          </select>
          
          <select name="surface_size" id="surface_size2" style="display:none;">
                      <option value="">---Select---</option>
                      <option value="a4">A4</option>
                      <option value="17inch">17(Inch)</option>
                      <option value="24inch">24(Inch)</option>
                       <option value="36inch">36(Inch)</option>
                      <option value="44inch">44(Inch)</option>
                      
          </select>
           <select name="surface_size" id="surface_size3" style="display:none;">
                      <option value="">---Select---</option>
                      <option value="17inch">17(Inch)</option>
                      <option value="24inch">24(Inch)</option>
                       <option value="36inch">36(Inch)</option>
                      <option value="44inch">44(Inch)</option>
                      
          </select>    
           <select name="surface_size" id="surface_size4" style="display:none;">
                      <option value="">---Select---</option>
                       <option value="a4">A4</option>
                      <option value="17inch">17(Inch)</option>
                      <option value="24inch">24(Inch)</option>
                       <option value="36inch">36(Inch)</option>
                      <option value="44inch">44(Inch)</option>
                      
          </select>    
          
          </td>
          <td id="td_frame">Frame</td>
          <td><select name="frame" id="frame">
                      <option value="">---Select---</option>
                      <option value="Synthetic">Synthetic</option>
                      <option value="wooden">wooden</option>
                      
          </select></td>
          <td id="td_frame_type">Frame Type</td>
           <td><select name="frame_type" id="frame_type" onchange="return show_frame_code();">
                      <option value="">---Select---</option>
                      <option value="simple">simple</option>
                      <option value="fancy">fancy</option>
                      <option value="Antique">Antique</option>
                      
          </select></td>
          
      
  </tr>
  <tr>
      <td id="td_frame_code">Frame Code</td>
      <td><select name="simple_code" id="simple_code" style="display:none;">
<option value="">---Select---</option>
<option value="ML-215-BK"> ML-215-BK </option>
<option value="ML-215-DBR"> ML-215-DBR </option>
<option value="ML-215-LBR"> ML-215-LBR </option>
<option value="ML-215-WH"> ML-215-WH </option>
<option value="ML-016 DBRG"> ML-016 DBRG </option>
<option value="ML-016 SIL N"> ML-016 SIL N </option>
<option value="ML-016 MRS"> ML-016 MRS </option>
<option value="ML-016 SIL VK"> ML-016 SIL VK </option>
<option value="ML-016 BKTK"> ML-016 BKTK </option>
<option value="ML- 023 BK"> ML- 023 BK </option>
<option value="ML-014 GD"> ML-014 GD </option>
<option value="ML-014 BKBR"> ML-014 BKBR </option>
<option value="ML-117 GD"> ML-117 GD </option>
<option value="ML-117 NAT"> ML-117 NAT </option>
<option value=""> ML-123 SIL CRUK </option>
<option value=""> ML-149-WH </option>
<option value=""> ML-149-RD </option>
<option value=""> ML-149 NAT </option>
<option value=""> ML-149 DBR </option>
<option value=""> ML 149 BR </option>
<option value=""> ML 149 BL </option>
<option value=""> ML- 149 BK </option>
<option value=""> ML-149 AGD </option>
<option value=""> ML-167 SIL </option>
<option value=""> ML-205 CRG </option>
<option value=""> ML-205 BK </option>
<option value=""> ML-205 BR </option>
<option value=""> ML-205 GR </option>
<option value=""> ML- 205 IV </option>
<option value=""> ML-221 NAT </option>
<option value=""> ML-221 DBR </option>
<option value=""> ML-221 BK </option>
<option value=""> ML-261 SIL </option>
<option value=""> ML-261 GD </option>
<option value=""> ML-261 DBR </option>
<option value=""> ML-261 BK </option>
<option value=""> ML-282 BKP </option>
<option value=""> ML-282-WH SIL </option>
<option value=""> ML—282 MRBK </option>
<option value=""> ML-282 AGD </option>
<option value=""> ML-282 BKS </option>

                      
          </select>
          <select name="fancy_code" id="fancy_code" style="display:none;">
              <option value="">---Select---</option>
              <option value="ML-014-SIL (N)"> ML-014-SIL (N) </option>
<option value="ML-033 BK"> ML-033 BK </option>
<option value="ML-055 GD"> ML-055 GD </option>
<option value="ML-065-SIL"> ML-065-SIL </option>
<option value="ML-113 IV"> ML-113 IV </option>
<option value="ML 173 CRG"> ML 173 CRG </option>
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
<option value="ML-ST-30-BK"> ML-ST-30-BK </option>

          </select>
           <select name="Antique_code" id="Antique_code" style="display:none;">
               <option value="">---Select---</option>
             <option value="ML-014 GD (N)"> ML-014 GD (N) </option>
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
<option value="ML-215 WH"> ML-215 WH </option>
<option value="ML215 SILUK"> ML215 SILUK </option>
<option value="ML-255 SIL BK"> ML-255 SIL BK </option>
<option value="ML-255 MR"> ML-255 MR </option>
<option value="ML-255 DBR"> ML-255 DBR </option>
<option value="ML-271 SIL"> ML-271 SIL </option>
<option value="ML-271 BK"> ML-271 BK </option>


          </select>
      </td>
      
      <td id="td_mount">Mount</td>
      <td><select name="mount" id="mount">
                      <option value="">---Select---</option>
                      <option value="Antique Ivory Texture">Antique Ivory Texture</option>
                      <option value="Antique White">Antique White</option>
                      <option value="Snow White">Snow White</option>
                      <option value="Poster Black">Poster Black</option>
                      <option value="TINT 10">TINT 10</option>
                      
          </select></td>
          <td id="td_glass">Glass</td>
          <td><select name="glass" id="glass">
                      <option value="">---Select---</option>
                      <option value="Acrylic">Acrylic</option>
                      <option value="Normal">Normal</option>
                      
                      
                      
          </select></td>
          <td id="td_canvas_wrapped">Canvas wrapped</td>
          <td><select name="canvas_wrapped" id="canvas_wrapped">
                      <option value="">---Select---</option>
                      <option value="Acrylic">Normal Wood</option>
                      <option value="Seasoned wood">Seasoned wood</option>
                      
                      
                      
              </select></td>
              <td id="td_canvas_size">Canvas Size</td><td><select name="canvas_size" id="canvas_size">
                      <option value="">---Select---</option>
                      <option value="1&1.5">Height(1) X Width(1.5)</option>
                      <option value="1&2">Height(1) X Width(2)</option>
                       <option value="1.5&2">Height(1.5) X Width(2)</option>
                       
                      
                      
                      
              </select></td>
          
          </tr>
    </table>
    <table style="border-color:#f8f8f8;width: 100%;">
        
         <tr class="toptr">
             <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td><input type="submit" class="bt-add" name="submit" value="VIEW" style="font-size: 16px;"  >&nbsp;&nbsp;&nbsp;<input type="button" onclick="return save_channel_partner();" class="bt-add" name="export_chnnelparter" value="SAVE" style="font-size: 16px;" > &nbsp;&nbsp;<input type="button" onclick="return Export_data();" class="bt-add" name="export_chnnelparter" value="EXPORT" style="font-size: 16px;" ></td><td></td><td></td><td></td><td></td><td></td>
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
                  //echo $_REQUEST['frame_code'];
                   if($_REQUEST['Antique_code']<>'')
                   {
                       $frame_code=$_REQUEST['Antique_code'];
                   }elseif($_REQUEST['fancy_code']<>'')
                   {
                       $frame_code=$_REQUEST['fancy_code'];
                   }elseif($_REQUEST['simple_code']<>'')
                   {
                       $frame_code=$_REQUEST['simple_code'];
                   }
                   
                    if($frame_code=='ML-215-BK')
                   {  $framecolor='#000';
                   }elseif ($frame_code=='ML-215-WH') 
                       { $framecolor='#fff';}
                       elseif($frame_code=='ML-215-BK')
                   {  $framecolor='#000';
                   }elseif ($frame_code=='ML-215-DBR') 
                       { $framecolor='#810404';}
                    
                 $surface_details=  $this->backend_model->Surface_collection_price($_REQUEST['surface'],$_REQUEST['surface_size']); 
                 $frame_details=  $this->backend_model->frame_price($_REQUEST['frame'],$_REQUEST['frame_type'],$frame_code); 
                 $mount_details=  $this->backend_model->mount_price($_REQUEST['mount']); 
                 $glasses_details=  $this->backend_model->glass_price($_REQUEST['glass']); 
                 $canvas_details=  $this->backend_model->canvas_wrapped($_REQUEST['canvas_wrapped'],$_REQUEST['canvas_size']); 
                 $collection_wrtdetails=  $this->backend_model->collection_price_wrt_paper($_REQUEST['surface'],$_REQUEST['paper_size']); 
                //print_r($canvas_details);
                 
                
                 while($result=mysql_fetch_assoc($detail)){
                 // $result['images_filename']; 
                  
                  $ratio=$result['image_original_width']/$result['image_original_height'];
                  if($result['images_filename']<>'')
                  {
                     if(isset($_REQUEST['productform']))
                     {
                         
                     
                         
                    if($_REQUEST['productform']=='canvas')/// or LOW
                     {     
                         
                    if($_REQUEST['size']=='10')
                    {
                        
                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2; 
                        
                    }elseif($_REQUEST['size']=='12')/// 
                    {
                        
                        $p_width=12;
                        $p_height=12*$ratio;
                       $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;
                        
                    }if($_REQUEST['size']=='18')
                    {
                        
                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;
                        
                    }if($_REQUEST['size']=='24')
                    {
                        
                        $p_width=24;
                        $p_height=24*$ratio;
                       $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;
                        
                    }// end size condition
                    
                    
                    
                     }else if($_REQUEST['productform']=='Frame+mount')///MIDDLE
                     {     
                         
                    if($_REQUEST['size']=='10')
                    {
                        
                        $p_width=10;
                        $p_height=10*$ratio;
                         $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;
                        
                    }elseif($_REQUEST['size']=='12')
                    {
                        
                        $p_width=12;
                        $p_height=12*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;
                        
                    }if($_REQUEST['size']=='18')
                    {
                        
                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;
                        
                    }if($_REQUEST['size']=='24')
                    {
                        
                        $p_width=24;
                        $p_height=24*$ratio;
                       $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;
                        
                    }// end size condition
                     
                     }else if($_REQUEST['productform']=='Only Frame')///HIGH
                     {     
                         
                    if($_REQUEST['size']=='10')
                    {
                        
                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;
                       
                        
                    }elseif($_REQUEST['size']=='12')
                    {
                        
                        $p_width=12;
                        $p_height=$p_height=  number_format($p_width, 0,'.','')*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                         $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;
                        
                    }if($_REQUEST['size']=='18')
                    {
                        
                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;
                        
                    }if($_REQUEST['size']=='24')
                    {
                        
                        $p_width=24;
                        $p_height=  number_format($p_width, 0,'.','')*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                         $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));
                       
                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;
                        
                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;
                        
                    }// end size condition
                     
                     }
                   }// end if condition main      
                     
                 
                   //echo $surface_details[1];
                 $print_coste=$print_size*$collection_wrtdetails;
                 $mount_price=$mount_size*$mount_details[3];
                 $glass_price=$glassSize*$glasses_details[3];
                 $frame_price=$FrameSize*$frame_details;
                 if($_REQUEST['productform']=='canvas')/// or LOW
                     {  
                 $total_coste=$print_coste+$mount_price+$glass_price+$frame_price+$canvas_details;
                     }else{
                         $total_coste=$print_coste+$mount_price+$glass_price+$frame_price;
                     }
                    $size_data = getimagesize('http://www.indiapicture.in/wallsnart/158/'.$result['images_filename']);


   $image_width=$size_data[1]+10; 
                  
                 ?>
                  
    <tr ><td <?php if($_REQUEST['productform']!='canvas'){?>style="padding: 10px 10px <?=$image_width.'px'?> 10px;" <?php }?>>
                   &nbsp;&nbsp;&nbsp;<?=$result['images_filename'];?><br>
          <?php if($_REQUEST['productform']=='canvas'){?>
              <img src="http://www.indiapicture.in/wallsnart/158/<?=$result['images_filename'];?>" style="width:<?=$size_data[0].'px'?>; height:<?=$size_data[1].'px'?>;">
              <?php }elseif($_REQUEST['productform']=='Frame+mount'){?>
                   <div class="main_frame"  >
          <div id="abc2" >
              <div id="fir_room" >
                <div id="fir1"> 
                    <div id="fir2">
                                            
                          <img src="http://www.indiapicture.in/wallsnart/158/<?=$result['images_filename'];?>" style="width:<?=$size_data[0].'px'?>; height:<?=$size_data[1].'px'?>;">
                        </div>
                   
                </div>
            </div>
                                  </div>
          </div>
                  <?php } elseif($_REQUEST['productform']=='Only Frame'){?>
              <div class="main_frame"  >
        
              <div id="fir_room" >
                <div id="fir1"> 
                    <div id="fir2">
                                            
                          <img src="http://www.indiapicture.in/wallsnart/158/<?=$result['images_filename'];?>" style="width:<?=$size_data[0].'px'?>; height:<?=$size_data[1].'px'?>;">
                        </div>
                   
               
            </div>
                                  </div>
          </div>
              <?php }?>
              
                   <br>
        </td><td style="padding: 0px 0px 0px 73px;"> <?php echo number_format($ratio, 2, '.', '');?><td> <?php echo '150';?></td><td><?php echo  number_format($Max_height, 2,'.','');?></td><td><?php echo number_format($Max_width, 2,'.','') ;?></td><td><?php echo number_format($area, 2, '.','');?></td><td><?=$p_width;?></td><td><?php echo number_format($p_height,0, '.','');?></td><td><?php echo number_format($newWidth, 0, '.','')?></td><td><?php echo number_format($newHeight, 0, '.','')?></td><td><?php echo number_format($print_size, 0, '.','')?></td><td><?php echo number_format($mount_size ,2,'.','');?></td><td><?php echo number_format($glassSize, 2,'.','')?></td><td><?php echo number_format($FrameSize, 2, '.','')?></td><td><?php echo number_format($total_coste, 2,'.','');?></td></tr> 
                 
            <?php }}//end while loop
                 ?>
    <input type="hidden" id="frame_color" value="<?=$framecolor?>">
          </table>
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
background-color:<?=$framecolor;?>;
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
        
           
     window.location.href= "<?=base_url()?>index.php/backend/export_channel_parter?frame_color="+frame_color+"&category="+category+"&filename="+filename+"&product_type="+product_type+"&size="+size+"&paper_size="+paper_size+"&surface="+surface+"&surface_size="+surface_size+"&frame="+frame+"&frame_type="+frame_type+"&frame_code="+frame_code+"&mount="+mount+"&glass="+glass+"&canvas_wrapped="+canvas_wrapped+"&canvas_size="+canvas_size;
        
       
        
    }// end function
    
     function save_channel_partner()
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
        
           
     window.location.href= "<?=base_url()?>index.php/backend/save_channel_parter?frame_color="+frame_color+"&category="+category+"&filename="+filename+"&product_type="+product_type+"&size="+size+"&paper_size="+paper_size+"&surface="+surface+"&surface_size="+surface_size+"&frame="+frame+"&frame_type="+frame_type+"&frame_code="+frame_code+"&mount="+mount+"&glass="+glass+"&canvas_wrapped="+canvas_wrapped+"&canvas_size="+canvas_size;
        
       
        
    }// end function
    
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


