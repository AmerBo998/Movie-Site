
<?php
session_start();
include ("functions.php");



?>





<!DOCTYPE html>
<html>
<head>
<title> Genre</title>
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

<input type="text" id="user" name="user" value="<?php if(isset($_SESSION['username']))echo $_SESSION['username'];?>" style="display:none;">


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

<br><br><br>

<div  class="gen_btn"> 
<form action="genre.php" method="post" >
<input type="submit" class="g_button" name="genre_b" value="Action">
<input type="submit" class="g_button" name="genre_b" value="Thriller">
<input type="submit"  class="g_button" name="genre_b" value="Drama">
<input type="submit"  class="g_button" name="genre_b" value="Crime">
<input type="submit"  class="g_button" name="genre_b" value="Sci-Fi">
<input type="submit"  class="g_button" name="genre_b" value="Documentary">
<input type="submit"  class="g_button" name="genre_b" value="History">
<input type="submit"  class="g_button" name="genre_b" value="War">
<input type="submit"  class="g_button" name="genre_b" value="Comedy">
<input type="submit"  class="g_button" name="genre_b" value="Anime">
<input type="submit"  class="g_button" name="genre_b" value="Mystery">
<input type="submit" class="g_button" name="genre_b" value="Sport">
<input type="submit"  class="g_button" name="genre_b" value="Western">
<input type="submit"  class="g_button" name="genre_b" value="Horror">
<input type="submit"  class="g_button" name="genre_b" value="Adventure">
<input type="submit"  class="g_button" name="genre_b" value="Romance"></form>


<?php

echo "<br>";
if (isset($_POST['genre_b'])){

  echo "<h3 style='font-family:helvetica;font-size:35px;color:white;'>Genre: ".$_POST['genre_b']."</h3>";
  

data_display("select * from movie_data where genre like '%".$_POST['genre_b']."%'");

}
?>

</div>











</body>
</html>