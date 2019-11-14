<!DOCTYPE html>
<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

?>
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
                <div class="muted pull-left">Feedbacks</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Feedback</th>
                                <th>Info</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$i = 1;
$select = "select * from feedback";
$res = mysqli_query($con, $select);
while ($row = mysqli_fetch_array($res)) {
    ?>
                                <tr align="center">	
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['Name'] ?></td>
                                    <td><?php echo $row['Email'] ?></td>
                                    <td><?php echo $row['Suggestion'] ?></td>
                                    

                                    <td>
                                        <a href="#myAlert<?php echo $i  ?>" data-toggle="modal" class="btn btn-inverse">View Feedback</a>

                                        <div id="myAlert<?php echo $i  ?>" class="modal hide">
                                            <div class="modal-header">
                                                <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                <center><h3>Feedback Information</h3></center>
                                            </div>
                                            <center>
                                                
                                                    <div class="modal-body">
                                                        <table>
                                                        <tr><td>Name :</td><td><?php echo $row['Name'] ?></td></tr>
                                                        <tr><td>Email :</td><td><?php echo $row['Email'] ?></td></tr>
                                                        <tr><td>Feedback :</td><td><?php echo $row['Suggestion'] ?></td></tr>
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