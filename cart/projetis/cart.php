<?php
require_once 'Db.php';
include 'header.html';
$connection = new Db();
/*echo "<pre>";
print_r($_SESSION);*/
if (isset($_GET['remove'])) {
    $connection->removeproductFromCart($_GET['remove']);

    if (count($_SESSION["cart_products"]) > 0) {//nombre de produit
        header('Location: cart.php');
    } else {
        header('Location: index.php');
    }
}


if (isset($_GET['saveOrder'])) {
    $connection->saveOrder();
    header('Location: cart.php?order=success');
}

if (!isset($_SESSION["cart_products"]) && !isset($_GET['order'])) {
header('Location: index.php');
}
?>
<br>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($_GET['order']) && $_GET['order'] == 'success') {
            ?>
                <strong>Votre commande a été enregistré avec success. <a href="index.php">Revenir à la page d'accueil</a></strong>
            <?php
            } else {
                ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Panier</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="index.php" class="btn btn-primary btn-sm btn-block">
                                            <span class="glyphicon glyphicon-share-alt"></span> Continuer achat
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="index.php?vider" class="btn btn-primary btn-sm btn-block">
                                            <span class="glyphicon glyphicon-share-alt"></span> Vider
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="panel-body">
                    <?php
                    $total = 0;
                        foreach ($_SESSION["cart_products"] as $product) {
                    ?>
                    <div class="row">
                        <div class="col-md-2"><img class="img-sm" height="90" src="<?= $product["info"]["File"] ?>">
                        </div>
                        <div class="col-md-4">
                            <h4 class="product-name"><strong><?= $product["info"]["Name"] ?></strong></h4>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <h6><strong><?= $product["info"]["Price"] ?>TND <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" readonly class="form-control input-sm" value="<?= $product["quantity"] ?>">
                                </div>
                                <div class="col-md-2">
                                    <a href="cart.php?remove=<?= $product["info"]["pid"] ?>" class="btn btn-link btn-danger btn-xs">
                                        <span class="fa fa-trash text-danger"> </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                            $total += ($product["quantity"] * $product["info"]["Price"]);
                        }
                    ?>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-md-9">
                            <h4 class="text-right">Total <strong>TND <?= $total ?></strong></h4>
                        </div>
                        <div class="col-md-3">
                            <a href="cart.php?saveOrder=true" class="btn btn-success btn-block">
                                Save
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
