<?php

function confirmQuery($query) {
    global $connect;
    if (!$connect) {
        die(mysqli_error($connect));
    }
}

?>