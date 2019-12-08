<?php
session_start();
include "dbconnect.projet.php";
$servername = "localhost";
$username = "root";
$password = "";
$mysqli = new mysqli($servername, $username, $password ,"restaurant");
$id="";
$name="";
 ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

if (isset($_POST['save'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $phone=(int) $_POST['phone'];
    $address=$_POST['adresse'];

    $p= $mysqli->query("INSERT INTO customer (Name,Email,pwd,Phone,Address)VALUES ('".$name."','".$email."','".$pwd."',".$phone.",'".$address."')") ;
    $_SESSION['message']="Record has been saved";
    $_SESSION['msgh_type']="sucess";

    header("Location:index.php"); 

    
}
/*if (isset ($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM customer WHERE cid=$id")or die($mysqli->error());
    $_SESSION['message']="Record has been deleted !";
    $_SESSION['msgh_type']="danger";
    header("Location:produit1.php"); 
}
if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $result=$mysqli->query("SELECT * FROM products WHERE pid=$id")
    or die($mysqli->error());
    if (count ($result)==1){
        $row=$result->fetch_array();
        $id=$row['pid'];
        $name=$row['name'];
        $price=$row['price'];
        $description=$row['desription'];
        $img=$row['image'];

    }
}*/