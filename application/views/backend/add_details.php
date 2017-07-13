<?php $frame_type=$_REQUEST['frame'];
 //$xx=$_REQUEST['action'];
 $f_name=$_REQUEST['f_name'];
?>

<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" /><link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script><script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script><script type="text/javascript" src="<?=base_url()?>assets/js/jquery.easing.1.3.js"></script><!--TOP MENU SCRIPT--><script type="text/javascript" src="<?=base_url()?>assets/js2/top-menu-script.js"></script><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Add Details</title></head><body><div id="middle-wrapper"><div class="main-hdr"> Add Details</div><div class="add-newcp">  <form class="add_main_category" name="add_main_category" action="#" method="post">    <span style="color: #006400;" id="success_result"></span>             <?php if($_REQUEST['action']=='print_paper'){?>    <table align="center">      <tr>        <td width="44%">Category Type</td>        <td width="56%"><select name="category" id="category" onChange="return change_values(this.value);" style="width:243px; height:33px;" class="inputbxs">            <option value="">--Select--</option>            <option value="1" <?php if($_REQUEST['category']==1){ echo 'selected'; }?> >Printing paper type</option>            <option value="2" <?php if($_REQUEST['category']==2){ echo 'selected'; }?>>Frame</option>            <option value="3" <?php if($_REQUEST['category']==3){ echo 'selected'; }?>>Glass</option>            <option value="4" <?php if($_REQUEST['category']==4){ echo 'selected'; }?>>Mount</option>          </select>        </td>      </tr>    
    
  
  <tr class="framediv" style="display:none;" >        <td id="lbl_frame"> Frame Type:</td>                <td><select name="frame" id="frame" class="inputbxs">                        <option value="">--Select--</option>                        <option <?php if($frame_type==1){echo "selected='selected'";}?> value="1">Synthetic frames</option>                         <option <?php if($frame_type==2){echo "selected='selected'";} ?> value="2">Wooden frames</option>                          <option <?php if($frame_type==3){echo "selected='selected'";}?>value="3">Streched Canvas Gallery Wrap</option>            </select></td>  
<input type="hidden" name="frame_type" id="frame_type" value="<?=$frame_type?>">

    </tr> 
	 <tr class="framediv" style="display:none;">        <td id="lbl_name"> Frame Category :</td>        <td><input type="text" value="<?=$f_name;?>" name="frame_cat" id="frame_cat" class="inputbxs"/></td>      </tr>
	 
	 
	     
		 <tr class="namerow">        <td id="lbl_name"> Paper Name :</td>        <td><input type="text" name="catname" id="catname" class="inputbxs"/></td>      </tr>
		 
	        
	<tr class="framediv" style="display:none;">        <td id="lbl_name"> Frame Name :</td>        <td><input type="text" name="frame_name"  id="frame_name" class="inputbxs"/></td>      </tr> 

	     <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><input type="button" id="save" value="save" name="savecategory" class="bt-sbt-upload"  ></td>      </tr>    </table>    <?php }else{?>    <table align="center">          <?php $print_paper=  $this->backend_model->get_print_papper();           ?>           <tr class="toptr print_paper">              <td><span >Print Paper</span></td>                      <td><select name="print_paper" id="print_paper" class="inputbxs" >                               <option value="">---Print Paper---</option>                              <?php foreach ($print_paper as $values):?>                              <option value="<?=$values->id;?>"><?=$values->print_paper;?></option>                              <?php endforeach;?>                  </select>                                      </td>          </tr>         <tr>        <td> Roll:</td>        <td><input type="text" name="roll" id="roll" class="inputbxs"/></td>      </tr>            <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><input type="button" onClick="return redirect();" id="roll_save" value="save" name="savecategory" class="bt-sbt-upload"  ></td>      </tr>    </table>    <?php }?>  </form></div></body></html><script> $(document).on('click','#roll_save',function(){             var roll=$('#roll').val();        var print_paper=$('#print_paper').val();       $.ajax({           type:'post',           url: 'save_details',           data:'print_paper='+print_paper+'&roll='+roll,           success:function(response){                             if(response=='1'){                                      $('#success_result').html('Info add successfully');                                  }else{                  $('#success_result').html('ccredential error');               }           }                  });           });                function timeout(){        window.location.href="<?=base_url()?>/index.php/backend/web_pricing";    }        $(document).ready(function(){        $('#roll_tr').hide();          $('.frame').hide();     });     
		 $(document).on('click','#save',function(){
		 //alert('ggg')              
		 var category=$('#category').val();  
	var frame_types=$('#frame_type').val();
	var frame_cat=$('#frame_cat').val();
	//alert(frame_types)
	//alert(category)
	      var catname=$('#catname').val();
		  var paper_type=$('#paper_type').val();
		  var pap_name=$('#pap_name').val();
		  var dis_name=$('#dis_name').val();
		  
		  
		          var frame=$('#frame').val();         var frame_name=$('#frame_name').val();         if(category=='2'){ 
		     //  alert(category)
			  
		            var url= 'category='+category+'&catname='+catname+'&frame='+frame;     
					//alert(url)                   
					}
					
					
					else{     url= 'category='+category+'&catname='+catname+'&paper_type='+paper_type+'&dis_name='+dis_name;   }   
					
					     $.ajax({           type:'post',           url: '<?=base_url()?>index.php/backend/save_details',           data:url,           success:function(response){                            
				//alert(response);
					 if(response=='1'){      
		             $('#success_result').html('Info add successfully');        }
					 else{       $('#success_result').html('ccredential error');               }           }                  });           });            
					 
					 function change_values(values){               if(values=='1'){           $('#lbl_name').html('Print papper');            $('#roll_tr').show();             $('.frame').hide();         }                if(values=='2'){                  $('#lbl_name').html('Frame Category');          $('#roll_tr').hide();           $('.frame').show();         }        if(values=='3'){                     $('#lbl_name').html('Glass Name');           $('#roll_tr').hide();            $('.frame').hide();         }if(values=='4'){                     $('#lbl_name').html('Mount Name');          $('#roll_tr').hide();         }    } 
					
					$(document).ready(function(){
					
					
					  var category=$('#category').val(); 
					  if(category==2){
					$('.framediv').show();
					$('.namerow').hide();
					}
					});
					       </script>