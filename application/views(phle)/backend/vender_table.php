<div id="middle-wrapper">
<div id="middle-container"> 
<div class="main-hdr"> Vendor Details</div>

<div class="view-cp">


<div class="view-cp-list">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr  id="vendor_name">
  <?php if($print) {
 ?>      
      <td>
      <div class="viewcplist-inner">
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
          <td width="150">Code </td>
          <td width="150">Company Name</td>
          <td width="120">Contact Person Name</td>
          <td width="120">Email Id</td>
          <td width="120">City</td>
          <td width="60">Region </td>
          <td width="100">Status</td>
          <td width="80">Services Offered</td>
          
              
          </tr>
          
               
 <tbody>   
<tr>
<td><?php echo $print->vender_code;?></td>
<td><?php echo $print->vender_company_name;?></td>
<td><?php echo $print->vender_contact_person_name;?></td>
<td><?php echo $print->vender_email_id;?></td>
<td><?php echo $print->vender_city;?></td>
<td><?php echo $print->vender_region;?></td>
<td><?php if($print->vender_status=='1'){print "Active";} else{ print "Inactive";}?></td>
<td><?php echo $print->vender_services_offered;?></td>
</tr>   
    </tbody>
   <?php }?>
   
          </table>
        </div>
          
   
            
    
    </tr>
   
     <tr>
           <td><p>&nbsp;</p>
             <p>&nbsp;</p>
             <div  style="font-size:16px"><?php if($print->vender_type=='1'){?> Surface Details<?php } else if($print->vender_type=='2'){?> Framenmount Details <?php }?></div><br />
             <?php if($print->vender_type=='1'){  ?>      
           <div class="viewcplist-inner">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr class="hdrs">
                   <td width="150">Vender Code </td>
                   <td width="150">Surface Item Code</td>
                   <td width="120">Surface Type</td>
                   <td width="120">Surface cost per inch</td>
                   <td width="120">Surface created date</td>
                   <td width="60">Surface stock status</td>
                   <td width="100">Surface Status</td>
                   <td width="80">Surface sale price</td>
                   <td width="80">Surface Recommended</td>
                 </tr>
                 <tbody>
                   <?php foreach ($printer as $printer_details) {?>
                   <tr>
                     <td><?php echo $printer_details['vender_code'];?></td>
                    <td><?php echo $printer_details['surface_item_code'];?></td>
                    <td><?php echo $printer_details['surface_type'];?></td>
                    <td><?php echo $printer_details['surface_cost_per_inch'];?></td>
                    <td><?php echo $printer_details['surface_created_date'];?></td>
                    <td><?php if($printer_details['surface_stock_status']){ print "Yes";} else{ print "No" ;}?></td>
                    <td><?php if($printer_details['surface_status']=='1'){print "Active";}else { print "Inactive";}?></td>
                    <td><?php echo $printer_details['surface_sale_price'];?></td>
                    <td><?php if($printer_details['surface_recommended']=='1'){print "Yes";} else {print "No";}?></td>
                   </tr> <?php } ?>
                 </tbody>
               </table>
             </div>
             <?php }  else if($print->vender_type=='2'){  ?>
             
               <div class="viewcplist-inner">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr class="hdrs">
                   <td width="150">Vendor Code</td>
          <td width="120"> Code</td>
          <td width="120"> Type</td>
          <td width="60"> Width</td>
          <td width="100">Created date</td>
          <td width="80">Colour</td>
          <td width="80">Cost infeet</td>
          <td width="80">Availability status</td>
          <td width="80">Status</td>
          <td width="80">Sale price</td>
          <td width="80">Recommended</td>
          <td width="80">Thickness</td>          
          
                 </tr>
                 <tbody>
               <?php foreach ($framer as $frame) {?>    <tr>
                     
<td><?php echo $frame['vender_code'];?></td>
<td><?php echo $frame['framenmount_code'];?></td>
<td><?php echo $frame['framenmount_type'];?></td>
<td><?php echo $frame['framenmount_width'];?></td>
<td><?php echo $frame['framenmount_created_date'];?></td>
<td><?php echo $frame['framenmount_colour'];?></td>
<td><?php echo $frame['framenmount_cost_in_feet'];?></td>
<td><?php echo $frame['framenmount_availability_status'];?></td>
<td><?php if($frame['framenmount_status']=='1'){print "Active"; }else { print "Inactive";}?></td>
<td><?php echo $frame['framenmount_sale_price'];?></td>
<td><?php echo $frame['framenmount_recommended'];?></td>
<td><?php echo $frame['framenmount_thickness'];?></td>
                   </tr>
                   <?php  }?>
                 </tbody>
               </table>
             </div>
             <?php }?>
             <p>&nbsp;</p>           </tr>
    </table>
    
    </div>
  </div>
  </div>