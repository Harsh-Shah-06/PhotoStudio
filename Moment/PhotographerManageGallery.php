<?php
include 'connection.php';


session_start();
if (!isset($_SESSION['email']))
{
    header('Location:login.php');
} else
{
    $e = $_SESSION['email'];

    $i = "";
    $q = "select Id from photographerdata where Email='$e'";
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
            <link href="editgallery.css" rel="stylesheet" type="text/css"/>

            <!-- Main gallery stylesheet -->    
            <link href="css/gallerycss/gallerykube.css" rel="stylesheet" type="text/css"/>
            <link href="css/gallerycss/gallerystyle.css" rel="stylesheet" type="text/css"/>
            <link href="css/gallerycss/galleryswipebox.css" rel="stylesheet" type="text/css"/>

            <style>
                .hr{
                    border:solid black 2px;
                }
                .switch{
                    position: relative;
                    display: inline-block;
                    width: 60px;
                    height: 34px;
                }
                .switchslider {
                    position: absolute;
                    cursor: pointer;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background-color: #ccc;
                    -webkit-transition: .4s;
                    transition: .4s;
                }

                .switchslider:before {
                    position: absolute;
                    content: "";
                    height: 26px;
                    width: 26px;
                    left: 4px;
                    bottom: 4px;
                    background-color: white;
                    -webkit-transition: .4s;
                    transition: .4s;
                }

                input:checked+.switchslider {
                    background-color: #2196F3;
                }

                input:focus+.switchslider {
                    box-shadow: 0 0 1px #2196F3;
                }

                input:checked+.switchslider:before {
                    -webkit-transform: translateX(26px);
                    -ms-transform: translateX(26px);
                    transform: translateX(26px);
                }


                /* Rounded sliders */

                .switchslider.round {
                    border-radius: 34px;
                }

                .switchslider.round:before {
                    border-radius: 50%;
                }

                .checkbox_switch{
                    margin-left: auto;
                    margin-right: auto;
                }
                #add{
                      transition: 0.5s;
                      display: none;
                      border: 1px solid;
                      padding: 15px
                }
                #add:hover{
                    border-radius: 15px;
                    transition: 0.5s;
                   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                   background: #ffff;
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
                            <div class="bg-source bg-source--image" style="background-image: url('images/h10.jpg');background-size: cover">
                            </div>
                            <div class="bg-source img-overlay">
                            </div>
                        </div>
                        <div class="media-container-title txt-center">
                            <h1 class="txt-light">Manage Gallery
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

            <section class="photobooth_grid_gallery photobooth_masonry_gallery">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-12 photobooth_content">
                            <div class="photobooth_masonry_gallery_element">
                                <div class="photobooth_isotope">
                                    <div class="grid1" >

                                        <?php
                                        include_once 'connection.php';
                                        $q = "select * from photographerimage where PhotographerId='$i'";
                                        $result = mysqli_query($c, $q);

                                        while ($r = mysqli_fetch_array($result))
                                        {
                                            ?>

                                            <div class="grid-item grid-item--width2" >

                                                <?php echo"<a  href='PhotographerImage/{$r['Path']}'  class='swipebox'  >" ?>

                                                <div class="photobooth_grayscale_img" >

                                                    <?php echo "<img src='PhotographerImage/{$r['Path']}'  alt title='portfolio{$r['ImageId']}'  name='{$r['ImageId']}' Id='{$r['ImageId']}' >" ?>
                                                </div>
                                                <?php echo "</a>" ?>	
                                                <br>
                                                <div class="checkbox_switch">
                                                    <label class="switch">
                                                        <input type="checkbox" type="checkbox" name='cb<?php echo $r[0] ?>' id="enable">
                                                        <span class="switchslider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                        <?php } ?>


                                    </div>
                                </div>	


                             

                                <script>
                                    $(document).ready(function () {
                                        $('#btnadd').click(function () {
                                            $('#add').show();
                                        });
                                        $('#btnclose').click(function () {
                                            $('#add').hide();
                                        });
                                    });
                                </script>


                                <div class="ebox">
                                    <a class="ebutton" id="btnadd"  href="#popup1">Add</a>
                                    <input  type="submit" class="ebutton"  name="btn_submit" value="Delete" >
                                </div>
                                <?php
                                if (isset($_POST['btn_submit']))
                                {
                                    $q = "select * from photographerimage";
                                    $result1 = mysqli_query($c, $q);

                                    while ($r = mysqli_fetch_array($result1))
                                    {
                                        if (isset($_POST["cb$r[0]"]))
                                        {

                                            $result = mysqli_query($c, "delete from photographerimage where ImageId=$r[0]");
                                        }
                                    }
                                }
                                ?>


                                <div id="add"  class="container">
                                    <a class="btn btn-danger float-right" id="btnclose"  >&times;</a>
                                    <div class="econtent">
                                        <h3>Images</h3>
                                        <input type="file" name="img" >
                                        <br><br>
                                        <Input type="submit" name="btn_add" value="Add">
                                        <?php
                                        if (isset($_POST['btn_add']))
                                        {
                                            if (isset($_FILES['img']['name']))
                                            {
                                                $name = $_FILES['img']['name'];
                                                $tmp_name = $_FILES['img']['tmp_name'];
                                                $error = $_FILES['img']['error'];

                                                if (!empty($name))
                                                {
                                                    $location = 'PhotographerImage/';

                                                    if (move_uploaded_file($tmp_name, $location . $name))
                                                    {
                                                        
                                                    }
                                                }
                                            }
                                            $q = "select Id from photographerdata where Email='$e' ";
                                            $result2 = mysqli_query($c, $q) or die("error1");
                                            while ($r = mysqli_fetch_assoc($result2))
                                            {
                                                $pid = $r['Id'];
                                            }


                                            $q = "insert into photographerimage values('','$name',$pid)";
                                            $result1 = mysqli_query($c, $q) or die("error");
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </form>

            </section>

            <?php
            include 'footer.php';
            ?>
            <script src="js/gallery/owl.carousel.min.js" type="text/javascript"></script>
            <script src="js/gallery/imagesloaded.pkgd.min.js" type="text/javascript"></script>
            <script src="js/gallery/isotope.pkgd.min.js" type="text/javascript"></script>   
        <!--<script src="http://pixel-mafia.com/demo/html-templates/photobooth/js/jquery.swipebox.js"></script>--> 	
            <script src="js/gallery/swipebox.js" type="text/javascript"></script>
            <script src="js/gallery/index.js" type="text/javascript"></script>

        </body>
    </html>

<?php } ?>

