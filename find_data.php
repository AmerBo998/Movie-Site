<?php 



if(!empty($_POST['q'])){

    include_once("connection.php");

$q=$_POST['q'];
    $query="SELECT * FROM movie_data WHERE name LIKE '%".$q."%' LIMIT 5";
    $result=$conn->query($query);
    
    if ($result -> num_rows > 0) {
      echo "<br><h1 style='font-family:helvetica;color:white;font-size:20px;'>Search results for: ".$q." </h1><table  class='manage_table'>
            <tr class='table_h'>
            <td>Movie Name</td>
            <td>Genre</td>
            <td style='width:150px;'>Release year</td>
            <td>Duration(minutes) </td>
            <td style='width:250px;'>Synopsis</td>
            
            
            <td>Option</td>
            </tr>";
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
            
            
            
    
    
    }echo "</table><br><hr><br>"; }
    
   
    else {

        echo "<h1  style=color:white;font-size:40px;font-family:helvetica;>NO DATA</h1>";
    }
}





?>