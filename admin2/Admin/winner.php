<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

include 'connection.php';
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
                <div class="muted pull-left">View Contest Winners</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form method="post">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Contest Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Image</th>
                                    <th>Position</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $sel = "select * from participant p,contest c where c.ContestId = p.ContestId and Winner!='' order by Winner desc";
                                $res = mysqli_query($con, $sel);
                                while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr align="center">	
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $row['ContestName'] ?></td>
                                        <td><?php echo $row['ParticipantFName'] ?></td>
                                        <td><?php echo $row['ParticipantLName'] ?></td>
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
                                                            <tr><td><img src="img/participant/<?php echo $row['img1'] ?>" alt="" style="height: 300px;width: 500px" /></td></tr>   
                                                            <tr><td><img src="img/participant/<?php echo $row['img2'] ?>" alt="" style="height: 300px;width: 500px"/></td></tr>  
                                                            <tr><td><img src="img/participant/<?php echo $row['img3'] ?>" alt="" style="height: 300px;width: 500px"/></td></tr>  
                                                        </table>     
                                                    </div>

                                                    <br><br>
                                                    <div class="modal-footer">
                                                        <center><a data-dismi0ss="modal" class="btn" href="winner.php">Cancel</a></center>
                                                        <!--<a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a>-->
                                                    </div>


                                                </center>

                                            </div>

                                        </td>

                                        <td>
                                            <?php echo $row['Winner'] ?>
                                        </td>

                                        

                                    </tr>
    <?php
    
}
?>
                            </tbody>
                        </table>

                        
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