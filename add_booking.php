<?php

require_once '../connect.php';

$type = $_GET['type'];
$itemId = $_GET['itemId'];
$userId = $_GET['userId'];
$shopId = $_GET['shopId'];
$quantity = $_GET['quantity'];


$sql = "INSERT INTO bookings (type, itemId, userId, shopId, quantity, datetime)
        VALUES ($type, $itemId, $userId, $shopId, $quantity, now())";

mysqli_query($con, $sql);

echo('{"message": "success", "data": "' . $itemId . '"}');