<script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">

<style>
    .add-newcp table tr td {
    padding: 10px 0px 20px 13px;
    </style>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    
<div id="middle-container"> 
    <?//$_GET['product_type'];?>
<div class="main-hdr"> Search Gallery Images <?php print_r($save_data);?><a href="<?=base_url()?>index.php/backend/create_gallery"><input type="button" class="bt-add"  name="submit" value="Create Gallery" style="font-size: 16px; float: left; width: 137px; float: right"  ></a></div>
<div class="add-newcp"><span style="color:#F00"><?php  print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form name="content_form" action="#" method="post" id="content_form" enctype="multipart/form-data">

    
    <table style="width: 100%;">
        <tr><td>Email Id</td><td>
                
                <select name="cust_id" onchange="return getGallerydata()" id="cust_id" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                    <optgroup  >
<option value="">--Select --</option>
</optgroup>
                    <?php foreach($customer_data as $values){?>
                    <option value="<?=$values->customer_id?>"><?=$values->email_id?></option>
                    <?php }?>
                </select>
                </td>
                <td></td>
        </tr>
       </table>   
    <table  style="    width: 100%;"> 
        
        <tr style="border-bottom:solid 2px;"><td>Images</td><td>Gallery Name</td><td>Description</td><td>Action</td><td></td></tr>
    <?php while($result=  mysql_fetch_assoc($result_data)){
        $filename=$this->backend_model->Get_images_details($result['image_id']);
        
        ?>
        <tr><td><img src="http://www.indiapicture.in/wallsnart/158/<?=$filename;?>" height="80px;" width="100px;">
            <br><br> FileName:&nbsp;<?=$filename?>
            </td><td><?=$result['lightbox_name'];?></td><td><?=$result['lightbox_description']?></td><td><a href="#" onclick="return delete_gallery(<?=$result['user_id']?>,<?=$result['serial_no']?>);">delete</a></td><td></td></tr>
    <?php }?>
    </table>
</form>

<script>
    
    function delete_gallery(user_id,lightbox_id)
    {
     
      if(confirm('Are you sure want to delete gallery'))
      {
       window.location.href="<?=base_url()?>index.php/backend/gallery_delete/"+user_id+'/'+lightbox_id;  
   }else{
       alert('Thanks for visit');
   }
    }
    
    function getGallerydata()
    {
       var cust_id= $('#cust_id').val();
       window.location.href="<?=base_url()?>index.php/backend/view_del_gel/"+cust_id;
    }
    function formValidate()
    {
        
        if($('#light_box_id').val()=='')
        {
            alert('Please Select Gallery name ');
            $('#light_box_id').focus();
            return false;
        }
        if($('#filename').val()=='')
        {
            alert('Please enter filename for great gallery');
            $('#filename').focus();
            return false;
        }
        
    }// end function
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


