
<?php
session_start();

include_once ("functions.php");

?>



<!DOCTYPE html>
<html>
<head>
<title> Watchlist</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<Script src="script.js"></script>
<script>


function wl_remove(object){

var nm=object.id;

$.ajax({
type: "POST",
url: 'watchlist_remove.php',
data: {user: '<?php echo $_SESSION['username']?>', moviename: nm},
success: function(){

  document.getElementById(nm).style.display = "none";

  
}

});};

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


<br><br><br>



<?php
watchlist_display("SELECT  name , poster, pages FROM  movie_data  WHERE name IN
(SELECT movie_name FROM watchlists where user='".$_SESSION['username']."') ","movie");
 

?>


</body>
</html>



