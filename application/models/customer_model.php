<?php

class Customer_model extends CI_Model

{

    function __construct()

    {

        $this->load->database();

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

    
    

}