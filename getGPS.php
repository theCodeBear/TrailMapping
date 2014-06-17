<?php

## Extracts and returns GPS coordinates for a picture that has that data in its EXIF ##

# Takes the temporary file that has been uploaded through an HTML form ($_FILES['inputName']['tmp_name']).
# Returns an array of {lat, long}.
function returnGPS($file) {
    $exif = exif_read_data($file,0,true);       // note: if you take out "0,true", you have to take out ['GPS'] below

    // # WANT TO USE AJAX FOR THIS
    // $gps=false;
    // foreach($exif as $key => $section) {
    //     foreach($section as $name => $val) {
    //         // echo "$key.$name: $val<br>";
    //         if ($name=="GPSLongitude" || $name=="GPSLatitude") {
    //             // print_r($val);
    //             // echo "<br>";
    //             $gps=true;
    //         }
    //     }
    // }
    // echo $gps==true ? "true" : "false";

    // exit;
    
    $lon = getGps($exif['GPS']["GPSLongitude"], $exif['GPS']['GPSLongitudeRef']) or die("No GPS data");
    $lat = getGps($exif['GPS']["GPSLatitude"], $exif['GPS']['GPSLatitudeRef']);
    return array($lat, $lon);
}


function getGps($exifCoord, $hemi) {
    $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
    $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
    $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;

    $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;
    return $flip * ($degrees + $minutes / 60 + $seconds / 3600);
}


function gps2Num($coordPart) {
    $parts = explode('/', $coordPart);
    if (count($parts) <= 0)
        return 0;
    if (count($parts) == 1)
        return $parts[0];
    return floatval($parts[0]) / floatval($parts[1]);
}

# just some extra code that displays the exif data. I don't need this though.
// foreach($exif as $key => $section) {
//     foreach($section as $name => $val)
//         echo "$key.$name: $val<br>";
// }
// var_dump($exif);

?>