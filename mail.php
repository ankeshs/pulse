<?php
function sendmail ($to,$sub,$body)
{
require("class.phpmailer.php");       
$from="pulse@iitk.ac.in";
$host = "smtp.cc.iitk.ac.in";
$name = "Pulse_IITK";                //$name is the name of person sending mail.
$mail = new PHPMailer();
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = $host;  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "ankeshs";        // SMTP authentication username
$mail->Password = "krutidev632";        // SMTP authentication password
$mail->From = $from;
$mail->FromName = $name;
$mail->AddReplyTo($from, $name);
$mail->WordWrap = 100;
$mail->Subject = $sub;
$flag=1;
//echo $to;
$mail->AddAddress($to,"");
$mail->Body=$body;
if(!$mail->Send())
{
    echo "Message could not be sent to $address <br>";
    echo "Mailer Error: " . $mail->ErrorInfo;
    echo "<br>";
    $error=true;
    $flag=0;
}
$mail->ClearAddresses();
return $flag;
}
?>
