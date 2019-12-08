<?php
require '../DB/dbconnect.class.php';
class Product{
    public $cnx;
    public function __construct()
    {
        $db = new BasesDonnees;
        $this->cnx = $db->connectDB();
    }
    public function getProducts(){
        try {
            $rep='SELECT * FROM products';
            $result=$this->cnx->prepare($rep);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addProduct($pid, $Name, $Desription, $Price,$File ,$stock_qte)
    {

// Check if image file is a actual image or fake image
        try {

            // $_POST['pid'], $_POST['Name'], $_POST['Desription'], $_POST['Price'], $_POST['File']
            $sql = "INSERT INTO products(pid,Name,Desription,Price,File,stock_qte) VALUES (:pid,:Name,:Desription,:Price,:File,:stock_qte)";
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":pid", $pid);
            $result->bindparam(":Name", $Name);
            $result->bindparam(":Desription", $Desription);
            $result->bindparam(":Price", $Price);
            $result->bindparam(":File", $File);
            $result->bindparam(":stock_qte", $stock_qte);
            $result->execute();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    //------ Delete occurence --


// delete the product
    public function deleteProduct($pid) {
        try {
            $sql = 'DELETE FROM products WHERE pid = :pid';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":pid", $pid);
            $result->execute();
            return $result;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    public function updateProduct($pid, $Name, $Desription, $Price ,$stock_qte)
    {

        try {
            $sql = 'UPDATE products
                        SET Name = :Name,
                            Desription = :Desription,
                            Price = :Price,
                            stock_qte = :stock_qte
                        WHERE pid = :pid';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":pid", $pid);
            $result->bindparam(":Name", $Name);
            $result->bindparam(":Desription", $Desription);
            $result->bindparam(":Price", $Price);
            $result->bindparam(":stock_qte", $stock_qte);
            $result->execute();
            return $result;

        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function showOneProduct($pid)
    {
        try {
            $req = 'SELECT * FROM products WHERE pid= :pid';
            $result = $this->cnx->prepare($req);
            $result->bindParam(':pid', $pid);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
