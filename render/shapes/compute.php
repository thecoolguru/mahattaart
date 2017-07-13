<?php
include_once("config.php");
	//$query="update tbl_images_to_categories set shapes='NULL' where categories_id = 123  ";
     //$query_run= mysql_query($query);

	  $query = "Select images_id from tbl_images_to_categories where categories_id = 841 ";
		$query_run= mysql_query($query);
				$row="";
		while ($row=mysql_fetch_array($query_run)) 
		{
			
			get_image_data($row['images_id']);
			//echo $row['images_id'];
		}
	
		echo"Script Completed.";
	  
	  
	function get_image_data($images_id) 
	{
		$image_width = "";
		 $image_height = "";
		 		$query_run1="";
				$row1="";
		 $query1 = "Select image_original_width,image_original_height from tbl_images_search where images_id= '".$images_id."'";
	     		$query_run1=mysql_query($query1);
		while ($row1=mysql_fetch_array($query_run1)) 
		{
			 $image_width = $row1['image_original_width'];
			 $image_height = $row1['image_original_height'];
			//echo"$image_height";
			//echo "$image_width";
			 get_image_shape($image_width,$image_height,$images_id);
		}
	
	}	
	function get_image_shape($width,$height,$images_id) 
	{
	
		
		$query_run3="";
		 $shape = null;
		 $ratio="";
		// $width= settype($image_width,"float");
		 //$height=settype($image_height,"float");
		  echo $width;
		  echo $height;
		 //$ratio = round($image_width)/round($image_height);
		// settype($ratio, "float");
		$ratio= ($width /$height);
		 
		 
		if($ratio == 1.0)
		{
			$shape = "Square";
		}
		else if(($ratio>1.0)&&($ratio<2.0))
		{
			$shape = "Horizontal";
		}
		else if(($ratio>0.5)&&($ratio<1.0))
		{
			$shape = "Vertical";
		}
		else if($ratio>2.0)
		{
			$shape = "Panoramic";
		}
		else if($ratio<0.5)
		{
			$shape = "Slim";
		}
		
		//System.out.println(shape);
		
		// Now update image in tbl_images_to_categories
//		myconnection myconn = new myconnection();
//		Connection con = myconn.mycon();
		
		 $query3 = "update tbl_images_to_categories set shapes='".$shape."' where images_id = '".$images_id."' and categories_id = 841";
		  $query_run3=mysql_query($query3);
		  $num = mysql_num_rows($query_run3);
		  echo"$num";
	}

	
?>