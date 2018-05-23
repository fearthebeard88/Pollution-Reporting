<?php

function confirmQuery($query) {
    global $connect;
    if (!$connect) {
        die(mysqli_error($connect));
    }
}

function insert(){
    global $connect;
    // if there is a POST value with the key 'report' in the HTTP, assign it to a variable, along with the other keys
    if (isSet($_POST['report'])) {
        $report = $_POST['report'];
        $lat = $_POST['latitude'];
        $lon = $_POST['longitude'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
    
        // returns them to jquery for success function
        echo $report;
        echo $lat;
        echo $lon;
        echo $city;
        echo $state;
        echo $country;
    
        // inserts row into database 
        $query = "INSERT INTO `location` (`id`, `lat`, `lon`, `city`, `state`, `report`, `country`) VALUES (NULL, '{$lat}', '{$lon}', '{$city}', '{$state}', '{$report}', '{$country}') ";
        $add_report = mysqli_query($connect, $query);
        
        // if the query is formatted correctly, it will run fine, if not, function will kill the code
        confirmQuery($add_report);
     }
    }

    function showAll() {
        global $connect;
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
        }
        

?>