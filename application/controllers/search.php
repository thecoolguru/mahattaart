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
	
	



	
 
	public function filter($page="none",$limit="none",$search_text="none",$category_id="none",$shap="?#!",$color="%@$#")
	{
	
		$filter=1;
		$data['action']='filter';
		$data['color']=$color;
		  
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
		
		if($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' || $category_id=='all' ){
		
		 if($shap!="?#!" && $shap!='all'){
			$shapes=$shap;
		  }if($color!="%@$#" && $color!='all'){
			$colors='-'.$color;
		  }
		  $search_keys=$srch_trm_raw.$shapes.$colors;
		}elseif($category_id!='none' && (is_numeric($search_text)==true)){
		  $search_keys=$srch_trm_raw.'-'.$category_id;
		}
		
		if($shap!="?#!" ||  $color!="%@$#"){
	   $key=$search_keys;
	   }else{
	   $key='*';
	   }
		  
		$search_keys=$shapes.$colors;
		$srch_trm_raw = str_replace("%20","-",$search_text);
		
		if(is_numeric($search_text)==true){ 
		 if($category_id=='all'){
	$search_api="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$key&collection_id=$search_text&page=$page_no&per_page=$limit";
	 }elseif($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' ){
	   
	  $search_api="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$key&category=$category_id&collection_id=$search_text&page=$page_no&per_page=$limit";
	}
	 elseif($category_id!='1' || $category_id!='2' || $category_id!='3' || $category_id!='4' ){
	 $search_api="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$search_keys&category=$category_id&collection_id=$search_text&page=$page_no&per_page=$limit";
	 }
	  
	 
		}else
		{ 
		
	if($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' ){
	 $search_api = "http://api.indiapicture.in/wallsnart/search_filter.php?q=$search_keys&page=$page&category=$category_id&per_page=$limit";
	}else{
	$search_api = "http://api.indiapicture.in/wallsnart/dev.search.php?q=$search_keys&page=$page&per_page=$limit";
	}
		}
		
		
		
	

	//echo $search_api;
	$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
	$context = stream_context_create($opts);
	
	$search_data_raw = file_get_contents($search_api, false, $context);
	$search_data = json_decode($search_data_raw,TRUE);
	
	$data['total'] = $search_data['total'];
	$data['search_data']=$search_data['results'];
  
        $data['search_keys']=$search_keys;            
	$data['filterColor']=$filterColor;
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
	$data['shape'] = $shap;
		
		$this->load->view('frontend/header',$data);
		$this->load->view('search/search_view',$data);
		$this->load->view('frontend/footer');
	}
        





public function bridge($filename="",$images_id="",$collection_id="")
	{
	

			$data['api_image_id']=$images_id;
			$data['images_id']=$images_id;
			$data['image_name']=$filename;

			 $coll_id= $collection_id-1;
			$click_to_enlarge = "http://api.indiapicture.in/wallsnart/get_collection.php";
			
			$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
			$context = stream_context_create($opts);
			$search_data_raw = file_get_contents($click_to_enlarge, false, $context);
			$search_data = json_decode($search_data_raw,TRUE);
			//print_r($search_data);
			 $data['collection_name']= $search_data[$coll_id]['collection_name'];

			
              
            $click_to_enlarge = "http://api.indiapicture.in/wallsnart/function.php?param=click_to_enlarge&images_id=$api_image_id";
             
           $opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
                $context = stream_context_create($opts);
                $search_data_raw = file_get_contents($click_to_enlarge, false, $context);
                $search_data = json_decode($search_data_raw,TRUE);
          
		  
		  
		  
              
		if($surface=="")
		{
			$data['surface']=3;
		}
		else
		{
			$data['surface']=$surface;
		}

	
		 /*$search_file = "http://api.indiapicture.in/wallsnart/images_id.php?image_id=$images_id";
$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

$search_data_file = file_get_contents($search_file, false, $context);
$search_data_r = json_decode($search_data_file,TRUE);*/



 $search_file = "http://api.indiapicture.in/wallsnart/search.php?q=$filename&page=1&per_page=1";
$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

$search_data_file = file_get_contents($search_file, false, $context);
$search_data_r = json_decode($search_data_file,TRUE);



 //print_r($search_data_r);
  $data['image_detail']=$search_data_r['results'];
  //$data['image_detail']=$search_data_r;
		
		
		//$data['image_detail']=$this->search_model->get_files_data($images_id);
        $data['type']=$search_text;
        $this->load->view('frontend/header',$data);
		$this->load->view('search/bridge_details',$data);
		$this->load->view('frontend/footer');
		
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
	public function image_detail($filename="",$images_id="",$collection_id=""){
			$this->session->unset_userdata('page');
			$data['api_image_id']=$images_id;
			$data['images_id']=$images_id;
			$data['image_name']=$filename;
			$data['collection_id']=$collection_id;
 
			$click_to_enlarge = "http://api.indiapicture.in/wallsnart/get_collection.php";
			$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
			$context = stream_context_create($opts);
			$search_data_raw = file_get_contents($click_to_enlarge, false, $context);
			$search_data = json_decode($search_data_raw,TRUE);
			//print_r($search_data);
			 
       for($x=0;$x<=$collection_id;$x++){
	   if($search_data[$x]['id']==$collection_id){
	 //  echo $x;
	   $data['collection_name']=$search_data[$x]['collection_name'];
	   
	   }
	   
	   }
			
              
            $click_to_enlarge = "http://api.indiapicture.in/wallsnart/function.php?param=click_to_enlarge&images_id=$api_image_id";
             
           $opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
                $context = stream_context_create($opts);
                $search_data_raw = file_get_contents($click_to_enlarge, false, $context);
                $search_data = json_decode($search_data_raw,TRUE);
          
		  
		  
		  
              
		if($surface=="")
		{
			$data['surface']=3;
		}
		else
		{
			$data['surface']=$surface;
		}

	
		 $search_file = "http://api.indiapicture.in/wallsnart/search.php?q=$filename&page=1&per_page=1";
$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

$search_data_file = file_get_contents($search_file, false, $context);
$search_data_r = json_decode($search_data_file,TRUE);

 // print_r($search_data_r);
  $data['image_detail']=$search_data_r['results'];
		$data['rate_tbl_web_price']=$this->search_model->get_web_price();
		
		$data['papper']=$this->search_model->get_paper_web_price();
		$data['papper_type']=$this->search_model->get_paper_type_name();
		//$data['image_detail']=$this->search_model->get_files_data($images_id);
        $data['type']=$search_text;
        $this->load->view('frontend/header',$data);
		$this->load->view('search/image_detail',$data);
		$this->load->view('frontend/footer');
	}
	public function get_paper_web_price_first(){
	$paper_type_name=$this->input->post('value');
	$data_array=$this->search_model->get_paper_web_price($paper_type_name);
	echo $data_array[0]->paper;
	}
	public function get_paper_web_price($paper_type_name){
	 $paper_type_name=$this->input->post('value');
	$data_array=$this->search_model->get_paper_web_price($paper_type_name);
	//print_r($data);
	//echo $data_array[0]->paper;
	foreach($data_array as $data){
	echo '<option value="'.$data->paper.'" >'.$data->display_p_name.'</option>';
	
	}
	
	}

	public function products($filename="",$images_id="",$collection_id=""){
		$data['mount_name']=$this->frontend_model->get_mount_name_web_price();
		$data['frame_cat']=$this->frontend_model->get_frame_cat_tbl_web_price();
		$data['frame_sizze']=$this->frontend_model->get_frame_size();
		$data['frame_color']=$this->frontend_model->get_frame_color_web_price();
		$data['api_image_id']=$images_id;
		$data['images_id']=$images_id;
		$data['image_name']=$filename;
		$data['collection_id']=$collection_id;
		$click_to_enlarge = "http://api.indiapicture.in/wallsnart/get_collection.php";
		$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
		$context = stream_context_create($opts);
		$search_data_raw = file_get_contents($click_to_enlarge, false, $context);
		$search_data = json_decode($search_data_raw,TRUE);
		for($x=0;$x<=$collection_id;$x++){
		   	if($search_data[$x]['id']==$collection_id){
		   		$data['collection_name']=$search_data[$x]['collection_name'];
		   	}
		}
	$click_to_enlarge = "http://api.indiapicture.in/wallsnart/function.php?param=click_to_enlarge&images_id=$api_image_id";
 	$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
    $context = stream_context_create($opts);
    $search_data_raw = file_get_contents($click_to_enlarge, false, $context);
    $search_data = json_decode($search_data_raw,TRUE);
    if($surface==""){
			$data['surface']=3;
	}else{
			$data['surface']=$surface;
	}
	$search_file = "http://api.indiapicture.in/wallsnart/search.php?q=$filename&page=1&per_page=1";
	$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
	$context = stream_context_create($opts);

	$search_data_file = file_get_contents($search_file, false, $context);
	$search_data_r = json_decode($search_data_file,TRUE);
	$data['image_detail']=$search_data_r['results'];
	//$data['rate_tbl_web_price']=$this->search_model->get_web_price();
	$data['display_p_name']=$this->frontend_model->get_surface_tbl_web_price(1,'Archival Premium');
	
	$data['papper_type']=$this->search_model->get_paper_type_name();
	//$data['type']=$search_text;

		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/products',$data);
		$this->load->view('frontend/footer');
	}

	public function case_test()
	{
		$this->search_model->all_cases('A','B','C','D');
	}

         


	
        
public function sendPostData($url){
        $ch = curl_init($url);
	curl_setopt ($ch, CURLOPT_PORT ,5100); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"GET");  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_POSTFIELDS,1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
	
  $result = curl_exec($ch);
  curl_close($ch);  
  return $result;
}






public function search_canvas($category_id="none",$page="none",$limit="none",$search_text="none",$sort_by="none",$filter_product_type="none",$filter_collection="none",$filter_medium="none",$filter_size="none",$filter_price_slab="none",$shape="none",$filterColor="none")
	{
	 
            
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
               
$srch_trm_raw = str_replace("%20","-",$search_text);
if($filter_collection<>'none')
{
 $search_api = "http://api.indiapicture.in/wallsnart/collection.php?collection_id=$filter_collection&page=$page";
}elseif($filter_collection=='none'){
$search_api = "http://api.indiapicture.in/wallsnart/search.php?q=$srch_trm_raw&page=$page";
}

$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);
$search_data_raw = file_get_contents($search_api, false, $context);
$search_data = json_decode($search_data_raw,TRUE);
//print_r($search_data);
 $data['total'] = $search_data['total'];
 $data['search_data']=$search_data['results'];
//print_r($search_data);
                  
                
                
		$data['filterColor']=$filterColor;
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
		//$data['search_data']=$this->search_model->get_search_data($category_id,$page_no,$no_of_res,$search_text,$sort_by,$filter_product_type,$filter_collection,$filter_medium,$filter_size,$filter_price_slab,$shape,$filterColor);
		$this->load->view('frontend/canvas_header',$data);
		$this->load->view('search/canvas_search_view',$data);
		$this->load->view('frontend/footer');
	}
        

        
        
         public function dosearch_frame($category_id="none",$page="none",$limit="none",$search_text="none",$sort_by="none",$filter_product_type="none",$filter_collection="none",$filter_medium="none",$filter_size="none",$filter_price_slab="none",$shape="none",$filterColor="none")
	{
	
	
	
	 
            
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
            
$srch_trm_raw = str_replace("%20","-",$search_text);
 $srch_trm_raw;

if($filter_collection<>'none')
{
 $search_api = "http://api.indiapicture.in/wallsnart/collection.php?collection_id=$filter_collection&page=$page";
}elseif($filter_collection=='none'){
 $search_api = "http://api.indiapicture.in/wallsnart/dev.search.php?q=$srch_trm_raw&page=$page";
}

$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

$search_data_raw = file_get_contents($search_api, false, $context);
$search_data = json_decode($search_data_raw,TRUE);
  $data['total'] = $search_data['total'];
  $data['search_data']=$search_data['results'];

                  
                
                
		$data['filterColor']=$filterColor;
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
		//$data['search_data']=$this->search_model->get_search_data($category_id,$page_no,$no_of_res,$search_text,$sort_by,$filter_product_type,$filter_collection,$filter_medium,$filter_size,$filter_price_slab,$shape,$filterColor);
		$this->load->view('frontend/header_frame',$data);
		$this->load->view('search/search_view-frame',$data);
		$this->load->view('frontend/footer');
	}
	
	
	
	  public function dosearch_cat($page="none",$limit="none",$search_text="none",$category_id="none",$shap="?#!",$color="%@$#")
	{
	// echo $category_id;
	  $page_no=1;
		if($page!="none")
		{
			$page_no=$page;
		}
		$no_of_res=64;
		if($limit!="none")
		{
			$no_of_res=$limit;
		}
		$data['action']='dosearch_cat';
           $srch_trm_raw = str_replace("%20"," ",$search_text);

	   if($shap!="?#!" ||  $color!="%@$#"){
	   	$key=$search_keys;
	   }else{
	   	$key='*';
	   }
		if(is_numeric($search_text)==true){ 
		
		
		if($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' || $category_id=='all' ){
		 if($shap!="?#!"){
			$shapes='-'.$shap;
		  }if($color!="%@$#"){
			$colors='-'.$color;
		  }
		  $search_keys=$srch_trm_raw.$shapes.$colors;
		}elseif($category_id!='none'){
		  $search_keys=$srch_trm_raw.'-'.$category_id;
		}
   
		if($category_id=='all' && $shap!='?#!'){
$search_api="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$search_keys&collection_id=$search_text&page=$page_no&per_page=$limit";
		}
		elseif($category_id=='all' && $shap=='?#!'){
$search_api = "http://api.indiapicture.in/wallsnart/collection.php?collection_id=$srch_trm_raw&page=$page_no&per_page=$limit";
		}
		 elseif(($category_id!='all') && ($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4')){
	$search_api="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$search_keys&category=$category_id&collection_id=$search_text&page=$page_no&per_page=$limit";
	 }
	 elseif($category_id!='1' || $category_id!='2' || $category_id!='3' || $category_id!='4' &&  $shap!='?#!'){
	 $search_ap="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$search_keys&collection_id=$search_text&page=$page_no&per_page=$limit";
	 }elseif($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' ){
	   
	  $search_api="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$key&category=$category_id&collection_id=$search_text&page=$page_no&per_page=$limit";
	}
	  
	 
		}else
		{ 
		if($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' || $category_id=='all' ){
		 if($shap!="?#!"){
			$shapes='-'.$shap;
		  }if($color!="%@$#"){
			$colors='-'.$color;
		  }
		  $search_keys=$srch_trm_raw.$shapes.$colors;
		}elseif($category_id!='none'){
		  $search_keys=$srch_trm_raw.'-'.$category_id;
		}
		
			if($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' ){
	 $search_api = "http://api.indiapicture.in/wallsnart/search_filter.php?q=$search_keys&page=$page&category=$category_id&per_page=$limit";
	}else{
	$search_api = "http://api.indiapicture.in/wallsnart/search.php?q=$search_keys&page=$page&per_page=$limit";
	}
		}
//echo $search_api;

$get_res=$this->search_model->search_allany($page_no,$no_of_res,$search_keys);
//print_r($get_res);
$total_search=0;
for($c=0;$c<count($get_res);$c++){
$total_search= $total_search+$get_res[$c]['total'];
}

 $data['total']=$total_search;
$data['search_data']=$get_res;
  
  

              
		$data['color']=$color;
		$data['size']=$filter_size;
		$data['price_slab']=$filter_price_slab;
	    $data['category_id']=$category_id;
		$data['page']=$page_no;
		$data['limit']=$no_of_res;
		$data['search_text']=$search_text;
		$data['search_keys']=$search_text;
		$data['sort_by']=$sort_by;
		$data['filter_product_type']=str_replace('%20', ' ', $filter_product_type);
		$data['filter_collection']=$filter_collection;
		$data['filter_medium']=$filter_medium;
		$data['shape'] = $shap;
		//$data['search_data']=$this->search_model->get_search_data($category_id,$page_no,$no_of_res,$search_text,$sort_by,$filter_product_type,$filter_collection,$filter_medium,$filter_size,$filter_price_slab,$shape,$filterColor);
		
		$this->load->view('frontend/header',$data);
		$this->load->view('search/search_view_cat',$data);
		$this->load->view('frontend/footer');
	}
        
	
	
	   public function dosearch($page="none",$limit="none",$search_text="none",$category_id="none",$shap="?#!",$color="%@$#")
	{
	// echo $category_id;
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
		$data['action']='dosearch';
           $srch_trm_raw = str_replace("%20",",",$search_text);

	   if($shap!="?#!" ||  $color!="%@$#"){
	   	$key=$search_keys;
	   }else{
	   	$key='*';
	   }
		if(is_numeric($search_text)==true){ 
		
		
		if($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' || $category_id=='all' ){
		 if($shap!="?#!"){
			$shapes='-'.$shap;
		  }if($color!="%@$#"){
			$colors='-'.$color;
		  }
		  $search_keys=$srch_trm_raw.$shapes.$colors;
		}elseif($category_id!='none'){
		  $search_keys=$srch_trm_raw.'-'.$category_id;
		}
   
		if($category_id=='all' && $shap!='?#!'){
$search_api="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$search_keys&collection_id=$search_text&page=$page_no&per_page=$limit";
		}
		elseif($category_id=='all' && $shap=='?#!'){
$search_api = "http://api.indiapicture.in/wallsnart/collection.php?collection_id=$srch_trm_raw&page=$page_no&per_page=$limit";
		}
		 elseif(($category_id!='all') && ($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4')){
	$search_api="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$search_keys&category=$category_id&collection_id=$search_text&page=$page_no&per_page=$limit";
	 }
	 elseif($category_id!='1' || $category_id!='2' || $category_id!='3' || $category_id!='4' &&  $shap!='?#!'){
	 $search_ap="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$search_keys&collection_id=$search_text&page=$page_no&per_page=$limit";
	 }elseif($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' ){
	   
	  $search_api="http://api.indiapicture.in/wallsnart/live.collection_filter.php?key=$key&category=$category_id&collection_id=$search_text&page=$page_no&per_page=$limit";
	}
	  
	 
		}else
		{ 
		if($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' || $category_id=='all' ){
		 if($shap!="?#!"){
			$shapes='-'.$shap;
		  }if($color!="%@$#"){
			$colors='-'.$color;
		  }
		  $search_keys=$srch_trm_raw.$shapes.$colors;
		}elseif($category_id!='none'){
		  $search_keys=$srch_trm_raw.'-'.$category_id;
		}
		
			if($category_id=='1' || $category_id=='2' || $category_id=='3' || $category_id=='4' ){
	 $search_api = "http://api.indiapicture.in/wallsnart/search_filter.php?q=$search_keys&page=$page&category=$category_id&per_page=$limit";
	}else{
	$search_api = "http://api.indiapicture.in/wallsnart/search.php?q=$search_keys&page=$page&per_page=$limit";
	}
		}
//echo $search_api;



$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

$search_data_raw = file_get_contents($search_api, false, $context);
$search_data = json_decode($search_data_raw,TRUE);

  $data['total'] = $search_data['total'];
  $data['search_data']=$search_data['results'];

              
		$data['color']=$color;
		$data['size']=$filter_size;
		$data['price_slab']=$filter_price_slab;
	    $data['category_id']=$category_id;
		$data['page']=$page_no;
		$data['limit']=$no_of_res;
		$data['search_text']=$search_text;
		$data['search_keys']=$search_text;
		$data['sort_by']=$sort_by;
		$data['filter_product_type']=str_replace('%20', ' ', $filter_product_type);
		$data['filter_collection']=$filter_collection;
		$data['filter_medium']=$filter_medium;
		$data['shape'] = $shap;
		//$data['search_data']=$this->search_model->get_search_data($category_id,$page_no,$no_of_res,$search_text,$sort_by,$filter_product_type,$filter_collection,$filter_medium,$filter_size,$filter_price_slab,$shape,$filterColor);
		
		$this->load->view('frontend/header',$data);
		$this->load->view('search/search_view',$data);
		$this->load->view('frontend/footer');
	}
        
		  


	
		



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

        
        public  function Search_save_user_login_details($user_id,$url,$ipaddress)
        {
       
            $data2=array('user_id'=>$user_id,'login_session_detals'=>$url,'system_ip'=>$ipaddress);
            $check1= $this->search_model->check_user_login_details($user_id);

            if($check1==0)
                {
                $this->search_model->track_login_details($data2);
                }
            else
            {
                $this->search_model->update_track_login_details($data2,$user_id);
            }
        
        }   
}
?>