<?php
// including the database connection
include "../db.php";
// including a set of functions from another file
include "../includes/functions.php";

// if there is a POST value with the key 'report' in the HTTP, assign it to a variable, along with the other keys
if (isSet($_POST['report'])) {
    $report = $_POST['report'];
    $lat = $_POST['latitude'];
    $lon = $_POST['longitude'];

    // returns them to jquery for success function
    echo $report;
    echo $lat;
    echo $lon;

    // inserts row into database 
    $query = "INSERT INTO `location` (`id`, `lat`, `lon`, `city`, `state`, `report`, `country`) VALUES (NULL, '{$lat}', '{$lon}', '', '', '{$report}', '') ";
    $add_report = mysqli_query($connect, $query);
    
    // if the query is formatted correctly, it will run fine, if not, function will kill the code
    confirmQuery($add_report);
 }

?>