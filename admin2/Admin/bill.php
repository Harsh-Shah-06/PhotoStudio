<?php
include_once './connection.php';


if (isset($_REQUEST['cp_code'])) {
    $cp_code = $_REQUEST['cp_code'];
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Forms</title>
<?php include('link.php') ?>
    </head>

    <body style="background-color:#FFFFFF;">
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

        <div class="block-content collapse in">
            <div class="span12">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Generate Bill</legend>

                        <!-----Middle Content --->
                        <div class="col-lg-12">
                            <div style="width:99%;border:1px solid #CCCCCC;height:500px;">
                                <div style="width:100%;border-bottom:1px solid #CCCCCC;"><center><h4>INVOICE</h4></center></div>
                                <div style="width:100%;border-bottom:1px solid #CCCCCC;height:150px;">

<?php
$de = "select * from bookingorder where Id='1'";
$dee = mysqli_query($con, $de);
$ff = mysqli_fetch_array($dee)
?>
                                    <div style="width:49.8%;float:left;text-align:left;text-transform:capitalize;border-right:1px solid #CCCCCC;height:100%;">
                                        <table>
                                            <tr>
                                                <th>Name:</th><td><b><?php echo $ff['FirstName'] ." ". $ff['LastName'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th>City:</th><td><b><?php echo $ff['LastName'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th>Contact:</th><td><b><?php echo $ff['Contact'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th><td><b><?php echo $ff['Email'] ?></b></td>
                                            </tr>
                                            


                                        </table>

                                    </div>
                                    <div style="width:50%;float:left;text-align:left;text-transform:capitalize;">

                                        <table>
                                            <tr>
                                                <th>Order ID:</th><td><b><?php echo $ff['Id'] ?></b></td>
                                            </tr>
                                           


                                        </table>
                                    </div>
                                </div>
                                <div style="width:100%;border-bottom:1px solid #CCCCCC;padding-top:10px;padding-bottom:10px;">
                                    <table border="1" bordercolor="#CCCCCC" width="100%">
                                        <tr style="height:40px;">
                                            <th>No</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Photographer Name</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                        </tr>
<?php
//$i = 1;
//$total = 0;
//$gt = 0;
//$sel = "select * from customer_cart where customer_cart.cp_code='$cp_code' AND cc_status='confirmed'";
//$res = mysqli_query($conn, $sel);
//while ($row = mysqli_fetch_array($res)) {
//    $psp_id = $row['psp_id'];
//
//    $se = "select * from purchase_size_price where psp_id='$psp_id'";
//    $re = mysqli_query($conn, $se);
//    $ro = mysqli_fetch_array($re);
//
//    $pc_code = $ro['pc_code'];
//
//
//    $s = "select * from purchase_color where pc_code='$pc_code'";
//    $r = mysqli_query($conn, $s);
//    $rd = mysqli_fetch_array($r);
//
//    $pe_code = $rd['pe_code'];
//
//    $rr = "select * from purchase where purchase_code='$pe_code'";
//    $rrd = mysqli_query($conn, $rr);
//    $rrt = mysqli_fetch_array($rrd);
//
//    $total = $row['cc_price'] * $row['cc_qty'];
//    $gt = $gt + $total;
    ?>
                                            <tr style="height:40px;text-align:center;">
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $rrt['sub_p_name'] ?></td>
                                                <td><?php echo $ro['psp_size'] ?></td>
                                                <td><?php echo $row['cc_qty'] ?></td>
                                                <td>RS.<?php echo $row['cc_price'] ?></td>
                                                <td>RS.<?php echo $total ?></td>

                                            </tr>
    <?php

?>
                                        <tr style="height:50px;">
                                            <td colspan="4"></td>
                                            <th>Total Amount</th>
                                            <th>RS.<?php echo $gt ?></th>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-----Middle Content End--->



                    </fieldset>
                </form>

            </div>
        </div>
        <!-- /block -->
    </div>


    <hr>
<?php include('footer.php') ?>
</div>
<!--/.fluid-container-->
<?php include('js_link.php') ?>
</body>

</html>