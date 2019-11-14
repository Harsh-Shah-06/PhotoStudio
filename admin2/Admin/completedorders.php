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
                <div class="muted pull-left">Order Details</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <?php
                         
   
                                ?>
                                <th>No.</th>
                                <th>Customer Email</th>
                                <th>First Name</th>
                                <th>Contact No.</th>
                                <th>Booking Date</th>
                                <th>Schedule Date</th>
                                <th>Total Amount</th>   
                                <th>Category Name</th>
                                <th>Sub-Category Name</th>
                                <th>Allocated Photographer</th>
                                <th>Status</th>
                                <th>Billing</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $i = 1;
                            $select = "select * from bookingorder where Status = 'Completed'";
                            $res = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($res)) {
                                $_SESSION['booking_id'] = $row['Id'];
                                ?>
                                <tr align="center">	
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['Email'] ?></td>
                                    <td><?php echo $row['FirstName'] ?></td>
                                   
                                    <td><?php echo $row['Contact'] ?></td>
                                    <td><?php echo $row['BookingDate'] ?></td>
                                    <td><?php echo $row['ScheduleDate'] ?></td>
                                    <td><?php echo $row['Amount'] ?></td>
<!--                                    <td><?php //echo $row['comments'] ?></td>-->
                                    <td><?php echo $row['Category'] ?></td>
                                    <td><?php echo $row['SCategory'] ?></td>
                                    <td><?php
                                                   
                                                $pid = $row['PId'];
                                                $sel2 = "select count(*),FirstName from photographerdata where Id = '$pid' ";
                                                $r2 = mysqli_query($con, $sel2);
                                                while($row2 = mysqli_fetch_array($r2))
                                                {
                                                    if ($row2[0] == 1)
                                                    {
                                                        echo $row2['FirstName'];
                                                    }
                                                    else
                                                    {
                                                        echo "Photographer Not Allocated";
                                                    }
                                                }
                                                
                                                    
                                    
                                                ?>
                                    </td>


                                    <td>
                                        <?php
                                        if ($row['Status'] == 'Completed') {
                                            
                                            ?>
                                        
                                        <input type="submit" class="btn btn-success" value="<?php echo $row['Status'] ?>" disabled>
                                            <?php
                                        } ?>
                                    </td>
                                    
                                    
                                    <td>
                                        <a href="order_bill.php?order_code=<?php echo $row['Id'] ?>" class="btn btn-primary">Send Mail</a>
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