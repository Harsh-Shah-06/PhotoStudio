
<div id="page_wrapper">
    <!-- Responsive menu start -->

    <ul class="cg__resMenu">
        <li class="cg__resMenu-back">
            <span class="cg__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="Photographer_Account.php#" class="cg__resMenu-backLink">Back</a>
        <li><a class="active" href="Photographer_Account.php"><span>Home</span></a></li>
        <li><a href="mybook.php"><span>My Book</span></a></li>
        <li><a href="PhotographerManageGallery.php"><span>Manage Gallery</span></a></li>
        <li><a href="PhotographerContest.php"><span>Contest</span></a></li>
        <li><a href="PhotographerChangedpassword.php"><span>Change Password</span></a></li>
        <li><a href="Pprofile.php"><span>Profile</span></a></li>

        <li> <a href="Logout.php"><span>Logout</span></a></li>                   

        </li>
    </ul>

    <!-- Responsive menu end -->

    <header id="header" class="site-header site-header--absolute">
        <div class="container siteheader-container large-container">
            <div class="fxb-col fxb-basis-auto">
                <div class="fxb-row site-header-row site-header-main ">
                    <!-- Logo column -->
                    <div class="fxb-col fxb fxb-start-x fxb-center-y fxb-basis-auto fxb-grow-0 fxb-sm-half ">
                        <div id="logo-container" class="logo-container">
                            <h1 class="site-logo logo " id="logo">
                                <a href="index.html" class="site-logo-anch">
                                    <!--<img class="logo-img site-logo-img" src="img-assets/logo.png" width="40" height="40" alt="Agency" title="Agency">--> 
                                </a>
                            </h1>
                        </div>
                    </div>
                    <!-- Right column with navigation -->
                    <div class="fxb-col fxb fxb-end-x fxb-center-y fxb-basis-auto fxb-sm-half site-header-col-right site-header-main-right">
                        <div class="fxb-col fxb fxb-end-x fxb-center-y fxb-basis-auto fxb-sm-half site-header-main-right-top">

                            <!-- menu trigger -->
                            <div class="sh-component menu-wrapper">

                                <div class="cg__menuWrapper">
                                    <div class="cg__mainMenu-trigger">
                                        <a href="index.html#" class="cg__menuBurger">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div><!--/.cg__mainMenu-trigger-->

                                    <ul class="cg__mainMenu clearfix">

                                        <li><a class="active" href="Photographer_Account.php"><span>Home</span></a></li>
                                        <li><a href="mybook.php"><span>My Book</span></a></li>
                                        <li><a href="PhotographerManageGallery.php"><span>Manage Gallery</span></a></li>
                                          <li><a href="PhotographerContest.php"><span>Contest</span></a></li>
                                        <li><a href="PhotographerChangedpassword.php"><span>Change Password</span></a></li>
                                        <li><a href="Pprofile.php" ><span>Profile</span></a>
                                        <li> <a href="Logout.php "><span>Logout</span></a></li>


                                    </ul><!--/.cg__mainMenu-->

                                </div><!--/.cg__menuWrapper-->

                            </div>

                        </div>
                    </div><!--end right column-->
                </div><!--end flex row-->
            </div>
        </div>
    </header>

    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="agency-slider" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.5.1 auto mode -->
        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.5.1">
            <ul>	<!-- SLIDE  -->
                <li data-index="rs-1" data-transition="slidevertical" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="images/slide01.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="images/slide01.jpg"  alt=""  data-lazyload="images/slide01.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption  "
                         id="slide-1-layer-1"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-40','-34','-24','-32']"
                         data-fontsize="['65','38','30','28']"
                         data-lineheight="['120','48','40','38']"
                         data-width="['none','none','640','360']"
                         data-height="none"
                         data-whitespace="['nowrap','nowrap','normal','normal']"

                         data-type="text"
                         data-responsive_offset="off"
                         data-responsive="off"
                         data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:50px(R);opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}]'
                         data-textAlign="['center','center','center','center']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 5; white-space: nowrap; font-size: 65px; line-height: 120px; font-weight: 700; color: rgba(255,255,255,1);font-family:Montserrat;">Moment Photo Studio </br><hr><h2>Welcome <?php echo $f . $l?></h2></div>
                         
     

                    <!-- SLIDE  -->
                <li data-index="rs-2" data-transition="slidevertical" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="images/kallyas_placeholder-100x50.png"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="images/slide02.jpg"  alt=""  data-lazyload="images/slide02.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption  "
                         id="slide-2-layer-1"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-54','-34','-24','-32']"
                         data-fontsize="['65','38','30','28']"
                         data-lineheight="['72','48','40','38']"
                         data-width="['none','none','640','360']"
                         data-height="none"
                         data-whitespace="['nowrap','nowrap','normal','normal']"

                         data-type="text"
                         data-responsive_offset="off"
                         data-responsive="off"
                         data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:50px(R);opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}]'
                         data-textAlign="['center','center','center','center']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 5; white-space: nowrap; font-size: 65px; line-height: 72px; font-weight: 700; color: rgba(255,255,255,1);font-family:Montserrat;">We Capture Priceless<br>
                        Moment </div>

                    <!-- LAYER NR. 4 -->
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	</div>
    </div><!-- END REVOLUTION SLIDER -->



