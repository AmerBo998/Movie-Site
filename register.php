
<?php
session_start();


include_once("connection.php");
include_once("functions.php");


?>



<!DOCTYPE html>
<html>
<head>
<title> Sign up</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="script.js"></script>

</script>
<style>





</style>
</head>
<body>

<button id="menu_btn" ></button>
<button id="search_small" ></button><br>
<ul class="nav_bar" id="nav_bar">
<li><a href="index.php">Home</a></li>
<li><a href="genre.php">Genre</a></li>
<li><a href="release.php">Release year</a></li>
<?php  echo menu_check();?>

</ul>







<div class="search_ul" id="search_ul">
<form action="search.php" method="post" class="search_help">

 <div class="search_help1"><button type="submit" class="search_btn" id="search_btn"></button>
<input type="text" class="search" name="search_box" id="search_box" placeholder="  Search movies..." ></input></div>
<li id="here"></li>
</form>

</div>



<br>

<form  class="reg_form"action="register.php" method="post">

<label id="lab1">Choose username</label><input type="text" name="uname" id="uname" ><br><br><br>
<label id="lab1">Choose password</label><input type="password" name="pass" id="pass" ><br><br>

<input type="submit" value="Done" name="done" id="done">

</form>




<?php

?>


</body>
</html>


<?php


if (isset($_POST['uname'])){
    $query="select * from users where username='".$_POST['uname']."'";
    $result=$conn->query($query);
    
   
    
    if ($result -> num_rows > 0) {
    
     ?>
     <br>
        <p style="margin-left:32%;font-size:18;color:white;font-family:arial;">There is already user with that username, please choose another one.</p>
     
     <?php
    } 


    

    else{

        $sql = "INSERT INTO users (	username,	password,	user_type)
    VALUES ('".$_POST['uname']."','". $_POST['pass']."', 'regular') ";
       
        if ($conn->query($sql) === TRUE){


    echo "New record created successfully";
    $_SESSION["username"] = $_POST['uname'];
    $_SESSION["userty"] = 'regular';
    Header("Location: /index_r.php");
	exit();}
    }}

    

    
    
    $conn->close();
    
    ?>
    
    
    
    
    
    
    
    


