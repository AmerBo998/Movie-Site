
<?php 
session_start();
include ("functions.php");

?>
<!DOCTYPE html>
<html>
<head>
<title> Free Movies </title>
<link rel="stylesheet" type="text/css" href="style.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="script.js"></script>






</head>
<body>



<input type="text" id="user" name="user" value="<?php echo $_SESSION['username'];?>" style="display:none;">

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

<br><Br><Br>
<div class="rel">
 <form action="release.php" method="post">
 <label style="display:inline-block;width:190px;margin-left:5%;font-size:20px;"><b>Input release year: </label>
 <input type="text" id="release_year" name="release_year" class="add_inp" > </input>
 <input type="submit"  value="Find"  class="release_sub">
 </form> 
<br><br>
<?php

if (isset($_POST['release_year'])) {
  echo "<h3 style='font-family:helvetica;font-size:35px;color:white;'>Year: ".$_POST['release_year']."</h3>";

    data_display("select * from movie_data where year='".$_POST['release_year']."'");}

?>
</div>
</body>
</html>














