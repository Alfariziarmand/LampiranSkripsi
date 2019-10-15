<?php 
    //$id = $_GET['id'];
    require 'dbconfig.php';
    $result = mysqli_query($mysqli, "UPDATE `maintable` SET `value`=0");
header("Location: grid-plot.php"); 
exit; 
 ?>