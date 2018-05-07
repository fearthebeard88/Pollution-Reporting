<?php

if (isSet($_POST['location'])) {
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];

    $query = "INSERT INTO location (lat, lon) ";
    $query .= "VALUES('{$lat}', '{$lon}') ";
    $find_me = mysqli_query($connect, $query);
    
    $confirmQuery($find_me);
}

?>