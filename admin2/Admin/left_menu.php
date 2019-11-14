<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <!--<li>
                    <a href="index.html"><i class="icon-chevron-right"></i> Dashboard</a>
                </li>-->

                <li>
                    <?php
                    $total_photographer = 0;
                    include_once './connection.php';
                    $sel = "select count(*) from photographerdata";
                    $r = mysqli_query($con, $sel);
                    while ($res = mysqli_fetch_array($r)) {
                        $total_photographer = $res[0];
                    }
                    ?>
                    <a href="photographer.php"><span class="badge badge-success pull-right"><?php echo $total_photographer ?></span>Photographers in Moment</a>
                </li>
                <li>
                    <?php
                    $total_customer = 0;
                    include_once './connection.php';
                    $sel = "select count(*) from userdata";
                    $r = mysqli_query($con, $sel);
                    while ($res = mysqli_fetch_array($r)) {
                        $total_customer = $res[0];
                    }
                    ?>
                    <a href="customer.php"><span class="badge badge-warning pull-right"><?php echo $total_customer ?></span>Customer in Moment</a>
                </li>
                <li>
<?php
$pending = 0;
include_once './connection.php';
$sel = "select count(*) from bookingorder where Status = 'Pending'";
$r = mysqli_query($con, $sel);
while ($res = mysqli_fetch_array($r)) {
    $total_customer = $res[0];
}
?>
                    <a href="pendingorders.php"><span class="badge badge-inverse pull-right"><?php echo $total_customer ?></span>Pending Orders</a>
                </li>
                <li>
<?php
$pending = 0;
include_once './connection.php';
$sel = "select count(*) from bookingorder where Status = 'Completed'";
$r = mysqli_query($con, $sel);
while ($res = mysqli_fetch_array($r)) {
    $total_customer = $res[0];
}
?>
                    <a href="completedorders.php"><span class="badge badge-info pull-right"><?php echo $total_customer ?></span>Completed Orders</a>
                </li>
                <li>
                    <a href="statistics.php"><span class="badge badge-info pull-right"></span>Order Statistics</a>
                </li>
            </ul>
        </div>

