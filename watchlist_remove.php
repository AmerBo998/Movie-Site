<?php 
session_start();
include_once("connection.php");
include_once("functions.php");

$sel_movie=$_POST['moviename'];


    
    

    $sql = "DELETE FROM watchlists WHERE user='".$_SESSION['username']."' AND movie_name='".$sel_movie."'";

    if ($conn->query($sql) === TRUE) {
       echo "GREAT";
       
       
    } else {
        echo "Error deleting record: " . $conn->error;
    }

   
    $conn->close();




?>