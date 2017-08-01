<!--<script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>assets/js/draggable/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>assets/js/draggable/jquery-1.9.1.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/smoothness/jquery-ui-1.10.3.custom.min.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/smoothness/style.css">

<script type="text/javascript">
    $(function(){
        $('.draggable').draggable({ scroll: true, cursor: "move"});
    });
</script>

<body>
    <div id="w" style="background:url(<?php echo base_url();?>assets/images/room-view.jpg) no-repeat top center;height:500px;">
<div id="icons">
            <img  src="<?php echo base_url()?>600/1b271d41ae3ce2e6fd9cf52c7d09b0dc.png" class="draggable" align="center" id="crownicon" alt="royal crown"  >
</div>
</div>
</body>
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Room View </title>

    <link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
    <style type="text/css">

        .container {
            margin-top: 50px;
            cursor:move;
        }
        #screen {
            overflow:hidden;
            width:500px;
            height:500px;
            clear:both;
            border:1px solid black;
        }

    </style>




    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/smoothness/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

    <script type="text/javascript">

        $(function() {
            $("#draggable").draggable( {containment: "#w",
                scroll: false});

        });
    </script>
</head>

<body>

<!--<div class="container">

    <div id="screen">
        <img src="<?php echo base_url()?>600/1b271d41ae3ce2e6fd9cf52c7d09b0dc.png" class="drag-image" id="draggable"/>
    </div>

</div>-->

<div id="w"  style="background:url(<?php echo base_url();?>assets/images/room-view.jpg) no-repeat top center; width:725px;height:500px;border:1px solid black;">
    <div id="icons">
        <?php
        $height="";
        $size= $this->uri->segment(3);
        $sizex= explode("X",$size);
        $size1= $sizex[0];
        $size2= $sizex[1];
        ?>
        <?php  $wid=$size2/12 * 720/10;
        $hig=$size1/12*720/10;
        ?>
        <img  src="<?php echo base_url()?>600/<?php echo $this->uri->segment(4);?>"class="drag-image" id="draggable"   height="<?php echo $hig;?>" width="<?php echo $wid;?>">
    </div>
</div>

</body>
</html>