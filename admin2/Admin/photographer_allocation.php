<?php
session_start();

if (empty($_SESSION['email'])) {
    header('Location:../../Moment/login.php');
}

include 'connection.php';

if (isset($_REQUEST['pid'])) {
    if ($_REQUEST['flag'] == 1) {



        $in2 = "select ScheduleDate from bookingorder where Id={$_GET['oid']}";
        $res11 = mysqli_query($con, $in2);
        $date = "";
        if (mysqli_num_rows($res11) > 0) {
            $r11 = mysqli_fetch_array($res11);
            $date = $r11['ScheduleDate'];
        }

        $in = "insert into schedule values('',{$_GET['pid']},'$date',{$_GET['oid']})";

        mysqli_query($con, $in);

        mysqli_query($con, "update bookingorder set PId = {$_GET['pid']} where Id = {$_GET['oid']} ");
        unset($_SESSION['sd']);
    } else {
        mysqli_query($con, "update bookingorder set PId= 0 where Id = {$_GET['oid']} ");
        mysqli_query($con, "delete from schedule where BId = {$_GET['oid']} and PId={$_GET['pid']} ");
    }
    header("Location:photographer_allocation.php?name=" . $_GET['name'] . "&oid=" . $_GET['oid']);
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
                <div class="muted pull-left">View Photographer</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photographer Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>City name</th>
                                <th>Photography Interest</th>
                                <th>Allocation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sel = "select count(*) from schedule";
                            $res = mysqli_query($con, $sel);
                            $row1 = mysqli_fetch_array($res);
                            $count = $row1[0];


                            $select2 = "select * from bookingorder where Id=" . $_GET['oid'];
                            $res2 = mysqli_query($con, $select2);
                            $row2 = mysqli_fetch_array($res2);
                            $sd = $row2['ScheduleDate'];
                            $_SESSION['sd'] = $sd;


                            if ($count == 0) {



                                $i = 1;
                                $select = "select * from photographerdata where Interest like '%" . $_GET['name'] . "%'";
                                $res = mysqli_query($con, $select);
                                while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr align="center">	
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $row['FirstName'] ?></td>
                                        <td><?php echo $row['Email'] ?></td>
                                        <td><?php echo $row['Contact'] ?></td>
                                        <td><?php echo $row['City'] ?></td>
                                        <td><?php echo $row['Interest'] ?></td>
                                        <td>   

                                            <?php
                                            if ($row2['PId'] != 0) {
                                                if ($row['Id'] == $row2['PId']) {
                                                    ?>



                                                    <a href="photographer_allocation.php?pid=<?php echo $row['Id'] ?>&name=<?php echo $_GET['name'] ?>&oid=<?php echo $_GET['oid'] ?>&flag=2" <input type="submit" class="btn btn-warning" value="Allocate" name="btn_submit">Cancel</a>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <a href="photographer_allocation.php?pid=<?php echo $row['Id'] ?>&name=<?php echo $_GET['name'] ?>&oid=<?php echo $_GET['oid'] ?>&flag=1" <input type="submit" class="btn btn-warning" value="Allocate" name="btn_submit">Allocate</a>


                                            <?php } ?>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            } else {

                                /* $sel = "select * from schedule";
                                  $res1 = mysqli_query($con, $sel);
                                  $r1 = mysqli_fetch_assoc($res1); */

                                $i = 1;
                                $select = "select * from photographerdata where Interest like '%" . $_GET['name'] . "%'";
                                $res = mysqli_query($con, $select);
                                while ($row = mysqli_fetch_array($res)) {
                                    $sql1 = "";

                                    $sql1 = "select * from schedule s,bookingorder bo where s.BId=bo.Id and s.PId={$row['Id']} and s.ScheduleDate<='{$row2['ScheduleDate']}' and date_add(s.ScheduleDate,interval 5 day)>='{$row2['ScheduleDate']}' and SCategory='Full Packege' and Category='Wedding'";
                                    //                                   $sql1 = "select * from schedule where PId={$row['Id']} and ScheduleDate='{$row2['ScheduleDate']}'";
                                    $res1 = mysqli_query($con, $sql1);


                                    $sql1 = "select * from schedule s,bookingorder bo where s.BId=bo.Id and s.PId={$row['Id']} and s.ScheduleDate='{$row2['ScheduleDate']}' and SCategory!='Full Packege'";
                                    //                                   $sql1 = "select * from schedule where PId={$row['Id']} and ScheduleDate='{$row2['ScheduleDate']}'";
                                    $res7 = mysqli_query($con, $sql1);



                                    if (mysqli_num_rows($res1) == 0) {


                                        // echo "yes 0<br>";

                                        if (mysqli_num_rows($res7) == 0) {
                                            ?>
                                            <tr align="center">	
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $row['FirstName'] ?></td>
                                                <td><?php echo $row['Email'] ?></td>
                                                <td><?php echo $row['Contact'] ?></td>
                                                <td><?php echo $row['City'] ?></td>
                                                <td><?php echo $row['Interest'] ?></td>
                                                <td>   

                                                    <?php
                                                    if ($row2['PId'] != 0) {
                                                        if ($row['Id'] == $row2['PId']) {
                                                            ?>



                                                            <a href="photographer_allocation.php?pid=<?php echo $row['Id'] ?>&name=<?php echo $_GET['name'] ?>&oid=<?php echo $_GET['oid'] ?>&flag=2" <input type="submit" class="btn btn-warning" value="Allocate" name="btn_submit">Cancel</a>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <a href="photographer_allocation.php?pid=<?php echo $row['Id'] ?>&name=<?php echo $_GET['name'] ?>&oid=<?php echo $_GET['oid'] ?>&flag=1" <input type="submit" class="btn btn-warning" value="Allocate" name="btn_submit">Allocate</a>


                                                    <?php } ?>
                                                </td>

                                            </tr>
                                            <?php
                                        } else {

                                            while ($r6 = mysqli_fetch_array($res7)) {
                                                $bid = $r6['BId'];

                                                if ($bid == $_GET['oid']) {
                                                    ?>
                                                    <tr align="center">	
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $row['FirstName'] ?></td>
                                                        <td><?php echo $row['Email'] ?></td>
                                                        <td><?php echo $row['Contact'] ?></td>
                                                        <td><?php echo $row['City'] ?></td>
                                                        <td><?php echo $row['Interest'] ?></td>
                                                        <td>   

                                                            <?php
                                                            if ($row2['PId'] != 0) {
                                                                if ($row['Id'] == $row2['PId']) {
                                                                    ?>



                                                                    <a href="photographer_allocation.php?pid=<?php echo $row['Id'] ?>&name=<?php echo $_GET['name'] ?>&oid=<?php echo $_GET['oid'] ?>&flag=2" <input type="submit" class="btn btn-warning" value="Allocate" name="btn_submit">Cancel</a>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <a href="photographer_allocation.php?pid=<?php echo $row['Id'] ?>&name=<?php echo $_GET['name'] ?>&oid=<?php echo $_GET['oid'] ?>&flag=1" <input type="submit" class="btn btn-warning" value="Allocate" name="btn_submit">Allocate</a>


                                                            <?php } ?>
                                                        </td>

                                                    </tr>


                                                    <?php
                                                } else {
                                                    
                                                }
                                            }
                                        }
                                    } else {

                                        while ($r5 = mysqli_fetch_array($res1)) {
                                            $bid = $r5['BId'];

                                            if ($bid == $_GET['oid']) {
                                                ?>
                                                <tr align="center">	
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $row['FirstName'] ?></td>
                                                    <td><?php echo $row['Email'] ?></td>
                                                    <td><?php echo $row['Contact'] ?></td>
                                                    <td><?php echo $row['City'] ?></td>
                                                    <td><?php echo $row['Interest'] ?></td>
                                                    <td>   

                                                        <?php
                                                        if ($row2['PId'] != 0) {
                                                            if ($row['Id'] == $row2['PId']) {
                                                                ?>



                                                                <a href="photographer_allocation.php?pid=<?php echo $row['Id'] ?>&name=<?php echo $_GET['name'] ?>&oid=<?php echo $_GET['oid'] ?>&flag=2" <input type="submit" class="btn btn-warning" value="Allocate" name="btn_submit">Cancel</a>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <a href="photographer_allocation.php?pid=<?php echo $row['Id'] ?>&name=<?php echo $_GET['name'] ?>&oid=<?php echo $_GET['oid'] ?>&flag=1" <input type="submit" class="btn btn-warning" value="Allocate" name="btn_submit">Allocate</a>


                                                        <?php } ?>
                                                    </td>

                                                </tr>


                                                <?php
                                            } else {
                                                
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
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