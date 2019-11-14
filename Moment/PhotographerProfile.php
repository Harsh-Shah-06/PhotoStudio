<?php
  include_once 'connection.php';
$rate="select avg(Rating) from ratting where PId=$_GET[profile]";
                               $rate1 = mysqli_query($c, $rate);
                               while($rate2= mysqli_fetch_row($rate1))
                               {
                                   $rate3=$rate2[0];                                   
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

        <!-- Rating -->

        <script src="Rating/rater.js" charset="utf-8"></script>

        <!-- REVOLUTION JS FILES -->
        <script src="addons/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="addons/revolution/js/jquery.themepunch.revolution.min.js"></script>

        <script>
            $(document).ready(function () {
                var options = {
                    max_value: 5,
                    step_size: 0.5,
                    selected_symbol_type: 'hearts',
                    url: 'http://localhost/test.php',
                    initial_value: 0,
                    update_input_field_name: $("#input2"),
                }
                $(".rate").rate();


                $(".rate2").rate(options);

                $(".rate2").on("change", function (ev, data) {
                    console.log(data.from, data.to);
                });

                $(".rate2").on("updateError", function (ev, jxhr, msg, err) {
                    console.log("This is a custom error event");
                });

                $(".rate2").rate("setAdditionalData", {id: 42});
                $(".rate2").on("updateSuccess", function (ev, data) {
                    console.log(data);
                });

            });
        </script>
        <style>
            .hr{
                border:solid black 2px;
            }
            body
            {
                font-size: 35px;
                font-family: sans-serif;
            }
            .rate-base-layer
            {
                color: #aaa;
            }
            .rate-hover-layer
            {
                color: orange;
            }
            .rate2
            {
                font-size: 35px;
            }
            .rate2 .rate-hover-layer
            {
                color: pink;
            }
            .rate2 .rate-select-layer
            {
                color: red;
            }
            .im
            {
                background-image: url('./images/heart.gif');
                background-size: 32px 32px;
                background-repeat: no-repeat;
                width: 32px;
                height: 32px;
                display: inline-block;
            }
            .im2
            {
                background-image: url('./images/emoji5.png');
                background-size: 64px 64px;
                background-repeat: no-repeat;
                width: 64px;
                height: 64px;
                display: inline-block;
            }
            #rate5 .rate-base-layer span, #rate7 .rate-base-layer span
            {
                opacity: 0.5;
            }
            hr
            {
                border: 1px solid #ccc;
            }
            p
            {
                font-size: 15px;
            }
        </style>
    </head>

    <body>
        <div id="page_wrapper">
            <!-- Responsive menu start -->

            <ul class="cg__resMenu">
                <li class="cg__resMenu-back">
                    <span class="cg__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="index.php#" class="cg__resMenu-backLink">Back</a>

                <li><a href="photographer's.php"><span>Back</span></a></li>
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
                                                <li><a href="photographer's.php"><span>Back</span></a></li>

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
                        include_once 'connection.php';
                        if (isset($_GET['profile']))
                        {
                            $q = "select * from photographerdata where Id=$_GET[profile]";
                        }
                        $result = mysqli_query($c, $q);

                        while ($r = mysqli_fetch_assoc($result))
                        {
                            ?>
                            <div class="media-container-title txt-center">
                                <center>
                                    <?php echo"<img class ='img-circle'  src='ProfileImages/{$r['PImage']}'  style='height: 200px;width: 200px;' >" ?>
                                    <?php echo "<h2 class='txt-grey-transparent'>{$r['FirstName']}{$r['LastName']}
                                </h2>" ?>
                                    <h3 class="txt-grey-transparent">Photographer 
                                            
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
                                             <!--<h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 26px;">  JoinDate  </h3>-->
                                            <?php echo" <h3 class='title-block__subtitle txt-grey-transparent' style='font-size: 26px;'>Join-Date :{$r['JoinDate']}</h3>" ?><br>
                                            <!--<h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 26px;">  About ME   </h3>-->
                                            <?php echo" <h3 class='title-block__subtitle txt-grey-transparent' style='font-size: 26px;'>About ME : {$r['About']}</h3>" ?><br>
                                            <!--<h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 26px;"> PhotoGarphy Expertness   </h3>-->
                                            <?php echo"<h3 class='title-block__subtitle txt-grey-transparent' style='font-size: 26px;'>Photography Expertness : {$r['Interest']} </h3>" ?><br>
                                            <!--<h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 26px;"> BirthDate   </h3>-->
                                            <?php echo"<h3 class='title-block__subtitle txt-grey-transparent' style='font-size: 26px;'>Birth-Date : {$r['BirthDate']} </h3>" ?><br>
                                           <!--<h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 26px;"> Rating  </h3>-->
                                            <?php echo"<h3 class='title-block__subtitle txt-grey-transparent' style='font-size: 26px;'>Rating : $rate3 </h3>" ?>
                                            <!--                                        <h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 20px;">When it comes to a great idea, you know it when you see it. </h3>
                                                                                    <h3 class="title-block__subtitle txt-grey-transparent" style="font-size: 20px;">Join our photo studio to get something new.</h3>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <br/>
                <div>
                <?php } ?>
                <center>
                    <section class="sidermargins pb-160 sec-portfolio"   style="margin-top: 50px">

                        <h2 >My PortFolio</h2>

                    </section>

                    <section style="pointer-events: none;">           
                        <div class="container large-container large-container_grid">
                            <div class="row">
                                <div class="grid ag-gridGallery-jstrigger " data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
                                    <?php
                                    include 'connection.php';
                                    $q = "select * from photographerimage where PhotographerId=$_GET[profile]";
                                    $result = mysqli_query($c, $q);

                                    while ($r = mysqli_fetch_assoc($result))
                                    {
                                        ?>

                                        <div class="row">
                                            <div class="grid-item grid-item--width2 gallery-item">
                                                <div class="grid-item-wrapper">
                                                    <?php echo"<a class='portfolio-link'  href='PhotographerImage/{$r['Path']}'></a>" ?>
                                                    <div class="ag-gridGallery__img-container">
                                                        <?php echo "<img src='PhotographerImage/{$r['Path']}'  alt title='portfolio1' style='background-size: auto'>" ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </section> 
                                </div>
                                </center>
                            </div>
                        </div>
                        <section>
                            <center>
                               
                            </center>
                        </section>
                    </section>


                    <?php
                    include('footer.php');
                    ?>

            </div><!-- /.#page_wrapper -->

            <a href="about.php" class="totop">TOP</a> <!--/.totop -->

    </body>
</html>
