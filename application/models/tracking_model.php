<?php 
class Tracking_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}
 
public  function check_user_login_details($user_id)
    {
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('tbl_user_save_login');
        return $query->num_rows();
    }
    
    public function track_login_details($data)
        { 
        
         $this->db->insert('tbl_user_save_login',$data);
        }
    public function update_track_login_details($data1,$user_id)
    {
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user_save_login',$data1);

    }
} 
    ?>