
<?php 
session_start();
include ("functions.php");
if(!isset($_SESSION['username']))
{
    // not logged in
    header('Location: login.php');
    exit();
}

else if(($_SESSION['userty'])!=='admin'){

    ?>
    <h1>You cannot access this page. Redirecting to homepage...</h1>
    <?php

header( "location: index.php" );

}




?>

<!DOCTYPE html>
<html>
<head>
<title> Free Movies</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="script.js"></script>





<script>
function episodes(){

    var x = document.getElementById("episode_num").value;
   
    document.getElementById('fields').innerHTML = "";
    document.getElementById('fields').innerHTML +=
    "<br><input type='text' id='season' name='season' style='margin-left:50px;'value='Season'><br><br>";

   for(i=1;i<=x;i++){


    document.getElementById('fields').innerHTML +=
    "<input type='text' id='ep_num' name='ep_num' value='"+i+"'><input class='eps' type='text' id='"+i+"' name='"+i+"' placeholder='Episode name'><input type='text' id='location"+i+"'   name='location"+i+"' placeholder='Source'><br><br><br>";
   
   
   }
   
}
</script>




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





<form action="add_episodes.php" method="post">
<input type="text" id="episode_num" name="episode_num">


<div id="fields"></div>
<button type="submit">DONE</button>
</form>
<button type='button' onclick="episodes();" id="h">OK</button>



</body>
</html>