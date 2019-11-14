<?php
session_start();
ob_start();
include 'connection.php';
$email = $_SESSION['email'];

if (!empty($_SESSION['email']))
{
    //header('Location:bookingform.php');
} else
{
    $_SESSION['chkbooking'] = $_GET['sc'];
    $_SESSION['chkbooking1'] = $_GET['in'];
    header('Location:login.php');
}


foreach ($_REQUEST as $l => $sc)
{
    $_REQUEST[$l] = base64_decode(urldecode($_GET['sc']));
}
$scategory = $_REQUEST[$l];

foreach ($_REQUEST as $l => $in)
{
    $_REQUEST[$l] = base64_decode(urldecode($_GET['in']));
}
$inr = $_REQUEST[$l];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Booking Schedule</title>
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
                    <img src="images/images.jpg" alt="IMG" class="wow rollIn" >
                </div>

                <form class="login100-form validate-form" style= "margin-left: 50px;" method="post" >

                    <center>
                        <h2 >Booking
                        </h2></center>
                    <hr>

                    <div class="wrap-input100 validate-input " >
                        Schedule Date: (Venue Date)
                        <input   placeholder="Schedule Date" class="input100" type="text" onfocus="(this.type = 'date')"  id="scheduledate" name="scheduledate"   required="true">
                    </div>

                    <br>

                    <?php
                    include_once 'connection.php';
                    $q = "select * from city order by CityName";
                    ?>
                    <div class="wrap-input100 validate-input"  >
                        Schedule  City : (As Per Venue) <br>
                        <?php
                        echo "<select class='input100'  style='outline: none;border:none'   name='city'  require='true'><option>Select City</option>";
                        foreach ($c->query($q) as $row)
                            echo "<option value=$row[CityName]>$row[CityName]</option>";
                        echo "</select>";
                        $c->close();
                        ?>

                    </div>
                    <br>

                    <div class="container-login100-form-btn">
                        <input type="submit" name="link" value="Next" class="login100-form-btn">
                    </div>

                    <!--              <a class="btn btn-success" style="width:100%;border-radius: 25px;" name="link">
                                            Book
                                        </a>-->

                    <?php
                    if (isset($_POST['link']))
                    {
                        if (isset($_POST['scheduledate']) && isset($_POST['city']))
                        {
                            if (!empty($_POST['scheduledate']) && !empty($_POST['city']))
                            {
                                $sd = @$_POST['scheduledate'];

                                $_SESSION['sdate'] = $sd;
                                $_SESSION['inr'] = $inr;
                                $_SESSION['sc'] = $scategory;

                                include 'connection.php';
                                $cat = $_SESSION['cn'];
                                $q3 = "select CategoryName from category where Categoryid=$cat";
                                $r3 = mysqli_query($c, $q3);
                                while ($result3 = mysqli_fetch_assoc($r3))
                                {
                                    $catn = $result3['CategoryName'];
                                }
                                $ci = @$_POST['city'];

                                $_SESSION['city'] = $ci;



                                $q = "select count(*) from Schedule where ScheduleDate = '$sd'";
                                $r = mysqli_query($c, $q);
                                $res = mysqli_fetch_array($r);
                                $b = $res[0];

                                $q1 = "select count(*) from photographerdata where Interest like '%" . $catn . "%'     ";
                                $r1 = mysqli_query($c, $q1);
                                $res1 = mysqli_fetch_array($r1);
                                $pc = $res1[0];

                                $q2 = "select count(*) from bookingorder where ScheduleDate = '$sd'";
                                $r = mysqli_query($c, $q);
                                $res = mysqli_fetch_array($r);
                                $b = $res[0];


                                $t = $pc - $b;

                                if ($t == 1)
                                {
                                      echo "<script>swal('Opps!', 'Booking is not available on this date.Please choose another date.', 'error');</script>";
                                } else
                                {
                                    header('Location:PayUMoney_form.php');
                                }
                            } else
                            {
                                echo "<script>swal('Opps!', 'Empty feilds are not allowed!', 'error');</script>";
                            }
                        }
                    }
                    ?>

                    <div class="text-center p-t-12">


                    </div>

                </form>

                <script>
                    $(function () {
                        var dtToday = new Date();

                        var month = dtToday.getMonth() + 1;
                        var day = dtToday.getDate();
                        var year = dtToday.getFullYear();
                        if (month < 10)
                            month = '0' + month.toString();
                        if (day < 10)
                            day = '0' + day.toString();

                        var maxDate = year + '-' + month + '-' + day;

                        $('#scheduledate').attr('min', maxDate);
                    });
                </script>


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