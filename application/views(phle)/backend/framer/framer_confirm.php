<?php  $framer = $this->backend_model->get_frame(); ?>
<?php  $vendor = $this->backend_model->get_vendor(); ?>

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>

<script type="text/javascript">
    function get_frame_values(id)
    {
        var datastring='frame_id=' + id ;
        $.ajax({
            type: "POST",
            url: "<?php print base_url() ?>index.php/backend/get_frame_values",
            data: datastring,
            success: function(data)
            {
                //alert(data);
                var value=data.split("/");
                var add='localhost/Wallsnart2/assets/images/';
                $('#width').val(value['0']);
                $('#color').val(value['1']);
                $('#framecode').val(value['2']);
                $('#frameimage').attr('src',add+value['3']);


            }
        });
    }

</script>

<script type="text/javascript">
    function validateField(field) {

        var input = document.getElementById(field);
        //alert(input);
        input.style.borderColor = "";
        input.style.backgroundColor = "";

        if (input.value.trim() == "") {

            input.style.borderColor = "#c00";
            input.style.backgroundColor = "#fee";
            return false;
        }
        return true;
    }

    function validate() {
        var valid = true;
        var fields = ['vendor_company_name' , 'printing_frame'];
        for (var i in fields) {
            valid = validateField(fields[i]) && valid;
        }

        return valid;
    }
</script>



<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
<div id="middle-container">
<div class="main-hdr"> Add New Frame Details</div>

<div class="add-newcp"> <span style="color:red"><?= $msg;?></span>
<div class="mndry">*Mandatory Fields</div>
<form action="<?php echo base_url();?>index.php/backend/show_framer/<?php echo $id?> " method="post" enctype="multipart/form-data" id="add_form" onsubmit="return validate();" >

<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr style="background:#e5e5e5">
        <td>Frame Details</td>
        <td>&nbsp;</td>
    <tr>
        <?php if(!$insert_id){?> <td>Company Name*</td> <?php }?>
        <td> Type of Frame*</td>
        <td>Frame Code</td>
        <td>Frame Visual</td>
        <td>Width of Frame</td>
        <td>Frame Description</td>
        <td>Color</td>
        <td>Cost Per Feet Frame</td>
    </tr>



    <?php if(!$insert_id){?>

    <td>
        <select name="vendor_company_name" id="vendor_company_name"  /><option value="">Select Company Name</option>
            <?php foreach($vendor as $v)
            {?>
                <option  value="<?php print $v['vender_id'];?>"><?php print $v['vender_company_name'];?></option>
            <?php } ?>
            </select> </td> <?php } ?>


        <td><select name="printing_frame" id="printing_frame"  onchange="get_frame_values(this.value)"/><option value="">Select Frame Type</option>
            <?php foreach($framer as $framer_detail)
            {?>
                <option value="<?php print $framer_detail['frame_type'];?>"><?php print $framer_detail['frame_type'];?></option>
            <?php } ?>
            </select>
        </td>


        <td><input type="text" name="framecode" id="framecode"  size="10"></td>

        <td><!--<img src="" name="frameimage" id="frameimage" width="50" height="50" border="3">--><input type="file" name="selectimage" id="selectimage" > </td>
        <td><input type="text" name="width" id="width"   placeholder="min-0.5 inches, max-2 inches"  size="10"/></td>
<td><textarea id="frame_desc" name="frame_desc"></textarea></td>
        <td><input type="text" name="color" id="color"  size="10" /></td>
        <td><input type="text" name="costperfeet" id="costperfeet"  size="10" /></td>
    </tr>
    <tr style="background:#e5e5e5">
        <td>Glass Details</td>
        <td>&nbsp;</td>
    <tr>
        <td>Glass/Acrylic/none</td>
        <td>Glass Code</td>
        <td>Glass Cost </td>
    </tr>
    <tr>
        <td>
            <select name="gl_ac_ne" id="gl_ac_ne"  >
                <option value="">Select Glass</option>
            <option value="Glass">Glass</option>
            <option value="Acrylic">Acrylic </option>
            <option value="None">None</option>
        </select>
        </td>

        <td><input type="text" name="glass_acry_code" id="glass_acry_code" size="10" /></td>

        <td><input type="text" name="glass_cost" id="glass_cost"  size="10" /></td>
    </tr>


</table>
<input type="submit" class="bt-sbt-upload" name="Add" id="Add" value="Add "  />
</form>
</div>

</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>

<!--MIDDLE PAGE WRAPPER ENDS-->


