

<?php




 

// Create connection
$conn = new mysqli("sql203.epizy.com","epiz_27661172","3YiXP3ETKbo","epiz_27661172_movies");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO watchlists (user, movie_name)
VALUES ('".$user."','". $moviname."') ";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header('Location: /index.php');
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>