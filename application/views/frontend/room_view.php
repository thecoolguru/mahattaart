<?php 
if($this->session->userdata('userid'))
{
$Obj=new Frontend();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 
?>
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
    <title>Room View</title>

    <link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
    <style type="text/css">

        .container {
            margin-top: 50px;
            cursor:move;
        }
        #screen {
            overflow:hidden;
            width:auto;
            height:500px;
            clear:both;
            border:1px solid black;
            text-align: center;
        }

    </style>




    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/smoothness/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $("#draggable").draggable();
        });
    </script>
</head>

<body>

<!--<div class="container">

    <div id="screen">
        <img src="<?php echo base_url()?>600/1b271d41ae3ce2e6fd9cf52c7d09b0dc.png" class="drag-image" id="draggable"/>
    </div>

</div>-->

<div align="center" id="screen"  style="background:url(<?php echo base_url();?>assets/images/room-view.jpg) no-repeat top center;">
    <div id="icons">
        <img  src="<?php echo base_url()?>600/<?php echo $this->uri->segment(3);?>"class="drag-image" id="draggable"   style="height: 100px">
    </div>
</div>

</body>
</html>