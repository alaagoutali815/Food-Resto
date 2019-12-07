<?php
   include "classes/dbConnect.class.php";

$name = $_POST['name'];
$price = $_POST['price'];
$sql = "INSERT INTO employee (name, price) VALUES ('$name', $price)";
$con->query($sql);
header("location: ../index.php");
?>