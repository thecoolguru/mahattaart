<?php 
class Channel_partners extends CI_Controller
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
		$this->load->model('channel_partner_model');
		$this->load->database();

	}
	public function add_channel_partner()
    {
        if($this->session->userdata('userid'))
        {
            $data['msg']="";
            $this->form_validation->set_rules('email','Email','required');
            if($this->form_validation->run()==true)
            {
                
              $commission=$this->input->post('commission');
              if($commission=='low')
             {
              $size="";
              $lic_rs="";
              $lic_dol="";
              $smallest_com=$this->input->post('commission_per10');
      		$small_com=$this->input->post('commission_per20');
      		$medium_com=$this->input->post('commission_per30');
      		$large_com=$this->input->post('commission_per40');
      		$largest_com=$this->input->post('commission_per50');
      		$commission="smallest_".$smallest_com.","."small_".$small_com.","."medium_".$medium_com.","."large_".$large_com.","."largest_".$largest_com;
       

      		$smallest_pt=$this->input->post('channel_partner_share10');
      		$small_pt=$this->input->post('channel_partner_share20');
      		$medium_pt=$this->input->post('channel_partner_share30');
      		$large_pt=$this->input->post('channel_partner_share40');
      		$largest_pt=$this->input->post('channel_partner_share50');
      		$channel="smallest_".$smallest_pt.","."small_".$small_pt.","."medium_".$medium_pt.","."large_".$large_pt.","."largest_".$largest_pt;
       
     		$smallest_wl=$this->input->post('wallsnart_share10');
      		$small_wl=$this->input->post('wallsnart_share20');
      		$medium_wl=$this->input->post('wallsnart_share30');
      		$large_wl=$this->input->post('wallsnart_share40');
      		$largest_wl=$this->input->post('wallsnart_share50');
      		$wallsnart="smallest_".$smallest_wl.","."small_".$small_wl.","."medium_".$medium_wl.","."large_".$large_wl.","."largest_".$largest_wl;
      
              } 
              else if($commission=='mid')  
             {
              $size="";
              $lic_rs="";
              $lic_dol="";
              $smallest_com=$this->input->post('commission_per11');
      		$small_com=$this->input->post('commission_per21');
      		$medium_com=$this->input->post('commission_per31');
     	 	$large_com=$this->input->post('commission_per41');
      		$largest_com=$this->input->post('commission_per51');
      		$commission="smallest_".$smallest_com.","."small_".$small_com.","."medium_".$medium_com.","."large_".$large_com.","."largest_".$largest_com;
       

      		$smallest_pt=$this->input->post('channel_partner_share11');
      		$small_pt=$this->input->post('channel_partner_share21');
      		$medium_pt=$this->input->post('channel_partner_share31');
      		$large_pt=$this->input->post('channel_partner_share41');
      		$largest_pt=$this->input->post('channel_partner_share51');
      		$channel="smallest_".$smallest_pt.","."small_".$small_pt.","."medium_".$medium_pt.","."large_".$large_pt.","."largest_".$largest_pt;
       
     		$smallest_wl=$this->input->post('wallsnart_share11');
      		$small_wl=$this->input->post('wallsnart_share21');
      		$medium_wl=$this->input->post('wallsnart_share31');
      		$large_wl=$this->input->post('wallsnart_share41');
      		$largest_wl=$this->input->post('wallsnart_share51');
      		$wallsnart="smallest_".$smallest_wl.","."small_".$small_wl.","."medium_".$medium_wl.","."large_".$large_wl.","."largest_".$largest_wl;
             }
             else if($commission=='high')  
            { 
              $size="";
              $lic_rs="";
              $lic_dol="";
              $smallest_com=$this->input->post('commission_per12');
      		$small_com=$this->input->post('commission_per22');
      		$medium_com=$this->input->post('commission_per32');
      		$large_com=$this->input->post('commission_per42');
      		$largest_com=$this->input->post('commission_per52');
      		$commission="smallest_".$smallest_com.","."small_".$small_com.","."medium_".$medium_com.","."large_".$large_com.","."largest_".$largest_com;
       

      		$smallest_pt=$this->input->post('channel_partner_share12');
      		$small_pt=$this->input->post('channel_partner_share22');
      		$medium_pt=$this->input->post('channel_partner_share32');
      		$large_pt=$this->input->post('channel_partner_share42');
      		$largest_pt=$this->input->post('channel_partner_share52');
      		$channel="smallest_".$smallest_pt.","."small_".$small_pt.","."medium_".$medium_pt.","."large_".$large_pt.","."largest_".$largest_pt;
       
     		$smallest_wl=$this->input->post('wallsnart_share12');
      		$small_wl=$this->input->post('wallsnart_share22');
      		$medium_wl=$this->input->post('wallsnart_share32');
      		$large_wl=$this->input->post('wallsnart_share42');
      		$largest_wl=$this->input->post('wallsnart_share52');
      		$wallsnart="smallest_".$smallest_wl.","."small_".$small_wl.","."medium_".$medium_wl.","."large_".$large_wl.","."largest_".$largest_wl;
          }
               
           else if($commission=='other')
           {
              $size1=$this->input->post('size1');
  		$size2=$this->input->post('size2');
  		$size3=$this->input->post('size3');
  		$size4=$this->input->post('size4');
  		$size5=$this->input->post('size5');
  		$size="other_size1_".$size1.","."other_size2_".$size2.","."other_size3_".$size3.","."other_size4_".$size4.","."other_size5_".$size5;
  
  		$dol1=$this->input->post('lic_dol1');
  		$dol2=$this->input->post('lic_dol2');
  		$dol3=$this->input->post('lic_dol3');
  		$dol4=$this->input->post('lic_dol4');
  		$dol5=$this->input->post('lic_dol5');
  		$lic_dol="other_dol1_".$dol1.","."other_dol2_".$dol2.","."other_dol3_".$dol3.","."other_dol4_".$dol4.","."other_dol5_".$dol5;

  		$rs1=$this->input->post('lic_rs1');
  		$rs2=$this->input->post('lic_rs2');
  		$rs3=$this->input->post('lic_rs3');
  		$rs4=$this->input->post('lic_rs4');
  		$rs5=$this->input->post('lic_rs5');
  		$lic_rs="other_rs1_".$rs1.","."other_rs2_".$rs2.","."other_rs3_".$rs3.","."other_rs4_".$rs4.","."other_rs5_".$rs5;
  
  		$com1=$this->input->post('commission_per1');
  		$com2=$this->input->post('commission_per2');
  		$com3=$this->input->post('commission_per3');
  		$com4=$this->input->post('commission_per4');
  		$com5=$this->input->post('commission_per5');
  		$commission="other_com1_".$com1.","."other_com2_".$com2.","."other_com3_".$com3.","."other_com4_".$com4.","."other_com5_".$com5;
 
  		$channel1=$this->input->post('channel_partner_share1');
  		$channel2=$this->input->post('channel_partner_share2');
  		$channel3=$this->input->post('channel_partner_share3');
  		$channel4=$this->input->post('channel_partner_share4');
  		$channel5=$this->input->post('channel_partner_share5');
  		$channel="other_channel1_".$channel1.","."other_channel2_".$channel2.","."other_channel3_".$channel3.","."other_channel4_".$channel4.","."other_channel5_".$channel5;

  		$wallsnart1=$this->input->post('wallsnart_share1');
  		$wallsnart2=$this->input->post('wallsnart_share2');
  		$wallsnart3=$this->input->post('wallsnart_share3');
  		$wallsnart4=$this->input->post('wallsnart_share4');
  		$wallsnart5=$this->input->post('wallsnart_share5');
  		$wallsnart="other_wallsnart1_".$wallsnart1.","."other_wallsnart2_".$wallsnart2.","."other_wallsnart3_".$wallsnart3.","."other_wallsnart4_".$wallsnart4.","."other_wallsnart5_".$wallsnart5;
            }
               $count=$this->channel_partner_model->get_max_value_inserted_channel_partner();
               $countt=$count->channel_partner_id;
               $coun=++$countt;
               $data2=array('channel_partner_id'=>$coun,'commission_type'=>$this->input->post('commission'),
               'size'=>$size,'license_cost_dollars'=>$lic_dol,'license_cost_rupees'=>$lic_rs,
               'commission_percentage'=>$commission,'channel_partner_share'=>$channel,
	        'wallsnart_share'=>$wallsnart,'submission_status_no'=>$coun
               );
              

               $product_in="";
                
                for($j=1;$j<=6;$j++)
                              {
                                if($this->input->post('pro_ck'.$j))
					{ 
                                     $product_in= $product_in.",".$this->input->post('pro_ck'.$j);
                                   }
                              }
                         
                if($this->input->post('radio')=="addnwcompany")
               {
                if($this->input->post('pacceptance')=='offlinesigned')
                {    if($_FILES["file1"]["name"])
                    {
                    $contractfile=date('U').$_FILES["file1"]["name"];
                    move_uploaded_file($_FILES["file1"]["tmp_name"],"uploaded_pdf/".$contractfile);
                    }
                    else
                    {
                        $contractfile="";
                    }
                }
                else
                {
                    $contractfile="";
                }
                $data=array('access_level'=>2,'status'=>$this->input->post('status'),'cp_status'=>1,'channel_partner_name'=>$this->input->post('partner_name'),'address1'=>$this->input->post('address1'),'contact_person_name'=>$this->input->post('contact_person'),'address2'=>$this->input->post('address2'),'designation'=>$this->input->post('designation'),'city'=>$this->input->post('city'),'password'=>$this->input->post('password'),'state'=>$this->input->post('state'),'pin_code'=>$this->input->post('pincode'),'cp_id'=>$this->input->post('cp_id'),'country'=>$this->input->post('country'),'first_name'=>$this->input->post('fname'),'email_id'=>$this->input->post('email'),'last_name'=>$this->input->post('lname'),'contact_no'=>$this->input->post('contact'),'acceptance_type'=>$this->input->post('pacceptance'),'contract_file_url'=>$contractfile,'product_types'=>$product_in,'product_sources'=>$this->input->post('pro_sources'));
                $valid=$this->channel_partner_model->check_channel_partner($this->input->post('partner_name'));
                $email_valid=$this->channel_partner_model->check_email($this->input->post('email'));
                $cp_valid=$this->channel_partner_model->get_cpid($this->input->post('cp_id'));
                if(!$valid && !$email_valid && !$cp_valid)
                {
                $this->channel_partner_model->insert_channel_partner($data);
                $this->channel_partner_model->add_commission_details($data2);
                $data['msg']="You Have Successfully Added Channel Partner.";
                }
              
                else if($valid && !$email_valid && !$cp_valid)  { $data['msg']="Channel Partner Name Has Been Already Used";}
                else if($email_valid && !$valid && !$cp_valid ) { $data['msg']="Channel Partner Email Id Has Been Already Used";}
                else if($cp_valid && !$valid && !$email_valid ) { $data['msg']="Channel Partner CP_id Has Been Already Used";}
                else if($cp_valid && $valid && !$email_valid ) { $data['msg']="Channel Partner CP_id And Name Both Have Been Already Used";}
                else if($email_valid && $valid && !$cp_valid) { $data['msg']="Channel Partner Name And Email Id Both Have Been Already Used";}
                else if($email_valid && !$valid && $cp_valid) { $data['msg']="Channel Partner CP_id And Email Id Both Have Been Already Used";}
                else if($email_valid && $valid && $cp_valid) { $data['msg']="Channel Partner Name ,CP_id And Email Id All Have Been Used";}
              
                //print_r($data);
            }
          
          
                 else if($this->input->post('radio')=="addtocompany")
               {
                   $parent_id=$this->input->post('companies');
                   $cp_id=$this->channel_partner_model->get_cp_id($parent_id);
                
                   $data=array('access_level'=>2, 'status'=>$this->input->post('status'),'cp_status'=>0,'channel_partner_name'=>$this->input->post('partner_name'),'address1'=>$this->input->post('address1'),'contact_person_name'=>$this->input->post('contact_person'),'address2'=>$this->input->post('address2'),'designation'=>$this->input->post('designation'),'city'=>$this->input->post('city'),'password'=>$this->input->post('password'),'state'=>$this->input->post('state'),'pin_code'=>$this->input->post('pincode'),'cp_id'=>$cp_id->cp_id,'country'=>$this->input->post('country'),'first_name'=>$this->input->post('fname'),'email_id'=>$this->input->post('email'),'last_name'=>$this->input->post('lname'),'contact_no'=>$this->input->post('contact'),'parent_partner_id'=>$parent_id,'product_types'=>$product_in,'product_sources'=>$this->input->post('pro_sources'));
              
                $valid=$this->channel_partner_model->check_channel_partner($this->input->post('partner_name'));
                $email_valid=$this->channel_partner_model->check_email($this->input->post('email'));
              
                if(!$valid && !$email_valid )
                {
                $this->channel_partner_model->insert_channel_partner($data);
                $this->channel_partner_model->add_commission_details($data2);
                $data['msg']="You Have Successfully Added Channel Partner.";
                }
                else if($valid && !$email_valid) { $data['msg']="Channel Partner Name Has Been Already Used";}
                else if($email_valid && !$valid) { $data['msg']="Channel Partner Email Id Has Been Already Used";}
                else if($email_valid && $valid ) { $data['msg']="Channel Partner Name And Email Id Both Have Been Already Used";}
                          
              
                // print_r($data);
               }
          
            }
            $this->load->view('backend/dashboard_header');
            $this->load->view('backend/add_channel_partner',$data);
            $this->load->view('backend/footer');
        }
     else
     {
         redirect('backend/index');
     }
    }
     public function get_parent_cp($parent_id="")
	 {
		$parent_id=$this->input->post('channel_id');
		
		 $cp_id=$this->channel_partner_model->get_cp_id($parent_id);
          
		 print $cp_id->cp_id;
		  
	 }
	 
	 public function view_channel_partners()
	{
		if($this->session->userdata('userid'))
		{
if($this->input->post('email')){
				$data['channel_partner']=$this->channel_partner_model->get_partner_byemail($this->input->post('email'));
                           $data['links']="";
			}
			else
			{
			
			$config['base_url'] = base_url().'index.php/channel_partners/view_channel_partners';
		   $config['total_rows'] = $this->channel_partner_model->count_channelpartner();
		   $config['per_page'] = 4;
		  $config["uri_segment"] = 3;
		  $this->pagination->initialize($config);
		  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		 
		 $data['channel_partner']=$this->channel_partner_model->get_channelpartner($config['per_page'],$page);
		 $data['links']= $this->pagination->create_links(); 
		  }

		    $data['count']=$this->channel_partner_model->count_channelpartner();
		    
		    $this->load->view('backend/dashboard_header');
		    $this->load->view('backend/view_channel_partners',$data);
		    $this->load->view('backend/footer');
		}
		else
		{
			redirect('backend/index');

		}
	}

       public function image_status_channel_partner()
      {
       if($this->session->userdata('userid'))
       {          

                  $data['list']=$this->channel_partner_model->get_channel_partner_detail();
         	    $this->load->view('backend/dashboard_header');
		    $this->load->view('backend/image_status_channel_partners',$data);
		    $this->load->view('backend/footer');
       }
       else
       {

        redirect('backend/index');

       }

       }

                public function get_online_images_for_cp_id()
             {
                  $data['list']=$this->channel_partner_model->channelpartner($this->input->post('id'));
                  //print_r($data['list']);
                 $this->load->view('backend/online_images_channel_partner',$data);
             }


        public function collection_analysis_channel_partner()
      {
       if($this->session->userdata('userid'))
       {          $data['list']=$this->channel_partner_model->get_channel_partner_detail();
             	    $this->load->view('backend/dashboard_header');
		    $this->load->view('backend/collection_analysis_channel_partners',$data);
		    $this->load->view('backend/footer');
       }
       else
       {

        redirect('backend/index');

       }

       }

        public function get_details_for_view_collection_analysis()
       {
         $data['list']=$this->channel_partner_model->channelpartner($this->input->post('id'));
         $this->load->view('backend/collection_detail',$data);

       } 

      
        public function content_in_loop_channel_partner()
      {
       if($this->session->userdata('userid'))
       {         $data['details']=$this->channel_partner_model->view_content_in_loop_details();
                  $this->load->view('backend/dashboard_header');
		    $this->load->view('backend/content_in_loop_channel_partners',$data);
		    $this->load->view('backend/footer');
       }
       else
       {

        redirect('backend/index');

       }

       }
  public function add_content_in_loop()
  {
   if($this->session->userdata('userid'))
       {          
            $data['msg']="";   
            $this->form_validation->set_rules('code2','Cp_name','required');
            if($this->form_validation->run()==true)
            {
               $data1=array('channel_partner_id'=>$this->input->post('code2'),
                           'contract_status'=>$this->input->post('con_status'),
                           'contract_date'=>date('y:m:d h:m:s'),
                           'expected_date_of_receiving_hdd'=>$this->input->post('ex_dt_rd'),
                           'received_hdd_images'=>$this->input->post('rec_img'),
                           'received_hdd_date'=>$this->input->post('rec_date'),
                           'expected_working_date_resize_status'=>$this->input->post('res_pending_date'),  
                           'expected_completion_date_resize_status'=>$this->input->post('res_working_date'),
                           'completion_images_resize_status'=>$this->input->post('res_comp_img'),
                           'completion_date_resize_status'=>$this->input->post('res_comp_date'),
                           'expected_working_date_upload_status'=>$this->input->post('up_pending_date'),
                           'expected_completion_date_upload_status'=>$this->input->post('up_working_date'),
                           'completion_images_upload_status'=>$this->input->post('up_comp_img'),
                           'completion_date_upload_status'=>$this->input->post('up_comp_date'),
                           'no_of_images_live'=>$this->input->post('img_live'),
                           'no_of_images_live_date'=>$this->input->post('img_live_date'));

                      
                      $this->channel_partner_model->add_content_in_loop_details($data1);
                      $data['msg']="You have successfully added the content in loop details.";
                      
         	    
             }             
                  $count=$this->channel_partner_model->get_max_value_inserted();
                  $coun= $count->serial_no;
                  $data['max']=++$coun;
                  $data['list']=$this->channel_partner_model->get_channel_partner_detail();
         	    $this->load->view('backend/dashboard_header');
		    $this->load->view('backend/add_content_in_loop',$data);
		    $this->load->view('backend/footer');
       }
       else
       {

        redirect('backend/index');

       }

  }
 public function add_commission_details($commission_type="",$channel_partner_id="")
  {
         if($commission_type=="low"){
      $smallest_com=$this->input->post('commission_per10');
      $small_com=$this->input->post('commission_per20');
      $medium_com=$this->input->post('commission_per30');
      $large_com=$this->input->post('commission_per40');
      $largest_com=$this->input->post('commission_per50');
      $commission_per="smallest_".$smallest_com.","."small_".$small_com.","."medium_".$medium_com.","."large_".$large_com.","."largest_".$largest_com;
       

      $smallest_pt=$this->input->post('channel_partner_share10');
      $small_pt=$this->input->post('channel_partner_share20');
      $medium_pt=$this->input->post('channel_partner_share30');
      $large_pt=$this->input->post('channel_partner_share40');
      $largest_pt=$this->input->post('channel_partner_share50');
      $channel_pt="smallest_".$smallest_pt.","."small_".$small_pt.","."medium_".$medium_pt.","."large_".$large_pt.","."largest_".$largest_pt;
       
     $smallest_wl=$this->input->post('wallsnart_share10');
      $small_wl=$this->input->post('wallsnart_share20');
      $medium_wl=$this->input->post('wallsnart_share30');
      $large_wl=$this->input->post('wallsnart_share40');
      $largest_wl=$this->input->post('wallsnart_share50');
      $wallsnart_sh="smallest_".$smallest_wl.","."small_".$small_wl.","."medium_".$medium_wl.","."large_".$large_wl.","."largest_".$largest_wl;
      }
      if($commission_type=="mid")
    {
     $smallest_com=$this->input->post('commission_per11');
      $small_com=$this->input->post('commission_per21');
      $medium_com=$this->input->post('commission_per31');
      $large_com=$this->input->post('commission_per41');
      $largest_com=$this->input->post('commission_per51');
      $commission_per="smallest_".$smallest_com.","."small_".$small_com.","."medium_".$medium_com.","."large_".$large_com.","."largest_".$largest_com;
       

      $smallest_pt=$this->input->post('channel_partner_share11');
      $small_pt=$this->input->post('channel_partner_share21');
      $medium_pt=$this->input->post('channel_partner_share31');
      $large_pt=$this->input->post('channel_partner_share41');
      $largest_pt=$this->input->post('channel_partner_share51');
      $channel_pt="smallest_".$smallest_pt.","."small_".$small_pt.","."medium_".$medium_pt.","."large_".$large_pt.","."largest_".$largest_pt;
       
     $smallest_wl=$this->input->post('wallsnart_share11');
      $small_wl=$this->input->post('wallsnart_share21');
      $medium_wl=$this->input->post('wallsnart_share31');
      $large_wl=$this->input->post('wallsnart_share41');
      $largest_wl=$this->input->post('wallsnart_share51');
      $wallsnart_sh="smallest_".$smallest_wl.","."small_".$small_wl.","."medium_".$medium_wl.","."large_".$large_wl.","."largest_".$largest_wl;
      

    }
    if($commission_type=="high")
    {
     $smallest_com=$this->input->post('commission_per12');
      $small_com=$this->input->post('commission_per22');
      $medium_com=$this->input->post('commission_per32');
      $large_com=$this->input->post('commission_per42');
      $largest_com=$this->input->post('commission_per52');
      $commission_per="smallest_".$smallest_com.","."small_".$small_com.","."medium_".$medium_com.","."large_".$large_com.","."largest_".$largest_com;
       

      $smallest_pt=$this->input->post('channel_partner_share12');
      $small_pt=$this->input->post('channel_partner_share22');
      $medium_pt=$this->input->post('channel_partner_share32');
      $large_pt=$this->input->post('channel_partner_share42');
      $largest_pt=$this->input->post('channel_partner_share52');
      $channel_pt="smallest_".$smallest_pt.","."small_".$small_pt.","."medium_".$medium_pt.","."large_".$large_pt.","."largest_".$largest_pt;
       
     $smallest_wl=$this->input->post('wallsnart_share12');
      $small_wl=$this->input->post('wallsnart_share22');
      $medium_wl=$this->input->post('wallsnart_share32');
      $large_wl=$this->input->post('wallsnart_share42');
      $largest_wl=$this->input->post('wallsnart_share52');
      $wallsnart_sh="smallest_".$smallest_wl.","."small_".$small_wl.","."medium_".$medium_wl.","."large_".$large_wl.","."largest_".$largest_wl;
      
     }
    $count=$this->channel_partner_model->get_max_value_inserted();
        $countt=$count->serial_no;
    $coun=++$countt;
$data2=array('channel_partner_id'=>$channel_partner_id,'commission_type'=>$commission_type,
             'commission_percentage'=>$commission_per,'channel_partner_share'=>$channel_pt,
	       'wallsnart_share'=>$wallsnart_sh,'submission_status_no'=>$coun);
        $this->channel_partner_model->add_commission_details($data2);

print "success";
   }

public function add_other_commission_details($channel_partner_id="")
{
  $size1=$this->input->post('size1');
  $size2=$this->input->post('size2');
  $size3=$this->input->post('size3');
  $size4=$this->input->post('size4');
  $size5=$this->input->post('size5');
  $size="other_size1_".$size1.","."other_size2_".$size2.","."other_size3_".$size3.","."other_size4_".$size4.","."other_size5_".$size5;
  
  $dol1=$this->input->post('lic_dol1');
  $dol2=$this->input->post('lic_dol2');
  $dol3=$this->input->post('lic_dol3');
  $dol4=$this->input->post('lic_dol4');
  $dol5=$this->input->post('lic_dol5');
  $lic_dol="other_dol1_".$dol1.","."other_dol2_".$dol2.","."other_dol3_".$dol3.","."other_dol4_".$dol4.","."other_dol5_".$dol5;

  $rs1=$this->input->post('lic_rs1');
  $rs2=$this->input->post('lic_rs2');
  $rs3=$this->input->post('lic_rs3');
  $rs4=$this->input->post('lic_rs4');
  $rs5=$this->input->post('lic_rs5');
  $lic_rs="other_rs1_".$rs1.","."other_rs2_".$rs2.","."other_rs3_".$rs3.","."other_rs4_".$rs4.","."other_rs5_".$rs5;
  
  $com1=$this->input->post('commission_per1');
  $com2=$this->input->post('commission_per2');
  $com3=$this->input->post('commission_per3');
  $com4=$this->input->post('commission_per4');
  $com5=$this->input->post('commission_per5');
  $commission="other_com1_".$com1.","."other_com2_".$com2.","."other_com3_".$com3.","."other_com4_".$com4.","."other_com5_".$com5;
 
  $channel1=$this->input->post('channel_partner_share1');
  $channel2=$this->input->post('channel_partner_share2');
  $channel3=$this->input->post('channel_partner_share3');
  $channel4=$this->input->post('channel_partner_share4');
  $channel5=$this->input->post('channel_partner_share5');
  $channel="other_channel1_".$channel1.","."other_channel2_".$channel2.","."other_channel3_".$channel3.","."other_channel4_".$channel4.","."other_channel5_".$channel5;

  $wallsnart1=$this->input->post('wallsnart_share1');
  $wallsnart2=$this->input->post('wallsnart_share2');
  $wallsnart3=$this->input->post('wallsnart_share3');
  $wallsnart4=$this->input->post('wallsnart_share4');
  $wallsnart5=$this->input->post('wallsnart_share5');
  $wallsnart="other_wallsnart1_".$wallsnart1.","."other_wallsnart2_".$wallsnart2.","."other_wallsnart3_".$wallsnart3.","."other_wallsnart4_".$wallsnart4.","."other_wallsnart5_".$wallsnart5;

   $count=$this->channel_partner_model->get_max_value_inserted();
    $coun=++$count;

  $data2=array('channel_partner_id'=>$channel_partner_id,'commission_type'=>"other",
               'size'=>$size,'license_cost_dollars'=>$lic_dol,'license_cost_rupees'=>$lic_rs,
               'commission_percentage'=>$commission,'channel_partner_share'=>$channel,
	        'wallsnart_share'=>$wallsnart,'submission_status_no'=>$coun
               );
        
 $this->channel_partner_model->add_commission_details($data2);
     print "success";
  
}
	 public function edit_channel_partner($id="")
	{
		if($this->session->userdata('userid'))
		{
		    
		    $data['channel_partner']=$this->channel_partner_model->channelpartner($id);
		    $data['commission_details']=$this->channel_partner_model->commission_details_for_specific_id($id);
		    if(isset($_POST['addcpn']))
		    {  
		    	$commission=$this->input->post('commission');
                      if($commission=='low')
                      {
                        $size="";
                        $lic_rs="";
                        $lic_dol="";
                        $smallest_com=$this->input->post('commission_per10');
      		          $small_com=$this->input->post('commission_per20');
      		          $medium_com=$this->input->post('commission_per30');
      		          $large_com=$this->input->post('commission_per40');
      		          $largest_com=$this->input->post('commission_per50');
      		          $commission="smallest_".$smallest_com.","."small_".$small_com.","."medium_".$medium_com.","."large_".$large_com.","."largest_".$largest_com;
       

      		          $smallest_pt=$this->input->post('channel_partner_share10');
      		          $small_pt=$this->input->post('channel_partner_share20');
      		          $medium_pt=$this->input->post('channel_partner_share30');
      		          $large_pt=$this->input->post('channel_partner_share40');
      		          $largest_pt=$this->input->post('channel_partner_share50');
      		          $channel="smallest_".$smallest_pt.","."small_".$small_pt.","."medium_".$medium_pt.","."large_".$large_pt.","."largest_".$largest_pt;
       
     		          $smallest_wl=$this->input->post('wallsnart_share10');
      		          $small_wl=$this->input->post('wallsnart_share20');
      		          $medium_wl=$this->input->post('wallsnart_share30');
      		          $large_wl=$this->input->post('wallsnart_share40');
      		          $largest_wl=$this->input->post('wallsnart_share50');
      		          $wallsnart="smallest_".$smallest_wl.","."small_".$small_wl.","."medium_".$medium_wl.","."large_".$large_wl.","."largest_".$largest_wl;
      
                    } 
              else if($commission=='mid')  
             {
              $size="";
              $lic_rs="";
              $lic_dol="";
              $smallest_com=$this->input->post('commission_per11');
      		$small_com=$this->input->post('commission_per21');
      		$medium_com=$this->input->post('commission_per31');
     	 	$large_com=$this->input->post('commission_per41');
      		$largest_com=$this->input->post('commission_per51');
      		$commission="smallest_".$smallest_com.","."small_".$small_com.","."medium_".$medium_com.","."large_".$large_com.","."largest_".$largest_com;
       

      		$smallest_pt=$this->input->post('channel_partner_share11');
      		$small_pt=$this->input->post('channel_partner_share21');
      		$medium_pt=$this->input->post('channel_partner_share31');
      		$large_pt=$this->input->post('channel_partner_share41');
      		$largest_pt=$this->input->post('channel_partner_share51');
      		$channel="smallest_".$smallest_pt.","."small_".$small_pt.","."medium_".$medium_pt.","."large_".$large_pt.","."largest_".$largest_pt;
       
     		$smallest_wl=$this->input->post('wallsnart_share11');
      		$small_wl=$this->input->post('wallsnart_share21');
      		$medium_wl=$this->input->post('wallsnart_share31');
      		$large_wl=$this->input->post('wallsnart_share41');
      		$largest_wl=$this->input->post('wallsnart_share51');
      		$wallsnart="smallest_".$smallest_wl.","."small_".$small_wl.","."medium_".$medium_wl.","."large_".$large_wl.","."largest_".$largest_wl;
             }
             else if($commission=='high')  
            { 
              $size="";
              $lic_rs="";
              $lic_dol="";
              $smallest_com=$this->input->post('commission_per12');
      		$small_com=$this->input->post('commission_per22');
      		$medium_com=$this->input->post('commission_per32');
      		$large_com=$this->input->post('commission_per42');
      		$largest_com=$this->input->post('commission_per52');
      		$commission="smallest_".$smallest_com.","."small_".$small_com.","."medium_".$medium_com.","."large_".$large_com.","."largest_".$largest_com;
       

      		$smallest_pt=$this->input->post('channel_partner_share12');
      		$small_pt=$this->input->post('channel_partner_share22');
      		$medium_pt=$this->input->post('channel_partner_share32');
      		$large_pt=$this->input->post('channel_partner_share42');
      		$largest_pt=$this->input->post('channel_partner_share52');
      		$channel="smallest_".$smallest_pt.","."small_".$small_pt.","."medium_".$medium_pt.","."large_".$large_pt.","."largest_".$largest_pt;
       
     		$smallest_wl=$this->input->post('wallsnart_share12');
      		$small_wl=$this->input->post('wallsnart_share22');
      		$medium_wl=$this->input->post('wallsnart_share32');
      		$large_wl=$this->input->post('wallsnart_share42');
      		$largest_wl=$this->input->post('wallsnart_share52');
      		$wallsnart="smallest_".$smallest_wl.","."small_".$small_wl.","."medium_".$medium_wl.","."large_".$large_wl.","."largest_".$largest_wl;
          }
               
           else if($commission=='other')
           {
              $size1=$this->input->post('size1');
  		$size2=$this->input->post('size2');
  		$size3=$this->input->post('size3');
  		$size4=$this->input->post('size4');
  		$size5=$this->input->post('size5');
  		$size="other_size1_".$size1.","."other_size2_".$size2.","."other_size3_".$size3.","."other_size4_".$size4.","."other_size5_".$size5;
  
  		$dol1=$this->input->post('lic_dol1');
  		$dol2=$this->input->post('lic_dol2');
  		$dol3=$this->input->post('lic_dol3');
  		$dol4=$this->input->post('lic_dol4');
  		$dol5=$this->input->post('lic_dol5');
  		$lic_dol="other_dol1_".$dol1.","."other_dol2_".$dol2.","."other_dol3_".$dol3.","."other_dol4_".$dol4.","."other_dol5_".$dol5;

  		$rs1=$this->input->post('lic_rs1');
  		$rs2=$this->input->post('lic_rs2');
  		$rs3=$this->input->post('lic_rs3');
  		$rs4=$this->input->post('lic_rs4');
  		$rs5=$this->input->post('lic_rs5');
  		$lic_rs="other_rs1_".$rs1.","."other_rs2_".$rs2.","."other_rs3_".$rs3.","."other_rs4_".$rs4.","."other_rs5_".$rs5;
  
  		$com1=$this->input->post('commission_per1');
  		$com2=$this->input->post('commission_per2');
  		$com3=$this->input->post('commission_per3');
  		$com4=$this->input->post('commission_per4');
  		$com5=$this->input->post('commission_per5');
  		$commission="other_com1_".$com1.","."other_com2_".$com2.","."other_com3_".$com3.","."other_com4_".$com4.","."other_com5_".$com5;
        
  		$channel1=$this->input->post('channel_partner_share1');
  		$channel2=$this->input->post('channel_partner_share2');
  		$channel3=$this->input->post('channel_partner_share3');
  		$channel4=$this->input->post('channel_partner_share4');
  		$channel5=$this->input->post('channel_partner_share5');
  		$channel="other_channel1_".$channel1.","."other_channel2_".$channel2.","."other_channel3_".$channel3.","."other_channel4_".$channel4.","."other_channel5_".$channel5;

  		$wallsnart1=$this->input->post('wallsnart_share1');
  		$wallsnart2=$this->input->post('wallsnart_share2');
  		$wallsnart3=$this->input->post('wallsnart_share3');
  		$wallsnart4=$this->input->post('wallsnart_share4');
  		$wallsnart5=$this->input->post('wallsnart_share5');
  		$wallsnart="other_wallsnart1_".$wallsnart1.","."other_wallsnart2_".$wallsnart2.","."other_wallsnart3_".$wallsnart3.","."other_wallsnart4_".$wallsnart4.","."other_wallsnart5_".$wallsnart5;
            }
               
               $data2=array('commission_type'=>$this->input->post('commission'),
               'size'=>$size,'license_cost_dollars'=>$lic_dol,'license_cost_rupees'=>$lic_rs,
               'commission_percentage'=>$commission,'channel_partner_share'=>$channel,
	        'wallsnart_share'=>$wallsnart
               );
                
               $data3=array('channel_partner_id'=>$id,'commission_type'=>$this->input->post('commission'),
               'size'=>$size,'license_cost_dollars'=>$lic_dol,'license_cost_rupees'=>$lic_rs,
               'commission_percentage'=>$commission,'channel_partner_share'=>$channel,
	        'wallsnart_share'=>$wallsnart,'submission_status_no'=>$id
               );
		    	
		    	$product_in="";
		    	$interest="";
				for($i=1;$i<=9;$i++)
				{
					//print('ck'.$i);
					if($this->input->post('ck'.$i))
					{
						$interest=$interest.",".$this->input->post('ck'.$i);
							
					}
			    }

                           for($j=1;$j<=6;$j++)
                              {
                                if($this->input->post('pro_ck'.$j))
					{ 
                                     $product_in= $product_in.",".$this->input->post('pro_ck'.$j);
                                   }
                              }

			    if($this->input->post('pacceptance')=='offlinesigned')
				{    if($_FILES["file1"]["name"])
				    {
					$contractfile=date('U').$_FILES["file1"]["name"];
                    move_uploaded_file($_FILES["file1"]["tmp_name"],"uploaded_pdf/".$contractfile);
				    }
					else
					{
						$contractfile="";
					}
				}
				else
				{
					$contractfile="";
				}
				
				
		    	$data=array('channel_partner_name'=>$this->input->post('partner_name'),'other_interests'=>$this->input->post('interest-other'),'address1'=>$this->input->post('address1'),'contact_person_name'=>$this->input->post('contact_person'),'product_types'=>$product_in,'product_sources'=>$this->input->post('pro_sources'),
		    		        'address2'=>$this->input->post('address2'),'designation'=>$this->input->post('designation'),
		    		        'city'=>$this->input->post('city'),'state'=>$this->input->post('state'),
		    		        'pin_code'=>$this->input->post('pincode'),'cp_id'=>$this->input->post('cp_id'),
		    		        'country'=>$this->input->post('country'),'first_name'=>$this->input->post('fname'),
		    		        'email_id'=>$this->input->post('email'),'last_name'=>$this->input->post('lname'),
		    		        'contact_no'=>$this->input->post('contact'),'area_of_interest'=>$interest,'contract_file_url'=>$contractfile);
                              $data5=array('images_product_types'=>$product_in);
                              $this->channel_partner_model->update_cp_img_search($data5,$this->input->post('cp_id'));

		    	$this->channel_partner_model->updateCp($data,$id);
                     $id_check=$this->channel_partner_model->check_commission_status($id);
		    	if($id_check){
                     $this->channel_partner_model->update_commission($data2,$id);}
                     else{

                         $this->channel_partner_model->add_commission_details($data3);
                      } 
		    	redirect('channel_partners/view_channel_partners');
		    }
		    $this->load->view('backend/dashboard_header');
		    $this->load->view('backend/edit_channel_partner',$data);
		    $this->load->view('backend/footer');
		}
		else
		{
			redirect('backend/index');

		}
	}	public function send_mail_channel_partner()
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
		$this->load->view('backend/send_mail_channel_partner',$data);
		$this->load->view('backend/footer');
	}
      else
          {
               redirect('backend/index');

            }
     }

	
	public function get_partner_mails()
	{
	    $parent_id=$this->input->post('partner_id');
	    $data=$this->channel_partner_model->get_all_email_byparent($parent_id);
	 
	   foreach($data as $mails)
	   {
		  print $mails['email_id'].',';
		 
	   }
	 
	
	}

	public function channel_partner()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/channel_partners');
		$this->load->view('backend/footer');
	}

	public function index()
    {
      if(!$this->session->userdata('id'))
      {
         redirect('backend/index');
      }
      else
      {
         redirect('channel_partners/dashboard');
      }
    }


    public function dashboard()
    {
    	if($this->session->userdata('id'))
      {
    	
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_dashboard');
		$this->load->view('backend/footer');
	  }
	   else
      {
         redirect('backend/index');
      }
		
    }



   //////////////////////     developed by ankit  on date 25/04/2013 session id for cp is 'id' not 'userid' ////////////////// 
	
public function changepwd()
{
	
   if($this->session->userdata('id')){
   	$data['msg']="";
	if(isset($_POST['addcpn']))
	{
         $pwd=$this->input->post('pwd');
         $npwd=$this->input->post('npwd');
         $cpwd=$this->input->post('cpwd');
          $dbpwd=$this->channel_partner_model->checkpassword($this->session->userdata('id'));
         if($npwd!=$cpwd)
         {
         	$data['msg']="New Password and Confirm password must be same";
         }
        
         else if($dbpwd->password==$pwd)
         {

            $this->channel_partner_model->changepassword($cpwd,$this->session->userdata('id'));
            $data['msg']="Your Password Changed Successfully";
         }
         else{
         	$data['msg']="Your old Password is incorrect";
         }

	}
      
        $this->load->view('backend/cp_dashboard_header');
	 $this->load->view('backend/changepassword',$data);
        $this->load->view('backend/footer');

   }else{
   	   redirect('backend/index');
   }
}

public function editcp()
{
	if($this->session->userdata('id'))
	{
       
         if(isset($_POST['addcpn']))
         {
         	$interest="";
				for($i=1;$i<=9;$i++)
				{
					
					if($this->input->post('ck'.$i))
					{
						$interest=$interest.",".$this->input->post('ck'.$i);
							
					}
			    }
			$data=array('other_interests'=>$this->input->post('interest-other'),'address1'=>$this->input->post('address1'),
		    		        'address2'=>$this->input->post('address2'),'city'=>$this->input->post('city'),
		    		        'state'=>$this->input->post('state'),'pin_code'=>$this->input->post('pin'),
		    		        'country'=>$this->input->post('country'),'first_name'=>$this->input->post('fname'),
		    		        'email_id'=>$this->input->post('email'),'last_name'=>$this->input->post('lname'),
		    		        'area_of_interest'=>$interest);
		    $this->channel_partner_model->updateCp($data,$this->session->userdata('id'));
		    $data['msg']="Profile Updated Successfully !! ";

         }
          $data['details']=$this->channel_partner_model->channelpartner($this->session->userdata('id'));

	     $this->load->view('backend/cp_dashboard_header');
	     $this->load->view('backend/editprofile',$data);
		 $this->load->view('backend/footer');
    }
    else
    {
    	redirect('backend/index');
    }
}
public function guidelines()
{
	$this->load->view('backend/cp_guidelines');
}

public function get_channel()
{	
	 
	 $data['partner']=$this->channel_partner_model->channelpartner($this->input->post('id'));
	 $this->load->view('backend/new_partner_table',$data);
	 
	
}
public function get_byinterest()
{
	//print $this->input->post('interest');
	$data['channel_partner']=$this->channel_partner_model->partner_byinterest($this->input->post('interest'));
    $this->load->view('search/partner_table',$data);
 
}

public function cp_active_images($per_page="")
	{
		if($this->session->userdata('id'))
		{
		 if(!$per_page)
		 {
			 $per_page='10';
		 }
$status='1';
		 $userid= $this->session->userdata('id');
		 $config['base_url'] = base_url().'index.php/channel_partners/cp_active_images/'.$per_page;
		 $config['total_rows'] =$this->channel_partner_model->count_images($userid,$status); 
		 $config['per_page'] = $per_page;
		 $config["uri_segment"] = 4;
	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($config);
		$data['per_page']= $per_page;	     	
	   $data['images']=$this->channel_partner_model->get_active_images($userid,$config['per_page'],$page,$status);
	   $data['links']=$this->pagination->create_links();
	   $data['total_images']= $config['total_rows'];
	   	$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_active_images',$data);
		$this->load->view('backend/footer');
		}
		else
		{
			redirect('backend/index');
		}
	}


	public function cp_image_status($per_page="")
	{
		if($this->session->userdata('id'))
		{
		 if(!$per_page)
		 {
			 $per_page='10';
		 }
		 $status='-1';
		 $userid= $this->session->userdata('id');
		 $config['base_url'] = base_url().'index.php/channel_partners/cp_image_status/'.$per_page;
		 $config['total_rows'] =$this->channel_partner_model->count_images($userid,$status); 
		 $config['per_page'] = $per_page;
		 $config["uri_segment"] = 4;
	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($config);
		$data['per_page']= $per_page;	     	
	   $data['images']=$this->channel_partner_model->get_active_images($userid,$config['per_page'],$page,$status);
	   $data['links']=$this->pagination->create_links();
	   $data['total_images']= $config['total_rows'];
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_image_status',$data);
		$this->load->view('backend/footer');
		}
		else
		{
				redirect('backend/index');
		}
	}
	
	public function cp_inactive_images($per_page="")
	{
		if($this->session->userdata('id'))
		{
		 if(!$per_page)
		 {
			 $per_page='10';
		 }
		 $status='0' ;
		 $userid= $this->session->userdata('id');
		 $config['base_url'] = base_url().'index.php/channel_partners/cp_inactive_images/'.$per_page;
		 $config['total_rows'] =$this->channel_partner_model->count_images($userid,$status); 
		 $config['per_page'] = $per_page;
		 $config["uri_segment"] = 4;
	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($config);
		$data['per_page']= $per_page;	     	
	   $data['images']=$this->channel_partner_model->get_active_images($userid,$config['per_page'],$page,$status);
	   $data['links']=$this->pagination->create_links();
	   $data['total_images']= $config['total_rows'];
	   
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_inactive_images',$data);
		$this->load->view('backend/footer');
		}
		else
		{
			redirect('backend/index');
	}
	}	

public function cp_waiting_images()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_waiting_images');
		$this->load->view('backend/footer');
	}

public function cp_upload_images()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_upload_images');
		$this->load->view('backend/footer');
	}

public function cp_track_uploads($per_page="")
	{
              if($this->session->userdata('id'))
		{
		if(!$per_page)
		{
			$per_page=10;
		}
		$userid= $this->session->userdata('id');
		
		 $config['base_url'] = base_url().'index.php/channel_partners/cp_track_uploads/'.$per_page;
		 $config['total_rows'] =$this->channel_partner_model->count_cp_images($userid); 
		 $config['per_page'] = $per_page;
		 $config["uri_segment"] = 4;
	     $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($config);
		
		$data['upload_dates']=$this->channel_partner_model->get_cp_image($userid,$config['per_page'],$page);
		 $data['links']=$this->pagination->create_links();	
		 $data['per_page']= $config['per_page'];		
	    $this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_track_uploads',$data);
		$this->load->view('backend/footer');
	}
else{

redirect('backend/index');

}
}


public function cp_sales()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_sales');
		$this->load->view('backend/footer');
	}
	
	public function cp_caption_guidelines()
	{
		//$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_guidelines');
		$this->load->view('backend/footer');
	}

public function cp_images_view_all()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_images_view_all');
		$this->load->view('backend/footer');
	}

public function cp_images_clicks()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_images_view_by_clicks');
		$this->load->view('backend/footer');
	}
	public function cp_images_search()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_images_view_by_search');
		$this->load->view('backend/footer');
	}

public function cp_images_converted()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_images_converted');
		$this->load->view('backend/footer');
	}



}?>