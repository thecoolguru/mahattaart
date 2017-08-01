<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Image In Category </title>
    <link rel="stylesheet" href='<?php echo base_url()?>assets/css/tree/hoverbox.css' type="text/css" media="screen, projection" />
    <!--[if lte IE 7]>
    <link rel="stylesheet" href='<?php echo base_url()?>assets/css/tree/ie_fixes.css' type="text/css" media="screen, projection" />
    <![endif]-->
</head>
<body>


<ul class="hoverbox">

    <li>
        <?php foreach($img as $img1=>$value) {?>
            <a href="#"><img src="http://www.indiapicture.in/wallsnart/158/<?php echo $value->images_filename;?>" alt="description" /></a>
        <?}?>
    </li>
</ul>