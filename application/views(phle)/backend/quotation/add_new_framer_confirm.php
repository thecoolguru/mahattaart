
<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> New Framer Added</div>

<div class="add-newcp">
<div style="margin:25px 0; padding:25px; background:#f7f7f7">A New Framer has been added in the records with following details:</div>
<form>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#e5e5e5">
    <td width="200">Personal / Company Information</td>
    <td>&nbsp;</td>
    </tr>
  <tr class="toptr">
    <td>Name</td>
    <td><?php print $vender_details->vender_company_name;?></td>
    </tr>
  <tr class="toptr">
    <td>Contact No</td>
    <td><?php print $vender_details->vender_contact_no;?></td>
  </tr>
  <tr class="toptr">
    <td>Email Id</td>
    <td><?php print $vender_details->vender_email_id;?></td>
  </tr>
  <tr class="toptr">
    <td>Address</td>
    <td><?php print $vender_details->vender_address;?></td>
  </tr>
  <tr class="toptr">
    <td>City</td>
    <td><?php print $vender_details->vender_city;?></td>
  </tr>
  <tr class="toptr">
    <td>State</td>
    <td><?php print $vender_details->vender_state;?></td>
  </tr>
  <tr class="toptr">
    <td>Pin Code</td>
    <td><?php print $vender_details->vender_pin_code;?></td>
  </tr>
  <tr class="toptr">
    <td>Vendor Status</td>
    <td><?php if($vender_details->vender_status==0){print "Inactive";}else{print "Active";}?></td>
  </tr>
  
  <tr class="toptr">
    <td>Time Taken to Complete the Process</td>
    <td><?php print $vender_details->vender_time_taken;?></td>
  </tr>
  <tr class="toptr">
    <td>Services Offered</td>
    <td><?php print $vender_details->vender_services_offered;?></td>
  </tr>
 
  
  <tr style="background:#e5e5e5">
    <td>Frame Details</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Frame Type</td>
    <td>
	  <?php print $frame_details->frame_type; ?>
	</td>
    </tr>
  <tr>
    <td>Width/Inches of Frame</td>
    <td>
     <?php print $frame_details->frame_width; ?> 
    </tr>
  <tr>
    <td>Color</td>
    <td><?php print $frame_details->frame_colour; ?>
	</td>
    </tr>
  <tr>
    <td>Cost Per Running Feet</td>
    <td>
	<?php print $framenmount_details[0]['framenmount_cost_in_feet']; ?></td>
    </tr>
  
	 <tr>
    <td>Stock Availability Status</td>
    <td><?php if($framenmount_details[0]['framenmount_availability_status']==0){print "No";}else{print "Yes";} ?></td>
    </tr>
	 <tr>
    <td>Status</td>
    <td><?php if($framenmount_details[0]['framenmount_status']==0){print "Inactive";}else{print "Active";} ?></td>
    </tr>
	 <tr>
    <td>Selling Price</td>
    <td><?php print $framenmount_details[0]['framenmount_sale_price']; ?></td>
    </tr>
	 <tr style="background:#e5e5e5">
    <td>Mount Details</td>
    <td>&nbsp;</td>
  </tr>
  <td>Mount Type</td>
    <td>
	 <?php print $mount_details->mount_type?> 
	</td>
	 <tr>
    <td>Color</td>
    <td><?php print $mount_details->mount_colour?></td>
    </tr>
	 <tr>
    <td>Thickness</td>
    <td><?php print $mount_details->framenmount_thickness?></td>
    </tr>
	<tr>
    <td>Cost Per Sq. Feet</td>
    <td><?php print $framenmount_details[1]['framenmount_cost_in_feet']; ?></td>
    </tr>
	<tr>
	 
	 <tr>
    <td>Stock Availability Status</td>
    <td><?php if($framenmount_details[1]['framenmount_availability_status']==0){print "No";}else{print "Yes";} ?></td>
    </tr>
	 <tr>
    <td>Status</td>
    <td><?php if($framenmount_details[1]['framenmount_status']==0){print "Inactive";}else{print "Active";} ?></td>
    </tr>
	 <tr>
    <td>Selling Price</td>
    <td><?php print $framenmount_details[1]['framenmount_sale_price']; ?></td>
    </tr>
	<tr>
    <td>Recommended</td>
    <td><?php if($framenmount_details[1]['framenmount_recommended']==0){print "No";}else{print "Yes";} ?></td>
    </tr>
   
  <tr>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>


</form>
</div>






</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>



