<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Frontend extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('cart');
		$this->load->library('email');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('frontend_model');
		$this->load->model('user_model');
		$this->load->model('search_model');
		$this->load->model('cart_model');
		$this->load->library('CSVReader');
		$this->load->database();
		/*parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$CI = & get_instance();
        $CI->config->load("facebook",TRUE);
        $config = $CI->config->item('facebook');
        $this->load->library('Facebook', $config);*/
		$this->load->model('Facebook_model');
	

	}
	
	public function index()
	{	
		$fb_data = $this->session->userdata('fb_data');

		$data = array(
					'fb_data' => $fb_data,
					);
					//echo "<pre>";
					//print_r($fb_data);
					//exit;
					
		
		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/homepage');
		$this->load->view('frontend/footer');
		// Try to get the user's id on Facebook
		/*$userId = $this->facebook->getUser();

		// If user is not yet authenticated, the id will be zero
		if($userId == 0){
			// Generate a login url
			$data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
			$this->load->view('frontend/header', $data);
		} else {
			// Get user's data and print it
			$user = $this->facebook->api('/me');
			print_r($user);
		}*/
		
		
	}
	public function about()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/about_wallsnart');
		$this->load->view('frontend/footer');
	}

	public function register()
	{
		if($this->frontend_model->check_email_exist($this->input->post('email_reg')))
		{
			print "<br>This email is already registered.";
		}
		else
		{
			$email=$this->input->post('email_reg');
			$password=$this->input->post('password');
		
			$this->frontend_model->insert_registeration($email,$password);
			$this->frontend_model->update_user_status($user_id);
	
			//$user=$this->frontend_model->verify_email($email);

			//sent email to user
			//$this->email->from('www.wallsnart.in', 'Wallsnart');
			//$this->email->to($email);
			//$this->email->subject('Welcome to WallsnArt!');
			//$this->email->message('Hi '."\n"."\n"
				//	.'You have registered on WallsnArt.'
					//."\n"."\n"
					//.'Please follow this link to confirm your registration'
					//."\n"
					//.base_url().'index.php/frontend/verify_registration/'.$user->customer_id
					//."\n"
					//.'(You can also copy and paste the url into your browser.)'
					//."\n"."\n"
					//.'WallsnArt Team'
					//."\n"
					//.'www.wallsnart.in'
					//."\n"."\n"."\n"
					//.'This is an automatically generated email. Please do not reply'
			//);
			//$this->email->send();
			//print base_url().'index.php/frontend/verify_registration/'.$user->customer_id ;
			print "successful";
		}
	}

	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		
		$user=$this->frontend_model->login_verification($email,$password);
		if($user)
		{
			$this->session->set_userdata('userid',$user->customer_id);
			$this->session->set_userdata('email',$user->email_id);
			//print $this->session->userdata('userid');
			print "successful";
		}
		else
		{
			print "error";
		}

	}
	public function logout()
	{
		if($this->session->userdata('userid'))
		{
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('url');
			redirect('frontend/index');

		}
	}


	public function register_success()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/register_success');
		$this->load->view('frontend/footer');
	}

	public function facebook_login()
	{
	
	}

	public function forgot_password()
	{
		$email=$this->input->post('email');
		$user=$this->frontend_model->verify_email($email);
		if($user)
		{
			$this->email->from('admin@wallsnart.com', 'Wallsnart');
			$this->email->to($email);
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
	public function career()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/careers');
		$this->load->view('frontend/footer');
	}

	public function partner()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/partners');
		$this->load->view('frontend/footer');
	}

	public function media_center()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/media_center');
		$this->load->view('frontend/footer');
	}

	public function contact()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/contact_us');
		$this->load->view('frontend/footer');
	}
	public function faq()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/faqs');
		$this->load->view('frontend/footer');
	}

	public function findart()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/findart');
		$this->load->view('frontend/footer');
	}

	public function customize_art()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/customize_art');
		$this->load->view('frontend/footer');
	}

	public function ordering()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/ordering');
		$this->load->view('frontend/footer');
	}
	public function shiping()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/shipping_and_delivery');
		$this->load->view('frontend/footer');
	}
	public function terms_of_use()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/terms_of_use');
		$this->load->view('frontend/footer');
	}
	public function privacy_policy()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/privacy_policy');
		$this->load->view('frontend/footer');
	}
	public function collection()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/collections');
		$this->load->view('frontend/footer');
	}
	public function product_type()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/product_types');
		$this->load->view('frontend/footer');
	}
    public function artists()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/artists');
        $this->load->view('frontend/footer');
    }
	public function art_style()
	{
		if(isset($_GET['f']))
		{
			if($_GET['f']=='1')
			{
				$datam=$this->frontend_model->count_rows_fine_art();
				$data['fine_more']=$this->frontend_model->fine_art($datam,'6');
				$data['f']=0;
			}
			else
			{
				$data['f']=1;
			}
			if($_GET['f']=='2')
			{
				$datam=$this->frontend_model->count_rows_vintage_art();
				$data['vintage_more']=$this->frontend_model->vintage_art($datam,'6');
				$data['g']=0;
			}
			else
			{
				$data['g']=1;
			}
			if($_GET['f']=='3')
			{
				$datam=$this->frontend_model->count_rows_indian_art();
				$data['indian_more']=$this->frontend_model->indian_art($datam,'6');
				$data['h']=0;
			}
			else
			{
				$data['h']=1;
			}
			if($_GET['f']=='4')
			{
				$datam=$this->frontend_model->count_rows_photography();
				$data['photography_more']=$this->frontend_model->photography($datam,'6');
				$data['i']=0;
			}
			else
			{
				$data['i']=1;
			}
		}
		else
		{
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
	}
	public function art_subject()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/art_subjects');
		$this->load->view('frontend/footer');
	}
	public function artist()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/artists');
		$this->load->view('frontend/footer');
	}


	public function frame1()
	{
		$this->load->view('frames/frame1');
	}
	public function frame2()
	{
		$this->load->view('frames/frame1');
	}
	public function frame3()
	{
		$this->load->view('frames/frame1');
	}
	public function frame4()
	{
		$this->load->view('frames/frame1');
	}
	public function acrylic()
	{
		$this->load->view('frames/acrylic');
	}
	public function cropping()
	{
		$this->load->view('frames/cropping');
	}
	public function mats()
	{
		$this->load->view('frames/mats');
	}

	public function price_details()
	{
		$this->load->view('frames/price_details');
	}
	public function wall_color()
	{
		$this->load->view('frames/wall_color');
	}
	public function mytest()
	{
		$this->load->view('search/mytest');
	}
	public function gallery()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect('frontend/index');
		}
		else{
			if(isset($_GET['selected_lightbox_id']))
			{
				$datum=$this->frontend_model->get_gall_to_ltbox($_GET['selected_lightbox_id']);
				$count=0;
				foreach($datum as $da)
				{
					$left=$this->search_model->get_image_data($da->image_id);
					$demo[$count]=array('image_filename'=>$left->images_filename);
					$count++;
				}
				$demmos=$demo;
				echo json_encode($demmos);
			}
			else
			{

				$this->form_validation->set_rules('gal_input_box', 'gal_box', 'required');
				$user_id=$this->session->userdata('userid');
				if($this->form_validation->run()==TRUE)
				{
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

	public function store_in_gallery()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect('frontend/index');
		}
		else
		{
			$user_id=$this->session->userdata('userid');
			$this->frontend_model->store_details_in_gallery($user_id,$_GET['image_id']);
			redirect("frontend/gallery");
		}
			
	}
	/*==================================================lightbox_start===============================================================================================================*/
	public function lightbox_dropdown()
	{
		if(isset($_POST['lightbox_id'])&& isset($_POST['image_id'])&& isset($_POST['check']))
		{
			$bol=$this->frontend_model->check_gall_to_ltbox($_POST['lightbox_id'],$_POST['image_id']);
			if($bol){
				print $bol;
			}
			else{print (int)$bol;
			}
		}
		if(isset($_GET['lightbox_id'])&& isset($_GET['image_id']))
		{
			$this->frontend_model->gall_to_ltbox($_GET['lightbox_id'],$_GET['image_id']);
			$datum=$this->frontend_model->get_gall_to_ltbox($_GET['lightbox_id']);
			$count=0;
			foreach($datum as $da)
			{
				$left=$this->search_model->get_image_data($da->image_id);
				$demo[$count]=array('image_filename'=>$left->images_filename);
				$count++;
			}
			$demmos=$demo;
			echo json_encode($demmos);

		}
	}

	public function lightbox()
	{
		$check="";
		$lt_nm="";
		$lt_des="";
		$lightbox="";
		if(isset($_GET['check'])){
			$check=$_GET['check'];
		}
		if(isset($_GET['lt_nm'])){
			$lt_nm=$_GET['lt_nm'];
		}
		if(isset($_GET['lt_des'])){
			$lt_des=$_GET['lt_des'];
		}
		if(isset($_GET['lightbox'])){
			$lightbox=$_GET['lightbox'];
		}
		$user_id=$this->session->userdata('userid');
		if($check=="1")
		{
			$date=date('y-m-d');
			$inserted_id=$this->frontend_model->insert_light_box_details($user_id,$lt_nm,$lt_des,$date);
			if($inserted_id)
			{
				$data['success']="Gallery Created";
			}
			else
			{
				$data['success']="This name already exists,Please Enter another one.";
			}

		}
		else if($check=="2")
		{
			$check=$this->frontend_model->update_light_box_details($lightbox,$lt_nm,$lt_des);
			if($check)
			{
				$data['success']="This value already exists,please select another one.";
			}
			else
			{
				$data['success']="Gallery updated.";
			}

		}

		$data['result']=$this->frontend_model->get_all_lightboxes($user_id);
		$this->load->view("frontend/header");
		$this->load->view("frontend/lightbox",$data);
		$this->load->view("frontend/footer");

	}
	public function lightbox_sorting($sortby)
	{
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

	public function popup_lightbox()
	{

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
	public function edit_lightbox()
	{
		$data['lt_id']=$_GET['lightbox_id'];
	 $data['lt_nm']=$_GET['lightbox_name'];
	 $data['filename']=$_GET['filename'];
	 $data['result']=$this->frontend_model->get_lt_detail_row($_GET['lightbox_id'],$_GET['lightbox_name']);
	 $this->load->view('frontend/edit_lightbox_page',$data);

	}

	public function lightbox_view()
	{
		$page="";
		$per_page="";
		$img_id="";
		if(isset($_GET['img_id'])){
			$img_id=$_GET['img_id'];
		}
		$lightbox_id=$_GET['lightbox_id'];
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		if(isset($_GET['per_page'])){
			$per_page=$_GET['per_page'];
		}

		if($page==1)
			$start=0;
		else
			$start = ($page-1)*$per_page;
		$limit = $per_page;
		if($img_id)
		{

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
		$this->load->view('frontend/lightbox_view',$data);
		$this->load->view('frontend/footer');
	}
	public function create_lightbox()
	{
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
	public function check_img_exist_status()
	{
		$light_id=$this->input->post('lightbox_id');
		$image=$this->input->post('image_id');
		$image_size=$this->input->post('size');
		$image_price=$this->input->post('price');
		$print_type=$this->input->post('print_type');


		if(isset($_POST['check']))
		{
			$images_id=$image;
			if(isset($_POST['cat_id']))
			{
				$catgories_id=$this->input->post('cat_id');
				//$catgories_id=$this->search_model->get_image_category($images_id)->categories_id;
				$this->search_model->update_category_count($catgories_id);
				$this->search_model->insert_pop('add_to_gallery',$images_id,$catgories_id);
				
				//check image exist in pop table
				// if(!$this->search_model->pop_image_exist($images_id))
				// {
				// 	$this->search_model->insert_pop('add_to_gallery',$images_id,$catgories_id);
				// }
				// else
				// {
				// 	$this->search_model->update_pop('add_to_gallery',$images_id);
				// }
			}
			$this->frontend_model->insert_light_box_images($light_id,$image,$image_size,$image_price,$print_type);
			echo "success";
		}
		else
		{
			$bool=$this->frontend_model->check_existing_image_ltbox($light_id,$image,$image_size,$image_price,$print_type);
			echo $bool;
		}
	}


	/*===============================================================lightbox_finish===========================================================================================*/
	public function frame_new($img_id="",$type="",$cost="",$size="",$image_name="")
	{
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

	public function artist_alphabetic_search()
	{
		if(isset($_GET['search_text']))
		{
			$text=$_GET['search_text'];
			$data['txt']=$text;
		}
		else if(isset($_GET['search_txt']))
		{
			$text=$_GET['search_txt'];
			$data['txt']=$text{0};
			$data['txts']=$text;
		}
			
		$data['artist']=$this->frontend_model->get_artist_name($text);
		$this->load->view('frontend/header');
		$this->load->view('frontend/artist_alphabetic_search',$data);
		$this->load->view('frontend/footer');
	}

	public function delete_lightbox($lightbox_id)
	{
		$this->frontend_model->delete_lightbox($lightbox_id);
		$this->frontend_model->delete_lightbox_images($lightbox_id);
		redirect('frontend/lightbox');
	}

	public function share_lightbox()
	{
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
		redirect('frontend/lightbox');
	}
    public function lightbox_view1()
    {
        $page="";
        $per_page="";
        $img_id="";
        if(isset($_GET['img_id'])){
            $img_id=$_GET['img_id'];
        }
        $lightbox_id=$_GET['lightbox_id'];
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
        if(isset($_GET['per_page'])){
            $per_page=$_GET['per_page'];
        }

        if($page==1)
            $start=0;
        else
            $start = ($page-1)*$per_page;
        $limit = $per_page;
        if($img_id)
        {

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

	public function take_newsletter()
	{
		$email=$this->input->post('email_newsletter');
		if($email!='Your Email Address')
			$this->frontend_model->newsletter_entry($email);
		$url=base_url();
		redirect($url);
	}

	public function remove_gallery_image($image_id,$lightbox_id)
	{
		$this->frontend_model->delete_gallery_image($image_id,$lightbox_id);
		redirect('frontend/lightbox');
	}

	public function test()
	{
		$size1 = getimagesize("http://www.indiapicture.in/wallsnart/158/FLPT_EU_0154.JPG");
		$size2 = getimagesize("http://www.indiapicture.in/wallsnart/158/EVRM_HCDLCGA_EC561_H.JPG");

		print_r($size1);
		print $size1[0]/$size1[1];
		//print_r($size2);
	}

	public function set_sizes()
	{
		$obj=new CSVReader();
		$result=$obj->parse_file('C:\xampp\htdocs\wallsnart\application\controllers\7.csv');
		//print "<pre>";
		//print_r($result);
		//$count=0;
		for ($i=0;$i<count($result);$i++)
		{
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
	public function submit_email()
	{

		// $email=$this->input->post('email');
		// $subject="new subscriber'.$email.' has been registered with us ";
		$email=$this->input->post('email_newsletter');
		$date=date('m/d/Y h:i:s', time());
		$this->form_validation->set_rules('email_newsletter','Email','trim|required|valid_email');
		if($this->form_validation->run()==true)
		{
			$user=$this->frontend_model->submit_subscriber($email,$date);
			$this->email->from('info@wallsnart.com');
			$this->email->to('shalini@wallsnart.com', 'Wallsnart');
			$this->email->subject('Newsletter');
			$this->email->message('New user '.$email.' has been registered ');
			$this->email->send();
			redirect('frontend/index');
		}
		else{
			redirect('frontend/index');
		}

	}
	public function query()
	{
		$email=$this->input->post('email');
		$contact=$this->input->post('contact');
		$date=date('m/d/Y h:i:s', time());
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('contact','Contact','required');
		if($this->form_validation->run()==true)
		{
			$user=$this->frontend_model->query_submit($email,$contact,$date);
			$subject="Help";
			$this->email->from('info@wallsnart.com');
			$this->email->to('shalini@wallsnart.com', 'Wallsnart');
			$this->email->subject($subject);
			$this->email->message('New user With email address :'.$email.'and Phone number :'.$contact.' has registered  a query with us through help');
			$this->email->send();
			echo('Your Request has been registered you will be contacted <br/> shortly by our sales team ');
		}
		else
		{
			redirect('frontend/help');
		}


	}
	public function query_normal()
	{
		$email=$this->input->post('email');
		$contact=$this->input->post('contact');
		$date=date('m/d/Y h:i:s', time());
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('contact','Contact','required');
		if($this->form_validation->run()==true)
		{
			$user=$this->frontend_model->query_submit($email,$contact,$date);
			$subject="Help";
			$this->email->from('info@wallsnart.com');
			$this->email->to('shalini@wallsnart.com', 'Wallsnart');
			$this->email->subject($subject);
			$this->email->message('New user With email address :'.$email.'and Phone number :'.$contact.' has registered  a query with us ');
			$this->email->send();
			echo('Your Request has been registered you will be contacted <br/> shortly by our sales team ');
		}
		else
		{
			redirect('frontend/help_normal');
		}

	}
	public function help()
	{
		$this->load->view('frontend/help1');
	}
	public function help_normal()
	{
		$this->load->view('frontend/help');
	}

   public function save_frame()
    {
        $data = $_POST['data'];
        $file = md5(uniqid()) . '.png';

  // remove "data:image/png;base64,"
        $uri =  substr($data,strpos($data,",")+1);
    // $dest = "framed_images/" .$file;
  // save to file
       file_put_contents('600/'.$file, base64_decode($uri));
        //file_put_contents($dest, base64_decode($uri));
  // return the filename
        echo $file; exit;
    }
  
  public function download_frame()
    {
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
    public function save_frame_details(){

        $user_id=$this->session->userdata('userid');
        $image_id=$this->input->post('imageid');
        $data=array('frame_width'=>$this->input->post('framewidth'),'frame_price'=>$this->input->post('frameprice'),
            'mat_price'=>$this->input->post('matprice'),'print_price'=>$this->input->post('printprice'),
            'total'=>$this->input->post('total'),'user_id'=>$user_id,'image_id'=>$this->input->post('imageid'),
            'frame_id'=>$this->input->post('frameid'),'glass_price'=>$this->input->post('glassprice'));

        $check= $this->frontend_model->check_frame_details($user_id,$image_id);

           if($check==0)
           {
              $frame_id = $this->frontend_model->insert_user_frame_details($data);
           }
         else
         {
             $this->frontend_model->update_user_frame_details($data,$user_id,$image_id);
         }
        $d = $this->frontend_model->get_id($user_id,$image_id);
        foreach($d as $a)
        {
            $data1=array('price'=>$this->input->post('total'),'frame_name'=>$this->input->post('image_name'),'frame_id'=>$a->id,'frame_or_print'=>1);
            $data2=array('image_id'=>$this->input->post('imageid'),'cart_quantity'=>1,'user_id'=>$user_id,'frame_id'=>$a->id,'price'=>$this->input->post('total'),'frame_name'=>$this->input->post('image_name'),'image_size'=>$this->input->post('printsize'),'image_print_type'=>$this->input->post('type'),'frame_or_print'=>1,'image_name'=>$this->input->post('image'));
            $check1= $this->frontend_model->check_cart_details($user_id,$image_id);
            if($check1==0)
            {
                 $this->frontend_model->insert_cart_details($data2);
            }
            else
            {
            $this->frontend_model->update_crt($data1,$user_id,$image_id);
            }
        }


       // $frame_values=$this->frontend_model->get_frame_values($frame_id);

    }
    public function save_cart_details()
    {
        $user_id=$this->session->userdata('userid');
        $image_id=$this->input->post('imageid');
        $data2=array('image_id'=>$this->input->post('imageid'),'cart_quantity'=>1,'user_id'=>$user_id,'price'=>$this->input->post('printprice'),'image_size'=>$this->input->post('printsize'),'image_print_type'=>$this->input->post('type'),'image_name'=>$this->input->post('imagename'),'frame_or_print'=>0);
        $check1= $this->frontend_model->check_cart_details($user_id,$image_id);
        if($check1==0)
        {
        $this->frontend_model->insert_into_cart($data2);
        }
        else
        {
            $this->frontend_model->update_crt($data2,$user_id,$image_id);
        }
    }
    public function frame_detail($id)
    {
        $data['details']=$this->frontend_model->frame_detail($id);
        $this->load->view('frontend/frame_detail',$data);
    }
    public function room_view()
    {
        $this->load->view('frontend/room_view2');
    }
    public function larger_image()
    {
        $this->load->view('frontend/larger_image');
    }

}
?>