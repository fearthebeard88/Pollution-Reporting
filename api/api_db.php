<?php

$query = "SELECT * FROM location ";
$find_me = mysqli_query($connect, $query);

while ($row = mysqli_fetch_assoc($find_me)) {
    $id = $row['id'];
    $lat = $row['lat'];
    $lon = $row['lon'];
    $city = $row['city'];
    $state = $row['state'];
    $country = $row['country'];
}

?>