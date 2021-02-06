
<?php 
session_start();


if(isset($_SESSION['userty']) && ($_SESSION['userty'])!=='admin'){

    
  $home="index_r.php";
   



}else{$home="index_a.php";}

include_once ("connection.php");

$data=$_POST['poster'];

$query="select movie_name,synopsis, video_location,background_img  from movie_data where movie_name='".$data."'";
$result=$conn->query($query);


if ($result -> num_rows > 0) {

 while($row = $result->fetch_assoc()) {
   
?>



<!DOCTYPE html>
<html><head>
<title><?php echo $row['movie_name'];?></title>
<link rel='stylesheet' type='text/css' href='style.css'>


<style> 

.temp_body{
background-image: url('<?php echo $row['background_img']; ?>');
background-size:cover;
}


video{

 
  object-fit:cover;
  margin-left:35%;
}



</style>
</head>
<body class="temp_body">

<ul class="nav_bar">
<li><a href='<?php echo  $home;?>'>Home</a></li>
<li><a href='../genre.php'>Genre</a></li>
<li><a href='../release.php'>Release year</a></li>

</ul>
<ul class='search_ul'>
<form action='../search.php' method='post' >
<button class='search_btn'>
<img src='../loupe.png' class='loup_st'  style='background-size:cover;width:25px;height:25px;margin-bottom:3px;'></button>
<input type='text' class='search' name='search_box' id='search_box' placeholder='  Search movies...'></input></form>
</ul><br>
<br>

</div>
<video width='1000' height='500' controls class="movie_player" poster='<?php echo $row['background_img']; ?>'>
  <source src='<?php  echo $row['video_location'];     ?>' type='video/mp4'>
  <source src='<?php  echo $row['video_location'];     ?>' type='video/ogg'>
  <track src="subtitles_en.vtt" kind="subtitles" srclang="en" label="English">
  
</video>
<br>

<h3 class="synopsis"><?php  echo $row['synopsis'];   } } ?></h4>
</body>
</html>