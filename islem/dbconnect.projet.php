<?php 
class BasesDonnees
{
    private $host='localhost';
    private $dbname='restaurant';
    private $user='root';
    private $pwd='';


    public $connexion = null;


    public function connectDB()
     {
        try { 
         $this->connexion= new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->pwd);

         } catch (PDOException $e) { 
                echo $e->getMessage();
         } 
return $this->connexion;
    }
}

$conn = new BasesDonnees();
$conn->connectDB();
?>