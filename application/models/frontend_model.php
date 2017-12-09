<?php 
class Frontend_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}
		//main frontend of beta.mahattaart by mohan
	
	public  function insert_into_myupload($user_id,$mat_color,$frameSize,$paper_surface,$final_frame_size,$frame_name,$image_namee)	{
		$this->db->where('user_id',$user_id);
		$this->db->where('image_id',$image_id);
		$this->db->where('image_print_type',trim($imagsTypes));
		$this->db->where('image_size',trim($total_size));

		$query=$this->db->get('add_images_table');
		return $query->num_rows();//$user_id.','.$image_id.','.$imagsTypes.','.$total_size;
	}

	public function get_header_images_inner_collection($title,$cat_id)	{
		$this->db->select('*');
		$this->db->where('cat_id',$cat_id);
		$this->db->like('title',$title);
		$this->db->where('status','1');
		$this->db->order_by('title','asc');		
		$query=$this->db->get('header_images');
		return $query->result(); 
	}	
public function get_tbl_web_price_test($paper,$paper_type_name){
//echo $paper;
$this->db->select('*');
$this->db->where('paper',$paper);
//$this->db->where('paper_type_name','Archival Standard');
$query=$this->db->get('tbl_web_price');
return $query->result();

}
	public function get_frame_code_web_price()	{
		//	$frame_cat=$this->input->post('frame_cat');
		$this->db->select('rate,paper_type_only,web_print_price');
		$this->db->where('frame_category','Basic');
		$this->db->where_not_in('frame_code','');
		$query=$this->db->get('tbl_web_price');
		return $query->result();
	}

	public function get_frame_size()	{
		$this->db->select('*');
		// $this->db->group_by('frame_type');
		$this->db->where_not_in('frame_size','');
		$this->db->group_by('frame_size','asc');
		$query=$this->db->get('tbl_frame_details');
		return $query->result();
	}

	public function get_frame_color_web_price()	{
		$this->db->select('frame_color');
		$this->db->group_by('frame_color');
		$query=$this->db->get('tbl_frame_details');
		return $query->result();
	}

	public function get_mount_name_web_price()	{
		$this->db->select('mount');
		$this->db->group_by('mount');
		$query=$this->db->get('tbl_mount_details');
		return $query->result();
	}

	public function get_frame_cat_tbl_web_price()	{
		$this->db->select('*');
		$this->db->group_by('frame_category','asc');
		$query= $this->db->get('tbl_frame_details');
		return $query->result();
	}

	public function reverse_number($number)	{
		$snum = (string) $number;
		$revstr = strrev($snum);
		$reverse = (int) $revstr;
		return $reverse;
	}

	public function delete_image($image_name)	{
		$this->db->where('image_name',$image_name);
		$qty = array('removed'=>1);
		$query=$this->db->update('add_images_table',$qty);
		if($query)
		return true;
		else
		return false;
	}

	public function images($id)	{
		$this->db->select('image_name');
		$this->db->where('session_id',$id);
		$query=$this->db->get('add_images_table');
		return $query->result();
	}

	public function get_images($id)	{
		$this->db->select('*');
		$this->db->where('session_id',$id);
		$this->db->where('removed',0);
		$this->db->order_by("id","desc");
		$query=$this->db->get('add_images_table');
		return $query->result();
	}

	public function get_user_images($id)	{
		$this->db->select('*');
		$this->db->where('customer_id',$id);
		$this->db->where('removed',0);
		$this->db->order_by("id","desc");
		$query=$this->db->get('add_images_table');
		return $query->result();
	}

	public function get_session($customer_id){
		$this->db->select('session_id');
		$this->db->where('customer_id',$customer_id);
		$this->db->where('removed',0);
		$this->db->order_by("id","desc");
		$query=$this->db->get('add_images_table');
		return $query->result();	
	}

	public function get_print_only($paper_type,$glass)	{
		$this->db->select('rate')->where('paper',$paper_type)->where('quality','Star');
		$query = $this->db->get('tbl_web_price');
		$data[0] = $query->result(); 
		$this->db->select('glass_rate')->where('glass',$glass);
		$query = $this->db->get('tbl_glass_details');
		$data[1] = $query->result();
		return $data;
	}
	

	public function user_for_photostoFrame($user_id , $customer_id){
		$this->db->where('session_id',$user_id);
		$id = array('customer_id'=> $customer_id);
		$query = $this->db->update('add_images_table',$id);
		echo $query;
	}

	public function get_default($frame,$mount)	{
		$this->db->select('*')->where('frame_code',$frame);
		$query = $this->db->get('tbl_frame_details');
		$data[0] = $query->result(); 
		$this->db->select('*')->where('mount_code',$mount);
		$query = $this->db->get('tbl_mount_details');
		$data[1] =$query->result();
		return $data;
	}

	public function insert_image($data)	{
		$this->db->insert('add_images_table', $data);
	}
	// End

	public function get_all_lightboxes_gallery($user_id)	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->order_by("lightbox_name");
		$query=$this->db->get('tbl_lightbox_details');
		return $query->result();
	}

	public function create_image_intrested($data)	{
		$this->db->insert('tbl_buy_details', $data);
	}

	public function get_web_frame_rate($frame)	{
		$sql="select frame_rate from tbl_frame_details where frame like '%".$frame."%'";
		$rows=  mysql_query($sql);
		$result=  mysql_fetch_assoc($rows);
		return $result['frame_rate'];
	}

	public function get_web_mount_rate($mount)	{
		$sql="select mount_rate from tbl_mount_details where mount like '%".$mount."%'";
		$rows=  mysql_query($sql);
		$result=  mysql_fetch_assoc($rows);
		return $result['mount_rate'];
	}

	public function get_web_glass_rate($glass)	{
		$sql="select glass_rate from tbl_glass_details where glass like '%".$glass."%'";
		$rows=  mysql_query($sql);
		$result=  mysql_fetch_assoc($rows);
		return $result['glass_rate'];
	}

	public function get_collection() {
		$search_api = "http://api.indiapicture.in/wallsnart/get_collection.php";
		$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
		$context = stream_context_create($opts);
		$search_data_raw = file_get_contents($search_api, false, $context);
		$search_data = json_decode($search_data_raw,TRUE);
		return $search_data;
	}

	public function get_tbl_order_details()	{
		$id=$this->session->userdata('userid');
		$this->db->select('*');
		$this->db->where('customer_id',$id);
		$this->db->where_not_in('inv_order_id','');
		$this->db->order_by('order_date','desc');
		$query=$this->db->get('order_details');
		return $query->result();
	}

	public function get_add_details()	{
		$this->db->select('*');
		$this->db->where_not_in('print_paper','0');
		$query=$this->db->get('tbl_add_details');
		return $query->result(); 
	}    

	public function get_tbl_clearence($value)	{
		$this->db->select('*');
		// echo $value;
		$this->db->where('available','Yes');
		$this->db->where_not_in('reasons','damaged');
		if($value=='price_h'){
		$this->db->order_by('s_p','desc');
		}else if($value=='price_l'){
		$this->db->order_by('s_p','asc');
		}
		$query=$this->db->get('tbl_clearence');
		return $query->result();
	}

	public function get_prod_details($image_id,$size)	{
		$filename=rtrim($image_id,'.JPG');
		$this->db->select('*');
		$this->db->where('image_id',$filename);
		$this->db->where('size',trim($size));
		$query=$this->db->get('tbl_clearence');
		return $query->result();
	}

	public function insert_registeration($first_name,$last_name,$email,$password)	{
		$data=array(
		'first_name'=>$first_name,
		'last_name'=>$last_name,
		'email_id'=>$email,
		'password'=>$password
		);
		//print_r($data);die;
		$insert=$this->db->insert('tbl_registration',$data);
		if($insert)	{
			echo "";
		}
	}
public function get_surface_tbl_web_price($print_type,$print_type_name){
if($print_type==4){
$print_type=array(1,2);
//print_r($print_type);
}
$this->db->select('*');
$this->db->where_in('paper_type_only',$print_type);
$this->db->where('paper_type_name',$print_type_name);
$this->db->group_by('paper');
$query=$this->db->get('tbl_web_price');
return $query->result();

}
	public function get_images_lightbox_gallery($lightbox_id,$limit,$start)	{
		$this->db->select('*');
		$this->db->where('lightbox_id',$lightbox_id);
		$this->db->where('status','1');
		$this->db->limit($limit, $start);
		$query=$this->db->get('tbl_lightbox_images');
		return $query->result();
		//print $this->db->last_query();
	}

	public function get_light_boxName($image_id,$user_id)	{
		$this->db->select('*');
		$this->db->from('tbl_lightbox_images');
		$this->db->join('tbl_lightbox_details',	'tbl_lightbox_details.lightbox_id=tbl_lightbox_images.lightbox_id');
		$this->db->where('tbl_lightbox_images.image_id',$image_id);
		$this->db->where('tbl_lightbox_details.user_id',$user_id);
		$this->db->where('tbl_lightbox_images.status','1');
		$query=$this->db->get();
		return $query->result();
	}

	public function fb_insert_registeration($customer_parent_id,$first_name,$last_name,$email,$password,$address,$city,$state,$country,$contact,$zip_code,$status,$date_account_create,$date_account_last_update,$date_account_last_login,$account_last_login_ip,$no_of_logon,$register_form,$register_type,$customer_facebook_userid,$customer_business_type,$customer_created_by,$customers_account_type,$customers_region,$company_type,$company_name,$job,$martial_status,$gender,$occupation_other,$purpose,$gift_address)	{
		$data=array(
			'customer_parent_id'=>$customer_parent_id,
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'email_id'=>$email,
			'password'=>$password,
			'address'=>$address,
			'city'=>$city,
			'state'=>$state,
			'country'=>$country,
			'zip_code'=>$zip_code,
			'contact'=>$contact,
			'status'=>$status,
			'date_account_create'=>$date_account_create,
			'date_account_last_update'=>$date_account_last_update,
			'date_account_last_login'=>$date_account_last_login,
			'account_last_login_ip'=>$account_last_login_ip,
			'no_of_logon'=>$no_of_logon,
			'register_form'=>$register_form,
			'register_type'=>$register_type,
			'customer_facebook_userid'=>$customer_facebook_userid,
			'customer_business_type'=>$customer_business_type,
			'customer_created_by'=>$customer_created_by,
			'customers_account_type'=>$customers_account_type,
			'customers_region'=>$customers_region,
			'company_type'=>$company_type,
			'company_name'=>$company_name,
			'job'=>$job,
			'martial_status'=>$martial_status,
			'gender'=>$gender,
			'occupation_other'=>$occupation_other,
			'purpose'=>$purpose,
			'gift_address'=>$gift_address
		);
		//echo "<pre>"; print_r($data);
		//die;
		$this->db->insert('tbl_registration',$data);
	}

	public function check_email_exist($email)	{
		//print_r($email);die;
		$rows=mysql_query("select * from tbl_registration where email_id='".$email."'");
		//$query=$this->db->get_where('tbl_registration',array('email_id'=>$email));
		//print_r($rows);die;
		//die(num_rows($query));
		if(mysql_num_rows($rows)>0)	{
			return 1;
		}	else	{
			return 0;
		}
	}

	public function update_passwrd($xrt)	{
		//echo $xrt;die;
	}

	public function get_imagesFilename_details($filename)	{
		$this->db->select('*');
		$this->db->where('images_filename',$filename);
		$query=$this->db->get('tbl_images_search');
		return $query->result();
	}

	public function get_header_images($cat_id)	{
		$this->db->select('*');
		$this->db->where('cat_id',$cat_id);
		$this->db->where('status','1');
		$query=$this->db->get('header_images');
		return $query->result(); 
	}
	
	public function get_header_images_inner($cat_id,$limit=0,$start=0)	{
		$this->db->select('*');
		$this->db->where('cat_id',$cat_id);
		$this->db->where('status','1');
		$this->db->order_by('title','asc');
		if($limit != 0)	{
			$this->db->limit($limit,$start);
		}
		$query=$this->db->get('header_images');
		return $query->result(); 
	}

	public function get_header_images_count($cat_id)	{
		$this->db->select('*');
		$this->db->where('cat_id',$cat_id);
		$this->db->where('status','1');
		$query=$this->db->get('header_images');
		return $query->num_rows(); 
	}	

	public function get_home_top_category_images($title_name,$imageno)	{
		$this->db->select('*');
		if($imageno<>''){
			$this->db->where('image_no',$imageno);
		}
		$this->db->where('title_name',$title_name);
		$this->db->where('status','1');
		$query=$this->db->get('header_images');
		return $query->result();
	}

	public function login_verification($email,$password)	{
		//echo $email;die;
		$this->db->select('*');
		$this->db->where('email_id',$email);
		$this->db->where('password',$password);
		//$this->db->where('status','1');
		$query=$this->db->get('tbl_registration');
		$query->num_rows();
		if($query->num_rows()>0)	{
			return  $query->row();
		}	else	{
			return false;
		}
	}

	public function verify_email($email)	{
		$this->db->select('*');
		$this->db->where('email_id',$email);
		$query=$this->db->get('tbl_registration');
		if($query->num_rows()>0)	{
			return $query->row();
		}	else	{
			return false;
		}
	}

	public function GetFilename_details($images_id) {
		$sql_1="select images_filename from tbl_images_search where images_id in ($images_id)";
		$rows=  mysql_query($sql_1);
		return $rows;
	}

	public function update_user_status($user_id)	{
		$data=array('status'=>'1');
		$this->db->where('customer_id',$user_id);
		$this->db->update('tbl_registration',$data);
	}

	public function get_user_details($user_id)	{
		$this->db->select('*');
		$this->db->where('customer_id',$user_id);
		$query=$this->db->get('tbl_registration');
		return $query->row();
	}

	public function get_frames_compo()	{
		/*$query=$this->db->query("SELECT DISTINCT tbl_images_search.images_filename,tbl_channel_partner_details.email_id,tbl_images_search.images_photographer,tbl_framenmount_detail.framenmount_code,tbl_framenmount_detail.framenmount_upload_image_name,\n"
		. "tbl_vender.vender_code,tbl_channel_partner_details.cp_id\n"
		. "FROM `tbl_images_search` INNER JOIN `tbl_channel_partner_details` ON tbl_images_search.images_photographer=tbl_channel_partner_details.cp_id \n"
		. "INNER JOIN tbl_vender ON tbl_vender.vender_email_id=tbl_channel_partner_details.email_id INNER JOIN tbl_framenmount_detail ON tbl_vender.vender_code=tbl_framenmount_detail.vender_code\n"
		. "WHERE tbl_images_search.images_id=$img_id");*/

		$this->db->select('*');
		//$this->db->where('frame_id','33');
		//$this->db->or_where('frame_id','34');
		$this->db->or_where('frame_id','43');
		$this->db->or_where('frame_id','47');
		$this->db->or_where('frame_id','63');
		$this->db->or_where('frame_id','49');
		$this->db->or_where('frame_id','51');
		//$this->db->or_where('frame_id','39');
		// $this->db->or_where('frame_id','40');
		// $this->db->or_where('frame_id','41');
		//$this->db->or_where('frame_id','31');

		//  $this->db->or_where('frame_id','29');
		$this->db->or_where('frame_id','
		35');
		//     $this->db->or_where('frame_id','36');
		$query=$this->db->get('tbl_frame2');
		if($query->num_rows()>0)
		return $query->result();
		else return false;
	}

	public function get_frames_black_compo()	{
		$this->db->select('*');
		$this->db->or_where('frame_id','46');
		$this->db->or_where('frame_id','45');
		$this->db->or_where('frame_id','52');
		$this->db->or_where('frame_id','60');
		$this->db->or_where('frame_id','65');
		//$this->db->or_where('frame_id','46');
		$query=$this->db->get('tbl_frame2');
		if($query->num_rows()>0)
		return $query->result();
		else return false;
	}

	public function get_frames_gold_compo()	{
		$this->db->select('*');
		$this->db->where('frame_id','55');
		$this->db->or_where('frame_id','39');
		$this->db->or_where('frame_id','58');
		$this->db->or_where('frame_id','63');
		$this->db->or_where('frame_id','64');
		$query=$this->db->get('tbl_frame2');
		if($query->num_rows()>0)
		return $query->result();
		else return false;
	}

	public function get_frames_gray_compo()	{
		$this->db->select('*');
		//  $this->db->where('frame_id','30');
		$this->db->or_where('frame_id','34');
		//$this->db->or_where('frame_id','36');
		$query=$this->db->get('tbl_frame2');
		if($query->num_rows()>0)
		return $query->result();
		else return false;
	}

	public function get_frames_blue_compo()	{
		$this->db->select('*');
		//  $this->db->where('frame_id','30');
		//$this->db->or_where('frame_id','34');
		$this->db->or_where('frame_id','37');
		$this->db->or_where('frame_id','51');
		$this->db->or_where('frame_id','56');
		$query=$this->db->get('tbl_frame2');
		if($query->num_rows()>0)
		return $query->result();
		else return false;
	}

	public function get_frames_white_compo()	{
		$this->db->select('*');
		//$this->db->where('frame_id','30');
		//$this->db->or_where('frame_id','34');
		$this->db->or_where('frame_id','38');
		$this->db->or_where('frame_id','53');
		$query=$this->db->get('tbl_frame2');
		if($query->num_rows()>0)
		return $query->result();
		else return false;
	}

	public function get_frames_yellow_compo()	{
		$this->db->select('*');
		$this->db->or_where('frame_id','42');
		$query=$this->db->get('tbl_frame2');
		if($query->num_rows()>0)
		return $query->result();
		else return false;
	}

	public function get_framenmount_price($code)	{
		$this->db->select('*');
		$this->db->where('framenmount_code',$code);
		$query=$this->db->get('tbl_framenmount_detail');
		return $query->row();
	}

	public function get_mount_compo()	{
		$this->db->select('*');
		$query=$this->db->get('tbl_mount1');
		if($query->num_rows()>0)
		return $query->result();
		else return false;
	}

	public function get_artist_name($start1)	{
		$this->db->distinct();
		$this->db->select('artist_name');
		$this->db->like('artist_name',$start1,'after');
		$query=$this->db->get('tbl_images_search');
		if($query->num_rows()>'0')
		return $query->result_array();
		else return null;
	}

	public function get_result_for_images($artist_name)	{
		$this->db->limit('1','0');
		$this->db->select('*');
		$this->db->where('artist_name',$artist_name);
		$query=$this->db->get('tbl_images_search');
		if($query->num_rows()>'0')	{
			return $query->result_array();
		}
		else return null;
	}

	public function get_sales_counter_artstyle_category($categ,$count)	{
		$this->db->select('sales_counter');
		for($i=0;$i<$count;$i++)	{
			$this->db->like('images_keywords',$categ[$i]);
			$this->db->or_like('images_description',$categ[$i]);
			$this->db->or_like('images_filename',$categ[$i]);
		}
		$query=$this->db->get('tbl_images_search');
		return $query->result_array();
	}

	public function artstyle_list_sort($arr1,$arr2,$coun)	{
		$co=$coun-2;
		for($i=0;$i<=$co;$i++)	{
			for($k=0;$k<=$co-$i;$k++)	{
				if($arr1[$k]>$arr1[$k+1])	{
					$temp1=$arr1[$k];
					$arr1[$k]=$arr1[$k+1];
					$arr1[$k+1]=$temp1;
					$temp2=$arr2[$k];
					$arr2[$k]=$arr2[$k+1];
					$arr2[$k+1]=$temp2;
				}
			}
		}
		return $arr2;
	}

	public function get_keyword_per_fine_art($fine_art_type)	{
		$this->db->select('*');
		$this->db->where('fine_art_type',$fine_art_type);
		$query=$this->db->get('tbl_artstyles_fine_art');
		return $query->row();
	}

	public function get_keyword_per_vintage_art($vintage_art_type)	{
		$this->db->select('*');
		$this->db->where('vintage_art_type',$vintage_art_type);
		$query=$this->db->get('tbl_artstyles_vintage_art');
		return $query->row();
	}

	public function get_keyword_per_indian_art($indian_art_type)	{
		$this->db->select('*');
		$this->db->where('indian_art_type',$indian_art_type);
		$query=$this->db->get('tbl_artstyles_indian_art');
		return $query->row();
	}

	public function get_keyword_per_photography($photography_type)	{
		$this->db->select('*');
		$this->db->where('photography_type',$photography_type);
		$query=$this->db->get('tbl_artstyles_photography');
		return $query->row();
	}

	public function get_max_val_sale_coun($categ,$count)	{
		$this->db->select('*');
		$this->db->select_max('sales_counter');
		for($i=0;$i<$count;$i++)	{
			$this->db->like('images_keywords',$categ[$i]);
			$this->db->or_like('images_description',$categ[$i]);
			$this->db->or_like('images_filename',$categ[$i]);
		}
		$query=$this->db->get('tbl_images_search');
		if($query->num_rows()>'0')
		return $query->row();
		else return null;
	}

	public function fine_art($limit,$start)	{
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$query=$this->db->get('tbl_artstyles_fine_art');
		return $query->result_array();
	}

	public function indian_art($limit,$start)	{
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$query=$this->db->get('tbl_artstyles_indian_art');
		return $query->result_array();
	}

	public function vintage_art($limit,$start)	{
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$query=$this->db->get('tbl_artstyles_vintage_art');
		return $query->result_array();
	}

	public function photography($limit,$start)	{
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$query=$this->db->get('tbl_artstyles_photography');
		return $query->result_array();
	}

	public function count_rows_fine_art()	{
		return $this->db->count_all('tbl_artstyles_fine_art');
	}
	public function count_rows_vintage_art()	{
		return $this->db->count_all('tbl_artstyles_vintage_art');
	}
	public function count_rows_indian_art()	{
		return $this->db->count_all('tbl_artstyles_indian_art');
	}
	public function count_rows_photography()	{
		return $this->db->count_all('tbl_artstyles_photography');
	}

	/*public function get_bestsellers()	{
		$query=$this->db->query("SELECT * FROM `tbl_images_search` ORDER BY sales_counter DESC limit 0,16");
		return $query->result();
	}*/

	public function get_collection_bestselling($cid)	{
		$query=$this->db->query("SELECT * FROM `tbl_images_search` where images_collectionid='$cid' ORDER BY sales_counter DESC limit 0,3");
		return $query->result();
	}

	public function get_product_types_best_selling($id,$coun)	{
		$limit=3;
		$start=0;
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->where('images_collectionid',$id['0']);
		for($i=1;$i<$coun;$i++)	{
			$this->db->or_where('images_collectionid',$id[$i]);
		}
		$this->db->order_by("sales_counter","desc");
		$query=$this->db->get('tbl_images_search');
		return $query->result();
	}

	public function get_top_photographers($limit,$start)	{
		$this->db->limit($limit,$start);
		$this->db->select('artist_name');
		$this->db->distinct();
		$this->db->order_by("sales_counter","desc");
		$query=$this->db->get('tbl_images_search');
		return $query->result();
	}

	public function insert_light_box_details($user_id,$lt_bx_nm,$lt_bx_des,$date)	{
		$this->db->select('*');
		$this->db->where('lightbox_name',$lt_bx_nm);
		$query=$this->db->get('tbl_lightbox_details');
		if($query->num_rows()>'0')	{
			return null;
		}	else{
			$data=array('user_id'=>$user_id,
			'lightbox_name'=>$lt_bx_nm,
			'lightbox_description'=>$lt_bx_des,'creation_date'=>$date);
			$this->db->insert('tbl_lightbox_details',$data);
			return mysql_insert_id();
		}
	}

	public function get_lt_detail_row($lt_id,$lt_nm)	{
		$this->db->select('*');
		$this->db->where('lightbox_id',$lt_id);
		$this->db->where('lightbox_name',$lt_nm);
		$query=$this->db->get('tbl_lightbox_details');
		return $query->row();
	}

	public function insert_get_lightbox_id($user_id,$lt_bx_nm,$lt_bx_des,$date)	{
		$data=array('user_id'=>$user_id,
		'lightbox_name'=>$lt_bx_nm,
		'lightbox_description'=>$lt_bx_des,
		'creation_date'=>$date);
		$this->db->insert('tbl_lightbox_details',$data);
		//echo $this->db->last_query();
		//print_r($data);
		return mysql_insert_id();
	}

	public function get_only_last_lightbox($user_id,$lightbox_id)	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->where('lightbox_id',$lightbox_id);
		$query=$this->db->get('tbl_lightbox_details');
		return $query->row();
	}

	public function update_light_box_details($lightbox_id,$lt_bx_nm,$lt_bx_des)	{
		$this->db->select('*');
		$this->db->where('lightbox_id',$lightbox_id);
		$this->db->where('lightbox_name',$lt_bx_nm);
		$this->db->where('lightbox_description',$lt_bx_des);
		$query=$this->db->get('tbl_lightbox_details');
		if($query->num_rows()>'0')	{
			return $query->num_rows();
		}	else{
			$data=array('lightbox_name'=>$lt_bx_nm,
			'lightbox_description'=>$lt_bx_des
			);
		$this->db->where('lightbox_id',$lightbox_id);
		$this->db->update('tbl_lightbox_details',$data);
		return null;
		}
	}

	public function  gallery_record_count($user_id)	{
		$this->db->select('*');
		$this->db->from('tbl_lightbox_images');
		$this->db->join('tbl_lightbox_details',	'tbl_lightbox_details.lightbox_id=tbl_lightbox_images.lightbox_id','right');
		$this->db->where('tbl_lightbox_details.user_id',$user_id);
		$this->db->where('tbl_lightbox_images.status','1');
		$query=$this->db->get();
		return $query->num_rows();
	}

	public function get_all_lightboxes($user_id,$limit, $start)	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->limit($limit, $start);
		$this->db->order_by("lightbox_name");
		$query=$this->db->get('tbl_lightbox_details');
		return $query->result();
	}


	public function get_all_lightboxes2($user_id)	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$query=$this->db->get('tbl_lightbox_details');
		return $query->result();
	}


	public function get_lightbox_name($lightbox_id)	{
		$this->db->select('*');
		$this->db->where('lightbox_id',$lightbox_id);
		$query=$this->db->get('tbl_lightbox_details');
		return $query->row();
	}

	public function change_status($lt_id,$img_id)	{
		$data=array('status'=>'2');
		$this->db->where('lightbox_id',$lt_id);
		$this->db->where('image_id',$img_id);
		$this->db->update('tbl_lightbox_images',$data);
	}

	public function sorting_lightbox($sortby,$user_id)	{
		$this->db->select('*');
		$this->db->where("user_id",$user_id);
		if($sortby=='1')
		$this->db->order_by("lightbox_name");
		if($sortby=='2')
		$this->db->order_by("creation_date","desc");
		$query=$this->db->get('tbl_lightbox_details');
		return $query->result();
	}

	public function count_images_lightbox($lightbox_id)	{
		$this->db->select('*');
		$this->db->where('lightbox_id',$lightbox_id);
		$this->db->where('status','1');
		$query=$this->db->get('tbl_lightbox_images');
		if($query->num_rows()>'0')
		return $query->num_rows();
		else return null;
	}

	public function insert_light_box_images($lightbox_id,$img_id,$filename,$img_size,$image_price,$print_type)	{
		$sql="update tbl_images_search set visibility_status ='1' where images_id in ($img_id)";
		$update=  mysql_query($sql);
		$sql="insert into tbl_lightbox_images set  lightbox_id='".$lightbox_id."', image_id='".$img_id."', images_filename='".$filename."', status='1', image_size='".$img_size."', image_print_type='".$print_type."', price='".$image_price."'";
		mysql_query($sql);
	}

	public function insert_light_box_images22222($lightbox_id,$img_id,$filename,$img_size,$image_price,$print_type)	{
		$sql="update tbl_images_search set visibility_status ='1' where images_id in ($img_id) ";
		$update=  mysql_query($sql);
		$data=array('lightbox_id'=>$lightbox_id,'image_id'=>$img_id,'images_filename'=>$filename,'image_size'=>$img_size,'image_print_type'=>$print_type,'price'=>$image_price);
		//print_r($data);die;
		$this->db->insert('tbl_lightbox_images',$data);
	}

	public function get_image_id($images_filename)	{
		$this->db->select('*');
		$this->db->where('images_filename',$images_filename);
		$query=$this->db->get('tbl_images_search');
		return $query->result();
	}

	public function get_images_lightbox($lightbox_id)	{
		$this->db->select('*');
		$this->db->where('lightbox_id',$lightbox_id);
		$this->db->where('status','1');
		//$this->db->limit($limit, $start);
		$query=$this->db->get('tbl_lightbox_images');
		return $query->result();
		//print $this->db->last_query();
	}
        
	public function get_Gallery_images_lightbox($lightbox_id)	{
		$this->db->select('*');
		$this->db->where('lightbox_id',$lightbox_id);
		$query=$this->db->get('tbl_lightbox_images');
		return $query->result();
		//print $this->db->last_query();
	}

	public function get_Gallery_images_lightbox_details($lightbox_id)	{
		//echo $lightbox_id;
		$this->db->select('*');
		$this->db->where('lightbox_id',$lightbox_id);
		$query=$this->db->get('tbl_lightbox_images');
		return $query->result();
		//print $this->db->last_query();
	}

	public function check_existing_image_ltbox($lightbox_id,$image_id)	{
		$sql_1="select * from tbl_lightbox_images where lightbox_id='".$lightbox_id."' and image_id='".$image_id."'";
		$rows=mysql_query($sql_1);
		if(mysql_num_rows($rows)>0)	{
			return '2';
		}	else	{
			return '1';
		}
	}

	public function get_light_box_details($user_id)	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$query=$this->db->get('tbl_lightbox_details');
		return $query->result();
	}

	public function get_most_selling_image($img_arr)	{
		$this->db->select('*');
		$this->db->where_in('images_id',$img_arr);
		$query=$this->db->get('tbl_images_search');
		return $query->result();
	}

	public function get_emerging_artists_images($emerge,$limit,$start)	{
		$query=$this->db->query("SELECT * FROM `tbl_images_search` where artist_name='".$emerge."' order by sales_counter desc limit $start,$limit");
		//echo $this->db->last_query();
		return $query->row();
	}
	
	public function delete_lightbox($lightbox_id)	{
		$this->db->where('lightbox_id',$lightbox_id);
		$this->db->delete('tbl_lightbox_details');
	}
	
	public function delete_lightbox_images($lightbox_id)	{
		$this->db->where('lightbox_id',$lightbox_id);
		$this->db->delete('tbl_lightbox_images');
	}
	
	public function newsletter_entry($email)	{
		$data=array(
				'email'=>$email,
				);		
		$this->db->insert('tbl_newsletter',$data);
	}
	
	public function delete_gallery_image($image_id,$lightbox_id)	{
		$this->db->where('lightbox_id',$lightbox_id);
		$this->db->where('image_id',$image_id);
		$this->db->delete('tbl_lightbox_images');
		//print $this->db->last_query();
	}
	
	public function update_image_exist($image,$data)	{
		$this->db->where('images_filename',$image);
		$this->db->update('tbl_images_search',$data);
		print $this->db->last_query();		
	}

	public function query_submit($email,$contact,$date)    {
		$data=array(
		'email'=>$email,
		'contact_number'=>$contact,
		'date'=>$date
		);
		$this->db->insert('tbl_query',$data);
	}

	public function submit_subscriber($email,$date)	{
		$data=array(
		'email_id'=>$email,          
		'date'=>$date
		);
		$this->db->insert('tbl_subscriber',$data);
	}

	public function insert_user_frame_details($data)	{
		$this->db->insert('tbl_user_frame_details',$data);
		return $this->db->insert_id();
	}

	public function update_user_frame_details($data,$user_id,$image_id)	{
		$this->db->where('image_id',$image_id);
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_user_frame_details',$data);
	}

    public function update_crt($data1,$user_id,$image_id)	{
        $this->db->where('image_id',$image_id);
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_cart',$data1);
    }

	public function update_customer($data)	{
	    $id=$this->session->userdata('userid');
		$this->db->where('customer_id',$id);
		$this->db->update('tbl_registration',$data);
	}

	public function update_qty_frame_for_cart($imgsize,$papersurface,$filenam,$qty,$frame_name,$mount_name,$glass)	{
		$id=$this->session->userdata('userid');
		$this->db->where('user_id',$id);
		$this->db->where('image_size',trim($imgsize));
		$this->db->where('image_print_type',trim($papersurface));
		$this->db->where('image_name',trim($filenam));
		$this->db->where('frame_color',$frame_name);
		$this->db->where('mount_color',$mount_name);
		$this->db->where('glass_type',$glass);
		$query=$this->db->update('tbl_cart',$qty);
		if($query){
			return 1;
		}	else{
			return 0;
		}
	}

	public  function check_frame_details($user_id,$image_id)	{
		$this->db->where('user_id',$user_id);
		$this->db->where('image_id',$image_id);
		$query=$this->db->get('tbl_user_frame_details');
		return $query->num_rows();
	}

	function canvas_frame_type($frame_type){
		//return  $frame_type;
		//$data['fr_type']=$frame_type;
		//$this->trans_canv=$frame_type;
		//$this->check_cart_details();
	}

	public  function check_cart_details($user_id,$image_id,$imagsTypes,$total_size,$frame_name,$mount_name,$glass)	{
		$this->db->where('user_id',$user_id);
		$this->db->where('image_id',$image_id);
		$this->db->where('image_print_type',trim($imagsTypes));
		$this->db->where('image_size',trim($total_size));
		if($frame_name!='')	{
			$this->db->where('frame_color',trim($frame_name));
			$this->db->where('mount_color',$mount_name);
			$this->db->where('glass_type',$glass);
		}
		$query=$this->db->get('tbl_cart');
		return $query->num_rows();//$user_id.','.$image_id.','.$imagsTypes.','.$total_size;
	}

	public function get_frame_values($frame_id)	{
		// $this->db->where('id',$image_id);
		//$query=$this->db->get('tbl_user_frame_details');
	}

	public function get_id($user_id,$image_id)	{
		$this->db->where('user_id',$user_id);
		$this->db->where('image_id',$image_id);
		$query=$this->db->get('tbl_user_frame_details');
		return $query->result();
	}

	//main frontend_model of mahattart by sajid

	public  function insert_into_cart($data2)	{
		$result = $this->db->insert('tbl_cart',$data2);
		return $result; 
	}
			
	public function update_qty_for_cart($imgsize,$papersurface,$filenam,$qty)	{
		$id=$this->session->userdata('userid');
		$this->db->where('image_size',trim($imgsize));
		$this->db->where('user_id',$id);
		$this->db->where('image_print_type',trim($papersurface));
		$this->db->where('image_name',trim($filenam));
		$query=$this->db->update('tbl_cart',$qty);
		if($query)	{
			return 1;
		}	else{
			return 0;
		}
	}


	public function get_web_price()	{
		$this->db->select('*');
		$this->db->where('quality','Smart');
		$this->db->where('paper','Hahnemuhle Photo Matte Fibre');
		//  $this->db->where('status','1');
		$query=$this->db->get('tbl_web_price');
		return $query->result(); 
	}

	public  function get_cart_details($user_id,$image_id,$imagsTypes,$total_size,$frame_name,$mount_name,$glass)	{
		$this->db->where('user_id',$user_id);
		$this->db->where('image_id',$image_id);
		$this->db->where('image_print_type',trim($imagsTypes));
		$this->db->where('image_size',trim($total_size));
		if($frame_name!='')	{
			$this->db->where('frame_color',$frame_name);
			$this->db->where('mount_color',$mount_name);
			$this->db->where('glass_type',$glass);
		}
		$query=$this->db->get('tbl_cart');
		return $query->result();
	}
	
	public function get_frame_data($image_id,$user_id)	{
		$this->db->where('user_id',$user_id);
		$this->db->where('image_id',$image_id);
		$query=$this->db->get('tbl_user_frame_details');
		return $query->row();
	}

	public function frame_detail($id)	{
		$this->db->select('*');
		$this->db->where('frame_id',$id);
		$query=$this->db->get('tbl_frame2');
		return $query->row();
	}

	public  function check_user_login_details($user_id)	{
		$this->db->where('user_id',$user_id);
		$query=$this->db->get('tbl_user_save_login');
		return $query->num_rows();
	}

	public  function check_user_login_sesion($user_id)	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$query=$this->db->get('tbl_user_save_login');
		return $query->result();
	}

	public function track_login_details($data)	{
		$this->db->insert('tbl_user_save_login',$data);
	}

    public function update_track_login_details($data1,$user_id)	{
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user_save_login',$data1);

    }
    
}
?>
