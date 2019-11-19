<?php

include "../connect.php";

$shopId = $_GET['shopId'];
$category = $_GET['category'];

if ($shopId == 0) {
    $sql = "SELECT * FROM accessories WHERE category = '$category'";
} else {
    $sql = "SELECT * FROM accessories WHERE shopid = $shopId";
}

$res = mysqli_query($con, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($res)) {
    array_push($result, $row);
}

echo json_encode($result);