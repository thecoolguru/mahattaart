<?php
ob_start();
class Backend_model extends CI_Model
{ 
	function __construct()
	{
		$this->load->database();
		$this->load->library(array('session'));
	}
	
/*******************promo code*******************/

public function auto_expired_promo_code($sr_no)
{
	$this->db->where('sr_no',$sr_no);
	$this->db->set('active','2');
	$this->db->update('tbl_promo_code');
}

public function get_all_promo_code_active_date()
{
	
	$this->db->select('*');
	$query=$this->db->get('tbl_promo_code');
	return $query->result();

}

public function get_vendor_types_model()
{
$this->db->select("*");
$query=$this->db->get('kiosk_users');
return $query->result();
//print_r($query->result());die();
}



public function get_all_tbl_promo_code_details($search_for,$status)
{
	$this->db->where('prom_for',$search_for);
	$this->db->where('active',$status);
	$query=$this->db->get('tbl_promo_code');
	
	return $query->result();
}


public function update_active_prormo_code_model($promo_code_id,$status_id,$active)
{
$this->db->where('sr_no',$promo_code_id);
$this->db->where('active',$status_id);
$query=$this->db->update('tbl_promo_code',$active);
}

public function promo_code_deletions_model($promo_code_id)
{
 //echo "in Model".$promo_code_id; die();
 $this->db->where('sr_no',$promo_code_id);
 $this->db->delete('tbl_promo_code');

}


public function update_deactive_prormo_code_model($promo_code_id,$status_id,$deactive)
{
 
// print_r($deactive); die();

	
$this->db->where('sr_no',$promo_code_id);
$this->db->where('active',$status_id);
$query=$this->db->update('tbl_promo_code',$deactive);


}

public function update_expired_prormo_code_model($promo_code_id,$status_id,$expired)
{
	
$this->db->where('sr_no',$promo_code_id);
$this->db->where('active',$status_id);
$query=$this->db->update('tbl_promo_code',$expired);

//$this->db->last_query($query); die();
}


public function get_all_promo_code_details_model($promo_code_id,$status_id)
{
$this->db->select('*');
$this->db->where('sr_no',$promo_code_id);
$this->db->where('active',$status_id);
$query=$this->db->get('tbl_promo_code');
return $query->result();

}









public function get_location_id_for_promo_code_model($location)
{
  $this->db->select('location_id');
  $this->db->where('location',$location);
  $query=$this->db->get('kiosk_users');
  return $query->result();
}

public function get_location_for_promo_code_model($create_prom_for)
{
$this->db->select('location');
$this->db->where('vendor_types',$create_prom_for);
$query=$this->db->get('kiosk_users');
return $query->result();
}



public function get_all_kiosk_prormo_code_model()
{
$this->db->select('*');
$this->db->where('prom_for','kiosk');
$this->db->where('active','1');
$query=$this->db->get('tbl_promo_code');

//print_r($this->db->last_query()); die();
return $query->result();


}



public function add_promo_code_model($data)
{
//print_r($data); die();
$this->db->insert('tbl_promo_code',$data);

}



public function get_all_tbl_promo_code()
	{
		$this->db->select('promo_name');
		$this->db->distinct();
	    $query=$this->db->get('tbl_promo_code');
		return $query->result();
    }
	
	
public function delete_prormo_code($promo_code_id)
{
  
  
  $this->db->where('sr_no',$promo_code_id);
  $this->db->delete('tbl_promo_code');
}	





/******************End Prormo Code**********************/	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/*************Query Form**************/
 public function add_form($data)
  { 
	  
	  $this->db->insert('tbl_query_form',$data);
	  $inserted_id=$this->db->insert_id();
	  $this->session->set_userdata('last_inserted_id', $inserted_id);
  }
  
   public function get_record()
  {
   
   $this->db->order_by('id', 'DESC');
   $query=$this->db->get('tbl_query_form');
   return $query->result();
  
  }
  
   public function edit_model($id,$select)
  {
	 $this->db->where('id',$id);
	 $query=$this->db->get('tbl_query_form',$id);
	 return $query->result();
  }
  
  
   public function edit_record($id,$data)
  {
    $this->db->where('id',$id);
	$this->db->update('tbl_query_form',$data);
  }
  
  
    public function delete_form_model($id)
  {
   
   $this->db->where('id',$id);
   $this->db->delete('tbl_query_form');
  } 
  
  
   public function view_details_model($id)
  {
   
   $this->db->where('id',$id);
   $quuery=$this->db->get('tbl_query_form');
   return $quuery->result();
    
  }
  
  
  
//Submisssion


public function get_file_name($sub_id) 
{
	$this->db->where('id',$sub_id);
	$this->db->select('submission_files');
	$query=$this->db->get('tbl_form_submission');
	return $query->result();
   
}


public function  add_submission_model($data)
 {
  //$this->db->set('added_date',now());
  $this->db->insert('tbl_form_submission',$data);
  
 }
 
 public function view_submission_model($query_form_id)
 {
	 
	 $this->db->where('query_form_id',$query_form_id);
	 $this->db->order_by('id','DESC');
	 $query=$this->db->get('tbl_form_submission');
    // print_r($query->result());
	 return $query->result();
 }
 
 public function delete_submission_model($id)
 {
   $this->db->where('id',$id);
   $this->db->delete('tbl_form_submission');
 }
 
 public function show_in_edit($sub_id)
 {
  $this->db->where('id',$sub_id);
  $query=$this->db->get('tbl_form_submission');
  return $query->result();
 }
 
 public function get_query_id_model($id)
 {
	 $this->db->where('id',$id);
	 $this->db->select('query_form_id');
	 $query=$this->db->get('tbl_form_submission');
	 return $query->result();
 
 }
 
 
  public function edit_submission_record_model($sub_id,$data)
 {
  
  $this->db->where('id',$sub_id);
  $this->db->update('tbl_form_submission',$data);
 
 }








/************End Query Form****************/
	
	
	
	
	

	public function insert_channel_partner($data)
	{
		$this->db->insert('tbl_channel_partner_details',$data);
	}

      public function get_view_invoice_details($quotation_id)
{
        $sql="select * from tbl_invoice q inner join tbl_invoice_details q_d on q.invoice_id=q_d.invoice_id";
        $rows=  mysql_query($sql);
        return mysql_fetch_assoc($rows);

}





public function save_lightbox($data)
      {
         $insert= $this->db->insert('tbl_lightbox_images',$data);
         if($insert){
             return 1;
         }else{
             return 0;
         }
      }





public function get_whole_details($searchby) {
        
        $this->db->select('*');
                if($searchby==1)
                {
        $this->db->where_not_in('print_paper','0');
                }elseif($searchby==2)
                {
          $this->db->where('frame_type','2');
                }
        $query=$this->db->get('tbl_add_details');
        return $query->result();
    }
    
     public function get_web_priceby($paper_type)
    {
        
        $this->db->select('DISTINCT(rate)');
        $this->db->where('paper_type',$paper_type);
        $query=$this->db->get('tbl_web_price');
        return $query->result();
       
    }
    


public function get_web_price($quality)
    {
            
        $this->db->select('*');
       
        if($quality==2 || $quality==3 || $quality==4 || $quality==1){        
        $this->db->where('paper_type',$quality);
        }else{
           $this->db->where('quality',$quality);  
        }
        $query=$this->db->get('tbl_web_price');
        return $query->result();
       
    }


public function cancel_quotation($invoice_id){
    $data=array('status'=>'3','convert_to_invoice'=>'3');
    $this->db->where('quotation_id',$invoice_id);
   $query= $this->db->update('tbl_quotation',$data);
                if($query){
                    return 1;
                }else{
                    return 0;
                }
}

public function get_roll_size(){
    $this->db->select('*');
   // $this->db->where('roll != ',0,FALSE);
     $this->db->order_by('roll','asc');
    $query= $this->db->get('tbl_add_roll');
    return $query->result();
}

public function get_frame_category(){
    $this->db->select('*');
   //$this->db->where('frame_cat!= ',0,FALSE);
     $this->db->order_by('frame_cat','asc');
    $query= $this->db->get('tbl_add_details');
    return $query->result(); 
}



public function get_packager_details($order_id){
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('order_packager_status');
        return $query->result();
}






public function resize_image($source_image, $destination_filename, $width, $height , $quality , $crop )
{

	if( ! $image_data = getimagesize( $source_image ) )
	{
		return false;
	}

	switch( $image_data['mime'] )
	{
		case 'image/gif':
			$get_func = 'imagecreatefromgif';
			$suffix = ".gif";
		break;
		case 'image/jpeg';
			$get_func = 'imagecreatefromjpeg';
			$suffix = ".jpg";
		break;
		case 'image/png':
			$get_func = 'imagecreatefrompng';
			$suffix = ".png";
		break;
	}

	$img_original = call_user_func( $get_func, $source_image );
	$old_width = $image_data[0];
	$old_height = $image_data[1];
	$new_width = $width;
	$new_height = $height;
	$src_x = 0;
	$src_y = 0;
	$current_ratio = round( $old_width / $old_height, 2 );
	$desired_ratio_after = round( $width / $height, 2 );
	$desired_ratio_before = round( $height / $width, 2 );

	if( $old_width < $width || $old_height < $height )
	{
		/**
		 * The desired image size is bigger than the original image.
		 * Best not to do anything at all really.
		 */
		return false;
	}


	/**
	 * If the crop option is left on, it will take an image and best fit it
	 * so it will always come out the exact specified size.
	 */
	if( $crop )
	{
		/**
		 * create empty image of the specified size
		 */
		$new_image = imagecreatetruecolor( $width, $height );

		/**
		 * Landscape Image
		 */
		if( $current_ratio > $desired_ratio_after )
		{
			$new_width = $old_width * $height / $old_height;
		}

		/**
		 * Nearly square ratio image.
		 */
		if( $current_ratio > $desired_ratio_before && $current_ratio < $desired_ratio_after )
		{
			if( $old_width > $old_height )
			{
				$new_height = max( $width, $height );
				$new_width = $old_width * $new_height / $old_height;
			}
			else
			{
				$new_height = $old_height * $width / $old_width;
			}
		}

		/**
		 * Portrait sized image
		 */
		if( $current_ratio < $desired_ratio_before  )
		{
			$new_height = $old_height * $width / $old_width;
		}

		/**
		 * Find out the ratio of the original photo to it's new, thumbnail-based size
		 * for both the width and the height. It's used to find out where to crop.
		 */
		$width_ratio = $old_width / $new_width;
		$height_ratio = $old_height / $new_height;

		/**
		 * Calculate where to crop based on the center of the image
		 */
		$src_x = floor( ( ( $new_width - $width ) / 2 ) * $width_ratio );
		$src_y = round( ( ( $new_height - $height ) / 2 ) * $height_ratio );
	}
	/**
	 * Don't crop the image, just resize it proportionally
	 */
	else
	{
		if( $old_width > $old_height )
		{
			$ratio = max( $old_width, $old_height ) / max( $width, $height );
		}else{
			$ratio = max( $old_width, $old_height ) / min( $width, $height );
		}

		$new_width = $old_width / $ratio;
		$new_height = $old_height / $ratio;

		$new_image = imagecreatetruecolor( $new_width, $new_height );
	}

	/**
	 * Where all the real magic happens
	 */
	imagecopyresampled( $new_image, $img_original, 0, 0, $src_x, $src_y, $new_width, $new_height, $old_width, $old_height );

	/**
	 * Save it as a JPG File with our $destination_filename param.
	 */
	imagejpeg( $new_image, $destination_filename, $quality  );

	/**
	 * Destroy the evidence!
	 */
	imagedestroy( $new_image );
	imagedestroy( $img_original );

	/**
	 * Return true because it worked and we're happy. Let the dancing commence!
	 */
	return true;
}


 public function get_view_order_details($order_id)
{
        $sql="select * from tbl_orders q inner join tbl_orders_details q_d on q.order_id=q_d.order_id";
        $rows=  mysql_query($sql);
        return mysql_fetch_assoc($rows);

}
public function get_qut_csv()

    {

        $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->join('tbl_orders_details', 'tbl_orders.order_id=tbl_orders_details.order_id');
        $this->db->where('tbl_orders.order_id',$order_id);
        $this->db->group_by('tbl_orders.image_id');
        $query=$this->db->get();
        return $query->result();

    }
public function get_vendor_name_tbl_web_price($vendor_name){
		$query=$this->db->query('SELECT unique_ven_id,vendor_name,vendor_contact,vendor_lead_time,vendor_dtls FROM tbl_web_price where vendor_name="'.$vendor_name.'" UNION SELECT unique_ven_id,vendor_name,vendor_contact,vendor_lead_time,vendor_dtls FROM tbl_web_price_final where vendor_name="'.$vendor_name.'"');
		 if($vendor_name==''){
        return $query->result();
		}else{
		$ven_details=$query->result();
		//$new_result=$ven_details[0]->unique_ven_id.','.$ven_details[0]->vendor_name;
		$new_result=$ven_details[0]->unique_ven_id.','.$ven_details[0]->vendor_name.','.$ven_details[0]->vendor_contact.','.$ven_details[0]->vendor_lead_time.','.$ven_details[0]->vendor_dtls;
		//$ven_id=
		$sequential = array("foo", "bar", "baz", "blong");
		//print_r($sequential);
		echo json_encode(explode(",",$new_result));
		}
}

public function get_order_details($order_id)

    {

       $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->join('tbl_orders_details', 'tbl_orders.order_id2=tbl_orders_details.order_id2');
        $this->db->where('tbl_orders.order_id',$order_id);
        $this->db->group_by('tbl_orders_details.image_id');
        $query=$this->db->get();
       return $query->result();

    }
	public function change_amount_into_word($num){
	
	//echo "sajid sayeexi";
	 
$ones = array( 
1 => "one", 
2 => "two", 
3 => "three", 
4 => "four", 
5 => "five", 
6 => "six", 
7 => "seven", 
8 => "eight", 
9 => "nine", 
10 => "ten", 
11 => "eleven", 
12 => "twelve", 
13 => "thirteen", 
14 => "fourteen", 
15 => "fifteen", 
16 => "sixteen", 
17 => "seventeen", 
18 => "eighteen", 
19 => "nineteen" 
); 
$tens = array( 
1 => "ten",
2 => "twenty", 
3 => "thirty", 
4 => "forty", 
5 => "fifty", 
6 => "sixty", 
7 => "seventy", 
8 => "eighty", 
9 => "ninety" 
); 
$hundreds = array( 
"hundred", 
"thousand", 
"million", 
"billion", 
"trillion", 
"quadrillion" 
); //limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
if($i < 20){ 
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
$rettxt .= $tens[substr($i,0,1)]; 
$rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
$rettxt .= " ".$tens[substr($i,1,1)]; 
$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
} 
} 
if($decnum > 0){ 
$rettxt .= " and "; 
if($decnum < 20){ 
$rettxt .= $ones[$decnum]; 
}elseif($decnum < 100){ 
$rettxt .= $tens[substr($decnum,0,1)]; 
$rettxt .= " ".$ones[substr($decnum,1,1)]; 
} 
} 
return $rettxt; 

	}
public function get_order_details_after_payment($invoice_id)

    {
    //echo $invoice_id;
        $this->db->select('*');
       // $this->db->order_by('id','desc');
        $this->db->where('inv_order_id',$invoice_id);
        $query=$this->db->get('order_details');
        return $query->result();

    }

    public function get_order_final($id)

    {
     $this->db->select('*');
        $this->db->where('id',$id);
        $query=$this->db->get('tbl_orders');
        return $query->result();
       }


 public function convert_into_orders($order_id)
 
 
    {
	
	//print_r($order_id);die;
	
	
/*
         $sql="insert into tbl_orders (order_id, order_id2, customer_id, image_id, collection, licence_cost, surface, print_size_height, print_size_width, print_cost, print_rate, print_discount, actual_print_cost, print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, convert_to_order, order_type, nofs, print_type, created_date)
                select invoice_id, order_id, customer_id, image_id, collection, licence_cost, surface, print_size_height, print_size_width, print_cost, print_rate, print_discount, actual_print_cost, print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, 0, invoice_type, nofs, print_type, created_date
               from tbl_invoice where invoice_id='".$order_id."'";
			  
			   */
			   
   $sql="INSERT INTO tbl_orders_details (order_id2, order_id, customer_id,customer_name,customer_city,customer_phone,customer_email,customer_address,company_name,customer_type, image_id, collection, licence_cost, surface, print_size_height, print_size_width, print_cost, print_rate, print_discount, actual_print_cost, print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, convert_to_order,nofs, channel_partner,print_type,paid_status,created_date,first_name,last_name,email_id,gander,marries_statue,address,country,state,city,region,sku_id)
			
SELECT quotation_id, order_id, customer_id,customer_name,customer_city,customer_phone,customer_email,customer_address,company_name, customer_type,image_id, collection, licence_cost, surface, print_size_height, print_size_width, print_cost, print_rate, print_discount, actual_print_cost, print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, 0, nofs,channel_partner, print_type,paid_status,created_date,first_name,last_name,email_id,gander,marries_statue,address,country,state,city,region,sku_id
FROM tbl_quotation_details where quotation_id='".trim($order_id)."'";
        $insert=  mysql_query($sql);
		 $sql1=" INSERT INTO tbl_orders (order_id2, order_id, customer_id,customer_city,customer_type,company_name, image_id, collection, licence_cost, surface, print_size_height, print_size_width, print_cost, print_rate, print_discount, actual_print_cost, print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, convert_to_order,  nofs, channel_partner,print_type,paid_status,created_date,sku_id)
		
		
SELECT order_id2, order_id, customer_id,customer_city,customer_type,company_name, image_id, collection, licence_cost, surface, print_size_height, print_size_width, print_cost, print_rate, print_discount, actual_print_cost, print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, sum(cp_amount), sp_amount, sum(wna_sp_amount), seller_amount, total, after_discount, sum(discount), tax, tax_type, packing_charge, courier_charge, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, 0, nofs,channel_partner, print_type,paid_status,created_date,sku_id
FROM tbl_orders_details where order_id2='".trim($order_id)."'";
        $insert1=  mysql_query($sql1);

     /*   $sql2="insert into tbl_orders_details (customer_id, order_id, first_name, last_name, email_id, gander, marries_statue, address, company_name, country, state, city, region, pincode, contact, created_date) select customer_id, invoice_id, first_name, last_name, email_id, gander, marries_statue, address, company_name, country, state, city, region, pincode, contact, created_date from tbl_invoice_details where invoice_id='".trim($order_id)."'";
        $insert2=  mysql_query($sql2);

*/
        if($insert && $insert1)
        {
		
		
            $sql_3="update tbl_invoice set convert_to_order='1' where invoice_id='".trim($order_id)."'";
            mysql_query($sql_3);
echo $sql_4="update tbl_orders set convert_to_order='6' where order_id2='".trim($order_id)."'";
            mysql_query($sql_4);
echo $sql_5="update tbl_orders_details set convert_to_order='6' where order_id2='".trim($order_id)."'";
            mysql_query($sql_5);
echo $sql_6="update tbl_quotation_details set convert_to_invoice='6',channel_partner='0' where quotation_id='".trim($order_id)."'";
            mysql_query($sql_6);
echo $sql_7="update tbl_quotation set convert_to_invoice='6',channel_partner='0' where quotation_id='".trim($order_id)."'";
            mysql_query($sql_7);


            return 1;
        }else{
            return 0;
        }
    }
	
	


public function get_view_quotation_details($quotation_id)
{
        $sql="select * from tbl_quotation q inner join tbl_quotation_details q_d on q.quotation_id=q_d.quotation_id";
        $rows=  mysql_query($sql);
        return mysql_fetch_assoc($rows);

}

public function get_all_quotation_details($quotation_id)

    {   $this->db->select('*');
        $this->db->order_by('id','desc');
        $this->db->where('quotation_id',$quotation_id);
        $query=$this->db->get('tbl_quotation_details');
        return $query->result();

    }
	public function get_all_inventory_details()

    {   $this->db->select('*');
		$this->db->order_by('sr_no','desc');
        //$this->db->where('quotation_id',$quotation_id);
        $query=$this->db->get('tbl_inventory_details');
        return $query->result();

    }
	public function get_submitt_inventory($itmi)

    {   
	
	   $this->db->select('*');
        $this->db->from('tbl_inventory');
        //$this->db->join('tbl_inventory_details', 'tbl_inventory.item_id=tbl_inventory_details.item_id');
        $this->db->where('item_id','77');
        //$this->db->group_by('tbl_orders.image_id');
        $query=$this->db->get();
        return $query->result();

}
public function GetFilename_details($images_id) {
		//print_r();
             $sql_1="select images_filename from tbl_images_search where images_id in ($images_id)";
            $rows=  mysql_query($sql_1);  
            return $rows;
        }
public function get_Gallery_images_lightbox_details($lightbox_id)
	{
	//print_r($lightbox_id);
	
		$trimed_final_id=str_replace("'","",$lightbox_id);
		 
		 $lightbox_id_f = explode(",", $trimed_final_id);
	 //print_r($pieces);die;
		 $this->db->select('*');
		$this->db->where_in('lightbox_id',$lightbox_id_f);
		$query=$this->db->get('tbl_lightbox_images');
		return $query->result();
		//print $this->db->last_query();

	}
public function get_all_lightboxes()
	{
	//print_r($user_id);
		$this->db->select('*');
		$this->db->where('user_id','209');
		$this->db->order_by("lightbox_name");
		$query=$this->db->get('tbl_lightbox_details');
		return $query->result();

	}
	
	public function get_tbl_inventory($itemid)

    {   
	   $this->db->select('*');
        $this->db->from('tbl_inventory');
		$this->db->order_by('sr_no','desc');
		$this->db->where('item_id',$itemid);
        //$this->db->join('tbl_inventory_details', 'tbl_inventory.item_id=tbl_inventory_details.item_id');
       // $this->db->where('tbl_inventory.item_id',$itemid);
        //$this->db->group_by('tbl_orders.image_id');
        $query=$this->db->get();
        return $query->result();

	
	/*
	     $this->db->select('*');
         $this->db->order_by('item_id','desc');
        //$this->db->where('quotation_id',$quotation_id);
        $query=$this->db->get('tbl_inventory_details');
        return $query->result();
		*/

    }
	public function update_inventory_modl($itmi)

    {
	//echo $itmi;die;   
	
	$this->db->select('*');
       // $this->db->order_by('item_id','desc');
        $this->db->where('item_id',$itmi);
        $query=$this->db->get('tbl_inventory_details');
        return $query->result();

    }
	
	public function edit_all_quotation_detailss($quotation_id)

    {   
	
   	     $this->db->select('*');
        $this->db->where('quotation_id',$quotation_id);
        $query=$this->db->get('tbl_quotation_details');
		return $query->result();

    }


    public function convert_into_invoice($quotation_id)
    {
	//echo $quotation_id;die;
         $sql="INSERT INTO tbl_invoice_details (invoice_id, order_id, image_id, collection, licence_cost, surface, print_size_height, print_size_width, print_cost, print_rate, print_discount, actual_print_cost, print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_emailid, sales_contact,client_emailid, client_contact, createdby, convert_to_order, invoice_type, nofs, print_type,paid_status, customer_id,customer_type,sales_person,client_servicing, customer_city, first_name, last_name, email_id, gander, marries_statue, address, company_name, country, state, city, region, pincode, contact,created_date,sku_id)
		
		
SELECT quotation_id, order_id, image_id, collection, licence_cost, surface, print_size_height, print_size_width, print_cost, print_rate, print_discount, actual_print_cost, print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_emailid, sales_contact, client_emailid, client_contact, createdby, 0, quotation_type, nofs, print_type,paid_status,customer_id,customer_type,sales_person,client_servicing, customer_city, first_name, last_name, email_id, gander, marries_statue, address, company_name, country, state, city, region, pincode, contact, created_date,sku_id
FROM tbl_quotation_details where quotation_id='".trim($quotation_id)."'";
       $insert=  mysql_query($sql);
	   


    

 $ivcdtltoinv="INSERT INTO tbl_invoice (invoice_id,order_id,customer_type ,company_name,customer_city, customer_id, image_id, collection, licence_cost, surface, print_size_height, print_size_width, print_cost, print_rate, print_discount, actual_print_cost, print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, convert_to_order,  nofs, print_type,paid_status,created_date,sku_id)
		
		
SELECT invoice_id, order_id,customer_type ,company_name,customer_city, customer_id, image_id, collection, licence_cost, surface, print_size_height, print_size_width, sum(print_cost), sum(print_rate), sum(print_discount), sum(actual_print_cost), sum(print_total), sum(final_royality), sum(final_wna_license_share), sum(wna_actual_license_share), sum(diff_royality), sum(actual_royality), frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, sum(mount_cost), sum(mount_actual_cost), sum(mount_discount), sum(mount_rate), sum(mount_total), glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, sum(cp_amount), sp_amount, sum(wna_sp_amount), sum(seller_amount), total, sum(after_discount),sum(discount), tax, tax_type, sum(packing_charge), sum(courier_charge), sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, 0,  nofs, print_type,paid_status,created_date,sku_id
FROM tbl_invoice_details where invoice_id='".trim($quotation_id)."'";

       $ivcdtltoinvf=  mysql_query($ivcdtltoinv);

  
	   
       if($insert && $ivcdtltoinvf )
       {
	   
	   
           $sql_2="update tbl_quotation set convert_to_invoice='1' where quotation_id='".trim($quotation_id)."'";
           mysql_query($sql_2);
          $sql_3="update tbl_quotation_details set convert_to_invoice='1' where quotation_id='".trim($quotation_id)."'";
           mysql_query($sql_3);
             $sql_4="update tbl_invoice_details set convert_to_order='6' where invoice_id='".trim($quotation_id)."'";
           mysql_query($sql_4);
		   $sql_5="update tbl_invoice set convert_to_order='6' where invoice_id='".trim($quotation_id)."'";
           mysql_query($sql_5);

           return 1;
       }else{
           return 0;
       }
	   }
    
/* created by sajid starts for order*/
/*
public function get_channel_partner(){
$this->db->select('*');
       
        
        $query=$this->db->get('tbl_quotation');
        return $query->result();

}
*/
public function get_quotation_tbl($qut)

    {
	//print_r($qut);die;
	
       $this->db->select('*');
       //$this->db->order_by('id','desc');
	   $this->db->where('quotation_id',trim($qut));
       $query=$this->db->get('tbl_quotation');
        return $query->result();
		}
		public function get_quotation_tbl_download($qutn_id)

    {
	//print_r($qutn_id);
        $this->db->select('*');
       //$this->db->order_by('id','desc');
	   $this->db->where_in('quotation_id',$qutn_id);
       $query=$this->db->get('tbl_quotation');
      return $query->result();
	  // return $qqq;
		//print_r($qqq);
		//die;
		}
		
		public function get_order_tbl_download($qutn_id)

    {
	//print_r($qutn_id);die;
       $this->db->select('*');
       //$this->db->order_by('id','desc');
	   $this->db->where_in('order_id2',$qutn_id);
       $query=$this->db->get('tbl_orders');
        return $query->result();
		}
		
		public function get_invoice_tbl_download($qutn_id)

    {
	//print_r($qutn_id);die;
       $this->db->select('*');
       //$this->db->order_by('id','desc');
	   $this->db->where_in('invoice_id',$qutn_id);
       $query=$this->db->get('tbl_invoice');
        return $query->result();
		}
public function convert_quetation_into_order()
    {
	
        $sql="insert into tbl_orders (order_id, order_id2, customer_id, image_id,  licence_cost, surface, print_size_height, print_size_width, print_cost,  print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost, actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, convert_to_order, order_type, nofs, print_type, created_date)
SELECT quotation_id, order_id, customer_id, image_id,  licence_cost, surface, print_size_height, print_size_width, print_cost,  print_total, final_royality, final_wna_license_share, wna_actual_license_share, diff_royality, actual_royality, frame_id, frame_code, frame_size_height, frame_size_width, frame_cost, frame_actual_cost, frame_rate, frame_discount, frame_total, mount_id, mount_code, mount_size_height, mount_size_width, mount_cost, mount_actual_cost, mount_discount, mount_rate, mount_total, glass_name, glass_cost,actual_glass_cost, glass_rate, glass_discount, canvas_cost, actual_canvas_cost, canvas_rate, canvas_discount, border, status, price, cp_amount, sp_amount, wna_sp_amount, seller_amount, total, after_discount, discount, tax, tax_type, packing_charge, courier_charge, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, client_contact, createdby, 0, quotation_type, nofs, print_type, created_date
FROM tbl_quotation where channel_partner=1";
       $insert3=  mysql_query($sql);


       
       if($insert3)
       {
         
           return 1;
       }else{
           return 0;
       }
    }


/* created by sajid ends*/



  public function get_printer_jobsheet_details($order_id){
       $this->db->select('*');
        $this->db->where('order_id',$order_id);
        
        $query=$this->db->get('order_printer_status');
        return $query->result();
  }  
  
  public function get_framer_jobsheet_details($order_id){
      
       $this->db->select('*');
        $this->db->where('order_id',$order_id);
        
        $query=$this->db->get('order_framer_status');
        return $query->result();
  }  
  
  public function get_packager_jobsheet_details($order_id){
       $this->db->select('*');
        $this->db->where('order_id',$order_id);
        
        $query=$this->db->get('order_packager_status');
        return $query->result();
  }  
  
   public function get_courier_jobsheet_details($order_id){
       $this->db->select('*');
        $this->db->where('order_id',$order_id);
        
        $query=$this->db->get('order_courier_status');
        return $query->result();
  }  
    
public function get_all_order_details($order_id)

    {
	//print_r($order_id);die;
    //echo $invoice_id;
       $this->db->select('*');
        $this->db->order_by('id','desc');
        $data['orderall']=$this->db->where('order_id',$order_id);
        $query=$this->db->get('tbl_orders',$data);
        return $query->result();

    }


public function get_all_invoice($invoice_id)

    {
    //echo $invoice_id;
        $this->db->select('*');
        $this->db->order_by('id','desc');
        $this->db->where('invoice_id',$invoice_id);
        $query=$this->db->get('tbl_invoice');
        return $query->result();

    }

    public function get_all_quotation($quotation_id)

    {
    //echo $quotation_id;die;
        $this->db->select('*');
        $this->db->order_by('id','desc');
        $this->db->where('quotation_id',$quotation_id);
        $query=$this->db->get('tbl_quotation_details');
        return $query->result();

    }

public function frame_details($surface,$name)
{
         $sql="select * from tbl_framer where surface ='".$surface."' and framer_code like '".$name."%'";
        $rows=  mysql_query($sql);
        $result=  mysql_fetch_assoc($rows);
        //echo $result['surface'];
        return array('frame_name'=>$result['surface'],'frame_color'=>$result['color'],'frame_rate'=>$result['rate']);
}


public function glass_details($surface,$name)
{
         $sql="select * from tbl_framer where surface ='".$surface."' and framer_code like '".$name."%'";
        $rows=  mysql_query($sql);
        $result=  mysql_fetch_assoc($rows);
        //echo $result['surface'];
        return array('glass_name'=>$result['surface'],'glass_color'=>$result['color'],'glass_rate'=>$result['rate']);
}


public function printer_details($surface,$name)
{
        $sql="select * from tbl_printer where display_name ='".$surface."' ";
        $rows=  mysql_query($sql);
        $result=  mysql_fetch_assoc($rows);
        //echo $result['surface'];
        return array('display_name'=>$result['display_name'],'rate'=>$result['rate']);
}


public function mount_details2($surface,$name)
{
         $sql="select * from tbl_framer where surface ='".$surface."' and framer_code like '".$name."%'";
        $rows=  mysql_query($sql);
        $result=  mysql_fetch_assoc($rows);
        //echo $result['surface'];
        return array('mount_name'=>$result['surface'],'mount_color'=>$result['color'],'mount_rate'=>$result['rate']);
}
public function get_all_invoice_details($invoice_id)

    {
    //echo $invoice_id;
        $this->db->select('*');
        $this->db->order_by('id','desc');
        $this->db->where('invoice_id',$invoice_id);
        $query=$this->db->get('tbl_invoice_details');
        return $query->result();

    }
    public function login_verification($email,$password)
	{

		$this->db->select('*');
		$this->db->where('email_id',trim($email));
		$this->db->where('password',trim($password));
	    $query=$this->db->get('tbl_customer');
        //echo 'from'.$query->num_rows().'num';die;
		if($query->num_rows()>0)
		{
//echo 'from'.$query->num_rows().'num';die;

			return $query->row();
		}
		else
		{
			return false;
		}

	}

      ////////////// code for invoice///////////////

      public function view_invoices()
      {
       $sql="select * from tbl_invoice tbl_invoice inner join tbl_invoice_details tbl_invoice_details ON tbl_invoice.invoice_id=tbl_invoice_details.invoice_id order by tbl_invoice.id DESC";
       return mysql_query($sql);
      }



       public function get_invoice_company_name()

    {
       $this->db->select('DISTINCT(company_name)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_invoice_details');
        return $query->result();

    }

    public function get_invoice_id_distinct()

    {
        $sql="select DISTINCT(invoice_id) from tbl_invoice where convert_to_order !='2' order by created_date desc";
        return mysql_query($sql);


    }

    public function get_invoices_distinct()

    {
        $sql="select DISTINCT(invoice_id) from tbl_invoice where convert_to_order !='2' order by id desc";
        return mysql_query($sql);


    }


    public function get_invoice_contact_person()

    {
       $this->db->select('DISTINCT(client_servicing)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_invoice');
        return $query->result();

    }

    public function get_invoice_sales_person()

    {
       $this->db->select('DISTINCT(sales_person)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_invoice');
        return $query->result();

    }



    public function get_total_invoice()

    {
       $this->db->select('*');
        $this->db->where('convert_to_order !=','2');
       $query=$this->db->get('tbl_invoice');
        return $query->num_rows();

    }


    public function search_invoice($company_name,$contact_person,$sales_person,$region,$quotation_id,$status,$search_date,$customer_type)
    {
	//echo $company_name;die;
        $this->get_invoices_distinct();
        $company_name=  str_replace('%20', ' ', $company_name);
        $sales_person=  str_replace('%20', ' ', $sales_person);

       if($company_name!='none')
       {
           $query1="and  company_name='".$company_name."'";
       }
       if($company_name!='none')
       {
           $query2="and  client_servicing='".$contact_person."'";
       }
       if($sales_person!='none')
       {
           $query3="and  sales_person='".$sales_person."'";
       }if($region!='none')
       {
           $query4="and region='".$region."'";
       }if($quotation_id!='none')
       {
           $query5="and invoice_id='".$quotation_id."'";
       }if($status!='none')
       {
           $query6="and convert_to_order='".$status."'";
       }
	   if($customer_type!='none')
       {
           $query9="and customer_type='".$customer_type."'";
       }
	   
	   
	   if($search_date!='none')
       {
           $split=  split('_',$search_date);
           $from=$split[0];
           $to=$split[1];

           $query7="and  created_date between '".$from."' and '".$to."'";
       }

       $query8='and convert_to_order !=2';

       if($region!='none' || $company_name!='none'){
         $sql_1="select * from tbl_invoice_details   where 1  $query1  $query4  ";
      $rows=  mysql_query($sql_1);

       }
	   else if($customer_type!='none'){
	   
	    $sql_1="select * from tbl_invoice_details
   where customer_type='".$customer_type."' group by invoice_id order by created_date desc ";
     $rows=  mysql_query($sql_1);
	   }
	   
	   else  if($region=='none' || $company_name=='none'){
        $sql_1="select * from  tbl_invoice   where 1  $query2 $query3  $query5 $query6 $query7 $query8" ;
		
      $rows=  mysql_query($sql_1);


       }
      return  $rows;

    }

       public function get_invoice_data($invoice_id)
        {
		//print_r($invoice_id);die;
        $sql="select * from tbl_invoice q inner join tbl_invoice_details q_d on q.invoice_id=q_d.invoice_id where q_d.invoice_id='".$invoice_id."' order by q_d.created_date desc";
        $rows=  mysql_query($sql);
        return mysql_fetch_assoc($rows);

        }

       public function get_invoice_order_id()

    {
       $this->db->select('DISTINCT(invoice_id)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_invoice_details');
        return $query->result();

    }


      ////////////////////// code for order //////////////////////////



       public function get_order_company_name()

    {
       $this->db->select('DISTINCT(company_name)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_orders_details');
        return $query->result();

    }


       public function get_total_order()

    {
       $this->db->select('order_id');
       $this->db->distinct('order_id');
       $query=$this->db->get('tbl_orders');
        return $query->num_rows();

    }
       public function get_order_order_id()

    {
       $this->db->select('DISTINCT(order_id2)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_orders_details');
        return $query->result();

    }

       public function get_order_contact_person()

    {
       $this->db->select('DISTINCT(client_servicing)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_orders');
        return $query->result();

    }




     public function get_order_sales_person()

    {
       $this->db->select('DISTINCT(sales_person)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_orders');
        return $query->result();

    }


  public function view_job_sheet($order_id,$type){

      if($type=='printer')
      {
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('order_printer_status');

      }elseif($type=='framer')
      {
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('order_framer_status');

      }elseif($type=='packager')
      {
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('	order_packager_status');

      }elseif($type=='courier')
      {
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('	order_courier_status');

      }
      return $query->result();
  }

    public function search_order($company_name,$contact_person,$sales_person,$region,$quotation_id,$status,$search_date,$customer_type,$order_id)
    {
//print_r($customer_type);die;
       $contact_person= str_replace('%20', ' ', $contact_person);
       $sales_person= str_replace('%20', ' ', $sales_person);
       if($company_name!='none')
       {
           $query1="and  company_name='".$company_name."'";
       }
       if($contact_person!='none')
       {
           $query2="and  client_servicing='".$contact_person."'";
       }
       if($sales_person!='none')
       {
           $query3="and  sales_person='".$sales_person."'";
       }if($region!='none')
       {
           $query4="and region='".$region."'";
       }if($order_id!='none')
       {
           $query5="and order_id='".$order_id."'";
       }
	   if($customer_type!='none')
       {
           $query5="and customer_type='".$customer_type."'";
       }
	   if($quotation_id!='none')
       {
             $query9="and order_id2='".$quotation_id."'";
       }
	   
	   if($status!='none')
       {
           $query6="and convert_to_order='".$status."'";
       }if($search_date!='none')
       {
           $split=  split('_',$search_date);
           $from=$split[0];
           $to=$split[1];

           $query7="and  created_date between '".$from."' and '".$to."'";
       }


       if($company_name<>'none' || $region<>'none' || $quotation_id<>'none' )
       {
            $sql_1="select * from  tbl_orders order_id  where 1  $query1  $query4 $query9";
         $rows=  mysql_query($sql_1);
       }else if($company_name=='none' || $region=='none')
       {
          $sql_1="select * from  tbl_orders order_id  where 1 and convert_to_order!='2'  $query2 $query3 $query5 $query6 $query7 ";
         $rows=  mysql_query($sql_1);
       }



       return $rows;
       unset($company_name);
       unset($region);

    }


    public function status_courier($order_id)
    {
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('order_courier_status');
        return $query->num_rows();
    }

    
  public function get_printer_allowed_time($order_id){
    $this->db->select('completion_date');
    $this->db->where('order_id',$order_id);
   $query= $this->db->get('order_printer_status');
    return $query->result();
      
  }
  
   public function get_noofproduct_quantity($image_id){
    $this->db->select('image_id');
    $this->db->where('image_id',$image_id);
   $query= $this->db->get('tbl_orders');
    return $query->num_rows();
      
  }
  

 public function get_packager_allowed_time($order_id){
    $this->db->select('completion_date');
    $this->db->where('order_id',$order_id);
   $query= $this->db->get('order_packager_status');
    return $query->result();
      
  }
  
  public function get_framer_allowed_time($order_id){
    $this->db->select('completion_date');
    $this->db->where('order_id',$order_id);
   $query= $this->db->get('order_framer_status');
    return $query->result();
      
  }
  

public function get_courier_allowed_time($order_id){
    $this->db->select('dispatch_date');
    $this->db->where('order_id',$order_id);
   $query= $this->db->get('order_courier_status');
    return $query->result();
      
  }
    
    public function sendmail($pending,$emailid_to)
{

		$to=$emailid_to;
		$subject="Task is pending with'".$pending."'";
		$headers = "From: info@wallsnart.com\r\n";
		$headers .= "X-Mailer: PHP/".phpversion();
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$message="Job sheet is pending with'".$pending."'\r\n";
            	$message.="if it not clickable then copy the link and paste in browser. \r\n";
	       $sentmail = @mail($to,$subject,$message,$headers);
               if($sentmail)
                   return 1;
               else
                   return 0;




}




     public function status_printer($order_id)
    {
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('order_printer_status');
        return $query->num_rows();
    }

     public function status_framer($order_id)
    {
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('order_framer_status');
        return $query->num_rows();
    }

public function get_invoice_date($order_id){
	$this->db->select('created_date');
	$this->db->where('invoice_id',$order_id);
	$query=$this->db->get('tbl_invoice');
	return $query->result();
}

  public function status_packager($order_id)
    {
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('order_packager_status');
        return $query->num_rows();
    }

    public function insert_into_print_order($data)
    {
       $insert= $this->db->insert('order_printer_status',$data);
       if($insert)
       {
           return 1;
       }else{
           return 0;
       }
    }

    public function insert_into_packager_order($data)
    {
        
       
       $insert= $this->db->insert('order_packager_status',$data);
       if($insert)
       {
           return 1;
       }else{
           return 0;
       }
    }


    public function insert_into_courier_order($data)
    {
       $insert= $this->db->insert('order_courier_status',$data);
       if($insert)
       {
           return 1;
       }else{
           return 0;
       }
    }


      public function record_count_order()

    {
       $this->db->select('*');
       $query=$this->db->get('tbl_orders');
        return $query->num_rows();

    }

         public function get_order_distinct()
        {
             $sql_1="select DISTINCT(order_id) from tbl_orders where convert_to_order!=2 order by id desc ";
            return $rows=  mysql_query($sql_1);


        }



        public function get_order_data($order_id)
        {
        $sql="select * from tbl_orders inner join tbl_orders_details  on tbl_orders.order_id=tbl_orders_details.order_id where tbl_orders_details.order_id='".$order_id."' ";
        $rows=  mysql_query($sql);
        return mysql_fetch_array($rows);

        }






        ////////////////////////// code for Quotation ////////////////
        public function get_quotation_company_name()

    {
       $this->db->select('DISTINCT(company_name)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_quotation_details');
        return $query->result();

    }
	public function get_quotation_customer_type()

    {
       $this->db->select('DISTINCT(customer_type)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_quotation_details');
        return $query->result();

    }
	public function get_distinct_mount_name(){
    $this->db->select('DISTINCT(mount)');
    $query= $this->db->get('tbl_add_details');
    return $query->result(); 
}
	public function get_paper_name(){
    $this->db->select('DISTINCT(print_paper)');
   //$this->db->where('frame_cat!= ',0,FALSE);
   //saaya
   // $this->db->order_by('frame_cat','asc');
    $query= $this->db->get('tbl_add_details');
    return $query->result(); 
}
  public function get_all_tbl_images_search($filename) {
		//print_r($filename);
              $sql='select  * from tbl_images_search where images_filename in ('.$filename.')';
             $rows=  mysql_query($sql);
			 //while($result=  mysql_fetch_array($rows)){
             return $rows;
			 
			 //$main_filename=$result['images_filename'];
			// }
        }
		
		//starts shortlist method from dev to mahattaart by sajid(04-05-17)
public function update_web_price($row_id){
        $this->db->select('*');
        $this->db->where('id',$row_id);
        $query=$this->db->get('tbl_web_price');
        return $query->result();
}
public function save_web_price($data,$row_id){
    
        $this->db->where('id',$row_id);
        $query=$this->db->update('tbl_web_price',$data);
		if($query){
		echo "success";
		
		}
		else{
		echo "faled";
		
		}
        //return $query->result();
}
 public function get_distinct_order_id()

    {
       $this->db->select('DISTINCT(order_id)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_quotation_details');
        return $query->result();

    }

public function get_tbl_quotation_details($quotation_id)

    {   
	
   	     $this->db->select('*');
        $this->db->where('quotation_id',$quotation_id);
        $query=$this->db->get('tbl_quotation_details');
		return $query->result();

    }
	public function get_order_quotation_id()

    {
       $this->db->select('DISTINCT(order_id2)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_orders_details');
        return $query->result();

    }
  public  function get_tbl_invoice_details($invoice_id){
		//echo $invoice_id;
		$this->db->select('sku_id,updated_status,updated_date');
		$this->db->where('invoice_id',$invoice_id);
		$this->db->order_by('id','desc');
		$query=$this->db->get('tbl_invoice_details');
		return $query->result();	
		
		}
			public function get_all_tbl_web_price(){
        $this->db->select('*');
        $query=$this->db->get('tbl_web_price');
        return $query->result();
       }
		 public function get_tbl_frame_details(){
        $this->db->select('*');
        $query=$this->db->get('tbl_frame_details');
        return $query->result();
       }
	   public function tbl_mount_details(){
        $this->db->select('*');
        $query=$this->db->get('tbl_mount_details');
        return $query->result();
       }
	    public function get_tbl_glass_details(){
        $this->db->select('*');
        $query=$this->db->get('tbl_glass_details');
        return $query->result();
       }
	    public function get_tbl_ink_details(){
        $this->db->select('*');
        $query=$this->db->get('tbl_ink_details');
        return $query->result();
       }
	   public function get_tbl_framing_raw_meterails(){
        $this->db->select('*');
        $query=$this->db->get('tbl_framing_raw_meterails');
        return $query->result();
       }
	   public function get_tbl_packeging_details(){
        $this->db->select('*');
        $query=$this->db->get('tbl_packeging_details');
        return $query->result();
       }
	    public function get_tbl_corrugated_5ply(){
        $this->db->select('*');
        $query=$this->db->get('tbl_corrugated_5ply');
        return $query->result();
       }
	    public function get_tbl_corrugated_3ply(){
        $this->db->select('*');
        $query=$this->db->get('tbl_corrugated_3ply');
        return $query->result();
       }
	    public function get_tbl_brown_tape_5ply(){
        $this->db->select('*');
        $query=$this->db->get('tbl_brown_tape_5ply');
        return $query->result();
       }
  //Ends shortlist method from dev to mahattaart by sajid(04-05-17)

	
public function get_glass_name(){
    $this->db->select('DISTINCT(glass)');
    $query= $this->db->get('tbl_add_details');
    return $query->result(); 
}
public function get_quality_tbl_web_price(){
        $this->db->select('DISTINCT(quality)');
       // $this->db->where('order_id',$order_id);
        $query=$this->db->get('tbl_web_price');
        return $query->result();
}
    public function get_quotation_order_id()

    {
       $this->db->select('DISTINCT(quotation_id)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_quotation_details');
        return $query->result();

    }

//saaj
    public function get_quotation_contact_person()

    {
       $this->db->select('DISTINCT(client_servicing)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_quotation');
        return $query->result();

    }

    public function get_quotation_sales_person()

    {
       $this->db->select('DISTINCT(sales_person)');
       $this->db->order_by('id','desc');
       $query=$this->db->get('tbl_quotation');
        return $query->result();

    }



    public function get_total_quotation()

    {
       $this->db->select('*');
       $query=$this->db->get('tbl_quotation');
        return $query->num_rows();

    }


    public function search_quotation($company_name,$contact_person,$sales_person,$region,$quotation_id,$status,$search_date,$customer_type,$order_id)
    {
	//echo  $customer_type;die;sajidd
	
        $this->get_quotation_distinct();
        $contact_person= str_replace('%20', ' ', $contact_person);
         $sales_person= str_replace('%20', ' ', $sales_person);
       if($company_name!='none')
       {
           $query1="and  company_name='".$company_name."'";
       }
       if($contact_person!='none')
       {
           $query2="and  client_servicing='".$contact_person."'";
       }
       if($sales_person!='none')
       {
           $query3="and  sales_person='".$sales_person."'";
       }if($region!='none')
       {
           $query4="and region='".$region."'";
       }if($quotation_id!='none')
       {
           $query5="and quotation_id='".$quotation_id."'";
       }
	   if($customer_type!='none')
       {
           $query9="and customer_type='".$customer_type."'";
       }
	  if($order_id!='none')
       {
           $query9="and order_id='".$order_id."'";
       }
	   
	   if($status!='none')
       {
           $query6="and convert_to_invoice='".$status."'";
       }if($search_date!='none')
       {
           $split=  split('_',$search_date);
           $from=$split[0];
           $to=$split[1];

           $query7="and  created_date between '".$from."' and '".$to."'";
       }
    
       if($company_name!='none' || $region!='none')
       {

       $sql_1="select * from tbl_quotation_details  where 1  $query1  $query4 $query9";
         $rows=  mysql_query($sql_1);
       }else if($company_name=='none' || $region=='none')
       {

               $sql_1="select DISTINCT quotation_id,customer_type, customer_id, surface, sales_person, sales_emailid, sales_contact, client_servicing, client_emailid, convert_to_invoice from tbl_quotation   where 1 and convert_to_invoice!='2'   $query2 $query3  $query5 $query6 $query7 $query9";
         $rows=  mysql_query($sql_1);
       }
 
       return $rows;
    }







     public function delete_invoice($invoice_id)
    {
	//echo $invoice_id;die;
     // $sql="update tbl_invoice set convert_to_order='2' where invoice_id='".$invoice_id."'";
	  //by sajid
	  $sql="DELETE FROM tbl_invoice  WHERE invoice_id='".$invoice_id."'";
        $update=  mysql_query($sql);
		$sql1="DELETE FROM tbl_invoice_details  WHERE invoice_id='".$invoice_id."'";
      $update1=  mysql_query($sql1);
       if($update && $update1)
       {
           return 1;
       }else{
           return 0;
       }

    }






      public function record_count_quotation()

    {
       $this->db->select('*');
       $query=$this->db->get('tbl_quotation');
        return $query->num_rows();

    }

         public function get_quotation_distinct()
        {
            $sql_1="select DISTINCT(quotation_id) from tbl_quotation where convert_to_invoice!=2 order by id desc ";
            return $rows=  mysql_query($sql_1);


        }







        public function edit_quotation_image($id)

    {

        $this->db->select('*');

        $this->db->where('id',$id);

        $query=$this->db->get('tbl_quotation');

        return $query->result();

    }

    public function get_total_amount($quotation) {
       $sql="select * from  tbl_quotation where  quotation_id='".$quotation."'";
       $rows=  mysql_query($sql);
       while($result=  mysql_fetch_assoc($rows)):
          $discount=$result['discount'];
         if($result['print_type']==1){
                    $price= $result['price'];
                 }elseif($result['print_type']==2){
                    $price= $result['price']+$result['mount_price'];
                 }elseif($result['print_type']==3){
                    $price= $result['price']+$result['frame_cost'];
                 }elseif($result['print_type']==4){
                    $price= $result['price']+$result['mount_price']+$result['frame_cost']+$result['glass_cost'];
                 } elseif($result['print_type']==5){
                    $price= $result['price']+$result['mount_price']+$result['frame_cost'];
                 } elseif($result['print_type']==6){
                    $price= $result['price']+$result['frame_cost']+$result['canvas_cost'];
                 }
                 
               $price= $result['price'];   
               $cp_price= $result['cp_amount'];   
               $wna_sp_amount= $result['wna_sp_amount'];   
                 
         $discount=$result['discount'];

           $extra_charges=$result['courier_charge']+$result['packing_charge'];
         $total_price+=$price;
         $cp_total+=$cp_price;     
         $total_wna_sp_amount+=$wna_sp_amount;     
       endwhile;
       if($cp_total<>''){
       $total_amount=$cp_total;
       }else{
         $total_amount=$total_price;    
       }
       if($discount!=0)
         {

          $discount_val= $total_amount*$discount/100;
            $final_amount=$total_amount-$discount_val;
         }else if($discount==0){
          $final_amount=$total_amount;
         }

        $tax_1=$final_amount*5/100;
       $grand_total=$final_amount;


       return $total_wna_sp_amount;
    }


    public function get_total_amount_invoice($invoice_id) {
       $sql="select * from  tbl_invoice where  invoice_id='".$invoice_id."'";
       $rows=  mysql_query($sql);
       while($result=  mysql_fetch_assoc($rows)):
        $discount=$result['discount'];
         if($result['print_type']==1){
                    $price= $result['price'];
                 }elseif($result['print_type']==2){
                    $price= $result['price']+$result['mount_price'];
                 }elseif($result['print_type']==3){
                    $price= $result['price']+$result['frame_cost'];
                 }elseif($result['print_type']==4){
                    $price= $result['price']+$result['mount_price']+$result['frame_cost']+$result['glass_cost'];
                 } elseif($result['print_type']==5){
                    $price= $result['price']+$result['mount_price']+$result['frame_cost'];
                 } elseif($result['print_type']==6){
                    $price= $result['price']+$result['frame_cost']+$result['canvas_cost'];
                 }
         $price= $result['price'];   
               $cp_price= $result['cp_amount'];   
               $wna_sp_amount= $result['wna_sp_amount'];       
         $discount=$result['discount'];

           $extra_charges=$result['courier_charge']+$result['packing_charge'];
         $total_price+=$price;
         $cp_total+=$cp_price;  
          $total_wna_sp_amount+=$wna_sp_amount;     
       endwhile;
       if($cp_total<>''){
       $total_amount=$cp_total;
       }else{
         $total_amount=$total_price;    
       }
       if($discount!=0)
         {

          $discount_val= $total_amount*$discount/100;
            $final_amount=$total_amount-$discount_val;
         }else if($discount==0){
          $final_amount=$total_amount;
         }

        $tax_1=$final_amount*5/100;
       $grand_total=$final_amount;


       return $total_wna_sp_amount;
    }


        public function get_quotation_data($quotation_id)
        {
		//print_r($quotation_id);die;
        $sql="select * from tbl_quotation q inner join tbl_quotation_details q_d on q.quotation_id=q_d.quotation_id where q_d.quotation_id='".$quotation_id."'";
        $rows=  mysql_query($sql);
        return mysql_fetch_assoc($rows);

        }

         public function get_edit_quotation_details($quotation_id)
        {
             //echo $quotation_id;
            $this->db->select('*');
             $this->db->where('quotation_id',$quotation_id);
            $this->db->order_by('id','desc');
            $query= $this->db->get('tbl_quotation');
           return $query->result();

        }

        public function delete_quotation_detail($quotation_id)

    {  
	// by sajid
	$this->db->where('quotation_id',$quotation_id);
     $this->db->delete('tbl_quotation_details');
	
	/*
	 $data=array('status'=>'2');

        $this->db->where('quotation_id',$id);

        $this->db->update('tbl_quotation',$data);
		*/

    }

        public function get_user_details($user_id)
        {
             $sql="select * from tbl_registration where customer_id='".$user_id."'";
            $rows=mysql_query($sql);
            return mysql_fetch_object($rows);

        }

        public function get_quotation_details($quotation)
        {
            $sql="select * from tbl_quotation where quotation_id='".$quotation."'";
            $rows=mysql_query($sql);
              return $query->result();

        }
		
public function get_tbl_quotation_details_saj_csv($qutn_id)
        {
	
           echo   $this->db->select('*');
             $this->db->where_in('quotation_id',$qutn_id);
            $query= $this->db->get('tbl_quotation_details');
           return $query->result();

        }
		public function get_tbl_order_details_saj_csv($qutn_id)
        {
		//print_r($qutn_id); die;
             $this->db->select('*');
             $this->db->where_in('order_id2',$qutn_id);
           // $this->db->order_by('id','desc');
            $query= $this->db->get('tbl_orders_details');
           return $query->result();

        }
		public function get_tbl_invoice_details_saj_csv($qutn_id)
        {
		//print_r($qutn_id); die;
             $this->db->select('*');
             $this->db->where_in('invoice_id',$qutn_id);
           // $this->db->order_by('id','desc');
            $query= $this->db->get('tbl_invoice_details');
           return $query->result();

        }
        public function update_frame_code($frame_name)
        {
           $code= $this->Get_max_gen_code_id($frame_name);
           $update_code= $code->code_id+1;
            $sql="update framer_code_generate set code_id='".$update_code."' where name='".$frame_name."'";
           mysql_query($sql);
        }
        public function Get_max_gen_code_id($frame_name)
        {
                $this->db->select('code_id');
		$this->db->where('name',$frame_name);
		$query=$this->db->get('framer_code_generate');
		return $result= $query->row();
        }
        public function get_frame_code($frame_name)
        {

                $this->db->select('code_id');
		$this->db->where('name',$frame_name);
		$query=$this->db->get('framer_code_generate');
		$result= $query->row();
                if($frame_name=='frame_name')
                {
                $code_str='FRM';
                }elseif($frame_name=='mgb_name')
                {
                $code_str='MGB';
                }elseif($frame_name=='mount_name')
                {
                $code_str='MNT';
                }elseif($frame_name=='glass_name')
                {
                $code_str='GLS';
                }elseif($frame_name=='hardboard')
                {
                $code_str='HRD';
                }elseif($frame_name=='other_name')
                {
                $code_str='OTH';
                }
               return $this->str_code_gen($code_str,$result->code_id);
                 }

         public function str_code_gen($code_str,$code)
         {
                $curr =  date('d-m-Y');
                $str = explode("-",$curr);
                $year =  substr($str[2], 2, 3);
                $filename = sprintf('%04d', $code);

                $code_gen= $code_str.$str[0].$str[1].$year.$filename;
                return $code_gen;
         }
	public function get_admin_name($admin_id)
	{
		$this->db->select('*');
		$this->db->where('channel_partner_id',$admin_id);
		$query=$this->db->get('tbl_channel_partner_details');
		return $query->row();
	}
	public function add_vender_details($data)
	{
		$this->db->insert('tbl_vender',$data);
		return $this->db->insert_id();
	}


        public function By_vender_printer_details($vender_name) {
//                $this->db->select('*');
//		$this->db->like('company_name',$vender_name);
//		$query=$this->db->get('tbl_printer');
//		return $query->row();

            $sql_1="select * FROM tbl_printer where  company_name like '%".$vender_name."%'";
            $row=  mysql_query($sql_1);
            return $row;

        }



        public function All_printer_company_name_details() {

                $this->db->select('company_name');
		$this->db->distinct('company_name');
                $this->db->order_by("printer_id", "desc");
		$query=$this->db->get('tbl_printer');
		return $query->result();


        }

         public function All_package_company_name_details() {

                $this->db->select('company_name');
		$this->db->distinct('company_name');
                $this->db->order_by("package_id", "desc");
		$query=$this->db->get('tbl_packaging');
		return $query->result();


        }

        public function Get_all_package_data()
        {
               $this->db->select('*');
		$this->db->order_by("package_id", "desc");
		$query=$this->db->get('tbl_packaging');
		return $query->result();
        }

         public function Get_all_frames_data($framer_code)
        {

             $sql="select * from tbl_framer where framer_code='".$framer_code."' order by framer_id desc ";
             $rows=  mysql_query($sql);
             return mysql_fetch_object($rows);

        }
         public function All_frames_company_name_details() {

                $this->db->select('company_name');
		$this->db->distinct('company_name');
                $this->db->order_by("framer_id", "desc");
		$query=$this->db->get('tbl_framer');
		return $query->result();


        }


         public function All_printer_sub_code_details() {


                $this->db->select('display_name');
		$this->db->distinct('display_name');
                $this->db->order_by("printer_id", "desc");
		$query=$this->db->get('tbl_printer');
		return $query->result();


        }




         public function All_package_code_details() {
                $this->db->select('package_code');
		$this->db->distinct('package_code');
                $this->db->order_by("package_id", "desc");
		$query=$this->db->get('tbl_packaging');
		return $query->result();

        }

        public function short_package_code_details($height,$width,$color)
        {
           $sql_1="select package_code from tbl_packaging where height='".$height."' and width='".$width."' and color='".$color."' " ;
            $rows=  mysql_query($sql_1);
            $result=  mysql_fetch_assoc($rows);
            return $result['package_code'];
        }



        ////////////////////////// code for framer////////////////////////////

         public function All_framer_sub_code_details() {
                $this->db->select('display_name');
		$this->db->distinct('display_name');
                $this->db->order_by("framer_id", "desc");
		$query=$this->db->get('tbl_framer');
		return $query->result();

        }

        public function short_framer_sub_code_details($height,$width,$color)
        {
            $sql_1="select display_name from tbl_framer where height='".$height."' and width='".$width."' and color='".$color."' " ;
            $rows=  mysql_query($sql_1);
            $result=  mysql_fetch_assoc($rows);
            return $result['display_name'];
        }

        public function check_exist_framer_sub_code_details($height,$width,$color)
        {
            $sql_1="select display_name from tbl_framer where height='".$height."' and width='".$width."' and color='".$color."' " ;
            $rows=  mysql_query($sql_1);
            $result= mysql_num_rows($rows);
            return $result;
        }



        ////////////////////////////////////////////////////////////////////


        public function All_package_sub_code_details() {
                $this->db->select('display_name');
		$this->db->distinct('display_name');
                $this->db->order_by("package_id", "desc");
		$query=$this->db->get('tbl_packaging');
		return $query->result();

        }



        public function All_frames_sub_code_details() {
                $this->db->select('sur_code');
		$this->db->distinct('sur_code');
                $this->db->order_by("framer_id", "desc");
		$query=$this->db->get('tbl_framer');
		return $query->result();

        }

        public function short_package_sub_code_details($height,$width,$color)
        {
            $sql_1="select display_name from tbl_packaging where height='".$height."' and width='".$width."' and color='".$color."' " ;
            $rows=  mysql_query($sql_1);
            $result=  mysql_fetch_assoc($rows);
            return $result['display_name'];
        }

        public function check_exist_package_sub_code_details($height,$width,$color)
        {
            $sql_1="select display_name from tbl_packaging where height='".$height."' and width='".$width."' and color='".$color."' " ;
            $rows=  mysql_query($sql_1);
            $result= mysql_num_rows($rows);
            return $result;
        }


         public function All_printer_email_id_details() {

              $this->db->select('email_id');
		$this->db->distinct('email_id');
                $this->db->order_by("printer_id", "desc");
		$query=$this->db->get('tbl_printer');
		return $query->result();


        }
         public function All_package_email_id_details() {

              $this->db->select('email_id');
		$this->db->distinct('email_id');
                $this->db->order_by("package_id", "desc");
		$query=$this->db->get('tbl_packaging');
		return $query->result();


        }

         public function All_frames_email_id_details() {

              $this->db->select('email_id');
		$this->db->distinct('email_id');
                $this->db->order_by("framer_id", "desc");
		$query=$this->db->get('tbl_framer');
		return $query->result();


        }
       public function get_printer_display_name()
       {

            $sql="select DISTINCT(display_name) from tbl_printer  order by printer_id desc";
            return $rows=  mysql_query($sql);

       }
       public function get_printer_rate()
       {
               $sql="select DISTINCT(rate) from tbl_printer order by printer_id desc";
            return $rows=  mysql_query($sql);

       }
       public function short_framer_rate($framer_name)
       {
        $this->db->select('rate');
        $this->db->where('framer_name',$framer_name);
        $query=  $this->db->get('tbl_framer');
         return $query->result();
           }
       public function get_framer_name()
       {
           $this->db->select('framer_name');
           $this->db->distinct('framer_name');
           $this->db->order_by('framer_name','desc');
           $query= $this->db->get('tbl_framer');
           return $query->result();
       }



       public function get_mount_glass_names($filter_type)
       {
            $sql="select DISTINCT(framer_name) from tbl_framer where framer_code like '".$filter_type."%'";
            return $rows=  mysql_query($sql);
       }


       public function get_framer_company_name()
       {
           $this->db->select('company_name');
           $this->db->distinct('company_name');
           $this->db->order_by('company_name','desc');
           $query= $this->db->get('tbl_framer');
           return $query->result();
       }



       public function insert_into_framer_order($data)
       {
           $insert=$this->db->insert('order_framer_status',$data);
            if($insert)
                return 1;
            else
                return 0;
       }

       public function get_packager_company_name()
       {
           $this->db->select('company_name');
           $this->db->distinct('company_name');
           $this->db->order_by('company_name','desc');
           $query= $this->db->get('tbl_packaging');
           return $query->result();
       }
public function get_packager_surface_name()
       {
           $this->db->select('company_name');
           $this->db->distinct('company_name');
           $this->db->order_by('company_name','desc');
           $query= $this->db->get('tbl_packaging');
           return $query->result();
       }

       public  function get_courier_details($order_id)
       {
        $this->db->select('*');
        $this->db->where('order_id',$order_id);
        $query=$this->db->get('order_courier_status');
        return $query->result();

       }
       public function get_by_courier_code()
       {
        $this->db->select('courier_code');
        $this->db->order_by('courier_code','asc');
        $query=$this->db->get('tbl_courier');
        return $query->result();
       }


        public function get_by_courier_company_name()
       {
        $this->db->select('company_name');
        $this->db->order_by('company_name','asc');
        $query=$this->db->get('tbl_courier');
        return $query->result();
       }



       public function search_by_couriers($code,$company_name,$date_from_to)
       {
        $split_date=split('&',$date_from_to);
         $from_date=$split_date[0];
         $to_date=$split_date[1];

        $this->db->select('*');
        if($code<>'none')
        {
        $this->db->where('courier_code',$code);
        }elseif($company_name<>'none')
        {
        $this->db->where('company_name',$company_name);
        }elseif($date_from_to<>'none')
        {
        $this->db->where("create_date between '".$from_date."' and  '".$to_date."'");
        }
        $this->db->order_by('courier_id','desc');
        $query=$this->db->get('tbl_courier');
        return $query->result();
       }


         public function delete_quotation($quotation_id)
    {
     // $sql="update tbl_quotation set convert_to_invoice='2' where quotation_id='".$quotation_id."'";
	 //by sajid below
	  $sql="DELETE FROM tbl_quotation  WHERE quotation_id='".$quotation_id."'";
        $update=  mysql_query($sql);

       if($update)
       {
           return 1;
       }else{
           return 0;
       }

    }


       public  function delete_courier_details($delete_id)
       {
           $this->db->where('courier_id',$delete_id);
          $delete= $this->db->delete('tbl_courier');
          if($delete)
          {
              return 1;
          }else{
              return 0;
          }
       }
       public function update_courier_details($data,$edit_id){
             $this->db->where('courier_id',$edit_id);
          $update= $this->db->update('tbl_courier',$data);
          if($update)
          {
              return 1;
          }else{
              return 0;
          }
       }
        public  function get_edit_courier_details($edit_id)
       {
        $this->db->select('*');
        $this->db->where('courier_id',$edit_id);
        $this->db->order_by('courier_id','desc');
        $query=$this->db->get('tbl_courier');
        return $query->result();

       }
       public function save_courier_details($data)
      {
         $insert= $this->db->insert('tbl_courier',$data);
         if($insert){
             return 1;
         }else{
             return 0;
         }
      }

       public function get_courier_company_name()
       {
           $this->db->select('company_name');
           $this->db->distinct('company_name');
           $this->db->order_by('company_name','desc');
           $query= $this->db->get('tbl_courier');
           return $query->result();
       }



        public function get_framer_display_name($filter_type)
       {
            $sql="select DISTINCT(display_name) from tbl_framer where framer_code like '".$filter_type."%'";
            return $rows=  mysql_query($sql);
       }

       public function get_framer_rate($filter_type)
       {

            $sql="select DISTINCT(rate) from tbl_framer where framer_code like '".$filter_type."%'";
            return $rows=  mysql_query($sql);

           }

           public function Get_all_other_printer_details($printer_code)
           {
               $sql="select * from tbl_printer where printer_code ='".$printer_code."' and product_code LIKE 'OTH%' order by printer_id desc";
              return $rows=  mysql_query($sql);
           }

            public function Get_all_printer_details($printer_code)
           {
               $sql="select * from tbl_printer where printer_code ='".$printer_code."' and product_code LIKE 'PTR%' order by printer_id desc";
              return $rows=  mysql_query($sql);
           }



        public function get_printers()
        {
         $this->db->select('*');
         $this->db->order_by('display_name','desc');
         $query=$this->db->get('tbl_printer');
         return $query->result();
        }
        public function get_printers_surface()
        {
         $this->db->select('surface');
         $this->db->order_by('surface','desc');
         $this->db->distinct('surface');
         $query=$this->db->get('tbl_printer');
         return $query->result();
        }
        public function get_printers_company_name()
        {
         $this->db->select('company_name');
         $this->db->order_by('company_name','desc');
         $this->db->distinct('company_name');
         $query=$this->db->get('tbl_printer');
         return $query->result();
        }




        public function get_inventory_data()
        {
                $this->db->select('*');
		$this->db->order_by('printer_id','desc');
                 $query=$this->db->get('tbl_printer');
		return $query->result();
        }
        public function Get_to_Update_All_printer_details($printer_id)
        {
                $this->db->select('*');
		$this->db->where('printer_code',$printer_id);
               $query=$this->db->get('tbl_printer');
		return $query->result();
        }

         public function Get_to_Update_All_package_details($framer_id)
        {
                $this->db->select('*');
		$this->db->where('package_id',$framer_id);
               $query=$this->db->get('tbl_packaging');
		return $query->result();
        }

         public function Get_to_All_framer_details($framer_id)
        {
             //echo $framer_id;
                $this->db->select('*');
		$this->db->where('framer_id',$framer_id);
                $query=$this->db->get('tbl_framer');
		return $query->result();
        }


        public function Get_to_Update_All_framer_details($framer_code_str)
        {
            $split_code=split('/',$framer_code_str);

            $substr_code=  substr($framer_code_str, 0,3);
             $sql="select * from tbl_framer where framer_code ='".$split_code[0]."' and generate_code LIKE '".$substr_code."%' order by framer_id desc";
                return $rows=  mysql_query($sql);

        }


        public function get_tbl_search_images_details($images_filename) {
          $sql_1="select *  from tbl_images_search where images_filename ='".$images_filename."'";
          $rows=  mysql_query($sql_1);
          $result=  mysql_fetch_assoc($rows);
         $data['images_photographer']= $result['images_photographer'];
         $data['images_caption']= $result['images_caption'];
         $data['images_price']= $result['images_price'];
         $data['images_license_type']= $result['images_license_type'];
         $data['images_model_release']= $result['images_model_release'];
         $data['image_original_width']= $result['image_original_width'];
         $data['image_original_height']= $result['image_original_height'];
         $data['images_collectionid']= $result['images_collectionid'];
         $data['images_description']= $result['images_description'];

         return $data;
        }


        public function get_rate_details($surface)
        {
           $sql_1="select rate  from tbl_rate_sales_details where category_name ='printer' and category_type ='medium' and display_name='".$surface."'";
          $rows=  mysql_query($sql_1);
          $printer=  mysql_fetch_assoc($rows);
         $data['printer_rate']= $printer['rate'];

         $sql_1="select rate  from tbl_rate_sales_details where category_name ='mount' and display_name='".$surface."'";
          $rows=  mysql_query($sql_1);
          $printer=  mysql_fetch_assoc($rows);
         $data['mount_rate']= $printer['rate'];
        $sql_1="select rate  from tbl_rate_sales_details where category_name ='framer' and display_name='".$surface."'";
          $rows=  mysql_query($sql_1);
          $printer=  mysql_fetch_assoc($rows);
         $data['framer_rate']= $printer['rate'];

          $sql_1="select rate  from tbl_rate_sales_details where category_name ='glass' and display_name='".$surface."'";
          $rows=  mysql_query($sql_1);
          $printer=  mysql_fetch_assoc($rows);
         $data['glass_rate']= $printer['rate'];



         return $data;
        }

        public function get_galleries() {
            $this->db->select('*');
	    $query=$this->db->get('tbl_lightbox_details');
	    return $query->result();

        }

        public function get_meta_data($filename) {
             $sql='select  * from tbl_images_search where images_filename in ('.$filename.')';
             $rows=  mysql_query($sql);
             return $rows;
        }

        public function Get_images_details($images_id) {
          $sql_1="select images_filename  from tbl_images_search where images_id ='".$images_id."'";
          $rows=  mysql_query($sql_1);
          $result=  mysql_fetch_assoc($rows);
         return $result['images_filename'];
        }
       public function restrict_filename($filename)
       {
            $sql="update tbl_images_search set visibility_status ='1' where images_filename in ($filename) ";
           $update=  mysql_query($sql);
           if($update)
           {
               return 1;
           }else{
               return 0;
           }
       }

        public function delete_gallery($cust_id,$lightbox_id)
        {
          $sql="delete from tbl_lightbox_images where  serial_no= '".$lightbox_id."'";

          $delete_2=mysql_query($sql);
          if($delete_2)
          {
              return 1;
          }else{
              return 0;
          }



        }
        public function get_galleries_images($user_id) {

            $sql_1="select * from tbl_lightbox_details details inner join  tbl_lightbox_images img on details.lightbox_id = img.lightbox_id where user_id= '".$user_id."'";
            return mysql_query($sql_1);

        }

       public function get_gallery_images_id($filename)
        {
          $sql_1="select images_id,images_filename from tbl_images_search where images_filename in ($filename)";
          $rows=  mysql_query($sql_1);
         return $rows;
        }

        public function Create_gallery($cust_id,$gallery_name,$desc,$date) {
           if($cust_id<>'')
           {
            $sql_1="insert into tbl_lightbox_details set user_id='".$cust_id."', lightbox_name='".$gallery_name."', lightbox_description='".$desc."', creation_date='".$date."'";
           $insert= mysql_query($sql_1);
           if($insert)
           {
               return 1;
           }else{
               return 0;
           }
           }

        }
        public function get_user_id() {
                $this->db->select('*');
		$query=$this->db->get('tbl_registration');
		return $query->result();

        }
        public function Get_all_printer_code()
        {
            $sql_1="select DISTINCT(printer_code) FROM tbl_printer order by printer_id desc";
             return mysql_query($sql_1);
        }
         public function Get__printer_details($printer_code)
        {
            $sql_1="select * FROM tbl_printer where printer_code='".$printer_code."' order by printer_id desc";
             $rows= mysql_query($sql_1);
             return mysql_fetch_object($rows);
        }

        public function Get_all_framer_code()
        {
            $sql_1="select DISTINCT(contact_person_name) FROM tbl_framer order by framer_id desc";
             return mysql_query($sql_1);
        }

         public function Get_add_printer_more_details($vender_name,$email_id,$vender_code) {


             if($vender_name!='')
             {
             $query1="where  company_name like '%".$vender_name."%'";
             }if($email_id!='')
             {
             $query2="where  email_id= '".$email_id."'";
             }if($vender_code!='')
             {
             $query3="where sur_code = '".$vender_code."'";
             }else{
             $query4='';
             }
            $sql_1="select * FROM tbl_printer $query1 $query2 $query3 $query4 order by printer_id desc";
             return mysql_query($sql_1);
        }



         public function Get_add_package_more_details($vender_name,$email_id,$vender_code) {
             // $email_id;

             if($vender_name!='')
             {
             $query1="where  company_name like '%".$vender_name."%'";
             }if($email_id!='')
             {
             $query2="where  email_id= '".$email_id."'";
             }if($vender_code!='')
             {
             $query3="where sur_code = '".$vender_code."'";
             }else{
             $query4='';
             }
            $sql_1="select * FROM tbl_packaging $query1 $query2 $query3 $query4 order by package_id desc";
             return mysql_query($sql_1);
        }




        public function Get_add_frames_more_details($vender_name,$email_id,$vender_code) {
            // echo $email_id;

             if($vender_name!='')
             {
             $query1="where  company_name like '%".$vender_name."%'";
             }if($email_id!='')
             {
             $query2="where  email_id= '".$email_id."'";
             }if($vender_code!='')
             {
             $query3="where sur_code = '".$vender_code."'";
             }else{
             $query4='';
             }
            $sql_1="select * FROM tbl_framer $query1 $query2 $query3 $query4 order by framer_id desc";
             return mysql_query($sql_1);
        }




        public function Get_printer_details($display_name) {
                $this->db->select('*');
		$this->db->where('display_name',$display_name);
		$query=$this->db->get('tbl_printer');
		return $query->row();

        }


         public function Get_printer_All_details() {
                $this->db->select('*');
		$query=$this->db->get('tbl_printer');
               return $query->row();

        }


        public function Get_printer_code()
	{
		$sql=mysql_query("select * from printer_code_generate where id =(select max(id) from printer_code_generate)");
		$result=  mysql_fetch_assoc($sql);
                return $result['code'];
	}


 function generate_code($firstname,$lastname)
{
    $diluted1=substr($firstname,0,2);
    $diluted2=substr($lastname,0,2);
    $code1=$diluted1.$diluted2;
    // part2
    $diluted3=substr($firstname,0,2);
    $diluted4=substr($lastname,0,2);
    $code2=$diluted3."".$diluted4;
    //part3
    $diluted5=substr($firstname,0,2);
    $code3=$diluted5 ;

    $first=strrev($firstname);
    $diluted6=substr($first,02);
    $code4=$diluted6;
    if($this->check_code($code1)=='0')
    {
        return $code1;
    }
    elseif($this->check_code($code2)=='0')
    {
        return $code2;
    }
    elseif($this->check_code($code3)=='0')
    {
        return $code3;
    }
    //part4
    else
    {
        return $code4;
    }
}




function check_code($reference)
{
    $photo_code= mysql_query("select * from tbl_printer where sur_code = '".$reference."'");
    $result = mysql_num_rows($photo_code);
    return $result;
}




	public function add_frame($data)
	{
		$this->db->insert('tbl_frame',$data);
		return $this->db->insert_id();
	}
	public function add_mount($data)
	{
		$this->db->insert('tbl_mount',$data);
		return $this->db->insert_id();

	}
	public function add_surface_details($data1)
	{
		$this->db->insert('tbl_surface_detail',$data1);
	}
	public function get_vender_details($id)
	{
		$this->db->select('*');
		$this->db->where('vender_id',$id);
		$query=$this->db->get('tbl_vender');
		return $query->row();
	}
      public function frame($id)
	{
		$this->db->select('frame_code');
		$this->db->where('frame_id',$id);
		$query=$this->db->get('tbl_frame');
		return $query->row();
	}
	public function mount($id)
	{
		$this->db->select('mount_code');
		$this->db->where('mount_id',$id);
		$query=$this->db->get('tbl_mount');
		return $query->row();
	}
	public function get_mount($id)
	{
		$this->db->select('*');
		$this->db->where('mount_id',$id);
		$query=$this->db->get('tbl_mount');
		return $query->row();
	}
	public function get_mount1($type)
	{
		$this->db->select('*');
		$this->db->where('mount_id',$type);
		$query=$this->db->get('tbl_mount');
		return $query->row();
	}
	public function get_vendor1($type)
	{
		$this->db->select('*');
		$this->db->where('vender_company_name',$type);
		$query=$this->db->get('tbl_vender');
		return $query->row();
	}
	public function add_framenmount($data)
	{
		$this->db->insert('tbl_framenmount_detail',$data);
	}



	 public function get_vender_by_type($vender_type)
 	{
	  $this->db->select('*');
	  $this->db->where('vender_type',$vender_type);
	  $query=$this->db->get('tbl_vender');
	  return $query->result_array();
 	}


	public function get_max_id()
	{
		$this->db->select_max('vender_id');
		$query=$this->db->get('tbl_vender');
		return $query->row();

	}
	public function update_vender_code($vender_code,$vender_id)
	{
	     $data=array('vender_code'=>$vender_code);
		 $this->db->where('vender_id',$vender_id);
		$this->db->update('tbl_vender',$data);
	}


		public function get_mount_details($id)
	{
		$this->db->select('*');
		$this->db->where('mount_id',$id);
		$query=$this->db->get('tbl_mount');
		return $query->row();
	}
		public function get_frame_details($id)
	{
		$this->db->select('*');
		$this->db->where('frame_id',$id);
		$query=$this->db->get('tbl_frame');

		return $query->row();
	}
		public function get_framenmount_details($id)
	{
		$this->db->select('*');
		$this->db->where('vender_id',$id);
		$query=$this->db->get('tbl_framenmount_detail');
		return $query->result_array();
	}
	public function insert_master_surface($data)
  {
	  $this->db->insert('tbl_surface',$data);
	  return $this->db->insert_id();

  }
 public function  update_master_surface($surface_id,$surface_code)
  {
	  $data=array('surface_item_code'=>$surface_code);
		 $this->db->where('surface_id',$surface_id);
		$this->db->update('tbl_surface',$data);

  }
  public function get_surface()
  {
	  $this->db->select('surface');
            $this->db->distinct('surface');
            $this->db->order_by('printer_id');
	  $query=$this->db->get('tbl_printer');

	  return $query->result_array();
  }

  public function get_framer_surface($like)
  {

             $sql="select DISTINCT(surface) from tbl_framer where framer_code like '".$like."%'";
             $rows=  mysql_query($sql);
             while($result= mysql_fetch_assoc($rows)){
                $array[]=$result;
             }


           return $array;

  }
  public function get_framer_width($like)
  {

             $sql="select DISTINCT(width) from tbl_framer where framer_code like '".$like."%'";
             $rows=  mysql_query($sql);
             while($result= mysql_fetch_assoc($rows)){
                $array[]=$result;
             }


           return $array;

  }





  public function get_framer_details($surface)
  {
        $sql="select * from tbl_framer where surface='".$surface."'";
        $rows=  mysql_query($sql);
        while($result= mysql_fetch_assoc($rows)):
            $data['contact_person_name']=$result['contact_person_name'];
            $data['company_name']=$result['company_name'];
            $data['color']=$result['color'];
            $data['rate']=$result['rate'];

        endwhile;

  return $data;
  }

  public function get_surface_by_id($surface_id)
  {
	  $this->db->select('*');
	  $this->db->where('surface_id',$surface_id);
	  $query=$this->db->get('tbl_surface');
	  return $query->row();
  }
  public function get_mount_by_id($mount_id)
  {
	  $this->db->select('*');
	  $this->db->where('mount_id',$mount_id);
	  $query=$this->db->get('tbl_mount');
	  return $query->row();
  }

  	public function get_mount_name()
	{
		$this->db->select('*');

		$query=$this->db->get('tbl_mount');
		return $query->result();

	}
	public function get_vender()
 {
	  $this->db->select('*');
	  $this->db->where('vender_status','0');
	  $this->db->or_where('vender_status','1');


	  $query=$this->db->get('tbl_vender');

	  return $query->result_array();
 }
public function get_vender1()
 {
	  $this->db->select('*');


	   $this->db->where('vender_type','2');

	  $query=$this->db->get('tbl_vender');

	  return $query->result_array();
 }
 public function get_printer()
	  {
	  $this->db->select('*');
	  $this->db->where('vender_type','1');
         $this->db->where('vender_status','1');
	  $query=$this->db->get('tbl_vender');
	  return $query->result_array();
  	}
	//////////////////////////////// by mohit /////////////////////////////////////
  public function get_frame()
  {
  	$this->db->select('*');
  	$query=$this->db->get('tbl_frame');
  	return $query->result_array();
  }

  public function get_frame_by_id($frame_id)
  {
  	$this->db->select('*');
  	$this->db->where('frame_id',$frame_id);
  	$query=$this->db->get('tbl_frame');
  	return $query->row();
  }
  public function get_vendor()
  {
  	$this->db->select('*');
  	$this->db->where('vender_type','2');
  	$query=$this->db->get('tbl_vender');
  	return $query->result_array();
  }



public function s_details($vid)
  {
  	$this->db->select('*');
  	$this->db->where('vender_id',$vid);
  	$query=$this->db->get('tbl_surface_detail');
  	return $query->result_array();

  }
public function vdetail()
{
	$this->db->select('*');
	$query=$this->db->get('tbl_vender');
	return $query->result_array();
}


public function framemount_details($vid)
{
	$this->db->select('*');
	$this->db->where('vender_id',$vid);
	$query=$this->db->get('tbl_framenmount_detail');
	return $query->result_array();

}

public function delete_vendor($id)
{    $data=array('vender_status'=>'2');
	$this->db->where('vender_id',$id);
	$this->db->update('tbl_vender',$data);
}
public function delete_surface_detail($id)
{
	$data=array('surface_status'=>'2');
	$this->db->where('vender_id',$id);
	$this->db->update('tbl_surface_detail',$data);
}

public function update_vender($id,$data)
{
	$this->db->where('vender_id',$id);
	$this->db->update('tbl_vender',$data);
}
 public function width()
  {
     $this->db->select('*');

  	$query=$this->db->get('tbl_width');
  	return $query->result();

  }
  public function color()
  {
     $this->db->select('*');

  	$query=$this->db->get('tbl_color');
  	return $query->result();

  }


		public function view_frames($start="")
		{
			$end = $start*10;
			$this->db->select('*');
			if($start !='') {
			$query=$this->db->get('tbl_frame', $end, 10);
			} else {
			$query=$this->db->get('tbl_frame', 10, 0);
			}
			$this->db->last_query();
			return $query->result_array();
		}

		public function total_frames()
		{

			$this->db->select('*');
			$query=$this->db->get('tbl_frame');
			$query=$this->db->get('tbl_frame');
			return $query->num_rows();

		}



		public function view_surface($start="")
		{
			$end = $start*10;
			$this->db->select('*');
			if($start !='') {
			$query=$this->db->get('tbl_surface_detail', $end, 10);
			} else {
			$query=$this->db->get('tbl_surface_detail', 10, 0);
			}
			$this->db->last_query();
			return $query->result_array();
		}


		public function total_surface()
		{

			$this->db->select('*');
			$query=$this->db->get('tbl_surface');
			$query=$this->db->get('tbl_surface');
			return $query->num_rows();

		}


		public function view_mount($start="")
		{
			$end = $start*10;
			$this->db->select('*');
			if($start !='') {
			$query=$this->db->get('tbl_mount', $end, 10);
			} else {
			$query=$this->db->get('tbl_mount', 10, 0);
			}
			$this->db->last_query();
			return $query->result_array();
		}

		public function total_mount()
		{

			$this->db->select('*');
			$query=$this->db->get('tbl_mount');
			$query=$this->db->get('tbl_mount');
			return $query->num_rows();

		}

public function record_count_vender()
{
	$this->db->select('*');
	$this->db->where('vender_status','0');
	$this->db->or_where('vender_status','1');
	$query=$this->db->get('tbl_vender');
	return $query->num_rows();
}
public function get_vender_pagination($limit,$start)
{
	$this->db->limit($limit,$start);
	$this->db->select('*');
	$this->db->where('vender_status','0');
	$this->db->or_where('vender_status','1');
	$query=$this->db->get('tbl_vender');
	return $query->result_array();
}
 public function mount_code($code)
  {
  	$this->db->where('mount_code',$code);
    $query = $this->db->get('tbl_mount');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
 }
  public function surface_code($code)
  {
  	$this->db->where('surface_item_code',$code);
    $query = $this->db->get('tbl_surface');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
 }
 public function frame_code($code)
  {
  	$this->db->where('frame_code',$code);
    $query = $this->db->get('tbl_frame');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
 }
public function update_surface($data,$surface_id)
{   $this->db->where('surface_id',$surface_id);
	$this->db->update('tbl_surface',$data);
}
public function update_frame($data,$frame_id)
{
	$this->db->where('frame_id',$frame_id);
	$this->db->update('tbl_frame',$data);

}
public function update_mount($data,$mount_id)
{
$this->db->where('mount_id',$mount_id);
	$this->db->update('tbl_mount',$data);
}
public function mount_details($mount_id)
{
$this->db->where('mount_id',$mount_id);
$query=$this->db->get('tbl_mount');
return $query->row();

}

	public function check_vender_name($vender_name)
{
	$this->db->where('vender_company_name',$vender_name);
    $query = $this->db->get('tbl_vender');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}


public function get_image_bystatus($status, $limit ,$start,$partner,$file,$start_date,$end)
{
	$this->db->limit($limit,$start);
	$this->db->select('*');
	if($status!='-1')
	{
	$this->db->where('status',$status);
	}
	if($partner)
	{
			$this->db->where('images_photographer',$partner);
	}

	if($file)
	{
		$this->db->where('images_filename',$file);
}
if($start_date && $end)
{
	$this->db->where('images_uploaded_date >=',$start_date);
	$this->db->where('images_uploaded_date <=',$end);
}

	$this->db->join('tbl_channel_partner_details', 'tbl_images_search.images_photographer = tbl_channel_partner_details.cp_id');
	$query=$this->db->get('tbl_images_search');
	return $query->result_array();

}


public function count_rows($status ,$partner,$file,$start_date,$end)
{
	$this->db->select('*');
	if($status!='-1')
	{
	$this->db->where('status',$status);
	}
	if($partner)
	{
			$this->db->where('images_photographer',$partner);
	}
	if($file)
	{
		$this->db->where('images_filename',$file);
}
if($start_date && $end)
{
	$this->db->where('images_uploaded_date >=',$start_date);
	$this->db->where('images_uploaded_date <=',$end);
}

	$this->db->join('tbl_channel_partner_details', 'tbl_images_search.images_photographer = tbl_channel_partner_details.cp_id');
	$query=$this->db->get('tbl_images_search');
	return $query->num_rows();
}

public function status_change($img_id,$status)
{   if($status=='1')
    {
		$data=array('images_status'=>'0');
    }
	if($status=='0')
    {
		$data=array('images_status'=>'1');
    }

	$this->db->where('images_id',$img_id);
	$this->db->update('tbl_images_search',$data);
}




 ////////////// code for surface collection price ///////////////
        public function Surface_collection_price($imagename,$Size) {

         if($imagename=='Photo_Matt_Fibre_Duo')
         {
             if($Size=='a4')
             {
              $width=9;
              $height=12;
              $price=1250;
              $noofsheets=25;
              $rate_per_sqr=0.462962963;
              $gsm=200;
             }
             if($Size=='a3')
             {
              $width=12;
              $height=17;
              $price=2450;
              $noofsheets=25;
              $rate_per_sqr=0.480392157;

             }

             if($Size=='24inch')
             {
              $width=24;
              $height=1181;
              $price=9300;
              $rollsize=30;//meter
              $rate_per_sqr=0.32811177;

             }
             if($Size=='44inch')
             {
              $width=44;
              $height=1181;
              $price=16650;
              $rollsize=30;//meter
              $rate_per_sqr=0.320414133;

             }
         }/// end Photo Matt Fibre Duo

          if($imagename=='Photo_Luster')
         {
             if($Size=='a4')
             {
              $width=9;
              $height=12;
              $price=1050;
              $noofsheets=25;
              $rate_per_sqr=0.388888889;
              $gsm=260;
             }
             if($Size=='a3')
             {
              $width=12;
              $height=17;
              $price=2050;
              $noofsheets=25;
              $rate_per_sqr=0.401960784;

             }

             if($Size=='24inch')
             {
              $width=24;
              $height=1181;
              $price=7000;
              $rollsize=30;//meter
              $rate_per_sqr=0.246965848;

             }
             if($Size=='44inch')
             {
              $width=44;
              $height=1181;
              $price=12550;
              $rollsize=30;//meter
              $rate_per_sqr=0.241513355;

             }
         }/// end Photo Luster


          if($imagename=='Photo_Canvas')
         {
             if($Size=='a4')
             {
              $width=9;
              $height=12;
              $price=2100;
              $noofsheets=25;
              $rate_per_sqr=0.777777778;
              $gsm=320;
             }
             if($Size=='17inch')
             {
              $width=17;
              $height=787;
              $price=7950;
              $rollsize=20;
              $rate_per_sqr=0.2;

             }

             if($Size=='24inch')
             {
              $width=24;
              $height=787;
              $price=1110;
              $rollsize=20;//meter
              $rate_per_sqr=0.587674714;

             }
             if($Size=='44inch')
             {
              $width=44;
              $height=787;
              $price=20100;
              $rollsize=20;//meter
              $rate_per_sqr=0.580455123;

             }
         }/// end Photo Canvas

         if($imagename=='Daguerre_Canvas')
         {

             if($Size=='17inch')
             {
              $width=17;
              $height=6900;
              $price=7950;
              $rollsize=12;
              $rate_per_sqr=0.859920239;

             }

             if($Size=='24inch')
             {
              $width=24;
              $height=472;
              $price=9650;
              $rollsize=12;//meter
              $rate_per_sqr=0.851871469;

             }
             if($Size=='36inch')
             {
              $width=36;
              $height=472;
              $price=14300;
              $rollsize=12;//meter
              $rate_per_sqr=0.841572505;

             }
             if($Size=='44inch')
             {
              $width=44;
              $height=472;
              $price=17350;
              $rollsize=20;//meter
              $rate_per_sqr=0.835419877;

             }

         }
          if($imagename=='Bamboo_Fine_art_Matt_Smooth')
         {

              if($Size=='a4')
             {
              $width=9;
              $height=12;
              $price=2650;
              $noofsheets=25;
              $rate_per_sqr=0.981481481;

             }

             if($Size=='17inch')
             {
              $width=17;
              $height=472;
              $price=8150;
              $rollsize=12;
              $rate_per_sqr=1.015702891;

             }


             if($Size=='24inch')
             {
              $width=24;
              $height=472;
              $price=11400;
              $rollsize=12;//meter
              $rate_per_sqr=1.006355932;

             }
              if($Size=='36inch')
             {
              $width=36;
              $height=472;
              $price=16900;
              $rollsize=12;//meter
              $rate_per_sqr=1.006355932;

             }

             if($Size=='44inch')
             {
              $width=44;
              $height=472;
              $price=20400;
              $rollsize=12;//meter
              $rate_per_sqr=0.982280431;

             }


         }/// end Bamboo Fine art Matt- Smooth
        return array($width,$height,$rollsize,$rate_per_sqr,$noofsheets);

        }
        ////////////// end  code for surface collection price ///////////////


        ////////////// code for frame price ///////////////
        public function frame_price($frame,$frame_list,$frame_code) {
            if($frame=='Synthetic'){
                if($frame_list=='simple'){
                   //return $frame_code;
                 if($frame_code=='ML-215-BK')
                  {

                    return 15;
                  }
                   if($frame_code=='ML-215-DBR')
                  {
                    return 15;
                  }
                   if($frame_code=='ML-215-LBR')
                  {
                    return 15;
                  }
                   if($frame_code=='ML-215-WH')
                  {
                    return 15;
                  }if($frame_code=='ML-016 DBRG')
                  {
                    return 25;
                  }if($frame_code=='ML-016 SIL N')
                  {
                    return 25;
                  }if($frame_code=='ML-016 MRS')
                  {
                    return 25;
                  }if($frame_code=='ML-016 SIL VK')
                  {
                    return 25;
                  }if($frame_code=='ML-016 BKTK')
                  {
                    return 25;
                  }if($frame_code=='ML- 023 BK')
                  {
                    return 8;
                  }if($frame_code=='ML-014 GD')
                  {
                    return 21;
                  }if($frame_code=='ML-014 BKBR')
                  {
                    return 21;
                  }if($frame_code=='ML-117 GD')
                  {
                    return 25;
                  }if($frame_code=='ML-117 NAT')
                  {
                    return 25;
                  }if($frame_code=='ML-123 SIL CRUK')
                  {
                    return 15;
                  }if($frame_code=='ML-016 DBRG')
                  {
                    return 25;
                  }if($frame_code=='ML-149-WH')
                  {
                    return 8;
                  }if($frame_code=='ML-016 DBRG')
                  {
                    return 25;
                  }if($frame_code=='ML-149-RD')
                  {
                    return 8;
                  }if($frame_code=='ML-149 NAT')
                  {
                    return 8;
                  }if($frame_code=='ML-149 DBR')
                  {
                    return 8;
                  } if($frame_code=='ML 149 BR')
                  {
                    return 8;
                  } if($frame_code=='ML 149 BL')
                  {
                    return 8;
                  } if($frame_code=='ML- 149 BK')
                  {
                    return 8;
                  } if($frame_code=='ML-149 AGD')
                  {
                    return 8;
                  } if($frame_code=='ML-167 SIL')
                  {
                    return 7;
                  }if($frame_code=='ML-205 CRG')
                  {
                    return 24;
                  }if($frame_code=='ML-205 BK')
                  {
                    return 24;
                  }if($frame_code=='ML-205 BR')
                  {
                    return 24;
                  }if($frame_code=='ML-205 GR')
                  {
                    return 24;
                  }if($frame_code=='ML- 205 IV')
                  {
                    return 24;
                  }if($frame_code=='ML-221 NAT')
                  {
                    return 23;
                  }if($frame_code=='ML-221 DBR')
                  {
                    return 23;
                  }if($frame_code=='ML-221 BK')
                  {
                    return 23;
                  }if($frame_code=='ML-261 SIL')
                  {
                    return 25;
                  }if($frame_code=='ML-261 GD')
                  {
                    return 25;
                  }if($frame_code=='ML-261 DBR')
                  {
                    return 25;
                  }if($frame_code=='ML-261 BK')
                  {
                    return 25;
                  }if($frame_code=='ML-282 BKP')
                  {
                    return 40;
                  }if($frame_code=='ML-282-WH SIL')
                  {
                    return 40;
                  }if($frame_code=='ML—282 MRBK')
                  {
                    return 40;
                  }if($frame_code=='ML-282 AGD')
                  {
                    return 40;
                  }if($frame_code=='ML-282 BKS')
                  {
                    return 40;
                  }if($frame_code=='ML-282 DBR')
                  {
                    return 40;
                  }
            }  // end simple
                if($frame_list=='fancy'){
                 if($frame_code=='ML-014-SIL (N)')
                  {
                    return 21;
                  }
                   if($frame_code=='ML-033 BK')
                  {
                    return 26;
                  }
                   if($frame_code=='ML-055 GD')
                  {
                    return 24;
                  }
                   if($frame_code=='ML-065-SIL')
                  {
                    return 72;
                  }if($frame_code=='ML-113 IV')
                  {
                    return 45;
                  }if($frame_code=='ML 173 CRG')
                  {
                    return 48;
                  }if($frame_code=='ML 181 GD')
                  {
                    return 12.5;
                  }if($frame_code=='ML 181 SIL')
                  {
                    return 12.5;
                  }if($frame_code=='ML-199 MR')
                  {
                    return 28;
                  }if($frame_code=='ML-210 BR')
                  {
                    return 85;
                  }if($frame_code=='ML-210 MR')
                  {
                    return 85;
                  }if($frame_code=='ML-224 GD')
                  {
                    return 95;
                  }if($frame_code=='ML-224 SIL')
                  {
                    return 95;
                  }if($frame_code=='ML-225 AGD')
                  {
                    return 52;
                  }if($frame_code=='ML-225 AGD')
                  {
                    return 52;
                  }if($frame_code=='ML-225 AGD')
                  {
                    return 52;
                  }if($frame_code=='ML-237 BRGD')
                  {
                    return 90;
                  }if($frame_code=='ML-237 BKGD')
                  {
                    return 90;
                  }if($frame_code=='ML-244 SIL')
                  {
                    return 28;
                  }if($frame_code=='ML-244 GD')
                  {
                    return 28;
                  }if($frame_code=='ML-244 CP')
                  {
                    return 28;
                  } if($frame_code=='ML-244 BK')
                  {
                    return 28;
                  } if($frame_code=='ML-256 BKSIL')
                  {
                    return 28;
                  } if($frame_code=='ML-256 SIL')
                  {
                    return 28;
                  } if($frame_code=='ML-262 SIL')
                  {
                    return 26;
                  } if($frame_code=='ML- 262 GD')
                  {
                    return 26;
                  }if($frame_code=='ML-262 (E) WHG')
                  {
                    return 26;
                  }if($frame_code=='ML-262 (E) GD')
                  {
                    return 26;
                  }if($frame_code=='ML-262 CP')
                  {
                    return 26;
                  }if($frame_code=='ML-289 CP')
                  {
                    return 75;
                  }if($frame_code=='ML-289 BK')
                  {
                    return 75;
                  }if($frame_code=='ML-289 WH')
                  {
                    return 75;
                  }if($frame_code=='ML-ST-30-SIL')
                  {
                    return 35;
                  }if($frame_code=='ML-ST-30-DBR')
                  {
                    return 35;
                  }if($frame_code=='ML-ST-30-BK')
                  {
                    return 35;
                  }
            } // fancy
                if($frame_list=='Antique'){
                 if($frame_code=='ML-014 GD (N)')
                  {
                    return 21;
                  }
                   if($frame_code=='ML-068 GD')
                  {
                    return 55;
                  }
                   if($frame_code=='ML- 068 MR')
                  {
                    return 45;
                  }
                   if($frame_code=='ML-100 GD')
                  {
                    return 72;
                  }if($frame_code=='ML-121 GD-DB')
                  {
                    return 52;
                  }if($frame_code=='ML-121-SIL')
                  {
                    return 52;
                  }if($frame_code=='ML- 068 MR')
                  {
                    return 55;
                  }if($frame_code=='ML-115 MR')
                  {
                    return 50;
                  }if($frame_code=='ML-115 SIL')
                  {
                    return 50;
                  }if($frame_code=='ML-130 CP')
                  {
                    return 74;
                  }if($frame_code=='ML-130 SIL')
                  {
                    return 74;
                  }if($frame_code=='ML-146 GD')
                  {
                    return 11;
                  }if($frame_code=='ML-146 SIL')
                  {
                    return 11;
                  }if($frame_code=='ML-160 SIL')
                  {
                    return 128;
                  }if($frame_code=='ML-160 GD')
                  {
                    return 128;
                  }if($frame_code=='ML-160 CP')
                  {
                    return 128;
                  }if($frame_code=='ML-215 WH')
                  {
                    return 24;
                  }if($frame_code=='ML215 SILUK')
                  {
                    return 24;
                  }if($frame_code=='ML-255 SIL BK')
                  {
                    return 25;
                  }if($frame_code=='ML-255 MR')
                  {
                    return 25;
                  }if($frame_code=='ML-255 DBR')
                  {
                    return 25;
                  } if($frame_code=='ML-271 SIL')
                  {
                    return 91;
                  } if($frame_code=='ML-271 BK')
                  {
                    return 91;
                  }
            } // Antique

            }/// sythetic frame
          }
        //////////////end  code for frame price ///////////////

           ////////////// code for mount  price ///////////////
        public function mount_price($mount_type) {
            if($mount_type=='Snow White' || $mount_type=='Poster Black' || $mount_type=='Antique Ivory Texture' || $mount_type=='Antique White' || $mount_type=='TINT 10' ){
                $size_width=32;
                $size_height=47;
                $price=225;
                $rate=0.15;
            }
            return array($size_height,$size_width,$price,$rate);
        }
          ////////////// end code for mount  price ///////////////


        ////////////// code for glass  price ///////////////

        public function glass_price($Glass_type) {

            if($Glass_type=='Normal')
            {
                $width=36;
                $height=48;
                $price=190;
                $rate=0.35;
            }
            if($Glass_type=='Acrylic')
            {
                $width=72;
                $height=48;
                $price=950;
                $rate=0.30;
            }
            return array($width,$height,$price,$rate);
        }

        ////////////// end code for glass  price ///////////////

        public function canvas_wrapped($canvas_type,$size) {
            if($canvas_type=='Acrylic')
            {
                if($size=='1_1.5')
                {
                return 25;
                }if($size=='1_2')
                {
                return 35;
                }if($size=='1.5_2')
                {
                 return 40;
                }

            }
             if($canvas_type=='Seasoned wood')
            {
                if($size=='1_1.5')
                {
                return 35;
                }if($size=='1_2')
                {
                return 45;
                }if($size=='1.5_2')
                {
                 return 50;
                }

            }

        }

        public function collection_price_wrt_paper($surface,$paper_type) {

             if($surface=='Photo_Matt_Fibre_Duo')
             {
                 if($paper_type=='hight')
                 {
                     return 12;
                 }if($paper_type=='mid')
                 {
                     return 8;
                 }if($paper_type=='budget')
                 {
                     return 5;
                 }
             }
            if($surface=='Photo_Luster')
             {
                 if($paper_type=='hight')
                 {
                     return 12;
                 }if($paper_type=='mid')
                 {
                     return 8;
                 }if($paper_type=='budget')
                 {
                     return 5;
                 }
             } if($surface=='Photo_Canvas')
             {
                 if($paper_type=='hight')
                 {
                     return 12.60;
                 }if($paper_type=='mid')
                 {
                     return 8.40;
                 }if($paper_type=='budget')
                 {
                     return 5.25;
                 }
             }if($surface=='Daguerre_Canvas')
             {
                 if($paper_type=='hight')
                 {
                     return 14.4;
                 }if($paper_type=='mid')
                 {
                     return 96;
                 }if($paper_type=='budget')
                 {
                     return 6;
                 }
             }if($surface=='Bamboo_Fine_art_Matt_Smooth')
             {
                 if($paper_type=='hight')
                 {
                     return 15.6;
                 }if($paper_type=='mid')
                 {
                     return 10.4;
                 }if($paper_type=='budget')
                 {
                     return 6.5;
                 }
             }

        }
////// end function collection_price_wrt_paper


public function edit_image_data($img_id,$data)
{
	$this->db->where('images_id',$img_id);
	$this->db->update('tbl_images_search',$data);
}

public function get_image_byname($name)
{
	$this->db->select('*');
	$this->db->where('images_filename',$name);
	$query=$this->db->get('tbl_images_search');
	return $query->result_array();
}

public function check_customer_email($email)
{
//print_r($email);die;
	$this->db->select('*');
	$this->db->where('email_id','');
	$query=$this->db->get('tbl_registration');
	if($query->num_rows >'0')
	{
	return false;
	}
	else
	{
		return true;
	}

}

public function get_data_tbl_registration()
{
//print_r($email);die;
	$this->db->select('*');
	$this->db->where('email_id','');
	$query=$this->db->get('tbl_registration');
	if($query->num_rows >'0')
	{
	echo "sorry somthing rong";
	}
	else
	{
		echo "got succcersss";
	}

}



public function insert_customer($data)
{
	$this->db->insert('tbl_registration',$data);
}

public function get_parent_customers()
{
	$this->db->select('*');
	$this->db->where('customer_created_by','admin');
	$this->db->where('customer_parent_id','0');
	$query = $this->db->get('tbl_registration');
	return $query->result_array();

}

public function get_customer_data($id)
{
	    $this->db->select('*');
		$this->db->where('customer_id',$id);
		$query = $this->db->get('tbl_registration');
	    return $query->row();
}

public function check_existing_name($name)
{
	    $this->db->select('*');
		$this->db->where('company_name',$name);
		$this->db->where('customer_parent_id','0');
		$query = $this->db->get('tbl_registration');
	    if($query->num_rows()>'0')
		{
			return false;

		}
		else
		{

		 return true;

		}

}

public function get_customer_bysearch($customer_type,$status,$company,$mail,$city,$customer_id,$account_type,$region,$customer_name,$start_date,$end_date,$limit,$start)
{
	$this->db->limit($limit,$start);
	 $this->db->select('*');
	 if($customer_type){
		 	 $this->db->where('customer_business_type',$customer_type);
	 }
	 if($status!='')
	 {
		 $this->db->where('status' ,$status);
	 }
	 if($company)
	 {
		 $this->db->where('company_name' ,$company);
	 }
	 if($mail)
	 {
		 $this->db->where('email_id',$mail);
	 }
	 if($city)
	 {
		 $this->db->where('city',$city);
	 }
	 if($customer_id){
		 	 $this->db->where('customer_id',$customer_id);
	 }
	  if($account_type){
		 	 $this->db->where('customers_account_type',$account_type);
	 }
	   if($region){
		 	 $this->db->where('customers_region',$region);
	 }
	 if($customer_name)
	 {
		  $this->db->where('customer_id',$customer_name);
	 }
	 if($start_date)
	 {
		 $this->db->where('date_account_create >=',$start_date);
	 }
	 if($end_date)
	 {
		 $this->db->where('date_account_create <=',$end_date);
	 }

	 $query=$this->db->get('tbl_registration');
	if($query->result_array()){
	return $query->result_array();
	}
	else
	{
		return '-1';
	}

}

public function count_rows_customer_search($customer_type,$status,$company,$mail,$city,$customer_id,$account_type,$region,$customer_name,$start_date,$end_date)
{
	 $this->db->select('*');
	 if($customer_type){
		 	 $this->db->where('customer_business_type',$customer_type);
	 }
	 if($status!='')
	 {
		 $this->db->where('status' ,$status);
	 }
	 if($company)
	 {
		 $this->db->where('company_name' ,$company);
	 }
	 if($mail)
	 {
		 $this->db->where('email_id',$mail);
	 }
	 if($city)
	 {
		 $this->db->where('city',$city);
	 }
	 if($customer_id){
		 	 $this->db->where('customer_id',$customer_id);
	 }
	  if($account_type){
		 	 $this->db->where('customers_account_type',$account_type);
	 }
	   if($region){
		 	 $this->db->where('customers_region',$region);
	 }
	 if($customer_name)
	 {
		  $this->db->where('customer_id',$customer_name);
	 }
	 if($start_date)
	 {
		 $this->db->where('date_account_create >=',$start_date);
	 }
	 if($end_date)
	 {
		 $this->db->where('date_account_create <=',$end_date);
	 }

	 $query=$this->db->get('tbl_registration');
	return $query->num_rows();

}

public function update_customer($data,$id)
{
	$this->db->where('customer_id',$id);
	$this->db->update('tbl_registration',$data);
}


public function get_customers_email()
{
	$this->db->select('*');
	$query = $this->db->get('tbl_registration');
	return $query->result_array();

}



public function get_frontnback_customer()
{
	$this->db->select('*');
	$this->db->where('customer_parent_id','');
	$this->db->or_where('customer_parent_id','0');
	$query = $this->db->get('tbl_registration');
	return $query->result_array();
}

public function get_customer_by_id($id)
{
	$this->db->select('*');
	$this->db->where('customer_id',$id);
	$this->db->or_where('customer_parent_id',$id);
	$query = $this->db->get('tbl_registration');
	return $query->result_array();


}

public function search_surface($type,$date)
{
	$this->db->select('*');
	if($type)
	{
		$this->db->where('surface_type',$type);
	}
	if($date)
	{
		$this->db->like('surface_created_date',$date);
	}
	$query=$this->db->get('tbl_surface');
	return $query->result_array();
}

public function search_frame($type,$width,$date,$color)
{
	$this->db->select('*');
	if($type)
	{
		$this->db->where('frame_type',$type);
	}
	if($width)
	{
		$this->db->where('frame_width',$width);
	}

	if($date)
	{
		$this->db->like('frame_created_date',$date);
	}

	if($color)
	{
		$this->db->where('frame_colour',$color);
	}

	$query=$this->db->get('tbl_frame');
	return $query->result_array();

}

public function search_mount($type,$width,$date,$color)
{
	$this->db->select('*');
	if($type)
	{
		$this->db->where('mount_type',$type);
	}
	if($width)
	{
		$this->db->where('mount_thickness',$width);
	}

	if($date)
	{
		$this->db->like('mount_created_date',$date);
	}

	if($color)
	{
		$this->db->where('mount_colour',$color);
	}

	$query=$this->db->get('tbl_mount');
	return $query->result_array();

}

public function search_vender($vender_name,$vender_code,$vender_type,$status,$email,$contact_person,$date,$region)
{
	$this->db->select('*');
	if($vender_name)
	{
    $this->db->where('vender_company_name',$vender_name);
	}
	if($vender_code)
	{
    $this->db->where('vender_code',$vender_code);
	}
	if($vender_type)
	{
    $this->db->where('vender_type',$vender_type);
	}
	if($status=='0' || $status=='1')
	{
    $this->db->where('vender_status',$status);
	}
	if($email)
	{
    $this->db->where('vender_email_id',$email);
	}
    if($region)
	{
		$this->db->where('vender_region',$region);
	}
	if($contact_person)
	{
    $this->db->where('vender_contact_no',$contact_person);
	}
	if($date)
	{
    $this->db->like('vender_created_date',$date);
	}
	//$this->db->where('vender_status','0');
	//$this->db->or_where('vender_status','1');
       $this->db->where('vender_status !=','2');
	$query=$this->db->get('tbl_vender');
	return $query->result_array();
}
  public function vender_list($type)
  {
       $this->db->select('*');
       $this->db->where('vender_type_status',$type);
       $query=$this->db->get('tbl_vender');
	return $query->result();
  }


  public function insert_product($data)
  {
       $this->db->insert('tbl_product_forms',$data);
  }
/*----------------------------------code written by Ankita dated on 2013-08-19 for getting product forms-------------------------------------*/
public function get_product_forms()
{
 $this->db->select('*');
 $this->db->distinct();
 $this->db->group_by('chanel_partner');
 $query=$this->db->get('channel_partner_export_data');
return $query->result();
}

public function get_product_forms_details($channel_partner_id)
{
 $this->db->select('*');
 $this->db->like('chanel_partner', $channel_partner_id);

 $query=$this->db->get('channel_partner_export_data');
return $query->result();
}

  public function get_channel_partner_data($Channel_partners)
{

    $sql="select * from channel_partner_export_data where chanel_partner='".$Channel_partners."' ";
        $rows=  mysql_query($sql);
        return $rows;
}

public function get_all_surface_type()
  {
       $this->db->select('*');

       $query=$this->db->get('tbl_type_of_surface');
	return $query->result();
  }

public function get_customers()
{
  $this->db->select('*');
  $this->db->where('status',1);
  $query=$this->db->get('tbl_registration');
  return $query->result();
}
public function get_customers_company()

    {
    //$this->db->distinct();
    $this->db->select('*');
    $query = $this->db->get('tbl_customer');
    return $query->result();
}

public function get_customers_byid($id)
{
  $this->db->select('*');
  $this->db->where('customer_id',$id);
  $query=$this->db->get('tbl_customer');
  return $query->row();
}

  public function add_category($data)
   {
       $this->db->insert('tbl_category',$data);
   }
    public function view_category()
    {
        $this->db->select('*');
        $query=$this->db->order_by('name','ASC')->get('tbl_category');
            return $query->result_array();
    }
 public function add_maincategory($data)
    {
        $this->db->insert('tbl_category',$data);
    }
    public function edit_category($data,$id)
    {
       // $sql="update tbl_category set "
        $this->db->where('id',$id);
        $this->db->update('tbl_category',$data);
    }
  public function get_details($change_id)
    {
        $this->db->select('*');
        $this->db->where('id',$change_id);


        $query=$this->db->get('tbl_category');
         return $query->result();
    }

    public function view_header_images()
    {
        $sql="select * from header_images  order by id desc";
       return mysql_query($sql);

    }
    public function header_images_status($edit_id,$status)
    {

        $this->db->set('status',$status);
        $this->db->where('id',$edit_id);
        $query=$this->db->update('header_images');
        if($query)
        {
            return 1;
        }else{
            return 0;
        }
    }

    public function header_images_delete($delete_id) {
        $this->db->where('id',$delete_id);
        $query= $this->db->delete('header_images');
        if($query)
        {
            return 1;
        }else{
            return 0;
        }
    }

    public function get_top_category_images($cat){
         $this->db->select('*');
        $this->db->where('title_name',$cat);
        $query=$this->db->get('header_images');
        return $query->result();
    }
     public function search_home_images($cat){
         if($cat=='menu_data')
         {
             $query1='cat_id!=0';

         }else{
             $query2="title_name='".$cat."'";

         }

        $sql="select * from header_images where $query1 $query2 order by id desc";
       return mysql_query($sql);

    }

    public function edit_header_images($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $query=$this->db->get('header_images');
        return $query->result();
    }
public function get_topcatagory_header_images()
    {
        $this->db->select('*');
        $this->db->where('title_name','top category');
        $query=$this->db->get('header_images');
        return $query->result();
    }

  public function show_images($img)
    {

        $this->db->from('tbl_images_search');

        $this->db->join('tbl_images_to_categories','tbl_images_to_categories.images_id =tbl_images_search.images_id ');
         $this->db->join('tbl_category','tbl_category.id = tbl_images_to_categories.categories_id');
        $this->db->where('tbl_images_to_categories.categories_id',$img);
        $query=$this->db->get();
        return $query->result();

    }


    public function get_img_det2($filename)
{

    $sql='select  * from tbl_images_search where images_filename in ('.$filename.')';
        $rows=  mysql_query($sql);
        return $rows;
}


   public function exist_files_name_channel_partner($channel_partner)
{

    $sql="select * from channel_partner_export_data where chanel_partner ='".$channel_partner."'";
        $rows=  mysql_query($sql);
        return mysql_num_rows($rows);
}


   public function get_img_det($id)
{

    $this->db->select('*');
    $this->db->where_in('images_filename',$id);
    $query=$this->db->get('tbl_images_search');
    return $query->result();
}
 public function update_image_status($id,$data)
     {
         $this->db->where('images_id',$id);
         $this->db->update('tbl_images_search',$data);
     }

 public function enable_images($extract)
    {$i=0;
        while($i<=count($extract))
        {
        $this->db->where('images_filename',$extract[$i]);
        $this->db->set('images_status',1);
        $this->db->update('tbl_images_search');
            $i++;
         }

    }
    public function disable_images($extract)
    {$i=0;
        while($i<=count($extract))
        {
            $this->db->where('images_filename',$extract[$i]);
            $this->db->set('images_status',0);
            $this->db->update('tbl_images_search');
            $i++;
        }

    }
 public function get_popularity($image_id)
    {
        $this->db->select('*');
        $this->db->where('images_id',$image_id);
        $query=$this->db->get('tbl_images_popularity');
        return $query->result();
    }
   public function update_image_popularity($id,$pop)
    {   $this->db->where('images_id',$id);
        $this->db->update('tbl_images_popularity',$pop);


    }
 public function get_image_bysearch($id)
 { $this->db->select('*');
     $this->db->where('images_filename',$id);
     $query=$this->db->get('tbl_images_search');
     return $query->result();
 }


 public function insert_create_quotation($id)
 { $this->db->select('*');
     $this->db->where('images_filename',$id);
     $query=$this->db->get('tbl_images_search');
     return $query->result();
 }

 public function quotation_data_insert($data)
 {   $this->db->insert('tbl_quotation_detail',$data);
 }

 public function get_frame_images($frame_code){

     $this->db->select('frame_upload_image_name');
     $this->db->where('frame_code',$frame_code);
     $query=$this->db->get('tbl_frame2');
     return $query->result();
 }


 public function get_mount_images($mount_code){
     //echo $mount_code;die;
     $this->db->select('framenmount_upload_image_name');
     $this->db->where('framenmount_code',$mount_code);
     $query=$this->db->get('tbl_framenmount_detail');
     return $query->result();
 }

 public function add_new_rows($quotation_id) {
     $insert="insert into increase_rows set quotation_id ='".$quotation_id."'";
     mysql_query($insert);
 }

 public function Get_new_rows($quotation_id) {
     $insert="select * from increase_rows ";
     $rows=mysql_query($insert);
     return $rows;
 }


 public function delete_rows($quotation_id) {
      $insert="delete from increase_rows where quotation_id ='".$quotation_id."'";
     $rows=mysql_query($insert);

 }
 
 ////////////////// vendor code start /////////////////
	
	
	public function insert_vendor_details($data)
	{
		$insert=$this->db->insert('tbl_vendors',$data);
		if($insert){ return 1;}else{ return 0;}

	}	
	
	public function insert_ven_details($data)
	{
		$insert=$this->db->insert('tbl_registration',$data);
		if($insert){ return 1;}else{ return 0;}

	}	
		
public function insert_vendor_quotation($data)
	{
		$insert=$this->db->insert('tbl_vendor_quoation',$data);
		return $insert_id = $this->db->insert_id();

	}			
		
	public function update_vendor_amount_payment_status($data,$data2,$order_id,$vendor_code){
   
    $this->db->where('order_id',$order_id);
	$this->db->where('vendor_code',$vendor_code);
    $query= $this->db->update('tbl_vendor_quoation',$data);
	
	$this->db->where('quotation_id',$order_id);
	$this->db->where('vendor_id',$vendor_code);
    $query1= $this->db->update('tbl_vendor_quoation_details',$data2);
	
	 if($query && $query1){
	 return 1;
	 }else{
	 return 0;
	 }
                
}
	
	public function update_vendor_process_status($data,$data2,$order_id,$vendor_code){
   
    $this->db->where('order_id',$order_id);
	$this->db->where('vendor_code',$vendor_code);
    $query= $this->db->update('tbl_vendor_quoation',$data);
	
	//$this->db->where('quotation_id',$order_id);
	//$this->db->where('vendor_id',$vendor_code);
    //$query1= $this->db->update('tbl_vendor_quoation_details',$data2);
	
	 if($query){
	 return 1;
	 }else{
	 return 0;
	 }
                
}
	
	
	
	
	
	public function update_vendor_quotation($data,$update_id,$vendor_code){
   
    $this->db->where('id',$update_id);
	$this->db->where('vendor_code',$vendor_code);
    $query= $this->db->update('tbl_vendor_quoation',$data);
                
}
		
	public function get_vendor_quotation_details($vendor_code,$order_id)
    {
        
		$this->db->select('*');
		$this->db->where('vendor_code',$vendor_code);
		$this->db->where('order_id',$order_id);
		$query=$this->db->get('tbl_vendor_quoation');
		return $query->result();
       
    }
	
	
	public function get_vendor_quotation_otherdetails($order_id)
    {
        
		$this->db->select('*');
		$this->db->where('quotation_id',$order_id);
		$query=$this->db->get('tbl_vendor_quoation_details');
		return $query->result();
       
    }
	
	public function get_whole_details_vendor_quotation($vendor_code)
    {
        $this->db->select('*');
		$this->db->order_by('order_id','DESC');
		$this->db->where('vendor_code',$vendor_code);
		$query=$this->db->get('tbl_vendor_quoation');
		return $query->result();
       
    }
	
	
	public function get_order_date_details_vendor_quotation($vendor_code)
    {
        $this->db->select('order_create_date');
		$this->db->where('vendor_code',$vendor_code);
		$this->db->where('credit_period','0');
		$this->db->order_by('order_id', 'DESC'); 
		$this->db->limit(1,1);
		$query=$this->db->get('tbl_vendor_quoation');
		return $query->result();
       
    }
	
	public function get_vendor_by_vender_id_details($vendor_code)
    {
        
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('vendor_code',$vendor_code);
		$query=$this->db->get('tbl_vendors');
		$result =$query->result();
		 
      return  array('company_name'=>$result[0]->company_name,'city'=>$result[0]->customer_city);
    }
	
	
	public function get_vendor_details()
    {
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->order_by('register_date','desc');
		$query=$this->db->get('tbl_vendors');
		return $query->result();
       
    }
	
	public function other_vender_details_quot($vender_code,$quotation_id,$status){
	    $this->db->select('*');
		$this->db->where('status',$status);
		$this->db->where('vendor_id',$vender_code);
		$this->db->where('quotation_id',$quotation_id);
		$query=$this->db->get('tbl_vendor_quoation_details');
		return $query->result();
	
	}
	public function get_vendor_docket_quotation($vender_code,$quotation_id)
    {
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('vendor_id',$vender_code);
		$this->db->where('quotation_id',$quotation_id);
		$query=$this->db->get('tbl_vendor_quoation_details');
		return $query->num_rows();
       
    }
	
	
	
	public function get_vendor_by_company()
    {
        
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->order_by('register_date','vendor_id');
		$query=$this->db->get('tbl_vendors');
		return $query->result();
       
    }
	
	
		
	
	
	
	public function get_order_id_gen()
    {
        
		$this->db->select('order_id');
		$query=$this->db->get('tbl_vendor_order_gen');
		return $query->result();
       
    }
	
	
	public function get_vendor_subuser_code_gen()
    {
        
		$this->db->select('subuser_id');
		$query=$this->db->get('tbl_vendor_subuser_code_gen');
		return $query->result();
       
    }
	
	public function update_vendor_subuser_code_gen($id)
    {
        $subuser_id=$id+1;
		$sql="update tbl_vendor_subuser_code_gen set subuser_id='".$subuser_id."' where subuser_id='".$id."'";
		mysql_query($sql);
       
    }
	
	
	
	public function get_vendor_code_gen()
    {
        
		$this->db->select('vendor_id');
		$query=$this->db->get('tbl_vendor_code_gen');
		return $query->result();
       
    }
	
	
	public function update_vendor_code_gen($id)
    {
        $vendor_id=$id+1;
		$sql="update tbl_vendor_code_gen set vendor_id='".$vendor_id."' where vendor_id='".$id."'";
		mysql_query($sql);
       
    }
	
	
	
	public function get_vendor_by_name()
    {
        
		$this->db->select('DISTINCT(customer_name)');
		$this->db->where('status','1');
		$this->db->order_by('register_date','desc');
		$query=$this->db->get('tbl_vendors');
		return $query->result();
       
    }
	
	
	public function get_vendor_by_code()
    {
        
		$this->db->select('DISTINCT(vendor_code)');
		$this->db->where('status','1');
		$this->db->order_by('register_date','desc');
		$query=$this->db->get('tbl_vendors');
		return $query->result();
       
    }
	

public function vendor_login_verification($email,$password)
	{ 

		$this->db->select('*');
		$this->db->where('customer_email',$email);
		$this->db->where('password',$password);
		$query=$this->db->get('tbl_vendors');

		if($query->num_rows()>0)
		{


			return $query->row();
		}
		else
		{
			return 0;
		}

	}
	
	
	
	////////////////// vendor code end /////////////////
	
	
 


}
?>
