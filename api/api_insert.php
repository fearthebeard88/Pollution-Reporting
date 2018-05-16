<?php
include "../db.php";
include "../includes/functions.php";

if (isSet($_POST['report'])) {
    $report = $_POST['report'];
    $lat = $_POST['latitude'];
    $lon = $_POST['longitude'];

    echo $report;
    echo $lat;
    echo $lon;

    $query = "INSERT INTO `location` (`id`, `lat`, `lon`, `city`, `state`, `report`, `country`) VALUES (NULL, '{$lat}', '{$lon}', '', '', '{$report}', '') ";
    $add_report = mysqli_query($connect, $query);
    
    confirmQuery($add_report);
 }

?>