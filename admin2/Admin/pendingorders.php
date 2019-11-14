<?php
session_start();

if (empty($_SESSION['email'])) {
    header('Location:../../Moment/login.php');
}

include 'connection.php';

if (isset($_REQUEST['idd'])) {

    $idr = $_REQUEST['idd'];
    $veri = $_REQUEST['ver'];

    $sel1 = "select ScheduleDate,PId,SCategory from bookingorder where Id = '$idr' ";
    $r1 = mysqli_query($con, $sel1);
    $sd = mysqli_fetch_row($r1);
    $sd1 = $sd[0];
    $pid = $sd[1];
    $scat = $sd[2];



    $td = date('Y-m-d');

    if ($pid < 0 || $pid == 0) {

        echo '<script>alert("Photogrpaher is not allocated yet")</script>';
        echo '<script>window.location.href="pendingorders.php"</script>';
    } else {

        if (strtotime($td) >= strtotime($sd1)) {

            if ($scat == "Full Packege") {
                $date1 = date_create($sd1);
                $date2 = date_create($td);
                $diff = date_diff($date1, $date2);
                $w = $diff->format("%a");
                if ($w > 5) {
                    if ($veri == 'Pending') {
                        $s = 'Completed';
                        $del = "delete from schedule where BId = '$idr'";
                        mysqli_query($con, $del);
                    } else {
                        $s = 'Completed';
                    }
                    $update1 = "update bookingorder set Status = '$s' where Id = '$idr'";
                    mysqli_query($con, $update1);
                } else {
                    echo '<script>alert("Order will complete after 5 days from schedule date")</script>';
                    echo '<script>window.location.href="pendingorders.php"</script>';
                }
            } else {
                if ($veri == 'Pending') {
                    $s = 'Completed';
                    $del = "delete from schedule where BId = '$idr'";
                    mysqli_query($con, $del);
                } else {
                    $s = 'Completed';
                }
                $update1 = "update bookingorder set Status = '$s' where Id = '$idr'";
                mysqli_query($con, $update1);
                echo '<script>window.location.href="pendingorders.php"</script>';
            }
        } else {
            echo '<script>alert("Order not completed yet")</script>';
            echo '<script>window.location.href="pendingorders.php"</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>

    <head> 
        <title>Forms</title>
<?php include('link.php') ?>
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

        <!-- /block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Order Details</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
<?php ?>
                                <th>No.</th>
                                <th>Customer Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact No.</th>
                                <th>Booking Date</th>
                                <th>Schedule Date</th>
                                <th>Total Amount</th>
<!--                                <th>Photographer Name</th>-->
                                <th>Category Name</th>
                                <th>Sub-Category Name</th>
                                <th>Allocate Photographer</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
<?php
$i = 1;
$select = "select * from bookingorder where Status = 'Pending'";
$res = mysqli_query($con, $select);
while ($row = mysqli_fetch_array($res)) {
    ?>
                                <tr align="center">	
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['Email'] ?></td>
                                    <td><?php echo $row['FirstName'] ?></td>
                                    <td><?php echo $row['LastName'] ?></td>
                                    <td><?php echo $row['Contact'] ?></td>
                                    <td><?php echo $row['BookingDate'] ?></td>
                                    <td><?php echo $row['ScheduleDate'] ?></td>
                                    <td><?php echo $row['Amount'] ?></td>
    <!--                                    <td><?php //echo $row['comments']     ?></td>-->
                                    <td><?php echo $row['Category'] ?></td>
                                    <td><?php echo $row['SCategory'] ?></td>
                                    <td><a href="photographer_allocation.php?name=<?php echo $row['Category'] ?>&oid=<?php echo $row['Id'] ?> "><input type="submit" class="btn btn-info" value="Photographers"></a></td>

                                    <td>
    <?php
    if ($row['Status'] == 'Pending') {
        ?>

                                            <a href="pendingorders.php?idd=<?php echo $row['Id'] ?>&ver=<?php echo $row['Status'] ?>" onClick="return confirm('Are you Sure want to change ?')"><input type="submit" class="btn btn-warning" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="pendingorders.php?idd=<?php echo $row['Id'] ?>&ver=<?php echo $row['Status'] ?>"><input type="submit" class="btn btn-warning" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        }
                                        ?>
                                    </td>

                                </tr>            

<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <hr>
<?php include('footer.php') ?>
</div>
<!--/.fluid-container-->
    <?php include('js_link.php') ?>
</body>

</html>