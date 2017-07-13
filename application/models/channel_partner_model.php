<?php 
class Channel_partner_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}

public function insert_channel_partner($data)
	{
		$this->db->insert('tbl_channel_partner_details',$data);
	}
	
	
	public function count_channelpartner()
{
	$this->db->select('*');
	$this->db->where('access_level','2');
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->num_rows();
}
/*-----starting-------------------------ankita-----------------------------------------------------------------*/
    public function get_channel_partner_detail()
    {
        $this->db->select('*');
        $query=$this->db->get('tbl_channel_partner_details');
	 return $query->result();
     }

    public function get_online_images($cp_id)
   {
     $this->db->select('*');
     $this->db->where('images_photographer',$cp_id);
     $query=$this->db->get('tbl_images_search');
     
     if($query->num_rows()>'0')
     return $query->num_rows();
     else 
     return '0';
    }
public function add_content_in_loop_details($data)
{
 $this->db->insert('tbl_content_in_loop',$data);
  
}
public function get_max_value_inserted()
{
 $this->db->select_max('serial_no');
$query =$this->db->get('tbl_content_in_loop');
return $query->row();
 
}
public function get_max_value_inserted_channel_partner()
{
$this->db->select_max('channel_partner_id');
$query =$this->db->get('tbl_channel_partner_details');
return $query->row();

}
public function add_commission_details($data)
{
$this->db->insert('tbl_channel_partner_commission',$data);
}
public function view_content_in_loop_details()
{
$this->db->select('*');
$query=$this->db->get('tbl_content_in_loop');
return $query->result_array();
}
public function get_commission_details($sub_status)
{
 $this->db->select('*');
 $this->db->where('submission_status_no',$sub_status);
 $query=$this->db->get('tbl_channel_partner_commission');
 return $query->row();
}
public function commission_details_for_specific_id($id)
{
$this->db->select('*');
 $this->db->where('channel_partner_id',$id);
 $query=$this->db->get('tbl_channel_partner_commission');
 return $query->row();

}
public function update_commission($data2,$id)
{
 $this->db->where('channel_partner_id',$id);
 $this->db->update('tbl_channel_partner_commission',$data2);
}
public function check_commission_status($id)
{
 $this->db->select('*');
$this->db->where('channel_partner_id',$id);
$query=$this->db->get('tbl_channel_partner_commission');
if($query->num_rows()>'0')
return true;
else return false;
}
/*----------ending-----------------------ankita---------------------------------------------------------------*/
public function get_channelpartner($limit,$start)
{  
    $this->db->limit($limit,$start);
	$this->db->select('*');
	$this->db->where('access_level','2');
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->result_array();
}
public function channelpartner($id)
{
	$this->db->select('*');
	$this->db->where('channel_partner_id',$id);
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->row();
}
public function check_channel_partner($name)
{
	$this->db->select('*');
	$this->db->where('channel_partner_name',$name);
	$query=$this->db->get('tbl_channel_partner_details');
	if($query->num_rows()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}
public function get_cp_id($parent_id)
{
	$this->db->select('cp_id');
	$this->db->where('channel_partner_id',$parent_id);
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->row();
}

public function updateCp($data,$id)
{
	$this->db->where('channel_partner_id',$id);
	$this->db->update('tbl_channel_partner_details',$data);

}

 public  function update_cp_img_search($data5,$id)
    {$this->db->where('images_photographer',$id);
        $this->db->update('tbl_images_search',$data5);
    }

public function changepassword($pwd,$id)
{
	$data=array('password'=>$pwd);
	$this->db->where('channel_partner_id',$id);
	$this->db->update('tbl_channel_partner_details',$data);

}

public function checkpassword($id)
{
	$this->db->select('password');
	$this->db->where('channel_partner_id',$id);
	$query=$this->db->get('tbl_channel_partner_details');
    return $query->row();
	
}
public function check_email($email)
{
	$this->db->select('*');
	$this->db->where('email_id',$email);
	$query=$this->db->get('tbl_channel_partner_details');
	if($query->num_rows()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}


public function get_parent_channelpartner()
{
	$this->db->select('*');
	$this->db->where('parent_partner_id','0');
	$this->db->where('access_level','2');
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->result_array();
}

public function get_cpid($cpid)
{
    $this->db->select('*');
    $this->db->where('cp_id',$cpid);
    $this->db->where('parent_partner_id','0');
    $query=$this->db->get('tbl_channel_partner_details');
    if($query->num_rows()>0)
    {
        return true;
    }
    else
    {
        return false;
    }
   
   
}

public function get_channel_partner()
{
	$this->db->select('*');
	$this->db->where('access_level','2');
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->result_array();
}

public function partner_byinterest($interest)
{
	$this->db->select('*');
	$this->db->where('access_level','2');
	$this->db->like('area_of_interest', $interest);	
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->result_array();
}

public function get_partner_byemail($email)
{
	$this->db->select('*');
	$this->db->where('access_level','2');
	$this->db->like('email_id', $email);	
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->result_array();
}

public function get_partner_bystatus($status)
{
	$this->db->select('cp_id');
	$this->db->where('access_level','2');
	$this->db->where('parent_partner_id','0');
	if($status!='-1')
	{
	$this->db->where('status',$status);
	}
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->result_array();
	
}

public function get_active_images($userid,$limit,$start,$status)
{   $this->db->limit($limit,$start);
	$this->db->select('*');
	$this->db->where('channel_partner_id',$userid);
	if($status!='-1')
	{
	$this->db->where('images_status',$status);
	}
	$this->db->join('tbl_channel_partner_details', 'tbl_images_search.images_photographer = tbl_channel_partner_details.cp_id');
	$query=$this->db->get('tbl_images_search');
	return $query->result_array();
}

public function count_images($userid,$status)
{  	$this->db->select('*');
	$this->db->where('channel_partner_id',$userid);
	
     if($status!='-1')
	{
	$this->db->where('images_status',$status);
	}

	$this->db->join('tbl_channel_partner_details', 'tbl_images_search.images_photographer = tbl_channel_partner_details.cp_id');
	$query=$this->db->get('tbl_images_search');
	return $query->num_rows();
}

public function get_cp_image($userid,$limit,$start)
{
	 $this->db->limit($limit,$start);
	$this->db->select('images_uploaded_date,images_active_date');
	$this->db->where('channel_partner_id',$userid);
	//$this->db->order_by("images_uploaded_date", "desc"); 
	$this->db->group_by("images_uploaded_date");
	$this->db->join('tbl_channel_partner_details', 'tbl_images_search.images_photographer = tbl_channel_partner_details.cp_id');
	$query=$this->db->get('tbl_images_search');
	return $query->result_array();
	
}

public function get_image_bydate($date)
{
	$this->db->select('*');
	$this->db->where('images_uploaded_date',$date);
	$query=$this->db->get('tbl_images_search');
	return $query->num_rows();
}

public function get_activeimage_bydate($date)
{
	$this->db->select('*');
	$this->db->where('images_uploaded_date',$date);
	$this->db->where('images_status','1');
	$query=$this->db->get('tbl_images_search');
	return $query->num_rows();
}

public function count_cp_images($userid)
{
	
	$this->db->select('images_uploaded_date');
	$this->db->where('channel_partner_id',$userid);
	//$this->db->order_by("images_uploaded_date", "desc"); 
	$this->db->group_by("images_uploaded_date");
	$this->db->join('tbl_channel_partner_details', 'tbl_images_search.images_photographer = tbl_channel_partner_details.cp_id');
	$query=$this->db->get('tbl_images_search');
	return $query->num_rows();
	
}

public function get_all_email_byparent($parent_id)
{	
	$this->db->select('email_id');
	$this->db->where('channel_partner_id',$parent_id);
	$this->db->or_where('parent_partner_id',$parent_id);
	$query=$this->db->get('tbl_channel_partner_details');
	return $query->result_array(); 
}
}	