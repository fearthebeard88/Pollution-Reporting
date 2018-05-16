<?php
include "../db.php";
include "../includes/functions.php";

if (isSet($_POST['report'])) {
    $report = $_POST['report'];

    echo $report;

    $query = "INSERT INTO `location` (`id`, `lat`, `lon`, `city`, `state`, `report`, `country`) VALUES (NULL, '', '', '', '', '{$report}', '') ";
    $add_report = mysqli_query($connect, $query);
    
    confirmQuery($add_report);
 }

?>