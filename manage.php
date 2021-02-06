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

header( "location: index_r.php" );

}


include_once ("connection.php");
include_once("functions.php");

?>



<!DOCTYPE html>
<html>
<head>
<title>Manage Data</title>

<link rel="stylesheet" type="text/css" href="style.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

 <script src="script.js"></script>




<style>

    table{

        table-layout:fixed;
        width:100%;
   
    }


    .poster_path{


        width:350px;
        white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
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

<br><br><br>
<div class="manage_lock">
<hr>
<h1 style="font-family:arial;font-size:30px;color:white;">New</h1><br>
<a id="adding" href="add_moviedesign.php">Add Movie</a>
<a id="adding" href="tvshow_add.php">Add Show</a><br><br><Br><hr>
<h1 style="font-family:arial;font-size:30px;color:white;">Existing</h1><br>
<span style='font-family:helvetica;color:white;font-size:18px;'>Search data:    </span><input type="text" id="filter" name="filter"><br><br>

<table  class="manage_table">
<tr class="table_h">
<td>Movie Name</td>
<td>Genre</td>
<td style="width:150px;">Release year</td>
<td>Duration(minutes) </td>
<td style="width:250px;">Synopsis</td>


<td>Option</td>
</tr>
<div id='data'>
<?php 
$query="select * from movie_data";
$result=$conn->query($query);

if ($result -> num_rows > 0) {

    while($row = $result->fetch_assoc()) {


echo
"
<tr>
<td id='movie_value'> {$row['name']}</td>
<td> {$row['genre']}</td>
<td> {$row['year']}</td>
<td> {$row['duration']}</td>
<td> {$row['synopsis']}</td>


<td style='width:100px;height:30px;'> <form action='edit.php' method='post'><br>
<input type='hidden' id='mname' name='mname' value='".$row['name']."'>
<button type='submit' style='font-size:13px;width:50px;height:20px;' id='edit_btn' >Edit</button><br><br>
<button type='submit' style='font-size:13px;width:50px;height:20px;' id='delete_btn' formaction='/delete.php'>Delete</button><br><br>
</form>
</td>
</tr>";




 }}
    
    else {
        echo "Cannot display records." ;
    }
    
    
    $conn->close();
    
    
    ?><div>
</table>
</div>

</body>
</html>