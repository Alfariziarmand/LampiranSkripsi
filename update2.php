<?php
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    require 'dbconfig.php';
    
    $temp1 = mysqli_query($mysqli,"SELECT lux FROM `luxindoor` ORDER by date DESC LIMIT 1 ");
    $data1 = mysqli_fetch_array($temp1);
    
    $temp2 = mysqli_query($mysqli,"SELECT lux FROM `luxoutdoor` ORDER by date DESC LIMIT 1 ");
    $data2 = mysqli_fetch_array($temp2);

    $in = $data1['lux'];
    $out = $data2['lux'];
    $mul = $in*100;
    $df = $mul/$out;
    
    $result = mysqli_query($mysqli, "UPDATE `maintable` SET `value` = '$df' WHERE `maintable`.`id` = '$id'" );
    $result2 = mysqli_query($mysqli, "UPDATE `maintable` SET `date` = DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 7 hour) WHERE `maintable`.`id` = '$id'" );
    $result3 = mysqli_query($mysqli, "UPDATE `maintable` SET `luxin` = '$in' WHERE `maintable`.`id` = '$id'" );
    $result4 = mysqli_query($mysqli, "UPDATE `maintable` SET `luxout` = '$out' WHERE `maintable`.`id` = '$id'" );

}
header("Location: grid-plot-show.php"); 
exit; 
?>