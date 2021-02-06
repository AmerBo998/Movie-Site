
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

















function views(object){
    
    var movie=object.id;

    $.ajax({
    type: "POST",
    url: 'views.php',
    data: {moviename: movie},
    success: function(e){
        var path=document.getElementById(movie).getAttribute("href");
        header("Location:"+path);
        exit();
        
    }
    
    
});


}




function s_season(){
    
    var s=document.getElementById('season').value;
    s="Season "+s;
    

    $.ajax({
    type: "POST",
    url: 'selected_s.php',
    data: {season: s},
    success: function(data){
      document.getElementById("eps").innerHTML=data; 
        $("#newies").show();  }
    
    
    
});


};</script>



<script>
function del(object){

var cl=object.id;

 var cl1=$("#epn"+cl).val();
 
$.ajax({

 type:'POST',
 url:'delete_e.php',
 data: {toDelete : cl1},
 success:function(data){
    $("#no"+cl).hide();
     $("#epn"+cl).hide();
     $("#lo"+cl).hide();
     $("#"+cl).hide();
     alert(data);
     

 }})

};






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




<h1>
<?php 

    echo "<h1 style='margin-left:20%;font-size:50px;font-family:arial;text-shadow:-1px 0 white, 0 2px white, 1px 0 white, 0 -1px white;'>SHOW NAME: ".$_SESSION['show']."</h1>";

    include ("connection.php");


    $query="select number_of_seasons from movie_data where name='".$_SESSION['show']."'";
    $result=$conn->query($query);
    
    if ($result -> num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
 
                    $nos=$row['number_of_seasons'];
?>  
           
<select name="season" id="season" onchange="s_season();">
                   <option >---Select season---</option>
                   
                   
                   
                   <?php for($i=1;$i<=$nos;$i++){

                        echo "<option value=".$i.">  Season ".$i."</option>";


                    }
        
        ?>
        
    </select><br><br><br><a href='new_epps.php' id='newies'>Add new episodes to this season</a><br><br>
        <?php
        
        } }
        else {
            echo "Error: <br>" . $conn->error;
        }
        
            
        
        $conn->close();

?>
</h1>


<div id="eps"></div>


 


</body>
</html>