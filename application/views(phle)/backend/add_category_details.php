<?php


$this->load->library('multipledb'); // loading library.

// Loading second db and running query.
$CI = &get_instance();
//setting the second parameter to TRUE (Boolean) the function will return the database object.
$this->indiapicture = $CI->load->database('indiapicture', TRUE);


$qry = $this->indiapicture->query("SELECT DISTINCT collection_range FROM tbl_category where portal='2' order by collection_range asc");
$collection=$qry->result();

?>
  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> Add web price details</div>
    <div class="add-newcp"><span id="success_result" style="color:#F00;font-size:16px"><?php 
     if($msg<>'')
     {print $msg;
         ?>
            <script>setTimeout(function(){ outTime1()},2500);
                function outTime(){
                   window.location.href="add_framer";
                }
            </script><?php
     }
    ?></span>
     <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_price?search=collection"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      <form action="#" id="add_printer_form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="package_code" value="<?=$package_code;?>">
          
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
         
          <tr>
            <td width="44%">Category Type</td>
            <td width="56%"><select name="category" id="category" onchange="return change_values(this.value);" style="width:243px; height:33px;" class="inputbxs">
            <option value="">--Select--</option>
            <option value="1">Printing paper type</option>
                <option value="2">Frame</option>
                <option value="3">Glass</option>
                <option value="4">Mount</option>
              </select>
            </td>
          </tr>
          
          <tr class="frame_category">
        <td > Frame Type:</td>
        <td><select name="frame" id="frame" class="inputbxs"  onchange="return get_frame_category(this.value);">
                        <option value="">--Select--</option>
                        <option value="1">Synthetic frames</option>
                         <option value="2">Wooden frames</option>
                          <option value="3">Streched Canvas Gallery Wrap</option>
            </select></td>
      </tr>

      
          <tr style="background:#e5e5e5" id="print_papper">
            <td><span id="lbl_name">Name</span></td>
                    <td class="remove_add"><select name="name" id="name" class="inputbxs">
                            <option value="">--Select--</option>
                        </select> 
                        <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/add_details?action=print_paper');" id="lbl"></a></td>
          </tr>


<tr class="toptr print_paper">
              <td><span >Paper Type</span></td>
                      <td> <select name="" id="paper_type" class="inputbxs">
                            <option value="Archival">Archival</option>
							<option value="Archival">Standard</option>
                        </select>
</td>
					  </tr>
					  <tr class="toptr print_paper">
              <td><span >Display Name :</span></td>
                      <td> <input type="text" name="dis_name" id="dis_name" class="inputbxs" >
</td>
					  </tr>

           <tr class="toptr print_paper">
              <td><span >Quality</span></td>
                      
			
			 <td > <select name="quality" id="quality" class="inputbxs" >
                               <option value="">---Select Quality---</option>
                              <?php foreach ($collection as $values):?>
                              <option value="<?=$values->collection_range;?>"><?=$values->collection_range;?></option>

                              <?php endforeach;?>
                  </select></td>
          </tr>  
          
          
         <!-- <tr class="toptr ">
              <td><span >Roll Size</span></td>
                      <td><select name="roll" id="roll" class="inputbxs" >
                               <option value="">---Select Roll Size---</option>
                              <?php foreach ($roll as $values):?>
                              <option value="<?=$values->roll;?>"><?=$values->roll;?></option>
                              <?php endforeach;?>
                  </select>
                          <a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/add_details?action=roll');" >Add Roll</a>
             </td>
          </tr>  
          
        -->  
          
          
          
          
          
          
          
          <tr  class="frame_category">
              <td><span >Frame Name</span></td>
            <td>
                <input type="text" name="frame_name" id="frame_name" class="inputbxs" >
                  
                 
             </td>
          </tr>
		   <tr  class="frame_category">
              <td><span >Frame Code</span></td>
            <td>
                <input type="text" name="frame_code" id="frame_code" class="inputbxs" >
                             
             </td>
          </tr>
		   <tr  class="frame_category">
              <td><span >Frame Color</span></td>
            <td>
                <input type="text" name="frame_color" id="frame_color" class="inputbxs" >
                             
             </td>
          </tr>
		   <tr  class="frame_category">
              <td><span >Frame Size(mm)</span></td>
            <td>
                <input type="text" name="frame_size" id="frame_size" class="inputbxs" >
                             
             </td>
          </tr>
		   <tr  class="mount_category">
              <td><span >Mount Code</span></td>
            <td>
                <input type="text" name="mount_code" id="mount_code" class="inputbxs" >
                             
             </td>
          </tr>
          <tr  class="mount_category">
              <td><span >Mount Height</span></td>
            <td>
                <input type="text" name="mount_height" id="mount_height" class="inputbxs" >
                             
             </td>
          </tr>
          <tr  class="mount_category">
              <td><span >Mount Width</span></td>
            <td>
                <input type="text" name="mount_width" id="mount_width" class="inputbxs" >
                             
             </td>
          </tr>
          
          
          <tr  class="toptr">
              <td><span id="lbl_rate">Rate</span></td>
            <td><input type="text" name="rate" id="rate" class="inputbxs" />
             </td>
          </tr>
          
          <tr class="toptr">
              <td></td>
              <td><input type="button" name="save" id="save" value="Save" class="bt-sbt-upload" />
             </td>
          </tr>
         
       </table>      
       
       
          
           
          <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
<!--MIDDLE PAGE WRAPPER ENDS-->

<script>
    $(document).ready(function(){
         $('.collection').hide();
         $('.print_paper').hide();
         $('.frame_category').hide();
         $('#lbl').html('--');
		 $('#show_old_quality').show();
		 $('#quality_show').hide();
		 $('.mount_category').hide();
    });
    
    function get_frame_category(values){
	  //= $('#dependency').html(values);
         
        $.ajax({
           type:'post',
           url: 'get_frame_category_details',
           data:'values='+values,
           success:function(response){
		  // alert(response)
              $('#name').html(response);
               
           }
           
       });
        
    }
    
    
    
    function get_frame_name(values){
         
        $.ajax({
           type:'post',
           url: '<?=base_url()?>index.php/backend/get_frame_name_details',
           data:'values='+values,
           success:function(response){
		   //alert(response)
              $('#frame_name').html(response);
               
           }
           
       });	
        
    }
    
    
    function change_rate(values){
        if(values=='2'){
          
           $('#lbl_rate').html('Market Rate'); 
           $('.collection').hide();
          
        }if(values=='1'){
           $('.collection').show();
           $('#lbl_rate').html('Collection Rate'); 
           
        }
        
    }
    function change_values(values){
       
        if(values=='1'){
           $('#lbl_name').html('Printing papper Name'); 
           $('#lbl_rate').html('Printing papper Rate'); 
           $('.print_paper').show();
		    $('#lbl').show();
           $('.frame_category').hide();
           $('#lbl').html('Add Print Paper');
		   $('.remove_add').html('<select name="name" id="name" onchange="return get_frame_name(this.value);"class="inputbxs setinput"> </select><a href="JavaScript:newPopup(<?php echo base_url();?>index.php/backend/add_details?action=print_paper);" id="lbl">Add Print Paper</a>');
		   $('#lbl').attr("href","JavaScript:newPopup('<?php echo base_url();?>index.php/backend/add_details?action=print_paper');");
           $('.mount_category').hide();
        }
        
        if(values=='2'){
	
           //$('#lbl').html('Add Frame Cat. and Name');
		   // $('#lbl').show();
           $('#lbl_name').html('Frame Catagory'); 
           $('#lbl_rate').html('Frame Rate'); 
           $('.print_paper').hide();
           $('.frame_category').show();
		   $('.remove_add').html('<select name="name" id="name" onchange="return get_frame_name(this.value);"class="inputbxs setinput"> </select>');
         //  $('#print_papper').hide();
		 $('.mount_category').hide();
        }
        if(values=='3'){
            
           $('#lbl_name').html('Glass Name'); 
           $('#lbl_rate').html('Glass Rate'); 
           $('.print_paper').hide();
            $('.frame_category').hide();
			$('#lbl').hide();
			$('.remove_add').html('<input type="text" name="name" id="name" class="inputbxs">');
			$('.mount_category').hide();
        }if(values=='4'){
            //$('#lbl').hide();;;
			//$("#name").remove();
			//$("#name").add();
			$('.remove_add').html('<input type="text" name="name" id="name" class="inputbxs">');
			
			
           $('#lbl_name').html('Mount Name'); 
           $('#lbl_rate').html('Mount Rate'); 
           $('.print_paper').hide();
           $('.frame_category').hide();
		   $('.mount_category').show();
		   
        }
        
        
        
        $.ajax({
           type:'post',
           url: 'get_add_details',
           data:'values='+values,
           success:function(response){
		 //  alert(response)
              $('#name').html(response);
               
           }
           
       });
        
        
        
        
    }
	
	
	
	
	
    $(document).on('click','#save',function(){
      
        var collection=$('#collection').val();
		 var category=$('#category').val();
        var frame_category=$('#category').val();
        var name=$('#name').val();
       var roll=$('#roll').val();
	    var roll=$('#roll').val();
       var rate=$('#rate').val();
	   var quality=$('#quality').val();
	   var paper_type=$('#paper_type').val();
	   var dis_name=$('#dis_name').val();
	   var frame_code=$('#frame_code').val();
	    var frame_color=$('#frame_color').val();
		 var frame_size=$('#frame_size').val();
		 var convert=(frame_size/25.4);
	     var frame_size_inch=Math.round(convert);
       var frame_name=$('#frame_name').val();
	   var frame=$('#frame').val();
	   var mount_code=$('#mount_code').val();
	   var mount_height=$('#mount_height').val();
	   var mount_width=$('#mount_width').val();
	   
	 //alert(mount_code)
	   
       if(category=='1'){
           var url='collection='+collection+'&quality='+quality+'&category='+category+'&name='+name+'&rate='+rate+'&roll='+roll+'&paper_type='+paper_type+'&dis_name='+dis_name;
       }else{
        url='category='+category+'&name='+name+'&rate='+rate+'&frame_category='+frame_category+'&frame_name='+frame_name+'&frame_code='+frame_code+'&frame_color='+frame_color+'&frame_size='+frame_size+'&frame_size_inch='+frame_size_inch+'&frame='+frame+'&mount_code='+mount_code+'&mount_height='+mount_height+'&mount_width='+mount_width;
		//alert(url)    
       }
       
       $.ajax({
           type:'post',
           url: '<?=base_url()?>index.php/backend/save_category_details',
           data:url,
           success:function(response){
            
//alert(response);
               if(response=='1'){
                   $('#success_result').html('Info add successfully');
				   location.reload();
               }else{
                  $('#success_result').html('credential error');
               }
           }
           
       });
       
    });
    
    //calculate the time before calling the function in window.onload
  var popupWindow;
    function newPopup(url) {
	//alert('saya')
	
        var category=$('#category').val();
		var frame=$('#frame').val();
		var f_name=$('#name').val();
		//alert(frame);
        popupWindow = window.open(url+'&category='+category+'&frame='+frame+'&f_name='+f_name,'popUpWindow','height=500,width=450,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    popupWindow.focus();
    }    

function filter_quality(values){
	 $('#show_old_quality').hide();
	 $('#quality_show').show();
	 $.ajax({
           type:'post',
           url: '<?=base_url()?>index.php/backend/get_quality',
           data:'collection='+values,
           success:function(response){
		   
		    if(response!=''){
              
			  
			   $('#quality_show').html(response);
			    
              }
		   }
           
       });
	
	}


    </script>
    
    
