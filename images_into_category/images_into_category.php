<?php
ini_set('memory_limit','1024M');
ini_set('max_execution_time',0);

$query='';
 // Connects to Our Database 
 mysql_connect("localhost", "root", "kunal") or die(mysql_error()); 
 mysql_select_db("wallsnart") or die(mysql_error()); 
$id = $_REQUEST['id'];
//$type = $_REQUEST['type'];


 // Load Category (Subject, Art Style) in Array
function idFound($images_id,$id){
	$sql = "SELECT COUNT(*) AS total FROM tbl_images_to_categories WHERE images_id=$images_id AND categories_id = $id";
	$query = mysql_query($sql);
	$result = mysql_fetch_array($query);
	return $result['total'];
 }
 /* 
 //if($type=='rander') {
 
 for($id=3;$id<=83;$id++){
 
 $sqlCategory = mysql_query("Select * from tbl_category WHERE id=$id");
 $getCategoryKeywords=mysql_fetch_array($sqlCategory);
 $catKey = $getCategoryKeywords['keywords'];
 
 $catKeyExp = explode(",",$catKey);
 $arrCatKey = array();
 $arrImagesKey = array();	
 
 foreach($catKeyExp as $itemCatKey){
	$sqlImagesSearch = mysql_query("Select images_id,images_filename,images_keywords from tbl_images_search");
	while($getSearchKeywords=mysql_fetch_array($sqlImagesSearch)){
		
	$imagesKeyExp = explode(',',$getSearchKeywords['images_keywords']);
		foreach($imagesKeyExp as $itemKey){
			$arrImagesKey[] = trim($itemKey);
		}
			$images_id = $getSearchKeywords['images_id'];
			
			if(in_array(strtoupper(trim("$itemCatKey")),$arrImagesKey)){
				if(!idFound($images_id,$id)){
					echo '<br />  Insert '.$getSearchKeywords['images_filename'].'  ';
					echo $getSearchKeywords['images_keywords'].'==========<br />';
					mysql_query("INSERT INTO tbl_images_to_categories(categories_id,images_id) VALUES($id,$images_id)");
				
				}
			}
			$arrImagesKey=null;
		} 
	}
}

	

   
*/ 
 function getMainCaterotyName($subCatId){
	$getCatName = mysql_query("SELECT * FROM tbl_category WHERE id=$subCatId");
	$getCatSubCatName=mysql_fetch_array($getCatName);
	return $getCatSubCatName['name'];
}


$getCatName = mysql_query("SELECT * FROM tbl_category WHERE id=".$id);
$getCatSubCatName=mysql_fetch_array($getCatName);

echo '<br />Main Categories -> <b>'. getMainCaterotyName($getCatSubCatName['p_id']).'</b>';
echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->Sub Categories ->  <b>'. $getCatSubCatName['name']. '</b>';

echo '<br />';

$page = $_REQUEST['page'];

$start=($page-1)*40;
$end = $page*40;


$sql = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM (
    SELECT tbl_images_search.images_filename FROM tbl_images_search,tbl_images_to_categories WHERE tbl_images_search.images_id=tbl_images_to_categories.images_id 
AND tbl_images_to_categories.categories_id=".$id."
    
) res,
(SELECT FOUND_ROWS() AS 'total') tot
LIMIT $start, $end");


$data = mysql_fetch_array($sql); 
echo '<br /><b>Total No of Images Found = '.$data['total'].'<br />Per Page Item = 40 <br />Total Pages = '.ceil($data['total']/40).'</b>'; 
echo '<br />';
while($data=mysql_fetch_array($sql)){
	 
		echo "<img src=https://s3.amazonaws.com/wallsnart/158/$data[images_filename]>";
	}


?>
