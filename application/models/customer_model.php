<?php

class Customer_model extends CI_Model

{

    function __construct()

    {

        $this->load->database();

    }
	


/************************2-1-2018*********************************/

public function create_location_id($verdor_types)
	{
	  $this->db->select_max('id');
      $this->db->where('vendor_types',$verdor_types);
      $query= $this->db->get('kiosk_users');
	 // print_r($query->result());
	  return $query->result();
	
	}
	
	
public function get_kiosk_details($id)
	{
	    $this->db->where('id',$id);
	    $query=$this->db->get('kiosk_users');
	   //print_r($query->result());
	   return $query->result();
	}

public function get_vendor_types_model()
	{
	  $get_vendor=$this->db->get('vendor_types');  
	  //print_r($get_vendor->result()); die();
	  return $get_vendor->result();
	}	
		


public function update_kiosk($id,$data2)
	{

	  
	     $this->db->set($data2);
         $this->db->where('id', $id);
         $this->db->update('kiosk_users');
	  
	   
    }


public  function add_kiosk_users_model($data)
	{
		
		$this->db->insert('kiosk_users',$data);
	
	}	
			







/************************ end 2-1-2018*********************************/


















	
		
	//27-12-2017
	
	
	
	public function get_query_data($vendor_types)
	{
		//echo $vendor_types;
		
		$this->db->distinct();
		$this->db->select('location');
		$this->db->where('vendor_types',$vendor_types);
		$query=$this->db->get('kiosk_users');
	   
	   return $query->result();
	   
	}
	
	
	public  function get_query_location_key($vendor_location)
	{
		
		  $this->db->select('*');
		  $this->db->where('location',$vendor_location);
	      $query=$this->db->get('kiosk_users');
	      return $query->result();
	  
		
	
	
	}
	
	
	
	
	
	//27-12-2017
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//22-12-2017
	
	
	
	public function add_to_customer_model($data2)
	{
	  $this->db->insert('tbl_customer',$data2);
	}
	
	
	public function get_promo_details($experience_value)
	{
		$this->db->select('*');
		$this->db->where('promo_name',$experience_value);
		$this->db->where('active','1');
		$query=$this->db->get('tbl_promo_code');
		return $query->result();
	
	}
	
	public function get_vendor_location_model($vendor_id)
	{
		//echo $vendor_id;
	  $this->db->select('*');
	  $this->db->where('vendor_id',$vendor_id);
	  $query=$this->db->get('tbl_vendor_location');
	  return $query->result();
	}
	

	
	  public function get_vendor_location_model2($location_id)
	   {
      $this->db->select('*');
	  $this->db->where('vendor_location_id',$location_id);   
	  $query=$this->db->get('tbl_locations_id');
	  return $query->result();
	  }
	
	
	
	
	
	
	public function view_kiosk_users_model()
	{
	 
	  $query=$this->db->get('kiosk_users');
	  return $query->result();
	}
	public function delete_kiosk_users_model($id)
	{
	  $this->db->where('id',$id);
	  $this->db->delete('kiosk_users');
	  
	}

	
	
	
	
	
	
	
	//22-12-2017
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function add_customer_query_mod($data)
    {
	
	 $query=$this->db->insert('tbl_customer_query',$data);
	 	  
	} 
	

    public function get_parent_customers()

    {

        $this->db->select('*');

        $this->db->where('customer_created_by','admin');

       // $this->db->where('customer_parent_id','0');

        $query = $this->db->get('tbl_customer');
		

        return $query->result_array();



    }

public function All_get_customers()
{
    
    $sql="select * from tbl_registration order by customer_id desc limit 0,20 ";
	
	return mysql_query($sql);

}


    public function get_customers_email()

    {

        $this->db->select('*');

        $query = $this->db->get('tbl_customer');

        return $query->result_array();

    }



    public function get_frontnback_customer()

    {

        $this->db->select('*');

        $this->db->where('customer_parent_id','');

        $this->db->or_where('customer_parent_id','0');

        $query = $this->db->get('tbl_customer');

        return $query->result_array();

    }



    public function check_existing_name($name)

    {

        $this->db->select('*');

        $this->db->where('company_name',$name);

        $this->db->where('customer_id','0');

        $query = $this->db->get('tbl_customer');

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
            $this->db->like('email_id',$mail);
           // $this->db->where('email_id',$mail);

        }

        if($city)

        {

            $this->db->where('city',$city);

        }

        if($customer_id){

            $this->db->where('customer_id',$customer_id);

        }

        

        if($region){

            $this->db->where('region',$region);

        }

        if($customer_name)

        {
            $this->db->like('first_name',$customer_name);
           // $this->db->where('first_name',$customer_name);

        }

        if($start_date)

        {

            $this->db->where('date_account_create >=',$start_date);

        }

        if($end_date)

        {

            $this->db->where('date_account_create <=',$end_date);

        }



        $query=$this->db->get('tbl_customer');

        if($query->result_array()){

            return $query->result_array();

        }

        else

        {

            return '-1';

        }



    }

    public function customer_search($limit,$start)

    {

        $this->db->limit($limit,$start);

        $this->db->select('*');

        $query=$this->db->get('tbl_customer');

        return $query->result_array();

    }

    public function record_count_customer()

    {

        $this->db->select('*');

        // $this->db->where('convert_to_invoice','0');

        //$this->db->or_where('convert_to_invoice','1');

        $query=$this->db->get('tbl_customer');

        return $query->num_rows();

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

            $this->db->where('region',$region);

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



        $query=$this->db->get('tbl_customer');

        return $query->num_rows();



    }



    public function update_customer($data,$id)

    {

        $this->db->where('id',$id);

        $this->db->update('tbl_customer',$data);

    }



    public function check_customer_email($email)

    {

        $this->db->select('*');

        $this->db->where('email_id',$email);

        $query=$this->db->get('tbl_customer');

        if($query->num_rows >'0')

        {

            return false;

        }

        else

        {

            return true;

        }



    }





    public function insert_customer($data)

    {

        $this->db->insert('tbl_customer',$data);

    }

    public function get_customer_data($id)

    {

        $this->db->select('*');

        $this->db->where('id',$id);

        $query = $this->db->get('tbl_customer');

        return $query->row();

    }

    public function get_customer_by_id($id)

    {

        $this->db->select('*');
        $this->db->like('customer_id',$id);
        $query = $this->db->get('tbl_customer');
        return $query->result_array();

    }
public function get_customers_type()

    {
    $this->db->distinct();
    $this->db->select('customer_type');
    $query = $this->db->get('tbl_customer');
    return $query->result_array();
}


    
    public function get_customers_company()

    {
    $this->db->distinct();
    $this->db->select('company_name');
    $query = $this->db->get('tbl_customer');
    return $query->result_array();
}  
 
  
	public function view_cutomer_query_mod()
	{
	  $this->db->order_by("id", "DESC");
	  $query=$this->db->get('tbl_customer_query');
	  return $query->result();
	}
	
	public function delete_cutomer_query_mod($id)
	{
	  $this->db->where('id',$id);
	  $this->db->delete('tbl_customer_query');
	 
	}
	
	public function get_customer_details($id)
      {
        $this->db->where('id',$id);
	    $query=$this->db->get('tbl_customer_query');
	    return $query->result();
      }
	  
	  public function update_customer_details($id,$data)
	  {
	 
	   $this->db->where('id',$id);
	   $result=$this->db->update('tbl_customer_query',$data);
        	  
	  }
  
    public function edit_customer_query_mode($id,$data)
      {
       
		$this->db->where('id',$id);
		$this->db->update('tbl_customer_query',$data);
  
      } 
    

}