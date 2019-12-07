<?php

    require "dbConnect.class.php";

    class User {

        private $conn;
        private $db;

        public function __construct(){
            
            $db = new DataBase();
            $this->conn = $db->connectDB();

        }

        public function signUp( $username , $email ,$password ,$phone ,$addresse){

            try{
                $query="INSERT INTO `users` (`userName`, `email`, `password`, `phone`, `addresse`, `createdAt`)
                        VALUES (  ?, ?, ?, ?, ?, NOW());";
                $stmt=$this->conn->prepare($query);
                $stmt->execute([$username , $email ,$password ,$phone ,$addresse]);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            
        }

        public function logIn($username ,$password){

            try{
                $query="SELECT *
                        FROM  `users`
                        WHERE `userName`= ?";
                $stmt=$this->conn->prepare($query);
                $stmt->execute($username);
                $array = $stmt->fetch(FETCH_ASSOC);
                if($password == $array["password"]){
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $$password;
                    $_SESSION["email"] = $array["email"];
                    $_SESSION["createdAt"] = $array["createdAt"];
                    header("location: index.php");
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            
        }

    }

?>