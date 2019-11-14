<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

include 'connection.php';


if(isset($_REQUEST['cid']))
{
      $cid=$_REQUEST['cid'];
} 
if (isset($_REQUEST['id']) ) {
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];

    if ($status == 'Active') {
        $sta = 'Deactive';
    } else {
        $sta = 'Active';
    }
    $update = "update participant set Status = '$sta' where ParticipantId = '$id'";
    mysqli_query($con, $update);
    echo "<script>window.location.href='participants.php?cid=$cid'</script>";
    
}

if (isset($_REQUEST["btn_submit"])) {
    $data = array();

    foreach ($_REQUEST["no"] as $id => $value) {
        if (isset($value) && !empty($value)) {
            $data[] = array(
                "id" => $id,
                "status" => $value
            );
        }
    }



    if (count($data) == 2) {
        $tmp = 1;
        for ($i = 0; $i < count($data); $i++) {
            for ($j = $i + 1; $j < count($data); $j++) {

                if ($data[$i]["status"] == $data[$j]["status"]) {
                    $tmp = 0;
                    echo "<script>alert('Enter unique value in textbox');window.location.href='participants.php?cid=$cid'</script>";
                    //header('Location:participants.php');
                }
            }
        }
        foreach ($data as $value) {
            $q = "SELECT count(*) FROM participant WHERE ContestId=$cid and (Winner='Winner' or Winner='Runner up')";
            $r = mysqli_query($con, $q);
            $temp = 0;

            while ($row = mysqli_fetch_row($r)) {
                $temp = $row[0];
            }
            if ($temp < 2) {
                if ($tmp == 1) {
                    //echo "<script>alert('{$value['id']}');alert('{$value['status']}');</script>";
                    if ($value['status'] == 1) {
                        //echo "<script>alert('winner');</script>";
                        $sql = "update participant set Winner = 'Winner' where ParticipantId = {$value['id']}";
                        mysqli_query($con, $sql);
                    }

                    if ($value['status'] == 2) {
                        //echo "<script>alert('runers up');</script>";
                        $sql = "update participant set Winner = 'Runner up' where ParticipantId = {$value['id']}";
                        mysqli_query($con, $sql);
                    }
                }
            } else {
                echo "<script>alert('Already inserted');window.location.href='participants.php?cid=$cid'</script>";
            }
        }
    } else {
        echo "<script>alert('There is only one winner and one runner up');window.location.href='participants.php?cid=$cid'</script>";
    }
    
    $count = "select COUNT(*) from participant WHERE Winner = 'Winner' or Winner = 'Runner up'";
    $r2 = mysqli_query($con, $count);
    $count1 = mysqli_fetch_row($r2);
    $c1 = $count1[0];
   
    
    if ($c1 == 2)
    {
            $up1 = "update contest set Status = 'Deactive' where ContestId='$cid'";
            mysqli_query($con, $up1);
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
                <div class="muted pull-left">View Contest Participant</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form method="post">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Email</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>City</th>
                                    <th>Image</th>
                                    <th>Winner</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $winstatus=0;
                                $temp = 1;
                                $sel = "select * from participant where ContestId=$cid order by ContestId desc;";
                                $res = mysqli_query($con, $sel);
                                while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr align="center">	
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $row['ParticipantEmail'] ?><?php $e=$row['ParticipantEmail'];  ?></td>
                                        <td><?php echo $row['ParticipantFName'] ?></td>
                                        <td><?php echo $row['ParticipantLName'] ?></td>
                                        <td><?php echo $row['ParticipantCity'] ?></td>
                                        <td>
                                            <a href="#myAlert<?php echo $i ?>" data-toggle="modal" class="btn btn-inverse">View Images</a>

                                            <div id="myAlert<?php echo $i ?>" class="modal hide">
                                                <div class="modal-header">
                                                    <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                    <center><h3>Contest Images</h3></center>
                                                </div>
                                                <center>

                                                    <div class="modal-body">
                                                        <table>
                                                            <tr><td><img src="img/participant/<?php echo $e."/".$row['img1'] ?>"  alt="" style="height: 300px;width: 500px" /></td></tr>   
                                                            <tr><td><img src="img/participant/<?php echo $e."/".$row['img2'] ?>" alt="" style="height: 300px;width: 500px"/></td></tr>  
                                                            <tr><td><img src="img/participant/<?php echo $e."/".$row['img3'] ?>" alt="" style="height: 300px;width: 500px"/></td></tr>  
                                                        </table>     
                                                    </div>

                                                    <br><br>
                                                    <div class="modal-footer">
                                                        <center><a data-dismi0ss="modal" class="btn" href="#">Cancel</a></center>
                                                        <!--<a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a>-->
                                                    </div>


                                                </center>

                                            </div>

                                        </td>

                                        <td>
                                            <?php
                                            
                                            if($row['Winner']!="" || $winstatus==1)
                                            {
                                                $winstatus=1;
                                            ?>
                                            <input disabled type="number" placeholder="<?php echo $row['Winner'] ?>" class="form-control" name="no[<?php echo $row["ParticipantId"] ?>]" >
                                            <?php }else { ?>
                                            
                                            <input  type="number" placeholder="<?php echo $row['Winner'] ?>" class="form-control" name="no[<?php echo $row["ParticipantId"] ?>]" >
                                            <?php } ?>
                                            
                                        
                                        
                                        </td>

                                        <td>
                                            <?php
                                            if ($row['Status'] == 'Active') {
                           ///                     echo $row['status'];4cid
                                                ?>
                           
                                                <a href="participants.php?cid=<?php echo $cid ?>&id=<?php echo $row['ParticipantId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are you Sure want to Deactive ?')"><input type="button" class="btn btn-success" value="<?php echo $row['Status'] ?>"></a>
                                                <?php
                                            } else {
                              //                  echo $row['status'];
                                                ?>
                                                <a href="participants.php?cid=<?php echo $cid ?>&id=<?php echo $row['ParticipantId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are you Sure want to Active ?')"><input type="button" class="btn btn-danger" value="<?php echo $row['Status'] ?>"></a>
                                                <?php
                                            }
                                            ?>
                                        </td>


                                    </tr>
    <?php
    $temp ++;
}
?>
                            </tbody>
                        </table>

                        <input style="float: right;" type="submit" name="btn_submit" class="btn btn-success" value="Submit">
                    </form>
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