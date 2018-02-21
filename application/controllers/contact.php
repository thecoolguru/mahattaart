<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {


public function __construct()
{
  parent::__construct();
  $this->load->library(array('email'));
}



function process()
 {
	 $dname=$this->input->post('dname');
	 $user_email=$this->input->post('demail');
	 $dmobile=$this->input->post('dmobile');
	 $dcity=$this->input->post('dcity');
	 $dtarea=$this->input->post('dtarea');
	 
	$admin_message= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>india</title>
      <style> p { text-align:justify; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:14px;} </style>
    </head>

    <body style="background:#f2f2f2; font-size:14px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;">
      <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#ede2ea"><table width="100%" border="0" cellspacing="0" cellpadding="0"></table></td>
        </tr>
        <tr>
          <td>Name:</td><td>'.$dname.'</td>
        </tr>
		<tr>
          <td>Email:</td><td>'.$user_email.'</td>
        </tr>
		<tr>
          <td>Mobile:</td><td>'.$dmobile.'</td>
        </tr>
		<tr>
          <td>City:</td><td>'.$dcity.'</td>
        </tr>
		<tr>
          <td>Message:</td><td>'.$dtarea.'</td>
        </tr>
        
      </table>
    </body>
    </html>';
	
	
	 $message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>india</title>
      <style> p { text-align:justify; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:14px;} </style>
    </head>

    <body style="background:#f2f2f2; font-size:14px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;">
      <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#ede2ea"><table width="100%" border="0" cellspacing="0" cellpadding="0"></table></td>
        </tr>
        <tr>
          <td>
            <p>  Dear '.$dname.' ,</p>
            <p>Welcome to Mahatta art ! </p> 
            <p> We found that you we facing some problem regarding our services  and even mailed us . Our specialized team was trying to call you to fix your problem but was not able to get through. We apologize for that. Please contact us on <a href="#">+91-8800639075 </a> or you can even email us at <a href="mailto:info@wallsnart.com"> info@mahattaart.com </a>  So that we can solve your queries and serve you better. </p>
            <p>Thanks for co-operating !</p>
          </td>
          </tr>
        <tr>
          <td>
            <p> Regards,</p>
            <p> Mahattaart Team </p> 
            <p> <a href="#"> <img style="padding: 0px 8px 0px 0px;" src="<?= echo base_url();?>assets/img/facbook.png" /> </a> <a href="#"> <img src="<?= echo base_url();?>assets/img/google.png" /> </a></p>
            </td>
        </tr>
      </table>
    </body>
    </html>';

/*Send Mail To Admin*/
					  

$config = Array( 
'protocol' => 'smtp', 
'smtp_host' => 'ssl://smtp.googlemail.com', 
'smtp_port' => 465, 
'smtp_user' => 'shahabalam78@gmail.com', // here goes your mail 
'smtp_pass' => '7870364530', // here goes your mail password 
'mailtype' => 'html', 
'charset' => 'iso-8859-1', 
'wordwrap' => TRUE 
);

$this->email->initialize($config);    
$this->email->set_newline("rn"); 
$this->email->from('mahattaart.com'); // here goes your mail 
$this->email->to('shahabalam3628@gmail.com');// here goes your mail 
$this->email->subject('This is s testing Email from mahattaart.com'); 
$this->email->message($message); 
//$this->email->send();
 							
						
						
                      if($this->email->send())
					  {
                           echo 'Thank you for contacting us. We will get back to you shortly';
                      }
                      else
                      {
                        echo "Something Errorr.Please Check";
						echo $this->email->print_debugger(); 
					  
					  }
}

 
 function sendprocess()
 { 
  $this->load->library('email');
              //grab the post data
  $this->email->from($this->input->post('myemail'), $this->input->post('myname'));
  $this->email->to('info@wallsnart.com'); 
  $this->email->cc('marketing@indiapicture.in'); 
  $this->email->subject('Enquiry From After Ten Minutes PopUp');
  $this->email->message($this->input->post('mymobile'),$this->input->post('mycity')); 
  $this->email->message('Hi, This Enquiry is from client side. '."\n"."\n"
					.'Email:  '.$this->input->post('myemail')
					."\n"."\n"
					.'Name:  '.$this->input->post('myname')
					."\n"."\n"
			     	.'Mobile:  '.$this->input->post('mymobile')
					."\n"."\n"
					.'Company:  '.$this->input->post('mycomp')
					."\n"."\n"
					.'City    :  '.$this->input->post('mycity')
			);



        

			
  
  if($this->email->send())
  {
     echo 'Thank you for contacting us. We will get back to you shortly.';
  }
  else
  {
   echo "Some problem occurred.";
  }   
 }
}