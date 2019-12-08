<?php
require_once 'Product.class.php';
$product = new Product;
$product->deleteProduct($_GET['pid']);
header('Location:index.php?notif=delete');