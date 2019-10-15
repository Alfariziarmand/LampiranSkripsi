<?php

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

require 'dbconfig.php';


//Creating Array for JSON response
// $response = array();
 
// Check if we got the field from the user
// if (isset($_GET['temp']) && isset($_GET['hum'])) {

if (isset($_GET['xlen']) && isset($_GET['ylen'])) {
 
 
    $xlen = $_GET['xlen'];
    $ylen = $_GET['ylen'];
    // $hum = $_GET['hum'];
 
    // Include data base connect class
    // $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
    $clear = mysqli_query($mysqli, "DELETE FROM maintable");
    
    // Fire SQL query to delete table in maintable
    
    $y = 1;
    // $id = 1;
    while ($y <= $ylen) {
        $x = 1;
        while ($x <= $xlen) {
            $result = mysqli_query($mysqli,"INSERT INTO maintable(value, nox, noy) VALUES(0,$x,$y)");
            $x++;
        }
       $y++;

    }
} 
header("Location: https://myluxmeter.000webhostapp.com/myapp/grid-plot.php"); 
exit; 
?>
