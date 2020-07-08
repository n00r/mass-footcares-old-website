
<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
require './class.phpmailer.php';
require './PHPMailerAutoload.php';
include './class.smtp.php';


$sendername = $_REQUEST['name'];
$senderid = $_REQUEST['email'];
$sendermobile = $_REQUEST['phone'];
$sendermessage = $_REQUEST['comment'];


date_default_timezone_set('Etc/UTC');

try
{

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->IsSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'ibmraga@gmail.com';
//Password to use for SMTP authentication
$mail->Password = 'consideritdone';
//Set who the message is to be sent from

$mail->setFrom($senderid, $sendername);

$mail->AddReplyTo($senderid,$sendername);

//Set who the message is to be sent to
$mail->addAddress('ragavitcian@gmail.com', 'Mass Foor care');
//Set the subject line
$mail->Subject = date('Y/m/d H:i:s')."enquiry @";
//Replace the plain text body with one created manually

$msgs = $sendername.'<br/>'.$senderid.'<br/>'.$sendermobile.'<br/>'.$sendermessage;
$mail->MsgHTML($msgs);
 
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test


//send the message, check for errors
if (!$mail->send()) {
    
    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
} 
else {
 
   print "<meta http-equiv=\"refresh\" content=\"0;URL=success.html\">";

}
}

 catch (Exception $e)
 {
   
    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
 }

?>