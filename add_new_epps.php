<?php 



session_start();

$n=$_SESSION['help'];
$new=$_POST['new_eps'];
$n+=1;
for($i=1;$i<=$new;$i++){

    
$show_name=$_SESSION['show'];
$season=$_POST['season'];
$ep_num=$_POST['ep_num'.$n];
$location=$_POST['location'.$i];
$episode_name=$_POST[$i];

$n+=1;


$conn = new mysqli("sql203.epizy.com", "epiz_27661172", "3YiXP3ETKbo", "epiz_27661172_movies");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO episodes 
VALUES
 ('".$show_name."', '".$season."', '".$ep_num."','".$location."', '".$episode_name."')";

if ($conn->query($sql) === TRUE) {
   
    header("Location: index.php");
    
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

$conn->close();

?>