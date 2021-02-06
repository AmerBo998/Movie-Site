<?php 

session_start();

        $_SESSION['season_help']=$_POST['season'];
    include ("connection.php");


    $query="select episode_no, location, episode_name from episodes where show_name='".$_SESSION['show']."' && season='".$_POST['season']."' order by episode_no asc";
    $result=$conn->query($query);
     $i=1;
        $_SESSION['help']=0;
     echo "<form action='ep_change.php' method='post'>";
    if ($result -> num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {

                   $_SESSION['no'.$i]=$row['episode_no'];
                   $_SESSION['epn'.$i]=$row['episode_name'];
                   $_SESSION['lo'.$i]=$row['location'];$_SESSION['help']=$i;
                echo "
                
                    <input  style='margin-left:330px;width:25px;' class='ep_edit' type='text' id='no".$i."' name='no".$i."' value='".$row['episode_no']."'>
                    <input style='margin-left:10px;width:250px;' class='ep_edit' type='text' id='epn".$i."' name='epn".$i."' value='".$row['episode_name']."'>
                    <input style='margin-left:10px;width:250px;'  class='ep_edit' type='text' id='lo".$i."' name='lo".$i."' value='".$row['location']."'>
                    <button type='button'  onclick='del(this);' id='".$i."'>Delete episode</button><br>
                ";
        $i=$i+1;
        
        }
    echo "<br><br><input type='submit' value='DONE' id='change'></form>";
    }
            
    
    
        else {
            echo "<h1>NO DATA</h1>" . $conn->error;
        }
        
           
        $conn->close();




?>




