<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
$response = array();
 
// Check if we got the field from the user

if (isset($_GET['lux_1'])) {
 
 
    $lux = $_GET['lux_1'];
   
    // $hum = $_GET['hum'];
 
    // Include data base connect class($filepath."/db_connect.php");
    require 'dbconfig.php';
 	
    // Connecting to database 
    $sql = "INSERT INTO `luxindoor` (`lux`, `date`) VALUES ('$lux', DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 7 hour))";
    
    // Fire SQL query to insert data in weather
    $result = mysqli_query($mysqli,$sql);
    
 
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = "Lux Indoor Successfully Created.";
 
        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
 
        // Show JSON response
        echo json_encode($response);
    }
}
elseif (isset($_GET['lux_2'])) {
 
 
    $lux = $_GET['lux_2'];
    // $hum = $_GET['hum'];
   
    // Include data base connect class($filepath."/db_connect.php");
    require 'dbconfig.php';
 	
    // Connecting to database 
 
    $sql = "INSERT INTO `luxoutdoor` (`lux`, `date`) VALUES ('$lux', DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 7 hour))";
    // Fire SQL query to insert data in weather
    $result = mysqli_query($mysqli,$sql);
    
 
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = "Lux Outdoor Successfully Created.";
 
        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // Show JSON response
    echo json_encode($response);
}
?>