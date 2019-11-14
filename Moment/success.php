<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Successful Booking</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <script src="js/wow.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Animation -->
        <script src="js/wow.js" type="text/javascript"></script>
        <link href="css/animate_2.css" rel="stylesheet" type="text/css"/>

        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">
        <link href="css/animate_1.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div class="ag-subheader">
<center>
            <h2>Moment Studio</h2>
        <h2>Successfull Booking</h2>
        </center>
        <hr>
        </div><!--end subheader-->
       <br>
       <br>
<?php
include 'connection.php';

session_start();
$cn=$_SESSION['cn'];

$q1="select * from category where CategoryId=$cn";
$r1= mysqli_query($c, $q1);
while ($re= mysqli_fetch_assoc($r1))
{
    $cname=$re['CategoryName'];
    
}

$sc=$_SESSION['sc'];
$city=$_SESSION['city'];

$q="select * from subcategory where SCategoryId=$sc";
$r= mysqli_query($c, $q);
while ($re= mysqli_fetch_assoc($r))
{
    $sn=$re['SCategoryName'];
}

$sdate=@$_SESSION['sd'];
$ln= ucwords($_SESSION['ln']);
$con=$_SESSION['phone'];

//echo $sc;
//echo $sdate;
//echo $ln;
?>
<?php
include 'connection.php';

$status = $firstname = $amount = $txnid = $posted_hash = $key = $productinfo = $email = $salt = "";

$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$salt = "rDoUXUO5GT";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"]))
{
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;

} else
{
    $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);
if ($hash != $posted_hash)
{
    echo "Invalid Transaction. Please try again";
} else
{
           $firstname = $lastname = $contact =$bdate= $scategory="";
           $email= ucwords($_POST['email']);
            $firstname = ucwords( $_POST['firstname']);
           
            $comment = ucwords($_POST['productinfo']);
            $amount = $_POST['amount'];
            $bdate = date('y-m-d');
 
                
            $q = "insert into bookingorder values('','$email','$firstname','$ln','$amount','$con','$bdate','$sdate','$comment','$cname','$sn','$city','0','Pending')";
            $r = mysqli_query($c, $q);
            
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
        $mail->Subject = "Order Booking";
        $mail->Body = "<h2>Dear Customer,<br>You have booked  $amount INR  packege of $sn for this photographer allocation very soon.<br>For order details  check in your account and about further Process we will contect very soon.<br>If any query contact within Email(studiomoment06@gmail.com) and Mobile(9727877500 & 9913165711).<h2>";
        $mail->AddAddress("$email");

        if (!$mail->Send())
        {
            echo "Mail Not Sent";
            echo "$mail->ErrorInfo";
        } else
        {
            //echo "Mail Sent";
        }
            $c->close();
        
            unset($_POST['txt_firstname']);
            unset($_POST['txt_lastname']);
          //  unset($_POST['phone']);
            unset($_POST['txt_email']);
            unset($_POST['txt_sdate']);
             unset($_POST['txt_bdate']);
            unset($_POST['btn_submit']);
         
   echo  "<center>";
   
   
    echo "<h3>Thank You. Your order status is " . $status . ".</h3>";
    echo "<h3>Your Transaction ID for this transaction is " . $txnid . ".</h3>";
    echo "<h3>We have received a payment of Rs. " . $amount . ".</h3>";
   echo  "<h3>Your Package will  be Booked.</h3>";
   echo "<br><a href='customeraccount.php' style='text-decoration:none;font-size:30px;color:orange;'>Back To Home Page</a><br><br>";
    echo "</center>";
    include 'footer.php' ;
}
?>
</body>
</html>
 