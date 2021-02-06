<?php


$user=$_POST['user'];
$moviename=$_POST['moviename'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_site";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO watchlists (user, movie_name)
VALUES ('".$user."','". $moviename."') ";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>