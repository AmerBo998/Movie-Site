
<?php
session_start();
include_once ("functions.php");



?>



<!DOCTYPE html>
<html>
<head>
<title> Search results</title>
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



<br><br><br>



<h3 style="font-family:helvetica;font-size:35px;color:white;">Search results for: <?php  echo $_POST['search_box'];?></h3>

<?php

      data_display("select * from movie_data where name like '%".trim($_POST['search_box'])."%'");

?>


</body>
</html>