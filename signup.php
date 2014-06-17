<?php

## Script for TrailMaps website to handle user sign up form and create user in database ##



error_reporting(E_ALL);

include 'connectDB.php';


# NEED TO VALIDATE USER INPUT (email and password)



$query = "SELECT Email FROM UserInfo WHERE Email='$_POST[email]'";
$sql = mysqli_query($con, $query);
$row = mysqli_fetch_array($sql);

if ($row) {
    exit("taken");
    // exit;
}

# INSERT USER REGISTRATION DATA INTO DATABASE
$encryptPword = md5($_POST['pword']);
$date = date("Y/m/d");  # mysql only takes dates in this order: year, month, day
$insert = "INSERT INTO UserInfo (Email, Password, Registration_Date) VALUES ('$_POST[email]', '$encryptPword', '$date')";
$query = mysqli_query($con, $insert);




# CLOSE MYSQL CONNECTION
mysqli_close($con);


# REDIRECT USER TO EMAIL VERIFICATION NOTICE PAGE
// header("location:emailVerify.html");



?>