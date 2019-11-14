
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
          <!-- Animation -->
        
        <!-- CSS assets -->
         <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->

        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <!--category stylesheets-->
        <link rel="stylesheet" href="css/categorystyle.css" />

        <style>

        </style>
    </head>

    <body>
        <?php
        include('header.php');
        ?>
        <div class="ag-subheader">

            <div class="media-wrapper">
                <div class="media-container media-header">
                    <div class="container-overlay">
                        <div class="bg-source bg-source--image " style="background-image: url('images/category.jpg');background-size: cover">
                        </div>
                        <div class="bg-source img-overlay">
                        </div>
                    </div>
                    <div class="media-container-title txt-center">
                        <h1 class="txt-light ">Category
                        </h1>
                    </div>
                </div>
            </div>


            <div class="ag-mask">
                <div class="skew-mask">
                </div>
            </div>
        </div><!--end subheader-->

        <?php
        include 'categorybox.php';
        ?>
        <?php
        include('footer.php');
        ?>

    </div><!-- /.#page_wrapper -->
</body>
</html>

