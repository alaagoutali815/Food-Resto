<?php
include "dbconnect.projet.php";
if (isset($_post['upload'])){
    $target="images/".products($_FILES['image']);
    $mysqli = new mysqli($servername, $username, $password ,"restaurant");
$img=$_files['image'];
$sql="INSERT INTO products (image) VALUES ('$img')";
mysqli_querry($mysqli,$sql);
if(move_uploaded_file($_files['image']['tmp_name'].$target)){
    $msg="image uploaded suc";
}else{
    $msg="failed";
}
}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>upload img</title>
 </head>
 <body>
     <div>
         <form method="post" action="uploadimg.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="">
            <div>
                <input type="file" name="img">
            </div>
            <div>
                <input type="submit" value="upload image">
            </div>
 </body>
 </html>