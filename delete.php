<?php

include_once ("connection.php");



$sql = "DELETE FROM movie_data WHERE name='".$_POST['mname']."'";

if ($conn->query($sql) === TRUE) {
    header("Location:manage.php");
    exit();
   
} else {
    echo "Error deleting record: " . $conn->error;
}








?>




