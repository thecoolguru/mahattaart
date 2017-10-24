<?php 
class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('list_helper');
		$this->load->model('frontend_model');
		$this->load->model('user_model');
		$this->load->model('search_model');
		$this->load->model('cart_model');
		//$this->load->database();

	}
	public function index()
	{
		if($this->session->userdata('userid')){
			$user_id=$this->session->userdata('userid');
			$user_data=$this->user_model->get_user_details($user_id);
		}


		if(!$user_data->first_name && !$this->cart->contents())
		{
			redirect('user/profile');
		}
		else if($this->cart->contents())
		{
			foreach($this->cart->contents() as $image){
				$data=array('image_id'=>$image['id'],'image_name'=>$image['name'],'price'=>$image['price'],'cart_quantity'=>$image['qty'],'price'=>$image['subtotal'],'user_id'=>$this->session->userdata('userid'));


				$this->cart_model->add_cart($data);

					
			}
			redirect('cart/cart_view');
		}
		else
		{
			redirect('frontend/index');
		}
	}

	public function profile()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect('frontend/index');
		}
		else { $data['msg']="";
		$userid=$this->session->userdata('userid');
		$this->form_validation->set_rules('pwd','Password','required');
		if($this->form_validation->run()==true)
		{//echo 'test';
		

			$data=array('email_id'=>$this->input->post('email'),

					'password'=>$this->input->post('pwd'),
					'first_name'=>$this->input->post('fname'),
					'last_name'=>$this->input->post('lastname'),
					'address'=>$this->input->post('address'),
					'country'=>$this->input->post('country'),
					'zip_code'=>$this->input->post('zip'),
					'contact'=>$this->input->post('phone'), 
					'gender'=>$this->input->post('gender'),
					'martial_status'=>$this->input->post('mstatus'),
					'company_name'=>$this->input->post('company_name') 
			);
//print_r($data);
			$this->user_model->update_user_detail($data,$userid);
			$data['msg']="You Have Successfully Updated Your Profile";
		}

		//$userid=$this->session->userdata('userid');
		$data['detail']=$this->user_model->get_user_details($userid);
		//print_r($data['detail']);
		$this->load->view('frontend/header');
		$this->load->view('user/profile',$data);
		$this->load->view('frontend/footer');
			
		}
	}

// starts for update profile
public function update_password()
	{
            $passwordnew=$this->input->post('passwordnew');
		$data['emailid']=$_REQUEST['emailid'];
                 
                //$passwordnew=$_REQUEST['passwordnew'];
        //echo $emailid;die;
		if($this->session->userdata('userid'))
		{
			redirect('frontend/index');
		}
		else { 
			
			
		

		$this->load->view('frontend/header');
		$this->load->view('user/update_pwd',$data);
		$this->load->view('frontend/footer');
			
		}
	}
// starts shorlisted methode from beta.mahattart to mahattaart by sajid

public function order_history($response){
      // echo $xxx;die;
	  $data['response']=$response;
        $this->load->view('frontend/header');
		$this->load->view('user/orderhistory',$data);
		$this->load->view('frontend/footer');

}

public function order_details_of_history($order_id){
	 $data['order_idd']=$this->user_model->order_details_of_history($order_id);
	 //print_r($xxx);die;
	//echo $order_id;
	$this->load->view('frontend/header');
	$this->load->view('user/order_details',$data);
	$this->load->view('frontend/footer');
	
	}
// Ends shorlisted methode from beta.mahattart to mahattaart by sajid
public function update_pwd()
	{
            $passwordnew=$this->input->post('passwordnew');

             $passwordconfirm=$this->input->post('passwordconfirm');
        
		 $emaill=$this->input->post('email');
              

   //echo $emaill;die;
                
		if($this->session->userdata('userid'))
		{
			redirect('frontend/index');
		}
		else { 
                   $verify_email=$this->frontend_model->verify_email($emaill);
       $first=$verify_email->first_name;
       $last=$verify_email->last_name;
if(!empty($first)||!empty($last)){
   $first_name=$first;
    $last_name=$last;
   }
else{
  $first_name="User";

}
    
			
			$this->user_model->update_user_password($passwordnew,$emaill);
		$data['msg']="You Have Successfully Updated Your Password";
                //$data['msg']="Please Password donot Match";

		$this->load->view('frontend/header');
		$this->load->view('user/update_pwd',$data);
		$this->load->view('frontend/footer');
			 if($emaill!=''){
        
$frntfrgtpwd='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>india</title>
<style> p { text-align:justify; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:14px;} </style>
</head>
<body style="background:#f2f2f2; font-size:14px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;">
<table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#ede2ea"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    </table></td>
  </tr>
    <tr><td><p>Dear '.ucfirst($first_name).'  '.ucfirst($last_name).', </p></td></tr>
  <tr><td><p>Your Password has been successfully changed !</p></td></tr>
  <tr><td><p>Your new password is - <a href="#">'.$passwordnew.'</a></p></td></tr>
  <tr>
    <td><p>Keep exploring the Mahatta art gallery, an online art gallery with 2500+ Indian & International artists and more content from archival museum collections with over 5 lac+ art works.</p></td>
  </tr>
  <tr>
    <td> 
	 <p>For any queries  email us at  <a href="mailto:info@mahattaart.com">info@mahattaart.com</a> or contact us at <a href="#">+91-8800639075, +91-11-41828972</a> </p>
<p>Regards,</p> 
<p>Mahattaart Team</p>
<p><a href="https://www.facebook.com/mahattaart"> <img style="padding: 0px 8px 0px 0px;" src="'.base_url().'assets/img/facbook.png" /> </a> <a href="https://twitter.com/mahattaart"> <img style="padding: 0px 8px 0px 0px;" src="'.base_url().'assets/img/twitter.png" /> </a> <a href="https://www.instagram.com/mahattaart"> <img src="'.base_url().'assets/img/instagram.png" /> </a> <a href="https://www.linkedin.com/company/13458390"> <img src="'.base_url().'assets/img/linkdin.png" /> </a></p>
	</td>
  </tr>
</table>
</body>
</html>';
         
        
      $to=$emaill;   
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:MahattaArt<info@mahattaart.com>' . "\r\n";
$headers .= 'Cc: operations@mahattaart.com' . "\r\n";
$subject = 'Welcome to Mahatta Art';
        $send=mail($emaill,$subject,$frntfrgtpwd,$headers);
        //$this->session->set_flashdata('You Have Successfully Updated Your Password.");
        redirect('frontend/index');
     }


             
		}
	}




}
?>