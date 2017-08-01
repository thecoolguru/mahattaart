
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
    <title>Create / Edit Quotation</title>
    <link href="<?php echo base_url()?>assets/css/fonts.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/css/wallsnart1.0.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.easing.1.3.js"></script>

    <!--TOP MENU SCRIPT-
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" type="text/css" />
            <script type="text/javascript" src="<?php echo base_url()?>assets/js/top-menu-script.js"></script>-->

    <script type="text/javascript">
        function printDiv(print) {
            var printContents = document.getElementById(print).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
<?php
               /* header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("content-disposition: attachment;filename=test.doc");*/ ?>

    </script>
</head>

<body>
<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    <div id="middle-container">
        <form action="<?php  echo base_url()?>index.php/quotation/send_mails_quotation" name="print_quotation" id="print_quotation">
        <div class="main-hdr"> Print Quotation</div>
        <div class="print-quote" id="print" name="print" >
            <?php foreach($quotation as $detail){ //print_r ($detail);?>

                <table width="80%" border="0" cellpadding="0" cellspacing="0" class="toptr2">
                    <tr>
                        <td width="30%">Quotation No</td>
                        <td><?php echo $detail->id;?></td>
                    </tr>
                    <tr class="toptr">
                        <td>Quotation Date</td>
                        <td><?php echo $detail->quotation_date;?></td>
                    </tr>
                    <tr class="toptr">
                        <td>JOB No</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php $customer_details=$this->quotation_model->get_cust_detail($detail->customer_id);
                    foreach($customer_details as $cust_data){?>
                    <tr>
                        <td>Company Name</td>
                        <td><?php echo $cust_data->company_name;?></td>
                    </tr>
                    <tr>
                        <td>Contact Person</td>
                        <td><?php echo $cust_data->first_name."".$cust_data->last_name;?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $cust_data->address;?></td>
                    </tr>
                    <tr>
                        <td>Contact Details</td>
                        <td><?php echo $cust_data->contact;echo(','); echo $cust_data->email_id;?> </td>
                    </tr>
                    <?}?>
                    <tr>
                        <td colspan="2"><p>TIN NO - <?php echo $detail->tin_number;?> and PAN No.Is : <?php echo $detail->pan_card_number;?></p>
                            <p>&nbsp;</p>
                            <p>Please do not deduct TDS as there is no liability of TDS deduction on Sale of Goods.</p>
                            <p>&nbsp;</p></td>
                    </tr>
                    <tr>
                        <td colspan="2" bgcolor="#D6D6D6"><p>* Payment Terms : -  </p>
                            <p>Percept/H - Bangalore agrees to make the payment by 09/01/2013 .</p></td>
                    </tr>
                </table>
<?}?>

                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:2px solid #999; margin-top:25px;">
                    <tr style="background:#c5c5c5">
                        <td colspan="4" align="center"><strong>Transaction Summary</strong></td>
                    </tr>
                    <tr style="background:#e5e5e5; font-weight:bold">
                        <td width="30">S.No.</td>
                        <td>Description</td>
                        <td width="80" align="center">Size</td>
                        <td width="80" align="center">Cost<br />
                            (Amount)</td>
                    </tr>
                    <tr>
                        <?php $i=1;
                        foreach($img as $image){?>
                        <td><?php echo $i;?></td>
                        <td><div class="sale"><img src="http://www.indiapicture.in/wallsnart/158/<?php echo $image->image_id;?>" width="107" height="107" /></div>
                            <strong>Image ID :</strong>   <?php echo $image->image_id;?> </td>
                        <td align="center">&nbsp;</td>
                        <?php $details=$this->quotation_model->get_image_detail($image->image_id);
                        foreach($details as $data){?>
                        <td align="right"><?php echo $data->images_price ?></td>
                    </tr>
                    <tr style="border-top:0">
                        <td>&nbsp;</td>
                        <td style="border-bottom:1px dotted #ddd;"><strong>PRINT DETAILS:</strong><br />

                            <strong>Print Code :</strong> <?php if($image->print_id==1)
                            {
                                echo "SUR_Fin_108";
                            }
                            elseif( $image->print_id==2)
                            {
                                echo"SUR_Mat_116";
                            }
                            elseif( $image->print_id==3)
                            {
                                echo"SUR_Fin_115";
                            }
                            elseif( $image->print_id==4)
                            {
                                echo"SUR_Hah_445";
                            }
                            elseif( $image->print_id==5)
                            {
                                echo "SUR_Can_350";
                            }
                            elseif( $image->print_id==6)
                            {
                                echo "SUR_Can_400";
                            }
                            elseif( $image->print_id==7)
                            {
                                echo "SUR_Tra_396";
                            }
                            ?>  <strong>Surface Name :</strong>
                            <?php if($image->print_id==1)
                            {
                                echo "Luster Fine art";
                            }
                            elseif( $image->print_id==2)
                            {
                                echo"Enhanced Matte";
                            }
                            elseif( $image->print_id==3)
                            {
                                echo"Llford Fine Art";
                            }
                            elseif( $image->print_id==4)
                            {
                                echo"Hahnemuhle Photo rag";
                            }
                            elseif( $image->print_id==5)
                            {
                                echo "Artist Canvas";
                            }
                            elseif( $image->print_id==6)
                            {
                                echo "Daguerre Canvas";
                            }
                            elseif( $image->print_id==7)
                            {
                                echo "Translight";
                            }
                            ?> </td>
                        <td align="center"><?php echo $image->print_size_length.'&quot;'.'x'.$image->print_size_width.'&quot;' ?></td>
                        <td align="right"><?php echo $image->print_cost?></td>
                    </tr>
                    <tr  style="border-top:0">
                        <td>&nbsp;</td>
                        <td style="border-bottom:1px dotted #ddd;"><strong>FRAME DETAILS:</strong><br />
                            <strong>Frame Code :</strong> <?php if( $image->frame_id==1)
                            {
                                echo "FR_WD_1";
                            }
                            elseif( $image->frame_id==2)
                            {
                                echo"FR_SN_2";
                            }?>  <strong>Frame Type:</strong>  <?php if( $image->frame_id==1)
                            {
                                echo "Wooden";
                            }
                            elseif( $image->frame_id==2)
                            {
                                echo"Synthetic";
                            }?> </td>
                        <td align="center"><?php echo $image->frame_size_length.'&quot;'.'x'.$image->frame_size_width.'&quot;'?></td>
                        <td align="right"><?php echo $image->frame_cost?></td>
                    </tr>
                    <tr style="border-top:0">
                        <td>&nbsp;</td>
                        <td style="border-bottom:1px dotted #ddd;"><strong>MOUNT DETAILS:</strong><br />
                            <strong>Mount Code :</strong>  <?php if( $image->mount_id==1)
                            {
                                echo "MNT_Arc_Aqu_1";
                            }
                            elseif( $image->mount_id==2)
                            {
                                echo"MNT_Aci_Ant_2";
                            }?>  <strong>Mount Type:</strong> <?php if( $image->mount_id==1)
                            {
                                echo "Archival";
                            }
                            elseif( $image->mount_id==2)
                            {
                                echo"Acid Free";
                            }?>   <strong>Colour:</strong>  Brown </td>
                        <td align="center"><?php echo $image->mount_size_length.'&quot;'.'x'.$image->print_size_width.'&quot;'?></td>
                        <td align="right"><?php echo $image->mount_cost?></td>
                    </tr>
                    <tr style="border-top:0">
                        <td>&nbsp;</td>
                        <td style="border-bottom:1px dotted #ddd;"><strong>GLASS AND HARDBOARD:</strong><br />
                            <strong>Code :</strong> MS2-CORBIS  <strong>Type:</strong>  <?php if( $image->glass_id==1)
                            {
                                echo "Glass";
                            }
                            elseif( $image->glass_id==2)
                            {
                                echo"Arcylic ";
                            }
                            elseif( $image->glass_id==3)
                            {
                                echo"Non Reflective Glass  ";
                            }?></td>
                        <td align="center">-</td>
                        <td align="right"><?php echo $image->glass_cost?></td>
                    </tr>
                    <tr style="border-top:0">
                        <td>&nbsp;</td>
                        <td style="border-bottom:1px dotted #ddd;"><strong>ITEM SIZE</strong></td>
                        <td align="center">14&quot; x 12&quot;</td>
                        <td align="right">&nbsp;</td>
                    </tr>
                    <?$i++;}?>
                    <?}?>
                    <?php foreach ($quotation as $de ){ ?>
                    <tr>
                        <td align="right" bgcolor="#E5E5E5">&nbsp;</td>
                        <td align="right" bgcolor="#E5E5E5"><strong>Total</strong></td>
                        <td align="center" bgcolor="#E5E5E5">&nbsp;</td>
                        <td align="right" bgcolor="#E5E5E5"><?php echo $de->total_amount;?></td>
                    </tr>
                    <tr>
                        <td align="right" bgcolor="#E5E5E5">&nbsp;</td>
                        <td align="right" bgcolor="#E5E5E5">After  discount (10%)</td>
                        <td align="center" bgcolor="#E5E5E5">&nbsp;</td>
                        <td align="right" bgcolor="#E5E5E5"><?php echo $de->after_discount ?></td>
                    </tr>
                    <tr>
                        <td align="right" bgcolor="#E5E5E5">&nbsp;</td>
                        <td align="right" bgcolor="#E5E5E5">VAT(5%)</td>
                        <td align="center" bgcolor="#E5E5E5">&nbsp;</td>
                        <td align="right" bgcolor="#E5E5E5"><?php echo $de->vat;?></td>
                    </tr>
                    <tr>
                        <td align="right" bgcolor="#E5E5E5">&nbsp;</td>
                        <td align="right" bgcolor="#E5E5E5"><strong>Payable Amount (Rs.)</strong></td>
                        <td align="center" bgcolor="#E5E5E5">&nbsp;</td>
                        <td align="right" bgcolor="#E5E5E5"><?php echo $de->final_amount;?></td>
                    </tr>
                    <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <?}?>

                </table>
                <div>
                    <p><strong>For Mahatta Multimedia Pvt. Ltd./WallsnArt</strong></p>
                    <table width="50%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Receiver's Signature	</td>
                            <td>Authorised Signatory </td>
                        </tr>
                    </table>

                <div style="margin:25px 0;">

                    <div style="font-size:18px; text-decoration:underline; margin-bottom:6px;">Terms								</div>
                    </p>
                    <p><strong>ON IMAGE USAGE
                        </strong></p>
                    <p>I have read and agree to the terms and conditions as stated in the EULA Click Here. </p>
                    <p>Once the High Resolution images are delivered the image is considered licensed, irrespective of the usage and it entitles <br />
                        the client to pay for the same. </p>
                    <p>The license fee is for non-exclusive usage of the image. </p>
                    <p>&nbsp;</p>
                    <p><strong>FOR PAYMENT
                        </strong></p>
                    <p>Payments must be cleared for all images for which high resolution images have been delivered.
                    </p>
                    <p>In case of payment by cheque, please make the cheque in favour of "WallsnArt."
                        In case of any disputes, they will be <br />
                        subject to Jurisdiction of Delhi Courts. </p>
                    <p>India Picture reserves the right to review and change any of the above terms and conditions without any prior notice. </p>
                    <p>This includes any changes in licensing fees also. </p>
                </div>


        </div>
</div>

        <!--<form action="<?php echo base_url()?>index.php/quotation/convert_to_doc" id="convert" name="convert"><input type="submit" id= "convert_to_doc"name="convert_to_doc" value="Convert To Word"  ></form>-->
        <div>

            </form>
      <form action="<?php echo base_url()?>index.php/quotation/convert_to_doc/<?php echo $this->uri->segment(3) ?>">  <input type="submit" name="printquote" id="printquote" value="Print" class="bt-add" /></form> <br/><br/> <input type="submit" name="mail" id="mail" value="mail"  class="bt-add">&nbsp; &nbsp;</div>





</div>
    <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>
</body>
</html>
