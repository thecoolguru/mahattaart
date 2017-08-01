<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Image Gallery</title>
    <link rel="stylesheet" href='<?php echo base_url()?>assets/css/tree/hoverbox.css' type="text/css" media="screen, projection" />
    <!--[if lte IE 7]>
    <link rel="stylesheet" href='<?php echo base_url()?>assets/css/tree/ie_fixes.css' type="text/css" media="screen, projection" />
    <![endif]-->
  <script type="text/javascript">
       function getid()
        {
            var id=$('#search').val();
            var url="<?=base_url()?>index.php/backend/search_images?id=" +id  ;
            window.location.assign(url);
        }
        function get_checkbox_id()
        {

            var vals = []
            $('input:checkbox[name="check[]"]').each(function() {
                if (this.checked) {
                    vals.push(this.value);
                }
            });
             var values= 'check='+vals;
            $.ajax({
            url:"<?=base_url()?>index.php/backend/send_images",
            type: "POST",
            data:values,
                success: function(data)
                {
                    alert("images have been enabled");
                }
            });

        }
        function get_checkbox_disable_id()
        {

            var vals = []
            $('input:checkbox[name="check[]"]').each(function() {
                if (this.checked) {
                    vals.push(this.value);
                }
            });
            var values= 'check='+vals;
            $.ajax({
                url:"<?=base_url()?>index.php/backend/disable_images",
                type: "POST",
                data:values,
                success: function(data)
                {
                    alert("images have been disabled");
                }
            });

        }
    </script>
</head>
<body>
<div id="middle-wrapper">
<h1>Image Gallery</h1>
 Image Id: <input type="text" id="search" name="search" class="inputbxs" style="background:lightskyblue;"  style="height:50;" style="width:50;"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search_submit" value="Search" class="bt-sbt-global-small" onclick="getid();">
 <input type="submit" value="Enable" onclick="get_checkbox_id();"class="bt-sbt-global-small"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" value="Disable" onclick="get_checkbox_disable_id();"class="bt-sbt-global-small">
    <br/>
    <br/>

<ul class="hoverbox">

    <li>
        <?php foreach($img as $img1=>$value) {?>
            <a href="<?php echo base_url()?>index.php/backend/image_detail/<?php echo $value->images_filename?>/<?php echo $value->images_id; ?>">
          <img src="http://www.indiapicture.in/wallsnart/158/<?php echo $value->images_filename;?>" alt="description" />
              <input type="checkbox" name="check[]"  value="<?php echo $value->images_filename?>">
                <label id="na"><?php
                    if($value->images_status==1)
                    {
                    echo "en";
                    }
                    elseif($value->images_status==0)
                    {
                        echo" dis";
                    }
                    ?>
                </label>

</a>
        <?}?>
    </li>
</ul>
    </div>