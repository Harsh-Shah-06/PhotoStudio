    <?php 
    
        include 'mailer/mailerClass/PHPMailerAutoload.php';

        $mail = new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';

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
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "studiomoment06@gmail.com";
        $mail->Password = "201506100110028";
        $mail->SetFrom("studiomoment06@gmail.com");
        $mail->Subject = "hello";
        $mail->Body = "hello";
        $mail->AddAddress("harshk9shah@gmail.com");

        if (!$mail->Send())
        {
            echo "Mail Not Sent";
            echo "$mail->ErrorInfo";
        } else
        {
            echo "Mail Sent";
        }
?>