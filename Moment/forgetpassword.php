
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forget Password</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/loginutil.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!--===============================================================================================-->
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
<center>
    <div ><center><a href="index.php" ><h1  style="font-weight:San-serrif;background-color:  lightgray;  color: black;" >Moment Studio</h1></a></center></div>
      
        <div class="limiter">

            <div class="container-login100">
                <div class="login100-pic js-tilt" data-tilt  >
                    <img src="images/img-02.png" alt="IMG" >
                </div>

                <form class="login100-form validate-form" style= "margin-left: 50px;" method="get">

                    <center>
                        <h2 >Forget Password
                        </h2></center>
                    <hr>

                    <div class="wrap-input100 validate-input" style="margin-top:10px;" >
                        <input class="input100" type="text" name="txt_email" id="txt_email"    placeholder="Email"    >
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <input type="submit" name="btn_submit" value="Click" class="login100-form-btn">


                    </div>
                    <center class="error">
                        <br/>
                    </center>
                    <div class="text-center p-t-12">


                        <a class="txt2" href="login.php">
                            <h5>Back to Login</h5></a><br/>
                        <a class="txt2" href="index.php">
                            <h6>Home</h6></a>

                    </div>



                    <?php
                    if (isset($_GET['btn_submit']))
                    { 
                        if (!empty($_GET['txt_email']))
                        {
                            $email = $_GET['txt_email'];
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
                            $mail->Subject = "Forget Password";
                            $mail->Body = "http://localhost:8080/Moment/changeforgetPassword.php?email=" . $email;
                            $mail->AddAddress($_GET['txt_email']);

                            if (!$mail->Send())
                            {
                                echo "<script>swal('Opps!', 'Mail Not Sent', 'error');</script>";
                                //echo "Mail Not Sent";
                                echo "$mail->ErrorInfo";
                            } else
                            {
                                echo "<script>swal('Good job!', 'Mail Sent', 'success');</script>";
                                // echo "Mail Sent";
                            }
                        } else
                        {
                           
                             echo "<script>swal('Opps!', 'Empty Field Not Allowed', 'error');</script>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>

        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>

</html>