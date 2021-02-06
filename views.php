<?php 

include_once ("connection.php");


$name=$_POST['moviename'];




$sql = "UPDATE movie_data SET views=views+1 WHERE name='".$name."'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();







?>