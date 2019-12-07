<?php
    include "classes/dbConnect.class.php";
    $status = $_POST['status'];
$id = $_POST['id'];

$sql = "UPDATE orders SET status='$status' WHERE id=$id;";
$con->query($sql);

header("location: ../all-orders.php");
?>