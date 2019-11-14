

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Customer Registration</title>
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
    
        <div ><center><a href="index.php" ><h1  style="font-weight:San-serrif;background-color:  lightgray;  color: black" >Moment Studio</h1></a></center></div>

<div class="limiter">

    <div class="container-login100">
        <div class="login100-pic js-tilt" data-tilt  >
            <img src="images/signup.png" alt="IMG" class="wow rollIn" >
        </div>

        <form class="login100-form validate-form" style= "margin-left: 50px;" method="post" enctype="multipart/form-data">

            <center>
                <h2 >Customer
                </h2></center>
            <hr>

            <div class="wrap-input100 validate-input" style="margin-top:10px;" >
                <input class="input100" type="email" name="txt_email" id="txt_email"    placeholder="Email"   required="true">
                <span class="error"></span>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" type="text" name="txt_firstname" id="txt_firstname"   placeholder="FirstName" required="true" >
                <span class="error"></span>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="txt_lastname" id="txt_lastname"   placeholder="LastName" required="true" >
                <span class="error"></span>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input" >
                <input class="input100" type="password" name="password" id="password"   placeholder="Password" required="true">
                <span class="error"></span>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="Password" name="cpassword" id="cpassowrd"   placeholder="Confirm Password" required="true" >
                <span class="error"></span>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" type="number" name="txt_contact" id=" txt_contact"   placeholder="Contact" required="true"  >
                <span class="error"></span>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" type="text" name="dob" onfocus="(this.type = 'date')"  id="dob" placeholder="BirthDate" required="true">
                <span class="error"></span>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <?php
            include_once 'connection.php';
            $q = "select * from city order by CityName";
            ?>
            <div class="wrap-input100 validate-input"  >
                <?php
                echo "<select class='input100'  style='outline: none;border:none'   name='city' required='true'><option>Select City</option>";
                foreach ($c->query($q) as $row)
                    echo "<option value=$row[CityName]>$row[CityName]</option>";
                echo "</select>";
                $c->close();
                ?>
                <span class="error"></span>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input" >
                <input class="input100" type="file" name="img"  id="img" placeholder="" required="true">
                <span class="error"></span>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>


            <div class="container-login100-form-btn">
                <input type="submit" name="btn_submit" value="Registration" class="login100-form-btn">


            </div>
            <center class="error">
                <br/>
            </center>
            <div class="text-center p-t-12">


                <a class="txt2" href="login.php">
                    <h5>Back to Login</h5></a><br/>
                <a class="txt2" href="index.php">
                    <h6 >Home</h6></a>

            </div>
        </form>

    </div>
</div>


<?php
include 'connection.php';
require 'claviska/SimpleImage.php';

if (isset($_POST['btn_submit']) && !empty($_POST['btn_submit']))
{
    $email = $firstname = $lastname = $password = $contact = $dob = $city = "";

    if (!empty($_POST['txt_email']) && !empty($_POST['txt_firstname']) && !empty($_POST['txt_lastname']) && !empty($_POST['password']) && !empty($_POST['txt_contact']) && !empty($_POST['dob']) && !empty($_POST['city']))
    {
        $email = ucwords($_POST['txt_email']);
        $firstname = ucwords($_POST['txt_firstname']);
        $lastname = ucwords($_POST['txt_lastname']);
        $cpassword = $_POST['cpassword'];
        if (strlen($_POST['password']) >= 8)
        {
            if ($_POST['password'] != $_POST['cpassword'])
            {
                echo "<script>swal('Opps!', 'Password Not Matched', 'error');</script>";
                // echo "<script type='text/javascript'>alert('Password Not Matched')</script>";
            } else
            {
                if (strlen($_POST['txt_contact']) == 10 && ($_POST['txt_contact'][0] == "9" || $_POST['txt_contact'][0] == "8" || $_POST['txt_contact'][0] == "7" || $_POST['txt_contact'][1] == "6" ))
                {
                    $password = $_POST['password'];
                     //$password1 = md5($password);
                    $contact = $_POST['txt_contact'];
                    $dob = $_POST['dob'];
                    $city = ucwords($_POST['city']);

                    if (isset($_FILES['img']['name']))
                    {
                        $name = $_FILES['img']['name'];
                        $tmp_name = $_FILES['img']['tmp_name'];
                        $error = $_FILES['img']['error'];

                        if (!empty($name))
                        {
                            $location = 'UserImages/';

                            if (move_uploaded_file($tmp_name, $location . $name))
                            {
                                $image = new \claviska\SimpleImage();
                                $image
                                        ->fromFile($location . $_FILES["img"]["name"])
                                        ->resize(430, 540)
                                        ->toFile(('UserImages/' . $_FILES["img"]["name"]), 'image/png');

                                echo "<script>swal('Done!', 'You are successfully registered as cutomer ', 'success');</script>";
                            }
                        } else
                        {
                            echo "<script>swal('Opps!', 'Please Choose The File', 'error');</script>";
                        }
                    }

                    $q = "select Email from userdata where Email='$email'";
                    $r = mysqli_query($c, $q);
                    if (mysqli_num_rows($r) > 0)
                    {
                        echo "<script>swal('Opps!', 'User Already Exist', 'error');</script>";
                        //echo "<script type='text/javascript'>alert('User Already Registered')</script>";
                    } else
                    {
                        $q = "select Email from photographerdata where Email='$email'";
                        $r = mysqli_query($c, $q);
                        if (mysqli_num_rows($r) > 0)
                        {
                            echo "<script>swal('Opps!', 'User Already Exist', 'error');</script>";
                            // echo "<script type='text/javascript'>alert('User Already Registered')</script>";
                        } else
                        {
                            $d = date('y-m-d');
                            $q = "insert into userdata values('','$email','$firstname','$lastname','$password','$contact','$dob','$city','$name','$d','Active')";
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
                                        $mail->Subject = "Customer Registration";
                                        $mail->Body = "<h2>Dear $firstname,<br>You are registerd as customer.<br>If any query contact us with our Email(studiomoment06@gmail.com) or Phone Number(977877500 && 9913165711).</h2>";
                                        $mail->AddAddress($email);

                                        if (!$mail->Send())
                                        {
                                            echo "Mail Not Sent";
                                            echo "$mail->ErrorInfo";
                                        } else
                                        {
                                            echo "Mail Sent";
                                        }
                            
                        }
                    }
                } else
                {
                    echo "<script>swal('Opps!', 'Invalid Contact Number', 'error');</script>";
                    //echo "<script type='text/javascript'>alert('Invalid Contact Number')</script>";
                }
            }
        } else
        {
            echo "<script>swal('Opps!', 'password length must be greater then 6', 'error');</script>";
            //echo "<script type='text/javascript'>alert('password length must be greater then 6')</script>";
        }
    } else
    {
        echo "<script>swal('Opps!', 'Empty Fields Not Allowed', 'error');</script>";
        //echo "<script type='text/javascript'>alert('Empty Fields Not Allowed')</script>";
    }
}
$c->close();
unset($_POST['txt_firstname']);
unset($_POST['txt_lastname']);
unset($_POST['txt_contact']);
unset($_POST['txt_email']);
unset($_POST['cpassword']);
unset($_POST['password']);
unset($_POST['dob']);
unset($_POST['city']);
unset($_POST['btn_submit']);
?>	
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