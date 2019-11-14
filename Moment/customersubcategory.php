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
        <title>Sub Category</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- LOAD JQUERY LIBRARY-->

        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <!--category stylesheets-->
        <link rel="stylesheet" href="css/categorystyle.css" />

        <style>

        </style>
    </head>
</head>
<body>
    <?php
    include 'customeraccountheader.php';
    ?>
    <div class="ag-subheader">

        <div class="media-wrapper">
            <div class="media-container media-header">
                <div class="container-overlay">
                    <div class="bg-source bg-source--image" style="background-image: url('images/subcategory.jpg');background-size: cover">
                    </div>
                    <div class="bg-source img-overlay">
                    </div>
                </div>
                <div class="media-container-title txt-center">
                    <h1 class="txt-light">Sub-Category
                    </h1>
                </div>
            </div>
        </div>

        <div class="container section-sly-slider">
            <div class="row">
                <div class="section-sly-slider">
                    <div id="services">
                        <div class="slidee">
                            <?php
                            //   $c = mysqli_connect('localhost', 'root', "", 'moment') or die("Connection failed");
                            include_once 'connection.php';
                            foreach ($_REQUEST as $l => $cat)
                            {
                                $_REQUEST[$l] = base64_decode(urldecode($_GET['cat']));
                            }
                            $scategory = $_REQUEST[$l];
                            $_SESSION['cn']=$scategory;

                            $q = "select * from subcategory where Categoryid=" . $scategory;


                            $result = mysqli_query($c, $q);

                            while ($r = mysqli_fetch_assoc($result))
                            {
                                ?>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="section-features-column-block">
                                        <div class="features-column-icon">
                                            <i class="fa <?php echo $r['Icon'] ?>"></i>
                                        </div>
                                        <h2 class="features-column-title">
                                            <?php echo $r['SCategoryName'] ?>
                                        </h2>
                                        <!--                                                 <div class="features-column-text">
                                        <?php echo $r['catdesc'] ?>
                                                                                         </div>-->
                                        <h4 class="features-column-title">
                                            <?php echo $r['INR']; ?>   INR</h4>

                                        <a href="schedule.php?sc=<?php echo urlencode( base64_encode( $r['SCategoryId'])); ?>&in=<?php echo urlencode( base64_encode( $r['INR']) );?>" class="btn btn-primary">
                                            Book
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>


</body>
</html>
<?php } ?>