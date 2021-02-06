<?php 
session_start();
include ("functions.php");
if(!isset($_SESSION['username']))
{
    // not logged in
    header('Location: login.php');
    exit();
}






?>



<!DOCTYPE html>
<html>
<head>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>


<script src="script.js">


</script>

<title> <?php echo $_SESSION['username']; ?> Account Settings</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<button id="menu_btn"></button>
<button id="search_small"></button><br>
<ul class="nav_bar" id='nav_bar'>
<li><a href="index.php">Home</a></li>
<li><a href="genre.php">Genre</a></li>
<li><a href="release.php">Release year</a></li>
<?php  echo menu_check();?>


</ul>





<div class="search_ul" id='search_ul'>
<form action="search.php" method="post" >
<button type="submit"class="search_btn">
<img src="loupe.png" class="loup_st"  style="background-size:cover;width:25px;height:25px;margin-bottom:3px;"></button>
<input type="text" class="search" name="search_box" id="search_box" placeholder="  Search movies..." ></input>
</form>

</div><br>

<div id="here"></div>






<form action="add_movie.php" method="post">

<label><b>Username: </label><input type="text" id="name" name="name" class="add_inp" required value="<?php echo $_SESSION['username'];?>">  </input><br><br>
<label>Password: </label><input type="password" id="genre" name="genre" class="add_inp" required><br><br>


<input type="submit" style="margin-left:40%;width:250px;height:40px;background-color:#2D383A;border:1px solid white;border-radius:25%;color:white;" value="ADD MOVIE">
</form>



</body>
</html>