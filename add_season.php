
<?php
session_start();
include ("functions.php");
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

function wl_add(object){

    var nm=object.id;
    var name=nm.slice(0,-2);
$.ajax({
    type: "POST",
    url: 'watchlist_add.php',
    data: {user: '<?php if(isset($_SESSION['username']))
    {echo $_SESSION['username'];}?>', moviename: name},
    success: function(){
        document.getElementById(nm).style.display="none";
    }
    
});};








</script>

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
<script>





</script>


</head>
<body>

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




<h1 style='color:white;font-weigth:bold;font-family:helvetica;font-size:45px;'>Add new season for: <?php echo $_SESSION['show']; ?></h1>


<form action="update_episodes.php" method="post">
<h3 style="color:white;font-size:25px;">Number of episodes in new season</h3>
<input type="text" id="episode_num" name="episode_num">
<button type="button" onclick="episodes();" id="h" style='margin-left:10px;'>OK</button>

<div id="fields"></div><br><br>
<button type="submit">DONE</button>
</form>



 


</body>
</html>