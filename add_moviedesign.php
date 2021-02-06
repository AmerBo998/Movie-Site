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

header( "location: index_r.php" );

}




?>



<!DOCTYPE html>
<html>
<head>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src='script.js'></script>

<script>



function set_wall(){

var wall=$("#show_background").val();
wall=wall.replace("C:\\fakepath\\","");
alert(wall);
$("#background").val("../wall/"+wall);
            

}

function set_p(){

var p=$("#show_poster").val();
p=p.replace("C:\\fakepath\\","");
alert(p);
$("#poster").val("../poster/"+p);
            

}

function set_loc(){

var p=$("#video_location").val();
p=p.replace("C:\\fakepath\\","");
alert(p);
$("#location").val("../video/"+p);
            

}

</script>

<title> Add New Movie</title>
<link rel="stylesheet" type="text/css" href="style.css">


<style>


        #background, #poster, #location{

            margin:0 auto;
        }


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









<form action="add_movie.php" method="post">
<br><br>
<label><b>Movie name: </label><input type="text" id="name" name="name" class="add_inp" required>  </input><br><br>
<label>Genre: </label><input type="text" id="genre" name="genre" class="add_inp" required><br><br>
<label>Release year:</label> <input type="number" id="year" name="year" class="add_inp" required><br><br>
<label>Duration</label> <input type="text" id="duration" name="duration" class="add_inp" required><br><br><hr>
<label>Synopsis:</label> <textarea rows="4" cols="50" id="synopsis" name="synopsis" placeholder="Synopsis..." required> </textarea><br><br><hr>
<label>Stars </label><input type="text" id="stars" name="stars" class='add_inp' required><br><br><hr>
<div class="movie_media_upload"><br>
<label for="background" id="backgroundl" style="width:440px;"><b>Background image (insert link or choose file)</b></label>
<input type='text' id='background' name='background' value=''> / <input type="file" style="" id="show_background" name="show_background" onchange="set_wall();"><br><br>
<br><label for="poster" id="posterl"  style="width:440px;" ><b>Poster (insert link or choose file)</b></label>
<input type='text' id='poster' name='poster' value='' > /<input type="file" id="show_poster" name="show_poster" onchange="set_p();">
<br><br>
<label for="location" style="width:440px;">Location: </label>
<input type='text' id='location1' name='location' value='' > /<input type="file" id="video_location" name="video_location" onchange="set_loc();">
<br><br><br></div>
<input type="submit" style="margin-left:40%;width:250px;height:40px;background-color:#2D383A;border:1px solid white;border-radius:25%;color:white;" value="ADD MOVIE">
</form>



</body>
</html>