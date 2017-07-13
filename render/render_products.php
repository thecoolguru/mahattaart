<?php
set_time_limit(100000);
$conn=mysql_connect("localhost","admin_wallsnart","arts@#009");
mysql_select_db("wallsnart_beta",$conn);

$query ="SELECT DISTINCT images_id,images_collectionid from tbl_images_search WHERE tbl_images_search.images_product_types like '%Photographic Print%'  ";
$res=mysql_query($query);

$a=mysql_fetch_array($res);
$count=mysql_num_rows($res);
echo"$count";

while($a = mysql_fetch_array($res))
{
    echo $a[0].'<br>';
    echo $a[1].'<br>';
  //  $query1 = mysql_query("INSERT INTO tbl_images_to_categories(images_id,categories_id,collection_id,product_type)  VALUES ('$a[0]','790','$a[1]','Photographic Print')");
}
?>