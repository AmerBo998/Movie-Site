<?php 


if(!empty($_POST['q'])){

    include_once("connection.php");

$q=$_POST['q'];
    $query="SELECT * FROM movie_data WHERE name LIKE '%".$q."%' LIMIT 5";
    $result=$conn->query($query);
    
    if ($result -> num_rows > 0) {
      echo "<br>";
        while($row = $result->fetch_assoc()) {
    
                        
                echo " <a  id='inst_a' href='../".$row['pages']."' ><div class='quick'>
                <img src='".$row['poster']."' style='width:50px;height:80px;'>
               <div style='font-size:14px;margin-left:2px;color:white;font-family:arial;float:right;width:240px;height:100%;text-align:left;'>
                 <b>".$row['name']."</b>
                    <div style='font-size:12px;margin-left:2px;color:white;font-family:arial;float:left;width:240px;height:auto;text-align:left;' >".$row['genre']."<br>
                        ".$row['year']."</div>
                        </div>
                </div></a>";
    
    
    } }

   
    
}

?>



