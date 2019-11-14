<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

include 'connection.php';

if (isset($_REQUEST['btn_update'])) {
    $txt_id = $_REQUEST['txt_id'];
    $txt_name = $_REQUEST['txt_name'];
    $txt_email = $_REQUEST['txt_email'];
    $txt_contact = $_REQUEST['txt_contact'];
    $txt_city = $_REQUEST['txt_city'];
    $txt_int = $_REQUEST['txt_int'];
    $up = "update photographerdata set FirstName = '$txt_name',Email='$txt_email',Contact='$txt_contact',City='$txt_city',Interest = '$txt_int' where Id = '$txt_id'";
    mysqli_query($con, $up);
    echo '<script>window.location.href="photographer.php"</script>';
}

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];

    if ($status == 'Active') {
        $sta = 'Deactive';
    } else {
        $sta = 'Active';
    }
    $update = "update photographerdata set Status = '$sta' where Id = '$id'";
    mysqli_query($con, $update);
    echo '<script>window.location.href="photographer.php"</script>';
}
if (isset($_REQUEST['idd'])) {
    $idr = $_REQUEST['idd'];
    $veri = $_REQUEST['ver'];

    if ($veri == 'DisApproved') {
        $s = 'Approved';
    } else {
        $s = 'Approved';
    }
    $update1 = "update photographerdata set Verification = '$s' where Id = '$idr'";
    mysqli_query($con, $update1);
    echo '<script>window.location.href="photographer.php"</script>';
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
                                <th>Status</th>
                                <th>Info</th>
                                <th>Verification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $select = "select * from photographerdata";
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
                                        if ($row['Status'] == 'Active') {
                                            ?>
                                            <a href="photographer.php?id=<?php echo $row['Id'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are you Sure want to Deactive ?')"><input type="submit" class="btn btn-success" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="photographer.php?id=<?php echo $row['Id'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are you Sure want to Active ?')"><input type="submit" class="btn btn-danger" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    
                                    <td>
                                        <a href="#myAlert<?php echo $i   ?>" data-toggle="modal" class="btn btn-info">Info</a>

                                        <div id="myAlert<?php echo $i   ?>" class="modal hide">
                                            <div class="modal-header">
                                                <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                <center><h3>Photographer Information</h3></center>
                                            </div>
                                            <center>

                                                <div class="modal-body">
                                                    <table>
                                                        <tr><center><img  class="img-polaroid" src="../../Moment/ProfileImages/<?php  echo  $row['PImage']?>" height="150px" width="150px"></center></tr>
                                                        <tr><td>Photographer Name :</td><td><?php echo $row['FirstName'] ?></td></tr>
                                                        <tr><td>Email :</td><td><?php echo $row['Email'] ?></td></tr>
                                                        <tr><td>Contact No :</td><td><?php echo $row['Contact'] ?></td></tr>
                                                        <tr><td>City :</td><td><?php echo $row['City'] ?></td></tr>
                                                        <tr><td>Photography Interest :</td><td><?php echo $row['Interest'] ?></td></tr>
                                                    </table>

                                                </div>

                                                <br><br>
                                                <div class="modal-footer">
                                                    <center><a data-dismiss="modal" class="btn" href="#">Cancel</a></center>
                                                    <!--<a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a>-->
                                                </div>


                                            </center>

                                        </div>

                                    </td>
                                    <td>
                                        <?php
                                        if ($row['Verification'] == 'DisApproved') {
                                            ?>
                                            <a href="photographer.php?idd=<?php echo $row['Id'] ?>&ver=<?php echo $row['Verification'] ?>" onClick="return confirm('Are you Sure want to Approve?')"><input type="submit" class="btn btn-danger" value="<?php echo $row['Verification'] ?>"></a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="photographer.php?idd=<?php echo $row['Id'] ?>&ver=<?php echo $row['Verification'] ?>"><input type="submit" class="btn btn-success" value="<?php echo $row['Verification'] ?>"></a>
                                                <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
                                <?php
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