
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>


<style>
    .add-newcp table tr td {
    padding: 10px 0px 20px 13px;
    </style>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    
<div id="middle-container"> 
    <?//$_GET['product_type'];?>
<div class="main-hdr"> DOWNLOAD META DATA  <?php print_r($save_data);?></div>
<div class="add-newcp"><span style="color:#F00"><?php  print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form name="content_form" action="<?=base_url()?>index.php/backend/export_meta_data" method="post" id="content_form" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  

  
  <tr class="toptr" id="print_rate">
    <td>Add file name</td>
    <td>
        <textarea name="filename" id="filename" rows="10" cols="25" ><?=$_GET['filename']?></textarea>
    </td>
    
  </tr>
  
   <tr > <td></td>
           <TD>  <input type="submit" class="bt-add" onclick="return VALIDATE_FORM();" name="submit" value="DOWNLOAD" style="font-size: 16px; float: LEFT; margin-left: 0%"  ></td>
  </tr>
             
  
</table>
    
   
    
</form>

<script>
  
  
   
    </script>
    
    

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
    function VALIDATE_FORM()
    {
        
        if(document.getElementById('filename').value=="")
        {
            alert('Please enter filename!');
            document.getElementById('filename').focus();
            return false;
        }
                       
        
       
     
        
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


