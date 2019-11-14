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
        <title>Gallery</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
                <link href="css/icomoon.css" rel="stylesheet">
                <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
     
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <!-- Main gallery stylesheet -->    
        <link href="css/gallerycss/gallerykube.css" rel="stylesheet" type="text/css"/>
        <link href="css/gallerycss/gallerystyle.css" rel="stylesheet" type="text/css"/>
        <link href="css/gallerycss/galleryswipebox.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <?php
        include('header.php');
        ?>

        <!--subheader-->
        <div class="ag-subheader">

            <div class="media-wrapper">
                <div class="media-container media-header">
                    <div class="container-overlay">
                        <div class="bg-source bg-source--image " style="background-image: url('images/gallery.jpg');background-size: cover">
                        </div>
                        <div class="bg-source img-overlay">
                        </div>
                    </div>
                    <div class="media-container-title txt-center">
                        <h1 class="txt-light " >Gallery
                        </h1>
                    </div>
                </div>
            </div>


            <div class="ag-mask">
                <div class="skew-mask">
                </div>
            </div>
        </div>
        <!--end subheader-->

        <!--titleblock section-->
        <section class="photobooth_grid_gallery photobooth_masonry_gallery">
            <div class="row">
                <div class="col col-12 photobooth_content">
                    <div class="photobooth_masonry_gallery_element">
                        <div class="photobooth_isotope">
                            <div class="grid1">
                                <?php
                                include_once 'connection.php';
                                $q = "select * from maingallery";
                                $result = mysqli_query($c, $q);

                                while ($r = mysqli_fetch_assoc($result)) {
                                    ?>

                                    <div class="grid-item grid-item--width2">
                                        <?php echo"<a href='../admin2/Admin/img/main/{$r['Path']}'  class='swipebox'  >" ?>
                                        <div class="photobooth_grayscale_img">	
                                            <?php echo "<img src='../admin2/Admin/img/main/{$r['Path']}'  alt title='portfolio1' >" ?>
                                            
                                        </div>
                                        <?php echo "</a>" ?>				
                                    </div>
                                <?php } ?>
                            </div>
                        </div>	

<!--                        <a class="grid_load_more photobooth_load_more photobooth_button" href="javascript:void(0)">Load More</a>-->
                    </div>

                </div> 
            </div>

        </section>

        <?php
        include('footer.php');
        ?>
    </div><!-- /.#page_wrapper -->

    <script src="js/gallery/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/gallery/imagesloaded.pkgd.min.js" type="text/javascript"></script>
        <script src="js/gallery/isotope.pkgd.min.js" type="text/javascript"></script>   
<!--<script src="http://pixel-mafia.com/demo/html-templates/photobooth/js/jquery.swipebox.js"></script>--> 	
        <script src="js/gallery/swipebox.js" type="text/javascript"></script>
        <script src="js/gallery/index.js" type="text/javascript"></script>
        
    </body>
</html>
