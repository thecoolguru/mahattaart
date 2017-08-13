
<div id="middle-wrapper">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">
  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
  <div id="middle-container">
    <?//$_GET['product_type'];?>
    <div class="main-hdr">
      <?php if(isset($_REQUEST['edit_id'])){echo 'Edit Home Info';}else{ echo 'Add Home Info';}?>
      <a href="<?=base_url()?>index.php/backend/view_header_images">
      <input type="button" class="bt-add"  name="submit" value="View All" style="font-size: 16px; float: left; width: 150px; float: right"  >
      </a> </div>
    <div class="add-newcp"><span style="color:#F00">
      <?php   print $msg; if($msg<>''){
    ?>
      <script>
    setTimeout(function(){ redrect_url()},2000);
    </script>
      <?
}?>
      </span>
      <form name="content_form" action="<?=base_url()?>index.php/backend/save_upload_header_images" method="post" id="content_form" enctype="multipart/form-data">
        <?php  if(isset($_REQUEST['edit_id'])){?>
        <input type="hidden" name="edit_id" value="<?=$edit_id[0]->id?>">
        <input type="hidden" name="search" value="<?=$_REQUEST['search']?>">
        <?php }?>
        <table style="width: 50%;">
          <tr>
            <td>Home Images</td>
            <td>Header Menu:&nbsp;
              <input  <?php if($_REQUEST['search']=='menu'){ echo 'checked';}else{ echo 'checked';}?> id="menu" type="radio" name="radio" value="menu" onClick="return show_hide('menu');">
              &nbsp;Top Category&nbsp;
              <input type="radio" id="top" name="radio" <?php if($_REQUEST['search']=='top category'){ echo 'checked';}?>  value="top_cat" onClick="return show_hide('top category');">
              Bottom Slider&nbsp;
              <input type="radio" <?php if($_REQUEST['search']=='bottom'){ echo 'checked';}?> id="bottom" name="radio" value="bottom" onClick="return show_hide('bottom');">
              Bottom Top&nbsp;
              <input type="radio" id="bottom_top" name="radio" value="bottom top"  <?php if($_REQUEST['search']=='bottom top'){ echo 'checked';}?> onClick="return show_hide('bottom top');">
            </td>
          </tr>
          <tr id="menu_cat">
            <td>Category</td>
            <td><select name="category" onChange="return show_uploads(this.value);" id="category" style="    width: 51%;
    height: 37px;">
                <option value="0">---Select Category---</option>
                <option value="1" <?php if($edit_id[0]->cat_id=='1'){ echo 'selected';}?>>Subjects</option>
                <option value="2" <?php if($edit_id[0]->cat_id=='2'){ echo 'selected';}?>>Artists</option>
                <option value="3" <?php if($edit_id[0]->cat_id=='3'){ echo 'selected';}?>>Art Styles</option>
                <option value="4" <?php if($edit_id[0]->cat_id=='4'){ echo 'selected';}?>>Products</option>
                <option value="5" <?php if($edit_id[0]->cat_id=='5'){ echo 'selected';}?>>Collections</option>
                <option value="6" <?php if($edit_id[0]->cat_id=='6'){ echo 'selected';}?>>Rooms</option>
                <option value="7" <?php if($edit_id[0]->cat_id=='7'){ echo 'selected';}?>>Places</option>
                <option value="8" <?php if($edit_id[0]->cat_id=='8'){ echo 'selected';}?>>Themes</option>
                <option value="9" <?php if($edit_id[0]->cat_id=='9'){ echo 'selected';}?>>WallsnArt Designs</option>
              </select>
            </td>
          </tr>
          <tr id="top_cat">
            <td>Top Category</td>
            <td><?php if($top_category[0]->id<>''){?>
              <select name="top_category" id="top_category" style="width: 51%;
    height: 37px;">
                <option value="0">---Select Category---</option>
                <option value="1" <?php if($edit_id[0]->cat_id=='1'){ echo 'selected';}?>>Subjects</option>
              </select>
              <?php }else{?>
              <select name="noofimage" id="noofimage" style="    width: 51%;
    height: 37px;">
                <option value="0">---Select Image No.---</option>
                <? for($i=1;$i<=10;$i++){?>
                <option value="<?=$i?>" <?php if($edit_id[0]->image_no==$i){ echo 'selected';}?>>
                <?='Image No. '.$i?>
                </option>
                <? }?>
              </select>
              <input type="hidden" name="top_category"  readonly="" value="top category" style="width: 51%;
    height: 37px;">
              <?php }?>
            </td>
          </tr>
          <tr id="bottom_cat">
            <td>Bottom Slider</td>
            <td><input type="text" name="Bottom"  readonly="" value="Bottom" style="width: 51%;
    height: 37px;">
            </td>
          </tr>
          <tr id="bottom_cat_top">
            <td>Bottom Top</td>
            <td><input type="text" name="bottom_top"  readonly="" value="bottom top" style="width: 51%;
    height: 37px;">
            </td>
          </tr>
          <tr>
            <td>Title</td>
            <td><input type="text" name="title" <?php if(isset($_REQUEST['edit_id'])){ ?>value="<?=$edit_id[0]->title;?>" <?php }?>  style="width: 51%;
    height: 37px;" id="title"></td>
          </tr>
          <tr id="option">
            <td>Optional</td>
            <td>Keyword:&nbsp;
              <input type="radio" name="option" onClick="return option_action('1');"  checked="checked" value="1">
              &nbsp;Gallery&nbsp;
              <input type="radio" onClick="return option_action('2');"  name="option" value="2"></td>
          </tr>
          <?php $split= split('?',$edit_id[0]->keyword); echo $split[1];?>
		  <tr id="search_div">
            <td>Search <input type="hidden" id="search_logic_val" value="<?=$edit_id[0]->search_logic?>" /></td>
            <td> <select name="search_logic" onChange="search_logic_fun(this.value)" id="search_logic" style="width: 51%;
    height: 37px;">
               
                <option value="1" >All</option>
				<option value="2" >Any</option>
				</select></td>
          </tr>
		  
          <tr id="keyword">
            <td>Keyword </td>
			
            <td id="keyword_td"><input type="text" name="keyword" <?php if(isset($_REQUEST['edit_id'])){ ?>value="<?=$edit_id[0]->keyword;?>" <?php }?>  style="    width: 51%;
    height: 37px;" id="title"></td>
	<td style="display:none" id="keyword_any_td"><textarea name="keyword_any" cols="28" rows="4"><?php if(isset($_REQUEST['edit_id'])){ echo $edit_id[0]->keyword_any;}?>
</textarea></td>
          </tr>
		    <tr id="minus_div">
            <td>Minus  <input type="checkbox" id="minus" style="margin-left:20px;" value="<?php echo $edit_id[0]->minus_logic;?>" onClick="return show_uploads();"/></td>
			<td style="display:none" id="keyword_minus_td"><textarea name="keyword_minus" cols="28" rows="4"><?php if(isset($_REQUEST['edit_id'])){ echo $edit_id[0]->minus_keyword;}?>
</textarea></td>
<input type="hidden" class="checkbox" value="" name="minus_logic" />
			</tr>
          <tr id="gallery">
            <td>Gallery </td>
            <td><select id="gallery" name="gallery"  class="selectpicker" data-hide-disabled="true" data-live-search="true">
                <optgroup  >
                <option value="">--Select Gallery--</option>
                </optgroup>
                <?php foreach ($gallery as $result):
 if($result->lightbox_name!='0' && $result->lightbox_name!=''){
?>
                <option value="<?=$result->lightbox_id?>">
                <?=$result->lightbox_name;?>
                </option>
                <?php }endforeach;?>
              </select>
            </td>
          </tr>
          <tr id="bottom_cat_top_desc">
            <td>Description</td>
            <td><textarea name="desc" cols="28" rows="4"><?php if(isset($_REQUEST['edit_id'])){ echo $edit_id[0]->description;}?>
</textarea>
            </td>
          </tr>
          <tr id="field1">
            <td>Other Detail</td>
            <td><textarea name="field1" cols="28" rows="4"><?php if(isset($_REQUEST['edit_id'])){ echo $edit_id[0]->field1;}?>
</textarea>
            </td>
          </tr>
          <tr class="file">
            <td valign="top"><br>
              Image</td>
            <td><?php if(isset($_REQUEST['edit_id'])){?>
              <input type="hidden" name="edit_file" id="file" value="<?=$edit_id[0]->image?>">
              <?php }?>
              <input type="file" name="file" id="file">
              <?php if(isset($_REQUEST['edit_id'])){?>
              &nbsp;<img src="<?=base_url()?><?=$edit_id[0]->image?>" height="80px;" width="80px;">
              <?php }?>
            </td>
          </tr>
          <tr>
            <td>Menu Image:</td>
            <td><?php if(isset($_REQUEST['edit_id'])){?>
              <input type="hidden" name="edit_menu_image" id="edit_menu_image" value="<?=$edit_id[0]->menu_image?>">
              <?php }?>
              <input type="file" name="menu_image" id="menu_image">
              <?php if(isset($_REQUEST['edit_id'])){?>
              &nbsp;
              <?php if($edit_id[0]->menu_image<>''){?>
              <img src="<?=base_url()?><?=$edit_id[0]->menu_image?>" height="80px;" width="80px;">
              <?php }}?>
              <br>
              <br>
            </td>
          </tr>
          <tr class="file_upload">
            <td valign="top">Image</td>
            <td><?php if(isset($_REQUEST['edit_id'])){?>
              <input type="hidden" name="edit_file1" id="edit_file1" value="<?=$edit_id[0]->image?>">
              <input type="hidden" name="edit_file2" id="edit_file2" value="<?=$edit_id[0]->image2?>">
              <input type="hidden" name="edit_file3" id="edit_file3" value="<?=$edit_id[0]->image3?>">
              <input type="hidden" name="edit_file4" id="edit_file4" value="<?=$edit_id[0]->image4?>">
              <input type="hidden" name="edit_file5" id="edit_file5" value="<?=$edit_id[0]->image5?>">
              <?php }?>
              <input type="file" name="file1" id="file1">
              <?php if(isset($_REQUEST['edit_id'])){?>
              &nbsp;
              <?php if($edit_id[0]->image<>''){?>
              <img src="<?=base_url()?><?=$edit_id[0]->image?>" height="80px;" width="80px;">
              <?php }}?>
              <br>
              <br>
              <input type="file" name="file2" id="file2">
              <?php if(isset($_REQUEST['edit_id'])){?>
              &nbsp;
              <?php if($edit_id[0]->image2<>''){?>
              <img src="<?=base_url()?><?=$edit_id[0]->image2?>" height="80px;" width="80px;">
              <?php }}?>
              <br>
              <br>
              <input type="file" name="file3" id="file3">
              <?php if(isset($_REQUEST['edit_id'])){?>
              &nbsp;
              <?php if($edit_id[0]->image3<>''){?>
              <img src="<?=base_url()?><?=$edit_id[0]->image3?>" height="80px;" width="80px;">
              <?php }}?>
              <br>
              <br>
              <input type="file" name="file4" id="file4">
              <?php if(isset($_REQUEST['edit_id'])){?>
              &nbsp;
              <?php if($edit_id[0]->image4<>''){?>
              <img src="<?=base_url()?><?=$edit_id[0]->image4?>" height="80px;" width="80px;">
              <?php }}?>
              <br>
              <br>
              <input type="file" name="file5" id="file5">
              <?php if(isset($_REQUEST['edit_id'])){?>
              &nbsp;
              <?php if($edit_id[0]->image5<>''){?>
              <img src="<?=base_url()?><?=$edit_id[0]->image5?>" height="80px;" width="80px;">
              <?php }}?>
              <br>
            </td>
          </tr>
          <tr>
            <td>Status</td>
            <td><select name="status" id="status"  style="    width: 51%;
                    height: 37px;" >
                <option value="1">Active</option>
                <option value="0">DeActive</option>
              </select></td>
          </tr>
          <tr class="toptr">
            <td></td>
            <td><input type="submit" class="bt-add" onClick="return formValidate();" name="submit" value="<?php if(isset($_REQUEST['edit_id'])){ echo 'Edit';}else{ echo 'Save';}?>" style="font-size: 16px; float: left;"  ></td>
          </tr>
        </table>
      </form>
      <input type="hidden" name="category_type" id="category_type" value="<?=$_REQUEST['search']?>">
      <style>
    .txt{width: 217px;
    height: 37px;
    border-radius: 5px;}
    </style>
      <script>
 
 function option_action(value){
       if(value=='1'){
	     $('#keyword').show();
		 $('#gallery').hide();
	   }else if(value=='2'){
	     $('#keyword').hide();
		 $('#gallery').show();
	   }
 }// end function 
 
 
 
    $(document).ready(function(){ 
    $('.file_upload').hide();
    $('.file').show();
     $('#bottom_cat').hide();
      $('#bottom_cat_top').hide();
      $('#field1').hide();
	   $('#option').hide();
	    $('#gallery').hide();
		$('#top_cat').hide();
		
	  if($('#minus').val()==1){
	//  alert('ll')
	  $('#minus').trigger('click');
	  }if($('#search_logic_val').val()==2){
	  $('#search_logic').val(2).trigger('change');
	  }
      
     var values= $( "#category option:selected" ).val();
    var type=$('#category_type').val();
     if(values==3){
           $('.file_upload').show();  
             $('.file').hide();
             $('#file1').show();
             $('#file2').show();
             $('#file3').show();
             $('#file4').show();
             $('#file5').show();
             $('#edit_file1').show();
             $('#edit_file2').show();
             $('#edit_file3').show();
             $('#edit_file4').show();
             $('#edit_file5').show();
			 $('#option').hide();
        }else if(values==6){
          $('.file_upload').show();  
             $('.file').hide();
             $('#file1').show();
             $('#file2').show();
             $('#file3').show();
             $('#file4').hide();
             $('#file5').hide();
             $('#edit_file1').show();
             $('#edit_file2').show();
             $('#edit_file3').show();
             $('#edit_file4').hide();
             $('#edit_file5').hide();
			 $('#option').show();
             
        }else if(values==7){
          $('.file_upload').show();  
             $('.file').hide();
             $('#file1').show();
             $('#file2').show();
             $('#file3').hide();
             $('#file4').hide();
             $('#file5').hide();
             $('#edit_file1').show();
             $('#edit_file2').show();
             $('#edit_file3').hide();
             $('#edit_file4').hide();
             $('#edit_file5').hide();
			 $('#option').hide();
             

        }else{
            
           $('.file_upload').hide();  
             $('.file').show();
			 $('#option').hide();
             
        
            
        } 
      
       
       
       
       if(type=='menu'){
              $('#field1').hide();
            $('#menu_cat').show();
            $('#top_cat').hide();
              $('#bottom_cat').hide();
              $('#bottom_cat_top').hide();
               $('#bottom_cat_top_desc').hide();
        }else if(type=='top category'){
            $('#top_cat').show();
            $('#menu_cat').hide();
              $('#field1').hide();
              $('#bottom_cat').hide();
              $('#bottom_cat_top').hide();
               $('#bottom_cat_top_desc').hide();
        }
        else if(type=='bottom'){
            $('#top_cat').hide();
              $('#bottom_cat').show();
            $('#menu_cat').hide();
            $('#bottom_cat_top').hide();
             $('#bottom_cat_top_desc').hide();
               $('#field1').hide();
        }else  if(type=='bottom top'){
            $('#top_cat').hide();
            $('#field1').show();
              $('#bottom_cat').hide();
            $('#menu_cat').hide();
            $('#bottom_cat_top').show();
             $('#bottom_cat_top_desc').show();
        }
       
       
       
    });
	
	
    function show_hide(type){
        
        if(type=='menu'){
              $('#field1').hide();
            $('#menu_cat').show();
            $('#top_cat').hide();
              $('#bottom_cat').hide();
              $('#bottom_cat_top').hide();
               $('#bottom_cat_top_desc').hide();
			     $('#option').hode();
			   
        }else if(type=='top category'){
            $('#top_cat').show();
            $('#menu_cat').hide();
              $('#field1').hide();
              $('#bottom_cat').hide();
              $('#bottom_cat_top').hide();
               $('#bottom_cat_top_desc').hide();
			     $('#option').hode();
        }
        else if(type=='bottom'){
            $('#top_cat').hide();
              $('#bottom_cat').show();
            $('#menu_cat').hide();
            $('#bottom_cat_top').hide();
             $('#bottom_cat_top_desc').hide();
               $('#field1').hide();
			   $('#option').hode();
        }else  if(type=='bottom top'){
            $('#top_cat').hide();
            $('#field1').show();
              $('#bottom_cat').hide();
            $('#menu_cat').hide();
            $('#bottom_cat_top').show();
             $('#bottom_cat_top_desc').show();
			 $('#option').show();
        }
    }
 
    function show_uploads(values){
	    
        if($("input[type='checkbox']").prop("checked")){
		
		$('#keyword_minus_td').show();
		$('.checkbox').val(1);
		}else{
		//alert('no')
		$('#keyword_minus_td').hide();
		$('.checkbox').val(0);
		}
        if(values==3){
           $('.file_upload').show();  
             $('.file').hide();
             $('#file1').show();
             $('#file2').show();
             $('#file3').show();
             $('#file4').show();
             $('#file5').show();
             $('#edit_file1').show();
             $('#edit_file2').show();
             $('#edit_file3').show();
             $('#edit_file4').show();
             $('#edit_file5').show();
			 $('#option').hide();
        }else if(values==6){
          $('.file_upload').show();  
             $('.file').hide();
             $('#file1').show();
             $('#file2').show();
             $('#file3').show();
             $('#file4').hide();
             $('#file5').hide();
             $('#edit_file1').show();
             $('#edit_file2').show();
             $('#edit_file3').show();
             $('#edit_file4').hide();
             $('#edit_file5').hide();
			 $('#option').show();
             
        }else if(values==7){
          $('.file_upload').show();  
             $('.file').hide();
             $('#file1').show();
             $('#file2').show();
             $('#file3').hide();
             $('#file4').hide();
             $('#file5').hide();
             $('#edit_file1').show();
             $('#edit_file2').show();
             $('#edit_file3').hide();
             $('#edit_file4').hide();
             $('#edit_file5').hide();
			 $('#option').hide();
             
        }else{
            
           $('.file_upload').hide();  
             $('.file').show();
			 $('#option').hide();
             
        
            
        }
        
    }
    
    function redrect_url(){
        <?php 
        if(isset($_REQUEST['edit_id']) && $_REQUEST['edit_id']<>'')
        {
            $edit_id=$_REQUEST['edit_id'];
            $redirect="upload_upload?search=$search&edit_id=$edit_id";
        }else if(!isset($_REQUEST['edit_id']) && $_REQUEST['edit_id']==''){
            $redirect='view_header_images';
        }
        
        ?>
        window.location.href="<?=base_url()?>index.php/backend/<?=$redirect?>";
    }
    function formValidate()
    {
        
      
      
//        if($('#top_category').val()=='0')
//        {
//            alert('Please Select category');
//            $('#top_category').focus();
//            return false;
//        }
        
        if($('#title').val()=='')
        {
            alert('Please enter Image Title');
            $('#title').focus();
            return false;
        }
        <?php if(!isset($_REQUEST['edit_id'])){?>
//        if($('#file').val()=='')
//        {
//            alert('Please Choose image to header upload');
//            $('#file').focus();
//            return false;
//        }
        
       
        
        <?php }?>
        
    }// end function
	function search_logic_fun(values){
 //alert(values)
 if(values==1){
		//alert(values)
		$('#keyword_td').show();
		$('#keyword_any_td').hide();
		}else if(values==2){
		$('#keyword_any_td').show();
		$('#keyword_td').hide();
		//alert(values)
		}
		
 //alert('jiii')
 }
    </script>
      <BR>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
<style>
    #header{text-align: center;
    color:#000;
    font-size: 14px;
    font-weight: bold;
    }
</style>
<!--MIDDLE PAGE WRAPPER ENDS-->
</div>
