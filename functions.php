<?php

function menu_check(){

    
    $menu="";

    if(!isset($_SESSION['username']))
{
    // not logged in
   $menu="<li><a href='login.php'>Sign in</a></li>
   <li><a href='register.php'>Sign up</a></li>";
}
    
     else if(isset($_SESSION['username']) && ($_SESSION['userty'])=='admin'){

        $unm=$_SESSION['username'];
    
        $menu="<li><a href='watchlist.php'>Watchlist</a></li>
        
        <li><a href='manage.php'>Manage Data</a></li>


        <li><div class='drop'><button class='over'> ".$_SESSION['username']." ▼</button>
        <div class='down'>
       
        <form action='logout.php' method='post'><button type='submit' style='width:135px;' id='logout' class='l_out'>Log out</button></form></div>
        </div></li>
        
        ";
       
    }
    
    else if(isset($_SESSION['username']) && ($_SESSION['userty'])!=='admin'){
    
        $unm=$_SESSION['username'];

       $menu= " <li><a href='watchlist.php'>Watchlist</a></li>

       <li><div class='drop'><button class='over'> ".$_SESSION['username']." ▼</button>
       <div class='down'>
       
       <form action='logout.php' method='post'><button type='submit' style='width:135px;' id='logout'class='l_out'>Log out</form></div>
       </div></li>";
    }


    return $menu;
    
}

function watch_menu_check(){

    
    $menu="";

    if(!isset($_SESSION['username']))
{
    
   $menu="<li><a href='../login.php'>Sign in</a></li>
   <li><a href='../register.php'>Sign up</a></li>";
}
    
     else if(isset($_SESSION['username']) && ($_SESSION['userty'])=='admin'){

        $unm=$_SESSION['username'];
    
        $menu="<li><a href='../watchlist.php'>Watchlist</a></li>
       
        <li><a href='../manage.php'>Manage Data</a></li>
        <li><a href='#'> ".$_SESSION['username']."</a></li>
        <li><form action='../logout.php' method='post'><button type='submit' id='logout'class='l_out'>Log out</button></form></li>";
    
    }
    
    else if(isset($_SESSION['username']) && ($_SESSION['userty'])!=='admin'){
    
        $unm=$_SESSION['username'];

       $menu= " <li><a href='../watchlist.php'>Watchlist</a></li>

<li ><a href='#'>".$_SESSION['username']."</a></li>
<li><form action='../logout.php' method='post'><button type='submit' id='logout'class='l_out'>Log out</form></li>";
    }


    return $menu;
    
}





function data_display($que){

        include_once("connection.php");
    $result=$conn->query($que);

    if ($result -> num_rows > 0) {

        while($row = $result->fetch_assoc()) {?>
        
        
       
        <a  href="<?php echo $row['pages'];?>" onclick="views(this);" class="posters" id="<?php echo $row['name']; ?>" name="poster" style="text-decoration:none;background-image:  url('<?php echo $row['poster'];?>');" 
        value="<?php echo $row['name']; ?>">
        <b><br><br>
        <?php echo $row['name']; ?><b><br><br>
        <?php if(isset($_SESSION['username'])){
        echo "<button  onclick='wl_add(this);  return false' id='".$row['name']."re' class='wl_desgn' style='cursor:pointer;font-size:15px;text-decoration:none;'><b>Add to watchlist</b></button>";
        }
      ?>
      </a>

      


 <?php

    } }
    
    else {
        echo "<h1 style='font=size:50px;color:white;text-align:center;font-family:arial;'>No movies available<h1>" . $conn->error;
    }
    
    
    $conn->close();




}


function epps($show){


      include_once("../connection.php");


$result=$conn->query("SELECT number_of_seasons,synopsis FROM movie_data WHERE name='".$show."'");
    
        if ($result -> num_rows > 0) {
    
            while($row = $result->fetch_assoc()) {
    
                  $s=$row["number_of_seasons"];
                  
                  for($i=1;$i<=$s;$i++){
    
$result=$conn->query("SELECT * FROM episodes WHERE show_name='".$show."' AND season='Season ".$i."' ORDER BY episode_no ASC");
                        echo "<button class='season_btn' id='Season".$i."' onclick='list(this);'>Season ".$i."</button>";
        
                            echo "<div class='ep_list' id='".$i."'>";
        
                        if ($result -> num_rows > 0) {
    
            while($row = $result->fetch_assoc()) {
    
                  echo "<a class='episodes_frame'  id='".$row['location']."' onclick='player_set(this);'>".$row['episode_no'].".".$row['episode_name']."</a>";
    
    
    
            } echo "</div>"; }
           
            else {
                echo "</div>";
                echo "<h1 style='font=size:50px;color:white;text-align:center;font-family:arial;'>No episodes available</h1>" . $conn->error;
            }


            } }
           

            $conn->close();
    
    
    
    
 
    
    
    



}}


function watchlist_display($que, $type){

    

    $conn=new mysqli("localhost","root","","movie_site");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if($type=="movie"){
$result=$conn->query($que);

if ($result -> num_rows > 0) {

    while($row = $result->fetch_assoc()) {?>
    
     
   
    <a  href="<?php echo $row['pages'];?>" class="posters" id="<?php echo $row['name'];?>" name="poster" style="text-decoration:none;background-image:url('<?php echo $row['poster'];?>');" 
    value="<?php echo $row['name']; ?>">
    <b><br><?php echo $row['name']; ?><b><br>
    <?php if(isset($_SESSION['username'])){
    echo "<br><button  onclick='wl_remove(this);  return false' id='".$row['name']."' class='wl_desgn' style='font-size:medium;text-decoration:none;'>Remove from watchlist</button>";
    }
  ?>
  </a>

<?php

} }
else {
    echo "<h1 style='font=size:50px;color:white;text-align:center;font-family:arial;'>No movies available<h1>" . $conn->error;
}}
else if($type=="show"){
    $result=$conn->query($que);

    if ($result -> num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {?>
        
         
       
        <a  href="<?php echo $row['pages'];?>" class="posters" id="<?php echo $row['name'];?>" name="poster" style="text-decoration:none;background-image:url('<?php echo $row['poster'];?>');" 
        value="<?php echo $row['name']; ?>">
        <b><br><?php echo $row['name']; ?><b><br>
        <?php if(isset($_SESSION['username'])){
        echo "<br><button  onclick='wl_remove(this);  return false' id='".$row['name']."' class='wl_desgn' style='font-size:medium;text-decoration:none;'>Remove from watchlist</button>";
        }
      ?>
      </a>
    
    <?php
    
    } }
    else {
        echo "<h1 style='font=size:50px;color:white;text-align:center;font-family:arial;'>No shows available<h1>" . $conn->error;
    }



}

$conn->close();




}





function popular_movies(){

    $conn=new mysqli("localhost","root","","movie_site");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $q="SELECT name, genre, synopsis, pages, wallpaper, year FROM movie_data ORDER BY views DESC LIMIT 5";

    $result=$conn->query($q);
$count=1;


        $needed="<div id='demo' class='carousel slide' data-ride='carousel'>
        <ul class='carousel-indicators'>
          <li data-target='#demo' data-slide-to='0' class='active'></li>
          <li data-target='#demo' data-slide-to='1'></li>
          <li data-target='#demo' data-slide-to='2'></li>
          <li data-target='#demo' data-slide-to='3'></li>
          <li data-target='#demo' data-slide-to='4'></li>
        </ul><div class='carousel-inner'>";

    if ($result -> num_rows > 0) {

        while($row = $result->fetch_assoc()) {


                    if($count==1)      {      

        $needed.="
       
          <div class='carousel-item active'>
           <a href='".$row['pages']."'>  <img class='carousel-img' src='".$row['wallpaper']."' . width='200' height='300'>
          </a>  <div class='carousel-caption'>
              <h3>".$row['name']." (".$row['year'].")</h3>
              <p>".$row['synopsis']."</p>
            </div>   
          </div> ";}
          else {

            $needed.="
            
            <div class='carousel-item'>
             <a href='".$row['pages']."'> <img src='".$row['wallpaper']."'  width='200' height='300'></a> 
              <div class='carousel-caption'>
                <h3>".$row['name']." (".$row['year'].")</h3>
                <p>".$row['synopsis']."</p>
              </div>   
            </div>";



          }

          $count++;

        }

            
        
        
        
        
        $needed.="</div><a class='carousel-control-prev' href='#demo' data-slide='prev'>
            <span class='carousel-control-prev-icon'></span>
          </a>
          <a class='carousel-control-next' href='#demo' data-slide='next'>
            <span class='carousel-control-next-icon'></span>
          </a>
            </div>";


            echo $needed;


        
    }
        else {
            echo "<h1 style='font=size:50px;color:white;text-align:center;font-family:arial;'>Hi<h1>" . $conn->error;
        }
        
        
        $conn->close();




}

?>