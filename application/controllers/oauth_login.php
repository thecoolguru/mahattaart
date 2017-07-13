<?php

class Oauth_Login extends CI_Controller {

public $user = "";

function __construct()
	{
		session_start();
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
		//$this->load->model('Facebook_model');
		
		// Load facebook library and pass associative array which contains appId and secret key
$this->load->library('facebook', array('appId' => '819395858121513', 'secret' => 'deea14de0806284586299153cbc1a59b'));

// Get user's login information
parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
$this->$user = $this->facebook->getUser();
	

	}
/*public function __construct() {
parent::__construct();
session_start();

// Load facebook library and pass associative array which contains appId and secret key
$this->load->library('facebook', array('appId' => '819395858121513', 'secret' => 'deea14de0806284586299153cbc1a59b'));

// Get user's login information
$this->user = $this->facebook->getUser();
}*/

// Store user information and send to profile page
public function index() {
//$data['mode'] = "hello";
if (!$this->$user) {
	$data['mode'] = $this->facebook->getLoginUrl();
	$this->load->view('frontend/header', $data);
	$this->load->view('frontend/homepage');
	$this->load->view('frontend/footer');
}else{
	$data['user_profile'] = $this->facebook->api('/me/');

// Get logout url of facebook
$data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/oauth_login/logout'));

// Send data to profile page
$this->load->view('profile', $data);
}
/*if ($user) {
$data['user_profile'] = $this->facebook->api('/me/');

// Get logout url of facebook
$data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/oauth_login/logout'));

// Send data to profile page
//$this->load->view('profile', $data);
} else {

// Store users facebook login url
$data['login_url'] = $this->facebook->getLoginUrl();
$this->load->view('frontend/header', $data);
$this->load->view('frontend/homepage');
$this->load->view('frontend/footer');
}*/
}

// Logout from facebook
public function logout() {

// Destroy session
session_destroy();

// Redirect to baseurl
redirect(base_url());
}

}
?>