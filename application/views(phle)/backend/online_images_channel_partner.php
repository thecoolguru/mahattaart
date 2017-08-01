           

    <?php 
$num=$this->channel_partner_model->get_online_images($list->cp_id);?>
         <tr>
          <td><?php echo $list->channel_partner_name;?></td>
          <td><?php echo $list->cp_id; ?></td>
          <td>&nbsp;</td>
         <td><?= $num;?></td>
          
          </tr>
         