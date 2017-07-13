<?php
class Facebook_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
		$config = array(
						'appId'  => '819395858121513',
						'secret' => 'deea14de0806284586299153cbc1a59b'
						//'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
						);
		
		$this->load->library('Facebook', $config);
		
		$user = $this->facebook->getUser();
		
		//print_r($user);
		//exit;
		
		// We may or may not have this data based on whether the user is logged in.
		//
		// If we have a $user id here, it means we know the user is logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.
		$profile = null;
		if($this->$user)
		{
			try {
			    // Proceed knowing you have a logged in user who's authenticated.
				$profile = $this->facebook->api('/me?fields=id,name,link,email');
				print_r($profile);
				die;
			} catch (FacebookApiException $e) {
				error_log($e);
			    $user = null;
			}		
		}
		
		$fb_data = array(
						'me' => $profile,
						'uid' => $user,
						'loginUrl' => $this->facebook->getLoginUrl(
							array(
								'scope' => 'email,user_birthday,publish_stream', // app permissions
								'redirect_uri' => 'http://mahattaart.com/index.php/' // URL where you want to redirect your users after a successful login
							)
						),
						'logoutUrl' => $this->facebook->getLogoutUrl(),
					);

		$this->session->set_userdata('fb_data', $fb_data);
	}
}
?>
