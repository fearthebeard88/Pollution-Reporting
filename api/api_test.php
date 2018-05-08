<?php 
include "../db.php";
include "../includes/functions.php";

$query = "SELECT * FROM location WHERE city = 'Novi' ";
$test_query = mysqli_query($connect, $query);
confirmQuery($test_query);

while ($row = mysqli_fetch_assoc($test_query)) {
    $lat = $row['lat'];
    $lon = $row['lon'];

    $beam = new content;
    $beam ->latitude = $lat;
    $beam ->longitude = $lon;
}

// get rid of object, turn into assoc array, and json_encode array

class content {
    function __construct() 
    { 
        // $latitude = $a1;
        // $longitude = $a2;
    } 
    public $latitude = null;
    public $longitude = null;
}

echo json_encode($beam);



?>