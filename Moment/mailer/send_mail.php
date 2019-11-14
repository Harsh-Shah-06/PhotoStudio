<?php
   require 'mailerClass/PHPMailerAutoload.php';
   
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 3;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';

   $mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

   //$mail ->Host = "tls.gmail.com";
   $mail->Host = 'smtp.gmail.com';
   //$mail->Host = 'tls://smtp.gmail.com';
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "email";
   $mail ->Password = "pass";
   $mail ->SetFrom("patelpreeta3554@gmail.com");
   $mail ->Subject = "hello";
   $mail ->Body = "hello";
   $mail ->AddAddress("patelpreeta3554@gmail.com");

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
	    echo "$mail->ErrorInfo";
   }
   else
   {
       echo "Mail Sent";
	    
   }
?>




   

