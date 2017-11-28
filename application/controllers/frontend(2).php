<?php 
ob_start();
use Aws\S3\S3Client;
define('IMAGE_PATH', APPPATH.'views/frontend/upload_images/');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Frontend extends CI_Controller
{                                                   //8979883081
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('cart');
		$this->load->library('email');
		$this->load->library('msg91');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('frontend_model');
		$this->load->model('user_model');
		$this->load->model('search_model');
		$this->load->model('cart_model');
		$this->load->library('CSVReader');
		$this->load->library('pagination');
		$this->load->database();
		/*parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$CI = & get_instance();
		$CI->config->load("facebook",TRUE);
		$config = $CI->config->item('facebook');
		$this->load->library('Facebook', $config);*/
		//$this->load->model('Facebook_model');
		// Load facebook library and pass associative array which contains appId and secret key
		$this->load->library('facebook', array('appId' => '819395858121513', 'secret' => 'deea14de0806284586299153cbc1a59b'));

		// Get user's login information
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$this->user = $this->facebook->getUser();
	}
	
	   public function photostoframe()
	{
		$_SESSION['page_id'] = '9';
		$this->load->view('frontend/header');
		$this->load->view('frontend/photostoart');
		$this->load->view('frontend/footer');
        if(!(isset($_SESSION['type'])) )	{
			$_SESSION['type'] = $_POST['category'];
		}	else{
		 	unset($_SESSION['type']);
		}
		unset($_SESSION['page_id']);
	}

	public function photostoart_inner()	{
 		$_SESSION['path'] = IMAGE_PATH;
 		$id = $_SESSION['user_info'];
		$_SESSION['user'] = $id;
		$data1 = 'photostoframe';
		$this->session->set_userdata('page',$data1); 
		$result = $this->frontend_model->get_images($id);
		if(isset($_SESSION['user'])){ 
			$data['mount_name']=$this->frontend_model->get_mount_name_web_price();
			$data['frame_cat']=$this->frontend_model->get_frame_cat_tbl_web_price();
			$data['frame_sizze']=$this->frontend_model->get_frame_size();
			$data['frame_color']=$this->frontend_model->get_frame_color_web_price();
			$this->load->view('frontend/header');
			$this->load->view('frontend/photostoart_inner',$data);
			$this->load->view('frontend/footer');
  		}	else{
  			//echo "<script>window.location.href='photostoart';</script>"; 
  		}
		unset($_SESSION['type']);
	}

	public function msg91()	{
		$this->form_validation->set_rules('sendTo', 'Mobile number', 'trim|required|regex_match[/^[0-9]{10}$/]');
		//echo "<pre>";
		//print_r($var);
		//echo "</pre>";
		$this->form_validation->set_rules('message', 'Text Message', 'trim|required');
		//print_r($var1);
		//die();
		$this->load->view('frontend/header');
		if ($this->form_validation->run() == FALSE)	{
			$this->load->view('frontend/message_form');	
		}	else 	{
			$to = $this->input->post('sendTo');
			$message = $this->input->post('message');//die();
			if($to) {
				if($this->msg91->send($to, $message) == TRUE)  {
					$this->session->set_userdata('update_status', '
					<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong><i class="dripicons-checkmark"></i> Hooray!</strong> Message Sent.
					</div>');
					redirect('frontend/msg91','refresh');
				}	else	{
					$this->session->set_userdata('update_status', '
					<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong><i class="dripicons-checkmark"></i> Oops!</strong> Message  not sent.
					</div>');
					redirect('frontend/msg91','refresh');
				}
			}
		}
		$this->load->view('frontend/footer');
	}


	public function get_web_frame_rate()	{
		$frame=$this->input->post('frame');
		$sql="select frame_rate from tbl_web_price where frame like '%".$frame."%'";
		$rows=  mysql_query($sql);
		$result=  mysql_fetch_assoc($rows);
		echo $result['frame_rate'];
	}

	public function get_web_mount_rate()	{
		$mount=  str_replace(' ', '', $this->input->post('mount'));
		$sql="select mount_rate from tbl_web_price where mount like '%".$mount."%'";
		$rows=  mysql_query($sql);
		$result=  mysql_fetch_assoc($rows);
		echo $result['mount_rate'];
	}
         
	public function get_web_glass_rate()	{
		$glass=  str_replace(' ', '', $this->input->post('glass'));
		$sql="select glass_rate from tbl_web_price where glass like '%".$glass."%'";
		$rows=  mysql_query($sql);
		$result=  mysql_fetch_assoc($rows);
		echo $result['glass_rate'];
	}
          
	public function image_delete()	{
		$name = $_POST['name'];
		$result = $this->frontend_model->delete_image($name);  
		if($result)
		$status = 'Image deleted successfully';
		else
		$status = 'Some Error Occur';	
		echo json_encode($status);
	}
	
	public function image_size(){
		if($_POST['url']){
				$id = $_POST['session_id'];
				$result = $this->frontend_model->get_images($id); 
				$url = base_url();
				for($i=0; $i<count($result); $i++){
			 	$k = $_POST['url'].$result[$i]->image_name;
			 	$image_dimention = getimagesize($k);	
			 	$image_width = $image_dimention[0]; 
			 	$image_height = $image_dimention[1];
			 	$data[] = $result[$i]->image_name.'*'.$image_width.'x'.$image_height;
			 }
		}else{
		 	$image_dimention = getimagesize($_POST['src']);	
		 	$image_width = $image_dimention[0]; 
		 	$image_height = $image_dimention[1]; 
		 	$data[] = $image_width.'x'.$image_height;
		 }
		echo json_encode($data);
	}
	
	public function image_user_size(){
		if($_POST['url']){
			if($this->session->userdata('userid')){
				$id = $this->session->userdata('userid');
				$result = $this->frontend_model->get_user_images($id);
			}else{
				$id = $_POST['session_id'];
				$result = $this->frontend_model->get_images($id); 
			}
			 $user = array('user' => $result[0]->session_id);
			 $this->session->set_userdata($user);
			 $url = base_url();
			 for($i=0; $i<count($result); $i++){
			 	$k = $_POST['url'].$result[$i]->image_name;
			 	$image_dimention = getimagesize($k);	
			 	$image_width = $image_dimention[0]; 
			 	$image_height = $image_dimention[1];
			 	$data[] = $result[$i]->image_name.'*'.$image_width.'x'.$image_height;
			 }
		}else{
		 	$image_dimention = getimagesize($_POST['src']);	
		 	$image_width = $image_dimention[0]; 
		 	$image_height = $image_dimention[1]; 
		 	$data[] = $image_width.'x'.$image_height;
		 }
		echo json_encode($data);
	}

	public function get_web_price_detail()	{
		$print_paper = $this->input->post('paper_type');
		$glass_rate  = $this->input->post('type');
		$result = $this->frontend_model->get_print_only($print_paper,$glass_rate);
		echo $result[1][0]->glass_rate;
	}

		public function result()	{
		$image_dimention = getimagesize($_POST['newpath']);	
		$imagewidth  = $image_dimention[0]; 
		$imageheight = $image_dimention[1];
		$image_dimention = getimagesize($_POST['src']);	
		$image_width  = $image_dimention[0]; 
		$image_height = $image_dimention[1];
		$image_status = '';  
		$max_width = $image_width/150;
		$max_height= $image_height/150;
		$size_array = array();
		$surface = 1;
		if($image_width >= $image_height)	{
			$image_ratio = $image_height/$image_width; 
			$image_alignment="horizontal";
			if($surface==1)	{			// canvas
				$size_array[0]['height']=4*$image_ratio;
				$size_array[0]['width']=4;
				$size_array[1]['height']=5*$image_ratio;
				$size_array[1]['width']=5;
				$size_array[2]['height']=6*$image_ratio;
				$size_array[2]['width']=6;
				$size_array[3]['height']=7*$image_ratio;
				$size_array[3]['width']=7;	

				$size_array[4]['height']=8*$image_ratio;
				$size_array[4]['width']=8;
				$size_array[5]['height']=10*$image_ratio;
				$size_array[5]['width']=10;
				$size_array[6]['height']=12*$image_ratio;
				$size_array[6]['width']=12;
				$size_array[7]['height']=16*$image_ratio;
				$size_array[7]['width']=16;
				$size_array[8]['height']=18*$image_ratio;
				$size_array[8]['width']=18;
				$size_array[9]['height']=20*$image_ratio;
				$size_array[9]['width']=20;
				$size_array[10]['height']=24*$image_ratio;
				$size_array[10]['width']=24;
				$size_array[11]['height']=28*$image_ratio;
				$size_array[11]['width']=28;
				$size_array[12]['height']=32*$image_ratio;
				$size_array[12]['width']=32;
				$size_array[13]['height']=36*$image_ratio;
				$size_array[13]['width']=36;
				$size_array[14]['height']=40*$image_ratio;
				$size_array[14]['width']=40;
				$size_array[15]['height']=44*$image_ratio;
				$size_array[15]['width']=44;
				$size_array[16]['height']=48*$image_ratio;
				$size_array[16]['width']=48;
				$size_array[17]['height']=50*$image_ratio;
				$size_array[17]['width']=50;
				$size_array[18]['height']=56*$image_ratio;
				$size_array[18]['width']=56;
				$size_array[19]['height']=60*$image_ratio;
				$size_array[19]['width']=60;
		
			}
			for($i=0;$i<=19;$i++)	{
				if($size_array[$i]['width']<= $max_width && $size_array[$i]['height']<=$max_height )	{
					$data_rec[]=round($size_array[$i]['width']).'X'.round($size_array[$i]['height']);
				}
			}
			$data_rec[]=$imagewidth.'X'.$imageheight;
			$data_rec[]=$max_width.'X'.$max_height;
			echo json_encode($data_rec);
		}
		else if($image_width<$image_height)	{
			$image_ratio = $image_width/$image_height; 
			$size_array[0]['width']=4*$image_ratio;
			$size_array[0]['height']=4;
			$size_array[1]['width']=5*$image_ratio;
			$size_array[1]['height']=5;
			$size_array[2]['width']=6*$image_ratio;
			$size_array[2]['height']=6;
			$size_array[3]['width']=7*$image_ratio;
			$size_array[3]['height']=7;

			$size_array[4]['width']=8*$image_ratio;
			$size_array[4]['height']=8;
			$size_array[5]['width']=10*$image_ratio;
			$size_array[5]['height']=10;
			$size_array[6]['width']=12*$image_ratio;
			$size_array[6]['height']=12;
			$size_array[7]['width']=16*$image_ratio;
			$size_array[7]['height']=16;
			$size_array[8]['width']=18*$image_ratio;
			$size_array[8]['height']=18;
			$size_array[9]['width']=24*$image_ratio;
			$size_array[9]['height']=24;
			$size_array[10]['width']=30*$image_ratio;
			$size_array[10]['height']=30;
			$size_array[11]['width']=36*$image_ratio;
			$size_array[11]['height']=36;
			$size_array[12]['width']=44*$image_ratio;
			$size_array[12]['height']=44;
			$size_array[13]['width']=48*$image_ratio;
			$size_array[13]['height']=48;
			$size_array[14]['width']=50*$image_ratio;
			$size_array[14]['height']=50;
			$size_array[15]['width']=56*$image_ratio;
			$size_array[15]['height']=56;
			$size_array[16]['width']=60*$image_ratio;
			$size_array[16]['height']=60;

			for($i=0;$i<=16;$i++)	{
				if($size_array[$i]['width']<= $max_width && $size_array[$i]['height']<=$max_height )	{
					$data_rec[]=round($size_array[$i]['width']).'X'.round($size_array[$i]['height']);
				}
			}
			$data_rec[]=$imagewidth.'X'.$imageheight;
			$data_rec[]=$max_width.'X'.$max_height;
			echo json_encode($data_rec);
		}
	}
	
 	public function get_default()	{
 	    $frame = $this->input->post('frame');
 	    $mount = $this->input->post('mount');
 		$result = $this->frontend_model->get_default($frame,$mount);
 	    $data[0] = $result[0][0]->frame.','.$result[0][0]->frame_rate.','.$result[0][0]->frame_size;
 		$data[1] = $result[1][0]->mount.','.$result[1][0]->mount_rate;
 		echo json_encode($data);
 	} 
	
	public function dropzone()	{
		if(!isset($_COOKIE['user_info'])){
			$user_info = "user_info";
			$info = $_SESSION['user_info'];
			setcookie($user_info, $info, time() + (86400 * 30), "/"); 
			$session_id  = $_SESSION['user_info'];
		}else{
			$session_id  = $_SESSION['user_info'];;
		}
		if (!empty($_FILES['file'])){
			
		for($i=0;$i<=count($_FILES['file']['name'])-1;$i++)	{
				$file_extn = explode(".", strtolower($_FILES['file']['name'][$i]));	
				$change_name[$i] = 'image'.uniqid(rand()).'.'.$file_extn[1];
				$temp = $_FILES['file']['tmp_name'][$i];
				$tmp_name = $_FILES['file']['tmp_name'][$i];
				$image_name = $change_name[$i];
				$image_type = $_FILES['file']['type'][$i];
				$image_size = $_FILES['file']['size'][$i];
				$max_width=417;
				$max_height=550;
				$sourcefile = $temp;
				$endfile = IMAGE_PATH.$image_name;
				$type = $image_type;
				switch($type)	{
					case'image/png':
					$img = imagecreatefrompng($sourcefile);
					break;
					case'image/jpeg':
					$img = imagecreatefromjpeg($sourcefile);
					break;
					case'image/gif':
					$img = imagecreatefromgif($sourcefile);
					break;
					case'image/jpg':
					$img = imagecreatefromjpeg($sourcefile);
					break;
					default : 
					return 'Un supported format';
				}

				$width = imagesx( $img );
				$height = imagesy( $img );

				if ($width > $height) {
					if($width < $max_width)
					$newwidth = $width;
					else
					$newwidth = $max_width;	
					$divisor = $width / $newwidth;
					$newheight = floor( $height / $divisor);
				}
				else {
					if($height < $max_height)
					$newheight = $height;
					else
					$newheight =  $max_height;
					$divisor = $height / $newheight;
					$newwidth = floor( $width / $divisor );
				}
				// Create a new temporary image.
				$tmpimg = imagecreatetruecolor( $newwidth, $newheight );
				imagealphablending($tmpimg, false);
				imagesavealpha($tmpimg, true);
				// Copy and resize old image into new image.
				imagecopyresampled( $tmpimg,$img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
				// Save thumbnail into a file.
				//compressing the file
				switch($type){
					case'image/png':
					imagepng($tmpimg, $endfile, 0);
					break;
					case'image/jpeg':
					imagejpeg($tmpimg, $endfile, 100);
					break;
					case'image/gif':
					imagegif($tmpimg, $endfile, 0);
					break;
				}
				// release the memory
				imagedestroy($tmpimg);
				imagedestroy($img);

				$data = array(
				'image_name'=>$image_name,
				'image_type'=>$image_type,
				'image_path'=>$tmp_name,
				'image_size'=> $image_size,
				'session_id'=>$session_id
				);
				
				if(move_uploaded_file($tmp_name,IMAGE_PATH.'original/'.$change_name[$i])){
					 $result =  $this->frontend_model->insert_image($data);
				}
			}
		}
	}

	public function get_input_dimention()	{
		$image_dimention = getimagesize($_POST['newpath']);
		$imagewidth  = $image_dimention[0];
		$imageheight = $image_dimention[1];
		$data = ''.$imagewidth.'X'.$imageheight;
		echo json_encode($data);
	}

	//End
	public function get_web_price_detials()	{
		$print_paper=$this->input->post('print_paper');
		$quality_range=$this->input->post('quality');
		$sql="select rate from tbl_web_price where paper='".$print_paper."' and quality='".$quality_range."'";
		$rows=  mysql_query($sql);
		$result=  mysql_fetch_assoc($rows);
		echo $result['rate'];
	}
	  
	public function clearance($value)	{
		$data['search_data']=$this->frontend_model->get_tbl_clearence($value);
		$this->load->view('frontend/header');
		$this->load->view('frontend/clearence',$data);
		$this->load->view('frontend/footer');
	}

	public function product_detail($filename,$size,$image_id)	{
		//echo $filename;
		//$data['avl_glass']=$avl_glass;
		$data['image_id']=$image_id;
		$data['prod_details']=$this->frontend_model->get_prod_details($filename,$size);
		$this->load->view('frontend/header');
		$this->load->view('frontend/clearnce_detail',$data);
		$this->load->view('frontend/footer');
	}

	public function index() {
		$search_api = "http://api.indiapicture.in/wallsnart/get_collection.php";
		$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
		$context = stream_context_create($opts);
		$search_data_raw = file_get_contents($search_api, false, $context);
		$search_data = json_decode($search_data_raw,TRUE);
		$data['api_collections']=$search_data;
		$this->load->view('frontend/header_home',$data);
		$this->load->view('frontend/homepage');
		$this->load->view('frontend/footer');
	}

	public function forget_mail() {
		$xrt['forget_emlid']=$_REQUEST['emailid'];
		//echo $xrt;die;
		//$this->frontend_model->update_passwrd($xrt);
		$this->load->view('frontend/header');
		$this->load->view('frontend/homepage');
		$this->load->view('frontend/footer',$xrt);
	}


	public function fblogin()	{
		$data['mode'] = "hello";
		$this->load->view('frontend/header_home',$data);
		$this->load->view('frontend/homepage',$data);
		$this->load->view('frontend/footer');
	}

	// Logout from facebook
	public function fblogout() {
		// Destroy session
		session_destroy();
		// Redirect to baseurl
		redirect(base_url());
	}

	public function about()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/about_wallsnart');
		$this->load->view('frontend/footer');
	}
        
	public function rooms($offset=0)	{
		$_SESSION['page_id'] = '6';
		$per_page = 10;  
		//$qry = "SELECT * FROM users ORDER BY `u_id` DESC";
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(6);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/rooms'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}   
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner(6,0,0);
		$this->load->view('frontend/header');
		$this->load->view('frontend/room',$data);
		$this->load->view('frontend/footer');
		unset($_SESSION['page_id']);
	}
        
	public function places($offset=0)	{
		$_SESSION['page_id'] = '7';
		$per_page = 10; 
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(7);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/places'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}   
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner(7,$config["per_page"], $offset); 
		$this->load->view('frontend/header');
		$this->load->view('frontend/places',$data);
		$this->load->view('frontend/footer');
		unset($_SESSION['page_id']);
	}
	
	public function searchframe()	{
		$this->load->view('frontend/header_frame');
		$this->load->view('search/search_view-frame');
		$this->load->view('frontend/footer');
	}

	public function themes($offset=0)	{
		$_SESSION['page_id'] = '8';
		$per_page = 10; 
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(8);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		//$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/themes'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}   
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner(8,$config["per_page"], $offset); 
		$this->load->view('frontend/header');
		$this->load->view('frontend/themes',$data);
		$this->load->view('frontend/footer');
		unset($_SESSION['page_id']);
	}


	public function art_advisory($offset=0)	{
		$per_page = 10; 
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(8);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		//$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/art_advisory'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}   
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner(8,$config["per_page"], $offset); 
		$this->load->view('frontend/header');
		$this->load->view('frontend/art_advisory',$data);
		$this->load->view('frontend/footer');
	}
	
	public function promooffer()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/promooffer');
		$this->load->view('frontend/footer');
	}

	public function returns()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/returan');
		$this->load->view('frontend/footer');
	}
	
	
	public function updateforpassword()	{
		$email_regd=$_POST['email_regd'];
		//echo trim($email_regd);
		$maill=$this->frontend_model->check_email_exist(trim($email_regd));
		$verify_email=$this->frontend_model->verify_email($email_regd);
		$first=$verify_email->first_name;
		$last=$verify_email->last_name;

		if(!empty($first)||!empty($last))	{
			$first_name=$first;
			$last_name=$last;
		}	else{
			$first_name=$email_regd;
		}
		// echo $email_regd;
		//print_r($username);die;
		//echo $maill;
		if($maill==1)	{
			//$imgfb=base_url();
			//$user_name=$this->frontend_model->get_user_details($email_regd);
			$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
			$password = hash('sha512', $salt.$firgetemailid);
			$pwrurl =base_url()."index.php/user/update_password?emailid=$email_regd&q=".$password;
			//echo $pwrurl;
			$message='<!DOCTYPE HTML>
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<title> password forget </title>
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
					<table id="Table_01" style="margin:0 auto" width="750" cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td colspan="4"><p><img src="'.base_url().'images/mahattaArt_logo.png" width="300"></p></td>
						</tr>
						<tr>
							<td colspan="4"><p>Dear '.$first_name.' '.$last_name.',</p></td>
						</tr>
						<tr>
							<td colspan="4"><p>We received a request to reset your Mahatta Art password.</p></td>
						</tr>
						<tr>
							<td colspan="4"><p><a href="'.$pwrurl.'">Click here</a> to change your password.</p></td>
						</tr>
						<tr>
							<td colspan="4">
								<p>For any query feel free to contact us: +91-8800639075, 011-41828972 or mail us: <a href="mailto:info@mahattaart.com">info@mahattaart.com</a></p>
								<p>To know more about us <a href="'.base_url().'">click here</a></p>
							</td>
						</tr>
						<tr>
							<td colspan="4"><p>Happy exploring!</p></td>
						</tr>
						<tr>
							<td style="vertical-align:top" width="150"><p>Mahatta Art Team</p></td>
						</tr>
						<tr>
							<td>
								<a href="https://www.facebook.com/mahattaart"><img src="'.base_url().'images/facebook.jpg" width="50px" height="50px"></a>
								<a href="https://www.linkedin.com/company/13458390"><img src="'.base_url().'images/linkdin.jpg" width="50px" height="50px"></a>
								<a href="https://twitter.com/mahattaart"><img src="'.base_url().'images/twitter.jpg" width="50px" height="50px"></a>
								<a href="https://www.instagram.com/mahattaart"><img src="'.base_url().'images/instagram.png" width="50px" height="50px"></a>
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align:center"><p></p><p>Having trouble seeing this email? Visit our <a href="'.base_url().'">Website</a></p></td>
						</tr>
					</table>
				</body>
			</html>';
			$this->email->clear(TRUE);
			$this->email->from('info@mahattaart.com', 'MahattaArt');
			$this->email->to(trim($email_regd));
			$this->email->cc('operations@mahattaart.com');
			$this->email->subject('Welcome to Mahatta Art');
			$this->email->message($message);
			$send=$this->email->send();
			if($send)	{
				//print "1";
				echo "Check Your mail box.";
				//echo $email_regd;       
			}	else{
				echo json_encode(array("result"=>"0"));
			}
		}	else	{
			echo "<br>This email is not registered.";
		}
	}

	public function curators()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/curators');
		$this->load->view('frontend/footer');
	}

	public function users($dir) {
		$dir1 = FCPATH.$dir; 
		if (is_dir($dir1)) {
		    $objects = scandir($dir1);
		    foreach ($objects as $object) {
		      if ($object != "." && $object != ".." && $object != "..." && $object != "...." ) {
		        if (filetype($dir1."/".$object) == "dir") 
		           make_users($dir1."/".$object); 
		        else unlink   ($dir1."/".$object);
		      }
		    }
		    reset($objects);
		    rmdir($dir1);
		}
 	}

	public function register()	{
		$maill=$this->frontend_model->check_email_exist($this->input->post('email_reg'));
		if($maill==1)	{
			echo "<br>This email is already registered.";
		}	else	{
			$first_name=$this->input->post('first_name');
			$last_name=$this->input->post('last_name');
			$email=$this->input->post('email_reg');
			$password=$this->input->post('passwordd');
			$quote="'";
			$this->frontend_model->insert_registeration($first_name,$last_name,$email,$password);
			//$this->frontend_model->update_user_status($user_id);
			//sent email to Admin
			$messages='<!DOCTYPE HTML>
			<html>
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
					<tr><td colspan="4"><p>Dear '.$first_name.' '.$last_name.'!</p></td></tr>
					<tr>
						<td colspan="4"><p>Thank you! For subscribing on <a href="'.base_url().'">MahattaArt.com</a></p></td>
					</tr>
					<tr>
						<td colspan="4"><p>We will keep you updated on our exclusive and latest collections!</p></td>
					</tr>
					<tr>
						<td colspan="4">
							<p>Mahatta Art is an online art gallery having 5.5 Lakh Images including Photography, Paintings, Poster & Illustrations from world renowned Collections and Artists. The content ranges from Abstracts to Nature photography, Legendary to Amateur artists, Heritage to Modern Indian art, Modern to Contemporary art, Humorous quotes to Serious & Hollywood Vintage posters and so on.</p>
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
			$this->email->clear(TRUE);
			$this->email->from('info@mahattaart.com', 'MahattaArt');
			$this->email->to($email);
			$this->email->cc('operations@mahattaart.com');
			$this->email->subject('Welcome to Mahatta Art');
			$this->email->message($messages);
			$send=$this->email->send();

			if($send)	{
				//print "1";
				//echo  $email;
				echo json_encode(array("result"=>"1"));
			}	else{
				// print "0";
				echo json_encode(array("result"=>"0"));
			}
		}
	}

	public function login()	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$user=$this->frontend_model->login_verification($email,$password);
		if($user->customer_id<>'')	{
			$this->session->set_userdata('userid',$user->customer_id);
			$this->session->set_userdata('email',$user->email_id);
			$user_id= $this->session->userdata('userid');
			$user_login= $this->frontend_model->check_user_login_sesion($user_id);
			$login_session_detals= $user_login[0]->login_session_detals; 
			echo json_encode(array("result"=>"1"));
		}	else{
			echo json_encode(array("result"=>"0"));//echo 'error';  
		}
	}

	public function logout()	{
		if($this->session->userdata('userid'))	{
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('url');
			$redi=base_url();
			redirect($redi);
		}	else{
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('url');
			redirect('frontend/index');
		}
	}


	public function register_success()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/register_success');
		$this->load->view('frontend/footer');
	}

	public function facebook_login()	{
	
	}

	public function forgot_password()	{
		$email=$this->input->post('email');
		$user=$this->frontend_model->verify_email($email);
		if($user)	{
			$this->email->from('info@mahattaart.com', 'MahattaArt');
			$this->email->to($email);
			$this->email->cc('operations@mahattaart.com');
			$this->email->subject('Your Password');
			$this->email->message('Your Password is :'.$user->password);
			$this->email->send();
			print "success";
		}
	}
	//public function verify_registration($user_id)
	//{
		//$this->frontend_model->update_user_status($user_id);
	//	$this->load->view('frontend/header');
	//	$this->load->view('frontend/verified_registration');
	//	$this->load->view('frontend/footer');

	//}

	public function mail_registration_confirm_front()	{
		$email_reg = $_POST['email_reg'];
		//echo $email_reg ;die;
		if($email_reg <>'')	{
		$frntfrgtpwd='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>india</title>
					<style>
						p { text-align:justify;	font-family: "Helvetica Neue",	Helvetica,	Arial,	sans-serif;	font-size:14px;	}
					</style>
				</head>
				<body style="background:#f2f2f2;	font-size:14px;	font-family: "Helvetica Neue",	Helvetica,	Arial,	sans-serif;">
					<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td bgcolor="#ede2ea"><table width="100%" border="0" cellspacing="0" cellpadding="0"></td>
						</tr>
						<tr><td><p><strong> Dear Customer ! </strong></p></td>
						</tr>
						<tr>
							<td> 
								<p>Thank you! For subscribing on Mahatta Art.com</p> 
								<p> We will keep you updated on our exclusive and latest collections! </p>
								Mahatta Art is an online art gallery having 5.5 Lakh Images including Photography, Paintings, Poster & Illustrations from world renowned Collections and Artists. The content ranges from Abstracts to Nature photography, Legendary to Amateur artists, Heritage to Modern Indian art, Modern to Contemporary art, Humorous quotes to Serious & Hollywood Vintage posters and so on. 
								<p>  Click here to know more about us  <a style="text-decoration:none;" href="'.base_url().'index.php/frontend/index"> link  </a> </p> 
								<p>  For any queries  email us at <a style="text-decoration:none;" href="mailto:info@mahattaart.com "> info@mahattaart.com </a>  or contact us at </p> 
								<p> <strong> Regards, </strong>  </p> 
								<p> <strong> Mahattaart Team </strong>  </p> 
								<p><a href="#"> <img style="padding: 0px 8px 0px 0px;" src="'.base_url().'assets/img/facbook.png" /> </a> <a href="#"> <img src="'.base_url().'assets/img/google.png" /> </a></p>
							</td>
						</tr>
					</table>
				</body>
			</html>';
		$to=$email_reg;   
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:Mahattaart <info@mahattaart.com>' . "\r\n";
		$headers .= 'Cc: operations@mahattaart.com' . "\r\n";
		$subject = 'Registration confirmation';
		$send=mail($email_reg,$subject,$frntfrgtpwd,$headers);
		}
	}

	public function career()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/careers');
		$this->load->view('frontend/footer');
	}

	public function partner()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/partners');
		$this->load->view('frontend/footer');
	}

	public function contact()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/contact_us');
		$this->load->view('frontend/footer');
	}

	public function faq()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/faqs');
		$this->load->view('frontend/footer');
	}

	public function findart()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/findart');
		$this->load->view('frontend/footer');
	}

	public function customize_art()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/customize_art');
		$this->load->view('frontend/footer');
	}

	public function ordering()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/ordering');
		$this->load->view('frontend/footer');
	}

	public function shipping()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/shipping');
		$this->load->view('frontend/footer');
	}

	public function terms_of_use()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/terms_of_use');
		$this->load->view('frontend/footer');
	}

	public function privacy_policy()	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/privacy_policy');
		$this->load->view('frontend/footer');
	}

	public function collection($offset=0)	{
		$_SESSION['page_id'] = '5';
		$per_page = 20;  
		//$qry = "SELECT * FROM users ORDER BY `u_id` DESC";
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(5);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/art_styles'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner(5,$config["per_page"], $offset); 
		$this->load->view('frontend/header');
		$this->load->view('frontend/collections',$data);
		$this->load->view('frontend/footer');
		unset($_SESSION['page_id']);
	}

	public function product_type($offset=0)	{
		$per_page = 20;  
		//$qry = "SELECT * FROM users ORDER BY `u_id` DESC";
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(4);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/art_styles'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}   
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner(4,$config["per_page"], $offset); 
		$this->load->view('frontend/header');
		$this->load->view('frontend/product_types');
		$this->load->view('frontend/footer');
	}

    public function artists($offset=0)	{
        $per_page = 20;
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(2);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/artists'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		$_SESSION['page_id'] = '3';
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}   
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner(2);
        $this->load->view('frontend/header');
        $this->load->view('frontend/artists',$data);
        $this->load->view('frontend/footer');
		unset($_SESSION['page_id']);
	}

	public function art_style($offset=0)	{
		$_SESSION['page_id'] = '4';
		$per_page = 20;  
		//$qry = "SELECT * FROM users ORDER BY `u_id` DESC";
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(3);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/art_styles'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner(3,$config["per_page"], $offset); 
		if(isset($_GET['f']))	{
			if($_GET['f']=='1')	{
				$datam=$this->frontend_model->count_rows_fine_art();
				$data['fine_more']=$this->frontend_model->fine_art($datam,'6');
				$data['f']=0;
			}	else	{
				$data['f']=1;
			}
			if($_GET['f']=='2')	{
				$datam=$this->frontend_model->count_rows_vintage_art();
				$data['vintage_more']=$this->frontend_model->vintage_art($datam,'6');
				$data['g']=0;
			}	else	{
				$data['g']=1;
			}
			if($_GET['f']=='3')	{
				$datam=$this->frontend_model->count_rows_indian_art();
				$data['indian_more']=$this->frontend_model->indian_art($datam,'6');
				$data['h']=0;
			}	else	{
				$data['h']=1;
			}
			if($_GET['f']=='4')	{
				$datam=$this->frontend_model->count_rows_photography();
				$data['photography_more']=$this->frontend_model->photography($datam,'6');
				$data['i']=0;
			}	else	{
				$data['i']=1;
			}
		}	else	{
			$data['f']=1;
			$data['g']=1;
			$data['h']=1;
			$data['i']=1;
		}
		$data['fine']=$this->frontend_model->fine_art('6','0');
		$data['indian']=$this->frontend_model->indian_art('6','0');
		$data['vintage']=$this->frontend_model->vintage_art('6','0');
		$data['photography']=$this->frontend_model->photography('6','0');
		$this->load->view('frontend/header');
		$this->load->view('frontend/art_styles',$data);
		$this->load->view('frontend/footer');
		unset($_SESSION['page_id']);
	}
	
	public function art_styles($offset=0)	{
		$_SESSION['page_id'] = '4';
		$per_page = 10;  
		//$qry = "SELECT * FROM users ORDER BY `u_id` DESC";
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(3);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/art_styles'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}   
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner(3);
		$this->load->view('frontend/header');
		$this->load->view('frontend/art_styles',$data);
		$this->load->view('frontend/footer');
		unset($_SESSION['page_id']);
	}
	
	public function art_subject($offset=0)	{
	
		$per_page = 20;  
		//$qry = "SELECT * FROM users ORDER BY `u_id` DESC";
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(1);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/art_subject'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		$_SESSION['page_id'] = '2';
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner('1');
		$this->load->view('frontend/header');
		$this->load->view('frontend/art_subjects',$data);
		$this->load->view('frontend/footer');
		unset($_SESSION['page_id']);
	}
	




	public function art_subjects1($offset=0)	{
		$per_page = 20;  
		//$qry = "SELECT * FROM users ORDER BY `u_id` DESC";
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->get_header_images_count(1);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/art_subject'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["sub_val"] = $this->frontend_model->get_header_images_inner('1',$config["per_page"], $offset); 
		$this->load->view('frontend/header');
		$this->load->view('frontend/art_subjects1',$data);
		$this->load->view('frontend/footer');
	}


	public function frame1()	{
		$this->load->view('frames/frame1');
	}
	public function frame2()	{
		$this->load->view('frames/frame1');
	}
	public function frame3()	{
		$this->load->view('frames/frame1');
	}
	public function frame4()	{
		$this->load->view('frames/frame1');
	}
	public function acrylic()	{
		$this->load->view('frames/acrylic');
	}
	public function cropping()	{
		$this->load->view('frames/cropping');
	}
	public function mats()	{
		$this->load->view('frames/mats');
	}
	public function price_details()	{
		$this->load->view('frames/price_details');
	}
	public function wall_color()	{
		$this->load->view('frames/wall_color');
	}
	public function mytest()	{
		$this->load->view('search/mytest');
	}
	public function gallery()	{
		if(!$this->session->userdata('userid'))	{
			redirect('frontend/index');
		}	else{
			if(isset($_GET['selected_lightbox_id']))	{
				$datum=$this->frontend_model->get_gall_to_ltbox($_GET['selected_lightbox_id']);
				$count=0;
				foreach($datum as $da)	{
					$left=$this->search_model->get_image_data($da->image_id);
					$demo[$count]=array('image_filename'=>$left->images_filename);
					$count++;
				}
				$demmos=$demo;
				echo json_encode($demmos);
			}	else	{

				$this->form_validation->set_rules('gal_input_box', 'gal_box', 'required');
				$user_id=$this->session->userdata('userid');
				if($this->form_validation->run()==TRUE)	{
					$lt_bx_nm=$_POST['gal_input_box'];
					$lt_bx_des=$_POST['text_area_gal'];
					$date=date();
					$this->frontend_model->insert_light_box_details($user_id,$lt_bx_nm,$lt_bx_des,$date);
				}
				$data['light']=$this->frontend_model->get_light_box_details($user_id);
				$data['img']=$this->frontend_model->get_image_id_for_gallery($user_id);
				$this->load->view('frontend/header');
				$this->load->view('frontend/gallery',$data);
				$this->load->view('frontend/footer');
			}
		}
	}

	public function store_in_gallery()	{
		if(!$this->session->userdata('userid'))	{
			redirect('frontend/index');
		}	else	{
			$user_id=$this->session->userdata('userid');
			$this->frontend_model->store_details_in_gallery($user_id,$_GET['image_id']);
			redirect("frontend/gallery");
		}
			
	}
	/*==================================================lightbox_start===============================================================================================================*/
	public function lightbox_dropdown()	{
		if(isset($_POST['lightbox_id'])&& isset($_POST['image_id'])&& isset($_POST['check']))	{
			$bol=$this->frontend_model->check_gall_to_ltbox($_POST['lightbox_id'],$_POST['image_id']);
			if($bol)	{
				print $bol;
			}	else{
				print (int)$bol;
			}
		}
		if(isset($_GET['lightbox_id'])&& isset($_GET['image_id']))	{
			$this->frontend_model->gall_to_ltbox($_GET['lightbox_id'],$_GET['image_id']);
			$datum=$this->frontend_model->get_gall_to_ltbox($_GET['lightbox_id']);
			$count=0;
			foreach($datum as $da)	{
				$left=$this->search_model->get_image_data($da->image_id);
				$demo[$count]=array('image_filename'=>$left->images_filename);
				$count++;
			}
			$demmos=$demo;
			echo json_encode($demmos);
		}
	}


	public function sendmailsure()	{
		$firgetemailid=$this->input->post('firgetemailid');
		// echo $firgetemailid;die;
		//echo $emailfrmtbl=$this->backend_model->check_customer_email();
		$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
		$password = hash('sha512', $salt.$firgetemailid);
		$pwrurl = "http://dev.wallsnart.com/index.php/frontend/?emailid=$firgetemailid&q=".$password;
		//echo $pwrurl;die;
		if($firgetemailid=='tamjsay7@gmail.com')	{
			//$frntfrgtpwd=$this->load->view('backend/forget_password.php');
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
							<tr>
								<td> <strong> Dear Customer ! </strong>  </td>
							</tr>
							<tr>
								<td> <p>  FORGOT PASSWORD? </p>   </td>
							</tr>
							<tr>
								<td> <p> Here is your temporary login Password. </p>  </td>
							</tr>
							<tr>
								<td>
									<p> <strong> USERNAME: </strong>'.$firgetemailid.'</p>  
									<p> <strong> PASSWORD: </strong>  '.$pwrurl.' </p>  
									<p> At your comfort , now you may login to mahattaart.com,change your temporary login password and explore the mahatta Art gallery!</p>
									<p>  For any queries email us at <a href="mailto:info@mahattaart.com"> info@mahattaart.com </a>  or contact us at  </p> 
									<p>   KEEP  EXPLORING WITH US !  </p> 
									<p> <strong>  Regards,  </strong> </p>
									<p> <strong> Mahatta Art Team  </strong> </p>
									<p> <a href="#"> <img style="padding: 0px 8px 0px 0px;" src="'.base_url().'assets/facbook.png" /> </a> <a href="#"> <img src="'.base_url().'assets/img/google.png" /> </a></p>
								</td>
							</tr>
						</table>
					</body>
				</html>';
			$to=$firgetemailid;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:Mahattaart <info@mahattaart.com>' . "\r\n";
			$subject = 'password confermation';
			$send=mail($firgetemailid,$subject,$frntfrgtpwd,$headers);
			if($send)	{
				echo 'Mail send successfully';
			}	else{
				echo 'mail sending error';
			}
		}	else{
			echo 'Invalide Username Please Try Again';
		}
	}



	public function lightbox($page_no=0,$offset=0)	{
		$check="";
		$lt_nm="";
		$lt_des="";
		$lightbox="";
		if(isset($_GET['check']))	{
			$check=$_GET['check'];
		}
		if(isset($_GET['lt_nm']))	{
			$lt_nm=$_GET['lt_nm'];
		}
		if(isset($_GET['lt_des']))	{
			$lt_des=$_GET['lt_des'];
		}
		if(isset($_GET['lightbox']))	{
			$lightbox=$_GET['lightbox'];
		}
		$data['page_no']=$page_no;
		$user_id=$this->session->userdata('userid');
		if($check=="1")	{
			$date=date('y-m-d');
			$inserted_id=$this->frontend_model->insert_light_box_details($user_id,$lt_nm,$lt_des,$date);
			if($inserted_id)	{
				$data['success']="Gallery Created";
			}	else	{
				$data['success']="This name already exists,Please Enter another one.";
			}
		}
		else if($check=="2")	{
			$check=$this->frontend_model->update_light_box_details($lightbox,$lt_nm,$lt_des);
			if($check)	{
				$data['success']="This value already exists,please select another one.";
			}	else	{
				$data['success']="Gallery updated.";
			}
		}
		$per_page = 10;  
		$config['first_link'] = false;
		$config['last_link'] = false;
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config["total_rows"] = $this->frontend_model->gallery_record_count($user_id);
		$config['per_page']= $per_page;
		$config['uri_segment'] = 3;
		$config['base_url']= base_url().'/index.php/frontend/lightbox'; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(3);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}   
		$qry .= "limit {$per_page} offset {$offset} ";
		$data["result"] = $this->frontend_model->get_all_lightboxes($user_id,$config["per_page"], $offset); 
		//$data["images"] = $this->frontend_model->get_all_lightboxes_images($user_id); 
		$this->load->view("frontend/header");
		$this->load->view("frontend/lightbox",$data);
		$this->load->view("frontend/footer");
	}

	public function myUpload()	{
		$user_id = $_POST['session_id'];
		$customer_id = $this->session->userdata('userid');
		$response = $this->frontend_model->user_for_photostoFrame($user_id,$customer_id);
		
		$this->load->view('frontend/header');
		$this->load->view('frontend/myUpload');
		$this->load->view('frontend/footer');
  	}

	public function lightbox_sorting($sortby)	{
		$user_id=$this->session->userdata('userid');
		$data['result']=$this->frontend_model->sorting_lightbox($sortby,$user_id);
		$data['option']=$sortby;
		$this->load->view("frontend/header");
		$this->load->view("frontend/lightbox",$data);
		$this->load->view("frontend/footer");
	}

	/* public function popup_submit()
	 {
	$light=$this->input->post('lightbox_id');

	$email1=$this->input->post('email1');
	$email2=$this->input->post('email2');
	$comment=$this->input->post('comment');
	$user_id=$this->session->userdata('userid');
	$data=$this->frontend_model->get_user_details($user_id);
	$email=$data->email_id;
	$this->email->from($email, Wallsnart);
	$this->email->to($email1);
	if($email2){
	$this->email->to($email2);
	}
	$this->email->subject('Wallsnart Lightbox');
	$this->email->message("hi" ."\n".
			"Warm Greetings from Wallsnart!"."\n"."\n"."Please find below the link of best images on the topics that you are interested in. If you like any image then please email us with your image details. If however, these images are not relevant to your area of interest, do email us with your client requirements and budget.
			And we could then share images that are more appropriate for you"."\n"."\n".
			base_url()."index.php/frontend/share_lightbox?light=".$light);
	$this->email->send();
	echo "your mail has been successfully sent.";
	} */

	public function popup_lightbox()	{
		$data['id']=$_GET['lightbox_id'];
		$this->load->view("frontend/popup",$data);
	}

	/* public function share_lightbox()
	 {

	$data['id']=$_GET['light'];
	$data['image']=$this->frontend_model->get_images_lightbox($_GET['light'],'1');
	$this->load->view('frontend/header');
	$this->load->view('frontend/lightbox_share',$data);
	$this->load->view('frontend/footer');

	} */
	public function edit_lightbox()	{
		$data['lt_id']=$_GET['lightbox_id'];
		$data['lt_nm']=$_GET['lightbox_name'];
		$data['filename']=$_GET['filename'];
		$data['result']=$this->frontend_model->get_lt_detail_row($_GET['lightbox_id'],$_GET['lightbox_name']);
		$this->load->view('frontend/edit_lightbox_page',$data);
	}

	
	public function lightbox_view($lightbox_id,$page_no=0,$offset=0)	{
		$per_page = 20;  
		$offset = ($this->uri->segment(4) != '' ? $this->uri->segment(4):0);
		$config["total_rows"] = $this->frontend_model->count_images_lightbox($lightbox_id);
		$config['per_page']= $per_page;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['uri_segment'] = 4;
		$data['page_no']=$page_no;
		$config['base_url']= base_url()."/index.php/frontend/lightbox_view/$lightbox_id/"; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(4);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}   
		$qry .= " limit {$per_page} offset {$offset} ";
		$data["image"] = $this->frontend_model->get_images_lightbox_gallery($lightbox_id,$config["per_page"], $offset); 
		$data['lightbox_id']=$lightbox_id;				
		$user_id=$this->session->userdata('userid');
		$this->load->view('frontend/header');
		$this->load->view('frontend/lightbox_view',$data);
		$this->load->view('frontend/footer');
	}

	public function themes_view($lightbox_id,$page_no,$offset=0)	{
		if($page_no=='')	{
			$page_no=1;
		}
		$per_page=20;
		$search_file="http://api.indiapicture.in/wallsnart/search_catagory.php?q=$lightbox_id&page=$page_no&per_page=$per_page";
		//print_r($search_file);
		$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
		$context = stream_context_create($opts);
		$search_data_file = file_get_contents($search_file, false, $context);
		$search_data_r = json_decode($search_data_file,TRUE);
		//print_r($search_data_r);die;
		$data['search_cat']=$search_data_r['data'];
		//$per_page = 5;  
		//$per_page = 10;  
		$offset = ($this->uri->segment(4) != '' ? $this->uri->segment(4):0);
		$config["total_rows"] = $search_data_r['total'];
		$config['per_page']= $per_page;
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] = 'First';
		$config['last_link'] = '';
		$config['uri_segment'] = 4;
		$data['page_no']=$page_no;
		$config['base_url']= base_url()."/index.php/frontend/themes_view/$lightbox_id"; 
		$config['suffix'] = ''.http_build_query($_GET, '', "&"); 
		$this->pagination->initialize($config);
		$this->data['paginglinks'] = $this->pagination->create_links();    
		$this->data['per_page'] = $this->uri->segment(4);      
		$this->data['offset'] = $offset ;
		if($this->data['paginglinks']!= '') {
			$this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
		}
		$qry .= " limit {$per_page} offset {$offset} ";
		//$data["image"] = $this->frontend_model->get_images_lightbox_gallery($lightbox_id,$config["per_page"], $offset); 
		$data['lightbox_id']=$lightbox_id;				
		$user_id=$this->session->userdata('userid');
		$this->load->view('frontend/header');
		$this->load->view('frontend/themes_view',$data);
		$this->load->view('frontend/footer');
	}

	public function create_image_intrested()	{   
		$name_to_image=$this->input->post('name_to_image');
		$email_to_image=$this->input->post('email_to_image');
		$contact=$this->input->post('contact_to_image');
		$city_to_image=$this->input->post('city_to_image');
		$painting_to_image=$this->input->post('painting_to_image');
		$des=$this->input->post('lightbox_des_of_image');
		$mail_filename=$this->input->post('mail_filename');
		$images_id=$this->input->post('images_id');	
		$img_id=$this->input->post('image_id_intrested');
		$mailto='info@mahattaart.com';
		//  $mailto='rohitdograbsc@gmail.com';
		//$user_id=$this->session->userdata('userid');
		$date=date('y-m-d h:t');
		$data=array('image_filename'=>$mail_filename,'name'=>$name_to_image,'mailid'=>$email_to_image,'phone'=>$contact,'city'=>$city_to_image,'printing_size'=>$painting_to_image,'message'=>$des,'create_on'=>$date,'images_id'=>$images_id);
		$this->frontend_model->create_image_intrested($data);
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
							<td bgcolor="#ede2ea"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						</table></td>
						</tr>
						<tr>
							<td>
								<p>  Intrested Details of Customer , </p>
								<p> Customer Name:<a href="#">'.$name_to_image.'</a></p>
								<p> Customer Email:<a href="#">'.$email_to_image.'</a></p>
								<p> Customer Contact:<a href="#">'.$contact.'</a></p>
								<p> Image Id:<a href="#">'.$images_id.'</a></p>
								<p> FileName:<a href="#">'.$mail_filename.'</a></p>
								<p> Painting Size:<a href="#">'.$painting_to_image.'</a></p>
								<p> Description:<a href="#">'.$des.'</a></p>
							</td>
						</tr>
						<tr>
						<td>
						<p>  Regards,  </p>
						<p>  Mahatt Art Team  </p> 
						<p> <a href="#"> <img style="padding: 0px 8px 0px 0px;" src="'.base_url().'assets/img/facbook.png" /> </a> <a href="#"> <img src="'.base_url().'assets/img/google.png" /> </a></p>
						</td>
						</tr>
					</table>
				</body>
			</html>';
		$to=$mailto;   
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:MahattaArt<info@mahattaart.com>' . "\r\n";
		$subject = 'Welcome to Mahatta Art';
		$send=mail($mailto,$subject,$message,$headers);
		if($send)	{
			echo 'Thank you for contacting us. We will get back to you shortly.';
		}	else	{
			echo "Some problem occurred.";
		}
	}

	public function create_lightbox()	{
		$light_name=$this->input->post('lightbox_name');
		$des=$this->input->post('lightbox_des');
		$img_id=$this->input->post('img_id');
		$user_id=$this->session->userdata('userid');
		$date=date('y-m-d');
		$lightbox_id=$this->frontend_model->insert_get_lightbox_id($user_id,$light_name,$des,$date);
		//$this->frontend_model->insert_light_box_images($lightbox_id,$img_id);
		$result=$this->frontend_model->get_only_last_lightbox($user_id,$lightbox_id);
		$data=array();
		$data['data1']=array($result->lightbox_name);
		$data['data2']=array($result->lightbox_id);
		echo json_encode($data);
	}
        
        
	public function GetLight_box_details() {
		$light_box_id=$this->input->post('light_box_id');
		$data=  $this->frontend_model->get_Gallery_images_lightbox_details($light_box_id);
		//$me= $data[0]['image_id'];
		foreach ($data as $values)	{
			$images_id.= '"'.$values->image_id.'",';
		}
		$newImages_id = rtrim($images_id, ",");
		$rows=$this->frontend_model->GetFilename_details($newImages_id);
		while($result=  mysql_fetch_assoc($rows))	{
			echo $result['images_filename']." \n";}
			//print_r($data);
	}
        
	public function get_light_boxName() {
		$img_id=$this->input->post('img_id');
		$userid=$this->session->userdata('userid');
		$light_boxName= $this->frontend_model->get_light_boxName($img_id,$userid);
		foreach ($light_boxName as $value){
			echo $lightbox_name=  $value->lightbox_name.' & ';
		}
		//echo $trim_ligtbox_name= trim($lightbox_name,',');
		//echo $light_boxName[0]->lightbox_name;
	}
        

	public function check_img_exist_status()	{
		$light_id=$this->input->post('lightbox_id');
		$filename=$this->input->post('imagesfilename');
		$api_image_id=$this->input->post('gallery_img_id');
		$image_id=$this->input->post('image_id');
		$image_size=$this->input->post('size');
		$image_price=$this->input->post('price');
		$print_type=$this->input->post('print_type');
		//  echo $light_id.'_'.$image_id;
		if(isset($_POST['check']))	{
			$this->frontend_model->insert_light_box_images($light_id,$image_id,$filename,$image_size,$image_price,$print_type);
			//$this->backend_model->restrict_filename($image_id);
			// $sql= "insert into tbl_lightbox_images set  lightbox_id='".$light_id."', image_id='".$image_id."', images_filename='".$filename."', status='1', image_size='".$image_size."', image_print_type='".$print_type."', price='".$image_price."' ";			
			//mysql_query($sql);
			$add_to_gallery = "http://api.indiapicture.in/wallsnart/function.php?param=add_to_gallery&images_id=$image_id";
			$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
			$context = stream_context_create($opts);
			$search_data_raw = file_get_contents($add_to_gallery, false, $context);
			$search_data = json_decode($search_data_raw,TRUE);
		}	else	{
			$bool=$this->frontend_model->check_existing_image_ltbox($light_id,$image_id,$image_size);
			echo $bool;
		}
	}




	public function check_img_exist_status22222()	{
		$light_id=$this->input->post('lightbox_id');
		$filename=$this->input->post('imagesfilename');
		$api_image_id=$this->input->post('gallery_img_id');
		$image_id=$this->input->post('image_id');
		$image_size=$this->input->post('size');
		$image_price=$this->input->post('price');
		$print_type=$this->input->post('print_type');
		//echo $api_image_id.'_'.$image_id;die;
		if(isset($_POST['check']))	{
			if(isset($_POST['cat_id']))	{
				$catgories_id=$this->input->post('cat_id');
				//$catgories_id=$this->search_model->get_image_category($images_id)->categories_id;
				$this->search_model->update_category_count($catgories_id);
				$this->search_model->insert_pop('add_to_gallery',$image_id,$catgories_id);
				//check image exist in pop table
				if(!$this->search_model->pop_image_exist($image_id))	{
					$this->search_model->insert_pop('add_to_gallery',$image_id,$catgories_id);
				}	else	{
					$this->search_model->update_pop('add_to_gallery',$image_id);
				}
			}
			$add_to_gallery = "http://api.indiapicture.in/wallsnart/function.php?param=add_to_gallery&images_id=$api_image_id";
			$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
			$context = stream_context_create($opts);
			$search_data_raw = file_get_contents($add_to_gallery, false, $context);
			$search_data = json_decode($search_data_raw,TRUE);
			//print_r($search_data);
			// echo $search_data['msg'];die;
			$this->frontend_model->insert_light_box_images($light_id,$image_id,$filename,$image_size,$image_price,$print_type);
			$this->backend_model->restrict_filename($image_id);
			echo "success";
		}	else	{
			$bool=$this->frontend_model->check_existing_image_ltbox($light_id,$image_id,$image_size);
			echo $bool;
		}
	}



	/*===============================================================lightbox_finish===========================================================================================*/
	
	public function frame_it($img_id="",$type="",$cost="",$bodered_size="",$size="",$image_name="",$quality="",$api_image_id="",$images_id="")	{
		$this->session->unset_userdata('page');
		$data['api_image_id']=$api_image_id;
		$data['images_id']=$images_id;
		$data['quality']=$quality;
		$data['f_shape']=$img_id;
		$data['img']=$img_id;
		$data['img_details']=$this->search_model->get_image_data($img_id);
		//$data['img_shape']=$this->search_model->get_image_shape($img_id);
		$data['frame_sizze']=$this->frontend_model->get_frame_size();
		$data['frame_cat']=$this->frontend_model->get_frame_cat_tbl_web_price();
		$data['frame_color']=$this->frontend_model->get_frame_color_web_price();
		$data['mount_name']=$this->frontend_model->get_mount_name_web_price();
		$data['price']=$cost;
		$data['type']=$type;
		$data['wo_bodered_size']=$bodered_size;
		$data['size']=$size;
		$data['image_name']=$image_name;
		$src ="http://www.indiapicture.in/wallsnart/398/$image_name";
		$dest = "frame_images/" . basename($src);
		file_put_contents($dest, file_get_contents($src));
		///echo "sajid";
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/frame_it_page',$data);
		$this->load->view('frontend/footer');
	}

	public function get_frame_code_web_price()	{
		$frame_cat=$this->input->post('frame_cat');
		$this->db->select('*');
		$this->db->where('frame_category',$frame_cat);
		$this->db->where_not_in('frame_code','');
		$query=$this->db->get('tbl_web_price');
		$xx=$query->result();
		//print_r($xx);
		foreach($xx as $frame_code)	{
			$f_code=$frame_code->frame_code;
			$f_size=$frame_code->frame_size_inch;
			$f_name=$frame_code->frame;
			$f_color=$frame_code->frame_color;
			$f_rate=$frame_code->frame_rate;
			$f_name=$frame_code->frame;
			$frame_size_mm=$frame_code->frame_size;
			$availablity=$frame_code->availablity;
			$array_f_code[]=$f_code.','.$f_name.','.$f_size.','.$f_color.','.$f_rate.','.$f_name.','.$frame_size_mm.','.$availablity;
			//print_r($array_f_code);
		}
		echo json_encode($array_f_code);
	}

	public function get_frame_by_frame_color()	{
		$FrameSize=$this->input->post('FrameSize');
		$frame_color=$this->input->post('frame_color');
		$this->db->select('*');
		if($FrameSize!="")	{
			// echo "not blank";
			$this->db->where('frame_size',$FrameSize);
			$this->db->where_not_in('frame_category','');
		}	else{
			// echo "blank";
			$this->db->where('frame_color',$frame_color);
		}
		$query=$this->db->get('tbl_web_price');
		$result=$query->result();
		//	print_r($result);
		foreach($result as $frame_d)	{
			$frame_c=$frame_d->frame_code;
			$f_size=$frame_d->frame_size_inch;
			$f_name=$frame_d->frame;
			$f_color=$frame_d->frame_color;
			$f_rate=$frame_d->frame_rate;
			$f_name=$frame_d->frame;
			$frame_size_mm=$frame_d->frame_size;
			$availablity=$frame_d->availablity;
			$frame_code[]=$frame_c.','.$f_name.','.$f_size.','.$f_color.','.$f_rate.','.$f_name.','.$frame_size_mm.','.$availablity;
			//print_r($frame_code);
		}
		echo  json_encode($frame_code);
	}

	public function get_all_mount_for_slide()	{
		$mount=$this->input->post('mount');
		//echo $mount;
		$this->db->select('mount_code,mount_rate,mount,availablity');
		$this->db->where_not_in('mount_code','');
		if($mount!='')	{
			$this->db->where('mount',$mount);
		}
		$query=$this->db->get('tbl_web_price');
		foreach($query->result() as $mount_d)	{
			$mount_code=$mount_d->mount_code;
			$mount_rate=$mount_d->mount_rate;
			$mount_name=$mount_d->mount;
			$availablity=$mount_d->availablity;
			$array[]=$mount_code.','.$mount_rate.','.$mount_name.','.$availablity;
			//return $mount_d;
		}
		//print_r($array);
		echo json_encode($array);
		//echo $array;
		//print_r($xx);
	}
	
	public function artist_alphabetic_search()	{
		if(isset($_GET['search_text']))	{
			$text=$_GET['search_text'];
			$data['txt']=$text;
		}	else if(isset($_GET['search_txt']))	{
			$text=$_GET['search_txt'];
			$data['txt']=$text{0};
			$data['txts']=$text;
		}

		$data['artist']=$this->frontend_model->get_artist_name($text);
		$this->load->view('frontend/header');
		$this->load->view('frontend/artist_alphabetic_search',$data);
		$this->load->view('frontend/footer');
	}
	
	

	public function delete_lightbox($lightbox_id,$page_no)	{
		$this->frontend_model->delete_lightbox($lightbox_id);
		$this->frontend_model->delete_lightbox_images($lightbox_id);
		redirect('lightbox/'.$page_no);
	}

	public function share_lightbox()	{
		$user_id=$this->session->userdata('userid');
		$emailto=$this->input->post('email_to');
		$message=$this->input->post('message');
		$subject=$this->input->post('subject');
		$lightbox_id=$this->input->post('lightbox_id');
		$data=$this->frontend_model->get_user_details($user_id);
		$email=$data->email_id;
		// sending gallery share email to user
		//$this->email->from($email, 'Wallsnart');
		//$this->email->to($emailto);
		//$this->email->subject($subject);
		/*$this->email->message("Hi There"."\n".
		"Please find the below link to view my gallery" ."\n"."\n".
		base_url()."index.php/frontend/lightbox_view?lightbox_id=".$lightbox_id.'&page=1&per_page=16'   
		);
		$this->email->send();*/
		$verify_email=$this->frontend_model->get_user_details($user_id);
		//print_r();
		$first=$verify_email->first_name;
		$last=$verify_email->last_name;
		if(!empty($first)||!empty($last))	{
			$first_name=$first;
			$last_name=$last;
		}	else{
			$first_name=$first_name->$email_id;
		}
		if($user_id!='')	{
			//$frntfrgtpwd=$this->load->view('backend/forget_password.php');
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
									<p>  Dear Customer , </p>
									<p> Your friend '.ucfirst($first_name).'  '.ucfirst($last_name).' knew you would love this and has shared this gallery with you . Just have a look Mahatta Art gallery products. </p>
									<p>Please <a href="'.base_url().'index.php/frontend/lightbox_view?lightbox_id='.$lightbox_id.'&page=1&per_page=16">Click here</a> to view gallery.</p>
									<p>To know more about Mahatta Art gallery <a href="'.base_url().'">click here </a></p>
									<p>For any queries call us at <a href="#">+91-11-41828972<a/> or email us at <a href="mailto:info@mahattaart.com"> info@mahattaart.com </a></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>  Regards,  </p>
									<p>  Mahatta Art Team  </p> 
									<p> <a href="#"> <img style="padding: 0px 8px 0px 0px;" src="'.base_url().'assets/img/facbook.png" /> </a> <a href="#"> <img src="'.base_url().'assets/img/google.png" /> </a></p>
								</td>
							</tr>
						</table>
					</body>
				</html>';
			$to=$emailto;   
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:MahattaArt<info@mahattaart.com>' . "\r\n";
			$subject = 'Welcome to Mahatta Art';
			$send=mail($emailto,$subject,$message,$headers);
		}
		$this->session->set_flashdata('share_message',"Gallery Shared Successfully.");
		redirect('frontend/lightbox');
	}

	public function share_ShoppingCartlightbox()	{
		$user_id=$this->session->userdata('userid');
		$emailto=$this->input->post('email_to');
		$message=$this->input->post('message');
		$subject=$this->input->post('subject');
		$lightbox_id=$this->input->post('lightbox_id');
		$data=$this->frontend_model->get_user_details($user_id);
		$email=$data->email_id;
		// sending gallery share email to user
		$this->email->from($email, 'Wallsnart');
		$this->email->to($emailto);
		$this->email->subject($subject);
		$this->email->message("Hi There"."\n".
		"Please find the below link to view my gallery" ."\n"."\n".
		base_url()."index.php/frontend/lightbox_view1?lightbox_id=".$lightbox_id.'&page=1&per_page=16'   
		);
		$this->email->send();
		$this->session->set_flashdata('share_message',"Gallery Shared Successfully.");
		redirect('cart/cart_view');
	}

	public function lightbox_view1()	{
		$page="";
		$per_page="";
		$img_id="";
		if(isset($_GET['img_id']))	{
			$img_id=$_GET['img_id'];
		}
		$lightbox_id=$_GET['lightbox_id'];
		if(isset($_GET['page']))	{
			$page=$_GET['page'];
		}
		if(isset($_GET['per_page']))	{
			$per_page=$_GET['per_page'];
		}
		if($page==1)
		$start=0;
		else
		$start = ($page-1)*$per_page;
		$limit = $per_page;
		if($img_id)	{
			$this->frontend_model->change_status($lightbox_id,$img_id);
		}
		$user_id=$this->session->userdata('userid');
		$data['id']=$lightbox_id;
		$data['image']=$this->frontend_model->get_images_lightbox($start,$limit,$lightbox_id,'1');
		$data['resultant']=$this->frontend_model->get_all_lightboxes($user_id);
		$data['count']=$this->frontend_model->count_images_lightbox($lightbox_id);
		$data['page']=$page;
		$data['per_page']=$per_page;
		$this->load->view('frontend/header');
		$this->load->view('frontend/lightbox_view1',$data);
		$this->load->view('frontend/footer');
	}

	public function take_newsletter()	{
		$email=$this->input->post('email_newsletter');
		if($email!='Your Email Address')
		$this->frontend_model->newsletter_entry($email);
		$url=base_url();
		redirect($url);
	}

	public function remove_gallery_image($image_id,$lightbox_id,$page_no)	{
		$this->frontend_model->delete_gallery_image($image_id,$lightbox_id);
		redirect("lightbox_view/".$lightbox_id."/".$page_no."");
	}

	public function test()	{
		$size1 = getimagesize("http://www.indiapicture.in/wallsnart/158/FLPT_EU_0154.JPG");
		$size2 = getimagesize("http://www.indiapicture.in/wallsnart/158/EVRM_HCDLCGA_EC561_H.JPG");
		print_r($size1);
		print $size1[0]/$size1[1];
		//print_r($size2);
	}

	public function set_sizes()	{
		$obj=new CSVReader();
		$result=$obj->parse_file('C:\xampp\htdocs\wallsnart\application\controllers\7.csv');
		//print "<pre>";
		//print_r($result);
		//$count=0;
		for ($i=0;$i<count($result);$i++)	{
			$data=array(
			'image_original_width'=> $result[$i]['Width'],
			'image_original_height'=> $result[$i]['height'],
			'image_original_size'=> $result[$i]['Size']
			);
			//$this->frontend_model->update_image_exist($result[$i]['id'],$data);
			print "UPDATE `tbl_images_search` SET `image_original_width` = ".$result[$i]['Width'].", `image_original_height` = ".$result[$i]['height'].", `image_original_size` = ".$result[$i]['Size']." WHERE `images_filename` = '".$result[$i]['id']."';";
			//print $result[$i]['Width']."<br>";
			//$count++;
		}
		//print $count." Out of results: ".count($result);
	}

	public function submit_email()	{
		$email=$this->input->post('email_newsletter');
		$date=date('m/d/Y h:i:s', time());
		/*$this->form_validation->set_rules('email_newsletter','Email','trim|required|valid_email');
		if($this->form_validation->run()==true)
		{*/
		$user=$this->frontend_model->submit_subscriber($email,$date);
		$this->email->from($email);
		//$this->email->to('sweta.khushi2012@gmail.com', 'Wallsnart');
		$this->email->to('info@mahattaart.com', 'Mahattaart');
		$this->email->subject('Newsletter');
		$this->email->message('New user '.$email.' has been registered ');
		if($this->email->send())	{
			redirect();
		}	else{
			redirect();
		}
	}

	public function query()	{
		$email=$this->input->post('email');
		$contact=$this->input->post('contact');
		$date=date('m/d/Y h:i:s', time());
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('contact','Contact','required');
		if($this->form_validation->run()==true)	{
			$user=$this->frontend_model->query_submit($email,$contact,$date);
			$subject="Help";
			$this->email->from('info@mahattaart.com');
			$this->email->to('$email', 'Mahattaart');
			$this->email->cc('operations@mahattaart.com', 'Mahattaart');
			$this->email->subject($subject);
			$this->email->message('New user With email address :'.$email.'and Phone number :'.$contact.' has registered  a query with us through help');
			$this->email->send();
			echo('Your Request has been registered you will be contacted <br/> shortly by our sales team ');
		}	else	{
			redirect('frontend/help');
		}
	}

	public function query_normal()	{
		$email=$this->input->post('email');
		$contact=$this->input->post('contact');
		$date=date('m/d/Y h:i:s', time());
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('contact','Contact','required');
		/*if($this->form_validation->run()==true)
		{*/
		$user=$this->frontend_model->query_submit($email,$contact,$date);
		$subject="Query From Need Help? ";
		$this->email->from($email);
		$this->email->to('info@mahattaart.com', 'Mahattaart');
		$this->email->cc('operations@mahattaart.com', 'Mahattaart');
		$this->email->subject($subject);
		$this->email->message('New user With email address :'.$email.'and Phone number :'.$contact.' has registered  a query with us ');
		if($this->email->send())	{
			//echo('Your Request has been registered you will be contacted <br/> shortly by our sales team ');
			$this->session->set_flashdata('help_message',"Thank you for your query our client executive will get in touch with you shortly.");
			redirect('frontend/homepage');
		}	else	{
			redirect('frontend/contact_us');
		}
	}

	public function help()	{
		$this->load->view('frontend/help1');
	}

	public function help_normal()	{
		$this->load->view('frontend/help');
	}

	public function save_frame()	{
		//echo 'asdas';
		$data = $_POST['data'];
		$file = md5(uniqid()) . '.png';
		// remove "data:image/png;base64,"
		$uri =  substr($data,strpos($data,",")+1);
		// echo $uri;
		// $dest = "framed_images/" .$file;
		// save to file
		file_put_contents('600/'.$file, base64_decode($uri));
		//file_put_contents($dest, base64_decode($uri));
		// return the filename
		echo $file; 
    }
  
	public function download_frame()	{
		$file = trim($this->uri->segment(3));
		move_uploaded_file($file,'uploaded_pdf');
		redirect('cart/cart_view/'.$file);
		// force user to download the image
		/*     if (file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: image/png');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		unlink($file);
		exit;
		}
		else {
		echo "$file not found";
		}*/
	}

	public function frame_new($img_id="",$type="",$cost="",$size="",$image_name="")	{
		$data['img']=$img_id;
		$data['img_details']=$this->search_model->get_image_data($img_id);
		$data['img_shape']=$this->search_model->get_image_shape($img_id);
		$data['price']=$cost;
		$data['type']=$type;
		$data['size']=$size;
		$data['image_name']=$image_name;
		$src = "http://www.indiapicture.in/wallsnart/398/$image_name";
		$dest = "frame_images/" . basename($src);
		file_put_contents($dest, file_get_contents($src));
		$this->load->view('frontend/header');
		$this->load->view('frontend/frame_it_page',$data);
		$this->load->view('frontend/footer');
	}
    
	public function frameit_addtocart()	{
		$print_size=$this->input->post('images_size');
		$images_price=$this->input->post('images_price');
		$img_id=$this->input->post('img_id');
		$user_id=$this->input->post('user_id');
		$mat_color=$this->input->post('mat_color');
		$mat_size=$this->input->post('mat_size');
		$frameSize=$this->input->post('frameSize');
		$frame_color=$this->input->post('frame_color');
		$imagsTypes=$this->input->post('image_type');
		$FrameCost=$this->input->post('FrameCost');
		$mount_color=$this->input->post('mount_color');
		$MountCost=$this->input->post('MountCost');
		$glasses_coste=$this->input->post('glasses_coste');
		$glasses=$this->input->post('glasses');
		$total_price=$this->input->post('total_price');
		$paper_surface=$this->input->post('paper_surface');
		$final_frame_size=$this->input->post('final_frame_size');
		$images_filename=$this->input->post('image_namee');
		date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$product_size=$this->input->post('product_size');
		$print_value = $this->input->post('print_v');
		if($img_id!=''){
			if($print_value!='')	{
				if($print_value=='canvas_only')	{
					$canvas_only='canvas';
					$frame_c = $frame_color;
					$this->frontend_model->canvas_frame_type($frame_c);
				}	else{
					$canvas_only='print';
					$frame_c=0;
					$user_id=$user_id;
				}
				if($this->session->userdata('page'))	{
					echo $path = 1;
				}	else{
					echo $path = 0;
				}
				$data=array('cart_id'=>'','image_print_type'=>$paper_surface,'image_id'=>$img_id,'qty'=>1,'user_id'=>$user_id,'frame_size'=>'0','frame_color'=>$frame_c,'frame_cost'=>'0','mount_size'=>'0','mount_color'=>'0','mount_cost'=>'0','glass_type'=>'0','glass_cost'=>'0','price'=>$total_price,'updated_price'=>'','total_price'=>'','image_size'=>$print_size,'images_price'=>$images_price,'image_name'=>$images_filename,'create_date'=>$date, 'path'=>$path);
				$check1=$this->frontend_model->check_cart_details($user_id,$img_id,$paper_surface,$print_size);			 
			}	else{
				if($this->session->userdata('page'))	{
					echo $path = 1;
				}	else{
					echo $path = 0;
				}
				$res=array('cart_id'=>'', 'image_print_type'=>$paper_surface, 'image_id'=>$img_id, 'qty'=>1, 'user_id'=>$user_id, 'frame_size'=>$frameSize, 'frame_color'=>$frame_color, 'frame_cost'=>$FrameCost, 'mount_size'=>$mat_size,'mount_code'=>$mount_color, 'mount_color'=>$mat_color, 'mount_cost'=>$MountCost, 'glass_type'=>$glasses, 'glass_cost'=>$glasses_coste, 'price'=>$total_price,'total_price'=>$total_price, 'updated_price'=>'', 'image_size'=>$print_size,'framed_image_size'=>$final_frame_size,'images_price'=>$images_price, 'image_name'=>$images_filename, 'create_date'=>$date, 'path'=>$path,'size'=>$product_size);
				$data=array_map('trim',$res);
				$check1= $this->frontend_model->check_cart_details($user_id,trim($img_id),trim($paper_surface),$print_size,$frame_color,trim($mat_color),trim($glasses));
			}
			print_r($data);
			$user_id=$this->session->userdata('userid');   
			if($check1==0)	{
				$insert=$this->frontend_model->insert_into_cart($data);
			}	elseif($check1==1)	{
				if($print_value=='')	{
					$check2= $this->frontend_model->get_cart_details($user_id,$img_id,$paper_surface,$print_size,$frame_color,$mat_color,$glasses);
				}	else{
					$check2= $this->frontend_model->get_cart_details($user_id,$img_id,$paper_surface,$print_size);
				}
				$framed_image_size=$check2[0]->frame_size;
				if($framed_image_size!='')	{
					foreach($check2 as $frameddata)	{
						$qty=$frameddata->qty;
						// echo 'qua'.$qty.'qua';
						$update_qty=$qty+1;
						$price=$frameddata->price;
						$update_price=(($price/$qty)*$update_qty);
						$data3=array('qty'=>$update_qty,'price'=>$update_price);
						if($print_value=='')	{
							$insert=$this->frontend_model->update_qty_frame_for_cart($print_size,$paper_surface,$images_filename,$data3,$frame_color,$mat_color,$glasses); 
						}	else{
							$insert=$this->frontend_model->update_qty_for_cart($print_size,$paper_surface,$images_filename,$data3);
						}
					}  
				} 
			}
			elseif($check1==2)	{
				$check2= $this->frontend_model->get_cart_details($user_id,$img_id,$paper_surface,$print_size);
				foreach($check2 as $frameddata)	{
					$frame_size=$frameddata->frame_size;
					if($frame_size==1)	{
						$qty=$frameddata->qty;
						$update_qty=$qty+1;
						$price=$frameddata->price;
						$update_price=(($price/$qty)*$update_qty);
						$data3=['qty'=>$update_qty,'price'=>$update_price];
						$insert=$this->frontend_model->update_qty_frame_for_cart($print_size,$paper_surface,$images_filename,$data3);    
					}   
				}
			}    
		}
		echo "1";
	}

	public function update_customer()	{
		$name=$this->input->post('name');
		$getpurpose=$this->input->post('getpurpose');
		$company_name=$this->input->post('company_name');
		$lastname=$this->input->post('lastname');
		$pincode=$this->input->post('pincode');
		$address=$this->input->post('address');
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$phone=$this->input->post('phone');
		$email_reciept=$this->input->post('email_reciept');
		$data=array('first_name'=>$name,
		'zip_code'=>$pincode,'address'=>$address,'city'=>$city,'state'=>$state,'contact'=>$phone,'last_name'=>$lastname,'email_reciept'=>$email_reciept,'purpose'=>$getpurpose
		);
		//print_r($data);
		$this->frontend_model->update_customer($data);
	}
    
	
	public function update_qty_for_cart()	{
		$frame_s=$this->input->post('frame_s');
		$imgsize=$this->input->post('imgsize');
		$mainqty=$this->input->post('mainqty');
		$papersurface=$this->input->post('papersurface');
		$qty=$this->input->post('v');
		$filenam=$this->input->post('filenam');
		$updprice=$this->input->post('imgprice');
		$frame_name=$this->input->post('frame_name');
		$mount_name=$this->input->post('mount_name');
		$glass=$this->input->post('glass');
		$main_price=($updprice/$mainqty);
		$each_price=round($main_price,2);
		$updated_price=round(($each_price*$qty),2);
		$data=array('qty'=>$qty,'price'=>$updated_price);
		if($frame_s==0)	{
			$result=$this->frontend_model->update_qty_for_cart($imgsize,$papersurface,$filenam,$data);
			echo $result;
		}	else if($frame_s>0)	{
			$result=$this->frontend_model->update_qty_frame_for_cart($imgsize,$papersurface,$filenam,$data,$frame_name,$mount_name,$glass);
			echo $result;
		}
	}
    
	public function save_frame_details()	{
		$user_id=$this->session->userdata('userid');
		$image_id=$this->input->post('imageid');
		$data=array('frame_width'=>$this->input->post('framewidth'),'frame_price'=>$this->input->post('frameprice'),
		'mat_price'=>$this->input->post('matprice'),'print_price'=>$this->input->post('printprice'),
		'total'=>$this->input->post('total'),'user_id'=>$user_id,'image_id'=>$this->input->post('imageid'),
		'frame_id'=>$this->input->post('frameid'),'glass_price'=>$this->input->post('glassprice'));
		$check= $this->frontend_model->check_frame_details($user_id,$image_id);
		if($check==0)	{
			$frame_id = $this->frontend_model->insert_user_frame_details($data);
		}	else	{
			$this->frontend_model->update_user_frame_details($data,$user_id,$image_id);
		}
		$d = $this->frontend_model->get_id($user_id,$image_id);
		foreach($d as $a)	{
			$data1=array('price'=>$this->input->post('total'),'frame_name'=>$this->input->post('image_name'),'frame_id'=>$a->id,'frame_or_print'=>1);
			$data2=array('image_id'=>$this->input->post('imageid'),'cart_quantity'=>1,'user_id'=>$user_id,'frame_id'=>$a->id,'price'=>$this->input->post('total'),'frame_name'=>$this->input->post('image_name'),'image_size'=>$this->input->post('printsize'),'image_print_type'=>$this->input->post('type'),'frame_or_print'=>1,'image_name'=>$this->input->post('image'));
			$check1= $this->frontend_model->check_cart_details($user_id,$image_id);
			if($check1==0)	{
				$this->frontend_model->insert_cart_details($data2);
			}	else	{
				$this->frontend_model->update_crt($data1,$user_id,$image_id);
			}
		}
		// $frame_values=$this->frontend_model->get_frame_values($frame_id);
	}

	public function save_cart_details()	{
		$user_id=$this->session->userdata('user_id');
		$image_id=$this->input->post('image_id');
		$image_filename=$this->input->post('image_filename');
		$total_size=$this->input->post('total_size');
		$action_method=$this->input->post('action_method');

		if($action_method=='search')	{
			$data2=array('image_id'=>$image_id,'cart_quantity'=>1,'user_id'=>$user_id,'price'=>'100','image_size'=>$total_size,'image_print_type'=>$this->input->post('type'),'image_name'=>$image_filename,'frame_or_print'=>0);
		}	else{
			$data2=array('image_id'=>$this->input->post('imageid'),'cart_quantity'=>1,'user_id'=>$user_id,'price'=>$this->input->post('printprice'),'image_size'=>$this->input->post('printsize'),'image_print_type'=>$this->input->post('type'),'image_name'=>$this->input->post('imagename'),'frame_or_print'=>0);
		}
		$check1= $this->frontend_model->check_cart_details($user_id,$image_id);
		if($check1==0)	{
			$this->frontend_model->insert_into_cart($data2);
		}	else	{
			$this->frontend_model->update_crt($data2,$user_id,$image_id);
		}
	}

	public function frame_detail($id)	{
		$data['details']=$this->frontend_model->frame_detail($id);
		$this->load->view('frontend/frame_detail',$data);
	}

	public function room_view()	{
		$this->load->view('frontend/room_view2');
	}

	public function larger_image()	{
		$this->load->view('frontend/larger_image');
	}

	public  function save_user_login_details($user_id,$url,$ipaddress)	{
		$data2=array('user_id'=>$user_id,'login_session_detals'=>$url,'system_ip'=>$ipaddress);
		$check1= $this->frontend_model->check_user_login_details($user_id);
		if($check1==0)	{
			$this->frontend_model->track_login_details($data2);
		}	else	{
			$this->frontend_model->update_track_login_details($data2,$user_id);
		}
	}   
}
?>
