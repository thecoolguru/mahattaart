<?php
ob_start();
class Cart_model extends CI_Model

{

	function __construct(){
		$this->load->database();
	}

	function add_cart($data1){
		$this->db->insert('tbl_cart',$data1);
	}

	function get_usercart($user_id)
	{

	 $this->db->select('*');
     $this->db->where('user_id',$user_id);
     $this->db->order_by('cart_id',"desc");
	 $query=$this->db->get('tbl_cart');
	 
	 //echo '<pre>',var_dump($query->result_array()),'</pre>';
	 
	 return $query->result_array();
	}
		
	function update_serail_noforcart($user_id,$i,$cart_id,$tax_prctg,$tax_amt_fnl,$total_amt_product_fnl,$hsn_code,$dis_amt,$old_price){
	$data=array('sr_no'=>$i,'tax_goods'=>$tax_prctg,'tax_amount'=>$tax_amt_fnl,'grand_price'=>$total_amt_product_fnl,'hsn_code'=>$hsn_code,'updated_promo_price'=>$dis_amt,'old_price_updated'=>$old_price);
	$this->db->where('user_id',$user_id);
	$this->db->where_in('cart_id',$cart_id);
	$query=$this->db->update('tbl_cart',$data);
	return $query;
	}

    function order_id_update_for_cart($data,$user_id){
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_cart',$data);
	}

    function get_images_datails($images_id){
			$this->db->select('*');
			$this->db->where('images_id',$images_id);
			$query=$this->db->get('tbl_images_search');
			return $query->result_array();
	}

	function get_userDetails($userid)
	{
            $sql_1="select * from tbl_customer where customer_id='".$userid."' ";
            $Query=  mysql_query($sql_1);
            return $result = mysql_fetch_object($Query);
    }

         public function update_crt($data1,$cart_id){
			$this->db->where('cart_id',$cart_id);
			$this->db->update('tbl_cart',$data1);
		}

        

		function count_cart_byid($user_id){ 
			$this->db->select('*');
			$this->db->where('user_id',$user_id);
			$query=$this->db->get('tbl_cart');
			return $query->result_array();
		}

		function update_cart($data,$row_id){
			$this->db->where('cart_id',$row_id);
			$this->db->update('tbl_cart',$data);
		}

		function update_cart_byrow($data,$row_id){
			$this->db->where('row_id',$row_id);
			$this->db->update('tbl_cart',$data);
		}

	    function User_remove_cart($row_id,$cart_id){
			$this->db->where('cart_id',$cart_id);
			$this->db->where('user_id',$row_id);
			$this->db->delete('tbl_cart');   
        }
	
		public function get_cart_user_details($user_id){
			$this->db->select('*');
			$this->db->where('customer_id',$user_id);
			$query=$this->db->get('tbl_registration');
			return $query->result(); 
		}
		
		function remove_cart($cart_id){
			$this->db->where('user_id',$cart_id);
			$this->db->delete('tbl_cart');
		}

		function remove_cart_byrowid($row_id){
			$this->db->where('row_id',$row_id);
			$this->db->delete('tbl_cart');
		}

		function get_cart_byemail($email){
			$this->db->select('*');
			$this->db->where('email',$email);
			$query=$this->db->get('tbl_cart');
			return $query->result_array();
		}

		public function cart_valid($userid,$img_id,$price,$size,$print_type){
			$this->db->select('*');
			$this->db->where('user_id',$userid);
			$this->db->where('image_id',$img_id);
            $this->db->where('price',$price);
			$this->db->where('image_size',$size);
            $this->db->where('image_print_type',$print_type);
			$query=$this->db->get('tbl_cart');
		   if($query->num_rows() > 0){
			   return true;
		   }else{
			   return false;
		   }
		}

		public function cart_valid_byemail($email,$image_id){
			$this->db->select('*');
			$this->db->where('email',$email);
			$this->db->where('image_id',$img_id);
			$query=$this->db->get('tbl_cart');
			if($query->num_rows() > 0){
			   return true;
		   }else{
			   return false;
		   }
		}

		public function check_image_existence($user_id,$img_id,$price,$size,$print_type){  
			$this->db->select('*');
			$this->db->where('user_id',$user_id);
			$this->db->where('image_id',$img_id);
			$this->db->where('price',$price);
			$this->db->where('image_size',$size);
			$this->db->where('image_print_type',$print_type);
			$query=$this->db->get('tbl_cart');
			if($query->num_rows()>'0'){
			   return '2';
		   }else{
			return '1';
		   }
		}
		public function get_tbl_promo_code(){
	$this->db->select('*');
	//$this->db->where('active','1');
	$this->db->where_not_in('valid_days','8');
	$query=$this->db->get('tbl_promo_code');
	return $query->result();
	
	
	}
	function validate_apply_coupon($apply_coupon){
		//echo $apply_coupon;
		$this->db->select('*');
	$this->db->where('promo_name_code',trim($apply_coupon));
	$query=$this->db->get('tbl_promo_code');
	return $query->result();
		
		}

	public function get_cart($user_id){
        $this->db->select('*');
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('tbl_cart');
        return $query->result();
    }

    

    public  function check_user_login_details($user_id){
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('tbl_user_save_login');
        return $query->num_rows();
    }

    

    public function track_login_details($data){ 
         $this->db->insert('tbl_user_save_login',$data);
   }

    public function update_track_login_details($data1,$user_id)

    {

        $this->db->where('user_id',$user_id);

        $this->db->update('tbl_user_save_login',$data1);



    }

}