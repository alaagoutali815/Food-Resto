<?php   
    require "classes/users.class.php";

    if(isset($_POST['logIn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new User();
        $user->logIn($username , $password);
    }

    require "Template/logIn.phtml";
?>