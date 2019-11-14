<?php
include 'connection.php';


session_start();
if(!isset($_SESSION['email']))
{
    header('Location:login.php');
}
else
{
    $e= $_SESSION['email'];

    $i = "";
$q = "select Id from photographerdata where Email='$e'";
$r = mysqli_query($c, $q);
while ($result = mysqli_fetch_row($r))
{
    $i = $result[0];
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Contest</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">
        <style>
            .coupon {
                border: 5px dotted #bbb; /* Dotted border */
                width: 80%; 
                border-radius: 15px; /* Rounded border */
                margin: 0 auto; /* Center the coupon */
                max-width: 600px; 
            }

            .con {
                padding: 2px 16px;
                background-color: #f1f1f1;
            }

            .promo {
                background: #ccc;
                padding: 3px;
            }

            .expire {
                color: red;
            }
            .bt
            {
                border:solid black 2px;
                border-radius: 10px;
                color:black;
                width:50%;
                outline:none;
                font-size: 18px;
                background: #f1f1f1;
            }
            .bt:hover
            {
                color:white;
                background: darkgray;
            }
        </style>
    </head>

    <body>
        <?php
        include('Photographer_Account_Header.php');
        ?>
        
      
        <div class="ag-subheader">

            <div class="media-wrapper">
                <div class="media-container media-header">
                    <div class="container-overlay">
                        <div class="bg-source bg-source--image " style="background-image: url('images/contest.jpg');background-size: cover;">
                        </div>
                        <div class="bg-source img-overlay">
                        </div>
                    </div>
                    <div class="media-container-title txt-center">
                        <h1 class="txt-light">Contest
                        </h1>
                    </div>
                </div>
            </div>
            <div class="ag-mask">
                <div class="skew-mask">
                </div>
            </div>
        </div><!--end subheader-->

        <section class="sidermargins pb-100 pt-80">
            <?php
            include 'connection.php';
            $q = "select * from contest where Status='Active'";
            $result = mysqli_query($c, $q);

            while ($r = mysqli_fetch_assoc($result))
            {
                ?>
                <div class="coupon">
                    <div class="container-fluid">
                        <h2>Moment</h2>
                        <h3>Enjoy the festival of Photography</h3>
                    </div>
                        <?php echo"<img  src='../admin2/Admin/img/contest/{$r['ContestImage']}'  alt='Contest' style='width:100%;height:50%;padding:10px;'>" ?>
                   
                    <div class="con" style="background-color:white">
                        <table>
                            
                            <tr>
                                <td><?php echo"<h2><b>{$r['ContestName']}</b></h2>" ?></td>
                                <?php  $_SESSION['ci']=$r['ContestId'];?>
                                
                            </tr>
                           
                            <tr> <td><?php echo"<h3> Start-Date : {$r['StartDate']} </h3>"?></td></tr>
                            <tr>
                                
                                <td><?php echo"<h3> End-Date : {$r['EndDate']} </h3>"?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="con" >
                        <h4 >It's time to show your talent and win the contest.</h4>
                        <h4 >Prove your self best and be the champion.</h4>
                        <h4 >So be ready for the challenges.</h4><br>
                      <?php  
                      
                      $t=date("d-m-Y");
                      $stdt=date_format(date_create_from_format('Y-m-d' , $r['StartDate']), 'd-m-Y');
                      $enddt=date_format(date_create_from_format('Y-m-d' , $r['EndDate']), 'd-m-Y');
                      if(strtotime($t)>=strtotime($stdt) && strtotime($t)<=strtotime($enddt))
                        {
                         ?>
                                   
                        <form method="POST"><center><input type='submit' name="btn_register" id="btn_register" value="Register Now" class="bt" enable="true" formaction="PhotographerContestRegistration.php"></center></form>
                        <?php  }
                        
                        else
                        {?>
                        <script> document.getElementById("btn_register").disabled = false;   </script>    
                       <?php }?>
                        <br>
                    </div>
                
                </div>
            </section>

        <?php } ?>
      
<?php
include('footer.php');
?>
         <!-- /.#page_wrapper -->

    <a href="contact.html#" class="totop">TOP</a> <!--/.totop -->
</body>
</html>
<?php ob_end_flush(); } ?>
