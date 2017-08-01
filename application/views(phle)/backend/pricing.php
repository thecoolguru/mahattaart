<?php
print_r($filter_by);
//print_r($printer_display_name);
$filter_type=$_REQUEST['filter_by'];
//echo $_REQUEST['filter_by'];?>
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>


<style>
    .add-newcp table tr td {
    padding: 10px 0px 20px 13px;
    </style>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    
<div id="middle-container"> 
    <?//$_GET['product_type'];?>
    <form name="price_form" action="save_pricing" method="post">
    <div class="main-hdr" id="display_pricing_category_name"><?php if($_REQUEST['category_id']==1){ echo '<H3>PRINTER PRICING</H3>';}
      elseif($_REQUEST['category_id']==2){ echo '<H3>FRAMER PRICING</H3>';}else
          if($_REQUEST['category_id']==3){ echo '<H3>MOUNT PRICING</H3>';}else
              if($_REQUEST['category_id']==4){ echo '<H3>GLASS PRICING</H3>';}
          ?></div>
<div class="add-newcp"><span style="color:#F00"><?php if($msg<>''){
    ?><script>setTimeout(function(){setTOut()},2500); function setTOut(){ window.location.href="pricing?filter_by=<?=$_REQUEST['filter_by'];?>&category_id=<?=$_REQUEST['category_id'];?>"}</script><?php 
    
}  print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
    
    <table width="100%" style="border-bottom:#FFFFFF">
        <input type="hidden" name="filter_by" value="<?=$_REQUEST['filter_by'];?>">
         <input type="hidden" name="category_id" value="<?=$_REQUEST['category_id'];?>">
    <tr><td>Select Pricing Category </td><td>
            <select class="dropClass" name="category" id="category" onchange="return change_pricing();">
                <option value="">--Select category--</option>
                <option value="1" <?php if($_REQUEST['category_id']==1){?> selected=""<?php }?>>Printer Price</option>
                <option value="2" <?php if($_REQUEST['category_id']==2){?> selected=""<?php }?>>Framer Pricing</option>
                <option value="3" <?php if($_REQUEST['category_id']==3){?> selected=""<?php }?>>Mount Pricing</option>
                <option value="4" <?php if($_REQUEST['category_id']==4){?> selected=""<?php }?>>Glass Pricing</option>
            </select></td><td></td><td></td><td></td><td></td></tr> 
    <?php if($filter_type=='printer'){?>
    <tr><td>Collection </td><td>Value(%)</td><td></td><td></td><td></td><td></td></tr> 
    <tr><td>Low </td><td><input type="text" name="low"   id="low" class="c_txtClass" placeholder="Low value(%)" ></td><td></td><td></td><td></td><td></td></tr> 
    <tr><td>Medium </td><td><input type="text" name="medium" id="medium" class="c_txtClass"  placeholder="Medium value(%)"></td><td></td><td></td><td></td><td></td></tr> 
    <tr><td>High</td><td><input type="text" name="high" id="high" class="c_txtClass"  placeholder="High value(%)"></td><td></td><td></td><td></td><td></td></tr> 
    
    <?php }?>
    <tr><td></td><td>
        </td><td></td><td></td></tr> </table>
    <table width="100%" id="printer_details">
        <?php 
         if($filter_type=='printer'){
        ?>
    <tr class="tdClass"><td>SR.No.&nbsp;Display Name</td><td>Rate</td><td><table style=" width: 100%; border-top: 6px solid #f8f8f8;
            border-bottom: 3px solid #f8f8f8;"><tr><td>Type &nbsp; </td><td>MarkUp</td><td>&nbsp; GSP=MP</td><td>Royalty</td><td>&nbsp; Sale Price</td></tr></table></td><td></td><td></td><td></td><td></td></tr> 
         <?php }elseif($filter_type=='FRM' || $filter_type=='MNT' ||$filter_type=='GLS'){?>
    <tr class="tdClass"><td>SR.No.&nbsp;Display Name</td><td>Rate</td><td><table style=" width: 100%; border-top: 6px solid #f8f8f8;
    border-bottom: 3px solid #f8f8f8;"><tr><td>MarkUp</td><td>Sale Price</td></tr></table></td><td></td><td></td><td></td><td></td></tr> 
    <?php }?>
        <?php $srno=1; 
      while($display_name_result =mysql_fetch_object($display_name)){ 
          if($display_name_result->display_name<>''):
          ?>
    <tr ><td><?php echo  $srno.'.'.'&nbsp;'. ucwords($display_name_result->display_name);?></td>
         
                
                <td> 
                    <select name="rate[]" id="rate<?=$srno?>" onchange="return add_rates<?=$srno?>();"  class="dropClass"  >
                <option value="">--Select Rate--</option>
                <?php
                          
                      
              if($filter_type=='printer'){
            $rate=  $this->backend_model->get_printer_rate();
            }elseif($filter_type=='FRM' || $filter_type=='MNT' ||$filter_type=='GLS'){
             $rate=$this->backend_model->get_framer_rate($filter_type);
             }
                while($result= mysql_fetch_object($rate)):
                   
                 ?>
                <option value="<?=$result->rate?>"><?=$result->rate?></option>
                <?php endwhile;?>
                </select></td>     
                
                
        <?php 
         if($filter_type=='printer'){
        ?>
                <td><table style="width: 100%;  border-top: 6px solid #f8f8f8;
    border-bottom: 3px solid #f8f8f8;">
                        <tr><td><input type="hidden" name="rates[]" id="rates1<?=$srno?>"><input type="hidden" name="display_name[]" value="<?=$display_name_result->display_name?>"><input type="hidden" name="category_type[]" value="low">Low</td><td><input class="txtClass" type="text"  name="markup[]" id="markup<?=$srno;?>1"  data-rate_id="<?=$srno;?>" data-id="<?=$srno;?>1" data-toggle="markup" placeholder="MarkUp" ></td>
<td><input class="txtClass" type="text" readonly=""  name="GSP_MP[]" id="GSP_MP<?=$srno;?>1"  data-rate_id="<?=$srno;?>" data-id="<?=$srno;?>1" data-toggle="markup" placeholder="GSP=MP" ></td>
                <td><input class="txtClass" type="text"  name="royalty[]" id="royalty<?=$srno;?>1" data-rate_id="<?=$srno;?>"  data-id="<?=$srno;?>1" data-toggle="royalty" placeholder="Royalty" ></td>
       <td><input class="txtClass" type="text" readonly=""  name="sale__price[]" id="sale__price<?=$srno;?>1" data-rate_id="<?=$srno;?>"  data-id="<?=$srno;?>1" data-toggle="sale_price" placeholder="Sale Price" ></td></tr>
                         <tr><td><input type="hidden" name="rates[]" id="rates2<?=$srno?>"><input type="hidden" name="display_name[]" value="<?=$display_name_result->display_name?>"><input type="hidden" name="category_type[]" value="medium">Medium</td><td><input class="txtClass" type="text"  name="markup[]" id="markup<?=$srno;?>2" data-rate_id="<?=$srno;?>"  data-id="<?=$srno;?>2" data-toggle="markup" placeholder="MarkUp" ></td>
<td><input class="txtClass" type="text" readonly=""  name="GSP_MP[]" id="GSP_MP<?=$srno;?>2" data-rate_id="<?=$srno;?>" data-id="<?=$srno;?>2" data-toggle="markup" placeholder="GSP=MP" ></td>
                <td><input class="txtClass" type="text"  name="royalty[]" id="royalty<?=$srno;?>2" data-rate_id="<?=$srno;?>" data-id="<?=$srno;?>2" data-toggle="royalty" placeholder="Royalty" ></td>
       <td><input class="txtClass" type="text" readonly=""  name="sale__price[]" id="sale__price<?=$srno;?>2" data-rate_id="<?=$srno;?>"  data-id="<?=$srno;?>2" data-toggle="sale_price" placeholder="Sale Price" ></td></tr>
                          <tr><td><input type="hidden" name="rates[]" id="rates3<?=$srno?>"><input type="hidden" name="display_name[]" value="<?=$display_name_result->display_name?>"><input type="hidden" name="category_type[]" value="high">High</td><td><input class="txtClass" type="text"  name="markup[]" id="markup<?=$srno;?>3" data-rate_id="<?=$srno;?>" data-id="<?=$srno;?>3" data-toggle="markup" placeholder="MarkUp" ></td>
<td><input class="txtClass" type="text" readonly=""  name="GSP_MP[]" id="GSP_MP<?=$srno;?>3"  data-id="<?=$srno;?>3" data-rate_id="<?=$srno;?>" data-toggle="markup" placeholder="GSP=MP" ></td>
                <td><input class="txtClass" type="text"  name="royalty[]" id="royalty<?=$srno;?>3"  data-rate_id="<?=$srno;?>" data-id="<?=$srno;?>3"  data-toggle="royalty" placeholder="Royalty" ></td>
       <td><input class="txtClass" type="text" readonly=""  name="sale__price[]" id="sale__price<?=$srno;?>3" data-rate_id="<?=$srno;?>"  data-id="<?=$srno;?>3" data-toggle="sale_price" placeholder="Sale Price" ></td></tr>
                    
                    </table> </td>
                <?php 
         }elseif($filter_type=='FRM' || $filter_type=='MNT' ||$filter_type=='GLS'){
        ?>
             <td><table style="width: 100%;  border-top: 6px solid #f8f8f8;
    border-bottom: 3px solid #f8f8f8;">
                     <tr><td><input type="hidden" name="rates[]" id="rates1<?=$srno?>"><input type="hidden" name="display_name[]" value="<?=$display_name_result->display_name?>"><input class="txtClass" type="text"  name="markup[]" id="markup<?=$srno;?>1"  data-rate_id="<?=$srno;?>" data-id="<?=$srno;?>1" data-toggle="markup" placeholder="MarkUp" ></td>
       <td><input class="txtClass" type="text" readonly=""  name="sale__price[]" id="sale__price<?=$srno;?>1" data-rate_id="<?=$srno;?>"  data-id="<?=$srno;?>1" data-toggle="sale_price" placeholder="Sale Price" ></td></tr>
                         <tr><td><input type="hidden" name="rates[]" id="rates2<?=$srno?>"><input type="hidden" name="display_name[]" value="<?=$display_name_result->display_name?>"><input class="txtClass" type="text"  name="markup[]" id="markup<?=$srno;?>2" data-rate_id="<?=$srno;?>"  data-id="<?=$srno;?>2" data-toggle="markup" placeholder="MarkUp" ></td>
       <td><input class="txtClass" type="text" readonly=""  name="sale__price[]" id="sale__price<?=$srno;?>2" data-rate_id="<?=$srno;?>"  data-id="<?=$srno;?>2" data-toggle="sale_price" placeholder="Sale Price" ></td></tr>
                          <tr><td><input type="hidden" name="rates[]" id="rates3<?=$srno?>"><input type="hidden" name="display_name[]" value="<?=$display_name_result->display_name?>"><input class="txtClass" type="text"  name="markup[]" id="markup<?=$srno;?>3" data-rate_id="<?=$srno;?>" data-id="<?=$srno;?>3" data-toggle="markup" placeholder="MarkUp" ></td>
   <td><input class="txtClass" type="text" readonly=""  name="sale__price[]" id="sale__price<?=$srno;?>3" data-rate_id="<?=$srno;?>"  data-id="<?=$srno;?>3" data-toggle="sale_price" placeholder="Sale Price" ></td></tr>
                    
                 </table> </td> <td></td> 
         <?php }?>
      </tr> 
      <script>
      function add_rates<?=$srno?>()
      {
       var rates=$('#rate<?=$srno?>').val();
       document.getElementById('rates1<?=$srno?>').value=rates; 
       document.getElementById('rates2<?=$srno?>').value=rates; 
       document.getElementById('rates3<?=$srno?>').value=rates; 
      }
    
    $(document).on("blur",".c_txtClass", function () { 
    var low =$('#low').val();
     var medium =$('#medium').val();
     var high =$('#high').val();
       document.getElementById('markup<?=$srno?>1').value=low; 
       document.getElementById('markup<?=$srno?>2').value=medium; 
       document.getElementById('markup<?=$srno?>3').value=high; 
    });
    
    
          </script>
      <?php $srno++; endif; }?>
    </table><br>
       <input type="submit" class="bt-sbt-upload" name="upload_images" id="upload images" value="Save" style="float: right;"  onclick="return Validate_printer();" />  
        

<style> 
    .table_css{
        border-top: 6px solid #ffffff;
    border-bottom: 3px solid #ffffff;
}
    .txtClass{
        width: 80px;
    height: 30px; border-radius: 2px;
    }
    .c_txtClass{
        width: 117px;
    height: 24px; border-radius: 2px;
    }
    .tdClass{
    font-size: 18px;
    font-style: inherit;
    font-weight: 500;
    }
    .dropClass{
        text-align:center;
        height: 32px;
    width: 135px;
    }

	 </style>
</div>

<script>
    
   
  $(document).ready(function(){ 
    $(document).on("click", ".c_txtClass", function () {
     var myBookId = $(this).data('id');
      document.getElementById('markup1'+myBookId).value=code_gen;  
    });
    });
   
   
   $(document).on("blur", ".txtClass", function () {
     var click_id = $(this).data('id');
     var rate_id = $(this).data('rate_id');
     
     
     <?php if($filter_type=='printer'){?>
     
     var low_val= $('#low').val();
     var medium_val= $('#medium').val();
     var high_val= $('#high').val();
     var rate= $('#rate'+rate_id).val();
     
    var markup= $('#markup'+click_id).val();
     var royalty= $('#royalty'+click_id).val();
     
    if(low_val!='')
    {
     var GSP_MP=parseInt(low_val)+parseInt((rate*markup));
     //alert(GSP_MP);
      var sp=parseFloat(GSP_MP)/parseFloat((royalty));
      if(isNaN(sp)){
          sp='0.0';
     }else{
          sp=sp;
     }
     $('#sale__price'+click_id).val(sp);
     $('#GSP_MP'+click_id).val(GSP_MP);
     }else if(medium_val!='')
    {
        var GSP_MP=parseInt(medium_val)+parseInt((rate*markup));
        var sp=parseFloat(GSP_MP)/parseFloat((royalty));
      if(isNaN(sp)){
          sp='0.0';
     }else{
          sp=sp;
     }
     
     $('#sale__price'+click_id).val(sp);
     $('#GSP_MP'+click_id).val(GSP_MP);
     }else if(high_val!='')
    {
     var GSP_MP=parseInt(high_val)+parseInt((rate*markup));
     var sp=parseFloat(GSP_MP)/parseFloat((royalty));
      if(isNaN(sp)){
          sp='0.0';
     }else{
          sp=sp;
     }
     $('#sale__price'+click_id).val(sp);
     var GSP_MP=parseInt(high_val)+parseInt((rate*markup));
     $('#GSP_MP'+click_id).val(GSP_MP);
     }
     <?php }elseif($filter_type=='FRM' || $filter_type=='MNT' ||$filter_type=='GLS'){?>
        var rate= $('#rate'+rate_id).val();
        var markup= $('#markup'+click_id).val();
        var sp =parseFloat(rate+(rate*markup));
        $('#sale__price'+click_id).val(sp);

     <?php }?>
  
  
    });/// end main function
     function change_pricing()
     {
         
      var category_id=$('#category').val(); 
       if(category_id=='1')
       {
       
            var filter_name='printer';
        window.location.href="<?=base_url()?>index.php/backend/pricing?filter_by="+filter_name+'&category_id='+category_id; 
       }else if(category_id=='2')
       {   
        
           var filter_name='FRM';
          window.location.href="<?=base_url()?>index.php/backend/pricing?filter_by="+filter_name+'&category_id='+category_id;  
           
       }else if(category_id=='3')
       {
         
            var filter_name='MNT';
             window.location.href="<?=base_url()?>index.php/backend/pricing?filter_by="+filter_name+'&category_id='+category_id;  
           
       }else if(category_id=='4')
       {
         
            var filter_name='GLS';
             window.location.href="<?=base_url()?>index.php/backend/pricing?filter_by="+filter_name+'&category_id='+category_id;  
          
       }
         
         
      
         
         
     }
  
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

    </form>
    
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


