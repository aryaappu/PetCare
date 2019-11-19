<?php

require_once '../connect.php';

$shopId = $_POST['shopId'];

$sql = "SELECT b.bookingId, b.type, b.itemId, u.name, b.quantity, b.datetime FROM bookings b JOIN user u ON b.userId = u.LoginId WHERE b.shopId = $shopId";

$res = mysqli_query($con, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($res)) {
    if ($row['type'] == 1) {
        $sql = "SELECT * FROM petdetails WHERE PetId = " . $row['itemId'];
        $res1 = mysqli_query($con, $sql);
        $row1 = mysqli_fetch_assoc($res1);
        $row['name'] = $row1['name'];
        $row['category'] = $row1['category'];
        $row['breed'] = $row1['breed'];
        $row['amount'] = $row1['amount'];
        $row['image'] = $row1['image'];
    } else {
        $sql = "SELECT * FROM accessories WHERE accessoryId = " . $row['itemId'];
        $res1 = mysqli_query($con, $sql);
        $row1 = mysqli_fetch_assoc($res1);
        $row['name'] = $row1['name'];
        $row['category'] = $row1['category'];
        $row['description'] = $row1['description'];
        $row['amount'] = $row1['price'];
        $row['image'] = $row1['image'];
    }
    array_push($result, $row);
}

echo json_encode($result);