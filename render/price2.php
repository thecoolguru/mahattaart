<?php
	error_reporting(E_ALL);
		ini_set("display_errors", 1);
class render {
	
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
	
	/*public function give_licence_price($collection_id)
	{
		if(($collection_id==174)||($collection_id==154)||($collection_id==167))
		{
			return 640;
		}
		else if(($collection_id==126))
		{
			return 40*61.98;
		}
		else
		{
			return 1920;
		}
	}
*/
    public function give_licence_price($pricing_range)
    {if($pricing_range=='mid')
     {
        return 1800;
     }
        elseif($pricing_range=='low')
        {
            return 600;
        }
        else if($pricing_range=='high')
        {
            return 3000;
        }

    }

}




// Make connection
$obj=new render();
$con=$obj->getConnection();

//now get all images greater than 40K
$result = mysqli_query($con,"SELECT * FROM tbl_images_search  where images_photographer='EVRM'");

while($row = mysqli_fetch_array($result)) {
  $image_id=$row['images_id'];
  $collection_id=$row['images_collectionid'];
  $image_name=$row['images_filename'];
  $pricing_range=$row['pricing_range'];
  $size_data = getimagesize("http://www.indiapicture.in/wallsnart/398/".$image_name."");
			
			$image_width=$size_data[0];
			$image_height=$size_data[1];
			$image_ratio=$image_width/$image_height;
			$size_array=array();
			if($size_data[0]>$size_data[1])
			{	
				$size_array[0]['width']=8*$image_ratio;
				$size_array[0]['height']=8;
			}
			else if($size_data[0]<$size_data[1])
			{					
				$size_array[0]['width']=8;
				$size_array[0]['height']=8*(1/$image_ratio);
			}
        if( $size_array[0]['width']> $size_array[0]['height'])
    {
        $low_val=round($size_array[0]['height']);
        $high_val=round($size_array[0]['width']);

    }
    else
    {
        $low_val=round($size_array[0]['width']);
        $high_val=round($size_array[0]['height']);
    }
    if( $high_val<24)
    {
        $wastage_cost= (24 -  $high_val) * $low_val*2 ;
    }
    else
    {
        $wastage_cost= (24 -  $low_val) * $high_val*2 ;
    }

			$price= round($size_array[0]['width'])*round($size_array[0]['height'])*2+$wastage_cost+$obj->give_licence_price($pricing_range);
			$final_price=round($price);
             print $final_price.'<br/>';
			print "<br/>";
			print $queryu="update tbl_images_search set images_min_price='$final_price' where images_photographer ='EVRM' ";
			mysqli_query($con,$queryu);
  
  
}

print "Done!!!";
?>
