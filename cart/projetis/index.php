<?php
require_once 'Db.php';
include 'header.html';
$connection = new Db();
$products = $connection->getProducts();//tous les produits
$nProductsCart = $connection->getNumberOfProducts();//nombre de produits dans le panier

if (isset($_GET['add'])) {
    $connection->addproductToCart($_GET['add']);
    header('Location: index.php');
}
if (isset($_GET['vider'])) {
    $connection->clearproductToCart();
    header('Location: index.php');
}
?>

<div class="row">
    <div class="col-md-12">
        <a href="cart.php" class="shopping-cart-button float-right" data-toggle="shopping-cart-dropdown">
            <i class="fa fa-shopping-cart"></i>
            <span class="text">Shopping Cart (<?= $nProductsCart ?>)</span>
        </a>
    </div>
</div>
<div class="container">
    <h3 class="h3">FooD</h3>
    <div class="row">
         <table class="table">
            <tr>
                <th>id</th>    
                <th>name</th>
                <th>price</th>
                <th>description</th>
                <th>image</th> 
                <th>Add to cart</th> 
            </tr>
        <?php
        foreach ($products as $product) {
                echo "<tr>";
                echo"<td>". $product["pid"]."</td>";
                echo"<td>". $product["Name"]."</td>" ;
                echo"<td>". $product["Price"]."</td>";
                echo"<td>".$product["Desription"]."</td>";
                echo"<td><img src='".$product['File']."' height=\"100\" width=\"100\"></td>";
                echo"<td><a href='index.php?add=".$product["pid"]."' data-tip=\"Add to Cart\"><i class=\"fa fa-shopping-cart\"></i></a></td>";

                ?>
           <!--  <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#">
                                <img class="pic-1" style="max-height: 180px" src="<?= $product["File"] ?>">
                                <img class="pic-2" src="<?= $product["File"] ?>">
                            </a>
                            <ul class="social">
                                <li><a href="index.php?add=<?= $product["pid"] ?>" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <ul class="rating">
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star disable"></li>
                        </ul>
                        <div class="product-content">
                            <h3 class="title"><a href="#"><?= $product["Name"] ?></a></h3>
                            <div class="price"><?= $product["Price"] ?>
                            </div>
                            <a class="add-to-cart" href="index.php?add=<?= $product["pid"] ?>">+ Add To Cart</a>
                        </div>
                    </div>
                </div> -->
            <?php
                }
            ?>
    </div>
</div>
<hr>

<hr>