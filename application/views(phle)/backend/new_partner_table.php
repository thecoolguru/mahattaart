
        <tr><?php $com=$this->channel_partner_model->get_commission_details($partner->channel_partner_id);?>
          <td><?php echo $partner->channel_partner_name;?></td>
          <td><?= $partner->contact_person_name; ?></td>
          <td><?= $partner->designation;?></td>
          <td><?= $partner->email_id;?></td>
          <td><?= $partner->first_name;?></td>
          <td><?= $partner->last_name;?></td>
          <td><?= $partner->cp_id;?></td>
          <td><?= $partner->password;?></td>
          <td><?php if($partner->status==1){ print "Active";}else{ print "Inactive";}?></td>
          <td><?php print $partner->address1.$partner->address2.",".$partner->city.",".$partner->state.",".$partner->country.",".$partner->pin_code;?></td>
          <td><?= $partner->contact_no ;?></td>
          <td><?php echo $partner->product_types;?></td>
          <td><?php echo $partner->product_sources;?></td>
          <!--<td><?= $partner->area_of_interest;?></td>-->
          <td><?= $com->commission_type;?>
          <td><a href="#"  onclick="return PhotographersSalesList();" >view sales</a></td>
          <td><?php if($partner->contract_file_url){ ?><a href="<?php echo base_url()."uploaded_pdf/".$partner->contract_file_url;?>" target="_blank">view contract</a><?php }else{ print "not uploaded";}?></a></td>
          <!--<td><a href="#" class="menuanchorclass" rel="anylinkmenu1a">More..</a></td>-->
          <td><a href="<?php echo base_url();?>index.php/channel_partners/edit_channel_partner/<?php echo $partner->channel_partner_id;?>">Edit</a></td>
          </tr>
         