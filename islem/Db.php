<?php

class Db
{

    protected $connection;
  

    const DELIVERY_STATUS_DELIVERED = 1;//livré
    const DELIVERY_STATUS_PENDING = 0;//en attente

    public function __construct($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = 'restaurant', $charset = 'utf8')
    {
        //afficher les erreurs
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        //lancer la session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        try {
            $this->connection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getProducts() {

        $stmt = $this->connection->prepare("SELECT * FROM products ");
        $stmt->execute();
        $products = $stmt->fetchAll();

        return $products;
    }

    public function addproductToCart($id) {
        $stmt = $this->connection->prepare("SELECT * FROM products WHERE pid=?");
        $stmt->execute([$id]);
        $product = $stmt->fetch();
        if (!empty($_SESSION["cart_products"])) {//s'il y a au moins un produit au panier
            if (isset($_SESSION["cart_products"][$id])) {//si le produit existe dans le panier on incremente la quantité
                $_SESSION["cart_products"][$id]['quantity'] += 1;
            } else {
                $_SESSION["cart_products"][$id]['quantity'] = 1;
                $_SESSION["cart_products"][$id]['info'] = $product;
            }
        } else {
            $_SESSION["cart_products"][$id]['quantity'] = 1;
            $_SESSION["cart_products"][$id]['info'] = $product;
        }

    }

    public function getNumberOfProducts() {

        $n = 0;
        if (!empty($_SESSION["cart_products"])) {
            $n = count($_SESSION["cart_products"]);
        }
        return $n;
    }

    public function clearproductToCart() {
        session_destroy();//supprimer la session
    }

    public function getUser() {
        $stmt = $this->connection->prepare("SELECT * FROM customer LIMIT 1");
        $stmt->execute();
        $products = $stmt->fetch();

        return $products;
    }

    public function getVehicle() {
        $stmt = $this->connection->prepare("SELECT * FROM vehicle LIMIT 1");
        $stmt->execute();
        $vehicle = $stmt->fetch();

        return $vehicle;
    }

    public function removeproductFromCart($id) {
        unset ($_SESSION["cart_products"][$id]);//supprimer le produit de la session
    }

    public function saveOrder() {
        $user = $this->getUser();//recuperer le user
        $today = new DateTime();
        //echo "<pre>";
        //var_dump($_SESSION["cart_products"]);die();        
        foreach ($_SESSION["cart_products"] as $id => $data) {
            //select vehicle
            $vehicle = $this->getVehicle();

            //save order
            $stmt = $this->connection->prepare(
                "INSERT INTO ordres (pid, cid, Quantity, Odate, Quantity_pbc, Delivery_Status, Vehicle)  
                          VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([
                $data["info"]["pid"],
                $user["cid"],
                $data["quantity"],
                $today->format("Y-m-d H:i:s"),
                $data["quantity"],
                self::DELIVERY_STATUS_PENDING,
                $vehicle["vid"]

            ]);
        }

        //clear session
        $this->clearproductToCart();
    }
}