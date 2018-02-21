 /******Check Customer Allreadregiste or Not*********/
 $check_email=$this->frontend_model->customer_register_or_not($email);
 if($check_email==1)
 {
?>
 <script>alert("Email Allready Exist.Please Choose Another.")</script>
<?php
 }
 else
 {
	 echo "No"; die();
 }
 
 
 /******End Check Customer Allreadregiste or Not*********/