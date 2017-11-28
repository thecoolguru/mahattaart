<?php
ob_start();

class Cart extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->model('cart_model');
		$this->load->model('search_model');
		$this->load->model('frontend_model');
		$this->load->model('user_model');
		$this->load->database();
	}

	public function cart_update(){
         $action_method=  $this->input->post('action_method');
         $row_id=  $this->input->post('row_id');
         $price=  $this->input->post('price');
         $qty=  $this->input->post('qty');
         $total_price=$price*$qty;
         $data=array('qty'=>$qty,'updated_price'=>$total_price);
			if($action_method=='update'){
				$update=   $this->cart_model->update_crt($data,$row_id);
			if($update){
                echo 1;
            }else{
                echo 0;
            }
          }
    }

	public function cart_view(){ 
		error_reporting(0);
		$catgories_id=$_GET['cat_id'];
		$live_id=$_GET['live_id'];
		$this->search_model->update_category_count($catgories_id);
		$img_id="";
		$search_text="";
		$price="";
		$size="";
		$print_type="";
		if(isset($_GET['img_id'])){
			$img_id=$_GET['img_id'];
		}
		if(isset($_GET['search_text'])){
			$search_text=$_GET['search_text'];
		}
		if(isset($_GET['size'])){
			$size=$_GET['size'];
		}
		if(isset($_GET['price'])){
			$price=$_GET['price'];
		}
		if(isset($_GET['print_type'])){
			$print_type=$_GET['print_type'];
		}
		if( $this->input->get('search'))
		{
			$datam['key']= $this->input->get('search'); //to pass search text from url to view
		}else{
			$datam['key']=$search_text;
		}
 		if($img_id){
			$image=$this->search_model->get_image_data($img_id);
			if(!$this->session->userdata('userid'))
			{
				$data=array('id'=>$img_id,'qty'=>1,'price'=>$price,'name'=>$image->images_filename);
				$this->cart->insert($data);
				$data['key']= $img_id;
			}else{
				$data1=array('image_id'=>$img_id,'cart_quantity'=>1,'price'=>$price,'user_id'=>$this->session->userdata('userid'),'image_print_type'=>$print_type,'image_size'=>$size,'image_name'=>$image->images_filename,'row_id'=>$this->session->userdata('userid'));
				$valid=$this->cart_model->cart_valid($this->session->userdata('userid'),$img_id,$price,$size,$print_type);
			if(!$valid){
				$add_to_cart = "http://api.indiapicture.in/wallsnart/function.php?param=add_to_cart&images_id=$live_id";
		        $opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
                $context = stream_context_create($opts);
                $search_data_raw = file_get_contents($add_to_cart, false, $context);
                $search_data = json_decode($search_data_raw,TRUE);
				$this->cart_model->add_cart($data1);
			}
		}
		$images_id=$img_id;
			//insert pop data
			//$catgories_id=$this->search_model->get_image_category($images_id)->categories_id;
			if(isset($_GET['cat_id'])){
				$catgories_id=$_GET['cat_id'];
				$add_to_gallery = "http://api.indiapicture.in/wallsnart/function.php?param=add_to_cart&images_id=$images_id";
				$this->search_model->insert_pop('add_to_cart',$images_id,$catgories_id);
			}
		}
    	 $datam['live_id'] = $live_id;
		 $datam['uri'] = $this->session->userdata('url');
		 if($_GET['prod_id']){
			$datam['user'] = $_GET['prod_id'];	
		 }else{
			$datam['user'] = $this->session->userdata('userid');	
		 }
		 $this->load->view('frontend/header');
		 $this->load->view('cart/shopping_cart',$datam);
		 $this->load->view('frontend/footer');
	}
	
	public function update_customer(){
	  $user_id=$this->session->userdata('userid');
	  $name=$this->input->post('name');
	  $getpurpose=$this->input->post('getpurpose');
	  $company_name=$this->input->post('company_name');
	  $lastname=$this->input->post('lastname');
	  $pincode=$this->input->post('pincode');
	  $address=$this->input->post('address');
	  $city=$this->input->post('city');
	  $state=$this->input->post('state');
	  $phone=$this->input->post('phone');
	  $c_gst_no=$this->input->post('c_gst_no');
	  $c_pan_no=$this->input->post('c_pan_no');
	  $email_reciept=$this->input->post('email_reciept');
	  $data=array('first_name'=>$name,
	  'zip_code'=>$pincode,'address'=>$address,'city'=>$city,'state'=>$state,'contact'=>$phone,'last_name'=>$lastname,'email_reciept'=>$email_reciept,'purpose'=>$getpurpose,'gst_no'=>$c_gst_no,'pan_no'=>$c_pan_no
	 );
	 $this->frontend_model->update_customer($data,$state);
	 $cart_det=$this->cart_model->get_usercart($user_id);
	 if($state=='Delhi'){
	 $gst='half';
	 }else{
	  $gst='full';
	 }
	 foreach($cart_det as $cart){
	 $tax_goods=$cart['tax_goods'];
	 $tax_amount=$cart['tax_amount'];
	 $cart_id=$cart['cart_id'];
	 if($gst=='half'){
	 $tax_cgst=($tax_goods/2);
	 $tax_amt_cgst=round(($tax_amount/2),2);
	 $data_cart=array('tax_cgst'=>$tax_cgst,'tax_amt_cgst'=>$tax_amt_cgst,'tax_sgst'=>$tax_cgst,'tax_amt_sgst'=>$tax_amt_cgst,'tax_igst'=>'','tax_amt_igst'=>'');
	 }else{
	 $tax_igst=$tax_goods;
	 $tax_amt_igst=$tax_amount;
	 $data_cart=array('tax_igst'=>$tax_igst,'tax_amt_igst'=>$tax_amt_igst,'tax_cgst'=>'','tax_amt_cgst'=>'','tax_sgst'=>'','tax_amt_sgst'=>'');
	 }
	 $this->db->where('user_id',$user_id);
	 $this->db->where_in('cart_id',$cart_id);
	 $query=$this->db->update('tbl_cart',$data_cart);
	}
	 
	
	}
        

        

        public function check_out(){ error_reporting(0);
// echo "ssss";
		$catgories_id=$_GET['cat_id'];

		$this->search_model->update_category_count($catgories_id);
        $res=$this->cart_model->get_tbl_promo_code();
		//print_r($res);
		$data['tbl_clearence']=$res;
          

		$img_id="";

		$search_text="";

		$price="";

		$size="";

		$print_type="";

		if(isset($_GET['img_id'])){

			$img_id=$_GET['img_id'];

		}

		if(isset($_GET['search_text'])){

			$search_text=$_GET['search_text'];

		}
			$user_id = $this->session->userdata('userid');
			$cart_data = $this->cart_model->get_usercart($user_id);
	 		$values = array();
	 		foreach ($cart_data as $datas) {
	 			$values[] = $datas['path']; 
	 		}
		$data['cart_data'] = $values;	
		$this->load->view('frontend/header');
		$this->load->view('cart/check_out',$data);
		$this->load->view('frontend/footer');
	}

	protected function CCAVENUE_DETAILTS()  {
            $marchent_id="64544";
            $auth_code="AVIZ70ED05AF29ZIFA";
            $working_key="2A428B0140B214C429873D2057713571";
            return array($marchent_id,$auth_code,$working_key);
    } 
	public function CCAvenue_check_out(){
           $result= $this->cart_model->get_cart_user_details($this->session->userdata('userid'));
	       $billerName= $result[0]->first_name.' '.$result[0]->last_name;
           $ccavenue_data= $this->CCAVENUE_DETAILTS();
	     foreach ($_POST as $key => $value){
		 $merchant_data.=$key.'='.urlencode($value).'&';
		}
        $merchant_id=$ccavenue_data[0];
		$working_key=$ccavenue_data[2];//Shared by CCAVENUES
		$access_code=$ccavenue_data[1];//Shared by CCAVENUES
	    $encrypted_data=$this->encrypt($merchant_data,$working_key);
		$action_url="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction";
?>
		<form method="post" name="redirect" action="<?=$action_url?>"> 
			<input type="hidden" name="encRequest" value="<?=$encrypted_data?>" />
				<input type="hidden" name="access_code" value="<?=$access_code?>" />
		</form>
<script language='javascript'>document.redirect.submit();</script>
     <?php }
	    function encrypt($plainText,$key){
	 	$secretKey=$this->hextobin(md5($key));
        //print_r($secretKey);
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	  	$openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
	  	$blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
		$plainPad = $this->pkcs5_pad($plainText, $blockSize);
		if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1){
		      $encryptedText = mcrypt_generic($openMode, $plainPad);
	      	  mcrypt_generic_deinit($openMode);
		} 
		return bin2hex($encryptedText);
	}
	
	public function pkcs5_pad($plainText, $blockSize){
	    $pad = $blockSize - (strlen($plainText) % $blockSize);
	    return $plainText . str_repeat(chr($pad), $pad);
	}
	
	public function decrypt($encryptedText,$key){
		$secretKey = $this->hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$encryptedText=$this->hextobin($encryptedText);
	  	$openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
		mcrypt_generic_init($openMode, $secretKey, $initVector);
		$decryptedText = mdecrypt_generic($openMode, $encryptedText);
		$decryptedText = rtrim($decryptedText, "\0");
	 	mcrypt_generic_deinit($openMode);
		return $decryptedText;
	}
	
	public function hextobin($hexString){ 
       	$length = strlen($hexString); 
       	$binString="";   
       	$count=0; 
       	while($count<$length){       
        	$subString =substr($hexString,$count,2);           
        	$packedString = pack("H*",$subString); 
        	if ($count==0){
				$binString=$packedString;
		    }else{
				$binString.=$packedString;
		    } 
        $count+=2; 
      } 
		return $binString; 
     } 

	public function response(){
		error_reporting(0);
		$workingKey='2A428B0140B214C429873D2057713571';		//Working Key should be provided here.
		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=$this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		//print_r($rcvdString);
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		print_r($decryptValues);
        date_default_timezone_set('Asia/Kolkata');
		// $date=date('d-m-Y H:i');
		$date=date('Y-m-d H:i:s');
        $t=1;
	for($i = 0; $i < $dataSize; $i++){
		$information=explode('=',$decryptValues[$i]);
        //print_r($information);
        if($i==0){
        $order_id=$information[1];
        }if($i==1){
        $tracking_id=$information[1];
        }if($i==2){
        $bank_ref_no=$information[1];
        }if($i==3){
        $order_status=$information[1];
        }if($i==4){
        $failer_msg=$information[1];
        }if($i==5){
        $payment_mode=$information[1];
        }if($i==6){
        $card_name=$information[1];
        }if($i==7){
        $status_code=$information[1];
        }if($i==8){
        $status_message=$information[1];
        }if($i==10){
        $amount=$information[1];
        }if($i==11){
        $billing_name=$information[1];
        }if($i==12){
        $billing_address=$information[1];
        }if($i==13){
        $billing_city=$information[1];
        }if($i==14){
        $billing_state=$information[1];
        }if($i==15){
        $billing_zip=$information[1];
        }if($i==16){
        $billing_country=$information[1];
                }if($i==17){
                 $billing_tel=$information[1];
                }if($i==18){
                 $billing_email=$information[1];
                }
				if($i==19){
                 $delivery_name=$information[1];
                }
				if($i==20){
                 $delivery_address=$information[1];
                }
				if($i==21){
                 $delivery_city=$information[1];
                }
				if($i==22){
                 $delivery_state=$information[1];
                }
				
				if($i==23){
                 $delivery_zip=$information[1];
                }
				if($i==24){
                 $delivery_country=$information[1];
                }
				if($i==25){
                 $delivery_tel=$information[1];
                }
				
				if($i==26){
                 $user_id=$information[1];
                }
				 if($i==27){
                 $merchant_param2=$information[1];
                }
				if($i==28){
                 $merchant_param3=$information[1];
				 }
				 if($i==29){
                 $merchant_param4=$information[1];
				 }
				 if($i==30){
                 $merchant_param5=$information[1];
				 }
                if($i==40){
                 $order_date=$information[1];
                }
			}
       die;
			if($order_status==="Success"){
			//$order_date=date('Y-m-d h:t');
			$sql="insert into order_details set  inv_order_id='".$order_id."',customer_id='".$user_id."', customer_name='".$billing_name."', customer_address='".$billing_address."', customer_city='".$billing_city."', customer_state='".$billing_state."', customer_country='".$billing_country."', customer_pincode='".$billing_zip."', customer_contact='".$billing_tel."', customer_email='".$billing_email."',delivery_name='".$delivery_name."',delivery_address='".$delivery_address."',delivery_city='".$delivery_city."',delivery_state='".$delivery_state."',delivery_zip='".$delivery_zip."',delivery_country='".$delivery_country."',delivery_tel='".$delivery_tel."', order_amount='".$amount."', bank_ref_no='".$bank_ref_no."', bank_name='".$card_name."', payment_mode='".$payment_mode."', order_date='".$date."',order_status='".$order_status."', order_comments='".$order_status."',company_name='".$merchant_param3."',invoice_no='".$merchant_param2."',gst_no='".$merchant_param4."',pan_no='".$merchant_param5."'";      
			$insert=  mysql_query($sql);
			$data['msg']= "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
			$data=array('order_id'=>$order_id,'order_date'=>$date,'invoice_no'=>$merchant_param2);
			$this->cart_model->order_id_update_for_cart($data,$user_id);
			$copytoinvoice_details="insert into tbl_invoice_details (
invoice_id,surface,qty,customer_id,frame_size_height,frame_size_width,frame_color,frame_cost,mount_size_height,mount_size_width,mount_color,mount_cost,glass_name ,glass_cost,price,image_size,image_id,sku_id,customer_type,created_date,sr_id,paid_status,region,updated_status,tax_goods,hsn_code,tax_amount,tax_cgst,tax_amt_cgst,tax_sgst,tax_amt_sgst,tax_igst,tax_amt_igst,grand_price)	
		SELECT order_id, image_print_type,qty,user_id,frame_size,frame_size,frame_color,frame_cost,mount_size,mount_size,mount_color,mount_cost,glass_type,glass_cost,price,image_size,image_name,image_name,'B2C',order_date,sr_no,'1','Online','Processing',
tax_goods,hsn_code,tax_amount,tax_cgst,tax_amt_cgst,tax_sgst,tax_amt_sgst,tax_igst,tax_amt_igst,grand_price
				from tbl_cart where user_id='".$user_id."'";
			$insert1=  mysql_query($copytoinvoice_details);
			$copytoinvoice="insert into tbl_invoice (
invoice_id,customer_type,price,total_paid_with_tax )
		SELECT invoice_id,'B2C',sum(price),'".$amount."'
				from tbl_invoice_details where invoice_id='".$order_id."'";
			$insert2=  mysql_query($copytoinvoice);
			$udate_tbl_invoice="update tbl_invoice_details set company_name='".$merchant_param3."',customer_city='".$delivery_city."',created_date='".$date."' where invoice_id='".$order_id."'";
			$udate_tbl_insert=mysql_query($udate_tbl_invoice);
// starts for order details
																 
			$copytoorder_details="insert into tbl_orders_details (
			order_id,surface,quantity,customer_id,frame_size_height,frame_size_width,frame_color,frame_cost,mount_size_height,mount_size_width,mount_color,mount_cost,glass_name ,glass_cost,price,image_size,image_id,sku_id,customer_type,created_date,sr_id,region,paid_status,sales_person,client_servicing,convert_to_order,tax_goods,hsn_code,tax_amount,tax_cgst,tax_amt_cgst,tax_sgst,tax_amt_sgst,tax_igst,tax_amt_igst,grand_price)	
			SELECT order_id,image_print_type,qty,user_id,frame_size,frame_size,frame_color,frame_cost,mount_size,mount_size,mount_color,mount_cost,glass_type,glass_cost,price,image_size,image_name,image_name,'B2C',order_date,sr_no,'Online','1','Online','Online','6',tax_goods,hsn_code,tax_amount,tax_cgst,tax_amt_cgst,tax_sgst,tax_amt_sgst,tax_igst,tax_amt_igst,grand_price
			from tbl_cart where order_id='".$order_id."'";
			$insert3=  mysql_query($copytoorder_details);
			$udate_tbl_orders="update tbl_orders_details set company_name='".$merchant_param3."',customer_city='".$delivery_city."',created_date='".$date."',order_id2='".$merchant_param2."' where order_id='".$order_id."'";
			$udate_tbl_orders_insert=mysql_query($udate_tbl_orders);												  
			$copytoorder="insert into tbl_orders (order_id,order_id2,price,total_paid_with_tax)	
			SELECT order_id,order_id2,sum(price),'".$amount."'
			from tbl_orders_details where order_id='".$order_id."'";
			$insert4=  mysql_query($copytoorder);
			$this->cart_model->remove_cart($user_id);
		}else if($order_status==="Aborted"){
		$sql="insert into order_details set  customer_id='".$user_id."', customer_name='".$billing_name."', customer_address='".$billing_address."', customer_city='".$billing_city."', customer_state='".$billing_state."', customer_country='".$billing_country."', customer_pincode='".$billing_zip."', customer_contact='".$billing_tel."', customer_email='".$billing_email."', order_amount='".$amount."', bank_ref_no='".$bank_ref_no."', bank_name='".$bank_ref_no."', payment_mode='".$payment_mode."', order_date='".$date."', order_status='".$order_status."', order_comments='".$order_status."'";      
        $insert=  mysql_query($sql);
		$data['msg']= "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
		}else if($order_status==="Failure"){
		$sql="insert into failure_order_details set  inv_order_id='".$order_id."',customer_id='".$user_id."', customer_name='".$billing_name."', customer_address='".$billing_address."', customer_city='".$billing_city."', customer_state='".$billing_state."', customer_country='".$billing_country."', customer_pincode='".$billing_zip."', customer_contact='".$billing_tel."', customer_email='".$billing_email."',delivery_name='".$delivery_name."',delivery_address='".$delivery_address."',delivery_city='".$delivery_city."',delivery_state='".$delivery_state."',delivery_zip='".$delivery_zip."',delivery_country='".$delivery_country."',delivery_tel='".$delivery_tel."', order_amount='".$amount."', bank_ref_no='".$bank_ref_no."', bank_name='".$card_name."', payment_mode='".$payment_mode."', order_date='".$date."',order_status='".$order_status."', order_comments='".$order_status."',company_name='".$merchant_param3."',invoice_no='".$merchant_param2."'";   
		$insert=  mysql_query($sql);
		$data['msg']= "<br>Thank you for shopping with us.However,the transaction has been declined by you.";
		}else if($order_status==="Initiated"){
		echo $order_status.'xyzis working you have no balance in your card'; die;
		$sql="insert into failure_order_details set  inv_order_id='".$order_id."',customer_id='".$user_id."', customer_name='".$billing_name."', customer_address='".$billing_address."', customer_city='".$billing_city."', customer_state='".$billing_state."', customer_country='".$billing_country."', customer_pincode='".$billing_zip."', customer_contact='".$billing_tel."', customer_email='".$billing_email."',delivery_name='".$delivery_name."',delivery_address='".$delivery_address."',delivery_city='".$delivery_city."',delivery_state='".$delivery_state."',delivery_zip='".$delivery_zip."',delivery_country='".$delivery_country."',delivery_tel='".$delivery_tel."', order_amount='".$amount."', bank_ref_no='".$bank_ref_no."', bank_name='".$card_name."', payment_mode='".$payment_mode."', order_date='".$date."',order_status='".$order_status."', order_comments='".$order_status."',company_name='".$merchant_param3."',invoice_no='".$merchant_param2."'";   
        $insert=  mysql_query($sql);
		$data['msg']= "<br>Thank you for shopping with us.However,the transaction has been declined by you.";
		}else{
		$sql="insert into order_details set  customer_id='".$user_id."', customer_name='".$billing_name."', customer_address='".$billing_address."', customer_city='".$billing_city."', customer_state='".$billing_state."', customer_country='".$billing_country."', customer_pincode='".$billing_zip."', customer_contact='".$billing_tel."', customer_email='".$billing_email."', order_amount='".$amount."', bank_ref_no='".$bank_ref_no."', bank_name='".$bank_ref_no."', payment_mode='".$payment_mode."', order_date='".$date."', order_status='".$order_status."', order_comments='".$order_status."'";      
        $insert=  mysql_query($sql);
		$data['msg']= "<br>Security Error. Illegal access detected";
	}
        $data['order_id']=$order_id;
		$data['transection_id']=$bank_ref_no;
        $this->load->view('frontend/header');
		if($order_status==="Failure"){
		$this->load->view('cart/order_unsuccess',$data);
		}else{
		$this->load->view('cart/order_success',$data);
		}
		$this->load->view('frontend/footer');
	}
        
     public function cancel_url(){
        error_reporting(0);
		error_reporting(0);
        $workingKey='8B946628C454C5B00245F9786CB2F868';		//Working Key should be provided here.
		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=$this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
	    $t=1;
	    $this->load->view('frontend/header');
		$this->load->view('cart/order_unsuccess',$data);
		$this->load->view('frontend/footer');
        }

        public function update_cart($qty,$row_id,$price,$type){
			$price1=$price*$qty;
			if(!$this->session->userdata('userid')){
			$data=array('rowid'=>$row_id,'qty'=>$qty,'price'=>$price1);
			$this->cart->update($data);
			$data=array('row_id'=>$row_id,'cart_quantity'=>$qty,'updated_price'=>$price1);
			$this->cart_model->update_cart_byrow($data,$row_id);
			}else{
			$data=array('cart_quantity'=>$qty,'updated_price'=>$price1);
			$this->cart_model->update_cart($data,$row_id);
			}
			redirect("cart/cart_view?search=".$type);
		}

		public function remove_cart($row_id,$type){
			if($this->session->userdata('userid')){
			$this->cart_model->remove_cart($row_id);
			}else{
			$data=array('rowid'=>$row_id,'qty'=>0);
			$this->cart->update($data);
			$this->cart_model->remove_cart_byrowid($row_id);
			}
			redirect('cart/cart_view?search='.$type);
		}

        
	public function payment_by_cod(){
		$order_id=$this->input->post('order_id');
		$user_id=$this->input->post('merchant_param1');
		$billing_name=$this->input->post('billing_name');
		$billing_address=$this->input->post('billing_address');
		$billing_country=$this->input->post('billing_country');
		$billing_zip=$this->input->post('billing_zip');
		$billing_tel=$this->input->post('billing_tel');
		$billing_email=$this->input->post('billing_email');
		$delivery_name=$this->input->post('delivery_name');
		$delivery_address=$this->input->post('delivery_address');
		$delivery_city=$this->input->post('delivery_city');
		$delivery_state=$this->input->post('delivery_state');
		$delivery_name=$this->input->post('delivery_name');
		$delivery_address=$this->input->post('delivery_address');
		$delivery_zip=$this->input->post('delivery_zip');
		$delivery_country=$this->input->post('delivery_country');
		$delivery_tel=$this->input->post('delivery_tel');
		$amount=$this->input->post('amount');
		$merchant_param2=$this->input->post('merchant_param2');
		$merchant_param3=$this->input->post('merchant_param3');
		$merchant_param4=$this->input->post('merchant_param4');
		$merchant_param5=$this->input->post('merchant_param5');
		$payment_mode='COD';
		date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$sql="insert into order_details set  inv_order_id='".$order_id."',customer_id='".$user_id."', customer_name='".$billing_name."', customer_address='".$billing_address."', customer_city='".$billing_city."', customer_state='".$billing_state."', customer_country='".$billing_country."', customer_pincode='".$billing_zip."', customer_contact='".$billing_tel."', customer_email='".$billing_email."',delivery_name='".$delivery_name."',delivery_address='".$delivery_address."',delivery_city='".$delivery_city."',delivery_state='".$delivery_state."',delivery_zip='".$delivery_zip."',delivery_country='".$delivery_country."',delivery_tel='".$delivery_tel."', order_amount='".$amount."', bank_ref_no='".$bank_ref_no."', bank_name='".$card_name."', payment_mode='".$payment_mode."', order_date='".$date."',order_status='".$order_status."', order_comments='".$order_status."',company_name='".$merchant_param3."',invoice_no='".$merchant_param2."',gst_no='".$merchant_param4."',pan_no='".$merchant_param5."'";      
		$insert=  mysql_query($sql);
		$data['msg']= "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		$data=array('order_id'=>$order_id,'order_date'=>$date,'invoice_no'=>$merchant_param2);
		$this->cart_model->order_id_update_for_cart($data,$user_id);
		$copytoinvoice_details="insert into tbl_invoice_details (
		invoice_id,surface,qty,customer_id,frame_size_height,frame_size_width,frame_color,frame_cost,mount_size_height,mount_size_width,mount_color,mount_cost,glass_name ,glass_cost,price,image_size,image_id,sku_id,customer_type,created_date,sr_id,paid_status,region,updated_status,tax_goods,hsn_code,tax_amount,tax_cgst,tax_amt_cgst,tax_sgst,tax_amt_sgst,tax_igst,tax_amt_igst,grand_price)	
		SELECT order_id, image_print_type,qty,user_id,frame_size,frame_size,frame_color,frame_cost,mount_size,mount_size,mount_color,mount_cost,glass_type,glass_cost,price,image_size,image_name,image_name,'B2C',order_date,sr_no,'0','Online','Processing',
		tax_goods,hsn_code,tax_amount,tax_cgst,tax_amt_cgst,tax_sgst,tax_amt_sgst,tax_igst,tax_amt_igst,grand_price
		from tbl_cart where user_id='".$user_id."'";
		$insert1=  mysql_query($copytoinvoice_details);

		$copytoinvoice="insert into tbl_invoice (
		invoice_id,customer_type,price,total_paid_with_tax )
		SELECT invoice_id,'B2C',sum(price),'".$amount."'
		from tbl_invoice_details where invoice_id='".$order_id."'";
		$insert2=  mysql_query($copytoinvoice);
		$udate_tbl_invoice="update tbl_invoice_details set company_name='".$merchant_param3."',customer_city='".$delivery_city."',created_date='".$date."',payment_mode='COD' where invoice_id='".$order_id."'";
		$udate_tbl_insert=mysql_query($udate_tbl_invoice);
		// starts for order details

		$copytoorder_details="insert into tbl_orders_details (
		order_id,surface,quantity,customer_id,frame_size_height,frame_size_width,frame_color,frame_cost,mount_size_height,mount_size_width,mount_color,mount_cost,glass_name ,glass_cost,price,image_size,image_id,sku_id,customer_type,created_date,sr_id,region,paid_status,sales_person,client_servicing,convert_to_order,tax_goods,hsn_code,tax_amount,tax_cgst,tax_amt_cgst,tax_sgst,tax_amt_sgst,tax_igst,tax_amt_igst,grand_price)	
		SELECT order_id,image_print_type,qty,user_id,frame_size,frame_size,frame_color,frame_cost,mount_size,mount_size,mount_color,mount_cost,glass_type,glass_cost,price,image_size,image_name,image_name,'B2C',order_date,sr_no,'Online','0','Online','Online','6',tax_goods,hsn_code,tax_amount,tax_cgst,tax_amt_cgst,tax_sgst,tax_amt_sgst,tax_igst,tax_amt_igst,grand_price
		from tbl_cart where order_id='".$order_id."'";
		$insert3=  mysql_query($copytoorder_details);

		$udate_tbl_orders="update tbl_orders_details set company_name='".$merchant_param3."',customer_city='".$delivery_city."',created_date='".$date."',order_id2='".$merchant_param2."' where order_id='".$order_id."'";
		$udate_tbl_orders_insert=mysql_query($udate_tbl_orders);												  
		$copytoorder="insert into tbl_orders (order_id,order_id2,price,total_paid_with_tax)	
		SELECT order_id,order_id2,sum(price),'".$amount."' from tbl_orders_details where order_id='".$order_id."'";
		$insert4=  mysql_query($copytoorder);

		//$user_details="select * from tbl_registration where customer_id='".$user_id."'";
		//$user_get_details=mysql_query($user_details);
		//$user_name=$user_get_details['first_name'].' '.$user_get_details['last_name'];
		//$user_email=$user_get_details['email_id'];

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
		<tr><td colspan="4"><p><img src="'.base_url().'images/mahattaArt_logo.png" width="300"/></p></td></tr>
		<tr><td colspan="4"><p>Dear '.$billing_name.',</p></td></tr>
		<tr><td colspan="4"><p>Thank you for placing your order with <a href="'.base_url().'">MahattaArt.com</a>!</p></td></tr>
		<tr><td colspan="4"><p>We have received your order for PAINTING WITH GLASS with order ID is '.$order_id.' AMOUNTING RS '.$amount.' /- </p></td></tr>
		<tr><td colspan="4"><p>We will ship your order within 5-6 business days.</p></td></tr>
		<tr><td colspan="4"><p>We will send you an update when your order will be ready for shipping.</p></td></tr>
		<tr><td colspan="4"><p>Details of Your Order:</p></td></tr>
		<tr><td colspan="4"><p>Order Name:</p></td></tr>
		<tr><td colspan="4"><p>Order ID:	'.$order_id.'</p></td></tr>
		<tr><td colspan="4"><p>Order Date:	'.$date.'</p></td></tr>
		<tr><td colspan="4"><p>Shipping Address:	'.$delivery_address.'</p></td></tr>
		<tr><td colspan="4"><p>Mode of Payment: Cash on Delivery</p></td></tr>
		<tr><td colspan="4"><p>Keep exploring the Mahatta Art gallery, an online art gallery having archival collection from more than 550 international museums. To know more <a href="'.base_url().'">click here link</a></p></td></tr>
		<tr><td colspan="4"><p>For any queries email us at <a href="mailto:info@mahattaart.com">info@mahattaart.com</a> or contact us at: +91-8800639075, 011-41828972</p></td></tr>
		<tr><td colspan="4"><p>Regards,</p></td></tr>
		<tr>
		<td width="150" style="vertical-align:top"><p>Mahattaart Team</p></td>
		<td><a href="https://www.facebook.com/mahattaart"><img src="'.base_url().'images/facebook.jpg" width="50px" height="50px"></a><a href="https://www.linkedin.com/company/13458390"><img src="'.base_url().'images/linkdin.jpg" width="50px" height="50px"></a><a href="https://twitter.com/mahattaart"><img src="'.base_url().'images/twitter.jpg" width="50px" height="50px"></a><a href="https://www.instagram.com/mahattaart"><img src="'.base_url().'images/instagram.png" width="50px" height="50px"></a></td>
		</tr>
		</table>
		</body>
		</html>';
		$this->email->clear(TRUE);
		$this->email->from('info@mahattaart.com', 'MahattaArt');
		$this->email->to($billing_email);
		//$this->email->cc('operations@mahattaart.com');
		$this->email->subject('Welcome to Mahatta Art');
		$this->email->message($messages);
		$send=$this->email->send();


		$this->cart_model->remove_cart($user_id);
		$this->load->view('frontend/header');
		$this->load->view('cart/order_success_cod',$data);
		$this->load->view('frontend/footer');

	}


        public function Cart_remove($row_id,$cart_td){
            if($cart_td<>''){
            $this->cart_model->User_remove_cart($row_id,$cart_td);
            }
           	redirect(base_url().'index.php/cart/cart_view?search=');	
			//header("location:.base_url().index.php/cart/cart_view");
        }

		//function to save cart by email here tbl_cart table is used to store each and every item of cart
		public function save_cart(){
			if($this->input->post('email')){
			foreach($this->cart->contents() as $image){
				$data=array('image_id'=>$image['id'],'image_name'=>$image['name'],'price'=>$image['price'],'cart_quantity'=>$image['qty'],'price'=>$image['subtotal'],'email'=>$this->input->post('email'),'row_id'=>$image['rowid']);
				$valid=$this->cart_model->cart_valid_byemail($this->input->post('email'),$image['id']);
					if(!$valid){
					$this->cart_model->add_cart($data);
					}
				}
				redirect('cart/cart_view');
			}
		}
	
	//function to retrieve cart by email here current cart is being destroyed and then get items from cart and then create a new cart
	public function retrieve_cart(){
		if($this->input->post('txtEmail')){
			$this->cart->destroy();
			$data1=$this->cart_model->get_cart_byemail($this->input->post('txtEmail'));
			foreach($data1 as $cart){
				$data=array('id'=>$cart['image_id'],'qty'=>$cart['cart_quantity'],'price'=>$cart['price'],'name'=>$cart['image_name']);
				$this->cart->insert($data);
			}
			redirect('cart/cart_view');
		}else{
			$this->load->view('frontend/header');
			$this->load->view('cart/retrieve_cart');
			$this->load->view('frontend/footer');
		}
	}

        

        

        public function cart_detail_save(){
        $size_with_border=$this->input->post('size_with_border');
		//echo $size_with_border;
          $chkout=$this->input->post('chkout');
        $user_id=$this->session->userdata('userid');
         $image_filename=$this->input->post('image_filename');
       $total_size=$this->input->post('total_size');
        $action_method=$this->input->post('action_method');
        $total_cost=$this->input->post('total_cost');
        $image_id=$this->input->post('image_id');
          $paper_surface=$this->input->post('print_sizes');
      date_default_timezone_set('Asia/Kolkata');
		 $date=date('Y-m-d H:i:s');
        if($action_method=='search'){
        $data2=array('cart_id'=>'','image_print_type'=>$paper_surface,'image_id'=>$image_id,'qty'=>1,'user_id'=>$user_id,'frame_size'=>'0','frame_color'=>'0','frame_cost'=>'0','mount_size'=>'0','mount_color'=>'0','mount_cost'=>'0','glass_type'=>'0','glass_cost'=>'0','price'=>$total_cost,'updated_price'=>'0','total_price'=>'','image_size'=>$total_size,'images_price'=>$total_cost,'borderd_image_size'=>$size_with_border,'image_name'=>$image_filename,'create_date'=>$date);
		
        }
	//echo $user_id.'&'.$image_id.'&'.$paper_surface.'&'.$total_size;
      //  echo $total_size;
         $check1= $this->frontend_model->check_cart_details($user_id,$image_id,$paper_surface,$total_size);
    // print_r($check1);
	  
        if($check1==0)
        {
        $insert=$this->frontend_model->insert_into_cart($data2);
		echo 1;
        }
		if($check1==1){
		
		$check2= $this->frontend_model->get_cart_details($user_id,$image_id,$paper_surface,$total_size);
		$frame_size_alraedy=$check2[0]->frame_size;
		/*
		if($frame_size_alraedy==1){
		 $insert=$this->frontend_model->insert_into_cart($data2);
		 echo 1;
		}
		else
		*/
		if($frame_size_alraedy!=''){
		$qty=$check2[0]->qty;
		$update_qty=$qty+1;
		$price=$check2[0]->price;
		$update_price=(($price/$qty)*$update_qty);
		$data3=array('qty'=>$update_qty,'price'=>$update_price);
		 $insert=$this->frontend_model->update_qty_for_cart($total_size,$paper_surface,$image_filename,$data3);
            echo $insert;
			 }
         }
		 if($check1==2){
		$check2= $this->frontend_model->get_cart_details($user_id,$image_id,$paper_surface,$total_size);
		foreach($check2 as $seprate){
		 $frame_size=$seprate->frame_size;
		 
		   if($frame_size==0){
		$qty=$seprate->qty;
		//echo $qty;
		$update_qty=$qty+1;
		$price=$seprate->price;
		$update_price=(($price/$qty)*$update_qty);
		$data3=['qty'=>$update_qty,'price'=>$update_price];
		 $insert=$this->frontend_model->update_qty_for_cart($total_size,$paper_surface,$image_filename,$data3);
             echo $insert;
			}
			 }
	 }
        
        }

	public function check_image_exist_status(){
		$print_type=$this->input->post('print_type');
		$user_id=$this->session->userdata('userid');
		$image_id=$this->input->post('image_id');
		$price=$this->input->post('price');
		$sizes=$this->input->post('size');
		$bool=$this->cart_model->check_image_existence($user_id,$image_id,$price,$image_size,$print_type);
		echo $bool;
	}

 

	public function submit_cart($user_id){   
		$mesage="";
        $total="";   
        $data=$this->cart_model->get_cart($user_id);
       foreach($data as $cartvalues){  
			$text = "Image ID:$cartvalues->image_id \n";
			$text .= "Print Type:$cartvalues->image_print_type \n";
			$text .= "Date Time:$cartvalues->date_time \n";
			$text .= "Frame:$cartvalues->frame \n ";
			$text .= "Mount:$cartvalues->mount \n";
            $text .= "Price:$cartvalues->price \n ";
            $text .= "Image Size:$cartvalues->image_size \n ";
            $text .= "Image Name:$cartvalues->image_name \n ";
            $mesage  = $mesage.''.$text."'\n'";
            $total= $total+$cartvalues->price;         
         }
        $data1=$this->frontend_model->get_user_details($user_id);
        $email=$data1->email_id;
        $subject="  Order Details of $email";
        $this->email->from('info@wallsnart.com');
        $this->email->to('nitanshukhatri@yahoo.in', 'Wallsnart');
		$this->email->subject($subject);
        $this->email->message('Hi'."\n"."\n".'Thank You For Shopping on WallsnArt.'
					."\n"."\n"
					.'Please find you Order Details Below'
					."\n"
					 ."$mesage"
					."\n"
                    ."Total Price :$total Rs"
					."\n"."\n"
					.'WallsnArt Team'
					."\n"
					.'www.wallsnart.in'
					."\n"."\n"."\n"
					.'This is an automatically generated email. Please do not reply');
					$this->email->send();
					redirect('cart/cart_view');
		}

		public function save_user_login_details($user_id,$url,$ipaddress){
                $data2=array('user_id'=>$user_id,'login_session_detals'=>$url,'system_ip'=>$ipaddress);
                $check1= $this->frontend_model->check_user_login_details($user_id);
                if($check1==0){
                    $this->frontend_model->track_login_details($data2);
                }else{
                   $this->frontend_model->update_track_login_details($data2,$user_id);
                }
			}   
		}