<head xmlns="http://www.w3.org/1999/html">
    <link href="<?php echo base_url()?>assets/css/fonts.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/css/wallsnart1.0.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">

        function insert_in()
        {
                var data = $("#form1").serialize();
                $.ajax({
                    url: " <?=base_url()?>index.php/backend/create_quotation_detail",
                    type: "post",
                    data:data,
                    success: function(data){

                    }
            });
        }
        function filter_images(id)
        {
            if(id)
            {
                var datastring='id=' +id;
                //alert(id);
                $.ajax({
                    url:"<?=base_url()?>index.php/quotation/get_images",
                    type: "POST",
                    data:datastring,
                    success: function(data)
                    {
                        var value=data.split("/");
                        $('#img').html(value[0]);
                        $('#licence_cost').val(value[1]);
                        var image="http://indiapicture.in/wallsnart/158/" + value[0] ;

                        document.getElementById('imgdisplay').setAttribute('src',image)

                        //$('#imgdisplay').src(value[2]);
                    }

                });
            }
        }
        function filter_surface(id)
        {
            if(id==1||id==2||id==3||id==4||id==5||id==6||id==7)
            {
                var datastring='id=' +id;
                //alert(id);
                $.ajax({
                    url:"<?=base_url()?>index.php/quotation/get_surfaces",
                    type: "POST",
                    data:datastring,
                    success: function(data)
                    {
                        var value=data.split("/");
                        $('#print_size').val(value[0]);
                        $('#cost').val(value[1]);
                    }

                });
            }
            else if(id==0) {
           //     document.getElementById('print_size').value('');
             //   document.getElementById('cost').value('');
                $('#print_size').val('');
                $('#cost').val('');

                 }


            generate_total();
        }
        function filter_frames(id)
        {
            if(id)
            {
                var datastring='id=' +id;
                //alert(id);
                $.ajax({
                    url:"<?=base_url()?>index.php/quotation/get_frames",
                    type: "POST",
                    data:datastring,
                    success: function(data)
                    {
                        var value=data.split("/");
                        $('#frame').html(value[0]);
                        $('#frame_size').val(value[1]);
                        $('#frame_cost').val(value[2]);
                        var image="<?php echo base_url()?>assets/images/frames/" + value[3];
                        document.getElementById('frame_display').setAttribute('src',image);
                    }
                });
            }
            else{
                $('#frame').html('');
                $('#frame_size').val('');
                $('#frame_cost').val('');
            }
            generate_total();
        }
        function filter_mounts(id)
        {
            if(id)
            {
                var datastring='id=' +id;
                // alert(id);
                 $.ajax({

                    url:"<?=base_url()?>index.php/quotation/get_mounts",
                    type: "POST",
                    data:datastring,
                    success: function(data)
                    {
                        var value=data.split("/");
                        $('#mount_image').html(value[0]);
                        $('#mount_size').val(value[1]);
                        $('#mount_cost').val(value[2]);
                        var image="<?php echo base_url()?>assets/images/frames/" + value[3] ;
                        document.getElementById('mount_display').setAttribute('src',image);
                    }

                });
            }
            else{  $('#mount_image').html('');
                $('#mount_size').val('');
                $('#mount_cost').val('');

            }
            generate_total();
        }
        function filter_glass(id)
        {
            if(id)
            {
                var datastring='id=' +id;
                   $.ajax({
                    url:"<?=base_url()?>index.php/quotation/get_glasses",
                    type: "POST",
                    data:datastring,
                    success: function(data)
                    {
                        var value=data.split("/");
                        $('#glass_cost').val(value[0]);
                    }
                });
            }
            generate_total();
        }

        function generate_total()
        {
/*
           if(  document.getElementById('cost').value!=="")
            {
                var print_cost = document.getElementById('cost').value;
            }
            else{
               var print_cost=0;
           }
            if(document.getElementById('mount_cost').value!=="")
            { var mount_cost = document.getElementById('mount_cost').value;

            }
            else{
                mount_cost=0;
            }
            if(document.getElementById('frame_cost').value1=="")
            {
                var frame_cost = document.getElementById('frame_cost').value;
            }
            else
            {
                var frame_cost=0;
            }
            */
            var print_cost = document.getElementById('cost').value;
            var mount_cost = document.getElementById('mount_cost').value;
            var frame_cost = document.getElementById('frame_cost').value;
            var licence_cost = document.getElementById('licence_cost').value;

            var glass_cost=document.getElementById('glass_cost').value;
            var printsno= document.getElementById('printsno').value;
            var mountno= document.getElementById('mountno').value;
            var frameno= document.getElementById('frameno').value;
            var print_size_length=document.getElementById('print_size_length').value;
            var print_size_width=document.getElementById('print_size_width').value;
            var frame_size_length=document.getElementById('frame_size_length').value;
            var frame_size_width=document.getElementById('frame_size_width').value;
            var mount_size_length=document.getElementById('mount_size_length').value;
            var mount_size_width=document.getElementById('mount_size_width').value;
            var result = parseInt(print_cost)*parseInt(printsno)*parseInt(print_size_length)*parseInt(print_size_width) + parseInt(mount_cost)*parseInt(mountno)*parseInt(mount_size_length)*parseInt(mount_size_width)
                         + parseInt(frame_cost)*parseInt(frameno)*parseInt(frame_size_length)*parseInt(frame_size_width)+ parseInt(licence_cost)+parseInt(glass_cost);


            //alert(result);
            if (!isNaN(result)) {
                document.getElementById('total_price').value = result;
               // document.getElementById('total').value = result;
            }
            print_total();
            frame_total();
            mount_total();
            glass_total();

        }
        function calculate_total()
        {   var result1= print_total();
            var result2= frame_total();
            var result3= mount_total();
            var  result=print_total()+ frame_total()+ mount_total()+glass_total();
            if (!isNaN(result)) {
                document.getElementById('total_price').value = result;
                // document.getElementById('total').value = result;
            }
        }
            /*
             if(result1=='')
            {
                document.getElementById('total_price').value =result2+result3;
            }
            else if(result2=='')
            {
                document.getElementById('total_price').value=result1+result3;
            }
            else if(result3=='')
            {
                document.getElementById('total_price').value=result1+result2;
            }
              if(result2==''||result3=='')
             {
                 document.getElementById('total_price').value =result1;

             }
              else if(result1==''||result2=='')
             {
                 document.getElementById('total_price').value =result3;
             }
             else if( result1==''||result3=='')
             {
                 document.getElementById('total_price').value =result2;

             }
            else
             {

                     document.getElementById('total_price').value = result1+result2+result3;
             }*/

/*
        function generate_total()
        {

            if(document.getElementById('cost').value!=null)
            {
                var print_cost = document.getElementById('cost').value;
                var printsno= document.getElementById('printsno').value;
                var result1 = parseInt(print_cost)*parseInt(printsno);

            }
            else
            {
                var result1 ="";
            }
           alert (result1);
            if(document.getElementById('frame_cost').value!=null)
            {
                var frame_cost = document.getElementById('frame_cost').value;
                var frameno= document.getElementById('frameno').value;
                var result2 = parseInt(frame_cost)*parseInt(frameno) ;

            }
            else
            {
                var result2 ="";
            }
            alert(result2);
            if(document.getElementById('glass_cost').value!=null)
            {
                var glass =document.getElementById('glass_cost').value;
            }
            else
            {
                var glass =0;
            }
           alert(glass);
            if(document.getElementById('mount_cost').value!=null)
            {

                var mount_cost = document.getElementById('mount_cost').value;
                var mountno= document.getElementById('mountno').value;
                var result3= parseInt(mount_cost)*parseInt(mountno);

            }
            else
            {
                 (isNaN(result3))
                {
                    result3=0;
                }
            }
           alert(result3);
            var total= result1+result2+result3+glass;
            alert(total);
            document.getElementById('total_price').value=total;
        }*/

        function glass_total()
        {
            var glass_cost=document.getElementById('glass_cost').value;
            var result = parseInt(glass_cost);
            if (!isNaN(result))
            {
                document.getElementById('glass_total').value = result;

            }
            return result;
        }

        function print_total()
        {   var print_cost = document.getElementById('cost').value;
            var licence_cost = document.getElementById('licence_cost').value;
            var print_size_length=document.getElementById('print_size_length').value;
            var print_size_width=document.getElementById('print_size_width').value;

            var printsno= document.getElementById('printsno').value;
            var result = parseInt(print_cost)*parseInt(printsno)*parseInt(print_size_length)*parseInt(print_size_width) +parseInt(licence_cost);
            if (!isNaN(result))
            {
                document.getElementById('print_total').value = result;

            }
            return result;


        }
            function frame_total()
            {  var frame_cost = document.getElementById('frame_cost').value;
                var licence_cost = document.getElementById('licence_cost').value;
                var frame_size_length=document.getElementById('frame_size_length').value;
                var frame_size_width=document.getElementById('frame_size_width').value;
                var frameno= document.getElementById('frameno').value;
                var result = parseInt(frame_cost)*parseInt(frameno)*parseInt(frame_size_length)*parseInt(frame_size_width) +parseInt(licence_cost);
                if (!isNaN(result)) {
                    document.getElementById('frame_total').value = result;

                }
                return result;
            }
                function mount_total()
                {
                    var mount_cost = document.getElementById('mount_cost').value;
                    var mountno= document.getElementById('mountno').value;
                    var mount_size_length=document.getElementById('mount_size_length').value;
                    var mount_size_width=document.getElementById('mount_size_width').value;
                    var licence_cost = document.getElementById('licence_cost').value;
                    var result= parseInt(mount_cost)*parseInt(mountno)*parseInt(mount_size_length)*parseInt(mount_size_width)+parseInt(licence_cost);
                    if (!isNaN(result)) {
                        document.getElementById('mount_total').value = result;
                    }
                    return result;

                }
    </script>
</head>
<div id ="middle-wrapper">
<div id="middle-container">
<div class="main-hdr-quotation"> Create Quotation</div>
<div id="quotationListDiv" class="manage-order" >
<form name="form1" id="form1" method="post">
<table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
<tr style="border-bottom:none">
<td colspan="2" >
<!--<div class="customer-list"><input type="button" value="Add New Item"class="addnewcp" onclick="ShowDiv();"/></div>
--><p>&nbsp;</p>
<p>&nbsp;</p>
<div class="viewcplist-inner" name="details" id="details">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
            <td width="150">&nbsp;</td>
            <td>Image ID</td>
            <td>License Cost</td>
            <td>Print Surface</td>
            <td>Print length</td>
            <td>Print Width</td>
            <td>Print Cost</td>
            <td>No of Prints</td>
        </tr>
        <tr>
            <td ><span class="thumbtd" ><img id="imgdisplay" name="imgdisplay" src="" width="107" height="107" alt="art" /><br />
                           <label id="img"></label>
             </span>
            </td>
            <td><input type="text" name="imgid" id="imgid"onchange="filter_images(this.value)"/></td>
            <td><input type="text" name="licence_cost" id="licence_cost" style="width:90px"   /></td>
            <td><select name="print_surface" id="print_surface" class="inputs" onchange="filter_surface(this.value)" style="width:100px">
                    <option value="0">Please Select</option>
                    <?php $surfaces=$this->quotation_model->get_surfaces();
                    foreach($surfaces as $sur)
                    { ?>
                        <option value="<?php echo $sur->surface_id; ?>"><?php echo $sur->surface_type ?></option>
                    <?php } ?>
                </select></td>
            <td> <input type="text" id="print_size_length" name="print_size_length" style="width:90px" onchange="generate_total()"></td>
            <td> <input type="text" id="print_size_width" name="print_size_width" style="width:90px" onchange="generate_total()"></td>
            <td> <input type="text" id="cost" name="cost" style="width:90px"></td>
            <td> <select name="printsno" id="printsno" style="width:50px" onchange="generate_total()">
                    <option value="0">Please Select</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
            </td>
        </tr>
        <tr class="hdrs">
            <td>Frame Visual</td>
            <td>Frame</td>
            <td>Frame Length</td>
            <td>Frame Width</td>
            <td>Frame Cost</td>
            <td>No Of frames</td>
            <td>Cover</td>
            <td>Glass Cost</td>
        </tr>
        <tr>
            <!---------------------- Frame Section-------------------------------------------->
            <td><span class="thumbtd" ><img id="frame_display" name="frame_display" width="68" height="81" alt="ff" /> <label id="frame"/></span></td>
            <td><select name="frame_type" id="frame_type" class="inputs" onchange="filter_frames(this.value)"style="width:100px">
                    <option value="">Please Select </option>
                    <?php $frames=$this->quotation_model->get_frames();
                    foreach($frames as $frame)
                    { ?>
                        <option value="<?php echo $frame->frame_id; ?>"><?php echo $frame->frame_type ?></option>
                    <?php } ?>
                </select></td>
            <td> <input type="text" id="frame_size_length"name="frame_size_length" style="width:90px" onchange="generate_total()"> </td>
            <td> <input type="text" id="frame_size_width"name="frame_size_width" style="width:90px" onchange="generate_total()"> </td>
            <td> <input type="text" id="frame_cost" name="frame_cost"style="width:90px"></td>
            <td> <select name="frameno" id="frameno" style="width:50px" onchange="generate_total();" >
                    <option value="0">Please Select</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
            </td>
            <td><select name="glass" id="glass" onchange="filter_glass(this.value)">
                    <option value="">Please Select</option>
                    <?php $glasses=$this->quotation_model->get_glasses();
                    foreach($glasses as $glass)
                    { ?>
                        <option value="<?php echo $glass->id; ?>"><?php echo $glass->glass_name ?></option>
                    <?php } ?>
                </select></td>
            <td><input type="text" name="glass_cost" id="glass_cost" style="width:90px"></td>
        </tr>
        <!-------------------------------------- mount section------------------------------>
        <tr class="hdrs">
            <td>Mount Visual</td>
            <td >Mount</td>
            <td>Mount Length</td>
            <td>Mount Width </td>
            <td>Mount Cost</td>
            <td>No of Mounts</td>
            <!--<td><strong>Total</strong></td>
            <td></td>-->
        </tr>
        <tr>
            <td><span class="thumbtd" ><img id="mount_display" name="mount_display" width="68" height="81" alt="ff" /><label id="mount_image"></label>
                        </span</td>
            <td><select name="mount_type" id="mount_type" class="inputs" onchange="filter_mounts(this.value)"style="width:100px">
                    <option value="">Please Select </option>
                    <?php $mounts=$this->quotation_model->get_mounts();
                    foreach($mounts as $mount)
                    { ?>
                        <option value="<?php echo $mount->mount_id; ?>"><?php echo $mount->mount_type ?></option>
                    <?php } ?>
                </select></td>
            <td><input type="text"  name="mount_size_length" id="mount_size_length" style="width:90px"onchange=" generate_total()">

                    </td>
            <td><input type="text"  name="mount_size_width" id="mount_size_width" style="width:90px"onchange=" generate_total()">
            <td><input type="text"  id="mount_cost" name="mount_cost" style="width:90px"></td>
            <td> <select name="mountno" id="mountno" style="width:50px" onchange="generate_total();">
                    <option value="0">Please Select</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select></td>
           <!-- <td><input type="text" id = "total_price" name="total_price" style="width:90px"> </label></td>
            <td> <input type="submit" name="save" id="save"  onclick="insert_in()" value="save" ></td>-->
        </tr>

    </table>
<p>&nbsp;</p>
<p>&nbsp;</p>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr class="darktr">
            <td width="150" class="bold">Prints Total:</td>
           <td><input type="text" name="print_total" id="print_total"  /></td>
        </tr>
        <tr class="darktr">
            <td width="150" class="bold">Frame Total:</td>
            <td><input type="text" name="frame_total" id="frame_total"  /></td>
        </tr>
        <tr class="darktr">
            <td width="150" class="bold">Mount Total:</td>
            <td><input type="text" name="mount_total" id="mount_total"  /></td>
        </tr>
        <tr class="darktr">
            <td width="150" class="bold">Glass Total:</td>
            <td><input type="text" name="glass_total" id="glass_total"  /></td>
        </tr>
        <tr class="darktr">
            <td width="150" class="bold"> Total:</td>
            <td><input type="text" name="total_price" id="total_price"  /></td>
        </tr>
        <tr>
            <td width="150" class="bold"></td>
            <td> <input type="submit" name="save" id="save"  onclick="insert_in()" value="save" ></td>
        </tr>
        </table>
</td>
</tr>
</table>
</form>
<form action ="<?php echo base_url()?>index.php/quotation/create_quotation_final"  name="form2" id ="form2" method="post">
<div style="padding:30px; text-align:left">
    <input type="hidden" name="hide1" id="hide1" value="<?php echo $this->uri->segment(3);?>"/>
    <input type="submit" name="addcpn" id="addcpn" value="next" class="bt-create-quote"/ ></div>
<!--<div style="padding:30px; text-align:left"> <input type="submit" name="addcpn" id="addcpn" value="Generate Quotation" class="bt-create-quote" onclick="insert_in()" />
    <input type="submit" name="addcpn2" id="addcpn2" value="Convert to Invoice" class="bt-create-quote" style="background:#333399" />

</div>-->
</form>

</div>
</div>
</div>
