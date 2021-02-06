<?php

include_once("connection.php");


$help_name=$_POST['help'];
$type=$_POST['h'];
$name=$_POST['name'];
$genre=$_POST['genre'];
$year=$_POST['year'];
$duration=$_POST['duration'];
$synopsis=$_POST['synopsis'];
$background=$_POST['background'];
$poster=$_POST['poster'];
$video=$_POST['video'];
$stars=$_POST['stars'];
$nos=$_POST['nos'];



if($type=="show"){

    $path="show_pages/";

}
if($type=="movie"){
  
$path="pages/";

}

$pg=str_replace([" ","/",":",";","'","&"],"-",$name);
$page_loc=$path."".$pg.".php";
$myfile = fopen($path."".$pg.".php", "w") or die("Unable to open file!");

if($type=="movie"){
$txt = "

  

<?php 

session_start();
include ('../functions.php');





?>


<!DOCTYPE html>
<html>
<head>
<title>".$name."</title>
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
background-image: url(' ".$background."');
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
<video width='1000' height='500' controls class='movie_player' >
  <source src='".$video."' type='video/mp4'>
  <source src='".$video."' type='video/ogg'>
  
  
</video>
<br><hr>
<div class='synopsis'><b>".$synopsis."</b> <br><hr>
 Genre: ".$genre."<br><hr>
 Duration: ".$duration." <br><hr>
 Stars: ".$stars."
 </div>
<br>
<br>


</body>
</html>";

fwrite($myfile, $txt);

fclose($myfile);
}



if($type=="show"){

  $txt = "

  <?php 
  
  session_start();
  include ('../functions.php');
  
  ?>
  
  
  <!DOCTYPE html>
  <html>
  <head>
  <title>".$name."</title>
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
  
  
  
  <div class='head'><strong><i>".$name."</i></strong></div><br>
  
  <div class='eppies'>
  
  <?php  epps('".$name."');?>
  
  
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
  
  
  </body>
  </html>";
  
  fwrite($myfile, $txt);
  
  fclose($myfile);




}



$sql = "UPDATE movie_data SET name='".$name."' , genre='".$genre."' , year='".$year."'
, duration='".$duration."' , synopsis='".$synopsis."', wallpaper='".$background."', poster='".$poster."', pages='".$page_loc."', number_of_seasons='".$nos."', stars='".$stars."' , video='".$video."' WHERE name='".$help_name."'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header('Location: /manage.php');
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>