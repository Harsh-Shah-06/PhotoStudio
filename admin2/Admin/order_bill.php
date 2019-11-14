
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
                <div class="muted pull-left">Billing Details</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <?php

include  './connection.php';
$id = $_GET['order_code'];

$sel = "select * from bookingorder where Status = 'Completed' and Id = '$id'";
$res = mysqli_query($con, $sel);
$row = mysqli_fetch_array($res);

$id = $row['Id'];
$email = $row['Email'];
$name = $row['FirstName']." ".$row['LastName'];
$city = $row['City'];
$bdate = $row['BookingDate'];
$sdate = $row['ScheduleDate'];
$cat = $row['Category'];
$scat = $row['SCategory'];
$satus = $row['Status'];
$id = $row['PId'];
$amount = $row['Amount'];

$sel1 = "select * from photographerdata where Id = $id";
$res1 = mysqli_query($con, $sel1);
$row1 = mysqli_fetch_array($res1);
$pname = $row1['FirstName']." ".$row1['LastName'];
$pemail = $row1['Email'];
$pcontact = $row1['Contact'];




$_SESSION['bill'] = "
         <center>
            <h1 style='color:orange;'>
                Moment Photo Studio
            </h1>
        </center>
        <center>
            <table style='border:solid 1px;'>
                <tr>
                </tr>
                <tr style='border:solid 1px;'>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                        Order Id : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $id
                    </td>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                        Customer Email : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $email
                    </td>
                </tr>
                <tr style='border-bottom:solid 1px;'>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                       Customer Name : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $name
                    </td>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                        City : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $city
                    </td>
                </tr>
                <tr style='border-bottom:solid 1px;'>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                       Booking Date : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $bdate
                    </td>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                        Schedule Date : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $sdate
                    </td>
                </tr>
                <tr style='border-bottom:solid 1px;'>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                      Category : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $cat
                    </td>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                        Sub-Category : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $scat
                    </td>
                </tr>
                <tr style='border-bottom:solid 1px;'>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                      Status : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $satus
                    </td>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                        Photographer Name : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $pname
                    </td>
                </tr>
                <tr style='border-bottom:solid 1px;'>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                      Photographer Email : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $pemail
                    </td>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;'>
                        Photographer Contact No. : 
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        $pcontact
                    </td>
                </tr>
                <tr style='border-bottom:solid 1px;'>
                    <td style='padding: 20px;border:solid 1px;'>
                      
                    </td>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;font-size:25px;'>
                        Total Amount :
                    </td>
                    <td style='padding: 20px;border:solid 1px;font-weight:bold;font-size:25px;'>
                        $amount
                    </td>
                    <td style='padding: 20px;border:solid 1px;'>
                        
                    </td>
                </tr>
            </table>
        </center>";
echo $_SESSION['bill'];
?>

                    <br>
                    <center>
                    <a class="btn btn-info" href="order_bill_mail.php?customer=<?php echo $email ?>&order_code=<?php echo $id?>">Send Mail</a> 
                    </center>
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






