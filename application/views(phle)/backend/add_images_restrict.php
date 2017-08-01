

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    
<div id="middle-container"> 
    <?//$_GET['product_type'];?>
<div class="main-hdr"> Add Images for Restriction <?php print_r($save_data);?></div>
<div class="add-newcp"><span style="color:#F00"><?php  print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form name="content_form" action="<?=base_url()?>index.php/backend/add_images_restrict" method="post" id="content_form" enctype="multipart/form-data">

    
    <table style="width: 50%;">
        
       
        <tr><td>FileName</td><td><textarea cols="33" rows="10" id="filename" name="filename"></textarea></td></tr>    
         <tr class="toptr">
             <td></td><td><input type="submit" class="bt-add" onclick="return formValidate()"  name="submit" value="Save" style="font-size: 16px; float: left;"  ></td>
  </tr>

    </table>   
    
</form>

<script>
    function formValidate()
    {
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


