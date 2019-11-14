<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}


include 'connection.php';

if (isset($_REQUEST['btn_update'])) {
    
    $id = $_REQUEST['txt_id'];
    $name1 = $_REQUEST['txt_cname'];
   
    $sd = $_REQUEST['txt_sdate'];
    $ed = $_REQUEST['txt_edate'];
    
    $extension = '';
    $newfilename = '';

    $name = $_FILES['txt_cimg']['name'];
    $tmp = $_FILES['txt_cimg']['tmp_name'];
    $type = $_FILES['txt_cimg']['type'];
    $size = $_FILES['txt_cimg']['size'];

    $date = date('dmY_his_');
    $ext = explode('.', $name);
    $extension = end($ext);

    $newfilename = "IMG_" . $date . $id . "." . $extension;
    if ($name != '') {
        $path = "img/contest/" . $newfilename;
        move_uploaded_file($tmp, $path) or die();
    }
    

    $update = "update contest set ContestName = '$name1',StartDate = '$sd',EndDate = '$ed', ContestImage = '$newfilename'  where ContestId = '$id'";
    mysqli_query($con, $update);
    echo '<script>window.location.href="viewcontest.php"</script>';
}
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];

    if ($status == 'Active') {
        $sta = 'Deactive';
    } else {
        $sta = 'Deactive';
    }
    $update = "update contest set Status = '$sta' where ContestId = '$id'";
    mysqli_query($con, $update);
    echo '<script>window.location.href="viewcontest.php"</script>';
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
                <div class="muted pull-left">View Contest</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Contest Name</th>
                               
                                <th>Contest Starting Date</th>
                                <th>Contest Ending Date</th>
                                <th>Contest Image</th>
                                <th>Contest Status</th>
                                <th>View Participants</th>
                                <th>Edit</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $sel = "select * from contest order by ContestId desc";
                            $res = mysqli_query($con, $sel);
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <tr align="center">	
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['ContestName'] ?></td>
                                   
                                    <td><?php echo $row['StartDate'] ?></td>
                                    <td><?php echo $row['EndDate'] ?></td>
                                    <td><img src="img/contest/<?php echo $row['ContestImage'] ?>" alt="" height="200px" width="200px" ></td>        
                                    <td>
                                        <?php
                                        if ($row['Status'] == 'Active') {
                                            ?>
                                        <a href="viewcontest.php?id=<?php echo $row['ContestId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are you Sure want to Deactive ?')"><input type="submit" class="btn btn-success" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        } else {
                                            ?>
                                        <a href="viewcontest.php?id=<?php echo $row['ContestId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Event is already Deactive.!')"><input type="submit" class="btn btn-danger" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        
                                        
                                        <a href="participants.php?cid=<?php echo $row['ContestId'] ?>"><input type="submit" class="btn btn-warning" value="View"></a>
                                        
                                        
                                    
                                        
                                    </td>
                                    <td>
                                        <a href="#myAlert<?php echo "a" . $i ?>" data-toggle="modal" class="btn btn-primary">Edit</a>

                                        <div id="myAlert<?php echo "a" . $i ?>" class="modal hide">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                    <center><h3>Update Contest Information</h3></center>
                                                </div>
                                                <center>
                                                    <table>
                                                        <div class="modal-body">
                                                            <tr><td>Category ID :</td><td><input type="number" name="txt_id" value="<?php echo $row['ContestId'] ?>" readonly="true"></td></tr>
                                                            <tr><td>Contest Name :</td><td><input type="text" name="txt_cname" value="<?php echo $row['ContestName'] ?>"></td></tr>
                                                            
                                                            <tr><td>Starting Date :</td><td><input type="date" name="txt_sdate" id="sdate" value="<?php echo $row['StartDate'] ?>"></td></tr>
                                                            <tr><td>Ending Date :</td><td><input type="date" name="txt_edate" id="edate" value="<?php echo $row['EndDate'] ?>"></td></tr>
                                                            <tr><td>Image :</td><td><input type="file" name="txt_cimg"></td></tr>
                                                        </div>
                                                    </table>
                                                </center>
                                                <br><br>
                                                <div class="modal-footer">
                                                    <center><input type="submit" name="btn_update" class="btn btn-primary" value="Update">
                                                    <a data-dismiss="modal" class="btn" href="#">Cancel</a></center>
                                                </div>
                                                <script src="../../Moment/vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
                                                 <script>
                    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    
    $('#sdate').attr('min', maxDate);
    $('#edate').attr('min', maxDate);
});
                    </script>
 
                                            </form>
                                        </div>
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