<?php
require_once 'Order.class.php';
$order = new Order;
$order->confirmOrder($_GET['oid']);
header('Location:index.php?notif=confirm');