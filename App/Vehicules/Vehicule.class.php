<?php
require '../DB/dbconnect.class.php';
class Vehicule{
    public $cnx;
    public function __construct()
    {
        $db = new BasesDonnees;
        $this->cnx = $db->connectDB();
    }
    public function getVehicules(){
        try {
            $rep='SELECT * FROM vehicules';
            $result=$this->cnx->prepare($rep);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

         public function addVehicule($vid, $Status, $vehiculeMarque){

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
    public function deleteVehicule($vid) {
        try {
            $sql = 'DELETE FROM vehicules WHERE vid = :vid';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":vid", $vid);
            $result->execute();
            return $result;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    public function updateVehicule($vid, $Status, $vehiculeMarque)
    {

        try {
            $sql = 'UPDATE vehicules
                    Set
                            Status = :Status,
                            vehiculeMarque = :vehiculeMarque
                        WHERE vid = :vid';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":vid", $vid);
            $result->bindparam(":Status", $Status);
            $result->bindparam(":vehiculeMarque", $vehiculeMarque);
            $result->execute();
            return $result;

        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function showOneVehicule($vid)
    {
        try {
            $req = 'SELECT * FROM vehicules WHERE vid= :vid';
            $result = $this->cnx->prepare($req);
            $result->bindParam(':vid', $vid);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
