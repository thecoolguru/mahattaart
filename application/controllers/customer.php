<?php
class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->library('pagination');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('backend_model');
        $this->load->model('customer_model');
        $this->load->model('search_model');
        $this->load->model('channel_partner_model');
        $this->load->database();
    }

    public  function customer_download()
    {
      
        
        function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

  // filename for download
  $filename = "Customer_data_".".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  $flag = false;
  $result = mysql_query("SELECT customer_id, first_name, last_name, email_id, customer_type, industry, selected_industry, relation_manager, account_type, registered_from, vender_contract, gender, address, country, state, company_name, contact, city, region, purpose, zip_code, customer_created_by,date_account_create FROM tbl_customer");
  $Query=  mysql_query($select);;
  while(false !== ($row = mysql_fetch_assoc($result))) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, 'cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }
  exit;
        
        
        
    }
	public function add_customer()
    { 
	$this->load->view('backend/dashboard_header');
        $this->load->view('backend/customer/add_customer');
        $this->load->view('backend/footer');
		}
    public function add_customer_final()
    {  
	//$customer_type=$this->input->post('customer_type');
	//print_r($customer_type);die;
        if($this->session->userdata('userid'))
    {
	
        $data['msg']="";
		//print_r($data);die;
         $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('fname','Name','required');
        $this->form_validation->set_rules('lname','Last Name','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('country','Country','required');
        $this->form_validation->set_rules('state','State','required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('pincode','Pincode','required');
        $this->form_validation->set_rules('region','Region','required');
        $this->form_validation->set_rules('contact','Contact','required');
        
  
//echo $this->input->post('customer_type');
 if($this->input->post('customer_type')=='B2B')
 {
      
    if($this->input->post('occupation')=='Hospitality')
    {
        
     ////// Hospitality//////////
        
        $hospitality=$this->input->post('hospitality');
        if($hospitality)
        {
          for($i=0;$i<=count($hospitality);$i++)
          {
             $selecthospitality.=  $hospitality[$i].',';
          }
        }elseif($this->input->post('Other_industry')){
           $selecthospitality= $this->input->post('type_industry'); 
         } 
      }   // end if condtion of hospitality
    if($this->input->post('occupation')=='Hotel')
        {
                ////// Hotel//////////
       $selecthotel= $this->input->post('hotel');
       if($selecthotel){
         for($i=0;$i<=count($selecthotel);$i++)
          {
             $selectedhotel.=  $selecthotel[$i].',';
          }
       }elseif($this->input->post('Other_star')){
           $selectedhotel= $this->input->post('other_starotoption'); 
         }     
        }// end if condtion of hotel
 
    if($this->input->post('occupation')=='Restaurant')
        {
                ////// Restaurant//////////
          $selectRestaurant= $this->input->post('Restaurant');
         for($i=0;$i<=count($selectRestaurant);$i++)
          {
             $selectedhotelRestaurant.=  $selectRestaurant[$i].',';
          }
                    
     }// end if condtion of Restaurant

    if($this->input->post('occupation')=='Other')
    {
         $Indusry = $this->input->post('otherIndusry');   
    }
    
    
    

 }/// end if condition B2B 
//echo $selectRestaurent;
if($selectedhotelRestaurant<>'')
{
    $Indusry=  $selectedhotelRestaurant; 
}elseif($selectedhotel<>'')
{
       $Indusry=  $selectedhotel; 
}      
elseif($selecthospitality<>'')
{
       $Indusry=  $selecthospitality; 
}
 $Indusry;

         //die;
         $b2cp=$this->input->post('customer_type');
		 
		 
         if($this->input->post('customer_type')=='B2CP')
        {
		//echo "yes b2cp";die;
//die('mohan');
          if($this->form_validation->run()==false){
            $data=array(
                    'customer_id'=>$this->input->post('customer_id'),
                    'first_name'=>$this->input->post('fname'),
                    'last_name'=>$this->input->post('lname'),
                    'email_id'=>$this->input->post('email'),
                    'customer_type'=>$this->input->post('customer_type'),
                    'industry'=>$this->input->post('occupation'),
                    'selected_industry'=>$Indusry,
                    'relation_manager'=>$this->input->post('relationshipmanage'),
                    'account_type'=>$this->input->post('account_type'),
                    'registered_from'=>$this->input->post('Registered_from'),
                    'vender_contract'=>$this->input->post('vender_contract'),
                     'password'=>$this->input->post('password'),
                     'gender'=>$this->input->post('gender'),
                     'address'=>$this->input->post('address'),
                    'country'=>$this->input->post('country'),
                    'state'=>$this->input->post('state'),
                    'city'=>$this->input->post('city'),
                    'region'=>$this->input->post('region'),
                    'company_name'=>$this->input->post('company_name'),
                    'contact'=>$this->input->post('contact'),
                    'purpose'=>$this->input->post('purpose'),
                    'zip_code'=>$this->input->post('pincode'),
                    'customer_created_by'=>'admin','date_account_create'=>date('y:m:d h:m:s'),
                    /*'company_type'=>$this->input->post('company_type')*/ 
                     'status'=>'1');
					 $this->customer_model->insert_customer($data);
                $data['msg']="Customer Has Been Successfully Added.";
				$data['msg_for_b2cp']="b2cp";
				}
					 }

		   
		   //end by sajid
         
         
         
        if($this->form_validation->run()==true)
        {
		//echo "not b2cp";die;
//die('mohan');

            $data=array(
                    'customer_id'=>$this->input->post('customer_id'),
                    'first_name'=>$this->input->post('fname'),
                    'last_name'=>$this->input->post('lname'),
                    'email_id'=>$this->input->post('email'),
                    'customer_type'=>$this->input->post('customer_type'),
                    'industry'=>$this->input->post('occupation'),
                    'selected_industry'=>$Indusry,
                    'relation_manager'=>$this->input->post('relationshipmanage'),
                    'account_type'=>$this->input->post('account_type'),
                    'registered_from'=>$this->input->post('Registered_from'),
                    'vender_contract'=>$this->input->post('vender_contract'),
                     'password'=>$this->input->post('password'),
                     'gender'=>$this->input->post('gender'),
                     'address'=>$this->input->post('address'),
                    'country'=>$this->input->post('country'),
                    'state'=>$this->input->post('state'),
                    'city'=>$this->input->post('city'),
                    'region'=>$this->input->post('region'),
                    'company_name'=>$this->input->post('company_name'),
                    'contact'=>$this->input->post('contact'),
                    'purpose'=>$this->input->post('purpose'),
                    'zip_code'=>$this->input->post('pincode'),
                    'customer_created_by'=>'admin','date_account_create'=>date('y:m:d h:m:s'),
                    /*'company_type'=>$this->input->post('company_type')*/ 
                     'status'=>'1');

           // print_r($data);die;
		   //start by saji
		      $name_valid=$this->customer_model->check_existing_name($this->input->post('company_name'));
            $mail_valid=$this->customer_model->check_customer_email($this->input->post('email'));


//              if($this->input->post('password')!=$this->input->post('new_password')) 
//              {
//                  $data['msg']="Enter password not match ";
//              }

            if($mail_valid && $name_valid)
            {
                $this->customer_model->insert_customer($data);
                $data['msg']="Customer Has Been Successfully Added.";
            }

            else if(!$mail_valid && $name_valid)
            {
                $data['msg']="Customer Email Id Has Been Used.";

            }
            else if($mail_valid && !$name_valid)
            {
                $data['msg']="Company Name Has Been Used.";
            }
            else if(!$mail_valid && !$name_valid)
            {
                $data['msg']="Customer Email and Company Name Have Been Used.";
            }
            else
            {
                $data['msg']="";
            }


        }
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/customer/add_customer',$data);
        $this->load->view('backend/footer');
    }
    else
    {
        header('location:index');
    }
    }


    public function get_parent_customer_detail()
    {  $id= $this->input->post('customer_id');
        $data=$this->customer_model->get_customer_data($id);
        print($data->company_name.'/'.$data->company_type);
    }


    public function edit_customer($id)
    {
        $data['msg']="";
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('fname','Name','required');
         if($this->input->post('occupation')=='Other')
         {
             $industry=$this->input->post('industry');
         }else{
              $industry=$this->input->post('occupation');
             
         }
        
        if($this->form_validation->run()==true)
        {
            $data=array(
                    'first_name'=>$this->input->post('fname'),
                    'last_name'=>$this->input->post('lname'),
                    'email_id'=>$this->input->post('email'),
                    'industry'=>$industry,
                     'gender'=>$this->input->post('gender'),
                     'address'=>$this->input->post('address'),
                    'country'=>$this->input->post('country'),
                    'state'=>$this->input->post('state'),
                    'city'=>$this->input->post('city'),
                    'region'=>$this->input->post('region'),
                    'company_name'=>$this->input->post('company_name'),
                    'contact'=>$this->input->post('contact'),
                    'purpose'=>$this->input->post('purpose'),
                    'zip_code'=>$this->input->post('pincode'),'date_account_last_update'=>date('y:m:d h:m:s'));
            $this->customer_model->update_customer($data,$id);
            $data['msg']="Successfully Changed";

        }
        $data['customer']=$this->customer_model-> get_customer_data($id);
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/customer/edit_customer',$data);
        $this->load->view('backend/footer');
    }
    public function send_mails_customers()
    {
        if($this->session->userdata('userid'))
        {
            $data['msg']="";
            $this->form_validation->set_rules('emails','Email','required');
            $this->form_validation->set_rules('msg-mail','MSG','required');
            if($this->form_validation->run()==true)
            {
                if($this->input->post('emails'))
                {
                    $mails= explode(',',$this->input->post('emails'));
                    for($i=0;$i<count($mails);$i++)
                    {
                        $this->email->from('admin@wallsnart.com', 'Wallsnart');
                        $this->email->to($mails[$i]);
                        $this->email->subject($this->input->post('sbj'));
                        $this->email->message($this->input->post('msg-mail'));
                        $this->email->send();
                        $data['msg']="Mail Has been Sent Successfully";
                    }
                }
            }

            $this->load->view('backend/dashboard_header');
            $this->load->view('backend/customer/send_mails_customers',$data);
            $this->load->view('backend/footer');
        }
        else
        {
            redirect('backend/index');
        }
    }

    public function customer_emails()
    {
        $customer_id=$this->input->post('customer_id');
        $data=$this->customer_model->get_customer_by_id($customer_id);
        foreach($data as $mails)
        {
            print $mails['email_id'].',';

        }
    }

    public function view_customers()
    {
//        if($this->session->userdata('userid'))
//        {

            $customer_type=$this->input->get('cust_type');
			//print_r($customer_type);die;
            $status=$this->input->get('status');
            $company=$this->input->get('company');
            $mail=$this->input->get('mail');
            $city= $this->input->get('city');
            $customer_id=$this->input->get('cust_id');
            $account_type=$this->input->get('acc_type');
            $region=$this->input->get('region');
            $customer_name=$this->input->get('cust_name');
            $start_date=$this->input->get('start');
            $end_date=$this->input->get('end');
            $data['customer']="";
              $data['rows_data']=$this->customer_model->All_get_customers();
			  
            if($customer_type||$status||$company||$mail||$city||$customer_id||$account_type||$region||$customer_name||$start_date||$end_date)
            {
                $config['base_url'] = base_url().'index.php/customer/view_customers?cust_type=' .$customer_type . '&status=' .$status . '&company=' .$company .'&mail=' .$mail. '&city=' .$city .'&cust_id=' .$customer_id. '&acc_type='.$account_type . '&region=' .$region. '&cust_name=' .$customer_name. '&start=' .$start_date . '&end=' .$end_date;
                $config['total_rows'] =$this->customer_model->count_rows_customer_search($customer_type,$status,$company,$mail,$city,$customer_id,$account_type,$region,$customer_name,$start_date,$end_date);
                $config['per_page'] =2;
                $config['page_query_string'] = TRUE;
                $this->pagination->initialize($config);
                if($this->input->get('per_page'))
                {
                    $page=$this->input->get('per_page');
                }
                else
                {
                    $page=0;
                }
                $data['customer']=$this->customer_model->get_customer_bysearch($customer_type,$status,$company,$mail,$city,$customer_id,$account_type,$region,$customer_name,$start_date,$end_date,$config['per_page'],$page);
                $data['links']=$this->pagination->create_links();
                $data['total_customer']=$config['total_rows'];
            }
            else
            {
                $config['base_url'] = base_url().'index.php/customer/view_customers';
                $config['total_rows'] = $this->customer_model->record_count_customer();
                $config['per_page'] = 4;
                $config["uri_segment"] = 3;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
                $data['customer']=$this->customer_model->customer_search($config['per_page'],$page);
                $data['links']= $this->pagination->create_links();
                $data['total_customer']=$this->customer_model->record_count_customer();
            }
           
		   //print_r($data);die;
            $this->load->view('backend/dashboard_header');
            $this->load->view('backend/customer/view_customers',$data);
            $this->load->view('backend/footer');
//        }
//        else
//        {
//            redirect('backend/index');
//        }
   }

}