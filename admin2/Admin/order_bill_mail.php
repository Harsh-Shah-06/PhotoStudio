<?php

session_start();

include './connection.php';
if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

require './mailer/mailerClass/PHPMailerAutoload.php';

$id = $_GET['order_code'];

$id = $_GET['order_code'];

$sel = "select * from bookingorder where Status = 'Completed' and Id = '$id'";
$res = mysqli_query($con, $sel);
$row = mysqli_fetch_array($res);



$name = $row['FirstName']." ".$row['LastName'];

    $to = $_GET['customer'];
    $from = "Moment Photo Studio";
    $subject = "Purchase Bill";
    $message = "Dear $name  ," ."<br/>"."Your order at Moment Photo Studio has been successfully completed."."<br/>"."<br/>"."This email message will be considered as online recipt."."<br/>"."<br/>".$_SESSION['bill']."<br/>"."<br/>"."The Moment Photo Studio"."<br/>"."http://localhost:8080/Moment/index.php";                
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
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);

    if (!$mail->Send()) {
        echo "<snap class ='sussess'>Something went Wrong!</snap>";
        echo "$mail->ErrorInfo";
    } else {
        echo "<snap class ='sussess'>Message Send Sussessfully!</snap>";
    }   
?>
