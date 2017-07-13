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
<div class="main-hdr"> Add Gallery Images <?php print_r($save_data);?><a href="<?=base_url()?>index.php/backend/create_gallery"><input type="button" class="bt-add"  name="submit" value="Create Gallery" style="font-size: 16px; float: left; width: 137px; float: right"  ></a><a href="<?=base_url()?>index.php/backend/view_del_gel"><input type="button" class="bt-add"  name="submit" value="View Gallery" style="font-size: 16px; float: left; width: 137px; float: right;margin-right: 21px;"  ></a></div>
<div class="add-newcp"><span style="color:#F00"><?php  print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form name="content_form" action="<?=base_url()?>index.php/backend/add_gallery_images" method="post" id="content_form" enctype="multipart/form-data">

    
    <table style="width: 50%;">
        <tr><td>Email Id</td><td>
                
                <select name="cust_id" id="cust_id" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                    <optgroup  >
<option value="">--Select --</option>
</optgroup>
                    <?php foreach($customer_data as $values){?>
                    <option value="<?=$values->customer_id?>"><?=$values->email_id?></option>
                    <?php }?>
                </select>
                </td></tr>
        
        
        <tr><td>Select Gallery Name</td><td>
                
                <select name="light_box_id" id="light_box_id" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                     <optgroup  >
<option value="">--Select --</option>
</optgroup>
                    <?php foreach($gallery_name as $Selevalues){?>
                    <option value="<?=$Selevalues->lightbox_id?>"><?=$Selevalues->lightbox_name?></option>
                    <?php }?>
                </select>
                </td></tr>
       
        <tr><td>Gallery FileName</td><td><textarea cols="33" rows="10" id="filename" name="filename"></textarea></td></tr>    
         <tr class="toptr">
             <td></td><td><input type="submit" class="bt-add" onclick="return formValidate()"  name="submit" value="Save" style="font-size: 16px; float: left;"  ></td>
  </tr>

    </table>   
    
</form>

<script>
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


