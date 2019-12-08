<?php
require '../DB/dbconnect.class.php';
class Order{
    public $cnx;
    public function __construct()
    {
        $db = new BasesDonnees;
        $this->cnx = $db->connectDB();
    }
    public function getOrders(){
        try {
            $rep='SELECT * FROM ordres';
            $result=$this->cnx->prepare($rep);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

         public function addOrder($vid, $Status, $vehiculeMarque){

// Check if image file is a actual image or fake image
        try {

            // $_POST['pid'], $_POST['Name'], $_POST['Desription'], $_POST['Price'], $_POST['File']
            $sql = "INSERT INTO vehicules(vid,Status,vehiculeMarque) VALUES (:vid,:Status,:vehiculeMarque)";
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":vid", $vid);
            $result->bindparam(":Status", $Status);
            $result->bindparam(":vehiculeMarque", $vehiculeMarque);
            $result->execute();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    //------ Delete occurence --


// delete the product
    public function CancelOrder($oid) {
        try {
            $sql = 'UPDATE ordres
                    Set
                            Delivery_Status = 3
                        WHERE oid = :oid';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":oid", $oid);
            $result->execute();
            return $result;

        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function confirmOrder($oid) {
        try {
            $sql = 'UPDATE ordres
                    Set
                            Delivery_Status = 1
                        WHERE oid = :oid';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":oid", $oid);
            $result->execute();
            return $result;

        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    public function AffectOrder($oid, $vid)
    {

        try {
            $sql= ' UPDATE ordres
                    Set
                            Vehicle = :vehicule,
                            Delivery_Status = 2
                        WHERE oid = :oid';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":oid", $oid);
            $result->bindparam(":vehicule", $vid);
            $result->execute();
            return $result;

        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function showOneOrder($oid)
    {
        try {
            $req = 'SELECT * FROM ordres WHERE oid= :oid';
            $result = $this->cnx->prepare($req);
            $result->bindParam(':oid', $oid);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    public function getOrdersCount($widget) {

        try {
            $req = 'SELECT COUNT (*)  FROM ordres WHERE Delivery_Status= :widget';
            $result = $this->cnx->prepare($req);
            $result->bindParam(':widget', $widget);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function getAvailbleVehicules () {

        try {
            $req = 'SELECT *  FROM vehicules WHERE status = 1';
            $result = $this->cnx->prepare($req);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }


}
