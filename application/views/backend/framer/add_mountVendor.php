<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
    function get_mount(id)
    {
        var datastring='mount_id=' + id ;
        $.ajax({
            type: "POST",
            url: "<?php print base_url() ?>index.php/backend/get_mount",
            data: datastring,
            success: function(data)
            {

                var value=data.split("/");
                var add='localhost/Wallsnart2/assets/images/';

               // $('#mcolor').val(value['0']);
                //$('#thickness').val(value['1']);
                $('#mountcode').val(value['2'])
               // $('#mountimage').attr('src',add+value['3']);


            }
        });
    }

</script>

<!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper">
<div id="middle-container">
<div class="main-hdr"> Add New Mount Details</div>

<div class="add-newcp"><div><span style="color:red;"><?php echo $msg;?></div>
    <div class="mndry">*Mandatory Fields</div>
    <form action="<?php echo base_url();?>index.php/backend/add_mountvendor" method="post" enctype="multipart/form-data" id="add_form1" >
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr style="background:#e5e5e5">
                <td>Mount Details</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
               <!-- <td>Company Name</td>-->
                <td>Mount Visual</td>
                <td>Mount Type</td>
                <td>Color</td>
                <td>Thickness</td>
                <td>Cost Per Sq. Feet</td>
            </tr>

            <tr>
             <!--    <td>
	  <select name="vendor" id="vendor" ><option>Select Company Name</option>
	  <?php foreach($vender as $ven)
   {?>
    <option ><?php print $ven['vender_company_name'];?></option>
    <?php }?>
	  </select>
	</td>-->

                <td><!--<img  src="" name="mountimage" id="mountimage"  width="50" height="50" hspace="34" vspace="34" />-->
                    <input type="file" name="selectimage" id="selectimage" ></td>
              <!--  <td> <input type="text" name="mountcode" id=mountcode readonly>  </td>-->
                <td>
                    <select name="mountType" id="mountType"  onchange="get_mount(this.value)"><option>Select Mount Type</option>
                        <?php foreach($mounts as $mount)
                        {?>
                            <option value="<?php print $mount->mount_id;?>"><?php print $mount->mount_type;?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><input type="text" name="mcolor" id="mcolor"   size="12" value=""/></td>

                <td><input type="text" name="thickness" id="thickness" size="12" placeholder="In Microne"  value=""/>
                </td>
                <td><input type="text" name="costpersq" id="costpersq" size="12" /></td>
                <input type="hidden" name="hide" id="hide" value="<?php echo $this->uri->segment(3);?>"/>
            </tr>
        </table>
        <input type="submit" class="bt-sbt-upload" name="Add" id="Add" value="Add"  />
    </form>

</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>

<!--MIDDLE PAGE WRAPPER ENDS--></div>

</div>
