
<?php
session_start();


include_once("connection.php");
include("functions.php");


?>



<!DOCTYPE html>
<html>
<head>
<title> Sign in</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="script.js"></script>


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

<form  class="login_form" action="login.php" method="post">
<br><br><br>
<label id="lab1">Username</label><input type="text" name="uname" id="uname" required><br><br><br>
<label id="lab1">Password</label><input type="password" name="pass" id="pass" required><br><br>

<input type="submit" value="Sign in" name="done" id="done" style="background-color: #0063B2;">
<p style="margin-left:30%; color:white;">Don't have account yet? <a href="register.php">Sign up now!</a></p>

</form>




<?php

?>


</body>
</html>


<?php


if (isset($_POST['uname'])){
    $query="select password, user_type from users where username='".$_POST['uname']."'";
    $result=$conn->query($query);
    
   
    
    if ($result -> num_rows > 0) {
    
        $row = $result->fetch_assoc();

        if($row['password']===$_POST['pass'] && $row['user_type']==='regular'){
        ?><p class="warn">Login successful, you will be redirected to homepage ...</p>

            <?php 
            
            header( "refresh:2;url=index.php" );
            $_SESSION["username"] = $_POST['uname'];
            $_SESSION["userty"] = $row['user_type'];}

            else if($row['password']===$_POST['pass'] && $row['user_type']==='admin'){?>
            <p class="warn">Login successful, you will be redirected to homepage ...</p>
            <?php 

                header( "refresh:2;url=index.php" );
                $_SESSION["username"] = $_POST['uname'];
                $_SESSION["userty"] = $row['user_type'];
            }

            else if($row['password']!==$_POST['pass']){

                ?>
                    <p class="warn">Wrong password!</p><?php } 

            }


            else {

                    ?>
                    <p class="warn">There is no user with this username!</p><?php


            }

    }  
      
    $conn->close();
    
    ?>
    
    
    
    
    
    
    
    


