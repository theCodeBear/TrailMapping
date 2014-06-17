<?php

## Uploads the image to the website directory on localhost. Calls file to record GPS of image ##


include 'getGPS.php';
error_reporting(E_ALL);

// image file validation
$imgSizeArray = getimagesize($_FILES['uploadphoto']['tmp_name']);
if ($imgSizeArray['mime'] != "image/jpeg")
    die("error: your file was not an appropriate format (jpeg)");

# remove any spaces from profile photo file name
$_FILES["uploadphoto"]["name"] = str_replace(' ', '_', $_FILES["uploadphoto"]["name"]);

// creating relative filepath
// $filepath = "/home/toddwnov/public_html/TrailMaps/" . $_FILES['uploadphoto']['name'];
$filepath = "/Users/tkrone/Pictures/TestFolderForWebsitePictures/" . $_FILES['uploadphoto']['name'];

// Gets the GPS coordinates from the EXIF data of the photo. This must execute before the file
// is moved in the code below or else some of the EXIF data is stripped, including GPS coordinates.
$latLon = returnGPS($_FILES['uploadphoto']['tmp_name']);
$gps['lat'] = $latLon[0];
$gps['lon'] = $latLon[1];


// saving file to location on localhost
if (file_exists($filepath))
    echo $_FILES['uploadphoto']['name'] . " already exists.";
else {
    move_uploaded_file($_FILES['uploadphoto']['tmp_name'], $filepath);
    $imgSizeArray = getimagesize($filepath);
    list($width, $height) = getimagesize($filepath);
    $trueC = imagecreatetrueColor($width, $height);
    $image = imagecreatefromjpeg($filepath);
    imagecopyresampled($trueC, $image, 0,0,0,0,$width,$height,$width,$height);
    imagejpeg($trueC, $filepath, 50);
}

print_r($gps);

// header("location:index.php");

?>