<?php
session_start();
if (!isset($_GET["txt_newpassword"]) && !isset($_GET["txt_cnfspassword"]))
{
    $_SESSION['email'] = $_GET['email'];
}
$name = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Change Password</title>
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

                <form class="login100-form validate-form" style= "margin-left: 50px;" method="get">

                    <center>
                        <h2 >Change Password
                        </h2></center>
                    <hr>

                    <div class="wrap-input100 validate-input" style="margin-top:10px;" >
                        <input class="input100" type="password" name="txt_newpassword" id="txt_newpassword"    placeholder="Enter New Password"    >
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" style="margin-top:10px;" >
                        <input class="input100" type="password" name="txt_cnfpassword" id="txt_cnfpassword"    placeholder="Enter Confirm Password"    >
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


                        $np = $_GET['txt_newpassword'];
                        $cp = $_GET['txt_cnfpassword'];

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "moment";
                        $c = new mysqli($servername, $username, $password, $dbname);

                        if ($c->connect_error)
                        {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        if ($_GET["txt_newpassword"] == $_GET["txt_cnfpassword"])
                        {

                            $q = "select Email from userdata where Email='$name'";
                            $r = mysqli_query($c, $q);
                            $q2 = "select Email from photographerdata where Email='$name'";
                            $r2 = mysqli_query($c, $q2);

                            if (mysqli_num_rows($r) > 0 || mysqli_num_rows($r2) > 0)
                            {
                                if (mysqli_num_rows($r) > 0)
                                {
                                    $q = "UPDATE userdata SET Password='$cp' WHERE Email='$name'";
                                    $r3 = mysqli_query($c, $q);
                                   if ($r3 == 1)
                                    {
                                        echo "<script>swal('Good!', 'Password Changed Successfully!', 'success');</script>";
                                    } else
                                    {
                                        echo "<script>swal('Opps!', 'Password Not Matched!', 'error');</script>";
                                    }
                                } else if (mysqli_num_rows($r2) > 0)
                                {
                                    $q = "UPDATE photographerdata SET Password='$cp' WHERE Email='$name'";
                                    $r3 = mysqli_query($c, $q);
                           if ($r3==1)
                                    {
                                        echo "<script>swal('Good!', 'Password Changed Successfully!', 'success');</script>";
                                    } else
                                    {
                                        echo "<script>swal('Opps!', 'Password Not Matched!', 'error');</script>";
                                    }
                                }
                            } else
                            {
                                echo "<script>swal('Opps!', 'Invalid Email-ID', 'error');</script>";
                            }
                        } else
                        {
                            echo "<script>swal('Opps!', 'Invalid Input', 'error');</script>";
                        }
                        $c->close();
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