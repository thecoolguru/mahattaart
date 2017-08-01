

<head xmlns="http://www.w3.org/1999/html">
    <link href="<?php echo base_url()?>assets/css/fonts.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/css/wallsnart1.0.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            get_total();
        });
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
        function get_total(id)
        {
            if(id)
            {

                var datastring='id=' +id;
                    $.ajax({
                    url:"<?=base_url()?>index.php/quotation/get_total_images",
                    type: "POST",
                    data:datastring,
                    success: function(data)
                    { //alert(data);
                       var value=data.split("/");
                       $('#totalimages').val(value[3]);
                        $('#totalprints').val(value[0]);
                        $('#totalframes').val(value[1]);
                        $(('#totalmounts')).val(value[2]);
                    }
                });
            }
           // document.getElementById('totalamount').value = document.getElementById('total_prize').value;

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
                document.getElementById('total_prize').value = totale;
                document.getElementById('totalamount').value = totale;
            }
        }
    </script>
</head>
<body onload ="get_total(<?php echo $_POST['hide1']?>)">
<div id ="middle-wrapper">
    <div id="middle-container">
        <div class="main-hdr-quotation">Create Quotation</div>
        <div id="quotationListDiv" class="manage-order" >
            <form action="<?php echo base_url()?>index.php/quotation/create_quotation_end" method="post">
            <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
                <tr style="border-bottom:none">
                    <td colspan="2" >
        <div class="viewcplist-inner" name="details" id="details">
        <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr class="darktr">
        <td width="150" class="bold">Total:</td>
        <?php $total=$this->quotation_model->get_total($_POST['hide1']);
        foreach($total as $tot)
        { ?>
        <td><input type="text" name="total_1" id="total_1" value="<?php echo $tot->total_amount;?>" class="total_1" /></td>
        <?}?>
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
        <td><input type="text" name="discount" id="discount"  onkeyup="discount_total()"></td>
      </tr>

      <tr class="darktr">
        <td class="bold">Total After Discount:</td>
        <td><input type="text" name="after_discount" id="after_discount"></td>
      </tr>
      <tr>
        <td class="bold">Tax - 5% VAT:</td>
        <td><input type="text" name="vat" id="vat" value="5" onkeyup="discount_total()" readonly></td>
      </tr>

      <tr class="darktr">
        <td class="bold">Final Amount:</td>
        <td class="total-price" > <input type="text" id="total_prize" name=total_prize  readonly/> RS </td>
      </tr>
</table>
<br />
<br />
<table width="1000" border="0" cellspacing="0" cellpadding="0">
<?php $id = $_POST['hide1'];?>
    <div style="background:#388fc4; font-size:16px; color:#fff; padding:8px; margin-top:25px "> Order Summary</div>
        <tr class="darktr">
            <td width="150" class="bold">Quotation Date:</td>
            <td><input type="text" name="qdate" value="<?php echo date("Y/m/d");?>"></td>
            <td class="bold">Payment Terms:</td>
            <td><input type="text" name="payment_terms" id="payment_terms"></td>
        </tr>
        <!--   <tr>
               <!--<td class="bold">Quotation Id:</td>
               <td><input type="text" name="qid2" id="qid2" ></td>--
               <td class="bold">Contact Person:</td>
               <td><input type="text" name="contactperson" id="contactperson" readonly></td>
           </tr>-->
        <tr class="darktr">
            <td class="bold">Total Images:</td>
            <td><input type="text" name="totalimages" id="totalimages"  readonly></td>
            <td class="bold">Payment Mode:</td>
            <td><input type="text" name="paymentmode" id="paymentmode"></td>
        </tr>
        <tr>
            <td class="bold">Total Prints:</td>
            <td><input type="text" name="totalprints" id="totalprints"readonly></td>
            <td class="bold">Tax Type</td>
            <td><input type="text" name="taxtype" id ="taxtype"></td>
        </tr>

        <tr class="darktr">
            <td class="bold">Total Frames:</td>
            <td><input type="text" name="totalframes" id="totalframes"readonly></td>
            <td class="bold">PAN Card Number</td>
            <td><input type="text" name="pancardnumber" id="pancardnumber"></td>
        </tr>
        <tr>
            <td class="bold">Total Amount</td>
            <td><input type="text" name="totalamount" id="totalamount"readonly></td>
            <td  class="bold">Total Mounts</td>
            <td> <input type="text" name="totalmounts" id="totalmounts" readonly>
        </tr>
        <tr>
            <td  class="bold">Tin Number</td>
            <td  class="bold"><input type="text" name="tin_no" id="tin_no"> </td>
            <td  class="bold"></td>
            <td> <!--<input type="text" name="totalmounts" id="totalmounts"><input type="button" id="<?php echo $_POST['hide1']?>" onclick="get_total(this.id)" value="generate"/> --></td>
        </tr>
    <tr class="darktr">
        <td width="150" class="bold">Sales Person:</td>
        <td><input type="text" name="sales_name" id="sales_name" placeholder="Name"/></td>
        <td><input type="text" name="sales_email" id="sales_email" placeholder="Email"/></td>
        <td><input type="text" name="sales_number" id="sales_number" placeholder="Contact Number"/></td>
    </tr>
    <tr>
        <td class="bold">Client Servicing:</td>
        <td><input type="text" name="client_name" id="client_name" placeholder="Name"/></td>
        <td><input type="text" name="client_email" id="client_email" placeholder="Email"/></td>
        <td><input type="text" name="client_number" id="client_number" placeholder="Contact Number"/></td>
    </tr>
    <tr class="darktr">
        <td class="bold">Created by:</td>
        <td><input type="text" name="created_by" id="created_by" placeholder="Name"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="bold">Updated by</td>
        <td><input type="text" name="updated_by" id="updated_by" placeholder="Name"/></td>
        <td>&nbsp;</td>
        <td><input type="hidden" name="hide" id="hide" value="<?=$_POST['hide1'];?> " onload="get_total(this.value)" /></td>
    </tr>

</table>
           </td>
           </tr>
            </table>
<div style="padding:30px; text-align:left">
    <input type="submit" name="generate_quotation" id="generate_quotation" value="Generate Quotation" class="bt-create-quote"  />
    <input type="submit" name="convert_to_invoice" id="convert_to_invoice" value="Convert to Invoice" class="bt-create-quote" style="background:#333399" />
</div>
 </form>

            </div>
        </div>
    </div>
</body>

