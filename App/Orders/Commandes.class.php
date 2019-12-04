<?php
require '../DB/dbconnect.class.php';
class Commandes{
    private $cnx;
    public function __construct()
    {
        $db =new BasesDonnees;
        $this->cnx=$db->connectDB();
    }
    public function getCommandes(){
        try {
            $rep='SELECT * FROM ordres';
            $result=$this->cnx->prepare($rep);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addCommandes($oid,$pid,$cid,$Odate,$Quantity_pbc,$Delivery_Status,$Vehicle){
        try{


            $rep ="INSERT INTO products(oid,pid,cid,Odate,Quantity_pbc,Delivery_Status,Vehicle) VALUES ( :param_oid, :param_pid, :param_cid, :param_Odate, :param_Quantity_pbc, :param_Delivery_Status, :param_Vehicle )";
            $result = $this->cnx->prepare($rep);
            $result->bindParam (':param_oid',oid);
            $result->bindParam (':param_pid',pid);
            $result->bindParam (':param_cid',cid);
            $result->bindParam (':param_Odate',$Odate);
            $result->bindParam (':param_Quantity_pbc',$Quantity_pbc);
            $result->bindParam (':param_Delivery_Status',$Delivery_Status);
            $result->bindParam (':param_Vehicle',Vehicle);

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
