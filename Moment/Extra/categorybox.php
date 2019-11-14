<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

         <div class="container section-sly-slider">
                           <div class="row">
                              <div class="section-sly-slider">
                                 <div id="services">
                                    <div class="slidee">
                                        <?php 
                                           
                                        $c = mysqli_connect('localhost', 'root', "", 'moment') or die("Connection failed");
                                        $q = "select * from category";
                                        $result = mysqli_query($c, $q);
                                         
                                        while ($r = mysqli_fetch_assoc($result)) {
                                            ?>
                                           
                                           <div class="col-xs-12 col-sm-6 col-md-6">
                                              <div class="section-features-column-block">
                                                 <div class="features-column-icon">
                                                   <i class="fa <?php echo $r['icon'] ?>"></i>
                                                 </div>
                                                 <h2 class="features-column-title">
                                                                    <?php echo $r['catname'] ?>
                                                 </h2>
                                                 <div class="features-column-text">
                                                                    <?php echo $r['catdesc'] ?>
                                                 </div>
                                                  
                                                 <a href="#" class="btn btn-primary">
                                                 Detail
                                                 </a>
                                              </div>
                                           </div>
<?php } ?>

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
 
   
