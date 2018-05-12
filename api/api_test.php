<?php 

include "../db.php";
include "../includes/functions.php";

$query = "SELECT * FROM location ";
$test_query = mysqli_query($connect, $query);
confirmQuery($test_query);

$results = array();

while ($row = mysqli_fetch_assoc($test_query)) {
    $results[] = $row;
}

$data = json_encode($results);
    echo $data;



?>