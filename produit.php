<?php
include 'produit.html';
include 'dbconnect.projet.php';
$connexion = new PDO();
$products = $connexion->getproducts();
$bproducts=$connexion->getNumberofproducts();

 function __construct($host = 'localhost', $dbname = 'restaurant', $user = 'root', $pwd = '')
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        try {
            $this->connexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
            // set the PDO error mode to exception
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        var_dump($_SESSION["products"]);
    }
     function getProducts() {

        $stmt = $this->connexion->prepare("SELECT * FROM products ");
        $stmt->execute();
        $products = $stmt->fetchAll();
    
        return $products;
    }
?>




