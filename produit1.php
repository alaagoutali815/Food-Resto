<?php
include 'produit.html';
include 'dbconnect.projet.php';
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
//...


// Check connection
/*if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/

//echo "Connected successfully \n";
//.....


   
    // echo $result->num_rows;
    
    



?>
<div class="container">
    <h3 class="h3">Menu </h3>
    <table class="table">
    <thead>
    <a href="uploadimg.php" class="btn btn-primary"> +Add Product</a>
        <tr>
        <th>id</th>    
        <th>name</th>
        <th>price</th>
        <th>description</th>
        <th>Image</th> 
        <th>option</th>
      </tr>
    </thead> 
    <?php
    $mysqli = new mysqli($servername, $username, $password ,"restaurant");
    $result = $mysqli->query('SELECT * FROM products');
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo"<td>". $row["pid"]."</td>";
        echo"<td>". $row["Name"]."</td>" ;
        echo"<td>". $row["Price"]."</td>";
        echo"<td>".$row["Desription"]."</td>";
        //echo"<td>""<img src='$row['image']"." </td>";
        echo "<td><a href='#' class='btn btn-primary'>Update</a></td>";
        echo "<td><a href='#' class='btn btn-primary'>Delete</a></td>";
            echo "</tr>";
        
    }
   
    $result->close();


$mysqli->close();

   /*  while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo"<td>" .$row["id"]."</td>" ;
        echo"<td>" .$row["Name"]."</td>" ;
        echo"<td>" .$row["price"]."</td>" ;
        echo"<td>" .$row["desription"]."</td>" ;
    }*/
?>  

</table>
</div>