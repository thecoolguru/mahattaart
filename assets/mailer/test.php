<?php
// the message
$msg = "This is a for testing mail from mahattaArt";

// use wordwrap() if lines are longer than 70 characters

// send email
$mail=mail("mohansinghmca0912@gmail.com","Live mahattaArt",$msg);
if($mail){
 echo 'Mail has been sent successfyully';
}else{
echo 'accuring error';
}
?>