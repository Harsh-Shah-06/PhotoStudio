<?php
session_start();
if(!isset($_SESSION['email']))
{
  
    header('Location:login.php');
}
else
{
    $e= $_SESSION['email'];
include_once 'connection.php';
$q = "select Id from userdata where Email='$e'";
$r = mysqli_query($c, $q);
while ($result = mysqli_fetch_row($r))
{
    $i = $result[0];
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Order</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <link href="css/datatable.min.css" rel="stylesheet" type="text/css"/>
        <!-- CSS assets -->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/datatable.min.js" type="text/javascript"></script>

        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">


        <!-- ambani -->
        <!-- Bootstrap Core CSS -->
        <link href="../css/jquery.datatable.css" rel="stylesheet" type="text/css"/>

        <!-- MetisMenu CSS -->

        <!--<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
        <link href="css/datatable.min.css" rel="stylesheet" type="text/css"/>



        <script>
            $(document).ready(function () {
                $('#table_id').DataTable();
            });

        </script>

    </head>

    <body>
        <?php
        include('customeraccountheader.php');
        ?>
        <div class="ag-subheader">

            <div class="media-wrapper">
                <div class="media-container media-header">
                    <div class="container-overlay">
                        <div class="bg-source bg-source--image" style="background-image: url('images/h4.jpg');background-size: cover">
                        </div>
                        <div class="bg-source img-overlay">
                        </div>
                    </div>
                    <div class="media-container-title txt-center">
                        <h1 class="txt-light">Order
                        </h1>
                    </div>
                </div>
            </div>


            <div class="ag-mask">
                <div class="skew-mask">
                </div>
            </div>
        </div><!--end subheader-->
        <!--titleblock section-->

        <section class="sidermargins pb-100 pt-80">

            <div>
                <div align="right">
                    <button type="button" class="btn btn-info glyphicon glyphicon-print " onclick="window.print()"></button><br><br>
                </div>
                <table id="example" class="table table-striped table-bordered " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            
                            <th>Amount</th>
                       
                            <th>ScheduleDate</th>
                            <th>BookingDate</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Photographer</th>
                            <th>Status</th>
                        </tr>
                    </thead>
<!--                    <tfoot>
                        <tr>

                            <th>Id</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Contact</th>
                            <th>ScheduleDate</th>
                            <th>BookingDate</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                             <th>Photographer</th>
                            <th>Status</th>
                        </tr>

                    </tfoot>-->

                    <?PHP
//                        $servername = "localhost";
//                        $username = "root";
//                        $password = "";
//                        $dbname = "cms";
//                        $conn = new mysqli($servername, $username, $password, $dbname);
//                        $query = "SELECT comp_type,description,location,repotant,date,status FROM complaint WHERE status='solved'";
//                        $result = $conn->query($query);
//
//                        $row[] = array();
//                        if ($result->num_rows > 0) {
//                            while ($data = $result->fetch_assoc()) {
//                                $row = $data;
//                                echo "<tr>";
//                                foreach ($row as $value) {
//
//                                    echo "<td>" . $value . "</td>";
//                                }
//                                echo "</tr>";
//                            }
//                        }
//                        $conn->close();
//                      
                    ?>

                </table>
            </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div id="content-data"></div>
            </div>
        </div>



        <script>
            $(document).ready(function () {
                var dataTable = $('#example').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        url: "myorder1.php",
                        type: "post"
                    }
                });
            });
        </script>


        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/plugins/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
        <script src="js/datatable.min.js" type="text/javascript"></script>
     <!--<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>-->
        <script src="js/datatable.bootstrap.min.js" type="text/javascript"></script>


    </form>
    <?PHP ?>


</section>

<?php
include 'footer.php';
?>
</body>
</html>
<?php } ?>