<?php

require 'claviska/SimpleImage.php';

// Ignore notices
error_reporting(E_ALL & ~E_NOTICE);

try
{
    $image = new \claviska\SimpleImage();
    $n = 'images/bg3.jpg';
    $image
            ->fromFile($n)
            ->resize(430, 540)
            ->toFile('ProfileImages/bg3.jpg','image/png')
           ->toScreen();

    // Create a new SimpleImage object
    // Manipulate it
//  $image
//    ->fromFile('images/contest.jpg')              // load parrot.jpg
//    ->autoOrient()                        // adjust orientation based on exif data
//    ->bestFit(430, 540)                   // proportinoally resize to fit inside a 250x400 box
//    ->flip('x')                           // flip horizontally
//    ->colorize('DarkGreen')               // tint dark green
//    ->border('black', 5)                  // add a 5 pixel black border
//    ->overlay('flag.png', 'bottom right') // add a watermark image
//    ->toScreen();                         // output to the screen
} catch (Exception $err)
{
    // Handle errors
    echo $err->getMessage();
}
