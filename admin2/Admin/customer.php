<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

include 'connection.php';

	if(isset($_REQUEST['btn_update']))
	{
		$id=$_REQUEST['txt_id'];
		$fname=$_REQUEST['txt_fname'];
                $lname=$_REQUEST['txt_lname'];
                $email=$_REQUEST['txt_email'];
                $contact=$_REQUEST['txt_contact'];
                $city=$_REQUEST['txt_city'];
		
		$update="update userdata set FirstName = '$fname', LastName = '$lname',Email = '$email',Contact = '$contact',City = '$city' where Id = '$id'";
		mysqli_query($con,$update);
                echo '<script>window.location.href="customer.php"</script>';
		
	}
	
	if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
		$status = $_REQUEST['status'];
		
		if($status == 'Active')
		{
			$sta = 'Deactive';
		}
		else
		{
			$sta = 'Active';
		}
		$update = "update userdata set Status = '$sta' where Id = '$id'";
		mysqli_query($con,$update);
		echo '<script>window.location.href="customer.php"</script>';
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
                <div class="muted pull-left">View Customer</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer First Name</th>
                                <th>Customer Last Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Info</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $select = "select * from userdata";
                            $res = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <tr align="center">	
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['FirstName']?></td>
                                    <td><?php echo $row['LastName'] ?></td>
                                    <td><?php echo $row['Email'] ?></td>
                                    <td><?php echo $row['Contact'] ?></td>
                                    <td><?php echo $row['City'] ?></td>
                                   
                                           
                                    </td>
                                    
                                    <td>
                                        <?php
                                        if ($row['Status'] == 'Active') {
                                            ?>
                                        <a href="customer.php?id=<?php echo $row['Id'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are You Sure want to Deactive ?')"><input type="submit" class="btn btn-success" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        } else {
                                            ?>
                                        <a href="customer.php?id=<?php echo $row['Id'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are You Sure want to Active ?')"><input type="submit" class="btn btn-danger" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    
                                    <td>
                                        <a href="#myAlert<?php echo $i ?>" data-toggle="modal" class="btn btn-info">Info</a>

                                        <div id="myAlert<?php echo $i ?>" class="modal hide">
                                            <div class="modal-header">
                                                <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                <center><h3>Customer Information</h3></center>
                                            </div>
                                            <center>
                                                
                                            <div class="modal-body">
                                                <table>
                                                    <tr><center><img  class="img-polaroid" src="../../Moment/UserImages/<?php  echo  $row['PImage']?>" height="150px" width="150px"></center></tr>
                                                <tr><td>Customer First Name :</td><td><?php echo $row['FirstName'] ?></td></tr>
                                                <tr><td>Customer Last Name :</td><td><?php echo $row['LastName'] ?></td></tr>
                                                <tr><td>Email :</td><td><?php echo $row['Email'] ?></td></tr>
                                                <tr><td>Contact No :</td><td><?php echo $row['Contact'] ?></td></tr>
                                                <tr><td>City :</td><td><?php echo $row['City'] ?></td></tr>
                                                </table>
                                            </div>
                                                    
                                                </center>
                                            <br><br>
                                            <div class="modal-footer">
                                                <center><a data-dismiss="modal" class="btn" href="#">Cancel</a></center>
                                                <!--<a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a>-->
                                            </div>
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