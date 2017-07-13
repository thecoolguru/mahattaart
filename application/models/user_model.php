<?php 
class User_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}
	public function get_user_details($user_id)
	{
		$this->db->select('*');
		$this->db->where('customer_id',$user_id);
		$query=$this->db->get('tbl_registration');
		return $query->row();
	}

	function update_user_detail($data,$userid)
	{

	$this->db->where('customer_id',$userid);
	$this->db->update('tbl_registration',$data);	
	}


// starts shortlisted from beta.mahaattart by sajid

public function order_details_of_history($order_id){
    //echo $order_id;die;
	$this->db->select('*');
	$this->db->where('invoice_id',$order_id);
	$this->db->order_by('sr_id','asc');
	$query=$this->db->get('tbl_invoice_details');
	return $query->result();
	

	
	}
public function get_tracking_id($sub_tracking_id,$order_id){
//echo $sub_tracking_id.$order_id;
//$id=$this->session->userdata('userid');
$this->db->select('*');
$this->db->where('sub_tracking_id',$sub_tracking_id);
$this->db->where('order_id',$order_id);
//$this->db->order_by('sub_tracking_id','asc');
	$query=$this->db->get('order_courier_status');
	return $query->result();

}




// Ends shortlisted from beta.mahaattart by sajid

	function update_user_password($passwordnew,$email)
	{
  // echo $passwordnew.'and'.$email;die;
   $data=array('password'=>$passwordnew
   
   );
  //  $this->db->set('password',$passwordnew);
	$this->db->where('email_id',$email);
	$this->db->update('tbl_registration',$data);	
   
	}
	
}
?>