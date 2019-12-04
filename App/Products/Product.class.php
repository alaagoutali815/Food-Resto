<?php
require '../DB/dbconnect.class.php';
class Product{
    private $cnx;
    public function __construct()
    {
        $db =new BasesDonnees;
        $this->cnx=$db->connectDB();
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

    public function addProduct($firstname,$lastname,$email,$phone){
        try{


            $rep ="INSERT INTO products(pid, Name, Descr , File, stock_qte) VALUES ( :param_pid, :param_Name, :param_Descr, :param_Price, :param_File, :stock_qte)";
            $result = $this->cnx->prepare($rep);
            $result->bindParam (':param_pid',pid);
            $result->bindParam (':param_Name',$lastname);
            $result->bindParam (':param_Descr',$email);
            $result->bindParam (':param_Price',$phone);
            $result->bindParam (':param_File',$phone);
            $result->bindParam (':stock_qte',$phone);
            $result->execute();
            return $result;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    //------ Delete occurence --
//--- pid Name Descr Price File stock_qte




}
