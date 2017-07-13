<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once 'csvreader.php';

class render 
{

	private static $_dbUser = 'admin_wallsnart';
	private static $_dbPass = 'arts@#009';
	private static $_dbDB = 'wallsnart_beta';
	private static $_dbHost = 'localhost';
	private static $_connection = NULL;

	public static function getConnection() {
		if (!self::$_connection) {
			self::$_connection = @new mysqli(self::$_dbHost, self::$_dbUser, self::$_dbPass, self::$_dbDB);

			if (self::$_connection -> connect_error) {
				die('Connect Error: ' . self::$_connection->connect_error);
			}
		}
		return self::$_connection;
	}
}

$csvobj=new CSVReader();
$file_name='f10.csv';
$results=$csvobj->parse_file($file_name);


// Make connection
$obj=new render();
$con=$obj->getConnection();
$i=1;
foreach ($results as $result)
{
	//print $i;
// 	print " ";
	$image_name=$result['id'];
	$image_width=$result['Width'];
	$image_height=$result['height'];
	echo"$image_name";
	//$image_size=$result['Size'];
	//print "<br>";
	$queryu="update tbl_images_search set image_original_width='$image_width',image_original_height='$image_height' where images_filename='$image_name'";
	mysqli_query($con,$queryu);
	$i++;
}

print "Done";
