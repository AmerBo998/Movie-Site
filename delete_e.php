<?php 

mysqli_report(MYSQLI_REPORT_STRICT);
session_start();
include_once ("connection.php");
$epi=$_POST['toDelete'];
$sql = "DELETE FROM episodes WHERE show_name='".$_SESSION['show']."' AND episode_name='".$epi."'";

if ($conn->query($sql) === TRUE) {
    
 echo "Episode  '".$epi."' succesfully deleted.";
   
} else {
    echo "Error deleting record: " . $conn->error;
}





?>