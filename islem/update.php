<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Nouveau produit</title>
</head>
<body>
    <?php
    include 'process.php';
    $mysqli =new mysqli($servername, $username, $password ,"restaurant");
    $res=$mysqli->query("SELECT * FROM customer")or die($mysqli->error);
    /*pre_r($res);
    
    function pre_r($array){
        echo'<pre>';
        print_r($array);
        echo'</pre>';
    }*/
    ?>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Reservation</h3>
        </div>
        <fieldset>
            <legend>New commande</legend>
            <form action="process.php" method = "POST">
            <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" required name="name" value="<?php echo $name;?>" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" required name="email" class="form-control" id="email">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">pwd</label>
                            <input type="password" required name="pwd" class="form-control" id="pwd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                    </div>
                    </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adresse">adresse</label>
                            <input type="text" name="adresse" id="adresse" class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="row justify-content-center">

                    <div class="col-md-6">
                        <input type="submit" class="btn btn-block btn-outline-primary" required name='save' value="Save">
                    </div>
                    <div class="col-md-6">
                        <button type="reset" class="btn btn-block btn-outline-secondary">Annuler</button>
                    </div>
                </div>
                </div>
            </form>
        </fieldset>
    </div>
</body>
</html>