<?php
require_once 'Order.class.php';
$order = new Order;
$order->CancelOrder($_GET['oid']);
header('Location:index.php?notif=cancel');