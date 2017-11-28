<?php 
	function sendPostData($url,$username,$password){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_PORT ,5100); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		$result=curl_exec ($ch);
		curl_close ($ch);
		return $result;
	}

	$sea = $_REQUEST['q'];
	$search = str_replace(",","%20",$sea);
	$per_page = $_REQUEST['per_page'];
	$page = $_REQUEST['page'];
	$srch_trm_raw = str_replace(" ","%20",$search);

	$result = sendPostData("http://45.79.66.20/wallsnart/categorypageimagedata/17/?q=$search&page=$page&per_page=$per_page",'mohan','password012');
echo $result;
?>