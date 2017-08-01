
<?php //print_r($view_images);?>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    
<div id="middle-container"> 
    <div class="main-hdr">All Info
    <a href="<?=base_url()?>index.php/backend/upload_upload"><input type="button" class="bt-add"  name="submit" value="Add Info" style="font-size: 16px; float: left; width: 150px; float: right"  ></a>
</div>
    
    <div class="add-newcp"><span style="color:#F00"><?php print($delete_image); print $msg;
    if($delete_image){
         ?> <script>
    setTimeout(function(){ redrect_url()},2000);
    </script><?
    }
    ?></span>
<div class="mndry">*Mandatory Fields</div>

    
<table width="90%" style="border-bottom:none;"> <tr><td>Home Images</td><td>Header Menu:&nbsp;<input  <?php if($_REQUEST['search']=='menu'){ echo 'checked';}?> id="menu" type="radio" name="radio" value="menu" onclick="return show_hide('menu');">&nbsp;Top Category&nbsp;<input type="radio" id="top" name="radio" <?php if($_REQUEST['search']=='top category'){ echo 'checked';}?>  value="top_cat" onclick="return show_hide('top category');">Bottom Slider&nbsp;<input type="radio" <?php if($_REQUEST['search']=='bottom'){ echo 'checked';}?> id="bottom" name="radio" value="bottom" onclick="return show_hide('bottom');"> Bottom Top&nbsp;<input type="radio" id="bottom_top" name="radio" value="bottom top"  <?php if($_REQUEST['search']=='bottom top'){ echo 'checked';}?> onclick="return show_hide('bottom top');"> </td></tr></table>   
    
<table width="90%" style="border-top:none;">
    
  <tr>
      <td width="66" class="hd">SR No.</td>
    <td width="221" class="hd">Title</td>
    <td width="231" class="hd">Images</td>
    
    <td width="217" class="hd">Create On</td>
    <td width="231" class="hd" >Status</td>
    <td width="167" class="hd">Action</td>
  </tr>
  <?php   $i=1;   
  if(mysql_num_rows($view_images)>0){
  while($values=  mysql_fetch_object($view_images)): 
      if($i%2==0)
      {
        $color='#999999';  
      }elseif($i%2!=0){
          $color='#CCCCCC';    
      }
      ?>
  <tr style=" background-color:<?=$color;?>">
    <td><?=$i;?></td>
    <td><?=$values->title;?></td>
    <td><img src="<?=base_url()?><?=$values->image;?>" height="80px;" width="80px;"></td>
    <td><?=$values->create_on;?></td>
    <td><?php if($values->status==1){?><a href="view_header_images?edit_id=<?=$values->id;?>&status=0"><input type="button" name="status" style=" background-color: #F00; color: #fffff; border: none;" value="Deactive"></a><?php }elseif($values->status==0){?><a href="view_header_images?edit_id=<?=$values->id;?>&status=1"><input type="submit" name="status" value="Active" style="background-color: #006400; color: #fffff; border: none;"></a><?php }?></td>
    <td><a href="<?=base_url()?>index.php/backend/upload_upload?search=<?=$values->title_name;?>&edit_id=<?=$values->id;?>"><img src="<?=base_url()?>/assets/img/ed.jpg"></a> /<a href="view_header_images?delete_id=<?=$values->id;?>"><img src="<?=base_url()?>/assets/img/x.png"></a></a> </td>
    </tr>
  <?php $i++;    endwhile;?>
  <?php }else{?>
    <tr><td></td><td></td><td><strong style="color: red">Record not found</strong></td><td></td><td></td><td></td></tr>
  <?php }?>
</table>
<style>
    .hd{
        font-weight:900;
    }
    .txt{width: 217px;
    height: 37px;
    border-radius: 5px;}
    </style>
<script>
    function redrect_url(){
       
        window.location.href="<?=base_url()?>index.php/backend/view_header_images";
    }
    function formValidate()
    {
        if($('#title').val()=='0')
        {
            alert('Please Select Image Title');
            $('#title').focus();
            return false;
        }
        if($('#file').val()=='')
        {
            alert('Please Choose image to header upload');
            $('#file').focus();
            return false;
        }
       
        
    }// end function
    
    function show_hide(type){
        
        window.location.href="<?=base_url()?>index.php/backend/view_header_images/?search="+type+"";
    }
    </script>
    
    

    
<BR>

</div>




    
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


