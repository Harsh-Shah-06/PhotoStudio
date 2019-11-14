<?php
session_start();

if (empty($_SESSION['email'])) {
    header('Location:../../Moment/login.php');
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Forms</title>
<?php include('link.php') ?>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    </head>

    <body>
<?php include('top_header.php') ?>
        <!--/.nav-collapse -->
    </div>
</div>
</div>
<?php include('left_menu.php') ?>
<!--/span-->
<div class="span9" id="content">
    <!-- morris stacked chart -->
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Form Example</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form class="form-horizontal">
                        <fieldset>
                            <legend>Form Horizontal</legend>

                            <!-----Middle Content --->
                            <div class="container" style="width:400px;">

                                <h3 align="center">Total Numbers Of "Completed" And "Pending" Order In Year 2018</h3>   
                                <br /><br />
                                <div id="chart"></div>
                            </div>





                            <!-----Middle Content End--->
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>




        <!-- /block -->
    </div>

<?php
$chart_data = null;
$y = 2018;
for ($i = 2018; $i <= date("Y"); $i++) {
    $q = "select count(*) as total_completed from bookingorder where BookingDate >= CAST('$i-01-01' AS DATE)
AND BookingDate <= CAST('$i-12-31' AS DATE) and Status='Completed'  ";
    $r = $con->query($q);
    $d = $r->fetch_assoc();
    $q1 = "select count(*) as total_pending from bookingorder where BookingDate >= CAST('$i-01-01' AS DATE)
AND BookingDate <= CAST('$i-12-31' AS DATE) and Status='Pending'  ";
    $r1 = $con->query($q1);
    $d1 = $r1->fetch_assoc();
    $c = $d["total_completed"] + $d1["total_pending"];
    $chart_data .= "{ y:'" . $i . "', a:" . $d["total_completed"] . ", b:" . $d1["total_pending"] . ", c:" . $c . "}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
    <script src="../vendors/morrisjs/morris.min.js"></script>
    <script type="text/javascript">
        $(function () {





            Morris.Bar({
                element: 'chart',

                data: [<?php echo $chart_data; ?>],

                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Completed', 'Pending'],
                hideHover: 'auto',
                resize: true,

            });

        });
    </script>


    <hr>
<?php include('footer.php') ?>
</div>
<!--/.fluid-container-->
<?php include('js_link.php') ?>
</body>

</html>