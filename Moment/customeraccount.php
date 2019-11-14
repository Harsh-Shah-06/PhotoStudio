<?php
session_start();
if(!isset($_SESSION['email']))
{
    header('Location:login.php');
}
else
{
    $e= $_SESSION['email'];
     include 'connection.php';
    $q="select FirstName,LastName from userdata where Email='$e'";
    $r=mysqli_query($c,$q);
    while($result= mysqli_fetch_assoc($r))
    {
        $f=$result['FirstName'];
        $l=$result['LastName'];
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
        <title >Customer Account</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="addons/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
         <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>

        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="addons/Magnific-Popup/magnific-popup.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/plugins/jquery-3.2.1.min.js"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="addons/revolution/css/settings.css">

        <!-- REVOLUTION JS FILES -->
        <script src="addons/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="addons/revolution/js/jquery.themepunch.revolution.min.js"></script>


        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
        <script src="addons/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script>function setREVStartSize(e) {
                try {
                    var i = jQuery(window).width(), t = 9999, r = 0, n = 0, l = 0, f = 0, s = 0, h = 0;
                    if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                        var u = (e.c.width(), jQuery(window).height());
                        if (void 0 != e.fullScreenOffsetContainer) {
                            var c = e.fullScreenOffsetContainer.split(",");
                            if (c)
                                jQuery.each(c, function (e, i) {
                                    u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                                }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                        }
                        f = u
                    } else
                        void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                    e.c.closest(".rev_slider_wrapper").css({height: f})
                } catch (d) {
                    console.log("Failure at Presize of Slider:" + d)
                }
            }
            ;</script>

        <style>.text {
                color: white;
                font-size: 20px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center;
            }</style>

    </head>

    <body><section><?php include('customeraccountheader.php'); ?>
        </section>


        <!-- start fancy section -->
        <section class="ag-about-section small-section"  >

            <div class="row">
                <div class="col-sm-12">
                    <div class="ag-about pl-90 pr-90 pt-60 fancy-background" >
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="title-block">
                                    <h4 class="title-block__subtitle txt-light-transparent txt-thin">What We Do</h4>
                                    <h2 class="txt-large txt-light">We do things differently</h2>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="quote-wrapper">
                                    <div class="bl-quote">
                                        <p class="bl-quote__title transparent-light">We are collaborated with photographer and provide best option to you.We always stand for the best possibility's and try to make you happy. At the last we are one family's. 
                                        </p>
                                    </div>
                                    <div class="row home-page-first ">
                                        <div class="col-md-4 col-sm-12">
                                            <!--ICON BOX STYLE 1-->
                                            <div class="ag-iconbox ag-iconbox--style1 clearfix">
                                                <div class="ag-iconbox__icon-wrapper">
                                                    <span class="ag-iconbox__icon fa fa-camera-retro"></span>
                                                </div>
                                                <div class="ag-iconbox__content-wrapper">

                                                    <h3 class="ag-iconbox__title txt-light">
                                                        Photography
                                                    </h3>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="ag-iconbox ag-iconbox--style1 clearfix">
                                                <div class="ag-iconbox__icon-wrapper">
                                                    <span class="ag-iconbox__icon glyphicon glyphicon-send"></span>
                                                </div>
                                                <div class="ag-iconbox__content-wrapper">

                                                    <h3 class="ag-iconbox__title txt-light">
                                                        Photo Selling
                                                    </h3>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="ag-iconbox ag-iconbox--style1 clearfix">
                                                <div class="ag-iconbox__icon-wrapper">
                                                    <span class="ag-iconbox__icon glyphicon glyphicon-usd"></span>
                                                </div>
                                                <div class="ag-iconbox__content-wrapper">

                                                    <h3 class="ag-iconbox__title txt-light">
                                                        Contest
                                                    </h3>


                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- END quote wrapper-->
                            </div>
                        </div>
                    </div>
                    <div class="ag-mask">
                        <div class="skew-mask">
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <br>
        <!--section gallery-->
       <?php //include 'homegallery.php' ?>

        <!--iconbox style2 section-->
        <section class="sidermargins pb-100 pt-100 color-overlay--dark">
            <div class="container large-container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-block pb-80">
                            <h4 class="title-block__subtitle txt-light-transparent ">OUR CAPABILITIES  TYPES</h4>
                            <h2 class="title-block__title txt-light">What we'll do in photography</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="column-wrapper--left">
                            <div class="ag-iconbox ag-iconbox--style2">
                                <div class="ag-iconbox__icon-wrapper">
                                    <span class="ag-iconbox__icon fa fa-institution"></span>
                                </div>
                                <div class="ag-iconbox__content-wrapper">
                                    <h3 class="ag-iconbox__title txt-light">
                                        Architecture
                                    </h3>
                                    <p class="ag-iconbox__desc">Architectural photography is the photographing of buildings and similar structures that are both aesthetically pleasing and accurate representations of their subjects.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="column-wrapper--left">
                            <div class="ag-iconbox ag-iconbox--style2">
                                <div class="ag-iconbox__icon-wrapper">
                                    <span class="ag-iconbox__icon fa fa-heartbeat"></span>
                                </div>
                                <div class="ag-iconbox__content-wrapper">
                                    <h3 class="ag-iconbox__title txt-light">
                                        Wedding
                                    </h3>

                                    <p class="ag-iconbox__desc">Wedding photography is the photography of activities relating to weddings. It encompasses photographs of the couple before marriage  as well as coverage of the wedding and reception.</p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="column-wrapper--left">
                            <div class="ag-iconbox ag-iconbox--style2">
                                <div class="ag-iconbox__icon-wrapper">
                                    <span class="ag-iconbox__icon fa fa-group"></span>
                                </div>
                                <div class="ag-iconbox__content-wrapper">

                                    <h3 class="ag-iconbox__title txt-light">
                                        Event
                                    </h3>
                                    <p class="ag-iconbox__desc">Event photography is the practice of photographing guests and occurrences at any Event or occasion where one may hire a photographer for.</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- START second row of icons-->
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="column-wrapper--left">
                            <div class="ag-iconbox ag-iconbox--style2">
                                <div class="ag-iconbox__icon-wrapper">
                                    <span class="ag-iconbox__icon glyphicon glyphicon-plane"></span>
                                </div>
                                <div class="ag-iconbox__content-wrapper">
                                    <h3 class="ag-iconbox__title txt-light">
                                        Travel
                                    </h3>
                                    <p class="ag-iconbox__desc">Travel photography is a genre of photography that may involve the documentation of an area's landscape, people, cultures, customs and history.Much of today's Travel Photography style is derived from early work in Magazines.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="column-wrapper--left">
                            <div class="ag-iconbox ag-iconbox--style2">
                                <div class="ag-iconbox__icon-wrapper">
                                    <span class="ag-iconbox__icon glyphicon glyphicon-gift"></span>
                                </div>
                                <div class="ag-iconbox__content-wrapper">
                                    <h3 class="ag-iconbox__title txt-light">
                                        Festival
                                    </h3>
                                    <p class="ag-iconbox__desc">Festival photography is a genre of photography that may involve the happiness of  people's.It includes music,happiness,freedom of people and bring the smile on people's face. </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="column-wrapper--left">
                            <div class="ag-iconbox ag-iconbox--style2">
                                <div class="ag-iconbox__icon-wrapper">
                                    <span class="ag-iconbox__icon glyphicon glyphicon-leaf"></span>
                                </div>
                                <div class="ag-iconbox__content-wrapper">
                                    <h3 class="ag-iconbox__title txt-light">
                                        Wildlife
                                    </h3>
                                    <p class="ag-iconbox__desc">Wildlife photography is a loosely-defined profession which demands a passion for nature and art. Wildlife photographers make a career of traveling to remote areas and taking pictures of wild animals and natural scenery.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="column-wrapper--left">
                            <div class="ag-iconbox ag-iconbox--style2">
                                <div class="ag-iconbox__icon-wrapper">
                                    <span class="ag-iconbox__icon fa fa-cutlery"></span>
                                </div>
                                <div class="ag-iconbox__content-wrapper">
                                    <h3 class="ag-iconbox__title txt-light">
                                        Food
                                    </h3>
                                    <p class="ag-iconbox__desc">Food photography is a still life photography genre used to create attractive still life photographs of food. It is a specialization of commercial photography, the products of which are used in advertisements, magazines, packaging, menus or cookbooks.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="column-wrapper--left">
                            <div class="ag-iconbox ag-iconbox--style2">
                                <div class="ag-iconbox__icon-wrapper">
                                    <span class="ag-iconbox__icon 	fa fa-male"></span>
                                </div>
                                <div class="ag-iconbox__content-wrapper">
                                    <h3 class="ag-iconbox__title txt-light">
                                        Model Photo Shoot
                                    </h3>
                                    <p class="ag-iconbox__desc">A model photo shoot is an occasion when a photographer takes pictures, especially of models or famous people, to be used in a newspaper or magazine.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="column-wrapper--left">
                            <div class="ag-iconbox ag-iconbox--style2">
                                <div class="ag-iconbox__icon-wrapper">
                                    <span class="ag-iconbox__icon fa fa-shopping-bag"></span>
                                </div>
                                <div class="ag-iconbox__content-wrapper">
                                    <h3 class="ag-iconbox__title txt-light">
                                        Product
                                    </h3>
                                    <p class="ag-iconbox__desc">Product photography is a branch of commercial photography which is about accurately but attractively representing a product. The principal application of product photography is in product catalogues and brochures, with a proportion of product images also being used in advertising.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row of icons-->

            </div><!--end container-->

        </section>

    </div>
</section>
<!--call to action section-->
<section class="sidermargins color-overlay--grey pb-80 pt-80">

    <div class="container large-container">
        <div class="row">
            <div class="col-md-9 col-sm-9 ">
                <div class="column-wrapper--left">
                    <div class="bl-quote call-to-action ">
                        <h2 class="call-to-action__subtitle">Let's make something great together.</h2>
                        <p class="call-to-action__title">Get in touch with us.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<?php
include 'footer.php';
?>



</div><!-- /.#page_wrapper -->

<a href="index.php" class="totop">TOP</a> <!--/.totop -->


<!--Revolution slider script-->

<script data-cfasync="false" src="../cdn-cgi/scripts/af2821b0/cloudflare-static/email-decode.min.js"></script><script>
            var revapi1,
                    tpj = jQuery;
              $(document).ready(function () {
                //console.log("document loaded");
            });

//            $(window).on("load", function () {
//                 swal('Welcome','<?php echo $e ?>','success');
//            });
            tpj(document).ready(function () {
                if (tpj("#rev_slider_1_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_1_1");
                } else {
                    revapi1 = tpj("#rev_slider_1_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "addons/assets/js/",
                        sliderLayout: "auto",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "off",
                            bullets: {
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 1100,
                                style: "uranus",
                                hide_onleave: false,
                                direction: "vertical",
                                container: "layergrid",
                                h_align: "right",
                                v_align: "center",
                                h_offset: 50,
                                v_offset: 0,
                                space: 5,
                                tmp: '<span class="tp-bullet-inner"></span>'
                            }
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: [1600, 1024, 778, 480],
                        gridheight: [868, 768, 960, 720],
                        lazyType: "smart",
                        parallax: {
                            type: "scroll",
                            origo: "slidercenter",
                            speed: 400,
                            speedbg: 0,
                            speedls: 0,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                        },
                        shadow: 0,
                        spinner: "spinner2",
                        stopLoop: "on",
                        stopAfterLoops: 0,
                        stopAtSlide: 1,
                        shuffle: "off",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }

            });	/*ready*/
</script>



<script src="js/plugins/bootstrap.min.js"></script>

<!--isotope script-->
<script src="addons/isotope/isotope.pkgd.min.js"></script>
<script src="addons/imagesloaded.pkgd.min.js"></script>
<!--popup script-->
<script src="addons/Magnific-Popup/jquery.magnific-popup.js"></script>
<!--count script-->
<script src="addons/jquery.countTo.js"></script>
<!-- Main template script -->
<script src="js/script.js"></script>

</body>
</html>
<?php }?>