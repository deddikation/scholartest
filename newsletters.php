<?php

require 'config.php';

$myArray = array();
if ($result = $conn->query("SELECT * FROM newsletter")) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$conn->close();

