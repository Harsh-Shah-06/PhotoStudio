  
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.

To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Photographer Registration</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <!-- animation-->
        <link href="css/animate.css" rel="stylesheet" type="text/css">


        <style>
            .h{
                border:solid gray 1.5px;
            }
        </style>
    </head>
    <body>

        <?php
        include('header.php');
        ?>
        <div class="ag-subheader" >

            <div class="media-wrapper">
                <div class="media-container media-header">
                    <div class="container-overlay ">
                        <div class="bg-source bg-source--image " style="background-image: url('images/h12.jpg');background-size: cover">
                        </div>
                        <div class="bg-source img-overlay">
                        </div>
                    </div>
                    <div class="media-container-title txt-center">
                        <h1 class="txt-light "> Photographer Registration
                        </h1>
                    </div>
                </div>
            </div>


            <div class="ag-mask">
                <div class="skew-mask">
                </div>
            </div>
        </div><!--end subheader-->
        <!--titleblock section-->
        <section class="sidermargins ">
            <div class="container " style="border:solid gray 2px;padding:5 px;height:680px;"><br>
                <h2 ><center>Fill The Details</center></h2>
                <hr  class="h">
                <form class="login"  method="post" enctype="multipart/form-data">


                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <input  type="email"  name="txt_email"  placeholder=" Email "  class="form-control" Required><br></div>
                        <div class="col-lg-6">
                            <input  type="number"  name="txt_contact"  placeholder=" Contact Number " maxlength="10"  class="form-control"></div><br></div>

                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <input  type="text"  name="txt_firstname"  placeholder="First Name " class="form-control" Required><br></div>
                        <div class="col-lg-6">
                            <input  type="text"  name="dob"  placeholder=" Date Of Birth " onfocus="(this.type = 'date')" class="form-control"  Required></div><br></div>

                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <input  type="text"  name="txt_lastname"  placeholder=" Last Name " class="form-control" Required><br></div>
                        <div class="col-lg-6">
                            <input  type="text"  name="txt_qualification"  placeholder=" Educational Qualification " class="form-control" Required></div><br></div>

                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <input  type="password"  name="password"  placeholder=" Password " class="form-control"  Required><br></div>
                        <div class="col-lg-6">
                            <input  type="password"  name="cpassword"  placeholder=" Confirm Password "  class="form-control" Required><br></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-lg-6" >
                            <input  type="text"  name="txt_about"  placeholder="About You " class="form-control" Required><br></div>
                        <div class="col-lg-6">

                            <select     name="city"  class="form-control-static" style="width: 100%;" Required><!--<option  >Select City</option>-->
                                <option selected="selected" value="">Select City</option>
                                <?php
                                include 'connection.php';
                                $q = "select * from city where Status='Active' order by CityName";
                                foreach ($c->query($q) as $row)
                                    echo "<option value=$row[CityName]>$row[CityName]</option>";

                                $c->close();
                                ?>  
                            </select>
                        </div><br></div>

                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <h5>Expert In Photography Type : </h5> 

                            <table>

                                <tr>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox"  value="Event"  name="ptype[]" class="form-check-input" >  Event </label>&nbsp;&nbsp; &nbsp;&nbsp; 
                                        </div>
                                    </td>

                                    <td><div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" value="Wedding" name="ptype[]" class="form-check-input">   Wedding </label>&nbsp;&nbsp;&nbsp;&nbsp; 
                                        </div>
                                    </td>

                                    <td> <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" value="Archietecture" name="ptype[]" class="form-check-input">Architecture</label>&nbsp;&nbsp;&nbsp;&nbsp; 
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" value="Travel" name="ptype[]" class="form-check-input" >Travel</label>
                                        </div></td>

                                    <td> <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" value="Festival" name="ptype[]" class="form-check-input">Festival </label> 
                                        </div></td>

                                    <td> <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" value="Wildlife" name="ptype[]" class="form-check-input"> Wildlife</label>
                                        </div></td>
                                </tr>

                                <tr>
                                    <td> <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" value="Food" name="ptype[]" class="form-check-input" >Food</label>
                                        </div></td>

                                    <td><div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" value="Model" name="ptype[]" class="form-check-input">Model </label>
                                        </div></td>

                                    <td> <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" value="Product" name="ptype[]" class="form-check-input"> Product  </label>
                                        </div></td>
                                </tr>

                            </table>
                        </div>   



                        <div class="col-lg-6">
                            <h5>Profile Image :</h5>
                            <input type="file" name="ProfileImage"  class="" Required></div>
                        <div class="col-lg-6">
                            <h5>QR Code :</h5>
                            <input  type="text"  name="txt_qr"  placeholder=" Enter  Email For QR Code" class="form-control" Required></div>
                    </div>




                    <center>

                        <input type="submit"  name="btn_submit" value="Register" class="btn-sm btn-success   " style="font-size: 20px;outline: none;border:none;width:40%;margin-top:15px;"></center>


                </form>
            </div>
            <br>
            <br>
            <br>
            <?php
            include 'connection.php';
            require 'claviska/SimpleImage.php';
            include('libs/phpqrcode/qrlib.php');


            if (isset($_POST['btn_submit']) && !empty($_POST['btn_submit']))
            {


                $email = $firstname = $lastname = $password = $contact = $dob = $city = $qualification = $about = $i = $intrest = $img = $image = $name = $tmp_name = $error = $qr = "";

                if (!empty($_POST['txt_email']) && !empty($_POST['txt_firstname']) && !empty($_POST['txt_lastname']) && !empty($_POST['password']) && !empty($_POST['txt_contact']) && !empty($_POST['dob']) && !empty($_POST['city']) && !empty($_POST['txt_qualification']) && !empty($_POST['txt_about']) && !empty($_POST['txt_qr']))
                {
                    $email = ucwords($_POST['txt_email']);
                    $firstname = ucwords($_POST['txt_firstname']);
                    $lastname = ucwords($_POST['txt_lastname']);
                    $cpassword = $_POST['cpassword'];

                    $tempDir = 'temp/';
                    $qr = $_POST['txt_qr'];
                    $codeContent = urlencode($qr);
                    $codeContents = ucwords($codeContent);
                    QRcode::png($qr, $tempDir . $email . '.png', QR_ECLEVEL_L, 5);

                    if (strlen($_POST['password']) >= 8)
                    {
                        if ($_POST['password'] != $_POST['cpassword'])
                        {
                            echo "<script>swal('Opps!', 'Password Not Matched ', 'error');</script>";
                            // echo "<script type='text/javascript'>alert('Password Not Matched')</script>";
                        } else
                        {
                            if (strlen($_POST['txt_contact']) == 10 && ($_POST['txt_contact'][0] == "9" || $_POST['txt_contact'][0] == "8" || $_POST['txt_contact'][0] == "7" || $_POST['txt_contact'][1] == "6" ))
                            {
                                $password = $_POST['password'];
                                //$password1 = md5($password);
                                $contact = $_POST['txt_contact'];
                                $qualification = ucwords($_POST['txt_qualification']);
                                $about = ucwords($_POST['txt_about']);
                                $dob = $_POST['dob'];
                                $city = ucwords($_POST['city']);
                                $i = implode(',', $_POST['ptype']);
                                

                                if (isset($_FILES['ProfileImage']['name']))
                                {

                                    $name = $_FILES['ProfileImage']['name'];
                                    $tmp_name = $_FILES['ProfileImage']['tmp_name'];
                                    $error = $_FILES['ProfileImage']['error'];

                                    if (!empty($name))
                                    {
                                        $location = 'ProfileImages/';

                                        if (move_uploaded_file($tmp_name, $location . $name))
                                        {
                                            $image = new \claviska\SimpleImage();
                                            $image
                                                    ->fromFile($location . $_FILES["ProfileImage"]["name"])
                                                    ->resize(430, 540)
                                                    ->toFile(('ProfileImages/' . $_FILES["ProfileImage"]["name"]), 'image/png');

                                            echo "<script>swal('Done!', 'You are successfully registered as photographer.', 'success');</script>";
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
                                    echo "<script>swal('Opps!', 'User Already Registered', 'error');</script>";
                                    // echo "<script type='text/javascript'>alert('User Already Registered')</script>";
                                } else
                                {
                                    $q = "select Email from photographerdata where Email='$email'";
                                    $r = mysqli_query($c, $q);
                                    if (mysqli_num_rows($r) > 0)
                                    {
                                        echo "<script>swal('Opps!', 'User Already Registered', 'error');</script>";
                                        //echo "<script type='text/javascript'>alert('User Already Registered')</script>";
                                    } else
                                    {
                                        $d = date('y-m-d');
                                        $q = "INSERT INTO  photographerdata VALUES ('', '$email  ', '$firstname  ', '$lastname ','$password','$contact  ','$dob  ','$qualification  ', '$about','$city', '$i','$name','$codeContents','$d','Active','DisApproved')";
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
                                        $mail->Subject = "Photographer Registration";
                                        $mail->Body = "<h2>Dear $firstname,<br>You are registerd as photographer. <br> You will be approved within 24 hours.<br>If any query contact us with our Email(studiomoment06@gmail.com) or Phone Number(977877500 && 9913165711).</h2>";
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
                        // echo "<script type='text/javascript'>alert('password length must be greater then 6')</script>";
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
            unset($_FILES['ProfileImage']);
            unset($_POST['btn_submit']);
            ?>
        </section>
        <?php
        include('footer.php');
        ?>

    </div><!-- /.#page_wrapper -->

    <a href="pregistration.php" class="totop">TOP</a> <!--/.totop -->

</body>
</html>
