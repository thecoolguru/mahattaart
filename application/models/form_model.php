<?php
class Form_model extends CI_Model
{
  
  public function __construct()
  {
   $this->load->database();
  }
  
  public function add_form($data)
  { 
	  
	  $this->db->insert('tbl_query_form',$data);
  }
  public function get_record()
  {
   
   $this->db->order_by('id', 'DESC');
   $query=$this->db->get(' tbl_query_form');
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
  
   
  
}


?>