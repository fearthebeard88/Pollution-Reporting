<?php 
// database connection
include "../db.php";
// including functions from another file
include "../includes/functions.php";

// targeting everything in location table in database
$query = "SELECT * FROM location ";
$test_query = mysqli_query($connect, $query);
confirmQuery($test_query);
// empty array
$results = array();

// assigning results from query into associative array
while ($row = mysqli_fetch_assoc($test_query)) {
    // structure from database forms keys, column values are the values, which form the key: value pair of an associative array
    $results[] = $row;
}

// formatting the data into a JSON string object
$data = json_encode($results);
// response to the jquery GET request
    echo $data;



?>