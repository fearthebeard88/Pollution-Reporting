<?php 
include "../db.php";
include "../includes/functions.php";

$query = "SELECT * FROM location ";
$test_query = mysqli_query($connect, $query);
confirmQuery($test_query);

while ($row = mysqli_fetch_assoc($test_query)) {
    $id = $row['id'];
    $lat = $row['lat'];
    $lon = $row['lon'];
    $city = $row['city'];
    $state = $row['state'];
    $report = $row['report'];
    $country = $row['country'];

    $coords = array("latitude" => $lat, "longitude" => $lon, "id" => $id, "city" => $city, "state" => $state, "report" => $report, "country" => $country);
}

// get rid of object, turn into assoc array, and json_encode array

echo json_encode($coords);



?>