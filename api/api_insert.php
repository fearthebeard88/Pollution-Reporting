<?php
include "../db.php";
include "../includes/functions.php";

if (isSet($_POST['type'])) {
    $report = $_POST['type'];

    echo $report;

//     $query = "INSERT INTO location WHERE report (report) ";
//     $query .= "VALUES('{$report}') ";
//     $add_report = mysqli_query($connect, $query);
    
//     confirmQuery($add_report);
 }

?>