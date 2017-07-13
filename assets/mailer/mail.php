 <?php
 
include("mails/library.php"); // include the library file
include("mails/class.phpmailer.php"); // include the class name
include("mails/class.smtp.php");
    $mail    = new PHPMailer; // call the class 
    $mail->IsSMTP(); 
    $mail->Host = "mail.dev.wallsnart.com"; //Hostname of the mail server
    $mail->Port = 25; //Port of the SMTP like to be 25, 80, 465 or 587
    $mail->SMTPAuth = false; //Whether to use SMTP authentication
    $mail->Username = "mohan@dev.wallsnart.com"; //Username for SMTP authentication any valid email created in your domain
    $mail->Password = "mohan@123"; //Password for SMTP authentication
    $mail->SetFrom("mohan@dev.wallsnart.com"); //From address of the mail
    // put your while loop here like below,
    $mail->Subject = "Subject"; //Subject od your mail
    $mail->AddAddress('mohansinghmca0912@gmail.com'); //To address who will receive this email
    $mail->MsgHTML("<b>Hi, your first SMTP mail has been received. Great Job!..Zaheen <br/><br/></b>"); //Put your body of the message you can place html code here
    $mail->Body = "hjksh jhasdahkjh"; 
     
    //$send = $mail->Send(); //Send the mails
    if(!$mail->Send()){
        echo '<center><h3 style="color:#009933;">Mail error:</h3></center>'.$mail->ErrorInfo;
    }
    else{
        
    }

?>