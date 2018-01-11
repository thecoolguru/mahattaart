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
	
	  //22-12-2017
	  
	  public function get_kiosk_id()
	{
	  $verdor_types=$this->input->post($verdor_types);
	  $result['success']=$this->customer_model->get_vendor_types_model($verdor_types);

	}
public function get_kiosk_users_details()
	{
		$location=$this->input->post('location');
		
		if($location!='location'){
		$vendor_id=$this->input->post('verdor_id');
        $re= $this->customer_model->get_vendor_location_model($vendor_id);
		
		echo '<option value="">'.'Select Location'.'</option>';
		for($i=0;$i<count($re);$i++){
		echo '<option value="'.$re[$i]->id.'">'.$re[$i]->location_name.'</option>';
		}
		
		
		}else{
		
		$vendor_id=$this->input->post('verdor_id');
        $re2= $this->customer_model->get_vendor_location_model2($vendor_id);
		//print_r($re2);
		echo '<option value="">'.'Select Location Key Id'.'</option>';
		for($i=0;$i<count($re2);$i++){
		echo '<option value="'.$re2[$i]->id.'">'.$re2[$i]->location_key.'</option>';
		}
		}
		
		
		
	}
	
	public function get_peromotion_codes()
	{
		
		$experience_value=$this->input->post('value');
		
		$get_promo=$this->customer_model->get_promo_details($experience_value);
		
		echo '<option>'.'Select Coupon code.'.'</option>';
		foreach($get_promo as $r2){
			?>
       <option value="<?php  echo $r2->promo_name_code;?>"><?php  echo$r2->promo_name_code; ;?></option>
            
            <?php
		}
		
	}
	
	public function add_kiosk_users()
	{
	   $id=$this->uri->segment(3);
	   $this->form_validation->set_rules('verdor_types','Vendor Types','required');
	   $this->form_validation->set_rules('person_name','Person Name','required');
       $this->form_validation->set_rules('person_mobile','Person Mobile','required');
       $this->form_validation->set_rules('person_email','Person Email','required|valid_email');
	   $verdor_types=$this->input->post('verdor_types');
	   $location=$this->input->post('location');
	   $person_name=$this->input->post('person_name');
	   $person_mobile=$this->input->post('person_mobile');
	   $person_email=$this->input->post('person_email');
	  //get Last id of table 
	   $result=$this->customer_model->create_location_id($verdor_types);
	
		  $lastInsertedUId=$result[0]->location_id;
		  
		 // echo $lastInsertedUId; die();		  
		  #$location_id2=$ki.$uid;
		  if($verdor_types=='kiosk')
		  {
			  if($lastInsertedUId == null) {
				  $currentLocationId = "KI0001";
			  } else {
				  $ki='KI0000';
				  $lastUId = intval(str_replace("KI","", $lastInsertedUId));
				  $currentUId = $lastUId + 1;
				  $length = strlen($currentUId);
				  $subKi = substr($ki,0,-$length);
				  $currentLocationId = $subKi.$currentUId;
			  }
		  }
		  if($verdor_types=='sis')
		  {
			  if($lastInsertedUId == null) {
				  $currentLocationId = "SIS0001";				  
			  } else {
				  $sis='SIS0000';
				  $lastUId = intval(str_replace("SIS","", $lastInsertedUId));
				  $currentUId = $lastUId + 1;
				  $length = strlen($currentUId);
				  $subKi = substr($sis,0,-$length);
				  $currentLocationId = $subKi.$currentUId;
			  }
		  }	  
	
	    $data=array(
	               'vendor_types'=>$verdor_types,
				   'location'=>$location,
				   'location_id'=>$currentLocationId,
				   'person_name'=>$person_name,
				   'person_mobile'=>$person_mobile,
				   'person_email'=>$person_email,
	         );
	  if($this->form_validation->run()==FALSE)
	  {
		   $experience_value=$this->input->post('value');
		   $result['get_details']=$this->customer_model->get_kiosk_details($id);
		   $result['get_vendor']=$this->customer_model->get_vendor_types_model();
		   $this->load->view('backend/dashboard_header');
           $this->load->view('backend/customer/kiosk_register',$result);     
           $this->load->view('backend/footer');
	  }else{
		  
		  $result['get_vendor']=$this->customer_model->get_vendor_types_model();
		 //UPDATE
		  if($id!='')
		  {
			  
			  	    $data2=array(
	               'vendor_types'=>$verdor_types,
				   'location'=>$location,
				   'person_name'=>$person_name,
				   'person_mobile'=>$person_mobile,
				   'person_email'=>$person_email,
	                 );
			$this->customer_model->update_kiosk($id,$data2);
			 redirect('index.php/customer/view_kiosk_users');
		  }else{
		  $result['record_added']=$this->customer_model->add_kiosk_users_model($data);	  
		  $result['record_message']="Record Successfully Added";
	      $result['record_failed']="Record Not Added,Please Check";
		  $this->load->view('backend/dashboard_header');
		  $this->load->view('backend/customer/kiosk_register',$result);     
          $this->load->view('backend/footer');
		  }
   }
	
	
	
	
		
	}
	
	
	public function view_kiosk_users()
	{
		$result=array();
		$result['success']=$this->customer_model->view_kiosk_users_model();
	    $this->load->view('backend/dashboard_header');
        $this->load->view('backend/customer/view_kiosk_list',$result);     
        $this->load->view('backend/footer');
	}
	
	public function update_kiosk_users($id)
	{
	  echo "EWecleme";  
	}
	
	public function delete_kiosk_users($id)
	{
		$result['deleted']=$this->customer_model->delete_kiosk_users_model($id);
		redirect('index.php/customer/view_kiosk_users');
	}
	

	  
	  
	  
	  
	  
	  
	  
	  //22-12-2017
	  
	  public function add_customer_query($id)
       {
		  
    	 $query['get_vendor']=$this->customer_model->get_vendor_types_model();
		 $experience=$this->uri->segment(5);
		 $query['promo_codes']=$this->customer_model->get_promo_details($experience); 
		 
		//$query['query_data']=$this->customer_model->get_query_data();
	    //print_r($get_data['query_data']);
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('mobile','Mobile','required|numeric|exact_length[10]');
		$this->form_validation->set_rules('pinterest','Product Interest','required');
		
		
		
		$vendor_types=$this->input->post('vendor_types');
		$vendor_location=$this->input->post('vendor_location');
		$vendor_location_id=$this->input->post('vendor_location_id');
		//echo $vendor_location_id; die();
		//$vendor_location_id_hidden=$this->input->post('vendor_location_id_hidden');
			
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$gender=$this->input->post('gender');
		$pinterest=$this->input->post('pinterest');
		$addlocation=$this->input->post('added_locaion');
		$feadback=$this->input->post('feadback');
		$experience=$this->input->post('experience');
		$active_coupon=$this->input->post('active_coupon');
		$bill_no=$this->input->post('bill_no');
     		
		$customer_register=$this->input->post('customer_register');
		
	if($id!='')
		  {
		 $query['kiosk_location']=$this->customer_model->get_kiosk_location($id);
		 $query['customer_details']=$this->customer_model->get_customer_details($id);
		  }
	       if($this->form_validation->run()==true)
		   {
			
			  $data=array(
		                'vendor_types'=>$vendor_types,
						'location'=>$vendor_location,
						'vendor_location_key_id'=>$vendor_location_id,   
					    'customer_name'=>$name,
	                    'customer_email'=>$email,
	                    'customer_mobile'=>$mobile,
						'gender'=>$gender,
	                    'cutomer_interest'=>$pinterest,
	                    'cutomer_feadback'=>$feadback,
						'experience'=>$experience,
						'active_coupon'=>$active_coupon,
						'bill_no'=>$bill_no,
						'customer_register'=>$customer_register
				  
				   );
				   
				   
				  /****Create seqence id**/   
				  $get_customer_last_id=$this->customer_model->get_cutomer_last_id();
				  $last_id=$get_customer_last_id[0]->customer_id;
				  $ki='MA00';				  
				  $lastUId = intval(str_replace("MA","",$last_id));
				  $currentUId = $lastUId + 1;	
				  $final_id=$ki.$currentUId;	
				 // echo $final_id; die();	 
				   
				   
				   $submit_from="c_q_f"; 
				   $customer_type="Retail";
				   $customer_data=array(
	              
				   'submit_from'=>$submit_from,
				   'customer_type'=>$customer_type,
				   'vendor_types'=>$vendor_types,
				   'vendor_location'=>$vendor_location,
				   'vendor_location_key_id'=>$vendor_location_id,
				   'customer_id'=>$final_id,
				   'first_name'=>$name,
				   'contact'=>$mobile,
				   'email_id'=>$email,
				   'experience'=>$experience,
				   'active_coupon'=>$active_coupon,	 
				   'user_registered'=>$customer_register
		
	  
	         ); 
			 
			 //print_r($customer_dat); die();
		$query['message_success']="Customer Query successfully Submitted";
		$query['message_Failed']="Customer Query Not Submit,Please Check?";
		if($id!='')
		  {
	       		  
		   
		   $x=$this->customer_model->update_customer_details($id,$data);
		   redirect('index.php/customer/view_cutomer_query');
		 }else{
			
			if($customer_register=='yes')
			{
				
             $get_promo_code_validation=$this->customer_model->get_promo_code_validation($active_coupon);	
			 //print_r($get_promo_code_validation);	
			 //echo $get_promo_code_validation[0]->valid_from_date.$get_promo_code_validation[0]->valid_end_date;		
				
			$message='<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> signup email</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
</head>
<body>
<style>
table td a.a_link{font-size:3em; padding:0 20px}
.btn-instagram{color:#3f729b}
.btn-facebook{color:#3b5998}
.btn-linkedin{color:#007bb6}
</style>
<table id="Table_01" width="750" border="0" cellpadding="0" cellspacing="0"  style="margin:0 auto">
<tr>
<td colspan="4"><p><img src="'.base_url().'images/mahattaArt_logo.png" width="300"/></p></td>
</tr>
<tr><td colspan="4"><p>Dear '.$name.'!</p></td></tr>
<tr>
<td colspan="4"><p>Thank you! For subscribing to <a href="'.base_url().'">MahattaArt.com</a></p></td>
</tr>
<tr>
<td colspan="4"><p>We will keep you updated on our exclusive and latest collections!</p></td>
</tr>
<tr>
<td colspan="4">
<p>Mahatta Art is an online art gallery having 5.5 Lakh Images including Photography, Paintings, Poster & Illustrations from world renowned Collections and Artists. The content ranges from Abstracts to Nature photography, Legendary to Amateur artists, Heritage to Modern Indian art, Modern to Contemporary art, Humorous quotes to Serious & Hollywood Vintage posters and so on.Your Coupon code:<strong>'.$active_coupon.'</strong> And Valid  From <strong>'.$get_promo_code_validation[0]->valid_from_date.' to '.$get_promo_code_validation[0]->valid_end_date.'</strong> </p>
</td>
</tr>
<tr>
<td colspan="4"><p>Click here to know more about us <a href="'.base_url().'">link</a></p></td>
</tr>
<tr>
<td colspan="4">
<p>For any queries email us at <a href="mailto:info@mahattaart.com">info@mahattaart.com</a> or contact us at: +91-8800639075, 011-41828972</p>
</td>
</tr>
<tr><td colspan="4"><p>Regards,</p></td></tr>
<tr>
<td width="150" style="vertical-align:top"><p>Mahattaart Team</p></td>
<td>
<a href="https://www.facebook.com/mahattaart"><img src="'.base_url().'images/facebook.jpg" width="50px" height="50px"></a>
<a href="https://www.linkedin.com/company/13458390"><img src="'.base_url().'images/linkdin.jpg" width="50px" height="50px"></a>
<a href="https://twitter.com/mahattaart"><img src="'.base_url().'images/twitter.jpg" width="50px" height="50px"></a>
</td>
</tr>
</table>
</body>
</html>';
				
				
				
		                $this->email->from('info@mahataart.com', 'Mahattaart');
   					    //$this->email->to($email);
						$this->email->to($email);
                        $this->email->subject('Test');
                        $this->email->message($message);
                        $this->email->send();
                   		
				
					
				
			$query['add_customer']=$this->customer_model->add_customer_query_mod($data);
	        $this->customer_model->add_to_customer_model($customer_data);	
			}else{
			
			$query['add_customer']=$this->customer_model->add_customer_query_mod($data);
			//SEND EMAILS HERE	
				
				}
	$query['add_success']="Customer Query Added Success Fully,";
			 }
	 }
	 
	  $this->load->view('backend/dashboard_header');
      $this->load->view('backend/customer/add_customer_query',$query);     
      $this->load->view('backend/footer');
    
		   
		
	     
	   }



  public function get_query_details()
   {
	   $vendor_types=$this->input->post('vendor_types');
	   
	   $get_ven_location=$this->customer_model->get_query_data($vendor_types);
	 
		echo '<option>'.'Select Location'.'</option>';
		foreach($get_ven_location as $r2){
			?>
       <option value="<?php  echo $r2->location;?>"><?php  echo $r2->location;?></option>
            
            <?php
		}
	   
	   
   }
   
   
   
   
 public function get_query_location_keys()
      {
	   $vendor_location=$this->input->post('vendor_location');
	   $get=$this->customer_model->get_query_location_key($vendor_location);
	   echo $get[0]->location_id;	  
	  
      }
   
   
     public function get_location_keys()
   {
	   $location=$this->input->post('location');
	  // print_r($vendor_types); die();
	   
	   
	   $get_ven_location=$this->customer_model->get_vendor_location_keys($$location);
	 
		echo '<option>'.'Select Location'.'</option>';
		foreach($get_ven_location as $r2){
			?>
       <option value="<?php  echo $r2->location;?>"><?php  echo $r2->location;?></option>
            
            <?php
		}
	   
	   
   }

  
	 
//enn 27-12-2017	 
	 
	  public function view_cutomer_query()
	   {
	   $query['sucess']=$this->customer_model->view_cutomer_query_mod();
	   $this->load->view('backend/customer/view_cutomer_query',$query);
	   
	 }
	 
	 
	 public function select_custom_query($id)
	 {
	 // echo $id;die;
	  //$id=$this->uri->segment(3);

	  $select['select_success']=$this->customer_model->get_customer_details($id);
	  $this->load->view('backend/customer/add_customer_query',$select);
	 }
	 public function edit_customer_query()
	{
	 $id=$this->uri->segment(3);
	 
	 
	 
	    $this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('mobile','Mobile','required|numeric|exact_length[10]');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('pinterest','Product Interest','required');
		$this->form_validation->set_rules('added_locaion','Location','required');
		$this->form_validation->set_rules('feadback','Feadback','required');
		
		
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$gender=$this->input->post('gender');
		$pinterest=$this->input->post('pinterest');
		$addlocation=$this->input->post('added_locaion');
		$feadback=$this->input->post('feadback');
		
		
		$data=array(
		                'customer_name'=>$name,
	                    'customer_email'=>$email,
	                    'customer_mobile'=>$mobile,
						'gender'=>$gender,
	                    'cutomer_interest'=>$pinterest,
	                    'cutomer_location'=>$addlocation,
	                    'cutomer_feadback'=>$feadback,
				  
				   );
				 
           
		
	    if($this->form_validation->run==false)
		{
		 $this->load->view('backend/customer/add_customer_query');
		}else{
			
		$data=array(
		                'customer_name'=>$name,
	                    'customer_email'=>$email,
	                    'customer_mobile'=>$mobile,
						'gender'=>$gender,
	                    'cutomer_interest'=>$pinterest,
	                    'cutomer_location'=>$addlocation,
	                    'cutomer_feadback'=>$feadback,
				  
				   );
				 
				   
		$success['query']=$this->customer_model->edit_customer_query_mod($id,$data);	   
		$query['message_success']="Customer Record successfully Updated";
		$query['message_Failed']="Something is Rong,Please Check?";
		
		
         
		   // $this->load->view('backend/dashboard_header');
            $this->load->view('backend/customer/add_customer_query',$query);
          //  $this->load->view('backend/footer');

		
		
		
		
		$this->load->view('backend/customer/add_customer_query',$id);
			
			}
	}
	public function delete_cutomer_query()
	  {
	   
	   $id=$this->uri->segment(3);
	 
	   $delete['success_delete']=$this->customer_model->delete_cutomer_query_mod($id);
	   redirect('index.php/customer/view_cutomer_query'); 
	   
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
	   
	    $data['get_vendor']=$this->customer_model->get_vendor_types_model(); 
		//$data['get_details']=$this->customer_model->get_kiosk_details($id);
        //$data['vtypes']=$this->customer_model->get_vendor_types_model(); 
		
		$this->load->view('backend/dashboard_header');
        $this->load->view('backend/customer/add_customer',$data);
        $this->load->view('backend/footer');
    	
	}
    public function add_customer_final()
    {
	  
	
	
		
     
			$data['get_vendor']=$this->customer_model->get_vendor_types_model();
			$verdor_types_id=$this->input->post('verdor_types');
		   
	    if($this->session->userdata('userid'))
    {
	
        $data['msg']="";
		//print_r($data);die;
        $this->input->post('customer_type');
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
         $ocupation=$this->input->post('occupation');
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

        
         $b2cp=$this->input->post('customer_type');
		 
		 
         if($this->input->post('customer_type')=='RETAIL')
        {
		    
		   
		   if($this->input->post('occupationb2cp')=='Other_b2cp')
                   {
                          $ocupation=$this->input->post('occupationb2cp');
						  $Indusry = $this->input->post('otherb2cp');
						    
                   }
		
		
          if($this->form_validation->run()==false)
		  {
            //echo $this->input->post('vendor_types'); die();			  
			  
			  //$data['get_vendor']=$this->customer_model->get_vendor_types_model();
			  
$verdor_types=$this->input->post('verdor_types');			
//$data['vtypes']=$this->customer_model->get_vendor_types_model();
//$data['get_details']=$this->customer_model->get_kiosk_details($id);
//$data['vtypes']=$this->customer_model->get_vendor_types_model(); 

			  
			  
			  
            $data=array(
                    'customer_id'=>$this->input->post('customer_id'),
                    
					'vendor_types'=>$this->input->post('vendor_types'),
					'vendor_location'=>$this->input->post('location'),
					'vendor_location_key_id'=>$this->input->post('vendor_location_id'),
					'client_service'=>$this->input->post('client_service'),	
					
					'first_name'=>$this->input->post('fname'),
                    'last_name'=>$this->input->post('lname'),
                    'email_id'=>$this->input->post('email'),
                    'customer_type'=>$this->input->post('customer_type'),
					'industry'=>$this->input->post('occupationb2cp'),
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
					'i_am_a'=>$this->input->post('iama'),
					'job_description'=>$this->input->post('job_description'),
                    'zip_code'=>$this->input->post('pincode'),
                    'customer_created_by'=>'admin','date_account_create'=>date('y:m:d h:m:s'),
                    /*'company_type'=>$this->input->post('company_type')*/ 
                     'status'=>'1',
					 
					 /*Mailing Infomation*/
					 
					'mailing_street_address'=>$this->input->post('mailstreetaddress'),
                    'mailing_city'=>$this->input->post('mainlingcity'),
                    'mailing_state'=>$this->input->post('mailingstate'),
                    'mailing_postal_code'=>$this->input->post('mailposatcode'),
                    'mailing_country'=>$this->input->post('mailingcountry'),
                    'mailing_telephone'=>$this->input->post('mailingphone'),
                    'mailing_mobile'=>$this->input->post('mailingmobile'), 
					 
					 
					 /*End Mailing*/
					 
					 /* Billing Infomation */
					 
					'billing_company_name'=>$this->input->post('billingcomname'),
                    'billing_region'=>$this->input->post('billingregion'),
                    'billing_city'=>$this->input->post('billingcity'),
                    'billing_cus_ac_type'=>$this->input->post('bactype'),
                    'billing_contact_person'=>$this->input->post('billing_con_person'),
                    'billing_comp_address'=>$this->input->post('billing_comp_address'),
					'billing_cus_gst_num'=>$this->input->post('billing_gst_number'),
					'billing_pan_number'=>$this->input->post('billing_pan_number'),
					'billing_place_supply'=>$this->input->post('billing_place_supply'),
					 
					 
					 /*End Billig*/
					 
					 
					 /* Shipping Infomation */
					 
					'shipping_company_name'=>$this->input->post('shipping_comp_name'),
                    'shipping_region'=>$this->input->post('shipping_comp_region'),
                    'shipping_city'=>$this->input->post('shipping_city'),
                    'shipping_contact_person'=>$this->input->post('shipping_com_con_person'),
                    'shipping_com-address'=>$this->input->post('shipping_comp_address'),
					'shipping_gst_number'=>$this->input->post('shipping_gst_num'),
					'shipping_pan_number'=>$this->input->post('shipping_pan_num'),
					'shipping_place_supply'=>$this->input->post('shipping_place_supply'),
					'shipping_perpose'=>$this->input->post('shipping_purpose'),
					 
					 
					 /*End Billig*/
					 
					 
	
					 
					 );
					 
					 
					 
					 
				$this->customer_model->insert_customer($data);
                $data['msg']="Customer Has Been Successfully Added.";
				$data['msg_for_b2cp']="b2cp";
				}
					 }

		   
		   //end by sajid
         
         
         
        if($this->form_validation->run()==true)
        {
		
		$data['get_vendor']=$this->customer_model->get_vendor_types_model();

            $data=array(
                    'customer_id'=>$this->input->post('customer_id'),
					'vendor_types'=>$this->input->post('vendor_types'),
					'vendor_location'=>$this->input->post('location'), 
					'vendor_location_key_id'=>$this->input->post('vendor_location_id'),
                    'client_service'=>$this->input->post('client_service'),					
                    'first_name'=>$this->input->post('fname'),
                    'last_name'=>$this->input->post('lname'),
                    'email_id'=>$this->input->post('email'),
                    'customer_type'=>$this->input->post('customer_type'),				
                    'industry'=>$this->input->post('occupationb2cp'),
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
					'i_am_a'=>$this->input->post('iama'),
					'job_description'=>$this->input->post('job_description'),
                    'zip_code'=>$this->input->post('pincode'),
                    'customer_created_by'=>'admin','date_account_create'=>date('y:m:d h:m:s'),
                    /*'company_type'=>$this->input->post('company_type')*/ 
                     'status'=>'1',
					 
					 /*Mailing Infomation*/
					 
					'mailing_street_address'=>$this->input->post('mailstreetaddress'),
                    'mailing_city'=>$this->input->post('mainlingcity'),
                    'mailing_state'=>$this->input->post('mailingstate'),
                    'mailing_postal_code'=>$this->input->post('mailposatcode'),
                    'mailing_country'=>$this->input->post('mailingcountry'),
                    'mailing_telephone'=>$this->input->post('mailingphone'),
                    'mailing_mobile'=>$this->input->post('mailingmobile'), 
					 
					 
					 /*End Mailing*/
					 
					 /* Billing Infomation */
					 
					'billing_company_name'=>$this->input->post('billingcomname'),
                    'billing_region'=>$this->input->post('billingregion'),
                    'billing_city'=>$this->input->post('billingcity'),
                    'billing_cus_ac_type'=>$this->input->post('bactype'),
                    'billing_contact_person'=>$this->input->post('billing_con_person'),
                    'billing_comp_address'=>$this->input->post('billing_comp_address'),
					'billing_cus_gst_num'=>$this->input->post('billing_gst_number'),
					'billing_pan_number'=>$this->input->post('billing_pan_number'),
					'billing_place_supply'=>$this->input->post('billing_place_supply'),
					 
					 
					 /*End Billig*/
					 
					 
					 /* Shipping Infomation */
					 
					'shipping_company_name'=>$this->input->post('shipping_comp_name'),
                    'shipping_region'=>$this->input->post('shipping_comp_region'),
                    'shipping_city'=>$this->input->post('shipping_city'),
                    'shipping_cus_busi_type'=>$this->input->post('shipping_cus_busi_type'),
                    'shipping_contact_person'=>$this->input->post('shipping_com_con_person'),
                    'shipping_com-address'=>$this->input->post('shipping_comp_address'),
					'shipping_gst_number'=>$this->input->post('shipping_gst_num'),
					'shipping_pan_number'=>$this->input->post('shipping_pan_num'),
					'shipping_place_supply'=>$this->input->post('shipping_place_supply'),
					'shipping_perpose'=>$this->input->post('shipping_purpose'),
					 
					 
					 /*End Billig*/

					 
					 
					 
					 );
					
										 
					 
			
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