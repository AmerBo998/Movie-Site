
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


function episodes(){

    var x = document.getElementById("episode_num").value;
    var no=parseInt(x);
    document.getElementById('columns').innerHTML = "";

   for(i=1;i<=x;i++){


    document.getElementById('columns').innerHTML +="<input type='text' id='ep_n' value='"+i+"'><input class='eps' type='text' id='"+i+"' ><br>";
   }
    
}


function check(){

  
    $.ajax({
    type: "POST",
    url: 'add_show.php',
    data: {sname: $("#show_name").val(), syear: $("#show_year").val(),
     sduration:$("#show_duration").val(), 
     sbackground:$("#show_background").val().replace('C:\\fakepath\\', ''),
      sposter: $("#show_poster").val().replace('C:\\fakepath\\', ''),
      ssynopsis: $("#synopsis").val(), nos:$("#nos").val(),
       sgenre: $("#genre").val(), sstars: $("#stars").val()},
    success: function(e){
        
        alert(e);
    }
    
});
  
   

}



function set_wall(){

var wall=document.getElementById("show_background").value;
wall=wall.replace("C:\\fakepath\\","");
alert(wall);
$("#background").val("../show_wall/"+wall);
            

}

function set_p(){

var p=document.getElementById("show_poster").value;
p=p.replace("C:\\fakepath\\","");
alert(p);
$("#poster").val("../show_poster/"+p);
            

}

</script>



<style>
 
#posterl, #backgroundl{

    width:350px;
}


label{


    font-size:18px;
    float:left;
    width:200px;
    margin-left:0px;
    margin:5px;

}


input{
 
    margin:5px;
    height:20px;
    width:200px;
    border:1px solid green;
    border-radius:5px;
}

#synopsis{

        border:1px solid green;
        border-radius:5px;

}

#show_background, #show_poster{

    border:none;
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










<hr><h1  class="h" style='text-align:center;'>General Info</h1><hr><br>
<div  class="add_show_layout">
<form action="add_show.php" method="POST">
<div class="gen_info">

<label for="show_name"><b>Show name</b></label>
<input type="text" id="show_name" name="show_name"><br>
<label for="show_year"><b>Release year</b></label>
<input type="text" id="show_year" name="show_year"><br>
<label for="nos"><b>Number of Seasons</b></label>
<input type="text" id="nos" name="nos"><br>
<label for="show_duration"><b>Duration(per episode)</b></label>
<input type="text" id="show_duration" name="show_duration"><br>
<label for="genre"><b>Genre</b></label>
<input type="text" id="genre" name="genre"><br>
<label for="stars"><b>Stars</b></label>
<input type="text" id="stars" name="stars"><br></div>
<div class="media">
<label for="background" id="backgroundl"><b>Background image (insert link or choose file)</b></label><br><br>
<input type='text' id='background' name='background' value=''> / <input type="file" style="" id="show_background" name="show_background" onchange="set_wall();"><br><br>
<br><label for="poster" id="posterl" ><b>Poster (insert link or choose file)</b></label><br><br>
<input type='text' id='poster' name='poster' value='' > /<input type="file" id="show_poster" name="show_poster" onchange="set_p();">
</div>

<div class="syno">
<label for="synopsis" style="margin-left:21%;"><b>Synopsis</b></label><br><br>
<textarea id="synopsis"  style="width:400px;"name="synopsis" placeholder="Synopsis..."></textarea>  
</div>
<br><br>
<button type="submit" id="end" > DONE</button></form></div>




</body>
</html>