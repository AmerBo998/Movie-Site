
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



function episodes(){

var x = document.getElementById("new_eps").value;

document.getElementById('fields').innerHTML = "";

var n=<?php if(isset($_SESSION['help'])){echo $_SESSION['help'];}?>;
n+=1;
for(i=1;i<=x;i++){


document.getElementById('fields').innerHTML +=
"Episode number: <input type='text' style='width:30px;'id='ep_num"+n+"' name='ep_num"+n+"' value='"+n+"'> Episode name: <input class='eps' type='text' id='"+i+"' name='"+i+"'> Source: <input type='text' id='location"+i+"'   name='location"+i+"'><br><br><br>";

n+=1;
}

}





</script>




</head>
<body style='color:white;'>

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


<h3 style='color:white;'>Add more episodes</h3>
            
            <form method='post' action='add_new_epps.php'>
                <p style="color:white;">Number of new episodes:</p><input type='text' id='new_eps' name='new_eps'><button type="button" id='new_ep_btn' name="new_ep_btn" onclick='episodes();'>OK</button>
            <input type='text' id='season' name='season' value='<?php echo $_SESSION['season_help'];?>'> <br><br>           
<div id="fields"></div>
                <button type="submit" id="add_ne">DONE</button></form>




</body>
</html>