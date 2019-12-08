<?php
require_once 'Vehicule.class.php';
$vehicule = new Vehicule;
$vehicule->deleteVehicule($_GET['vid']);
header('Location:index.php?notif=delete');