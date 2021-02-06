<?php 
session_start();
$show_name=$_POST['show_name'];
$year=$_POST['show_year'];

$_SESSION['show']=$show_name;

$duration=$_POST['show_duration'];


$background=$_POST['background'];

$poster=$_POST['poster'];
$synopsis=$_POST['synopsis'];
$nos=$_POST['nos'];
$genre=$_POST['genre'];
$stars=$_POST['stars'];

$pg=str_replace([" ","/",":",";","'","&"],"-",$show_name);
$myfile = fopen("show_pages/".$pg.".php", "w") or die("Unable to open file!");
$txt = "

<?php 

session_start();
include ('../functions.php');

?>


<!DOCTYPE html>
<html>
<head>
<title>".$show_name."</title>
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
background-image: url('".$background."');
background-size:cover;
}

@media  screen and (max-width: 1200px) {

  .temp_body{
    background-image: none;
    background-color: #074272;
    
      }


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


<div class='frame'>
<div class='head'><strong><i>".$show_name."</i></strong></div><br>

<div class='eppies'>

<?php  epps('".$show_name."');?>


</div>
<br>
 
<div id='syno'><p>".$synopsis."
<br><br>
<b>Genre:</b> ".$genre."<br><br>
<b>Stars:</b> ".$stars."</p></div> 

<br>
<video id='ep_player' width='1250' height='500' controls style='display:none;'>
<source src='' type='video/mp4'>
  <source src='' type='video/ogg'>
</video>
</div>


</body>
</html>";

fwrite($myfile, $txt);

fclose($myfile);

 




$servername = "sql203.epizy.com";
$username = "epiz_27661172";
$password = "3YiXP3ETKbo";
$dbname = "epiz_27661172_movies";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO movie_data 
VALUES
 ('".$show_name."', '".$genre."', '".$year."', '".$duration."', '".$synopsis."','".$poster."',  'show_pages/".$pg.".php', '".$background."', 0,  ".$nos." ,'".$stars."', 'show', '//') ";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header('Location: /episodes.php');
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>