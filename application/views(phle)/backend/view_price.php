<?php 
 $this->load->library('multipledb'); // loading library.
// Loading second db and running query.
$CI = &get_instance();
//setting the second parameter to TRUE (Boolean) the function will return the database object.
$this->indiapicture = $CI->load->database('indiapicture', TRUE);
if($_REQUEST['search']=='collection'){
$sql_query="SELECT collections,collection_range FROM tbl_category where portal='2' order by collections asc";
$qry = $this->indiapicture->query($sql_query);
$collection=$qry->result();
}else{
    
  $web_price= $this->backend_model->get_whole_details($_REQUEST['search']);
  //print_r($web_price);
  }

?>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    
<div id="middle-container"> 
    <div class="main-hdr">View Web Pricing
    <a href="<?=base_url()?>index.php/backend/web_pricing"><input type="button" class="bt-add"  name="submit" value="Add Info" style="font-size: 16px; float: left; width: 150px; float: right"  ></a>
</div>
    
    <div class="add-newcp"><span style="color:#F00"><?php print($delete_image); print $msg;
    if($delete_image){
         ?> <script>
    setTimeout(function(){ redrect_url()},2000);
    </script><?php
    }
    ?></span>


    
<table width="90%" style="border-bottom:none;"> <tr><td>Filter By</td><td>Collection:&nbsp;<input  <?php if($_REQUEST['search']=='collection'){ echo 'checked';}?> id="collection" type="radio" name="radio" value="collection" onclick="return show_hide('collection');"><td>Print:&nbsp;<input  <?php if($_REQUEST['search']=='1'){ echo 'checked';}?> id="print" type="radio" name="radio" value="1" onclick="return show_hide('1');">&nbsp;Frame: &nbsp;<input type="radio" id="frame" name="radio" <?php if($_REQUEST['search']=='2'){ echo 'checked';}?>  value="2" onclick="return show_hide('2');">Mount:&nbsp;<input type="radio" <?php if($_REQUEST['search']=='4'){ echo 'checked';}?> id="mount" name="radio" value="4" onclick="return show_hide('4');"> Glass:&nbsp;<input type="radio" id="glass" name="radio" value="3"  <?php if($_REQUEST['search']=='3'){ echo 'checked';}?> onclick="return show_hide('3');"> </td></tr></table>   
    
<table width="90%" style="border-top:none;">
    <?php if(@$_REQUEST['search']==1){?>
   <tr>
     <td width="221" class="hd">SR No.</td>
    <td width="221" class="hd">Paper</td>
      <td width="221" class="hd">Quality</td>
    <td width="217" class="hd">Rate</td>
     <td width="167" class="hd">Action</td>
  </tr>
  
  
   <?php   $i=1;   
    $data= $this->backend_model->get_web_price($_REQUEST['search']);
   if(count($data)>0){
       //print_r($price);
      
   foreach ($data as $result){
       
      if($i%2==0)
      {
        $color='#999999';  
      }elseif($i%2!=0){
          $color='#CCCCCC';    
      }
      
     
       ?>
  <tr style=" background-color:<?=$color;?>">
       <td><?=$i;?></td>
    	<td><?=$result->paper;?></td>
        <td><?=$result->quality;?></td>
        <td><?=$result->rate;?></td>
   
    <td><a href="#"><img src="<?=base_url()?>/assets/img/ed.jpg"></a> /<a href="#"><img src="<?=base_url()?>/assets/img/x.png"></a></a> </td>
    </tr>
   <?php $i++;    }// foreach?>
  <?php }else{?>
    <tr><td></td><td></td><td><strong style="color: red">Record not found</strong></td><td></td><td></td><td></td></tr>
     <?php }}else?>
    <?php if(@$_REQUEST['search']==3){?>
   <tr>
     <td width="221" class="hd">SR No.</td>
    <td width="221" class="hd">Glass</td>
    <td width="217" class="hd">Rate</td>
     <td width="167" class="hd">Action</td>
  </tr>
  
  
   <?php   $i=1;   
    $data= $this->backend_model->get_web_price($_REQUEST['search']);
   if(count($data)>0){
       //print_r($price);
      
   foreach ($data as $result){
       
      if($i%2==0)
      {
        $color='#999999';  
      }elseif($i%2!=0){
          $color='#CCCCCC';    
      }
      
     
       ?>
  <tr style=" background-color:<?=$color;?>">
       <td><?=$i;?></td>
    	<td><?=$result->glass;?></td>
        <td><?=$result->glass_rate;?></td>
   
    <td><a href="#"><img src="<?=base_url()?>/assets/img/ed.jpg"></a> /<a href="#"><img src="<?=base_url()?>/assets/img/x.png"></a></a> </td>
    </tr>
   <?php $i++;    }// foreach?>
  <?php }else{?>
    <tr><td></td><td></td><td><strong style="color: red">Record not found</strong></td><td></td><td></td><td></td></tr>
     <?php }}else?>
     <?php if(@$_REQUEST['search']==4){?>
   <tr>
     <td width="221" class="hd">SR No.</td>
    <td width="221" class="hd">Mount</td>
    <td width="217" class="hd">Rate</td>
     <td width="167" class="hd">Action</td>
  </tr>
  
  
   <?php   $i=1;   
    $data= $this->backend_model->get_web_price($_REQUEST['search']);
   if(count($data)>0){
       //print_r($price);
      
   foreach ($data as $result){
       
      if($i%2==0)
      {
        $color='#999999';  
      }elseif($i%2!=0){
          $color='#CCCCCC';    
      }
      
     
       ?>
  <tr style=" background-color:<?=$color;?>">
       <td><?=$i;?></td>
    	<td><?=$result->mount;?></td>
        <td><?=$result->mount_rate;?></td>
   
    <td><a href="#"><img src="<?=base_url()?>/assets/img/ed.jpg"></a> /<a href="#"><img src="<?=base_url()?>/assets/img/x.png"></a></a> </td>
    </tr>
   <?php $i++;    }// foreach?>
  <?php }else{?>
    <tr><td></td><td></td><td><strong style="color: red">Record not found</strong></td><td></td><td></td><td></td></tr>
     <?php }}elseif(@$_REQUEST['search']==2){?>
   <tr>
     <td width="221" class="hd">SR No.</td>
    <td width="221" class="hd">Categroy</td>
    <td width="231" class="hd">Name</td>
    <td width="217" class="hd">Rate</td>
     <td width="167" class="hd">Action</td>
  </tr>
  
  
   <?php   $i=1;   
    $data= $this->backend_model->get_web_price($_REQUEST['search']);
   if(count($data)>0){
       //print_r($price);
      
   foreach ($data as $result){
       
      if($i%2==0)
      {
        $color='#999999';  
      }elseif($i%2!=0){
          $color='#CCCCCC';    
      }
      
      

        $data[0]->rate;
       ?>
  <tr style=" background-color:<?=$color;?>">
       <td><?=$i;?></td>
    	<td><?=$result->frame_category;?></td>
        <td><?=$result->frame;?></td>
    <td><?=$data[0]->frame_rate;?></td>
    <td><a href="#"><img src="<?=base_url()?>/assets/img/ed.jpg"></a> /<a href="#"><img src="<?=base_url()?>/assets/img/x.png"></a></a> </td>
    </tr>
   <?php $i++;    }// foreach?>
  <?php }else{?>
    <tr><td></td><td></td><td></td><td><strong style="color: red">Record not found</strong></td><td></td><td></td><td></td></tr>
  <?php }}elseif($_REQUEST['search']=='collection'){?>
  

  <tr>
      <td width="221" class="hd">SR No.</td>
    <td width="221" class="hd">Name</td>
    <td width="231" class="hd">Quality</td>
    <td width="217" class="hd">Rate</td>
     <td width="167" class="hd">Action</td>
  </tr>
  
  
  <?php   $i=1;   
   if(count($collection)>0){
       //print_r($price);
      
   foreach ($collection as $result){
       
      if($i%2==0)
      {
        $color='#999999';  
      }elseif($i%2!=0){
          $color='#CCCCCC';    
      }
      
       $data= $this->backend_model->get_web_price($result->collection_range);

        $data[0]->rate;
       ?>
  <tr style=" background-color:<?=$color;?>">
       <td><?=$i;?></td>
    <td><?=$result->collections;?></td>
    <td><?=$result->collection_range;?></td>
    <td><?=$data[0]->rate;?></td>
    <td><?=$values->create_on;?></td>
   
    <td><a href="<?=base_url()?>index.php/backend/upload_upload?search=<?=$values->title_name;?>&edit_id=<?=$values->id;?>"><img src="<?=base_url()?>/assets/img/ed.jpg"></a> /<a href="view_header_images?delete_id=<?=$values->id;?>"><img src="<?=base_url()?>/assets/img/x.png"></a></a> </td>
    </tr>
   <?php $i++;    }?>
  <?php }else{?>
    <tr><td></td><td></td><td><strong style="color: red">Record not found</strong></td><td></td><td></td><td></td></tr>
  <?php }}?>
  
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
        
        window.location.href="<?=base_url()?>index.php/backend/view_price/?search="+type+"";
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


