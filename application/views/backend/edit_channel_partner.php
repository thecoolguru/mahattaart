
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type = "text/javascript">
function show_popup(a)
{
  //alert(a);
$("#number-"+a).show(400);
$("#number-"+a).css('display','block');
$("#overlay-bx").show();
}

$(document).ready(function(){
var a=$("#commission").val();
if(a=="low"|| a=="mid"||a=="high"||a=="other")
{$("#number-"+a).show(400);
$("#number-"+a).css('display','block');
$("#overlay-bx").show();
}
			
		$("#channel_partner_form").submit(function(){
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;var a=$('#fname5').val();var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
      if($('#fname15').val()=="")
      {
           $('#name_error').html("Enter Name");
           return false;
      }
				else if(	$('#fname3').val()=="")
				{
          $('#name_error').html("");
					
					$('#password_error').html("Enter Password");
					return false;
				}
				
				else if($('#fname5').val().length !=4)
				{
            
					   $('#name_error').html("");
					   $('#password_error').html("");
					
					   $('#cp_id_error').html("Enter only 4 Digit CP Id");
					   return false;
             
          
				}
       
				else if($('#fname6').val()=="")
				{
          $('#name_error').html("");
					$('#password_error').html("");
					
					$('#cp_id_error').html("");
					$('#fname_error').html("Enter First Name");
					return false;
				}
				else if($('#fname7').val()=="")
				{
					$('#password_error').html("");
					$('#name_error').html("");
					$('#cp_id_error').html("");
					$('#fname_error').html("");
					$('#lname_error').html("Enter Last Name");
					return false;
				}
				else if($('#fname2').val()=="")
				{
					$('#password_error').html("");
					$('#name_error').html("");
					$('#cp_id_error').html("");
					$('#fname_error').html("");
					$('#lname_error').html("");
					$('#city_error').html("Enter City");
					return false;
				}
				else if($('#fname11').val()=="")
				{
					$('#password_error').html("");
					$('#name_error').html("");
					$('#cp_id_error').html("");
					$('#fname_error').html("");
					$('#lname_error').html("");
					$('#city_error').html("");
					$('#email_error').html("Enter Email");
					return false;
				}
				else if(!emailReg.test($('#fname11').val()))
				 	{
					$('#password_error').html("");
					$('#name_error').html("");
					$('#cp_id_error').html("");
					$('#fname_error').html("");
					$('#lname_error').html("");
					$('#city_error').html("");
				 		$('#email_error').html("Enter a valid email");
				 		
					 	return false;
				 	}	
         
         else if($('#pdf_file').val()!="")
        {
          var pdf = $('#pdf_file').val();
                var x=pdf.split(".");
                 
                
          if((x['1']!='pdf'))
        { 
         

          $('#name_error').html("");
          $('#password_error').html("");
          
          $('#cp_id_error').html("");
          $('#fname_error').html("");
          $('#lname_error').html("");
          $('#city_error').html("");
          $('#email_error').html("");
         alert("Please Upload Only Pdf File Size Less Than 2MB");
          return false;
         
         
        }
        }
        
				
				
		});
$("#overlay-bx").click(function(){
$("#number-low").hide(400);
$("#overlay-bx").hide(400);

});
$("#overlay-bx").click(function(){
$("#number-mid").hide(400);
$("#overlay-bx").hide(400);

});
$("#overlay-bx").click(function(){
$("#number-high").hide(400);
$("#overlay-bx").hide(400);

});
$("#overlay-bx").click(function(){
$("#number-other").hide(400);
$("#overlay-bx").hide(400);

});

		
	});

function showMessage(which) {
if (which == 1) {
document.getElementById("fine").style.display = "block";
document.getElementById("fill").style.display = "none";




}
else {
document.getElementById("fine").style.display = "none";
document.getElementById("fill").style.display = "block";

}
}

function get_cp(id)
{
	//alert(id);
var datastring='channel_id=' + id ;
				$.ajax({
					    type: "POST",
					    url: "<?php print base_url() ?>index.php/channel_partners/get_parent_cp",
					    data: datastring,
						 success: function(data)
					   {
              var a=data.killWhiteSpace();
              $('#fool').val(a);
							$('#fool').attr('readonly', true);
							}
						});
      }
</script>


<script type="text/javascript">
String.prototype.killWhiteSpace = function() {
    return this.replace(/\s/g, '');
};
$(function() {
      $('#area-interest').change(function() {
            $('div.number').hide();
            $('#number' + $(this).val()).show();
      }).change(); // Invoke it now
});

$(function(){ 
      $('#pacceptance').change(function() 
	  		{
            $('div.contract').hide();
            $('#number' + $(this).val()).show();

      }).change(); // Invoke it now
});
    </script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Edit Channel Partner</div>
<div class="add-newcp"><span style="color:#F00"></span>
<div class="mndry">*Mandatory Fields</div>
<form name="channel_partner_form" action="<?=base_url()?>index.php/channel_partners/edit_channel_partner/<?php echo $channel_partner->channel_partner_id;;?>" method="post" id="channel_partner_form" enctype="multipart/form-data" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="toptr">
    <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:none; padding:2px; border-bottom:2px solid #cccccc">
      <tr><td><?php if($channel_partner->cp_status==1){print "Edit Company Details";}else{print "Edit Existing Company Details";}?></td>
       <!-- <td width="220"><input name="radio" type="radio" id="addnco" value="addnwcompany" checked="checked"  onclick = "showMessage(2)" />
          <strong> ADD NEW COMPANY</strong></td>
        <td width="260"><strong>
          <input type="radio" name="radio" id="addtoco" value="addtocompany"  onclick = "showMessage(1)" style="margin-left:25px;" />
          ADD TO EXISTING COMPANY</strong></td>
        <td><div id="fine" style="display:none">
          <select name="companies" id="companies" onchange="get_cp(this.value)">
            <option>Select a Company</option>
            <?php $data=$this->channel_partner_model->get_channelpartner(); foreach($data as $company) { ?>
            <option value="<?= $company['channel_partner_id'];?>"><?= $company['channel_partner_name'];?></option>
            <?php } ?>
            </select>
          </div></td>-->
        </tr>
      </table></td>
  </tr>
  <tr class="toptr">
    <td>Channel Partner Name*</td>
    <td><input type="text" name="partner_name" id="fname15" class="inputbxs" value="<?php echo $channel_partner->channel_partner_name;?>"/><br /><span id="name_error" style="color:#F00"></span>
    <td>Address Line 1</td>
    <td><input type="text" name="address1" id="fname8" class="inputbxs" value="<?php echo $channel_partner->address1;?>"/></td>
  </tr>
  <tr class="toptr">
    <td>Contact Person</td>
    <td><input type="text" name="contact_person" id="fname16" class="inputbxs" value="<?php echo $channel_partner->contact_person_name;?>"/></td>
    <td>Address Line 2</td>
    <td><input type="text" name="address2" id="fname17" class="inputbxs" value="<?php echo $channel_partner->address2;?>"/></td>
  </tr>
  <tr class="toptr">
    <td>Designation</td>
    <td><input type="text" name="designation" id="fname" class="inputbxs" value="<?php echo $channel_partner->designation;?>"/></td>
    <td>City*</td>
    <td><input type="text" name="city" id="fname2" class="inputbxs" value="<?php echo $channel_partner->city;?>" /><br/><span id="city_error" style="color:#F00"></span></td>
  </tr>
  <tr>
    <td>CP ID*</td>
    <td><input type="text" name="cp_id" id="fname5" class="inputbxs" placeholder="Enter only 4 digit no" value="<?php echo $channel_partner->cp_id;?>"/><br/><span id="cp_id_error" style="color:#F00"></span></td>
    <td>State</td>
    <td><input type="text" name="state" id="fname14" class="inputbxs"  value="<?php echo $channel_partner->state;?>"/></td>


  </tr>
  <tr>
    <td>Email*</td>
    <td><input type="text" name="email" id="fname11" class="inputbxs" value="<?php echo $channel_partner->email_id;?>"/><br/><span id="email_error" style="color:#F00"></span></td>
     <td>Country</td>
    <td><input type="text" name="country" id="fname12" class="inputbxs" value="<?php echo $channel_partner->country;?>"/></td>
  </tr>
  <tr>
   <td>First Name*</td>
    <td><input type="text" name="fname" id="fname6" class="inputbxs" value="<?php echo $channel_partner->first_name;?>"/><br/><span id="fname_error" style="color:#F00"></span></td>
    <td>Pincode</td>
    <td><input type="text" name="pincode" id="fname13" class="inputbxs" value="<?php echo $channel_partner->pin_code;?>"/><br><span id="pin_error" style="color:#F00"></span></td>
   
  </tr>
  
  <tr>
    <td>Last Name*</td>
    <td><input type="text" name="lname" id="fname7" class="inputbxs" value="<?php echo $channel_partner->last_name;?>"/><br/><span id="lname_error" style="color:#F00"></span></td>
    <td>Contact Number </td>
    <td><input type="text" name="contact" id="fname10" class="inputbxs" value="<?php echo $channel_partner->contact_no;?>"/></td>
  </tr>
  <tr>
   <td>Password*</td>
    <td><input type="text" name="password" id="fname3" class="inputbxs" value="<?php echo $channel_partner->password;?>"/><br/><span id="password_error" style="color:#F00"></span></td> 
    <td>Status</td>
    <td><input type="radio" name="status" value="1" <?php if($channel_partner->status==1){ ?> checked="checked" <?php } ?>>Active</input><br/><input type="radio" name="status" value="0" <?php if($channel_partner->status==0){ ?> checked="checked" <?php } ?>>Inactive</input></td> 
  </tr><tr>
<td>Product Types[Surface Restriction] </td><?php $keys=explode(",",$channel_partner->product_types); 
$pro_type = array();
$pro_type['Art Prints']="";
 $pro_type['Posters']="";
$pro_type['Canvas']="";
$pro_type['TransLight']="";
foreach($keys as $key)
 {
  $pro_type[$key]=$key;
 }
?>
  <td><?php if($pro_type['art prints']=="art prints"){?><input type="checkbox" name="pro_ck1" id="pro_ck1" value="art prints" checked/>
    <?php }else{?><input type="checkbox" name="pro_ck1" id="pro_ck1" value="art prints"/><?php }?>&nbsp;&nbsp;Art Prints
        <br/><br/>
        <?php if($pro_type['posters']=="posters"){?><input type="checkbox" name="pro_ck2" id="pro_ck2" value="posters" checked/>
         <?php }else{?><input type="checkbox" name="pro_ck2" id="pro_ck2" value="posters"/><?php }?>&nbsp;&nbsp;Posters
        <br/><br/>
        <?php if($pro_type['canvas']=="canvas"){?><input type="checkbox" name="pro_ck3" id="pro_ck3" value="canvas" checked/><?php }else{?>
        <input type="checkbox" name="pro_ck3" id="pro_ck3" value="canvas"/><?php }?>&nbsp;&nbsp;Canvas
        <br/><br/>
        <?php if($pro_type['trans light']=="trans light"){?><input type="checkbox" name="pro_ck4" id="pro_ck4" value="trans light" checked/><?php }else{?>
            <input type="checkbox" name="pro_ck4" id="pro_ck4" value="trans light"/><?php }?>&nbsp;&nbsp;Translight
        <br/><br/>
        <?php if($pro_type['premium photographic print']=="premium photographic print"){?><input type="checkbox" name="pro_ck5" id="pro_ck5" value="premium photographic print" checked/><?php }else{?>
            <input type="checkbox" name="pro_ck5" id="pro_ck5" value="premium photographic print"/><?php }?>&nbsp;&nbsp;Premium Photographic Print
        <br/><br/>
        <?php if($pro_type['photographic print']=="photographic print"){?><input type="checkbox" name="pro_ck6" id="pro_ck6" value=" photographic print" checked/><?php }else{?>
            <input type="checkbox" name="pro_ck6" id="pro_ck6" value="photographic print"/><?php }?>&nbsp;&nbsp;Photographic Print

    </td>
<td>Product Source</td>
    <td><?php $res_pro_source=$channel_partner->product_sources;?>
	<select name="pro_sources" id="pro_sources" style="width:245px;">
	
       <option <?php if(($res_pro_source!="Painting") && ($res_pro_source!="Digitalart") && ($res_pro_source!="Photograph") && ($res_pro_source!="Illustrations") && ($res_pro_source!="Lithograph") && ($res_pro_source=="Posters")){?> selected="selected" <?php }?>selected="selected" value="0">Select Product Source</option>
	
        <option value="Painting" <?php if($res_pro_source=="Painting"){?> selected="selected" <?php }?> >Painting</option>
       
        <option value="Digitalart" <?php if($res_pro_source=="Digital art"){?> selected="selected" <?php }?> >Digital art</option>
	
	 <option value="Photograph" <?php if($res_pro_source=="Photograph"){?> selected="selected" <?php }?> >Photograph</option>
       
	<option value="Illustrations" <?php if($res_pro_source=="Illustrations"){?> selected="selected" <?php }?> >Illustrations</option>
	 
	<option value="Lithograph" <?php if($res_pro_source=="Lithograph"){?> selected="selected" <?php }?> >Lithograph</option>
       
	<option value="Posters" <?php if($res_pro_source=="Posters"){?> selected="selected" <?php }?> >Posters</option>
	
	</select>
   </td>

</tr>

  <tr>
    <td colspan="4">
    <div class="area-wrapper">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <!--<td width="450"><?php $abc=explode(",",$channel_partner->area_of_interest);$newkey=array();$newkey['art']="";$newkey['abstract']="";$newkey['fashion']="";$newkey['food']="";$newkey['travel']="";$newkey['sports']="";$newkey['lifestyle']="";$newkey['industry']="";$newkey['wildlife']="";
        foreach ($abc as $key) {
         $newkey[$key]=$key;
        }

         ?> <strong>Area of Interest </strong><br />-->
          <!--<table width="365" border="0" cellspacing="0" cellpadding="0" style="padding:2px;">
            <tr>
              <td><?php if($newkey['art']=="art"){?><input type="checkbox" name="ck1" id="ck1" value="art" checked/><?php }else{ print '<input type="checkbox" name="ck1" value="art" />';} ?></td>
              <td>Art</td>
              <td><?php if($newkey['abstract']=="abstract"){?><input type="checkbox" name="ck2" id="ck2" value="abstract" checked/><?php }else{print '<input type="checkbox" name="ck2" value="abstract"/>';} ?></td>
              <td>Abstract</td>
              <td><?php if($newkey['fashion']=="fashion"){?><input type="checkbox" name="ck3" id="ck3" value="fashion" checked/><?php }else{ print '<input type="checkbox" name="ck3" value="fashion"/>';} ?></td>
              <td>Fashion</td>
            </tr>
            <tr>
              <td><?php if($newkey['food']=="food"){?><input type="checkbox" name="ck4" id="ck4" value="food" checked/><?php }else{ ?><input type="checkbox" name="ck4" value="food"/><?php } ?></td>
              <td>Food</td>
              <td><?php if($newkey['lifestyle']=="lifestyle"){?><input type="checkbox" name="ck5" id="ck5" value="lifestyle" checked/><?php }else{ print '<input type="checkbox" name="ck5" value="lifestyle"/>';} ?></td>
              <td>Lifestyle</td>
              <td><?php if($newkey['industry']=="industry"){?><input type="checkbox" name="ck6" id="ck6" value="industry" checked/><?php }else{ print '<input type="checkbox" name="ck6" value="industry"/>';} ?></td>
              <td>Industry</td>
            </tr>
            <tr>
              <td><?php if($newkey['sports']=="sports"){?><input type="checkbox" name="ck7" id="ck7" value="sports" checked/><?php }else{ print '<input type="checkbox" name="ck7" value="sports"/>';} ?></td>
              <td>Sports</td>
              <td><?php if($newkey['travel']=="travel"){?><input type="checkbox" name="ck8" id="ck8" value="travel" checked/><?php }else{ print '<input type="checkbox" name="ck8" value="travel"/>';} ?></td>
              <td> Travel <br /></td>
              <td><?php if($newkey['wildlife']=="wildlife"){?><input type="checkbox" name="ck9" id="ck9" value="wildlife" checked/><?php }else { print '<input type="checkbox" name="ck9" value="wildlife"/>';} ?></td>
              <td>Wildlife</td>
            </tr>
          </table>-->
<br /><br />
<!--<div id="numberothers" class="number">
<textarea name="interest-other" id="interest-other" cols="40" rows="3" placeholder="Others (please specify here)"><?php echo $channel_partner->other_interests;?></textarea>
</div>-->
  </td>
     
        <td>
        <?php print $a=$channel_partner->contract_file_url;if($a==""){ if($channel_partner->parent_partner_id=='0'){ ?> 
           
          <div id="fill" style="display:block">
           Channel Partner Acceptance (Contract)
    
          <br />
          <br />
          <select name="pacceptance" id="pacceptance" >
            <option value="plsselect" selected="selected">Please Select</option>
        <option value="onlinesigned">Online Signed</option>
        <option value="offlinesigned">Offline Signed</option>
    </select> 
          <br />
          <br />
      <div id="numberonlinesigned" class="contract"><a href="#">Retreive the Contract</a></div><br />
      <div id="numberofflinesigned" class="contract">Upload the Contract<br />
        <br />
<input type="file" name="file1" id="pdf_file" size="chars"></div>
</div><?php } }?>
   </td>
  <td>
Commission
<select name="commission" id="commission" onchange="show_popup(this.value);">
<option value="">Please Select</option>
<option value="low" <?php if(isset($commission_details->commission_type)){if($commission_details->commission_type=="low"){  ?> selected="selected"  <?php } } ?> >Low</option>
<option value="mid" <?php if(isset($commission_details->commission_type)){if($commission_details->commission_type=="mid"){?> selected="selected"  <?php }}?>>Medium</option>
<option value="high" <?php if(isset($commission_details->commission_type)){if($commission_details->commission_type=="high"){?> selected="selected"  <?php }}?>>High</option>
<option value="other" <?php if(isset($commission_details->commission_type)){if($commission_details->commission_type=="other"){?> selected="selected"  <?php }}?>>Other(plz specify)</option>
</select>

</td>
      
      </tr>
    </table>

    
    
    </div>
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="addcpn" id="addcpn" value="Edit" class="bt-add" /></td>
  </tr>
</table>
</div>





</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>
<div class="my_tgl_bxx" id="number-low" style="display:none;">Low Range of Pricing
<table border="1">
<tr>
<th>Size</th>
<th>License Cost(Dollars)</th>
<th>License Cost(Rupees)</th>
<th>Commission %</td>
<th>Channel partner share</th>
<th>Wallsnart share</th>
</tr>
<?php if(isset($commission_details->commission_type)){
if($commission_details->commission_type=="low"){

$com_percent=explode(",",$commission_details->commission_percentage);

$smallest_percent=explode("_",$com_percent['0']);
$small_percent=explode("_",$com_percent['1']);
$medium_percent=explode("_",$com_percent['2']);
$large_percent=explode("_",$com_percent['3']);
$largest_percent=explode("_",$com_percent['4']);

$smallest_per_count=count($smallest_percent);
$small_per_count=count($small_percent);
$medium_per_count=count($medium_percent);
$large_per_count=count($large_percent);
$largest_per_count=count($largest_percent);

$channel_partner=explode(",",$commission_details->channel_partner_share);

$smallest_channel=explode("_",$channel_partner['0']);
$small_channel=explode("_",$channel_partner['1']);
$medium_channel=explode("_",$channel_partner['2']);
$large_channel=explode("_",$channel_partner['3']);
$largest_channel=explode("_",$channel_partner['4']);

$smallest_channel_count=count($smallest_channel);
$small_channel_count=count($small_channel);
$medium_channel_count=count($medium_channel);
$large_channel_count=count($large_channel);
$largest_channel_count=count($largest_channel);

$wallsnart=explode(",",$commission_details->wallsnart_share);

$smallest_wallsnart=explode("_",$wallsnart['0']);
$small_wallsnart=explode("_",$wallsnart['1']);
$medium_wallsnart=explode("_",$wallsnart['2']);
$large_wallsnart=explode("_",$wallsnart['3']);
$largest_wallsnart=explode("_",$wallsnart['4']);

$smallest_wallsnart_count=count($smallest_wallsnart);
$small_wallsnart_count=count($small_wallsnart);
$medium_wallsnart_count=count($medium_wallsnart);
$large_wallsnart_count=count($large_wallsnart);
$largest_wallsnart_count=count($largest_wallsnart);

}}
?>
<tr>
<td>Smallest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;600</td>
<td><input type="text"  name="commission_per10" id="commission_per10" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){if($smallest_per_count=="2"){echo $smallest_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share10').value='';
                                           document.getElementById('wallsnart_share10').value='';}"
onblur="if(this.value){var k1=this.value; var j1=(600*k1)/100; var i1=600-j1;
                       document.getElementById('channel_partner_share10').value=j1;
                       document.getElementById('wallsnart_share10').value=i1;}">
</td>
<td><input type="text" name="channel_partner_share10" id="channel_partner_share10" style="width:70px;" value="<?php if((isset($commission_details->commission_type)) &&($commission_details->commission_type=="low")){
 if($smallest_channel_count=="2"){echo $smallest_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share10" id="wallsnart_share10" style="width:70px;" value="<?php if((isset($commission_details->commission_type)) && ($commission_details->commission_type=="low")){
if($smallest_wallsnart_count=="2"){echo $smallest_wallsnart['1'];}}?>" readonly></td>
</tr>

<tr>
<td>Small</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1200</td>
<td><input type="text" name="commission_per20" id="commission_per20" style="width:70px;"value="<?php if((isset($commission_details->commission_type)) && ($commission_details->commission_type=="low")){
if($small_per_count=="2"){echo $small_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share20').value='';
                                           document.getElementById('wallsnart_share20').value='';}"
onblur="if(this.value){var k2=this.value; var j2=(1200*k2)/100; var i2=1200-j2;
                       document.getElementById('channel_partner_share20').value=j2;
                       document.getElementById('wallsnart_share20').value=i2;}"></td>
<td><input type="text" name="channel_partner_share20" id="channel_partner_share20" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
if($small_channel_count=="2"){echo $small_channel['1'];}}?>"  readonly></td>
<td><input type="text" name="wallsnart_share20" id="wallsnart_share20" style="width:70px;" value="<?php if(isset($commission_details->commission_type)&&($commission_details->commission_type=="low")){
if($small_wallsnart_count=="2"){echo $small_wallsnart['1'];}}?>"  readonly></td>
</tr>
<tr><td>Medium</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;40</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2400</td>
<td><input type="text" name="commission_per30" id="commission_per30"style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
if($medium_per_count=="2"){echo $medium_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share30').value='';
                                           document.getElementById('wallsnart_share30').value='';}"
onblur="if(this.value){var k3=this.value; var j3=(2400*k3)/100; var i3=2400-j3;
                       document.getElementById('channel_partner_share30').value=j3;
                       document.getElementById('wallsnart_share30').value=i3;}"></td>
<td><input type="text" name="channel_partner_share30" id="channel_partner_share30" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
 if($medium_channel_count=="2"){echo $medium_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share30" id="wallsnart_share30" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
if($medium_wallsnart_count=="2"){echo $medium_wallsnart['1'];}}?>"   readonly></td>
</tr>
<tr>
<td>Large</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3000</td>
<td><input type="text" name="commission_per40" id="commission_per40" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
if($large_per_count=="2"){echo $large_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share40').value='';
                                           document.getElementById('wallsnart_share40').value='';}"
onblur="if(this.value){var k4=this.value; var j4=(3000*k4)/100; var i4=3000-j4;
                       document.getElementById('channel_partner_share40').value=j4;
                       document.getElementById('wallsnart_share40').value=i4;}"></td>
<td><input type="text" name="channel_partner_share40" id="channel_partner_share40" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
if($large_channel_count=="2"){echo $large_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share40" id="wallsnart_share40" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
if($large_wallsnart_count=="2"){echo $large_wallsnart['1'];}}?>" readonly></td>
</tr>
<tr>
<td>Largest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3600</td>
<td><input type="text" name="commission_per50" id="commission_per50" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
if($largest_per_count=="2"){echo $largest_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share50').value='';
                                           document.getElementById('wallsnart_share50').value='';}"
onblur="if(this.value){var k5=this.value; var j5=(3600*k5)/100; var i5=3600-j5;
                       document.getElementById('channel_partner_share50').value=j5;
                       document.getElementById('wallsnart_share50').value=i5;}"></td>
<td><input type="text" name="channel_partner_share50" id="channel_partner_share50" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
if($largest_channel_count=="2"){echo $largest_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share50" id="wallsnart_share50" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="low")){
if($largest_wallsnart_count=="2"){echo $largest_wallsnart['1'];}}?>" readonly></td>
</tr>

</table>
</div>
<div class="my_tgl_bxx" id="number-mid" style="display:none;">Mid Range of Pricing
<table border="1">
<tr>
<th>Size</th>
<th>License Cost(Dollars)</th>
<th>License Cost(Rupees)</th>
<th>Commission %</td>
<th>Channel partner share</th>
<th>Wallsnart share</th>
</tr>
<?php 
if(isset($commission_details->commission_type)){
if($commission_details->commission_type=="mid"){

$com_percent=explode(",",$commission_details->commission_percentage);

$smallest_percent=explode("_",$com_percent['0']);
$small_percent=explode("_",$com_percent['1']);
$medium_percent=explode("_",$com_percent['2']);
$large_percent=explode("_",$com_percent['3']);
$largest_percent=explode("_",$com_percent['4']);

$smallest_per_count=count($smallest_percent);
$small_per_count=count($small_percent);
$medium_per_count=count($medium_percent);
$large_per_count=count($large_percent);
$largest_per_count=count($largest_percent);

$channel_partner=explode(",",$commission_details->channel_partner_share);

$smallest_channel=explode("_",$channel_partner['0']);
$small_channel=explode("_",$channel_partner['1']);
$medium_channel=explode("_",$channel_partner['2']);
$large_channel=explode("_",$channel_partner['3']);
$largest_channel=explode("_",$channel_partner['4']);

$smallest_channel_count=count($smallest_channel);
$small_channel_count=count($small_channel);
$medium_channel_count=count($medium_channel);
$large_channel_count=count($large_channel);
$largest_channel_count=count($largest_channel);

$wallsnart=explode(",",$commission_details->wallsnart_share);

$smallest_wallsnart=explode("_",$wallsnart['0']);
$small_wallsnart=explode("_",$wallsnart['1']);
$medium_wallsnart=explode("_",$wallsnart['2']);
$large_wallsnart=explode("_",$wallsnart['3']);
$largest_wallsnart=explode("_",$wallsnart['4']);

$smallest_wallsnart_count=count($smallest_wallsnart);
$small_wallsnart_count=count($small_wallsnart);
$medium_wallsnart_count=count($medium_wallsnart);
$large_wallsnart_count=count($large_wallsnart);
$largest_wallsnart_count=count($largest_wallsnart);
}}
?>
<tr>
<td>Smallest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;600</td>
<td><input type="text"  name="commission_per11" id="commission_per11" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($smallest_per_count=="2"){echo $smallest_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share11').value='';
                                           document.getElementById('wallsnart_share11').value='';}"
onblur="if(this.value){var k1=this.value; var j1=(600*k1)/100; var i1=600-j1;
                       document.getElementById('channel_partner_share11').value=j1;
                       document.getElementById('wallsnart_share11').value=i1;}">
</td>
<td><input type="text" name="channel_partner_share11" id="channel_partner_share11" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($smallest_channel_count=="2"){echo $smallest_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share11" id="wallsnart_share11" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($smallest_wallsnart_count=="2"){echo $smallest_wallsnart['1'];}}?>" readonly></td>
</tr>
<tr>
<td>Small</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1200</td>
<td><input type="text" name="commission_per21" id="commission_per21" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
 if($small_per_count=="2"){echo $small_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share21').value='';
                                           document.getElementById('wallsnart_share21').value='';}"
onblur="if(this.value){var k2=this.value; var j2=(1200*k2)/100; var i2=1200-j2;
                       document.getElementById('channel_partner_share21').value=j2;
                       document.getElementById('wallsnart_share21').value=i2;}"></td>
<td><input type="text" name="channel_partner_share21" id="channel_partner_share21" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($small_channel_count=="2"){echo $small_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share21" id="wallsnart_share21" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($small_wallsnart_count=="2"){echo $small_wallsnart['1'];}}?>" readonly></td>
</tr>
<tr><td>Medium</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;40</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2400</td>
<td><input type="text" name="commission_per31" id="commission_per31"style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($medium_per_count=="2"){echo $medium_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share31').value='';
                                           document.getElementById('wallsnart_share31').value='';}"
onblur="if(this.value){var k3=this.value; var j3=(2400*k3)/100; var i3=2400-j3;
                       document.getElementById('channel_partner_share31').value=j3;
                       document.getElementById('wallsnart_share31').value=i3;}"></td>
<td><input type="text" name="channel_partner_share31" id="channel_partner_share31" style="width:70px;"value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($medium_channel_count=="2"){echo $medium_channel['1'];}}?>"  readonly></td>
<td><input type="text" name="wallsnart_share31" id="wallsnart_share31" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($medium_wallsnart_count=="2"){echo $medium_wallsnart['1'];}}?>" readonly></td>
</tr>
<tr>
<td>Large</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3000</td>
<td><input type="text" name="commission_per41" id="commission_per41" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($large_per_count=="2"){echo $large_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share41').value='';
                                           document.getElementById('wallsnart_share41').value='';}"
onblur="if(this.value){var k4=this.value; var j4=(3000*k4)/100; var i4=3000-j4;
                       document.getElementById('channel_partner_share41').value=j4;
                       document.getElementById('wallsnart_share41').value=i4;}"></td>
<td><input type="text" name="channel_partner_share41" id="channel_partner_share41" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($large_channel_count=="2"){echo $large_channel['1'];}}?>"  readonly></td>
<td><input type="text" name="wallsnart_share41" id="wallsnart_share41" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($large_wallsnart_count=="2"){echo $large_wallsnart['1'];}}?>"  readonly></td>
</tr>
<tr>
<td>Largest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3600</td>
<td><input type="text" name="commission_per51" id="commission_per51" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($largest_per_count=="2"){echo $largest_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share51').value='';
                                           document.getElementById('wallsnart_share51').value='';}"
onblur="if(this.value){var k5=this.value; var j5=(3600*k5)/100; var i5=3600-j5;
                       document.getElementById('channel_partner_share51').value=j5;
                       document.getElementById('wallsnart_share51').value=i5;}"></td>
<td><input type="text" name="channel_partner_share51" id="channel_partner_share51" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($largest_channel_count=="2"){echo $largest_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share51" id="wallsnart_share51" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="mid")){
if($largest_wallsnart_count=="2"){echo $largest_wallsnart['1'];}} ?>" readonly></td>
</tr>

</table>
</div>

<div class="my_tgl_bxx" id="number-high" style="display:none;">High Range of Pricing
<table border="1">
<tr>
<th>Size</th>
<th>License Cost(Dollars)</th>
<th>License Cost(Rupees)</th>
<th>Commission %</td>
<th>Channel partner share</th>
<th>Wallsnart share</th>
</tr>
<?php
if(isset($commission_details->commission_type)){
if($commission_details->commission_type=="high"){

$com_percent=explode(",",$commission_details->commission_percentage);

$smallest_percent=explode("_",$com_percent['0']);
$small_percent=explode("_",$com_percent['1']);
$medium_percent=explode("_",$com_percent['2']);
$large_percent=explode("_",$com_percent['3']);
$largest_percent=explode("_",$com_percent['4']);

$smallest_per_count=count($smallest_percent);
$small_per_count=count($small_percent);
$medium_per_count=count($medium_percent);
$large_per_count=count($large_percent);
$largest_per_count=count($largest_percent);

$channel_partner=explode(",",$commission_details->channel_partner_share);

$smallest_channel=explode("_",$channel_partner['0']);
$small_channel=explode("_",$channel_partner['1']);
$medium_channel=explode("_",$channel_partner['2']);
$large_channel=explode("_",$channel_partner['3']);
$largest_channel=explode("_",$channel_partner['4']);

$smallest_channel_count=count($smallest_channel);
$small_channel_count=count($small_channel);
$medium_channel_count=count($medium_channel);
$large_channel_count=count($large_channel);
$largest_channel_count=count($largest_channel);

$wallsnart=explode(",",$commission_details->wallsnart_share);

$smallest_wallsnart=explode("_",$wallsnart['0']);
$small_wallsnart=explode("_",$wallsnart['1']);
$medium_wallsnart=explode("_",$wallsnart['2']);
$large_wallsnart=explode("_",$wallsnart['3']);
$largest_wallsnart=explode("_",$wallsnart['4']);

$smallest_wallsnart_count=count($smallest_wallsnart);
$small_wallsnart_count=count($small_wallsnart);
$medium_wallsnart_count=count($medium_wallsnart);
$large_wallsnart_count=count($large_wallsnart);
$largest_wallsnart_count=count($largest_wallsnart);
}
}
?>
<tr>
<td>Smallest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;600</td>
<td><input type="text"  name="commission_per12" id="commission_per12" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($smallest_per_count=="2"){echo $smallest_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share12').value='';
                                           document.getElementById('wallsnart_share12').value='';}"
onblur="if(this.value){var k1=this.value; var j1=(600*k1)/100; var i1=600-j1;
                       document.getElementById('channel_partner_share12').value=j1;
                       document.getElementById('wallsnart_share12').value=i1;}">
</td>
<td><input type="text" name="channel_partner_share12" id="channel_partner_share12" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($smallest_channel_count=="2"){echo $smallest_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share12" id="wallsnart_share12" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($smallest_wallsnart_count=="2"){echo $smallest_wallsnart['1'];}}?>" readonly></td>
</tr>
<tr>
<td>Small</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1200</td>
<td><input type="text" name="commission_per22" id="commission_per22" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($small_per_count=="2"){echo $small_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share22').value='';
                                           document.getElementById('wallsnart_share22').value='';}"
onblur="if(this.value){var k2=this.value; var j2=(1200*k2)/100; var i2=1200-j2;
                       document.getElementById('channel_partner_share22').value=j2;
                       document.getElementById('wallsnart_share22').value=i2;}"></td>
<td><input type="text" name="channel_partner_share22" id="channel_partner_share22" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($small_channel_count=="2"){echo $small_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share22" id="wallsnart_share22" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($small_wallsnart_count=="2"){echo $small_wallsnart['1'];}}?>" readonly></td>
</tr>
<tr><td>Medium</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;40</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2400</td>
<td><input type="text" name="commission_per32" id="commission_per32"style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($medium_per_count=="2"){echo $medium_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share32').value='';
                                           document.getElementById('wallsnart_share32').value='';}"
onblur="if(this.value){var k3=this.value; var j3=(2400*k3)/100; var i3=2400-j3;
                       document.getElementById('channel_partner_share32').value=j3;
                       document.getElementById('wallsnart_share32').value=i3;}"></td>
<td><input type="text" name="channel_partner_share32" id="channel_partner_share32" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($medium_channel_count=="2"){echo $medium_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share32" id="wallsnart_share32" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($medium_wallsnart_count=="2"){echo $medium_wallsnart['1'];}}?>" readonly></td>
</tr>
<tr>
<td>Large</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3000</td>
<td><input type="text" name="commission_per42" id="commission_per42" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($large_per_count=="2"){echo $large_percent['1'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share42').value='';
                                           document.getElementById('wallsnart_share42').value='';}"
onblur="if(this.value){var k4=this.value; var j4=(3000*k4)/100; var i4=3000-j4;
                       document.getElementById('channel_partner_share42').value=j4;
                       document.getElementById('wallsnart_share42').value=i4;}"></td>
<td><input type="text" name="channel_partner_share42" id="channel_partner_share42" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($large_channel_count=="2"){echo $large_channel['1'];}}?>" readonly></td>
<td><input type="text" name="wallsnart_share42" id="wallsnart_share42" style="width:70px;"  value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($large_wallsnart_count=="2"){echo $large_wallsnart['1'];}}?>"readonly></td>
</tr>
<tr>
<td>Largest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3600</td>
<td><input type="text" name="commission_per52" id="commission_per52" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($largest_per_count=="2"){echo $largest_percent['1'];}} ?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share52').value='';
                                           document.getElementById('wallsnart_share52').value='';}"
onblur="if(this.value){var k5=this.value; var j5=(3600*k5)/100; var i5=3600-j5;
                       document.getElementById('channel_partner_share52').value=j5;
                       document.getElementById('wallsnart_share52').value=i5;}"></td>
<td><input type="text" name="channel_partner_share52" id="channel_partner_share52" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
 if($largest_channel_count=="2"){echo $largest_channel['1'];}}?>"  readonly></td>
<td><input type="text" name="wallsnart_share52" id="wallsnart_share52" style="width:70px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="high")){
if($largest_wallsnart_count=="2"){echo $largest_wallsnart['1'];}}?>" readonly></td>
</tr>

</table>
</div>
<div class="my_tgl_bxx" id="number-other" style="display:none;">Others
<br/><br/>
<table border="1">
<tr>
<th>Size</th>
<th>License Cost(Dollars)</th>
<th>License Cost(Rupees)</th>
<th>Commission %</td>
<th>Channel partner share</th>
<th>Wallsnart share</th>
</tr>
<?php
if(isset($commission_details->commission_type)){ 
if($commission_details->commission_type=="other"){

$other_size=explode(",",$commission_details->size);

$smallest_size=explode(",",$other_size['0']);
$small_size=explode(",",$other_size['1']);
$medium_size=explode(",",$other_size['2']);
$large_size=explode(",",$other_size['3']);
$largest_size=explode(",",$other_size['4']);

$smallest_size_count=count($smallest_size);
$small_size_count=count($small_size);
$medium_size_count=count($medium_size);
$large_size_count=count($large_size);
$largest_size_count=count($largest_size);

$other_dollars=explode(",",$commission_details->license_cost_dollars);

$smallest_dol=explode(",",$other_dollars['0']);
$small_dol=explode(",",$other_dollars['1']);
$medium_dol=explode(",",$other_dollars['2']);
$large_dol=explode(",",$other_dollars['3']);
$largest_dol=explode(",",$other_dollars['4']);

$smallest_dol_count=count($smallest_dol);
$small_dol_count=count($small_dol);
$medium_dol_count=count($medium_dol);
$large_dol_count=count($large_dol);
$largest_dol_count=count($largest_dol);

$other_rs=explode(",",$commission_details->license_cost_rupees);

$smallest_rs=explode(",",$other_rs['0']);
$small_rs=explode(",",$other_rs['1']);
$medium_rs=explode(",",$other_rs['2']);
$large_rs=explode(",",$other_rs['3']);
$largest_rs=explode(",",$other_rs['4']);

$smallest_rs_count=count($smallest_rs);
$small_rs_count=count($small_rs);
$medium_rs_count=count($medium_rs);
$large_rs_count=count($large_rs);
$largest_rs_count=count($largest_rs);

$com_percent=explode(",",$commission_details->commission_percentage);

$smallest_percent=explode("_",$com_percent['0']);
$small_percent=explode("_",$com_percent['1']);
$medium_percent=explode("_",$com_percent['2']);
$large_percent=explode("_",$com_percent['3']);
$largest_percent=explode("_",$com_percent['4']);

$smallest_per_count=count($smallest_percent);
$small_per_count=count($small_percent);
$medium_per_count=count($medium_percent);
$large_per_count=count($large_percent);
$largest_per_count=count($largest_percent);

$channel_partner=explode(",",$commission_details->channel_partner_share);

$smallest_channel=explode("_",$channel_partner['0']);
$small_channel=explode("_",$channel_partner['1']);
$medium_channel=explode("_",$channel_partner['2']);
$large_channel=explode("_",$channel_partner['3']);
$largest_channel=explode("_",$channel_partner['4']);

$smallest_channel_count=count($smallest_channel);
$small_channel_count=count($small_channel);
$medium_channel_count=count($medium_channel);
$large_channel_count=count($large_channel);
$largest_channel_count=count($largest_channel);

$wallsnart=explode(",",$commission_details->wallsnart_share);

$smallest_wallsnart=explode("_",$wallsnart['0']);
$small_wallsnart=explode("_",$wallsnart['1']);
$medium_wallsnart=explode("_",$wallsnart['2']);
$large_wallsnart=explode("_",$wallsnart['3']);
$largest_wallsnart=explode("_",$wallsnart['4']);

$smallest_wallsnart_count=count($smallest_wallsnart);
$small_wallsnart_count=count($small_wallsnart);
$medium_wallsnart_count=count($medium_wallsnart);
$large_wallsnart_count=count($large_wallsnart);
$largest_wallsnart_count=count($largest_wallsnart);
 
}}
?>

<tr>
<td><input type="text" name="size1" id="size1" placeholder="size" style="width:40px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($smallest_size_count=="3"){echo $smallest_size['2'];}}?>"></td>
<td><input type="text" name="lic_dol1" id="lic_dol1" placeholder="License Cost(Dollars)" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($smallest_dol_count=="3"){echo $smallest_dol['2'];}}?>"></td>
<td><input type="text" name="lic_rs1" id="lic_rs1" placeholder="License Cost(Rs)" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($smallest_rs_count=="3"){echo $smallest_rs['2'];}}?>"></td>
<td><input type="text" name="commission_per1" id="commission_per1" placeholder="Commission%" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){ if($smallest_per_count=="3"){echo $smallest_percent['2'];}}?>"
value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($smallest_per_count=="3"){echo $smallest_percent['2'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share1').value='';
                                       document.getElementById('wallsnart_share1').value='';}"
onblur="if(this.value){var k1=this.value;  
var b1=document.getElementById('lic_rs1').value;
var j1=(b1*k1)/100; var i1=b1-j1;
                       document.getElementById('channel_partner_share1').value=j1;
                       document.getElementById('wallsnart_share1').value=i1;}"></td>
<td><input type="text" name="channel_partner_share1" id="channel_partner_share1" placeholder="Channel pt share" style="width:100px;" 
value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($smallest_channel_count=="3"){echo $smallest_channel['2'];}}?>"readonly></td>
<td><input type="text" name="wallsnart_share1" id="wallsnart_share1" placeholder="Wallsnart share" style="width:100px;"
value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($smallest_wallsnart_count=="3"){echo $smallest_wallsnart['2'];}}?>" readonly></td>

</tr>
<tr>
<td><input type="text" name="size2" id="size2" placeholder="size" style="width:40px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($small_size_count=="3"){echo $small_size['2'];}}?>"></td>
<td><input type="text" name="lic_dol2" id="lic_dol2" placeholder="License Cost(Dollars)" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($small_dol_count=="3"){echo $small_dol['2'];}}?>"></td>
<td><input type="text" name="lic_rs2" id="lic_rs2" placeholder="License Cost(Rs)" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($small_rs_count=="3"){echo $small_rs['2'];}}?>"></td>
<td><input type="text" name="commission_per2" id="commission_per2" placeholder="Commission%" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($small_per_count=="3"){echo $small_percent['2'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share2').value='';
                                       document.getElementById('wallsnart_share2').value='';}"
onblur="if(this.value){var k2=this.value;  
var b2=document.getElementById('lic_rs2').value;
var j2=(b2*k2)/100; var i2=b2-j2;
                       document.getElementById('channel_partner_share2').value=j2;
                       document.getElementById('wallsnart_share2').value=i2;}"></td>
<td><input type="text" name="channel_partner_share2" id="channel_partner_share2" placeholder="Channel pt share" style="width:100px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($small_channel_count=="3"){echo $small_channel['2'];}}?>"readonly></td>
<td><input type="text" name="wallsnart_share2" id="wallsnart_share2" placeholder="Wallsnart share" style="width:100px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($small_wallsnart_count=="3"){echo $small_wallsnart['2'];}}?>"readonly></td>

</tr>
<tr>
<td><input type="text" name="size3" id="size3" placeholder="size" style="width:40px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($medium_size_count=="3"){echo $medium_size['2'];}}?>"></td>
<td><input type="text" name="lic_dol3" id="lic_dol3" placeholder="License Cost(Dollars)" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($medium_dol_count=="3"){echo $medium_dol['2'];}}?>"></td>
<td><input type="text" name="lic_rs3" id="lic_rs3" placeholder="License Cost(Rs)" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($medium_rs_count=="3"){echo $medium_rs['2'];}}?>"></td>
<td><input type="text" name="commission_per3" id="commission_per3" placeholder="Commission%" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($medium_per_count=="3"){echo $medium_percent['2'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share3').value='';
                                       document.getElementById('wallsnart_share3').value='';}"
onblur="if(this.value){var k3=this.value;  
var b3=document.getElementById('lic_rs3').value;
var j3=(b3*k3)/100; var i3=b3-j3;
                       document.getElementById('channel_partner_share3').value=j3;
                       document.getElementById('wallsnart_share3').value=i3;}"></td>
<td><input type="text" name="channel_partner_share3" id="channel_partner_share3" placeholder="Channel pt share" style="width:100px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($medium_channel_count=="3"){echo $medium_channel['2'];}}?>"readonly></td>
<td><input type="text" name="wallsnart_share3" id="wallsnart_share3" placeholder="Wallsnart share" style="width:100px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($medium_wallsnart_count=="3"){echo $medium_wallsnart['2'];}}?>" readonly></td>

</tr>
<tr>
<td><input type="text" name="size4" id="size4" placeholder="size" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($large_size_count=="3"){echo $large_size['2'];}}?>" style="width:40px;"></td>
<td><input type="text" name="lic_dol4" id="lic_dol4" placeholder="License Cost(Dollars)"  value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($large_dol_count=="3"){echo $large_dol['2'];}}?>" style="width:90px;"></td>
<td><input type="text" name="lic_rs4" id="lic_rs4" placeholder="License Cost(Rs)" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($large_rs_count=="3"){echo $large_rs['2'];}}?>" style="width:90px;"></td>
<td><input type="text" name="commission_per4" id="commission_per4" placeholder="Commission%" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($large_per_count=="3"){echo $large_percent['2'];}}?>" style="width:90px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share4').value='';
                                       document.getElementById('wallsnart_share4').value='';}"
onblur="if(this.value){var k4=this.value;  
var b4=document.getElementById('lic_rs4').value;
var j4=(b4*k4)/100; var i4=b4-j4;
                       document.getElementById('channel_partner_share4').value=j4;
                       document.getElementById('wallsnart_share4').value=i4;}"></td>
<td><input type="text" name="channel_partner_share4" id="channel_partner_share4" placeholder="Channel pt share" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($large_channel_count=="3"){echo $large_channel['2'];}}?>" style="width:100px;"readonly></td>
<td><input type="text" name="wallsnart_share4" id="wallsnart_share4" placeholder="Wallsnart share" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($large_wallsnart_count=="3"){echo $large_wallsnart['2'];}}?>" style="width:100px;"readonly></td>

</tr>
<tr>
<td><input type="text" name="size5" id="size5" placeholder="size" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($largest_size_count=="3"){echo $largest_size['2'];}}?>" style="width:40px;"></td>
<td><input type="text" name="lic_dol5" id="lic_dol5" placeholder="License Cost(Dollars)" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($largest_dol_count=="3"){echo $largest_dol['2'];}}?>" style="width:90px;"></td>
<td><input type="text" name="lic_rs5" id="lic_rs5" placeholder="License Cost(Rs)" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($largest_rs_count=="3"){echo $largest_rs['2'];}}?>" style="width:90px;"></td>
<td><input type="text" name="commission_per5" id="commission_per5" placeholder="Commission%" style="width:90px;" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($largest_per_count=="3"){echo $largest_percent['2'];}}?>"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share5').value='';
                                       document.getElementById('wallsnart_share5').value='';}"
onblur="if(this.value){var k5=this.value;  
var b5=document.getElementById('lic_rs5').value;
var j5=(b5*k5)/100; var i5=b5-j5;
                       document.getElementById('channel_partner_share5').value=j5;
                       document.getElementById('wallsnart_share5').value=i5;}"></td>
<td><input type="text" name="channel_partner_share5" id="channel_partner_share5" placeholder="Channel pt share" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($largest_channel_count=="3"){echo $largest_channel['2'];}}?>" style="width:100px;"readonly></td>
<td><input type="text" name="wallsnart_share5" id="wallsnart_share5" placeholder="Wallsnart share" value="<?php if((isset($commission_details->commission_type))&&($commission_details->commission_type=="other")){if($largest_wallsnart_count=="3"){echo $largest_wallsnart['2'];}}?>" style="width:100px;"readonly></td>
</tr>
</table>
</div>
</form>
</div>


