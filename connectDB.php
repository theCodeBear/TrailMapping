<?php
## Script to connect to database for TrailMaps website ##


error_reporting(E_ALL);


$servHost = "localhost";
$servUsername = "root"; //"toddwnov_tkrone";
$servPassword = "ThirdBase1!#";
$servDBname = "TrailMaps";//"toddwnov_TrailMaps";


# connect to mysql server for toddkronenberg.com
$con = mysqli_connect($servHost, $servUsername/*, $servPassword*/) or die("Could not connect to MySQL.");

# connect to the TrailMaps database on the server
mysqli_select_db($con, $servDBname) or die("Can't connect to the database.");


?>