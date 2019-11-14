<?php
session_start();
include('top_header.php');
include('left_menu.php');
include './connection.php';


if (empty($_SESSION['email'])) {
    header('Location:../../Moment/login.php');
}


?>
<!DOCTYPE html>
<html class="no-js">

    <head>
        <title>Dashboard</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>

        <div class="row-fluid">
            <div class="span8">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Order Statistics</div>
                        <div class="pull-right"><span class="badge badge-warning"></span>

                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span4">
                            <?php
                            $q = "select count(*) from bookingorder where Category = 'Wedding'";
                            $res = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-inverse">Wedding</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from bookingorder where Category = 'Event'";
                            $res = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-inverse">Event</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from bookingorder where Category = 'Architecture'";
                            $res = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-inverse">Architecture</span>

                            </div>
                        </div>
                        </div>
                      <div class="block-content collapse in">
                        <div class="span4">
                            <?php
                            $q = "select count(*) from bookingorder where Category = 'Travel'";
                            $res = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-inverse">Travel</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from bookingorder where Category = 'Festival'";
                            $res = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-inverse">Festival</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from bookingorder where Category = 'Wildlife'";
                            $res = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-inverse">Wildlife</span>

                            </div>
                        </div>
                          </div>
                      <div class="block-content collapse in">
                          
                        <div class="span4">
                            <?php
                            $q = "select count(*) from bookingorder where Category = 'Food'";
                            $res = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-inverse">Food</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from bookingorder where Category = 'Model'";
                            $res = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-inverse">Model</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from bookingorder where Category = 'Producrt'";
                            $res = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-inverse">Producrt</span>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    <center>
        <?php
        include('footer.php');
//include('js_link.php');
        ?>
    </center>
    <!--/.fluid-container-->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="assets/scripts.js"></script>
    <script>
        $(function () {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
    </script>
</body>
</html>