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
		<title >Dynamic Gallery</title>
                <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">

               
    <!-- Fonts -->
  	<link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="addons/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
		  <!-- Icons -->
    <link href="css/icomoon.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="fonts/icomoon/style.css">
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
		<script>function setREVStartSize(e){
				try{ var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
					if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
				}catch(d){console.log("Failure at Presize of Slider:"+d)}
			};</script>
                
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
    <body>

        <section class="sidermargins pb-160 sec-portfolio" style="margin-top:10px;">
            <div class="container large-container large-container_grid">
                <div class="row">
                    <div class="grid ag-gridGallery-jstrigger " data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
                        <?php
                        $c = mysqli_connect('localhost', 'root', "", 'moment') or die("Connection failed");
                        $q = "select * from image";
                        $result = mysqli_query($c, $q);

                        while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                         
                                <div class="row">
                                        <div class="grid-item grid-item--width2 gallery-item">
                                            <div class="grid-item-wrapper">
                                                <?php echo"<a class='portfolio-link'  href='{$r['Path']}'></a>" ?>
                                                <div class="ag-gridGallery__img-container">
                                                    <?php echo "<img src='{$r['Path']}'  alt title='portfolio1' style='background-size: auto'>" ?>
                                                </div>
                                                <div class="portfolio-overlay">
                                                    <h4 class="text"><?php echo $r['Type'] ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                        
                        <?php } ?>
                    </div> 
                </div> <!--end row-->


        </section>

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
