<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$sql_1="select images_filename from tbl_images_search where images_filename='".$_REQUEST['image_name']."'";
$rows=  mysql_query($sql_1);
$result_1=  mysql_fetch_assoc($rows);
echo $result_1['images_filename'];
?>
<!--<img src="images/art.jpg" width="107" height="107" alt="art"/>-->
