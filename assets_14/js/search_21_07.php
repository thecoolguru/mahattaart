<?php 
class Search extends CI_Controller
{
	function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('cart');
		$this->load->library('email');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('frontend_model');
		$this->load->model('user_model');
		$this->load->model('search_model');
		$this->load->model('cart_model');
		$this->load->database();
		// Load facebook library and pass associative array which contains appId and secret key
		$this->load->library('facebook', array('appId' => '819395858121513', 'secret' => 'deea14de0806284586299153cbc1a59b'));
		// Get user's login information
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$this->user = $this->facebook->getUser();

	}
	
	
		public function index() {
		if (!$this->user) {
			$data['mode'] = $this->facebook->getLoginUrl();
			$this->load->view('frontend/header', $data);
			$this->load->view('frontend/image_detail');
			$this->load->view('frontend/footer');
		}else{
			$data['user_profile'] = $this->facebook->api('/me/');

		// Get logout url of facebook
			$data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/frontend/fblogout'));
		// Send data to profile page
			$this->load->view('frontend/header',$data);
			$this->load->view('search/image_detail', $data);
			$this->load->view('frontend/footer');
		}
		}

// Logout from facebook
public function fblogout() {

// Destroy session
session_destroy();

// Redirect to baseurl
redirect(base_url());
}

	public function search_test()
	{
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		
		$data[]="";
		$this->form_validation->set_rules('keyword','Keyword','required');
		if($this->form_validation->run()==true)
		{
			$keyword=$this->input->post('keyword');
			$data['keyword']=$keyword;
			$keywords_array=explode(',', $keyword);			
			$data['search_data']=$this->search_model->search_test($keywords_array);
		}
		$this->load->view('search/searchtest',$data);
	}

	//function to show particular image details by id
	public function image_detail($images_id,$catgories_id="",$surface="")
	{
		//$images_id,$catgories_id="",$surface=""

		if($surface=="")
		{
			$data['surface']=3;
		}
		else
		{
			$data['surface']=$surface;
		}

		 if($catgories_id!="")
		 {
		 	$this->search_model->update_category_count($catgories_id);
		 	if(!$this->search_model->pop_image_exist($images_id))
		 	{
		 		$this->search_model->insert_pop('click_to_elarge',$images_id,$catgories_id);
		 	}
		 	else
		 	{
		 		$this->search_model->update_pop('click_to_elarge',$images_id,$catgories_id);
		 	}
		 }
		$search_text="";
		$data['image_detail']=$this->search_model->get_image_data($images_id);
        $data['type']=$search_text;
        $data['cat_id']=$catgories_id;
		$this->load->view('frontend/header');
		$this->load->view('search/image_detail',$data);
		$this->load->view('frontend/footer');
	}

	public function case_test()
	{
		$this->search_model->all_cases('A','B','C','D');
	}

	public function dosearch($category_id="none",$page="none",$limit="none",$search_text="none",$sort_by="none",$filter_product_type="none",$filter_collection="none",$filter_medium="none",$filter_size="none",$filter_price_slab="none",$shape="none")
	{
	   
	   $this->session->set_userdata('url',$_SERVER['REQUEST_URI']);
	  // print_r( $this->session->set_userdata('url'));
	//echo $this->session->set_userdata('url');
	
	//echo   $_SESSION['url'];
		$page_no=1;
		if($page!="none")
		{
			$page_no=$page;
		}
		$no_of_res=32;
		if($limit!="none")
		{
			$no_of_res=$limit;
		}
		
		$data['size']=$filter_size;
		$data['price_slab']=$filter_price_slab;
		$data['category_id']=$category_id;
		$data['page']=$page_no;
		$data['limit']=$no_of_res;
		$data['search_text']=$search_text;
		$data['sort_by']=$sort_by;
		$data['filter_product_type']=str_replace('%20', ' ', $filter_product_type);
		$data['filter_collection']=$filter_collection;
		$data['filter_medium']=$filter_medium;
		$data['shape'] = $shape; 
		$data['search_data']=$this->search_model->get_search_data($category_id,$page_no,$no_of_res,$search_text,$sort_by,$filter_product_type,$filter_collection,$filter_medium,$filter_size,$filter_price_slab,$shape);

		$this->load->view('frontend/header',$data);
		$this->load->view('search/search_view',$data);
		$this->load->view('frontend/footer');
	}

	/* 	public function search_test()
	 {
	set_time_limit(1000);
	$category_id=413;
	$category_data=$this->search_model->get_category_by_id($category_id);
	$p_id=$category_data->p_id;
	$keywords=$category_data->keywords;
	$keywords_array=explode(',', $keywords);

	date_default_timezone_set('Asia/Kolkata');
	$ts=microtime(true);
	$render_data=$this->search_model->new_render_data_search($keywords_array,$p_id);
	$ts=microtime(true)-$ts;
	echo $ts.' secs'; //seconds

	print "<br>";
	print count($render_data);

	}
	*/
	//=======================Code written by Kunal Saxena===========>>>>>>>>>

	public function render_collections()
	{
		$category_id=789;
		$render_data=$this->search_model->get_imagesdata_by_collection_id(143);
		//print count($render_data);
		foreach ($render_data as $data_ele)
		{
			$this->search_model->insert_render_data($data_ele->images_id,$category_id);
		}
	}

	public function render_new_data()
	{
		set_time_limit(10000);
		//for ($i=760;$i<=787;$i++)
		{
			//$category_id=$i;
			$category_id=121;
			$category_data=$this->search_model->get_category_by_id($category_id);
			$p_id=$category_data->p_id;
			$keywords_array=$category_data->keywords;
			//$keywords_array=explode(',', $keywords);
			//print_r($keywords_array);
			$render_data=$this->search_model->new_render_data_search($keywords_array,$p_id);

			print count($render_data);
			print "<br>";
			foreach ($render_data as $data_ele)
			{
                print_r($data_ele);
				//$this->search_model->insert_render_data($data_ele->images_id,$category_id,$data_ele->images_collectionid );
			}

		}
		print "DONE";
	}

    public function render_product_type()
    {
        set_time_limit(1000);

            //$category_id=121;
           // $category_data=$this->search_model->get_category_by_id($category_id);
           // $p_id=$category_data->p_id;
            $keywords_array= "art";
            $render_data=$this->search_model->render_product_data($keywords_array);
            print count($render_data);
            print "<br>";
            foreach ($render_data as $data_ele)
            {
                print_r($data_ele);
                //$this->search_model->insert_render_data($data_ele->images_id,$category_id,$data_ele->images_collectionid );
            }


        print "DONE";
    }

	// Functions not in use or not recognised : Kunal Saxena

	public function post_comment($image_id="",$txt="")
	{
		if(!$this->session->userdata('userid'))
		{
			redirect('frontend/index');
		}
		else{
			$this->form_validation->set_rules('comments','Comment','required');
			if($this->form_validation->run()==true){
				$userid=$this->session->userdata('userid');
				$com=$this->input->post('comments');
				$this->search_model->post_comment($com,$image_id,$userid);

			}
		}

		redirect('search/image_detail?id='.$image_id.'&txt='.$txt);
	}

	public function get_paintings()
	{
			
		$j=$this->input->get('ref_id');
		//print $j;
			
		if($this->input->get('per_page'))
		{
			$page1=$this->input->get('per_page');  //in the case of pagination we will have per_page value else per_page=0
		}
		else
		{
			$page1=0;
		}
		$per_page= $this->input->get('page');  //page shows the value of selected dropdown
		if(!$per_page) {
			$per_page=16;
		}
		$data1=$this->search_model->count_paintings($j);
		$config['base_url'] = base_url().'index.php/search/get_paintings?ref_id='.$j.'&page=' .$per_page;
		$config['total_rows'] =$data1;
		$config['per_page'] = $per_page;
		$config["uri_segment"] = 3;
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);
		$data['per_page']=$per_page;

		$data['all_paintings']=$this->search_model->get_painting($j,$config['per_page'],$page1);
		$ds=count($data['all_paintings']);
		$data['coun']=$ds;
		$data['ref_id']=$j;
		$this->load->view('frontend/header');
		$this->load->view('frontend/artists',$data);
		$this->load->view('frontend/footer');
	}
	public function get_set_visit()
	{
		if(isset($_GET['ref_id'])&&isset($_GET['set']))
		{
			$d=$_GET['ref_id'];
			$dataa=$this->search_model->get_visits($d);
			$increase= $dataa->sales_counter;
			$this->search_model->set_visits($d,$increase);
			redirect('search/get_paintings?ref_id='.$d);
		}
	}

	public function get_all_images($artist_name)
	{
		$artist="";
		$ed=explode("%20",$artist_name);
		$count=count($ed);
		for($i=0;$i<$count;$i++)
		{
			$artist=$artist.$ed[$i]." ";
			//$artist= $ed['0']." " .$ed['1']." ".$ed['2'] ;
		}
		// print $artist;
		$data['all_images']=$this->search_model->artist_images($artist);
		$this->load->view('frontend/header');
		$this->load->view('frontend/artist_alphabetic_search1',$data);
		$this->load->view('frontend/footer');
			
	}

	public function counter_for_artstyle_photography()
	{
		$search=$_GET['searchtxt'];
		$type=$_GET['art_type'];
		//$data=$this->search_model->get_counter_value_photography($type);
		//$vis= $data->sales_counter;
		//$this->search_model->set_counter_value_photography($type,$vis);
		redirect('search/search_view?searchtext='.$search.'&lot_pl=p1&artstyles='.$type);
	}
	public function counter_for_artstyle_vintage()
	{
		$search=$_GET['searchtxt'];
		$type=$_GET['art_type'];
		redirect('search/search_view?searchtext='.$search.'&lot_pl=v1&artstyles='.$type);
	}
	public function counter_for_artstyle_indian()
	{
		$search=$_GET['searchtxt'];
		$type=$_GET['art_type'];
		redirect('search/search_view?searchtext='.$search.'&lot_pl=i1&artstyles='.$type);
	}
	public function counter_for_artstyle_fineart()
	{
		$search=$_GET['searchtxt'];
		$type=$_GET['art_type'];
		redirect('search/search_view?searchtext='.$search.'&lot_pl=f1&artstyles='.$type);
	}
	public function subcategory_subject()
	{
		$category=$_GET['main_categ'];
		$keywords=$_GET['keyword'];
		redirect('search/search_view?searchtext='.$keywords.'&main_category='.$category);
	}
	public function sortby_options_selected()
	{
		$sort=$_GET['sortno'];
		$img=$_GET['images'];
		$new_img=explode(",",$img);
		$coun=count($new_img);
		$data['keyword']=$_GET['searchtxt'];
		$data['product_type']=$_GET['da1'];
		$data['product_id']=$_GET['da2'];
		$data['per_page']=$coun;
		$data['imagedata']=$this->search_model->get_sorted_images_for_selected_option_in_dropdown($new_img,$sort);
		$this->load->view('frontend/header');
		$this->load->view('search/art_style_listing_new',$data);
		$this->load->view('frontend/footer');
			
	}
	public function bestseller()
	{
		$data['imagedata']=$this->search_model->get_bestseller_data('16','0');
		$this->load->view('frontend/header');
		$this->load->view('frontend/bestsellers',$data);
		$this->load->view('frontend/footer');
	}

	public function exp1()
	{
		print "Started";
		print "<br>";
		ini_set('error_reporting', E_ALL);
		set_time_limit(100);
		$data=$this->search_model->get_categories_images();
		print "<pre>";
		print "Total results ".count($data)."<br>";
		foreach ($data as $image)
		{
			//print $image->images_id;
			//print "<br>";
			$image_id=$image->images_id;
			$category_id=$image->categories_id;
			$collecton_id=$this->search_model->get_image_collection($image->images_id)->images_collectionid;
			$product_type=$this->search_model->get_image_collection($image->images_id)->images_producttypes;
			$this->search_model->update_data($image_id,$collecton_id,$product_type,$category_id);
		}
		print "DONE";
	}

	public function image_price_entry()
	{
		set_time_limit(2000);
		error_reporting(E_ALL);
		ini_set("display_errors", 1);

		$images_data=$this->search_model->get_images_data();
		foreach ($images_data as $image) 
		{
			$image_id=$image->images_id;
			$collection_id=$image->images_collectionid;

			// calculate image ratio
			$size_data = getimagesize("http://www.indiapicture.in/wallsnart/398/".$image->images_filename."");
			
			$image_width=$size_data[0];
			$image_height=$size_data[1];
			$image_ratio=$image_width/$image_height;
			$size_array=array();
			if($size_data[0]>$size_data[1])
			{	
				$size_array[0]['width']=12*$image_ratio;
				$size_array[0]['height']=12;								
			}
			else if($size_data[0]<$size_data[1])
			{					
				$size_array[0]['width']=12;
				$size_array[0]['height']=12*(1/$image_ratio);								
			}		
			
			$price=$size_array[0]['width']*$size_array[0]['height']*2+$this->give_licence_price($collection_id);
			$final_price=round($price);

			
			$data=array('images_min_price'=>$final_price);
			$this->search_model->update_image_price($data,$image->images_id);

		}
		//print "DONE";
	}
	
	public function give_licence_price($collection_id)
	{
		if(($collection_id==174)||($collection_id==154)||($collection_id==167))
		{
			return 640;
		}
		else if(($collection_id==126))
		{
			return 40*61.98;
		}
		else
		{
			return 1920;
		}
	}

}
?>