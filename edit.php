<?php 
session_start();
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


include ("connection.php");
include ("functions.php");

$query="select * from movie_data where name='".$_POST['mname']."'";
$result=$conn->query($query);

if ($result -> num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        
        $type=$row['type'];
        
        ?>





<!DOCTYPE html>
<html>
<head>
<title> Edit</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="script.js"></script>



<script>



function wl_add(object){

    var nm=object.id;



$.ajax({
    type: "POST",
    url: 'watchlist_add.php',
    data: {user: '<?php echo $_SESSION['username']?>', moviename: nm},
    
});};


function set_wall(){

    var wall=document.getElementById("background_f").value;
    wall=wall.replace("C:\\fakepath\\","");
    
var check=document.getElementById("h").value;
  
        if(check=="movie"){
    document.getElementById('background').value = "../wall/"+wall;}
                if(check=="show"){
                    document.getElementById('background').value = "../show_wall/"+wall;
                }
                

}

function set_p(){

var p=document.getElementById("poster_f").value;
p=p.replace("C:\\fakepath\\","");

var check=document.getElementById("h").value;

        if(check=="movie"){
    document.getElementById('poster').value = "../poster/"+p;}


                if(check=="show"){
                    document.getElementById('poster').value = "../show_poster/"+p;
                }



}

function set_v(){
    
    var v=document.getElementById("video_f").value;
v=v.replace("C:\\fakepath\\","");

var check=document.getElementById("h").value;
    
        if(check=="movie"){
    document.getElementById('video').value = "../video/"+v;}
                if(check=="show"){
                    document.getElementById('video').value = "../show_video/"+v;
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


<br><br><br>



<?php 

        if($type=="movie"){


                echo "<form action='editmovie_data.php' method='post'>
                <input type='hidden' id='help' name='help' value='".$row['name']."'>
                <input type='hidden' id='h' name='h' value='".$row['type']."'>;
                <label><b>Movie name: </label><input type='text' id='name' name='name' class='add_inp' required value='".$row['name']."'> </input><br><br>
                <label>Genre: </label><input type='text' id='genre' name='genre' class='add_inp' required value='".$row['genre']."'></input><br><br>
                <label>Release year:</label> <input type='number' id='year' name='year' class='add_inp' required value='".$row['year']."'><br><br>
                <label>Duration</label> <input type='text' id='duratiob' name='duration' class='add_inp' required value='".$row['duration']."'><br><br><hr>
                <label>Synopsis:</label> <textarea rows='4' cols='50' id='synopsis' name='synopsis' placeholder='Synopsis...' required>".$row['synopsis']."</textarea><br><br><hr>
                <br><br><input type='hidden' id='nos' name='nos' value='0'>
                <br><br><label>Stars</label><input class='add_inp' type='text' id='stars' name='stars' value='".$row['stars']."'>
                <hr><div class='media_data' style='margin-left:25%;width:750px;padding:10px;border:2px solid black;'>
                <label>Background:</label> <input type='text' id='background' name='background' value='".$row['wallpaper']."'> / <input type='file' id='background_f' name='background_f' onchange='set_wall();'>
                <br><br><label>Poster:</label><input type='text' id='poster' name='poster' value='".$row['poster']."' > /<input type='file' id='poster_f' name='poster_f' onchange='set_p();'>
                <br><br><label>Video:</label><input type='text' id='video' name='video' value='".$row['video']."'> / <input type='file' id='video_f' name='video_f' onchange='set_v();'>
                </div>
                
                <br><br>
                <input type='submit' style='margin-left:40%;width:250px;height:40px;background-color:#2D383A;border:1px solid white;border-radius:25%;color:white;' value='DONE'>
                </form>";



        }
                if($type=="show"){

                        $_SESSION['show']=$row['name'];
                    echo "
                    <a href='edit_episodes.php' id='ep_ed'>Edit episodes</a><br>
                    <a href='add_season.php' id='ep_ed'>Add new season</a><br><hr><br>
                    
                    <form action='editmovie_data.php' method='post'>
                <input type='hidden' id='help' name='help' value='".$row['name']."'>
                <input type='hidden' id='h' name='h' value='".$row['type']."'>;
                <label><b>Movie name: </label><input type='text' id='name' name='name' class='add_inp' required value='".$row['name']."'> </input><br><br>
                <label>Genre: </label><input type='text' id='genre' name='genre' class='add_inp' required value='".$row['genre']."'></input><br><br>
                <label>Release year:</label> <input type='number' id='year' name='year' class='add_inp' required value='".$row['year']."'><br><br>
                <label>Duration</label> <input type='text' id='duratiob' name='duration' class='add_inp' required value='".$row['duration']."'><br><br><hr>
                <label>Synopsis:</label> <textarea rows='4' cols='50' id='synopsis' name='synopsis' placeholder='Synopsis...' required>".$row['synopsis']."</textarea><br><br><hr>
               <br><br> <label>Number of seasons:</label><input class='add_inp' type='text' id='nos' name='nos' value='".$row['number_of_seasons']."'>
                <br><br><label>Stars</label><input class='add_inp' type='text' id='stars' name='stars' value='".$row['stars']."'>
                <hr>
                
                <div class='media_data' style='margin-left:25%;width:750px;padding:10px;border:2px solid black;'>
                <label>Background:</label> <input type='text' id='background' name='background' value='".$row['wallpaper']."'> / <input type='file' id='background_f' name='background_f' onchange='set_wall();'>
                <br><br><label>Poster:</label><input type='text' id='poster' name='poster' value='".$row['poster']."' > /<input type='file' id='poster_f' name='poster_f' onchange='set_p();'>
                <br><br><input type='hidden' id='video' name='video' value='".$row['video']."'> 
                </div>
                
                <br><br>
                <input type='submit' style='margin-left:40%;width:250px;height:40px;background-color:#2D383A;border:1px solid white;border-radius:25%;color:white;' value='DONE'>
                </form>";

                }



} }
else {
    echo "Error: <br>" . $conn->error;
}


$conn->close();


?>


</body>
</html>