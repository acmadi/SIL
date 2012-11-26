<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function send_email($recipient, $subject, $message)
{
    require_once("phpmailer/class/class.phpmailer.php");
	
    $mailsettings = array(
    "Nama" => "Admin BPLHD",
    "Email" => "rizky.percobaan@yahoo.com",
    "Host" => "smtp.mail.yahoo.com",
    "Port" => 25,
    "Secure" => "",
    "Username" => "rizky.percobaan",
    "Password" => "tester123"
	);	

    $mail = new PHPMailer();
	
	$mail->IsSMTP();                                // set mailer to use SMTP
    $mail->Host = $mailsettings["Host"];            // specify main and backup server
    $mail->Port = $mailsettings["Port"];            // specify port
    $mail->SMTPSecure = $mailsettings["Secure"];    // specify secure
    $mail->SMTPAuth = true;                         // turn on SMTP authentication
    $mail->Username = $mailsettings["Username"];    // SMTP username
    $mail->Password = $mailsettings["Password"];    // SMTP password

    $mail->From = $mailsettings["Email"];
    $mail->FromName = $mailsettings["Nama"];
    $mail->AddAddress($recipient, $recipient);

    $mail->WordWrap = 50;                                 // set word wrap to 50 characters
    $mail->IsHTML(true);                                  // set email format to HTML

    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;

    if (!$mail->Send()) {
        $err = "Message could not be sent. ";
        $err .= "Mailer Error: " . $mail->ErrorInfo;
        
        throw new Exception($err);
    }
}
// try {
    // echo "Sending<br />";
    // send_email("qmail_madrid@yahoo.com", "testing", "halo");
// } catch (Exception $e) {
    // echo $e;    
// }
?> 