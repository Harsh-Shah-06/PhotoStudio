<?php
include 'connection.php';

session_start();
if(!isset($_SESSION['email']))
{
    header('Location:login.php');
}
else
{
    $e= $_SESSION['email'];
?>
<?php
include 'connection.php';
require 'claviska/SimpleImage.php';
if (isset($_POST['btn_sub1']))
{
    $mi = $_POST['idup'];
    $mfn = $_POST['txt_firstname'];
    $mln = $_POST['txt_lastname'];
    $mc = $_POST['txt_contact'];
    $mbd = $_POST['birthdate'];

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

                $q6 = "Update  userdata set PImage='$name' where Id=$mi";
                $r = mysqli_query($c, $q6) or die("ERR");
            }
        }
    }
    $q6 = "Update  userdata set FirstName='$mfn' ,LastName='$mln',Birthdate='$mbd',Contact='$mc' where Id=$mi";
    $r = mysqli_query($c, $q6) or die("ERR");
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>PhotographerProfile</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->

        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">


        <!-- REVOLUTION JS FILES -->
        <script src="addons/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="addons/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <style>
            .hr{
                border:solid black 2px;
            }
        </style>
    </head>

    <body>
        <div id="page_wrapper">
            <!-- Responsive menu start -->

            <ul class="cg__resMenu">
                <li class="cg__resMenu-back">
                    <span class="cg__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="index.php#" class="cg__resMenu-backLink">Back</a>

                <li><a href="customeraccount.php"><span>Back</span></a></li>
            </ul>

            <!-- Responsive menu end -->

            <header id="header" class="site-header site-header--absolute">
                <div class="container siteheader-container large-container">
                    <div class="fxb-col fxb-basis-auto">
                        <div class="fxb-row site-header-row site-header-main ">
                            <!-- Logo column -->
                            <div class="fxb-col fxb fxb-start-x fxb-center-y fxb-basis-auto fxb-grow-0 fxb-sm-half ">
                                <div id="logo-container" class="logo-container">
                                    <h1 class="site-logo logo " id="logo">
                                        <a href="index.html" class="site-logo-anch">
                                                <!-- <img class="logo-img site-logo-img" src="img-assets/logo.png" width="40" height="40" alt="Agency" title="Agency"> -->
                                        </a>
                                    </h1>
                                </div>
                            </div>
                            <!-- Right column with navigation -->
                            <div class="fxb-col fxb fxb-end-x fxb-center-y fxb-basis-auto fxb-sm-half site-header-col-right site-header-main-right">
                                <div class="fxb-col fxb fxb-end-x fxb-center-y fxb-basis-auto fxb-sm-half site-header-main-right-top">

                                    <!-- menu trigger -->
                                    <div class="sh-component menu-wrapper">

                                        <div class="cg__menuWrapper">
                                            <div class="cg__mainMenu-trigger">
                                                <a href="index.html#" class="cg__menuBurger">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                            </div><!--/.cg__mainMenu-trigger-->

                                            <ul class="cg__mainMenu clearfix">
                                                <li><a href="customeraccount.php"><span>Back</span></a></li>

                                            </ul><!--/.cg__mainMenu-->

                                        </div><!--/.cg__menuWrapper-->

                                    </div>

                                </div>
                            </div><!--end right column-->
                        </div><!--end flex row-->
                    </div>
                </div>
            </header>
            <div class="sh-component menu-wrapper">



            </div>
            <div class="ag-subheader">

                <div class="media-wrapper">
                    <div class="media-container media-header">
                        <div class="container-overlay">
                            <div class="bg-source bg-source--image" style="background-image: url('images/PhotographerProfile.jpg');background-size: cover">
                            </div>
                            <div class="bg-source img-overlay">
                            </div>
                        </div>


                        <?php
                        $q = "select * from userdata where Email='$e'";

                        $result = mysqli_query($c, $q);

                        while ($r = mysqli_fetch_assoc($result))
                        {
                            ?>
                            <div class="media-container-title txt-center">
                                <center>
                                    <?php echo"<img class ='img-circle'  src='UserImages/{$r['PImage']}'  style='height: 200px;width: 200px;' >" ?>
                                    <?php echo "<h2 class='txt-grey-transparent'>{$r['FirstName']}" . "  " . "{$r['LastName']}
                                </h2>" ?>
                                    <h3 class="txt-grey-transparent">Happy Customer
                                    </h3>

                                </center>
                            </div>
                        </div>
                    </div>


                    <div class="ag-mask">
                        <div class="skew-mask">
                        </div>
                    </div>
                </div><!--end subheader-->


                <div class="ag-mask">
                    <div class="skew-mask">
                    </div>
                </div>
            </div><!--end subheader-->
            <!--titleblock section-->
            <section class="sidermargins pb-100 pt-80">
                <div class="container large-container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="column-wrapper">
                                <div class="media-container media-container--contact fancy-background">

                                    <div class="title-wrapper">
                                        <div class="title-block title-block--contact">
                                                 <!--<h3 class="title-block__subtitle txt-dark-transparent" style="font-size: 26px;">   JoinDate</h3>-->
                                            <?php echo" <h3 class='title-block__subtitle txt-grey-transparent' style='font-size: 26px;'> Join-Date : {$r['JoinDate']}</h3>" ?><br>
                                            <!--<h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 26px;">Email</h3>-->
                                            <?php echo"<h3 class='title-block__subtitle txt-grey-transparent' style='font-size: 26px;'> Email : {$r['Email']} </h3>" ?><br>
                                            <!--<h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 26px;">  Contact  </h3>-->
                                            <?php echo" <h3 class='title-block__subtitle txt-grey-transparent' style='font-size: 26px;'>Contact : {$r['Contact']}</h3>" ?><br>
                                            <!--<h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 26px;">BirthDate  </h3>-->
                                            <?php echo"<h3 class='title-block__subtitle txt-grey-transparent' style='font-size: 26px;'> Birth-Date : {$r['Birthdate']} </h3>" ?><br>


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br/>
                <br/>
            <?php } ?>
            <div class="container">

                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal"><i class="ag-iconbox fa fa-edit"></i>Edit Profile</button>


                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">


                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Profile</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $q = "select * from userdata where Email='$e'";
                                $result = mysqli_query($c, $q);
                                while ($r = mysqli_fetch_assoc($result))
                                {
                                    ?>

                                    <form action="#" method="post"enctype="multipart/form-data" >
                                        <center>

                                            <div class="col-sm-12">
                                               
                                                    <?php echo"<img class ='img-circle'  src='UserImages/{$r['PImage']}'  style='height: 100px;width: 100px;' >" ?>
                                                </div>
                                                <div class="col-sm-12">
                                                    Profile Image:
                                                    <input type="file" name="img"  class="form-control">
                                                </div>
                                           
                                            <div class="col-sm-12">
                                                <input type="hidden"  name="idup" value="<?php echo "{$r['Id']}" ?> " class="s">
                                            </div>
                                            <div class="col-sm-12">
                                                FirstName:

                                                <Input    type="text" name="txt_firstname" class="form-control"  value=<?php echo "{$r['FirstName']}" ?>>

                                            </div>
                                            <div class="col-sm-12">
                                                LastName:
                                                <Input type="text"   name="txt_lastname" class="form-control"   value=<?php echo "{$r['LastName']}" ?>></div>
                                            <div class="col-sm-12">
                                                Contact:
                                                <Input type="text"   name="txt_contact" class="form-control"   value=<?php echo "{$r['Contact']}" ?>></div>
                                            <div class="col-sm-12">
                                                BirthDate:
                                                <Input type="date" class="form-control"   name="birthdate"  value=<?php echo "{$r['Birthdate']}" ?> ></div>


                                            <div class="col-sm-12">  
                                                <br>
                                                <Input type="submit" name="btn_sub1" value="Update" class="btn btn-success"></div>
                                        </center>
                                    </form>
                                <?php } ?>


                            </div>
                            <div class="modal-footer">
                                <button type="button" name="btn_sub1" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <?php
        include('footer.php');
        ?>

    </div><!-- /.#page_wrapper -->

    <a href="about.php" class="totop">TOP</a> <!--/.totop -->

</body>
</html>
<?php } ?>