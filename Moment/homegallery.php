<?php  include  'connection.php';?>
<section class="sidermargins pb-160 sec-portfolio"  >
    <div class="container large-container large-container_grid">
        <div class="row">
            <div class="grid ag-gridGallery-jstrigger " data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
                <?php

               
                $q = "select * from hgallery";
                $result = mysqli_query($c, $q);

                while ($r = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="row" >
                        <div class="grid-item grid-item--width2 gallery-item ">
                            <div class="grid-item-wrapper wow rollIn">
                                
                                <?php echo"<a class='portfolio-link'  href='../admin2/Admin/img/home/{$r['Path']}'></a>";?>
                                
                                <div class="ag-gridGallery__img-container">
                                    <?php echo "<img src='../admin2/Admin/img/home/{$r['Path']}'  alt title='portfolio1' style='background-size: auto'>" ?>
                                   
                                </div>
                                <div class="portfolio-overlay">
                                   <h4 class="text"><?php echo $r['Type'] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php } ?>
                
            </div>
            <div class="ag-vertical-separator">
            </div>
            <div class="txt-center">
                <a href="gallery.php" class="ag_btn btn btn-lg btn-lined lined-dark btn--square call-to-action--btn ">See Gallery</a>
            </div>
            <!--                                     START SEPARATOR-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="ag-separator">
                    </div>
                </div>

            </div> 
        </div> <!--end row-->


</section>

