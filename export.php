<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


//Creating Array for JSON response
$response = array();
 
require 'dbconfig.php';	

 
 // Fire SQL query to get all data from weather
// $result = mysql_query("SELECT *FROM weather ORDER BY id DESC LIMIT 1") or die(mysql_error());
$result = mysqli_query($mysqli,"SELECT value, nox, noy FROM `maintable` order by noy,nox");
$response["map"] = array();
$temp= array();
$y=1;
while ($row = mysqli_fetch_array($result)) {
        if ($row["noy"] == $y) {
        array_push($temp, floatval($row["value"]));
        }
        elseif ($row["noy"] >= $y) {
            $y+=1;
            array_push($response["map"], $temp);
            $temp=array();
            array_push($temp, floatval($row["value"]));
        } 
        
    }
    
    array_push($response["map"], $temp);
    // var_duresponse;
    echo json_encode($response); 
    // $strings = var_dump($response["map"]);
    // echo $strings;
    // echo $response["map"];
?>