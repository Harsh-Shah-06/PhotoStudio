<?php
session_start();
ob_start();
if(isset($_SESSION['email']))
{
    if(isset($_SESSION['type']))
    {
        if($_SESSION['type']=="User")
        {
            header('Location:customeraccount.php');
        }
        elseif($_SESSION['type']=="Photographer")
        {
            header('Location:Photographer_Account.php');
        }
       
    }
}
else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login </title>
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
          <script src="js/wow.js" type="text/javascript"></script>
        <link href="css/animate_2.css" rel="stylesheet" type="text/css"/>
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
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
   <div ><center><a href="index.php" ><h1  style="font-weight:San-serrif;background-color:  lightgray;  color: black;" >Moment Studio</h1></a></center></div>
        <div class="limiter">
            <div class="container-login100"> 
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" style="margin:40px">
                        <img src="images/img-01.png" alt="IMG" class="wow bounceInUp">
                    </div>

                    <form class="login100-form validate-form" method="post" >
                        <span class="login100-form-title">
                            Member <hr>
                        </span>

                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="email" name="email" id="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  placeholder="Email"> 
                            <span class="error">* <?php if (isset($errors['email1'])) echo $errors['email1']; ?></span>

                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="password" name="password" id="pass"    placeholder="Password"> 
                            <span class="error">*  <?php if (isset($errors['password1'])) echo $errors['password1']; ?></span>

                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <input type="submit" name="btn_submit" value="Login" class="login100-form-btn">
                        </div>


                        <center class="error">
                            <br/>
                        </center>


                        <div class="text-center p-t-12">

                            <a class="txt2" href="forgetpassword.php">
                                <h6>Forgot Password?</h6><br/>

                            </a>
                            <a class="txt2" href="cregistration.php">
                                <h5>Create your Account  </h5></a><br/>
                            <a class="txt2" href="index.php">
                                <h6 >Home</h6></a>


                        </div>

                    </form>

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
                    <?php
                    include 'connection.php';
                    if (isset($_POST['btn_submit']) && !empty($_POST['btn_submit']))
                    {
                        $email = $password = "";

                        if (!empty($_POST['email']) || !empty($_POST['password']) || (!empty($_POST['email']) && !empty($_POST['password'])))
                        {

                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $_SESSION['email'] = $email;

                        if(($_POST['email']) == "Admin@gmail.com"  && ($_POST['password'] == "Admin"))
                        {
                            header('Location:../admin2/Admin/master.php');
                            $_SESSION['email'] = $email;
                        }  

                            //$pw = md5($password);

                            $q = "select Email from userdata where Email='$email' ";
                            $r = mysqli_query($c, $q);
                            $q2 = "select Email from photographerdata where Email='$email'";
                            $r2 = mysqli_query($c, $q2);


                            if (mysqli_num_rows($r) > 0 || mysqli_num_rows($r2) > 0)
                            {
                                if (mysqli_num_rows($r) > 0)
                                {
                                    $q = "select * from userdata where Email='$email' and Password='$password' and Status='Active'";
                                    $r3 = mysqli_query($c, $q);
                                    if (mysqli_num_rows($r3) > 0)
                                    {
                                        if (isset($_SESSION['chkbooking1'])==1 or isset($_SESSION['chkbooking'])==1)
                                        {
                                          

                                                $bid = $_SESSION['chkbooking'];
                                                $bid1 = $_SESSION['chkbooking1'];


                                            
                                                header("Location:schedule.php?sc=$bid&in=$bid1");
                                             unset(  $_SESSION['chkbooking']) ;
                                                unset($_SESSION['chkbooking1'] );
                                            
                                        } else
                                        {
                                            $_SESSION['type']="User";
                                            header("Location:customeraccount.php");   //Redirect Page Login
                                        }
                                    } else
                                    {
                                        echo "<script>swal('Opps!', 'Password Not Matched Or You Are Deactive!', 'error');</script>";
                                        // echo "<script type='text/javascript'>alert('Password Not Matched')</script>";
                                    }
                                } else if (mysqli_num_rows($r2) > 0)
                                {
                                    $q = "select * from photographerdata where Email = '$email' and Password = '$password' and Status='Active' and Verification='Approved' ";
                                    $r3 = mysqli_query($c, $q);
                                    if (mysqli_num_rows($r3) > 0)
                                    {
                                         $_SESSION['type']="Photographer";
                                        header("Location:Photographer_Account.php"); //Redirect Page Photographer
                                    } else
                                    {

                                        echo "<script>swal('Opps!', 'Password Not Matched Or You Are Deactive !', 'error');</script>";


                                        //echo "<script type='text/javascript'>alert('Password Not Matched')</script>";
                                    }
                                }
                            } else
                            {
                                echo "<script>swal('Opps!', 'Invalid Email-ID', 'error');</script>";
                                //echo "<script type='text/javascript'>alert('Invalid Email-Id')</script>";
                            }
                        } else
                        {
                            echo "<script>swal('Opps!', 'Invalid Input', 'error');</script>";
                            //echo "<script type='text/javascript'>alert('Invalid Input')</script>";
                        }
                        
                        
                    }

                    unset($_POST['txt_email']);
                    unset($_POST['password']);
                    unset($_POST['btn_submit']);
                    ?>

                    <?php
ob_end_flush() ?>
<?php } ?>