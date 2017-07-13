<?
die('mohan');
require_once('check_files_exist.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$from = '<fromaddress@gmail.com>';
$to = 'mohansinghmca0912@gmail.com';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'secure.emailsrvr.com',
        'port' => '465',
        'auth' => true,
        'username' => 'mohansinghmca0912@gmail.com',
        'password' => 'Mohan@php26686'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
    
?>