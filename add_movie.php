<?php
$movie_name=$_POST['name'];
$movie_genre=$_POST['genre'];
$release_year=$_POST['year'];
$duration=$_POST['duration'];
$synopsis=$_POST['synopsis'];
$background=$_POST['background'];
$poster=$_POST['poster'];
$location=$_POST['location'];
$stars=$_POST['stars'];


$pg=str_replace([" ","/",":",";","'","&"],"-",$movie_name);
$myfile = fopen("pages/".$pg.".php", "w") or die("Unable to open file!");
$txt = "

<?php 

session_start();
include ('../functions.php');





?>


<!DOCTYPE html>
<html>
<head>
<title>".$movie_name."</title>
<link rel='stylesheet' type='text/css' href='../style.css'>

<script
  src='https://code.jquery.com/jquery-3.4.1.min.js'
  integrity='sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=''
  crossorigin='anonymous'></script>
  <script src='../script.js'></script>


  <script>
$(document).ready(function(e){

  $('#search_box').keyup(function(){

          $('#here').show();
          var x=$(this).val();
          $.ajax({

              type:'POST',
              url:'../searchq.php',
              data: 'q='+x,
              success:function(data){

                  $('#here').html(data);

              },
          });
  });
});

</script>


<style> 

.temp_body{
background-image: url('". $background."');
background-size:cover;
}


video{

 
  object-fit:cover;
  margin-left:35%;
}



</style>
</head>
<body class='temp_body'>
<button id='menu_btn' ></button>
<button id='search_small' ></button><br>
<ul class='nav_bar' id='nav_bar'>
<li><a href='index.php'>Home</a></li>
<li><a href='genre.php'>Genre</a></li>
<li><a href='release.php'>Release year</a></li>
<?php  echo menu_check();?>

</ul>


<div class='search_ul' id='search_ul'>
<form action='search.php' method='post' class='search_help'>

 <div class='search_help1'><button type='submit' class='search_btn' id='search_btn'></button>
<input type='text' class='search' name='search_box' id='search_box' placeholder='  Search movies...' ></input></div>
<li id='here'></li>
</form>

</div>





</div>
<div class='frame'>
<video width='1000' height='500' controls class='movie_player' >
  <source src='".$location."' type='video/mp4'>
  <source src='".$location."' type='video/ogg'>
  
  
</video>
<br><hr>
<div class='synopsis'><b>".$synopsis."</b> <br><hr>
 Genre: ".$movie_genre."<br><hr>
 Duration: ".$duration." <br><hr>
 Stars: ".$stars."
 </div></div>
<br>
<br>


</body>
</html>";

fwrite($myfile, $txt);

fclose($myfile);

 




$servername = "sql203.epizy.com";
$username = "epiz_27661172";
$password = "3YiXP3ETKbo";
$dbname = "epiz_27661172_movies";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO movie_data (name	,genre	,year	,duration	,synopsis	,poster, pages,wallpaper, views, number_of_seasons, stars, type, video)
VALUES ('".$movie_name."','". $movie_genre."', ".$release_year.", '".$duration."', '".$synopsis."', '".$poster."', 'pages/".$pg.".php', '".$background."', 1, 0,'".$stars."', 'movie','".$location."') ";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header('Location: /index.php');
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>