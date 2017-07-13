<?php //print_r($msg).'werwer'; ?>
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
<div class="main-hdr"> Edit Category</div>

    <div class="add-newcp">
<?php if($msg<>''){ echo $msg;}?>

        <?php
foreach($change_id as $changes_id)
{      if($changes_id->p_id=='0')
{
    $edit_id=$changes_id->id;
}else{
  $edit_id=  $changes_id->p_id;
}
      ?>
<form name=category action="<?=base_url()?>index.php/backend/view_editcategory/<?=$changes_id->id?>" method="post"  >
    <table  width="50%" border="2" cellspacing="0" cellpadding="0">

    <tr>
        <td width="22%">Id:</td>
        <td width="78%"> <input type="text" class="inputbxs" value="<?php echo $changes_id->id;?>" name="catid" id="catid" readonly ></td> <br/>
    </tr>
    <tr>
        <td>Name:</td>
        <td> <input type="text" class="inputbxs" value="<?php echo $changes_id->name;?>" name="catname" id="catname" ></td> <br/>
        </tr>
    <tr>
         <td> Keywords:</td>
         <td> <textarea  name="keywords" id="keywords" class="inputbxs" ><?php echo $changes_id->keywords;?></textarea> </td>

    </tr>

        <tr>
        <td> Status:</td>
        <td> <select name="status"style="width:243px; height:33px;" class="inputbxs"> >
                <option <?php if($changes_id->status=='1'){?> selected="selected" <?php } ?> value="1">Active</option>
                <option <?php if($changes_id->status=='0'){?> selected="selected" <?php } ?> value="0">Deactive</option>

             </select>
        </td>
        </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           </tr>
        <tr>
        <td>&nbsp;</td>
        <input type="hidden" name="update" value="success">
        <td><input type="submit" value="save" name="savecategory" class="bt-sbt-upload"  >&nbsp; <a href="<?=base_url()?>index.php/backend/manage_category?id=<?=$edit_id?>"><input type="button" value="View All" name="savecategory" class="bt-sbt-upload"  ></a></td>
        </tr>
</table>
    
</form>

<?php }?>
        </div>

<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>