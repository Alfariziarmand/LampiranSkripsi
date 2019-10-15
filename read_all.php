<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


//Creating Array for JSON response
$response = array();
//---------dbconfig.php include connect DB----------
require 'dbconfig.php';

$sql = "SELECT * FROM luxindoor ORDER BY id DESC LIMIT 1";
$result = mysqli_query($mysqli,$sql);
// Check for succesfull execution of query and no results found
if (mysqli_num_rows($result) > 0) {
    
// 	// Storing the returned array in response
    $response["luxindoor"] = array();
 
// 	// While loop to store all the returned response in variable
    while ($row = mysqli_fetch_array($result)) {
//         // temperoary user array
        $temp = array();
        $temp["lux"] = $row["lux"];
        $temp["date"]= $row["date"];
//         $weather["lux"] = $row["lux"];
// 		// $weather["hum"] = $row["hum"];

// 		// Push all the items 
        array_push($response["luxindoor"], $temp);
    }
//     // On success
    //$response["success"] = 1;
 
//     // Show JSON response
    //echo json_encode($response);
}	
$sql = "SELECT * FROM luxoutdoor ORDER BY id DESC LIMIT 1";
$result = mysqli_query($mysqli,$sql);
// Check for succesfull execution of query and no results found
if (mysqli_num_rows($result) > 0) {
    
// 	// Storing the returned array in response
    $response["luxoutdoor"] = array();
 
// 	// While loop to store all the returned response in variable
    while ($row = mysqli_fetch_array($result)) {
//         // temperoary user array
        $temp = array();
        $temp["lux"] = $row["lux"];
        $temp["date"]= $row["date"];
//         $weather["lux"] = $row["lux"];
// 		// $weather["hum"] = $row["hum"];

// 		// Push all the items 
        array_push($response["luxoutdoor"], $temp);
    }
//     // On success
    //$response["success"] = 1;
 
//     // Show JSON response
    echo json_encode($response);
}	
else 
{
//     // If no data is found
	$response["success"] = 0;
    $response["message"] = "No data on weather found";
 
//     // Show JSON response
    echo json_encode($response);
}
?>