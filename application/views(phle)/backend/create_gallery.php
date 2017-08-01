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
<div class="main-hdr"> Create Gallery <?php print_r($save_data);?>
    <a href="<?=base_url()?>index.php/backend/add_gallery_images"><input type="button" class="bt-add"  name="submit" value="Add Images" style="font-size: 16px; float: left; width: 150px; float: right"  ></a>
</div>
<div class="add-newcp"><span style="color:#F00"><?php  print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form name="content_form" action="<?=base_url()?>index.php/backend/create_gallery" method="post" id="content_form" enctype="multipart/form-data">

    
    <table style="width: 50%;">
        <tr><td>Email Id</td><td>
                
                <select  id="cust_id" name="cust_id" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                    <optgroup  >
<option value="">--Select --</option>
</optgroup>
                    <?php foreach($customer_data as $values){?>
                    <option value="<?=$values->customer_id?>"><?=$values->email_id?></option>
                    <?php }?>
                </select>
                </td></tr>
        <tr><td>Gallery Name</td><td><input  class="txt" type="text" id="gallery_name" name="gallery_name" ></td></tr>
        <tr><td>Description</td><td><textarea cols="33" rows="4" id="desc" name="desc"></textarea></td></tr>    
         <tr class="toptr">
             <td></td><td><input type="submit" class="bt-add" onclick="return formValidate();" name="submit" value="Save" style="font-size: 16px; float: left;"  ></td>
  </tr>

    </table>   
    
</form>
<style>
    .txt{width: 217px;
    height: 37px;
    border-radius: 5px;}
    </style>
<script>
    function formValidate()
    {
        if($('#cust_id').val()=='')
        {
            alert('Please Select customer mail id');
            $('#cust_id').focus();
            return false;
        }
        if($('#gallery_name').val()=='')
        {
            alert('Please enter gallery name');
            $('#gallery_name').focus();
            return false;
        }
        if($('#desc').val()=='')
        {
            alert('Please enter gallery description');
            $('#desc').focus();
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


