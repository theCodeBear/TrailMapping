<?php

## Script for TrailMaps website to test whether an image has GPS data recorded ##
## Called from the "About" section ##

require 'getGPS.php';
error_reporting(E_ALL);


# Image File validation:
$imgSizeArray = getimagesize($_FILES['testphoto']['tmp_name']);
if ($imgSizeArray['mime'] != "image/jpeg")
    die("error: your file was not of an appropriate format (jpg or png)");

# Accessing photo EXIF data
$exif = exif_read_data($_FILES['testphoto']['tmp_name'],0,true);       // note: if you take out "0,true", you have to take out ['GPS'] below

# Discerning whether or not there is GPS data in the EXIF data
$gps=false;
foreach($exif as $key => $section) {
    foreach($section as $name => $val) {
        // echo "$key.$name: $val<br>";
        if ($name=="GPSLongitude" || $name=="GPSLatitude") {
            // print_r($val);
            // echo "<br>";
            $gps=true;
        }
    }
}

$url = "location:index.php?gps=";
if ($gps==true)
    $url = $url . "true";
else
    $url = $url . "false";

header($url);



?>