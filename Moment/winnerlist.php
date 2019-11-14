<?php 
include 'connection.php';
$sql = "SELECT * from participant p,contest c where p.ContestId=c.ContestId and Winner = 'Winner' or Winner = 'Runner up' ";
$result_sql = mysqli_query($c, $sql);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->
<html lang="en">
    <head>
        <!--Start of Zendesk Chat Script-->
       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Winner List</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <script src="js/wow.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Animation -->
        <script src="js/wow.js" type="text/javascript"></script>
        <link href="css/animate_2.css" rel="stylesheet" type="text/css"/>

        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">
        <link href="css/animate_1.css" rel="stylesheet" type="text/css"/>

          <script>
            $(document).ready(function () {
                $('#table_id').DataTable();
            });

        </script>
    </head>

    <body>
        <?php
        include('header.php');
        ?>
        <div class="ag-subheader">

            <div class="media-wrapper">
                <div class="media-container media-header">
                    <div class="container-overlay ">
                        <div class="bg-source bg-source--image " style="background-image: url('images/winnerlist.jpg');background-size: cover">
                        </div>
                        <div class="bg-source img-overlay">
                        </div>
                    </div>
                    <div class="media-container-title txt-center">
                        <h1 class="txt-light ">Winner List
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
 
             
                <center>
                    <div style="width:80%;">
                        <div align="right">
                            <button type="button" class="btn btn-info glyphicon glyphicon-print " onclick="window.print()"></button><br><br>
                            <input class="form-control" ID="myInput" type="text" placeholder="Search..." style="width: 20%;">
                            <br/>
                        </div>
                        <table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Contest</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Image-1</th>
                                    <th>Image-2</th>
                                    <th>Image-3</th>
                                </tr>
                            </thead>
                            <?php while ($r = mysqli_fetch_assoc($result_sql)) { ?>
                                <tr class="mytr">
                                    <td><?php echo $r['ContestName']; ?></td>
                                    <td><?php echo $user =  $r['ParticipantEmail']; ?></td>
                                    <td><?php echo $r['ParticipantFName']; ?></td>
                                        <td><?php echo $r['ParticipantCity']; ?></td>
                                    <td>
                                        <?php echo"<img  src='../admin2/Admin/img/participant/$user/{$r['img1']}'  alt='Contest' style='width:100%;height:20%;padding:10px;'>" ?>                                            
                                        <hr/>
                                    </td>
                                    <td>
                                        <?php echo"<img  src='../admin2/Admin/img/participant/$user/{$r['img2']}'  alt='Contest' style='width:100%;height:20%;padding:10px;'>" ?>                                            
                                        <hr/>
                                    </td>
                                    <td>
                                        <?php echo"<img  src='../admin2/Admin/img/participant/$user/{$r['img3']}'  alt='Contest' style='width:100%;height:20%;padding:10px;'>" ?>                                            
                                        <hr/>
                                    </td>
                                    
                                    

                                </tr> 
                            <?php } ?>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </center>   
            </div>
            <!-- Metis Menu Plugin JavaScript -->
            <script src="js/plugins/bootstrap.min.js" type="text/javascript"></script>
            <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
            <!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
            <script src="js/datatable.min.js" type="text/javascript"></script>
         <!--<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>-->
            <script src="js/datatable.bootstrap.min.js" type="text/javascript"></script>


            <?PHP ?>
        </div>
        <br/>

      
        <!--             Footer 
                    <footer class="w3-container w3-theme-d3 w3-padding-16">
                        <h5>Footer</h5>
                    </footer>
        
                    <footer class="w3-container w3-theme-d5">
                        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
                    </footer>-->
            <script>
                $(document).ready(function () {
                    $("#myInput").on("keyup", function () {
                        var value = $(this).val().toLowerCase();
                        $("#mytable .mytr").filter(function () {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>


</section>


  

    <?php
    include('footer.php');
    ?>

</div><!-- /.#page_wrapper -->

<a href="winnerlist.php" class="totop">TOP</a> <!--/.totop -->

</body>
</html>
