<?php
session_start();
if(!isset($_SESSION['email']))
{
    header('Location:login.php');
}
else
{
    $e= $_SESSION['email'];
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
        <title>Category</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->

        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <!--category stylesheets-->
        <link rel="stylesheet" href="css/categorystyle.css" />

        <style>
            .productbox {
                background-color:#ffffff;
                padding:10px;
                margin-bottom:10px;
                -webkit-box-shadow: 0 8px 6px -6px  #999;
                -moz-box-shadow: 0 8px 6px -6px  #999;
                box-shadow: 8px 10px 8px -6px #999;
            }

            .producttitle {
                font-weight:bold;
                padding:8px 0 8px 0;
        	font-size:1.8em;
            }

            .productprice {
                border-top:1px solid #dadada;
                padding-top:5px;
            }

            .pricetext {
                font-weight:bold;
                font-size:1.3em;
            }
      
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
    @import url(https://fonts.googleapis.com/css?family=Oswald:300,400);
    .snip1423 {
        font-family: 'Oswald', Arial, sans-serif;
        position: relative;
        float: left;
        margin: 20px;
        min-width: 230px;
        max-width: 315px;
        width: 100%;
        background: #ffffff;
        text-align: center;
        color: #000000;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        padding: 15px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
    }
    .snip1423 * {
        -webkit-box-sizing: padding-box;
        box-sizing: padding-box;
        -webkit-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
    }
    .snip1423 img {
        max-width: 100%;
        vertical-align: top;
        position: relative;
    }
    .snip1423 figcaption {
        padding: 20px 15px;
    }
    .snip1423 h3,
    .snip1423 p {
        margin: 0;
    }
    .snip1423 h3 {
        font-size: 1.3em;
        font-weight: 400;
        margin-bottom: 5px;
        text-transform: uppercase;
    }
    .snip1423 p {
        font-size: 0.9em;
        letter-spacing: 1px;
        font-weight: 300;
    }
    .snip1423 .price {
        font-weight: 500;
        font-size: 1.4em;
        line-height: 48px;
        letter-spacing: 1px;
    }
    .snip1423 .price s {
        margin-right: 5px;
        opacity: 0.5;
        font-size: 0.9em;
    }
    .snip1423 i {
        position: absolute;
        bottom: 0;
        left: 50%;
        -webkit-transform: translate(-50%, 50%);
        transform: translate(-50%, 50%);
        width: 56px;
        line-height: 56px;
        text-align: center;
        border-radius: 50%;
        background-color: #666666;
        color: #ffffff;
        font-size: 1.6em;
        border: 4px solid #ffffff;
    }
    .snip1423 a {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1;
    }
    .snip1423:hover,
    .snip1423.hover {
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
    }
    .snip1423:hover i,
    .snip1423.hover i {
        background-color: black;
    }
    /* Demo purposes only */
    body {
        background-color: white;
    }
</style>

<script>
    /* Demo purposes only */
    $(".hover").mouseleave(
            function () {
                $(this).removeClass("hover");
            }
    );
</script>
</head>

    <form method="post">
        <center>
          
    <?php   include('customeraccountheader.php'); ?>
            <div class="ag-subheader">

            <div class="media-wrapper">
                <div class="media-container media-header">
                    <div class="container-overlay">
                        <div class="bg-source bg-source--image" style="background-image: url('images/profile.jpg');background-size: cover">
                        </div>
                        <div class="bg-source img-overlay">
                        </div>
                    </div>
                    <div class="media-container-title txt-center">
                        <h1 class="txt-light">Photographers
                        </h1>
                    </div>
                </div>
            </div>


            <div class="ag-mask">
                <div class="skew-mask">
                </div>
            </div>

        </div>
            <input class="form-control" ID="myInput" type="text" placeholder="Search..." style="width: 70%;">
        </center>
    </form>
    <hr>
    <?php
    include_once 'connection.php';
    $q = "select * from photographerdata where Status='active' and Verification='approved'";
    $result = mysqli_query($c, $q);
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <?php
            while ($r = mysqli_fetch_assoc($result)) {
                ?>  
                <div id="myDiv">
                    <div class="col-md-3">
                        <figure class="snip1423">
                          <?php echo"<img class=' img-responsive'  src='ProfileImages/{$r['PImage']}'  alt='/'  style='max-width:430px;max-height:540px;width:100%;height:100%;background-size: center; min-height: 222px; min-weight: 177px'>" ?>
                            <figcaption>
                                                               
                                <p><?php echo $r['FirstName'] . " " . $r['LastName'] ?></p>
                                <h3 class="price" style="font-weight: bold;">
   
                                    <?php echo $r['City'] ?>
                                   
                                </h3>
                                <h3 class="price" style="font-weight: bold;" hidden="">
                                 
                                   
                                      <?php echo $r['Interest'] ?>
                                </h3>
                                
                                
                            </figcaption>
                            <i class="fa fa-angle-right"></i>
                            <a href="customerphotographerprofile.php?profile=<?php echo $r['Id'] ?>"></a>
                        </figure>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myDiv div").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<br/>
<br/>
 <?php
        include('footer.php');
        ?>
</html>
<?php } ?>

