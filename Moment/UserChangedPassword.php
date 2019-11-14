<?php
session_start();
if(!isset($_SESSION['email']))
{
    header('Location:login.php');
}
else
{
    $e= $_SESSION['email'];	
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Changed Password</title>
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

        <div class="limiter">

            <div class="container-login100">
                <div class="login100-pic js-tilt" data-tilt  >
                    <img src="images/img-02.png" alt="IMG" >
                </div>

                <form class="login100-form validate-form" style= "margin-left: 50px;" method="post">

                    <center>
                        <h2 >Changed Password
                        </h2></center>
                    <hr>

                    <div class="wrap-input100 validate-input" >
                        <input class="input100" type="text" name="email" id="email"   value="<?php echo $e;?>"placeholder="Enter Email" readonly="">
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input class="input100" type="password" name="oldpassword" id="oldpassword"   placeholder="Enter Old Password">
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="Password" name="newpassword" id="newpassowrd"   placeholder="Enter New Password"  >
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" >
                        <input class="input100" type="password" name="cpassword" id="cpassword"   placeholder="Enter Confirm Password">
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>


                    <div class="container-login100-form-btn">
                        <input type="submit" name="btn_submit" value="Submit" class="login100-form-btn">


                    </div>
                    <center class="error">
                        <br/>
                    </center>
                    <div class="text-center p-t-12">



                        <a class="txt2" href="customeraccount.php">
                            <h6>Home</h6></a>

                    </div>
                    <?php
                    include 'connection.php';
                    include 'mailer/mailerClass/PHPMailerAutoload.php';

                    if (isset($_POST['btn_submit']) && !empty($_POST['btn_submit']))
                    {
                        $newpassword = $cpassword = $oldpassword = "";

                        if (!empty($_POST['oldpassword']) && !empty($_POST['newpassword']) && !empty($_POST['cpassword']) && !empty($_POST['email']))
                        {

                            $oldpassword = $_POST['oldpassword'];
                            $email = $_POST['email'];

                            if (strlen($_POST['newpassword']) >= 8 && strlen($_POST['cpassword']) >= 8)
                            {
                                if ($_POST['newpassword'] != $_POST['cpassword'] && $_POST['newpassword'] != $_POST['oldpassword'])
                                {
                                    echo "<script>swal('Opps!', 'Password Not Matched!', 'error');</script>";
                                } else
                                {

                                    $newpassword = $_POST['newpassword'];

                                    $cpassword = $_POST['cpassword'];

                                    $update = "update userdata set Password='$newpassword' where Email='$email'";
                                    $r = mysqli_query($c, $update);
                                  if($r==1)
                                    {
                                         echo "<script>swal('Good Job!', 'Password Changed Successfully!', 'success');</script>";
                                    }
                                }
                            } else
                            {
                                echo "<script>swal('Opps!', 'Password length must be grater then 7!', 'error');</script>";
                            }
                        } else
                        {
                            echo "<script>swal('Opps!', 'Empty Fields Not Allowed!', 'error');</script>";
                        }
                    }


                    $c->close();
                    unset($_POST['email']);
                    unset($_POST['cpassword']);
                    unset($_POST['newpassword']);
                    unset($_POST['oldpassword']);
                    unset($_POST['btn_submit']);
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
<?php } ?>
