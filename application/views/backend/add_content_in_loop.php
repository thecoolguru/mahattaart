
<!-- FOR SHOW HIDE TABLES-->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type = "text/javascript">


$(document).ready(function(){

$("#low_add_commission").click(function(){
var b=$("#code2").val();
if(b=='0'){alert("select channel partner");}
else{ 
$.ajax({
		type: "POST",
	       url: "<?php print base_url();?>index.php/channel_partners/add_commission_details/low/"+b,
	       data: $("#low").serialize(),
		success: function(datam)
            { 
             alert(datam);
            }
});
}
});
$("#mid_add_commission").click(function(){
var b=$("#code2").val();
if(b=='0'){alert("select channel partner");}
else{ 
$.ajax({
		type: "POST",
	       url: "<?php print base_url();?>index.php/channel_partners/add_commission_details/mid/"+b,
	       data: $("#mid").serialize(),
		success: function(datam)
            { 
             alert(datam);
            }
});
}
});

$("#high_add_commission").click(function(){
var b=$("#code2").val();
if(b=='0'){alert("select channel partner");}
else{ 
$.ajax({
		type: "POST",
	       url: "<?php print base_url();?>index.php/channel_partners/add_commission_details/high/"+b,
	       data: $("#high").serialize(),
		success: function(datam)
            { 
             alert(datam);
            }
});
}
});
$("#other_add_commission").click(function(){
var b=$("#code2").val();
if(b=='0'){alert("select channel partner");}
else{ 
$.ajax({
		type: "POST",
	       url: "<?php print base_url();?>index.php/channel_partners/add_other_commission_details/"+b,
	       data: $("#other").serialize(),
		success: function(datam)
            { 
             alert(datam);
            }
});
}

});




   $("#overlay-bx").click(function(){
$("#number-low").hide(400);
$("#overlay-bx").hide(400);

});
$("#overlay-bx").click(function(){
$("#number-medium").hide(400);
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

			
	$("#commission").change(function() {
    if(this.checked){
        
     $("#agreed_box").show();
        return false; 
       }
       if(!this.checked)
        {
            
          $("#agreed_box").hide();
        return false;
         }	
	});
$("#submission_status").change(function() {
if(this.checked){
    
     $("#sub0").show();
     $("#sub1").show();    
     $("#sub3").show();
     $("#sub5").show();    
     $("#sub11").show();
     $("#sub17").show();

      return false; 
      }
       if(!this.checked)
        {
         $("#sub0").hide();
         $("#sub1").hide();    
     	  $("#sub3").hide();
         $("#sub5").hide();    
         $("#sub11").hide();
         $("#sub17").hide();

        return false;
         }

});
$("#expect").change(function(){
	if(this.checked){
	$("#sub2").show();
	return false;
	}
	if(!this.checked)
	{
	$("#sub2").hide();
	return false;
	}
});
$("#rec_hdd").change(function(){
	if(this.checked){
	$("#sub4").show();
	return false;
	}
	if(!this.checked)
	{
	$("#sub4").hide();
	return false;
	}

});
$("#res_status").change(function(){
	if(this.checked){
	$("#sub6").show();
	return false;
	}
	if(!this.checked)
	{
	$("#res1").prop('checked',false);
	$("#res2").prop('checked',false);
	$("#res3").prop('checked',false);
	$("#sub6").hide();
	$("#sub7").hide();
	$("#sub8").hide();
	$("#sub9").hide();
	$("#sub10").hide();
	return false;
	}
});
$("#upload_stat").change(function(){
	if(this.checked){
	$("#sub12").show();
	return false;
	}
	if(!this.checked){
       $("#up1").prop('checked',false);
	$("#up2").prop('checked',false);
	$("#up3").prop('checked',false);
	$("#sub12").hide();
       $("#sub13").hide();
	$("#sub14").hide();
	$("#sub15").hide();
	$("#sub16").hide();

	return false;
	}
});
$("#res1").click(function(){
	$("#sub8").hide();
	$("#sub9").hide();
	$("#sub10").hide();
	$("#sub7").show();
});
$("#res2").click(function(){
	$("#sub8").show();
	$("#sub9").hide();
	$("#sub10").hide();
	$("#sub7").hide();
});
$("#res3").click(function(){
	$("#sub9").show();
	$("#sub10").show();
	$("#sub8").hide();
	$("#sub7").hide();

});
$("#up1").click(function(){
	$("#sub14").hide();
	$("#sub15").hide();
	$("#sub16").hide();
	$("#sub13").show();
});
$("#up2").click(function(){
	$("#sub14").show();
	$("#sub13").hide();
	$("#sub15").hide();
	$("#sub16").hide();
});
$("#up3").click(function(){
	$("#sub15").show();
	$("#sub16").show();
	$("#sub13").hide();
	$("#sub14").hide();

});
$("#num_img_liv").change(function(){
if(this.checked)
{
	$("#sub18").show();
}
if(!this.checked)
{
	$("#sub18").hide();
}
});

$("#content_form").submit(function(){
if($("#code2").val()=="0")
  {
	$("#cp_error").html("select Channel Partner Name");
	return false;
  }
 else if($("#con_status").val()=="0")
  {
	$("#cp_error").html("");
	$("#con_error").html("Select Contract Status");
	return false;
  }
  else{
	$("#cp_error").html("");
	$("#con_error").html("");
          return true;

   }
    
	});
  });

	function show_popup(a)
	{
		$("#number-"+a).show(400);
		$("#overlay-bx").show();
	}


	</script>



<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Add Content In Loop</div>
<div class="add-newcp"><span style="color:#F00"><?php  print $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form name="content_form" action="<?php echo base_url();?>index.php/channel_partners/add_content_in_loop" method="post" id="content_form">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr class="toptr">
    <td>Channel partner Name*</td>
    <td><select name="code2" id="code2" class="inputs" >
         <option value="0">Select</option>
          <?php foreach($list as $lists){?>
         <option value="<?php print $lists->channel_partner_id;?>"><?php print $lists->channel_partner_name;?></option>
         <?php } ?>
      </select><br/><span id="cp_error" style="color:#F00" ></span></td>
    
    <td>Contract Status*</td>
    <td><select id="con_status" name="con_status" class="inputs">
        <option value="0">Select Status</option>
        <option value="1">Waiting</option>
        <option value="2">Signed</option>
        </select>
        <br/><span id="con_error" style="color:#F00" ></span>
       </td>
  </tr>
  <tr class="toptr">
    
    <td>
        <input type="checkbox" name="submission_status" id="submission_status"/>&nbsp;&nbsp;Submission_status
        
    </td>
    </tr>
     <tr class="toptr" style="display:none;" id="sub0">
     <td>Submission Status &nbsp;<?php echo $max;?></td></tr>

    <tr class="toptr" style="display:none;" id="sub1">
     <td><input type="checkbox" name="expect" id="expect" />&nbsp;&nbsp;Expected Date of Receiving HDD</td>
     </tr>
     <tr class="toptr" style="display:none;" id="sub2">
     <td><input type="text" name="ex_dt_rd" id="ex_dt_rd" class="inputbxs"  style="width:300px;"placeholder="Expected Date Of Receiving HDD(YYYY-MM-DD)">
     </td> 
     </tr>
     
     <tr class="toptr" style="display:none;" id="sub3">
      <td><input type="checkbox" name="rec_hdd" id="rec_hdd"/>&nbsp;&nbsp;Received HDD</td>
      </tr>
       <tr class="toptr" style="display:none;" id="sub4">
       <td><input type="text" name="rec_img" id="rec_img" class="inputbxs" placeholder="No Of Images"></td>
      <td><input type="text" name="rec_date" id="rec_date" class="inputbxs" placeholder="YYYY-MM-DD"></td>
      </tr>

      <tr class="toptr" style="display:none;" id="sub5">
      <td><input type="checkbox" name="res_status" id="res_status"/>&nbsp;&nbsp;Resize Status</td>
      </tr>
      <tr class="toptr" style="display:none;" id="sub6">
      <td><input type="radio" name="res" value="0" id="res1">&nbsp;&nbsp;Pending</input></td>
      <td><input type="radio" name="res" value="1" id="res2">&nbsp;&nbsp;Working</input></td>
      <td><input type="radio" name="res" value="2" id="res3">&nbsp;&nbsp;Completed</input></td>
      </tr>
       
      <tr class="toptr">
      <td style="display:none;" id="sub7"><input type="text" name="res_pending_date" id="res_pending_date" style="width:300px;" placeholder="Expected Working Date(YYYY-MM-DD)" class="inputbxs"/></td>
      <td style="display:none;" id="sub8"><input type="text" name="res_working_date" id="res_working_date" style="width:300px;" placeholder="Expected Completion Date(YYYY-MM-DD)" class="inputbxs"/></td>
      <td style="display:none;" id="sub9"><input type="text" name="res_comp_img" id="res_comp_img" placeholder="No Of Images" class="inputbxs"/></td>
      <td style="display:none;" id="sub10"><input type="text" name="res_comp_date" id="res_comp_date" style="width:300px;" placeholder="Completion Date(YYYY-MM-DD)" class="inputbxs"></td>
      </tr>

      <tr class="toptr" style="display:none;" id="sub11">
      <td><input type="checkbox" name="upload_stat" id="upload_stat"/>&nbsp;&nbsp;Upload Status</td>
      </tr>
      <tr class="toptr" style="display:none;" id="sub12">
      <td><input type="radio" name="up" id="up1">&nbsp;&nbsp;Pending</input></td>
      <td><input type="radio" name="up" id="up2">&nbsp;&nbsp;Working</input></td>
      <td><input type="radio" name="up" id="up3">&nbsp;&nbsp;Completed</input></td>
      </tr>      
     
     <tr class="toptr">
      <td style="display:none;" id="sub13"><input type="text" name="up_pending_date" id="up_pending_date" style="width:300px;" placeholder="Expected Working Date(YYYY-MM-DD)" class="inputbxs"/></td>
      <td style="display:none;" id="sub14"><input type="text" name="up_working_date" id="up_working_date" style="width:300px;" placeholder="Expected Completion Date(YYYY-MM-DD)" class="inputbxs"/></td>
      <td style="display:none;" id="sub15"><input type="text" name="up_comp_img" id="up_comp_img" placeholder="No Of Images" class="inputbxs"/></td>
      <td style="display:none;" id="sub16"><input type="text" name="up_comp_date" id="up_comp_date" style="width:300px;" placeholder="Completion Date(YYYY-MM-DD)" class="inputbxs"></td>
      </tr>
      
       
      <tr class="toptr" style="display:none;" id="sub17">
      <td><input type="checkbox" name="num_img_liv" id="num_img_liv" />&nbsp;&nbsp;Number of Images Live(Date)</td>
      </tr>
      <tr class="toptr" style="display:none;" id="sub18">
      <td><input type="text" name="img_live" id="img_live" class="inputbxs" placeholder="Number of Images Live"><br/>
      <td><input type="text" name="img_live_date" id="img_live_date" class="inputbxs" style="width:300px;" placeholder="Number of Images Live[Date(YYYY-MM-DD)]">
      </td>
      </tr>


  <tr class="toptr">
    <td>
            <input type="checkbox" name="commission" id="commission"/>&nbsp;&nbsp;Commission
    </td>
   </tr>
      <td id="agreed_box" style="display:none;">
         <select name="commission" id="commission" onchange="show_popup(this.value);">
<option value="0">Please Select</option>
<option value="low">Low</option>
<option value="medium">Medium</option>
<option value="high">High</option>
<option value="other">Other(plz specify)</option>
</select>
 </td>
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="addcin" id="addcin" value="Add" class="bt-add" /></td>
  </tr>
</table>

</form>
</div>





</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>


<div class="my_tgl_bxx_new" id="number-low" style="display:none;">Low Range of Pricing
<table border="1">
<tr>
<th>Size</th>
<th>License Cost(Dollars)</th>
<th>License Cost(Rupees)</th>
<th>Commission %</td>
<th>Channel partner share</th>
<th>Wallsnart share</th>
</tr><form name="low" id="low">
<tr>
<td>Smallest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;600</td>
<td><input type="text"  name="commission_per10" id="commission_per10" style="width:70px;" 
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share10').value='';
                                           document.getElementById('wallsnart_share10').value='';}"
onblur="if(this.value){var k1=this.value; var j1=(600*k1)/100; var i1=600-j1;
                       document.getElementById('channel_partner_share10').value=j1;
                       document.getElementById('wallsnart_share10').value=i1;}">
</td>
<td><input type="text" name="channel_partner_share10" id="channel_partner_share10" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share10" id="wallsnart_share10" style="width:70px;" readonly></td>
</tr>

<tr>
<td>Small</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1200</td>
<td><input type="text" name="commission_per20" id="commission_per20" style="width:70px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share20').value='';
                                           document.getElementById('wallsnart_share20').value='';}"
onblur="if(this.value){var k2=this.value; var j2=(1200*k2)/100; var i2=1200-j2;
                       document.getElementById('channel_partner_share20').value=j2;
                       document.getElementById('wallsnart_share20').value=i2;}"></td>
<td><input type="text" name="channel_partner_share20" id="channel_partner_share20" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share20" id="wallsnart_share20" style="width:70px;" readonly></td>
</tr>
<tr><td>Medium</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;40</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2400</td>
<td><input type="text" name="commission_per30" id="commission_per30"style="width:70px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share30').value='';
                                           document.getElementById('wallsnart_share30').value='';}"
onblur="if(this.value){var k3=this.value; var j3=(2400*k3)/100; var i3=2400-j3;
                       document.getElementById('channel_partner_share30').value=j3;
                       document.getElementById('wallsnart_share30').value=i3;}"></td>
<td><input type="text" name="channel_partner_share30" id="channel_partner_share30" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share30" id="wallsnart_share30" style="width:70px;" readonly></td>
</tr>
<tr>
<td>Large</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3000</td>
<td><input type="text" name="commission_per40" id="commission_per40" style="width:70px;" 
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share40').value='';
                                           document.getElementById('wallsnart_share40').value='';}"
onblur="if(this.value){var k4=this.value; var j4=(3000*k4)/100; var i4=3000-j4;
                       document.getElementById('channel_partner_share40').value=j4;
                       document.getElementById('wallsnart_share40').value=i4;}"></td>
<td><input type="text" name="channel_partner_share40" id="channel_partner_share40" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share40" id="wallsnart_share40" style="width:70px;" readonly></td>
</tr>
<tr>
<td>Largest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3600</td>
<td><input type="text" name="commission_per50" id="commission_per50" style="width:70px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share50').value='';
                                           document.getElementById('wallsnart_share50').value='';}"
onblur="if(this.value){var k5=this.value; var j5=(3600*k5)/100; var i5=3600-j5;
                       document.getElementById('channel_partner_share50').value=j5;
                       document.getElementById('wallsnart_share50').value=i5;}"></td>
<td><input type="text" name="channel_partner_share50" id="channel_partner_share50" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share50" id="wallsnart_share50" style="width:70px;" readonly></td>
</tr>
<tr><td></td><td></td><td></td><td></td><td></td><td><br/><input type="button" name="low_add_commission" id="low_add_commission" value="Add" class="bt-add-tooltip"/></td></tr>
</form></table> 
</div>
<div class="my_tgl_bxx_new" id="number-medium" style="display:none;">Mid Range of Pricing
<table border="1">
<tr>
<th>Size</th>
<th>License Cost(Dollars)</th>
<th>License Cost(Rupees)</th>
<th>Commission %</td>
<th>Channel partner share</th>
<th>Wallsnart share</th>
</tr>
<form name="mid" id="mid">
<tr>
<td>Smallest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;600</td>
<td><input type="text"  name="commission_per11" id="commission_per11" style="width:70px;" 
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share11').value='';
                                           document.getElementById('wallsnart_share11').value='';}"
onblur="if(this.value){var k1=this.value; var j1=(600*k1)/100; var i1=600-j1;
                       document.getElementById('channel_partner_share11').value=j1;
                       document.getElementById('wallsnart_share11').value=i1;}">
</td>
<td><input type="text" name="channel_partner_share11" id="channel_partner_share11" style="width:70px;"readonly></td>
<td><input type="text" name="wallsnart_share11" id="wallsnart_share11" style="width:70px;"></td>
</tr>

<tr>
<td>Small</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1200</td>
<td><input type="text" name="commission_per21" id="commission_per21" style="width:70px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share21').value='';
                                           document.getElementById('wallsnart_share21').value='';}"
onblur="if(this.value){var k2=this.value; var j2=(1200*k2)/100; var i2=1200-j2;
                       document.getElementById('channel_partner_share21').value=j2;
                       document.getElementById('wallsnart_share21').value=i2;}"></td>
<td><input type="text" name="channel_partner_share21" id="channel_partner_share21" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share21" id="wallsnart_share21" style="width:70px;" readonly></td>
</tr>
<tr><td>Medium</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;40</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2400</td>
<td><input type="text" name="commission_per31" id="commission_per31"style="width:70px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share3').value='';
                                           document.getElementById('wallsnart_share31').value='';}"
onblur="if(this.value){var k3=this.value; var j3=(2400*k3)/100; var i3=2400-j3;
                       document.getElementById('channel_partner_share31').value=j3;
                       document.getElementById('wallsnart_share31').value=i3;}"></td>
<td><input type="text" name="channel_partner_share31" id="channel_partner_share31" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share31" id="wallsnart_share31" style="width:70px;" readonly></td>
</tr>
<tr>
<td>Large</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3000</td>
<td><input type="text" name="commission_per41" id="commission_per41" style="width:70px;" 
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share41').value='';
                                           document.getElementById('wallsnart_share41').value='';}"
onblur="if(this.value){var k4=this.value; var j4=(3000*k4)/100; var i4=3000-j4;
                       document.getElementById('channel_partner_share41').value=j4;
                       document.getElementById('wallsnart_share41').value=i4;}"></td>
<td><input type="text" name="channel_partner_share41" id="channel_partner_share41" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share41" id="wallsnart_share41" style="width:70px;" readonly></td>
</tr>
<tr>
<td>Largest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3600</td>
<td><input type="text" name="commission_per51" id="commission_per51" style="width:70px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share51').value='';
                                           document.getElementById('wallsnart_share51').value='';}"
onblur="if(this.value){var k5=this.value; var j5=(3600*k5)/100; var i5=3600-j5;
                       document.getElementById('channel_partner_share51').value=j5;
                       document.getElementById('wallsnart_share51').value=i5;}"></td>
<td><input type="text" name="channel_partner_share51" id="channel_partner_share51" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share51" id="wallsnart_share51" style="width:70px;" readonly></td>
</tr>
<tr><td></td><td></td><td></td><td></td><td></td><td><br/><input type="button" name="mid_add_commission" id="mid_add_commission" value="Add" class="bt-add-tooltip"/></td></tr>
</form></table>
</div>

<div class="my_tgl_bxx_new" id="number-high" style="display:none;">High Range of Pricing
<table border="1">
<tr>
<th>Size</th>
<th>License Cost(Dollars)</th>
<th>License Cost(Rupees)</th>
<th>Commission %</td>
<th>Channel partner share</th>
<th>Wallsnart share</th>
</tr>

<form name="high" id="high">
<tr>
<td>Smallest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;600</td>
<td><input type="text"  name="commission_per12" id="commission_per12" style="width:70px;" 
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share12').value='';
                                           document.getElementById('wallsnart_share12').value='';}"
onblur="if(this.value){var k1=this.value; var j1=(600*k1)/100; var i1=600-j1;
                       document.getElementById('channel_partner_share12').value=j1;
                       document.getElementById('wallsnart_share12').value=i1;}">
</td>
<td><input type="text" name="channel_partner_share12" id="channel_partner_share12" style="width:70px;"readonly></td>
<td><input type="text" name="wallsnart_share12" id="wallsnart_share12" style="width:70px;" readonly></td>
</tr>

<tr>
<td>Small</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1200</td>
<td><input type="text" name="commission_per22" id="commission_per22" style="width:70px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share22').value='';
                                           document.getElementById('wallsnart_share22').value='';}"
onblur="if(this.value){var k2=this.value; var j2=(1200*k2)/100; var i2=1200-j2;
                       document.getElementById('channel_partner_share22').value=j2;
                       document.getElementById('wallsnart_share22').value=i2;}"></td>
<td><input type="text" name="channel_partner_share22" id="channel_partner_share22" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share22" id="wallsnart_share22" style="width:70px;" readonly></td>
</tr>
<tr><td>Medium</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;40</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2400</td>
<td><input type="text" name="commission_per32" id="commission_per32"style="width:70px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share32').value='';
                                           document.getElementById('wallsnart_share32').value='';}"
onblur="if(this.value){var k3=this.value; var j3=(2400*k3)/100; var i3=2400-j3;
                       document.getElementById('channel_partner_share32').value=j3;
                       document.getElementById('wallsnart_share32').value=i3;}"></td>
<td><input type="text" name="channel_partner_share32" id="channel_partner_share32" style="width:70px;"readonly></td>
<td><input type="text" name="wallsnart_share32" id="wallsnart_share32" style="width:70px;" readonly></td>
</tr>
<tr>
<td>Large</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3000</td>
<td><input type="text" name="commission_per42" id="commission_per42" style="width:70px;" 
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share42').value='';
                                           document.getElementById('wallsnart_share42').value='';}"
onblur="if(this.value){var k4=this.value; var j4=(3000*k4)/100; var i4=3000-j4;
                       document.getElementById('channel_partner_share42').value=j4;
                       document.getElementById('wallsnart_share42').value=i4;}"></td>
<td><input type="text" name="channel_partner_share42" id="channel_partner_share42" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share42" id="wallsnart_share42" style="width:70px;" readonly></td>
</tr>
<tr>
<td>Largest</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3600</td>
<td><input type="text" name="commission_per52" id="commission_per52" style="width:70px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share52').value='';
                                           document.getElementById('wallsnart_share52').value='';}"
onblur="if(this.value){var k5=this.value; var j5=(3600*k5)/100; var i5=3600-j5;
                       document.getElementById('channel_partner_share52').value=j5;
                       document.getElementById('wallsnart_share52').value=i5;}"></td>
<td><input type="text" name="channel_partner_share52" id="channel_partner_share52" style="width:70px;" readonly></td>
<td><input type="text" name="wallsnart_share52" id="wallsnart_share52" style="width:70px;" readonly></td>
</tr>
<tr><td></td><td></td><td></td><td></td><td></td><td><br/><input type="button" name="high_add_commission" id="high_add_commission" value="Add" class="bt-add-tooltip"/></td></tr>
</form></table></div>
<div class="my_tgl_bxx_new" id="number-other" style="display:none;">Others
<br/><br/>
<table border="1">
<tr>
<th>Size</th>
<th>License Cost(Dollars)</th>
<th>License Cost(Rupees)</th>
<th>Commission %</td>
<th>Channel partner share</th>
<th>Wallsnart share</th>
</tr><form name="other" id="other">
<tr>
<td><input type="text" name="size1" id="size1" placeholder="size" style="width:40px;"></td>
<td><input type="text" name="lic_dol1" id="lic_dol1" placeholder="License Cost(Dollars)" style="width:90px;"></td>
<td><input type="text" name="lic_rs1" id="lic_rs1" placeholder="License Cost(Rs)" style="width:90px;"></td>
<td><input type="text" name="commission_per1" id="commission_per1" placeholder="Commission%" style="width:90px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share1').value='';
                                       document.getElementById('wallsnart_share1').value='';}"
onblur="if(this.value){var k1=this.value;  
var b1=document.getElementById('lic_rs1').value;
var j1=(b1*k1)/100; var i1=b1-j1;
                       document.getElementById('channel_partner_share1').value=j1;
                       document.getElementById('wallsnart_share1').value=i1;}"></td>
<td><input type="text" name="channel_partner_share1" id="channel_partner_share1" placeholder="Channel pt share" style="width:100px;" readonly></td>
<td><input type="text" name="wallsnart_share1" id="wallsnart_share1" placeholder="Wallsnart share" style="width:100px;"readonly></td>

</tr>
<tr>
<td><input type="text" name="size2" id="size2" placeholder="size" style="width:40px;"></td>
<td><input type="text" name="lic_dol2" id="lic_dol2" placeholder="License Cost(Dollars)" style="width:90px;"></td>
<td><input type="text" name="lic_rs2" id="lic_rs2" placeholder="License Cost(Rs)" style="width:90px;"></td>
<td><input type="text" name="commission_per1" id="commission_per1" placeholder="Commission%" style="width:90px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share2').value='';
                                       document.getElementById('wallsnart_share2').value='';}"
onblur="if(this.value){var k2=this.value;  
var b2=document.getElementById('lic_rs2').value;
var j2=(b2*k2)/100; var i2=b2-j2;
                       document.getElementById('channel_partner_share2').value=j2;
                       document.getElementById('wallsnart_share2').value=i2;}"></td>
<td><input type="text" name="channel_partner_share2" id="channel_partner_share2" placeholder="Channel pt share" style="width:100px;"readonly></td>
<td><input type="text" name="wallsnart_share2" id="wallsnart_share2" placeholder="Wallsnart share" style="width:100px;"readonly></td>

</tr>
<tr>
<td><input type="text" name="size3" id="size3" placeholder="size" style="width:40px;"></td>
<td><input type="text" name="lic_dol3" id="lic_dol3" placeholder="License Cost(Dollars)" style="width:90px;"></td>
<td><input type="text" name="lic_rs3" id="lic_rs3" placeholder="License Cost(Rs)" style="width:90px;"></td>
<td><input type="text" name="commission_per1" id="commission_per1" placeholder="Commission%" style="width:90px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share3').value='';
                                       document.getElementById('wallsnart_share3').value='';}"
onblur="if(this.value){var k3=this.value;  
var b3=document.getElementById('lic_rs3').value;
var j3=(b3*k3)/100; var i3=b3-j3;
                       document.getElementById('channel_partner_share3').value=j3;
                       document.getElementById('wallsnart_share3').value=i3;}"></td>
<td><input type="text" name="channel_partner_share3" id="channel_partner_share3" placeholder="Channel pt share" style="width:100px;"readonly></td>
<td><input type="text" name="wallsnart_share3" id="wallsnart_share3" placeholder="Wallsnart share" style="width:100px;"readonly></td>

</tr>
<tr>
<td><input type="text" name="size4" id="size4" placeholder="size" style="width:40px;"></td>
<td><input type="text" name="lic_dol4" id="lic_dol4" placeholder="License Cost(Dollars)" style="width:90px;"></td>
<td><input type="text" name="lic_rs4" id="lic_rs4" placeholder="License Cost(Rs)" style="width:90px;"></td>
<td><input type="text" name="commission_per1" id="commission_per1" placeholder="Commission%" style="width:90px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share4').value='';
                                       document.getElementById('wallsnart_share4').value='';}"
onblur="if(this.value){var k4=this.value;  
var b4=document.getElementById('lic_rs4').value;
var j4=(b4*k4)/100; var i4=b4-j4;
                       document.getElementById('channel_partner_share4').value=j4;
                       document.getElementById('wallsnart_share4').value=i4;}"></td>
<td><input type="text" name="channel_partner_share4" id="channel_partner_share4" placeholder="Channel pt share" style="width:100px;"readonly></td>
<td><input type="text" name="wallsnart_share4" id="wallsnart_share4" placeholder="Wallsnart share" style="width:100px;"readonly></td>

</tr>
<tr>
<td><input type="text" name="size5" id="size5" placeholder="size" style="width:40px;"></td>
<td><input type="text" name="lic_dol5" id="lic_dol5" placeholder="License Cost(Dollars)" style="width:90px;"></td>
<td><input type="text" name="lic_rs5" id="lic_rs5" placeholder="License Cost(Rs)" style="width:90px;"></td>
<td><input type="text" name="commission_per1" id="commission_per1" placeholder="Commission%" style="width:90px;"
onfocus="if(this.value!=this.defaultvalue){document.getElementById('channel_partner_share5').value='';
                                       document.getElementById('wallsnart_share5').value='';}"
onblur="if(this.value){var k5=this.value;  
var b5=document.getElementById('lic_rs5').value;
var j5=(b5*k5)/100; var i5=b5-j5;
                       document.getElementById('channel_partner_share5').value=j5;
                       document.getElementById('wallsnart_share5').value=i5;}"></td>
<td><input type="text" name="channel_partner_share5" id="channel_partner_share5" placeholder="Channel pt share" style="width:100px;"readonly></td>
<td><input type="text" name="wallsnart_share5" id="wallsnart_share5" placeholder="Wallsnart share" style="width:100px;"readonly></td>
</tr>
<tr><td></td><td></td><td></td><td></td><td></td><td><br/><input type="button" name="other_add_commission" id="other_add_commission" value="Add" class="bt-add-tooltip"/></td></tr>
</form>
</table>
</div>


<!--MIDDLE PAGE WRAPPER ENDS--></div>


