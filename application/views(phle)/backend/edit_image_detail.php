<head>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" >
        function validateField(field) {

            var input = document.getElementById(field);
            alert(input);
            input.style.borderColor = "";
            input.style.backgroundColor = "";

            if (input.value.trim() == "" || (field == "catname" && input.value == null)|| field == "catid" && input.value ==null ) {

                input.style.borderColor = "#c00";
                input.style.backgroundColor = "#fee";
                return false;
            }
            return true;
        }

        function validate() {
            var valid = true;
            var fields = ['catid', 'catname' ];
            for (var i in fields) {
                valid = validateField(fields[i]) && valid;
            }

            return valid;
        }

    </script>
</head>

<div id="middle-wrapper">
    <div class="main-hdr"> Edit Image </div>
    <span style="color:#F00;font-size:16px"><?php print $msg;?></span>
    <div class="add-newcp">
        <?php
        foreach($detail as $changes_id)
        {
            ?>
            <form name=category action="<?=base_url()?>index.php/backend/edit_image_detail/<?=$changes_id->images_id?>" method="post"  >
                <table  width="50%" border="2" cellspacing="0" cellpadding="0">

                    <tr>
                        <td width="22%">Id:</td>
                        <td width="78%"> <input type="text" class="inputbxs" value="<?php echo $changes_id->images_id;?>" name="catid" id="catid" readonly=""></td> <br/>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td> <input type="text" class="inputbxs" value="<?php echo $changes_id->images_filename;?>" name="imagename" id="imagename" readonly="" ></td> <br/>
                    </tr>
                    <tr>
                        <td> Keywords:</td>
                        <td> <textarea  name="keywords" id="keywords" class="inputbxs" ><?php echo $changes_id->images_keywords;?></textarea> </td>

                    </tr>
                    <tr>
                        <td> Status:</td>
                        <td> <select name="status"style="width:243px; height:33px;" class="inputbxs"> >
                                <option <?php if($changes_id->images_status=='1'){?> selected="selected" <?php } ?> value="1">Active</option>
                                <option <?php if($changes_id->images_status=='0'){?> selected="selected" <?php } ?> value="0">Deactive</option>

                            </select>
                        </td>
                    </tr>
                     <tr>
                        <?php foreach($popularity as $pop){?>
                        <td> Popularity</td>
                        <td> Click To Enlarge:<input type="text" name="clk_to_en" id="clk_to_en" value="<?php echo $pop->click_to_elarge;?>"/><br/>
                            Add To Cart: <input type="text" name="add_to_cart" id="add_to_cart" value="<?php echo $pop->add_to_gallery;?>" /><br/>
                            Add To Gallery:<input type="text" name="add_to_gal" id="add_to_gal" value="<?php echo $pop->add_to_cart;?>" /><br/>
                            Sale:<input type ="text" name="sale" id="sale" value="<?php echo $pop->sale;?>"/><br/>
                             Final Score:<input type="text" name="final_score" id="final_score" value="<?php echo $pop->final_score;?>"/></td>
                        <?}?>
                    </tr>
                   
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" value="save" name="savecategory" class="bt-sbt-upload"  ></td>
                    </tr>
                </table>

            </form>

        <?}?>
    </div>

    <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>