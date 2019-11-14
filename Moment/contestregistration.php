<?php
session_start();
$ci = $_SESSION['ci'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contest Registration</title>
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

        <div class="limiter">

            <div class="container-login100">
                <div class="login100-pic js-tilt" data-tilt  >
                    <img src="images/contest1.jpg" alt="IMG" class="animated bounceInLeft" >
                </div>

                <form class="login100-form validate-form" style= "margin-left: 50px;" method="post" enctype="multipart/form-data" >

                    <center>
                        <h2 >Participant
                        </h2></center>
                    <hr>

                    <div class="wrap-input100 validate-input" style="margin-top:10px;" >
                        <input class="input100" type="text" name="txt_email" id="txt_email"    placeholder="Email"    required="true">
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
                        <input class="input100" type="text" name="txt_lastname" id="txt_lastname"   placeholder="LastName" required="true">
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <?php
                    include 'connection.php';
                    $q = "select * from city order by CityName";
                    ?>
                    <div class="wrap-input100 validate-input"  >
                        <?php
                        echo "<select class='input100'  style='outline: none;'   name='city' required='true'><option>Select City</option>";
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
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="file" name="image1" id="image1"    required="true">
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="file" name="image2" id="image2"   required="true" >
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="file" name="image3" id="image3"  required="true" >
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <input type="submit" name="btn_submit" value="Submit Data" class="login100-form-btn">
                    </div>
                    <center class="error">
                        <br/>
                    </center>
                    <div class="text-center p-t-12">


                        <a class="txt2" href="Contest.php">
                            <h5>Back </h5></a><br/>

                    </div>
                    <?php
                    include 'connection.php';
                    require 'claviska/SimpleImage.php';
                    if (isset($_POST['btn_submit']) && !empty($_POST['btn_submit']))
                    {
                        $email = $firstname = $lastname = $city = $name1 = "";

                        if (!empty($_POST['txt_email']) && !empty($_POST['txt_firstname']) && !empty($_POST['txt_lastname']) && !empty($_POST['city']))
                        {

                            $email = ucwords($_POST['txt_email']);
                            $firstname = ucwords($_POST['txt_firstname']);
                            $lastname = ucwords($_POST['txt_lastname']);
                            $city = $_POST['city'];
                            $err = 0;

                            for ($i = 1; $i <= 3; $i++)
                            {
                                $name[$i] = $_FILES["image$i"]['name'];
                                if (isset($_FILES["image$i"]['name']))
                                {
                                    $imageFileType = strtolower(pathinfo($name[$i], PATHINFO_EXTENSION));
                                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
                                    {
                                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                        $err = 1;
                                    }



                                    $tmp_name[$i] = $_FILES["image$i"]['tmp_name'];
                                    $error = $_FILES["image$i"]['error'];
                                    //echo $error;
                                    if (!empty($name[$i]))
                                    {

                                        $location = '../admin2/Admin/img/participant/' . $email . '/';

                                        if (is_dir($location) == false)
                                            mkdir($location);

                                        if (move_uploaded_file($tmp_name[$i], $location . $name[$i]))
                                        {
                                              if ($err == 0)
                                            {
                                                echo "<script>swal('Done!', 'You are register successfully!', 'success');</script>";
                                            }
                                            else
                                            {
                                                 echo "<script>swal('Opps!', 'Please choose only images!', 'error');</script>";
                                            }
                                        }
                                    } else
                                    {
                                        echo "<script>swal('Opps!', 'Please Choose File', 'error');</script>";
                                    }
                                }
                            }

                            if ($err == 0)
                            {
                                
                                $sel1 = "select count(*) from participant where ParticipantEmail='$email'";
                                $res1 = mysqli_query($c, $sel1);
                                $row1 = mysqli_fetch_array($res1);
                                $cou = $row1[0];
                                
                                if($cou == 1)
                                {
                                     echo "<script>swal('Oops!', 'User already exist!', 'error');</script>";
                                }
                                else
                                {
                                        $q = "insert into participant values($ci,NULL,'$email','$firstname','$lastname','$city','$name[1]','$name[2]','$name[3]','','Active') " or die("error");
                                        $r = mysqli_query($c, $q);
 
                                }
                            }
                                                  
                        } else
                        {
                            echo "<script>swal('Opps!', 'Empty Fields Not Allowed', 'error');</script>";
                            //echo "<script type='text/javascript'>alert('Empty Fields Not Allowed')</script>";
                        }
                    }
                   
                    unset($_POST['txt_firstname']);
                    unset($_POST['txt_lastname']);
                    unset($_POST['txt_email']);
                    unset($_POST['city']);
                    unset($_FILES['image1']);
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

</html>