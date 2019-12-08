<?php
include 'Vehicule.class.php';
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$etudiant= new Etudiant;
$listetud= $etudiant->creatEtudiant($firstname,$lastname,$email,$phone);

header("location:App/Products/index.php");

?>