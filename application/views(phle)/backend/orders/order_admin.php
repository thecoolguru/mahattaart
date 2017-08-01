<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Orders</title>
    <link href="<?php echo base_url()?>index.php/css/fonts.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>index.php/css/wallsnart1.0.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" language="javascript">// <![CDATA[
        function PhotographersList() {
            var ele = document.getElementById("PhotographersListDiv");
            if(ele.style.display == "block") {
                ele.style.display = "none";
            }
            else {
                ele.style.display = "block";
            }
        }
        // ]]></script>

    <script type="text/javascript">
        function show_change(id)
        {
            var datastring='vender_id=' + id ;
            $.ajax({
                type: "POST",
                url: "<?php// print base_url() ?>index.php/backend/get_vender",
                data: datastring,
                success: function(data)
                { // alert(datastring);
                    //alert(data);
                    $('#vendor_details').html(data);

                }
            });

        }
    </script>

</head>




<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
    <div id="middle-container" style="width:96%">
        <div class="main-hdr"> View Orders</div>
        <form action="<?=base_url()?>index.php/orders/order_search" method="post">
            <div class="view-cp">
                <div class="searchc" style="
                width:100%">Search Parameters</div>

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="120"> Customer Name</td>
                        <td width="280"><input type="text" name="cust_name" id="cust_name" class="inputs" value="<?php echo $this->input->post('cust_name');?>">
                               </td>
                        <td width="150">Date</td>
                        <td><input name="textfield" type="text" id="textfield" placeholder="from" class="date-range" />
                           -
                            <input name="textfield2" type="text" id="textfield2" placeholder="to"  class="date-range" /></td>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td>   <select name="region" id="region" class="inputs"  >
                                <option selected="selected" value=""> Select Vendor Region</option>
                                <option <?php if($this->input->post('region')=='East'){?> selected="selected" <?php } ?>>East</option>
                                <option <?php if($this->input->post('region')=='West'){?> selected="selected" <?php } ?>>West</option>
                                <option <?php if($this->input->post('region')=='North'){?> selected="selected" <?php } ?>>North</option>
                                <option <?php if($this->input->post('region')=='South'){?> selected="selected" <?php } ?>>South</option>
                            </select></td>
                        <td>Order Id</td>
                        <td><input type="text" name="order_id" id="order_id" class="inputs" value="<?php echo $this->input->post('order_id');?>"></td>
                        </tr>
                    <tr>
                        <td>Status</td>
                        <td><span style="font-size:12px">
         <select name="order_status" id="order_status" class="inputs"  >
         <option selected="selected" <?php if($this->input->post('order_status')=='-1'){?> selected="selected" <?php }?>  value="-1"> Select Order Status</option>
         <option value="0" <?php if($this->input->post('order_status')=='0'){?> selected="selected" <?php }?>>Pending with studio</option>
         <option value="1" <?php if($this->input->post('order_status')=='1'){?> selected="selected" <?php }?>>Pending with printer</option>

             <option value="2" <?php if($this->input->post('order_status')=='2'){?> selected="selected" <?php }?>>Pending with framer</option>

             <option value="3" <?php if($this->input->post('order_status')=='3'){?> selected="selected" <?php }?>>Pending with packager</option>
             <option value="4" <?php if($this->input->post('order_status')=='4'){?> selected="selected" <?php }?>>Pending with courier</option>
             <option value="5" <?php if($this->input->post('order_status')=='5'){?> selected="selected" <?php }?>>Order Completed</option>
         </select>

    </span>
       </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" class="bt-sbt-global-small" name="search" id="search" value="Search"  /></td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                    </form>
            </div>

            <div id="PhotographersListDiv" >
                <div class="customer-list">
                    <div class="hdrlist" style="width:140px">ORDER List</div>
                    Total Orders : <span class="count"><?= $total_records;?></span>
                    <a href="create-quotation.html" class="addnewcp">Create Order</a></div>
                <div align="right"> <?php if($links){ print $links;}?></div>
                <div class="view-cp-list">

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><div class="viewcplist-inner"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr class="hdrs">
                                            <td>Order   ID</td>
                                            <td>Name</td>
                                            <td>Region</td>
                                            <td>Status</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php  if($order) {
                                        foreach ($order as $ord) {?>
                                        <tr>
                                            <td><?=$ord['order_id']; ?></td>
                                            <td><?=$ord['customer_name']?></td>
                                            <td><?=$ord['customer_city']?></td>
                                            <td><? if($ord['order_status']==0)
                                            {
                                                echo"pending with studio";
                                            }
                                                elseif($ord['order_status']==1)
                                                {
                                                    echo "pending with printer";
                                                }
                                                elseif ($ord['order_status']==2)
                                                {
                                                    echo "pending with framer";
                                                }
                                                elseif ($ord['order_status']==3)
                                                {
                                                    echo "pending with packager";
                                                }
                                                ?></td>
                                            <td><?php if($ord['order_status']==0){?>
                                                <a href="<?php echo base_url();?>index.php/orders/view_studio/<?=$ord['order_id']; ?> ">View/Edit Studio </a>
                                                <?} elseif($ord['order_status']==1){?>
                                                <a href="<?php echo base_url();?>index.php/orders/view_printer/<?=$ord['order_id']; ?>">View/Edit Printer  </a>
                                                <?}elseif($ord['order_status']==2){?>
                                                    <a href="<?php echo base_url();?>index.php/orders/view_framer/<?=$ord['order_id']; ?>">View/Edit Framer  </a>
                                                <?} elseif($ord['order_status']==3){?>
                                                    <a href="<?php echo base_url();?>index.php/orders/view_packager/<?=$ord['order_id']; ?>">View/Edit packager  </a>
                                                <?}elseif($ord['order_status']==4){?>
                                                    <a href="<?php echo base_url();?>index.php/orders/view_courier/<?=$ord['order_id']; ?>">View/Edit Courier  </a>
                                                <?}elseif($ord['order_status']==5){?>
                                                    <a href="#">Order Completed  </a>
                                                <?}?>
                                            </td>
                                            <td><a href="#">View Quotation </a> / <a href="send-mail-quotation.html">Send Mail</a></td>
                                        </tr>
                                        <?}}else{?> <td><span style="color:red">No data Found</span></td><?php } ?>

                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="order_details"></div>
            </div>

    </div>
    <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>




</body>
</html>
