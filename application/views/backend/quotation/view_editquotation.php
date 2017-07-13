
<head>
<link href="<?php echo base_url()?>assets/css/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assets/css/wallsnart1.0.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        function get_cor_cost(id)
        { var datastring='id=' +id;
            $.ajax({
                url:"<?=base_url()?>index.php/quotation/get_couriers",
                type: "POST",
                data:datastring,
                success: function(data)
                { $('#courier_charges').val(data);
                }
            });

        }
        function get_pack_cost(id)
        { var datastring='id=' +id;
            $.ajax({
                url:"<?=base_url()?>index.php/quotation/get_packagers",
                type: "POST",
                data:datastring,
                success: function(data)
                { $('#pack_charges').val(data);
                }
            });

        }
        function discount_total()
        {
            var total = document.getElementById('total_1').value;
            var pack_charges = document.getElementById('pack_charges').value;
            var courier_charges = document.getElementById('courier_charges').value;
            var discount_per = document.getElementById('discount').value;
            var vat= document.getElementById('vat').value;

            var result = parseInt(total) + parseInt(pack_charges) + parseInt(courier_charges);
            var discount = (result*discount_per)/100;
            var net_amount = (result - discount);
            var vat_1= (net_amount*vat)/100;
            var totale=(net_amount+vat_1);
            // var d=dis* parseInt(txtFourthNumberValue);

            if (!isNaN(net_amount)) {
                document.getElementById('after_discount').value = net_amount;
                // document.getElementById('total').value = result;

            }
            if(!isNaN(totale))
            {
                document.getElementById('final_amount').value = totale;
                document.getElementById('totalamount').value = totale;
            }
        }
    </script>
</head>
        <div id="middle-wrapper">
        <div id="middle-container">
        <div class="main-hdr-quotation"> Edit Quotation</div>
        <div id="quotationListDiv" class="manage-order" >
        <form  action="<?php echo base_url()?>index.php/quotation/save_edit_quotation" method="POST">
        <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
        <tr>
            <td colspan="2" style="padding:0;">
                <div class="quotation-div"  id="quotation2Div" style="margin-left:0px" ><!--DETAILS TABLE-->
                    <div style="background:#388fc4; font-size:16px; color:#fff; padding:8px; "> Customer Details</div>
                    <?php foreach ($customer as $cust){?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr class="darktr">
                            <td width="150" class="bold">First Name:</td>
                            <td><?php echo $cust->first_name; ?></td>
                            <td class="bold">Last Name:</td>
                            <td><?php echo $cust->last_name;?></td>
                        </tr>
                        <tr>
                            <td class="bold">Email Id:</td>
                            <td><?php echo $cust->email_id;?></td>
                            <td class="bold">Occupation</td>
                            <td><?php echo $cust->occupation;?></td>
                        </tr>
                        <tr class="darktr">
                            <td class="bold">Gender</td>
                            <td><?php echo $cust->gender;?></td>
                            <td class="bold">Marital Status</td>
                            <td><?php echo $cust->martial_status;?></td>
                        </tr>
                        <tr>
                            <td class="bold">Address:</td>
                            <td><?php echo $cust->address;?></td>
                            <td class="bold">Company Name</td>
                            <td><?php echo $cust->company_name;?></td>
                        </tr>

                        <tr class="darktr">
                            <td class="bold">Country</td>
                            <td><?php echo $cust->country;?></td>
                            <td class="bold">State</td>
                            <td><?php echo $cust->state;?></td>
                        </tr>

                        <tr class="darktr">
                            <td class="bold">Pin Code</td>
                            <td><?php echo $cust->zip_code;?></td>
                            <td class="bold">Contact Number</td>
                            <td><?php echo $cust->contact;?></td>
                        </tr>


                    </table>

                    <?}?>
                <?php foreach ($quotation as $quote){?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">

                <div style="background:#388fc4; font-size:16px; color:#fff; padding:8px; margin-top:25px "> Order Summary</div>
                <tr class="darktr">
                    <td width="150" class="bold">Quotation Date:</td>
                    <td><input type="text" name="qdate" id="qdate" value="<?php echo $quote->quotation_date?>"></td>
                    <td class="bold">Payment Terms:</td>
                    <td><input type="text" name="payment_terms" id="payment_terms"></td>
                </tr>

                <tr class="darktr">
                    <td class="bold">Total Images:</td>
                    <td><input type="text" name="totalimages" id="totalimages"  value="<?php echo $quote->total_images?>" ></td>
                    <td class="bold">Payment Mode:</td>
                    <td><input type="text" name="paymentmode" id="paymentmode" value="<?php echo $quote->payment_mode?>"></td>
                </tr>
                <tr>
                    <td class="bold">Total Prints:</td>
                    <td><input type="text" name="totalprints" id="totalprints" value="<?php echo $quote->total_prints?>"></td>
                    <td class="bold">Tax Type</td>
                    <td><input type="text" name="taxtype" id ="taxtype" value="<?php echo $quote->tax_type?>"></td>
                </tr>

                <tr class="darktr">
                    <td class="bold">Total Frames:</td>
                    <td><input type="text" name="totalframes" id="totalframes" value="<?php echo $quote->total_frames?>"></td>
                    <td class="bold">PAN Card Number</td>
                    <td><input type="text" name="pancardnumber" id="pancardnumber" value="<?php echo $quote->pan_card_number?>"></td>
                </tr>
                <tr>
                    <td class="bold">Total Amount</td>
                    <td><input type="text" name="totalamount" id="totalamount" value="<?php echo $quote->total_amount?>"></td>
                    <td  class="bold">Total Mounts</td>
                    <td> <input type="text" name="totalmounts" id="totalmounts"  value="<?php echo $quote->total_mounts?>">
                </tr>
                <tr>
                    <td  class="bold">Tin Number</td>
                    <td  class="bold"><input type="text" name="tin_no" id="tin_no" value="<?php echo $quote->tin_number?>"> </td>
                    <td  class="bold"></td>
                    <td> <!--<input type="text" name="totalmounts" id="totalmounts"><input type="button" id="<?php echo $_POST['hide1']?>" onclick="get_total(this.id)" value="generate"/> --></td>
                </tr>
</table>
                <?}?>
                <tr style="border-bottom:none">
            <td colspan="2" >

                <div class="viewcplist-inner">

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr class="hdrs">
                            <td>Image   ID</td>
                            <td>License Cost</td>
                            <td>Print Surface</td>
                            <td> No. Of Prints </td>
                            <td>Frame</td>
                            <td>No. Of Frames</td>
                            <td>Mount</td>
                            <td> No. Of Mounts </td>
                            <td>Cover</td>
                            <td>Tools</td>
                        </tr>
                        <?php foreach($image as $details){ ?>
                        <tr>
                            <td><?php echo $details->image_id;?></td>
                            <td><?php echo $details->licence_cost;?></td>
                            <td><?php if($details->print_id == 1)
                                {
                                    echo"Luster fine art";
                                }
                                elseif($details->print_id == 2)
                                {
                                    echo"Enhanced Matte";
                                }
                                elseif($details->print_id == 3)
                                {
                                    echo"Llford Fine Art";
                                }
                                elseif($details->print_id == 4)
                                {
                                    echo"Hahnemuhle Photo rag";
                                }
                                elseif($details->print_id == 5)
                                {

                                    echo"Artist Canvas";
                                }
                                elseif($details->print_id == 6)
                                {
                                    echo"Daguerre Canvas";
                                }
                                elseif($details->print_id == 7)
                                {
                                    echo"Translight";
                                }

                            ?></td>
                            <td><?php echo $details->print_total ?></td>
                            <td><?php if($details->frame_id == 1)
                                {
                                    echo"Wooden";
                                }
                                elseif($details->frame_id == 2)
                                {
                                    echo"synthetic";
                                } ?>
                            </td>
                            <td><?php echo $details->frame_total ?></td>


                            <td><?php if($details->mount_id == 1)
                                {
                                    echo"archival";
                                }
                                elseif($details->mount_id == 2)
                                {
                                    echo"Acid Free";
                                } ?></td>
                           <td><?php echo $details->mount_total ?></td>
                            <td><?php if($details->glass_id == 1)
                                {
                                    echo"glass";
                                }
                                elseif($details->glass_id == 2)
                                {
                                    echo"Arcylic ";
                                }
                                elseif($details->glass_id == 3)
                                {
                                echo"Non Reflective Glass";
                                } ?>
                            </td>
                            <td>
                            <a href="<?php echo base_url(); ?>index.php/quotation/edit_quotation_detail/<?php echo $details->id?>/<?php echo $details->quotation_id?>">Edit</a>
                           </td>
                        </tr>
                        <?}?>
                    </table>

                </div>

                <p>&nbsp;</p>
                <?php foreach($quotation as $other){?>
                <table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr class="darktr">
                        <td width="150" class="bold">Total:</td>
                        <td><input type="text" value="<?php echo $other->total_amount;?>" name="total_1" id="total_1"> </td>
                    </tr>
                    <tr>
                        <td class="bold">Packaging Service</td>
                        <td><select name="packegers" id="packagers" onchange="get_pack_cost(this.value)" >
                                <option value="">Please Select</option>
                                <?php $packagers=$this->quotation_model->get_packagers();
                                foreach($packagers as $pack)
                                { ?>

                                    <option value="<?php echo $pack->vender_id; ?>"><?php echo $pack->vender_contact_person_name;?></option>
                                <?php } ?>
                            </select>

                    </tr>
                    <tr>
                        <td class="bold">Packaging Charges:</td>
                        <td> <input type="text" name="pack_charges" id="pack_charges" onkeyup="discount_total()"></td></td>
                    </tr>
                    <tr class="darktr">
                        <td class="bold">Courier Service </td>
                        <td><select name="courier" id="courier" onchange="get_cor_cost(this.value)" >
                                <option value="">Please Select</option>
                                <?php $couriers=$this->quotation_model->get_courier();
                                foreach($couriers as $cor)
                                {?>
                                    <option value="<?php echo $cor->vender_id;?>"><?php echo $cor->vender_contact_person_name;?></option>
                                <?php } ?>
                            </select>
                    </tr>
                    <tr>
                        <td class="bold">Courier Charges: </td>
                        <td> <input type="text" name="courier_charges" id="courier_charges"  onkeyup="discount_total()"></td>
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Discount:</td>
                        <td><input type="text" value="<?php echo $other->discount?>" id="discount" name="discount" onkeyup="discount_total()"></td>
                    </tr>

                    <tr class="darktr">
                        <td class="bold">Total After Discount:</td>
                        <td><input type="text"value="<?php echo $other->after_discount?>" name="after_discount" id="after_discount"></td>
                    </tr>
                    <tr>
                        <td class="bold">Tax - 5% VAT:</td>
                        <td><input type="text" value="<?php echo $other->vat?>" id="vat" name="vat"></td>
                    </tr>

                    <tr class="darktr">
                        <td class="bold">Final Amount:</td>
                        <td class="total-price"><div ><input type="text"  id="final_amount" name="final_amount"></div></td>
                    </tr>
                </table>
                <br />
                <br />
                <table width="1000" border="0" cellspacing="0" cellpadding="0">
                    <tr class="darktr">
                        <td width="150" class="bold">Sales Person:</td>
                        <td><input type="text" name="sales_name" id="sales_name" placeholder="Name" value="<?php echo $other->sales_person?>"/></td>
                        <td><input type="text" name="sales_email" id="sales_email" placeholder="Email" value="<?php echo $other->sales_person_email?>"/></td>
                        <td><input type="text" name="sales_contact" id="sales_contact" placeholder="Contact Number" value="<?php echo $other->sales_person_number?>"/></td>
                    </tr>
                    <tr>
                        <td class="bold">Client Servicing:</td>
                        <td><input type="text" name="client_name" id="client_name" placeholder="Name" value="<?php echo $other->client_name?>"/></td>
                        <td><input type="text" name="client_email" id="client_email" placeholder="Email" value="<?php echo $other->client_email?>"/></td>
                        <td><input type="text" name="client_contact" id="client_contact" placeholder="Contact Number"value="<?php echo $other->client_number?>"/></td>
                    </tr>
                    <tr class="darktr">
                        <td class="bold">Created by:</td>
                        <td><input type="text" name="created_by" id="created_by" placeholder="Name" value="<?php echo $other->created_by?>"/></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="bold">Updated by</td>
                        <td><input type="text" name="updated_by" id="updated_by" placeholder="Name" value="<?php echo $other->updated_by?>"/></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <?php }?>
            </td>
        </tr>
        </div>
        <input type="hidden" id="hide" name="hide" value="<?php echo $this->uri->segment(3);?>">
        </table>
        <div style="padding:30px; text-align:left"> <input type="submit" name="save" id="save" value="Save" class="bt-create-quote"/>

        </div>
        </form>
        </div>
        </div>
        <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

        <!--MIDDLE PAGE WRAPPER ENDS--></div>




    </body>
    </html>


